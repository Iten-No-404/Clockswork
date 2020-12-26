-- This is Clockwork's SQL Database
-- Notes: long strings are stored as text instead of VARCHAR (including image paths)
--	     booleans are stored as VARCHAR(1)
--		 User and Application were changed to Users and Applications respectively since the former seemed to be reserved words		 
CREATE TABLE  Users  (
	 U_ID  INT NOT NULL AUTO_INCREMENT,
	 FName  varchar(30) ,
	 LName  varchar(30) ,
	 Username  varchar(30) NOT NULL,
	 Password  varchar(30) NOT NULL,
	 Email  varchar(50) NOT NULL,
	 Address  varchar(50),
	 Bdate  DATE ,
	 Gender  VARCHAR(1) , -- boolean
	 Developer  VARCHAR(1) NOT NULL DEFAULT '0', -- boolean
	 Phone_Number  INT,
	 Balance  FLOAT NOT NULL DEFAULT '0',
	 Billing_Info  TEXT NOT NULL DEFAULT 'No information available.', -- long strings are stored as text instead of VARCHAR
	 Ban_End  FLOAT NOT NULL DEFAULT '0',
	 Profile_Picture  TEXT, -- (image path)long strings are stored as text instead of VARCHAR
	PRIMARY KEY ( U_ID )
);

CREATE TABLE Applications (
App_ID INT NOT NULL,
    Application_Name VARCHAR(100) NOT NULL,
    NumOfUsers INTEGER NOT NULL DEFAULT 0,
    Price DECIMAL NOT NULL DEFAULT 9999,
    Sale DECIMAL,
    -- Reviews is a derived attribute, not sure if to write it and make a trigger/macro that calculates
    -- Its value on any change, or just get it via queries as needed
    -- I'll go with the second approach for now (not making it)
    -- Not sure if age rating is always needed or not. Assuming it is for now
    AgeRating INTEGER NOT NULL DEFAULT 18,
    System_Requirements TEXT ,
    Rating DECIMAL,
    -- Somewhere to store the picture link or path
    Application_Picture TEXT,
    AppDescription TEXT,
    -- Somewhere to store the video link or path
    AppTrailer TEXT,
    Region VARCHAR(100),
    Hide VARCHAR(1), -- boolean
    Release_Date DATE ,
	U_ID INT NOT NULL,
PRIMARY KEY (App_ID),
-- Assuming that if a user is deleted, all the apps he published are also deleted
FOREIGN KEY (U_ID) REFERENCES Users(U_ID) on update cascade on delete cascade -- Published_By relationship
);

CREATE TABLE Employee (
    Employee_ID INTEGER,
    Gender VARCHAR(1) NOT NULL,
    Bdate DATE,
    -- Salary could be integer
    Salary DECIMAL,
    -- Did this because "Address" is proably a keyword
    Employee_Address VARCHAR(100),
    Department VARCHAR(100) NOT NULL,
    Phone INTEGER,
    Email VARCHAR(100) NOT NULL,
    -- MySQL (which we are using.. I think) doesn't support composite attributes
    -- So, I'll just use do Fname and Lname as two separate attributes, either this or a new table
    Fname VARCHAR(100) NOT NULL,
    Lname VARCHAR(100) NOT NULL,
    PRIMARY KEY(Employee_ID)
);

CREATE TABLE  Categories  (
	 Category_ID  INT NOT NULL,
	 Category_Name  VARCHAR(30) NOT NULL UNIQUE,
	PRIMARY KEY ( Category_ID )
);

CREATE TABLE Groups(
 GROUP_ID int not null,
 GroupName varchar(30)not null,
 Date_Created date,
 Group_picture text,
 Group_Description Text,
 U_ID int ,

   PRIMARY KEY(GROUP_ID),
   -- Owned_By Relationship
   FOREIGN KEY(U_ID)  REFERENCES Users(U_ID)  on update cascade on delete cascade 

);

CREATE TABLE Post(
TEXTpost	text ,
Date_Written date,
Post_id integer not null,
picture text,
U_ID int,
group_id int,
PRIMARY KEY (Post_id),
FOREIGN KEY(U_ID)  REFERENCES Users(U_ID)  on update cascade on delete cascade, -- Posted Relationship
FOREIGN KEY(group_id)  REFERENCES Groups(GROUP_ID) on update cascade on delete cascade -- Posted_At Relationship

);

CREATE TABLE Review(
    ReviewID INTEGER,
    -- Not sure if "Description" is a keyword so changed it to Review_Description just in case
    Review_Description TEXT NOT NULL,
    ReviewDate DATE NOT NULL,
    Stars INTEGER DEFAULT 3,
    PRIMARY KEY(ReviewID)
    -- No foreign keys here, no need to specify deletion and update stuff
);

