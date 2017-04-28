<?php
define('InEmpireBakData',TRUE);
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 5.1
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `dna_login_log`;");
E_C("CREATE TABLE `dna_login_log` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `name` varchar(250) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` varchar(250) NOT NULL DEFAULT '' COMMENT '密码',
  `info` varchar(250) NOT NULL DEFAULT '' COMMENT '信息',
  `ip` char(15) NOT NULL COMMENT 'IP地址',
  `add_time` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `display` tinyint(1) NOT NULL DEFAULT '1' COMMENT '显示',
  `delete` tinyint(1) NOT NULL DEFAULT '0' COMMENT '删除',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='登录日志表'");

require("../../inc/footer.php");
?>