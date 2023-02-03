@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- <div class="card-header">Dashboard</div> -->
                <div class="mx-auto mb-5 display-3">mypage</div>
                <a href="{{ route('posts.index') }}" class="mx-auto mb-2 display-5"><button style="width:200px">①事例検索</button></a>
                <a href="{{ route('mypost') }}" class="mx-auto mb-2 display-5" style="width:200px"><button style="width:200px">②my事例一覧</button></a>
                <a href="{{ route('posts.create') }}" class="mx-auto mb-2 display-5"><button style="width:200px">③新規作成</button></a>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
