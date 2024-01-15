<?php
session_start();

$type = explode('^',$_REQUEST['new_pizza']);
$_SESSION['basket'][$type[1]] = $_REQUEST['new_pizza'];
$curs = 'plus';
if (isset($_REQUEST['curs'])) {
    $curs = 'minus';
}

$newArray = array();
foreach ($_SESSION['basket'] as $index => $va) {
    $exp_va = explode("^", $va);
    $newArray[$exp_va[1]] += $exp_va[0];
}

unset($_SESSION['basket']);
foreach ($newArray as $i => $v) {
    if ((int)$v > 0) {
        $_SESSION['basket'][$i] = $v . "^" . $i;
    }
}
