<?php

namespace App\Service;


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
        $url = 'index-pemda';
        return $this->mediawave->get($url, []);
    }

}