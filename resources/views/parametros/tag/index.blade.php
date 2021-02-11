
<!--Extiende del plantilla principal-->
@extends('layouts.admin')


@section('contenido')

	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Tags de imagenes <a href="{{route('tag.create') }}"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('parametros.tag.search')
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						<th>Tag</th>
						<th>Descripción</th>
						<th>Opciones</th>
					</thead>
	               @foreach($tags as $tag)
						<tr>
							<td>{{ $tag->id}}</td>
							<td>{{ $tag->tag}}</td>
							<td>{{ $tag->descripcion}}</td>
							<td>
								<a href="{{ route('tag.edit', $tag->id) }}"><button class="btn btn-info">Editar</button></a>
		                         <a href="" data-target="#modal-delete-{{$tag->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
							</td>
						</tr>
						<!------------------------------------------------------------
							Incluye la planilla blade "modal"
						-------------------------------------------------------------->
						@include('parametros.tag.modal')
					@endforeach
				</table>
			</div>
			<!--Paginacion.-->
			{{$tags->render()}}
		</div>
	</div>

@stop

