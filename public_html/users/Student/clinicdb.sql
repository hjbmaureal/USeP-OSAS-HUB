-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2021 at 12:22 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinicdb`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `ClinicInsertPatienInfo` (IN `userid` VARCHAR(11), IN `_admitted` VARCHAR(45), IN `_admitted_illness` VARCHAR(45), IN `_admitted_illness_start` VARCHAR(45), IN `_operation` VARCHAR(45), IN `_operation_kind` VARCHAR(45), IN `_infectious_disease` VARCHAR(45), IN `_headaches` VARCHAR(45), IN `_mens_start` VARCHAR(45), IN `_mens_regular` VARCHAR(45), IN `_mens_irregular` VARCHAR(45), IN `_dysmenorrhea` VARCHAR(45), IN `_pms` VARCHAR(45), IN `_swear_clause` VARCHAR(45))  BEGIN
	
	
    IF sf_check_if_user_exists(userid) > 0  THEN
		INSERT INTO clinic_patient_info (patient_id,admitted,admitted_illness,admitted_illness_start,operation,operation_kind,infectious_disease,headaches,swear_clause)
		VALUES (userid,_admitted,_admitted_illness,_admitted_illness_start,_operation,_operation_kind,_infectious_disease,_headaches,swear_clause);
			IF _mens_start is not null THEN
				INSERT INTO clinic_patient_info_female (patient_id,mens_age_start,mens_regular,mens_irregular,dysmenorrhea,pms) VALUES (userid,_mens_start,_mens_regular,_mens_irregular,_dysmenorrhea,_pms);
			END IF;
	ELSE
		SELECT 'USER DOES NOT EXIST' as testuser;
	END IF;
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spGetAllStudentDetails` (IN `id` VARCHAR(25))  BEGIN

SELECT
	s.reg_id,
    s.student_id,
    fullname(s.first_name,s.middle_name,s.last_name,s.title,s.suffix,'','firstname_first') as name,
    sf_get_course_name(s.course_id) as coursename,
    s.sex,
    s.civil_status,
    s.birth_date,
    s.birth_place,
    s.email_add,
    s.phone_number,
    s.religion,
    s.nationality,
    s.year_level,
    s.semester,
    s.school_year,
    s.account_status,    sf_get_full_address(s.house_block_lot_num,s.street,s.prk_vill_sub,s.brgy,s.city,s.province) as address,
    s.zip_code,
    ec.spouse_name,
    ec.spouse_occupation,
    ec.father_name,
    ec.father_occupation,
    ec.father_contact,
    ec.mother_name,
    ec.mother_occupation,
    ec.mother_contact,
    ec.living_with,
    ec.guardian_name,
    ec.guardian_contact,
    sf_check_org_affiliations(s.student_id) as org_details,
    s.pic,
    s.section,
    s.type

FROM
	student as s
JOIN
	emergency_contact as ec on ec.student_id = s.student_id
