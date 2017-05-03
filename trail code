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
$value =$_POST['usr'];;
$value2=$_POST['pwd'];
$value3=$_POST['age'];
$value4=$_POST['gender'];
$value6=$_POST['address'];
$value7=$_POST['phno'];
$value5=$_POST['email'];


$sql="insert into regi(usr,pwd,age,gender,address,phno,email) values('$value','$value2','$value3','$value4', '$value6' ,'$value7','$value5');";
if(!mysql_query($sql)){
   die('Error:'. mysql_error());
}

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
  if(isset($c_row)){
    echo "you have successfully registered...! <a href='index.php'> Click </a>here to continue shopping...!";
  }
	mysql_free_result($result);
}
mysql_close();
?>
