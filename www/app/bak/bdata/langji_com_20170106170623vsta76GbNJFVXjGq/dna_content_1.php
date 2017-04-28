<?php
define('InEmpireBakData',TRUE);
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 5.1
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `dna_content`;");
E_C("CREATE TABLE `dna_content` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `user_id` int(10) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `tree_id` int(10) NOT NULL DEFAULT '0' COMMENT '分类ID',
  `title` varchar(250) NOT NULL DEFAULT '' COMMENT '标题',
  `subtitle` varchar(250) NOT NULL DEFAULT '' COMMENT '副标题',
  `author` varchar(250) NOT NULL DEFAULT '' COMMENT '作者',
  `source` varchar(250) NOT NULL DEFAULT '' COMMENT '来源',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '类型',
  `color` varchar(250) NOT NULL DEFAULT '' COMMENT '颜色',
  `thumb_id` int(10) NOT NULL DEFAULT '0' COMMENT '缩略图',
  `image_id` int(10) NOT NULL DEFAULT '0' COMMENT '大图片',
  `attach_id` int(10) NOT NULL DEFAULT '0' COMMENT '附件',
  `album_ids` text NOT NULL COMMENT '图片集',
  `attach_ids` text NOT NULL COMMENT '附件集',
  `link_type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '链接类型',
  `link_resource` varchar(250) NOT NULL DEFAULT '' COMMENT '链接资源',
  `summary` varchar(250) NOT NULL DEFAULT '' COMMENT '内容摘要',
  `content` text NOT NULL COMMENT '详细内容',
  `tag` varchar(250) NOT NULL DEFAULT '' COMMENT '标签',
  `remark` varchar(250) NOT NULL DEFAULT '' COMMENT '备注',
  `credit` int(10) NOT NULL DEFAULT '0' COMMENT '观看权限',
  `post_time` int(10) NOT NULL DEFAULT '0' COMMENT '发布时间',
  `add_time` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `update_time` int(10) NOT NULL DEFAULT '0' COMMENT '最近更新时间',
  `sort` int(10) NOT NULL DEFAULT '0' COMMENT '排序',
  `view` int(10) NOT NULL DEFAULT '0' COMMENT '浏览量',
  `top` tinyint(1) NOT NULL DEFAULT '0' COMMENT '顶置',
  `hot` tinyint(1) NOT NULL DEFAULT '0' COMMENT '热门',
  `digest` tinyint(1) NOT NULL DEFAULT '0' COMMENT '精华',
  `display` tinyint(1) NOT NULL DEFAULT '1' COMMENT '显示',
  `delete` tinyint(1) NOT NULL DEFAULT '0' COMMENT '删除',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10007 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='内容表'");
E_D("replace into `dna_content` values('10001','10001','0',0xe7acac31e69da1e6b5aae58f8be59c88e4bfa1e681afe6b58be8af95efbc81,'','','','0','','0','0','0','',0x31,'0','','',0xe7acac31e69da1e6b5aae58f8be59c88e4bfa1e681afe6b58be8af95efbc81,'','','0','0','1473153393','1473765402','0','0','0','0','0','1','0','0');");
E_D("replace into `dna_content` values('10002','10001','0',0xe7acac31e69da1e6b5aae58f8be59c88e4bfa1e681afe6b58be8af95efbc81,'','','','0','','0','0','0','','','0','','',0xe7acac4ee69da1e6b5aae58f8be59c88e4bfa1e681afe6b58be8af95efbc81,'','','0','0','1473153395','1473153395','0','0','0','0','0','1','0','0');");
E_D("replace into `dna_content` values('10003','10001','0',0xe7acac31e69da1e6b5aae58f8be59c88e4bfa1e681afe6b58be8af95efbc81,'','','','0','','0','0','0','','','0','','',0xe7acac4ee69da1e6b5aae58f8be59c88e4bfa1e681afe6b58be8af95efbc81,'','','0','0','1473153396','1473153396','0','0','0','0','0','1','0','0');");
E_D("replace into `dna_content` values('10004','10001','0',0xe7acac31e69da1e6b5aae58f8be59c88e4bfa1e681afe6b58be8af95efbc81,'','','','0','','0','0','0','','','0','','',0xe7acac4ee69da1e6b5aae58f8be59c88e4bfa1e681afe6b58be8af95efbc81,'','','0','0','1474453206','1474453206','0','0','0','0','0','1','0','0');");
E_D("replace into `dna_content` values('10005','10001','0',0xe7acac31e69da1e6b5aae58f8be59c88e4bfa1e681afe6b58be8af95efbc81,'','','','0','','0','0','0','','','0','','',0xe7acac4ee69da1e6b5aae58f8be59c88e4bfa1e681afe6b58be8af95efbc81,'','','0','0','1474512751','1474512751','0','0','0','0','0','1','0','0');");
E_D("replace into `dna_content` values('10006','10001','0',0xe7acac31e69da1e6b5aae58f8be59c88e4bfa1e681afe6b58be8af95efbc81,'','','','0','','0','0','0','','','0','','',0xe7acac4ee69da1e6b5aae58f8be59c88e4bfa1e681afe6b58be8af95efbc81,'','','0','0','1474512768','1474512768','0','0','0','0','0','1','0','0');");

require("../../inc/footer.php");
?>