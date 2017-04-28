<?php
define('InEmpireBakData',TRUE);
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 5.1
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `dna_link`;");
E_C("CREATE TABLE `dna_link` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `type` int(10) NOT NULL DEFAULT '0' COMMENT '类型',
  `title` varchar(250) NOT NULL DEFAULT '' COMMENT '标题',
  `thumb_id` int(10) NOT NULL DEFAULT '0' COMMENT '缩略图',
  `url` varchar(250) NOT NULL DEFAULT '' COMMENT '链接地址',
  `remark` varchar(250) NOT NULL DEFAULT '' COMMENT '备注',
  `add_time` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `sort` int(10) NOT NULL DEFAULT '0' COMMENT '排序',
  `display` tinyint(1) NOT NULL DEFAULT '1' COMMENT '显示',
  `delete` tinyint(1) NOT NULL DEFAULT '0' COMMENT '删除',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='链接表'");

require("../../inc/footer.php");
?>