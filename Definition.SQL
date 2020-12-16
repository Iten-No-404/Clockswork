-- Note: for these commands to work correctly tables StoreUser(UserID), Application(ApplicationID) and Employee(EmployeeID)
-- Must all be already created in the DB
-- Had to change table "User" to "StoreUser" since User in SQL seems to be a keyword.

CREATE TABLE Review(
    ReviewID INTEGER,
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
    AddtionalFiles LONGBLOB,
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
    FOREIGN KEY(ApplicationID) REFERENCES Application(ApplicationID) ON DELETE CASCADE ON UPDATE CASCADE,
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