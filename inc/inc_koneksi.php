<?php 
$host       = "localhost";
$user       = "root";
$pass       = "";
$db         = "eunoia";

$koneksi    = mysqli_connect($host,$user,$pass,$db);
if(!$koneksi){
    die("Gagal terkoneksi");
}