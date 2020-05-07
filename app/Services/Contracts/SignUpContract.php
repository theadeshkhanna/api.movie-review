<?php

namespace App\Services\Contracts;

interface SignUpContract {
    public function getName();
    public function getEmail();
    public function getPassword();
}
