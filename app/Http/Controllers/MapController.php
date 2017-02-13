<?php

namespace App\Http\Controllers;

use App\Service\Apbd;
use App\Service\Mediawave;
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
     * @var Mediawave
     */
    private $mediawaveService;

    /**
     * MapController constructor.
     * @param Mediawave $mediawaveService
     * @param Tkdd $tkddService
     * @param Apbd $apbdService
     */
    public function __construct(Mediawave $mediawaveService, Tkdd $tkddService, Apbd $apbdService)
    {
        $this->tkddService = $tkddService;
        $this->apbdService = $apbdService;
        $this->mediawaveService = $mediawaveService;
    }

    public function map($type, $postureId, $year = '2016')
    {
        if ($type == 'tkdd') {
            $postureId = $postureId != '' ? $postureId : 39;
            $data['reportName'] = $this->tkddService->getPostureNameById($postureId);
        } else {
            $postureId = $postureId != '' ? $postureId : 1;
            $data['reportName'] = $this->apbdService->getPostureNameById($postureId);
        }

        $data['reportTypes'] = $this->apbdService->getPostures();
        $data['postures'] = $this->tkddService->getPostures();
        $data['postureId'] = $postureId;
        $data['reportType'] = $type;
        $data['year'] = $year;
        $data['years'] = $this->mediawaveService->getAvailableYears();

        return view('sikd.level-1', $data);
    }

    public function getMapChart($type, $year = '2016', $postureId)
    {
        if ($type = 'tkdd') {
            return $this->tkddService->getMapChart($year, $postureId);
        }

        return $this->apbdService->getMapChart($year, $postureId);
    }

}
