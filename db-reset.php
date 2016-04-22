<?php
    $con = mysql_connect("localhost","root","");
        if (!$con)
            {
            die(mysql_error());
            }
        $qry = 'TRUNCATE TABLE inputs;';
            mysql_select_db("sqli", $con);
            if (!mysql_query($qry,$con))
                {
                die(mysql_error());
                }
        $qry = 'INSERT into inputs VALUES ("Justin Searle");';
            mysql_select_db("sqli", $con);
            if (!mysql_query($qry,$con))
                {
                die(mysql_error());
                }
        echo "Database Reset";
    mysql_close($con);
?>
