<?php

namespace App\Http\Controllers\ModGaleria;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//User incorporado para redireccionar a archivos blade Ejmplo: 
//return Redirect::to('compras/ingreso');
use Illuminate\Support\Facades\Redirect;

// User necesarios para poder subir una imagen de la PC de cliente al servidor del proyecto.
//use Illuminate\Support\Facades\Input
use Input;
 

use App\Models\Imagen;
use App\Models\TagImagen;


use DB;
use App\Http\Requests\ModParametro\imagenFormRequester;
use App\Http\Requests\ModParametro\imagenEditarFormRequest;

use Response;
use Illuminate\Support\Collection;

// Incorpora la clase que contiene los datos del usuario logeado al proyecto.
use Illuminate\Support\Facades\Auth;

//Incorpora metodos de Laravel Str: valores random.
use Illuminate\Support\Str;




class imagenController extends Controller
{
    public function __construct()
    {
        //Instruccion que permitira gestionar el acceso a las vistas de este controlador 
        //Si no esta logeado  no permitira acceder a la vista redireccionara al formulario Login.
        $this->middleware('auth');

    }
    


    //Metodo que se ejecuta de manera predeterminada.
    //El metodo recibe un parametro tipo request para filtrar todos los ingresos de almacen.
    public function index(Request $request)
    {
       if($request)
       {
       		//funcion trim() es para borrar todos los espacios.
       		$query = trim($request->get('searchText'));


       		$obj=DB::table('imagen as img')
          ->join('categoria as cat', 'img.idCategoria','=','cat.id') 
          ->select('img.id','img.titulo', 'img.precio','img.descripcion','cat.categoria','img.nombre')
       		->where('img.titulo','LIKE','%'.$query.'%')
       		->orderBy('img.id','desc')
       		->paginate(10);//Numero de registros que se mostraran por pagina.

            //Retrona la vista: 1 parametro la ruta, 2 parametro el objeto a enviar a dicha vista.
            return view('galeria.imagen.index',["imagenes"=>$obj,"searchText"=>$query]);
       }
    }




    
    public function create()
    {
      //Instruccin que obtiene el los proveedores para el formlario ingreso.
      $tags=DB::table('tag')->get();//Obtiene todos los registros.
      //->where('tipo_persona', '=','Proveedor')->get();



      //Instruccin que obtiene todos los articulos para el formlario ingreso.
      $categoria=DB::table('categoria')->get();
      //Instruccion que llamara solo a 2 campos de la tabla articulo y ademas concatena de campos en un solo campo.
      //->select(DB::raw('CONCAT(art.codigo," ",art.nombre) AS articulo'), 'art.idarticulo')
      //->where('art.estado','=','Activo')->get();

         //Instruccion que filtra mostrando solo los articulos activos.
        //Metodo para obtener los datos de la consulta.


      //Hace el llamado al archivo resource\views\compras\ingreso\create.blade.php
      //Le pasamos como parametro los dos objetos que creamos en la consulta anterior.
        return view("galeria.imagen.create",["tags"=>$tags,"categorias"=>$categoria]);
    }





    public function store (imagenFormRequester $request)
    {
      //------------------------------------------------------------------------
      //                        Usaremos Transacciones.
      //Se tiene que almacenar primero el ingreso y luego el detalleIngreso ambos.
      // Puede ocurrir problemas en la red por lo tanto devemos cancelar la transaccion.
      //------------------------------------------------------------------------
  try { 
      DB::beginTransaction();

          $obj=new Imagen;

          $obj->idUsuario= '1';//Auth::user()->id;//Obtenemos el id del usuario 
          $obj->titulo=$request->get('Form_titulo');
          $obj->precio=$request->get('Form_precio');
          $obj->descripcion=$request->get('Form_descripcion');
          $obj->idCategoria=$request->get('Form_idCategoria');
          

          //Codigo para cargar la imagen que intenta subir el cliente.
          //Si no esta vacia el objeto imagen
          if (Input::hasFile('Form_Imagen')) 
          {
            $file = Input::file('Form_Imagen');//obtenemos el objeto.


            $nombre = Str::random(10).$file->getClientOriginalName();
                //movemos el objeto imagen a una carpeta publica con su nombre original.
                //Primer parametro indica la ruta, el segundo parametro el archivo a ser movido.
            $file->move(public_path().'/imagenes/galeria/', $nombre);
                
                //le pasamos el campo el nombre de la imagen para ser insertada en la BD.
            $obj->nombre = $nombre;




            $obj->save();



          //NOTA:
          //Para los detalles del ingreso se obtendran mediante un array de valores por cada uno de los campos a insertar en la tabla detalleingreso.
          //Este array de controles sera enviado desde el formlario de la vista.
          $idTag = $request->get('Form_idTag');//array

          $cont = 0;

          while ($cont < count($idTag))
          {
            $detalle = new TagImagen();

            //cuando se registro en la tabla ya tiene un id autogenerado el cual le pasamos al detalle.
            $detalle->idImagen = $obj->id;
                       
            $detalle->idTag= $idTag[$cont];

            $detalle->save();

            $cont=$cont+1;
          }

          }

          DB::commit();//Confirma la transaccion    
    } 
    catch (Exception $e) 
    {
      DB::rollback();//Anula la transaccion.
    }

        

        //Redirecciona a una ruta en especifico "LLamara al metodo index() de forma predeterminada".
        return Redirect::to('galeria/imagen');
    }



