<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Formulario</title>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>


<?php
  if(isset($_POST['g-recaptcha-response']))
  {
    $recaptcha = $_POST['g-recaptcha-response'];
    $res = reCaptcha($recaptcha);
    if($res['success']){
      // Send email
    }else{
      // Error
    }
  }
  
  function reCaptcha($recaptcha){
    $secret = "6LdoZIoiAAAAALnYORulVS5zhgRZkow0xByvQAib";
    $ip = $_SERVER['REMOTE_ADDR'];
  
    $postvars = array("secret"=>$secret, "response"=>$recaptcha, "remoteip"=>$ip);
    $url = "https://www.google.com/recaptcha/api/siteverify";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);
    $data = curl_exec($ch);
    curl_close($ch);
  
    return json_decode($data, true);
  }
?>



  <?php
function test_input($data) 
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function comprobar()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $nombre = test_input($_REQUEST['nombre']);
        $apellidos = test_input($_REQUEST['apellidos']);
        $edad = test_input($_REQUEST['edad']);
        $peso = test_input($_REQUEST['peso']);
        $nombre = test_input($_REQUEST['nombre']);
        $telefono = test_input($_REQUEST['telefono']);
        $web = test_input($_REQUEST['web']);
    }
}

?>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <h1 class="text-center mt-4">Formulario</h1>
      <div class="container text-center">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
        <div class="row align-items-start mt-4">
          <div class="col">
            <label for="nombre">Nombre*: <input type="text" name="nombre" required></label><p name="error" id="error_nombre"></p>
            <label for="apellidos">Apellidos: <input type="text" name="apellidos" required></label><p name="error" id="error_apellido"></p>
            <label for="edad">Edad: </label>
              <select name="edad">
              <?php
                for($i = 0; $i <= 100; $i++)
                {
                  print("<option value=".$i.">".$i."</option>");
                }
              ?>
              </select>
          </div>
          <div class="col">
            <label for="correo">Indique su dirección de correo*: <input type="email" name="correo" required></label><p name="error" id="error_correo"></p>
            <label for="correo2">Confirme su dirección de correo*: <input type="email" name="correo2" required></label><p name="error" id="error_correo2"></p>
            <label for="nombre">¿Quiere recibir spam?: <select name="spam"><option value="si">Si</option><option value="no">No</option></select>
          </div>
          <div class="col">
            <label for="peso">Peso: <input type="number" name="peso"></label><p name="error" id="error_peso"></p>
            <label for="telefono">Teléfono: <input type="number" name="telefono" maxlength="9" required></label><p name="error" id="error_telefono"></p>
            <label for="web">Página web: <input type="text" name="web"></label></br>
          </div>
        </div>
        <div class="row align-items-start mt-4">
          <div class="col">
            <label for="aficiones"><h5>Aficiones</h5></label>
            <p name="error" id="error_aficiones"></p>
            <ul style='list-style: none;'>
                <li><label for="cine">Cine</label><input type="checkbox"></li>
                <li><label for="literatura">Literatura</label><input type="checkbox"></li>
                <li><label for="tebeos">Tebeos</label><input type="checkbox"></li>
                <li><label for="deporte">Deporte</label><input type="checkbox"></li>
                <li><label for="musica">Música</label><input type="checkbox"></li>
                <li><label for="television">Televisión</label><input type="checkbox"></li>
            </ul>
          </div>
          <div class="col mt-4">
            <label for="estilo">Cambia el estilo de la página:</label>
            <ul style='list-style: none;'>
              <li><label for="letra">Letra de la página </label>
                <select name="letra">
                  <?php
                    $fuentes = ["Arial","Verdana","Tahoma","Trebuchet MS","Times New Roman","Georgia","Garamond","Courier New","Brush Script MT"];
                    for($i = 0; $i < count($fuentes); $i++)
                    {
                      print("<option class='text-center' value=".$fuentes[$i].">".$fuentes[$i]."</option>");
                    }
                  ?>
                </select>
                </li>
                <li><label for="fondo">Fondo de la página </label><input type="color" name="fondo" value="#b2e7e8"></li>
              </ul>
              <textarea name="textarea"></textarea>
          </div>
          <div class="col">
            <label for="frutas"><h5>Fruta preferida</h5></label>
            <p name="error" id="error_fruta"></p>
            <ul style='list-style: none;'>
                <li><label for="cerezas">Cerezas</label><input type="radio" name="fruta"></li>
                <li><label for="fresas">Fresas</label><input type="radio" name="fruta"></li>
                <li><label for="limon">Limón</label><input type="radio" name="fruta"></li>
                <li><label for="manzana">Manzana</label><input type="radio" name="fruta"></li>
                <li><label for="naranja">Naranja</label><input type="radio" name="fruta"></li>
                <li><label for="pera">Pera</label><input type="radio" name="fruta"></li>
            </ul>
          </div>
        </div>
        <div class="row align-items-start mt-4">
          <div class="col mt-4">
            <div class="g-recaptcha brochure__form__captcha" data-sitekey="6LdoZIoiAAAAALh3fOz-gFLxsu8AHwz-depinwSI" style="text-align: center;display:inline-block"></div></br>
            <input type="button" value='Enviar' onclick='comprobar()'>
          </div>
        </div>
    </form>
  </body>
</html>