@extends('layouts.app')


@section('content')
	<div class="col-lg-12">
		<h1 class="page-header">New Employee</h1>
	</div>
	
	<form action="{{ route('employees.store') }}" method="POST">
			{{ csrf_field() }}
		
		<div class="form-group col-md-6">
			<label for="name">Name: </label>
			<input type="text" name="name" class="form-control">		
		</div>
		
		<div class="form-group col-md-3">
			<label for="gender">Gender:</label>
			<select name="gender" id="gender" class="form-control">
				<option value="1">Male</option>
				<option value="0">Female</option>					
			</select>
		</div>
		<div class="form-group col-md-3">
			<label for="email">D.O.B.: </label>
			<input type="date" min="0" name="dob" class="form-control">		
		</div>
		
		<div class="form-group col-md-3">
			<label for="street">ID NO: </label>
			<input type="number" min="0" name="idno" class="form-control">		
		</div>
		<div class="form-group col-md-3">
			<label for="street">KRA PIN: </label>
			<input type="text" name="kra" pattern="^[A-Za-z][A-Za-z0-9]*(?:_[A-Za-z0-9]+)*$"  class="form-control">		
		</div>
		<div class="form-group col-md-3">
			<label for="street">NHIF: </label>
			<input type="number" min="0" name="hnif" class="form-control">		
		</div>
		<div class="form-group col-md-3">
			<label for="street">NSSF: </label>
			<input type="number" min="0" name="nssf" class="form-control">		
		</div>
		<div class="form-group col-md-3">
			<label for="street">Mobile: </label>
			<input type="number" min="0" name="mobile" class="form-control">		
		</div>
		<div class="form-group col-md-3">
			<label for="email">Email: </label>
			<input type="email" name="email" class="form-control">		
		</div>
		
		<div class="form-group col-md-6">
			<label for="town">Town: </label>
			<input type="text" name="town" class="form-control">		
		</div>
		
		<div class="form-group col-md-4">
			<label for="city">City: </label>
			<input type="text" name="city" class="form-control">		
		</div>
		
		<div class="form-group col-md-2">
			<label for="country">Country: </label>
			<input type="text" name="country" class="form-control">		
		</div>		
				
		<div class="form-group col-md-6">
			<label for="role">Select a Role</label>
			<select name="role_id"  cols="5" rows="5" class="form-control">
				@foreach($roles as $role)
					<option value="{{ $role->id}}">{{ $role->name }}</option>
				@endforeach
			</select>
		</div>
		
		<div class="form-group col-md-12">
			<label for="full_time">Position:</label>
			<select name="full_time" id="full_time" class="form-control">
				<option value="1">Full-Time</option>
				<option value="0">Part-Time</option>					
			</select>
		</div>
		
		<div class="text-center">
			<button class="btn btn-success" type="submit" >Create</button>
		</div>
	</form>
	


@endsection