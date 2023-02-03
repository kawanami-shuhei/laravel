@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="mx-auto mb-5 display-3">mypage</div>
                <div class="mx-auto mb-5 display-4">事例検索</div>      
                <div class="mx-auto mb-5 display-5 d-flex">
                    <div>社員名</div>
                    <input>
                </div>    
                <div class="mx-auto mb-5 display-5 d-flex">
                    <div>部署名</div>
                    <input>
                </div>
                <div class="mx-auto mb-5 display-5 d-flex">
                    <div>得意先名</div>
                    <input>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection