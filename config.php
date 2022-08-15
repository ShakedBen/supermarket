<?php
$server='localhost';
$user='root';
$pass='';
$db='register';

$conn=mysqli_connect($server,$user,$pass) or die("Error");


$selectdb=mysqli_select_db($conn,$db) or die("Error");


if(isset($_COOKIE["login"]))
{
    $login=$_COOKIE["login"];

}
else
{
    $login=0;
}