<?php
define('InEmpireBakData',TRUE);
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 5.1
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `dna_assign`;");
E_C("CREATE TABLE `dna_assign` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `order_id` int(10) NOT NULL DEFAULT '0' COMMENT '订单ID',
  `user_id` int(10) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '金额',
  `remark` varchar(250) NOT NULL DEFAULT '' COMMENT '备注',
  `add_time` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `display` tinyint(1) NOT NULL DEFAULT '1' COMMENT '显示',
  `delete` tinyint(1) NOT NULL DEFAULT '0' COMMENT '删除',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='订单派单表'");

require("../../inc/footer.php");
?>