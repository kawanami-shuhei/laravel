@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <div class="mx-auto mb-5 display-3">mypage</div>
            <div class="mx-auto mb-5 display-5">新規登録完了しました</div>
            <a href="{{ route('home') }}"><button>ホームへ</button></a>
                
        </div>
    </div>
</div>
@endsection