<?php
/**
 * Created by PhpStorm.
 * User: eliasib
 * Date: 19/5/16
 * Time: 18:39
 */

if (!$_POST['submit']) {
    header("Location: ..");
    die();
}

$claveEncriptacion = '87401456';
$merchantID = '082108630';
$acquirerBIN = '0000554002';
$terminalID = '00000003';

$urlOK = getenv('HEROKU_ENV') ? 'http://practica-pasarela.herokuapp.com' : 'http://localhost:8888/practica-pasarela';
$urlNOK = $urlOK;

$numOperacion = substr(md5(microtime()),rand(0,26),7);
$importe = str_replace(',', '', $_POST['price']);

$tipoMoneda = 978;
$exponente = 2;
$cifrado = 'SHA1';

$cadena_firma = $claveEncriptacion .
    $merchantID .
    $acquirerBIN .
    $terminalID .
    $numOperacion .
    $importe .
    $tipoMoneda .
    $exponente .
    $cifrado .
    $urlOK .
    $urlNOK;

$firma = sha1($cadena_firma);


?>

<HEAD>
    <TITLE>P&aacute;gina de pago</TITLE>
    <link rel="stylesheet" href="../css/index.css">
</HEAD>
<BODY>
    <h1>Proceso de pago</h1>
    <p>Se procederá al pago de la siguiente compra: </p>
    <div class="dashboard">
        <div class="product full-width">
            <FORM ACTION="http://tpv.ceca.es:8000/cgi-bin/tpv" METHOD="POST" ENCTYPE="application/xwww-form-urlencoded">
                <p class="name"><?php echo $_POST['name'] ?></p>
                <p class="price"><?php echo $_POST['price'] ?>€</p>
                <INPUT NAME="MerchantID" TYPE=hidden VALUE="<?php echo $merchantID; ?>">
                <INPUT NAME="AcquirerBIN" TYPE=hidden VALUE="<?php echo $acquirerBIN; ?>">
                <INPUT NAME="TerminalID" TYPE=hidden VALUE="<?php echo $terminalID; ?>">
                <INPUT NAME="URL_OK" TYPE=hidden VALUE="<?php echo $urlOK; ?>">
                <INPUT NAME="URL_NOK" TYPE=hidden VALUE="<?php echo $urlNOK; ?>">
                <INPUT NAME="Firma" TYPE=hidden VALUE="<?php echo $firma; ?>">
                <INPUT NAME="Cifrado" TYPE=hidden VALUE="<?php echo $cifrado; ?>">
                <INPUT NAME="Num_operacion" TYPE=hidden VALUE="<?php echo $numOperacion; ?>">
                <INPUT NAME="Importe" TYPE=hidden VALUE="<?php echo $importe; ?>">
                <INPUT NAME="TipoMoneda" TYPE=hidden VALUE="<?php echo $tipoMoneda; ?>">
                <INPUT NAME="Exponente" TYPE=hidden VALUE="<?php echo $exponente; ?>">
                <INPUT NAME="Pago_soportado" TYPE=hidden VALUE="SSL">
                <INPUT NAME="Pago_elegido" TYPE=hidden VALUE="SSL">
                <div class="payment-data">
                    <b>Datos de pago:</b>
                    <table>
                        <tr>
                            <td>Tarjeta:</td><td><INPUT id="input-tarjeta" NAME="PAN" TYPE=text VALUE=></td>
                        </tr>
                        <tr>
                            <td>Caducidad:</td><td><INPUT id="input-caducidad" NAME="Caducidad" TYPE=number maxlength="6" placeholder="AAAAMM" VALUE=></td>
                        </tr>
                        <tr>
                            <td>CVV2/CVC2:</td><td><INPUT NAME="CVV2" id="input-cvc" TYPE=text VALUE=></td>
                        </tr>
                    </table>
                </div>
                <INPUT NAME="Idioma" TYPE=hidden VALUE="1">
                <INPUT TYPE="submit" VALUE="Confirmar compra">
            </FORM>
        </div>
    </div>
    <script>
        document.getElementById('input-tarjeta').addEventListener('keyup', function() {
            if (document.getElementById('input-tarjeta').value == 'test') {
                document.getElementById('input-tarjeta').value = '5540500001000004';
                document.getElementById('input-caducidad').value = new Date().getFullYear() + '12';
                document.getElementById('input-cvc').value = '989';
            }
        });
    </script>
</BODY>
