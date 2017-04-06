<?php

namespace App\Http\Controllers;

use App\Service\Sikd;
use Illuminate\Http\Request;

class ApiAuthController extends Controller
{

    protected $apiService;
    /**
     * @var Sikd
     */
    private $sikd;

    /**
     * Create a new controller instance.
     *
     * @param Sikd $sikd
     */
    public function __construct(Sikd $sikd)
    {
        $this->middleware('guest', ['except' => 'logout']);
        // $this->apiService = new ApiService();
        $this->sikd = $sikd;
    }

    public function getLogin()
    {
        return view('sikd.login');
    }

    public function postLogin(Request $request)
    {
        // $apiLoginResult = $this->apiService->login($params);
        $apiLoginResult = $this->sikd->getAccessToken($request->get('username'), $request->get('password'));

        if ($apiLoginResult->status == 200) {
            if (isset($apiLoginResult->result->status) && $apiLoginResult->result->status == 'error') {
                return redirect('/login')->withErrors(['error' => $apiLoginResult->result->message]);
            } else {
                $token = $apiLoginResult->result->access_token;
                $role = $apiLoginResult->result->role;
                $this->signIn($request->get('username'), $request->get('password'), $token, $role);

                return redirect('/home');
            }
        } else {
            return redirect('/login')->withErrors(['error' => 'Please check your username and/or password.']);
        }

    }

    protected function signIn($userName, $password, $token, $role)
    {
        $attributes = [
            'id' => $userName,
            'password' => $password,
            'email' => $userName,
            'name' => $userName,
            'remember_token' => '',
            'role' => $role
        ];

        session(['userAttributes' => $attributes]);

        \Auth::loginUsingId($userName);

        $this->saveApiToken($token);
    }

    public function logout(Request $request)
    {
        \Auth::logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect('home');
    }

    protected function saveApiToken($token)
    {
        session(['api_token' => $token]);
    }

}
