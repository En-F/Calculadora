<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
</head>
<body>
    <?php
        //Validacion del tipo de numero  que lo recoge del campo 
        //que tiene el mismo  nombre. 
        //TODOS LOS DATOS TIENEN QUE SER VALIDADOS EN EL SERVIDOR
        $op1 = trim($_GET['op1']);
        $op2 = trim($_GET['op2']);
        $op = trim($_GET['op']);
        switch ($op) {
            case '+':
                //Hacer la suma
                $res = $op1 + $op2;
                break;
            case '-':
                //Hacer la resta
                $res = $op1 - $op2;
                break;
            case '*':
                //Hacer la multiplicaion
                $res = $op1 * $op2;
                break;
            case '/':
                //Hacer la division
                $res = $op1 / $op2;
                break;
        }
    ?>
    <!--Comprueba si $res existe-->
    <?php if (isset($res)): ?>        
        <h3>El Resultado de <?= "$op1 $op $op2" ?> es <?= $res?></h3>
    <?php else: ?>
        <h3>El operador  es incorrecto.</h3>
    <?php endif ?>
</body>
</html>