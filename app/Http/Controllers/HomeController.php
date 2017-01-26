<?php

namespace App\Http\Controllers;

use App\Service\Mediawave;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * @var Mediawave
     */
    private $mediawave;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Mediawave $mediawave)
    {
        $this->middleware('auth');
        $this->mediawave = $mediawave;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function home()
    {
//        $thisYear = date('Y');
        $thisYear = '2016';
        $params = [ 'tahun' => $thisYear ];
        // tkdd
        $tkdd = $this->mediawave->get('TKDD', $params);
        $tkddResult = ($tkdd->status == '200') ? $tkdd->result : [];

        // apbd
        $apbd = $this->mediawave->get('apbd/all/0/' . $thisYear, [], 2);
        $apbdResult = ($apbd->status == '200') ? $apbd->result : [];

        $data['tkddData'] = \GuzzleHttp\json_encode($tkddResult);
        $data['apbdData'] = \GuzzleHttp\json_encode($apbdResult);

        return view('sikd.home', $data);
    }
}
