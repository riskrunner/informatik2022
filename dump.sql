#
# DUMP FILE
#
# Database is ported from MS Access
#------------------------------------------------------------------
# Created using "MS Access to MySQL" form http://www.bullzip.com
# Program Version 5.5.282
#
# OPTIONS:
#   sourcefilename=D:/Leihbücherei/LeihbüchereiDB1.mdb
#   sourceusername=
#   sourcepassword=
#   sourcesystemdatabase=
#   destinationdatabase=leihbuechereiMySqldb
#   storageengine=MyISAM
#   dropdatabase=0
#   createtables=1
#   unicode=1
#   autocommit=1
#   transferdefaultvalues=1
#   transferindexes=1
#   transferautonumbers=1
#   transferrecords=1
#   columnlist=1
#   tableprefix=
#   negativeboolean=0
#   ignorelargeblobs=0
#   memotype=LONGTEXT
#   datetimetype=DATETIME
#

CREATE DATABASE IF NOT EXISTS `leihbuechereiMySqldb`;
USE `leihbuechereiMySqldb`;

#
# Table structure for table 'TabelleAusleihe'
#

DROP TABLE IF EXISTS `TabelleAusleihe`;

CREATE TABLE `TabelleAusleihe` (
  `IDAusleihe` INTEGER NOT NULL AUTO_INCREMENT, 
  `IDLeihObj` INTEGER DEFAULT 0, 
  `IDLeihKunde` INTEGER DEFAULT 0, 
  `AbgabeFrist` DATETIME, 
  INDEX (`IDLeihKunde`), 
  PRIMARY KEY (`IDAusleihe`)
) ENGINE=myisam DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'TabelleAusleihe'
#

# 0 records

#
# Table structure for table 'TabelleBüchereiBestand'
#

DROP TABLE IF EXISTS `TabelleBüchereiBestand`;

CREATE TABLE `TabelleBüchereiBestand` (
  `NameObj` VARCHAR(50) NOT NULL, 
  `IDObj` INTEGER NOT NULL AUTO_INCREMENT, 
  `ObjLeihStatus` TINYINT(1) NOT NULL, 
  `ObjResStatus` TINYINT(1) NOT NULL, 
  `ObjBeschreibung` VARCHAR(50), 
  `ObjTyp` INTEGER NOT NULL DEFAULT 0, 
  INDEX (`IDObj`), 
  PRIMARY KEY (`IDObj`)
) ENGINE=myisam DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'TabelleBüchereiBestand'
#

