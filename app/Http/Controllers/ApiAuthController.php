<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiAuthController extends Controller
{

    protected $apiService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
        // $this->apiService = new ApiService();
    }

    public function getLogin()
    {
        return view('sikd.login');
    }

    public function postLogin(Request $request)
    {
        $params = $request->only(['username', 'password']);
        $params['appkey'] = config('services.mediawave.app_key');

        // $apiLoginResult = $this->apiService->login($params);
        $user = new \stdClass();
        $user->userId = '1';
        $user->userName = 'Tester';

        $apiLoginResult = new \stdClass();
        $apiLoginResult->status = 'OK';
        $apiLoginResult->token = md5(url(''));
        $apiLoginResult->user = $user;

        if ($apiLoginResult->status == 'OK') {
            $token = $apiLoginResult->token;
            $mediawaveUser = $apiLoginResult->user;
            $this->signIn($mediawaveUser, $request->get('password'), $token);

            return redirect('/home');
        } else {
            return redirect('/login')->withErrors(['error' => $apiLoginResult->msg]);
        }

    }

    protected function signIn($user, $password, $token)
    {
        $attributes = [
            'id'        => $user->userId,
            'password'  => $password,
            'email'     => $user->userId . '@mediawave.com',
            'name'      => $user->userName,
            'remember_token' => ''
        ];

        session(['userAttributes' => $attributes]);

        \Auth::loginUsingId($user->userId);

        $this->saveApiToken($token);
    }

    public function logout()
    {
        \Auth::logout();
        session()->forget('userAttributes');

        return redirect('/home');
    }

    protected function saveApiToken($token)
    {
        session(['api_token' => $token]);
    }

}
