SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
CREATE TABLE IF NOT EXISTS `student`(
    `studentid` int(11) NOT NULL,
    `name` varchar(100) NOT NULL,
    `father_name` varchar(50) NOT NULL,
    `course` varchar(50) NOT NULL,
    `year` varchar(4) NOT NULL,
    `semail` varchar(50) NOT NULL,
    `contact` varchar(10) NOT NULL,
    `dob` date NOT NULL,
    `gender` enum('m','f') NOT NULL DEFAULT 'f',
   
    `passwords` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1; 
INSERT INTO `student` (`studentid`,`name`,`father_name`,`course`,`year`,`semail`,`contact`
,`dob`,`gender`,`passwords`) VALUES
(1,'abc','dfg','cms','2018','abd@gmail.com','1234567890','2001-09-01','m','123@');
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentid`);
 



CREATE TABLE IF NOT EXISTS `staff`(
    `staffid` int(11) NOT NULL,
    `sname` varchar(100) NOT NULL,
    `sfather_name` varchar(50) NOT NULL,
    `department` varchar(50) NOT NULL,
    `course` varchar(50) NOT NULL,
    `year` varchar(4) NOT NULL,
    `staffemail` varchar(50) NOT NULL,
    `scontact` varchar(10) NOT NULL,
    `sdob` date NOT NULL,
    `sgender` enum('m','f') NOT NULL DEFAULT 'f',
    `saddress` varchar(200) NOT NULL,
     `spassword` varchar(50) NOT NULL

) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO `staff` (`staffid`,`sname`,`sfather_name`,`department`,`course`,`year`,`staffemail`,`scontact`
,`sdob`,`sgender`,`saddress`,`spassword`) VALUES
(1,'abcd','ddfg','Electrical','cmds','2018','abdd@gmail.com','1234996789','27-09-01','m','adf fghjk tyhj ghj','1273@');


ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffid`);