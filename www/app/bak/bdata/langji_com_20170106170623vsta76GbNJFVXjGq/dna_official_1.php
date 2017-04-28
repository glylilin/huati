<?php
define('InEmpireBakData',TRUE);
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 5.1
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `dna_official`;");
E_C("CREATE TABLE `dna_official` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `account` varchar(250) NOT NULL DEFAULT '' COMMENT '账号',
  `nickname` varchar(250) NOT NULL DEFAULT '' COMMENT '昵称',
  `add_time` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `update_time` int(10) NOT NULL DEFAULT '0' COMMENT '最近更新时间',
  `display` tinyint(1) NOT NULL DEFAULT '1' COMMENT '显示',
  `delete` tinyint(1) NOT NULL DEFAULT '0' COMMENT '删除',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10226 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='官方微信表'");
E_D("replace into `dna_official` values('10001',0x7075616d6170353230,0xe6b5aae8bfb9353230,'1481962636','1482137113','1','1','0');");
E_D("replace into `dna_official` values('10002',0x74616e676e6979757169,0x74616e676e6979757169,'1482132372','1482137111','1','1','0');");
E_D("replace into `dna_official` values('10003',0x7075616d6170363738,'','1482132969','1482137108','1','1','0');");
E_D("replace into `dna_official` values('10004',0xe5b1b1e4b89ce4babae9a38ee6a0bce8aea9e5afb9e696b9,'','1482137104','1482137107','1','1','0');");
E_D("replace into `dna_official` values('10005',0x3132333132,'','1482137117','1482137122','1','1','0');");
E_D("replace into `dna_official` values('10006',0x7075616d6170383936,'','1482137131','1482137131','1','0','0');");
E_D("replace into `dna_official` values('10007',0x7075616d6170353630,'','1482137288','1482137288','1','0','0');");
E_D("replace into `dna_official` values('10008',0x7075616d6170373030,'','1482137297','1482137297','1','0','0');");
E_D("replace into `dna_official` values('10009',0x6c616e676a69353830,'','1482137305','1482137305','1','0','0');");
E_D("replace into `dna_official` values('10010',0x7075616d6170353230,'','1482137314','1482137314','1','0','0');");
E_D("replace into `dna_official` values('10011',0x7075616d6170353830,'','1482137323','1482137323','1','0','0');");
E_D("replace into `dna_official` values('10012',0x7075616d6170776179,'','1482137341','1482137341','1','0','0');");
E_D("replace into `dna_official` values('10013',0x7075616d6170393239,'','1482137349','1482137349','1','0','0');");
E_D("replace into `dna_official` values('10014',0x6c616e676a69383836,'','1482137359','1482137359','1','0','0');");
E_D("replace into `dna_official` values('10015',0x7075616d6170393036,'','1482137365','1482137365','1','0','0');");
E_D("replace into `dna_official` values('10016',0x6c616e676a69373138,'','1482137387','1482137387','1','0','0');");
E_D("replace into `dna_official` values('10017',0x637a7075616d6170,'','1482137393','1482137393','1','0','0');");
E_D("replace into `dna_official` values('10018',0x7075616d6170353130,'','1482137400','1482137400','1','0','0');");
E_D("replace into `dna_official` values('10019',0x6a69616f7a697075616d6170,'','1482137407','1482137407','1','0','0');");
E_D("replace into `dna_official` values('10020',0x7075616d6170353630,'','1482137483','1482137489','1','1','0');");
E_D("replace into `dna_official` values('10021',0x7075616d616f6867,'','1482137510','1482137510','1','0','0');");
E_D("replace into `dna_official` values('10022',0x7075616d6170353030,'','1482137526','1482137526','1','0','0');");
E_D("replace into `dna_official` values('10023',0x6c616e676a69383836,'','1482137538','1482137538','1','0','0');");
E_D("replace into `dna_official` values('10024',0x7075616d6170393036,'','1482137553','1482137553','1','0','0');");
E_D("replace into `dna_official` values('10025',0x6c616e676a69373138,'','1482137561','1482137561','1','0','0');");
E_D("replace into `dna_official` values('10026',0x7075616d617031353733,'','1482137584','1482137584','1','0','0');");
E_D("replace into `dna_official` values('10027',0x6c616e676a69353236,'','1482137594','1482137594','1','0','0');");
E_D("replace into `dna_official` values('10028',0x6c616e676a6979616f353230,'','1482137606','1482137606','1','0','0');");
E_D("replace into `dna_official` values('10029',0x7075616c616f746f6e67,'','1482137620','1482137620','1','0','0');");
E_D("replace into `dna_official` values('10030',0x7075616d6170323232,'','1482137626','1482137626','1','0','0');");
E_D("replace into `dna_official` values('10031',0x7075616d6170313233,'','1482137675','1482137675','1','0','0');");
E_D("replace into `dna_official` values('10032',0x7075616d6170353138,'','1482137685','1482137685','1','0','0');");
E_D("replace into `dna_official` values('10033',0x7075616d6170383838,'','1482137745','1482137745','1','0','0');");
E_D("replace into `dna_official` values('10034',0x7075616d6170323533,'','1482137753','1482137753','1','0','0');");
E_D("replace into `dna_official` values('10035',0x627279616e2d677863,'','1482137887','1482137887','1','0','0');");
E_D("replace into `dna_official` values('10036',0x7075616d6170363939,'','1482137897','1482137897','1','0','0');");
E_D("replace into `dna_official` values('10037',0x7075616d6170343037,'','1482137909','1482137909','1','0','0');");
E_D("replace into `dna_official` values('10038',0x7075616d6170333230,'','1482138446','1482138446','1','0','0');");
E_D("replace into `dna_official` values('10039',0x7075616d6170323131,'','1482138454','1482138454','1','0','0');");
E_D("replace into `dna_official` values('10040',0x7075616d61706c616f7775,'','1482138460','1482138460','1','0','0');");
E_D("replace into `dna_official` values('10041',0x7075616d6170343838,'','1482138474','1482138474','1','0','0');");
E_D("replace into `dna_official` values('10042',0x6c616e676a69333132,'','1482138481','1482138481','1','0','0');");
E_D("replace into `dna_official` values('10043',0x7075616d61703330343937,'','1482138488','1482138488','1','0','0');");
E_D("replace into `dna_official` values('10044',0x7075616d6170313638,'','1482138494','1482138494','1','0','0');");
E_D("replace into `dna_official` values('10045',0x6c616e676a69333930,'','1482138501','1482138501','1','0','0');");
E_D("replace into `dna_official` values('10046',0x6c616e676a69333033,'','1482138516','1482138516','1','0','0');");
E_D("replace into `dna_official` values('10047',0x412d4c656a6965,'','1482138522','1482138522','1','0','0');");
E_D("replace into `dna_official` values('10048',0x7075616d6170746f6e67,'','1482138539','1482138539','1','0','0');");
E_D("replace into `dna_official` values('10049',0x707561746f6e67,'','1482138546','1482138546','1','0','0');");
E_D("replace into `dna_official` values('10050',0x6c616e676a69333530,'','1482138552','1482138552','1','0','0');");
E_D("replace into `dna_official` values('10051',0x6c616e676a6962616d6569,'','1482138561','1482138561','1','0','0');");
E_D("replace into `dna_official` values('10052',0x7075616d6170383730,'','1482138570','1482138570','1','0','0');");
E_D("replace into `dna_official` values('10053',0x7075616d6170333330,'','1482138577','1482138577','1','0','0');");
E_D("replace into `dna_official` values('10054',0x7075616c616e677a69,'','1482138583','1482138583','1','0','0');");
E_D("replace into `dna_official` values('10055',0x7075616d6170353238,'','1482138591','1482138591','1','0','0');");
E_D("replace into `dna_official` values('10056',0x7075616d6170363639,'','1482138597','1482138597','1','0','0');");
E_D("replace into `dna_official` values('10057',0x7075616d6170363236,'','1482138606','1482138606','1','0','0');");
E_D("replace into `dna_official` values('10058',0x7075616d6170353232,'','1482138613','1482138613','1','0','0');");
E_D("replace into `dna_official` values('10059',0x7075616d6170343538,'','1482138619','1482138619','1','0','0');");
E_D("replace into `dna_official` values('10060',0x7075616d6170353330,'','1482138626','1482138626','1','0','0');");
E_D("replace into `dna_official` values('10061',0x7075616d6170393937,'','1482138636','1482138636','1','0','0');");
E_D("replace into `dna_official` values('10062',0x7075616d6170303939,'','1482138645','1482138645','1','0','0');");
E_D("replace into `dna_official` values('10063',0x7075616d6170383331,'','1482138652','1482138652','1','0','0');");
E_D("replace into `dna_official` values('10064',0x7075616d6170363237,'','1482138664','1482138664','1','0','0');");
E_D("replace into `dna_official` values('10065',0x7075616d6170313030,'','1482138674','1482138674','1','0','0');");
E_D("replace into `dna_official` values('10066',0x7075616d61706a7a,'','1482138680','1482138680','1','0','0');");
E_D("replace into `dna_official` values('10067',0x7075616d61706a69616f7a69,'','1482138687','1482138687','1','0','0');");
E_D("replace into `dna_official` values('10068',0x6c616e676a69373838,'','1482138693','1482138693','1','0','0');");
E_D("replace into `dna_official` values('10069',0x6c616e676a69373030,'','1482138701','1482138701','1','0','0');");
E_D("replace into `dna_official` values('10070',0x7075616d6170363536,'','1482138707','1482138707','1','0','0');");
E_D("replace into `dna_official` values('10071',0x6c616e676a69373437,'','1482138715','1482138715','1','0','0');");
E_D("replace into `dna_official` values('10072',0x7075616d6170383738,'','1482138722','1482138722','1','0','0');");
E_D("replace into `dna_official` values('10073',0x7075616d6170383738,'','1482138722','1482138729','1','1','0');");
E_D("replace into `dna_official` values('10074',0x7075616d6170343239,'','1482138736','1482138736','1','0','0');");
E_D("replace into `dna_official` values('10075',0x7075616d6170746f6e79,'','1482138748','1482138748','1','0','0');");
E_D("replace into `dna_official` values('10076',0x6c616e676a69373636,'','1482138756','1482138756','1','0','0');");
E_D("replace into `dna_official` values('10077',0x7075616d6170393130,'','1482138767','1482138767','1','0','0');");
E_D("replace into `dna_official` values('10078',0x6c616e676a69373939,'','1482138774','1482138774','1','0','0');");
E_D("replace into `dna_official` values('10079',0x6c616e676a69373635,'','1482138782','1482138782','1','0','0');");
E_D("replace into `dna_official` values('10080',0x6c616e676a69373131,'','1482138792','1482138792','1','0','0');");
E_D("replace into `dna_official` values('10081',0x7075616d6170313131,'','1482138802','1482138802','1','0','0');");
E_D("replace into `dna_official` values('10082',0x7075616d6170363536,'','1482138808','1482138808','1','0','0');");
E_D("replace into `dna_official` values('10083',0x707561627279616e5f,'','1482138815','1482138815','1','0','0');");
E_D("replace into `dna_official` values('10084',0x707561627279616e31,'','1482138821','1482138821','1','0','0');");
E_D("replace into `dna_official` values('10085',0x7768796c616e676a69,'','1482138829','1482138829','1','0','0');");
E_D("replace into `dna_official` values('10086',0x7075616d617039383736,'','1482138843','1482138843','1','0','0');");
E_D("replace into `dna_official` values('10087',0x7075616d6170303038,'','1482138851','1482138851','1','0','0');");
E_D("replace into `dna_official` values('10088',0x7075616d6170303737,'','1482138861','1482138861','1','0','0');");
E_D("replace into `dna_official` values('10089',0x7075616d617039353237,'','1482138867','1482138867','1','0','0');");
E_D("replace into `dna_official` values('10090',0x7075616d6170323636,'','1482138873','1482138873','1','0','0');");
E_D("replace into `dna_official` values('10091',0x6c616e676a69363737,'','1482138880','1482138880','1','0','0');");
E_D("replace into `dna_official` values('10092',0x6c616e676a69363738,'','1482138892','1482138892','1','0','0');");
E_D("replace into `dna_official` values('10093',0x7075616d6170363030,'','1482138899','1482138899','1','0','0');");
E_D("replace into `dna_official` values('10094',0x7075616a69616f7a6931393835,'','1482138922','1482138922','1','0','0');");
E_D("replace into `dna_official` values('10095',0x7075616d6170323135,'','1482138929','1482138929','1','0','0');");
E_D("replace into `dna_official` values('10096',0x7075616d6170323136,'','1482138940','1482138940','1','0','0');");
E_D("replace into `dna_official` values('10097',0x70756179616f353230,'','1482138946','1482138946','1','0','0');");
E_D("replace into `dna_official` values('10098',0x7075616d6170303037,'','1482138953','1482138953','1','0','0');");
E_D("replace into `dna_official` values('10099',0x6c616e676a69353331,'','1482138960','1482138960','1','0','0');");
E_D("replace into `dna_official` values('10100',0x7075612d6c7a,'','1482138970','1482138970','1','0','0');");
E_D("replace into `dna_official` values('10101',0x79616f686f6e67797530333132,'','1482138979','1482138979','1','0','0');");
E_D("replace into `dna_official` values('10102',0x6a69616d6569657231323035,'','1482138995','1482138995','1','0','0');");
E_D("replace into `dna_official` values('10103',0x6c616e676a69353130,'','1482139003','1482139003','1','0','0');");
E_D("replace into `dna_official` values('10104',0x6c616e676a69393431,'','1482139010','1482139010','1','0','0');");
E_D("replace into `dna_official` values('10105',0x7075616d6170323230,'','1482139019','1482139019','1','0','0');");
E_D("replace into `dna_official` values('10106',0x7075616d6170313639,'','1482139027','1482139027','1','0','0');");
E_D("replace into `dna_official` values('10107',0x7075612d746f6e67,'','1482139034','1482139034','1','0','0');");
E_D("replace into `dna_official` values('10108',0x7075616d61707966,'','1482139041','1482139041','1','0','0');");
E_D("replace into `dna_official` values('10109',0x7075616d61707979,'','1482139051','1482139051','1','0','0');");
E_D("replace into `dna_official` values('10110',0x6c616e676a69353536,'','1482139096','1482139096','1','0','0');");
E_D("replace into `dna_official` values('10111',0x7075616d61707966,'','1482139102','1482139102','1','0','0');");
E_D("replace into `dna_official` values('10112',0x7075616d61707979,'','1482139109','1482139117','1','1','0');");
E_D("replace into `dna_official` values('10113',0x6c616e676a69353536,'','1482139127','1482139127','1','0','0');");
E_D("replace into `dna_official` values('10114',0x6c616e676a69373831,'','1482139137','1482139137','1','0','0');");
E_D("replace into `dna_official` values('10115',0x7075616d61706673,'','1482139144','1482139144','1','0','0');");
E_D("replace into `dna_official` values('10116',0x79616f686f6e6779753331323032,'','1482139152','1482139152','1','0','0');");
E_D("replace into `dna_official` values('10117',0x7075616d6170303033,'','1482139161','1482139161','1','0','0');");
E_D("replace into `dna_official` values('10118',0x707561796879,'','1482139202','1482139202','1','0','0');");
E_D("replace into `dna_official` values('10119',0x6c616e676a69746f6e67383838,'','1482139210','1482139210','1','0','0');");
E_D("replace into `dna_official` values('10120',0x6c616e676a696a69616f7975776879,'','1482139217','1482139217','1','0','0');");
E_D("replace into `dna_official` values('10121',0x707561747a72,'','1482139227','1482139227','1','0','0');");
E_D("replace into `dna_official` values('10122',0x7075616d6170383232,'','1482139233','1482139233','1','0','0');");
E_D("replace into `dna_official` values('10123',0x6c616e676a69343630,'','1482139240','1482139240','1','0','0');");
E_D("replace into `dna_official` values('10124',0x6c616e676a69333330,'','1482139246','1482139246','1','0','0');");
E_D("replace into `dna_official` values('10125',0x7075616d6170353636,'','1482139256','1482139256','1','0','0');");
E_D("replace into `dna_official` values('10126',0x6c6c6f6c6c6f6c6c6f7973,'','1482139262','1482139262','1','0','0');");
E_D("replace into `dna_official` values('10127',0x7075616d6170353131,'','1482139273','1482139273','1','0','0');");
E_D("replace into `dna_official` values('10128',0x6c616e676a69776879,'','1482139280','1482139280','1','0','0');");
E_D("replace into `dna_official` values('10129',0x6c616e676a69363533,'','1482139286','1482139286','1','0','0');");
E_D("replace into `dna_official` values('10130',0x7075616d6170323134,'','1482139294','1482139294','1','0','0');");
E_D("replace into `dna_official` values('10131',0x7075616d6170323138,'','1482139301','1482139301','1','0','0');");
E_D("replace into `dna_official` values('10132',0x7075616d6170303035,'','1482139308','1482139308','1','0','0');");
E_D("replace into `dna_official` values('10133',0x6c616e676a69393436,'','1482139320','1482139320','1','0','0');");
E_D("replace into `dna_official` values('10134',0x6c616e676a69303130,'','1482139331','1482139331','1','0','0');");
E_D("replace into `dna_official` values('10135',0x6c616e676a69333031,'','1482139339','1482139339','1','0','0');");
E_D("replace into `dna_official` values('10136',0x746f6e677075617368,'','1482139347','1482139347','1','0','0');");
E_D("replace into `dna_official` values('10137',0x7075616d6170373737,'','1482139357','1482139357','1','0','0');");
E_D("replace into `dna_official` values('10138',0x4c7872313232322d,'','1482139365','1482139365','1','0','0');");
E_D("replace into `dna_official` values('10139',0x6c61736e676a69383939,'','1482139372','1482139372','1','0','0');");
E_D("replace into `dna_official` values('10140',0x7075616d6170383939,'','1482139380','1482139380','1','0','0');");
E_D("replace into `dna_official` values('10141',0x7075616d6170363635,'','1482139387','1482139387','1','0','0');");
E_D("replace into `dna_official` values('10142',0x7075616d6170736a,'','1482139393','1482139393','1','0','0');");
E_D("replace into `dna_official` values('10143',0x6a69616f7a69707561,'','1482139399','1482139399','1','0','0');");
E_D("replace into `dna_official` values('10144',0x7075616b65746968,'','1482139408','1482139408','1','0','0');");
E_D("replace into `dna_official` values('10145',0x7075616d6170637a,'','1482139414','1482139414','1','0','0');");
E_D("replace into `dna_official` values('10146',0x7075616d6170637a,'','1482139416','1482139422','1','1','0');");
E_D("replace into `dna_official` values('10147',0x7075616d6170637a,'','1482139423','1482139423','1','0','0');");
E_D("replace into `dna_official` values('10148',0x707561776879,'','1482139429','1482139429','1','0','0');");
E_D("replace into `dna_official` values('10149',0x7075616d617032303138,'','1482139436','1482139436','1','0','0');");
E_D("replace into `dna_official` values('10150',0x7075616d6170333630,'','1482139442','1482139442','1','0','0');");
E_D("replace into `dna_official` values('10151',0x7075616d61702d79616f,'','1482139450','1482139450','1','0','0');");
E_D("replace into `dna_official` values('10152',0x7075616d6170393837,'','1482139463','1482139463','1','0','0');");
E_D("replace into `dna_official` values('10153',0x7075616d617037373737,'','1482139470','1482139470','1','0','0');");
E_D("replace into `dna_official` values('10154',0x6c616e676a69363536,'','1482139497','1482139497','1','0','0');");
E_D("replace into `dna_official` values('10155',0x6c616e676a69363630,'','1482139506','1482139506','1','0','0');");
E_D("replace into `dna_official` values('10156',0x7075616d6170323130,'','1482139522','1482139522','1','0','0');");
E_D("replace into `dna_official` values('10157',0x7075616d617036373839,'','1482139528','1482139528','1','0','0');");
E_D("replace into `dna_official` values('10158',0x7075616d6170363738,'','1482139541','1482139541','1','0','0');");
E_D("replace into `dna_official` values('10159',0x746f6e67707561,'','1482139549','1482139549','1','0','0');");
E_D("replace into `dna_official` values('10160',0x7075616d6170383836,'','1482139556','1482139556','1','0','0');");
E_D("replace into `dna_official` values('10161',0x7075616d61706c616e677a69,'','1482139563','1482139563','1','0','0');");
E_D("replace into `dna_official` values('10162',0x7075616d6170303039,'','1482139577','1482139577','1','0','0');");
E_D("replace into `dna_official` values('10163',0x6c616e676a69333339,'','1482139585','1482139585','1','0','0');");
E_D("replace into `dna_official` values('10164',0x6c6c6f6c6c6f6c6c6f747a72,'','1482139595','1482139595','1','0','0');");
E_D("replace into `dna_official` values('10165',0x6c616e676a69353636,'','1482139609','1482139609','1','0','0');");
E_D("replace into `dna_official` values('10166',0x7075616d6170363431,'','1482139623','1482139623','1','0','0');");
E_D("replace into `dna_official` values('10167',0x707561686678,'','1482139631','1482139631','1','0','0');");
E_D("replace into `dna_official` values('10168',0x79616f686f6e677975333132,'','1482139639','1482139639','1','0','0');");
E_D("replace into `dna_official` values('10169',0x7075616d6170333334,'','1482139645','1482139645','1','0','0');");
E_D("replace into `dna_official` values('10170',0x7075616d6170333435,'','1482139654','1482139654','1','0','0');");
E_D("replace into `dna_official` values('10171',0x6c616e676a6930383036,0xe888b9e995bfe7ad94e79691e58fb7,'1482140223','1482140223','1','0','0');");
E_D("replace into `dna_official` values('10172',0x6c616e676a6935363738,0xe4b896e7958c,'1482140260','1482140260','1','0','0');");
E_D("replace into `dna_official` values('10173',0x6c616e676a696c616e677a6973,'','1482140960','1482140960','1','0','0');");
E_D("replace into `dna_official` values('10174',0x6c616e676a696c616e677a6979,'','1482140969','1482140969','1','0','0');");
E_D("replace into `dna_official` values('10175',0x7075616d61706c617a73,'','1482140976','1482140976','1','0','0');");
E_D("replace into `dna_official` values('10176',0x7075616d61706666,'','1482140984','1482140984','1','0','0');");
E_D("replace into `dna_official` values('10177',0x7075616d61706262,'','1482140993','1482140993','1','0','0');");
E_D("replace into `dna_official` values('10178',0x7075616d61707368,'','1482141004','1482141004','1','0','0');");
E_D("replace into `dna_official` values('10179',0x7075616d617073686f7568,'','1482141011','1482141011','1','0','0');");
E_D("replace into `dna_official` values('10180',0x7075616d6170736831,'','1482141017','1482141017','1','0','0');");
E_D("replace into `dna_official` values('10181',0x7075616d617073756368656e67,'','1482141211','1482141211','1','0','0');");
E_D("replace into `dna_official` values('10182',0x6769616e747669703031,'','1482141335','1482141340','1','1','0');");
E_D("replace into `dna_official` values('10183',0x6769616e747669703031,0xe58aa0e897a4e99d9e,'1482141351','1482141351','1','0','0');");
E_D("replace into `dna_official` values('10184',0x7075616d61706c77,'','1482141375','1482141375','1','0','0');");
E_D("replace into `dna_official` values('10185',0x7075616a69616e6169,'','1482141384','1482141384','1','0','0');");
E_D("replace into `dna_official` values('10186',0x707561627279616e32,'','1482141394','1482141394','1','0','0');");
E_D("replace into `dna_official` values('10187',0x7075616d617073756368656e67,'','1482141401','1482141406','1','1','0');");
E_D("replace into `dna_official` values('10188',0x797379313939347a7968,0xe9baa6e5ad90,'1482141548','1482141548','1','0','0');");
E_D("replace into `dna_official` values('10189',0x667265656c6966652d323133,0xe9baa6e5ad9032,'1482141563','1482141563','1','0','0');");
E_D("replace into `dna_official` values('10190',0x70756179616f766970,0xe5a4a7e5b0a7,'1482141914','1482141914','1','0','0');");
E_D("replace into `dna_official` values('10191',0x6c616e676a69313038,'','1482143228','1482143228','1','0','0');");
E_D("replace into `dna_official` values('10192',0x7075616d61707a706d,0xe998bfe59da4e7ad94e79691e58fb7,'1482150255','1482150255','1','0','0');");
E_D("replace into `dna_official` values('10193',0x6163717565343138,'','1482150283','1482150283','1','0','0');");
E_D("replace into `dna_official` values('10194',0x6163717565343137,0xe998bfe59da4564950,'1482150304','1482150304','1','0','0');");
E_D("replace into `dna_official` values('10195',0x78696875616e6e6930303639,'','1482230766','1482230766','1','0','0');");
E_D("replace into `dna_official` values('10196',0x6d7a3231333838,'','1482230777','1482230777','1','0','0');");
E_D("replace into `dna_official` values('10197',0x6d6f6e737465727a3030,'','1482230813','1482230813','1','0','0');");
E_D("replace into `dna_official` values('10198',0x616e67656c69616e393131,'','1482230830','1482230830','1','0','0');");
E_D("replace into `dna_official` values('10199',0x6c616e676a69363031,0xe6a281e8b685,'1482243012','1482243012','1','0','0');");
E_D("replace into `dna_official` values('10200',0x7075616d61707a736d,0xe69d8ee5ae81,'1482299358','1482299358','1','0','0');");
E_D("replace into `dna_official` values('10201',0x6c616e676a6973686f75686f75,'','1482303015','1482303015','1','0','0');");
E_D("replace into `dna_official` values('10202',0x78696875616e6e6930303639,'','1482303572','1482303599','1','1','0');");
E_D("replace into `dna_official` values('10203',0x6d7a3231333838,'','1482303585','1482303594','1','1','0');");
E_D("replace into `dna_official` values('10204',0x6c616e676a69353730,'','1482303931','1482303931','1','0','0');");
E_D("replace into `dna_official` values('10205',0x7075616d6170393138,'','1482303942','1482303942','1','0','0');");
E_D("replace into `dna_official` values('10206',0x6c616e676a69303535,'','1482303949','1482303949','1','0','0');");
E_D("replace into `dna_official` values('10207',0x6c616e676a69,'','1482303957','1482303963','1','1','0');");
E_D("replace into `dna_official` values('10208',0x6c616e676a69303838,'','1482303971','1482303971','1','0','0');");
E_D("replace into `dna_official` values('10209',0x707561686678,'','1482303983','1482303983','1','0','0');");
E_D("replace into `dna_official` values('10210',0x7075616a69616f7a69,'','1482326440','1482326440','1','0','0');");
E_D("replace into `dna_official` values('10211',0x6c616e676a69313039,'','1482910545','1482910545','1','0','0');");
E_D("replace into `dna_official` values('10212',0x6c616e676a69313034,'','1482910556','1482910556','1','0','0');");
E_D("replace into `dna_official` values('10213',0x6c616e676a69313036,'','1482910565','1482910565','1','0','0');");
E_D("replace into `dna_official` values('10214',0x6c616e676a69303336,'','1482910577','1482910577','1','0','0');");
E_D("replace into `dna_official` values('10215',0x6c616e676a69313037,'','1482910585','1482910585','1','0','0');");
E_D("replace into `dna_official` values('10216',0x6c616e676a69303132,'','1482910599','1482910599','1','0','0');");
E_D("replace into `dna_official` values('10217',0x6c616e676a69,'','1482910609','1482910612','1','1','0');");
E_D("replace into `dna_official` values('10218',0x6c616e676a69383336,'','1482910621','1482910621','1','0','0');");
E_D("replace into `dna_official` values('10219',0x6c616e676a69333037,'','1482914665','1482914665','1','0','0');");
E_D("replace into `dna_official` values('10220',0x6d7a3231333737,'','1483003398','1483003398','1','0','0');");
E_D("replace into `dna_official` values('10221',0x6d7a3231333636,'','1483003411','1483003411','1','0','0');");
E_D("replace into `dna_official` values('10222',0x6c616e676a69303132,'','1483449656','1483449656','1','0','0');");
E_D("replace into `dna_official` values('10223',0x6c616e676a69303336,'','1483449667','1483449667','1','0','0');");
E_D("replace into `dna_official` values('10224',0x6c616e676a69303638,'','1483449681','1483449681','1','0','0');");
E_D("replace into `dna_official` values('10225',0x6c616e676368616f6a6a,'','1483618139','1483618139','1','0','0');");

require("../../inc/footer.php");
?>