<?php

namespace App\Http\Controllers;

use App\Service\Apbd;
use Illuminate\Http\Request;

class ApbdController extends Controller
{
    /**
     * @var Apbd
     */
    private $apbd;

    /**
     * ApbdController constructor.
     */
    public function __construct(Apbd $apbd)
    {
        $this->apbd = $apbd;
    }

    public function index()
    {
        $data['year'] = '2016';
        return view('sikd.apbd-postures.list', $data);
    }

    public function getPostures()
    {
        $postures = $this->apbd->getApbdPostures();
        return \GuzzleHttp\json_encode($postures);
    }

    public function add()
    {
        $data['year'] = '2016';
        return view('sikd.apbd-postures.add', $data);
    }

    public function create(Request $request)
    {
        $response = $this->apbd->create($request->except(['_token']));
        if ($response->status == '200') {
            return redirect('apbd-posture');
        }

        return redirect('apbd-posture/add')->withErrors(['error' => $response->result]);
    }

    public function edit($id)
    {
        $data['posture'] = $this->apbd->getPostureById($id);
        $data['year'] = '2016';
        $data['id'] = $id;
        return view('sikd.apbd-postures.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $response = $this->apbd->update($request->except(['_token']), $id);
        if ($response->status == '200') {
            return redirect('apbd-posture');
        }

        return redirect('apbd-posture/' . $id . '/edit')->withErrors(['error' => $response->result]);
    }

    public function delete($id)
    {
        $response = $this->apbd->delete($id);
        if ($response->status == '200') {
            return redirect('apbd-posture');
        }

        return redirect('apbd-posture')->withErrors(['error' => $response->result]);
    }
}
