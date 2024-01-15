<?php
session_start();


unset($_SESSION['basket'][$_REQUEST['id']]);