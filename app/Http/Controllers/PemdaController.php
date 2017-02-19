<?php

namespace App\Http\Controllers;

use App\Service\Pemda;
use App\Service\Mediawave;
use Illuminate\Http\Request;

class PemdaController extends Controller
{
    /**
     * @var Pemda
     */
    private $pemdaService;
    /**
     * @var Mediawave
     */
    private $mediawaveService;
    /**
     * PemdaController constructor.
     * @param Pemda $pemdaService
     */
    public function __construct(Mediawave $mediawaveService, Pemda $pemdaService)
    {
        $this->pemdaService = $pemdaService;
        $this->mediawaveService = $mediawaveService;
    }

    public function profile($satkerCode,$year)
    {
        $data['year'] = $year;
        $data['satkerCode'] = $satkerCode;
        $data['pemdaName'] = $this->pemdaService->getPemdaNameBySatkerCode($satkerCode);
        $data['years'] = $this->mediawaveService->getAvailableYears();

        return view('sikd.level-3', $data);
    }

    public function chart($year, $satkerCode)
    {
        return $this->pemdaService->getChart($year, $satkerCode);
    }

    public function apbdTableData($year, $satkerCode)
    {
        return $this->pemdaService->getApbdTableData($year, $satkerCode);
    }

    public function tkddTableData($year, $satkerCode)
    {
        return $this->pemdaService->getTkddTableData($year, $satkerCode);
    }

    public function otherTableData($satkerCode)
    {
        return $this->pemdaService->getOtherTableData($satkerCode);
    }
}
