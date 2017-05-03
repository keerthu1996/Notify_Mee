<?php

$value =$_POST['usr'];
$value2=$_POST['pwd'];

if($value && $value2){
define('DB_NAME','pazaar');
define('DB_USER','root');
define('DB_PASSWORD','root');
define('DB_HOST','localhost');
$link=mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);

if (!$link){
  die('could not connect:'. mysqlerror());
}

$db_selected=mysql_select_db(DB_NAME, $link);

if(!$db_selected){
  die('can\'t use '. DB_NAME .': '. mysqlerror());
}

else{
$result = mysql_query("select lid from regi where usr='$value' and pwd='$value2'");
if (!$result)
{
	$message = 'ERROR:' . mysql_error();
	return $message;
}
else
{
  $i=0;
  echo '<html><body><table><tr>';
  while ($i < mysql_num_fields($result))
	{
		$meta = mysql_fetch_field($result, $i);
		$i = $i + 1;
	}
  echo '</tr>';

	$i = 0;
	while ($row = mysql_fetch_row($result))
	{
		echo '<tr>';
		$count = count($row);
		$y = 0;
		while ($y < $count)
		{
			$c_row = current($row);
			next($row);
			$y = $y + 1;
		}
		echo '</tr>';
		$i = $i + 1;
	}
	echo '</table></body></html>';
	mysql_free_result($result);
  echo "  <a href='customer-orders.php'> Click </a>here to continue shopping";
  #$_SESSION['lid']=$c_row;
  }
}
mysql_close();
}

#$numrows=mysql_num_rows($result);
#if( $numrows!=0)
#{
#  while($row = mysqli_fetch_assoc($result))
#  {
#    $dblid = $row['lid'];
#    $dbusername = $row['usr'];
#    $dbpassword = $row['pwd'];
#  }
#  if( $username==$dbusername && $password==$dbpassword )
#  {
#    echo "you're in !<a href='customer-orders.php'> Click </a>here to continue shopping";
#    $_SESSION['lid']=$dblid;
#    $_SESSION['username']=$dbusername;
#  }
#  else {
#    echo 'Incorrect password!';
#  }
#}
#else
#{
#  echo 'such user doesnot exist';
#}
else {
  echo 'please enter username and a password!';
}

#<form action="customer-orders.php" method="post">
#<p>pl wait till your id is being confirmed..</p>
#<p>ID:<input type="text" name="lid" value='<?php echo htmlspecialchars($c_row);?' readonly/></p>
#<p><input type="button" value="click to continue"/></p>
#</form>
?>

<form action="customer-orders.php" method="post">
<input type="text" name="lid" value='<?php echo htmlspecialchars($c_row);?>' readonly/></p>
</form>
