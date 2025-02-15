<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ClienteFormRequest;
use Illuminate\Support\Facades\DB;


class ClienteController extends Controller
{
    //
    public function __construct()
    {

    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        if ($request)
        {
            $query=trim($request->get('Texto'));
            $clientes=DB::table('persona')->where('nombre','LIKE','%'.$query.'%')
            ->where('tipo_persona', '=', 'cliente')
            ->orderBy('id_persona', 'desc')
            ->paginate(7);
            return view('ventas.cliente.index',["clientes"=>$clientes,"texto"=>$query]);
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("ventas.clientes.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClienteFormRequest $request)
    {
        //
        $cliente=new Cliente;
        $cliente->tipo_persona=$request->get('tipo_persona');
        $cliente->nombre=$request->get('nombre');
        $cliente->tipo_documento=$request->get('tipo_documento');
        $cliente->numero_documento=$request->get('numero_documento');
        $cliente->direccion=$request->get('direccion');
        $cliente->ntelefono=$request->get('telefono');
        $cliente->email->get('email');
        $cliente->save();
        return Redirect::to('ventas/clientes');


    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        return view("ventas/clientes.show",["clientes"=>Cliente::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        return view("ventas/clientes.edit",["cliente"=>Cliente::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClienteFormRequest $request, $id)
    {
        $cliente= Cliente::findOrFail($id);
        $cliente->tipo_persona=$request->get('tipo_persona');
        $cliente->nombre=$request->get('nombre');
        $cliente->tipo_documento=$request->get('tipo_documento');
        $cliente->numero_documento=$request->get('numero_documento');
        $cliente->direccion=$request->get('direccion');
        $cliente->ntelefono=$request->get('telefono');
        $cliente->email->get('email');
        $cliente->update();
        return Redirect::to('ventas/clientes');
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $cliente=Cliente::findOrFail($id);
        $cliente->estatus='0';
        $cliente->update();
        /* return Redirect::to('almacen/categoria'); */
        return redirect()->route('clientes.index')
                    ->with('success', 'Cliente eliminado correctamente');

    }
}


