
<?php
/**
 *  This file adds the item to the database and calls the getList.php file
 *  By Roshan Shah,000793559
 *  date:2nd November,2019
 */
include "connect.php";
$item = filter_input(INPUT_POST, "item", FILTER_SANITIZE_SPECIAL_CHARS);
$quantity = filter_input(INPUT_POST, "quantity", FILTER_SANITIZE_SPECIAL_CHARS);
if ($quantity > 0) {
    $command = "INSERT INTO shoppingList (item,quantity) VALUES(?,?)";
    $stmt = $dbh->prepare($command);
    $params = [$item, $quantity];
    $success = $stmt->execute($params);

    if ($success) {
        include "getList.php";
    }
}
?>