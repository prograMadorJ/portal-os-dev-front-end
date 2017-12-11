@if (count($errors->all()) > 0)

	<div class="alert alert-error alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
    	<h4 class="alert-heading">Erro na validação!</h4><br/>
        <ul>
        	@foreach ($errors->all() as $error)
        		<li>{{ $error }}</li>
        	@endforeach
        </ul>
    </div>

    <hr/>

@endif