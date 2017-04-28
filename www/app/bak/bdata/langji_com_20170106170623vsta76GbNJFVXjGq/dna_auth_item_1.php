<?php
define('InEmpireBakData',TRUE);
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 5.1
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `dna_auth_item`;");
E_C("CREATE TABLE `dna_auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC");
E_D("replace into `dna_auth_item` values(0x31,'2',0xe5908ee58fb0,NULL,NULL,'1469777791','1471834586');");
E_D("replace into `dna_auth_item` values(0x3130,'2',0xe696b0e5a29ee5b9bfe5918a,NULL,NULL,'1469777791','1471834586');");
E_D("replace into `dna_auth_item` values(0x3131,'2',0xe4bfaee694b9e5b9bfe5918a,NULL,NULL,'1469777791','1471834586');");
E_D("replace into `dna_auth_item` values(0x3132,'2',0xe588a0e999a4e5b9bfe5918a,NULL,NULL,'1469777791','1471834586');");
E_D("replace into `dna_auth_item` values(0x3133,'2',0xe696b0e5a29ee9858de7bdae,NULL,NULL,'1469777791','1471834586');");
E_D("replace into `dna_auth_item` values(0x3134,'2',0xe4bfaee694b9e9858de7bdae,NULL,NULL,'1469777791','1471834586');");
E_D("replace into `dna_auth_item` values(0x3135,'2',0xe588a0e999a4e9858de7bdae,NULL,NULL,'1469777791','1471834586');");
E_D("replace into `dna_auth_item` values(0x3136,'2',0xe696b0e5a29ee4b8bbe9a298,NULL,NULL,'1469777791','1471834586');");
E_D("replace into `dna_auth_item` values(0x3137,'2',0xe4bfaee694b9e4b8bbe9a298,NULL,NULL,'1469778559','1471834586');");
E_D("replace into `dna_auth_item` values(0x3138,'2',0xe79baee5bd95e6a091,NULL,NULL,'1469777791','1471834586');");
E_D("replace into `dna_auth_item` values(0x3139,'2',0xe8bf90e890a5,NULL,NULL,'1469777791','1471834586');");
E_D("replace into `dna_auth_item` values(0x32,'2',0xe68ea7e588b6e58fb0,NULL,NULL,'1469777791','1471834586');");
E_D("replace into `dna_auth_item` values(0x3230,'2',0xe5b9bfe5918ae7aea1e79086,NULL,NULL,'1469777791','1471834586');");
E_D("replace into `dna_auth_item` values(0x3231,'2',0xe58f8be68385e993bee68ea5,NULL,NULL,'1469777791','1471834586');");
E_D("replace into `dna_auth_item` values(0x3232,'2',0xe696b0e5a29ee58f8be68385e993bee68ea5,NULL,NULL,'1469777791','1471834586');");
E_D("replace into `dna_auth_item` values(0x3233,'2',0xe4bfaee694b9e58f8be68385e993bee68ea5,NULL,NULL,'1469777791','1471834586');");
E_D("replace into `dna_auth_item` values(0x3234,'2',0xe588a0e999a4e58f8be68385e993bee68ea5,NULL,NULL,'1469777791','1471834586');");
E_D("replace into `dna_auth_item` values(0x3235,'2',0xe794a8e688b7e58897e8a1a8,NULL,NULL,'1469777791','1471834586');");
E_D("replace into `dna_auth_item` values(0x3236,'2',0xe8a792e889b2e58897e8a1a8,NULL,NULL,'1469777791','1471834586');");
E_D("replace into `dna_auth_item` values(0x3237,'2',0xe696b0e5bbbae8a792e889b2,NULL,NULL,'1469777791','1471834586');");
E_D("replace into `dna_auth_item` values(0x3238,'2',0xe4bfaee694b9e8a792e889b2,NULL,NULL,'1469777791','1471834586');");
E_D("replace into `dna_auth_item` values(0x3239,'2',0xe5beaee4bfa1e794a8e688b7,NULL,NULL,'1469777791','1471834586');");
E_D("replace into `dna_auth_item` values(0x33,'2',0xe794a8e688b7e7aea1e79086,NULL,NULL,'1469777791','1471834586');");
E_D("replace into `dna_auth_item` values(0x3330,'2',0xe5898de58fb0,NULL,NULL,'1469784808','1471834586');");
E_D("replace into `dna_auth_item` values(0x3331,'2',0xe5bd95e99fb3e7aea1e79086,NULL,NULL,'1470026708','1471834586');");
E_D("replace into `dna_auth_item` values(0x3332,'2',0xe5bd95e99fb3e58897e8a1a8,NULL,NULL,'1470026708','1471834586');");
E_D("replace into `dna_auth_item` values(0x3333,'2',0xe7bb88e7abafe7aea1e79086,NULL,NULL,'1470026708','1471834586');");
E_D("replace into `dna_auth_item` values(0x3334,'2',0xe7bb88e7abafe58897e8a1a8,NULL,NULL,'1470026708','1471834586');");
E_D("replace into `dna_auth_item` values(0x3335,'2',0xe59cbae68980e7aea1e79086,NULL,NULL,'1470387051','1471834586');");
E_D("replace into `dna_auth_item` values(0x3336,'2',0xe59cbae68980e58897e8a1a8,NULL,NULL,'1470387051','1471834586');");
E_D("replace into `dna_auth_item` values(0x3337,'2',0xe696b0e5a29ee59cbae68980,NULL,NULL,'1470387051','1471834586');");
E_D("replace into `dna_auth_item` values(0x3338,'2',0xe4bfaee694b9e59cbae68980,NULL,NULL,'1470387051','1471834586');");
E_D("replace into `dna_auth_item` values(0x3339,'2',0xe588a0e999a4e59cbae68980,NULL,NULL,'1470387051','1471834586');");
E_D("replace into `dna_auth_item` values(0x34,'2',0xe5afbce888aae7aea1e79086,NULL,NULL,'1469777791','1471834586');");
E_D("replace into `dna_auth_item` values(0x3430,'2',0xe69fa5e79c8be59cbae68980,NULL,NULL,'1470387051','1471834586');");
E_D("replace into `dna_auth_item` values(0x3431,'2',0xe9a284e8a788e5bd95e99fb3,NULL,NULL,'1470387051','1471834586');");
E_D("replace into `dna_auth_item` values(0x3432,'2',0xe588a0e999a4e5bd95e99fb3,NULL,NULL,'1470387051','1471834586');");
E_D("replace into `dna_auth_item` values(0x3433,'2',0xe7a7afe588862fe7bb8fe9aa8c,NULL,NULL,'1470387051','1471834586');");
E_D("replace into `dna_auth_item` values(0x3434,'2',0xe7a7afe588862fe7bb8fe9aa8ce58897e8a1a8,NULL,NULL,'1470387051','1471834586');");
E_D("replace into `dna_auth_item` values(0x3435,'2',0xe8aea2e58d95e7aea1e79086,NULL,NULL,'1470387051','1471834586');");
E_D("replace into `dna_auth_item` values(0x3436,'2',0xe58f8de9a688,NULL,NULL,'1470387051','1471834586');");
E_D("replace into `dna_auth_item` values(0x3437,'2',0xe4bc98e683a0e58ab5,NULL,NULL,'1470387051','1471834586');");
E_D("replace into `dna_auth_item` values(0x3438,'2',0xe4bc98e683a0e588b8e58897e8a1a8,NULL,NULL,'1470387051','1471834586');");
E_D("replace into `dna_auth_item` values(0x3439,'2',0xe8aea2e58d95e58897e8a1a8,NULL,NULL,'1470387051','1471834586');");
E_D("replace into `dna_auth_item` values(0x35,'2',0xe5afbce888aae58897e8a1a8,NULL,NULL,'1469777791','1471834586');");
E_D("replace into `dna_auth_item` values(0x3530,'2',0xe98080e6acbee8aea2e58d95,NULL,NULL,'1470387051','1471834586');");
E_D("replace into `dna_auth_item` values(0x3531,'2',0xe58f8de9a688e58897e8a1a8,NULL,NULL,'1470387051','1471834586');");
E_D("replace into `dna_auth_item` values(0x3532,'2',0xe9a284e8a788e58f8de9a688,NULL,NULL,'1470387051','1471834586');");
E_D("replace into `dna_auth_item` values(0x3533,'2',0xe5a484e79086e58f8de9a688,NULL,NULL,'1470387051','1471834586');");
E_D("replace into `dna_auth_item` values(0x3534,'2',0xe588a0e999a4e58f8de9a688,NULL,NULL,'1470387051','1471834586');");
E_D("replace into `dna_auth_item` values(0x3535,'2',0xe4bbb7e6a0bce7aea1e79086,NULL,NULL,'1470387051','1471834586');");
E_D("replace into `dna_auth_item` values(0x3536,'2',0xe696b0e5bbbae4bbb7e6a0bc,NULL,NULL,'1470387051','1471834586');");
E_D("replace into `dna_auth_item` values(0x3537,'2',0xe4bbb7e6a0bce58897e8a1a8,NULL,NULL,'1470387051','1471834586');");
E_D("replace into `dna_auth_item` values(0x3538,'2',0xe4bfaee694b9e4bbb7e6a0bc,NULL,NULL,'1470387051','1471834586');");
E_D("replace into `dna_auth_item` values(0x3539,'2',0xe588a0e999a4e4bbb7e6a0bc,NULL,NULL,'1470387051','1471834586');");
E_D("replace into `dna_auth_item` values(0x36,'2',0xe8aebee7bdae,NULL,NULL,'1469777791','1471834586');");
E_D("replace into `dna_auth_item` values(0x3630,'2',0xe7a7afe58886e8afa6e68385,NULL,NULL,'1470387051','1471834586');");
E_D("replace into `dna_auth_item` values(0x3631,'2',0xe7b4a0e69d90e7aea1e79086,NULL,NULL,'1470466967','1471834586');");
E_D("replace into `dna_auth_item` values(0x3632,'2',0xe7b4a0e69d90e58897e8a1a8,NULL,NULL,'1470466967','1471834586');");
E_D("replace into `dna_auth_item` values(0x3633,'2',0xe4b88ae4bca0e7b4a0e69d90,NULL,NULL,'1470466967','1471834586');");
E_D("replace into `dna_auth_item` values(0x3634,'2',0xe69bbfe68da2e7b4a0e69d90,NULL,NULL,'1470466967','1471834586');");
E_D("replace into `dna_auth_item` values(0x3635,'2',0xe588a0e999a4e7b4a0e69d90,NULL,NULL,'1470466967','1471834586');");
E_D("replace into `dna_auth_item` values(0x3636,'2',0xe794a8e688b7e9858de7bdae,NULL,NULL,'1470645216','1471834586');");
E_D("replace into `dna_auth_item` values(0x3637,'2',0xe696b0e5a29ee794a8e688b7e9858de7bdae,NULL,NULL,'1470645216','1471834586');");
E_D("replace into `dna_auth_item` values(0x3639,'2',0xe4bfaee694b9e794a8e688b7e9858de7bdae,NULL,NULL,'1470645216','1471834586');");
E_D("replace into `dna_auth_item` values(0x37,'2',0xe7b3bbe7bb9fe9858de7bdae,NULL,NULL,'1469777791','1471834586');");
E_D("replace into `dna_auth_item` values(0x3730,'2',0xe588a0e999a4e794a8e688b7e9858de7bdae,NULL,NULL,'1470645216','1471834586');");
E_D("replace into `dna_auth_item` values(0x38,'2',0xe6b885e79086e7bc93e5ad98,NULL,NULL,'1469777791','1471834586');");
E_D("replace into `dna_auth_item` values(0x39,'2',0xe4b8bbe9a298e8aebee7bdae,NULL,NULL,'1469777791','1471834586');");
E_D("replace into `dna_auth_item` values(0x61646d696e6973747261746f72,'1',0xe8b685e7baa7e7aea1e79086e59198,NULL,NULL,'1469789027','1469789303');");
E_D("replace into `dna_auth_item` values(0x706572736f6e,'1',0xe4b8aae4babae794a8e688b7,NULL,NULL,'1470017679','1470017679');");

require("../../inc/footer.php");
?>