<?php

namespace App\Http\Controllers;

use App\Service\Apbd;
use App\Service\Sikd;
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
     * @var Sikd
     */
    private $sikdService;

    /**
     * ProvinceController constructor.
     * @param Sikd $sikdService
     * @param Province $provinceService
     * @param Apbd $apbdService
     * @param Tkdd $tkddService
     */
    public function __construct(Sikd $sikdService, Province $provinceService, Apbd $apbdService, Tkdd $tkddService)
    {
        $this->provinceService = $provinceService;
        $this->apbdService = $apbdService;
        $this->tkddService = $tkddService;
        $this->sikdService = $sikdService;
    }

    public function province($type, $postureId, $year, $provinceId, $month = '')
    {
        $data['monthParam'] = '';

        if ($type == 'tkdd') {
            $data['reportName'] = $this->tkddService->getPostureNameById($postureId);
        } else {
            $data['reportName'] = $this->apbdService->getPostureNameById($postureId);
        }

        if ($postureId == 'lra') {
            $data['monthParam'] = $month;
            $data['months'] = get_months();
        }
        $data['type'] = $type;
        $data['postureId'] = $postureId;
        $data['year'] = $year;
        $data['provinceId'] = $provinceId;

        $data['provinceName'] = $this->provinceService->getProvinceNameById($provinceId);
        $data['apbdPostures'] = $this->apbdService->getPostures();
        $data['tkddPostures'] = $this->tkddService->getPostures();
        $data['years'] = $this->sikdService->getAvailableYears();

        return view('sikd.level-2', $data);
    }

    public function getProvinceChart($type, $postureId, $year, $provinceId, $month = '')
    {
        if ($type == 'tkdd') {
            return $this->tkddService->getProvinceChart($year, $postureId, $provinceId);
        }

        return $this->apbdService->getProvinceChart($year, $postureId, $provinceId, $month);
    }

    public function getProvince()
    {
        return $this->provinceService->getProvinces();
    }
}
