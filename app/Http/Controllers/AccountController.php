<?php

namespace App\Http\Controllers;

use App\Service\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * @var Account
     */
    private $account;

    /**
     * AccountController constructor.
     */
    public function __construct(Account $account)
    {
        $this->account = $account;
    }

    public function index()
    {
        $accounts = $this->account->getAccounts();
    }

}
