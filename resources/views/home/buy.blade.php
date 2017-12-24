@extends('layouts.app')
@section('content')
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>填写订单</title>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <div class="row clearfix">
        <div class="col-md-12 column">
            <h3 class="nofollow">
                订单填写
            </h3>
            <form role="form" action="{{url('book/buy')}}" method="post">
                <input type="hidden" name='_token' value="{{csrf_token()}}">
                <input type="hidden" name='book_id' value="{{$book->id}}">
                <div class="form-group">
                    <label for="book_name">书名：</label><input type="text" class="form-control" id="book_name" name="book_name"readonly value="{{$book->name}}"/>
                </div>
                <div class="form-group">
                    <label for="book_zuozhe">作者：</label><input type="text" class="form-control" id="book_zuozhe" name="book_zuozhe" readonly value="{{$book->zuozhe}}"/>
                </div>
                <div class="form-group">
                    <label for="total">价格：</label><input class="form-control" type="number" id="total" name="total" value="{{$book->total}}" readonly/>
                </div>
                <div class="form-group">
                    <label for="num">数量：</label><input class="form-control" type="number" id="num" name="num" required/>
                </div>
                <div class="form-group">
                    <label for="address">收货地址：</label><input class="form-control" type="text" id="address" name="address" required/>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox"  required/> 用户协议</label>
                </div> <button type="submit" class="btn btn-default">提交</button>
            </form>
        </div>
    </div>
</div>
</body>
<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
<script>
    var msg = "{{\Illuminate\Support\Facades\Session::get('msg')}}"

    if(msg){alert(msg)}
</script>
</html>
@endsection
