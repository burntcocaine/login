<?php
//ProPayPal es vital para declarar si es demo o prueba las transacciones

//define('ProPayPal', 0); // El cero simboliza entorno de Prueba
//define('ProPayPal', 1); // El 1 simboliza entorno de producción

define('ProPayPal', 0);
if(ProPayPal){
define("PayPalClientId", "*********************");
define("PayPalSecret", "*********************");
define("PayPalBaseUrl", "https://demo.baulphp.com/paypal-php-integracion-con-ejemplo-completo/");
define("PayPalENV", "production");
} else {
define("PayPalClientId", "AVACP5vOuQheKwTdBy_tlt2CY3g9CT4NAK3D8j3gEpMIpiO79WuRXaGi--I1ycXOhlaTfzXauydINNoS");
define("PayPalSecret", "EMA6lVCQBJ20WMKOj93Z-M3t9cB5_sq0lV3AZgB0eu8pX2PKuFAsHus87bz3N6EdVyVmfyX1B3QqsEHG");
define("PayPalBaseUrl", "https://demo.baulphp.com/paypal-php-integracion-con-ejemplo-completo/");
define("PayPalENV", "sandbox");
}
?>
