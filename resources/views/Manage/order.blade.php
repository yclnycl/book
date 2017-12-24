<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edmin</title>
        <link type="text/css" href="/statics/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="/statics/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="/statics/css/theme.css" rel="stylesheet">
        <link type="text/css" href="/statics/images/icons/css/font-awesome.css" rel="stylesheet">
    </head>
    <style>
        .pagination > li {
            display: inherit;
        }
        .pagination>li>a, .pagination>li>span {
            position: relative;
            float: left;
            padding: 6px 12px;
            margin-left: -1px;
            line-height: 1.42857143;
            color: #337ab7;
            text-decoration: none;
            background-color: #fff;
            border: 1px solid #ddd;
        }
    </style>
<body>
<div class="navbar navbar-fixed-top">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                <i class="icon-reorder shaded"></i></a><a class="brand" href="{{url('manage')}}">Edmin </a>
            <div class="nav-collapse collapse navbar-inverse-collapse">
                <ul class="nav nav-icons">
                    <li class="active"><a href="#"><i class="icon-envelope"></i></a></li>
                    <li><a href="#"><i class="icon-eye-open"></i></a></li>
                    <li><a href="#"><i class="icon-bar-chart"></i></a></li>
                </ul>
                <form class="navbar-search pull-left input-append" action="#">
                    <input type="text" class="span3">
                    <button class="btn" type="button">
                        <i class="icon-search"></i>
                    </button>
                </form>
                <ul class="nav pull-right">
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown
                            <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Item No. 1</a></li>
                            <li><a href="#">Don't Click</a></li>
                            <li class="divider"></li>
                            <li class="nav-header">Example Header</li>
                            <li><a href="#">A Separated link</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Support </a></li>
                    <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="/statics/images/user.png" class="nav-avatar"/>
                            <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Your Profile</a></li>
                            <li><a href="#">Edit Profile</a></li>
                            <li><a href="#">Account Settings</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.nav-collapse -->
        </div>
    </div>
    <!-- /navbar-inner -->
</div>
<!-- /navbar -->
<div class="wrapper">
    <div class="container">
        <div class="row">
        @include('common.menu')
        <!--/.span3-->
            <div class="span9">
                <div style="background:#fff; padding: 20px; padding-bottom: 50px;">
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
            <!--/.span9-->
        </div>
    </div>
    <!--/.container-->
</div>
<!--/.wrapper-->
<div class="footer text-center">
    <div class="container  text-center">
        <h3 class="copyright">图书管理系统后台v0.1</h3>
    </div>
</div>
<script src="/statics/scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="/statics/scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
<script src="/statics/bootstrap/js/bootstrap.min.js"></script>

</body>

<script>
    $('.del').click(function () {
        var result = confirm('确实要删除书吗?')

        if(result)
        {
            var id = $(this).attr('data-id')
            $.post('/manage/book/del',{_token:$('input[name=_token]').val(),id:id}, function (res) {
                if(res.code == 0)
                {
                    window.location.reload()
                }
            })
        }else{
            return false
        }
    })
</script>
