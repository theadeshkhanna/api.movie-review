<?php

namespace App\Services;

use App\Bookmark;
use App\Service\Contracts\CreateBookmarkContract;

class BookmarkService {

    public function createBookmark($user, CreateBookmarkContract $contract) {
        $bookmark = new Bookmark();

        $bookmark->user_id = $user->id;
        $bookmark->poster = $contract->getPoster();
        $bookmark->rating = $contract->getRating();
        $bookmark->runtime = $contract->getRuntime();
        $bookmark->title = $contract->getTitle();

        $bookmark->save();
        return $bookmark;
    }

    public function indexBookmarks($user) {
        return Bookmark::query()->where('user_id', '=', $user->id)->get();
    }
}
