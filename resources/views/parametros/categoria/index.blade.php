
<!--Extiende del plantilla principal-->
@extends('layouts.admin')


@section('contenido')

	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Categorias de imagenes <a href="{{route('categoria.create') }}"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('parametros.categoria.search')
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						<th>Categoria</th>
						<th>Descripción</th>
						<th>Opciones</th>
					</thead>
	               @foreach($categorias as $categoria)
						<tr>
							<td>{{ $categoria->id}}</td>
							<td>{{ $categoria->categoria}}</td>
							<td>{{ $categoria->descripcion}}</td>
							<td>
								<a href="{{ route('categoria.edit', $categoria->id) }}"><button class="btn btn-info">Editar</button></a>
		                         <a href="" data-target="#modal-delete-{{$categoria->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
							</td>
						</tr>
						<!------------------------------------------------------------
							Incluye la planilla blade "modal"
						-------------------------------------------------------------->
						@include('parametros.categoria.modal')
					@endforeach
				</table>
			</div>
			<!--Paginacion.-->
			{{$categorias->render()}}
		</div>
	</div>

@stop

