<?php

namespace App\Service;


use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;

class Tkdd
{
    /**
     * @var Mediawave
     */
    private $mediawave;

    /**
     * Tkdd constructor.
     * @param Mediawave $mediawave
     */
    public function __construct(Mediawave $mediawave)
    {
        $this->mediawave = $mediawave;
    }

    public function getGroup()
    {
        //
    }

    public function getPostures($groupId = 3, $type = 'array')
    {
        $minutes = 5 * 24 * 60;
        $postures = Cache::remember('postures', $minutes, function () use ($groupId) {
            $url = 'tkdd/list-group/' . $groupId;
            $apiRequest = $this->mediawave->get($url, []);
            return ($apiRequest->status == '200') ? $apiRequest->result : [];
        });

        if ($type == 'json') {
            return \GuzzleHttp\json_encode($postures);
        }

        return $postures;
    }

    public function getAllChart($year = '2016', $groupId = 3)
    {
        if (config('app.env') != 'production') {
            $path = public_path('data/tkdd-home.json');
            $jsonResult = File::get($path);
            $jsonResult = \GuzzleHttp\json_decode($jsonResult);
            return new SimpleAPIResponse(200, $jsonResult);
        }

        $url = 'tkdd/all/0/' . $year . '/' . $groupId;
        $apiRequest = $this->mediawave->get($url, []);
        $result = ($apiRequest->status == '200') ? $apiRequest->result : [];

        return $result;
    }

    public function isPostureId($id)
    {
        $postures = $this->getPostures();
        foreach ($postures as $posture) {
            if ($posture->idPostur == $id) {
                return true;
            }
        }

        return false;
    }

    public function getPosturNameById($postureId)
    {
        $postures = $this->getPostures();
        foreach ($postures as $posture) {
            if ($posture->idPostur == $postureId) {
                return $posture->uraianPosturSingkat;
            }
        }

        return '';
    }

    public function getMapChart($year, $reportType)
    {
        $url = 'tkdd/1/' . $year . '/' . $reportType;
        $apiRequest = $this->mediawave->get($url, []);
        $result = ($apiRequest->status == '200') ? $apiRequest->result : [];

        // modified the api result
        $modifiedResult['data'] = [];
        if (isset($result->map)) {
            $modifiedResult['data'] = $result->map;
        }

        return \GuzzleHttp\json_encode($modifiedResult);
    }

    public function getProvinceChart($year, $postureId = '39', $provinceId = '')
    {
        $url = 'tkdd/2/' . $year . '/' . $postureId;
        $url .= $provinceId != '' ? '/' . $provinceId : '';
        $apiRequest = $this->mediawave->get($url, []);
        $result = ($apiRequest->status == '200') ? $apiRequest->result : [];

        // modified the api result
        $modifiedResult['data'] = [];
        if (isset($result->{'detail-map-provinsi'})) {
            $modifiedResult['data'] = $result->{'detail-map-provinsi'};
        }

        return \GuzzleHttp\json_encode($modifiedResult);
    }
}