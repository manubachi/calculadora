<?php
function selected($op1, $op2)
{
   return $op1 == $op2 ? "selected" : "";
}

function formulario($array, $ops)
{
    extract($array);
?>
  <form action="" method="get">
      <label for="op1">Primer operando: *</label>
      <input id="op1" type="text" name="op1" value="<?= $op1 ?>">
      <br />
      <label for="op2">Segundo operando: *</label>
      <input id="op2" type="text" name="op2" value="<?= $op2 ?>">
      <br />
      <label for="op">Operacion:</label>
      <select name="op">
          <?php foreach ($ops as $o): ?>
              <option value="<?= $o ?>" <?= selected($op, $o) ?>>
                  <?= $o ?>
              </option>
          <?php endforeach ?>
      </select><br/>
      <br />
      <input type="submit" value="Calcular" >
      <br/>
  </form>
<?php
}

function calcula($array)
{
    extract($array);
    $res = '';
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
    return $res;
}

function compruebaParametros($par, &$error)
{
    if (!empty($_GET)) {
      //Si la difrencia de GET PAR es vacio Y la diferencia de PAR GET es vacio tb es que
      //no hay nada en GET que no este en PAR
      if (empty(array_diff_key($_GET, PAR)) &&
          empty(array_diff_key(PAR, $_GET))){
          return array_map('trim', $_GET);
      } else {
          //Si no llega vacio y llega algo que no es op,op1 y op2, añadimos error.
          $error[] = 'Los parámetros enviados no son los correctos.';
      }
    }
    return $par;
}

function compruebaValores($array, $ops, &$error)
{
    if (empty($error)) {
        extract($array);
        if (!is_numeric($op1)) {
          $error[] = "El primer operando no es un número.";
        }
        if (!is_numeric($op2)) {
          $error[] = "El segundo operando no es un número.";
        }
        if (!in_array($op, $ops)) {
          $error[] = "El operador no es valido.";
        }
    }
    compruebaErrores($error);
}

function mostrarResultado($array)
{ ?>

  <h3>Resultado: <?= calcula($array) ?></h3> <!--Calculamos -->

<?php }

function muestraErrores($error)
{
  foreach ($error as $err): ?> <!--Si hay algun error, no se calcula y se muestran los errores -->
      <h3>Error: <?= $err ?></h3>
  <?php endforeach;
}

function compruebaErrores($error){
  if (!empty($error)){
    throw new Exception();
  }
}
