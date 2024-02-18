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
id INT auto_increment,
username varchar(30),
userhandle varchar(30),
userlevel int,
hotstreak int,
primary key (id));

--userfriends needed to link friends together in the app.
CREATE TABLE userfriends(
  user INT,
  friend INT,
  foreign key (user) REFERENCES User(id),
  foreign key (friend) REFERENCES User(id)
);

--resources
-- CREATE TABLE resources(
--     ID INT AUTO_INCREMENT,
--     title VARCHAR(50),
--     URL VARCHAR(256),
--     Descrip VARCHAR(500),
--     PRIMARY KEY (ID)
-- );

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
  user INT,
  points INT,
  FOREIGN KEY (user) REFERENCES User(id)
);



CREATE TABLE notifications (
  stat BOOLEAN,
  method VARCHAR(5),
  timeofday TIME,
  /* days of the week will be order 0-6 where sunday=0, monday=1, etc*/
  dayofweek int,
  user VARCHAR(30),
  FOREIGN KEY (user) REFERENCES User(username)
);


Create TABLE vocablist(
  ID int,
  filepath varchar(60),
  foreign key (ID) references User(id),
);
--insert into statements for dictionary entries.
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('special', 'this is a factual statement', 'img/L1/iw.svg', 1);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Adverb', 'Here; there; therein', 'img/L1/im.svg', 1);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Masculine Noun', 'place', 'img/L1/bw.svg', 1);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Demonstrative adjective', 'This That', 'img/L1/pn.svg', 1);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Preposition', 'in, (from) within', 'img/L1/m.svg', 1);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Preposition', 'To,for,because of', 'img/L1/n.svg', 1);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Preposition', 'Towards, concerning', 'img/L1/rr.svg', 1);
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

--lesson 2
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Feminine Noun','Horizon','img/L2/3Xt.svg',2);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Divine','Amun','img/L2/_IMN.svg',2);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Feminine Noun','Boat','img/L2/dpt.svg',2);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Preposition','On, upon, over','img/L2/hr.svg',2);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Masculine Noun','Child','img/L2/hrd.svg',2);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Masculine Noun','Day, daytime','img/L2/hrw.svg',2);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Masculine Noun','River; the Nile','img/L2/ltrw.svg',2);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Special','Behold, voila!','img/L2/mk.svg',2);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Divine','Montu','img/L2/mntw.svg',2);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Masculine Noun','Water, liquid','img/L2/mw.svg',2);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Masculine Noun','Lord, possessor','img/L2/nb.svg',2);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Feminine Noun','Town, city','img/L2/niwt.svg',2);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Feminine Noun','Heaven, sky','img/L2/pt.svg',2);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Masculine Noun','The sun, a day','img/L2/r_.svg',2);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Verb','Depart, go away, escape','img/L2/rwi.svg',2);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Masculine Noun','Son','img/L2/s3.svg',2);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Feminine Noun','Daughter','img/L2/s3t.svg',2);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Masculine Noun','Plan, idea, suggestion, advice','img/L2/shr.svg',2);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Masculine Noun','A writing','img/L2/ss.svg',2);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Masculine Noun','A scribe','img/L2/ss2.svg',2);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Feminine Noun','Woman','img/L2/st.svg',2);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Masculine Noun','Land','img/L2/t3.svg',2);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Verb','To shine, to rise','img/L2/wbn.svg',2);


--lesson 3
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Verb','To load, to burden','img/L3/3tp.svg',3);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Masculine Noun','A priest','img/L3/W_b.svg',3);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Masculine Noun','Arm, hand','img/L3/_.svg',3);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Masculine Noun','Donkey','img/L3/_3.svg',3);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Adjective','Large, great','img/L3/_3Large.svg',3);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Masculine Noun','Servant','img/L3/b3k.svg',3);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Adjective','Bad, wretched','img/L3/bin.svg',3);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Verb','To ferry someone, to cross a body of water','img/L3/dwi.svg',3);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Verb','To send, dispatch','img/L3/h3b.svg',3);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Masculine Noun','Face','img/L3/hr.svg',3);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Masculine Noun','Overseer, supervisor','img/L3/imy-r.svg',3);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Adjective','within','img/L3/imy.svg',3);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Verb','To do, to make, to act, to carry out','img/L3/iri.svg',3);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Masculine Noun','Father','img/L3/it.svg',3);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Feminine Noun','Construction Project','img/L3/k3t.svg',3);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('V','To see, look at','img/L3/m33.svg',3);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Feminine Noun','Mother','img/L3/mwt.svg',3);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Adjective','Small, insignificant, unimportant','img/L3/nds.svg',3);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Adjective','Beautiful, good, perfect','img/L3/nfr.svg',3);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Masculine Noun','Mouth, bodily orifice, door or other opening','img/L3/r.svg',3);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Feminine Noun','Joy','img/L3/rSwt.svg',3);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Masculine Noun','Vizier, prime minister','img/L3/t3ty.svg',3);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Verb','To wash, purify','img/L3/w_b2.svg',3);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ('Verb','To open.','img/L3/wpi.svg',3);




