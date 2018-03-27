<?php

    /*
    03-05-2018:
    Refine to prepared statements after 
    next update since code is vulnerable to sql injection
    */

    // check if there is a session 
    if (!isset($_SESSION)) 
    { session_start(); }

    // initialize db
    $db = new PDO("mysql:host=localhost;dbname=loyalcafe","root","");

    // perform query for points -- SEPARATED
    $sql = "select Points from points\n"
    . "inner join users on points.User_ID = users.User_ID\n"
    . "where points.User_ID = '".$_SESSION["userid"]."';";
    $result = $db -> query($sql);
    $points = $result->fetch(PDO::FETCH_ASSOC);

    // query get menu item - SEPARATED
    $sql2 = "select * from menu\n"
    . "where Item_Name = \"".$_POST['menu']."\";";
    $result2 = $db -> query($sql2);
    $menu = $result2->fetch(PDO::FETCH_ASSOC);

    // validate if points are enough else display error message
    if($points['Points'] < ($_POST['qty'] * $menu['Value'])){
        echo "Not enough points! Redirecting in 1 second...";
        header("refresh:3; url=balance.php");
    } else {
        // subtract values
        $newBalance = $points['Points'] - $menu['Value'];

        // update database values
        $sql3 = "update points set points = ".$newBalance.
        "\n where User_ID = \"".$_SESSION['userid']."\";";

        // check if successful

        $result3 = $db->query($sql3);
      
        
        // generate unique code for claiming
        $str = '';
        $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < 8; ++$i) {
            $str .= $keyspace[random_int(0, $max)];
        }

         // insert to transaction table
         $sql4 = 
         "insert into transactions (User_ID, claimCode, Date) values ("
         .$_SESSION["userid"].", '".$str."', CURRENT_TIMESTAMP)";
 
         // check if succesful
        $result4 = $db->query($sql4);
    

        // design this part na lang hahahaha <3 <3
        // voucher for printing
        echo 
        "<h1>Loyal Cafe Rewards Promo</h1><br>
        <h3>Here's your free ".$_POST['qty']. " ". $menu['Item_Name'].
        "!</h3><br><br><br>You can claim these at any Loyal Cafe of your choice.<br>
        Here's your claim code:<br><br><h2>".$str."</h2><br><br>Print this voucher and show
        it to our friendly partners.<br><br><br><a href=\"balance.php\">Back</a>";
    }

?>
