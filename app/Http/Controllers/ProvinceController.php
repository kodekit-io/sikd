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

    public function province($type, $year, $postureId, $provinceId)
    {
        if ($type == 'tkdd') {
            $data['reportName'] = $this->tkddService->getPostureNameById($postureId);
        } else {
            $data['reportName'] = $this->apbdService->getPostureNameById($postureId);
        }

        $data['type'] = $type;
        $data['postureId'] = $postureId;
        $data['year'] = $year;
        $data['provinceId'] = $provinceId;

        $data['provinceName'] = $this->provinceService->getProvinceNameById($provinceId);
        $data['apbdPostures'] = $this->apbdService->getPostures();
        $data['tkddPostures'] = $this->tkddService->getPostures();

        return view('sikd.level-2', $data);
    }

    public function getProvinceChart($type, $year, $postureId, $provinceId)
    {
        if ($type == 'tkdd') {
            return $this->tkddService->getProvinceChart($year, $postureId, $provinceId);
        }

        $year = '2015';
        return $this->apbdService->getProvinceChart($year, $postureId, $provinceId);
    }

    public function getProvince()
    {
        return $this->provinceService->getProvinces();
    }
}
