<div class="container">
	<div class="row">          
		@if($errors->any())
		    <div class="col-md-12 alert alert-danger">
		    	<ul>
		           @foreach($errors->all() as $error)
		           <li>{{ $error }}</li>
		           @endforeach
		        </ul>
		    </div>
		@endif

		@if(session('sucsess'))
			<div class="col-md-12  alert alert-info">
		        {{ session('sucsess') }}
		    </div>
		@endif
	</div>
</div>