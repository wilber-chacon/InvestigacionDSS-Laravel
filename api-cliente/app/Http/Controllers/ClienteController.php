<?php 
// VL220247, VG220015, CE211044

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{

    //Funcion utilizada para listar todos los clientes
    public function index()
    {

        //retornando todos los registros de la tabla
        return Cliente::all();
    }



    //Funcion utilizada para guardar un nuevo cliente
    public function create(Request $request)
    {
        //creando una instancia de la clase cliente
        $cliente = new Cliente();

        //Guardando los datos del nuevo cliente
        $cliente->nombre = $request->input('nombre');
        $cliente->apellidos = $request->input('apellidos');
        $cliente->edad = $request->input('edad');
        $cliente->salario = $request->input('salario');
        $cliente->save();
        //retornando un mensaje de exito
        return json_encode(['msg' => 'Exito']);
    }


    //Funcion utilizada para consultar un cliente
    public function show($id)
    {

        //retornando el registro del cliente consultado
        return Cliente::find($id);
    }

    //Funcion utilizada para editar un cliente
    public function edit(Request $request, $id)
    {
        //cargando el registro a ser actualizado
        $cliente = Cliente::find($id);
        
        //Guardando los nuevos datos del cliente
        $cliente->nombre = $request->input('nombre');
        $cliente->apellidos = $request->input('apellidos');
        $cliente->edad = $request->input('edad');
        $cliente->salario = $request->input('salario');
        $cliente->save();
        //retornando un mensaje de exito
        return json_encode(['msg' => 'Exito']);
    }

    //Funcion utilizada para editar un cliente
    public function editC(Request $request, $id)
    {
        //cargando el registro a ser actualizado
        $cliente = Cliente::find($id);
        
        //Guardando los nuevos datos del cliente
        $cliente->nombre = $request->input('nombre');
        $cliente->apellidos = $request->input('apellidos');
        $cliente->edad = $request->input('edad');
        $cliente->salario = $request->input('salario');
        $cliente->save();
        //retornando un mensaje de exito
        return json_encode(['msg' => 'Exito']);
    }


    //Funcion utilizada para eliminar un cliente
    public function destroy($id)
    {

        //eliminando el cliente con el id recibido
        Cliente::destroy($id);
        //retornando un mensaje de exito
        return json_encode(['msg' => 'Exito']);
    }


}

// VL220247, VG220015, CE211044