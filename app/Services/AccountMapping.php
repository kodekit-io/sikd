<?php

namespace App\Service;


class AccountMapping
{
    /**
     * @var Sikd
     */
    private $sikd;

    /**
     * AccountMapping constructor.
     */
    public function __construct(Sikd $sikd)
    {
        $this->sikd = $sikd;
    }

    public function getAccounts()
    {
        $result = $this->sikd->get('ref-apbd-akun-mapping');
        return $result->result;
    }

    public function getAccountById($id)
    {
        $result = $this->sikd->get('ref-apbd-akun-mapping/' . $id);
        return $result->result;
    }

    public function create($data)
    {
        $params = [
            'kodeakunutama' => $data['primary_account'],
            'kodeakunkelompok' => $data['group_account'],
            'kodeakunjenis' => $data['account_type'],
            'urakun' => $data['name'],
            'label' => $data['label']
        ];

        return $this->sikd->post('ref-apbd-akun-mapping', $params);
    }

    public function update($data, $id)
    {
        $params = [
            'kodeakunutama' => $data['primary_account'],
            'kodeakunkelompok' => $data['group_account'],
            'kodeakunjenis' => $data['account_type'],
            'urakun' => $data['name'],
            'label' => $data['label']
        ];

        return $this->sikd->put('ref-apbd-akun-mapping/' . $id, $params);
    }

    public function delete($id)
    {
        return $this->sikd->delete('ref-apbd-akun-mapping/' . $id);
    }
}