<?php

/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simply to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */

global $wpdb;

// DB table to use
$table = 'wp_users';

// Table's primary key
$primaryKey = 'ID';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'user_login', 'dt' => 0 ),
    array( 'db' => 'user_email',  'dt' => 1 ),
);

// SQL server connection information
$sql_details = array(
    'user' => DB_USER,
    'pass' => DB_PASSWORD,
    'db'   => DB_NAME,
    'host' => DB_HOST
);


/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

$results = $wpdb->get_results('select user_login,user_email,meta_value from wp_users join(wp_usermeta) ON (wp_users.ID=wp_usermeta.user_id) where wp_usermeta.meta_key=\'role\';');

//print_r($results);
$bingo = array();
foreach($results as $result)
{
    $bingo[] = array($result->user_login, $result->user_email, $result->meta_value);
}
echo "{\"data\": " . json_encode($bingo) . " }";die();