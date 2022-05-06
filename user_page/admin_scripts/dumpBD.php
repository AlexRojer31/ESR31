<?php

exec('mysqldump -uck97210_esr31 -p5Nbf6RzX ck97210_esr31 > fileDBName.sql');
header("Location: ../adminka.php");
?>