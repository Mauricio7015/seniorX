<?php

namespace SeniorX\SeniorX;

use Senior\src\Conta;
use Senior\src\Login;

class Senior {
    public function senior($login, $password, $method) {
        $token = $this->login($login, $password); 

        $this->$method($token);
    }

    public function login($login, $password) {
        return new Conta($login, $password);
    }

    public function teste($token) {
        dd($token);
    }
}