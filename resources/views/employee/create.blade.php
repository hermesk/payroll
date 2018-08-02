@extends('layouts.app')
@section('content')
<div class="text-center "><h1>New Employee</h1></div>
{!! Form::open(['action' => 'EmployeeController@store','method'=>'POST','enctype'=>'multipart/form-data']) !!}
<div class="form-group col-md-4">
        {{Form::label('title', 'Name:')}}
        {{Form::text('name', '',['class' => 'form-control','PlaceHolder' => 'Full Name'])}}
    </div>
    <div class="form-group col-md-2">
            {{Form::label('title', 'D.O.B:')}}
			{{Form::date('dob','',['class' => 'form-control',\Carbon\Carbon::now()])}}
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
			{{Form::number('idno','',['class' => 'form-control','value','min'=>'0'])}}
	</div>
	<!--new line!-->
	<div class="form-group col-md-2">
            {{Form::label('mobile', 'Mobile:')}}
			{{Form::number('mobile','',['class' => 'form-control','value','min'=>'0'])}}
	</div>
	<div class="form-group col-md-4">
	{{Form::label('title', 'Email:')}}
	{{Form::email('email', '',['class' => 'form-control','PlaceHolder' => 'email address'])}}
	</div>
	<div class="form-group col-md-2">
            {{Form::label('title', 'KRA PIN:')}}
			{{Form::text('krapin','',['class' => 'form-control','PlaceHolder' => 'KRA PIN'])}}
	</div>
	<div class="form-group col-md-2">
            {{Form::label('title', 'NHIF:')}}
			{{Form::number('nhif','',['class' => 'form-control','value','min'=>'0'])}}
	</div>
	<div class="form-group col-md-2">
            {{Form::label('title', 'NSSF NO:')}}
			{{Form::number('nssf','',['class' => 'form-control','value','min'=>'0'])}}
	</div>
	<!--new line!-->
	<div class="form-group col-md-5">
            {{Form::label('title', 'EDUCATION:')}}
			{{Form::text('education','',['class' => 'form-control','PlaceHolder' => 'Course'])}}
	</div>
	<div class="form-group col-md-4">
			<label for="role">Select a Role</label>
			<select name="role_id"  cols="5" rows="5" class="form-control">
				@foreach($roles as $role)
					<option value="{{ $role->id}}">{{ $role->name }}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group col-md-3">
            {{Form::label('title', 'Hire Date:')}}
			{{Form::date('hiredate','',['class' => 'form-control',\Carbon\Carbon::now()])}}
	</div>
	<!--new line!-->
	<div class="form-group col-md-4">
            {{Form::label('title', 'Bank Account:')}}
			{{Form::number('bkacc','',['class' => 'form-control','value','min'=>'0'])}}
	</div>
	<div class="form-group col-md-4">
        {{Form::label('title', 'Bank Name:')}}
        {{Form::text('bkname', '',['class' => 'form-control','PlaceHolder' => 'bank name'])}}
    </div>
	<div class="form-group col-md-4">
        {{Form::label('title', 'Branch:')}}
        {{Form::text('bkbranch', '',['class' => 'form-control','PlaceHolder' => 'branch'])}}
    </div>
	<!--new line!-->
	<div class="form-group col-md-3">
        {{Form::label('title', 'Next of Kin:')}}
        {{Form::text('nok', '',['class' => 'form-control','PlaceHolder' => 'Next of Kin'])}}
    </div>
	<div class="form-group col-md-3">
        {{Form::label('title', 'Relationship:')}}
        {{Form::text('nokr', '',['class' => 'form-control','PlaceHolder' => 'Relationship'])}}
    </div>
	<div class="form-group col-md-3">
            {{Form::label('mobile', 'Next of Kin Mobile:')}}
			{{Form::number('nokmobile','',['class' => 'form-control','value','min'=>'0'])}}
	</div>
	<div class="form-group col-md-3">
			<label for="full_time">Position:</label>
			<select name="full_time" id="full_time" class="form-control">
				<option value="1">Full-Time</option>
				<option value="0">Part-Time</option>					
			</select>
		</div>
	<div class="text-center ">
			<button class="btn btn-success" type="submit" >Create</button>
		</div>
{!! Form::close() !!}

@endsection