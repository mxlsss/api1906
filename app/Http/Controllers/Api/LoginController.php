<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\GoodModel;
use Illuminate\Support\Str;
use App\Model\UsersModel;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
class LoginController extends Controller
{
  //注册
    public  function reg(Request $request){
//        $post=$request->except('_token');
//     var_dump($post);

        if($request->input('pass')!=$request->input('confirm_pass')){
            echo "两次密码不一致";die;
        }


        $data=[
            'username'=>$request->input('username'),
            'email'=>$request->input('email'),
            'pass'=>$request->input('pass'),
        ];
        $res=UsersModel::insertGetid($data);
        if($res){
            echo "注册成功";
        }


    }
    //登陆
    public function login(Request $request){

        $name = $request->input('username');
        $pass = $request->input('pass');

        // 发送HTTP请求
        $client = new Client();

        $uri = 'http://' .env('PASSPORT_HOST') . '/api/login'; // http[s]://passport.1906.com/api/login
        $response = $client->request('POST',$uri,[
            'form_params'   => [
                'username'  => $name,
                'pass'  => $pass
            ]
        ]);
        return $response->getBody();
    }

    //商品详情
    public function  goodlist(Request   $request){

        $id = $request->input('id');
        $res=GoodModel::where("id",$id)->first();
        print_r($res);
    }
}
