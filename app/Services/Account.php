<?php

namespace App\Service;


class Account
{
    /**
     * @var Sikd
     */
    private $sikd;

    /**
     * Account constructor.
     */
    public function __construct(Sikd $sikd)
    {
        $this->sikd = $sikd;
    }

    public function getAccounts()
    {
        $users = $this->sikd->get('ref-tkdd-akun');
        dd($users);
    }
}