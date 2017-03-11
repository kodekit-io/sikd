<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TkddController extends Controller
{
    public function index()
    {
        $data['year'] = '2016';
        return view('sikd.manage-tkdd', $data);
    }
}
