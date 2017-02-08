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
        $infraRequest = $this->mediawave->get($url);
        $infraResult = ($infraRequest->status == '200') ? $infraRequest->result : [];

        return \GuzzleHttp\json_encode($infraResult);
    }

    public function simpananPemdaData()
    {
        $url = 'simpanan-pemda';
        $pemdaRequest = $this->mediawave->get($url);
        $pemdaResult = ($pemdaRequest->status == '200') ? $pemdaRequest->result : [];

        return \GuzzleHttp\json_encode($pemdaResult);
    }

    public function realisasiTkdd($year)
    {
        $url = 'top-bottom/realisasi-tkdd/' . $year;
        $realisasiTkddRequest = $this->mediawave->get($url);
        $realisasiTkddResult = ($realisasiTkddRequest->status == '200') ? $realisasiTkddRequest->result : [];

        return \GuzzleHttp\json_encode($realisasiTkddResult);
    }

    public function dakFisik($year)
    {
        $url = 'top-bottom/dak-fisik/' . $year;
        $request = $this->mediawave->get($url);
        $result = ($request->status == '200') ? $request->result : [];

        return \GuzzleHttp\json_encode($result);
    }

    public function danaDesa($year)
    {
        $url = 'top-bottom/dana-desa/' . $year;
        $request = $this->mediawave->get($url);
        $result = ($request->status == '200') ? $request->result : [];

        return \GuzzleHttp\json_encode($result);
    }

    public function belanja($year)
    {
        $url = 'top-bottom/belanja/' . $year;
        $request = $this->mediawave->get($url);
        $result = ($request->status == '200') ? $request->result : [];

        return \GuzzleHttp\json_encode($result);
    }

    public function realisasiPad($year)
    {
        $url = 'top-bottom/pad/' . $year;
        $request = $this->mediawave->get($url);
        $result = ($request->status == '200') ? $request->result : [];

        return \GuzzleHttp\json_encode($result);
    }
}
