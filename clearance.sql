/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.24-MariaDB : Database - clearance
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`clearance` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `clearance`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(75) NOT NULL,
  `admin_username` varchar(75) NOT NULL,
  `admin_password` varchar(75) NOT NULL,
  `isloggedin` varchar(22) NOT NULL,
  `user_type` varchar(75) NOT NULL,
  `date_registered` timestamp NOT NULL DEFAULT current_timestamp(),
  `office_id` int(11) NOT NULL,
  `department_id` int(1) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

/*Data for the table `admin` */

insert  into `admin`(`admin_id`,`admin_name`,`admin_username`,`admin_password`,`isloggedin`,`user_type`,`date_registered`,`office_id`,`department_id`) values 
(9,'Kristian Tare','kristian123','123','','Office Admin','2022-12-16 06:00:07',10,0),
(11,'Admin','admin','admin54E','','Admin','2022-12-18 18:43:23',14,0),
(12,'Invoker','invokelist123','123','','Office Admin','2022-12-20 19:53:37',11,0),
(13,'Jesha Pondoc','jesha43','123','','Office Admin','2023-01-02 17:19:08',15,0),
(14,'Yongco','yongco123','123','','Office Admin','2023-02-03 15:46:34',16,0),
(15,'Al Cedric Dario','dario123','123','','Office Admin','2023-02-03 15:51:40',13,0),
(16,'Phoebe Ladua','phoebe23','123','','Office Admin','2023-02-03 15:55:24',17,0);

/*Table structure for table `clearance` */

DROP TABLE IF EXISTS `clearance`;

