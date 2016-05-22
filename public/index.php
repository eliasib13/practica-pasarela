<?php
/**
 * Created by PhpStorm.
 * User: eliasib
 * Date: 19/5/16
 * Time: 18:38
 */
?>

<head>
    <title>Ejemplo Pasarela de Pago</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <h2>Ejemplo Pasarela de Pago</h2>
    <div class="dashboard">
        <div class="product">
            <form action="methods/paymentProcedure.php" method="post">
                <input hidden name="id" type="number" value="1" />
                <p class="name">Libreta roja</p>
                <input hidden name="name" type="text" value="Libreta roja" />
                <p class="price">8,95€</p>
                <input hidden name="price" type="number" value="8.95" />
                <input name="submit" type="submit" value="Añadir al carro" />
            </form>
        </div>
        <div class="product">
            <form action="methods/paymentProcedure.php" method="post">
                <input hidden name="id" type="number" value="2" />
                <p class="name">Mochila 5L</p>
                <input hidden name="name" type="text" value="Mochila 5L" />
                <p class="price">17,95€</p>
                <input hidden name="price" type="number" value="17.95" />
                <input name="submit" type="submit" value="Añadir al carro" />
            </form>
        </div>
        <div class="product">
            <form action="methods/paymentProcedure.php" method="post">
                <input hidden name="id" type="number" value="3" />
                <p class="name">Pluma estilográfica</p>
                <input hidden name="name" type="text" value="Pluma estilográfica" />
                <p class="price">13,49€</p>
                <input hidden name="price" type="number" value="13.49" />
                <input name="submit" type="submit" value="Añadir al carro" />
            </form>
        </div>
    </div>
</body>
