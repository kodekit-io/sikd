<?php

namespace App\Http\Controllers;

use App\Service\Mediawave;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * @var Mediawave
     */
    private $mediawave;

    /**
     * TestController constructor.
     */
    public function __construct(Mediawave $mediawave)
    {
        $this->mediawave = $mediawave;
    }

    public function apbd()
    {
        $result = $this->mediawave->get('apbd/all/0/2016');
        var_dump($result);
    }
}
