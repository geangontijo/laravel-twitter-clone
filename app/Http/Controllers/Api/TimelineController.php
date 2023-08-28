<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TweetCollection;
use App\Models\User;
use Illuminate\Http\Request;

class TimelineController extends Controller
{
    public function index(Request $request)
    {
        $tweets = $request->user()->followingTweets()->paginate(5);

        return new TweetCollection($tweets);
    }
}
