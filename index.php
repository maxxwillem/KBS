<html>
    <head>
        <link rel="stylesheet" type="text/css" href="newcss.css" />
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
       <?php
       $link = mysqli_connect("localhost", "root", "root", "studentadministratie", 3307);
       ?>
        
        <h1>TABEL 7</h1>
        
        <form method="POST" action="index.php">
            <input type="text" name="Studentnummer">
            <input type="text" name="Voornaam">
            <input type="text" name="Achternaam">
            <input type="text" name="Adres">
            <input type="text" name="Woonplaats">
            <input type="submit" name="Toevoegen" value="Toevoegen">
</form>
        <?php
       


        
        if(isset($_POST["Toevoegen"])){
        $Studentnummer=$_POST["Studentnummer"];
        $Voornaam=$_POST["Voornaam"];
        $Achternaam=$_POST["Achternaam"];
        $Adres=$_POST["Adres"];
        $Woonplaats=$_POST["Woonplaats"];
        
        $query = "INSERT INTO student VALUES(?,?,?,?,?)";
        $statement = mysqli_prepare($link, $query);
        
        mysqli_stmt_bind_param($statement, "sssss", $Studentnummer,$Voornaam,$Achternaam,$Adres,$Woonplaats);
        mysqli_stmt_execute($statement);
  
            
        }
        ?>
        
        <?php
        //connection maken, password = root, en pport is 3307
        
        $query = "SELECT Studentnummer,Voornaam,Achternaam,Adres,Woonplaats FROM student";
        $statement = mysqli_prepare($link, $query);
        mysqli_stmt_execute($statement);
        mysqli_stmt_bind_result($statement, $Studentnummer, $Voornaam, $Achternaam, $Adres, $Woonplaats);
        mysqli_stmt_store_result($statement);
        
        print("<table>");
            print("<th>Studentnummer</th>"."<th>Voornaam</th>"."<th>Achternaam</th>"."<th>Adres</th>"."<th>Woonplaats</th>");
            while(mysqli_stmt_fetch($statement)){
               
                print("<tr>");
                print("<td>" .$Studentnummer ."</td><td>" .$Voornaam ."</td><td>".$Achternaam."</td><td>".$Adres."</td><td>".$Woonplaats."</td>");
                print("</tr>");
            }
            print("</table>");
            mysqli_stmt_free_result($statement);
            mysqli_stmt_close($statement);
             mysqli_close($link);
        ?>
        
       
    </body>
</html>