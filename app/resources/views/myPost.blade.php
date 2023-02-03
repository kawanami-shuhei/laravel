@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @foreach($myPosts as $myPost)
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
                        <td>{{$myPost->commodity}}</td>
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
                @endforeach
                <div class="mx-auto mt-3 mb-3 d-flex">
                    <a><button class="mr-2" >編集</button></a>
                    <a><button class="ml-2">削除</button></a>
                </div>
                
                
                
                
            </div>
        </div>
    </div>
</div>
@endsection

<!-- -> toJson(JSON_UNESCAPED_UNICODE) -->