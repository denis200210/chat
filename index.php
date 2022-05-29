<?php
$users = array(
    "Mark"=>"123",
    "Petr"=>"321"
);

$login = "asd";
$password = "no";

$login = $_GET['login'];
$password = $_GET['password'];


if($users[$login] === $password)
{
    echo "Hello ", $login ,"</br>All messages:</br>";
    $message = $_GET['message'];
    if ($message !== null)
    {
        $send = array(
            "Login" => $login,
            "Message" => $message,
            "Date" => date("m.d.y")
        );

        $content = file_get_contents('db.json');
        if ($content == "")
        {
            $newMessages[] = $send;
            file_put_contents('db.json', json_encode($newMessages));
        }
        else
        {
            $decodeFile =  json_decode($content, true);
            array_push($decodeFile, $send);
            file_put_contents('db.json', json_encode($decodeFile));
        }
    }
}
else
{
    echo "You are not log in</br>All messages:</br>";
}
$content = file_get_contents('db.json');
$decodeFile =  json_decode($content, true);
for ($i = 0; $i < count($decodeFile); $i++)
{
    echo $decodeFile[$i]['Login'], " write ", $decodeFile[$i]['Message'], " on ", $decodeFile[$i]['Date'],  "</br>";
}



