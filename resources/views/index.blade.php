@extends('layouts.app')


@section('cssGaleria')
    <!--Boostrap 3.3.7 -->
	<link rel="stylesheet" href="{{asset('distGaleria/bootstrap.min.css')}}">
   
    <link rel="stylesheet" href="{{asset('distGaleria/baguetteBox.min.css')}}"> 
      
    <link rel="stylesheet" href="{{asset('distGaleria/thumbnail-gallery.css')}}"> 
  
    <!----------------------------------------------------------------------
                                        NOTA
    El focus que se muestra cuando se visualiza una imagen de la galeria se deve
    a que los archivos scripts de la galeria es "solapado" por los estilos propios
    de  laravel "app.css y app.js" por lo que no es un error de codigo.

                                        NOTA 
    El error que se muestra en consola se deve a que google dejo de dar soporte
    a las propiedades de "fullscreen" por lo que no es un error de codigo.
    ------------------------------------------------------------------------>
@endsection


@section('content')

<div class="container gallery-container">

    <h1>Galeria</h1>

    <p class="page-description text-center">Imagenes variados</p>
    
    <div class="tz-gallery">

        <div class="row">

        	@foreach($imagenes as $img)

            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <a class="lightbox" href="{{asset('imagenes/galeria/'.$img->nombre)}}">
                        <img src="{{asset('imagenes/galeria/'.$img->nombre)}}" alt="">
                    </a>
                    <div class="caption">
                        <h3>{{$img->titulo}}</h3>
                        <p>{{$img->descripcion}}</p>
                    </div>
                </div>
            </div>

            @endforeach
            
        </div>

        <div class="row">
			<div class="col-xs-12">			
					<!--Instruccion que mostrara por paginaciones de las imagenes-->
                    {{$imagenes->render()}} 
			</div>	
		</div>

    </div>

</div>


@push('scriptsGaleria')
<script src="{{asset('distGaleria/baguetteBox.min.js')}}">
    </script>

    <script >
     window.onload = function() {  
        baguetteBox.run('.tz-gallery');
     };
    </script>

@endpush


@endsection

