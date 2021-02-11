
<!--Extiende del plantilla principal-->
@extends('layouts.admin')


@section('contenido')

	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Imagenes <a href="{{route('imagen.create')}}"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('galeria.imagen.search')
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						<th>Titulo</th>
						<th>Precio</th>
						<th>Descripción</th>
						<th>Categoria</th>
						<th>Opciones</th>
					</thead>
	               @foreach($imagenes as $img)
						<tr>
							<td>{{ $img->id}}</td>
							<td>{{ $img->titulo}}</td>
							<td>{{ $img->precio}}</td>
							<td>{{ $img->descripcion}}</td>
							<td>{{ $img->categoria}}</td>
							<td>
								<a href="{{route('imagen.show',$img->id)}}"><button class="btn btn-primary">Detalles</button></a>
								<a href="{{route('imagen.edit',$img->id) }}"><button class="btn btn-info">Editar</button></a>
		                         <a href="" data-target="#modal-delete-{{$img->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
							</td>
						</tr>
						<!------------------------------------------------------------
							Incluye la planilla blade "modal"
						-------------------------------------------------------------->
						@include('galeria.imagen.modal')
					@endforeach
				</table>
			</div>
			<!--Paginacion.-->
			{{$imagenes->render()}}
		</div>
	</div>

@stop

