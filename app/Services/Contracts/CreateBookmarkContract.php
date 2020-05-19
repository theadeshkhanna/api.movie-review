<?php

namespace App\Services\Contracts;

interface CreateBookmarkContract {
    public function getTitle();
    public function getRating();
    public function getPoster();
    public function getRuntime();
}
