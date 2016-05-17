<?php
// This function must be called before sending any queries to the DB
// Pre: N/A
// Post: A connection to the DB was made
// Returns: A handler for the DB link identifier
// Cleanup: The calling function is responsible for calling dbClose($LinkID)
function dbConnect() {
    // Include file with database specific information or exit
    (require_once '../OFdbInfo.inc') or exit("Unable to load server/database credentials.<br>\n");
    // Connect to server and verify connection
    ($LinkID = mysqli_connect($host, $login, $pwd)) or exit("Unable to connect to db server.<br>\n".mysqli_error($LinkID));
    // Connect to database and verify connection
    (mysqli_select_db($LinkID, $dbID)) or exit("Unable to connect to database.<br>\n".mysqli_error($LinkID));
    return $LinkID;
}
// Query the DB and create an array from result as an enumerated array of associated arrays for each row
// Pre: dbConnect() has been called
// Post: N/A
// Param $LinkID is the handler to the database identifier
// Param $queryString is the complete query string to be run against the DB
// Returns: The created array from the query result
function getQuery($LinkID, $queryString) {
    // Query database and return result
	//echo $queryString;
    $result = mysqli_query($LinkID, $queryString);
    $i = 0;
    $resultArray = NULL;
    while($x = mysqli_fetch_assoc($result)) {
        $resultArray[$i] = $x;
        $i++;
    }
    return $resultArray;
}
// Insert a new row in to the ShoppingCart database
// Pre: dbConnect() has been called
// Post: A new row is added to the DB
// Param $LinkID is the handler to the database identifier
// Param $insertString is the complete insert statement to be run against the DB
function addItem($LinkID, $insertString) {
    (mysqli_query($LinkID, $insertString)) or exit("insert error TODO-BETTER MESSAGE<br>\n". mysqli_error($LinkID));
}
// Closes the DB connection created by dbConnect
// Pre: dbConnect() was been called
// Post: The connection to the DB was closed
// Param $LinkID is the handler to the database identifier
function dbClose($LinkID) {
    mysqli_close($LinkID);
}
?>