<?php

namespace App\Http\Controllers;

use App\Service\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    /**
     * @var Province
     */
    private $provinceService;

    /**
     * ProvinceController constructor.
     * @param Province $provinceService
     */
    public function __construct(Province $provinceService)
    {
        $this->provinceService = $provinceService;
    }

    public function province($provinceId, $reportType = '')
    {
        $data['provinces'] = $this->provinceService->getProvinces();
        $data['reportTypes'] = config('mediawave.reportType');

        $data['provinceName'] = $this->provinceService->getProvinceNameById($provinceId);
        $data['provinceId'] = $provinceId;
        $data['reportType'] = ($reportType != '') ? $reportType : 'pad';

        return view('sikd.level-2', $data);
    }

    public function getProvinceChart($provinceId, $reportType)
    {
        return $this->provinceService->getProvinceChartData($provinceId, $reportType);
    }

    public function getProvince()
    {
        return $this->provinceService->getProvinces();
    }
}
