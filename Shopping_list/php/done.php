
<?php
/**This file recieves the id of the item and updates the done field to 1 if its completed or sets it to 0 if 
 *it not yet completed and then calls out the getList.php file.
 *By Roshan Shah,000793559
 * date:2nd November,2019
 */
include "connect.php";

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

$command = "SELECT done FROM shoppingList WHERE id=?";

$stmt = $dbh->prepare($command);

$params = [$id];

$success = $stmt->execute($params);

while ($row = $stmt->fetch()) {
    if ($row["done"] == 0) {
        $command = "UPDATE shoppingList SET done=done+1 WHERE id=?";
        $stmt = $dbh->prepare($command);

        $params = [$id];

        $success = $stmt->execute($params);
        if ($success) {
            include "getList.php";
        }
    } else {
        $command = "UPDATE shoppingList SET done=done-1 WHERE id=$id";
        $stmt = $dbh->prepare($command);

        $params = [$id];

        $success = $stmt->execute($params);
        if ($success) {
            include "getList.php";
        }
    }
}
?>