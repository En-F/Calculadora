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
        // en este punto del programa tiene que irse al fichero nombreado recorrerlo 
        require 'auxiliar.php';
        

        $op1 = obtener_get('op1');
        $op2 = obtener_get('op2');
        $op =  obtener_get('op');
        
        $error = [];


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
        //empy(sirve para comprobar si esta vacio)
        if( empty($op1)){
            $error['op1'] = 'El primero Operando es obligatorio';
        }  else if (!is_numeric($op1))  {   
                $error['op1'] =  'El primero operando no es un numero válido';
        }
        if( empty($op2)){
            $error['op2'] = 'El Segundo Operando es obligatorio';
        }  else if (!is_numeric($op2))  {   
            $error['op2'] =  'El segundo operando no es un numero válido';
        }
        if( empty($op)){
            $error['op'] = 'La operación  es obligatoria';
        }  else if (!in_array($op,OPS))  {   
            $error['op'] =  'La operacion es incorrecta';
        }

        if (empty($error)) {
            $res = calcular_resultado($op1,$op2,$op); 
            mostrar_resultado($op1,$op,$op2,$res);
        } else {
            mostrar_errores($error);
        }
    } 
    ?>
</body>
</html>