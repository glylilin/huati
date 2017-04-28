<?php
define('InEmpireBakData',TRUE);
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 5.1
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `dna_tag`;");
E_C("CREATE TABLE `dna_tag` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `tag` varchar(250) NOT NULL DEFAULT '' COMMENT '标签',
  `remark` varchar(250) NOT NULL DEFAULT '' COMMENT '备注',
  `sort` int(10) NOT NULL DEFAULT '0' COMMENT '排序',
  `display` tinyint(1) NOT NULL DEFAULT '1' COMMENT '显示',
  `delete` tinyint(1) NOT NULL DEFAULT '0' COMMENT '删除',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10145 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='标签表'");
E_D("replace into `dna_tag` values('10001',0xe5b885e593a5,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10002',0xe7be8ee5a5b3,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10003',0xe8908ce8908ce59392,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10004',0xe68993e58e8b,'','0','1','0','1');");
E_D("replace into `dna_tag` values('10005',0xe5839ae69cba,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10006',0xe9a284e98089,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10007',0xe4b889e7a792e6b395e58899,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10008',0xe58f8de88da1e5a687e69cbae588b6,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10009',0x505541,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10010',0xe5b7abe5aeb6e6b091,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10011',0x414643,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10012',0xe5ba9fe789a9e6b58be8af95,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10013',0xe69c8de4bb8ee680a7e6b58be8af954354,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10014',0xe995bfe69c9fe585b3e7b3bb,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10015',0x444856,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10016',0xe88194e7b3bbe6849fe5bc80e585b3,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10017',0xe590b8e5bc95e58a9b,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10018',0x37e5b08fe697b6e6b395e58899,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10019',0xe68cbde59b9ee78b99e587bb,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10020',0xe89389e59f8ee5ae9ee68898e68a8ae5a6b9,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10021',0xe88081e590b4e7b2bee98089,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10022',0xe8a385e980bce69c89e98193,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10023',0xe79fade69c9fe585b3e7b3bb,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10024',0xe88081e4bd9fe7b2bee98089,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10025',0xe585a5e4bc9ae5bf85e4bfae,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10026',0xe585a5e4bc9ae5bf85e4bfae,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10027',0xe5ae9ee68898e9809fe68890,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10028',0xe5ae9ee68898e58aa0e5bcba,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10029',0xe68c91e68898e58d87e7baa7,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10030',0xe68c91e68898e58d87e7baa7,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10031',0xe88da3e8aa89e4b98be68898,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10032',0xe5a4a7e98193e887b3e7ae80,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10033',0xe788b1e68385e7aea1e5aeb6,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10034',0xe7a781e4babae5ae9ae588b6,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10035',0xe6b5aae8bfb9e69cace5b08a,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10036',0xe9a5bae5ad90e69cace5b08a,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10037',0xe689bfe68385e69cace5b08a,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10038',0xe7a59ee7baa7e68c87e5afbc,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10039',0xe7b2bee88bb1e5afbce5b888,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10040',0x54443530302b,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10041',0x54443330302b,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10042',0x54443133302b,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10043',0x544439302b,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10044',0xe799bde5af8ce7be8ee69d80e6898b,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10045',0x54443130302b,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10046',0x544435302b,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10047',0x544439392b,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10048',0x415050,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10049',0xe68a8ae5a6b9e59cb0e59bbe,'','1','1','0','0');");
E_D("replace into `dna_tag` values('10050',0x544438302b,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10051',0x54443130322b,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10052',0x544434302b,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10053',0x54443134302b,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10054',0x54443135302b,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10055',0x544438362b,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10056',0x54443136302b,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10057',0x544437302b,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10058',0x54443230302b,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10059',0x5444204e2b,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10060',0x544431362b,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10061',0x544436322b,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10062',0x544434372b,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10063',0xe6b5aae5ad90,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10064',0xe6b5aae8bfb9e690ade8aeaae7a780,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10065',0xe6b5aae8bfb9,'','1','1','0','0');");
E_D("replace into `dna_tag` values('10066',0xe9a5bae5ad90,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10067',0xe689bfe68385e4b8bbe8aeb2,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10068',0xe5a4a7e5b0a7,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10069',0xe88081e4bd9f,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10070',0xe88081e590b4e4b8bbe8aeb2,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10071',0xe888b9e995bfe4b8bbe8aeb2,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10072',0xe794b0e6ada3e58689e4b8bbe8aeb2,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10073',0xe6b5aae5ad90e4b8bbe8aeb2,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10074',0x546f6e79e4b8bbe8aeb2,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10075',0xe998bfe58d93e4b8bbe8aeb2,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10076',0xe58aa0e897a4e99d9ee4b8bbe8aeb2,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10077',0xe998bfe59da4e4b8bbe8aeb2,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10078',0xe5a4a7e58f94e4b8bbe8aeb2,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10079',0xe4b896e7958c,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10080',0xe6b5b7e59da4e4b8bbe8aeb2,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10081',0xe5bca0e4b9a6e8b1aae4b8bbe8aeb2,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10082',0xe5b08fe8b4b4e5a3ab,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10083',0xe590b4e5858be7bea4e4b8bbe8aeb2,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10084',0xe6b19fe6b996e4b8bbe8aeb2,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10085',0xe78e8be7919ee4b8bbe8aeb2,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10086',0xe6b5b7e7a59e,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10087',0xe689bfe68385,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10088',0xe58898e6bd87e6b492,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10089',0xe78bb1e995bfe4b8bbe8aeb2,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10090',0xe5ad90e8b1aae4b8bbe8aeb2,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10091',0xe6838ae4ba91,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10092',0xe69fb3e5b2b8,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10093',0xe4bd90e7bd97e4b8bbe8aeb2,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10094',0xe5908ce69e97e4b8bbe8aeb2,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10095',0xe5ad99e5ae87e4b8bbe8aeb2,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10096',0x4354e4b8bbe8aeb2,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10097',0xe5b7a6e998b3e4b8bbe8aeb2,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10098',0xe697a0e6958ce4b8bbe8aeb2,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10099',0xe58aa0e897a4e99d9e,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10100',0xe68a8ae5a6b9e5bf85e4bfae,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10101',0xe9baa6e5ad90,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10102',0xe998bfe59da4,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10103',0x382e30,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10104',0x382e30e58685e983a8e8afbe,'','1','1','0','0');");
E_D("replace into `dna_tag` values('10105',0x6374,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10106',0xe5bca0e4b9a6e8b1aa,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10107',0xe590b4e5858be7bea3,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10108',0xe5ad99e5ae87,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10109',0xe5908ce69e97,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10110',0xe5a4a7e58f94,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10111',0xe4bd90e7bd97,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10112',0xe5ad90e8b1aa,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10113',0xe888b9e995bf,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10114',0xe78bb1e995bf20,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10115',0xe998bfe58d93,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10116',0x546f6e79,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10117',0xe6b19fe6b996,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10118',0xe78e8be7919e,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10119',0xe88081e590b4,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10120',0x372e30e58685e983a8e8afbe,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10121',0xe68890e4b8bae4bc9ae59198,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10122',0x362e30e58685e983a8e8afbe,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10123',0x342e30e58685e983a8e8afbe,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10124',0xe7baa6e98193,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10125',0xe88081e5ada6e59198e4b893e58cba,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10126',0xe794b0e6ada3e58689,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10127',0xe6b5aae8bfb9e69599e882b2e585a8e4bd93e5afbce5b888,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10128',0xe6b5aae8bfb9e4b880e58886e9929f,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10129',0xe58f8c3131e69c80e5a4a7e7a68fe588a9,'','1','1','0','0');");
E_D("replace into `dna_tag` values('10130',0xe69c80e585a8e5afbce5b888,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10131',0xe58f8c3131,'','1','1','0','0');");
E_D("replace into `dna_tag` values('10132',0xe697a0e6958c,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10133',0xe7b2bee59381e8afbee4b893e58cba,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10134',0xe689bfe68385e7b2bee98089,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10135',0xe6999ae9a490e588b8,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10136',0xe6818be788b1e9809fe68890e78fad,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10137',0xe585a8e6988ee6989fe58886e4baabe4bc9a,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10138',0xe5ae9ee68898,'','1','1','0','0');");
E_D("replace into `dna_tag` values('10139',0xe79086e8aeba,'','1','1','0','0');");
E_D("replace into `dna_tag` values('10140',0xe4b893e6a08f,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10141',0xe4b893e9a298,'','1','1','0','0');");
E_D("replace into `dna_tag` values('10142',0xe680a7e788b1,'','1','1','0','0');");
E_D("replace into `dna_tag` values('10143',0xe6b3a1e5a69ee8afbee5a082,'','0','1','0','0');");
E_D("replace into `dna_tag` values('10144',0xe68cbde59b9e,'','1','1','0','0');");

require("../../inc/footer.php");
?>