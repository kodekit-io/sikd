<?php

namespace App\Http\Controllers;

use App\Service\Apbd;
use App\Service\Mediawave;
use App\Service\Province;
use App\Service\Tkdd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MapController extends Controller
{
    /**
     * @var Tkdd
     */
    private $tkddService;
    /**
     * @var Apbd
     */
    private $apbdService;

    /**
     * MapController constructor.
     * @param Tkdd $tkddService
     * @param Apbd $apbdService
     */
    public function __construct(Tkdd $tkddService, Apbd $apbdService)
    {
        $this->tkddService = $tkddService;
        $this->apbdService = $apbdService;
    }

    public function map($reportType = 'pad')
    {
        $reportTypes = config('mediawave.reportType');
        $data['reportTypes'] = $reportTypes;
        $data['postures'] = $this->tkddService->getPostures();
        $data['reportType'] = $reportType;
        if ($this->tkddService->isPostureId($reportType)) {
            $data['reportName'] = $this->tkddService->getPosturNameById($reportType);
        } else {
            $data['reportName'] = $reportTypes[$reportType];
        }

        return view('sikd.level-1', $data);
    }

    public function getMapChart($reportType = 'pad')
    {
        $year = '2016';
        if ($this->tkddService->isPostureId($reportType)) {
            return $this->tkddService->getMapChart($year, $reportType);
        }

        return $this->apbdService->getMapChart($year, $reportType);
    }
}
