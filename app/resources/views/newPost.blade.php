@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
                <div class="mx-auto mb-5 display-3">mypage</div>
                <div class="mx-auto mb-5 display-4">新規登録フォーム</div>
                <form method="POST" action="{{route('confirmNewPost') }}" enctype="multipart/form-data">
                @csrf
                <div class="mx-auto mb-5 display-5 d-flex">
                    <div class="mr-2">タイトル</div>
                    <input name="title" type="text" style='width:400px' value="{{ old('title') }}">
                </div>
                <div class="mx-auto mb-5 d-flex">
                    <div class="mr-2">名前</div>
                    <div class="mr-5">{{Auth::user()->name}}</div>
                    <div class="mr-2">部署名</div>
                    <div class="mr-3">{{ Auth::user()->department }}</div>
                </div>
                <div class="mx-auto mb-5 form-group">
                    <div class="d-flex mb-5">
                        <div class="mr-2">得意先</div>
                        <input name="client" type="text" style='width:400px' value="{{ old('client') }}">
                    </div>
                    
                    <div class="d-flex mb-5">
                        <label for="product_id" class="mr-2">商品</label>
                        <select name="product_id[]" multiple class="form-control" id="product_id"  style="width:80%">
                        @foreach($products as $product)
                        <option value="{{ $product->id }}" data-price="{{ $product->price }}">{{$product->name}}</option>
                        @endforeach
                        </select>
                        <input type="button" value="Exec" onclick="onButtonClick();" />
                    </div>
                        
                    
                </div>
                <div class="mx-auto mb-5 d-flex">
                    <div>売上金額　</div>
                    <input id="output" name="price" type="number" style='width:150px'>
                    <div id="output"></div>
                    <diV>　円　（期間見込）</div>
                </div>
                <div class="mx-auto mb-5 d-flex">
                    <div>導入期間</div>
                    <input name="start_date" type="date" style='width:150px' value="{{ old('start_date') }}">
                    <div>〜</div>
                    <input name="end_date" type="date" style='width:150px' value="{{ old('end_date') }}">
                </div>
                <div class="mx-auto mb-5">
                    <div>商談内容</div>
                    <textarea name="content" class="form-control" rows="5" value="{{ old('content') }}"></textarea>
                </div>

                <div class="form-group mx-auto mb-5">
                    <div>導入の決め手</div>
                    <textarea name="factor" class="form-control" rows="5" value="{{ old('content') }}"></textarea>
                </div>
                <div class="mx-auto mb-5">
                    <div>画像の添付</div>
                    <input name="image" type="file" style="width:400px" value="{{ old('image') }}">
                </div>
               
                
                <button>入力内容の確認</button>
               
                
                </form>
                
                
            </div>
        </div>
    </div>
</div>
@endsection
<script type="text/javascript" language="javascript">
    function onButtonClick() {
      let target = document.getElementById("output");
      target.value ="";
      let output=0;
      
        

      let select = document.getElementById("product_id");
      for (i = 0; i < select.options.length; i++) {
        if (select.options[i].selected == true) {
        let price= select.options[i].dataset.price;  
        output += parseInt(price);
        }
      }
      target.value += output;
    }
  </script>