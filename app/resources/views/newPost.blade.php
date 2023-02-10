@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
                <div class="mx-auto mb-5 display-3">mypage</div>
                <div class="mx-auto mb-5 display-4">新規登録フォーム</div>
                <form method="POST" action="{{route('confirmNewPost') }}" enctype="multipart/form-data">
                @csrf
                <div class="mx-auto mb-5 display-5 d-flex">
                    <div>タイトル</div>
                    <input name="title" type="text" style='width:400px' value="{{ old('title') }}">
                </div>
                <div class="mx-auto mb-5 d-flex">
                    <div>名前</div>
                    <div>{{Auth::user()->name}}</div>
                    <div>部署名</div>
                    <div>{{ Auth::user()->department }}</div>
                </div>
                <div class="mx-auto mb-5 d-flex">
                    <div>得意先</div>
                    <input name="client" type="text" style='width:100px' value="{{ old('client') }}">
                    <div>導入商品</div>
                    <input name="commodity" style='width:100px' value="{{ old('commodity') }}">
                </div>
                <div class="mx-auto mb-5 d-flex">
                    <div>導入期間</div>
                    <input name="start_date" type="date" style='width:150px' value="{{ old('start_date') }}">
                    <div>〜</div>
                    <input name="end_date" type="date" style='width:150px' value="{{ old('end_date') }}">
                </div>
                <div class="mx-auto mb-5 d-flex">
                    <div>売上金額</div>
                    <input name="price" type="number" style='width:150px'>
                    <diV>（期間見込）</div>
                </div>
                <div class="mx-auto mb-5">
                    <div>商談内容</div>
                    <textarea name="content" class="form-control" rows="5" value="{{ old('content') }}"></textarea>
                </div>

                <div class="form-group mx-auto mb-5">
                    <div>導入の決め手</div>
                    <textarea name="factor" class="form-control" rows="5" value="{{ old('content') }}"></textarea>
                </div>
                <div class="mx-auto mb-5">
                    <div>画像の添付</div>
                    <input name="image" type="file" enctype=”multipart/form-data” style="width:400px" value="{{ old('image') }}">
                </div>
               
                
                <button>入力内容の確認</button>
                
                </form>
                
                
            </div>
        </div>
    </div>
</div>
@endsection