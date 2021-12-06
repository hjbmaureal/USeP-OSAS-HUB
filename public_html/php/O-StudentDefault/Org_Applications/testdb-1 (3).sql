-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2021 at 08:43 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testdb-1`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `AddComplaint` (IN `date_submitted` DATE, IN `date_of_incident` DATE, IN `time_of_incident` TIME, IN `loc_of_incident` VARCHAR(50) CHARSET utf8mb4, IN `person_complained` VARCHAR(50) CHARSET utf8mb4, IN `designation_complained` VARCHAR(50) CHARSET utf8mb4, IN `detail` VARCHAR(50) CHARSET utf8mb4, IN `witness1` VARCHAR(50) CHARSET utf8mb4, IN `witness2` VARCHAR(50) CHARSET utf8mb4, IN `witness3` VARCHAR(50) CHARSET utf8mb4, IN `status` VARCHAR(50) CHARSET utf8mb4, IN `student_id` VARCHAR(10) CHARSET utf8mb4)  BEGIN
		INSERT INTO Complaint (Student_id, Date_Submitted, Date_of_incident, Time_of_incident, Loc_of_incident, Person_Complained, Designation_Complained, Detail, Witness1, Witness2, Witness3, Status ) VALUES (student_id, date_submitted, date_of_incident, time_of_incident, loc_of_incident, person_complained,designation_complained, detail,witness1, witness2, witness3,status);
        END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addCourse` (IN `College_id` INT, IN `Title` VARCHAR(50) CHARSET utf8mb4, IN `Name` VARCHAR(50) CHARSET utf8mb4, IN `_major` VARCHAR(150) CHARSET utf8mb4, IN `studenttype` VARCHAR(45) CHARSET utf8mb4, IN `Status` VARCHAR(50) CHARSET utf8mb4)  BEGIN
	insert into course(college_id, title, name, major, student_type, status) VALUES (College_id, Title, Name, _major, studenttype, Status);
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addMasterlistDocument` (IN `date` DATE, IN `title` VARCHAR(128) CHARSET utf8mb4, IN `number` INT(255), IN `pre_revision_date` DATE, IN `prev_revision_number` VARCHAR(255) CHARSET utf8mb4, IN `latest_revision_date` DATE, IN `latest_revision_number` INT(255), IN `softcopy` BLOB)  BEGIN

    	INSERT into scholarship_masterlist_documents (date, title, number, prev_revision_date, prev_revision_number, latest_revision_date, latest_revision_number, document_soft_copy) VALUES (date, title, number, pre_revision_date, prev_revision_number, latest_revision_date, latest_revision_number, softcopy);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addMasterlistExternalReference` (IN `date` DATE, IN `ext_ref_title` INT, IN `revision_number` INT, IN `mode_of_filing` INT, IN `custodian` INT, IN `location` INT, IN `retention_active` INT, IN `retention_archive` INT, IN `soft_copy` INT)  BEGIN

    	INSERT into scholarship_masterlist_external_reference (date, external_reference_title, revision_number, mode_of_filing, custodian, location, retention_active, retention_archive, external_reference_soft_copy) VALUES (date,ext_ref_title,revision_number,mode_of_filing,custodian,location,retention_active,
 retention_archive,soft_copy);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addMasterlistRecord` (IN `date` DATE, IN `recordTitle` VARCHAR(128) CHARSET utf8mb4, IN `recordType` VARCHAR(64) CHARSET utf8mb4, IN `recordMode` VARCHAR(64) CHARSET utf8mb4, IN `custodian` VARCHAR(128) CHARSET utf8mb4, IN `location` VARCHAR(128) CHARSET utf8mb4, IN `retentionActive` DATE, IN `retentionArchive` DATE, IN `dispositionYear` DATE, IN `dispositionMethod` VARCHAR(64) CHARSET utf8mb4, IN `recordSoftCopy` BLOB)  BEGIN

    	INSERT into scholarship_masterlist_record (date, records_title, type_of_records, mode_of_filing, custodian, location, retention_active, retention_archive, disposition_year, disposition_method, record_soft_copy) VALUES (date,recordTitle,recordType,recordMode,custodian,location,retentionActive,
 retentionArchive,dispositionYear,dispositionMethod,recordSoftCopy);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addMasterlistTransmittal` (IN `date` DATE, IN `date_time_received` DATETIME, IN `received_by` VARCHAR(64) CHARSET utf8mb4, IN `reference_number` VARCHAR(128) CHARSET utf8mb4, IN `source_origin_office` VARCHAR(128) CHARSET utf8mb4, IN `type` VARCHAR(64) CHARSET utf8mb4, IN `subject_matter` VARCHAR(255) CHARSET utf8mb4, IN `date_2` DATE, IN `action_taken` VARCHAR(255) CHARSET utf8mb4, IN `date_time_dispatch` DATETIME, IN `dispatched_by` VARCHAR(64) CHARSET utf8, IN `remarks` VARCHAR(255) CHARSET utf8mb4, IN `transmittal_soft_copy` BLOB)  BEGIN

    	INSERT into scholarship_masterlist_transmittal (date, date_time_received, received_by, reference_number, source_origin_office, type, subject_matter, date_2, action_taken, date_time_dispatch, dispatched_by, remarks, transmittal_soft_copy) VALUES (date,date_time_received, received_by, reference_number, source_origin_office, type, subject_matter, date_2, action_taken, date_time_dispatch, dispatched_by, remarks, transmittal_soft_copy);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addProvider` (IN `program_provider` VARCHAR(50) CHARSET utf8mb4, IN `program_name` VARCHAR(50) CHARSET utf8mb4, IN `type` INT(11), IN `program_status` INT(11), IN `amount` VARCHAR(20) CHARSET utf8mb4)  BEGIN
    	INSERT into scholarship_program (program_provider, program_name, type, program_status, amount) VALUES (program_provider, program_name, type, program_status, amount);
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ClinicInsertNewConsultation` (IN `_userid` VARCHAR(11) CHARSET utf8mb4, IN `_type` VARCHAR(50) CHARSET utf8mb4, IN `_communication_mode` VARCHAR(50) CHARSET utf8mb4, IN `_problems` VARCHAR(150) CHARSET utf8mb4)  BEGIN
	
    INSERT INTO consultation (patient_id,type,communication_mode,problems,date_filed) VALUES (_userid,_type,_communication_mode,_problems,curdate());
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `OsasSetComplaintResponse` (IN `_complaint_id` INT, IN `_date` DATE, IN `_time_from` TIME, IN `_time_to` TIME, IN `_meeting_type` VARCHAR(45) CHARSET utf8mb4, IN `_meeting_link` VARCHAR(150) CHARSET utf8mb4, IN `_meeting_id` VARCHAR(45) CHARSET utf8mb4, IN `_passcode` VARCHAR(45) CHARSET utf8mb4, IN `_status` VARCHAR(45) CHARSET utf8mb4, IN `_defendant` VARCHAR(145) CHARSET utf8mb4, IN `_action_taken` VARCHAR(45) CHARSET utf8mb4)  BEGIN
	DECLARE message VARCHAR(150);
    
    SET message = sf_check_conflict_complaint_schedule(_time_from,_time_to);
    
    IF message is null THEN
		INSERT INTO `response` (`Complaint_ID`, `date_schedule`, `time_from`, `time_to`, `meeting_type`, `meeting_link`, `meeting_id`, `passcode`, `action_taken`,status,defendant) VALUES (_complaint_id, _date, _time_from, _time_to, _meeting_type, _meeting_link, _meeting_id, _passcode, _action_taken,_status,_defendant);
		SET message = 'NO CONFLICT';
    END IF;
    
    
	SELECT message;
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ScholarshipAddScholarThruDataForm` (IN `_student_id` VARCHAR(11) CHARSET utf8mb4, IN `_program_id` INT, IN `_prev_gwa` FLOAT, IN `_total_units` INT, IN `_semester_year` VARCHAR(50) CHARSET utf8mb4, IN `_city_address` VARCHAR(50) CHARSET utf8mb4, IN `_parent_name` VARCHAR(50) CHARSET utf8mb4, IN `_parent_occupation` VARCHAR(50) CHARSET utf8mb4, IN `_parent_address` VARCHAR(50) CHARSET utf8mb4, IN `_parent_contact` VARCHAR(50) CHARSET utf8mb4)  BEGIN
	DECLARE flag INT;
    
    SELECT IF (student_id is not null, 1,0) INTO flag FROM scholar_additional_info WHERE student_id = _student_id;
    
    IF flag = 0 OR flag is null THEN    
		INSERT INTO scholar_additional_info VALUES (_student_id,_city_address,_parent_name,_parent_occupation,_parent_address,_parent_contact);
		INSERT INTO grantee_history (student_id,program_id,student_status,semester_year,semester,year,validation_status) VALUES
			(_student_id,_program_id,1,_semester_year,sf_get_current_semester(),sf_get_current_schoolyear(),'Validated');
		IF _prev_gwa is not null THEN
			UPDATE student set prev_gwa = prev_gwa, units_enrolled = _total_units WHERE student_id = _student_id;
		END IF;
	ELSEIF flag = 1 THEN
		INSERT INTO grantee_history (student_id,program_id,student_status,semester_year,semester,year,validation_status) VALUES
			(_student_id,_program_id,1,_semester_year,sf_get_current_semester(),sf_get_current_schoolyear(),'Validated');
	END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ScholarshipInsertEnrollmentList` (IN `_student_id` VARCHAR(11) CHARSET utf8mb4, IN `_student_yearlevel` INT, IN `current_semester` INT, IN `current_schoolyear` VARCHAR(15) CHARSET utf8mb4)  BEGIN
    
    DROP TEMPORARY TABLE IF EXISTS temptbl;
	CREATE TEMPORARY TABLE temptbl (id INT AUTO_INCREMENT PRIMARY KEY, subcode VARCHAR(10), subunit INT);
	INSERT INTO temptbl (subcode,subunit) SELECT code,units FROM subject WHERE yearlevel=_student_yearlevel and semester = current_semester;
	INSERT INTO enrollment_list (
			student_id,
            schoolyear,
            semester,
            student_yearlevel,
            subject_code1,
            units1,
            subject_code2,
            units2,
            subject_code3,
            units3,
            subject_code4,
            units4,
            subject_code5,
            units5,
            subject_code6,
            units6,
            subject_code7,
            units7,
            subject_code8,
            units8,
            subject_code9,
            units9)
    VALUES (_student_id,
			current_schoolyear,
            current_semester,
            _student_yearlevel,
            sf_get_data_from_temptbl('subcode',1),
            sf_get_data_from_temptbl('subunit',1),
            sf_get_data_from_temptbl('subcode',2),
            sf_get_data_from_temptbl('subunit',2),
            sf_get_data_from_temptbl('subcode',3),
            sf_get_data_from_temptbl('subunit',3),
            sf_get_data_from_temptbl('subcode',4),
            sf_get_data_from_temptbl('subunit',4),
            sf_get_data_from_temptbl('subcode',5),
            sf_get_data_from_temptbl('subunit',5),
            sf_get_data_from_temptbl('subcode',6),
            sf_get_data_from_temptbl('subunit',6),
            sf_get_data_from_temptbl('subcode',7),
            sf_get_data_from_temptbl('subunit',7),
            sf_get_data_from_temptbl('subcode',8),
            sf_get_data_from_temptbl('subunit',8),
            sf_get_data_from_temptbl('subcode',9),
            sf_get_data_from_temptbl('subunit',9)
            );
	
    DROP TEMPORARY TABLE IF EXISTS temptbl;
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spGetAllAlumniDetails` (IN `_alumni_id` INT)  BEGIN
	
    SELECT
	a.id,
    sf_get_data_from_course_by_id('name',a.course_id) as course,
    a.first_name,
    a.last_name,
    a.middle_name,
    a.suffix,
    a.email_add,
    a.contact,
    a.major,
    a.last_sy_attended,
    a.school_id_pic,
    a.profile_pic
FROM
	alumni as a
    WHERE
		a.id = _alumni_id;
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spGetAllowanceStatus` ()  BEGIN
	
    SELECT
	student_id as id,
    fullname(first_name,middle_name,last_name,'',suffix,'','with_extensions') as Name,
    program_name as Scholarship,
    coursename as Course,
    semester_year as Semester,
    allowance_status as statusAllowance,
    billing_status as statusBilling,
    payroll_status as statusPayroll,
    liquidation_status as statusLiquidation
FROM
	scholarship_general_info
ORDER BY
	semester desc,scholarship,course,name;
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spGetAllStaffDetails` (IN `_staff_id` INT)  BEGIN
	
    SELECT
	lpad(s.staff_id,11,0) as staff_id,
    sf_get_office_name(s.office_id) as office,
    sf_get_data_from_department_by_id('dept_name',s.dept_id) as department,
    sf_get_data_from_college_by_id('title',sf_get_data_from_department_by_id('college_id',s.dept_id)) as college,
    s.title,
    s.last_name,
    s.first_name,
    s.middle_name,
    s.suffix,
    s.extension,
    fullname(s.first_name,s.middle_name,s.last_name,s.title,s.suffix,s.extension,'with_extensions') as name,
    s.sex,
    s.civil_status,
    DATE_FORMAT(s.birthdate, "%m/%d/%Y") as birth_date,
    s.email_add,
    s.phone_num,
    s.religion,
    s.nationality,
    s.type,
    s.position,
    s.employment_status,
    s.account_status,
    s.e_signature,
    s.pic
FROM
	staff as s
WHERE
	staff_id = _staff_id;
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spGetAllStudentDetails` (IN `id` VARCHAR(25) CHARSET utf8mb4)  BEGIN

