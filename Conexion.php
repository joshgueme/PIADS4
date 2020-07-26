<?php
function conectar()
{
    $Con = mysqli_connect("127.0.0.1", "root", "1603706","bdpiads4");
    return($Con);
}
?>