CREATE TABLE  Users  (
	 User_ID  INT NOT NULL ,
	 FName  varchar(30) NOT NULL,
	 LName  varchar(30) NOT NULL,
	 Username  varchar(30) NOT NULL,
	 Password  varchar(30) NOT NULL,
	 Email  varchar(50) NOT NULL,
	 Address  varchar(50),
	 Bdate  DATE NOT NULL,
	 Gender  INT NOT NULL,
	 Developer  INT NOT NULL DEFAULT '0',
	 Phone_Number  INT,
	 Balance  FLOAT NOT NULL DEFAULT '0',
	 Billing_Info  varchar(255) NOT NULL DEFAULT 'No information available.',
	 Ban_End  FLOAT NOT NULL DEFAULT '0',
	 Profile_Picture  image,
	PRIMARY KEY ( User_ID )
);

CREATE TABLE  Categories  (
	 Category_ID  INT NOT NULL,
	 Category_Name  varchar(30) NOT NULL UNIQUE,
	PRIMARY KEY ( Category_ID )
);
