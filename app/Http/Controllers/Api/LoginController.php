<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\GoodModel;
use Illuminate\Support\Str;
use App\Model\UsersModel;
use Illuminate\Http\Request;

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
        $password = $request->input('pass');
//        echo $password;die;
        $u = UsersModel::where(['username'=>$name])->first();
//        echo $u->pass;die;
        if($u){
            //验证密码
            if( ($password==$u->pass) ){
                // 登录成功
                //echo '登录成功';
                //生成token
                $token = Str::random(32);
                $response = [
                    'errno' => 0,
                    'state'=> '登陆成功',
                    'msg'   => 'ok',
                    'data'  => [

                        'appid'=>$u['appid'],
                        'token' => $token
                    ]
                ];
            }else{
                $response = [
                    'errno' => 400003,
                    'msg'   => '密码不正确'
                ];
            }
        }else{
            $response = [
                'errno' => 400004,
                'msg'   => '用户不存在'
            ];
        }
        return $response;
    }

    //商品详情
    public function  goodlist(Request   $request){

        $id = $request->input('id');
        $res=GoodModel::where("id",$id)->first();
        print_r($res);
    }
}
