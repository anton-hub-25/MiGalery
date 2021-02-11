<!----------------------------------------------------------------
					Formulario que busqueda.

Fomulario encargado de realizar la busqueda por en campo "tema".
usara el metodo "GET" para enviar el valor usando la ruta tema.index
que esta ligado al controlador "TemaController" donde ejecutara 
el metodo "index()".
----------------------------------------------------------------->
<form action="{{ route('tag.index') }}" method="GET">
@csrf
@method('GET')
	<div class="form-group">
		<div class="input-group">

			<input type="text" class="form-control" name="searchText" placeholder="Buscar..."
			value="{{$searchText}}">
			
			<span class="input-group-btn">
				<button type="submit" class="btn btn-primary">Buscar</button>
			</span>
		</div>
	</div>

</form>