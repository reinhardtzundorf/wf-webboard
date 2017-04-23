CREATE DATABASE IF NOT EXISTS `ctc_mainWebDb`;
USE `ctc_mainWebDb`;

-- member table
CREATE TABLE IF NOT EXISTS `member` 
(
	`memId` 				INT(11) 	 	NOT NULL 		AUTO_INCREMENT,
	`memEmail`	   			VARCHAR(255)	NOT NULL,
	`memPassword`   		VARCHAR(255)	NOT NULL,
	`memFirstname`			VARCHAR(255)	NULL,
	`memLastname`			VARCHAR(255)	NULL,
	`memActive`     		VARCHAR(255) 	DEFAULT 		'NO',
	`memResetToken`   		VARCHAR(255) 	NULL,
	`memResetComplete`		VARCHAR(3)   	DEFAULT 		'NO',
	`memLogAdded`			TIMESTAMP 	 	DEFAULT 		CURRENT_TIMESTAMP,
	`memLogModified`		TIMESTAMP 	 	NULL,
	`memLogRemoved`			TIMESTAMP 	 	NULL,
	 PRIMARY KEY `pk_memId` (`memId`)
) ENGINE = InnoDB;
-- 

-- subject table
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
-- 

-- policy table
CREATE TABLE IF NOT EXISTS `policy` 
(
	`polId` 				INT(11) 					NOT NULL	AUTO_INCREMENT,  
	`polName`		   		VARCHAR(255) 				NOT NULL,
	`polFileURL`			VARCHAR(255)				NOT NULL,
	`polType`				ENUM('School','Management')	NOT NULL,
	`polLogAdded`			TIMESTAMP 	 				DEFAULT		CURRENT_TIMESTAMP,
	`polLogModified`		TIMESTAMP 	 				NULL,
	`polLogRemoved`			TIMESTAMP 	 				NULL,
	 PRIMARY KEY `pk_polId` (`polId`)	
) ENGINE = InnoDB;
-- 