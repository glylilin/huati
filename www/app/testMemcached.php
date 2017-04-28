<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

$connect = new Memcached;  //声明一个新的memcached链接
$connect->setOption(Memcached::OPT_COMPRESSION, false); //关闭压缩功能
$connect->setOption(Memcached::OPT_BINARY_PROTOCOL, true);
$connect->addServer('de1b6da572b64764.m.cnhzaliqshpub001.ocs.aliyuncs.com', 11211);
$connect->setSaslAuthData('de1b6da572b64764', 'Langji123');
$connect->set('hello', 'world'); //var_dump($connect->set('hello', 'world'));
echo 'hello: ', $connect->get('hello');
$connect->quit();