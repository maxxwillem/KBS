<?php
session_start();
?>
<!DOCTYPE html>
   
<html>
<head>
<title>Welcome</title>
</head>
<body>
    
<?php



print("[Succes]- Je bent ingelogd - ".'<br>');
print("Welkom ".$_SESSION['user_name']);
print("<br>");
print_r($_SESSION);
?>


    <a href="Logout.php">Logout</a><br>
    <a href="AccountToevoegen.php">Toevoegen Account </a>
    
</body>
</html>
