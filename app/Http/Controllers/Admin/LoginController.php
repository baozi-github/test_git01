<?php

namespace App\Http\Controllers\Admin;

use App\Models\AuthMember;
use App\services\Test02Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;// 登陆限流
use Illuminate\Support\Facades\Auth;
use function Psy\debug;

class LoginController extends BaseController
{
    use ThrottlesLogins;

    public $decayMinutes = 3;

    public $maxAttempts = 5;

    public function __construct()
    {
        $this->middleware('auth_member:'.$this->guard_type)->only('tt');
    }

    public function username()
    {
        return 'loginid';
    }
    //
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 进入登陆页面
     */
    public function index()
    {
        //dd(123);
        return view('admin.login.login');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|void
     * @throws \Illuminate\Validation\ValidationException
     * 执行登录
     */
    public function doLogin(Request $request)
    {
        // 判断验证码
        if($request->input('validCode') != session()->get('captcha_code')){
           // return back()->withErrors(['验证码错误']);
        }
        // 判断参数格式
        $validator = Validator::make($request->all(), [
            'loginid' => 'bail|required|string|max:32',
            'password' => 'bail|required|min:6',
        ],[
            'loginid.*' => '账号格式有误',
            'password.*' => '密码格式有误',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
        // 判断尝试次数  可用
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }
        // 判断登录
        $credentials = [
            'account' => $request->input('loginid'),
            'password' => $request->input('password'),
            'is_enable' => 1,
        ];
        if (! Auth::guard($this->guard_type)->attempt($credentials, $request->has('remember'))) {
            $this->incrementLoginAttempts($request);  // 增加错误次数
            return redirect('/login')->withErrors(['账号或密码错误']);
        }
       // dd(Auth::guard($this->guard_type)->guest());  // 验证是否登陆 如果登陆了 则返回false
        //dd($request->expectsJson()); 判断请求参数 格式
        $request->session()->regenerate();  // 重新生成session ID

        $this->clearLoginAttempts($request);  // 清除错误次数

        return redirect()->intended('tt');  // 跳转页面

    }
    /**
     * @param Request $request
     * 设置验证码
     */
    public function captcha(Request $request)
    {
        $width = $request->input('w', '121');
        $height = $request->input('h', '43');

        $builder = new CaptchaBuilder();

        $builder->build($width, $height, $font = null);
        $phrase = $builder->getPhrase();

        //把内容存入session
        //session(['captcha_code' => strtolower($phrase)]);

        //生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');

        //输出
        $builder->output();
    }

    public function tt()
    {

		$redirect_url = urlencode('http://baozipu.club/wx/test.html');

// 公众号appid
		$appid = 'wx4e235f6c16cb076c';

// 授权链接
		$url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid={$appid}&redirect_uri={$redirect_url}&response_type=code&scope=snsapi_userinfo&state=111#wechat_redirect";

// 生成得到授权链接
		dd($url);
		echo $url;

    	$t = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx4e235f6c16cb076c&redirect_uri=';
    	$t .='http://www.baozipu.club';
    	$t .= '&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect';
    	dd($t);



    	$data = 'http://www.baozipu.club';

    	dd((string)$data);
    	return response()->json(['http://www.baozipu.club']);
//    	$query = AuthMember::Builder;
//    	$query = $query->where('id',12);
//    	//$data = AuthMember::where('id',12)->toSql(false);
//    	dd($query->toSql());
//    	$data = str_replace('?','%s', $query->toSql());
//    	dd($data);
////		DB::getQueryLog();
//		dd(DB::getQueryLog(AuthMember::all()));
//    	dd($data->sql());
//    	$d = Test02Service::TEST;
//    	dd($d);
////    	dd(123123);
//    	dd(env(APP_DEBUG));
//        dd(345);
    }
}
