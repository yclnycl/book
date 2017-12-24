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
            <table class="table nofollow">
                <thead>
                <tr>
                    <th>
                        编号
                    </th>
                    <th>
                        产品
                    </th>
                    <th>
                        购买数量
                    </th>
                    <th>
                        单价
                    </th>
                    <th>
                        总价
                    </th>
                    <th>
                        下单时间
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($order as $k => $v)
                <tr>
                    <td>
                        {{$v->id}}
                    </td>
                    <td>
                        {{$v->book_info->name}}
                    </td>
                    <td>
                        {{$v->num}}
                    </td>
                    <td>
                        {{$v->book_info->total}}
                    </td>
                    <td>
                        {{$v->book_info->total * $v->num}}
                    </td>
                    <td>
                        {{date("Y-m-d h:i:s", $v->time)}}
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
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
