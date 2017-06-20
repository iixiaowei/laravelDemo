<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Member;

class StudentController extends Controller
{

    public function info(){
        print_r(get_loaded_extensions());
    }

    public function index(){
        $url = route('profile');
        //return $url;
        //$redirect = redirect()->route('profile');
        //return $url;
        // $result = DB::select("select * from tbl_member");
        // $members = DB::table('member')->get();
        // dd($members);

        return view('student.index',['name'=>'kevin']);    
    }
    
    public function test(){
    	
    	return view('student.test');
    }
    
    
    public function member(){
//     	$members = Member::get();
    	$members = Member::paginate(20);
    	
    	return view('student.member',['members'=>$members]);
    }
    
    public function create(Request $request){
    	if($request->isMethod("POST")){
    		//控制器验证
    		/* 
    		$this->validate($request, [
    				'Member.name'=>'required|min:2|max:20',
    				'Member.age'=>'required|integer',
    				'Member.sex'=>'required|integer'
    		],[
    				'required'=>':attribute 为必填项',
    				'min'=>':attribute 长度不符合要求',
    				'integer'=>':attribute 必须为整数'
    		],[
    				'Member.name'=>'姓名',
    				'Member.age'=>'年龄',
    				'Member.sex'=>'性别'
    		]);    		
    		 */
    		
    		//Validator 类验证
    		$validator = \Validator::make($request->input(), [
    				'Member.name'=>'required|min:2|max:20',
    				'Member.age'=>'required|integer',
    				'Member.sex'=>'required|integer'
    		],[
    				'required'=>':attribute 为必填项',
    				'min'=>':attribute 长度不符合要求',
    				'integer'=>':attribute 必须为整数'
    		],[
    				'Member.name'=>'姓名',
    				'Member.age'=>'年龄',
    				'Member.sex'=>'性别'
    		]);
    		
    		if($validator->fails()){
    			return redirect()->back()->withErrors($validator)->withInput();
    		}
    		
    		
    		
    		$data = $request->input('Member');
    		
    		if(Member::create($data)){
    			return redirect('student/member')->with('success','添加成功！');
    		}else{
    			return redirect()->back()->with('error','添加失败！');
    		}
    		
    	}
    	$member = new Member();
    	
    	return view('student.create',['member'=>$member]);
    }
    
    
    
    public function showProfile(){
        //return view('');
    }

    public function query4(){
        $members = DB::table('member')->get();
        foreach($members as $rs):
             echo $rs->name."<br>";   
        endforeach;
    }
    
    public function query5(){
        $num = DB::table('member')->insert([
            ['name'=>'name1','age'=>22],
            ['name'=>'name2','age'=>22],
            ['name'=>'name3','age'=>22],
            ['name'=>'name4','age'=>22]
        ]);
        var_dump($num);
    }

    public function maopao(){

      /*
        $arr = [12,13,18,1,45,11,232,1111,232,232,23,12,22,1,23,3];
        $res = $this->arrDesc($arr);
        dd($res);*/


//      echo $_SERVER['PHP_SELF'];
        echo $_SERVER["HTTP_REFERER"];

    }

    function paixu($arr){
        $len = count($arr);
        for($i=1;$i<$len-1;$i++){
            $flag = false;
            for($j=$len-1;$j>=$i;$j--){
                if($arr[$j]<$arr[$j-1]){
                    $x = $arr[$j-1];
                    $arr[$j]=$arr[$j-1];
                    $arr[$j-1]=$arr[$j];
                    $flag=true;
                }
            }
            if(!$flag)
                return $arr;
        }
    }


    function arrDesc($arr){
        $len = count($arr);
        for($i=1;$i<$len-1;$i++){

            $flag = false;
            for($j=$len-1;$j>=$i;$j--){

                if($arr[$j]>$arr[$j-1]){

                    $x = $arr[$j];
                    $arr[$j]=$arr[$j-1];
                    $arr[$j-1]=$x;
                    $flag=true;
                }

            }
           if(!$flag) return $arr;

        }
    return $arr;
    }
    



}
