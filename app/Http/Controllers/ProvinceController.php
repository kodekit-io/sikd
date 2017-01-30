<?php

namespace App\Http\Controllers;

use App\Service\Apbd;
use App\Service\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    /**
     * @var Province
     */
    private $provinceService;
    /**
     * @var Apbd
     */
    private $apbdService;

    /**
     * ProvinceController constructor.
     * @param Province $provinceService
     * @param Apbd $apbdService
     */
    public function __construct(Province $provinceService, Apbd $apbdService)
    {
        $this->provinceService = $provinceService;
        $this->apbdService = $apbdService;
    }

    public function province($provinceId, $reportType = '')
    {
        $data['reportTypes'] = config('mediawave.reportType');

        $data['provinceName'] = $this->provinceService->getProvinceNameById($provinceId);
        $data['provinceId'] = $provinceId;
        $data['reportType'] = ($reportType != '') ? $reportType : 'pad';

        return view('sikd.level-2', $data);
    }

    public function getProvinceChart($provinceId, $reportType)
    {
        $level = 2;
        return $this->apbdService->getChart($level, '2016', $reportType, $provinceId);
    }

    public function getProvince()
    {
        return $this->provinceService->getProvinces();
    }
}
