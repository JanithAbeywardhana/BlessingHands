<?php
$servername="localhost";
$username="root";
$password="";
$dbName="lecture_panel_db";

try
{
$db=new mysqli($servername,$username,$password,$dbName);

if ($db->connect_error){

    die("connection faild ".$db->connect_error);

}
else
{
    // echo "Connected";
}
}catch(Exception $e)
{
    echo"Message: ".$e->getMessage();
}


?>