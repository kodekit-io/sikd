<?php

namespace App\Service;


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

    public function getMapChart($year = '2016', $reportType = 'pad')
    {
        $url = 'apbd/' . $reportType . '/1/' . $year;
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

    public function getProvinceChart($year, $reportType, $provinceId)
    {
        $url = 'apbd/' . $reportType . '/2/' . $year;
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

    public function getAllChart($year = 2016)
    {
        $url = 'apbd/all/0/' . $year;

        return $this->mediawave->get($url);
    }
}