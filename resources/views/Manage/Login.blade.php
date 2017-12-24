<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <meta name="keywords" content="Flat Dark Web Login Form Responsive Templates, Iphone Widget Template, Smartphone login forms,Login form, Widget Template, Responsive Templates, a Ipad 404 Templates, Flat Responsive Templates" />
    <link href="/static/manage/css/style.css" rel='stylesheet' type='text/css' />
    <script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
</head>
<body>
<script>$(document).ready(function(c) {
        $('.close').on('click', function(c){
            $('.login-form').fadeOut('slow', function(c){
                $('.login-form').remove();
            });
        });
    });
</script>
<!--SIGN UP-->
<h1>klasikal Login Form</h1>

<div class="login-form">
    <div class="close"> </div>
    <div class="head-info">
        <label class="lbl-1"> </label>
        <label class="lbl-2"> </label>
        <label class="lbl-3"> </label>
    </div>
    <div class="clear"> </div>
    <div class="avtar">
        <img src="/static/manage/images/avtar.png" />
    </div>
    <form method="post" action="{{url('manage/login/post')}}">
        <input type="text" class="text" value="" name="user" required>
        <div class="key">
            <input type="password" value="" name="pwd" required>
        </div>

        <div class="signin">
            <input type="submit" value="Login" >
        </div>
        <input type="hidden" name="_token" value="{{csrf_token()}}">
    </form>

</div>
</body>
</html>
<script>
    var msg = "{{\Illuminate\Support\Facades\Session::get('msg')}}"

    if(msg){alert(msg)}
</script>