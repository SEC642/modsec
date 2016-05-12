<html>
<head></head>
<body>

<b>This page contains the last 10000 lines of the Apache error log.  Search for your IP address or any other desired string to find alerts from your own traffic.  The latest alerts are at the top.</b><br><br>

<form action="index.php" method="post">
    IP Address: <input type="text" name="search" value="<?php echo htmlspecialchars($_POST['search'])?>" />
    <button type="submit">Submit</button>
</form>

<pre>
<?php

if (isset($_POST['search'])){
    $search = $_POST["search"];
    exec("grep ".escapeshellarg($search)." /var/log/apache2/error.log | tac", $output);
    foreach($output as $line){
        echo htmlspecialchars($line), "\n";
    }
}

?>

</pre>

</body>
</html>
