-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2021 at 02:41 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `osasdb6-2`
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
(1, '2018-00001', '2021-07-01', '2021-07-01', '09:00:00', 'fsd', 'fsdf', 'fsd', 'fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd ', 'fsd', 'fsd', 'fsd', 'Done'),
(2, '2018-00001', '2021-07-19', '2021-08-16', '11:34:00', 'Lorem Ipsum', 'Lorem Ipsum', 'Student', 'Lorem Ipsum', 'Lorem Ipsum', 'Lorem Ipsum', 'Lorem Ipsum', 'Done'),
(3, '2018-00001', '2021-07-19', '2021-08-12', '11:12:00', 'Lorem Ipsum', 'Lorem Ipsum', 'Student', 'Lorem Ipsum', 'Lorem Ipsum', 'Lorem Ipsum', 'Lorem Ipsum', 'Pending'),
(4, '2018-00001', '2021-07-19', '2021-08-24', '16:13:00', 'Lorem Ipsum', 'kilo lamo', 'Student', 'Lorem Ipsum', 'Lorem Ipsum', 'Lorem Ipsum', 'Lorem Ipsum', 'Done'),
(5, '2018-00001', '2021-07-19', '2021-08-11', '10:45:00', 'Usep', 'Lorem Ipsum', 'Student', 'Lorem Ipsum', 'Lorem Ipsum', 'Lorem Ipsum', 'Lorem Ipsum', 'On Going');

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
-- Table structure for table `forgot_pass_requests`
--

