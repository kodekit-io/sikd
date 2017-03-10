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

    public function add($name, $email)
    {
        $params = [
            'name' => $name,
            'email' => $email
        ];

        $this->sikd->post('user-djpk', $params);
    }
}