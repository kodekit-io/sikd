<?php

namespace App\Service;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;

class Province
{
    /**
     * @var Mediawave
     */
    private $mediawave;

    /**
     * Province constructor.
     */
    public function __construct(Mediawave $mediawave)
    {
        $this->mediawave = $mediawave;
    }

    public function getProvinces()
    {
        $minutes = 5 * 24 * 60;
        $provinces = Cache::remember('provinces', $minutes, function () {
            $path = public_path('assets/js/pages/indonesia.json');
            $jsonResult = File::get($path);
            $jsonResult = \GuzzleHttp\json_decode($jsonResult);
            $features = $jsonResult->features;
            $provinces = [];
            $x = 0;
            foreach ($features as $feature) {
                $properties = $feature->properties;
                $provinces[$x]['id'] = $properties->id;
                $provinces[$x]['name'] = $properties->name;
                $x++;
            }

            return $provinces;
        });

        return $provinces;
    }

    public function getProvinceNameById($provinceId)
    {
        $provinces = $this->getProvinces();
        foreach ($provinces as $province) {
            if ($province['id'] == $provinceId) {
                return $province['name'];
            }
        }

        return '';
    }

    public function getProvinceChartData($provinceId, $reportType)
    {
        $thisYear = '2016';
        $url = 'apbd/' . $reportType . '/2/' . $thisYear . '/' . $provinceId;
        $apiRequest = $this->mediawave->get($url, [], 2);
        $result = ($apiRequest->status == '200') ? $apiRequest->result : [];
        $modifiedResult['data'] = isset($result->{'detail-map-provinsi'}) ? $result->{'detail-map-provinsi'} : [];

        return \GuzzleHttp\json_encode($modifiedResult);
    }

}