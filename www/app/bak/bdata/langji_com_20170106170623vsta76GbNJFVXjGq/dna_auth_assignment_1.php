<?php
define('InEmpireBakData',TRUE);
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 5.1
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `dna_auth_assignment`;");
E_C("CREATE TABLE `dna_auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC");
E_D("replace into `dna_auth_assignment` values(0x61646d696e6973747261746f72,0x31,'1470019146');");
E_D("replace into `dna_auth_assignment` values(0x61646d696e6973747261746f72,0x35,'1470388226');");
E_D("replace into `dna_auth_assignment` values(0x706572736f6e,0x35,'1470388226');");
E_D("replace into `dna_auth_assignment` values(0x706572736f6e,0x37,'1470974487');");

require("../../inc/footer.php");
?>