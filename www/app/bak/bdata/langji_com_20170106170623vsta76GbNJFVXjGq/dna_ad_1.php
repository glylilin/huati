<?php
define('InEmpireBakData',TRUE);
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 5.1
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `dna_ad`;");
E_C("CREATE TABLE `dna_ad` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `title` varchar(250) NOT NULL DEFAULT '' COMMENT '标题',
  `tree_id` int(10) NOT NULL DEFAULT '0' COMMENT '分类ID',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '类型',
  `color` varchar(250) NOT NULL DEFAULT '' COMMENT '颜色',
  `thumb_id` int(10) NOT NULL DEFAULT '0' COMMENT '缩略图',
  `image_id` int(10) NOT NULL DEFAULT '0' COMMENT '大图片',
  `attach_id` int(10) NOT NULL DEFAULT '0' COMMENT '附件',
  `album_ids` text NOT NULL COMMENT '图片集',
  `attach_ids` text NOT NULL COMMENT '附件集',
  `link_type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '链接类型',
  `link_resource` varchar(250) NOT NULL DEFAULT '' COMMENT '链接资源',
  `summary` text NOT NULL COMMENT '内容摘要',
  `content` text NOT NULL COMMENT '详细内容',
  `remark` varchar(250) NOT NULL DEFAULT '' COMMENT '备注',
  `add_time` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `update_time` int(10) NOT NULL DEFAULT '0' COMMENT '最近更新时间',
  `sort` int(10) NOT NULL DEFAULT '0' COMMENT '排序',
  `view` int(10) NOT NULL DEFAULT '0' COMMENT '浏览量',
  `display` tinyint(1) NOT NULL DEFAULT '1' COMMENT '显示',
  `delete` tinyint(1) NOT NULL DEFAULT '0' COMMENT '删除',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10024 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='广告表'");
E_D("replace into `dna_ad` values('10001',0xe8afbee7a88be9a1b6e983a8e5b9bfe5918a3031,'0','1','','0','10001','0','','','2',0x31,'','','','1474888244','1478593745','0','0','1','1','0');");
E_D("replace into `dna_ad` values('10002',0xe8afbee7a88be9a1b6e983a8e5b9bfe5918a3032,'0','1','','0','10001','0','','','2',0x31,'','','','1474888258','1478593748','0','0','1','1','0');");
E_D("replace into `dna_ad` values('10003',0xe6ada3e58689e8a385e980bce8afbe,'0','2','','0','14423','0','','','22',0x3130303139,'','','','1474888261','1478621318','0','0','1','1','0');");
E_D("replace into `dna_ad` values('10004',0xe89389e59f8ee8aea1e5889237e5a4a9e78988,'0','2','','0','25735','0','','','26',0x3130303237,'','','','1475206673','1481689427','9','0','1','0','0');");
E_D("replace into `dna_ad` values('10005',0xe585a8e68998,'0','2','','0','25736','0','','','22',0x3130303232,'','','','1475206703','1481689363','11','0','1','0','0');");
E_D("replace into `dna_ad` values('10006',0xe8afbee7a88be9a1b6e983a8e5b9bfe5918a3031,'0','2','','0','10001','0','','','2',0x31,'','','','1475206713','1475206713','0','0','1','1','0');");
E_D("replace into `dna_ad` values('10007',0xe982a3e4ba9be5b9b4efbc8ce68891e68ea8e58092e8bf87e79a84e4b880e5afb9e997bae89c9c,'0','1','','0','39227','0','','','13',0x3132313936,'','','','1475206879','1483521074','7','0','1','0','0');");
E_D("replace into `dna_ad` values('10008',0xe5a5b9e698afe594afe4b880e4b880e4b8aae68891e683b3e68cbde59b9ee79a84e5a5b3e4baba,'0','1','','0','40131','0','','','13',0x3132323934,'','','','1475207695','1483521092','6','0','1','0','0');");
E_D("replace into `dna_ad` values('10009',0xe8afbee7a88be9a1b6e983a8e5b9bfe5918a3032,'0','2','','0','10001','0','','','2',0x31,'','','','1475207710','1475207710','0','0','1','1','0');");
E_D("replace into `dna_ad` values('10010',0xe5bc95e5afbce9a1b533,'0','3','','0','15468','0','','','21','','','','','1478541458','1478883813','0','0','1','1','0');");
E_D("replace into `dna_ad` values('10011',0xe5bc95e5afbce9a1b532,'0','3','','0','15469','0','','','22',0x3130303235,'','','','1478541518','1478883818','0','0','1','1','0');");
E_D("replace into `dna_ad` values('10012',0xe5bc95e5afbce9a1b531,'0','3','','0','27729','0','','','0','','','','','1478541551','1479555127','1','0','1','0','0');");
E_D("replace into `dna_ad` values('10013',0xe6b5aae8bfb9e69599e882b2415050e696b0e78988e69cace4b88ae7babfe595a6efbc81,'0','1','','0','37422','0','','','61',0x687474703a2f2f612e6170702e71712e636f6d2f6f2f73696d706c652e6a73703f706b676e616d653d636f6d2e6a7274633136382e7777772e6c6a6a79,'','','','1478615591','1482306239','4','0','1','1','1');");
E_D("replace into `dna_ad` values('10014',0xe5a5b9e8bf9be4ba86e68891e79a84e5b180efbc8ce68891e68ea5e4ba86e5a5b9e79a84e5a597,'0','1','','0','40902','0','','','13',0x3132333131,'','','','1478626863','1483521083','5','0','1','0','0');");
E_D("replace into `dna_ad` values('10015',0xe6818be788b1e9809fe68890e78fad,'0','2','','0','36117','0','','','24',0x3130313338,'','','','1478627552','1482038540','8','0','1','1','0');");
E_D("replace into `dna_ad` values('10016',0xe6818be788b1e9ad94e696b9,'0','2','','0','25744','0','','','21',0x3130303235,'','','','1478627758','1481689409','10','0','1','0','0');");
E_D("replace into `dna_ad` values('10017',0xe5bc95e5afbce9a1b532,'0','3','','0','27730','0','','','0','','','','','1478884693','1479555143','2','0','1','0','0');");
E_D("replace into `dna_ad` values('10018',0xe5bc95e5afbce9a1b533,'0','3','','0','29534','0','','','0','','','','','1478884708','1479894763','3','0','1','0','0');");
E_D("replace into `dna_ad` values('10019',0xe590afe58aa8e5b9bfe5918a31,'0','4','','0','0','0','','','0','','','','','1481950069','1481950263','0','0','1','1','0');");
E_D("replace into `dna_ad` values('10020',0xe590afe58aa8e9a1b5e5b9bfe5918a31,'0','4','','0','37099','0','','','0','','','','','1481981991','1482071773','0','0','1','1','0');");
E_D("replace into `dna_ad` values('10021',0xe6818be788b1e9809fe68890e78fad,'0','2','','0','36953','0','','','24',0x3130313338,'','','','1482038503','1483437891','8','0','0','0','0');");
E_D("replace into `dna_ad` values('10022',0xe590afe58aa8e9a1b5e5b9bfe5918a,'0','4','','0','39252','0','','','0','','','','','1482071824','1483553576','0','0','0','0','0');");
E_D("replace into `dna_ad` values('10023',0xe6b5aae8bfb9e69599e882b2415050e696b0e78988e69cace4b88ae7babfe595a6efbc81,'0','1','','0','38852','0','','','61',0x687474703a2f2f612e6170702e71712e636f6d2f6f2f73696d706c652e6a73703f706b676e616d653d636f6d2e6a7274633136382e7777772e6c6a6a79,'','','','1482306266','1483623518','4','0','1','0','0');");

require("../../inc/footer.php");
?>