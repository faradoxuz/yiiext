CREATE TABLE IF NOT EXISTS `eavAttr` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `entity` bigint(20) unsigned NOT NULL,
  `attribute` varchar(250) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ikEntity` (`entity`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;