<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TweetCollection;
use App\Models\User;
use Illuminate\Http\Request;

class TimelineController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth:sanctum");
    }

    public function index(Request $request)
    {
        $tweets = $request
            ->user()
            ->followingTweets()
            ->latest()
            ->with(["user"])
            ->paginate(5);

        return new TweetCollection($tweets);
    }
}
