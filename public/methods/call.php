<?php
/**
 * Created by PhpStorm.
 * User: eliasib
 * Date: 19/5/16
 * Time: 18:39
 */

if ($_POST['submit'])
    echo 'Calling correct!';
else {
    header("Location: ..");
    die();
}