SELECT * FROM studentdetails as s
WHERE
	s.reg_id = id or s.student_id = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spGetTotalAllowanceReleased` ()  BEGIN
	
   SELECT
	program_id,
    semester_year,
    program_name,
    count(student_id) as grantees,
    SUM(IF(allowance_status = 'RELEASED',amount,0)) as total
FROM
	scholarship_general_info
GROUP BY
	semester_year,program_id
ORDER BY
	semester_year;
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spLogin` (IN `_username` VARCHAR(11) CHARSET utf8mb4, IN `_pword` VARCHAR(255) CHARSET utf8mb4)  BEGIN
	SELECT username,name,usertype,userpic,student_org,student_position,scholarship_status,staff_office,staff_position,verified_status,account_status FROM login_credentials WHERE username = _username and password=_pword;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spRegisterStudent` (IN `_student_id` VARCHAR(15) CHARSET utf8mb4, IN `_lname` VARCHAR(50) CHARSET utf8mb4, IN `_fname` VARCHAR(50) CHARSET utf8mb4, IN `_mname` VARCHAR(50) CHARSET utf8mb4, IN `_suffix` VARCHAR(50) CHARSET utf8mb4, IN `_house_lot_number` VARCHAR(50) CHARSET utf8mb4, IN `_street` VARCHAR(50) CHARSET utf8mb4, IN `_purok` VARCHAR(50) CHARSET utf8mb4, IN `_brgy` VARCHAR(50) CHARSET utf8mb4, IN `_city` VARCHAR(50) CHARSET utf8mb4, IN `_province` VARCHAR(50) CHARSET utf8mb4, IN `_zip_code` VARCHAR(50) CHARSET utf8mb4, IN `_sex` VARCHAR(50) CHARSET utf8mb4, IN `_civil_status` VARCHAR(50) CHARSET utf8mb4, IN `_religion` VARCHAR(50) CHARSET utf8mb4, IN `_nationality` VARCHAR(50) CHARSET utf8mb4, IN `_birthdate` DATE, IN `_birthplace` VARCHAR(150) CHARSET utf8mb4, IN `_course_name` VARCHAR(50) CHARSET utf8mb4, IN `_major_id` INT, IN `_yearlevel` VARCHAR(50) CHARSET utf8mb4, IN `_section` VARCHAR(50) CHARSET utf8mb4, IN `_email_add` VARCHAR(50) CHARSET utf8mb4, IN `_contact_no` VARCHAR(50) CHARSET utf8mb4, IN `_org_name` VARCHAR(50) CHARSET utf8mb4, IN `_org_pstn` VARCHAR(50) CHARSET utf8mb4, IN `_student_type` VARCHAR(50) CHARSET utf8mb4, IN `_living_with` VARCHAR(50) CHARSET utf8mb4, IN `_father_name` VARCHAR(150) CHARSET utf8mb4, IN `_father_occupation` VARCHAR(50) CHARSET utf8mb4, IN `_father_contact` VARCHAR(50) CHARSET utf8mb4, IN `_mother_name` VARCHAR(150) CHARSET utf8mb4, IN `_mother_occupation` VARCHAR(50) CHARSET utf8mb4, IN `_mother_contact` VARCHAR(50) CHARSET utf8mb4, IN `_guardian_name` VARCHAR(150) CHARSET utf8mb4, IN `_guardian_occupation` VARCHAR(50) CHARSET utf8mb4, IN `_guardian_contact` VARCHAR(50) CHARSET utf8mb4, IN `_spouse_name` VARCHAR(150) CHARSET utf8mb4, IN `_spouse_occupation` VARCHAR(50) CHARSET utf8mb4, IN `_spouse_contact` VARCHAR(150) CHARSET utf8mb4, IN `_pword` VARCHAR(255) CHARSET utf8mb4, IN `_pic` BLOB, IN `_cor` VARCHAR(255) CHARSET utf8mb4)  BEGIN
	DECLARE student_org_id INT;
    
    INSERT INTO student (student_id, course_id, major_id, last_name, first_name, middle_name, suffix, house_block_lot_num, street, prk_vill_sub, brgy, city, province, zip_code, nationality, civil_status, religion, sex, phone_number, birth_date, birth_place, email_add, section, year_level, cor, type, pic, password, date_submitted ) VALUES ( _student_id, sf_get_id_by_name('course',_course_name),_major_id,_lname,_fname,_mname,_suffix,_house_lot_number,_street,_purok,_brgy,_city,_province,_zip_code,_nationality,_civil_status,_religion,_sex,_contact_no,_birthdate,_birthplace,_email_add,_section,_yearlevel,_cor,_student_type,_pic,_pword,curdate() );
    
    INSERT INTO emergency_contact (student_id,father_name,father_occupation,father_contact,mother_name,mother_occupation,mother_contact,living_with,guardian_name,guardian_contact,spouse_name,spouse_occupation,guardian_occupation,spouse_contact) VALUES (_student_id,_father_name,_father_occupation,_father_contact,_mother_name,_mother_occupation,_mother_contact,_living_with,_guardian_name,_guardian_contact,_spouse_name,_spouse_occupation,_guardian_occupation,_spouse_contact);
    
    
	IF _org_name != '' THEN
		SELECT sf_get_id_by_name('school_organization',_org_name) INTO student_org_id;
		IF student_org_id > 0 THEN
			INSERT INTO organization_member (org_id,student_id,position) VALUES (student_org_id,_student_id,_org_pstn);
        END IF;
	END IF;
    
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spSDFAutofillByStudentID` (IN `studentid` VARCHAR(10) CHARSET utf8mb4)  BEGIN
	
    SELECT
	sf_get_semester() as current_semester,
	sf_get_schoolyear() as current_sy,
    prev_gwa,
    units_enrolled,
    type,
    last_name,
    first_name,
    middle_name,
    sex,
    birth_date,
    year_level,
    coursename,
    college,
    phone_number,
    email_add,
    living_with,
    guardian_contact,
    mother_name,
    mother_occupation,
    mother_contact,
    spouse_name,
    spouse_occupation,
    e_signature
FROM
	studentdetails
WHERE
	student_id = studentid;
    
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

CREATE DEFINER=`root`@`localhost` FUNCTION `fullName1` (`fname` VARCHAR(45), `mname` VARCHAR(45), `lname` VARCHAR(45)) RETURNS VARCHAR(150) CHARSET utf8mb4 begin
	declare full_name varchar(150);
    set full_name = concat(lname,', ',fname,' ',left(mname,1));
    return (full_name);
end$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_check_conflict_complaint_schedule` (`timefrom` TIME, `timeto` TIME) RETURNS VARCHAR(150) CHARSET utf8mb4 BEGIN

return (SELECT CONCAT('Conflict with ',fullname,' - ',person_complained,' @',time_from,'-',time_to) as case_involved FROM viewcomplaint where CONCAT(timefrom,'-',timeto) between time_from and time_to);

END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_check_if_consultation_appointment_is_set` (`consultationid` INT) RETURNS INT(11) BEGIN

	return (SELECT appointment_id FROM consultation where id = consultationid);

END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_check_if_consultation_exists` (`consultationid` INT) RETURNS INT(11) BEGIN

	return (SELECT id FROM consultation where id = consultationid);

END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_check_org_affiliations` (`userid` VARCHAR(50)) RETURNS VARCHAR(50) CHARSET utf8mb4 BEGIN
	DECLARE org_details VARCHAR(50);
    
	SELECT IF( EXISTS(
             SELECT student_id
             	FROM organization_member
             	WHERE student_id =  userid), (SELECT CONCAT(sf_get_org_name(org_id)," - ",position) FROM organization_member WHERE student_id = userid and status = 'Active'),'false') INTO org_details;

	RETURN org_details;
 
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_check_scholarship_status` (`userid` VARCHAR(10)) RETURNS VARCHAR(5) CHARSET utf8mb4 BEGIN
	DECLARE scholarship_status VARCHAR(10);
    
	SELECT IF( EXISTS(
             SELECT *
             FROM grantee_history
             WHERE student_id=  userid), "true", "false") INTO scholarship_status;

	RETURN scholarship_status;
 
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_check_verified` (`userid` VARCHAR(10)) RETURNS VARCHAR(20) CHARSET utf8mb4 BEGIN
	DECLARE verified_status VARCHAR(10);
    
	SELECT IF (date_verified is not null,"true","false") INTO verified_status FROM personal_info where user_id = userid;

	RETURN verified_status;
 
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_get_age` (`dob` DATE) RETURNS INT(11) RETURN DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(dob, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(dob, '00-%m-%d'))$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_get_college_id` (`college_name` VARCHAR(50)) RETURNS INT(11) BEGIN
	DECLARE collegeid INT;
    
	SELECT college_id INTO collegeid FROM college WHERE title = college_name;
    
	IF collegeid is null THEN
		SET collegeid = 0;
	END IF;

	RETURN collegeid;
 
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_get_college_name` (`collegeid` INT) RETURNS VARCHAR(50) CHARSET utf8mb4 BEGIN
	DECLARE collegename VARCHAR(50);
    
	SELECT title INTO collegename FROM college WHERE college_id = collegeid;

	RETURN collegename;
 
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_get_course_id` (`course_name` VARCHAR(50)) RETURNS INT(11) BEGIN
	DECLARE courseid INT;
    
	SELECT course_id INTO courseid FROM course WHERE title = course_name;
    
	IF courseid is null THEN
		SET courseid = 0;
	END IF;

	RETURN courseid;
 
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_get_course_name` (`courseid` INT) RETURNS VARCHAR(255) CHARSET utf8mb4 BEGIN
	DECLARE coursename VARCHAR(255);
    
	SELECT concat(title,'-',name) INTO coursename FROM course WHERE course_id = courseid;

	RETURN coursename;
 
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_get_current_schoolyear` () RETURNS VARCHAR(10) CHARSET utf8mb4 BEGIN

 	RETURN (SELECT schoolyear FROM schoolyear WHERE status = "Active");

