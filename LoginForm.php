<!DOCTYPE html>
<?php session_start();?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="newcss.css" />

<title>User Login</title>
</head>
<body>
 
    
<form method="POST" action=login.php>
<table>
    <tr class="header"><td colspan="2"><h1>User Login</h1></td></tr>

    <tr><td>
            <b>Gebruikers naam</b></td>
<td><input type="text" name="gebruiker" required="required">
    </td></tr>
    
    <tr><td>
            <b>Password:</b></td>
<td><input type="password" name="pass" required="required">
     </td></tr>
    
    <tr><td>
<input type="submit" name="login" value="Login">
    </td></tr>
</table>
</form>
    
    <p>Test waardes zijn nu: Gebruikersnaam=MAK, password=TESTEN</p>
    
    <p> <a href="AccountToevoegenFormulier.php">toevoegen</a>
</body>
</html>
