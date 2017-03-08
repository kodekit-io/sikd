<?php

namespace App\Http\Controllers;

use App\Service\Apbd;
use App\Service\Sikd;
use App\Service\Tkdd;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * @var Sikd
     */
    private $sikd;
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
     * @param Sikd $sikd
     * @param Tkdd $tkdd
     * @param Apbd $apbd
     */
    public function __construct(Sikd $sikd, Tkdd $tkdd, Apbd $apbd)
    {
        $this->middleware('auth');
        $this->sikd = $sikd;
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

    public function home($year='2016')
    {
        // $year = date('Y');
        // $year = '2016';
        $params = [ 'tahun' => $year ];

        // tkdd
        $tkddRequest = $this->tkdd->getAllChart($year);
        $tkddResult = ($tkddRequest->status == '200') ? $tkddRequest->result : [];

        // apbd
        $apbdRequest = $this->apbd->getAllChart($year);
        $apbdResult = ($apbdRequest->status == '200') ? $apbdRequest->result : [];

        // reportType
        $reportTypes = config('sikd.reportType');
        $arr = [];
        foreach ($reportTypes as $reportType) {
            $arr[$reportType['id']] = $reportType['code'];
        }

        $data['year'] = $year;
        $data['reportTypes'] = \GuzzleHttp\json_encode($arr);
        $data['tkddData'] = \GuzzleHttp\json_encode($tkddResult);
        $data['apbdData'] = \GuzzleHttp\json_encode($apbdResult);

        return view('sikd.home', $data);
    }

    public function infrastructureData($year)
    {
        $url = 'infrastruktur/' . $year;

        return $this->sikd->getJsonResult($url, false);
    }

    public function simpananPemdaData()
    {
        $url = 'simpanan-pemda';

        return $this->sikd->getJsonResult($url, false);
    }

    public function realisasiTkdd($year)
    {
        $url = 'top-bottom/realisasi-tkdd/' . $year;

        return $this->sikd->getJsonResult($url);
    }

    public function dakFisik($year)
    {
        $url = 'top-bottom/dak-fisik/' . $year;

        return $this->sikd->getJsonResult($url);
    }

    public function danaDesa($year)
    {
        $url = 'top-bottom/dana-desa/' . $year;

        return $this->sikd->getJsonResult($url);
    }

    public function belanja($year)
    {
        $url = 'top-bottom/belanja/' . $year;

        return $this->sikd->getJsonResult($url);
    }

    public function lra($year)
    {
        $url = 'top-bottom/lra/' . $year;

        return $this->sikd->getJsonResult($url);
    }

    public function realisasiPad($year)
    {
        $url = 'top-bottom/pad/' . $year;

        return $this->sikd->getJsonResult($url);
    }
}
