<?php

namespace App\Http\Controllers;

use App\Service\AccountMapping;
use Illuminate\Http\Request;

class AccountMappingController extends Controller
{
    /**
     * @var AccountMapping
     */
    private $accountMapping;

    /**
     * AccountMappingController constructor.
     */
    public function __construct(AccountMapping $accountMapping)
    {
        $this->accountMapping = $accountMapping;
    }

    public function index()
    {
        $data['year'] = '2016';
        $data['classAkun'] = 'class="uk-active"';
        return view('sikd.account-mappings.list', $data);
    }

    public function getAccounts()
    {
        $accounts = $this->accountMapping->getAccounts();
        return \GuzzleHttp\json_encode($accounts);
    }

    public function add()
    {
        $data['year'] = '2016';
        $data['classAkun'] = 'class="uk-active"';
        return view('sikd.account-mappings.add', $data);
    }

    public function create(Request $request)
    {
        $response = $this->accountMapping->create($request->except(['_token']));
        if ($response->status == '200') {
            return redirect('account-mapping');
        }

        return redirect('account-mapping/add')->withErrors(['error' => $response->result]);
    }

    public function edit($id)
    {
        $data['account'] = $this->accountMapping->getAccountById($id);
        $data['year'] = '2016';
        $data['classAkun'] = 'class="uk-active"';
        $data['id'] = $id;
        return view('sikd.account-mappings.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $response = $this->accountMapping->update($request->except(['_token']), $id);
        if ($response->status == '200') {
            return redirect('account-mapping');
        }

        return redirect('account-mapping/' . $id . '/edit')->withErrors(['error' => $response->result]);
    }

    public function delete($id)
    {
        $response = $this->accountMapping->delete($id);
        if ($response->status == '200') {
            return redirect('account-mapping');
        }

        return redirect('account-mapping')->withErrors(['error' => $response->result]);
    }
}
