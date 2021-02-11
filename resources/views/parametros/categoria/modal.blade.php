<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-delete-{{$categoria->id}}">

	<form action="{{ route('categoria.destroy', $categoria->id) }}" method="POST">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" 
					aria-label="Close">
	                     <span aria-hidden="true">×</span>
	                </button>
	                <h4 class="modal-title">Eliminar Categoria</h4>
				</div>
				<div class="modal-body">
					<p>Confirme si desea Eliminar la categoria</p>
				</div>

				@csrf
                @method('DELETE')
				<div class="modal-footer">
					<a type="button" href="{{url('parametros/categoria')}}" class="btn btn-default" data-dismiss="modal">Cerrar</a>
					<button type="submit" class="btn btn-primary">Confirmar</button>
				</div>
			</div>
		</div>
	</form>

</div>