<!-- Recogemos los datos y luego hacemos la operación.
La primera vez que iniciamos el código no hay datos,
y luego vuelve a tomar los datos ya existentes. -->
<?php

// Declarar una constante (en mayúsculas por convención)
const OPS = [
    '+' => 'Suma',
    '-' => 'Resta',
    '*' => 'Multiplicación',
    '/' => 'División'
];
// Otra manera de crear una constante:
// define('PI', 3.14);

/**
 * Calcula el resultado de la operación definida en $op
 * sobre los operandos $op1 y $op2.
 */
function calcular_resultado(string $op1, string $op2, string $op): int|float
{
    switch ($op) {
        case '+': $res = $op1 + $op2; break;
        case '-': $res = $op1 - $op2; break;
        case '*': $res = $op1 * $op2; break;
        case '/': $res = $op1 / $op2; break;
    }
    return $res;
}

/**
 * Obtiene el valor recogido por GET de un parámetro de la petición.
 * Devuelve null si el parámetro no existe.
 */
function obtener_get(string $parametro): string|null
{
    return isset($_GET[$parametro]) ? trim($_GET[$parametro]) : null;
}

/**
 * Muestra los errores de validación.
 */
function mostrar_errores(array $error): void
{
    foreach ($error as $mensaje) { ?>
        <h3>Error: <?= htmlspecialchars($mensaje) ?> </h3>
    <?php }
}

/**
 * Muestra el resultado del cálculo.
 */
function mostrar_resultado(string $op1, string $op2, string $op, int|float $res): void
{ ?>
    <h3>El resultado de <?= "$op1 $op $op2" ?> es <?= $res ?></h3>
<?php }

/**
 * Validaciones de los operandos y la operación.
 */
function validar_op1(string $op1, array &$error): void
{
    if (empty($op1)) {
        $error['op1'] = 'El primer operando es obligatorio';
    } elseif (!is_numeric($op1)) {
        $error['op1'] = 'El primer operando no es un número válido';
    }
}

function validar_op2(string $op2, array &$error): void
{
    if (empty($op2)) {
        $error['op2'] = 'El segundo operando es obligatorio';
    } elseif (!is_numeric($op2)) {
        $error['op2'] = 'El segundo operando no es un número válido';
    }
}

function validar_op(string $op, array &$error): void
{
    if (empty($op)) {
        $error['op'] = 'La operación es obligatoria';
    } elseif (!key_exists($op, OPS)) {
        $error['op'] = 'La operación no es válida';
    }
}

/**
 * Marca como seleccionada la opción del <select>.
 */
function selected(string $op, string $v): string
{
    return $op == $v ? 'selected' : '';
}

/**
 * Dibuja el formulario principal.
 */
function dibujar_formulario(?string $op1, ?string $op2, ?string $op): void
{
?>
    <form action="" method="get">
        <label for="op1">Primer operando<sup>*</sup>:</label>
        <input id="op1" type="text" name="op1" value="<?= htmlspecialchars($op1 ?? '') ?>">
        <br>

        <label for="op2">Segundo operando<sup>*</sup>:</label>
        <input id="op2" type="text" name="op2" value="<?= htmlspecialchars($op2 ?? '') ?>">
        <br>

        <label for="op">Operación<sup>*</sup>:</label>
        <select name="op" id="op">
            <?php foreach (OPS as $k => $v): ?>
                <option value="<?= $k ?>" <?= selected($op ?? '', $k) ?>><?= $v ?></option>
            <?php endforeach ?>
        </select>
        <br><br>

        <button type="submit">Calcular</button>
    </form>
<?php
}