WHERE
	s.reg_id = id or s.student_id = id;
	

    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spRegisterStudent` (IN `_student_id` VARCHAR(15), IN `_lname` VARCHAR(50), IN `_fname` VARCHAR(50), IN `_mname` VARCHAR(50), IN `_suffix` VARCHAR(50), IN `_house_lot_number` VARCHAR(50), IN `_street` VARCHAR(50), IN `_purok` VARCHAR(50), IN `_brgy` VARCHAR(50), IN `_city` VARCHAR(50), IN `_province` VARCHAR(50), IN `_zip_code` VARCHAR(50), IN `_sex` VARCHAR(50), IN `_civil_status` VARCHAR(50), IN `_religion` VARCHAR(50), IN `_nationality` VARCHAR(50), IN `_birthdate` DATE, IN `_birthplace` VARCHAR(150), IN `_course_name` VARCHAR(50), IN `_yearlevel` VARCHAR(50), IN `_semester` VARCHAR(50), IN `_schoolyear` VARCHAR(50), IN `_section` VARCHAR(50), IN `_email_add` VARCHAR(50), IN `_contact_no` VARCHAR(50), IN `_org_name` VARCHAR(50), IN `_org_pstn` VARCHAR(50), IN `_student_type` VARCHAR(50), IN `_living_with` VARCHAR(50), IN `_father_name` VARCHAR(150), IN `_father_occupation` VARCHAR(50), IN `_father_contact` VARCHAR(50), IN `_mother_name` VARCHAR(150), IN `_mother_occupation` VARCHAR(50), IN `_mother_contact` VARCHAR(50), IN `_guardian_name` VARCHAR(150), IN `_guardian_contact` VARCHAR(50), IN `_spouse_name` VARCHAR(150), IN `_spouse_occupation` VARCHAR(50), IN `_pword` VARCHAR(255), IN `_pic` BLOB, IN `_cor` VARCHAR(255))  BEGIN
	DECLARE student_org_id INT;
    
    INSERT INTO student (student_id, course_id, last_name, first_name, middle_name, suffix, house_block_lot_num, street, prk_vill_sub, brgy, city, province, zip_code, nationality, civil_status, religion, sex, phone_number, birth_date, birth_place, email_add, section, year_level, semester, school_year, cor, type, pic, password, date_submitted ) VALUES ( _student_id, sf_get_id_by_name('course',_course_name),_lname,_fname,_mname,_suffix,_house_lot_number,_street,_purok,_brgy,_city,_province,_zip_code,_nationality,_civil_status,_religion,_sex,_contact_no,_birthdate,_birthplace,_email_add,_section,_yearlevel,_semester,_schoolyear,_cor,_student_type,_pic,_pword,curdate() );
    
    INSERT INTO emergency_contact (student_id,father_name,father_occupation,father_contact,mother_name,mother_occupation,mother_contact,living_with,guardian_name,guardian_contact,spouse_name,spouse_occupation) VALUES (_student_id,_father_name,_father_occupation,_father_contact,_mother_name,_mother_occupation,_mother_contact,_living_with,_guardian_name,_guardian_contact,_spouse_name,_spouse_occupation);
    
    
	IF _org_name != '' THEN
		SELECT sf_get_id_by_name('school_organization',_org_name) INTO student_org_id;
		IF student_org_id > 0 THEN
			INSERT INTO organization_member (org_id,student_id,position) VALUES (student_org_id,_student_id,_org_pstn);
        END IF;
	END IF;
    
    
END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `fullName` (`fname` VARCHAR(45), `mname` VARCHAR(45), `lname` VARCHAR(45), `title` VARCHAR(10), `suffix` VARCHAR(10), `extension` VARCHAR(25), `format` VARCHAR(20)) RETURNS VARCHAR(150) CHARSET utf8mb4 begin
	declare full_name varchar(150);
    
    IF format = 'lastname_first' THEN
    set full_name = concat(lname,', ',fname,' ',left(mname,1));
    
    ELSEIF format = 'firstname_first' THEN
    	set full_name = fname;
        IF LENGTH(mname) > 0 THEN
        	set full_name = concat(full_name,' ',left(mname,1),'.');
        END IF;
        set full_name = concat(full_name,' ',lname);
    
	ELSEIF format = 'with_extensions' THEN
    	        
        IF LENGTH(title) > 0 THEN
        	set full_name = CONCAT(title,'. ',fname,' ');
		ELSE
			 set full_name = concat(fname,' ');
        END IF;
        
		IF LENGTH(mname) > 0 THEN
        	set full_name = concat(full_name,left(mname,1),'. ',lname);
		ELSE
        	set full_name = concat(full_name,lname);
        END IF;  
        
        IF LENGTH(suffix) > 0 THEN
            set full_name = concat(full_name,' ',suffix);
        END IF;
        
        IF LENGTH(extension) > 0 THEN
            set full_name = concat(full_name,', ',extension);    	
        END IF;
       
       
    
    END IF;
        
        
        
    return (full_name);
end$$

CREATE DEFINER=`root`@`localhost` FUNCTION `function_name` (`testuser` VARCHAR(11)) RETURNS INT(1) BEGIN
	DECLARE flag INT;
    
    SELECT student_id INTO flag FROM student WHERE student_id = testuser;
    
    IF flag is null or flag = 0 THEN
		SELECT staff_id INTO flag FROM staff WHERE staff_id = testuser;
	ELSE
		set flag = 0;
	END IF;
    
    RETURN flag;

END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_check_if_user_exists` (`testuser` VARCHAR(11)) RETURNS INT(1) BEGIN
	DECLARE flag INT default 0;
    
    SELECT IF(student_id is not null,1,0) INTO flag FROM student WHERE student_id = testuser;
    
    IF flag is null or flag = 0 THEN
		SELECT IF(staff_id is not null,1,0) INTO flag FROM staff WHERE staff_id = testuser;
	END IF;
    
    RETURN flag;

