<?php
define('InEmpireBakData',TRUE);
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 5.1
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `dna_invite`;");
E_C("CREATE TABLE `dna_invite` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `user_id` int(10) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `invitee_id` int(10) NOT NULL DEFAULT '0' COMMENT '被邀请用户ID',
  `code` varchar(250) NOT NULL DEFAULT '' COMMENT '邀请码',
  `add_time` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `update_time` int(10) NOT NULL DEFAULT '0' COMMENT '使用时间',
  `display` tinyint(1) NOT NULL DEFAULT '1' COMMENT '显示',
  `delete` tinyint(1) NOT NULL DEFAULT '0' COMMENT '删除',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='邀请表'");
E_D("replace into `dna_invite` values('1','0','0','','1473152774','1473152801','1','1','0');");
E_D("replace into `dna_invite` values('2','0','0','','1473152775','1473152775','1','0','0');");
E_D("replace into `dna_invite` values('3','0','0','','1473152776','1473152776','1','0','0');");
E_D("replace into `dna_invite` values('4','0','0','','1473152776','1473152776','1','0','0');");
E_D("replace into `dna_invite` values('5','0','0','','1473152777','1473152777','1','0','0');");

require("../../inc/footer.php");
?>