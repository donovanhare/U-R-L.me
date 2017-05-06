<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostURL;

use Auth;
use App\Link as Links;

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

    public function createLink(PostURL $request)
    {
    	# Check against Link Blacklist #while source!=unique gen new
        $shortener = new Links;
        $shortener->userid = Auth::user()->id;
        $shortener->linkid = substr(md5(uniqid(mt_rand(), true)), 0, 7);
        $shortener->target = $request->input('url');

        $shortener->save();

        return redirect('/');
    }

    public function retrieveLink($linkid)
    {
        //grab any data here
        $linkData = Links::where('linkid', '=', $linkid)->first();
        return redirect()->away($linkData->target);
        //return $linkData->target;

    }
}
