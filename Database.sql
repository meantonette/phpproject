

CREATE TABLE `consult_trigger` (
  `Trigger_ID` int(11) NOT NULL AUTO_INCREMENT,
  `consultID` int(11) NOT NULL,
  `employeeId` int(11) NOT NULL,
  `petnum` int(11) NOT NULL,
  `dateconsult` date NOT NULL,
  `fees` int(11) NOT NULL,
  `petcondition` varchar(250) NOT NULL,
  `diseaseid` int(11) NOT NULL,
  `injuryid` int(11) NOT NULL,
  `vcomment` text NOT NULL,
  PRIMARY KEY (`Trigger_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;


INSERT INTO consult_trigger (Trigger_ID, consultID, employeeId, petnum, dateconsult, fees, petcondition, diseaseid, injuryid, vcomment) VALUES ('1','16','3','5','2021-10-02','800','has fever','2','10','take medicines 2x a day');

INSERT INTO consult_trigger (Trigger_ID, consultID, employeeId, petnum, dateconsult, fees, petcondition, diseaseid, injuryid, vcomment) VALUES ('2','16','3','5','2021-10-02','850','has fever','2','10','take medicines 2x a day');

INSERT INTO consult_trigger (Trigger_ID, consultID, employeeId, petnum, dateconsult, fees, petcondition, diseaseid, injuryid, vcomment) VALUES ('3','15','1','5','2021-09-23','500','good','11','11','need vitamins');

INSERT INTO consult_trigger (Trigger_ID, consultID, employeeId, petnum, dateconsult, fees, petcondition, diseaseid, injuryid, vcomment) VALUES ('4','17','3','6','2019-11-06','500','good','1','11','take medicines 2x a day');

INSERT INTO consult_trigger (Trigger_ID, consultID, employeeId, petnum, dateconsult, fees, petcondition, diseaseid, injuryid, vcomment) VALUES ('5','19','1','5','2020-04-09','500','good','11','11','maintain drinking water');

INSERT INTO consult_trigger (Trigger_ID, consultID, employeeId, petnum, dateconsult, fees, petcondition, diseaseid, injuryid, vcomment) VALUES ('6','21','1','5','2021-04-15','500','good','11','10','maintain drinking water');

INSERT INTO consult_trigger (Trigger_ID, consultID, employeeId, petnum, dateconsult, fees, petcondition, diseaseid, injuryid, vcomment) VALUES ('7','20','1','7','2020-09-15','500','Bad','1','11','need further examination');

INSERT INTO consult_trigger (Trigger_ID, consultID, employeeId, petnum, dateconsult, fees, petcondition, diseaseid, injuryid, vcomment) VALUES ('8','22','1','5','2021-08-19','800','good','11','10','maintain drinking water');


CREATE TABLE `consultation` (
  `consultID` int(11) NOT NULL AUTO_INCREMENT,
  `employeeId` int(11) NOT NULL,
  `petnum` int(11) NOT NULL,
  `dateconsult` date NOT NULL,
  `fees` int(11) NOT NULL,
  `petcondition` varchar(500) NOT NULL,
  `diseaseid` int(11) NOT NULL,
  `injuryid` int(11) NOT NULL,
  `vcomment` text NOT NULL,
  PRIMARY KEY (`consultID`),
  KEY `employeeId` (`employeeId`),
  KEY `diseasenum` (`diseaseid`),
  KEY `injurynum` (`injuryid`),
  KEY `petnum` (`petnum`),
  CONSTRAINT `consultation_ibfk_1` FOREIGN KEY (`employeeId`) REFERENCES `employee` (`EmployeeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `consultation_ibfk_3` FOREIGN KEY (`diseaseid`) REFERENCES `diseases` (`diseasenum`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `consultation_ibfk_4` FOREIGN KEY (`injuryid`) REFERENCES `injuries` (`injurynum`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `consultation_ibfk_5` FOREIGN KEY (`petnum`) REFERENCES `petinfo` (`PetID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;


INSERT INTO consultation (consultID, employeeId, petnum, dateconsult, fees, petcondition, diseaseid, injuryid, vcomment) VALUES ('24','7','5','2021-11-17','500','good','11','8','maintain drinking water');

INSERT INTO consultation (consultID, employeeId, petnum, dateconsult, fees, petcondition, diseaseid, injuryid, vcomment) VALUES ('26','1','7','2021-07-11','500','good','11','3','Cut nails regularly');


CREATE TABLE `customer` (
  `CustomerID` int(250) NOT NULL AUTO_INCREMENT,
  `Title` varchar(5) NOT NULL,
  `LastName` varchar(250) NOT NULL,
  `FirstName` varchar(250) NOT NULL,
  `Street` varchar(250) NOT NULL,
  `City` varchar(250) NOT NULL,
  `Country` varchar(250) NOT NULL,
  `ZipCode` int(10) NOT NULL,
  `PhoneNum` varchar(100) NOT NULL,
  `Img` mediumblob NOT NULL,
  PRIMARY KEY (`CustomerID`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;


INSERT INTO customer (CustomerID, Title, LastName, FirstName, Street, City, Country, ZipCode, PhoneNum, Img) VALUES ('1','Ms','Rodelas','Dianna','South Signal','Taguig','Philippines','1630','09166372453','UploadCustomer/dayan.jpg');

INSERT INTO customer (CustomerID, Title, LastName, FirstName, Street, City, Country, ZipCode, PhoneNum, Img) VALUES ('16','Mr.','Sim','Jake','Hybe','Seoul','South Korea','100','09562358174','././UploadCustomer/jake.jpg');

INSERT INTO customer (CustomerID, Title, LastName, FirstName, Street, City, Country, ZipCode, PhoneNum, Img) VALUES ('17','Ms.','Kim','Jisoo','YG Entertainment','Seoul','South Korea','101','09875432603','././UploadCustomer/gorgjisoo.jpg');

INSERT INTO customer (CustomerID, Title, LastName, FirstName, Street, City, Country, ZipCode, PhoneNum, Img) VALUES ('18','Mr','Kim','Seokjin','Hybe','Seoul','South Korea','1001','097845132074','././UploadCustomer/jinawww.jpg');


CREATE TABLE `diseases` (
  `diseasenum` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(500) NOT NULL,
  PRIMARY KEY (`diseasenum`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;


INSERT INTO diseases (diseasenum, description) VALUES ('1','Distemper');

INSERT INTO diseases (diseasenum, description) VALUES ('2','Rabies');

INSERT INTO diseases (diseasenum, description) VALUES ('3','Ringworm');

INSERT INTO diseases (diseasenum, description) VALUES ('4','Salmonella');

INSERT INTO diseases (diseasenum, description) VALUES ('5','Hepatitis');

INSERT INTO diseases (diseasenum, description) VALUES ('6','Parvovirus');

INSERT INTO diseases (diseasenum, description) VALUES ('7','Pox');

INSERT INTO diseases (diseasenum, description) VALUES ('8','Anthrax');

INSERT INTO diseases (diseasenum, description) VALUES ('9','Mastitis');

INSERT INTO diseases (diseasenum, description) VALUES ('10','Psittacosis');

INSERT INTO diseases (diseasenum, description) VALUES ('11','None');


CREATE TABLE `employee` (
  `EmployeeID` int(11) NOT NULL AUTO_INCREMENT,
  `lastName` varchar(250) NOT NULL,
  `firstName` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `pass` text NOT NULL,
  `hiredDate` date NOT NULL,
  `Img` mediumblob NOT NULL,
  PRIMARY KEY (`EmployeeID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;


INSERT INTO employee (EmployeeID, lastName, firstName, email, pass, hiredDate, Img) VALUES ('1','Park','Jay','parkjay@weverse.com','51530f438db9e763053cc2b5e2a4bb381bdd6b90','2021-12-07','././UploadEmployee/jay.jpg');

INSERT INTO employee (EmployeeID, lastName, firstName, email, pass, hiredDate, Img) VALUES ('3','Kim','Taehyung','kimtaehyung@weverse.com','2de73319df9e424b3359207ce4e3f979799454b9','2021-12-10','././UploadEmployee/btsV.jpg');

INSERT INTO employee (EmployeeID, lastName, firstName, email, pass, hiredDate, Img) VALUES ('7','Park','Sunghoon','sunghoon@weverse.com','695d968d861d9329612feee09beec5e4650c67c7','2022-01-07','././UploadEmployee/sunghoon.jpg');


CREATE TABLE `injuries` (
  `injurynum` int(11) NOT NULL AUTO_INCREMENT,
  `desc` varchar(500) NOT NULL,
  PRIMARY KEY (`injurynum`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;


INSERT INTO injuries (injurynum, desc) VALUES ('1','Animal bites');

INSERT INTO injuries (injurynum, desc) VALUES ('2','toxin ingestion');

INSERT INTO injuries (injurynum, desc) VALUES ('3','Broken nail');

INSERT INTO injuries (injurynum, desc) VALUES ('4','object ingestion');

INSERT INTO injuries (injurynum, desc) VALUES ('5','Animal bites');

INSERT INTO injuries (injurynum, desc) VALUES ('6','Eye trauma');

INSERT INTO injuries (injurynum, desc) VALUES ('7','Insect stings/bites');

INSERT INTO injuries (injurynum, desc) VALUES ('8','Dehydration');

INSERT INTO injuries (injurynum, desc) VALUES ('9','ligament rupture');

INSERT INTO injuries (injurynum, desc) VALUES ('10','Teeth injury');

INSERT INTO injuries (injurynum, desc) VALUES ('11','None');


CREATE TABLE `petinfo` (
  `PetID` int(11) NOT NULL AUTO_INCREMENT,
  `petName` varchar(500) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `breed` varchar(500) NOT NULL,
  `species` varchar(500) NOT NULL,
  `color` varchar(100) NOT NULL,
  `sex` varchar(25) NOT NULL,
  `birth` date NOT NULL,
  `Img` mediumblob NOT NULL,
  PRIMARY KEY (`PetID`),
  KEY `CustomerID` (`CustomerID`),
  CONSTRAINT `petinfo_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;


INSERT INTO petinfo (PetID, petName, CustomerID, breed, species, color, sex, birth, Img) VALUES ('5','Layla','16','Labrador','Dog','White','Female','2020-06-16','././UploadPet/layla.jpg');

INSERT INTO petinfo (PetID, petName, CustomerID, breed, species, color, sex, birth, Img) VALUES ('6','jjangu','18','maltese','Dog','White','Male','2015-12-01','././UploadPet/Jjangu.jpg');

INSERT INTO petinfo (PetID, petName, CustomerID, breed, species, color, sex, birth, Img) VALUES ('7','Dalgom','17','maltese','Dog','White','Female','2019-06-14','././UploadPet/dalgom.jpg');


CREATE TABLE `petservices` (
  `ServiceID` int(11) NOT NULL AUTO_INCREMENT,
  `servname` varchar(250) NOT NULL,
  `Descrip` varchar(500) NOT NULL,
  `Price` int(11) NOT NULL,
  `Img` mediumblob NOT NULL,
  PRIMARY KEY (`ServiceID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;


INSERT INTO petservices (ServiceID, servname, Descrip, Price, Img) VALUES ('2','​Schnauzer','Leave long eye brows, ​legs, beard, and skirt.','200','././UploadService/shih-tzu-show-trim.jpg');

INSERT INTO petservices (ServiceID, servname, Descrip, Price, Img) VALUES ('6','Ear Cleaning','with good quality ear cleaning solution and some cotton balls to clean your pet ears','200','././UploadService/earcleaning.jpg');

INSERT INTO petservices (ServiceID, servname, Descrip, Price, Img) VALUES ('7','Pawdicure','Cleaning your pets paw','200','UploadService/pawdicure.jpg');

INSERT INTO petservices (ServiceID, servname, Descrip, Price, Img) VALUES ('9','Toothbrush','Brushing your pets teeth with nice scent','150','UploadService/toothbrush.jpg');

INSERT INTO petservices (ServiceID, servname, Descrip, Price, Img) VALUES ('10','Bath','Washing your pet with nice shampoo and conditioner','300','UploadService/dogbath.jpg');

INSERT INTO petservices (ServiceID, servname, Descrip, Price, Img) VALUES ('11','Deworming','The first round kills the worms that are there at the time','150','././UploadService/Dewormer.jpg');


CREATE TABLE `servorderinfo` (
  `servordinfoID` int(11) NOT NULL AUTO_INCREMENT,
  `employID` int(11) NOT NULL,
  `sched` date NOT NULL,
  PRIMARY KEY (`servordinfoID`),
  KEY `employID` (`employID`),
  CONSTRAINT `servorderinfo_ibfk_2` FOREIGN KEY (`employID`) REFERENCES `employee` (`EmployeeID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;


INSERT INTO servorderinfo (servordinfoID, employID, sched) VALUES ('2','1','2022-01-07');


CREATE TABLE `servorderline` (
  `servordinfoID` int(11) NOT NULL,
  `servID` int(11) NOT NULL,
  `petID` int(11) NOT NULL,
  PRIMARY KEY (`servordinfoID`,`servID`),
  KEY `servID` (`servID`),
  KEY `petID` (`petID`),
  CONSTRAINT `servorderline_ibfk_1` FOREIGN KEY (`servID`) REFERENCES `petservices` (`ServiceID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `servorderline_ibfk_2` FOREIGN KEY (`servordinfoID`) REFERENCES `servorderinfo` (`servordinfoID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `servorderline_ibfk_3` FOREIGN KEY (`petID`) REFERENCES `petinfo` (`PetID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



CREATE TABLE `transac_trigger` (
  `Trigger_id` int(11) NOT NULL AUTO_INCREMENT,
  `servordinfoID` int(11) NOT NULL,
  `employID` int(11) NOT NULL,
  `sched` date NOT NULL,
  PRIMARY KEY (`Trigger_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;


INSERT INTO transac_trigger (Trigger_id, servordinfoID, employID, sched) VALUES ('1','1','1','2022-01-07');

INSERT INTO transac_trigger (Trigger_id, servordinfoID, employID, sched) VALUES ('2','1','1','2022-01-20');
