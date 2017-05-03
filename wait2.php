<?php
#session_start();

$username=$_POST['usr'];
$password=$_POST['pwd'];

if($username&&$password)
{
$connect= mysql_connect("localhost","root","root") or die("couldn't connect");

$db_selected=mysql_select_db("pazaar", $connect);

if(!$db_selected){
  die('can\'t use '. "pazaar" .': '. mysqlerror());
}

$query=mysql_query("select * from regi where usr='$username' and pwd='$password'");

$numrows=mysql_num_rows($query);
if( $numrows!=0)
{
  while($row = mysql_fetch_assoc($query))
  {
    $dblid = $row['lid'];
    $dbusername = $row['usr'];
    $dbpassword = $row['pwd'];
  }
  if( $username==$dbusername && $password==$dbpassword )
  {
    echo "you're in !<a href='customer-orders.php'> Click </a>here to continue shopping";
#    $_SESSION['lid']=$dblid;
#    $_SESSION['username']=$dbusername;
  }
  else {
    echo Incorrect password!;
  }
}
else
  echo 'that user doesnot exist';

}
else {
  echo 'please enter username and a password!';
}
?>
