<?php
namespace app\api\controller;
use think\Request;
use think\Controller;
use think\Validate;

class Common extends Controller{
    protected $request; //用来处理参数
    protected $validater;//用来验证参数
    protected $params;//过滤后符合要求的参数
    protected $rules = array(
        'User'=>array(
            'login'=>array(
                'user_name'=>['require','chsDash','max'=>20],
                'user_pwd'=>'require|length:32'
            ),
        ),
        'Notice'=>array(
                'add_notice' => array(
                    'title' => 'require',
                    'content' => 'require',
                ),
                'show' => array(),
                'showall' => array(),
                'delete' => array(),
                'update' => array(),
            ),
        'notice'=>array(),
    );
    protected function _initialize(){
        parent::_initialize();
        $this->request = Request::instance();
        // $this->check_time($this->request->only(['time']));
        // $this->check_token($this->request->param());
        $this->params = $this->check_params($this->request->except(['time','token']));
    }
    /**
     * 验证请求是否超时
     * @param [array] $arr [包含时间戳的参数数组]
     * @return [json]  [检测结果]
     */
    public function check_time($arr){
        if(!isset($arr['time'])||intval($arr['time'])<=1){
            $this->return_msg(400, '时间戳不正确！');
        }
        if(time()-intval($arr['time'])>3000){
            $this->return_msg(400,'请求超时!');
        }
    }
    public function return_msg($code,$msg='',$data=[]){
        $return_data['code'] = $code;
        $return_data['msg'] = $msg;
        $return_data['data'] = $data;

        echo json_encode($return_data);die;
    }
    public function check_token($arr){
        if(!isset($arr['token'])||empty($arr['token'])){
            $this->return_msg(400,'token不能为空！');
        }
        $app_token = $arr['token'];
        //服务器端生成token
        unset($arr['token']);
        $service_token = '';
        foreach($arr as $key => $value){
            $service_token .= md5($value);
        }
        $service_token = md5('api_'.$service_token.'_api');//服务器端即时生成token
        // dump($service_token);die;
        //对比token返回结果
        if ($app_token !== $service_token){
            $this->return_msg(400,'token值不正确！');
        }
    }
    public function check_params($arr){
        //获取验证规则
        $rule = $this->rules[$this->request->controller()][$this->request->action()];
        //验证参数并返回错误
        $this->validater = new Validate($rule);
        if(!$this->validater->check($arr)){
            $this->return_msg(400,$this->validater->getError());
        }
        //如果正常，通过验证
        $this->params = $arr;
    }
}