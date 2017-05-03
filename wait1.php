<?php
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

$value =$_POST['usr'];
if (empty($value))
{}
$value2=$_POST['pwd'];
if (empty($value2))
{}
else{
$query = mysql_query("select * from regi where usr='$value' and pwd='$value2'");
$numrows=mysql_num_rows($query);
echo $numrows;
if (!$result)
{
	$message = 'ERROR:' . mysql_error();
	return $message;
}
else
{
  $i=0;
  echo '<html><body><table><tr>';
  while ($i < mysql_num_fields($query))
	{
		$meta = mysql_fetch_field($query, $i);
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
	mysql_free_result($query);
}
mysql_close();
}
?>
<form action="customer-orders.php" method="post">
<p>pl wait till your id is being confirmed..</p>
<p>ID:<input type="text" name="lid" value='<?php echo htmlspecialchars($c_row);?>' readonly/></p>
<p><input type="submit" value="click to continue"/></p>
</form>
