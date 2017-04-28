<?php
define('InEmpireBakData',TRUE);
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 5.1
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `dna_follow`;");
E_C("CREATE TABLE `dna_follow` (
  `id` int(10) NOT NULL COMMENT 'ID',
  `user_id` int(10) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `rel_user_id` int(10) NOT NULL DEFAULT '0' COMMENT '被关注用户ID',
  `remark` varchar(250) NOT NULL DEFAULT '' COMMENT '备注',
  `add_time` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `display` tinyint(1) NOT NULL DEFAULT '1' COMMENT '显示',
  `delete` tinyint(1) NOT NULL DEFAULT '0' COMMENT '删除',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='关注表'");

require("../../inc/footer.php");
?>