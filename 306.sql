CREATE DATABASE  IF NOT EXISTS `Sabanci-Home`;

-- problem table
DROP TABLE IF EXISTS `problem`;
CREATE TABLE `problem` (
  `problem_id` int,
  `problem_name` varchar(200) NOT NULL ,
  `weight` varchar(20) NOT NULL DEFAULT 'easy',
  PRIMARY KEY (`problem_id`)
)

-- -- problem table insert data

-- INSERT INTO `problem ` VALUES (101,'Interlake','easy'),(102,'Interlake','medium'),(103,'Clipper','hard'),(104,'Marine','easy'),(105,'Titanic','hard');



-- chunk table
DROP TABLE IF EXISTS `chunk`
CREATE TABLE `chunk` (
  `chunk_id` int(5) NOT NULL,
  `weight` varchar(20) NOT NULL,
  'code' varchar(16), --Will add a andaddress system for files

  PRIMARY KEY (`chunk_id`)
)

-- -- chunk table insert data
-- LOCK TABLES `chunk` WRITE;
-- INSERT INTO `problem` VALUES (201,'Interlake','easy'),(202,'Interlake','medium'),(203,'Clipper','hard'),(204,'Marine','easy'),(205,'Titanic','hard');
-- UNLOCK TABLES;

-- customer table
DROP TABLE IF EXISTS `Customer`
CREATE TABLE `Customer` (
  `user_id` int(5) NOT NULL ,
  'email' varchar(50),
  'password' varchar(50),
  'name' varchar(100),
  `business_type` varchar(200),
  `flop_demand` int(20),
  `problem_count` int(5),
  PRIMARY KEY (`user_id`)
)

-- customer table insert data
-- LOCK TABLES `customer` WRITE;
-- INSERT INTO `customer` VALUES (301,'Business Type1', 5, 6), (302,'Business Type2', 5, 6), (303,'Business Type3', 5, 6), (304,'Business Type4', 5, 6), (305,'Business Type5', 5, 6);
-- UNLOCK TABLES;



-- belongs table
DROP TABLE IF EXISTS `problem_chunk`;
CREATE TABLE `problem_chunk` (
  `problem_id` int(5) NOT NULL,
  `chunk_id` int(5) NOT NULL,
  PRIMARY KEY (`bid`),
  FOREIGN KEY (`problem_id`) REFERENCES `problem` (`problem_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  FOREIGN KEY (`chunk_id`) REFERENCES `chunk` (`chunk_id`) ON DELETE CASCADE ON UPDATE NO ACTION
)


-- customer_problem
DROP TABLE IF EXISTS `customer_problem`;
CREATE TABLE `customer_problem` (
  `customer_id` int(10) NOT NULL,
  `problem_id` int(10) NOT NULL,
  `date_posted` varchar(10) NOT NULL,
  `deadline` varchar(10) NOT NULL,
  PRIMARY KEY (`customer_id`),
  FOREIGN KEY (`customer_id`) REFERENCES `Customer` (`customer_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  FOREIGN KEY (`problem_id`) REFERENCES `problem` (`problem_id`) ON DELETE CASCADE ON UPDATE NO ACTION
)
-- LOCK TABLES `reserves` WRITE;
-- INSERT INTO `reserves` VALUES (301,201,'2014-02-19','2014-02-19'), (301,201,'2014-02-19','2014-02-19'),(301,201,'2014-02-19','2014-02-19'),(301,201,'2014-02-19','2014-02-19'), (301,201,'2014-02-19','2014-02-19') ;
-- UNLOCK TABLES;

DROP TABLE IF EXISTS 'Computer';
CREATE TABLE 'Computer' (
  'comp_id' INTEGER AUTO_INCREMENT,
  'core_count' INTEGER NOT NULL,
  'gpu_core_count' INTEGER DEFAULT 0,
  'add_more' INTEGER,
  PRIMARY KEY ('comp_id')
);

DROP TABLE IF EXISTS 'Payments';
CREATE TABLE 'Payments' (
  'payment_id' INTEGER AUTO_INCREMENT,
  'problem_id' INTEGER,
  'chunk_id' INTEGER,
  'amount' FLOAT, -- double check this
  'date' DATE,
  'payer' INTEGER,
  'payee' INTEGER,
  PRIMARY KEY ('payment_id'),
  UNIQUE FOREIGN KEY ('payer') REFERENCES Customer ('user_id') ON DELETE DEFAULT;
  UNIQUE FOREIGN KEY ('payee') REFERENCES Donator ('user_id') ON DELETE DEFAULT;
);

DROP TABLE IF EXISTS SolveStat;
CREATE TABLE SolveStat (
  'compId' INTEGER NOT NULL,
  'chunkId' INTEGER,
  'status' VARCHAR(20),
  'last_changed_at' DATE,
  PRIMARY KEY ('chunkId'),
  UNIQUE FOREIGN KEY ('chunkId') REFERENCES chunk ('chunk_id') ON DELETE CASCADE,
);

DROP TABLE IF EXISTS Donator;
CREATE TABLE Donator (
  
);