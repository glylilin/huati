<?php
define('InEmpireBakData',TRUE);
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 5.1
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `dna_join`;");
E_C("CREATE TABLE `dna_join` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `activity_id` int(10) NOT NULL DEFAULT '0' COMMENT '活动ID',
  `user_id` int(10) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `name` char(16) NOT NULL COMMENT '姓名',
  `mobile` char(11) NOT NULL COMMENT '手机',
  `add_time` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `display` tinyint(1) NOT NULL DEFAULT '1' COMMENT '显示',
  `delete` tinyint(1) NOT NULL DEFAULT '0' COMMENT '删除',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='报名表'");

require("../../inc/footer.php");
?>