<?php
    include ("conexion.php");

    $bd = new BaseDatos();
    $conexion = $bd->conectar();

    function eliminarProducto($idProducto) {
        global $bd;
        $bd->eliminar("delete from producto where idProducto = $idProducto");
    }

    if (isset($_POST['eliminar'])) {
        // Usar subStr para quitar la barra que aparece
        // al final de la id del producto.
        eliminarProducto(subStr($_POST['eliminar'], 0, -1));
    }
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
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Unidad</th>
                    <th>Descripci&oacute;n</th>
                    <th>PVP</th>
                    <th>Descuento</th>
                    <th>Eliminar</th>
                </tr>
                <?php
                    $resProd = $bd->seleccionar("select * from producto");
                    while ($prod = $resProd->fetch_assoc()) {
                ?>
                    <form method="POST" action=<?php echo $_SERVER['PHP_SELF'];?>>
                        <tr>
                            <td><?php echo $prod['ProductoNombre'];?></td>
                            <td><?php echo $prod['idTipoProducto'];?></td>
                            <td><?php echo $prod['Unidad'];?></td>
                            <td><?php echo $prod['Descripcion'];?></td>
                            <td><?php echo $prod['pvpUnidad'];?></td>
                            <td><?php echo $prod['Descuento'];?></td>
                            <td><input type="submit"/></td>
                            <input type="hidden" name="eliminar" value=<?php echo $prod['idProducto']?>/>
                        </tr>
                    </form>
                <?php }?>
            </table>
        </div>
    </body>
</html>
