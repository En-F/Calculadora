<?php
//Codigo que se va a utilizar en el programa principal para que sea mas limpio
function calcular_resultado($op1,$op2,$op) 
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