@if($errors->any())
	<div class="panel panel-danger">
	<h1 class="text-center">Oops!</h1>
	  <div class="panel-body">
	  	<ul class="alert alert-danger">
			@foreach($errors->all() as $error)
				<p>{{ ucwords($error) }}</p>
			@endforeach
		</ul>
	  </div>
	</div>
	
@endif