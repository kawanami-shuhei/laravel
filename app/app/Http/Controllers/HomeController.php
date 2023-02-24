<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->role==1){
            return view('home');
        }elseif(Auth::user()->role==0){
            return view('admin');
        }
        
    }
    public function search(Request $request)
    {
        // クエリビルダ
        $name=$request->input('name') ?? null;
        $department=$request->input('department') ?? null;
        $client=$request->input('client') ?? null;

       // もし検索フォームにキーワードが入力されたら
       $data = User::join('posts','users.id','=','posts.user_id')
       ->searchName($name)
       ->searchDepartment($department)
       ->searchClient($client)
       ->select(
        'users.name',
        'users.department',
        'posts.title',
        'posts.client',
        'posts.id as post_id',
       )
       ->get(); 
       return response()->json($data);
    }
}
