<?PHP

//Om dit te gebuiken moet je in je bestand "require mysql_connect.php" zonder quotes!
// Mysqli information
$host = 'localhost';
$user = 'root';
$pass = 'usbw';
$name = 'databasenaam';
$mysqli = new mysqli($host, $user, $pass, $name);

if ($mysqli->connect_error) {
    die("Database connection failed");
}
?>