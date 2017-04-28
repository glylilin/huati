<?php
define('InEmpireBakData',TRUE);
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 5.1
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `dna_gift`;");
E_C("CREATE TABLE `dna_gift` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `title` varchar(250) NOT NULL DEFAULT '' COMMENT '礼物名称',
  `thumb_id` int(10) NOT NULL DEFAULT '0' COMMENT '缩略图',
  `image_id` int(10) NOT NULL DEFAULT '0' COMMENT '大图片',
  `price` int(10) NOT NULL DEFAULT '0' COMMENT '浪币',
  `remark` varchar(250) NOT NULL DEFAULT '' COMMENT '备注',
  `sort` int(10) NOT NULL DEFAULT '0' COMMENT '排序',
  `display` tinyint(1) NOT NULL DEFAULT '1' COMMENT '显示',
  `delete` tinyint(1) NOT NULL DEFAULT '0' COMMENT '删除',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='礼物表'");
E_D("replace into `dna_gift` values('1','','0','0','0','','0','0','1','0');");
E_D("replace into `dna_gift` values('2','','0','0','0','','0','0','0','0');");
E_D("replace into `dna_gift` values('3','','0','0','0','','0','0','0','0');");
E_D("replace into `dna_gift` values('4','','0','0','0','','0','1','0','0');");

require("../../inc/footer.php");
?>