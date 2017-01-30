<?php

namespace App\Service;


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

    public function getPostur($groupId = 1)
    {
        //
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
}