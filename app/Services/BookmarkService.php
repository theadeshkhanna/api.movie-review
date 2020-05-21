<?php

namespace App\Services;

use App\Api\V1\Exceptions\BookmarkAlreadyExists;
use App\Bookmark;
use App\Services\Contracts\CreateBookmarkContract;
use App\Services\Contracts\DeleteBookmarkContract;

class BookmarkService {

    public function createBookmark($user, CreateBookmarkContract $contract) {

        $bookmark = Bookmark::query()->where('user_id', '=', $user->id)
            ->where('imdb_id', '=', $contract->getImdbID());

        if ($bookmark->exists()) {
            throw new BookmarkAlreadyExists();
        } else {
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
    }

    public function indexBookmarks($user) {
        return Bookmark::query()->where('user_id', '=', $user->id)->get();
    }

    public function deleteBookmark(DeleteBookmarkContract $contract) {
        $bookmark = Bookmark::query()->where('imdb_id', '=', $contract->getImdbId())->get();
        $bookmark->delete();
    }
}
