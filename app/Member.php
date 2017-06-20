<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model{
	
	protected $table = "member";
	
	public $timestamps = true;
	
	protected function getDateFormat(){
		return time();
	}
	
	protected function asDateTime($val){
		return $val;
	}
	
	
}