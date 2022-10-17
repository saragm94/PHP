<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Formulario</title>
  </head>
  <body>
    <form action="form.php" method="post">
        <label for="nombre">Nombre*: <input type="text" name="nombre" required></label></br>
        <label for="apellidos">Apellidos: <input type="text" name="apellidos" required></label></br>
        <label for="edad">Edad: 
          <input type="number" name="edad">
          <select name="edad">
          <?php
            for($i = 0; $i <= 100; $i++)
            {
              print("<option value=".$i.">".$i."</option>");
            }
          ?>
          </select>
          
        </label></br>
        </br></br>

        <label for="peso">Peso: <input type="number" name="peso"></label></br>
        <label for="telefono">Teléfono: <input type="number" name="telefono" maxlength="9" required></label></br>
        <label for="web">Página web: <input type="text" name="web"></label></br>
        </br></br>

        <label for="correo">Indique su dirección de correo*: <input type="email" name="correo" required></label></br>
        <label for="correo2">Confirme su dirección de correo*: <input type="email" name="correo2" required></label></br>
        <label for="nombre">¿Quiere recibir spam?: <select name="spam"><option value="si">Si</option><option value="no">No</option></select></br>
        </br></br>

        <label for="aficiones">Aficiones:</label>
        <ul>
            <li><label for="cine">Cine</label><input type="checkbox"></li>
            <li><label for="literatura">Literatura</label><input type="checkbox"></li>
            <li><label for="tebeos">Tebeos</label><input type="checkbox"></li>
            <li><label for="deporte">Deporte</label><input type="checkbox"></li>
            <li><label for="musica">Música</label><input type="checkbox"></li>
            <li><label for="television">Televisión</label><input type="checkbox"></li>
        </ul>

        <label for="frutas">Indique su fruta preferida:</label>
        <ul>
            <li><label for="cerezas">Cerezas</label><input type="radio" name="fruta"></li>
            <li><label for="fresas">Fresas</label><input type="radio" name="fruta"></li>
            <li><label for="limon">Limón</label><input type="radio" name="fruta"></li>
            <li><label for="manzana">Manzana</label><input type="radio" name="fruta"></li>
            <li><label for="naranja">Naranja</label><input type="radio" name="fruta"></li>
            <li><label for="pera">Pera</label><input type="radio" name="fruta"></li>
        </ul>

        <label for="estilo">Cambia el estilo de la página:</label>
        <ul>
            <li><label for="letra">Letra de la página </label>
            <select name="letra">
              <?php
                
              ?>
            </select>
            </li>
            <li><label for="fondo">Fondo de la página </label><input type="color" name="fondo" value="#b2e7e8"></li>
        </ul>
        <textarea name="textarea">
        </textarea>
        <input type="button" value='Enviar' onclick='comprobar()'>
    </form>
  </body>
</html>