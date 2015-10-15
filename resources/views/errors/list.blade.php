@if($errors->any())
	<div class="panel panel-danger">
	<div class="panel-heading text-center"><h1>Oops!</h1></div>
	  <div class="panel-body">
	  	<ul class="alert alert-danger">
			@foreach($errors->all() as $error)
				<p>{{ $error }}</p>
			@endforeach
		</ul>
	  </div>
	</div>
	
@endif