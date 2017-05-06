<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostURL;

use Auth;
use App\URL as URLs;

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
    	# Check against URL Blacklist #while source!=unique gen new
        $shortener = new URL;
        $shortener->userid = Auth::user()->id;
        $shortener->linkid = substr(md5(uniqid(mt_rand(), true)), 0, 7);
        $shortener->target = $request->input('url');

        $shortener->save();

        return view('index');
    }

    public function retrieveURL($linkid)
    {
        //grab any data here
        $linkData = URLs::where('source', '=', $linkid)->first();
        return $linkData->target;

    }
}