INSERT INTO `TabelleBüchereiBestand` (`NameObj`, `IDObj`, `ObjLeihStatus`, `ObjResStatus`, `ObjBeschreibung`, `ObjTyp`) VALUES ('Eine Geschichte aus zwei Städten', 1, 0, 0, NULL, 1);
INSERT INTO `TabelleBüchereiBestand` (`NameObj`, `IDObj`, `ObjLeihStatus`, `ObjResStatus`, `ObjBeschreibung`, `ObjTyp`) VALUES ('Der Hobbit', 2, 0, 0, NULL, 1);
INSERT INTO `TabelleBüchereiBestand` (`NameObj`, `IDObj`, `ObjLeihStatus`, `ObjResStatus`, `ObjBeschreibung`, `ObjTyp`) VALUES ('Harry Potter', 3, 0, 0, NULL, 1);
INSERT INTO `TabelleBüchereiBestand` (`NameObj`, `IDObj`, `ObjLeihStatus`, `ObjResStatus`, `ObjBeschreibung`, `ObjTyp`) VALUES ('Der kleine Prinz', 4, 0, 0, NULL, 1);
INSERT INTO `TabelleBüchereiBestand` (`NameObj`, `IDObj`, `ObjLeihStatus`, `ObjResStatus`, `ObjBeschreibung`, `ObjTyp`) VALUES ('Der Traum der roten Kammer', 5, 0, 0, NULL, 1);
INSERT INTO `TabelleBüchereiBestand` (`NameObj`, `IDObj`, `ObjLeihStatus`, `ObjResStatus`, `ObjBeschreibung`, `ObjTyp`) VALUES ('Und dann gabs keines mehr', 6, 0, 0, NULL, 1);
INSERT INTO `TabelleBüchereiBestand` (`NameObj`, `IDObj`, `ObjLeihStatus`, `ObjResStatus`, `ObjBeschreibung`, `ObjTyp`) VALUES ('Der König von Narnia', 7, 0, 0, NULL, 1);
INSERT INTO `TabelleBüchereiBestand` (`NameObj`, `IDObj`, `ObjLeihStatus`, `ObjResStatus`, `ObjBeschreibung`, `ObjTyp`) VALUES ('Sie', 8, 0, 0, NULL, 1);
INSERT INTO `TabelleBüchereiBestand` (`NameObj`, `IDObj`, `ObjLeihStatus`, `ObjResStatus`, `ObjBeschreibung`, `ObjTyp`) VALUES ('Die Abenteur von Pinicchio', 9, 0, 0, NULL, 1);
INSERT INTO `TabelleBüchereiBestand` (`NameObj`, `IDObj`, `ObjLeihStatus`, `ObjResStatus`, `ObjBeschreibung`, `ObjTyp`) VALUES ('Der Da Vinci Code', 10, 0, 0, NULL, 1);
INSERT INTO `TabelleBüchereiBestand` (`NameObj`, `IDObj`, `ObjLeihStatus`, `ObjResStatus`, `ObjBeschreibung`, `ObjTyp`) VALUES ('Thriller', 11, 0, 0, NULL, 3);
INSERT INTO `TabelleBüchereiBestand` (`NameObj`, `IDObj`, `ObjLeihStatus`, `ObjResStatus`, `ObjBeschreibung`, `ObjTyp`) VALUES ('Back in Black', 12, 0, 0, NULL, 3);
INSERT INTO `TabelleBüchereiBestand` (`NameObj`, `IDObj`, `ObjLeihStatus`, `ObjResStatus`, `ObjBeschreibung`, `ObjTyp`) VALUES ('The Dark Side of the Moon', 13, 0, 0, NULL, 3);
INSERT INTO `TabelleBüchereiBestand` (`NameObj`, `IDObj`, `ObjLeihStatus`, `ObjResStatus`, `ObjBeschreibung`, `ObjTyp`) VALUES ('Bat Out of Hell', 14, 0, 0, NULL, 3);
INSERT INTO `TabelleBüchereiBestand` (`NameObj`, `IDObj`, `ObjLeihStatus`, `ObjResStatus`, `ObjBeschreibung`, `ObjTyp`) VALUES ('Rumours', 15, 0, 0, NULL, 3);
INSERT INTO `TabelleBüchereiBestand` (`NameObj`, `IDObj`, `ObjLeihStatus`, `ObjResStatus`, `ObjBeschreibung`, `ObjTyp`) VALUES ('Come on Over', 16, 0, 0, NULL, 3);
INSERT INTO `TabelleBüchereiBestand` (`NameObj`, `IDObj`, `ObjLeihStatus`, `ObjResStatus`, `ObjBeschreibung`, `ObjTyp`) VALUES ('Led Zeppelin IV', 17, 0, 0, NULL, 3);
INSERT INTO `TabelleBüchereiBestand` (`NameObj`, `IDObj`, `ObjLeihStatus`, `ObjResStatus`, `ObjBeschreibung`, `ObjTyp`) VALUES ('Bad', 18, 0, 0, NULL, 3);
INSERT INTO `TabelleBüchereiBestand` (`NameObj`, `IDObj`, `ObjLeihStatus`, `ObjResStatus`, `ObjBeschreibung`, `ObjTyp`) VALUES ('Jagged Little Piece', 19, 0, 0, NULL, 3);
INSERT INTO `TabelleBüchereiBestand` (`NameObj`, `IDObj`, `ObjLeihStatus`, `ObjResStatus`, `ObjBeschreibung`, `ObjTyp`) VALUES ('Dangerous', 20, 0, 0, NULL, 3);
INSERT INTO `TabelleBüchereiBestand` (`NameObj`, `IDObj`, `ObjLeihStatus`, `ObjResStatus`, `ObjBeschreibung`, `ObjTyp`) VALUES ('Avatar', 21, 0, 0, NULL, 5);
INSERT INTO `TabelleBüchereiBestand` (`NameObj`, `IDObj`, `ObjLeihStatus`, `ObjResStatus`, `ObjBeschreibung`, `ObjTyp`) VALUES ('Avengers: Endgame', 22, 0, 0, NULL, 5);
INSERT INTO `TabelleBüchereiBestand` (`NameObj`, `IDObj`, `ObjLeihStatus`, `ObjResStatus`, `ObjBeschreibung`, `ObjTyp`) VALUES ('Titanic', 23, 0, 0, NULL, 5);
INSERT INTO `TabelleBüchereiBestand` (`NameObj`, `IDObj`, `ObjLeihStatus`, `ObjResStatus`, `ObjBeschreibung`, `ObjTyp`) VALUES ('Star Wars: The Force Awakens', 24, 0, 0, NULL, 5);
INSERT INTO `TabelleBüchereiBestand` (`NameObj`, `IDObj`, `ObjLeihStatus`, `ObjResStatus`, `ObjBeschreibung`, `ObjTyp`) VALUES ('Avengers: Infinity War', 25, 0, 0, NULL, 5);
INSERT INTO `TabelleBüchereiBestand` (`NameObj`, `IDObj`, `ObjLeihStatus`, `ObjResStatus`, `ObjBeschreibung`, `ObjTyp`) VALUES ('Jurassic World', 26, 0, 0, NULL, 5);
INSERT INTO `TabelleBüchereiBestand` (`NameObj`, `IDObj`, `ObjLeihStatus`, `ObjResStatus`, `ObjBeschreibung`, `ObjTyp`) VALUES ('The Lion King', 27, 0, 0, NULL, 5);
INSERT INTO `TabelleBüchereiBestand` (`NameObj`, `IDObj`, `ObjLeihStatus`, `ObjResStatus`, `ObjBeschreibung`, `ObjTyp`) VALUES ('The Avengers', 28, 0, 0, NULL, 5);
INSERT INTO `TabelleBüchereiBestand` (`NameObj`, `IDObj`, `ObjLeihStatus`, `ObjResStatus`, `ObjBeschreibung`, `ObjTyp`) VALUES ('Furious 7', 29, 0, 0, NULL, 5);
INSERT INTO `TabelleBüchereiBestand` (`NameObj`, `IDObj`, `ObjLeihStatus`, `ObjResStatus`, `ObjBeschreibung`, `ObjTyp`) VALUES ('Frozen II', 30, 0, 0, NULL, 5);
INSERT INTO `TabelleBüchereiBestand` (`NameObj`, `IDObj`, `ObjLeihStatus`, `ObjResStatus`, `ObjBeschreibung`, `ObjTyp`) VALUES ('Süddeutsche Zeitung', 31, 0, 0, NULL, 6);
INSERT INTO `TabelleBüchereiBestand` (`NameObj`, `IDObj`, `ObjLeihStatus`, `ObjResStatus`, `ObjBeschreibung`, `ObjTyp`) VALUES ('Frankfurter Allgemeine Zeitung', 32, 0, 0, NULL, 6);
INSERT INTO `TabelleBüchereiBestand` (`NameObj`, `IDObj`, `ObjLeihStatus`, `ObjResStatus`, `ObjBeschreibung`, `ObjTyp`) VALUES ('Die Welt', 33, 0, 0, NULL, 6);
INSERT INTO `TabelleBüchereiBestand` (`NameObj`, `IDObj`, `ObjLeihStatus`, `ObjResStatus`, `ObjBeschreibung`, `ObjTyp`) VALUES ('Handelsblatt', 34, 0, 0, NULL, 6);
INSERT INTO `TabelleBüchereiBestand` (`NameObj`, `IDObj`, `ObjLeihStatus`, `ObjResStatus`, `ObjBeschreibung`, `ObjTyp`) VALUES ('Der Tagesspiegelt', 35, 0, 0, NULL, 6);
INSERT INTO `TabelleBüchereiBestand` (`NameObj`, `IDObj`, `ObjLeihStatus`, `ObjResStatus`, `ObjBeschreibung`, `ObjTyp`) VALUES ('Die Tageszeitung', 36, 0, 0, NULL, 6);
INSERT INTO `TabelleBüchereiBestand` (`NameObj`, `IDObj`, `ObjLeihStatus`, `ObjResStatus`, `ObjBeschreibung`, `ObjTyp`) VALUES ('Neues Deutschland', 37, 0, 0, NULL, 6);
INSERT INTO `TabelleBüchereiBestand` (`NameObj`, `IDObj`, `ObjLeihStatus`, `ObjResStatus`, `ObjBeschreibung`, `ObjTyp`) VALUES ('Junge Welt', 38, 0, 0, NULL, 6);
INSERT INTO `TabelleBüchereiBestand` (`NameObj`, `IDObj`, `ObjLeihStatus`, `ObjResStatus`, `ObjBeschreibung`, `ObjTyp`) VALUES ('Die Zeit', 39, 0, 0, NULL, 6);
INSERT INTO `TabelleBüchereiBestand` (`NameObj`, `IDObj`, `ObjLeihStatus`, `ObjResStatus`, `ObjBeschreibung`, `ObjTyp`) VALUES ('Der Spiegel', 40, 0, 0, NULL, 0);
# 40 records

