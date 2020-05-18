<?php

namespace App\Api\V1\Controllers;

use App\Api\V1\Requests\CreateBookmarkRequest;
use App\Api\V1\Transformers\BookmarkTransformer;
use App\Services\BookmarkService;
use Illuminate\Support\Facades\Auth;

class BookmarksController extends BaseController {
    protected $bookmarkService;

    public function __construct() {
        $this->bookmarkService = new BookmarkService();
    }

    public function create(CreateBookmarkRequest $request) {
        $bookmark = $this->bookmarkService->createBookmark(Auth::user(), $request);
        return $this->response->item($bookmark, new BookmarkTransformer());
    }

    public function index() {
        $bookmarks = $this->bookmarkService->indexBookmarks(Auth::user());
        return $this->response->collection($bookmarks, new BookmarkTransformer());
    }
}
