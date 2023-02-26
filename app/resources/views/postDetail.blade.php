@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
                <div class="mx-auto mb-5 display-4">事例詳細</div>
                
                <div class="mx-auto mb-5 display-5 d-flex">
                    <div class="mr-2">タイトル</div>
                    <div style='width:400px'>{{$post->title}}</div>
                </div>
                <div class="mx-auto mb-5 d-flex">
                    <div class="mr-2">名前</div>
                    <div style='width:100px'>{{ Auth::user()->name }}</div>
                    <div class="mr-2">部署名</div>
                    <div style='width:100px'>{{ Auth::user()->department }}</div>
                </div>
                <div class="mx-auto mb-5 d-flex">
                    <div class="mr-2">得意先</div>
                    <div style='width:100px'>{{ $post->client }}</div>
                    <div class="mr-2">導入商品</div>
                    @foreach($post->product as $product)
                    <div>{{ $product->name }}</div>
                    @endforeach
                </div>
                <div class="mx-auto mb-5 d-flex">
                    <div class="mr-2">導入期間</div>
                    <div style='width:100px'>{{ $post->start_date }}</div>
                    <div>〜　</div>
                    <div style='width:150px'>{{ $post->end_date }}</div>
                </div>
                <div class="mx-auto mb-5 d-flex">
                    <div class="mr-2">売上金額</div>
                    <div style='width:150px'>{{ $total }}　円（期間見込）</div>
                </div>
                <div class="mx-auto mb-5">
                    <div class="mr-2">商談内容</div>
                    <div rows="5">{{ $post->content }}</div>
                </div>

                <div class="form-group mx-auto mb-5">
                    <div class="mr-2">導入の決め手</div>
                    <div rows="5">{{ $post->factor }}</div>
                </div>
                <div class="mx-auto mb-5">
                    <div>画像の添付</div>
                    <img src="{{ asset('/storage/images/'.$post->image) }}">
                </div>
                
                
                
                
               <button type="back" onclick="history.back()" >戻る</button>
            </div>
        </div>
    </div>
</div>
@endsection