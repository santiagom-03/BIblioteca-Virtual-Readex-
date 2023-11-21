<?php
include 'adminv.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: cambria-bold, sans-serif;
            overflow: auto;
        }

        .background-container {
            background-image: url('../index/Biblioteca-Virtual.jpg'); /* Ruta de la imagen de fondo */
            background-size: cover;
            background-position: cover top;
            background-repeat: no-repeat;
            filter: blur(3px); /* Difuminar solo la imagen de fondo */
            position: relative;
            width: 100%;
            height: 50vh; /* Ajustar la altura al 50% de la página */
            z-index: -1; /*coloca la imagen de encabezado*/

        }


        .second-section {
            background-image: url('../index/blanco.jpg'); /* Ruta de la segunda imagen de fondo */
            background-size: cover;
            background-position: cover;
            background-repeat: no-repeat;
            position: fixed;
            top: 0%; /* Comienza en la mitad de la página */
            left: 0;
            width: 100%;
            height: 50%; /* Ajustar la altura de la segunda sección */
            z-index: 1; /* Colocar encima del contenido */
        }
        
        header {
            text-align: center;
            padding: 100px 0;
            position: relative;
        }

        h1 {
           
            padding: 100px 0;
            font-size: 46px;
            position: absolute;
            left: 50%;
            transform: translate(-50%, -50%); /* Centra el elemento */
            top: -20%; /* Posición en la mitad de la ventana */
            text-shadow: 3px 3px 5px rgba(0, 0, 0, 0.7);
            color: #FFF
            
        }

        h2 {

            padding: 100px 0;
            font-size: 20px;
            position: absolute;
            left: 50%;
            transform: translate(-50%, -50%); /* Centra el elemento */
            top: -12%; /* Posición en la mitad de la ventana */
            text-shadow: 3px 3px 5px rgba(0, 0, 0, 0.7);
            color: #FFF
           
          
        }

        h3 {
            top: -70%;
            text-align: left;
            margin-left: 100px;
            font-size: 30px;
            margin-top: -10px;
            color: #000
            
        }

        p {
            top: -10%;
            text-align: left;
            font-size: 20px;
            margin-top: 5px;
            margin-left: 100px;
            color: #000
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }
       
        a{
            text-align: right;
        }
        a:hover {
            text-decoration: underline;
        }

        body {
            margin: 0;
            padding: 0;

        }
        .slideshow {
            display: flex;
            justify-content: top; /* Centra las diapositivas horizontalmente */
            width: 100%;
            overflow: hidden;
        }
        .slide {
            width: 200px; /* Ancho de cada diapositiva */
            height: 300px; /* Alto de cada diapositiva */
            margin: 0 20px; /* Margen entre diapositivas */
            background-color: #EFB367;
            color: #fff;
            display: flex;
            justify-content: top;
            align-items: top;
            font-size: 24px;
            transition: transform 1s;
        }

</style>
</head>
<body>
    <div class="background-container"></div>
    <header>
        <div class="container">
            <h1>Gestor de Readex</h1>
 
        </div>
    <!-- Apartado de texto -->
    <div class="texto-container" style="margin-top: 15px;">
    </div>
    <h3>Funciones de administrador</h3>
        <p>1 Gestion de los libros  </p>
        <p>2 Gestion de los usuarios</p>
        <p>3 Gestion de los prestamos</p>
    <script>
        const slides = document.querySelectorAll('.slide');
        let currentIndex = 0;

        function nextSlide() {
            slides[currentIndex].style.transform = 'translateX(-100%)'; /* Desplazamiento hacia la izquierda */
            currentIndex = (currentIndex + 1) % slides.length;
            slides[currentIndex].style.transform = 'translateX(0)';
        }
        setInterval(nextSlide, 3000); /* Cambia de diapositiva cada 3 segundos */
    </script>

</div>

<div class="texto-container" style="margin-top: 100px;">
    </header>
</body>
</html>