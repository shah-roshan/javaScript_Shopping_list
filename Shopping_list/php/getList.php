
<?php
/**This file gets all the data from the database which is sorted on the basis of whether its done or not
 *in an ascending format and then encodes the data in json format
 *By Roshan Shah,000793559
 *date:2nd November,2019
 */
include "connect.php";
include "listItem.php";

$command = "SELECT * FROM shoppingList WHERE done=0 ORDER BY item ";
$stmt = $dbh->prepare($command);

$success = $stmt->execute();

if ($success) {
    $list = [];
    while ($row = $stmt->fetch()) {
        $item = new Item($row["id"], $row["item"], $row["quantity"], $row["done"]);
        array_push($list, $item);
    }
}


$command = "SELECT * FROM shoppingList WHERE done>0 ORDER BY item ASC";
$stmt = $dbh->prepare($command);

$success = $stmt->execute();

if ($success) {

    while ($row = $stmt->fetch()) {
        $item = new Item($row["id"], $row["item"], $row["quantity"], $row["done"]);
        array_push($list, $item);
    }
}


echo json_encode($list);


?>