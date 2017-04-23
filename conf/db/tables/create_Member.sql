CREATE TABLE IF NOT EXISTS 'members' 
(
	'memId' 				INT(11) 	 	NOT NULL 		AUTO_INCREMENT					,  
	'memEmail'	   			VARCHAR(255)	NOT NULL					  					,
	'memPassword'   		VARCHAR(255)	NOT NULL										,
	'memFirstName'			VARCHAR(255)	NULL						  					,				
	'memLastName'			VARCHAR(255)	NULL						  					,				
	'memActive'     		VARCHAR(255) 	DEFAULT 		'NO'			  				,
	'memResetToken'   		VARCHAR(255) 	NULL			  								,
	'memResetComplete'		VARCHAR(3)   	DEFAULT 		'NO'			  				,
	'memLogAdded'			TIMESTAMP 	 	DEFAULT 		CURRENT_TIMESTAMP 				,
	'memLogModified'		TIMESTAMP 	 	NULL											,
	'memLogRemoved'			TIMESTAMP 	 	NULL											,
	 PRIMARY KEY('mId')
);