
 <?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

require('db.php');
require_once('salt.php');
require_once('strengthpw.php');

$username = ($_POST['name']);
$pass = ($_POST['password']);

$db->exec($query) or die('Create db failed');

$query = 'SELECT * FROM users WHERE username = :user';
$stm = $db->prepare($query);
$stm->bindValue(':user', $username, SQLITE3_TEXT);
$result = $stm->execute();
$row = $result->fetchArray();

if(false == $row)
{
	$salt =  getSalt();
	$options = [
    'cost' => 11,
    'salt' => $salt,
];
	$password_hash = password_hash($_POST["password"], PASSWORD_BCRYPT,$options);
//	
	$query = 'INSERT INTO users (username, password,salt) VALUES (:user,:pass,:salt)';
	$stm = $db->prepare($query);
	$stm->bindValue(':user', $username, SQLITE3_TEXT);
	$stm->bindValue(':pass', $password_hash, SQLITE3_TEXT);
	$stm->bindValue(':salt', $salt, SQLITE3_TEXT); 
	$stm->execute();
	
	die( "Created new user! <a href='login.html'> Return to login page<a>");
}
else
{	
	echo $username." already exist. <a href='./createuser.html'> Return to Register page<a>";
}
$db->close();
?>
 