<?php
namespace app\api\controller;
use think\Controller;
use think\Db;
use think\Request;

header('Content-type: application/json');

Class Notice extends Common{

    public function add_notice(){
        $request = Request::instance();
        $data = $request->post();
        $data['time'] = time();
        $res = db('notice')->insert($data);
        if($res){
            echo "<script>alert('公告添加成功！');window.location = 'http://www.tp5.com/admin/notice.html'</script>";
        }else{
            echo "<script>alert('公告添加失败！');window.location = 'http://www.tp5.com/admin/notice.html'</script>";
        }
    }

    public function show(){
        $data = DB::query('SELECT * FROM notice ORDER BY id DESC LIMIT 6');
        return json_encode($data);
    }

    public function showall(){
        $data = DB::query('SELECT * FROM notice ORDER BY id DESC');
        return json_encode($data);
    }

    public function delete(){
        error_reporting(0);
        $request = Request::instance();
        $arr = $request->post();
        // foreach( $arr as $i){}
        foreach( $_POST['id'] as $i){
            $result[] .= $i.",";
        }
        $res = Db::table('notice')->where('id','in',$result)->delete();
        if($res){
            echo "<script>alert('公告删除成功！');window.location = 'http://www.tp5.com/admin/notice.html'</script>";
        }else{
            echo "<script>alert('公告删除失败！');window.location = 'http://www.tp5.com/admin/notice.html'</script>";
        }
    }

    public function update(){
        error_reporting(0);
        $id = $_POST['id'];
        $request = Request::instance();
        $data = $request->post();
        $up_sta = Db::table('notice')->where('id='.$id)->update($data);
        var_dump($up_sta);
        if($up_sta){
            echo "<script>alert('公告修改成功！');window.location = 'http://www.tp5.com/admin/notice.html'</script>";
        }else{
            echo "<script>alert('公告修改失败！');window.location = 'http://www.tp5.com/admin/notice.html'</script>";
        }
    }
}