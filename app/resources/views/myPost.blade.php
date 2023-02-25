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
                @foreach($myPosts as $myPost)
                <div class="border border-primary mt-3 mb-1">
                    <table>
                        <tr>
                            <td style="width:100px">作成日</td>
                            <td>{{$myPost->created_at}}</td>
                        </tr>
                        <tr>
                            <td style="width:100px">タイトル</td>
                            <td>{{$myPost->title}}</td>
                        </tr>
                        <tr>
                            <td style="width:100px">得意先</td>
                            <td>{{$myPost->client }}</td>
                        </tr>
                        <tr>
                            <td style="width:100px">商品</td>
                            <td>
                                @foreach($myPost->product as $product)
                                <div>{{ $product->name }}</div>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td style="width:100px">開始日</td>
                            <td>{{$myPost->start_date}}</td>
                        </tr>
                        <tr>
                            <td style="width:100px">商談内容</td>
                            <td>{{$myPost->content}}</td>
                        </tr>
                    </table>
                    <div class="mx-auto mt-1 mb-1 d-flex justify-content-center">
                        <a href="{{ route('posts.edit',['post'=>$myPost->id]) }}"><button class="mr-2" >編集</button></a>
                        <!-- まだ途中 -->
                        <form method="POST" action="{{route('posts.destroy',['post'=>$myPost->id]) }}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="ml-2" onClick="confirmDelete()">削除</button>
                        </form>
                    </div>
                </div>
                @endforeach
                
                
                
                
                
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