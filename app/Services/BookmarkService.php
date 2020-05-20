<?php

namespace App\Services;

use App\Bookmark;
use App\Services\Contracts\CreateBookmarkContract;

class BookmarkService {

    public function createBookmark($user, CreateBookmarkContract $contract) {
        $bookmark = new Bookmark();

        $bookmark->user_id = $user->id;
        $bookmark->imdb_id = $contract->getImdbID();
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
