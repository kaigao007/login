
 <?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

require('db.php');
require_once('salt.php');
require_once('strengthpw.php');

$username = ($_POST['name']);
$pass = ($_POST['password']);

//$db->exec($query) or die('Create db failed');

$query = 'SELECT * FROM users WHERE username = :user';
$stm = $db->prepare($query);
$stm->bindValue(':user', $username, SQLITE3_TEXT);
$result = $stm->execute();
$row = $result->fetchArray();
if(false == $row)
{
	echo  $username." is Not exist! <br><a href='login.html'> Return to login page<a>";
	exit;
}
else
{	
	$options = [
    'cost' => 11,
    'salt' => $row['salt'],];
	
	$password_hash1 = password_hash($_POST["password"], PASSWORD_BCRYPT,$options);
	if($row['password'] == $password_hash1)
	{
		echo "Login Success!!!";
	}
	else
	{
		echo "Login Fail!!!";
	}
}
$db->close();
?>
 