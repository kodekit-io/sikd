<?php

namespace App\Http\Controllers;

use App\Service\Apbd;
use App\Service\Mediawave;
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
     * @var Mediawave
     */
    private $mediawaveService;

    /**
     * ProvinceController constructor.
     * @param Mediawave $mediawaveService
     * @param Province $provinceService
     * @param Apbd $apbdService
     * @param Tkdd $tkddService
     */
    public function __construct(Mediawave $mediawaveService, Province $provinceService, Apbd $apbdService, Tkdd $tkddService)
    {
        $this->provinceService = $provinceService;
        $this->apbdService = $apbdService;
        $this->tkddService = $tkddService;
        $this->mediawaveService = $mediawaveService;
    }

    public function province($type, $postureId, $year, $provinceId)
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
        $data['years'] = $this->mediawaveService->getAvailableYears();

        return view('sikd.level-2', $data);
    }

    public function getProvinceChart($type, $postureId, $year, $provinceId)
    {
        if ($type == 'tkdd') {
            return $this->tkddService->getProvinceChart($year, $postureId, $provinceId);
        }

        return $this->apbdService->getProvinceChart($year, $postureId, $provinceId);
    }

    public function getProvince()
    {
        return $this->provinceService->getProvinces();
    }
}
