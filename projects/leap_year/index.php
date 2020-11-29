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
        <h2>Leap Year</h2>
        <p>Created By @MD Arif Islam</p>
      </div>
    </div>
    <div class="row">
      <div class="column column-60 column-offset-20 text-center">
        <form action="index_core.php" method="POST" onSubmit="window.location.reload()">
          <label for="inputYear">Input a Year</label>
          <input type="text" name="inputYear" id="inputYear" required />

          <h5>Result : <?php

if ( isset( $_REQUEST['true'] ) ) {
    echo "<b style='color: green;''>This is a leap year !</b>";
} elseif ( isset( $_REQUEST['false'] ) ) {
    echo "<b style='color: tomato;''>This is not a leap year !</b>";
} elseif ( isset( $_REQUEST['not'] ) ) {
    echo "<b style='color: red;''>This is not a valid year !</b>";
} else {
    echo "";
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