<!--Extiende del plantilla principal-->
@extends ('layouts.admin')

@section('css')

	<link rel="stylesheet" type="text/css" href="{{asset('css/miEstilos.css')}}">

@endsection



@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Imagen</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			<form action="{{route('imagen.store') }}" method="POST" enctype="multipart/form-data">
		    @csrf

		    	<div class="form-group ">
		            	<label for="imagen">Imagen:</label>
		            	<div class="conten-img preview">
			      	 		<img src="{{asset('img/file.png')}}"
			      	 		 id="file-ip-1-preview">
			        	</div>
			        	
			        	<input type="file" name="Form_Imagen" id="Form_Imagen" onchange="showPreview(event);" >
		        </div>	


	            <div class="form-group">
	            	<label for="titulo">Titulo</label>
	            	<input type="text" name="Form_titulo" class="form-control" placeholder="Titulo..." value="{{old('Form_titulo')}}" required>
	            </div>
	            <div class="form-group">
	            	<label for="precio">Precio</label>
	            	<input type="number" name="Form_precio" class="form-control"
	            	 value="{{old('Form_precio')}}" required>
	            </div>
	            <div class="form-group">
	            	<label for="descripcion">Descripción</label>
	            	<input type="text" name="Form_descripcion" class="form-control" placeholder="Descripción..." value="{{old('Form_descripcion')}}" required>
	            </div>

	            <!--------------------------------------------------------------------------------
            		NOTA:
                    value="{{old('serie_comprobante')}}" :: Se utiliza para volver mostrar el valor de la variables "nombre" en caso de que no haya cumplido la validacion ejm. la longitud de nombre es superior al permitdo. 
                ---------------------------------------------------------------------------------->
	            
    				<div class="form-group">
	            		<label for="Tema">Categoria</label>  	
		                <select name="Form_idCategoria" id="Form_idCategoria"
		                 class="form-control">
		                    @foreach($categorias as $categoria)
		                        <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
		                    @endforeach
		                </select>
            		</div>
    			

            		<div class="form-group">
			    		<label for="">Detalle:</label> 
			    	</div>
			    <!--Seguna fila-->
			    <div class="row">  
			    	
			        <!--Se agrego un panel por estetica del formulario.
			            Los paneles tiene un head y un body-->

			        <div class="panel panel-primary">
			            <div class="panel-body">
			                <!--Cargara en un bomboBox los articulos disponibles.-->

			                <!--Las etiquetas con el nombre "p" son etiquetas auxiliar que se usara para poder agregar al  detalle los valores correspondiente.
			                -->

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

			                 <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">

			                     <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
			                         <thead style="background-color: #A9D0F5">
			                         	 <th>Opciones</th>
			                             <th>Codigo</th>	
			                             <th>Tag</th>
			                             
			                         </thead>

			                         <tfoot>
			                         	 <th></th>
			                             <th></th>
			                             <th></th>                                    
			                         </tfoot>

			                         <tbody>
			               					     
                         
                        
			                         </tbody>
			                     </table>
			                 </div>


			            </div>
			        </div>
			    </div>





	            <div class="form-group">
	            	<button class="btn btn-primary" type="submit" id="guardar">Guardar</button>
	            	<a class="btn btn-danger" type="reset" href="{{url('galeria/imagen')}}">Cancelar</a>
	            </div>

			</form>	
		</div>
	</div>





	 @push('scripts')
        <script>
           

            //Funcion que se ejecuta al iniciar la pagina.
            $(document).ready(function(){
                //Funcion que se ejecuta cuando se hace click en el objeto de id "bt_add"
                $('#bt_add').click(function(){
                    agregar();
                   
                });
            });


             var cont=0;
             total = 0;
             subtotal = [];// captura todos los subTotales de la lista de detalle.

             //Indicamos que al iniciar el sistema el boton cuyo id es "guardar" esta oculto.
             $("#guardar").hide();


             function agregar()
             {
                idTag = $("#p_tag").val();
                tag = $("#p_tag option:selected").text();

               
                if(idTag!="" && tag!="")
                {
                   

                	var fila = '<tr class="selected" id="fila'+cont+'">    <td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td>    <td><input type="hidden" name="Form_idTag[]" value="'+idTag+'">'+idTag+'</td>     <td>'+tag+'</td>   	</tr>';

                      
                
                    cont++;
                    limpiar();
                    
                    evaluarDetalle();

                    $('#detalles').append(fila);

                }
                else
                {

                    alert("Error al ingresar el detalle, revise los datos.");
                }

             }



            //Funcion que limiara las cajas de texto.
            function limpiar()
            {
                $("#p_tag").val("");
            }

            //Funcion que evalua que mostrara los botones de guardar/cancelar si se tiene detalles registrados.
            function evaluarDetalle()
            {
            	
                if(cont>0)
                {
                    $("#guardar").show();
                }
                else
                {
                    $("#guardar").hide();
                }

            }

            function eliminar(index)
            {
            	cont = cont- 1

                //total=total-subtotal[index];//descontara el valor de un elemento del array
                //$("#total").html(total);//El nuevo valor de total
                $("#fila"+ index).remove();//Remueve la fila  seleccionada
                evaluarDetalle();
            }


        </script>	

         <script>
         		//Funcion para la Imagen.
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

	 	</script>

    @endpush


@endsection