<?php

namespace App\Exceptions;

use Exception;

class GeneralException extends Exception
{
    public $errorCode;
    public $errorMsg;
    public $errorHeaders;

    const SERVER_BUSY = 429;//系统繁忙
    const SERVER_INTERNAL_ERROR = 500;//未知错误

    const ERROR_UNAUTHORISED = 1001;//未登录
    const ERROR_TOKEN_INVALID = 1002;//Token失效

    const PERMISSION_NOT_FOUND = 1010;//权限未配置，请联系管理员

    const ERROR_ACCOUNT_AUTH = 1101;//账号或密码错误

    const ERROR_PARAMS_INVALID = 2001;//请求的参数错误

    const RESOURCE_NOT_EXISTS = 3001;//请求的资源不存在

    const MERCHANT_BANK_NOT_FOUND = 4001;//商户银行卡不存在

    /**
     * GeneralException constructor.
     *
     * @param int $errorCode
     * @param null $errorMsg
     * @param Exception|null $previous
     * @param array $headers
     * @param int $code
     */
    public function __construct($errorCode = 0, $errorMsg = null, \Exception $previous = null,array $headers = array(), $code = 0)
    {
        $this->errorCode = $errorCode;
        $this->errorMsg = $errorMsg ?: trans('message.exception.'.$errorCode);
        $this->errorHeaders = $headers;

        parent::__construct($this->errorMsg, $this->errorCode, $previous);
    }

    /**
     * Report the exception.
     *
     * @return void
     */
    public function report()
    {
        //
    }

    /**
     * Render the exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {
        /*
         * All instances of GeneralException json back
         */
        if ($request->expectsJson()) {
            $body = body_format($this->errorCode);
            $headers = array_merge(header_format($this->errorCode, $this->errorMsg), $this->errorHeaders);

            return response()->json($body)->withHeaders($headers);
        }

        return response()->view('errors.exception', ['code' => $this->errorCode, 'message' => $this->errorMsg]);
//        return redirect()
//            ->back()
//            ->withInput($request->except('password', 'repassword'))
//            ->withErrors(['message' => $this->errorMsg]);
    }
}
