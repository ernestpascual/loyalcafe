<?php
class DbHelper {
    private $db = new PDO("mysql:host=localhost;dbname=loyalcafe","root","");

    // perform query for points
    function checkPoints($userID){
        $sql = "select Points from points\n"
        . "inner join users on points.User_ID = users.User_ID\n"
        . "where points.User_ID = :user";
        $result = $db ->prepare($sql);
        $result -> bindParam(':user', $userID, PDO::PARAM_INT);
        $result -> execute();
        $points = $result->fetch(PDO::FETCH_ASSOC);
        return $points;
    }

     // query get menu item
     function getMenuItem($menu){
     $sql = "select * from menu\n"
     . "where Item_Name = :menu";
     $result = $db ->prepare($sql);
     $result -> bindParam(':menu', $menu);
     $result -> execute();
     $getMenu = $result2->fetch(PDO::FETCH_ASSOC);
     return $getMenu;
    }

    // update database after claiming reward
    function updateAfterClaim($balance, $menuValue, $qty, $userID){
        if($balance < ($qty * $menuValue)){
            echo "Not enough points! Redirecting in 1 second...";
            header("refresh:3; url=balance.php");
        } else {
            // subtract values
            $newBalance = $balance -  ($qty * $menuValue);
            $sql = "update points set points = :balance
            \n where User_ID = :user";
            $result -> bindParam(':balance', $newBalance);
            $result -> bindParam(':user', $userID);
            $result -> execute();
        }
    }
    
    // insert voucher code to transaction table
    function storeVoucherCode($userID, $code){
       $sql = 
       "insert into transactions (User_ID, claimCode, Date) values (
       :userID, :code, CURRENT_TIMESTAMP)";
       $result = $db ->prepare($sql);
       $result -> bindParam(':userID',$userID);
       $result -> bindParam(':code', $code);
       $result -> execute();
       // success message or redirection
    }
}

?>