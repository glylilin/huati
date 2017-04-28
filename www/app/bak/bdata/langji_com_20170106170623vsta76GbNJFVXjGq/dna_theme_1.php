<?php
define('InEmpireBakData',TRUE);
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 5.1
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `dna_theme`;");
E_C("CREATE TABLE `dna_theme` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `name` varchar(250) NOT NULL DEFAULT '' COMMENT '名称',
  `app` varchar(250) NOT NULL DEFAULT '' COMMENT '应用',
  `theme` varchar(250) NOT NULL DEFAULT '' COMMENT '主题名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC");
E_D("replace into `dna_theme` values('1',0xe5908ee58fb0,0x6261636b656e64,0x64656661756c74);");
E_D("replace into `dna_theme` values('2',0xe5898de58fb0,0x66726f6e74656e64,0x64656661756c74);");
E_D("replace into `dna_theme` values('3',0xe5beaee4bfa1,0x77656978696e,0x64656661756c74);");
E_D("replace into `dna_theme` values('4',0xe6898be69cba,0x6d6f62696c65,0x64656661756c74);");

require("../../inc/footer.php");
?>