<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostURL;

use App\URL;

class ShortenerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function createURL(PostURL $request)
    {
    	# Check against URL Blacklist
        $shortener = new URL;

        $shortener->uid = Auth::user()->id;
        $shortener->source = substr(md5(uniqid(mt_rand(), true)), 0, 7);
        $shortener->target = $request->url;

        $shortener->save();

        return view('home');
    }
}
