<!-- VL220247, VG220015, CE211044 -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>Ingresar cliente</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/estilos.css" />
</head>

<body>
<nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">DSS</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">Inicio <span class="sr-only">(current)</span></a></li>
                    <li><a href="insertar.php">Agregar cliente</a></li>
                </ul>

            </div>
        </div>
    </nav>
    <div class="container">

        <div class="row">
            <div class="col-md-12">

                <h1 class="text-center">Agregar cliente</h1>

            </div>
        </div>
        <div class="row" style="margin-top:30px;">
            <div class="col-md-offset-3 col-md-6">
                <form action="controller/controller.php" method="POST">
                    <input type="hidden" name="operacion" id="operacion" value="ingresar">
                    <div class="form-group">
                        <label for="nombres">Nombres:</label>
                        <input type="text" class="form-control" name="nombres"
                            id="nombres" />
                    </div>
                    <div class="form-group">
                        <label for="apellidos">Apellidos:</label>
                        <input type="text" class="form-control" name="apellidos"
                            id="apellidos" />
                    </div>
                    <div class="form-group">
                        <label for="edad">Edad:</label>
                        <input type="number"  min="1" class="form-control" name="edad"
                            id="edad" />
                    </div>
                    <div class="form-group">
                        <label for="salario">Salario:</label>
                        <input type="number" id="salario" name="salario" class="form-control" step="0.01" min="1" />
                    </div><br>
                    <a href="index.php" class="btn btn-default">Atras</a>
                    <button type="submit" class="btn btn-success">Enviar</button>

                </form>
            </div>
        </div>
    </div>
    <footer class="p-5 bg-dark">
        <div class="my-auto">
            <div class="copyright pt-4 pb-4 text-center my-auto text-white">
                <span>Copyright &copy; 2023 - Investigacion DSS</span>
            </div>
        </div>
    </footer>
    <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
<!-- VL220247, VG220015, CE211044 -->