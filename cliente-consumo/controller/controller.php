<?php
// VL220247, VG220015, CE211044
header('Content-Type: text/html; charset=ISO-8859-1');

if ($_GET) {
    $op = $_GET['operacion'];
} else if ($_POST) {
    $op = $_POST['operacion'];
}

switch ($op) {
    case 'ingresar':
        insert();
        break;
    case 'editar':
        editar();
        break;
    case 'editarPatch':
        editarPatch();
        break;
    case 'eliminar':
        $id = $_GET['id'];
        eliminar($id);
        break;

}



function insert()
{
    $url = "http://127.0.0.1:8000/api/insert";
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $headers = array(
        "Accept: application/json",
        "Content-Type: application/json",
    );
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

    $nombre = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $edad = $_POST['edad'];
    $salario = $_POST['salario'];
    $data = <<<DATA
    {
    "nombre": "$nombre",
    "apellidos": "$apellidos",
    "edad": "$edad",
    "salario": "$salario"
    }
    DATA;

    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    $resp = curl_exec($curl);
    curl_close($curl);
    $result = json_decode($resp);
    if ($result->msg == "Exito") {
        $mensaje = 'si';
        $titulo = 'El cliente se agregó exitosamente.';
    } else {
        $mensaje = 'no';
        $titulo = 'Error no se logró guardar el registro, por favor intente nuevamente.';
    }

    //redireccion a la pagina donde se muestran los registros
    header('location:../index.php?msj=' . $mensaje . '&titulo=' . $titulo);

    //finalizacion del proceso
    exit();
}



function editar()
{
    $nombre = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $edad = $_POST['edad'];
    $salario = $_POST['salario'];
    $id = $_POST['id'];

    $data = <<<DATA
    {
    "nombre": "$nombre",
    "apellidos": "$apellidos",
    "edad": "$edad",
    "salario": "$salario"
    }
    DATA;


    $opciones = array(
        'http' =>
        array(
            'method' => 'PUT',
            'accept' => 'application/json',
            'header' => 'Content-type: application/json',
            'content' => $data
        )
    );

    $contexto = stream_context_create($opciones);
    $resultado = file_get_contents("http://127.0.0.1:8000/api/cliente/$id", false, $contexto);
    $result = json_decode($resultado);

    if ($result->msg == "Exito") {
        $mensaje = 'si';
        $titulo = 'El cliente se editó exitosamente.';
    } else {
        $mensaje = 'no';
        $titulo = 'Error no se logró editar el registro, por favor intente nuevamente.';
    }

    //redireccion a la pagina donde se muestran los registros
    header('location:../index.php?msj=' . $mensaje . '&titulo=' . $titulo);

    //finalizacion del proceso
    exit();

}



function editarPatch()
{
    $nombre = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $edad = $_POST['edad'];
    $salario = $_POST['salario'];
    $id = $_POST['id'];

    $datos = http_build_query(
        array(

            "nombre" => "$nombre",
            "apellidos" => "$apellidos",
            "edad" => "$edad",
            "salario" => "$salario"
        )
    );

    $opciones = array(
        'http' =>
        array(
            'method' => 'PATCH',
            'header'  => 'Content-type: application/x-www-form-urlencoded',
            'content' => $datos
        )
    );

    $contexto = stream_context_create($opciones);
    $resultado = file_get_contents("http://127.0.0.1:8000/api/edit/$id", false, $contexto);
    $result = json_decode($resultado);

    if ($result->msg == "Exito") {
        $mensaje = 'si';
        $titulo = 'El cliente se editó exitosamente.';
    } else {
        $mensaje = 'no';
        $titulo = 'Error no se logró editar el registro, por favor intente nuevamente.';
    }

    //redireccion a la pagina donde se muestran los registros
    header('location:../index.php?msj=' . $mensaje . '&titulo=' . $titulo);

    //finalizacion del proceso
    exit();

}


function eliminar($id)
{

    $opciones = array(
        'http' =>
        array(
            'method' => 'DELETE',
            'header' => 'Content-type: application/json'

        )
    );

    $contexto = stream_context_create($opciones);
    $resultado = file_get_contents("http://127.0.0.1:8000/api/delete/$id", false, $contexto);
    $result = json_decode($resultado);

    if ($result->msg == "Exito") {
        $mensaje = 'si';
        $titulo = 'El cliente se eliminó exitosamente.';
    } else {
        $mensaje = 'no';
        $titulo = 'Error no se logró eliminar el registro, por favor intente nuevamente.';
    }

    //redireccion a la pagina donde se muestran los registros
    header('location:../index.php?msj=' . $mensaje . '&titulo=' . $titulo);

    //finalizacion del proceso
    exit();

}
// VL220247, VG220015, CE211044
?>