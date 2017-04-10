<?php

if (!function_exists('get_months')) {
    function get_months() {
        return [
            '1' => 'Januari',
            '2' => 'Februari',
            '3' => 'Maret',
            '4' => 'April',
            '5' => 'Mei',
            '6' => 'Juni',
            '7' => 'Juli',
            '8' => 'Agustus',
            '9' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember'
        ];
    }
}

if (!function_exists('is_allowed')) {
    function is_allowed($roleName) {
        $roles = session('userAttributes')['role'];
        $userRoles = explode(',', $roles);
        if (in_array($roleName, $userRoles)) {
            return true;
        }
        return false;
    }
}