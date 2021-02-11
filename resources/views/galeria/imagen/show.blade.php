@extends ('layouts.admin')
<!--Esta seccion es la seccion que se incluira en la plantilla del sistema que es codigo HTMl.-->

@section('css')

	<link rel="stylesheet" type="text/css" href="{{asset('css/miEstilos.css')}}">

@endsection


@section ('contenido')
    <div class="row">
    	 <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
	    	 <div class="form-group ">
			            	<label for="nombre">Imagen:</label>
			            	<div class="conten-img preview">
				      	 		<img src="{{asset('imagenes/galeria/'.$imagenes->nombre)}}"
				      	 		 id="file-ip-1-preview">
				        	</div>
			</div>
	    </div>

    	<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
    		 <div class="form-group">
            	<label for="titulo">Titulo</label>
                <p>{{$imagenes->titulo}}</p>
            </div>
    	</div>
        <!--Se establecio que en una sola fila cada etiqueta va tener 4 celdas de 12 para que las 
            3 etiquetas se muestren en una sola fila 
        -->
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group">
                <label>Precio</label>
                <p>{{$imagenes->precio}}</p>
            </div>
        </div>

    	
    	<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
    		 <div class="form-group">
            	<label for="Descripcion">Descripcion</label>
            	<p>{{$imagenes->descripcion}}</p>
            </div>
    	</div>


        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
             <div class="form-group">
                <label for="Descripcion">Categoria</label>
                <p>{{$imagenes->categoria}}</p>
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
                             
                             <th>Codigo</th>
                             <th>Tag</th>
                         </thead>

                        
                         <tbody>
                            @foreach($detalles as $det)
                                <tr>
                                    <td>{{$det->idTag}}</td>
                                    <td>{{$det->tag}}</td>                                
                                </tr>
                            @endforeach
                         </tbody>
                     </table>
                 </div>
            </div>
        </div>
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
	        <div class="form-group">
		          <a class="btn btn-primary" type="reset" href="{{url('galeria/imagen')}}">Volver</a>
		    </div>
	    </div>
    </div>

   
@endsection