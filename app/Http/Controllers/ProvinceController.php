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
        $data['reportTypes'] = config('mediawave.reportType');

        $data['provinceName'] = $this->provinceService->getProvinceNameById($provinceId);
        $data['provinceId'] = $provinceId;
        $data['reportType'] = ($reportType != '') ? $reportType : 'pad';

        return view('sikd.level-2', $data);
    }

    public function getProvinceChart($provinceId, $reportType)
    {
        $level = 2;
        return $this->provinceService->getApbdChart($level, '2016', $reportType, $provinceId);
    }

    public function getProvince()
    {
        return $this->provinceService->getProvinces();
    }
}
