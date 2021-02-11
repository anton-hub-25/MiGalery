@extends ('layouts.admin')

@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Tag: {{ $reg->tag}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			<form action="{{ route('tag.update', $reg->id) }}" method="POST">
			@csrf
       		@method('PUT')
	            <div class="form-group">
	            	<label for="nombre">Tema</label>
	            	<input type="text" name="Form_tag" class="form-control" value="{{$reg->tag}}" placeholder="Tema...">
	            </div>
	            <div class="form-group">
	            	<label for="descripcion">Descripción</label>
	            	<input type="text" name="Form_descripcion" class="form-control" value="{{$reg->descripcion}}" placeholder="Descripción...">
	            </div>
	            <div class="form-group">
	            	<button class="btn btn-primary" type="submit">Guardar</button>
	            	<a class="btn btn-danger" type="reset" href="{{url('parametros/tag')}}">Cancelar</a>
	            </div>

			</form>	
            
		</div>
	</div>
@endsection