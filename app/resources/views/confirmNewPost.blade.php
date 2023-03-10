@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
                <div class="mx-auto mb-5 display-3">mypage</div>
                <div class="mx-auto mb-5 display-4">新規登録内容確認</div>
                
                <div class="mx-auto mb-5 display-5 d-flex">
                    <div class="mr-2">タイトル</div>
                    <div style='width:400px'>{{ $post['title'] }}</div>
                </div>
                <div class="mx-auto mb-5 d-flex">
                    <div class="mr-2">名前</div>
                    <div style='width:100px'>{{ Auth::user()->name }}</div>
                    <div class="mr-2">部署名</div>
                    <div style='width:100px'>{{ Auth::user()->department }}</div>
                </div>
                <div class="mx-auto mb-5 d-flex">
                    <div class="mr-2">得意先</div>
                    <div style='width:100px'>{{ $post['client'] }}</div>
                    <div class="mr-2">導入商品</div>
                    @foreach($product as $pro)
                    <div>{{ $pro->name }}　</div>
                    @endforeach
                </div>
                <div class="mx-auto mb-5 d-flex">
                    <div class="mr-2">売上金額</div>
                    <div style='width:150px'>{{ $post['price'] }} 円  （期間見込）</div>
                    <diV></div>
                </div>
                <div class="mx-auto mb-5 d-flex">
                    <div class="mr-2">導入期間</div>
                    <div style='width:150px'>{{ $post['start_date'] }}</div>
                    <div>〜</div>
                    <div style='width:150px'>{{ $post['end_date'] }}</div>
                </div>
                <div class="mx-auto mb-5">
                    <div>商談内容</div>
                    <div rows="5">{{ $post['content'] }}</div>
                </div>

                <div class="form-group mx-auto mb-5">
                    <div>導入の決め手</div>
                    <div rows="5">{{ $post['factor'] }}</div>
                </div>
                <div class="mx-auto mb-5">
                    <div>画像の添付</div>
                    <img src="{{ asset('/storage/images/'.$image_name) }}">
                </div>
                <form method="POST" action="{{route('posts.store') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="title" value="{{ $post['title']}}">
                <input type="hidden" name="name" value="{{ Auth::user()->name }}">
                <input type="hidden" name="department" value="{{ Auth::user()->department}}">
                <input type="hidden" name="client" value="{{ $post['client']}}">
                <input type="hidden" name="product_id" value="{{ implode(',', $post['product_id']) }}">
                <input type="hidden" name="start_date" value="{{ $post['start_date']}}">
                <input type="hidden" name="end_date" value="{{ $post['end_date']}}">
                <input type="hidden" name="content" value="{{ $post['content']}}">
                <input type="hidden" name="factor" value="{{ $post['factor']}}">
                <input type="hidden" name="image" value="{{ $image_name}}">
                <button type="back" onclick="history.back()" class="mr-3">編集に戻る</button>
                <button>登録する</button>
                </form>
               
                
                
                
                
                
            </div>
        </div>
    </div>
</div>
@endsection