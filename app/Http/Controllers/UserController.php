<?php

namespace App\Http\Controllers;

use App\Service\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * @var User
     */
    private $user;

    /**
     * UserController constructor.
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $data['year'] = '2016';
        return view('sikd.manage-account', $data);
    }

    public function getUsers()
    {
        $users = $this->user->getUsers();
        return \GuzzleHttp\json_encode($users);
    }

    public function add(Request $request)
    {
        $data = $request->get('data');

        $value = [];
        parse_str($data, $value);
        $name = $value['name'];
        $email = $value['email'];

        if ($this->user->add($name, $email)) {
            return 'OK';
        }

        return 'KO';
    }

    public function edit($id)
    {
        $data['user'] = $this->user->getUserById($id);
        $data['year'] = '2016';
        $data['id'] = $id;
        return view('sikd.manage-account-edit', $data);
    }

    public function update(Request $request, $id)
    {
        $response = $this->user->update($request->except(['_token']), $id);
        if ($response->status == '200') {
            return redirect('manage-account');
        }

        return redirect('user/' . $id . '/edit')->withErrors(['error' => $response->result]);
    }

    public function delete($id)
    {

    }
}
