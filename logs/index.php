<html>
<head></head>
<body>

<b>This page contains the last 10000 lines of the Apache error log.  Search for you IP address to find alerts from your own traffic.  The latest alerts are at the bottom.</b><br><br>

<form action="index.php" method="post">
    IP Address: <input type="text" name="search" />
    <button type="submit">Submit</button>
</form>

<pre>
<?php

if (isset($_POST['search'])){
    $search = $_POST["search"];
    exec("grep ".escapeshellarg($search)." /var/log/apache2/error.log", $output);
    foreach($output as $line){
        echo htmlspecialchars($line), "\n";
    }
}

?>

</pre>

</body>
</html>
