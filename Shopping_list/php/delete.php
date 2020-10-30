
<?php
/**  This is the delete.php file that is used to delete the items when the delete button is clicked
 *By Roshan Shah,000793559
 *date:2nd November,2019
 */
include "connect.php";

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
$command = "DELETE FROM shoppingList WHERE id=?";
$params = [$id];
$stmt = $dbh->prepare($command);
$success = $stmt->execute($params);
include "getList.php";
?>