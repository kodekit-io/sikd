<?php

namespace App\Http\Controllers;

use App\Service\Apbd;
use App\Service\Mediawave;
use App\Service\Tkdd;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * @var Mediawave
     */
    private $mediawave;
    /**
     * @var Apbd
     */
    private $apbd;
    /**
     * @var Tkdd
     */
    private $tkdd;

    /**
     * Create a new controller instance.
     *
     * @param Mediawave $mediawave
     * @param Tkdd $tkdd
     * @param Apbd $apbd
     */
    public function __construct(Mediawave $mediawave, Tkdd $tkdd, Apbd $apbd)
    {
        $this->middleware('auth');
        $this->mediawave = $mediawave;
        $this->apbd = $apbd;
        $this->tkdd = $tkdd;
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
        $tkddResult = $this->tkdd->getAllChart();
        $tkddResult = ($tkddResult->status == '200') ? $tkddResult->result : [];

        // apbd
        $apbd = $this->mediawave->get('apbd/all/0/' . $thisYear, [], 1);
        $apbdResult = ($apbd->status == '200') ? $apbd->result : [];

        $data['tkddData'] = \GuzzleHttp\json_encode($tkddResult);
        $data['apbdData'] = \GuzzleHttp\json_encode($apbdResult);

        return view('sikd.home', $data);
    }
}
