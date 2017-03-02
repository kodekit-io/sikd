<?php

namespace App\Http\Controllers;

use App\Service\Sikd;
use Illuminate\Http\Request;

class MiscController extends Controller
{
    /**
     * @var Sikd
     */
    private $sikd;

    /**
     * MiscController constructor.
     * @param Sikd $sikd
     */
    public function __construct(Sikd $sikd)
    {
        $this->sikd = $sikd;
    }

    public function apiException()
    {
        $params = [ 'tahun' => 2019 ];
        $response = $this->sikd->get('TKDD', $params);
        var_dump($response);
    }
}
