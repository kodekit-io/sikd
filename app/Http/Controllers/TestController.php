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
    public function map($reportType,$year,$postureId)
    {
        if ($reportType==='apbd' && $postureId==='10') {
            $param = $reportType . '/lra/1/' . $year;
        } else {
            $param = $reportType . '/1/' . $year . '/' . $postureId;
        }

        $result = $this->sikd->get($param);
        //dd($result);
        return \GuzzleHttp\json_encode($result);
    }
    public function api5($a,$b,$c,$d,$e)
    {
        $param = $a . '/' . $b . '/' . $c . '/' . $d . '/' . $e;
        $result = $this->sikd->get($param);
        //dd($result);
        echo $param . '<br><pre>'.json_encode($result, JSON_PRETTY_PRINT).'</pre>';
    }
    public function api4($a,$b,$c,$d)
    {
        $param = $a . '/' . $b . '/' . $c . '/' . $d;
        $result = $this->sikd->get($param);
        //dd($result);
        echo $param . '<br><pre>'.json_encode($result, JSON_PRETTY_PRINT).'</pre>';
    }
    public function api3($a,$b,$c)
    {
        $param = $a . '/' . $b . '/' . $c;
        $result = $this->sikd->get($param);
        //dd($result);
        echo $param . '<br><pre>'.json_encode($result, JSON_PRETTY_PRINT).'</pre>';
    }
    public function api2($a,$b)
    {
        $param = $a . '/' . $b;
        $result = $this->sikd->get($param);
        //dd($result);
        echo $param . '<br><pre>'.json_encode($result, JSON_PRETTY_PRINT).'</pre>';
    }
    public function api1($a)
    {
        $param = $a;
        $result = $this->sikd->get($param);
        //dd($result);
        echo $param . '<br><pre>'.json_encode($result, JSON_PRETTY_PRINT).'</pre>';
    }
}
