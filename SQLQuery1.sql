
--CREATE TABLE Groups(
-- GROUP_ID int not null,
-- GroupName varchar(30),
-- Date_Created date,
-- Group_picture text,
-- Descriotion Text,
-- user_id int ,

--   PRIMARY KEY(GROUP_ID),
--   FOREIGN KEY(user_id)  REFERENCES Users  on update cascade 
-- on delete cascade,


--);
--CREATE TABLE Post(
--TEXTpost	text ,
--Date_Written date,
--Post_id integer not null,
--picture text,
--user_id int,
--group_id int,
--PRIMARY KEY (Post_id),
--FOREIGN KEY(user_id)  REFERENCES Users  on update cascade 
--on delete cascade,
--FOREIGN KEY(group_id)  REFERENCES Groups on update cascade 
--on delete cascade


--);
--create table Up_Down_Voted_Review_By(
--User_id int,
--Review_id int,
--Up_Down bool, -- no date type bool in my sql
--PRIMARY KEY(User_id,Review_id),
--FOREIGN KEY (User_id)  REFERENCES Users,
--FOREIGN KEY(Review_id) REFERENCES Review
--);