@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
                <div class="mx-auto mb-5 display-3">mypage</div>
                <div class="mx-auto mb-5 display-4">新規登録内容確認</div>
                
                <div class="mx-auto mb-5 display-5 d-flex">
                    <div>タイトル</div>
                    <div style='width:400px'>{{$post->title}}</div>
                </div>
                <div class="mx-auto mb-5 d-flex">
                    <div>名前</div>
                    <div style='width:100px'>{{ $post->name }}</div>
                    <div>部署名</div>
                    <div style='width:100px'>{{ Auth::user()->department }}</div>
                </div>
                <div class="mx-auto mb-5 d-flex">
                    <div>得意先</div>
                    <div style='width:100px'>{{ $post->client }}</div>
                    <div>導入商品</div>
                    @foreach($post->product as $product)
                    <div>{{ $product->name }}</div>
                    @endforeach
                </div>
                <div class="mx-auto mb-5 d-flex">
                    <div>導入期間</div>
                    <div style='width:150px'>{{ $post->start_date }}</div>
                    <div>〜</div>
                    <div style='width:150px'>{{ $post->end_date }}</div>
                </div>
                <div class="mx-auto mb-5 d-flex">
                    <div>売上金額</div>
                    <div style='width:150px'></div>
                    <diV>（期間見込）</div>
                </div>
                <div class="mx-auto mb-5">
                    <div>商談内容</div>
                    <div rows="5">{{ $post->content }}</div>
                </div>

                <div class="form-group mx-auto mb-5">
                    <div>導入の決め手</div>
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