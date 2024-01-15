<?php
session_start();
if(isset($_SESSION['basket'])){
    echo count($_SESSION['basket']);
}else{
    echo "0";
}
