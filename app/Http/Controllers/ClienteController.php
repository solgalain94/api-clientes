<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ClienteRequest;

class ClienteController extends Controller
{

    //OPCIÓN: GETALL   URL: 127.0.0.1:8000/api/clientes      METHOD: GET
    public function index()
    {
        return Cliente::all();
    }

    //OPCIÓN: GETID    URL: 127.0.0.1:8000/api/clientes/{id}  METHOD: GET
    public function show($id)
    {
        $cliente = Cliente::find($id);
        if ($cliente) {
            return $cliente;
        } else {
            return response()->json([
                'status'  => 'error',
                'message' => 'No se ha encontrado ningun cliente con ese ID',
            ]);
        }
    }

    //OPCIÓN: SEARCH   URL: 127.0.0.1:8000/api/clientes/serch/{nombre}   METHOD: GET
    public function search($nombre)
    {
        $cliente = Cliente::where('nombre', 'like','%' . $nombre . '%')->get();
        if ($cliente->count() > 0) {
            return $cliente;
        } else {
            return response()->json([
                'status'  => 'error',
                'message' => 'No se ha encontrado ningun cliente con ese nombre',
            ]);
        }
    }

    //OPCIÓN: INSERT   URL: 127.0.0.1:8000/api/clientes    METHOD: POST
    public function store(ClienteRequest $request)
    {

        DB::beginTransaction();
        try {

            $cliente = Cliente::create($request->all());
            $cliente->save();

            DB::commit();

        } catch(\Exception $e) {

            DB::rollback();
            return response()->json([
                'status'  => 'error',
                'message' => 'Ha ocurrido un error.',
                'error'   => $e->getMessage()
            ]);
        }

        return response()->json([
            'status'  => 'success',
            'message' => 'Ciente creado con exito.',
            'cliente' => $cliente
        ]);

    }

    //OPCIÓN: UPDATE   URL: 127.0.0.1:8000/api/clientes    METHOD: PUT
    public function update(ClienteRequest $request, $id)
    {

        DB::beginTransaction();

        try {
            $cliente = Cliente::find($id);
            $cliente->update($request->all());
            $cliente->save();

            DB::commit();

            return response()->json([
                'status'  => 'success',
                'message' => 'Ciente actualizado con éxito.',
                'cliente' => $cliente
            ]);
        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([
                'status'  => 'error',
                'message' => $e->getMessage(),
            ]);
        }
    }
}
