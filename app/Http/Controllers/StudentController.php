<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Member;
use Illuminate\Support\Facades\Storage;
use Mail;
use Illuminate\Support\Facades\Cache;

class StudentController extends Controller
{

    public function info(){
//         print_r(get_loaded_extensions());
		phpinfo();
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
    
    
    public function update(Request $request,$id){
    	$member = Member::find($id);
    	
    	if($request->isMethod("POST")){
    		
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
    		
    		$data = $request->input('Member');
    		$member->name = $data['name'];
    		$member->age = $data['age'];
    		$member->sex = $data['sex'];
    		
    		if($member->save()){
    			return redirect('student/member')->with('success','编辑成功！');
    		}
    		
    	}
    	
    	return view('student.update',['member'=>$member]);
    }
    
    public function delete($id){
    	$member = Member::find($id);
    	if($member->delete()){
    		return redirect('student/member')->with('success','删除成功！');
    	}else{
    		return redirect()->back()->with('error','删除失败！');
    	}
    }
    
    
    public function detail($id){
    	$member = Member::find($id);
    	
    	return view('student/detail',['member'=>$member]);
    }
    
    public function upload(Request $request){
    	
    	if($request->isMethod("POST")){
    		//var_dump($_FILES);
    		$file = $request->file('source');
			$originalName = $file->getClientOriginalName();
			$ext = $file->getClientOriginalExtension();
			$type = $file->getClientMimeType();
			$realPath = $file->getRealPath();
			$saveName1 = date("Y-m-d-H-i-s").'-'.uniqid().'.'.$ext;
			$bool = Storage::disk('uploads')->put($saveName1,file_get_contents($realPath));
			
			if($bool){
				return redirect('upload')->with('success','上传成功!');
			}
    		
    	}
    	
    	return view('student/upload');
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
		
    	$arr = [12,13,18,1,45,11,232,1111,232,232,23,12,22,1,23,3];
    	
    	
    	$name = "kevin";
    	echo "{$name}";
    	
    	
//     	arsort($arr);
//     	file_get_contents($filename)
//     	dd($arr);
    	
        /* $arr = [12,13,18,1,45,11,232,1111,232,232,23,12,22,1,23,3];
        $res = $this->arrDesc($arr);
        dd($res); */


//      echo $_SERVER['PHP_SELF'];
//         echo $_SERVER["HTTP_REFERER"];

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
    
    public function mail(){
    	/* Mail::raw("邮件主体测试",function($message){
    		$message->from("iixiaowei@163.com","iixiaowei");
    		$message->subject("邮件主体测试");
    		$message->to("870710460@qq.com");
    	}); */
    	
    	Mail::send("student.mail",["name"=>'kevin'],function($message){
    		$message->to("870710460@qq.com");
    		$message->subject("测试邮件");
    	});
    	
    }
    
    
    public function cache1(){
    	//put()
    	//Cache::put('key1','val1',10);
    	
    	//add()
//     	$bool = Cache::add('key1','val1',10);
//     	var_dump($bool);

    	//forever()
//     	Cache::forever('key3','val3');

    	//has()
    	if(Cache::has('key1')){
    		var_dump(Cache::get('key1'));
    	}else{
    		echo "no key1";
    	}
    	
    }
    
    public function cache2(){
    	//get()
//     	$val = Cache::get('key3');
//     	var_dump($val);

    	//pull()
    	
    	//forget()
    }



}
