<?php
define('InEmpireBakData',TRUE);
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 5.1
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `dna_course_tutor`;");
E_C("CREATE TABLE `dna_course_tutor` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `course_id` int(10) NOT NULL DEFAULT '0' COMMENT '课程ID',
  `user_id` int(10) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '课程价格',
  `vip_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '会员价格',
  `pre_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '预付价格',
  `remark` varchar(250) NOT NULL DEFAULT '' COMMENT '备注',
  `sort` int(10) NOT NULL DEFAULT '0' COMMENT '排序',
  `display` tinyint(1) NOT NULL DEFAULT '1' COMMENT '显示',
  `delete` tinyint(1) NOT NULL DEFAULT '0' COMMENT '删除',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='定制课程关联导师表'");

require("../../inc/footer.php");
?>