CREATE TABLE IF NOT EXISTS `subject` 
(
	`subId` 			INT UNSIGNED		NOT NULL	AUTO_INCREMENT,
	`subName`		   	VARCHAR(255) 		NOT NULL,
	`subPhase`			ENUM('FET', 'GET')	NOT NULL,
	`subLogAdded`		TIMESTAMP 	 		DEFAULT 	CURRENT_TIMESTAMP,
	`subLogModified`	TIMESTAMP 	 		NULL,
	`subLogRemoved`		TIMESTAMP 	 		NULL,
	 PRIMARY KEY `pk_subId` (`subId`)
) ENGINE = InnoDB;