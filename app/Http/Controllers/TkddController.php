<?php

namespace App\Http\Controllers;

use App\Service\AccountMapping;
use App\Service\Tkdd;
use Illuminate\Http\Request;

class TkddController extends Controller
{
    /**
     * @var Tkdd
     */
    private $tkdd;

    /**
     * TkddController constructor.
     */
    public function __construct(Tkdd $tkdd)
    {
        $this->tkdd = $tkdd;
    }

    public function index()
    {
        $data['classTkdd'] = 'class="uk-active"';
        return view('sikd.tkdd-postures.list', $data);
    }

    public function getPostures()
    {
        $postures = $this->tkdd->getTkddPostures();
        return \GuzzleHttp\json_encode($postures);
    }

    public function add()
    {
        $data['classTkdd'] = 'class="uk-active"';
        return view('sikd.tkdd-postures.add', $data);
    }

    public function create(Request $request)
    {
        $response = $this->tkdd->create($request);
        if ($response->status == '200') {
            return redirect('tkdd-posture');
        }

        return redirect('tkdd-posture/add')->withErrors(['error' => $response->result]);
    }

    public function edit($id)
    {
        $data['posture'] = $this->tkdd->getPostureById($id);
        $data['id'] = $id;
        $data['classTkdd'] = 'class="uk-active"';
        return view('sikd.tkdd-postures.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $response = $this->tkdd->update($request, $id);
        if ($response->status == '200') {
            return redirect('tkdd-posture');
        }

        return redirect('tkdd-posture/' . $id . '/edit')->withErrors(['error' => $response->result]);
    }

    public function delete($id)
    {
        $response = $this->tkdd->delete($id);
        if ($response->status == '200') {
            return redirect('tkdd-posture');
        }

        return redirect('tkdd-posture')->withErrors(['error' => $response->result]);
    }
}
