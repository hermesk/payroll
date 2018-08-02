@extends('layouts.app')

@section('content')

	<div class="col-lg-12">
		<h1 class="page-header">Update Employee: {{$employee->name }}</h1>
	</div>
{!! Form::open(['action' => ['EmployeeController@update',$employee->id],'method'=>'POST','enctype'=>'multipart/form-data']) !!}
{{ csrf_field() }}
<div class="form-group col-md-4">

        {{Form::label('title', 'Name:')}}
        {{Form::text('name', $employee->name,['class' => 'form-control'])}}
    </div>
    <div class="form-group col-md-2">
            {{Form::label('title', 'D.O.B:')}}
			{{Form::date('dob',$employee->dob,['class' => 'form-control',\Carbon\Carbon::now()])}}
	</div>		
	<div class="form-group col-md-2">
			<label for="gender">Gender:</label>
			<select name="gender" id="gender" class="form-control">
				<option value="Male">Male</option>
				<option value="Female">Female</option>					
			</select>
		</div>
		<div class="form-group col-md-2">
			<label for="mstatus">Marital Status:</label>
			<select name="mstatus" id="mstatusr" class="form-control">
				<option value="Married">Married</option>
				<option value="Single">Single</option>		
				<option value="Divorced">Divorced</option>
				<option value="Widowed">Widowed</option>				
			</select>
		</div>
	<div class="form-group col-md-2">
            {{Form::label('idno', 'ID NO:')}}
			{{Form::text('idno',$employee->idno,['class' => 'form-control','PlaceHolder' => 'id number'])}}
	</div>
	<!--new line!-->
	<div class="form-group col-md-2">
            {{Form::label('mobile', 'Mobile:')}}
			{{Form::text('mobile',$employee->mobile,['class' => 'form-control','PlaceHolder' => 'mobile no'])}}
	</div>
	<div class="form-group col-md-4">
	{{Form::label('title', 'Email:')}}
	{{Form::email('email', $employee->email,['class' => 'form-control','PlaceHolder' => 'email address'])}}
	</div>
	<div class="form-group col-md-2">
            {{Form::label('title', 'KRA PIN:')}}
			{{Form::text('krapin',$employee->krapin,['class' => 'form-control','PlaceHolder' => 'KRA PIN'])}}
	</div>
	<div class="form-group col-md-2">
            {{Form::label('title', 'NHIF:')}}
			{{Form::text('nhif',$employee->nhif,['class' => 'form-control','PlaceHolder' => 'NHIF no'])}}
	</div>
	<div class="form-group col-md-2">
            {{Form::label('title', 'NSSF NO:')}}
			{{Form::text('nssf',$employee->nssf,['class' => 'form-control','PlaceHolder' => 'NSSF no'])}}
	</div>
	<!--new line!-->
	<div class="form-group col-md-5">
            {{Form::label('title', 'EDUCATION:')}}
			{{Form::text('education',$employee->education,['class' => 'form-control','PlaceHolder' => 'Course'])}}
	</div>
	<div class="form-group col-md-4">
			<label for="role">Select a Role</label>
            <select name="role_id"  cols="5" rows="5" class="form-control">
				@foreach($roles as $role)
					<option value="{{ $role->id}}"
						@if($employee->role->id == $role->id)
							selected							
						@endif						
					>{{ $role->name }}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group col-md-3">
            {{Form::label('title', 'Hire Date:')}}
			{{Form::date('hiredate',$employee->hiredate,['class' => 'form-control',\Carbon\Carbon::now()])}}
	</div>
	<!--new line!-->
	<div class="form-group col-md-4">
            {{Form::label('title', 'Bank Account:')}}
			{{Form::text('bkacc',$employee->bkacc,['class' => 'form-control','PlaceHolder' => 'bank acc'])}}
	</div>
	<div class="form-group col-md-4">
        {{Form::label('title', 'Bank Name:')}}
        {{Form::text('bkname', $employee->bkname,['class' => 'form-control','PlaceHolder' => 'bank name'])}}
    </div>
	<div class="form-group col-md-4">
        {{Form::label('title', 'Branch:')}}
        {{Form::text('bkbranch', $employee->bkbranch,['class' => 'form-control','PlaceHolder' => 'branch'])}}
    </div>
	<!--new line!-->
	<div class="form-group col-md-3">
        {{Form::label('title', 'Next of Kin:')}}
        {{Form::text('nok', $employee->next_of_kin,['class' => 'form-control','PlaceHolder' => 'Next of Kin'])}}
    </div>
	<div class="form-group col-md-3">
        {{Form::label('title', 'Relationship:')}}
        {{Form::text('nokr', $employee->relation,['class' => 'form-control','PlaceHolder' => 'Relationship'])}}
    </div>
	<div class="form-group col-md-3">
            {{Form::label('mobile', 'Next of Kin Mobile:')}}
			{{Form::text('nokmobile',$employee->nokmobile,['class' => 'form-control','PlaceHolder' => 'mobile no'])}}
	</div>
	<div class="form-group col-md-3">
			<label for="full_time">Position:</label>
			<select name="full_time" id="full_time" class="form-control">
				<option value="1">Full-Time</option>
				<option value="0">Part-Time</option>					
			</select>
		</div>
	<div class="text-center ">
	<button class="btn btn-success" type="submit" >Update Changes</button>
		</div>
{!! Form::close() !!}

@endsection