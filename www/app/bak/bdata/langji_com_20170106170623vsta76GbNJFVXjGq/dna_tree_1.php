<?php
define('InEmpireBakData',TRUE);
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 5.1
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `dna_tree`;");
E_C("CREATE TABLE `dna_tree` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `root` int(10) NOT NULL DEFAULT '0' COMMENT '根',
  `lft` int(10) NOT NULL COMMENT '左节点',
  `rgt` int(10) NOT NULL COMMENT '右节点',
  `lvl` smallint(5) NOT NULL DEFAULT '0' COMMENT '层级',
  `name` varchar(64) NOT NULL DEFAULT '' COMMENT '分类名称',
  `icon` varchar(250) NOT NULL DEFAULT '' COMMENT '下拉图标',
  `icon_type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '图标类型， 1： CSS Class 2： Raw Markup',
  `active` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否激活',
  `selected` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否选择',
  `disabled` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否可用',
  `readonly` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否只读',
  `visible` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否可见',
  `collapsed` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否折叠',
  `movable_u` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否可上移',
  `movable_d` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否可下移',
  `movable_l` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否可左移',
  `movable_r` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否可右移',
  `removable` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否可移动',
  `removable_all` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否可移动全部',
  `fonticon` varchar(250) NOT NULL DEFAULT '' COMMENT '字体图标',
  `image_id` int(10) NOT NULL DEFAULT '0' COMMENT '大图片',
  `thumb_id` int(10) NOT NULL DEFAULT '0' COMMENT '缩略图',
  `remark` varchar(250) NOT NULL COMMENT '备注',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='分类表'");

require("../../inc/footer.php");
?>