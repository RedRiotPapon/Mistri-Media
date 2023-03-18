<?php
session_start();
//$cookiename ="user";
//$cookievalue="Papon";
//setcookie($cookiename,$cookievalue,time()+(86400*30));
//setcookie("user2","MadMax",time()+(86400*30));
//setcookie($cookiename,$cookievalue,time() - 1);
//setcookie($cookiename,$cookievalue,time() + 3600);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    //session_unset();
    $_SESSION["user"]="Alex";
    $_SESSION["rose"]="Red";
    $_SESSION["dept"]="Cse";
    echo ("sessions  " .count($_SESSION) . "<br>");
    print_r($_SESSION);
    $x = $_SESSION;
    $z=0;
    foreach($x as $arr => $b )
    {  if($arr=="rose")
        {
            $z=1;
        }
        echo $arr . " is " . $b ."<br>"  ;
    }
    if($z==1)
    {
        echo "rose found";
    }
    else{
        echo "not found";
    }


    ?>
    




 </form>
</body>
</html>