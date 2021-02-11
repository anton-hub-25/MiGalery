@extends ('layouts.admin')

@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Categoria: {{ $reg->categoria}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			<form action="{{ route('categoria.update', $reg->id) }}" method="POST">
			@csrf
       		@method('PUT')
	            <div class="form-group">
	            	<label for="nombre">Categoria</label>
	            	<input type="text" name="Form_categoria" class="form-control" value="{{$reg->categoria}}" placeholder="Categoria...">
	            </div>
	            <div class="form-group">
	            	<label for="descripcion">Descripción</label>
	            	<input type="text" name="Form_descripcion" class="form-control" value="{{$reg->descripcion}}" placeholder="Descripción...">
	            </div>
	            <div class="form-group">
	            	<button class="btn btn-primary" type="submit">Guardar</button>
	            	<a class="btn btn-danger" type="reset" href="{{url('parametros/categoria')}}">Cancelar</a>
	            </div>

			</form>	
            
		</div>
	</div>
@endsection