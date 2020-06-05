<?php

session_start();

include 'D:\OSPanel\domains\n-lb-2\users.php';
include 'D:\OSPanel\domains\n-lb-2\lang.php';

if($_GET["exit"]){ session_destroy(); header("Location: ..\index.php"); }

if (isset($_GET['lang'])){ $_SESSION['lang'] = $_GET['lang']; }

if (!(isset($_SESSION['login'])) && (!(isset($_SESSION['password'])))) { session_destroy(); header("Location:  ..\index.php"); }



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


    class client extends User
    {
        public function hello (){
            echo $this ->lang_hello . $this->name. "  " . $this->surname. "  ". $this ->lang_role;
        }
    }

    if ($_SESSION['role'] == 'admin'){$currently_role = 1;}

    if ($_SESSION['role'] == 'manager'){$currently_role = 2;}

    if ($_SESSION['role'] == 'client') {$currently_role = 3;}


switch ($_SESSION['lang']) {
    case "ru":
         $client = new client($_SESSION['login'], $_SESSION['password'], $_SESSION['name'], $_SESSION['surname'], $_SESSION['role'], $lang[0]['ru'], $lang[$currently_role]['ru']);
        break;
    case "en":
        $client = new client($_SESSION['login'], $_SESSION['password'], $_SESSION['name'], $_SESSION['surname'], $_SESSION['role'], $lang[0]['en'], $lang[$currently_role]['en']);
        break;
    case "ua":
        $client = new client($_SESSION['login'], $_SESSION['password'], $_SESSION['name'], $_SESSION['surname'], $_SESSION['role'], $lang[0]['ua'], $lang[$currently_role]['ua']);
        break;
    case "it":
         $client = new client($_SESSION['login'], $_SESSION['password'], $_SESSION['name'], $_SESSION['surname'], $_SESSION['role'], $lang[0]['it'], $lang[$currently_role]['it']);
        break;
}



$client ->hello();

?>
<head>
    <title>Клиент</title>
</head>
<body>
    

<form >
    <select name="lang" method="GET">
        <option value="ru">Русский</option>
        <option value="ua">Українська</option>
        <option value="en">English</option>
        <option value="it">Italian</option>
    </select>
    <input type="submit"value="Save">
</form>

<form method="GET">
    <input type="submit" name="exit" value="Exit">
</form>

    <form name = "test" action = "admin.php" method = "post">
        <button>Admin</button>
    </form>

    <form name = "test" action = "manager.php" method = "post">
        <button>Manager</button>
    </form>

</body>