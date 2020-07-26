<?php
function conectar()
{
    
    $con=mysqli_connect("127.0.0.1","root","carlos","BDPIADS4");
    
    return($con);
    
}
?>