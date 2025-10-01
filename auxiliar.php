<!--Recogemos los datos y luego hacemos la operacion
La primera vez que iniciamos el codigo no  hay datos  y luego vuelve a tomar los datos 
y estos ya existen-->
<?php
/**
 * Calcula el resultado de la operación definida en $op
 * sobre los operandos $op1 y $op2 
 */
function calcular_resultado($op1,$op2,$op) //Creacion de la funcion,No es necesario ponerle el tipo del valor a la variable ni el valor de retorno(el que va a devolver)
//Tenemos que evitar la repeticion de codigo
{
switch ($op) {
case '+':$res = $op1 + $op2;
break;
case '-':$res = $op1 - $op2;
break;
case '*': $res = $op1 * $op2;
break;
case '/': $res = $op1 / $op2;
break;
default:
$res = null;
}
return $res;
}

//Validacion del tipo de numero  que lo recoge del campo 
//que tiene el mismo  nombre. 
//TODOS LOS DATOS TIENEN QUE SER VALIDADOS EN EL SERVIDOR

//Comprovación de la existencia de los datos

/**
 * Obtiene el valor  recogido por GET de un parámetro de la peticio.
 * Devuelve null si el paámetro no existe.
 */
function obtener_get ($parametro)
{
return isset($_GET[$parametro]) ? trim($_GET[$parametro]) :  null;
}

function mostrar_error ()
{
echo "<h3>El operador  es incorrecto.</h3>";
}

function mostrar_resultado ($op1,$op,$op2,$res)
{
echo "<h3>El Resultado de  $op1  $op  $op2  es  $res </h3>";
}