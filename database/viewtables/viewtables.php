<?php
// Accept the variables from javascript
$select = urldecode(htmlspecialchars(strip_tags(trim($_POST['selectName'])), ENT_NOQUOTES));
$from = urldecode(htmlspecialchars(strip_tags(trim($_POST['fromName'])), ENT_NOQUOTES));
$where = urldecode(htmlspecialchars(strip_tags(trim($_POST['whereName'])), ENT_NOQUOTES));

// Connect to the MySQL server.
require "../../../database.inc.php";  //////////
// Die if no connect
if (!$Link) {
    die('Could not connect: ' . mysqli_error($Link));
}

//set final variables, using preg_replace to remove semicolons and SQL verbs.
$filterWords = '(;|select|SELECT|from|FROM|where|WHERE|drop|DROP|create|CREATE|alter|ALTER|show|SHOW|insert|INSERT|select|SELECT|update|UPDATE|delete|DELETE|index|INDEX|kill|KILL|rename|RENAME|replace|REPLACE)';
$select = preg_replace('`' . $filterWords . '`', '', $select);
$from = preg_replace('`' . $filterWords . '`', '', $from);
$where = preg_replace('`' . $filterWords . '`', '', $where);

//build SQL statement, place in $sql variable
//If where clause exists, place it in statement, if it's null, do not.
if ($where == NULL) {
    $sql = "SELECT " . $select . " FROM " . $from . ";";
} else {
    $sql = "SELECT " . $select . " FROM " . $from . " WHERE " . $where . ";";
}

// Choose the DB and run a query.
mysqli_select_db($Link, "C199grp03DB");
$result = mysqli_query($Link, $sql);
//print out errors if there are any:
echo mysqli_error($Link);

//Print the resulting data:
mysqli_data_seek($result, 0);
// Fetch a row with the column labels
$x = mysqli_fetch_assoc($result);
// Print the column labels
print "<table border=1><tr>";
foreach (array_keys($x) as $k) {
    print "<td><b>$k</b></td>";
}
print "</tr><tr>";
// Print the values for the first row
foreach ($x as $v) {
    print "<td>$v</td>";
}
print "</tr><tr>";
// Print the rest of the rows.
while ($x = mysqli_fetch_row($result)) {
    foreach ($x as $v) {
        print "<td>$v</td>";
    }
    print "</tr><tr>";
}
?>
