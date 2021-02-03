<?php

$db_host = 'sql313.epizy.com';
$db_user = 'epiz_27658280';
$db_pass = 'Rgl4CCmtXRM8';
$db_database = 'epiz_27658280_doner';
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_database);
if (!$conn) {

  die("failed to connect!" . mysqli_error($conn));
}
