<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;
	
	protected $dates=['deleted_at'];
	
	protected $fillable=['name','dob','gender','mstatus','idno','mobile','email','krapin',
	'nhif','nssf','education','role_id','hiredate','bkacc','bkname','bkbranch','next_of_kin','relation',
	'nokmobile','full_time'];
	
	public $with = ['role','payrolls'];
	
	public function role(){
		return $this->belongsTo('App\Role');
	}
	
	public function payrolls(){
		return $this->hasMany('App\Payroll');
	}
	
	
}
