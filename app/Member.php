<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model{
	const SEX_UN = 10;
	const SEX_BOY = 20;
	const SEX_GIRL = 30;
	
	protected $table = "member";
	
	public $timestamps = true;
	
	protected $fillable = ['name','age','sex'];
	
	protected function getDateFormat(){
		return time();
	}
	
	protected function asDateTime($val){
		return $val;
	}
	
	public function sex($key=null){
		$arr = [
				self::SEX_UN=>'未知',
				self::SEX_BOY=>'男',
				self::SEX_GIRL=>'女'
		];
		
		if($key!==null){
			return array_key_exists($key, $arr)?$arr[$key]:'';
		}
		
		return $arr;
	}
	
	
}