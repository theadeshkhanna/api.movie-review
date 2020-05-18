<?php

namespace App\Api\V1\Transformers\Traits;

use App\Bookmark;

trait BookmarkDetailTrait {
    public function getAttributes(Bookmark $bookmark) {
        return [
            'poster' => $bookmark->poster,
            'runtime' => $bookmark->runtime,
            'rating' => $bookmark->rating,
            'title' => $bookmark->title
        ];
    }
}
