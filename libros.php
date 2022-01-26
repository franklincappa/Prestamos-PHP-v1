
<?php

function listarLibros(){
    include ("conexion.php");    
    $libros=$conexion->query('select * from vi_libros');       
    $conexion = null;
    return $libros;
}

function listarAutor(){
    include ("conexion.php");    
    $autores=$conexion->query('select * from autor');       
    $conexion = null;
    return $autores;
}

function listarCategoria(){
    include ("conexion.php");    
    $categoria=$conexion->query('select * from categoria');       
    $conexion = null;
    return $categoria;
}

function seleccionarLibro($idLibro){
    include ("conexion.php");    
    $libro=$conexion->query("select * from libro where idlibro=$idLibro");       
    $conexion = null;
    return $libro;
}

function guardarLibro($opcion, $idlibro, $isbn, $titulo, $paginas, $idautor, $idcategoria){
    include ("conexion.php");  
    $guardar=false;
    if ($opcion=="NUEVO")  {
        $consulta="insert libro (isbn, titulo, paginas, idautor, idcategoria) values ('$isbn','$titulo','$paginas',$idautor,$idcategoria)";
    }
    if ($opcion=="EDITAR"){
        $consulta="update libro set isbn='$isbn', titulo='$titulo', paginas=$paginas, idautor=$idautor, idcategoria=$idcategoria where idlibro=$idlibro";
    }
    $guardar=$conexion->query($consulta);       
    $conexion = null;
    return $guardar;
}

function eliminarLibro($idlibro){
    include ("conexion.php");    
    $eliminar=$conexion->query("delete from libro where idLibro=$idlibro");  
    $conexion = null;
    return $eliminar;
}


?>