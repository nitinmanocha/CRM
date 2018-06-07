<?php

$connection=mysqli_connect('localhost','root','','CRM');

//testing connection

if(mysqli_connect_errno()){
    echo "problem with db connection".mysqli_connect_error();
}

?>
