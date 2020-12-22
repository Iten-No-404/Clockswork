-- Note: for these commands to work correctly tables StoreUser(UserID), App(ApplicationID) and Employee(EmployeeID)
-- Also, Cateogry(Category_ID)
-- Must all be already created in the DB
-- Had to change table "User" to "StoreUser" since User in SQL seems to be a keyword.
CREATE TABLE Employee(
    EmployeeID INTEGER,
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
    PRIMARY KEY(EmployeeID)
);
-- "Application" might be a keyword so I changed it to "App"
CREATE TABLE App(
    ApplicationID INTEGER,
    Application_Name VARCHAR(100) NOT NULL,
    NumOfUsers INTEGER NOT NULL,
    Price DECIMAL NOT NULL,
    Sale DECIMAL,
    -- Reviews is a derived attribute, not sure if to write it and make a trigger/macro that calculates
    -- Its value on any change, or just get it via queries as needed
    -- I'll go with the second approach for now (not making it)
    -- Not sure if age rating is always needed or not. Assuming it is for now
    AgeRating INTEGER NOT NULL,
    System_Requirements VARCHAR(1000) NOT NULL,
    Rating DECIMAL,
    -- Somewhere to store the picture link or path
    Application_Picture TEXT,
    AppDescription VARCHAR(1000),
    -- Somewhere to store the video link or path
    AppTrailer TEXT,
    Region VARCHAR(100),
    Hide BOOLEAN,
    Release_Date DATE, NOT NULL,
    PRIMARY KEY (ApplicationID)
);
CREATE TABLE Categorized(
    ApplicationID INTEGER,
    Caterogry_ID INTEGER,
    PRIMARY KEY(
        ApplicationID,
        Caterogry_ID
     ),
     -- When an application is deleted, this whole tuple with that application should be deleted
     FORIEGN KEY(ApplicationID) REFERENCES App(ApplicationID) ON DELETE CASCADE ON UPDATE CASCADE,
     -- When deleting a category, the category from here should just be removed, not deleting the whole tuple
     FORIGEN KEY(Category_ID) REFERENCES Category(Category_ID) ON DELETE SET NULL ON UPDATE CASCADE
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
    FORIGEN KEY(UserID) REFERENCES StoreUser(UserID) ON DELETE CASCADE ON UPDATE CASCADE,
    -- This part is a little bit confusing, if I delete an application, I shouldn't just remove it from the people's libraries
    -- (who purchased it) so, do I just leave it as is or just force remove it by deleting this tuple as well?
    -- going with leaving it as is 
    FORIEGN KEY(ApplicationID) REFERENCES App(ApplicationID) ON DELETE NO ACTION ON UPDATE CASCADE
);
CREATE TABLE Review(
    ReviewID INTEGER,
    -- Not sure if "Description" is a keyword
    Description VARCHAR(1000) NOT NULL,
    ReviewDate DATE NOT NULL,
    Stars INTEGER DEFAULT 3,
    PRIMARY KEY(ReviewID)
    -- No foreign keys here, no need to specify deletion and update stuff
); CREATE TABLE SupportTicket(
    TicketID INTEGER NOT NULL,
    ReportDescription VARCHAR(1000) NOT NULL,
    Closed BOOLEAN,
    -- Storing images directly in the DB isn't very good
    -- A better alternative is to store the images on disk and have a reference to the image in the DB
    -- https://stackoverflow.com/a/6472268
    AddtionalFilesPath VARCHAR(256),
    PRIMARY KEY(TicketID)
    -- Same here for deletion and update
); CREATE TABLE Reviewed(
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
    FOREIGN KEY(UserID) REFERENCES storeuser(UserID) ON DELETE CASCADE ON UPDATE CASCADE,
    -- When an application gets deleted, all its reviews should be deleted too
    FOREIGN KEY(ApplicationID) REFERENCES App(ApplicationID) ON DELETE CASCADE ON UPDATE CASCADE,
    -- Not too sure about this one
    FOREIGN KEY(ReviewID) REFERENCES Review(ReviewID) ON DELETE CASCADE ON UPDATE CASCADE
); CREATE TABLE ReviewedBy(
    EmployeeID INTEGER,
    TicketID INTEGER NOT NULL,
    PRIMARY KEY(EmployeeID, TicketID),
    -- If an employee gets deleted, should the row be deleted
    -- Can't have null here since EmployeeID is used in the primary key
    FOREIGN KEY(EmployeeID) REFERENCES Employee(EmployeeID) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY(TicketID) REFERENCES SupportTicket(TicketID) ON DELETE CASCADE ON UPDATE CASCADE
);