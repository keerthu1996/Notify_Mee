<?php
  if (isset($_POST['submit'])) {
    $example = $_POST['example'];
    $example2 = $_POST['example2'];
    echo $example . " " . $example2;
  }
?>
<form action="" method="post">
  Example value: <input name="example" type="text" />
  Example value 2: <input name="example2" type="text" />
  <input name="submit" type="submit" />
</form>
