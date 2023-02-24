@extends('layouts.app')

@section('content')
<div class="container">
    <!-- フラッシュメッセージ -->
    @if (session('flash_message'))
            <div class="alert alert-success text-center">
                {{ session('flash_message') }}
            </div>
        @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="border border-primary mt-3 mb-1">
                    <table>
                        <tr>
                            <td style="width:100px">作成日</td>
                            <td>{{$post->created_at}}</td>
                        </tr>
                        <tr>
                            <td style="width:100px">タイトル</td>
                            <td>{{$post->title}}</td>
                        </tr>
                        <tr>
                            <td style="width:100px">得意先</td>
                            <td>{{$post->client }}</td>
                        </tr>
                        <tr>
                            <td style="width:100px">商品</td>
                        </tr>
                        <tr>
                            <td style="width:100px">開始日</td>
                            <td>{{$post->start_date}}</td>
                        </tr>
                        <tr>
                            <td style="width:100px">商談内容</td>
                            <td>{{$post->content}}</td>
                        </tr>
                    </table>
                    @if(Auth::id() == $post->user_id)
                    <div class="mx-auto mt-1 mb-1 d-flex justify-content-center">
                        <a href="{{ route('posts.edit',['post'=>$post->id]) }}"><button class="mr-2" >編集</button></a>
                        <form method="POST" action="{{route('posts.destroy',['post'=>$post->id]) }}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="ml-2" onClick="confirmDelete()">削除</button>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- -> toJson(JSON_UNESCAPED_UNICODE) -->
<script>
    function confirmDelete(){
        confirm( "削除しますか？" );
    }
</script>