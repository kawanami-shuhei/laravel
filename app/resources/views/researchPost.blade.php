@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="mx-auto mb-5 display-3">mypage</div>
                <div class="mx-auto mb-5 display-4">事例検索</div>      
                <!-- <form action="" method="get"> -->
                    <div class="form-group mx-auto mb-5 display-5 d-flex">
                        <label for="name" style="width:70px">氏名</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>    
                    <div class="form-group mx-auto mb-5 display-5 d-flex">
                        <label for="department" style="width:70px">部署</label>
                        <input type="text" class="form-control" id="department" name="department">
                    </div>
                    <div class="form-group mx-auto mb-5 display-5 d-flex">
                        <label for="client" style="width:70px">得意先</label>
                        <input type="text" class="form-control" id="client" name="client">
                    </div>
                <!-- </form> -->
                    <div class="mx-auto">
                        <button type="button" class="btn btn-primary mb-5" id="search-form">検索</button>
                    </div>
                    <div class="display-5 mx-auto mb-5">検索結果</div>
                <div class="search-wrapper col-12">
                    <div class="search-form">
                       <table class="search-table mx-auto" style="width:80%">
                        <thead>
                            <tr>
                                <th style="width:10%" class="mr-2">名前</th>
                                <th style="width:40%" class="mr-2">タイトル</th>
                                <th style="width:20%" class="mr-2">部署</th>
                                <th style="width:30%" class="mr-2">得意先</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
    
                        </tbody>
                       </table>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection

<script>
    
     
</script>