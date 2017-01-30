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

    public function getChart($level, $year = '2016', $reportType = 'pad', $provinceId = '')
    {
        $url = 'apbd/' . $reportType . '/' . $level . '/' . $year;
        $url .= $provinceId != '' ? '/' . $provinceId : '';
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
}