END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_check_org_affiliations` (`userid` VARCHAR(50)) RETURNS VARCHAR(50) CHARSET utf8mb4 BEGIN
	DECLARE org_details VARCHAR(50);
    
	SELECT IF( EXISTS(
             SELECT student_id
             	FROM organization_member
             	WHERE student_id =  userid), (SELECT CONCAT(sf_get_org_name(org_id)," - ",position) FROM organization_member WHERE student_id = userid and status = 'Active'),'false') INTO org_details;

	RETURN org_details;
 
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_check_scholarship_status` (`userid` VARCHAR(10)) RETURNS VARCHAR(5) CHARSET utf8 COLLATE utf8_unicode_ci BEGIN
	DECLARE scholarship_status VARCHAR(10);
    
	SELECT IF( EXISTS(
             SELECT *
             FROM scholarship_grantee
             WHERE student_id = userid ), "true", "false") INTO scholarship_status;

	RETURN scholarship_status;
 
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_check_verified` (`userid` VARCHAR(10)) RETURNS VARCHAR(20) CHARSET utf8mb4 BEGIN
	DECLARE verified_status VARCHAR(10);
    
	SELECT IF (date_verified is not null,"true","false") INTO verified_status FROM personal_info where user_id = userid;

	RETURN verified_status;
 
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_get_age` (`dob` DATE) RETURNS INT(11) RETURN DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(dob, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(dob, '00-%m-%d'))$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_get_course_name` (`courseid` INT) RETURNS VARCHAR(255) CHARSET utf8mb4 BEGIN
	DECLARE coursename VARCHAR(255);
    
	SELECT concat(title,'-',name) INTO coursename FROM course WHERE course_id = courseid;

	RETURN coursename;
 
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_get_data_from_college_by_id` (`datareturn` VARCHAR(150), `id` INT) RETURNS VARCHAR(150) CHARSET utf8mb4 BEGIN
	DECLARE datatoreturn VARCHAR(150);
 
	IF datareturn = 'title' THEN
		SELECT title INTO datatoreturn FROM college WHERE college_id = id;
    END IF; 
	IF datareturn = 'description' THEN
		SELECT description INTO datatoreturn FROM college WHERE college_id = id;
    END IF;
 
	return datatoreturn;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_get_data_from_course_by_id` (`datareturn` VARCHAR(150), `id` INT) RETURNS VARCHAR(150) CHARSET utf8mb4 BEGIN
	DECLARE datatoreturn VARCHAR(150);
 
	IF datareturn = 'college_id' THEN
		SELECT college_id INTO datatoreturn FROM course WHERE course_id = id;
    END IF; 

	IF datareturn = 'dept_id' THEN
		SELECT dept_id INTO datatoreturn FROM course WHERE course_id = id;
    END IF; 
    
	IF datareturn = 'title' THEN
		SELECT title INTO datatoreturn FROM course WHERE course_id = id;
    END IF;    
    
	IF datareturn = 'name' THEN
		SELECT name INTO datatoreturn FROM course WHERE course_id = id;
    END IF; 
        
	IF datareturn = 'status' THEN
		SELECT status INTO datatoreturn FROM course WHERE course_id = id;
    END IF; 
 
	return datatoreturn;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_get_data_from_department_by_id` (`datareturn` VARCHAR(150), `id` INT) RETURNS VARCHAR(150) CHARSET utf8mb4 BEGIN
	DECLARE datatoreturn VARCHAR(150);
 
	IF datareturn = 'dept_name' THEN
		SELECT dept_name INTO datatoreturn FROM department WHERE dept_id = id;
    END IF;
 
	return datatoreturn;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_get_data_from_school_org_by_id` (`datareturn` VARCHAR(150), `id` INT) RETURNS VARCHAR(150) CHARSET utf8mb4 BEGIN
	DECLARE datatoreturn VARCHAR(150);
 
	IF datareturn = 'staff_id' THEN
		SELECT staff_id INTO datatoreturn FROM school_organization WHERE org_id = id;
    END IF; 
 
	IF datareturn = 'governor_id' THEN
		SELECT governor_id INTO datatoreturn FROM school_organization WHERE org_id = id;
    END IF; 
     
	IF datareturn = 'org_name' THEN
		SELECT org_name INTO datatoreturn FROM school_organization WHERE org_id = id;
    END IF; 
         
	IF datareturn = 'org_desc' THEN
		SELECT org_desc INTO datatoreturn FROM school_organization WHERE org_id = id;
    END IF; 
         
	IF datareturn = 'org_status' THEN
		SELECT org_status INTO datatoreturn FROM school_organization WHERE org_id = id;
    END IF; 
             
	IF datareturn = 'status' THEN
		SELECT status INTO datatoreturn FROM school_organization WHERE org_id = id;
    END IF; 
 
	return datatoreturn;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_get_full_address` (`house_num` VARCHAR(50), `street` VARCHAR(50), `prk` VARCHAR(50), `brgy` VARCHAR(50), `city` VARCHAR(50), `province` VARCHAR(50)) RETURNS VARCHAR(255) CHARSET utf8mb4 BEGIN
	DECLARE fulladdress VARCHAR(255);
  
	IF house_num is not null THEN
    	SET fulladdress = house_num;
    END IF;
    
	IF street is not null THEN
    	SET fulladdress = CONCAT(fulladdress," ", street);
    END IF;
      
	IF prk is not null THEN
    	SET fulladdress = CONCAT(fulladdress," ", prk);
    END IF;
  
	IF brgy is not null THEN
    	SET fulladdress = CONCAT(fulladdress,", ", brgy);
    END IF;
  
	IF city is not null THEN
    	SET fulladdress = CONCAT(fulladdress,", ", city);
    END IF;
  
	IF province is not null THEN
    	SET fulladdress = CONCAT(fulladdress,", ", province);
    END IF;


	RETURN TRIM(fulladdress);
 
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_get_id_by_name` (`myTable` VARCHAR(50), `myData` VARCHAR(50)) RETURNS INT(11) BEGIN
	DECLARE returned_id INT;
    
    IF myTable = 'course' THEN
    	SELECT course_id INTO returned_id FROM course WHERE title = myData;
    ELSEIF myTable = 'college' THEN
    	SELECT college_id INTO returned_id FROM college WHERE title = myData;
        
    ELSEIF myTable = 'office' THEN
        SELECT office_id INTO returned_id FROM office WHERE office_name = myData;
        
    ELSEIF myTable = 'department' THEN	
        SELECT dept_id INTO returned_id FROM department WHERE dept_name = myData;
        
    ELSEIF myTable = 'school_organization' THEN	
  SELECT org_id INTO returned_id FROM school_organization WHERE org_name = myData;
        
    ELSEIF myTable = 'scholarship_program' THEN	
        SELECT program_id INTO returned_id FROM scholarship_program WHERE program_name = myData;        
    END IF;
    
	IF returned_id is null THEN
		SET returned_id = 0;
	END IF;

	RETURN returned_id;
 
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_get_office_name` (`officeid` INT) RETURNS VARCHAR(50) CHARSET utf8mb4 BEGIN
	DECLARE officename VARCHAR(50);
    
	SELECT office_name INTO officename FROM office WHERE office_id = officeid;

	RETURN officename;
 
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_get_org_name` (`orgid` INT) RETURNS VARCHAR(50) CHARSET utf8 COLLATE utf8_unicode_ci BEGIN
	DECLARE orgname VARCHAR(50);
    
	SELECT org_name INTO orgname FROM school_organization WHERE org_id = orgid;

	RETURN orgname;
 
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_get_org_where_student_is_governor_president` (`studentid` VARCHAR(10)) RETURNS INT(11) BEGIN

	RETURN (SELECT org_id FROM organization_member WHERE student_id = studentid and position = 'Governor' or position = 'President');
 
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_get_schoolyear` () RETURNS VARCHAR(10) CHARSET latin1 BEGIN

 	RETURN (SELECT schoolyear FROM school_year WHERE status = "Active");

END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_get_semester` () RETURNS VARCHAR(25) CHARSET utf8mb4 BEGIN

 	RETURN (SELECT semester FROM semester WHERE status = "Active");

