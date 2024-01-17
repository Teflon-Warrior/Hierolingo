--mysql -h db.luddy.indiana.edu -u i494f23_team11 --pass=my+sql=i494f23_team11 -D i494f23_team11

--drop table stuff
drop table if exists vocablist;
drop table if exists notifications;
drop table if exists points;
drop table if exists userfriends;
drop table if exists profile;
drop table if exists User;
drop table if exists resources;
drop table if exists dictionary;
drop table if exists questions;


--create file for profile
CREATE TABLE profile(
email varchar(50),
birthday date,
phone varchar(11),
primary key (email));

--create database
CREATE TABLE User (
username varchar(30),
userhandle varchar(30),
userlevel int,
hotstreak int,
primary key (username));

--userfriends needed to link friends together in the app.
CREATE TABLE userfriends(
  user varchar(30),
  friend varchar(30),
  foreign key (user) REFERENCES User(username),
  foreign key (friend) REFERENCES User(username)
);

--resources
CREATE TABLE resources(
    ID INT AUTO_INCREMENT,
    title VARCHAR(50),
    URL VARCHAR(256),
    Descrip VARCHAR(500),
    PRIMARY KEY (ID)
);

--Dictionary
CREATE TABLE dictionary(
  id int auto_increment,
  def varchar(20),
  filepath varchar(100),
  access int,
  primary key (ID)
  );


CREATE TABLE questions(
  id int auto_increment,
  access_level int,
  points int,
  translation varchar(250),
  primary key (id)
);


CREATE TABLE points (
  user VARCHAR(20),
  points INT,
  FOREIGN KEY (user) REFERENCES User(username)
);


CREATE TABLE notifications (
  stat BOOLEAN,
  method VARCHAR(5),
  timeofday TIME,
  dayofweek ENUM('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'),
  user VARCHAR(30),
  FOREIGN KEY (user) REFERENCES User(username)
);


Create TABLE vocablist(
ID int,
username varchar(30),
foreign key (ID) references dictionary(id),
foreign key (username) references User(username)
);

