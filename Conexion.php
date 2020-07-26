<?php
function conectar()
{
    $con = null;
    $con = mysqli_connect("127.0.0.1","root","1603706","BDPIADS4");
    return($con);
}
?>