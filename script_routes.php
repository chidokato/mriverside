<?php $lines = file("routes/web.php"); $newLines = array_slice($lines, 0, 116); file_put_contents("routes/web.php", implode("", $newLines)); ?>
