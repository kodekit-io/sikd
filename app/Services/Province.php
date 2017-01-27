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

    public function getProvinces($type = 'array')
    {
        $minutes = 5 * 24 * 60;
        $provinces = Cache::remember('provinces', $minutes, function () {
            $path = public_path('assets/js/pages/indonesiaMap.json');
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

        if ($type == 'json') {
            return \GuzzleHttp\json_encode($provinces);
        }

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

    public function getApbdChart($level, $year = '2016', $reportType = 'pad', $provinceId = '')
    {
        $url = 'apbd/' . $reportType . '/' . $level . '/' . $year;
        $url .= $provinceId != '' ? '/' . $provinceId : '';
        $apiVersion = 2;
        $apiRequest = $this->mediawave->get($url, [], $apiVersion);
        $result = ($apiRequest->status == '200') ? $apiRequest->result : [];

        // modified the api result
        $modifiedResult['data'] = [];

        if (isset($result->map)) {
            $modifiedResult['data'] = $result->map;
        }

        if (isset($result->{'detail-map-provinsi'})) {
            $modifiedResult['data'] = $result->{'detail-map-provinsi'};
        }

        return \GuzzleHttp\json_encode($modifiedResult);
    }

}