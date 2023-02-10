<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('researchPost');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('newPost');
    }
    public function confirmNewPost(Request $request)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'max:255'],
            'client' => ['required', 'max:255'],
            'commodity' => ['required'],
            'start_date' => ['required'],
            'content' => ['required', 'max:255'],
            'factor' => ['required', 'max:255'],
            'price' => ['required'],
            'image' => ['required', 'max:1024','mimes:jpg,jpeg,png,gif'],
        ]);

        // ディレクトリ名
        $dir = 'images';

        // アップロードされたファイル名を取得
        $file_name = $request->file('image')->getClientOriginalName();

        // 取得したファイル名で保存
        $request->file('image')->storeAs('public/' . $dir, $file_name);

        return view('confirmNewPost',[
            'post'=>$request->all(),
            'image_name'=>$file_name,
        ]);
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $post = new Post;
        $post->user_id=Auth::id();
        $post->title=$request->title;
        $post->client=$request->client;
        $post->commodity=$request->commodity;
        $post->start_date=$request->start_date;
        $post->end_date=$request->end_date;
        $post->content=$request->content;
        $post->factor=$request->factor;
        $post->image=$request->image;
        $post->save();
        return view('completeNewPost');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
