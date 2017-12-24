<?php
/**
 * Created by PhpStorm.
 * User: yclnycl
 * Date: 2017/12/24
 * Time: 13:14
 */

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    protected $login = false;

    public function __construct()
    {

    }

    public function Index()
    {
        $data = DB::table('book_info')->paginate(9);
        return view('welcome', ['data' => $data]);
    }

    public function buyBook($id = 0)
    {
        if(!Auth::user()){
            return redirect(url('login'));
        }

        $book = DB::table('book_info')->where('id', $id)->first();

        return view('home.buy', ['book' => $book]);
    }

    public function postBookBuy(Request $request)
    {
        $data = $request->input();

        $user = Auth::user();

        $bookdata = [
            'book_id' => $data['book_id'],
            'user_id' => $user->id,
            'num' => $data['num'],
            'total' => $data['num'] * $data['total'],
            'address' => $data['address'],
            'time' => time(),
        ];

        $result = DB::table('book_order')->insert($bookdata);

        if($result)
        {
            return $this->ok(url('order'));
        }else{
            return $this->error('订单添加失败');
        }

    }

    public function order()
    {
        $id = Auth::user()->id;

        $order = DB::table('book_order')->where('user_id', $id)->get();


        foreach ($order as $k => $value)
        {
            $value->book_info = DB::table('book_info')->where('id', $value->book_id)->first();
        }
        return view('home.order', ['order' => $order]);
    }
}