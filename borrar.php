<?php
    $id = $_GET['id'];
   
   try {
        require_once('funciones/bd_conexion.php');
        $sql = "DELETE FROM `contactos` WHERE `id` = '{$id}';";
      
        $resultado = $conn->query($sql);
   } catch (Exception $e) {
       $error = $e->getMessage();
   } 
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Agenda PHP</title>
    <link href="https://fonts.googleapis.com/css?family=Proza+Libre" rel="stylesheet">

    <link rel="stylesheet" href="css/estilos.css" media="screen" title="no title">
  </head>
  <body>

    <div class="contenedor">
      <h1>Agenda de Contactos</h1>

        <div class="contenido">
          
                <?php 
                if ($resultado) {
                    echo "Contacto Borrado";
                } else {
                    echo "Error Borrando: " . $conn->error;
                }
                 ?>
                 
                 <a class="volver" href="index.php">Volver a Inicio</a>
        
            
        </div>
    </div>

<?php 
    $conn->close();
?>


  </body>
</html>
