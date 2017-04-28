<?php

include('MemcacheSASL.php');

$m = new MemcacheSASL;
$m->addServer('de1b6da572b64764.m.cnhzaliqshpub001.ocs.aliyuncs.com', '11211');
$m->setSaslAuthData('de1b6da572b64764', 'Langji123');
var_dump($m->add('test', '123'));
$m->delete('test');