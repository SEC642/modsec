<?php

echo('
    <html>
    <body bgcolor="#000000" text="#FFFFFF">

    <h2>Protected by ModSecurity</h2>

    <p></p>

    <!--Form for students to enter XSS attacks-->
    <form action="index.php" method="post">
        XSS Input: <input type="text" name="xss" />
        <button type="submit">Submit</button>
        </form>

    <!--Form for students to enter SQLi attacks-->
    <form action="index.php" method="post">
        SQLi Input: <input type="text" name="sqli" />
        <button type="submit">Submit</button>
        </form>


    ');

//If students submitted an XSS attack, echo results
if (isset($_POST['xss']))
    {
    echo("Entered Text: " . $_POST['xss']);
    }

//If stduents submitted a SQLi attack, echo database message
if (isset($_POST['sqli']))
    {
    if ($_POST['sqli'] == '')
        {
        echo("Cannot insert an empty string into this database!");
        }
    else
        {
        $con = mysql_connect("localhost","root","");
        if (!$con)
            {
            die(mysql_error());
            }
        $qry = "INSERT into inputs VALUES ('" . $_POST["sqli"] . "');";
        mysql_select_db("sqli", $con);
        if (!mysql_query($qry,$con))
            {
            die(mysql_error());
            }
        echo "Database Record Added";
        mysql_close($con);
        }
    }

echo('
    </p>
    </body>
    </html>
    ');
?>