#
# Table structure for table 'TabelleKunden'
#

DROP TABLE IF EXISTS `TabelleKunden`;

CREATE TABLE `TabelleKunden` (
  `VornameKunde` VARCHAR(50) NOT NULL, 
  `NachnameKunde` VARCHAR(255), 
  `IDKunde` INTEGER NOT NULL AUTO_INCREMENT, 
  `AnschriftKunde` VARCHAR(50) NOT NULL, 
  INDEX (`IDKunde`), 
  PRIMARY KEY (`IDKunde`)
) ENGINE=myisam DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'TabelleKunden'
#

INSERT INTO `TabelleKunden` (`VornameKunde`, `NachnameKunde`, `IDKunde`, `AnschriftKunde`) VALUES ('Oskar', 'Eicher', 1, 'Jahnstrasse 52, Tuntenhausen');
INSERT INTO `TabelleKunden` (`VornameKunde`, `NachnameKunde`, `IDKunde`, `AnschriftKunde`) VALUES ('Torben', 'Macher', 2, 'Amsickstrasse 58, Berthelsdorf');
INSERT INTO `TabelleKunden` (`VornameKunde`, `NachnameKunde`, `IDKunde`, `AnschriftKunde`) VALUES ('Fritz', 'Brandis', 3, 'Rudolstaedter Strasse 52, Werlte');
INSERT INTO `TabelleKunden` (`VornameKunde`, `NachnameKunde`, `IDKunde`, `AnschriftKunde`) VALUES ('Mats', 'Quattlebaum', 4, 'Sonnenallee 38, Augsburg');
INSERT INTO `TabelleKunden` (`VornameKunde`, `NachnameKunde`, `IDKunde`, `AnschriftKunde`) VALUES ('Tobias', 'Steinitz', 5, 'Michaelkirchstrasse 9, Hohnhorst');
INSERT INTO `TabelleKunden` (`VornameKunde`, `NachnameKunde`, `IDKunde`, `AnschriftKunde`) VALUES ('Laurenz', 'Lippert', 6, 'Mühlenstrasse 43, Würzburg');
INSERT INTO `TabelleKunden` (`VornameKunde`, `NachnameKunde`, `IDKunde`, `AnschriftKunde`) VALUES ('Aaron', 'Schwan', 7, 'Alsterkrugchaussee 73, Leinburg');
INSERT INTO `TabelleKunden` (`VornameKunde`, `NachnameKunde`, `IDKunde`, `AnschriftKunde`) VALUES ('David', 'Gutenberg', 8, 'Sömmeringstrasse 85, Waibstadt');
INSERT INTO `TabelleKunden` (`VornameKunde`, `NachnameKunde`, `IDKunde`, `AnschriftKunde`) VALUES ('Bruno', 'Mengele', 9, 'Büsingstrasse 5, Hebertshausen');
INSERT INTO `TabelleKunden` (`VornameKunde`, `NachnameKunde`, `IDKunde`, `AnschriftKunde`) VALUES ('Gabriel', 'Starck', 10, 'Rhinstrasse 33, München');
INSERT INTO `TabelleKunden` (`VornameKunde`, `NachnameKunde`, `IDKunde`, `AnschriftKunde`) VALUES ('Doris', 'Gellner', 11, 'Potsdamer Platz 62, Wasserburg');
INSERT INTO `TabelleKunden` (`VornameKunde`, `NachnameKunde`, `IDKunde`, `AnschriftKunde`) VALUES ('Sissi', 'Simmel', 12, 'Budapester Strasse 76, Simmern/Hunsrück');
INSERT INTO `TabelleKunden` (`VornameKunde`, `NachnameKunde`, `IDKunde`, `AnschriftKunde`) VALUES ('Maria', 'Rohrmann', 13, 'Eschenweg 7, Rudolstadt');
INSERT INTO `TabelleKunden` (`VornameKunde`, `NachnameKunde`, `IDKunde`, `AnschriftKunde`) VALUES ('Enni', 'Fischler', 14, 'Hardenbergstrasse 86, Hauenstein');
INSERT INTO `TabelleKunden` (`VornameKunde`, `NachnameKunde`, `IDKunde`, `AnschriftKunde`) VALUES ('Carolin', 'Spiess', 15, 'Knesebeckstrasse 4, Leimbach');
INSERT INTO `TabelleKunden` (`VornameKunde`, `NachnameKunde`, `IDKunde`, `AnschriftKunde`) VALUES ('Aline', 'Nayr', 16, 'Inge Beisheim Platz 7, Deutsch Evern');
INSERT INTO `TabelleKunden` (`VornameKunde`, `NachnameKunde`, `IDKunde`, `AnschriftKunde`) VALUES ('Rebecca', 'Grohl', 17, 'Los-Angeles-Platz 8, Hamburg Sinstorf');
INSERT INTO `TabelleKunden` (`VornameKunde`, `NachnameKunde`, `IDKunde`, `AnschriftKunde`) VALUES ('Luca', 'Heck', 18, 'Schillerstrasse 78, Landsberg');
INSERT INTO `TabelleKunden` (`VornameKunde`, `NachnameKunde`, `IDKunde`, `AnschriftKunde`) VALUES ('Bianka', 'Koehne', 19, 'Hermannstrasse 17, Mörstadt');
INSERT INTO `TabelleKunden` (`VornameKunde`, `NachnameKunde`, `IDKunde`, `AnschriftKunde`) VALUES ('Zara', 'Gessner', 20, 'Güntzelstrasse 22, Zemmer');
# 20 records