CREATE TABLE SupportTicket(
    TicketID INTEGER NOT NULL,
    ReportDescription TEXT NOT NULL,
    Closed VARCHAR(1),
	U_ID INT,
    -- Storing images directly in the DB isn't very good
    -- A better alternative is to store the images on disk and have a reference to the image in the DB
    -- https://stackoverflow.com/a/6472268
    AddtionalFilesPath TEXT,
    PRIMARY KEY(TicketID),
	FOREIGN KEY (U_ID) REFERENCES Users(U_ID) ON DELETE CASCADE ON UPDATE CASCADE -- Submitted_By Relationship

);

-- MYSQL is very specific about how comments are made, sorry.
-- Relations as Tables (Either N:M or N-ary relationships) ----------------------------------------------------

CREATE TABLE Member_In(
U_ID INT NOT NULL,
Group_ID INT NOT NULL,
PRIMARY KEY(U_ID, Group_ID),
FOREIGN KEY(U_ID) REFERENCES Users(U_ID) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY(Group_ID) REFERENCES Groups(Group_ID) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Categorized(
    App_ID INTEGER,
    Category_ID INTEGER,
    PRIMARY KEY(
        App_ID,
        Category_ID
     ),
     -- When an application is deleted, this whole tuple with that application should be deleted
     FOREIGN KEY (App_ID) REFERENCES Applications(App_ID) ON DELETE CASCADE ON UPDATE CASCADE,
     -- When deleting a category, the category from here should just be removed, not deleting the whole tuple
     FOREIGN KEY(Category_ID) REFERENCES Categories(Category_ID) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Purchased_By(
    UserID INTEGER,
    ApplicationID INTEGER,
    PRIMARY KEY(
        UserID,
        ApplicationID
    ),
    Purchase_Date DATE NOT NULL,
    -- If I delete the user, I no longer need to keep a record of their purchases
    FOREIGN KEY(UserID) REFERENCES Users(U_ID) ON DELETE CASCADE ON UPDATE CASCADE,
    -- This part is a little bit confusing, if I delete an application, I shouldn't just remove it from the people's libraries
    -- (who purchased it) so, do I just leave it as is or just force remove it by deleting this tuple as well?
    -- going with leaving it as is 
    FOREIGN KEY(ApplicationID) REFERENCES Applications(App_ID) ON DELETE NO ACTION ON UPDATE CASCADE
);

CREATE TABLE Reviewed(
    UserID INTEGER,
    ApplicationID INTEGER,
    ReviewID INTEGER NOT NULL,
    -- Assuming A user can review a game only once
    PRIMARY KEY(
        UserID,
        ApplicationID,
        ReviewID
    ),
    -- When a user gets deleted, all their reviews should be too
    FOREIGN KEY(UserID) REFERENCES Users(U_ID) ON DELETE CASCADE ON UPDATE CASCADE,
    -- When an application gets deleted, all its reviews should be deleted too
    FOREIGN KEY(ApplicationID) REFERENCES Applications(App_ID) ON DELETE CASCADE ON UPDATE CASCADE,
    -- Not too sure about this one
    FOREIGN KEY(ReviewID) REFERENCES Review(ReviewID) ON DELETE CASCADE ON UPDATE CASCADE
); 

CREATE TABLE ReviewedBy(
    EmployeeID INTEGER,
    TicketID INTEGER NOT NULL,
    PRIMARY KEY(EmployeeID, TicketID),
    -- If an employee gets deleted, should the row be deleted
    -- Can't have null here since EmployeeID is used in the primary key
    FOREIGN KEY(EmployeeID) REFERENCES Employee(Employee_ID) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY(TicketID) REFERENCES SupportTicket(TicketID) ON DELETE CASCADE ON UPDATE CASCADE
);

create table Up_Down_Voted_Review(
U_ID int,
Review_id int,
Up_Down VARCHAR(1), -- no date type bool in my sql
PRIMARY KEY(U_ID,Review_id),
FOREIGN KEY (U_ID)  REFERENCES Users(U_ID) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY(Review_id) REFERENCES Review(ReviewID) ON DELETE CASCADE ON UPDATE CASCADE
);

create table Up_Down_Voted_Post(
U_ID int,
Post_id int,
Up_Down VARCHAR(1), -- no date type bool in my sql
PRIMARY KEY(U_ID,Post_id),
FOREIGN KEY (U_ID)  REFERENCES Users(U_ID) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY(Post_id) REFERENCES Post(Post_id) ON DELETE CASCADE ON UPDATE CASCADE
);