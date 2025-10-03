<!--Recogemos los datos y luego hacemos la operacion
La primera vez que iniciamos el codigo no  hay datos  y luego vuelve a tomar los datos 
y estos ya existen-->
<?php

//declarar una constante, el nombre tiene que estar en mayuscula
const OPS = ['+' => 'Suma',
            '-' => 'Resta',
            '*' => 'Multiplicacion',
            '/' => 'División'];
//otra manera de crear una constante
//define(('PI',3.14))


/**
 * Calcula el resultado de la operación definida en $op
 * sobre los operandos $op1 y $op2 
 */
function calcular_resultado(string $op1, string $op2, string $op): int|float //Creacion de la funcion,No es necesario ponerle el tipo del valor a la variable ni el valor de retorno(el que va a devolver)
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
function obtener_get (string $parametro): string|null
{
    return isset($_GET[$parametro]) ? trim($_GET[$parametro]) :  null;
}

function mostrar_errores(array $error) 
{ 
    foreach ($error as $mensaje){ ?>
        <h3>Error: <?=$mensaje?> </h3>
    <?php }    
}


function mostrar_resultado(string $op1,string  $op2,string  $op, int|float $res) { ?>
    <h3>El Resultado de <?= "$op1  $op  $op2" ?> es <?= $res ?></h3>
<?php } 

function validar_op1 (string $op1,array &$error): void {
    if( empty($op1)){
            $error['op1'] = 'El primero Operando es obligatorio';
        }  else if (!is_numeric($op1))  {   
                $error['op1'] =  'El primero operando no es un numero válido';
        }
}

function validar_op2 (string $op2,array &$error) :void{
    if( empty($op2)){
            $error['op2'] = 'El primero Operando es obligatorio';
        }  else if (!is_numeric($op2))  {   
                $error['op2'] =  'El primero operando no es un numero válido';
        }
}

function validar_op (string $op,array&$error) :void{
    if( empty($op)){
            $error['op'] = 'El primero Operando es obligatorio';
        }  else if (!key_exists($op,OPS))  {   
                $error['op'] =  'El primero operando no es un numero válido';
        }
}


function selected(string $op,string $v) :string 
{
    return $op == $v ? 'selected': '';
}

function dibujar_formulario ( string $op1, string $op2, string $op): void
{
?>
    <form action="" method="get"><!-- Podemos dejar el campo vacia .Es mas recomendable-->
        <label for="op1">Primer operando<sup>*</sup>:</label>
        <input id="op1" type="text" name="op1" value="<?= $op1?>">
        <br>
        <label for="op2">Segundo operando<sup>*</sup>:</label>
        <!--El value es para el valor por defecto-->
        <input id="op2" type="text" name="op2" value="<?= $op2?>">
        <br>
        <label for="op">Operando<sup>*</sup>:</label>
        <select name="op" id="od"> 
           
        </select>
        <br>
        <button type="submit" >Calcular </button>
    </form>
<?php 
}