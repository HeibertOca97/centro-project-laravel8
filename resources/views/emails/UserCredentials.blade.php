<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Creedenciales de usuario</title>
</head>
<body style="background-color: #EEF9F8;font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';font-size:16px;">
  <h1 style="text-align: center;margin-top:25px;margin-bottom:25px;color:#464646;font-size:16px;">{{$name}}</h1>
  <section style="max-width: 600px;margin:auto;background-color:#fff;padding:25px;box-sizing:border-box;border-radius:10px;box-shadow:0px 3px 10px rgb(223, 223, 223);">
    <h3 style="color: #464646;">¡Hola!</h3>
    <div style="color: #718096;">
      <p>Ahora tendras el acceso a un conjunto de herramientas para poder realizar tus tareas y trabajos correspondiente.</p>
      <p>A continuacion tus creedenciales de acceso:</p>
      <ol>
        <li><b style="color:#464646;">Usuario:</b> {{$user}}</li>
        <li><b style="color:#464646;">Contraseña:</b> {{$pass}}</li>
      </ol>
      <p>¡Estamos felices de tenerte en nuestro equipo!</p>
      <div style="display: flex;justify-content:center;align-items:center;margin:25px auto;"><a href="{{$url}}" style="display: block;padding:8px 15px;text-align:center;color:#fff;background-color:#35B15F;text-decoration:none;border-radius:5px;">Comencemos</a></div>
      <p>Este enlace te llevara al sitio.</p>
      <p>Saludos, {{$name}}</p>
    </div>
  </section>
  <footer style="font-size: 12px; text-align: center;color: #718096;margin-top:30px;margin-bottom:30px;">
    © 2021 {{$name}}. All rights reserved.
  </footer>

  
</body>
</html>