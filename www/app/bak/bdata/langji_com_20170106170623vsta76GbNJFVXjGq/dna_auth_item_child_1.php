<?php
define('InEmpireBakData',TRUE);
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 5.1
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `dna_auth_item_child`;");
E_C("CREATE TABLE `dna_auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC");
E_D("replace into `dna_auth_item_child` values(0x61646d696e6973747261746f72,0x3130);");
E_D("replace into `dna_auth_item_child` values(0x61646d696e6973747261746f72,0x3131);");
E_D("replace into `dna_auth_item_child` values(0x61646d696e6973747261746f72,0x3132);");
E_D("replace into `dna_auth_item_child` values(0x61646d696e6973747261746f72,0x3133);");
E_D("replace into `dna_auth_item_child` values(0x61646d696e6973747261746f72,0x3134);");
E_D("replace into `dna_auth_item_child` values(0x61646d696e6973747261746f72,0x3135);");
E_D("replace into `dna_auth_item_child` values(0x61646d696e6973747261746f72,0x3136);");
E_D("replace into `dna_auth_item_child` values(0x61646d696e6973747261746f72,0x3137);");
E_D("replace into `dna_auth_item_child` values(0x61646d696e6973747261746f72,0x3138);");
E_D("replace into `dna_auth_item_child` values(0x61646d696e6973747261746f72,0x3139);");
E_D("replace into `dna_auth_item_child` values(0x61646d696e6973747261746f72,0x32);");
E_D("replace into `dna_auth_item_child` values(0x706572736f6e,0x32);");
E_D("replace into `dna_auth_item_child` values(0x61646d696e6973747261746f72,0x3230);");
E_D("replace into `dna_auth_item_child` values(0x61646d696e6973747261746f72,0x3231);");
E_D("replace into `dna_auth_item_child` values(0x61646d696e6973747261746f72,0x3232);");
E_D("replace into `dna_auth_item_child` values(0x61646d696e6973747261746f72,0x3233);");
E_D("replace into `dna_auth_item_child` values(0x61646d696e6973747261746f72,0x3234);");
E_D("replace into `dna_auth_item_child` values(0x61646d696e6973747261746f72,0x3235);");
E_D("replace into `dna_auth_item_child` values(0x61646d696e6973747261746f72,0x3236);");
E_D("replace into `dna_auth_item_child` values(0x61646d696e6973747261746f72,0x3237);");
E_D("replace into `dna_auth_item_child` values(0x61646d696e6973747261746f72,0x3238);");
E_D("replace into `dna_auth_item_child` values(0x61646d696e6973747261746f72,0x3239);");
E_D("replace into `dna_auth_item_child` values(0x61646d696e6973747261746f72,0x33);");
E_D("replace into `dna_auth_item_child` values(0x61646d696e6973747261746f72,0x34);");
E_D("replace into `dna_auth_item_child` values(0x61646d696e6973747261746f72,0x35);");
E_D("replace into `dna_auth_item_child` values(0x61646d696e6973747261746f72,0x36);");
E_D("replace into `dna_auth_item_child` values(0x61646d696e6973747261746f72,0x37);");
E_D("replace into `dna_auth_item_child` values(0x61646d696e6973747261746f72,0x38);");
E_D("replace into `dna_auth_item_child` values(0x61646d696e6973747261746f72,0x39);");

require("../../inc/footer.php");
?>