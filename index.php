<?php
# Текущий домен
define('SERVER_DOMAIN', 'fiesta.fidez.ru');
define('PROTOCOL', 'http://');
define('DEBUG', true);
define('ROOT', $_SERVER['DOCUMENT_ROOT']);
define('TPL', ROOT . "tpl/");
if (DEBUG) {
    ini_set('error_reporting', E_ALL);
    ini_set('display_errors', 'ON');
}

$_URL = ($_SERVER['REQUEST_URI'] != '/') ? explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), ' /')) : false;
session_start();


//require 'vendor/autoload.php';

include ROOT . '/engine/config.php';
//include ROOT . '/engine/db.class.php';
include ROOT . '/engine/functions.php';

/*
$setting = @file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/setting.txt");
if ($setting != "") {
    $setting = unserialize($setting);
}
*/
if (isset($_URL[1]) && $_URL[1] != "quit") {
    if (isset($_COOKIE['a']) && $_COOKIE['a'] != "" && !isset($_SESSION['user'])) {
        $para = explode(":", $_COOKIE['a']);
        if (isset($para[1]) && (int)$para[1] != 0 && isValidMd5($para[0])) {
            $user = $db->getOne('SELECT * FROM user_auth WHERE id="' . $para[1] . '"');
            if ($user) {
                $hash = md5($user['id'] . SERVER_DOMAIN) . ":" . $user['id'];
                if ($hash == $user['hash']) {
                    $_SESSION['user'] = $user;
                }
            }
        }
    }
}

if (isset($_URL[0]) && $_URL[0] == "auth" && isset($_SESSION['user']['id']) && !isset($_URL[1])) {
    redirect('/cabinet');
    exit();
}

if (isset($_SESSION['user']['id']) && $_SESSION['user']['id'] != "") {
    if ($db->getOne('SELECT * FROM user_auth WHERE id="' . $_SESSION['user']['id'] . '" AND hash=""')) {
        $hash = md5($_SESSION['user']['id'] . SERVER_DOMAIN) . ":" . $_SESSION['user']['id'];
        setcookie('a', $hash, time() - 3600, '/', SERVER_DOMAIN);
        unset($_SESSION['user']);
    } else {
        $db->update('user_auth', array(
            'online' => date('Y.m.d H:i:s'),

        ), 'id=' . $_SESSION['user']['id']);
    }
}


$error = true;

//print_r($_SESSION);
$folder = "";
$INCLUDE['path_layout'] = ROOT . "/tpl";

