<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Calculadora</title>
    </head>
    <body>
        <?php
        require './auxiliar.php';
        $op1 = isset($_GET['op1']) ? trim($_GET['op1']) : '0';
        $op2 = isset($_GET['op2']) ? trim($_GET['op2']) : '0';
        $op = isset($_GET['op']) ? trim($_GET['op']) : '""';
        $res = "";
        ?>
        <form action="" method="get">
            <label for="op1">Primer operando:</label>
            <input id="op1" type="text" name="op1" value="<?= $op1 ?>">
            <br />
            <label for="op2">Segundo operando:</label>
            <input id="op2" type="text" name="op2" value="<?= $op2 ?>">
            <br />
            <label for="op">Operacion:</label>
            <select id="op" name="op">
                <option value="">-- Seleccione --</option>
            <?php
             $datos = array("+","-","*","/");

             for($i=0; $i<count($datos); $i++)
             {
                if($datos[$i]==$op)
                {?>
                   <option value='<?=$datos[$i]?>' selected><?=$datos[$i]?></option>
                <?php }
                else
                {?>
                    <option value='<?=$datos[$i]?>'><?=$datos[$i]?></option>
                <?php }
             }
             ?>
            </select>
            <br />
            <input type="submit" value="Calcular" >
            <br/>
        </form>

        <?php
        if ($op1 == "" || $op2 == "") {
            mostrarError('Falta alguno de los operandos.');
        } else {
          if (!is_numeric($op1) || !is_numeric($op2)) {
            mostrarError('Alguno de los operando no es un número.');
        } else {
          if (!$op == '+' || !$op == '-' || !$op == '*' || !$op == '/') {
            mostrarError('La operación debe ser: +, -, *, /');
          } else {
            operacion($op1, $op2, $op);
            }
        }
    }
                ?>
    </body>
</html>