CREATE TABLE `clearance` (
  `clearance_id` int(11) NOT NULL AUTO_INCREMENT,
  `clearance_status` varchar(11) NOT NULL,
  `student_id` varchar(75) NOT NULL,
  `sy_sem_id` int(11) NOT NULL,
  `sem_id` int(11) NOT NULL,
  `clearance_type_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `office_id` int(11) NOT NULL,
  `date_created` varchar(75) NOT NULL,
  `date_cleared` date NOT NULL,
  `is_locked` tinyint(1) NOT NULL,
  PRIMARY KEY (`clearance_id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4;

/*Data for the table `clearance` */

insert  into `clearance`(`clearance_id`,`clearance_status`,`student_id`,`sy_sem_id`,`sem_id`,`clearance_type_id`,`course_id`,`office_id`,`date_created`,`date_cleared`,`is_locked`) values 
(47,'1','2019-70227',1,2,1,15,17,'2023-03-09','0000-00-00',0),
(48,'1','2019-70227',3,1,4,15,17,'2023-03-10','0000-00-00',0);

/*Table structure for table `clearance_details` */

DROP TABLE IF EXISTS `clearance_details`;

CREATE TABLE `clearance_details` (
  `clearance_details_id` int(11) NOT NULL AUTO_INCREMENT,
  `clearance_id` int(11) NOT NULL,
  `signing_office_id` int(11) NOT NULL,
  `date_cleared` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(75) NOT NULL,
  `sy_sem_id` int(11) NOT NULL,
  PRIMARY KEY (`clearance_details_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

/*Data for the table `clearance_details` */

insert  into `clearance_details`(`clearance_details_id`,`clearance_id`,`signing_office_id`,`date_cleared`,`status`,`sy_sem_id`) values 
(11,20,36,'2022-12-09 06:02:54','Cleared',3);

/*Table structure for table `clearance_type` */

DROP TABLE IF EXISTS `clearance_type`;

CREATE TABLE `clearance_type` (
  `clearance_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `clearance_type_name` varchar(75) NOT NULL,
  `clearance_type_description` varchar(1000) NOT NULL,
  PRIMARY KEY (`clearance_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `clearance_type` */

insert  into `clearance_type`(`clearance_type_id`,`clearance_type_name`,`clearance_type_description`) values 
(1,'Graduating ','This is the clearance for all graduating students of NMSCST students and all.'),
(2,'Transferring','This is the clearance type for all transferrring students who wants to transfer for another school.'),
(4,'Continuing','This is the clearance type for all continuing students of NMSCT.');

/*Table structure for table `course` */

DROP TABLE IF EXISTS `course`;

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(225) NOT NULL,
  `course_status` varchar(75) NOT NULL,
  `course_description` varchar(1000) NOT NULL,
  `office_id` int(11) NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

/*Data for the table `course` */

insert  into `course`(`course_id`,`course_name`,`course_status`,`course_description`,`office_id`) values 
(12,'Bachelor of Science in Biology','Active','',13),
(13,'AB PolScie','Active','',13),
(14,'Bachelor of Science in Information System','Active','This is the course for IS',17),
(15,'Bachelor of Science in Information Technology','Active','This is the course for IT',17);

/*Table structure for table `department` */

DROP TABLE IF EXISTS `department`;

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(75) NOT NULL,
  `department_email` varchar(75) NOT NULL,
  `department_phone_number` varchar(75) NOT NULL,
  `department_description` varchar(1000) NOT NULL,
  `department_status` varchar(75) NOT NULL,
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `department` */

insert  into `department`(`department_id`,`department_name`,`department_email`,`department_phone_number`,`department_description`,`department_status`) values 
(1,'School of Information and Technology','sict@gmail.com','09150468327','School of information and communication technology is so nice and awesome.','Inactive'),
(3,'School Arts and Sciences','sas@gmail.com','091324213123','This is test','Active'),
(4,'School of Business Administration','sbam@gmail.com','0924232113123','The School of Businesses ','active'),
(5,'School of Education','educ@gmail.com','0913242132','','Active'),
(6,'School of Technology','technology@gmail.com','092324212313','','Active');

/*Table structure for table `office` */

DROP TABLE IF EXISTS `office`;

CREATE TABLE `office` (
  `office_id` int(11) NOT NULL AUTO_INCREMENT,
  `office_name` varchar(75) NOT NULL,
  `office_email` varchar(75) NOT NULL,
  `office_phone_number` varchar(75) NOT NULL,
  `office_description` varchar(1000) NOT NULL,
  `office_status` varchar(75) NOT NULL,
  `is_department` tinyint(1) NOT NULL,
  PRIMARY KEY (`office_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

/*Data for the table `office` */

insert  into `office`(`office_id`,`office_name`,`office_email`,`office_phone_number`,`office_description`,`office_status`,`is_department`) values 
(10,'Accounting Office','tare.kristian@gmail.com','09232414221','This is the office of Accounting','Inactive',0),
(11,'School of Business Administration and Management','tare.kristian@gmail.com','0923241234','This is the school of SBAM.','Active',1),
(13,'School of Arts and Sciences','tare.kristian@gmail.com','092342242','This is the department of SAS.','Active',1),
(14,'System Administrator','tare.kristian@gmail.com','09150468327','This is the office of system administrator','Active',0),
(15,'Cahier','tare.kristian@gmail.com','092324123232','This is the office of the cashier.','Active',0),
(16,'OSA','tare.kristian@gmail.com','09123131321','This is the office for the OSA.','Active',0),
(17,'School of Information Communication and Technology','tare.kristian@gmail.com','0912312343','This is the office of SICT','Active',1);

/*Table structure for table `office_account waly apil` */

DROP TABLE IF EXISTS `office_account waly apil`;

CREATE TABLE `office_account waly apil` (
  `office_account_id` int(11) NOT NULL AUTO_INCREMENT,
  `office_account_username` varchar(75) NOT NULL,
  `office_account_password` varchar(75) NOT NULL,
  `office_account_status` varchar(75) NOT NULL,
  `office_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`office_account_id`),
  KEY `office_id` (`office_id`),
  CONSTRAINT `office_account waly apil_ibfk_1` FOREIGN KEY (`office_id`) REFERENCES `office` (`office_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `office_account waly apil` */

insert  into `office_account waly apil`(`office_account_id`,`office_account_username`,`office_account_password`,`office_account_status`,`office_id`) values 
(3,'cashier','123','Active',NULL);

/*Table structure for table `requirement` */

DROP TABLE IF EXISTS `requirement`;

CREATE TABLE `requirement` (
  `requirement_id` int(11) NOT NULL AUTO_INCREMENT,
  `requirement_details` varchar(255) NOT NULL,
  `signing_office_id` int(11) NOT NULL,
  `sy_sem_id` int(11) NOT NULL,
  `sem_id` int(11) NOT NULL,
  `student_id` varchar(75) NOT NULL,
  `clearance_type_id` int(11) NOT NULL,
  `is_complied` tinyint(1) NOT NULL,
  `date_cleared` date NOT NULL,
  PRIMARY KEY (`requirement_id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4;

/*Data for the table `requirement` */

/*Table structure for table `sem` */

DROP TABLE IF EXISTS `sem`;

CREATE TABLE `sem` (
  `sem_id` int(11) NOT NULL AUTO_INCREMENT,
  `sem_name` varchar(75) NOT NULL,
  PRIMARY KEY (`sem_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `sem` */

insert  into `sem`(`sem_id`,`sem_name`) values 
(1,'1st Semester'),
(2,'2nd Semester'),
(3,'Summer'),
(4,'Trimester');

/*Table structure for table `signing_office` */

DROP TABLE IF EXISTS `signing_office`;

CREATE TABLE `signing_office` (
  `signing_office_id` int(11) NOT NULL AUTO_INCREMENT,
  `office_id` int(11) NOT NULL,
  `sy_sem_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `clearance_type_id` int(11) NOT NULL,
  `is_locked` tinyint(1) NOT NULL,
  `status` varchar(75) NOT NULL,
  `date_cleared` datetime NOT NULL DEFAULT current_timestamp(),
  `sem_id` int(11) NOT NULL,
  PRIMARY KEY (`signing_office_id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4;

/*Data for the table `signing_office` */

insert  into `signing_office`(`signing_office_id`,`office_id`,`sy_sem_id`,`admin_id`,`department_id`,`clearance_type_id`,`is_locked`,`status`,`date_cleared`,`sem_id`) values 
(50,10,1,9,0,1,0,'','2023-02-03 14:19:07',2),
(51,15,1,13,0,1,0,'','2023-02-03 15:42:18',2),
(55,16,1,14,0,4,0,'','2023-03-09 14:35:24',1),
(56,13,1,15,0,4,0,'','2023-03-09 15:09:18',1),
(75,17,1,16,0,1,0,'','2023-03-15 08:19:53',2);

/*Table structure for table `student` */

DROP TABLE IF EXISTS `student`;

CREATE TABLE `student` (
  `student_id` varchar(75) NOT NULL,
  `student_first_name` varchar(75) NOT NULL,
  `student_last_name` varchar(75) NOT NULL,
  `student_year` varchar(75) NOT NULL,
  `course_id` int(11) NOT NULL,
  `office_id` int(11) NOT NULL,
  `student_gender` varchar(75) NOT NULL,
  `student_email` varchar(255) NOT NULL,
  `student_username` varchar(75) NOT NULL,
  `student_password` varchar(75) NOT NULL,
  `student_status` varchar(75) NOT NULL,
  `student_profile` varchar(255) NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `student` */

insert  into `student`(`student_id`,`student_first_name`,`student_last_name`,`student_year`,`course_id`,`office_id`,`student_gender`,`student_email`,`student_username`,`student_password`,`student_status`,`student_profile`) values 
('2018-2414','Abby Gale','Rondina','3rd Year',10,13,'Male','doday@gmail.com','2018-2414','123','Inactive','1672651460doday.jpg'),
('2019-2014','Lebron','Siglos','2nd Year',13,11,'Male','lebron@gmail.com','2019-2014','123','Active','1678078178tulips.jpg'),
('2019-70227','Kristian Kharl','Tare','4th Year',15,17,'Male','tare.kristian@gmail.com','2019-70227','123','Active','6409784822934.jpg'),
('2020-3234','Phoebe','Ladua','4th Year',12,13,'Female','phoebe@gmail.com','2020-3234','123','Active','1671932689312491292_508684841138118_7881797655818735404_n.jpg'),
('﻿2019-70227','Preach','Tare23','4th Year',15,17,'Male','tare.kristian@gmail.com','2019-70227Dario','123','Active',''),
('﻿2019-87283','John ','Doe','3rd Year',13,13,'Male','john@gmail.com','2019-87283','123','Active','63a7b8b7dd32a.jpg');

/*Table structure for table `sy_sem` */

DROP TABLE IF EXISTS `sy_sem`;

CREATE TABLE `sy_sem` (
  `sy_sem_id` int(11) NOT NULL AUTO_INCREMENT,
  `school_year_and_sem` varchar(75) NOT NULL,
  `status` varchar(75) NOT NULL,
  `sem_id` int(11) NOT NULL,
  PRIMARY KEY (`sy_sem_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `sy_sem` */

insert  into `sy_sem`(`sy_sem_id`,`school_year_and_sem`,`status`,`sem_id`) values 
(1,'2022-2023 ','Active',4),
(3,'2023-2024','Active',3),
(4,'2024-2025 ','Active',2),
(5,'2025-2026','Inactive',4),
(6,'2026-2027','Inactive',1);

/*Table structure for table `upload` */

DROP TABLE IF EXISTS `upload`;

CREATE TABLE `upload` (
  `upload_id` int(11) NOT NULL AUTO_INCREMENT,
  `date_uploaded` datetime NOT NULL DEFAULT current_timestamp(),
  `student_id` int(11) NOT NULL,
  `requirement_id` int(11) NOT NULL,
  PRIMARY KEY (`upload_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `upload` */

/*Table structure for table `admin_account` */

DROP TABLE IF EXISTS `admin_account`;

/*!50001 DROP VIEW IF EXISTS `admin_account` */;
/*!50001 DROP TABLE IF EXISTS `admin_account` */;

/*!50001 CREATE TABLE  `admin_account`(
 `admin_id` int(11) ,
 `admin_name` varchar(75) ,
 `admin_username` varchar(75) ,
 `admin_password` varchar(75) ,
 `date_registered` timestamp ,
 `user_type` varchar(75) ,
 `office_id` int(11) ,
 `office_name` varchar(75) ,
 `is_department` tinyint(1) 
)*/;

/*Table structure for table `course_view` */

DROP TABLE IF EXISTS `course_view`;

/*!50001 DROP VIEW IF EXISTS `course_view` */;
/*!50001 DROP TABLE IF EXISTS `course_view` */;

/*!50001 CREATE TABLE  `course_view`(
 `course_id` int(11) ,
 `course_name` varchar(225) ,
 `course_description` varchar(1000) ,
 `course_status` varchar(75) ,
 `office_id` int(11) ,
 `office_name` varchar(75) ,
 `is_department` tinyint(1) 
)*/;

/*Table structure for table `new_signing_info` */

DROP TABLE IF EXISTS `new_signing_info`;

/*!50001 DROP VIEW IF EXISTS `new_signing_info` */;
/*!50001 DROP TABLE IF EXISTS `new_signing_info` */;

/*!50001 CREATE TABLE  `new_signing_info`(
 `clearance_details_id` int(11) ,
 `clearance_id` int(11) ,
 `signing_office_id` int(11) ,
 `date_cleared` datetime ,
 `sy_sem_id` int(11) ,
 `status` varchar(75) ,
 `office_id` int(11) ,
 `office_name` varchar(75) 
)*/;

/*Table structure for table `new_signing_offices` */

DROP TABLE IF EXISTS `new_signing_offices`;

/*!50001 DROP VIEW IF EXISTS `new_signing_offices` */;
/*!50001 DROP TABLE IF EXISTS `new_signing_offices` */;

/*!50001 CREATE TABLE  `new_signing_offices`(
 `signing_office_id` int(11) ,
 `office_id` int(11) ,
 `office_name` varchar(75) ,
 `office_email` varchar(75) ,
 `sy_sem_id` int(11) ,
 `school_year_and_sem` varchar(75) ,
 `sem_id` int(11) ,
 `sem_name` varchar(75) ,
 `admin_id` int(11) ,
 `admin_name` varchar(75) ,
 `clearance_type_name` varchar(75) ,
 `clearance_type_id` int(11) 
)*/;

/*Table structure for table `new_student` */

DROP TABLE IF EXISTS `new_student`;

/*!50001 DROP VIEW IF EXISTS `new_student` */;
/*!50001 DROP TABLE IF EXISTS `new_student` */;

/*!50001 CREATE TABLE  `new_student`(
 `student_id` varchar(75) ,
 `student_first_name` varchar(75) ,
 `student_last_name` varchar(75) ,
 `student_year` varchar(75) ,
 `course_id` int(11) ,
 `course_name` varchar(225) ,
 `student_status` varchar(75) ,
 `office_name` varchar(75) ,
 `student_gender` varchar(75) ,
 `student_email` varchar(255) ,
 `student_username` varchar(75) ,
 `student_password` varchar(75) 
)*/;

/*Table structure for table `requirement_view` */

DROP TABLE IF EXISTS `requirement_view`;

/*!50001 DROP VIEW IF EXISTS `requirement_view` */;
/*!50001 DROP TABLE IF EXISTS `requirement_view` */;

/*!50001 CREATE TABLE  `requirement_view`(
 `requirement_id` int(11) ,
 `requirement_details` varchar(255) ,
 `is_complied` tinyint(1) ,
 `date_cleared` date ,
 `signing_office_id` int(11) ,
 `office_id` int(11) ,
 `office_name` varchar(75) ,
 `sy_sem_id` int(11) ,
 `school_year_and_sem` varchar(75) ,
 `status` varchar(75) ,
 `student_id` varchar(75) ,
 `student_first_name` varchar(75) ,
 `student_last_name` varchar(75) ,
 `clearance_type_id` int(11) ,
 `clearance_type_name` varchar(75) 
)*/;

/*Table structure for table `school_year` */

DROP TABLE IF EXISTS `school_year`;

/*!50001 DROP VIEW IF EXISTS `school_year` */;
/*!50001 DROP TABLE IF EXISTS `school_year` */;

/*!50001 CREATE TABLE  `school_year`(
 `sy_sem_id` int(11) ,
 `school_year_and_sem` varchar(75) ,
 `sem_id` int(11) ,
 `status` varchar(75) ,
 `sem_name` varchar(75) 
)*/;

/*Table structure for table `student_details` */

DROP TABLE IF EXISTS `student_details`;

/*!50001 DROP VIEW IF EXISTS `student_details` */;
/*!50001 DROP TABLE IF EXISTS `student_details` */;

/*!50001 CREATE TABLE  `student_details`(
 `student_id` varchar(75) ,
 `student_first_name` varchar(75) ,
 `student_last_name` varchar(75) ,
 `student_year` varchar(75) ,
 `course_id` int(11) ,
 `course_name` varchar(225) ,
 `student_status` varchar(75) ,
 `office_id` int(11) ,
 `office_name` varchar(75) ,
 `student_gender` varchar(75) ,
 `student_email` varchar(255) ,
 `student_username` varchar(75) ,
 `student_password` varchar(75) ,
 `student_profile` varchar(255) 
)*/;

/*Table structure for table `view_clearance` */

DROP TABLE IF EXISTS `view_clearance`;

/*!50001 DROP VIEW IF EXISTS `view_clearance` */;
/*!50001 DROP TABLE IF EXISTS `view_clearance` */;

/*!50001 CREATE TABLE  `view_clearance`(
 `clearance_id` int(11) ,
 `student_id` varchar(75) ,
 `student_first_name` varchar(75) ,
 `student_last_name` varchar(75) ,
 `student_year` varchar(75) ,
 `course_id` int(11) ,
 `course_name` varchar(225) ,
 `office_id` int(11) ,
 `office_name` varchar(75) ,
 `is_department` tinyint(1) ,
 `sy_sem_id` int(11) ,
 `school_year_and_sem` varchar(75) ,
 `sem_id` int(11) ,
 `sem_name` varchar(75) ,
 `clearance_type_id` int(11) ,
 `clearance_type_name` varchar(75) ,
 `clearance_status` varchar(11) ,
 `date_created` varchar(75) ,
 `date_cleared` date 
)*/;

/*View structure for view admin_account */

/*!50001 DROP TABLE IF EXISTS `admin_account` */;
/*!50001 DROP VIEW IF EXISTS `admin_account` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `admin_account` AS select `admin`.`admin_id` AS `admin_id`,`admin`.`admin_name` AS `admin_name`,`admin`.`admin_username` AS `admin_username`,`admin`.`admin_password` AS `admin_password`,`admin`.`date_registered` AS `date_registered`,`admin`.`user_type` AS `user_type`,`office`.`office_id` AS `office_id`,`office`.`office_name` AS `office_name`,`office`.`is_department` AS `is_department` from (`admin` join `office`) where `admin`.`office_id` = `office`.`office_id` */;

/*View structure for view course_view */

/*!50001 DROP TABLE IF EXISTS `course_view` */;
/*!50001 DROP VIEW IF EXISTS `course_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `course_view` AS select `course`.`course_id` AS `course_id`,`course`.`course_name` AS `course_name`,`course`.`course_description` AS `course_description`,`course`.`course_status` AS `course_status`,`office`.`office_id` AS `office_id`,`office`.`office_name` AS `office_name`,`office`.`is_department` AS `is_department` from (`course` join `office` on(`course`.`office_id` = `office`.`office_id`)) */;

/*View structure for view new_signing_info */

/*!50001 DROP TABLE IF EXISTS `new_signing_info` */;
/*!50001 DROP VIEW IF EXISTS `new_signing_info` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `new_signing_info` AS select `clearance_details`.`clearance_details_id` AS `clearance_details_id`,`clearance_details`.`clearance_id` AS `clearance_id`,`clearance_details`.`signing_office_id` AS `signing_office_id`,`clearance_details`.`date_cleared` AS `date_cleared`,`clearance_details`.`sy_sem_id` AS `sy_sem_id`,`clearance_details`.`status` AS `status`,`signing_office`.`office_id` AS `office_id`,`office`.`office_name` AS `office_name` from ((`clearance_details` join `signing_office` on(`clearance_details`.`signing_office_id` = `signing_office`.`signing_office_id`)) join `office` on(`signing_office`.`office_id` = `office`.`office_id`)) */;

/*View structure for view new_signing_offices */

/*!50001 DROP TABLE IF EXISTS `new_signing_offices` */;
/*!50001 DROP VIEW IF EXISTS `new_signing_offices` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `new_signing_offices` AS select `signing_office`.`signing_office_id` AS `signing_office_id`,`office`.`office_id` AS `office_id`,`office`.`office_name` AS `office_name`,`office`.`office_email` AS `office_email`,`sy_sem`.`sy_sem_id` AS `sy_sem_id`,`sy_sem`.`school_year_and_sem` AS `school_year_and_sem`,`sem`.`sem_id` AS `sem_id`,`sem`.`sem_name` AS `sem_name`,`admin`.`admin_id` AS `admin_id`,`admin`.`admin_name` AS `admin_name`,`clearance_type`.`clearance_type_name` AS `clearance_type_name`,`clearance_type`.`clearance_type_id` AS `clearance_type_id` from (((((`signing_office` join `office` on(`signing_office`.`office_id` = `office`.`office_id`)) join `sy_sem` on(`signing_office`.`sy_sem_id` = `sy_sem`.`sy_sem_id`)) join `sem` on(`signing_office`.`sem_id` = `sem`.`sem_id`)) join `admin` on(`signing_office`.`admin_id` = `admin`.`admin_id`)) join `clearance_type` on(`signing_office`.`clearance_type_id` = `clearance_type`.`clearance_type_id`)) */;

/*View structure for view new_student */

/*!50001 DROP TABLE IF EXISTS `new_student` */;
/*!50001 DROP VIEW IF EXISTS `new_student` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `new_student` AS select `student`.`student_id` AS `student_id`,`student`.`student_first_name` AS `student_first_name`,`student`.`student_last_name` AS `student_last_name`,`student`.`student_year` AS `student_year`,`course`.`course_id` AS `course_id`,`course`.`course_name` AS `course_name`,`student`.`student_status` AS `student_status`,`office`.`office_name` AS `office_name`,`student`.`student_gender` AS `student_gender`,`student`.`student_email` AS `student_email`,`student`.`student_username` AS `student_username`,`student`.`student_password` AS `student_password` from ((`student` join `course` on(`student`.`course_id` = `course`.`course_id`)) join `office` on(`student`.`office_id` = `office`.`office_id`)) */;

/*View structure for view requirement_view */

/*!50001 DROP TABLE IF EXISTS `requirement_view` */;
/*!50001 DROP VIEW IF EXISTS `requirement_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `requirement_view` AS select `requirement`.`requirement_id` AS `requirement_id`,`requirement`.`requirement_details` AS `requirement_details`,`requirement`.`is_complied` AS `is_complied`,`requirement`.`date_cleared` AS `date_cleared`,`signing_office`.`signing_office_id` AS `signing_office_id`,`office`.`office_id` AS `office_id`,`office`.`office_name` AS `office_name`,`sy_sem`.`sy_sem_id` AS `sy_sem_id`,`sy_sem`.`school_year_and_sem` AS `school_year_and_sem`,`sy_sem`.`status` AS `status`,`student`.`student_id` AS `student_id`,`student`.`student_first_name` AS `student_first_name`,`student`.`student_last_name` AS `student_last_name`,`clearance_type`.`clearance_type_id` AS `clearance_type_id`,`clearance_type`.`clearance_type_name` AS `clearance_type_name` from (((((`requirement` join `signing_office` on(`requirement`.`signing_office_id` = `signing_office`.`signing_office_id`)) join `office` on(`signing_office`.`office_id` = `office`.`office_id`)) join `sy_sem` on(`requirement`.`sy_sem_id` = `sy_sem`.`sy_sem_id`)) join `student` on(`requirement`.`student_id` = `student`.`student_id`)) join `clearance_type` on(`requirement`.`clearance_type_id` = `clearance_type`.`clearance_type_id`)) */;

/*View structure for view school_year */

/*!50001 DROP TABLE IF EXISTS `school_year` */;
/*!50001 DROP VIEW IF EXISTS `school_year` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `school_year` AS select `sy_sem`.`sy_sem_id` AS `sy_sem_id`,`sy_sem`.`school_year_and_sem` AS `school_year_and_sem`,`sy_sem`.`sem_id` AS `sem_id`,`sy_sem`.`status` AS `status`,`sem`.`sem_name` AS `sem_name` from (`sy_sem` join `sem` on(`sy_sem`.`sem_id` = `sem`.`sem_id`)) */;

/*View structure for view student_details */

/*!50001 DROP TABLE IF EXISTS `student_details` */;
/*!50001 DROP VIEW IF EXISTS `student_details` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `student_details` AS select `student`.`student_id` AS `student_id`,`student`.`student_first_name` AS `student_first_name`,`student`.`student_last_name` AS `student_last_name`,`student`.`student_year` AS `student_year`,`course`.`course_id` AS `course_id`,`course`.`course_name` AS `course_name`,`student`.`student_status` AS `student_status`,`office`.`office_id` AS `office_id`,`office`.`office_name` AS `office_name`,`student`.`student_gender` AS `student_gender`,`student`.`student_email` AS `student_email`,`student`.`student_username` AS `student_username`,`student`.`student_password` AS `student_password`,`student`.`student_profile` AS `student_profile` from ((`student` join `course` on(`student`.`course_id` = `course`.`course_id`)) join `office` on(`student`.`office_id` = `office`.`office_id`)) */;

/*View structure for view view_clearance */

/*!50001 DROP TABLE IF EXISTS `view_clearance` */;
/*!50001 DROP VIEW IF EXISTS `view_clearance` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_clearance` AS select `clearance`.`clearance_id` AS `clearance_id`,`student`.`student_id` AS `student_id`,`student`.`student_first_name` AS `student_first_name`,`student`.`student_last_name` AS `student_last_name`,`student`.`student_year` AS `student_year`,`course`.`course_id` AS `course_id`,`course`.`course_name` AS `course_name`,`office`.`office_id` AS `office_id`,`office`.`office_name` AS `office_name`,`office`.`is_department` AS `is_department`,`sy_sem`.`sy_sem_id` AS `sy_sem_id`,`sy_sem`.`school_year_and_sem` AS `school_year_and_sem`,`sem`.`sem_id` AS `sem_id`,`sem`.`sem_name` AS `sem_name`,`clearance_type`.`clearance_type_id` AS `clearance_type_id`,`clearance_type`.`clearance_type_name` AS `clearance_type_name`,`clearance`.`clearance_status` AS `clearance_status`,`clearance`.`date_created` AS `date_created`,`clearance`.`date_cleared` AS `date_cleared` from ((((((`clearance` join `student` on(`clearance`.`student_id` = `student`.`student_id`)) join `course` on(`clearance`.`course_id` = `course`.`course_id`)) join `office` on(`clearance`.`office_id` = `office`.`office_id`)) join `sy_sem` on(`clearance`.`sy_sem_id` = `sy_sem`.`sy_sem_id`)) join `sem` on(`clearance`.`sem_id` = `sem`.`sem_id`)) join `clearance_type` on(`clearance`.`clearance_type_id` = `clearance_type`.`clearance_type_id`)) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
