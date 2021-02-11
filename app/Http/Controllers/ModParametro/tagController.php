<?php

namespace App\Http\Controllers\ModParametro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

use App\Models\Tag;
use DB;
use App\Http\Requests\ModParametro\tagFormRequest; 


class tagController extends Controller
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


    	$obj=DB::table('tag')
            ->where('tag','LIKE','%'.$query.'%')
            ->orderBy('id','desc')
            ->paginate(10);

         // Primer parametro: la ruta donde se encuentra la vista.
         // Segundo parametro: los objetos de las consultas.
         return view('parametros.tag.index',["tags"=>$obj,"searchText"=>$query]);
    }

   
    public function create()
    {
        //Llamara a la vista create.blade
        return view('parametros.tag.create');
    }

 
     //En el objeto request se almacena la informacion que enviamos desde el formulario.
    public function store(tagFormRequest $request)
    {
       
        $obj=new Tag;

        $obj->tag=$request->get('Form_tag');
        $obj->descripcion=$request->get('Form_descripcion');
        $obj->save();

        return Redirect::to('parametros/tag');//LLama implicitamente al metodo "index()"
    }

   
    public function show($id)
    {
        // return view('admin.files.index');
    }

   
    public function edit($id)
    {      
    	//El metodo findOrFail($id) obtiene el registro filtrado por id caso de no encontrar coincidencia devuleve un error.
         return view("parametros.tag.edit",["reg"=>Tag::findOrFail($id)]);
    }




    //En el objeto request se almacena la informacion que enviamos desde el formulario.
    public function update(tagFormRequest $request, $id)
    {
        //findOrFail(): toma una identificación y devuelve un solo modelo.
        //Si no existe un modelo coincidente, arroja un error.
        $obj=Tag::findOrFail($id);

        $obj->tag=$request->get('Form_tag');
        $obj->descripcion=$request->get('Form_descripcion');
        $obj->update();
       
        return Redirect::to('parametros/tag');
    }


    //Metodo que se ecargara de eliminar el registro de la BD.
    public function destroy($id)
    {
        $obj=Tag::findOrFail($id);
        $obj->delete();

         return Redirect::to('parametros/tag');
    }
}
