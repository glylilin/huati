<?php
define('InEmpireBakData',TRUE);
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 5.1
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `dna_group`;");
E_C("CREATE TABLE `dna_group` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `ext_groupid` int(10) NOT NULL DEFAULT '0' COMMENT '第三方群组ID',
  `user_id` int(10) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `name` varchar(250) NOT NULL DEFAULT '' COMMENT '名称',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '类型，0：无 1：教学群 2：实战群 3：兴趣热点群 4：同城群 5会员群',
  `remark` varchar(250) NOT NULL DEFAULT '' COMMENT '备注',
  `number` int(10) NOT NULL DEFAULT '0' COMMENT '人数',
  `credit` int(10) NOT NULL DEFAULT '0' COMMENT '权限',
  `add_time` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `open` tinyint(1) NOT NULL DEFAULT '0' COMMENT '公开',
  `top` tinyint(1) NOT NULL DEFAULT '0' COMMENT '顶置',
  `sort` int(10) NOT NULL DEFAULT '0' COMMENT '排序',
  `display` tinyint(1) NOT NULL DEFAULT '1' COMMENT '显示',
  `delete` tinyint(1) NOT NULL DEFAULT '0' COMMENT '删除',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10006 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='群组表'");
E_D("replace into `dna_group` values('10001','0','0','','0','','0','0','1473150978','0','0','0','1','1','0');");
E_D("replace into `dna_group` values('10002','0','0','','0','','0','0','1473150979','0','0','0','1','0','0');");
E_D("replace into `dna_group` values('10003','0','0','','0','','0','0','1473150980','0','0','0','1','0','0');");
E_D("replace into `dna_group` values('10004','0','0','','0','','0','0','1473150982','0','0','0','1','0','0');");
E_D("replace into `dna_group` values('10005','0','0','','0','','0','0','1473151030','0','0','0','1','0','0');");

require("../../inc/footer.php");
?>