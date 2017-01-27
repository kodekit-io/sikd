<?php

namespace App\Http\Controllers;

use App\Service\Mediawave;
use App\Service\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MapController extends Controller
{
    /**
     * @var Province
     */
    private $provinceService;

    /**
     * MapController constructor.
     * @param Province $provinceService
     */
    public function __construct(Province $provinceService)
    {
        $this->provinceService = $provinceService;
    }

    public function map($reportType = 'pad')
    {
        $data['reportTypes'] = config('mediawave.reportType');
        $data['reportType'] = $reportType;

        return view('sikd.level-1', $data);
    }

    public function getMapChart($reportType = 'pad')
    {
        return $this->provinceService->getApbdChart(1, '2016', $reportType);
    }
}
