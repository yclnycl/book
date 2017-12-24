<?php
/**
 * Created by PhpStorm.
 * User: yclnycl
 * Date: 2017/12/24
 * Time: 10:01
 */

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function __construct()
    {

    }

    public function Index()
    {
        if(Session::has('user'))
        {
            return redirect(url('manage/index'));
        }
        return view('Manage.Login');
    }

    public function loginPost(Request $request)
    {
        $data = $request->input();
        $name = $data['user'];
        $pwd = md5($data['pwd']);

        $result = DB::table('admin_user')->where('user',$name)->where('pwd',$pwd)->first();

        if(!$result){
            return $this->error('账号密码错误');
        }else{
            Session('user', $result);
            return $this->ok(url('manage/index'), '登陆成功');
        }
    }
}