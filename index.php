<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Calculadora</title>
    </head>
    <body>
        <?php
        require 'auxiliar.php';

        const OP = ['+','-','*','/'];
        const PAR = ['op1','op2','op'];

        $error = [];

        //  Comprobación de parámetros
        $par = array_keys($_GET);
        sort($par);

        if(empty($_GET)){
            $op1 = '0';
            $op2 = '0';
            $op = '+';
        } elseif ($par == PAR) {
            $op1 = trim($_GET['op1']);
            $op2 = trim($_GET['op2']);
            $op = trim($_GET['op']);
        } else {
            $error[] = "Los parámetros recibidos no son los correctos.";
        }



        if (empty($error)) {
          if (!is_numeric($op1)) {
            $error[] = "El primer operando no es un número.";
          }
          if (!is_numeric($op2)) {
            $error[] = "El segundo operando no es un número.";
          }
          if (!in_array($op, OP)) {
            $error[] = "El operador no es valido.";
          }
        }

        formulario($op1, $op2, $op, OP);

        if (empty($error)) :
          $res = "";
          switch ($op) {
            case '+':
              $res = $op1 + $op2;
            break;

            case '-':
              $res = $op1 - $op2;
            break;

            case '*':
              $res = $op1 * $op2;
            break;

            case '/':
              $res = $op1 / $op2;
            break;
          }
        ?>
          <h3>Resultado: <?= $res ?></h3>
        <?php endif; ?>
    </body>
</html>
