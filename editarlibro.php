<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Registro Nuevo Libro
    </title>
</head>
<body>
    <?php
        include("libros.php");
        $idlibro=$_REQUEST["idlibro"];
        $libro=seleccionarLibro($idlibro);
        foreach($libro as $campos){}
    ?>
    <div class="container">
        <center><h2>Formulario: Editar Libro</h2></center>    
        <a class="btn btn-primary" href="listarLibros.php" role="button">Ir al Listado</a>
        <br><br>
        <form action="guardarlibros.php" method="post">
            <input type="hidden" name="opcion" value="EDITAR">
            <input type="hidden" name="idlibro" value="<?php echo $campos["idLibro"];?>">
            
            <div class="mb-3">
                <label class="form-label">ID Libro: </label>
                <label class="form-label"><?php echo $campos["idLibro"];?></label>                
            </div>

            <div class="mb-3">
                <label for="titulo" class="form-label">Título del Libro</label>
                <input type="text" name="titulo" id="titulo" placeholder="Ejem: La odisea" class="form-control" value="<?php echo $campos["titulo"];?>">
            </div>

            <div class="mb-3">
                <label for="isbn" class="form-label">ISBN</label>
                <input type="text" name="isbn" id="isbn" placeholder="9 789872 562021" class="form-control" value="<?php echo $campos["isbn"];?>">
            </div>
            
            <div class="mb-3">
                <label for="paginas" class="form-label">Páginas</label>
                <input type="text" name="paginas" id="paginas" placeholder="156, .." class="form-control" value="<?php echo $campos["paginas"];?>">
            </div>
            <div class="mb-3">
                <label for="idautor" class="form-label">Autor</label>
                <select name="idautor" id="idautor"  class="form-select">
                    <?php                    
                    $autores=listarAutor();
                    foreach($autores as $autor){
                        $select="";
                        if ($autor['idAutor']==$campos['idAutor']){
                            $select=" SELECTED";
                        }
                        echo "<option value=".$autor['idAutor'].$select.">".$autor['nombres']." ".$autor['apellidos']."</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="idcategoria" class="form-label">Categoría Literaria</label>
                <select name="idcategoria" id="idcategoria"  class="form-select">
                    <?php
                    $categorias=listarCategoria();
                    foreach($categorias as $categoria){
                        $select="";
                        if ($categoria['idCategoria']==$campos['idCategoria']){
                            $select=" SELECTED";
                        }
                        echo "<option value=".$categoria['idCategoria'].$select.">".$categoria['descripcion']."</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <input type="submit" value="Actualizar Datos" class="btn btn-success">
            </div>
        </form>
    </div>
    

</body>
</html>