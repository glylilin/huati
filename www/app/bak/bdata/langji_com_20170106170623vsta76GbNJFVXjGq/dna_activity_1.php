<?php
define('InEmpireBakData',TRUE);
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 5.1
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `dna_activity`;");
E_C("CREATE TABLE `dna_activity` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `user_id` int(10) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `title` varchar(250) NOT NULL DEFAULT '' COMMENT '标题',
  `area_id` int(10) NOT NULL DEFAULT '0' COMMENT '区域ID',
  `thumb_id` int(10) NOT NULL DEFAULT '0' COMMENT '缩略图',
  `image_id` int(10) NOT NULL DEFAULT '0' COMMENT '大图片',
  `album_ids` text NOT NULL COMMENT '图片集',
  `begin_time` int(10) NOT NULL DEFAULT '0' COMMENT '开始时间',
  `end_time` int(10) NOT NULL DEFAULT '0' COMMENT '截止时间',
  `summary` varchar(250) NOT NULL DEFAULT '' COMMENT '内容简介',
  `content` text NOT NULL COMMENT '详细内容',
  `remark` varchar(250) NOT NULL DEFAULT '' COMMENT '备注',
  `tag` varchar(250) NOT NULL DEFAULT '' COMMENT '标签',
  `number` int(10) NOT NULL DEFAULT '0' COMMENT '报名人数',
  `credit` int(10) NOT NULL DEFAULT '0' COMMENT '报名限制',
  `add_time` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `update_time` int(10) NOT NULL DEFAULT '0' COMMENT '最近更新时间',
  `sort` int(10) NOT NULL DEFAULT '0' COMMENT '排序',
  `view` int(10) NOT NULL DEFAULT '0' COMMENT '浏览量',
  `display` tinyint(1) NOT NULL DEFAULT '1' COMMENT '显示',
  `delete` tinyint(1) NOT NULL DEFAULT '0' COMMENT '删除',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10011 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='同城会活动表'");
E_D("replace into `dna_activity` values('10001','0',0xe7acac31e69da1e6b5aae58f8be59c88e4bfa1e681afe6b58be8af95efbc81,'0','0','0','','0','0','',0xe7acac31e69da1e6b5aae58f8be59c88e4bfa1e681afe6b58be8af95efbc81,'','','0','0','1473075784','1473075851','0','0','1','1','0');");
E_D("replace into `dna_activity` values('10002','0',0xe7acac31e69da1e6b5aae58f8be59c88e4bfa1e681afe6b58be8af95efbc81,'0','0','0','','0','0','',0xe7acac4ee69da1e6b5aae58f8be59c88e4bfa1e681afe6b58be8af95efbc81,'','','0','0','1473075789','1473075789','0','0','1','0','0');");
E_D("replace into `dna_activity` values('10003','0',0xe7acac31e69da1e6b5aae58f8be59c88e4bfa1e681afe6b58be8af95efbc81,'0','0','0','','0','0','',0xe7acac4ee69da1e6b5aae58f8be59c88e4bfa1e681afe6b58be8af95efbc81,'','','0','0','1473075790','1473075790','0','0','1','0','0');");
E_D("replace into `dna_activity` values('10004','0',0xe7acac31e69da1e6b5aae58f8be59c88e4bfa1e681afe6b58be8af95efbc81,'0','0','0','','0','0','',0xe7acac4ee69da1e6b5aae58f8be59c88e4bfa1e681afe6b58be8af95efbc81,'','','0','0','1473075791','1473075791','0','0','1','0','0');");
E_D("replace into `dna_activity` values('10005','0',0xe7acac31e69da1e6b5aae58f8be59c88e4bfa1e681afe6b58be8af95efbc81,'0','0','0','','0','0','',0xe7acac4ee69da1e6b5aae58f8be59c88e4bfa1e681afe6b58be8af95efbc81,'','','0','0','1473075832','1473075832','0','0','1','0','0');");
E_D("replace into `dna_activity` values('10006','0',0xe7acac31e69da1e6b5aae58f8be59c88e4bfa1e681afe6b58be8af95efbc81,'0','0','0','','0','0','',0xe7acac4ee69da1e6b5aae58f8be59c88e4bfa1e681afe6b58be8af95efbc81,'','','0','0','1473075853','1473075853','0','0','1','0','0');");
E_D("replace into `dna_activity` values('10007','0',0xe7acac31e69da1e6b5aae58f8be59c88e4bfa1e681afe6b58be8af95efbc81,'0','0','0','','0','0','',0xe7acac4ee69da1e6b5aae58f8be59c88e4bfa1e681afe6b58be8af95efbc81,'','','0','0','1473075854','1473075854','0','0','1','0','0');");
E_D("replace into `dna_activity` values('10008','0',0xe7acac31e69da1e6b5aae58f8be59c88e4bfa1e681afe6b58be8af95efbc81,'0','0','0','','0','0','',0xe7acac4ee69da1e6b5aae58f8be59c88e4bfa1e681afe6b58be8af95efbc81,'','','0','0','1473075855','1473075855','0','0','1','0','0');");
E_D("replace into `dna_activity` values('10009','0',0xe7acac31e69da1e6b5aae58f8be59c88e4bfa1e681afe6b58be8af95efbc81,'0','0','0','','0','0','',0xe7acac4ee69da1e6b5aae58f8be59c88e4bfa1e681afe6b58be8af95efbc81,'','','0','0','1474880690','1474880690','0','0','1','0','0');");
E_D("replace into `dna_activity` values('10010','0',0xe7acac31e69da1e6b5aae58f8be59c88e4bfa1e681afe6b58be8af95efbc81,'0','0','0','','0','0','',0xe7acac4ee69da1e6b5aae58f8be59c88e4bfa1e681afe6b58be8af95efbc81,'','','0','0','1474880764','1474880764','0','0','1','0','0');");

require("../../inc/footer.php");
?>