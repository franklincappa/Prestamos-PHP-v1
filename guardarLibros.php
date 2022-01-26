<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Actualización</title>
</head>
<body>

    <?php
    include("libros.php");

    $opcion     =$_REQUEST["opcion"];
    $idlibro    =$_REQUEST["idlibro"];

    if($opcion=="NUEVO" or $opcion=="EDITAR"){   
        $isbn       =$_REQUEST["isbn"];
        $titulo     =$_REQUEST["titulo"];
        $paginas    =$_REQUEST["paginas"];
        $idautor      =$_REQUEST["idautor"];
        $idcategoria  =$_REQUEST["idcategoria"];

        $respuesta=guardarLibro($opcion, $idlibro, $isbn, $titulo, $paginas, $idautor, $idcategoria);
        if($respuesta){
            $mensaje="Se guardo el registro satisfactoriamente";
        } else {
            $mensaje="No se puedo Guardar el registro";
        }
    }
    if($opcion=="ELIMINAR"){
        $respuesta=eliminarLibro($idlibro);
        if($respuesta){
            $mensaje="Se Eliminó el registro satisfactoriamente";
        } else {
            $mensaje="No se puedo Eliminar el registro";
        }
    }   

    ?>
    <div class="container">
        <center><h3>
            <?php echo $mensaje; ?>
        </h3>
        </center>
        <br><br>
        <a class="btn btn-primary" href="listarlibros.php" role="button">Ir al Listado</a>
    </div>
    
</body>
</html>

<!--LA Razón de estar contigo  --w
el coronodel no tiene quien le escriba gabriel garcia marquez
crimen y castigo -- fedor dovstovie
el principito antine de saint
-->


