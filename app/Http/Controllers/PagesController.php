<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Post;

class PagesController extends Controller
{
    public function getContact(){
        return view('pages.contact');
    }

    public function getAbout(){
        $first = 'Malik';
        $last = 'Aamir';
        $full = $first. " ". $last;
        $email = 'aamir@gmail.com';
        $data = [];
        $data['fullname'] = $full;
        $data['email'] = $email;
        return view('pages.about')->withData($data);
    }

    public function getIndex(){
        $posts = Post::orderBy('id', 'desc')->limit(4)->get();
        return view('pages.welcome')->withPosts($posts);
    }
}
