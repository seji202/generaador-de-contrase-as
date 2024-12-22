<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador de Contraseñas</title>
    <!-- Enlace al archivo CSS externo -->
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div class="container">
        <h1>Generador de Contraseñas</h1>
        <div class="password">
            <?php
                // Función para generar una contraseña aleatoria
                function generarContrasena() {
                    // Definir los caracteres permitidos
                    $letrasMinusculas = 'abcdefghijklmnopqrstuvwxyz'; // Minúsculas
                    $letrasMayusculas = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'; // Mayúsculas
                    $numeros = '0123456789'; // Números
                    $caracteresEspeciales = '!@#$%^&*()_+-=[]{}|;:,.<>?'; // Caracteres especiales

                    // Combinar todos los caracteres en una sola cadena
                    $todosLosCaracteres = $letrasMinusculas . $letrasMayusculas . $numeros . $caracteresEspeciales;

                    // Elegir una longitud aleatoria entre 8 y 12 caracteres
                    $longitud = rand(8, 12);

                    // Crear un array para la contraseña
                    $contrasena = [];

                    // Asegurar que haya al menos un carácter de cada tipo
                    $contrasena[] = $letrasMinusculas[rand(0, strlen($letrasMinusculas) - 1)];
                    $contrasena[] = $letrasMayusculas[rand(0, strlen($letrasMayusculas) - 1)];
                    $contrasena[] = $numeros[rand(0, strlen($numeros) - 1)];
                    $contrasena[] = $caracteresEspeciales[rand(0, strlen($caracteresEspeciales) - 1)];

                    // Completar la contraseña con caracteres aleatorios hasta alcanzar la longitud deseada
                    for ($i = 4; $i < $longitud; $i++) {
                        $contrasena[] = $todosLosCaracteres[rand(0, strlen($todosLosCaracteres) - 1)];
                    }

                    // Mezclar los caracteres para evitar patrones predecibles
                    shuffle($contrasena);

                    // Unir el array en una cadena de texto y devolver la contraseña
                    return implode('', $contrasena);
                }

                // Mostrar la contraseña generada en la página
                echo generarContrasena();
            ?>
        </div>
        <!-- Botón para recargar la página y generar una nueva contraseña -->
        <form method="POST">
            <button type="submit">Generar Nueva Contraseña</button>
        </form>
    </div>
</body>
</html>
