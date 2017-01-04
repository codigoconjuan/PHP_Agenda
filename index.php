<?php
   try {
        require_once('funciones/bd_conexion.php');
        $sql = 'SELECT * FROM contactos'; 
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
              <div class="crear">
                  <h2>Nuevo Contacto</h2>
                  <form action="crear.php" method="post">
                          <div class="campo">
                              <label for="nombre">Nombre</label>
                              <input type="text" name="nombre" id="nombre" placeholder="Nombre">
                          </div>
                          <div class="campo">
                              <label for="numero">Teléfono</label>      
                              <input type="text" name="numero" id="numero" placeholder="Número">
                          </div>
                          <input type="submit" value="Agregar">  
                  </form>
              </div><!--.crear_contacto-->
        </div> <!--.contenido-->
        
        <div class="contenido existentes">
              <h2>Contactos Existentes</h2>
                
              <p>Resultados: <?php echo $resultado->num_rows; ?> </p>
              
              
              <table>
                <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Teléfono</th>
                      <th>Editar</th>
                      <th>Borrar</th>
                    </tr>
                </thead>
                <tbody>
                              <?php //fetch_assoc, fetch_row, fetch_array, fetch_all, fetch_objects  ?>
                        <?php while($registros = $resultado->fetch_assoc() ) { ?>
                                                            <?php //dentro parentesis (MYSQLI_ASSOC, MYSQLI_NUM) ?>
                            <tr>
                                  <td>
                                    <?php echo $registros['nombre']; ?>
                                  </td>
                                  <td>
                                    <?php echo $registros['numero']; ?>
                                  </td>
                                  <td>
                                    <a href="editar.php?id=<?php echo $registros['id']; ?>">Editar</a>
                                  </td>
                                  <td class="borrar">
                                    <a href="borrar.php?id=<?php echo $registros['id']; ?>">Borrar</a>
                                  </td>
                            </tr>
                        <?php } ?>
                </tbody>
                  
              </table>
              

          
        </div>
    </div>

<?php 
    $conn->close();
?>


  </body>
</html>
