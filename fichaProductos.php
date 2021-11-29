<?php
    include ("conexion.php");

    $bd = new BaseDatos();
    $conexion = $bd->conectar();
?>

<html>
    <head>
        <link rel="stylesheet" href="style.css" />
    </head>

    <body>
        <div class="header">
            <h1>TIENDA BIRT</h1>
        </div>

        <div class="nav">
            <a class="botonNav">Familia</a>
            <a class="botonNav" href="index.php">Tipo</a>
            <a class="botonNav" href="fichaProductos.php">Producto</a>
            <a class="botonNav">Usuario</a>
        </div>

        <div class="bodyProd">
            <table>
                <tr>
                    <th></th>
                </tr>
                <?php
                    $resProd = $bd->seleccionar("select * from producto");
                    while ($prod = $resProd->fetch_assoc()) {
                ?>
                    <tr>
                        <td></td>
                    </tr>
                <?php }?>
            </table>
        </div>
    </body>
</html>
