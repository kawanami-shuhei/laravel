<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\myPost;


class myPostController extends Controller
{
    public function myPost(){
        $myPosts = DB::table('posts')->where('user_id',\Auth::user()->id)->get();
        // $products = DB::table('post_product')
        return view('myPost')->with(['myPosts'=>$myPosts]);
    }
    public function editMyPost(){
        return view('editMyPost');
    }
}
