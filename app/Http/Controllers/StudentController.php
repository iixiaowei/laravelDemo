<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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
