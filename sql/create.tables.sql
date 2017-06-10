--
--
--
DROP TABLE IF EXISTS `band`;

CREATE TABLE `band`(
	`id`			mediumint AUTO_INCREMENT NOT NULL,
	`start_date`	varchar(20) NOT NULL,
	`website`		varchar(999) NOT NULL,
	`still_active`	tinyint(1) DEFAULT '1',
	PRIMARY KEY(id)
) Engine=InnoDb;


-- 
DROP TABLE IF EXISTS `album`;

CREATE TABLE `album`(
	`id`			 mediumint AUTO_INCREMENT NOT NULL,
	`band_id`		 mediumint NOT NULL, 
	`name`			 varchar(250), 
	`recorded_date`  datetime NOT NULL,
	`release_date`	 datetime NOT NULL,
	`numberoftracks` int DEFAULT '0',
	`label`			 varchar(500) NOT NULL, 
	`producer`		 varchar(250) NOT NULL,
	`genre`			 varchar(100) NOT NULL,
	PRIMARY KEY(id)
) Engine=InnoDb;