END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_get_current_semester` () RETURNS VARCHAR(25) CHARSET utf8mb4 BEGIN

 	RETURN (SELECT semester_name FROM semester WHERE status = "Active");

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

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_get_data_from_curriculum_by_id` (`datareturn` VARCHAR(150), `_id` INT) RETURNS VARCHAR(150) CHARSET utf8mb4 BEGIN
	DECLARE datatoreturn VARCHAR(150);
 
	IF datareturn = 'course_id' THEN
		SELECT course_id INTO datatoreturn FROM curriculum WHERE id = _id;
    END IF; 
    
	IF datareturn = 'title' THEN
		SELECT title INTO datatoreturn FROM curriculum WHERE id = _id;
    END IF; 
 
	IF datareturn = 'date_created' THEN
		SELECT date_created INTO datatoreturn FROM curriculum WHERE id = _id;
    END IF; 
    
	IF datareturn = 'status' THEN
		SELECT status INTO datatoreturn FROM curriculum WHERE id = _id;
    END IF; 
	return datatoreturn;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_get_data_from_department_by_id` (`datareturn` VARCHAR(150), `id` INT) RETURNS VARCHAR(150) CHARSET utf8mb4 BEGIN
	DECLARE datatoreturn VARCHAR(150);
 
	IF datareturn = 'dept_name' THEN
		SELECT dept_name INTO datatoreturn FROM department WHERE dept_id = id;
	ELSEIF datareturn = 'college_id' THEN
		SELECT college_id INTO datatoreturn FROM department WHERE dept_id = id;
	ELSEIF datareturn = 'dept_head' THEN
		SELECT dept_head INTO datatoreturn FROM department WHERE dept_id = id;
	ELSEIF datareturn = 'status' THEN
		SELECT status INTO datatoreturn FROM department WHERE dept_id = id;
    END IF;
 
	return datatoreturn;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_get_data_from_school_org_by_id` (`datareturn` VARCHAR(150) CHARSET utf8mb4, `id` INT) RETURNS VARCHAR(150) CHARSET utf8mb4 BEGIN
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

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_get_data_from_subject_by_id` (`data_needed` VARCHAR(25), `subcode` VARCHAR(15)) RETURNS VARCHAR(45) CHARSET utf8mb4 BEGIN
	DECLARE datatoreturn VARCHAR(45);
    
    IF data_needed = 'subject_description' THEN
		SELECT subject_description INTO datatoreturn FROM subject WHERE code = subcode;
	ELSEIF data_needed = 'units' THEN
		SELECT units INTO datatoreturn  FROM subject WHERE code = subcode;
	ELSEIF data_needed = 'yearlevel' THEN
		SELECT yearlevel  INTO datatoreturn  FROM subject WHERE code = subcode;
	ELSEIF data_needed = 'semester' THEN
		SELECT yearlevel  INTO datatoreturn  FROM subject WHERE code = subcode;
	ELSEIF data_needed = 'curriculum_id' THEN
		SELECT curriculum_id  INTO datatoreturn  FROM subject WHERE code = subcode;
	END IF;
    
    return datatoreturn;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_get_data_from_temptbl` (`mydata` VARCHAR(10), `_id` INT) RETURNS VARCHAR(150) CHARSET utf8mb4 BEGIN
	DECLARE datatoreturn VARCHAR(150);
    
		IF mydata = 'subcode' THEN
			SELECT subcode INTO datatoreturn FROM temptbl WHERE id = _id;
		ELSEIF mydata = 'subunit' THEN
			SELECT subunit INTO datatoreturn FROM temptbl WHERE id = _id;
		END IF;
    
	return datatoreturn;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_get_department_id` (`deptname` VARCHAR(50)) RETURNS INT(11) BEGIN
	DECLARE deptid INT;
    
	SELECT dept_id INTO deptid FROM department WHERE dept_name = deptname;
    
	IF deptid is null THEN
		SET deptid = 0;
	END IF;

	RETURN deptid;
 
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_get_first_name` (`_student_id` VARCHAR(11)) RETURNS VARCHAR(64) CHARSET utf8mb4 BEGIN
	DECLARE firstName VARCHAR(50);
    
	SELECT first_name INTO firstName FROM student WHERE student_id = _student_id;

	RETURN firstName;
 
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

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_get_last_name` (`_student_id` VARCHAR(11)) RETURNS VARCHAR(50) CHARSET utf8mb4 BEGIN
	DECLARE lastName VARCHAR(50);
    
	SELECT lastn_name INTO lastName FROM student WHERE student_id = _student_id;

	RETURN lastName;
 
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_get_mname` (`student_id` VARCHAR(11)) RETURNS VARCHAR(50) CHARSET utf8mb4 BEGIN
	DECLARE middleName VARCHAR(50);
    
	SELECT mname INTO middleName FROM personal_info WHERE User_id = student_id;

	RETURN middleName;
 
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_get_office_id` (`officename` VARCHAR(50)) RETURNS INT(11) BEGIN
	DECLARE officeid INT;
    
	SELECT office_id INTO officeid FROM office WHERE office_name = officename;
    
	IF officeid is null THEN
		SET officeid = 0;
	END IF;

	RETURN officeid;
 
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_get_office_name` (`officeid` INT) RETURNS VARCHAR(50) CHARSET utf8mb4 BEGIN
	DECLARE officename VARCHAR(50);
    
	SELECT office_name INTO officename FROM office WHERE office_id = officeid;

	RETURN officename;
 
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_get_organization_id` (`organization_name` VARCHAR(50)) RETURNS INT(11) BEGIN
	DECLARE studentorg_id INT;
    
	SELECT org_id INTO studentorg_id FROM school_org WHERE org_name = organization_name;
    
	IF studentorg_id is null THEN
		SET studentorg_id = 0;
	END IF;

	RETURN studentorg_id;
 
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_get_org_name` (`orgid` INT) RETURNS VARCHAR(50) CHARSET utf8 COLLATE utf8_unicode_ci BEGIN
	DECLARE orgname VARCHAR(50);
    
	SELECT org_name INTO orgname FROM school_organization WHERE org_id = orgid;

	RETURN orgname;
 
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_get_org_where_student_is_governor_president` (`studentid` VARCHAR(10) CHARSET utf8mb4) RETURNS INT(11) BEGIN

	RETURN (SELECT org_id FROM organization_member WHERE student_id = studentid and position = 'Governor' or position = 'President');
 
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_get_scholarship_name` (`scholarshipid` INT) RETURNS VARCHAR(50) CHARSET utf8mb4 BEGIN
	DECLARE scholarshipname VARCHAR(50);
    
	SELECT program_name INTO scholarshipname FROM scholarship_program WHERE program_id = scholarshipid;

	RETURN scholarshipname;
 
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_get_scholarship_program_id` (`scholarship_name` VARCHAR(50)) RETURNS INT(11) BEGIN
	DECLARE prog_id INT;
    
	SELECT program_id INTO prog_id FROM scholarship_program WHERE program_name = scholarship_name;
    
	IF prog_id is null THEN
		SET prog_id = 0;
	END IF;

	RETURN prog_id;
 
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_get_scholarship_status` (`scholarstatus` INT) RETURNS VARCHAR(50) CHARSET utf8mb4 BEGIN
	DECLARE scholarshipstatus VARCHAR(50);
    
	SELECT status_name INTO scholarshipstatus FROM scholarship_status WHERE status_id = scholarstatus;

	RETURN scholarshipstatus;
 
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_get_schoolyear` () RETURNS VARCHAR(10) CHARSET latin1 BEGIN

 	RETURN (SELECT schoolyear FROM school_year WHERE status = "Active");

END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_get_semester` (`_id` INT) RETURNS VARCHAR(150) CHARSET utf8mb4 BEGIN
	DECLARE datatoreturn VARCHAR(150);
 
		SELECT semester_name INTO datatoreturn FROM semester WHERE semester_id = _id;
    
	return datatoreturn;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_get_semester_name` (`semesterid` INT) RETURNS VARCHAR(50) CHARSET utf8mb4 BEGIN
	DECLARE semestername VARCHAR(50);
    
	SELECT semester_name INTO semestername FROM semester WHERE semester_id = semesterid;

	RETURN semestername;
 
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_get_status_name` (`statusid` INT) RETURNS VARCHAR(50) CHARSET utf8mb4 BEGIN
	DECLARE statusname VARCHAR(50);
    
	SELECT description INTO statusname FROM scholarship_status WHERE status_id = statusid;

	RETURN statusname;
 
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_get_student_birthdate` (`student_id` VARCHAR(11)) RETURNS VARCHAR(50) CHARSET utf8mb4 BEGIN
	DECLARE dob VARCHAR(50);
    
	SELECT birth_date INTO dob FROM personal_info WHERE User_id = student_id;

	RETURN dob;
 
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_get_student_email` (`student_id` VARCHAR(11)) RETURNS VARCHAR(50) CHARSET utf8mb4 BEGIN
	DECLARE email VARCHAR(50);
    
	SELECT email_add INTO email FROM personal_info WHERE User_id = student_id;

	RETURN email;
 
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_get_student_id` (`stud_id` VARCHAR(11)) RETURNS VARCHAR(11) CHARSET utf8mb4 BEGIN
	DECLARE studentid VARCHAR(11);
    
	SELECT student_id INTO studentid FROM scholar_info WHERE student_id = stud_id;

	RETURN studentid;
 
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_get_student_position_in_org` (`orgid` INT, `studentid` VARCHAR(10) CHARSET utf8mb4) RETURNS VARCHAR(150) CHARSET utf8mb4 BEGIN
	RETURN (SELECT position FROM organization_member WHERE org_id = orgid and student_id = studentid);
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_get_student_sex` (`student_id` VARCHAR(11)) RETURNS VARCHAR(11) CHARSET utf8mb4 BEGIN
	DECLARE gender VARCHAR(50);
    
	SELECT sex INTO gender FROM personal_info WHERE User_id = student_id;

	RETURN gender;
 
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_get_student_status` (`statusid` INT) RETURNS VARCHAR(50) CHARSET utf8mb4 BEGIN
	DECLARE studentstatus VARCHAR(50);
    
	SELECT description INTO studentstatus FROM student_status WHERE status_id = statusid;

	RETURN studentstatus;
 
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_get_subject_from_temptbl` (`_id` INT) RETURNS VARCHAR(150) CHARSET utf8mb4 BEGIN
	DECLARE datatoreturn VARCHAR(150);
 
		SELECT subcode INTO datatoreturn FROM temptbl WHERE id = _id;
    
	return datatoreturn;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_get_type_of_scholarship` (`typeid` INT) RETURNS VARCHAR(50) CHARSET utf8mb4 BEGIN
	DECLARE typename VARCHAR(50);
    
	SELECT type_name INTO typename FROM scholarship_type WHERE type_id = typeid;

	RETURN typename;
 
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

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_get_year` (`yearid` VARCHAR(11)) RETURNS VARCHAR(11) CHARSET utf8mb4 BEGIN
	DECLARE yeardesc VARCHAR(11);
    
	SELECT year_desc INTO yeardesc FROM year WHERE year_id = yearid;

	RETURN yeardesc;
 
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `sf_get_yearlevel` (`_id` INT) RETURNS VARCHAR(150) CHARSET utf8mb4 BEGIN
	DECLARE datatoreturn VARCHAR(150);
 
		SELECT year_desc INTO datatoreturn FROM year WHERE year_id = _id;
    
	return datatoreturn;
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
-- Table structure for table `accre_files`
--

CREATE TABLE `accre_files` (
  `org_id` int(16) NOT NULL,
  `org_name` varchar(50) NOT NULL,
  `Org_President_Governor` varchar(30) NOT NULL,
  `Org_Adviser` varchar(50) NOT NULL,
  `Type` varchar(25) NOT NULL,
  `AccomRep` varchar(50) CHARACTER SET latin1 NOT NULL,
  `AFS` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Lists_officers` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Lists_members` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Aff_adviser` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Aff_high_officer` varchar(50) CHARACTER SET latin1 NOT NULL,
  `AFP` varchar(50) CHARACTER SET latin1 NOT NULL,
  `CBL_logo` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accre_files`
--

