<?php
/**
 * Created by PhpStorm.
 * User: yclnycl
 * Date: 2017/12/24
 * Time: 11:12
 */

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
    public function __construct()
    {
        
    }

    public function Index()
    {

        $data = DB::table('book_info')->paginate(10);
        return view('manage.index',['data' => $data]);
    }

    public function bookAdd($id = 0)
    {
        if($id > 0)
        {
            $book = DB::table('book_info')->where('id', $id)->first();
            if(!$book)
            {
                return $this->error('当前书籍不存在,可能已经被删除');
            }
        }

        return view('manage.addbook', $id > 0 ? ['book' => $book ]:[]);
    }

    public function postBookAdd(Request $request)
    {
        $data = $request->input();

        $file = $request->file('bookpic');
        // 文件是否上传成功
        if ($file->isValid()) {

            // 获取文件相关信息
            $originalName = $file->getClientOriginalName(); // 文件原名
            $ext = $file->getClientOriginalExtension();     // 扩展名
            $realPath = $file->getRealPath();   //临时文件的绝对路径
            $type = $file->getClientMimeType();     // image/jpeg

            // 上传文件
            $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;
            // 使用我们新建的uploads本地存储空间（目录）
            $bool = Storage::disk('book123')->put($filename, file_get_contents($realPath));
        }

        if(!$bool) {
            return $this->error('上传失败');
        }

        $bookdata = [
            'name' => $data['name'],
            'zuozhe' => $data['zuozhe'],
            'pic' => $filename,
            'total' => $data['total'],
            'time' => time(),
        ];

        $result = DB::table('book_info')->insert($bookdata);

        if($result)
        {
            return $this->ok(url('manage/index'), '上传成功');
        }else{
            return $this->error('上传失败');
        }
    }

    public function postBookDel(Request $request)
    {
        $id = $request->input('id');

        $book = DB::table('book_info')->where('id', $id)->delete();

        if($book)
        {
            return ['code' => 0, 'data' => '', 'msg' => ''];
        }else{
            return ['code' => -1, 'data' => '', 'msg' => '删除失败'];
        }
    }


    public function order()
    {
        $order = DB::table('book_order')->get();

        foreach ($order as $k => $value)
        {
            $value->book_info = DB::table('book_info')->where('id', $value->book_id)->first();
        }
        return view('Manage.order', ['order' => $order]);

    }
}