    //Metdo que permite eliminar un registro de la BD.
    public function destroy($id)
    {
        $obj=Imagen::findOrFail($id);
        

        //Obtenemos la ruta de la imagen de la carpeta publica.
        $url= public_path().'/imagenes/galeria/'.$obj->nombre;
        //Eliminamos la imagen.
        unlink($url);

        $obj->delete();

        //Redirecciona a una ruta en especifico "LLamara al metodo index() de forma predeterminada".
        return Redirect::to('galeria/imagen');
    }



// Metodo que permitira editar un registro de la BD.
    public function update(imagenEditarFormRequest $request,$id)
    {
       try 
       { 

         DB::beginTransaction();

         $obj1=Imagen::findOrFail($id);
         $obj1->titulo=$request->get('Form_titulo');
         $obj1->precio=$request->get('Form_precio');
         $obj1->descripcion=$request->get('Form_descripcion');
         $obj1->idCategoria=$request->get('Form_idCategoria');
         $obj1->idUsuario = '1';//Auth::user()->id;//Obtenemos el id del usuario logeado.

          //hasFile('valor') valida si un objeto de tipo archivo no esta vacio.
          //true: si existe el objeto.
          //false: no existe el objeto.
          if (Input::hasFile('Form_Imagen')) 
          {
              $obj2=Imagen::findOrFail($id);
               //Obtenemos la ruta de la imagen de la carpeta publica.
              $url= public_path().'/imagenes/galeria/'.$obj2->nombre;
               //Eliminamos la imagen.
              unlink($url);



              $file = Input::file('Form_Imagen');//obtenemos el objeto.

              $nombre = Str::random(10).$file->getClientOriginalName();
                  //movemos el objeto imagen a una carpeta publica con su nombre original.
                  //Primer parametro indica la ruta, el segundo parametro el archivo a ser movido.
              $file->move(public_path().'/imagenes/galeria/', $nombre);
              $obj1->nombre = $nombre;
          }
         $obj1->update();



          //Eliminamos el antiguo detalle.
          DB::table('tag_imagen')
          ->where('idImagen', '=', $request->get('Form_idImagen'))
          ->delete();


          //Registramos el nuevo detalle.
          $idTag = $request->get('Form_idTag');//array
          $cont = 0;
          while ($cont < count($idTag))
          {
              $detalle = new TagImagen();

              //cuando se registro en la tabla ya tiene un id autogenerado el cual le pasamos al detalle.
              $detalle->idImagen = $request->get('Form_idImagen');
                         
              $detalle->idTag= $idTag[$cont];

              $detalle->save();

              $cont=$cont+1;
          }

        DB::commit();//Confirma la transaccion    
    } 
    catch (Exception $e) 
    {
      echo $e;
      DB::rollback();//Anula la transaccion.
    }
    
    return Redirect::to('galeria/imagen');

         //echo $request->get('Form_imagen');
    }





    //Metedo show devuelve una vista, llamando al archivo "Edit" pero que solo mostrara en pantalle un registro que modifique con el "ID" especifico.
    public function edit($id)
    {
       $obj = DB::table('imagen as img')
          ->join('categoria as cat', 'img.idCategoria','=','cat.id') 
          ->select('img.id','img.titulo', 'img.precio','img.descripcion','cat.id as idCategoria','img.nombre', 'cat.categoria')
          ->where('img.id','=',$id)
          ->first();//Se uso esta funcion para obtener solo el primer registro encontrado y asi evitar el uso de un group by.


        $detalles = DB::table('tag_imagen as det')
        ->join('imagen as img','det.idImagen','=','img.id')
        ->join('tag as ta','det.idTag','=','ta.id')
        ->select('det.id','ta.id as idTag', 'ta.tag')
        ->where('det.idImagen','=',$id)
        ->get();



        $tags=DB::table('tag')->get();//Obtiene todos los registros.

        $categorias=DB::table('categoria')->get();//Obtiene todos los registros.
      //Hace el llamado al archivo show.blade
      //Como segundo parametro le pasa los objetos creados en las consultas sql similar a un CONSULTAR.
        return view("galeria.imagen.edit",["imagenes"=>$obj,"detalles"=>$detalles,"tags"=>$tags,"categorias"=>$categorias]);
    }


    




    public function show($id)
    {
      $obj = DB::table('imagen as img')
          ->join('categoria as cat', 'img.idCategoria','=','cat.id') 
          ->select('img.id','img.titulo', 'img.precio','img.descripcion','cat.categoria','img.nombre', 'cat.categoria')
          ->where('img.id','=',$id)
          ->first();//Se uso esta funcion para obtener solo el primer registro encontrado y asi evitar el uso de un group by.


        $detalles = DB::table('tag_imagen as det')
        ->join('imagen as img','det.idImagen','=','img.id')
        ->join('tag as ta','det.idTag','=','ta.id')
        ->select('det.id','ta.id as idTag', 'ta.tag')
        ->where('det.idImagen','=',$id)
        ->get();
      //Hace el llamado al archivo show.blade
      //Como segundo parametro le pasa los objetos creados en las consultas sql similar a un CONSULTAR.
        return view("galeria.imagen.show",["imagenes"=>$obj,"detalles"=>$detalles]);
    }


}
