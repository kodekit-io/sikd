<?php

namespace App\Http\Controllers;

use App\Service\Mediawave;
use Illuminate\Http\Request;

class ApiAuthController extends Controller
{

    protected $apiService;
    /**
     * @var Mediawave
     */
    private $mediawave;

    /**
     * Create a new controller instance.
     *
     * @param Mediawave $mediawave
     */
    public function __construct(Mediawave $mediawave)
    {
        $this->middleware('guest', ['except' => 'logout']);
        // $this->apiService = new ApiService();
        $this->mediawave = $mediawave;
    }

    public function getLogin()
    {
        return view('sikd.login');
    }

    public function postLogin(Request $request)
    {
        // $apiLoginResult = $this->apiService->login($params);
        $apiLoginResult = $this->mediawave->getAccessToken($request->get('username'), $request->get('password'));

        if ($apiLoginResult->status == 200) {
            $token = $apiLoginResult->result->access_token;
            $this->signIn($request->get('username'), $request->get('password'), $token);

            return redirect('/home');
        } else {
            return redirect('/login')->withErrors(['error' => $apiLoginResult->result->msg]);
        }

    }

    protected function signIn($userName, $password, $token)
    {
        $attributes = [
            'id'        => $userName,
            'password'  => $password,
            'email'     => $userName,
            'name'      => $userName,
            'remember_token' => ''
        ];

        session(['userAttributes' => $attributes]);

        \Auth::loginUsingId($userName);

        $this->saveApiToken($token);
    }

    public function logout()
    {
        \Auth::logout();
        session()->flush();
//        session()->forget('userAttributes');

        return redirect('/home');
    }

    protected function saveApiToken($token)
    {
        session(['api_token' => $token]);
    }

}
