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
        <h2>Age Calculator</h2>
        <p>Created By @MD Arif Islam</p>
      </div>
    </div>
    <div class="row">
      <div class="column column-60 column-offset-20 text-center">
        <form action="" onSubmit="window.location.reload()">
          <label for="day">Input Day</label>
          <input type="number" name="day" id="day" required />
          <label for="month">Input Month</label>
          <input type="number" name="month" id="month" required />
          <label for="year">Input Year</label>
          <input type="number" name="year" id="year" required />

          <h5 style="color: green; font-weight: 800;">
            <?php

if ( isset( $_REQUEST['day'] ) && isset( $_REQUEST['month'] ) && isset( $_REQUEST['year'] ) ) {
    printf( "Your age is %d years, %d month, %d days", $diff->y, $diff->m, $diff->d );
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