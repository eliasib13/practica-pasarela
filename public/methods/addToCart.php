<?php
/**
 * Created by PhpStorm.
 * User: eliasib
 * Date: 19/5/16
 * Time: 18:39
 */

if ($_POST['submit']) {
    echo 'Calling correct!<br>';
    echo 'ID: ' . $_POST['id'] . '<br>';
    echo 'Name: ' . $_POST['nombre'] . '<br>';
    echo 'Price: ' . $_POST['precio'] . '<br>';
}
else {
    header("Location: ..");
    die();
}