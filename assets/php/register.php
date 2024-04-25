<?php
session_start();
include('conexion.php');

if (!isset($_SESSION['usuario_id']) && isset($_COOKIE['usuario_token'])) {
    $token = $_COOKIE['usuario_token'];

    $sql = "SELECT * FROM usuarios WHERE token = '$token'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['usuario_id'] = $row['id'];
        $_SESSION['nombre_usuario'] = $row['nombre_usuario'];
        $_SESSION['firstname'] = $row['nombre'];
        $_SESSION['lastname'] = $row['apellido'];
        $_SESSION['email'] = $row['correo'];
        $_SESSION['password'] = $row['contrasena'];
        $_SESSION['born'] = $row['fecha_nacimiento'];
    } else {
        // Manejar el caso en el que no se encuentre un usuario con el token
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="es"  data-bs-theme="auto">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>CuruWit</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    
    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="./assets/css/style.css" />
    
    <!-- Metadatos adicionales para la página específica (si es necesario) -->
    <meta name="description" content="Red social cuyo objetivo es unir a la comunidad de la ciudad de Curuzú Cuatiá, manteniéndola informada y comunicada." />
    <meta name="author" content="Gabriel Mansilla, Nahuel Duarte, Juan, Yamir" />
    <meta name="generator" content="Hugo 0.118.2" />

    <!-- Bootstrap JS y modos-de-color.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="../../assets/js/modos-de-color.js"></script>

    <!-- Estilos adicionales para páginas específicas -->
    <link href="../../assets/css/style.css" rel="stylesheet" />
    <link href="../css/style.css" rel="stylesheet" />
    <link href="../css/form.css" rel="stylesheet" />
</head>

  <body>
    <header>
      <nav
        class="navbar navbar-expand-lg navbar-dark"
        style="background-color: #6d7fcc"
      >
        <div class="container">
          <a class="navbar-brand" href="#">
            <img
              src="../images/favicon.ico"
              alt="logo"
              style="width: 20px"
            />
          </a>
          <a class="navbar-brand" href="../../index.php">CuruWit</a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul
              class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll"
              style="--bs-scroll-height: 100px"
            >


              <li class="nav-item">
                <a class="nav-link" href="../../index.php">Inicio</a>
              </li>
              <?php if(isset($_SESSION['usuario_id'])): ?>
              <li class="nav-item">
                <a class="nav-link" href="perfil.php">Mi Perfil</a>
              </li>
              <?php else: ?>
              <?php endif; ?>
              <li class="nav-item">
                <a class="nav-link" href="home.php">Wits</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../../about.php">Sobre nosotros</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contacto.php">Contacto/Soporte</a>
              </li>
            </ul>
            <div class="navbar-buttons mbr-section-btn text-light">
              <?php if(isset($_SESSION['usuario_id'])): ?>
                <a id="boton_form" class="btn btn-dark display-7" href="./configuracion.php">Configuración</a>
                <a id="boton_form" class="btn btn-dark display-7" href="./logout.php">Cerrar sesión</a>
              <?php else: ?>
                <a id="boton_form" class="btn btn-dark display-7" href="./register.php">Registrarse</a>
                <a id="boton_form" class="btn btn-dark display-7" href="./login.php">Iniciar sesión</a>
              <?php endif; ?>
            </div>
        </div>
      </nav>
    </header>
    <main class="d-flex align-items-center py-4 bg-body-tertiary">
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
      <symbol id="check2" viewBox="0 0 16 16">
        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
      </symbol>
      <symbol id="circle-half" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
      </symbol>
      <symbol id="moon-stars-fill" viewBox="0 0 16 16">
        <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/>
        <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
      </symbol>
      <symbol id="sun-fill" viewBox="0 0 16 16">
        <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
      </symbol>
    </svg>

    <!-- Boton para cambiar de temas dark/light -->
    <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
      <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center"
              id="bd-theme"
              type="button"
              aria-expanded="false"
              data-bs-toggle="dropdown"
              aria-label="Toggle theme (auto)">
        <svg class="bi my-1 theme-icon-active" width="1em" height="1em"><use href="#circle-half"></use></svg>
        <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
      </button>
      <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
            <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em"><use href="#sun-fill"></use></svg>
            Light
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
            <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em"><use href="#moon-stars-fill"></use></svg>
            Dark
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto" aria-pressed="true">
            <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em"><use href="#circle-half"></use></svg>
            Auto
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
      </ul>
    </div>  <div class="form-signin w-100 m-auto">
  <form action="procesar_registro.php" method="post">

    <div style="text-align: center;">
      <img class="mb-4" src="../images/favicon.ico" alt="" width="30" height="100">
      <h1 class="h3 mb-3 fw-normal">Registro de Usuario</h1>
    </div>

    <div class="row mb-3">
      <div class="col-md-6">
        <div class="form-floating">
          <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Nombre" required>
          <label for="firstName">Nombre</label>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-floating">
          <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Apellido" required>
          <label for="lastName">Apellido</label>
        </div>
      </div>
    </div>

    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="luserName" name="luserName" placeholder="Nombre_Usuario" required>
      <label for="luserName">Nombre de Usuario</label>
    </div>
    <div class="form-floating mb-3">
      <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
      <label for="email">Correo electrónico</label>
    </div>

    <div class="form-floating mb-3">
      <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required>
      <label for="password">Contraseña</label>
    </div>

    <div class="row mb-3">
      <div class="col-md-12">
        <div class="form-floating">
          <input type="date" class="form-control" id="dob" name="dob" placeholder="Fecha de nacimiento" required>
          <label for="dob">Fecha de nacimiento</label>
        </div>
      </div>
      <!-- Puedes agregar más campos según tus necesidades -->
    </div>

    <div class="form-check text-start mb-3">
      <input class="form-check-input" type="checkbox" value="remember-me" id="rememberMe" name="rememberMe">
      <label class="form-check-label" for="rememberMe">
        Recordar mi contraseña
      </label>
    </div>

    <button class="btn btn-primary w-100 py-2" type="submit">Registrarse</button>

  </form>
</div>


  </div>
</main>



      
      <footer
        class="text-center text-white footer-fixed"
        style="background-color: #6d7fcc"
      >
        <div class="container pt-2">
          <section class="mb-2">
            <!-- Facebook -->
            <a
              class="btn btn-link btn-floating btn-lg text-white"
              target="_blank"
              href="https://www.facebook.com/HeavyChinese/"
              role="button"
              data-mdb-ripple-color="dark"
              ><i class="bi bi-facebook"></i
              ><svg
                xmlns="http://www.w3.org/2000/svg"
                width="16"
                height="16"
                fill="currentColor"
                class="bi bi-facebook"
                viewBox="0 0 16 16"
              >
                <path
                  d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"
                /></svg
            ></a>

            <!-- Discord -->
            <a
              class="btn btn-link btn-floating btn-lg text-white"
              target="_blank"
              href="https://discord.com/invite/gA8tpHS"
              role="button"
              data-mdb-ripple-color="dark"
              ><i class="bi bi-linkedin"></i>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="16"
                height="16"
                fill="currentColor"
                class="bi bi-discord"
                viewBox="0 0 16 16"
              >
                <path
                  d="M13.545 2.907a13.227 13.227 0 0 0-3.257-1.011.05.05 0 0 0-.052.025c-.141.25-.297.577-.406.833a12.19 12.19 0 0 0-3.658 0 8.258 8.258 0 0 0-.412-.833.051.051 0 0 0-.052-.025c-1.125.194-2.22.534-3.257 1.011a.041.041 0 0 0-.021.018C.356 6.024-.213 9.047.066 12.032c.001.014.01.028.021.037a13.276 13.276 0 0 0 3.995 2.02.05.05 0 0 0 .056-.019c.308-.42.582-.863.818-1.329a.05.05 0 0 0-.01-.059.051.051 0 0 0-.018-.011 8.875 8.875 0 0 1-1.248-.595.05.05 0 0 1-.02-.066.051.051 0 0 1 .015-.019c.084-.063.168-.129.248-.195a.05.05 0 0 1 .051-.007c2.619 1.196 5.454 1.196 8.041 0a.052.052 0 0 1 .053.007c.08.066.164.132.248.195a.051.051 0 0 1-.004.085 8.254 8.254 0 0 1-1.249.594.05.05 0 0 0-.03.03.052.052 0 0 0 .003.041c.24.465.515.909.817 1.329a.05.05 0 0 0 .056.019 13.235 13.235 0 0 0 4.001-2.02.049.049 0 0 0 .021-.037c.334-3.451-.559-6.449-2.366-9.106a.034.034 0 0 0-.02-.019Zm-8.198 7.307c-.789 0-1.438-.724-1.438-1.612 0-.889.637-1.613 1.438-1.613.807 0 1.45.73 1.438 1.613 0 .888-.637 1.612-1.438 1.612Zm5.316 0c-.788 0-1.438-.724-1.438-1.612 0-.889.637-1.613 1.438-1.613.807 0 1.451.73 1.438 1.613 0 .888-.631 1.612-1.438 1.612Z"
                /></svg
            ></a>

            <!-- Instagram -->
            <a
              class="btn btn-link btn-floating btn-lg text-white"
              target="_blank"
              href="https://www.instagram.com/heavychinese/"
              role="button"
              data-mdb-ripple-color="dark"
              ><i class="bi bi-instagram"></i>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="16"
                height="16"
                fill="currentColor"
                class="bi bi-instagram"
                viewBox="0 0 16 16"
              >
                <path
                  d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"
                /></svg
            ></a>
          </section>
        </div>

        <div class="text-center text-white pb-3">
          © 2023 Copyright:
          <a
            class="text-white"
            target="_blank"
            href="../../index.html"
            >CuruWit
        </div>
      </footer>
  </body>
</html>
