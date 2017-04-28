<?php
define('InEmpireBakData',TRUE);
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 5.1
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `dna_area`;");
E_C("CREATE TABLE `dna_area` (
  `id` int(10) NOT NULL COMMENT 'ID',
  `name` varchar(250) NOT NULL DEFAULT '',
  `level` tinyint(4) NOT NULL DEFAULT '0' COMMENT '等级',
  `area_id` int(10) NOT NULL DEFAULT '0' COMMENT '上级ID',
  `remark` varchar(250) NOT NULL DEFAULT '' COMMENT '备注',
  `sort` int(10) NOT NULL DEFAULT '0' COMMENT '排序',
  `display` tinyint(1) NOT NULL DEFAULT '1' COMMENT '显示',
  `delete` tinyint(1) NOT NULL DEFAULT '0' COMMENT '删除',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='区域表'");

require("../../inc/footer.php");
?>