<?php

namespace App\Service;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;

class Province
{
    /**
     * @var Sikd
     */
    private $sikd;

    /**
     * Province constructor.
     */
    public function __construct(Sikd $sikd)
    {
        $this->sikd = $sikd;
    }

    public function getProvinces($type = 'array')
    {
        $minutes = 0 * 0 * 60;
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

}