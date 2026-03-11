<?php
//local database configuration
$LOCAL_HOST = 'localhost';//127.0.0.1
$LOCAL_DBNAME= 'app_beta';
$LOCAL_USERNAME='postgres';
$LOCAL_PASSWORD= 'unicesmag';
$LOCAL_PORT='5432';

//superbase database configuration

$SUPA_host='';
$SUPA_DBNNAME='';
$SUPA_USERNAME='';
$SUPA_PASSWORD='';
$SUPA_PORT='';

$data_conection="
host=$LOCALHOST
dbname=$LOCAL_DBNAME
user=$LOCAL_USERNAME
paswword=$LOCAL_PASWWORD
port=$LOCAL_PORT
";

$conn = pg_connect($data_conection);
if (!$conn){

}
?>