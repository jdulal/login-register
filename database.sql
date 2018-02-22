CREATE TABLE `tblusers` (
	`uid` INT(11) NOT NULL AUTO_INCREMENT,
	`username` VARCHAR(20) NULL DEFAULT NULL COLLATE 'utf8_unicode_ci',
	`userpassword` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8_unicode_ci',
	`useremail` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8_unicode_ci',
	`usercontact` VARCHAR(15) NULL DEFAULT NULL COLLATE 'utf8_unicode_ci',
	`userregdate` DATETIME NULL DEFAULT NULL,
	PRIMARY KEY (`uid`)
)
COLLATE='utf8_unicode_ci'
ENGINE=InnoDB
;
