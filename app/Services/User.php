<?php

namespace App\Service;


class User
{
    /**
     * @var Sikd
     */
    private $sikd;

    /**
     * User constructor.
     */
    public function __construct(Sikd $sikd)
    {
        $this->sikd = $sikd;
    }

    public function getUsers()
    {
        $result = $this->sikd->get('/user-djpk');
        return $result->result;
    }

    public function getUserById($id)
    {
        $result = $this->sikd->get('user-djpk/' . $id);
        return $result->result;
    }

    public function update($data, $id)
    {
        $name = $data['name'];
        $email = $data['email'];

        $params = [
            'name' => $name,
            'email' => $email
        ];

        return $this->sikd->put('user-djpk/' . $id, $params);
    }

    public function create($data)
    {
        $params = [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password']
        ];

        return $this->sikd->post('user-djpk', $params);
    }

    public function delete($id)
    {
        return $this->sikd->delete('user-djpk/' . $id);
    }
}