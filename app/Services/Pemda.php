<?php

namespace App\Service;


use Illuminate\Support\Facades\Cache;

class Pemda
{
    /**
     * @var Mediawave
     */
    private $mediawave;

    /**
     * Pemda constructor.
     * @param Mediawave $mediawave
     */
    public function __construct(Mediawave $mediawave)
    {
        $this->mediawave = $mediawave;
    }

    public function getChart($year, $satkerCode, $type = 'json')
    {
        $url = 'level-3/' . $year . '/' . $satkerCode;
        $apiRequest = $this->mediawave->get($url, []);
        $result = ($apiRequest->status == '200') ? $apiRequest->result : [];
        $modifiedResult['detailKotakabTop'] = [];
        if (isset($result->{'detail-kotakab-top'})) {
            $modifiedResult['detailKotakabTop'] = $result->{'detail-kotakab-top'};
        }

        if (isset($modifiedResult['detailKotakabTop'])) {
            $modifiedResult['detailKotakabTop'][0]->mapInfo = $modifiedResult['detailKotakabTop'][0]->{'map-info'};
        }

        if ($type == 'json') {
            return \GuzzleHttp\json_encode($modifiedResult);
        }

        return $modifiedResult;
    }

    public function getAllPemda($type = 'array')
    {
        $minutes = 14 * 24 * 60;
        $pemdas = Cache::remember('pemdas', $minutes, function () {
            $url = 'ref-pemda';
            $apiRequest = $this->mediawave->get($url, []);
            return ($apiRequest->status == '200') ? $apiRequest->result : [];
        });

        if ($type == 'json') {
            return \GuzzleHttp\json_encode($pemdas);
        }

        return $pemdas;
    }

    public function getPemdaNameBySatkerCode($satkerCode)
    {
        $pemdas = $this->getAllPemda();
        foreach ($pemdas as $pemda) {
            if ($pemda->kdsatker == $satkerCode) {
                return $pemda->urpemda;
            }
        }

        return 'Pemda not found.';
    }

    public function getTkddTableData($year, $satkerCode)
    {
        $url = 'tkdd/tabel/' . $year . '/3/' . $satkerCode;

        return $this->mediawave->getJsonResult($url);
    }

    public function getOtherTableData($satkerCode)
    {
        $url = 'tabel-lainnya/tabel/' . $satkerCode;

        return $this->mediawave->getJsonResult($url);
    }
}