<div class="form-group">
	{!! Form::text('studentId', null, ['class'=>'form-control', 'placeholder'=>'Enter Student ID']) !!}
</div>

<div class="form-group">	
	{!! Form::text('firstname', null, ['class'=>'form-control', 'placeholder'=>'Enter First Name']) !!}
</div>

<div class="form-group">
	{!! Form::text('lastname', null, ['class'=>'form-control', 'placeholder'=>'Enter Last Name']) !!}
</div>

<div class="form-group">
	{!! Form::select('gender', [''=>'Select Gender', 'Male'=>'Male', 'Female'=>'Female'], '', ['class'=>'form-control'])!!}
</div>

<div class="form-group">
	{!! Form::input('date', 'dob', date('Y-m-d'), ['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::input('tel', 'phone', null, ['class'=>'form-control', 'placeholder'=>'Enter Phone Number']) !!}
</div>

<div class="form-group">
	{!! Form::text('address', null, ['class'=>'form-control', 'placeholder'=>'Enter Home Address']) !!}
</div>

<div class="form-group">
	{!! Form::text('state', null, ['class'=>'form-control', 'placeholder'=>'Enter State of Origin']) !!}
</div>

<div class="form-group">
	{!! Form::text('nationality', null, ['class'=>'form-control', 'placeholder'=>'Enter Nationality']) !!}
</div>

<div class="form-group">
	{!! Form::submit($submitButton, ['class'=>'btn btn-primary form-control', 'placeholder'=>'Enter Option 3']) !!}
</div>