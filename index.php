<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
</head>
<body>
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

        $op1 = obtener_get('op1');
        $op2 = obtener_get('op2');
        $op =  obtener_get('op');
        
    ?>
    <form action="" method="get"><!-- Podemos dejar el campo vacia .Es mas recomendable-->
        <label for="op1">Primer operando<sup>*</sup>:</label>
        <input id="op1" type="text" name="op1">
        <br>
        <label for="op2">Segundo operando<sup>*</sup>:</label>
        <input id="op2" type="text" name="op2">
        <br>
        <label for="op">Operando<sup>*</sup>:</label>
        <select name="op" id="od"> 
            <!-- Esto es un desplegable, un option por cada
            opción que yo quiero-->
            <option value="+">Suma</option>
            <option value="-">Resta</option>
            <option value="*">Multiplicación</option>
            <option value="/">División</option>
        </select>
        <br>
        <button type="submit" >Calcular </button>
    </form>
    
    <!-- si no es la primera vez entonces no se pinta nada,calcular res sino es nulo entonces,decir "opercion incorreta",sino decir res-->
    <!--Debajo del form porque lo muestro debajo del formulario ,ESTO HACE REFERENCIA A EL BLOQUE A CONTINUACION--> 
    <?php 
    //Compreba que existen los datos necesarios para las operaciones
    //Devulve true cuando la variable existe y no es nulo
    if (isset($op1, $op2, $op)) {// si no es la primera vez que entra 
        $res = calcular_resultado($op1,$op2,$op); 
        if (!isset($res)) { // si la operacion es incorrecta
           mostrar_error();
        } else {
           mostrar_resultado($op1,$op,$op2,$res);
        }
    } 
    ?>
</body>
</html>