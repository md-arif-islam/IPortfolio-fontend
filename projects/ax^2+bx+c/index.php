<?php
include_once "index_core.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.0/milligram.css" />
  <title>Document</title>
  <style>
    body {
      margin-top: 30px;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="column column-60 column-offset-20 text-center">
        <h2>Ax <sup>2</sup> + Bx + C</h2>
        <p>Created By @MD Arif Islam</p>
      </div>
    </div>
    <div class="row">
      <div class="column column-60 column-offset-20 text-center">
        <form action="" onSubmit="window.location.reload()">
          <label for="number1">Input A</label>
          <input type="number" name="number1" id="number1" required />
          <label for="number2">Input B</label>
          <input type="number" name="number2" id="number2" required />
          <label for="number3">Input C</label>
          <input type="number" name="number3" id="number3" required />

          <h5 style="color: green; font-weight: 800;">
            <?php

if ( isset( $_REQUEST['number1'] ) && isset( $_REQUEST['number2'] ) && isset( $_REQUEST['number3'] ) ) {
    if ( $d < 0 ) {
        echo "The equetions has no right solutions";
    } elseif ( $d = 0 ) {
        echo "x = {-$b/(2*$a)}";
    } else {
        echo "X<sub>1</sub> = ";
        echo ( -$b + sqrt(  ( $b * $b ) - 4 * $a * $c ) ) / 2 * 1;
        echo "<br/>";
        echo "X<sub>2</sub> = ";
        echo ( -$b - sqrt(  ( $b * $b ) - 4 * $a * $c ) ) / 2 * 1;
    }
}

?>
          </h5>
          <button type="submit">Submit</button>
        </form>
      </div>
    </div>
  </div>
</body>

</html>