<?php

namespace App\Http\Controllers\ModParametro;

use App\Http\Controllers\Controller;//Archivo Base.

use Illuminate\Support\Facades\Redirect;// Incorpora las clases necesarios para la redireccion ejemplo: Redirect::to('parametros/tema');

use Illuminate\Http\Request; // Incorpora las clases necesario para poder usar el objeto "Request" usado por parametro donde obtiene los valores del formulario                                  Ejemplo: public function index(Request $request)




use App\Models\Tema;//El modelo.
use DB;// Agrega las funciones de la BD.
//use App\Http\Request;//Incorpora la clase predefinida Request.
use App\Http\Requests\ModParametro\temaFormRequest; // Incorpora nuestro archivo Request.



class temaController extends Controller
{
        public function __construct()
    {
        //--------------------------------------------------------------------------------
        //Instruccion que permitira gestionar el acceso a las vistas de este controlador 
        //Si no esta logeado  no permitira acceder a la vista redireccionara al formulario //Login.
        //--------------------------------------------------------------------------------
        $this->middleware('auth');

    }

  
    //Este metodo mostrara todas los temas y los enviara a la plantilla index.blade.php
    public function index(Request $request)
    {
        //Valor que obtenermos de la plantilla de search.blade
        $query=trim($request->get('searchText'));


    	$obj=DB::table('tema')
            ->where('tema','LIKE','%'.$query.'%')
            ->orderBy('id','desc')
            ->paginate(10);

         // Primer parametro: la ruta donde se encuentra la vista.
         // Segundo parametro: los objetos de las consultas.
         return view('parametros.tema.index',["temas"=>$obj,"searchText"=>$query]);
    }

   
    public function create()
    {
        //Llamara a la vista create.
        return view('parametros.tema.create');
    }

 
     //En el objeto request se almacena la informacion que enviamos desde el formulario.
    public function store(temaFormRequest $request)
    {
       
        $obj=new Tema;

        $obj->tema=$request->get('Form_tema');
        $obj->descripcion=$request->get('Form_descripcion');
        $obj->save();

        return Redirect::to('parametros/tema');//LLama implicitamente al metodo "index"
    }

   
    public function show($id)
    {
         return view('admin.files.index');
    }

   
    public function edit($id)
    {      
         return view("parametros.tema.edit",["reg"=>Tema::findOrFail($id)]);
    }




    //En el objeto request se almacena la informacion que enviamos desde el formulario.
    public function update(temaFormRequest $request, $id)
    {
        //findOrFail(): toma una identificación y devuelve un solo modelo.
        //Si no existe un modelo coincidente, arroja un error.
        $obj=Tema::findOrFail($id);

        $obj->tema=$request->get('Form_tema');
        $obj->descripcion=$request->get('Form_descripcion');
        $obj->update();
       
        return Redirect::to('parametros/tema');
    }


    //Metodo que se ecargara de eliminar el registro de la BD y de la carpeta public donde se encuentra la imagen en fisico.
    public function destroy($id)
    {
        $obj=Tema::findOrFail($id);
        $obj->delete();

         return Redirect::to('parametros/tema');
    }
}
