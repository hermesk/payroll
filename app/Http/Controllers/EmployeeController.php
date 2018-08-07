<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Role;
use App\Department;
use App\Payroll;
use Session;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
	 public function __construct()
    {
        $this->middleware('auth');
    }
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employee.index', ['employees'=>Employee::paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles=Role::all();
		if($roles->count()==0){
			//Session::flash('Success', 'you must have at least 1 role created before attempting to create an employee');
			//return redirect()->back();
			return redirect()->back()->with('success','you must have at least 1 role created before attempting to create an employee');

		}
        return view('employee.create')->with('roles',$roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request,[
			'name' => 'required|max:255',
			'dob' => 'required',
			'idno' => 'required|min:7|unique:employees,idno',
			'gender' => 'required',
			'mstatus' => 'required',
			'mobile' => 'required|numeric|min:10',
			'email' => 'required|email|unique:employees,email',
			'krapin' => 'required|unique:employees,krapin',
			'nhif' => 'required|unique:employees,nhif',
			'nssf' => 'required|unique:employees,nssf',
			'education' => 'required',
			'role_id' => 'required',
			'hiredate' => 'required',
			'bkacc' => 'required|unique:employees,bkacc',
			'bkname' => 'required',
			'bkbranch' => 'required',
			'nok' => 'required',
			'nokr' => 'required',
			'nokmobile' => 'required|min:10',
			'full_time' => 'required|bool'
		
		]);
		  //create new employee
		$employee = Employee::create([
			'name' => $request->name,
			'dob' =>$request->dob,
			'idno' =>$request->idno,
			'gender' =>$request->gender,
			'mstatus' =>$request->mstatus,
			'idno' =>$request->idno,
			'mobile' =>$request->mobile,
			'email' => $request->email,
			'krapin' => $request->krapin,
			'nhif' => $request->nhif,
			'nssf' => $request->nssf,
			'education' => $request->education,
			'role_id' => $request->role_id,	
			'hiredate' => $request->hiredate,
			'bkacc' => $request->bkacc,
			'bkname' => $request->bkname,
			'bkbranch' => $request->bkbranch,
			'next_of_kin' => $request->nok,
			'relation' => $request->nokr,
			'nokmobile' => $request->nokmobile,
			'full_time' => $request->full_time			
		]);
		
		$payroll = new Payroll;
		$payroll->employee_id = $employee->id;
		$payroll->save();
		$employee->save();	
		//$request->session()->flash('status', 'New Employee created');
		return redirect('/employees')->with('success','New Employee created');
		//return redirect()->route('employees.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('employee.show',['employee'=>Employee::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('employee.edit', ['employee'=>Employee::find($id),
											'roles'=>Role::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employee=Employee::findOrFail($id);
		$this->validate($request,[
			'name' => 'required|max:255',
			'dob' => 'required',
			'idno' => 'required|min:7|unique:employees,idno',
			'gender' => 'required',
			'mstatus' => 'required',
			'mobile' => 'required|numeric|min:10',
			'email' => 'required|email|unique:employees,email',
			'krapin' => 'required|unique:employees,krapin',
			'nhif' => 'required|unique:employees,nhif',
			'nssf' => 'required|unique:employees,nssf',
			'education' => 'required',
			'role_id' => 'required',
			'hiredate' => 'required',
			'bkacc' => 'required|unique:employees,bkacc',
			'bkname' => 'required',
			'bkbranch' => 'required',
			'nok' => 'required',
			'nokr' => 'required',
			'nokmobile' => 'required|min:10',
			'full_time' => 'required|bool'
		]);
				
		$employee->name = $request->name;
		$employee->dob = $request->dob;
		$employee->idno = $request->idno;
		$employee->gender = $request->gender;
		$employee->mstatus = $request->mstatus;
		$employee->mobile = $request->mobile;
		$employee->email = $request->email;
		$employee->krapin = $request->krapin;
		$employee->nhif = $request->nhif;
		$employee->nssf = $request->nssf;
		$employeeducation = $request->education;
		$employee->role_id  = $request->role_id;
		$employee->hiredate = $request->hiredate;
		$employee->bkacc  = $request->bkacc;
		$employee->bkname  = $request->bkname;
		$employee->bkbranch  = $request->bkbranch;
		$employee->next_of_kin  = $request->nok;
		$employee->relation  = $request->nokr;
		$employee->nokmobile  = $request->nokmobile;
		$employee->full_time = $request->full_time;
				
		$employee->save();
		
		//$request->session()->flash('success', 'Employee Record updated');
		//return redirect()->route('employees.index');
		return redirect('/employees')->with('success','Employee Record updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	public function destroy($id)
    {
        $employee=Employee::findOrFail($id);
		$employee->delete();
		
		//Session::flash('success','Employee deleted');
		//return redirect()->route('employees.index');
		return redirect('/employees')->with('success','Employee deleted');
    }
	
	public function bin(){
		$employees=Employee::onlyTrashed()->get();
		return view('employee.bin')->with('employees', $employees);
	}
	
	public function restore($id){
		$employee=Employee::withTrashed()->where('id', $id)->first();
		$employee->restore();
		
		Session::flash('success', 'The employee user account is restored.');
		return redirect()->route('employees.index');
	}
	
	public function kill($id){
		$employee=Employee::withTrashed()->where('id', $id)->first();
		foreach($employee->payrolls as $payroll):
			$payroll->delete();
		endforeach;
		
		$employee->forceDelete();
		
		Session::flash('success', 'The employee account has been permanently destroyed.');
		return redirect()->route('employees.index');
	}
}