INSERT INTO `accre_files` (`org_id`, `org_name`, `Org_President_Governor`, `Org_Adviser`, `Type`, `AccomRep`, `AFS`, `Lists_officers`, `Lists_members`, `Aff_adviser`, `Aff_high_officer`, `AFP`, `CBL_logo`) VALUES
(22, 'ABCD', '2018-00002 Pineza, Dina', 'Barney', 'Govt. Funded', 'Online-Job-Vacancies-System.docx', '1905 (2).pdf', 'ADMIN-INTERFACE-DESIGN.pdf', 'ADMIN-INTERFACE-DESIGN.pdf', 'GANTT-CHART-OSAS-WEBSITE (5).pdf', 'List of 463 grantees.pdf', 'Talk Talk Talk 1 NEW EDITION.pdf', 'GANTT-CHART-OSAS-WEBSITE (4).pdf'),
(5, 'SITS', '2021-00001 Potter, Harry', 'Barney', 'Govt. Funded', 'AccomplishmentReport.docx', 'AFS.docx', 'ListofOfficers.docx', 'ListofMembers.docx', 'NotarizedAffidavitofAdviser.docx', 'NotarizedAffidavitofHighestOfficer.docx', 'Action&FinancialPlan.docx', 'CBLwLogo.docx'),
(2, 'SITS', '2021-00001 Potter, Harry', 'Barney', 'Govt. Funded', 'AccomplishmentReport.docx', 'AFS.docx', 'ListofOfficers.docx', 'ListofMembers.docx', 'NotarizedAffidavitofAdviser.docx', 'NotarizedAffidavitofHighestOfficer.docx', 'Action&FinancialPlan.docx', 'CBLwLogo.docx');

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `User_Id` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `User_type` varchar(50) NOT NULL,
  `IP_address` varchar(50) NOT NULL,
  `Date_Time` datetime NOT NULL,
  `Activity` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `id` varchar(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `middle_name` varchar(45) DEFAULT NULL,
  `suffix` varchar(10) DEFAULT NULL,
  `email_add` varchar(50) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `major` varchar(45) NOT NULL,
  `last_sy_attended` varchar(25) NOT NULL,
  `password` varchar(45) NOT NULL,
  `school_id_pic` blob NOT NULL,
  `profile_pic` blob DEFAULT NULL,
  `date_registered` date DEFAULT NULL,
  `date_verified` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `approve_funded`
--

CREATE TABLE `approve_funded` (
  `org_name` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
  `org_pres_gov` varchar(25) NOT NULL,
  `org_adviser` varchar(25) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `approve_funded`
--

INSERT INTO `approve_funded` (`org_name`, `id`, `org_pres_gov`, `org_adviser`, `type`) VALUES
('', 0, '', '', ''),
('GHI', 0, '', '', ''),
('ABCD', 22, '', '', 'Non-Govt. Funded Organization'),
('ABCD', 22, '', '', 'Non-Govt. Funded Organization'),
('GHI', 25, '', '', 'Non-Govt. Funded Organization'),
('ABCD', 22, '', '', 'Non-Govt. Funded Organization');

-- --------------------------------------------------------

--
-- Table structure for table `clinic_certificate_requests`
--

CREATE TABLE `clinic_certificate_requests` (
  `request_id` int(11) NOT NULL,
  `user_id` varchar(45) NOT NULL,
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
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `Complaint_ID` int(11) NOT NULL,
  `Student_id` varchar(10) NOT NULL,
  `Date_Submitted` date NOT NULL,
  `Date_of_incident` date NOT NULL,
  `Time_of_incident` time NOT NULL,
  `Loc_of_incident` varchar(50) NOT NULL,
  `Person_Complained` varchar(50) NOT NULL,
  `Designation_Complained` varchar(50) NOT NULL,
  `Detail` varchar(500) NOT NULL,
  `Witness1` varchar(50) NOT NULL,
  `Witness2` varchar(50) NOT NULL,
  `Witness3` varchar(50) NOT NULL,
  `Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`Complaint_ID`, `Student_id`, `Date_Submitted`, `Date_of_incident`, `Time_of_incident`, `Loc_of_incident`, `Person_Complained`, `Designation_Complained`, `Detail`, `Witness1`, `Witness2`, `Witness3`, `Status`) VALUES
(1, '2021-00001', '2021-07-01', '2021-07-01', '09:00:00', 'fsd', 'fsdf', 'fsd', 'fsd', 'fsd', 'fsd', 'fsd', 'fsd');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `college_id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `name` varchar(150) NOT NULL,
  `major` varchar(150) DEFAULT NULL,
  `student_type` varchar(45) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `college_id`, `title`, `name`, `major`, `student_type`, `status`) VALUES
(1, 2, 'BSABE', 'Bachelor of Science in Agricultural and Biosystems Engineering', NULL, 'Undergraduate', 'Active'),
(2, 1, 'BEED', 'Bachelor of Elementary Education', NULL, 'Undergraduate', 'Active'),
(3, 1, 'BSNED', 'Bachelor of Special Needs Education', NULL, 'Undergraduate', 'Active'),
(4, 1, 'BECE', 'Bachelor of Early Childhood Education', NULL, 'Undergraduate', 'Active'),
(5, 1, 'BSEE', 'Bachelor of Secondary Education', 'Major in English', 'Undergraduate', 'Active'),
(6, 1, 'BTVTE', 'Bachelor of Technical-Vocational Teacher Education', NULL, 'Undergraduate', 'Active'),
(7, 1, 'BSIT', 'Bachelor of Science in Information Technology', 'Major in Information Security', 'Undergraduate', 'Active'),
(8, 1, 'DEEM', 'Doctor of Education in Educational Management', NULL, 'Graduate', 'Active'),
(9, 1, 'ME', 'Master of Education', NULL, 'Graduate', 'Active'),
(10, 1, 'MELT', 'Master of Education in Language Teaching', NULL, 'Graduate', 'Active'),
(11, 2, 'BSA', 'Bachelor of Science in Agriculture', NULL, 'Undergraduate', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `current_semester`
--

CREATE TABLE `current_semester` (
  `semester` varchar(12) NOT NULL,
  `year` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `curriculum`
--

CREATE TABLE `curriculum` (
  `id` int(2) NOT NULL,
  `course_id` int(2) NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `curriculum`
--

INSERT INTO `curriculum` (`id`, `course_id`, `title`, `date_created`, `status`) VALUES
(1, 7, 'BSIT Curriculum - Information Security', '2021-07-23', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` int(11) NOT NULL,
  `college_id` int(11) NOT NULL,
  `dept_head` int(11) DEFAULT NULL,
  `dept_name` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `college_id`, `dept_head`, `dept_name`, `status`) VALUES
(1, 1, NULL, 'Department of Information Technology', 'Active'),
(2, 2, NULL, 'Department of Agricultural Engineering', 'Active'),
(3, 1, NULL, 'Department of Special Needs Education', 'Active'),
(4, 1, NULL, 'Department of English Secondary Education', 'Active'),
(5, 1, NULL, 'Department of Elementary Education', 'Active'),
(6, 2, NULL, 'Department of Agriculture', 'Active');

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
  `guardian_occupation` varchar(45) DEFAULT NULL,
  `guardian_contact` varchar(11) DEFAULT NULL,
  `spouse_name` varchar(50) DEFAULT NULL,
  `spouse_occupation` varchar(50) DEFAULT NULL,
  `spouse_contact` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emergency_contact`
--

INSERT INTO `emergency_contact` (`Student_id`, `father_name`, `father_occupation`, `father_contact`, `mother_name`, `mother_occupation`, `mother_contact`, `living_with`, `guardian_name`, `guardian_occupation`, `guardian_contact`, `spouse_name`, `spouse_occupation`, `spouse_contact`) VALUES
('2018-00001', 'A Father', '', '09111111111', 'A Mother', '', '09222222222', NULL, 'A Mother', NULL, '09222222222', '', '', NULL),
('2018-00002', 'Father ni Dina', '', '09123456789', 'Mother ni Dina', '', '09123456789', NULL, '', NULL, '', 'Sabasales Bonnel Alvarez', '', NULL),
('2018-00003', 'Father ni Jan', '', '09123456789', 'Mother ni Jan', '', '09123456789', NULL, '', NULL, '', '', '', NULL),
('2018-00159', 'Father ni Jibb', '', '09123456789', 'Mother ni Jibb', '', '09123456789', NULL, '', NULL, '', '', '', NULL),
('2018-00161', 'Father ni George', '', '09123456789', 'Mother ni George', '', '09123456789', NULL, '', NULL, '', '', '', NULL),
('2018-00234', 'Father ni George', '', '09123456789', 'Mother ni George', '', '09123456789', NULL, '', NULL, '', '', '', NULL),
('2021-00001', 'James Potter', '', '', 'Lily Potter', '', '', 'Parents', '', '', '', '', '', ''),
('2021-00002', 'Father ni Ashin', '', '', 'Mother ni Ashin', '', '', 'Parents', '', '', '', '', '', ''),
('2021-00003', 'fasd', 'asdf', '', 'sdf', 'asdf', '', 'Parents', 'asdf', 'sdf', '', 'adsf', 'asdf', '');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment_list`
--

CREATE TABLE `enrollment_list` (
  `id` int(11) NOT NULL,
  `Student_id` varchar(10) NOT NULL,
  `schoolyear` varchar(45) DEFAULT NULL,
  `semester` varchar(45) DEFAULT NULL,
  `student_yearlevel` varchar(45) DEFAULT NULL,
  `subject_code1` varchar(15) DEFAULT NULL,
  `units1` int(1) DEFAULT 0,
  `grade1` float DEFAULT NULL,
  `subject_code2` varchar(15) DEFAULT NULL,
  `units2` int(1) DEFAULT 0,
  `grade2` float DEFAULT NULL,
  `subject_code3` varchar(15) DEFAULT NULL,
  `units3` int(1) DEFAULT 0,
  `grade3` float DEFAULT NULL,
  `subject_code4` varchar(15) DEFAULT NULL,
  `units4` int(1) DEFAULT 0,
  `grade4` float DEFAULT NULL,
  `subject_code5` varchar(15) DEFAULT NULL,
  `units5` int(1) DEFAULT 0,
  `grade5` float DEFAULT NULL,
  `subject_code6` varchar(15) DEFAULT NULL,
  `units6` int(1) DEFAULT 0,
  `grade6` float DEFAULT NULL,
  `subject_code7` varchar(15) DEFAULT NULL,
  `units7` int(1) DEFAULT 0,
  `grade7` float DEFAULT NULL,
  `subject_code8` varchar(15) DEFAULT NULL,
  `units8` int(1) DEFAULT 0,
  `grade8` float DEFAULT NULL,
  `subject_code9` varchar(15) DEFAULT NULL,
  `units9` int(1) DEFAULT 0,
  `grade9` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enrollment_list`
--

INSERT INTO `enrollment_list` (`id`, `Student_id`, `schoolyear`, `semester`, `student_yearlevel`, `subject_code1`, `units1`, `grade1`, `subject_code2`, `units2`, `grade2`, `subject_code3`, `units3`, `grade3`, `subject_code4`, `units4`, `grade4`, `subject_code5`, `units5`, `grade5`, `subject_code6`, `units6`, `grade6`, `subject_code7`, `units7`, `grade7`, `subject_code8`, `units8`, `grade8`, `subject_code9`, `units9`, `grade9`) VALUES
(2, '2021-00001', '2021-2022', '1', '1', 'GE 111', 3, NULL, 'GE 112', 3, NULL, 'GE 113', 3, NULL, 'IC111', 3, NULL, 'IC112', 3, NULL, 'IC113', 3, NULL, 'PE 111', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `govt_funded_org`
--

CREATE TABLE `govt_funded_org` (
  `Num` int(11) NOT NULL,
  `org_name` varchar(25) NOT NULL,
  `id` int(11) NOT NULL,
  `org_pres_gov` varchar(25) NOT NULL,
  `org_adviser` varchar(25) NOT NULL,
  `type` varchar(30) NOT NULL,
  `logo` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `govt_funded_org`
--

INSERT INTO `govt_funded_org` (`Num`, `org_name`, `id`, `org_pres_gov`, `org_adviser`, `type`, `logo`) VALUES
(1, 'ABCD', 22, '2018-00002 Pineza, Dina', 'Barney', 'Govt. Funded', 'osaslogo.png');

-- --------------------------------------------------------

--
-- Table structure for table `grantee_history`
--

CREATE TABLE `grantee_history` (
  `id` int(11) NOT NULL,
  `Student_id` varchar(10) NOT NULL,
  `program_id` int(11) NOT NULL,
  `student_status` int(11) NOT NULL,
  `semester_year` varchar(45) DEFAULT NULL,
  `semester` varchar(20) DEFAULT NULL,
  `year` varchar(45) DEFAULT NULL,
  `card` blob DEFAULT NULL,
  `validation_status` varchar(45) DEFAULT NULL,
  `status_allowance` varchar(15) DEFAULT NULL,
  `status_billing` varchar(15) DEFAULT NULL,
  `status_payroll` varchar(15) DEFAULT NULL,
  `status_liquidation` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grantee_history`
--

INSERT INTO `grantee_history` (`id`, `Student_id`, `program_id`, `student_status`, `semester_year`, `semester`, `year`, `card`, `validation_status`, `status_allowance`, `status_billing`, `status_payroll`, `status_liquidation`) VALUES
(1, '2021-00001', 1, 1, '1st Semester 1st Year', 'Off Semester', NULL, NULL, 'Validated', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `list_of_semester`
--

CREATE TABLE `list_of_semester` (
  `semester_id` int(11) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `year` varchar(20) NOT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `list_of_subjects`
--

CREATE TABLE `list_of_subjects` (
  `subject_code` int(64) NOT NULL,
  `unit` int(11) NOT NULL,
  `subject_description` varchar(128) NOT NULL,
  `semester_load` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in structure for view `login_credentials`
-- (See below for the actual view)
--
CREATE TABLE `login_credentials` (
`username` varchar(50)
,`name` varchar(150)
,`password` varchar(255)
,`usertype` varchar(50)
,`userpic` blob
,`student_org` varchar(150)
,`student_position` varchar(150)
,`scholarship_status` varchar(0)
,`staff_office` varchar(50)
,`staff_position` varchar(50)
,`verified_status` varchar(12)
,`account_status` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `non_govt_funded_org`
--

CREATE TABLE `non_govt_funded_org` (
  `Num` int(11) NOT NULL,
  `org_name` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
  `org_pres_gov` varchar(25) NOT NULL,
  `org_adviser` varchar(25) NOT NULL,
  `type` varchar(30) NOT NULL,
  `logo` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `non_govt_funded_org`
--

INSERT INTO `non_govt_funded_org` (`Num`, `org_name`, `id`, `org_pres_gov`, `org_adviser`, `type`, `logo`) VALUES
(1, 'XYZ', 23, '2021-00001 Prollo, Jan', 'Johnny Bravo', 'Non-Govt. Funded', 'useplogo.png'),
(2, 'HARHAR', 24, '2018-00001 Doe, Jane', 'Barney', 'Govt. Funded', 'teamwork.png'),
(3, 'LMNO', 25, '2021-00001 Potter, Harry', 'Barney', 'Non-Govt. Funded Organization', 'oval.png');

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
-- Table structure for table `organization_member`
--

CREATE TABLE `organization_member` (
  `id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL,
  `student_id` varchar(10) NOT NULL,
  `position` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `organization_member`
--

INSERT INTO `organization_member` (`id`, `org_id`, `student_id`, `position`, `status`) VALUES
(3, 1, '2018-00003', 'Governor', 'Active'),
(4, 2, '2018-00161', 'Governor', 'Active'),
(5, 5, '2018-00001', 'Governor', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `org_applications`
--

CREATE TABLE `org_applications` (
  `ID` int(11) NOT NULL,
  `Org_Name` varchar(50) NOT NULL,
  `Org_President_Governor` varchar(25) NOT NULL,
  `Org_Adviser` varchar(25) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `App_letter` varchar(50) CHARACTER SET latin1 NOT NULL,
  `MVS` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Aff_Lead` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Resolution` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Letter_Permission` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Letter_content` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Lists` varchar(50) CHARACTER SET latin1 NOT NULL,
  `ConsLaw` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Logo` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Letter_intent` varchar(50) CHARACTER SET latin1 NOT NULL,
  `date_apply` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `org_applications`
--

INSERT INTO `org_applications` (`ID`, `Org_Name`, `Org_President_Governor`, `Org_Adviser`, `Type`, `App_letter`, `MVS`, `Aff_Lead`, `Resolution`, `Letter_Permission`, `Letter_content`, `Lists`, `ConsLaw`, `Logo`, `Letter_intent`, `date_apply`, `status`) VALUES
(27, 'LMNO', '2018-00002 Pineza, Dina', 'Snape ', 'Govt. Funded', 'ApplicationLetter.rtf', 'MissionVissionStatement.docx', 'NotarizedAffidavitofLeadership.docx', 'Resolution.docx', 'LetterofIntent.docx', '', '', '', '', '', '2021-09-07 17:49:47', 1),
(28, 'GHI', '2018-00159 Dawang, Jibb', 'Barney', 'Non-Govt. Funded', 'ApplicationLetter.rtf', 'MissionVissionStatement.docx', 'NotarizedAffidavitofLeadership.docx', 'Resolution.docx', 'LetterofPermission.docx', '', '', '', '', '', '2021-09-07 17:53:30', 1),
(29, 'EFG', '2021-00001 Potter, Harry', 'Barney', 'Govt. Funded', 'ApplicationLetter.rtf', 'MissionVissionStatement.docx', 'NotarizedAffidavitofLeadership.docx', 'Resolution.docx', 'LetterofPermission.docx', '', '', '', '', '', '2021-09-07 18:02:33', 0);

-- --------------------------------------------------------

--
-- Table structure for table `org_applications_files`
--

CREATE TABLE `org_applications_files` (
  `Num` int(11) NOT NULL,
  `org_name` varchar(50) NOT NULL,
  `file` varchar(50) CHARACTER SET latin1 NOT NULL,
  `location` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `org_applications_files`
--

INSERT INTO `org_applications_files` (`Num`, `org_name`, `file`, `location`) VALUES
(1, 'EFG', 'Online-Job-Vacancies-System.docx', 'Org_Applications/Online-Job-Vacancies-System.docx'),
(2, 'EFG', '1905 (2).pdf', 'Org_Applications/1905 (2).pdf'),
(3, 'EFG', 'GANTT-CHART-OSAS-WEBSITE (5).pdf', 'Org_Applications/GANTT-CHART-OSAS-WEBSITE (5).pdf'),
(4, 'EFG', 'List of 463 grantees.pdf', 'Org_Applications/List of 463 grantees.pdf'),
(5, 'EFG', 'Talk Talk Talk 1 NEW EDITION.pdf', 'Org_Applications/Talk Talk Talk 1 NEW EDITION.pdf'),
(6, 'EFG', 'GANTT-CHART-OSAS-WEBSITE (2).pdf', 'Org_Applications/GANTT-CHART-OSAS-WEBSITE (2).pdf'),
(7, 'EFG', 'GANTT-CHART-OSAS-WEBSITE (3).pdf', 'Org_Applications/GANTT-CHART-OSAS-WEBSITE (3).pdf'),
(8, 'EFG', 'Talk Talk Talk 1 NEW EDITION.pdf', 'Org_Applications/Talk Talk Talk 1 NEW EDITION.pdf'),
(9, 'EFG', 'osaslogo.png', 'Org_Applications/osaslogo.png'),
(10, 'EFG', 'birthCertificate.docx', 'Org_Applications/birthCertificate.docx'),
(11, 'GHI', 'birthCertificate.docx', 'Org_Applications/birthCertificate.docx'),
(12, 'GHI', 'List of 463 grantees.pdf', 'Org_Applications/List of 463 grantees.pdf'),
(13, 'GHI', 'GANTT-CHART-OSAS-WEBSITE (5).pdf', 'Org_Applications/GANTT-CHART-OSAS-WEBSITE (5).pdf'),
(14, 'GHI', 'Student-Organization-PM-Master-Copy.pdf', 'Org_Applications/Student-Organization-PM-Master-Co'),
(15, 'GHI', 'Accomplishment-Report-2020-2021-2nd-sem.docx', 'Org_Applications/Accomplishment-Report-2020-2021-2'),
(16, 'GHI', 'Student-Discipline-PM-Master-Copy.pdf', 'Org_Applications/Student-Discipline-PM-Master-Copy'),
(17, 'GHI', 'id.docx', 'Org_Applications/id.docx'),
(18, 'GHI', 'ITIS327_Quiz3_Comania.docx', 'Org_Applications/ITIS327_Quiz3_Comania.docx'),
(19, 'GHI', 'useplogo.png', 'Org_Applications/useplogo.png'),
(20, 'GHI', 'Muñez_quiz_secpoldetails (1).docx', 'Org_Applications/Muñez_quiz_secpoldetails (1).docx');

-- --------------------------------------------------------

--
-- Table structure for table `org_filess`
--

CREATE TABLE `org_filess` (
  `ID` int(16) NOT NULL,
  `Org` varchar(50) NOT NULL,
  `Org_pres_gov` varchar(25) NOT NULL,
  `Org_adviser` varchar(25) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `WFP` varchar(50) CHARACTER SET latin1 NOT NULL,
  `PPMP` varchar(50) CHARACTER SET latin1 NOT NULL,
  `AccomRep` varchar(50) CHARACTER SET latin1 NOT NULL,
  `ActionPlan` varchar(50) CHARACTER SET latin1 NOT NULL,
  `AFS` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `org_filess`
--

INSERT INTO `org_filess` (`ID`, `Org`, `Org_pres_gov`, `Org_adviser`, `Type`, `WFP`, `PPMP`, `AccomRep`, `ActionPlan`, `AFS`) VALUES
(10, '', '2021-00001 Potter, Harry', 'Barney', 'Govt. Funded', 'Form-D-Competency-Checklist.docx', 'Accomplishment-Report-2020-2021-2nd-sem.docx', '', 'Weekly-Progress-Report-Week-1.docx', 'OSAS-MAIN-MODULE-FLOW.pdf'),
(0, '', '', '', '', 'Form-F.2-SELF-ASSESSMENT (1).docx', '', '', '', ''),
(0, '', '', '', '', 'Form-F.2-SELF-ASSESSMENT (1).docx', '', '', '', ''),
(3, 'nwffiw', '2018-00002 Pineza, Dina', 'scnwe', 'Govt. Funded', '', '', '', '', ''),
(0, '', '', '', '', 'Form-F.2-SELF-ASSESSMENT (1).docx', '', '', '', ''),
(0, '', '', '', '', 'Form-F.2-SELF-ASSESSMENT (1).docx', '', '', '', ''),
(5, 'ABCD', '2021-00001 Potter, Harry', 'Barney', 'Govt. Funded', 'Online-Job-Vacancies-System.docx', '1905 (2).pdf', 'testdb-1-1.sql', 'osasdb6-2.sql', 'testdb-1 (2).sql'),
(10, 'ABCD', '2018-00159 Dawang, Jibb', 'Barney', 'Govt. Funded', 'Form-D-Competency-Checklist.docx', 'Accomplishment-Report-2020-2021-2nd-sem.docx', '', 'Weekly-Progress-Report-Week-1.docx', 'OSAS-MAIN-MODULE-FLOW.pdf'),
(13, 'nwffiw', '2018-00002 Pineza, Dina', 'scnwe', 'Govt. Funded', '', '', '', '', ''),
(3, 'ABCD', '2018-00002 Pineza, Dina', 'reh', 'Govt. Funded', '', '', '', '', ''),
(5, 'SITS', '2021-00001 Potter, Harry', 'Barney', 'Govt. Funded', 'Online-Job-Vacancies-System.docx', '1905 (2).pdf', 'testdb-1-1.sql', 'osasdb6-2.sql', 'testdb-1 (2).sql'),
(10, 'ABCD', '2018-00002 Pineza, Dina', 'saf', 'Govt. Funded', 'Form-D-Competency-Checklist.docx', 'Accomplishment-Report-2020-2021-2nd-sem.docx', '', 'Weekly-Progress-Report-Week-1.docx', 'OSAS-MAIN-MODULE-FLOW.pdf'),
(0, '', '', '', '', 'Form-F.2-SELF-ASSESSMENT (1).docx', '', '', '', ''),
(0, '', '', '', '', 'Form-F.2-SELF-ASSESSMENT (1).docx', '', '', '', ''),
(0, '', '', '', '', 'Form-F.2-SELF-ASSESSMENT (1).docx', '', '', '', ''),
(0, '', '', '', '', 'Form-F.2-SELF-ASSESSMENT (1).docx', '', '', '', ''),
(0, '', '', '', '', 'Form-F.2-SELF-ASSESSMENT (1).docx', '', '', '', ''),
(0, '', '', '', '', 'Form-F.2-SELF-ASSESSMENT (1).docx', '', '', '', ''),
(25, 'GHI', '2021-00001 Potter, Harry', 'Barney', 'Non-Govt. Funded Organization', '[value-6]', '[value-7]', 'GANTT-CHART-OSAS-WEBSITE (4).pdf', 'Form-F.2-SELF-ASSESSMENT (1).docx', 'Online-Job-Vacancies-System.docx'),
(22, 'ABCD', '2018-00001 Pineza, Dina', 'Barney', 'Non-Govt. Funded Organization', '', '', 'Online-Job-Vacancies-System (3)', 'Online-Job-Vacancies-System (3)', 'Online-Job-Vacancies-System (3)'),
(5, 'SITS', '2021-00001 Potter, Harry', 'Barney', 'Govt. Funded', '', '', 'testdb-1-1.sql', 'osasdb6-2.sql', 'testdb-1 (2).sql'),
(3, 'Danzante', '2018-00001 Doe, Jane', 'Barney', 'Non-Govt Funded', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Stand-in structure for view `promotional_report`
-- (See below for the actual view)
--
CREATE TABLE `promotional_report` (
`id` int(11)
,`student_id` varchar(10)
,`last_name` varchar(50)
,`first_name` varchar(50)
,`middle_name` varchar(50)
,`suffix` varchar(15)
,`sex` varchar(10)
,`birthdate` varchar(10)
,`course` varchar(255)
,`student_yearlevel` varchar(45)
,`subject_code1` varchar(15)
,`units1` int(1)
,`grade1` float
,`subject_code2` varchar(15)
,`units2` int(1)
,`grade2` float
,`subject_code3` varchar(15)
,`units3` int(1)
,`grade3` float
,`subject_code4` varchar(15)
,`units4` int(1)
,`grade4` float
,`subject_code5` varchar(15)
,`units5` int(1)
,`grade5` float
,`subject_code6` varchar(15)
,`units6` int(1)
,`grade6` float
,`subject_code7` varchar(15)
,`units7` int(1)
,`grade7` float
,`subject_code8` varchar(15)
,`units8` int(1)
,`grade8` float
,`subject_code9` varchar(15)
,`units9` int(1)
,`grade9` float
,`totalunits` bigint(19)
,`gwa` char(0)
,`graduate_question` varchar(3)
);

-- --------------------------------------------------------

--
-- Table structure for table `remarks_apply`
--

CREATE TABLE `remarks_apply` (
  `org_name` varchar(50) NOT NULL,
  `file` varchar(25) CHARACTER SET latin1 NOT NULL,
  `message` varchar(100) NOT NULL,
  `image` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `remarks_apply`
--

INSERT INTO `remarks_apply` (`org_name`, `file`, `message`, `image`) VALUES
('nwffiw', 'Constitutional by Laws', 'er vjervhbwuyd', 'IMG_20210808_211649.jpg'),
('', '', '', ''),
('', '', '', ''),
('ABCD', 'Letter of Permission', 'cwhvq', 'human interface design.jp'),
('XYZ', 'Notarized Affidavit of Le', 'cw', 'IMG_20210717_111411.jpg'),
('HARHAR', 'Resolution', 'wdqjdb', 'IMG_20210808_211649.jpg'),
('XYZ', 'Notarized Affidavit of Le', 'sjbdjwh', 'IMG_20210717_111411.jpg'),
('ABCD', 'List of Officers and Memb', 'cewfww', 'human interface design.jp'),
('HARHAR', 'Application Letter', 'cwefefe', 'IMG_20210808_211649.jpg'),
('LMNO', 'Letter of Permission', 'wevgerg', 'teamwork.png'),
('nwffiw', 'AccomRep', 'cwefwrg', 'IMG_20210808_211649.jpg'),
('nwffiw', 'AccomRep', 'cwefwrg', 'IMG_20210808_211649.jpg'),
('nwffiw', 'AFS', 'cqwjbqhw', 'IMG_20210808_211649.jpg'),
('nwffiw', 'AFS', 'cqwjbqhw', 'IMG_20210808_211649.jpg'),
('nwffiw', 'WFP Letter', 'dqwdqnhd', 'IMG_20210808_211649.jpg'),
('nwffiw', 'WFP Letter', 'dqwdqnhd', 'IMG_20210808_211649.jpg'),
('nwffiw', 'AccomRep', 'cwjbcuwye', 'IMG_20210808_211649.jpg'),
('nwffiw', 'AccomRep', 'cwjbcuwye', 'IMG_20210808_211649.jpg'),
('XYZ', 'Notarized Affidavit of Le', 'cwncefqvwdyqw', 'IMG_20210717_111411.jpg'),
('HARHAR', 'Constitutional by Laws', 'ewgeevg', 'IMG_20210808_211649.jpg'),
('HARHAR', 'Mission Vission Statement', 'cwww', 'human interface design.jp'),
('HARHAR', 'Mission Vission Statement', 'cwefw', 'human interface design.jp'),
('HARHAR', 'Mission Vission Statement', 'cwjedbuwd', 'human interface design.jp'),
('ABCD', '', '', '118595642_168382444861621'),
('GHI', 'Notarized Affidavit of th', 'c wefbwuef', ''),
('GHI', 'List of Officers w/Contac', 'ajx whdbwhc', ''),
('ABCD', 'Notarized Affidavit of th', 'j cweyf', ''),
('LMNO', 'Application Letter', 'nscbe', '');

-- --------------------------------------------------------

--
-- Table structure for table `response`
--

CREATE TABLE `response` (
  `Complaint_ID` int(11) NOT NULL,
  `status` varchar(45) DEFAULT NULL,
  `defendant` varchar(145) DEFAULT NULL,
  `details` varchar(45) DEFAULT NULL,
  `date_schedule` date DEFAULT NULL,
  `time_from` time DEFAULT NULL,
  `time_to` time DEFAULT NULL,
  `meeting_type` varchar(45) DEFAULT NULL,
  `meeting_link` varchar(150) DEFAULT NULL,
  `meeting_id` varchar(45) DEFAULT NULL,
  `passcode` varchar(45) DEFAULT NULL,
  `action_taken` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `response`
--

INSERT INTO `response` (`Complaint_ID`, `status`, `defendant`, `details`, `date_schedule`, `time_from`, `time_to`, `meeting_type`, `meeting_link`, `meeting_id`, `passcode`, `action_taken`) VALUES
(1, 'fas', 'fsa', NULL, '2021-07-01', '09:00:00', '10:00:00', 'fasdf', 'fas', 'fsd', 'fas', 'OSAS');

-- --------------------------------------------------------

--
-- Stand-in structure for view `scholarship_general_info`
-- (See below for the actual view)
--
CREATE TABLE `scholarship_general_info` (
`student_id` varchar(10)
,`last_name` varchar(50)
,`first_name` varchar(50)
,`middle_name` varchar(50)
,`suffix` varchar(15)
,`semester_year` varchar(45)
,`course_id` int(11)
,`year_level` varchar(20)
,`coursename` varchar(255)
,`college_id` varchar(150)
,`college_name` varchar(150)
,`program_id` int(11)
,`program_name` varchar(50)
,`program_provider` varchar(50)
,`program_status` varchar(50)
,`program_type` varchar(50)
,`amount` varchar(20)
,`card` blob
,`student_status` int(11)
,`status_name` varchar(50)
,`card_status` varchar(16)
,`billing_status` varchar(15)
,`payroll_status` varchar(15)
,`liquidation_status` varchar(15)
,`allowance_status` varchar(15)
);

-- --------------------------------------------------------

--
-- Table structure for table `scholarship_masterlist_documents`
--

CREATE TABLE `scholarship_masterlist_documents` (
  `date` date NOT NULL,
  `no` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `number` varchar(256) NOT NULL,
  `prev_revision_date` date NOT NULL,
  `prev_revision_number` varchar(256) NOT NULL,
  `latest_revision_date` date NOT NULL,
  `latest_revision_number` varchar(256) NOT NULL,
  `document_soft_copy` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scholarship_masterlist_documents`
--

INSERT INTO `scholarship_masterlist_documents` (`date`, `no`, `title`, `number`, `prev_revision_date`, `prev_revision_number`, `latest_revision_date`, `latest_revision_number`, `document_soft_copy`) VALUES
('2021-07-20', 1, 'Montera Gwapo', '11021999', '2000-11-02', '10293091203', '2020-12-31', '2147483647', 0x506170612048496768205363686f6f6c204469706c6f6d612e706466);

-- --------------------------------------------------------

--
-- Table structure for table `scholarship_masterlist_external_reference`
--

CREATE TABLE `scholarship_masterlist_external_reference` (
  `date` date NOT NULL,
  `no` int(11) NOT NULL,
  `external_reference_title` varchar(128) NOT NULL,
  `revision_number` varchar(128) NOT NULL,
  `mode_of_filing` varchar(64) NOT NULL,
  `custodian` varchar(128) NOT NULL,
  `location` varchar(128) NOT NULL,
  `retention_active` date NOT NULL,
  `retention_archive` int(11) NOT NULL,
  `external_reference_soft_copy` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scholarship_masterlist_external_reference`
--

INSERT INTO `scholarship_masterlist_external_reference` (`date`, `no`, `external_reference_title`, `revision_number`, `mode_of_filing`, `custodian`, `location`, `retention_active`, `retention_archive`, `external_reference_soft_copy`) VALUES
('2021-07-20', 1, '0', '0', '0', '0', '0', '2021-07-23', 1970, 0x30),
('2021-07-20', 2, '0', '123123123', '123123', '0', '0', '2021-07-23', 2021, 0x30);

-- --------------------------------------------------------

--
-- Table structure for table `scholarship_masterlist_record`
--

CREATE TABLE `scholarship_masterlist_record` (
  `date` date NOT NULL,
  `record_no` int(11) NOT NULL,
  `records_title` varchar(128) NOT NULL,
  `type_of_records` varchar(64) NOT NULL,
  `mode_of_filing` varchar(64) NOT NULL,
  `custodian` varchar(128) NOT NULL,
  `location` varchar(128) NOT NULL,
  `retention_active` date NOT NULL,
  `retention_archive` date NOT NULL,
  `disposition_year` date NOT NULL,
  `disposition_method` varchar(64) NOT NULL,
  `record_soft_copy` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scholarship_masterlist_record`
--

INSERT INTO `scholarship_masterlist_record` (`date`, `record_no`, `records_title`, `type_of_records`, `mode_of_filing`, `custodian`, `location`, `retention_active`, `retention_archive`, `disposition_year`, `disposition_method`, `record_soft_copy`) VALUES
('2021-07-20', 1, 'asdasd', '2', 'asda', 'asd', 'asdasd', '2021-07-13', '2020-06-08', '2021-07-08', 'asdasda', 0x506170612048496768205363686f6f6c204469706c6f6d612e706466);

-- --------------------------------------------------------

--
-- Table structure for table `scholarship_masterlist_transmittal`
--

CREATE TABLE `scholarship_masterlist_transmittal` (
  `date` date NOT NULL,
  `no` int(11) NOT NULL,
  `date_time_received` datetime NOT NULL,
  `received_by` varchar(64) NOT NULL,
  `reference_number` varchar(128) NOT NULL,
  `source_origin_office` varchar(128) NOT NULL,
  `type` varchar(64) NOT NULL,
  `subject_matter` varchar(255) NOT NULL,
  `date_2` date NOT NULL,
  `action_taken` varchar(255) NOT NULL,
  `date_time_dispatch` datetime NOT NULL,
  `dispatched_by` varchar(64) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `transmittal_soft_copy` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scholarship_masterlist_transmittal`
--

INSERT INTO `scholarship_masterlist_transmittal` (`date`, `no`, `date_time_received`, `received_by`, `reference_number`, `source_origin_office`, `type`, `subject_matter`, `date_2`, `action_taken`, `date_time_dispatch`, `dispatched_by`, `remarks`, `transmittal_soft_copy`) VALUES
('2021-07-20', 1, '1970-01-01 01:00:00', '', '', '', '', '', '1970-01-01', '', '1970-01-01 01:00:00', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `scholarship_program`
--

CREATE TABLE `scholarship_program` (
  `program_id` int(11) NOT NULL,
  `program_provider` varchar(50) NOT NULL,
  `program_name` varchar(50) NOT NULL,
  `program_status` int(1) NOT NULL,
  `type` int(1) NOT NULL,
  `amount` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scholarship_program`
--

INSERT INTO `scholarship_program` (`program_id`, `program_provider`, `program_name`, `program_status`, `type`, `amount`) VALUES
(1, 'City Hall of Tagum', 'Carmilla\'s Scholarship', 2, 2, '60000'),
(2, 'CHED', 'TDP - PL/SENATE', 1, 2, '15000'),
(3, 'Burning Legion\'s Scholarship', 'Nether Realm', 1, 2, '40000'),
(4, 'Raiders League', 'Crim Organization', 2, 2, '15000'),
(5, 'Razzle Frazzle\'s Elite Scholars', 'Magic Realm of Wizards', 2, 2, '50000'),
(6, 'University', 'University Scholar', 1, 1, '5000'),
(7, 'University', 'College Scholar', 1, 1, '6000');

-- --------------------------------------------------------

--
-- Table structure for table `scholarship_status`
--

CREATE TABLE `scholarship_status` (
  `status_id` int(1) NOT NULL,
  `status_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scholarship_status`
--

INSERT INTO `scholarship_status` (`status_id`, `status_name`) VALUES
(1, 'Active'),
(2, 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `scholarship_type`
--

CREATE TABLE `scholarship_type` (
  `type_id` int(1) NOT NULL,
  `type_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scholarship_type`
--

INSERT INTO `scholarship_type` (`type_id`, `type_name`) VALUES
(1, 'Internal'),
(2, 'External');

-- --------------------------------------------------------

--
-- Table structure for table `scholar_additional_info`
--

CREATE TABLE `scholar_additional_info` (
  `student_id` varchar(10) NOT NULL,
  `city_address` varchar(50) DEFAULT NULL,
  `parent_name` varchar(50) DEFAULT NULL,
  `parent_occupation` varchar(20) DEFAULT NULL,
  `parents_address` varchar(50) DEFAULT NULL,
  `parents_contact` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scholar_additional_info`
--

INSERT INTO `scholar_additional_info` (`student_id`, `city_address`, `parent_name`, `parent_occupation`, `parents_address`, `parents_contact`) VALUES
('2021-00001', 'C City', 'asdf', 'fasd', 'fas', 'afsdf');

-- --------------------------------------------------------

--
-- Table structure for table `schoolyear`
--

CREATE TABLE `schoolyear` (
  `id` int(11) NOT NULL,
  `schoolyear` varchar(10) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `school_organization`
--

CREATE TABLE `school_organization` (
  `org_id` int(11) NOT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `governor_id` int(24) DEFAULT NULL,
  `org_name` varchar(25) NOT NULL,
  `org_desc` varchar(150) NOT NULL,
  `org_status` varchar(25) NOT NULL DEFAULT 'Unrecognized',
  `fund_type` varchar(45) NOT NULL,
  `logo` blob DEFAULT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `school_organization`
--

INSERT INTO `school_organization` (`org_id`, `staff_id`, `governor_id`, `org_name`, `org_desc`, `org_status`, `fund_type`, `logo`, `status`) VALUES
(1, NULL, NULL, 'AFSET', 'Association of Future Secondary Teachers', 'Recognized', '', NULL, 'Active'),
(2, NULL, NULL, 'OFEE', 'Organization of Future Elementary Educators', 'Recognized', '', NULL, 'Active'),
(3, NULL, 0, 'SITS', 'Society of Information Technology Students', 'Recognized', '', NULL, 'Active'),
(4, NULL, NULL, 'SABES', 'Society of Agricultural and Biosystems Engineering Students', 'Recognized', '', NULL, 'Active'),
(5, 1000000001, 0, 'SITS', 'Society of Information Technology Students', 'Active', 'Government-Funded', '', '');

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
  `semester_id` int(11) NOT NULL,
  `semester_name` varchar(15) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`semester_id`, `semester_name`, `status`) VALUES
(1, '1st Semester', 'Inactive'),
(2, '2nd Semester', 'Inactive'),
(3, 'Off Semester', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `semester_load`
--

CREATE TABLE `semester_load` (
  `load_id` int(11) NOT NULL,
  `course` varchar(10) NOT NULL,
  `college` varchar(10) NOT NULL,
  `year` varchar(10) NOT NULL,
  `semester` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `religion` varchar(50) DEFAULT NULL,
  `nationality` varchar(45) DEFAULT NULL,
  `type` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `employment_status` varchar(20) DEFAULT NULL,
  `account_status` varchar(10) NOT NULL DEFAULT 'Active',
  `e_signature` blob DEFAULT NULL,
  `pic` blob DEFAULT NULL,
  `date_submitted` date NOT NULL,
  `date_verified` date DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `office_id`, `dept_id`, `title`, `last_name`, `first_name`, `middle_name`, `suffix`, `extension`, `sex`, `civil_status`, `birthdate`, `email_add`, `phone_num`, `religion`, `nationality`, `type`, `position`, `employment_status`, `account_status`, `e_signature`, `pic`, `date_submitted`, `date_verified`, `password`) VALUES
(1, 0, 5, NULL, 'Snape', 'Severus', NULL, NULL, 'PhD', 'Male', 'Single', '1989-02-15', 'snape@gmail.com', '09412554125', NULL, 'American', 'Faculty', 'Faculty', 'Regular', 'Active', NULL, NULL, '2021-07-24', '2021-07-24', '1234'),
(1000000001, 1, 0, NULL, 'Barrow', 'Mare', 'Molly', NULL, 'PhD', 'Female', 'Single', '1990-01-15', 'hannajanebw11@gmail.com', '09123456789', NULL, NULL, 'Staff', 'Staff', 'Regular', 'Active', NULL, NULL, '2021-07-18', '2021-07-18', '1234');

-- --------------------------------------------------------

--
-- Stand-in structure for view `staffdetails`
-- (See below for the actual view)
--
CREATE TABLE `staffdetails` (
`staff_id` int(11)
,`title` varchar(5)
,`last_name` varchar(50)
,`first_name` varchar(50)
,`middle_name` varchar(50)
,`suffix` varchar(5)
,`extension` varchar(25)
,`fullname` varchar(150)
,`sex` varchar(10)
,`civil_status` varchar(15)
,`birthdate` date
,`age` int(11)
,`email_add` varchar(50)
,`phone_num` varchar(11)
,`employment_status` varchar(20)
,`account_status` varchar(10)
,`e_signature` blob
,`pic` blob
,`date_submitted` date
,`date_verified` date
,`verified_status` varchar(12)
,`password` varchar(255)
,`office_id` int(11)
,`office_name` varchar(50)
,`dept_id` int(11)
,`dept_name` varchar(50)
,`type` varchar(50)
,`position` varchar(50)
);

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

INSERT INTO `student` (`Student_id`, `course_id`, `reg_id`, `title`, `last_name`, `first_name`, `middle_name`, `suffix`, `house_block_lot_num`, `street`, `prk_vill_sub`, `brgy`, `city`, `province`, `zip_code`, `nationality`, `civil_status`, `religion`, `sex`, `phone_number`, `birth_date`, `birth_place`, `email_add`, `section`, `year_level`, `prev_gwa`, `units_enrolled`, `cor`, `type`, `student_status`, `account_status`, `e_signature`, `pic`, `password`, `date_submitted`, `date_verified`) VALUES
('2018-00001', 3, 15, NULL, 'Doe', 'Jane', '', '', 'Blk. A', 'A St.', 'Prk. A', 'Brgy. A', 'A City', 'A Province', '8111', 'Filipino', 'Single', '', 'Female', '09612112121', '1990-01-01', 'A City', 'hjbmaureal@usep.edu.ph', '3BSNED1', '3rd Year', NULL, NULL, 'student_cor/certificate-of-registration-92803_1626229908_1626598344_1626662081.pdf', 'Undergraduate', 'Currently enrolled', 'Active', NULL, 0x73747564656e745f69642f5f563941303331345f313632363039373137335f313632363636313238335f313632363636323038312e4a5047, '$2y$10$XWDX5IpiqteRFw8bzd8x1.UpJsukArOg.wC3e0la5WViRr2W5E0nm', '2021-07-19', NULL),
('2018-00002', 7, 16, NULL, 'Pineza', 'Dina', 'Lirazan', '', '', 'Something St.', 'Prk. Something', 'Brgy. Something', 'Something City', 'City Province', '8100', 'Filipino', 'Single', '', 'Female', '09123456789', '1999-07-24', 'Tagum City', 'dlpineza@usep.edu.ph', '3IT1', '3rd Year', NULL, NULL, 'student_cor/certificate-of-registration-92803_1626229908_1626597052_1626678903.pdf', 'Undergraduate', 'Currently enrolled', 'Active', NULL, 0x73747564656e745f69642f64696e615f313632363637383930332e6a7067, '$2y$10$0KBsWpBYuTUmIGJiQ3QeNu3RYHOGXEjfCJPgtl6c304ZheOLQ.3YC', '2021-07-19', NULL),
('2018-00003', 7, 19, NULL, 'Prollo', 'Jan Andrianne', '', '', '', 'Something St.', 'Prk. Something', 'Brgy. Something', 'Something City', 'City Province', '8100', 'Filipino', 'Single', '', 'Male', '09123456789', '1999-07-24', 'Tagum City', 'jamprollo@usep.edu.ph', '3IT1', '3rd Year', NULL, NULL, 'student_cor/certificate-of-registration-92803_1626229908_1626597052_1626679332.pdf', 'Undergraduate', 'Currently enrolled', 'Active', NULL, 0x73747564656e745f69642f5f563941303331345f313632363039373137335f313632363637393333322e4a5047, '$2y$10$5zH0zu8mA0e0qaDhRihFnOZrUhXzxj2YXXP66xibuhtLhv1Ew1ure', '2021-07-19', NULL),
('2018-00159', 3, 23, NULL, 'Dawang', 'Jibb', '', '', '', 'Something St.', 'Prk. Something', 'Brgy. Something', 'Something City', 'City Province', '8100', 'Filipino', 'Single', '', 'Male', '09123456789', '1999-07-24', 'Tagum City', 'jedawang159@usep.edu.ph', '3BSNED1', '3rd Year', NULL, NULL, 'student_cor/certificate-of-registration-92803_1626229908_1626597052_1626679719.pdf', 'Undergraduate', 'Currently enrolled', 'Active', NULL, 0x73747564656e745f69642f6973746f636b70686f746f2d313037373536373938322d363132783631325f313632363233373437305f313632363637393731392e6a7067, '$2y$10$OGehkxC51EZoOhhy4FmyI.XKJE.lbC/kZEq8h28aF7kbjMcWGNBJa', '2021-07-19', NULL),
('2018-00161', 7, 20, NULL, 'Dela Cruz', 'Allayssa George', '', '', '', 'Something St.', 'Prk. Something', 'Brgy. Something', 'Something City', 'City Province', '8100', 'Filipino', 'Single', '', 'Male', '09123456789', '1999-07-24', 'Tagum City', 'agadelacruz@usep.edu.ph', '3IT1', '3rd Year', NULL, NULL, 'student_cor/certificate-of-registration-92803_1626229908_1626597052_1626679492.pdf', 'Undergraduate', 'Currently enrolled', 'Active', NULL, 0x73747564656e745f69642f434a424e363836315f313632363232393930385f313632363637393439322e6a7067, '$2y$10$zR2WZwp/HysGydSuZxVx9OOZu0MlVe11NOPf4AxtF4emS/11jL206', '2021-07-19', NULL),
('2018-00234', 7, 22, NULL, 'MuÃ±ez', 'Darlen Rose', '', '', '', 'Something St.', 'Prk. Something', 'Brgy. Something', 'Something City', 'City Province', '8100', 'Filipino', 'Single', '', 'Male', '09123456789', '1999-07-24', 'Tagum City', 'drsmunez@usep.edu.ph', '3IT1', '3rd Year', NULL, NULL, 'student_cor/certificate-of-registration-92803_1626229908_1626597052_1626679595.pdf', 'Undergraduate', 'Currently enrolled', 'Active', NULL, 0x73747564656e745f69642f6973746f636b70686f746f2d313037373536373938322d363132783631325f313632363233373437305f313632363637393539352e6a7067, '$2y$10$jtfkpYh2e5JHqB.t12LGveWSRuJpUG25jdCI9hs.TTXsBNFKe0T0e', '2021-07-19', NULL),
('2021-00001', 7, 24, NULL, 'Potter', 'Harry', '', '', '', 'C St', 'Prk. C', 'Brgy. C', 'C City', 'C Province', '8100', 'Filipino', 'Single', '', 'Female', '09123452142', '1999-12-25', 'C City', 'harry@gmail.com', '1IT1', '1st Year', NULL, 0, '', 'Undergraduate', 'Currently enrolled', 'Active', NULL, '', '1234', '2021-07-24', NULL),
('2021-00002', 7, 25, NULL, 'North', 'Ashin', 'of the', '', '', 'Joseon St.', 'Prk. Joseon', 'Brgy. Joseon', 'Joseon City', 'Joseon Province', '8111', 'Korean', 'Single', '', 'Female', '09236521452', '1999-02-13', 'Joseon City', 'ashin@gmail.com', '1IT1', '1st Year', NULL, NULL, '', 'Undergraduate', 'Currently enrolled', 'Active', NULL, '', '1234', '2021-07-24', NULL),
('2021-00003', 7, 26, NULL, 'Mccartney', 'Melissa', '', '', '', 'A City', 'Prk. A', 'Brgy. A', 'A City', 'A Province', '8100', 'Filipino', 'Single', 'asdf', 'Female', '09632541251', '1999-02-01', 'asdf', 'melissa@gmail.com', '1IT1', '1st Year', NULL, NULL, '', 'Undergraduate', 'Currently enrolled', 'Active', NULL, '', '1234', '2021-07-27', NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `studentdetails`
-- (See below for the actual view)
--
CREATE TABLE `studentdetails` (
`student_id` varchar(10)
,`reg_id` int(11)
,`coursetitle` varchar(20)
,`coursename` varchar(150)
,`college` varchar(150)
,`title` varchar(5)
,`last_name` varchar(50)
,`first_name` varchar(50)
,`middle_name` varchar(50)
,`suffix` varchar(15)
,`fullname` varchar(150)
,`house_block_lot_num` varchar(50)
,`street` varchar(50)
,`prk_vill_sub` varchar(50)
,`brgy` varchar(50)
,`city` varchar(50)
,`province` varchar(50)
,`full_address` varchar(255)
,`zip_code` varchar(5)
,`nationality` varchar(50)
,`civil_status` varchar(15)
,`religion` varchar(50)
,`sex` varchar(10)
,`phone_number` varchar(11)
,`birth_date` date
,`age` int(11)
,`birth_place` varchar(50)
,`email_add` varchar(50)
,`section` varchar(10)
,`year_level` varchar(20)
,`prev_gwa` float
,`units_enrolled` int(11)
,`type` varchar(50)
,`student_status` varchar(25)
,`account_status` varchar(50)
,`cor` varchar(255)
,`e_signature` blob
,`pic` blob
,`password` varchar(255)
,`date_submitted` date
,`date_verified` date
,`verified_status` varchar(12)
,`father_name` varchar(50)
,`father_occupation` varchar(50)
,`father_contact` varchar(11)
,`mother_name` varchar(50)
,`mother_occupation` varchar(50)
,`mother_contact` varchar(50)
,`living_with` varchar(50)
,`guardian_name` varchar(50)
,`guardian_contact` varchar(11)
,`spouse_name` varchar(50)
,`spouse_occupation` varchar(50)
,`school_org` varchar(150)
,`position` varchar(150)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `student_grades`
-- (See below for the actual view)
--
CREATE TABLE `student_grades` (
`id` int(11)
,`student_id` varchar(10)
,`schoolyear` varchar(45)
,`semester_name` varchar(50)
,`yearlevel` varchar(11)
,`subcode` varchar(15)
,`subdesc` varchar(45)
,`units` varchar(45)
,`grade` float
);

-- --------------------------------------------------------

--
-- Table structure for table `student_status`
--

CREATE TABLE `student_status` (
  `status_id` int(11) NOT NULL,
  `description` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_status`
--

INSERT INTO `student_status` (`status_id`, `description`) VALUES
(0, 'For Validation'),
(1, 'Enrolled'),
(2, 'Not Enrolled'),
(3, 'Dropped'),
(4, 'Graduated'),
(5, 'Stopped'),
(6, 'Deceased'),
(7, 'Waive TES for Other Schol'),
(8, 'Second Courser'),
(9, 'Withdrawn Enrollment'),
(10, 'Double Entry'),
(11, 'Taking TESDA Course');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `code` varchar(15) NOT NULL,
  `subject_description` varchar(45) DEFAULT NULL,
  `units` int(1) DEFAULT NULL,
  `yearlevel` varchar(15) DEFAULT NULL,
  `semester` varchar(45) DEFAULT NULL,
  `curriculum_id` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`code`, `subject_description`, `units`, `yearlevel`, `semester`, `curriculum_id`) VALUES
('GE 111', 'Purposive Communication', 3, '1', '1', 1),
('GE 112', 'Mathematics in the Modern World', 3, '1', '1', 1),
('GE 113', 'Understanding the Self', 3, '1', '1', 1),
('GE 114', 'Ethics', 3, '1', '2', 1),
('IC 124', 'Programming Paradigm 2', 3, '1', '2', 1),
('IC 125', 'Discrete Math', 3, '1', '2', 1),
('IC 126', 'Interaction Design', 3, '1', '2', 1),
('IC111', 'Programming Paradigm 1', 3, '1', '1', 1),
('IC112', 'Professional Ethics in Computing', 3, '1', '1', 1),
('IC113', 'Probability and Statistics for Computin', 3, '1', '1', 1),
('IT 121', 'Technopreneurship', 3, '1', '2', 1),
('NSTP 122', 'National Service Training Program 2', 3, '1', '2', 1),
('PE 111', 'Movement Enhancement', 3, '1', '1', 1),
('PE 122', 'Fitness Exercise', 3, '1', '2', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `subjectlist`
-- (See below for the actual view)
--
CREATE TABLE `subjectlist` (
`id` int(2)
,`currriculum_name` varchar(45)
,`course_id` int(2)
,`course` varchar(150)
,`code` varchar(15)
,`subject_description` varchar(45)
,`units` int(1)
,`yearlevel_id` varchar(15)
,`yearlevel_name` varchar(11)
,`semester_id` varchar(45)
,`semester_name` varchar(150)
);

-- --------------------------------------------------------

--
-- Table structure for table `superadmin`
--

CREATE TABLE `superadmin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `superadmin`
--

INSERT INTO `superadmin` (`id`, `username`, `password`) VALUES
(1, 'superadmin', '12324');

-- --------------------------------------------------------

--
-- Table structure for table `uploadedfiles`
--

CREATE TABLE `uploadedfiles` (
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uploadedfiles`
--

INSERT INTO `uploadedfiles` (`ID`) VALUES
(1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `viewcomplaint`
-- (See below for the actual view)
--
CREATE TABLE `viewcomplaint` (
`student_id` varchar(10)
,`Complaint_ID` int(11)
,`last_name` varchar(50)
,`first_name` varchar(50)
,`middle_name` varchar(50)
,`fullname` varchar(150)
,`Date_Submitted` date
,`Time_of_incident` time
,`Loc_of_incident` varchar(50)
,`Person_Complained` varchar(50)
,`Designation_Complained` varchar(50)
,`Complaint_Detail` varchar(500)
,`Witness1` varchar(50)
,`Witness2` varchar(50)
,`Witness3` varchar(50)
,`Status` varchar(50)
,`schedule_date` date
,`time_from` time
,`time_to` time
,`time_schedule` varchar(21)
,`meeting_type` varchar(45)
,`meeting_link` varchar(150)
,`meeting_id` varchar(45)
,`passcode` varchar(45)
,`action_taken` varchar(45)
,`reponse_status` varchar(45)
,`defendant` varchar(145)
,`response_details` varchar(45)
);

-- --------------------------------------------------------

--
-- Table structure for table `year`
--

CREATE TABLE `year` (
  `year_id` int(2) NOT NULL,
  `year_desc` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `year`
--

INSERT INTO `year` (`year_id`, `year_desc`) VALUES
(1, '1st Year'),
(2, '2nd Year'),
(3, '3rd Year'),
(4, '4th Year');

-- --------------------------------------------------------

--
-- Structure for view `login_credentials`
--
DROP TABLE IF EXISTS `login_credentials`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `login_credentials`  AS SELECT `studentdetails`.`student_id` AS `username`, `studentdetails`.`fullname` AS `name`, `studentdetails`.`password` AS `password`, 'Student' AS `usertype`, `studentdetails`.`pic` AS `userpic`, `studentdetails`.`school_org` AS `student_org`, `studentdetails`.`position` AS `student_position`, NULL AS `scholarship_status`, NULL AS `staff_office`, NULL AS `staff_position`, `studentdetails`.`verified_status` AS `verified_status`, `studentdetails`.`account_status` AS `account_status` FROM `studentdetails` ;

-- --------------------------------------------------------

--
-- Structure for view `promotional_report`
--
DROP TABLE IF EXISTS `promotional_report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `promotional_report`  AS SELECT `el`.`id` AS `id`, `el`.`Student_id` AS `student_id`, `s`.`last_name` AS `last_name`, `s`.`first_name` AS `first_name`, `s`.`middle_name` AS `middle_name`, `s`.`suffix` AS `suffix`, `s`.`sex` AS `sex`, date_format(`s`.`birth_date`,'%m/%d/%Y') AS `birthdate`, `SF_GET_COURSE_NAME`(`s`.`course_id`) AS `course`, `el`.`student_yearlevel` AS `student_yearlevel`, `el`.`subject_code1` AS `subject_code1`, `el`.`units1` AS `units1`, `el`.`grade1` AS `grade1`, `el`.`subject_code2` AS `subject_code2`, `el`.`units2` AS `units2`, `el`.`grade2` AS `grade2`, `el`.`subject_code3` AS `subject_code3`, `el`.`units3` AS `units3`, `el`.`grade3` AS `grade3`, `el`.`subject_code4` AS `subject_code4`, `el`.`units4` AS `units4`, `el`.`grade4` AS `grade4`, `el`.`subject_code5` AS `subject_code5`, `el`.`units5` AS `units5`, `el`.`grade5` AS `grade5`, `el`.`subject_code6` AS `subject_code6`, `el`.`units6` AS `units6`, `el`.`grade6` AS `grade6`, `el`.`subject_code7` AS `subject_code7`, `el`.`units7` AS `units7`, `el`.`grade7` AS `grade7`, `el`.`subject_code8` AS `subject_code8`, `el`.`units8` AS `units8`, `el`.`grade8` AS `grade8`, `el`.`subject_code9` AS `subject_code9`, `el`.`units9` AS `units9`, `el`.`grade9` AS `grade9`, if(`el`.`units1` is null,0,`el`.`units1`) + if(`el`.`units2` is null,0,`el`.`units2`) + if(`el`.`units3` is null,0,`el`.`units3`) + if(`el`.`units4` is null,0,`el`.`units4`) + if(`el`.`units5` is null,0,`el`.`units5`) + if(`el`.`units6` is null,0,`el`.`units6`) + if(`el`.`units7` is null,0,`el`.`units7`) + if(`el`.`units8` is null,0,`el`.`units8`) + if(`el`.`units9` is null,0,`el`.`units9`) AS `totalunits`, '' AS `gwa`, if(`s`.`type` = 'Graduate','Yes','No') AS `graduate_question` FROM (`enrollment_list` `el` join `student` `s` on(`s`.`Student_id` = `el`.`Student_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `scholarship_general_info`
--
DROP TABLE IF EXISTS `scholarship_general_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `scholarship_general_info`  AS SELECT `g`.`Student_id` AS `student_id`, `s`.`last_name` AS `last_name`, `s`.`first_name` AS `first_name`, `s`.`middle_name` AS `middle_name`, `s`.`suffix` AS `suffix`, `g`.`semester_year` AS `semester_year`, `s`.`course_id` AS `course_id`, `s`.`year_level` AS `year_level`, `SF_GET_COURSE_NAME`(`s`.`course_id`) AS `coursename`, `SF_GET_DATA_FROM_COURSE_BY_ID`('college_id',`s`.`course_id`) AS `college_id`, `SF_GET_DATA_FROM_COLLEGE_BY_ID`('title',`SF_GET_DATA_FROM_COURSE_BY_ID`('college_id',`s`.`course_id`)) AS `college_name`, `sp`.`program_id` AS `program_id`, `sp`.`program_name` AS `program_name`, `sp`.`program_provider` AS `program_provider`, `SF_GET_SCHOLARSHIP_STATUS`(`sp`.`program_status`) AS `program_status`, `SF_GET_TYPE_OF_SCHOLARSHIP`(`sp`.`type`) AS `program_type`, `sp`.`amount` AS `amount`, `g`.`card` AS `card`, `g`.`student_status` AS `student_status`, `SF_GET_STUDENT_STATUS`(`g`.`student_status`) AS `status_name`, if(`g`.`card` is null,'Not yet released','Released') AS `card_status`, if(`g`.`status_billing` is null,'-',`g`.`status_billing`) AS `billing_status`, if(`g`.`status_payroll` is null,'-',`g`.`status_payroll`) AS `payroll_status`, if(`g`.`status_liquidation` is null,'-',`g`.`status_liquidation`) AS `liquidation_status`, if(`g`.`status_allowance` is null,'-',`g`.`status_allowance`) AS `allowance_status` FROM ((`grantee_history` `g` join `student` `s` on(`s`.`Student_id` = `g`.`Student_id`)) join `scholarship_program` `sp` on(`sp`.`program_id` = `g`.`program_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `staffdetails`
--
DROP TABLE IF EXISTS `staffdetails`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `staffdetails`  AS SELECT `s`.`staff_id` AS `staff_id`, `s`.`title` AS `title`, `s`.`last_name` AS `last_name`, `s`.`first_name` AS `first_name`, `s`.`middle_name` AS `middle_name`, `s`.`suffix` AS `suffix`, `s`.`extension` AS `extension`, `FULLNAME`(`s`.`first_name`,`s`.`middle_name`,`s`.`last_name`,`s`.`title`,`s`.`suffix`,`s`.`extension`,'with_extensions') AS `fullname`, `s`.`sex` AS `sex`, `s`.`civil_status` AS `civil_status`, `s`.`birthdate` AS `birthdate`, `SF_GET_AGE`(`s`.`birthdate`) AS `age`, `s`.`email_add` AS `email_add`, `s`.`phone_num` AS `phone_num`, `s`.`employment_status` AS `employment_status`, `s`.`account_status` AS `account_status`, `s`.`e_signature` AS `e_signature`, `s`.`pic` AS `pic`, `s`.`date_submitted` AS `date_submitted`, `s`.`date_verified` AS `date_verified`, if(`s`.`date_verified` is null,'Not Verified','Verified') AS `verified_status`, `s`.`password` AS `password`, `s`.`office_id` AS `office_id`, `o`.`office_name` AS `office_name`, `s`.`dept_id` AS `dept_id`, `d`.`dept_name` AS `dept_name`, `s`.`type` AS `type`, `s`.`position` AS `position` FROM ((`staff` `s` left join `office` `o` on(`o`.`office_id` = `s`.`office_id`)) left join `department` `d` on(`d`.`dept_id` = `s`.`dept_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `studentdetails`
--
DROP TABLE IF EXISTS `studentdetails`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `studentdetails`  AS SELECT `s`.`Student_id` AS `student_id`, `s`.`reg_id` AS `reg_id`, `c`.`title` AS `coursetitle`, `c`.`name` AS `coursename`, `SF_GET_DATA_FROM_COLLEGE_BY_ID`('title',`SF_GET_DATA_FROM_COURSE_BY_ID`('college_id',`c`.`course_id`)) AS `college`, `s`.`title` AS `title`, `s`.`last_name` AS `last_name`, `s`.`first_name` AS `first_name`, `s`.`middle_name` AS `middle_name`, `s`.`suffix` AS `suffix`, `FULLNAME`(`s`.`first_name`,`s`.`middle_name`,`s`.`last_name`,`s`.`title`,`s`.`suffix`,'','with_extensions') AS `fullname`, `s`.`house_block_lot_num` AS `house_block_lot_num`, `s`.`street` AS `street`, `s`.`prk_vill_sub` AS `prk_vill_sub`, `s`.`brgy` AS `brgy`, `s`.`city` AS `city`, `s`.`province` AS `province`, `SF_GET_FULL_ADDRESS`(`s`.`house_block_lot_num`,`s`.`street`,`s`.`prk_vill_sub`,`s`.`brgy`,`s`.`city`,`s`.`province`) AS `full_address`, `s`.`zip_code` AS `zip_code`, `s`.`nationality` AS `nationality`, `s`.`civil_status` AS `civil_status`, `s`.`religion` AS `religion`, `s`.`sex` AS `sex`, `s`.`phone_number` AS `phone_number`, `s`.`birth_date` AS `birth_date`, `SF_GET_AGE`(`s`.`birth_date`) AS `age`, `s`.`birth_place` AS `birth_place`, `s`.`email_add` AS `email_add`, `s`.`section` AS `section`, `s`.`year_level` AS `year_level`, `s`.`prev_gwa` AS `prev_gwa`, `s`.`units_enrolled` AS `units_enrolled`, `s`.`type` AS `type`, `s`.`student_status` AS `student_status`, `s`.`account_status` AS `account_status`, `s`.`cor` AS `cor`, `s`.`e_signature` AS `e_signature`, `s`.`pic` AS `pic`, `s`.`password` AS `password`, `s`.`date_submitted` AS `date_submitted`, `s`.`date_verified` AS `date_verified`, if(`s`.`date_verified` is null,'Not Verified','Verified') AS `verified_status`, `e`.`father_name` AS `father_name`, `e`.`father_occupation` AS `father_occupation`, `e`.`father_contact` AS `father_contact`, `e`.`mother_name` AS `mother_name`, `e`.`mother_occupation` AS `mother_occupation`, `e`.`mother_contact` AS `mother_contact`, `e`.`living_with` AS `living_with`, `e`.`guardian_name` AS `guardian_name`, `e`.`guardian_contact` AS `guardian_contact`, `e`.`spouse_name` AS `spouse_name`, `e`.`spouse_occupation` AS `spouse_occupation`, `SF_GET_DATA_FROM_SCHOOL_ORG_BY_ID`('org_name',`SF_GET_ORG_WHERE_STUDENT_IS_GOVERNOR_PRESIDENT`(`s`.`Student_id`)) AS `school_org`, `SF_GET_STUDENT_POSITION_IN_ORG`(`SF_GET_ORG_WHERE_STUDENT_IS_GOVERNOR_PRESIDENT`(`s`.`Student_id`),`s`.`Student_id`) AS `position` FROM ((`student` `s` left join `emergency_contact` `e` on(`e`.`Student_id` = `s`.`Student_id`)) left join `course` `c` on(`c`.`course_id` = `s`.`course_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `student_grades`
--
DROP TABLE IF EXISTS `student_grades`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `student_grades`  AS SELECT `e`.`id` AS `id`, `e`.`Student_id` AS `student_id`, `e`.`schoolyear` AS `schoolyear`, `SF_GET_SEMESTER_NAME`(`e`.`semester`) AS `semester_name`, `SF_GET_YEAR`(`e`.`student_yearlevel`) AS `yearlevel`, `e`.`subject_code1` AS `subcode`, `SF_GET_DATA_FROM_SUBJECT_BY_ID`('subject_description',`e`.`subject_code1`) AS `subdesc`, `SF_GET_DATA_FROM_SUBJECT_BY_ID`('units',`e`.`subject_code1`) AS `units`, `e`.`grade1` AS `grade` FROM `enrollment_list` AS `e` WHERE `e`.`subject_code1` is not null ;

-- --------------------------------------------------------

--
-- Structure for view `subjectlist`
--
DROP TABLE IF EXISTS `subjectlist`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `subjectlist`  AS SELECT `c`.`id` AS `id`, `c`.`title` AS `currriculum_name`, `c`.`course_id` AS `course_id`, `SF_GET_DATA_FROM_COURSE_BY_ID`('title',`c`.`course_id`) AS `course`, `sub`.`code` AS `code`, `sub`.`subject_description` AS `subject_description`, `sub`.`units` AS `units`, `sub`.`yearlevel` AS `yearlevel_id`, `SF_GET_YEAR`(`sub`.`yearlevel`) AS `yearlevel_name`, `sub`.`semester` AS `semester_id`, `SF_GET_SEMESTER`(`sub`.`semester`) AS `semester_name` FROM (`subject` `sub` join `curriculum` `c` on(`c`.`id` = `sub`.`curriculum_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `viewcomplaint`
--
DROP TABLE IF EXISTS `viewcomplaint`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewcomplaint`  AS SELECT `s`.`Student_id` AS `student_id`, `cm`.`Complaint_ID` AS `Complaint_ID`, `s`.`last_name` AS `last_name`, `s`.`first_name` AS `first_name`, `s`.`middle_name` AS `middle_name`, `FULLNAME`(`s`.`first_name`,`s`.`middle_name`,`s`.`last_name`,`s`.`title`,`s`.`suffix`,'','lastname_first') AS `fullname`, `cm`.`Date_Submitted` AS `Date_Submitted`, `cm`.`Time_of_incident` AS `Time_of_incident`, `cm`.`Loc_of_incident` AS `Loc_of_incident`, `cm`.`Person_Complained` AS `Person_Complained`, `cm`.`Designation_Complained` AS `Designation_Complained`, `cm`.`Detail` AS `Complaint_Detail`, `cm`.`Witness1` AS `Witness1`, `cm`.`Witness2` AS `Witness2`, `cm`.`Witness3` AS `Witness3`, `cm`.`Status` AS `Status`, `ss`.`date_schedule` AS `schedule_date`, `ss`.`time_from` AS `time_from`, `ss`.`time_to` AS `time_to`, concat(`ss`.`time_from`,'-',`ss`.`time_to`) AS `time_schedule`, `ss`.`meeting_type` AS `meeting_type`, `ss`.`meeting_link` AS `meeting_link`, `ss`.`meeting_id` AS `meeting_id`, `ss`.`passcode` AS `passcode`, `ss`.`action_taken` AS `action_taken`, `ss`.`status` AS `reponse_status`, `ss`.`defendant` AS `defendant`, `ss`.`details` AS `response_details` FROM ((`student` `s` join `complaint` `cm` on(`cm`.`Student_id` = `s`.`Student_id`)) left join `response` `ss` on(`ss`.`Complaint_ID` = `cm`.`Complaint_ID`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`User_Id`);

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_alumni_course1_idx` (`course_id`);

--
-- Indexes for table `clinic_certificate_requests`
--
ALTER TABLE `clinic_certificate_requests`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `college`
--
ALTER TABLE `college`
  ADD PRIMARY KEY (`college_id`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`Complaint_ID`),
  ADD KEY `complaint_idfk_1` (`Student_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `fk_course_college1_idx` (`college_id`);

--
-- Indexes for table `curriculum`
--
ALTER TABLE `curriculum`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_curriculum_course1_idx` (`course_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`),
  ADD KEY `fk_department_college1_idx` (`college_id`),
  ADD KEY `fk_department_staff1_idx` (`dept_head`);

--
-- Indexes for table `emergency_contact`
--
ALTER TABLE `emergency_contact`
  ADD PRIMARY KEY (`Student_id`),
  ADD KEY `Student_id` (`Student_id`);

--
-- Indexes for table `enrollment_list`
--
ALTER TABLE `enrollment_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_enrollment_list_student1_idx` (`Student_id`);

--
-- Indexes for table `govt_funded_org`
--
ALTER TABLE `govt_funded_org`
  ADD UNIQUE KEY `Num` (`Num`);

--
-- Indexes for table `grantee_history`
--
ALTER TABLE `grantee_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_grantee_history_student1_idx` (`Student_id`),
  ADD KEY `fk_grantee_history_student_status1_idx` (`student_status`),
  ADD KEY `fk_grantee_history_scholarship_program1_idx` (`program_id`);

--
-- Indexes for table `list_of_semester`
--
ALTER TABLE `list_of_semester`
  ADD PRIMARY KEY (`semester_id`);

--
-- Indexes for table `non_govt_funded_org`
--
ALTER TABLE `non_govt_funded_org`
  ADD UNIQUE KEY `Num` (`Num`);

--
-- Indexes for table `office`
--
ALTER TABLE `office`
  ADD PRIMARY KEY (`office_id`);

--
-- Indexes for table `organization_member`
--
ALTER TABLE `organization_member`
  ADD PRIMARY KEY (`id`),
  ADD KEY `org_id` (`org_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `org_applications`
--
ALTER TABLE `org_applications`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `org_applications_files`
--
ALTER TABLE `org_applications_files`
  ADD PRIMARY KEY (`Num`);

--
-- Indexes for table `response`
--
ALTER TABLE `response`
  ADD PRIMARY KEY (`Complaint_ID`),
  ADD KEY `fk_settlement_schedule_complaint1_idx` (`Complaint_ID`);

--
-- Indexes for table `scholarship_masterlist_documents`
--
ALTER TABLE `scholarship_masterlist_documents`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `scholarship_masterlist_external_reference`
--
ALTER TABLE `scholarship_masterlist_external_reference`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `scholarship_masterlist_record`
--
ALTER TABLE `scholarship_masterlist_record`
  ADD PRIMARY KEY (`record_no`);

--
-- Indexes for table `scholarship_masterlist_transmittal`
--
ALTER TABLE `scholarship_masterlist_transmittal`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `scholarship_program`
--
ALTER TABLE `scholarship_program`
  ADD PRIMARY KEY (`program_id`),
  ADD KEY `fk_scholarship_program_scholarship_status1_idx` (`program_status`),
  ADD KEY `fk_scholarship_program_scholarship_type1_idx` (`type`);

--
-- Indexes for table `scholarship_status`
--
ALTER TABLE `scholarship_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `scholarship_type`
--
ALTER TABLE `scholarship_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `scholar_additional_info`
--
ALTER TABLE `scholar_additional_info`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `schoolyear`
--
ALTER TABLE `schoolyear`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_organization`
--
ALTER TABLE `school_organization`
  ADD PRIMARY KEY (`org_id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Indexes for table `school_year`
--
ALTER TABLE `school_year`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`semester_id`);

--
-- Indexes for table `semester_load`
--
ALTER TABLE `semester_load`
  ADD PRIMARY KEY (`load_id`);

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
-- Indexes for table `student_status`
--
ALTER TABLE `student_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`code`),
  ADD KEY `fk_curriculum_id_idx` (`curriculum_id`);

--
-- Indexes for table `superadmin`
--
ALTER TABLE `superadmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploadedfiles`
--
ALTER TABLE `uploadedfiles`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `year`
--
ALTER TABLE `year`
  ADD PRIMARY KEY (`year_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `User_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clinic_certificate_requests`
--
ALTER TABLE `clinic_certificate_requests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `college`
--
ALTER TABLE `college`
  MODIFY `college_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `Complaint_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `curriculum`
--
ALTER TABLE `curriculum`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `enrollment_list`
--
ALTER TABLE `enrollment_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `govt_funded_org`
--
ALTER TABLE `govt_funded_org`
  MODIFY `Num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `grantee_history`
--
ALTER TABLE `grantee_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `list_of_semester`
--
ALTER TABLE `list_of_semester`
  MODIFY `semester_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `non_govt_funded_org`
--
ALTER TABLE `non_govt_funded_org`
  MODIFY `Num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `office`
--
ALTER TABLE `office`
  MODIFY `office_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `organization_member`
--
ALTER TABLE `organization_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `org_applications`
--
ALTER TABLE `org_applications`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `org_applications_files`
--
ALTER TABLE `org_applications_files`
  MODIFY `Num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `scholarship_masterlist_documents`
--
ALTER TABLE `scholarship_masterlist_documents`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `scholarship_masterlist_external_reference`
--
ALTER TABLE `scholarship_masterlist_external_reference`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `scholarship_masterlist_record`
--
ALTER TABLE `scholarship_masterlist_record`
  MODIFY `record_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `scholarship_masterlist_transmittal`
--
ALTER TABLE `scholarship_masterlist_transmittal`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `scholarship_program`
--
ALTER TABLE `scholarship_program`
  MODIFY `program_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `schoolyear`
--
ALTER TABLE `schoolyear`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `school_organization`
--
ALTER TABLE `school_organization`
  MODIFY `org_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `school_year`
--
ALTER TABLE `school_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `semester_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `semester_load`
--
ALTER TABLE `semester_load`
  MODIFY `load_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000000002;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `student_status`
--
ALTER TABLE `student_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `superadmin`
--
ALTER TABLE `superadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `uploadedfiles`
--
ALTER TABLE `uploadedfiles`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `year`
--
ALTER TABLE `year`
  MODIFY `year_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alumni`
--
ALTER TABLE `alumni`
  ADD CONSTRAINT `fk_alumni_course1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `complaint`
--
ALTER TABLE `complaint`
  ADD CONSTRAINT `complaint_idfk_1` FOREIGN KEY (`Student_id`) REFERENCES `student` (`Student_id`);

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `fk_course_college1` FOREIGN KEY (`college_id`) REFERENCES `college` (`college_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `curriculum`
--
ALTER TABLE `curriculum`
  ADD CONSTRAINT `fk_curriculum_course1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `fk_department_college1` FOREIGN KEY (`college_id`) REFERENCES `college` (`college_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_department_staff1` FOREIGN KEY (`dept_head`) REFERENCES `staff` (`staff_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `emergency_contact`
--
ALTER TABLE `emergency_contact`
  ADD CONSTRAINT `Emergency_Contact_ibfk_1` FOREIGN KEY (`Student_id`) REFERENCES `student` (`Student_id`);

--
-- Constraints for table `enrollment_list`
--
ALTER TABLE `enrollment_list`
  ADD CONSTRAINT `fk_enrollment_list_student1` FOREIGN KEY (`Student_id`) REFERENCES `student` (`Student_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `grantee_history`
--
ALTER TABLE `grantee_history`
  ADD CONSTRAINT `fk_grantee_history_scholarship_program1` FOREIGN KEY (`program_id`) REFERENCES `scholarship_program` (`program_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_grantee_history_student1` FOREIGN KEY (`Student_id`) REFERENCES `student` (`Student_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_grantee_history_student_status1` FOREIGN KEY (`student_status`) REFERENCES `student_status` (`status_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `organization_member`
--
ALTER TABLE `organization_member`
  ADD CONSTRAINT `Organization_Member_ibfk_1` FOREIGN KEY (`org_id`) REFERENCES `school_organization` (`org_id`),
  ADD CONSTRAINT `Organization_Member_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`Student_id`);

--
-- Constraints for table `scholarship_program`
--
ALTER TABLE `scholarship_program`
  ADD CONSTRAINT `fk_scholarship_program_scholarship_status1` FOREIGN KEY (`program_status`) REFERENCES `scholarship_status` (`status_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_scholarship_program_scholarship_type1` FOREIGN KEY (`type`) REFERENCES `scholarship_type` (`type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `scholar_additional_info`
--
ALTER TABLE `scholar_additional_info`
  ADD CONSTRAINT `fk_scholar_additional_info_student1` FOREIGN KEY (`student_id`) REFERENCES `student` (`Student_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `school_organization`
--
ALTER TABLE `school_organization`
  ADD CONSTRAINT `School_organization_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `Student_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`);

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `fk_curriculum_id` FOREIGN KEY (`curriculum_id`) REFERENCES `curriculum` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
