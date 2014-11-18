<!DOCTYPE html>
   
<html>
<head>
<title>Welcome</title>
<link rel="stylesheet" type="text/css" href="newcss.css" />

</head>
<body>
    
    <?php
    //sla nieuwe gegevens op
$gebruikersnaam = $_POST['Gebruikersnaam'];
$naam = $_POST['Naam'];
$achternaam=$_POST['Achternaam'];
$functie=$_POST['Functie'];
$wachtwoord = $_POST['password'];
$wachtwoord_herhaal = $_POST['passwordcontrole'];

    ?>
    <form method="POST" action="AccountToevoegenFormulier.php">
    <table>
        <tr class="header"><td colspan="2"><h1>Toevoegen Account</h1></td></tr>

    
        <tr>
            <td>Gebruikersnaam:</td><td><input type="text" name="Gebruikersnaam" value="<?= $_POST['Gebruikersnaam'] ?>"></td>
        
        <?php if(isset($_POST['Toevoegen'])){
            if(empty($_POST['Gebruikersnaam']))
                    {
                print("<td>");
                print("verplicht!");
                print("</td>");
            }}?>
        </tr>
        <tr>
            <td> Naam :</td><td><input type="text" name="Naam" value="<?= $_POST['Naam'] ?>"></td>
        <?php if(isset($_POST['Toevoegen'])){
            if(empty($_POST['Naam']))
                    {
                print("<td>");
                print("verplicht!");
                print("</td>");
            }}?>
        </tr>
        <tr>
            <td>Achternaam :</td><td><input type="text" name="Achternaam" value="<?= $_POST['Achternaam'] ?>"></td>
         <?php if(isset($_POST['Toevoegen'])){
            if(empty($_POST['Achternaam']))
                    {
                print("<td>");
                print("verplicht!");
                print("</td>");
            }}?>
        </tr>
        <tr><td> Functie :</td><td>
        <SELECT NAME="Functie">
        <OPTION VALUE="Empty">-----</OPTION>
        <OPTION VALUE="Beheerder">Beheerder</OPTION>
        <OPTION VALUE="Senior">Senior</OPTION>
        <OPTION VALUE="Technici">Technici</OPTION>
        </SELECT>  
                </td>
                 <?php if(isset($_POST['Toevoegen'])){
            if(($_POST['Functie']=="Empty"))
                    {
                print("<td>");
                print("verplicht!");
                print("</td>");
            }}?>
        </tr>
        <tr>
            <td>Wachtwoord :</td><td><input type="password" name="password"></td>
         <?php
                  // kijk of het wachtwoord voldoet aan de criteria, en print error message indien nodig
if(isset($_POST['Toevoegen'])){
$password_error = array();
if ( strlen($wachtwoord) < 8 ) {
  $password_error[] = 'Minimaal 8 karakters lang.';
}
if ( !preg_match( '/[A-Z]/', $wachtwoord)){
  $password_error[] = 'Minimaal 1 hoofdletter.';
}
if ( !preg_match( '/[0-9]/', $wachtwoord )) {
  $password_error[] = 'Minimaal 1 getal';
}
if ( $wachtwoord != $wachtwoord_herhaal){
  $password_error[] = 'Wachtwoorden zijn niet gelijk';
}
$password_error_count = count( $password_error );
if ( $password_error_count>0 ) {
  print("<td>");
  for ( $i = 0; $i < $password_error_count; $i++ ) {
      
    print( $password_error[$i]."<br>");
          

  }
  print("</td>");
  }
}
         ?>
        </tr>
        <tr>
            <td>Wachtwoord bevestigen :</td><td><input type="password" name="passwordcontrole"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="Annuleren" value="Annuleren">
                        <input type="submit" name="Toevoegen" value="Toevoegen"></td>

        </tr>   
    </table>
</form>  
<?php



         
        

//if(isset($_POST['Toevoegen'])){
//print("<br>");
//print($gebruikersnaam);
//print("<br>");
//print($naam);
//print("<br>");
//print($achternaam);
//print("<br>");
//print($functie);
//print("<br>");
//print($wachtwoord);
//print("<br>");
//print($wachtwoord_herhaal);
//}
  ?>
</body>
</html>
