<?php
function mostrarError($mensaje){
  echo "<h3>Error: $mensaje</h3>\n";
}
function operacion($op1, $op2, $op){
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
    }?>
    <h3>Resultado: <?= $res ?></h3>
<?php }
