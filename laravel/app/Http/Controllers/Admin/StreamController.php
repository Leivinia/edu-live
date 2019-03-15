<?php

namespace App\Http\Controllers\Admin;

use Validator;
use App\Http\Models\Stream;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * 【直播课程】直播流模块
 * @package App\Http\Controllers\Admin
 */
class StreamController extends Controller
{
    #添加
    public function add(Request $request)
    {
        #1.判断提交方式
        if ($request->isMethod('post')) {
            #2.接受数据
            $postData = $request->only('stream_name');
            #3.数据过滤
            $validator = Validator::make($postData, [
                'stream_name' => 'required|min:4|max:16|unique:stream,stream_name'
            ], [
                'stream_name.required' => '必须',
                'stream_name.unique' => '数据流已存在',
            ]);
            if ($validator->fails()) {
                echo $validator->errors()->first('stream_name');
                return;
            }
            ###同步数据到七牛云
            //1.组装数据
            $method = 'POST';
            $host = 'pili.qiniuapi.com';
            $path = '/v2/hubs/education-zet/streams';
            $api = $host . $path;
            $body = json_encode(['key'=> $postData['stream_name']]);
            $contentType='application/json';
            //2.身份验证
            $data = "$method $path\nHost: $host\nContent-Type: $contentType\n\n$body";
            $ak =  'bBOpNSfGr5G1b0IFDvF68L7Za35-PAVUliL4Zrkn';
            $sk =  'AOlw43W9NjgzmNNAEoZrO1sMU5w6CGwn-7pyOekM';
            $qiniu = new  \Qiniu\Auth($ak, $sk);
            $authorization =  "Qiniu ".$qiniu->sign($data); //根据HTTP请求鉴权接口生成秘钥
            //3.发送请求
            $rs = $this->httpRequest($api, $body , [
                'Host: '.$host,
                'User-Agent: pili-sdk-go/v2 go1.6 darwin/amd64',
                'Content-Length: '.strlen($body),
                'Authorization: '.$authorization,
                'Content-Type: '.$contentType,
                'Accept-Encoding: gzip',
            ]);
            if (isset($rs['error'])) die($rs['error']);
            #4.数据入库
            $rs = Stream::create($postData);
            #5.响应
            echo $rs ? 'success' : 'error';
        } else {
            #2.加载视图
            return view('admin.stream.add');
        }
    }

    #列表
    public function index()
    {
        #1.获取所有直播流数据
        $streams = Stream::paginate(2);
        #2.加载视图
        return view('admin.stream.index', compact('streams'));
    }

    /**
     * PHP发送请求
     * @param string $api  		接口地址
     * @param array  $postData  POST请求数据
     * @param array  $headers   请求头
     */
    public function httpRequest($api, $postData = array(), $headers = array())
    {
        //1.初始化
        $ch = curl_init();
        //2.配置
        //2.0设置请求头
        if ($headers) curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        //2.1设置请求地址
        curl_setopt($ch, CURLOPT_URL, $api);
        //2.2数据流不直接输出
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //2.3POST请求
        if ($postData) {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        }
        //curl注意事项，如果发送的请求是https，必须要禁止服务器端校检SSL证书
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        //3.发送请求
        $rs = curl_exec($ch);
        //4.释放资源
        curl_close($ch);
        return json_decode($rs, true);
    }
}
