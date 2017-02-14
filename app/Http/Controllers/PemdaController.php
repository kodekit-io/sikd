<?php

namespace App\Http\Controllers;

use App\Service\Pemda;
use Illuminate\Http\Request;

class PemdaController extends Controller
{
    /**
     * @var Pemda
     */
    private $pemdaService;

    /**
     * PemdaController constructor.
     * @param Pemda $pemdaService
     */
    public function __construct(Pemda $pemdaService)
    {
        $this->pemdaService = $pemdaService;
    }

    public function profile($satkerCode)
    {
        $data['year'] = '2015';
        $data['satkerCode'] = $satkerCode;
        $data['pemdaName'] = $this->pemdaService->getPemdaNameBySatkerCode($satkerCode);

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
