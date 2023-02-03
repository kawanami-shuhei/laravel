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
                    <input style='width:400px'>
                </div>
                <div class="mx-auto mb-5 d-flex">
                    <div>名前</div>
                    <input style='width:100px'>
                    <div>部署名</div>
                    <input style='width:100px'>
                </div>
                <div class="mx-auto mb-5 d-flex">
                    <div>得意先</div>
                    <input style='width:100px'>
                    <div>導入商品</div>
                    <input style='width:100px'>
                </div>
                <div class="mx-auto mb-5 d-flex">
                    <div>導入期間</div>
                    <input style='width:150px'>
                    <div>〜</div>
                    <input style='width:150px'>
                </div>
                <div class="mx-auto mb-5 d-flex">
                    <div>売上金額</div>
                    <input style='width:150px'>
                    <diV>（期間見込）</div>
                </div>
                <div class="mx-auto mb-5">
                    <div>商談内容</div>
                    <textarea class="form-control" rows="5"></textarea>
                </div>

                <div class="form-group mx-auto mb-5">
                    <div>導入の決め手</div>
                    <textarea class="form-control" rows="5"></textarea>
                </div>
                <div class="mx-auto mb-5">
                    <div>画像の添付</div>
                    <input style="width:400px">
                </div>
                <a href="{{ route('completeNewPost') }}" class='mx-auto'><button>登録する</button></a>
                
                
                
                
            </div>
        </div>
    </div>
</div>
@endsection