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
                        <label for="name">社員名</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>    
                    <div class="form-group mx-auto mb-5 display-5 d-flex">
                        <label for="department">部署名</label>
                        <input type="text" class="form-control" id="department" name="department">
                    </div>
                    <div class="form-group mx-auto mb-5 display-5 d-flex">
                        <label for="client">得意先名</label>
                        <input type="text" class="form-control" id="client" name="client">
                    </div>
                <!-- </form> -->
                <div class="mx-auto">
                    <button type="button" class="btn btn-primary" id="search-form">検索</button>
                </div>
                <div class="search-wrapper col-12">
                    <div class="search-form">
                       <table class="search-table mx-auto" style="width:80%">
                        <thead>
                            <tr>
                                <th style="width:10%">名前</th>
                                <th style="width:50%">タイトル</th>
                                <th style="width:10%">部署</th>
                                <th style="width:30%">得意先</th>
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