#
# Table structure for table 'TabelleMedienArten'
#

DROP TABLE IF EXISTS `TabelleMedienArten`;

CREATE TABLE `TabelleMedienArten` (
  `NameMedienArt` VARCHAR(50), 
  `IDMedienArt` INTEGER NOT NULL AUTO_INCREMENT, 
  `IsAusleihbar` TINYINT(1), 
  INDEX (`IDMedienArt`), 
  PRIMARY KEY (`IDMedienArt`)
) ENGINE=myisam DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'TabelleMedienArten'
#

INSERT INTO `TabelleMedienArten` (`NameMedienArt`, `IDMedienArt`, `IsAusleihbar`) VALUES ('Buch', 1, 1);
INSERT INTO `TabelleMedienArten` (`NameMedienArt`, `IDMedienArt`, `IsAusleihbar`) VALUES ('Zeitschrift', 2, 1);
INSERT INTO `TabelleMedienArten` (`NameMedienArt`, `IDMedienArt`, `IsAusleihbar`) VALUES ('Musik-CD', 3, 1);
INSERT INTO `TabelleMedienArten` (`NameMedienArt`, `IDMedienArt`, `IsAusleihbar`) VALUES ('Film auf Video', 4, 1);
INSERT INTO `TabelleMedienArten` (`NameMedienArt`, `IDMedienArt`, `IsAusleihbar`) VALUES ('DVD', 5, 1);
INSERT INTO `TabelleMedienArten` (`NameMedienArt`, `IDMedienArt`, `IsAusleihbar`) VALUES ('Präsenz Zeitschrift', 6, 0);
# 6 records

#
# Table structure for table 'TabelleRückgaben'
#

DROP TABLE IF EXISTS `TabelleRückgaben`;

CREATE TABLE `TabelleRückgaben` (
  `IDRückgabe` INTEGER NOT NULL AUTO_INCREMENT, 
  `DatumRückgabe` DATETIME, 
  INDEX (`IDRückgabe`), 
  PRIMARY KEY (`IDRückgabe`)
) ENGINE=myisam DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'TabelleRückgaben'
#

# 0 records

