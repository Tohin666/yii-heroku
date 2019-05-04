<?php

if ($_SERVER['SERVER_NAME'] == "afternoon-citadel-12331.herokuapp.com") {
    $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    $host = $url["host"];
    $username = $url["user"];
    $password = $url["pass"];
    $dbname = substr($url["path"], 1);
} else {
    $host = 'localhost';
    $dbname = 'task_db;port=3307';
    $username = 'root';
    $password = '';
}
$dbConfig = [
    'class' => 'yii\db\Connection',
    'dsn' => "mysql:host={$host};dbname={$dbname}",
    'username' => $username,
    'password' => $password,
    'charset' => 'utf8',
];
return $dbConfig;

//return [
//    'class' => 'yii\db\Connection',
//    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
//    'username' => 'root',
//    'password' => '',
//    'charset' => 'utf8',
//
//    // Schema cache options (for production environment)
//    //'enableSchemaCache' => true,
//    //'schemaCacheDuration' => 60,
//    //'schemaCache' => 'cache',
//];