--lesson 4
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("Bilateral", "valley between two hills", "/img/L4/dw2.svg", 4);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("determitive", "eating", "/img/L4/eating.svg", 4);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("determinative", "a piece of land or flat objects", "/img/L4/flat.svg", 4);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("Bilateral", "lotus flower", "/img/L4/h3.svg", 4);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("n.m", "Majesty", "/img/L4/hm.svg", 4);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("special", "indicates well full of water", "/img/L4/hm2.svg", 4);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("n.m", "Servant", "/img/L4/hm3.svg", 4);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("n.m", "Heart", "/img/L4/ib.svg", 4);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("prep", "by,through", "/img/L4/in.svg", 4);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("adj", "Excellent", "/img/L4/iqr.svg", 4);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("special", "(indicates a jar)", "/img/L4/jar.svg", 4);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("prep", "Like, similar to", "/img/L4/mi.svg", 4);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("bilateral", "Hoe (farm equipment)", "/img/L4/mr.svg", 4);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("v", "To love, like, desire, prefer", "/img/L4/mri.svg", 4);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("adj", "any", "/img/L4/nb.svg", 4);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("verb", "Save,rescue,take,rob", "/img/L4/nhm.svg", 4);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("n.m.", "King", "/img/L4/nsw.svg", 4);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("n.m", "God, goddess", "/img/L4/ntr.svg", 4);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("Trilatteral", "god", "/img/L4/ntr2.svg", 4);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("special", "lion's thigh, rear leg, and tale", "/img/L4/ph.svg", 4);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("n.m", "Strength, power", "/img/L4/phty.svg", 4);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("Masculine Noun", "Pool, Basin", "/img/L4/S.svg", 4);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("adj", "Numerous, rich", "/img/L4/'s3.svg", 4);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("Bilateral", "heart", "/img/L4/sw.svg", 4);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("n.f", "road,path,way", "/img/L4/wet.svg", 4);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("n.f.", "Honey", "/img/L4/bit.svg", 4);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("n.f.", "bee", "/img/L4/bit2.svg", 4);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("adj", "Sweet,pleasant", "/img/L4/bnri.svg", 4);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("determinative", "bread", "/img/L4/bread.svg", 4);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("verb", "to give, place, put", "/img/L4/di.svg", 4);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("special", "signifies a hand sign", "/img/L4/di2.svg", 4);
INSERT INTO dictionary (pos, def, filepath, access) VALUES ("Feminine Noun", "Taste", "/img/L4/dpt.svg", 4);



--testing data for profile
INSERT INTO profile (email,birthday,phone) VALUES ("test@gmail.com","1999-01-21","1234567890");
INSERT INTO profile (email,birthday,phone) VALUES ("monkey@gmail.com","1998-02-11","2345678901");
INSERT INTO profile (email,birthday,phone) VALUES ("maxarno@iu.edu","2002-05-11","3456789012");
INSERT INTO profile (email,birthday,phone) VALUES ("johaharr@iu.edu","2001-04-11","4567890123");
INSERT INTO profile (email,birthday,phone) VALUES ("jefhogsch@iu.edu","1995-03-01","5678901234");

--testing data for User
--NOTE: userhandle is reduntant I think we can just get rid of this
--userhandle is optional.
INSERT INTO User (username,userhandle,userlevel,hotsreak) VALUES ("lester","","1","13");
INSERT INTO User (username,userhandle,userlevel,hotsreak) VALUES ("andy","","2","15");
INSERT INTO User (username,userhandle,userlevel,hotsreak) VALUES ("sexgod","","3","90");
INSERT INTO User (username,userhandle,userlevel,hotsreak) VALUES ("cheesewizard","mandy","4","31");
INSERT INTO User (username,userhandle,userlevel,hotsreak) VALUES ("celerayvaughn","na","4","76");

--userfriend data
INSERT INTO userfriends (user,friend) VALUES (1,2);
INSERT INTO userfriends (user,friend) VALUES (1,3);
INSERT INTO userfriends (user,friend) VALUES (1,4);
INSERT INTO userfriends (user,friend) VALUES (1,5);
INSERT INTO userfriends (user,friend) VALUES (2,1);
INSERT INTO userfriends (user,friend) VALUES (2,5);
INSERT INTO userfriends (user,friend) VALUES (3,1);
INSERT INTO userfriends (user,friend) VALUES (3,2);
INSERT INTO userfriends (user,friend) VALUES (3,4);
INSERT INTO userfriends (user,friend) VALUES (3,5);
INSERT INTO userfriends (user,friend) VALUES (4,1);
INSERT INTO userfriends (user,friend) VALUES (4,2);
INSERT INTO userfriends (user,friend) VALUES (4,3);
INSERT INTO userfriends (user,friend) VALUES (5,2);
INSERT INTO userfriends (user,friend) VALUES (5,3);