CREATE TABLE `forgot_pass_requests` (
  `id` int(11) NOT NULL,
  `student_id` varchar(10) NOT NULL,
  `remarks` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forgot_pass_requests`
--

INSERT INTO `forgot_pass_requests` (`id`, `student_id`, `remarks`) VALUES
(18, '2018-00001', 'Done'),
(19, '2018-00002', 'Done'),
(21, '2021-00001', 'Done'),
(22, '2021-00001', 'Done'),
(23, '2021-00001', 'Done'),
(24, '2021-00001', 'Done'),
(25, '2018-00001', 'Request Delivered');

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
(4, 2, '2018-00161', 'Governor', 'Active');

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
-- Table structure for table `response`
--

CREATE TABLE `response` (
  `response_id` int(11) NOT NULL,
  `Complaint_ID` int(11) NOT NULL,
  `status` varchar(45) DEFAULT NULL,
  `defendant` varchar(145) DEFAULT NULL,
  `time_forwarded` timestamp NULL DEFAULT current_timestamp(),
  `link` varchar(1000) DEFAULT NULL,
  `details` varchar(45) DEFAULT NULL,
  `date_schedule` date DEFAULT NULL,
  `time_from` time DEFAULT NULL,
  `time_to` time DEFAULT NULL,
  `meeting_type` varchar(45) DEFAULT NULL,
  `meeting_link` varchar(150) DEFAULT NULL,
  `meeting_id` varchar(45) DEFAULT NULL,
  `passcode` varchar(45) DEFAULT NULL,
  `action_taken` varchar(45) DEFAULT NULL,
  `notification_status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `response`
--

INSERT INTO `response` (`response_id`, `Complaint_ID`, `status`, `defendant`, `time_forwarded`, `link`, `details`, `date_schedule`, `time_from`, `time_to`, `meeting_type`, `meeting_link`, `meeting_id`, `passcode`, `action_taken`, `notification_status`) VALUES
(7, 1, 'Done', '2018-00001', '2021-08-03 10:48:20', 'Discipline-Response.php', 'Lorem Ipsum', '2021-08-04', '15:13:00', NULL, 'Google Meet', 'https:/google.meet.com/', '17545322', '98352326', '', 1),
(21, 2, 'Done', '2018-00002', '2021-08-03 10:48:20', NULL, '', '2021-08-04', '16:00:00', NULL, '', 'Refer to Dean', '', '', 'Dean', 0),
(29, 4, 'Done', '2018-00001', '2021-08-04 10:16:05', 'Discipline-Response.php', '', NULL, NULL, NULL, '', '', '', '', 'OSAS', 1),
(30, 5, 'On Going', '2018-00001', '2021-08-04 12:45:25', 'Discipline-Response.php', 'Lorem Ipsum', '2021-08-05', '11:00:00', NULL, 'Google Meet', 'https:/google.meet.com/', '17545322', '98352326', 'OSAS', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sample_student`
--

CREATE TABLE `sample_student` (
  `student_id` varchar(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sample_student`
--

INSERT INTO `sample_student` (`student_id`, `first_name`, `last_name`, `email`) VALUES
('2018-00155', 'Bruce', 'Wayne', 'jdmbonza@usep.edu.ph');

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
  `governor_id` int(11) DEFAULT NULL,
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
(3, NULL, NULL, 'SITS', 'Society of Information Technology Students', 'Recognized', '', NULL, 'Active'),
(4, NULL, NULL, 'SABES', 'Society of Agricultural and Biosystems Engineering Students', 'Recognized', '', NULL, 'Active');

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
('2018-00001', 3, 15, NULL, 'Doe', 'Jane', '', '', 'Blk. A', 'A St.', 'Prk. A', 'Brgy. A', 'A City', 'A Province', '8111', 'Filipino', 'Single', '', 'Female', '09612112121', '1990-01-01', 'A City', 'hjbmaureal@usep.edu.ph', '3BSNED1', '3rd Year', NULL, NULL, 'student_cor/certificate-of-registration-92803_1626229908_1626598344_1626662081.pdf', 'Undergraduate', 'Currently enrolled', 'Active', 0x89504e470d0a1a0a0000000d49484452000003540000058d0806000000e28014800000200049444154785eecdd7fd46d695d18f6af2e562504cc816208155cef5216b6d3685e9c22c1a4e55d05b16860aee9ba5d562a73036616455df7d2a835cd6ab8e96a5082614654ea54e25ca9c5ae49752e994a21ad99dbc58f221d9d575d930e19955771a201c77991809aaee4f40ff691c39efdfc38bff6d967efcf67ad67a1f0ee679f7bf63967efeff37c9fef13010000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000c04e7d41e90f00e0c07d5f447c73443ca7f9ff7f2d223e1311ff38227eb1f94f000000961c45c4ff1311f342fbd95247000000537129221eab08a496db77963a05000018bbbb2a82a7547b49a973000080b1ba521134e5da6b4a27000000189b5944dc5e113095da9da5130140db134a7f000003774f449c94fea882cab700acec0b4b7f00000376fb9682a988882796fe000000600c6611f140451adf2aed62e9a400000063705f4580b44a7b24229e563a290000c0213bdec1ccd43c22ee2e9d1800ba284a01c0a1983505288e4a7fb8865f2ffd010000c0a13a8e888f56cc34add33e513a390000c0a19a45c4631581d1baed6ae90500408ab2e9000cd9493333352bfd61c22723e26385bf79b0f0bf0300001c9ca30d67a64e23e242e16f1e2abd080000804373b2613075deacbbba2df3377f547a110000008766d30214a74b9500af66feee91c2eb00000038289ba6f99d2fadb77a52447c3cf3b73f57782d0000000763d399a91bad3daa9e57f8fb9b32af050000e060cc360ca64e3bfabc3df3f7d73afe1e0000e0e06c1a4c5d4f94557f3873ccb775fc3d0000c0419945c43d154153aa75cd4c4544bc2c73cccf268e01000038287755044da9964bdb7b7be6b8ab99e30000000e42aea479a95dcff4fbcca6247ad7718f658e030000380827154153aa9566985e9339f69ec2b10000008376bcc15e53574a9d678efdfd88784ee9e01d797a134446f39f4f69de8767178e0360e09e50fa0300d8b2bb1255f94afe4e44dc51f89b3767feb70f44c4af65fef775bd2222be2622fe7944bc30223e13115fd7ec897516115fd10450298f44c41744c4ef44c4cdcdeb3c8d882f8d885f8e888722e2cf45c48311f14044fcf988f848f3f70000c084ac5b84e252a9e3c67d89e31f2c1d98f0ec6683e02735a986f744c48f6c58e67d5bed9723e2fdcdfffdfe88b81811dfd2cce27d7d443cb509d0cc8201ec90192a00fa726185c068d937178a502cdcb99456d7f6dec47fdff6a688f8da88f870447c5913a04433fbf4ef148eeddb572ffddf7fa96929bfd0cc6c3ddcbc17ff7e1364fe513303f6bbcd8cd747327d00d0e10b4a7f00005b70dccc1ead9aeaf7d70ae5d1977db449b3ebb2b8dfddbaf437476b067863b6482f7c7f44fc7c1374fd1fa583000080dd7aa02285addd52b34d290f27faf9bd8a7369e9f65844bcbb49797c45e922000000dbf5868a87f6e576dea407d6bab5a24f6d7bed4311f1c311f1b2d285019802297f00ecd28535f67ecaa5f91d45c42d4be97aaba610eec2879b75571f6852e4fe4d44fc4cb366e9c1a65cfb2f36336e379afffcc5a6fadfbfd5fcdd1396aafcbdaf79df9ed5fcf77fa539cf10d7719d47c40723e27b22e29f96fe18608c045400ecd2632b063dcf6b4a862f1c45c45f68028c93cc1aa95d396dcef9fe2608fa0b11f1db4dc0f7af23e2d188f858a9932d5a94687f30223e1111ff7d538ce20311f1ab11f1dae6eff6117cfdcf11f14f22e2274a7f083026022a0076e59e1552f73ed994fbbed60460979b00ea78c5806c133f14117fbc54e5efbf2e1d3040cf6e3611fe4844bc38229e1b11bf1e117f71a9b2df373441e267761474fdc388784fb36eee81d21f031c3a011500bb70b5593b55ebdb23e2c9cd71bb0ca0ded56cb67bdecc3e5d5fda80776a9e14115f19115fd8ccbcbda009629f1e114f2b1d5ce133cd46cb379a06000054385a61e3db3f6c52d74a7fb76a3b6d82b3ab3dcf728dc5b39be0ea8723e2fe8af7bbd43eb4b4a71700009070dcac9b2a3d60efb27d6fe945b2b28b4d70fa48c5fb9f6bdf1511b745c44b4a2704008029baafe2a17ad376a3a9a2d7f5bffd76b36e88dd78525338e4f688f86715d72ad7ae964e06000053537a885ea72dd2f7960b5c3cdaf1770f34852de8cfcd2ba47776b5c722e2e722e2a6d289000060ac6611f1fd5b4cf53b6b66a152fb4cbd2071dc473bfe96dd7b6213105dadb8b6b976ad4907040080d13b8e881745c4376d29903a6b1ec84b334c4f8a885f4af4f1bac2b1ecdef323e2d511f16315d73cd5ae36a5dd01006034664d00f5a2667fa9d243714d3b5bdab0b7b60adfd727fafa50447c49e9607af59d1b56087c4fe90400003064474d0075eb9666a1e64d2adf62c3de551d45c4bd897e9f533a98bd5a371df0e311f1fa52e700003014c7cd86bc77553cecd6b61fdfd25e50b726fa7f77e94006e1d5cde76a9d592b1501010018ac93a60cf603150fb6abb6f7974e5ee9245392fda4743083f3e688f88d8acfcf72bbbb29d90e00007b358b885b9ab550db4ae5eb6a37b6302bb5f086c439cc5c1cb6f7547c8e96dba705d00000ecc3511394f4b1f1ee7c0781ce6f759ce3bed2411c849366f6a9f4995a6eff61a9530000d8d46ccb41d4d588f85f2afe6ebee55984d726cef16da5033928af8b8877547cb616ed65a50e01006055471171b9d9e4b6f4405a6ae74d1075b5e9f7f68a63e6117147e945aee8bd1de7303b355e77567e7e1f8e888ba5ce0000a0c6e52ded0f75de0444175aeb9f4e2a8e9d3781d736dd9938cf5f2d1dc8417b4553d0a4f4799b0baa000058d7511344d58ce6e7da69330b95da1b6a569936789a387e5d1713e7f970e94046a3f4995bb46da6980200307297b6509def7a445ca9a8c237ab3cd7d99a9bf5e6bcb3e33c1f2b1dc4e8bcb1e2f337b7a60a00809cda59a25cbbd1a4f2ad9296774745bfdb9e998accecd45b4a07324a357b563d5cea040080e9b9b4414adf79331375a9749284d4de4fedb66eff395d65b41f2c1dc4a8d594567f30225e58ea080080715bac8d5a77466a9d99a8b64b15e739dfc17e53d1f4d975be1f2c1dc8e83d5cf1b97c3422fe54a9230000c6e772332bb4ce8cd459138894d644d538aa7c0dbb08a68e22e2373bce25d58f85072b3e9bdf55ea0400807179a0e221b12b88babee50a6747954528ceb714bcb5fd971de77a5753461b22226eaaf87cce23e2ada58e0000385cb335f78d3a6f52fab6351bd57657c56bb8b1a3737f63e27c574a0732392795e97f3680060018915944dcd2a4f5d5042ecbed7407b3516db501deae5ec347120fc47fb674209394aa04d96e2f2f750400c0f0cdd64cebdb55e187b6938ad732dfe16b4915a27871e940262df5b969b79f2a7504001cbee747c4eb9b11f9d746c4d34b0730788b6a7d0f44c4ff5bf1d0b7dc6e943adfa20b95eba676997ad75504e3174a074144fc7b159fdd7944bcaed4110070785e1e117f23b1dfcf4352550ed68b9a8a7dabce48dd68668a7695529752134c9ded68ddd4d323e2d51de7fb95d281b0a4668b818723e265a58e0080e17a6244dc1c113f1011f746c4db2b1e001e8988af2a75cc60ac93d67763c745267266950fa2a73b7c6ddf9938e7f7950e8496b7567c96e77b18b00000d6701411b745c4f747c4ddcd43eb1f54dce8bbdaa5d2c9d8bbdb2bae6357bb5eea78c7eea8788df31d3f80760574174b074142cd9a2a95ff0060606e6e46d97f26223e1c11ffb2e286be4adb5511003673d23c98ad3a23f503cd9aa5e3d20976ec4ac56b9def30987a6a13383dd43adf1fec70368cf17b56c5677a2ea80280fd3b8a881f8c880f55dcb8376daf2cbd187a75b9293451b3ee68b99d0d28383eaa78bdf388b856ea68035da97e7fdcccf6c126beac598357fa7c0fe5fb080093723522de13119facb8596fa319451d86595338a4769fa6e5b6efb4beb6a3ca60f0da8e678aba52fd6e2e1d0495ba0a9d74b5bf54ea0800d8ccd322e25b23e27f8c887f5d7173de667ba8f4e2d8b9e32690aa094096db699352b7efb4be2e3541e1f98e83a94804544f291d042ba8594ff5ae522700c0fa5ed954d92bdd90b7d9ee6b1e022ccadfaf934429fb52bbd1147ad87530b2ae9a2214673b5c3715cde7fbc18ef3fe48e94058c30f577ce6ef2e750200ace6894d4053ba096fabdd171177c9e71f8493352bf69d36852686eca4e2df31dff1e6bdd13133f5eb0610d8b1bb2a3ef7cf29750200d4b929317abecdf67f37c1d35f8b8817975e10bdb850f9d0d56e37063c1bb5acb608c5ae83fa545007bbf4bc88f874e1b3ffe3a54e0080b2da11fc55db2311f1cee661f5df2dbd087a7552b9a6a8ddee28753c20b59bf79e953adad0e2bdfe44ebbcbb0ee2202ad75399290580353d2722eeafb8d9aed2ce23e2de88f8cb11f1e4d20ba07727954146fb9aee3a1d6e176ad74ded72a66d9628ec71d78ed76bc1b252f6c13b4a1d00008f775bc5c3e6aacd88fb701daf3123b5eb220dbb74a9e2df37ef61fd57d7ecef63a58360cb5e58f15d7845a91300e073b63d2bf5c188f8cad249d98ba3a6d8c42ae5cfcf065af6bc566a56a8dd2e953adad051627dda69e940d881f716be0f7fb3d4010010f18c88f8d58a07cd559a59a9619a45c4e588f868c5355cb4430fa4166afecdd74a9d6c41ea75ec3a90832ea559aa4722e249a54e0060ca6eaa78c85ca5fdf388f896d249d98b175506158b763a92402a2af7d0ea63862855e8652cef3387a9949df0bc5207003055af89888f553c68aed2189e59443c5071ed16ed10f6905ac5858a7ff359938ab74b4789c21fbbae260825af2b7c3fde54ea0000a668db1bf5bebb74427a575b1e7cd1c616484513c4d4cccaf5f1ef4e05b5d263d9b72f6952fb72df91a7963a018029a9d97fa4b63d78c015dfc66ab14eaa36983ad4f2e735ae57fcfbfbfab7779d5baa1f4351ba2fdc5cea0000a6e2f5150f98b5edded2c9d88b55d2fb0e6943de55951e10e71171a3d4c916e466c960285e55f8aefc58a903009882ffb8e201b3b699951a96d4fa9c54eba39add3ecd2ade835d6fdebb90da4858aa1f43f2bc88f874e13b23ed0f80493b89888f543c6496da5b4a27a257b3a67a5f6d3075c704d2cc6615eba6ce7b7a1f8e13afa5af34435845695657da1f0093f5848a07ed9a66447d584e2a37aa9d376b89a6b2cf514d89f4be029ad4f5e92398835595d2febebcd401008cd53b2b1e3073edc166bf2a86e1b8091a6ad74a8d799d545b6a9fa7e5d6d7c0c0a58e739f4f28b0e5f094d2fe1e2a75000063f41d150f98b9f6ded209e855d7437aaaf5350b331435fb6d9df6b46e2a15d8f5510403367177e13b74b1d401008cc977553c74e75a5f23f994bda89995aa591b746da2b320f754bc37bbdebc77e15ae2fc7dec77059b28ada3725f006032beae70532c35a390c3519a75596e537d60af49f5ebebbd4955f5ebebfcb089d2a6ef7fbbd401008cc1b322e2fe8a07ccaef6b188784de904ecdc5144dc12117fabe29add6866a4fa9a7d199a5945718ebed691a5cab59ff7946a089b7a42b3562af77d7a7ea9130038746fa978084f35c527f66f95ea7d67130ea4164a55fdaef718cc74cd26f6996a08db92fb4ebdaa7430001cb252fe7bae7d71a97376eaa4729dd4bc9991b2b9f2670b6f94deabbe82990b89f38f7d1365c6e7b6c277ca3a2a0046ab661d49577b63a963766e9540d803fa67d554f5eb2b983a4e9cbfcfd931d896a3c2f7eabe88f8d3a54e00e0107da4e261bcdd1e2e75cacecc9a19a9fb2aaed3691330db10f6734aef5b5feba62222ee4abc06d78b43f5c6c2f74be1220046e7372a1ecadb4ddac6fe1c5594f95eb473e97d8f939a115ab43e67f152a97eae1987ac346beefe01c0a8ac5384e2c74b9db213b38a999545bbde3cacf795b676288e0a453bfa2c027194b89e67a50361e04a8316f7973a008043f1e28a07f37693aad1bf457a5f69cdcff203795f41c1a1b95e78effa7cdfbaf69c3a2f1d0407e2dec277edcb4a1d00c0d05daa78306f37691afd3b5e21bdefba54b1ac0b85d9a93ed74d5d49bc16df31c6a294f6e7b70a8083564ac768b7c722e205a54ed9bada406adeacfb51112ead94ead767301589f2f6d74b07c101b958f8cdbab7d401000cd585cabd8a16ed1ed5c67a57da6c76b9dd287546446146b6cf75539148dd3cf33d63649e16118f64be778f943a0080212aa560b4db83a50ed9aa93158b4e5c297548446103dfb39e538f52fbbdb9968cd13b0bbf63321f003828ab6edc2b1da33fb388b85c48495b6e37a4f7ad24f7bef619c8cc12afa1ef7443e84b6910ef55a50e0060286eaf78485fb44f45c4734b1db235c72b56ef1348ade6d6ccfb79bdc7f77396d8c0b7ef7443e8d3cd85df344558003808b974a7ae87bb3ed39fa6ae36d03d6fd600f5f5f03f16b9cf7edf6bcf526bb8ac9b62cc9e5af86db31f150083365be1817ddef368fdd41daf5018e4ba87eeb5ddc8bcaf174a076fd149e27a5f2b1d082350fa8d0380c1eada3434d5ce0553bda90d72cf7b5edf33366fc8ac9dea7b16b66b33e1b3d24130125da9aecbeda9a50e00a06fb315f72f3a3503d28b552af8f59d8e3636b912e97deff5d4b528fface71932d8a752618a9b4b1d0040df6a1fdaf7f1703955b75456f0b3866d3bba6684e67b183c50d50f22fef3c2efde4b4a1d00405f662b548b9bab18d79bdad4cb6baabd6dc5ad89e0b5ef14bba3c4e086b58a4c4d6ec6781e11b7953a00803eac1a4c5df350b773b58527ce9a070e36977b70eb7b56285561b0cf19321882db0abf81022a00f6eea8329d6cd14e4b1db2b15b2b832915fcb6ab2bd5efbc59c3d1e700c285c4f597cec914bda4f03bf8f2520700b04b97560ca6cc4ced5e6d8a5fdf332663972a4dbe8f75825ddfc97dbc0e188293c26fa1cd7d01d89b0b150fedcb4de5b8ddaa4df13bb7566aeb721bf8f69d4ed9957678dd3567e272bf89174b0703c02ee41e20bb9a11c0ddaa0da6ee3043b8135d1bf8ded84369f2d4f7b2efd70143f2aac2efe22b4a1d00c0b65d5e23cd8fdd296d5a396f0a4f086a77a72ba0ea7b662a1285615c77a6ee7b0abf8faf2b750000dbb46a9adf3e1e2aa762d6149f285d837385277626b786b0cf14bb591358b75f8b755310f18d85dfc82f29750000db52dacba3ddae943a646dc795b38452fc76ab7d0d3ed5ccc8f65d4dafebbb792ed50f229a59dadcef649f831f004cd885ca07f84593e6b73bc7890d5b979b14bf7e74bdf7fb70ade37508a4e1b3ee2dfc5ede5cea000036755c11402d37e5b877e79e8af75f15bfdd3b495c8bbe2b59a636d4b6d71b7c4e6963dfa7963a00804d9cac38332598da9d9af56b5705533b779478ef6fec61ad5aaa447adfaf0386ecfecc6fe61b4b0703c0266695a5b8971fe6d9be0b95d74130db8fae20665f9ffdae4d9c05d4f0f972bf9bf7950e068075ad1a4ca9e6b71ba9d990e576cdfbdf9b54aa5fdf01d551e2fb29d50f1e2f772ffba1d2c100b0ae9ab53af366bd4edf0f9353306bf6fb2aed3175aef8406f4e32d7a0ef59a1ae0d7c2ff92cc0e3cc22e23399dfd0af2f750000eba80da6e64aa3efc4ac62dddaa9f552bdeb4aafbbbaa72046553fa8931a0859b4beb7380060024a379fe5668f9bdde89a7df010b05f1712d5f4fabe0ea994431bf842b7d2fe897d7f870118b94b1533238b66666afb6eaf78df6f582fd5bb5480bb8f74cbebadd7702ad50fb24a83842a6202b035472b04531ee8b7af348a3a3792ba37373aaec51d7b0a62ce5bafa3ef7dafe0d074a5ea2eda59e96000a8355b61dd940214dbb548e12a555454bd6d3f6e4d5c9bbe83dba3a648c9831d811d90d63520b268062400d89aaeb52182a9ddab2d89def7c33b9f7535714df631aadd0eea3eb4c759323824ed595d0115005b57ca2f174c6ddf2c22de5011c8ee638d0e9f339454bfe38ed7610d23d4c9fdce2ae602c0c66a8b505c2b75c44a4ae99567cd8dde62e9fd9835fb7f757d37fabe268bfdc8daaf43854d28eb1a8c586ed60303b091d28d663998ea7b447eac2e44c47d15ef79df0fed7cbe54aadf3ed283ba823aa3ea50e742e1b7563a35001b493d34b68329b6a366bdd45c6ae5decd122942fb48b1eb7a18343305f5045400ecc4229da9f4607fd604016ca6b682a2e075ff725b07f43d6b7894d897acefd701872c57327dee1e07c0baae79b8efcd5165f07aeac63e08a959db7d9426ef0aecf6917208874cc9740076a2f4703ff770bf15c795053fcc380cc385c47e53fb48c194ea07db712aa002609b2e5494e93e9553be156fa8d8a8f77c4feb7278bcdcfab6be03de54e112831cb09a5961504b4005c04a6a2afa9d963aa1689658f7d26efbd81896b4aeb2e4677b1a5c683f009eef29e5100e5d698f4525d30158494d45bf7da4368d4d690670deac4f33db301ca945ebfb5847d8f500e8a10fd6530aa8f6316002c0019a55ec7b742a98dad849458adfdc4cc320755db77d54b8bc92f8ccf4fd3a602c4a15fe04540054a9a9e8e7a6b299543183e576be87b538e4cd32d76d1fdaafe5d4ec146c2457e14fda3500552e5454993b6b1e2c59cfa5c2fb3b57e863b0523342d74b076e596add9dd94cd84c2e05db9a61008a6a1ef4af9b35d948299d6471d316b00ecf4962b0a1ef602a12df55339ab0995ce5ceb90a7f0094e45299961fd8584f6d253f330cc3959ab9ed3b8839ee1845f7dd84cd950a5248a70520e9a822cd6fae08c546ee2abcb7e7dedf414b05c3fb78c0ea1af8d8477541189b544aefa249c30620a9f4b03f6fd656b19e5259f4f33d3d985327950abb8ff49f0b89604a553fd85cae20c5dcf70c80949a606a1f6b44c6a0a6fcbc9bf4b075a5d7cd9b756e7da7fa7505533e3fb03db9b477052900e854ca179f3723760a24aca7144c9d7a181ebceb896bd7f78ce22c22eee9781dd244613b8e2bee8500f0796a82290bddd75353e0e3c61e663858cd950155f5eb0aecf6f13a60ac5233c08b26ed1d80cf53f3c07fee06b29659451aa5b2e8c3972a9fbc8f4186ae91f3330be461ab52b3d18be6fb06c0e729a5a2cdf790d23416a540d5acc2f0a5d6beeda378482ab033d801db952b1e74563a1880692995859d2bc1bc96d41a97763065666af852df91bebf17a9d9cebe5f078c5d2905defa2900fe44e9a63157c9686da5593f37e4c370925837b58f02225d819d9172d8bed4d6088b76a5d40100d350b36eea4ca18495cd22e272e17d35a3703852693f7d7f2fba023beb1a6137ec3f0540956b851bc6dca2dbb594d2fc949d3f1c7724aee13e4a9377057677940e02d6d2352bbd6866850188a82807bbaf87c643776be13d5580e270a48a3fece361aa2b48b7fe0e76a394eee7de084055aa9f7553ab4bcd662c9a99a9c3314b8c509fed21d527b5b968dfaf03a6a2f45b2e73038062b184730ffe6bc9bda766a60ecbed89ebd8778a9d12e9d0bf5cba9fc1460092a3ddcbadef7d750edd958a7c7bb3098723f51de93b984a9548571d1276a7748f3438063071a934a6e5a6fadc6adc7cc7659628feb08fa0b86b1dc73ed66fc194948a35f5fd3b00c0c09436f03d95eab792a3887843e6fd3cdf43696d36935a8cdef775bcd0b1ce518974d8bd5cb9f4f3d2c1008c5bcd06be1ed6eaa5367b5db46b82d383939a6ddcc7acedf58ed7d177ca214c4de93e69335f80892b6d52e8616d35a5f7535ac8e1e95aafb48f11e9ae604a8974d8bdab85dff5be67aa0118900b85d91455fdeacd22e272a6ecfc0d0ee13328000020004944415425750f522a1db6ef6b99aaeae7410e76af6bfde4f26f3b00137554114cf5fdd078a86a8a7a70788e120172df0545668229d89b52ba9fcd7c0126acb4e37bdf0f8d87ac54d4c30df73075a5d8f5bdd7cc2cb1f795ef27f423f7fb2e8b0360c24aa97efb28057da86ecd6c882ccdef70750d389cef612fb6ae87b9be833a98b2dcbdd21a6380094badf3593441409d7bbc8fa3d5f510d5f7c3d349c777f5cce70a7a534af753011760c2723708a3df75524502bc8f87af6bc6f1740fb3b65d031fca33437f72e97e7ee301262ab5c87ef906211fbcec72a6ea931984c396da73aaef91e8ae8da1eff0fd845ee5d2fdac8d0598a8ae45f6ed0736f22e780f476b961870e8fb9aa63e638229e84f6a7065deaca7ec7bc61a8081c8cd4e9d79602b3a2aac9b72933d6ca9ca977d7e2f8e3a520ecf954887dee5d2fdfa1e640160204e22e28f32c11479a599a92b3d3f78b35da9c5e77da76f76a5925e2b1d046c5d2eddafef6a9f000cc06b0ac1803d6dca6e64de3f7b911cbe6b1dd7b5ef45e75d2946d64d41ff72e97e7dff2e003010ef2f0403d289d28e0ba992e77b2858c07675a5f6f49d029b9a0195420afdcb6d7caf1805c044a56e0cf39e1f1a0f516ad3de4530c5e11b42218af60cd999401df62697ee670012608272b32bef2f1d3c61b34230353752390a5d4546fa5eb3d4f539eb3ba0033e2bb7996fdfbf0d000cc0bd8580e035a50e26ac6b4dcda249f31b87d4e6cc7d16a2e85aab715daa1fec4d2ea0eaf3b7018081384fdc143ee2c690757be6863a374a390a5de5c9e73d07cac71d3364d24861bf72990952e40126261710fc83d2c113965b8c3c57756d34ba0a51f41dcc0c61ed16f039b9d9a92ba583011897ab85a0e0b6520713550aa66e943ae0201c7504337d97beef4af5eb73760c78bcdc66be004cccbb04532b4bada7590ea6ac6b1987eb1dd7b7cf34ce4b890d7cfb0ce880c7fb96c4efbfbda70026e6ef15028367973a98a0e34299dcbe672fd89d592298eaf3fab63f6b37cc4ec1de1d65d61dabe80a30311fca0406f7950e9ea05279f433053c46a32b989af71ccc74bd069f2fd8bf54aafc3da503011897dcdaa97f513a78a24a7b4df5f9b0cd6e75ad91eb33d5ef6ac7ec54df8530806e7724ee0166a7002626373bf573a58327e80d8560ea52a9030ec649c7baa53e8399ae99a9ab3da71a02695d9b7ccf55f7039896d462da45bba9d4c1c45c28bc5fd74b1d7050ba0a51f439f2dc55f4e4b87410d08b5476c7a9410f8069c9a5aef5f9e078084e0a45280453e3d3bec67deef77457c7e74dd530188eae3de10c7a004ccc6b32c1c1bc74f004958a50288f3e1e4789e0b9afb571edfda61ef390068393ba1f28180330211fc8dc10de5f3a78625279f28b26981a97ae8d3afb0aa6a2a310469febb680b24b998c050026e2398500e1a5a50e26a4b46eaacf076d76efa823803e2b1db425b388b8bda310469f550581b25430a51805c084bc3913207cb074f084a452bf16cdbaa9f169af8b38eff121a95d82f9ba543f189c764aee72036042de9bb921bcb274f084e452fd6e940ee6e0743d28f5b91ee246ebdc66a6607852590b7dcd64033000b98d7ce711f1ec520713d1b58e66d1cecd1c8cce51936ed7bed67d943f9e45c4ad11f1b3ad73dbd30c866596c95ae8b30a28007bf6d39940e1ced2c113719c2989eb41779caeb5aef1598fd77979cdd4a79bd772a9a7600ea87792b827d87b0a6042be32223e9109145e5dea6022ba36745d346958e374d6bace7dedc3d6b5796f9f698640bd54e68214708009795326509847c4cda50e26a05db27ab99d1b851c9d59445cee48e3e9a37ae322d5affd3953861f862757a4c8401bc084e436a7bdaf74f00474cd162c373307e3d31e713eed29d56fd6f1f93aeb71660c584dae188581368089f8a642b0f043a50e26a0ab28c1a229913e4eedca7a7da5ee74cd849a9982e16aafb3ecfb37038001785f26587854ba5f36d5efba11c8513aee98b5ed63cfa9e388b8ab75def3d241c0dee4f69eeae337038081f883cc0de11da58327e081ccfbd3470a18fd6aa7ef9cf65459afebc1ec5caa1f0c5a6ac04dba1fc0c47c3a13307c5fe9e091cbad2df3a03b4e77b4ae735f693b5dfbc001c3961a70930a0e30210f65028679443cbfd4c188e50a519c5bd7325aedc0a68f4d392f77ec6f76563a08d8abd4de5373d90b00d371b1104cfd58a983119b75ac65590ea6fa289d4dbf8e5a41cd59134ced3a6da7eba1accfcd8381f574cd2acf9b3461002622753358b429a7b4b5d3be969b548e716a9749ef6bff98aeefa1d94f18367b4f011011118f1402aae3520723d62e99bd68e7137f5fc66c1f0155d7fa0ba97e307ca9bda7a67eef049894d2ecd49437f3cded39e546393eb388b83522fe6144fcd65250b3ebcd9abb1ec8aef7705e6073a982457d15b1016000de99091a1e2a1d3c62b93da7cc1c8c537b66ea95a503b6e024f140266087e19b65ee13534e95079894a715d2fd1e29753062a9b5537dcc58b01fd7f6f040d4aee8276087c391cbf0d875111b0006e2b5999bc13c22ee2d75305297120fba7315d746ad1d44efba826357aa5f1febb580ed4815a350b0086042729bd5ce273a13735c784f545d1b9f0bad07a33b7a08a6dae9857d0571c076284601403cb51038cc23e299a54e462895c271e66177b4aeb7ae751fb3905d55fdfad83818d88e5c05580026e2e642307567a983119a6566edfa584fc37eb4d74eed32709e258229294270388e32f74ef70a8009c995049f47c4ab4a1d8ccc2c930f3f9f68fae3d81d47c45dadebbeebc026553d7297411cb05db96214d2c20126a4b499ef0b4b1d8c4cea06796ec471b4fa9c998aa6ffae62278275381cb9c1b75d0fc80030202f290453f388f8e2522723930aa80453e3d55e0371a574c086ba52fdacb780c3922a2863700460626e2b0453f7953a1899bb32efc5ae672de8df2c222e77cc16ed2a5527b536ef7487e7047623b5a5c669e94000c62597ff3d8f88bb4b1d8c486eb4d10d729cdad7fc8e1d6fc299fa8ced7a460cd8ae93ccfdc2f7196062de5708a8bebfd4c188b44b664ff13d989af635df655a677b8fabe573ee328803b62f5505f6dcf719607afea010504d250ffc726671b154bf71bab5632dd32e37e1ec5a3735f7f005076796b967da430e608272c1d43c229e5bea600472bbdc9f5bdb324aed6b7e63c781f33d89cfd754062c604cda5541dd2f00262cb50fcea2fd5e447c51a9931148ad233bdbf14336fbd3bee6374a076c2015b05b9707872975cf542a1d18942794fe80adf8cf0afffb8723e28f0b7fb30d1722e2d9cdb91e8b888bcdde58bfd4dca03e55ea6003979a74bf2ed7dc2047e94244bca8f5dfedea3a9f34b3536dbfd97cf680c3925b67b9cb3598000c546e766abee392e96f8c889f8a88fb0bafe193cd7fbe7b0737aba3c2b977b99e86fd68af7d78ac096c76b18e699649f553050c0e53aa54fa2e67b90118b00f15028ab7953a28b8b9d9e7ea7b23e2ed4b55914a4154ae3ddcb43b23e265a51750905b3bb5ede08d6168973adee566baa9751616adc361cadd33ac870498a0d2fe53f33553922e46c4df8f880f56f4bf8df64853fafda5a517d692bb311a691ca7938e4a7bd74a07ad295522dda275385ca94a9d67a5030118a79fae08569e59eaa4f1c288787344bcb7a2cf5db6ab11f10da517db48dd18e7d2b146ab7dcd77799d5325f8055370988e33f70cc58b0026eae72a02948f35333fcf583aee9911f1f22678795bf337a57efa6edf9bf9774761766a57c509d8af594790b3ab87a0d4869fbb9a0d0376ef46e27bbdcbb46100066ed594bc5f8f88dfaff8bba1b4ff28f1ef2e15a2d8457102f6abeb9aef2a4527b5158112e970b8721bf9ae931a0fc048e452dec6d01e4a2c12be9239c6daa9716a5ff35d5de776c18b453bb7601d0e5a6ad6d9ec14c0c4950292b1b47f7be9df9c7ae09d37330866a7c6a7ab10c52eaaeccd320f5d2a46c2614bdd377cb70126eedd15c1c818daffbaf46f4e95b19ebb318e563b98babea3c210a9cfd675813a1cb454455c69bc0054954d1f43fb74443ca790ea67766a9cbad63dec62b3e6d4baa95d9d0fe84feabbadc80c001111f1604540b2cb767f5379ed9e26c0fbea88f85311f1554d65c1ab11f1e39954aadaf63f652a34cd7758ed8dfde90aa67651886216111ff5b982514a55843d330807c0b27dec1df5ee3552ec5edc6c18fc33993d7ed669bb2a50c07eb5678d76350b992aeea2fc3e1cb6aead16166d17eb300138703f5811786cd27e3922fe8766ffaa6d38de62caa294acf1b9d0316bb48bf49ccb89cf94ca5f70f852b353e7ee1b00a4dc59117cacdaee6b029fe58d81b7e962c56bc835b353e374bde33a6ffb012857227ddbe702fa7747e23b7ea5742000d3560a406adafd11f19626d8e9c3472a5e53aaed22058cfdea9a9ddaf6c69b4799543fa94070f852b35373032600d4f8ee8a40a4dddeda3cb47e75a9f31d5837f5cf1a97716a0753bb583c9e2a91be8bb442a07fed59ee453360021c942f28fd013bf5cc88f80f22e2e6e6ffbf3922be2622fe553303f53b11f1fb11f1c1667dd4bf28f4b76bf7352958ab78aab52ea3736b4750b3edeb7c25226eeff8ef3fd97c06ed4d0387ef81c44c94671300462bb70f9051c66938eab8cedb0e6eba4ab12fdaaa013d304cf724bee3bbd876010006a3eb613ad79e5fea9083d34efd3cdf72aa9f12ca307ea94193336ba7009882bf5b11482d9a2a4de3d2b5807cdb414e6aad9e516b188f54f5ce55f74d048083550aa416edc3a58e3828ed149d1b5b9e9dca055346ad611c66cd7adcaeefba41380026e3dd15c1d43c221e2d75c4c1b8d2717db759267d962991ee210bc6a3ebb7646ebf4200a6e69515c1d4a2fda7a5ce3808ed60e7fa1667a7ac9b82e9b891f8ae03c0a43cb722905ab437953a63f0baf683da660a5eaa7ae4b60b5e00fbf7bf27beeb003029ab944fbfafd41983d6357bb4cd8d75ad9b82e948954a578c0280c9493d0477b5874b9d3168d73baee951e9a0157cd403164c42aab2dfdf2e1d080063935bef926a1ca6ae7dc7b615e8e48a50583705e3d3b5edc2dc66dd004c51eaa6986b5f5aea94416a073cdb5ce7909ae5dce63980e1b83df19ddfe68c37001c843b2a02a8767b41a95306a72b3de742e9a04a1712a97ea746ab6194ac9d82ed9b350315f745c4e5d21f03c3d1950256d39e59ea98c169073c67a5032ae53e43f69b8271124cc1f6b50b8499eddda32f2cfd012c59f7cbfa45a53f6050ae745ceb6dcd4edd92f8ef7fd2da2900a872dcb1ad886d46e040a476b82fb5e7963a6650da45474e4b0754ba2ff1f9b8513a103848b34c25cf4ba58381c7395aba473fd6dc9fe74d455ee000ac9bee378f88a7943a6730bad6c86d63d42bf7f9d9d6ec17302ca94138e97eb09ef677caba633830a93d446a9a2ffc6198755cbb6d8c7a1d674aa4af9b460a0c5faa8811b09acb4d9647bbc08b7b281c9875d3fd7ce10f47fb877a5b25cc53fb9649f583f1ba90f8ee6feb7705a6a29de171bd19ac90dd0107e6688dcd7c971bc3b7ab4d7c53a97ed7b6944a080c53ea9e61ed14d4bb2522ded0fa0ea9880b076a9374bfb994bf83d04ec9db4699f4d4e6bdf3d281c0c1ebfade6f639006a6e27ac777e84cd60f1cae5440f5a98a60eae3a5ced9bbe38eebb6e92872d77aac4533ba06e3965a3329a0823aedfbf20d591d70f85237c7eb11f17021a0da56c96d76a75dd6781bd7ec72e2f3705c3a103868a901b8730f8450749c4897b54f231cb80b999be3cb0bc1d43c223e533a017bd5757d370d7a5201f836d2088161bb2bf1fd97fa0d65ed54f9ab8a4fc038a4d6c1dc88882fae08a83e5a3a017bb5ed4d7c53a3d3675b08d480614b0dc0cdadfb80ac2b899929df9b03f184d21f3079b912b77f1011bf15115f56f81b86e94a470ace262361b3a62251dbff65741a2621f53dff3b66a821ebf2d2fdf83c227eb219b8f6bd8111e82a56b0688b07ef7f5698a17a77e11cec4f7b346c934d7c5379dff3a6443a306e2799df00a05b7bffc74defc5c000a576b95f5e1c990ba6dc4c87ab9dcab9e982f16b1dd7fdcc7e5330195d259e3d1c425a3b45febcb9674a8f8791b991b8412e97be7db0104cdd9de99ffde82a69bee92c52d7674589649886d40cf5990115789ca38eeabaf32d6c57020cd4872a02aa3b0b01d55fcff4cf7e74cd4eadeb52e6da5b3705d360760aeacc22e2f6d6f7e4acc9fc31f8002394aaeef7c9d697fefd8580eabecc39e85fd7ecd426fb5b745df31b66a7603252b353e75297e0f3a4aae0fa9ec0889d26bef8af6cfdddc70b01d5a389fed98fae91b175a58a9600d3919a9dda348d18c6e496668079f93b72da54db0546ec3c71936c7ff97fb41050fd54a27ffa77d4717dd699499a252a13cd374c1f040e4bae12ac945ff8ac546abc143f18b90b99f2b7ed9be487055407a33d3b75a37440c2954c30e5210aa6a33de2be689ba411c3582cd64bb50b50a8e407137196b849762d30fe9785804acadf30748d24af9b6ad095e263f1394c8bd929c8eb9a9992c5011392ba495e88c7eb2afdb9dc14a51886bbb61000e536ee5c277510385c66a7a0db2c221ee8f86e5c91e607d3b1eaa8e3fd8580ea073b8ea15f173aaecb3afb5d74dd20e6cd8ce651e960603456bd4fc0541c75a4d7cf3748b1070e54aa62d379626425174ccdcd500dc21dad6bb2ce6c52ea01ea9a1137989cd4e08ad929a6ae2b8ba32bbb0718b95460d475a37c62443c5808a8ded6711cfde9cae15ef5c7bd1d902d37a3d1302d5d33de8b66a13d5375a96309c4d9066b958103d655567bd1ba7e149e5b08a6e611f11d1dc7d19ff68ce3aab3535d1b012f9a1406989ed4ecd4aabf2d3016c789f5e4eba4d60323702df3f0dc35f298cba35fb4efe9388e7e5ce9483f586504f938b3f0dca81b4c4f6a3f9d73eb2899a8aeefc4a9ef034cdb8dc4cd325511ee991501d537268e65f7da2366ab0641b90a8eab0466c038a47e13cc4e3145b7770c5a9e4a8587699bad5112fb6a4540e546bb1f5d25ce57291e911a899eaf119801872fb7a1b7d178a6e696c4770198b85c70942a6270b122a0ba29712cbbb51c4c9daf18d82a4201b4ad3ae00663d5b53ce29a8105200a0155cadd02aa416aaf6d3b2d1dd092ba96a9d2f9c0b8a566a7cefc263021b388b8a7e37b705d30052c9c276e98b94a6e35297f5f9c399eed3bea58e750bb374caa52d1bc09caac9b82694afdbe4bff652a521bf6a6d698031374b2e60db3b407954d7dfbd71e49be563a6049aa1cf25cf95798acd4ecd4a9d92926a4ebfe78d5770058962b40905b33932aa9bd68efcc1ccbf6cd22e2ae3503a1ae91b745b3df144cd3aa7b13c2d81c750453e72b0e560213912a973ecf8cbe7c4921989a5bacdcbbf642d96b95a367a911e8b9740698b4d4609bd929a6e038b166aa368d1e9898d3c44d333733f1928a80eab6ccf16cdf59ebfdaf59247b2153bd6baeaa1f4c562e15dcef0253d0b5a63855f51898b87645b8e5961b85b9ad104ccd9ba08b7e5c6e054667a5030ae93c1e9a60da5245876a7e5be0907515685a75fb11606272a390b991989a0a7fcfca1ccff6b403a31b15b353b3c21a38eba660ba72153fa5fa3166c7897ba3358340566e13d75c99ec76f18376fb60e658b6ab1d14d7ac7beada98703998f2d004d3753df1db60768ab1eb1a48b06508454f28fd01a397faa1f8cdc286b0a51990c70aff3bdb71d254e85b56aa3e747b44dc9af9dfaf34e90dc07abeb499a17f56447c6d44fcf9669b89cf44c46f44c42311f1f3a54ef6e8451dffdd6f5a3fc2889d3403c5cbcf369f6cb27172cf4200111d850c966729724a7b50bda5703cdbd11e492e05bab914cfb9072658cb4b23e26f36a942a5ed2496dbbb07b82e23f5fa4bf7043854d2fc808dcc3237fa5c418a9b2a1e141434e8c72a01d549a1a25f69660bf8ac9b9b41a39f8b888f57fc1e96da83a513f644653fa6a8ebbe581a9c04f813b92a6fb951d39b2b1e10be3c733cdb7157eb46900b886a8a505837057957579c815aa5fd5e447c60cfa3e21712af6d9faf0976e5a463d3deb366ff35806aa94d1be785d1c857151e0ceecf1ccb76b41f7c4a0f3ca587408b6ea1dbcb23e2879a754fb9efd036db3b4b2f6a0752c194df07c6aaebbe28980256962b7d9ebb815e293c0cdc9b3996ed683ffce45234df50b85e5279e0f33db1496daed91e6257ed2f975ee496dd48bc8e9aaaa170488e3ad2fccea5f901eb4a95c62d55782b6deafb0385e3d9cc85569ac269e646909b85f4b0048ff7da9e67a352ededa517ba65e71daf618c85289ed11411b9dafce7334a07302a471ddbbe9c5564790024a546244b01d59d850781af2d1ccf6696f7c97820f377b9149eb13e2cc1babebeb02f5fdfed53a517bc45a97d05c736e092ba77a94a3b1df69902b66edd92e9f7161e046e2e1ccf66964792531b6d1e256e1c8b76ee26027f629fa97db9765be9856f416a16fb7c24e9c02fae58f73b8f8877953ae2a01d2766a6ac99023696bab1944625ff6ee1c6f4d4c2f1ac67d66cc8bb1c28a5d21472c1d45c3005114dc0727fe1bbb2cff681d23f600b52c1e4187e23560d94bfbdd42107ab6b8983343f602b523795d24693b9079037168e657ded74a45499f352453f3711a6eea68aefc9a6ed7723e243cdefe9dd4d2b1dd3d59e5cfac76ce8a713e73df46d145e57f1de76b5a7943ae6a074ad9992a1016c4d6e03c7d20377ee66745fe158d6d75ef3d675432855602ca573c2d8ad3a6b516abf1d11bf1a116f6dfa7e55936696b26a20b7cbb4bbf61e3c8b76c8bf135f1b11bf54f1bea6da77974ec041e95a17591a3406a8960ba84a39c50f668e7d5be158d6b7fc20d8b576aa26983af4516758d70b0abf5dabb4fb9ac0699df5a22faee87fb9ed4aaa68cd8f1cf0efc44d5ba8d0f87b11f1b4d28918bc593333d52e8fae343ab0559b6ce2f83b99635f573896d51db7d6445dea78e039e9b8712c37290e4cd95b2b1ea46bda8f46c4c5d2c90a2e569c67d17639e39f9aa9dbe58cd82edd5cf17ed6b66f2d9d8cc1eb2ab672ad7410c0aa72692fb91bea71e146f4ccccb1aca79db270a1f5bfcf0ac154e99ac2185d6cca64ff7ce1bb51d3b619d894669297dbc74b9dade92822ee499cf310075e721917ebb4ef2f9d90c14acd4cb5ef9b005b91bba9e794d61f7870dfbef6b55a7ee0995554f42bad8983b129fd4ed5b45f8f88ef8b882f2b9d6c45a58dd197db63a5ced694facd2855781da2d754bc8fabb66d06d0f4ab6b66ea103fd7c081b896b8917cb4709c19aa7edd1211b747c43f8a88d366b66a596a9479d10e797139ace259cd06ad9baea1f90711f16d11f1674a275cd35fad780d8b96dbb87b5da9d99cf66fcb21b818117f58f13eaeda142d384c973b060bcc4c013bd5ae18b7dc725e9239eedec2b1aca6bdceadbd983615142f9a608a29786953992df75da8697fafa719f61faf782d8b561ae05a476a23df430b22b6310b996adf5c3a3983d3b52edccc14b073a987f1d243f80f656e42f7178e6535ed0786e5ea8b970b0f046707ba160256f1b385ef414d7bb8a7406ae1472b5ed3a26d3ba0ca1523eaf33dd8d4ab2bdebb4dda21bd177c3693a3bd1d41a95a31c0569c256e24a5b48fd21e2a6c4f3bbd72314355b300db030163b68daa7d77efe97b524ad35d6e77953a5b515766c2f981cd4e5d8c884f54bc778bb6cadf2eda334a2f82c1e81a24383be0d2ffc08149dd48cc500dc33dcd82f4079aa212cbc1948a7e4cd59d11f1b18a07e25c7bf79eb777287d7f97dbdda5ce56304b9ce3b474e080ac9ae6773122fecf8abf5b6ebf5c7a110c4a3bdbc6cc14d0abd3c4cda434527977e646745be158eab447dc966f10a58a7ea519463844efaf7810ae69a5dfb75dfba288f8d58ad7b9683f5aeab052ae1ae8a1ac33a999995fb44722e2b511f115157fdb6eee6387e1426270c2cc14d09bd448e5bc30bbf1e7dc887ad11550cd9ad9aadcfbbfef8745d8a6a326e52df799af693fddcc540ca102e9732a5eef72fb2f4a1d564a052387b2d6f2ea8ad51b17beb9e26fdbedcb33af83e1b8deba6e5d1bde03ec546ea42fb767d151e14624a0dadc7144bc61e93dbddedc244aa92e37dc4c0ecef323e2f5cdbac4d746c4d34b074cc85d11f168e1335f6a8f362982437273c5eb5e6e5f53eab0526addd621a447adfa9e2d0f2cbda3e2ef979bb4f5e13be9d8b8f7bc7410c02ee4f692caedd9902b993e6ffe77d6d79e395c04b7a551fab342bf0c4f5780fc5044bcbc74e0889d44c40722e25385cf7b4d7b71443cb974c23dc855d9eb6a5f52eab0426e13f7a1cf4ebd6085c0fa3d1db390bf5271dc72fbeec4eb6038965357cf9b41477b4d017b919b696aef75b4ecb6c2cd28772c65ed99c3eb151b291f4aca0e9ff3d599ebf948447c55a98391d9d63e52bfd36cecfbacd209f7e84d15ff8e457bb4d459a55465d6a1afb77c7244fc52c5fb346f2af9751d5f3aaedd5edad10fc3b27cbd4a45b400762a973e9693da1072d16e2a1c4fde2dadf7f3ed1515c154f43b1c2711f15b85eb393f9034ac6dd9c63e528feea0bcf8aee48afab4db3b4b9d5558f7b77edf6ad68c2eda83893e562962318f887f94e887fd3b4a145599d26f253040b99b6c6e1dce0f146e6a4fcc1c4bde72e9d7d3e606920ba6ce0bebdd189655d6818cbdb8c8ab23e26d157bdad5b47b4b271b90a7ac5858611b6b52bbf69d9a0f7c64ff394d69fbd2fb336f4ae8a7ac5a19728829a27c563b6df58a35c3c010e472ea73eecd1cf7078563c97bacf55e964667c7fed03d16ff4944fc5ac5c3dc727b65a9d303562aae52db0e29905a5875c664d319ffd4effcd0373d2dad195db4fb327dbcb0e2f8e5f6814c5fecd72d11717beb7a497307062175a3bd56382e97aef240e158d2dae92d9f2edcfcef18f803119ff5928a94cd76cb3d241eaa9388785f447cb2e2df9f6b0f47c4df2b9d6cc05609267f6d0b33fea9cfde90f79daa4d892c7d4f5e5fd1c77253d46098964ba39f3533ab323380c148a581946eb4b974959f2d1c4bb7f6a875694dc9905375f89c872a1ee2daeda152a707665bc526e611f1d6d2c90ec02f54fc3b17ed9b4b9d15e466a7865a3ce87515efcbbc492fcfcdde3db16203f4e5f6d14c5fecd7f2753a2dfd3140dfce123796d2c3fac3999bd23616504fd11d1537fce5eb23d561b89e19113f1511bf5b712d97db834d99efb1f88a153fd7b9f6b6d2c90e486df9ef79443ca3d459c1a1cd4ed5cede3d50910a7953453fcbed1d85fee8df2d1171b91518973268007af7a1356eb65f5eb82959d3b3bad90aeb056c5c386cb50f845dadf48078487ebae2df5b6a8f34335b632a615dda7262b96dba1971eab3783ed0d9a9e757bc27f34c35bfb63b2bfa5a6e2ac50d4b57018a4bd2dc6c3c4a04000020004944415481214aa543fc95cc31a505d57f23732cdd96afc3ff97796fcfddf407eb651b54abfbe048cadedfb4c17bb0688f44c4fd4d30d0de9c750c5649f7db34c04ef53bd411fe5cb1a3452bad995ab64a25c5da208dfe5c6f5d235919c020e5368acd2dccbd58b831bd3c732c8f57dab077b919991b9e9388784fc5b54b3581d4e7b7b1cf70d71627b9bbd451c1a1cd4e7da2e23d99aff07d290dfcb5dbdb4b1dd29be38878432b5df8ac7410c0bee46e38b9879a524a53ed0d8fcf0648972b6ef6f3e6e6c270dcbc62fa56bbdd3792ef4acdac42a97d24225e3bd219a9654711f16f2ade8f79a9a30aa97e87383b55baa7cc2b0a50b4fd70459fcb6d0cdfc531680f305e90e6070cdd51e6e6929ba17a53e1c634f687a26dcaed03b6dca4f90dcba615ebc6300bb38d3552f3895505ad9dc5fbe1524705a94220439c9d7a6bc5fb315f634fb67f5cd1e7a2bdbfd419bd6907d7ee7dc0e05dcadc6072a341a58702eab573c4bbda50ab714dd15737eb7b4ad72cd5de1111af2e9d64c036fdf72fb7b1159ba8517a4f166dd3b4e954bf439b9d2add4be6cdece5aab347df54d1ef72fbde5287ecdc22cdefbf6d5d9ba10d00003c4e2ecd22f723f6c6cc71f7678ee3f35d8d88cf146ef437dc5006e14f47c44f543c98e5daa615dbf6e9db2a1f7e6bda58521d57951bc05a6e9bce5e1ecaecd47f55f15eccd70c766af7b19a47c4c74a9db173b3d635f9ef9aefcb903eaf0049eb0654b98d12df9d398ecf69df40ba9a3553c3b0eae2f6767b74c5b51f43f28a887873c5bfb1a6dddfcc704dd1acb218c5a74a1d5548f53d9499eea315d2f1d64df75a655ddf9b4b9db173eddfd8a17c5601aa5c4bdc604afb1ce5527e0e7914be4f3595fda6388a3f34efabb84eb956f340f8d4e65a0f6dd1f5b652fb1e8988af2b9d6ce46a8a2eccb730887208b353efad781fe61ba43d3eb7a2ef45333bb55fc7cdfe8bf7b4ae4bcdef26c060dc48dc643e5a38ee23991bd477148e25e2db0b37f91b82a9bdfb86a66c75e9812cd51e8c88a715ce715b44fc4aebb807f6bc8fdb9d11f14f2bfe7d35edd3cdde5c4f2e9d74021ea878bf4e370caa73b3de4318f17ff60a95f756d96baaed9515fd2fda8f963a63a7da6b882fd96b0a3844a7899b4c69862a97bab2cf87c14350933e369491e4a97a7bc535cab5b7964ed0a4c6e6fab8b7d4c196fcd98878cd86c163bb3dd63c183daf74f289a8ade4b9e9daa9d47986303b35ab0c2ae795df9f9c9fa938c73c223e1e115f51ea8c9d99357b4b2d5f937d7f4e01d6d2fe315bb4dc68e6130bbbcfaf9ba63115ffa470931fc248f254ddb661e1854f57cc2c1e45c443157dcd9b99cc5d785e447c6b44fcadc27779d5f69811e64e356ba7e61bbe6fb92d30364d23dc86da94c74d53bd5e5c718e45b391effe7405d7374a07010c55ea4693fb61bba9709332c2d4eda8c915ff5799f77cd38709d6579a31aa69b91999efef48efab697f31d3e72a9e12111723e2bf6902bfd27957699f6e0652360908c6aa66ade47c0b0329b90a82fbbe2eb58314dba810fbaa8af32c9ac1bffdb8d0ba0e3706f01905d848ea46930ba87223a1f303ae66b64b3515be364df7613d4f8b88db2b1ebe72ed2d8573948ecfb54d8bbc7c7d447cd70ab362abb44f34419ad4beb4da34b74dd64e1d657e5ff6fdbb523b33b5ad52faab9c8f7ecd22e2d68e021443984105585b6ee43477137e49e6b8079b94403e5fe9263f84350e53f4ca88f89d8a87af5cfb89c239bea3a28f5c5b77d4fecd2b54535bb5bd2b22de547a013c6e243ed54e4b1d15a4aab5ceb714a4acebe18a7ffbbc493bdd869af5a98bf6c252676c5d5705caebee7dc0a1cbdd7c7201d56d99e37e3273dc14cd9a34bfdc8dfdaa1bca5ebcb4e2a1abd45e5b38c72b0b7bb6d5b65a474d20b5ad72e75d6ddf331e87a436d5ed42a9a382d42cd83eaf55691069b97d57a9b34ab5e7fc9552476c5d57511229eec028ec22a07a67e6b829aa79a0a27f37371ba896ae4daedd5d38c72a8be373ed1385f34413d8fdd20ed6462ddad588f8aa88f833a517c29fc8ad695a6e9b2ec44fed3b35dfe3ba94d220d2a23dda7c17b7a5b6c0ca5f2f75c456a5025d0389c028e46ef8eb0654fb1c111d9a9ac5e8d74a9db075aba405a5daeb2bceb1692ae1a2e502aa3747c4af55f4b16e7b5744bc3a737ed26a0653e64da9f375e5f69dda34505b57ed2cd17c0beb0397d59ef7374a1db175edf57dd7f618ec036c5d2ea0cadde473e9441733c74d496984f60f9b07804d16a2b3baa7573c7095da5d857394aefd3a6dd9f736dfc1dfaf386e93f6bac4bf8fb2dad9a94dd74ea506074afb08eecac58a7ff3a26dfb5ef1bf559c731e11ef2b75c4d65ce828403177df03c62637a2975bc89cbb5999a1aa9b99dab444f2ffdfdefdc75a72d58701ff264d0941e0be5022e202d1534010592d79d46a29a4559f0431d008674172ea16252c38b2280179dd102751a57a2b35841f8dbd4029250ddd0de147e426b0748140da6497621cd338b0506d2881c62f040305113fcc8f90a4d5ed1fcc6d86e3993967ee9db977ee7d9f8ff415f8edcc997bdf9d77cf9c5fdfc362de51f0d92c737f3fafa08cbef1a12a0be147ab07e5dcf1cbc6f9887876e67dd2ad34b3df326ba7763bd6e7ad6374aa74846856252f1a529ff590d7e60a6330e9c8d461c17728c0c6e9aa008d502de658417af4d99a336f1d55a519c7dae25ca6fcdb0aca5824ee2b3866a8f0b0b3bcd286c5c1923df5673bca5ea6a1b688d2f73c2bd86260112f29b8eeac9a1ecbf8f65a46ea01b6d2a223546dfbd97cb9e39ca3a0646dce97d7f0b043c48f147c365d717ba6fc3146a6561927ed1f37889d1e591d97fd1eb83052b97d3da9e0bdd663685ddb78a4716bae3006d1d4a9685606b0b5ba1a546de94c2fef3867d1fd72b6c16ee1349f7f9f2b88c13da2e073e98a4f65ca7f774119538d8f1a551e5457c6bd7a1ce40aca784047c7d62a47bf5f5cf05ee731f434bfb9ae2449f5b82f57104bdb89889b1b7ef7d2a3035b6d9111aadc28cc51b45338cdefeb4b4ef161316f28f86cbae2991d65f799ea348f2f151cb38ab8a9e37dd1df6ee1f7c06cc946cfb77564105c761a611f5744c4570adeeb6ce4ceb67305d79f45c49b7205b1b4a64ec5653b0f0026afeb61b06d2d455796b4dcb4a86db4d392c5a8291e9f2b8cc15d51f0b9b4c5a56a3a539bd2b4d8f5b82d225e5b70dc98f18688785ac7fb6231a5f7c3b299fd9ede52ee6faf705f9f5cc75a1acb3420bb3cb6e0daf3785cae3096d2744f9c1df1b307988c131d954f5b528abd8e5ed8eb5bced966a50f51e68fafc7eb0a3e9ba6f8e34cb98bac99fa7c75ee501bfef68d5756d76678c70a7efff35876ff9db6ef9c552514796a8f75625f1978e3ded4730a5ec36ce41132beb1af54fa3b5f57ea7e80955b6484eac73ace197293c64dd03457bc2d56d573cc5f7a74c1e7d214776746a65e5f50461aaf4dca287d201d223e12113fdef25e585ee994dfd9001b795f1b11bfd152f62a46c04bf7d79a55f7f8d8a313af2e781db388f8e7b98258585327eb817553c051d25539b635a87eb2e39c5c5ae96dd267ed8c8a653d4a17aba7f1f48e3273e736c57b1bca197bdadf9723e203d5fe3c8cab3411c5e100eb9bdad60b9dcf9d3880bf554d83cdbdcf798cbd46af4f763ffbaa8da36d96cbb2a3b0001ba56b1e7c5b4f6ad774a597b59cb36dfaae1f58f6218ac5dc51f0d9a4f14b2d659dacd6bee4ce4fa36d1aec58d3fefe5744bcad1a9d637c259b78cfa36b6fbf123fd052ee0773270ee09a82f7578f5574225d57f03a66d508edb7e70aa3b7a6ccb687038cc2026c9cae8641db9a9f57759c7375cb39dba4cf03d46c450f16dcdf230b3e9b343e16110f6d28eb970bce4da364bad30d05e594c61d46a356aecf9e5343aca16c9bde7667eec425f56d4cfd44aec08194ce1238952b88de765b7ed7cb761a006ca4b62fc559b5696493ae240cab5a14bd2e3b3d9250ccc3e8d47a74255c698bb401f4b425a6e6956e92db96b1ad345e5a351e59bdd27bec708035944fe8287fcc7dc4aea93253e6dee3ac6a5caeb203e95f14bca659663d24fdedb664b63d3bc07d0eb0b1da2aa1b6bd23ba2ad76d1fa12a5d2b318f553e5cf0cdfaacf59845c4adc9f937159cd314772d901ce06f47c42f44c4af560df6dbab35506de5df5835febe2b5730a3e933523dc4f7c09b5aca1eb313ab7404681e6336ec52a5eba78ee2561e636bda6b6ad9ad0000365e5b45746fc3b1df9da9bcb6b977aab4377a1eabdc60936f7679c1e793467d74ea4505c737c5cf77bca6be1e1a11ffb42af37cf570fbacdc49ac4ce948f51053fdba1a36a523a17ddd58f0deea3144a3b18fd2f5532fcc1544b19daae329fd1d1f144c6f06d87a173a2aa3b481f45d99ca6bacca7dddfa26a19855fbd2b01e7d9351bcbb76ee5d05c7b7054743e9c8cd509d2a1f6929ff9773272ee89682f7568f753c4c977e06638ce03da47acf2723e23f56593cdf1e11ff29227ea55acbf8f05c211b48463f800e7d1a544fec38f652443cb0e51a9b6c91c694e90feb53faa0558fa8d659e48e6b8b5fcbbc26b6479f3da78668685c3572f9a94f17bcaf7adc982b7024a57b002e9b20e329d5e6c13f1311af8888ff5970cd796cd3be8c271beefb43492800fe52d30ee7f34847595ed871ec7d2de56fb2a60d0b4bc2e8d4fa942ea09fc7f511f1d305c7b5c56db917c456695a3fd214433d68764d2d1cb241f5f0aa6320f7bee6f1a6aa836d5dda46edd27873aea09a0757bfd32babc6d0470bca2f894db7d3f2bea44707a8e9ead14fa74b74a5cf7d7f4bf99baa4f4f743ddab22332bebea353772db056240d19c48e8ed2759443ac9b8a6a64a4ed1a434e655b6414fef25ca1237a48c1eb9bc767aa46e96babb4f3efae7e77b7553fbf3b22be1a115f2c286bd1b82b229e917b5313d5967ce5d496af9906e8adeb2121adb4bb1e58cfb794bf89faec2f9386d1a9f5e8bb57ce0723e2bf141cd71697aa8d56391a8e1776b0b465475d44d7e8d4d3722717fac711f18705efab1e4336e616b14803700ab1ca2c8843d8edb80787581b08b055bad2ffa63dad2fef3876dd95ec5016d96baaedf7c56a5cb6409af45f2f38a62bb635010bf7573a5a7d38e034bcaeceab37e54e2ed4777aeca726f220fd8088f85ac1eb9d626c52b28ab30daf7fa8442b005ba9edcbffeee4b8ae86c6b68c5095ae91680aa353ebd177aadf32f1e5011f9ad90cc70aee8bd9c0f7c59d235fa729fd752efe7eaed015fa60c1eb9d62dc927b6313d1b471ef6cc0b581005ba9edcb3f9dbed2d5a3f9aa96b237c54e4725d2141793ffb640773dfe51c16795ded3b963bae2aadc0b62ab9436a6861c9dfe898eebbc337772817f5df07ed298da0c849f2f78cd538c3b726f6c02daeef955ef3506b071da1e32ef4e86f7bba6bd4cadc2edab4f63eaf71b7e66746a3d169d9ed9373e512509e06829594b3964632a32fba82dfb3d9b7b2f4df1d25ca16bb0ca51e9a163ca8eb7bce653a6fa01e475554ef5e9251feb386e537baf767a4ef3bbd8d03b6a746a3d9e52f0790d159b9aa58bc5ed16dc17b381a6e0cd5d1d115f69b9ce8722e241b9025a3ca6ca70977b2f69bc3557f09a3cafe0b54f35a6ba8e6aafa52e1c32d10ac056eb6a50cd1b4a97672a896766ae31453b1171baa0029cc761cb1433a353abf7ed11f107059fd910b169d9b958de5e447cb6e0de38952ba887076546c4165d7ff3d722e27305ef258db7e50a5ea36714bcfea9c654a70d3735a62e4a8f0e50ae64842a97aa76d9a928abd677646a563d64a569e6877ca0a2dca30b3eaf2162d3ee6b865132d56fe805fa5d1957bf10118fcb15d0a0ef7602f5f8be5ce16bb6c888db10f117d5ff7ea29a2a7e4fc139f598e2774adbd4e94d9d7902b0165d535be65ffedf95a92436a917bf6b7f8da638ac46a19a7e4f46a7d6e35cc1e7b66c6cd23dcd70ba1a36f3381c614dc97b3aaef7c6dcc90dfaa6459fc7a581a7318e29f75e868abbaacc883fda30edb2ef77d1d446a89edbf23a35a60016d0f6e5ffe1eadf1f93a9249e9d297f2a16d9b4775eb1a40b768d4eadc7d30b3eb365e24f23e205b917c156da2be86cf9e4080d8ea766aef9fc5c01899716dce76db1697bacbda4e03df58d0f549fc98b23e2ca8e6b2f32523ea535546d4928ce8cd06100702474550051552c5dc7dc94297f0ada16dd76c57c04cae8d4748c9d3279d31e281946e906be63b8bee37a7df6f87be0029b5cd7e3fb731798a8cbab75bc27ab46c2fb0adeeb3ceeada6eebdb46a283f3877b19a6715945f8f57e70a5ca1fd96cec5c3dc8940deb7e50e606b7da95abc9cbab3fadfffd1f06f759fcbfcfbbaedd546db4add584b899cf648bf6a8474c994f97bb90316f43b55f6b08fe70e642b1d2be8957f5fe6df17f5231dff569a65edf111f19b4b8c80fcab88f848eea089fa6c35f5ee5cf5df6fa912087d771507555c19115facfeff7d11f1c7d5fab445f54dd8f099dc012b746bc3ebffa3aaae0460413fd7d2a3f6e96ace785796bfff1b114fcc5d608d8e15f63cd7a33efab4db70bed1a9f5f9d982cfaf6fdc191c65c70aa6025f2868702d2237c5b064badf0b16488e508fe7e52e40a30f14fc6eeb3195bdec9a666a1c8e906805e0c8699b4b3dab16e7bf2053514c75017f9a95af24d24a252dc3be53eb7555c167d827fa4ca962fb347598a4713157c8827209307e21574044bca9e01eef8adb7217a0d1830b7eb7693c2557e80ab425a1d09802184057eaf49305bda8534c057b73c183521ae97487dd86de3ca353ebf58682cfb1346cd84bd777df3cc64a4093bb7657f28bbf1e11bf56f0dabb42636a71b9ad44d29842c74d5b035e120a80815cdd51115cbd8123547d934f1cb6a489353a352d7d1f62ba628a9d00ac56c908f65853fd9e1e115fce5cfbf2967387f83bb8b1a56ccabcbee0775c8f757fdfec77d48b7dd78201d0e1ce962fdbb765a604de952b78857622e27441e5568fc3960a65a7cafe543fd6e8d47af57d88698b7f99bb105baf6bffbd798c35d5efb22afd7ad7b5db463472a35a253174daf7a3e8a305bfe77a3c2b57e0c8ceb6bcae313a0b008eb4ffddf2857b4fc12691df932b7c0516493e71d091d528edbd96d56ffdee2af84c73b1ee9e62d6afa9b36495f7ca3599ebb64dc57b6fc16bee8a3f99e06c824df48305bfeb7adc9b2b70644df7fae188f737c091d696e52a97fd6a36811ecf9285e569e4a6f2a43d7aeb7e8fe43fd35cdc92bb0047c2a9827b65cc7525b98e81eb6bc73e31227e2922be5ef09abbe2b689747c6d831b0b7edff5787baec0111d6b794da6af038ca46b3ad5ef672a8cb6b9feab707361a3af1e1733f3c6d3d1299b1d4e43ee413417b05fd0f932e6dffbb505f7e95323e269036e11703e221e9b7b61147b4bc1efbc1eeb1a096a9baa7fc1ba2980f174ad93ea8aaf8cd8939bd337f9c4ac303d6cda40631a165d4365648aa8bea7728da9d2ef8845fdf7ccb57fbb7004ad34d6f530bfcdfebce0f75e8fefcf153882a60cb5f3b0792fc088ae2fa818da62d5bd5dd747c4ef16bcae344ad21fef250daa83dc09accc930b3ee3347e3a57284746c9baa9311b534f29b8fe50716f327590612c9261f161b94247d0366b43630a60644f2da818da62950b9d1759987dd023435fda982a3d8fd528cd72767ec5f725d35672df1c8e38da7e5944fc41c16b18224e7a701ecdab0a7efff5389d2b700437b7bc16eba60056e08a82caa12dde932b7c00cf8c883715bc9634dad2a237d949ce1d2b6d32cb795de633bf215700474a4906d0c3911b214f2bf8ae1a227e25f74258ca3d059f413d9e9f2b70606d53f735a60056e48111715f4105d116cfcb5d60410f2dec5d6e8a8b3d1f92d23dac4aa608b21e4f8f88d746c41dd5677547f5df4fc99dc891936b4ccd56b0d668d1efb0d2382f13e9e8ae2ef81ceaf1b988787caed001a5d3d5e771e0de0058ad971654126df1a9887850ee023dbd60811ec179f49daa97a697d59882cd5792b8e6ec8853fde67ea8e0752c1a977217671037157c16f57849aec081b5ad9b2a9da101c040ce1754125df184dc050a1d5bf2b52c32bd216d508db9381d185fdb5a927af49912bc8cab0a5ecb22f1cadc8519c44316d89ee3aa5ca103bab5e1fa873a0601d6e3e505954457bc2b77810e8fae364cbca3e03a6df1d90546a6a23aa75e59e6f6a902a6ad6d43d33416f9be58c41853fe245d599dbed9fdde902b7040e9be89f358a463118001f4ad349ae2d9b98bd45c5935a2ce15945b128bce133f9b94a331059b6baf70ddd42a7bef871ca17ae712df752ca66f8378ec357973fb2dd35a2ff45c3f0cc0801e555051e4a2690acae3abc6d38b22e2d723e2fd11f1e982b24ae3ab4b4ed13b939437f67a0a601c3b8553b356b16eaaeee105afa9246eca5d88517ca4e0b399c79db9c206b2dbd171a03105b066cb4cb99bc7ef556ba04e0fdc706a8a572fb976ab9ed9ef60c98619b05e25492856b56e2a754bc16b6b8a0f46c46baad4ebacdedf2cf88ceab1aad1c3a67553b3158fbc02d0224d1d5e8faf155426ab8cbb726f26633729ef6cee0460b24a9250ccd6d4989a7b47c1eb9b558dbe77ae70ea18ed6e2ff8bce6f1f65c6103496755cc43630a60225edc5159fc694185b2aa7861ee8d144837f2b588173653dbc2fc34a63002fde32dafedddd5a8c38fe60a60651e51704fd5e389b90207907604cee360cd9d0500d45c515069ac33ee1828bbd56e323de8ac79e7b0918e4d300945ce4322e2b1d5f4b0c744c4837327b0164f2cb8afe6f18bb9c206b0df72af1fe64e0460b51e9859d4fde6828a65ac786feec5f7702a295b630a364fd7c2fc7a9c5971120ab643e97e881723e261b9c20670a1e5faa686024cd04b3a2a8ed20a66e8b83ef7a27bd2a082cdb657f87d74a031c5029e5d706fcde3965c614bdaa9d63737751eac6a2f35007acaed99f2730515cc107129227e3ef76217b05f2d1e9e5f47320ad83c1a538ce9a70aeeaf793c3c57d892dad6081ee44e0460bdeeeba83caecf24af5826be1a111f8a8817e45ee012ead79bd2ba0a206fa730a3dfc10a5358b37d4a52f0cfaa3d16c7b4dbd2797046120a80e97b7f470532dfb8b0efeef16d714f44bcb51a8d1abb82d84bae7d2177023029e974ddb6d0986251a55923cfe70a5ad29ecd7b0136db7ea622797275dcf745c4db22e2eb0595cf2c223e5f35c8fe4d55693d79c519ae76920a6a0a699481325d0f98f338b4ae8425b5257f48e3d9b98296d4d669696605c006f9784745f2aee4d86faf1a613f14113f5bf5dcfd6cb51e6bbf6a783da4e53aab72bcf6faef5ec16818309c63050fb83319cf5852db3e4ff5f8da407b2176b959120a80ed707d4785f2a9dcc91394f63a6a50c1e6c88d4ccd8c38338092b553bf9a2b64496d530e0f255901d83c8fcb542ad7e60a9898b349c5044cdf6e9295b32dcee40a828cd2b55363afcf3bdb704d49280036d8ed1d95caedb99327e48723e27511f15b556565da044cdf4e66a3f1fac3a69e7b9655d2701f734ae95ec7fd2e0905c006bb3a53b96c8274ed858a0936432e39ceccc81403291d9d1a53d3c8947b1c600b3c2a53b99ccb15300169a624eb2c60dae67b4d7d3af3fd73601a14032959a337e626f03b2debb7c69e5e08c08a9ccb543297e70a58b37484ca03184c5bc91e7752473394d20c9263cd6e68bbdfadf505d8325d95cc947bd06ea852b87fb89a36315685080c27b76eea50c7080349f7266c8b316736345defa2b5be00dba72b39c55b7327af49ba9f881e6d98b663058da9b313efc461b3948c86ce46ec8cdb6bb8d685dc49006ca6eb3295cd337305ac415a5159d80bd355b2a1aa074d86543a3a35c6daa9b63553ea2a802df78e8e0ae7277327afc15eadb23cd4ab0d93b51311a70b1e6c4d816248670aeeb9839152f23765153cb00500c0f67b7d47a5f3c2dcc92b56af282fe60e06d666b7609adfc588389e2b087ad829684ccd461a9d8a96a98663ee7105c0441ccf543c53aa0cd2691cc034b5edbd530f092818daf982fbee7084d1a2fd8e698663add30260625ed251f9dc953b7985ea0f6907b98381952b9de637d608014757699af4314645d3c6d461b536708c6b013051fb990a68dd7622e2edc9c398b553303da732df2587d53a93a14708a02d19447aff8d71ef4db1de0460c51e96a984d63ded2f9d9638e6de21c0626e28c8ae66648a31e4a6aecf63e80428a7abb5827fe13e07200af6edf83bb90246a44105d3d694dd2c8d03eba61841699af4a1a789b7ddf367ad9b0238daba16f43e3f77f248f693a91c673d94c1a41c2b78a0bd38d2542b2849933e1b619a78d3f4d675cfe6006002ded25119adaba2a837a6eecd1d0cac54bad1f6aa1e66210ad6ffce63c8297869275f3d869e5208c006ca4dfbbb3e57c0080e92d7a0971ba6a12b55f43c0e34a61851699af4216735b4edaf762177220047c7b98e8ae90db99307766bf2c0762a7702b0123b051bf7ceac776444b90ec0790c39bba26de3601d7d007c93ae6c499772270f6837b9f699dc09c04aec168c4c694c31a63e8928866aecb4edaf76983b1180a3e7a111f1a98e0aea74ae8081a46b3334a860fd760bf7fb1972cd0aa4ce16dc83b301d73475ad15b4792f008d5ed451797c3277f200f692de47eb3060fd760ad7ace8fc604cc70aeec121efc3dd96d1a9a1d3b003b065aec854542fc815b0a4746ebc1e4058af9dc29129e9d11953e954bfc381eec374ea793d8cc202d0e981d548545b457257ae8025ec34f4060e356d03e8af74644a9633c6d6b4f753530c5567b425be38b0792f00259e95a9b07e3057c082d20a53663f589fd2c6d4450f988cac74aadf5023476996d979e83800a0974f74545ae773272fe842721d6ba7603d4aa7f90d35bd0ada9466961cea5e3cd1718d21d3b0037004e4f6f9b82257404f27924a533a5a588fbdc291a98381374d8526b716dc8bb381a6faedb6dcfb87559d3844830d8023a66b2dd5bb7227f7946e14ea410d56af7464ca3a1256a174aadf10d3c3bb925098ea07c0c2723d8343ada54aa774189d82d54bb72c688b431d1eac48c948e950d925db36ef9d997e0ec0b2eeeba864865a4b95f6889fc89d000c6aaf7064eaa2c6142b929b763e8f21b6d6686bb899d60ac0205e99a9ccaecd1550a05e9ed12958adfd8287d6996c7eac58ee7e9cdf93cbeabaff87da20180046cdf897f68aabc060759e5b38cdef60a06955502237dd7c3650e7dbf18efbff8c7b1e8021dd94a9d8cee50ae8502fe7dedcc1c060bad2437bb0645d4a13510c91d5afad313544630d00eee752a672bb32574083334919436dca0874bba121b366535cd09862c5d20dde9b62d9fda0729b560fb12e0b00eee715990aee2b117159ae90445a86c5bf30be92cc6933c961588392443e18e6c400001a5e4944415414436ce09b76e6d543463f00467547a6a27b71ae809ab4e21c627131d06ea75a33957b603d18600400faeada07aa7e6f2edbf1966e22af1e0260a5ae2ba8f05e912ba4924e37d22b08e3d92d9ce2e76f917529c936b96c437fafa3eca1f6b30280acdc948c4b11f1c84c19e9a2e383ccf1c072ce163cac5e1c68a13ff4b55f906d72d9e428b9bdd6ac9b0260a57253ff3e14110fea383fadd45464308e63d59aa93fcdfccdead4609d4a464f97250905009393abfcfe59cb79e9e8d4100b8c81fb2b493f7d508d5e2dbb2e059691bb4f979dead7b5af95755300ac4d6eeadf2c22ded3705e3af568d98a12b8bfddccf4a679e899679d760a36f15df61eedea58b06e0a80b5bba6e081adbec07db7619ebc9e71184e6e7f9d7a9cc9150623cbed39b5ec06bbb9b559d60c023009bf99a9106fab1d9b569e36f28561958c1cff5aae1058915c228a656630ec644669edb306c0647c4f447c345329de53556e69e5a9771086b11f116f2f684ccdaa6c67b06eb97da796ad1fba1a53d64d013039d7173cc4bd22f9ef0bb94281224d9d15691c5623c41a534cc189ccfdba6cfd7043a63165dd14009374bca051550fd32d60793714269ff0f7c694e43a0096b95f731b042f3bf20500a3babae0c16e56a56a968c029653da8971418f3c13b2d771af1e2ed998dacbec69b54cd900b032b9241533d9c560293b1171bae0efecd0143f26e65866746ad9a97e5d192e972d1b0056e61111f1eb9907bdb746c4a3720501f753da989a2d99210dc6d0357ab4ec3ddb9594c506f2006ca4dcc3de9d11f11db94280ff6fb7e0817456f5c4d7f77f8329c865f55b265944d7e6bd33eba600d85425fbe15c932b0488a81a48258da999f5894c506e83dd65d298e71a6aa7720500c094a5a9d29be23db942e088cbf5becfe3acc6141375b6e0de5d446ef3de45cb0580c9c855a2f3784eae2038a24a37eb5d66ba148c299788e270898e805323950b0093b05bb0d7c83c3e16118fc9150847c85ee1fe52b32517f2c3984aea81453b0272d3caad230460e39d482ab7cf143c183e3457281c01cfedb15ecafa10a62cad07d25874edd45ea6a1e6ef0280ad90ee077222223e95a95ccf45c4e5b982614bed44c4cd058da879e88167ca726bff0e16dc276d27d3983ac81500009b20ad48e7eb3b5e54f090f89bb9c2610bedf698e27751638a0d90bb9f174d65deb579affda600d81ae9dcf6faf48be3050f8ca73bca866d935b0b528f0b0bf6eac32a75258b58a6e193ab3f8ee70a00804db0d35071a60f80250f9016dab3edf67aac959a4901cd86c8ed0b355b30fb5e6e0aa13a0380adb19f5472175a8e7b5d41a5fb8996736193ed44c40d05d9cfeab1e8f42858b5dc54bf33b9021a94ec37b5c88817004c52dae37ea2e3d84b050f92b7759c0f9b66b7e7a894297e6c92dc94bc45f74bcb35d21619f1028049da4b2ab9bb7327641618cfe352445c962b08266ca7f05e9fc761d593bfc8c327ac43fafddf148bac71ba2153a6042d006c9574cf9192351f8f8c882f1454c45f89882b7285c1c4cca7f7bdbde01e9fc7a1297e6ca0d399fb7a91a97eb97553f69b0260ebd4d784dcdb631ac67eb55e2af7a0792922aeca150613b1d3737a9f074436556e03df598ffa606e2f33d5af6d7d2e006cac34b353dfcd159f515021cf433627a66caf1a91caadfba887bda5d854251d078b4cf5ebfafb69ca1e0b001b2f5d1fd2958ca2cd3511f1b98287cf79c0d4ecf4ccde7760ad141b2eb736f062ae80063767cad4980260eba4a353f7e64ee87075416f673d6eca15082b705d44dc5e70bfd6e340438a0d976e93d1748ff76dfce432059a160bc0564ab33b2dd22359f7f0c24415f37899e952ac519fe9aab36aed87fb956d901b8ded3b3d3bb7d97549a22300d848f50a70911ec936270b1e4eeb7165ae4018d0add5bd5f9250a5fe40d877713e4c51eefbf9c20223b05d8da98b03d62d003029e974bfc3dc093dbda2608e7e3dde25bd3a237b5c44bcaee05eacc72229a361aa7253fd660b8cc25a3705c09195ee1332c683e3330ba696a4f1e4887870ae60e8e14955eafedcbd378f3fae7ae94f2ed0530f5355b24975dfa97e5da35d870b263902808db093547c17477c70dc8b88eb0b1e62ebf1f988b831573064fc403522d52759ca2c57286ca8dc54bfbef5c06ee66f6b8c4e3a00988c341945dfbda7167153cf518299b5552ce8b205124e9c8f8897e70a860db553b0bf5a9f3582bb99d907177a9607001be7b949e5b7ca74b67d460bbe1c111f88886b738542d5907a5644dc53706fd5e32db98261c3e5a6faf5ad034e65cad3980260aba5c928d6312de39a88b8ade041b71e3f9e2b9423edc66aaa68ee3eaac71b23e2f9b98261c3e512515cc8159038dd51d661b51f15006cb5341945dfca7448af8c883f2c78f09d45c4ff89888f5729af61eea70aee9d34bebac0e27bd844bb05a3537db2faa5d3c5d39084028023e187275801de59f0105c8fd745c4f7e60a656b3dad60817d5bdc10114fc85d00b6c499ccdfc3b15c01357b99c659dfa41600b091d2d1a92934a6e64ef75c5f35ab2a778e8efd88784fc17d91c67d11f18e2aeb1f1c255d89280e7a34807632dfcfeb9ce900002b95f6ea4f71dad38b0b1e90ebf15b11714b443c3257301be93155f6bddcb4a5b6b8b7672f3c6c835c56bf839e1bee1ecffc9df91b03e0c84847a8a65a09be2822ee2a78584ea3cf5a00a6e961d5e7f8ca05462cebf181887841cf8746d81627327f1f7db2fae536ef9d6a3d0200833b9eec1bb20999989e58f0e09cc65db942999c7923aa6fe6c7a6b82722ae8a8807e72e0a5bac6bed549fa97eb92414ebc8120b006b934effd8949efb1fa8d6bfdc57f0305d8ff746c4933d584fd6a3aa0c648b64e96b8a7b22e2ba88b83c7761d8726feff83be9b389fb4e2645fa45fb4d0170d49c4d2ac34d6950cdfd838287eaa6b8a46135398bae876a8a0f5559ff80fc5aa7d2112549280020b19bf45a9ecd9d3051fb117147447ca5e0413b8dbb23e225d5743056eb646d4ddc670a3eab92787d445caba10cdfa46bbdd3851e53fdd2f5b6694c29432c00ac44bda7b1b48772ca1ebf60a36a1eaf8e8867e42ec2524e568df85b0a3e8fd2b83d229e534d1704eeef775afe76fa4cf53bd6313a75b821eb6f016050e9a2e27b73276c88cbaa3533970a1ec4dbe2be88787f35f2e5217d394fad1a3cb388f860c1efbe24be10116f9d687a7f989aaebfa5d28eb4fd4c39fe160138b20e6b15e2a64ef76b73c5806b72ce45c44f46c433731725aead8d42dd5b2585c8fd7e4be37cb5f7d4e3722f028888885774fc3df5491ed1951df0b0473900b0357622e2b911f11bd548cca92dae10f723e253050feba57177d5c07a59443c2277f12df7a0887842b5e9f2e905f708cbc5f988785595d511e8a7ad53e9777327567622e2e6646b8d7a9ce9b1fe0a00b64a9af1e9286cc07863447cbee001be4f7c2122fea44a3d7f53443ca46ac06d5b8aeef97e50d746c45baa06e5bd4b4eab6c8bb755a35ba610c172bafe3e5f9e3bb9d2956a7db6815961016030e9f48da3f2f07a59443c2b223e59f060bf6cfcb788f8b1094d15bcbc6a143dacfa3d5c5b7b6d2fab1a49ffb6b6dee952447c7c8446681af37555b7576bdf80e59dcbfcdd95ea2a63dba68903402f477184aaeeb2aa21712e223e5bf0d03f44bcb9367dedca5ae36659df5bf5125f5935e04e44c40f56190b67d554bcb726afe52f0a5eef98f1f9daa81e30bcb6297a37e74eacec56c7b6fd0d1b990236d6b7e40e8002c7aaf553c722e223d5e8d451ef69bc3e229e54fd4e56bd1ee020221e10111f8888efa846869e1811bf18110faf5ecf6323e2cf22e2cf23e23b23e26f546b8a7eaf6a486d8adf8b88771ea11151588777776cfff0a311f1a6967f9bdbad3a3cdabe0bff688bd7dc024091fa3e22db922a7d287bd5284fd72698a23cce47c46baad4e9c0f8babebbeec99d5ce92ae3f008ce680080fb492b483d8dcdbeb31afdb9aa6a14bc3b223e57d08838eaf1a6dab44360752e8b88ffdaf2777957eee46a44ea868e35a667d41700f00d176a15e4c5dcc17c93c75723582f8c889716342eb639be584d0b3a59fd4e22221e9af9fd01e3e9daf3ed35b993abbfe7aebff913b90200e028a84ff73b933b98acf928d64e2d09c436c5c7aa69a1e76a9beaee47c4a372bf1860a5aecbfc2def67cedfcf9c7f710deb4b0160728e2515e4877327d0dbe5b57da85e53a51dbf6fa40d6ffbc4076aafe1f688785df5fae61b143fb34aa17e6df53eb6712f2dd8666d1bf8de5725dce97273d2d996c6bfd59802806fd84b2a492354ab754d353dee25b5c6cd101be37eb8368af41f6a9be25e5dfdef35b917066cb4ae3da7ce65ce3d51f01d63dd14b055a44d67513b11716bb5ff5454e9d28f5b43b5763bd568d05f8d88bf1211df57a54effbb558af147577b363da03afeaeead84bd55e521faff6d1028ea6931d7b4b1d46c4d3abcdb39bec561d305d7b4abdaf60ba20001c09e946be1617036cbeae4414d7759c97d6094d71c6543f00f84be9be22a77227003069a73b1a435d7b4eed54d384730d2a00a0b2d350f1764df10060da729b8fb7d92b488f3eb3c61600be59bae8d82ef7009badab31d49688a27464ca543f00489c4d2acb93b9130098acaed1a98fb49cb35325a0c835a6662de703c091b5db30bd430a5c80cd949bead7d661d6b5cf54c9f90070649d4a2a4bd3fd00365757c3a8ad31946b84cd43f657006870468509b015ce671a448f6938a764e3de59b567150090d84f16201f9aee07b0b1ba1a444d9befee1534a4e6713c0080fb313a05b01deeea680cbda1e1f863058da879980a0e002dd28c4e7a2001364f6e0d543a3ab557981e7d1611072dd70480232fed9dbc685f11808df38488f86a4783284d44b1dba33175d126ef00d02eedd13c9b3b0180c9b9a5a3417457726cd336195da13105001dd2d4baa6fb016c965b3b1a439f6b38be4f63caba2900e8904ef7bb3b77020093f2f088f8744783e8f5b563770a52aad7c38c0500c830dd0f60b3756de0fbc6e4d8d3058da879584f0b0005d205c94dfb9300304dd7641a45cfaf1d9b6673cd8575530090b1db5081ea8d04d81cafec6810dd563beee68206543daca5058002a7920ad4743f80cdf1fa4ca368ee4441034a5d00000b48b33c9dc89d00c06474ad9d9aef3975bca001550feba600a0d05e4345ba9b3b098049787947a3e82dd531fb3d36ee9d877553005028cdee772177020093d0b5e7d42c225e587590f56d4c593705003da453454cf703d80c5d53fd6e5bb03165dd1400f4b0d350999aee07307dfb11f1f59646d11f55dfefe9fad85c5ccc5d1400f86669c6a783dc0900acdd759986d1e9051a53873ad400a0bf0b49857a2a7702006b777b47c3e8ce0536ee9dd9cc1d00fa6b9aee772c7712006bd7d5304a130d9584241400b080630d952a00d37545a661f487058da73424a10080059d51a9026c9477153490fa84241400b0843495aee97e00d3d637057a571cdabc170016b7d750b9caee04305de73b1a475f2b6840a5210905002ce15452b19af601305dcf296820f5094928006049694fa774e900d3f4a8cce854dff07d0f004bda6da860cda30798a645f6946a0bc987006000c71b2ad99ddc4900acc5170b1a4a2571e0bb1e008671568f25c0463857d0502a89438987006038772715ed89dc0900acdcd5050da592389484020086235d3ac066483bbf160d9d660030a09349457b903b018095bbb1a0a154126772170200fa4953efaa6c01a6e7f3058da55c5cc85d0400e8a7295dfa7eee240056ea3d058da55c5c349d1b0086b7df50e9aa7001a6a3e97bba6fc8e8070023912e1d60da6e2b6830e542463f0018495ae99ecc9d00c0cabcb0a0b1948b63b98b00008bd98b887b938a772f7712002bf3968206535798750000233aa5e20598ac9f29683075858cad0030b20b1a540093f4d4820653571c44c44eee22002ce75b7307b0d5e6e9d2eb34a800a6e17b730774f852b56eea30772000b0b813496fe6c5dc0900accc670b46a1da427a74005881345dfa41ee040056e27c41a3a92d646a058015d869a8b04fe54e026074ffa4a0d1a43105006b763ca9842f5abc0c3009ffaea0e1d4141772050300c339d3501903b05e2f2f683835c5a1755300b05a69420ad9fd00d62fd7706a8a8b36640780d5da4b2ae3033d9b006b77a9a0f1d4141a5300b062a792caf8dedc09008ceaf9050da7a6904c0800d6209dee275d3ac0faa4b3064ae38d920901c0eaed44c4e95a857c5835b000588f4f16349e9ae2a1b9820180e1494601301d2f2a683835c56db9820180715c68a8980158bd9b0b1a4e6d0100ac89112a80f57b4844fc5941c349630a0026643f22de19115f8f882f46c47f966e17602d728da6b6b825573000309eb349c57c26770200837b7d41c3a929ac9b0280353b4c2ae78bb9130018d4c30b1a4e6df1cc5ce100acdeb7e60e60aba4eba52eb41c07c038be3f77408b3747c4b9dc4100c0788e47c4ddc9743f1b4202acd6c98291a834ac9b028009b83ba9a04fe64e006070571534a0d200002620ada0a54b0758bd3e6ba82e45c415b9020180f1ed46c487938afa78ee240046714b41636a260905004c479a2efd94f553006b755ba631655a36004cc44e43456dff2980f5bb2a22ee48be9fef888827e54e0400562b6d509dc89d00c0ca3c2422f6abff050026e64cd2983aa8d65401000090716fd2a092dd0f000006f2adb903d83a87b903000000f8c65aa9fae8d461354f1f0000808c74efa9bb7327000000e54cf9db5e3b0d7b4d7da9e5580000006a8e37a44b3f9e3b0900002867846a7bed35fcec62c3cf00000048dcddb0ff14000030202354db69af61f35efb4f0100c0c034a8b653536a74d3fd0000000aa4e9d20f1b32fe010000d020cdee67fd1400008cc094bfed73ace167a71a7e0600002c49836afb583f050000b0a074badf61ee040000603146a8b68bcd7c0100608534a8b6cbf1869fd97f0a000046a241b55d8c500100002c60b761fdd4acfa39000030022354dba3a9e1f43e7b500100c07834a8b6c789869f694c0100c08834a8b6c74ec3cfce34fc0c0000809a3deba7000060f58c506d87fd869f593f05000023d3a0da0e3fdcf033e9d20100000a98ee070000b080b6fda7000000c838d3d098ba903b090000589e35549baf696a9f06150000ac8006d566db8d887fd8f073d9fd000000324e364cf793dd0f000056c408d5f639cc1d00000070d4ed44c4bd0d23542773270200001c75fbd2a50300c07a99f2070000c09173b7fda7000000fadb6b99eeb79f3b110000188e297f9b692777000000303e0daacdd43412f5257b5001000074db6d99ee772c77220000302c23549b67b7e5e736f405008015d3a0da3c1a4e0000004b382b5d3a0000acdfb7e40e60b2f6abf4e91735a80000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000b6d7ff0398b953a8b068c7790000000049454e44ae426082, 0x73747564656e745f69642f5f563941303331345f313632363039373137335f313632363636313238335f313632363636323038312e4a5047, '1234', '2021-07-19', '2021-07-19');
INSERT INTO `student` (`Student_id`, `course_id`, `reg_id`, `title`, `last_name`, `first_name`, `middle_name`, `suffix`, `house_block_lot_num`, `street`, `prk_vill_sub`, `brgy`, `city`, `province`, `zip_code`, `nationality`, `civil_status`, `religion`, `sex`, `phone_number`, `birth_date`, `birth_place`, `email_add`, `section`, `year_level`, `prev_gwa`, `units_enrolled`, `cor`, `type`, `student_status`, `account_status`, `e_signature`, `pic`, `password`, `date_submitted`, `date_verified`) VALUES
('2018-00002', 7, 16, NULL, 'Pineza', 'Dina', 'Lirazan', '', '', 'Something St.', 'Prk. Something', 'Brgy. Something', 'Something City', 'City Province', '8100', 'Filipino', 'Single', '', 'Female', '09123456789', '1999-07-24', 'Tagum City', 'dlpineza@usep.edu.ph', '3IT1', '3rd Year', NULL, NULL, 'student_cor/certificate-of-registration-92803_1626229908_1626597052_1626678903.pdf', 'Undergraduate', 'Currently enrolled', 'Active', NULL, 0x73747564656e745f69642f64696e615f313632363637383930332e6a7067, '$2y$10$4/2TcYBYTEOTq5ffHQM9N.s3M0OlL7ZpOEI7rmNhreyH8NzARrA36', '2021-07-19', NULL),
('2018-00003', 7, 19, NULL, 'Prollo', 'Jan Andrianne', '', '', '', 'Something St.', 'Prk. Something', 'Brgy. Something', 'Something City', 'City Province', '8100', 'Filipino', 'Single', '', 'Male', '09123456789', '1999-07-24', 'Tagum City', 'jamprollo@usep.edu.ph', '3IT1', '3rd Year', NULL, NULL, 'student_cor/certificate-of-registration-92803_1626229908_1626597052_1626679332.pdf', 'Undergraduate', 'Currently enrolled', 'Active', NULL, 0x73747564656e745f69642f5f563941303331345f313632363039373137335f313632363637393333322e4a5047, '$2y$10$5zH0zu8mA0e0qaDhRihFnOZrUhXzxj2YXXP66xibuhtLhv1Ew1ure', '2021-07-19', NULL),
('2018-00159', 3, 23, NULL, 'Dawang', 'Jibb', '', '', '', 'Something St.', 'Prk. Something', 'Brgy. Something', 'Something City', 'City Province', '8100', 'Filipino', 'Single', '', 'Male', '09123456789', '1999-07-24', 'Tagum City', 'jedawang159@usep.edu.ph', '3BSNED1', '3rd Year', NULL, NULL, 'student_cor/certificate-of-registration-92803_1626229908_1626597052_1626679719.pdf', 'Undergraduate', 'Currently enrolled', 'Active', NULL, 0x73747564656e745f69642f6973746f636b70686f746f2d313037373536373938322d363132783631325f313632363233373437305f313632363637393731392e6a7067, '$2y$10$OGehkxC51EZoOhhy4FmyI.XKJE.lbC/kZEq8h28aF7kbjMcWGNBJa', '2021-07-19', NULL),
('2018-00161', 7, 20, NULL, 'Dela Cruz', 'Allayssa George', '', '', '', 'Something St.', 'Prk. Something', 'Brgy. Something', 'Something City', 'City Province', '8100', 'Filipino', 'Single', '', 'Male', '09123456789', '1999-07-24', 'Tagum City', 'agadelacruz@usep.edu.ph', '3IT1', '3rd Year', NULL, NULL, 'student_cor/certificate-of-registration-92803_1626229908_1626597052_1626679492.pdf', 'Undergraduate', 'Currently enrolled', 'Active', NULL, 0x73747564656e745f69642f434a424e363836315f313632363232393930385f313632363637393439322e6a7067, '$2y$10$zR2WZwp/HysGydSuZxVx9OOZu0MlVe11NOPf4AxtF4emS/11jL206', '2021-07-19', NULL),
('2018-00234', 7, 22, NULL, 'MuÃ±ez', 'Darlen Rose', '', '', '', 'Something St.', 'Prk. Something', 'Brgy. Something', 'Something City', 'City Province', '8100', 'Filipino', 'Single', '', 'Male', '09123456789', '1999-07-24', 'Tagum City', 'drsmunez@usep.edu.ph', '3IT1', '3rd Year', NULL, NULL, 'student_cor/certificate-of-registration-92803_1626229908_1626597052_1626679595.pdf', 'Undergraduate', 'Currently enrolled', 'Active', NULL, 0x73747564656e745f69642f6973746f636b70686f746f2d313037373536373938322d363132783631325f313632363233373437305f313632363637393539352e6a7067, '$2y$10$jtfkpYh2e5JHqB.t12LGveWSRuJpUG25jdCI9hs.TTXsBNFKe0T0e', '2021-07-19', NULL),
('2021-00001', 7, 24, NULL, 'Potter', 'Harry', '', '', '', 'C St', 'Prk. C', 'Brgy. C', 'C City', 'C Province', '8100', 'Filipino', 'Single', '', 'Female', '09123452142', '1999-12-25', 'C City', 'jdmbonza@usep.edu.ph', '1IT1', '1st Year', NULL, 0, '', 'Undergraduate', 'Currently enrolled', 'Active', NULL, '', '1234', '2021-07-24', '2021-08-05'),
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
,`Date_of_incident` date
,`Time_of_incident` time
,`Loc_of_incident` varchar(50)
,`Person_Complained` varchar(50)
,`Designation_Complained` varchar(50)
,`Complaint_Detail` varchar(500)
,`Witness1` varchar(50)
,`Witness2` varchar(50)
,`Witness3` varchar(50)
,`Status` varchar(50)
,`response_id` int(11)
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
,`notification_status` int(1)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `viewresponse`
-- (See below for the actual view)
--
CREATE TABLE `viewresponse` (
`student_id` varchar(10)
,`Complaint_ID` int(11)
,`last_name` varchar(50)
,`first_name` varchar(50)
,`middle_name` varchar(50)
,`fullname` varchar(150)
,`Date_Submitted` date
,`Date_of_incident` date
,`Time_of_incident` time
,`Loc_of_incident` varchar(50)
,`Person_Complained` varchar(50)
,`Designation_Complained` varchar(50)
,`Complaint_Detail` varchar(500)
,`Witness1` varchar(50)
,`Witness2` varchar(50)
,`Witness3` varchar(50)
,`Status` varchar(50)
,`response_id` int(11)
,`schedule_date` date
,`time_from` time
,`time_to` time
,`time_schedule` varchar(21)
,`meeting_type` varchar(45)
,`meeting_link` varchar(150)
,`meeting_id` varchar(45)
,`passcode` varchar(45)
,`action_taken` varchar(45)
,`response_status` varchar(45)
,`defendant` varchar(145)
,`response_details` varchar(45)
,`notification_status` int(1)
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

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `login_credentials`  AS  select `studentdetails`.`student_id` AS `username`,`studentdetails`.`fullname` AS `name`,`studentdetails`.`password` AS `password`,'Student' AS `usertype`,`studentdetails`.`pic` AS `userpic`,`studentdetails`.`school_org` AS `student_org`,`studentdetails`.`position` AS `student_position`,NULL AS `scholarship_status`,NULL AS `staff_office`,NULL AS `staff_position`,`studentdetails`.`verified_status` AS `verified_status`,`studentdetails`.`account_status` AS `account_status` from `studentdetails` union select `staffdetails`.`staff_id` AS `username`,`staffdetails`.`fullname` AS `name`,`staffdetails`.`password` AS `password`,`staffdetails`.`type` AS `usertype`,`staffdetails`.`pic` AS `userpic`,NULL AS `student_org`,NULL AS `student_position`,NULL AS `sscholarship_status`,`staffdetails`.`office_name` AS `staff_office`,`staffdetails`.`position` AS `staff_position`,`staffdetails`.`verified_status` AS `verified_status`,`staffdetails`.`account_status` AS `account_status` from `staffdetails` union select `superadmin`.`username` AS `username`,'' AS `name`,`superadmin`.`password` AS `password`,'SUPERADMIN' AS `usertype`,'' AS `userpic`,'' AS `student_org`,'' AS `student_position`,'' AS `sscholarship_status`,'' AS `staff_office`,'' AS `staff_position`,'' AS `verified_status`,'' AS `account_status` from `superadmin` ;

-- --------------------------------------------------------

--
-- Structure for view `promotional_report`
--
DROP TABLE IF EXISTS `promotional_report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `promotional_report`  AS  select `el`.`id` AS `id`,`el`.`Student_id` AS `student_id`,`s`.`last_name` AS `last_name`,`s`.`first_name` AS `first_name`,`s`.`middle_name` AS `middle_name`,`s`.`suffix` AS `suffix`,`s`.`sex` AS `sex`,date_format(`s`.`birth_date`,'%m/%d/%Y') AS `birthdate`,`SF_GET_COURSE_NAME`(`s`.`course_id`) AS `course`,`el`.`student_yearlevel` AS `student_yearlevel`,`el`.`subject_code1` AS `subject_code1`,`el`.`units1` AS `units1`,`el`.`grade1` AS `grade1`,`el`.`subject_code2` AS `subject_code2`,`el`.`units2` AS `units2`,`el`.`grade2` AS `grade2`,`el`.`subject_code3` AS `subject_code3`,`el`.`units3` AS `units3`,`el`.`grade3` AS `grade3`,`el`.`subject_code4` AS `subject_code4`,`el`.`units4` AS `units4`,`el`.`grade4` AS `grade4`,`el`.`subject_code5` AS `subject_code5`,`el`.`units5` AS `units5`,`el`.`grade5` AS `grade5`,`el`.`subject_code6` AS `subject_code6`,`el`.`units6` AS `units6`,`el`.`grade6` AS `grade6`,`el`.`subject_code7` AS `subject_code7`,`el`.`units7` AS `units7`,`el`.`grade7` AS `grade7`,`el`.`subject_code8` AS `subject_code8`,`el`.`units8` AS `units8`,`el`.`grade8` AS `grade8`,`el`.`subject_code9` AS `subject_code9`,`el`.`units9` AS `units9`,`el`.`grade9` AS `grade9`,if(`el`.`units1` is null,0,`el`.`units1`) + if(`el`.`units2` is null,0,`el`.`units2`) + if(`el`.`units3` is null,0,`el`.`units3`) + if(`el`.`units4` is null,0,`el`.`units4`) + if(`el`.`units5` is null,0,`el`.`units5`) + if(`el`.`units6` is null,0,`el`.`units6`) + if(`el`.`units7` is null,0,`el`.`units7`) + if(`el`.`units8` is null,0,`el`.`units8`) + if(`el`.`units9` is null,0,`el`.`units9`) AS `totalunits`,'' AS `gwa`,if(`s`.`type` = 'Graduate','Yes','No') AS `graduate_question` from (`enrollment_list` `el` join `student` `s` on(`s`.`Student_id` = `el`.`Student_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `scholarship_general_info`
--
DROP TABLE IF EXISTS `scholarship_general_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `scholarship_general_info`  AS  select `g`.`Student_id` AS `student_id`,`s`.`last_name` AS `last_name`,`s`.`first_name` AS `first_name`,`s`.`middle_name` AS `middle_name`,`s`.`suffix` AS `suffix`,`g`.`semester_year` AS `semester_year`,`s`.`course_id` AS `course_id`,`s`.`year_level` AS `year_level`,`SF_GET_COURSE_NAME`(`s`.`course_id`) AS `coursename`,`SF_GET_DATA_FROM_COURSE_BY_ID`('college_id',`s`.`course_id`) AS `college_id`,`SF_GET_DATA_FROM_COLLEGE_BY_ID`('title',`SF_GET_DATA_FROM_COURSE_BY_ID`('college_id',`s`.`course_id`)) AS `college_name`,`sp`.`program_id` AS `program_id`,`sp`.`program_name` AS `program_name`,`sp`.`program_provider` AS `program_provider`,`SF_GET_SCHOLARSHIP_STATUS`(`sp`.`program_status`) AS `program_status`,`SF_GET_TYPE_OF_SCHOLARSHIP`(`sp`.`type`) AS `program_type`,`sp`.`amount` AS `amount`,`g`.`card` AS `card`,`g`.`student_status` AS `student_status`,`SF_GET_STUDENT_STATUS`(`g`.`student_status`) AS `status_name`,if(`g`.`card` is null,'Not yet released','Released') AS `card_status`,if(`g`.`status_billing` is null,'-',`g`.`status_billing`) AS `billing_status`,if(`g`.`status_payroll` is null,'-',`g`.`status_payroll`) AS `payroll_status`,if(`g`.`status_liquidation` is null,'-',`g`.`status_liquidation`) AS `liquidation_status`,if(`g`.`status_allowance` is null,'-',`g`.`status_allowance`) AS `allowance_status` from ((`grantee_history` `g` join `student` `s` on(`s`.`Student_id` = `g`.`Student_id`)) join `scholarship_program` `sp` on(`sp`.`program_id` = `g`.`program_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `staffdetails`
--
DROP TABLE IF EXISTS `staffdetails`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `staffdetails`  AS  select `s`.`staff_id` AS `staff_id`,`s`.`title` AS `title`,`s`.`last_name` AS `last_name`,`s`.`first_name` AS `first_name`,`s`.`middle_name` AS `middle_name`,`s`.`suffix` AS `suffix`,`s`.`extension` AS `extension`,`FULLNAME`(`s`.`first_name`,`s`.`middle_name`,`s`.`last_name`,`s`.`title`,`s`.`suffix`,`s`.`extension`,'with_extensions') AS `fullname`,`s`.`sex` AS `sex`,`s`.`civil_status` AS `civil_status`,`s`.`birthdate` AS `birthdate`,`SF_GET_AGE`(`s`.`birthdate`) AS `age`,`s`.`email_add` AS `email_add`,`s`.`phone_num` AS `phone_num`,`s`.`employment_status` AS `employment_status`,`s`.`account_status` AS `account_status`,`s`.`e_signature` AS `e_signature`,`s`.`pic` AS `pic`,`s`.`date_submitted` AS `date_submitted`,`s`.`date_verified` AS `date_verified`,if(`s`.`date_verified` is null,'Not Verified','Verified') AS `verified_status`,`s`.`password` AS `password`,`s`.`office_id` AS `office_id`,`o`.`office_name` AS `office_name`,`s`.`dept_id` AS `dept_id`,`d`.`dept_name` AS `dept_name`,`s`.`type` AS `type`,`s`.`position` AS `position` from ((`staff` `s` left join `office` `o` on(`o`.`office_id` = `s`.`office_id`)) left join `department` `d` on(`d`.`dept_id` = `s`.`dept_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `studentdetails`
--
DROP TABLE IF EXISTS `studentdetails`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `studentdetails`  AS  select `s`.`Student_id` AS `student_id`,`s`.`reg_id` AS `reg_id`,`c`.`title` AS `coursetitle`,`c`.`name` AS `coursename`,`SF_GET_DATA_FROM_COLLEGE_BY_ID`('title',`SF_GET_DATA_FROM_COURSE_BY_ID`('college_id',`c`.`course_id`)) AS `college`,`s`.`title` AS `title`,`s`.`last_name` AS `last_name`,`s`.`first_name` AS `first_name`,`s`.`middle_name` AS `middle_name`,`s`.`suffix` AS `suffix`,`FULLNAME`(`s`.`first_name`,`s`.`middle_name`,`s`.`last_name`,`s`.`title`,`s`.`suffix`,'','with_extensions') AS `fullname`,`s`.`house_block_lot_num` AS `house_block_lot_num`,`s`.`street` AS `street`,`s`.`prk_vill_sub` AS `prk_vill_sub`,`s`.`brgy` AS `brgy`,`s`.`city` AS `city`,`s`.`province` AS `province`,`SF_GET_FULL_ADDRESS`(`s`.`house_block_lot_num`,`s`.`street`,`s`.`prk_vill_sub`,`s`.`brgy`,`s`.`city`,`s`.`province`) AS `full_address`,`s`.`zip_code` AS `zip_code`,`s`.`nationality` AS `nationality`,`s`.`civil_status` AS `civil_status`,`s`.`religion` AS `religion`,`s`.`sex` AS `sex`,`s`.`phone_number` AS `phone_number`,`s`.`birth_date` AS `birth_date`,`SF_GET_AGE`(`s`.`birth_date`) AS `age`,`s`.`birth_place` AS `birth_place`,`s`.`email_add` AS `email_add`,`s`.`section` AS `section`,`s`.`year_level` AS `year_level`,`s`.`prev_gwa` AS `prev_gwa`,`s`.`units_enrolled` AS `units_enrolled`,`s`.`type` AS `type`,`s`.`student_status` AS `student_status`,`s`.`account_status` AS `account_status`,`s`.`cor` AS `cor`,`s`.`e_signature` AS `e_signature`,`s`.`pic` AS `pic`,`s`.`password` AS `password`,`s`.`date_submitted` AS `date_submitted`,`s`.`date_verified` AS `date_verified`,if(`s`.`date_verified` is null,'Not Verified','Verified') AS `verified_status`,`e`.`father_name` AS `father_name`,`e`.`father_occupation` AS `father_occupation`,`e`.`father_contact` AS `father_contact`,`e`.`mother_name` AS `mother_name`,`e`.`mother_occupation` AS `mother_occupation`,`e`.`mother_contact` AS `mother_contact`,`e`.`living_with` AS `living_with`,`e`.`guardian_name` AS `guardian_name`,`e`.`guardian_contact` AS `guardian_contact`,`e`.`spouse_name` AS `spouse_name`,`e`.`spouse_occupation` AS `spouse_occupation`,`SF_GET_DATA_FROM_SCHOOL_ORG_BY_ID`('org_name',`SF_GET_ORG_WHERE_STUDENT_IS_GOVERNOR_PRESIDENT`(`s`.`Student_id`)) AS `school_org`,`SF_GET_STUDENT_POSITION_IN_ORG`(`SF_GET_ORG_WHERE_STUDENT_IS_GOVERNOR_PRESIDENT`(`s`.`Student_id`),`s`.`Student_id`) AS `position` from ((`student` `s` left join `emergency_contact` `e` on(`e`.`Student_id` = `s`.`Student_id`)) left join `course` `c` on(`c`.`course_id` = `s`.`course_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `student_grades`
--
DROP TABLE IF EXISTS `student_grades`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `student_grades`  AS  select `e`.`id` AS `id`,`e`.`Student_id` AS `student_id`,`e`.`schoolyear` AS `schoolyear`,`SF_GET_SEMESTER_NAME`(`e`.`semester`) AS `semester_name`,`SF_GET_YEAR`(`e`.`student_yearlevel`) AS `yearlevel`,`e`.`subject_code1` AS `subcode`,`SF_GET_DATA_FROM_SUBJECT_BY_ID`('subject_description',`e`.`subject_code1`) AS `subdesc`,`SF_GET_DATA_FROM_SUBJECT_BY_ID`('units',`e`.`subject_code1`) AS `units`,`e`.`grade1` AS `grade` from `enrollment_list` `e` where `e`.`subject_code1` is not null union select `e`.`id` AS `id`,`e`.`Student_id` AS `student_id`,`e`.`schoolyear` AS `schoolyear`,`SF_GET_SEMESTER_NAME`(`e`.`semester`) AS `semester_name`,`SF_GET_YEAR`(`e`.`student_yearlevel`) AS `yearlevel`,`e`.`subject_code2` AS `subcode`,`SF_GET_DATA_FROM_SUBJECT_BY_ID`('subject_description',`e`.`subject_code2`) AS `subdesc`,`SF_GET_DATA_FROM_SUBJECT_BY_ID`('units',`e`.`subject_code2`) AS `units`,`e`.`grade2` AS `grade` from `enrollment_list` `e` where `e`.`subject_code2` is not null union select `e`.`id` AS `id`,`e`.`Student_id` AS `student_id`,`e`.`schoolyear` AS `schoolyear`,`SF_GET_SEMESTER_NAME`(`e`.`semester`) AS `semester_name`,`SF_GET_YEAR`(`e`.`student_yearlevel`) AS `yearlevel`,`e`.`subject_code3` AS `subcode`,`SF_GET_DATA_FROM_SUBJECT_BY_ID`('subject_description',`e`.`subject_code3`) AS `subdesc`,`SF_GET_DATA_FROM_SUBJECT_BY_ID`('units',`e`.`subject_code3`) AS `units`,`e`.`grade3` AS `grade` from `enrollment_list` `e` where `e`.`subject_code3` is not null union select `e`.`id` AS `id`,`e`.`Student_id` AS `student_id`,`e`.`schoolyear` AS `schoolyear`,`SF_GET_SEMESTER_NAME`(`e`.`semester`) AS `semester_name`,`SF_GET_YEAR`(`e`.`student_yearlevel`) AS `yearlevel`,`e`.`subject_code4` AS `subcode`,`SF_GET_DATA_FROM_SUBJECT_BY_ID`('subject_description',`e`.`subject_code4`) AS `subdesc`,`SF_GET_DATA_FROM_SUBJECT_BY_ID`('units',`e`.`subject_code4`) AS `units`,`e`.`grade4` AS `grade` from `enrollment_list` `e` where `e`.`subject_code4` is not null union select `e`.`id` AS `id`,`e`.`Student_id` AS `student_id`,`e`.`schoolyear` AS `schoolyear`,`SF_GET_SEMESTER_NAME`(`e`.`semester`) AS `semester_name`,`SF_GET_YEAR`(`e`.`student_yearlevel`) AS `yearlevel`,`e`.`subject_code5` AS `subcode`,`SF_GET_DATA_FROM_SUBJECT_BY_ID`('subject_description',`e`.`subject_code5`) AS `subdesc`,`SF_GET_DATA_FROM_SUBJECT_BY_ID`('units',`e`.`subject_code5`) AS `units`,`e`.`grade5` AS `grade` from `enrollment_list` `e` where `e`.`subject_code5` is not null union select `e`.`id` AS `id`,`e`.`Student_id` AS `student_id`,`e`.`schoolyear` AS `schoolyear`,`SF_GET_SEMESTER_NAME`(`e`.`semester`) AS `semester_name`,`SF_GET_YEAR`(`e`.`student_yearlevel`) AS `yearlevel`,`e`.`subject_code6` AS `subcode`,`SF_GET_DATA_FROM_SUBJECT_BY_ID`('subject_description',`e`.`subject_code6`) AS `subdesc`,`SF_GET_DATA_FROM_SUBJECT_BY_ID`('units',`e`.`subject_code6`) AS `units`,`e`.`grade6` AS `grade` from `enrollment_list` `e` where `e`.`subject_code6` is not null union select `e`.`id` AS `id`,`e`.`Student_id` AS `student_id`,`e`.`schoolyear` AS `schoolyear`,`SF_GET_SEMESTER_NAME`(`e`.`semester`) AS `semester_name`,`SF_GET_YEAR`(`e`.`student_yearlevel`) AS `yearlevel`,`e`.`subject_code7` AS `subcode`,`SF_GET_DATA_FROM_SUBJECT_BY_ID`('subject_description',`e`.`subject_code7`) AS `subdesc`,`SF_GET_DATA_FROM_SUBJECT_BY_ID`('units',`e`.`subject_code7`) AS `units`,`e`.`grade7` AS `grade` from `enrollment_list` `e` where `e`.`subject_code7` is not null union select `e`.`id` AS `id`,`e`.`Student_id` AS `student_id`,`e`.`schoolyear` AS `schoolyear`,`SF_GET_SEMESTER_NAME`(`e`.`semester`) AS `semester_name`,`SF_GET_YEAR`(`e`.`student_yearlevel`) AS `yearlevel`,`e`.`subject_code8` AS `subcode`,`SF_GET_DATA_FROM_SUBJECT_BY_ID`('subject_description',`e`.`subject_code8`) AS `subdesc`,`SF_GET_DATA_FROM_SUBJECT_BY_ID`('units',`e`.`subject_code8`) AS `units`,`e`.`grade8` AS `grade` from `enrollment_list` `e` where `e`.`subject_code8` is not null union select `e`.`id` AS `id`,`e`.`Student_id` AS `student_id`,`e`.`schoolyear` AS `schoolyear`,`SF_GET_SEMESTER_NAME`(`e`.`semester`) AS `semester_name`,`SF_GET_YEAR`(`e`.`student_yearlevel`) AS `yearlevel`,`e`.`subject_code9` AS `subcode`,`SF_GET_DATA_FROM_SUBJECT_BY_ID`('subject_description',`e`.`subject_code9`) AS `subdesc`,`SF_GET_DATA_FROM_SUBJECT_BY_ID`('units',`e`.`subject_code9`) AS `units`,`e`.`grade9` AS `grade` from `enrollment_list` `e` where `e`.`subject_code9` is not null ;

-- --------------------------------------------------------

--
-- Structure for view `subjectlist`
--
DROP TABLE IF EXISTS `subjectlist`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `subjectlist`  AS  select `c`.`id` AS `id`,`c`.`title` AS `currriculum_name`,`c`.`course_id` AS `course_id`,`SF_GET_DATA_FROM_COURSE_BY_ID`('title',`c`.`course_id`) AS `course`,`sub`.`code` AS `code`,`sub`.`subject_description` AS `subject_description`,`sub`.`units` AS `units`,`sub`.`yearlevel` AS `yearlevel_id`,`SF_GET_YEAR`(`sub`.`yearlevel`) AS `yearlevel_name`,`sub`.`semester` AS `semester_id`,`SF_GET_SEMESTER`(`sub`.`semester`) AS `semester_name` from (`subject` `sub` join `curriculum` `c` on(`c`.`id` = `sub`.`curriculum_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `viewcomplaint`
--
DROP TABLE IF EXISTS `viewcomplaint`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewcomplaint`  AS  select `s`.`Student_id` AS `student_id`,`cm`.`Complaint_ID` AS `Complaint_ID`,`s`.`last_name` AS `last_name`,`s`.`first_name` AS `first_name`,`s`.`middle_name` AS `middle_name`,`FULLNAME`(`s`.`first_name`,`s`.`middle_name`,`s`.`last_name`,`s`.`title`,`s`.`suffix`,'','lastname_first') AS `fullname`,`cm`.`Date_Submitted` AS `Date_Submitted`,`cm`.`Date_of_incident` AS `Date_of_incident`,`cm`.`Time_of_incident` AS `Time_of_incident`,`cm`.`Loc_of_incident` AS `Loc_of_incident`,`cm`.`Person_Complained` AS `Person_Complained`,`cm`.`Designation_Complained` AS `Designation_Complained`,`cm`.`Detail` AS `Complaint_Detail`,`cm`.`Witness1` AS `Witness1`,`cm`.`Witness2` AS `Witness2`,`cm`.`Witness3` AS `Witness3`,`cm`.`Status` AS `Status`,`ss`.`response_id` AS `response_id`,`ss`.`date_schedule` AS `schedule_date`,`ss`.`time_from` AS `time_from`,`ss`.`time_to` AS `time_to`,concat(`ss`.`time_from`,'-',`ss`.`time_to`) AS `time_schedule`,`ss`.`meeting_type` AS `meeting_type`,`ss`.`meeting_link` AS `meeting_link`,`ss`.`meeting_id` AS `meeting_id`,`ss`.`passcode` AS `passcode`,`ss`.`action_taken` AS `action_taken`,`ss`.`status` AS `reponse_status`,`ss`.`defendant` AS `defendant`,`ss`.`details` AS `response_details`,`ss`.`notification_status` AS `notification_status` from ((`student` `s` join `complaint` `cm` on(`cm`.`Student_id` = `s`.`Student_id`)) left join `response` `ss` on(`ss`.`Complaint_ID` = `cm`.`Complaint_ID`)) ;

-- --------------------------------------------------------

--
-- Structure for view `viewresponse`
--
DROP TABLE IF EXISTS `viewresponse`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewresponse`  AS  select `s`.`Student_id` AS `student_id`,`cm`.`Complaint_ID` AS `Complaint_ID`,`s`.`last_name` AS `last_name`,`s`.`first_name` AS `first_name`,`s`.`middle_name` AS `middle_name`,`FULLNAME`(`s`.`first_name`,`s`.`middle_name`,`s`.`last_name`,`s`.`title`,`s`.`suffix`,'','lastname_first') AS `fullname`,`cm`.`Date_Submitted` AS `Date_Submitted`,`cm`.`Date_of_incident` AS `Date_of_incident`,`cm`.`Time_of_incident` AS `Time_of_incident`,`cm`.`Loc_of_incident` AS `Loc_of_incident`,`cm`.`Person_Complained` AS `Person_Complained`,`cm`.`Designation_Complained` AS `Designation_Complained`,`cm`.`Detail` AS `Complaint_Detail`,`cm`.`Witness1` AS `Witness1`,`cm`.`Witness2` AS `Witness2`,`cm`.`Witness3` AS `Witness3`,`cm`.`Status` AS `Status`,`ss`.`response_id` AS `response_id`,`ss`.`date_schedule` AS `schedule_date`,`ss`.`time_from` AS `time_from`,`ss`.`time_to` AS `time_to`,concat(`ss`.`time_from`,'-',`ss`.`time_to`) AS `time_schedule`,`ss`.`meeting_type` AS `meeting_type`,`ss`.`meeting_link` AS `meeting_link`,`ss`.`meeting_id` AS `meeting_id`,`ss`.`passcode` AS `passcode`,`ss`.`action_taken` AS `action_taken`,`ss`.`status` AS `response_status`,`ss`.`defendant` AS `defendant`,`ss`.`details` AS `response_details`,`ss`.`notification_status` AS `notification_status` from ((`student` `s` join `response` `ss` on(`ss`.`defendant` = `s`.`Student_id`)) join `complaint` `cm` on(`cm`.`Complaint_ID` = `ss`.`Complaint_ID`)) ;

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
-- Indexes for table `forgot_pass_requests`
--
ALTER TABLE `forgot_pass_requests`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `response`
--
ALTER TABLE `response`
  ADD PRIMARY KEY (`response_id`),
  ADD KEY `fk_response_complaint1_idx` (`Complaint_ID`);

--
-- Indexes for table `sample_student`
--
ALTER TABLE `sample_student`
  ADD PRIMARY KEY (`student_id`);

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
  MODIFY `Complaint_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- AUTO_INCREMENT for table `forgot_pass_requests`
--
ALTER TABLE `forgot_pass_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
-- AUTO_INCREMENT for table `office`
--
ALTER TABLE `office`
  MODIFY `office_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `organization_member`
--
ALTER TABLE `organization_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `response`
--
ALTER TABLE `response`
  MODIFY `response_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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
  MODIFY `org_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- Constraints for table `response`
--
ALTER TABLE `response`
  ADD CONSTRAINT `fk_response_complaint1` FOREIGN KEY (`Complaint_ID`) REFERENCES `complaint` (`Complaint_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