if ($_URL == false || isset($_URL[0]) && empty($_URL[0])) {

    $error = false;
    $INCLUDE['content'] = ROOT . "/tpl/index.php";

} elseif (isset($_URL[0]) && !empty($_URL[0])) {

    if ($_URL[0] == "cabinet") {
        //Кабинет
        if ($_URL[0] == "auth") {
            //если пользовател попал в логин то проверим авторизирован ли он
            if (isset($_SESSION['user'])) {
                redirect("/cabinet");
            }
        } else {
            //если не авторизирован то на логин
            if (!isset($_SESSION['user'])) {
                redirect("/auth");
            }
        }
    }

    /*
        Доступные страницы для менеджера

    $role_access = array("cabinet-orders", "cabinet-reports", "cabinet-reports-bus", "cabinet-reports-user-list");
    if (isset($_SESSION['user']) && isset($_SESSION['user']['role']) && $_SESSION['user']['role'] == 2 && !in_array($_URL[0], $role_access)) {
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: /cabinet");
    }
    */
    //}

    $files_tpl = $_URL;
    $folder = array();
    if (isset($_URL[0])) {
        $folder[] = array_shift($files_tpl);
    }
    if (isset($_URL[1])) {
        $folder[] = array_shift($files_tpl);
    }

    //if(is_dir(__DIR__ . "/tpl/" . $_URL[0] . "/" . $_URL[1])){}
    $count_folder = count($folder);
    if ($count_folder == 1) {
        if (file_exists(__DIR__ . "/tpl/" . $folder[0] . '/layout.php')) {
            $INCLUDE['path_layout'] = __DIR__ . "/tpl/" . $folder[0];
        }
        if (file_exists(__DIR__ . "/tpl/" . $folder[0] . '.php')) {
            $file_include = __DIR__ . "/tpl/" . $folder[0];
        } else {
            $file_include = __DIR__ . "/tpl/" . $folder[0] . '/' . implode(".", $files_tpl);
        }
        if (is_dir(__DIR__ . "/tpl/" . $folder[0])) {
            $file_include = __DIR__ . "/tpl/" . $folder[0] . '/index';
        }
    } elseif ($count_folder == 2) {
        if (file_exists(__DIR__ . "/tpl/" . $folder[0] . '/' . $folder[1] . '/layout.php')) {
            $INCLUDE['path_layout'] = __DIR__ . "/tpl/" . $folder[0] . '/' . $folder[1];
        } elseif (file_exists(__DIR__ . "/tpl/" . $folder[0] . '/layout.php')) {
            $INCLUDE['path_layout'] = __DIR__ . "/tpl/" . $folder[0];
        }
        if (is_dir(__DIR__ . "/tpl/" . $folder[0] . "/" . $folder[1])) {
            if (count($files_tpl) > 0) {
                $file_include = __DIR__ . "/tpl/" . $folder[0] . '/' . $folder[1] . "/" . implode(".", $files_tpl);
            } else {
                $file_include = __DIR__ . "/tpl/" . $folder[0] . '/' . $folder[1] . '/index';
            }
        } else {
            if (count($files_tpl) > 0) {
                $file_include = __DIR__ . "/tpl/" . $folder[0] . '/' . $folder[1] . "." . implode(".", $files_tpl);
            } else {
                if (file_exists(__DIR__ . "/tpl/" . $folder[0] . '/' . $folder[1] . '.php')) {
                    $file_include = __DIR__ . "/tpl/" . $folder[0] . '/' . $folder[1];
                } else {
                    $file_include = __DIR__ . "/tpl/" . $folder[0] . '/index';
                }
            }

        }
    }

    if (file_exists($file_include . ".php")) {
        $error = false;
        if (isset($_POST) && count($_POST) > 0 && !isset($_POST['ajax']) || isset($_GET['ajax'])) {

            include_once $file_include . ".php";
            exit();
        } elseif (isset($_POST['ajax'])) {
            ob_start();
            include_once $file_include . ".php";

            $output = ob_get_contents();

            ob_end_clean();
            preg_match_all("@\[\[(.+?)\]\]@isU", $output, $res);

            if ($res && isset($res[0]) && count($res[0]) > 0) {
                unset($res[0]);
                foreach ($res as $res_val) {
                    foreach ($res_val as $meta) {
                        $m = explode("|", $meta);
                        if (count($m) == 2) {
                            $output = str_replace("[[" . $m[0] . "]]", $m[1], $output);
                        }
                    }
                }
            }
            $output = preg_replace("#\[\[.*\]\]#isU", "", $output);
            echo $output;
            exit();
        }
        $INCLUDE['content'] = $file_include . ".php";
    }

}
if ($error) {
    header('HTTP/1.1 404 Not Found', true, 404);
    $INCLUDE['content'] = TPL . '404.php';
}

if (isset($_GET['help'])) {
    print_r($INCLUDE);
}
include $_SERVER['DOCUMENT_ROOT'] . '/base.php';
include $_SERVER['DOCUMENT_ROOT'] . '/article.php';
include $_SERVER['DOCUMENT_ROOT'] . '/supplement.php';
ob_start();
include $INCLUDE['path_layout'] . '/layout.php';

$output = ob_get_contents();

ob_end_clean();

preg_match_all("@\[\[(.+?)\]\]@is", $output, $res);
if ($res && isset($res[0]) && count($res[0]) > 0) {
    unset($res[0]);

    foreach ($res as $res_val) {
        foreach ($res_val as $meta) {
            $m = explode("|", $meta);
            if (count($m) == 2) {
                $output = str_replace("[[" . $m[0] . "]]", $m[1], $output);
            }
        }
    }

}
$output = preg_replace("#\[\[(.+?)\]\]#is", "", $output);
echo $output;
