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
        $data['classUser'] = 'class="uk-active"';
        return view('sikd.users.list', $data);
    }

    public function getUsers()
    {
        $users = $this->user->getUsers();
        return \GuzzleHttp\json_encode($users);
    }

    public function add()
    {
        $data['year'] = '2016';
        $data['classUser'] = 'class="uk-active"';
        return view('sikd.users.add', $data);
    }

    public function create(Request $request)
    {
        $response = $this->user->create($request->except(['_token']));
        if ($response->status == '200') {
            return redirect('user');
        }

        return redirect('user/add')->withErrors(['error' => $response->result]);
    }

    public function edit($id)
    {
        $data['user'] = $this->user->getUserById($id);
        $data['year'] = '2016';
        $data['id'] = $id;
        $data['classUser'] = 'class="uk-active"';
        return view('sikd.users.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $response = $this->user->update($request->except(['_token']), $id);
        if ($response->status == '200') {
            return redirect('user');
        }

        return redirect('user/' . $id . '/edit')->withErrors(['error' => $response->result]);
    }

    public function delete($id)
    {
        $response = $this->user->delete($id);
        if ($response->status == '200') {
            return redirect('user');
        }

        return redirect('user')->withErrors(['error' => $response->result]);
    }
}
