<?php
\ = file_get_contents("resources/views/home.blade.php");
\ = strpos(\, "<script>\n    // Keep the existing landing markup intact");
\ = strpos(\, "</script>", \) + 9;
if (\ !== false && \ !== false) {
    \ = substr_replace(\, "", \, \ - \);
    file_put_contents("resources/views/home.blade.php", \);
    echo "Removed JS translation script.";
}
?>
