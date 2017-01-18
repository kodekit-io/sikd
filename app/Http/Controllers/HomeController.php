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
        $thisYear = date('Y');
        $params = [ 'tahun' => 2016 ];
        $tkdd = $this->mediawave->get('TKDD', $params);
        $data['tkddData'] = \GuzzleHttp\json_encode($tkdd);

        return view('sikd.home', $data);
    }

    public function testTkdd()
    {
        $url = 'TKDD';
        $params = [ 'tahun' => 2016 ];
        $tkdd = $this->mediawave->get($url, $params, false);
        var_dump($tkdd);
    }
}
