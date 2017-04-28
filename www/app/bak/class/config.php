<?php
if(!defined('InEmpireBak'))
{
	exit();
}
define('EmpireBakConfig',TRUE);

//Database
$phome_db_dbtype='mysql';
$phome_db_ver='5.0';
$phome_db_server='localhost';
$phome_db_port='';
$phome_db_username='root';
$phome_db_password='root';
$phome_db_dbname='langji_com';
$baktbpre='';
$phome_db_char='';

//USER
$set_username='admin';
$set_password='0c909a141f1f2c0a1cb602b0b2d7d050';
$set_loginauth='admin123';
$set_loginrnd='PM9hYGqP8UCuiiBfLqB84t6nEjKjAQ';
$set_outtime='60';
$set_loginkey='1';
$ebak_set_keytime=60;
$ebak_set_ckuseragent='';

//COOKIE
$phome_cookiedomain='';
$phome_cookiepath='/';
$phome_cookievarpre='xguldw_';

//LANGUAGE
$langr=ReturnUseEbakLang();
$ebaklang=$langr['lang'];
$ebaklangchar=$langr['langchar'];

//BAK
$bakpath='bdata';
$bakzippath='zip';
$filechmod='1';
$phpsafemod='';
$php_outtime='1000';
$limittype='';
$canlistdb='';
$ebak_set_moredbserver='';
$ebak_set_hidedbs='';
$ebak_set_escapetype='1';

//EBMA
$ebak_ebma_open=1;
$ebak_ebma_path='phpmyadmin';
$ebak_ebma_cklogin=0;

//SYS
$ebak_set_ckrndvar='tnzvzrlhvqwa';
$ebak_set_ckrndval='d7235f9c0c7d235855979e6268ae9519';
$ebak_set_ckrndvaltwo='eebe0b79e11fe55e4325e5a9f0a6e66f';
$ebak_set_ckrndvalthree='e84f512d233ead028ad1296a77ab625d';
$ebak_set_ckrndvalfour='9c10e630822d6e9e43e3ff8f3aa185c0';

//------------ SYSTEM ------------
HeaderIeChar();
?>