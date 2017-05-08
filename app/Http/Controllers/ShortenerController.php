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
    	# Check against Link Blacklist #while source!=unique gen new - have code that can be pasted into forum etc
        if (pingAddress($request->input('url')) == 0) { //check security of this & prevent link loops to this site

            $shortener = new Links;
            $shortener->userid = Auth::user()->id;
            $shortener->linkid = substr(md5(uniqid(mt_rand(), true)), 0, 7);
            $shortener->target = $request->input('url');

            $shortener->save();

            return redirect('/manage/'.$shortener->linkid);//redirect to controller path idk
        } else {
            return redirect('/');//link dead
        }
        
    }

    public function retrieveLink($linkid)
    {
        //grab any data here
        $linkData = Links::where('linkid', '=', $linkid)->first();

        //Add HTTP to begining of link if stored without it
        if (strpos($linkData->target, "http://") === False && strpos($linkData->target, "https://") === False) {
            $linkData->target = "http://" . $linkData->target;
        }

        return redirect()->away($linkData->target);
        //return $linkData->target;
    }

    public function allLinks()
    {
        $data['links'] = Links::all();
        
        return view('list', $data);
    }

    public function manageLink($linkid)
    {
        $manageData = Links::where('linkid', '=', $linkid)->first();
        if (Auth::user()->id == $manageData->userid || Auth::user()->admin == 1) {
            return view('manage', $manageData);
        } else {
            return redirect('/');
        }
    }

    public function myLinks()
    {
        $data['links'] = Links::all()->where('userid', '=', Auth::user()->id);
        return view('list', $data);
    }
}
