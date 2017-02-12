<?php

namespace App\Service;


use Illuminate\Support\Facades\Cache;

class Apbd
{
    /**
     * @var Mediawave
     */
    private $mediawave;

    /**
     * Apbd constructor.
     * @param Mediawave $mediawave
     */
    public function __construct(Mediawave $mediawave)
    {
        $this->mediawave = $mediawave;
    }

    public function getPostures($type = 'array')
    {
        $minutes = 5 * 24 * 60;
        $postures = Cache::remember('apbd_postures', $minutes, function () {
            $url = 'apbd/list-postur';
            $apiRequest = $this->mediawave->get($url);
            return ($apiRequest->status == '200') ? $apiRequest->result : [];
        });

        if ($type == 'json') {
            return \GuzzleHttp\json_encode($postures);
        }

        return $postures;
    }

    public function getMapChart($year = '2016', $postureId = 1)
    {
        $url = 'apbd/1/' . $year . '/' . $postureId;
        $apiRequest = $this->mediawave->get($url, []);
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

    public function getProvinceChart($year, $postureId = '1', $provinceId)
    {
        $url = 'apbd/2/' . $year . '/' . $postureId . '/' . $provinceId;
//        $url .= $provinceId != '' ? '/' . $provinceId : '';
        $apiRequest = $this->mediawave->get($url, []);
        $result = ($apiRequest->status == '200') ? $apiRequest->result : [];

        // modified the api result
        $modifiedResult['data'] = [];
        if (isset($result->{'detail-map-provinsi'})) {
            $modifiedResult['data'] = $result->{'detail-map-provinsi'};
        }

        return \GuzzleHttp\json_encode($modifiedResult);
    }

    public function getAllChart($year = 2016)
    {
        $url = 'apbd/all/0/' . $year;

        return $this->mediawave->get($url);
    }

    public function getPostureNameById($postureId)
    {
        $postures = $this->getPostures();
        foreach ($postures as $posture) {
            if ($posture->id == $postureId) {
                return $posture->name;
            }
        }

        return '';
    }
}