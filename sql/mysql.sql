-- Tabulky ------------------------------------------------

CREATE TABLE `prohlaseni` (
  `id` int(1) NOT NULL ,
  `header` text,
  `text` text,
  `dat` varchar(10),
	`html` varchar(1) NOT NULL default '0',
	`smiley` varchar(1) NOT NULL default '1',
	`xcodes` varchar(1) NOT NULL default '1',
	`breaks` varchar(1) NOT NULL default '1',
	`images` varchar(1) NOT NULL default '1',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

-- Naplneni tabulek daty ----------------------------------

INSERT INTO `prohlaseni` VALUES ('1' ,'header','text', '0','1','1','1','1','1');