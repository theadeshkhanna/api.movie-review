<?php

namespace App\Api\V1\Transformers;

use App\Api\V1\Transformers\Traits\BookmarkDetailTrait;
use App\Bookmark;
use League\Fractal\TransformerAbstract;

class BookmarkTransformer extends TransformerAbstract {
    use BookmarkDetailTrait;

    public function transform(Bookmark $bookmark) {
        return $this->getAttributes($bookmark);
    }
}