END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_get_student_position_in_org` (`orgid` INT, `studentid` VARCHAR(10)) RETURNS VARCHAR(150) CHARSET utf8mb4 BEGIN
	RETURN (SELECT position FROM organization_member WHERE org_id = orgid and student_id = studentid);
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_get_user_type` (`userid` VARCHAR(50)) RETURNS VARCHAR(10) CHARSET utf8mb4 BEGIN
	DECLARE usertype VARCHAR(10);
    
	SELECT IF( EXISTS(
             SELECT student_id
             FROM student
             WHERE student_id =  userid), 'Student','Staff') INTO usertype;
             
	IF usertype = 'Staff' THEN
		SET userid = CAST(userid as UNSIGNED);
		SELECT type INTO usertype FROM staff WHERE staff_id = userid;
	END IF;

	RETURN usertype;
 
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_staff_office_details` (`userid` VARCHAR(50)) RETURNS VARCHAR(100) CHARSET utf8mb4 BEGIN
	DECLARE office_details VARCHAR(50);
    
	SELECT
        CONCAT(sf_get_office_name(office_id)," - ",_position)
    INTO
    	office_details
    FROM
        staff
    WHERE
        staff_id = userid;

	RETURN office_details;
 
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `date_received` date DEFAULT NULL,
  `appointment_date` date DEFAULT NULL,
  `time_from` time DEFAULT NULL,
  `time_to` time DEFAULT NULL,
  `meeting_link` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `clinic_certificate_requests`
--

CREATE TABLE `clinic_certificate_requests` (
  `request_id` int(11) NOT NULL,
  `user_id` varchar(11) NOT NULL,
  `date_requested` date DEFAULT NULL,
  `purpose` varchar(25) DEFAULT NULL,
  `request_type` varchar(45) DEFAULT NULL,
  `required_document` varchar(45) DEFAULT NULL,
  `document_passed` varchar(150) DEFAULT NULL,
  `certificate_location` varchar(150) DEFAULT NULL,
  `date_released` date DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `clinic_patient_info`
--

CREATE TABLE `clinic_patient_info` (
  `patient_id` varchar(11) NOT NULL,
  `admitted` varchar(10) NOT NULL DEFAULT 'N/A',
  `admitted_illness` varchar(45) NOT NULL DEFAULT 'N/A',
  `admitted_illness_start` varchar(45) NOT NULL DEFAULT 'N/A',
  `operation` varchar(45) NOT NULL DEFAULT 'N/A',
  `operation_kind` varchar(45) NOT NULL DEFAULT 'N/A',
  `infectious_disease` varchar(45) NOT NULL DEFAULT 'N/A',
  `headaches` varchar(45) NOT NULL DEFAULT 'N/A',
  `swear_clause` varchar(10) NOT NULL DEFAULT 'true'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clinic_patient_info`
--

