<?PHP

//Om dit te gebuiken moet je in je bestand "require mysql_connect.php" zonder quotes!
// Mysqli information
$host = 'localhost';
$user = 'root';
$pass = 'usbw';
$name = 'testtable';
$port = '3307';
$mysqli = new mysqli($host, $user, $pass, $name, $port);

if ($mysqli->connect_error)
{
    die("Database connection failed");
}
?>