<?php

namespace App\Http\Controllers;

use App\Service\Apbd;
use App\Service\Province;
use App\Service\ReportType;
use App\Service\Tkdd;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    use ReportType;

    /**
     * @var Province
     */
    private $provinceService;
    /**
     * @var Apbd
     */
    private $apbdService;
    /**
     * @var Tkdd
     */
    private $tkddService;

    /**
     * ProvinceController constructor.
     * @param Province $provinceService
     * @param Apbd $apbdService
     * @param Tkdd $tkddService
     */
    public function __construct(Province $provinceService, Apbd $apbdService, Tkdd $tkddService)
    {
        $this->provinceService = $provinceService;
        $this->apbdService = $apbdService;
        $this->tkddService = $tkddService;
    }

    public function province($provinceId, $reportType = 'pad')
    {
        $reportTypes = config('mediawave.reportType');
        $data['reportTypes'] = $reportTypes;
        $data['postures'] = $this->tkddService->getPostures();

        $data['provinceName'] = $this->provinceService->getProvinceNameById($provinceId);
        $data['provinceId'] = $provinceId;

        if ($this->tkddService->isPostureId($reportType)) {
            $data['reportName'] = $this->tkddService->getPosturNameById($reportType);
        } else {
            $data['reportName'] = $this->getReportNameByCode($reportType);
        }

        $data['reportType'] = ($reportType != '') ? $reportType : 'pad';

        return view('sikd.level-2', $data);
    }

    public function getProvinceChart($provinceId, $reportType)
    {
        if ($this->tkddService->isPostureId($reportType)) {
            $year = '2016';
            return $this->tkddService->getProvinceChart($year, $reportType, $provinceId);
        }

        $year = '2015';
        return $this->apbdService->getProvinceChart($year, $reportType, $provinceId);
    }

    public function getProvince()
    {
        return $this->provinceService->getProvinces();
    }
}
