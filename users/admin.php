<?php

session_start();

include 'D:\OSPanel\domains\n-lb-2\users.php';
include 'D:\\OSPanel\domains\n-lb-2\lang.php';

if (!(($_SESSION['role']) == 'admin')) { session_destroy(); header("Location:  ..\index.php"); }

if($_GET["exit"]){ session_destroy(); header("Location: ..\index.php"); }

if (isset($_GET['lang'])){ $_SESSION['lang'] = $_GET['lang']; }


class User{ 
    public $login;
    public $password;
    public $name;
    public $surname;
    public $role;
    public $lang_hello;
    public $lang_role;

    function __construct($login, $password, $name, $surname, $role,$lang_hello, $lang_role)
    {
        $this->login = $login; 
        $this->password = $password;
        $this->name = $name;
        $this->surname = $surname;
        $this->role = $role;
        $this->lang_hello = $lang_hello;
        $this->lang_role = $lang_role;
    }
    }

class admin extends User
{
    public function hello (){
        echo $this ->lang_hello . $this->name. "  " . $this->surname. "  ". $this ->lang_role;
    }
}

switch ($_SESSION['lang']) {
    case "ru":
         $admin = new admin($_SESSION['login'], $_SESSION['password'], $_SESSION['name'], $_SESSION['surname'], $_SESSION['role'], $lang[0]['ru'], $lang[1]['ru']);
        break;
    case "en":
        $admin = new admin($_SESSION['login'], $_SESSION['password'], $_SESSION['name'], $_SESSION['surname'], $_SESSION['role'], $lang[0]['en'], $lang[1]['en']);
        break;
    case "ua":
        $admin = new admin($_SESSION['login'], $_SESSION['password'], $_SESSION['name'], $_SESSION['surname'], $_SESSION['role'], $lang[0]['ua'], $lang[1]['ua']);
        break;
    case "it":
         $admin = new admin($_SESSION['login'], $_SESSION['password'], $_SESSION['name'], $_SESSION['surname'], $_SESSION['role'], $lang[0]['it'], $lang[1]['it']);
        break;
}

$admin ->hello();


?>

<head>
    <title>Админ</title>
</head>
<body>
    

<form >
    <select name="lang" method="GET">
        <option value="ru">Русский</option>
        <option value="ua">Українська</option>
        <option value="en">English</option>
        <option value="it">Italian</option>
    </select>
    <input type="submit" value="Save">
</form>

<form method="GET">
        <input type="submit" name="exit"  value="Exit">
    </form>

    <form name = "test" action = "manager.php" method = "post">
        <button>Manager</button>
    </form>
    <form name = "test" action = "client.php" method = "post">
        <button>Client</button>
    </form>
</body> 
