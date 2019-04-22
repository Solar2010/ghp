<?php
/**
 * Created by PhpStorm.
 * User: Ian
 * Date: 2019/4/22
 * Time: 3:30 PM
 */

$conn = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
if (!$conn) {
    return FALSE;
}
socket_set_option($conn, SOL_SOCKET, SO_SNDTIMEO, array(
    "sec" => 0,
    "usec" => 50000
));
$result = socket_connect($conn, '127.0.0.1', 9001);
$s = time();
$w = ['id' => time(), 'params' => [1], 'method' => 'Serve.Echo'];

socket_write($conn, json_encode($w));
$r = socket_read($conn, 1024);
socket_close($conn);

echo $r;