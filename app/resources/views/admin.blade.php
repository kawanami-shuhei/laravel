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
                <div class="mx-auto">
                    <div class="card">
                        <div class="mx-auto mb-5 display-4">社員検索</div>      
                    
                        <div class="form-group mx-auto mb-5 display-5 d-flex">
                            <label for="name">社員名</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>    
                        <div class="form-group mx-auto mb-5 display-5 d-flex">
                            <label for="department">部署名</label>
                            <input type="text" class="form-control" id="department" name="department">
                        </div>
                        <div class="form-group mx-auto mb-5 display-5 d-flex">
                            <label for="number">社員番号</label>
                            <input type="text" class="form-control" id="number" name="number">
                        </div>
                        <button type="button" class="btn btn-primary" id="search-user">検索</button>
                    
                    </div>
                    <div class="search-wrapper col-12">
                        <div class="search-form">
                            <table class="search-user-table">
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