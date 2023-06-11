<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Formulario de registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <form id="form" class="p-4 border rounded" method="POST" action="">
            <h2 class="text-center mb-4">Formulario de registro</h2>
            <div class="mb-3">
                <label for="first" class="form-label">Nombre <span class="text-danger"><em>(*)</em></span></label>
                <input type="text" name="first" class="form-control" required />
            </div>
            <div class="mb-3">
                <label for="last" class="form-label">Apellido(s) <span class="text-danger"><em>(*)</em></span></label>
                <input type="text" name="last" class="form-control" required />
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail <span class="text-danger"><em>(*)</em></span></label>
                <input type="text" name="email" class="form-control" required />
            </div>
            <div class="text-center">
                <input type="submit" name="submit" class="btn btn-dark" value="Registrarse" />
            </div>

            <?php
                if($_POST){
                    $first = $_POST["first"];
                    $last = $_POST["last"];
                    $email = $_POST["email"];

                    // Database connection

                    $server = "localhost";
                    $user = "root";
                    $pass = "";
                    $db = "curso";

                    // Create connection
                    $connection = new mysqli($server, $user, $pass, $db);

                    // Check connection
                    if($connection->connect_error) {
                        die("Ha fallado la conexión: " . $connection->connect_error);
                    }

                    $query = "INSERT INTO usuario (nombre, apellido, email)
                        VALUES ('$first', '$last', '$email')";

                    if($connection->query($query) === TRUE) {
                        echo '<script>
                            alert("Te has registrado correctamente");
                            document.getElementById("form").reset();
                        </script>';
                    } 
                    else {
                        echo "Error: " . $query . "<br/>" . $connection_error;
                    }

                    $connection->close();
                }
            ?>
        </form>
    </div>
</body>
</html>