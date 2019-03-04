<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        return parent::render($request, $exception);

        $errorHeaders = [];
        $errorCode = GeneralException::SERVER_INTERNAL_ERROR;
        if ($exception instanceof UnauthorizedException || $exception instanceof UnauthorizedHttpException) {
            $errorCode = GeneralException::ERROR_UNAUTHORISED;
        } elseif ($exception instanceof TokenMismatchException || $exception instanceof JWTException) {
            $errorCode = GeneralException::ERROR_TOKEN_INVALID;
        } elseif ($exception instanceof SpatieUnauthorizedException) {
            $errorCode = GeneralException::PERMISSION_NOT_FOUND;
        } elseif ($exception instanceof MethodNotAllowedHttpException || $exception instanceof ModelNotFoundException ) {
            $errorCode = GeneralException::RESOURCE_NOT_EXISTS;
        } elseif ($exception instanceof GeneralException) {
            return parent::render($request, $exception);
        } elseif ($exception instanceof ValidationException) {
            $errorCode = GeneralException::ERROR_PARAMS_INVALID;
        }
        $errorMsg = trans('message.exception.' . $errorCode);

        // 写入日志
        if (config('app.debug')) {
            $debug_id = uniqid();
            $body['debug_id'] = $debug_id;
            $request = request();
            Log::debug($debug_id, [
                'LOG_ID'         => $debug_id,
                'IP_ADDRESS'     => $request->ip(),
                'REQUEST_URL'    => $request->fullUrl(),
                'REQUEST_METHOD' => $request->method(),
                'PARAMETERS'     => $request->all(),
                'RESPONSES'      => $body
            ]);
        }

        //返回
        if ($request->expectsJson()) {
            $extra = [];
            if (config('app.debug')) {
                $class               = explode('\\', get_class($exception));
                $class_name          = Str::snake($class[ count($class) - 1 ], ' ');
                $extra['exception'] = [
                    'code' => $exception->getCode() ? $exception->getCode() : '',
                    'message' => $exception->getMessage() ? $exception->getMessage() : $class_name,
                    'file'   => $exception->getFile(),
                    'line'   => $exception->getLine(),
                    'string' => $exception->getTraceAsString(),
                ];
            }
            $body = array_merge(body_format($errorCode), $extra);
            $headers = array_merge(header_format($errorCode, $errorMsg), $errorHeaders);
            return response()->json($body)->withHeaders($headers);
        }

        return response()->view('errors.exception', ['code' => $errorCode, 'message' => $errorMsg]);
    }
}
