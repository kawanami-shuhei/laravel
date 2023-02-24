<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        // クエリビルダ
        $name=$request->input('name') ?? null;
        $department=$request->input('department') ?? null;
        $number=$request->input('number') ?? null;

       // もし検索フォームにキーワードが入力されたら
       $data = User::searchName($name)
       ->searchDepartment($department)
       ->searchNumber($number)
       ->select(
        'users.name',
        'users.department',
        'users.number',
        'users.id'
       )
       ->get(); 
       return response()->json($data);
    }
    public function delete(User $user)
    {
        $user->del_flg = 1;
        $user->update();
        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=User::findOrFail($id);
        $user->number=$request->number;
        $user->name=$request->name;
        $user->department=$request->department;
        $user->email=$request->email;
        $user->save();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user,$id)
    {
        $user=User::findOrFail($id);
        return view('editUser')->with(['user'=>$user]);;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $user=User::findOrFail($id);
        $user->number=$request->number;
        $user->name=$request->name;
        $user->department=$request->department;
        $user->email=$request->email;
        $user->save();
        return view('completeEditUser');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin')->with('flash_message', 'ユーザーを削除しました');
    }
}
