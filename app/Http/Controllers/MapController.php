<?php

namespace App\Http\Controllers;

use App\Service\Apbd;
use App\Service\Sikd;
use App\Service\Province;
use App\Service\Tkdd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Service\ReportType;

class MapController extends Controller
{
    use ReportType;
    /**
     * @var Tkdd
     */
    private $tkddService;
    /**
     * @var Apbd
     */
    private $apbdService;
    /**
     * @var Sikd
     */
    private $sikdService;

    /**
     * MapController constructor.
     * @param Sikd $sikdService
     * @param Tkdd $tkddService
     * @param Apbd $apbdService
     */
    public function __construct(Sikd $sikdService, Tkdd $tkddService, Apbd $apbdService)
    {
        $this->tkddService = $tkddService;
        $this->apbdService = $apbdService;
        $this->sikdService = $sikdService;
    }

    public function map($type, $postureId, $year = '2016', $month = '')
    {
        $data['monthParam'] = '';
        if ($type == 'tkdd') {
            $postureId = $postureId != '' ? $postureId : 39;
            $data['reportName'] = $this->tkddService->getPostureNameById($postureId);
        } else {
            $postureId = $postureId != '' ? $postureId : 1;
            $data['reportName'] = $this->apbdService->getPostureNameById($postureId);
            if ($postureId == 'lra') {
                $data['months'] = get_months();
                $data['monthParam'] = $month;
            }
        }

        $data['reportTypes'] = $this->apbdService->getPostures();
        $data['postures'] = $this->tkddService->getPostures();
        $data['postureId'] = $postureId;
        $data['reportType'] = $type;
        $data['yearParam'] = $year;
        $data['years'] = $this->sikdService->getAvailableYears();

        return view('sikd.level-1', $data);
    }

    public function getMapChart($type, $year = '2016', $postureId, $month = '')
    {
        if ($type == 'tkdd') {
            return $this->tkddService->getMapChart($year, $postureId);
        }

        return $this->apbdService->getMapChart($year, $postureId, $month);
    }

}
