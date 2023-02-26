<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\Product;

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
        $products=Product::all();

        return view('newPost',['products'=>$products]);
    }
    public function confirmNewPost(Request $request)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'max:255'],
            'client' => ['required', 'max:255'],
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

        $product = Product::whereIn( 'id', $request->product_id )->get();
        
        return view('confirmNewPost',[
            'post'=>$request->all(),
            'image_name'=>$file_name,
            'product'=>$product
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
        $post = new Post;
        $post->user_id=Auth::id();
        $post->title=$request->title;
        $post->client=$request->client;
        $post->start_date=$request->start_date;
        $post->end_date=$request->end_date;
        $post->content=$request->content;
        $post->factor=$request->factor;
        $post->image=$request->image;
        $post->save();    

// 中間テーブルに繋ぐ記述を書く
        $data=[];
        $productIds=explode(',', $request->product_id);
        foreach($productIds as $value){
            $data[]=[
                'product_id'=>$value,
                'post_id'=>$post->id,
            ];
        }
        DB::table('post_product')->insert($data);
        return view('completeNewPost');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $total = $post->product->sum('price');
        return view('postDetail',[
            'post'=>$post,
            'total'=>$total
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $products=Product::all();
        $total = $post->product->sum('price');
        return view('editMyPost',[
            'post'=>$post,
            'products'=>$products,
            'total'=>$total,
        ]);

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
        $validatedData = $request->validate([
            'title' => ['required', 'max:255'],
            'client' => ['required', 'max:255'],
            'start_date' => ['required'],
            'content' => ['required', 'max:255'],
            'factor' => ['required', 'max:255'],
            'price' => ['required'],
        ]);

        $post = Post::findOrFail($id);
        if($request->image){
            // ディレクトリ名
            $dir = 'images';

            // アップロードされたファイル名を取得
            $file_name = $request->file('image')->getClientOriginalName();

            // 取得したファイル名で保存
            $request->file('image')->storeAs('public/' . $dir, $file_name);
            $post->image = $file_name;
        }
        
        $post->title=$request->title;
        $post->client=$request->client;
        $post->start_date=$request->start_date;
        $post->end_date=$request->end_date;
        $post->content=$request->content;
        $post->factor=$request->factor;
        // $post->save();    

// 中間テーブルに繋ぐ記述を書く
        $data=[];
        $productIds = $request->product_id;
        $productCount = count($post->product);
        $productIdsCount = count($productIds);
        
        if($productCount > $productIdsCount){
            foreach($post->product as $product){
                foreach($productIds as $value){
                    if($product->id === $value){
                        continue 2;
                    }
                    DB::table('post_product')->where('product_id',$value)->where('post_id',$post->id)->delete();
                    continue;
                }
            }
        }
        elseif($productCount < $productIdsCount){
            foreach($productIds as $value){
                foreach($post->product as $product){
                    if($product->id === $value){
                        continue 2;
                    }
                    DB::table('post_product')->insert([
                        'product_id'=>$value,
                        'post_id'=>$post->id,
                    ]);
                    continue;
                }
            }
        }
        return view('completeNewPost');

    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('mypost')->with('flash_message', '投稿を削除しました');
    }
}
