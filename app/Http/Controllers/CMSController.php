<?php

namespace App\Http\Controllers;

use App\Service\Sikd;
use Illuminate\Http\Request;

class CMSController extends Controller
{

    private $sikd;

    /**
     * TestController constructor.
     */
    public function __construct(Sikd $sikd)
    {
        $this->sikd = $sikd;
    }

    public function manageAccount()
    {
        $data['year'] = '2016';
        return view('sikd.manage-account', $data);
    }
    public function manageAccountEdit()
    {
        $data['year'] = '2016';
        return view('sikd.manage-account-edit', $data);
    }

    public function manageTkdd()
    {
        $data['year'] = '2016';
        return view('sikd.manage-tkdd', $data);
    }
    public function manageApbd()
    {
        $data['year'] = '2016';
        return view('sikd.manage-apbd', $data);
    }

    public function getUserList()
    {
        $result = $this->sikd->get('/user-djpk');
        return \GuzzleHttp\json_encode($result->result);
    }
    public function addUser(array $inputs)
    {
        $params = [
            'id' => $inputs['id'],
            'name' => $inputs['name'],
            'email' => $inputs['email'],
            'created_at' => $inputs['created_at'],
            'updated_at' => $inputs['updated_at']
        ];
        return $this->sikd->post('/user-djpk', $params);
    }

    public function getTKDDPosturList()
    {
        $result = $this->sikd->get('/ref-tkdd-postur');
        return \GuzzleHttp\json_encode($result->result);
    }
    public function getAPBDPosturList()
    {
        $result = $this->sikd->get('/ref-apbd-postur');
        return \GuzzleHttp\json_encode($result->result);
    }
    public function getAPBDMappingList()
    {
        $result = $this->sikd->get('/ref-apbd-akun-mapping');
        return \GuzzleHttp\json_encode($result->result);
    }
}
