<?php

namespace App;


class CmsService
{
    private $sikd;

    public function __construct(Sikd $sikd)
    {
        $this->sikd = $sikd;
    }

}