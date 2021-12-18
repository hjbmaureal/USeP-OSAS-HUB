-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 16, 2021 at 09:08 AM
-- Server version: 10.4.19-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u785399874_osastagum`
--

DELIMITER $$
--
-- Procedures
--
CREATE PROCEDURE `AddComplaint` (IN `date_submitted` DATE, IN `date_of_incident` DATE, IN `time_of_incident` TIME, IN `loc_of_incident` VARCHAR(50) CHARSET utf8mb4, IN `person_complained` VARCHAR(50) CHARSET utf8mb4, IN `designation_complained` VARCHAR(50) CHARSET utf8mb4, IN `detail` VARCHAR(50) CHARSET utf8mb4, IN `witness1` VARCHAR(50) CHARSET utf8mb4, IN `witness2` VARCHAR(50) CHARSET utf8mb4, IN `witness3` VARCHAR(50) CHARSET utf8mb4, IN `status` VARCHAR(50) CHARSET utf8mb4, IN `student_id` VARCHAR(10) CHARSET utf8mb4)  BEGIN
		INSERT INTO complaint (Student_id, Date_Submitted, Date_of_incident, Time_of_incident, Loc_of_incident, Person_Complained, Designation_Complained, Detail, Witness1, Witness2, Witness3, Status ) VALUES (student_id, date_submitted, date_of_incident, time_of_incident, loc_of_incident, person_complained,designation_complained, detail,witness1, witness2, witness3,status);
        END$$

CREATE PROCEDURE `addCourse` (IN `College_id` INT, IN `Title` VARCHAR(50) CHARSET utf8mb4, IN `Name` VARCHAR(50) CHARSET utf8mb4, IN `_major` VARCHAR(150) CHARSET utf8mb4, IN `studenttype` VARCHAR(45) CHARSET utf8mb4, IN `Status` VARCHAR(50) CHARSET utf8mb4)  BEGIN
	insert into course(college_id, title, name, major, student_type, status) VALUES (College_id, Title, Name, _major, studenttype, Status);
    END$$

CREATE PROCEDURE `addMasterlistDocument` (IN `date` DATE, IN `title` VARCHAR(128) CHARSET utf8mb4, IN `number` INT(255), IN `pre_revision_date` DATE, IN `prev_revision_number` VARCHAR(255) CHARSET utf8mb4, IN `latest_revision_date` DATE, IN `latest_revision_number` INT(255), IN `softcopy` BLOB)  BEGIN

    	INSERT into scholarship_masterlist_documents (date, title, number, prev_revision_date, prev_revision_number, latest_revision_date, latest_revision_number, document_soft_copy) VALUES (date, title, number, pre_revision_date, prev_revision_number, latest_revision_date, latest_revision_number, softcopy);

END$$

CREATE PROCEDURE `addMasterlistExternalReference` (IN `date` DATE, IN `ext_ref_title` INT, IN `revision_number` INT, IN `mode_of_filing` INT, IN `custodian` INT, IN `location` INT, IN `retention_active` INT, IN `retention_archive` INT, IN `soft_copy` INT)  BEGIN

    	INSERT into scholarship_masterlist_external_reference (date, external_reference_title, revision_number, mode_of_filing, custodian, location, retention_active, retention_archive, external_reference_soft_copy) VALUES (date,ext_ref_title,revision_number,mode_of_filing,custodian,location,retention_active,
 retention_archive,soft_copy);

END$$

CREATE PROCEDURE `addMasterlistRecord` (IN `date` DATE, IN `recordTitle` VARCHAR(128) CHARSET utf8mb4, IN `recordType` VARCHAR(64) CHARSET utf8mb4, IN `recordMode` VARCHAR(64) CHARSET utf8mb4, IN `custodian` VARCHAR(128) CHARSET utf8mb4, IN `location` VARCHAR(128) CHARSET utf8mb4, IN `retentionActive` DATE, IN `retentionArchive` DATE, IN `dispositionYear` DATE, IN `dispositionMethod` VARCHAR(64) CHARSET utf8mb4, IN `recordSoftCopy` BLOB)  BEGIN

    	INSERT into scholarship_masterlist_record (date, records_title, type_of_records, mode_of_filing, custodian, location, retention_active, retention_archive, disposition_year, disposition_method, record_soft_copy) VALUES (date,recordTitle,recordType,recordMode,custodian,location,retentionActive,
 retentionArchive,dispositionYear,dispositionMethod,recordSoftCopy);

END$$

CREATE PROCEDURE `addMasterlistTransmittal` (IN `date` DATE, IN `date_time_received` DATETIME, IN `received_by` VARCHAR(64) CHARSET utf8mb4, IN `reference_number` VARCHAR(128) CHARSET utf8mb4, IN `source_origin_office` VARCHAR(128) CHARSET utf8mb4, IN `type` VARCHAR(64) CHARSET utf8mb4, IN `subject_matter` VARCHAR(255) CHARSET utf8mb4, IN `date_2` DATE, IN `action_taken` VARCHAR(255) CHARSET utf8mb4, IN `date_time_dispatch` DATETIME, IN `dispatched_by` VARCHAR(64) CHARSET utf8, IN `remarks` VARCHAR(255) CHARSET utf8mb4, IN `transmittal_soft_copy` BLOB)  BEGIN

    	INSERT into scholarship_masterlist_transmittal (date, date_time_received, received_by, reference_number, source_origin_office, type, subject_matter, date_2, action_taken, date_time_dispatch, dispatched_by, remarks, transmittal_soft_copy) VALUES (date,date_time_received, received_by, reference_number, source_origin_office, type, subject_matter, date_2, action_taken, date_time_dispatch, dispatched_by, remarks, transmittal_soft_copy);

END$$

CREATE PROCEDURE `addProvider` (IN `program_provider` VARCHAR(50) CHARSET utf8mb4, IN `program_name` VARCHAR(50) CHARSET utf8mb4, IN `type` INT(11), IN `program_status` INT(11), IN `amount` VARCHAR(20) CHARSET utf8mb4)  BEGIN
    	INSERT into scholarship_program (program_provider, program_name, type, program_status, amount) VALUES (program_provider, program_name, type, program_status, amount);
    END$$

CREATE PROCEDURE `AutoFillGoodMoralForm` (IN `_userid` VARCHAR(11))  BEGIN

	SELECT * 
 	FROM student_alumni
	WHERE userid = _userid;
    
END$$

CREATE PROCEDURE `ChangeSemesterYear` (IN `_semester` VARCHAR(15), IN `_year` VARCHAR(10))  BEGIN
	update list_of_semester SET status = 'Inactive';
    INSERT INTO list_of_semester (semester,year,status) VALUES (_semester,_year,'Active');
END$$

CREATE PROCEDURE `ClinicInsertNewConsultation` (IN `_userid` VARCHAR(11), IN `_type` VARCHAR(50), IN `_communication_mode` VARCHAR(50), IN `_problems` VARCHAR(150))  BEGIN
	
    INSERT INTO consultation (patient_id,type,communication_mode,problems,date_filed,status) VALUES (_userid,_type,_communication_mode,_problems,curdate(),'Pending');
    
END$$

CREATE PROCEDURE `ClinicInsertNewRequest` (IN `_userid` VARCHAR(11), IN `_purpose` VARCHAR(25), IN `_request_type` VARCHAR(45), IN `_required_document` VARCHAR(45))  BEGIN
	
    INSERT INTO clinic_certificate_requests (user_id,date_requested,purpose,request_type,required_document) VALUES (_userid,curdate(),_purpose,_request_type,_required_document);
END$$

CREATE PROCEDURE `ClinicInsertPatienInfo` (IN `userid` VARCHAR(11), IN `_admitted` VARCHAR(45), IN `_admitted_illness` VARCHAR(45), IN `_admitted_illness_start` VARCHAR(45), IN `_operation` VARCHAR(45), IN `_operation_kind` VARCHAR(45), IN `_infectious_disease` VARCHAR(45), IN `_headaches` VARCHAR(45), IN `_mens_start` VARCHAR(45), IN `_mens_regular` VARCHAR(45), IN `_mens_irregular` VARCHAR(45), IN `_dysmenorrhea` VARCHAR(45), IN `_pms` VARCHAR(45), IN `_swear_clause` VARCHAR(45))  BEGIN
	
	
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

CREATE PROCEDURE `ClinicSetAppointment` (IN `_consultation_id` INT, IN `_appointment_date` DATE, IN `_appointment_timefrom` VARCHAR(45), IN `_appointment_timeto` VARCHAR(45), IN `_appointment_link` VARCHAR(150))  BEGIN
	
    UPDATE consultation SET appointment_date = _appointment_date, appointment_timefrom = _appointment_timefrom, appointment_timeto = _appointment_timefrom, appointment_meetinglink = _appointment_link,date_received_by_nurse=curdate(), status='On going' WHERE id = _consultation_id;
    
END$$

CREATE PROCEDURE `ClinicSetPhysicianDiagnosis` (IN `_consultation_id` INT, IN `_diagnosis` VARCHAR(150), IN `_treatment` VARCHAR(150), IN `_remarks` VARCHAR(150))  BEGIN
	
    UPDATE consultation SET diagnosis=_diagnosis,treatment=_treatment,remarks=_remarks,status='Completed'  WHERE id = _consultation_id;
    
END$$

CREATE PROCEDURE `ClinicSetPrescription` (IN `_consultation_id` INT, IN `_prescription_details` VARCHAR(150))  BEGIN
	
    UPDATE consultation SET prescription_details = _prescription_details, prescription_date_issued = CURDATE(), status='Completed' WHERE id = _consultation_id;
    
END$$

CREATE PROCEDURE `GetOfficeByCountry` (IN `requisitionid` INT)  BEGIN
	SELECT * 
 	FROM sl_reqform_general_info
	WHERE requisition_id = requisitionid;
END$$

CREATE PROCEDURE `GetScholarsForValidation` ()  BEGIN
	SELECT DISTINCT student_id,program_name,fullname,year_level,college_name,coursetitle,semester_year FROM testdb1.scholarship_general_info as g
	WHERE NOT EXISTS (select * from scholarship_general_info as s WHERE semester_year = concat(sf_get_current_semester(),' ',sf_get_current_schoolyear()) and record_status = 1 and s.student_id = g.student_id) 
    ORDER BY semester_year desc;

END$$

CREATE PROCEDURE `MainAddStudentLaborApplicant` (IN `_student_id` VARCHAR(255), IN `_labor_type` VARCHAR(20), IN `_labor_class` VARCHAR(10), IN `_labor_status` VARCHAR(10), IN `_semester_year` VARCHAR(25), IN `_available_from` TIME, IN `_available_to` TIME, IN `_assigned_to` INT, IN `_grades_location` VARCHAR(150), IN `_cor_location` VARCHAR(150), IN `_unit_head_letter_location` VARCHAR(150), IN `_osas_head_letter_location` VARCHAR(150))  BEGIN
	
    INSERT INTO sl_applicant (student_id,labor_type,labor_class,labor_status,semester_year,available_from,available_to,assigned_to,grades_location,date_submitted,cor_location,unit_head_letter_location,osas_head_letter_location)
    VALUES(_student_id,_labor_type,_labor_class,_labor_status,_semester_year,_available_from,_available_to,_assigned_to,_grades_location,curdate(),_cor_location,_unit_head_letter_location,_osas_head_letter_location);
    
END$$

CREATE PROCEDURE `MainCheckVacancyThenUpdateTables` (IN `reqid` INT)  BEGIN

	DECLARE vacancies INT;
    SELECT no_of_vacancies INTO vacancies FROM sl_reqform_general_info WHERE requisition_id = reqid;
    
    IF vacancies = 0 THEN
		UPDATE sl_applicant SET status = 'Not Approved' WHERE assigned_to = reqid and status != 'Hired';
        UPDATE requisition_form SET requisition_status = 'Completed' WHERE id = reqid;
        DELETE FROM job_hiring_announcement WHERE requisition_id = reqid;
	END IF;

END$$

CREATE PROCEDURE `MainGetAllApplicants` ()  BEGIN
SELECT
	applicant_id,
    student_id,
    grades_location,
    cor_location,
    unit_head_letter_location,
    osas_head_letter_location,
    status,
    recommendation_location,
    requisition_id as id,
    office_name,
    applicant_name as student_name,
    semester_year,
    acceptance_contract_status
FROM sl_application_form_details;
END$$

CREATE PROCEDURE `MainGetApplicationFormInfo` (IN `applicantid` INT)  BEGIN
	SELECT * 
 	FROM sl_application_form_details
	WHERE applicant_id = applicantid;
END$$

CREATE PROCEDURE `MainGetDataFromSLView` (IN `pagename` VARCHAR(255), IN `_student_id` VARCHAR(10))  BEGIN
	IF pagename='Labor-Accomplishments.php' THEN
		SELECT applicant_name AS student_name, labor_class as class, CONCAT(course,' ',year_level) as course_yr,labor_type as type,office_name as assigned FROM sl_application_form_details WHERE applicant_id = sf_get_applicant_id(_student_id);
    END IF;
END$$

CREATE PROCEDURE `MainGetHeadRequisitionFormHistory` (IN `staffid` INT)  BEGIN
SELECT
	r.requisition_id,
    r.date_submitted,
    r.no_of_sl,
    sf_get_no_of_applicants(r.requisition_id) as no_of_applicants,
    sf_get_no_of_applicants_hired(r.requisition_id) as no_of_hired,
    r.requisition_status
FROM
	sl_reqform_general_info as r
WHERE
	r.requested_by = staffid;
END$$

CREATE PROCEDURE `MainGetJobHiringsDropdown` ()  BEGIN
	SELECT requisition_id, office_name FROM sl_reqform_general_info WHERE requisition_status = 'Approved' and date_posted is not null;
END$$

CREATE PROCEDURE `MainGetOfficeHeadInfo` (IN `staffid` INT)  BEGIN
	SELECT name, office_type, fullname 
 	FROM office_dept_heads
	WHERE staff_id = staffid;
END$$

CREATE PROCEDURE `MainGetRequisitionFormInfo` (IN `requisitionid` INT)  BEGIN
	SELECT * 
 	FROM sl_reqform_general_info
	WHERE requisition_id = requisitionid;
END$$

CREATE PROCEDURE `MainGetRequisitionFormsForApproval` ()  BEGIN
SELECT
	r.requisition_id,
    r.fullname as faculty_name,
    r.office_name,
    r.date_submitted,
    r.requisition_status,
    r.date_posted
FROM
	sl_reqform_general_info as r
WHERE
	r.requisition_status = 'Pending' or r.requisition_status = 'Approved';
END$$

CREATE PROCEDURE `MainPostJobHiring` (IN `_staff_id` INT, IN `_title` VARCHAR(100), IN `_content` VARCHAR(255), IN `_requisition_id` INT, IN `_office` VARCHAR(150))  BEGIN
	INSERT INTO job_hiring_announcement (posted_by,date_posted,title,content,requisition_id,office) VALUES (_staff_id,curdate(),_title,_content,_requisition_id,_office);
    UPDATE requisition_form SET date_posted = curdate() WHERE id = _requisition_id;
END$$

CREATE PROCEDURE `MainSlDTR` (IN `student_id` VARCHAR(10), IN `time_log` DATETIME, IN `state` VARCHAR(5))  BEGIN

	INSERT INTO sl_dtr (applicant_id,sl_datetime,in_out) VALUES (sf_get_applicant_id(student_id),time_log,state);
    
END$$

CREATE PROCEDURE `MainStudentLaborApplicationAutoFill` (IN `sid` VARCHAR(10))  BEGIN
	SELECT
	s.fullname,
    s.full_address,
    concat(s.coursetitle,' - ',year_level) as course_year,
    s.phone_number as contact,
    s.email_add,
    DATE_FORMAT(s.birth_date, "%m/%d/%Y") as bday,
    s.birth_place
FROM
	studentdetails as s
WHERE
	s.student_id = sid;
END$$

CREATE PROCEDURE `MainStudentOtherQueries` (IN `_student_id` VARCHAR(11), IN `_queryno` INT)  BEGIN
	IF _queryno = 1 THEN
		SELECT sf_check_if_sl_applicant_already_applied(_student_id) as already_applied, sf_check_job_hirings_availability() as job_hirings;
    END IF;
END$$

CREATE PROCEDURE `MainSubmitRequisitionForm` (IN `_requested_by` INT, IN `_no_of_sl` INT, IN `_length_of_service` INT, IN `_qualification1` VARCHAR(45), IN `_qualification2` VARCHAR(45), IN `_qualification3` VARCHAR(45), IN `_skill1` VARCHAR(45), IN `_skill2` VARCHAR(45), IN `_additional_workload_reason` TINYINT, IN `_reduction_in_workload_reason` TINYINT, IN `_reached_saturation_reason` TINYINT, IN `_other_reason` VARCHAR(50))  BEGIN
	INSERT INTO requisition_form (requested_by,no_of_sl,length_of_service,qualification1,qualification2,qualification3,skill1,skill2,additional_workload_reason,reduction_in_workload_reason,reached_saturation_reason,other_reason,requisition_status,date_submitted) 
							VALUES (_requested_by,_no_of_sl,_length_of_service,_qualification1,_qualification2,_qualification3,_skill1,_skill2,_additional_workload_reason,_reduction_in_workload_reason,_reached_saturation_reason,_other_reason,'Pending',curdate());
	INSERT INTO notif (office_id,message_body,link) 
			VALUES (sf_get_office_id('OSAS'),CONCAT(sf_get_unit_head_office(_requested_by),'\'s Head has submitted a requisition form.'),'../M-Admin/Labor-Requisition.php');
END$$

CREATE PROCEDURE `OsasSetComplaintResponse` (IN `_complaint_id` INT, IN `_date` DATE, IN `_time_from` TIME, IN `_time_to` TIME, IN `_meeting_type` VARCHAR(45) CHARSET utf8mb4, IN `_meeting_link` VARCHAR(150) CHARSET utf8mb4, IN `_meeting_id` VARCHAR(45) CHARSET utf8mb4, IN `_passcode` VARCHAR(45) CHARSET utf8mb4, IN `_status` VARCHAR(45) CHARSET utf8mb4, IN `_defendant` VARCHAR(145) CHARSET utf8mb4, IN `_action_taken` VARCHAR(45) CHARSET utf8mb4)  BEGIN
	DECLARE message VARCHAR(150);
    
    SET message = sf_check_conflict_complaint_schedule(_time_from,_time_to);
    
    IF message is null THEN
		INSERT INTO `response` (`Complaint_ID`, `date_schedule`, `time_from`, `time_to`, `meeting_type`, `meeting_link`, `meeting_id`, `passcode`, `action_taken`,status,defendant) VALUES (_complaint_id, _date, _time_from, _time_to, _meeting_type, _meeting_link, _meeting_id, _passcode, _action_taken,_status,_defendant);
		SET message = 'NO CONFLICT';
    END IF;
    
    
	SELECT message;
    
END$$

CREATE PROCEDURE `RequestGoodMoral` (IN `_userid` VARCHAR(11), IN `_last_sy_attended` VARCHAR(20), IN `_or_no` VARCHAR(45), IN `_purpose` VARCHAR(150), IN `_or_pic` BLOB)  BEGIN
	
    INSERT INTO good_moral_requests (last_sy_attended,requested_by,date_requested,or_no,purpose,or_pic) VALUES (_last_sy_attended,_userid,CURDATE(),_or_no,_purpose,_or_pic);
    
END$$

CREATE PROCEDURE `ScholarshipAddScholarThruDataForm` (IN `_student_id` VARCHAR(11) CHARSET utf8mb4, IN `_program_id` INT, IN `_semester_year` VARCHAR(50) CHARSET utf8mb4, IN `_city_address` VARCHAR(50) CHARSET utf8mb4, IN `_parent_name` VARCHAR(50) CHARSET utf8mb4, IN `_parent_occupation` VARCHAR(50) CHARSET utf8mb4, IN `_parents_address` VARCHAR(50) CHARSET utf8mb4, IN `_parents_contact` VARCHAR(50) CHARSET utf8mb4, IN `_living_with` VARCHAR(50) CHARSET utf8mb4, IN `_others_specify` VARCHAR(50) CHARSET utf8mb4, IN `_guardian_contact` VARCHAR(50) CHARSET utf8mb4, IN `_spouse_name` VARCHAR(50) CHARSET utf8mb4, IN `_spouse_occupation` VARCHAR(50) CHARSET utf8mb4, IN `_prev_gwa` FLOAT, IN `_prev_total_units` INT)  BEGIN
		UPDATE emergency_contact SET living_with = _living_with, others_specify = _others_specify, guardian_contact = _guardian_contact, city_address = _city_address, parent_name = _parent_name, parent_occupation = _parent_occupation, parents_address = _parents_address, parents_contact = _parents_contact, spouse_name = _spouse_name, spouse_occupation = _spouse_occupation, prev_gwa = _prev_gwa, prev_total_units = _prev_total_units WHERE student_id = _student_id;
		INSERT INTO grantee_history (student_id,program_id,student_status,semester_year,semester,year) VALUES
									(_student_id,_program_id,0,_semester_year,SUBSTRING(semester_year,1,12),SUBSTRING(semester_year,14,9));
END$$

CREATE PROCEDURE `ScholarshipChangeSemesterEvent` (IN `_month_no` INT, IN `_sy` VARCHAR(10))  BEGIN
	DECLARE flag INT;
    DECLARE new_sem VARCHAR(15);
    
	IF _month_no = 8 THEN
		SET new_sem = '1st Semester';
	ELSEIF _month_no = 1  THEN
		SET new_sem = '2nd Semester';
	ELSEIF _month_no = 6 THEN
		SET new_sem = 'Off Semester';
	END IF;
        
    SELECT count(*) INTO flag FROM list_of_semester WHERE semester = new_sem and year = _sy;
    
    IF flag = 0 THEN
        -- SET OLD SEM TO INACTIVE
        UPDATE list_of_semester SET status = 'Inactive' WHERE status = 'Active';
        -- INSERT NEW SEM
        INSERT INTO list_of_semester (semester,year,status) VALUES (new_sem,_sy,'Active');
        -- INSERT INTO GRANTEE HISTORY
		DROP TEMPORARY TABLE IF EXISTS granteetemptbl;
		CREATE TEMPORARY TABLE granteetemptbl (id INT AUTO_INCREMENT PRIMARY KEY, studentid VARCHAR(10), programid INT);
		INSERT INTO granteetemptbl (studentid,programid) SELECT student_id,program_id FROM grantee_history WHERE record_status = 1;
		UPDATE grantee_history SET record_status = 0 WHERE record_status = 1 or (semester != new_sem and year != _sy);
		INSERT INTO grantee_history (student_id,program_id,student_status,semester_year,semester,year,record_status) SELECT studentid,programid,1,concat(new_sem,' ',_sy),new_sem,_sy,1 FROM granteetemptbl;
	END IF;
END$$

CREATE PROCEDURE `ScholarshipGetStudentGradesBySem` (IN `studentid` VARCHAR(10), IN `sem_year` VARCHAR(30))  BEGIN
	SELECT student_id, concat(semester_name,' ',schoolyear) as sem_year, subcode, subdesc, units, grade 
    FROM student_grades 
    where student_id = studentid and  concat(semester_name,' ',schoolyear) = sem_year ORDER BY subcode;
END$$

CREATE PROCEDURE `ScholarshipInsertEnrollmentList` (IN `_student_id` VARCHAR(11) CHARSET utf8mb4, IN `_student_yearlevel` VARCHAR(10), IN `current_semester` VARCHAR(15), IN `current_schoolyear` VARCHAR(15) CHARSET utf8mb4)  BEGIN
    
    DROP TEMPORARY TABLE IF EXISTS temptbl;
	CREATE TEMPORARY TABLE temptbl (id INT AUTO_INCREMENT PRIMARY KEY, subcode VARCHAR(10), subunit INT);
	INSERT INTO temptbl (subcode,subunit) SELECT subject_code,subject_unit FROM list_of_subjects WHERE year=SF_GET_YEAR_ID(_student_yearlevel) and semester = SF_GET_SEMESTER_ID(current_semester) and course = SF_GET_STUDENT_COURSE_ID(_student_id);
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

CREATE PROCEDURE `ScholarshipUpdateDataForm` (IN `_student_id` VARCHAR(11), IN `_semester_year` VARCHAR(25), IN `_phone_num` VARCHAR(11), IN `_living_with` VARCHAR(45), IN `_others_specify` VARCHAR(45), IN `_guardian_contact` VARCHAR(11), IN `_city_address` VARCHAR(100), IN `_parent_name` VARCHAR(100), IN `_parent_occupation` VARCHAR(100), IN `_parents_address` VARCHAR(100), IN `_parents_contact` VARCHAR(11), IN `_spouse_name` VARCHAR(100), IN `_spouse_occupation` VARCHAR(50), IN `_prev_gwa` FLOAT, IN `_prev_total_units` INT)  BEGIN
	
    UPDATE student SET phone_number = _phone_num WHERE student_id = _student_id;
    UPDATE emergency_contact SET living_with = _living_with, others_specify = _others_specify, guardian_contact = _guardian_contact, city_address = _city_address, parent_name = _parent_name, parent_occupation = _parent_occupation, parents_address = _parents_address, parents_contact = _parents_contact, spouse_name = _spouse_name, spouse_occupation = _spouse_occupation, prev_gwa = _prev_gwa, prev_total_units = _prev_total_units WHERE student_id = _student_id;
    
END$$

CREATE PROCEDURE `ScholarshipValidateScholarBySemester` (IN `studentid` VARCHAR(10), IN `program_name` VARCHAR(50), IN `currentsemester` VARCHAR(15), IN `currentyear` VARCHAR(10), IN `yearlevel` VARCHAR(10), IN `status_id` INT)  BEGIN
	DECLARE flag VARCHAR(11);
    DECLARE flag2 INT;
    DECLARE programid INT;
    
    -- check if naa na ba siyay record sa enrollment list para ana na semester ug year para ma avoid ang double entry
    SET flag = sf_check_if_subject_has_been_loaded(studentid,currentyear,currentsemester);
    SET flag2 = sf_check_scholar_record_for_current_sem_year(studentid,currentsemester,currentyear,programid);
    
    -- if wala pa siyay enrollment_list record kay mu insert siya sa enrollmentlist
    IF flag is null and program_name is not null and status_id = 1 THEN 
		call ScholarshipInsertEnrollmentList(studentid,yearlevel,currentsemester,currentyear);
	END IF;
    
	IF flag2 = 0 and program_name is not null and status_id = 1  THEN
		SET programid = sf_get_scholarship_program_id(program_name);
		INSERT INTO grantee_history (student_id,program_id,student_status,semester_year,semester,year,record_status) 
							 VALUES (studentid,programid,1,concat(currentsemester,' ',currentyear),currentsemester,currentyear,1);
    END IF;
    
    UPDATE grantee_history SET student_status = status_id WHERE student_id = studentid;
END$$

CREATE PROCEDURE `spGetAllAlumniDetails` (IN `_alumni_id` INT)  BEGIN
	
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

CREATE PROCEDURE `spGetAllowanceStatus` ()  BEGIN
	
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

CREATE PROCEDURE `spGetAllStaffDetails` (IN `_staff_id` INT)  BEGIN
	
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

CREATE PROCEDURE `spGetAllStudentDetails` (IN `id` VARCHAR(25) CHARSET utf8mb4)  BEGIN

SELECT * FROM studentdetails as s
WHERE
	s.reg_id = id or s.student_id = id;
END$$

CREATE PROCEDURE `spGetTotalAllowanceReleased` ()  BEGIN
	
   SELECT
	program_id,
    semester_year,
    program_name,
    coursetitle,
    count(student_id) as grantees,
    SUM(IF(allowance_status = 'RELEASED',amount,0)) as total
FROM
	scholarship_general_info
GROUP BY
	semester_year,program_id,coursetitle
ORDER BY
	semester_year;
    
END$$

CREATE PROCEDURE `spLogin` (IN `_username` VARCHAR(11) CHARSET utf8mb4, IN `_pword` VARCHAR(255) CHARSET utf8mb4)  BEGIN
	SELECT * FROM login_credentials WHERE username = _username and password=_pword;
END$$

CREATE PROCEDURE `spRegisterStudent` (IN `_student_id` VARCHAR(15) CHARSET utf8mb4, IN `_lname` VARCHAR(50) CHARSET utf8mb4, IN `_fname` VARCHAR(50) CHARSET utf8mb4, IN `_mname` VARCHAR(50) CHARSET utf8mb4, IN `_suffix` VARCHAR(50) CHARSET utf8mb4, IN `_house_lot_number` VARCHAR(50) CHARSET utf8mb4, IN `_street` VARCHAR(50) CHARSET utf8mb4, IN `_purok` VARCHAR(50) CHARSET utf8mb4, IN `_brgy` VARCHAR(50) CHARSET utf8mb4, IN `_city` VARCHAR(50) CHARSET utf8mb4, IN `_province` VARCHAR(50) CHARSET utf8mb4, IN `_zip_code` VARCHAR(50) CHARSET utf8mb4, IN `_sex` VARCHAR(50) CHARSET utf8mb4, IN `_civil_status` VARCHAR(50) CHARSET utf8mb4, IN `_religion` VARCHAR(50) CHARSET utf8mb4, IN `_nationality` VARCHAR(50) CHARSET utf8mb4, IN `_birthdate` DATE, IN `_birthplace` VARCHAR(150) CHARSET utf8mb4, IN `_course_id` INT, IN `_yearlevel` VARCHAR(50) CHARSET utf8mb4, IN `_section` VARCHAR(50) CHARSET utf8mb4, IN `_email_add` VARCHAR(50) CHARSET utf8mb4, IN `_contact_no` VARCHAR(50) CHARSET utf8mb4, IN `_student_type` VARCHAR(50) CHARSET utf8mb4, IN `_living_with` VARCHAR(50) CHARSET utf8mb4, IN `_others_specify` VARCHAR(150) CHARSET utf8mb4, IN `_guardian_name` VARCHAR(150) CHARSET utf8mb4, IN `_guardian_occupation` VARCHAR(50) CHARSET utf8mb4, IN `_guardian_contact` VARCHAR(50) CHARSET utf8mb4, IN `_city_address` VARCHAR(50) CHARSET utf8mb4, IN `_parent_name` VARCHAR(50) CHARSET utf8mb4, IN `_parent_occupation` VARCHAR(150) CHARSET utf8mb4, IN `_parents_address` VARCHAR(45) CHARSET utf8mb4, IN `_parents_contact` VARCHAR(20) CHARSET utf8mb4, IN `_spouse_name` VARCHAR(45) CHARSET utf8mb4, IN `_spouse_occupation` VARCHAR(45) CHARSET utf8mb4, IN `_spouse_contact` VARCHAR(45) CHARSET utf8mb4, IN `_pword` VARCHAR(255) CHARSET utf8mb4, IN `_pic` BLOB, IN `_cor` VARCHAR(255) CHARSET utf8mb4)  BEGIN
	DECLARE student_org_id INT;
    
    INSERT INTO student (student_id, course_id, last_name, first_name, middle_name, suffix, house_block_lot_num, street, prk_vill_sub, brgy, city, province, zip_code, nationality, civil_status, religion, sex, phone_number, birth_date, birth_place, email_add, section, year_level, cor, type, pic, password, date_submitted ) 
								VALUES ( _student_id, _course_id,_lname,_fname,_mname,_suffix,_house_lot_number,_street,_purok,_brgy,_city,_province,_zip_code,_nationality,_civil_status,_religion,_sex,_contact_no,_birthdate,_birthplace,_email_add,_section,_yearlevel,_cor,_student_type,_pic,_pword,curdate() );
    
    INSERT INTO emergency_contact (student_id,living_with,others_specify,guardian_name,guardian_occupation,guardian_contact,city_address,parent_name,parent_occupation,parents_address,parents_contact,spouse_name,spouse_occupation,spouse_contact)
							VALUES (_student_id,_living_with,_others_specify,_guardian_name,_guardian_occupation,_guardian_contact,_city_address,_parent_name,_parent_occupation,_parents_address,_parents_contact,_spouse_name,_spouse_occupation,_spouse_contact);

    
    
END$$

--
-- Functions
--
CREATE FUNCTION `fullName` (`fname` VARCHAR(45), `mname` VARCHAR(45), `lname` VARCHAR(45), `title` VARCHAR(10), `suffix` VARCHAR(10), `extension` VARCHAR(25), `format` VARCHAR(20)) RETURNS VARCHAR(150) CHARSET utf8mb4 begin
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

CREATE FUNCTION `fullName1` (`fname` VARCHAR(45), `mname` VARCHAR(45), `lname` VARCHAR(45)) RETURNS VARCHAR(150) CHARSET utf8mb4 begin
	declare full_name varchar(150);
    set full_name = concat(lname,', ',fname,' ',left(mname,1));
    return (full_name);
end$$

CREATE FUNCTION `sf_check_conflict_complaint_schedule` (`timefrom` TIME, `timeto` TIME) RETURNS VARCHAR(150) CHARSET utf8mb4 BEGIN

return (SELECT CONCAT('Conflict with ',fullname,' - ',person_complained,' @',time_from,'-',time_to) as case_involved FROM viewcomplaint where CONCAT(timefrom,'-',timeto) between time_from and time_to);

END$$

CREATE FUNCTION `sf_check_if_consultation_appointment_is_set` (`consultationid` INT) RETURNS INT(11) BEGIN

	return (SELECT appointment_id FROM consultation where id = consultationid);

END$$

CREATE FUNCTION `sf_check_if_consultation_exists` (`consultationid` INT) RETURNS INT(11) BEGIN

	return (SELECT id FROM consultation where id = consultationid);

END$$

CREATE FUNCTION `sf_check_if_sl_applicant_already_applied` (`sid` VARCHAR(10) CHARSET utf8mb4) RETURNS INT(11) BEGIN
	RETURN(SELECT count(*) FROM sl_applicant as s 
	WHERE EXISTS (SELECT * FROM requisition_form as r WHERE r.requisition_status = 'Approved' and r.id=s.assigned_to) 
	and s.student_id = sid AND s.status != 'Approved');
END$$

CREATE FUNCTION `sf_check_if_student_is_enrolled` (`studentid` VARCHAR(10) CHARSET utf8mb4, `currentsy` VARCHAR(10) CHARSET utf8mb4, `currentsemester` VARCHAR(15) CHARSET utf8mb4) RETURNS VARCHAR(10) CHARSET utf8mb4 BEGIN
	DECLARE flag VARCHAR(10);
    
		SELECT student_id INTO flag FROM enrollment_list WHERE Student_id = studentid and semester = currentsemester and schoolyear - currentsy;
        
	RETURN flag;
END$$

CREATE FUNCTION `sf_check_if_subject_has_been_loaded` (`studentid` VARCHAR(10) CHARSET utf8mb4, `currentsy` VARCHAR(10) CHARSET utf8mb4, `currentsemester` VARCHAR(15) CHARSET utf8mb4) RETURNS VARCHAR(10) CHARSET utf8mb4 BEGIN
	DECLARE flag VARCHAR(10);
    
		SELECT student_id INTO flag FROM enrollment_list WHERE Student_id = studentid and semester = currentsemester and schoolyear = currentsy;
        
	RETURN flag;
END$$

CREATE FUNCTION `sf_check_if_user_exists` (`testuser` VARCHAR(11) CHARSET utf8mb4) RETURNS INT(1) BEGIN
	DECLARE flag INT default 0;
    
    SELECT IF(student_id is not null,1,0) INTO flag FROM student WHERE student_id = testuser;
    
    IF flag is null or flag = 0 THEN
		SELECT IF(staff_id is not null,1,0) INTO flag FROM staff WHERE staff_id = testuser;
	END IF;
    
    RETURN flag;

END$$

CREATE FUNCTION `sf_check_job_hirings_availability` () RETURNS INT(11) BEGIN
	RETURN(SELECT count(*) FROM requisition_form WHERE requisition_status = 'Approved');
END$$

CREATE FUNCTION `sf_check_org_affiliations` (`userid` VARCHAR(50) CHARSET utf8mb4) RETURNS VARCHAR(50) CHARSET utf8mb4 BEGIN
	DECLARE org_details VARCHAR(50);
    
	SELECT IF( EXISTS(
             SELECT student_id
             	FROM organization_member
             	WHERE student_id =  userid), (SELECT CONCAT(sf_get_org_name(org_id)," - ",position) FROM organization_member WHERE student_id = userid and status = 'Active'),'false') INTO org_details;

	RETURN org_details;
 
END$$

CREATE FUNCTION `sf_check_scholarship_status` (`userid` VARCHAR(10) CHARSET utf8mb4) RETURNS VARCHAR(5) CHARSET utf8mb4 BEGIN
	DECLARE scholarship_status VARCHAR(10);
    
	SELECT IF( EXISTS(
             SELECT *
             FROM grantee_history
             WHERE student_id=  userid), "true", "false") INTO scholarship_status;

	RETURN scholarship_status;
 
END$$

CREATE FUNCTION `sf_check_scholar_record_for_current_sem_year` (`studentid` VARCHAR(10) CHARSET utf8mb4, `sem` VARCHAR(15) CHARSET utf8mb4, `_year` VARCHAR(10) CHARSET utf8mb4, `programid` INT) RETURNS INT(11) BEGIN

	RETURN (SELECT count(*) FROM grantee_history WHERE Student_id = studentid and semester = sem and year = _year and program_id = programid);

END$$

CREATE FUNCTION `sf_check_sl_applicant` (`sid` VARCHAR(10) CHARSET utf8mb4) RETURNS INT(11) BEGIN
	RETURN(SELECT count(*) FROM sl_applicant as s 
	WHERE EXISTS (SELECT * FROM requisition_form as r WHERE r.requisition_status = 'Approved' and r.id=s.assigned_to) 
	and S.student_id = sid AND s.status != 'Approved');
END$$

CREATE FUNCTION `sf_check_student_labor_status` (`sid` VARCHAR(10) CHARSET utf8mb4) RETURNS VARCHAR(30) CHARSET utf8mb4 BEGIN
	RETURN(SELECT status FROM sl_applicant WHERE student_id = sid ORDER BY applicant_id DESC LIMIT 1);
END$$

CREATE FUNCTION `sf_check_verified` (`date_verified` DATE) RETURNS VARCHAR(20) CHARSET utf8mb4 BEGIN
	DECLARE verified_status VARCHAR(10);
    
	SELECT IF(isnull(date_verified),'Not Verified','Verified') into verified_status;

	RETURN verified_status;
 
END$$

CREATE FUNCTION `sf_get_age` (`dob` DATE) RETURNS INT(11) RETURN DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(dob, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(dob, '00-%m-%d'))$$

CREATE FUNCTION `sf_get_applicants_approved_by_unit_head` (`requisition_id` INT) RETURNS INT(11) BEGIN
	RETURN(SELECT count(*) from sl_applicant WHERE recommendation_location is not null and assigned_to = requisition_id);
END$$

CREATE FUNCTION `sf_get_applicant_id` (`studentid` VARCHAR(10) CHARSET utf8mb4) RETURNS INT(11) BEGIN
	RETURN (SELECT applicant_id FROM sl_applicant WHERE student_id = studentid);
END$$

CREATE FUNCTION `sf_get_college_id` (`college_name` VARCHAR(50) CHARSET utf8mb4) RETURNS INT(11) BEGIN
	DECLARE collegeid INT;
    
	SELECT college_id INTO collegeid FROM college WHERE title = college_name;
    
	IF collegeid is null THEN
		SET collegeid = 0;
	END IF;

	RETURN collegeid;
 
END$$

CREATE FUNCTION `sf_get_college_name` (`collegeid` INT) RETURNS VARCHAR(50) CHARSET utf8mb4 BEGIN
	DECLARE collegename VARCHAR(50);
    
	SELECT title INTO collegename FROM college WHERE college_id = collegeid;

	RETURN collegename;
 
END$$

CREATE FUNCTION `sf_get_course_id` (`course_name` VARCHAR(50) CHARSET utf8mb4) RETURNS INT(11) BEGIN
	DECLARE courseid INT;
    
	SELECT course_id INTO courseid FROM course WHERE title = course_name;
    
	IF courseid is null THEN
		SET courseid = 0;
	END IF;

	RETURN courseid;
 
END$$

CREATE FUNCTION `sf_get_course_name` (`courseid` INT) RETURNS VARCHAR(255) CHARSET utf8mb4 BEGIN
	DECLARE coursename VARCHAR(255);
    
	SELECT concat(title,'-',name) INTO coursename FROM course WHERE course_id = courseid;

	RETURN coursename;
 
END$$

CREATE FUNCTION `sf_get_current_osas_head` () RETURNS INT(11) BEGIN
	RETURN(SELECT staff_id  FROM office_dept_heads WHERE name = 'OSAS');
END$$

CREATE FUNCTION `sf_get_current_schoolyear` () RETURNS VARCHAR(10) CHARSET utf8mb4 BEGIN

 	RETURN (SELECT year FROM list_of_semester WHERE status = "Active");

END$$

CREATE FUNCTION `sf_get_current_semester` () RETURNS VARCHAR(25) CHARSET utf8mb4 BEGIN

 	RETURN (SELECT semester FROM list_of_semester WHERE status = "Active");

END$$

CREATE FUNCTION `sf_get_data_from_college_by_id` (`datareturn` VARCHAR(150) CHARSET utf8mb4, `id` INT) RETURNS VARCHAR(150) CHARSET utf8mb4 BEGIN
	DECLARE datatoreturn VARCHAR(150);
 
	IF datareturn = 'title' THEN
		SELECT title INTO datatoreturn FROM college WHERE college_id = id;
    END IF; 
	IF datareturn = 'description' THEN
		SELECT description INTO datatoreturn FROM college WHERE college_id = id;
    END IF;
 
	return datatoreturn;
END$$

CREATE FUNCTION `sf_get_data_from_course_by_id` (`datareturn` VARCHAR(150) CHARSET utf8mb4, `id` INT) RETURNS VARCHAR(150) CHARSET utf8mb4 BEGIN
	DECLARE datatoreturn VARCHAR(150);
 
	IF datareturn = 'college_id' THEN
		SELECT college_id INTO datatoreturn FROM course WHERE course_id = id;
	ELSEIF  datareturn = 'dept_id' THEN
		SELECT dept_id INTO datatoreturn FROM course WHERE course_id = id;
    ELSEIF datareturn = 'title' THEN
		SELECT title INTO datatoreturn FROM course WHERE course_id = id;
    ELSEIF datareturn = 'name' THEN
		SELECT name INTO datatoreturn FROM course WHERE course_id = id;
    ELSEIF datareturn = 'status' THEN
		SELECT status INTO datatoreturn FROM course WHERE course_id = id;
    ELSEIF datareturn = 'major' THEN
		SELECT major INTO datatoreturn FROM course WHERE course_id = id;
    END IF; 
 
	return datatoreturn;
END$$

CREATE FUNCTION `sf_get_data_from_curriculum_by_id` (`datareturn` VARCHAR(150) CHARSET utf8mb4, `_id` INT) RETURNS VARCHAR(150) CHARSET utf8mb4 BEGIN
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

CREATE FUNCTION `sf_get_data_from_department_by_id` (`datareturn` VARCHAR(150) CHARSET utf8mb4, `id` INT) RETURNS VARCHAR(150) CHARSET utf8mb4 BEGIN
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

CREATE FUNCTION `sf_get_data_from_requisition_form_by_id` (`dataneeded` VARCHAR(20) CHARSET utf8mb4, `requisitionid` INT) RETURNS VARCHAR(100) CHARSET utf8mb4 BEGIN
	DECLARE datatoreturn VARCHAR(100);
	IF dataneeded = 'requested_by' THEN
		SELECT requested_by INTO datatoreturn FROM sl_reqform_general_info WHERE requisition_id = requisitionid;
	ELSEIF dataneeded = 'office_name' THEN
		SELECT office_name INTO datatoreturn FROM sl_reqform_general_info WHERE requisition_id = requisitionid;
	END IF;
    RETURN datatoreturn;
END$$

CREATE FUNCTION `sf_get_data_from_school_org_by_id` (`datareturn` VARCHAR(150) CHARSET utf8mb4, `id` INT) RETURNS VARCHAR(150) CHARSET utf8mb4 BEGIN
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

CREATE FUNCTION `sf_get_data_from_sl_applicant_by_id` (`data_needed` VARCHAR(15) CHARSET utf8mb4, `applicantid` INT) RETURNS VARCHAR(50) CHARSET utf8mb4 BEGIN
	DECLARE datatoreturn VARCHAR(50);
    
	If data_needed = 'student_id' THEN
		SELECT student_id INTO datatoreturn FROM sl_applicant WHERE applicant_id = applicantid;
    ELSEIF data_needed = 'assigned_to' THEN
		SELECT assigned_to INTO datatoreturn FROM sl_applicant WHERE applicant_id = applicantid;
    END IF;
    
    RETURN datatoreturn;
END$$

CREATE FUNCTION `sf_get_data_from_subject_by_id` (`data_needed` VARCHAR(25) CHARSET utf8mb4, `subcode` VARCHAR(15) CHARSET utf8mb4) RETURNS VARCHAR(45) CHARSET utf8mb4 BEGIN
	DECLARE datatoreturn VARCHAR(45);
    
    IF data_needed = 'subject_description' THEN
		SELECT subject_description INTO datatoreturn FROM list_of_subjects WHERE subject_code = subcode;
	ELSEIF data_needed = 'units' THEN
		SELECT subject_unit INTO datatoreturn  FROM list_of_subjects WHERE subject_code = subcode;
	ELSEIF data_needed = 'yearlevel' THEN
		SELECT year  INTO datatoreturn  FROM list_of_subjects WHERE subject_code = subcode;
	ELSEIF data_needed = 'semester' THEN
		SELECT semester  INTO datatoreturn  FROM list_of_subjects WHERE subject_code = subcode;
	ELSEIF data_needed = 'course' THEN
		SELECT course  INTO datatoreturn  FROM list_of_subjects WHERE subject_code = subcode;
	END IF;
    
    return datatoreturn;
END$$

CREATE FUNCTION `sf_get_data_from_temptbl` (`mydata` VARCHAR(10) CHARSET utf8mb4, `_id` INT) RETURNS VARCHAR(150) CHARSET utf8mb4 BEGIN
	DECLARE datatoreturn VARCHAR(150);
    
		IF mydata = 'subcode' THEN
			SELECT subcode INTO datatoreturn FROM temptbl WHERE id = _id;
		ELSEIF mydata = 'subunit' THEN
			SELECT subunit INTO datatoreturn FROM temptbl WHERE id = _id;
		END IF;
    
	return datatoreturn;
END$$

CREATE FUNCTION `sf_get_department_id` (`deptname` VARCHAR(50) CHARSET utf8mb4) RETURNS INT(11) BEGIN
	DECLARE deptid INT;
    
	SELECT dept_id INTO deptid FROM department WHERE dept_name = deptname;
    
	IF deptid is null THEN
		SET deptid = 0;
	END IF;

	RETURN deptid;
 
END$$

CREATE FUNCTION `sf_get_e_signature` (`userid` VARCHAR(11) CHARSET utf8mb4) RETURNS BLOB BEGIN
	RETURN(SELECT e_signature FROM login_credentials WHERE username = userid);
END$$

CREATE FUNCTION `sf_get_first_name` (`_student_id` VARCHAR(11)) RETURNS VARCHAR(64) CHARSET utf8mb4 BEGIN
	DECLARE firstName VARCHAR(50);
    
	SELECT first_name INTO firstName FROM student WHERE student_id = _student_id;

	RETURN firstName;
 
END$$

CREATE FUNCTION `sf_get_full_address` (`house_num` VARCHAR(50), `street` VARCHAR(50), `prk` VARCHAR(50), `brgy` VARCHAR(50), `city` VARCHAR(50), `province` VARCHAR(50)) RETURNS VARCHAR(255) CHARSET utf8mb4 BEGIN
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

CREATE FUNCTION `sf_get_hired_sl` (`req_id` INT) RETURNS INT(11) BEGIN
	RETURN(SELECT count(*) FROM sl_applicant WHERE status='Hired' and assigned_to = req_id);
END$$

CREATE FUNCTION `sf_get_id_by_name` (`myTable` VARCHAR(50) CHARSET utf8mb4, `myData` VARCHAR(50) CHARSET utf8mb4) RETURNS INT(11) BEGIN
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

CREATE FUNCTION `sf_get_last_name` (`_student_id` VARCHAR(11)) RETURNS VARCHAR(50) CHARSET utf8mb4 BEGIN
	DECLARE lastName VARCHAR(50);
    
	SELECT lastn_name INTO lastName FROM student WHERE student_id = _student_id;

	RETURN lastName;
 
END$$

CREATE FUNCTION `sf_get_mname` (`student_id` VARCHAR(11)) RETURNS VARCHAR(50) CHARSET utf8mb4 BEGIN
	DECLARE middleName VARCHAR(50);
    
	SELECT mname INTO middleName FROM personal_info WHERE User_id = student_id;

	RETURN middleName;
 
END$$

CREATE FUNCTION `sf_get_no_of_applicants` (`requisition_id` INT) RETURNS INT(11) BEGIN
	RETURN(SELECT count(*) FROM sl_applicant WHERE assigned_to = requisition_id);
END$$

CREATE FUNCTION `sf_get_no_of_applicants_hired` (`requisition_id` INT) RETURNS INT(11) BEGIN
	RETURN(SELECT count(*) FROM sl_applicant WHERE assigned_to = requisition_id and status = 'Hired');
END$$

CREATE FUNCTION `sf_get_office_id` (`officename` VARCHAR(50) CHARSET utf8mb4) RETURNS INT(11) BEGIN
	DECLARE officeid INT;
    
	SELECT office_id INTO officeid FROM office WHERE office_name = officename;
    
	IF officeid is null THEN
		SET officeid = 0;
	END IF;

	RETURN officeid;
 
END$$

CREATE FUNCTION `sf_get_office_name` (`officeid` INT) RETURNS VARCHAR(50) CHARSET utf8mb4 BEGIN
	DECLARE officename VARCHAR(50);
    
	SELECT office_name INTO officename FROM office WHERE office_id = officeid;

	RETURN officename;
 
END$$

CREATE FUNCTION `sf_get_organization_id` (`organization_name` VARCHAR(50) CHARSET utf8mb4) RETURNS INT(11) BEGIN
	DECLARE studentorg_id INT;
    
	SELECT org_id INTO studentorg_id FROM school_org WHERE org_name = organization_name;
    
	IF studentorg_id is null THEN
		SET studentorg_id = 0;
	END IF;

	RETURN studentorg_id;
 
END$$

CREATE FUNCTION `sf_get_org_name` (`orgid` INT) RETURNS VARCHAR(50) CHARSET utf8 COLLATE utf8_unicode_ci BEGIN
	DECLARE orgname VARCHAR(50);
    
	SELECT org_name INTO orgname FROM school_organization WHERE org_id = orgid;

	RETURN orgname;
 
END$$

CREATE FUNCTION `sf_get_org_where_student_is_governor_president` (`studentid` VARCHAR(10) CHARSET utf8mb4) RETURNS INT(11) BEGIN

	RETURN (SELECT org_id FROM organization_member WHERE student_id = studentid and position = 'Governor' or position = 'President');
 
END$$

CREATE FUNCTION `sf_get_scholarship_name` (`scholarshipid` INT) RETURNS VARCHAR(50) CHARSET utf8mb4 BEGIN
	DECLARE scholarshipname VARCHAR(50);
    
	SELECT program_name INTO scholarshipname FROM scholarship_program WHERE program_id = scholarshipid;

	RETURN scholarshipname;
 
END$$

CREATE FUNCTION `sf_get_scholarship_program_id` (`scholarship_name` VARCHAR(50) CHARSET utf8mb4) RETURNS INT(11) BEGIN
	DECLARE prog_id INT;
    
	SELECT program_id INTO prog_id FROM scholarship_program WHERE program_name = scholarship_name;
    
	IF prog_id is null THEN
		SET prog_id = 0;
	END IF;

	RETURN prog_id;
 
END$$

CREATE FUNCTION `sf_get_scholarship_status` (`scholarstatus` INT) RETURNS VARCHAR(50) CHARSET utf8mb4 BEGIN
	DECLARE scholarshipstatus VARCHAR(50);
    
	SELECT status_name INTO scholarshipstatus FROM scholarship_status WHERE status_id = scholarstatus;

	RETURN scholarshipstatus;
 
END$$

CREATE FUNCTION `sf_get_schoolyear` () RETURNS VARCHAR(10) CHARSET latin1 BEGIN

 	RETURN (SELECT schoolyear FROM school_year WHERE status = "Active");

END$$

CREATE FUNCTION `sf_get_semester` (`_id` INT) RETURNS VARCHAR(150) CHARSET utf8mb4 BEGIN
	DECLARE datatoreturn VARCHAR(150);
 
		SELECT semester_name INTO datatoreturn FROM semester WHERE semester_id = _id;
    
	return datatoreturn;
END$$

CREATE FUNCTION `sf_get_semester_id` (`sem` VARCHAR(15)) RETURNS INT(11) BEGIN
 
	RETURN (SELECT semester_id FROM semester where semester_name = sem);
 
END$$

CREATE FUNCTION `sf_get_semester_name` (`semesterid` INT) RETURNS VARCHAR(50) CHARSET utf8mb4 BEGIN
	DECLARE semestername VARCHAR(50);
    
	SELECT semester_name INTO semestername FROM semester WHERE semester_id = semesterid;

	RETURN semestername;
 
END$$

CREATE FUNCTION `sf_get_sem_year_id` (`sem` VARCHAR(15) CHARSET utf8mb4, `sy` VARCHAR(10) CHARSET utf8mb4) RETURNS INT(11) BEGIN
	return(SELECT semester_id FROM list_of_semester WHERE semester = sem and year = sy);
END$$

CREATE FUNCTION `sf_get_sl_acceptance_status` (`sl_id` INT) RETURNS INT(11) BEGIN
	RETURN(SELECT count(*) FROM sl_acceptance_details WHERE applicant_id = sl_id);
END$$

CREATE FUNCTION `sf_get_staff_name` (`_staff_id` INT) RETURNS VARCHAR(150) CHARSET utf8mb4 BEGIN
	RETURN(SELECT fullname FROM staffdetails WHERE staff_id = _staff_id);
END$$

CREATE FUNCTION `sf_get_status_name` (`statusid` INT) RETURNS VARCHAR(50) CHARSET utf8mb4 BEGIN
	DECLARE statusname VARCHAR(50);
    
	SELECT description INTO statusname FROM scholarship_status WHERE status_id = statusid;

	RETURN statusname;
 
END$$

CREATE FUNCTION `sf_get_student_birthdate` (`student_id` VARCHAR(11)) RETURNS VARCHAR(50) CHARSET utf8mb4 BEGIN
	DECLARE dob VARCHAR(50);
    
	SELECT birth_date INTO dob FROM personal_info WHERE User_id = student_id;

	RETURN dob;
 
END$$

CREATE FUNCTION `sf_get_student_course_id` (`studentid` VARCHAR(10)) RETURNS INT(11) BEGIN

	RETURN(SELECT course_id FROM student WHERE Student_id = studentid);

END$$

CREATE FUNCTION `sf_get_student_email` (`student_id` VARCHAR(11)) RETURNS VARCHAR(50) CHARSET utf8mb4 BEGIN
	DECLARE email VARCHAR(50);
    
	SELECT email_add INTO email FROM personal_info WHERE User_id = student_id;

	RETURN email;
 
END$$

CREATE FUNCTION `sf_get_student_id` (`stud_id` VARCHAR(11) CHARSET utf8mb4) RETURNS VARCHAR(11) CHARSET utf8mb4 BEGIN
	DECLARE studentid VARCHAR(11);
    
	SELECT student_id INTO studentid FROM scholar_info WHERE student_id = stud_id;

	RETURN studentid;
 
END$$

CREATE FUNCTION `sf_get_student_position_in_org` (`orgid` INT, `studentid` VARCHAR(10) CHARSET utf8mb4) RETURNS VARCHAR(150) CHARSET utf8mb4 BEGIN
	RETURN (SELECT position FROM organization_member WHERE org_id = orgid and student_id = studentid);
END$$

CREATE FUNCTION `sf_get_student_scholarship_program` (`studentid` VARCHAR(10)) RETURNS INT(11) BEGIN

	RETURN(SELECT program_id FROM grantee_history WHERE Student_id = studentid ORDER BY id desc limit 1);

END$$

CREATE FUNCTION `sf_get_student_sex` (`student_id` VARCHAR(11)) RETURNS VARCHAR(11) CHARSET utf8mb4 BEGIN
	DECLARE gender VARCHAR(50);
    
	SELECT sex INTO gender FROM personal_info WHERE User_id = student_id;

	RETURN gender;
 
END$$

CREATE FUNCTION `sf_get_student_status` (`statusid` INT) RETURNS VARCHAR(50) CHARSET utf8mb4 BEGIN
	DECLARE studentstatus VARCHAR(50);
    
	SELECT description INTO studentstatus FROM student_status WHERE status_id = statusid;

	RETURN studentstatus;
 
END$$

CREATE FUNCTION `sf_get_subject_from_temptbl` (`_id` INT) RETURNS VARCHAR(150) CHARSET utf8mb4 BEGIN
	DECLARE datatoreturn VARCHAR(150);
 
		SELECT subcode INTO datatoreturn FROM temptbl WHERE id = _id;
    
	return datatoreturn;
END$$

CREATE FUNCTION `sf_get_type_of_scholarship` (`typeid` INT) RETURNS VARCHAR(50) CHARSET utf8mb4 BEGIN
	DECLARE typename VARCHAR(50);
    
	SELECT type_name INTO typename FROM scholarship_type WHERE type_id = typeid;

	RETURN typename;
 
END$$

CREATE FUNCTION `sf_get_unit_head_office` (`staffid` INT) RETURNS VARCHAR(100) CHARSET utf8mb4 BEGIN
	RETURN(SELECT name FROM office_dept_heads WHERE staff_id = staffid);
END$$

CREATE FUNCTION `sf_get_user_name` (`userid` VARCHAR(11) CHARSET utf8mb4) RETURNS VARCHAR(150) CHARSET utf8mb4 BEGIN
	RETURN(SELECT name  FROM login_credentials WHERE username = userid);
END$$

CREATE FUNCTION `sf_get_user_type` (`userid` VARCHAR(50) CHARSET utf8mb4) RETURNS VARCHAR(10) CHARSET utf8mb4 BEGIN
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

CREATE FUNCTION `sf_get_year` (`yearid` VARCHAR(11) CHARSET utf8mb4) RETURNS VARCHAR(11) CHARSET utf8mb4 BEGIN
	DECLARE yeardesc VARCHAR(11);
    
	SELECT year_desc INTO yeardesc FROM year WHERE year_id = yearid;

	RETURN yeardesc;
 
END$$

CREATE FUNCTION `sf_get_yearlevel` (`_id` INT) RETURNS VARCHAR(150) CHARSET utf8mb4 BEGIN
	DECLARE datatoreturn VARCHAR(150);
 
		SELECT year_desc INTO datatoreturn FROM year WHERE year_id = _id;
    
	return datatoreturn;
END$$

CREATE FUNCTION `sf_get_year_id` (`year` VARCHAR(10)) RETURNS INT(11) BEGIN
 
	RETURN (SELECT year_id FROM year where year_desc = year);
 
END$$

CREATE FUNCTION `sf_staff_office_details` (`userid` VARCHAR(50) CHARSET utf8mb4) RETURNS VARCHAR(100) CHARSET utf8mb4 BEGIN
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
-- Table structure for table `accomplishment_rating`
--

CREATE TABLE `accomplishment_rating` (
  `rate_id` int(11) NOT NULL,
  `applicant_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `duty_regularly` varchar(50) DEFAULT NULL,
  `instruction_difficulty` varchar(50) DEFAULT NULL,
  `time_utilize` varchar(50) DEFAULT NULL,
  `routine_work` varchar(50) DEFAULT NULL,
  `initiative_creativity` varchar(50) DEFAULT NULL,
  `accurate_efficient` varchar(45) DEFAULT NULL,
  `good_interpersonal` varchar(45) DEFAULT NULL,
  `willing_learn` varchar(45) DEFAULT NULL,
  `good_working` varchar(45) DEFAULT NULL,
  `month` varchar(45) NOT NULL,
  `year` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `accomplishment_task`
--

CREATE TABLE `accomplishment_task` (
  `task_id` int(11) NOT NULL,
  `applicant_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `student_id` varchar(10) NOT NULL,
  `task` varchar(255) DEFAULT NULL,
  `month` varchar(50) DEFAULT NULL,
  `year` varchar(45) NOT NULL,
  `date_posted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accomplishment_task`
--

INSERT INTO `accomplishment_task` (`task_id`, `applicant_id`, `student_id`, `task`, `month`, `year`, `date_posted`) VALUES
(1, 0000000008, '2021-00001', 'gsrgsr', 'April', '2021', '2021-08-16');

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
  `registration_id` int(11) NOT NULL,
  `id` varchar(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `middle_name` varchar(45) DEFAULT NULL,
  `suffix` varchar(10) DEFAULT NULL,
  `email_add` varchar(50) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `last_sy_attended` varchar(25) NOT NULL,
  `password` varchar(45) NOT NULL,
  `school_id_pic` blob DEFAULT NULL,
  `profile_pic` blob DEFAULT NULL,
  `date_registered` date DEFAULT NULL,
  `date_verified` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`registration_id`, `id`, `course_id`, `first_name`, `last_name`, `middle_name`, `suffix`, `email_add`, `contact`, `last_sy_attended`, `password`, `school_id_pic`, `profile_pic`, `date_registered`, `date_verified`) VALUES
(1, '123', 5, 'Ginny', 'Weasley', NULL, NULL, 'ginny@gmail.com', '09632524125', '2020-2021', '1234', NULL, NULL, '2021-07-28', '2021-07-28');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `announcement_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `_date` date NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`announcement_id`, `staff_id`, `_date`, `title`, `content`) VALUES
(1, 1, '2021-08-15', 'Sample Announcement', 'Sample Announcement');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `date_received` varchar(45) DEFAULT NULL,
  `appointment_date` date DEFAULT NULL,
  `time_from` time DEFAULT NULL,
  `time_to` time DEFAULT NULL,
  `meeting_link` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `chk_intake_q6`
--

CREATE TABLE `chk_intake_q6` (
  `chk_q6_id` int(11) NOT NULL,
  `intake_id` int(11) DEFAULT NULL,
  `anxiousness` varchar(15) DEFAULT NULL,
  `loneliness` varchar(15) DEFAULT NULL,
  `guilt_shame` varchar(15) DEFAULT NULL,
  `marital_distress` varchar(15) DEFAULT NULL,
  `depression` varchar(15) DEFAULT NULL,
  `despair` varchar(15) DEFAULT NULL,
  `withdraw_form_others` varchar(15) DEFAULT NULL,
  `parenting_struggles` varchar(15) DEFAULT NULL,
  `anger` varchar(15) DEFAULT NULL,
  `thoughts_of_suicide` varchar(15) DEFAULT NULL,
  `confusion` varchar(15) DEFAULT NULL,
  `fear` varchar(15) DEFAULT NULL,
  `hurt` varchar(15) DEFAULT NULL,
  `relational_stress` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chk_intake_q6`
--

INSERT INTO `chk_intake_q6` (`chk_q6_id`, `intake_id`, `anxiousness`, `loneliness`, `guilt_shame`, `marital_distress`, `depression`, `despair`, `withdraw_form_others`, `parenting_struggles`, `anger`, `thoughts_of_suicide`, `confusion`, `fear`, `hurt`, `relational_stress`) VALUES
(4, 13, 'Anxiousness', 'Depression', 'Anger', 'Confusion', 'Fear', '', '', '', '', '', '', '', '', ''),
(7, 16, 'Anxiousness', 'Depression', 'Anger', 'Confusion', 'Fear', '', '', '', '', '', '', '', '', '');

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
  `status` varchar(10) DEFAULT NULL,
  `CBC` int(5) DEFAULT NULL,
  `PLATELET` int(5) DEFAULT NULL,
  `HEMOTOCRIT` int(5) DEFAULT NULL,
  `HEMOGLOBIN` int(5) DEFAULT NULL,
  `Urinalysis` int(5) DEFAULT NULL,
  `Fecalysis` int(5) DEFAULT NULL,
  `FBS` int(5) DEFAULT NULL,
  `sua` int(5) DEFAULT NULL,
  `Creatinine` int(5) DEFAULT NULL,
  `Lipid` int(5) DEFAULT NULL,
  `SGOT` int(5) DEFAULT NULL,
  `SGPT` int(5) DEFAULT NULL,
  `others` int(5) DEFAULT NULL,
  `other_text` text DEFAULT NULL,
  `cbc_loc` varchar(255) DEFAULT NULL,
  `platelet_loc` varchar(255) DEFAULT NULL,
  `hema_loc` varchar(255) DEFAULT NULL,
  `hemo_loc` varchar(255) DEFAULT NULL,
  `urine_loc` varchar(255) DEFAULT NULL,
  `fecal_loc` varchar(255) DEFAULT NULL,
  `fbs_loc` varchar(255) DEFAULT NULL,
  `sua_loc` varchar(255) DEFAULT NULL,
  `creat_loc` varchar(255) DEFAULT NULL,
  `lipid_loc` varchar(255) DEFAULT NULL,
  `sgot_loc` varchar(255) DEFAULT NULL,
  `sgpt_loc` varchar(255) DEFAULT NULL,
  `others_loc` varchar(255) DEFAULT NULL
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
  `operation_when` varchar(15) NOT NULL DEFAULT 'N/A',
  `infectious_disease` varchar(45) NOT NULL DEFAULT 'N/A',
  `headaches` varchar(45) NOT NULL DEFAULT 'N/A',
  `swear_clause` varchar(10) NOT NULL DEFAULT 'true',
  `patinfo_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(5, '2018-00001', '2021-07-19', '2021-08-11', '10:45:00', 'Usep', 'Lorem Ipsum', 'Student', 'Lorem Ipsum', 'Lorem Ipsum', 'Lorem Ipsum', 'Lorem Ipsum', 'On Going'),
(7, '2018-00001', '2021-08-15', '2021-08-15', '08:10:00', 'Lorem Ipsum', 'Lorem Ipsum', 'Lorem Ipsum', 'Lorem Ipsum', 'Lorem Ipsum', 'Lorem Ipsum', 'Lorem Ipsum', 'Lorem Ipsum'),
(8, '2018-00001', '2021-08-15', '2021-08-15', '22:47:00', 'Lorem Ipsum', 'Lorem Ipsum', 'Student', 'Lorem Ipsum', 'Lorem Ipsum', 'Lorem Ipsum', 'Lorem Ipsum', 'Pending'),
(9, '2018-00001', '2021-08-15', '2021-08-28', '23:39:00', 'Lorem Ipsum', 'Lorem Ipsum', 'Student', 'Lorem Ipsum', 'Lorem Ipsum', 'Lorem Ipsum', 'Lorem Ipsum', 'Pending'),
(10, '2018-00001', '2021-08-15', '2021-08-25', '23:40:00', 'Lorem Ipsum', 'Lorem Ipsum', 'Student', 'Lorem Ipsum', 'Lorem Ipsum', 'Lorem Ipsum', 'Lorem Ipsum', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `consultation`
--

CREATE TABLE `consultation` (
  `id` int(11) UNSIGNED ZEROFILL NOT NULL,
  `patient_id` varchar(11) NOT NULL,
  `consultation_type` int(10) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `communication_mode` varchar(45) NOT NULL,
  `patient_type` varchar(255) NOT NULL,
  `problems` varchar(150) NOT NULL,
  `date_filed` date NOT NULL,
  `tooth` varchar(255) DEFAULT NULL,
  `surface` varchar(255) DEFAULT NULL,
  `diagnosis` varchar(150) DEFAULT NULL,
  `status` varchar(25) DEFAULT NULL,
  `treatment` varchar(150) DEFAULT NULL,
  `remarks` varchar(150) DEFAULT NULL,
  `date_received_by_nurse` date DEFAULT NULL,
  `appointment_date` date DEFAULT NULL,
  `appointment_timefrom` varchar(45) DEFAULT NULL,
  `appointment_timeto` varchar(45) DEFAULT NULL,
  `appointment_meetinglink` varchar(150) DEFAULT NULL,
  `prescription_details` text DEFAULT NULL,
  `prescription_date_issued` date DEFAULT NULL,
  `semester` varchar(15) NOT NULL,
  `school_year` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in structure for view `consultation_details`
-- (See below for the actual view)
--
CREATE TABLE `consultation_details` (
`consultation_id` int(11) unsigned zerofill
,`patient_id` varchar(11)
,`name` varchar(150)
,`email_add` varchar(50)
,`age` int(11)
,`sex` varchar(10)
,`address` varchar(255)
,`phone_number` varchar(11)
,`course_department` varchar(150)
,`user_type` varchar(50)
,`consultation_type` int(10)
,`communication_mode` varchar(45)
,`patient_type` varchar(255)
,`problems` varchar(150)
,`date_filed` date
,`tooth` varchar(255)
,`surface` varchar(255)
,`consultation_status` varchar(25)
,`date_received_by_nurse` date
,`appointment_date` date
,`appointment_timefrom` varchar(45)
,`appointment_timeto` varchar(45)
,`appointment_meetinglink` varchar(150)
,`diagnosis` varchar(150)
,`treatment` varchar(150)
,`prescription_details` text
,`prescription_date_issued` date
,`remarks` varchar(150)
,`physician_staff_id` int(11)
,`physician_fullname` varchar(150)
,`license_number` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `consultation_type`
--

CREATE TABLE `consultation_type` (
  `type_id` int(10) NOT NULL,
  `consultation_type` varchar(100) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(10) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `consultation_type`
--

INSERT INTO `consultation_type` (`type_id`, `consultation_type`, `date_added`, `status`) VALUES
(2, 'Dental Consultation', '2021-07-19 02:30:59', 'Active'),
(3, 'Medical Consultation', '2021-07-19 02:31:06', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `counselling_evaluation`
--

CREATE TABLE `counselling_evaluation` (
  `counsel_eval_id` int(11) NOT NULL,
  `Student_id` varchar(10) NOT NULL,
  `eval_date` date DEFAULT NULL,
  `eval_code` varchar(100) DEFAULT NULL,
  `radio_q1` varchar(100) DEFAULT NULL,
  `radio_q2` varchar(100) DEFAULT NULL,
  `radio_q3` varchar(100) DEFAULT NULL,
  `comments` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(11, 2, 'BSA', 'Bachelor of Science in Agriculture', NULL, 'Undergraduate', 'Active'),
(12, 1, 'BSEM', 'Bachelor of Secondary Education', 'Major in Math', 'Undergraduate', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` int(11) NOT NULL,
  `college_id` int(11) DEFAULT NULL,
  `dept_head` int(11) DEFAULT NULL,
  `dept_name` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `college_id`, `dept_head`, `dept_name`, `status`) VALUES
(1, 1, NULL, 'IT Department', 'Active'),
(2, 2, NULL, 'Ag-Eng Department', 'Active'),
(3, 1, NULL, 'Special Needs Dept', 'Active'),
(4, 1, NULL, 'English Department', 'Active'),
(5, 1, NULL, 'Elementary Education Department', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `emergency_contact`
--

CREATE TABLE `emergency_contact` (
  `Student_id` varchar(10) NOT NULL,
  `living_with` varchar(50) DEFAULT NULL,
  `others_specify` varchar(150) DEFAULT NULL,
  `guardian_name` varchar(50) DEFAULT NULL,
  `guardian_occupation` varchar(45) DEFAULT NULL,
  `guardian_contact` varchar(11) DEFAULT NULL,
  `city_address` varchar(50) DEFAULT NULL,
  `parent_name` varchar(50) DEFAULT NULL,
  `parent_occupation` varchar(20) DEFAULT NULL,
  `parents_address` varchar(45) DEFAULT NULL,
  `parents_contact` varchar(45) DEFAULT NULL,
  `spouse_name` varchar(45) DEFAULT NULL,
  `spouse_occupation` varchar(45) DEFAULT NULL,
  `spouse_contact` varchar(45) DEFAULT NULL,
  `prev_gwa` float DEFAULT NULL,
  `prev_total_units` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emergency_contact`
--

INSERT INTO `emergency_contact` (`Student_id`, `living_with`, `others_specify`, `guardian_name`, `guardian_occupation`, `guardian_contact`, `city_address`, `parent_name`, `parent_occupation`, `parents_address`, `parents_contact`, `spouse_name`, `spouse_occupation`, `spouse_contact`, `prev_gwa`, `prev_total_units`) VALUES
('2018-00001', 'fsdf', 'fsdf', 'A Mother', NULL, 'fsdf', 'fasd', 'fsdf', 'fsdf', 'fsdf', 'fds', 'fsdf', 'fsd', NULL, 0, 0),
('2018-00002', NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('2018-00003', NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('2018-00159', NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('2018-00161', NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('2018-00234', NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('2021-00001', 'nkn', 'lknl', '', '', 'kn', 'casd', 'jbj', 'knl', 'knl', 'knknl', 'k', 'lkn', NULL, 0, 0),
('2021-00002', 'nkn', 'lknl', '', '', 'kn', 'casd', 'jbj', 'knl', 'knl', 'knknl', 'k', 'lkn', NULL, 0, 0),
('2021-00003', 'nkn', 'lknl', 'asdf', 'sdf', 'kn', 'casd', 'jbj', 'knl', 'knl', 'knknl', 'k', 'lkn', NULL, 0, 0),
('2021-00004', 'nkn', 'lknl', 'Father ni Reed', '', 'kn', 'casd', 'jbj', 'knl', 'knl', 'knknl', 'k', 'lkn', NULL, 0, 0),
('2021-00005', 'fsd', 'fsdf', 'adf', 'fasd', 'fsdf', 'C City', 'fasdf', 'fasdf', 'fsdf', 'fsdf', 'fsdf', 'fsdf', '09125412521', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `enrollment_list`
--

CREATE TABLE `enrollment_list` (
  `id` int(11) NOT NULL,
  `Student_id` varchar(10) NOT NULL,
  `schoolyear` varchar(45) NOT NULL,
  `semester` varchar(45) NOT NULL,
  `student_yearlevel` varchar(45) NOT NULL,
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
(12, '2021-00001', '2021-2022', '1st Semester', '1st Year', 'GE 111', 3, 1.2, 'GE 112', 3, 1.6, 'IC111', 3, 2, 'IC112', 3, 2.5, 'IC113', 3, 3, 'PE 111', 2, 2, 'NSTP 111', 3, 2, NULL, NULL, NULL, NULL, NULL, NULL),
(13, '2021-00002', '2021-2022', '1st Semester', '1st Year', 'GE 111', 3, 2.5, 'GE 112', 3, 2.3, 'IC111', 3, 1.4, 'IC112', 3, 1.1, 'IC113', 3, 1.5, 'PE 111', 2, 1.2, 'NSTP 111', 3, 1.6, NULL, NULL, NULL, NULL, NULL, NULL),
(14, '2021-00003', '2021-2022', '1st Semester', '1st Year', 'GE 111', 3, 1.5, 'GE 112', 3, 1.25, 'IC111', 3, 1.75, 'IC112', 3, 2, 'IC113', 3, 2.25, 'PE 111', 2, 2.5, 'NSTP 111', 3, 2.5, NULL, NULL, NULL, NULL, NULL, NULL),
(15, '2021-00001', '2021-2022', '2nd Semester', '1st Year', 'GE 113', 3, NULL, 'GE 114', 3, NULL, 'IC 124', 3, NULL, 'IC 125', 3, NULL, 'IC 126', 3, NULL, 'IT 121', 3, NULL, 'PE 122', 2, NULL, 'NSTP 122', 3, NULL, NULL, NULL, NULL),
(16, '2021-00002', '2021-2022', '2nd Semester', '1st Year', 'GE 113', 3, NULL, 'GE 114', 3, NULL, 'IC 124', 3, NULL, 'IC 125', 3, NULL, 'IC 126', 3, NULL, 'IT 121', 3, NULL, 'PE 122', 2, NULL, 'NSTP 122', 3, NULL, NULL, NULL, NULL),
(21, '2021-00003', '2021-2022', '2nd Semester', '1st Year', 'GE 113', 3, NULL, 'GE 114', 3, NULL, 'IC 124', 3, NULL, 'IC 125', 3, NULL, 'IC 126', 3, NULL, 'IT 121', 3, NULL, 'PE 122', 2, NULL, 'NSTP 122', 3, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `gmc_request`
-- (See below for the actual view)
--
CREATE TABLE `gmc_request` (
`request_id` int(10) unsigned
,`userid` varchar(11)
,`course_id` int(11)
,`first_name` varchar(50)
,`last_name` varchar(50)
,`middle_name` varchar(50)
,`suffix` varchar(15)
,`email_add` varchar(50)
,`contact` varchar(11)
,`last_sy_attended` varchar(25)
,`date_requested` varchar(73)
,`or_no` varchar(45)
,`purpose` varchar(150)
,`or_pic` blob
);

-- --------------------------------------------------------

--
-- Table structure for table `good_moral_requests`
--

CREATE TABLE `good_moral_requests` (
  `request_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `last_sy_attended` varchar(10) DEFAULT NULL,
  `requested_by` varchar(11) NOT NULL,
  `date_requested` date NOT NULL,
  `or_no` varchar(45) NOT NULL,
  `purpose` varchar(150) NOT NULL,
  `or_pic` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `good_moral_requests`
--

INSERT INTO `good_moral_requests` (`request_id`, `last_sy_attended`, `requested_by`, `date_requested`, `or_no`, `purpose`, `or_pic`) VALUES
(0000000001, '2021-2022', '2021-00001', '2021-07-28', '12345672', 'sdfasdf', 0x66736466);

-- --------------------------------------------------------

--
-- Table structure for table `grantee_history`
--

CREATE TABLE `grantee_history` (
  `id` int(11) NOT NULL,
  `student_id` varchar(10) DEFAULT NULL,
  `program_id` int(11) DEFAULT NULL,
  `student_status` int(11) DEFAULT NULL,
  `record_status` tinyint(4) DEFAULT NULL,
  `semester_year` varchar(45) DEFAULT NULL,
  `semester` varchar(20) DEFAULT NULL,
  `year` varchar(45) DEFAULT NULL,
  `status_allowance` varchar(15) DEFAULT NULL,
  `status_billing` varchar(15) DEFAULT NULL,
  `status_payroll` varchar(15) DEFAULT NULL,
  `status_liquidation` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grantee_history`
--

INSERT INTO `grantee_history` (`id`, `student_id`, `program_id`, `student_status`, `record_status`, `semester_year`, `semester`, `year`, `status_allowance`, `status_billing`, `status_payroll`, `status_liquidation`) VALUES
(11, '2021-00001', 2, 1, 0, '1st Semester 2021-2022', '1st Semester', '2021-2022', NULL, NULL, NULL, NULL),
(12, '2021-00002', 2, 1, 0, '1st Semester 2021-2022', '1st Semester', '2021-2022', NULL, NULL, NULL, NULL),
(13, '2021-00003', 3, 1, 0, '1st Semester 2021-2022', '1st Semester', '2021-2022', NULL, NULL, NULL, NULL),
(14, '2021-00001', 2, 1, 0, '2nd Semester 2021-2022', '2nd Semester', '2021-2022', NULL, NULL, NULL, NULL),
(15, '2021-00002', 2, 1, 0, '2nd Semester 2021-2022', '2nd Semester', '2021-2022', 'RELEASED', NULL, NULL, NULL),
(24, '2021-00003', 3, 1, 0, '2nd Semester 2021-2022', '2nd Semester', '2021-2022', NULL, NULL, NULL, NULL),
(42, '2021-00001', 2, 1, 1, 'Off Semester 2021-2022', 'Off Semester', '2021-2022', NULL, NULL, NULL, NULL),
(43, '2021-00002', 2, 1, 1, 'Off Semester 2021-2022', 'Off Semester', '2021-2022', NULL, NULL, NULL, NULL),
(44, '2021-00003', 3, 1, 1, 'Off Semester 2021-2022', 'Off Semester', '2021-2022', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `group_guidance`
--

CREATE TABLE `group_guidance` (
  `grp_guidance_id` int(11) NOT NULL,
  `appointment_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `year_level` varchar(20) DEFAULT NULL,
  `section` varchar(20) DEFAULT NULL,
  `topic` varchar(100) DEFAULT NULL,
  `meet_link` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `guidance_appointments`
--

CREATE TABLE `guidance_appointments` (
  `appointment_id` int(11) NOT NULL,
  `status_id` int(11) DEFAULT NULL,
  `mode_id` int(11) DEFAULT NULL,
  `date_filed` date DEFAULT NULL,
  `appointment_date` date DEFAULT NULL,
  `appointment_time` time DEFAULT NULL,
  `date_completed` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guidance_appointments`
--

INSERT INTO `guidance_appointments` (`appointment_id`, `status_id`, `mode_id`, `date_filed`, `appointment_date`, `appointment_time`, `date_completed`) VALUES
(56, 2, 2, '2021-08-15', '0000-00-00', '00:00:00', NULL),
(57, 2, 4, '2021-08-15', '2021-08-24', '01:47:00', NULL),
(58, 2, 3, '2021-08-15', '2021-08-17', '08:52:00', NULL),
(59, 2, 3, '2021-08-15', '2021-08-20', '10:20:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `indv_counselling`
--

CREATE TABLE `indv_counselling` (
  `counselling_id` int(11) NOT NULL,
  `appointment_id` int(11) DEFAULT NULL,
  `intake_id` int(11) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `eval_status` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `indv_counselling`
--

INSERT INTO `indv_counselling` (`counselling_id`, `appointment_id`, `intake_id`, `remarks`, `eval_status`) VALUES
(3, 57, 6, NULL, NULL),
(4, 58, 6, NULL, NULL),
(5, 59, 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `intake_form`
--

CREATE TABLE `intake_form` (
  `intake_id` int(11) NOT NULL,
  `Student_id` varchar(10) NOT NULL,
  `status_id` int(11) DEFAULT NULL,
  `intake_type` varchar(100) DEFAULT NULL,
  `date_filed` date DEFAULT NULL,
  `birth_order` varchar(5) DEFAULT NULL,
  `father_name` varchar(100) DEFAULT NULL,
  `father_occupation` varchar(100) DEFAULT NULL,
  `father_con_number` varchar(100) DEFAULT NULL,
  `mother_name` varchar(100) DEFAULT NULL,
  `mother_occupation` varchar(100) DEFAULT NULL,
  `mother_con_number` varchar(100) DEFAULT NULL,
  `parents_address` varchar(200) DEFAULT NULL,
  `elementary_school` varchar(100) DEFAULT NULL,
  `elem_years_atendance` int(12) DEFAULT NULL,
  `elem_year_graduated` int(5) DEFAULT NULL,
  `secondary_school` varchar(100) DEFAULT NULL,
  `sec_years_atendance` int(12) DEFAULT NULL,
  `sec_year_graduated` int(5) DEFAULT NULL,
  `tertiary_school` varchar(100) DEFAULT NULL,
  `ter_years_atendance` int(12) DEFAULT NULL,
  `ter_year_graduated` int(5) DEFAULT NULL,
  `other_school` varchar(100) DEFAULT NULL,
  `other_years_atendance` int(12) DEFAULT NULL,
  `other_year_graduated` int(5) DEFAULT NULL,
  `hhistory_physical` varchar(500) DEFAULT NULL,
  `hhistory_psychiatric` varchar(500) DEFAULT NULL,
  `Q1` varchar(500) DEFAULT NULL,
  `Q2` varchar(500) DEFAULT NULL,
  `Q3` varchar(500) DEFAULT NULL,
  `Q4` varchar(500) DEFAULT NULL,
  `Q5` varchar(500) DEFAULT NULL,
  `Q6` varchar(500) NOT NULL,
  `Q7` varchar(500) DEFAULT NULL,
  `date_completed` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `intake_form`
--

INSERT INTO `intake_form` (`intake_id`, `Student_id`, `status_id`, `intake_type`, `date_filed`, `birth_order`, `father_name`, `father_occupation`, `father_con_number`, `mother_name`, `mother_occupation`, `mother_con_number`, `parents_address`, `elementary_school`, `elem_years_atendance`, `elem_year_graduated`, `secondary_school`, `sec_years_atendance`, `sec_year_graduated`, `tertiary_school`, `ter_years_atendance`, `ter_year_graduated`, `other_school`, `other_years_atendance`, `other_year_graduated`, `hhistory_physical`, `hhistory_psychiatric`, `Q1`, `Q2`, `Q3`, `Q4`, `Q5`, `Q6`, `Q7`, `date_completed`) VALUES
(6, '2018-00001', NULL, 'Call-in', '2021-08-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Purok Matinabangon, Tagum City ', 'Rizal Elementary', 6, 2012, 'Letran', 6, 2018, 'USEP', 4, 2022, '', 0, 0, 'None', 'None', 'Family Problems', 'To seek for advices', 'No', 'No', 'No', '', 'None', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job_hiring_announcement`
--

CREATE TABLE `job_hiring_announcement` (
  `requisition_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(45) NOT NULL,
  `office` varchar(150) NOT NULL,
  `content` varchar(255) NOT NULL,
  `date_posted` varchar(45) NOT NULL,
  `posted_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

--
-- Dumping data for table `list_of_semester`
--

INSERT INTO `list_of_semester` (`semester_id`, `semester`, `year`, `status`) VALUES
(1, '1st Semester', '2021-2022', 'Inactive'),
(2, '2nd Semester', '2021-2022', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `list_of_subjects`
--

CREATE TABLE `list_of_subjects` (
  `subject_id` int(5) NOT NULL,
  `subject_code` varchar(20) NOT NULL,
  `subject_description` varchar(50) NOT NULL,
  `subject_unit` int(10) NOT NULL,
  `course` int(11) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `year` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `list_of_subjects`
--

INSERT INTO `list_of_subjects` (`subject_id`, `subject_code`, `subject_description`, `subject_unit`, `course`, `semester`, `year`) VALUES
(1, 'GE 111', 'Purposive Communication', 3, 7, '1', '1'),
(2, 'GE 112', 'Mathematics in the Modern World', 3, 7, '1', '1'),
(3, 'IC111', 'Programming Paradigm 1', 3, 7, '1', '1'),
(4, 'IC112', 'Professional Ethics in Computing', 3, 7, '1', '1'),
(5, 'IC113', 'Probability and Statistics for Computing', 3, 7, '1', '1'),
(6, 'PE 111', 'Movement Enhancement', 2, 7, '1', '1'),
(7, 'NSTP 111', 'National Service Training Program 1', 3, 7, '1', '1'),
(8, 'GE 113', 'Understanding the Self', 3, 7, '2', '1'),
(9, 'GE 114', 'Ethics', 3, 7, '2', '1'),
(10, 'IC 124', 'Programming Paradigm 2', 3, 7, '2', '1'),
(11, 'IC 125', 'Discrete Math', 3, 7, '2', '1'),
(12, 'IC 126', 'Interaction Design', 3, 7, '2', '1'),
(13, 'IT 121', 'Technopreneurship', 3, 7, '2', '1'),
(14, 'PE 122', 'Fitness Exercise', 2, 7, '2', '1'),
(15, 'NSTP 122', 'National Service Training Program 2', 3, 7, '2', '1');

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
,`scholarship_status` varchar(5)
,`sl_status` varchar(30)
,`staff_office` varchar(50)
,`staff_position` varchar(50)
,`verified_status` varchar(20)
,`account_status` varchar(50)
,`access_level` int(11)
,`e_signature` blob
,`patinfo_status` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `mode_of_communication`
--

CREATE TABLE `mode_of_communication` (
  `mode_id` int(11) NOT NULL,
  `communication_mode` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mode_of_communication`
--

INSERT INTO `mode_of_communication` (`mode_id`, `communication_mode`) VALUES
(1, 'Messenger'),
(2, 'Cellphone'),
(3, 'Google Meet'),
(4, 'Zoom'),
(5, 'Face to Face');

-- --------------------------------------------------------

--
-- Table structure for table `notif`
--

CREATE TABLE `notif` (
  `notif_id` int(10) NOT NULL,
  `user_id` varchar(10) DEFAULT NULL,
  `message_body` varchar(200) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `link` varchar(1000) NOT NULL DEFAULT '#',
  `message_status` varchar(100) NOT NULL DEFAULT 'Delivered',
  `office_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notif`
--

INSERT INTO `notif` (`notif_id`, `user_id`, `message_body`, `time`, `link`, `message_status`, `office_id`) VALUES
(29, NULL, 'NSTP Office\'s Head has submitted a requisition form.', '2021-08-11 10:45:31', '../M-Admin/Labor-Requisition.php', 'Seen', 1),
(30, '1000000002', 'OSAS has Approved your requisition form.', '2021-08-11 10:46:02', '../M-FacultyHead/Labor-Requisition.php', 'Delivered', NULL),
(31, '1000000002', 'Osas has posted your student labor requisition form #00000000021', '2021-08-11 10:46:25', '../M-FacultyHead/Labor-Requisition.php', 'Delivered', NULL),
(32, '1000000002', 'A student has responded to your student labor request.', '2021-08-11 10:48:28', '../M-FacultyHead/Labor-Applicants.php', 'Seen', NULL),
(33, NULL, 'A student has responded to a job posting.', '2021-08-11 10:48:28', '../M-Admin/Labor-Application.php', 'Seen', 1),
(34, '1000000002', 'A student has responded to your student labor request.', '2021-08-11 10:50:21', '../M-FacultyHead/Labor-Applicants.php', 'Delivered', NULL),
(35, NULL, 'A student has responded to a job posting.', '2021-08-11 10:50:21', '../M-Admin/Labor-Application.php', 'Seen', 1),
(36, '2021-00001', 'Congratulations! Your application has been approved by the Unit Head!', '2021-08-11 10:51:33', '../O-StudentDefault/index.php', 'Delivered', NULL),
(37, NULL, 'A recommendation letter has been attached to application #0000000008', '2021-08-11 10:51:33', '../M-Admin/Labor-Application.php', 'Delivered', 1),
(38, '2021-00001', 'Congratulations! Your application has been approved by the Unit Head!', '2021-08-11 10:52:35', '../O-StudentDefault/index.php', 'Delivered', NULL),
(39, NULL, 'A recommendation letter has been attached to application #0000000008', '2021-08-11 10:52:35', '../M-Admin/Labor-Application.php', 'Delivered', 1),
(40, '2021-00001', 'Congratulations! Your application form has been approved! Click the button below to sign the contract!', '2021-08-11 10:52:35', '../O-StudentDefault/Home-Labor.php?applicationid=0000000008', 'Seen', NULL),
(41, '2021-00001', 'Congratulations! Your application has been approved by the Unit Head!', '2021-08-11 10:53:26', '../O-StudentDefault/index.php', 'Delivered', NULL),
(42, NULL, 'A recommendation letter has been attached to application #0000000008', '2021-08-11 10:53:26', '../M-Admin/Labor-Application.php', 'Delivered', 1),
(43, '1000000002', 'Congratulations! You have a new addition to your staff. Harry Potter has been officially hired!', '2021-08-11 10:53:26', '../M-FacultyHead/Labor-Applicants.php', 'Delivered', NULL),
(44, NULL, 'Harry Potter has signed his/her student labor application contract!', '2021-08-11 10:53:26', '../M-Admin/Labor-Application.php', 'Delivered', 1),
(45, '2021-00002', 'You student labor application has not been approved.', '2021-08-11 10:53:26', '../O-StudentDefault/index.php', 'Seen', NULL),
(46, '1000000002', 'Osas has posted your student labor requisition form #00000000021', '2021-08-11 10:53:26', '../M-FacultyHead/Labor-Requisition.php', 'Delivered', NULL),
(47, '', 'A new counselling has been submitted.', '2021-08-15 17:47:50', 'Guidance_Counselling.php', 'Delivered', NULL),
(48, '', 'A new counselling has been submitted.', '2021-08-15 17:52:18', 'Guidance_Counselling.php', 'Delivered', NULL),
(49, '', 'A new counselling has been submitted.', '2021-08-15 18:05:57', 'Guidance_Counselling.php', 'Delivered', NULL);

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
(5, 'Registrar', 'Active'),
(6, 'NSTP Office', 'Active');

-- --------------------------------------------------------

--
-- Stand-in structure for view `office_dept_heads`
-- (See below for the actual view)
--
CREATE TABLE `office_dept_heads` (
`id` int(11)
,`name` varchar(50)
,`office_type` varchar(10)
,`staff_id` int(11)
,`fullname` varchar(150)
,`access_level` int(11)
);

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
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `participant_id` int(11) NOT NULL,
  `grp_guidance_id` int(11) DEFAULT NULL,
  `Student_id` varchar(10) NOT NULL,
  `attendance` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `patient_health_record_medical`
--

CREATE TABLE `patient_health_record_medical` (
  `id` int(11) NOT NULL,
  `patient_id` varchar(11) NOT NULL,
  `general_appearance` varchar(100) NOT NULL,
  `height` varchar(50) NOT NULL,
  `weight` varchar(50) NOT NULL,
  `pulse_rate` varchar(50) NOT NULL,
  `respiration_rate` varchar(50) NOT NULL,
  `temperature` varchar(50) NOT NULL,
  `blood_pressure` varchar(255) NOT NULL,
  `cardiac_rate_at_rest` varchar(255) NOT NULL,
  `cardiac_rate_after_activity` varchar(255) NOT NULL,
  `infectious_disease` varchar(100) NOT NULL,
  `social_history` varchar(100) NOT NULL,
  `family_history` varchar(100) NOT NULL,
  `system_review` varchar(100) NOT NULL,
  `skin` varchar(100) NOT NULL,
  `lymph_nodes` varchar(100) NOT NULL,
  `integument_system` varchar(100) NOT NULL,
  `circulatory_system` varchar(100) NOT NULL,
  `endocrine_system` varchar(100) NOT NULL,
  `allergic_immunologic_history` varchar(100) NOT NULL,
  `heent` varchar(100) NOT NULL,
  `mouth` varchar(100) NOT NULL,
  `breast` varchar(100) NOT NULL,
  `respiratory_system` varchar(100) NOT NULL,
  `cardiovascular_system` varchar(100) NOT NULL,
  `gastrointestinal_system` varchar(100) NOT NULL,
  `genitourinary_tract` varchar(100) NOT NULL,
  `psychiatric_history` varchar(100) NOT NULL,
  `date_filled_out_by_nurse` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
,`age` int(11)
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
,`operation_when` varchar(15)
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
-- Stand-in structure for view `promotional_report`
-- (See below for the actual view)
--
CREATE TABLE `promotional_report` (
`id` int(11)
,`student_id` varchar(10)
,`semester` varchar(45)
,`schoolyear` varchar(45)
,`last_name` varchar(50)
,`first_name` varchar(50)
,`middle_name` varchar(50)
,`suffix` varchar(15)
,`sex` varchar(10)
,`birthdate` varchar(10)
,`course` varchar(255)
,`student_yearlevel` varchar(45)
,`subject_code1` varchar(15)
,`sub_desc1` varchar(45)
,`units1` int(1)
,`grade1` float
,`subject_code2` varchar(15)
,`sub_desc2` varchar(45)
,`units2` int(1)
,`grade2` float
,`subject_code3` varchar(15)
,`sub_desc3` varchar(45)
,`units3` int(1)
,`grade3` float
,`subject_code4` varchar(15)
,`sub_desc4` varchar(45)
,`units4` int(1)
,`grade4` float
,`subject_code5` varchar(15)
,`sub_desc5` varchar(45)
,`units5` int(1)
,`grade5` float
,`subject_code6` varchar(15)
,`sub_desc6` varchar(45)
,`units6` int(1)
,`grade6` float
,`subject_code7` varchar(15)
,`sub_desc7` varchar(45)
,`units7` int(1)
,`grade7` float
,`subject_code8` varchar(15)
,`sub_desc8` varchar(45)
,`units8` int(1)
,`grade8` float
,`subject_code9` varchar(15)
,`sub_desc9` varchar(45)
,`units9` int(1)
,`grade9` float
,`totalunits` bigint(19)
,`gwa` char(0)
,`graduate_question` varchar(3)
);

-- --------------------------------------------------------

--
-- Table structure for table `referral_form`
--

CREATE TABLE `referral_form` (
  `referral_id` int(11) NOT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `Student_id` varchar(10) NOT NULL,
  `status_id` int(11) DEFAULT NULL,
  `academics` varchar(100) DEFAULT NULL,
  `personal_social` varchar(100) DEFAULT NULL,
  `career` varchar(100) DEFAULT NULL,
  `date_filed` date DEFAULT NULL,
  `notes` varchar(50) DEFAULT NULL,
  `refdate_completed` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `referral_form`
--

INSERT INTO `referral_form` (`referral_id`, `staff_id`, `Student_id`, `status_id`, `academics`, `personal_social`, `career`, `date_filed`, `notes`, `refdate_completed`) VALUES
(9, 1000000001, '2018-00001', 2, 'Attendance (tardiness/absences),Study Habits/Attitude/Skills', 'Emotional,Interpersonal Skills', 'Planning,Decision Making', '2021-08-17', NULL, NULL),
(10, 1000000002, '2018-00001', 2, 'Attendance (tardiness/absences),Study Habits/Attitude/Skills', 'Emotional,Interpersonal Skills', 'Planning,Decision Making', '2021-08-16', NULL, NULL);

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
,`address` varchar(255)
,`phone_number` varchar(11)
,`email_add` varchar(50)
,`type` varchar(50)
,`date_requested` date
,`purpose` varchar(25)
,`request_type` varchar(45)
,`required_document` varchar(45)
,`document_passed` varchar(150)
,`certificate_location` varchar(150)
,`date_released` date
,`status` varchar(10)
,`CBC` int(5)
,`PLATELET` int(5)
,`HEMOTOCRIT` int(5)
,`HEMOGLOBIN` int(5)
,`Urinalysis` int(5)
,`Fecalysis` int(5)
,`FBS` int(5)
,`sua` int(5)
,`Creatinine` int(5)
,`Lipid` int(5)
,`SGOT` int(5)
,`SGPT` int(5)
,`others` int(5)
,`other_text` text
,`cbc_loc` varchar(255)
,`platelet_loc` varchar(255)
,`hema_loc` varchar(255)
,`hemo_loc` varchar(255)
,`urine_loc` varchar(255)
,`fecal_loc` varchar(255)
,`fbs_loc` varchar(255)
,`sua_loc` varchar(255)
,`creat_loc` varchar(255)
,`lipid_loc` varchar(255)
,`sgot_loc` varchar(255)
,`sgpt_loc` varchar(255)
,`others_loc` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `requisition_form`
--

CREATE TABLE `requisition_form` (
  `id` int(11) UNSIGNED ZEROFILL NOT NULL,
  `requested_by` int(11) NOT NULL,
  `no_of_sl` int(2) NOT NULL,
  `length_of_service` int(11) NOT NULL,
  `qualification1` varchar(45) DEFAULT NULL,
  `qualification2` varchar(45) DEFAULT NULL,
  `qualification3` varchar(45) DEFAULT NULL,
  `skill1` varchar(45) DEFAULT NULL,
  `skill2` varchar(45) DEFAULT NULL,
  `additional_workload_reason` tinyint(4) DEFAULT 0,
  `reduction_in_workload_reason` tinyint(4) DEFAULT 0,
  `reached_saturation_reason` tinyint(4) DEFAULT 0,
  `other_reason` varchar(50) DEFAULT NULL,
  `requisition_status` varchar(50) NOT NULL,
  `date_submitted` date NOT NULL,
  `assessed_by` int(11) DEFAULT NULL,
  `date_approved_disapproved` date DEFAULT NULL,
  `date_posted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requisition_form`
--

INSERT INTO `requisition_form` (`id`, `requested_by`, `no_of_sl`, `length_of_service`, `qualification1`, `qualification2`, `qualification3`, `skill1`, `skill2`, `additional_workload_reason`, `reduction_in_workload_reason`, `reached_saturation_reason`, `other_reason`, `requisition_status`, `date_submitted`, `assessed_by`, `date_approved_disapproved`, `date_posted`) VALUES
(00000000021, 1000000002, 1, 2, 'Hawd muhinlo', '', '', 'Excellent Organizational Skill', '', 1, 0, 0, '', 'Completed', '2021-08-11', 1000000001, '2021-08-11', '2021-08-11');

--
-- Triggers `requisition_form`
--
DELIMITER $$
CREATE TRIGGER `after_requisition_form_update` AFTER UPDATE ON `requisition_form` FOR EACH ROW BEGIN
    IF old.requisition_status<>new.requisition_status and (new.requisition_status = 'Approved' or new.requisition_status = 'Not Approved') THEN
        INSERT INTO notif (user_id,message_body,link) 
		VALUES (old.requested_by,CONCAT('OSAS has ',new.requisition_status,' your requisition form.'),'../M-FacultyHead/Labor-Requisition.php');
     END IF;    
    IF new.date_posted IS NOT NULL THEN
		INSERT INTO notif (user_id,message_body,link) 
		VALUES (old.requested_by,CONCAT('Osas has posted your student labor requisition form #',OLD.id),'../M-FacultyHead/Labor-Requisition.php');
    END IF;    
END
$$
DELIMITER ;

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
(7, 1, 'Done', '2018-00001', '2021-08-03 02:48:20', 'Discipline-Response.php', 'Lorem Ipsum', '2021-08-04', '15:13:00', NULL, 'Google Meet', 'https:/google.meet.com/', '17545322', '98352326', '', 1),
(21, 2, 'Done', '2018-00002', '2021-08-03 02:48:20', NULL, '', '2021-08-04', '16:00:00', NULL, '', 'Refer to Dean', '', '', 'Dean', 0),
(29, 4, 'Done', '2018-00001', '2021-08-04 02:16:05', 'Discipline-Response.php', '', NULL, NULL, NULL, '', '', '', '', 'OSAS', 1),
(30, 5, 'On Going', '2018-00001', '2021-08-04 04:45:25', 'Discipline-Response.php', 'Lorem Ipsum', '2021-08-05', '11:00:00', NULL, 'Google Meet', 'https:/google.meet.com/', '17545322', '98352326', 'OSAS', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `scholarship_general_info`
-- (See below for the actual view)
--
CREATE TABLE `scholarship_general_info` (
`grantee_id` int(11)
,`student_id` varchar(10)
,`last_name` varchar(50)
,`first_name` varchar(50)
,`middle_name` varchar(50)
,`suffix` varchar(15)
,`fullname` varchar(150)
,`course_id` int(11)
,`year_level` varchar(20)
,`coursetitle` varchar(20)
,`coursename` varchar(150)
,`major` varchar(150)
,`college_id` varchar(150)
,`college_name` varchar(150)
,`phone_number` varchar(11)
,`email_add` varchar(50)
,`living_with` varchar(50)
,`others_specify` varchar(150)
,`guardian_contact` varchar(11)
,`city_address` varchar(50)
,`parent_name` varchar(50)
,`parent_occupation` varchar(20)
,`parents_address` varchar(45)
,`parents_contact` varchar(45)
,`spouse_name` varchar(45)
,`spouse_occupation` varchar(45)
,`prev_gwa` float
,`prev_total_units` int(11)
,`program_id` int(11)
,`program_name` varchar(50)
,`program_provider` varchar(50)
,`program_status` varchar(50)
,`program_type` varchar(50)
,`sem_year_id` int(11)
,`semester_year` varchar(45)
,`semester` varchar(20)
,`year` varchar(45)
,`amount` varchar(20)
,`student_status` int(11)
,`status_name` varchar(50)
,`record_status` tinyint(4)
,`billing_status` varchar(15)
,`payroll_status` varchar(15)
,`liquidation_status` varchar(15)
,`allowance_status` varchar(15)
);

-- --------------------------------------------------------

--
-- Table structure for table `scholarship_grantee`
--

CREATE TABLE `scholarship_grantee` (
  `scholar_id` int(11) NOT NULL,
  `scholar_program_id` int(11) NOT NULL,
  `student_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `semester_schoolyear` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `gwa` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `total_units` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `endorsement` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `scholarship_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `card_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `scholarship_grantee`
--

INSERT INTO `scholarship_grantee` (`scholar_id`, `scholar_program_id`, `student_id`, `semester_schoolyear`, `gwa`, `total_units`, `type`, `endorsement`, `scholarship_status`, `card_status`) VALUES
(10001, 10001, '1209', '', '', '', '', '', '', ''),
(10003, 10001, '123', '', '', '', '', '', '', '');

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
('2021-07-20', 1, 'Montera Gwapo', '11021999', '2000-11-02', '10293091203', '2020-12-31', '2147483647', 0x506170612048496768205363686f6f6c204469706c6f6d612e706466),
('2021-07-28', 2, 'sdfg', '1', '2021-07-28', 'adf', '2018-08-28', '2', 0x6a);

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
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `id` int(11) NOT NULL,
  `section_name` varchar(45) NOT NULL,
  `course_id` int(11) NOT NULL,
  `yearlevel` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `seminar_evaluation`
--

CREATE TABLE `seminar_evaluation` (
  `seminar_eval_id` int(11) NOT NULL,
  `Student_id` varchar(10) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `act_title` varchar(200) DEFAULT NULL,
  `venue` varchar(200) DEFAULT NULL,
  `act_date` date DEFAULT NULL,
  `content_q1` varchar(100) DEFAULT NULL,
  `content_q2` varchar(100) DEFAULT NULL,
  `content_q3` varchar(100) DEFAULT NULL,
  `content_q4` varchar(100) DEFAULT NULL,
  `content_q5` varchar(100) DEFAULT NULL,
  `content_q6` varchar(100) DEFAULT NULL,
  `content_q7` varchar(100) DEFAULT NULL,
  `content_q8` varchar(100) DEFAULT NULL,
  `content_q9` varchar(100) DEFAULT NULL,
  `content_q10` varchar(100) DEFAULT NULL,
  `speaker_name` varchar(100) DEFAULT NULL,
  `topic` varchar(100) DEFAULT NULL,
  `resource_q1` varchar(100) DEFAULT NULL,
  `resource_q2` varchar(100) DEFAULT NULL,
  `resource_q3` varchar(100) DEFAULT NULL,
  `resource_q4` varchar(100) DEFAULT NULL,
  `resource_q5` varchar(100) DEFAULT NULL,
  `resource_q6` varchar(100) DEFAULT NULL,
  `comments` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sl_acceptance_details`
--

CREATE TABLE `sl_acceptance_details` (
  `applicant_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `duty1` varchar(150) DEFAULT NULL,
  `duty2` varchar(150) DEFAULT NULL,
  `duty3` varchar(150) DEFAULT NULL,
  `duty4` varchar(150) DEFAULT NULL,
  `schedule1` varchar(50) DEFAULT NULL,
  `schedule2` varchar(50) DEFAULT NULL,
  `office_asignment` varchar(45) DEFAULT NULL,
  `starting_date` date NOT NULL,
  `expiration_date` date NOT NULL,
  `date_signed` date DEFAULT NULL,
  `dean_unit_assigned` varchar(150) DEFAULT NULL,
  `budget_officer` varchar(150) DEFAULT NULL,
  `chancellor` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sl_acceptance_details`
--

INSERT INTO `sl_acceptance_details` (`applicant_id`, `duty1`, `duty2`, `duty3`, `duty4`, `schedule1`, `schedule2`, `office_asignment`, `starting_date`, `expiration_date`, `date_signed`, `dean_unit_assigned`, `budget_officer`, `chancellor`) VALUES
(0000000008, 'Hawd muhinlo', '', '', '', 'Vacant Time only', '', 'NSTP Office', '2021-08-11', '2021-10-11', '2021-08-11', '', 'GERMA V. DURAN', 'CESAR S. LIMBAGA, SR., PHD');

--
-- Triggers `sl_acceptance_details`
--
DELIMITER $$
CREATE TRIGGER `after_sl_acceptance_details_insert` AFTER INSERT ON `sl_acceptance_details` FOR EACH ROW BEGIN
    UPDATE sl_applicant SET status = 'Approved by OSAS' WHERE applicant_id = NEW.applicant_id;
    INSERT INTO notif (user_id,message_body,link) VALUES (sf_get_data_from_sl_applicant_by_id('student_id',NEW.applicant_id),'Congratulations! Your application form has been approved! Click the button below to sign the contract!',CONCAT('../O-StudentDefault/Home-Labor.php?applicationid=',NEW.applicant_id));
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_sl_acceptance_details_update` AFTER UPDATE ON `sl_acceptance_details` FOR EACH ROW BEGIN
	DECLARE studentname VARCHAR(150);
    IF new.date_signed is not null THEN
		SET studentname = sf_get_user_name(sf_get_data_from_sl_applicant_by_id('student_id',OLD.applicant_id));
		UPDATE sl_applicant SET status = 'Hired' WHERE applicant_id = OLD.applicant_id;
        DELETE FROM notif WHERE user_id = sf_get_data_from_sl_applicant_by_id('student_id',OLD.applicant_id) and message_body like '%application%';
        INSERT INTO notif (user_id,message_body,link) VALUES (sf_get_data_from_requisition_form_by_id('requested_by',sf_get_data_from_sl_applicant_by_id('assigned_to',OLD.applicant_id)),CONCAT('Congratulations! You have a new addition to your staff. ',studentname,' has been officially hired!'),'../M-FacultyHead/Labor-Applicants.php');
		INSERT INTO notif (office_id,message_body,link) VALUES (sf_get_office_id('OSAS'),CONCAT(studentname,' has signed his/her student labor application contract!'),'../M-Admin/Labor-Application.php');
		call MainCheckVacancyThenUpdateTables(sf_get_data_from_sl_applicant_by_id('assigned_to',OLD.applicant_id));
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `sl_applicant`
--

CREATE TABLE `sl_applicant` (
  `applicant_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `student_id` varchar(10) NOT NULL,
  `labor_type` varchar(20) NOT NULL,
  `labor_class` varchar(10) NOT NULL,
  `labor_status` varchar(10) NOT NULL,
  `semester_year` varchar(25) NOT NULL,
  `available_from` time DEFAULT NULL,
  `available_to` time DEFAULT NULL,
  `assigned_to` int(10) UNSIGNED NOT NULL,
  `grades_location` varchar(150) NOT NULL,
  `cor_location` varchar(150) NOT NULL,
  `unit_head_letter_location` varchar(150) NOT NULL,
  `osas_head_letter_location` varchar(150) NOT NULL,
  `date_submitted` date NOT NULL,
  `status` varchar(45) NOT NULL DEFAULT 'Pending for Unit Head Approval',
  `recommendation_location` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sl_applicant`
--

INSERT INTO `sl_applicant` (`applicant_id`, `student_id`, `labor_type`, `labor_class`, `labor_status`, `semester_year`, `available_from`, `available_to`, `assigned_to`, `grades_location`, `cor_location`, `unit_head_letter_location`, `osas_head_letter_location`, `date_submitted`, `status`, `recommendation_location`) VALUES
(0000000008, '2021-00001', 'Paid Labor (SL)', 'Day', 'New', '2nd Semester 2021-2022', '13:00:00', '17:00:00', 21, 'student-application-grades-certification/aaa_1628678907.pdf', 'student-application-current-cor/aaa_1628678908.pdf', 'student-application-unit-head-letter-of-intent/aaa_1628678908.pdf', 'student-application-osas-head-letter-of-intent/aaa_1628678908.pdf', '2021-08-11', 'Hired', 'student-application-recommendation-letter/aaa_1628679093.pdf'),
(0000000009, '2021-00002', 'Paid Labor (SL)', 'Day', 'New', '2nd Semester 2021-2022', '13:00:00', '17:00:00', 21, 'student-application-grades-certification/aaa_1628679021.pdf', 'student-application-current-cor/aaa_1628679021.pdf', 'student-application-unit-head-letter-of-intent/aaa_1628679021.pdf', 'student-application-osas-head-letter-of-intent/aaa_1628679021.pdf', '2021-08-11', 'Not Approved', NULL);

--
-- Triggers `sl_applicant`
--
DELIMITER $$
CREATE TRIGGER `after_sl_applicant_insert` AFTER INSERT ON `sl_applicant` FOR EACH ROW BEGIN
    INSERT INTO notif (user_id,message_body,link) VALUES (sf_get_data_from_requisition_form_by_id('requested_by',NEW.assigned_to),'A student has responded to your student labor request.','../M-FacultyHead/Labor-Applicants.php');
    INSERT INTO notif (office_id,message_body,link) VALUES (sf_get_office_id('OSAS'),'A student has responded to a job posting.','../M-Admin/Labor-Application.php');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_sl_applicant_update` AFTER UPDATE ON `sl_applicant` FOR EACH ROW BEGIN
    IF new.recommendation_location is not null THEN
        INSERT INTO notif (user_id,message_body,link) VALUES (old.student_id,'Congratulations! Your application has been approved by the Unit Head!','../O-StudentDefault/index.php');
        INSERT INTO notif (office_id,message_body,link) VALUES (sf_get_office_id('OSAS'),CONCAT('A recommendation letter has been attached to application #',OLD.applicant_id),'../M-Admin/Labor-Application.php');		
    END IF;
    
    IF new.status = 'Not Approved' THEN
		INSERT INTO notif (user_id,message_body,link) VALUES (old.student_id,'Your student labor application has not been approved.','../O-StudentDefault/index.php');		
    END IF;
    
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `sl_application_form_details`
-- (See below for the actual view)
--
CREATE TABLE `sl_application_form_details` (
`requisition_id` int(11) unsigned zerofill
,`applicant_id` int(10) unsigned zerofill
,`student_id` varchar(10)
,`applicant_name` varchar(150)
,`college` varchar(150)
,`section` varchar(20)
,`course` varchar(20)
,`year_level` varchar(20)
,`full_address` varchar(255)
,`phone_number` varchar(11)
,`applicant_bday` varchar(10)
,`email_add` varchar(50)
,`birth_place` varchar(50)
,`labor_type` varchar(20)
,`labor_class` varchar(10)
,`labor_status` varchar(10)
,`semester_year` varchar(25)
,`e_signature` blob
,`time_available` varchar(19)
,`requested_by` int(11)
,`staff_requested_by` varchar(150)
,`head_signature` blob
,`office_name` varchar(50)
,`office_type` varchar(10)
,`no_of_sl` int(2)
,`length_of_service` int(11)
,`qualification1` varchar(45)
,`qualification2` varchar(45)
,`qualification3` varchar(45)
,`skill1` varchar(45)
,`skill2` varchar(45)
,`additional_workload_reason` tinyint(4)
,`reduction_in_workload_reason` tinyint(4)
,`reached_saturation_reason` tinyint(4)
,`other_reason` varchar(50)
,`requisition_status` varchar(50)
,`requisition_date_submitted` varchar(73)
,`assessed_by` int(11)
,`assessed_name` varchar(150)
,`assessor_signature` blob
,`duty1` varchar(150)
,`duty2` varchar(150)
,`duty3` varchar(150)
,`duty4` varchar(150)
,`schedule1` varchar(50)
,`schedule2` varchar(50)
,`starting_date` date
,`expiration_date` date
,`dean_unit_assigned` varchar(150)
,`budget_officer` varchar(150)
,`chancellor` varchar(150)
,`date_signed` date
,`grades_location` varchar(150)
,`cor_location` varchar(150)
,`unit_head_letter_location` varchar(150)
,`osas_head_letter_location` varchar(150)
,`recommendation_location` varchar(150)
,`status` varchar(45)
,`recommendation_status` int(1)
,`acceptance_contract_status` int(1)
,`student_sign_status` int(1)
);

-- --------------------------------------------------------

--
-- Table structure for table `sl_dtr`
--

CREATE TABLE `sl_dtr` (
  `id` int(11) NOT NULL,
  `applicant_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `sl_datetime` datetime NOT NULL,
  `in_out` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sl_dtr`
--

INSERT INTO `sl_dtr` (`id`, `applicant_id`, `sl_datetime`, `in_out`) VALUES
(1, 0000000008, '2021-08-11 00:00:00', 'IN');

-- --------------------------------------------------------

--
-- Stand-in structure for view `sl_reqform_general_info`
-- (See below for the actual view)
--
CREATE TABLE `sl_reqform_general_info` (
`requisition_id` int(11) unsigned zerofill
,`requested_by` int(11)
,`head_signature` blob
,`fullname` varchar(150)
,`office_name` varchar(50)
,`office_type` varchar(10)
,`no_of_sl` int(2)
,`no_of_applicants` int(11)
,`no_of_hired` int(11)
,`no_of_vacancies` bigint(12)
,`length_of_service` int(11)
,`qualification1` varchar(45)
,`qualification2` varchar(45)
,`qualification3` varchar(45)
,`skill1` varchar(45)
,`skill2` varchar(45)
,`additional_workload_reason` tinyint(4)
,`reduction_in_workload_reason` tinyint(4)
,`reached_saturation_reason` tinyint(4)
,`other_reason` varchar(50)
,`requisition_status` varchar(50)
,`date_submitted` varchar(10)
,`assessed_by` int(11)
,`assessed_name` varchar(150)
,`assessor_signature` blob
,`date_approved_disapproved` date
,`date_posted` date
);

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
  `address` varchar(45) NOT NULL DEFAULT 'N/A',
  `type` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `access_level` int(1) NOT NULL DEFAULT 1,
  `employment_status` varchar(20) DEFAULT NULL,
  `account_status` varchar(10) NOT NULL DEFAULT 'Active',
  `e_signature` blob DEFAULT NULL,
  `pic` blob DEFAULT NULL,
  `date_submitted` date NOT NULL,
  `date_verified` date DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `patinfo_status` int(11) NOT NULL DEFAULT 0,
  `license_number` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `office_id`, `dept_id`, `title`, `last_name`, `first_name`, `middle_name`, `suffix`, `extension`, `sex`, `civil_status`, `birthdate`, `email_add`, `phone_num`, `religion`, `nationality`, `address`, `type`, `position`, `access_level`, `employment_status`, `account_status`, `e_signature`, `pic`, `date_submitted`, `date_verified`, `password`, `patinfo_status`, `license_number`) VALUES
(1, 0, 5, NULL, 'Snape', 'Severus', NULL, NULL, 'PhD', 'Male', 'Single', '1989-02-15', 'snape@gmail.com', '09412554125', NULL, 'American', 'N/A', 'Faculty', 'Faculty', 1, 'Regular', 'Active', 0x89504e470d0a1a0a0000000d49484452000001300000021c0806000000717df223000000097048597300000ec400000ec401952b0e1b000041d749444154785eeddd097864d75de77dada5aa5249a57ddf5a6b776be956ef6dbbdb5becd8244e9c10629210028190306102f3c030c0f0c2bc2c7979199810664870124292992c182780e37d8be3b5f7456ab5f67d57692955492595a492e677bc40b0dd6e2d55a592f4ede7e927e0aeaa7befe7de3a75cefffccfff4445f10701041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104020c204a223ec7c42763acb81a598959595d8e5e540ec722010bfbcb212f3daff2ec746454547c5c5c5cdc7c55b7c3131314bb1b1712b213b113e1801048226b0ed1bb0c5057fc2fcdc6cea8cd793e3f54ee78c8d8e54793dd339f3f3f3c9f373732981a895d8f8f8f825674aea606e6ede958c8cacd64447f2b0cd669f548336a7c66c3968da7c1002080455605b36604b8b0b16355c89336ab0da9a9beeeeede93e31353999af462b617e7ecea21ed752bc257e2e3a3a7a797139109f98983867b3d916a2d5fd8a8d8d8d723a53260a8b8a5f2c28287e252d3db3393ede32131b171f08aa3c1f8600021b16d8560d586071214e0d54cac8d040fdd5c6cbf7f6f7f5d68f8d8de669e818adde556b6171c9858cccacb6f48cccae2467ca487c5cfcbc7f71c11e1717bbb8b4b4649d9c182f1b1e1a38ecf14c17fb66677396979763aa6b6a7f90671ab2b48cd604ab7d66c3e27c000208044d605b346081a5a5d805ff5cf2406ff7b1f3674ffd627757e7a140607925253575480d5773764e6e43e59eea279d296983b171717ef5bc02ea51bd25ceb5b4b4f86a5c6c71d19f34ee1addddd27ce5debedede63fa9cf1dd7baaff715769c55336bbc3458c2c68cf1f1f84c08604b67c03a686cb363539b1ebc2f9331f6b6cb87c8fc7e34929282c6ca8af3ff8fd5d65152f24253b87e3e2e2fd1a062ead556a7ecee7181f1bd97df6f4cbff717cdc55515151f5645dfda16f295ed6cb9072ad9abc1e81e00b6cd9064c31ae58dfac37cb345c2d2dcd778dbb5c45b97979ad75fbeabfbfabb4fc856467ca6042826d7ea364ea95457ba7a78a2f9c3bfdc9e6a62befcfcdcb6fbce5f63bff28352db343013302fc1b05e6fd086c40206e03efddb4b79a99c5e1c1fe7da75f79f1975a5a9b6f494d4b1bbaf1c4c9afd6d6d5ff40c3c45e8b2561cdbdad6b5d8c7a6f66a8d9333d357effb47b3aa7bbbbf3e6332fbff8b9e3276efeef4acde88b21e562d39e030e8cc0966bc016e6e7ec7d3d9d37bcf4fc8f7eb3b5b5b56e6f6ddd33276fb9edaf7272f39be2e313fca1baa5ced48cc1c9f1b1cf279e7a69b2a5b9e91ee5912d9fbcf55d9fd7f14642754c3e170104de59604b3560fe799fa3b3bde58ee79e7deaf7a7a7a7d3f6d71f78e2d63beefa9394d4f41ef594423e9c4bcbc8ea99181fbddf35e12a6d6d6b79575a664687cee9ef343b39cb83860002e117d8323130d3f36abc7cfe232fbdf0e3df527a43d4818387bfa980fab7939253cccc62c81baf376e8d663ca307067a0e3fffdc33bfe7999e2e78cffbeefdcf79f945af582cd60dc7dbc27ffb3922025b5b604b3460a6e7d5ddd176db534f3cfaa74b8140ecedefbaf3f395bb6b1eb22458bd0aa4877dd98f1265e3babbda6f7ee2b187ff3427277bf8a693b7fd716676de25b2f6b7f697e19dce7e76c6a3951bbe64a5e0ac444745afe8477341cfdfac49cbd10c77d87e40b7aff0faae2ce287900bfe795be3c5731ffad1b34ffd8ef2e4576ebee5b6ff51b1bbfa61ab3dd1b3be4bdef8bbb4c468696e6ef6746dddbe07cf9c79f95359d939ef4b76a6f6e993c737fee97c42a40978dc93e98ffef09f7ea5ada5e5e6a42487df96609dd70f6994d269fa0f1d3bfea0cf37d364b73bbc9176de3be17c22ba015b5af05bae5eb9fcde271e7fe4f7944d9f70dbed777ca16a6fcdbf2899d4bdd937c7664b9c99764f7ebbadadf9ceb3674e7d34332ba7512917ffa2585cd0664037fb1a39fe6b029d1dedf5cf3ff7a3fb262726f6a9018b5a092c4769e54694d56a9d1d1c1ed8f3a1fb3ef65f0381a5067ae0e17f6262c27fc8d51d51a912f1dd9d6d279f7cfc913f5c5c5c4c3a70f0d00f6a15f37224a78cadee1342ff2a9bdd3eb9bffed03f98614563c3858f69989113faa37284700be4e4e6f6949695b5381c89012dfc8fb2dbed515a3f1ba575b3898343037ba7dd53d92b2b5111fb5d0ab757388f17b1e86e65d73ff5c463bf37393999555b5bf7f8b11b4e7ed19ee888a8219a02f7fedd7b6a1ececb2f38d7ddddb5bfafb7eb66c5c7e2c379033956e805b4a0bfbfbaa6ee99788b65c8ebf546cdcece46b9ddee289fe2088585c5a7d4fbee5639267adea1bf156f39424436605e8f3bfbece9973e353a3a52b17f7ffdd337dd7cdb5f24a7a4f59b18d82618bde3216df6c4f1bdd5b51a3ac62d7476b6dfadc5e46991768e9ccfc60412ac367ffda1a38fedd95bf74347524a4b4c6cfc585676dee5c3476ff8fa873efcd13f5609a6fe8d1d8177af5720e262604a9750aee88f7f5eeb1a3f54b26b57cba1a3c7bfaefcab76cdf64464399bb8384b606ad2753a2b2bbb7b7464b8d6e371170796165d5a2bc9ccd47a9fca087c9f7a5903a3c3437fded9defa94d7e3492f2ed9d554505cd26cb5d96614f78cc867330219837e4a11d5802daa8ed7c8605fede54b173ea6b852d4e123c7be915f58724ab37e0b41bff2207ea0dd9e38999191d9d6d878b9c6353a5c93999973591f1fb25501413c753e6a0d02d9b979bd4b8b8bfd9a503285e3028a8145dc88600d97b32d5e1a5143c879df6cfa8573673ea91843b652149e2829ad7846ddf788afc1a5d9277f5a7a468b1eee98d1d1e1bd8b4b0bf66df17470116f11888b8f5f562c4c65c769bc22e1f18898062cb0b4106b02f79ab2be2d292969a26effc16f596d8913918074bd735025d7a5d4b48c0ec5c1e64c691ffffc9cf37aefe1df114060e30211d380290521f7d285d3bf3ce3f3265755ef7d22232bfb8a7eed16377e89a1ff0493ffe374a6f65be2ed931e8f2fddef5f480afd5139020208444403a6c0bda3aba3f5aea1c181930adc5fddbdbbe6fb0a8c6ea905d271b1f1f39a6898531c2f7161c1efd0ee475b6299165f0104b6b2404434605eaf3bef4ae3e59f9bf7fbe30e1c3cfab5acecdc4b5bade2a9f60309e8efb2dfef4f999df1e69840ef567e30387704b682c0a67fc95412daded17af53dfd7d7d7b54bbfe6a7149d9b396049b6f2be0fde439c6c49afd2463b58060c1313b3393b5b26cf69be40f0208845260d31b30efb4bbe04a63c3cf6a857fa0a676dff7ac367b4465dbaf16df6cd1a6f571719a41b5cdcecea46b7e9d21e46af1781d02eb14d8d4066cd13f6f6f696efc806b6cacb0bca2f2544959e593aaaa1ad1395fd7768e5e510316abbd27e31616166cebbc1fbc0d0104d620b0690d98d60cc64c4f4f16b5365f7d5f5a7afae881c347bfaa0a0f5bb2f765bc35633a9f9e9ed19592923291e8481a538f924cfc353c88bc1481f5086c5a26be72a5d214fb7aefc4c478fec143477ea0aaa6a714b8dfb20b622df196d9eadabac7cc2edf0585c567941bc6f292f53c91bc078135086c4a03a6da49d143fddd950d972f7d2c31d1e15669e8af59ed8ea9359c77c4bd543db0801ae587b5b0b75389b8630ae8d3038bb8bbc4096d37814d69c0f4454f6db97ae503eea9a9cc43478efea323c9b92d56f36bd9936f7e6eeeaaf2c1b64402ee767b98b99e9d2710f618982a35c40ef6f51ceb686fbdc79e98e8dd5bb3ef3bf19684885fefb8da4743d509e654f46ecb0e85577b9dbc0e814810087b03a6de578aaa97fe9cd20dd2f756d73cab2dd13ab4148755fd91f034700e086c3181b036608a7dc58cbb46ab7ababb8e29d8edaddcbdf741f5be366d738e2d76af385d0410789340581b30a54e24b6b55c7def9ccf97a232cc8daae0d0b2d5960cf104218040e40884b50153a9e8bcbedeeedb53d3d2bc7babebbeaba0f7969e798c9cdbc89920b03305c2d680699160dc607fef6193f7959b97df985750fc7c5c7c02bb59efcce78eab46202802616bc0fcfeb9d4f68ed6bb63e262978b4a4a9f8c4f487007e50af8100410d8b102616bc0e6e67c69bed9d902c5beda8a8a77fd48338f733b569d0b470081a00884a5015b5a5a88ebebe93c3e3434549099997525c999d24bea4450ee1f1f82c08e16084b03b6e09f4fea50adfbc5a5c598c2a292e7557162db24aeeee8a7878b4760930542de8029f33e7a627cac7cdc3556575c5cd2f9eaa26dd590dfe4ebe6f00820b00d0442df8005962ceded2d777867bc99f9f9054d968404ef3670e312104020020442de8069930bc7d0e0e0b1d898d8e59cdcbc73b131716cf81a01379e5340603b0884bc01f3f96633dc6e77617a7a66bf868faf44fa2edbdbe1a6720d08ec14819036604a5eb57677759c9c76bb334acbca9fb3db1da33b0596eb440081d00b84b41e986ac45b27c65d7b545e26da9992d217131bbb45ebdd87fe4670849d2710080462b4f3cb1b9bbf2cebfb1192aa2c5a839cb01458b22e0702167330b393bc26d2fcfa3baf636ee909b5903660cabe4f76b9c66a535253c7b5d763a3e26014fadb79df53aef87501538d458d9665617e3ed9ebf51674b6b71644ad04e2cd767c367be2987b727cd866b34fa8baaf4f450e36d4b02c2d2dc62f2d2edab4e37d7e5b6b53fdd8e8c83e6db89c14a3bd1a12b40a263b37efbcd97f55ffee5107633626366e419b496fe8989b71a343da8029f33e636a723a57e9138d4e676ab790b61cd066dc148eb97d04d46045abe76355e3913c3c3850d1dbd3754b5f6fdf4d6363a3bb7cb3bea4c5059f26e61396555eca9792923a98919979597b2abce81a1dba644f748c242458bd8a1baffa875f8d64dcbc2a1e77b4b79ce86a6f7ff7c040fffe99196ffafcbc3f5e9b2dabbd5c8a0d049663ed36dbc79d29a9c37985f9e7d5c1e8cacecebd32ee1ae952033a6951815195b9da12936d216bc0cce2edd6e6a63295ce71646767375812acd3dbe7b1e44a10786701d3db5af0fb93c64687cb8787068ef5f5f6be6b6478a4c2e7f325c6c5c5cda8a1185183d56e898fd1ee82f3c91eaf27b3bbbbabb4b5b5a5c262397d4f4646c6707a46667745e5ee47478707cea9f067b729597eada3ea78b1ea71d95da32395172f9efba59696e6db663c5e5b41416163d5eebd3fcecece698a8fb7f8545034697272a268746464eff8b86bd7c50be7ef52231b6fb55967d3d3d20773f3f21ab5d4efd4e8c840a362d62ef31ef508fdea9d456495e19035608a7fd94647876b551f7e393d33b3393626664bb4e87c3111d8a8c0c2c2bcdd14ee6cb874f117fb7a7b8e7b3c9e2c0d13e77272f31b8e1c3df698aab19cb7d9ed13fa6f1ab6c5fa971697ac3e6d86ecd126cf93e3aeca9191e1fdc34383d56dcdcd37343534dc545858d85fb7ffc0f7265d238f2625a70ce83b35a7d1ccabf1320d15b50fa9dfa14a2fb557af5ef9e9f6b6b65b947399a486abe1c4895b7e50565ea1c9b3c4090d49fdd1d151a61316b3bc1c50abe9b76b03e68c8181defd830303fb868707f74e4c4e16f60ff4df73fefcb9f73b1c0e8fc391e4d2e75c2e2c2a3e3f34d8dbaa6d0f27d55bf4a833e25583b6ea5ee1463ddfe9fd21db3dda333d95f3f0bffce02b1aeb67dffbc19ff995ecdcfccba1bc103e1b81cd1650cea36576c69bdfddd5fe531d6dedf7689858a2c9ab9e9c9cbcf3a565154f666665359b219a7a34d7eccd68e54acce2e262a2c73d55a046e9d0a50be73f3c3931be3b2a6ac5a2c6a4797775cd3fe4e6159c53cf6846bd2ecbe884ab4acbf46eefe9ec3ca986322d2d2dbd4bdbfb3db46f5ffd834949cee1773a96f1323b84a9e7669d9b9f734e4f4de6f5f7f7ee371593d53b2b55018654bd245eb1eb18b37f85d3e91ccbccca6e2f2faf7a32afa0f0b47a689b3eaa0a590f4cbbf3a44d4c4c14aa2bdca79be6daec878be347ae80998dd317d4a4f4ac68666c4beea7b9e09f734c8c8feebd70eef46f7576761e7426a7f61d3e7aec7f9696963fa98d8e4714a45fd50a94d783f7e6b5cd9a3d6c2bada87ada6c8273e1dc994fb4b6b61e6a6ebe5a9f9a9a36959c9c3ca6ded04cf7f050b98684a9b604dbd4fefdf5df3f71f2d6bf4d4d4bef531c6b55b5f65e2faa602ac398bf23ead15d3e70f0e883ea9da5fb7c33a94a812a50dcee86f1f1f15235ac96d191e1b295e5953b93939d037afdf66cc0024b4bb19d6d4d95cb4bf3ce5467d258823561d32f3472bfbe3befccf47cc40496039665f520b4b94b767f5f77a1e2402936bb6d626ad2d56fb5d9c74d0f632bcc8a2954a2a0b92fa3bdadf5ce2b8d8d9f9cf64c6757edae79b8fec0c12f2b48deb3da86e4ed9e0205ef4d633eac86eca1dc82e2734d572ebff7dcd9333fdd3f30b0373030906eb3d9e6939292878f1fb9e187870e1ffd6e764e6eeb6a1bca6b3d753237c734fb5498bfddfa7b413db16714d376e8ff8e5e5e59895d595e8e55a72422aa2987a407b6b21288d378be78797925d6999ad665c6fa3bef6b7aed2b560c42a938a1c9f9895467355a714b81c5043554ce81819eb2bebeee9b4c8a8d77da5ba0e14bbafedd6a46348a0d8de7e4e45e52e0f99fbddee94be68b1229f19637dbaaca4ae2e484abe26a53e3c7bababaee302910478e1cfbcb5da5658f297e34a4585550f2ba5e6fc8fa15ebfa6a75edfe7f566e6589be5fb98a6745e715145c311b295b6d896e4d0e04e5786fbe4e5dd7acfe9bf91b717f42d280694890303ded2e51c3b5a4317373744c6c44ce6084f36e98fd30fd0bf34ecd02a569a861f74c4fbaf56be98a8d8d9f8f898909c98317ceebbbd6b1f4a5b39a69fdaeced6033dbddd27c65daebd26b6b21215d0e311e74f4c4c1acdcacebe64b5da26356cc99e9e9e2e1a1c1c38a018cc1ec573daf756d73e30e3f55c7e2de81d396938ba8fc9fd7d3db79c3d73e6d74dbc284375ee8e1e3bfe85fcfcc253ca8bb8e66ce146ee897a73e67b34fc6aaf6c6949f1eb952835eedbf6d9598d55481a300533ed6ef754a9c6e8be648a1746c923616a72bca4a5b9e14303037db7cfcfcfa7e6695f80da7d07be929e917b315cbf6e66aa5dbdbf78c539124c42a5e6a4a2a2a36396f5cbed57ec653e5853e50a0a5bcccc98d6c166365cbe70f3c8f0e011cdaced5d5858b068c83362e24225a5a53f4e4e4ee94fb02428cf297e2e265aa3ca95e557530ff4ec947475b6dda1b482db9f7ae2d1ffbfa2b2eac97dfb0f7e53c3985ee5276d7a25dff9b9d9d4ae8ed6f75dbe74f157c7c6c7732a2a2a1f3f74f8d85f29f6d421cbb0fc5887aab7b59a4623925e1392066cdee74b53f02f5fdd68b77e592362acbc59e8669a7b70a0e7c073cf3ef9bbbdbdddc7f5b369b1db6d6a47967234ad9d70e0d08d7facd7b4867298a42f7ec2dcbc2f6da0bfbb6c686860bf6ab355aab793b9bcbcacc4ece88082c27d2525a52f4dbb27cedb1393c6147f5af397d004e2350cb498e3a8f139d4dddd79876b6cac46b3d0e9995999edf5f587fe5e335767f44c0c9b44c9571bcdb70fd8fbf459639999d9cd15957b1e514ed32f2b19f34605aaebca2baafe593b5b3da2d9af310dcfd67c8ec17806e6e77c29dd9dedefbd70fedce7746dcee3c76ff842d5eeea071d4949433b2d2c100ccf8d7e46d01b30958f8eedefee2854f66fa66219a7cdb2888d9ee4567ebf594ef5e2f3cf7ef685e79fbb333333d373e8d0e16794577361da3d75606868f0485a77c7dd7babf70de91a27837d9d665a7f4ed5403a3a9a8f35375fb977647868b77a41f1faf2fb62a2a3350a598a33c3d7c181beda96e6a6bb745e4df5f587bfe9f379cf2624d8a6af37643359e6ead55935e39ca245fb351afa1d54e2e6418f67ba305a4bfc9234535553b7ffef35fd7f4ab356fdca1f5a55ef49634b332c3241e48b4a4bf883c1c1bee3972f5df8f4d933a77e5dd7705cbdb1fbd52837aa3716d667cbf4bcdadb9a3f78eecce9df5042d5ca818387feb6a676ffb7140ad8d13fd2c17e6ed7f279416fc09603cb716608e0f7fb2dced4d49e9dbc7987998d1d1cec29efede9399a929ae6b9f5b63bbf527fe0f0f734adee52f0b76ecce5fae2c8c8d00da5e5553f086603a659ab380ddfb2fafbba6a2f5d3aff493528d96a14668bd5cb2a2c2c7e392323ab4d719a57cb7a6bc8e670b9462bbbbb3b6ed39677bb5f79e5f9df2c2a2a79a9b4acf209afd7dd6d1a323572a6b7f35aac656525c6cc442d2efa13c75dc3f9bd3d7dc78706078e8e8d8dedd6cc625c5a5aea8002f00fe8335e713a53fa12131d2efd88ad7b124756139abe7f5231a6e6ab571a7e4e3dbbf79e7ae5853fa9db77e06fe6e6669f37c9956b79e0d7fb5adfac37b3bdb5f9fd9a05fc7533143e72f4f85feda9aefd8e664c99615f2f6a10de17fc066c6539deef9f4fd1e3beac7847afbad5eb7e7883707d9bfa11ea8ddaba3ada6ed778d17eecd80d4f1f3d7ee2cb0a5a8f69d816ad8cea4e67b2b3570d7df2e2c28299a20eca1f05cc93c7c7c72aaf365dfe787f7fff6193835753bdefbb25bbca7ee470249bc4c6b937c7ba34846d2aafd8f3cce8c8506dd395860fb7b6b4ded9dbdd73322d3dbd53499817d4888cc6c5c6fab5a781d5c4a8ccf05333887b464747cbbd5e5f5a82c532ab6295cd9555558f1714169d49d4c264cd9ccdabd10ccada572d3636cf50a77a935f34c1f2e6ab8d9f3c7ff6d46fabf13fa400ffdf68898dd22e4297193ee79b496f696ebcefdc99339f5b5a0aac2865e14b557baa1fa0f10aca23bba10f097e03a675559ae6add1a2d4690535dbb7caa2d00d295ee3cd6ef76489a6d83facc5ecfdb575f50f9af8d21b0b73f5a59856afac453b351d560367d9e8f1cd70518987b9cd4d97dfd7d6d6f241b360779782e57bf6d4fc8319bee94b7ecd8d545e6fd026351c7c212727bf414bc06aae3635fcb402ef35dddddd8714943741ff38e57e04343133eb48744c38921c2ed3cb4a4bcb6ccb2f28bca005c17dfa37b3c42464b1290dd5dc9a1c785833db0d571a2e7ea6adb5f9035ecf4cfe818387bfa0736c56e31cf4e52d0a012429607ff785f367ff83df6f7a5ec7fe5ac3e2ffad73094bcf6fa3cfc5767f7ff01bb095650d2f1693ad56ab4fddfbb1ed0e78adebd310cb72a5e1fc3105ca9d8a053ea3757017141cffd72fd8ab29040ec790ea312d6a2670435f7a7da9edeea9890acdf87d5a71b5c3eaa534d5d4ecfbba16035fb12a437bb575a65e8f794d2936f692297fa480759a7a5a95664f4fb3e038362e76d1cc22aab288191a2ad81fef5383351f6f597db5848d3e0f9a00306b6adba7a7a7be204faf163f7ff085e767fefba14347ff5c8df80bfa6f41ebf16b4d63e2c8d0c0f1c6868bbfaa9eb25531afafecadd9f76d1aaf8ddec5e0bd3fe80d58602990b0e05f48b4582c73a6ee50f04e756b7d92865ac95ac8fbeea4e424efaeb28ac7df5c8d56a348d565b24ec7c5c6a9018b5ed750cb543c50e392d1d7db758302449fd05ab8ecd2d28a1f2a36f36df5bafad63bb3a91942733ee6de99bf5d6ad06257f4c3a4c0fc4a744cf472242cf751233aa000ffdfe85c7c57af367deccce997ffeb8d965b7e578dd8c5603462fa014ad082ecbab3675ef96d3393aa7cb47fd482eaaf3b9292a92a1c415fc5a0376026b86b1215b588d5bd932bb02a1695313b335b54a0252059d9f9e7df92bfa4ca008b8b4b7653cceef520f99a1e0b53aedb0c519b1a1b7e41a91127146c9f387ce4863fd34ca202dbf6a0fe70a84133cb4b226e8da2990cd1b3767f527272bf2a3ffc9a1ab1ffb66fff812fcafe45a5efac7bef5193fa323e365c6fe26cc3c3c3655a16f48d7dfb0fddef48728eace926f1e2900b04b526be995657bda34cfd4dd30af6a5f5f62c427ed5213e805936a359c042658f0714877a4a5fa689b71e323a4ac1fb14135732c9a46b39250d1913c7c6468e9c3bf3f21f9a21545656ceb99b4edcf23bda77e0b160375e6b39afcd78adae775a33a60f2b0ef6974a10769c3ef5d21f7475b6bf4fc3dfe4f59e8fd733557ae1fce9dfeaeaec3c5a5e5ef17475cdfe6fd278ad5733b4ef0b6a0fcc0c33148b29d71738510bb8bd1b8ded84f6d243f7e9ca28b7a8be53a96a2af915a8ef3271aeb7399a296514a774a27825b4aefa8fd9e57c6c74e85853e3e55f9b724f155557d77c6f6f4dddd795d5ae19dfedbb24e99d80f403e1d5ccf7e3a6c7af06ecf7f4f777cdda4a35620f6aa6d0e493adfa8f72e0d22f9c7de55734fcbf41f7aefdf0d11bff42c3465379813f112810d4064ca573139403b64b719268d522ea53c2e4aa4a7a44a0cb864e49abf5d503f39528f5401b292c272a772af62d1fa87c2a05bfe7f46ff1ffb6afc3b50f6b6a9c6b6894d9dbd379735757c74734e3367be8f0f13fce2f287aced498dad0096f83372b9ee853cff419a5edf84fbdf2e2ef2bf1f5b3662993d22cbeb1dab89582f6d6cef696bb348bfb7e2d811b3872eca6bf504589ee50ceac6e03fa4dbd84a03660a6448aeae0e79afc1fc52594c41abb63abb06af6d112585e369b2a5425a7a45ed25dfe77abf9559d3c46b1a5452585aab9bf76105fc3f258c5bb925ca3c37bbbbadade3f38387852f95c83b575b5ff2b332be7bc02d63bf247e2edbe359aa19c5323f6c20d3127fedf33a75ff92fe7ce9df98c664e17142bfc27cd9ef65d6f65812946d87cb5e1e31a8ac62ae1f81b45c5a5cfaaf10adaace6a67ed3b7e9c183da80452b575b29148e68a50824a7a47568ffa635c576b68bb1e9052857e9c70aaedf31ed71d73b67d3cf6a48d3f4ef7ba4d12a07bce4888b8a8d56b96db575cb0a87fddb1050bd5955e65c704c8c8d5476b4b5dcdbdede768f32c0ad5a0ff870cdbefddf508e9d593fc997eb4d0f8da9bf25b7174fda6c93674fbff8fb0d97cf7d667e6e26af6effa1ffa57bd06f4a9cbfdd73a69a5ec917cf9ff9707fff70a582f67fbfa77affb7f55911594266bb7c4f82711d416dc014fb8935b5f0f5c59ad31067e6d57a1f3bf08fd9044125b52f6564649e52a9955ad545fbc5925de55f53fcaa5b551fbcea72ada8b44e8232da0b15ffb22a989fbcf25a32ebab3d567dd1e295949ae51a193e78e1dcd9cf29a174b7d6118ed7edabbf7f6fedbeef9a0a9f3b35deb59ac7c9a45168c8dd78ec86937ff8d28b3ffa7c4747dbfbd5cb0dd41f38f63ff4feb7e4269a923f2a8d73a3d978635769e90b4a99f8aee26a2c115a0df626bf26b80d98b2f0cde6999604cbac451535b56466473660e69e2aeb7ea0b26aef5f2bb9f4ff19e8ef3ba97586e55a96f3485e7ed153aa2f3ea20073b686dbd9eab1da34f1b1473396c3aa31356b82cf83fd3dfb5aae36fdacd61756eb8bb7a0ccefaf55eedef3505a7a46bb32ea57559a78939fab4d3fbca92caa3cb99663c74ffeb7975f7aee4fd488bd4755373ab402e29f6d76c7f81b276866ceb52e55b38e673f67361d3b7ce4f817d4bbeddcf40be004562510d4064cbf7a56ed006cd3af97c7049957139c5ed5596ec117996450b3bc4553f09f5779998ff6f474fe547757e7efa4a767fc4c5e7ec1f3b3b3defc81c1fe6aefe474aa66223f31d0d7776451e917a6a0dfd4d464a1e9c51614153da7e4c96f9aaa0e0ad4d370adf1393009b76ac42e1f3d76d31f9d39f5e21f5cba78eed7cc0f86868bdfb25a5f5b84add9e21cfdc8fcb27aca45478fddf0052d746f79bd4efc1a8fc6cb374320b80d981e0eb34554b233715c5fc0b0963ad90cbceb1d538db849febcacde569f96f59cbe7ce9fcafba5cae522547fed2ac6fc6e999f6d826c727a38647c76e517588635a9ae3d702eafeb2b28a27b4b3cc03a6c7a5866b4d6900d73ba79df6ef26706fb2f30f1c3af6e7afbcf8dc9f363735fe7c7a46d615ad713ca72ab9b696e6abf76aa38cf7e5e7179caeacdcf39066869914d9420f49501b30e5e224fb9564a92f6eaf9981244ef3da93a05c24ad2f5c7c48b38667559df498cab27cb8a3b3fd3619c56bc9cf6c764e4e5756764e675171c94b6abc9e494e49e9d35e7ec46082f445323131cde49e362b152e5d38fb1b972e9cf94f2afdfc63c53a3c972e9effb47ac08b353575dfd5307ec7a7a304893c6c1f13b4064c5fd0989e8ed674535f4ab36a4b6abc825e19206c2a2138d0ebb944fdea0da8067c4ea37642f68f8e8ed41417957ebf72f7de1f689a7f48bffe3e7dd9766cea4908d8fff523b5946b5e9328cf9a72e7172f9cf90de58afd675345767e21b0ac6ab15f553edd2beaad6d68517d28cf9fcf7e7b81a035604ac88c3675d0350ba9cc72d378ad6f81f276bf51a637a0188c2b37b7a0417118dffefd87be65773806226181f476b7d74cae6f66c6f3ccc8f0704d4f77cf67552f2d4dd5252eeed95bf34f9a1ca1aaea167c0082b816323aca6c81a58426fdafcda58ac23b7606f27acf81b2f3ad0a2e679acd4915fb32a59b236ea1f4f5ae61abfebb928027ccfa54fd90b814d08fd23d1834658182557c71abba6cd5f30e6203a6496865956bf9cca229a3a35d661842becd53611256b524285b659ecbd5e06befc0f855d589dfaa0f58a49db70975e8af4de715a71fda286d165265fe9a0a149176ae9ccff50582d68099c6cb6cd5a52cf465b391c74ead44713d72f5bc6ca32383b7688d5eb6d6e8b52a564836fdf5d082f8ef0ae627f7f674df6aaaa6d8edf665ffbc3f53955d3fa21f9492201e868f0a9340301bb068f52eb435b0a979f7139b4084e942b6ca61b4e146924ae11c5f5200d96ab38d32531bbe3b673659518e5dd540ffc0cd490ea74f556b4f95969636a800419dd22b7e55f1b1bcf09d0d470a8640d0bacdea71ad6859ccb2897ca937b6860231c1b88cadf3192ac09733e3f51669f838aa697ca6edc378eb340399d4dfdb7bab966e6554d7d43eb4ffc0a1fb15ab8d56e58adfd49e9def5111ce41a5027d5d952ddc613c2d0eb50181a0f5c0cc3968f868e25eaa26f35a4f6c03e7b52ddfaa388b657ada5da98cfb44ad93bca4068c5caf30de69afd753d4d3ddf51ee57bb9f754d73ca07a5fada969194db575fbff679236a6d5de961f99708d1d312b4ac2785a1c6a0302416bc04ccccbfc558c274e5983761313dbc0796dcbb72a46689b9a9c386476a5d6a6192faa1e3e59df61bad3ca014becebe9ba53c3c5c2dcbcfc97d3d233af9858ad2947a4fffbb236a8fdebc585c5849696a6cfa8ac4e89996c09d3a971980d0804ad9131c346a550c4aa7711af2e7a120dd85befcab202f8dab1bcdc64806b579f7e5510257d62030fef5ade3aa73d0ab401ef6d66ebb7f28aca7fd1ea88718d185e4df5d1fdf069a1fd0bc94e67537f5fef41ed547e97869bceb57c3eafdd1c81a035602606a6ea13cbafd7b68a373b386fce2545e651b5f7a3f60b98cdf7cdcde46ba7a27eedda44e264986e951a23ebf0e0c009efacb7b07277e523da76ae41795fffeec743f9786e25b47e392333bdabe9cae5cf0ef4f7dcada4ec0defd719a64bdcb187096a23a320be02f9d1ea7cad985aef6f2da3bc639955e32b10b04e4f4feed5fe82a95a36d4a6a545ebde35670733aeebd2cd4ef12a2e79ab7e347c5a32f4bc9615bd6581bc4926d6e2f9466d10f2bf4d46635f6ff707e7e666b3d77540de143681203760afc6c15654d8309e06ecdfdfc3a5a50587d2276e36731c0a1e5fd0178604d6303ce6a624b77b7272cfc4f8786d5a5a7a937612bf72adfd32b511f3545151e9235ae8fd8c6265a58303fd779a5dc9c3709a1c629d02c16cc056f4a55c505c6749a91426b84010f4276e8aeaac67eb4b51ad2fc990363c6927feb5ce27768d6fd3a49275746cf82605e5e30b0a8b9f54eccbf54e1fa1dc3c970a517ec5e974760ff4f77ed037375bb0c643f2f2300a04af0153cf4b333a9ad589f76b7b3562603f7113cdb4bcc73355a54a1d492a687856051fdf52d6388cf77c471d4ab38fe9eea9a9fd29a9a93dd939b9a7f58cbe63cfd7d40f4b494d6faeda5df325f5de127a7bba3ea2a55f693b0a6d0b5d6cd01a3075cb57cc0c8ffe775e35e02d0c21ffed29300994a3234337ebcb6166bb9e93119b4584e14b62f2ee5469f5a07abff97979f92faaf7bbaa1f0e935a919e9e79212b2bfb946625ef56c9ef03fa2c869261b8676b3d44d01a307360e5d5cc29c769c1fc72a91716b42cffb55e5424bdded49cd2129512976becb08627434e67da55ea4e85e70e691631716c74f876b35c2b2333fb829ecd55c71d35d4741716953c6836035129f04fa9f47419b961e1b96f6b394a701b302568c6ab01334348f5c2b4612b7f969797ac5393e3b59e69778e960ff568068cf489303c1666b30e2ddc4ef77abd155ab43d9ce870f49942036b39b472f5fa3233b3ce4d4e8ed78f8e0edfa912d48eb5bc9fd7865e20a80d980a192e9bdda6f5c71913134d754bdd3f7d899c7d7dddef595c5c8acacaca31d9f7abee0584fef66fdf23981fd19191a1135abcbd2b3b3be7596bc2dae38efab1992e2ad9f50fa6ec916624dfaf24e40a93cfb77dd5b6de9505b5015372e08216c29a1c1b95d659def13103b3ac4a7b3f166b0d5eb952273ab5e3cd256dac4ac31e86ef89d9decf333d5dad78d68c3325ad51cfe69a3799d19033909ce46c532fecc75a849fe51a1bbd5d9bd690a11f86fbb7da4304b50153ac61c99e6877991898095ceff45f2bb31c6568c8e4122d590b0b8b9ed65e91c3abbd31bc6e63025a8feb54da4a8d43e5ba357cd486c2ebab7aab6546eedcbc828735bbee568fee1e25b7162b1616d4efcdc6ae7467bf3ba837225a0d9823d1316c726ee6e7e63277f24ca47a5fb1b30adef7f5f5dca3c285fd8545bb1e63abb9f07cd94cdd2fafc753eef1780a9d29a94da6115aef9195afb7a258586f4a4a6aa3a966a18d586ed38c24b1b0f58206f97dc16dc0a26302fab2f6a90716e7f54e97aaaece8e9d8954ef2b7970b0efddfa1265e5e6e63f9d9494d24df1c2203fbdd7f83813fff27aa62bb424244a797717365af543c3508faa873caed2617363a323b7fae7e733c373251ce57a02416dc04c1d7ced22dda7076859c1d3bd260bfa7a27b01dfffdf5d4895d8383fd77690833a8e9f847f4256067ed30ddec57d79d7adcb5f6c4c451a733a555e93d1b2adbadf7cfeb739a349bd9ab7a6e65fabbdbf4f2c274391ce61d0482da8029ceb0aceef6b01a32ffb47baa726161679624d1cc638aaa19dca307bdb0a0a0f831952fa6f715a6afa182f7d1be395feeb8cb5567b3db864dd9ee601c5a93532e7ba2a34335f453c65d63b72e2e2da604e373f98c8d0904b50133a7a278c38c1a329fca26e7fae7e7b2765a205fbdce9899594ff1f0f0e0adca3bf2aafac193fa0527f37e63cfe9aadf6d7afdaed19123131313c59678cb687c5c7c507abe66a779ed623464e2bbcae9ab3765a9577d52bc306402416fc034f53c9f9b9b7369da3395e6f1b89537b3b3e26026f6d5dadafad1d1b189d25da5950fa4a6665c7da3705ec8ee221ffcaf02da2cc56a4ae728592ba0ea13176262e382b2d3b926a816b58675303636daeff3cd146b36b240cf36c3c84d7ef642d080c5cfa5a5655cd52f5f6076d65bb9b21cd83145e1b474254e53f77bf4057a97aa19f41417973e64f29036f91eefa8c39b19c2d9d9d902adcb9d4a4e49697b73e1c2f56228493b9060b58ea968a74fa111bb36c5a5eaf07a3183f8bea037609a765e48cfc86a5200d5a399a0bdbad13b26f14f85f332bbba3a3eaac5c3c9bb76953da0a9f776661e83f8b45ee7a3cce4c99ccf97a3bf1949c9c9bd498ee4be601d5d0da18a1558c735a3e9d6331d6df21c55db8dacfc6001aff37382de809972240a760e2726268e6926b254dded0213175ae7f96d99b72d2cf813c7c7478f8e8c0cdfaa2a060dea7d3dae7820cb86c278074d01016d50bb4b3d2465f324776b595b50e25f6f5c82e9d5e933ddfaff03a6ecf08a8aa887f1f238d4db0884a461d1b06956b3913d931313599313ae439a72ded6e914266955498e156d6dad9fd122f698f2f28a6f3b1c49033c71e11530cb87dc5393d54b81a5044762d280591912cc33d0e4d47c5c5cecbc266566f48c4fabf55ad3e2f0609e0b9ff59a40a81ab0190d235fd1502a4ae54c8e2d2efab7f530d20c93b560fbc3aa3d559d9b9bf7747676ee4b5a7ac2966961fe96a9e1b2badd137b14685742b563500d5850777d52626c6c60299060898ff7da4c514ab3910d7f365520240d585cbcc59f975ff4bcaa60f64f4e4e54a8a265eea65e65080f6e76aed1aa83cac1c181bbd5ebeaadacdcfd772a9c1794dca3109ef6b6fc6855bc4dd1ca877ca54fcc68043064aaa304f34215e34c9b999dc93649c916ab75dcec831acccfe7b3d62e109206cc9c86e26023da40f4a5d99999746d145ab65d773bd6747a6e7f7fef075442c85e5050f843656cb72be0cb83bdf6677143ef3009acaa1891a1007eaa7abf330ab84faa0716b4fb602608b42d5eaecfe74bd150725ac17c5f303f7f4317bf83df1cb206cc6c1b565555fd1dcd4a2e6a7384fb66555266bb39cfcffb5295b0faae9e9eeef76ae8f8a3f2f2aaff633649dd6ed7b915ae473b6169f1bcd76cc06151f6fdb82693823a843713044ace2e50b8c0a609aa1e3562242747c08311ca066cd966778c685835a83a4ab51eafbb565b8b6d9b60be661d6dde6977757777e727cd35aaf1fa86dd9e48b99c4d7aa8d5c0c46ad3e0ec79bf2f393636662e26366643eb1fdf7c1966b779fd589d88d1e6a7dad7b3c5acfbdda44be5b03f2110b206cc1cc392609dd642e647e7fdf3b1e36323776915ffb6d82854c361fd1a7b2a3b3a5a3fab8d6a93caca2afe4ec9bb66b7e7a00d59784ad726604a37698897a3358a7126e154f722683d30530b5fe919a5dad7a05ebdbb4915a7bcaaccfca036906bbb5a5efd8640681b30e54195ecaaf8be4a9a346b53d7c3eea9f1e3ea856df94aadf373bebcce8e965f19191939585252f61d95cb79d6ecfacc63b57902668650f95fc95acab6989c9cd211cc21a46ae15bc75d230714ffca484d4d6b329335c1caf0df3cb1ed71e490366086c866b78f96ec2aff8ecafbda06077a3fae2fff2ee54d6dd9044013f7eaea6affa8e25e3f959cecbc5a5c5cf280868eefb859eaf6785422fb2a4c0c4c6718affcaf29ad80e850803d683d242d892be8e868bb4f8de44a4161d1930956db78646bec9cb30b7903161f9fb0909d93ffbcdd91d4a72cf5eaa1819e5f98f3cd166f4562936d3f323c78b2a5b9e9e39a851a2f2bafbc3f3131a9772b5ecb763c67f582fd898ec4290d21ddea810525074ca9130efd60dd3b30d05fa7b4a0b6bcbc82e799a8899ca727e40dd8abbd306de75e59b9e77ecde02cf6f676df33e11a79cf827f2e397218ae7f26dae139d1353a7cc3d5a686ffa45ff7c5eada7d7f99939bff92d9f8e1faefe615a116303959aa16e151118195a895e024689b58e7e4c4d8be8eb6d68f6a19d17c4dedbefb1d8ee4fe505f0b9fbf7a81b034604a6c5dc82f287e2a2525edac8afc254f4ebaee98764f1ed603b225f68e5c5a5cb04c4d4dd45ebc78ee77b44d7d415959e5f754a8f069f385593d35af0ca580660503ea8179b53a3141cf95537f37f46c9b7d25b5996dfe95c6cb9f9d9c9ccc2b2d2d7fb4a8a8e469ad8524d619ca1bb9c6cfded04d5ecbb1b4238f6bffc1237f949c92dad0ddd3b5bf7fa0fb53b3b39ecab57cc666bcd6ac7354767765c3e58bff65dc355e59585cfa486959c5f794a84b1c64336ec8b58ea91e98253e61d26ab1ce2ae5215589adb68d9c9e6fd65bd8d6daf4e9c181be13959555cfd41f38fc05c5be2636f299bc37f802616bc0cca96b638b1e25b7fe8dd56a9d5059de23c343fd3f37a700e9728406f5f52bfceaee36cd571b7f6d7878f8505171c9737bab6bbfec487206ad4c4bf06fe9cefc44b3705ba914cb9e694f9e525bb234a45cf744d1cc8c27b7bbabed1383fd7df7aa2cd2a9bdd5755fd23def62e631f29eadb036600a7ece6767e7bf52545cfa5d2dbd89521ed5cff4f7767e5a257776451a8d2a68c4695bb4b2d696a6cf0d0f0f9dd032a1e71503f9a299e122df2bd2eed6abe7b3a26aacd1536eb7434b8a4cbee1ba1a3065f3e7b4b75efd6c7757e747b5255b47edbe039f5761820b5aff1894caae1129b7854f2aecdb9e596df6298f67ea1f557ea6b8a7bbf3fd9dedadf7c96f593db1afd812930623c152c3c678252e56b5b7367f56b34fb7e6e7173c5b5eb9fbcb69a9e9cd9add0a6a899648b8deed700edaf26c45017c8f625f2bea35e79bcd95755d6baa07a61fd2ccaef6d68f7776b4fdac7ea8baf7d6ecfbff92929cadf12c0f8bd84724ec0d9891d04c4edf9ebdfbfe4a951cac1323c377f77677dca7ca016ac3dcdfb3da1d4a128cdbb432254b8b8b09dab461775b6bf3af2bede348764eee4b15957bfe36352dbd899e57c43ec75166e7edb1d1a14ecd0abbc7c646eb94bb651ab1095349f57a676d7adb1a3616b7365ff9f9aecef6fbccd2b0ea9a7d7fa6d5159734014551caeb016ee2bf6f4a036636b9d0c3d55d5b77f0cfae04ce5a945b756b63e3c55f9e99f5669795effe92329fbb6255533fdc2e4a9570b85ca307952af1db6eb7bb322f2fffd9aadd7bbfe84c496ba1f10af7dd58fbf1cc5a540dfb5a0707fa4ff4f674bd5b397a3dfa94e96b7d921aaef879ff5ce6f0f040ad868d9f1a1d19a94f4d4f6fafababffb38cac9cd3345e6bbf07e17ec7a63460e6224d83a099a29eea7d073f1f131fe7eee9eabcb7b5f5ea4ffb952c5a5ebefb6bda5bf14ab8baeea6148ba9f5a48d684f365d69fcad99196f567979e503a565e5df49d1b091baf6e17e2cd7773cabd53e595b5b7fbf6f6626473da97b957f38a89ed8a38abd4e2b86b5ace165b4f65cb604960356d50e4b1f1d1ddcd5d9d1fe0bd3d353558af92f55eedef3bde292d2079dceb466b399edface82778553605d81ce609ea05ab11875df0b9a9b2e7fa2a3ade523aaaae950cfa7adb2aafa4b9959b92f6beada15acaceab73b6f6dce90a0e54dd9aae975e795c686ffa8f56eceddbbf77c778f661b15ffe8a7f10ae6dd0efd67e98728b1b7a7f3b6864b17fe83d9644599f317140678d90c0b17b4e59dd7e3aed2ce51d52625467b36a4a5a6a67a55b7ee8cc2047fef74a6b65a54f79e6df0427f9f8275844d6fc0deb810bf32f35d6323fb1b2f9fffdcd4e4c441ada19ccdc8ccba505656f5cd94b4f4868484576b3c5d379eb11a18d3e3321ba0ea5738d5353eb6bfbbabe34303fdfd27f54b3d595357f7252dd07e2cd1914455d5d56046e06bd47b4f70bb27cb3ada5b3fd0dfdf779beeb7d504f5353be9d482ef046b42823f2333b3d7346cbb4a2b7ea81d407a4d0144266822f0665ee79422a60133e7a9007abcea86157577b67eb0a7a7f33e2d00cf535c63aaa0a0e8f9d2f2aa6f2b93bf598d8c7bbdf131b34bb8e21e36a570642aee76acbfb7e7ddddbd3db7a8c653744e6eeef9aaddd55fd5aff1691dd3bdf56e2567fc660195324f545a44ae1a2da76618f3b406374b75ec0329ced4ae64674ab729f764ca43af26d08f6e640a445403f606911e3ca76b6cb8bea5b9f1639ad2be53b3957695e41953ddad479543f6907e317bf4e079d490f9b4846449555fafd933334b424c354d4d0c24fa667db9da64e4504f4fd77bd5e33a3633339390999ddd5a59b5fbfba5a5158f243b9dbdaa244b9a44643eab1b3a2bf5b8e34cc91d931d66d6b26a9848edb60d8946c69b23b201333466098f6253e99a213ad8dadc74dfc8c8d08db13131166752f28423296950359fdad2d2332e262627f799eebfa6cfe7940b14306555ccd666e633f4ff2ffbe6667334544c53ea7f7d5f6fdfbb8686062b555522460d624fc9aeb2476aeaf6ff1fc5474654c18012c191f14c721608ac5a20621bb037aee0f5862c6d6c6c78fff040ff8dea41dda86548bb352c8857c33597906099d502db592531ce9aad4655f0428b7997ac664bad98d8f87955e9cc542f2d56ffddbeb814585163d5bfabb4ec31cd383da461449f8de1e2aa1f165e8840a409447c03f66f0d99895f2dda15c7c8181aec3b363632543f3b3b93abea10a56acc124ddda6f9b939fdaf5ff554a2a2559960c16e4f9ad2b070548dd698feb73b2333bb212b3bf7a2766d1ed48a809948bb199c0f0208ac4d60cb34603f79592601513d338bd9f15b0d5792868466fd5b9aba5ba94ac3b02828aba926dbb4caddb84dd508c5b5fc665765fd77bf626741abd4b9366a5e8d0002c116d8920dd8db21988d17348254ecebb5787e2873c7827d13f83c0410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400081cd15f8bf2b1d52504cecfbce0000000049454e44ae426082, 0x47494638396190019001f7fd000000000b0c0b091518141413111110161718030e2a071a36141a29151b3608182708243a12262e17263922131e2d1b29302b32041c46111c4d062649052a570c324c08335a162947182b56193449173758032c65063667063a75163a67133773241e5329334e253859263a6529396c0a4478194369114a721847772f4757284668284f65274a77295479364b75355569375678354968432f3c4c394846396f514b524b556a45597850677663505c6d5669706c720b3a85094886174b85114d921a54891a58961758a91d62991b67af1967b92757882c538d265b97375987245ba7296499396489376798356d932569b52e70ae2a73b9366ba63974a93879b72866a7195ec0176cc51a73cd277ac92c73cb277bd1367dc54a5b8746658947699647759a55708d4678a84d76a8457cb66b5c906c738f437ec33782b73b83bc2c82cb2c83d23585cd358acd3886c43c84c43b85cc3b89cd3586d23689d33788d93a87d23b89d33b8bda3d92d93a8ae14984ba5589b05689b97187966694a76c91af4385c44285cb438bcc498ac6428dd4458cd74a93cc4492d54593da4b94d54b95da4a9ad64d9adc548cc6538ed35895ca5396d4549ad5539bdb5999d64b9ae2539ce251a1d55aa3db57ade759a5e26599c86e98c7639cd4629ee366a6d871aed264aae373bbea68b7e87ac5dc71c6ed7bc8e87ac7f4b8383b916973e42023d35f5f8d768d9276a8aa7cb2e77f808f8d938d97aa96a6b3a38d9dabadb2b6b8b7bcbcbcb091b08bb6cf9da8d6aab7c8b9bcc4bdc1bc88c5dc93c6db84cae583cae988c8e683cbf58ad1ea8cd1f594cbe595d3ed96d4f3bbc2c7b7c7d6afd1e9cc90bbc5a6bbc1bdbceba5a3cf91c6da96c9c3bdc3d8aecfddb1e6e498cde5a5d4e7a6d9e6aad4e6abd9e9a6d5e9aad6eaacd9e5b6d8ebb4dbeeb4d8ecbbdeebb6e1edbce1f2bce2e9ace1c2c1befdc7b9c4c4c4c7c6c9cbcbcbccced5d3d3d3d7d6d9dcdcdcd0dae6d9e6efe7c4ddf4d4d2edc4e3f1cbe6eee4dde4e3e3e8e7e9ebebebefedefebf6faf8f5ecf4f4f4f7f7f8f5fcfdfcfbf6ffffffe7827aabacad21f904046400000021fe18436f7079726967687428632920426c696e6765652e636f6d002c00000000900190010008fe00fb091c48b0a0c18308132a5cc8b0a1c38710234a9c48b1a2c58b18336adcc8b1a3c78f20438a1c49b2a4c9932853aa5cc9b2a5cb973063ca9c49b3a6cd9b3873eadcc9b3a7cf9f40830a1d4ab4a8d1a348932a5dcab4a9d3a750a34a9d4ab5aad5ab58b36addcab5abd7af60c38a1d4bb6acd9b368d3aa5dcbb6addbb770e3ca9d4bb7aeddbb78f3eaddcbb7afdfbf80030b1e4cb8b0e1c388132b5eccb8b1e3c790234b9e4cb9b2e5cb98336bdeccb9b3e7cfa0438b1e4dbab4e9d3a853ab5ecdbab5ebd7b063cb9e4dbbb6eddbb873ebdecdbbb7efdfc0830b1f4ebcb8f1e3c8932b5fcebcb9f3e7d0a34b9f4ebdbaf5ebd8b36bdf8e9b5f3feffdf6fe8117289ee078f0e3b9534e1f719ffaf7f0e3cb9f4fbffe6d7dfdf00fd4b76f9f3e7ee989c74f7ffafc67df63067e971f7e000ee81f7feef9076081fff5c7de81084518de8676f967617efb0d78cf88fd9127de3df8f4a7a27b202a28d085dc5dc822877889e71f8805e2c38f3e23de43e08bfce0830f842a6e58a089306607604333bea5df40037a77a4770dee48208539eae86089fb0de4e17c540216619352fe372196689e59a4404f86c7a57a4b0e36a67b6816980f3ef2d8532583557af766414dbe17669274b549238852e2f34e37ddbc23a49f667e07208b64ba49a875e89de7225f7f9a290f39cdb8a24a33e40899e23e2356495e868162a8e0a5fe6cb9372041fa08f94e33aa9c72caa8efc8830f8a8faa5a90a1f1e573507a0dd628de93fcc883ebaeb9aa424ea9789a6aaa9fb39af7e77b250ea8df7fc4cea5a1942fde1a6d2aa98c3aedbad3fa9a6cb6077ec965b8ca3e48a1b3aaa0abaf2afcf6eb4f33cdc893ecb6f415b9e6b709be58978d3bd6eaec29fa461cf1aeb238aae3aa0ac747e98a045ec9e693f4c65adebde64a6cb2aea86cf3e877ad7227ab82fdb583cecce5d072cc3a941a74e45ae38d8ba3a2b89a7cb2b42b6f0a267ff7a003cb0e38d890020435bca28e3df618eb65c86b59885f8e250badafaecd580c69cbdbe1a7e2317da49041061034c0800029f411cb39ee19db20b8723db8a0fe3ef87abd2fafc1c25b5d9c05e1f39d3dfda163460817bc10430c2a5c7000030d40b0c32cf5d868a6aa848b14a88609319be1863396ce51813be6870f39f97a0d6dc0862788f574e7ed988f3eecbc22420631dc70030c5dbca0f6010a3460832ce8e893cfac7d2ed92ac8c352b4a6976e66643ad9eded477233100f4d6a3cf8d80d2742fce4d3df2c292ca082175e74c17efb31609080010aa4b0033af500691ec66c1eb4f55674c251ade2113489a9c215cde806f896971fecd1ce2077db873accc0000ddca00b37609ffbbc700317c4a001f4838019cc2110c43d64763271a0463a47217c3c435730dc55d87a15bed4a56e3e0cda473d6011820390a00bfe4948c217be20c42176010623909c011a608673dc034bb4cacf78feb74228593163050953c69065454dc18a49536c183e4275c051918a864302947692d52282ec031d3b68c0055c00c4221e610c43fc4217bae0020c1c60896680069dd0d4c6d061f1215442cfaba0a448860caa9171faa2238d24c502dd8a1c8d7a071a0d242b144627497e9a450d1a10031714b1094740c2178e20852f80010c5f8081081aa0800b980119f6a0a2273792481775ce9784e2e2a08c96c54d5dea6e47a210f84ce52b1da9e81edf119d92baf49ddbdd8387093065108f70ca26b4b209ae0483176669801098811d5b9bd0212bf23920695191bd4c883087494f62ee6f9d59fedcd9def271a76bf18344daa3e675a608bd73e0a001bc4b023793d08486b6520a630083185e09861ba4af9c6638868ac07331ff65649eeeec222321689e7ae25361c1645122f1910e7a504d9705f21085e4d3a423998f162940680cb619c4867e410aad048313a600863dec41960b58621f8ee123461a0e4a2ae49f42fa644c7b3a923df4ec5ced447a907df0d3abb478c5e5d8111ef3716c903355cf8cb6869fdbcda2872230e5429bc0506f8a410a4ed8c314a660d458aea0020ac8000e8ed18efe2caf7c11429d414a94b3ea95883f870a4feda2a44659a9d4428f145079502aa92579d6aafdeb87b1f8598b1a40e0016640475957d4a2b4ee123a0465fed33ededa0015c8f50847686843c5b05730a0e1b77a30aa188e0a5806e02016eb20117f6e37a99745d64bd72b928358e6270935e94d1d63ac9bb4eba5e9aab4aaf1245ccf465b8e1d1060001078c53c1ceb51f8f8098b158a45062e308216e056a1e0f42650c940062a9001108d18442334a18931b4a0020738400a60810c1f712c5b21cb19773574560f399840173e2b9138461e226d775c5b7d178c1ab48f79bc020205b09c136f08bdceca278c06a2471f2e7001152814b7b9052a44c5c0df3300c2114076c4241ec187312401c106b8401866c10e0797553fefe59084296bb00f73ac4226aa30917ad40e12cd8974677dd523512a2381d4a316330880fee576912216f72f91825ba3d18ef4c683c6b50bb8a5ab7ea5408633f87810827084222aa108207362136360810626504b1bf42117eda807eacc07dd8d99c85231ddd23357e4a37bd4831eed98c73ad8818e74a4831da82635328e710c5ab89ad5e850073bda11e94e5798619dfdac16afd80f75ece0010fd8c138f8c4274401281f4ee656f40aa48b1ad4980537468212742c053f9f2110822884221481884a54c2d09af843125ae0810b2c200337e803320a2baffdf50ccc2bdab0a73b7d8f76b00319b988451ffa608630e0e0df4c0b03d3fe6d031bbcc0060037c3be61118b59e462d65dae70313d3b62d1a299013b3847f91434d3273d28d982ead291fede7a0112e41609d25e828ea900086c1742d0dba6042510c108484462129368c41ec0c004165860021570f4ba5704670069c94823b247c463768c59c482e1b94086befb00831588400326c8ba0856a08115a840055effba0a3450810a60fdea6bcb400a5ef08230f40116b7887a9333bc2d361a849fb3d8c12be846b0aefe52ad35ed07c94dde042528a10955a80214a8408537c421db89887c211021734a30421292c879231ef1883d30c103155880f1189cb9f2adb441fc84503b74010b58a0631fed9805bf9d168214fc9beb2b30c1095ae084de8b610c460dbe51c710512730e1f84c6881f24da081e693ddf96befc31f7a818ea5c71bca9a3e2c80e8feb10e7a64d88a518dd1b0666a0b08ccf1e4fa657ce305c1fe42148210ee97392268ce88494402128fe0842734c107313021f4818503b0c00e89a545e0b20fec900baf6003212080b9d00716d5001288506b070330b0077ef0070446609bb0099fe0819fc0819ff081fcb7077cc0079ae0077cb00711e54ac607032c30761aa0023780030a170bc8306b1946215ca24e66c261aea21081070b72a44d8627058cc7056f0007ec270884f084f0870878307fdb060990807344f6089ed07947a5010b503f7f607da8a222f686364eb33631100616b536a277016b23022d00067f3082744887fae7097888877798877c48879e40871df8077fb0825fc0045ea701fe19a0012f800361100b90d6232a02592ea60fb9b42ae1471ff0f224af50840c356d8bc7057e160771600784600787f07ea6880787700888a00891778590b07943d6082b08060736012ff06804882a3d820c7de06f4e93025db7022f507566c77565370113a0014cb0071b48607c78099ea07fa0c009a0807395e009d2080adac887de88877498827e0006303076a197028ef6703df244b7936b2e728998483d6e240b7204034c2005d3c605a0a88fa26807767007fe089087608aac387f89700836777f5668088da007c1e5042d40763060067f8083f6360b38208c6ca7021e3083ca770226b0022d00032db00216600128d08c7c3082d1680997f0929990fe0995000aa0900934f992979009977093388987dc9887a230821bf8073b6788659702302037c9407723e58e410841e9c120fa408417c05040a58fa05807753007713007fef895feb88a62890889b06d65e98a8a100991600883a007fd67042660014719067f100631607616387616600271e804bb8706c1e704469057f97709966009da489398209395209331299335f99892f998978009341909d2b88d9e60097e18827eb00710997b6be707b7307463d8223b224941b856f8419549708f54a08f81c0055a3907b6e99500790700698a04b98a94b08a8ac00803799088600882d0960f199166d77c13600243446e1cc07b46b5572bc97f27888278d89338fef9928df998dd1993def69d8b1993e3499ea270939e200aa2008ee028949e57922b109f8da88383944f4fb91033920f54e9054d3005b259087450077220075b4907b7f995fd38904f5808627908aa880778009071809c2b28065fe00530b0682ac08246700228600453c0079c008d937009938098d9b99d869993e0e99d2d2a99df29993069933459a3eae90998c0879ce99ea0c90420898e36180b4d3686e261350d7335f72950fa395f4cd00462a08f5a29a0022a07b779077360a0fd388aa4988a10daa55e8a0782e00602b6827b2006e4e6016040065360044030057ab0797a98992a8a9396500992d098e1e96d99370977caa79877a7801a93253aa7fe39e909a0b093a0109498b0a839ba999fb07f25089130a036bc1306b0900b17b61fc6a23c0cf49430b20fb110020bc00469ca0570500781a0957440a5070a965f89077600ab8770075f8a077980075e09a602a6075320064d90754ca0090dc9789380872ea9a23a69a287299375ca088c4009796aa77e8a73f647ad7e9a799240a83979a835090a8b8aa398b09e7d180a8fda79e4b868096641ba986cdf623541081e01441ee8b30071a807a65a07015a075c200776709b5ed9afa2388aa308abb909a1ba69abbbf978c7390540e0031dc00148b0079c47ad2f39a825aa969760a77f6a0932e7ac8be0ac20ebac7b6a859240b25668ad7c8a73268a79253afe098fe9099990a38c0aaea220b3a0f009e2ba0965da7364870118908bbac06ec7f25a4a02af6ea40be9d3026230085c4007b459076cb09573a095fd3ab55ad9955d6907591bab5c0bab7360a5a4789cbceab01b80026320ac8680796a698597a0966af9a7ce1a9c1e8b088b40b78ba00890508556080989b0b75688b7784bb2d53aad989709d96a9331f992385aa3356aa88cfb879b408b63e0051199012210068f5837464ab480e725c860030bc0026200087e96aab5e98f04daaf57bb95586b9b5aaaa560f9af76200880400655000425c0013e80828f8079ae2809188b999190791abb6d8b50b7c75bb7f34796dbd6bcdcb66dcbebbccebbb79877797ffe9aa72abab836cab8d5a8879b30a246067a19f00266a00b99ba20aec21e2f53670b80024d300867400701ca0651abba751007a86a07f7db95501b076c80b501db8f5f39078210087a400541b00446d00140c0bb9290098ab0082e79bc6e5bb2cebbbc0d7a088b700884600891e70889e07e627990057990894096647996cd0bb277aaa7d9ebb8897a9ede0a0a9d50a3a1000a1d88475d20026ed888f38030a0551fd7850e38b0002600067a10088150085a99baf8babffe88bf510ac002cc9571d0065cfb7806ccb04bb0041d80048dd00893600871eb8a896009c71b7965590827bcbc10ba8a8400a1eec7c6ee0785ef4708a788c7848008ac788aab18c2fe91d78acd2b7376fab6381993333cc3ea79c335fc93378b685fa002666703c8655827151bfaf424ed181e6d4545412c1181a20f447c001ee004640068a61ba000ca0585208ab6a9baf84ba0a77bbfb43c07b8aab55cd0086480043e300550f00341800691f7ac21bb08c48908932796a6f88462890771bca0ceccc14f68070c7a0778bc8a0c5a900c3ac775dcc68a5079d58b7995c0a234babd324c939f70b39e700b9df00866fa730b666ba26577b40145e4d1303012531ab1565232ca16c0047cd072a94c0785b00585c005ae4cab564bcbf83bb55f599baf1c07a74c060d3b05690005501007cf2bb78c80c16299cdb37a07b3fa8f03e9ccb15a08d6acfe9b5f79b0bb4908b929900b0a85f047c7d21bb28c70090f8c938d0bc38fdb0974c8074b60020b90027ec06e7cf277984c1056732303c14fb2c5112cb233ecb00307300146400681e0675c9007f2eb7e5b706da3e8af532bc5542bb5b7d9065e190880300853d00340900686f0066f70b7d7bcbc52e8a0705c8a03e9aa7c6dcd5bea8fa548cd7c1d90d30c85a428d30c6ad75428b79270ac3889093b69a83c5d8d9cf009e4ca0760a002e7060b42bb48b36128c7766cfc940ff680bed5a34619811f3276011320bad7b6caf26bd0eee7ca556b9b513ad6b5d995b689d6761008f02b051d10047a0009c689cca988d7788d07022cc083dddccedddc021bc084fea0a5763c9682ac081bbb9d92cdbde4da09fb87879be0072b30010bd6d99fdc1a93b224f5700ed0e06acc900ece2489a5fd211fa520f7100be963014ea007a328bf5ccdca8500d6baada5b31ca5064ea5fee8db54800425b0047a609c4e087fd42cd2791c967ffddcfee8d0fcabbafa6bb51deeaa81adb5fa7bd832edc726ce8a8920b280ba9d3539d9e49a879ff0077da0d92f300b00b545b3a152f2300eb2a0033520033290033b200bb4700ee7b00eea6b21f0a846c9920fb110031360014640057000a079c0d55bc0ca5ba0c4fe5807032cbb712007fe0bb5f7ebba85300855f0033d00052da7a585400980fd84b4bad70309bb18aebf651da578dee1feb28ba0513cbb831dd885ddc76809099767a78abb9335cc09374c93a140ae1d88682bd00083756170d61afa8159fc500fd0f00a39f0e3c0e6000ef0003350033ba077b3b00eb956254b4e3efb700c38900115800255c0052ebd05749007ee770685a0c4a7cbd7641eb5ff2ba0fd5ae56710043cf0037a3008027c0788f095a538cd6029c5610dec5d3ee25e3ed852ecaa768ebff83be260b99b61b9a0d8ccd816cbb8379c87370c886090014cd4606f82d4a76136ca4389e545ea428e0aab800a390001a2fe0005f00035200be9804c918248d0a53fecd00722d09c4810054b8ceb798008067d6dbe9eedae2aa0b11ce6ff8bcb8e70063f10dc802008a208feab7520eeceededa348b57dbe951d8ef160b9ba6ca0ed61ede501cb95fd1ae8a4e87e6769797f9ab1d6d8098d4c93e0e881b7b00930500131000b372e29ade1d4102278359003a8200bcb000de7e00ed0b00cb2800a35f0000310000e3003a8500e7a920ff5b06bd9231076730fe853012650025500077790eb7990e574a0c481f08fd8eee55b79e0b40cb55c200867a0041dd0032c1708df8eaf0049b531fff21d2ec5b25ccb54bbf2e0eed0523ac57e1ff81adfdc7e0fe20bea7ecd7bb22cabb8304b8dedf981918303c8709aa4ad2997bc196de21ef6400bfdbe0ae9f00ef1f00eeed0fbbccff53b90033220ea96330bf25056bfd4ea92d21fc810eb2dfe00a26f1008f24bd0f27b06bdbdf79fdff706dec47110fd81f0cb5f3c084a2cc5ba7907301ff3ffeae556ebeddb6fbf7e8ff9787ebf622ecb64bdbfed1fbb2e0f96d13ed36c6c9690f0a7003129d3a54b9e401df4e429d4a74db7fec048f1a7ddbe7cfd2cf2b398d1e23e8d1d3d7e041952e44892254d9e4499b224c67efa32e6dba74f970e0839a2c573170fe736773ddd6d5b666bd58c070e1ee89855af1f3e8c1c3bb23cd9945d9f0c26c44cd113a8d0163a85f2d40914b68e1db275e68c355b47ed5ab571b8083a13a4038f2a8e00c5894396ce9d3b64fdfeb58336f05a3975e2183e3c38b09dc368d5066e5cb8711cc96ce7d8b93c47f366c07fef14fe024da85022d292269926782953a683ad3f7dbaf5a98f0a1cc8eeddbea852f76edebd7dff06eeb25f3e7de986e698156fdb369d3f976f8bb63cda3259a8723c90815c5e3f7e18bb9b64b9cf29f77efbeec50a51010c56405cead081bf3610a1b283e39c552ba7715b2a81a0f0e820083206b9ebbec7fa520b3fc3166b4b33b61c3babbeb4029b23afb41e4c90b3cdeee3b042cdfe7a6cacc0e82344b4d1484b2492484ebb4420d640e1c493d75edb640f18629908268df6810a381f7f0432c81f59d2c7257de89165861a5ec9c91b78e281071c6fc001271c6dbaf946ba655ac941860772b0c51e7da0ea11a5eef8b9671f7670a8e00427f448c30d39ec28fe0cb1b5fc3aeb32b41a63432d38004163080e4a80629034dec0ab8dcdf41c6c2d3a0413d1310cd96290c1cbf2ba0c33c63eccf432391c2cecd33814f510afc4462cd144d01c396411152d2168b54c1202e5b55b1c8201071cc5736a3c217f0536586135d251b87ca09921845598e3269e709e05e71b69a7edc69ae78242a5a81ac214aebcef4c728aa534dbe9a3820a98d803cebcfab473ac4c2f6cf4413806a9a2040e046c440f44dbe057b33aebf897d2f744ec2cde3b21a5b0608501ebb44245f18a302f12ebb8232cd00431e41043167155124b2c592d21193f01e6132f4658c08658d2e4d5db615f863966dd58aa489f7376a869199da279f65967c3fe89569c6eb4b1a6e868ac89c6961d6470600659d6b187257ef4f115248ec2e54ebc7b7259618113d2d5c30d0325c3ecdd3b21dbafad3480e8a007290604e40d37fa053560b6e86090e0ce1e1c0cbfc432cbb4b3c01725bc8d44e370830d3716fcabc4f942332472d2169144924a661599133ec0604185146c0863655ecf94b974d34fdf88237eec69c996079cde26ca66819e765a71b4d1669ba28d062adba6579927ea8bcad48878f288136f2aafdf8cdb0db4f1d21442b3ceaab33140eae500093d0021436e7e495570d28303ab58efbc1f2b9baccc16fe0b6f3be0c33b7eb24c1d958d36fac40bb1b340bba344410a11c42104483949644212a0109918fe3cc0811680e10f7f78010ed89126aa89077517c42090ced41da710471d3a78c02aa2010f9ec4834a547a96d054a88d6cb01077d788460c51c13408ac021ac4214ed6aeb6128bc0e41ebb58c104d0a50732002210706043fe241616b16ce60e6c48221702e10832fca007da6bdedceed7861001a62f7dd10b6006f6a8bde8652c77300bdd0837073ce0c13376e0cb17e930872ff2a5108f624c5ed43718fd14e632f4f14b8940331a4530a27289f044237cf0011480e1560e794106c23041ad41a522dfca6026352912d275e71ec4d1c72c2030835680c384a604073ca2f4ac6f74c395b86b21eeb4710d6a5cc31ab600a10320800a748ce94c57dba1488cfec51d648461022bd8c31ea6308837c06154a71204131fc3a938c02110832043157e10042abc615f6a9883a23e0596c7e00d7d0a138d560aa11533e2718e73588366c0c7293792e533f4e90bdee20847f8ac33100b821e85fa24874f81c80e85f8cc2011a188ca5d220d41f041121a728b4df881092bd0c00bfa609bdbf08a47dcd9e026453ad2ef70501f1589c70e1c50869bc0431aee88d209bf118e560e4d96b2c446367697b45cd6501d2da948af4a5291e158841eb7304105c640c4415061549c210b130391be4bbd651052f8810f96e94dbca84151a4328cded008467efa058c8e9aaaa4f02807fb6d319c74aba71dfea9b70f354e2dff8c0320f508feb050050e308314cde4d2e08313884113b7fac317bce0053ff401073798e4445af611e38dd4b2a5fb0e30f5018d1a408049f1904694624a256975831b36c51d36b4a1daa251e368d168850e66a04b59b0ce25fc18cf643f62acabb1c3983010031f0631b74595653f149a031b08118729520109db04c420b800074168714322222bfbb23b30fa4c4a3ff403afa9fc72b63deae9ae60810c63c65ba13e5e4a318d2a44890e419a2a2c810a9c080527f69004168c6113bde8c52dbcb0823e1c234d691ace989e725906c36c3c53f38e53ecb18a51da024ab153e568676adad3c2321baabd12365c8b346c316d06b3c0619136529e95e8a81db9b88005c0d088fee1de073e75e2e35a2a24366b0202093d3842a1e2268839386f517ad4eec2ce49b8c9c0c1c94f06ef78a78aa751e1c17079240413a14730b50c540e0f63903eed204842cc970a8fe004273ed1882470c0099fe0c523fd7083146c941dec68c73dc6c4111573a75b0d0674907ad4ad98f4631d20dcc14dc011da13caf41bdce0c64db3f1616ca8b6d2ba7b460c8532db1940a3489f16aa48c285917bac69022dd0831eee3307f83dea3d5c20e8a7a0e864409ca10a3de88112a2cb85372c970d849b5fc1b2cb3e3cb1d57ebf06af33911850f546ea2f863315620eb3dcbc08a2d90e021854c99b2a0126c21169e684268ef001236c8217bcb0d52dfcf082cffee100073b80053b9cf2698cf439d0f70e928abf930f7bd062064e53e5375449da1386c39590261ad1265d69d5560b69319c8eef7470c34f472523573b4f0a34e0846eb21a7e8ea243acebc00638b801108080420f3a8084651a5110250f6771d5fb46625b9960c98d83fd120587b0e2058a39378b18ffc2a1b2e971aa25aa83b5831d18361034899dd98b88082188001a82c66816c30650a0095b85e2167186e00514b000063020053b98452f5be21d7be3dbedbbf1958a61a28f75bce275d0504e6849088f6fc894c390d6dda4adc1f04a4fc31ad582b82c72b9034f17a9b2bbb58870f461ea16744f51f05110fc2403873770e1e455685bcbdf2008b7c4fe010fe0e4941d943eec61e309db994aa2e1da20b6c5b1855de724b6a6a4ccdcb0cedc2c94e1ab87ec1908571b0680187b44233841860e74400c09f9442816f2093f78410319c0be0832d0000584c00cbdacf8e3df3efe93744b38e6a049a2472b5a147ec31b08b716d17677786c144dc4d4a006d2a09324a3ec40172e619da21a89a9c9087ec8877a88850ca880253084c4211c39d0bc241284936b2a95ab823338b966ca9fd4230b3c60b637faa2bfd00c3ce814c4c90bc4119b4330b6fc9813b3602bd89bae40b88f42289be9210ba4e3393d5222c3f0a345718c7fc18be5128446c81720d80024d08418090519e1054d480213d0801478811bb0811808fe8110488006d001f0bb2df123bf2fec88b853b096d0851a908155c8306948a5829b92f7e386e5b096f9a33ffbabb4fc8b0669d80667180aa340857400a9dc10b596c88d7d40063639013d182ee7a113366835c9f0264070ae12f00121431467329c399813bff840620323a83295437083b9c10b37e00222c0822d780f911b33cc582e3800201944b23d6a942c933628d2b16c6b3a45a19881590bfac19846a0021fe0013200b784d0843f700228848165848117708118b0c206f03e4f2baaaa01c36bfc8879339222b1075918255970072ad90636ac1237043cdc91c34aa3c36aa0866a80a168b8065c7a8001900159c8876f212a90a83741fc8ef3108173fee1833448039e6b3acdab832ca3c07ae9812a4044198483fb01be4c9c1ff10a23b3b22711742f53490437888238308436880221f80122c882eab103b199bab08826cf0b0b67aaa6cc7014b058b680ea32fc582305d10f69233d41d08325e0012450be4988914fd00427f0000d50812e800117784617b0811bb04203680033580741c4c6abb49a8e903c7a78859a8006981aad2a91126f0807738c34dda9966648476ca886b6bc066948bc1a7880a3300703ccc701bc08a680095333013080136fca8f1b030b0ad403b9f8012a1884b0381cea311f8a6c1ff6b914c371a643a8a63848032208821f1002928422367883407883e8d2032aa00222220332a082fe2920cd40a82eb1399b9f3b8cbd320b76d18c5f2b1bc6948c0a89834130043400021fa002479804a19c044dd80314a0000db801a654811860ca6784c60b48801ac09130f442acbc370bf2887c50079c41059e70076f20cb67114f70e08670803437b425399c3ffc6bcbb69486778c063380005d7a05d6b9cb90f095eef02158480f181883468044385a833c800f3be03c40680429e88112a88241484c4b6c8371520b3c3ac1c4a0182f2a984c012fd6148437d0a66d0ac56a4a836e028447d08329580223300220f84d142881180502344803344003526c83924b22fc19393680b5910398e981a24589b5b300af3680821f5082469804e1848446108316a0fe800a8801a85481e7644a1688011b10812c54997ab0b7ebc4cef153317b80861d988155f8097810cff22c4b6e70bf364538ddd11df6b486767ccf6a804b4da30902a88172002931bdb85f3a071c58801400033e68843320843b908335e08b044db518054e4308042eb083b6aa937f711fc6309fd6f38b77329527f3262a20025c5b822870830f154840483531580214e08009a0555aa5000be0003741033d30048fa4b650f4d137482261bd3dbefa947e2115824a0b7e499440e1264870844178041435020a98001180466824012c65ca1b20012c6c801d00bf151bd3ab1c8f3f538755c8015980879e20cf77454ff1e406f5cc1da3399af97b4f711007fcfe732db8b485eb78005450075fc22df2e0241ec1ad23898514b8801718033eb88b54ec0bcfc3262918942a000441e03542f8aacd280cb28a36f3b1c850850cc4109b4080c453fd812aa0024010c83448b514750214b0005a5d8005a8000d68012618833de0ba4f200551105a51c0844ce0983878b9fcc10c166441fb893991fbbd517483347802280004438050699d020f98000b5081111801122001e7c4d21be8821810011040801a9805312957ec8c3ba0a2bb57d801598086686853b294d76981b4bebd86f5b453776c4b71908667a086f88c2165e0bf19e016a9298998e011d659873e50000c48820111d63c80d43990226004020e00822968844b6503fee4da0cb518b6bd0ac1ecea54fb301593138424ed8121c0183de04922da033068010d98809bcdd91760ac473a375f10065f280553405e53085a51b80449488438f026c571c9fd48aee4fa144c4c227962d65199ae75aa5d3d68020a38000d18011130df6d25011660ca24784e1b080103080158d0b3b7a5dfc82b927478851aa8811d58856518a19f18cf6e7816387d346ef85bc0dd1d9d724ffc5b4f7e3d9a65d8439bb8c73f249e5eb91a7ec007aa31531b90000cf8023238837fba033a5883361084ab2a810d30825d8d1b67f217912b2840ca3d3182c02c980350b45d1bb52222080b0c0ccd46180326f0800b60000160800c78813d800d5e008626f6fe055ff80561f88529168660b0e260f8055208da4b78044378591e53da20e594241a15d98b83ae008db198ba4620836a9500b0150112c056125001f565ca2e70012a4c8106400071b5a00733d8f2b0c6fa6db0939a075da0db1ca8811ce85f9e60536f1060f46c256d78c36d40604aabbffcc33fa4d9e4f953866c39c375d8c60a16e48de80e05db8779f0cf08b85c446444f8d8cd9ee4000b300231d81eb9219cfcf0ab1b14d9bf882ff5a118bc39843480d0281802cde40247b8542302842930020db8800338e21508033f803361008629fe85511805e37d626dfe856f2e85711e6704b20448c05ace6ba60a9d23b60a45d9fb9e36e002af40c547b92632fe60810b9080f32501b00d5b16b0e33bbe8117e0be14c8058f0244722564f233e473980575ad011db0859e588e483e4f6eb0066fb8064b9e3f4ce6d74ecebfd6a206e8f8d7a6695b7b202abbd44eebf48ec8f3ad0b5081261890405056939b02e4a4e554038492c38ceb0d522ea303fa08045065188fd30ccbacd15b0b8228200dee515029a0d903500005a8008d82b326c66ae31d8571e6855278627236de71fe052b465e5208055100854b208d23ea3c8229392dba9f5f63b542e002c14459314081090001f30581f20d81b015dbb2bd013a53800678858e62b13219e485ceced59987594053465e862631b879f5066ba8e4745cb8f614e93b351a6bd043fea298b83f2ba9c41e548cc007a2da875cb03e0ff8023e2003281a3d3da8170a288125d81ec4295d22ddb67f926174521f260b452808828544da5a53503d40cede55800cc0016be6855e383726fe662906e7eb0e67b11e67530886e4953e51f0844408045ba49f244a1cbc280c3aa8eb9fbeebbcc600111881bd36df380eec6d5dcea78c013e3603c92aaa9466b19566ec06bbcb93d2077b480759c8811940059d81a96ee0095772386b98344cc6e4fa1bbc0ba7864acb8667707008960119400531e1b7d121d80d3271d26987855d801560e165d60324e0000a08dd93fb27089ca320c531381a18e21bea1986c03b9803aa4b8321e80122e8482e380308d5fe8316b08005388005d08030f803009b6eac9662eb16062cbfee52100653288529b6e26140de2b0e0550c804462804c5119bd93315077994790eb9b1b86b0fa080f7866f0c18013c07ec6dcde36e755f04b08174e095dbda11160b70f22bb47da8877240851960e46868f06e70876a598e2b59386ce8068693c34c1f3c0d1fe9070621c6a50753ae070a3a71d2210fdc5213aa58801648974148353230c20d789b5a2304125e834f0915f2a203e2bba3dc93e1bda89040d0a61ea0023740d94160e325301727d7803ef8845e200660e0856ec6e66ca662ec0e676d1ee72a0e8661e8eeede6ee6f0f06e9038542a8d138a19fc0809f4bc523c6e09e0f88000cfe0081be866f7f165bf4cd63b3bd0111408014980596e99682fdef430f34bbfc337be0887958851a709a9b00606f80c3a2b9f44c57c7ddd174c2cb8618ea866850bcecf0343d338f9820587c608a4e3a1398d88764a00a0d000331009bada5800f10030299e711164c0c018c7f9a61b2d075f32602cd3439383803366e0213b85928c7814f98f66a2f85ad7e626c0767e3d57661e8762e0f06b1fe855208056d06f732b784c88993eaca9f57bba347d10c9425830d98777a270110a0777ccff77def022a6c8006e80381e7918f02a6c53678cb22401eb9077ce8877a90851a5870e5c05bf19cf80aef860feb743a243c6c080765a0866e588669489207d881fe5778057338b08eea0e93c724a6200fad4106aac8002f48a63170020e38423258542ef80c03159ff841233822ea82190b39e8b538208221a002277b8301190316a8800528eca5a7f2aecef2ad6762707e7e6d077372ee762bb6ee710686ee266b50b004385177a0536fc2101540c8bab6efebbe065b3ccf77f42581c1be810660801ca8079247d8d32fe5bfbfb7a630c093422908068855cbdc6ddbe68d5b416ddbb259c3960d1b446c0dad59cbf6109bb688d8ba597b166d9bb25510203c088103d6b176fbeeddebc7efe5cb7e325fe2cbf792e53d767d529880b1674c120a1bc69039d3a850212e5ce870a953474e1d3b769c3a956af52ad6ac52e7d489fe0327109caf81020d2263c4c282050a5ec4e2e55698b05fa5e4fae2e5cbd7af5f78f3e2dd9b576fdeb874fbde05360a18b0608a83990a75e9911e376ee0c4915a88aa1d3a73e20892b2210206111846840e4d82c48811a75dc4b8e1ba0b080435ceeddb974fa6cc7dfd6ae3eeedfb37f0e0c287132f6efc38f2e4c375cbc4579b5f3f7dea5ea19215cddbb66ee1b65ddb56f1e1458d14bf678c38919ab56dcb94e90041e0010493b1d8ddab9dcfe64bdbf767f2dbd7bf3632b1a4b0020c308c408107639cb1602049d141d55355510555665a5978d51c7684b5e11b7100428614264c70800229f4d14b2f76ed35d76077fd05d88b7dcdc5225d7af9220c62fe3922a69830c194228a2186b8d1a11d713c58151d72c4e188141f80a6010822803082085456791a09acdd40c20d5d8c80400ac7d4a79b6ed0e1c69c7269aab9269b6dba39937dd1e9c3cf323aa062cb36f01c841045da686351431051241145166164d1431359a38d35d428934349213490818962d616a76ffce0c38f3e2cd5764f3bb0e090c205174cb041136310b5602184483821ac515d58a4548460b5591c5ec1c146538088918405242e10c62d29f2320a8d7c9542635f7f35ebec8c77dde5962f88b9c5cb2fc0bc584a289e5c62c81b61e51a071b72cc31871c8174e62406ed8e102506204439e595a7d1d085970940000b3dbcb97426996f0a3c30fec1050ba7cf4cffee670f2d39e4b04a34f180134e388b6ea30d37888a3711a011694c2835d460140d2b338450830d212850c10d7f2433e63efa5c4aa63e35d73cf33eb9ec10c202136040c2114848010515ea721108844f4105e19116ca7aab1d81e40a87535c1402c814284c60c0022ffc410cb5a3fc258c8ccbfae5ec8b30f2f5cb28d202c3cbdb7013a3a3b679f9f8ed1b1d4ecd861d72401508151f504041bbedca1b4295a2d5cb25be244080c00eeb3067a699bb197c39e699af89704cffaaa3c30cb240237134df7c230e37d774c7a89fe5a1371eece35da34dc82263338d35de44b38abcae6930c1041ab48c8c4af5ed769fccd131e7dfa7e898d1fe40031ab080820f415741062048d311c8914d6196618616867f9553b9d6a1bd53859cb10407071870c11fb7807d97d83802b362da31a6edcbb2c28ce2bfb44671ad6bf542186e11e02fe2320c5390e2128b70431adc108736b4e15c5c01dc11362081d284e07088130108aba41a17d8a00b316840016c900ecb512e3796d31c0c632843dfccc925f578c50c76100d7710e41bdc0187ea56b7288d602364b183dd35aa510d6a54c375db00472eca20af2e8401061e009e065e1086f9f40b6738e3874decb10f7bf461523160010b8ee083352e810c0de25e1d2ee39407c9c10ee11bdfaca452be3850c57b85a0021028a08006d8e01670bbd1b2b2a523b924fe4b6dcf4aa0ff2239adb710d080d712a000e7320c5288c212694083212868410f91e10818d8a0e24270010948a0541f4c4d0c4e7383130aa006e8e04d0d5d88a619f2b29706e3943c6451831c2c031dee285d3cc2210ed475e71a852a8fa05e371eee502488d7d00835a2210d69d8820612d8c017bec0041698a00213a8400a70d08759a0231deda0074b10f61b7eac63070d48010c5c600416acd10740580215cec0853314e2484b33d71df348be719daf0e4ca98320a8a0b503a4c00cbdd0963096b52cc4cc4d5b89cc1f486fd4b61bf94280bc808bff3ef1894a12032e776111633a2924c99cab0e70f890143c403810b44b0209f869025a89382a6169fe968fb3650da153b9ddecd2974e7daa711066b39aa543073278453cdc110f785c031cf0f806c6b813448b30aa51d244621099483bdb51631bced0262b40b081237c010c5270c23e51e0014ad9000766e8432c66710c76d4e31ec9d3143eead98010bcc00568f481118c403d252c6841068dd0b9eca850abec918f0e6d0a21022185124c600137800531f0520a64918d6e7931dbd99ac53ffe8d749206bcc527fcd0873d84610f7ef0c3276261c86b19506c3e92a9642ae314380c420c821b41085ae93ea006f502218c412c677901d9b0e3524bb55c53a12a5ea7426772f2ac5974ecf10a19e8e023eef08637c0010ed399ce1bb3f3ce42c6831e23460389fe47944811a321606938438a20388214a430053da4610a6260420b5410c214507807b140463d6456c363e020042188c10b54c082c8aef10847a0ec19dee006a9f8ed4153a1d5d3ac7207ad8c8b8f74a0c316b677869c1ea0027d30e45f4a212dbddc0f46d292164a5d3a8aff91cd2d051cc56f71f0821464a0010b586c0a5ee0053fb405456f5996294a410a4f18020d70b0551c1d710614102e04096800027eda0010fcf402a151cd086c6003118c6407e850debfbe3bde413f9537b89489cd189683d0f1d020f1a5efe9667744d845439ace949d35ae811e89f0971a0466050d40f0012548210a5448c32020d1883d88e10b497001953350651bbce21c2dfed94d2e52d61a17b420094730821af979040501020e15bcb18beb40885c65050f56095f5472e58636c801d90d3a43132c108113f8a1176773648c8e7c23482e997e4be60531c0f6db176480010c10800010a080791f8001945a010eba9da2916a74cc9678031b9c52d923580003194000020ca0809f42e0a711b06e6a224e839f9a611dd18989a009adf15efa0b37e7dd860e20a00366f09087e1982f7d53a790f194157667951d7a9c49a8d86dd319ac2081043e20052a10cd1090b0842534a1093ef016072b30415ad2098b5cd027d71078010cced882c7aab17a47a002207235873b38f46995994a8c6dc559aee4aa0de542f6d106d1040a4c80099ff0fe366008e3487167142ea5f01fbf6f6440ddb2fbddef86b702e40d6f85cf7b01f8fec349e7d723539842144951ca821ad1a40a5ca0010a30409ca99b00889300843310414960610ffefc6be3a697a13c753913a9d2432433b00541b6f1de479b4e1cdfc00e37581ebbd7f5b79a9736aba228d2df6a6cb3155df8a60f8646050806e9119ce084d035b187e9c3400317f83060fbc06ea8b7000668fcbe894dac042e08e25cc8a603d8955b153bcc782b2f8eb604cf7e632e90a1116b3741b74f0ad270dfc5a588d4e8ffd4c54915432cf8c10b5480bbfd9d00300002c09b00cc1b04422003ac0060b9454b8d826290422620451ea84f2390410b4c40e5cddb9bfe211c506d506a88909bcd802e248f3c75cee9c560c1a45e6e044c74c8843cacd703a00234104437c0577c8543ca71839f74c7ee354aa5c98e335dd3a0005811b14ea3884334c0020d60c00618c11450818a2102233002244c02183e82263c02d1ed8117b4800950585a6840f7755f1224c1f7a5d11a210115c401216408b2e5411ed0414135cd5528d78b8d8b04cd011dac01549c011f18c104acc01f78195ce4cfb72952daac165c38d92df8c1a828e0023a60011400027462033aa00436c00df8c1b510c3628442250894d47c481378c001c4e2015c59029860a9844608795802e4003bdc200dca20305e8e3cd920c2d4c332d4c00ca0c232c81e3cc043fe387803c508a1e9700335aedcee4993a54d1a80655aa398553414180944000720c182bd012250022554422574e1175ac2233c8227481f18b4c00a5440cf54800598000ab4400b18c11ba691f8150d67cd18412d0584644554d40157e04a1c1022b2d5c12034820f4c400b7c02315c94daaccddae0058e6c0b9319508af8c10a282003140004a4400d4000030cc00078e227b2640138e0bb290003bc0097f5c2dcfc826288c22ab2c11b9cc18728a201c4a2025c199c19c0e661c007e9220494013da0d70b06a354168cbf9c573f9cc30ee4802c2c230f6947349edc1052639f5863378e477f5dda1206caa0848ca685cc3378842d485104a0c0124cc11be0fe011ea4233aa66325009d2544c2234c8226fcc11e8081118808059c000ae8e3f7c180af21d8d1f011d765c61638c8413e4d546448428e4b1b14a221de1419684d45a65b24eacf5f20460269d4dd09502f5c620acc9b0342000ebcc22cd0c22bec000414400010404b16800314c00038e0032a800098c82dc88fb60443288802254090200c821e645bf0d8e301404f020ca504f0948775500284802cd843544ea578ba492e311573d40c2dd4002a905cc4c04334bc837638e3374c0c3512a1425c039f4cdaeb8c55594e044454c33754c334d08e47d89c0d488007188114a4411cdcc15eee651702dd2244422404ddd0edc1142c011048d609708005780009feb0800b24df190c82d4289b4305421e9c411e780f558c8fac246491689d439ecf1984a60538c1dba55648811b6adadd6a2d198a18e002c05b2732c00eec823ce00393e6600d00277012006f02674b0a404c3e600a10cb2dec887276421cb881219445d678003f56402c5ec0755657bc940a9ab260eaf947e98da79caa0973dc863ee4833ecc420d08843bbc8380c54337b8433778e537708337146a7dc64e599d555a3244a1048a4428114340c4344c43372c03a821681348415328022320425e62023a3282244802855628274cc23b36821ee8c11e384187b29d09308118140520645d1c28c5520cd41e520520f291566c862825891cbcc1204c8109e428febad945fe7464da90cd3030924659522ce04003586900b4640ed0423df4c3a630693aa00204642b4b96abb9b224bc81891918526228862a16421aa4811e50c112348118ecc10b8c482cfe5474c98b4fd5a20ecc83c7f5c36dcca9c1ae49cc209a3e30430ee8c040341aa0ba43334ae39e14aa9f78c7a4c5ce1232849f30c4a45643362851443443334c4334c42508480009ec1c201402229c2325e425257461a952e8239c2a601a422390a11e3881090c8e0714452398a82108421d580d52d0c11ed6918c62866588dd04551021facd1ba4c168e5e896326b026ded690a8646deddb2b0e62dec0471522904bc823cd0c4a6684a7afae6003880039cebdb5efea9003480d77899bb8682240882b17ec882bdaa88ec6b02d0d9bf26c0c29941b7225a9c1e2ce322c7e4f4833aec800cc05ec9f190337a653874c33774437d2a44cbb59cf0655a5a2e4ac77a4c35681a80556a33bc652b1ca804b08018e8812010c22174e122782aa99a2a8542c22298aa24fc252404a627f081181c260760e1ce0e42875c06522085d2d4d4547085f850d0b139c51be8c1129400d6becd5ec485d7ee5f6080ad93f9c16bc2db4a12c0d932294cac6d3ae480dc9aeb945ee920e140b1dc82bb06832828c21b00c22040a7ab9aa106086eca0295bc85c02c9457a035ae02ff060d1a9a9ddea92c84ce0e1184c476033c6807340a617df2c9cafe79871151c407ab0ec73e6a439c6e127d47a556aa3318282b35c1820d8204bd2c222882224002852ec2225842a9feae244ca821bca3aaf62c9ba18014f4af898656209c01d2b49f84bc9885945d8d16c92038810558c01e9c948bbcc8f78e4d46bd565cd4452f6022045a294bcac02c30e9da6a0a3fbc830e1040dcbe2f6fb664283280897c02722a862960421ca48120dcaabc129d0a4480e60115e6e9c00af146c62db022bbd06e200c9ef60334e8c00ed842563123e666eea09acea022c4e71e61107163eb740c35a80e1351eaed4cc333ac70a67ec011942820b8012120422128822354422d578222a8632548c2cc7a2124fc32243c9f1e48010a7040fe07000128edf1220882f954086735adacb49fb04ead53904513704005a0c1b574ef16d74d908d4d5d8cc22566c0033a604ba62f93d6c3dae2c32ed40001406927b6244cc224709aef0a74dbfc04c330a822df0a0259c8ab18b0400508f22023c00cccc2e8f5874b24f2222bf273102c74d8832c3c8c3a949c76b8c3570e6ae6222ac664acc65e9a9f5803c882b03331513544c43408e80aa36cce2901ff4e862c238523d0f22c53020ddbb45e56422648c22f03e623880110704009000114a0811e2c42d10682ada08b1e01a24266c51c0c6b929ccfb162331a6092d86831f8fe822904c6b5882403c066b6c2db00e0c02ea0f1a6ecc33abc02040000941afe69b95269b9ca24fda6882f98424c2d42dea88b2044270a5cc00104150177e72acc4353317443332e99e8c623d70c3434ec2c6895e53ae30567ae370cea65db67ee5dcc11c51c372e4aa1382a0847c3e92a9180aab02a9701097c800f400158285bf3160225c8f6cbdef483a26325e0702484a118682810f4c010a0410425f553d4d41d65081f8dcfb948ed1a68461d0042abb6408efe4fdb6cb537cb4557c7052fa0080e142971cae4bb4140926eca7dac839e160001bc5b275a2995f2a694a22be065c08f791be335062618c25808425f13f388681e0284c02ba0034c941e6227f60217ece8c5c30eece90ee509463b23c5688784db27e8823008c7dce8fe0ecaef3953342491389876a5a6f20ab7020d90c006200119c00117d8416ca3a36cd3b022e0346e338222009d241cc220704223f0811e40011094400904b72138422070811d2aa405d59453e05154b7c11a10e266c0411a34c2129cc0147c02d904c6d67aedb72986b6c40d2f74f7265aa9915a690aec002d9c433aecc22b3c294bbe7399cb35ba062778a78045628b3ee3ef3283851b1c2b9b45c0bf1a800334800ef4a27e244c7819b8a2238c3de8690d44f60443788453cc657b03c678eeec30043588b67ef5e77f5513c89ab64aafb0cd7993ce091417e861074ac521bc2c25ccf0cc428222ecb024e46ea9862124606f0970401050011ff4efad0ac2fe56a8811ad0c11d6886057545d9492d54e40ae040411a78422904834e068360dccffd8cdb5f04436228d2db90efdfcd39bc652b1de7000ea4a49ca36b3c07673dd379951267039c084e26673080022050011c48461a28010f508001d019dcd6002dac04e728bac10f07749c43c8a14234c083a3514c3362ee4114847768c3a56dfa12f5e707672ca79db4124dc32993ba33d802a881c0ca0a941ec66cab1082cbd6368c4342a9d22c23cc6c224042223802851e6b097440094c4123b02a19bc01f51e9b436696b253efb94005aeb8011a0c82279002b55f376208d9d9b42bddf0c22dbc8002c27727ae770194e400bc7394ca2d590b4070ce75bc2d200ec4fe426b72a9de06828a491014645004188001108077d683a125fac12ffa9ce8033ee82904c8020f79839e5cae054723768855482711137a7a7ffec9786043350c8ac7df0e35a0b2c81758cafa00191ccd40dd41f38abe0ccbf2cdd7302490eaccd32c24e03c181e6b0f6c4007480119f04123e0aa28157d667166ee2f0d1b7885b14e02288402b7c3c8fd8c94d4173fb7c74d1f5480038e35da0b4000c05bfc863d3d9b2b7a9fab700a807c6f37b6e86428a8e21ba8811b449414f880041c40bca1c2e8754a99f43dfc9f173f746beb3dc0b6163e343663c45b763516041156044060c3668d60418305b3652338105bb681d50456a3366d9a338bceaad92a03fee2c3912967b89ca963e74ea13b79f2202ab4329123488920319229b3d225493023417234490f900d1b7c8869a40790a03770dcb49933a7cec83976ecc469335529d3a671e2040214a853a860c180fd12fb0b18305fbe848d150b2cd85a60bc46f959c14080800003f00e2030a040df027805e0ddcb1730e1bc87f9f6ad6be3532fb3a5be9a02b5c88d9a3451c41c992001010e68fafae9db079a5f3fd3a751a756bd9a756bd7af61c7963d9b766dd3faf8e9d3972fdfb21a325645dbe60e1ebc70e18a8353ee8ddb356edbae45bf56ed9a426a070f6a23a8b020b56bd6a84984588de2458bac6880007144cc993370469ecc436765fd428e12e557247351fe7fff392179e4113d90e08002149090820a3d06312a8ea69c82ea29aa967a8a8eabe0e0228d44423145adb44a394b4411c71226c4b378890507ba18d06bb0c4feeacbc5bdfc92b146c4f08ab1ae14fc186594b44c09321450e2d0820a2ac83802830b6c80269f7a4adb671fdba8acd2ca2bb1cc5236dde859e5811c6c718738e48c0b071ce3bee186b9e69a8bae9a84c0b386218414d26ea0eedcac464f6cc8a3a822675a69253d1030f8628c330061830e3a50ba833efb0c21e49043f2ebef904518b18411980214500f2336a06083138c98420f3e06d92a90a6a0a203aaa92ab4d08ea6d8e0820b432ef16a18b546e1654412c53251185f78e1a5973e32fea8ab80bb5ec4312f1995cd51461c0bd88b451c3ee14518618214b2102ea880a20916301861967bfac1c7b47c4c2b4dcb77e18d57de2b41338d991a660853cce2ca84473970bc818e1b6eb4892e1b83e32ce84e82b4e16e61efa8b306a2f0f4f4b3a24075508f84230e65430e94f258e9d1420c298410410e318452ff5836c490470669a411327c0895020e5068820ca2ce08249056e9b8e38e39dac00a2a92e890a3295b03310414af3cfc655814a73eabc4524ae9b5175efc78a12e015e1cac00076aec8b80c01233cc59c2086071053f7cf5a5db2011e1220a298ef8800433da99929fbff3e167ca79092fdcf0c3b97ca58657c4242e393297dba6396ffeae2938a184be4b18a1ed0ec2861a88f5fc5ccf3ecbb3a8958c2520410a32b858835194562aa910410821c4e4da55f64f114512896411480c91990f3250a0c0780b72de191055ed5874e839e2b0e3a956b97075d6a6e0f0046a534a49ebd7b8c5c2bafb618bbd055901e8a2f12fc1fe7a51d91bd7ce1130ba4ce8d1c7b94349248a2a94f800832e72b18f7cf8ad5dee3adc011198c0d9d42b1ffa58460e72000d776c631bf1884771ccf42f6f28e71ad0d9064132678d687c0e3bd8b9cee7a2233a8a91ae74ca381d0852d79e2ca8c151b63a437db870bb494d4a65866019222e0589419c8a0f4e289e054ce0010e20416664780f211c1534e83d086875a8fe1e84ea0007a745662cbef805b18865162f8a6f5bbe18452f7ad135baa06d7d6bf34bdada18bfc03040010a78c12786150ac804c314a2d04315a4e08309c000177d93523ffe9648032a90918d6464bdfab18e55840015d0a0073cb6c1af33fd6b1bdfa09c730a12c2675ce720dce90e78c2f3b9158e8e74e671617a24e0032abc410d72b0c30d0bf1a890d92e0e8250d921e28007430071878930c4205c3694267880021e60010a3e8004322c8f0b70409a2da33212a834655158ec6524bcf295af88e55756939af850d48b5be0a0020250805f08400007b8113171a4d600beb68017f8e1139f104b283a140a4f50410a46b0800afe60c8432a72918e74e8fe43e7251a44f2031a3398812cd4814978c4031cc8e1e437c0d1c91062671a2534e108afb1c2155aac22ca70a90b51778459ba810b8128c40dcfb08590b90a2b7100a64f77b8439409316643310207389084a396a00983d00a17eab028394c4f9b7620041621140737042257c3081239cb693532a2a5585c7b011dc116cfbd38c001f1cc8b00a6859779caef305f731bdc7c550a52602d14939842138e40010df42119523aa4dffe3638882e96b1572220bbf4218b19e8204cfebaa02697f38d6f5c236026d55c41b4431055821074a313c7e8fcf45265006a2314f0c114de109240d86aa717aa031eb0428838b82c9887c0831df08007200a0210c86c8418fe8c40aa2600a1044098a6aa201495a31d0d8b4f590a1ce08088a779887b5f149159c4b82d74faa81771c9800208108066e965ae7f816bfc005380afa12f0337f0c32dccf20b52e831149a1083138ee0810b84a1b052028d68f691c8c62e98c1b4014d8207b70e1d4c361af1d886372e8b9ce3004cb30493ce4845eb59837c673ad4312d6afd64119702ea0684328213dd63ab6d4e172aba15842002113de0d20111882084cfb4a2073d9021b9465842104aa020a7aeca51d4d5e6831e14ab3860b769a030051fd54296b29425cbbfc05ab17af18915d955be707d63daf452cfc0ccb72e0c48010efee0185f94e2137b0d8525a6e004237800036140c66820fedcaed334b4c18536b469a4c49b75e163163990812c2c188e781c67d2c7319366d35430108b183b1fd6c689f5248e8938c362cf305d6b7d40062dc4f8aa7210da1da61b87371485107878f5abad6a8840a4810a4319c20996b004202c810a0dc2ae1d0ab1cdab8ea4a758610356ea1007ddba6111e11ce758b6cc65b1741745c4e0da98e75b36c2c8d759eb633303f679465e00a314a1d8ab28f8300529b480021300a09412ab9ac111fad0fd66ac81a7640f7ed4e31533005371404a260c82a3c39ffc8e3642cbe98344c71a252ef169ab210d894c4319d37045c74ded0c5bb458023f7842cfa05a0739588f2450c1f18d6b6d6b4639ea0e3f0e842088d2fe082a00c1074ba802b1b7726c27ff2c2a53c68a1b9efda03a04020e82908428f6b8162d6f592da5f010b18c750b3fa4608d668e511cd3da2cbfd8f5cd3d42237f45418a4ba4610ac22e010500788fd128323587f4f7dd19ccae7eb08b5df870c70e1ea083656cf44cfc328e72d2a4268a5b03e2129fb87434cdca6a3ca31ae260e98a4f0d820d1c61d52089c3549722213bdcdca98288c3ad43066b36343d1150d00324aad08321842b0d8280c31bb2b2f40bcd6a56ce467a1cd810edeb4d1b1256beb65bb4fd8b507411ebc6eac359db1c983323a659e7de672cca3b0a8076c814974083139c0084095880907267173ff0f137bcafffee093e4d3d689183fec02fe38216347c372c3d306e1084602625a1e6b883c4bee360a8e31ac44120b0a1d49e21e4ce830624a0239cc856ea800da8c20de0402b0001f7a2e710906d51822610e8c0670ae128e2200d888008dca0a7b02bf7a60bd6a4e729588555acaaf7b2421044c11486a12d428417b06d2c960facd68d17cc672eeae29deaea596c44bed68801320007ecc747b4cf1442411430210daac0085aa002160007026834fa8180d82f0c1b0c92a64480faa11e1aed4b6661a3ea2f1cba61d2baa11bf44f1b3ee8831cef722aeeb3bce373103001fd640119d0d404453d8ee00bc8800a32440dd4a0a7b4020e9a0d2a5ecd55eea00e5cf00dd8000fdc000dd48068a6fe8211898ec6a4479bb088f7466ff4dec069ae4c7cba4ceab6cc17cac2583ee1f92a8045f0099fd80caee68b01dccc09a1b01745e1172b215cf6ac0232200c8e81374483dfc47019194b70be50efe4c137bec419a4011edc21d2e0301cb8e11be490ff08221a240e73524a3a188f940c100115d0d456cb194c8d15360204484067dce30cb4207a642ddaac02699a67f74622da7a4a7aa6020f94a26894aeaa68ac1ffb71c6a0c2674c8f0a9c86fb7ea12db28ceab62c088d258dc22003e84817dda98e14804574310332200556c0096fe1477ad1474841140c010a84ed032c6005fa801d0c4cfd10891971b2b10ceb34f2011ff08119740002746016d4c182fee2a11bca241c344b0efbaf3bfe8f944a680f192f0fbd434efad04fa80110cd23f352a709e6f10c904e69e2c303c9f2059b4dc760a50dd460209f2df8a88bc69862c6103221a3ed0d4e3157b828227f70eaca228c9a2fccba26054432031aa00118a0303360056c000770a00ffca0478ac54744010a2d611444c112c2cf083a8005c2e0160ce91e9c511973723415a80c0727fd18ad0620001566c11de4c1c22aed38ba811b0966ff3a073c9a212104422114c260aa230ff330b4bee384b2121043ee195caa15de910768400adcc3122971e54086513c7029a8e23adbc063966213e7c063924ee54691241092f7e632abecc00d8a2d5782449cbaac2fc168fe5bc8a7583ec10ffaa00fc2e03ef1f331ffe0136ee11660d1177ff1132c730fd0e00456800560e00f9241ee0c2b3748f3411dca340d0c91f0411fe441b220200764e11aed2f299552ff9ee320a0523779134eb62321aa1238454b9526422b556cc558810708d139cf800d72690b16653ea2286938113b0532f488c63a3d66aa9a422cab4a06cb13ab1ec42eed7211f07218a09415ddd35784857c88018d7ae14ad5696bdec23fcbca473e211454921430011346e1130874055600063a931de48e414f43a220744e11c8ee124d3742831e1a2d435f8119de8143cba4c306a61becb073fa104e06d03741a8e2528a9458f473a6412b3baee31a90079853099cfe930bde20aaac88125b65aaae732d83f429e400f496a2544b75023f2f21f93121ed00f48af42a8ece0dd2005744c1da24b28ba8d48cc6a78cd6ed15c3a2141e03404761257fb14c2dc10ff6c0095aa024fd001918d4eeec013544934eadb54a06e7b00ee9c0f88e1650413551c11dde419332481bb9a11bada15019422038e7372b0e0f81131c47881ac091452f0ff3584b3dd6430cc8800c064124aa290e96a22906b24739f155d7800b2aa40de460481b365547c27a44f17aa02756b1e8d9dc2063050112b4479c743058a0501846016b7a912db88c7bf64aaf488114c6f41230e15831c1120ce1fb5a4003de8626bf70d0aaf55a79d64a14cbb0763237fe74e36fe04ffe726016dec128fda5a3dc905009220e15865d7b1321dcf5ff3c2b22588a22562c5002a50c60c99974a6b886280dd2a0287e661251554851153c4b75293c6668a20b12413114a7824895c655b26aca162412bae2ca822107b3066bb8457ce6267c4c61651137715712138cf5176596664da00270c033ef0134ff06374ac38014ab6739d76751235bbf50fdf0a1279961072c4a16e82f1e36c882e290500bf53603f0604c09c43e271ac0316afd306bd73150584139bb800430000334800592400ac440c8f4e048b800102470e6e6400e6a096fe520d98e463bc393e566657aacf37907d696e6122bec721076e269acad7b501671559614a470feaf14974ccbf4177f914c1ff7fb4ec004f62919fa0673e96e3576b673fd57df4017d1104dfd7ad234ca6107644006766019f6c5711a270e6f173b6677f142c9b3f8904f72d762568b6b59a183cdc06b412001c6cf045a60099ca009f8b55fddc3a644a2613d869b524e9b42cf4863b0862524569e77aae8e05499022b8c22b6cec0102221136e756e8cf870bb65bf5636ed56f665d38e0a6556c8a6000d5aa0054ea005fa2016da81410587a1fef78be16573b33573d5851fcea1e0646071868338d8988226a88406221b1ae672e478c41675f154894f2a86a52e8277cba00c3c180746200426600228c0023480848da009a4600a600c24d86060ad480265fe30f4544e692016ab200487976287e72069fcb197b0c256ec32bb16a14c57d68813777ddd6d89c9b48917210dd0000ddace0856c040d1c00ff0b772ef0173272a736f128c85395ef42e7042431dd2500650c116cee14fad9182a0193a3ae820ba8161a6b2d34caaa4569445a301395da883ddb10ccc80153eb80b5c400546a0022220020c99033cc00712440a9440099e200b9ccd56b880106cc51e0bb20e2a249b34d99f71785170582aa2c7bab44a0d66792df1e094cbf4a1cbd4a11f1a1430a11332e1a2336111a8a00a8620d88c00053cc00460c00c70c14dcb109216a97f8779a56b239148a31e74011520e00166001596a1822e484ca2199a9fd61afeba211b7e1ae21a4fd30ac6f10a625e4dcd166c019c01d90c9cdaa9ffb80b6e20064600030ad99037a0033ee0033ae00788a056f0590b88e0099e800b746c6ef3313c71180f3c790ed6203b912e3bd9c063d4522d15f1aed7720dde1aaf155113d5009fb3400bec060aaa80a381000538400354200c62011de40e4ff58da5257b8156a30c6f43ef9cd11ef4611e6441356520075ae1a6adf199a3b9200a55a8e5b8f12ae79a17825d270e952275b594c1165ac11dc9999cc5d90cc6a00cc6c0a9a5da054440042c609d25802384a0aced260a88400878a00782e009de8010acca050f52425865a0e7c051deba3bdb20293e6f0de67a86f0ba088a4011c9bbfe08aee00a88a0084e5008da5b088a4008e45b088220088600090e7babbf001690a11d6e437f75c3ee04389827bbc067a33420293486161fce011566c0013274156c211a1ca7b43f280ee93821426ba88d3a7354491d69bb773ff88f49bcc49d1a3f6f400524e0018f800c9e800aece60994e0073ac0527f200a68c768a43b98a04d216f780ef060299ec73ab3b3bb95820ed6400eb6400db0000b14d1c9cd3bbdd3fbbce39bbce77bbe9120cb7da0036e8604fe005ab7f5c0d24f808156d00cfcccb764d052831ff2611e6601156460a667600764c11974da1bdcc169bb21b4a0d6a719461b9ab2f1b4d9b346271a2c42a96bdb1d47bc0cbe80d1cb200c3efe98316d4004300004784009dc430be4590982a0073a002890a00ad22063bbbb9768e7646e2c2a6a47e9ec20922d842c5dc76d15710db6a0d6b7200b9a1c0bd6000ba43cbd9bfc0aac20d8adc0ca85609e95400890c0078ce0030c04a172a17275034f0f6ca2d0bcdaabc45d06e7c07cf90cd3e1157260a621a0a65f611b84239ae3d00e29285d416ba8238e20063dc424461a16b08f139dc41b9db7cba00bbaa00c70c00662e0022e800278e00868f40ce639085020abe13941a6a0f60e01110ce1c60cc1d48d02c856d00e0e01d65845aa72b854f55a0d6c1dd7737de4731dd8815dd8affc077e4009f2c67f3c60a44bba97217bda43030cadfde6291b92fe12fc34e681167620076a005f6a7a159ea18d2fac9a9fb6cf8dda1ab4597442e7190c5de4967a9c777bb7a33adffd9d9023e04094e050b4c00ae6d9527fe2039aa0ec1b990a6acf650c0179070199624627524555a6ac0ea4bb3b63e5e3f57a0b46bed7a51cbda75c0882bdd8e7b9d87d8007b69a0248c00bfe20e62d1b3570a380081ce725ffdad785db99011a686115be7db25057382688826c37dd5b17446d53c4ae4322a4411a6cd7197041a93bd8ea195d09f2dd9c456002b61e058ca00abc1eec599e077ea2037c20f8831f08eabbbe87a0f8eb1b0996600a1604791b01662cded93e590ef4bafaf77eca4b1ebd89fdca59fe070c3f54228004f61bfecc0d6be76f2367036df2d5bf35dc05981dfffcea014a2229f3e5ef4b56411664c11694a1dcc52460a2f91a00a21b376b040b5a8b168d20356a05a33d8be6cc992d5bad58b132532663978d24484c882081c71129529e58392984474a1e1b367428c16103070e1d6ada7c592267cd12287c0041d2448c9e468e06e9a1f2060ea1394cd7385d83252a962b578a58bd8af54995ad4a82f828f1614384081332bc8095acddbd7df7eee9ebc7af9fdcb870f9d1a52b37afdebd7cfbfafd0b38b0e0c1840b1b3e8c38b1e2bcfcf6e5dd7757aebe7ceb68adaa31438666193350c9b285d09d376ff0dc6d3b7dda9ab66ed6583764180d36425c126db18205cb8ceefe8d4748609040e1c3483254b42811624588721ecc3bf840011d88f49f48942091b2a4ca92ed4890408f498103cf255286160d14284e1c394f9d4ea55ab56a1122459e10b1afdd08900e1b28509830c1083784d1872eedec83205b8dd5651783723986d762124e486185165e88616190ed75975d76e9438f39b2a092430d0f9c38430e3aacb2ca3208a126da36dc9cd64d34ae1d440d42392204112eb6c8020b2bab60d4850b2480200108229144c513c72df7c34acc213145957a5ca9c7194439d248978f3cc2c71e7af0a187184d1871424c2d756084508f0c92867a6d3c85851a515185551151ec09c55648c064817fff1d904118b9b073a03ef7e4e358fe5df9e4e3215c7531d66886965e8a69a69a2e16e183f8d803a95e0dca55992c3bcc0001040f40a0e28a9fb9b88d37ddd4c86342b5d61a516daf5c54860d23fc260106241cf1c518642881ac7251fec05cb34a10f5e525963c620827d65a3b49b69c5c72adb59a34c2c7992870e05f074890a1072082c431e71a76be97d57c446807044c327160420b4c30a142051af4c10e826ec5854f3df8e01369a78d76ba69c30e3f0cf1a5a3ce5517828d35968f3ab3aca2036610cc90990c39a0c2a22cca28c3e333cbacbcccc92d2f33916dabeca0830e2984d04003095c204217c54a31d211c74529c411cc7df001958338f20824912c6249d4d94e3d8924915c1dfe09245f3ed2c8239c7c6be6992d0131851e82bce1861a6aab7dd5135744f1c4134130cb9f783e3821c61e7e8cf209181598050b3b6d35e821c38c458c78e28a2f6e18e11e6ed80f6408ca950f3dead4f2e32b1cd750430e20a7d8aa0ea8d44c7ae99e83ac6a0208ac8e4003176410c2b047ccae040f434bc99c125a726d88218b401d7524544b42fcefc45f0d89d6d97639e61846cc54c212e9be81861a79d64744103db044130a467cc1c726b700034c2fbdf0e2071829a480c331fbe81357a492324e7ffdf6d71f3f5d934bda68ff94d3b30e7ac4e31c301bd1e940773acd9c68810fd04caa4290aa5421400002585d03408041e6d0a0591ce44117c6a0fe254824e27750cb44d416413c49544d129490842518c188148a307993800497986784407560096543031ada80062208517b75eb000a8e2086f0dd8218c560a23078318a51dcc20f2fc8400afc508f7de4635213bb9f17bf08c686e92f720faa0bfcf0f216c9d0231ab460d9326601c7118d4e0739a8e38a56f10a59e4518fafd8410d70364103802449cdda80924402c23370a21186186125a2668945542286c4ab5a2528014318128f1195a8842462e849470ce5117a785e78c89606344061083fe8814e5e42254d6c0218c430863188410c5ef8c217a3e0c51347e1871530c006c758cb86d258c6302a7399ccbcd0c51896460fe9c31efaa8a635270340fe779c639bee48c73ce6418f7a88531e004cc72e62d1071ba4000221b0e20bbc60061604a709643883238ad2c843a0f0938c40440af7b9c91866929f9deca4240c0a09434c4213a52cc10438608425d42b272538c112d0b0073e68e213c210063184010c5e00a3a324ed282f4eda870630a00fede0c75af282cc66ca74a634e5d0fcf4573869eae59ad6a48b35fbf196a04e6a2e39bdc73ac6410b38ce8216b4404632c280012f8ce16b8e38042112a1884520421199f4642514f1c945c030118c102b57075a504c5232124c6bc41e9c70020b58e004746d8113f4f0884f8c8297be00c62f7639526114a3a4263d29313e810306a460162f1dd55b1c53a9a1fed674b294a55ffc6e5a38c9e0851f9311d5877e0a3ff8e1035208f310a438ab0f8b196cb4fb60870d32003ede1d020f9440c4210e01434554221306950457159188448870846265c4590f4a094c22a2ac860057989c60820958a0057bd804474be10b5e94028abf88226105dbd1c1fa4218bcf4431fd6078b7bf8c57f99adac7bdfabb8c2498e7090aa14321714d36a460e3239956f820e7630041da39d60f083261c910844e0010f5ad5ed571dfcd5dc0237b8c18584222cfc49452822b9972c680db9e6562348d7099fc8252fa388e2f10aa397be0caf8b4f2a0c3fe000072fc0c12e382ba99842a8bff0edb18f3765389b460e2f91e54b6acfc88fd272fe36416d714b3ed8c18e3e6840037ed0a8210ea1603c20e2771adeb0978d0bdc421ca291570d2e22b0aa614ea6d5a09360da97c4c0010bf8e116b738298ab19b5d150bb6187c1e2c9f9f288c5e04330535dec54bf9b2308a05f9c78c6e748618d6a04a15592ec6e447a8a4d9e4b6b46317b0e8431f56b0801364b46923cc3222b6dae52e9fba108810b3555d7d080aa339936a66b39bf7808213a0e113761e45297c8d673df7f9cf8325292f10bb821ac7c2988e6eb6b31957a92ef6257ea1ddd0fbf67b0f76f42216b190f1fa5e508105b4800f8f98c422b09adc5363f9d4a856f7210a418843d84110562584abd99d660ef7b6cd5cd3c414e8aa895cfa7afee0bec02e49875d0c5b163b8a9ff0c3a0cfc2ec674b7ce2988ae9e1262d2ab854331feadd6f3b9081ce17d498c63008c31e98600123f0216a6646c41d6e7b5b56bfdbd584b003216e6e07f5c4e1e63787f95661a856494042e893e01a29e9ba8790ee32bbc01636c26dd9d128ea8d8a84eec34bed4bf1ac6bdd42d2b6695cb6f83e46450e1db0c0810832600218ece10f6bdfc426c8f09347384284ac5ef5cbf1f0eedbd65cde38d779cd716ed598ff9cd629cc5ad7f8b0040e90987c7d5dfa2ec3db675b4a7ecfa378ab8c456e75c8617ceb9cefbc912f1b18c7d905b28a3a062c6c2082096880096b97a5263c61ad474c010a8e209e22b66adb9b17c2e6fe76b843bc6b6e87e0d75ce7715897bce36087779f1a86bf2bebf122b13534207d18c0f0c55fadfff83d477ef282451f0ec040e314bc622d115ab4e7cf7ffe896d96410d9a8c3dd8310b1c8460011980c118acab093e340212dd9a3b5829a108852080f5f677c1277c06a81e39a77378907c78a01e82106f5b454250834257537460d202bac678e4f50b7f5552c69070920782e1853e4e40632b9002cb9620e8c7822d282990c618fdf521f7407636700117a0025ea0515b130997b00897204311168002b87b35c78008688049187c09c884ea810711b8651318495693359360094370024e100ae4c385bf1058820582928770c5206854f40284e63e6e9171fe2ec8869ef716ed352a49f63eed900b3bd0000720022f900463a05135f4349630492ee44962155c02680884100747a88439c71475600775a01e731007922889396780b3355b8be03b51f37c86e0099600574bf009d437522af60b83058221187924953e3486037d100be8b0826d488b6c6817a1021709a20eb0500317100231e00230d00463d008531350943049b9c50889306637078189987c4ad8888f580773907390c888c8978076c06078e73b24640956a3508f800640b0049e600c2e065e90a78a7c960cbdf044c1946c38100b82a345a20259b5a88f13d745028320f6a00e6620020770013170034990045f40069a300940c85b8ca056cc175c7ac7fe734e9884d66880d6c814c14789da68800ce8800bb6080c2656fb74093604264300049a300c903752e9d867c9306cbde08ea38003eed407c830398d023ffbe89314577ef9905af7300b76888337d005497004c348062bd449b4f63bb605733cb72edb78914cc114710089d53889c8d70692a87339b7607860080cc65500a5355fe20440c00720d8572d090c20380ca9988aefc867bd609356f48ab2b83f3fe99740b95f09d20eb160030810022a70035e809049404f4491425da56185105cf6b67b3657731a598d72508d75500772a0999c29075869071889914978074f785b58f5982a94965380027a00822f195e62386c76394538808261100be9d071fdfeb0456bf897c1095fa39720adf50a29e03ac198948c491244912d8f096644488477208d8ff8999e899d72b01e9d29071ca99194389a1f697309f6739ea44217280640e004bcf0675017820ad767bd900cc9404515500129684c1b027ac2c99feee55ffd700fc760061060983600033ec3048c290664e008d9923564d5658e209d0248087760a1744007a0899d73c0066c909d72e0a1a189955939a21bd97bca9766305443d9927f4680027cc09ebe9070c2108661189f64d80719c0008a950b6bf1285b647efd29a460342afcf53ef7700ee7c5002160033e83904d00a564c009530309b1165c4338a1854007177a0718aaa173f2a173909d583989a4897cfe4a2880b3069195d0a093c0097cd0021c0006314aa334fa9e33296838609f56e4076ab16391914c432aa80ee3533095538fd11808a20e38903319e0025e90944dc0988d597b42a761e4a96e02489dc1d7a59cc9991cfa06d5d81e4e819d74809d8eb89991f8884a78087160088570619a5409697972d3350a2b868a22680c32e98ebdd007a9070337f9023d9a206f182118d77583aaac88b16839850f94d318f6900e3b809c84d6058a99a051aa0786903caa7666a7769a5d6a07749084a059076da0061daa36a32a075b200774b006efda9d73e0a95ae9a981d0773797088ec0551e16097c0006fd0203be74ab73a9abb5f90930a00126502c0a1b06c9d0fe1610f2827ad19714b3ac179b18cd7aa8be2917e890520c200207ea055f30a94131084d136bb7775bb625807860a1c1c799ab9aa19db906e8ba366a93055ba0b3eefa149ef988f4eaa9ab8a7396d93bfcaa619d544364d002ff0103e3b357347ab0f1a9a716a0767f300626f02f07a25e41968f168bb15f2b2142058770a10e7d10020c60165ee0054c40b25ff0050bdaa0916008eea67b15da7b9eca99193ab39ce92e37ab3658900559a0053c4baa9ea991e56a8984e0803b5766470b5693a0072700204d6b67bf60b0f02993a3e004e1660262907f7fd0041430ac6df19ba057b15e0bb6a90b181a9b309153b629800084160649c9b641b1a0e5467730fea7880cb8a976f099abda999f0aaf59a006f251046a10b858c0aedde988d4287c75d0773b2799460b809070097c90430b0003bc666724958e325a0ca38006f669014bb0079ac03563e002181006c8b016a9b59f5d2b59aa4bbf82517e873a0fb0809c4caab65dd0046eab905dd2a0cc88652e1b9e8a98849a49aed4a89973e0145960bc56f1045120156a50b80abcb706d8bc89280869eab88a507453105d2af007f0e85da5500aeb28be7275024c3005e536099bd00863c00219907940aa3fa75bbf3bccacedd70febc08b0dc0a489e905413106c6e29c6d2666ace6b27380074edc7b19e9bc7590a1befbae0f5c04ca210442741ff45127cacb05d949c5fe41ab841cdc4847db42d0b707224665be0445288cc251870671da023ea407c233099de0089bf00515f002c5d4979bc7c3836c647d213991930fb3500386f94e23eb040a4906026c6108066f5a36964fac84e44aaea88aa1be4bc50e9c05591c2544a0c54a601551b1b3575cc5317ba64bc8b8f71480c6358e4e6001150006b7b0620307c7c1e0095858c7db6a08bc850879cc094a5b012ca586fe43c8cbbc537ff13e0ba245b950030a10024899906280c45dd3668e7065add67b16dac4a209b3c1a799e58cb77370075b90055cf004ccf1034a40345b7c0582bbb3a68aa19ec99561197c8220088db4559db4084527062d3001db2b7028260ca5a0094350fe0240400568900673bb61c8a8c767b00737930b3b29b111725fccccc31647466ca10b36b03306592cc6621e4c53a53357085c6aa1256ac5be0bb3c1fb99d578079efa043dd0011fc00361c10351f2044590b33afbaef7dc991dd906471807699a60c9b5083da8074ea07a7bb05728e66b96300540d00343400569900658965cc8e8089df0a62d70cc07424640353f1ecdd6881a98fb800e667000077090c512c9f744433544739cbaa57750a2a149ce326daec14bc55c7006e841054a60342cd1123c1004413dd43c6baa9ec9061d399ad6587cfd9c088530563d484ad1b5027e00452866094b90133f400451e0063b8708612dd6d602061af002bd506913fe1ba46d3da8fa856881d90eb0100207a00261c0879ad094cf993c8d9008c0b7a9184a075829076dc0065fd99d816daae6cadc8570065cc0056400085c320648c01f1df00371a30591ed99935d8d6d90735f89d985d0c18730d1c295357cc00413500124c670a058021dd00344800659c0067170077910d69de4085fc3073060012c559cfba9d6b80db61677596c216036700023f005d5852d05a508087688caadc979cb95d1ed06094cce845dd3eefd0669300897806286b0b916d0035540c1a83cb8f22aa25f59a64cd106998d6e9864355f72b50b60014ea00952240625b0013db0c582cb0675709a94405b9480093fc8079c30061670033a395f5d74dbfe10ce9f20fd9b02935217e00519b50993d0089704809440a1c0f79d7bcb993ddee3812dd39edcc0c11b08fc6c0897400aa4104596207de23104a92d15448de3d04d894ce18063f6aaac965c54d8a20062027bf0099f60042e1104a40cb85be088b435e550e3098f907f28a002b1600f93d3ba60bec3eb975afbb00b36d00030f0079aa0099ce00881f055b545848420088b38077bab733d4eaf623add0c3ca2750007811009a2f0e756ed072d3057a85d045111b85910af93ed999188cedcd8cfca776a2db408fca709346c0113600260b0072cc0013e701c4410159e799a22498197b0354d60027db00e14beea20cdea831a1974d164af40609be00944d1fe096c4ee0d2097c4a88aa9c497ca579d94c31af3ab7ec91000aa4600a7f6e09813ebe735505d58ecad81eaf86cbed2f8b9af05d093f2774c283be7b7002f669022e9a34c751045b80059a39ef5ab608981007d3f2089e30061e80033a596997b57e87f1e5ffae75f91317fb800c37b07ae80bc39f545bb5c5b2de79b81c79d93a479a4cb1a55bfadcea914a809057c1600aa5f0e7bf76e97aa0e43f10f25211b86a00a2950db431bba937d76aa7c655c4232d510309680057e7ee01e6a804f08e053a8b7c77706a0d660978ace62df002cb664c4af62140854c08a368ec3746a8fb1882ccf4ef453844d520f7100b29a00263506ec26361b7776a0bf6b2a3fe3989e199913b2efb65cadcf7dce36eb0ad79550ac1500a69ffec97ae09e0fd03507005721fb86bd0a1771fc5a6b96ec1f53be17849557e255320ed1680025b81f85bb006c8e773a7960957536e8fe0042b80cc02935968f4203a7c38b7b8f4a1ff6c87ca0e66a001b4fe25ddaa0805ecb2d459af1b091071ec0c8c33c78ec13906ed144c38870e1d356de2a44963e8d2a75fc28299e2588ad4284ba33e49e9d0834a912258b064c9b2860d1b3973eacc1c58d3cea14287742a4ac4c892a54a96180535f448131a1f1b3a00a9f2e4494b3602f1e8448448512646911e459a24c6040e64f7f68de537761fbf7efdf4a5ddc7b6ed3e7dfce4ca4dcb4fdfdab4fe6af3b2edd776ef5fc081050f265cd8f061c489152f66dcd8715eb47525e3d3a7cb4606267fb64682c433e71dd077eccc143847a04d8509179a6ee83061543768065d0a652a18b05fa53a7e0ce969c9861e5150aa649945cdcb3aa3678ab6498890ce448a1431f2596951a645868a36a2028443872051a26499e346e0a19b551155523489eb253e2b5ec04ac6aeddbdfb66fbda332bd62c5c7dfcea47ae00031cd0aebbf87a6c41061b74f04108234c8caeb9e8ca2796142af8e20ff72249241144702ac48e3b101acdb43a581b08a1826c2aa88dd6248acd12524c11a614dc4ad1f1a34f7ad4a3070e7e78e28a2b5262498de3d89069263a6a52e8269d0efef9903a4924b18412462481c410471c99e28792aa40c3bc38ce9bea90aa185944924924b9440f182a78a10f33faf803965890c9ef1effda61474fffccaaf02eb3f249f02ebcfa125042461b75f45148178b4c32b4ea7925030ff6e064b3451409b1903b086952b484e2984935274f9ba38d15138ac9b438dc70c312516afc8517606ef488948f4072a2830e8818f20a2ca258092a36665256b9e406724e1034a3eb89914c42aca412470471041028c034699034ccd3098ff4d4ab844d49f86062810a5a604105153018e1863e7a6167ac767289c58c30fac8a59dffee0970ac40f34234528413567861092373982e7470c0ec0f4e208964910f0f21d78e11fe5b9589a183561439b584da50b2cc36dc30a45653862905575d3f22a5c73d8228e9099488240ec997966c56b99ae2702e0e293f944e12450e5184124508a9839040a0e8a18425c4d0c39032354693124aaaba16924c1af14a0530c60003860f309060041cfea82f161862102185146c78259940f14be7185a7239869d7bfacaa7afbf1665f870c41357b842b2d8c25083313679e491ec421c97c4831a62a8b4544d5ccdd555cba48846974bf9c5175e7cd171d74f3cd9a3870d842ca2c82257e2594965455bd6d932ed20a41044a2f33a134a80ef3a914200a9a2040e96786490439c7b4ebdaeb12a249349f63001053034d9648c31ba70a10b1532e8f706fe0d6208e38f3044b0019676eebb879d5876b00107fccdd005e0c00c57fc7f0006704174d9473ed062977b98810130889c7b165195e8312b39a58251e640b6b9d4644e2232aa88274a51ba51f0421823d415482c81861ef4400838a39ded90240739286b26c992e169a457884280483a88e05a0fbb868840a4c1092538011a1e2108e821c2779e420423b876ad49f0a1052500432336a189339c21727b5041052a900118fc61137fe8c30d52309ffbe4a20f29c840ddda170333d0221f70d9cba40478473ce671307451945ed6818305c040539758c422a2841e1922a435212b0dac9eb422364824566e10048d4a51425ff842573a1a85272c314415e26c76fec43a921ae4d00619a6b20ea7119ad070f8caaaf8906956718421f4008413a0000d8630e4f4d0441d6056422b464081141ac1892e6de20c638c930604f9873178c10b2a98c00252108b5b00b2013880c59dfe8003bb016c2c06d36339cd99c7b9f47170b3488108baa7094814f24c8418cd4352b5b9d5104435a8c283c950363a51ac6e1497d4e4264b310a52f0e1041d90dd284989245326445974204d99561934df39079688c803d73a6a158b3d620f27b0c012041109430c623a68928e22ae55a54748c1074b70043239d1892c8ae1042660821fc6d0041698005e1558c005e0b500f3fde10fb888c5be52800374f8a78ee7a46a550f97ce71eec31e7dfeb8c00df620395e2e020fe4a2a7a86852aa90a16a9ffa4cab8c6495060f0e4318a3b8d12834b93a8f7c62146838410982f00422a06476a554d21c6898cad198aa4c0231951d02f13be07dd4878cd89225f8e08413f4600a9cf91024a2d3522c9deb117a3002121a3189414ca2a664609e11f6c0872498c0032a60010c5ca08103b0ab05eb1be31f6ed00589850016f418e75e126555e42637427cb4cb5822d68030ec41138f300423c6da86366cec0ecd2a59ef5a353213293265698883254a110c97d1f5a023c4ab283ea109277ca70a551082608f059598c890a2ab54aca95289c340808a2a3e544495b43389464c816a7a70cf200c81b4e950074b9378fe44238200043d4462101a868414385002ab11d3032c68410b6000030d4cc09963502a1fc610af095ce0020cb0c131c42219bd2857c73b1ea0a208168b1a84c00b63e0433cc53ad6b10ee4ac8b6cc8e76c0223d61864bc91f060307e31d0baaa774733e3c3103eac0421d477384772891cfcab4a343b969e75280421449313f5b4549816bbc420800004293c02b583d0927480c9260423a10746743024d26033d38ac1081ff0000a5a00af476ba0055f889c26a4e0010ac04b04310841085e510fb1f091c7a3263562e632cef9ed20042ff0c21eb6224f242b79bb13340d9419fb488560b7c9653204286c63baf58e42d8abe395282ef188f8520dccf5c5c2fe16d6f0ec57a108cd8b5d16d4465456e941763a8998c42522c195484c010948a0c223b6e4d9e940224b55a2f0124ca21deda0b007522083148ec0010b8c185e2a18010598b0873f34420a25d8800792e0051884c1061030433be638a0b41cb7d413a7b85c8a5b8f63d420033768f556c635d608cab0552d5a11e73c96103ac05022340a463056e70b610b9bbd3aead127bfb30421fc20cc45c8c24b5e6232898afc44124cb34d72e80849082211d85b7a24f8b0041f3441cfcf834467fecc9598f6000a45d1ce20aa80842c56a10727f0800784aa024ca3200962e043238cb0810dd8d6052fc0410a42b083753cdc8e14e7bb1e0fe8963ebe053083d3c72bfe1a600218586d2bea51a24d12db4885fcece40f81a11c28bacb1a952e2373a5ab0879913a5fbc970f46f8ce1194306e2540810c8000841ec8f0064228e90e74e0021bee708853a5dcf26bb0a71d0441083c24845cd1338420b804894964294b9c50b411f8a0894698bb2758a28424a8fc88260061098db004eb0701082e84ff094028f808544002115880033ea00220a8200514a858053050c10b6e000108eca01df8d87bdffd8fc7fecbaabdf00b7e189c7530830550012798023db01848500f7a52b2d18821cf71bcef9a03de8b898798084bd291dc3828ba9aab5e280662e0854fd803270002e601960ef88092f0012468822958bd41808381000d7a62fe033b78093ba0bc87a02885100486308838303eed4884aaab922ae104324082a8e383c95137277a2249d89429d03e0673b06c118440088428b099f2d3800ba0000ea8823778032e80bf09c0807db3811460806b9a877b408bb54890ffbbc3c4492788133cc319187dc0077ca8051bb8801600033d680448900446009e368b4066b140486c8d39b0bc18aa8340b0044cb0914b3a9d11ea85cf13865ee8854ff003263001f5e30054fc0e5464c10e280123588229a002217c0941108433840338f02f36e03d3a508dc5f24542a8452472842454424e68042468c1ee313709a33ead7884ee08820c0b844110c62ee48227f0010e28380ba0800f4002400884f0fea3021fa0807c132a36ca803e480750a3433c7cc73c329cc8181cbaa80758080142dc8346688444880445001ee6a889999003c7133a99c89cd6204836a824521821bb4a1d12f2c45ef0033f688113a800733c018d44812318372048a112e8806d0c132a880338603dd6238341a8c6c78a031d74bc38083e83c003a1293e433884ce7004979a040413830e88002388be4850442afc094eb8a520488348e8c2df0b0438980938e8960ff80014608126583d36d80236e08220e00073b4000b88311c38065033a0499138784ccb85d93b0a918c75d88106c8802480c2788284e969b3d158913a8809f06216495c9586a8033830040f1206d4110660e08550f4c4fe137c010ba8000b308113308216a04c249082b623032ad84c272c811ef8c820a082949a02299802d3240332d0836a0c46277312d3c08360ac4543f82c769b8463f4810938013dd81445ac0427fa894878932048ca48e0422929047164337194822668024acba2ac14bf1e10491330810ad000f8698bb8880cff514bef8494030acfba888c3f1c871a600015f0023d2ba444201a1ca2a740d0cb386095e02b08fe1a48ced927d3088448088560404c5e200601f5443f0803c784cc13600234d8833db01a31a0373dd0339d848441a837d30c821f0882714381c9a44c2078452948834108042154113b8091c52a424128849bd44997c216648a2f0e7082cd90fe04ea1b8a6fd383e1a48241d84c2a7003a614472e28844138837d44cd3308843a288e27184e20783415c84eb5880b1ffb4e2b7d9487a9103d1c107b98851068801510034d402945e8254714c8bd7c1299f0996541959a080443e084501886c424064fbc053fd88315a88009300116700206f583c919d446f03ee4510448a8b0436c8426dc460e40011430450a2043485d02950c84c50a19495a08a279964470d12ce1c9d1223d1438ad36b912a0e08a49d0d199aa822508021ff8812ae0514738033ac021461d03e6940228d00236288e288082297082daba85769852eed48f2b5dd64611cf536b0b7eb00758800030d2944838844560049dd0289b982135fe45b3144199f9e45447f004f402865eb0533cddd30558000b6082081dd4417540f7808443e81a6274840a6b043e40826d44812ff00217b88003388009c8372060c06accd45591a4607c169d28043f93844a9884e99a020e3801286c936b010a36f1043d40821240011f7045e699b7331884210d3f313882a92c011fe80125e002f1c882d8d0032730811bc8853adcce2a6556a0759074b2077a34a07ef08f7cb09406480130a0cb4e119136bb36255b25895a9553d14b58b9099a2c934080845000066028066320864f60023ead009e7aade89b9c6f6b5b6ae9a129d492b5d5832540c52618833df0020c5880099880eb343b23d0033d48034c6d11ec2293fef984168db28a7583044ed0843d40010b98826eab924c401adbd484d1533f26001f3040010ae80063ba54726cb424600114d8c61e2082287083271056920a83640090edfc8fa0bd5d06d1433eda874099873e68000d68da49888e23c321d108c853890333abc41409999a909ec522044398045108066328865bf8031830c5041d033f98aeaafb892aa10edfe41a4ce8a174d357b10116d782261538800bc8800cb880bfdd1e29d08370440ff340dc98948ae790582c49444ff084a7b300e7738f4450c47ed4044d100314f0807fcb5b266081493d82312003813b02484d822ff882244001601192cd448329905c2f088b83410b65c55d163e8c49f93bb5c8fe073ee1ddfc60873e080177d233e1d1893b0015e7c01caa4d5e823cc8e6901ed9fc90490885b1fd043068010e3001239882e7d3848aa18e35198a299425b8e5c9556d82f593020685810c38001150810ca1df5384458a2051374899141d0872c103e3998e02cb5cccd2cd47f0b675b3584d6082c8c45b18f08011c0b408b080b924039755bb0eee8224d0e0ef20373440839ca5809d6d9c4959e116cee4c2400b43510b76c88559f89358c8853ff98318308131883e1041841bea18bddc4bfb94a8e6f09d3291dee79092a2f0844f183d538c62289cbaadc8124bc8562c69c61eaa844ca8044ae0494d20031fe88026108331f8020f88800ca8bf1710012ffe3a58c98c6270212f594951a9000de069224650044bb04d4ed803277602480085a1cc844cb80406f6631530032f88310dd8e7be65813148024c33820e3e5d18480223f0000e48d8613d81be7d815bb8b103e9234d9ee8c3588b7d40873e8881a732031bb0813a09831860013140442939843888daa99dc0708521abb509f40815e7f89044d00e2a70d52120a91368023ee0849b7a51450c266002264ab89627a2844444b012ee0029160326e08008d0001588811750010de05b0d30c50e5802d54c035b7c83379ec93b603ca6b18e4720603f3682b2fe36767b0475e180428481031881b3d3000a60016aa600839be62440bb1600680e3002e66401afac00fe11e88373e03fba4814b4a468161e2744590b7be88776788514500003905f053880b814010d10e946f8c7f7949ea94da4822808826c1212c90911419ee0e1c220981a8d742d2a562d973adf0056c4f19584442824e2c9d69f063426f4011f40cd2968020f903f16986adc9a00156082d45d3096f46af368083cb883ea8ea5ea298ae9028384d6034f68932a8904cd6d0143fe82381181325601d9628124d867bbfe822e7097116b81b46b827bb3000dc800387c85760890c4666c00d78bc78e0bb1b00c7c0c8118500111b880a2c2c80f1869d0861aa8196d915ba51471881e8469aa9012e980845a8402576540a3a0e22e196adb46d4444c71cfaa3a8bb1febe48c8924ba0b066beb3199c02233045137801187801eb54b19ef263324c58fc0504af9ecf8620e7589a8e4cd06ec8cd2534b80428bf042b59d5d4658226a680eb942db3630117188118f0822f68824666341660010fb0001420260ad08011c0ad06e8837990613eb2c300d7e40127947658231160353f609fbd2e730bf8000c8e70a189c0548a219636ac47f29d36233e9d843050e0494fb8844de1b34920ea8e620fce60f1aaeb2c4e6ff14b70043ee00331f0816212dc21c2b7134331bf6d01063d814905cb13d06ad62b72e10b0de0d9a14c48044bf084263f8129d0336f0b293d58a829d80326a06bda4268b3f3000d7001301fe8b25bf64047810dfe60730cb8800678f3fbc807a3adc33abfc3fec33188eb0bbb88b8c7762ef289ae5167e0517f3a98d583378083dff39df84c1165a9c4a98da181884f462704996ea9893d1725e4498ab551aeb10a8ce9941fb28a993684e843be474803d2f40162fa30d742c12500020aa8ceb09c80167082517782201802235081c76c01ab51593840393ac0833ca80a45700428fa6e5f37820e70024ef8ee4b907834c85829d603faf60092ea780a76262fe8820e1efa11f3004623437911810680c358b807409c4370c78bb518f71c0bf7aaeacebc8056733f8bb8301444b9875ca0bfa61dd44dd10a770b022227d15a543289920398e0f781a409097faca8157875ebcdfe973af8171d7ce990e9586a229d482909a50277cb25926501f53b01409d0228803a7c533f2340033e30044bd0032ac05916e0530d38023120833368f987c88398c7a199bf964af86e9e5e820e703e4fe084498084631b38dd1cf52678e66d34b8f656018eeb82a467810dc00016380233c734368c81bd0d813e001c3ec107b838cbbf586cafa7aa73078cb2600b44b10bbbf076433114fcc005b41b837dd5b37a8582218082951446213c91bd1c48e69dff9f79d89c90d8081bdfa1186a65f64d8060548911234a9514213c74a85021440e11c5316448cfa347537c702871a2c9183e7b9c9cb070628a1e2a54a6003162c409c54769241a7a04c6c4849a1cfe8c880104674e1e3a74f2302ce4a812d14aa02671f2240605103d9a264d7ae4898f930e41f4346aa467ca92944cc024c1e0c20b592f494860f070e488870f2c3c5018212241861dc7eee1bd878f5f3f7d7dfbf5f50b7830e1c2860f234eac7831e3c68e1f438e2c79df60befdf8eddba78f9f3e7dfbf2810e6dcf9ebe7bed608d30b127ab23489322418284060a1a41b60909b263674e1d39757afbfefd7b4e703bbf09212f74281142829424417f5e49125182d611224ca4b010d03c79f0c41964a8111f3140368814a369d3a74d9ba69c2801240d2093582b661d9446fcc4161416684001051f48d1481c6de041071e7830a488238e18d4c95149f10144fe09534835896b8f1851c212580d0208207a904806182c50c042175f7cd1050b1660e003092478c042121f6070c1052198814c3b79e1734f67430ef99764472299a4924b32d964604472c68f68a0e123da3decc042020b6434324822b0c1a49f2086c411077865ee06dc6f72c8a15b9abed9819c9c0c21d21c23d14962909e05358748218a24824822b8d971472177dc81db885a19d101074cecf1071f638031c61f9aa034c44b6f50018821af35e2886d8114d20815284470810a7051704423807051e81d882824282406559249529e705882138f70724924973c622114e20912c71b800ca2551328a4d84517676120010637a6f5c5182c5450010e7d2093fe573df78c9b8f67447a869993ebb2dbaebb4e0a162f3f9ca5db5968f7d6534f3ef6e0c5ce2d1e7820c6208228224922302d22514407ba39471c75f0069c1d6dd2b1661dbad511489c841412a89dd659470925d83d145421b811a2dba1840412481a7a5065820746f0a1c91e677990444715799a882070c43166228988ca0517424d812a062a9030010546e831081c6e227a88a08ae0da8927937ca2c9121e02cb49457bc88786218bb809071564e8f12c0530240183071b4430200b1b6cc0c2185f9850411fbbb0d38ee0e4e65b8f3da0a1bb19667c65f6aee38f43bea46046fac5d9659d49199a3ef78e968fbe868fc62f3bb178c081148004a2d072070bfeb248446db451661b73ccc1066f6d62bc9b716cfc665cef725aed1076c32354a7430d712c671c8498292b7223f2a1470b16e8fdc7182d60a081072ab480e1d6922842c84308415288d1470f32c507a98ee081d3479031c81929db51081e842cc788224449c2ab279f38c1578fd0c425a2d2841240cd108828141eec6034402ce1031648c2590444811a9180022460510b34008358fca81df51061e1c675b8cddd0b738aeb4ce45ae8c2170e6672833157e286c4b9cd756e5f9e2be168ae148b002d810a6f8803d014e1ba32b94176078ac31cd2c43b36e90677c481981d78f730dd20a756c27b489d1451b293c9e96241635ea1eac0b265e901244ff38817fe2c30011878a10526a0d92520019d4450c26a8a60849f1a72b433a86f021710418038d0043e84481073b8031e6ab547fe49021496f0842702f82b4d7062127c58020796209143b4e10eb473832006c1490eb0a00573c38096d832c13174c10226f043e0d6318f7bcc631e3ccc610e698839cbc13098c25492650c23c37dcc0b73f7ba4768c815a4d114ce1e25cc97e06e61020a04010a6c70031bec80083c90e94cb06322ed70973b731a678ac139ce9c54c7c577d24a21f89b2772cad4c03b18270e6ed0c31e8040010b18610c63709f0ae0980413a0600a9ec8c49f2a1187432cc236cc618816ce50083240eb022370e307c440229dc449758778242332fe31a1ff39810353d08425a4a2871324b4118600e51cd6a0063770aa0a28c8db118cd04a17e088055f0883062a10865eb42397f348aa2e7599afd01dee702984925f6438ccab62953056ed0b3037a3427bdd2b1f7ab1073e8234cd12d223adb9145c2e6040012054810b59e8e621ceb420f0cc8e76b49b589b9ae8263bd02162c2e95da1527632771eaf21dbb9c321b0f8d732e54656752813894e50011338610f4de080050a0ab7169c60098e9084201221090522a2658230df195a5b88331881021108d0d3d8a6879fc521a40a490441147189936ac2091670822634f1884b60140862e85238ab88d334a084036e59cb113e00b0119065041770412c92d1fe0e5b2a55a9d10c9de1c26a2e5f56d54880d96a56dbeb2ecbc44babfd4026bd6c685ed07ceeac854b2b3dc22bb8647881023ea8c213a2c086361cc24c65b22739e53087c0467162baa143eed444c58dd9e110f81329ad0a91610d37f6afba59706e013b62430c020d27a0400b2a85020ba072052f80410b5080844148c2118958c4c0a850052428a10a5410ca1902d108307ca0021388c0079aa00740d0a7c4eedc23412451c0a468c208c3e5032792228613b4603532454314ca0c052ae8810c4df0c106388002147080024b5b910b1620823f048e1debb02578c39b56c315eebe7a2992e5d8ebde43b72bbdebad6a0d511856a8eef0acfd9d077fc3bb0efec1b1230c14e8c012aa100537c40e0fb13bd099d2e960094758c483edcdc5748328dd3410d68d0db18847cc4412bb5a41fa8c5e0900ea8435a3c704337e010b50a08441c406127a5842102cd4810ff0000967704420ce300835abc0021140c17245942cddb893b703b1f2243c21b60e39a16662830fcd1e218625f8a00425e8c10fb24906ae380a6f1bf8c011be0006150cd20cb9a8e59efbece73f4f13d29a2b1232158de8873b09be81090cbd3e735fb3ea45bff9d2a55a27add482e7d90c13e82481b570b4571b076316134ec578631c0a43d837326fb59b626d07f020c7b17f75f960d950a63af8c427fa34041a4af0342730bb03b26cc10d60700213fe48fb41a63c01074e6084b5f8c00748885f23c8e01126b86f3e83184420bedd48d52d2212996084252e71894f78620f4638011a06f8884638c104900243482c98911e20410a53a8c21290e0831e18a10960f802c033108681b3e31ce94847c1f71c5ea5f217e185ab5268e8b53888837e4994190c65f8525f47df775f7ac1877ee9b1f15c7a3c977c7ec79ed5c10e76fc41031b4042c9b550089f941162acfe4dc5063b31c25eccc2b57e2c9a6a2d1cdf4dd6e74424fed1ec10b4a253e0044ee04a0fd0d3021a9be004057a10198cc0011324415b5fa86e07aa306d3290e12330fe906d9225e5b3f3561225bd04256d768213ec8154880d1aa08009988005fefc138c094846d818144cc1030a9e188c4112b88f0884c12c04cee469a03a541e78f119ec695ebe540933dd8b6678d566845e0a46c6e8c197098255ea8d06eb11ce34c1dec7c9de3ce859eda9c30eb24332e0825bd9d8133c8116981ca20cc7aa15df9a4411cdf195ca2d9f883d0cfdb809cd0dc7c3280bef984f4f2c8f7ef49a879041150441afc992011a01193c482320c19b31c11778c18a78c10770800f508156f0d3f494001404c21bd846893512fe9c8d756482254cd223a8d80aec812674cd2448cf041c400508151324810ac4d90674808750811438e01434c15b4c800a081c32b083066e200776e03ac4c3c1b95ee138532f45895f8c9e0ac262fe6214d365509c0d650ee7ec0b34695c2ed5c3c7f15929aa433aeca03aa0033a24c3178c1c900da1166c0117540cef4cd6602561c53c21abc1c9133690cdc5c914fed5cab1011c005dd02d8f1b0cc210c81b0a60221404419c51c006889f193ac2527040fa85815978c1171801251edb20a4917f00c11b1cc22024911b34d6436dd82258c72208e227ec818ab5407169021f94c78b71408bfdc11fecc117b8000252809b2d81142cc1121801b450800af4c12ddc1e3a1c83e489e2309262c15d9e78259c54a5502cda246364067da1d0664c09e8ec622fc6e42f561e07aac33b4c9e510a233adcde1f60c0d31c811210e116f8c41d1c985e71131b40e3aa3dfe1ff1b5da54ee466051d8f21156ee608c60fd1cf0e986200402204041af9d80184041143c4115fc4007fc405c5181447092deb1210b9040fa55d706f8806d494146500117c0c11e929a21341021509942b6d4237c821f804498594f131841bcb158cd44ca1f80810b60c0924d40f6000c054c8006b84018c40232b0263214e339ac244b4e5e30eea03056de3c181ca5a562798515bd4cdc4dda64bc7446c3dd22be449534e9574cde6007baa4284ede3914e3ede1c20dc4c5535a0133d2811cac01edc08ec3f89c600dd6c3241ff0f9845e8912eda0a5aa65ccf2099683d90ed03551997c0a1aba63135041993d81120881103c4116648120e8011058000afef81b0c1ce05f26018aa0c018ecc1b265841bc0c11b2451b2c0ced92cc2d00c8d242cc2255842d7ec010c5c16dcb0000b1cc1bbfd9f18fcc126fc81466a40041cc00118c00124c005604008bc401fc0c26a1ec33198c339f8283af86890b6e43096a2c1651ea049d354c5d09202670a560e676846ea015aeb31950d0ae53a10e5308ae239b8c38fa2836b22c31f8c00063c65115c2717acc11ae4c1760a5620249f566e65eff8c65e4d61efd0699c9265c4d04e1cf89c703411cbc4841ea0407c1058996941141021179012159440452e5e245ed01124c1116c40ce8c8118600410b4cc1ba481ecb4411aa441ec08c221901b243c424ba1811c598005000cfe0b80c11e448f13a4c418a8280cb4680230a20218c0ae5ec00bfc416b22c38e96436c06a9903a2791de26e6e9662ade170ba957933aa9577106e2481554495ae6c59eec156996eea0514a5eb116a33928252e84810810c81308c17506ddbaae5ac474a3f0a59c84b55a13191f9dd6e9110a0739f95c9fa6d3f2e8e17898877c54c1b29c0f111d82217c0d07c0008b30010ba485a452a0609647a32201ea04424480da4b18421a1082217c4924440527480f07549d4a74080ac06a71ed812ae94d18c0c00508520634c08bee6a03d8002cb0262dece8ce9ec3b016ebcfa6034b222b4c1e5c34e9cbc2b19057412bc45115ea49950c4e53a565abe51569c109fea32802e9cffea86b26432cdc80050041101081104ae51678474f18cd1970411eb0895e3d187aee86bd6aa5c648619cc4a915c6811cccce381191cfb909110982a9de5d1af50014c4812518c2a85a4dc20cc1f9ad618b1c0106c4c85adc0d0b4c4a0774801450011cb44c1e0a421bb8ced95842244cc40035c212b419104c412344e4dcb580135ce41ed04405a8800a8cc004cc68085c400324800228000334000eccc22e106ff18ec3f18e4339f8a8f216ebb1be64b2eae634798ee6cc0b5fa0e0d26695f52e9a3285d54f525a501629e589af733aa7d696834aea0232e4421fa8c006f4c01010d8106e0143982d1dccefefb5addbbaadf5390cf43d9f63fea58cc6d8819be62b9f62a5edcc8ecf014d89dd1a218c5d45f0c11494cd204482c10c4d2494a39b31c18aac1f8e206812ec5b79549d14904184bec1097f2e1aa0011140411a3482206a827954628120c500f1818a9dc0ab3281069c66685e40021c4003fc700334000328800008400ac4c231142ff1226ff29603f336afe4a1832896620df697f422ad66cc17f6221a94880634216709355550e266078eef3a90af064267d64671cfc2a6392043fae68219984009d898122881fc6ec116ac011dc00e17b08983e9affefe5c6e89e76f083016f54e0143cc01b7c18145321195895fd94122288b782c1b10fcdf87444224ec982158821e0c8109b0c03deecdfe11a0c5077bc0828a819b4981da72c11b446814a0c10ff4402e0f014958c21e84c46082022838c2246405223ac1653181ad2e8d08e8c88bcae8012c4011338000040004bc02f1d282f11e6fcf968339f4a8d6ca6630aaf115f3a2f4d2a4b940a9a179310cd5d7a381c61893b1729e71f8aaf11a836bd6c2b1f2ee0274eac28ec6020ec0451e432533fab11a18b4fdb2499ab2e91ce0815ecdce21c369be4e96ff4e960163655e398cecc4ed1c24982148821e7488f639011af0c1dd51b028232c4c6df01794c18dcc88a476415b504a0700c1129081d14c0d150c412ef70010707268c92a989101277402510c0527ec811fa0410568c008a8800888400c88fe40068400ef2640032000f03200044c3303e0402cec423968f3f176b337c3b1b1922f9676600d3ad553e910e2a8d03a6395099a20e78cb15abddee5d133e5d573f93ee7cf22c33998c3b04671f28e433f23362c7441b5f0807512a11660811a14411118341aa8c11ab4419a065d21477444bb9ac510c71c44b21c1cd8015f251b9c9a1e0a02bc21811848a4713d8286180224bc0c2779c01adee35958d711484b2b5fea0794c0e948281780612e13011ae8011a380168fddf484f4251ef8f512b370a14958eec480860b7088440ef3640083000028037031440125f73f1d642f242033478f360bf71f392eff35a1ee69d552f319a5c5f15174fab79edd7a4fe01a52f56edf8ae71d06aed8e0a761447f12e8cc32e1c832ee8422d30782c940109800008f08014e8b1124836116878991934ec64769ad6543955b470ac536793b8cc913656aa811ca8c101b381419f1a6ea8e31288c11e7cc4af398527a09820500507e40c8b7cc18d588b8d50e007cc74e652c136a1ebfb4201389147432e41731b8227940f221c84230cc27217d5022c808c5a75025c3504807703a480778337020c0004ecc0f0ee8283434339a4f79b77b38103ad6cce265f532d08cee4c259ce2cda770bcd4b60e0220d96b1a501e39e01f8960a3838af64141fc38137712db8792ed84219b80008ec5b632bc1100c012eff405caab0652b34881307fe9b00871c08b2206ba50315df200f326a1f709a1af4acafb8681f021a58c8147c9d06c812d498b4444c01672501078745dd20e8808881143c5b5cb9411614c17e46c12290231f1882ca566600ce762558b9239001101c2006c8ec5583b902807902804002084002d8000ed8807817400130400dbc0213ef822ec4b9bdeb029d2faf7bb7249ee7e66eba35d272d59fb3b37dbd333cd743b6cef3501265a2fff5a283336c3e3a138b35f14afac5333883e382629380048000b401c11004410f94c01094591410c1658fba42b3c9160cb24fb87a76169f4f009dabcb81cbafbc4d29b4ca8f5314e432ccb480926940b1418d7888878a514f8b04395af09b17c4fe96912b7bfbf9e7c953762693071ff8c11ff8410bb440ddd911438d0c158444b764808e94bb012040029cb9efdaec2bd840082080000c400a94b78233039cc3b939c8b9814b315a6be038132decf110f55695ba10bc0ba58b94e885e7cca0ebf5579586efe4f5351b0b38c4ef7b3e1f43f2e6fb613383c54b3a2d6433e8d3422ec482192481690ec811185e0734605c6a4116f4b11fe77c9a26349bd0c11a0c32eefbc4d1e4c1fc9a6dd9caba4d45f61a4436adab4115009e8dbb0f6a52203a4ac4d8e90112f87812e4360b14141378c1350da6b2f38010a0c164fbe7f99c011948414fb100dcc80c18f08a851eec14f48080548004ecee97238001248001fe90bb0018400de4681fa40003004400087d68edaa55f0d8ae720b158e1b576ed7b963e728564c7711e33a8d1ae7759c476f5e3d91f94892d477525f3f952b59b674f912664c993369d6b4c9921f4a7d2445de13293224c8751d376e4cb7ee22528c18cfa5abf8b4dcb985538f4d65564bd731acb5b8722d480becb15cb7608581e10183870f1e366ce810044a942859e86ed98265cb1abd7bf7ca5993776f5ebb76b90c1ecc45cd1a2c7a13ab518305b2e328437a18e133c6c305113060a0f080440fa4347a1a4df19ce4cb97242a54246192c4c2862364aa74e841240a64ba57b89c8912640305e113265c98c062cf2343860ec511440588070e140e5447fe90007b0204db11340891c24cac63b360ed4881e3d52eb0bbd8ef1a97b0dcc389e7c63d6dba1469fea21ee9fd1c59529f9c02bc89c0020d3c10419674e2099f7c7e6a27248fe629aaa8a32c64eaa2a6ec836aaaf81eca0a9a6344ecca2b5a66596f17b172c9051633ba2001460c28702b88276ccc4237c814cbc22e1e0d034caf1f851cecb1c722c3e28a22d540038d214a00620c313c984004154660c1041fa8186410401ad1e3880f4c48c28b24586081331328f0a0093290b08d8822aec0220b39b5e0228a1f3688604d0c309820020c5898420f43dc70230d34a43082050f2a30e080061230c000eeb46ba00633665951c45d5e796516f50a6acfbdf7fea692ca3ea7963a8ac2a13aeaef2707ef29299f7d72ea27a50475dd95d79b52d26927ff7e9290a356335a95a90da5ea90d9aae24b4817120f1a759759acdd65c55c7089c58c326e70c103e14a40a28a2a9eb8624ec8d4bd0baf1ff16a77302db4b04bde79ed52175f2c1e43575f3488e8010531a43c400411ae4401052af410249041f490c23318ba48a2851628e6800323c420e3880e7e18a28890437ea25e3d67b4c0cf04309060020f9c5098492aa698c24c0d4448c18610b0dbce8004144020043372c9ea44f642ad96965a4875e8d488525d553f8e26f448585a6be5671f5c73ed95ebaebb3e899f92f011562490266cd5286455cdd0bea81e629669fe85ba32a82bb0ecbefb441369d145975c6c8105963ec260c1828c9730f7092bf84592717cef65775d2cec7d375fc7f2850c5dc97a28418a29a60c5405123860818c330229e40d40a84082030b54808162144a28012e32a4f8a1031e9450420821e4b4538b277a082e820824b8007940336ea209279c608209162a5801873e6279a58c9c11604001010a003a3cb0742195abf694569a5965ef439642fe60adc71e7b4cca27a75bbdbe1fff04052cc927077fa2c76c44a1505294b22a8a38a56da8ead0dbde330e6694435a75030b33ee8637b06c6a45b830830b2a4001141c410a889353ba3097a37ce108325a40d70a21033912aa8b5f455043119ad40120fe2cc1081498405a62a3a5339c810b6e880317aae0030b1c91036ee9015ca0d0c4307d0009bc13429cae10b2e021c1071fa040f10e9000e31c200215f0c099d454010dac200cb0c0e0f55e611e0820a07b08c8c12b0aa234f518641ce52355875095aaf51170231202e0fbe0273f9208881ff953e4226972927e848d243e19dbff8885b6022ee53eca9a08b33a5495f76c455a1514e5de4c64adbdf5ad6f7d88c104d6648423208e084f10d9081757c51556510b56c8a51548862e2de80b0b45c8d72d45a68628f4608948209e70a0c8052ecceb4e7020e2ec3ad08112f4600950a00215a40084e97c800541e8dd38c7a9042934e1081e9040cfb083bce24dfea00223708109d0d8876cf18d6f262a8f0d52f0c61ad03169d4e28a5694e61085f071436a6b95fbfc634893a004578c94e84415b40fb14db26c00aca4b1d4a62a654585229c84c8421c0841120594161404cb324669a25c58eb44b9e8c30d32c0270f7c10095154822c8b60239ffe14a8e5fa29148460a3281001a95198e52c6768cc21fca0073fe0415bdcf2832a3cf32e749157148420ce2154a189509882189ab0270ac8e8033fd8dd389fb03b291c81052328d80c4040a9e31dc00018b8411ffe108b1521e3a59beadb296971bd1d542f1601bd63d29891c7f878888f5199c8daf0b350fe082b7e00c2da3e1cb9358a7ed66bf52b89fcc82621010e50fe6d1a525f453639958728843d04e5ca38527a37958e52177633a558608183145480386b22810f8c50ae7229a10ac835ae72ab20852520817952c829128240ae2682b58944888b5c6489d42a44e1094180ea0fa01ad5ef6a01852b0cde15ba1b05b14ea1094c5001064670831b6860031ff8000a7c1004e4e6349df42d032c5881039d254002930a411970b12268ac4817b3c0a78972cbb76a592b5a24cae338a22552c93ea5a3ed73d5ab1a9ad99208286ba055f1fdb0f648ab092b421b35d6250fc8b6d54685930d31e94154dad8095690a579e31b344ca9cfc0ddf7021138002b39b05ffefae008403801353bf0810e3459bf6bf180743870d316a0e004fe28680110803084200c01cd67366eb996502329ee5485b74457c8e6fc8428540187d2bb400cfa808bc075a1511bc072963d20cff0acc81665a80108b273001be402b0439b05347441e90a47389fb5a80a28b942d2c79e2aa416a16c462c2b4891c44f7e0ecd4780f6c1d915bfba5758dbdf6861ec9140564829974cd66a438d63663db01657a16d6d6d6bb7db5e306f30054b2d72118b3ef836030d58c002e079560b68c002159876048803a86e7fbbdb1a308106b07dc4c271a00418dbc093a84b2ee33ec15cb09c73158b102791c19b5126c8400652604f64f48d5b61f0020cb0742517c0208d431b9a2e6c61861c1c18018f36c72c0ec2d2bd9d345a76fedb456ecfb7476699c31ccaea282047cc5054e743d5874c642261dd7204f1036b3b413949ec01e37ac8d828baee28af97e5eb0566dcc7b470480599614aace4f3c7ba2d652cf699820c542003c84bf2b417c0800b60a04a374b410a6260831b78ddbe38c0411870708317ac6005e43681093c6081197de00446986e158480dcb5ee5464b1dc9d8d8810042098000317380f2cf826d86ccde20f6608431fccd057852bbcf0fb0c410d763069c62e5b6f582165d264fbc9d88a14e409fd23ab4add917a00b09026a6558012996297bffe26adcf09cdfd57ebd39e4d2316d2392611b821907a98a4b5a02d6d25486c62e7623dd7aa60dec0128beb99010787c5fe810d6af08214d4a006d1efc3f601d77de77f1ffcce0fdcf6c91f8624c080ed6364810fa84be623e474774a20c29a731a842c5a40f03600d5dd203c58bb65ebe2c447c2f26916982e16288e192828d8522a82b8220113101a20e8815284694c6521fc28c44a0f24502ff56805915accb3604f0465a2d5648ee66a4e58020842700fb55865e776eda33889c31ca2b1bc22d87aac82a6a520984f6f36851644a4940a10a65ee10061ea448a2c69f0495498ed0711e2c268215b98ee0fc2a00b5c40056eea03ba4c2d58c00880c008ba90b8ce44cb3c200610eb4486ad20f8a6445a6ad9f0292b722bf3d03001498419a0011a6a011aeaf081162244e2232240fe4de4d887f4f6c37d06e9d4546fd54ec256fac1f546d01161026cacc67f50f0e602c8d606483f46cec66250a4c6813d1cc20169ebd81270944245e9ee46f3a80545d8631545a5a5348d5458d16e444417228d45124fe0ca04065c200646a0d0c688040a6d0486d10570c00cf66ff8866d0dd7639478ec94dcf0183c31d8d4c30183ed0ee7300f1310f8fa68b5d8276a08b1101baa4100a4b3602ea21e111d5982b360ce56f4615626f17f006805712ef734421dd6411d2e221f772e06cd016e1c0220699014292801176b540e523d908e07998f21f5469474900d17f2824e0919220d176ec1cf18afec5e00066ea023c3ce0cd4686fca41a5745069508a5afed843011d90a5e0b02bb4821419eb06f3b01c22702a6c52a4d427c474af7d4c8b90fc63f57422a21a311dd331e680e504e1c73f2c911e29441d9ef229474e437acf3e22221a3f8d2aaea201a525c38acfd86e30d84a841aeb08f3b472198d6f827450a5f8a6226bf1aff2e96f5ea1fbfe00700eb0d2dc3069482421e646f81acb81e610308f81192a6db61e90194ac513816f21364981baf18fa0b2f4c2f1274ece6a628ee5cef1918a52335522405002e51c8a6c6eceb488820537e21e73ee0579eda03c8cd2e2a3165cb32bdc305a32ce011ff02c0f4282a645376d8b2007d26e7033d81e82d21e0f9fecf001f906d22e0d2b2c8d6f20c213c9c78e10d3fe301fc826eb102749b20ecd816940af1cfc31f478aec6560532f7a3e45e8503332be50ea9334370333533577ee52446abf6fc43424493584ad392760f81a8b26d7cade7164217486a692ccd0ed5301b99c1e2f2325aea30c30ca23d3c8469eaa66e8e537ce00331dd10198ec11cf2f0401fe8183254448e813969717c3a6517aea2b142b41c44f4211a6b0ff9d00eb3310299813ece01e4baf346414e47432fe428021d9e466d9e323febb33f08e933d3937ec0863ddbd3283933a2666fe60c89124bcbb486c24af3b31e3591d72eb05946caa03c91c36ab2d2f2f006a7d32cb922c3dee38e646b0ecfc74c137036f9e618ba922b467441f51002e5d40f75fe011de4d41c4254451de86d56f4266bf245fd312a74d40ea382467334e478b447bb5113853432ebf3f4261311f3615604442899b43de17341460bd5a67458326a34a7863c5be51ea5f2803811f85693a4c6011a1c0827fd1220cb41171c2244e0a32a0214425d0bb674153145644503f221c6c11fabc259204b56a9c2d346ca59157321b4b33bd3675991155177143cf773f4bc114badf4554202b332352815d1493d155d1fc9334d90e642f3e628e954abf44a2d494b79ee543c6c500715b2e026561b623ba5555f5d4b5a07f659055631436a5a77544743ad8f7a3452c153b5466e3c2d696a04890381f2332571d5606eb32e335d3ff557385512e3c727fedc7590fae323e2f55b736f1febf5c67cae227cee3b0936b268f65e2f50811216516d9622ea4361711447430ea420d63145ed22d0411349ed346f2d5ec5d55dff63e6468bd51a11043f7633b746f6e2935df3011f26a9645310568a54a39af6b4f233699fe261956566d3961bdb96227ef65ea52252fdb1226e946113556117d6461f355287d63e789468a732a13204433a6a1ff3312a8f62694b2d804ef669698f7fe847d6f4a1d570c263add63d391358b65692522f7e9ef6f44e96292f715ee99555f9337053f7a3d456755b976851179322762a931659a21232d361717bf2541d375662451237f73d5b82e59614735f2f572e7373574d6cee011fded1fe6a48d5644f6f348ba5749d122a6917435ad575b757e4542b93f6b3f708b75b67777dca77d4b0b7656b77294e13772776a1cad3271f576313d19112e95730b378f3f7563875419cf779530d7a4b6b584ed555b07455b11759464f7b09d7a31a38b518f87c47ad5b1f18812b587df5b16521d37d8b2277c171774d6f32536f6cbaf677218a78f317855d627f59cf33fff7a2eee11d41b7d6ecf36cf0d3346f377df5d182779887a5b28727f576c5132a87985257166d2e511ee0f75ddfe77d4695649bd71dc9116c32f38453388553e228e3336cf607e6acc67febc1413e3780e9936cab9783153788d15762dbf758d45810156a7d8938292e4429e4181f17fe371f8d7865c9d66ccce65dddd57fb8b6e6548dd5f4011f4cb87e82d78a17b9251c4925d8319103847ec5667e510e8c651828ca588ff3b383895883edf11ef3781073ce765735e7e8555585b48337598f6b586a48b3691b57a344538647b65c37b79119599773596bb28663d71158c2c67f35d6906b0ea3be963e4377746f8f959bd9999f199a37b986714f1ee4816caf79030d917701197ef0c11ec6516373c2564a30645322c5aa789751b87237eb91c639982deac494571299b7739bd7644ff6239699806d8d34af1455f9193f71cf8653755e071a5c0ffa9ffd79c45eb96263399ff9c327f199962f1693ff038cef417ede7127660525b298631d7925fe2e379d477a2582b7b380576be9c76ad8751c534d294353a3f4f99ae5558004ba805d79a16b7a9a13fa9fe721895f99a14b0e7e677a34410228a49786232474ffb8a22ff91021f7c43617914c1a33b1f85c491aab55383339738551ba859f97564e4d86b379031f5aa9891aadd35aadd73a5ee751748362969b5a867d023d33b692a518922b179db39aaf6b02a4adfa78953454e3f3aec118d5605a99df5a5ccd536c51365cc3b58f53b6ac89349f07c9acc796b10b119fc9daa84b359f95390597da69e51a632fd9aeef5a927542d664adaf5b3b7f883779dd119cefdaa14695b44117ae45371e45779b13db7179b7b77ff2527bfbb6e5fa33c198249a97fe843575b6ef9a7f216a57f6dab5b1dab372c5f564ef978f1292ee5a6c9cd8bb5f7a248a5bbcc7fb6949753e7d37bc0d3b4a9392276aae24e0e7046df9772b53b0557bbaefdb6b427049efd7563efab9b756634fcea5d1f3730399bc657890cb1b53314bacc5fa483fd7b0c1b8418cf9bde533b39abbc29ddb8b6f394939ab90a51bbf43dc575e42a49f5425b2869c2399721784b069e58be593271c249264fcbd47d59249ab1ebc19c23d37b3725c2933dac64d0cb9733c636b3bb90da9b9913b6a61bc9231bc5cf9b7bf75c2c33bd363415cc4affcb3b686f5f83727385a9ee777989bd77fbb76986985cc31da8ba5b4419877c9e55bbea554535d3c72d9fe3cce35d6cb51fb1e766227b89c72eb67e5b6dab38812cb07dd78cfb11c9514e6c0e6b9b79bbb1b3d7269afcc47b6b991d4d12bbd92fffb24f2dcab05a49763ce978557d0ad9cd0479d6b44bac44f7ccbfbdbc3b5e6a13656b551dbc5c791d12d5d12679dbee9f7b9576f7e12f1a18025a23a9a63d9b11d43b69719d11c491dd91f51d05fe27819d1f5526c1141753d658db3785d6b43957edbb18b3d3c6c80b7d7931478131dd8557bdcc7791da7bca3891d572c336bea37d13537a4e33dd9e7bd28d9f3d3670279d5d5d81f39d8513ad14d22bbcf5ddcd991d5c4d97e218adacdb1d5586ee1efbdc5fa3bd81f7eabb54673f31dc5f7ddd0e95de3e77dd9febda6e357e2e3375ee4479ee44bdee44f1ee5535ee5579ee55bdee55f1ee6635ee6679ee66bdee66f1ee7735ee729aa1c64000000a006ca61e7875ee753ecd45da21c02e0e7959e00849ee89fbee5ebe11c66a18d76200776600740251dec6126f6c1e701200076e0e76b00eacbdee4f9e11876000206e0e7dbdeed7f7e006a6016586e1d8c7016d681ed016016ec2107c03e1fcc1ef0e9bd1e5ee10194feeddd5eee670102dabe0650ce01dcbe00e881007e1e025e61e9ff3ef0339fd069e1f1c77e1626bf00dc7e074edcf2dbfe156a81f27f7ef46760e9431fe8351ff6af5c16dabe0068811fc43e00fafee70ba01e5642ecdb3e075601e8cf21f4cfa1fe1fce21ef77dff8639ff95d7b170c3f00847e1e26ff15d2c1f5475f25cec1f07ffe15169f015e4120582e1d6aa0000a2007d4a1f9d3bfaf595ff55562f667601df86115947e17e6e11c7660f2db5e067681f60100fbf91d20f4f51bd88f1fc181f9f2193c48901f3d75f40cf2d3a72fa1c57c02190edc6771a1c68f20438a1c49b2a4c9932853aa5cc9b2a5cb973061029809e0d5c01a3321bca2c99366811df976f44cd76fd60c192964cc203aabc60c08356ac4aa512040011df508727c058126841c050610181000400002040ad498956f20bf5d3b200c30abb656ccbb78f3eaddcbb7afdfbf26790e3897af6cceb25f0bf4b4b9afabd77efb14fb54d8fe1582e49e006aec1b78cef1cc010c665e9ec940d6acb23bfaa9c349b3065cb37601cb9e4dbbb6eddbb6f7099d19e0152d9e86e7f5cb97a3a7ebc5fdcaf54cbdceeaae570400ec98cb935ef2e83465d0a3174027cf02f20a3e0050a01cf5993bf8bdad9163c766dcf0e3cb9f4fbf76be5735749cebb79b27848dcdd154d66800acd3cf2a3d95c3cf4ebd09959e6733cda30f840564b50b003a9473992c03cd221a8403d4b30f3e350c30406af5a5a8e28a2cb618923e0e6066d340dc7945600dfce403e17ffc38f64077f904481303fcfcc6532c03ede6d900ead0c29a743de5b00e57a2ad938e3d2e66a9e5965cf2752166fb75481301b49cc6d32cfb1849fed32bfb78c813873bf1b40a7f82a9c70f81bc0d298b9a336137530de9e0c3c07f5d166ae8a18832f4e46303ad331a04e38db90e3d91d2b40e3e103cf599401006b0ce3986cd948398981530430d3b8c63509c5ecd90c32b06f223148789d66aebadf4f1d95a2de5bc82674f01ac02a1595311b00b2dd1b9d70f88b31038a73d95fa975141af848ade41fa088523aedc76eb2d5ff3449b2766adf5e71fb9994946cb4de4ee50a90c54a29bc339e750d9db7901ec70ce38af8c57435bdf062cf0c0279d53839f05cc2bcbb001d440cb3ef544db9b3d8b02e0a7c559ed53cb79000c605367e8a2f7ab0cfbad5383b5a2bd0230c12cb7ecf270ea98b38e47fcacaa53cb2cb394931541f5bcb2c30eb3ecaccf2c3fbf924e39c7d2424b9803cde3f30eb2ec5cd0733bc4d215760fe4487454afa6f31e6453ee90430e7dd0b2f2cb68a7ad3660fbe0b78370fdcc53567135ade4d1da78e7ad774b6e0200013f6d0390037103c0bdf7e188277e17ab05d6a35800b1f4a6f8e494575e52df7ff7f7c0b69677ee79e5fce094ef93bd9dfdf9e9a8e37d9f6301cc006beab0c7bef7d7b2d76efbedb8e7ae3bc10101003b, '2021-07-24', '2021-07-24', '1234', 0, NULL);
INSERT INTO `staff` (`staff_id`, `office_id`, `dept_id`, `title`, `last_name`, `first_name`, `middle_name`, `suffix`, `extension`, `sex`, `civil_status`, `birthdate`, `email_add`, `phone_num`, `religion`, `nationality`, `address`, `type`, `position`, `access_level`, `employment_status`, `account_status`, `e_signature`, `pic`, `date_submitted`, `date_verified`, `password`, `patinfo_status`, `license_number`) VALUES
(10001, 4, 5, NULL, 'Poppins', 'Elizabeth', 'Lee', NULL, NULL, 'Female', 'Single', '1990-08-25', 'lopezzuzeinn@gmail.com', '09480834578', 'Catholic', 'Filipino', 'N/A', 'Staff', 'Staff', 1, 'Regular', 'Active', NULL, NULL, '2021-08-10', '2021-08-13', 'password', 0, NULL),
(1000000001, 1, 0, NULL, 'Barrow', 'Mare', 'Molly', NULL, 'PhD', 'Female', 'Single', '1990-01-15', 'hannajanebw11@gmail.com', '09123456789', NULL, NULL, 'N/A', 'Staff', 'Staff', 1, 'Regular', 'Active', 0x89504e470d0a1a0a0000000d49484452000001300000021c0806000000717df223000000097048597300000ec400000ec401952b0e1b000041d749444154785eeddd097864d75de77dada5aa5249a57ddf5a6b776be956ef6dbbdb5becd8244e9c10629210028190306102f3c030c0f0c2bc2c7979199810664870124292992c182780e37d8be3b5f7456ab5f67d57692955492595a492e677bc40b0dd6e2d55a592f4ede7e927e0aeaa7befe7de3a75cefffccfff4445f10701041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104020c204a223ec7c42763acb81a598959595d8e5e540ec722010bfbcb212f3daff2ec746454547c5c5c5cdc7c55b7c3131314bb1b1712b213b113e1801048226b0ed1bb0c5057fc2fcdc6cea8cd793e3f54ee78c8d8e54793dd339f3f3f3c9f373732981a895d8f8f8f825674aea606e6ede958c8cacd64447f2b0cd669f548336a7c66c3968da7c1002080455605b36604b8b0b16355c89336ab0da9a9beeeeede93e31353999af462b617e7ecea21ed752bc257e2e3a3a7a797139109f98983867b3d916a2d5fd8a8d8d8d723a53260a8b8a5f2c28287e252d3db3393ede32131b171f08aa3c1f8600021b16d8560d586071214e0d54cac8d040fdd5c6cbf7f6f7f5d68f8d8de669e818adde556b6171c9858cccacb6f48cccae2467ca487c5cfcbc7f71c11e1717bbb8b4b4649d9c182f1b1e1a38ecf14c17fb66677396979763aa6b6a7f90671ab2b48cd604ab7d66c3e27c000208044d605b346081a5a5d805ff5cf2406ff7b1f3674ffd627757e7a140607925253575480d5773764e6e43e59eea279d296983b171717ef5bc02ea51bd25ceb5b4b4f86a5c6c71d19f34ee1addddd27ce5debedede63fa9cf1dd7baaff715769c55336bbc3458c2c68cf1f1f84c08604b67c03a686cb363539b1ebc2f9331f6b6cb87c8fc7e34929282c6ca8af3ff8fd5d65152f24253b87e3e2e2fd1a062ead556a7ecee7181f1bd97df6f4cbff717cdc55515151f5645dfda16f295ed6cb9072ad9abc1e81e00b6cd9064c31ae58dfac37cb345c2d2dcd778dbb5c45b97979ad75fbeabfbfabb4fc856467ca6042826d7ea364ea95457ba7a78a2f9c3bfdc9e6a62befcfcdcb6fbce5f63bff28352db343013302fc1b05e6fd086c40206e03efddb4b79a99c5e1c1fe7da75f79f1975a5a9b6f494d4b1bbaf1c4c9afd6d6d5ff40c3c45e8b2561cdbdad6b5d8c7a6f66a8d9333d357effb47b3aa7bbbbf3e6332fbff8b9e3276efeef4acde88b21e562d39e030e8cc0966bc016e6e7ec7d3d9d37bcf4fc8f7eb3b5b5b56e6f6ddd33276fb9edaf7272f39be2e313fca1baa5ced48cc1c9f1b1cf279e7a69b2a5b9e91ee5912d9fbcf55d9fd7f14642754c3e170104de59604b3560fe799fa3b3bde58ee79e7deaf7a7a7a7d3f6d71f78e2d63beefa9394d4f41ef594423e9c4bcbc8ea99181fbddf35e12a6d6d6b79575a664687cee9ef343b39cb83860002e117d8323130d3f36abc7cfe232fbdf0e3df527a43d4818387bfa980fab7939253cccc62c81baf376e8d663ca307067a0e3fffdc33bfe7999e2e78cffbeefdcf79f945af582cd60dc7dbc27ffb3922025b5b604b3460a6e7d5ddd176db534f3cfaa74b8140ecedefbaf3f395bb6b1eb22458bd0aa4877dd98f1265e3babbda6f7ee2b187ff3427277bf8a693b7fd716676de25b2f6b7f697e19dce7e76c6a3951bbe64a5e0ac444745afe8477341cfdfac49cbd10c77d87e40b7aff0faae2ce287900bfe795be3c5731ffad1b34ffd8ef2e4576ebee5b6ff51b1bbfa61ab3dd1b3be4bdef8bbb4c468696e6ef6746dddbe07cf9c79f95359d939ef4b76a6f6e993c737fee97c42a40978dc93e98ffef09f7ea5ada5e5e6a42487df96609dd70f6994d269fa0f1d3bfea0cf37d364b73bbc9176de3be17c22ba015b5af05bae5eb9fcde271e7fe4f7944d9f70dbed777ca16a6fcdbf2899d4bdd937c7664b9c99764f7ebbadadf9ceb3674e7d34332ba7512917ffa2585cd0664037fb1a39fe6b029d1dedf5cf3ff7a3fb262726f6a9018b5a092c4769e54694d56a9d1d1c1ed8f3a1fb3ef65f0381a5067ae0e17f6262c27fc8d51d51a912f1dd9d6d279f7cfc913f5c5c5c4c3a70f0d00f6a15f37224a78cadee1342ff2a9bdd3eb9bffed03f98614563c3858f69989113faa37284700be4e4e6f6949695b5381c89012dfc8fb2dbed515a3f1ba575b3898343037ba7dd53d92b2b5111fb5d0ab757388f17b1e86e65d73ff5c463bf37393999555b5bf7f8b11b4e7ed19ee888a8219a02f7fedd7b6a1ececb2f38d7ddddb5bfafb7eb66c5c7e2c379033956e805b4a0bfbfbaa6ee99788b65c8ebf546cdcece46b9ddee289fe2088585c5a7d4fbee5639267adea1bf156f39424436605e8f3bfbece9973e353a3a52b17f7ffdd337dd7cdb5f24a7a4f59b18d82618bde3216df6c4f1bdd5b51a3ac62d7476b6dfadc5e46991768e9ccfc60412ac367ffda1a38fedd95bf74347524a4b4c6cfc585676dee5c3476ff8fa873efcd13f5609a6fe8d1d8177af5720e262604a9750aee88f7f5eeb1a3f54b26b57cba1a3c7bfaefcab76cdf64464399bb8384b606ad2753a2b2bbb7b7464b8d6e371170796165d5a2bc9ccd47a9fca087c9f7a5903a3c3437fded9defa94d7e3492f2ed9d554505cd26cb5d96614f78cc867330219837e4a11d5802daa8ed7c8605fede54b173ea6b852d4e123c7be915f58724ab37e0b41bff2207ea0dd9e38999191d9d6d878b9c6353a5c93999973591f1fb25501413c753e6a0d02d9b979bd4b8b8bfd9a503285e3028a8145dc88600d97b32d5e1a5143c879df6cfa8573673ea91843b652149e2829ad7846ddf788afc1a5d9277f5a7a468b1eee98d1d1e1bd8b4b0bf66df17470116f11888b8f5f562c4c65c769bc22e1f18898062cb0b4106b02f79ab2be2d292969a26effc16f596d8913918074bd735025d7a5d4b48c0ec5c1e64c691ffffc9cf37aefe1df114060e30211d380290521f7d285d3bf3ce3f3265755ef7d22232bfb8a7eed16377e89a1ff0493ffe374a6f65be2ed931e8f2fddef5f480afd5139020208444403a6c0bda3aba3f5aea1c181930adc5fddbdbbe6fb0a8c6ea905d271b1f1f39a6898531c2f7161c1efd0ee475b6299165f0104b6b2404434605eaf3bef4ae3e59f9bf7fbe30e1c3cfab5acecdc4b5bade2a9f60309e8efb2dfef4f999df1e69840ef567e30387704b682c0a67fc95412daded17af53dfd7d7d7b54bbfe6a7149d9b396049b6f2be0fde439c6c49afd2463b58060c1313b3393b5b26cf69be40f0208845260d31b30efb4bbe04a63c3cf6a857fa0a676dff7ac367b4465dbaf16df6cd1a6f571719a41b5cdcecea46b7e9d21e46af1781d02eb14d8d4066cd13f6f6f696efc806b6cacb0bca2f2544959e593aaaa1ad1395fd7768e5e510316abbd27e31616166cebbc1fbc0d0104d620b0690d98d60cc64c4f4f16b5365f7d5f5a7afae881c347bfaa0a0f5bb2f765bc35633a9f9e9ed19592923291e8481a538f924cfc353c88bc1481f5086c5a26be72a5d214fb7aefc4c478fec143477ea0aaa6a714b8dfb20b622df196d9eadabac7cc2edf0585c567941bc6f292f53c91bc078135086c4a03a6da49d143fddd950d972f7d2c31d1e15669e8af59ed8ea9359c77c4bd543db0801ae587b5b0b75389b8630ae8d3038bb8bbc4096d37814d69c0f4454f6db97ae503eea9a9cc43478efea323c9b92d56f36bd9936f7e6eeeaaf2c1b64402ee767b98b99e9d2710f618982a35c40ef6f51ceb686fbdc79e98e8dd5bb3ef3bf19684885fefb8da4743d509e654f46ecb0e85577b9dbc0e814810087b03a6de578aaa97fe9cd20dd2f756d73cab2dd13ab4148755fd91f034700e086c3181b036608a7dc58cbb46ab7ababb8e29d8edaddcbdf741f5be366d738e2d76af385d0410789340581b30a54e24b6b55c7def9ccf97a232cc8daae0d0b2d5960cf104218040e40884b50153a9e8bcbedeeedb53d3d2bc7babebbeaba0f7969e798c9cdbc89920b03305c2d680699160dc607fef6193f7959b97df985750fc7c5c7c02bb59efcce78eab46202802616bc0fcfeb9d4f68ed6bb63e262978b4a4a9f8c4f487007e50af8100410d8b102616bc0e6e67c69bed9d902c5beda8a8a77fd48338f733b569d0b470081a00884a5015b5a5a88ebebe93c3e3434549099997525c999d24bea4450ee1f1f82c08e16084b03b6e09f4fea50adfbc5a5c598c2a292e7557162db24aeeee8a7878b4760930542de8029f33e7a627cac7cdc3556575c5cd2f9eaa26dd590dfe4ebe6f00820b00d0442df8005962ceded2d777867bc99f9f9054d968404ef3670e312104020020442de8069930bc7d0e0e0b1d898d8e59cdcbc73b131716cf81a01379e5340603b0884bc01f3f96633dc6e77617a7a66bf868faf44fa2edbdbe1a6720d08ec14819036604a5eb57677759c9c76bb334acbca9fb3db1da33b0596eb440081d00b84b41e986ac45b27c65d7b545e26da9992d217131bbb45ebdd87fe4670849d2710080462b4f3cb1b9bbf2cebfb1192aa2c5a839cb01458b22e0702167330b393bc26d2fcfa3baf636ee909b5903660cabe4f76b9c66a535253c7b5d763a3e26014fadb79df53aef87501538d458d9665617e3ed9ebf51674b6b71644ad04e2cd767c367be2987b727cd866b34fa8baaf4f450e36d4b02c2d2dc62f2d2edab4e37d7e5b6b53fdd8e8c83e6db89c14a3bd1a12b40a263b37efbcd97f55ffee5107633626366e419b496fe8989b71a343da8029f33e636a723a57e9138d4e676ab790b61cd066dc148eb97d04d46045abe76355e3913c3c3850d1dbd3754b5f6fdf4d6363a3bb7cb3bea4c5059f26e61396555eca9792923a98919979597b2abce81a1dba644f748c242458bd8a1baffa875f8d64dcbc2a1e77b4b79ce86a6f7ff7c040fffe99196ffafcbc3f5e9b2dabbd5c8a0d049663ed36dbc79d29a9c37985f9e7d5c1e8cacecebd32ee1ae952033a6951815195b9da12936d216bc0cce2edd6e6a63295ce71646767375812acd3dbe7b1e44a10786701d3db5af0fb93c64687cb8787068ef5f5f6be6b6478a4c2e7f325c6c5c5cda8a1185183d56e898fd1ee82f3c91eaf27b3bbbbabb4b5b5a5c262397d4f4646c6707a46667745e5ee47478707cea9f067b729597eada3ea78b1ea71d95da32395172f9efba59696e6db663c5e5b41416163d5eebd3fcecece698a8fb7f8545034697272a268746464eff8b86bd7c50be7ef52231b6fb55967d3d3d20773f3f21ab5d4efd4e8c840a362d62ef31ef508fdea9d456495e19035608a7fd94647876b551f7e393d33b3393626664bb4e87c3111d8a8c0c2c2bcdd14ee6cb874f117fb7a7b8e7b3c9e2c0d13e77272f31b8e1c3df698aab19cb7d9ed13fa6f1ab6c5fa971697ac3e6d86ecd126cf93e3aeca9191e1fdc34383d56dcdcd37343534dc545858d85fb7ffc0f7265d238f2625a70ce83b35a7d1ccabf1320d15b50fa9dfa14a2fb557af5ef9e9f6b6b65b947399a486abe1c4895b7e50565ea1c9b3c4090d49fdd1d151a61316b3bc1c50abe9b76b03e68c8181defd830303fb868707f74e4c4e16f60ff4df73fefcb9f73b1c0e8fc391e4d2e75c2e2c2a3e3f34d8dbaa6d0f27d55bf4a833e25583b6ea5ee1463ddfe9fd21db3dda333d95f3f0bffce02b1aeb67dffbc19ff995ecdcfccba1bc103e1b81cd1650cea36576c69bdfddd5fe531d6dedf7689858a2c9ab9e9c9cbcf3a565154f666665359b219a7a34d7eccd68e54acce2e262a2c73d55a046e9d0a50be73f3c3931be3b2a6ac5a2c6a4797775cd3fe4e6159c53cf6846bd2ecbe884ab4acbf46eefe9ec3ca986322d2d2dbd4bdbfb3db46f5ffd834949cee1773a96f1323b84a9e7669d9b9f734e4f4de6f5f7f7ee371593d53b2b55018654bd245eb1eb18b37f85d3e91ccbccca6e2f2faf7a32afa0f0b47a689b3eaa0a590f4cbbf3a44d4c4c14aa2bdca79be6daec878be347ae80998dd317d4a4f4ac68666c4beea7b9e09f734c8c8feebd70eef46f7576761e7426a7f61d3e7aec7f9696963fa98d8e4714a45fd50a94d783f7e6b5cd9a3d6c2bada87ada6c8273e1dc994fb4b6b61e6a6ebe5a9f9a9a36959c9c3ca6ded04cf7f050b98684a9b604dbd4fefdf5df3f71f2d6bf4d4d4bef531c6b55b5f65e2faa602ac398bf23ead15d3e70f0e883ea9da5fb7c33a94a812a50dcee86f1f1f15235ac96d191e1b295e5953b93939d037afdf66cc0024b4bb19d6d4d95cb4bf3ce5467d258823561d32f3472bfbe3befccf47cc40496039665f520b4b94b767f5f77a1e2402936bb6d626ad2d56fb5d9c74d0f632bcc8a2954a2a0b92fa3bdadf5ce2b8d8d9f9cf64c6757edae79b8fec0c12f2b48deb3da86e4ed9e0205ef4d633eac86eca1dc82e2734d572ebff7dcd9333fdd3f30b0373030906eb3d9e6939292878f1fb9e187870e1ffd6e764e6eeb6a1bca6b3d753237c734fb5498bfddfa7b413db16714d376e8ff8e5e5e59895d595e8e55a72422aa2987a407b6b21288d378be78797925d6999ad665c6fa3bef6b7aed2b560c42a938a1c9f9895467355a714b81c5043554ce81819eb2bebeee9b4c8a8d77da5ba0e14bbafedd6a46348a0d8de7e4e45e52e0f99fbddee94be68b1229f19637dbaaca4ae2e484abe26a53e3c7bababaee302910478e1cfbcb5da5658f297e34a4585550f2ba5e6fc8fa15ebfa6a75edfe7f566e6589be5fb98a6745e715145c311b295b6d896e4d0e04e5786fbe4e5dd7acfe9bf91b717f42d280694890303ded2e51c3b5a4317373744c6c44ce6084f36e98fd30fd0bf34ecd02a569a861f74c4fbaf56be98a8d8d9f8f898909c98317ceebbbd6b1f4a5b39a69fdaeced6033dbddd27c65daebd26b6b21215d0e311e74f4c4c1acdcacebe64b5da26356cc99e9e9e2e1a1c1c38a018cc1ec573daf756d73e30e3f55c7e2de81d396938ba8fc9fd7d3db79c3d73e6d74dbc284375ee8e1e3bfe85fcfcc253ca8bb8e66ce146ee897a73e67b34fc6aaf6c6949f1eb952835eedbf6d9598d55481a300533ed6ef754a9c6e8be648a1746c923616a72bca4a5b9e14303037db7cfcfcfa7e6695f80da7d07be929e917b315cbf6e66aa5dbdbf78c539124c42a5e6a4a2a2a36396f5cbed57ec653e5853e50a0a5bcccc98d6c166365cbe70f3c8f0e011cdaced5d5858b068c83362e24225a5a53f4e4e4ee94fb02428cf297e2e265aa3ca95e557530ff4ec947475b6dda1b482db9f7ae2d1ffbfa2b2eac97dfb0f7e53c3985ee5276d7a25dff9b9d9d4ae8ed6f75dbe74f157c7c6c7732a2a2a1f3f74f8d85f29f6d421cbb0fc5887aab7b59a4623925e1392066cdee74b53f02f5fdd68b77e592362acbc59e8669a7b70a0e7c073cf3ef9bbbdbdddc7f5b369b1db6d6a47967234ad9d70e0d08d7facd7b4867298a42f7ec2dcbc2f6da0bfbb6c686860bf6ab355aab793b9bcbcacc4ece88082c27d2525a52f4dbb27cedb1393c6147f5af397d004e2350cb498e3a8f139d4dddd79876b6cac46b3d0e9995999edf5f587fe5e335767f44c0c9b44c9571bcdb70fd8fbf459639999d9cd15957b1e514ed32f2b19f34605aaebca2baafe593b5b3da2d9af310dcfd67c8ec17806e6e77c29dd9dedefbd70fedce7746dcee3c76ff842d5eeea071d4949433b2d2c100ccf8d7e46d01b30958f8eedefee2854f66fa66219a7cdb2888d9ee4567ebf594ef5e2f3cf7ef685e79fbb333333d373e8d0e16794577361da3d75606868f0485a77c7dd7babf70de91a27837d9d665a7f4ed5403a3a9a8f35375fb977647868b77a41f1faf2fb62a2a3350a598a33c3d7c181beda96e6a6bb745e4df5f587bfe9f379cf2624d8a6af37643359e6ead55935e39ca245fb351afa1d54e2e6418f67ba305a4bfc9234535553b7ffef35fd7f4ab356fdca1f5a55ef49634b332c3241e48b4a4bf883c1c1bee3972f5df8f4d933a77e5dd7705cbdb1fbd52837aa3716d667cbf4bcdadb9a3f78eecce9df5042d5ca818387feb6a676ffb7140ad8d13fd2c17e6ed7f279416fc09603cb716608e0f7fb2dced4d49e9dbc7987998d1d1cec29efede9399a929ae6b9f5b63bbf527fe0f0f734adee52f0b76ecce5fae2c8c8d00da5e5553f086603a659ab380ddfb2fafbba6a2f5d3aff493528d96a14668bd5cb2a2c2c7e392323ab4d719a57cb7a6bc8e670b9462bbbbb3b6ed39677bb5f79e5f9df2c2a2a79a9b4acf209afd7dd6d1a323572a6b7f35aac656525c6cc442d2efa13c75dc3f9bd3d7dc78706078e8e8d8dedd6cc625c5a5aea8002f00fe8335e713a53fa12131d2efd88ad7b124756139abe7f5231a6e6ab571a7e4e3dbbf79e7ae5853fa9db77e06fe6e6669f37c9956b79e0d7fb5adfac37b3bdb5f9fd9a05fc7533143e72f4f85feda9aefd8e664c99615f2f6a10de17fc066c6539deef9f4fd1e3beac7847afbad5eb7e7883707d9bfa11ea8ddaba3ada6ed778d17eecd80d4f1f3d7ee2cb0a5a8f69d816ad8cea4e67b2b3570d7df2e2c28299a20eca1f05cc93c7c7c72aaf365dfe787f7fff6193835753bdefbb25bbca7ee470249bc4c6b937c7ba34846d2aafd8f3cce8c8506dd395860fb7b6b4ded9dbdd73322d3dbd53499817d4888cc6c5c6fab5a781d5c4a8ccf05333887b464747cbbd5e5f5a82c532ab6295cd9555558f1714169d49d4c264cd9ccdabd10ccada572d3636cf50a77a935f34c1f2e6ab8d9f3c7ff6d46fabf13fa400ffdf68898dd22e4297193ee79b496f696ebcefdc99339f5b5a0aac2865e14b557baa1fa0f10aca23bba10f097e03a675559ae6add1a2d4690535dbb7caa2d00d295ee3cd6ef76489a6d83facc5ecfdb575f50f9af8d21b0b73f5a59856afac453b351d560367d9e8f1cd70518987b9cd4d97dfd7d6d6f241b360779782e57bf6d4fc8319bee94b7ecd8d545e6fd026351c7c212727bf414bc06aae3635fcb402ef35dddddd8714943741ff38e57e04343133eb48744c38921c2ed3cb4a4bcb6ccb2f28bca005c17dfa37b3c42464b1290dd5dc9a1c785833db0d571a2e7ea6adb5f9035ecf4cfe818387bfa0736c56e31cf4e52d0a012429607ff785f367ff83df6f7a5ec7fe5ac3e2ffad73094bcf6fa3cfc5767f7ff01bb095650d2f1693ad56ab4fddfbb1ed0e78adebd310cb72a5e1fc3105ca9d8a053ea3757017141cffd72fd8ab29040ec790ea312d6a2670435f7a7da9edeea9890acdf87d5a71b5c3eaa534d5d4ecfbba16035fb12a437bb575a65e8f794d2936f692297fa480759a7a5a95664f4fb3e038362e76d1cc22aab288191a2ad81fef5383351f6f597db5848d3e0f9a00306b6adba7a7a7be204faf163f7ff085e767fefba14347ff5c8df80bfa6f41ebf16b4d63e2c8d0c0f1c6868bbfaa9eb25531afafecadd9f76d1aaf8ddec5e0bd3fe80d58602990b0e05f48b4582c73a6ee50f04e756b7d92865ac95ac8fbeea4e424efaeb28ac7df5c8d56a348d565b24ec7c5c6a9018b5ed750cb543c50e392d1d7db758302449fd05ab8ecd2d28a1f2a36f36df5bafad63bb3a91942733ee6de99bf5d6ad06257f4c3a4c0fc4a744cf472242cf751233aa000ffdfe85c7c57af367deccce997ffeb8d965b7e578dd8c5603462fa014ad082ecbab3675ef96d3393aa7cb47fd482eaaf3b9292a92a1c415fc5a0376026b86b1215b588d5bd932bb02a1695313b335b54a0252059d9f9e7df92bfa4ca008b8b4b7653cceef520f99a1e0b53aedb0c519b1a1b7e41a91127146c9f387ce4863fd34ca202dbf6a0fe70a84133cb4b226e8da2990cd1b3767f527272bf2a3ffc9a1ab1ffb66fff812fcafe45a5efac7bef5193fa323e365c6fe26cc3c3c3655a16f48d7dfb0fddef48728eace926f1e2900b04b526be995657bda34cfd4dd30af6a5f5f62c427ed5213e805936a359c042658f0714877a4a5fa689b71e323a4ac1fb14135732c9a46b39250d1913c7c6468e9c3bf3f21f9a21545656ceb99b4edcf23bda77e0b160375e6b39afcd78adae775a33a60f2b0ef6974a10769c3ef5d21f7475b6bf4fc3dfe4f59e8fd733557ae1fce9dfeaeaec3c5a5e5ef17475cdfe6fd278ad5733b4ef0b6a0fcc0c33148b29d71738510bb8bd1b8ded84f6d243f7e9ca28b7a8be53a96a2af915a8ef3271aeb7399a296514a774a27825b4aefa8fd9e57c6c74e85853e3e55f9b724f155557d77c6f6f4dddd795d5ae19dfedbb24e99d80f403e1d5ccf7e3a6c7af06ecf7f4f777cdda4a35620f6aa6d0e493adfa8f72e0d22f9c7de55734fcbf41f7aefdf0d11bff42c3465379813f112810d4064ca573139403b64b719268d522ea53c2e4aa4a7a44a0cb864e49abf5d503f39528f5401b292c272a772af62d1fa87c2a05bfe7f46ff1ffb6afc3b50f6b6a9c6b6894d9dbd379735757c74734e3367be8f0f13fce2f287aced498dad0096f83372b9ee853cff419a5edf84fbdf2e2ef2bf1f5b3662993d22cbeb1dab89582f6d6cef696bb348bfb7e2d811b3872eca6bf504589ee50ceac6e03fa4dbd84a03660a6448aeae0e79afc1fc52594c41abb63abb06af6d112585e369b2a5425a7a45ed25dfe77abf9559d3c46b1a5452585aab9bf76105fc3f258c5bb925ca3c37bbbbadade3f38387852f95c83b575b5ff2b332be7bc02d63bf247e2edbe359aa19c5323f6c20d3127fedf33a75ff92fe7ce9df98c664e17142bfc27cd9ef65d6f65812946d87cb5e1e31a8ac62ae1f81b45c5a5cfaaf10adaace6a67ed3b7e9c183da80452b575b29148e68a50824a7a47568ffa635c576b68bb1e9052857e9c70aaedf31ed71d73b67d3cf6a48d3f4ef7ba4d12a07bce4888b8a8d56b96db575cb0a87fddb1050bd5955e65c704c8c8d5476b4b5dcdbdede768f32c0ad5a0ff870cdbefddf508e9d593fc997eb4d0f8da9bf25b7174fda6c93674fbff8fb0d97cf7d667e6e26af6effa1ffa57bd06f4a9cbfdd73a69a5ec917cf9ff9707fff70a582f67fbfa77affb7f55911594266bb7c4f82711d416dc014fb8935b5f0f5c59ad31067e6d57a1f3bf08fd9044125b52f6564649e52a9955ad545fbc5925de55f53fcaa5b551fbcea72ada8b44e8232da0b15ffb22a989fbcf25a32ebab3d567dd1e295949ae51a193e78e1dcd9cf29a174b7d6118ed7edabbf7f6fedbeef9a0a9f3b35deb59ac7c9a45168c8dd78ec86937ff8d28b3ffa7c4747dbfbd5cb0dd41f38f63ff4feb7e4269a923f2a8d73a3d978635769e90b4a99f8aee26a2c115a0df626bf26b80d98b2f0cde6999604cbac451535b56466473660e69e2aeb7ea0b26aef5f2bb9f4ff19e8ef3ba97586e55a96f3485e7ed153aa2f3ea20073b686dbd9eab1da34f1b1473396c3aa31356b82cf83fd3dfb5aae36fdacd61756eb8bb7a0ccefaf55eedef3505a7a46bb32ea57559a78939fab4d3fbca92caa3cb99663c74ffeb7975f7aee4fd488bd4755373ab402e29f6d76c7f81b276866ceb52e55b38e673f67361d3b7ce4f817d4bbeddcf40be004562510d4064cbf7a56ed006cd3af97c7049957139c5ed5596ec117996450b3bc4553f09f5779998ff6f474fe547757e7efa4a767fc4c5e7ec1f3b3b3defc81c1fe6aefe474aa66223f31d0d7776451e917a6a0dfd4d464a1e9c51614153da7e4c96f9aaa0e0ad4d370adf1393009b76ac42e1f3d76d31f9d39f5e21f5cba78eed7cc0f86868bdfb25a5f5b84add9e21cfdc8fcb27aca45478fddf0052d746f79bd4efc1a8fc6cb374320b80d981e0eb34554b233715c5fc0b0963ad90cbceb1d538db849febcacde569f96f59cbe7ce9fcafba5cae522547fed2ac6fc6e999f6d826c727a38647c76e517588635a9ae3d702eafeb2b28a27b4b3cc03a6c7a5866b4d6900d73ba79df6ef26706fb2f30f1c3af6e7afbcf8dc9f363735fe7c7a46d615ad713ca72ab9b696e6abf76aa38cf7e5e7179caeacdcf39066869914d9420f49501b30e5e224fb9564a92f6eaf9981244ef3da93a05c24ad2f5c7c48b38667559df498cab27cb8a3b3fd3619c56bc9cf6c764e4e5756764e675171c94b6abc9e494e49e9d35e7ec46082f445323131cde49e362b152e5d38fb1b972e9cf94f2afdfc63c53a3c972e9effb47ac08b353575dfd5307ec7a7a304893c6c1f13b4064c5fd0989e8ed674535f4ab36a4b6abc825e19206c2a2138d0ebb944fdea0da8067c4ea37642f68f8e8ed41417957ebf72f7de1f689a7f48bffe3e7dd9766cea4908d8fff523b5946b5e9328cf9a72e7172f9cf90de58afd675345767e21b0ac6ab15f553edd2beaad6d68517d28cf9fcf7e7b81a035604ac88c3675d0350ba9cc72d378ad6f81f276bf51a637a0188c2b37b7a0417118dffefd87be65773806226181f476b7d74cae6f66c6f3ccc8f0704d4f77cf67552f2d4dd5252eeed95bf34f9a1ca1aaea167c0082b816323aca6c81a58426fdafcda58ac23b7606f27acf81b2f3ad0a2e679acd4915fb32a59b236ea1f4f5ae61abfebb928027ccfa54fd90b814d08fd23d1834658182557c71abba6cd5f30e6203a6496865956bf9cca229a3a35d661842becd53611256b524285b659ecbd5e06befc0f855d589dfaa0f58a49db70975e8af4de715a71fda286d165265fe9a0a149176ae9ccff50582d68099c6cb6cd5a52cf465b391c74ead44713d72f5bc6ca32383b7688d5eb6d6e8b52a564836fdf5d082f8ef0ae627f7f674df6aaaa6d8edf665ffbc3f53955d3fa21f9492201e868f0a9340301bb068f52eb435b0a979f7139b4084e942b6ca61b4e146924ae11c5f5200d96ab38d32531bbe3b673659518e5dd540ffc0cd490ea74f556b4f95969636a800419dd22b7e55f1b1bcf09d0d470a8640d0bacdea71ad6859ccb2897ca937b6860231c1b88cadf3192ac09733e3f51669f838aa697ca6edc378eb340399d4dfdb7bab966e6554d7d43eb4ffc0a1fb15ab8d56e58adfd49e9def5111ce41a5027d5d952ddc613c2d0eb50181a0f5c0cc3968f868e25eaa26f35a4f6c03e7b52ddfaa388b657ada5da98cfb44ad93bca4068c5caf30de69afd753d4d3ddf51ee57bb9f754d73ca07a5fada969194db575fbff679236a6d5de961f99708d1d312b4ac2785a1c6a0302416bc04ccccbfc558c274e5983761313dbc0796dcbb72a46689b9a9c386476a5d6a6192faa1e3e59df61bad3ca014becebe9ba53c3c5c2dcbcfc97d3d233af9858ad2947a4fffbb236a8fdebc585c5849696a6cfa8ac4e89996c09d3a971980d0804ad9131c346a550c4aa7711af2e7a120dd85befcab202f8dab1bcdc64806b579f7e5510257d62030fef5ade3aa73d0ab401ef6d66ebb7f28aca7fd1ea88718d185e4df5d1fdf069a1fd0bc94e67537f5fef41ed547e97869bceb57c3eafdd1c81a035602606a6ea13cbafd7b68a373b386fce2545e651b5f7a3f60b98cdf7cdcde46ba7a27eedda44e264986e951a23ebf0e0c009efacb7b07277e523da76ae41795fffeec743f9786e25b47e392333bdabe9cae5cf0ef4f7dcada4ec0defd719a64bdcb187096a23a320be02f9d1ea7cad985aef6f2da3bc639955e32b10b04e4f4feed5fe82a95a36d4a6a545ebde35670733aeebd2cd4ef12a2e79ab7e347c5a32f4bc9615bd6581bc4926d6e2f9466d10f2bf4d46635f6ff707e7e666b3d77540de143681203760afc6c15654d8309e06ecdfdfc3a5a50587d2276e36731c0a1e5fd0178604d6303ce6a624b77b7272cfc4f8786d5a5a7a937612bf72adfd32b511f3545151e9235ae8fd8c6265a58303fd779a5dc9c3709a1c629d02c16cc056f4a55c505c6749a91426b84010f4276e8aeaac67eb4b51ad2fc990363c6927feb5ce27768d6fd3a49275746cf82605e5e30b0a8b9f54eccbf54e1fa1dc3c970a517ec5e974760ff4f77ed037375bb0c643f2f2300a04af0153cf4b333a9ad589f76b7b3562603f7113cdb4bcc73355a54a1d492a687856051fdf52d6388cf77c471d4ab38fe9eea9a9fd29a9a93dd939b9a7f58cbe63cfd7d40f4b494d6faeda5df325f5de127a7bba3ea2a55f693b0a6d0b5d6cd01a3075cb57cc0c8ffe775e35e02d0c21ffed29300994a3234337ebcb6166bb9e93119b4584e14b62f2ee5469f5a07abff97979f92faaf7bbaa1f0e935a919e9e79212b2bfb946625ef56c9ef03fa2c869261b8676b3d44d01a307360e5d5cc29c769c1fc72a91716b42cffb55e5424bdded49cd2129512976becb08627434e67da55ea4e85e70e691631716c74f876b35c2b2333fb829ecd55c71d35d4741716953c6836035129f04fa9f47419b961e1b96f6b394a701b302568c6ab01334348f5c2b4612b7f969797ac5393e3b59e69778e960ff568068cf489303c1666b30e2ddc4ef77abd155ab43d9ce870f49942036b39b472f5fa3233b3ce4d4e8ed78f8e0edfa912d48eb5bc9fd7865e20a80d980a192e9bdda6f5c71913134d754bdd3f7d899c7d7dddef595c5c8acacaca31d9f7abee0584fef66fdf23981fd19191a1135abcbd2b3b3be7596bc2dae38efab1992e2ad9f50fa6ec916624dfaf24e40a93cfb77dd5b6de9505b5015372e08216c29a1c1b95d659def13103b3ac4a7b3f166b0d5eb952273ab5e3cd256dac4ac31e86ef89d9decf333d5dad78d68c3325ad51cfe69a3799d19033909ce46c532fecc75a849fe51a1bbd5d9bd690a11f86fbb7da4304b50153ac61c99e6877991898095ceff45f2bb31c6568c8e4122d590b0b8b9ed65e91c3abbd31bc6e63025a8feb54da4a8d43e5ba357cd486c2ebab7aab6546eedcbc828735bbee568fee1e25b7162b1616d4efcdc6ae7467bf3ba837225a0d9823d1316c726ee6e7e63277f24ca47a5fb1b30adef7f5f5dca3c285fd8545bb1e63abb9f07cd94cdd2fafc753eef1780a9d29a94da6115aef9195afb7a258586f4a4a6aa3a966a18d586ed38c24b1b0f58206f97dc16dc0a26302fab2f6a90716e7f54e97aaaece8e9d8954ef2b7970b0efddfa1265e5e6e63f9d9494d24df1c2203fbdd7f83813fff27aa62bb424244a797717365af543c3508faa873caed2617363a323b7fae7e733c373251ce57a02416dc04c1d7ced22dda7076859c1d3bd260bfa7a27b01dfffdf5d4895d8383fd77690833a8e9f847f4256067ed30ddec57d79d7adcb5f6c4c451a733a555e93d1b2adbadf7cfeb739a349bd9ab7a6e65fabbdbf4f2c274391ce61d0482da8029ceb0aceef6b01a32ffb47baa726161679624d1cc638aaa19dca307bdb0a0a0f831952fa6f715a6afa182f7d1be395feeb8cb5567b3db864dd9ee601c5a93532e7ba2a34335f453c65d63b72e2e2da604e373f98c8d0904b50133a7a278c38c1a329fca26e7fae7e7b2765a205fbdce9899594ff1f0f0e0adca3bf2aafac193fa0527f37e63cfe9aadf6d7afdaed19123131313c59678cb687c5c7c507abe66a779ed623464e2bbcae9ab3765a9577d52bc306402416fc034f53c9f9b9b7369da3395e6f1b89537b3b3e26026f6d5dadafad1d1b189d25da5950fa4a6665c7da3705ec8ee221ffcaf02da2cc56a4ae728592ba0ea13176262e382b2d3b926a816b58675303636daeff3cd146b36b240cf36c3c84d7ef642d080c5cfa5a5655cd52f5f6076d65bb9b21cd83145e1b474254e53f77bf4057a97aa19f41417973e64f29036f91eefa8c39b19c2d9d9d902adcb9d4a4e49697b73e1c2f56228493b9060b58ea968a74fa111bb36c5a5eaf07a3183f8bea037609a765e48cfc86a5200d5a399a0bdbad13b26f14f85f332bbba3a3eaac5c3c9bb76953da0a9f776661e83f8b45ee7a3cce4c99ccf97a3bf1949c9c9bd498ee4be601d5d0da18a1558c735a3e9d6331d6df21c55db8dacfc6001aff37382de809972240a760e2726268e6926b254dded0213175ae7f96d99b72d2cf813c7c7478f8e8c0cdfaa2a060dea7d3dae7820cb86c278074d01016d50bb4b3d2465f324776b595b50e25f6f5c82e9d5e933ddfaff03a6ecf08a8aa887f1f238d4db0884a461d1b06956b3913d931313599313ae439a72ded6e914266955498e156d6dad9fd122f698f2f28a6f3b1c49033c71e11530cb87dc5393d54b81a5044762d280591912cc33d0e4d47c5c5cecbc266566f48c4fabf55ad3e2f0609e0b9ff59a40a81ab0190d235fd1502a4ae54c8e2d2efab7f530d20c93b560fbc3aa3d559d9b9bf7747676ee4b5a7ac2966961fe96a9e1b2badd137b14685742b563500d5850777d52626c6c60299060898ff7da4c514ab3910d7f365520240d585cbcc59f975ff4bcaa60f64f4e4e54a8a265eea65e65080f6e76aed1aa83cac1c181bbd5ebeaadacdcfd772a9c1794dca3109ef6b6fc6855bc4dd1ca877ca54fcc68043064aaa304f34215e34c9b999dc93649c916ab75dcec831acccfe7b3d62e109206cc9c86e26023da40f4a5d99999746d145ab65d773bd6747a6e7f7fef075442c85e5050f843656cb72be0cb83bdf6677143ef3009acaa1891a1007eaa7abf330ab84faa0716b4fb602608b42d5eaecfe74bd150725ac17c5f303f7f4317bf83df1cb206cc6c1b565555fd1dcd4a2e6a7384fb66555266bb39cfcffb5295b0faae9e9eeef76ae8f8a3f2f2aaff633649dd6ed7b915ae473b6169f1bcd76cc06151f6fdb82693823a843713044ace2e50b8c0a609aa1e3562242747c08311ca066cd966778c685835a83a4ab51eafbb565b8b6d9b60be661d6dde6977757777e727cd35aaf1fa86dd9e48b99c4d7aa8d5c0c46ad3e0ec79bf2f393636662e26366643eb1fdf7c1966b779fd589d88d1e6a7dad7b3c5acfbdda44be5b03f2110b206cc1cc392609dd642e647e7fdf3b1e36323776915ffb6d82854c361fd1a7b2a3b3a5a3fab8d6a93caca2afe4ec9bb66b7e7a00d59784ad726604a37698897a3358a7126e154f722683d30530b5fe919a5dad7a05ebdbb4915a7bcaaccfca036906bbb5a5efd8640681b30e54195ecaaf8be4a9a346b53d7c3eea9f1e3ea856df94aadf373bebcce8e965f19191939585252f61d95cb79d6ecfacc63b57902668650f95fc95acab6989c9cd211cc21a46ae15bc75d230714ffca484d4d6b329335c1caf0df3cb1ed71e490366086c866b78f96ec2aff8ecafbda06077a3fae2fff2ee54d6dd9044013f7eaea6affa8e25e3f959cecbc5a5c5cf280868eefb859eaf6785422fb2a4c0c4c6718affcaf29ad80e850803d683d242d892be8e868bb4f8de44a4161d1930956db78646bec9cb30b7903161f9fb0909d93ffbcdd91d4a72cf5eaa1819e5f98f3cd166f4562936d3f323c78b2a5b9e9e39a851a2f2bafbc3f3131a9772b5ecb763c67f582fd898ec4290d21ddea810525074ca9130efd60dd3b30d05fa7b4a0b6bcbc82e799a8899ca727e40dd8abbd306de75e59b9e77ecde02cf6f676df33e11a79cf827f2e397218ae7f26dae139d1353a7cc3d5a686ffa45ff7c5eada7d7f99939bff92d9f8e1faefe615a116303959aa16e151118195a895e024689b58e7e4c4d8be8eb6d68f6a19d17c4dedbefb1d8ee4fe505f0b9fbf7a81b034604a6c5dc82f287e2a2525edac8afc254f4ebaee98764f1ed603b225f68e5c5a5cb04c4d4dd45ebc78ee77b44d7d415959e5f754a8f069f385593d35af0ca580660503ea8179b53a3141cf95537f37f46c9b7d25b5996dfe95c6cb9f9d9c9ccc2b2d2d7fb4a8a8e469ad8524d619ca1bb9c6cfded04d5ecbb1b4238f6bffc1237f949c92dad0ddd3b5bf7fa0fb53b3b39ecab57cc666bcd6ac7354767765c3e58bff65dc355e59585cfa486959c5f794a84b1c64336ec8b58ea91e98253e61d26ab1ce2ae5215589adb68d9c9e6fd65bd8d6daf4e9c181be13959555cfd41f38fc05c5be2636f299bc37f802616bc0cca96b638b1e25b7fe8dd56a9d5059de23c343fd3f37a700e9728406f5f52bfceaee36cd571b7f6d7878f8505171c9737bab6bbfec487206ad4c4bf06fe9cefc44b3705ba914cb9e694f9e525bb234a45cf744d1cc8c27b7bbabed1383fd7df7aa2cd2a9bdd5755fd23def62e631f29eadb036600a7ece6767e7bf52545cfa5d2dbd89521ed5cff4f7767e5a257776451a8d2a68c4695bb4b2d696a6cf0d0f0f9dd032a1e71503f9a299e122df2bd2eed6abe7b3a26aacd1536eb7434b8a4cbee1ba1a3065f3e7b4b75efd6c7757e747b5255b47edbe039f5761820b5aff1894caae1129b7854f2aecdb9e596df6298f67ea1f557ea6b8a7bbf3fd9dedadf7c96f593db1afd812930623c152c3c678252e56b5b7367f56b34fb7e6e7173c5b5eb9fbcb69a9e9cd9add0a6a899648b8deed700edaf26c45017c8f625f2bea35e79bcd95755d6baa07a61fd2ccaef6d68f7776b4fdac7ea8baf7d6ecfbff92929cadf12c0f8bd84724ec0d9891d04c4edf9ebdfbfe4a951cac1323c377f77677dca7ca016ac3dcdfb3da1d4a128cdbb432254b8b8b09dab461775b6bf3af2bede348764eee4b15957bfe36352dbd899e57c43ec75166e7edb1d1a14ecd0abbc7c646eb94bb651ab1095349f57a676d7adb1a3616b7365ff9f9aecef6fbccd2b0ea9a7d7fa6d5159734014551caeb016ee2bf6f4a036636b9d0c3d55d5b77f0cfae04ce5a945b756b63e3c55f9e99f5669795effe92329fbb6255533fdc2e4a9570b85ca307952af1db6eb7bb322f2fffd9aadd7bbfe84c496ba1f10af7dd58fbf1cc5a540dfb5a0707fa4ff4f674bd5b397a3dfa94e96b7d921aaef879ff5ce6f0f040ad868d9f1a1d19a94f4d4f6fafababffb38cac9cd3345e6bbf07e17ec7a63460e6224d83a099a29eea7d073f1f131fe7eee9eabcb7b5f5ea4ffb952c5a5ebefb6bda5bf14ab8baeea6148ba9f5a48d684f365d69fcad99196f567979e503a565e5df49d1b091baf6e17e2cd7773cabd53e595b5b7fbf6f6626473da97b957f38a89ed8a38abd4e2b86b5ace165b4f65cb604960356d50e4b1f1d1ddcd5d9d1fe0bd3d353558af92f55eedef3bde292d2079dceb466b399edface82778553605d81ce609ea05ab11875df0b9a9b2e7fa2a3ade523aaaae950cfa7adb2aafa4b9959b92f6beada15acaceab73b6f6dce90a0e54dd9aae975e795c686ffa8f56eceddbbf77c778f661b15ffe8a7f10ae6dd0efd67e98728b1b7a7f3b6864b17fe83d9644599f317140678d90c0b17b4e59dd7e3aed2ce51d52625467b36a4a5a6a67a55b7ee8cc2047fef74a6b65a54f79e6df0427f9f8275844d6fc0deb810bf32f35d6323fb1b2f9fffdcd4e4c441ada19ccdc8ccba505656f5cd94b4f4868484576b3c5d379eb11a18d3e3321ba0ea5738d5353eb6bfbbabe34303fdfd27f54b3d595357f7252dd07e2cd1914455d5d56046e06bd47b4f70bb27cb3ada5b3fd0dfdf779beeb7d504f5353be9d482ef046b42823f2333b3d7346cbb4a2b7ea81d407a4d0144266822f0665ee79422a60133e7a9007abcea86157577b67eb0a7a7f33e2d00cf535c63aaa0a0e8f9d2f2aa6f2b93bf598d8c7bbdf131b34bb8e21e36a570642aee76acbfb7e7ddddbd3db7a8c653744e6eeef9aaddd55fd5aff1691dd3bdf56e2567fc660195324f545a44ae1a2da76618f3b406374b75ec0329ced4ae64674ab729f764ca43af26d08f6e640a445403f606911e3ca76b6cb8bea5b9f1639ad2be53b3957695e41953ddad479543f6907e317bf4e079d490f9b4846449555fafd933334b424c354d4d0c24fa667db9da64e4504f4fd77bd5e33a3633339390999ddd5a59b5fbfba5a5158f243b9dbdaa244b9a44643eab1b3a2bf5b8e34cc91d931d66d6b26a9848edb60d8946c69b23b201333466098f6253e99a213ad8dadc74dfc8c8d08db13131166752f28423296950359fdad2d2332e262627f799eebfa6cfe7940b14306555ccd666e633f4ff2ffbe6667334544c53ea7f7d5f6fdfbb8686062b555522460d624fc9aeb2476aeaf6ff1fc5474654c18012c191f14c721608ac5a20621bb037aee0f5862c6d6c6c78fff040ff8dea41dda86548bb352c8857c33597906099d502db592531ce9aad4655f0428b7997ac664bad98d8f87955e9cc542f2d56ffddbeb814585163d5bfabb4ec31cd383da461449f8de1e2aa1f165e8840a409447c03f66f0d99895f2dda15c7c8181aec3b363632543f3b3b93abea10a56acc124ddda6f9b939fdaf5ff554a2a2559960c16e4f9ad2b070548dd698feb73b2333bb212b3bf7a2766d1ed48a809948bb199c0f0208ac4d60cb34603f79592601513d338bd9f15b0d5792868466fd5b9aba5ba94ac3b02828aba926dbb4caddb84dd508c5b5fc665765fd77bf626741abd4b9366a5e8d0002c116d8920dd8db21988d17348254ecebb5787e2873c7827d13f83c0410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400081cd15f8bf2b1d52504cecfbce0000000049454e44ae426082, NULL, '2021-07-18', '2021-07-18', '1234', 0, NULL);
INSERT INTO `staff` (`staff_id`, `office_id`, `dept_id`, `title`, `last_name`, `first_name`, `middle_name`, `suffix`, `extension`, `sex`, `civil_status`, `birthdate`, `email_add`, `phone_num`, `religion`, `nationality`, `address`, `type`, `position`, `access_level`, `employment_status`, `account_status`, `e_signature`, `pic`, `date_submitted`, `date_verified`, `password`, `patinfo_status`, `license_number`) VALUES
(1000000002, 6, 0, NULL, 'Webber', 'Tamara', 'Jane', NULL, NULL, 'Female', 'Single', '1997-02-14', 'tamara@sample.com', '09632541141', NULL, 'Filipino', 'N/A', 'Faculty', 'Faculty', 1, 'Regular', 'Active', 0x89504e470d0a1a0a0000000d49484452000001300000021c0806000000717df223000000097048597300000ec400000ec401952b0e1b000041d749444154785eeddd097864d75de77dada5aa5249a57ddf5a6b776be956ef6dbbdb5becd8244e9c10629210028190306102f3c030c0f0c2bc2c7979199810664870124292992c182780e37d8be3b5f7456ab5f67d57692955492595a492e677bc40b0dd6e2d55a592f4ede7e927e0aeaa7befe7de3a75cefffccfff4445f10701041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104020c204a223ec7c42763acb81a598959595d8e5e540ec722010bfbcb212f3daff2ec746454547c5c5c5cdc7c55b7c3131314bb1b1712b213b113e1801048226b0ed1bb0c5057fc2fcdc6cea8cd793e3f54ee78c8d8e54793dd339f3f3f3c9f373732981a895d8f8f8f825674aea606e6ede958c8cacd64447f2b0cd669f548336a7c66c3968da7c1002080455605b36604b8b0b16355c89336ab0da9a9beeeeede93e31353999af462b617e7ecea21ed752bc257e2e3a3a7a797139109f98983867b3d916a2d5fd8a8d8d8d723a53260a8b8a5f2c28287e252d3db3393ede32131b171f08aa3c1f8600021b16d8560d586071214e0d54cac8d040fdd5c6cbf7f6f7f5d68f8d8de669e818adde556b6171c9858cccacb6f48cccae2467ca487c5cfcbc7f71c11e1717bbb8b4b4649d9c182f1b1e1a38ecf14c17fb66677396979763aa6b6a7f90671ab2b48cd604ab7d66c3e27c000208044d605b346081a5a5d805ff5cf2406ff7b1f3674ffd627757e7a140607925253575480d5773764e6e43e59eea279d296983b171717ef5bc02ea51bd25ceb5b4b4f86a5c6c71d19f34ee1addddd27ce5debedede63fa9cf1dd7baaff715769c55336bbc3458c2c68cf1f1f84c08604b67c03a686cb363539b1ebc2f9331f6b6cb87c8fc7e34929282c6ca8af3ff8fd5d65152f24253b87e3e2e2fd1a062ead556a7ecee7181f1bd97df6f4cbff717cdc55515151f5645dfda16f295ed6cb9072ad9abc1e81e00b6cd9064c31ae58dfac37cb345c2d2dcd778dbb5c45b97979ad75fbeabfbfabb4fc856467ca6042826d7ea364ea95457ba7a78a2f9c3bfdc9e6a62befcfcdcb6fbce5f63bff28352db343013302fc1b05e6fd086c40206e03efddb4b79a99c5e1c1fe7da75f79f1975a5a9b6f494d4b1bbaf1c4c9afd6d6d5ff40c3c45e8b2561cdbdad6b5d8c7a6f66a8d9333d357effb47b3aa7bbbbf3e6332fbff8b9e3276efeef4acde88b21e562d39e030e8cc0966bc016e6e7ec7d3d9d37bcf4fc8f7eb3b5b5b56e6f6ddd33276fb9edaf7272f39be2e313fca1baa5ced48cc1c9f1b1cf279e7a69b2a5b9e91ee5912d9fbcf55d9fd7f14642754c3e170104de59604b3560fe799fa3b3bde58ee79e7deaf7a7a7a7d3f6d71f78e2d63beefa9394d4f41ef594423e9c4bcbc8ea99181fbddf35e12a6d6d6b79575a664687cee9ef343b39cb83860002e117d8323130d3f36abc7cfe232fbdf0e3df527a43d4818387bfa980fab7939253cccc62c81baf376e8d663ca307067a0e3fffdc33bfe7999e2e78cffbeefdcf79f945af582cd60dc7dbc27ffb3922025b5b604b3460a6e7d5ddd176db534f3cfaa74b8140ecedefbaf3f395bb6b1eb22458bd0aa4877dd98f1265e3babbda6f7ee2b187ff3427277bf8a693b7fd716676de25b2f6b7f697e19dce7e76c6a3951bbe64a5e0ac444745afe8477341cfdfac49cbd10c77d87e40b7aff0faae2ce287900bfe795be3c5731ffad1b34ffd8ef2e4576ebee5b6ff51b1bbfa61ab3dd1b3be4bdef8bbb4c468696e6ef6746dddbe07cf9c79f95359d939ef4b76a6f6e993c737fee97c42a40978dc93e98ffef09f7ea5ada5e5e6a42487df96609dd70f6994d269fa0f1d3bfea0cf37d364b73bbc9176de3be17c22ba015b5af05bae5eb9fcde271e7fe4f7944d9f70dbed777ca16a6fcdbf2899d4bdd937c7664b9c99764f7ebbadadf9ceb3674e7d34332ba7512917ffa2585cd0664037fb1a39fe6b029d1dedf5cf3ff7a3fb262726f6a9018b5a092c4769e54694d56a9d1d1c1ed8f3a1fb3ef65f0381a5067ae0e17f6262c27fc8d51d51a912f1dd9d6d279f7cfc913f5c5c5c4c3a70f0d00f6a15f37224a78cadee1342ff2a9bdd3eb9bffed03f98614563c3858f69989113faa37284700be4e4e6f6949695b5381c89012dfc8fb2dbed515a3f1ba575b3898343037ba7dd53d92b2b5111fb5d0ab757388f17b1e86e65d73ff5c463bf37393999555b5bf7f8b11b4e7ed19ee888a8219a02f7fedd7b6a1ececb2f38d7ddddb5bfafb7eb66c5c7e2c379033956e805b4a0bfbfbaa6ee99788b65c8ebf546cdcece46b9ddee289fe2088585c5a7d4fbee5639267adea1bf156f39424436605e8f3bfbece9973e353a3a52b17f7ffdd337dd7cdb5f24a7a4f59b18d82618bde3216df6c4f1bdd5b51a3ac62d7476b6dfadc5e46991768e9ccfc60412ac367ffda1a38fedd95bf74347524a4b4c6cfc585676dee5c3476ff8fa873efcd13f5609a6fe8d1d8177af5720e262604a9750aee88f7f5eeb1a3f54b26b57cba1a3c7bfaefcab76cdf64464399bb8384b606ad2753a2b2bbb7b7464b8d6e371170796165d5a2bc9ccd47a9fca087c9f7a5903a3c3437fded9defa94d7e3492f2ed9d554505cd26cb5d96614f78cc867330219837e4a11d5802daa8ed7c8605fede54b173ea6b852d4e123c7be915f58724ab37e0b41bff2207ea0dd9e38999191d9d6d878b9c6353a5c93999973591f1fb25501413c753e6a0d02d9b979bd4b8b8bfd9a503285e3028a8145dc88600d97b32d5e1a5143c879df6cfa8573673ea91843b652149e2829ad7846ddf788afc1a5d9277f5a7a468b1eee98d1d1e1bd8b4b0bf66df17470116f11888b8f5f562c4c65c769bc22e1f18898062cb0b4106b02f79ab2be2d292969a26effc16f596d8913918074bd735025d7a5d4b48c0ec5c1e64c691ffffc9cf37aefe1df114060e30211d380290521f7d285d3bf3ce3f3265755ef7d22232bfb8a7eed16377e89a1ff0493ffe374a6f65be2ed931e8f2fddef5f480afd5139020208444403a6c0bda3aba3f5aea1c181930adc5fddbdbbe6fb0a8c6ea905d271b1f1f39a6898531c2f7161c1efd0ee475b6299165f0104b6b2404434605eaf3bef4ae3e59f9bf7fbe30e1c3cfab5acecdc4b5bade2a9f60309e8efb2dfef4f999df1e69840ef567e30387704b682c0a67fc95412daded17af53dfd7d7d7b54bbfe6a7149d9b396049b6f2be0fde439c6c49afd2463b58060c1313b3393b5b26cf69be40f0208845260d31b30efb4bbe04a63c3cf6a857fa0a676dff7ac367b4465dbaf16df6cd1a6f571719a41b5cdcecea46b7e9d21e46af1781d02eb14d8d4066cd13f6f6f696efc806b6cacb0bca2f2544959e593aaaa1ad1395fd7768e5e510316abbd27e31616166cebbc1fbc0d0104d620b0690d98d60cc64c4f4f16b5365f7d5f5a7afae881c347bfaa0a0f5bb2f765bc35633a9f9e9ed19592923291e8481a538f924cfc353c88bc1481f5086c5a26be72a5d214fb7aefc4c478fec143477ea0aaa6a714b8dfb20b622df196d9eadabac7cc2edf0585c567941bc6f292f53c91bc078135086c4a03a6da49d143fddd950d972f7d2c31d1e15669e8af59ed8ea9359c77c4bd543db0801ae587b5b0b75389b8630ae8d3038bb8bbc4096d37814d69c0f4454f6db97ae503eea9a9cc43478efea323c9b92d56f36bd9936f7e6eeeaaf2c1b64402ee767b98b99e9d2710f618982a35c40ef6f51ceb686fbdc79e98e8dd5bb3ef3bf19684885fefb8da4743d509e654f46ecb0e85577b9dbc0e814810087b03a6de578aaa97fe9cd20dd2f756d73cab2dd13ab4148755fd91f034700e086c3181b036608a7dc58cbb46ab7ababb8e29d8edaddcbdf741f5be366d738e2d76af385d0410789340581b30a54e24b6b55c7def9ccf97a232cc8daae0d0b2d5960cf104218040e40884b50153a9e8bcbedeeedb53d3d2bc7babebbeaba0f7969e798c9cdbc89920b03305c2d680699160dc607fef6193f7959b97df985750fc7c5c7c02bb59efcce78eab46202802616bc0fcfeb9d4f68ed6bb63e262978b4a4a9f8c4f487007e50af8100410d8b102616bc0e6e67c69bed9d902c5beda8a8a77fd48338f733b569d0b470081a00884a5015b5a5a88ebebe93c3e3434549099997525c999d24bea4450ee1f1f82c08e16084b03b6e09f4fea50adfbc5a5c598c2a292e7557162db24aeeee8a7878b4760930542de8029f33e7a627cac7cdc3556575c5cd2f9eaa26dd590dfe4ebe6f00820b00d0442df8005962ceded2d777867bc99f9f9054d968404ef3670e312104020020442de8069930bc7d0e0e0b1d898d8e59cdcbc73b131716cf81a01379e5340603b0884bc01f3f96633dc6e77617a7a66bf868faf44fa2edbdbe1a6720d08ec14819036604a5eb57677759c9c76bb334acbca9fb3db1da33b0596eb440081d00b84b41e986ac45b27c65d7b545e26da9992d217131bbb45ebdd87fe4670849d2710080462b4f3cb1b9bbf2cebfb1192aa2c5a839cb01458b22e0702167330b393bc26d2fcfa3baf636ee909b5903660cabe4f76b9c66a535253c7b5d763a3e26014fadb79df53aef87501538d458d9665617e3ed9ebf51674b6b71644ad04e2cd767c367be2987b727cd866b34fa8baaf4f450e36d4b02c2d2dc62f2d2edab4e37d7e5b6b53fdd8e8c83e6db89c14a3bd1a12b40a263b37efbcd97f55ffee5107633626366e419b496fe8989b71a343da8029f33e636a723a57e9138d4e676ab790b61cd066dc148eb97d04d46045abe76355e3913c3c3850d1dbd3754b5f6fdf4d6363a3bb7cb3bea4c5059f26e61396555eca9792923a98919979597b2abce81a1dba644f748c242458bd8a1baffa875f8d64dcbc2a1e77b4b79ce86a6f7ff7c040fffe99196ffafcbc3f5e9b2dabbd5c8a0d049663ed36dbc79d29a9c37985f9e7d5c1e8cacecebd32ee1ae952033a6951815195b9da12936d216bc0cce2edd6e6a63295ce71646767375812acd3dbe7b1e44a10786701d3db5af0fb93c64687cb8787068ef5f5f6be6b6478a4c2e7f325c6c5c5cda8a1185183d56e898fd1ee82f3c91eaf27b3bbbbabb4b5b5a5c262397d4f4646c6707a46667745e5ee47478707cea9f067b729597eada3ea78b1ea71d95da32395172f9efba59696e6db663c5e5b41416163d5eebd3fcecece698a8fb7f8545034697272a268746464eff8b86bd7c50be7ef52231b6fb55967d3d3d20773f3f21ab5d4efd4e8c840a362d62ef31ef508fdea9d456495e19035608a7fd94647876b551f7e393d33b3393626664bb4e87c3111d8a8c0c2c2bcdd14ee6cb874f117fb7a7b8e7b3c9e2c0d13e77272f31b8e1c3df698aab19cb7d9ed13fa6f1ab6c5fa971697ac3e6d86ecd126cf93e3aeca9191e1fdc34383d56dcdcd37343534dc545858d85fb7ffc0f7265d238f2625a70ce83b35a7d1ccabf1320d15b50fa9dfa14a2fb557af5ef9e9f6b6b65b947399a486abe1c4895b7e50565ea1c9b3c4090d49fdd1d151a61316b3bc1c50abe9b76b03e68c8181defd830303fb868707f74e4c4e16f60ff4df73fefcb9f73b1c0e8fc391e4d2e75c2e2c2a3e3f34d8dbaa6d0f27d55bf4a833e25583b6ea5ee1463ddfe9fd21db3dda333d95f3f0bffce02b1aeb67dffbc19ff995ecdcfccba1bc103e1b81cd1650cea36576c69bdfddd5fe531d6dedf7689858a2c9ab9e9c9cbcf3a565154f666665359b219a7a34d7eccd68e54acce2e262a2c73d55a046e9d0a50be73f3c3931be3b2a6ac5a2c6a4797775cd3fe4e6159c53cf6846bd2ecbe884ab4acbf46eefe9ec3ca986322d2d2dbd4bdbfb3db46f5ffd834949cee1773a96f1323b84a9e7669d9b9f734e4f4de6f5f7f7ee371593d53b2b55018654bd245eb1eb18b37f85d3e91ccbccca6e2f2faf7a32afa0f0b47a689b3eaa0a590f4cbbf3a44d4c4c14aa2bdca79be6daec878be347ae80998dd317d4a4f4ac68666c4beea7b9e09f734c8c8feebd70eef46f7576761e7426a7f61d3e7aec7f9696963fa98d8e4714a45fd50a94d783f7e6b5cd9a3d6c2bada87ada6c8273e1dc994fb4b6b61e6a6ebe5a9f9a9a36959c9c3ca6ded04cf7f050b98684a9b604dbd4fefdf5df3f71f2d6bf4d4d4bef531c6b55b5f65e2faa602ac398bf23ead15d3e70f0e883ea9da5fb7c33a94a812a50dcee86f1f1f15235ac96d191e1b295e5953b93939d037afdf66cc0024b4bb19d6d4d95cb4bf3ce5467d258823561d32f3472bfbe3befccf47cc40496039665f520b4b94b767f5f77a1e2402936bb6d626ad2d56fb5d9c74d0f632bcc8a2954a2a0b92fa3bdadf5ce2b8d8d9f9cf64c6757edae79b8fec0c12f2b48deb3da86e4ed9e0205ef4d633eac86eca1dc82e2734d572ebff7dcd9333fdd3f30b0373030906eb3d9e6939292878f1fb9e187870e1ffd6e764e6eeb6a1bca6b3d753237c734fb5498bfddfa7b413db16714d376e8ff8e5e5e59895d595e8e55a72422aa2987a407b6b21288d378be78797925d6999ad665c6fa3bef6b7aed2b560c42a938a1c9f9895467355a714b81c5043554ce81819eb2bebeee9b4c8a8d77da5ba0e14bbafedd6a46348a0d8de7e4e45e52e0f99fbddee94be68b1229f19637dbaaca4ae2e484abe26a53e3c7bababaee302910478e1cfbcb5da5658f297e34a4585550f2ba5e6fc8fa15ebfa6a75edfe7f566e6589be5fb98a6745e715145c311b295b6d896e4d0e04e5786fbe4e5dd7acfe9bf91b717f42d280694890303ded2e51c3b5a4317373744c6c44ce6084f36e98fd30fd0bf34ecd02a569a861f74c4fbaf56be98a8d8d9f8f898909c98317ceebbbd6b1f4a5b39a69fdaeced6033dbddd27c65daebd26b6b21215d0e311e74f4c4c1acdcacebe64b5da26356cc99e9e9e2e1a1c1c38a018cc1ec573daf756d73e30e3f55c7e2de81d396938ba8fc9fd7d3db79c3d73e6d74dbc284375ee8e1e3bfe85fcfcc253ca8bb8e66ce146ee897a73e67b34fc6aaf6c6949f1eb952835eedbf6d9598d55481a300533ed6ef754a9c6e8be648a1746c923616a72bca4a5b9e14303037db7cfcfcfa7e6695f80da7d07be929e917b315cbf6e66aa5dbdbf78c539124c42a5e6a4a2a2a36396f5cbed57ec653e5853e50a0a5bcccc98d6c166365cbe70f3c8f0e011cdaced5d5858b068c83362e24225a5a53f4e4e4ee94fb02428cf297e2e265aa3ca95e557530ff4ec947475b6dda1b482db9f7ae2d1ffbfa2b2eac97dfb0f7e53c3985ee5276d7a25dff9b9d9d4ae8ed6f75dbe74f157c7c6c7732a2a2a1f3f74f8d85f29f6d421cbb0fc5887aab7b59a4623925e1392066cdee74b53f02f5fdd68b77e592362acbc59e8669a7b70a0e7c073cf3ef9bbbdbdddc7f5b369b1db6d6a47967234ad9d70e0d08d7facd7b4867298a42f7ec2dcbc2f6da0bfbb6c686860bf6ab355aab793b9bcbcacc4ece88082c27d2525a52f4dbb27cedb1393c6147f5af397d004e2350cb498e3a8f139d4dddd79876b6cac46b3d0e9995999edf5f587fe5e335767f44c0c9b44c9571bcdb70fd8fbf459639999d9cd15957b1e514ed32f2b19f34605aaebca2baafe593b5b3da2d9af310dcfd67c8ec17806e6e77c29dd9dedefbd70fedce7746dcee3c76ff842d5eeea071d4949433b2d2c100ccf8d7e46d01b30958f8eedefee2854f66fa66219a7cdb2888d9ee4567ebf594ef5e2f3cf7ef685e79fbb333333d373e8d0e16794577361da3d75606868f0485a77c7dd7babf70de91a27837d9d665a7f4ed5403a3a9a8f35375fb977647868b77a41f1faf2fb62a2a3350a598a33c3d7c181beda96e6a6bb745e4df5f587bfe9f379cf2624d8a6af37643359e6ead55935e39ca245fb351afa1d54e2e6418f67ba305a4bfc9234535553b7ffef35fd7f4ab356fdca1f5a55ef49634b332c3241e48b4a4bf883c1c1bee3972f5df8f4d933a77e5dd7705cbdb1fbd52837aa3716d667cbf4bcdadb9a3f78eecce9df5042d5ca818387feb6a676ffb7140ad8d13fd2c17e6ed7f279416fc09603cb716608e0f7fb2dced4d49e9dbc7987998d1d1cec29efede9399a929ae6b9f5b63bbf527fe0f0f734adee52f0b76ecce5fae2c8c8d00da5e5553f086603a659ab380ddfb2fafbba6a2f5d3aff493528d96a14668bd5cb2a2c2c7e392323ab4d719a57cb7a6bc8e670b9462bbbbb3b6ed39677bb5f79e5f9df2c2a2a79a9b4acf209afd7dd6d1a323572a6b7f35aac656525c6cc442d2efa13c75dc3f9bd3d7dc78706078e8e8d8dedd6cc625c5a5aea8002f00fe8335e713a53fa12131d2efd88ad7b124756139abe7f5231a6e6ab571a7e4e3dbbf79e7ae5853fa9db77e06fe6e6669f37c9956b79e0d7fb5adfac37b3bdb5f9fd9a05fc7533143e72f4f85feda9aefd8e664c99615f2f6a10de17fc066c6539deef9f4fd1e3beac7847afbad5eb7e7883707d9bfa11ea8ddaba3ada6ed778d17eecd80d4f1f3d7ee2cb0a5a8f69d816ad8cea4e67b2b3570d7df2e2c28299a20eca1f05cc93c7c7c72aaf365dfe787f7fff6193835753bdefbb25bbca7ee470249bc4c6b937c7ba34846d2aafd8f3cce8c8506dd395860fb7b6b4ded9dbdd73322d3dbd53499817d4888cc6c5c6fab5a781d5c4a8ccf05333887b464747cbbd5e5f5a82c532ab6295cd9555558f1714169d49d4c264cd9ccdabd10ccada572d3636cf50a77a935f34c1f2e6ab8d9f3c7ff6d46fabf13fa400ffdf68898dd22e4297193ee79b496f696ebcefdc99339f5b5a0aac2865e14b557baa1fa0f10aca23bba10f097e03a675559ae6add1a2d4690535dbb7caa2d00d295ee3cd6ef76489a6d83facc5ecfdb575f50f9af8d21b0b73f5a59856afac453b351d560367d9e8f1cd70518987b9cd4d97dfd7d6d6f241b360779782e57bf6d4fc8319bee94b7ecd8d545e6fd026351c7c212727bf414bc06aae3635fcb402ef35dddddd8714943741ff38e57e04343133eb48744c38921c2ed3cb4a4bcb6ccb2f28bca005c17dfa37b3c42464b1290dd5dc9a1c785833db0d571a2e7ea6adb5f9035ecf4cfe818387bfa0736c56e31cf4e52d0a012429607ff785f367ff83df6f7a5ec7fe5ac3e2ffad73094bcf6fa3cfc5767f7ff01bb095650d2f1693ad56ab4fddfbb1ed0e78adebd310cb72a5e1fc3105ca9d8a053ea3757017141cffd72fd8ab29040ec790ea312d6a2670435f7a7da9edeea9890acdf87d5a71b5c3eaa534d5d4ecfbba16035fb12a437bb575a65e8f794d2936f692297fa480759a7a5a95664f4fb3e038362e76d1cc22aab288191a2ad81fef5383351f6f597db5848d3e0f9a00306b6adba7a7a7be204faf163f7ff085e767fefba14347ff5c8df80bfa6f41ebf16b4d63e2c8d0c0f1c6868bbfaa9eb25531afafecadd9f76d1aaf8ddec5e0bd3fe80d58602990b0e05f48b4582c73a6ee50f04e756b7d92865ac95ac8fbeea4e424efaeb28ac7df5c8d56a348d565b24ec7c5c6a9018b5ed750cb543c50e392d1d7db758302449fd05ab8ecd2d28a1f2a36f36df5bafad63bb3a91942733ee6de99bf5d6ad06257f4c3a4c0fc4a744cf472242cf751233aa000ffdfe85c7c57af367deccce997ffeb8d965b7e578dd8c5603462fa014ad082ecbab3675ef96d3393aa7cb47fd482eaaf3b9292a92a1c415fc5a0376026b86b1215b588d5bd932bb02a1695313b335b54a0252059d9f9e7df92bfa4ca008b8b4b7653cceef520f99a1e0b53aedb0c519b1a1b7e41a91127146c9f387ce4863fd34ca202dbf6a0fe70a84133cb4b226e8da2990cd1b3767f527272bf2a3ffc9a1ab1ffb66fff812fcafe45a5efac7bef5193fa323e365c6fe26cc3c3c3655a16f48d7dfb0fddef48728eace926f1e2900b04b526be995657bda34cfd4dd30af6a5f5f62c427ed5213e805936a359c042658f0714877a4a5fa689b71e323a4ac1fb14135732c9a46b39250d1913c7c6468e9c3bf3f21f9a21545656ceb99b4edcf23bda77e0b160375e6b39afcd78adae775a33a60f2b0ef6974a10769c3ef5d21f7475b6bf4fc3dfe4f59e8fd733557ae1fce9dfeaeaec3c5a5e5ef17475cdfe6fd278ad5733b4ef0b6a0fcc0c33148b29d71738510bb8bd1b8ded84f6d243f7e9ca28b7a8be53a96a2af915a8ef3271aeb7399a296514a774a27825b4aefa8fd9e57c6c74e85853e3e55f9b724f155557d77c6f6f4dddd795d5ae19dfedbb24e99d80f403e1d5ccf7e3a6c7af06ecf7f4f777cdda4a35620f6aa6d0e493adfa8f72e0d22f9c7de55734fcbf41f7aefdf0d11bff42c3465379813f112810d4064ca573139403b64b719268d522ea53c2e4aa4a7a44a0cb864e49abf5d503f39528f5401b292c272a772af62d1fa87c2a05bfe7f46ff1ffb6afc3b50f6b6a9c6b6894d9dbd379735757c74734e3367be8f0f13fce2f287aced498dad0096f83372b9ee853cff419a5edf84fbdf2e2ef2bf1f5b3662993d22cbeb1dab89582f6d6cef696bb348bfb7e2d811b3872eca6bf504589ee50ceac6e03fa4dbd84a03660a6448aeae0e79afc1fc52594c41abb63abb06af6d112585e369b2a5425a7a45ed25dfe77abf9559d3c46b1a5452585aab9bf76105fc3f258c5bb925ca3c37bbbbadade3f38387852f95c83b575b5ff2b332be7bc02d63bf247e2edbe359aa19c5323f6c20d3127fedf33a75ff92fe7ce9df98c664e17142bfc27cd9ef65d6f65812946d87cb5e1e31a8ac62ae1f81b45c5a5cfaaf10adaace6a67ed3b7e9c183da80452b575b29148e68a50824a7a47568ffa635c576b68bb1e9052857e9c70aaedf31ed71d73b67d3cf6a48d3f4ef7ba4d12a07bce4888b8a8d56b96db575cb0a87fddb1050bd5955e65c704c8c8d5476b4b5dcdbdede768f32c0ad5a0ff870cdbefddf508e9d593fc997eb4d0f8da9bf25b7174fda6c93674fbff8fb0d97cf7d667e6e26af6effa1ffa57bd06f4a9cbfdd73a69a5ec917cf9ff9707fff70a582f67fbfa77affb7f55911594266bb7c4f82711d416dc014fb8935b5f0f5c59ad31067e6d57a1f3bf08fd9044125b52f6564649e52a9955ad545fbc5925de55f53fcaa5b551fbcea72ada8b44e8232da0b15ffb22a989fbcf25a32ebab3d567dd1e295949ae51a193e78e1dcd9cf29a174b7d6118ed7edabbf7f6fedbeef9a0a9f3b35deb59ac7c9a45168c8dd78ec86937ff8d28b3ffa7c4747dbfbd5cb0dd41f38f63ff4feb7e4269a923f2a8d73a3d978635769e90b4a99f8aee26a2c115a0df626bf26b80d98b2f0cde6999604cbac451535b56466473660e69e2aeb7ea0b26aef5f2bb9f4ff19e8ef3ba97586e55a96f3485e7ed153aa2f3ea20073b686dbd9eab1da34f1b1473396c3aa31356b82cf83fd3dfb5aae36fdacd61756eb8bb7a0ccefaf55eedef3505a7a46bb32ea57559a78939fab4d3fbca92caa3cb99663c74ffeb7975f7aee4fd488bd4755373ab402e29f6d76c7f81b276866ceb52e55b38e673f67361d3b7ce4f817d4bbeddcf40be004562510d4064cbf7a56ed006cd3af97c7049957139c5ed5596ec117996450b3bc4553f09f5779998ff6f474fe547757e7efa4a767fc4c5e7ec1f3b3b3defc81c1fe6aefe474aa66223f31d0d7776451e917a6a0dfd4d464a1e9c51614153da7e4c96f9aaa0e0ad4d370adf1393009b76ac42e1f3d76d31f9d39f5e21f5cba78eed7cc0f86868bdfb25a5f5b84add9e21cfdc8fcb27aca45478fddf0052d746f79bd4efc1a8fc6cb374320b80d981e0eb34554b233715c5fc0b0963ad90cbceb1d538db849febcacde569f96f59cbe7ce9fcafba5cae522547fed2ac6fc6e999f6d826c727a38647c76e517588635a9ae3d702eafeb2b28a27b4b3cc03a6c7a5866b4d6900d73ba79df6ef26706fb2f30f1c3af6e7afbcf8dc9f363735fe7c7a46d615ad713ca72ab9b696e6abf76aa38cf7e5e7179caeacdcf39066869914d9420f49501b30e5e224fb9564a92f6eaf9981244ef3da93a05c24ad2f5c7c48b38667559df498cab27cb8a3b3fd3619c56bc9cf6c764e4e5756764e675171c94b6abc9e494e49e9d35e7ec46082f445323131cde49e362b152e5d38fb1b972e9cf94f2afdfc63c53a3c972e9effb47ac08b353575dfd5307ec7a7a304893c6c1f13b4064c5fd0989e8ed674535f4ab36a4b6abc825e19206c2a2138d0ebb944fdea0da8067c4ea37642f68f8e8ed41417957ebf72f7de1f689a7f48bffe3e7dd9766cea4908d8fff523b5946b5e9328cf9a72e7172f9cf90de58afd675345767e21b0ac6ab15f553edd2beaad6d68517d28cf9fcf7e7b81a035604ac88c3675d0350ba9cc72d378ad6f81f276bf51a637a0188c2b37b7a0417118dffefd87be65773806226181f476b7d74cae6f66c6f3ccc8f0704d4f77cf67552f2d4dd5252eeed95bf34f9a1ca1aaea167c0082b816323aca6c81a58426fdafcda58ac23b7606f27acf81b2f3ad0a2e679acd4915fb32a59b236ea1f4f5ae61abfebb928027ccfa54fd90b814d08fd23d1834658182557c71abba6cd5f30e6203a6496865956bf9cca229a3a35d661842becd53611256b524285b659ecbd5e06befc0f855d589dfaa0f58a49db70975e8af4de715a71fda286d165265fe9a0a149176ae9ccff50582d68099c6cb6cd5a52cf465b391c74ead44713d72f5bc6ca32383b7688d5eb6d6e8b52a564836fdf5d082f8ef0ae627f7f674df6aaaa6d8edf665ffbc3f53955d3fa21f9492201e868f0a9340301bb068f52eb435b0a979f7139b4084e942b6ca61b4e146924ae11c5f5200d96ab38d32531bbe3b673659518e5dd540ffc0cd490ea74f556b4f95969636a800419dd22b7e55f1b1bcf09d0d470a8640d0bacdea71ad6859ccb2897ca937b6860231c1b88cadf3192ac09733e3f51669f838aa697ca6edc378eb340399d4dfdb7bab966e6554d7d43eb4ffc0a1fb15ab8d56e58adfd49e9def5111ce41a5027d5d952ddc613c2d0eb50181a0f5c0cc3968f868e25eaa26f35a4f6c03e7b52ddfaa388b657ada5da98cfb44ad93bca4068c5caf30de69afd753d4d3ddf51ee57bb9f754d73ca07a5fada969194db575fbff679236a6d5de961f99708d1d312b4ac2785a1c6a0302416bc04ccccbfc558c274e5983761313dbc0796dcbb72a46689b9a9c386476a5d6a6192faa1e3e59df61bad3ca014becebe9ba53c3c5c2dcbcfc97d3d233af9858ad2947a4fffbb236a8fdebc585c5849696a6cfa8ac4e89996c09d3a971980d0804ad9131c346a550c4aa7711af2e7a120dd85befcab202f8dab1bcdc64806b579f7e5510257d62030fef5ade3aa73d0ab401ef6d66ebb7f28aca7fd1ea88718d185e4df5d1fdf069a1fd0bc94e67537f5fef41ed547e97869bceb57c3eafdd1c81a035602606a6ea13cbafd7b68a373b386fce2545e651b5f7a3f60b98cdf7cdcde46ba7a27eedda44e264986e951a23ebf0e0c009efacb7b07277e523da76ae41795fffeec743f9786e25b47e392333bdabe9cae5cf0ef4f7dcada4ec0defd719a64bdcb187096a23a320be02f9d1ea7cad985aef6f2da3bc639955e32b10b04e4f4feed5fe82a95a36d4a6a545ebde35670733aeebd2cd4ef12a2e79ab7e347c5a32f4bc9615bd6581bc4926d6e2f9466d10f2bf4d46635f6ff707e7e666b3d77540de143681203760afc6c15654d8309e06ecdfdfc3a5a50587d2276e36731c0a1e5fd0178604d6303ce6a624b77b7272cfc4f8786d5a5a7a937612bf72adfd32b511f3545151e9235ae8fd8c6265a58303fd779a5dc9c3709a1c629d02c16cc056f4a55c505c6749a91426b84010f4276e8aeaac67eb4b51ad2fc990363c6927feb5ce27768d6fd3a49275746cf82605e5e30b0a8b9f54eccbf54e1fa1dc3c970a517ec5e974760ff4f77ed037375bb0c643f2f2300a04af0153cf4b333a9ad589f76b7b3562603f7113cdb4bcc73355a54a1d492a687856051fdf52d6388cf77c471d4ab38fe9eea9a9fd29a9a93dd939b9a7f58cbe63cfd7d40f4b494d6faeda5df325f5de127a7bba3ea2a55f693b0a6d0b5d6cd01a3075cb57cc0c8ffe775e35e02d0c21ffed29300994a3234337ebcb6166bb9e93119b4584e14b62f2ee5469f5a07abff97979f92faaf7bbaa1f0e935a919e9e79212b2bfb946625ef56c9ef03fa2c869261b8676b3d44d01a307360e5d5cc29c769c1fc72a91716b42cffb55e5424bdded49cd2129512976becb08627434e67da55ea4e85e70e691631716c74f876b35c2b2333fb829ecd55c71d35d4741716953c6836035129f04fa9f47419b961e1b96f6b394a701b302568c6ab01334348f5c2b4612b7f969797ac5393e3b59e69778e960ff568068cf489303c1666b30e2ddc4ef77abd155ab43d9ce870f49942036b39b472f5fa3233b3ce4d4e8ed78f8e0edfa912d48eb5bc9fd7865e20a80d980a192e9bdda6f5c71913134d754bdd3f7d899c7d7dddef595c5c8acacaca31d9f7abee0584fef66fdf23981fd19191a1135abcbd2b3b3be7596bc2dae38efab1992e2ad9f50fa6ec916624dfaf24e40a93cfb77dd5b6de9505b5015372e08216c29a1c1b95d659def13103b3ac4a7b3f166b0d5eb952273ab5e3cd256dac4ac31e86ef89d9decf333d5dad78d68c3325ad51cfe69a3799d19033909ce46c532fecc75a849fe51a1bbd5d9bd690a11f86fbb7da4304b50153ac61c99e6877991898095ceff45f2bb31c6568c8e4122d590b0b8b9ed65e91c3abbd31bc6e63025a8feb54da4a8d43e5ba357cd486c2ebab7aab6546eedcbc828735bbee568fee1e25b7162b1616d4efcdc6ae7467bf3ba837225a0d9823d1316c726ee6e7e63277f24ca47a5fb1b30adef7f5f5dca3c285fd8545bb1e63abb9f07cd94cdd2fafc753eef1780a9d29a94da6115aef9195afb7a258586f4a4a6aa3a966a18d586ed38c24b1b0f58206f97dc16dc0a26302fab2f6a90716e7f54e97aaaece8e9d8954ef2b7970b0efddfa1265e5e6e63f9d9494d24df1c2203fbdd7f83813fff27aa62bb424244a797717365af543c3508faa873caed2617363a323b7fae7e733c373251ce57a02416dc04c1d7ced22dda7076859c1d3bd260bfa7a27b01dfffdf5d4895d8383fd77690833a8e9f847f4256067ed30ddec57d79d7adcb5f6c4c451a733a555e93d1b2adbadf7cfeb739a349bd9ab7a6e65fabbdbf4f2c274391ce61d0482da8029ceb0aceef6b01a32ffb47baa726161679624d1cc638aaa19dca307bdb0a0a0f831952fa6f715a6afa182f7d1be395feeb8cb5567b3db864dd9ee601c5a93532e7ba2a34335f453c65d63b72e2e2da604e373f98c8d0904b50133a7a278c38c1a329fca26e7fae7e7b2765a205fbdce9899594ff1f0f0e0adca3bf2aafac193fa0527f37e63cfe9aadf6d7afdaed19123131313c59678cb687c5c7c507abe66a779ed623464e2bbcae9ab3765a9577d52bc306402416fc034f53c9f9b9b7369da3395e6f1b89537b3b3e26026f6d5dadafad1d1b189d25da5950fa4a6665c7da3705ec8ee221ffcaf02da2cc56a4ae728592ba0ea13176262e382b2d3b926a816b58675303636daeff3cd146b36b240cf36c3c84d7ef642d080c5cfa5a5655cd52f5f6076d65bb9b21cd83145e1b474254e53f77bf4057a97aa19f41417973e64f29036f91eefa8c39b19c2d9d9d902adcb9d4a4e49697b73e1c2f56228493b9060b58ea968a74fa111bb36c5a5eaf07a3183f8bea037609a765e48cfc86a5200d5a399a0bdbad13b26f14f85f332bbba3a3eaac5c3c9bb76953da0a9f776661e83f8b45ee7a3cce4c99ccf97a3bf1949c9c9bd498ee4be601d5d0da18a1558c735a3e9d6331d6df21c55db8dacfc6001aff37382de809972240a760e2726268e6926b254dded0213175ae7f96d99b72d2cf813c7c7478f8e8c0cdfaa2a060dea7d3dae7820cb86c278074d01016d50bb4b3d2465f324776b595b50e25f6f5c82e9d5e933ddfaff03a6ecf08a8aa887f1f238d4db0884a461d1b06956b3913d931313599313ae439a72ded6e914266955498e156d6dad9fd122f698f2f28a6f3b1c49033c71e11530cb87dc5393d54b81a5044762d280591912cc33d0e4d47c5c5cecbc266566f48c4fabf55ad3e2f0609e0b9ff59a40a81ab0190d235fd1502a4ae54c8e2d2efab7f530d20c93b560fbc3aa3d559d9b9bf7747676ee4b5a7ac2966961fe96a9e1b2badd137b14685742b563500d5850777d52626c6c60299060898ff7da4c514ab3910d7f365520240d585cbcc59f975ff4bcaa60f64f4e4e54a8a265eea65e65080f6e76aed1aa83cac1c181bbd5ebeaadacdcfd772a9c1794dca3109ef6b6fc6855bc4dd1ca877ca54fcc68043064aaa304f34215e34c9b999dc93649c916ab75dcec831acccfe7b3d62e109206cc9c86e26023da40f4a5d99999746d145ab65d773bd6747a6e7f7fef075442c85e5050f843656cb72be0cb83bdf6677143ef3009acaa1891a1007eaa7abf330ab84faa0716b4fb602608b42d5eaecfe74bd150725ac17c5f303f7f4317bf83df1cb206cc6c1b565555fd1dcd4a2e6a7384fb66555266bb39cfcffb5295b0faae9e9eeef76ae8f8a3f2f2aaff633649dd6ed7b915ae473b6169f1bcd76cc06151f6fdb82693823a843713044ace2e50b8c0a609aa1e3562242747c08311ca066cd966778c685835a83a4ab51eafbb565b8b6d9b60be661d6dde6977757777e727cd35aaf1fa86dd9e48b99c4d7aa8d5c0c46ad3e0ec79bf2f393636662e26366643eb1fdf7c1966b779fd589d88d1e6a7dad7b3c5acfbdda44be5b03f2110b206cc1cc392609dd642e647e7fdf3b1e36323776915ffb6d82854c361fd1a7b2a3b3a5a3fab8d6a93caca2afe4ec9bb66b7e7a00d59784ad726604a37698897a3358a7126e154f722683d30530b5fe919a5dad7a05ebdbb4915a7bcaaccfca036906bbb5a5efd8640681b30e54195ecaaf8be4a9a346b53d7c3eea9f1e3ea856df94aadf373bebcce8e965f19191939585252f61d95cb79d6ecfacc63b57902668650f95fc95acab6989c9cd211cc21a46ae15bc75d230714ffca484d4d6b329335c1caf0df3cb1ed71e490366086c866b78f96ec2aff8ecafbda06077a3fae2fff2ee54d6dd9044013f7eaea6affa8e25e3f959cecbc5a5c5cf280868eefb859eaf6785422fb2a4c0c4c6718affcaf29ad80e850803d683d242d892be8e868bb4f8de44a4161d1930956db78646bec9cb30b7903161f9fb0909d93ffbcdd91d4a72cf5eaa1819e5f98f3cd166f4562936d3f323c78b2a5b9e9e39a851a2f2bafbc3f3131a9772b5ecb763c67f582fd898ec4290d21ddea810525074ca9130efd60dd3b30d05fa7b4a0b6bcbc82e799a8899ca727e40dd8abbd306de75e59b9e77ecde02cf6f676df33e11a79cf827f2e397218ae7f26dae139d1353a7cc3d5a686ffa45ff7c5eada7d7f99939bff92d9f8e1faefe615a116303959aa16e151118195a895e024689b58e7e4c4d8be8eb6d68f6a19d17c4dedbefb1d8ee4fe505f0b9fbf7a81b034604a6c5dc82f287e2a2525edac8afc254f4ebaee98764f1ed603b225f68e5c5a5cb04c4d4dd45ebc78ee77b44d7d415959e5f754a8f069f385593d35af0ca580660503ea8179b53a3141cf95537f37f46c9b7d25b5996dfe95c6cb9f9d9c9ccc2b2d2d7fb4a8a8e469ad8524d619ca1bb9c6cfded04d5ecbb1b4238f6bffc1237f949c92dad0ddd3b5bf7fa0fb53b3b39ecab57cc666bcd6ac7354767765c3e58bff65dc355e59585cfa486959c5f794a84b1c64336ec8b58ea91e98253e61d26ab1ce2ae5215589adb68d9c9e6fd65bd8d6daf4e9c181be13959555cfd41f38fc05c5be2636f299bc37f802616bc0cca96b638b1e25b7fe8dd56a9d5059de23c343fd3f37a700e9728406f5f52bfceaee36cd571b7f6d7878f8505171c9737bab6bbfec487206ad4c4bf06fe9cefc44b3705ba914cb9e694f9e525bb234a45cf744d1cc8c27b7bbabed1383fd7df7aa2cd2a9bdd5755fd23def62e631f29eadb036600a7ece6767e7bf52545cfa5d2dbd89521ed5cff4f7767e5a257776451a8d2a68c4695bb4b2d696a6cf0d0f0f9dd032a1e71503f9a299e122df2bd2eed6abe7b3a26aacd1536eb7434b8a4cbee1ba1a3065f3e7b4b75efd6c7757e747b5255b47edbe039f5761820b5aff1894caae1129b7854f2aecdb9e596df6298f67ea1f557ea6b8a7bbf3fd9dedadf7c96f593db1afd812930623c152c3c678252e56b5b7367f56b34fb7e6e7173c5b5eb9fbcb69a9e9cd9add0a6a899648b8deed700edaf26c45017c8f625f2bea35e79bcd95755d6baa07a61fd2ccaef6d68f7776b4fdac7ea8baf7d6ecfbff92929cadf12c0f8bd84724ec0d9891d04c4edf9ebdfbfe4a951cac1323c377f77677dca7ca016ac3dcdfb3da1d4a128cdbb432254b8b8b09dab461775b6bf3af2bede348764eee4b15957bfe36352dbd899e57c43ec75166e7edb1d1a14ecd0abbc7c646eb94bb651ab1095349f57a676d7adb1a3616b7365ff9f9aecef6fbccd2b0ea9a7d7fa6d5159734014551caeb016ee2bf6f4a036636b9d0c3d55d5b77f0cfae04ce5a945b756b63e3c55f9e99f5669795effe92329fbb6255533fdc2e4a9570b85ca307952af1db6eb7bb322f2fffd9aadd7bbfe84c496ba1f10af7dd58fbf1cc5a540dfb5a0707fa4ff4f674bd5b397a3dfa94e96b7d921aaef879ff5ce6f0f040ad868d9f1a1d19a94f4d4f6fafababffb38cac9cd3345e6bbf07e17ec7a63460e6224d83a099a29eea7d073f1f131fe7eee9eabcb7b5f5ea4ffb952c5a5ebefb6bda5bf14ab8baeea6148ba9f5a48d684f365d69fcad99196f567979e503a565e5df49d1b091baf6e17e2cd7773cabd53e595b5b7fbf6f6626473da97b957f38a89ed8a38abd4e2b86b5ace165b4f65cb604960356d50e4b1f1d1ddcd5d9d1fe0bd3d353558af92f55eedef3bde292d2079dceb466b399edface82778553605d81ce609ea05ab11875df0b9a9b2e7fa2a3ade523aaaae950cfa7adb2aafa4b9959b92f6beada15acaceab73b6f6dce90a0e54dd9aae975e795c686ffa8f56eceddbbf77c778f661b15ffe8a7f10ae6dd0efd67e98728b1b7a7f3b6864b17fe83d9644599f317140678d90c0b17b4e59dd7e3aed2ce51d52625467b36a4a5a6a67a55b7ee8cc2047fef74a6b65a54f79e6df0427f9f8275844d6fc0deb810bf32f35d6323fb1b2f9fffdcd4e4c441ada19ccdc8ccba505656f5cd94b4f4868484576b3c5d379eb11a18d3e3321ba0ea5738d5353eb6bfbbabe34303fdfd27f54b3d595357f7252dd07e2cd1914455d5d56046e06bd47b4f70bb27cb3ada5b3fd0dfdf779beeb7d504f5353be9d482ef046b42823f2333b3d7346cbb4a2b7ea81d407a4d0144266822f0665ee79422a60133e7a9007abcea86157577b67eb0a7a7f33e2d00cf535c63aaa0a0e8f9d2f2aa6f2b93bf598d8c7bbdf131b34bb8e21e36a570642aee76acbfb7e7ddddbd3db7a8c653744e6eeef9aaddd55fd5aff1691dd3bdf56e2567fc660195324f545a44ae1a2da76618f3b406374b75ec0329ced4ae64674ab729f764ca43af26d08f6e640a445403f606911e3ca76b6cb8bea5b9f1639ad2be53b3957695e41953ddad479543f6907e317bf4e079d490f9b4846449555fafd933334b424c354d4d0c24fa667db9da64e4504f4fd77bd5e33a3633339390999ddd5a59b5fbfba5a5158f243b9dbdaa244b9a44643eab1b3a2bf5b8e34cc91d931d66d6b26a9848edb60d8946c69b23b201333466098f6253e99a213ad8dadc74dfc8c8d08db13131166752f28423296950359fdad2d2332e262627f799eebfa6cfe7940b14306555ccd666e633f4ff2ffbe6667334544c53ea7f7d5f6fdfbb8686062b555522460d624fc9aeb2476aeaf6ff1fc5474654c18012c191f14c721608ac5a20621bb037aee0f5862c6d6c6c78fff040ff8dea41dda86548bb352c8857c33597906099d502db592531ce9aad4655f0428b7997ac664bad98d8f87955e9cc542f2d56ffddbeb814585163d5bfabb4ec31cd383da461449f8de1e2aa1f165e8840a409447c03f66f0d99895f2dda15c7c8181aec3b363632543f3b3b93abea10a56acc124ddda6f9b939fdaf5ff554a2a2559960c16e4f9ad2b070548dd698feb73b2333bb212b3bf7a2766d1ed48a809948bb199c0f0208ac4d60cb34603f79592601513d338bd9f15b0d5792868466fd5b9aba5ba94ac3b02828aba926dbb4caddb84dd508c5b5fc665765fd77bf626741abd4b9366a5e8d0002c116d8920dd8db21988d17348254ecebb5787e2873c7827d13f83c0410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400081cd15f8bf2b1d52504cecfbce0000000049454e44ae426082, NULL, '2021-08-02', '2021-08-02', '1234', 0, NULL);

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
,`access_level` int(1)
,`e_signature` blob
,`pic` blob
,`date_submitted` date
,`date_verified` date
,`verified_status` varchar(20)
,`password` varchar(255)
,`office_id` int(11)
,`office_name` varchar(50)
,`dept_id` int(11)
,`dept_name` varchar(50)
,`type` varchar(50)
,`position` varchar(50)
,`patinfo_status` int(11)
,`license_number` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Student_id` varchar(10) NOT NULL,
  `course_id` int(11) NOT NULL,
  `reg_id` int(11) NOT NULL,
  `title` varchar(5) DEFAULT 'N/A',
  `last_name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT 'N/A',
  `suffix` varchar(15) DEFAULT 'N/A',
  `house_block_lot_num` varchar(50) DEFAULT 'N/A',
  `street` varchar(50) DEFAULT 'N/A',
  `prk_vill_sub` varchar(50) NOT NULL,
  `brgy` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `zip_code` varchar(5) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `civil_status` varchar(15) NOT NULL,
  `religion` varchar(50) DEFAULT 'N/A',
  `sex` varchar(10) NOT NULL,
  `phone_number` varchar(11) NOT NULL,
  `birth_date` date NOT NULL,
  `birth_place` varchar(50) NOT NULL,
  `email_add` varchar(50) NOT NULL,
  `section` varchar(20) NOT NULL,
  `year_level` varchar(20) NOT NULL,
  `cor` varchar(255) DEFAULT NULL,
  `type` varchar(50) NOT NULL,
  `student_status` varchar(25) DEFAULT 'Enrolled',
  `account_status` varchar(50) NOT NULL DEFAULT 'Active',
  `e_signature` blob DEFAULT NULL,
  `pic` blob DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `date_submitted` date NOT NULL,
  `date_verified` date DEFAULT NULL,
  `patinfo_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Student_id`, `course_id`, `reg_id`, `title`, `last_name`, `first_name`, `middle_name`, `suffix`, `house_block_lot_num`, `street`, `prk_vill_sub`, `brgy`, `city`, `province`, `zip_code`, `nationality`, `civil_status`, `religion`, `sex`, `phone_number`, `birth_date`, `birth_place`, `email_add`, `section`, `year_level`, `cor`, `type`, `student_status`, `account_status`, `e_signature`, `pic`, `password`, `date_submitted`, `date_verified`, `patinfo_status`) VALUES
('2018-00001', 3, 15, NULL, 'Doe', 'Jane', '', '', 'Blk. A', 'A St.', 'Prk. A', 'Brgy. A', 'A City', 'A Province', '8111', 'Filipino', 'Single', '', 'Female', '09612112121', '1990-01-01', 'A City', 'hjbmaureal@usep.edu.ph', '3BSNED1', '3rd Year', 'student_cor/certificate-of-registration-92803_1626229908_1626598344_1626662081.pdf', 'Undergraduate', 'Currently enrolled', 'Active', 0x89504e470d0a1a0a0000000d49484452000001300000021c0806000000717df223000000097048597300000ec400000ec401952b0e1b000041d749444154785eeddd097864d75de77dada5aa5249a57ddf5a6b776be956ef6dbbdb5becd8244e9c10629210028190306102f3c030c0f0c2bc2c7979199810664870124292992c182780e37d8be3b5f7456ab5f67d57692955492595a492e677bc40b0dd6e2d55a592f4ede7e927e0aeaa7befe7de3a75cefffccfff4445f10701041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104020c204a223ec7c42763acb81a598959595d8e5e540ec722010bfbcb212f3daff2ec746454547c5c5c5cdc7c55b7c3131314bb1b1712b213b113e1801048226b0ed1bb0c5057fc2fcdc6cea8cd793e3f54ee78c8d8e54793dd339f3f3f3c9f373732981a895d8f8f8f825674aea606e6ede958c8cacd64447f2b0cd669f548336a7c66c3968da7c1002080455605b36604b8b0b16355c89336ab0da9a9beeeeede93e31353999af462b617e7ecea21ed752bc257e2e3a3a7a797139109f98983867b3d916a2d5fd8a8d8d8d723a53260a8b8a5f2c28287e252d3db3393ede32131b171f08aa3c1f8600021b16d8560d586071214e0d54cac8d040fdd5c6cbf7f6f7f5d68f8d8de669e818adde556b6171c9858cccacb6f48cccae2467ca487c5cfcbc7f71c11e1717bbb8b4b4649d9c182f1b1e1a38ecf14c17fb66677396979763aa6b6a7f90671ab2b48cd604ab7d66c3e27c000208044d605b346081a5a5d805ff5cf2406ff7b1f3674ffd627757e7a140607925253575480d5773764e6e43e59eea279d296983b171717ef5bc02ea51bd25ceb5b4b4f86a5c6c71d19f34ee1addddd27ce5debedede63fa9cf1dd7baaff715769c55336bbc3458c2c68cf1f1f84c08604b67c03a686cb363539b1ebc2f9331f6b6cb87c8fc7e34929282c6ca8af3ff8fd5d65152f24253b87e3e2e2fd1a062ead556a7ecee7181f1bd97df6f4cbff717cdc55515151f5645dfda16f295ed6cb9072ad9abc1e81e00b6cd9064c31ae58dfac37cb345c2d2dcd778dbb5c45b97979ad75fbeabfbfabb4fc856467ca6042826d7ea364ea95457ba7a78a2f9c3bfdc9e6a62befcfcdcb6fbce5f63bff28352db343013302fc1b05e6fd086c40206e03efddb4b79a99c5e1c1fe7da75f79f1975a5a9b6f494d4b1bbaf1c4c9afd6d6d5ff40c3c45e8b2561cdbdad6b5d8c7a6f66a8d9333d357effb47b3aa7bbbbf3e6332fbff8b9e3276efeef4acde88b21e562d39e030e8cc0966bc016e6e7ec7d3d9d37bcf4fc8f7eb3b5b5b56e6f6ddd33276fb9edaf7272f39be2e313fca1baa5ced48cc1c9f1b1cf279e7a69b2a5b9e91ee5912d9fbcf55d9fd7f14642754c3e170104de59604b3560fe799fa3b3bde58ee79e7deaf7a7a7a7d3f6d71f78e2d63beefa9394d4f41ef594423e9c4bcbc8ea99181fbddf35e12a6d6d6b79575a664687cee9ef343b39cb83860002e117d8323130d3f36abc7cfe232fbdf0e3df527a43d4818387bfa980fab7939253cccc62c81baf376e8d663ca307067a0e3fffdc33bfe7999e2e78cffbeefdcf79f945af582cd60dc7dbc27ffb3922025b5b604b3460a6e7d5ddd176db534f3cfaa74b8140ecedefbaf3f395bb6b1eb22458bd0aa4877dd98f1265e3babbda6f7ee2b187ff3427277bf8a693b7fd716676de25b2f6b7f697e19dce7e76c6a3951bbe64a5e0ac444745afe8477341cfdfac49cbd10c77d87e40b7aff0faae2ce287900bfe795be3c5731ffad1b34ffd8ef2e4576ebee5b6ff51b1bbfa61ab3dd1b3be4bdef8bbb4c468696e6ef6746dddbe07cf9c79f95359d939ef4b76a6f6e993c737fee97c42a40978dc93e98ffef09f7ea5ada5e5e6a42487df96609dd70f6994d269fa0f1d3bfea0cf37d364b73bbc9176de3be17c22ba015b5af05bae5eb9fcde271e7fe4f7944d9f70dbed777ca16a6fcdbf2899d4bdd937c7664b9c99764f7ebbadadf9ceb3674e7d34332ba7512917ffa2585cd0664037fb1a39fe6b029d1dedf5cf3ff7a3fb262726f6a9018b5a092c4769e54694d56a9d1d1c1ed8f3a1fb3ef65f0381a5067ae0e17f6262c27fc8d51d51a912f1dd9d6d279f7cfc913f5c5c5c4c3a70f0d00f6a15f37224a78cadee1342ff2a9bdd3eb9bffed03f98614563c3858f69989113faa37284700be4e4e6f6949695b5381c89012dfc8fb2dbed515a3f1ba575b3898343037ba7dd53d92b2b5111fb5d0ab757388f17b1e86e65d73ff5c463bf37393999555b5bf7f8b11b4e7ed19ee888a8219a02f7fedd7b6a1ececb2f38d7ddddb5bfafb7eb66c5c7e2c379033956e805b4a0bfbfbaa6ee99788b65c8ebf546cdcece46b9ddee289fe2088585c5a7d4fbee5639267adea1bf156f39424436605e8f3bfbece9973e353a3a52b17f7ffdd337dd7cdb5f24a7a4f59b18d82618bde3216df6c4f1bdd5b51a3ac62d7476b6dfadc5e46991768e9ccfc60412ac367ffda1a38fedd95bf74347524a4b4c6cfc585676dee5c3476ff8fa873efcd13f5609a6fe8d1d8177af5720e262604a9750aee88f7f5eeb1a3f54b26b57cba1a3c7bfaefcab76cdf64464399bb8384b606ad2753a2b2bbb7b7464b8d6e371170796165d5a2bc9ccd47a9fca087c9f7a5903a3c3437fded9defa94d7e3492f2ed9d554505cd26cb5d96614f78cc867330219837e4a11d5802daa8ed7c8605fede54b173ea6b852d4e123c7be915f58724ab37e0b41bff2207ea0dd9e38999191d9d6d878b9c6353a5c93999973591f1fb25501413c753e6a0d02d9b979bd4b8b8bfd9a503285e3028a8145dc88600d97b32d5e1a5143c879df6cfa8573673ea91843b652149e2829ad7846ddf788afc1a5d9277f5a7a468b1eee98d1d1e1bd8b4b0bf66df17470116f11888b8f5f562c4c65c769bc22e1f18898062cb0b4106b02f79ab2be2d292969a26effc16f596d8913918074bd735025d7a5d4b48c0ec5c1e64c691ffffc9cf37aefe1df114060e30211d380290521f7d285d3bf3ce3f3265755ef7d22232bfb8a7eed16377e89a1ff0493ffe374a6f65be2ed931e8f2fddef5f480afd5139020208444403a6c0bda3aba3f5aea1c181930adc5fddbdbbe6fb0a8c6ea905d271b1f1f39a6898531c2f7161c1efd0ee475b6299165f0104b6b2404434605eaf3bef4ae3e59f9bf7fbe30e1c3cfab5acecdc4b5bade2a9f60309e8efb2dfef4f999df1e69840ef567e30387704b682c0a67fc95412daded17af53dfd7d7d7b54bbfe6a7149d9b396049b6f2be0fde439c6c49afd2463b58060c1313b3393b5b26cf69be40f0208845260d31b30efb4bbe04a63c3cf6a857fa0a676dff7ac367b4465dbaf16df6cd1a6f571719a41b5cdcecea46b7e9d21e46af1781d02eb14d8d4066cd13f6f6f696efc806b6cacb0bca2f2544959e593aaaa1ad1395fd7768e5e510316abbd27e31616166cebbc1fbc0d0104d620b0690d98d60cc64c4f4f16b5365f7d5f5a7afae881c347bfaa0a0f5bb2f765bc35633a9f9e9ed19592923291e8481a538f924cfc353c88bc1481f5086c5a26be72a5d214fb7aefc4c478fec143477ea0aaa6a714b8dfb20b622df196d9eadabac7cc2edf0585c567941bc6f292f53c91bc078135086c4a03a6da49d143fddd950d972f7d2c31d1e15669e8af59ed8ea9359c77c4bd543db0801ae587b5b0b75389b8630ae8d3038bb8bbc4096d37814d69c0f4454f6db97ae503eea9a9cc43478efea323c9b92d56f36bd9936f7e6eeeaaf2c1b64402ee767b98b99e9d2710f618982a35c40ef6f51ceb686fbdc79e98e8dd5bb3ef3bf19684885fefb8da4743d509e654f46ecb0e85577b9dbc0e814810087b03a6de578aaa97fe9cd20dd2f756d73cab2dd13ab4148755fd91f034700e086c3181b036608a7dc58cbb46ab7ababb8e29d8edaddcbdf741f5be366d738e2d76af385d0410789340581b30a54e24b6b55c7def9ccf97a232cc8daae0d0b2d5960cf104218040e40884b50153a9e8bcbedeeedb53d3d2bc7babebbeaba0f7969e798c9cdbc89920b03305c2d680699160dc607fef6193f7959b97df985750fc7c5c7c02bb59efcce78eab46202802616bc0fcfeb9d4f68ed6bb63e262978b4a4a9f8c4f487007e50af8100410d8b102616bc0e6e67c69bed9d902c5beda8a8a77fd48338f733b569d0b470081a00884a5015b5a5a88ebebe93c3e3434549099997525c999d24bea4450ee1f1f82c08e16084b03b6e09f4fea50adfbc5a5c598c2a292e7557162db24aeeee8a7878b4760930542de8029f33e7a627cac7cdc3556575c5cd2f9eaa26dd590dfe4ebe6f00820b00d0442df8005962ceded2d777867bc99f9f9054d968404ef3670e312104020020442de8069930bc7d0e0e0b1d898d8e59cdcbc73b131716cf81a01379e5340603b0884bc01f3f96633dc6e77617a7a66bf868faf44fa2edbdbe1a6720d08ec14819036604a5eb57677759c9c76bb334acbca9fb3db1da33b0596eb440081d00b84b41e986ac45b27c65d7b545e26da9992d217131bbb45ebdd87fe4670849d2710080462b4f3cb1b9bbf2cebfb1192aa2c5a839cb01458b22e0702167330b393bc26d2fcfa3baf636ee909b5903660cabe4f76b9c66a535253c7b5d763a3e26014fadb79df53aef87501538d458d9665617e3ed9ebf51674b6b71644ad04e2cd767c367be2987b727cd866b34fa8baaf4f450e36d4b02c2d2dc62f2d2edab4e37d7e5b6b53fdd8e8c83e6db89c14a3bd1a12b40a263b37efbcd97f55ffee5107633626366e419b496fe8989b71a343da8029f33e636a723a57e9138d4e676ab790b61cd066dc148eb97d04d46045abe76355e3913c3c3850d1dbd3754b5f6fdf4d6363a3bb7cb3bea4c5059f26e61396555eca9792923a98919979597b2abce81a1dba644f748c242458bd8a1baffa875f8d64dcbc2a1e77b4b79ce86a6f7ff7c040fffe99196ffafcbc3f5e9b2dabbd5c8a0d049663ed36dbc79d29a9c37985f9e7d5c1e8cacecebd32ee1ae952033a6951815195b9da12936d216bc0cce2edd6e6a63295ce71646767375812acd3dbe7b1e44a10786701d3db5af0fb93c64687cb8787068ef5f5f6be6b6478a4c2e7f325c6c5c5cda8a1185183d56e898fd1ee82f3c91eaf27b3bbbbabb4b5b5a5c262397d4f4646c6707a46667745e5ee47478707cea9f067b729597eada3ea78b1ea71d95da32395172f9efba59696e6db663c5e5b41416163d5eebd3fcecece698a8fb7f8545034697272a268746464eff8b86bd7c50be7ef52231b6fb55967d3d3d20773f3f21ab5d4efd4e8c840a362d62ef31ef508fdea9d456495e19035608a7fd94647876b551f7e393d33b3393626664bb4e87c3111d8a8c0c2c2bcdd14ee6cb874f117fb7a7b8e7b3c9e2c0d13e77272f31b8e1c3df698aab19cb7d9ed13fa6f1ab6c5fa971697ac3e6d86ecd126cf93e3aeca9191e1fdc34383d56dcdcd37343534dc545858d85fb7ffc0f7265d238f2625a70ce83b35a7d1ccabf1320d15b50fa9dfa14a2fb557af5ef9e9f6b6b65b947399a486abe1c4895b7e50565ea1c9b3c4090d49fdd1d151a61316b3bc1c50abe9b76b03e68c8181defd830303fb868707f74e4c4e16f60ff4df73fefcb9f73b1c0e8fc391e4d2e75c2e2c2a3e3f34d8dbaa6d0f27d55bf4a833e25583b6ea5ee1463ddfe9fd21db3dda333d95f3f0bffce02b1aeb67dffbc19ff995ecdcfccba1bc103e1b81cd1650cea36576c69bdfddd5fe531d6dedf7689858a2c9ab9e9c9cbcf3a565154f666665359b219a7a34d7eccd68e54acce2e262a2c73d55a046e9d0a50be73f3c3931be3b2a6ac5a2c6a4797775cd3fe4e6159c53cf6846bd2ecbe884ab4acbf46eefe9ec3ca986322d2d2dbd4bdbfb3db46f5ffd834949cee1773a96f1323b84a9e7669d9b9f734e4f4de6f5f7f7ee371593d53b2b55018654bd245eb1eb18b37f85d3e91ccbccca6e2f2faf7a32afa0f0b47a689b3eaa0a590f4cbbf3a44d4c4c14aa2bdca79be6daec878be347ae80998dd317d4a4f4ac68666c4beea7b9e09f734c8c8feebd70eef46f7576761e7426a7f61d3e7aec7f9696963fa98d8e4714a45fd50a94d783f7e6b5cd9a3d6c2bada87ada6c8273e1dc994fb4b6b61e6a6ebe5a9f9a9a36959c9c3ca6ded04cf7f050b98684a9b604dbd4fefdf5df3f71f2d6bf4d4d4bef531c6b55b5f65e2faa602ac398bf23ead15d3e70f0e883ea9da5fb7c33a94a812a50dcee86f1f1f15235ac96d191e1b295e5953b93939d037afdf66cc0024b4bb19d6d4d95cb4bf3ce5467d258823561d32f3472bfbe3befccf47cc40496039665f520b4b94b767f5f77a1e2402936bb6d626ad2d56fb5d9c74d0f632bcc8a2954a2a0b92fa3bdadf5ce2b8d8d9f9cf64c6757edae79b8fec0c12f2b48deb3da86e4ed9e0205ef4d633eac86eca1dc82e2734d572ebff7dcd9333fdd3f30b0373030906eb3d9e6939292878f1fb9e187870e1ffd6e764e6eeb6a1bca6b3d753237c734fb5498bfddfa7b413db16714d376e8ff8e5e5e59895d595e8e55a72422aa2987a407b6b21288d378be78797925d6999ad665c6fa3bef6b7aed2b560c42a938a1c9f9895467355a714b81c5043554ce81819eb2bebeee9b4c8a8d77da5ba0e14bbafedd6a46348a0d8de7e4e45e52e0f99fbddee94be68b1229f19637dbaaca4ae2e484abe26a53e3c7bababaee302910478e1cfbcb5da5658f297e34a4585550f2ba5e6fc8fa15ebfa6a75edfe7f566e6589be5fb98a6745e715145c311b295b6d896e4d0e04e5786fbe4e5dd7acfe9bf91b717f42d280694890303ded2e51c3b5a4317373744c6c44ce6084f36e98fd30fd0bf34ecd02a569a861f74c4fbaf56be98a8d8d9f8f898909c98317ceebbbd6b1f4a5b39a69fdaeced6033dbddd27c65daebd26b6b21215d0e311e74f4c4c1acdcacebe64b5da26356cc99e9e9e2e1a1c1c38a018cc1ec573daf756d73e30e3f55c7e2de81d396938ba8fc9fd7d3db79c3d73e6d74dbc284375ee8e1e3bfe85fcfcc253ca8bb8e66ce146ee897a73e67b34fc6aaf6c6949f1eb952835eedbf6d9598d55481a300533ed6ef754a9c6e8be648a1746c923616a72bca4a5b9e14303037db7cfcfcfa7e6695f80da7d07be929e917b315cbf6e66aa5dbdbf78c539124c42a5e6a4a2a2a36396f5cbed57ec653e5853e50a0a5bcccc98d6c166365cbe70f3c8f0e011cdaced5d5858b068c83362e24225a5a53f4e4e4ee94fb02428cf297e2e265aa3ca95e557530ff4ec947475b6dda1b482db9f7ae2d1ffbfa2b2eac97dfb0f7e53c3985ee5276d7a25dff9b9d9d4ae8ed6f75dbe74f157c7c6c7732a2a2a1f3f74f8d85f29f6d421cbb0fc5887aab7b59a4623925e1392066cdee74b53f02f5fdd68b77e592362acbc59e8669a7b70a0e7c073cf3ef9bbbdbdddc7f5b369b1db6d6a47967234ad9d70e0d08d7facd7b4867298a42f7ec2dcbc2f6da0bfbb6c686860bf6ab355aab793b9bcbcacc4ece88082c27d2525a52f4dbb27cedb1393c6147f5af397d004e2350cb498e3a8f139d4dddd79876b6cac46b3d0e9995999edf5f587fe5e335767f44c0c9b44c9571bcdb70fd8fbf459639999d9cd15957b1e514ed32f2b19f34605aaebca2baafe593b5b3da2d9af310dcfd67c8ec17806e6e77c29dd9dedefbd70fedce7746dcee3c76ff842d5eeea071d4949433b2d2c100ccf8d7e46d01b30958f8eedefee2854f66fa66219a7cdb2888d9ee4567ebf594ef5e2f3cf7ef685e79fbb333333d373e8d0e16794577361da3d75606868f0485a77c7dd7babf70de91a27837d9d665a7f4ed5403a3a9a8f35375fb977647868b77a41f1faf2fb62a2a3350a598a33c3d7c181beda96e6a6bb745e4df5f587bfe9f379cf2624d8a6af37643359e6ead55935e39ca245fb351afa1d54e2e6418f67ba305a4bfc9234535553b7ffef35fd7f4ab356fdca1f5a55ef49634b332c3241e48b4a4bf883c1c1bee3972f5df8f4d933a77e5dd7705cbdb1fbd52837aa3716d667cbf4bcdadb9a3f78eecce9df5042d5ca818387feb6a676ffb7140ad8d13fd2c17e6ed7f279416fc09603cb716608e0f7fb2dced4d49e9dbc7987998d1d1cec29efede9399a929ae6b9f5b63bbf527fe0f0f734adee52f0b76ecce5fae2c8c8d00da5e5553f086603a659ab380ddfb2fafbba6a2f5d3aff493528d96a14668bd5cb2a2c2c7e392323ab4d719a57cb7a6bc8e670b9462bbbbb3b6ed39677bb5f79e5f9df2c2a2a79a9b4acf209afd7dd6d1a323572a6b7f35aac656525c6cc442d2efa13c75dc3f9bd3d7dc78706078e8e8d8dedd6cc625c5a5aea8002f00fe8335e713a53fa12131d2efd88ad7b124756139abe7f5231a6e6ab571a7e4e3dbbf79e7ae5853fa9db77e06fe6e6669f37c9956b79e0d7fb5adfac37b3bdb5f9fd9a05fc7533143e72f4f85feda9aefd8e664c99615f2f6a10de17fc066c6539deef9f4fd1e3beac7847afbad5eb7e7883707d9bfa11ea8ddaba3ada6ed778d17eecd80d4f1f3d7ee2cb0a5a8f69d816ad8cea4e67b2b3570d7df2e2c28299a20eca1f05cc93c7c7c72aaf365dfe787f7fff6193835753bdefbb25bbca7ee470249bc4c6b937c7ba34846d2aafd8f3cce8c8506dd395860fb7b6b4ded9dbdd73322d3dbd53499817d4888cc6c5c6fab5a781d5c4a8ccf05333887b464747cbbd5e5f5a82c532ab6295cd9555558f1714169d49d4c264cd9ccdabd10ccada572d3636cf50a77a935f34c1f2e6ab8d9f3c7ff6d46fabf13fa400ffdf68898dd22e4297193ee79b496f696ebcefdc99339f5b5a0aac2865e14b557baa1fa0f10aca23bba10f097e03a675559ae6add1a2d4690535dbb7caa2d00d295ee3cd6ef76489a6d83facc5ecfdb575f50f9af8d21b0b73f5a59856afac453b351d560367d9e8f1cd70518987b9cd4d97dfd7d6d6f241b360779782e57bf6d4fc8319bee94b7ecd8d545e6fd026351c7c212727bf414bc06aae3635fcb402ef35dddddd8714943741ff38e57e04343133eb48744c38921c2ed3cb4a4bcb6ccb2f28bca005c17dfa37b3c42464b1290dd5dc9a1c785833db0d571a2e7ea6adb5f9035ecf4cfe818387bfa0736c56e31cf4e52d0a012429607ff785f367ff83df6f7a5ec7fe5ac3e2ffad73094bcf6fa3cfc5767f7ff01bb095650d2f1693ad56ab4fddfbb1ed0e78adebd310cb72a5e1fc3105ca9d8a053ea3757017141cffd72fd8ab29040ec790ea312d6a2670435f7a7da9edeea9890acdf87d5a71b5c3eaa534d5d4ecfbba16035fb12a437bb575a65e8f794d2936f692297fa480759a7a5a95664f4fb3e038362e76d1cc22aab288191a2ad81fef5383351f6f597db5848d3e0f9a00306b6adba7a7a7be204faf163f7ff085e767fefba14347ff5c8df80bfa6f41ebf16b4d63e2c8d0c0f1c6868bbfaa9eb25531afafecadd9f76d1aaf8ddec5e0bd3fe80d58602990b0e05f48b4582c73a6ee50f04e756b7d92865ac95ac8fbeea4e424efaeb28ac7df5c8d56a348d565b24ec7c5c6a9018b5ed750cb543c50e392d1d7db758302449fd05ab8ecd2d28a1f2a36f36df5bafad63bb3a91942733ee6de99bf5d6ad06257f4c3a4c0fc4a744cf472242cf751233aa000ffdfe85c7c57af367deccce997ffeb8d965b7e578dd8c5603462fa014ad082ecbab3675ef96d3393aa7cb47fd482eaaf3b9292a92a1c415fc5a0376026b86b1215b588d5bd932bb02a1695313b335b54a0252059d9f9e7df92bfa4ca008b8b4b7653cceef520f99a1e0b53aedb0c519b1a1b7e41a91127146c9f387ce4863fd34ca202dbf6a0fe70a84133cb4b226e8da2990cd1b3767f527272bf2a3ffc9a1ab1ffb66fff812fcafe45a5efac7bef5193fa323e365c6fe26cc3c3c3655a16f48d7dfb0fddef48728eace926f1e2900b04b526be995657bda34cfd4dd30af6a5f5f62c427ed5213e805936a359c042658f0714877a4a5fa689b71e323a4ac1fb14135732c9a46b39250d1913c7c6468e9c3bf3f21f9a21545656ceb99b4edcf23bda77e0b160375e6b39afcd78adae775a33a60f2b0ef6974a10769c3ef5d21f7475b6bf4fc3dfe4f59e8fd733557ae1fce9dfeaeaec3c5a5e5ef17475cdfe6fd278ad5733b4ef0b6a0fcc0c33148b29d71738510bb8bd1b8ded84f6d243f7e9ca28b7a8be53a96a2af915a8ef3271aeb7399a296514a774a27825b4aefa8fd9e57c6c74e85853e3e55f9b724f155557d77c6f6f4dddd795d5ae19dfedbb24e99d80f403e1d5ccf7e3a6c7af06ecf7f4f777cdda4a35620f6aa6d0e493adfa8f72e0d22f9c7de55734fcbf41f7aefdf0d11bff42c3465379813f112810d4064ca573139403b64b719268d522ea53c2e4aa4a7a44a0cb864e49abf5d503f39528f5401b292c272a772af62d1fa87c2a05bfe7f46ff1ffb6afc3b50f6b6a9c6b6894d9dbd379735757c74734e3367be8f0f13fce2f287aced498dad0096f83372b9ee853cff419a5edf84fbdf2e2ef2bf1f5b3662993d22cbeb1dab89582f6d6cef696bb348bfb7e2d811b3872eca6bf504589ee50ceac6e03fa4dbd84a03660a6448aeae0e79afc1fc52594c41abb63abb06af6d112585e369b2a5425a7a45ed25dfe77abf9559d3c46b1a5452585aab9bf76105fc3f258c5bb925ca3c37bbbbadade3f38387852f95c83b575b5ff2b332be7bc02d63bf247e2edbe359aa19c5323f6c20d3127fedf33a75ff92fe7ce9df98c664e17142bfc27cd9ef65d6f65812946d87cb5e1e31a8ac62ae1f81b45c5a5cfaaf10adaace6a67ed3b7e9c183da80452b575b29148e68a50824a7a47568ffa635c576b68bb1e9052857e9c70aaedf31ed71d73b67d3cf6a48d3f4ef7ba4d12a07bce4888b8a8d56b96db575cb0a87fddb1050bd5955e65c704c8c8d5476b4b5dcdbdede768f32c0ad5a0ff870cdbefddf508e9d593fc997eb4d0f8da9bf25b7174fda6c93674fbff8fb0d97cf7d667e6e26af6effa1ffa57bd06f4a9cbfdd73a69a5ec917cf9ff9707fff70a582f67fbfa77affb7f55911594266bb7c4f82711d416dc014fb8935b5f0f5c59ad31067e6d57a1f3bf08fd9044125b52f6564649e52a9955ad545fbc5925de55f53fcaa5b551fbcea72ada8b44e8232da0b15ffb22a989fbcf25a32ebab3d567dd1e295949ae51a193e78e1dcd9cf29a174b7d6118ed7edabbf7f6fedbeef9a0a9f3b35deb59ac7c9a45168c8dd78ec86937ff8d28b3ffa7c4747dbfbd5cb0dd41f38f63ff4feb7e4269a923f2a8d73a3d978635769e90b4a99f8aee26a2c115a0df626bf26b80d98b2f0cde6999604cbac451535b56466473660e69e2aeb7ea0b26aef5f2bb9f4ff19e8ef3ba97586e55a96f3485e7ed153aa2f3ea20073b686dbd9eab1da34f1b1473396c3aa31356b82cf83fd3dfb5aae36fdacd61756eb8bb7a0ccefaf55eedef3505a7a46bb32ea57559a78939fab4d3fbca92caa3cb99663c74ffeb7975f7aee4fd488bd4755373ab402e29f6d76c7f81b276866ceb52e55b38e673f67361d3b7ce4f817d4bbeddcf40be004562510d4064cbf7a56ed006cd3af97c7049957139c5ed5596ec117996450b3bc4553f09f5779998ff6f474fe547757e7efa4a767fc4c5e7ec1f3b3b3defc81c1fe6aefe474aa66223f31d0d7776451e917a6a0dfd4d464a1e9c51614153da7e4c96f9aaa0e0ad4d370adf1393009b76ac42e1f3d76d31f9d39f5e21f5cba78eed7cc0f86868bdfb25a5f5b84add9e21cfdc8fcb27aca45478fddf0052d746f79bd4efc1a8fc6cb374320b80d981e0eb34554b233715c5fc0b0963ad90cbceb1d538db849febcacde569f96f59cbe7ce9fcafba5cae522547fed2ac6fc6e999f6d826c727a38647c76e517588635a9ae3d702eafeb2b28a27b4b3cc03a6c7a5866b4d6900d73ba79df6ef26706fb2f30f1c3af6e7afbcf8dc9f363735fe7c7a46d615ad713ca72ab9b696e6abf76aa38cf7e5e7179caeacdcf39066869914d9420f49501b30e5e224fb9564a92f6eaf9981244ef3da93a05c24ad2f5c7c48b38667559df498cab27cb8a3b3fd3619c56bc9cf6c764e4e5756764e675171c94b6abc9e494e49e9d35e7ec46082f445323131cde49e362b152e5d38fb1b972e9cf94f2afdfc63c53a3c972e9effb47ac08b353575dfd5307ec7a7a304893c6c1f13b4064c5fd0989e8ed674535f4ab36a4b6abc825e19206c2a2138d0ebb944fdea0da8067c4ea37642f68f8e8ed41417957ebf72f7de1f689a7f48bffe3e7dd9766cea4908d8fff523b5946b5e9328cf9a72e7172f9cf90de58afd675345767e21b0ac6ab15f553edd2beaad6d68517d28cf9fcf7e7b81a035604ac88c3675d0350ba9cc72d378ad6f81f276bf51a637a0188c2b37b7a0417118dffefd87be65773806226181f476b7d74cae6f66c6f3ccc8f0704d4f77cf67552f2d4dd5252eeed95bf34f9a1ca1aaea167c0082b816323aca6c81a58426fdafcda58ac23b7606f27acf81b2f3ad0a2e679acd4915fb32a59b236ea1f4f5ae61abfebb928027ccfa54fd90b814d08fd23d1834658182557c71abba6cd5f30e6203a6496865956bf9cca229a3a35d661842becd53611256b524285b659ecbd5e06befc0f855d589dfaa0f58a49db70975e8af4de715a71fda286d165265fe9a0a149176ae9ccff50582d68099c6cb6cd5a52cf465b391c74ead44713d72f5bc6ca32383b7688d5eb6d6e8b52a564836fdf5d082f8ef0ae627f7f674df6aaaa6d8edf665ffbc3f53955d3fa21f9492201e868f0a9340301bb068f52eb435b0a979f7139b4084e942b6ca61b4e146924ae11c5f5200d96ab38d32531bbe3b673659518e5dd540ffc0cd490ea74f556b4f95969636a800419dd22b7e55f1b1bcf09d0d470a8640d0bacdea71ad6859ccb2897ca937b6860231c1b88cadf3192ac09733e3f51669f838aa697ca6edc378eb340399d4dfdb7bab966e6554d7d43eb4ffc0a1fb15ab8d56e58adfd49e9def5111ce41a5027d5d952ddc613c2d0eb50181a0f5c0cc3968f868e25eaa26f35a4f6c03e7b52ddfaa388b657ada5da98cfb44ad93bca4068c5caf30de69afd753d4d3ddf51ee57bb9f754d73ca07a5fada969194db575fbff679236a6d5de961f99708d1d312b4ac2785a1c6a0302416bc04ccccbfc558c274e5983761313dbc0796dcbb72a46689b9a9c386476a5d6a6192faa1e3e59df61bad3ca014becebe9ba53c3c5c2dcbcfc97d3d233af9858ad2947a4fffbb236a8fdebc585c5849696a6cfa8ac4e89996c09d3a971980d0804ad9131c346a550c4aa7711af2e7a120dd85befcab202f8dab1bcdc64806b579f7e5510257d62030fef5ade3aa73d0ab401ef6d66ebb7f28aca7fd1ea88718d185e4df5d1fdf069a1fd0bc94e67537f5fef41ed547e97869bceb57c3eafdd1c81a035602606a6ea13cbafd7b68a373b386fce2545e651b5f7a3f60b98cdf7cdcde46ba7a27eedda44e264986e951a23ebf0e0c009efacb7b07277e523da76ae41795fffeec743f9786e25b47e392333bdabe9cae5cf0ef4f7dcada4ec0defd719a64bdcb187096a23a320be02f9d1ea7cad985aef6f2da3bc639955e32b10b04e4f4feed5fe82a95a36d4a6a545ebde35670733aeebd2cd4ef12a2e79ab7e347c5a32f4bc9615bd6581bc4926d6e2f9466d10f2bf4d46635f6ff707e7e666b3d77540de143681203760afc6c15654d8309e06ecdfdfc3a5a50587d2276e36731c0a1e5fd0178604d6303ce6a624b77b7272cfc4f8786d5a5a7a937612bf72adfd32b511f3545151e9235ae8fd8c6265a58303fd779a5dc9c3709a1c629d02c16cc056f4a55c505c6749a91426b84010f4276e8aeaac67eb4b51ad2fc990363c6927feb5ce27768d6fd3a49275746cf82605e5e30b0a8b9f54eccbf54e1fa1dc3c970a517ec5e974760ff4f77ed037375bb0c643f2f2300a04af0153cf4b333a9ad589f76b7b3562603f7113cdb4bcc73355a54a1d492a687856051fdf52d6388cf77c471d4ab38fe9eea9a9fd29a9a93dd939b9a7f58cbe63cfd7d40f4b494d6faeda5df325f5de127a7bba3ea2a55f693b0a6d0b5d6cd01a3075cb57cc0c8ffe775e35e02d0c21ffed29300994a3234337ebcb6166bb9e93119b4584e14b62f2ee5469f5a07abff97979f92faaf7bbaa1f0e935a919e9e79212b2bfb946625ef56c9ef03fa2c869261b8676b3d44d01a307360e5d5cc29c769c1fc72a91716b42cffb55e5424bdded49cd2129512976becb08627434e67da55ea4e85e70e691631716c74f876b35c2b2333fb829ecd55c71d35d4741716953c6836035129f04fa9f47419b961e1b96f6b394a701b302568c6ab01334348f5c2b4612b7f969797ac5393e3b59e69778e960ff568068cf489303c1666b30e2ddc4ef77abd155ab43d9ce870f49942036b39b472f5fa3233b3ce4d4e8ed78f8e0edfa912d48eb5bc9fd7865e20a80d980a192e9bdda6f5c71913134d754bdd3f7d899c7d7dddef595c5c8acacaca31d9f7abee0584fef66fdf23981fd19191a1135abcbd2b3b3be7596bc2dae38efab1992e2ad9f50fa6ec916624dfaf24e40a93cfb77dd5b6de9505b5015372e08216c29a1c1b95d659def13103b3ac4a7b3f166b0d5eb952273ab5e3cd256dac4ac31e86ef89d9decf333d5dad78d68c3325ad51cfe69a3799d19033909ce46c532fecc75a849fe51a1bbd5d9bd690a11f86fbb7da4304b50153ac61c99e6877991898095ceff45f2bb31c6568c8e4122d590b0b8b9ed65e91c3abbd31bc6e63025a8feb54da4a8d43e5ba357cd486c2ebab7aab6546eedcbc828735bbee568fee1e25b7162b1616d4efcdc6ae7467bf3ba837225a0d9823d1316c726ee6e7e63277f24ca47a5fb1b30adef7f5f5dca3c285fd8545bb1e63abb9f07cd94cdd2fafc753eef1780a9d29a94da6115aef9195afb7a258586f4a4a6aa3a966a18d586ed38c24b1b0f58206f97dc16dc0a26302fab2f6a90716e7f54e97aaaece8e9d8954ef2b7970b0efddfa1265e5e6e63f9d9494d24df1c2203fbdd7f83813fff27aa62bb424244a797717365af543c3508faa873caed2617363a323b7fae7e733c373251ce57a02416dc04c1d7ced22dda7076859c1d3bd260bfa7a27b01dfffdf5d4895d8383fd77690833a8e9f847f4256067ed30ddec57d79d7adcb5f6c4c451a733a555e93d1b2adbadf7cfeb739a349bd9ab7a6e65fabbdbf4f2c274391ce61d0482da8029ceb0aceef6b01a32ffb47baa726161679624d1cc638aaa19dca307bdb0a0a0f831952fa6f715a6afa182f7d1be395feeb8cb5567b3db864dd9ee601c5a93532e7ba2a34335f453c65d63b72e2e2da604e373f98c8d0904b50133a7a278c38c1a329fca26e7fae7e7b2765a205fbdce9899594ff1f0f0e0adca3bf2aafac193fa0527f37e63cfe9aadf6d7afdaed19123131313c59678cb687c5c7c507abe66a779ed623464e2bbcae9ab3765a9577d52bc306402416fc034f53c9f9b9b7369da3395e6f1b89537b3b3e26026f6d5dadafad1d1b189d25da5950fa4a6665c7da3705ec8ee221ffcaf02da2cc56a4ae728592ba0ea13176262e382b2d3b926a816b58675303636daeff3cd146b36b240cf36c3c84d7ef642d080c5cfa5a5655cd52f5f6076d65bb9b21cd83145e1b474254e53f77bf4057a97aa19f41417973e64f29036f91eefa8c39b19c2d9d9d902adcb9d4a4e49697b73e1c2f56228493b9060b58ea968a74fa111bb36c5a5eaf07a3183f8bea037609a765e48cfc86a5200d5a399a0bdbad13b26f14f85f332bbba3a3eaac5c3c9bb76953da0a9f776661e83f8b45ee7a3cce4c99ccf97a3bf1949c9c9bd498ee4be601d5d0da18a1558c735a3e9d6331d6df21c55db8dacfc6001aff37382de809972240a760e2726268e6926b254dded0213175ae7f96d99b72d2cf813c7c7478f8e8c0cdfaa2a060dea7d3dae7820cb86c278074d01016d50bb4b3d2465f324776b595b50e25f6f5c82e9d5e933ddfaff03a6ecf08a8aa887f1f238d4db0884a461d1b06956b3913d931313599313ae439a72ded6e914266955498e156d6dad9fd122f698f2f28a6f3b1c49033c71e11530cb87dc5393d54b81a5044762d280591912cc33d0e4d47c5c5cecbc266566f48c4fabf55ad3e2f0609e0b9ff59a40a81ab0190d235fd1502a4ae54c8e2d2efab7f530d20c93b560fbc3aa3d559d9b9bf7747676ee4b5a7ac2966961fe96a9e1b2badd137b14685742b563500d5850777d52626c6c60299060898ff7da4c514ab3910d7f365520240d585cbcc59f975ff4bcaa60f64f4e4e54a8a265eea65e65080f6e76aed1aa83cac1c181bbd5ebeaadacdcfd772a9c1794dca3109ef6b6fc6855bc4dd1ca877ca54fcc68043064aaa304f34215e34c9b999dc93649c916ab75dcec831acccfe7b3d62e109206cc9c86e26023da40f4a5d99999746d145ab65d773bd6747a6e7f7fef075442c85e5050f843656cb72be0cb83bdf6677143ef3009acaa1891a1007eaa7abf330ab84faa0716b4fb602608b42d5eaecfe74bd150725ac17c5f303f7f4317bf83df1cb206cc6c1b565555fd1dcd4a2e6a7384fb66555266bb39cfcffb5295b0faae9e9eeef76ae8f8a3f2f2aaff633649dd6ed7b915ae473b6169f1bcd76cc06151f6fdb82693823a843713044ace2e50b8c0a609aa1e3562242747c08311ca066cd966778c685835a83a4ab51eafbb565b8b6d9b60be661d6dde6977757777e727cd35aaf1fa86dd9e48b99c4d7aa8d5c0c46ad3e0ec79bf2f393636662e26366643eb1fdf7c1966b779fd589d88d1e6a7dad7b3c5acfbdda44be5b03f2110b206cc1cc392609dd642e647e7fdf3b1e36323776915ffb6d82854c361fd1a7b2a3b3a5a3fab8d6a93caca2afe4ec9bb66b7e7a00d59784ad726604a37698897a3358a7126e154f722683d30530b5fe919a5dad7a05ebdbb4915a7bcaaccfca036906bbb5a5efd8640681b30e54195ecaaf8be4a9a346b53d7c3eea9f1e3ea856df94aadf373bebcce8e965f19191939585252f61d95cb79d6ecfacc63b57902668650f95fc95acab6989c9cd211cc21a46ae15bc75d230714ffca484d4d6b329335c1caf0df3cb1ed71e490366086c866b78f96ec2aff8ecafbda06077a3fae2fff2ee54d6dd9044013f7eaea6affa8e25e3f959cecbc5a5c5cf280868eefb859eaf6785422fb2a4c0c4c6718affcaf29ad80e850803d683d242d892be8e868bb4f8de44a4161d1930956db78646bec9cb30b7903161f9fb0909d93ffbcdd91d4a72cf5eaa1819e5f98f3cd166f4562936d3f323c78b2a5b9e9e39a851a2f2bafbc3f3131a9772b5ecb763c67f582fd898ec4290d21ddea810525074ca9130efd60dd3b30d05fa7b4a0b6bcbc82e799a8899ca727e40dd8abbd306de75e59b9e77ecde02cf6f676df33e11a79cf827f2e397218ae7f26dae139d1353a7cc3d5a686ffa45ff7c5eada7d7f99939bff92d9f8e1faefe615a116303959aa16e151118195a895e024689b58e7e4c4d8be8eb6d68f6a19d17c4dedbefb1d8ee4fe505f0b9fbf7a81b034604a6c5dc82f287e2a2525edac8afc254f4ebaee98764f1ed603b225f68e5c5a5cb04c4d4dd45ebc78ee77b44d7d415959e5f754a8f069f385593d35af0ca580660503ea8179b53a3141cf95537f37f46c9b7d25b5996dfe95c6cb9f9d9c9ccc2b2d2d7fb4a8a8e469ad8524d619ca1bb9c6cfded04d5ecbb1b4238f6bffc1237f949c92dad0ddd3b5bf7fa0fb53b3b39ecab57cc666bcd6ac7354767765c3e58bff65dc355e59585cfa486959c5f794a84b1c64336ec8b58ea91e98253e61d26ab1ce2ae5215589adb68d9c9e6fd65bd8d6daf4e9c181be13959555cfd41f38fc05c5be2636f299bc37f802616bc0cca96b638b1e25b7fe8dd56a9d5059de23c343fd3f37a700e9728406f5f52bfceaee36cd571b7f6d7878f8505171c9737bab6bbfec487206ad4c4bf06fe9cefc44b3705ba914cb9e694f9e525bb234a45cf744d1cc8c27b7bbabed1383fd7df7aa2cd2a9bdd5755fd23def62e631f29eadb036600a7ece6767e7bf52545cfa5d2dbd89521ed5cff4f7767e5a257776451a8d2a68c4695bb4b2d696a6cf0d0f0f9dd032a1e71503f9a299e122df2bd2eed6abe7b3a26aacd1536eb7434b8a4cbee1ba1a3065f3e7b4b75efd6c7757e747b5255b47edbe039f5761820b5aff1894caae1129b7854f2aecdb9e596df6298f67ea1f557ea6b8a7bbf3fd9dedadf7c96f593db1afd812930623c152c3c678252e56b5b7367f56b34fb7e6e7173c5b5eb9fbcb69a9e9cd9add0a6a899648b8deed700edaf26c45017c8f625f2bea35e79bcd95755d6baa07a61fd2ccaef6d68f7776b4fdac7ea8baf7d6ecfbff92929cadf12c0f8bd84724ec0d9891d04c4edf9ebdfbfe4a951cac1323c377f77677dca7ca016ac3dcdfb3da1d4a128cdbb432254b8b8b09dab461775b6bf3af2bede348764eee4b15957bfe36352dbd899e57c43ec75166e7edb1d1a14ecd0abbc7c646eb94bb651ab1095349f57a676d7adb1a3616b7365ff9f9aecef6fbccd2b0ea9a7d7fa6d5159734014551caeb016ee2bf6f4a036636b9d0c3d55d5b77f0cfae04ce5a945b756b63e3c55f9e99f5669795effe92329fbb6255533fdc2e4a9570b85ca307952af1db6eb7bb322f2fffd9aadd7bbfe84c496ba1f10af7dd58fbf1cc5a540dfb5a0707fa4ff4f674bd5b397a3dfa94e96b7d921aaef879ff5ce6f0f040ad868d9f1a1d19a94f4d4f6fafababffb38cac9cd3345e6bbf07e17ec7a63460e6224d83a099a29eea7d073f1f131fe7eee9eabcb7b5f5ea4ffb952c5a5ebefb6bda5bf14ab8baeea6148ba9f5a48d684f365d69fcad99196f567979e503a565e5df49d1b091baf6e17e2cd7773cabd53e595b5b7fbf6f6626473da97b957f38a89ed8a38abd4e2b86b5ace165b4f65cb604960356d50e4b1f1d1ddcd5d9d1fe0bd3d353558af92f55eedef3bde292d2079dceb466b399edface82778553605d81ce609ea05ab11875df0b9a9b2e7fa2a3ade523aaaae950cfa7adb2aafa4b9959b92f6beada15acaceab73b6f6dce90a0e54dd9aae975e795c686ffa8f56eceddbbf77c778f661b15ffe8a7f10ae6dd0efd67e98728b1b7a7f3b6864b17fe83d9644599f317140678d90c0b17b4e59dd7e3aed2ce51d52625467b36a4a5a6a67a55b7ee8cc2047fef74a6b65a54f79e6df0427f9f8275844d6fc0deb810bf32f35d6323fb1b2f9fffdcd4e4c441ada19ccdc8ccba505656f5cd94b4f4868484576b3c5d379eb11a18d3e3321ba0ea5738d5353eb6bfbbabe34303fdfd27f54b3d595357f7252dd07e2cd1914455d5d56046e06bd47b4f70bb27cb3ada5b3fd0dfdf779beeb7d504f5353be9d482ef046b42823f2333b3d7346cbb4a2b7ea81d407a4d0144266822f0665ee79422a60133e7a9007abcea86157577b67eb0a7a7f33e2d00cf535c63aaa0a0e8f9d2f2aa6f2b93bf598d8c7bbdf131b34bb8e21e36a570642aee76acbfb7e7ddddbd3db7a8c653744e6eeef9aaddd55fd5aff1691dd3bdf56e2567fc660195324f545a44ae1a2da76618f3b406374b75ec0329ced4ae64674ab729f764ca43af26d08f6e640a445403f606911e3ca76b6cb8bea5b9f1639ad2be53b3957695e41953ddad479543f6907e317bf4e079d490f9b4846449555fafd933334b424c354d4d0c24fa667db9da64e4504f4fd77bd5e33a3633339390999ddd5a59b5fbfba5a5158f243b9dbdaa244b9a44643eab1b3a2bf5b8e34cc91d931d66d6b26a9848edb60d8946c69b23b201333466098f6253e99a213ad8dadc74dfc8c8d08db13131166752f28423296950359fdad2d2332e262627f799eebfa6cfe7940b14306555ccd666e633f4ff2ffbe6667334544c53ea7f7d5f6fdfbb8686062b555522460d624fc9aeb2476aeaf6ff1fc5474654c18012c191f14c721608ac5a20621bb037aee0f5862c6d6c6c78fff040ff8dea41dda86548bb352c8857c33597906099d502db592531ce9aad4655f0428b7997ac664bad98d8f87955e9cc542f2d56ffddbeb814585163d5bfabb4ec31cd383da461449f8de1e2aa1f165e8840a409447c03f66f0d99895f2dda15c7c8181aec3b363632543f3b3b93abea10a56acc124ddda6f9b939fdaf5ff554a2a2559960c16e4f9ad2b070548dd698feb73b2333bb212b3bf7a2766d1ed48a809948bb199c0f0208ac4d60cb34603f79592601513d338bd9f15b0d5792868466fd5b9aba5ba94ac3b02828aba926dbb4caddb84dd508c5b5fc665765fd77bf626741abd4b9366a5e8d0002c116d8920dd8db21988d17348254ecebb5787e2873c7827d13f83c0410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400081cd15f8bf2b1d52504cecfbce0000000049454e44ae426082, 0xffd8ffe000104a46494600010100000100010000ffe1006c45786966000049492a0008000000030031010200070000003200000012020300020000000200020069870400010000003a000000000000005069636173610000030000900700040000003032323002a0040001000000da00000003a00400010000002c01000000000000ffdb0043000302020302020303030304030304050805050404050a070706080c0a0c0c0b0a0b0b0d0e12100d0e110e0b0b1016101113141515150c0f171816141812141514ffdb00430103040405040509050509140d0b0d1414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414ffc0001108012c00da03012200021101031101ffc4001f0000010501010101010100000000000000000102030405060708090a0bffc400b5100002010303020403050504040000017d01020300041105122131410613516107227114328191a1082342b1c11552d1f02433627282090a161718191a25262728292a3435363738393a434445464748494a535455565758595a636465666768696a737475767778797a838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae1e2e3e4e5e6e7e8e9eaf1f2f3f4f5f6f7f8f9faffc4001f0100030101010101010101010000000000000102030405060708090a0bffc400b51100020102040403040705040400010277000102031104052131061241510761711322328108144291a1b1c109233352f0156272d10a162434e125f11718191a262728292a35363738393a434445464748494a535455565758595a636465666768696a737475767778797a82838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae2e3e4e5e6e7e8e9eaf2f3f4f5f6f7f8f9faffda000c03010002110311003f00f89a6b73f670768098e490393fe4d7bd7ecf5a5bff0066c72107972c3b700e2bc2dad8cfbbcc66720e71dbf1fd2bea3f81d67f62f0cef74198a05c291dcf5ff3ef5f179854515151ebbfa23d5c1426f99cfa1d5f8d8adacd6a58195b7e163078c8ab7f12ade79fe1bdcb5c0db71f65cb2f4c1a9c6953df6bfa62dd007cacccc0f738ff0013fa56e7c56b0137816f9083bde22323b715eb61a9d475a55e7a269597f9ff005dce2c4ce1ec95286ad5eecfcd03049898fdd1bc8183d79abb05b09a35e7a7f8d42f1fc976879923972befd7ad58d3199d9837527f0af4335a6dca2d763872dadecb9ae8b567646e640bc15e9d6af436860c8c1c7ad49676ce84e31b7d8d5c5473100465739eb5f2557da27668fa0a53a71939c5eac64488080474e959faa3077217d306b496c9e570030463d0b74acfb881fcf3819c704f6a6a72715a1bc29c233e672bb335616800209e69f05a92f92b824f35ab169b26ccb01f87351dfdf5b6928a2e66588f50a4f27f0eb5b46a4a5ee2d4f31d1716e458fb2c3042494dcdeb9159ed2a8738502b2af3c696a01511caca7a1c01fd6aa45e2eb291b0f1cd1fb900ff005ae89e1e4d7bb16442a496f63adb4d84abb63f1157b7296c0c64f19ac8d3751b4be8d0433249df00e0fe55a9e4e06140cf6a88a5c8e32e829394669a12e6d62da0fe74476b14ab8c7cbe956d2c9ae5071d073504f64f010d8381ce6bce53873ea7ad353946f1461ea9a72c2fba3fbbe958d240a5f81f95749a8c6f28ce32bf4ace5b65da72315db0a8a28e19d29bd4c5f2c46c73d699b034801e95b674e1202d8e2aa9b5064e074e735b46a29697336f92d268ce921c1e07151b9651c74c76ad3961dac475f7aab327a0ad7546d4eac65a3467939c82370f6a72c8645f6f4a90dbbe32062ab946527249ad935222a53e577098a1898375c1e6b92914798d8e9935d2dcef547ebd3b5732c7e63f5aeec3ab2673b5dcfa5ec6d15e658ca0fbf8c9ef5f52fc27b3115800c551170496e9c0af9db4ab6275001c6e20f5c74f7afa4fc1d6d241a2a00700a16fc80af99c6ca0aad376b9eae1e33709a6ce82f750853c471c81498bca20103b0e78fcab4bc4b76bae7812eae047b2321936839e9c75ae3ed375e788618d9431f2db83cf0780315d95ec17a3c3f3dadc46b14414ec0881401f857a187c656ad88b59f25bb75d3767057c3429d37afbdfa1f9a5aae2d359d423280627603e99ab9676c644ce3009fcaa4f18d9b5a78cb5a4284aadcbfe1cd5cb381da153d54818e3a57d3e61651848f9cc245cdca3dc9add4a90bbb19c0c7ad74763a6a4f6c65923c1edef58b059996453d029e98aee74eb18e6b30371ce3381d3b57914dd3ab2f791ea470f56116a2ee634fa5078cc98da00fc00acc9208d5c6d5e7d4f4fad76778f1fd9d602a33fe7ad721e224169a5deba641589b047ae315589a308c6f04146a4f9f96a6e709e26f1bca2492d34e3e5aa9da67ee7e9e95c54cb2cf2b333b4b29e4b39a6cf310485196cf6a3cd7605402011c91df9a74e9aa6ac91bca4e4f52136d3cac3bad27d96546e80fe356121b9b960b123b761b456cd9fc3bf116a31ef874eb8c633965207eb572a9182f7e490e14e73d209b39f4b99a3903076475e8c0e31f8d7a1f81bc52dabceb6376c05c63f7727f7f1d8fbd709ac687a8e85204bdb7785b3fc62aa5a5d49617b05c2315911c3022a2508d685e2fe6167076923e895730c0d12819f5acdb947e9c906af5bca2feda0b84e5648c383f51527941d88fbc6be363879d39f3496973df85685487227a99674b6922dc7f207ad66cb62622723681d8d764b008533fa9acdbe895b8239f5addb727ae87555c2aa54d4a3a9cf2c590c302b2664113311c9ae825b5fddbfce12b21e35dc412093d315a504a4dea78d5b995924644929079e4fb555966c37dd383deb52e6dd40e7ad674f81c28af5b9d72d91c91a4d495c80e7d78a82440727383d6ac36ec6318e7a9a8fca2549638f6a94cf5d53d2e65dd0cab9cf18ae55d7e76fad7653400a30c64915c8c91fef1bea6bd6c3c9599e3578b8cda67da3a7696d15fc11f0493dfaf7e0d7d2be0eb4db676d0baa92c846187a63fc2bc13c358d53c488a9f31c16dbd71debe83d11648bcb92352c62650c3f120fe95f378abac5d270daff00f0e7a583f7b0f3e7dc886950bebf70b1a0898955561f8d76de20b3960d0c412912ca536b38efd6b96d3d8c9e2b9973b8064e0fe35def89937d831ead82057d353a34e1294e2acd9e14ea4e515193ba3f323e2e69e6cfe206b61401990b1cfb8cd66787a6fdc20719193c0ea2ba8f8f49f66f88faaafde120c818ee07ff005ab98f0baa88886c16e841ed5e963637a3197a7e47958476aad7a9d6dba5bb0fba011c9cd6c59dd94dfb1860f4ac782148983b3646727deac7da9656023ebdce79af8fc4559fb58c69a3ea70f0e4a727264f717019f24804f6158be2fc41e19d4e7001610903be33c7f5ae86d2cd2ef008c499e477acaf1c69ed0f86b5418c7ee4f23a71cd7a93f6928734b6b9e7a70f69cab7387f825f0f63f1d6a721bb8c490a30ca9e3f5afb0748fd8bfc25ade96ad2dbc96c4804b40f822bc1ff0064d8c2cce4852d24bb533df15fa03e198f504b04096a7cbc0e49af29deae26576f4e88faca108c30b0b2577dcf38f879fb1d783fc2a0bc56e6f661d64b921bfa62bacf157c21d32c2cc2430c2ac1782801aefe05d4954451c2433f6607154fc571de69da7bbdcdc5940a064a3301f9f35e84f0d4dd269c1dc51a9c934949247c17fb4a7c3f55f0e4b7896ebba16e5946081ebfcabe3dd422314841e31debf4f3c57a7d8f8cb4bbdb395619e1990a308db703f43dabf3d3e2c780ee3c15e32bad2c933a93ba16039653d063d7b570e59515393a0df9a39334a6e56aabd0ef3e185dff0068f846d8e72f093137e1d3f422baa86060cc718f6ac0f85fe13bff000b6958bd0a52e36ccaabd573c107dfe51f98aecee0a2c8cb0ae7d4fa57b74e842bc5c93d2e7cfc94e8d5b3d1993773ec52a4fe18aa6eeaeb92338a7df9549cf539a823d8f9018f232076af271185e69b6cf6686396949331b543210429c0efeb58f1a947cb2ee06ba2b9b5126f60704f6359b340604e7939ae3828afdda2ab29a97b5e866de229230735445b26e6639cd68c88189c0c9a8fecc7071d0d5caf05ca89a5521525ed27a331aef1bb03a7a553761d33f8569df808586dfa77acb78c9526b6a7aa3beea3a904b2058dfbe45721231f31bea6bad921631b63a91c57252262460473935ebe1ada9e2e2ace5747deff0007f4d79bc50256e415c1e38193ff00d635f4c697a4359d8decb27fcb490328f40724ff003af0ef801a6cf777f713cb1855f30003d6be97f105a8b2d3f66000406c0a74a942a2555adb6fc8f3dce54ef4d3dffe1ce0bc2ade7ebd34a471bf18cf2715df78800fb28e304633fe7f0af3ff00053f9f7d3e06d3e632fe1eb5deeb0ae6055239392735d51d8c743f3a7f697b336bf1127907cbbfb1faff00f5eb86f0c8676dca72a4640ebd0e057a87ed5f16cf1fb36de001903bf35e6be1844863555ea18af3ee6bd2c4abe1537d91e5d0fe3d977674b248f1a9121eb44042cd1b606d07a66a4b896228ca72e54f5aab0ba4ac54f033c03c57cccb5f791f53875172f632ea76569716ab119c1cbedc64707eb506a50aeaba6cf6f265a3910ab1ef8354ed517cb0a1b1c7a75e2b774f89560f31b04b0da41ef58badedaf4a3a1d72c0fb28aa8ccbf871a07f6258acb1ea6fa5e9f6d7ce66ba5187442b903ebc1af66f097c67ba5d716db49f12f892ea48e1139b4d474f430ac276e1db680429de986079cf7e6b2be1059daea7792d83c31c8923067570082718e6be80b4f0bdc68d6131b6291c29192376195475e0638c7d462b8a0a5cd26ff03d68c6f08b5b17f53f156abe27f8796d7e2eee629ddda0963849590b0c8651d083907f4af9cf539b55b39adee13c0173ab35fc8f0c777777d24ae9b48cb4bf3feed4839e463e53d6bdd7c24cd07c3ab77662516f99848a327963c8fc79adfd2b4d4d6eede4b09a2988ff00591b2ec607b9da4f5fa574293abcbcdabb0e74b97992d353c97e1d6897764a352bcd1468d6f710e5ed99f7957cf078edeff4af2af88df0e2c7c61e3fd3b569137dbda6f3247fde0ac31f865857d59e3eb18b47d2305d9e7006e278c7b01d85789e9760b7bad69ebe579eae67dd10032c3192307d3683f8570d5a52a73b2dd7ea754145c39a4aebfa67947c4f9adf4ad7174eb6f96282218238e0b10063b6028ae461d4930176ee39e467ad6bfc4c8255f17ea025944803aa00bfc21115003ff7c9fceb9198a432850c4e7a902bbe9e2678782505fd33e56a47eb389a9293b6aff0d0bfa8ac77037a61474c7a563864832030cd5e6883c249c953db3599341b98aa0f7adeb567357969738614e319f3415ec5c2c934606dc1f6aa7736ab34079c7b9a7441a304608f6aad712b4b94e79e95f3ea93855bb67beaac6a53d4ccf2be6209e3da9f22aa20c1ddc702ac1d364f2f7ee3d33d2a9ce0a7cac083eb5eb3f69c979a3c8e4a729feed99d7f1897a550308e847e35a973f2f4aacb86c93d6b052b23bfd9547adcce910421b23200cf15c24a732b9e79635dd6a51b18dc63031d4571ad1fcc78ef5ec615ab3391c24dfbc7e9efecef2db48a9119505c6edc5770c9f7fa57b878cee310c8f9c0d9900fa62be076f105ee97ac7da34f99a22a30af192a71f87e1d2bbcd37f691f105bc06df548a3bfb411e3f7d9de3a0fbc0fd7ae6b1a38c8d187b19af99eb55c8ead75f58a2d6bad9e87d0de0db0115f2b28396625867debb3f17ea36ba55846f73288720e0919fceb87f855aeaeb9a769da908c471dc26f037671c9e335d678f2286eb49bb4906e53133649cf41906bd194a5ec653a76bdb4bec7cba828d5f6753bd99f087ed5b76b3f8bacaed41f2e54241f5c1c1af2bf0fb8fb7cf1a0e32187e15e89fb4e03f6fd2838236efc71d412315e59a24e60d443202a4a6307e95e861ea3c4e5f19bea8f37110587c638ae8ceda30b70980c036e39c55cb3d3e36425df2c5b036fd2b09a5644050e0939c9ad6d1a6582412480e42f001e335f3b29c949452d0fa7a31a4e2e737ef235e47fb3288d54a027ef1ef5345aa34316d525863a1e6b3aeeedae5931d8e6996d2b452fcea40519c0ee29468460dca0cba98e9544a123d23e13789974ed5a045831246e646c7575240fd335ee1f103e31d8787bc2534daa5f7f6758e3622edcbcf211908abfc5ea7e95f29e8fafff0061eb16f7839557c301dd4f07fcfb57d17ab781bc39f182cf4dd4ee73713c3195b7459308acca32d8f5ca8fceb927094677e8ceec1d7e7a6e9a7aafc8a7e0ff008bfa9f897c2729d06d750bfb759cbac31da794fe6724004e542e5b39c9c03d3bd63da7ed07aef84af563f13784b52b18da4ddfda36d89dd0b750e070c3e9e9c55af09acfa0e9571a7ea170f33c521568ae2e64895874da5630011d0e571c0c62ba7f0afc35b1f126acb757915ade436c330aadaaa47bf93bc8ead8ddc1724f43c60528d9d947f53daa942704e5297e0acff16750d77278e348b2d4e3bc5974f9c828f18203ae323aff005f7af20f15b5e35f4969a75cc96f7424611cb1b619095e483f9d7b2ea7ab5bf87b4c4b35dab6f06e2147185038fc735c4fc36f0b5cf8e3c4f2dc451e3cd63b58af0abd0b9f6c73ff00ebae7a8b9e4a9c35932555b45ca7b23c1fc67e16d43c38d6935ec6cf15e42268672c5bcd5f5cfafae6b889c169890b83e95fa01f197e10daf8abc131691611849b4f8956d19877518c13efcff3af8f7c47f09bc4be1c5924bdd1eea28d7fe5a08f729fc457ab5293a2f9d2b9f0d26eafeeaf65dce0e392451b4b71d39a6c2177927939edc517a7c894a6dd8ddc1a60608a013cb77af0e75e71aaa4d69d8eb8525ecdd3e6d45bb8c96fddf19f7e2a13108410cb9a517810e0f20551babbfdf71f77a803b574c92aadcd33aa10f630517adcb11dc10fc8f97d2b3f56903c8768f97a62a64941cb0719aa571261ce7bf3c50b15274f9052c2a84bda4514a5dadf331cfb55591c063e58207e74e964dcc78fca855dc0b63db9ade94137ef1a56ab3504e2ec52bc2d2c726e3dbb5712d80c79ef5dd5e1db04854e38ec3ad70ac819892dc93e95ea51495d23894e4f567d576e803b79a55947c8bc67d2b1f58da25bb50d90137364f6ad8319943c843285f990fa938ffebfe55cceb5996e594b14329f28f71cf4fe46bc692e69a47e9d0fdde1798f54f84bf1e2f3c12f1585f446f7485daa157fd64231dbdbdabe9c8bc77e1af887a3a43a76ac8c65037c4582ca0771835f0658c0de6367e555758f278e4e79fd0fe54cd7de5d0ae525b39cee1f79a36c11d39e0fbd54313385e9b5789c388c930d8ba0b109f24fbaebf23d43f6d1d0a1b093459ada30aa5760e0fa57ce9a2cc5ef63e06e0a10e6badf1bfc47d57c69e1ab5b3d5ae1ee5b4f6cc4f21cb6d3d89ea71ef5c9dac1e54e64c7deefd066bee306e3530cb91596a7e3b98519e1b13284ddd9d5c8a199011b4fa81576daf3cb1b0102b362637312b938cf07356a085546e39e0679ed5f39516ae2d687b5b414a2f53492665fdee724d135eb9e49078edd6acf86fc39ab78c7508ec34ab47b8988c7180147724f615f47f803f656d3a01049af5c497f73c136d6f9099f4cf535e73a7384b968bd0b8d47555e6b53e72f0ff85f55f165e2db6936135e4c7a955f957dd89e07e35f41f833e1af8afe1d690f7bf684ba1162592c5013b57bed27b8e78afa1343f02e9da14096363631595ba71e542a0127dfdeb55ed6de2b4d40dc148ad618d95ddba018c1af49d1738f2ccc70f1f6157dac5ebd8e0340d67c1de2cb48f529e4b5170c9965914673ebcd3fc57f137c39e16d188b4b98e49f6ed2170013dabc1754f87127da2e66b3bc912c9a66f2a6b59498dd09e09c1ea3a11ed9ef5a3e1af82b05edef9ba8debdc431e0991c92067fad78b2c457bfb38c55df53edb969387b494b41da059ebbf167c44b67631493091b2d81850b9ee7b0f7afb0bc0fe01b4f87ba025941896f6400dc5ce31b8fa0f451d8568fc33f04f87fc1fe12b55f0fa2b24a9996e19712330ea0fa63d2b716dc4e4e41f726be8b0597fd5a3ed26ef397e1e87cae3b1ef10fd9c348afc7d4e7753b6528a072f23003e99e4d25ed8a3858a7449622b8daeb9e2aea46ba95fb4a0e214f9507a81d4fe3fe156a48bed37a502e5140cd755b73ce4f5b1e31e3dfd98bc19e2f56b8934f3633c9c8b8b4f94e7e9fe20d7cdbf11bf64cd73c336f25de92c756b55c91e58c4807b8afbeae5c270a32a3803b54175a7a4d6e8eb19576e0ed1fceb96ae1695756922a33749de27e4db78567b699d2e11e2914e0ac83691f85676ab642dd060f1df3cd7e907c4df805a1f8f6d649dadfec5a9638b9897049f71debe1cf8d1f0c358f873a88b7bd88b4127dc9907c920f51fe15c9528430f49b48b8ca75aaae66792ef28fb54673eb4cb989d0fcea466aec56ec24de0f149a913232af5c57951a51941cdee7a8abf2c9413d0c6119c92071449f71b6e41fad3a79cc6c540c63ad42ae08e3a9ad68c66b7d88c45484adc9d0a373b9addd3ab106b8ed8de9fa9aee6f18a5a3b0032076ae23cc279e79f7af470e9ab92e707ab3eb38e210686092aedb8865eea7bfea0571bab5c8f3a2550176067f947381ed5a62ff0010ba3b82acb9049ea40c67fcfafe5ceea176f2ea11a86420465430ff006bd7f315e5c3e36cfd1ebc9aa1183ea5d450671890ef2eadb48cf4181c77e0d47ae61a397ccc3481382a3be69da761aec3be3787ce7d3deabf88582067424a9f4e9d4d722d6773d2778e1f93b1c5ea92a2dc491a91b5c10bcf4e9556d6e0f928589015b04547a99dacc4fc87076e7d71ff00d6aad6e3ca072720e40c9fd7f3c57de6592bd0b1f88e7f0b62dbf24769a4235c59066395c9c0f4aebbc0de0dbdf1d6bf65a45a821a43f3b9ce1147535c9f8603b698ca7b393f862becff00d93bc08ba76893f882e635f3ee412991f7635ffebe6bcdac9fb47133c3be685cefbe1b7c2ed3fc1fa6c7676100500032ce47cf29ee49af58d0b4d4b0b5b8b958c7c9f2ab63926a2d16cc0d2f70c65c8c1aea66b25b4f0e4208c33b063c74e98cfeb4a8d356e73aa73b2e532f48b18d126ba979645cfd0d7397fe1f7d61e5b42d883697940fe2723e507d875fc6bb14406df622e229061b0092093d3d0f03b7ad39b4e1042980c81ce58af2d9e39fc7bfd6bb39572a462aa59b6786e93f0e74fd2acae2d60430c724ce5e362484918fe80f4f6cfb574fe0af02acfa339da1cac8ff003c9c63000fd315d36a9a311aae55774776318f4907f88aebfce8ac7459a3b6b6db6d04659e40bcc87d3f127f5ae1a78687b4bc96c7a75313254f922f73cf3c15af9f0b78aa4d2ee67692c6f1f6ee6e91c9d011e83b1fc3d2bd275e9c4118b546db24c32c47f0afff005ffc6b85b2f074ad04b7b7288d78d97485cf4ffebfb5745a17da65bc49af0348630132c392b8c648f5e95d94a528c395f5fc0e1afc8e578f434ecedc59592e07247152a47f63b3799bfd74bd3dab46d780b13a96c8c3123a0f6f7e9cd125dc735d1631b32c4bb4a28c9fa81ebd39ade31d2e71b959d8c210c926c45efd49ad18d00da89c91d59a9c87cbb69256ce7b16ea6b3e5bb7681420c3ccde5a8f6ee6a1da9a2d5e6cbf1c2b7bb9c002207193d1bd4d793fc75f85763e3cf0ccf673a8e72629bbc6dea2bd458b87548db1120c05a8f53816f6ca58980e571f8d4ce2a707166b17caee7e3e78c743bcf07f882f749bb42935b4850e4751d88faf5ae72e276970493915f587ed89f0b258e45f11da43cc3fbabb007f0ff0b7e078fcabe4be19d91b86ec457cb4e9ca32e55b1ec41d38abb5a95e55f30b306e7dea15e0800e6acba18f70205522f8381de92e6bd99b28d370e74892fd54594879c63ad71291128bf4aecee1b75a483771b6b9344f917e82bd2a1749a6610a709ea7be5d4e5519727728c9c9e838e7f2ae7369ba955579c8c2fa03e9cd6b2289b860378182bb8e7aff009159b651797a84f9f98459ebf80fc6b8631f759f77899b72876d0b7a7cc4c8ae3e50afd31db3516b32b0b7650c1b2768047d0e73fe7a9ab0d20054a28da579007b74a8358944b6ea00254004363d07cc3f9579d1d2763e8a6bf717f23cfb567d92ef62587a7f5a6c2375baf1f329ce734bab796f28520e472c3a525b3379631d7038038afb5cae568b47e2dc451fdfc65e47a3fc2bd1e6f13eaf6da6c3d66708cdd703f88fe55fa4be0ad162d07c3eb6b100b0c56fe5a8f602be42fd8dfe1e4938bdf125cc598a2c476e48fbc73c915f6b69683fb3b91c6c60df954554a555b3870cb96923a1f0ea46f656499ce5724fb93c5743e284f2a0b72a8085033260f1df18efc11cd72be0805e2b54cfdc5dc4d761accb9b98d427a6f23904606322aa8abd263aced547a5b2ac70980197e60fb36e01e318c9fc6ad6ab6e123007ca7ae3b8ab1683e68038240f97eee79c1e0d49a8422485c8cab7185cf07debb396e9b471b959ea72739992dae6486133cb146cc912ff0011da78aade07f146afae781239b5bd2ffb275079ca883695ca29e0e0e4ff00faaba4d02dc4b25d923ee90bf43c9fea2a7bfb1592f200c711c4b9207724ff00f5aa395bfde27d2d636e64a3c8d19f651f9f18964263e70261c943ec3d4e6ae461218433ac8e59b76e5e4ff3fa53de550f120510a60fcbfdf5ea71f4ee7de961637b74655da548fdd2af4c73d3d7b51157d09bf52c89a38216c0745ea77019ff00f555392dde3456c88a465cee4e4ba37507d3b53ae7cc99162dc76c9840473b893cd5bd4b6dad9c31a6e5dc7718e4fbcbf5ff000addd926fb10af731b5994f951c49c64d67c78fb51e73e54600fa934bac4fb248893ea715474cb8339bd727e66603f2ae09cd39a47642368dcd249b2e7078cd4caeaec467af6aa5038e31d4d4ccc6220f7a22c6d1e7ff15bc3169ade933c53c224b7b84686552339e3fcfe55f96ff113c3327827c5fa8e912823ecf310adfde43ca9fcb15faf1af5b2ded9cd0b2e4ba6e507d457e77fed8de1248355b3d6a24dac736f31f5eea4ff002af2b174d6e8efc3cfb9f35c939662739fc6aa993737245452cc5095073512b939cd72c69e973a3db28fbb6d0b7311f6693dc7535cec6a762f27a0ad7bb9c8b69001ce3bd6444e4c4871fc22b7a29a4ee77fee2cb94f5c89de3bc9246e538fc07e3ec4d56b5bb21ee9c1e480339c54c6f5125dcc36c6c7a1e7bfff00abf2acdb798cf25cca7001e00fc0d7325ee367d1559a756104685a4e5cfcc4af181ee304541a94e4464127383cfb5344bb36a6413807e9d6a9ea121f298fa8f5af2a2bf787d7d59bfab268e7f51dacc5b1c9fe2e3938a4d04979bca6e8481497b8fb31ce77371c763fe73573c0da74fa8f8ab4db055dd24f3c6a7bf71fe7f0afb0cbe6a29fa1f8d67b0739c59fa73f03f44b5b0f025b5a5b46881111d947d3ad7a2dd48b6fa5c8abc17e38ae1fc1f6d3787b4dd2e6857223411ca9eab5d86af711b5b2ba1fdcc837afb7b54a9733e63994391289ade0e052de30a3e79182fe1c57673b97903b3a65599baf38effcab8ff0944d335a46064f95bb19c574e6548aee4f31c632189e9dbae2b5a4ff00776392aabcce9acc84b48db20971ce4fb9e3f4a927206770ce46707b1aaf6aa7c9197278ce431e73de9da95c88e26390404cf5c9f5393eb5e9c7489c0d6a41a0285b6ba97a892e1cfe476ff4aa3777e7edd30033b0e07d703ffaf5cb5df897c41a3f8a7c3da559e9c27d1ae20696eee8a92559989eb9c0c7eb9ad699c9ba99bb3bb1fd6b93daa71e55d19d92a7cb66fa9625b992666870ea430c9ddc8e3803eb8ad689dada3660877123047013fd91f5ef54fca16db48c956019598f2c3b1faf5ad0b7bd3282c615d9ca72382d81cfd706b682b3d5ea6327a684d6a49b8998c4a3e605540e203ea3d09e3f2aafad5d196ea30576e0679eadef5a303b88b704df907760e0c9f5ae7753b82d7ac7ccf3005da1bfa7e15759a8c2c4d35cd239ff00114859873ce0e2b37c2d334f61712138cb9c7e071fd2a7d7e41f635909c6d2467eb4df0f47e558c718e032f6f7af16fcd56fe47a7b53b1a96b20661e82accb31dd8c56644fb2e48078079ab523e48e0f35bc1e866f726b9726112b755e0e3d2be3afdb2740dde1ad536af0a04c871dbad7d8fe5799673003b66bc1ff0069df0f0d53c0f76db4122d9c67d71c8ac71116e3736a2fdeb1f95d283bf1dbd2a179b6f4e48f5ab37c3c9ba92327942455199c960474ae5a774cba894a1a0af706489f77a1acc824fdcc7fee8fe556dc1104841ed54e188f931f3fc22b78a4ae6d4aee28f43bdba31c69d480a7bf7fafe74ed2ae3742093c124b1f4ebffd7aa7772798ae436d55048edc53f4e6096c549c23678f439af39e94cfaa8be7c55d1a9b86772b74e82a0be6f321eb8e39cd40931dff0029e33e94db99782a7a7d2bce51b4cfb39cd3c319b2aef6dc0e083f975af70fd91fe1ebebde317d6a58f36d63f2c671c6f3e9f41fcebc4d54112377c57de1fb23f8760b3f855a75d2ed496e65692538ebcfafd315edd095933f3acc61cdcaedd4fa1ec6c07d8c2800617d2b2b55262d3a789811b4165ae86d4e2050a73818ac7f13c5e45a1981dc9fc5f4ada2ac99e43d59d5f83cac82c5ce36f96bb98ff08c8c9fa8aea6f34f10dc9732798d237cc49c12001d7f5ae23c265974fb1951b6ba721cf2171d09aef27b87ba9a3dea7e6855c3019ec383f9575d1564d33ccabf15cd8b3b88d6da3dcec8233838fbc00638fe5597addc059645241c230f93a1a7c575e5da3b238cc8f9e33bb20b818c5635dc865b4965c142ec1547a735d529fba92308c3de3a392cc4696c5cfcb146bbb3ec2b9d825769f794f319483b7d4e6ba2d5a6296d29078d8578f718ae623917ca3ced2483bbd39a75124d0d6a8de58d2e586d62d1c69bdc0ce78fe11dbae055a4946137c488acc172898d99f7c64fa9c9f5f4a8e094369772c23f21d8f455200fb9c038f514dfb42b7cace48e180e7071cff9fcab65a6a8c8d2727ec855b2bcf18ebc1ff1ae5b529b6166c00c3f8474add7badf7046d2aca097e9c827a8e6b95d65cc72e01f9738fc2b3aeef135a2accc9d61c4fa5dc21fee122aae837bfe8166e0e71b90e7d734fbb6cd8dc773822b0fc30e5bed56adc2a482419f423ffad5e3dff78add8f452f71dfb9d14f7e2cf73b0c973c0ad681bcef2c91824671e959b2c51caaa5c06ef57ed5b1ce3200ed5d10ea6123423982c52055eb9ae1fe24694356f0adf40ea1885390476e47f5aed2175232cdb07a66b2757923b87963cee4752ac3ea29cd7344aa7a4ae7e34fc49d19fc3de37d56c9d48d92b633e99ae5262403c7e55eff00fb60f848687f1216f11711df47bf8f553835e0d72aab1f1cd70c5ec6d256934caccc4db4800e8bcd538241e447cff08fe5534d28891fe954617fdca7fba2ba22ae8d612d6c8eae3bb52881883ce31ed5a504b880153918e48ae6ade4dcea08e33918adb8252b6ec3a0e6b93114dc3dd3dacb2b7b69299a36b28231d73cd36772493c60f02abdb498da7a7af349772ef3b8138cf4af3947de3ed6752d42cc9adf2d24a00e4e00cd7e81fecbaa2cfe1e5a585ce5032e413d54d7c1fe05b13ac789ac2d065fcc94120f39e78fd715fa37e0bf0d3787fc3b6b1c69fbc8d39f5c9e4d7526e2ae8f93c5c949281dbbdc4da43797264a1e43a9e08aabacea906a5a7cb09705b69e3183d2a3b1d645e036b76b907853fe1e86b135fb43a7a3b82590f46ff1aeae7f76f1d51e3f2a6ed2dcee3e1edc9d4fc316e146f703695cfb904fe1d7f0af40b4bc92486262c7cb3f2aab745000048e3d6bc8fe0bde62c6e2db715d8c486fc7fcfe75ea5a5c65fcf545328841528bd4296073fa7f3aeaa337284648f23110e5a924cd0b972cbe4a824ee5e09231f7bd3d3fa5375141f608517f84c609fc45436845bbc8eccadb8820636faf1c77e6a4be9b65ba3b67f78c8307b722bb13ba6d9ca959a39cd2fc73a8f88f51f12e9d75a59b182c2e4436f3107f7aa1c0c9cf527af1eb5b3a7402680965ddc63e87d6acdfa655df1d58607fc08554d1ef4aea022042a36e041ee3d3f1a857524a4ee6b51a7771563744a1eda38d9df0dbb2c8c00dc36e4f20d40233e66589dbc73b41c723afcbd7fc6a255fb2ca8a1400cc725891c640c1edf9d56b16b882e648a642ad201f303b8123dc1aea72b68ce64afaa2fcd791cfa9132175dc9845c8233b8edfa0e7eb589ae65a5707ef0ebf90abda9a3c37aa768c795f395f4ce33d7ad64ead2665661c0e2b0949da49f73782d9a31ef0e2d9c1e33585a74c2df59993a1922c0fc2b7aeb13c4b8c7de19fa572be2291ec2fad2e5073148a5bfdd3c1af2ea3e59a91db1d558e84eb5e4c651d37153c1c734f4d7b74676a3e4f6e959fa8425a50ea0f96e3763d2ab4592708093ec2b3a93a94df2a3b29d3a738f39a8fab4efc050a3d49c9ab115c793a7cd7131cb745f7aa088b6e37ce42fa20e4d52d435237ce918f9225e8a2ae329a579b1b8c65a45687c6ff00b7059a5d69fa6dee3f790ccc9bbd41ea3f957c6c643239cf7afbd3f6ccd04dc784e4645cf952799fa66be09601663d715107baec615349dfb956f976c2feb5462ff569cf615a3791b3c5203c719acc881f2d39ec2bb69fc2459a91a5e631dac0f51bb8edf8d6cdb4cdb39cf22b1c0020889181819f5ad1b762e338c600c8aac62f755cac99bf6aec6c592a98db7920f634d99b6c67381f4f5fff0055430b90a1587e351dc3e54e3bd78a97bc7e8b39274ac75bf07f558348f88fa0dcddceb05b25da19257190066bf4dac35855b58a488a4ea464e49cd7e58f823c3f2f8abc5ba569509daf753aa16e4ed5ce58fe00135fa8de09d1a3d2f49b58e75f34a44a097e0f4aeb845ead1f2f8c71bc4d882eec6f5c1921304a390474a835db745b190be1e16e0d493db44acf22a08573c293c9acebbbf22331b2b792c3a31e6b48cafa48f3651b6a85f854bf677b8c7413347f50715eb365745259d235dc0c9920641c95e0f5fad7927c33983de6a30038f9f28c4e02f61fc80fc6bd294a2dfef65670ca7201c7039ff3da8a1a53d3a338313ef4eecda902a421d4052256c939001cf5cfa0fe950eb7703ec76e43027cd4e477e45008b9d3a70b90a2524e3e5c8c0fe7fd6b1f56b830dadb6fcb6255381df9aebe7b27d8e38c6ed1d6ea400b266e806de7fe042b9fb8916c3508e56c85277023b1c8ac2f087c456f1e786b5098d84ba73dbdd8b7d929cee01bae703d3915d05cdb1beb5642c328bb82f76c11c0f7ff000ad79e3562a50ed7fcc528ca9cb966748a23beb412b00d852c46d079e87f9fe955a49215b944568d7e4520ecda41da09eded4fd22622d2db6bab6f46014e3a8639feb4922acf3178cc4e57018a6463b63d7d2bbdbbc535b9cab46d32bea32992f5177e495555007dfe9c7eb581a9161e70230776715bb71329d476c9990b2858ce3fd59e307f0ac0d6088afe45cef51c64f7ae5a96773a69bd919d69fbc9c213f2f435caf8d9dc59cecbd0735d3419595bdbe615c8f8b6f9658e68b39ca91f90c9af2aa59526d9e8415e7a1d068baf5bea1a242f70181c6ddcbce0e39a9a348266c4576bf43c1ae43e1edca3697307f9f0400b8c9cd7492589bc943084458e8c78ada127520a4d6a2b38c9c53d075e69b3a8279753dc1cd669b768a4191822ba086e23b1b7f2da70edfceaace448a5f03f0ae6a9057bdf53ba94a56b34788fed47a78b8f044ae47fac8b18fa57e6bdc41899cf7ce2bf4fbf69084cfe05754382b13b63d702bf32b511b6ee603f85c8ac62fdf683953d5942e01fb34bebb6b22323cb5e3b0adab97536929ff64d62211b17e95e852d533192b32e06cc701e09d83f956ad938319c0e2b143111c001fe007f4ad4b57db08e7ad698bd74272656a8d97d5c9e0d47231dcd8fad2060cad9ebda9aae09e4e2bcc4ac7dc4a578d8f51fd992f6dadfe306886e785dceaa7fda2a40afd2b9ee1a0b65f2c01b80239ebef5f90fe1fd6a6f0febb6d7d6cdb2e2da5596361fde0735fa61f0cbc629f103c27a36ab68e6449a2195cfdc61f794fb8391f856f7e58b4b73e7311172719bdb67f99db484e4b48fbdb3c9a6dc40f3c4768ebc066ad88b458ad22f3ae0e5f19da4f3583ac6a12094bf0234c92bed59a838be699cd29292b4107c333e5eb9a90470e3715dddb20ff9fcabd2ee15e39612a77663e9ef9af2af86b1fd963bf914970d3961ee383fd6bd7aeda36b3b496160d85192ac08cb3138e2b6c3eb4dfdff0089e5e2349fe059499ac6d04673b8ed3b8f6383cfe954b5af9d2d571c99a323e99153b055b572ee0e0e572dc9001c83fcaa96ad70556cb38c99138fc6b54f468e75ba669dd44b06992044033229c0ab3a35cee240f9588e243fc1c8f9aab5f4a4e9aec3b32ff314fb24319dca7f76532e01eab91915df15efa6bb184be164ba7bc9677724321c24916148e39f331c7d46456aa048f7b018dcfb5bd48f4aced523335b8922ff005b10e08ef891b23f2a8d673f67498b11b9f24672071935aeb4f421fbda92dd379f71bbf85e201b9c1c77c7bd737aaae65ca93b780335ac2fd4dceefbd85cab0e8a73d4fb5665cb19a369e43b817383ebcd72bb4efa9bc7dd663eb17c34db391ba3b0e3dabcf75591e442c7ef48ac2ba8d666fb75f153cc69c9fad63ea30a1b1b99cf0123207e35e2d57ed5d96c8f529da1ea5bf00325be8c822c15323798ebd49cf15b9777a5b80f81e83b571bf0e6731785ddcf399c9c7d40add9d4c0e1c9dcac3835b3a8fd846dd8ba504eab4c9e4d920f98b66acdd5d0b6b458d4e0f524f5acafb4333806ac6a68c561dbfc4306b1837c927d4ee9c52691e6bf1ff500be17991ce365b163f8f5afcd5d4a432dcc8e3bb135f7d7ed51ac2699e0fd5d8392fe525ba73dcf5fe66be0090e7258f5a715efb6ce68ebb142f1f16ee01ed5968e362f1daafdeffaa7c7a566237c8bf4af5292f74c6abb344eb700c50f3d1706b46d6e3036e722b0d4fee940f4ab1677211b04f1ebe95ad58f3ab9c781adec6763723b9dac734e79037cca306b3d6500f3ce6a712868f23a8ae070b6a7d5c2b7345c5b22690acc4919afbcff00605d643f81b5a33b8296d760448dc85dc32c7f4fd6be09b96070c0f35eddfb2f7c641f0fb56b8d2ae2458acefdd5833fddde3800fd734ea5e31534b6381cb9a52a4de8cfd31b9d72c85abca17ed89d5e489c1d9f51d4572ba85cc37513cb1db5cb4454ff00cb3278fad56f05c163793dbeab2c255e74dd1c2589001ee7d7fcfe1de6b56466b3792288042b8c0f4a9a719558f337f23cea96a52e5471be07f9ec650cbe5a0760c0f5e71c9fc057a1e9b7ab73671c0718000c26700e7af3fe79af3af0c5dc7a76af3594c7625cf31e7a6e1d57f1fe95d4dac4f6f2490a1da4a961b78fc695376b5bd0e7ac9eb7f53aa08f0fcb20555903053d3e6ed593acc8805a3b7f05cc6bc7d715463d4eea6023997e750cab23a9dc060f19fa541ad6a50ce90aa49c79e983d32430abba6f432845dd5cd2f0e78d23f15e91a998eda4b66b7b81114973938239e95d1f876e85c46573ba6881283d4f6cd67c91c767a7dc4830a7729cff00c08552f0cde083559d81054c673861f20c8f9bf0aea8ca54e51e67766534a4a4e2ac75cb2367cacb060c5972ff002f53dbd7fc6a10e4c000c82b217001c7419fe950477e914e55dbce894964c360839e7b74e9fad5ef90c3e6428c0be486ddd09fc2bd16d4e3b9cbb339eb8944da8615ca975e9273bce4707eb552feecc566c080360c051d3352ddc937f6eb5b803798b939070091d2b9ed6b508a18dd0b7caa7926bca6dea8ed8ad8ce94110bbb7de6359de20945b7862eddb1b9fe51515d788a16550391db9ac0f1beaae9e1ddce700a9755f72702b9276841dbb1d304dc95cdaf032887c2e8ec306462c33e9d056f59dcac98127cc87b1ed59ba3c19f0a69a2304e6143c0e7a558b2d3ee77f10c873ed54938422add0de0a33e677b6a6bcba3ace9e640d923f87a114c923210175f96319c9ab5676925bb6fb890443fba0e4d52f116a0aba45e3a70150807d6aa318ad2d62a55256b5efe67c69fb6078a73a3a5aabfcd7570588ff657fcafe55f21b4fbf1e95edffb55eafe7f89adad77fcb1465801ee71fd2bc210654639ace9c74e666b4b56d7621bc98085f8eb596af851f4ad0bd43e4b7e759ab9c0af469a5ca71d793e7d451fead48f4a01e07afad3d10b42a7daa3e8456d7b9e74a16d4b504ec8a01e455812e47155c0fdc0cfaf7a62b32007a8ac5c533d5a75651493d89a67e33d29f0ca63911d4e082083e955dd95d78a7a1c0a4d685295e773f4a7f676f8a965e2bf8776b7b3c8167b14d9382790475c7f4fa8aea878abc5fe2cd77ccbb593c33e0ab36dd279c36cb7636f00907a1cfdd1e8335f057ecfff00121fc1fe228b4f9dc7d86f678c9dcdf2ab8e84fb671f957d9badf8d6e7c51a9c50c5992ce0215214c9defc027df93c578d3c447029b9eafa2efebe877cb0b3c6cd72e8b767412c9653f8e74f96dad24b7b562c049b02875c71dfdebd9745b96468ad2e48329ff552ff007c7a5739a678556cf4cb59350d8b7af1e1a20326307d7dfa5745159ff69695b564db736e728ffe7d78fcebae942aabcea6ef5b7e87995e549be4a7b2ea5e96d167b875780339ced5070491e9f9d794bea173178a8dacf29901b9c8ec3ae7815e9f717d71359473a2af9c81739383c1c607e55e69e248bcbf1b5bdc602f9b286651d9bbd75ce3ee29a38a937cfcacf5ad71c3e8b7abb883b33907a735e6fe11d46e65d65d5a763b633b413f79b70c035b16bf1034ef144de27d2ecc4cb75a53343379a9b558f72bcf233f4ae47c2ba9a69dac5df98c52278cc6cc06480581e3df8aca738d449a7a7f917cb28369a3d40ead22f96fb771cfef31e99e7fad6ed86a466b3457e37a21cf6cb0e2b98d3fc45677f1988bc6a66c465d80fdde07de00f527bd7476baad8c56a65cc2190793e40703781d1f3dbe95d34e57ea734fd087cc0ba90b8921dd3a210403f7304727e95e73e23b8fb55fddc208738c823a1aeae7d76c879b6a2e095552c2ed7ef4ad9076918c8ee3f0ae375647ff008483ce5188e45e4f6a527a9a4363928229350d4d618d76a2610b7f33585f16f5b582ce1b689bef36d51ea077fcebbdba862d2e295d786909c11c607735e4bab27fc247acdc5e119b5b6188c763815e66293e5e45bb3be8b4e5cccf73f026aa27f09e9662f997c940491ed8fe95ab3ebb22c8d121c11d4e38af22f835ae6a33f87264822fb447697662f2bfbd130cedcfa83bb1f5af58744f393e51b64e84f5fa1ab75653a71e5d0b842319be616591e4552ef927b29e056178baec2d89b353f33279ac07a0e95a06ee35ba9e563e5c1073239e871dabcdbe2978e6dfc1de17d5bc43787123c2cf1c478dabfc23ea6a610716df7d0aad51356e88f82be3e6aedabfc44bf52702df116076c73fd6b82801c86cf150eafadcfad6ab797f70e5ee2e65695dbdc9cd243725571d6bb1c1c63643c24e377cdb926a132985cf7208ac5046055cbe93721159e0f15d14a3689cd88a9cf50b71106d94542e413444d8840ed8a6e6b44acce59bba48b51b7ee3e9c50006418a6237fa39fad3901282a2c76d3d6de842e083914e497b1a26c800d4356b546127c93d0d2b390ab839e9ce6bef1fd8fee97c41a147a95d36f5d2c6cc9ff9e87a7e4a335f025acbb5c026bef3fd91f4892cfe11215ca49a9de493bb1ed1a8083ff413f9d7978aa11a9384a5d1dcf5e962b930b3517be87d3f1eb3fda88cd0e48e4ee27a8009cfd3bd6b6893cf1c884e555f824f423b1ae5fc390c61da15cb6c8ced5c6771ec0fd6ba5d0350b78b092c33b2ab06185078f4cf15d5abb3ea784da5b17ae4988a8670b187662edd0120e791ebd3f1ae0f5e8906b167b50a62e95429392013c0aedb56be8b316c2668159f109561c638fc45703afdc2aea561b6569985c44de63756c91c9fce8a92b45a0a6af34cf42bad3eded8ea7345024524e85a474500b9c60127bd79ef82ac05f6b1a8131a4a8b0ee7de3385dc3247b8af49d52506c6ec0ff9e4ff00a035e67e0a58df50bc96497caf246f5e71bc82085fc4e07e359cd2bc6ddd96af66cedf49b3d2246675f95e15c6ce419bfda19e17b715ad71a769f0ed8ccc13cc0099013b47d4609ac5d353fb4f50b86901b2b966dc14805493ced18f4f6ae9f55d0666d0ad0790cb346499a4620601c6e63ea063f2aec8c1b5748e694927ab301b48d36e9ee1ad01936296680be1954757241c1033d3ad72b725e6d5628d18496e3187504061579628acf58f2defca218b2654e8cd9c84c0cf5c01f8d497333c3a95ff009d6e2da5e4f92060467b8c7b5672f7ba58d62b959c4f8ff536691ace0c9dff002961d96b949615b0f0dcaca30ef903ebd2ba1d57f7b2cd36dce5f033e95cb78b6ebc9b0f294855552c7b015e6e2344ea33be9abda08edff67ad3cdaf83639402ad79772499ef81851fc8d7b75c400d9ab48aaf8f515e09f0a3c613699a259da5c58078600c52485be600b13ca9ea79ec457abbfc4af0f4f65b24d412c9b183f69ca01f89abc262297b2f8adf81588c3568ceee2ff333f5916d347246d6d1143c32e0ff00435f267ed7baf68779e07d4ececeec5c6a16b2c69344246ca1246320f5afa6752f13e8d329f235ab09c1e7f77709fe35f1f7ed59a5f8534af0cea779a5de4536abaadf46f2c69387c6324e06781d7f3ac7daaa95d28bb95ec9c69be64cf8fcf071d2a68db18a630cb5377ed38ce6bdadd1c51f71ea3e71f21e73c55419ab2ed946fa556005547444544afa0f8cfeea8a4889294b8aa3264887111f63524670a0d423a1a7c4c7150d1d749ea87cc738a80f53534870a2a02688935fe21d1fdeafd1cf8243fb0be1a787eddbe568ed60f307a160091fad7e73d9b22dcc6651988302e3db3cd7e9178375fd07c7de02b49740bb431a22a613878d9540c30ec457357b5d5c50bfb3b2ee7ac7832ef76b379117dae46431fe11c735b9621eddd933b191447bcf4ea3773eb8e6bcaad7c41369b25adf44fb65d8559ba7cc0f35d343e32bbb0b64b9de8c3002498c328e7a7d726b961592ba7d0254deeba9e99717ce628a48a7d863c14dc721be520f1cf5ce07b9af25d72e33e24b589032279e8115fef000a800fbf15d059fc47b1f9bed164e00002367791d324b75ce791e9ef5c7ea1aa417de2bb19e1dfe5bdcab2f9872dcb0eb555aac2715cac546128ceed1ebdad5df97697bed049ffa0d70bf0eb749a85fafd992e54c4e5839036018cbf3fddebf85757adbf9b69784703ca73fa5715e05b8b7b5d659ae1a4444cb2ec207cc1811bb3fc3c73ed56b56afddfe827b33d174fb996d633716d72f3c1149ccbb14f987f84e48fc7fa56f6b7acea1671ec7be905c12a4aa44a766e07824e3e9589a6dbdbea334e3edbb6132196ea68f0638e4ff00a663ab29f6f6ad2d434d176971e7df81732b2b222804360646e7e8bf43e95e8c39b974fcce37cb7d4c6949824b2134675265664d890aaaa9c1c80dd78e1ba76ed5cd5e5d14d4664fb4fdb260d833b71e67a9adbd45add846b16ae96915b3ef94b0dbb5dc1f9727efe7a6400315c15eea90dcf8ba4102c71c084288e07dc8300700f7ae5ad3e5b7aff5fd7fc13a29c7984be84c33c89260007703ea3b579ef8a1c6a1796b66bf324b30dd8ebb473fcc0af4cf17048f4bf34fcac323ebed5e43a1df1bdf1549bd4b450c65b7638e324ff215e5660f929727f31ec65d0e7aca5d8ee7c192a45653eee0a6f524f7c1228d7a38ae34e8a7c0f2c380de8735ccf86352fed1f09ddcfb8054b975dd9ea0b13fd6a1d6750b88743b2f2e43f679d970beb9381fcebc0e7b53e5b6963eba31f7b57a9c8f8eb428ad6f266f2d40688b05c75e2be37f14fee35cbc8b716512b63f3afb2bc74d75a85fc90b390d15bb363a128a07f3cfe95f16f89e52faedeb1ea656fe75d994abd7a96d8e2cd1a5420efadcc9b823b5415248c491c7148402339afaf5a23e2aa7bd26d0c27e523daa2fc6a5209538ed508ad1195c923fbb4ea6c432bf8d3f1499220a9626c03511a721c77a966f49d98f90eea8c8a7b7d6999e08a115517713bd767f0bbe27ea7f0c7c4115fd93b496ccc05c5a96c2cabfe3e86b8ca334a5153566650938bba3f513e1af8afc33f14fc1b0dde9d2c52c4e4b3c6a4799039eaac3a835a67c3973621e189d26b66fba1ff86bf2ff00c33e2ed67c1ba926a1a26a571a65daff00cb4b772a48f423a11ec6bddbc31fb6f78bf4d8961d62cacf5850306551e4c87eb8e3f4ae19e1f4d15cd7da6bb9f5849a7dee769882b0e857a53b4fb09db5ad2d9c2f1728080c0f7af9e20fdb6b4ebb5c5de897d6e4f51148920fd715b5e1cfdadfc1cfae69b2dd3df5a4514caeef2c1b828ff80935c2a8b8bf859d3ed3add1f636a772896171191cb44f9fa915e7b74ab15e61002a093c7d6b96bafda5fc037fbe4b6f145932bae02bca23619f626a6b4f8d9e1bbe50b06a9a74e4ff00766427f9d75ca7caecd1cd15d533b5d270970adc673835d35ecea6cc630703a9ae074bf1869970a1dae2342790d9e2b4e5f1469f1c2c0de4730f42f8a50a8a3a21ca2dea51d75a20589551c7502a878663f3b51465cf0c39acdd6fc73a742cc5a7b651e87935ca5c7c6dd0740712dceb7696eaa73b370c9fc2b0d1cd346b7b46c7abf8eed6f6ead64112c62354e01900c7e19cd789ebde21b8d37439ed6cec96dae1d1a296f339ceeea41c75e3033d2b2bc69fb60f84deccc7672dc6a138e088a160a7f160a2bc6af7e3dbf8af5482ced2c9a05b8708cf3b00aabdce067240cf7adb1143daa7391785af2a525182d59edbe12f1341a478066b679021690b80c792a01a93c45e28825d0bc3f6e2409e5ac7e664e3f8857877897c7b6715fc56f2ca2186050a2327a281d38ee6b91d43e29ac8f218f7cc40223cf039ef5f291c2626b36e0b47f95ee7ddbad86c3422aa495d5bf23de7c7bf112cb4fd62faf0c89244f6cd08c1e80f7fd0d7c95ab5f0bed42e27030b248580fa9a9753d6ef357766b894b0639da3a0acd6522bea30181faade5277933e5730c6ac4da34d5a285c823dfd298c714038a4af5ec782e570270ac3d45438a95bee9a880ab445c923fbbf8d3aa6ba816dee268d33b55d80cfb1a880e09a9bdc56129cbd69b40e2865c741ccc69b8cd2b31228dc48a48d5d9ee3697ad2679a5ee6a8c5a0a692734b9c1c6293a9a44b4387228c51d31403417157171498a52d814ccd081f916edb54bcb31fe8f773c0074f2a565fe46acb78a75a7186d5ef88f4372ffe35964f145164432d49a9de5cf135dcf2e7fbf231fe66a1cf5ee6a31d6a40691a40715e011cd0ad2412078d99194e4329c114ede546052348d8eb526ed456bd46cacf239791cbbb72598e4d2c687710700fd699934aac78e7bd574222e37bb2d088851c7eb513a93c0e87bd2348c5bad366e1c0f4150933aaa4a167643767cd8cf7a6ed20678c52e4fa9a541b8e32403e95a1c5eeb76b09e512add381cd419f6ab272518e4f3ef55e9a0928ad8fffd9, '12345', '2021-07-19', NULL, 0);
INSERT INTO `student` (`Student_id`, `course_id`, `reg_id`, `title`, `last_name`, `first_name`, `middle_name`, `suffix`, `house_block_lot_num`, `street`, `prk_vill_sub`, `brgy`, `city`, `province`, `zip_code`, `nationality`, `civil_status`, `religion`, `sex`, `phone_number`, `birth_date`, `birth_place`, `email_add`, `section`, `year_level`, `cor`, `type`, `student_status`, `account_status`, `e_signature`, `pic`, `password`, `date_submitted`, `date_verified`, `patinfo_status`) VALUES
('2018-00002', 7, 16, NULL, 'Pineza', 'Dina', 'Lirazan', '', '', 'Something St.', 'Prk. Something', 'Brgy. Something', 'Something City', 'City Province', '8100', 'Filipino', 'Single', '', 'Female', '09123456789', '1999-07-24', 'Tagum City', 'dlpineza@usep.edu.ph', '3IT1', '3rd Year', 'student_cor/certificate-of-registration-92803_1626229908_1626597052_1626678903.pdf', 'Undergraduate', 'Currently enrolled', 'Active', NULL, 0x73747564656e745f69642f64696e615f313632363637383930332e6a7067, '$2y$10$0KBsWpBYuTUmIGJiQ3QeNu3RYHOGXEjfCJPgtl6c304ZheOLQ.3YC', '2021-07-19', NULL, 0),
('2018-00003', 7, 19, NULL, 'Prollo', 'Jan Andrianne', '', '', '', 'Something St.', 'Prk. Something', 'Brgy. Something', 'Something City', 'City Province', '8100', 'Filipino', 'Single', '', 'Male', '09123456789', '1999-07-24', 'Tagum City', 'jamprollo@usep.edu.ph', '3IT1', '3rd Year', 'student_cor/certificate-of-registration-92803_1626229908_1626597052_1626679332.pdf', 'Undergraduate', 'Currently enrolled', 'Active', NULL, 0x73747564656e745f69642f5f563941303331345f313632363039373137335f313632363637393333322e4a5047, '$2y$10$5zH0zu8mA0e0qaDhRihFnOZrUhXzxj2YXXP66xibuhtLhv1Ew1ure', '2021-07-19', NULL, 0),
('2018-00159', 3, 23, NULL, 'Dawang', 'Jibb', '', '', '', 'Something St.', 'Prk. Something', 'Brgy. Something', 'Something City', 'City Province', '8100', 'Filipino', 'Single', '', 'Male', '09123456789', '1999-07-24', 'Tagum City', 'jedawang159@usep.edu.ph', '3BSNED1', '3rd Year', 'student_cor/certificate-of-registration-92803_1626229908_1626597052_1626679719.pdf', 'Undergraduate', 'Currently enrolled', 'Active', NULL, 0x73747564656e745f69642f6973746f636b70686f746f2d313037373536373938322d363132783631325f313632363233373437305f313632363637393731392e6a7067, '$2y$10$OGehkxC51EZoOhhy4FmyI.XKJE.lbC/kZEq8h28aF7kbjMcWGNBJa', '2021-07-19', NULL, 0),
('2018-00161', 7, 20, NULL, 'Dela Cruz', 'Allayssa George', '', '', '', 'Something St.', 'Prk. Something', 'Brgy. Something', 'Something City', 'City Province', '8100', 'Filipino', 'Single', '', 'Male', '09123456789', '1999-07-24', 'Tagum City', 'agadelacruz@usep.edu.ph', '3IT1', '3rd Year', 'student_cor/certificate-of-registration-92803_1626229908_1626597052_1626679492.pdf', 'Undergraduate', 'Currently enrolled', 'Active', NULL, 0x73747564656e745f69642f434a424e363836315f313632363232393930385f313632363637393439322e6a7067, '$2y$10$zR2WZwp/HysGydSuZxVx9OOZu0MlVe11NOPf4AxtF4emS/11jL206', '2021-07-19', NULL, 0),
('2018-00234', 7, 22, NULL, 'MuÃ±ez', 'Darlen Rose', '', '', '', 'Something St.', 'Prk. Something', 'Brgy. Something', 'Something City', 'City Province', '8100', 'Filipino', 'Single', '', 'Male', '09123456789', '1999-07-24', 'Tagum City', 'drsmunez@usep.edu.ph', '3IT1', '3rd Year', 'student_cor/certificate-of-registration-92803_1626229908_1626597052_1626679595.pdf', 'Undergraduate', 'Currently enrolled', 'Active', NULL, 0x73747564656e745f69642f6973746f636b70686f746f2d313037373536373938322d363132783631325f313632363233373437305f313632363637393539352e6a7067, '$2y$10$jtfkpYh2e5JHqB.t12LGveWSRuJpUG25jdCI9hs.TTXsBNFKe0T0e', '2021-07-19', NULL, 0),
('2021-00001', 7, 24, NULL, 'Potter', 'Harry', '', '', '', 'C St', 'Prk. C', 'Brgy. C', 'C City', 'C Province', '8100', 'Filipino', 'Single', '', 'Female', '09521452142', '1999-12-25', 'C City', 'harry@gmail.com', '1IT1', '1st Year', '', 'Undergraduate', 'Currently enrolled', 'Active', 0x89504e470d0a1a0a0000000d49484452000001300000021c0806000000717df223000000097048597300000ec400000ec401952b0e1b000041d749444154785eeddd097864d75de77dada5aa5249a57ddf5a6b776be956ef6dbbdb5becd8244e9c10629210028190306102f3c030c0f0c2bc2c7979199810664870124292992c182780e37d8be3b5f7456ab5f67d57692955492595a492e677bc40b0dd6e2d55a592f4ede7e927e0aeaa7befe7de3a75cefffccfff4445f10701041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104020c204a223ec7c42763acb81a598959595d8e5e540ec722010bfbcb212f3daff2ec746454547c5c5c5cdc7c55b7c3131314bb1b1712b213b113e1801048226b0ed1bb0c5057fc2fcdc6cea8cd793e3f54ee78c8d8e54793dd339f3f3f3c9f373732981a895d8f8f8f825674aea606e6ede958c8cacd64447f2b0cd669f548336a7c66c3968da7c1002080455605b36604b8b0b16355c89336ab0da9a9beeeeede93e31353999af462b617e7ecea21ed752bc257e2e3a3a7a797139109f98983867b3d916a2d5fd8a8d8d8d723a53260a8b8a5f2c28287e252d3db3393ede32131b171f08aa3c1f8600021b16d8560d586071214e0d54cac8d040fdd5c6cbf7f6f7f5d68f8d8de669e818adde556b6171c9858cccacb6f48cccae2467ca487c5cfcbc7f71c11e1717bbb8b4b4649d9c182f1b1e1a38ecf14c17fb66677396979763aa6b6a7f90671ab2b48cd604ab7d66c3e27c000208044d605b346081a5a5d805ff5cf2406ff7b1f3674ffd627757e7a140607925253575480d5773764e6e43e59eea279d296983b171717ef5bc02ea51bd25ceb5b4b4f86a5c6c71d19f34ee1addddd27ce5debedede63fa9cf1dd7baaff715769c55336bbc3458c2c68cf1f1f84c08604b67c03a686cb363539b1ebc2f9331f6b6cb87c8fc7e34929282c6ca8af3ff8fd5d65152f24253b87e3e2e2fd1a062ead556a7ecee7181f1bd97df6f4cbff717cdc55515151f5645dfda16f295ed6cb9072ad9abc1e81e00b6cd9064c31ae58dfac37cb345c2d2dcd778dbb5c45b97979ad75fbeabfbfabb4fc856467ca6042826d7ea364ea95457ba7a78a2f9c3bfdc9e6a62befcfcdcb6fbce5f63bff28352db343013302fc1b05e6fd086c40206e03efddb4b79a99c5e1c1fe7da75f79f1975a5a9b6f494d4b1bbaf1c4c9afd6d6d5ff40c3c45e8b2561cdbdad6b5d8c7a6f66a8d9333d357effb47b3aa7bbbbf3e6332fbff8b9e3276efeef4acde88b21e562d39e030e8cc0966bc016e6e7ec7d3d9d37bcf4fc8f7eb3b5b5b56e6f6ddd33276fb9edaf7272f39be2e313fca1baa5ced48cc1c9f1b1cf279e7a69b2a5b9e91ee5912d9fbcf55d9fd7f14642754c3e170104de59604b3560fe799fa3b3bde58ee79e7deaf7a7a7a7d3f6d71f78e2d63beefa9394d4f41ef594423e9c4bcbc8ea99181fbddf35e12a6d6d6b79575a664687cee9ef343b39cb83860002e117d8323130d3f36abc7cfe232fbdf0e3df527a43d4818387bfa980fab7939253cccc62c81baf376e8d663ca307067a0e3fffdc33bfe7999e2e78cffbeefdcf79f945af582cd60dc7dbc27ffb3922025b5b604b3460a6e7d5ddd176db534f3cfaa74b8140ecedefbaf3f395bb6b1eb22458bd0aa4877dd98f1265e3babbda6f7ee2b187ff3427277bf8a693b7fd716676de25b2f6b7f697e19dce7e76c6a3951bbe64a5e0ac444745afe8477341cfdfac49cbd10c77d87e40b7aff0faae2ce287900bfe795be3c5731ffad1b34ffd8ef2e4576ebee5b6ff51b1bbfa61ab3dd1b3be4bdef8bbb4c468696e6ef6746dddbe07cf9c79f95359d939ef4b76a6f6e993c737fee97c42a40978dc93e98ffef09f7ea5ada5e5e6a42487df96609dd70f6994d269fa0f1d3bfea0cf37d364b73bbc9176de3be17c22ba015b5af05bae5eb9fcde271e7fe4f7944d9f70dbed777ca16a6fcdbf2899d4bdd937c7664b9c99764f7ebbadadf9ceb3674e7d34332ba7512917ffa2585cd0664037fb1a39fe6b029d1dedf5cf3ff7a3fb262726f6a9018b5a092c4769e54694d56a9d1d1c1ed8f3a1fb3ef65f0381a5067ae0e17f6262c27fc8d51d51a912f1dd9d6d279f7cfc913f5c5c5c4c3a70f0d00f6a15f37224a78cadee1342ff2a9bdd3eb9bffed03f98614563c3858f69989113faa37284700be4e4e6f6949695b5381c89012dfc8fb2dbed515a3f1ba575b3898343037ba7dd53d92b2b5111fb5d0ab757388f17b1e86e65d73ff5c463bf37393999555b5bf7f8b11b4e7ed19ee888a8219a02f7fedd7b6a1ececb2f38d7ddddb5bfafb7eb66c5c7e2c379033956e805b4a0bfbfbaa6ee99788b65c8ebf546cdcece46b9ddee289fe2088585c5a7d4fbee5639267adea1bf156f39424436605e8f3bfbece9973e353a3a52b17f7ffdd337dd7cdb5f24a7a4f59b18d82618bde3216df6c4f1bdd5b51a3ac62d7476b6dfadc5e46991768e9ccfc60412ac367ffda1a38fedd95bf74347524a4b4c6cfc585676dee5c3476ff8fa873efcd13f5609a6fe8d1d8177af5720e262604a9750aee88f7f5eeb1a3f54b26b57cba1a3c7bfaefcab76cdf64464399bb8384b606ad2753a2b2bbb7b7464b8d6e371170796165d5a2bc9ccd47a9fca087c9f7a5903a3c3437fded9defa94d7e3492f2ed9d554505cd26cb5d96614f78cc867330219837e4a11d5802daa8ed7c8605fede54b173ea6b852d4e123c7be915f58724ab37e0b41bff2207ea0dd9e38999191d9d6d878b9c6353a5c93999973591f1fb25501413c753e6a0d02d9b979bd4b8b8bfd9a503285e3028a8145dc88600d97b32d5e1a5143c879df6cfa8573673ea91843b652149e2829ad7846ddf788afc1a5d9277f5a7a468b1eee98d1d1e1bd8b4b0bf66df17470116f11888b8f5f562c4c65c769bc22e1f18898062cb0b4106b02f79ab2be2d292969a26effc16f596d8913918074bd735025d7a5d4b48c0ec5c1e64c691ffffc9cf37aefe1df114060e30211d380290521f7d285d3bf3ce3f3265755ef7d22232bfb8a7eed16377e89a1ff0493ffe374a6f65be2ed931e8f2fddef5f480afd5139020208444403a6c0bda3aba3f5aea1c181930adc5fddbdbbe6fb0a8c6ea905d271b1f1f39a6898531c2f7161c1efd0ee475b6299165f0104b6b2404434605eaf3bef4ae3e59f9bf7fbe30e1c3cfab5acecdc4b5bade2a9f60309e8efb2dfef4f999df1e69840ef567e30387704b682c0a67fc95412daded17af53dfd7d7d7b54bbfe6a7149d9b396049b6f2be0fde439c6c49afd2463b58060c1313b3393b5b26cf69be40f0208845260d31b30efb4bbe04a63c3cf6a857fa0a676dff7ac367b4465dbaf16df6cd1a6f571719a41b5cdcecea46b7e9d21e46af1781d02eb14d8d4066cd13f6f6f696efc806b6cacb0bca2f2544959e593aaaa1ad1395fd7768e5e510316abbd27e31616166cebbc1fbc0d0104d620b0690d98d60cc64c4f4f16b5365f7d5f5a7afae881c347bfaa0a0f5bb2f765bc35633a9f9e9ed19592923291e8481a538f924cfc353c88bc1481f5086c5a26be72a5d214fb7aefc4c478fec143477ea0aaa6a714b8dfb20b622df196d9eadabac7cc2edf0585c567941bc6f292f53c91bc078135086c4a03a6da49d143fddd950d972f7d2c31d1e15669e8af59ed8ea9359c77c4bd543db0801ae587b5b0b75389b8630ae8d3038bb8bbc4096d37814d69c0f4454f6db97ae503eea9a9cc43478efea323c9b92d56f36bd9936f7e6eeeaaf2c1b64402ee767b98b99e9d2710f618982a35c40ef6f51ceb686fbdc79e98e8dd5bb3ef3bf19684885fefb8da4743d509e654f46ecb0e85577b9dbc0e814810087b03a6de578aaa97fe9cd20dd2f756d73cab2dd13ab4148755fd91f034700e086c3181b036608a7dc58cbb46ab7ababb8e29d8edaddcbdf741f5be366d738e2d76af385d0410789340581b30a54e24b6b55c7def9ccf97a232cc8daae0d0b2d5960cf104218040e40884b50153a9e8bcbedeeedb53d3d2bc7babebbeaba0f7969e798c9cdbc89920b03305c2d680699160dc607fef6193f7959b97df985750fc7c5c7c02bb59efcce78eab46202802616bc0fcfeb9d4f68ed6bb63e262978b4a4a9f8c4f487007e50af8100410d8b102616bc0e6e67c69bed9d902c5beda8a8a77fd48338f733b569d0b470081a00884a5015b5a5a88ebebe93c3e3434549099997525c999d24bea4450ee1f1f82c08e16084b03b6e09f4fea50adfbc5a5c598c2a292e7557162db24aeeee8a7878b4760930542de8029f33e7a627cac7cdc3556575c5cd2f9eaa26dd590dfe4ebe6f00820b00d0442df8005962ceded2d777867bc99f9f9054d968404ef3670e312104020020442de8069930bc7d0e0e0b1d898d8e59cdcbc73b131716cf81a01379e5340603b0884bc01f3f96633dc6e77617a7a66bf868faf44fa2edbdbe1a6720d08ec14819036604a5eb57677759c9c76bb334acbca9fb3db1da33b0596eb440081d00b84b41e986ac45b27c65d7b545e26da9992d217131bbb45ebdd87fe4670849d2710080462b4f3cb1b9bbf2cebfb1192aa2c5a839cb01458b22e0702167330b393bc26d2fcfa3baf636ee909b5903660cabe4f76b9c66a535253c7b5d763a3e26014fadb79df53aef87501538d458d9665617e3ed9ebf51674b6b71644ad04e2cd767c367be2987b727cd866b34fa8baaf4f450e36d4b02c2d2dc62f2d2edab4e37d7e5b6b53fdd8e8c83e6db89c14a3bd1a12b40a263b37efbcd97f55ffee5107633626366e419b496fe8989b71a343da8029f33e636a723a57e9138d4e676ab790b61cd066dc148eb97d04d46045abe76355e3913c3c3850d1dbd3754b5f6fdf4d6363a3bb7cb3bea4c5059f26e61396555eca9792923a98919979597b2abce81a1dba644f748c242458bd8a1baffa875f8d64dcbc2a1e77b4b79ce86a6f7ff7c040fffe99196ffafcbc3f5e9b2dabbd5c8a0d049663ed36dbc79d29a9c37985f9e7d5c1e8cacecebd32ee1ae952033a6951815195b9da12936d216bc0cce2edd6e6a63295ce71646767375812acd3dbe7b1e44a10786701d3db5af0fb93c64687cb8787068ef5f5f6be6b6478a4c2e7f325c6c5c5cda8a1185183d56e898fd1ee82f3c91eaf27b3bbbbabb4b5b5a5c262397d4f4646c6707a46667745e5ee47478707cea9f067b729597eada3ea78b1ea71d95da32395172f9efba59696e6db663c5e5b41416163d5eebd3fcecece698a8fb7f8545034697272a268746464eff8b86bd7c50be7ef52231b6fb55967d3d3d20773f3f21ab5d4efd4e8c840a362d62ef31ef508fdea9d456495e19035608a7fd94647876b551f7e393d33b3393626664bb4e87c3111d8a8c0c2c2bcdd14ee6cb874f117fb7a7b8e7b3c9e2c0d13e77272f31b8e1c3df698aab19cb7d9ed13fa6f1ab6c5fa971697ac3e6d86ecd126cf93e3aeca9191e1fdc34383d56dcdcd37343534dc545858d85fb7ffc0f7265d238f2625a70ce83b35a7d1ccabf1320d15b50fa9dfa14a2fb557af5ef9e9f6b6b65b947399a486abe1c4895b7e50565ea1c9b3c4090d49fdd1d151a61316b3bc1c50abe9b76b03e68c8181defd830303fb868707f74e4c4e16f60ff4df73fefcb9f73b1c0e8fc391e4d2e75c2e2c2a3e3f34d8dbaa6d0f27d55bf4a833e25583b6ea5ee1463ddfe9fd21db3dda333d95f3f0bffce02b1aeb67dffbc19ff995ecdcfccba1bc103e1b81cd1650cea36576c69bdfddd5fe531d6dedf7689858a2c9ab9e9c9cbcf3a565154f666665359b219a7a34d7eccd68e54acce2e262a2c73d55a046e9d0a50be73f3c3931be3b2a6ac5a2c6a4797775cd3fe4e6159c53cf6846bd2ecbe884ab4acbf46eefe9ec3ca986322d2d2dbd4bdbfb3db46f5ffd834949cee1773a96f1323b84a9e7669d9b9f734e4f4de6f5f7f7ee371593d53b2b55018654bd245eb1eb18b37f85d3e91ccbccca6e2f2faf7a32afa0f0b47a689b3eaa0a590f4cbbf3a44d4c4c14aa2bdca79be6daec878be347ae80998dd317d4a4f4ac68666c4beea7b9e09f734c8c8feebd70eef46f7576761e7426a7f61d3e7aec7f9696963fa98d8e4714a45fd50a94d783f7e6b5cd9a3d6c2bada87ada6c8273e1dc994fb4b6b61e6a6ebe5a9f9a9a36959c9c3ca6ded04cf7f050b98684a9b604dbd4fefdf5df3f71f2d6bf4d4d4bef531c6b55b5f65e2faa602ac398bf23ead15d3e70f0e883ea9da5fb7c33a94a812a50dcee86f1f1f15235ac96d191e1b295e5953b93939d037afdf66cc0024b4bb19d6d4d95cb4bf3ce5467d258823561d32f3472bfbe3befccf47cc40496039665f520b4b94b767f5f77a1e2402936bb6d626ad2d56fb5d9c74d0f632bcc8a2954a2a0b92fa3bdadf5ce2b8d8d9f9cf64c6757edae79b8fec0c12f2b48deb3da86e4ed9e0205ef4d633eac86eca1dc82e2734d572ebff7dcd9333fdd3f30b0373030906eb3d9e6939292878f1fb9e187870e1ffd6e764e6eeb6a1bca6b3d753237c734fb5498bfddfa7b413db16714d376e8ff8e5e5e59895d595e8e55a72422aa2987a407b6b21288d378be78797925d6999ad665c6fa3bef6b7aed2b560c42a938a1c9f9895467355a714b81c5043554ce81819eb2bebeee9b4c8a8d77da5ba0e14bbafedd6a46348a0d8de7e4e45e52e0f99fbddee94be68b1229f19637dbaaca4ae2e484abe26a53e3c7bababaee302910478e1cfbcb5da5658f297e34a4585550f2ba5e6fc8fa15ebfa6a75edfe7f566e6589be5fb98a6745e715145c311b295b6d896e4d0e04e5786fbe4e5dd7acfe9bf91b717f42d280694890303ded2e51c3b5a4317373744c6c44ce6084f36e98fd30fd0bf34ecd02a569a861f74c4fbaf56be98a8d8d9f8f898909c98317ceebbbd6b1f4a5b39a69fdaeced6033dbddd27c65daebd26b6b21215d0e311e74f4c4c1acdcacebe64b5da26356cc99e9e9e2e1a1c1c38a018cc1ec573daf756d73e30e3f55c7e2de81d396938ba8fc9fd7d3db79c3d73e6d74dbc284375ee8e1e3bfe85fcfcc253ca8bb8e66ce146ee897a73e67b34fc6aaf6c6949f1eb952835eedbf6d9598d55481a300533ed6ef754a9c6e8be648a1746c923616a72bca4a5b9e14303037db7cfcfcfa7e6695f80da7d07be929e917b315cbf6e66aa5dbdbf78c539124c42a5e6a4a2a2a36396f5cbed57ec653e5853e50a0a5bcccc98d6c166365cbe70f3c8f0e011cdaced5d5858b068c83362e24225a5a53f4e4e4ee94fb02428cf297e2e265aa3ca95e557530ff4ec947475b6dda1b482db9f7ae2d1ffbfa2b2eac97dfb0f7e53c3985ee5276d7a25dff9b9d9d4ae8ed6f75dbe74f157c7c6c7732a2a2a1f3f74f8d85f29f6d421cbb0fc5887aab7b59a4623925e1392066cdee74b53f02f5fdd68b77e592362acbc59e8669a7b70a0e7c073cf3ef9bbbdbdddc7f5b369b1db6d6a47967234ad9d70e0d08d7facd7b4867298a42f7ec2dcbc2f6da0bfbb6c686860bf6ab355aab793b9bcbcacc4ece88082c27d2525a52f4dbb27cedb1393c6147f5af397d004e2350cb498e3a8f139d4dddd79876b6cac46b3d0e9995999edf5f587fe5e335767f44c0c9b44c9571bcdb70fd8fbf459639999d9cd15957b1e514ed32f2b19f34605aaebca2baafe593b5b3da2d9af310dcfd67c8ec17806e6e77c29dd9dedefbd70fedce7746dcee3c76ff842d5eeea071d4949433b2d2c100ccf8d7e46d01b30958f8eedefee2854f66fa66219a7cdb2888d9ee4567ebf594ef5e2f3cf7ef685e79fbb333333d373e8d0e16794577361da3d75606868f0485a77c7dd7babf70de91a27837d9d665a7f4ed5403a3a9a8f35375fb977647868b77a41f1faf2fb62a2a3350a598a33c3d7c181beda96e6a6bb745e4df5f587bfe9f379cf2624d8a6af37643359e6ead55935e39ca245fb351afa1d54e2e6418f67ba305a4bfc9234535553b7ffef35fd7f4ab356fdca1f5a55ef49634b332c3241e48b4a4bf883c1c1bee3972f5df8f4d933a77e5dd7705cbdb1fbd52837aa3716d667cbf4bcdadb9a3f78eecce9df5042d5ca818387feb6a676ffb7140ad8d13fd2c17e6ed7f279416fc09603cb716608e0f7fb2dced4d49e9dbc7987998d1d1cec29efede9399a929ae6b9f5b63bbf527fe0f0f734adee52f0b76ecce5fae2c8c8d00da5e5553f086603a659ab380ddfb2fafbba6a2f5d3aff493528d96a14668bd5cb2a2c2c7e392323ab4d719a57cb7a6bc8e670b9462bbbbb3b6ed39677bb5f79e5f9df2c2a2a79a9b4acf209afd7dd6d1a323572a6b7f35aac656525c6cc442d2efa13c75dc3f9bd3d7dc78706078e8e8d8dedd6cc625c5a5aea8002f00fe8335e713a53fa12131d2efd88ad7b124756139abe7f5231a6e6ab571a7e4e3dbbf79e7ae5853fa9db77e06fe6e6669f37c9956b79e0d7fb5adfac37b3bdb5f9fd9a05fc7533143e72f4f85feda9aefd8e664c99615f2f6a10de17fc066c6539deef9f4fd1e3beac7847afbad5eb7e7883707d9bfa11ea8ddaba3ada6ed778d17eecd80d4f1f3d7ee2cb0a5a8f69d816ad8cea4e67b2b3570d7df2e2c28299a20eca1f05cc93c7c7c72aaf365dfe787f7fff6193835753bdefbb25bbca7ee470249bc4c6b937c7ba34846d2aafd8f3cce8c8506dd395860fb7b6b4ded9dbdd73322d3dbd53499817d4888cc6c5c6fab5a781d5c4a8ccf05333887b464747cbbd5e5f5a82c532ab6295cd9555558f1714169d49d4c264cd9ccdabd10ccada572d3636cf50a77a935f34c1f2e6ab8d9f3c7ff6d46fabf13fa400ffdf68898dd22e4297193ee79b496f696ebcefdc99339f5b5a0aac2865e14b557baa1fa0f10aca23bba10f097e03a675559ae6add1a2d4690535dbb7caa2d00d295ee3cd6ef76489a6d83facc5ecfdb575f50f9af8d21b0b73f5a59856afac453b351d560367d9e8f1cd70518987b9cd4d97dfd7d6d6f241b360779782e57bf6d4fc8319bee94b7ecd8d545e6fd026351c7c212727bf414bc06aae3635fcb402ef35dddddd8714943741ff38e57e04343133eb48744c38921c2ed3cb4a4bcb6ccb2f28bca005c17dfa37b3c42464b1290dd5dc9a1c785833db0d571a2e7ea6adb5f9035ecf4cfe818387bfa0736c56e31cf4e52d0a012429607ff785f367ff83df6f7a5ec7fe5ac3e2ffad73094bcf6fa3cfc5767f7ff01bb095650d2f1693ad56ab4fddfbb1ed0e78adebd310cb72a5e1fc3105ca9d8a053ea3757017141cffd72fd8ab29040ec790ea312d6a2670435f7a7da9edeea9890acdf87d5a71b5c3eaa534d5d4ecfbba16035fb12a437bb575a65e8f794d2936f692297fa480759a7a5a95664f4fb3e038362e76d1cc22aab288191a2ad81fef5383351f6f597db5848d3e0f9a00306b6adba7a7a7be204faf163f7ff085e767fefba14347ff5c8df80bfa6f41ebf16b4d63e2c8d0c0f1c6868bbfaa9eb25531afafecadd9f76d1aaf8ddec5e0bd3fe80d58602990b0e05f48b4582c73a6ee50f04e756b7d92865ac95ac8fbeea4e424efaeb28ac7df5c8d56a348d565b24ec7c5c6a9018b5ed750cb543c50e392d1d7db758302449fd05ab8ecd2d28a1f2a36f36df5bafad63bb3a91942733ee6de99bf5d6ad06257f4c3a4c0fc4a744cf472242cf751233aa000ffdfe85c7c57af367deccce997ffeb8d965b7e578dd8c5603462fa014ad082ecbab3675ef96d3393aa7cb47fd482eaaf3b9292a92a1c415fc5a0376026b86b1215b588d5bd932bb02a1695313b335b54a0252059d9f9e7df92bfa4ca008b8b4b7653cceef520f99a1e0b53aedb0c519b1a1b7e41a91127146c9f387ce4863fd34ca202dbf6a0fe70a84133cb4b226e8da2990cd1b3767f527272bf2a3ffc9a1ab1ffb66fff812fcafe45a5efac7bef5193fa323e365c6fe26cc3c3c3655a16f48d7dfb0fddef48728eace926f1e2900b04b526be995657bda34cfd4dd30af6a5f5f62c427ed5213e805936a359c042658f0714877a4a5fa689b71e323a4ac1fb14135732c9a46b39250d1913c7c6468e9c3bf3f21f9a21545656ceb99b4edcf23bda77e0b160375e6b39afcd78adae775a33a60f2b0ef6974a10769c3ef5d21f7475b6bf4fc3dfe4f59e8fd733557ae1fce9dfeaeaec3c5a5e5ef17475cdfe6fd278ad5733b4ef0b6a0fcc0c33148b29d71738510bb8bd1b8ded84f6d243f7e9ca28b7a8be53a96a2af915a8ef3271aeb7399a296514a774a27825b4aefa8fd9e57c6c74e85853e3e55f9b724f155557d77c6f6f4dddd795d5ae19dfedbb24e99d80f403e1d5ccf7e3a6c7af06ecf7f4f777cdda4a35620f6aa6d0e493adfa8f72e0d22f9c7de55734fcbf41f7aefdf0d11bff42c3465379813f112810d4064ca573139403b64b719268d522ea53c2e4aa4a7a44a0cb864e49abf5d503f39528f5401b292c272a772af62d1fa87c2a05bfe7f46ff1ffb6afc3b50f6b6a9c6b6894d9dbd379735757c74734e3367be8f0f13fce2f287aced498dad0096f83372b9ee853cff419a5edf84fbdf2e2ef2bf1f5b3662993d22cbeb1dab89582f6d6cef696bb348bfb7e2d811b3872eca6bf504589ee50ceac6e03fa4dbd84a03660a6448aeae0e79afc1fc52594c41abb63abb06af6d112585e369b2a5425a7a45ed25dfe77abf9559d3c46b1a5452585aab9bf76105fc3f258c5bb925ca3c37bbbbadade3f38387852f95c83b575b5ff2b332be7bc02d63bf247e2edbe359aa19c5323f6c20d3127fedf33a75ff92fe7ce9df98c664e17142bfc27cd9ef65d6f65812946d87cb5e1e31a8ac62ae1f81b45c5a5cfaaf10adaace6a67ed3b7e9c183da80452b575b29148e68a50824a7a47568ffa635c576b68bb1e9052857e9c70aaedf31ed71d73b67d3cf6a48d3f4ef7ba4d12a07bce4888b8a8d56b96db575cb0a87fddb1050bd5955e65c704c8c8d5476b4b5dcdbdede768f32c0ad5a0ff870cdbefddf508e9d593fc997eb4d0f8da9bf25b7174fda6c93674fbff8fb0d97cf7d667e6e26af6effa1ffa57bd06f4a9cbfdd73a69a5ec917cf9ff9707fff70a582f67fbfa77affb7f55911594266bb7c4f82711d416dc014fb8935b5f0f5c59ad31067e6d57a1f3bf08fd9044125b52f6564649e52a9955ad545fbc5925de55f53fcaa5b551fbcea72ada8b44e8232da0b15ffb22a989fbcf25a32ebab3d567dd1e295949ae51a193e78e1dcd9cf29a174b7d6118ed7edabbf7f6fedbeef9a0a9f3b35deb59ac7c9a45168c8dd78ec86937ff8d28b3ffa7c4747dbfbd5cb0dd41f38f63ff4feb7e4269a923f2a8d73a3d978635769e90b4a99f8aee26a2c115a0df626bf26b80d98b2f0cde6999604cbac451535b56466473660e69e2aeb7ea0b26aef5f2bb9f4ff19e8ef3ba97586e55a96f3485e7ed153aa2f3ea20073b686dbd9eab1da34f1b1473396c3aa31356b82cf83fd3dfb5aae36fdacd61756eb8bb7a0ccefaf55eedef3505a7a46bb32ea57559a78939fab4d3fbca92caa3cb99663c74ffeb7975f7aee4fd488bd4755373ab402e29f6d76c7f81b276866ceb52e55b38e673f67361d3b7ce4f817d4bbeddcf40be004562510d4064cbf7a56ed006cd3af97c7049957139c5ed5596ec117996450b3bc4553f09f5779998ff6f474fe547757e7efa4a767fc4c5e7ec1f3b3b3defc81c1fe6aefe474aa66223f31d0d7776451e917a6a0dfd4d464a1e9c51614153da7e4c96f9aaa0e0ad4d370adf1393009b76ac42e1f3d76d31f9d39f5e21f5cba78eed7cc0f86868bdfb25a5f5b84add9e21cfdc8fcb27aca45478fddf0052d746f79bd4efc1a8fc6cb374320b80d981e0eb34554b233715c5fc0b0963ad90cbceb1d538db849febcacde569f96f59cbe7ce9fcafba5cae522547fed2ac6fc6e999f6d826c727a38647c76e517588635a9ae3d702eafeb2b28a27b4b3cc03a6c7a5866b4d6900d73ba79df6ef26706fb2f30f1c3af6e7afbcf8dc9f363735fe7c7a46d615ad713ca72ab9b696e6abf76aa38cf7e5e7179caeacdcf39066869914d9420f49501b30e5e224fb9564a92f6eaf9981244ef3da93a05c24ad2f5c7c48b38667559df498cab27cb8a3b3fd3619c56bc9cf6c764e4e5756764e675171c94b6abc9e494e49e9d35e7ec46082f445323131cde49e362b152e5d38fb1b972e9cf94f2afdfc63c53a3c972e9effb47ac08b353575dfd5307ec7a7a304893c6c1f13b4064c5fd0989e8ed674535f4ab36a4b6abc825e19206c2a2138d0ebb944fdea0da8067c4ea37642f68f8e8ed41417957ebf72f7de1f689a7f48bffe3e7dd9766cea4908d8fff523b5946b5e9328cf9a72e7172f9cf90de58afd675345767e21b0ac6ab15f553edd2beaad6d68517d28cf9fcf7e7b81a035604ac88c3675d0350ba9cc72d378ad6f81f276bf51a637a0188c2b37b7a0417118dffefd87be65773806226181f476b7d74cae6f66c6f3ccc8f0704d4f77cf67552f2d4dd5252eeed95bf34f9a1ca1aaea167c0082b816323aca6c81a58426fdafcda58ac23b7606f27acf81b2f3ad0a2e679acd4915fb32a59b236ea1f4f5ae61abfebb928027ccfa54fd90b814d08fd23d1834658182557c71abba6cd5f30e6203a6496865956bf9cca229a3a35d661842becd53611256b524285b659ecbd5e06befc0f855d589dfaa0f58a49db70975e8af4de715a71fda286d165265fe9a0a149176ae9ccff50582d68099c6cb6cd5a52cf465b391c74ead44713d72f5bc6ca32383b7688d5eb6d6e8b52a564836fdf5d082f8ef0ae627f7f674df6aaaa6d8edf665ffbc3f53955d3fa21f9492201e868f0a9340301bb068f52eb435b0a979f7139b4084e942b6ca61b4e146924ae11c5f5200d96ab38d32531bbe3b673659518e5dd540ffc0cd490ea74f556b4f95969636a800419dd22b7e55f1b1bcf09d0d470a8640d0bacdea71ad6859ccb2897ca937b6860231c1b88cadf3192ac09733e3f51669f838aa697ca6edc378eb340399d4dfdb7bab966e6554d7d43eb4ffc0a1fb15ab8d56e58adfd49e9def5111ce41a5027d5d952ddc613c2d0eb50181a0f5c0cc3968f868e25eaa26f35a4f6c03e7b52ddfaa388b657ada5da98cfb44ad93bca4068c5caf30de69afd753d4d3ddf51ee57bb9f754d73ca07a5fada969194db575fbff679236a6d5de961f99708d1d312b4ac2785a1c6a0302416bc04ccccbfc558c274e5983761313dbc0796dcbb72a46689b9a9c386476a5d6a6192faa1e3e59df61bad3ca014becebe9ba53c3c5c2dcbcfc97d3d233af9858ad2947a4fffbb236a8fdebc585c5849696a6cfa8ac4e89996c09d3a971980d0804ad9131c346a550c4aa7711af2e7a120dd85befcab202f8dab1bcdc64806b579f7e5510257d62030fef5ade3aa73d0ab401ef6d66ebb7f28aca7fd1ea88718d185e4df5d1fdf069a1fd0bc94e67537f5fef41ed547e97869bceb57c3eafdd1c81a035602606a6ea13cbafd7b68a373b386fce2545e651b5f7a3f60b98cdf7cdcde46ba7a27eedda44e264986e951a23ebf0e0c009efacb7b07277e523da76ae41795fffeec743f9786e25b47e392333bdabe9cae5cf0ef4f7dcada4ec0defd719a64bdcb187096a23a320be02f9d1ea7cad985aef6f2da3bc639955e32b10b04e4f4feed5fe82a95a36d4a6a545ebde35670733aeebd2cd4ef12a2e79ab7e347c5a32f4bc9615bd6581bc4926d6e2f9466d10f2bf4d46635f6ff707e7e666b3d77540de143681203760afc6c15654d8309e06ecdfdfc3a5a50587d2276e36731c0a1e5fd0178604d6303ce6a624b77b7272cfc4f8786d5a5a7a937612bf72adfd32b511f3545151e9235ae8fd8c6265a58303fd779a5dc9c3709a1c629d02c16cc056f4a55c505c6749a91426b84010f4276e8aeaac67eb4b51ad2fc990363c6927feb5ce27768d6fd3a49275746cf82605e5e30b0a8b9f54eccbf54e1fa1dc3c970a517ec5e974760ff4f77ed037375bb0c643f2f2300a04af0153cf4b333a9ad589f76b7b3562603f7113cdb4bcc73355a54a1d492a687856051fdf52d6388cf77c471d4ab38fe9eea9a9fd29a9a93dd939b9a7f58cbe63cfd7d40f4b494d6faeda5df325f5de127a7bba3ea2a55f693b0a6d0b5d6cd01a3075cb57cc0c8ffe775e35e02d0c21ffed29300994a3234337ebcb6166bb9e93119b4584e14b62f2ee5469f5a07abff97979f92faaf7bbaa1f0e935a919e9e79212b2bfb946625ef56c9ef03fa2c869261b8676b3d44d01a307360e5d5cc29c769c1fc72a91716b42cffb55e5424bdded49cd2129512976becb08627434e67da55ea4e85e70e691631716c74f876b35c2b2333fb829ecd55c71d35d4741716953c6836035129f04fa9f47419b961e1b96f6b394a701b302568c6ab01334348f5c2b4612b7f969797ac5393e3b59e69778e960ff568068cf489303c1666b30e2ddc4ef77abd155ab43d9ce870f49942036b39b472f5fa3233b3ce4d4e8ed78f8e0edfa912d48eb5bc9fd7865e20a80d980a192e9bdda6f5c71913134d754bdd3f7d899c7d7dddef595c5c8acacaca31d9f7abee0584fef66fdf23981fd19191a1135abcbd2b3b3be7596bc2dae38efab1992e2ad9f50fa6ec916624dfaf24e40a93cfb77dd5b6de9505b5015372e08216c29a1c1b95d659def13103b3ac4a7b3f166b0d5eb952273ab5e3cd256dac4ac31e86ef89d9decf333d5dad78d68c3325ad51cfe69a3799d19033909ce46c532fecc75a849fe51a1bbd5d9bd690a11f86fbb7da4304b50153ac61c99e6877991898095ceff45f2bb31c6568c8e4122d590b0b8b9ed65e91c3abbd31bc6e63025a8feb54da4a8d43e5ba357cd486c2ebab7aab6546eedcbc828735bbee568fee1e25b7162b1616d4efcdc6ae7467bf3ba837225a0d9823d1316c726ee6e7e63277f24ca47a5fb1b30adef7f5f5dca3c285fd8545bb1e63abb9f07cd94cdd2fafc753eef1780a9d29a94da6115aef9195afb7a258586f4a4a6aa3a966a18d586ed38c24b1b0f58206f97dc16dc0a26302fab2f6a90716e7f54e97aaaece8e9d8954ef2b7970b0efddfa1265e5e6e63f9d9494d24df1c2203fbdd7f83813fff27aa62bb424244a797717365af543c3508faa873caed2617363a323b7fae7e733c373251ce57a02416dc04c1d7ced22dda7076859c1d3bd260bfa7a27b01dfffdf5d4895d8383fd77690833a8e9f847f4256067ed30ddec57d79d7adcb5f6c4c451a733a555e93d1b2adbadf7cfeb739a349bd9ab7a6e65fabbdbf4f2c274391ce61d0482da8029ceb0aceef6b01a32ffb47baa726161679624d1cc638aaa19dca307bdb0a0a0f831952fa6f715a6afa182f7d1be395feeb8cb5567b3db864dd9ee601c5a93532e7ba2a34335f453c65d63b72e2e2da604e373f98c8d0904b50133a7a278c38c1a329fca26e7fae7e7b2765a205fbdce9899594ff1f0f0e0adca3bf2aafac193fa0527f37e63cfe9aadf6d7afdaed19123131313c59678cb687c5c7c507abe66a779ed623464e2bbcae9ab3765a9577d52bc306402416fc034f53c9f9b9b7369da3395e6f1b89537b3b3e26026f6d5dadafad1d1b189d25da5950fa4a6665c7da3705ec8ee221ffcaf02da2cc56a4ae728592ba0ea13176262e382b2d3b926a816b58675303636daeff3cd146b36b240cf36c3c84d7ef642d080c5cfa5a5655cd52f5f6076d65bb9b21cd83145e1b474254e53f77bf4057a97aa19f41417973e64f29036f91eefa8c39b19c2d9d9d902adcb9d4a4e49697b73e1c2f56228493b9060b58ea968a74fa111bb36c5a5eaf07a3183f8bea037609a765e48cfc86a5200d5a399a0bdbad13b26f14f85f332bbba3a3eaac5c3c9bb76953da0a9f776661e83f8b45ee7a3cce4c99ccf97a3bf1949c9c9bd498ee4be601d5d0da18a1558c735a3e9d6331d6df21c55db8dacfc6001aff37382de809972240a760e2726268e6926b254dded0213175ae7f96d99b72d2cf813c7c7478f8e8c0cdfaa2a060dea7d3dae7820cb86c278074d01016d50bb4b3d2465f324776b595b50e25f6f5c82e9d5e933ddfaff03a6ecf08a8aa887f1f238d4db0884a461d1b06956b3913d931313599313ae439a72ded6e914266955498e156d6dad9fd122f698f2f28a6f3b1c49033c71e11530cb87dc5393d54b81a5044762d280591912cc33d0e4d47c5c5cecbc266566f48c4fabf55ad3e2f0609e0b9ff59a40a81ab0190d235fd1502a4ae54c8e2d2efab7f530d20c93b560fbc3aa3d559d9b9bf7747676ee4b5a7ac2966961fe96a9e1b2badd137b14685742b563500d5850777d52626c6c60299060898ff7da4c514ab3910d7f365520240d585cbcc59f975ff4bcaa60f64f4e4e54a8a265eea65e65080f6e76aed1aa83cac1c181bbd5ebeaadacdcfd772a9c1794dca3109ef6b6fc6855bc4dd1ca877ca54fcc68043064aaa304f34215e34c9b999dc93649c916ab75dcec831acccfe7b3d62e109206cc9c86e26023da40f4a5d99999746d145ab65d773bd6747a6e7f7fef075442c85e5050f843656cb72be0cb83bdf6677143ef3009acaa1891a1007eaa7abf330ab84faa0716b4fb602608b42d5eaecfe74bd150725ac17c5f303f7f4317bf83df1cb206cc6c1b565555fd1dcd4a2e6a7384fb66555266bb39cfcffb5295b0faae9e9eeef76ae8f8a3f2f2aaff633649dd6ed7b915ae473b6169f1bcd76cc06151f6fdb82693823a843713044ace2e50b8c0a609aa1e3562242747c08311ca066cd966778c685835a83a4ab51eafbb565b8b6d9b60be661d6dde6977757777e727cd35aaf1fa86dd9e48b99c4d7aa8d5c0c46ad3e0ec79bf2f393636662e26366643eb1fdf7c1966b779fd589d88d1e6a7dad7b3c5acfbdda44be5b03f2110b206cc1cc392609dd642e647e7fdf3b1e36323776915ffb6d82854c361fd1a7b2a3b3a5a3fab8d6a93caca2afe4ec9bb66b7e7a00d59784ad726604a37698897a3358a7126e154f722683d30530b5fe919a5dad7a05ebdbb4915a7bcaaccfca036906bbb5a5efd8640681b30e54195ecaaf8be4a9a346b53d7c3eea9f1e3ea856df94aadf373bebcce8e965f19191939585252f61d95cb79d6ecfacc63b57902668650f95fc95acab6989c9cd211cc21a46ae15bc75d230714ffca484d4d6b329335c1caf0df3cb1ed71e490366086c866b78f96ec2aff8ecafbda06077a3fae2fff2ee54d6dd9044013f7eaea6affa8e25e3f959cecbc5a5c5cf280868eefb859eaf6785422fb2a4c0c4c6718affcaf29ad80e850803d683d242d892be8e868bb4f8de44a4161d1930956db78646bec9cb30b7903161f9fb0909d93ffbcdd91d4a72cf5eaa1819e5f98f3cd166f4562936d3f323c78b2a5b9e9e39a851a2f2bafbc3f3131a9772b5ecb763c67f582fd898ec4290d21ddea810525074ca9130efd60dd3b30d05fa7b4a0b6bcbc82e799a8899ca727e40dd8abbd306de75e59b9e77ecde02cf6f676df33e11a79cf827f2e397218ae7f26dae139d1353a7cc3d5a686ffa45ff7c5eada7d7f99939bff92d9f8e1faefe615a116303959aa16e151118195a895e024689b58e7e4c4d8be8eb6d68f6a19d17c4dedbefb1d8ee4fe505f0b9fbf7a81b034604a6c5dc82f287e2a2525edac8afc254f4ebaee98764f1ed603b225f68e5c5a5cb04c4d4dd45ebc78ee77b44d7d415959e5f754a8f069f385593d35af0ca580660503ea8179b53a3141cf95537f37f46c9b7d25b5996dfe95c6cb9f9d9c9ccc2b2d2d7fb4a8a8e469ad8524d619ca1bb9c6cfded04d5ecbb1b4238f6bffc1237f949c92dad0ddd3b5bf7fa0fb53b3b39ecab57cc666bcd6ac7354767765c3e58bff65dc355e59585cfa486959c5f794a84b1c64336ec8b58ea91e98253e61d26ab1ce2ae5215589adb68d9c9e6fd65bd8d6daf4e9c181be13959555cfd41f38fc05c5be2636f299bc37f802616bc0cca96b638b1e25b7fe8dd56a9d5059de23c343fd3f37a700e9728406f5f52bfceaee36cd571b7f6d7878f8505171c9737bab6bbfec487206ad4c4bf06fe9cefc44b3705ba914cb9e694f9e525bb234a45cf744d1cc8c27b7bbabed1383fd7df7aa2cd2a9bdd5755fd23def62e631f29eadb036600a7ece6767e7bf52545cfa5d2dbd89521ed5cff4f7767e5a257776451a8d2a68c4695bb4b2d696a6cf0d0f0f9dd032a1e71503f9a299e122df2bd2eed6abe7b3a26aacd1536eb7434b8a4cbee1ba1a3065f3e7b4b75efd6c7757e747b5255b47edbe039f5761820b5aff1894caae1129b7854f2aecdb9e596df6298f67ea1f557ea6b8a7bbf3fd9dedadf7c96f593db1afd812930623c152c3c678252e56b5b7367f56b34fb7e6e7173c5b5eb9fbcb69a9e9cd9add0a6a899648b8deed700edaf26c45017c8f625f2bea35e79bcd95755d6baa07a61fd2ccaef6d68f7776b4fdac7ea8baf7d6ecfbff92929cadf12c0f8bd84724ec0d9891d04c4edf9ebdfbfe4a951cac1323c377f77677dca7ca016ac3dcdfb3da1d4a128cdbb432254b8b8b09dab461775b6bf3af2bede348764eee4b15957bfe36352dbd899e57c43ec75166e7edb1d1a14ecd0abbc7c646eb94bb651ab1095349f57a676d7adb1a3616b7365ff9f9aecef6fbccd2b0ea9a7d7fa6d5159734014551caeb016ee2bf6f4a036636b9d0c3d55d5b77f0cfae04ce5a945b756b63e3c55f9e99f5669795effe92329fbb6255533fdc2e4a9570b85ca307952af1db6eb7bb322f2fffd9aadd7bbfe84c496ba1f10af7dd58fbf1cc5a540dfb5a0707fa4ff4f674bd5b397a3dfa94e96b7d921aaef879ff5ce6f0f040ad868d9f1a1d19a94f4d4f6fafababffb38cac9cd3345e6bbf07e17ec7a63460e6224d83a099a29eea7d073f1f131fe7eee9eabcb7b5f5ea4ffb952c5a5ebefb6bda5bf14ab8baeea6148ba9f5a48d684f365d69fcad99196f567979e503a565e5df49d1b091baf6e17e2cd7773cabd53e595b5b7fbf6f6626473da97b957f38a89ed8a38abd4e2b86b5ace165b4f65cb604960356d50e4b1f1d1ddcd5d9d1fe0bd3d353558af92f55eedef3bde292d2079dceb466b399edface82778553605d81ce609ea05ab11875df0b9a9b2e7fa2a3ade523aaaae950cfa7adb2aafa4b9959b92f6beada15acaceab73b6f6dce90a0e54dd9aae975e795c686ffa8f56eceddbbf77c778f661b15ffe8a7f10ae6dd0efd67e98728b1b7a7f3b6864b17fe83d9644599f317140678d90c0b17b4e59dd7e3aed2ce51d52625467b36a4a5a6a67a55b7ee8cc2047fef74a6b65a54f79e6df0427f9f8275844d6fc0deb810bf32f35d6323fb1b2f9fffdcd4e4c441ada19ccdc8ccba505656f5cd94b4f4868484576b3c5d379eb11a18d3e3321ba0ea5738d5353eb6bfbbabe34303fdfd27f54b3d595357f7252dd07e2cd1914455d5d56046e06bd47b4f70bb27cb3ada5b3fd0dfdf779beeb7d504f5353be9d482ef046b42823f2333b3d7346cbb4a2b7ea81d407a4d0144266822f0665ee79422a60133e7a9007abcea86157577b67eb0a7a7f33e2d00cf535c63aaa0a0e8f9d2f2aa6f2b93bf598d8c7bbdf131b34bb8e21e36a570642aee76acbfb7e7ddddbd3db7a8c653744e6eeef9aaddd55fd5aff1691dd3bdf56e2567fc660195324f545a44ae1a2da76618f3b406374b75ec0329ced4ae64674ab729f764ca43af26d08f6e640a445403f606911e3ca76b6cb8bea5b9f1639ad2be53b3957695e41953ddad479543f6907e317bf4e079d490f9b4846449555fafd933334b424c354d4d0c24fa667db9da64e4504f4fd77bd5e33a3633339390999ddd5a59b5fbfba5a5158f243b9dbdaa244b9a44643eab1b3a2bf5b8e34cc91d931d66d6b26a9848edb60d8946c69b23b201333466098f6253e99a213ad8dadc74dfc8c8d08db13131166752f28423296950359fdad2d2332e262627f799eebfa6cfe7940b14306555ccd666e633f4ff2ffbe6667334544c53ea7f7d5f6fdfbb8686062b555522460d624fc9aeb2476aeaf6ff1fc5474654c18012c191f14c721608ac5a20621bb037aee0f5862c6d6c6c78fff040ff8dea41dda86548bb352c8857c33597906099d502db592531ce9aad4655f0428b7997ac664bad98d8f87955e9cc542f2d56ffddbeb814585163d5bfabb4ec31cd383da461449f8de1e2aa1f165e8840a409447c03f66f0d99895f2dda15c7c8181aec3b363632543f3b3b93abea10a56acc124ddda6f9b939fdaf5ff554a2a2559960c16e4f9ad2b070548dd698feb73b2333bb212b3bf7a2766d1ed48a809948bb199c0f0208ac4d60cb34603f79592601513d338bd9f15b0d5792868466fd5b9aba5ba94ac3b02828aba926dbb4caddb84dd508c5b5fc665765fd77bf626741abd4b9366a5e8d0002c116d8920dd8db21988d17348254ecebb5787e2873c7827d13f83c0410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400081cd15f8bf2b1d52504cecfbce0000000049454e44ae426082, '', '1234', '2021-07-24', NULL, 0);
INSERT INTO `student` (`Student_id`, `course_id`, `reg_id`, `title`, `last_name`, `first_name`, `middle_name`, `suffix`, `house_block_lot_num`, `street`, `prk_vill_sub`, `brgy`, `city`, `province`, `zip_code`, `nationality`, `civil_status`, `religion`, `sex`, `phone_number`, `birth_date`, `birth_place`, `email_add`, `section`, `year_level`, `cor`, `type`, `student_status`, `account_status`, `e_signature`, `pic`, `password`, `date_submitted`, `date_verified`, `patinfo_status`) VALUES
('2021-00002', 7, 25, NULL, 'North', 'Ashin', 'of the', '', '', 'Joseon St.', 'Prk. Joseon', 'Brgy. Joseon', 'Joseon City', 'Joseon Province', '8111', 'Korean', 'Single', '', 'Female', '09236521452', '1999-02-13', 'Joseon City', 'ashin@gmail.com', '1IT1', '1st Year', '', 'Undergraduate', 'Currently enrolled', 'Active', 0x89504e470d0a1a0a0000000d49484452000001300000021c0806000000717df223000000097048597300000ec400000ec401952b0e1b000041d749444154785eeddd097864d75de77dada5aa5249a57ddf5a6b776be956ef6dbbdb5becd8244e9c10629210028190306102f3c030c0f0c2bc2c7979199810664870124292992c182780e37d8be3b5f7456ab5f67d57692955492595a492e677bc40b0dd6e2d55a592f4ede7e927e0aeaa7befe7de3a75cefffccfff4445f10701041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104020c204a223ec7c42763acb81a598959595d8e5e540ec722010bfbcb212f3daff2ec746454547c5c5c5cdc7c55b7c3131314bb1b1712b213b113e1801048226b0ed1bb0c5057fc2fcdc6cea8cd793e3f54ee78c8d8e54793dd339f3f3f3c9f373732981a895d8f8f8f825674aea606e6ede958c8cacd64447f2b0cd669f548336a7c66c3968da7c1002080455605b36604b8b0b16355c89336ab0da9a9beeeeede93e31353999af462b617e7ecea21ed752bc257e2e3a3a7a797139109f98983867b3d916a2d5fd8a8d8d8d723a53260a8b8a5f2c28287e252d3db3393ede32131b171f08aa3c1f8600021b16d8560d586071214e0d54cac8d040fdd5c6cbf7f6f7f5d68f8d8de669e818adde556b6171c9858cccacb6f48cccae2467ca487c5cfcbc7f71c11e1717bbb8b4b4649d9c182f1b1e1a38ecf14c17fb66677396979763aa6b6a7f90671ab2b48cd604ab7d66c3e27c000208044d605b346081a5a5d805ff5cf2406ff7b1f3674ffd627757e7a140607925253575480d5773764e6e43e59eea279d296983b171717ef5bc02ea51bd25ceb5b4b4f86a5c6c71d19f34ee1addddd27ce5debedede63fa9cf1dd7baaff715769c55336bbc3458c2c68cf1f1f84c08604b67c03a686cb363539b1ebc2f9331f6b6cb87c8fc7e34929282c6ca8af3ff8fd5d65152f24253b87e3e2e2fd1a062ead556a7ecee7181f1bd97df6f4cbff717cdc55515151f5645dfda16f295ed6cb9072ad9abc1e81e00b6cd9064c31ae58dfac37cb345c2d2dcd778dbb5c45b97979ad75fbeabfbfabb4fc856467ca6042826d7ea364ea95457ba7a78a2f9c3bfdc9e6a62befcfcdcb6fbce5f63bff28352db343013302fc1b05e6fd086c40206e03efddb4b79a99c5e1c1fe7da75f79f1975a5a9b6f494d4b1bbaf1c4c9afd6d6d5ff40c3c45e8b2561cdbdad6b5d8c7a6f66a8d9333d357effb47b3aa7bbbbf3e6332fbff8b9e3276efeef4acde88b21e562d39e030e8cc0966bc016e6e7ec7d3d9d37bcf4fc8f7eb3b5b5b56e6f6ddd33276fb9edaf7272f39be2e313fca1baa5ced48cc1c9f1b1cf279e7a69b2a5b9e91ee5912d9fbcf55d9fd7f14642754c3e170104de59604b3560fe799fa3b3bde58ee79e7deaf7a7a7a7d3f6d71f78e2d63beefa9394d4f41ef594423e9c4bcbc8ea99181fbddf35e12a6d6d6b79575a664687cee9ef343b39cb83860002e117d8323130d3f36abc7cfe232fbdf0e3df527a43d4818387bfa980fab7939253cccc62c81baf376e8d663ca307067a0e3fffdc33bfe7999e2e78cffbeefdcf79f945af582cd60dc7dbc27ffb3922025b5b604b3460a6e7d5ddd176db534f3cfaa74b8140ecedefbaf3f395bb6b1eb22458bd0aa4877dd98f1265e3babbda6f7ee2b187ff3427277bf8a693b7fd716676de25b2f6b7f697e19dce7e76c6a3951bbe64a5e0ac444745afe8477341cfdfac49cbd10c77d87e40b7aff0faae2ce287900bfe795be3c5731ffad1b34ffd8ef2e4576ebee5b6ff51b1bbfa61ab3dd1b3be4bdef8bbb4c468696e6ef6746dddbe07cf9c79f95359d939ef4b76a6f6e993c737fee97c42a40978dc93e98ffef09f7ea5ada5e5e6a42487df96609dd70f6994d269fa0f1d3bfea0cf37d364b73bbc9176de3be17c22ba015b5af05bae5eb9fcde271e7fe4f7944d9f70dbed777ca16a6fcdbf2899d4bdd937c7664b9c99764f7ebbadadf9ceb3674e7d34332ba7512917ffa2585cd0664037fb1a39fe6b029d1dedf5cf3ff7a3fb262726f6a9018b5a092c4769e54694d56a9d1d1c1ed8f3a1fb3ef65f0381a5067ae0e17f6262c27fc8d51d51a912f1dd9d6d279f7cfc913f5c5c5c4c3a70f0d00f6a15f37224a78cadee1342ff2a9bdd3eb9bffed03f98614563c3858f69989113faa37284700be4e4e6f6949695b5381c89012dfc8fb2dbed515a3f1ba575b3898343037ba7dd53d92b2b5111fb5d0ab757388f17b1e86e65d73ff5c463bf37393999555b5bf7f8b11b4e7ed19ee888a8219a02f7fedd7b6a1ececb2f38d7ddddb5bfafb7eb66c5c7e2c379033956e805b4a0bfbfbaa6ee99788b65c8ebf546cdcece46b9ddee289fe2088585c5a7d4fbee5639267adea1bf156f39424436605e8f3bfbece9973e353a3a52b17f7ffdd337dd7cdb5f24a7a4f59b18d82618bde3216df6c4f1bdd5b51a3ac62d7476b6dfadc5e46991768e9ccfc60412ac367ffda1a38fedd95bf74347524a4b4c6cfc585676dee5c3476ff8fa873efcd13f5609a6fe8d1d8177af5720e262604a9750aee88f7f5eeb1a3f54b26b57cba1a3c7bfaefcab76cdf64464399bb8384b606ad2753a2b2bbb7b7464b8d6e371170796165d5a2bc9ccd47a9fca087c9f7a5903a3c3437fded9defa94d7e3492f2ed9d554505cd26cb5d96614f78cc867330219837e4a11d5802daa8ed7c8605fede54b173ea6b852d4e123c7be915f58724ab37e0b41bff2207ea0dd9e38999191d9d6d878b9c6353a5c93999973591f1fb25501413c753e6a0d02d9b979bd4b8b8bfd9a503285e3028a8145dc88600d97b32d5e1a5143c879df6cfa8573673ea91843b652149e2829ad7846ddf788afc1a5d9277f5a7a468b1eee98d1d1e1bd8b4b0bf66df17470116f11888b8f5f562c4c65c769bc22e1f18898062cb0b4106b02f79ab2be2d292969a26effc16f596d8913918074bd735025d7a5d4b48c0ec5c1e64c691ffffc9cf37aefe1df114060e30211d380290521f7d285d3bf3ce3f3265755ef7d22232bfb8a7eed16377e89a1ff0493ffe374a6f65be2ed931e8f2fddef5f480afd5139020208444403a6c0bda3aba3f5aea1c181930adc5fddbdbbe6fb0a8c6ea905d271b1f1f39a6898531c2f7161c1efd0ee475b6299165f0104b6b2404434605eaf3bef4ae3e59f9bf7fbe30e1c3cfab5acecdc4b5bade2a9f60309e8efb2dfef4f999df1e69840ef567e30387704b682c0a67fc95412daded17af53dfd7d7d7b54bbfe6a7149d9b396049b6f2be0fde439c6c49afd2463b58060c1313b3393b5b26cf69be40f0208845260d31b30efb4bbe04a63c3cf6a857fa0a676dff7ac367b4465dbaf16df6cd1a6f571719a41b5cdcecea46b7e9d21e46af1781d02eb14d8d4066cd13f6f6f696efc806b6cacb0bca2f2544959e593aaaa1ad1395fd7768e5e510316abbd27e31616166cebbc1fbc0d0104d620b0690d98d60cc64c4f4f16b5365f7d5f5a7afae881c347bfaa0a0f5bb2f765bc35633a9f9e9ed19592923291e8481a538f924cfc353c88bc1481f5086c5a26be72a5d214fb7aefc4c478fec143477ea0aaa6a714b8dfb20b622df196d9eadabac7cc2edf0585c567941bc6f292f53c91bc078135086c4a03a6da49d143fddd950d972f7d2c31d1e15669e8af59ed8ea9359c77c4bd543db0801ae587b5b0b75389b8630ae8d3038bb8bbc4096d37814d69c0f4454f6db97ae503eea9a9cc43478efea323c9b92d56f36bd9936f7e6eeeaaf2c1b64402ee767b98b99e9d2710f618982a35c40ef6f51ceb686fbdc79e98e8dd5bb3ef3bf19684885fefb8da4743d509e654f46ecb0e85577b9dbc0e814810087b03a6de578aaa97fe9cd20dd2f756d73cab2dd13ab4148755fd91f034700e086c3181b036608a7dc58cbb46ab7ababb8e29d8edaddcbdf741f5be366d738e2d76af385d0410789340581b30a54e24b6b55c7def9ccf97a232cc8daae0d0b2d5960cf104218040e40884b50153a9e8bcbedeeedb53d3d2bc7babebbeaba0f7969e798c9cdbc89920b03305c2d680699160dc607fef6193f7959b97df985750fc7c5c7c02bb59efcce78eab46202802616bc0fcfeb9d4f68ed6bb63e262978b4a4a9f8c4f487007e50af8100410d8b102616bc0e6e67c69bed9d902c5beda8a8a77fd48338f733b569d0b470081a00884a5015b5a5a88ebebe93c3e3434549099997525c999d24bea4450ee1f1f82c08e16084b03b6e09f4fea50adfbc5a5c598c2a292e7557162db24aeeee8a7878b4760930542de8029f33e7a627cac7cdc3556575c5cd2f9eaa26dd590dfe4ebe6f00820b00d0442df8005962ceded2d777867bc99f9f9054d968404ef3670e312104020020442de8069930bc7d0e0e0b1d898d8e59cdcbc73b131716cf81a01379e5340603b0884bc01f3f96633dc6e77617a7a66bf868faf44fa2edbdbe1a6720d08ec14819036604a5eb57677759c9c76bb334acbca9fb3db1da33b0596eb440081d00b84b41e986ac45b27c65d7b545e26da9992d217131bbb45ebdd87fe4670849d2710080462b4f3cb1b9bbf2cebfb1192aa2c5a839cb01458b22e0702167330b393bc26d2fcfa3baf636ee909b5903660cabe4f76b9c66a535253c7b5d763a3e26014fadb79df53aef87501538d458d9665617e3ed9ebf51674b6b71644ad04e2cd767c367be2987b727cd866b34fa8baaf4f450e36d4b02c2d2dc62f2d2edab4e37d7e5b6b53fdd8e8c83e6db89c14a3bd1a12b40a263b37efbcd97f55ffee5107633626366e419b496fe8989b71a343da8029f33e636a723a57e9138d4e676ab790b61cd066dc148eb97d04d46045abe76355e3913c3c3850d1dbd3754b5f6fdf4d6363a3bb7cb3bea4c5059f26e61396555eca9792923a98919979597b2abce81a1dba644f748c242458bd8a1baffa875f8d64dcbc2a1e77b4b79ce86a6f7ff7c040fffe99196ffafcbc3f5e9b2dabbd5c8a0d049663ed36dbc79d29a9c37985f9e7d5c1e8cacecebd32ee1ae952033a6951815195b9da12936d216bc0cce2edd6e6a63295ce71646767375812acd3dbe7b1e44a10786701d3db5af0fb93c64687cb8787068ef5f5f6be6b6478a4c2e7f325c6c5c5cda8a1185183d56e898fd1ee82f3c91eaf27b3bbbbabb4b5b5a5c262397d4f4646c6707a46667745e5ee47478707cea9f067b729597eada3ea78b1ea71d95da32395172f9efba59696e6db663c5e5b41416163d5eebd3fcecece698a8fb7f8545034697272a268746464eff8b86bd7c50be7ef52231b6fb55967d3d3d20773f3f21ab5d4efd4e8c840a362d62ef31ef508fdea9d456495e19035608a7fd94647876b551f7e393d33b3393626664bb4e87c3111d8a8c0c2c2bcdd14ee6cb874f117fb7a7b8e7b3c9e2c0d13e77272f31b8e1c3df698aab19cb7d9ed13fa6f1ab6c5fa971697ac3e6d86ecd126cf93e3aeca9191e1fdc34383d56dcdcd37343534dc545858d85fb7ffc0f7265d238f2625a70ce83b35a7d1ccabf1320d15b50fa9dfa14a2fb557af5ef9e9f6b6b65b947399a486abe1c4895b7e50565ea1c9b3c4090d49fdd1d151a61316b3bc1c50abe9b76b03e68c8181defd830303fb868707f74e4c4e16f60ff4df73fefcb9f73b1c0e8fc391e4d2e75c2e2c2a3e3f34d8dbaa6d0f27d55bf4a833e25583b6ea5ee1463ddfe9fd21db3dda333d95f3f0bffce02b1aeb67dffbc19ff995ecdcfccba1bc103e1b81cd1650cea36576c69bdfddd5fe531d6dedf7689858a2c9ab9e9c9cbcf3a565154f666665359b219a7a34d7eccd68e54acce2e262a2c73d55a046e9d0a50be73f3c3931be3b2a6ac5a2c6a4797775cd3fe4e6159c53cf6846bd2ecbe884ab4acbf46eefe9ec3ca986322d2d2dbd4bdbfb3db46f5ffd834949cee1773a96f1323b84a9e7669d9b9f734e4f4de6f5f7f7ee371593d53b2b55018654bd245eb1eb18b37f85d3e91ccbccca6e2f2faf7a32afa0f0b47a689b3eaa0a590f4cbbf3a44d4c4c14aa2bdca79be6daec878be347ae80998dd317d4a4f4ac68666c4beea7b9e09f734c8c8feebd70eef46f7576761e7426a7f61d3e7aec7f9696963fa98d8e4714a45fd50a94d783f7e6b5cd9a3d6c2bada87ada6c8273e1dc994fb4b6b61e6a6ebe5a9f9a9a36959c9c3ca6ded04cf7f050b98684a9b604dbd4fefdf5df3f71f2d6bf4d4d4bef531c6b55b5f65e2faa602ac398bf23ead15d3e70f0e883ea9da5fb7c33a94a812a50dcee86f1f1f15235ac96d191e1b295e5953b93939d037afdf66cc0024b4bb19d6d4d95cb4bf3ce5467d258823561d32f3472bfbe3befccf47cc40496039665f520b4b94b767f5f77a1e2402936bb6d626ad2d56fb5d9c74d0f632bcc8a2954a2a0b92fa3bdadf5ce2b8d8d9f9cf64c6757edae79b8fec0c12f2b48deb3da86e4ed9e0205ef4d633eac86eca1dc82e2734d572ebff7dcd9333fdd3f30b0373030906eb3d9e6939292878f1fb9e187870e1ffd6e764e6eeb6a1bca6b3d753237c734fb5498bfddfa7b413db16714d376e8ff8e5e5e59895d595e8e55a72422aa2987a407b6b21288d378be78797925d6999ad665c6fa3bef6b7aed2b560c42a938a1c9f9895467355a714b81c5043554ce81819eb2bebeee9b4c8a8d77da5ba0e14bbafedd6a46348a0d8de7e4e45e52e0f99fbddee94be68b1229f19637dbaaca4ae2e484abe26a53e3c7bababaee302910478e1cfbcb5da5658f297e34a4585550f2ba5e6fc8fa15ebfa6a75edfe7f566e6589be5fb98a6745e715145c311b295b6d896e4d0e04e5786fbe4e5dd7acfe9bf91b717f42d280694890303ded2e51c3b5a4317373744c6c44ce6084f36e98fd30fd0bf34ecd02a569a861f74c4fbaf56be98a8d8d9f8f898909c98317ceebbbd6b1f4a5b39a69fdaeced6033dbddd27c65daebd26b6b21215d0e311e74f4c4c1acdcacebe64b5da26356cc99e9e9e2e1a1c1c38a018cc1ec573daf756d73e30e3f55c7e2de81d396938ba8fc9fd7d3db79c3d73e6d74dbc284375ee8e1e3bfe85fcfcc253ca8bb8e66ce146ee897a73e67b34fc6aaf6c6949f1eb952835eedbf6d9598d55481a300533ed6ef754a9c6e8be648a1746c923616a72bca4a5b9e14303037db7cfcfcfa7e6695f80da7d07be929e917b315cbf6e66aa5dbdbf78c539124c42a5e6a4a2a2a36396f5cbed57ec653e5853e50a0a5bcccc98d6c166365cbe70f3c8f0e011cdaced5d5858b068c83362e24225a5a53f4e4e4ee94fb02428cf297e2e265aa3ca95e557530ff4ec947475b6dda1b482db9f7ae2d1ffbfa2b2eac97dfb0f7e53c3985ee5276d7a25dff9b9d9d4ae8ed6f75dbe74f157c7c6c7732a2a2a1f3f74f8d85f29f6d421cbb0fc5887aab7b59a4623925e1392066cdee74b53f02f5fdd68b77e592362acbc59e8669a7b70a0e7c073cf3ef9bbbdbdddc7f5b369b1db6d6a47967234ad9d70e0d08d7facd7b4867298a42f7ec2dcbc2f6da0bfbb6c686860bf6ab355aab793b9bcbcacc4ece88082c27d2525a52f4dbb27cedb1393c6147f5af397d004e2350cb498e3a8f139d4dddd79876b6cac46b3d0e9995999edf5f587fe5e335767f44c0c9b44c9571bcdb70fd8fbf459639999d9cd15957b1e514ed32f2b19f34605aaebca2baafe593b5b3da2d9af310dcfd67c8ec17806e6e77c29dd9dedefbd70fedce7746dcee3c76ff842d5eeea071d4949433b2d2c100ccf8d7e46d01b30958f8eedefee2854f66fa66219a7cdb2888d9ee4567ebf594ef5e2f3cf7ef685e79fbb333333d373e8d0e16794577361da3d75606868f0485a77c7dd7babf70de91a27837d9d665a7f4ed5403a3a9a8f35375fb977647868b77a41f1faf2fb62a2a3350a598a33c3d7c181beda96e6a6bb745e4df5f587bfe9f379cf2624d8a6af37643359e6ead55935e39ca245fb351afa1d54e2e6418f67ba305a4bfc9234535553b7ffef35fd7f4ab356fdca1f5a55ef49634b332c3241e48b4a4bf883c1c1bee3972f5df8f4d933a77e5dd7705cbdb1fbd52837aa3716d667cbf4bcdadb9a3f78eecce9df5042d5ca818387feb6a676ffb7140ad8d13fd2c17e6ed7f279416fc09603cb716608e0f7fb2dced4d49e9dbc7987998d1d1cec29efede9399a929ae6b9f5b63bbf527fe0f0f734adee52f0b76ecce5fae2c8c8d00da5e5553f086603a659ab380ddfb2fafbba6a2f5d3aff493528d96a14668bd5cb2a2c2c7e392323ab4d719a57cb7a6bc8e670b9462bbbbb3b6ed39677bb5f79e5f9df2c2a2a79a9b4acf209afd7dd6d1a323572a6b7f35aac656525c6cc442d2efa13c75dc3f9bd3d7dc78706078e8e8d8dedd6cc625c5a5aea8002f00fe8335e713a53fa12131d2efd88ad7b124756139abe7f5231a6e6ab571a7e4e3dbbf79e7ae5853fa9db77e06fe6e6669f37c9956b79e0d7fb5adfac37b3bdb5f9fd9a05fc7533143e72f4f85feda9aefd8e664c99615f2f6a10de17fc066c6539deef9f4fd1e3beac7847afbad5eb7e7883707d9bfa11ea8ddaba3ada6ed778d17eecd80d4f1f3d7ee2cb0a5a8f69d816ad8cea4e67b2b3570d7df2e2c28299a20eca1f05cc93c7c7c72aaf365dfe787f7fff6193835753bdefbb25bbca7ee470249bc4c6b937c7ba34846d2aafd8f3cce8c8506dd395860fb7b6b4ded9dbdd73322d3dbd53499817d4888cc6c5c6fab5a781d5c4a8ccf05333887b464747cbbd5e5f5a82c532ab6295cd9555558f1714169d49d4c264cd9ccdabd10ccada572d3636cf50a77a935f34c1f2e6ab8d9f3c7ff6d46fabf13fa400ffdf68898dd22e4297193ee79b496f696ebcefdc99339f5b5a0aac2865e14b557baa1fa0f10aca23bba10f097e03a675559ae6add1a2d4690535dbb7caa2d00d295ee3cd6ef76489a6d83facc5ecfdb575f50f9af8d21b0b73f5a59856afac453b351d560367d9e8f1cd70518987b9cd4d97dfd7d6d6f241b360779782e57bf6d4fc8319bee94b7ecd8d545e6fd026351c7c212727bf414bc06aae3635fcb402ef35dddddd8714943741ff38e57e04343133eb48744c38921c2ed3cb4a4bcb6ccb2f28bca005c17dfa37b3c42464b1290dd5dc9a1c785833db0d571a2e7ea6adb5f9035ecf4cfe818387bfa0736c56e31cf4e52d0a012429607ff785f367ff83df6f7a5ec7fe5ac3e2ffad73094bcf6fa3cfc5767f7ff01bb095650d2f1693ad56ab4fddfbb1ed0e78adebd310cb72a5e1fc3105ca9d8a053ea3757017141cffd72fd8ab29040ec790ea312d6a2670435f7a7da9edeea9890acdf87d5a71b5c3eaa534d5d4ecfbba16035fb12a437bb575a65e8f794d2936f692297fa480759a7a5a95664f4fb3e038362e76d1cc22aab288191a2ad81fef5383351f6f597db5848d3e0f9a00306b6adba7a7a7be204faf163f7ff085e767fefba14347ff5c8df80bfa6f41ebf16b4d63e2c8d0c0f1c6868bbfaa9eb25531afafecadd9f76d1aaf8ddec5e0bd3fe80d58602990b0e05f48b4582c73a6ee50f04e756b7d92865ac95ac8fbeea4e424efaeb28ac7df5c8d56a348d565b24ec7c5c6a9018b5ed750cb543c50e392d1d7db758302449fd05ab8ecd2d28a1f2a36f36df5bafad63bb3a91942733ee6de99bf5d6ad06257f4c3a4c0fc4a744cf472242cf751233aa000ffdfe85c7c57af367deccce997ffeb8d965b7e578dd8c5603462fa014ad082ecbab3675ef96d3393aa7cb47fd482eaaf3b9292a92a1c415fc5a0376026b86b1215b588d5bd932bb02a1695313b335b54a0252059d9f9e7df92bfa4ca008b8b4b7653cceef520f99a1e0b53aedb0c519b1a1b7e41a91127146c9f387ce4863fd34ca202dbf6a0fe70a84133cb4b226e8da2990cd1b3767f527272bf2a3ffc9a1ab1ffb66fff812fcafe45a5efac7bef5193fa323e365c6fe26cc3c3c3655a16f48d7dfb0fddef48728eace926f1e2900b04b526be995657bda34cfd4dd30af6a5f5f62c427ed5213e805936a359c042658f0714877a4a5fa689b71e323a4ac1fb14135732c9a46b39250d1913c7c6468e9c3bf3f21f9a21545656ceb99b4edcf23bda77e0b160375e6b39afcd78adae775a33a60f2b0ef6974a10769c3ef5d21f7475b6bf4fc3dfe4f59e8fd733557ae1fce9dfeaeaec3c5a5e5ef17475cdfe6fd278ad5733b4ef0b6a0fcc0c33148b29d71738510bb8bd1b8ded84f6d243f7e9ca28b7a8be53a96a2af915a8ef3271aeb7399a296514a774a27825b4aefa8fd9e57c6c74e85853e3e55f9b724f155557d77c6f6f4dddd795d5ae19dfedbb24e99d80f403e1d5ccf7e3a6c7af06ecf7f4f777cdda4a35620f6aa6d0e493adfa8f72e0d22f9c7de55734fcbf41f7aefdf0d11bff42c3465379813f112810d4064ca573139403b64b719268d522ea53c2e4aa4a7a44a0cb864e49abf5d503f39528f5401b292c272a772af62d1fa87c2a05bfe7f46ff1ffb6afc3b50f6b6a9c6b6894d9dbd379735757c74734e3367be8f0f13fce2f287aced498dad0096f83372b9ee853cff419a5edf84fbdf2e2ef2bf1f5b3662993d22cbeb1dab89582f6d6cef696bb348bfb7e2d811b3872eca6bf504589ee50ceac6e03fa4dbd84a03660a6448aeae0e79afc1fc52594c41abb63abb06af6d112585e369b2a5425a7a45ed25dfe77abf9559d3c46b1a5452585aab9bf76105fc3f258c5bb925ca3c37bbbbadade3f38387852f95c83b575b5ff2b332be7bc02d63bf247e2edbe359aa19c5323f6c20d3127fedf33a75ff92fe7ce9df98c664e17142bfc27cd9ef65d6f65812946d87cb5e1e31a8ac62ae1f81b45c5a5cfaaf10adaace6a67ed3b7e9c183da80452b575b29148e68a50824a7a47568ffa635c576b68bb1e9052857e9c70aaedf31ed71d73b67d3cf6a48d3f4ef7ba4d12a07bce4888b8a8d56b96db575cb0a87fddb1050bd5955e65c704c8c8d5476b4b5dcdbdede768f32c0ad5a0ff870cdbefddf508e9d593fc997eb4d0f8da9bf25b7174fda6c93674fbff8fb0d97cf7d667e6e26af6effa1ffa57bd06f4a9cbfdd73a69a5ec917cf9ff9707fff70a582f67fbfa77affb7f55911594266bb7c4f82711d416dc014fb8935b5f0f5c59ad31067e6d57a1f3bf08fd9044125b52f6564649e52a9955ad545fbc5925de55f53fcaa5b551fbcea72ada8b44e8232da0b15ffb22a989fbcf25a32ebab3d567dd1e295949ae51a193e78e1dcd9cf29a174b7d6118ed7edabbf7f6fedbeef9a0a9f3b35deb59ac7c9a45168c8dd78ec86937ff8d28b3ffa7c4747dbfbd5cb0dd41f38f63ff4feb7e4269a923f2a8d73a3d978635769e90b4a99f8aee26a2c115a0df626bf26b80d98b2f0cde6999604cbac451535b56466473660e69e2aeb7ea0b26aef5f2bb9f4ff19e8ef3ba97586e55a96f3485e7ed153aa2f3ea20073b686dbd9eab1da34f1b1473396c3aa31356b82cf83fd3dfb5aae36fdacd61756eb8bb7a0ccefaf55eedef3505a7a46bb32ea57559a78939fab4d3fbca92caa3cb99663c74ffeb7975f7aee4fd488bd4755373ab402e29f6d76c7f81b276866ceb52e55b38e673f67361d3b7ce4f817d4bbeddcf40be004562510d4064cbf7a56ed006cd3af97c7049957139c5ed5596ec117996450b3bc4553f09f5779998ff6f474fe547757e7efa4a767fc4c5e7ec1f3b3b3defc81c1fe6aefe474aa66223f31d0d7776451e917a6a0dfd4d464a1e9c51614153da7e4c96f9aaa0e0ad4d370adf1393009b76ac42e1f3d76d31f9d39f5e21f5cba78eed7cc0f86868bdfb25a5f5b84add9e21cfdc8fcb27aca45478fddf0052d746f79bd4efc1a8fc6cb374320b80d981e0eb34554b233715c5fc0b0963ad90cbceb1d538db849febcacde569f96f59cbe7ce9fcafba5cae522547fed2ac6fc6e999f6d826c727a38647c76e517588635a9ae3d702eafeb2b28a27b4b3cc03a6c7a5866b4d6900d73ba79df6ef26706fb2f30f1c3af6e7afbcf8dc9f363735fe7c7a46d615ad713ca72ab9b696e6abf76aa38cf7e5e7179caeacdcf39066869914d9420f49501b30e5e224fb9564a92f6eaf9981244ef3da93a05c24ad2f5c7c48b38667559df498cab27cb8a3b3fd3619c56bc9cf6c764e4e5756764e675171c94b6abc9e494e49e9d35e7ec46082f445323131cde49e362b152e5d38fb1b972e9cf94f2afdfc63c53a3c972e9effb47ac08b353575dfd5307ec7a7a304893c6c1f13b4064c5fd0989e8ed674535f4ab36a4b6abc825e19206c2a2138d0ebb944fdea0da8067c4ea37642f68f8e8ed41417957ebf72f7de1f689a7f48bffe3e7dd9766cea4908d8fff523b5946b5e9328cf9a72e7172f9cf90de58afd675345767e21b0ac6ab15f553edd2beaad6d68517d28cf9fcf7e7b81a035604ac88c3675d0350ba9cc72d378ad6f81f276bf51a637a0188c2b37b7a0417118dffefd87be65773806226181f476b7d74cae6f66c6f3ccc8f0704d4f77cf67552f2d4dd5252eeed95bf34f9a1ca1aaea167c0082b816323aca6c81a58426fdafcda58ac23b7606f27acf81b2f3ad0a2e679acd4915fb32a59b236ea1f4f5ae61abfebb928027ccfa54fd90b814d08fd23d1834658182557c71abba6cd5f30e6203a6496865956bf9cca229a3a35d661842becd53611256b524285b659ecbd5e06befc0f855d589dfaa0f58a49db70975e8af4de715a71fda286d165265fe9a0a149176ae9ccff50582d68099c6cb6cd5a52cf465b391c74ead44713d72f5bc6ca32383b7688d5eb6d6e8b52a564836fdf5d082f8ef0ae627f7f674df6aaaa6d8edf665ffbc3f53955d3fa21f9492201e868f0a9340301bb068f52eb435b0a979f7139b4084e942b6ca61b4e146924ae11c5f5200d96ab38d32531bbe3b673659518e5dd540ffc0cd490ea74f556b4f95969636a800419dd22b7e55f1b1bcf09d0d470a8640d0bacdea71ad6859ccb2897ca937b6860231c1b88cadf3192ac09733e3f51669f838aa697ca6edc378eb340399d4dfdb7bab966e6554d7d43eb4ffc0a1fb15ab8d56e58adfd49e9def5111ce41a5027d5d952ddc613c2d0eb50181a0f5c0cc3968f868e25eaa26f35a4f6c03e7b52ddfaa388b657ada5da98cfb44ad93bca4068c5caf30de69afd753d4d3ddf51ee57bb9f754d73ca07a5fada969194db575fbff679236a6d5de961f99708d1d312b4ac2785a1c6a0302416bc04ccccbfc558c274e5983761313dbc0796dcbb72a46689b9a9c386476a5d6a6192faa1e3e59df61bad3ca014becebe9ba53c3c5c2dcbcfc97d3d233af9858ad2947a4fffbb236a8fdebc585c5849696a6cfa8ac4e89996c09d3a971980d0804ad9131c346a550c4aa7711af2e7a120dd85befcab202f8dab1bcdc64806b579f7e5510257d62030fef5ade3aa73d0ab401ef6d66ebb7f28aca7fd1ea88718d185e4df5d1fdf069a1fd0bc94e67537f5fef41ed547e97869bceb57c3eafdd1c81a035602606a6ea13cbafd7b68a373b386fce2545e651b5f7a3f60b98cdf7cdcde46ba7a27eedda44e264986e951a23ebf0e0c009efacb7b07277e523da76ae41795fffeec743f9786e25b47e392333bdabe9cae5cf0ef4f7dcada4ec0defd719a64bdcb187096a23a320be02f9d1ea7cad985aef6f2da3bc639955e32b10b04e4f4feed5fe82a95a36d4a6a545ebde35670733aeebd2cd4ef12a2e79ab7e347c5a32f4bc9615bd6581bc4926d6e2f9466d10f2bf4d46635f6ff707e7e666b3d77540de143681203760afc6c15654d8309e06ecdfdfc3a5a50587d2276e36731c0a1e5fd0178604d6303ce6a624b77b7272cfc4f8786d5a5a7a937612bf72adfd32b511f3545151e9235ae8fd8c6265a58303fd779a5dc9c3709a1c629d02c16cc056f4a55c505c6749a91426b84010f4276e8aeaac67eb4b51ad2fc990363c6927feb5ce27768d6fd3a49275746cf82605e5e30b0a8b9f54eccbf54e1fa1dc3c970a517ec5e974760ff4f77ed037375bb0c643f2f2300a04af0153cf4b333a9ad589f76b7b3562603f7113cdb4bcc73355a54a1d492a687856051fdf52d6388cf77c471d4ab38fe9eea9a9fd29a9a93dd939b9a7f58cbe63cfd7d40f4b494d6faeda5df325f5de127a7bba3ea2a55f693b0a6d0b5d6cd01a3075cb57cc0c8ffe775e35e02d0c21ffed29300994a3234337ebcb6166bb9e93119b4584e14b62f2ee5469f5a07abff97979f92faaf7bbaa1f0e935a919e9e79212b2bfb946625ef56c9ef03fa2c869261b8676b3d44d01a307360e5d5cc29c769c1fc72a91716b42cffb55e5424bdded49cd2129512976becb08627434e67da55ea4e85e70e691631716c74f876b35c2b2333fb829ecd55c71d35d4741716953c6836035129f04fa9f47419b961e1b96f6b394a701b302568c6ab01334348f5c2b4612b7f969797ac5393e3b59e69778e960ff568068cf489303c1666b30e2ddc4ef77abd155ab43d9ce870f49942036b39b472f5fa3233b3ce4d4e8ed78f8e0edfa912d48eb5bc9fd7865e20a80d980a192e9bdda6f5c71913134d754bdd3f7d899c7d7dddef595c5c8acacaca31d9f7abee0584fef66fdf23981fd19191a1135abcbd2b3b3be7596bc2dae38efab1992e2ad9f50fa6ec916624dfaf24e40a93cfb77dd5b6de9505b5015372e08216c29a1c1b95d659def13103b3ac4a7b3f166b0d5eb952273ab5e3cd256dac4ac31e86ef89d9decf333d5dad78d68c3325ad51cfe69a3799d19033909ce46c532fecc75a849fe51a1bbd5d9bd690a11f86fbb7da4304b50153ac61c99e6877991898095ceff45f2bb31c6568c8e4122d590b0b8b9ed65e91c3abbd31bc6e63025a8feb54da4a8d43e5ba357cd486c2ebab7aab6546eedcbc828735bbee568fee1e25b7162b1616d4efcdc6ae7467bf3ba837225a0d9823d1316c726ee6e7e63277f24ca47a5fb1b30adef7f5f5dca3c285fd8545bb1e63abb9f07cd94cdd2fafc753eef1780a9d29a94da6115aef9195afb7a258586f4a4a6aa3a966a18d586ed38c24b1b0f58206f97dc16dc0a26302fab2f6a90716e7f54e97aaaece8e9d8954ef2b7970b0efddfa1265e5e6e63f9d9494d24df1c2203fbdd7f83813fff27aa62bb424244a797717365af543c3508faa873caed2617363a323b7fae7e733c373251ce57a02416dc04c1d7ced22dda7076859c1d3bd260bfa7a27b01dfffdf5d4895d8383fd77690833a8e9f847f4256067ed30ddec57d79d7adcb5f6c4c451a733a555e93d1b2adbadf7cfeb739a349bd9ab7a6e65fabbdbf4f2c274391ce61d0482da8029ceb0aceef6b01a32ffb47baa726161679624d1cc638aaa19dca307bdb0a0a0f831952fa6f715a6afa182f7d1be395feeb8cb5567b3db864dd9ee601c5a93532e7ba2a34335f453c65d63b72e2e2da604e373f98c8d0904b50133a7a278c38c1a329fca26e7fae7e7b2765a205fbdce9899594ff1f0f0e0adca3bf2aafac193fa0527f37e63cfe9aadf6d7afdaed19123131313c59678cb687c5c7c507abe66a779ed623464e2bbcae9ab3765a9577d52bc306402416fc034f53c9f9b9b7369da3395e6f1b89537b3b3e26026f6d5dadafad1d1b189d25da5950fa4a6665c7da3705ec8ee221ffcaf02da2cc56a4ae728592ba0ea13176262e382b2d3b926a816b58675303636daeff3cd146b36b240cf36c3c84d7ef642d080c5cfa5a5655cd52f5f6076d65bb9b21cd83145e1b474254e53f77bf4057a97aa19f41417973e64f29036f91eefa8c39b19c2d9d9d902adcb9d4a4e49697b73e1c2f56228493b9060b58ea968a74fa111bb36c5a5eaf07a3183f8bea037609a765e48cfc86a5200d5a399a0bdbad13b26f14f85f332bbba3a3eaac5c3c9bb76953da0a9f776661e83f8b45ee7a3cce4c99ccf97a3bf1949c9c9bd498ee4be601d5d0da18a1558c735a3e9d6331d6df21c55db8dacfc6001aff37382de809972240a760e2726268e6926b254dded0213175ae7f96d99b72d2cf813c7c7478f8e8c0cdfaa2a060dea7d3dae7820cb86c278074d01016d50bb4b3d2465f324776b595b50e25f6f5c82e9d5e933ddfaff03a6ecf08a8aa887f1f238d4db0884a461d1b06956b3913d931313599313ae439a72ded6e914266955498e156d6dad9fd122f698f2f28a6f3b1c49033c71e11530cb87dc5393d54b81a5044762d280591912cc33d0e4d47c5c5cecbc266566f48c4fabf55ad3e2f0609e0b9ff59a40a81ab0190d235fd1502a4ae54c8e2d2efab7f530d20c93b560fbc3aa3d559d9b9bf7747676ee4b5a7ac2966961fe96a9e1b2badd137b14685742b563500d5850777d52626c6c60299060898ff7da4c514ab3910d7f365520240d585cbcc59f975ff4bcaa60f64f4e4e54a8a265eea65e65080f6e76aed1aa83cac1c181bbd5ebeaadacdcfd772a9c1794dca3109ef6b6fc6855bc4dd1ca877ca54fcc68043064aaa304f34215e34c9b999dc93649c916ab75dcec831acccfe7b3d62e109206cc9c86e26023da40f4a5d99999746d145ab65d773bd6747a6e7f7fef075442c85e5050f843656cb72be0cb83bdf6677143ef3009acaa1891a1007eaa7abf330ab84faa0716b4fb602608b42d5eaecfe74bd150725ac17c5f303f7f4317bf83df1cb206cc6c1b565555fd1dcd4a2e6a7384fb66555266bb39cfcffb5295b0faae9e9eeef76ae8f8a3f2f2aaff633649dd6ed7b915ae473b6169f1bcd76cc06151f6fdb82693823a843713044ace2e50b8c0a609aa1e3562242747c08311ca066cd966778c685835a83a4ab51eafbb565b8b6d9b60be661d6dde6977757777e727cd35aaf1fa86dd9e48b99c4d7aa8d5c0c46ad3e0ec79bf2f393636662e26366643eb1fdf7c1966b779fd589d88d1e6a7dad7b3c5acfbdda44be5b03f2110b206cc1cc392609dd642e647e7fdf3b1e36323776915ffb6d82854c361fd1a7b2a3b3a5a3fab8d6a93caca2afe4ec9bb66b7e7a00d59784ad726604a37698897a3358a7126e154f722683d30530b5fe919a5dad7a05ebdbb4915a7bcaaccfca036906bbb5a5efd8640681b30e54195ecaaf8be4a9a346b53d7c3eea9f1e3ea856df94aadf373bebcce8e965f19191939585252f61d95cb79d6ecfacc63b57902668650f95fc95acab6989c9cd211cc21a46ae15bc75d230714ffca484d4d6b329335c1caf0df3cb1ed71e490366086c866b78f96ec2aff8ecafbda06077a3fae2fff2ee54d6dd9044013f7eaea6affa8e25e3f959cecbc5a5c5cf280868eefb859eaf6785422fb2a4c0c4c6718affcaf29ad80e850803d683d242d892be8e868bb4f8de44a4161d1930956db78646bec9cb30b7903161f9fb0909d93ffbcdd91d4a72cf5eaa1819e5f98f3cd166f4562936d3f323c78b2a5b9e9e39a851a2f2bafbc3f3131a9772b5ecb763c67f582fd898ec4290d21ddea810525074ca9130efd60dd3b30d05fa7b4a0b6bcbc82e799a8899ca727e40dd8abbd306de75e59b9e77ecde02cf6f676df33e11a79cf827f2e397218ae7f26dae139d1353a7cc3d5a686ffa45ff7c5eada7d7f99939bff92d9f8e1faefe615a116303959aa16e151118195a895e024689b58e7e4c4d8be8eb6d68f6a19d17c4dedbefb1d8ee4fe505f0b9fbf7a81b034604a6c5dc82f287e2a2525edac8afc254f4ebaee98764f1ed603b225f68e5c5a5cb04c4d4dd45ebc78ee77b44d7d415959e5f754a8f069f385593d35af0ca580660503ea8179b53a3141cf95537f37f46c9b7d25b5996dfe95c6cb9f9d9c9ccc2b2d2d7fb4a8a8e469ad8524d619ca1bb9c6cfded04d5ecbb1b4238f6bffc1237f949c92dad0ddd3b5bf7fa0fb53b3b39ecab57cc666bcd6ac7354767765c3e58bff65dc355e59585cfa486959c5f794a84b1c64336ec8b58ea91e98253e61d26ab1ce2ae5215589adb68d9c9e6fd65bd8d6daf4e9c181be13959555cfd41f38fc05c5be2636f299bc37f802616bc0cca96b638b1e25b7fe8dd56a9d5059de23c343fd3f37a700e9728406f5f52bfceaee36cd571b7f6d7878f8505171c9737bab6bbfec487206ad4c4bf06fe9cefc44b3705ba914cb9e694f9e525bb234a45cf744d1cc8c27b7bbabed1383fd7df7aa2cd2a9bdd5755fd23def62e631f29eadb036600a7ece6767e7bf52545cfa5d2dbd89521ed5cff4f7767e5a257776451a8d2a68c4695bb4b2d696a6cf0d0f0f9dd032a1e71503f9a299e122df2bd2eed6abe7b3a26aacd1536eb7434b8a4cbee1ba1a3065f3e7b4b75efd6c7757e747b5255b47edbe039f5761820b5aff1894caae1129b7854f2aecdb9e596df6298f67ea1f557ea6b8a7bbf3fd9dedadf7c96f593db1afd812930623c152c3c678252e56b5b7367f56b34fb7e6e7173c5b5eb9fbcb69a9e9cd9add0a6a899648b8deed700edaf26c45017c8f625f2bea35e79bcd95755d6baa07a61fd2ccaef6d68f7776b4fdac7ea8baf7d6ecfbff92929cadf12c0f8bd84724ec0d9891d04c4edf9ebdfbfe4a951cac1323c377f77677dca7ca016ac3dcdfb3da1d4a128cdbb432254b8b8b09dab461775b6bf3af2bede348764eee4b15957bfe36352dbd899e57c43ec75166e7edb1d1a14ecd0abbc7c646eb94bb651ab1095349f57a676d7adb1a3616b7365ff9f9aecef6fbccd2b0ea9a7d7fa6d5159734014551caeb016ee2bf6f4a036636b9d0c3d55d5b77f0cfae04ce5a945b756b63e3c55f9e99f5669795effe92329fbb6255533fdc2e4a9570b85ca307952af1db6eb7bb322f2fffd9aadd7bbfe84c496ba1f10af7dd58fbf1cc5a540dfb5a0707fa4ff4f674bd5b397a3dfa94e96b7d921aaef879ff5ce6f0f040ad868d9f1a1d19a94f4d4f6fafababffb38cac9cd3345e6bbf07e17ec7a63460e6224d83a099a29eea7d073f1f131fe7eee9eabcb7b5f5ea4ffb952c5a5ebefb6bda5bf14ab8baeea6148ba9f5a48d684f365d69fcad99196f567979e503a565e5df49d1b091baf6e17e2cd7773cabd53e595b5b7fbf6f6626473da97b957f38a89ed8a38abd4e2b86b5ace165b4f65cb604960356d50e4b1f1d1ddcd5d9d1fe0bd3d353558af92f55eedef3bde292d2079dceb466b399edface82778553605d81ce609ea05ab11875df0b9a9b2e7fa2a3ade523aaaae950cfa7adb2aafa4b9959b92f6beada15acaceab73b6f6dce90a0e54dd9aae975e795c686ffa8f56eceddbbf77c778f661b15ffe8a7f10ae6dd0efd67e98728b1b7a7f3b6864b17fe83d9644599f317140678d90c0b17b4e59dd7e3aed2ce51d52625467b36a4a5a6a67a55b7ee8cc2047fef74a6b65a54f79e6df0427f9f8275844d6fc0deb810bf32f35d6323fb1b2f9fffdcd4e4c441ada19ccdc8ccba505656f5cd94b4f4868484576b3c5d379eb11a18d3e3321ba0ea5738d5353eb6bfbbabe34303fdfd27f54b3d595357f7252dd07e2cd1914455d5d56046e06bd47b4f70bb27cb3ada5b3fd0dfdf779beeb7d504f5353be9d482ef046b42823f2333b3d7346cbb4a2b7ea81d407a4d0144266822f0665ee79422a60133e7a9007abcea86157577b67eb0a7a7f33e2d00cf535c63aaa0a0e8f9d2f2aa6f2b93bf598d8c7bbdf131b34bb8e21e36a570642aee76acbfb7e7ddddbd3db7a8c653744e6eeef9aaddd55fd5aff1691dd3bdf56e2567fc660195324f545a44ae1a2da76618f3b406374b75ec0329ced4ae64674ab729f764ca43af26d08f6e640a445403f606911e3ca76b6cb8bea5b9f1639ad2be53b3957695e41953ddad479543f6907e317bf4e079d490f9b4846449555fafd933334b424c354d4d0c24fa667db9da64e4504f4fd77bd5e33a3633339390999ddd5a59b5fbfba5a5158f243b9dbdaa244b9a44643eab1b3a2bf5b8e34cc91d931d66d6b26a9848edb60d8946c69b23b201333466098f6253e99a213ad8dadc74dfc8c8d08db13131166752f28423296950359fdad2d2332e262627f799eebfa6cfe7940b14306555ccd666e633f4ff2ffbe6667334544c53ea7f7d5f6fdfbb8686062b555522460d624fc9aeb2476aeaf6ff1fc5474654c18012c191f14c721608ac5a20621bb037aee0f5862c6d6c6c78fff040ff8dea41dda86548bb352c8857c33597906099d502db592531ce9aad4655f0428b7997ac664bad98d8f87955e9cc542f2d56ffddbeb814585163d5bfabb4ec31cd383da461449f8de1e2aa1f165e8840a409447c03f66f0d99895f2dda15c7c8181aec3b363632543f3b3b93abea10a56acc124ddda6f9b939fdaf5ff554a2a2559960c16e4f9ad2b070548dd698feb73b2333bb212b3bf7a2766d1ed48a809948bb199c0f0208ac4d60cb34603f79592601513d338bd9f15b0d5792868466fd5b9aba5ba94ac3b02828aba926dbb4caddb84dd508c5b5fc665765fd77bf626741abd4b9366a5e8d0002c116d8920dd8db21988d17348254ecebb5787e2873c7827d13f83c0410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400081cd15f8bf2b1d52504cecfbce0000000049454e44ae426082, '', '1234', '2021-07-24', NULL, 0);
INSERT INTO `student` (`Student_id`, `course_id`, `reg_id`, `title`, `last_name`, `first_name`, `middle_name`, `suffix`, `house_block_lot_num`, `street`, `prk_vill_sub`, `brgy`, `city`, `province`, `zip_code`, `nationality`, `civil_status`, `religion`, `sex`, `phone_number`, `birth_date`, `birth_place`, `email_add`, `section`, `year_level`, `cor`, `type`, `student_status`, `account_status`, `e_signature`, `pic`, `password`, `date_submitted`, `date_verified`, `patinfo_status`) VALUES
('2021-00003', 7, 26, NULL, 'Mccartney', 'Melissa', '', '', '', 'A City', 'Prk. A', 'Brgy. A', 'A City', 'A Province', '8100', 'Filipino', 'Single', 'asdf', 'Female', '09632541251', '1999-02-01', 'asdf', 'melissa@gmail.com', '1IT1', '1st Year', '', 'Undergraduate', 'Currently enrolled', 'Active', 0x89504e470d0a1a0a0000000d49484452000001300000021c0806000000717df223000000097048597300000ec400000ec401952b0e1b000041d749444154785eeddd097864d75de77dada5aa5249a57ddf5a6b776be956ef6dbbdb5becd8244e9c10629210028190306102f3c030c0f0c2bc2c7979199810664870124292992c182780e37d8be3b5f7456ab5f67d57692955492595a492e677bc40b0dd6e2d55a592f4ede7e927e0aeaa7befe7de3a75cefffccfff4445f10701041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104020c204a223ec7c42763acb81a598959595d8e5e540ec722010bfbcb212f3daff2ec746454547c5c5c5cdc7c55b7c3131314bb1b1712b213b113e1801048226b0ed1bb0c5057fc2fcdc6cea8cd793e3f54ee78c8d8e54793dd339f3f3f3c9f373732981a895d8f8f8f825674aea606e6ede958c8cacd64447f2b0cd669f548336a7c66c3968da7c1002080455605b36604b8b0b16355c89336ab0da9a9beeeeede93e31353999af462b617e7ecea21ed752bc257e2e3a3a7a797139109f98983867b3d916a2d5fd8a8d8d8d723a53260a8b8a5f2c28287e252d3db3393ede32131b171f08aa3c1f8600021b16d8560d586071214e0d54cac8d040fdd5c6cbf7f6f7f5d68f8d8de669e818adde556b6171c9858cccacb6f48cccae2467ca487c5cfcbc7f71c11e1717bbb8b4b4649d9c182f1b1e1a38ecf14c17fb66677396979763aa6b6a7f90671ab2b48cd604ab7d66c3e27c000208044d605b346081a5a5d805ff5cf2406ff7b1f3674ffd627757e7a140607925253575480d5773764e6e43e59eea279d296983b171717ef5bc02ea51bd25ceb5b4b4f86a5c6c71d19f34ee1addddd27ce5debedede63fa9cf1dd7baaff715769c55336bbc3458c2c68cf1f1f84c08604b67c03a686cb363539b1ebc2f9331f6b6cb87c8fc7e34929282c6ca8af3ff8fd5d65152f24253b87e3e2e2fd1a062ead556a7ecee7181f1bd97df6f4cbff717cdc55515151f5645dfda16f295ed6cb9072ad9abc1e81e00b6cd9064c31ae58dfac37cb345c2d2dcd778dbb5c45b97979ad75fbeabfbfabb4fc856467ca6042826d7ea364ea95457ba7a78a2f9c3bfdc9e6a62befcfcdcb6fbce5f63bff28352db343013302fc1b05e6fd086c40206e03efddb4b79a99c5e1c1fe7da75f79f1975a5a9b6f494d4b1bbaf1c4c9afd6d6d5ff40c3c45e8b2561cdbdad6b5d8c7a6f66a8d9333d357effb47b3aa7bbbbf3e6332fbff8b9e3276efeef4acde88b21e562d39e030e8cc0966bc016e6e7ec7d3d9d37bcf4fc8f7eb3b5b5b56e6f6ddd33276fb9edaf7272f39be2e313fca1baa5ced48cc1c9f1b1cf279e7a69b2a5b9e91ee5912d9fbcf55d9fd7f14642754c3e170104de59604b3560fe799fa3b3bde58ee79e7deaf7a7a7a7d3f6d71f78e2d63beefa9394d4f41ef594423e9c4bcbc8ea99181fbddf35e12a6d6d6b79575a664687cee9ef343b39cb83860002e117d8323130d3f36abc7cfe232fbdf0e3df527a43d4818387bfa980fab7939253cccc62c81baf376e8d663ca307067a0e3fffdc33bfe7999e2e78cffbeefdcf79f945af582cd60dc7dbc27ffb3922025b5b604b3460a6e7d5ddd176db534f3cfaa74b8140ecedefbaf3f395bb6b1eb22458bd0aa4877dd98f1265e3babbda6f7ee2b187ff3427277bf8a693b7fd716676de25b2f6b7f697e19dce7e76c6a3951bbe64a5e0ac444745afe8477341cfdfac49cbd10c77d87e40b7aff0faae2ce287900bfe795be3c5731ffad1b34ffd8ef2e4576ebee5b6ff51b1bbfa61ab3dd1b3be4bdef8bbb4c468696e6ef6746dddbe07cf9c79f95359d939ef4b76a6f6e993c737fee97c42a40978dc93e98ffef09f7ea5ada5e5e6a42487df96609dd70f6994d269fa0f1d3bfea0cf37d364b73bbc9176de3be17c22ba015b5af05bae5eb9fcde271e7fe4f7944d9f70dbed777ca16a6fcdbf2899d4bdd937c7664b9c99764f7ebbadadf9ceb3674e7d34332ba7512917ffa2585cd0664037fb1a39fe6b029d1dedf5cf3ff7a3fb262726f6a9018b5a092c4769e54694d56a9d1d1c1ed8f3a1fb3ef65f0381a5067ae0e17f6262c27fc8d51d51a912f1dd9d6d279f7cfc913f5c5c5c4c3a70f0d00f6a15f37224a78cadee1342ff2a9bdd3eb9bffed03f98614563c3858f69989113faa37284700be4e4e6f6949695b5381c89012dfc8fb2dbed515a3f1ba575b3898343037ba7dd53d92b2b5111fb5d0ab757388f17b1e86e65d73ff5c463bf37393999555b5bf7f8b11b4e7ed19ee888a8219a02f7fedd7b6a1ececb2f38d7ddddb5bfafb7eb66c5c7e2c379033956e805b4a0bfbfbaa6ee99788b65c8ebf546cdcece46b9ddee289fe2088585c5a7d4fbee5639267adea1bf156f39424436605e8f3bfbece9973e353a3a52b17f7ffdd337dd7cdb5f24a7a4f59b18d82618bde3216df6c4f1bdd5b51a3ac62d7476b6dfadc5e46991768e9ccfc60412ac367ffda1a38fedd95bf74347524a4b4c6cfc585676dee5c3476ff8fa873efcd13f5609a6fe8d1d8177af5720e262604a9750aee88f7f5eeb1a3f54b26b57cba1a3c7bfaefcab76cdf64464399bb8384b606ad2753a2b2bbb7b7464b8d6e371170796165d5a2bc9ccd47a9fca087c9f7a5903a3c3437fded9defa94d7e3492f2ed9d554505cd26cb5d96614f78cc867330219837e4a11d5802daa8ed7c8605fede54b173ea6b852d4e123c7be915f58724ab37e0b41bff2207ea0dd9e38999191d9d6d878b9c6353a5c93999973591f1fb25501413c753e6a0d02d9b979bd4b8b8bfd9a503285e3028a8145dc88600d97b32d5e1a5143c879df6cfa8573673ea91843b652149e2829ad7846ddf788afc1a5d9277f5a7a468b1eee98d1d1e1bd8b4b0bf66df17470116f11888b8f5f562c4c65c769bc22e1f18898062cb0b4106b02f79ab2be2d292969a26effc16f596d8913918074bd735025d7a5d4b48c0ec5c1e64c691ffffc9cf37aefe1df114060e30211d380290521f7d285d3bf3ce3f3265755ef7d22232bfb8a7eed16377e89a1ff0493ffe374a6f65be2ed931e8f2fddef5f480afd5139020208444403a6c0bda3aba3f5aea1c181930adc5fddbdbbe6fb0a8c6ea905d271b1f1f39a6898531c2f7161c1efd0ee475b6299165f0104b6b2404434605eaf3bef4ae3e59f9bf7fbe30e1c3cfab5acecdc4b5bade2a9f60309e8efb2dfef4f999df1e69840ef567e30387704b682c0a67fc95412daded17af53dfd7d7d7b54bbfe6a7149d9b396049b6f2be0fde439c6c49afd2463b58060c1313b3393b5b26cf69be40f0208845260d31b30efb4bbe04a63c3cf6a857fa0a676dff7ac367b4465dbaf16df6cd1a6f571719a41b5cdcecea46b7e9d21e46af1781d02eb14d8d4066cd13f6f6f696efc806b6cacb0bca2f2544959e593aaaa1ad1395fd7768e5e510316abbd27e31616166cebbc1fbc0d0104d620b0690d98d60cc64c4f4f16b5365f7d5f5a7afae881c347bfaa0a0f5bb2f765bc35633a9f9e9ed19592923291e8481a538f924cfc353c88bc1481f5086c5a26be72a5d214fb7aefc4c478fec143477ea0aaa6a714b8dfb20b622df196d9eadabac7cc2edf0585c567941bc6f292f53c91bc078135086c4a03a6da49d143fddd950d972f7d2c31d1e15669e8af59ed8ea9359c77c4bd543db0801ae587b5b0b75389b8630ae8d3038bb8bbc4096d37814d69c0f4454f6db97ae503eea9a9cc43478efea323c9b92d56f36bd9936f7e6eeeaaf2c1b64402ee767b98b99e9d2710f618982a35c40ef6f51ceb686fbdc79e98e8dd5bb3ef3bf19684885fefb8da4743d509e654f46ecb0e85577b9dbc0e814810087b03a6de578aaa97fe9cd20dd2f756d73cab2dd13ab4148755fd91f034700e086c3181b036608a7dc58cbb46ab7ababb8e29d8edaddcbdf741f5be366d738e2d76af385d0410789340581b30a54e24b6b55c7def9ccf97a232cc8daae0d0b2d5960cf104218040e40884b50153a9e8bcbedeeedb53d3d2bc7babebbeaba0f7969e798c9cdbc89920b03305c2d680699160dc607fef6193f7959b97df985750fc7c5c7c02bb59efcce78eab46202802616bc0fcfeb9d4f68ed6bb63e262978b4a4a9f8c4f487007e50af8100410d8b102616bc0e6e67c69bed9d902c5beda8a8a77fd48338f733b569d0b470081a00884a5015b5a5a88ebebe93c3e3434549099997525c999d24bea4450ee1f1f82c08e16084b03b6e09f4fea50adfbc5a5c598c2a292e7557162db24aeeee8a7878b4760930542de8029f33e7a627cac7cdc3556575c5cd2f9eaa26dd590dfe4ebe6f00820b00d0442df8005962ceded2d777867bc99f9f9054d968404ef3670e312104020020442de8069930bc7d0e0e0b1d898d8e59cdcbc73b131716cf81a01379e5340603b0884bc01f3f96633dc6e77617a7a66bf868faf44fa2edbdbe1a6720d08ec14819036604a5eb57677759c9c76bb334acbca9fb3db1da33b0596eb440081d00b84b41e986ac45b27c65d7b545e26da9992d217131bbb45ebdd87fe4670849d2710080462b4f3cb1b9bbf2cebfb1192aa2c5a839cb01458b22e0702167330b393bc26d2fcfa3baf636ee909b5903660cabe4f76b9c66a535253c7b5d763a3e26014fadb79df53aef87501538d458d9665617e3ed9ebf51674b6b71644ad04e2cd767c367be2987b727cd866b34fa8baaf4f450e36d4b02c2d2dc62f2d2edab4e37d7e5b6b53fdd8e8c83e6db89c14a3bd1a12b40a263b37efbcd97f55ffee5107633626366e419b496fe8989b71a343da8029f33e636a723a57e9138d4e676ab790b61cd066dc148eb97d04d46045abe76355e3913c3c3850d1dbd3754b5f6fdf4d6363a3bb7cb3bea4c5059f26e61396555eca9792923a98919979597b2abce81a1dba644f748c242458bd8a1baffa875f8d64dcbc2a1e77b4b79ce86a6f7ff7c040fffe99196ffafcbc3f5e9b2dabbd5c8a0d049663ed36dbc79d29a9c37985f9e7d5c1e8cacecebd32ee1ae952033a6951815195b9da12936d216bc0cce2edd6e6a63295ce71646767375812acd3dbe7b1e44a10786701d3db5af0fb93c64687cb8787068ef5f5f6be6b6478a4c2e7f325c6c5c5cda8a1185183d56e898fd1ee82f3c91eaf27b3bbbbabb4b5b5a5c262397d4f4646c6707a46667745e5ee47478707cea9f067b729597eada3ea78b1ea71d95da32395172f9efba59696e6db663c5e5b41416163d5eebd3fcecece698a8fb7f8545034697272a268746464eff8b86bd7c50be7ef52231b6fb55967d3d3d20773f3f21ab5d4efd4e8c840a362d62ef31ef508fdea9d456495e19035608a7fd94647876b551f7e393d33b3393626664bb4e87c3111d8a8c0c2c2bcdd14ee6cb874f117fb7a7b8e7b3c9e2c0d13e77272f31b8e1c3df698aab19cb7d9ed13fa6f1ab6c5fa971697ac3e6d86ecd126cf93e3aeca9191e1fdc34383d56dcdcd37343534dc545858d85fb7ffc0f7265d238f2625a70ce83b35a7d1ccabf1320d15b50fa9dfa14a2fb557af5ef9e9f6b6b65b947399a486abe1c4895b7e50565ea1c9b3c4090d49fdd1d151a61316b3bc1c50abe9b76b03e68c8181defd830303fb868707f74e4c4e16f60ff4df73fefcb9f73b1c0e8fc391e4d2e75c2e2c2a3e3f34d8dbaa6d0f27d55bf4a833e25583b6ea5ee1463ddfe9fd21db3dda333d95f3f0bffce02b1aeb67dffbc19ff995ecdcfccba1bc103e1b81cd1650cea36576c69bdfddd5fe531d6dedf7689858a2c9ab9e9c9cbcf3a565154f666665359b219a7a34d7eccd68e54acce2e262a2c73d55a046e9d0a50be73f3c3931be3b2a6ac5a2c6a4797775cd3fe4e6159c53cf6846bd2ecbe884ab4acbf46eefe9ec3ca986322d2d2dbd4bdbfb3db46f5ffd834949cee1773a96f1323b84a9e7669d9b9f734e4f4de6f5f7f7ee371593d53b2b55018654bd245eb1eb18b37f85d3e91ccbccca6e2f2faf7a32afa0f0b47a689b3eaa0a590f4cbbf3a44d4c4c14aa2bdca79be6daec878be347ae80998dd317d4a4f4ac68666c4beea7b9e09f734c8c8feebd70eef46f7576761e7426a7f61d3e7aec7f9696963fa98d8e4714a45fd50a94d783f7e6b5cd9a3d6c2bada87ada6c8273e1dc994fb4b6b61e6a6ebe5a9f9a9a36959c9c3ca6ded04cf7f050b98684a9b604dbd4fefdf5df3f71f2d6bf4d4d4bef531c6b55b5f65e2faa602ac398bf23ead15d3e70f0e883ea9da5fb7c33a94a812a50dcee86f1f1f15235ac96d191e1b295e5953b93939d037afdf66cc0024b4bb19d6d4d95cb4bf3ce5467d258823561d32f3472bfbe3befccf47cc40496039665f520b4b94b767f5f77a1e2402936bb6d626ad2d56fb5d9c74d0f632bcc8a2954a2a0b92fa3bdadf5ce2b8d8d9f9cf64c6757edae79b8fec0c12f2b48deb3da86e4ed9e0205ef4d633eac86eca1dc82e2734d572ebff7dcd9333fdd3f30b0373030906eb3d9e6939292878f1fb9e187870e1ffd6e764e6eeb6a1bca6b3d753237c734fb5498bfddfa7b413db16714d376e8ff8e5e5e59895d595e8e55a72422aa2987a407b6b21288d378be78797925d6999ad665c6fa3bef6b7aed2b560c42a938a1c9f9895467355a714b81c5043554ce81819eb2bebeee9b4c8a8d77da5ba0e14bbafedd6a46348a0d8de7e4e45e52e0f99fbddee94be68b1229f19637dbaaca4ae2e484abe26a53e3c7bababaee302910478e1cfbcb5da5658f297e34a4585550f2ba5e6fc8fa15ebfa6a75edfe7f566e6589be5fb98a6745e715145c311b295b6d896e4d0e04e5786fbe4e5dd7acfe9bf91b717f42d280694890303ded2e51c3b5a4317373744c6c44ce6084f36e98fd30fd0bf34ecd02a569a861f74c4fbaf56be98a8d8d9f8f898909c98317ceebbbd6b1f4a5b39a69fdaeced6033dbddd27c65daebd26b6b21215d0e311e74f4c4c1acdcacebe64b5da26356cc99e9e9e2e1a1c1c38a018cc1ec573daf756d73e30e3f55c7e2de81d396938ba8fc9fd7d3db79c3d73e6d74dbc284375ee8e1e3bfe85fcfcc253ca8bb8e66ce146ee897a73e67b34fc6aaf6c6949f1eb952835eedbf6d9598d55481a300533ed6ef754a9c6e8be648a1746c923616a72bca4a5b9e14303037db7cfcfcfa7e6695f80da7d07be929e917b315cbf6e66aa5dbdbf78c539124c42a5e6a4a2a2a36396f5cbed57ec653e5853e50a0a5bcccc98d6c166365cbe70f3c8f0e011cdaced5d5858b068c83362e24225a5a53f4e4e4ee94fb02428cf297e2e265aa3ca95e557530ff4ec947475b6dda1b482db9f7ae2d1ffbfa2b2eac97dfb0f7e53c3985ee5276d7a25dff9b9d9d4ae8ed6f75dbe74f157c7c6c7732a2a2a1f3f74f8d85f29f6d421cbb0fc5887aab7b59a4623925e1392066cdee74b53f02f5fdd68b77e592362acbc59e8669a7b70a0e7c073cf3ef9bbbdbdddc7f5b369b1db6d6a47967234ad9d70e0d08d7facd7b4867298a42f7ec2dcbc2f6da0bfbb6c686860bf6ab355aab793b9bcbcacc4ece88082c27d2525a52f4dbb27cedb1393c6147f5af397d004e2350cb498e3a8f139d4dddd79876b6cac46b3d0e9995999edf5f587fe5e335767f44c0c9b44c9571bcdb70fd8fbf459639999d9cd15957b1e514ed32f2b19f34605aaebca2baafe593b5b3da2d9af310dcfd67c8ec17806e6e77c29dd9dedefbd70fedce7746dcee3c76ff842d5eeea071d4949433b2d2c100ccf8d7e46d01b30958f8eedefee2854f66fa66219a7cdb2888d9ee4567ebf594ef5e2f3cf7ef685e79fbb333333d373e8d0e16794577361da3d75606868f0485a77c7dd7babf70de91a27837d9d665a7f4ed5403a3a9a8f35375fb977647868b77a41f1faf2fb62a2a3350a598a33c3d7c181beda96e6a6bb745e4df5f587bfe9f379cf2624d8a6af37643359e6ead55935e39ca245fb351afa1d54e2e6418f67ba305a4bfc9234535553b7ffef35fd7f4ab356fdca1f5a55ef49634b332c3241e48b4a4bf883c1c1bee3972f5df8f4d933a77e5dd7705cbdb1fbd52837aa3716d667cbf4bcdadb9a3f78eecce9df5042d5ca818387feb6a676ffb7140ad8d13fd2c17e6ed7f279416fc09603cb716608e0f7fb2dced4d49e9dbc7987998d1d1cec29efede9399a929ae6b9f5b63bbf527fe0f0f734adee52f0b76ecce5fae2c8c8d00da5e5553f086603a659ab380ddfb2fafbba6a2f5d3aff493528d96a14668bd5cb2a2c2c7e392323ab4d719a57cb7a6bc8e670b9462bbbbb3b6ed39677bb5f79e5f9df2c2a2a79a9b4acf209afd7dd6d1a323572a6b7f35aac656525c6cc442d2efa13c75dc3f9bd3d7dc78706078e8e8d8dedd6cc625c5a5aea8002f00fe8335e713a53fa12131d2efd88ad7b124756139abe7f5231a6e6ab571a7e4e3dbbf79e7ae5853fa9db77e06fe6e6669f37c9956b79e0d7fb5adfac37b3bdb5f9fd9a05fc7533143e72f4f85feda9aefd8e664c99615f2f6a10de17fc066c6539deef9f4fd1e3beac7847afbad5eb7e7883707d9bfa11ea8ddaba3ada6ed778d17eecd80d4f1f3d7ee2cb0a5a8f69d816ad8cea4e67b2b3570d7df2e2c28299a20eca1f05cc93c7c7c72aaf365dfe787f7fff6193835753bdefbb25bbca7ee470249bc4c6b937c7ba34846d2aafd8f3cce8c8506dd395860fb7b6b4ded9dbdd73322d3dbd53499817d4888cc6c5c6fab5a781d5c4a8ccf05333887b464747cbbd5e5f5a82c532ab6295cd9555558f1714169d49d4c264cd9ccdabd10ccada572d3636cf50a77a935f34c1f2e6ab8d9f3c7ff6d46fabf13fa400ffdf68898dd22e4297193ee79b496f696ebcefdc99339f5b5a0aac2865e14b557baa1fa0f10aca23bba10f097e03a675559ae6add1a2d4690535dbb7caa2d00d295ee3cd6ef76489a6d83facc5ecfdb575f50f9af8d21b0b73f5a59856afac453b351d560367d9e8f1cd70518987b9cd4d97dfd7d6d6f241b360779782e57bf6d4fc8319bee94b7ecd8d545e6fd026351c7c212727bf414bc06aae3635fcb402ef35dddddd8714943741ff38e57e04343133eb48744c38921c2ed3cb4a4bcb6ccb2f28bca005c17dfa37b3c42464b1290dd5dc9a1c785833db0d571a2e7ea6adb5f9035ecf4cfe818387bfa0736c56e31cf4e52d0a012429607ff785f367ff83df6f7a5ec7fe5ac3e2ffad73094bcf6fa3cfc5767f7ff01bb095650d2f1693ad56ab4fddfbb1ed0e78adebd310cb72a5e1fc3105ca9d8a053ea3757017141cffd72fd8ab29040ec790ea312d6a2670435f7a7da9edeea9890acdf87d5a71b5c3eaa534d5d4ecfbba16035fb12a437bb575a65e8f794d2936f692297fa480759a7a5a95664f4fb3e038362e76d1cc22aab288191a2ad81fef5383351f6f597db5848d3e0f9a00306b6adba7a7a7be204faf163f7ff085e767fefba14347ff5c8df80bfa6f41ebf16b4d63e2c8d0c0f1c6868bbfaa9eb25531afafecadd9f76d1aaf8ddec5e0bd3fe80d58602990b0e05f48b4582c73a6ee50f04e756b7d92865ac95ac8fbeea4e424efaeb28ac7df5c8d56a348d565b24ec7c5c6a9018b5ed750cb543c50e392d1d7db758302449fd05ab8ecd2d28a1f2a36f36df5bafad63bb3a91942733ee6de99bf5d6ad06257f4c3a4c0fc4a744cf472242cf751233aa000ffdfe85c7c57af367deccce997ffeb8d965b7e578dd8c5603462fa014ad082ecbab3675ef96d3393aa7cb47fd482eaaf3b9292a92a1c415fc5a0376026b86b1215b588d5bd932bb02a1695313b335b54a0252059d9f9e7df92bfa4ca008b8b4b7653cceef520f99a1e0b53aedb0c519b1a1b7e41a91127146c9f387ce4863fd34ca202dbf6a0fe70a84133cb4b226e8da2990cd1b3767f527272bf2a3ffc9a1ab1ffb66fff812fcafe45a5efac7bef5193fa323e365c6fe26cc3c3c3655a16f48d7dfb0fddef48728eace926f1e2900b04b526be995657bda34cfd4dd30af6a5f5f62c427ed5213e805936a359c042658f0714877a4a5fa689b71e323a4ac1fb14135732c9a46b39250d1913c7c6468e9c3bf3f21f9a21545656ceb99b4edcf23bda77e0b160375e6b39afcd78adae775a33a60f2b0ef6974a10769c3ef5d21f7475b6bf4fc3dfe4f59e8fd733557ae1fce9dfeaeaec3c5a5e5ef17475cdfe6fd278ad5733b4ef0b6a0fcc0c33148b29d71738510bb8bd1b8ded84f6d243f7e9ca28b7a8be53a96a2af915a8ef3271aeb7399a296514a774a27825b4aefa8fd9e57c6c74e85853e3e55f9b724f155557d77c6f6f4dddd795d5ae19dfedbb24e99d80f403e1d5ccf7e3a6c7af06ecf7f4f777cdda4a35620f6aa6d0e493adfa8f72e0d22f9c7de55734fcbf41f7aefdf0d11bff42c3465379813f112810d4064ca573139403b64b719268d522ea53c2e4aa4a7a44a0cb864e49abf5d503f39528f5401b292c272a772af62d1fa87c2a05bfe7f46ff1ffb6afc3b50f6b6a9c6b6894d9dbd379735757c74734e3367be8f0f13fce2f287aced498dad0096f83372b9ee853cff419a5edf84fbdf2e2ef2bf1f5b3662993d22cbeb1dab89582f6d6cef696bb348bfb7e2d811b3872eca6bf504589ee50ceac6e03fa4dbd84a03660a6448aeae0e79afc1fc52594c41abb63abb06af6d112585e369b2a5425a7a45ed25dfe77abf9559d3c46b1a5452585aab9bf76105fc3f258c5bb925ca3c37bbbbadade3f38387852f95c83b575b5ff2b332be7bc02d63bf247e2edbe359aa19c5323f6c20d3127fedf33a75ff92fe7ce9df98c664e17142bfc27cd9ef65d6f65812946d87cb5e1e31a8ac62ae1f81b45c5a5cfaaf10adaace6a67ed3b7e9c183da80452b575b29148e68a50824a7a47568ffa635c576b68bb1e9052857e9c70aaedf31ed71d73b67d3cf6a48d3f4ef7ba4d12a07bce4888b8a8d56b96db575cb0a87fddb1050bd5955e65c704c8c8d5476b4b5dcdbdede768f32c0ad5a0ff870cdbefddf508e9d593fc997eb4d0f8da9bf25b7174fda6c93674fbff8fb0d97cf7d667e6e26af6effa1ffa57bd06f4a9cbfdd73a69a5ec917cf9ff9707fff70a582f67fbfa77affb7f55911594266bb7c4f82711d416dc014fb8935b5f0f5c59ad31067e6d57a1f3bf08fd9044125b52f6564649e52a9955ad545fbc5925de55f53fcaa5b551fbcea72ada8b44e8232da0b15ffb22a989fbcf25a32ebab3d567dd1e295949ae51a193e78e1dcd9cf29a174b7d6118ed7edabbf7f6fedbeef9a0a9f3b35deb59ac7c9a45168c8dd78ec86937ff8d28b3ffa7c4747dbfbd5cb0dd41f38f63ff4feb7e4269a923f2a8d73a3d978635769e90b4a99f8aee26a2c115a0df626bf26b80d98b2f0cde6999604cbac451535b56466473660e69e2aeb7ea0b26aef5f2bb9f4ff19e8ef3ba97586e55a96f3485e7ed153aa2f3ea20073b686dbd9eab1da34f1b1473396c3aa31356b82cf83fd3dfb5aae36fdacd61756eb8bb7a0ccefaf55eedef3505a7a46bb32ea57559a78939fab4d3fbca92caa3cb99663c74ffeb7975f7aee4fd488bd4755373ab402e29f6d76c7f81b276866ceb52e55b38e673f67361d3b7ce4f817d4bbeddcf40be004562510d4064cbf7a56ed006cd3af97c7049957139c5ed5596ec117996450b3bc4553f09f5779998ff6f474fe547757e7efa4a767fc4c5e7ec1f3b3b3defc81c1fe6aefe474aa66223f31d0d7776451e917a6a0dfd4d464a1e9c51614153da7e4c96f9aaa0e0ad4d370adf1393009b76ac42e1f3d76d31f9d39f5e21f5cba78eed7cc0f86868bdfb25a5f5b84add9e21cfdc8fcb27aca45478fddf0052d746f79bd4efc1a8fc6cb374320b80d981e0eb34554b233715c5fc0b0963ad90cbceb1d538db849febcacde569f96f59cbe7ce9fcafba5cae522547fed2ac6fc6e999f6d826c727a38647c76e517588635a9ae3d702eafeb2b28a27b4b3cc03a6c7a5866b4d6900d73ba79df6ef26706fb2f30f1c3af6e7afbcf8dc9f363735fe7c7a46d615ad713ca72ab9b696e6abf76aa38cf7e5e7179caeacdcf39066869914d9420f49501b30e5e224fb9564a92f6eaf9981244ef3da93a05c24ad2f5c7c48b38667559df498cab27cb8a3b3fd3619c56bc9cf6c764e4e5756764e675171c94b6abc9e494e49e9d35e7ec46082f445323131cde49e362b152e5d38fb1b972e9cf94f2afdfc63c53a3c972e9effb47ac08b353575dfd5307ec7a7a304893c6c1f13b4064c5fd0989e8ed674535f4ab36a4b6abc825e19206c2a2138d0ebb944fdea0da8067c4ea37642f68f8e8ed41417957ebf72f7de1f689a7f48bffe3e7dd9766cea4908d8fff523b5946b5e9328cf9a72e7172f9cf90de58afd675345767e21b0ac6ab15f553edd2beaad6d68517d28cf9fcf7e7b81a035604ac88c3675d0350ba9cc72d378ad6f81f276bf51a637a0188c2b37b7a0417118dffefd87be65773806226181f476b7d74cae6f66c6f3ccc8f0704d4f77cf67552f2d4dd5252eeed95bf34f9a1ca1aaea167c0082b816323aca6c81a58426fdafcda58ac23b7606f27acf81b2f3ad0a2e679acd4915fb32a59b236ea1f4f5ae61abfebb928027ccfa54fd90b814d08fd23d1834658182557c71abba6cd5f30e6203a6496865956bf9cca229a3a35d661842becd53611256b524285b659ecbd5e06befc0f855d589dfaa0f58a49db70975e8af4de715a71fda286d165265fe9a0a149176ae9ccff50582d68099c6cb6cd5a52cf465b391c74ead44713d72f5bc6ca32383b7688d5eb6d6e8b52a564836fdf5d082f8ef0ae627f7f674df6aaaa6d8edf665ffbc3f53955d3fa21f9492201e868f0a9340301bb068f52eb435b0a979f7139b4084e942b6ca61b4e146924ae11c5f5200d96ab38d32531bbe3b673659518e5dd540ffc0cd490ea74f556b4f95969636a800419dd22b7e55f1b1bcf09d0d470a8640d0bacdea71ad6859ccb2897ca937b6860231c1b88cadf3192ac09733e3f51669f838aa697ca6edc378eb340399d4dfdb7bab966e6554d7d43eb4ffc0a1fb15ab8d56e58adfd49e9def5111ce41a5027d5d952ddc613c2d0eb50181a0f5c0cc3968f868e25eaa26f35a4f6c03e7b52ddfaa388b657ada5da98cfb44ad93bca4068c5caf30de69afd753d4d3ddf51ee57bb9f754d73ca07a5fada969194db575fbff679236a6d5de961f99708d1d312b4ac2785a1c6a0302416bc04ccccbfc558c274e5983761313dbc0796dcbb72a46689b9a9c386476a5d6a6192faa1e3e59df61bad3ca014becebe9ba53c3c5c2dcbcfc97d3d233af9858ad2947a4fffbb236a8fdebc585c5849696a6cfa8ac4e89996c09d3a971980d0804ad9131c346a550c4aa7711af2e7a120dd85befcab202f8dab1bcdc64806b579f7e5510257d62030fef5ade3aa73d0ab401ef6d66ebb7f28aca7fd1ea88718d185e4df5d1fdf069a1fd0bc94e67537f5fef41ed547e97869bceb57c3eafdd1c81a035602606a6ea13cbafd7b68a373b386fce2545e651b5f7a3f60b98cdf7cdcde46ba7a27eedda44e264986e951a23ebf0e0c009efacb7b07277e523da76ae41795fffeec743f9786e25b47e392333bdabe9cae5cf0ef4f7dcada4ec0defd719a64bdcb187096a23a320be02f9d1ea7cad985aef6f2da3bc639955e32b10b04e4f4feed5fe82a95a36d4a6a545ebde35670733aeebd2cd4ef12a2e79ab7e347c5a32f4bc9615bd6581bc4926d6e2f9466d10f2bf4d46635f6ff707e7e666b3d77540de143681203760afc6c15654d8309e06ecdfdfc3a5a50587d2276e36731c0a1e5fd0178604d6303ce6a624b77b7272cfc4f8786d5a5a7a937612bf72adfd32b511f3545151e9235ae8fd8c6265a58303fd779a5dc9c3709a1c629d02c16cc056f4a55c505c6749a91426b84010f4276e8aeaac67eb4b51ad2fc990363c6927feb5ce27768d6fd3a49275746cf82605e5e30b0a8b9f54eccbf54e1fa1dc3c970a517ec5e974760ff4f77ed037375bb0c643f2f2300a04af0153cf4b333a9ad589f76b7b3562603f7113cdb4bcc73355a54a1d492a687856051fdf52d6388cf77c471d4ab38fe9eea9a9fd29a9a93dd939b9a7f58cbe63cfd7d40f4b494d6faeda5df325f5de127a7bba3ea2a55f693b0a6d0b5d6cd01a3075cb57cc0c8ffe775e35e02d0c21ffed29300994a3234337ebcb6166bb9e93119b4584e14b62f2ee5469f5a07abff97979f92faaf7bbaa1f0e935a919e9e79212b2bfb946625ef56c9ef03fa2c869261b8676b3d44d01a307360e5d5cc29c769c1fc72a91716b42cffb55e5424bdded49cd2129512976becb08627434e67da55ea4e85e70e691631716c74f876b35c2b2333fb829ecd55c71d35d4741716953c6836035129f04fa9f47419b961e1b96f6b394a701b302568c6ab01334348f5c2b4612b7f969797ac5393e3b59e69778e960ff568068cf489303c1666b30e2ddc4ef77abd155ab43d9ce870f49942036b39b472f5fa3233b3ce4d4e8ed78f8e0edfa912d48eb5bc9fd7865e20a80d980a192e9bdda6f5c71913134d754bdd3f7d899c7d7dddef595c5c8acacaca31d9f7abee0584fef66fdf23981fd19191a1135abcbd2b3b3be7596bc2dae38efab1992e2ad9f50fa6ec916624dfaf24e40a93cfb77dd5b6de9505b5015372e08216c29a1c1b95d659def13103b3ac4a7b3f166b0d5eb952273ab5e3cd256dac4ac31e86ef89d9decf333d5dad78d68c3325ad51cfe69a3799d19033909ce46c532fecc75a849fe51a1bbd5d9bd690a11f86fbb7da4304b50153ac61c99e6877991898095ceff45f2bb31c6568c8e4122d590b0b8b9ed65e91c3abbd31bc6e63025a8feb54da4a8d43e5ba357cd486c2ebab7aab6546eedcbc828735bbee568fee1e25b7162b1616d4efcdc6ae7467bf3ba837225a0d9823d1316c726ee6e7e63277f24ca47a5fb1b30adef7f5f5dca3c285fd8545bb1e63abb9f07cd94cdd2fafc753eef1780a9d29a94da6115aef9195afb7a258586f4a4a6aa3a966a18d586ed38c24b1b0f58206f97dc16dc0a26302fab2f6a90716e7f54e97aaaece8e9d8954ef2b7970b0efddfa1265e5e6e63f9d9494d24df1c2203fbdd7f83813fff27aa62bb424244a797717365af543c3508faa873caed2617363a323b7fae7e733c373251ce57a02416dc04c1d7ced22dda7076859c1d3bd260bfa7a27b01dfffdf5d4895d8383fd77690833a8e9f847f4256067ed30ddec57d79d7adcb5f6c4c451a733a555e93d1b2adbadf7cfeb739a349bd9ab7a6e65fabbdbf4f2c274391ce61d0482da8029ceb0aceef6b01a32ffb47baa726161679624d1cc638aaa19dca307bdb0a0a0f831952fa6f715a6afa182f7d1be395feeb8cb5567b3db864dd9ee601c5a93532e7ba2a34335f453c65d63b72e2e2da604e373f98c8d0904b50133a7a278c38c1a329fca26e7fae7e7b2765a205fbdce9899594ff1f0f0e0adca3bf2aafac193fa0527f37e63cfe9aadf6d7afdaed19123131313c59678cb687c5c7c507abe66a779ed623464e2bbcae9ab3765a9577d52bc306402416fc034f53c9f9b9b7369da3395e6f1b89537b3b3e26026f6d5dadafad1d1b189d25da5950fa4a6665c7da3705ec8ee221ffcaf02da2cc56a4ae728592ba0ea13176262e382b2d3b926a816b58675303636daeff3cd146b36b240cf36c3c84d7ef642d080c5cfa5a5655cd52f5f6076d65bb9b21cd83145e1b474254e53f77bf4057a97aa19f41417973e64f29036f91eefa8c39b19c2d9d9d902adcb9d4a4e49697b73e1c2f56228493b9060b58ea968a74fa111bb36c5a5eaf07a3183f8bea037609a765e48cfc86a5200d5a399a0bdbad13b26f14f85f332bbba3a3eaac5c3c9bb76953da0a9f776661e83f8b45ee7a3cce4c99ccf97a3bf1949c9c9bd498ee4be601d5d0da18a1558c735a3e9d6331d6df21c55db8dacfc6001aff37382de809972240a760e2726268e6926b254dded0213175ae7f96d99b72d2cf813c7c7478f8e8c0cdfaa2a060dea7d3dae7820cb86c278074d01016d50bb4b3d2465f324776b595b50e25f6f5c82e9d5e933ddfaff03a6ecf08a8aa887f1f238d4db0884a461d1b06956b3913d931313599313ae439a72ded6e914266955498e156d6dad9fd122f698f2f28a6f3b1c49033c71e11530cb87dc5393d54b81a5044762d280591912cc33d0e4d47c5c5cecbc266566f48c4fabf55ad3e2f0609e0b9ff59a40a81ab0190d235fd1502a4ae54c8e2d2efab7f530d20c93b560fbc3aa3d559d9b9bf7747676ee4b5a7ac2966961fe96a9e1b2badd137b14685742b563500d5850777d52626c6c60299060898ff7da4c514ab3910d7f365520240d585cbcc59f975ff4bcaa60f64f4e4e54a8a265eea65e65080f6e76aed1aa83cac1c181bbd5ebeaadacdcfd772a9c1794dca3109ef6b6fc6855bc4dd1ca877ca54fcc68043064aaa304f34215e34c9b999dc93649c916ab75dcec831acccfe7b3d62e109206cc9c86e26023da40f4a5d99999746d145ab65d773bd6747a6e7f7fef075442c85e5050f843656cb72be0cb83bdf6677143ef3009acaa1891a1007eaa7abf330ab84faa0716b4fb602608b42d5eaecfe74bd150725ac17c5f303f7f4317bf83df1cb206cc6c1b565555fd1dcd4a2e6a7384fb66555266bb39cfcffb5295b0faae9e9eeef76ae8f8a3f2f2aaff633649dd6ed7b915ae473b6169f1bcd76cc06151f6fdb82693823a843713044ace2e50b8c0a609aa1e3562242747c08311ca066cd966778c685835a83a4ab51eafbb565b8b6d9b60be661d6dde6977757777e727cd35aaf1fa86dd9e48b99c4d7aa8d5c0c46ad3e0ec79bf2f393636662e26366643eb1fdf7c1966b779fd589d88d1e6a7dad7b3c5acfbdda44be5b03f2110b206cc1cc392609dd642e647e7fdf3b1e36323776915ffb6d82854c361fd1a7b2a3b3a5a3fab8d6a93caca2afe4ec9bb66b7e7a00d59784ad726604a37698897a3358a7126e154f722683d30530b5fe919a5dad7a05ebdbb4915a7bcaaccfca036906bbb5a5efd8640681b30e54195ecaaf8be4a9a346b53d7c3eea9f1e3ea856df94aadf373bebcce8e965f19191939585252f61d95cb79d6ecfacc63b57902668650f95fc95acab6989c9cd211cc21a46ae15bc75d230714ffca484d4d6b329335c1caf0df3cb1ed71e490366086c866b78f96ec2aff8ecafbda06077a3fae2fff2ee54d6dd9044013f7eaea6affa8e25e3f959cecbc5a5c5cf280868eefb859eaf6785422fb2a4c0c4c6718affcaf29ad80e850803d683d242d892be8e868bb4f8de44a4161d1930956db78646bec9cb30b7903161f9fb0909d93ffbcdd91d4a72cf5eaa1819e5f98f3cd166f4562936d3f323c78b2a5b9e9e39a851a2f2bafbc3f3131a9772b5ecb763c67f582fd898ec4290d21ddea810525074ca9130efd60dd3b30d05fa7b4a0b6bcbc82e799a8899ca727e40dd8abbd306de75e59b9e77ecde02cf6f676df33e11a79cf827f2e397218ae7f26dae139d1353a7cc3d5a686ffa45ff7c5eada7d7f99939bff92d9f8e1faefe615a116303959aa16e151118195a895e024689b58e7e4c4d8be8eb6d68f6a19d17c4dedbefb1d8ee4fe505f0b9fbf7a81b034604a6c5dc82f287e2a2525edac8afc254f4ebaee98764f1ed603b225f68e5c5a5cb04c4d4dd45ebc78ee77b44d7d415959e5f754a8f069f385593d35af0ca580660503ea8179b53a3141cf95537f37f46c9b7d25b5996dfe95c6cb9f9d9c9ccc2b2d2d7fb4a8a8e469ad8524d619ca1bb9c6cfded04d5ecbb1b4238f6bffc1237f949c92dad0ddd3b5bf7fa0fb53b3b39ecab57cc666bcd6ac7354767765c3e58bff65dc355e59585cfa486959c5f794a84b1c64336ec8b58ea91e98253e61d26ab1ce2ae5215589adb68d9c9e6fd65bd8d6daf4e9c181be13959555cfd41f38fc05c5be2636f299bc37f802616bc0cca96b638b1e25b7fe8dd56a9d5059de23c343fd3f37a700e9728406f5f52bfceaee36cd571b7f6d7878f8505171c9737bab6bbfec487206ad4c4bf06fe9cefc44b3705ba914cb9e694f9e525bb234a45cf744d1cc8c27b7bbabed1383fd7df7aa2cd2a9bdd5755fd23def62e631f29eadb036600a7ece6767e7bf52545cfa5d2dbd89521ed5cff4f7767e5a257776451a8d2a68c4695bb4b2d696a6cf0d0f0f9dd032a1e71503f9a299e122df2bd2eed6abe7b3a26aacd1536eb7434b8a4cbee1ba1a3065f3e7b4b75efd6c7757e747b5255b47edbe039f5761820b5aff1894caae1129b7854f2aecdb9e596df6298f67ea1f557ea6b8a7bbf3fd9dedadf7c96f593db1afd812930623c152c3c678252e56b5b7367f56b34fb7e6e7173c5b5eb9fbcb69a9e9cd9add0a6a899648b8deed700edaf26c45017c8f625f2bea35e79bcd95755d6baa07a61fd2ccaef6d68f7776b4fdac7ea8baf7d6ecfbff92929cadf12c0f8bd84724ec0d9891d04c4edf9ebdfbfe4a951cac1323c377f77677dca7ca016ac3dcdfb3da1d4a128cdbb432254b8b8b09dab461775b6bf3af2bede348764eee4b15957bfe36352dbd899e57c43ec75166e7edb1d1a14ecd0abbc7c646eb94bb651ab1095349f57a676d7adb1a3616b7365ff9f9aecef6fbccd2b0ea9a7d7fa6d5159734014551caeb016ee2bf6f4a036636b9d0c3d55d5b77f0cfae04ce5a945b756b63e3c55f9e99f5669795effe92329fbb6255533fdc2e4a9570b85ca307952af1db6eb7bb322f2fffd9aadd7bbfe84c496ba1f10af7dd58fbf1cc5a540dfb5a0707fa4ff4f674bd5b397a3dfa94e96b7d921aaef879ff5ce6f0f040ad868d9f1a1d19a94f4d4f6fafababffb38cac9cd3345e6bbf07e17ec7a63460e6224d83a099a29eea7d073f1f131fe7eee9eabcb7b5f5ea4ffb952c5a5ebefb6bda5bf14ab8baeea6148ba9f5a48d684f365d69fcad99196f567979e503a565e5df49d1b091baf6e17e2cd7773cabd53e595b5b7fbf6f6626473da97b957f38a89ed8a38abd4e2b86b5ace165b4f65cb604960356d50e4b1f1d1ddcd5d9d1fe0bd3d353558af92f55eedef3bde292d2079dceb466b399edface82778553605d81ce609ea05ab11875df0b9a9b2e7fa2a3ade523aaaae950cfa7adb2aafa4b9959b92f6beada15acaceab73b6f6dce90a0e54dd9aae975e795c686ffa8f56eceddbbf77c778f661b15ffe8a7f10ae6dd0efd67e98728b1b7a7f3b6864b17fe83d9644599f317140678d90c0b17b4e59dd7e3aed2ce51d52625467b36a4a5a6a67a55b7ee8cc2047fef74a6b65a54f79e6df0427f9f8275844d6fc0deb810bf32f35d6323fb1b2f9fffdcd4e4c441ada19ccdc8ccba505656f5cd94b4f4868484576b3c5d379eb11a18d3e3321ba0ea5738d5353eb6bfbbabe34303fdfd27f54b3d595357f7252dd07e2cd1914455d5d56046e06bd47b4f70bb27cb3ada5b3fd0dfdf779beeb7d504f5353be9d482ef046b42823f2333b3d7346cbb4a2b7ea81d407a4d0144266822f0665ee79422a60133e7a9007abcea86157577b67eb0a7a7f33e2d00cf535c63aaa0a0e8f9d2f2aa6f2b93bf598d8c7bbdf131b34bb8e21e36a570642aee76acbfb7e7ddddbd3db7a8c653744e6eeef9aaddd55fd5aff1691dd3bdf56e2567fc660195324f545a44ae1a2da76618f3b406374b75ec0329ced4ae64674ab729f764ca43af26d08f6e640a445403f606911e3ca76b6cb8bea5b9f1639ad2be53b3957695e41953ddad479543f6907e317bf4e079d490f9b4846449555fafd933334b424c354d4d0c24fa667db9da64e4504f4fd77bd5e33a3633339390999ddd5a59b5fbfba5a5158f243b9dbdaa244b9a44643eab1b3a2bf5b8e34cc91d931d66d6b26a9848edb60d8946c69b23b201333466098f6253e99a213ad8dadc74dfc8c8d08db13131166752f28423296950359fdad2d2332e262627f799eebfa6cfe7940b14306555ccd666e633f4ff2ffbe6667334544c53ea7f7d5f6fdfbb8686062b555522460d624fc9aeb2476aeaf6ff1fc5474654c18012c191f14c721608ac5a20621bb037aee0f5862c6d6c6c78fff040ff8dea41dda86548bb352c8857c33597906099d502db592531ce9aad4655f0428b7997ac664bad98d8f87955e9cc542f2d56ffddbeb814585163d5bfabb4ec31cd383da461449f8de1e2aa1f165e8840a409447c03f66f0d99895f2dda15c7c8181aec3b363632543f3b3b93abea10a56acc124ddda6f9b939fdaf5ff554a2a2559960c16e4f9ad2b070548dd698feb73b2333bb212b3bf7a2766d1ed48a809948bb199c0f0208ac4d60cb34603f79592601513d338bd9f15b0d5792868466fd5b9aba5ba94ac3b02828aba926dbb4caddb84dd508c5b5fc665765fd77bf626741abd4b9366a5e8d0002c116d8920dd8db21988d17348254ecebb5787e2873c7827d13f83c0410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400081cd15f8bf2b1d52504cecfbce0000000049454e44ae426082, '', '1234', '2021-07-27', NULL, 0);
INSERT INTO `student` (`Student_id`, `course_id`, `reg_id`, `title`, `last_name`, `first_name`, `middle_name`, `suffix`, `house_block_lot_num`, `street`, `prk_vill_sub`, `brgy`, `city`, `province`, `zip_code`, `nationality`, `civil_status`, `religion`, `sex`, `phone_number`, `birth_date`, `birth_place`, `email_add`, `section`, `year_level`, `cor`, `type`, `student_status`, `account_status`, `e_signature`, `pic`, `password`, `date_submitted`, `date_verified`, `patinfo_status`) VALUES
('2021-00004', 3, 27, NULL, 'Wellington', 'Reed', 'Burton', 'Jr.', '', 'A St.', 'Prk. A', 'Brgy. A', 'A City', 'Province A', '8100', 'Filipino', 'Single', '', 'Male', '09521452141', '1999-02-25', 'C City', 'reed@gmail.com', '1BSNED1', '1st Year', '', 'Undergraduate', 'Enrolled', 'Active', 0x89504e470d0a1a0a0000000d49484452000001300000021c0806000000717df223000000097048597300000ec400000ec401952b0e1b000041d749444154785eeddd097864d75de77dada5aa5249a57ddf5a6b776be956ef6dbbdb5becd8244e9c10629210028190306102f3c030c0f0c2bc2c7979199810664870124292992c182780e37d8be3b5f7456ab5f67d57692955492595a492e677bc40b0dd6e2d55a592f4ede7e927e0aeaa7befe7de3a75cefffccfff4445f10701041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104020c204a223ec7c42763acb81a598959595d8e5e540ec722010bfbcb212f3daff2ec746454547c5c5c5cdc7c55b7c3131314bb1b1712b213b113e1801048226b0ed1bb0c5057fc2fcdc6cea8cd793e3f54ee78c8d8e54793dd339f3f3f3c9f373732981a895d8f8f8f825674aea606e6ede958c8cacd64447f2b0cd669f548336a7c66c3968da7c1002080455605b36604b8b0b16355c89336ab0da9a9beeeeede93e31353999af462b617e7ecea21ed752bc257e2e3a3a7a797139109f98983867b3d916a2d5fd8a8d8d8d723a53260a8b8a5f2c28287e252d3db3393ede32131b171f08aa3c1f8600021b16d8560d586071214e0d54cac8d040fdd5c6cbf7f6f7f5d68f8d8de669e818adde556b6171c9858cccacb6f48cccae2467ca487c5cfcbc7f71c11e1717bbb8b4b4649d9c182f1b1e1a38ecf14c17fb66677396979763aa6b6a7f90671ab2b48cd604ab7d66c3e27c000208044d605b346081a5a5d805ff5cf2406ff7b1f3674ffd627757e7a140607925253575480d5773764e6e43e59eea279d296983b171717ef5bc02ea51bd25ceb5b4b4f86a5c6c71d19f34ee1addddd27ce5debedede63fa9cf1dd7baaff715769c55336bbc3458c2c68cf1f1f84c08604b67c03a686cb363539b1ebc2f9331f6b6cb87c8fc7e34929282c6ca8af3ff8fd5d65152f24253b87e3e2e2fd1a062ead556a7ecee7181f1bd97df6f4cbff717cdc55515151f5645dfda16f295ed6cb9072ad9abc1e81e00b6cd9064c31ae58dfac37cb345c2d2dcd778dbb5c45b97979ad75fbeabfbfabb4fc856467ca6042826d7ea364ea95457ba7a78a2f9c3bfdc9e6a62befcfcdcb6fbce5f63bff28352db343013302fc1b05e6fd086c40206e03efddb4b79a99c5e1c1fe7da75f79f1975a5a9b6f494d4b1bbaf1c4c9afd6d6d5ff40c3c45e8b2561cdbdad6b5d8c7a6f66a8d9333d357effb47b3aa7bbbbf3e6332fbff8b9e3276efeef4acde88b21e562d39e030e8cc0966bc016e6e7ec7d3d9d37bcf4fc8f7eb3b5b5b56e6f6ddd33276fb9edaf7272f39be2e313fca1baa5ced48cc1c9f1b1cf279e7a69b2a5b9e91ee5912d9fbcf55d9fd7f14642754c3e170104de59604b3560fe799fa3b3bde58ee79e7deaf7a7a7a7d3f6d71f78e2d63beefa9394d4f41ef594423e9c4bcbc8ea99181fbddf35e12a6d6d6b79575a664687cee9ef343b39cb83860002e117d8323130d3f36abc7cfe232fbdf0e3df527a43d4818387bfa980fab7939253cccc62c81baf376e8d663ca307067a0e3fffdc33bfe7999e2e78cffbeefdcf79f945af582cd60dc7dbc27ffb3922025b5b604b3460a6e7d5ddd176db534f3cfaa74b8140ecedefbaf3f395bb6b1eb22458bd0aa4877dd98f1265e3babbda6f7ee2b187ff3427277bf8a693b7fd716676de25b2f6b7f697e19dce7e76c6a3951bbe64a5e0ac444745afe8477341cfdfac49cbd10c77d87e40b7aff0faae2ce287900bfe795be3c5731ffad1b34ffd8ef2e4576ebee5b6ff51b1bbfa61ab3dd1b3be4bdef8bbb4c468696e6ef6746dddbe07cf9c79f95359d939ef4b76a6f6e993c737fee97c42a40978dc93e98ffef09f7ea5ada5e5e6a42487df96609dd70f6994d269fa0f1d3bfea0cf37d364b73bbc9176de3be17c22ba015b5af05bae5eb9fcde271e7fe4f7944d9f70dbed777ca16a6fcdbf2899d4bdd937c7664b9c99764f7ebbadadf9ceb3674e7d34332ba7512917ffa2585cd0664037fb1a39fe6b029d1dedf5cf3ff7a3fb262726f6a9018b5a092c4769e54694d56a9d1d1c1ed8f3a1fb3ef65f0381a5067ae0e17f6262c27fc8d51d51a912f1dd9d6d279f7cfc913f5c5c5c4c3a70f0d00f6a15f37224a78cadee1342ff2a9bdd3eb9bffed03f98614563c3858f69989113faa37284700be4e4e6f6949695b5381c89012dfc8fb2dbed515a3f1ba575b3898343037ba7dd53d92b2b5111fb5d0ab757388f17b1e86e65d73ff5c463bf37393999555b5bf7f8b11b4e7ed19ee888a8219a02f7fedd7b6a1ececb2f38d7ddddb5bfafb7eb66c5c7e2c379033956e805b4a0bfbfbaa6ee99788b65c8ebf546cdcece46b9ddee289fe2088585c5a7d4fbee5639267adea1bf156f39424436605e8f3bfbece9973e353a3a52b17f7ffdd337dd7cdb5f24a7a4f59b18d82618bde3216df6c4f1bdd5b51a3ac62d7476b6dfadc5e46991768e9ccfc60412ac367ffda1a38fedd95bf74347524a4b4c6cfc585676dee5c3476ff8fa873efcd13f5609a6fe8d1d8177af5720e262604a9750aee88f7f5eeb1a3f54b26b57cba1a3c7bfaefcab76cdf64464399bb8384b606ad2753a2b2bbb7b7464b8d6e371170796165d5a2bc9ccd47a9fca087c9f7a5903a3c3437fded9defa94d7e3492f2ed9d554505cd26cb5d96614f78cc867330219837e4a11d5802daa8ed7c8605fede54b173ea6b852d4e123c7be915f58724ab37e0b41bff2207ea0dd9e38999191d9d6d878b9c6353a5c93999973591f1fb25501413c753e6a0d02d9b979bd4b8b8bfd9a503285e3028a8145dc88600d97b32d5e1a5143c879df6cfa8573673ea91843b652149e2829ad7846ddf788afc1a5d9277f5a7a468b1eee98d1d1e1bd8b4b0bf66df17470116f11888b8f5f562c4c65c769bc22e1f18898062cb0b4106b02f79ab2be2d292969a26effc16f596d8913918074bd735025d7a5d4b48c0ec5c1e64c691ffffc9cf37aefe1df114060e30211d380290521f7d285d3bf3ce3f3265755ef7d22232bfb8a7eed16377e89a1ff0493ffe374a6f65be2ed931e8f2fddef5f480afd5139020208444403a6c0bda3aba3f5aea1c181930adc5fddbdbbe6fb0a8c6ea905d271b1f1f39a6898531c2f7161c1efd0ee475b6299165f0104b6b2404434605eaf3bef4ae3e59f9bf7fbe30e1c3cfab5acecdc4b5bade2a9f60309e8efb2dfef4f999df1e69840ef567e30387704b682c0a67fc95412daded17af53dfd7d7d7b54bbfe6a7149d9b396049b6f2be0fde439c6c49afd2463b58060c1313b3393b5b26cf69be40f0208845260d31b30efb4bbe04a63c3cf6a857fa0a676dff7ac367b4465dbaf16df6cd1a6f571719a41b5cdcecea46b7e9d21e46af1781d02eb14d8d4066cd13f6f6f696efc806b6cacb0bca2f2544959e593aaaa1ad1395fd7768e5e510316abbd27e31616166cebbc1fbc0d0104d620b0690d98d60cc64c4f4f16b5365f7d5f5a7afae881c347bfaa0a0f5bb2f765bc35633a9f9e9ed19592923291e8481a538f924cfc353c88bc1481f5086c5a26be72a5d214fb7aefc4c478fec143477ea0aaa6a714b8dfb20b622df196d9eadabac7cc2edf0585c567941bc6f292f53c91bc078135086c4a03a6da49d143fddd950d972f7d2c31d1e15669e8af59ed8ea9359c77c4bd543db0801ae587b5b0b75389b8630ae8d3038bb8bbc4096d37814d69c0f4454f6db97ae503eea9a9cc43478efea323c9b92d56f36bd9936f7e6eeeaaf2c1b64402ee767b98b99e9d2710f618982a35c40ef6f51ceb686fbdc79e98e8dd5bb3ef3bf19684885fefb8da4743d509e654f46ecb0e85577b9dbc0e814810087b03a6de578aaa97fe9cd20dd2f756d73cab2dd13ab4148755fd91f034700e086c3181b036608a7dc58cbb46ab7ababb8e29d8edaddcbdf741f5be366d738e2d76af385d0410789340581b30a54e24b6b55c7def9ccf97a232cc8daae0d0b2d5960cf104218040e40884b50153a9e8bcbedeeedb53d3d2bc7babebbeaba0f7969e798c9cdbc89920b03305c2d680699160dc607fef6193f7959b97df985750fc7c5c7c02bb59efcce78eab46202802616bc0fcfeb9d4f68ed6bb63e262978b4a4a9f8c4f487007e50af8100410d8b102616bc0e6e67c69bed9d902c5beda8a8a77fd48338f733b569d0b470081a00884a5015b5a5a88ebebe93c3e3434549099997525c999d24bea4450ee1f1f82c08e16084b03b6e09f4fea50adfbc5a5c598c2a292e7557162db24aeeee8a7878b4760930542de8029f33e7a627cac7cdc3556575c5cd2f9eaa26dd590dfe4ebe6f00820b00d0442df8005962ceded2d777867bc99f9f9054d968404ef3670e312104020020442de8069930bc7d0e0e0b1d898d8e59cdcbc73b131716cf81a01379e5340603b0884bc01f3f96633dc6e77617a7a66bf868faf44fa2edbdbe1a6720d08ec14819036604a5eb57677759c9c76bb334acbca9fb3db1da33b0596eb440081d00b84b41e986ac45b27c65d7b545e26da9992d217131bbb45ebdd87fe4670849d2710080462b4f3cb1b9bbf2cebfb1192aa2c5a839cb01458b22e0702167330b393bc26d2fcfa3baf636ee909b5903660cabe4f76b9c66a535253c7b5d763a3e26014fadb79df53aef87501538d458d9665617e3ed9ebf51674b6b71644ad04e2cd767c367be2987b727cd866b34fa8baaf4f450e36d4b02c2d2dc62f2d2edab4e37d7e5b6b53fdd8e8c83e6db89c14a3bd1a12b40a263b37efbcd97f55ffee5107633626366e419b496fe8989b71a343da8029f33e636a723a57e9138d4e676ab790b61cd066dc148eb97d04d46045abe76355e3913c3c3850d1dbd3754b5f6fdf4d6363a3bb7cb3bea4c5059f26e61396555eca9792923a98919979597b2abce81a1dba644f748c242458bd8a1baffa875f8d64dcbc2a1e77b4b79ce86a6f7ff7c040fffe99196ffafcbc3f5e9b2dabbd5c8a0d049663ed36dbc79d29a9c37985f9e7d5c1e8cacecebd32ee1ae952033a6951815195b9da12936d216bc0cce2edd6e6a63295ce71646767375812acd3dbe7b1e44a10786701d3db5af0fb93c64687cb8787068ef5f5f6be6b6478a4c2e7f325c6c5c5cda8a1185183d56e898fd1ee82f3c91eaf27b3bbbbabb4b5b5a5c262397d4f4646c6707a46667745e5ee47478707cea9f067b729597eada3ea78b1ea71d95da32395172f9efba59696e6db663c5e5b41416163d5eebd3fcecece698a8fb7f8545034697272a268746464eff8b86bd7c50be7ef52231b6fb55967d3d3d20773f3f21ab5d4efd4e8c840a362d62ef31ef508fdea9d456495e19035608a7fd94647876b551f7e393d33b3393626664bb4e87c3111d8a8c0c2c2bcdd14ee6cb874f117fb7a7b8e7b3c9e2c0d13e77272f31b8e1c3df698aab19cb7d9ed13fa6f1ab6c5fa971697ac3e6d86ecd126cf93e3aeca9191e1fdc34383d56dcdcd37343534dc545858d85fb7ffc0f7265d238f2625a70ce83b35a7d1ccabf1320d15b50fa9dfa14a2fb557af5ef9e9f6b6b65b947399a486abe1c4895b7e50565ea1c9b3c4090d49fdd1d151a61316b3bc1c50abe9b76b03e68c8181defd830303fb868707f74e4c4e16f60ff4df73fefcb9f73b1c0e8fc391e4d2e75c2e2c2a3e3f34d8dbaa6d0f27d55bf4a833e25583b6ea5ee1463ddfe9fd21db3dda333d95f3f0bffce02b1aeb67dffbc19ff995ecdcfccba1bc103e1b81cd1650cea36576c69bdfddd5fe531d6dedf7689858a2c9ab9e9c9cbcf3a565154f666665359b219a7a34d7eccd68e54acce2e262a2c73d55a046e9d0a50be73f3c3931be3b2a6ac5a2c6a4797775cd3fe4e6159c53cf6846bd2ecbe884ab4acbf46eefe9ec3ca986322d2d2dbd4bdbfb3db46f5ffd834949cee1773a96f1323b84a9e7669d9b9f734e4f4de6f5f7f7ee371593d53b2b55018654bd245eb1eb18b37f85d3e91ccbccca6e2f2faf7a32afa0f0b47a689b3eaa0a590f4cbbf3a44d4c4c14aa2bdca79be6daec878be347ae80998dd317d4a4f4ac68666c4beea7b9e09f734c8c8feebd70eef46f7576761e7426a7f61d3e7aec7f9696963fa98d8e4714a45fd50a94d783f7e6b5cd9a3d6c2bada87ada6c8273e1dc994fb4b6b61e6a6ebe5a9f9a9a36959c9c3ca6ded04cf7f050b98684a9b604dbd4fefdf5df3f71f2d6bf4d4d4bef531c6b55b5f65e2faa602ac398bf23ead15d3e70f0e883ea9da5fb7c33a94a812a50dcee86f1f1f15235ac96d191e1b295e5953b93939d037afdf66cc0024b4bb19d6d4d95cb4bf3ce5467d258823561d32f3472bfbe3befccf47cc40496039665f520b4b94b767f5f77a1e2402936bb6d626ad2d56fb5d9c74d0f632bcc8a2954a2a0b92fa3bdadf5ce2b8d8d9f9cf64c6757edae79b8fec0c12f2b48deb3da86e4ed9e0205ef4d633eac86eca1dc82e2734d572ebff7dcd9333fdd3f30b0373030906eb3d9e6939292878f1fb9e187870e1ffd6e764e6eeb6a1bca6b3d753237c734fb5498bfddfa7b413db16714d376e8ff8e5e5e59895d595e8e55a72422aa2987a407b6b21288d378be78797925d6999ad665c6fa3bef6b7aed2b560c42a938a1c9f9895467355a714b81c5043554ce81819eb2bebeee9b4c8a8d77da5ba0e14bbafedd6a46348a0d8de7e4e45e52e0f99fbddee94be68b1229f19637dbaaca4ae2e484abe26a53e3c7bababaee302910478e1cfbcb5da5658f297e34a4585550f2ba5e6fc8fa15ebfa6a75edfe7f566e6589be5fb98a6745e715145c311b295b6d896e4d0e04e5786fbe4e5dd7acfe9bf91b717f42d280694890303ded2e51c3b5a4317373744c6c44ce6084f36e98fd30fd0bf34ecd02a569a861f74c4fbaf56be98a8d8d9f8f898909c98317ceebbbd6b1f4a5b39a69fdaeced6033dbddd27c65daebd26b6b21215d0e311e74f4c4c1acdcacebe64b5da26356cc99e9e9e2e1a1c1c38a018cc1ec573daf756d73e30e3f55c7e2de81d396938ba8fc9fd7d3db79c3d73e6d74dbc284375ee8e1e3bfe85fcfcc253ca8bb8e66ce146ee897a73e67b34fc6aaf6c6949f1eb952835eedbf6d9598d55481a300533ed6ef754a9c6e8be648a1746c923616a72bca4a5b9e14303037db7cfcfcfa7e6695f80da7d07be929e917b315cbf6e66aa5dbdbf78c539124c42a5e6a4a2a2a36396f5cbed57ec653e5853e50a0a5bcccc98d6c166365cbe70f3c8f0e011cdaced5d5858b068c83362e24225a5a53f4e4e4ee94fb02428cf297e2e265aa3ca95e557530ff4ec947475b6dda1b482db9f7ae2d1ffbfa2b2eac97dfb0f7e53c3985ee5276d7a25dff9b9d9d4ae8ed6f75dbe74f157c7c6c7732a2a2a1f3f74f8d85f29f6d421cbb0fc5887aab7b59a4623925e1392066cdee74b53f02f5fdd68b77e592362acbc59e8669a7b70a0e7c073cf3ef9bbbdbdddc7f5b369b1db6d6a47967234ad9d70e0d08d7facd7b4867298a42f7ec2dcbc2f6da0bfbb6c686860bf6ab355aab793b9bcbcacc4ece88082c27d2525a52f4dbb27cedb1393c6147f5af397d004e2350cb498e3a8f139d4dddd79876b6cac46b3d0e9995999edf5f587fe5e335767f44c0c9b44c9571bcdb70fd8fbf459639999d9cd15957b1e514ed32f2b19f34605aaebca2baafe593b5b3da2d9af310dcfd67c8ec17806e6e77c29dd9dedefbd70fedce7746dcee3c76ff842d5eeea071d4949433b2d2c100ccf8d7e46d01b30958f8eedefee2854f66fa66219a7cdb2888d9ee4567ebf594ef5e2f3cf7ef685e79fbb333333d373e8d0e16794577361da3d75606868f0485a77c7dd7babf70de91a27837d9d665a7f4ed5403a3a9a8f35375fb977647868b77a41f1faf2fb62a2a3350a598a33c3d7c181beda96e6a6bb745e4df5f587bfe9f379cf2624d8a6af37643359e6ead55935e39ca245fb351afa1d54e2e6418f67ba305a4bfc9234535553b7ffef35fd7f4ab356fdca1f5a55ef49634b332c3241e48b4a4bf883c1c1bee3972f5df8f4d933a77e5dd7705cbdb1fbd52837aa3716d667cbf4bcdadb9a3f78eecce9df5042d5ca818387feb6a676ffb7140ad8d13fd2c17e6ed7f279416fc09603cb716608e0f7fb2dced4d49e9dbc7987998d1d1cec29efede9399a929ae6b9f5b63bbf527fe0f0f734adee52f0b76ecce5fae2c8c8d00da5e5553f086603a659ab380ddfb2fafbba6a2f5d3aff493528d96a14668bd5cb2a2c2c7e392323ab4d719a57cb7a6bc8e670b9462bbbbb3b6ed39677bb5f79e5f9df2c2a2a79a9b4acf209afd7dd6d1a323572a6b7f35aac656525c6cc442d2efa13c75dc3f9bd3d7dc78706078e8e8d8dedd6cc625c5a5aea8002f00fe8335e713a53fa12131d2efd88ad7b124756139abe7f5231a6e6ab571a7e4e3dbbf79e7ae5853fa9db77e06fe6e6669f37c9956b79e0d7fb5adfac37b3bdb5f9fd9a05fc7533143e72f4f85feda9aefd8e664c99615f2f6a10de17fc066c6539deef9f4fd1e3beac7847afbad5eb7e7883707d9bfa11ea8ddaba3ada6ed778d17eecd80d4f1f3d7ee2cb0a5a8f69d816ad8cea4e67b2b3570d7df2e2c28299a20eca1f05cc93c7c7c72aaf365dfe787f7fff6193835753bdefbb25bbca7ee470249bc4c6b937c7ba34846d2aafd8f3cce8c8506dd395860fb7b6b4ded9dbdd73322d3dbd53499817d4888cc6c5c6fab5a781d5c4a8ccf05333887b464747cbbd5e5f5a82c532ab6295cd9555558f1714169d49d4c264cd9ccdabd10ccada572d3636cf50a77a935f34c1f2e6ab8d9f3c7ff6d46fabf13fa400ffdf68898dd22e4297193ee79b496f696ebcefdc99339f5b5a0aac2865e14b557baa1fa0f10aca23bba10f097e03a675559ae6add1a2d4690535dbb7caa2d00d295ee3cd6ef76489a6d83facc5ecfdb575f50f9af8d21b0b73f5a59856afac453b351d560367d9e8f1cd70518987b9cd4d97dfd7d6d6f241b360779782e57bf6d4fc8319bee94b7ecd8d545e6fd026351c7c212727bf414bc06aae3635fcb402ef35dddddd8714943741ff38e57e04343133eb48744c38921c2ed3cb4a4bcb6ccb2f28bca005c17dfa37b3c42464b1290dd5dc9a1c785833db0d571a2e7ea6adb5f9035ecf4cfe818387bfa0736c56e31cf4e52d0a012429607ff785f367ff83df6f7a5ec7fe5ac3e2ffad73094bcf6fa3cfc5767f7ff01bb095650d2f1693ad56ab4fddfbb1ed0e78adebd310cb72a5e1fc3105ca9d8a053ea3757017141cffd72fd8ab29040ec790ea312d6a2670435f7a7da9edeea9890acdf87d5a71b5c3eaa534d5d4ecfbba16035fb12a437bb575a65e8f794d2936f692297fa480759a7a5a95664f4fb3e038362e76d1cc22aab288191a2ad81fef5383351f6f597db5848d3e0f9a00306b6adba7a7a7be204faf163f7ff085e767fefba14347ff5c8df80bfa6f41ebf16b4d63e2c8d0c0f1c6868bbfaa9eb25531afafecadd9f76d1aaf8ddec5e0bd3fe80d58602990b0e05f48b4582c73a6ee50f04e756b7d92865ac95ac8fbeea4e424efaeb28ac7df5c8d56a348d565b24ec7c5c6a9018b5ed750cb543c50e392d1d7db758302449fd05ab8ecd2d28a1f2a36f36df5bafad63bb3a91942733ee6de99bf5d6ad06257f4c3a4c0fc4a744cf472242cf751233aa000ffdfe85c7c57af367deccce997ffeb8d965b7e578dd8c5603462fa014ad082ecbab3675ef96d3393aa7cb47fd482eaaf3b9292a92a1c415fc5a0376026b86b1215b588d5bd932bb02a1695313b335b54a0252059d9f9e7df92bfa4ca008b8b4b7653cceef520f99a1e0b53aedb0c519b1a1b7e41a91127146c9f387ce4863fd34ca202dbf6a0fe70a84133cb4b226e8da2990cd1b3767f527272bf2a3ffc9a1ab1ffb66fff812fcafe45a5efac7bef5193fa323e365c6fe26cc3c3c3655a16f48d7dfb0fddef48728eace926f1e2900b04b526be995657bda34cfd4dd30af6a5f5f62c427ed5213e805936a359c042658f0714877a4a5fa689b71e323a4ac1fb14135732c9a46b39250d1913c7c6468e9c3bf3f21f9a21545656ceb99b4edcf23bda77e0b160375e6b39afcd78adae775a33a60f2b0ef6974a10769c3ef5d21f7475b6bf4fc3dfe4f59e8fd733557ae1fce9dfeaeaec3c5a5e5ef17475cdfe6fd278ad5733b4ef0b6a0fcc0c33148b29d71738510bb8bd1b8ded84f6d243f7e9ca28b7a8be53a96a2af915a8ef3271aeb7399a296514a774a27825b4aefa8fd9e57c6c74e85853e3e55f9b724f155557d77c6f6f4dddd795d5ae19dfedbb24e99d80f403e1d5ccf7e3a6c7af06ecf7f4f777cdda4a35620f6aa6d0e493adfa8f72e0d22f9c7de55734fcbf41f7aefdf0d11bff42c3465379813f112810d4064ca573139403b64b719268d522ea53c2e4aa4a7a44a0cb864e49abf5d503f39528f5401b292c272a772af62d1fa87c2a05bfe7f46ff1ffb6afc3b50f6b6a9c6b6894d9dbd379735757c74734e3367be8f0f13fce2f287aced498dad0096f83372b9ee853cff419a5edf84fbdf2e2ef2bf1f5b3662993d22cbeb1dab89582f6d6cef696bb348bfb7e2d811b3872eca6bf504589ee50ceac6e03fa4dbd84a03660a6448aeae0e79afc1fc52594c41abb63abb06af6d112585e369b2a5425a7a45ed25dfe77abf9559d3c46b1a5452585aab9bf76105fc3f258c5bb925ca3c37bbbbadade3f38387852f95c83b575b5ff2b332be7bc02d63bf247e2edbe359aa19c5323f6c20d3127fedf33a75ff92fe7ce9df98c664e17142bfc27cd9ef65d6f65812946d87cb5e1e31a8ac62ae1f81b45c5a5cfaaf10adaace6a67ed3b7e9c183da80452b575b29148e68a50824a7a47568ffa635c576b68bb1e9052857e9c70aaedf31ed71d73b67d3cf6a48d3f4ef7ba4d12a07bce4888b8a8d56b96db575cb0a87fddb1050bd5955e65c704c8c8d5476b4b5dcdbdede768f32c0ad5a0ff870cdbefddf508e9d593fc997eb4d0f8da9bf25b7174fda6c93674fbff8fb0d97cf7d667e6e26af6effa1ffa57bd06f4a9cbfdd73a69a5ec917cf9ff9707fff70a582f67fbfa77affb7f55911594266bb7c4f82711d416dc014fb8935b5f0f5c59ad31067e6d57a1f3bf08fd9044125b52f6564649e52a9955ad545fbc5925de55f53fcaa5b551fbcea72ada8b44e8232da0b15ffb22a989fbcf25a32ebab3d567dd1e295949ae51a193e78e1dcd9cf29a174b7d6118ed7edabbf7f6fedbeef9a0a9f3b35deb59ac7c9a45168c8dd78ec86937ff8d28b3ffa7c4747dbfbd5cb0dd41f38f63ff4feb7e4269a923f2a8d73a3d978635769e90b4a99f8aee26a2c115a0df626bf26b80d98b2f0cde6999604cbac451535b56466473660e69e2aeb7ea0b26aef5f2bb9f4ff19e8ef3ba97586e55a96f3485e7ed153aa2f3ea20073b686dbd9eab1da34f1b1473396c3aa31356b82cf83fd3dfb5aae36fdacd61756eb8bb7a0ccefaf55eedef3505a7a46bb32ea57559a78939fab4d3fbca92caa3cb99663c74ffeb7975f7aee4fd488bd4755373ab402e29f6d76c7f81b276866ceb52e55b38e673f67361d3b7ce4f817d4bbeddcf40be004562510d4064cbf7a56ed006cd3af97c7049957139c5ed5596ec117996450b3bc4553f09f5779998ff6f474fe547757e7efa4a767fc4c5e7ec1f3b3b3defc81c1fe6aefe474aa66223f31d0d7776451e917a6a0dfd4d464a1e9c51614153da7e4c96f9aaa0e0ad4d370adf1393009b76ac42e1f3d76d31f9d39f5e21f5cba78eed7cc0f86868bdfb25a5f5b84add9e21cfdc8fcb27aca45478fddf0052d746f79bd4efc1a8fc6cb374320b80d981e0eb34554b233715c5fc0b0963ad90cbceb1d538db849febcacde569f96f59cbe7ce9fcafba5cae522547fed2ac6fc6e999f6d826c727a38647c76e517588635a9ae3d702eafeb2b28a27b4b3cc03a6c7a5866b4d6900d73ba79df6ef26706fb2f30f1c3af6e7afbcf8dc9f363735fe7c7a46d615ad713ca72ab9b696e6abf76aa38cf7e5e7179caeacdcf39066869914d9420f49501b30e5e224fb9564a92f6eaf9981244ef3da93a05c24ad2f5c7c48b38667559df498cab27cb8a3b3fd3619c56bc9cf6c764e4e5756764e675171c94b6abc9e494e49e9d35e7ec46082f445323131cde49e362b152e5d38fb1b972e9cf94f2afdfc63c53a3c972e9effb47ac08b353575dfd5307ec7a7a304893c6c1f13b4064c5fd0989e8ed674535f4ab36a4b6abc825e19206c2a2138d0ebb944fdea0da8067c4ea37642f68f8e8ed41417957ebf72f7de1f689a7f48bffe3e7dd9766cea4908d8fff523b5946b5e9328cf9a72e7172f9cf90de58afd675345767e21b0ac6ab15f553edd2beaad6d68517d28cf9fcf7e7b81a035604ac88c3675d0350ba9cc72d378ad6f81f276bf51a637a0188c2b37b7a0417118dffefd87be65773806226181f476b7d74cae6f66c6f3ccc8f0704d4f77cf67552f2d4dd5252eeed95bf34f9a1ca1aaea167c0082b816323aca6c81a58426fdafcda58ac23b7606f27acf81b2f3ad0a2e679acd4915fb32a59b236ea1f4f5ae61abfebb928027ccfa54fd90b814d08fd23d1834658182557c71abba6cd5f30e6203a6496865956bf9cca229a3a35d661842becd53611256b524285b659ecbd5e06befc0f855d589dfaa0f58a49db70975e8af4de715a71fda286d165265fe9a0a149176ae9ccff50582d68099c6cb6cd5a52cf465b391c74ead44713d72f5bc6ca32383b7688d5eb6d6e8b52a564836fdf5d082f8ef0ae627f7f674df6aaaa6d8edf665ffbc3f53955d3fa21f9492201e868f0a9340301bb068f52eb435b0a979f7139b4084e942b6ca61b4e146924ae11c5f5200d96ab38d32531bbe3b673659518e5dd540ffc0cd490ea74f556b4f95969636a800419dd22b7e55f1b1bcf09d0d470a8640d0bacdea71ad6859ccb2897ca937b6860231c1b88cadf3192ac09733e3f51669f838aa697ca6edc378eb340399d4dfdb7bab966e6554d7d43eb4ffc0a1fb15ab8d56e58adfd49e9def5111ce41a5027d5d952ddc613c2d0eb50181a0f5c0cc3968f868e25eaa26f35a4f6c03e7b52ddfaa388b657ada5da98cfb44ad93bca4068c5caf30de69afd753d4d3ddf51ee57bb9f754d73ca07a5fada969194db575fbff679236a6d5de961f99708d1d312b4ac2785a1c6a0302416bc04ccccbfc558c274e5983761313dbc0796dcbb72a46689b9a9c386476a5d6a6192faa1e3e59df61bad3ca014becebe9ba53c3c5c2dcbcfc97d3d233af9858ad2947a4fffbb236a8fdebc585c5849696a6cfa8ac4e89996c09d3a971980d0804ad9131c346a550c4aa7711af2e7a120dd85befcab202f8dab1bcdc64806b579f7e5510257d62030fef5ade3aa73d0ab401ef6d66ebb7f28aca7fd1ea88718d185e4df5d1fdf069a1fd0bc94e67537f5fef41ed547e97869bceb57c3eafdd1c81a035602606a6ea13cbafd7b68a373b386fce2545e651b5f7a3f60b98cdf7cdcde46ba7a27eedda44e264986e951a23ebf0e0c009efacb7b07277e523da76ae41795fffeec743f9786e25b47e392333bdabe9cae5cf0ef4f7dcada4ec0defd719a64bdcb187096a23a320be02f9d1ea7cad985aef6f2da3bc639955e32b10b04e4f4feed5fe82a95a36d4a6a545ebde35670733aeebd2cd4ef12a2e79ab7e347c5a32f4bc9615bd6581bc4926d6e2f9466d10f2bf4d46635f6ff707e7e666b3d77540de143681203760afc6c15654d8309e06ecdfdfc3a5a50587d2276e36731c0a1e5fd0178604d6303ce6a624b77b7272cfc4f8786d5a5a7a937612bf72adfd32b511f3545151e9235ae8fd8c6265a58303fd779a5dc9c3709a1c629d02c16cc056f4a55c505c6749a91426b84010f4276e8aeaac67eb4b51ad2fc990363c6927feb5ce27768d6fd3a49275746cf82605e5e30b0a8b9f54eccbf54e1fa1dc3c970a517ec5e974760ff4f77ed037375bb0c643f2f2300a04af0153cf4b333a9ad589f76b7b3562603f7113cdb4bcc73355a54a1d492a687856051fdf52d6388cf77c471d4ab38fe9eea9a9fd29a9a93dd939b9a7f58cbe63cfd7d40f4b494d6faeda5df325f5de127a7bba3ea2a55f693b0a6d0b5d6cd01a3075cb57cc0c8ffe775e35e02d0c21ffed29300994a3234337ebcb6166bb9e93119b4584e14b62f2ee5469f5a07abff97979f92faaf7bbaa1f0e935a919e9e79212b2bfb946625ef56c9ef03fa2c869261b8676b3d44d01a307360e5d5cc29c769c1fc72a91716b42cffb55e5424bdded49cd2129512976becb08627434e67da55ea4e85e70e691631716c74f876b35c2b2333fb829ecd55c71d35d4741716953c6836035129f04fa9f47419b961e1b96f6b394a701b302568c6ab01334348f5c2b4612b7f969797ac5393e3b59e69778e960ff568068cf489303c1666b30e2ddc4ef77abd155ab43d9ce870f49942036b39b472f5fa3233b3ce4d4e8ed78f8e0edfa912d48eb5bc9fd7865e20a80d980a192e9bdda6f5c71913134d754bdd3f7d899c7d7dddef595c5c8acacaca31d9f7abee0584fef66fdf23981fd19191a1135abcbd2b3b3be7596bc2dae38efab1992e2ad9f50fa6ec916624dfaf24e40a93cfb77dd5b6de9505b5015372e08216c29a1c1b95d659def13103b3ac4a7b3f166b0d5eb952273ab5e3cd256dac4ac31e86ef89d9decf333d5dad78d68c3325ad51cfe69a3799d19033909ce46c532fecc75a849fe51a1bbd5d9bd690a11f86fbb7da4304b50153ac61c99e6877991898095ceff45f2bb31c6568c8e4122d590b0b8b9ed65e91c3abbd31bc6e63025a8feb54da4a8d43e5ba357cd486c2ebab7aab6546eedcbc828735bbee568fee1e25b7162b1616d4efcdc6ae7467bf3ba837225a0d9823d1316c726ee6e7e63277f24ca47a5fb1b30adef7f5f5dca3c285fd8545bb1e63abb9f07cd94cdd2fafc753eef1780a9d29a94da6115aef9195afb7a258586f4a4a6aa3a966a18d586ed38c24b1b0f58206f97dc16dc0a26302fab2f6a90716e7f54e97aaaece8e9d8954ef2b7970b0efddfa1265e5e6e63f9d9494d24df1c2203fbdd7f83813fff27aa62bb424244a797717365af543c3508faa873caed2617363a323b7fae7e733c373251ce57a02416dc04c1d7ced22dda7076859c1d3bd260bfa7a27b01dfffdf5d4895d8383fd77690833a8e9f847f4256067ed30ddec57d79d7adcb5f6c4c451a733a555e93d1b2adbadf7cfeb739a349bd9ab7a6e65fabbdbf4f2c274391ce61d0482da8029ceb0aceef6b01a32ffb47baa726161679624d1cc638aaa19dca307bdb0a0a0f831952fa6f715a6afa182f7d1be395feeb8cb5567b3db864dd9ee601c5a93532e7ba2a34335f453c65d63b72e2e2da604e373f98c8d0904b50133a7a278c38c1a329fca26e7fae7e7b2765a205fbdce9899594ff1f0f0e0adca3bf2aafac193fa0527f37e63cfe9aadf6d7afdaed19123131313c59678cb687c5c7c507abe66a779ed623464e2bbcae9ab3765a9577d52bc306402416fc034f53c9f9b9b7369da3395e6f1b89537b3b3e26026f6d5dadafad1d1b189d25da5950fa4a6665c7da3705ec8ee221ffcaf02da2cc56a4ae728592ba0ea13176262e382b2d3b926a816b58675303636daeff3cd146b36b240cf36c3c84d7ef642d080c5cfa5a5655cd52f5f6076d65bb9b21cd83145e1b474254e53f77bf4057a97aa19f41417973e64f29036f91eefa8c39b19c2d9d9d902adcb9d4a4e49697b73e1c2f56228493b9060b58ea968a74fa111bb36c5a5eaf07a3183f8bea037609a765e48cfc86a5200d5a399a0bdbad13b26f14f85f332bbba3a3eaac5c3c9bb76953da0a9f776661e83f8b45ee7a3cce4c99ccf97a3bf1949c9c9bd498ee4be601d5d0da18a1558c735a3e9d6331d6df21c55db8dacfc6001aff37382de809972240a760e2726268e6926b254dded0213175ae7f96d99b72d2cf813c7c7478f8e8c0cdfaa2a060dea7d3dae7820cb86c278074d01016d50bb4b3d2465f324776b595b50e25f6f5c82e9d5e933ddfaff03a6ecf08a8aa887f1f238d4db0884a461d1b06956b3913d931313599313ae439a72ded6e914266955498e156d6dad9fd122f698f2f28a6f3b1c49033c71e11530cb87dc5393d54b81a5044762d280591912cc33d0e4d47c5c5cecbc266566f48c4fabf55ad3e2f0609e0b9ff59a40a81ab0190d235fd1502a4ae54c8e2d2efab7f530d20c93b560fbc3aa3d559d9b9bf7747676ee4b5a7ac2966961fe96a9e1b2badd137b14685742b563500d5850777d52626c6c60299060898ff7da4c514ab3910d7f365520240d585cbcc59f975ff4bcaa60f64f4e4e54a8a265eea65e65080f6e76aed1aa83cac1c181bbd5ebeaadacdcfd772a9c1794dca3109ef6b6fc6855bc4dd1ca877ca54fcc68043064aaa304f34215e34c9b999dc93649c916ab75dcec831acccfe7b3d62e109206cc9c86e26023da40f4a5d99999746d145ab65d773bd6747a6e7f7fef075442c85e5050f843656cb72be0cb83bdf6677143ef3009acaa1891a1007eaa7abf330ab84faa0716b4fb602608b42d5eaecfe74bd150725ac17c5f303f7f4317bf83df1cb206cc6c1b565555fd1dcd4a2e6a7384fb66555266bb39cfcffb5295b0faae9e9eeef76ae8f8a3f2f2aaff633649dd6ed7b915ae473b6169f1bcd76cc06151f6fdb82693823a843713044ace2e50b8c0a609aa1e3562242747c08311ca066cd966778c685835a83a4ab51eafbb565b8b6d9b60be661d6dde6977757777e727cd35aaf1fa86dd9e48b99c4d7aa8d5c0c46ad3e0ec79bf2f393636662e26366643eb1fdf7c1966b779fd589d88d1e6a7dad7b3c5acfbdda44be5b03f2110b206cc1cc392609dd642e647e7fdf3b1e36323776915ffb6d82854c361fd1a7b2a3b3a5a3fab8d6a93caca2afe4ec9bb66b7e7a00d59784ad726604a37698897a3358a7126e154f722683d30530b5fe919a5dad7a05ebdbb4915a7bcaaccfca036906bbb5a5efd8640681b30e54195ecaaf8be4a9a346b53d7c3eea9f1e3ea856df94aadf373bebcce8e965f19191939585252f61d95cb79d6ecfacc63b57902668650f95fc95acab6989c9cd211cc21a46ae15bc75d230714ffca484d4d6b329335c1caf0df3cb1ed71e490366086c866b78f96ec2aff8ecafbda06077a3fae2fff2ee54d6dd9044013f7eaea6affa8e25e3f959cecbc5a5c5cf280868eefb859eaf6785422fb2a4c0c4c6718affcaf29ad80e850803d683d242d892be8e868bb4f8de44a4161d1930956db78646bec9cb30b7903161f9fb0909d93ffbcdd91d4a72cf5eaa1819e5f98f3cd166f4562936d3f323c78b2a5b9e9e39a851a2f2bafbc3f3131a9772b5ecb763c67f582fd898ec4290d21ddea810525074ca9130efd60dd3b30d05fa7b4a0b6bcbc82e799a8899ca727e40dd8abbd306de75e59b9e77ecde02cf6f676df33e11a79cf827f2e397218ae7f26dae139d1353a7cc3d5a686ffa45ff7c5eada7d7f99939bff92d9f8e1faefe615a116303959aa16e151118195a895e024689b58e7e4c4d8be8eb6d68f6a19d17c4dedbefb1d8ee4fe505f0b9fbf7a81b034604a6c5dc82f287e2a2525edac8afc254f4ebaee98764f1ed603b225f68e5c5a5cb04c4d4dd45ebc78ee77b44d7d415959e5f754a8f069f385593d35af0ca580660503ea8179b53a3141cf95537f37f46c9b7d25b5996dfe95c6cb9f9d9c9ccc2b2d2d7fb4a8a8e469ad8524d619ca1bb9c6cfded04d5ecbb1b4238f6bffc1237f949c92dad0ddd3b5bf7fa0fb53b3b39ecab57cc666bcd6ac7354767765c3e58bff65dc355e59585cfa486959c5f794a84b1c64336ec8b58ea91e98253e61d26ab1ce2ae5215589adb68d9c9e6fd65bd8d6daf4e9c181be13959555cfd41f38fc05c5be2636f299bc37f802616bc0cca96b638b1e25b7fe8dd56a9d5059de23c343fd3f37a700e9728406f5f52bfceaee36cd571b7f6d7878f8505171c9737bab6bbfec487206ad4c4bf06fe9cefc44b3705ba914cb9e694f9e525bb234a45cf744d1cc8c27b7bbabed1383fd7df7aa2cd2a9bdd5755fd23def62e631f29eadb036600a7ece6767e7bf52545cfa5d2dbd89521ed5cff4f7767e5a257776451a8d2a68c4695bb4b2d696a6cf0d0f0f9dd032a1e71503f9a299e122df2bd2eed6abe7b3a26aacd1536eb7434b8a4cbee1ba1a3065f3e7b4b75efd6c7757e747b5255b47edbe039f5761820b5aff1894caae1129b7854f2aecdb9e596df6298f67ea1f557ea6b8a7bbf3fd9dedadf7c96f593db1afd812930623c152c3c678252e56b5b7367f56b34fb7e6e7173c5b5eb9fbcb69a9e9cd9add0a6a899648b8deed700edaf26c45017c8f625f2bea35e79bcd95755d6baa07a61fd2ccaef6d68f7776b4fdac7ea8baf7d6ecfbff92929cadf12c0f8bd84724ec0d9891d04c4edf9ebdfbfe4a951cac1323c377f77677dca7ca016ac3dcdfb3da1d4a128cdbb432254b8b8b09dab461775b6bf3af2bede348764eee4b15957bfe36352dbd899e57c43ec75166e7edb1d1a14ecd0abbc7c646eb94bb651ab1095349f57a676d7adb1a3616b7365ff9f9aecef6fbccd2b0ea9a7d7fa6d5159734014551caeb016ee2bf6f4a036636b9d0c3d55d5b77f0cfae04ce5a945b756b63e3c55f9e99f5669795effe92329fbb6255533fdc2e4a9570b85ca307952af1db6eb7bb322f2fffd9aadd7bbfe84c496ba1f10af7dd58fbf1cc5a540dfb5a0707fa4ff4f674bd5b397a3dfa94e96b7d921aaef879ff5ce6f0f040ad868d9f1a1d19a94f4d4f6fafababffb38cac9cd3345e6bbf07e17ec7a63460e6224d83a099a29eea7d073f1f131fe7eee9eabcb7b5f5ea4ffb952c5a5ebefb6bda5bf14ab8baeea6148ba9f5a48d684f365d69fcad99196f567979e503a565e5df49d1b091baf6e17e2cd7773cabd53e595b5b7fbf6f6626473da97b957f38a89ed8a38abd4e2b86b5ace165b4f65cb604960356d50e4b1f1d1ddcd5d9d1fe0bd3d353558af92f55eedef3bde292d2079dceb466b399edface82778553605d81ce609ea05ab11875df0b9a9b2e7fa2a3ade523aaaae950cfa7adb2aafa4b9959b92f6beada15acaceab73b6f6dce90a0e54dd9aae975e795c686ffa8f56eceddbbf77c778f661b15ffe8a7f10ae6dd0efd67e98728b1b7a7f3b6864b17fe83d9644599f317140678d90c0b17b4e59dd7e3aed2ce51d52625467b36a4a5a6a67a55b7ee8cc2047fef74a6b65a54f79e6df0427f9f8275844d6fc0deb810bf32f35d6323fb1b2f9fffdcd4e4c441ada19ccdc8ccba505656f5cd94b4f4868484576b3c5d379eb11a18d3e3321ba0ea5738d5353eb6bfbbabe34303fdfd27f54b3d595357f7252dd07e2cd1914455d5d56046e06bd47b4f70bb27cb3ada5b3fd0dfdf779beeb7d504f5353be9d482ef046b42823f2333b3d7346cbb4a2b7ea81d407a4d0144266822f0665ee79422a60133e7a9007abcea86157577b67eb0a7a7f33e2d00cf535c63aaa0a0e8f9d2f2aa6f2b93bf598d8c7bbdf131b34bb8e21e36a570642aee76acbfb7e7ddddbd3db7a8c653744e6eeef9aaddd55fd5aff1691dd3bdf56e2567fc660195324f545a44ae1a2da76618f3b406374b75ec0329ced4ae64674ab729f764ca43af26d08f6e640a445403f606911e3ca76b6cb8bea5b9f1639ad2be53b3957695e41953ddad479543f6907e317bf4e079d490f9b4846449555fafd933334b424c354d4d0c24fa667db9da64e4504f4fd77bd5e33a3633339390999ddd5a59b5fbfba5a5158f243b9dbdaa244b9a44643eab1b3a2bf5b8e34cc91d931d66d6b26a9848edb60d8946c69b23b201333466098f6253e99a213ad8dadc74dfc8c8d08db13131166752f28423296950359fdad2d2332e262627f799eebfa6cfe7940b14306555ccd666e633f4ff2ffbe6667334544c53ea7f7d5f6fdfbb8686062b555522460d624fc9aeb2476aeaf6ff1fc5474654c18012c191f14c721608ac5a20621bb037aee0f5862c6d6c6c78fff040ff8dea41dda86548bb352c8857c33597906099d502db592531ce9aad4655f0428b7997ac664bad98d8f87955e9cc542f2d56ffddbeb814585163d5bfabb4ec31cd383da461449f8de1e2aa1f165e8840a409447c03f66f0d99895f2dda15c7c8181aec3b363632543f3b3b93abea10a56acc124ddda6f9b939fdaf5ff554a2a2559960c16e4f9ad2b070548dd698feb73b2333bb212b3bf7a2766d1ed48a809948bb199c0f0208ac4d60cb34603f79592601513d338bd9f15b0d5792868466fd5b9aba5ba94ac3b02828aba926dbb4caddb84dd508c5b5fc665765fd77bf626741abd4b9366a5e8d0002c116d8920dd8db21988d17348254ecebb5787e2873c7827d13f83c0410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400081cd15f8bf2b1d52504cecfbce0000000049454e44ae426082, '', '1234', '2021-07-28', NULL, 0);
INSERT INTO `student` (`Student_id`, `course_id`, `reg_id`, `title`, `last_name`, `first_name`, `middle_name`, `suffix`, `house_block_lot_num`, `street`, `prk_vill_sub`, `brgy`, `city`, `province`, `zip_code`, `nationality`, `civil_status`, `religion`, `sex`, `phone_number`, `birth_date`, `birth_place`, `email_add`, `section`, `year_level`, `cor`, `type`, `student_status`, `account_status`, `e_signature`, `pic`, `password`, `date_submitted`, `date_verified`, `patinfo_status`) VALUES
('2021-00005', 3, 28, NULL, 'Dobrev', 'Nina', 'Clairemont', '', '', 'C St.', 'Prk. C', 'Brgy. C', 'C City', 'Province C', '8100', 'Filipino', 'Single', 'Catholic', 'Female', '09652525412', '1999-11-11', 'asdf', 'nina@gmail.com', '1dd1', '1st Year', '', 'Undergraduate', 'Enrolled', 'Active', 0x89504e470d0a1a0a0000000d49484452000001300000021c0806000000717df223000000097048597300000ec400000ec401952b0e1b000041d749444154785eeddd097864d75de77dada5aa5249a57ddf5a6b776be956ef6dbbdb5becd8244e9c10629210028190306102f3c030c0f0c2bc2c7979199810664870124292992c182780e37d8be3b5f7456ab5f67d57692955492595a492e677bc40b0dd6e2d55a592f4ede7e927e0aeaa7befe7de3a75cefffccfff4445f10701041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104020c204a223ec7c42763acb81a598959595d8e5e540ec722010bfbcb212f3daff2ec746454547c5c5c5cdc7c55b7c3131314bb1b1712b213b113e1801048226b0ed1bb0c5057fc2fcdc6cea8cd793e3f54ee78c8d8e54793dd339f3f3f3c9f373732981a895d8f8f8f825674aea606e6ede958c8cacd64447f2b0cd669f548336a7c66c3968da7c1002080455605b36604b8b0b16355c89336ab0da9a9beeeeede93e31353999af462b617e7ecea21ed752bc257e2e3a3a7a797139109f98983867b3d916a2d5fd8a8d8d8d723a53260a8b8a5f2c28287e252d3db3393ede32131b171f08aa3c1f8600021b16d8560d586071214e0d54cac8d040fdd5c6cbf7f6f7f5d68f8d8de669e818adde556b6171c9858cccacb6f48cccae2467ca487c5cfcbc7f71c11e1717bbb8b4b4649d9c182f1b1e1a38ecf14c17fb66677396979763aa6b6a7f90671ab2b48cd604ab7d66c3e27c000208044d605b346081a5a5d805ff5cf2406ff7b1f3674ffd627757e7a140607925253575480d5773764e6e43e59eea279d296983b171717ef5bc02ea51bd25ceb5b4b4f86a5c6c71d19f34ee1addddd27ce5debedede63fa9cf1dd7baaff715769c55336bbc3458c2c68cf1f1f84c08604b67c03a686cb363539b1ebc2f9331f6b6cb87c8fc7e34929282c6ca8af3ff8fd5d65152f24253b87e3e2e2fd1a062ead556a7ecee7181f1bd97df6f4cbff717cdc55515151f5645dfda16f295ed6cb9072ad9abc1e81e00b6cd9064c31ae58dfac37cb345c2d2dcd778dbb5c45b97979ad75fbeabfbfabb4fc856467ca6042826d7ea364ea95457ba7a78a2f9c3bfdc9e6a62befcfcdcb6fbce5f63bff28352db343013302fc1b05e6fd086c40206e03efddb4b79a99c5e1c1fe7da75f79f1975a5a9b6f494d4b1bbaf1c4c9afd6d6d5ff40c3c45e8b2561cdbdad6b5d8c7a6f66a8d9333d357effb47b3aa7bbbbf3e6332fbff8b9e3276efeef4acde88b21e562d39e030e8cc0966bc016e6e7ec7d3d9d37bcf4fc8f7eb3b5b5b56e6f6ddd33276fb9edaf7272f39be2e313fca1baa5ced48cc1c9f1b1cf279e7a69b2a5b9e91ee5912d9fbcf55d9fd7f14642754c3e170104de59604b3560fe799fa3b3bde58ee79e7deaf7a7a7a7d3f6d71f78e2d63beefa9394d4f41ef594423e9c4bcbc8ea99181fbddf35e12a6d6d6b79575a664687cee9ef343b39cb83860002e117d8323130d3f36abc7cfe232fbdf0e3df527a43d4818387bfa980fab7939253cccc62c81baf376e8d663ca307067a0e3fffdc33bfe7999e2e78cffbeefdcf79f945af582cd60dc7dbc27ffb3922025b5b604b3460a6e7d5ddd176db534f3cfaa74b8140ecedefbaf3f395bb6b1eb22458bd0aa4877dd98f1265e3babbda6f7ee2b187ff3427277bf8a693b7fd716676de25b2f6b7f697e19dce7e76c6a3951bbe64a5e0ac444745afe8477341cfdfac49cbd10c77d87e40b7aff0faae2ce287900bfe795be3c5731ffad1b34ffd8ef2e4576ebee5b6ff51b1bbfa61ab3dd1b3be4bdef8bbb4c468696e6ef6746dddbe07cf9c79f95359d939ef4b76a6f6e993c737fee97c42a40978dc93e98ffef09f7ea5ada5e5e6a42487df96609dd70f6994d269fa0f1d3bfea0cf37d364b73bbc9176de3be17c22ba015b5af05bae5eb9fcde271e7fe4f7944d9f70dbed777ca16a6fcdbf2899d4bdd937c7664b9c99764f7ebbadadf9ceb3674e7d34332ba7512917ffa2585cd0664037fb1a39fe6b029d1dedf5cf3ff7a3fb262726f6a9018b5a092c4769e54694d56a9d1d1c1ed8f3a1fb3ef65f0381a5067ae0e17f6262c27fc8d51d51a912f1dd9d6d279f7cfc913f5c5c5c4c3a70f0d00f6a15f37224a78cadee1342ff2a9bdd3eb9bffed03f98614563c3858f69989113faa37284700be4e4e6f6949695b5381c89012dfc8fb2dbed515a3f1ba575b3898343037ba7dd53d92b2b5111fb5d0ab757388f17b1e86e65d73ff5c463bf37393999555b5bf7f8b11b4e7ed19ee888a8219a02f7fedd7b6a1ececb2f38d7ddddb5bfafb7eb66c5c7e2c379033956e805b4a0bfbfbaa6ee99788b65c8ebf546cdcece46b9ddee289fe2088585c5a7d4fbee5639267adea1bf156f39424436605e8f3bfbece9973e353a3a52b17f7ffdd337dd7cdb5f24a7a4f59b18d82618bde3216df6c4f1bdd5b51a3ac62d7476b6dfadc5e46991768e9ccfc60412ac367ffda1a38fedd95bf74347524a4b4c6cfc585676dee5c3476ff8fa873efcd13f5609a6fe8d1d8177af5720e262604a9750aee88f7f5eeb1a3f54b26b57cba1a3c7bfaefcab76cdf64464399bb8384b606ad2753a2b2bbb7b7464b8d6e371170796165d5a2bc9ccd47a9fca087c9f7a5903a3c3437fded9defa94d7e3492f2ed9d554505cd26cb5d96614f78cc867330219837e4a11d5802daa8ed7c8605fede54b173ea6b852d4e123c7be915f58724ab37e0b41bff2207ea0dd9e38999191d9d6d878b9c6353a5c93999973591f1fb25501413c753e6a0d02d9b979bd4b8b8bfd9a503285e3028a8145dc88600d97b32d5e1a5143c879df6cfa8573673ea91843b652149e2829ad7846ddf788afc1a5d9277f5a7a468b1eee98d1d1e1bd8b4b0bf66df17470116f11888b8f5f562c4c65c769bc22e1f18898062cb0b4106b02f79ab2be2d292969a26effc16f596d8913918074bd735025d7a5d4b48c0ec5c1e64c691ffffc9cf37aefe1df114060e30211d380290521f7d285d3bf3ce3f3265755ef7d22232bfb8a7eed16377e89a1ff0493ffe374a6f65be2ed931e8f2fddef5f480afd5139020208444403a6c0bda3aba3f5aea1c181930adc5fddbdbbe6fb0a8c6ea905d271b1f1f39a6898531c2f7161c1efd0ee475b6299165f0104b6b2404434605eaf3bef4ae3e59f9bf7fbe30e1c3cfab5acecdc4b5bade2a9f60309e8efb2dfef4f999df1e69840ef567e30387704b682c0a67fc95412daded17af53dfd7d7d7b54bbfe6a7149d9b396049b6f2be0fde439c6c49afd2463b58060c1313b3393b5b26cf69be40f0208845260d31b30efb4bbe04a63c3cf6a857fa0a676dff7ac367b4465dbaf16df6cd1a6f571719a41b5cdcecea46b7e9d21e46af1781d02eb14d8d4066cd13f6f6f696efc806b6cacb0bca2f2544959e593aaaa1ad1395fd7768e5e510316abbd27e31616166cebbc1fbc0d0104d620b0690d98d60cc64c4f4f16b5365f7d5f5a7afae881c347bfaa0a0f5bb2f765bc35633a9f9e9ed19592923291e8481a538f924cfc353c88bc1481f5086c5a26be72a5d214fb7aefc4c478fec143477ea0aaa6a714b8dfb20b622df196d9eadabac7cc2edf0585c567941bc6f292f53c91bc078135086c4a03a6da49d143fddd950d972f7d2c31d1e15669e8af59ed8ea9359c77c4bd543db0801ae587b5b0b75389b8630ae8d3038bb8bbc4096d37814d69c0f4454f6db97ae503eea9a9cc43478efea323c9b92d56f36bd9936f7e6eeeaaf2c1b64402ee767b98b99e9d2710f618982a35c40ef6f51ceb686fbdc79e98e8dd5bb3ef3bf19684885fefb8da4743d509e654f46ecb0e85577b9dbc0e814810087b03a6de578aaa97fe9cd20dd2f756d73cab2dd13ab4148755fd91f034700e086c3181b036608a7dc58cbb46ab7ababb8e29d8edaddcbdf741f5be366d738e2d76af385d0410789340581b30a54e24b6b55c7def9ccf97a232cc8daae0d0b2d5960cf104218040e40884b50153a9e8bcbedeeedb53d3d2bc7babebbeaba0f7969e798c9cdbc89920b03305c2d680699160dc607fef6193f7959b97df985750fc7c5c7c02bb59efcce78eab46202802616bc0fcfeb9d4f68ed6bb63e262978b4a4a9f8c4f487007e50af8100410d8b102616bc0e6e67c69bed9d902c5beda8a8a77fd48338f733b569d0b470081a00884a5015b5a5a88ebebe93c3e3434549099997525c999d24bea4450ee1f1f82c08e16084b03b6e09f4fea50adfbc5a5c598c2a292e7557162db24aeeee8a7878b4760930542de8029f33e7a627cac7cdc3556575c5cd2f9eaa26dd590dfe4ebe6f00820b00d0442df8005962ceded2d777867bc99f9f9054d968404ef3670e312104020020442de8069930bc7d0e0e0b1d898d8e59cdcbc73b131716cf81a01379e5340603b0884bc01f3f96633dc6e77617a7a66bf868faf44fa2edbdbe1a6720d08ec14819036604a5eb57677759c9c76bb334acbca9fb3db1da33b0596eb440081d00b84b41e986ac45b27c65d7b545e26da9992d217131bbb45ebdd87fe4670849d2710080462b4f3cb1b9bbf2cebfb1192aa2c5a839cb01458b22e0702167330b393bc26d2fcfa3baf636ee909b5903660cabe4f76b9c66a535253c7b5d763a3e26014fadb79df53aef87501538d458d9665617e3ed9ebf51674b6b71644ad04e2cd767c367be2987b727cd866b34fa8baaf4f450e36d4b02c2d2dc62f2d2edab4e37d7e5b6b53fdd8e8c83e6db89c14a3bd1a12b40a263b37efbcd97f55ffee5107633626366e419b496fe8989b71a343da8029f33e636a723a57e9138d4e676ab790b61cd066dc148eb97d04d46045abe76355e3913c3c3850d1dbd3754b5f6fdf4d6363a3bb7cb3bea4c5059f26e61396555eca9792923a98919979597b2abce81a1dba644f748c242458bd8a1baffa875f8d64dcbc2a1e77b4b79ce86a6f7ff7c040fffe99196ffafcbc3f5e9b2dabbd5c8a0d049663ed36dbc79d29a9c37985f9e7d5c1e8cacecebd32ee1ae952033a6951815195b9da12936d216bc0cce2edd6e6a63295ce71646767375812acd3dbe7b1e44a10786701d3db5af0fb93c64687cb8787068ef5f5f6be6b6478a4c2e7f325c6c5c5cda8a1185183d56e898fd1ee82f3c91eaf27b3bbbbabb4b5b5a5c262397d4f4646c6707a46667745e5ee47478707cea9f067b729597eada3ea78b1ea71d95da32395172f9efba59696e6db663c5e5b41416163d5eebd3fcecece698a8fb7f8545034697272a268746464eff8b86bd7c50be7ef52231b6fb55967d3d3d20773f3f21ab5d4efd4e8c840a362d62ef31ef508fdea9d456495e19035608a7fd94647876b551f7e393d33b3393626664bb4e87c3111d8a8c0c2c2bcdd14ee6cb874f117fb7a7b8e7b3c9e2c0d13e77272f31b8e1c3df698aab19cb7d9ed13fa6f1ab6c5fa971697ac3e6d86ecd126cf93e3aeca9191e1fdc34383d56dcdcd37343534dc545858d85fb7ffc0f7265d238f2625a70ce83b35a7d1ccabf1320d15b50fa9dfa14a2fb557af5ef9e9f6b6b65b947399a486abe1c4895b7e50565ea1c9b3c4090d49fdd1d151a61316b3bc1c50abe9b76b03e68c8181defd830303fb868707f74e4c4e16f60ff4df73fefcb9f73b1c0e8fc391e4d2e75c2e2c2a3e3f34d8dbaa6d0f27d55bf4a833e25583b6ea5ee1463ddfe9fd21db3dda333d95f3f0bffce02b1aeb67dffbc19ff995ecdcfccba1bc103e1b81cd1650cea36576c69bdfddd5fe531d6dedf7689858a2c9ab9e9c9cbcf3a565154f666665359b219a7a34d7eccd68e54acce2e262a2c73d55a046e9d0a50be73f3c3931be3b2a6ac5a2c6a4797775cd3fe4e6159c53cf6846bd2ecbe884ab4acbf46eefe9ec3ca986322d2d2dbd4bdbfb3db46f5ffd834949cee1773a96f1323b84a9e7669d9b9f734e4f4de6f5f7f7ee371593d53b2b55018654bd245eb1eb18b37f85d3e91ccbccca6e2f2faf7a32afa0f0b47a689b3eaa0a590f4cbbf3a44d4c4c14aa2bdca79be6daec878be347ae80998dd317d4a4f4ac68666c4beea7b9e09f734c8c8feebd70eef46f7576761e7426a7f61d3e7aec7f9696963fa98d8e4714a45fd50a94d783f7e6b5cd9a3d6c2bada87ada6c8273e1dc994fb4b6b61e6a6ebe5a9f9a9a36959c9c3ca6ded04cf7f050b98684a9b604dbd4fefdf5df3f71f2d6bf4d4d4bef531c6b55b5f65e2faa602ac398bf23ead15d3e70f0e883ea9da5fb7c33a94a812a50dcee86f1f1f15235ac96d191e1b295e5953b93939d037afdf66cc0024b4bb19d6d4d95cb4bf3ce5467d258823561d32f3472bfbe3befccf47cc40496039665f520b4b94b767f5f77a1e2402936bb6d626ad2d56fb5d9c74d0f632bcc8a2954a2a0b92fa3bdadf5ce2b8d8d9f9cf64c6757edae79b8fec0c12f2b48deb3da86e4ed9e0205ef4d633eac86eca1dc82e2734d572ebff7dcd9333fdd3f30b0373030906eb3d9e6939292878f1fb9e187870e1ffd6e764e6eeb6a1bca6b3d753237c734fb5498bfddfa7b413db16714d376e8ff8e5e5e59895d595e8e55a72422aa2987a407b6b21288d378be78797925d6999ad665c6fa3bef6b7aed2b560c42a938a1c9f9895467355a714b81c5043554ce81819eb2bebeee9b4c8a8d77da5ba0e14bbafedd6a46348a0d8de7e4e45e52e0f99fbddee94be68b1229f19637dbaaca4ae2e484abe26a53e3c7bababaee302910478e1cfbcb5da5658f297e34a4585550f2ba5e6fc8fa15ebfa6a75edfe7f566e6589be5fb98a6745e715145c311b295b6d896e4d0e04e5786fbe4e5dd7acfe9bf91b717f42d280694890303ded2e51c3b5a4317373744c6c44ce6084f36e98fd30fd0bf34ecd02a569a861f74c4fbaf56be98a8d8d9f8f898909c98317ceebbbd6b1f4a5b39a69fdaeced6033dbddd27c65daebd26b6b21215d0e311e74f4c4c1acdcacebe64b5da26356cc99e9e9e2e1a1c1c38a018cc1ec573daf756d73e30e3f55c7e2de81d396938ba8fc9fd7d3db79c3d73e6d74dbc284375ee8e1e3bfe85fcfcc253ca8bb8e66ce146ee897a73e67b34fc6aaf6c6949f1eb952835eedbf6d9598d55481a300533ed6ef754a9c6e8be648a1746c923616a72bca4a5b9e14303037db7cfcfcfa7e6695f80da7d07be929e917b315cbf6e66aa5dbdbf78c539124c42a5e6a4a2a2a36396f5cbed57ec653e5853e50a0a5bcccc98d6c166365cbe70f3c8f0e011cdaced5d5858b068c83362e24225a5a53f4e4e4ee94fb02428cf297e2e265aa3ca95e557530ff4ec947475b6dda1b482db9f7ae2d1ffbfa2b2eac97dfb0f7e53c3985ee5276d7a25dff9b9d9d4ae8ed6f75dbe74f157c7c6c7732a2a2a1f3f74f8d85f29f6d421cbb0fc5887aab7b59a4623925e1392066cdee74b53f02f5fdd68b77e592362acbc59e8669a7b70a0e7c073cf3ef9bbbdbdddc7f5b369b1db6d6a47967234ad9d70e0d08d7facd7b4867298a42f7ec2dcbc2f6da0bfbb6c686860bf6ab355aab793b9bcbcacc4ece88082c27d2525a52f4dbb27cedb1393c6147f5af397d004e2350cb498e3a8f139d4dddd79876b6cac46b3d0e9995999edf5f587fe5e335767f44c0c9b44c9571bcdb70fd8fbf459639999d9cd15957b1e514ed32f2b19f34605aaebca2baafe593b5b3da2d9af310dcfd67c8ec17806e6e77c29dd9dedefbd70fedce7746dcee3c76ff842d5eeea071d4949433b2d2c100ccf8d7e46d01b30958f8eedefee2854f66fa66219a7cdb2888d9ee4567ebf594ef5e2f3cf7ef685e79fbb333333d373e8d0e16794577361da3d75606868f0485a77c7dd7babf70de91a27837d9d665a7f4ed5403a3a9a8f35375fb977647868b77a41f1faf2fb62a2a3350a598a33c3d7c181beda96e6a6bb745e4df5f587bfe9f379cf2624d8a6af37643359e6ead55935e39ca245fb351afa1d54e2e6418f67ba305a4bfc9234535553b7ffef35fd7f4ab356fdca1f5a55ef49634b332c3241e48b4a4bf883c1c1bee3972f5df8f4d933a77e5dd7705cbdb1fbd52837aa3716d667cbf4bcdadb9a3f78eecce9df5042d5ca818387feb6a676ffb7140ad8d13fd2c17e6ed7f279416fc09603cb716608e0f7fb2dced4d49e9dbc7987998d1d1cec29efede9399a929ae6b9f5b63bbf527fe0f0f734adee52f0b76ecce5fae2c8c8d00da5e5553f086603a659ab380ddfb2fafbba6a2f5d3aff493528d96a14668bd5cb2a2c2c7e392323ab4d719a57cb7a6bc8e670b9462bbbbb3b6ed39677bb5f79e5f9df2c2a2a79a9b4acf209afd7dd6d1a323572a6b7f35aac656525c6cc442d2efa13c75dc3f9bd3d7dc78706078e8e8d8dedd6cc625c5a5aea8002f00fe8335e713a53fa12131d2efd88ad7b124756139abe7f5231a6e6ab571a7e4e3dbbf79e7ae5853fa9db77e06fe6e6669f37c9956b79e0d7fb5adfac37b3bdb5f9fd9a05fc7533143e72f4f85feda9aefd8e664c99615f2f6a10de17fc066c6539deef9f4fd1e3beac7847afbad5eb7e7883707d9bfa11ea8ddaba3ada6ed778d17eecd80d4f1f3d7ee2cb0a5a8f69d816ad8cea4e67b2b3570d7df2e2c28299a20eca1f05cc93c7c7c72aaf365dfe787f7fff6193835753bdefbb25bbca7ee470249bc4c6b937c7ba34846d2aafd8f3cce8c8506dd395860fb7b6b4ded9dbdd73322d3dbd53499817d4888cc6c5c6fab5a781d5c4a8ccf05333887b464747cbbd5e5f5a82c532ab6295cd9555558f1714169d49d4c264cd9ccdabd10ccada572d3636cf50a77a935f34c1f2e6ab8d9f3c7ff6d46fabf13fa400ffdf68898dd22e4297193ee79b496f696ebcefdc99339f5b5a0aac2865e14b557baa1fa0f10aca23bba10f097e03a675559ae6add1a2d4690535dbb7caa2d00d295ee3cd6ef76489a6d83facc5ecfdb575f50f9af8d21b0b73f5a59856afac453b351d560367d9e8f1cd70518987b9cd4d97dfd7d6d6f241b360779782e57bf6d4fc8319bee94b7ecd8d545e6fd026351c7c212727bf414bc06aae3635fcb402ef35dddddd8714943741ff38e57e04343133eb48744c38921c2ed3cb4a4bcb6ccb2f28bca005c17dfa37b3c42464b1290dd5dc9a1c785833db0d571a2e7ea6adb5f9035ecf4cfe818387bfa0736c56e31cf4e52d0a012429607ff785f367ff83df6f7a5ec7fe5ac3e2ffad73094bcf6fa3cfc5767f7ff01bb095650d2f1693ad56ab4fddfbb1ed0e78adebd310cb72a5e1fc3105ca9d8a053ea3757017141cffd72fd8ab29040ec790ea312d6a2670435f7a7da9edeea9890acdf87d5a71b5c3eaa534d5d4ecfbba16035fb12a437bb575a65e8f794d2936f692297fa480759a7a5a95664f4fb3e038362e76d1cc22aab288191a2ad81fef5383351f6f597db5848d3e0f9a00306b6adba7a7a7be204faf163f7ff085e767fefba14347ff5c8df80bfa6f41ebf16b4d63e2c8d0c0f1c6868bbfaa9eb25531afafecadd9f76d1aaf8ddec5e0bd3fe80d58602990b0e05f48b4582c73a6ee50f04e756b7d92865ac95ac8fbeea4e424efaeb28ac7df5c8d56a348d565b24ec7c5c6a9018b5ed750cb543c50e392d1d7db758302449fd05ab8ecd2d28a1f2a36f36df5bafad63bb3a91942733ee6de99bf5d6ad06257f4c3a4c0fc4a744cf472242cf751233aa000ffdfe85c7c57af367deccce997ffeb8d965b7e578dd8c5603462fa014ad082ecbab3675ef96d3393aa7cb47fd482eaaf3b9292a92a1c415fc5a0376026b86b1215b588d5bd932bb02a1695313b335b54a0252059d9f9e7df92bfa4ca008b8b4b7653cceef520f99a1e0b53aedb0c519b1a1b7e41a91127146c9f387ce4863fd34ca202dbf6a0fe70a84133cb4b226e8da2990cd1b3767f527272bf2a3ffc9a1ab1ffb66fff812fcafe45a5efac7bef5193fa323e365c6fe26cc3c3c3655a16f48d7dfb0fddef48728eace926f1e2900b04b526be995657bda34cfd4dd30af6a5f5f62c427ed5213e805936a359c042658f0714877a4a5fa689b71e323a4ac1fb14135732c9a46b39250d1913c7c6468e9c3bf3f21f9a21545656ceb99b4edcf23bda77e0b160375e6b39afcd78adae775a33a60f2b0ef6974a10769c3ef5d21f7475b6bf4fc3dfe4f59e8fd733557ae1fce9dfeaeaec3c5a5e5ef17475cdfe6fd278ad5733b4ef0b6a0fcc0c33148b29d71738510bb8bd1b8ded84f6d243f7e9ca28b7a8be53a96a2af915a8ef3271aeb7399a296514a774a27825b4aefa8fd9e57c6c74e85853e3e55f9b724f155557d77c6f6f4dddd795d5ae19dfedbb24e99d80f403e1d5ccf7e3a6c7af06ecf7f4f777cdda4a35620f6aa6d0e493adfa8f72e0d22f9c7de55734fcbf41f7aefdf0d11bff42c3465379813f112810d4064ca573139403b64b719268d522ea53c2e4aa4a7a44a0cb864e49abf5d503f39528f5401b292c272a772af62d1fa87c2a05bfe7f46ff1ffb6afc3b50f6b6a9c6b6894d9dbd379735757c74734e3367be8f0f13fce2f287aced498dad0096f83372b9ee853cff419a5edf84fbdf2e2ef2bf1f5b3662993d22cbeb1dab89582f6d6cef696bb348bfb7e2d811b3872eca6bf504589ee50ceac6e03fa4dbd84a03660a6448aeae0e79afc1fc52594c41abb63abb06af6d112585e369b2a5425a7a45ed25dfe77abf9559d3c46b1a5452585aab9bf76105fc3f258c5bb925ca3c37bbbbadade3f38387852f95c83b575b5ff2b332be7bc02d63bf247e2edbe359aa19c5323f6c20d3127fedf33a75ff92fe7ce9df98c664e17142bfc27cd9ef65d6f65812946d87cb5e1e31a8ac62ae1f81b45c5a5cfaaf10adaace6a67ed3b7e9c183da80452b575b29148e68a50824a7a47568ffa635c576b68bb1e9052857e9c70aaedf31ed71d73b67d3cf6a48d3f4ef7ba4d12a07bce4888b8a8d56b96db575cb0a87fddb1050bd5955e65c704c8c8d5476b4b5dcdbdede768f32c0ad5a0ff870cdbefddf508e9d593fc997eb4d0f8da9bf25b7174fda6c93674fbff8fb0d97cf7d667e6e26af6effa1ffa57bd06f4a9cbfdd73a69a5ec917cf9ff9707fff70a582f67fbfa77affb7f55911594266bb7c4f82711d416dc014fb8935b5f0f5c59ad31067e6d57a1f3bf08fd9044125b52f6564649e52a9955ad545fbc5925de55f53fcaa5b551fbcea72ada8b44e8232da0b15ffb22a989fbcf25a32ebab3d567dd1e295949ae51a193e78e1dcd9cf29a174b7d6118ed7edabbf7f6fedbeef9a0a9f3b35deb59ac7c9a45168c8dd78ec86937ff8d28b3ffa7c4747dbfbd5cb0dd41f38f63ff4feb7e4269a923f2a8d73a3d978635769e90b4a99f8aee26a2c115a0df626bf26b80d98b2f0cde6999604cbac451535b56466473660e69e2aeb7ea0b26aef5f2bb9f4ff19e8ef3ba97586e55a96f3485e7ed153aa2f3ea20073b686dbd9eab1da34f1b1473396c3aa31356b82cf83fd3dfb5aae36fdacd61756eb8bb7a0ccefaf55eedef3505a7a46bb32ea57559a78939fab4d3fbca92caa3cb99663c74ffeb7975f7aee4fd488bd4755373ab402e29f6d76c7f81b276866ceb52e55b38e673f67361d3b7ce4f817d4bbeddcf40be004562510d4064cbf7a56ed006cd3af97c7049957139c5ed5596ec117996450b3bc4553f09f5779998ff6f474fe547757e7efa4a767fc4c5e7ec1f3b3b3defc81c1fe6aefe474aa66223f31d0d7776451e917a6a0dfd4d464a1e9c51614153da7e4c96f9aaa0e0ad4d370adf1393009b76ac42e1f3d76d31f9d39f5e21f5cba78eed7cc0f86868bdfb25a5f5b84add9e21cfdc8fcb27aca45478fddf0052d746f79bd4efc1a8fc6cb374320b80d981e0eb34554b233715c5fc0b0963ad90cbceb1d538db849febcacde569f96f59cbe7ce9fcafba5cae522547fed2ac6fc6e999f6d826c727a38647c76e517588635a9ae3d702eafeb2b28a27b4b3cc03a6c7a5866b4d6900d73ba79df6ef26706fb2f30f1c3af6e7afbcf8dc9f363735fe7c7a46d615ad713ca72ab9b696e6abf76aa38cf7e5e7179caeacdcf39066869914d9420f49501b30e5e224fb9564a92f6eaf9981244ef3da93a05c24ad2f5c7c48b38667559df498cab27cb8a3b3fd3619c56bc9cf6c764e4e5756764e675171c94b6abc9e494e49e9d35e7ec46082f445323131cde49e362b152e5d38fb1b972e9cf94f2afdfc63c53a3c972e9effb47ac08b353575dfd5307ec7a7a304893c6c1f13b4064c5fd0989e8ed674535f4ab36a4b6abc825e19206c2a2138d0ebb944fdea0da8067c4ea37642f68f8e8ed41417957ebf72f7de1f689a7f48bffe3e7dd9766cea4908d8fff523b5946b5e9328cf9a72e7172f9cf90de58afd675345767e21b0ac6ab15f553edd2beaad6d68517d28cf9fcf7e7b81a035604ac88c3675d0350ba9cc72d378ad6f81f276bf51a637a0188c2b37b7a0417118dffefd87be65773806226181f476b7d74cae6f66c6f3ccc8f0704d4f77cf67552f2d4dd5252eeed95bf34f9a1ca1aaea167c0082b816323aca6c81a58426fdafcda58ac23b7606f27acf81b2f3ad0a2e679acd4915fb32a59b236ea1f4f5ae61abfebb928027ccfa54fd90b814d08fd23d1834658182557c71abba6cd5f30e6203a6496865956bf9cca229a3a35d661842becd53611256b524285b659ecbd5e06befc0f855d589dfaa0f58a49db70975e8af4de715a71fda286d165265fe9a0a149176ae9ccff50582d68099c6cb6cd5a52cf465b391c74ead44713d72f5bc6ca32383b7688d5eb6d6e8b52a564836fdf5d082f8ef0ae627f7f674df6aaaa6d8edf665ffbc3f53955d3fa21f9492201e868f0a9340301bb068f52eb435b0a979f7139b4084e942b6ca61b4e146924ae11c5f5200d96ab38d32531bbe3b673659518e5dd540ffc0cd490ea74f556b4f95969636a800419dd22b7e55f1b1bcf09d0d470a8640d0bacdea71ad6859ccb2897ca937b6860231c1b88cadf3192ac09733e3f51669f838aa697ca6edc378eb340399d4dfdb7bab966e6554d7d43eb4ffc0a1fb15ab8d56e58adfd49e9def5111ce41a5027d5d952ddc613c2d0eb50181a0f5c0cc3968f868e25eaa26f35a4f6c03e7b52ddfaa388b657ada5da98cfb44ad93bca4068c5caf30de69afd753d4d3ddf51ee57bb9f754d73ca07a5fada969194db575fbff679236a6d5de961f99708d1d312b4ac2785a1c6a0302416bc04ccccbfc558c274e5983761313dbc0796dcbb72a46689b9a9c386476a5d6a6192faa1e3e59df61bad3ca014becebe9ba53c3c5c2dcbcfc97d3d233af9858ad2947a4fffbb236a8fdebc585c5849696a6cfa8ac4e89996c09d3a971980d0804ad9131c346a550c4aa7711af2e7a120dd85befcab202f8dab1bcdc64806b579f7e5510257d62030fef5ade3aa73d0ab401ef6d66ebb7f28aca7fd1ea88718d185e4df5d1fdf069a1fd0bc94e67537f5fef41ed547e97869bceb57c3eafdd1c81a035602606a6ea13cbafd7b68a373b386fce2545e651b5f7a3f60b98cdf7cdcde46ba7a27eedda44e264986e951a23ebf0e0c009efacb7b07277e523da76ae41795fffeec743f9786e25b47e392333bdabe9cae5cf0ef4f7dcada4ec0defd719a64bdcb187096a23a320be02f9d1ea7cad985aef6f2da3bc639955e32b10b04e4f4feed5fe82a95a36d4a6a545ebde35670733aeebd2cd4ef12a2e79ab7e347c5a32f4bc9615bd6581bc4926d6e2f9466d10f2bf4d46635f6ff707e7e666b3d77540de143681203760afc6c15654d8309e06ecdfdfc3a5a50587d2276e36731c0a1e5fd0178604d6303ce6a624b77b7272cfc4f8786d5a5a7a937612bf72adfd32b511f3545151e9235ae8fd8c6265a58303fd779a5dc9c3709a1c629d02c16cc056f4a55c505c6749a91426b84010f4276e8aeaac67eb4b51ad2fc990363c6927feb5ce27768d6fd3a49275746cf82605e5e30b0a8b9f54eccbf54e1fa1dc3c970a517ec5e974760ff4f77ed037375bb0c643f2f2300a04af0153cf4b333a9ad589f76b7b3562603f7113cdb4bcc73355a54a1d492a687856051fdf52d6388cf77c471d4ab38fe9eea9a9fd29a9a93dd939b9a7f58cbe63cfd7d40f4b494d6faeda5df325f5de127a7bba3ea2a55f693b0a6d0b5d6cd01a3075cb57cc0c8ffe775e35e02d0c21ffed29300994a3234337ebcb6166bb9e93119b4584e14b62f2ee5469f5a07abff97979f92faaf7bbaa1f0e935a919e9e79212b2bfb946625ef56c9ef03fa2c869261b8676b3d44d01a307360e5d5cc29c769c1fc72a91716b42cffb55e5424bdded49cd2129512976becb08627434e67da55ea4e85e70e691631716c74f876b35c2b2333fb829ecd55c71d35d4741716953c6836035129f04fa9f47419b961e1b96f6b394a701b302568c6ab01334348f5c2b4612b7f969797ac5393e3b59e69778e960ff568068cf489303c1666b30e2ddc4ef77abd155ab43d9ce870f49942036b39b472f5fa3233b3ce4d4e8ed78f8e0edfa912d48eb5bc9fd7865e20a80d980a192e9bdda6f5c71913134d754bdd3f7d899c7d7dddef595c5c8acacaca31d9f7abee0584fef66fdf23981fd19191a1135abcbd2b3b3be7596bc2dae38efab1992e2ad9f50fa6ec916624dfaf24e40a93cfb77dd5b6de9505b5015372e08216c29a1c1b95d659def13103b3ac4a7b3f166b0d5eb952273ab5e3cd256dac4ac31e86ef89d9decf333d5dad78d68c3325ad51cfe69a3799d19033909ce46c532fecc75a849fe51a1bbd5d9bd690a11f86fbb7da4304b50153ac61c99e6877991898095ceff45f2bb31c6568c8e4122d590b0b8b9ed65e91c3abbd31bc6e63025a8feb54da4a8d43e5ba357cd486c2ebab7aab6546eedcbc828735bbee568fee1e25b7162b1616d4efcdc6ae7467bf3ba837225a0d9823d1316c726ee6e7e63277f24ca47a5fb1b30adef7f5f5dca3c285fd8545bb1e63abb9f07cd94cdd2fafc753eef1780a9d29a94da6115aef9195afb7a258586f4a4a6aa3a966a18d586ed38c24b1b0f58206f97dc16dc0a26302fab2f6a90716e7f54e97aaaece8e9d8954ef2b7970b0efddfa1265e5e6e63f9d9494d24df1c2203fbdd7f83813fff27aa62bb424244a797717365af543c3508faa873caed2617363a323b7fae7e733c373251ce57a02416dc04c1d7ced22dda7076859c1d3bd260bfa7a27b01dfffdf5d4895d8383fd77690833a8e9f847f4256067ed30ddec57d79d7adcb5f6c4c451a733a555e93d1b2adbadf7cfeb739a349bd9ab7a6e65fabbdbf4f2c274391ce61d0482da8029ceb0aceef6b01a32ffb47baa726161679624d1cc638aaa19dca307bdb0a0a0f831952fa6f715a6afa182f7d1be395feeb8cb5567b3db864dd9ee601c5a93532e7ba2a34335f453c65d63b72e2e2da604e373f98c8d0904b50133a7a278c38c1a329fca26e7fae7e7b2765a205fbdce9899594ff1f0f0e0adca3bf2aafac193fa0527f37e63cfe9aadf6d7afdaed19123131313c59678cb687c5c7c507abe66a779ed623464e2bbcae9ab3765a9577d52bc306402416fc034f53c9f9b9b7369da3395e6f1b89537b3b3e26026f6d5dadafad1d1b189d25da5950fa4a6665c7da3705ec8ee221ffcaf02da2cc56a4ae728592ba0ea13176262e382b2d3b926a816b58675303636daeff3cd146b36b240cf36c3c84d7ef642d080c5cfa5a5655cd52f5f6076d65bb9b21cd83145e1b474254e53f77bf4057a97aa19f41417973e64f29036f91eefa8c39b19c2d9d9d902adcb9d4a4e49697b73e1c2f56228493b9060b58ea968a74fa111bb36c5a5eaf07a3183f8bea037609a765e48cfc86a5200d5a399a0bdbad13b26f14f85f332bbba3a3eaac5c3c9bb76953da0a9f776661e83f8b45ee7a3cce4c99ccf97a3bf1949c9c9bd498ee4be601d5d0da18a1558c735a3e9d6331d6df21c55db8dacfc6001aff37382de809972240a760e2726268e6926b254dded0213175ae7f96d99b72d2cf813c7c7478f8e8c0cdfaa2a060dea7d3dae7820cb86c278074d01016d50bb4b3d2465f324776b595b50e25f6f5c82e9d5e933ddfaff03a6ecf08a8aa887f1f238d4db0884a461d1b06956b3913d931313599313ae439a72ded6e914266955498e156d6dad9fd122f698f2f28a6f3b1c49033c71e11530cb87dc5393d54b81a5044762d280591912cc33d0e4d47c5c5cecbc266566f48c4fabf55ad3e2f0609e0b9ff59a40a81ab0190d235fd1502a4ae54c8e2d2efab7f530d20c93b560fbc3aa3d559d9b9bf7747676ee4b5a7ac2966961fe96a9e1b2badd137b14685742b563500d5850777d52626c6c60299060898ff7da4c514ab3910d7f365520240d585cbcc59f975ff4bcaa60f64f4e4e54a8a265eea65e65080f6e76aed1aa83cac1c181bbd5ebeaadacdcfd772a9c1794dca3109ef6b6fc6855bc4dd1ca877ca54fcc68043064aaa304f34215e34c9b999dc93649c916ab75dcec831acccfe7b3d62e109206cc9c86e26023da40f4a5d99999746d145ab65d773bd6747a6e7f7fef075442c85e5050f843656cb72be0cb83bdf6677143ef3009acaa1891a1007eaa7abf330ab84faa0716b4fb602608b42d5eaecfe74bd150725ac17c5f303f7f4317bf83df1cb206cc6c1b565555fd1dcd4a2e6a7384fb66555266bb39cfcffb5295b0faae9e9eeef76ae8f8a3f2f2aaff633649dd6ed7b915ae473b6169f1bcd76cc06151f6fdb82693823a843713044ace2e50b8c0a609aa1e3562242747c08311ca066cd966778c685835a83a4ab51eafbb565b8b6d9b60be661d6dde6977757777e727cd35aaf1fa86dd9e48b99c4d7aa8d5c0c46ad3e0ec79bf2f393636662e26366643eb1fdf7c1966b779fd589d88d1e6a7dad7b3c5acfbdda44be5b03f2110b206cc1cc392609dd642e647e7fdf3b1e36323776915ffb6d82854c361fd1a7b2a3b3a5a3fab8d6a93caca2afe4ec9bb66b7e7a00d59784ad726604a37698897a3358a7126e154f722683d30530b5fe919a5dad7a05ebdbb4915a7bcaaccfca036906bbb5a5efd8640681b30e54195ecaaf8be4a9a346b53d7c3eea9f1e3ea856df94aadf373bebcce8e965f19191939585252f61d95cb79d6ecfacc63b57902668650f95fc95acab6989c9cd211cc21a46ae15bc75d230714ffca484d4d6b329335c1caf0df3cb1ed71e490366086c866b78f96ec2aff8ecafbda06077a3fae2fff2ee54d6dd9044013f7eaea6affa8e25e3f959cecbc5a5c5cf280868eefb859eaf6785422fb2a4c0c4c6718affcaf29ad80e850803d683d242d892be8e868bb4f8de44a4161d1930956db78646bec9cb30b7903161f9fb0909d93ffbcdd91d4a72cf5eaa1819e5f98f3cd166f4562936d3f323c78b2a5b9e9e39a851a2f2bafbc3f3131a9772b5ecb763c67f582fd898ec4290d21ddea810525074ca9130efd60dd3b30d05fa7b4a0b6bcbc82e799a8899ca727e40dd8abbd306de75e59b9e77ecde02cf6f676df33e11a79cf827f2e397218ae7f26dae139d1353a7cc3d5a686ffa45ff7c5eada7d7f99939bff92d9f8e1faefe615a116303959aa16e151118195a895e024689b58e7e4c4d8be8eb6d68f6a19d17c4dedbefb1d8ee4fe505f0b9fbf7a81b034604a6c5dc82f287e2a2525edac8afc254f4ebaee98764f1ed603b225f68e5c5a5cb04c4d4dd45ebc78ee77b44d7d415959e5f754a8f069f385593d35af0ca580660503ea8179b53a3141cf95537f37f46c9b7d25b5996dfe95c6cb9f9d9c9ccc2b2d2d7fb4a8a8e469ad8524d619ca1bb9c6cfded04d5ecbb1b4238f6bffc1237f949c92dad0ddd3b5bf7fa0fb53b3b39ecab57cc666bcd6ac7354767765c3e58bff65dc355e59585cfa486959c5f794a84b1c64336ec8b58ea91e98253e61d26ab1ce2ae5215589adb68d9c9e6fd65bd8d6daf4e9c181be13959555cfd41f38fc05c5be2636f299bc37f802616bc0cca96b638b1e25b7fe8dd56a9d5059de23c343fd3f37a700e9728406f5f52bfceaee36cd571b7f6d7878f8505171c9737bab6bbfec487206ad4c4bf06fe9cefc44b3705ba914cb9e694f9e525bb234a45cf744d1cc8c27b7bbabed1383fd7df7aa2cd2a9bdd5755fd23def62e631f29eadb036600a7ece6767e7bf52545cfa5d2dbd89521ed5cff4f7767e5a257776451a8d2a68c4695bb4b2d696a6cf0d0f0f9dd032a1e71503f9a299e122df2bd2eed6abe7b3a26aacd1536eb7434b8a4cbee1ba1a3065f3e7b4b75efd6c7757e747b5255b47edbe039f5761820b5aff1894caae1129b7854f2aecdb9e596df6298f67ea1f557ea6b8a7bbf3fd9dedadf7c96f593db1afd812930623c152c3c678252e56b5b7367f56b34fb7e6e7173c5b5eb9fbcb69a9e9cd9add0a6a899648b8deed700edaf26c45017c8f625f2bea35e79bcd95755d6baa07a61fd2ccaef6d68f7776b4fdac7ea8baf7d6ecfbff92929cadf12c0f8bd84724ec0d9891d04c4edf9ebdfbfe4a951cac1323c377f77677dca7ca016ac3dcdfb3da1d4a128cdbb432254b8b8b09dab461775b6bf3af2bede348764eee4b15957bfe36352dbd899e57c43ec75166e7edb1d1a14ecd0abbc7c646eb94bb651ab1095349f57a676d7adb1a3616b7365ff9f9aecef6fbccd2b0ea9a7d7fa6d5159734014551caeb016ee2bf6f4a036636b9d0c3d55d5b77f0cfae04ce5a945b756b63e3c55f9e99f5669795effe92329fbb6255533fdc2e4a9570b85ca307952af1db6eb7bb322f2fffd9aadd7bbfe84c496ba1f10af7dd58fbf1cc5a540dfb5a0707fa4ff4f674bd5b397a3dfa94e96b7d921aaef879ff5ce6f0f040ad868d9f1a1d19a94f4d4f6fafababffb38cac9cd3345e6bbf07e17ec7a63460e6224d83a099a29eea7d073f1f131fe7eee9eabcb7b5f5ea4ffb952c5a5ebefb6bda5bf14ab8baeea6148ba9f5a48d684f365d69fcad99196f567979e503a565e5df49d1b091baf6e17e2cd7773cabd53e595b5b7fbf6f6626473da97b957f38a89ed8a38abd4e2b86b5ace165b4f65cb604960356d50e4b1f1d1ddcd5d9d1fe0bd3d353558af92f55eedef3bde292d2079dceb466b399edface82778553605d81ce609ea05ab11875df0b9a9b2e7fa2a3ade523aaaae950cfa7adb2aafa4b9959b92f6beada15acaceab73b6f6dce90a0e54dd9aae975e795c686ffa8f56eceddbbf77c778f661b15ffe8a7f10ae6dd0efd67e98728b1b7a7f3b6864b17fe83d9644599f317140678d90c0b17b4e59dd7e3aed2ce51d52625467b36a4a5a6a67a55b7ee8cc2047fef74a6b65a54f79e6df0427f9f8275844d6fc0deb810bf32f35d6323fb1b2f9fffdcd4e4c441ada19ccdc8ccba505656f5cd94b4f4868484576b3c5d379eb11a18d3e3321ba0ea5738d5353eb6bfbbabe34303fdfd27f54b3d595357f7252dd07e2cd1914455d5d56046e06bd47b4f70bb27cb3ada5b3fd0dfdf779beeb7d504f5353be9d482ef046b42823f2333b3d7346cbb4a2b7ea81d407a4d0144266822f0665ee79422a60133e7a9007abcea86157577b67eb0a7a7f33e2d00cf535c63aaa0a0e8f9d2f2aa6f2b93bf598d8c7bbdf131b34bb8e21e36a570642aee76acbfb7e7ddddbd3db7a8c653744e6eeef9aaddd55fd5aff1691dd3bdf56e2567fc660195324f545a44ae1a2da76618f3b406374b75ec0329ced4ae64674ab729f764ca43af26d08f6e640a445403f606911e3ca76b6cb8bea5b9f1639ad2be53b3957695e41953ddad479543f6907e317bf4e079d490f9b4846449555fafd933334b424c354d4d0c24fa667db9da64e4504f4fd77bd5e33a3633339390999ddd5a59b5fbfba5a5158f243b9dbdaa244b9a44643eab1b3a2bf5b8e34cc91d931d66d6b26a9848edb60d8946c69b23b201333466098f6253e99a213ad8dadc74dfc8c8d08db13131166752f28423296950359fdad2d2332e262627f799eebfa6cfe7940b14306555ccd666e633f4ff2ffbe6667334544c53ea7f7d5f6fdfbb8686062b555522460d624fc9aeb2476aeaf6ff1fc5474654c18012c191f14c721608ac5a20621bb037aee0f5862c6d6c6c78fff040ff8dea41dda86548bb352c8857c33597906099d502db592531ce9aad4655f0428b7997ac664bad98d8f87955e9cc542f2d56ffddbeb814585163d5bfabb4ec31cd383da461449f8de1e2aa1f165e8840a409447c03f66f0d99895f2dda15c7c8181aec3b363632543f3b3b93abea10a56acc124ddda6f9b939fdaf5ff554a2a2559960c16e4f9ad2b070548dd698feb73b2333bb212b3bf7a2766d1ed48a809948bb199c0f0208ac4d60cb34603f79592601513d338bd9f15b0d5792868466fd5b9aba5ba94ac3b02828aba926dbb4caddb84dd508c5b5fc665765fd77bf626741abd4b9366a5e8d0002c116d8920dd8db21988d17348254ecebb5787e2873c7827d13f83c0410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400001041040000104104000010410400081cd15f8bf2b1d52504cecfbce0000000049454e44ae426082, '', '1234', '2021-07-28', NULL, 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `studentdetails`
-- (See below for the actual view)
--
CREATE TABLE `studentdetails` (
`student_id` varchar(10)
,`reg_id` int(11)
,`course_id` int(11)
,`coursetitle` varchar(20)
,`coursename` varchar(150)
,`major` varchar(150)
,`college` varchar(150)
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
,`section` varchar(20)
,`year_level` varchar(20)
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
,`living_with` varchar(50)
,`others_specify` varchar(150)
,`guardian_name` varchar(50)
,`guardian_occupation` varchar(45)
,`guardian_contact` varchar(11)
,`city_address` varchar(50)
,`parent_name` varchar(50)
,`parent_occupation` varchar(20)
,`parents_address` varchar(45)
,`parents_contact` varchar(45)
,`spouse_name` varchar(45)
,`spouse_occupation` varchar(45)
,`spouse_contact` varchar(45)
,`prev_gwa` float
,`prev_total_units` int(11)
,`school_org` varchar(150)
,`position` varchar(150)
,`patinfo_status` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `student_alumni`
-- (See below for the actual view)
--
CREATE TABLE `student_alumni` (
`userid` varchar(11)
,`course` varchar(150)
,`major` varchar(150)
,`first_name` varchar(50)
,`last_name` varchar(50)
,`middle_name` varchar(50)
,`suffix` varchar(15)
,`email_add` varchar(50)
,`contact` varchar(11)
,`last_sy_attended` varchar(25)
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
,`semester_name` varchar(45)
,`yearlevel` varchar(45)
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
-- Table structure for table `_status`
--

CREATE TABLE `_status` (
  `status_id` int(11) NOT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `_status`
--

INSERT INTO `_status` (`status_id`, `status`) VALUES
(1, 'COMPLETED'),
(2, 'PENDING'),
(3, 'ON GOING'),
(4, 'ATTENDED'),
(5, 'ABSENT');

-- --------------------------------------------------------

--
-- Structure for view `consultation_details`
--
DROP TABLE IF EXISTS `consultation_details`;

CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `consultation_details`  AS  select `c`.`id` AS `consultation_id`,`c`.`patient_id` AS `patient_id`,`FULLNAME`(`pt`.`first_name`,`pt`.`middle_name`,`pt`.`last_name`,'','','','firstname_first') AS `name`,`pt`.`email_add` AS `email_add`,`pt`.`age` AS `age`,`pt`.`sex` AS `sex`,`pt`.`address` AS `address`,`pt`.`phone_number` AS `phone_number`,`pt`.`course_department` AS `course_department`,`pt`.`type` AS `user_type`,`c`.`consultation_type` AS `consultation_type`,`c`.`communication_mode` AS `communication_mode`,`c`.`patient_type` AS `patient_type`,`c`.`problems` AS `problems`,`c`.`date_filed` AS `date_filed`,`c`.`tooth` AS `tooth`,`c`.`surface` AS `surface`,`c`.`status` AS `consultation_status`,`c`.`date_received_by_nurse` AS `date_received_by_nurse`,`c`.`appointment_date` AS `appointment_date`,`c`.`appointment_timefrom` AS `appointment_timefrom`,`c`.`appointment_timeto` AS `appointment_timeto`,`c`.`appointment_meetinglink` AS `appointment_meetinglink`,`c`.`diagnosis` AS `diagnosis`,`c`.`treatment` AS `treatment`,`c`.`prescription_details` AS `prescription_details`,`c`.`prescription_date_issued` AS `prescription_date_issued`,`c`.`remarks` AS `remarks`,`s`.`staff_id` AS `physician_staff_id`,`s`.`fullname` AS `physician_fullname`,`s`.`license_number` AS `license_number` from ((`consultation` `c` join `patient_list` `pt` on(`pt`.`patient_id` = `c`.`patient_id`)) join `staffdetails` `s` on(`s`.`staff_id` = `c`.`staff_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `gmc_request`
--
DROP TABLE IF EXISTS `gmc_request`;

CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `gmc_request`  AS  select `gm`.`request_id` AS `request_id`,`a`.`id` AS `userid`,`a`.`course_id` AS `course_id`,`a`.`first_name` AS `first_name`,`a`.`last_name` AS `last_name`,`a`.`middle_name` AS `middle_name`,`a`.`suffix` AS `suffix`,`a`.`email_add` AS `email_add`,`a`.`contact` AS `contact`,`a`.`last_sy_attended` AS `last_sy_attended`,date_format(`gm`.`date_requested`,'%M %d, %Y') AS `date_requested`,`gm`.`or_no` AS `or_no`,`gm`.`purpose` AS `purpose`,`gm`.`or_pic` AS `or_pic` from (`alumni` `a` join `good_moral_requests` `gm` on(`gm`.`requested_by` = `a`.`id`)) union select `gm`.`request_id` AS `request_id`,`s`.`Student_id` AS `userid`,`s`.`course_id` AS `course_id`,`s`.`first_name` AS `first_name`,`s`.`last_name` AS `last_name`,`s`.`middle_name` AS `middle_name`,`s`.`suffix` AS `suffix`,`s`.`email_add` AS `email_add`,`s`.`phone_number` AS `contact`,`gm`.`last_sy_attended` AS `last_sy_attended`,date_format(`gm`.`date_requested`,'%M %d, %Y') AS `date_requested`,`gm`.`or_no` AS `or_no`,`gm`.`purpose` AS `purpose`,`gm`.`or_pic` AS `or_pic` from (`student` `s` join `good_moral_requests` `gm` on(`gm`.`requested_by` = `s`.`Student_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `login_credentials`
--
DROP TABLE IF EXISTS `login_credentials`;

CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `login_credentials`  AS  select `studentdetails`.`student_id` AS `username`,`studentdetails`.`fullname` AS `name`,`studentdetails`.`password` AS `password`,'Student' AS `usertype`,`studentdetails`.`pic` AS `userpic`,`studentdetails`.`school_org` AS `student_org`,`studentdetails`.`position` AS `student_position`,`SF_CHECK_SCHOLARSHIP_STATUS`(`studentdetails`.`student_id`) AS `scholarship_status`,`SF_CHECK_STUDENT_LABOR_STATUS`(`studentdetails`.`student_id`) AS `sl_status`,NULL AS `staff_office`,NULL AS `staff_position`,`studentdetails`.`verified_status` AS `verified_status`,`studentdetails`.`account_status` AS `account_status`,1 AS `access_level`,`studentdetails`.`e_signature` AS `e_signature`,`studentdetails`.`patinfo_status` AS `patinfo_status` from `studentdetails` union select `staffdetails`.`staff_id` AS `username`,`staffdetails`.`fullname` AS `name`,`staffdetails`.`password` AS `password`,`staffdetails`.`type` AS `usertype`,`staffdetails`.`pic` AS `userpic`,NULL AS `student_org`,NULL AS `student_position`,NULL AS `scholarship_status`,NULL AS `sl_status`,`staffdetails`.`office_name` AS `staff_office`,`staffdetails`.`position` AS `staff_position`,`staffdetails`.`verified_status` AS `verified_status`,`staffdetails`.`account_status` AS `account_status`,`staffdetails`.`access_level` AS `access_level`,`staffdetails`.`e_signature` AS `e_signature`,`staffdetails`.`patinfo_status` AS `patinfo_status` from `staffdetails` union select `superadmin`.`username` AS `username`,NULL AS `name`,`superadmin`.`password` AS `password`,'SUPERADMIN' AS `usertype`,NULL AS `userpic`,NULL AS `student_org`,NULL AS `student_position`,NULL AS `sscholarship_status`,NULL AS `sl_status`,NULL AS `staff_office`,NULL AS `staff_position`,NULL AS `verified_status`,NULL AS `account_status`,1 AS `access_level`,NULL AS `e_signature`,0 AS `patinfo_status` from `superadmin` ;

-- --------------------------------------------------------

--
-- Structure for view `office_dept_heads`
--
DROP TABLE IF EXISTS `office_dept_heads`;

CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `office_dept_heads`  AS  select `o`.`office_id` AS `id`,`o`.`office_name` AS `name`,'Office' AS `office_type`,`s`.`staff_id` AS `staff_id`,`s`.`fullname` AS `fullname`,`s`.`access_level` AS `access_level` from (`office` `o` left join `staffdetails` `s` on(`s`.`office_id` = `o`.`office_id` and `s`.`access_level` = 1 and `s`.`account_status` = 'Active')) union select `d`.`dept_id` AS `id`,`d`.`dept_name` AS `name`,'Department' AS `office_type`,`s`.`staff_id` AS `staff_id`,`s`.`fullname` AS `fullname`,`s`.`access_level` AS `access_level` from (`department` `d` left join `staffdetails` `s` on(`s`.`dept_id` = `d`.`dept_id` and `s`.`access_level` = 1 and `s`.`account_status` = 'Active')) ;

-- --------------------------------------------------------

--
-- Structure for view `patient_list`
--
DROP TABLE IF EXISTS `patient_list`;

CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `patient_list`  AS  select `i`.`patient_id` AS `patient_id`,`s`.`first_name` AS `first_name`,`s`.`last_name` AS `last_name`,`s`.`middle_name` AS `middle_name`,`SF_GET_FULL_ADDRESS`(`s`.`house_block_lot_num`,`s`.`street`,`s`.`prk_vill_sub`,`s`.`brgy`,`s`.`city`,`s`.`province`) AS `address`,`sf_get_age`(`s`.`birth_date`) AS `age`,`s`.`email_add` AS `email_add`,`s`.`phone_number` AS `phone_number`,`SF_GET_DATA_FROM_COURSE_BY_ID`('title',`s`.`course_id`) AS `course_department`,'Student' AS `type`,`s`.`sex` AS `sex`,`i`.`admitted` AS `admitted`,`i`.`admitted_illness` AS `admitted_illness`,`i`.`admitted_illness_start` AS `admitted_illness_start`,`i`.`operation` AS `operation`,`i`.`operation_kind` AS `operation_kind`,`i`.`operation_when` AS `operation_when`,`i`.`infectious_disease` AS `infectious_disease`,`i`.`headaches` AS `headaches`,`f`.`mens_age_start` AS `mens_age_start`,`f`.`mens_regular` AS `mens_regular`,`f`.`mens_irregular` AS `mens_irregular`,`f`.`dysmenorrhea` AS `dysmenorrhea`,`f`.`pms` AS `pms` from ((`clinic_patient_info` `i` join `student` `s` on(`s`.`Student_id` = `i`.`patient_id`)) join `clinic_patient_info_female` `f` on(`f`.`patient_id` = `i`.`patient_id`)) union select `i`.`patient_id` AS `patient_id`,`st`.`first_name` AS `first_name`,`st`.`last_name` AS `last_name`,`st`.`middle_name` AS `middle_name`,`st`.`address` AS `address`,`sf_get_age`(`st`.`birthdate`) AS `age`,`st`.`email_add` AS `email_add`,`st`.`phone_num` AS `phone_number`,if(`SF_GET_DATA_FROM_DEPARTMENT_BY_ID`('dept_name',`st`.`dept_id`) is null,`SF_GET_OFFICE_NAME`(`st`.`office_id`),`SF_GET_DATA_FROM_DEPARTMENT_BY_ID`('dept_name',`st`.`dept_id`)) AS `course_department`,`st`.`type` AS `type`,`st`.`sex` AS `sex`,`i`.`admitted` AS `admitted`,`i`.`admitted_illness` AS `admitted_illness`,`i`.`admitted_illness_start` AS `admitted_illness_start`,`i`.`operation` AS `operation`,`i`.`operation_kind` AS `operation_kind`,`i`.`operation_when` AS `operation_when`,`i`.`infectious_disease` AS `infectious_disease`,`i`.`headaches` AS `headaches`,`f`.`mens_age_start` AS `mens_age_start`,`f`.`mens_regular` AS `mens_regular`,`f`.`mens_irregular` AS `mens_irregular`,`f`.`dysmenorrhea` AS `dysmenorrhea`,`f`.`pms` AS `pms` from ((`clinic_patient_info` `i` join `staff` `st` on(`st`.`staff_id` = `i`.`patient_id`)) join `clinic_patient_info_female` `f` on(`f`.`patient_id` = `i`.`patient_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `promotional_report`
--
DROP TABLE IF EXISTS `promotional_report`;

CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `promotional_report`  AS  select `el`.`id` AS `id`,`el`.`Student_id` AS `student_id`,`el`.`semester` AS `semester`,`el`.`schoolyear` AS `schoolyear`,`s`.`last_name` AS `last_name`,`s`.`first_name` AS `first_name`,`s`.`middle_name` AS `middle_name`,`s`.`suffix` AS `suffix`,`s`.`sex` AS `sex`,date_format(`s`.`birth_date`,'%m/%d/%Y') AS `birthdate`,`SF_GET_COURSE_NAME`(`s`.`course_id`) AS `course`,`el`.`student_yearlevel` AS `student_yearlevel`,`el`.`subject_code1` AS `subject_code1`,`SF_GET_DATA_FROM_SUBJECT_BY_ID`('subject_description',`el`.`subject_code1`) AS `sub_desc1`,`el`.`units1` AS `units1`,`el`.`grade1` AS `grade1`,`el`.`subject_code2` AS `subject_code2`,`SF_GET_DATA_FROM_SUBJECT_BY_ID`('subject_description',`el`.`subject_code2`) AS `sub_desc2`,`el`.`units2` AS `units2`,`el`.`grade2` AS `grade2`,`el`.`subject_code3` AS `subject_code3`,`SF_GET_DATA_FROM_SUBJECT_BY_ID`('subject_description',`el`.`subject_code3`) AS `sub_desc3`,`el`.`units3` AS `units3`,`el`.`grade3` AS `grade3`,`el`.`subject_code4` AS `subject_code4`,`SF_GET_DATA_FROM_SUBJECT_BY_ID`('subject_description',`el`.`subject_code4`) AS `sub_desc4`,`el`.`units4` AS `units4`,`el`.`grade4` AS `grade4`,`el`.`subject_code5` AS `subject_code5`,`SF_GET_DATA_FROM_SUBJECT_BY_ID`('subject_description',`el`.`subject_code5`) AS `sub_desc5`,`el`.`units5` AS `units5`,`el`.`grade5` AS `grade5`,`el`.`subject_code6` AS `subject_code6`,`SF_GET_DATA_FROM_SUBJECT_BY_ID`('subject_description',`el`.`subject_code6`) AS `sub_desc6`,`el`.`units6` AS `units6`,`el`.`grade6` AS `grade6`,`el`.`subject_code7` AS `subject_code7`,`SF_GET_DATA_FROM_SUBJECT_BY_ID`('subject_description',`el`.`subject_code7`) AS `sub_desc7`,`el`.`units7` AS `units7`,`el`.`grade7` AS `grade7`,`el`.`subject_code8` AS `subject_code8`,`SF_GET_DATA_FROM_SUBJECT_BY_ID`('subject_description',`el`.`subject_code8`) AS `sub_desc8`,`el`.`units8` AS `units8`,`el`.`grade8` AS `grade8`,`el`.`subject_code9` AS `subject_code9`,`SF_GET_DATA_FROM_SUBJECT_BY_ID`('subject_description',`el`.`subject_code9`) AS `sub_desc9`,`el`.`units9` AS `units9`,`el`.`grade9` AS `grade9`,if(`el`.`units1` is null,0,`el`.`units1`) + if(`el`.`units2` is null,0,`el`.`units2`) + if(`el`.`units3` is null,0,`el`.`units3`) + if(`el`.`units4` is null,0,`el`.`units4`) + if(`el`.`units5` is null,0,`el`.`units5`) + if(`el`.`units6` is null,0,`el`.`units6`) + if(`el`.`units7` is null,0,`el`.`units7`) + if(`el`.`units8` is null,0,`el`.`units8`) + if(`el`.`units9` is null,0,`el`.`units9`) AS `totalunits`,'' AS `gwa`,if(`s`.`type` = 'Graduate','Yes','No') AS `graduate_question` from (`enrollment_list` `el` join `student` `s` on(`s`.`Student_id` = `el`.`Student_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `request_list`
--
DROP TABLE IF EXISTS `request_list`;

CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `request_list`  AS  select `clinic_certificate_requests`.`request_id` AS `request_id`,`patient_list`.`patient_id` AS `patient_id`,concat(`patient_list`.`first_name`,' ',`patient_list`.`last_name`) AS `fullname`,`patient_list`.`course_department` AS `course_department`,`patient_list`.`address` AS `address`,`patient_list`.`phone_number` AS `phone_number`,`patient_list`.`email_add` AS `email_add`,`patient_list`.`type` AS `type`,`clinic_certificate_requests`.`date_requested` AS `date_requested`,`clinic_certificate_requests`.`purpose` AS `purpose`,`clinic_certificate_requests`.`request_type` AS `request_type`,`clinic_certificate_requests`.`required_document` AS `required_document`,`clinic_certificate_requests`.`document_passed` AS `document_passed`,`clinic_certificate_requests`.`certificate_location` AS `certificate_location`,`clinic_certificate_requests`.`date_released` AS `date_released`,`clinic_certificate_requests`.`status` AS `status`,`clinic_certificate_requests`.`CBC` AS `CBC`,`clinic_certificate_requests`.`PLATELET` AS `PLATELET`,`clinic_certificate_requests`.`HEMOTOCRIT` AS `HEMOTOCRIT`,`clinic_certificate_requests`.`HEMOGLOBIN` AS `HEMOGLOBIN`,`clinic_certificate_requests`.`Urinalysis` AS `Urinalysis`,`clinic_certificate_requests`.`Fecalysis` AS `Fecalysis`,`clinic_certificate_requests`.`FBS` AS `FBS`,`clinic_certificate_requests`.`sua` AS `sua`,`clinic_certificate_requests`.`Creatinine` AS `Creatinine`,`clinic_certificate_requests`.`Lipid` AS `Lipid`,`clinic_certificate_requests`.`SGOT` AS `SGOT`,`clinic_certificate_requests`.`SGPT` AS `SGPT`,`clinic_certificate_requests`.`others` AS `others`,`clinic_certificate_requests`.`other_text` AS `other_text`,`clinic_certificate_requests`.`cbc_loc` AS `cbc_loc`,`clinic_certificate_requests`.`platelet_loc` AS `platelet_loc`,`clinic_certificate_requests`.`hema_loc` AS `hema_loc`,`clinic_certificate_requests`.`hemo_loc` AS `hemo_loc`,`clinic_certificate_requests`.`urine_loc` AS `urine_loc`,`clinic_certificate_requests`.`fecal_loc` AS `fecal_loc`,`clinic_certificate_requests`.`fbs_loc` AS `fbs_loc`,`clinic_certificate_requests`.`sua_loc` AS `sua_loc`,`clinic_certificate_requests`.`creat_loc` AS `creat_loc`,`clinic_certificate_requests`.`lipid_loc` AS `lipid_loc`,`clinic_certificate_requests`.`sgot_loc` AS `sgot_loc`,`clinic_certificate_requests`.`sgpt_loc` AS `sgpt_loc`,`clinic_certificate_requests`.`others_loc` AS `others_loc` from (`patient_list` join `clinic_certificate_requests` on(`clinic_certificate_requests`.`user_id` = `patient_list`.`patient_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `scholarship_general_info`
--
DROP TABLE IF EXISTS `scholarship_general_info`;

CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `scholarship_general_info`  AS  select `g`.`id` AS `grantee_id`,`g`.`student_id` AS `student_id`,`s`.`last_name` AS `last_name`,`s`.`first_name` AS `first_name`,`s`.`middle_name` AS `middle_name`,`s`.`suffix` AS `suffix`,`s`.`fullname` AS `fullname`,`s`.`course_id` AS `course_id`,`s`.`year_level` AS `year_level`,`s`.`coursetitle` AS `coursetitle`,`s`.`coursename` AS `coursename`,`s`.`major` AS `major`,`SF_GET_DATA_FROM_COURSE_BY_ID`('college_id',`s`.`course_id`) AS `college_id`,`SF_GET_DATA_FROM_COLLEGE_BY_ID`('title',`SF_GET_DATA_FROM_COURSE_BY_ID`('college_id',`s`.`course_id`)) AS `college_name`,`s`.`phone_number` AS `phone_number`,`s`.`email_add` AS `email_add`,`s`.`living_with` AS `living_with`,`s`.`others_specify` AS `others_specify`,`s`.`guardian_contact` AS `guardian_contact`,`s`.`city_address` AS `city_address`,`s`.`parent_name` AS `parent_name`,`s`.`parent_occupation` AS `parent_occupation`,`s`.`parents_address` AS `parents_address`,`s`.`parents_contact` AS `parents_contact`,`s`.`spouse_name` AS `spouse_name`,`s`.`spouse_occupation` AS `spouse_occupation`,`s`.`prev_gwa` AS `prev_gwa`,`s`.`prev_total_units` AS `prev_total_units`,`sp`.`program_id` AS `program_id`,`sp`.`program_name` AS `program_name`,`sp`.`program_provider` AS `program_provider`,`SF_GET_SCHOLARSHIP_STATUS`(`sp`.`program_status`) AS `program_status`,`SF_GET_TYPE_OF_SCHOLARSHIP`(`sp`.`type`) AS `program_type`,`SF_GET_SEM_YEAR_ID`(`g`.`semester`,`g`.`year`) AS `sem_year_id`,`g`.`semester_year` AS `semester_year`,`g`.`semester` AS `semester`,`g`.`year` AS `year`,`sp`.`amount` AS `amount`,`g`.`student_status` AS `student_status`,`SF_GET_STUDENT_STATUS`(`g`.`student_status`) AS `status_name`,`g`.`record_status` AS `record_status`,if(`g`.`status_billing` is null,'-',`g`.`status_billing`) AS `billing_status`,if(`g`.`status_payroll` is null,'-',`g`.`status_payroll`) AS `payroll_status`,if(`g`.`status_liquidation` is null,'-',`g`.`status_liquidation`) AS `liquidation_status`,if(`g`.`status_allowance` is null,'-',`g`.`status_allowance`) AS `allowance_status` from ((`grantee_history` `g` join `studentdetails` `s` on(`s`.`student_id` = `g`.`student_id`)) join `scholarship_program` `sp` on(`sp`.`program_id` = `g`.`program_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `sl_application_form_details`
--
DROP TABLE IF EXISTS `sl_application_form_details`;

CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `sl_application_form_details`  AS  select `req`.`requisition_id` AS `requisition_id`,`sl`.`applicant_id` AS `applicant_id`,`sl`.`student_id` AS `student_id`,`st`.`fullname` AS `applicant_name`,`st`.`college` AS `college`,`st`.`section` AS `section`,`st`.`coursetitle` AS `course`,`st`.`year_level` AS `year_level`,`st`.`full_address` AS `full_address`,`st`.`phone_number` AS `phone_number`,date_format(`st`.`birth_date`,'%m/%d%/%Y') AS `applicant_bday`,`st`.`email_add` AS `email_add`,`st`.`birth_place` AS `birth_place`,`sl`.`labor_type` AS `labor_type`,`sl`.`labor_class` AS `labor_class`,`sl`.`labor_status` AS `labor_status`,`sl`.`semester_year` AS `semester_year`,`st`.`e_signature` AS `e_signature`,concat(time_format(`sl`.`available_from`,'%h:%i %p'),' - ',time_format(`sl`.`available_to`,'%h:%i %p')) AS `time_available`,`req`.`requested_by` AS `requested_by`,`req`.`fullname` AS `staff_requested_by`,`req`.`head_signature` AS `head_signature`,`req`.`office_name` AS `office_name`,`req`.`office_type` AS `office_type`,`req`.`no_of_sl` AS `no_of_sl`,`req`.`length_of_service` AS `length_of_service`,`req`.`qualification1` AS `qualification1`,`req`.`qualification2` AS `qualification2`,`req`.`qualification3` AS `qualification3`,`req`.`skill1` AS `skill1`,`req`.`skill2` AS `skill2`,`req`.`additional_workload_reason` AS `additional_workload_reason`,`req`.`reduction_in_workload_reason` AS `reduction_in_workload_reason`,`req`.`reached_saturation_reason` AS `reached_saturation_reason`,`req`.`other_reason` AS `other_reason`,`req`.`requisition_status` AS `requisition_status`,date_format(`req`.`date_submitted`,'%M %d, %Y') AS `requisition_date_submitted`,`req`.`assessed_by` AS `assessed_by`,`req`.`assessed_name` AS `assessed_name`,`req`.`assessor_signature` AS `assessor_signature`,`a`.`duty1` AS `duty1`,`a`.`duty2` AS `duty2`,`a`.`duty3` AS `duty3`,`a`.`duty4` AS `duty4`,`a`.`schedule1` AS `schedule1`,`a`.`schedule2` AS `schedule2`,`a`.`starting_date` AS `starting_date`,`a`.`expiration_date` AS `expiration_date`,`a`.`dean_unit_assigned` AS `dean_unit_assigned`,`a`.`budget_officer` AS `budget_officer`,`a`.`chancellor` AS `chancellor`,`a`.`date_signed` AS `date_signed`,`sl`.`grades_location` AS `grades_location`,`sl`.`cor_location` AS `cor_location`,`sl`.`unit_head_letter_location` AS `unit_head_letter_location`,`sl`.`osas_head_letter_location` AS `osas_head_letter_location`,`sl`.`recommendation_location` AS `recommendation_location`,`sl`.`status` AS `status`,if(`sl`.`recommendation_location` is not null,1,0) AS `recommendation_status`,if(`a`.`applicant_id` is not null,1,0) AS `acceptance_contract_status`,if(`a`.`date_signed` is not null,1,0) AS `student_sign_status` from (((`sl_applicant` `sl` left join `sl_reqform_general_info` `req` on(`req`.`requisition_id` = `sl`.`assigned_to`)) left join `studentdetails` `st` on(`st`.`student_id` = `sl`.`student_id`)) left join `sl_acceptance_details` `a` on(`a`.`applicant_id` = `sl`.`applicant_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `sl_reqform_general_info`
--
DROP TABLE IF EXISTS `sl_reqform_general_info`;

CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `sl_reqform_general_info`  AS  select `r`.`id` AS `requisition_id`,`r`.`requested_by` AS `requested_by`,`SF_GET_E_SIGNATURE`(`r`.`requested_by`) AS `head_signature`,`o`.`fullname` AS `fullname`,`o`.`name` AS `office_name`,`o`.`office_type` AS `office_type`,`r`.`no_of_sl` AS `no_of_sl`,`SF_GET_NO_OF_APPLICANTS`(`r`.`id`) AS `no_of_applicants`,`SF_GET_NO_OF_APPLICANTS_HIRED`(`r`.`id`) AS `no_of_hired`,`r`.`no_of_sl` - `SF_GET_NO_OF_APPLICANTS_HIRED`(`r`.`id`) AS `no_of_vacancies`,`r`.`length_of_service` AS `length_of_service`,`r`.`qualification1` AS `qualification1`,`r`.`qualification2` AS `qualification2`,`r`.`qualification3` AS `qualification3`,`r`.`skill1` AS `skill1`,`r`.`skill2` AS `skill2`,`r`.`additional_workload_reason` AS `additional_workload_reason`,`r`.`reduction_in_workload_reason` AS `reduction_in_workload_reason`,`r`.`reached_saturation_reason` AS `reached_saturation_reason`,`r`.`other_reason` AS `other_reason`,`r`.`requisition_status` AS `requisition_status`,date_format(`r`.`date_submitted`,'%m/%d/%Y') AS `date_submitted`,`r`.`assessed_by` AS `assessed_by`,`SF_GET_STAFF_NAME`(`r`.`assessed_by`) AS `assessed_name`,`SF_GET_E_SIGNATURE`(`r`.`assessed_by`) AS `assessor_signature`,`r`.`date_approved_disapproved` AS `date_approved_disapproved`,`r`.`date_posted` AS `date_posted` from (`requisition_form` `r` join `office_dept_heads` `o` on(`o`.`staff_id` = `r`.`requested_by`)) ;

-- --------------------------------------------------------

--
-- Structure for view `staffdetails`
--
DROP TABLE IF EXISTS `staffdetails`;

CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `staffdetails`  AS  select `s`.`staff_id` AS `staff_id`,`s`.`title` AS `title`,`s`.`last_name` AS `last_name`,`s`.`first_name` AS `first_name`,`s`.`middle_name` AS `middle_name`,`s`.`suffix` AS `suffix`,`s`.`extension` AS `extension`,`FULLNAME`(`s`.`first_name`,`s`.`middle_name`,`s`.`last_name`,`s`.`title`,`s`.`suffix`,`s`.`extension`,'firstname_first') AS `fullname`,`s`.`sex` AS `sex`,`s`.`civil_status` AS `civil_status`,`s`.`birthdate` AS `birthdate`,`SF_GET_AGE`(`s`.`birthdate`) AS `age`,`s`.`email_add` AS `email_add`,`s`.`phone_num` AS `phone_num`,`s`.`employment_status` AS `employment_status`,`s`.`account_status` AS `account_status`,`s`.`access_level` AS `access_level`,`s`.`e_signature` AS `e_signature`,`s`.`pic` AS `pic`,`s`.`date_submitted` AS `date_submitted`,`s`.`date_verified` AS `date_verified`,`sf_check_verified`(`s`.`date_verified`) AS `verified_status`,`s`.`password` AS `password`,`s`.`office_id` AS `office_id`,`o`.`office_name` AS `office_name`,`s`.`dept_id` AS `dept_id`,`d`.`dept_name` AS `dept_name`,`s`.`type` AS `type`,`s`.`position` AS `position`,`s`.`patinfo_status` AS `patinfo_status`,`s`.`license_number` AS `license_number` from ((`staff` `s` left join `office` `o` on(`o`.`office_id` = `s`.`office_id`)) left join `department` `d` on(`d`.`dept_id` = `s`.`dept_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `studentdetails`
--
DROP TABLE IF EXISTS `studentdetails`;

CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `studentdetails`  AS  select `s`.`Student_id` AS `student_id`,`s`.`reg_id` AS `reg_id`,`c`.`course_id` AS `course_id`,`c`.`title` AS `coursetitle`,`c`.`name` AS `coursename`,`c`.`major` AS `major`,`SF_GET_DATA_FROM_COLLEGE_BY_ID`('title',`SF_GET_DATA_FROM_COURSE_BY_ID`('college_id',`c`.`course_id`)) AS `college`,`s`.`last_name` AS `last_name`,`s`.`first_name` AS `first_name`,`s`.`middle_name` AS `middle_name`,`s`.`suffix` AS `suffix`,`FULLNAME`(`s`.`first_name`,`s`.`middle_name`,`s`.`last_name`,'',`s`.`suffix`,'','with_extensions') AS `fullname`,`s`.`house_block_lot_num` AS `house_block_lot_num`,`s`.`street` AS `street`,`s`.`prk_vill_sub` AS `prk_vill_sub`,`s`.`brgy` AS `brgy`,`s`.`city` AS `city`,`s`.`province` AS `province`,`SF_GET_FULL_ADDRESS`(`s`.`house_block_lot_num`,`s`.`street`,`s`.`prk_vill_sub`,`s`.`brgy`,`s`.`city`,`s`.`province`) AS `full_address`,`s`.`zip_code` AS `zip_code`,`s`.`nationality` AS `nationality`,`s`.`civil_status` AS `civil_status`,`s`.`religion` AS `religion`,`s`.`sex` AS `sex`,`s`.`phone_number` AS `phone_number`,`s`.`birth_date` AS `birth_date`,`SF_GET_AGE`(`s`.`birth_date`) AS `age`,`s`.`birth_place` AS `birth_place`,`s`.`email_add` AS `email_add`,`s`.`section` AS `section`,`s`.`year_level` AS `year_level`,`s`.`type` AS `type`,`s`.`student_status` AS `student_status`,`s`.`account_status` AS `account_status`,`s`.`cor` AS `cor`,`s`.`e_signature` AS `e_signature`,`s`.`pic` AS `pic`,`s`.`password` AS `password`,`s`.`date_submitted` AS `date_submitted`,`s`.`date_verified` AS `date_verified`,if(`s`.`date_verified` is null,'Not Verified','Verified') AS `verified_status`,`e`.`living_with` AS `living_with`,`e`.`others_specify` AS `others_specify`,`e`.`guardian_name` AS `guardian_name`,`e`.`guardian_occupation` AS `guardian_occupation`,`e`.`guardian_contact` AS `guardian_contact`,`e`.`city_address` AS `city_address`,`e`.`parent_name` AS `parent_name`,`e`.`parent_occupation` AS `parent_occupation`,`e`.`parents_address` AS `parents_address`,`e`.`parents_contact` AS `parents_contact`,`e`.`spouse_name` AS `spouse_name`,`e`.`spouse_occupation` AS `spouse_occupation`,`e`.`spouse_contact` AS `spouse_contact`,`e`.`prev_gwa` AS `prev_gwa`,`e`.`prev_total_units` AS `prev_total_units`,`SF_GET_DATA_FROM_SCHOOL_ORG_BY_ID`('org_name',`SF_GET_ORG_WHERE_STUDENT_IS_GOVERNOR_PRESIDENT`(`s`.`Student_id`)) AS `school_org`,`SF_GET_STUDENT_POSITION_IN_ORG`(`SF_GET_ORG_WHERE_STUDENT_IS_GOVERNOR_PRESIDENT`(`s`.`Student_id`),`s`.`Student_id`) AS `position`,`s`.`patinfo_status` AS `patinfo_status` from ((`student` `s` left join `emergency_contact` `e` on(`e`.`Student_id` = `s`.`Student_id`)) left join `course` `c` on(`c`.`course_id` = `s`.`course_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `student_alumni`
--
DROP TABLE IF EXISTS `student_alumni`;

CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `student_alumni`  AS  select `a`.`id` AS `userid`,`SF_GET_DATA_FROM_COURSE_BY_ID`('name',`a`.`course_id`) AS `course`,`SF_GET_DATA_FROM_COURSE_BY_ID`('major',`a`.`course_id`) AS `major`,`a`.`first_name` AS `first_name`,`a`.`last_name` AS `last_name`,`a`.`middle_name` AS `middle_name`,`a`.`suffix` AS `suffix`,`a`.`email_add` AS `email_add`,`a`.`contact` AS `contact`,`a`.`last_sy_attended` AS `last_sy_attended` from `alumni` `a` union select `s`.`Student_id` AS `userid`,`SF_GET_DATA_FROM_COURSE_BY_ID`('name',`s`.`course_id`) AS `course`,`SF_GET_DATA_FROM_COURSE_BY_ID`('major',`s`.`course_id`) AS `major`,`s`.`first_name` AS `first_name`,`s`.`last_name` AS `last_name`,`s`.`middle_name` AS `middle_name`,`s`.`suffix` AS `suffix`,`s`.`email_add` AS `email_add`,`s`.`phone_number` AS `contact`,'' AS `last_sy_attended` from `student` `s` ;

-- --------------------------------------------------------

--
-- Structure for view `student_grades`
--
DROP TABLE IF EXISTS `student_grades`;

CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `student_grades`  AS  select `e`.`id` AS `id`,`e`.`Student_id` AS `student_id`,`e`.`schoolyear` AS `schoolyear`,`e`.`semester` AS `semester_name`,`e`.`student_yearlevel` AS `yearlevel`,`e`.`subject_code1` AS `subcode`,`SF_GET_DATA_FROM_SUBJECT_BY_ID`('subject_description',`e`.`subject_code1`) AS `subdesc`,`SF_GET_DATA_FROM_SUBJECT_BY_ID`('units',`e`.`subject_code1`) AS `units`,`e`.`grade1` AS `grade` from `enrollment_list` `e` where `e`.`subject_code1` is not null union select `e`.`id` AS `id`,`e`.`Student_id` AS `student_id`,`e`.`schoolyear` AS `schoolyear`,`e`.`semester` AS `semester_name`,`e`.`student_yearlevel` AS `yearlevel`,`e`.`subject_code2` AS `subcode`,`SF_GET_DATA_FROM_SUBJECT_BY_ID`('subject_description',`e`.`subject_code2`) AS `subdesc`,`SF_GET_DATA_FROM_SUBJECT_BY_ID`('units',`e`.`subject_code2`) AS `units`,`e`.`grade2` AS `grade` from `enrollment_list` `e` where `e`.`subject_code2` is not null union select `e`.`id` AS `id`,`e`.`Student_id` AS `student_id`,`e`.`schoolyear` AS `schoolyear`,`e`.`semester` AS `semester_name`,`e`.`student_yearlevel` AS `yearlevel`,`e`.`subject_code3` AS `subcode`,`SF_GET_DATA_FROM_SUBJECT_BY_ID`('subject_description',`e`.`subject_code3`) AS `subdesc`,`SF_GET_DATA_FROM_SUBJECT_BY_ID`('units',`e`.`subject_code3`) AS `units`,`e`.`grade3` AS `grade` from `enrollment_list` `e` where `e`.`subject_code3` is not null union select `e`.`id` AS `id`,`e`.`Student_id` AS `student_id`,`e`.`schoolyear` AS `schoolyear`,`e`.`semester` AS `semester_name`,`e`.`student_yearlevel` AS `yearlevel`,`e`.`subject_code4` AS `subcode`,`SF_GET_DATA_FROM_SUBJECT_BY_ID`('subject_description',`e`.`subject_code4`) AS `subdesc`,`SF_GET_DATA_FROM_SUBJECT_BY_ID`('units',`e`.`subject_code4`) AS `units`,`e`.`grade4` AS `grade` from `enrollment_list` `e` where `e`.`subject_code4` is not null union select `e`.`id` AS `id`,`e`.`Student_id` AS `student_id`,`e`.`schoolyear` AS `schoolyear`,`e`.`semester` AS `semester_name`,`e`.`student_yearlevel` AS `yearlevel`,`e`.`subject_code5` AS `subcode`,`SF_GET_DATA_FROM_SUBJECT_BY_ID`('subject_description',`e`.`subject_code5`) AS `subdesc`,`SF_GET_DATA_FROM_SUBJECT_BY_ID`('units',`e`.`subject_code5`) AS `units`,`e`.`grade5` AS `grade` from `enrollment_list` `e` where `e`.`subject_code5` is not null union select `e`.`id` AS `id`,`e`.`Student_id` AS `student_id`,`e`.`schoolyear` AS `schoolyear`,`e`.`semester` AS `semester_name`,`e`.`student_yearlevel` AS `yearlevel`,`e`.`subject_code6` AS `subcode`,`SF_GET_DATA_FROM_SUBJECT_BY_ID`('subject_description',`e`.`subject_code6`) AS `subdesc`,`SF_GET_DATA_FROM_SUBJECT_BY_ID`('units',`e`.`subject_code6`) AS `units`,`e`.`grade6` AS `grade` from `enrollment_list` `e` where `e`.`subject_code6` is not null union select `e`.`id` AS `id`,`e`.`Student_id` AS `student_id`,`e`.`schoolyear` AS `schoolyear`,`e`.`semester` AS `semester_name`,`e`.`student_yearlevel` AS `yearlevel`,`e`.`subject_code7` AS `subcode`,`SF_GET_DATA_FROM_SUBJECT_BY_ID`('subject_description',`e`.`subject_code7`) AS `subdesc`,`SF_GET_DATA_FROM_SUBJECT_BY_ID`('units',`e`.`subject_code7`) AS `units`,`e`.`grade7` AS `grade` from `enrollment_list` `e` where `e`.`subject_code7` is not null union select `e`.`id` AS `id`,`e`.`Student_id` AS `student_id`,`e`.`schoolyear` AS `schoolyear`,`e`.`semester` AS `semester_name`,`e`.`student_yearlevel` AS `yearlevel`,`e`.`subject_code8` AS `subcode`,`SF_GET_DATA_FROM_SUBJECT_BY_ID`('subject_description',`e`.`subject_code8`) AS `subdesc`,`SF_GET_DATA_FROM_SUBJECT_BY_ID`('units',`e`.`subject_code8`) AS `units`,`e`.`grade8` AS `grade` from `enrollment_list` `e` where `e`.`subject_code8` is not null union select `e`.`id` AS `id`,`e`.`Student_id` AS `student_id`,`e`.`schoolyear` AS `schoolyear`,`e`.`semester` AS `semester_name`,`e`.`student_yearlevel` AS `yearlevel`,`e`.`subject_code9` AS `subcode`,`SF_GET_DATA_FROM_SUBJECT_BY_ID`('subject_description',`e`.`subject_code9`) AS `subdesc`,`SF_GET_DATA_FROM_SUBJECT_BY_ID`('units',`e`.`subject_code9`) AS `units`,`e`.`grade9` AS `grade` from `enrollment_list` `e` where `e`.`subject_code9` is not null ;

-- --------------------------------------------------------

--
-- Structure for view `viewcomplaint`
--
DROP TABLE IF EXISTS `viewcomplaint`;

CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `viewcomplaint`  AS  select `s`.`Student_id` AS `student_id`,`cm`.`Complaint_ID` AS `Complaint_ID`,`s`.`last_name` AS `last_name`,`s`.`first_name` AS `first_name`,`s`.`middle_name` AS `middle_name`,`FULLNAME`(`s`.`first_name`,`s`.`middle_name`,`s`.`last_name`,`s`.`title`,`s`.`suffix`,'','lastname_first') AS `fullname`,`cm`.`Date_Submitted` AS `Date_Submitted`,`cm`.`Date_of_incident` AS `Date_of_incident`,`cm`.`Time_of_incident` AS `Time_of_incident`,`cm`.`Loc_of_incident` AS `Loc_of_incident`,`cm`.`Person_Complained` AS `Person_Complained`,`cm`.`Designation_Complained` AS `Designation_Complained`,`cm`.`Detail` AS `Complaint_Detail`,`cm`.`Witness1` AS `Witness1`,`cm`.`Witness2` AS `Witness2`,`cm`.`Witness3` AS `Witness3`,`cm`.`Status` AS `Status`,`ss`.`response_id` AS `response_id`,`ss`.`date_schedule` AS `schedule_date`,`ss`.`time_from` AS `time_from`,`ss`.`time_to` AS `time_to`,concat(`ss`.`time_from`,'-',`ss`.`time_to`) AS `time_schedule`,`ss`.`meeting_type` AS `meeting_type`,`ss`.`meeting_link` AS `meeting_link`,`ss`.`meeting_id` AS `meeting_id`,`ss`.`passcode` AS `passcode`,`ss`.`action_taken` AS `action_taken`,`ss`.`status` AS `reponse_status`,`ss`.`defendant` AS `defendant`,`ss`.`details` AS `response_details`,`ss`.`notification_status` AS `notification_status` from ((`student` `s` join `complaint` `cm` on(`cm`.`Student_id` = `s`.`Student_id`)) left join `response` `ss` on(`ss`.`Complaint_ID` = `cm`.`Complaint_ID`)) ;

-- --------------------------------------------------------

--
-- Structure for view `viewresponse`
--
DROP TABLE IF EXISTS `viewresponse`;

CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `viewresponse`  AS  select `s`.`Student_id` AS `student_id`,`cm`.`Complaint_ID` AS `Complaint_ID`,`s`.`last_name` AS `last_name`,`s`.`first_name` AS `first_name`,`s`.`middle_name` AS `middle_name`,`FULLNAME`(`s`.`first_name`,`s`.`middle_name`,`s`.`last_name`,`s`.`title`,`s`.`suffix`,'','lastname_first') AS `fullname`,`cm`.`Date_Submitted` AS `Date_Submitted`,`cm`.`Date_of_incident` AS `Date_of_incident`,`cm`.`Time_of_incident` AS `Time_of_incident`,`cm`.`Loc_of_incident` AS `Loc_of_incident`,`cm`.`Person_Complained` AS `Person_Complained`,`cm`.`Designation_Complained` AS `Designation_Complained`,`cm`.`Detail` AS `Complaint_Detail`,`cm`.`Witness1` AS `Witness1`,`cm`.`Witness2` AS `Witness2`,`cm`.`Witness3` AS `Witness3`,`cm`.`Status` AS `Status`,`ss`.`response_id` AS `response_id`,`ss`.`date_schedule` AS `schedule_date`,`ss`.`time_from` AS `time_from`,`ss`.`time_to` AS `time_to`,concat(`ss`.`time_from`,'-',`ss`.`time_to`) AS `time_schedule`,`ss`.`meeting_type` AS `meeting_type`,`ss`.`meeting_link` AS `meeting_link`,`ss`.`meeting_id` AS `meeting_id`,`ss`.`passcode` AS `passcode`,`ss`.`action_taken` AS `action_taken`,`ss`.`status` AS `response_status`,`ss`.`defendant` AS `defendant`,`ss`.`details` AS `response_details`,`ss`.`notification_status` AS `notification_status` from ((`student` `s` join `response` `ss` on(`ss`.`defendant` = `s`.`Student_id`)) join `complaint` `cm` on(`cm`.`Complaint_ID` = `ss`.`Complaint_ID`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accomplishment_rating`
--
ALTER TABLE `accomplishment_rating`
  ADD PRIMARY KEY (`rate_id`),
  ADD UNIQUE KEY `unique_index` (`applicant_id`,`month`,`year`),
  ADD KEY `fk_accomplishment_rating_sl_applicant1_idx` (`applicant_id`);

--
-- Indexes for table `accomplishment_task`
--
ALTER TABLE `accomplishment_task`
  ADD PRIMARY KEY (`task_id`),
  ADD UNIQUE KEY `unique_index` (`applicant_id`,`task`,`month`,`date_posted`),
  ADD KEY `fk_accomplishment_task_sl_applicant1_idx` (`applicant_id`),
  ADD KEY `fk_accomplistment_task_student1` (`student_id`);

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`User_Id`);

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`registration_id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_alumni_course1_idx` (`course_id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`announcement_id`),
  ADD KEY `fk_announcements_staff1_idx` (`staff_id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chk_intake_q6`
--
ALTER TABLE `chk_intake_q6`
  ADD PRIMARY KEY (`chk_q6_id`),
  ADD KEY `fk_intake_id` (`intake_id`);

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
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`Complaint_ID`),
  ADD KEY `complaint_idfk_1` (`Student_id`);

--
-- Indexes for table `consultation`
--
ALTER TABLE `consultation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_consultation_clinic_patient_info1_idx` (`patient_id`),
  ADD KEY `fk_consultation_type_idx` (`consultation_type`),
  ADD KEY `fk_staff` (`staff_id`);

--
-- Indexes for table `consultation_type`
--
ALTER TABLE `consultation_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `counselling_evaluation`
--
ALTER TABLE `counselling_evaluation`
  ADD PRIMARY KEY (`counsel_eval_id`),
  ADD KEY `fk_studeval_id` (`Student_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `fk_course_college1_idx` (`college_id`);

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
  ADD UNIQUE KEY `unique_index` (`Student_id`,`schoolyear`,`semester`),
  ADD KEY `fk_enrollment_list_student1_idx` (`Student_id`);

--
-- Indexes for table `good_moral_requests`
--
ALTER TABLE `good_moral_requests`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `grantee_history`
--
ALTER TABLE `grantee_history`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_index` (`student_id`,`program_id`,`semester`,`year`),
  ADD KEY `fk_student_id_idx` (`student_id`),
  ADD KEY `fk_student_status_idx` (`student_status`),
  ADD KEY `fk_program_id_idx` (`program_id`);

--
-- Indexes for table `group_guidance`
--
ALTER TABLE `group_guidance`
  ADD PRIMARY KEY (`grp_guidance_id`),
  ADD KEY `fk_apt_gg` (`appointment_id`),
  ADD KEY `fk_cid_gg` (`course_id`);

--
-- Indexes for table `guidance_appointments`
--
ALTER TABLE `guidance_appointments`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `fk_status_id` (`status_id`),
  ADD KEY `fk_mode_id` (`mode_id`);

--
-- Indexes for table `indv_counselling`
--
ALTER TABLE `indv_counselling`
  ADD PRIMARY KEY (`counselling_id`),
  ADD KEY `fk_counsel_apt_id` (`appointment_id`),
  ADD KEY `fk_counsel_intake_id` (`intake_id`);

--
-- Indexes for table `intake_form`
--
ALTER TABLE `intake_form`
  ADD PRIMARY KEY (`intake_id`),
  ADD KEY `fk_stud_id` (`Student_id`),
  ADD KEY `fk_int_status_id` (`status_id`);

--
-- Indexes for table `job_hiring_announcement`
--
ALTER TABLE `job_hiring_announcement`
  ADD PRIMARY KEY (`requisition_id`),
  ADD KEY `fk_job_hiring_announcement_requisition_form1_idx` (`requisition_id`),
  ADD KEY `fk_staff_id_idx` (`posted_by`);

--
-- Indexes for table `list_of_semester`
--
ALTER TABLE `list_of_semester`
  ADD PRIMARY KEY (`semester_id`);

--
-- Indexes for table `list_of_subjects`
--
ALTER TABLE `list_of_subjects`
  ADD PRIMARY KEY (`subject_id`),
  ADD KEY `fk_list_of_subjects_course1_idx` (`course`);

--
-- Indexes for table `mode_of_communication`
--
ALTER TABLE `mode_of_communication`
  ADD PRIMARY KEY (`mode_id`);

--
-- Indexes for table `notif`
--
ALTER TABLE `notif`
  ADD PRIMARY KEY (`notif_id`),
  ADD KEY `fk_notif_office_id_idx` (`office_id`);

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
-- Indexes for table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`participant_id`),
  ADD KEY `fk_gg_guidance_id` (`grp_guidance_id`),
  ADD KEY `fk_gg_stud_id` (`Student_id`);

--
-- Indexes for table `patient_health_record_medical`
--
ALTER TABLE `patient_health_record_medical`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referral_form`
--
ALTER TABLE `referral_form`
  ADD PRIMARY KEY (`referral_id`),
  ADD KEY `fk_staff_id_ref` (`staff_id`),
  ADD KEY `fk_ref_studid` (`Student_id`),
  ADD KEY `fk_ref_stat` (`status_id`);

--
-- Indexes for table `requisition_form`
--
ALTER TABLE `requisition_form`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_requisition_form_staff1_idx` (`requested_by`),
  ADD KEY `fk_requisition_form_staff2_idx` (`assessed_by`);

--
-- Indexes for table `response`
--
ALTER TABLE `response`
  ADD PRIMARY KEY (`response_id`),
  ADD KEY `fk_response_complaint1_idx` (`Complaint_ID`);

--
-- Indexes for table `scholarship_grantee`
--
ALTER TABLE `scholarship_grantee`
  ADD PRIMARY KEY (`scholar_id`),
  ADD KEY `scholar_program_id` (`scholar_program_id`),
  ADD KEY `student_id` (`student_id`);

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
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_course_section1_idx` (`course_id`);

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
-- Indexes for table `seminar_evaluation`
--
ALTER TABLE `seminar_evaluation`
  ADD PRIMARY KEY (`seminar_eval_id`),
  ADD KEY `fk_studsem_eval_id` (`Student_id`),
  ADD KEY `fk_appointment_id` (`appointment_id`);

--
-- Indexes for table `sl_acceptance_details`
--
ALTER TABLE `sl_acceptance_details`
  ADD PRIMARY KEY (`applicant_id`),
  ADD KEY `fk_sl_acceptance_details_sl_applicant1_idx` (`applicant_id`);

--
-- Indexes for table `sl_applicant`
--
ALTER TABLE `sl_applicant`
  ADD PRIMARY KEY (`applicant_id`),
  ADD KEY `fk_student_labor_student1_idx` (`student_id`),
  ADD KEY `fk_student_labot_requisition_form1_idx` (`assigned_to`);

--
-- Indexes for table `sl_dtr`
--
ALTER TABLE `sl_dtr`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sl_dtr_sl_applicant1_idx` (`applicant_id`);

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
-- Indexes for table `_status`
--
ALTER TABLE `_status`
  ADD PRIMARY KEY (`status_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accomplishment_rating`
--
ALTER TABLE `accomplishment_rating`
  MODIFY `rate_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `accomplishment_task`
--
ALTER TABLE `accomplishment_task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `User_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `alumni`
--
ALTER TABLE `alumni`
  MODIFY `registration_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `announcement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chk_intake_q6`
--
ALTER TABLE `chk_intake_q6`
  MODIFY `chk_q6_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `Complaint_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `consultation`
--
ALTER TABLE `consultation`
  MODIFY `id` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `consultation_type`
--
ALTER TABLE `consultation_type`
  MODIFY `type_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `counselling_evaluation`
--
ALTER TABLE `counselling_evaluation`
  MODIFY `counsel_eval_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `enrollment_list`
--
ALTER TABLE `enrollment_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `good_moral_requests`
--
ALTER TABLE `good_moral_requests`
  MODIFY `request_id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `grantee_history`
--
ALTER TABLE `grantee_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `group_guidance`
--
ALTER TABLE `group_guidance`
  MODIFY `grp_guidance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `guidance_appointments`
--
ALTER TABLE `guidance_appointments`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `indv_counselling`
--
ALTER TABLE `indv_counselling`
  MODIFY `counselling_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `intake_form`
--
ALTER TABLE `intake_form`
  MODIFY `intake_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `list_of_semester`
--
ALTER TABLE `list_of_semester`
  MODIFY `semester_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `list_of_subjects`
--
ALTER TABLE `list_of_subjects`
  MODIFY `subject_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `mode_of_communication`
--
ALTER TABLE `mode_of_communication`
  MODIFY `mode_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notif`
--
ALTER TABLE `notif`
  MODIFY `notif_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `office`
--
ALTER TABLE `office`
  MODIFY `office_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `organization_member`
--
ALTER TABLE `organization_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `participants`
--
ALTER TABLE `participants`
  MODIFY `participant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `patient_health_record_medical`
--
ALTER TABLE `patient_health_record_medical`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `referral_form`
--
ALTER TABLE `referral_form`
  MODIFY `referral_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `requisition_form`
--
ALTER TABLE `requisition_form`
  MODIFY `id` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `response`
--
ALTER TABLE `response`
  MODIFY `response_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `scholarship_grantee`
--
ALTER TABLE `scholarship_grantee`
  MODIFY `scholar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10004;

--
-- AUTO_INCREMENT for table `scholarship_masterlist_documents`
--
ALTER TABLE `scholarship_masterlist_documents`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT for table `seminar_evaluation`
--
ALTER TABLE `seminar_evaluation`
  MODIFY `seminar_eval_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sl_applicant`
--
ALTER TABLE `sl_applicant`
  MODIFY `applicant_id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sl_dtr`
--
ALTER TABLE `sl_dtr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000000003;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
-- AUTO_INCREMENT for table `_status`
--
ALTER TABLE `_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accomplishment_rating`
--
ALTER TABLE `accomplishment_rating`
  ADD CONSTRAINT `fk_accomplishment_rating_sl_applicant1` FOREIGN KEY (`applicant_id`) REFERENCES `sl_applicant` (`applicant_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `accomplishment_task`
--
ALTER TABLE `accomplishment_task`
  ADD CONSTRAINT `fk_accomplishment_task_sl_applicant1` FOREIGN KEY (`applicant_id`) REFERENCES `sl_applicant` (`applicant_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_accomplistment_task_student1` FOREIGN KEY (`student_id`) REFERENCES `student` (`Student_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `alumni`
--
ALTER TABLE `alumni`
  ADD CONSTRAINT `fk_alumni_course1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `announcements`
--
ALTER TABLE `announcements`
  ADD CONSTRAINT `fk_announcements_staff1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `clinic_patient_info_female`
--
ALTER TABLE `clinic_patient_info_female`
  ADD CONSTRAINT `fk_clinic_patient_info_female_clinic_patient_info1` FOREIGN KEY (`patient_id`) REFERENCES `clinic_patient_info` (`patient_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `complaint`
--
ALTER TABLE `complaint`
  ADD CONSTRAINT `complaint_idfk_1` FOREIGN KEY (`Student_id`) REFERENCES `student` (`Student_id`);

--
-- Constraints for table `consultation`
--
ALTER TABLE `consultation`
  ADD CONSTRAINT `fk_consultation_clinic_patient_info1` FOREIGN KEY (`patient_id`) REFERENCES `clinic_patient_info` (`patient_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_consultation_type` FOREIGN KEY (`consultation_type`) REFERENCES `consultation_type` (`type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_staff` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `counselling_evaluation`
--
ALTER TABLE `counselling_evaluation`
  ADD CONSTRAINT `fk_studeval_id` FOREIGN KEY (`Student_id`) REFERENCES `student` (`Student_id`) ON DELETE NO ACTION;

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `fk_course_college1` FOREIGN KEY (`college_id`) REFERENCES `college` (`college_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `fk_program_id` FOREIGN KEY (`program_id`) REFERENCES `scholarship_program` (`program_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_student_id` FOREIGN KEY (`student_id`) REFERENCES `student` (`Student_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_student_status` FOREIGN KEY (`student_status`) REFERENCES `student_status` (`status_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `group_guidance`
--
ALTER TABLE `group_guidance`
  ADD CONSTRAINT `fk_apt_gg` FOREIGN KEY (`appointment_id`) REFERENCES `guidance_appointments` (`appointment_id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `fk_cid_gg` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE NO ACTION;

--
-- Constraints for table `guidance_appointments`
--
ALTER TABLE `guidance_appointments`
  ADD CONSTRAINT `fk_mode_id` FOREIGN KEY (`mode_id`) REFERENCES `mode_of_communication` (`mode_id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `fk_status_id` FOREIGN KEY (`status_id`) REFERENCES `_status` (`status_id`) ON DELETE NO ACTION;

--
-- Constraints for table `indv_counselling`
--
ALTER TABLE `indv_counselling`
  ADD CONSTRAINT `fk_counsel_apt_id` FOREIGN KEY (`appointment_id`) REFERENCES `guidance_appointments` (`appointment_id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `fk_counsel_intake_id` FOREIGN KEY (`intake_id`) REFERENCES `intake_form` (`intake_id`) ON DELETE NO ACTION;

--
-- Constraints for table `intake_form`
--
ALTER TABLE `intake_form`
  ADD CONSTRAINT `fk_int_status_id` FOREIGN KEY (`status_id`) REFERENCES `_status` (`status_id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `fk_stud_id` FOREIGN KEY (`Student_id`) REFERENCES `student` (`Student_id`) ON DELETE NO ACTION;

--
-- Constraints for table `job_hiring_announcement`
--
ALTER TABLE `job_hiring_announcement`
  ADD CONSTRAINT `fk_requisition_id` FOREIGN KEY (`requisition_id`) REFERENCES `requisition_form` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_staff_id` FOREIGN KEY (`posted_by`) REFERENCES `staff` (`staff_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `list_of_subjects`
--
ALTER TABLE `list_of_subjects`
  ADD CONSTRAINT `fk_list_of_subjects_course1` FOREIGN KEY (`course`) REFERENCES `course` (`course_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `notif`
--
ALTER TABLE `notif`
  ADD CONSTRAINT `fk_notif_office_id` FOREIGN KEY (`office_id`) REFERENCES `office` (`office_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `organization_member`
--
ALTER TABLE `organization_member`
  ADD CONSTRAINT `Organization_Member_ibfk_1` FOREIGN KEY (`org_id`) REFERENCES `school_organization` (`org_id`),
  ADD CONSTRAINT `Organization_Member_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`Student_id`);

--
-- Constraints for table `participants`
--
ALTER TABLE `participants`
  ADD CONSTRAINT `fk_gg_guidance_id` FOREIGN KEY (`grp_guidance_id`) REFERENCES `group_guidance` (`grp_guidance_id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `fk_gg_stud_id` FOREIGN KEY (`Student_id`) REFERENCES `student` (`Student_id`) ON DELETE NO ACTION;

--
-- Constraints for table `referral_form`
--
ALTER TABLE `referral_form`
  ADD CONSTRAINT `fk_ref_stat` FOREIGN KEY (`status_id`) REFERENCES `_status` (`status_id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `fk_ref_studid` FOREIGN KEY (`Student_id`) REFERENCES `student` (`Student_id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `fk_staff_id_ref` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`) ON DELETE NO ACTION;

--
-- Constraints for table `requisition_form`
--
ALTER TABLE `requisition_form`
  ADD CONSTRAINT `fk_requisition_form_staff1` FOREIGN KEY (`requested_by`) REFERENCES `staff` (`staff_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_requisition_form_staff2` FOREIGN KEY (`assessed_by`) REFERENCES `staff` (`staff_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Constraints for table `school_organization`
--
ALTER TABLE `school_organization`
  ADD CONSTRAINT `School_organization_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`);

--
-- Constraints for table `section`
--
ALTER TABLE `section`
  ADD CONSTRAINT `fk_course_section1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `seminar_evaluation`
--
ALTER TABLE `seminar_evaluation`
  ADD CONSTRAINT `fk_appointment_id` FOREIGN KEY (`appointment_id`) REFERENCES `guidance_appointments` (`appointment_id`),
  ADD CONSTRAINT `fk_studsem_eval_id` FOREIGN KEY (`Student_id`) REFERENCES `student` (`Student_id`) ON DELETE NO ACTION;

--
-- Constraints for table `sl_acceptance_details`
--
ALTER TABLE `sl_acceptance_details`
  ADD CONSTRAINT `fk_sl_acceptance_details_sl_applicant1` FOREIGN KEY (`applicant_id`) REFERENCES `sl_applicant` (`applicant_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sl_applicant`
--
ALTER TABLE `sl_applicant`
  ADD CONSTRAINT `fk_student_labor_student1` FOREIGN KEY (`student_id`) REFERENCES `student` (`Student_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_student_labot_requisition_form1` FOREIGN KEY (`assigned_to`) REFERENCES `requisition_form` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sl_dtr`
--
ALTER TABLE `sl_dtr`
  ADD CONSTRAINT `fk_sl_dtr_sl_applicant1` FOREIGN KEY (`applicant_id`) REFERENCES `sl_applicant` (`applicant_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `Student_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
