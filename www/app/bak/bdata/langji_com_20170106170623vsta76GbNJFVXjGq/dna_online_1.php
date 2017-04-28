<?php
define('InEmpireBakData',TRUE);
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 5.1
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `dna_online`;");
E_C("CREATE TABLE `dna_online` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `user_id` int(10) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `item_id` int(10) NOT NULL DEFAULT '0' COMMENT '项目ID',
  `add_time` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `update_time` int(10) NOT NULL DEFAULT '0' COMMENT '最近更新时间',
  `display` tinyint(1) NOT NULL DEFAULT '1' COMMENT '显示',
  `delete` tinyint(1) NOT NULL DEFAULT '0' COMMENT '删除',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='在线表'");
E_D("replace into `dna_online` values('1','0','0','1473148727','1473149891','1','1','0');");
E_D("replace into `dna_online` values('2','0','0','1473149166','1473149166','1','0','0');");
E_D("replace into `dna_online` values('3','0','0','1473149173','1473149173','1','0','0');");
E_D("replace into `dna_online` values('4','0','0','1473149175','1473149175','1','0','0');");
E_D("replace into `dna_online` values('5','0','0','1473149176','1473149176','1','0','0');");

require("../../inc/footer.php");
?>