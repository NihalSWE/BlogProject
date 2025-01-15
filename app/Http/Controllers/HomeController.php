<?php

namespace App\Http\Controllers;
use App\Models\Posts;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function index()
    {
        if (Auth::id()) {
            $post = Posts::all();
            $usertype = Auth::user()->usertype;

            if ($usertype == "user") {

                return view("home.homepage", ['post' => $post]);
            } elseif ($usertype == "admin") {
                return view("admin.index");
            } else {
                return redirect("")->back();
            }

        }
    }

    public function homepage()
    {
        $post = Posts::all();
        return view("home.homepage", ['post' => $post]);
    }



}
