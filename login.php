<?php
session_start();

include 'D:\OSPanel\domains\n-lb-2\users.php';

$login = $_POST["login"];
$password = $_POST["password"];
 

for ($i = 0; $i < count($users); $i++)
{	
    if (($login == $users[$i]['login']) && ($password == $users[$i]['password']))
    {
	        $_SESSION['login'] = $users[$i]['login'];
	        $_SESSION['password'] = $users[$i]['password'];

 			if ($users[$i]['role'] == 'client'){	            
	            $_SESSION['surname'] = $users[$i]['surname'];
	            $_SESSION['lang'] = $users[$i]['lang'];
	            $_SESSION['role'] = $users[$i]['role'];
	            $_SESSION['name'] = $users[$i]['name'];
	            header('Location: users\client.php');
	        }	        

	        if ($users[$i]['role'] == 'manager')
	        {
		            $_SESSION['surname'] = $users[$i]['surname'];
		            $_SESSION['lang'] = $users[$i]['lang'];	   
		            $_SESSION['role'] = $users[$i]['role'];
		            $_SESSION['name'] = $users[$i]['name'];
		            header('Location: users\manager.php'); 
	        }

			if ($users[$i]['role'] == 'admin')
	        {		            
		            $_SESSION['surname'] = $users[$i]['surname'];
		            $_SESSION['lang'] = $users[$i]['lang'];	   
		            $_SESSION['role'] = $users[$i]['role'];
		            $_SESSION['name'] = $users[$i]['name'];     
		            header('Location: users\admin.php');
	        }       

    }
}

