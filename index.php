<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>



    <div class="container">
        <div class="row">
            <div class="col text-center my-4">
                <div class="card ">
                    <form action="/prueba/controllers/create.php" method="POST">
                        <div class="my-4">
                            <small>NOMBRES:</small>
                            <input type="text" id="nombres" name="nombres">
                        </div>
                        <div class="my-4">
                            <small>EMAIL:</small>
                            <input type="email" id="email" name="email">
                        </div>
                        <div class="my-4">
                            <small>EDAD:</small>
                            <input type="number" id="edad" name="edad">
                        </div>
                        <div class="my-4">
                            <input type="submit" value="GUARDAR" name="guardar" id="guardar" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col my-4">


                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">EDAD</th>
                            <th scope="col">NOMBRE</th>
                            <th scope="col">EMAIL</th>
                            <th scope="col">EDAD</th>
                            <th scope="col">EDITAR</th>
                            <th scope="col">ELIMINAR</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        $mysqli = include_once('./database/connection.php');

                        $result = $mysqli->query('SELECT * FROM usuario');

                        while ($mostrar = $result->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo $mostrar['idUsuario'] ?></td>
                                <td><?php echo $mostrar['nombres'] ?></td>
                                <td><?php echo $mostrar['email'] ?></td>
                                <td><?php echo $mostrar['edad'] ?></td>
                                <td>
                                    <button class="btn btn-success">EDITAR</button>
                                </td>
                                <td>
                                    <button onclick="eliminarUser(<?php echo $mostrar['idUsuario'] ?>)">ELIMINAR</button>
                                </td>
                            </tr>

                        <?php
                        }
                        ?>


                    </tbody>
                </table>




            </div>
        </div>






    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <script>
        async function eliminarUser(idUsuario) {
            let url = './controllers/delete.php'
            let response = await fetch(url, {
                method: 'POST',
                body: {
                    idUsuario
                },
                headers: {
                    'Content-Type': 'application/json'
                }

            })

            location.reload()
        }
    </script>
</body>

</html>