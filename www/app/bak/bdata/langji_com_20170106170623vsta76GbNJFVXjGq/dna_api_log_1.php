<?php
define('InEmpireBakData',TRUE);
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 5.1
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `dna_api_log`;");
E_C("CREATE TABLE `dna_api_log` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `url` text NOT NULL COMMENT '接口',
  `method` varchar(250) NOT NULL DEFAULT '' COMMENT '方法',
  `parameter` text NOT NULL COMMENT '参数',
  `info` text NOT NULL COMMENT '信息',
  `add_time` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `display` tinyint(1) NOT NULL DEFAULT '1' COMMENT '显示',
  `delete` tinyint(1) NOT NULL DEFAULT '0' COMMENT '删除',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='Api日志表'");

require("../../inc/footer.php");
?>