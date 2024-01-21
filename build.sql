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
  pos varchar (60),
  def varchar(60),
  filepath varchar(100),
  access int,
  primary key (id)
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
--insert into statements for dictionary entries.
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('special', 'this is a factual statement', 'img/L1/iw.svg', 1);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Adverb', 'Here; there; therein', 'img/L1/im.svg', 1);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Masculine Noun', 'place', 'img/L1/bw.svg', 1);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Demonstrative adjective', 'This That', 'img/L1/pn.svg', 1);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Preposition', 'in, (from) within', 'img/L1/m.svg', 1);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Preposition', 'To,for,because of', 'img/L1/n.svg', 1);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Preposition', 'Towards, concerning', 'img/L1/r.svg', 1);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Divine', 'Ra', 'img/L1/R.svg', 1);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Masculine Noun', 'Name', 'img/L1/rn.svg', 1);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Preposition', 'Together with', 'img/L1/hn.svg', 1);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Feminine Noun', 'Thing', 'img/L1/ht.svg', 1);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Masculine Noun', 'House Home', 'img/L1/pr.svg', 1);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Masculine Noun', 'Man,human being', 'img/L1/s.svg', 1);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('verb', 'To Hear', 'img/L1/sdm.svg', 1);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Masculine Noun (special)', 'Another', 'img/L1/ky.svg', 1);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Feminine Noun (special)', 'Another', 'img/L1/kt.svg', 1);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('verb', 'To speak, to mention', 'img/L1/dd.svg', 1);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Feminine Demonstrative', 'This,that (feminine usage)', 'img/L1/tn.svg', 1);


--lesson 4
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("N/A", "N/A", "\img\L4\dw2.svg", 4);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("N/A", "N/A", "\img\L4\eating.svg", 4);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("N/A", "N/A", "\img\L4\flat.svg", 4);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("N/A", "N/A", "\img\L4\h3.svg", 4);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("N/A", "N/A", "\img\L4\hm.svg", 4);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("N/A", "N/A", "\img\L4\hm2.svg", 4);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("N/A", "N/A", "\img\L4\hm3.svg", 4);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("N/A", "N/A", "\img\L4\ib.svg", 4);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("N/A", "N/A", "\img\L4\in.svg", 4);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("N/A", "N/A", "\img\L4\iqr.svg", 4);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("N/A", "N/A", "\img\L4\jar.svg", 4);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("N/A", "N/A", "\img\L4\mi.svg", 4);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("N/A", "N/A", "\img\L4\mr.svg", 4);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("N/A", "N/A", "\img\L4\mri.svg", 4);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("N/A", "N/A", "\img\L4\nb.svg", 4);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("N/A", "N/A", "\img\L4\nhm.svg", 4);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("N/A", "N/A", "\img\L4\nsw.svg", 4);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("N/A", "N/A", "\img\L4\ntr.svg", 4);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("N/A", "N/A", "\img\L4\ntr2.svg", 4);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("N/A", "N/A", "\img\L4\ph.svg", 4);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("N/A", "N/A", "\img\L4\phty.svg", 4);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("N/A", "N/A", "\img\L4\S.svg", 4);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("N/A", "N/A", "\img\L4\'s3.svg", 4);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("N/A", "N/A", "\img\L4\sw.svg", 4);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("N/A", "N/A", "\img\L4\wet.svg", 4);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("N/A", "N/A", "\img\L4\bit.svg", 4);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("N/A", "N/A", "\img\L4\bit2.svg", 4);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("N/A", "N/A", "\img\L4\bnri.svg", 4);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("N/A", "N/A", "\img\L4\bread.svg", 4);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("N/A", "N/A", "\img\L4\di.svg", 4);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("N/A", "N/A", "\img\L4\di2.svg", 4);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("N/A", "N/A", "\img\L4\dpt.svg", 4);




