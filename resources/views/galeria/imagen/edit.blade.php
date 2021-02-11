@extends ('layouts.admin')

@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Imagen: {{ $imagenes->titulo}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			<form action="{{ route('imagen.update', $imagenes->id) }}" method="POST" enctype='multipart/form-data'>
			@csrf
       		@method('PUT')

       		 <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
		    	 <div class="form-group ">
				            	<label for="nombre">Imagen:</label>
				            	<div class="conten-img preview">
					      	 		<img src="{{asset('imagenes/galeria/'.$imagenes->nombre)}}"
					      	 		 id="file-ip-1-preview">
					        	</div>
					    <br>
			        	<input type="file" name="Form_Imagen" id="Form_Imagen" onchange="showPreview(event);">
				</div>
	    	</div>

	            <div class="form-group">
	            	<input type="hidden" name="Form_idImagen" value="{{$imagenes->id}}">
	            	<label for="nombre">Titulo</label>
	            	<input type="text" name="Form_titulo" class="form-control" value="{{$imagenes->titulo}}" placeholder="Titulo...">
	            </div>

	             <div class="form-group">
	            	<label for="nombre">Precio</label>
	            	<input type="text" name="Form_precio" class="form-control" value="{{$imagenes->precio}}" placeholder="Precio...">
	            </div>

	             <div class="form-group">
	            	<label for="nombre">Descripcion</label>
	            	<input type="text" name="Form_descripcion" class="form-control" value="{{$imagenes->descripcion}}" placeholder="Descripción...">
	            </div>

	           <div class="form-group">
	            		<label for="Tema">Categoria</label>  	
		                <select name="Form_idCategoria" id="Form_idCategoria"
		                 class="form-control">
		                    <option value="{{$imagenes->idCategoria}}" selected>{{$imagenes->categoria}}</option>

		                    @foreach($categorias as $categoria)

		                    	@if($categoria->categoria == $imagenes->categoria)
		                    		@continue
		                    	@endif
		                        <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
		                    @endforeach
		                </select>
            	</div>


	             

	<div class="row">
		
			
			
	

	        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
			       <div class="form-group">
			            <label>Tags</label>
			            <select name="p_tag" class="form-control" id="p_tag">
			                            @foreach($tags as $tag)
			                                <option value="{{$tag->id}}">{{$tag->tag}}</option>

			                            @endforeach
			                            
			            </select>
			     </div>
   			</div>

   			<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
			                    <div class="form-group">
			                         <br>
			                         <button type="button" id="bt_add" class="btn btn-primary">Agregar</button>
			                    </div>
			</div>


		</div>
			<!--Seguna fila-->
    <div class="row">  
        <!--Se agrego un panel por estetica del formulario.
            Los paneles tiene un head y un body-->
        <div class="panel panel-primary">
            <div class="panel-body">

                 <div class="col-lg-8 col-sm-8 col-md-8 col-xs-8">

                     <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                         <thead style="background-color: #A9D0F5">
                             <th>Opciones</th>
                             <th>Codigo</th>
                             <th>Tag</th>
                         </thead>

                        
                         <tbody>
                            @foreach($detalles as $det)
                                
                                <tr class="selected" id="fila{{$det->idTag}}"> 
                                	<td><button type="button" class="btn btn-warning" onclick="eliminar('{{$det->idTag}}');">X</button></td>
                                	<td><input type="hidden" name="Form_idTag[]" value="{{$det->idTag}}">{{$det->idTag}}</td>
                                    <td>{{$det->tag}}</td>
                                                               
                                </tr>
                            @endforeach
                         </tbody>
                     </table>
                 </div>
            </div>
        </div>
    </div>


    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
    	 <div class="form-group">
	            	<button class="btn btn-primary" type="submit">Guardar</button>
	            	<a class="btn btn-danger" type="reset" href="{{url('galeria/imagen')}}">Cancelar</a>
	     </div>
    </div>

			</form>	
            
		</div>

	</div>

	

	



@push('scripts')
	 <script >
	 	function showPreview(event)
			{
				  if(event.target.files.length > 0)
				  {
				    var src = URL.createObjectURL(event.target.files[0]);
				    var preview = document.getElementById("file-ip-1-preview");
				    preview.src = src;
				    preview.style.display = "block";
				  }
			}


			//------------------------------------------------------
			//					FUNCIONES DEL DETALLE.
			//------------------------------------------------------

			 //Funcion que se ejecuta al iniciar la pagina.
            $(document).ready(function(){
                //Funcion que se ejecuta cuando se hace click en el objeto de id "bt_add"
                $('#bt_add').click(function(){
                    agregar();
                   
                });
            });

			var cont=1000;// Valor por defeco donde iniciara el conteo de los Tags ingresados por el usuario.

			 function eliminar(index)
            {
            	//cont = cont- 1

                //total=total-subtotal[index];//descontara el valor de un elemento del array
                //$("#total").html(total);//El nuevo valor de total
                $("#fila"+ index).remove();//Remueve la fila  seleccionada
               // evaluarDetalle();
            }

			 //Funcion que limiara las cajas de texto.
            function limpiar()
            {
                $("#p_tag").val("");
            }


             function agregar()
             {
                idTag = $("#p_tag").val();
                tag = $("#p_tag option:selected").text();

               
                if(idTag!="" && tag!="")
                {
                   

                	var fila = '<tr class="selected" id="fila'+cont+'">    <td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td>    <td><input type="hidden" name="Form_idTag[]" value="'+idTag+'">'+idTag+'</td>     <td>'+tag+'</td>   	</tr>';

                      
                
                    cont++;
                    limpiar();
                    
                    //evaluarDetalle();

                    $('#detalles').append(fila);

                }
                else
                {

                    alert("Error al ingresar el detalle, revise los datos.");
                }

             }
	 </script> 	

@endpush


@endsection





