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
                <div class="card-header">管理者用ページ</div>
                <div class="mx-auto mb-5">
                    <div class="mx-auto mt-5 mb-5 display-4 text-center">社員検索</div>
                    <div class="mx-auto">
                        <div class="form-group mx-auto mb-5 display-5 d-flex">
                            <label for="name" style="width:90px">社員名</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>    
                        <div class="form-group mx-auto mb-5 display-5 d-flex">
                            <label for="department" style="width:90px">部署名</label>
                            <input type="text" class="form-control" id="department" name="department">
                        </div>
                        <div class="form-group mx-auto mb-5 display-5 d-flex">
                            <label for="number" style="width:90px">社員番号</label>
                            <input type="text" class="form-control" id="number" name="number">
                        </div>    
                        <div class="mx-auto text-center">
                            <button type="button" class="btn btn-primary" id="search-user">検索</button>
                        </div>
                    </div>                 
                </div>
                <div>
                    <div class="search-wrapper col-12">
                        <div class="search-form">
                            <div class="display-5 text-center mb-3">検索結果</div>
                            <table class="search-user-table mx-auto" style="width:80%">
                                <thead>
                                    <tr>
                                        <th>社員番号</th>
                                        <th>名前</th>
                                        <th>部署</th>
                                        <th></th>
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
</div>
@endsection