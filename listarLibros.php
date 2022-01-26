<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Lista de Libros</title>
</head>
<body>
    <div class="container">
        <center><h2>Listado de Libros</h2></center>    
        <a class="btn btn-warning" href="index.php" role="button">Ir Inicio</a>
        <a class="btn btn-primary" href="nuevolibro.php" role="button">Nuevo Libro</a>
        <br><br>
        <table class="table table-striped table-bordered">
            <th>Nro</th>
            <th>Título</th>
            <th>Pág</th>
            <th>Autor</th>
            <th>Categoría</th>
            <th></th>
            <th></th>
        
        <?php
        include_once("libros.php");    
        $libros=listarlibros();
            $i=1;        
            foreach($libros as $libro) {        
                echo "<tr>";
                echo "<td>$i</td>";
                echo '<td>'.$libro['titulo'].'</td>';
                echo "<td>".$libro['paginas']."</td>";
                echo "<td>".$libro['autor']."</td>";
                echo "<td>".$libro['categoria']."</td>";
                echo "<td><a class='btn btn-success' href='editarlibro.php?idlibro=".$libro['idLibro']."'>Editar</a></td>";
                echo "<td><a class='btn btn-danger' href='guardarlibros.php?opcion=ELIMINAR&idlibro=".$libro['idLibro']."'>Eliminar</a></td>";
                echo "</tr>";
                $i=$i+1;
            } 
        ?>
        </table>
    </div>
</body>
</html>