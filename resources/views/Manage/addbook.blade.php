<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edmin</title>
        <link type="text/css" href="/statics/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="/statics/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="/statics/css/theme.css" rel="stylesheet">
        <link type="text/css" href="/statics/images/icons/css/font-awesome.css" rel="stylesheet">
    </head>
<body>
<div class="navbar navbar-fixed-top">
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
                            <img src="/statics/images/user.png" class="nav-avatar" />
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
                <div style="background:#fff; padding: 20px;">
                    <form method="post" action="{{url('manage/book/add')}}" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <label for="bookname">图书名称</label>
                            <input type="text" class="form-control" id="bookname" placeholder="图书名称" name="name" value="{{@$book->name}}">
                        </div>
                        <div class="form-group">
                            <label for="zuozhe">作者</label>
                            <input type="text" class="form-control" id="zuozhe" placeholder="作者" name="zuozhe" value="{{@$book->zuozhe}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">图书封面</label>
                            <input type="file" id="exampleInputFile" name="bookpic">
                        </div>

                        @if(isset($book->pic))
                            <img src="/book/{{$book->pic}}" alt="">
                        @endif
                        <div class="form-group">
                            <label for="total">价格</label>
                            <input type="number" class="form-control" id="total" placeholder="价格" name="total" value="{{@$book->total}}">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
            </div>
            <!--/.span9-->
        </div>
    </div>
    <!--/.container-->
</div>
<!--/.wrapper-->
<div class="footer">
    <div class="container">
        <b class="copyright">&copy; 2014 Edmin - EGrappler </b>All rights reserved. More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a>
    </div>
</div>
<script src="/statics/scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="/statics/scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
<script src="/statics/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

</body>
