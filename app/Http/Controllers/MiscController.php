<?php

namespace App\Http\Controllers;

use App\Service\Mediawave;
use Illuminate\Http\Request;

class MiscController extends Controller
{
    /**
     * @var Mediawave
     */
    private $mediawave;

    /**
     * MiscController constructor.
     * @param Mediawave $mediawave
     */
    public function __construct(Mediawave $mediawave)
    {
        $this->mediawave = $mediawave;
    }

    public function apiException()
    {
        $params = [ 'tahun' => 2019 ];
        $response = $this->mediawave->get('TKDD', $params);
        var_dump($response);
    }
}