INSERT INTO `clinic_patient_info` (`patient_id`, `admitted`, `admitted_illness`, `admitted_illness_start`, `operation`, `operation_kind`, `infectious_disease`, `headaches`, `swear_clause`) VALUES
('2018-00001', 'No', '', '', 'None', '', 'None', '', 'true'),
('2018-00003', 'once', '', '', '', '', '', '', 'true'),
('2018-00159', '', '', '', '', '', '', '', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `clinic_patient_info_female`
--

CREATE TABLE `clinic_patient_info_female` (
  `patient_id` varchar(11) NOT NULL,
  `mens_age_start` varchar(45) DEFAULT NULL,
  `mens_regular` varchar(45) DEFAULT NULL,
  `mens_irregular` varchar(45) DEFAULT NULL,
  `dysmenorrhea` varchar(20) DEFAULT NULL,
  `pms` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clinic_patient_info_female`
--

INSERT INTO `clinic_patient_info_female` (`patient_id`, `mens_age_start`, `mens_regular`, `mens_irregular`, `dysmenorrhea`, `pms`) VALUES
('2018-00001', '12', 'Yes', '', 'No', 'mood changes'),
('2018-00003', '', '', '', '', ''),
('2018-00159', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE `college` (
  `college_id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`college_id`, `title`, `description`, `status`) VALUES
(1, 'CTET', 'College of Teacher Education and Technology', 'Enabled'),
(2, 'CARS', 'College of Architecture and Related Sciences', 'Enabled');

-- --------------------------------------------------------

--
-- Table structure for table `consultation`
--

CREATE TABLE `consultation` (
  `id` int(11) NOT NULL,
  `patient_id` varchar(11) NOT NULL,
  `prescription_id` int(11) DEFAULT NULL,
  `appointment_id` int(11) DEFAULT NULL,
  `type` varchar(45) NOT NULL,
  `communication_mode` varchar(45) NOT NULL,
  `problems` varchar(150) NOT NULL,
  `date_filed` date DEFAULT NULL,
  `diagnosis` varchar(150) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `treatment` varchar(150) DEFAULT NULL,
  `remarks` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `dept_id` int(11) DEFAULT NULL,
  `title` varchar(20) NOT NULL,
  `name` varchar(150) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `dept_id`, `title`, `name`, `status`) VALUES
(1, NULL, 'BSBA', 'Bachelor of Science in Agricultural and Biosystems Engineering', 'Active'),
(2, NULL, 'BEED', 'Bachelor of Elementary Education', 'Active'),
(3, NULL, 'BSNED', 'Bachelor of Special Needs Education', 'Active'),
(4, NULL, 'BECE', 'Bachelor of Early Childhood Education', 'Active'),
(5, NULL, 'BSE', 'Bachelor of Secondary Education', 'Active'),
(6, NULL, 'BTVTE', 'Bachelor of Technical-Vocational Teacher Education', 'Active'),
(7, NULL, 'BSIT', 'Bachelor of Science in Information Technology', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` int(11) NOT NULL,
  `college_id` int(11) DEFAULT NULL,
  `dept_name` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `emergency_contact`
--

CREATE TABLE `emergency_contact` (
  `Student_id` varchar(10) NOT NULL,
  `father_name` varchar(50) DEFAULT NULL,
  `father_occupation` varchar(50) DEFAULT NULL,
  `father_contact` varchar(11) DEFAULT NULL,
  `mother_name` varchar(50) DEFAULT NULL,
  `mother_occupation` varchar(50) DEFAULT NULL,
  `mother_contact` varchar(50) DEFAULT NULL,
  `living_with` varchar(50) DEFAULT NULL,
  `guardian_name` varchar(50) DEFAULT NULL,
  `guardian_contact` varchar(11) DEFAULT NULL,
  `spouse_name` varchar(50) DEFAULT NULL,
  `spouse_occupation` varchar(50) DEFAULT NULL,
  `parent_address` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emergency_contact`
--

INSERT INTO `emergency_contact` (`Student_id`, `father_name`, `father_occupation`, `father_contact`, `mother_name`, `mother_occupation`, `mother_contact`, `living_with`, `guardian_name`, `guardian_contact`, `spouse_name`, `spouse_occupation`, `parent_address`) VALUES
('2018-00001', 'A Father', '', '09111111111', 'A Mother', '', '09222222222', NULL, 'A Mother', '09222222222', '', '', NULL),
('2018-00002', 'Father ni Dina', '', '09123456789', 'Mother ni Dina', '', '09123456789', NULL, '', '', 'Sabasales Bonnel Alvarez', '', NULL),
('2018-00003', 'Father ni Jan', '', '09123456789', 'Mother ni Jan', '', '09123456789', NULL, '', '', '', '', NULL),
('2018-00159', 'Father ni Jibb', '', '09123456789', 'Mother ni Jibb', '', '09123456789', NULL, '', '', '', '', NULL),
('2018-00161', 'Father ni George', '', '09123456789', 'Mother ni George', '', '09123456789', NULL, '', '', '', '', NULL),
('2018-00232', 'Lucius Malfoy', 'Wizard', '09632541254', '', '', '', '', '', '', '', '', NULL),
('2018-00234', 'Father ni George', '', '09123456789', 'Mother ni George', '', '09123456789', NULL, '', '', '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `office`
--

CREATE TABLE `office` (
  `office_id` int(11) NOT NULL,
  `office_name` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `office`
--

INSERT INTO `office` (`office_id`, `office_name`, `status`) VALUES
(1, 'OSAS', 'Active'),
(2, 'Scholarship', 'Active'),
(3, 'Clinic', 'Active'),
(4, 'Guidance', 'Active'),
(5, 'Registrar', 'Active');

-- --------------------------------------------------------

--
-- Stand-in structure for view `patient_list`
-- (See below for the actual view)
--
CREATE TABLE `patient_list` (
`patient_id` varchar(11)
,`first_name` varchar(50)
,`last_name` varchar(50)
,`middle_name` varchar(50)
,`address` varchar(255)
,`email_add` varchar(50)
,`phone_number` varchar(11)
,`course_department` varchar(150)
,`type` varchar(50)
,`sex` varchar(10)
,`admitted` varchar(10)
,`admitted_illness` varchar(45)
,`admitted_illness_start` varchar(45)
,`operation` varchar(45)
,`operation_kind` varchar(45)
,`infectious_disease` varchar(45)
,`headaches` varchar(45)
,`mens_age_start` varchar(45)
,`mens_regular` varchar(45)
,`mens_irregular` varchar(45)
,`dysmenorrhea` varchar(20)
,`pms` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `id` int(11) NOT NULL,
  `prescription` varchar(150) DEFAULT NULL,
  `date_issued` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in structure for view `request_list`
-- (See below for the actual view)
--
CREATE TABLE `request_list` (
`request_id` int(11)
,`patient_id` varchar(11)
,`fullname` varchar(101)
,`course_department` varchar(150)
,`date_requested` date
,`purpose` varchar(25)
,`request_type` varchar(45)
,`required_document` varchar(45)
,`document_passed` varchar(150)
,`certificate_location` varchar(150)
,`date_released` date
,`status` varchar(10)
);

-- --------------------------------------------------------

--
-- Table structure for table `school_year`
--

CREATE TABLE `school_year` (
  `id` int(11) NOT NULL,
  `schoolyear` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `school_year`
--

INSERT INTO `school_year` (`id`, `schoolyear`, `status`) VALUES
(1, '2020-2021', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id` int(11) NOT NULL,
  `semester` varchar(15) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id`, `semester`, `status`) VALUES
(1, '1st Semester', 'Inactive'),
(2, '2nd Semester', 'Inactive'),
(3, 'Off Semester', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `office_id` int(11) DEFAULT 0,
  `dept_id` int(11) DEFAULT 0,
  `title` varchar(5) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `suffix` varchar(5) DEFAULT NULL,
  `extension` varchar(25) DEFAULT NULL,
  `sex` varchar(10) NOT NULL,
  `civil_status` varchar(15) NOT NULL,
  `birthdate` date NOT NULL,
  `email_add` varchar(50) NOT NULL,
  `phone_num` varchar(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `employment_status` varchar(20) DEFAULT NULL,
  `account_status` varchar(10) NOT NULL DEFAULT 'Active',
  `e_signature` blob DEFAULT NULL,
  `pic` blob DEFAULT NULL,
  `date_submitted` date NOT NULL,
  `date_verified` date DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `office_id`, `dept_id`, `title`, `last_name`, `first_name`, `middle_name`, `suffix`, `extension`, `sex`, `civil_status`, `birthdate`, `email_add`, `phone_num`, `type`, `position`, `employment_status`, `account_status`, `e_signature`, `pic`, `date_submitted`, `date_verified`, `password`, `address`) VALUES
(1000000001, 1, 0, NULL, 'Barrow', 'Mare', 'Molly', NULL, 'PhD', 'Female', 'Single', '1990-01-15', 'hannajanebw11@gmail.com', '09123456789', 'Staff', 'Staff', 'Regular', 'Active', NULL, NULL, '2021-07-18', '2021-07-18', '1234', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Student_id` varchar(10) NOT NULL,
  `course_id` int(11) NOT NULL,
  `reg_id` int(11) NOT NULL,
  `title` varchar(5) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `suffix` varchar(15) DEFAULT NULL,
  `house_block_lot_num` varchar(50) DEFAULT NULL,
  `street` varchar(50) DEFAULT NULL,
  `prk_vill_sub` varchar(50) NOT NULL,
  `brgy` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `zip_code` varchar(5) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `civil_status` varchar(15) NOT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `sex` varchar(10) NOT NULL,
  `phone_number` varchar(11) NOT NULL,
  `birth_date` date NOT NULL,
  `birth_place` varchar(50) NOT NULL,
  `email_add` varchar(50) NOT NULL,
  `section` varchar(10) NOT NULL,
  `year_level` varchar(20) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `school_year` varchar(10) NOT NULL,
  `prev_gwa` float DEFAULT NULL,
  `units_enrolled` int(11) DEFAULT NULL,
  `cor` varchar(255) DEFAULT NULL,
  `type` varchar(50) NOT NULL,
  `student_status` varchar(25) DEFAULT 'Currently enrolled',
  `account_status` varchar(50) NOT NULL DEFAULT 'Active',
  `e_signature` blob DEFAULT NULL,
  `pic` blob DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `date_submitted` date NOT NULL,
  `date_verified` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Student_id`, `course_id`, `reg_id`, `title`, `last_name`, `first_name`, `middle_name`, `suffix`, `house_block_lot_num`, `street`, `prk_vill_sub`, `brgy`, `city`, `province`, `zip_code`, `nationality`, `civil_status`, `religion`, `sex`, `phone_number`, `birth_date`, `birth_place`, `email_add`, `section`, `year_level`, `semester`, `school_year`, `prev_gwa`, `units_enrolled`, `cor`, `type`, `student_status`, `account_status`, `e_signature`, `pic`, `password`, `date_submitted`, `date_verified`) VALUES
('2018-00001', 3, 15, NULL, 'Doe', 'Jane', '', '', 'Blk. A', 'A St.', 'Prk. A', 'Brgy. A', 'A City', 'A Province', '8111', 'Filipino', 'Single', '', 'Female', '09612112121', '1990-01-01', 'A City', 'hjbmaureal@usep.edu.ph', '3BSNED1', '3rd Year', 'Off Semester', '2020-2021', NULL, NULL, 'student_cor/certificate-of-registration-92803_1626229908_1626598344_1626662081.pdf', 'Undergraduate', 'Currently enrolled', 'Active', NULL, 0x73747564656e745f69642f5f563941303331345f313632363039373137335f313632363636313238335f313632363636323038312e4a5047, '$2y$10$XWDX5IpiqteRFw8bzd8x1.UpJsukArOg.wC3e0la5WViRr2W5E0nm', '2021-07-19', NULL),
('2018-00002', 7, 16, NULL, 'Pineza', 'Dina', 'Lirazan', '', '', 'Something St.', 'Prk. Something', 'Brgy. Something', 'Something City', 'City Province', '8100', 'Filipino', 'Single', '', 'Female', '09123456789', '1999-07-24', 'Tagum City', 'dlpineza@usep.edu.ph', '3IT1', '3rd Year', 'Off Semester', '2020-2021', NULL, NULL, 'student_cor/certificate-of-registration-92803_1626229908_1626597052_1626678903.pdf', 'Undergraduate', 'Currently enrolled', 'Active', NULL, 0x73747564656e745f69642f64696e615f313632363637383930332e6a7067, '$2y$10$0KBsWpBYuTUmIGJiQ3QeNu3RYHOGXEjfCJPgtl6c304ZheOLQ.3YC', '2021-07-19', NULL),
('2018-00003', 7, 19, NULL, 'Prollo', 'Jan Andrianne', '', '', '', 'Something St.', 'Prk. Something', 'Brgy. Something', 'Something City', 'City Province', '8100', 'Filipino', 'Single', '', 'Male', '09123456789', '1999-07-24', 'Tagum City', 'jamprollo@usep.edu.ph', '3IT1', '3rd Year', 'Off Semester', '2020-2021', NULL, NULL, 'student_cor/certificate-of-registration-92803_1626229908_1626597052_1626679332.pdf', 'Undergraduate', 'Currently enrolled', 'Active', NULL, 0x73747564656e745f69642f5f563941303331345f313632363039373137335f313632363637393333322e4a5047, '$2y$10$5zH0zu8mA0e0qaDhRihFnOZrUhXzxj2YXXP66xibuhtLhv1Ew1ure', '2021-07-19', NULL),
('2018-00159', 3, 23, NULL, 'Dawang', 'Jibb', '', '', '', 'Something St.', 'Prk. Something', 'Brgy. Something', 'Something City', 'City Province', '8100', 'Filipino', 'Single', '', 'Male', '09123456789', '1999-07-24', 'Tagum City', 'jedawang159@usep.edu.ph', '3BSNED1', '3rd Year', 'Off Semester', '2020-2021', NULL, NULL, 'student_cor/certificate-of-registration-92803_1626229908_1626597052_1626679719.pdf', 'Undergraduate', 'Currently enrolled', 'Active', NULL, 0x73747564656e745f69642f6973746f636b70686f746f2d313037373536373938322d363132783631325f313632363233373437305f313632363637393731392e6a7067, '$2y$10$OGehkxC51EZoOhhy4FmyI.XKJE.lbC/kZEq8h28aF7kbjMcWGNBJa', '2021-07-19', NULL),
('2018-00161', 7, 20, NULL, 'Dela Cruz', 'Allayssa George', '', '', '', 'Something St.', 'Prk. Something', 'Brgy. Something', 'Something City', 'City Province', '8100', 'Filipino', 'Single', '', 'Male', '09123456789', '1999-07-24', 'Tagum City', 'agadelacruz@usep.edu.ph', '3IT1', '3rd Year', 'Off Semester', '2020-2021', NULL, NULL, 'student_cor/certificate-of-registration-92803_1626229908_1626597052_1626679492.pdf', 'Undergraduate', 'Currently enrolled', 'Active', NULL, 0x73747564656e745f69642f434a424e363836315f313632363232393930385f313632363637393439322e6a7067, '$2y$10$zR2WZwp/HysGydSuZxVx9OOZu0MlVe11NOPf4AxtF4emS/11jL206', '2021-07-19', NULL),
('2018-00232', 7, 24, NULL, 'Malfoy', 'Draco', '', '', '', 'C St.', 'Prk. C', 'Brgy. C', 'C City', 'C Province', '8111', '', 'Single', '', 'Male', '09236521411', '1999-02-01', 'C City', 'draco@sample.com', '3IT1', '4th Year', '', '', NULL, NULL, '', 'Undergraduate', 'Currently enrolled', 'Active', NULL, '', '1234', '2021-07-22', NULL),
('2018-00234', 7, 22, NULL, 'Munez', 'Darlen Rose', '', '', '', 'Something St.', 'Prk. Something', 'Brgy. Something', 'Something City', 'City Province', '8100', 'Filipino', 'Single', '', 'Male', '09123456789', '1999-07-24', 'Tagum City', 'drsmunez@usep.edu.ph', '3IT1', '3rd Year', 'Off Semester', '2020-2021', NULL, NULL, 'student_cor/certificate-of-registration-92803_1626229908_1626597052_1626679595.pdf', 'Undergraduate', 'Currently enrolled', 'Active', NULL, 0x73747564656e745f69642f6973746f636b70686f746f2d313037373536373938322d363132783631325f313632363233373437305f313632363637393539352e6a7067, '$2y$10$jtfkpYh2e5JHqB.t12LGveWSRuJpUG25jdCI9hs.TTXsBNFKe0T0e', '2021-07-19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `superadmin`
--

CREATE TABLE `superadmin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure for view `patient_list`
--
DROP TABLE IF EXISTS `patient_list`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `patient_list`  AS  select `i`.`patient_id` AS `patient_id`,`s`.`first_name` AS `first_name`,`s`.`last_name` AS `last_name`,`s`.`middle_name` AS `middle_name`,`sf_get_full_address`(`s`.`house_block_lot_num`,`s`.`street`,`s`.`prk_vill_sub`,`s`.`brgy`,`s`.`city`,`s`.`province`) AS `address`,`s`.`email_add` AS `email_add`,`s`.`phone_number` AS `phone_number`,`sf_get_data_from_course_by_id`('title',`s`.`course_id`) AS `course_department`,'Student' AS `type`,`s`.`sex` AS `sex`,`i`.`admitted` AS `admitted`,`i`.`admitted_illness` AS `admitted_illness`,`i`.`admitted_illness_start` AS `admitted_illness_start`,`i`.`operation` AS `operation`,`i`.`operation_kind` AS `operation_kind`,`i`.`infectious_disease` AS `infectious_disease`,`i`.`headaches` AS `headaches`,`f`.`mens_age_start` AS `mens_age_start`,`f`.`mens_regular` AS `mens_regular`,`f`.`mens_irregular` AS `mens_irregular`,`f`.`dysmenorrhea` AS `dysmenorrhea`,`f`.`pms` AS `pms` from ((`clinic_patient_info` `i` join `student` `s` on(`s`.`Student_id` = `i`.`patient_id`)) join `clinic_patient_info_female` `f` on(`f`.`patient_id` = `i`.`patient_id`)) union select `i`.`patient_id` AS `patient_id`,`st`.`first_name` AS `first_name`,`st`.`last_name` AS `last_name`,`st`.`middle_name` AS `middle_name`,`st`.`address` AS `address`,`st`.`email_add` AS `email_add`,`st`.`phone_num` AS `phone_number`,if(`sf_get_data_from_department_by_id`('dept_name',`st`.`dept_id`) is null,`sf_get_office_name`(`st`.`office_id`),`sf_get_data_from_department_by_id`('dept_name',`st`.`dept_id`)) AS `course_department`,`st`.`type` AS `type`,`st`.`sex` AS `sex`,`i`.`admitted` AS `admitted`,`i`.`admitted_illness` AS `admitted_illness`,`i`.`admitted_illness_start` AS `admitted_illness_start`,`i`.`operation` AS `operation`,`i`.`operation_kind` AS `operation_kind`,`i`.`infectious_disease` AS `infectious_disease`,`i`.`headaches` AS `headaches`,`f`.`mens_age_start` AS `mens_age_start`,`f`.`mens_regular` AS `mens_regular`,`f`.`mens_irregular` AS `mens_irregular`,`f`.`dysmenorrhea` AS `dysmenorrhea`,`f`.`pms` AS `pms` from ((`clinic_patient_info` `i` join `staff` `st` on(`st`.`staff_id` = `i`.`patient_id`)) join `clinic_patient_info_female` `f` on(`f`.`patient_id` = `i`.`patient_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `request_list`
--
DROP TABLE IF EXISTS `request_list`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `request_list`  AS  select `clinic_certificate_requests`.`request_id` AS `request_id`,`patient_list`.`patient_id` AS `patient_id`,concat(`patient_list`.`first_name`,' ',`patient_list`.`last_name`) AS `fullname`,`patient_list`.`course_department` AS `course_department`,`clinic_certificate_requests`.`date_requested` AS `date_requested`,`clinic_certificate_requests`.`purpose` AS `purpose`,`clinic_certificate_requests`.`request_type` AS `request_type`,`clinic_certificate_requests`.`required_document` AS `required_document`,`clinic_certificate_requests`.`document_passed` AS `document_passed`,`clinic_certificate_requests`.`certificate_location` AS `certificate_location`,`clinic_certificate_requests`.`date_released` AS `date_released`,`clinic_certificate_requests`.`status` AS `status` from (`patient_list` join `clinic_certificate_requests` on(`clinic_certificate_requests`.`user_id` = `patient_list`.`patient_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clinic_certificate_requests`
--
ALTER TABLE `clinic_certificate_requests`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `clinic_patient_info`
--
ALTER TABLE `clinic_patient_info`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `clinic_patient_info_female`
--
ALTER TABLE `clinic_patient_info_female`
  ADD PRIMARY KEY (`patient_id`),
  ADD KEY `fk_clinic_patient_info_female_clinic_patient_info1_idx` (`patient_id`);

--
-- Indexes for table `college`
--
ALTER TABLE `college`
  ADD PRIMARY KEY (`college_id`);

--
-- Indexes for table `consultation`
--
ALTER TABLE `consultation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_consultation_clinic_patient_info1_idx` (`patient_id`),
  ADD KEY `fk_consultation_appointment1_idx` (`appointment_id`),
  ADD KEY `fk_consultation_prescription1_idx` (`prescription_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `dept_id_idx` (`dept_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`),
  ADD KEY `fk_department_college1_idx` (`college_id`);

--
-- Indexes for table `emergency_contact`
--
ALTER TABLE `emergency_contact`
  ADD PRIMARY KEY (`Student_id`),
  ADD KEY `Student_id` (`Student_id`);

--
-- Indexes for table `office`
--
ALTER TABLE `office`
  ADD PRIMARY KEY (`office_id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_year`
--
ALTER TABLE `school_year`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Student_id`),
  ADD KEY `reg_id` (`reg_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `superadmin`
--
ALTER TABLE `superadmin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clinic_certificate_requests`
--
ALTER TABLE `clinic_certificate_requests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `college`
--
ALTER TABLE `college`
  MODIFY `college_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `office`
--
ALTER TABLE `office`
  MODIFY `office_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `school_year`
--
ALTER TABLE `school_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000000002;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `superadmin`
--
ALTER TABLE `superadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clinic_patient_info_female`
--
ALTER TABLE `clinic_patient_info_female`
  ADD CONSTRAINT `fk_clinic_patient_info_female_clinic_patient_info1` FOREIGN KEY (`patient_id`) REFERENCES `clinic_patient_info` (`patient_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `consultation`
--
ALTER TABLE `consultation`
  ADD CONSTRAINT `fk_consultation_appointment1` FOREIGN KEY (`appointment_id`) REFERENCES `appointment` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_consultation_clinic_patient_info1` FOREIGN KEY (`patient_id`) REFERENCES `clinic_patient_info` (`patient_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_consultation_prescription1` FOREIGN KEY (`prescription_id`) REFERENCES `prescription` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `dept_id` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `fk_department_college1` FOREIGN KEY (`college_id`) REFERENCES `college` (`college_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `emergency_contact`
--
ALTER TABLE `emergency_contact`
  ADD CONSTRAINT `Emergency_Contact_ibfk_1` FOREIGN KEY (`Student_id`) REFERENCES `student` (`Student_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `Student_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
