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
        $tkddRequest = $this->tkdd->getAllChart($thisYear);
        $tkddResult = ($tkddRequest->status == '200') ? $tkddRequest->result : [];

        // apbd
        $apbdRequest = $this->apbd->getAllChart($thisYear);
        $apbdResult = ($apbdRequest->status == '200') ? $apbdRequest->result : [];

        // reportType
        $reportTypes = config('mediawave.reportType');
        $arr = [];
        foreach ($reportTypes as $reportType) {
            $arr[$reportType['id']] = $reportType['code'];
        }

        $data['thisYear'] = $thisYear;
        $data['reportTypes'] = \GuzzleHttp\json_encode($arr);
        $data['tkddData'] = \GuzzleHttp\json_encode($tkddResult);
        $data['apbdData'] = \GuzzleHttp\json_encode($apbdResult);

        return view('sikd.home', $data);
    }

    public function infrastructureData($year)
    {
        $url = 'infrastruktur/' . $year;

        return $this->mediawave->getJsonResult($url);
    }

    public function simpananPemdaData()
    {
        $url = 'simpanan-pemda';

        return $this->mediawave->getJsonResult($url);
    }

    public function realisasiTkdd($year)
    {
        $url = 'top-bottom/realisasi-tkdd/' . $year;

        return $this->mediawave->getJsonResult($url);
    }

    public function dakFisik($year)
    {
        $url = 'top-bottom/dak-fisik/' . $year;

        return $this->mediawave->getJsonResult($url);
    }

    public function danaDesa($year)
    {
        $url = 'top-bottom/dana-desa/' . $year;

        return $this->mediawave->getJsonResult($url);
    }

    public function belanja($year)
    {
        $url = 'top-bottom/belanja/' . $year;

        return $this->mediawave->getJsonResult($url);
    }

    public function realisasiPad($year)
    {
        $url = 'top-bottom/pad/' . $year;

        return $this->mediawave->getJsonResult($url);
    }
}
