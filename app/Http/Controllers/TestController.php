<?php

namespace App\Http\Controllers;

use App\Service\Sikd;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * @var Sikd
     */
    private $sikd;

    /**
     * TestController constructor.
     */
    public function __construct(Sikd $sikd)
    {
        $this->sikd = $sikd;
    }

    public function apbd()
    {
        $result = $this->sikd->get('apbd/all/0/2016');
        var_dump($result);
    }
}
