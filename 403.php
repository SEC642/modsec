<?php
echo "<h1>Forbidden</h1><br>";
foreach ($_SERVER as $key => $value){
    if ($key == "UNIQUE_ID"){
        echo "Your unique request ID is = " . $value ;
        }
    }
?>
