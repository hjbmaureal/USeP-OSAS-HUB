

CREATE TABLE `_status` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO _status VALUES("1","COMPLETED");
INSERT INTO _status VALUES("2","PENDING");
INSERT INTO _status VALUES("3","ON GOING");
INSERT INTO _status VALUES("4","ATTENDED");
INSERT INTO _status VALUES("5","ABSENT");



CREATE TABLE `accomplishment_rating` (
  `rate_id` int(11) NOT NULL AUTO_INCREMENT,
  `applicant_id` int(10) unsigned zerofill NOT NULL,
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
  `year` varchar(45) NOT NULL,
  PRIMARY KEY (`rate_id`),
  UNIQUE KEY `unique_index` (`applicant_id`,`month`,`year`),
  KEY `fk_accomplishment_rating_sl_applicant1_idx` (`applicant_id`),
  CONSTRAINT `fk_accomplishment_rating_sl_applicant1` FOREIGN KEY (`applicant_id`) REFERENCES `sl_applicant` (`applicant_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

INSERT INTO accomplishment_rating VALUES("4","0000000018","Excellent","Satisfactory","Satisfactory","Satisfactory","Satisfactory","Excellent","Satisfactory","Satisfactory","Excellent","September","2021");
INSERT INTO accomplishment_rating VALUES("5","0000000020","Satisfactory","Satisfactory","Satisfactory","Satisfactory","Satisfactory","Satisfactory","Satisfactory","Satisfactory","Satisfactory","October","2021");
INSERT INTO accomplishment_rating VALUES("6","0000000018","Satisfactory","Need Improvement","Satisfactory","Satisfactory","Satisfactory","Satisfactory","Satisfactory","Satisfactory","Satisfactory","October","2021");
INSERT INTO accomplishment_rating VALUES("8","0000000018","Excellent","Satisfactory","Need Improvement","Satisfactory","Excellent","Satisfactory","Need Improvement","Satisfactory","Excellent","August","2021");



CREATE TABLE `accomplishment_task` (
  `task_id` int(11) NOT NULL AUTO_INCREMENT,
  `applicant_id` int(10) unsigned zerofill NOT NULL,
  `student_id` varchar(10) NOT NULL,
  `task` varchar(255) DEFAULT NULL,
  `month` varchar(50) DEFAULT NULL,
  `year` varchar(45) NOT NULL,
  `date_posted` date NOT NULL,
  PRIMARY KEY (`task_id`),
  UNIQUE KEY `unique_index` (`applicant_id`,`task`,`month`,`date_posted`),
  KEY `fk_accomplishment_task_sl_applicant1_idx` (`applicant_id`),
  KEY `fk_accomplistment_task_student1` (`student_id`),
  CONSTRAINT `fk_accomplishment_task_sl_applicant1` FOREIGN KEY (`applicant_id`) REFERENCES `sl_applicant` (`applicant_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_accomplistment_task_student1` FOREIGN KEY (`student_id`) REFERENCES `student` (`Student_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4;

INSERT INTO accomplishment_task VALUES("34","0000000018","2018-00001","dawdws","September","2021","2021-10-25");
INSERT INTO accomplishment_task VALUES("35","0000000020","2021-00002","fwefsdfsdfsdfsdf","October","2021","2021-10-27");
INSERT INTO accomplishment_task VALUES("36","0000000020","2021-00002","sdfsdf","October","2021","2021-10-27");
INSERT INTO accomplishment_task VALUES("37","0000000018","2018-00001","oct dus","October","2021","2021-10-28");
INSERT INTO accomplishment_task VALUES("38","0000000018","2018-00001","oct 3","October","2021","2021-10-28");
INSERT INTO accomplishment_task VALUES("39","0000000018","2018-00001","Hi1","August","2021","2021-10-29");
INSERT INTO accomplishment_task VALUES("40","0000000018","2018-00001","Hi2","August","2021","2021-10-29");
INSERT INTO accomplishment_task VALUES("41","0000000019","2021-00001","Task 1","October","2021","2021-11-02");
INSERT INTO accomplishment_task VALUES("42","0000000019","2021-00001","Task 2","October","2021","2021-11-02");



CREATE TABLE `accre_files` (
  `org_id` int(16) NOT NULL,
  `org_name` varchar(50) NOT NULL,
  `Org_President_Governor` varchar(30) NOT NULL,
  `Org_Adviser` varchar(50) NOT NULL,
  `Type` varchar(25) NOT NULL,
  `AccomRep` varchar(50) NOT NULL,
  `AFS` varchar(50) NOT NULL,
  `Lists_officers` varchar(50) NOT NULL,
  `Lists_members` varchar(50) NOT NULL,
  `Aff_adviser` varchar(50) NOT NULL,
  `Aff_high_officer` varchar(50) NOT NULL,
  `AFP` varchar(50) NOT NULL,
  `CBL_logo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `activity_log` (
  `User_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) NOT NULL,
  `User_type` varchar(50) NOT NULL,
  `IP_address` varchar(50) NOT NULL,
  `Date_Time` datetime NOT NULL,
  `Activity` varchar(50) NOT NULL,
  PRIMARY KEY (`User_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `alumni` (
  `registration_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `date_verified` date DEFAULT NULL,
  PRIMARY KEY (`registration_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_alumni_course1_idx` (`course_id`),
  CONSTRAINT `fk_alumni_course1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO alumni VALUES("1","123","5","Ginny","Weasley","","","ginny@gmail.com","09632524125","2020-2021","1234","?","?","2021-07-28","2021-07-28");



CREATE TABLE `announcements` (
  `announcement_id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL,
  `_date` date NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`announcement_id`),
  KEY `fk_announcements_staff1_idx` (`staff_id`),
  CONSTRAINT `fk_announcements_staff1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `date_received` varchar(45) DEFAULT NULL,
  `appointment_date` date DEFAULT NULL,
  `time_from` time DEFAULT NULL,
  `time_to` time DEFAULT NULL,
  `meeting_link` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `approve_funded` (
  `org_name` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
  `org_pres_gov` varchar(25) NOT NULL,
  `org_adviser` varchar(25) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `chk_intake_q6` (
  `chk_q6_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `relational_stress` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`chk_q6_id`),
  KEY `fk_intake_id` (`intake_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `clinic_certificate_requests` (
  `request_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `others_loc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`request_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




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
  `patinfo_status` int(11) NOT NULL DEFAULT 0,
  `lab_tests` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `clinic_patient_info_female` (
  `patient_id` varchar(11) NOT NULL,
  `mens_age_start` varchar(45) DEFAULT NULL,
  `mens_regular` varchar(45) DEFAULT NULL,
  `mens_irregular` varchar(45) DEFAULT NULL,
  `dysmenorrhea` varchar(20) DEFAULT NULL,
  `pms` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`patient_id`),
  KEY `fk_clinic_patient_info_female_clinic_patient_info1_idx` (`patient_id`),
  CONSTRAINT `fk_clinic_patient_info_female_clinic_patient_info1` FOREIGN KEY (`patient_id`) REFERENCES `clinic_patient_info` (`patient_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `college` (
  `college_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`college_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO college VALUES("1","CTET","College of Teacher Education and Technology","Active");
INSERT INTO college VALUES("2","CARS","College of Architecture and Related Sciences","Enabled");
INSERT INTO college VALUES("3","College of Arch and ","CARD","Active");
INSERT INTO college VALUES("4","CE","College of Engineering Tagum Mabini","Enabled");



CREATE TABLE `complaint` (
  `Complaint_ID` int(11) NOT NULL AUTO_INCREMENT,
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
  `Status` varchar(50) NOT NULL,
  PRIMARY KEY (`Complaint_ID`),
  KEY `complaint_idfk_1` (`Student_id`),
  CONSTRAINT `complaint_idfk_1` FOREIGN KEY (`Student_id`) REFERENCES `student` (`Student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `consultation` (
  `id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `patient_id` varchar(11) NOT NULL,
  `consultation_type` int(10) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `communication_mode_first_option` varchar(45) DEFAULT NULL,
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
  `school_year` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_consultation_clinic_patient_info1_idx` (`patient_id`),
  KEY `fk_consultation_type_idx` (`consultation_type`),
  KEY `fk_staff` (`staff_id`),
  CONSTRAINT `fk_consultation_clinic_patient_info1` FOREIGN KEY (`patient_id`) REFERENCES `clinic_patient_info` (`patient_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_consultation_type` FOREIGN KEY (`consultation_type`) REFERENCES `consultation_type` (`type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_staff` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `consultation_details` AS select `c`.`id` AS `consultation_id`,`c`.`patient_id` AS `patient_id`,`FULLNAME`(`pt`.`first_name`,`pt`.`middle_name`,`pt`.`last_name`,'','','','firstname_first') AS `name`,`pt`.`email_add` AS `email_add`,`pt`.`age` AS `age`,`pt`.`sex` AS `sex`,`pt`.`address` AS `address`,`pt`.`phone_number` AS `phone_number`,`pt`.`course_department` AS `course_department`,`pt`.`type` AS `user_type`,`c`.`consultation_type` AS `consultation_type`,`c`.`communication_mode` AS `communication_mode`,`c`.`patient_type` AS `patient_type`,`c`.`problems` AS `problems`,`c`.`date_filed` AS `date_filed`,`c`.`tooth` AS `tooth`,`c`.`surface` AS `surface`,`c`.`status` AS `consultation_status`,`c`.`date_received_by_nurse` AS `date_received_by_nurse`,`c`.`appointment_date` AS `appointment_date`,`c`.`appointment_timefrom` AS `appointment_timefrom`,`c`.`appointment_timeto` AS `appointment_timeto`,`c`.`appointment_meetinglink` AS `appointment_meetinglink`,`c`.`diagnosis` AS `diagnosis`,`c`.`treatment` AS `treatment`,`c`.`prescription_details` AS `prescription_details`,`c`.`prescription_date_issued` AS `prescription_date_issued`,`c`.`remarks` AS `remarks`,`s`.`staff_id` AS `physician_staff_id`,`s`.`fullname` AS `physician_fullname`,`s`.`license_number` AS `license_number` from ((`consultation` `c` join `patient_list` `pt` on(`pt`.`patient_id` = `c`.`patient_id`)) join `staffdetails` `s` on(`s`.`staff_id` = `c`.`staff_id`));




CREATE TABLE `consultation_type` (
  `type_id` int(10) NOT NULL AUTO_INCREMENT,
  `consultation_type` varchar(100) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(10) NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO consultation_type VALUES("2","Dental Consultation","2021-07-19 10:30:59","Active");
INSERT INTO consultation_type VALUES("3","Medical Consultation","2021-07-19 10:31:06","Active");



CREATE TABLE `counselling_evaluation` (
  `counsel_eval_id` int(11) NOT NULL AUTO_INCREMENT,
  `Student_id` varchar(10) NOT NULL,
  `eval_date` date DEFAULT NULL,
  `eval_code` varchar(100) DEFAULT NULL,
  `radio_q1` varchar(100) DEFAULT NULL,
  `radio_q2` varchar(100) DEFAULT NULL,
  `radio_q3` varchar(100) DEFAULT NULL,
  `comments` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`counsel_eval_id`),
  KEY `fk_studeval_id` (`Student_id`),
  CONSTRAINT `fk_studeval_id` FOREIGN KEY (`Student_id`) REFERENCES `student` (`Student_id`) ON DELETE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `course` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `college_id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `name` varchar(150) NOT NULL,
  `major` varchar(150) DEFAULT NULL,
  `student_type` varchar(45) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`course_id`),
  KEY `fk_course_college1_idx` (`college_id`),
  CONSTRAINT `fk_course_college1` FOREIGN KEY (`college_id`) REFERENCES `college` (`college_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

INSERT INTO course VALUES("1","2","BSABE","Bachelor of Science in Agricultural and Biosystems Engineering","Moli","Graduate","Disabled");
INSERT INTO course VALUES("2","1","BEED","Bachelor of Elementary Education","","Undergraduate","Active");
INSERT INTO course VALUES("3","1","BSNED","Bachelor of Special Needs Education","","Undergraduate","Active");
INSERT INTO course VALUES("4","1","BECE","Bachelor of Early Childhood Education","","Undergraduate","Active");
INSERT INTO course VALUES("5","1","BSEE","Bachelor of Secondary Education","Major in English","Undergraduate","Active");
INSERT INTO course VALUES("6","1","BTVTE","Bachelor of Technical-Vocational Teacher Education","","Undergraduate","Active");
INSERT INTO course VALUES("7","1","BSIT","Bachelor of Science in Information Technology","Major in Information Security","Undergraduate","Active");
INSERT INTO course VALUES("8","1","DEEM","Doctor of Education in Educational Management","","Graduate","Active");
INSERT INTO course VALUES("9","1","ME","Master of Education","","Graduate","Active");
INSERT INTO course VALUES("10","1","MELT","Master of Education in Language Teaching","","Graduate","Active");
INSERT INTO course VALUES("11","2","BSA","Bachelor of Science in Agriculture","","Undergraduate","Active");
INSERT INTO course VALUES("12","1","BSEM","Bachelor of Secondary Education","Major in Math","Undergraduate","Active");
INSERT INTO course VALUES("13","1","BSTB","Bachelor of Tu Ber","Major in English","Graduate","Active");
INSERT INTO course VALUES("15","4","BSCE","Bachelor of Science in Civil Engineer","CAD","Undergraduate","Active");



CREATE TABLE `department` (
  `dept_id` int(11) NOT NULL AUTO_INCREMENT,
  `college_id` int(11) DEFAULT NULL,
  `dept_head` int(11) DEFAULT NULL,
  `dept_name` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`dept_id`),
  KEY `fk_department_college1_idx` (`college_id`),
  CONSTRAINT `fk_department_college1` FOREIGN KEY (`college_id`) REFERENCES `college` (`college_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

INSERT INTO department VALUES("1","1","0","IT Department","Active");
INSERT INTO department VALUES("2","2","0","Ag-Eng Department","Active");
INSERT INTO department VALUES("3","1","","Special Needs Dept","Active");
INSERT INTO department VALUES("4","1","","English Department","Active");
INSERT INTO department VALUES("5","1","","Elementary Education Department","Active");
INSERT INTO department VALUES("9","4","0","Engineers","Active");



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
  `prev_total_units` int(11) DEFAULT NULL,
  PRIMARY KEY (`Student_id`),
  KEY `Student_id` (`Student_id`),
  CONSTRAINT `Emergency_Contact_ibfk_1` FOREIGN KEY (`Student_id`) REFERENCES `student` (`Student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO emergency_contact VALUES("2018-00001","fsdf","fsdf","A Mother","","fsdf","fasd","fsdf","fsdf1","fsdf","fds","fsdf","fsd","","0","0");
INSERT INTO emergency_contact VALUES("2018-00123","Parents","NULL","NULL","NULL","NULL","NULL","Aline Penhallow","Consul","Tagum City","09123456789","","","NULL","","");
INSERT INTO emergency_contact VALUES("2019-00101","Parents","NULL","NULL","NULL","NULL","NULL","Mother niya","Shadowhunter","Idris","09125412541","","","NULL","","");
INSERT INTO emergency_contact VALUES("2021-00001","Parents","NULL","NULL","NULL","NULL","NULL","Mother ni Aelin","Selfasdfasd","A City","09325622151","","","NULL","","");
INSERT INTO emergency_contact VALUES("2021-00002","Mother","","","","","","Samuel Mother","Cook","Tagum City","09412551412","","","","","");
INSERT INTO emergency_contact VALUES("2021-00003","Parent","","","","","","Mr. Green","Doctor","Long Island","09652441421","","","","","");
INSERT INTO emergency_contact VALUES("2021-00004","Parent","","","","","","Mr. Bing","Showgorl","Las Vegas","09233652211","","","","","");



CREATE TABLE `enrollment_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Student_id` varchar(10) NOT NULL,
  `schoolyear` varchar(45) NOT NULL,
  `semester` varchar(45) NOT NULL,
  `student_yearlevel` varchar(45) NOT NULL,
  `subject_code1` varchar(15) DEFAULT NULL,
  `units1` int(1) DEFAULT 0,
  `grade1` double DEFAULT NULL,
  `subject_code2` varchar(15) DEFAULT NULL,
  `units2` int(1) DEFAULT 0,
  `grade2` double DEFAULT NULL,
  `subject_code3` varchar(15) DEFAULT NULL,
  `units3` int(1) DEFAULT 0,
  `grade3` double DEFAULT NULL,
  `subject_code4` varchar(15) DEFAULT NULL,
  `units4` int(1) DEFAULT 0,
  `grade4` double DEFAULT NULL,
  `subject_code5` varchar(15) DEFAULT NULL,
  `units5` int(1) DEFAULT 0,
  `grade5` double DEFAULT NULL,
  `subject_code6` varchar(15) DEFAULT NULL,
  `units6` int(1) DEFAULT 0,
  `grade6` double DEFAULT NULL,
  `subject_code7` varchar(15) DEFAULT NULL,
  `units7` int(1) DEFAULT 0,
  `grade7` double DEFAULT NULL,
  `subject_code8` varchar(15) DEFAULT NULL,
  `units8` int(1) DEFAULT 0,
  `grade8` double DEFAULT NULL,
  `subject_code9` varchar(15) DEFAULT NULL,
  `units9` int(1) DEFAULT 0,
  `grade9` double DEFAULT NULL,
  `gwa` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_index` (`Student_id`,`schoolyear`,`semester`),
  KEY `fk_enrollment_list_student1_idx` (`Student_id`),
  CONSTRAINT `fk_enrollment_list_student1` FOREIGN KEY (`Student_id`) REFERENCES `student` (`Student_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `forgot_pass_requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(10) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO forgot_pass_requests VALUES("1","2018-00001","Request Delivered");



CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `gmc_request` AS select `gm`.`request_id` AS `request_id`,`a`.`id` AS `userid`,`a`.`course_id` AS `course_id`,`a`.`first_name` AS `first_name`,`a`.`last_name` AS `last_name`,`a`.`middle_name` AS `middle_name`,`a`.`suffix` AS `suffix`,`a`.`email_add` AS `email_add`,`a`.`contact` AS `contact`,`a`.`last_sy_attended` AS `last_sy_attended`,date_format(`gm`.`date_requested`,'%M %d, %Y') AS `date_requested`,`gm`.`or_no` AS `or_no`,`gm`.`purpose` AS `purpose`,`gm`.`or_pic` AS `or_pic` from (`alumni` `a` join `good_moral_requests` `gm` on(`gm`.`requested_by` = `a`.`id`)) union select `gm`.`request_id` AS `request_id`,`s`.`Student_id` AS `userid`,`s`.`course_id` AS `course_id`,`s`.`first_name` AS `first_name`,`s`.`last_name` AS `last_name`,`s`.`middle_name` AS `middle_name`,`s`.`suffix` AS `suffix`,`s`.`email_add` AS `email_add`,`s`.`phone_number` AS `contact`,`gm`.`last_sy_attended` AS `last_sy_attended`,date_format(`gm`.`date_requested`,'%M %d, %Y') AS `date_requested`,`gm`.`or_no` AS `or_no`,`gm`.`purpose` AS `purpose`,`gm`.`or_pic` AS `or_pic` from (`student` `s` join `good_moral_requests` `gm` on(`gm`.`requested_by` = `s`.`Student_id`));

INSERT INTO gmc_request VALUES("2","123","5","Ginny","Weasley","","","ginny@gmail.com","09632524125","2020-2021","October 28, 2021","2","sdasd","null");
INSERT INTO gmc_request VALUES("1","2018-00001","2","Aelin","Galathynius","","","hannajanebw11@gmail.com","09111111111","2021-2022","October 27, 2021","1","asdfd","");
INSERT INTO gmc_request VALUES("3","2021-00001","2","Lisandra","Arachnid","","","hannajanebw11@gmail.com","09111111111","2021-2022","October 28, 2021","10021","dsddsd","");



CREATE TABLE `good_moral_requests` (
  `request_id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `last_sy_attended` varchar(10) DEFAULT NULL,
  `requested_by` varchar(11) NOT NULL,
  `date_requested` date NOT NULL,
  `or_no` varchar(45) NOT NULL,
  `purpose` varchar(150) NOT NULL,
  `or_pic` blob DEFAULT NULL,
  PRIMARY KEY (`request_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO good_moral_requests VALUES("0000000001","2021-2022","2018-00001","2021-10-27","1","asdfd","");
INSERT INTO good_moral_requests VALUES("0000000002","2021-2022","123","2021-10-28","2","sdasd","null");
INSERT INTO good_moral_requests VALUES("0000000003","2021-2022","2021-00001","2021-10-28","10021","dsddsd","");



CREATE TABLE `grantee_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(10) DEFAULT NULL,
  `program_id` int(11) DEFAULT NULL,
  `student_status` int(11) DEFAULT NULL,
  `record_status` tinyint(4) DEFAULT NULL,
  `semester_year` varchar(45) DEFAULT NULL,
  `semester` varchar(20) DEFAULT NULL,
  `year` varchar(45) DEFAULT NULL,
  `status_allowance` varchar(15) DEFAULT NULL,
  `allowance_set_date` date DEFAULT NULL,
  `status_billing` varchar(15) DEFAULT NULL,
  `billing_set_date` date DEFAULT NULL,
  `status_payroll` varchar(15) DEFAULT NULL,
  `payroll_set_date` date DEFAULT NULL,
  `status_liquidation` varchar(15) DEFAULT NULL,
  `liquidation_set_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_index` (`student_id`,`semester_year`,`program_id`) USING BTREE,
  KEY `fk_student_id_idx` (`student_id`),
  KEY `fk_student_status_idx` (`student_status`),
  KEY `fk_program_id_idx` (`program_id`),
  CONSTRAINT `fk_program_id` FOREIGN KEY (`program_id`) REFERENCES `scholarship_program` (`program_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_student_id` FOREIGN KEY (`student_id`) REFERENCES `student` (`Student_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_student_status` FOREIGN KEY (`student_status`) REFERENCES `student_status` (`status_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `group_guidance` (
  `grp_guidance_id` int(11) NOT NULL AUTO_INCREMENT,
  `appointment_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `year_level` varchar(20) DEFAULT NULL,
  `section` varchar(20) DEFAULT NULL,
  `topic` varchar(100) DEFAULT NULL,
  `meet_link` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`grp_guidance_id`),
  KEY `fk_apt_gg` (`appointment_id`),
  KEY `fk_cid_gg` (`course_id`),
  CONSTRAINT `fk_apt_gg` FOREIGN KEY (`appointment_id`) REFERENCES `guidance_appointments` (`appointment_id`) ON DELETE NO ACTION,
  CONSTRAINT `fk_cid_gg` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `guidance_appointments` (
  `appointment_id` int(11) NOT NULL AUTO_INCREMENT,
  `status_id` int(11) DEFAULT NULL,
  `mode_id` int(11) DEFAULT NULL,
  `date_filed` date DEFAULT NULL,
  `appointment_date` date DEFAULT NULL,
  `appointment_time` time DEFAULT NULL,
  `date_completed` date DEFAULT NULL,
  PRIMARY KEY (`appointment_id`),
  KEY `fk_status_id` (`status_id`),
  KEY `fk_mode_id` (`mode_id`),
  CONSTRAINT `fk_mode_id` FOREIGN KEY (`mode_id`) REFERENCES `mode_of_communication` (`mode_id`) ON DELETE NO ACTION,
  CONSTRAINT `fk_status_id` FOREIGN KEY (`status_id`) REFERENCES `_status` (`status_id`) ON DELETE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `indv_counselling` (
  `counselling_id` int(11) NOT NULL AUTO_INCREMENT,
  `appointment_id` int(11) DEFAULT NULL,
  `intake_id` int(11) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `eval_status` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`counselling_id`),
  KEY `fk_counsel_apt_id` (`appointment_id`),
  KEY `fk_counsel_intake_id` (`intake_id`),
  CONSTRAINT `fk_counsel_apt_id` FOREIGN KEY (`appointment_id`) REFERENCES `guidance_appointments` (`appointment_id`) ON DELETE NO ACTION,
  CONSTRAINT `fk_counsel_intake_id` FOREIGN KEY (`intake_id`) REFERENCES `intake_form` (`intake_id`) ON DELETE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `intake_form` (
  `intake_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `date_completed` date DEFAULT NULL,
  `date_verify` date DEFAULT NULL,
  PRIMARY KEY (`intake_id`),
  KEY `fk_stud_id` (`Student_id`),
  KEY `fk_int_status_id` (`status_id`),
  CONSTRAINT `fk_int_status_id` FOREIGN KEY (`status_id`) REFERENCES `_status` (`status_id`) ON DELETE NO ACTION,
  CONSTRAINT `fk_stud_id` FOREIGN KEY (`Student_id`) REFERENCES `student` (`Student_id`) ON DELETE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `job_hiring_announcement` (
  `requisition_id` int(10) unsigned NOT NULL,
  `title` varchar(45) NOT NULL,
  `office` varchar(150) NOT NULL,
  `content` varchar(255) NOT NULL,
  `date_posted` varchar(45) NOT NULL,
  `posted_by` int(11) NOT NULL,
  PRIMARY KEY (`requisition_id`),
  KEY `fk_job_hiring_announcement_requisition_form1_idx` (`requisition_id`),
  KEY `fk_staff_id_idx` (`posted_by`),
  CONSTRAINT `fk_requisition_id` FOREIGN KEY (`requisition_id`) REFERENCES `requisition_form` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_staff_id` FOREIGN KEY (`posted_by`) REFERENCES `staff` (`staff_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO job_hiring_announcement VALUES("31","Job Hiring","IT Department","Student/s needed: 
 		1
Length of service: 
 		3 months 
Qualifications: 
 		 > 	Quali 1
 		 > 	Quali 2
Special Skill:
 		 > 	SS 1","2021-10-31","1000000001");
INSERT INTO job_hiring_announcement VALUES("32","Job Hiring","Elementary Education Department","Student/s needed:  1 Length of service: 2 months  Qualifications:  > 	Data Encoder > 	hawd musayaw  Special Skill: > 	Fast typer","2021-10-31","1000000001");



CREATE TABLE `list_of_semester` (
  `semester_id` int(11) NOT NULL AUTO_INCREMENT,
  `semester` varchar(20) NOT NULL,
  `year` varchar(20) NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`semester_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO list_of_semester VALUES("1","1st Semester","2021-2022","Active");



CREATE TABLE `list_of_subjects` (
  `subject_id` int(5) NOT NULL AUTO_INCREMENT,
  `subject_code` varchar(20) NOT NULL,
  `subject_description` varchar(50) NOT NULL,
  `subject_unit` int(10) NOT NULL,
  `course` int(11) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `year` varchar(10) NOT NULL,
  PRIMARY KEY (`subject_id`),
  KEY `fk_list_of_subjects_course1_idx` (`course`),
  CONSTRAINT `fk_list_of_subjects_course1` FOREIGN KEY (`course`) REFERENCES `course` (`course_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

INSERT INTO list_of_subjects VALUES("1","GE 111","Purposive Communication","3","7","1","1");
INSERT INTO list_of_subjects VALUES("2","GE 112","Mathematics in the Modern World","3","7","1","1");
INSERT INTO list_of_subjects VALUES("3","IC111","Programming Paradigm 1","3","7","1","1");
INSERT INTO list_of_subjects VALUES("4","IC112","Professional Ethics in Computing","3","7","1","1");
INSERT INTO list_of_subjects VALUES("5","IC113","Probability and Statistics for Computing","3","7","1","1");
INSERT INTO list_of_subjects VALUES("6","PE 111","Movement Enhancement","2","7","1","1");
INSERT INTO list_of_subjects VALUES("7","NSTP 111","National Service Training Program 1","3","7","1","1");
INSERT INTO list_of_subjects VALUES("8","GE 113","Understanding the Self","3","7","2","1");
INSERT INTO list_of_subjects VALUES("9","GE 114","Ethics","3","7","2","1");
INSERT INTO list_of_subjects VALUES("10","IC 124","Programming Paradigm 2","3","7","2","1");
INSERT INTO list_of_subjects VALUES("11","IC 125","Discrete Math","3","7","2","1");
INSERT INTO list_of_subjects VALUES("12","IC 126","Interaction Design","3","7","2","1");
INSERT INTO list_of_subjects VALUES("13","IT 121","Technopreneurship","3","7","2","1");
INSERT INTO list_of_subjects VALUES("14","PE 122","Fitness Exercise","2","7","2","1");
INSERT INTO list_of_subjects VALUES("15","NSTP 122","National Service Training Program 2","3","7","2","1");



CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `login_credentials` AS select `studentdetails`.`student_id` AS `username`,`studentdetails`.`fullname` AS `name`,`studentdetails`.`password` AS `password`,'Student' AS `usertype`,`studentdetails`.`pic` AS `userpic`,`studentdetails`.`org_id` AS `student_org`,`studentdetails`.`position` AS `student_position`,`SF_CHECK_SCHOLARSHIP_STATUS`(`studentdetails`.`student_id`) AS `scholarship_status`,`SF_CHECK_STUDENT_LABOR_STATUS`(`studentdetails`.`student_id`) AS `sl_status`,NULL AS `staff_office`,NULL AS `staff_position`,`studentdetails`.`verified_status` AS `verified_status`,`studentdetails`.`account_status` AS `account_status`,1 AS `access_level`,`studentdetails`.`e_signature` AS `e_signature`,`studentdetails`.`patinfo_status` AS `patinfo_status` from `studentdetails` union select `staffdetails`.`staff_id` AS `username`,`staffdetails`.`fullname` AS `name`,`staffdetails`.`password` AS `password`,`staffdetails`.`type` AS `usertype`,`staffdetails`.`pic` AS `userpic`,NULL AS `student_org`,NULL AS `student_position`,NULL AS `scholarship_status`,NULL AS `sl_status`,`staffdetails`.`office_name` AS `staff_office`,`staffdetails`.`position` AS `staff_position`,`staffdetails`.`verified_status` AS `verified_status`,`staffdetails`.`account_status` AS `account_status`,`staffdetails`.`access_level` AS `access_level`,`staffdetails`.`e_signature` AS `e_signature`,`staffdetails`.`patinfo_status` AS `patinfo_status` from `staffdetails` union select `superadmin`.`username` AS `username`,NULL AS `name`,`superadmin`.`password` AS `password`,'SUPERADMIN' AS `usertype`,NULL AS `userpic`,NULL AS `student_org`,NULL AS `student_position`,NULL AS `sscholarship_status`,NULL AS `sl_status`,NULL AS `staff_office`,NULL AS `staff_position`,NULL AS `verified_status`,NULL AS `account_status`,1 AS `access_level`,NULL AS `e_signature`,0 AS `patinfo_status` from `superadmin`;

INSERT INTO login_credentials VALUES("2018-00001","Aelin Galathynius","1234","Student","�PNG

\0\0\0
G<��Wr�i���=���˥��bƬ�_WE�}5�K����s��!��!���J�&q����S��F`zf\0����X`4���\'.%)!�KARJ*��J)RR���$���	��V\"��̣�-�@�rƒ����������[k�֐���1�^j�-�`%�/峾Q/T�����9�	1����r�G�`�����5-��(��S�J�\\�z>����bAZJj����hP�j�Ѡ��S���R��$!$�B
!dtg��Y�[�s�����otХU1��km>\"��1�MkѪCզ5�:�%i7�N�1���z`��Ѹ1����
!\"�L�>VY� Y_��7X���5O��>Xm�
zB�Zm�h�iӚ
:6�~��!�7!F�͍-HN\03�rj���p`.���br,ΌX��~\\��}j�~Dn�����f7�ɛ�F�\\�R�P�x��Z��1�n
C�rP�/
rEP`c/���\'a�{2�!�77�l��!�Q0�
n�@_�S�����_���(=@\\�3�y����ہ�))�O�[2if�v��	%��%�\\Tx�NDGl�������\0�r��5@_7�_\0ۥ�y�X��|N=�ϳ)�Ia���\\���lJ1B|;Fo�D?kN\0��与B�8c��}|!��� ��;�f��K)%�+=��� 6۠�[.f
��ۗ������Fb};Fo��DSja��b����q~�=�)� �2�}_xB���$�H\\�0a�8R�tD��z6�x
�mt�,�9�5%�O ��KFD��ї���Ek�4��\\V=W(Z�ȓ�&�f���J��)yۂ�ޫ#x}��A� �����|���A	)�5�d�T��K�
%e�ZU����[Ԇ���hGl�V�x5$,U�,5�
��k����ld6r-��%� ��Io����#6Q��:����vM�EٌZ�����{7�����yw��|�M��ǎ���ά�w㏮�hܔ�~h�1ǘ9
�_*e�x1�@���Ar}Q�v�WA��R5�R5�R=�P;͒cI�[�U��b�e�*�*�.
�yGD�Z��d�(�!H��3���M~%�8:��l�i���{�֔�XA��zg�B���\\P��0�Ȋ�68�}�}Y���WSjj9���<���2����gt��F��&�����Y������{c�Ϣ�M$&v
����s20nz<����=��Fy�h��Z�WT��Q�|st\0;L3�@Mz�%�d�׀�r�X2��F]��!�
⵶��ȣ����#1;P�E�;]p�Wq�TѺ�����si�]���h��B���h��i��r�t��[�F�@�,F^��n+��_��N!IWr@�¾P(��2��\'s���ax2pSJ��rZ�8B|�/F��E��6���^(�ڞ�\\ѰK\"���z�xR�R��q�}�w��P1g-m~D��Ly����сpdPt���AE볒�e�����5�b��OG�Q��0Ad�)Y~���-�k�5g�e{�nC�W[��.���?/
��Kr��i�ǫ,�1�<KD:d�WA�˹�
L�I�w)9jG\\R�e�n�Hփ���&�5�d���0��B��j�Y��Oov\\��[:ˮv�e��C*�Z��g��QqLq���p����E��	~L�R[�QU��L��7�}xF�Á��J�<���Q������v���PDD7���~cO������

���hK��ҽJ�%OFXS��S���8�ye%����P�������T�%���]S7�8b�$�n�~�!��G]�\\��79��n���!a��TQ�,F�k�
6>&Yq�Ba��1��{+�x�\"�����0P��3ƐR~���=)�Ϯ������#�ԗ�Z_-:b�
���Bd���k��Cc#ˬ�PR;#d�BͲ��cd5��K2��0�\0M��s\"��VQv��Lm�����\\�6�,ظX����?:W!�U�.�Q�▷���ZK��%,�8-F����&j\\�6QoI�Cz��r���e��kn�~
|)$Viy�7>K�n?ր�iU�f
����L��9��Nψ�U�M���Zr���a��5�Ӝ��owD��.\'�UG���E�V�%����!�d	zĖ��>nm�*A�lK�<�ڻ%~�Avmϻ���ɢvp9lD�%-�_a��n��$�\0�\0)\"���K6}��X
\'c�Y�J���&�K\"ik��*��I��Gv�Z�VĈ�74J[�Ɵ���X��a��}U5$�T�Ơض7�PP�i�if}PS쁖\'%|ףe�tbܸ#�]>��q�f�	?e���1��V�.�u���lm�\"\\�HҽZR?��0ϰ��>��}`��(�=k
BA�
�+,�������V��IGh��r�1r�mSt�c�����Z�t�q�p�N��󝐠;��\"_(X~�b]�]F�荨E׿���[҃X������XM��,N�
��8b�Sn$З�K��4��d7
�>���c\\��8w����e�IL�����#�^|������?-d�A�}ʅ��ǵ�ѽ����]5?!����}�\'�,�������M��iƹ�%\"}����/���dLW��ڏ�qO
vù����a�-�a
�;�#�r�ɵ����J/g��>m+J.���d7
�b�7yT��%,��ԣi��n�a�k������R�v��f\'��=5/_���F�J�ZA�R� 5�ҳN,��N6ҽZ��c�K�m�,e=���jGY��گ��
:^rqę\'��V��u�3C��M��9>����3֒�rde�71��߶�Vl���B,��\"����d\\oĥu(ݢ:.�g{���&ϟ�Ն&�0]�e�0��#A�p:f�+,f((B�4�k���=�L?NS��E��22���u�[;�X=�qX�>u�U;�eMڀ�.�� GCń(���-��`�M�NF3X�Z����O�Xq��+i�l���lZ\"�\\�,�0箱_aI����r�Ș#�1{f�	s�ĥ���v���fu�r����K�-��f������t����S�+n?5%\"Sߡ���!�����3P3հ�Y!~�����}r-���L���\"{# �P��[���������ɔ����*�Ñ��d˩����?/s��d���ԙj�+gaE�r��	��.^�Wz�ֹ��M�(�b��Fv��(�hge,�A1��!
�	鈨����i�*�Iк�	p7�ʙҕ��e�Q�v6���ʮր��\'�Vܬh�g�|��?P.��+`����I&����?#�R��U�q��τ$j-�����Q,p�4�a=��s���\0�}���{�3^��5Ñ��p�6������V�ZD/���|ܝ��;�m�/=6<\"Yy�r���8J��pIk\\��v��jX��$��/<`B�.�ƣj�e��$\\�ۦ�M��rJ����a�I�0K.�Ȭw�Q��9�g�-��{^����-o#�V%_���j!���Z�Ay�Om�pW��Nȇ�=�����2�)@W@�KB�k=��6|Ge���[r{�$��
g���.��ǘ�
�Vw�,��4ζ9�tt�w����c0�-u�U���Jjk�V	�P�X��ץ�$���a���dpqA���9t�M(��j��4s�[���Mv�^�w��I\']�����WzN�3k���\'�꫍��/[[������Bc~����/&-<@�|�n�3%�/�7��nX�8Q�n��c�3�9A�r����C1n����[\\\\�����NWMQ.	����lzLR9Ѱӻ��ӑ���-Ȭs��S��e�u�ݢ��<���b�a�B��=
�p�TBHRJR!$UJ�����TJI�T$� %d���!��<װt�}?=�������|TfPc�0�dW�gBW
!\\ͨ�r�;U���ĥ�=��Ǘ
���_���pBD�=0�C!�zK�Y�i��5���������H�?\"m-]�ЮC6���A�� �#鲚�V��۰���BB�m 4[u��@�T�y>
˼υ��\\H��	_o?-6��d(�����\0��Ь5k������E����Ys��������*㨔�J�Ȥ�L�O\"�@�<dRaCqU\'���1=E���\"1��0�[�E��]ѹ�w�a�H�S�\\�H�j�4�cL�ǘ����4y�B!��h���a`�B+t:׷v��r�J���t-�ыi�D�	������cx�W>�}�4�W�� �
�����=�;N�Yv�\"Q�K���:�������?{<t�r���T������=�����!���P~��%bzoe�S�Nz��0�m�X���
^��Y�{H�q�I��~MU�D�}D�O�r��ba�ߔ@x
�(��N��M�v��c��R$�4��р�I�������ָ��b�͆�L�Y@w:r��rЕ��h��S�q��L���<R:�5e����O(���h���C���^���(d�i�/H�}o�\\���JI������\0�<z��#?�I4�~]b��i�����\0/	�Zx�o�;N���l�F+F�����=�������Oh���(��I�Jx
\'=��
�<W(�t6˪b�\\i���ߐ\"�T�ߐ«O\"*㈘DH��Z7)�$F��G�I�\'1=�/��{����m]����a���Lz$v�#1���٢�Z�O�(.*K�-�
k���J֛�2�m�3GB�wI��=�n��r;�Fתך�R��Ѐ���N����Ki?}16����Q�\'� �>&�Q�n����GG~	htG�pC��N�k� �ȾN*�R�L1;\'%%�(�ۮ�/���?.�7�câhJ�@/��\\t�U�i���]�X���?(���
h�;�R�rV�(=ُ��+l�>E�t$��ԱBgT۩\\\0�o�s�Y��}1��sVݮ�ჱ-�v�H�fM�M-<z��
�����_��&�Wa9��\0�\\;�uH���O�ZA�zK��`�V�u����`08f�`/lm6��s*&嗋Ɯϛ���*��-pm\\�]N�o�����D��y�
��������,\0~Sջ6�O�E&<l���RP���ۉ%�1��:h[�����|�C���\'ư�^�� �R�	�dLy��}	MJ�$)Q,����<<���h���@��٬a��\"c-,�%͂_N㬳&��?m�Wl��_�D��=�H�l@�c���a���X~6p�$��M��4��\"��FV���O���]SY;�i)\'�!�G4ֺ��;[:_�5��^��-I��q�U볒��
|�
2��Ɠ㴿$��.��1��������B�0��;�I�oF���
��ClR5������,]��ķ���k)l�\0p`E%�TT2����J|���ba������<�]�g��2�e)�櫗�����	��ǳ>�9��x�ky�in跟v��Z�2�4@Ơ�Y�u\'�	zr\0QI��a/l٤���<_����7�	OZ	�Gk�N�o�J���!�<	�tq��-���H�8W���O=_0p�OY�
±��[��Y�c�u�\\��`���7*�Đ���*.%Ky�����|⊪�ƒ�e\"�m;����I_�6k�h[�������Q|��]|��5aD&%�SJ��x��.N;�ey���[���<Ճ�{Aȅ^ȇ?�a��\"J�o�Z�R���Z��r9
�B9�g���<^~�e��k/�E7�\"-y��u����45�\\v�4�u\\=:k��
���Z�a��c��������R>Rh����~���	��vN݀p��	#	L:�1�MU:���t�5�]���	@jF=��ƣ�NVb���P�+�䗵���&����GF�61cvBK��`�-[t�FV]��X����k��W��K�?w
���?b)��Ձ�I�����QUUU��I)	Ðɓ\'s�u�Q]]͏~�#���J��x9�\'��P(�r�J�b��eK�|]����1��>��9?�D�Xg핎�A�ƒHJdZ��p�um\\��<�hP�vsq>Q�tz�b)�>����2�;rd�\'�L3XˌD��W�2#\'g�����4�S�1tn@�ν�W�.���>�M��K�[ܽ�Ǚ!�)�hh^p�;��k�ov�EFm�u�o3d7���o�	𴁔<Sț�Z6IOk�����;�L�纟��9�g~2�R}��[;��)ܗ�W�!���_��{�IK�[��f�e����Pn|�:�A���6��e�Zu��s�_{��\0�>E�^��Ձ6.�8���`�����s��|,ǿ���q1ȹ��5�,�l��x<���ϟ�����#k��)̘�&��������2��A��	&�d�������?�%�\\2�%������{we�=���T����2�)�eO����f
z�����*�YYM\\����b̂�نC/qu�ֺ��w~�g�bI�f��5�B����]?��*��٣�znv�@^��6g��7D����X��p����@��\\��������mh�\'ف]��]^�ZA\0�jr�:�K|�����!�F!�.�j�a�>St_���(�]�����.�A�	����?/r���-|�$�Թ���)���O�\\ؼ��a@��c�}��iu؂Ɔ�|�y�Pq�m��~�26^��G�r��4W��l�w7>����V)2-��K���ZCK�B!��ܟ�f������.�h\'n�j3�&�iP�.�} �D)U��})%�x��}����˖\\�PJ��Bb����r�-�P]�x�	��O�Hg�&U�Ed���%V��l[@P�uT-���~p>�~z4��i��3l��s/���@&�7��[����j�Ʌ�c+�~�,*��pCW\'?k�Ȋb�*)5L�ZK�K���c�-!]+������5���ҭ��p���}�1�sW�>����͐Y��[)(*�����5)�l[�9��P��WV{{$�:�������kU����f!<%�d���b�)�����d��&�5.n�i���c�ۅ��~0���\\3e)��DCm�@�agK�sq6����W���_)%/�i�ȭݝ��Կg6�&���5a�)��d�C*A���
�	�wU�`!��j�3�xS�
�i��5=]�5��\\�x2�[?��x	��0j7SNr��\\0�#Kw}!�]���\\�������W���w�E׺ �d�r�Fz��AE�r1t�X�Gj��h�7�1���LԃC���\0P���ɡ�8��*�=�T3xF�/ܰ7����hAR1�͓�u�&��L{��!4�a@��$w��oS�s[`��K�
��a����FZ�
��*-�\\0�H7���s<��e�/�������!��ղ_y���*�dyP��-�.�7UPy��QiL>r��v��L��ޔ��M�s��GVç>9��]K�Rv��~n���0��+Z[~�������H)�৓9��c�@�G����I[R���&N:���38�M�4�G}����a��nɄ��{�1gn�|Vo�X�}�_�q��|���x��?u,?��D��=�!R�A�#%��Jz>`��~��
����t;D7��	�bҕ,�0vC�������P��ʥ��{|%dϳB򭮦�K�^��B�r���Xv���SJ�­%�,���y�y���I�;0��IUvd�S����Rh��������e��\0*j����8�6���M#���O��ێ料����im��h*vn\"��x�x���Jn�Ș�&X�I�⍘��T��}\'�ⓟ\\?7��ᬺ��{8�K/s��]����>�9�#��X��B�}AsK�n�=��ME�z}�����Z~�\\���̜����w!ș-�e�L�G�K���g�a�NI.��NrD-AgH��2J1�dZ�/X����v����W!�pz�u����Z�er�̢5�,^�����\\U�n�Ƞ�y	�g���PH�*��gz��I�ZX��0G���N�����^���b�.F��ɳq����)	��H6�ϡ�/
��ܔ�����HK�a;�>d�v�])>�E�c�?��
z��XfNO���O�ߟ��uq���H�z����RF6��+��yS��]�z�R�<c
�n�]�TK�Ζ���p-�
Q$\"�r�j�|�0�@��(R3�R��R���0�v��K�[����XC��w��_�-w4)�Ы��q�i��~�26^�$=�娅i���Y<p�|N��X�k=2-���~�dD_���.��Zv��1��Λʭ��eάTov+n�-�Z��/���wu��s��˧�������K�Rj�\'?��;�SO�S#%\\���X����΢�u��֞�?=o*�ܺR�!G-�˧/��aY{��o��2�6���m�\\u�\\�g���h���h��3��ǳ��\\�4黕������B��U�ErR
ĉ5�\")������!I���aG��I��%�c�r�\'���_oh\"�^խ�L��=%d������U��6hY*Y}�d���\\+�+�KQ��f��]sй�������F��!$�RL#c��7�|.OrB5G��zՕ�u��s
BC�����6`��sǽ��O~l�_	�����vT�X��Oe��˸��=���>�9�
�~u�z�8k����d>��1H%�t���<�%Y����<�M���؃�3\'E!k��w,���ʤW\"��\'�t�R*++9묳8��s˄\'��ZK*)���Y���\\�F*Q�}�₃}�\'�ΰ���L�����[%j�-�/�m��=��q|�[IU(2�6�HJ��ZH&$\"�h�P�׶q�ky�,�H�>���5�h\0Q�8�tsz3���積H)�pM��+���J����z�g������h~B��Iz� u�y����Y��e��g%c�1���+n�����@��Q�V�]���n���J�!Y�����J^���c���	յ�ۘCB:�{�����X,���oT��K�mv&|�$���5c��TNpJ��I��#�XU$1�܀|�{;~i����|�}���މ�ȮMk.hkfM�@�cI�3޽ݵ�H
_�y��y2�6���?���$����\\M��ַ�XJV]��s�Uw�,<���ϟ�λW��1�n��В������\'^��L�ߚ@�9@HA,!����ȥ��R��/	�sg��$�r�T�%K���/Fݑ�1c���|�cMd��~�9�-�J�SOd�������o�K�g�����.��^Ź�e֌��jZ�����ێ�%^��ح���.��z����5q�VO�nMx�+0���!�̃k�yt-�PM=GWT�5����$����^�Nq��c�S�f5�ຫTM��yV���jTܲ�6�#�x���Gk^��ǭ���+os����B^�ײI�֞�h��(�\'\01�k�&�������B���l�Hk�h��R�{���ҿ��ő�m�K>��d������פ�X
��/�x�\"���b�l��
��-�]�֜߶�u�\"U{�\'�ϸh������]O6S|f#\0���ӟ�;�VG�Zd��A!
�8��\0��l=g|e9Z[���>��1xQ�`�Y}ۉ4��47�]�8�&�y�y���!\\�F����s��gxyy�_/����{���)|�K��i�$:0T4����V����O�s_G��\"�7<{��ۋW)�O��/-�s����7&��t֞�.n+�/J	��
�e��=�����m�#k����=��O�F�{��G��
�ے�
������$׿?�z���P*�)t��S4�}? ^cy�\"����{��JjJZ>`����6���[[x1��r�1����(Px���s-����:1_0��#_�.>[$\"�3��,��|�Dx��Rܺ1OP_��ɘr_�~�XԲI1p)�����	eՕ����/Y9���XZ�BW�sUZQU%���ê�(��x���[��XD��j6ܵ�����^����L������/���֦W
e�EH�鴢�S�q�$fԓ�?����Ck�Y�%%��5�g2�PMo��k��6I�R��.��:����.�OZVޮx�l���
�5�:��cx�ߊ�,�0�c�~��J�����i��Z��{<����,�6m`MPli�y-��t�_k�⍞Z&]���)?�O��̊\'dv+���F��t������z��t�%�]K�D�e�o��=%d�풵���W��k�6J�������Mj�	�)Y^]��&�Llɪ2��Б@l�R�ߖN~8U)՞�D.UO�2�����a�N������-=�=ڹ�U�U�hm��.q��װ�PmO�w�V�
��ʣ��jw\\��Qļτ�����	���G��y�_j�=�$���=�)9\'����s��&��N
+x�����\0��}ra��C*��8?�z��~��}���t�,���0���M���*�H<�FpjsO_�1�pCӞ�q�V�<�ξ�H�߻;������jROv5��P�܋���,Օ5�שּ���m^ť�J���$\'4�c@l1$��DL&���~�����G��n���*\\<o챆���d7
���S���f%7�B���WZ�ߠ\\��j��|;�Ͱ��̀����������(/7�K\"�SU�_(�k�(~��y��7��\0�a����#ӕz���k��j����‟f���6�껥�8��k�E���9��},M{j�ߴ��_��uk��:;�צ�8bj�q�k)$Z�y���y�]hm�m�G0���uH<��������\"<ϋ��j*���)�v]���pF]c�<��h7,j����.�X}�b�n&���m6P�a;�3��{�%G��\"��9Y��W��X�VH��㹿�Q��:�-�/5�O�ɔY��|0��f�`)����F�t�ir�9����yް���vo�g��1�(��C
�l�{�ǭ��ѵ�etK�#�%+o�x\\.H����}U��\'����vx#,<�s�:�:����(�M�]	րJ8���O�~Y@�l�QWy��>�\\�\\cʊ���~�A&u�-�s]��Ε�gzKqe	����MA@�!S�\'W�*�A�-67(x衇������}�J����R�<${{@A��1���Zc��u��0�j7�RJ�y�|��_.���B`|%�&�}�2����x�gf,A�n�
����c����t�M��jU΀��Wo�o�r��å�mic[E
l>$1w�3Oϣ��m{+�lMZJ�m����\'CY{�D��7��eȬ<v���W*�����vx�����H��C��q�4�Y^�X��Mx�A���ãL��+����4l;�Ap�)1v?#d�C��C3fo��/_�h]*(t
¬��Ͱ���qT��^���P@Y�C�(��ƮN�iR�N�vcC,C)ŷǎg�T�ys�ZM��n��V(�	ԃ<`�����R��|�O�r3{�+_|1�sӦMۆ=�5P���ϟ���,����^�	���im�h�u
{�ka���
jTz�\\�W��%W�pOO7��lgN<�\'��	A��m�m���<����m���br,�g���آ��D^)!k	����cµ��CH�׵��l��s�,��c�
�����(�CjF���^[�+���a��t�a�eq.KG�F>W�H��1��F}`-<���1��5$�$�na�	\\���S,N�R��+�rR������=��^)������_\"��r�R`�!�Y�k��>��:��z���Y�ͬ��EH��{<y��.l&H~�!��1�H����}�P��h�p4��!�a��\"<	�Q�tӦL��%S��}9X�\'�U�n��E�\\��g��jQn-$��y���IXv	!X�_G�2N��ݯ���;�$?�WF�˶����b�s�7rj};��gt�|�:��b�=l�23\'&E�KLn萳�������]�������T֐�HK����
y��fx<�#�57�tqV�(Fy���\0o0�~DPJ���W�IhL$ܘaY{�{�9��z���ξ�OE�x�uJ�ѻ�� ���|!���J�r�0�Eʓ0�\"\"����{�tx�%�;Y
�p`*���\00���s\0����wV\\�֒���k-���-� ׿t��1���& �1�m>^\\�cv<�W���;�Y���y#�d�TI��l��5)x���[kT��c��>��U[7ww�Gq�����,�Rb���k��O[6r����H!�-�\"�������	!�<oП7���
��H�뺻TA�	�˾IcxV�-h��Z�c�x��8Y!A���t�C:n�\\F	�׉�Jz��t���8Y�p3d_g�/$P����|����w��@�_Jn��Mk>^[OL�}H�q)y\"��#�\"q�h�#!Yc�R���9.kk�Sk<!X���a�D��7�X>WnH�I�j&0�F��Ě:�L�(XKv;f��Bk��������˗s饗��-!Zk�R\\}��\\}��(��q:7�֕��w�yTUU��W�5̙3�^x���N|����=��#�\\�������ѣ9��^���F���I�5���^���NvO$IK���x5(���%k.p��wz�f�۝6^c)fO_ai{F��͞���cr^\"�#�̱�0�

�͂d�e�c5͏�xvP� �M��#�LM�+5;���$�ք\'\0���U���:Bhl�����o���~0�xM���V�X�6�^�k�ߝ�=�[���~�{&o-���RJ��َ\'/�i#��o`j,N�֮ف�<Sp�U4������ttpuWG��J�{�i�^������q\\U
����RgM�aX�ʕ��G?�?�я^�3}� ��x�뻹;��>�4;���
�a�1�S�}_l.\0�����r)`i�%˰�)��P�\"l��*H��D`,��tn{LU�fZu
�N�5� �����\"�[d��]���?���ƹ�[>/_�Xq��Zו|�a� 3�3����r�T������-6�.x--<	�y�|�p��ɔ�I!��0���D����<b���Y!�ɷ	���#Qg_��Y*7vu\"|Ez���f�;\"J7p�1,LWP%%��������[6��z�VQ��;+�֐T��v��B�G Js���,���:�#%d9+�p6��<o��fa���d��ٶ\\�WRV�7�z��s��s��\'s�W�������	��Z[^vƌ����������n���L�<��3fӦMc�ԩ�O�-�v�$��@��?���,���T!Ϯ�[�S��B(Fs��&[&2�톦�
Gz�%S|���KZ�i�!F~��º ॢs�LԪ���<X�|w~A`��b���	�*�^YEJJ�e����5�\"�Z�׎6�2����y���a7Dx5�Kz\\p���7�;w.�B�5k֔e+%W�P(��|��wޙU�V�k�&L���ѣ	Ð+V�h�\"Z[[�0a�rx`�D��� �>����y�
���dv<���&,��a��2�0��wh&,�TMvLճN`CA�2�|�G�\\�p/�4���e���Ni�g��f�|Y����Kʍ�}9%�B���!�vrk_+������g���<9����X�e��>~v���s�k����`��)�{xSW\'�\"Fj�&l`vx�+A�ưS<�Y�M\\Һ�5A�\'7uwB�I%�X�h,��NEM���o@E��J#wO�8���i1���rh����i��縭��^.8������V�P����.�Kzg�}6�T�o}�[H)��W�M8�\\����������?�x&L���w�l�E������/��3�<����kHM�
)�EM|f�Sy�-���{%R��+�z\'��#B&�iܵ�s㣒Uw(���b�τ�|JȨ��I���+٢W^DQ+n�L{� ^��m�*�������ɔy����)�B�7��*/^����J�L[�LY%�=ʝ��pC�cծM��S��,�\\\\�qWK��UP��\'�\\T�˰.��7Ys���D(��M��WG3#� �6��8����Q��r�]������Z	g�ic��szc��od��ǘrӀR+�}Si��8�/442+���L�_�� ����!J)�0���&�_~y9�6�>��}<�۪+��ֆ֚ ��mR��r]t_��8�s8�����ڡ�x%h�H(*v�-�][�M�g�8�gE��A��}�.x��|�����,��O���e�(����&��E�|�����Hz����qס���[;/��	))��c;�)_3�V\0��U���O��P�\"7�F�1K��}��Pp��by����]䆓ct��:��2?�D��]FssW\'2哘Q�)�q\"�W��ަ���
��w�bUN�X;�2z/נp�q�]?����0�M���c�Td��42�2HA��5���R�@.��0�b�(De̱�t�n$B���F��@��1��n߅c����5|�C���Y<OrTE�5�C+*1Pv����c(Z��D�wTU3\'�x�Ns�H��(W^y%Ƙ~1��)eY�,��s�aڴi�r�)��go(�E�<һ6psO�AZ������q�;b,>ߧ�E�ս��0#X~��\\=�2��T���Atv�T@��b�`��r��U����)4mB��U��ka�I@?��>h=}�x�J!� ~\'���L8İ��/�ӖX�ů\0/�\\V�[d�#�E�
����<�uiȪ�ˮ��>�2E^
T7Q}��O��I�ĜFޜ�]_H�k����)���a�6��\\�ʿ�ie�t�w�k���7��ye�wVi��u�ʯE9ٶ�Dz��G��b�z�tvv�{%PJ�-Ư~��|�s��?����ww�DFˋM��_���s<]ȳ[|�X^�:*��uΚ��krW,/]���1Mz��ݲT����Y��ʉ�y���x����򵒗�U��C��Y���K)
F
��u�F�wڣ�N�gp��;X���/ٽ����k�)��\'�t����)��r3��>JɌWBT%+���梋.⪫��=�yώg�Y\'5�����qO6ô���*P���}�ܭ�|��b�s��W�xݺ�G�B?�(p5�s�	#�Pyk��ޫ�kBx8X	�����w�e���?�{fNߞM�=!��^AE�+T���D���#RA:�;B(I	���&�O?gf����=s���TH��>����)��5Wy]�+�=�G>�\"��X�_
:^ly����L:�g�~�֧�!`�%Od3�@��Q{T�����,��*�e����\'��:*B����ۈ�b�E~��s�%�p�����~�����	i�m����~��p�g�y^�\0<Etv#ٗ�x>���T
�������� mE�7T,v�F��+	�\'������η��r9�Q	�	5�h��/RM�:,	[�����T��g#��]ؙ��y�\0���X��U,+`�F)����?�K.�\\.s�y�U�\\��Y��xO<�DZZZhii6|�m&��8kT���:��gI�HTȝ:�Z�j��[�\"u&2�(����ݚ2TrV$�
f��������Ap�4\'BRH1�e����@K�qq;-Ma�f��Q)x�X$��٣ bUw��B3£��%[����X�]F+�����p{��F�nsD��B��.�xv�R������|�+����8x��i���-��B*e���WG����Z��\\SSøq�x�駁�
~4\0�� ����л:��3����Ά
o�	!��b�Z���:h���M5(Edz=��ʒ|�w��b�\'�Z�k��M��(U6����hM�dͨ�5c��i��IM2SC+�s��t�.Y���N�������X��S��f7�\0�d�_{OtbR�jR�B�\'Ab4�27[�*I�\'��&�<��Ź,$�)��&U�BGާkr�/��R���ޯ�^M,&��/�9nyK�ǘU���=PF��V�����7�I�\"�F�Ŗ�6�HC�@�J��g�r9V�Z�SO=E{{;��n�G$��T*1e��O�^����[��
�c����	=,�,4��F�9��IIQ��ܾ�а�\0O�\0XB��Nd�����MN°��� R�)g@���XspD��Ά��
*x�X@��
gR-<\'XZ(�M)l1����)o�8�ed��,�
�^7���$[^��
���:4�p�Cr�e3�qX[*�-��� SkW�
�C�l������N�6b\0�(����o�,��G�2ɖ%����A~��/
�y1O��@��%F:�|����{��T)#�f�\0χT�`�#%뗻�j�pKK��Yy�9V`[�[��3wm
7o@�y�b����灛�6
�V
ڗ��۳J��$(��}�\"��Y�ƭ\0`�n�]ֻe�Ӛ���n��\"�Dz���� �;��q|����^����s)F7���>_�B���X�5��Sxx���e�U��V�3c�$�R\\��\\q�8�S�#
��َTeÐ������.3gάȰ��޻U�������*mh�Tkc���t��Uk�6�Fn���s��ŮA�i�d0@j:^5b�F#��%�1)�hrԥM�j;�W��\0O�&\0��8����\0�l��1+�Yu��K�v�O�,E�BM�<#
P?K1�T�A~��w���e��%]�%�
2��&M����������ry��L�%�ra�Ȏ��<20
V����gh���\0F�\0ǂ�(*�D��1��������@Qd��y\0�[�n@G�[a!QyÆ
k{X^*qD<�c��\\Z1M��7g$��+�_o�ц�7S1j��q��i���Z!��h��v�) )��`GX]*͙
.\\ȼy�X�h�|�D\"�.�mI&���o���q�T�=���m@nC�D�J�@կ
���8-����_���u�`�1��~Zf�f�mb���HyAf=��Dj4�nQ�5�4��&w3z��L�u_�-<�I��b����B�T��H �������7�~���CL}�W�ۃ�C	x�J�	��XG�N��݀x�ՠ�Ay_�_c���Yub?���c�q�G�^�_��\'����ū�aυD�����4�ƈ�6�m�욷
���oOJ�}8��(8?�M7�ϝ%�����&ɏ�ɱt���kN:>B:�,2r:B���֬Y��y�x��GY�n���{�\0OJ��y8�����7=����P6�0��G$Ze���(i�0�w�l�oZ�D�I�<]3j/ͨ}��g[4Ԕ	G�k��m�X=�L�E�+�B�0�{FP�� �َ8%�f!�m����1��Ѷ��\'�0]x����n��
{�̝w�8��1��
�X)�믗��G\\NH7P_k�W��=bH��LtX��R��27PY�zu�3&������>\'���3��^��__\0��\0M��;+�z{z5���$Q�
�򯧘4�\"ӥ��ojI�?�:g�*
��\0�W�X�����mz+��CBT~¡ܾ�3m�4|�A�M���v�d�ݔ�u=lp�O��

���&��f��e͇>��ǝ�㏋P��]���O]��X�ʺ\"�w�ԗm�jN�$�0V��7�l!��Vsg�Y(d�G�w�]��sb��?����S�sft@�e�6�;��HD`���;p)���8��w(�5�#�l���r0n�x�mmmh��lS�A�+l�����\\������/�̴i������\0��n6 ��+�ޝ�v�J0�=>M{)�]��e�:�
:��6�!RN��v�W�T#Q!E�e��yシ�kI;xa�vZRJR�5�@
��5~<Mc��\\�lNEr��w�C�h��e��O>��D5�A5ko�\\\06n�Xy�����ps��΍r��Q2]��:�i�G,\'׫+7�=�<I2sN��j(d5�5͂�_��W],KP.�aÆ
��?.�`��?����&���t���,�֭c���g���,_��b�H,���E(1������>�H$1c* ���˄	�馛8��I��\\t�E���\'@+3�L&#te�t�clg@�Wkf�n�P�靵\"F��	(d�\0��E�;\\X��7$ ?F�T�h4�w�Pt������<����$\"Du�A���͜s�����5d�R� �j�Ȳ� n6�ht����rAk�D	�0,s6(hEG��Qd�A�A��ֶxxS��.�����)v�h
j���S\"\\��02�
�y�q*Zy����\\|cc#w�q�z׻�f�|�+_�e���n��A���p�b�6���=sU+EG�\0��V�U@r��IA�V��$�!9^o2�~r�&1�4�2�yN�B���q���lD<˚���v��~��z`L�eU<�!�MHZ�,�����ш�9R��5@r�\"5N�����X��7ij�h�
J�}�R X��K����<yC���b���iή�\']�,�J��Y3f\0}�Q�45	��㧿���b�����*��WK�U�t��tk�s��~\'�
��~0��Yӧ���{�5�aΨX�l\'�x�N^H=�Rr���WF0^s�5\\p�444T4��R���q�wp�Yg�H$��g>��q��`ȭ�\\w�[D%c�hM�H-��5�q�\'>�
�Ś4�:M��Tg�3��he\"�bD�5�-1�544_kj������w�v��+�����V}Ja�ٕ��5;�L;XflYl�;��I�Fj��@��x���&����˘�G��.��6{F�ש��\'���m�;%k׹��r��6�{5G�p��,*cۢ�\'��I�0|Ц��HB�F��R�nJ���	��D�%�;�f�h����e����3����`ժU�m�1͢y�Ĳ��H�w�����\"���Cr��(�2߇�Q������K\\��n���	��f���:AO/�_��lG\0�a�bW�֚��ڋ/}�K���x�Gmm�\00A����;３O~���k̝;w��Um�ޜUkr�]��?8Z�N��K�f�����R��g~������
\"	�~�eK����sl.� N1m��x�`�lɫ�`S�F:::3fS�Ne�ҥ����8�Ļ�,�r�̳�>�QG�=���)��Ruن#h^�D\"�c!�@+�LF����<JZC{�|��?qp��FA��0-�(�Ma1��qPB����kEzOo�m�A����_��{���uR�B*8j���~#߆�WQiN��� }��VX+\0��T��JJ���()�y��8��S���M2cB�l��?iR��2
ß)�^>��4�����;����=�����h��63�!J��/ۿ�n*���X�����3f��dhm�T�ނ�l�,��f�l.�@�_�.���� �i�FH�[��S
�5�g�p��_
X���eIj������ϳ�6��r�Y��1c�0s�L��>6m�Ĕ)Sv����?d�ر\\~��|�Cb��L�8qX���\\g\"b�Bo���I��꒰`�_-q	Sm��Ԅe�U�~��;�[�B$��ˤ���a�+�H�A\\�Mk��xy(u��R��2no��p���\\8ż�hX��U+����q�����N\0eF�J�X���Y��ǋ$��f��o7��x��sͣ�d}3�nj悆&M&R��ç�Ca[����e�����s���\'�)2�\"��~�JU�ށ��3�bڤI��qZZZ��4�����Ӭ��ܼ�˟O0j���z���?+���ǐ����Q.k|_s̑�}V�|�Q�1De;m���tED`Μ9h�+��]�����Y�`�^z)
9di�C�b��I
�f|��	�����Yn?.�^�I�)x�e�u�8|���d��RDP?��)�-�ˊR�7�
ٶ�ѻӤ���I%�]��|���RК:iqZ��+5iO�H͋Ƙ��T.��ڃ�z
�sW]��Yu����p�Dc8x��J(�v��pk�0�\"� �lV�������|��	�|]�M��LF��������7
3�#�`\0o�lW��H$���͎�]��)ו��it�6>nѵ\\����N�����I���+�*��[��B�0� ż����Os�_��s~��WNb�$�ZSB#i���煴�M��Q44F�(�����f�DiA��+ǦR��sw���Y<������ܞ����`}�&���C���k�|����x���~��c��W�*��r	�L�|��	>���-���\"�����x%]i1�}p˦qŷs�\\�!� �|�+I|�o�
��$|�K�;�B֭[�ͷ�)�rh!P566�F)�J�
�IJi�ϋ��X��i��Z�g��H����b�4H��X�g��+���>�`�>6�n��imn�X\\���xK���6���<ƎKss3˗/��5
�߄0�8�]~�R���6~Y`\'t�shp��OH~�<i��(6=mμ�jJ�\0�t��(^���4�|�]o}쁉$�cq�fx\"���7շ_�d�[e#, �5m�ǔ3;v,===����S%7����?���\'ʜQ�XTp�Y1z7+	���lj5���m��\"��ͬC����v�wH2x�EU
�Q�u�K/���_o��_Kq��,<��L&ǚ5��0as��婧�b�ڵ�lag�)���O<��~�+�-[ƌ3���?�A���Ѓ�2e
���?�F��al�Q���CS�(;el�v�M�QU���G������sLHk+���f�)�|Hߢ�DBu��T��*��pA~�Te�裕QLiyT����*�ƽy`\'��삂F��O��AH�!�m�DmF��v�y@ܲxOc\'�7��}���4a~l�y3B��ϣ̘:!%6l�3�k[0i��=���/e��_��ý����~֮�h�P.
��W{��-���y�a�[y��o�����u�&�\"�j�d��錅!֔/}�1MM�j��;��?�|��-ɲ����nd���,@��&g��l���$�3��C������y}��_���R*k֮�y�_�v������?�1y�$ݡ�FM�8�r�����ݣ�>��~�;����\'���qhmme����ݛS	����/����:Y��0˜SKk��{xZ,Z	����
��ca>���]�����j�RAS������W�x�)�J���1}�tV�\\IK{;5uu(�G�a)
P��܎Zء��K/Q*��7o`B���N�0}���x|�Y��&ω\'D��{c�C���_�)�Vg���\\�~�ZHYY��㆛�\\��k�{�s��T�g\\|��6Z{tVP�h�⩡#�Ӏg��	���on*[T��u�I�#X�+�N��+�[���}�nG�����APV�!��G&l��W7UU�+x��{�m�4M�DM߭_2?�0�
�����oQ�|��3��Z{zz����:lf{,�nX��={6`D?
��xe�ejj$3g�s�~�z��\"�X��&�j�
z�O�eWZ��m�T�<x�&�m�>������*	|�L++gDe2��7W�^A�׀c9-(���^Q�o��VK�����vh������5e4�
ͤX\\��^���nذ�����LLhm�(�ռ��㕥a�M���xwg�50+%������޴H�Z�\"PH�Wj�,]�t��__\'���GH���V���^���hO�= )e��6@�$u_�=��iߨ����7�\'��9�h���\0(�+N������f��Esw�ː��#�N
��	P耗~��&�R��F�|�a����f�OzlzZr�=&�(�V�h��56�-�h=��֬޲��
2��=3�
�Bjpe\0������>¼]��5���IX��ٶ�+�鼙��l�L�q�gU���#%����{��3f�\0)�T*��=�x�ǙP��.	!I�W�*b�A%����������k���%�>.v��H� V\0st�[�6N.��VX�Ҿ�bb��`�!���F���?�,��C|���ZI�r��o)a\'��ߖ�7C�Zɓ߰Y}���mЁ9@M�9�ʻ�Q	����j�gw�u�q���FS-l9SJU\0QQ�5
��78�����/Ɍ3*�bCC���y��ǹ馛8�C�R�F7n\\e`����϶v�)XD���n�c�T�4������+��d+���j8%UCD�a�4px\"�3�\\����!���ײ�6Ŝ��<�
�0��i^z���c�wn��\0<�I���M�n}0������\'����^�HIk�@��g�M���u7F-\"B�^����~Z�IBǫ��5��զ�X�24���2�1 8�sLA��S#� ����׾�{���C�J�^�b#�
:���r^���A>a�P(�k�!�N�8N�R�t�I\\p�̚5�U�Vq�����c�
�1� �RNÒ�Meq�����y�3�OgѢE��>��Ŷ�v)z��t�X��RCi5�ש��B����5�vp	�
a���1���*͚i������!�I��$���ά����E�5N�����7��R�l��m{�N{xqJ�^H��^l�m
���?���9���x��QJ�������!�^|��\\q���>��e�M�F<��J!\04/�䣃�eA\"*6<}W��M
)�y���hl��1PV�}�qnK[f�0}@���.�m��S�^��X4�ڷ(Vb������2c��E�;��nS��
��
J1�=�a2EN��8�W�s<[��(�m��K)N��!;���[mB��x��m5/�+�����q_����J���銚I��)�d�z�	��9���<(v
����:Af��{V	:^�#zyB@��$�����)���zx�k��G��:���\0���7ɱ�o\\��q���	R�2E�X�&֠)vI�6
�V�<�&�d�~�q�-K$�+vt�������rlZ2%tч��ƚΛo!���k�o0�w��\'Wrya�5�;�q�gr�UW
���M����c�q>n^��w����)�jj��Y�|��}ұcF5�zj����à�|O\0���o,�m�n��y_QЊ����9
gh����&Ţ,I�{�XcSh���d���C^��[�677W} ��P*�8����;w._|1������U��`<<�qx�G����\0��^�~=����|�����m��5o��+�50� G�m����V1#�Ʋ���\0��c���ѥY�GoZ��yŢ���6� ny��Ə\'Y[��L���D�z�V\0qG�L	�+��Ɉ�lK\"�\0�\"f��@�>�SR��Ɩ(K�j�)A4e�>��q�܎�ӈ����4[�2e�t�ziQ��\"���a�8ak�1�)s��`��Υ��wJ�eZA����fi|ģf��g�����T:|�s<���{y�l�C�`Mk�Z����q�t[�`XO�\0��Ď;X��h�+1���h�c�M`�Y�y�xt�o��K�гZ��Z��.B���N\0���5�f;5�|�AC���ꫯV�ذ�_�����vy�Gzo�����G?�?��3gά�]����N��>R����w��@��HD0}����8v��~��p����/��]�5���C\'&Vu�Ґ\"���
�ל�I��ːh@j�+�%J[<���8ޗ���\\ؓFW���AUo�>bqj��Z�iZ����N3L�MP�$��94~	�k�K[^��X1M�j�_4�jtb	�Z�n�2��d��9�K<<	-�Rt����8Ó�]���0�@Ż�(�$����zy�^�n�H�m���wv��������R�%<��Ԏ	\0�ܑ\'{\\�6<T�u7�t���\'8���{:��C=��w�=��}=�!�DQ��5773�|~��_�w����f��8+V���k��������������}*)c�%�����<�f���&�0��&���t�k�9Bi������@��
=��#>��;5+Vy<����E>�>���o0cƴi,_��.�g�6TjC�
��E��>�kS�}�D�m����!���g~���RI�cТ��9�=�Z���U\0`r$2�B�M&L�{�^S3�8�S�pT��2�y�`�E�Ѱ3z׍܋o�n�{��N�Q�9�����\0���
xz��Z����z*�&�&��/o�=�(tH��Lm�Ք���B���x�`�KERJic4�1�j�i�hۦIoG��+��fCЃ>x\0�����w��_��לr�)D\"<��?�����\'(�J:0BBr*�b�����0ow�a�Q[[�C=D<硇�駟�O�3f�`������444\0}������)�&Y謦\\�d{Lk��BcB�<jh����XR(07ũ��Uf��֘bVo��2��D���>eE�v}�
����7�ǂ�U����4�eH��I���]�����h-�o;|�R�������jL~*3*ހR�O}>�ig��Գ.�A<.pː���gy6�xD\"�L�2�bNXm.�����) *51��k�
�y,]��nذ�ҋ���<��˕?�q�Y>����-q�ۣ���o�h�R��Ȯu�C�t�=�u��6C=��p]x~�\'k�?�q�a���s����Wf����(tp:RSƌÄ����}2J��kӉB�u�~��7��Xp�%�1�]y�p,�=��u�ߋ��e�� �[LCyc�Y��N��E�`|��b$F�q?+sԕ.�3��k&k��s��.V�\'���ܪJ����d���=����a��t��^ZT�M�+m���XP��rT	b
����Y�ŕW^ɢE����H\"� 
����ƍ�:u*�F����`B4���cp���<�@#���������iz{�x�~{;�χG��b�v����A�^crh��2�<)
�5A��y��㴚:2��xJ3P�����|�5KRV�}���8�&�EaJ)�@��أ\"<�����\\��w�I�a����4uuuu�W%72�)r1��sdeTL�F��CO�Mq����RF�5\'Kt�G)
���4���^�줔<��c����|�s�����N#�����~�1cư��{��p�AU��I)����eY��������e��Z�u+�����jy�y1T���}�5σD�T�o��T�C���?��pd\"ET��v��k����S���^+���7^W���b������f��?��\"��\\�������M�6�D6�K(]�M�D
(�U���l�!��*R�1c�x{�XB��S.K^�P
jj���&%�OJR4�>M1��� 
о`�S����}�Qb�w>f0ɂd�]Du�ܭO��R�������O~����s��Gs�M7�D*��m�x��ĉ��;���y饗���>6\0̄\\t�E�b1~��W�����f�%��ms��uA5���d��4߇�F��6�w���e��P*��sDc��ǝ�4�@6�xx�X����?{�)*կ�Z�|���^>��%R�F$\0���tZ�J��[|@��imm��\'!�R.W��T3KB���MP47K�K^�x�1�Cq8��������=��Td�B���t��4�K\'\"�$M�4]ő&o���U��%G���jGp�̦Q�L1z��s�|��俔y�%���e�;|\"��r�	UU���>@�\"�~�@\"����L�b�))�
!��#�&Z�����t�v>�����.���?3e��;＊��y\'�|2��z+555������><��#t�AH)��=z4g�}6�뢵�s�aڴi\\q�#�]چs,�𥲀���^���˖y��%X���I5In�W�#O���������ր���i�
�H��u�H5R�t�
C�a�4���yN8���_p�e�{�z��f�}�\0!�p���4�nf�[&��V�j� gT�i��DJ�ܡ9�>\"6���[Ӷ�球l�91�½l>~a��zI.�@
�̔ti{����f�(nK|ŬX��2�\\+R��rJ�?a�u6鵂����y��O.��w�c�2�4�h���c�\'�s~:X^��-��Ƅ����7���+�B��ِm�]
xIx	ȭ*��3mȝ�$�^3�r�a
ӕ�9(��(�4�9P�E�1H�Z�\\.�z�Tk��V�:K��J��Ӝ��E~u��{��0����������O������B��7wꩧr�m�QSS�	\'��<��3̻����?;�0�<�L����s�������<�0�b�ѝ+�6l0U�\0_ï�#�3�cׇ�>�9�����\'�~�n�G]Ur��5���sIJI)��$���tw�{���W!��q���[��?���]�=��_��@�F��[ۆ޴f�ơ��4j�ǎ��(U����`rF]����O$��|Y
)�<XM Z�Ig�i�̖�����!�Ӕ֚p��x��oZc�M�7�<t���gD����a�i4�R�}�ω�sy׿����+~�P��T�l��#����>��q��k����E/����r���R�X+CN̬��$�jF����7������zMƘ+o	�
%��F�#�\0��5n��Tj&kF-T�<f����u�b~\"�c]Y��9�	5������ �H0y��T��J{������2n�8����<�B)C*��K�К|�K/�t�Ԗ�R���Κ5k7ncƌ�Bܰ^�v�G)���Q��y��}6�s/�l��1�?���SO����y�<`��%����:ڹ�������>7���D.��o_i�{v�	Sm~��fH�pi�\\N�/����?���IS�����>��K
|�x�e1c�t^z�%6����V:	��.���������$���%״��w�)�-�N����\"�?X&��Y��@*%P͔I�l�����a�����6�΋D)��G��������,V�a���v���/�	u�5��<�}���
=<�u���C�s�ǟ�׿��c�=��������0J)+�ީ��ʚ5k*a�Xkk+�|�<���z���f6S�v��P��7[���<�~3K:c������Z��eӳES?J���x��2BH�~.UhQ>?�l���-d�Ʊ��,���&�/��S����&�9������s�%^x����L��\'hۢ(�F��WF�*̑�Ԕ-��Mg��!��6S�o���e�n��-���}�1���ӣ���N���e<Ə�|�}1\\W#4L�(���|�� �~�;��z>��jh��a���o�U�����	�u���5v��A+n��%����3������Y%
���Z�,�8��ZZ��Xx�O�I1� Eǫ�Q>	�|ߨ-l|\\2f��X8��.ɱ��+j&��g`d�Z_��>+i}ZҵBT%2J��s\"Q�I��5ݤ��[IȶmWګB�/��/|����x�
���s�a�
��(J�!!O�l�Ec��t�w��~~-�	&���������k�e�x�b.��!c-�¶�J�*���he�XX�ݚ��ֺBI	�X�WI	϶Mx;k�̓w��scd:t�o3�]=�3ޓ�r����3f̨LT�6Zk�=�\\��{.J����Ν;�����X������,[�D���y��j�������X�l_�����	&0a�x
Z�zj�Lq����0M�-v>�5�fXt��^�\0
킖�,:�
�-�,���3#�te������fa�ba4F�e��Z\'�}��-ļ��p�QGQSSß��\'�~�i^|���\\5�m�r�̼y���\0s��!��Ti������b�}��LA�\"�S3��\'?�\'W�`IA6�욌.�9̰v����S��?���ŋ���?��/��SO=�]w�E*�\0��dr@����nN>�d/^��ŋ������}�;�)p�����a��L�َL�搃���\\����8�YOHM3k����c�Y\0^���F|&O4=�;P�<,&����%2��vJM�2�]�)�0Ŋc��
{w�v1�e�kԍ��6Qi�Q7�h���J��	�b���w!�*�e^)��w�X����4 �����(�u��a�̤Iz>���}�a�]�Tm\'�B����vxq���������ziqlM
e�=�g�D�[�9Op}����M5-f#y�o��Ŋ
�tpP�����M��v�f�9�z�u���o6}��/^����,������S^�c�����?C����j�SJq�Ygq衇Vt��{���f��Hb��P�8\\_�T�\0���{x]\0H�~te�~���L&hj2�p�XDJIM�Q%	U�W�\\Ɇ
���v(�&�~z\'7�ӥ�YT8o�-X��g�r�F�ֶ�\"\"0q�D,�fs�Lv��ZK@W�g�|�������p�t��h���$��jk�.���s��PlI�`��WD��T�J{&<���l���?�лFP7Mq�/\\�qc���ׇ\\�����\\&6JcE5��m�f���i \"$��%���0�4^�r�1��=�X��X<���TJZ���r|��O�f�mp� ,S�qRe�w\'Fk�kj&(R��<�X��
m�σQ8	�Ɨ]v?����a�����7�x�h4Z����J:�*�&�~��E����E��r���,�w.��_�D���<����jjj�D\"�ŊGZ(����~���d̘��X�R����0�������\0~�A�>��|�khm���W����U�#��+Wr�I\'���ĔI�hkkc��3É��
zl�9$�CO���oI����+ʅ�ɚYg�L8Z��(Z!M�v�L��D�
޸�b�m��:��Y ��ji� �g.���Ɲ=o�i�����[*���b!uX25l1�̦��yL;�\'R�1�H-Dj7g�s����:��z#*�m1���������|���O�	^���s?�M�^��c�u����g�Y2/��8��-��B��������g̘1��e�7o�:�1�xn��6>��SSS�/�K��u�ü�[����6��ژ>}z�B�~���Ǩ�j��]�%��g���`��}�3���?��
:O}�f�-��C1�����~�c�{|�?`��F�MOI�� >l@6�㦘���j�0Uݭo��E��dk�n���5�@�,�S�ő�_i�?��bA�����j߄���(�G(to��mu���F�FYA�&��$�Z�
lhaE�����aӦM�|��\\���y晬\\��Y�f
����J&�^_�3�5��Scx���+���R�|�%K����bٲ�lܸ�؉��
���~�P�5����;ގ�\\�ߵ���r�9�P�z�\"M��׋��]/�U�����XP6z1��@ ��O/���Z��ǚ٧�A���9���.3{�z��[��̘�F-I׽����ڗ�^��Q�V[&�S�fC�����k�Z���ۋ���I����d
�L�{ަL贲��-�Op)s3d<d
��ۼ��e,����������>�C\"��J�iG����<��c���_�zm���c�=�y���>���8��>}:�����ߍ��w��y����_�˿V�5?o�������q<��x֬���?]�1!����./������xNzu�W/���WT
�����3�U��?6��/7�9��HO�&����\'����G�������/_R�\'>�e�D��y�Ғ!DmN�:=���_���3$a�q1��� $�*ri���M2n�,k|��Z�$�Z��4\'�7�o&Ky��Y�7���_������\"7�r��#ι�ʬ�i� *�Da���v�l�Vg�,���?/�p˻|�ݨ�>���1��9���N�t6c�$�d��RQ\0��K|/۩�n���hX�c�����Xh>\"�UAeS���z�x�g#r�D��>�ӱ@�k���ץ7�wI��o�9��+�P��I#9	��e� ˫�k}?��������	c\'N��O�W�����8��ZKKKQ��/~�O~��<cS�N%�ϳ`�:蠚k��	`�}��}V�����zN<3èIh��r��2�V�@�1��,�ï�8�����U,���,��A�u�53wS\\��,Ղ%�:R�ħ���ǅ�ꣻ��{F�ל�ᜳ}0����i˶4K>�Ł��Az�i�����j�w�C�0��� 	�#HS�xpX���o��j]ISqm�&M��1�e�}k�E�<*;(/���8�����
��˵@瓒����9�C>3�é?�Xv�����iԍM����ׅG-9����*&f�獚���t<���M��rR�P�@g�Ky���t���
�G?U ���kл�r�k3���9�q���\'������`�W/-𫟕��*���*�\'��c��eI�s_�bE-��&i:��R��$l�h��xy�ȯ_�Ħ�$�JW�F*�i��>*6D���|�/����l��
�o�@��� \'�T��ͳ׭��g�ow��$3����y�]ql�Q�*R�d��c8��!3�0�x�Rω\0��7v�8�����ӑ�q�����Xq�o=��ƀG��
����I�?j��Nѥ�㺓S�+�mL�j�q.n�Vޡ��A����<͹
9�s1~�(nnzx�9�Z)J�y�B�Z���l�R���Y.-$��Vcn�\0��U,�:���B��F`[^������G��G�<I������b�8ݜ�c�oP���IW/��u��2XKd���P7�R�r33�����(okn������go��mZ�2��7- ��+hoo�w��W_}5�r��r�f߯���}�هG}���>�V��z�j�(�
��H���*�S��_���A��2�T� y8��{q��Q�
����0���c4�H�@%�{VWbN�o���z
f�AE��g�j�O�Tz�Q])MT��*��$nR����>p�����~$f��������qn�s7���h�7�]B0�XclF�W݅�A�;��,�6@ѓ��8��C�=����&��U\0���o�Uȴ/&ʑ\\�m�[�P��h2͖�:����,�BQX��X�jpՒ!!���߫��}�=\"�GX%P��ò9�lj�
g�����2������矚�6��Ofj�Nsw$=����i���q���D���8��˝z3;���M�ܠ^�S�ȼ��m-\"�S�o%�U}L
.hl�:���t7��\'kN�E���wg���b�ʂ�ߵ�U�\05!�j���bi���k}K%��#�i��F�u�f�7=:H�z6딦d�!��}��pWE�[�%��cw)v&�Ab����>��m���c��Fm.џƌrS��IMT~���K�0�_���}����|�l��M�A��j��ꎽ4b�s*�|8f�ۂQ/������&��U�Y�ob���c��v+U��ք\0�R|��_&�\"���/�\\]�����;w.����m��Hk�2�{�GM�nSsh�&*)G���R�\"�7
��-�h?��My�r��S��󟫼忲��X�h�����+ʬ]�7����n˹���%����\'�XP�X�z-�mp����A��\'�{�]�6�z�hʏ^,f��l��e����q3��X�/$$���T����()y{S
�CG��s��U\'��0Ղ��u3�HPnϩ�X����ǅ�����?�62����*DAk�W��MP�!Ɋ;��,���ד�uQ����9>_O�nƼRL,��A�\0f�Is�b&b0�`�\\�c?�Xy�/�i�`7%�J7L;�p�W#Z���;!���M�e-��û�[�R���{V�:.���F/t������1����g�R�/}���:���Oܦ�N	/�C;4C��s��;��\0��4�	}8���3o~�
�Z���Ʀf���߄+k
����Bl:��T�7Lw����x<�3E�cn�[�mH�.A�����j��|L�ކ�U�{��g�W�oY=W��FEаy�K�p�y��7Ѯc�[ы�g�`c3�<�c�1��oc��لaXK8���A�j�*�0u�hH_E�F����A������K6��ꫯ&�������ŋ��0���
��	�
.jnc����
�zG6f��&v��wʧ�+�pF쬿\\t<.�墀����ᘉ�N�2������į�5�(���[ @�>���łB<��1zt\'Yw��$�����j\\|s����u��[yր�s��=�U�lވ�N���h9��!�O2T{��3��n�Y���i���]���~�um�%�[��7]�;|�e_���q�Jd]@0�
���Z9<7z�BzP�r��(��f�u��~j�]	�~Z�m�R7w���*|w����i��,��Ǔ��(w��l:���)�����d���Q�#v�u;��b$, ��B �7��X�^�9)7y��:�	�H;��<
/7�llY�l�Xt��}���d����=튈�7��b�#�Α�.��%�o�Uk�������;u\'�
�N:��U�o>��^��u��j����}0�X�1��L>JS���;��̫M8���n�N�y��p�;V�K�,F����M����Y�wC����M@�K��Z
�+m�;ى�l�]e�)@K!n\0^��q�ޙ�U�u(��@:�.�9��1������>��nI�4�6!�yu��35��Eq�{�����^�~���K#�d(w:�\\p�W����;���R�+�:���{�{Eܽ>���(lJX�e\0!ج��&_�1���識�~�����-m�ڽ�Z��8�;���8d��������jK�阃>�e`ͽ��O@�RA�y�`��\\\\���#�~���#���k�F\"���~�c�]Vˍ��!���vb�\"ŮBx0
��X�Z�p�f�D�%@	���Fa-�\\�N�V~��u&j�\\��46ò���� ����C-m1��Y�.Iq�Gc���c�c��5a��T�Ʃ���V�Q�/\";V	�~�gտ$�V6�(���0�-]�g��F�nHa�z)�i�_���[yR~!6�R^�v�PB|M[���Z����
�����(����<}�ǝ��JS*�д�+H�����\\�x�2�r� Ӕ�����T7�n:K���ݥ\"Wuu`���C�#;��I�k�8���D)IF
�&+-�\'%R<�<�q�^c-�ZB+([I�*B���ZN�I�+aQb0����^ F��\"�#sm�bl�ꔠ^�d� �(�k��ĚBFRՆڰ	Y���B����/}���*tl�ʘ�\'�c��)|���]QW�{�[a3d��\\Ӊߌ�����+�sSGЊ��{;�0�k~\"�KFx��>O^��FJ�����UzI��&֓ŭ��86_�X/�,�`��̐{��ċ�!���_�ǚ��qɄɶA)o\"��*@4�iɏ������
��DZ;qʄ\0sٜ�L�?��ʣ�bh��=VtU5�ƣ\'�X<	�p.�,_l�Y9*0��{�I��[�=h����D�C\0����T���l���%� �emV�5�˂�eC%�d<�\'-��|�)����;��u��Z,�Mma���߸���n��o���-hk�d�W�5y��Cf��P����z�ܤ{�y�ٿ�����5V	��*��R��W|��gv�����6W��bw���t��E(uV��M�H��Z��(��P�?SW�?�:~�	!��(w3�$8�w!SO�,��ǭ�\'X�߯�,k���Y������\\���-���P\\/�[\"��I��(��4��H��]T���x�E��u\0�E�1�CI���ՒRS����HC�e�eSV`�)��=�h�-��&]�.��ރ��/kV�����vD���\'�b��v�VW)�Frs�$s��3X���@Ē�a}$�E��$�ѵ��Y�Ya���}�ԌebV1#� �Ւ�ʒy��RdA	Rq�e��DY5�
��M̌�P\'%������J
�{m�y�v=A��Zc��g�}p.�J�#=��.����
��z_��+ҟ临����J4��G4I�d�՘��U��V¹��|t�k��φ�͓]�`�ݺʹ���+.����9$<w�⮋�<��;�O�d۠}�஋:
2-lv��P$W��Z{Y�z�>�z�0��xC�+�l���)~��������FA:[��L:ܰ�
����c.���l�[&y�R�gop�C���%*�{Y��,b�)N�%*�fi���ؕ�<����졲��S4P/$���t��Z�#�\"��/��,�R�&Rˣm�t#����F\"g��w�p�Z�:�sU�-u�`F�r@�`��@Xˆ�.Z�WB[�;��\\�B��겶f�Um�#��߇{b胮H�d� ��[��V�ȄPd��&��-��\"8�I��<�kx����)%��Mn<�z]Fރ�u?�<������u�w�`�g�X��=�o$s���}������
���L^y����ó9��a�S$�^p�4���YS�np^�H�s{����D�ح�^��w�
ʅo�&�iW�L<��]2c�o7?n��=]��ovn��3֞��/Z�<ŮJx�H�H!n��W�O�}p6�J���J���^^��*��-a�
<)h�m��Eƴ�Z�x�f_@ѧ�T�U�t��|*V�S�R�#$��i
�N���Ϗ�$2B�-�+����\\s�gb*]�}K�}�c�m�L��i���z�s
k���A��:A����\'$�	�@�q����ǣ��ɴlZf*�od��R��;��k.bқ>��,m�B��bJ:�P��B��j�	�P
)�S2��I�&�H�
��6H�Zl���ua�6^?Y�e�룄�bR��H���^\'���}ANZB�Q�FbCU���02h26fr�#\'-YOҧO�{5����bz^�_��YC�\'𭦧a�Gw�J!�X\\��5��$���(��<�k魚畄H�
�T��TIi��f$�/�P�	��Y���8Yz�E��jL���q$\\9L ٷ���Fw���UJ£�X���n�k~�����z.jj�U)J֎�zb\"���Kb�~�FN�38e���	��_���Y#�,c9Y��1�՚�Xp��h���nظ��s���2ۢ|x�G\\�
��Y���;$	 ��\'�Q}���	KcVqx�Ǒ-�	����\"�u�,�J�u��J95\\9�2�#ޒ��B[G�hC���$8�Y\"=��z
�:;�b1�W��-�L�&g`fڔ����<Q����Ԋ������x����w4�px.GɌ���A�:��1�},&,@�s�.��0O�CwM�����13����)�ſW��x�kkb�����z	�]0�#1G}&F��#��վ�ulk��6�5�����\'�{8�
��E\\�/��h��~!�1�&ۉ�\'7Ry��n�e`���:Ww�ҕ�iN�n4HvJ�.3
�Amn�,�9�W��h��>��x�.�Fǈ��$��JE���IȞ�Nx�!�\0�~j:>;J@1�|t7���v7y��MqZJ�i�AU;2�k�9q��n˪�2�w�,(�:C�)�ҵ�=��;��Y��}�Z%�r�>�XU��U˚
#��R��p�l*p��K���1䔤1���[�|&�-/�Ә�YW
Y�[aEQ����M��!�σ1��~K�O�Æ������f&y�w=A�D�y7T�Opdw㛃���\"*����ن��/���LU��=�A�[��1��8������]O�-Ι�@NH���=�T�|)��+v1�^��k�T���2��q����m�$�ESkl��cv�FvC_{��\"�PL�
��^Pj��n	C]ܧÐ��t�\"������O\":*%��;L���ͧ��y�\'�Ǝ��xR�\0Q��a�4��q��`����8�Ab���ޘ��5ݱO�Siw�pw3%����6AY�՚��쑗�]\'h��%��{��� �&J\\tKl,�|�G(c]Md�W����X�,�-ѥ=:*�!DV֒L�x&)��F̊�0�|����s�[yM]J��$�����8�p�/B��<�{En��Ԟ�Ģ��ݖ��֪�?�r����nm��A�%S5��M!�3�q�__�ۭ����^�.���
�ABz��E�~������ZZ��-��R%���C�ؓR7�Fɝ�o�U���sʏ\"2M���3��I`�y��Ҕ~�Z�����^\0�Sߊ<���6	
}Դ��3�U��梩�:ϖK��
k$���ªM(��dI��{3���7�ӄ�4�iW�4ʹ�,<�5�g�k�\09)y�R1��� 
��6��k?�8�N��<�Y77u5���Oz�CY�j��-�9�^0.�q����s#��m2SԖ�X���Y*:\"B!� ;�pX
(ƀ��쓷���ݱ��W4Kʰp�%����9��G5W����+��� !@Y\'ࠒ�+�����%�@&~��^���&^�$���6����\'7���#M�Г�6����j�����{i_k\\��*P�����6\'��oԜ���âk����j�6�[�0@������=�Jupl�`teS���\0h=�+\"������O4�}_n��)!���:�I߉�>��t�ᴟE4̰lxDpӅaA�j���M7T^H��pS��ͽ]To����?�����V� ]�r�z��+�55�P�����+Z�_���ǹ5��}C�:�)�1D�R�A�s�?&ؚk�����m���6,.ª����a�{�	2����:O��u���:_<o�
%I��N����y�fO��3�b���[K�
B$U+�ĚH\'5I����\\=�z��+	��\0������&�
J�lq��FH,3?���J����O�Wz�O��N�1\"`��i\'h&i]�ފ[%K��́tZٰ��nr٬7��y�残}tE ���h���|��=�_*y��o���5�0��K�� �B�pL�5��g�O�)ŦTUR�w�}.�����ߜ�]e��BzP�u�:�_�0������-�.xH����,�\"�<���b����� L�J�QDl��U�	&���L@��4+��1��H!��#��QЂ�XR
c:\"AO��yS/)�M�#�9ek!IIs-���I���W�?��
��*VV�� �
n�(�{�X/���I�J�����&
�����@���������M+�6􆚞X���@�J���>��~\\!+S�3���Z�`qAS�Az����û5��5U�,�����j��ڈy
�)2�l�����EmQ>�_��{B��:�>�����j�;�>m�b�lDOlY0 x��1Ny%��b	kP�K>��Ш,�\'�gJ�����_�p-��+��5���|-J=?�n$Ҵ��32�՚�傧�ѳXж�eʱ��ۚ���u
��	���ن�ɖ�Hn~{@8 P�(߻��V��}���IW�RBܯ�=�ZǶ��*��`}�U���:��)~Ks�V%1��0�C�rAi�p��[$;��W�5���\"7�.hb�U$^�U����1�S.qko��¤=8�әx��x�e/��(�++%Š\0$앶���r�2>�쑇�s�	y��%�}]�K�$����m\"���͊1��i�Fa�Ɋ���SII���	{���C����\"�v��[voer �i9c��X\\�;�#�Gʹ��%^�ȣI-�$�i����5�Kp����_B�
$pt}#g�70���C�$�!H�ϲ��S2�$��,���N����.T��V�sQt,��ew��Uߌ�p���x�����	��<V̷:�e�ڕYk�-�v�z�M�LxiCzB�3���w���O���F��9셉������#�I�{�O���q��Pus{�fn�ĭ=]\0d������&�a	VH��m���k?}<m�׉�G�G�(�hV�F��]1�J��W��
g]2��
X���ϡ	K�b���l��V+�/�\"c��%���:�ABz��ܬ��>=~����8J3�V�a��\\��i�Բ��TӶ+���|�AF6�1U*������Ts
ޱ�E�{$6[aª{�Vto�^p9Q$���#�%��$c�-�h)���:锓�������x��fX��.��bd٧^�7����[���
)i���u��Z�8��se��Y��KI�ϸ�#V<M|�
Ew)bE(YY�	#�T�SbXY��Pc�Ȓ	$����e\\ΣAZ��i�VЫ�Z25c���V��)VY{��<�єÈ�@�fwh
��%��N�s�?|����+�o&˱
=�༿Tw���)\'��3���iIDF�lК\'��
%�BCE[�T��h�=&f
fE��Rj�A8~&LٝLS*�uߟ�!�Z�Ѯ�\"=>!�B!�T2sH���fE��dc����t�;��ae#�ꦾװR��NG�Gx��Kj����_�Y��s�c=]�k/�,`��F�����w$g��*k.�ءC�^,�V�~j��0�i����eAa���_)����0�d��H���RQ���Si첌��
��%Nv��$<\\�&	�������}��pӠ��X�J)�b��h��m�2�I����F�-&Z7BJ~W[�%���Y�<Q`Y�D��5� &�ě�/r�ވI�#�&CC��%�5�2�F��`-�bqR�a42��Z6��2�#:Yf5��9�1TKP�������U��[�]�:����-_�>�{�S<�z)����
ȶ��a���Ƀe9��Y\'[T/y�H��ȵA�~��K�WйPRnO��e���	�Y�ڇ�B7��%Sk�9�\\	I�&�������[�yQ��7��w��\" .����Zn�}�PIV?L}�a�Gb��O�I��<֡��/~:t̊(dY���r�
��+U�HWX3�Z�#��Ă�\\\"���l�۳ӱݹӵz;���CZL���+�c� �TϣQ8���Z�Ē����]jáN�<���Q��\\K��Ġw��Ă�~�,,�\\	���9BZ���Y�)�=\\.�ww(m�*^���L�^ބ���1���ݭm�����_(�u���i�/Yw�t�u�3B�XR���`�A�����O�P��^~>�4�m�\0��\0+��kk�uqĆ�J{X�#\0*#�LJ�G��z����!<�%<ω����ZW���LX�J�E�{�	�9�U)�dsL2L&(�f)�	\'X��KC��#�`b7�f�q��~���w<���բ31DW�9�@��g�����FԮ�vERMê[�KM��GJ��b�*{fO�2\";p����R��ڷ{B�@��Ț�}��<_��de{#��j�m9��UVݡX���[7�_��b43^m8����芠�.С����`d�XuD�Y��L2��@]=��
�~c�֚.���1�QD_QКJ���@7n׌6�4u�%nw)�l��d��)����i�|Z=�&�h��)�A6qsӛ�����wh�����S.�KtŲ��i�2<�-���)�t`�M�o���:͞�hf�i�]*��}o�ݤ6�V��)�	��uw���U�,�^�����W.]X��?�6��&&F�V�&��<���S_e8���e7K��U�>_��h8��1�\\#��ō���x;p��F�Pl-ѐl��-��R2YJD�^\'�OI.bi��n����
gY�����<�+6}_k1�RAnۓ�6�p�bT\0�,�NA��r��3O�<���g$�0�~v��giZ�q�72cYu�\"��)co��e�T�Q������x��)f7�!������V���ng��p�x��r�;2������II�����+18�1�]�Ys��a�e܁�j��ˤb#��g)����ADֺ�nB<C�9RR�q-`�s)��e���<��\"����7+K��i�E��k���iL0�XC~�˔���!X?OnUiȎ=z�z!��@_|mo�\'`�g����`�����
a�Jz����3Պ�F���6/�N��Y�}�}˜0#�m�J����4C��J��v����c-��EJ:C�ҡ�!g*�	�p?��5�p(��Q~^�B`a�১�n�\'���/�r� N���:咮\'%j;)c?�CG�d����_���I!�	�)^�d�,�}$#k�7��W���z���U� w.�ĵ�a��8W1�<��t���p��6��{)@l�Ϯ�j�Ə	岸a�9KiɈ��΅�M��	0�9�U�]�_��<)č
�a�B$�{�5bt�JoXC���Y7<�*^�]�q3(�F��u�뻋�\'����!^�x%8>3�sU\0�Q2����u[�_�\'���uX^�ұPPX���[dZᬾ���\'[�>�Î�P��e�r��Fl�9*D�uHd`w��4�����E��zg�]X)+_���־5��K��bk�J%<p�.����)�\\�ӭ~��{I��Xр ,��s6!]�ô
�kc�)�r���6�,=Q��6�vk!$�8�[�߬	���E5�z��������)��Z�����Ik&�����ݐ	s,՞��Vָڼ���.��7?Z`{�)b!���_����ֶ��B�?y��ٽP�� Ҁm��G������=���>��,�]�R���a�9���Tz��Z����P��W=����&��X�5�ɴ��Ŷ�̵�I3B@����S��y��o�d�[��m����L+,�����.|��H���Uk��z��=ł\'`�o
a/㲓-a�������Dh�72B��5���T�lE��|��.��͚���?<��ab�����F���<7Hy�E�����,ʺ����9m������h���h�u�tyTt֓
\\�u�l/�3��֘#�/�͇���|�r���x��Y�L�ݮ䜺�
��]bYXR�?�Y����Lv0Fx�!5�L��k\"c���N{u}�~cS��!^�p�^7&�_���,[m�
�����	s�I���4qYpۻ}�ߦ^ �Ar�-��L<�0nC�n�����%W4�B�l\\+�4�{y��C>��Em���`p.ld������8Ч�ՁR���q����u�a��6��()?sI ����%~u}��:�*v-���˩WDL<��]�O��J��>ٴâ\0+nS�?*�|Bп\\R��@�o�ڼ����}��-����~��%��/��}L��0���Ȍ��!�O�T{w}�g��A�;�R���oG���ї��{��O�gܸ�$�����~����Yp��a�4��0��	���ϸ�ڂ��`��~1��83Mа��u�e�����1�M��Q�m���֚佒�ca����|z˭�1�ѱ%��dIX5���K��� ��@�RY�+܅��b��#
,�
��Χ�A�Cg�Uz ��~4��	ATr���

i���NE����;̵����Ϣ�$��45g���L�m����AJ�G��]_��_.y��(���w$G���V����i��*�:m훳R�WWo�aW��iw�����%�
7w�Ɇ�ri��Yn�f\'��0Ͳ�A�?�j�S+kC�ƪ��}�̲��-�3
V�-QYG2��:��j���
V�ӳ���L�F�5��YK�X���[$K�.i��q��=��;7�˺���38ŕ@�(�_�X/�KB	��&�q	٥)��hh���mRWV��M&�9Z
q�ł�R�zq_���ɂ�\\Eg:���t��,��G�S�e�����ܣ�)��Un���P?�M�*n����s�K&x9K�RIT�إ�P�w����l��H����G��a�ˤ#���/5��ʑ��_z�yˉ�9�]���,�~1�e/�C_�t��,�Ho�?��#�gV{��o��Ö�\\�a�}+�-e�z)i�#���v���.o@�E�^���H�2���\"�o�a��Z�.7־.#��zt��gݝ�]v]�z)�_��u���
��>:6�J�
��`�����u��Zf[��:��y�v���;�t݃�i�\'���P�ֻd�ҿ+�ߢȶ�k~r�7\"��|s�
�\"<�\'E��ҹ@���+�y����_�B�t���ٱA\\�ۣ��<�Xuaս�KN�c��z�������(uFŚGo��U_�� )u&���M���Yv�~�c`���ѐ��
P\'%E��
wkO0�X�-�0O��[�q�U�R�-��M��\'J;(c;��.��a��)��$��>X,����5Q�XF��W���0�A��1�{�#��4�.Cxk/�z�O+Z_�������Zߠ_]� �<OV�!-��;�:W�ES&���q���V
k��ַLp�%*���l�tyDT�5�ȍ\\��Cc�醆i�y�T�;F��yY���F�yI�;y�HZТ�������T#:!����JEsK�_-�V�2�򻓍��
�+��ƈ�b��vҺ=	P��{��rJ�W6�����w�=���7�W�Ջ&�d5)\\��^l&Cf�%?�Rjw3q7�JK�z��.#{�%-���A��Q�Q�Ʈq��DE��[��n�\0��l��Z��?)z�X_\\�~KL�,����k��	���|FJt9!�X��R6��W��etzR�0k̏�t�p/s_�#�oǢ��������Jya�֟�C_��w8>_o^UW�8ϓ�V��vD\")ߴ��a���	I�Kl��������p�i
���9-1���%m��
&j@Y*������j�O�a�!!�)G����|B��&�Uuli�VT|_�n�T�sga�ۚM:#�Ǳy�\\�rC�򤼢���{`U��1�ۉ#�ÈO\0�Rg�Z�8����ՙ#sy;������5�t�N��[��Y㲭6��S��
�\\�hR��2pJ0�s�:lwѥ$\'p]���1�T���RA-��);��\'<�2�Kd�a��^�ޮ��$}�aߢX7?t�z����qd.��de��2��j��ei��6����mw\"a==��䌵�=�ͼrI<P.�U�f���~3}�s�\0cD��bW�c��6E4�Ky^d�;��5�����#ry=��e ���$:v�{9`(�y@FJ��v��,�V�W.�g�JΚ{FJymޘ����E�E��0�\'vm��Z����V�Zk���B�g��\\����ɾ/3B���R3b�\0�
�\'a|��f�q��q�7�0ȹ\';����4)E�$$H�R�A*��&��6�����Ҕ��p?�����ΨXC�QI���F���r���>c�7��1T�A�a�VOK)���X��z�~��!(o�����^f#�W6�`������U0%Tj��vr�������@�c��H���j�ݲ3#8�$�kp.�+�Uh����듟�>�Y��j_�m����������h)��+\0c�7��H��Py�Q]�􉇂��h�E{^����Z;QC����Z��b���3�`n
�\"����K�Ȣ��H!z��Aw5C��P�#��v��*�?f���1Fxc�

   
��_,((~%-=�9>�2�<� �V
��}ُe㺻�o~ⱇ�4''{�����qfv�%�������~vƣ��d��DGE��GsA�߬I��w�~@�����,⇐�y[��s�ѳO����Wn���Q���a�=ѳ�K�����hinn�tmݾϜy�SY�9�Kv����7��|B�	xܓ���~�����$�ߖ`��i��i�;���7�d�;��v�;�|"�[Z�[�^���'���M�p��w|�joͿ(�Խ�7�fK��vO~����γgN}43+�Q)��X\�f@7�9�k����?���&'&���Z	,Gi�F��j����>�_��z��bb���Q��ݝm'�|��?\\\L:p��j�r$����B�*��>����?�aEcÅ�i����r�p��������8�-�����QZ?�u���C{��S�++Q�]
�W8���ne�?��c�799�U[[���N~ў舨!����{j��/8��ݵ����f����y9V��������x�e���F���F���(����ŧ���V9&zޡ�o9BD6`^�;���>5::R���7�|�_$�����&��!m���յ:�-tv�߭��i�v�����6������[�CGRJKLl�XVv���Go���>��?V	����w�W �b`J�P��^�?T�kWˡ�ǿ���v��Dd9��8K`j�u:++�{td���q�]Z+���z��|�zY��C�������I/.��TP\�l��f���g3�~JՀ-����`_��K>��R��#Ǿ�_XrJ�~A�� ~�ݞ8������x��5:\���sY�UA<u>j
�Q9DD������������
�_ݽ���
�n��q���h�S/qa����G[b�_��@D4`^�;�J�埛���<�����K[���	����O����@�V~08w�����T���z�=�}}{T��jqIٳ��o+���9�Ě�$c��`�1;3���l����R`�0ﴻ�Jc��j���v���6{Deۯ�lѦ�qq�A���Τk~�!�j�x���l�?ooin��kl�����TIY哪��9_�v�^Q��'�l��
[��e�5c:���ѕ��2��HS��L�5<����lZ&�r���z���x��CG~�����߲b-���ں��.���g����<���5lJ��I�C�ݕ
������	m7�Mi��EOm�z��CG���#ɹ-V�kٓo~n����D�v{����'��*5����ho�Ǟ���[��;񖄈_��GC�	�T�n��W{���H{��W������
�رak���|i���žڊ�w�H3�s;V�G ����[ZZ����<>44T���u%ə�K�DP����K���O�P��ťŘ¢��Uqb�$��觇�G`�Bހ)�>zb|�|�5VW\\���mՐ����� �
&;7��U��Qc6&6nA�Io蘛q�Cڀ)�>cjr:W��Ngj����f���}�`E��cU�<<8P���uK_o�Mcc��|�����&��U^ʗ��:���yY{*���dOt�$$X�����_�dܼ*w����jo��@���o���?^�-��\�
YL��MLL�+ܧ���쇋�G�����Ԥ��hflK��sL���p��ouvvt&��>z����?���G�_�
�׃��͚=l+��z�l�s�ܙO���jn�Z���6���<���L��P�����������?q�ֿMMK�SkU��^/�`*Ø�#��]>p��ꝥ�|3�J�*P�����R5��ёᲕ�;���z��l�KK��mM��K��Tg�X�5a�/4r��;���|���e� ��Kv_w��@)6�mbj��o���Mc+̊)T���/�����+�����LgW��y����/+H޳چ���Mc>���܂�sMW.����3?�?0�700�n��擒����ᇇ�nvNn�j�k=u27�4�T����{A=�g�v���^^Y�]Y^�U�$"�)������x�xyy%֙��e��;�kz�+VB�8����Tg5ZqK��5T΁������L��w�[��K���jF4�

[�̘��f6\�p����ͬ�]XX�h�3b�B%��?NNN�O�$(�)~.&Z�ʕ�WS��tu�ݡ��۟z��������}�~SØ^�'mz%����Ԯ���]�t�W���s***?t��_)��!˰�X�����F#�^�l��KS�/_�h�~Y#b��Y�f�{p���s�>��������i��mjG�r4��p�Ѝ�״�r��/~�ܼ/m���lhh`�j�U���������耂�}%%�/M�'����Z���5����9���y�kl�F���Y������^3Wg�L�D�Wͷ���Yc�����{QN�/+�F���+��Y;[=�ٯ1
Y�3�����ږ榻t^M������y�&$ئ�7d3Y���Y5㜢E�5�T��A�g�0ZK��4SUS���5�J�V��ZU�IcK3,2A�JK������/]���3�~]�p\����(7�7�g����ۚ?x����PB�ʁ�����v��
��?��~n��yAo���qf���-��Ԟ��y����)���9������;�R���4��R�n�������
Z�i����Ng��W
�(e�KU{���
�#��	~�uU��Ѣ�i5۷ʢ�
$)`���g���oz^��Z����s	K�o���v���e
��}Zq���4�����_�*C{�u�^�yM)6��)��u�zZ�fOO��86.v��"���*��S�5oY}���>� 0kjۧ��� O�?���g���CG�\���oA��kMc�����Ɔ�����U1�����m�����?�
����,B~�!>�Y6�Y�Be��zJ_���2:J��W2ɤk9%
ڬ�~ӷ���ڀE+W[)�h�$��uh��5�v����(W��
��1�q�;g��jH���{��*�䈋��V�m�u�
���P�YU�\pL��Tv������v�2��Z�p;��P��Y?ɗ�M���%�O�l�gO���
�;5޵��ɤQh��x솓�ҋ?�|GG����
��p��90	�j�.=v��9��\�x������߲Z_[��������z�EG���-toy�N����7C �
.g��I�2��#n����a�����'��T���Џ�=4e��U|q��l��b�Ihe�k�̢)��]fB��SaV�$([e����k���UՉߪX���	u�M���(mRe��
�v�����ր���lե,�e���N�Dq=r��l�#��h�^���*VH6��Ђ��
�'��t�j�����e��?S�]?��� ��
�@0�h�.�5��y��@��B��a��F�J�_R �j��2S�;g6YQ�]�@���I�OUkO���6� A��+~U��
�@к��q�hY̲�|�7��1�����*��3��i�8�i|���x�4����{��neT��>�������V��Ԟ��Q�A�}]�-�a<-������9h�h�^�&�ZOl�-ߪ8�ez�]���D�����\�0�i��S�����{��T�<�z_��iM�u��g�6��ޖ�p�1+J�xZjAk�L���U�'NY�v��ym˷*Fh���8dv�֦/�>Y�a���K���S���ܼ����3��X�)G����6���Ņń���Ϩ�N��l	өq�
��mf�����q�^M����i���NgS_�A�T~���ε|>����5`&��˯׶�7;8o�%E�Q����������k��~��D�d�n�#����	﬷�rw�#�v�Ay_���C�xn%�~9#3��������ܭ��
_���0<�$�{rr���xmZZz�v�r��2��TQQ�#Z���be���w�]��p�b��l�V��\P\gI�&�@�'n��g�KQ�/ɐ6<i'���'v�oӤ�utl�&��
��T���N��<�
Q~��tv��~�77[��C��0
�S�K3:�Չ�k{5b`?qʹ��3U�JI*hxV�R�8��|GJ����)��=�9�����c���KIMo��]�%��z{�>��_i;
m]l�0u�W���w^5�-!��)0	��#C7��af����E��Kb��Ti��z��yy�/�����Z���y!++��f%�V���,��a�gk=D�0s`���)�i��r��,��^T$��Ԝ���k찆'CNg�U�N��i1qlt�v�\+#3����U�5�t�<h6Q)�O��t�a�ok9Jp0%hƫ3CH�´a+����S�㵞iw���h��0<f�-�N�z�Z�=��p��Bk9�r��23��MN�׏�ߩԎ���׆^ �
.�ݦ��MuK�?}��}}��Y\\����1�������o�#�ё��Z��+;;�Yk������.*����f$߯$�
�Ϸ}նޕ�Sr����Y��1��J{?k
����ܣ��E�c���|�L�/��S��x
�)�M�Z���XXoJJj��f��Xnӌ$�����}�m��c������N���Ύ��T�+yp����e���?����M�� ?���8��z�+�$$Jyw6Z�C�P���<��asc�#����3�s%�zAm�L|�"ݧhY�ӽ&�z'����ԉ]���wi3���G�%`g�0��Wםzܵ���Q�3�U�=*ۭ���s�4�٫zne������t9��ڀ)ΰ����2��{�raag�$��c��ܣ�����1�/�������Ѿ9_��Ug�ۆM��`Z�S.{��C5�S�]c�..-��s���	�3��xÌ2��&����vZ _�Θ�YO�����;�����'�~c���mz��ё#Ŗx�h|\|Pz�f�y�b4d���7e�W}R�0dAo�4�<���si�3���7���`&������ѱ��]����f\}�p^��"���,�jJ�(Y+��bbゲӹ&���u066����k6�@�6��M~�BЀ�ϥ�e\�/_`v�[���1E�t%NS�{�z����>d�6��Û�����˝JNIi{s���b(I;�`���h�O��6ť��z1����7`�v^H��jR գ�����;&�O��2��:>���ɻv�=���vf���^���ɜϗ��I�ɽI��`]
v'&&�i&�T��Z��m��-,���G���ߪ*
�O���`&�-^���K�PrZ�|_0?C�����lVUU��J.js��fURf�9���R��������j������c6I�n׹�G;ai��l�aQ���&��:�7J�.P���	�5b$'G���l�fw�hX5�:J���V[�m�`�fm�iwuww�'�5����ݞH��Mz����j���y�/966f.&6fC��|f�y�X�����׳Ŭ�ݤK�?!��Ò`��B�G����c#wi���(T�a�{*;:Z?��j���*�Nɻf��
~�gg�RT\�]-��R����v~Z%wvE�*h�i[��֖��
j��H���p��lE|�b_+�5�͕u]k���̮�֏wv���~������������,��G$�
���F딻e�	SI�zgmz�6�6_�������Ұ�}���4EQ��n�oJf6����][w�Ϯ�Z�[ukc��_���f�����2��bUS?�.J�p�\��*��n��2//�٪�{��LIk��
��X���ZT
���g�(����K���dE��x�������Q�&%F{6����zU����t��ZT��m�B��u�Mo�޸�2�]c#�/������A�����̺PVV�͔�􆄄Wk<]7����2��W8�5>�����C��'�K=YSW�%-�~,ёDU��`F�k�{Op�'�:�[?���w����5;�Ԃ�kB�?#3��4l�J+~�@zMD&h"�f^�"�3� z��uw�~����>- �S\c�������o+��Y��{��1�K��6�pd*�v�����ݽ=���StNn�����_կ�iӽ�n%g�f�2OTZD�-�f�7Ku�)�ԮdgJ�)�d�C�&Џnd
DT��<�kl�����c�ҾS��v��SݭG�C��~1{��yԐ���dIU_��33KBL5MM$�f}��d�POO�{��:633�����ZY������$;���$K�Dd>�:+���L��fֲj�H��
INSERT INTO login_credentials VALUES("2018-00123","Jia Penhallow","1234","Student","����\0Exif\0\0II*\0\0\0\0\0\0\0\0\0\0\0\0��\0Ducky\0\0\0\0\0<\0\0��http://ns.adobe.com/xap/1.0/\0<?xpacket begin=\"﻿\" id=\"W5M0MpCehiHzreSzNTczkc9d\"?> <x:xmpmeta xmlns:x=\"adobe:ns:meta/\" x:xmptk=\"Adobe XMP Core 5.6-c140 79.160451, 2017/05/06-01:08:21        \"> <rdf:RDF xmlns:rdf=\"http://www.w3.org/1999/02/22-rdf-syntax-ns#\"> <rdf:Description rdf:about=\"\" xmlns:xmpMM=\"http://ns.adobe.com/xap/1.0/mm/\" xmlns:stRef=\"http://ns.adobe.com/xap/1.0/sType/ResourceRef#\" xmlns:xmp=\"http://ns.adobe.com/xap/1.0/\" xmpMM:DocumentID=\"xmp.did:E97E2EBB330411EA9A26B5BB3B50F665\" xmpMM:InstanceID=\"xmp.iid:E97E2EBA330411EA9A26B5BB3B50F665\" xmp:CreatorTool=\"Adobe Photoshop CC 2018 Macintosh\"> <xmpMM:DerivedFrom stRef:instanceID=\"2C4DF1CCDF91F0E5788B8BDCC5BC8CBB\" stRef:documentID=\"2C4DF1CCDF91F0E5788B8BDCC5BC8CBB\"/> </rdf:Description> </rdf:RDF> </x:xmpmeta> <?xpacket end=\"r\"?>��\0Adobe\0d�\0\0\0��\0�\0		




��J��J��H@�0A�T���\"B�� iB�ڢ\"sQ��Qb9�X���DD���^їb\"s0�Tu���pa�*T۲��/Tu[u�cw��ʣ��~^���gu�̳8Խ��t�XӇ҈�a\'��Gs�d�����d��Ϙj�Q��\0�@��;_E��f^hm��GCM;R�Gy�*����b�/a$TB�+���&��\"��&�R 3DJӈA�-�]�D
�J͉/W��sP
��DP�8\"�G�t$�GL��׻Z�]f��B�^�VvoĎjV� \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ (P4�i@Ҡi@


!���tU�lъ�F+���uY���W�踳�)]\"�F�\0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ 
�
�� i栍�DF栅�U�a�VP^il.4\0T�+���%�.���Qܽ=��&vd�^�s˹s�g�]K	�a�썣P�DJ�@�>�/:	�֬FW}�Q w{U��`�T
`�
E@ D@��5�b<���~XDN�B������\"�tŧ�\"Ŷ�9
�� iB�75��\'2���b�S\\:;g4
p]4�<������{3Uv�ϋ�RZ�M2\\��BjO��V�P�y@Ө�e��.��\"9�J�FCt�T�v�Q��
�QQ�E
E\" T!
)(�PKU�c�[�D�D
E#(�E��A�V���+Q�߀�P��-F+��1#�DUVT71>�
�\"D((
�Z�\"�B Ag���4���]&���ر��!�U�:�6��jU���\0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@�J�
*T
�� B0��s��#s(�Xe:џ�9��]x��svx�ᩳ��n�]��
c�\\���
)�C��H��x΀x��>���i��m���q�
&T
0��\0\"��aݴ?M�D�x�&�w4�mV68�
aE�gE�C�z�u^�]\0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ B��J�
��[��,�kNl��9+�5��3@��
���@\"�*���ݦ������@������\0��û��ޯ�UE����B�\0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�i@ҁ�J��J�
(@�
 J UF�6l��
�@�R.RښN��J�ߗ�%�`�,b^�N�Z�Qsw˪�C�J�wl���WH�E\0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0P4�i@ҁ�@ҁ�J�
+���46��@ x����Y��{�K�U�C��\"��ōk�b�
��J
��E����������.���wD,w(%��tw:+F���DG0�G=��X*�@�E\"!J0@U�*�c��zH�)4c�*�{�RC�WX���(���\\\0��F��9;Tj:Zjh�\0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ J(P4�iP4�i@ҁ�J�
 DB�T!B�=�a��&�f��Y��|��w���J����^��L<�S7,�G!�\\���*\0)�\"��`h�(0���AP�J�os�<��*Ռ��U*!P���D
\\�E!@� s���56\'��@�B��%����a�(w+}���w����)�6� �}�/!O�9l)����TJ)� LP�E* ⊒1�DzF?L�=��z�f�i�äX[��[�#��E�F�F����=E\0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ (P4�i@Ҡi@ҁ�J�
�
�� D�DR�	DP{�Q]X� �ٟ Dv��j�@��!{w���|��V_s��\0�Q��)��\0��j
�XP�PQE�\0��f����4���
#����#
�Pg�C_hB%��J�]r?�*E�G�Gr�l#���}�4�@h��G-�lhs{B��A��#5Ȣ�8�xQ�L\0Q�p(G#�QITR�@4�V�5�$1�R3���?��O%�֫Ǖe�u��Е���nTYt��\0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ 
�5J�
�j(P!@��� @�\"�\"�DWR�����\0�����Ҁj*@��M�˧]���E����.(:�f�Y ��V��%f7ۭoq�z������\0�IH�U
�*J@(�T�TU���NͼU��͞@�:��T-�D���(|P�c�R����w�T�]�#�E�\0�����E��0����C6�Q���TUC$�b��\'̊�)\0D���QL�E!(҆0�F���h���&�eڼ�{�`�{���Q
���k-��RF�Ɔʅ���u��\0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ 
ޓ5˗lG�;�Ӯ�������oz��N��Y�!õa�#k�������[�茎C�V#��@~9�<U� *\0�@ 4�B�@*�@�*�ӳn>p�[dG����]\0�{�HJ%e�q��BDAUW\\�̕\"��C����j���J2����)��0����2��L�ʁ�z)�@�E.�Q���-���K�ҳ��\0�\0,�h�[C��:�kB
(P%QuEц�B�zL�>K���#�η��
�
Um�y�80avU�x�T�C8\0���i+�5�;�F�P\0�@�E*���nͿ�5�`�mDv�4
 I?�Q+1��?�R\'g�AYu�c�)Q�\0$w\"���\06;��F���O��vu��Y`�sS!$sHA�%�Yh��4HAD��� BЂ\"�P�}�/�˕Z��v�i�J�w��$:!\\p\\kժ�0V�6T\0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ B��
 UEQTJ(@�f�ӳo>p�Yd|�Dv4b�@,��
%f7Q��%H���AYv?<w%\"�:��r)���j#IjHg��r�\'�V�(����\\P8�]AUIE%P!�0U�sA�١jS0�Z��zN#��ŧ):���L}�5�g�E�˨@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ (P!@ҁ�@ҁ
�
 (���D�\0�E0�VZu���j�k�\";�y���:Q��ۮc��\"f�\"��G�	R,Z)�QQ[���wڪ4v���G-�\'Y2�
���5�
����0n �饦�}���:<��Y�?,�v�㸟Nk��	��i�K��-�z�w������m?L�[5�4�������g~,1����^��L�?
�bJqS�Ψ����z�ژ���-ϨnoI�%k�gk\'gM4�樅Kˎd�;�X�\0�8�G���B�����G�5��N8�v�b<�v�\\�o{���8�B�@� T�
 (��5�ݻx��6�� p(#���Q+1��G�+D��RA[p��JE� �;�TV��p��F��:��t�;�YɿJQL��1�\0j`%(ҁ�7̥X���0s�\\������y�F���i:���#q>ŗi(�\0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ �i@�J�J(P4�B��J@�TP4��i@�
�@��D
�@�
�@�f�۷m?�kl���#�D(���Y}���3O�䂲��zR-Y�C��Q�`��Q+Yb�/��}��c&4T28\"����Tѵ�4Q#[�L��q@絺p���h��
UE�*Ɨb�@?��Wh�\'�`k6���s�=�Ji\0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ B��
�B�� iP\"� D
 T��ۻmp�]e�Gb t���%ew_x�J��A ����)��P�QE����}j�j��Fx.���\'�U�)��+��5*4`8��c�J�*���B�ͦ
�Q�W�+Z�{`lWv�����Wgѽ��e�����F�\0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ �i@�J�NH�i@�P4�B��P5@�@�P\"�iA���\'��n�[�]x�WY��t���ޚ�$�8�PIk�ut�r+ve&cU{�\0�f�5��m��i+�V9û]B��kʼ�y�+����w/s�y$�Ƥ��kr3�s�.UQ�Ojk}N��� ��*�>�o$L�b�H�<��wItD�UX�>ާ�K��V*ڨr\0@�@�P5\0@�@��
 (�DsXm߶�������� �F(����J���?�R$�[7��bR-�?(S�)����pH���g��v=�X�_.a�MMQ�q@j�/@k@j�U����ohs��[�|��n���W7J�ߗW-�g-���*�ը�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ 
(2�M��W�F\\A|�����鮹r�|2�37V�t��i��>Zk�6�/�.G�[i(j	a���(�m�\09,�Zҝ�T��؁Z��v[�0��d��}�LDq��G��/�sN_j+�*�@���B����(�PDsXm߶{����F�Dw��Q (���D���|����N?�����\0̟�[�^	�0M��Z#ID��.��b�.U�L%LD a(�! M
r@�@UT	TPD��Xm�j
8d��7�2(�����P4և�~���PtD�P���y�WNc\0��O\\�O!}�d�Vgw�.o@@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�B��J@�J(P\"�D
(��@ҁ
�P5P5 B�
���@ҁ
�P!@�P4�B�
(@�@�2����#gڷ��{������^�����G��ȊKo�� ������h�\\�+�$�7pZ��:�����򣨢��X��\\��K*�c4��R�������PY=�8+��+��T��\0�F<��\\s&��D\0�P\"(\0@ 
@�\0�@�\0�qXm߶�����
#���:\"$�h�oj�+��\01��Dt�\0�Wq�`�%\"�(\"�ۅn�pD�m�ua�]cϽO腬9��\0L.QM	�Wo�e�Lq�6�`	�&:��}�����	�+��9�Ȣ廾�����IB0+�e�F��Q���G���]˅�Z��X��[�m�«8t�%TP�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ !@��4�B�i@�J(�i@�
 (�@�@� D
�(P\0�P\'5���o�k��`Dv� 英@��[�X�������\'�I
������1���I��5ʁ����N��6�7��k,`�J�9ɇ4�TYD��ZvB�5T�t���AE	��/A�BE�����s�\\ww����G!��5u���<�m^^G�Z�����]�g}����jWs$8(ԩ���\0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ ��P!P4�B��
@�J�F�U��ܴ���v�x����{�v��7\'HFqG�\0*��>���wr����Ĭ_YJ�f��WSҙ؞ZWM����g��\0�.$a��+��:�vCY^y����V?KtE�\'��T���i�B$��*�d�PVos��q8�j2�nҗ���5�P�
�(�P\"@� T\0�A	�6�����[d-��*�?��U�Y-�~k�ZGQ������>	H����v�R���
*\0�@ ��6�����]b+Q
)�T!@���RQܐ�tQ���F�j�s#a\0��u�9wgJ��N_�Hӯ�[<u9�\\�ݰ�X�	�!6N;�b�Gz�n�;�c$�J�c�-�d��\\�P��\0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ �4�B���P!@ҁ
( j@�!�J)K7I��}Ak����q,��M1�Q������Le=��{��t��k>b���/)���}�f�.>��G=�\'u`�{9�-\"��n�)I^98��X�K�A��\"�J�Wd��o�M)�A#XXjFh%c�Q���[4�
��X���缭��ms>(���%UT	TP@�*�j�*�@�� Z�
�
�a+
é�}P[ZJУq�j
 (P
 (�(�@Q (�\0@�
 @Qg5�ݻq��o>F�-bp�A�(���V%c����%�:�)HUD�����@?,w$T�SK��֊�\0Dm��˱	q�Ԧt����mGü>��
��׵�4���JTd,��z�v�}�@�a >qS]�h���k=��X�Z�LJ5�¨&
.\\[��e�i�\0�YV&�$��p�[��!�is݇p]tr�2ۆ�,�k��j�\'�j��[��w�vl��֥�yZ\0ϊʺ�q�($`$|�e����q������Lv�*+E��8���r�~S�Q\\aP�\0�@ D@ LP\0�*�PN�6�ہ�
���@��|;U��:�~s�h�ǊD��I�̻�)��A ����&�Z���z��kJt��h�ꅮ�@+�y^���g}��4���3���T��k���*k^�����[3�M[\\H\\�9���o=�vk��}AN�^n9{<�u陬�d��-/d��USٵ��*8�9�n��t�1uZ�вy@�ISm�k���\0j�@HcuY�s���3�p\0�.�lx����R���d^DLm\0�����,�Mˋ�]]#%���5g�i#[F-~%k�l�si��lCV��bFv�6����Ò�,��Y���hQ]��T\0|Tn:aEO�TXr(@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@  D��J�
(P!@� D�\"�{�\\��v�(�Z�{wJ�p/�����B��npk?�@��`�=F�,�J%yΘL�����u�+�@�h�̋��!�ڛ�i[bVM���7���TtZYBp\0T���h⣀�(ӧT9�#&�Æ($�=GQ�H;ȁ8vsA�߮*����i[�=K��Ɲ��hT \0 P\"( \0���a�n�?0 �m��R����@���`�J������H�y�J©��\00��*~XH�N�o��p\"�+;��JK3,�GTP`���{���Ѿ�ŴsA���B�ӻ��䳃++��͖�yA]�����ޯܭ�{�pq���s�jߌc��-+��Z��湴pȮ�g
�%�Q*��P�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ (�B��P!P4�B�
@�#?@�,C7��g	OxC)��V��(�7IB���(�5b�\"�������+�wD������=]\"&��G!����r��OL�1N�V�;1Yo���<�ǹ�<�]5r߱:�m�����
k���r�Ǐ5��_�Q������*s�UcCENc$TRCXښ�A�l	vxPKy-p�	�߮�%uq�yZXˀ�x
 PP%@QD	DD	D
��QJ* @�\0�3��n����A��G��Ad֨$�G{�T+������\0�g�Jª&�{��R-?�,�H�\0�Z�V>��8X���/��Ү=W���r�ۗ���C�Wŋ^{���d`�M+�WmdÍ�Yxvk����\\h���E��G=�ՠ�)B����7�J&�S��<H]�p���,V�J��Ǌ�k��|9��E���0=�I�m��{�8�8�^���B#� S�X�c��k7��xn�=�u�[m��zy�Ԥ���Y���7S���p�x�c�ɽ�H�0FG%�&�����Do��^!Tþ�LkqݤpQ��w���bV�QB\0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ �B�
(JP\"=�cK��֎\'\0���|ڭ�]%�0΅����-��[c��nT\"�,��\07-���MHLU��bGT�U�9\"��#_C4�5;O��F�����ږ,�_4�9�i<0E��\'e�R*4��qQ2�=�Ej�4S��.Z\'�۹�s\\@*�UL?����b�6h$���p/������������Qr��l�#ys�^�U�מuۤ���`�K�#���s�+w��Y�wZ�N�S\\���y��E�;������Z�� �VVI	䊇�&�ƹ�$ii��qZi��
�	DX!P�B�qXma�c A��[�mYM��5o��0V3X��Rv�\0�.�XHUD���w��Y���B�zC���˫鮗o�M�x����U�kW:�bV�V^o���<��5�����v��f��j�C��E�5�\"�+[�F��ͽ�ݝo}iP�i7�e/���!C�.�;%�m�Nyk�q�t��idq㪕K����3�1��:GЬ��͞Y�!Kcz��j�ߡ���+2�F�n��<GO05�[׻���
��J�E\0�*@�\"-+
m�s����N�f�=W#�w����7<ق髞�X۲-��s.
�*�
�(�T�PzB�Xmٷ6��m�F՚�&���k�@�ʟ������ĪGL��+
��P���Z�句������~�{5�Wv����^m�ݵ�c:��y+��MV����Y��R��%�V�:�\'��?/6K�^���W���_S�����i����Z�Kj\\M[�0��H�$�C��i���T�6�p�1QP�\'ִL�m��aL�MahX�����_Խ^/�:7�4ihj��ϛ��H��ҡg.�q����.�(E8�Z��:���TX�h��F�(�\0�@ \0�@ \0�y ��\0�@ \0�@ \0�@ \0�@ \0�@ \0�@  DP\"@�A��}��vEx�Ǫ]�CL���[jֻ<�t�l5:h|[�W��EqS���k����&6�B`�anOpyD�n�kT�f+o���Y����(��-6�XH �Q���0f=���LB��V0�8�]�	(U=M���g9U�����t��\0u�w[_[s�NEbl�N����ŌCK�<(�k\\�����.vD�RH�p▚�(�cq�IY����\'� �T�q%����XqDt[T�����DOq͸\0�>��>���\'������*D%@QB�(P-
�
)�(
B�h�(�EUA�A��,6�ۜ��nmcj�U�TD�� f�_��Ĭ�+t�~%����AXU,���w��Z�aE?j��w\"5LW48�FJQÂr��n)���aڽ}�1L�6��ۃ\\���vؠ�������:����:�(�Ikg��H�����r�����)�`u�0p5S�̊��5)X-���%��eu�O��+y���&`\\
����C!��JNĕ���x����lz~P-08���4�9�JäCq#�d�a��!�J��@��6U�� ���U \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@��B�\"�S���m��(^��e%��:@iޥJ�]�Ģ��Fr�M�8OQ�b�\'����2�M����L!���x�.��P�@�iL\"�v�{����\\*��#4\'�^�E�
����-\\|�PyG�?�cڛ�����b�l�m�R�b��L*6�&�
s(F��\"\"���v��|`�9wWzp�̫�[���2>����U�T/�@��@S���@Q@�h%��@��Q@���TEDB^VX�D��y�7��ܳUjʀ����\"#�YKQܬJ�n-���Ĵ��7�g�?Ի�)��XQO��rx Շi�q<���Cc����\"��
P L*���iŸO�w.�G9��c�\00s��߆Xy��ȸ��|j��MM
�l�9͌����\'�D0$௑u)�3�W�<L5�Jy\'���2�j�<\\����W&609�PS
����e,}�$�O�`��6n����d�*4��\"i�\'�B6n&u=�Ј�����RFk�E~*�k�c��l&?p<ꅽ#��&�#�k�@�56]2���e��tZ{J.��	n{�J��\".-��\'.%w��h.!�V�<����$<t�b�U
�\0�@`�@  
@ BH�r@ 1
�S�TT h
��-�,�5AԣA\0�@ \0�@ ��#�p��*P�uzL��PUX�@ \0�@ \0�@ \0�@ \0�@ \0�@ @��<�\0�^�h�[π�G8���.[kսvy^�ig�Y�~Jy#f���7` ��Z-���ๅ�҉���\"g��V�	j�O\'=��P�-r�6�J+�˶�ن�ܟ���-������)�
#a�N���}(�hYO2J9�i�����Uז���;���	���4��,3\"C��J�U^�f�kl9��My6kH���m���l`���A-*iÊ++r�.H���cf�{��HV�.�t��	�-���q$�MO���
���\0�����
���C%D@Q\0�
HXmi��j�������,�X1KA��-��ڷ�kVk�wZ�����O�+
�\"���b�ͤaA6��j^��Cx�m�\",Tj���V��$�U��x��g���}f�-�ܼ:�z�;��mle��oVw�/�7x}=�V�c�}�{>M�p �\"ۦ�����3������渆��Mq]�.c�$�^��+&mrǚ	�pq�C�No��2�\'v7}
��ݍt�q�H�*��n[�텣8�8ZֳcG6!S��К�⢦�#�Ϗb	�o�h��{65�vb��s�2
�����JR.d�RlM�Խ�}4���q<)��E[�j��V�Tl�X=��-Ȓ�ntz�����:|;{��^�_\'uoRB�ؾ���T�G�=W���cZ����_+~�7�1�ˣhn��aSE6�ޭv�m�x��U�Y��k���2׸r$.�8T�]�[������a/g�X޾��\"[�1�>	�q��>�Iςô+ٚ�4(:[�{B*CTD�?�,t��\0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@  D@�f��~h�RI��7�i��v�w4|W�u�a���SMV�X�s>�7��z�X��W���YR�	A�P����2�A+\"�S}��L�tX[}m�\0����)gGѝ����1�w��\0�~�U�#��~Z����.g4��{W���r�\"}������6�HxG ��H�1�Zr�A�%�Χ�z��&h\0��#؃�(�p�T��� �
�@U�@�j���
�@����a�����jR=gx17�b�鬨T�B�
߳��ZH�����w�N�%j���\0�\0�ħ��ԃK{ m��Y���q8)��9I��0�����������}k��E�2�ڰ���W��+:��Ѱ��iZ�ؽ#����M���_[I�����s�ECI[g	6�b����/e�����j�q���ӣd��W��wp�Y��z�&�
�Q�Z��:��8��m^�Ӷ�������Г\\sYt��\0���ю��0s��4T�ix�;h \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ B�
�A�7d�h�h <&�5�:�z<Cx��~^t����y�4W�e��7��*[����⬆QZ�!u
�2�{����ᬸ\'�h:B�L��殡��2����-M)���\0�,෣�.���`��l���������&����H�>\"f��*����\0p�ڈ����;w�����#L+K��N�t�S�PuFַ�q<��0<NekpPdz�|\\8�Dy}䞭䯭Aq�`�`*�@ P:��@�$\\��
*\0�9VX�C�Z������,�^D�Lꠝ��C���7�V�J�����Zf,n�
��\0�.�$�O�XP����|��C�A���=�f�Rp%F�L���������Gֹs�\0N��g��[8��W��_K��P|Ý�m��=ӂޓ;9oq�滩}M�gf5P/�1}��1��#5��k-�?�n�X��kY�q�X�ڿHUq��w�tyL�6�Q���׭�>)GaD��I�\09�G=�^��>�=@��WO���E�n��}�.��P�I�y(����P���-5@��h����(@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@�(��x�}���n`�F���5�l�р����,V���u��IX����!pO#����<S��Dͼ�ՠO#�$��\0+�
����2�s���բdò�X��\0����e,���������F����q����N�Ⓩ�r�T�K�w ~?�O���y�h��EU�V[�7&n7�
\0�P@�@�!-Xma���j
��\0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ @ B���?�:�:���t��ϴ�w�i�E�<����y�*6�^,���6���R��j알�c�B��W��*���p�6�-3\\�� ��M���:���\00D۳��R\'4��<�jiG����j���ug�{��U*K��$b]_�A�}{�ꛦ����¬�ά��9�8��#N�s)�T����Q�e��Pv�:�L��1d
R6��&m��:���S�<��Pˎ�jskL�L��.��Ǻ�������o�}
ˢ7�Â6��>:cv@�h�f z(@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@��@�Py��}�LȪ5B�1π��z��F�IXPw-�Ů���4�W�Q>��T�R�m��M��r4b3A�,�S�]�Âԉ�,S\0U������Z
c��`��ޏ~鷶���A��P�__����� &W~�?J�G�Ԑp���C����`�\0�!Y�mB����3����=-���A����QǵAC�S 1�WS�V�f���Ծ�\0��{݊��ZAD@ T@�T$�B��@ *��\'�\0�P8˱Xmg�����-�?�or�ij�B�f9�����E�Y�>��c�/�i\"����g���j,_H|��4�/$#��R�B46@���
�L8��C�\\S&�6����ef�=kwl#��p���Z���F��E��_-fz�яۥ�yN\'�W~;��9fu|�tG;�i��]����c�� t1��F���փѢ�1nB��r�m�0���~�]�g,�W,\"dj:�4\0(���f��G�\\�wcwѽ<��L<
�@�z��\0���]��X�����̍�YM	r#�����������[��S<�iR@9���.�Q�\'�*�I�G�9��H0�Qr�����,��ֺ�o��GvAn����\0�!PR 1@�
��(
\0
P\"@Q	�a�����G��mo�b�i`Ȩ$
�z�ԫ������o�Rv<)F��&�ń:����gMT.�͐�����i\"dd�ڰ�]Y�4}+��nq�aP�Gr���-}��-�Mp5��^:��E]5���\0Ж�m�Ɍ�����aw5?8/�/Gΰ�;˘f
d�[IA��5|U�a��
�����v:���U��7J
	H\0�@ \0�@ #�i:pu0=�	�G��Wb7	��x�J�i�9��sH+/.wK[��g�k��T�]���H�#�h*\0�@ \0�@ \0�@ \0�@ \0�@ \0�@ 
@ D����b���np35�$V��.���.��l�/�+6+�c�(�
�Y��k��+�C�s�&tR�$��_s�	�\\���]^W)�?��;�d��k�w��?����,��7�`x�rx9�)�p�\0x�h��<�fJ�6ޯ��֙L8��X9�����D��7b��1ih\'>H&�U���/�h�֊į�˝R2!��]���2�`ZD�@�C@��D\0@�D)@��T
*�M0�D�������	DV����b������17�s����dt4P\"�w�\0���oG=�]y�\0�7��]�K�}*�|W���#A9���Mne�ԣc}i3�[�!ab�M�r�W.y����!��˻K���~�Gh+������/�}%�-�������݋��3��+ZhH��Ǯwc��G���t��ēW����҃e9\'6���nZ��z1���
�L:6�F��΃�f̒�ӣ�~��hl=�j9�@>?j�k\'�Dx�R����9����q0�P�U2�S�s�Eu�l�u�=�
֕Du[2�$�h3}_p��2[՗��sz����0�]\"W4ai Q���
�J@�@�R�p@�
�,�*��j-�Y�*a���y�XϓI����s33�X�Wn�~���L��4,:��ڪ��wK�^\'�Q7�V]��ը��C���EN$*����W;$	��2��{�G�v1�\"�TF�.�{�p�����y;�e���K��u����T8 �� D;R/E�R�Rԁ5�=CT� i(P5� p�\0P@�@ �-Xmo�7�Z�X������ζ�g5�t1�>���y-h��n�6����1ip+�~,n?����� ���=yy�R���w$v1��#�\\�nE�&��MxD��ԭM��+�����S
�/���z�����٦�.\\s�\\���)��.;\0+������\0��O!f�h�m�����)V7W-?O
�st��kp��\'�;�]����O�x��H����Z�l��#H����J��
@ Px\'�
�\\P@Ҁ@T�UB�\0���	@��\0������c#�mT���9���\\��� ӑPO�� ����`0൫����1����E���^�+;\0����\0j���@����\'�
��Uk�mF�0s��[�J�|�+.����d����YW�T���Z�����釻�˪ӒΗ�<��1��L�W���߮>Ɲ2�-��W,��<XIqv�Z+E����� i��{��Xz-��Q���~��V�d��7K%�=������K�e�ﳝ�ny-Jō�B�&���
�g�][��k���E�F��B�@�@\0@ \0�@ \0���C�Anm#�(�@ \0�@ \0�@ \0�@ \0�@ \0�@ \0�@�@ <���Ǻ����Iw�y95��\\{f1w127P���,ut��xc�@��]h��
��}�=U����
�L��mq���ЦT�؜�jdKմ�ˑ��L�U\"������>��`Z�F�!y�����y���m|�i��Mu[���s�.�y�\"���Mh�\'����HuT$՛�~\"&���%pJc���	)�ד/�_�8���7g���IZ�ec��;Ճug;Ҟ,��>��˱$pv���y,#�)U�S���\0�n���X2F
a�A�!\"���c �]��Dt��\0p�ڃ� 4��^��cb{[�\0}�z�^+��&�����7�Vk�-!B�DB�
 Z (�@�B@
�5�`���6�؛YZ�X�m��;�*��8\\�2`�D�\"����طz����\0wVw��n�\\n��D�����}��/&ŀ(.z
�{$���O
G�PX�_K���|0O���������٨32i�Mz�mlT���������~,|�����1��\0��\0bx�%JߞWKC�D�Q�+�%q��Q>�LC��-��5ī���]P��ݘ�ͳ�V�IO�j�j�$�0TПT���>f������ٷ�B�
��J�]u�[�A\0�@ \0�@ \0�@ \0�@ \0�@ \0�@ @溴Ɔ��WR�vǐH �v%u���z�V�怮�vrۺ�+�Ȱ�%��wsϙԮi�:���n��4��j��nZ��ɐ
�Q�؂@�)h��4v BЀhTpT-	@��h@��B)��N�P@�L��
��J�k���s{�j��
��g�K)8U�cv�jw郭X���]r��	r�(�g���i�%��b�Z\0��c��__�>��0��+�������;l�FK�ן����\0����k{Wү��6�QV�1m�\0r��
��z:qwY��v�{��p�u����EP;���w�\0�Pt�:Q����`���>��ެ�E�!��j��u�/�G;Վ{�f���z3��J+�ђ�Fp4W#A�@���=�7�ݷ�-�}���ؼ���FW�]�Y�	�,�.l ���BE8)��vK��c,�
�Hͩ��<��
׋>Ni6WgD�e�wj`�%X��2_��QS����~���/,`�%�y��(���Va��-5(��ө�qZ�}	�,
F��7$��5�9���՝�[���U�Y�l&ڠ����*��h���-�?�LV~F���1o��R����N���v���S�_��})ee��\0�Z֮0�q�I�*��+��
r@ʄh�V��A��	�@��@� Gd�	ʄR����@�J E5�QQ9T3�ڢ�@�DC��������=����]^����;��QDˮ#�E3}?����yL����ֻV\"�q���pR��w�\"���Z�_\\>�or������\"��Ɵu��dx.U�)͹&��Þ��)ص�;,z	��\0�ce0����O���o�}!���V�/��rެ�;&�k�ԩt�黗?]^�@��ྕ|���ԁ�Ĩ.:[m{�2��˷Gn�\'\\�:=�SL��
��1���i\\�m\\�w��-��v�j�u.��\\�nG=��Vkq��V���v���UÚ<�FRW�ҽ��(n:�Y�	
�d �����(�4\0������&��Ԍ���Ӳܚy#JV�^�.]o,�k�h�rS)�u��gulDn�:hsJ����
V�67���&���h�����W]�i�x�W�v�r��1�Ĳ�B�mq^�fc)y���h4VoK�W���d��Wγ��YۜN�O6��m��kSj�X�\0��<A�q���p�mly����x9�rO3�ٴm͋y�{�kfa\'�-M��N�z��a�a��S�]%��gV\"QYʧ�S*���w;�kq{PWNjkJr�Jg�Q���3�A��i��#�]#�r���KZ�<Ӹ`h�,cY$�
�\0���\09�q-�ݍP4��@����sA#T���P�NH*x����?��*ǧm$z`v.5�pY�Q;�����z3�ʟ��?�.�j���p�+%m�`ڵR/.+�TpR-[t8��?������}�*2X��*���\\��[y�4T�NKR3vvtU�m�E=�ָ}����߹�h��������ެw̶j�f\0bBޟ�1���H�IG?j�5������0A��o�b*�b���_
����6]#������[M�7B+��n^G;�,�IL�k-�G�Shj�L=_�X���J�cտG��Q�raPWo�\'n���<7zw)?ۊ�N=t����7$C����[�S������ݵ�t��)�y+���?�g�j��y�6r�ӵe��x��;�/nVv��ƚ����꫿���kZ�l�4�+��8^�rTs�s�}x5u�q�3�Vw�ҽ�⦆�����-jGSo(@�޳�$�R+@sW�O��+��1�\0�T�>7���m��0�Y˶����EG4W��ױn۾z�;��I��Fx���έ?�i[um�y�����L3Sխ^��A\0�@ \0�@ \0�@ \0�@ \0�@ P���;�A���O��ݖ>k�9dݥ:O�Εv�]�lp���4�j�d_�����Z�@�e�����ǸJHpk�#���ۣW7-ãdl��cɿ����vݲ|%�[��h���L6ˣ,�[�1���\0�:��^~mz��m��֮l�s����CJ-]n���IԦKWI�9���4q[����u��p��&�l�Xb��.�J�斻\0�՛�+v���&�ڟV7�b�\\9�\"��F�hܮŹi��J��4�`ը����W؂�Z�9�PN<�L��iϟ��,�������T�J¼����Z\\H-i����Z髝yp�ڻ��a��=�^�r�P *��
J����@j
�Q
A��Xutэ�T�N�?�.����k���$+\'g����JE�ȣrB�z!�fy�坖=*[� a\'�%���^\\���t������eO?F_�u$A�Q�ҫ�ٿ���k��D�o&٧�/���άw��8���E�?�<���V�I_/�Z�}7�ö6Ϫ��z�S����{霴�j��ӣ�u�ZH�6�uq���\0\'Ni�X�YjZ�o+���pj��
���\"�7TC����k&8���Qe�$�������Z�f�}�l
A@���Gj�	5�@�<�<��O74
\0sE/�W 1QM!�jD�� �M.@�@�dj�@�UEi+-4]8�faY٭^�b�\"˅uvF��\",ash�������WM�yS�x�Au�F�s��
PW��U��7�Q�U����(�Û��wg\\J�6��Fr���ן���n,tT�2��a�ɑ��T;�T\\[�4��4z�ɐ�kS��\\���z���A˹��rv�(���{$��7�
��H�r
�=\"��FuK���AػG
ֺ����ީ��1J�-����sin�K��_R�r��_F�7��S�-Kњ�+cn���~�]���]�HqKB�q �ܥ0�\0)��>�C�\0�@ \0�@ \0�@ \0�@ \0�@ 22u?AWԲX�Y۲��=kԮ�z�=\'>]���
�(�Ò�U
�܀y ��\0
�3���-m]t�{�7oN�D�\"����^���;!���L�� �Dr�jJR9e��iY�xE�$�\"X�һM*���vD�kֻV�;��}��N]4r���G��J�<��2TtZ[z�Pb��Z�f�l-$�䷫ݬ��q1�t�{���ީ$x����{O�VkQ�6�)�[������wZ�(:��6�l?�bt��Ŭ�����\'ԃ��g�\"6�-�U0k�Z�Z\0�@ \0�@ \0�@ \0�@ \0�@  �5���}h*����G0V7kW��W�ϸ��
�툻j��\0Ozn
�R��3x��y��MX�U�}H�����>BI�	h�>
PB���`9\";Yn�7,U�f:��k�4fx��������]]Or�WO#��\'�z5��V�4�Y�4P:�
�*+�!�8�J\0�DP���*�J�h&��p��
�\'��\"�P\0 T
P*��qYi}�Τ��Y���8��]]�ǚd��S)�[�&��Zэ�i�\0��\0x.��:�w7J��HVN�ߞ��V�{v|��\"�wG<���+;.�>�u6*��;Ek�x*+�n)V�jF-j~S�4oSG\\�@^o�:G��^��-��jb�g]�W�|�|[{�8>���O���o�x���`_E�t�$��F�u!\'\0W~������09����YY(��yݐ�A�AaA�Բ=�䳿��\0�ueW���^��9�{���������Wr�r��J�pW��䨆�ePP҈/�J3�XݽK��[@/-��z8GU6���l��U�m���q�+�g-�t��+���*)Z�5���{�)�j}Bd�9 %2X�ݦ�ۻ�w�y�	jk�z#΄�ʋ��:��+��;�kpZXsx�w�^�Z���vU�t�6\\�+��q��1ќ���_�l�?�]{1]�H�T76\0���]8�n~�c�B2-�x� ;�Y߻�g����\0�@ \0�@ \0�@ \0�@ \0�@ #�ִ��JA�Z������}���.��R-��0r\0���[���˩��Wk7j��K7IV4S�X����͑�HY��Ėo\'C@w5��A#
�Vޙ�nմ4��}�71,/�����Bݙ�ˇ�uON7ˢ��i��x\'N�o�z�����q�9�M��nzvZQ��_�>$,����>E�D�as�ڧ�|J�:m�w�(�\"|Ni�]�ג��f�9A�7
��3�^�{���ܕ�K��v�aoh%L�xq@���⁏}M��/<���(�E\0��U1
Њ��\0W�<�g���{�F���@�)�L����x�\\8Wg~?]��16���=���D��h��,,C}`
���4�t��\\�,��S?�\\g���׬.��A7����Ҁ��*W��Jۋ��2v?J�
T��۶�0�1���0����g�K��Ò0�p�J�G�Gw������iB��ZՎ����
�T^luz��1��ɭ	�u�s��lz��?����i�־���6��	�f��i5����ºq����?��p9>��,o�Ӌ��\\�UƁGR���@ \0�@ \0�@ \0�@ \0�@ &��6��|.�U��Z��ܛq!,#I8w)R5;Y��xT�XӇ��u���j���w��3J@�T�WN����owx�	z���k��I�cS+�����[���cf�_�y鱢�b�WY^��d�a�7��\\�9��qvp��Ѯ�1�C�1�ښ*d�{j�|�uz��裼�lqQg���H��1ԩ�O�
�Z��6�.߻[]4�S	x�\'$�湷Ӫ�)�Jm�q���R�4s��/:nXg�5fͦ�4��F�y �I-�J)o�؄,���S4{��;s�\'�[�ׅ|Ⱦ3^Cl��J�+~��I��fZ�FR�\0Ds;(�ц%���@[ڈ���\0�Xs���j���4�k�#�<�QO!ڠg�R1� \\(�J���@�
�k�y;��@��h���@�{^&����Wv�m,S6�P�Agf�z%�����
k�$G7P�YvQoF6y�-�\0���]km����	
�����?�JF���O�-j�X5��P}�xwQp����ٸ߶��LBƺ��(���4��Wg5դ�Ԍ�7Gڵ�L�4�W�?c�տ���p
伜}��N�4��h�6�	��^��:��f�yN�c#�^���nݾ2k�,�^t�����.|�׏g]m,�hݧ)\0����Y����W�g<�#�E�e��[F��׬��hn��?���������� ��G�P�£;vxDo#q]S�\\
��,�B�v ܁\\{PӚ!^F\"���TgP�T
��h=o��^�Z9�H}H>��?y�5�ז;m�Yx�imf�A�ye�.�\'��dO0�cYY5�MZu�,�raqnE�w��f���cg����^�.��V��?�wr�+/eQ;;֩w/��(V���6?Uƫ�󫮗��7-ɭ�0q$՝�����B�b��c�Ui������7\\��p���^�z��뗳Z4�
Kͧg�~�<��+��O\0�\\�O���p]�HJ�Z�H�����(X�t�K��i��s�t����\0��G~
8x,�^��N�k����V����Xn/,�}<�-FkվU5Ͳa�\\�s���N�NZP�?�c��/�9J�ݞ*���.�#��k*PKoq%��5KT��uO����|�V��񑤜+�]b��_P����;�sg.�ձ�@59`�4f��Hw��9�&�������T�<�{�Q�,T�0�5K��k�H���8-X���>�!8T
��y��B�Nb�r9��zX-�{X�d�+�f�2PV\\YF��V+�Q�k��LZ��v�r���V}i�bw}[��6��ƽ���Tx�σ[���o����t|��0����٭���n�K.�N��Lߟ���\0OxI�p�ސ�KZP�@ \0�@ \0�@ \0�@ �##a{�Fk��j��:�G˸���̚��ʹm���A�Ã��E���W��$-�c[��s����@w���#EcN}�0��Egv�bn���^�.xk.q�W3S����|�!0y:�E����y�Л��V���,�Esu�I�(��[!�ā�J���Ó�JH\0�����񾦿���n�8FD`�_?m�^�t�T�K�`�j�K��9^|������e�m
�H�@��;.�s��PDX+� ]-����e\0�(9������V@�c�$%SC����P��x(��F\'4�PF������P �wr��t�ט^����X�Ǣ�����Z\\+G7
筭��y����vw�����n��y��֪�soQ��`�ż�y�I��.��Π��-j��>�#�A��[���xw���H����fw�H��m{����LNƆ��7�E����`1+�]0,��s��ٍ�%��U[���ѾZI��x�����~��i�^�]�/��^E�kssl�p$/O֯/ُ$����^��\"�o�sF��X�t��#wF��|b{�>[Ѿ-z�=c��mS��9�cܹq��חN�1�s���ڽu�\0�z��sXmqgyF��X���(�2mѓ��J�o�u�tz��Pu�?K�����ݞ���9�k�����\\(3J(�I^�8Ey�7~��\'�rF�
)�x5@�੩�\"yt�aq�2Z�^?�;z�|!�iKb�M]��Y��ך1Ú�敯msD:IF��J 
�y�i�E��ځ�ǚ�*y�xq�s��n���hQ�����n��5���
���\'̅�w]\"�{hc�#*j�*�� �.Y�}	Z���_����9�_�|�o����\0���b�bӟ��~o��jO��O�s�؝lش�6�^��y�������ԑ��f6�Ψ%�8���tw�׫��%����]MtN	����B\\1/V��~ݰ.|V2���1�R�\\���06������Z�\0*ݟ��k��AC�16�����gn�
6�U�;c钆P�M.��U_mV�Ʃ����%�:��$�P���

K�Q&���Ů�����V�N�n�iN��M��wO�\0�6�\0±�gE����v���Ȼ��;��^ţn�
`>�լ��S�ut�l��Jy�\0e�� \0�@ \0�@ TP�@  ��=�J#\0B?u���ip����H���L�.G���+Q����ʰw,�}�m�톬
Qqr�O0Z�>.��]�T����\\����an��
��+B���*�v����)B~��^��P,lp��4Mxș�;Uf�?�w���1�˵v�W-�x�U�O��j��i���u��@.�J�jx\'
K�Ch�]ȧT�v8 Q^H��My O^�	���@�
Oz�j��H�=��\0h����	�\0(	P&5@��T�������o%����
����`n#
#5�ۘ�8 ���xR�
}�P�|��]l����f��0�sZa�$��J ��e�����>��0�ڹW}c9qs���J�bĻ4ڷ{QO���݉��gO�0w,���b��o������a�G.N뮅��l@�hkZ��%����J��7C���V+@�\0�@ \0�@ U\0�@ \0�+��?�(�i��� �޵���~�Ս�rզ\\�#�U���~o�\"���QEm�G��4y.u�V�ea`�$�]GS��~����;��#/$`��s�W/�<��u�Ӥ~ �6,�x���Q�L.U�f�
Q�)�X������S��������<aW;�e�O�]����뻐AI�s���9�*T۳ċK�{����tp)�҈�>�$l%r������T��t��όP��]#�tf�P>�Ȳ�苇\0�׊�W��s[4�f
��O�:i�#V�-ǣ�$�)�F���
�V� �T�Ս���Ŝ��SZ
�q���3*��n���Ua+�CO���^�!�`v-�+ܪa��\0�k� �����#T���}p�Ѥ���xy�\0����Y��vW;eK?P��%�5�;n��n����x1�3{�U�F�k��܈�Σc�5����k��t��-�)U�ſ<��860=����\\R�ځUAF��g%EV�xȡuM(���}�{qv�����Q�z$y�e���Ci%
v )؁�6��A�!h�a�J\0U���\0T${[]5�W:ן]�;m��~ho�۶�.Z�H�W,y\\5n#��{�^��wcq;C���Qt�cZ�}������j� n������9����j��.#غ����k���\0���4]<�����ҵS�f������HL%�:��hdp�dKV�W0��Ѻ���.�:zK�}8_�,�LŒ���ٸ�J��å���;���Z���#�p*a��.Y#^5�1ᚱ+�:h��\\KB����x��l��!=�i�6��o��f��/^������{G���P��t�p[�A}�V�\\�{��]�{����<`qxS�y��Vv.�;�8�8܃�8��㒃�>Klv���\0�p�λ�\0�뫳�A����W4}�=Y۳�YS^em�(,̪%o���m��2����/D����A�+��N�VeZ\"�b}�i�DL�}Y5��R��w�?�e�
�@U\0�9�\0�����\0J�����7-�/�#3�*ˎ�`U���V����ZzJBb�|kq���̈UX�ޢ{Zʟ±�z��qܶ��H���r7k���}0�9&	L�t����ܦ)wo#N�b��\'dp�NjV��>[P��no�J�R�qvpݭ�!�]���t�lmv�

�5��l��[��~B�+����۫9ֶ��m�C$
�8����6�o(tD�=�7f��Z��6O`��B��:��f#��zr��A#�k��-Ͱ�u�b��zFx���-M��\'r�.�i�P�e��qn�D�ѫ�������۫�,X~�.Z΍�z�K�m��&?G��^o�:G��\0@\0b������a�g1�U�\0H��Y�(@q�v�Vu��b��Z�NFz̷J���V��0Pt�ۤ�Q��\0%�C�ዿ�+����?���K�C��_Ĳ��*�#��~��.@�\0��1@�s��jU��ǩ.\"�0ױc�����\0��{B�+�۩o�59��aS��W�V��ÞǨ�m�̜����:��F��LEq�w�[�Tª�7�늂(2VDU��js⪯�2C�GeR%k��U�����d�����B3������|��I뛫��A�kR���d�M��W�v}i�bG����r�uX�<�suo�����y�{�~^�N�:b��|k�qk��r-�׫�=�vt��S	�GZe��2�����
?k<�ҩ�u ��/�\0��Lt�真�\0
�\0�&:w�\08��\0�G��<�G��\0���[�о�˶=���cI���[&�m����[�+�sk].��ފ\0J� PP\0�@�@ \0�@ d��r�Y�dy�W��G�}��k8��������d?5Z�A�[n�a�m�%��m��]n�x�AG��wS=�#z>^꫽ջ��9|��S�oI0���\'^2}^���k�����&��K!2�ڷ������͑�j{���\0ԅ� ��1Ⳉ��п*á�KkI^s��eW���ܳ��a.�I�=�`�{$y��o$��w��Ҿv�⾆�f)&��4�ˍ�iu((�$}�nmt���uͼ@��(�Ί൨����(�Ǘj�c[��5�]@U��^C���UQ��M�C�Bp�r��:�rl����ٸ�C�]���\0�)��{�ɸ�ev��QЖԠ�{KH��9�@��>o
�Q�by)؂74b��@\'>�C������E0��s�@���@�҂= xf_B�2��(� s�P&���4��`�27����1@S
�r�v����x5����%���A�[�9�e�}ami� Y�h v8~՟����G��[k>�@�)ܳǮc�&�^q��-���8�:]ZV�3��fEv��a¼�K��ml��xa�ep��5��x\"Q�muh���w�
���Ae(���mk��fh�n6�J�I�ш�¬��+A�f-�\\2�Iӱ��
���/a�g-�i]�f�떂��L�,���^c�	�E��Q��\\#5{��A��*㧝���q�%n ����KJ��-O��KWY�wuhk])�\0M;�=v�w��3rI�}���;f � �jm�\'w՛��rν�%GϿ7�l��\'��}Kz<���n�����Xپ7WSuӒ�n��{���4�+�ss=�$7:�PDn}N\'H$ܒhJ!չlf��P�Y���NĊ�ؠ�o�;���]m��V�����
�t��
6��9�R��\0�@ s�\0%��8q�w�,�6�����#�+�ۛUQ�t�)V%r��J�G�,���֣%��qe�]�QT�P���1�%ˑ�G�n�7גHb�\'�̭��wLD�i�EHB�؞K�szZ(�{�y��S�|Q�h�O��,5��K���q4lm�6���s��G.JԸф�]+�az����H�&�\"���s^�&#5}<�Oj�\\�כ����e��%�!Թ�j׋J��z$U��ج�n����z# л�+��q�~J�����k�,�˖�ُy�Yig�Q;��k�Dp�ɺ���_��h�O2�s���z�,٪V���Q�6+9_Zij�<��B+����`&� �� s�e���.�UA�N!P���/���QS���BP�QD�.�\0ӎX*�i�����P�M2PG����dP0�N�(�\0�=h�k_ށ�\\9��j�j)��h�\'�\0�WQ�=;�}����/��rޫ{�3ᝯE�۳���6|������:����o����[��{I��f�a�`$q�r�ۣ�.�^o�~����e�!��I��=%����Np`q@P.�������is�nL.P�n��Ѥ��jD��$�n5�Ao�l�^U���cm�ޚ��}+a�	��竲���_V\'���uADX?q���K��2ʽ�r9��ڑ{$������N�}�l�t����P����߶�;)��
2`���.<�׍�}�Csf�ä.�S�����˟��^��� aq��^i��<�{���V��C��<�v�Ю\\����?26���PD�OaS���}�}X�hF���y����\0���|�xn�m�{�b���z=u��n�\\��~�A����G�\\jm��ey�+n$f% j!hiD�<Ps���X���>�,�\05*��EhjڀTk,�Sov�@�SG�I$wSjvI]\"�����*8�,uj�Ywȉ# 2+laS�u���qZ����;�~�J������q�Tf�M
x���ݻ$a�V|W��.%����>I=�W~9��j����?��K{vM{��q����Y�]G˻���qKe)�Mk�	�/Ư�cl���O���.�x�qW�����\0�\'�|J����Ɩ�Pq^�����#�:z�f�.��թ��mHQ]~UC�����l6�:�\0ī��M�#�f��.d�ٸ�U�%v������[��tY���CE�iA�4귢����\0i�P:�<P(��\0氌�\'���-h⃞F��q��U
!�a�x�p�x�� �xm�k����
�\'���Š��vjG��>��s�j09Qr�5�t�3���V�4`GC٤n�H���v؝i��WL�ck#���`��x�{�:--e��1���E0���;��)%��a8joȭi��������{�#��j�H�j�f�s�\0��cp�F��r:Z���:�0d��T柵x/�h��={�<\0!q࿹��O��[գ�x��-�QrI�8�i���s�̲��C	�ND�]:��u?�74��8�`�,y&��ۙ�u�Qn�Auw	ihVFmg�K�S�VN-�	�kH�C�5�d����P#�b��
�*o��O+��,f�9/�\"RH9�l�{��Tm�<\\�u���P��;v�犰�x�z&O~�x]#r��\\�&��*�M2�\00�5Q�����J+Ȝ�Z9%X��6o��r�+2���ܰ�Z�cm7����۲G�>k�ıV*�����m��)\"��~�wG��l���æ��2h�r(��=Cm!�	W�9��s��ꎯнS�L����ZI9�i�a�.�4`�W��	-.(�0|v�&@Mi�L�E����H�,lޏq*:\0�@ �S�Q�$�P0JM����*�@ ����/y
�+Q�f�F�)��E�Y��%yɚhqRreo�v�-w/tu�4q�V�����	4����I�rM�t��\'O�Fָ���-e�弰��ht����>�r�p=�;�*p@���k�$/�j.����
ׄp@T\"��jo�D/�I� u[D=���s@湼��?P��\0D+�>����vQ�@�8�����w.��nf�qg�L��y���枱|�]qg�t�#��p�,~�޷���;m�F�I�>�8��o~�����z���b��%t�tq�Vhn�R�+�Q�i��@*X���y
���߳�١ar�8,6��V���N�T�W~�݅s��.�?ɭ�K���f�\\�������Gѭ+���e�j+�*)�>���D�n����]D�܋MOh9QD\\��
��m�xL��*Z�\\�\"��f�Sf��k,aɤ�*��\"M���+;ԐGC�qYm������\0�7*x����ɻ}�uN��VWi�,�C*֨+:���%�
�
��{�۝��.oo5����^�d\'K�8)�)����x�ƚ�٫5F[��/�.5%iZΘ��\"���A\0lt�sQ$`R�*�$$:�)V1�Gtr�gس�t��| �ub���u�O���T۲>�����/��Vj��>s?OP[��)�WW
ōJ�u�{�4<�Z6I^��;�e^��1INZ�0��^8��^�>�6��r<278����#�w
��gmZ��F�����d�m]ެz��Q�R:�n�9�2U�\'�\'\\B0q8+#R��ܝeݵZ0�ڷ��5��*X���yn^�kJ�,��$�bǊy*-���*�����^5Y������s<�㗊�ud���K�AR%cY��j���`�G\'wO:�E�W��~���>�����%��Tx?�;Qq��� 6O�%q��6=-l�6�CXt���o���J���r�����]#�6]D�Jy $�&�SD��Dq��.�z���H�Ɂ�J*{K��iP��|�������NX����t\0�*�����m6��g\\E�ȭL
�oP;N�{ԩX�������w��rs[a[p�\0�o��­��}л<S��s�:��̊�t�6��-l��J���������1YY�TJ�-�Tr�3�{�;6�w���yB�5�F��YX�ښ�ո3�Sn$������ǥ[&�,���M������|�\'�v_D4�����!�9�QY���w�&0��U0=w����D�5��U�����ݠsC�T�͏����xy5����љ���y^{���ǡڳ
�Rzg%��a���7����<�cw˫ѲMMI]�+�z�!�h%���߇`R��n�9�L���u���{C�]���<�0V�ѵ+��.��\0�?�T�e~`���zB�q���{{��[���d�B�����嘹��|��Ft��lK�_H�!��S
��@�\09Lp@�s@�@���ڂN �d�펝�\"݄���^=��MW�1�)�b1����d��ׯ緓���Ń���\0�p����ֿ�>�鸚lc\'4-pLÚ�Q�����<�6�C�E7�%��f}�͒H�ůsk�H]�\\��[�K\\ZOrar�_Np��`�����o6�x4��/gN.�����Ϛ�����;7�y+w��s
����M����+
�0,��h���U��\0�TJ��P��5����g����Gr��lL6pQ��[!j�EP�ֹ���廮�:��6����V�Us�yBw\')��د�ȫH&�wm#KZ�b�T�Am�.5*+�~]���#qc��:Uz8����]\\�{�o�u��f:	=�þ��f��3�{��R1X�oZ�k�d�\'�&cH���a��._y{��/v����5�e��
򾫺t�� p���:<���sG5͸���x�G�����n��5laGH��Ekz�7�$�p ��.��n��M�������s_0�4d�k3]w��w�\\X<�ʇJ({赴c[�ꖱ�G��|u�
�cf��7��6����3��}z�i����e��7��t�����=����9�sX��@+I�Ko�߼��D��ϊ
��P8���7f��[8���GCD�P8�A�
�v�����Usc4DAw�������5j.� h���8Xt�L��K�:��R�=[�l��^~N��o#=3����GUj�6n��oNæ��By$��5n!�Jg�ep���It����O^��3�7#ڳkX{�F��f��P�
�~.��׫���x��\\O��r�����F��q��͜rh����ۛ-�$ ЀWnz���ь�W\\M��:�^�J�i�mlmh��z�
��?$jp�{���y�ׯ�
��#%z&6카�m��ܾ����R**�w���b�z������.!�\0WMd�r�>�b�+�\\�\0
���F�@
	�A�GBn��ޓ�i���:m��{�Ǣ_n��#]ALk��]�<�=_7|��\'T���
�2>`Bk3�g�=#b�)6��
�]���\"����p�E��_\0(P1����V�.����R���3\0�,��I\"�?0@�nR�yj4}�&����f֤q���?͍8�J�:6�$����6�5��X��Û�p� f
�ZG������b�t���=����c�Vh��\0M���o?��D������*�Ք����I46�5�Z��҆����[kX[
\0�TР\0(
Ό�M��L�
��6`
���`���2�[Z:i�@�J*���#p#4�U}��Z���\"8$�tM�6�#Q׷��0x�s�;k\\��k�Z0
�ں������;��v�������v�ۘ��J.s���fB����|��y�}�V0����.`�%<�{�#!��m�.�.�\"fɧ$�t��j��l�
��Z��{$`{
8`�M/O�,h�\0����Ip�IYe���2��y��|��t����$�u5
P��6�g}sD�9?�E	4�U�O�t���Zuq*]�j���q��ĸ��5%cm�޺�g6�y\0}t�8.m����\0G�3�0r�pގ���usQ_��ۗ��
��9z���͛l�)!c��=A�Ú�gWx�u��m,��5��S�^�(�r����q+�q.���(��0�=4c}!�\0D)� a�} ���Uzx =4cAٶ4	J\"���& ��S47��Q\\b0�B�leQ(�h��Y�9�J���ܬae�,%��!���Ê�x���Ǭt�U���P\\�=�CΣP�ǿLVw׫�~h��C���7}av��p��+q���p�2�b��i%݋ZES�ݒ�f��䳴�Z����\0��Y�K�j�t�֠�Sڛ�5�����ߧ��C~��7�69�\0�	.-/���r�B��r�fF�}��ssI��*XJ�_\\�����V��k/T_�ʵ\'�w��}{�?1�1Y�r��wo~�82S%Ճ��pr�����4�Tb�:TB�Ln�C.�#�,Nf\"�|�A}���4�l�+a���iop$f�-쌎���E^񵰂[�pμS-Cv��!��3\\��ڹ7M�E#������oZ��˘K\\)�L�+��&�(6�6�q�:���q\\�oG^)�ꛞ�oߪ$�������:3���Z9��H�(���q�0]I��\"�L�+�)բ�V��qD=�N.*����h�%������G(��5�W�>LsD�Z��k�]U�[ZH؜ZA<|uխ�Xq����/4�����SG���)��Z�ǩ���\0��+;v\'w�����m`�򮽯�
dUu�}�^q�\\�J�nG�r��a�q��{�Et���s�z�\0���\0i��\0�?b����s�+Ԭ?�Bt���l�Z�(���<x��ٙP��-���	�Q��b*��YmQI -��L�����Ͷ����Fj��S�㻮�̈́~�����Q�J��b)��A���P�G;�W�L^��m
b��^ow���v[��f����e7�����,�7�
m�c��g�\\�1�qΫ���羖wY��qbn�5�n��8pS�Y�p���I\\�;�L���>7���0�D	�U�OS��n�z���\0vX���:��}T7�`̚��{�i��>�bZ>H�x,�V��m�5�AP4我� �
���y.�;{x�t�:��+<���������Qdƣ���Og���g$�����W�J��W<��΄`V|l�v�x�V��Ͻ�w���Bփ��z��m������B�#6�����aU��[�`�\0F�,e�:����bVv�kL�K*��pǌH ��ݗW���[&������F�V�j�����E��V��n�m�87�]0�yF�cr��xs��(Oy%t��s�um��tm�����>��gV����xۺ]K3��Ty��N�6�K�t�����X$g�SMp�Ձlz��L�q\\U��(1PI���&�:��AZ�!.,}B�����5��ER\"ӧ�À�U�m��<mk�9#��	:��q����Ռ�q�kz�R]m���f�����YE�,�\'�O�?j�[v�ۻ����d
��gG�ǩ���vm���M6�?Z�u�.+Z������!s�����7+��ZFk��V<7�D2]K3Ƥ�0̗�ʇF��LUl��:#��%l�\"��d.#�X�m!Lx*���0�%`Ͳ�f�kQ��i����d��O���J�݇�[��ܳw�<Ǯ��4����ݝ�]<���
��c��b��=�Es���hK@>.1һb���\0Akj|T���_I6�֔����;��[f��� 6L	hSY��qX.���std���傎|�q�K��a�}����ZMNk���w�Nh�h�D����� |�9�A��@�EuY]�hN	�w�Ƿ<P$@1��P�w���<�Q�Yr���\"We�P\\	Z�U�{ӷffH��j\'����3YX�oWl|��W�jB�\\�/��RJ�->˹L�/\"����b堓w�&i���۰Ap���o¼���M��u�mdk]�#����[���7^���g:�:A�E�G�濒V��O5E|�%�fU�]�TUQ��R�]Df���X���=7�֓��f����.�+bs��5��]&��㠶K�w6H���FAI�.������Mc����V~7$�\'#
�͋�!����D�[8h�1�����K���\0��V�[
������{��2�K��ħ�%�\0Փ�r������k_ԖM8��a�՝�����ѓZ\0�#e@UTP@� Ev�6���*Q��$��(�G_R���J���>է6NmM�Lc���QQ;��ǒ�=���;$�\0���X��5z
4���ܣ�V/u;�
�7��A

T��a�1��Q�ܸۺ��Z����ufBD�.������q��G������CR<��-�Iz]Ӈ��uiد�x��{�E�mi�S���e�u��{=Lt~e�e�O�+�܆��گ�x����M�7
��8��]�y/U�����qG��J}K�ɬ�g���ж;W��������1ű��������ٿحD6���}gE�A��e]
��Ѿ��wR�X�n���o�MCEHQ�����۱8
��M!�(
5���v]{�o�wHm�NYrX�������/n�6suN�R��؃��J�Aqu�~�.6��\"��gQ^
U�O��{b\\���8�KEk���1���yb�Ჲ&�ʠ��gV&�8e�l��ե�q��z���f�pk|��6������%����\\���:���fN^+�ǋ�N���\0~��&�����u�ǛN#�V�u���J�{�Z���q^��W��TI�|���7�P
�YT�m�=�B[L{��fל�H�o1;H� s[��}�K
��-p�\\��8A P��P�s����89P��^RiSM\\��}�[�-�-��Y#c��D��hĿ�rٮ9�n�w� �&���cm�&�#�Ku{O��*��ыs{��$�U�Z���Zy�\\2Z_�6RIl�(�B��׻36�p7rU���e�i�\\�I��xk���-��	�dqsR�Y�������m]5�N���@ҧ���t�$ic��T���at˙f���:�Z׏wM^I\'Nn3]>-�ËMF}��k�bj���z�ɂI\"�4�܈*봩uh�@ZA���Z�0�p�P#u �1��`J�H���1k
���]A�0���R�Bc�8�sUJ�*�m��Q@1�j�JˍԠ�җ�@zsr(;,�6��(����h$jdu��g�Q�
+�q���2��@¡X�MN�
����ރ�i�j�&�CPtZ7� k������\"��W���	[ʨ�OFZ4n��
��%�ޝޓ��v�\0b�ʮ�w۳-�m�t��5��ժ��c
���r@��$`�`���%2��wp<Vmj5[=�kE0q��D���^�<
꛳{��b�MWh�^��޿�*�?Z��٥(Ӈz����2�엳���<��\0:O���fvi~Y���{F��}O�
�݇���g���R��@4�Dr����������7s2��&�I4�cZI$� �m��I�]�l�_�j
PrYˤ��v7�K��6*�tEҒɓ�dí� �p)��*�ֲ;�&�lkI�
zkp�4���\\�������T@ò^�&���Y.�0B�/bv���;�!�p�B�Ew��\0(*���p�E0��\0�\0l��\0���ޏ���]��ب���ZnP�	�y�D�4�\\�v�m|z��ߡ�D�k�f�ǲ�;uۚFF�Z՚�\0�|$А;�6kF���\"��|�b�\"�g�b��2~ A�Kݚ�[��H�HW]�b�m�WT7�]ܶ�/cnL&���k�������sٹ^�g���++4���*\\�
�2�n;���#��Z�F	��kz^����^��E�.�����x`(�XG�-�k����ූ���I�^��Wn�ei#\\׻H�H��6�[%�䂚�����v(#����Z}���f�����m�{_�X��;�v�MA�f�D>WG���U�G���c�A\0ۘ�{�事O��/��� 
�֥�uH�*�ץ�6�p9Ur߳z�o7���.:�u�O�%-T���eYT��eh��xaS֘ZT䵫�?���b�rV�ۙ��QT{�Ls_&`5gե&�������9�n��u9*�y%�s7g�>�WH泖�6�TD֛�n�����}��(8��G�Z����luY��-\"������b�=��Tb���d7�{9#U5��S�1����q]�y�z˃^���U�{4�ǻ��w�d�{�G�w��O�B1��^J���0��
�0���r��(Ⱥ
]���6݆��U��K�����\00�2,c��:2����8z\'خDR�Z��� w&P߃��\0�}��Þ[K,�Gد��� 1a�\'��ŝ�ͿBy+�6�\0��\'��?�X��H�O#�
���}��w�b5-m�*�\\ěb��{�b��l�4b
��n\\�껉&��\"��*�>�Z��O��Z�ʟ�^�L��j�)�����\\+�-�k!/nn5�M{�vf���q��1�sA�W�ik�W�uV�;h�s\0�ji\"f�?..�.wb��1+�3���w�go�Z
ӊ�k^k�}m���A{�c���M4�����\'��Z�]�sYn/�c��Y:�w{�Q��@��l�����Q�#/�ɂ�������\0�	P8�YF|Tw�_kH-<
��y�*�Gc\\7��\'�9\"�Ȫ��BE�� =>�;<���;��~�c!kK�
`˦�l�Mj��웣� �`�Z��͜�ŏ#Q*�.������&�r]#
��	��u+S�Vm1y�)H��j��i�S���v�f��kqV�Wv�����0��8�9sA�Lt��lg�ڗϓ�z�[�tm�$��w]�)��]�u����B����#�
�����iU�{����x�a��j�;��-nC0����C���.m}U��e?�\\5���v}m�܍ח�L��kCU�9�t�WR���@�>�������Q(\"�t�������	8�u�����\'0������
��,V�O�[�AȮ;wwӲ}�0<�2]N	5���W�g�|����F��Ң�w?������){
�c�2��8�\'Q����^���K��s�Xy�W#L����U��3S]m���c���÷����[������j!����spƙ��9�Su�&+h����B�S.q���Vi�o�7͎ .���K)�Kl��e���-I�Q&����B%�K�:�P����Z��b���+�%����k����զTs�nW5����\\q�Qp�tWq\\���\\���;��^�r�<�<=�w�Kx��M#̧Ses����q���X����w�W�%��ic���Б�A���� ��W-����:���}ɛ���χ������sFh�v�-<ZAI\\��[o��mN5Q������ڪ�/{1y�������벋L���Bw��Y�t׳w\'��1�F��}���%F����$D!�!mK`=�
�jݡ����2��x��X�0�[����;^\0rR��R�V�pU��l&W�^}�����]cnۧ�\\5P�Ҟp�:�լ$�`*��_8��w�.��A�%�0ԹZ4��r�O�k\"s�ɇ���a�5���}�����ۻ�t�÷� 4!���NM����3_>u�X_�V&�7Y�W���\\�ni���}����ht�q�+ս�ͤ�n�z7q���p���9y��-N��V�it��H��e�[�Z��56�=�\0\0�\0����]�o=�՜�1��?R��0���{}���R�46�?Zֽ���m�,m\\kNj�\\�ە�0=��Q^g�n�r�T��UwV�Til�� �*0
`u��ØS�`0�?z��qL?[��J�;��-�o,Ą�k�k��0e�6�`ZqL
[���)���)�f�h�	▯cެ0:��C��,t�\"�l�\0#��coqͫ(O$L���%�1�VH�$�&?G���H\'�W
�����*>��e\'�;i�L.M�Gn�j>����{�;�L$�u0-LF˭���0�?�ۏ�L���o�����$-y�Q����<W5K� ,p�\\V��_k���<Vv]Z�v�soz�S���J`�9��T��s�	��R�������p�U_Z�Qj3W�t�//y��%x&�x�[_W�m���_6/
�s�]{?�S��뻕�v���-o\\i�`�o�^,4[�P�,��5)�g}*7x�`Uu���]0�P�]KSb�:�q��@+L�fݸF-��y.7W�^�&��@#�]gTڰ���u�u*�3��{�,\0�����~�m�]��.J\\E>Ms4�
�w��f{�
�L�u<T\\:õ�C\\%C*B��������Jb�ӗ�dU0p�p�)�ޯU��DU�%r(����\'\"���Ot�5](�eep=�Uo�f��֡ە�.-�H!%[gyn�
����vg��e���F�kU��ؿ����-�e�c9��Ӟ�������?Ck�z��m��_nA�K�v�<�,&g:��5ೖ�;���ңؙ$u[�ș�P�,֣�V�����L)�I�N0�P��{�x�����:<��[N�9�\0�Uok�̝^Y�Imy���0}^]:ܻr^�zf�Xl!�j@^�{8��{5=����[pH���{X\'is���<�����k�m�7�:�o�p�*���5�kM-�x���+y�N���*��W
�<�m����x�e�D��#˜MI\'����ėۓ�����ǻ�\'�7�A,�K�J��^M�¥�cE�D�(�L!L�$���D����2! 1�L�@��E
p�\0\'_�dy�[U�x1
�CBЪ���Eiac����`P�W�l>��)�K���%O��Dca�2ޞo$�s�}�d��eh$�<M�a�*���A�%s���\0\0 ���T;�KI����%���0��7]��f���\\9��Y�1k�\0�	�mo�	-�Ƙ)�����/���j��O��%
�ךֵoW��%���@�.i{t�;�\\U����n-����:bu�C��\0�r��W����o-�^ei\\A����AÂ�ޮ\\��7��s�!�L�bsB��+�)SP{֑IrŞ�H�o��������z��f�r�l��x�i��/#���i����+
����J[��ʈ�ݗ��*�r���؉�m�լǯ���������pn�pO��u��З!�7N:�u���s�\0�ע<F��Qn�$l�\"��.�W�<�0�bs���ȩ�/ȱٺ�ݱ����gm0ֻ堷��f�k�%\'��n[=��-=�bcY��1�բ6����ӳ˷w]��J��\'w�M{ǉ|�w	%u������ˉ����+G���Y�X��6ոҠp]�K��񱻟͞��Ac�-�wݏS���oz���96ޫ������|�����RZs�31���F��q�D�p��
����!zH��R�SLG��o��H�kVRUbW�?,��8���p�h�r:�tz��ڢƙ�/O���rmQ�nes�JV;����+�	�32�YQ���i4�3�!j��0�V�`�c����4k�C��5��P(���B��\\�(���i��۹�Uƽ�^h��U�c�h[���C5h�Z�b��ۇf�6b���
�*�>��Q�W%D��D|��#�k��BEǊ�cUl�cj�[:w`pA���|,h8f�Z�����f:��F3s�+Y�.cB�6c
K����\"c$S�גa����$w��5����(��U+���8{X��tϽ��\\j���ίK�ٖ�q
M��V{õi�^WM��l�j}��e����H��Df��h��tح�[@�}@ߺ��.^M�.����x9�����a�����b����^����;�e�V�����6X�^M��7�&Ge�5�8�����m������pn5��A��o~��Wq��{�;���������Zܹc\\�v�x���vf��2H==t�������y�@0�
+ȜmGR������Z�W�<.~��v��+Pd&�����tY��e|.f^\\�|��Zm;�cks���[��uo�י\\��8f��~�3�T}�S/j闗���5\0��/Og
U�-��#sm$�$d�[ҷ,cZ@��X��u��5PW��UG5܌|O���)�ul�d�[�J�5�:ɯ�R[�\04c�a(�tŌo�8���v.;�]#G���[�q+:5��n��-�5��7�k�H�wےe
Ԍ��RF�7r֬��
祀����:��廝�r���
��ZB
�d�8nn��z�S�;7IN*|mNd��毼��g:fn� ��m|�?TxPY�jr���&��_�\'���_8_���⧍k�:���r��b�����s&��(���y�L�~徜Š�5�n���o�/o�	\'�TZ�KXߖE��\0nnb���t�k��\0*!˽�����_����o���4�\0{���ʎYz/s�4�I�����a�~i\\��/7��� ���.�=�X�\0���8W�~�<�~Yn_���!䝟.w:P��
�9�\0.o��8��(�Fߖ��k��؆]
���S6�W��*����YZh��G�t�~��A�-\\w��-���۵�Ĝ�t]��x�\\+�����\0k{@Uc5em�Ј�|�?�y�0��t��0�9.�k��I�F�1��U��R���]��ne�.R�m:<u�}�đɁ�w��*Q�F�Ȧ�դ֪d�����q\\I�$W/�����\0T�����]e_+�rJ��$�\0�Z�5����L��h��YW�
V�H�컌.�H#��n�^�\0)ƫZ�v����	>�j�������
ˣ#�=%�	�⥮5\0$Ի3N�G��P�缕�9�#wʽ�/H���ʛ�\0�[Y4�	��W\\����8 t�іH�Z�E��W�RIn�
kԵ��mn��m}������A���y��>8����P�j�Y�RX�Co!q�|iy�XM�ť�4���Y��?Id�bW5�h�xc��6=�Y6퍬-�Nd�M$rߒ֫]�@��<�|�� 
G�7T2����\"Fg�B&]Vq��.�<F�|PV��Љ��[��_B.O�[]5-�6��9�h
�W`��w084L���t҈������@�5���c�:�1M\'�E#�wx� �+p���\"B�`�.�$�j=����˕t��SDYh�f+Z�6�<�f45(V�˗ӔHLo &L,,�b4�|Qd-����X������U-Yͳn��n9��j�\"�	�q{�ұz�:)�����kñt�F6�_g��KXfV�e���5杤�-�ͻCu#|�*�b��g��`�7x����Tx��h�M�X�8��ۏ��|ۯ��l`s�t�>��]^M�E.�(�8Ts]����C�I�8��]�Њҋ0Éץ�d�<8Ԛ�7\"�v�a�(�k
����5�m�g�Ew+z�1Os\0<W��i�����ٶ��T�@�zp����w�2nMdO\"����_$m�Y /{�Ɗ��ݘ��E+�%��ˮ���v[�h�[�W��7�\\v��`�-yE�O�n�t�d�.�\'}��坴�90߾Ż���X��q��\\|k��1��N_Z�X��]Ɲ�s)lV˴_�}?�o<��;=�9|��	�|�ɶ{��W��[����o���Aƕ]�p��:V�\0^Ӊ�Ǌ���G�
~p:�m�QR���T&��8�	�6��	Y5�Dw2�躀\"ǂ���m�Ul��hi�
e���$f��ZR�^�9�Y������0� I�TŹ\\�u]��#4����uF�y��
ڥ]c��e�{�s�jOzF�\'�����*G7!h�Z<���ʕ��ɰB;�p�\\��S��k\\{��١\"�\"Zǿ�M�
qPL����*`��oRM
c�]Y@,��o
V�Uv��&���.��u����X?q�c����1&��Y�|T�J@B���5�<W�U���8�f����=3Զ�Ѵk
4�^sav����2L�I�����v�_0�Y�z�M���PF��V�1��ņ�
4��&�pak�J�V3��n���c�U��>�p/�x�L��OO�E��5��ԃ�wq��\\����W�r��S+�n�\"�L\"}��4)�Ǹ8�\0S&+�-�ÁS-a����	�Ǹ����W�Q~�&We�G
���u����?�y\"��Y�|��n�]A-i^?U�у��b�����t�б��-s��^P�@汖��ۃU2`3qc���L9�Mё[�
�L�mqԷ/������pǎkr3]�nQHcMi��{L�n�+Z�K���ӑ.mV#r�����p���0:�����Ҡ�R*�i�sp�TGh%7M:N(=#e��s�$P$M�Bͥ���t��:u�jsh�����s~��j*����{appu
�W��+�N}ӛ����2t��v�uS�O�\"=��f���K��$����n�otn�\0V��}k�X��Oq;ֹ�Pd�$cl���r8�|Y˶�s��:��ⱴoVG��`�-�q��;G���f��V�L�7���6͖�Q�k��s��Z����pl�����b����]�cv�,kS
�O%Æ�9�Z��WV�BV�@��
i7\\�6¢��O3��@�Zf�\\�DX�(#\\DN�%��!��Y��7F�Eb/�z�޸�� �RōR�I�����n��܁�������j+���➬��]�n;��KM��G�f\'A�4����`����C�k�h��*Nkq-��۟-��4�@,2e@m�Sɿ�[s�v���_+y��,��<=#�٢�
�CJ�F���z��S�Uc��e9乺a���)�A�VpL%�K����g�K���e��}��B�}70�5T�B�k�����w��[h���x��Z��\"�|�8�~��Xæ�f2VTb��h/�c�ڦ��P-�?�Y�c�����Ӧ3^�c��\"�i�;h�Πڮl�d��[1�A����.������|Pܳ�a�S�a�+z�s߲��/�ͬ��4�z�F���	����$��qގ���m���2G�	�f�z�<�~e��t�މ�;�LtKzե�����n6�|V��!���F��{[�͙jW�����-�۷�ht�M�5e}�����~<4���/.���9��@���o9q�
X^��XX�m�xb{9I=�%n#�88�,��,�I��)D,
뾦�I���E1Y�k-OH>k���m�5\\y7�÷���>�ӵq����<��DK�t�Cov��I��oW]\"���� �E��kW�Gc��q
����Ie{2!<���+�+��HWγ�����ЌΟs?t�C�௝>8����\0��<\"[�ۓj�^2Sʷ4�
�Y���ƧW�����ݞ�˳���\\�J�Ʊ��q�ӎKݢ�N����%;m��X��ܦ� v.�.Y��m�y{K�Ď��XK��v�����X��5��/�]!#VG�v˅��]15��`�	�S5��k(�7�)���m�ei�K[�7q�����
ѓ#��}F��Kl�v�#�\0bB���0ZN`�ދ�N:)���$Kb�\';F�]S�.���l�x~ �ۛD��@�-0%dS˺BZ�q[g
��F�5\"��e;%q/�� ,�ԋ;w�Ay8�J&S�þ\\Ek��j�$��S��:-�����PÞ�s��G%FFx5��I:�\\W;�h6)���@n9l��SS�C�4U�56h��N\0.{:ks�]nO�h]Aܤm�c�[�l[#A TW��5Wx߄}#:\\RƵ�Y]O-�$�ҹW$Z��_�i@ڄ���n��\"��9�-a7�z�E�[eVP:�آ�\\���\0J-r�h�:����C�th�fŎ�m��V�V0�ˆ��+�H$����$2f߳�nW���as�s�U�1����)�$�6宜���q\0���2�Y���I k��}1�}��y�a1�-� S�Y�w�L��D~Lt�A?s��P¾o���\"OLMz�I��S��O�Sd�$� y88W�!2d�%$���pG_��L�����ݣ�LmxL�Tw�.��nE�#c���}8��mq����;7ԁ#?k�锈n~]o�[�\0-̥h��2����n�� ��]#(-@2�9-��SJ\")Zc��J�U�:�zPǹ�1ĠMP>0ha�H���D�\'�Z����Ѻ�.jX-�8\0�v����o����F���sZ�S�$����
�/�/-��l��-�.���v�q�J�����n�WMUy�$Tön�WN��],��o@�c&���W����0�@�Z\"���f�凊�=��=��:�G[�C\0\0�2�MUvkz�-�I��YB)O-h�o���M��ZЬe�5�wu3�f��_YNNI�E�ln�+ĭ�d��L�E�,���L�֙Y�g���o}8H8���ȗ��4�>���7.��tb^���|.���FH�q��ȏ�ˇ|f0�i���9[�����9m�G��d
Y��i���7׆\"Ʊ�Ht5�a�9օzq��=���]�:i1yq���&s�^c-wWl\"r����E0���+צ+�~k�Zv�j�]=;�����m�ϟ^�%��o���(�m�����b�5�5s��Գ�[�f��X����(�z�X��kG�̻�Y�v�v��\0����v�$ibض2ʈYS���o�&����]Vۇ�\0U<��\'�-��?����<��;��;l��
�m��`H�L)�X��*9���	�?J#��͕0ǵ��:�n�����õyy����f0�O�jl�k�cH�Tb��/_�XE����C��>0���
��G���P�s�+����͡wz��ݷ�^J�&�潼�}d=�$2il�T&�B�)L�pQM�
��R�q{�QVS�	�`�n�GbjhH��q^����2��\"�c-X�7��y���s���t�n|Ʀ�lޮ/�twL�8�e���_J�0K�T�͎9����e�ܝY+Dj+ʂ{,����i�c$ƈeO�Y>έ�:�U2���WJڑJpY�E���\\(0�T�����cs\\F�l)}gO5��^���(-�HF��v+�cj�ۮ��۠4�F5���������#�Ÿj����)O͋�d��)�%��t�m�>4�*�m��d�����*�g�{�bY�Z6�a�r�a�]����-�@5��x�,:���v\'���A?�����6�_�s�Y\\�*��>��HG�C��5��Y��m̵v@��5R�p����h��Hh�F\"��3B��0�4�%�Q+��ָ �=��\'I�󪖺�ǘ��7��ň�v*�BETD��)�DJO)�qA y�+�˦�g5��5=���}��FAn�w�:7���Ů����{�.K�׊f���I[�n��_%Į�^���/�q㞯W%�}�%�v�����Q�\0]^�e�^����H��$���F�Iq�J�m��N�����f�\'��qF�3f��������C{�Ofɶ��\'z��L$��P�i�++6zU�� hg�ʋ���U��3�=\0乺��n�#MJ�V��񡢥<��� �ſ\';��v��m��
4�+ZOZo��R�X��!|p�cK��h#�%n�18��G�ut2�W6�
�Z�t^�-/&/������7hÀ:�5s�ǟ��
��u��<Q��4T����5��7jƵRՑ���0����x��uj�
�Ex��\\i$���:6�d�\0b�Gh�X��O�Z�F�q1�S���~�*�Ӹ�.��\\!s�8��0e�w(_X�sJ͍J鶹�.%�g9�\"Vn���i#v�$ �����u���f۷���q\\��oYk�t�wZ8�p�8�V%�u�y̮�e܍�GR�ׯY���92�ېp��5���U�Ƿ^\\���uj�Xֳ+�:v`��>����譺�%�V
��3��\'��L�J6��W�J)B*��[�v�jp�i�5����k	����Ǵ
�v���V6�-G26�W[��{��A�*2�(�Qā�!X�6(��m�4���.{�
o����\\�M���&
˻��3A?�sLMT|��P�PF��i��5])y6���i����ue�}�SR�+2unފ�Y4��WL9�\"�ݭ�&��
劸KP]@���Κ֫��u�a�sj
����v�҃5�m]5�Hn�ۮ]	�G\0��k��M�nR
��kX��8�Π-��*� j
�k��h!k�.
*q<A�Td����ݲ��ǂ�nE�w�8)EY»w��R��s��*�E+�8�PB(x��u
*a;}j��yj�C��B�Ί��q�X@�Ъ�C�4Ȕ>�͈�� ��Jb�uґ�Q�hpvr�m{��f�V�*цJ�3v�o��k��.>�r�Ԗ��،A�2��:e��H�s#|�ǹsںk��Yx3�Q���$�)��3dp�%��_\\C}��,�����1�]ΰ�����pZf�>I%�n~n=�캭�G�3^���y0��[m�����i[qQ���;t!�@8�U�^�a�ؾX�d���3�v�xa.��+z�k������е�h
�T�Çu����P;o��p[�U�Q[�n��������j��a�y$nqZ�n�=$W:	�̶�=���V6��Ӷ/��Y4��7��v�].;��l�]�V	����?b��ע�jM˪,$�y�խ?��ô\'�O�W��u��Zܱ��� �G���B�ӫ���Fu��;x��F8�U.1�|j�{&�֝b�C&ɼ��м��#Z�G�\0���J�޵��!ā���W��]Wm{9mݚ�\'E#�x�F���
��5�l,�+�Jkiˤ��5ܵeN�.w˶���������#Eŗ�l�
�
�	�mO�-\\j�L��9��Fh�&�`
q�A�����2&ٚ�nH�AٽF�m������V���Fk�s����e4Q�F����X�ͤ�Zk�r��W�����e�#(���ʛK+�f`ǻb��j񮲣7�s8�H��6
*��|�R8\"a���+�L8���U��p�I��nFv�mw\':`Z� �v���1�$�
���p��ZG12�.���q�I	
bJ�j4]<�C@l�T�p��I-��)53p��v�Ex[]\\��c\'m��{u`�5�����v�j�2�t�~�ۣ����G�bk�r���;�i�^�BZ�L߇:i�q�yx�.�O6����|���
8� .��Mw���mb-f�>�cA�j��M�j�e�`�,h��Ǎ�p� ����20�A�0M��~f5���ǀ��ф݂��?t{8���Ĳ���w��۫����j^���mų����
��ls� g��̠�����7�ε���]�q\\4$ ;P�j�����۬�]��YY;ql�����AiAp�x�Z׺�H�4������n�z���ZW�x�����f��W�Z��v�4�9Ӛ�iuqW�v�~cF
Fk6��)�ud��ia\0i|���p=�z�ߣ϶�ܥ��~�������k��%t���\0�:���ĸ�s�.�O�n����	��9�K����{ex!���i�.�c�5��Gڴ�E���^����@o��j#ع�F�ׯ?���}�Xn�Xl-6�<�0=�9��^�A��\0<R\\�M<\'V{n�2��׮��o���4�}x6�F�8�m��s�_Z��6�ٷ\0��X���g�ln��?���v�\\G��|�m�Aok;<�s��1�H��L�Ɔ�ssu,�\\Z@
m�bk�,��E-�d������4��0��&��K������Xw���TEk4ox��f�0���ZkCܺe�a��~��V^�#��6�@+���Yt���m����v���7�d��b�����
�U�UN�oQ��8eE�utȁ�k�q��qڶ찱y�Q��fV���ջ��^�+���Z�3h�k��\\�=�]�W��>Z�w�s��kd�Hʰ�Z�cz�<Ϭ�9v�a΁�.���\'H�|������w�\0�93^�È�C#�wlqkN�y�F��|+Xs}��&j[=�w���x�y1��q}\\���,g\0�b׊��a{5�1�����(mwKOPG!�V6�-�»y����ܵoG9�R�sV:�u]Jӊ祯F�L),wR��F�f�����;[l�xcޒ�m��rl@�p+���4�)�2�Ú���&pY�,��Z�bLֵ��b����Y9�
M�گ����˙�]Z��]�����O�n��y4.y�£���Y���ޗ����i�������eB>��׎ͳ��~i��62��Ac,��)V�V��F!zr��a�k����%�/��یr7�{89�LΪ)/�n%/{
.�H�n�ogM�b!��ۀ�SU�m�w�O{�;xq���\0rp{�-�v�3��eT��[�=:��g����9~��֖�61���<��~��
}j��:�N����Y=��x�oU_^]�G�h1�k�]����F9��BX+��k/����+�z���(j;��3i�Z��]�t�D�v�j�Z�6;��d�j�p��4q��lƇf�V2/����|aԣ��\\.�y-��Ϊ`R�܇�9��twEKq��y�s�by.[mթ���-�ݹ���R;�!t׬f�fa�G:���nD����,�vz�6GR*;
�tfuzQt��;k��F2��(���X~[��gN��K	4v��z�����l�	l��B��e�ك�9\\ⷆ2��mdykNG5
�E�[��iRR�`�f��湀�gD���d,�����]x�v�3&{!o��
��晏W�f˧湂ٱH�;E]E��$����-9�d֤����}�]^I�֥��y�5����L�V�Al�te�o\\U��d��Y��=�y��fK��M�к�IxŪJ�g,�r{Ǜ��������o	�w]�{z[�K��uY�錬6~�ܮm�W5��33��s]k�p���T]Aw�ށ!���<�tp���kqV�nF�&�(�ӛ��3�Ǵ�ͺ�2�d����0J��m��8�Zi����|�n�
(�]>Q�c�D{V�;~U�S�/.���{{�v�J�uS\\N���q\\�Q��!i\'�2]�y���Yo�Lx\'H�[Z��s�ݮ��m�ZL[\\0�����G��j{Mu�$�4V[=�PȪ,a�=���^딭F?�:9���5���\0�	i�=�jΗ/�wv�Y�ki�aqd���k:i�����tE���#���/F��ڵ2��ַ��4�\\0n�^1�+��k��������S>k=\0cLW~
Z�/�b�I5��r�����dk�j@�2�I�.�����Y۪˂E�@\"�����;|���q�FFb�R3wf�@��i,.�Em�V���ic�+#��|�����n}�0=�\0ز�ie�\0��ɕ
�_JO��͎�A#mfl��qNј\\�&c|{b����\'HZ��q�s�N���5����O6��Y�t��ܿV�\"�1Z��6.v�OIS�O
Jm0��-��|�C��5�]�Y���x�[W�X�������T�d�>+��/N�a��wȜ�R(���K�Ŷ��@��bH��a�k�-5k�#�܎T�{6�s������i���Gt\'ML��a���S�b��ݞ�ɡ莕�ߓ��Krt�ҁ��B����]\'��P�Cin��	 �;t��p����q�n�.���a�\0�Z��M���Q�̔���{�������\\ܞ{~\'H�a������A��[�ӊu{����2lv�G3I���3K�Eq�
�Y_Zm�O��\0��~���d�h�֖��*���iʸ�I\\������w\"p,o�M����e=�k��z;<�KO��K����h/l�6A�in���:MB�&�;�q봬GU�����ok�\\�K-mHu�X�GLE4��O��&��m�\'�����\\n=;�f7Ma�5�����1��`�~���߯�|͵Ǖ�j\"�a��)��F�턢����ǽM�3���m�]זU���{�5�.*qZ�ڲ�z��=ik�i f��\0��fJo&��8��N�
Z[ϵg�O)���x��η�\'C#�V<9�p�@ʋ<=]��ۜ��*��H
ecjֺ�z��>��m�q�A@]J���e���mB�W����!�U���Y�7�y�鸺�q�샪g�Ӱ����͊��@�G:����ӧ e�ѵ��m	X�dzT;S`�n�ƗTk#Vrx��l20��A��I��ӡw���V�nD\\?�{9�\'���mv��������M�5+ut�1|~Q�������J�P�.s��r]��?,n-cp������9t���Y]��[onuN��%��r�iˉ�\'\"��i���X]�o���aˀ?v�5��*���7�@����n�@O\"B��w�f\0{F:CMWIˆ<�JuT��m��c5 ,[���Ţ������l�Nሥh;��~��n��}o���T=Y��Ա}�nsf�k-8����m�x��6k���%���H��B��1�1�f�=��lw���m�Ŋ�欮�����8匵�4\\T��:i3]pX�K��֜��9:�m����\'n
�ڴ,�=@$�īY׺��dcoLn<
�?j�g�>��mI�6�.�ó��ᑕ�݂���/^���rk��fO���MB��w��t�j�B�y���6�;�5�9{>�$q���3�;�^���(��f�S�kR��W�n֍M#=m�`�j&Q;k�\'�P^l�oJ�c��Vn��r�[���m����\0Y��:����\'�3W���c8�$>)�|p���>�ϊyS��\0������|p���`�ڞT�����O�A���3W�,�齞6�m�i܋��\0O��Ն���t��GOM�`�P(��[VۺG�TA��:�j��[����
���%�Xl��e�a�
����%X��������pR�+h�4s�*�j�kl��w��U�Uk�\'�5\0��κ�M��q��G0�cY\\�o�>\\�W)cS�oV�M�P��U�O���ZK5j5���wfh���k�<�Z�5g������.�w{�>�l�7U�K�?�I5�T\\:y���q���og��X-��<���\0U{��_:Nѥ��Yd�hZ*N\"��F��ܗ��ZO��C�5��h�Ӛ؜0�CN�k���gZ��e���-�h4y���q�Q�W�*�磷��q�#~��dg�\"4�5�w�W�w��*
�\0{:.���t�W��$r[3[���q{����T��VH�߬^�y֝\"�Tw��ի^^wާ��|$���y��8d���7�ia�nq�ۇ�euu<=��Ϊy���]%�Z:�=�������\\�v�z>�ɶ��,.����<
�O���~���w��͜���і��ږ�\"���>wɶ��i�7��b��1�(V|$knm��V����n2��kh�y���#�����f��/�-6���͐1�U� {B��y�Mr�������,��
j\'\0���Gҽ=}�L�:m�8���ǹ��R�����㸞g�������}K_ݛ��k��cg#@�]\"�h�=��F����f�z���ЀAF���6�qxh�(�q�m�y���`��Pm�;6�ژG#��خ&�v&��������[��pcm��޺]�:�J�q����>}}��hwH������>���Um�IYF�.ѫ�v�]����x�vyA����X�����td���)�!�\'k��F��h�0���(
5�\0;�c��Sp�c��P �|Q۾I\0�FeJ33u5�n ���2�ET���Isj1�T�
�g�D�n�-����ڜ���}9%x��|}��p����{9t�9�޿�l�6I�5���g������]�c�=����I�I�8j&�}K^i����e�D�.���0�zC�
*���;H}I��_�q乏G��=�������N�/&�����Q�]A=�f����\\p�^���ci�EgN����6�ɺ	�gj��a�Y��[|���6�X,�%�J�i\\|�[�y�]|�6�}�����Å�z8�}�w���wKoW7&1jZ��=������oڃn�.@g\\-�Z�D=Imq��$�\0�AS��SM][��e�9�R<+�V2ߋY�7n��{�c�W,X��O��e��|���̦�
�Ӥ����È΋Ye_sӿ^�As�C�F����v�[h��\0>L��<�f̷�؍O@l���:Y���{���Fv��A��kl�\'&�e�{��}�)���`�!����	S��ٹ�����Y�S�dt,/���5+I�6�E�I(s\\��)�Qlj���}� ȭ��x
Y���\\�27vB!�����zڜ~�V>8ߕgb�!�g~�T�H�-mˀuԕ\0Ov=X9����_Z�����-�5��omkkt2:
���.����>PW��[-{�Mm�����N����Gh^o*�]#W/W�j+p�J�
�G����x��N��ﮮf�4��q�G\"����;
aF���-a�m�m���s�K��\0������e�Mim��@���j�mi��^ز��B�M���v��5�b�Z�u��U��cA�UL��g�\0�sh[����8���f$m��O�O��DSo;TG�&)�?���1�О5<����Ƃ�NuSZ���������W§�M���0P8������{Q:COy�>:|��}�vw>�
̈́�L�w~����!��3H<ŝI{g$my1�ŧ���c\'T��Dam��,r7j��B�aw�u6�l�
�h��\0%2�6�gSZ��%0����<7�i`�~��U^�ioM6����D[ō��o�
$�C�t������\\]N\\�r��������h���ͦK��F�SN*I����CB3��A/�XK}[�� k�6��èb��9�R�)mzWs��!2�;hHsg�P	\0��A���Ƿ5��x�|ø����m��b�R]>�cNn>g�mr�`���l[��&�6m��S����Տ\"��u�K���ҳ���[��Z(���?��vq����k��ṊX�/?�r�\'0O�}�.x�����Y�u;������5�/$�v���<���9�|�߃\\��}�/,k]�F��_�{	�p�O�ZH۪O�7�������j�cE�^2a��1�0�3��hX��U��i�\\��q\\�\0��6�9���X����;S	s�9���s�\"����
香�{�I2�t�W{�8��$���m��˧@�
W��\\;8�ܘ��&h��v�=�sں��=��B��h\"64y����$��nκޯ\\�i���\\�kpA��2���l�2#�s�R]ڼ�o-�F<u[���,�	�_ �1�+����Ƥߎup幉�������h�եhA��NMq�õ��E�ɺ���n���g���
dЫ�h����/1�+�l�M��6��5��F^ۆ�
�)/��Z�\\%�}�\\���6�]Q��D��C$2�0�Q� �Hu@�rQIX�H״�`t�u,N�G1��i�&�v]U��i4ļ�6Jиr=�7U����$���r�=s�C�w���1_S�y⦴���S�+��Ž��2�g	�c�`��\0ႛvo�oܫ����m{M(W
/N����Y-���M؋��
aR��j���ќ�]5��B�IS
�i����Y$���#?b��T龘HX5��-�ۖ������]�,����m�Qī֦d2M��9+�#�M�\0H���#�^�x�x���^��֎O�qM��~����n�ɍh�|U�O\'7��Nu=GS���nn�{1q�za2�t�|�ڨ���2�\'<�(� =^H�l�
*G��G���n*�
��F��u^߶ݰ]
\0��g�m��j\"�m9&Kսxn%���q5tg�\'�Z�G�_��v.-����V��W���`��\"i�*�)Zbp�pFz��a9�
�f�ˁ�E���漊�q�Ê�5�y@����5�[,��^#�Ǜ^Qݽ�zt�p,\0cU�X�a�;7O3t؄W��Z摖���+�$t�޼kw�nv+��$�$��Ŝ[����is��V�4��@�k[���q�P���;rg�i�;������Q]=���?np�~���
[�^��{���{�I2�I�s��ίGܗ�{��߈/�D͐�7�a]x���ts�O~>��6=-c;}�1[���E�]`i�cر����Dm��C}�y54:N����-sG0����a�v�o�,���6@�}���t]��B���F�麬�����κ�d���TQ�i@H���|6w��8���ҍ�5+��.[Em�����I��CIܗG;�j���bk�������k\\��6m鞼�˝tp��Rk�r��~]u}�������1���h�#7�.h~Z�P�!�2=��d�?F
Rnu��\0a\0d�OA��0�x���	]>E+��	��d.���.�im������!k[��l��c\0���L&���`
\0�:�����p58�9�|���ݟPa�۔ޥ��6�+����ỄW,mK^��9�^�nwx[����d�kj����(����,8�8m��lD6P���Km�7��5�Vj�۪g�{��oZ�����\\�,��q�;�\'�_\"B]TSD�w�k�<MQQ��3 �G�$U�E��*����5\'�7�J�g��\"���u�^~G�����wy.H���q��� ��Ҽ�i��d��z�����{ڌ7E�$jd��,p9�5�t��}�b�N�߶�-���\\6\"Zǵ����M�c]穻G���mяҌ����ֵ������L����P��c�H�o��.��/��������NU�Z���^�3:�X�\\�
�.�4Ӛ\"K��T
�j\0P���y�����P G�H�R� �}Ú�j�:���b�Pr�L�u���>J1�8Ҵ�J`;מW�h��}wK�
�Nӫ�:�ye֫��}��:���Bx����ao��-��ˋ�˟,����cm�?�l�.|��OgN>ٯ:�����ς��d�h�mO�]����x�����Z�_Q������w��Op��4��E��w7��\"��<��iYW�3�ڐt5�G�nr���k�_
��[���;TSl�Gh��-�{��jIp�n���^}���z����\0(�m���t�|�t
q�����c�e{U� ��Vc��@Ȯe��G�C�x�Z�##�AVG^��=<�#�4� �E�P��������G��͔�Mkqyd�FO�f��o�wd�9�ը�uV���l����ۦÄ��4=��Y6]�w�F[l��;\0OmT�f�5�+f�I��Kx�0\\��h6�ַd�1h\\�dd<$���S)����,,cG�(�<K.��B�	C�߻Er|cu�ѰF����f���3�A�t͝�4hp<Z�a���W���p�C��OЮFs�Wɶ�Ӄd�B5�<����6��4��2�k�8N6�4�d��o��-e�)��s��Ϋ�x?�U��	ϻ�UL��+���L���������d˶ˤ�����zn4R�/@�:r���������>����.���{?�[69�l4w;��K�l�{���ZZ�@\"��6���˾kt��@�Y��y�2�!Iq[�)�Z��A�]Xr^:9^]�qQ�=�mk{x�Z�\\t�؂�<
�����n���=#��$1����R�$x�����:��u��=�>}5��p�b�b��Eg��c��i<�͕f�tڥi����y�y�^�\0��>J�3Eͺ���\\����8�\0sp<���{��\0�ml��|���\0�q���\0��*Gx�����=�>-x5�e��N�ݶ˸m�V5�աţ��v�{��z�c���^)ӭlz�ݹY�G1�ԡ�ל�~W�����hΡ������\0WZG/��C]ڧ���k��3�*y5\"��@*y.��\"�nl�S/�[[X$�
�Y�����v��0d\\~�eF��x¸v�m��x�i�8�I@zR?8�˦�\0��7�R�Ȗ�&ql��Qjh���[k잓H�s�����݇ca-�F{������g��
a����PU���g�fƥS��g����m��?*�!W�	[���8�+6K��M�������m��^�����u,���Hy}�G�ێ��v{�圓��;:6�����Hu
y/���h��
5�%YUͿY��9��j�o`9<!����\"�����}�\\ ~�m��\\9�ݭnL�.w�v���ڙ_4�Eh���je|L�\0RX�\'������2x�o����]�\'��y��N�B�<S7pk��)��>�JT|
d�Bg�ui�&W	��+��OiS&{gC��4:]-��Kxw�ݚ��ץ���:���F��\"�0�ά�k�v��sM�J�߆�k���M,V�V}k�6�8�gE*�ZZ�u��u�47�ȕ��Zt���Gr�9�
v�<bC��<�a�WK��d���W)⧸�Y	�er�I�HzWu��\\� p)�+Kk=�!G�eq]n��{|�C
�͞��щ��h�b~�5ø`�ba-���DF�؉�i�� I���e�o5i�pQ���x�1����\\�c\\�*�kx�WW�%X�I�T��o�l�{���z]��K�p�:��_�ͷ�ӣ���.p��9s_��<��%ǖ����\0t�Mz=B-�n\0q�Eu/����Y�\'���~;o���ԗ7�::�eKOh+�}_��6���k��_��6���+o�\\���ܿU��R_w�y�o�[�]-�y8�e�	�;�\"f9� 聠��T��z��S+�0�m���K��]1�@A�2�fL�aU����������2(��=�Ƀ,w�d��#4�^����_C��<�峦����$P�EEB�����-�K��p�pݱp򾰒]��h%��~ �Z���v����O�N���~���GZ�=�긆4�\0	q_S����6۫�g���O�C%���������*Z��v���s�ˮt��77�����y��aݢ�\"������]�NM�vu�z\\�Zb�K>Mܯ�&J�NW��2{�x^�<uS[{�2��f�ܱ�qq��r[��\\�-w��è.��wGgr蛞�x
���zmr��Mf3����t��sqr�d�ɫ��w׎i1>^m�6��-�w0�BT�J7&�S2���u�J�Q+--Z�鷶��ښС���+�n3T=I�[v�����kEMH
�^k�?<v�kC������j�����-x�{17�9�랻�\'�ݛ;W�m�@E������OW=�}��ݲ���L�\\�K��+x�ʎ
ZF�if�d�ǰ8��[��s��23!h����W�-3k!�n6Ӈ=��i��I�ϻzG���4��-��[gY�+P�MΠ�)\"]��\0�4c6<S�k�3��\"ߋ_�LS�+>d[�&)�|Ĵ�bb��E/��<���S<��_l\'��Ҧ*�D����8
<��U�<�V|ȱwߧxS����ۙ��N��J>a���u<�O�@��\0�1:����;_�f�j�~`�����L�:�n?�ڙ�bF����g�&i���k��\0�g�&i������=�2t8u���\0Q�ОGD��]��������k��$r�Wu�|�B�a{t��� ����!�v\\B�oWλ����M5��|�>B��U�$����ʓ�6����&~�u�@��V�Sɰ���--�˱�a�0��rc[4�>���18���jM�I�_ǵ����
Q{TR�H��DrT/��A\\���B1Fsh@�Z����g�[~�d�Pϔ)����E���j1����lZ�Ne2�%v�{.a rL�5�<7In�9��x���N��\0hnl%���4�1�^_���]0��ھ��~L��2�~b��۔���_��5i>џq�|��7��&e��\0���_�|�\\~^�k��f��Fۖ��M�����&�v��:�\0�����\0Z�)ɪ�y���]��m�ͤT���o��bkZ�__��qO���\0�#�n��^\\�x8�I_���ɯ\'5�v�\0uV�L/\0b��\0����\0�h���Y�e5�S�kg����k����v��n�w��w����l���m*�ȭ
��y�	�*��So$�g�܍��:��;y�3��k��s_����o&q��~�����>�v�w�o�w���rÒ�}��:sq�������y<�����G��CF�8�\\8��LzG뾾�cgF�ab�p�4�x�\\����>�.����6��[j�\"4|r~]9���\0j�sY;a�������)z<�h3�/���A~�����I?	�(���#NjeS|4�q���	`�mB��W�[�4�D�U<��j:y���q5���g����6�1��W�<;�6ٽtk�qh�a ��v�x��ڟ��T�����?�C�u��]�,k���VD���_�;gOZ��0tΫa���������ּv��yꛯ����w�\0>F��W�N9^NKU[���b�
�JUTd���y��5����nF2���r��˛�fl`Qf����a՝dͶK�A�HF���d�I��:R��#t�#&�\0S�����A�ac}|�\0N�J켡Kp�e���>�{� [�� ���niV?�Ԡ�4��������ވ�����)��t3��?���wqO#���g�}�2�i9��O*�w��>�l��H�G�$�i��IP�Z��EX m28��8.���K�<⒳��y}�����W%�/4�
�
֜q��XY�i����ms+�v$�+��Xm�͌6�9*�@9�귱&�\"�ᓱ]+���;�D_A� WM3�ñ��W
��6�!J���!�@�c�S�؂3,|�4��*#.g �(��PQ�@�B�9��w	ǒ�M��w��:��Ejv����W2VmjA�nb�Lq{�Ns�;i�Tۈ�M��U���d�t�sHkX1$אX˵�G��_+��w������S�
��r}m��G^>mo���
�sX�!=�
�RT��FJx+����]I�(5T8�i�R<�\0�g{�ֳ/6������w{���h=���ǫW�����4H�Y
��peٵ�<�		%حMX�f����7kYڴ<a�൴���^�i����h�u\'�C�{��黃���~j�ݎK��U]�R\"�.��P�x ������h��Ps!r�߉��˩�3!L��0���!�J�q��������m\\@2Pb��� :��\'���?��z��\'�d��B���kxp�qO���.r�Vͻ�$CnR�\"�p�3<6��X��4=5dc[�H�s�:J��-n-b2��2���Vp�>�\\H�7W�`V���3�
����J��c�Y>�]$��;���f��{Q�Ʈ�8����t��s}�o{�
�N��hfD�\0r�#?�����mK��}f�l���9X_-FW7אַ�T`R�]maw^����u��am���6���\0zY��Y����5���#�-��.��}�MB�5�k��{#=�m��X��&ɹ7͓�3oH��>����a���#���n�v��
b��v��6���j�W1�UX;)[�N�c�>��}) ��N����K;m�y�@�Vw�ָ�\'�m�K43H�|�{	��c�[��ĹƧ�QR�\0�_�u�����R	P�;^�������ڻ�V������ƥT
�[;6��T�m���K�Xde�i������CO����	{
��`=�PGS��⃺9&��\\�Z&��}��RC�J�m#�kA�A��5�CEp����M䕟�R�$�r:gmm?-���-�!�l�`�&mV6֖�4�h���̞ٗV�`4S�������1[������MB�orޓ���⻥�a�%�}���zl n� ��L�7ypΨ%f�C�{PNޡ�\0�p�*	��Y�\0r�iL+�ϩw;C.]��͎X�WM6���w�k7T��pĕ������hm�汄}�@��wt_�\0J�h��r�Fk}�Ǡ�����u��¸-W.�B�α��Wn�7jc_���hܣ����=#��<4|e���d��S��\\J�&�����i�j8\0�Y��n��n�s[ĕ��	3٭��,���yms$ҫ�巳��3�l��Fí�ѭz�\\��-��Mn&��i�o3�5{z\0u
����sm&�m�$gQ�+zޮ\\�,P�+��+~N>5<}!)��O(x�K:=�S�|+��%��y��S7�m��GЧ��n�h�.	�G��P��8q75�dv;���OP`�5~H㟬�4{�yc���|d%<�0���7�O��a�9_�s�s�\0�����l{�2����y��u�|�7������8
�Yߓ^��[����1��\0M�W���L8��j��L�\0p��]��U���#�M<	���F�����Gj�V�θwZ4�wo^5?[l�[CD��yC8אRm��p��̚����g���~�I�f��=��g5�.p���#�wd����U���h�l\'�p�%cj馫Y� ����5u�8!|��!��UZ��m��4E �Z�����^�cG�?j�/eڭKlb�ƈ�X6܁ޝ
�͎G�B�YDb@�8�E;\0pq)��Kr�vGª�����fJ��5 ������3�c9�4Se���ӎ-e+ub����,��<t���_*��ݽ^�+��.���\0����WI���ETE��Oԃ����4��	c{�\0�,�`���F4�F�?z���d��2����L�O�,i�� ��O�P�x�k��L�u6�̏�S�ݩ�P�d�� 	�L�v��Ʉ���c���ϮJ*Vܼ�ﴗST�G���3D ����iX��:o�^M�Or�52@0Ǌ�G,Z��N���H��I\0�3��Gޛm��l�����\0��\0L]m��\"�@��ä���﷣��<���Bor8퓶h�6R b����ۇٌ��i�v�#��q���t]>]\\�=���;�I�Q:	��o+r��,��Q����m��\0�%���*[����n�A��&��f�dq�p�o���U��+}���<U���P�|��-o��p-}�:y���NI\\�㭯S�e�E��ȃ�L�1�}�Fd%��5��`6�B��m�s~�]���[��\\Ay�͠q���T_l�(��4���(�Z�ܷ�m�ެ5x�iĮve�[�����|�K����%�և�6�$\\\\��*���w�#�ԉ�9����u� �y����r��K�Z_(>gօ<ms���U���
��D�ϓ��,����ݏ�_n�Iw\'��՛��m���Z�N	����q��Ǌ\"\\;��#s̠Ct$����?J`ɇ� |�p9��o�§��,�]6�y})t�.�y
�dY��:7�:��sX��4jv���#k˹r���:*w>���]$v��\\���k{�~�2�T{w[���7�����
���:>G��i������.uĿ�;d�tF�`n���=��ŭ_�p��Ieg�Xm_ce��[��%�l4��3Lm\\vz��uIq��$�Ҩ�n�ۡ�T�juX�o�x�*����ia��hhI�w��3����^_p�,w��SU�gU��=��a�y+.�IZ��w��`k�9��͞]��}���.`�Zr�Ay`Y�-�2͊���r�ZgIU
(���₽Ґ�VݼqC	} P�F�.QU��dv�)\\����w4~�f�T�W��۝��u��\\:�r,���PΣ�I�uB�L�#��\\pO.�z�uqvjx�X�|l��U<L��;�7��ٚ@��՟\'��᭍����������p��;�Qr���jJ�y7�\0���a�X���:�\08�g�xM���JrH�[CO��Z�t��ϼ��\0
\05S:,^�c�^�c��nll�ѹ���s��sQ�����|Uά\'�
לu�\0�/m�\"�`cȭ$%�Ӈ�%ѭy�?l��t�[��#�>$���V4n!v���.nI{0o����LWl8��[�]?�Ho�\"���ʃ�c�f�m�ԝ;�;�k�,s0�Q� ��J�e߯�9�ōÎ
�:���w[m{\\O�8����i-���>h��n���K���:�zu�6�eun��YWcF����ԺS��mst/����j��meK�T�+j鮘p^|���P\\� �B�d�e5���^$|My�	w�4W�n��o�i?yÀWZ�F{�M	��b����p!i�$i�`\0����⮖�I�*�b�=���*])�Xڹ�$�n�y��ѕB�G�|�ڤ��c
�r]�]�R�]fɥ��������֥�,g35���k[j��7�.�k�5��a�EU��x�7��u���&�\\��	s��<��K����f���7k��~��<0+]��]����*�4i���o#��5�2��
��۾��/��}6�8MY��uy�w��}�J��_�,��I�d
����ܵ���F`�K-��ud5�iE{
��P_��ꌀi�*�Z��{[cC��ӏz���L�l�ޡm(��]cL\\O���DҊ�����K\\*���Q��J��_�A���g0�k�������_��{
&)����P�$��<�O7�|�꽻���6k����iM�7 ����Ԋ�+��b��NN��E����� \\�U�c4��U~��,7�����A�;|-#����׻N�+5�.�yT�󪷣�n���\02�)L�F�h8�k��G+���������FsWq���5�b<�_WVo��aۂ��nq5�GI�рK+��ˤ���C��Aj�ƀi�
d��s�IJ�8w�K6�8T�7�K�tMG������<[U��[%��G7<m|�U�T�Z+�Q��M�cZ�e��͵0�i/mI쪑k�и۴-9Ӌ*qU\0`������ҁ}0�\09(�`	^h�����ժ������lٜ�*0Qp��i�u� (Ԋm�x�Q�٧VE�l�Y.��{~�����&,���b�
���]7�}��@�Em�43���\0ή��m�����G
����Mq�\"��s����I��$ujj��YһX�R(���ڟ�̭F-h䑝=�>���ܷ�8:\'��|�w)��k3Ոءv��-����4�=�!f�g���:Fm�ln�{)��Bn_����=f��b&l�����j�I#����?�=*�Dy���)��nou��p�
��o�Z� ��ާޢۄ�V;v�$�����9��ǫM���J:
8b0#$�6�$n�.A˦�<��~�%#��A�Em�[y��� TrDT\\[�X�*a�$E��:������wb,x���Mk|%��C��xh���ֲg���P�􍃪#��k��I��3��m-�Hq4˽Ey��������_�j._.z���m��\0�ˏ*H�^�r�g��Ç�ikϚ�;�����W~��(���p��l�a��{�ݪ�+�{����Ů\'�G��?&�
�X���9��6���;[�i��/\'�!L��\0�m
����2�Y���7dq�S�s��I�1�=h\07f��۹�ƀ�e�,��+;�or����iUfR�.7k]�ެ}u
����m�#�D�Ϛ������������>��
q*U��sy�F
3��m�ӧ;����1Xuy�͍�7�ok�Y1�G1����\\��}��6��\"+Kz�L �������^�/x�-Z
T7��sڷ����<��8.n��Zhm\\��g�Z[�����Ts�9M1�8{�o��Z��޲=]��n���{�9��.]µ���4��mq0��ȅ�M�^;	.����`�~��o�F5����b3���5��H�]yi��C�ɟZ��]�+6��߷��6�G:
).����L$���6W�ÙS&����	�Į���qp#�2x�;��.k~�Ʉ��4
Ue��*�V;m�9)]%X����Sk��y �b���:z~1/-�����4�u��l�>]uٍ��J�.�R%�1]{��p���[�5���\0��Z�){5|��-��g{CK�YҮ�˦:6H��jF[;���R��5��bi/v<B������5ӰfQY���K��I�B���Ymp��`�j�D�
�2{kr1�r�>���l�Mm����\0~G{��?B����1�9	>if9��u��f�x�[	�h��hj�oV�����-��~�B�A�/��ೈOt�10=�95���kV7��7�T�X[��6��#��c5�ݍh���#�K�Oi_��ck����p��Y���7֎.��Ikqu�Y��k�uۃoJ��m�R�LI�����f��z<�q��H�k�j/1��^|(��{���������qO,������T7�iǱP5�l��K	V���F���@�K�Nx�\0��y���g���o.��������J�r��6w���]3������Z�ۆm�eA%�Α�D�\0R�-�*o=��2���Lx�z�\0����{����?�]s��Ɠ��v9��K�����s�\0���������\0[ߕ-���|�����\\=���r���9I�\0x��s�p��Ҫ���;ͮ�\'g$Nh�\\w7��:�w|b���>W~[�����ˏ�}O��􎎷��j�+]�֠���^���#��,��\'⿬�/������9\'�K��ٱ
O��{ڦ�ka�F����7̭��\\Pp	5K^��{6�j�m�{�E5�뫖Ր�
b)��@���<�X贈��{�X3p��GM5]|I�����J���PƼ�[��뎏W�z�7���)��M�F�v�K����3�^~Yn=\"��2?Y����d;��ى��]�r��M08�����|35��m�o��,\"�p!��L�S���΍�Z�E��)��z�?��`;�l�t����S�ئ�^A���ow5�DS�7��}k{L��������f��-��7
UL,���0�SG-��JW�[�
��u�p�\'i�>QLyYG�=Asj.]�+�����B�hVjͬ4���(���ч���\'X�͆9�s]���D�g+m��d�������)\\Oֳ�I�^Quf�y�Q�
�ً�u��<;�d&��RЭ�m����t���RkV����r��X�LƵ����\0 �H����CO<F�A+��;�-l�x�m���0��߬)��ZZ���9��[�p\0����aeY���B���?QL���mDV�����m���x�P�۝�%;�4����7�zVnu?-�� ��v%���{�.�ާ����s#l���
��\\$T�c�0⃜�4-�s�ɂ������(�h궢�:��B��
)��\'��� ��[��!��RŎ�uv�s�Q�������s�wM�)Ks3�v��\0
�t��@YwҺG:��`��p�൳�;^ٹn���b�n\\58��8�3�W}֏� ����I��i���=3n�ޝ�6fmzN��rM4�$�\\^��h\0ɣ�_���m��_��_g{�-�,-o�H&���{�4߯^��i��^��M�s#���3f�[�~k٦�[w�>�y�E)���:W������%zg��q�W���=i�W�\'�9�o:��ԵpZ�~�SF&��P�p���KL%�=E�`q�Ս�z̻��<�����H�pܛkd�;K��k�MN=������g��\0:x\'����5���]���F���D>Ҹ^���ӿ�9/�Os�\\A�\0r���s����/#�%�����q�o���i���Zn�q烳�ˏ�{�r]�IoN�A��y-��N��7\0�24`��}�s�����=�Wk�����wՔ�\\j�5g���9l���A�����˵��v]��sb���]�%�\0W�\0/�cŶ�^[?ӿ���_+wY��.�K�[���saqk��J��m�q;m����t���:V��{Dd�ir!�L��$RU2��E+\\F#1�E��\0dޞǈ�=ǚ޻8rq��]C�*F+�w��+��Fc}����ɕ8+.�$���{�FI��-6�ԅ�b��+���|�>�#���Y���/5����9���+�,d�6Ǉ��y����Q5���QC��ow�3T�7�M���:�7�S
}I��YZ���2��r�[T��\0���%2N�����v$��+7Wl]}���DUkɟ�]_�J�3��S\'��K!%�\'�G�uk�+���r��R�w,�x���8�-i�d�
 ���G�T/��(`����DOs\\j���kE4��y�`ɨݏL���!�z�4\\
�2������KT�w�{ci�K-c��QQ����a�V���ikpR���M��v�
f�-Y��i�\"1���q�w���֪�I\\���	L�8�0찁�JL�M�CԸ&���\0�s��9:�s1��1���~��RןX˾fYX��_��J�m�{H��\0��Y�澞��Q<�y?RתɈ�f��S�\0�I�(9��2M��Y@�u8Pfy�bﳋy�C�cM#f
��|�!5L�qre0e]T0��\0\\�u9\0|H�\\�0#\"���w�ю4p�V�����^O.��\0�n̸K�Su���<�B���ǾUk�2�x���k��rڼ6CVs�k���Þͥ����@
`Ɍ��9�v+��<8V�v��l��T�i@e~���PL�iQ�	��@�	��*
7Ch�h�f�����<�7,gV�~�{�{�V��ݧ�<�ϰ)�����1�����2q]0c�+Hn���>&�i�P��vݜ4��R9j*`2Y&#T�s��$�������HJ��4OmXA��Z᷷�iC\"��H��kAq>i��k䱔��|S��i��Z��n�Mn�O:��HZ���W`���.{��&�F
��ۜ?Jx��v-�gҞ\'�0���\0�SƯ���?�O�_yC�˹��~��=�?��(��<jy�oL���6�S��Hޓ���o�_�<t~�x3ڞ�{z+w\'ތx��y�oB�g9=��y�o@��o�)�y���1>k��<O*���y��L\'�t��֎���>��k5���4�����\0U��uR�+toN�c�:;��6F��#W+���Ak���5`� U�.vKaMb�
�ͪ�˫v�|�u@�E�G;Y-�lw:= �n1Y�\0�v;7�d�EWt��
�̚`�����\0�e��2�wC	�e�� S3��gi,�Ȩ4�v�#�R����I�
��i�����G�a3�|�`[؁t׍<S&\0i�52�H���سkR:��Q�B(�m������v�9�9`��x����^Y��e�k����MZ�K���b>F�m�s]EƘ.{lﮩ�
.n��	�8��+���<@�d`��J�rG��kCA��S!�\'�y����]Tk���9W\'7��?��\'�p�(6�$`\0�p]�eֱ��
��[���CȪ�s�٧
w�Q�m傣��#��b����NHd�b�bɎۣ��~��`Ћ�?���ՠU�AJ��rm�8���n���܆Mn�fO��]#h��Hͮ֘ކK�]�93h��$3f�
��M�C���?D:�ɑ�����rlv��>��6��Yi��r韉�J�h���,���~�p�UO:�J���OxӑF��|e��#�\"iZ�!�AOq�M1D\'}(j�����6{}��q��څ;�-�JT�������w�K��FgxӪ�<�E5]��v�o��@��p\0G$tq�xZ�����1Xٿ�%`:�O%���j��l$�B�I5�V�ډmP�L�)��+���\\��i���guw��5�V�;m�����u
K������Nv�Zj�Գ+:4�������k��.\"i~l�.�\"�xjO�<�3|�����W����6�����6�«XG3��xy��Â+�}��|)�pD�Ϥ�]k�� w��T�T���r�y�D�)>�.sxb����Oԝ�+�w[�تec�\",!b#����fut�T� �۬\'�P�6�R�u��akp�����\0o�昂�Ѽ�Og��n�^<8��-�y��3B�
\'��\'/.�z�2�M{/�.U�3��k�㘏��%幩㎘.{l﮸N��>���Yjd��h��f����.��g�+ѧg����d�-���	^~^��]�}H��|��t�M�܇�>�o�Ŭ|;8�0���`�����+����ӪO�WZo��s�$mxB�?�t��g��ۿ[�gfZ���[&��\0������/��v6�ړ�[Y4��4މĎ�
����M�?]z�ߡ���d�T��Wr�k���G�k)��joq_G���O~��\07������z~��q���F5�[CG��{�7͟b��ܭ\'h��f�:O����,$Tq���t�ҥk�Zk��b�I�MҊM!�*���O������Y��i�4`�]vyw���8�a4�U�,�
�L@M�a�ku=��D�v+6�q��l}L$\"9�0�w�|�\\�8hd����T��3?�l�a/`�PSH��^(B
���:��%eJ���0BԬ�������
�9�@�@�
�A\0�e4B�5(��M�<��$W�;�#5r�Gm���T	��05A4Lx���A˰A�n��N�TWt,��4�A��
*��\0D@�\"c��bU���]oMm|����*WIQp���e}j�bep��p{�v
5�4�]�a��T�A��4�rP0�⁺�E(������s+�͠��4\"�[Lb�����k�7�V?
>��]Ɖ
ĵ{��F������rr9:�r�	Y�ֺL��#���U��uyv�:���8�s�\\봌��t���+�a��y4s��c׭!�;�V���iۦ`�{�M��a!�Ղ������[�A�Z�d�Ǽov��[�4��r���e���1���G�28�*�=ƍh�K}jI���d����D�n�@��J
b��\0�����%����/�\0�}����9׺�x��F�9��:C�����zmd��[P��N�uY�NѮ�r��K=õaZ�sI�r�k����e&�aC�gෆr���ʇ,0����#�)
���h��W���z�>\'5��5-�t�8P�+�^9��Y���k�\"@�j�Z����8��J��5��Cf���ɼ��cI^�>����Q�2�X���yy{�}��&2��t8y\\i@p��u߳��zA�&���[�l\'Y�LlcZ_�\0S Wm{9�Ꝇ��o6�@!�44���/��ˊ��WI����na�>Y�e�I���eܿ9?��p���g%km���7-�G�����:�i�y/N{�P�n��z��V��H������T������/��?�<c�<<��u�\0
�ݷxn���aK�X��\0w�@����r�^:���!�I����7�!%�w��IW�����.[���뷪���d��f	SZ�U��KQM,⠚��Ki�M8���\\�V��5j��Ǿ�Mc�8Un�Mv��mr[<�����^}����ɗh�ù��D)q%T+Zu4��VT��غ�ѸG9�Իi�����X��qmw`׊휼vaY�lM������N�Œ0�ژ���aWq�9���\\�WΈЂ�Qϧ��i�jB ��	h�Q5��S�m�\"��o�A�-� wD���UD���Hm�0t6Ns�C��KNJd�G[��d��`}r
�]R�W���Xۉ�(`�u�v!�D�7�լ����T�Ի>�q�܋���:��Smsm��A�kq���R���s����rڴ�*Vo�Xn�Ի
Ǘ��d������$����\0y�D�8�[h����nRP���j8Y>(a+&$yI�C1��}��z�\"���@̠�[���
���āEG�nV��w���Y��Z�Yl 2ǒ
��}7�D(�C�QO���{l\'=�$n�9��d��V�0�]��@����Z��(�EQ2�kY\\3DL#�pAea��H�0<QW��4�AU2-�,_#�\"o�����=��<J+DL���.Qdf7��0ڝN���-��.����\\�\\�\\r�Md(E;\0��9T=���I��ݧl&�pĮ����r4�����ck���5��ްu6���;���<��\\�t�<�i�u����]Fi]#� K��!�����q6�\'I�=�X�2n������cdM���LrK1:��4QI�����9.o(�\0��[�mx�������{�\\q(=/�:y�03�/�[q;Hڢ�,��:�����1�g���������\0]����qx��Jd4��d�n���b�.\"����ǌeĴ�
Եz��8[��#�d\0�;��H�k��;3�i�v-᜘\\���p�+���Z�I�%P�1�J��
a�1��J�d|��3[SFҼ�f��܅t����qF	{�>�Rkv��Ͷ��oI˻��Sz�cnE�v���8�gǯ��rs|�>��gBZ�Y�\\n���N �=��X\\)���{%�s\\�>���Ir�s�\\j3]d˝�#�O�%7ki;���t��i�ڽZ���=�cim�\0�//\'w};�m��\0�:��	�eDӺ���@0�Fb��߫_[�2�6�\0������Yg<�wb�io~Y�:�m��G�[N�v͢����i]_��}��[�����C���Z��!�x�vE�y����x,�^~~����G��\0��n��2��J��>����z_k?��}?v��_�j~Sm��)��>h�9;�W�97���\\>Z�O[:Mz\0<�/��}x�QQ؜�n��q�{\"c�
��uPY�[�͜�ڢ9ׂ��y�xe��
��\\2�\\Y>ܝX�A�,Mw
�H*��HI��4�aI}bȉ\0P�J�+]Z�&�h
�(3\0��è���qP+�;�L��hQ��E1ἐD�p@���\\&R���`�t
`�9�3i���<���.�d��ْ�E\"�]�l����i�e�A҈�y��pEXC+[���S�F;�*5�n��,����0j�����QL2�$f���ZD�N�Jb\"��7�i�2�G3�
�eD�eiD
��֮�u*EJ%m!���ny��)�gy����m:1����1�[�-��Y�qc���ه;Z�;OA)-�P�i��G$��8+����in�3�U��-�$�%U�%��Pq�|Q���N�jV�����4��PɆƈd�fS
i�r�
.oRADT%+EM\0��KW�N��Q�淮�7\'\"�k�=�D�1{���̭ۇ����k[�Ȧl��dndvť®\"��r�B��az���u�o�����D8=�a4�Ƿ��Y��^�+�!�p�u�\\I��f��׹!Mg��v�NV����-�}�)�c_�ue��.�C],�29�S�\0�)R�6���f2�nǀ����
����-_C�����~�`��@G�K�6݇
/?�+����ǯO�^����_�o7��j��R1J��X[@)���I�����[��K���5 SiӦ�{l���v]m��4#5�X峉�b�	���.�\\�s��^�O�nK]=�!�aB�=��<q���yS���k�r�/�5���*c_j�g�4
(: �Q�b+A�l��.Y�h���\0���eW[v�ep.opP�Ioe��\0#������-�u>��ef�M8�co7���K\"���õp�l��|ST��e�\08��QB��($���S+��l{��������h.\'����{�.:\"���T
��=�����\\7��/�-�1:�Cek�{�r��y��sqͼjȥ��n���Go�-;]��Xd����?mu�o�P|Ԃ$c��R�M}^}/58q �Q�9/�f����4x�$J��_T\\��PJ�
�/��2`��s�آ��2�qRՉZ�N
�n� �P��VC���\0\'�ۻ�f�=�\0�����_K��o���\0\'��_o��k�}?��Ù�%��k�c�hǊ��;񦴘��x,rk�^�둡�R�z6�If��x�=��1��R^���|x��F���W5��y��ɧ�r��қr�1U^:�,u���%?�!��<.�tye��
��MnfX������Ĺ�R��3��)�0
�Խj���V���Ϩ�RN��w6���|��cھ����1�b���]�z2F��\0NL2�r���������ߏ�~�{AXfӨr{[&k:_ݴ��o�Z�^�ڎӰm�v�EW��_#��>ׯ�6̗��ǧ�� �JB�@R��(iFATޠmh�.E���s��A�c\'�Yp��e����#�^+��e��LT��1��P��5�v�������9/>�����U�aأ�@��QS���h��Jp�6����͆��L���t�a��iɗ����Z2�n��I]^U=��A.`���)��Ů\0H+ov���.����a���ܬX��sh;�(��s6���r!s
�(F(� VV�� 	P(!E�ςV�R�F�k�&�bU��u�1���V�y��g-��a�U�X���;�u��>F�K�j�8��*S[�k���~)�H/õe-��n9��.v[C;�EQr���ۣJ,�{��h� �L7*�F���***���9�35U�v��D����q��*�$�k�Q��NW��B�)��̓I+�pn���VM_x ���� ��5퇖�FT�c��P
FIPr�j�X�����E�=p���_�e�?
�d�i���`Ʌ��c`\'�^	�!�6����3d��H��5�-F�@�D\0�̄q@�k�D�0�dz@��x �V�UO��:)�#m����d=����i����y��и�\"��A{��-4s�C�fՑs
��I�uk�\\N<�H��M~���{?�zMř&FTx+�e��{����3J~��v�׹�˙�1�M�&���T׺�z7�-�
	44��L)�N�7f?�f�uhp5#0���}Ը���ѧ	���og5���_�g���o?�_�U,m8�����Z�P���}..�e�S�X�gM�r:\"Ӈ�m����<҄�s�;i�V��
��oZ��\'H��[�k�Z��u����p�W�������۾,j��܍��P�\0Mw+�t����U�߾�c���o�E]q�
�E/����ڙR�x8&D�$�b�&p\0��
��Ǳ�χ�������G\\+�*���t1�je�����5��E_�mq�	���v�iU�ߺ�2�C��x5s�|=\\9�Yb����Oveq��B��Y(�(d�C%(��UE�˵�W���Ó���6D������,g�g>N��dGv�C��sGҳ�f��W�oW��ݾ*ڡ�n�dsx��5��\0~�M:�7�N�����t7���d�D����+?P�K6��.|��s���,WMU7��Y\0��ֲ\0�
�V�1Zab��d\'���\0� ����]��[x�&���Kj*qbS�.*��?[��%��!ڶq�W,/�$8C$�H̀��o��ӧ{����s�~���y�Γ�W	F�>�\\��F��~/���佰��s�;嘼�n���-7!��z�PpȰ�kկ���\0�p�g���7�%#����ֹ��d���ߩo�枒�\0V>^+��[m��Z�6�TWD��;�X�ұv�^�m?��&�v�R��ۓ(��&g�����I���:�\\~�_���r���A?t�NIX��B�\0u��29ج�R�ً*Zy�Iv��5��p-,x�Ϲe�:N8V����i�����s��q���x���1��K���<w��rι1�8�\'Wm��s\\9#�ö,-p�%��(�`\'.�vcmP�����\\����dN���sq��-�î�d�ZSZ�El�,uB��r��L,:M�w]��`���g
���y9�<���o�-���z5�/���&���v�V����IA]$m{hEPS���p%�c�\\����x���k,�ä���BC_���m*�	 �\0��sH�@��$�\\�5E+�9f��O���Dj(>T�캙��G%A?B�sۻշW��`��Ze�,z�y��.��72m�$C	�Vc�h�m�\\V�q[e���sF��;��Q�����0c�D䃁���.��.Y�ݱ�[�.U�hs�\'����
�܊\"Fܞ*�p�K�\0�2n�b5���F*��3R����6px�2�U[�Ȕ
fQ�6�tM���ם
�+(��4����z���J4�B�#^\0�P7CU�m�(Zk��KE
.h��
��@��V��^�\0��y�9�[vB��1⺼����!a�3R��\\��Iznlg���><��s�/G�#�aM�z�_0�!�9^^��θq��|F����㽞I���Y�b;I�:&V�\'�����Z��a�����/��m��ug����+��A��<�EH=����\0N[�Kũ��
8��PÈ���m;���<�\'%�n��~���=�X����s��tп
����+���1�˧��7���œ>>�7�/T����<W��Xٿ�7Q;�\\i��g.Ӽ�ŭ�b)6Y���sa�Z�g�����C7�n��۞�Jw-m���������[u>�0��A�wҸ����l��������Pl���F�S��ñq�S�^��Gm~��/����Y�G�o6���E�o�gW{���i�#X\\�[�b��}V�Ÿ��k��������t�#
��k����ߛϷgKm�a$bF]%ru�����qכ�*�44+��>����ǣZ����G��t���r�\\�H/�Үz&:���
G
�M8�N��R�X�;�|�+hֻ���net�\\����3px��w���vyu�k��);v��d�mn�[摠��K���^�-�gG\'���#�ϺO��Dd{#�g�K��R�A���$.�G�s,��s|�$����~��\0G>.�WN鈏���\0_���>�*��!�O\"��������v��Κ������ގ�����,�����\\w�st���Z��+��p��o�N��3��o��o�lq��,Ѵ�@�_������\0�������\0�I�nS���y����1wrخC��TS���w�y0k�5�`�l�~\\��\0V	v]Š�q�����D�ֿ28U�Low�by.krr���-��TT���S^�w:�XF��D?Z\0ȁ5��R)�y,6��KiZ�;��Ь�c��1����� A�w�/����L�2K2k�m�j}��F6�����k�����U�,��PQArd��!v*�tY�76���)�x�vÖ�sf�z��\0N�Fa�zt�/���uh$���g�m�K}�9���.

�	㚃��Ѳ0��{U=�n�)K�0�+6+�c��
�l�\0*!SC�T5��4�B=@k�����0h����=pSN4�%\'�s�]C\\�5(nE���4cΗvc�e,��o�-[e�X!��#Vs��}��f�l�.X��i�nws���x�/�p�pZ�iaf��!Q%����c ���H9��ԠA�t��#h3����T*Ԫ�3\"�i\0(JiE!(���>���]��PP���\0,�� ���^�J����`�\"�t�#^H�HJװ���ډ5oҫ\\U��Wt@૑��
�(p@��P�\\Ђ-8�R�Dn�cĨ�3���Q^j��Q7�܂O(���$灒��b�5�@�B��
�/��2�͸n[��&�nefֵ�b�m�[�Z�R>\0f��^�.,*�W7�%��P(�!qU
*�[mT�H�\0�����k�m@�u��$��e�D�B���,^�>�R�|��W;^�4�?�7ҷ�tB?��~������җ���D=��=X���|�� 媮� ��B�g_X�5��#絻{�gIe����VkkÅAէM5S�|o��\\	@{
��l�w�F��?6��@�xכ���o��o�z>��\\�U�Su�;Ѱ��uK�-Ӝ�8��־G����yy,�2��uf�#��� Rٙr��i�t�\0����}��u��w�y	���:�1�џ�\\�ϯgm�p۞^�G3�v���\0����\05WI�$�\0T�\0+��\0M�\0-�k\0���ak����z�T�k��Gu���JG=��~��x?Jᾚz��\0g�M�������k�����q&��;����]{m��+��۾���9.�-��⸵o)\0�!��=�u���ޗ]���q���f���Y�\0��+k�X���t��x5�c���޺m�������O.=���B���ye&����B�<SM��דL~�<`C\"�@U��Y��ϕ����fF�V^�фfO�Z�g�f��/Lx���#uEx�m����.v;k]��.wWi�F�3X��M��Q��<��<@걳������-k��g�i��~,y�W<s�;��F,�\0�Ӛ��Y�W�۶}�=͓�ZF�W�sX8��r��ǫ�v����&GN1oS��9�V$ԗ.R:Z�u^��8�oV��ȇc�{;�M^~M��m��i�{j��zT��U��i�����V3�$g��j�޲�:����
3��i��M=�@���
5;��y���ҵ��q���q�\'�9��w��˸Y6�7+��L��ج.�Ig) >���W���ʾ��,;
�QIT�EB�̰�%��do}�Yp��Kݶ鮪��C;�fn}�ӧ&_7��ǳZˆTf�����AL
���pA�=�2��f��q�1�)�
�͌�ݼ�>�ʾ��SiZ�`�B�A�\0 k��T����k�N$患�����4��<�ۙ6˙m.{jp������X�%�c5�8�;%Zu^���f>��F[V��(G�������:�j���o��\\�ZGg�k��TtZ_:\'\0N\\�V���3A+s�8 ��V�EFu³S��]�h��y.y!{H�Q�����O(�MrJ�i�y�A{�J\'f~{٥q5��7cc����������fm���.k�f��E�$��9#��@�JT�-0 `��4�i�d�(�ª��T\0:�
	Da�%\0<T
A���@�.<F��k���(4�A(�c�#P#d5
뫖����޽:ח�9#u*9�XƷ	����}jf���X��\03���utǑ�f)��^�J\\���!mC#�Q��Þ���+�mkϼX��m�ՐO�F�ሠ��1�]�zƗ��z���etN�l�,%���\'N���y/�����_YmP:���n���:;ɝL#\"����Mr^�+����5�gvZ������svt���7�:{�����T�Q�߅���{gw�۳[�7�}�@>����\0e}���,^_�𻛚q{��>Yc��W�K��\0��O^��M���ol#�[����m�>�����~c��[Ͽ���їQ�#@�7�<��l�Yl��ձ�*��.��,�h�>���݌b�NV/3��V-����6���
�,o�\'��t��8$���1��ޯk� �v�FG W�NG�����(�Y31����q�Z���B��C+	�h���ቨ�A_w��p\0����gqؤl�Ł��f�q��
�)�\\���sUuFHΨZ�cZ>��эPs�l�o i�E���M��q�n>#&����+5gv���M�m����cv��̬J�b��Gmee�rP1�[fG�wk�`T�WF�)|zA[a��BhNh��w h
+��k�����H�ZpAam���j����;)QZ ���
+�Igp���I�m���� ���(c�9\"��A�qB�4��sX�l:������qu)�wj?u��n_CN9�8��xh�`����V��2����n��(�-k��\'&K+6[�<˴��e4��\\����[�{�Q���m���Ʀi�GwDd(15%?���s�x�صw��L�;+\\�ùAY�--�e�õ��Z5���Z���G�Ɂ��\0ƽ*Y	l��[��N�T.�4tG:�h;J�m�WB���8R�QVZ+��`�m-�u9���̗�~��|�]nܷ��<k�?=Y9�(mkL<x/F������=�e^�M�����nN��h�\0������_���ړy{u.�w�`t@�dq����+e�Ig�T��b�qYč�j�8�$W�_�xx�ݯ���~��\\�_�O�y1�����t�[��o�����7>S�hhn��y4R��C�r丙�\0]&o����i��XLӻ�oZ��rj���k�ܒ.�z	��3��^��j�D�\'�����x��y�������lכ\\���P�mt>�Er=�{&�n���)mB��}�WH��K胁]��E3�C�y.�y�tn-4+65�æ\'ԌW-�Ѧ�ݗڹ�ZX�*�F����i�G�n�N��<��cU�qι��R)E�G���%���f���X*Y��hW}��mu���&�K�����i���6�8��	/���e4�{�׏k?^�����ֻ��̻��VvM���>v�bZ�E�뮲z�m���G��n�c��^~�}^�[܆����U������^�qcôεg���7W��%��:w{>���m��̲�fSI�080�מK�pO�?��}/��Y��f@�bn��;�֯�����1^�iS̡�]��wrEZ�j�r�4�&�ӱB�1�WY�]��\\�F�1�[q�N��d�E �hF�W\\�v������%����\"�*��xݵ�S\\�W�Y�v,]]���In՗C�����C�j(5T&hd�0d����Ќ�Ei���6]�սvyyx�8gdч7ػJ�Y��Ep�����kM�X-�h��B���/>���8�r����T�4@����T�0k\\�88�����l}X��Cp
!�RQ]V�fB	��8<�O=�bo#�(��������:�9rm�~.�%%ّ�I\\�Į7g�]0�S-�_PsQ@�!����z����U+�o�ṷ��I�=��s�YGC2�#þ�v>F5��8*�e��{h���W���O4SRjNea�<�\"%a�L��+?_l���,yo�Z�[��!�6��\\\0�(��	��d
���;�5bW$��^�F/����w�yy}�ڭ�n�L2��5�i�bܽ�/-7������٬s
��W��:��	F-\"��wjpU-��s8���mu�\\9�h�B���5B`�5^��z�����ޣpsa��w�o]�n^/f�)�����w��q�;tW�*B�\\�����If��c�9/>�����ʜ9e�k
V�5�2�:P+�}\\j�L&8��������C�0f�s[�{98&����׭zKŝ�Ӯ�|�^���d�<�ۊ�������S4����N�G�2V�*�M�Ŏ5
�C��\\+Z�\0ji������@��;LZjmG*��P1��QeJZ�Q5���F�6{s�BB�{Q�T�vDÈ���L���\0�	{��u_���.{n�qpg�f��K�Iq̜��I��6���lc�)ᝨ
0k���~�ӷZa���c����MdK���N�0�.u�T��ky{G�3F;��\0�d��11�[��7>���>���T�x�lq�_��R:�z�6n����|h�Z��w�8V�hPԞՆ��͐R���pS
��ђ4��\0V7�:E��MiH�\"��q�g^G�u���w^	�n�>�,f�����F�Z~��ڽ�m/X���e�g7(�_^����߹�RX���޸�ҽ|�S�l&�x��Ɖ���jh���(;2�.g\0���|�	����/g��o^?w-���{n�3wks3�?i�lH�Ǜ�kӧ�[{���>��#�k��Gڸya��fa�ط���ፔu���eݫZ�K�f�CN]�u߬�O6��N������
���i��tG�w,��A]5���@�C��Rp�H҈$
K�|)U΢��[�9i�OO�~�\\	��L��Hm���>�#
��e�1Omp�\'^�B8w���cƚ ߇�V��i�@��PHǂ2@���B�L�;
U]\\mOT�4ɂ���P��
.��P#�\"��^	C�@59(��#2J�4T���ڤ|���
���]|�K��� v��j�8�겳}̡�yx��2��l�͹�тF<�&��ε�sT�;�v��gm�x��q<��s8K�۬����T=��+\0<-��h�nBFv��Z�K�rx0`V���K�k�q�����2r�ѦV���ɇ}�����uk�ڥX�r_!�A+�=�Q��0_i<]����/u�b	@pk�2�7�1��V6�κ_J��2,\"e]�ܳ�owO)?�DIs�<�;��o����i\0T�ڱc�5���~��=��՝��]maύ�ݎ��jN9.��׬��F��FDjI�~�5����Oy�_�^7*���F���Vli�܀\0(5&�ǹf�w�+^��d���$���P�\\��\\���NY_E�h�h\'Anmy�7�ތ�q��W�u7E�Z����qn}F3@�L�B�?b^����Ժ��cf��$iq�O
�ۖf<�b��ɍ�n�*иk�^����9�+�??��@�AX�᩶L��Uе�gm������LVƧW�x<�ܯV�
�f
k˃n���bwNn�����L,��������=c-m��W/����~�u���6��=[���a�w�V]Į�N�?Z������;]+�����5��(���Xdt2�F�Ғ��o�[�qn1�`�ܾw.��J��߶�\\۸�gڳ�u����7E#�xŦ�p}	rBB)(ҁ4�M-E2UӎH��HH�\0������<��FG�D��鞣s\\�\'4w�t�w����6�9�Ӛ�K0澱��2�R�eu���\0NIm#��5���
&S�m3W)��ha��pp$j�V�b�ϥ����ox����dWm9=�.o���.��0j#5�/�s�m���AFX��g���|m%���U��Ձ���son��QGwb���%r���7�Q�j�\'4fU^�	��E�|�$,8
�N���J�@��-�q\0t���*��wb�	��Q\\R��F\"F�P|UE���<`5��g\'g�PYG�[��WK�mr�縳��fyI�+���$Ts�l�\"�d�9���a8\":]A(�IB��7T�	��a���Gݭ\0欌mp�ft��팻�c�$$z�-A6�c]��n$E��Ѽy�ͥg��ъ���F��3=�8�ZFn	kLUG�6�Ng�� ho���� ���S\0 �3PP\0�
��
\0�䨊W��y#��*�k�U	Wa� OY�<��hb�G\0�Ae���;\"�W�-�Z	ȳ�61�`��u
(:-�$�µ
���T���Thij!p��vr\\�ч��c}���g���������|հk}�NJ���;h��0ĩn4�,5����/q�t}���n��9ڍ8S5P��C�PtE����&+�#4�:��\0�k��Y��?�MQQIP�6��*}z.I�̨�ؗ�N���EX2\06�M�����W
�G�6��թ�b�-˦&2���2j�=�F�r6��5>
mq�fƛi��0iG8���c��.z��np ��\\rY��ͤ�4�uӉX�ō���%��tι(�]����frY�]�NA�]�+��TP�)�R�S�\0��S5p]m���姼x(e��/��^�_+c6�n57\0�7��?Z�������ܿ[]�\0���]���\\��P�+�z�S��{�n����Mv���[V<=����8��+�!�H��J��u�:~ۅ�Ѱ���ݴ�������v��T��-L6�kA9�X��eB\";�,���3�\0��X�e,�}��B�x�v��Wu��͹�sZ<�׵q�DY�/��i�j�a�lחHj���:�\0���co��N�ce�@��>���5�I=[\"�}����F٣{t��C�#�ÒF6����蛻}��k��I6��$��?��A��bx/{:�ώ��w;���\0t�.�u�JSC#����,��r�z�&��WO����k�?��7|�����<X-�Ju^���K�?Z���yn��~#�c�i��[Jv������\0&����_��>���$x>M~׹-����21��o��Q����{gK�s[�����V}��;�YZ]��R�WI�*RƸU��g·�E��{%�����ͪ�p�˯�V��ЁWR���y�:W�O���jyC°��u޸������
�,�
\\
��QUP��\0{UCuPȤՆ���\"���B15�5Ԯ�`��a�x��������3&`s
�r�H-��ۍ��ā��={�yj�ry��e�P<�����9�.h\\��X\\�M[P8��˜�
���4q��j��/Ki�fU=�\"�}�1�O�j�I��[X� 5-ϻ�\0��\"�4S09��W�P�����m���{���\'
�eo]�츆J�f���*��(2��7*������f��w[�-\\k�ܳbʲ��\0\"�«-��o5\0���Gr�c�f������Du�p� ֧�&/��0�i��u�*)~\"�i�\0\07�;L�nlR朔2����:�1�{�?����}�.��ci+%F|���Rx�4�{Cq��\"��z��#��ŷ��V�k���8#�I\\�� ��Z�9MY�������`u�#�}b��?}�\0B�/�D�:�;���8��R���X4D;�3�*봝�m-�Rl1H���r�ӊtnv�!�W?�q�LH���Je]�C���R��9�\\�Z�e��wv5�M\\M>Պ����mq\0����q�\\��gU�w�-�$���l���~�����0�\\��;����������,�+��Mk���z�tz���
���v������n�4
���<M�\\�\'ٚ	hS��c�p�L.P>�V����3�6��C�������뷽{}��҉�|7�:��I�D�f��\'鳴j���\"��t�҄`B�bV�dJ�����M�����������C�V��{�s����糦�$�q��˝MB7���n��bk�;�ry��o%��,r
?�EzP�5�\"��N����$\0�)_؁�\0d���r���P�TH*5T��aLB����S$Go�(;�����p s楪�XZ�:�ֲ��X��wijF(��!�
��\"�7�\0�EA,�řǒ+7�o������r7h���:Y��SQU�ھ�� %F� \0��iE;XD�ֆRC�xk1%Y�H�l{C#h{�뮯/&W��P`��Q�\\�˜q���&X��wuԎ��:G���ׯN<*Z�Q�
2p*�5�����{]�
��:9�j��k�iZ#�$��[��n4§�&�72qT,Z]+�>�>��\0eUf�-��\0ϼӡ���,IW�̔���ObέVrrhO����l�}�`�㗰������L���*4����#A�Ԫ9��*�͎�}�h��o?��e�^[;�m/��x\'���r���/g|w\"�Տ汇L�rk��ګ8k.Ȯ�s@8����me�\0E
���:�;a��1������vG0.h\'$�9t�F�P�s<Q�ҙ��p�mѻ�N��ڃ%�tӹ;Ԓ7E;}ˈ�#���+���WN
͙�u�}m-��,mEcگ6foVPUk�\"-�7��H`�.\\>���=lz~�-�Y{����!��f�p�t���֯������k�t����+^C�O1���{C��n��NB\\Z�\0n2V�[�Kl�j�yM8��T��my��d�Y0�\"/w�1sdۆW\\8��sPg�#3�bн�n��u�����M���/�Z�7���9�X�I���DN�� T\"��n7�;xlRW
�UU8
�I�m�0��p�R�B���1��4p5*�lzk��R�G��5�M�>^6��6F����
�X7��zdm��\"���^f����kau�m?�\"W�t���GÈZ������w_2�٤�
H&h\"��7&DÍ)�9-jL���TI#����>_ظ������Z�8��%�:�W\'��
7��\\	��֞�\\MP9��!t�B�85��9L�;�@<v��M^>nF�04ih�-��H�N2�Y��w��tL4�k�����GE���}QNY#�i�z��74�WP6����sq�Um~��rN�#�:� i�U�a�x*cse�����DKC70̛+����[ٝ{���4��1���<pVf�����ӇqV��h�|��t���ʥ!ED���T3@�B��UD/�P�H�Q�bdâ�������ڱu��rX��\"y
A�f��
dp�n�V�T5d+�U���z�]�Ja��}��W-��z�y��W2����;���>��f v�bTe��&j�E\0�H�T��ڱH���Jki��F��P�VF��.��Z�1�鞢l��S�W]6y9���M�������维dі��.�a�����x[^%�p�G���=+2]CC��=Ds�
���i��;K�D++\\�]9���l7��d^�9=�o���-�+�ׇd��+�u����冠U\\���i�#��i5����QzOa1��.
�)�����c���*y����{	�8f�9\'�@\\�A��W<�����\0��I-�Q\\s�� �|4���|UQP>\"0�(�@ =���������I�Pw챇�q\0�;=���k{[y����<Ter7���;��K�b�0���;q�k���.�>��/F�W�n���������ҳr��[2G��H�q)�5�#	�PL��+��i$e�@�%����eԠZށ[$��\\{7[�(�j�}�]&�d_��qh5�*����@�JZ[X�*B�L�a�
��w��u4�rZ�9U^t�e��ѾH�#��ŗ�Q<v�\0��1�sZN���)�3��V�#}+I\\o��/)5-��n�1	I������#�YZ]�6�#�oޙl�+�DcS����Ѭiv޸��j��p}A�
�H�s�oZ�\"�&�Pp�
+�H�s�%�B���\0�As����2�S��=}ݺ��k���R��W
��i�,�뫋��Yn���F�_�ڵ��V}M�]8X�c^ڌh����]�o}�

DXS���&yrP#�������jk�\\1根���)J,�Cc���E�;lҽ�%0�A��Tk
V��NJ*�y�!���y�F\0*[���ʲ7U{9qkt��4������}y;�_$�Hd���vebܽ�!C[�F�]!T<0(���
J
���@iD+c%�I�\"U�ϱ�燼{r]5����k����1�\0W�ܦ�\0��C�2�r\0qX�g~><�2�$ҙ$5qX��&	����B��O��p� �$2HC\'DS�T4��,N��JS�fՑ��ͫ\\1nQ�ANy������|�Ս���t����G�=K{��5��/ص;�{;n�YZ��\0Q�w�,��uk؊l�0�\"T���\'���Q+$h�����\0���S�����4
�
a|�6���*iΫ8^�km�3��Fp�f��H��+�ό�G�ӎw��Smz(�C$��{��iԺ�����րb?b�b��#@9�R��@�N9	YiU��2���28�]+��pS+=���x�7�Yg>l�ĵ�O>��\\Z��馒u�k�\'-ۤ�?�_6�y��:��0�释Fƽ��.��@vYsVpy����^Ǿ������v�����\\M�W��;�?����\0�$��=���m��{ᦳ���c����H�]\\
��������������􉺢ظCt�*48�-^��P�n�88cި�髗�j�P3>��K�|.��0R9ƿ�b���������5�=7�ؘ$\"��8j̠���ͥܖ�\"��O6�ZU!������\0�A�����ai���~ �Ib��;	H�0�貙�Wm��?� ����f�w�d��I-6��Zֺ��k�l0X5�J��L�W�����8>�:����=��B�X��Ӆa*�\0%�ץ��d��� M\\�a0S*k�
��Io+e��sO�*�\\��:��C�0���i�^n,4n£WG��wg�-p�,�Z퇟�\'M��4
�ݐ�F�SMj�ݤ�*�s��j����\"��J+�H����Kz��I-�I\"���Q\\dQE\"�K�d�=�B_l��fU���X��[у����V��\0\0���:�KY�N�E��:�u���I �Lx�
\"(�AC�TT�!J�,��]��i?�gi����Gh8�)fc�n`���kY���F�2�Ӂ���nǙ+�]����U�������>�P��dl9�#�=��o���vDG�Yiv4�imQ���Ul�4�q#\\}�*D��h##��@
a�{��4�� c��2Z
���R�������V����d�\'�̭FvpIGH��O(��Ӥy��SY_^[��c
�e�v��z��f�����.oh��}0�<<����f���q�i@P��H�F�,䉂��g�,H%���k�9�kg�<bG���8�i6��t�]|L�����#}�ܽ:re�y���f�\'�X�:�!u����v��c����[�L��$-�������B����qZ
�c-$�i�/��TR9(!�1(�������p9d��W$��pC.wǎJ*\'0�
�k������R��
)��e 4D-j�
�\0Ĝ�
�T!�� V���c��	@�sh;V9(�#�8�[S�6��J���06�N�
�z�Nt[������j7�,bl�n<�OS�ݩ�C�qMk{vj����hcc�&5�vf�1���o5�ϣ��	VT���K��wٟ�0\\�o\"���⺸׺�U@�����8���\0i�@1�s�TtF�熾�<���}t�09Y��6��j������h��A;�YHnΨ\"���\0�g�I�Z� ��E6{���_z�0=I�S�+�lߤe,�NAr�w���ֳ�e;�q9���/l�(\"�e�\0)��]
QN\0R��
��=�ͻ��ujG��Ԉ�?3Oج�o�c�\" :�8�ԮQ����ث*X�7��x1Ό�\0��Ugԏ%���g9�2�4k���TDd4sN#�z�:㔺8�3�[��8T�TR�E���4�����b(/pB9f��jU��[I��ǀ�)��KEG5�Xj�\'�VFn�q��2�:�s]&�s�� q{�K�J�1nm��~+wu�
ʖ���\'TόPQs�;]M���g��F�Ѕ��7X��7�H�.�n�I����&�%c��.����F7MW����:�$���⮔�^����w�u\0~�~f�Z���v���T
���6ܷ�������F�����8bhUEB�RTH��##V�Uj��?����Ӣ���oܢ���ms�9����Gp�ԲV>�W
L\"��})��w���Ͷ��k{j��]��Y�m[��������s�����1��i�����\\�~`hi$�CP��M~�2>��\":�1+7��ϩ�uCich]貕#��gI��C$p��cQ��O*ׄ��L�ʂ�)����\\sC���ǖ(X�������	�Z�:^���1U}A���]��4�pXۏ.�\\�X�wFn�}?u�\0��\0��{���szCs<E;���\0\"�v�>�П?���Om���דS8
QoMly��%j��[S��χ�u��+������kϽ�{�4��0_�k/M\'�9⁥ؠBI�U
��k|��j�s��\0���P=�O�W;��A�48d��HiTW$�b��MԨ�_�����
�]��FH��vH�\0z����֌s�QA��T�כ�05�V�3%J޲�~�I.^`�%���+�۽�\\>�\0�
���8���66 K�m�5�]e��r���

qV%����P0Vp�[��Y���:1����ڟb�足a����n���:31*�o�n
*\'���\"5�2�4�� �4A�;4���嵜ڇPJA�����;�I�)�ZV���iz3.k��p7�B\"q8�)����V�X����K� ph��5�&&^g!�\"�`@@�-� s��a�Et[�4��\\pPhmm\0mOԂ�=��D��r���� t���	������B��Јo��h��LA��*GJ�	$
sQp���K
1�:���S��P8Ԍ05���QE.�&
dQM�H\\9���am��V����qf۲(Z(@Ɲ����uy�X|�l�~��Q������CX�K�I��<c>Sm���zr�z^�-�\"����|R4���Z�=���8�Ñ\\�J�,˂�QG�):�{�e֙!�Y~\0��r�j�c�]�~�m�6�y4�r�}6��]�7�oN뮷n����N��k���ϴ���qp�3����B�妅�*�����t����`ݶ��q���*-�uC/lRd���%��㴽�J���,���
�N|2p�U�W=vvMv2h��\\���}În�n~թ.w�5h�������֤f��zS�wk��\"?���ЌzM?@V��[�5�O�X�6��U�����[����;��j����
U�8$)m�p�T�xOxR5��~`��~�wQ2��F�����rӟ�(\07�{�\0.9��^��wQo�����޽��X���__�t2vѧ��iSy�](��z�x�zM]��ؼ�K}\0�Xt�^�.[7Rj���M1�\0lW+�{�����\"Ǔ�Q�U����G��퍙hoc^�K-e��N5�0���}.Y�)}�_7���|�m�w6���]仍�8�`%�<4��$[ӣmҽ!�c۸ߝ[����>�
���&)7����2��ٍ��\\Uӻ�><^�sl.l�n%��c�K��=�/m%|�3\\n$��;�
��FA@���拓�H,6}�}�j��D�9v��s�\\�/gޢ������wּ;酏��-9�
��� �k�1A�
�}���6[�i \\p5��5��\0��X����.š��KZ���u���w�3�s��Hժ�jj��	_p�\0*Ft��遮pte���Agk���n%ݛ\\F��U� 
(��}��:�h�.m-#���׮�GR1Q����3�N��2��TRb���M��ұ��z8xnՍ����OVw����k�k�5쀐��@�
��@�@�DB	�%\"��Zl�[��k��pֵ�.<��ol�#��1�V���L<m�K@�;�����e��-��2:݇�<�=����ǅ!a�8DR�<��{d4@S�T(4C\'�� pyU	�(��[EP�`;�
T��g���ͦ��[>��\\���MX�Z�v3��s�r��=:p�V���.uNB� ��|PS?nkuk%��M��`D���j)���`�-���i����N��n�@mA�X�4��_����v�c�>��Z��ͼ�3w�k?���hpY�����c�צ�:�_s|FM��x�,O��y?�מ�����,�X��j����֟��]��]�u׏Y�$�B�U�.<�j~����Zn��%��\0և�iO���;_D���ޥֺaG;ڽ��|�s�J[�J�EY�@L�-B�b�XW�IoOQ��&����K �6��߱������TR�6�5�W-��d��̝��\0=�k��?ʹ.�n{Wn9�^nk��E����_���_[�/��sW����N���ݩ��[�N�0~�ō��ti��[u<U�ǝ{W6��7��,Xh�eI�U�P4������߈�}K�]/4�廴�����?��W�ׯ�\0��\0��mӗ?������+Qr����w+�\\\0=B�WN�K��t�v��+]��W.ù�⁺�Qr������+�{�k]r�������ݍ�M`sעk#�o�j��� ��;����)��e%�L{��xll;F��<!���Ud�n���:�	��*�RG��M)��hk�V�X��u��x�q�M�qa|:uS1�V�*�ɶ����{��]�8�;��N���PV���{rFA���a�ܽ[�����������|�M1]�ը��sH�V̳��yD�\0�n.�Z�^Q�Ԯ|�ǧ�Ӯ_b��I�ڼ;�u�Y@���E1Kpk-T��a����S�:|{!���K�3H\'�K%5�h�o;S-&-��r�uzu��uC���GYM�r���W5B�B�}
Z�4`�\0U�-�j��F��#�\\֦�r���s�m�Z�\0Z�&�˴
bsF	$̍���!#�[���G�`\\������f�k��+/Ax�8�4�P9��VK@B\0Q A�
Ӓ)s@1��j*VZ9(���_#$��������9<i�CM���rx���iw�����	�ԓ�?I��=�5��$��v�_Fմ\'�]���s]Np�8#&�FG�o^^!`>cÒ����}z�F�$�4�W,=�GVC�O����I?	���D��LZ}�L5�p����QN�S$CK�8\"�/m0U9ڲV%��;�?pm��,��w-r��u��c��F����W�~����i�
E�֘9E9F���Xs���S!�c�۳:$�
�]�$�{�~�������;�盀]uq��
D��Έ�/w�`������\\��«ѯh��u���-]�Z��]�o��XpO���T�\\y�k���/��e!4d�d&����\\��������-p4���Յ@K�9�.�F��~G��m�e��_g���?W�������IQ��K�?���<���ɍ��\0{�;=V�9�9b���kna\\$��2(��Pr(=���-D�b�I^�9����Zm�B��u�Y��m�w�����8D�Z�@i�y���q�$p5�m^�{	Q����o��G�/c��kzwp��a�Q;\\Ls���w|�>��ַ�֍c��K����X��Ͽ���$�jg0,z���y�����������s߂����bڷhI`i\'��VJ�7���>��گָ�kP��Mu��\'�S($R��8�uN�!�`�p�C���W=�W���a�ڦ��G��]m�V;�� F��GS�\\�z�#]>�A�^���/`d����Q���x�����<
��;�c�����m+Ve���]qb���1�`��c���s�GBaE�Ș6�E)iQM�\\�2�!8�W	��4��NG��l1��j�N�u��!a=�����ﭕ����ku\\��X�h�0�Ei�`�V�:^H%|�7���m��.\\�ftPҔ#�\\ިpn<�h�����Q�B��I(XA�(�������7۽��>2_lH�!��NK9�&�R�:���ٯ���9��4�f�M�#���z��״8bӒ�j��g��
����Dr��I�SnN�-m@��k�
�lMX�h�cZ������E9�- ��(��L�����0�]5���㱠u���0V�l�>���C4�l�C(M��n��>�L�.4�%Nk�@9��+ކ\\�ڭev�[�Ʌ�ؑ�E��0���T��$�D<�&�ڠmekE8)p��j�o��C��M�J������՞��$�\\h�=p�5E���SLt�b���ؘL��IuN\0b�����&Vu�$�/]|������Ζ�ħœ��n\\�2���)-��\\���[�y8���I��vGA�i��喊3E����7�����s�:��Q�۱��;{��v�Ɨ�t��\\(�l�y��������d��F��v�/C-<�9��k��3��[\\Oo���^K�b�K����ݠ��X�k��>�w��?ě��g-5��1�O�&�^��
�z�g�w7v{�e��y�2����ͬ}ˉ�Ѭg���9�j%`~��r��\\�C�4�1��R+0lL�[c0��\'9���u-���fv�X�\\�̒��Y.��U�a��ɒL^jE�l��xDj��A��G�M�n�ۚ�F��h�:^��ͯ�Y�W��[cͼ��i�
�톷�1���l��h�^�.n��Qt�:X��xS%�i���|�k.�)*���F�@TQE�\0sQA
���o��q�5�-k��8�z~ٺ��B���8/D�/������kL9.��v<V�Y���ԝ3�=�h� q�ɦ�l���D���\'���sjsL���\"x��U*=&����bJ�t��J�i�S)�w+ݶ�����0��ںk�9x�ӫӺg�࿈2�By�/V���|�V�)Y#AÊӊ+�(�C�����IJ���\'�\\��-綕����
`�=XS&9�G\0U0A�h$�9�4�4
UR�
e(�<���l�����õ]u˟\'&}�me�\0
V�����9�D�M.{�i�E����p[U��O�3X�g�������}x�eyk�i���n^�8�f�`2Q���hJ��sq��Q�ԗco����_����.N�����[���6� Ȳ0\\?y���+��q��Ê&�1Ě��^��I��q!]Y۹�����V���b�GpQQ��G;�՛/W���}����]�3��:$#.z�m\\�������u�-�
B�ErZ���.��XP���ӳ�y $~U}�S\\��ra���㴍�==���xw�.�T�U`q8�s�����<\\ph�\\�������%�C#Χ�2�����*�j����.y\"EB��\'Q��D\\
�E�>�EH�5�8��@��L�S+�u���Ik}5��X�^���%�C�7X�v�;�+��/�ɦ*��*�����s@��9qn=�8
��V��R8�*�˪��Z[��1+n�����vH.��x�+��^�SWv|J��7$U�h��QD��P�2�����괰���P���
�+���g�7g�ǽ`����2/��.�]���si�o �g�ŎwWQ��;8�䢨+s��ⳗL
v ����=���;��[�D<��6�N�%+�oPA����p��E�uu{�/5Ij�$��b؆���c��_�|Z���q5y�K�g/��u�GCqv�x>�Z�?C�s^8��J��:9�TVͬ�-�^�|s��y~��jd�����8���.yj�.�;������+G�Fhiۤ��ธl���yI�3a޼���M;�T�h����3�B��ݤ{x�:`���L�!j�E��������6x� ���+.�\\Ǧ��Q[���`8�^�6��r�x������g
��Xc�����a����ݴ�p������s�V!�k�\\p4 �+��
@��jXU���b=�U�����S�լ�SkXu4�ڣ95�C$����;Y�B�j:o�͉ln\"�<���.�r����e���o���м=��k��M���w��qVE�`[��g
��k��77N\'�5G��]75��-�t�X�{�(�	\'Vc����G퐕���
���Ŏʇ�U����a�
T$�)�JUBV�x���5�˹�˹;��r�˚H&�n�\\--���U�A\"������ߺ�(��Ը861��+���ߋ�����\'��<�����94.7l����b7���F��EP�Q
�AJH�E-h��p@T ]HVZ\"�i�潕���Ι��\\�91���+H�@���L>~���MQ�j�Ɣ�QT{���kN<\0̕��÷XI��S,��wC���I�EP+s@�i�\0�PrD(=����3�P��(���Q@��E��hL%�5�����.����Ttm[��}ȑ�������.��1��]�;��ec�u<�v�/�YRMi�K�U`��������
�Ǩ�����Vn�;i�k/�7e�ca��,y����#�u�Mx������#\\Hܐ:��\\rZ s[�*)4j8*�tC��(��Stۮ�x�X�8�6��\0��k��wi:��%}W��5uW����7,͈���;3{��<�u�6u6�H
�ҬH2�eШ���j1��-vk^�\"�`Y۳�����5����ܖ�;9p޶�3�5=�Z�w�ia	���v���|�glOG��Os{�}�.4�E����}�띔h��߅���]v���:j�>������v�j�vT�1X縍�y���ORy$�os��}&$��ɶv�޻�k�m��MZ�5�{����=�Gn/G�C0f�i���yvz�O����
���5L��`��=�4W	����<UC�\\�jG��D*j��*�Zt�QO�OV7U����6�]������p͞��uE��]���U��i_7~+��k��W$7{{.#!�Q���M�Ζ!���2*ʌ����)�l��#Er陬;$�ZF�O��
������-/ٮ(�4b�2B��P�h�d�]- ���1�E{����BF+,.�,�F�Q]u�9�/�
H��\0�$%��4@�KN���o���b8�k�(h��QHKThTpE�@��� ��an�m[�.�p%�ʫSl9�q�wPmͶ7:�X��W_(�|7,��Փ�8���ܵ��.[o����N����%�9���c���`*e�|M�ؙ0���S	�#�kNH��X|�S�VFn����ɀ�H<�+��c�Ioz�$c�lTjqVqe��Ċ}Ǫm���!�|.��1�5�����s����ŏ_��5U��x�\07U\\\\�j�i㭦��m��f��s�wt�K�}+�n._/���WH�W�]����i��0���vr�п��[�{w7J�����
,�Zr�c��X�9�MR�|���:iz���$�kڙ��V��X���}��x��j�Y��Ǥ���[�c$���j�m�EuǞAL��Zt�\'Z���[s��^
�i�F��z�[imp�Ƹ��������W�[���k\\��>}�+�����9�,x�\"����y�Tt������挊���p�t��;P%�8`A�.oVEj4�ɄO��8-M��8\\��՚���^Ֆ��b�a%Bd��n
�lGE�p�����\'��^X�Է$�&�M���}m�[�N0{	��B���/w����^͜7�U�!tyi�C�-{j}����f���{���n-͔�H*��\'gj���S�q䪹�5���(���Y^`�8�H��`c�(2��P�]!b�xg�V_K�mZ0�XA$�n4\"�qݢ�c˟��y��K[���:�{�(	e����v.;n�p�c�Tѭ����r@�(�\"��sE�P@��/ ������ǂ�-ADu��>�@<�Jԙc}��Ӷ�i|�w�L>\'&j *�F��ún���؀ᚖ��M2�_��}1{ϐ{��Wr�i��@+�Ǳ\\5v���`pL\'�������p*W4B�\0@�����U
�b�R�P���U`���\05@h�*,\0c�)q@�H
֦0�MC��*�Z�$�����6�WNao^*�ؑѿE}s#K\0dm�#��t׉���{)��}��r}���cF�r\'{�8���~�#�2���ds����u��:�M{Ug-�K=��0�y�|�?��@���Ξi�}��K�qy5Ʈ5E9�M9�sA3�+[�K�#���Oy��p�7���������Em����7��S�(�~�v���Ʊ(��+W�3����urE �oV6�Qi�D@J��I��i�T�hZ�>2+Rh(qYٽk��r�#��m�u{��سɶ+|\\~R{;uPi����FtV(�eh�Wn�s^���4��p�p��Ǯm����j� ����<��t_�ǵ�epf<@Į\\3<���ؾ<X�Q��_B>NΈ�+���6�+ ~�iHdsH?���������_f綔8�`���F7qp���^j�Gj��W����޵=r$�t��{�G��m�}�M������wL
ఘS��6����-Fd�ۇM4��	�o2n�i\0���<{�����Ňia�2��J(*)\0��(�<^�0v�\"������@�Bk5Tu�X�y(kA�ī&X�|F�kٙiHo�p]�|�NK�v�Ƥ�a�θ ��7��$�2[���/?�wYof4?��ˍ�{���ūm#$�jV��s�\\��5�-ɮ�4?O���kT%��T9�5�!�50���TS��a\0H����Ġs\\Gr�j
)��2��(]��u{Q
sCiTS��������\'���À���qDq�.��=��tCt=X���ۊ,���O�5�.
a�*���-�
4��,]%tמ��e�\"��{��\0t�\"�,^�ܾ��߭��;�)��ǇR����_G�O�*�9���py��~��+�cѯ.�>Ri�XæQ�+�I>
ԉ�����8�g��JqT8bS��i\0f�k�P8 aq�\\GP5���j�Z *��[Q�)�k\\�4����p�S
��1���\0���$�b�a���i�]qi�a>f��k���<��g�lOi�[��?[H�Ž�ӮҾo\'��]f��9*���+��\\3!�:H��[�?�#ޮFVX_[ !��Q�D��dBk�(y��ov߈KiL�E��$@��PrTz���ZB�H� {��.+l5��מn{������0ˌd?�y�������0��ǩR���D犡C�Jk�@�\"���#	��5�D
4��)��pQGr-��@\"�_L�\\�T�0�.�4��D�9��(ԇT��N��Qp��sXdp�c�-ɗ-�®�{���4�C*�kܷ�\\v���$k<�¤�غ�}��V�\\�I�HMx��nG��F�nݿd3�(�Ӿ�bO�>�Xc�g�G�!%�%�5�MQQ�riÉ�E��K-�/!�14A����t��:��n�Zf��� #{Y�q��Ѥ�)F�����a���x�u�[�G��sֲK[KV�P5ҼTW�t��A�KV�)ި{c~�LA]�]���%�}�//5�o��w��2{�n���N4{������r�<	Nb��$���WJ�lD��s�qZd��$BТ�B�C���U@G,聮k�
�3Mq�V3jk(�����ׇ^�=���$w\0h;���1�y>��޸�����^��s�ڵ=,���Tk�L��L�������~Ǡ|U�4�g�N����=I�L��Z;]��[ضN�WS:7߶X�s�#K�7�|��y^i����_[�����˃j�[n�җQ���Ga��C�Z.��k���I,s�q�G
 BpT�\0<(G7�	�TW�$���8���g$
)�ځ���R�S����4sqǡ�wU�Fy�G�+��?:���9��9��������9�X�PQe�����^�:��Q�N��Ǉ���ұ%�s\\(���sq�ٓK���UF
,=�ˊ�Z��8
�9� J\0%H(�1�U�7�0Z�e��ãh��6�slH��W��kr����=��z��ٮ\'C�b\'�:��ܜWZвV���{���9�d�-w�北����\"��Q���沐�QV}�?jd4:�N�+����=A]}V����f��n7�w�g���Ӑ�p�/���1�ٜp��F�ڥ
�:�
�sQ�yeq����0� P\0��!5�\0^\0U(4�M2�.ZD���Q�N%.��͓f����T�]p��r[]7&�Ԭc<�����#Ϛ�-��00��,��,.��>�GC���8p���/g�R4�s�\0Q�X�׊�f��9���\\�08T֫+
(Ѵ��%���]�������☊y�\\OI��~��3~���ܽ]�@\\뾭�,�A4�$�3,e��7%��?����q�����m￾�͘�oa3�mۋ�!ڤ����뽑��7�ePx��0և8F����Wն��}�d�6�u)�ӈ^����swN�|�md0����Tx�=��l�Ӏ���v��v  �k{��xvY�?Bl:�[�l����]n��&90\'��4MnC��:X� x�kқ�V���������W_[YC�7�E��-20q�j�s�;��t$\0+������,$\"�>�#���DVu�Ϳt���Oͷ?����N��Q�s@��m+C��f�f�>�gy�LS!��ڌ�3Mqm<��I������f���i��#�\'���c��H����u>�����hKpqm*ZT��9,p��okqF�@�d�t�.;p�����;���e�u��\'6����y���ӚT�_o5��ۚ�aLUJOS�!C��$\"�\\�L��\\	@�\0��r
�7�(d0���*U��Lt�ZRa�c��d���j�qow�Mv����7=;׬��+�����k��NL�|�o�e���^Ct�Q���2�]k0�&�����{{�;�*F-Dawn�����@���\0����UB^��<
�#��-�,�����jZ��7��
�A�B���T��q�Ё�!�EAǗA�j���P�LZ�h����УDPh`�qQR4��#I%EH!�5E�3# e��
�)v�Y�u0
F�J�<�{\0��o?/��f\'�.g���-�nK�5x��{�Sf�������1����i�Zq�:�s�ʹi��h5��y��!��4`\0fug⪀�k��v6��T����K�S���NN
3U��w���eL>�f��Y��j�@�Q\"�ߵU!p\'\'��(5=g����:��ne�-�w]�w%��%�8i7ت�;	�9��!����za��8ӊ
#[$R>	#����݅����=�#FY�h�湲22��ƣ��]�:eő�Y�F�ǘ��#,#d��s���/�}�)��]>���4�D�Ә�)܈�u���f����t�N��e3A��s?ڊR9?��f�~l��4�z2N��i�Q*ߪ��������燸��HFq�sN?���%Z
\0�tf��h4����MCpB�!���U�j�)�h��k >�����i�S�e��m�?���.8v;���ra��������x�� k��C�G�)U�^ϟ��[�s�
���o�f� ��#���	�GA>�ۛy���N*�:����5�rE<^���8U�@���\\B��\0(�*H�t��*�d3nM���bI?Y]��/.Z*���m�A+������H�]!�A��.�-�Q1���X�g���ֲė��ؓڰ�+D@�TSu���v sE8w�Q��;�BTP�QH� �?�
�������\0\0U���ޠuC�Q���0�5�Q\0�P��	�m��<���w����ꁣ͐mH��^�4x�9r�h8��%�Ru.�<���?T���3�0�ϘU����ض2�biy\0�dvB�Tb����ϖG=ĒK�%؜i�4n�g�wn>\"��:cn=�4��B
�@KqL��(s��
燫�Z`�\\�MJ�C���D�`��\\�E2Nj�j\'�����T#�)*��
�v����V
�J��I�x\\YQ/���{B�V}qv�%��fa���<�4�5ξ9<���|~�U)�C7��q��nc���s|�1�8J��\\�Z���w����%_s\'kG��y�צ���n�W{\\�r��{���G�\\�\0U<��!����>w$�v���c�N$V��6��O��3��(�DV��Zd}(�ڨB�AZ*�����R���WZ��5��)U�H��S:����\'����c_j�2:\"���g}� �ўE|����ܖ�
��8�P<����W�ݛ9��\"x�L0\0Ԝ{�/�����}���\'�i�G�o[šq
%\\�vߪ�6
���q���:��H3����3�F��q�?j\"צ�[g}�H�[�?��\0t׷$+��v���a�d�2�@�\0�ݺ�ҋ��q#�}�P�w8W��#�g���fm<�$�L,�˘���_ڶ`���|~�����X�[�g�-k����r���	Us�j�%(d��@j��*\0��R8��$T�=��\0�U5�,�u�I,�����H#�o5ecme�S鎨����s��c�z4�/�����jm;��
�Ϻ��H�sn?3�aڹo,���o/J��9�-x-sMaq���j�Dq �V�D����)��׺�bZ��{�dES$x�1B����>:�J�J\\@�p�I���쮛uj�NaJ�����6�wzwJu�`A(�n��\'�^�9s�󹾵׳u̕��>�T�k�A�H���%O\\$	��UP��H�+&Sm����vTZ���re6������S��8\0�S
�p���؈�\0>��<b��5
���@���(��M�UJ�p�4����[��E�V0R�F�d�bT!�?P�Z˝�7���4$yYZ���t����r�ŵ���d �u�3�WWR���y�\0�^�d����dj� ���[}��n5�����\0�b\04NE��������g5���庉��b+�L�//�\0~��k��mD�S�&���F���%���/�1���;�]
�Q[��p��7Y��.�����*��2[��;��	#qc�F:�i�h��Ť�\0�z�%sI�y��פ����et�A�0�8����2�^Y�Y��i&p��q\"�ȌQP-iǇ?؊Gz��>4�J
�8������9����,��E4�&$\"�x�Z��Ъ��@�
b�`�j�4���1TE�#�J�t2WF��7H�VH�B
�W�g�|���G����@�;Oz�q���?��X�]�x�����Oi��^�s���w|�ܗ��R41YS��d�DL�����UB�j�89��!ͩ���r�t��d�K0Ï`[�W���ٴ�Ea������1�Ҁϊ*�w�b���pSk����a.�$���y�u��w�]q�b�H�1@���vj�9a�D\'S���P�NТ������(
�@�<R�#2Xai�b�L�嚍C�QJ\0QNѢ��a�C$$�f��%i8�I#�-F6�>��_Gd�kKߘ$��^���ު���§�\"�HZ`���P���$b\"[[{%�Rj��ѝ
������ppl��C�2\\0>(��q#AW;�j�-��N�<�Zְ1�
�7�M����b\"��39�h¥�N}��|P���F�����
�`m�%�S���Q�c�٢���琗�Pѣ�ן���{=<=4��Ej&s������;\'�q!���w�|��ۂ�0�<�,����u�r��f=���+�;<;t�m�Vذ�џ��|�cl��������8f�n��!T%UCk^�P�U����\\�GSF�>ն3��p*E�ٚ�cT��.xv�35DJ�LVk���1�YtG 4$�G=��g�:�;�-��%��q�^��M�c��
�{݃�|G�N%��N<)S�Aٱn��#{�\"���¸��D�������6PPCp\0#�9ί�#.I�mڢ�:�������qv�}�|��(�է�?w4E�VY��ћ�f�@��H�����)+&fx� O֍���K�� [v�%��w ���\"�9ӵEiz�ѻ��7gj�Ժ�:��~�ib2$8��
`+R�h��k��8pU0�E!�Թ��#�J+q��\\[�c�2q�L��\\���z>�ظkC�\0�M@�/���\0�U�{syV���iچ\0!T��\'\0j�*21UkFy)�.�(ɹ��\\MQ2an8�SU4�E#�A6�{sar\'��
���YX�L�S����v����+Ѯ�|�^+�D
�uym<4w�Q2}��L�w�m q.��,ۆ��5��o�������>Ҹ��餎\\f�`���*)$��A�*� \'�@�� ~�@4 VZ�!^�`�n\0�@��%j�i�ʔ��\\���;Y!\0iD��
*�hs�AVrk�Z�*
�\"Ru}���E�\\Lv�\0>�[�y\"�E3�N��h3�Tb(s��,��\\�����n���-թ�U
��K�Akf���N�J��ڏj$f�A�ؚ8�\0ʊ���K#@|ďg
�i����y�{3��o���8ad��B�i��7��g����x��.�K���\'��v�@����441���
�_U�K��x\0�0Hh#bI��g;ׯ㊛O���\'xp�\0-��v���T�f/���Hl�ӈ#�\\�gkҹ�c�1]t�×S�����?}���؟�+�6�����	+��V��+Xc$��j����x Y]H{�f�_�fw�i��_R�CZ�1���.v:�sH
5�E��5=���Y�r��ѽ�oN�|�����/V���6�N>˽��o�\0m.�u�(*�w��^Y�Fx/�o�����A��|���vk�>CK�w�M<����aވ��V�o�q��)skF�
4a�8\\�3�\\t��[���c�\0��(�^��l�c�L��@�MY�N<+��-[�WA��� jZu��rς���_�y���\"�$��6�b	l.�g��p�k�4h\'NG>Zγ�3m��F��[�C�h�\\��N�$IX�O��_�F�\0j4Ik_Okp��$ok���ո�b({���L�2�5�x��1s=��;*�H#�8_��e�i��\0�Nn��h@A��\'n�:�����%%���?�VX�b���L�����]M4�(� ]ZWP%	���_a(�OLnbk7��I=0Z[Wy�v\'�rFY���[+�-ɫk�t�AE����̟����]�I�؃M��ãq��؀]MIa����������k?�@�@~��Ԫ�C�[߇�2����v\\C�\0�\\4�9e� ӷ|>O�]~��o\"pt-4�x+��Ɩ��T���;�A�T%OBkhD�K�2sH!P�
J�F�*U	���\0מ(P�2�P�IHR�U�Ar�\\���
 PR\0QQ��P�gc	�iΝ
c����Q�&�Q�ֽ������E��Љ
TXp*54�\0�Y��È�8o :�b`ȟ��4NN��
�����Vd��KM<�b�w���8ݛ��y|@��6�.�a�C�zt��Ư.�<��\0Ȍcˤn������\0b�<+�����׸ tg�\\jEF#��:��E�E;t����4�]�j�<���;|������9�-���gɨ��F�7�?���U����\"a��+kk��+ƹ�6�k��..�0��Ei�$`���p£2\'ģ@:�p�\0@�(a�=-p�C�C��d�-Ӧͣ�K�n�ı�h�
��a}@$���-p ֣�8Q+%n \\����
i� {Km|�[�������Nm�
�5��x�n(��i@���T4ӊTS\0�\0\0\"�bTR���f�k�U�J�CZ�u��wg7�����[���}2�Η�)/�c*;�mn^N<5���5<��3U��X�Zs�oXt�W0��E%n,p���ɧ�z�9����2H�tR�Kۘ+��r����&���R;P7�T
�56��
��%@�/�T
1R�9��<O����<�V�;
�Z�E��%+P�q�e�}Vp�Ni�b�a&5mUӺrvq����]���.�;:eq��Ə�{�S��\'���z6�vI٫��c6[�V�=��k��;1����cL����}�_.LN��Q��=u�A��?�1]E��
�dTX���\0���`�*Ki�@wt���+�NB~r�@�4�ԉV�Y�=�w8Zt<�wN��Hrp�w�]j�j����8��qȬ�&n#�v�hm dmk�x�xyw���5�)~59.n��U{Jk����B.�b����%C�
���0T4��Z�?b/nTQI�p��d��cJ�&��(�4!�
,6�8�R2:����m�l���v}�j\\9�����9�Pnv�ƺ`W�]��ܜ~5tiJqZsD�Ӫ��42Fip�Oe����v���L����+��=|<��^mq�L�eid�4p�W�\\� P�X��;��9Ú�2h4D&���p�<��y��*)��o�E�����zd�@�4@2U	�\"4=?��{f��n`z���ˎ����+v�Gux��H
\"�-�#���$az�{}��\'y#���/w\"�Pw,;9�\0�m*P.CBi©�p��
�*��
`�� B�Z�@\\B
N Zる��ġ�Z	�@�J��@�x ��
�
*6���d\"Me!i8-2iFJ+J*4�^*V����Vzv���ί�1�A?�o]���/{���;>��qq%����5:G��8}лǆ˞�N��-	��k^դ�Y�27KCWq�w��8+�����iނ�����Ƿ_尖���j�U;��ۜ�f�!���\0c0m>�W��Ӷ:;���{�%�ޣ8iñ�}�כ�\"η��8v����Ah��g~�F\"�{\\Q#(؞�R�j��E;�C�x�h��q\"��@��.:���ԃq�0�e����}��F`()�FX��K�����ImEq�F�nZg|��Cx���Xe�S�p� �(:,i�yv��*F���#<���ى���_���]��53��1�t�9�^���㒻&�$����[��hUf\\&�v,:�q�n9Z����q���->y��ڽ�{gH�ƥj3K��õE!�Vhk�qKRM=уF)��~N��
ⷆ2���j�Z���CW�(d��)cR�-L_�M{��������g�t\03�5�m��{8魲��iao�F��b�7�x����m�n���Z~�#C��#di:��x�3J����Y�ǣ!
R�r����.{nA������A�/�r�G:_�l�ݩt\'݁Dy�&J��m>��D�H�0�SO�@�׺mi���Pj��V�5��G�VWM*�	��7QY>�{��I

�Gp�H#c��[�*j;�A��7͵� s��=Ŏ$T�╪q�q1�v�A�3š�Q�\'�3�7F(�F`a�^(��5�4�����`�9�C��4�
�PA���(�L�ADS] `���L��)��Դ�)C��.J�Ú���*��T#��g�k�
�TP+*v�n�Ob	~}���?0W	�9��k$&�(�(k�#�g�nv��$D�D�����a���G��=Eo�@�\\5�(y�F�e�8�l�
��Ҩ�*�P� ��J���CP�U\0��k%m�$Ԩ�����w#e�R<��V��×�
e�\0�ĩ�B���`
4Bu*���)٨�*�F}�r�Lj���)i�r��6�����f�D���GԺNJ����;��ٚ�3���kWp��9%y���*���Qz-�����i:\\㋜д�)�6�9�V$���C���{Gm��6g1�66�i��T�C�쯺���-|ظ��Ψ�%d�{��B\\}�I��+=��Kj�c��(�Vz�}A9i:���?io>�
���\'�+NP�\"�
p
,<d�P����N
�-�R�n|r@ֽ��5�qa��a�Ƨ�
��*m�oM-���z��������6�\0bN�ҷ��W��mb���R��f��I��@�M|ƕ�X�O=�l���<�I�/��i�d�KM8��\0�`�J\'#�i�
!2T#�k�Z�PsDG�qyX�W)&*p^�M/(�����#q�J&�c�4*`?A�ԋ
 AN?BepM ɂ��>�Bi\'�Q�����h�8]3��ǲ�{+dsi���uˏ/.#sM��D�A���W���Ę`�IsD=�(K�J�Q�`nu<�˼�{l��qz�8��{�#���W8�\\޲��4��R�B�Vh��e	p�!�f�xpT0�C�!s���
�����2�&�q��qy8p@��up*�
�C�(��⢐��ځ�Z�S���f�j�84��oS%���RV��I��x��]һ|�ڹѼ�s��+����<��[;U<�/���N��@��Wiey��i�Ŷm�S߲\'F旺��.n��*�h���Hl��
�X;�3h��6��pE:[x]�-mi�zT6��#�iߎ(6�: ���,�]�<��S\\x璨��d�Ώ,�Z�F�!����
kǀ�(�!c�E]�&��A&�q
�5��CBR�*����B�ܲ�
A9\"�`sU��8�����p�\0�T!
��i=��Z%S\'W�t��\0B)��)uc�@jƨ
��Uh���+P:FԠC (d`1
��q�%�ځ4�
�B��[BS)��
5�y���w!���k5��Eq�Z��9���Tn}:���q5��\0�\0֊
�k�=\\6���_{���6r	Z߻@?����[��xw��۝�pl̎Kw47v�@ĭ�T�a�4��7I��QG
&ֆ����q�Að#D��ܹ嵠�4��d!��>M&���m{����>W�@vdp;k6����{��������k���d��hh��i�i��Vg��tۛ�樜Ǵ��;�D wpQOk�ޣP�F��Z]�f���#�ܱ�WƧ��7^]-n�|k������5�\0��<
׏L1�s*�f���y5�Cyԁ�U[R@�Z�D��\0�籴ENd{C$ys�ֳm�hh⥤��
e��=��p
e�i��w�U��Eb�`愩Zb�kt��Xq88�.�<Y�^�Ϗۯ�,@7������T�Q*���$dSPp*���iv�p=W�G�|G%��vsG�$a��g���I�ɻ[;�R�2��i&�lkB�
����������>������x�9�IX�m�VW;I�%����5��_Q�-4ĝ>L#�&�\0Q�p>�<
�2����SF$��xl��h\\�B}�\"UOQmRY�7Q���k�ǚ���\00\"�酕_%���sK���PSN}��@Z綸9�}�bʅ��	M�Ӂ�{(�L�͵f���ak�fǁ8�RP)�z&Y8���p��tq)��+���90c�Q
PG�=�JJ���\\��x�TP�Dn��7SKv����[�H�G6�K�����ٰ�Λܝ��%,��\08���^}�ďoҶuwAқ%����	<��6���~����km�`m�\0��s����k;Iε%��G���S�	��0�/�x����X&�k�sW	�H$���	�n�Dɀ+�;I̚v(�6�� v=ʡ�Ps(����*�V��i���8B�@��PfP ���g*�-I�%�w(R(��K�jP(v
*7i%\0�F���vѽ\\m�\"F��$��XV\\9�i����nv�,x�@ �+Ӯ�|���Ցo+Nd�7
�
uMԈ��J��6�pg�:��v�.�\\�y^��m��@�����W����yc�U��*q䢇�N%\\� R�.B�0�ض	/fl�6�@<G2�뗇��
�����4L��.
���QrMUFNi4E+I��U��@1�\"UN
��!��p�$�h	������7R�C��0s�iojCWW�� L�
�TU\0�*A ��׺�\"��uT�bX^8\"SLsQ�
�f��r`R����%r`ځ��0OP�S��
^�P���~��I��}F�0�@�T�Ω���՛Yٛǭ��f���=�	��t�n+��;}m\\������
؄q�P8�����q��{3��}�
�pXآic=Jf�S��ԗ�[�1�c]�8\0�2��Qڥ�=��ص���̑E���4X��,�
���K�;�@}
[i&��
��.{sH�����O��>���\0�,�.}�h�q�	�����,�6��4d]��.w��}~���\'���Ѥ4\0,wt�7@H���a�*�h�\0�\0�ג�\\0�UVH�s*���L�\0�`�������QQ�R���
)H:�x�)	��T!�
\0W��BP&���4�����J`��3�3@�i�q*����ڀ/m�H�
�)p�9�P����L�1@���Q@��\"�e��$d�	���~�Z��ϓI�ն.��s��8��^�v���ie]5+Nx2�� �}J���:r�r�x�5����,m�]��|^Y�l�;eǧ0&?�!��j�f�7�8uS�R9�\"��,�B��������o-�ǀ�x����m��pn9�k^��0��To{�l���j���,��x����q4��5{���.8{{C]%J�M.5�KSD2V�\\Q�C� A遙T�(��0��MJ��P�ڨBM5 {MB!��
 ܢ���$	�x���TSu�\0HT�䞣�+��=W��O��arw��*.L2�pϑA��4���t�E(~dz�*UE����E�#�&��e.�#ʥ-Y
\\�0��X@�V�W&1��52�D��KH�W�.�y��	E_	�E��X�:�g�Z�?\\1���SLpW�����R�d��),�/{��IVs1�Ԟ���u�\0��0�d@�]\',p�Whm�Ln����e�qki�>+_$��^
�Ly qi�rHWD������0Z�a��h��3VZCkW shM>��R��za��L@{��`�4bqU0M@�TH#/9�i��4Y
\\�8f���᪸rU
��`��Gj�4��]�QY�7��{�&��sW;������@�:%5�q�7�A���b��ޡ�\\X�.F4\"�ˢ�w��֤��a�\0MFk�y5�{\'����ѻ����2E\0��/6��O���Y��@��-2��O�V��ݢ���0J�n��G�6���$w)~��n}-�T/�}:ٸU�$�?b����n}�X��I�[�=��>ś�Z�G򱃣:}���$�^d�,�\0Ȯ��i�>��#:������,��7>�t�Sn-�}��\"�,y�v�={Hl6����l<�ER�kSI=	d�`��F�C vgL��#<T\\��=�:+��	5�hu�T)�mj��8�s�jp��
�hy\\&H&y�<��H�%����L��|TPגN4@���@��p����\'�)�@�Fy\"`��9Ӓ �Z���D�y��R� .h9�ZЪ�3 qU�eU�Bp� F�S O �Jxj�vP�a��8sA�\\�T����
Th�Rq�\0E7W����F��E�˼\\��-���5��8v�e�����o�ۥ�t�iÊ�k�_;~;�X���8w-9�pb�4�ƎDqo[=��j���^�LF}�m�[�{�yPl7;E�i��y���y��}9<��:�.���
`�k�]�(2�_P��M�x��q�@��j�����)��;P*�㚋�D�|TQPF(�U0(���S&�U���0�Ud���{T\\�w��i���¼Tk\'���N��Y0��
���2P53�VI����?��ן����\0s�2�>��\\#��F�+4�XlQ�n�bx��XZ��6ܢ�L5�(�\\0\\!B�x�Ҵ�p(�Ғ�����k�ۨ�X
5�v��y�u��ΫXg��-FI�(Ĵ<��y��0d��9�Mx�	�^�\0y����*s������QH�Ҩdy���aj*�\'0��(� cJ���2�!�FI��2�@�18䀩�y(��)\05������8���f�V�5�L�\0�Q��T#t�\\UBт���㤠w�(<P���@Q�v���7 �J4P1ΩZf��ڈQ�
c�SV~(�9ͯb�L��\0d1�	���ᚡ�]U
ؠR4��C��_�X!�
��R�A@�w�S�sW	�R� �5C\'j�L.p5��2kC˳�T�⢔8����W
b���S+!�4`pV�=�st�
!0v�IP�@�<�	�1T\'R2@��R�BQ
$9 (��QR�(�$P-)�k\\1�E�Y�iZ��S���L4�����?d|_�s�Y��\\�\\���EFVkP�-�U�s4����*U�[D��&����V\0q@�
�\0>�DN�jsMr`��D8{J�N�:�p��\\	A���n��ިYߵ^9�����\\��ݍ5�4���U\\j�����V%3I�k��է\'�6�%��W�@�
����)�UdQ�n@c����:*�L�-bB�q<�L�����䷬��<�m\'G+�A�a]f�<����k,��S�崞�G�Y�;�w�e�&v�V��C�Ҋ@
)���(��!L55U�p��9�`0T�F�ڕ\0\\8�*d��(dc�q�C&�ugUY�\'B��j5�瀢)Ih�{Q)����P�QP��f���sB���UN(� p�0d��J�2*�`�i1�\0Т��
������c��w]�e���&�`����\\�M���=��t�c��d�H{B�Ͳ����VR��j��ځ��B�A8�a˻��{���+q�g�T�e�7�בuN��S�����<�W�b���C��l�sy,�´���J�+J�Oҽ���u�,�˸\\���j���+��{���9��%(p�uN��3@wd�H\' �@$R��T�v�=�b�p
\0�x*d���
TX<�ǁQJ(�Z��@I�0��B��J(��>�C���0��`���1
5!�s�4E&�pD%�I�
x����!9 h��֓�
�.�W,ɂc�$��)��hes�\\��8�ɀ#�2HWjd����E)i�@��: A�����j����8(�%�/�W\\H��u��G��6����=(��s<f�����V+AEt�c#�\\����,�>������1ETTE 9(�T8P��4�!�d&�A4�kdho�c��	�k�pUP�Z�h�&��a��=�\\��u��<��ikQ��Ϻc�ȡ�AE
8�a��b!
� p֥QLui�Qe���7
�5�$\0�<��J��T�kI���sE(��@� {�QQ���ÐP!siځXA��)�hI�E(
)��)WQÂ�VP�x(���8p�Ĝ�A�i�\"�D����D\\`�L@�\"�j�
H�o4Rs)�Q^�h�4D�
pD�|�\"{��$��3�c�lio������_UT��d�]�qQP��ѫ
��{��([I��y,� AB
)FX��$�(�V�UE�ͽ�mW\"H�0�W�p�
Ͱ���6�[�7�m�Ւ1�ԥh8����l���K�Y3:*�G��(��xm9��/ ����3��<�K�u�W;P\'��^��hh�\\y*\0��PF���AB�i��U
��CEjj�H�9Ӛ�dPS�,%��PHZ@�ցށ�Ġpf�sZ���1�P%S����R�I
\0�d�F�\0�֔@i�@�L��E
����K�E�P�(`���WB�mjq�\0A(�� Z����H�@�*��j!@i*)H�%�q�E�T{UL
�քe�}{p�psc�wHt��W��7>������ݍ�p2������5WIʋ5��~J*
`8*��jT�P�(5�:�^x�ҽ���o�{>��\0r�������k���T�+C�I�P\'�@QJ[�QNu\0��+��f�)I�\0�N\"�4,47��B�\"���õ@�Oy�����t�Y �S�i?�j\0I\\
($>�@���
`� �r�T��Z�z�4\0(�9�����W.J������`a\\Pɯs��Zn�\"d�Jj@��Z@� f��Sx�Z��ː@j,\0}P=���C�P$�c_F���N򷴠����V�f�H\\0E��v�(a �P	�@�k�T(�����S�	�R��\")MG>H�)BB!5�(�\0P��P�pL)mT\\��!����E&�fP�[&�q����ѭK	���ϓ�m��o�n6�F�R�{B��s7}.��ˇ9�v�f��5<,rc��r���� {kL�!�<k i�ϊ)��2�TDnq���t����i�EpV!iC���P�PpQKPxb�I�0�5(��{�sp
�&�MT�m0<P8\0�+P9ܲ@抌P!\0�\\!Ɔ�Z�$�8\"��NH
���a�
(�FH	<�*�P�V��dt �Qd+�\0�QT9(2�@h��@�G:sCh�P7�!ئC��_SC�q\"���PpL�kZ;��S�K�#I@��bF\0�k�ʐ��\\
	4\0\00e\0�d4� b���P���w��$q�40���}��5�_�����\\I<�j�G�̳Z�w�O*,�\"�{�kPՖ�)r��%Yˎ5�⺹9��⊌���I�)�h�Di�\0;�@����Dâ`���D��	Y_
b�;mA�k�A�����B9���W�{�\0�λU�ëJ�#�Q���u{E�T
(!���X+�)�!I�z��P�F:��*5)��\0bD���v��˖m�5�
!h�P��i�/���M\\C����F��\0�{��@�]�\\�J�S�T
�E0WU)ª����e�n����ϡZ���B��>N9�z�˺���̒\'R�pG0�:����[�X��L�d:2<��(>l���/��
WP�҅@ꚠBB�j\0D�.�)�sFXׂ��\0I��h��~\"�D:YK�[�})Sq����\0��.!��� 5�9�F�F(�+Ĩ�.��j��c�gɂ�|���\0s@P�j9�L8���s@
�E�o<R�j\0��PF��f�4��*5��Wh4�QAE=��>*eM&�P�upȥI�E&-B�**���k�!TE����xµHSoLq�˒�0�Fj.
�hU
U�I5 �����,�TEL�Y�E0�)�=��ɴt18~_�9�pEFA��P0�{�M+�� ���p�**y+Q�6��A,G��Tw�ҵd��l������}��>����m���Ւ�=��5Sup���d)g�
d�q �@q�P�-QI�V��Jf1D+�)�
��U
�P8�ة�L��`ɬ��	V@�p!M�Bv�$�R�%�!vX!�q5E7P�(+�
��|T4�DR\\(M)�\\��RsD4\0k^*�\'�ھ��y��J�xu������y�*]�k]&��%�w5���9!��V��5����0���8&&ԁ�UPG.����X��+]Z�e�3t���f�D���(�%��DL&�@X�)ƙL p� ���
�#$�%Y�U��*�q�%P�(SNT�3�(���Q�E2�Gj5!c���V�ځ\\B�-õEɀg_

(�
	-Ai��[=�d��ѭ^ћ{B��>N)�z�Ѽ����H��)W\0j�C�ze�|ݵ��V��%T|�9��9�4
��n*�49�=������P�B�@�
AP|����	�
\"��@�z�Ha�r@��Jf�+�\0�H$Pe�)ڛL
ԠPTh�D�\0�=�U��T�WT�CPpC1�E<8�@�
)���P5�(Q	BEN���C�{ޛ	�Nu���x�����u��v#�*Wӯ���W+5��>Ֆ�;<��Xb�H��o��Qi@Ց�]ք�ҜZ�=�����͓
���wz������@�P��\\B	bpg����
x\"�3A�h�Tw�i���M�f���x>��ϱ�g�n��%���r)��E����}��Px�w#�ꁂ�L�v|%�T�
 	\'��5y�\"`��\\p����Pd�h�UC��h�\\֞*Ra��-Pm|h�̒��BR�M*�$�k����\\�c�\0�M�5
\0�IS��T7��D:�݅S�y���NH�7(�<R��p��x*�7ݩ@�q�hi8�u\0�O)���Z4��|Ě\"�\0�MC�Y�g��LK�H
�v PP�]^d��NhB��E�Q�]�@�P%8r��M.���9�����uT\"�\\Ӏ@j����@�U��
P(�F�@�*~�k�4D���C�A@ָF(���;P�r@��*ê`QJ^8TE�U	��T���@�+�!TR��0�4\\�
���iP���2C&����B(��y@E+\\Zq����

�%mI����Ê���_/CĹW�L.C�O�({PP�C.=�s��\'�ƞ{�����q��Փ�q��b�Wώ	U��C�QP�F��E\0<TP�˻nw�J�D;�Zѝ���=��]J�@�#DȠ((
�%�҇
R����=��e����*��͵sxrDm���otU|�k����mq�,vd๻�)��\0�4SH�H`P��2`�(��4
S4�Ɏq#5p�7����s��O��H[��o��(@ي �Eئ�p�QHI*�1��T�4P*	�E5§�P�c�j�29�8C+��$C�kM*4@��9���d�H5(�x eji��7>�R�ƴ���Px�uN|&��S�.��5<k�P�֍$��@��P>�Ң��4c�4���Y�0��|�.�I�B����R��p�-2k^4@�jP#i�(B����I\'�P��w�P�6�Nj.A�j�B�P��Bp
	HE#
5�Ԛ\"�5S��Zj�<�I���4
�������T؊P)��$�QE���8\"�es��2`�7\"��p���5j�j�\0bQY5�#�8f��zd0(�p�`����B�m�QNq�8qUQ�(
��QH�j�#�
�9\"Q�)�p�@����|�P��ɤ��)�$���چO�H��F�����;P#�@��\"q9*���$ɁB%2`���Z��J
��WIs�`��K�_O��i�m�Z���W%t�28�r�i��,��*�@SE�����Tv�Z�~��Y�=��Q�)�T��!�->�C�A(d�ƒEQ�ƃZ�8x*!yJ��B�¤�惦4U[k+\0�,�+h��4a@�V�6�C�1���u8R�,�k��E
�$:��F��6��`8\0p�T5���W�b	�)iAW�4�
Ĥ�g�ڑ���S���\\J׵��4�A�Рp�R\0���p5Ɗ�=�sP,l�J.\0uE\0�\0c�\0N>
*��ֈH\0��#!�Ռ��*\0I�@�| s@Q� M.�$0iW� �*F�\'�)�
(\"��]�P��Mt恡ڎ��XUL.M�NgɄ�!�Ĩ�C��p�P��8�T��I��@s�8f�G��P��(�hrA&�1�(�pU2A%NI�:��(#O!E
)+�@�.
jr@��P:���(sI��\0�T�Oֹ��TS��a���*)38 ����v��������#k�U�]���bk\'��BN�3P8k��S#P\'<8���@�%{��p�kI5�P����z��\"��$RGP�/��E)p<TP��@��9���
��\0	�P;�{�F�ށC#q\0��XVcr�Ξk��5��0��������m���I�x,��Bh���DP*�Oe��V4UJ���@U�V���J46�������QJ3�Eh�ݪ)�(H�E���=p�
c�84�4��LN(�y{��U^��0�Zp�*�X(Ò�5W����%0��V�cĢd����P�ܲC$2��WF����L\'ҁ�Ƿ�����R
.Mk�8��O��C�UJ	m*iD
c�����}���O��&��s�������3���v-��Z!�\0
�ē�9!��*1ς,��\'�h��(
!5墙\\2@��P��E
E#\\�d湧
�R� ��ţ���0}#o��N�\0\0�@@���(�
ck�r�Ȁ����Vi�	�-y#�D(a�8R8S�L����QK��P0<Q	����U2qsk�\"d���E<9�3�arn�A5�!c��(~��D^�8����o6<T���TS��8T(*K��w�ɓC�����+�
Ԡ���k)q̠a8���h2@�� e������L�IZ�E4��J%�ց�H�D��T�k��k����T��Z\"����2�.��QK��b43��V����V��
�+Q�@�MiU�� y�P(8QE\0�<
(.��Рc�
5K��4��n���4�j�Z�Ό��ֆ�⼚��᷹L��)�\0)�=�
��)�W����m�x��:�\0
y՜Z�$�+@<���F��ǯ�l6�TD�O*M\'�΍��F��\0S+�
Z�\0{�5qk���HG9�N(dp�V�\0(�hŵ�����u��H	�H��S��B�I�(��^�P�����.�ܱq@ǻVc���H�4�Ijġ��K+��59v\"�H�c��*j���x�Uh ≀�y�CN�y Pt�C��\"��xqD`|�e0Ϊ�47)�C�G�\\�%��N5�!���U�.�B�\\	�\\�☶��{�\\#<��Qp]5�*���@kpn�b�V\0F!Vi�E1@�H5�)��x {���Tn�q@�z�1�?R �]��B�.i�.�
�	F������x��F�l\0�u!n�~�S�Ԏn�>�j���\'7�jt:�E�֞�@N��8�s�H��Կ��fn<z��ne��ozt1Lu��Z��Ҫb�[�#�`T踨�s/%�\08\'D�cŝ��L��4�nZ��S�:&6?�k���&b���*\')�YLv�v��t�*1<j(�t��|C�+�q��m3��q備�x�t���q�v=�[���T��QS0��r|��ܻ�3����l�nDɋ�A��?�}���s�K����<o��I_�L����m�\\Iަa�}��\'\0>%��a�}�v��L�7�Ӷ8._�f7�~���
f;{���>0ӹ3m�k����%��+���ܑ�W�u~9ƹ�0����m�gx�೘ܗ��mw.����
�%�or~�q�v���O�O�%���1|o�~�#�_r�bf7ܑ�G���9
�g�4��[�ѥ��Gx�W����c��$���ʳ�7�>��a��~[�ƅ[�Rqc�!���@� �u)�ׇ�f�d���O/���(�mu`�;���>?�N�j���⧒�!�����u��yq�������������g�.��
����#�I�%���p&��ͭHE�T=��Gj�clnu	��)�Ԝ�`ɿ�<W�ݶ�HɌ�����Z�b���,��ypZ��#��Q�%��RiƊaHZ���p�)�$d�7�y���M�o����W)��zk��r�tF�yi��x+�öj�[�H�kv�d���<H/?��/g����\\)Ƽׅ��=@s��ka�	���MSؤ=�\"�����DɚϵT����d���	<�R^@(�Q�W,J ��9���e���57\"@=꠩y��jδQMy
`��w��AL��P�Њ�A����L
��j�i�������5)L���G��f��:ּUC\0h�vH����J��i�%P��p�@�L3U*\'��� P�RV��bF�@��y��H��\\(�u
Px�
���s���B�B���@֒�8�5
�]J`�Vӗz����!E]����ĜJ�;�hQa0��L)楸d��Pq
4~�P#�h;P(��QH)EQ�
\"�Q_2!��`h�#I@�1@��44��@�Uj<P8S>(S^h�pE(uM�:F  @+J{C�#PMMN��n��a�W6�K�(�F��&��Ѐ1�Pj���j�`��
��P>�T `�y�5��@�É���C
]�Pn^-`
༘}L�iJ
�\0֓�ԣPzq��	��C&4mO2S���*�[%y�\'g��@�*��)�˂����}ЁI���xs@��\"d�\\pQP��j{� �F�-`�cs
��T8QTs��bS��O��g\'2BrñJ���i��Ы�J\0<��U2]T�(d�kRC\\:�U�x.#H�f�(Ȏi�&��U�Ɣ���\\��\"J�\0�E#�M�NtCh���G�h�{hǆ�j�@�Z8x����)��h�b����-���h�ܣP9�&��Ci�ԥP�p\'\0(UC(A�0���d�ѵ¥C�;�!5�@�g�*�Mjr�(�_��s�#/�TFrʈS��\0k�&H�4�^��T�
�2V\\FM
�%L8
4	�TMB!%s�+L��I���P����.�Y_ �Bἒ�z�����Υ�U�LGԢ���`�(QAӝq@��q�JM S���59!A54���f�Ei܁5a��p�����Ex�d�A�8w(HP0(�q8�x!�� X�5T�B�f�.ؖ�W�|�9����x��_+&�F��S�f��s>�LE(�j����5�ֱ
���y�9s1���sk��^�m�
�W�{���ԝk�-�I�c.)WWڽ��#����2��� ��E
�Z���m�s������>���%�}^9� /ƍE7P�Q
�5<�pBʄ(`��LL=�epQ�&���r�	\0J����9��PԢ��
K�\0�!M/s��ɯ$����g��5���fƥ9�\0H.)�Ȧ��ܑ9�4qV��ܣY0���>
�#�F$LPmZ���Q��)5�p�eF��A$�@\\_���+��������$pN*� c�Y4eZ�*�c��p@z���&HK9\"����NX
�d���H��Z�2�J��L�\'T@̏H{\\4��TT`�Q��J�+�rW
)S����=�[��=Ӛ�M^l0@�㗰��É<0�k�����U��0@֑�%����)�$���c��%��L�#ƙ�\0b��<V��r�E7�s�\"iJb��V
�@2���i��]\'���%Y������g��B	��RՑ�@�N-��V��I�\'*��j�sB̚�X�dp[���pk����\0���S�����(�p&�B�EjFP�`E��4�)��u�D@�\0]^��u��T
��
ɟ,��e�!eC@\'�ͫ�3��سvjC5�x�U9��j\\v�g�*�V\\J���?N���,�jW�����#Ǚ^?��>�П���uc��=�kmiJ��4T�<
�*(@Q�6��!�N(�0(#p�v<�
+�)H{I�)�a@΃>5P6��Bj���S�2h~���C <q�\0^9����n\'�a2~�q��ar��K�SX���
�C�T��U)���k�VL#�ZyTQ�V�w	�Pt˸O4B)(Zܨ�U�q=��(*j�Z�8��.5��B\0⁅�#�\\���Lr@������ppwb��ֈ�+^�S�g�Yp�p�tp�+�(c� -��@�=ʡpq�5!kA�8�a(�\'̢�㦜U�r�E(x0d��)�+H���ZpL,�����0N����F\\��j}*�R��ޡ��A�F	�)/u5��8 i&�b�v�h�4R��j�Z \"�B!�!Nj,H�\0�F�>)I
F\"�T
+�j�k��P� =J��4�� `B�����m8�@�yq`P4�҂�ۖ9v\"�iehN
\0�y�8���S&�)�D��eӬ�/4�6/�ZP7�:\"�G0��9�L�d4�ڮ\'��4\0;�C���ۥw:7ڻ�i��_�f?,��R��e|��}�Z+��ep��B|�Or�٩���+=Z�E0�jFi�ӡڲ�Q���Zh�5��{Q=˦����eZ�{�.k|]����L��rD�dt���&JgO���#�r�5��b�o�m3���?�{�Z~��͝��^�\\XL��I�qW�V|lr�_.�2?:�ݽ��_ud�\\Jj�J�r�0h��0d�b�2�����e�����MTR�� �3��X�48s���X�����1�}���/�}_�1��R�4��\0��f\0G��b!��Q�3�5�-\\@�I<��d��N8��Ɏku\"S�a´�.M/s\\CN
�c�9�0d�5�vg �K����\"�jǱ0d�v�R*��6���
�b�\\*8QR��8p��D�,��0�0	8(R��|n
Pw��(O�@�R��6��j����hi\\
\0�R��js���L�Oam<ƃ��s��Q�;��9�䄊R�n(�HҊQP\0PG)�8i�J��;yz%s@��hױ�b!�S�$Ƀ�F�֠V��#�\\�ꂅ1�T4�C�2��
O�kKq��?sP5��T��<A(d��S�bS��	\0��\\��|���F�e2x��5��ʩ��ǾH���@�`;�����߽$e%##�^����#Xx���=���,1eB��C��WA��S�v@��Px�FkM���Iei���9����Z�\0�۝��E$Fa+N���8.?_��g=�����|q��:�WD���!\'��4^�p�Re�%�L����Ȭ]}��{�^�s�x��c])~=���i�y���	�F[ʉ��nq��LS���@�x&Cf�za�ʖ��\0�>
	����ۃ](��`v���L���j��HR0�+�?S�@CO%0զ�M!��ځ�I��C\\�N�S�EȐ�؅2�,���p���\0p��uMq*�J	���*�j)@1<SJ�@Ӈ��J���!��8�&
aJ*0̠�[B�C�\\&A��^*(���	����P1��bP�A)I��L�P� <��hZ�P �0s+�j���kÀHRѤ�e0G����y��j���(�#�Ò���4��0cjI�D-G{T\\����W	���p@�CJ�k��c�,�Ů�*7UT(�dk�@�6�:�T2���P9�@�sCkL�UC�p�#,%�C��)����A�y��Q2��S\0�Q���U�A��H�%��iDRj��A�T+r�T\\��\0�Ɂ�&�>J�B�8�
����v��ڊe
�
g�T8{R��2@�ZIi.��\"�z���������Zt����X�Jh?b�W�9�pQP�E1E����W���z���F��UĭF*�\0�ec/�.4`8�)���2�����-I�v��|���q��<7H�����1�m�SNP�A]f�=���q��2�K�(
�CJ�)�V�{|P��4�(�L�\"`�H�
�q�� \0#�\0����N�`���0]Nӫ4
U�J�k��
e\\UBh،LZ+���9��B�����\\�α�w	����/ϱ����<�oz��wl�G���u�զ��:��9�QK���҄UT%K�Oj1�k�TC�P\\
.Uඅ�B����l0
)\\�P�NGڢÚ�bP\0�
����Ci�.(�R�
�P�(��@��b9�P�<���!:(�($ieI\'�����
)�(@�U��p�����z;�ytD4i`>�ccg�`t�>��{��M���B~��+��������)�/�K2���(���;}Fe^+��d�m�Ԉ���l@`�q�S�\0#% ~�H�3C	_ dMk}�1\'�DGRp�h�j\0BJ�2�(�� ����hu�o��[U���_����^˲A��r�>�z��ϊ�\\E9��0i��
�0R�P�����*�p@��L�SP44��*,%�EJN�	��ׇ52��J\0q�L��S)�R����C��1C	\0�ƀ���h2T��#�0�4��P�#H�|P�aL3U\0{�t�H�2{\\OFe\'մ�xpQ���0SO׬T��\\�H$
��Ms<�N
!�J�R�isG�SǞ*�*��E\"�����*��L<j�c��PÒM�:�K��y���v�8pw�����=t�Y:*�k�s�|���x�\0��Xu8���*TSC�]J*�
�@��J���F��
pg�к8`fqP<h1(��)GQ��>����v�0��AT�QIJTA�ƙ�u���t��J��bp���Ӆj�s�*rE)hsu`;P e��A�ԁiCRsD h��x�.�\0<Ҿ8�bQH�3��u���E�5��T(��ar�w��C^i��g4
3A&cR��r�Bh�P0�E)�(a ���QI�Ei\\�����S$��rÚ\07��J��C�Պ!Ms���h�����\"�)�,�|B�8�W($
�qQJ4���B8�^|�R8�T���9 *����
$�QQԴ�\"��}�_7�O�?Fm�ػ<ȝN(\"uSVT UC�-�s�T��y����Z3��b�`��ۆ�(�b�1#�v�b8msz!���M��sKZ��I&\'i<��u�(�q��7C�S&��v�Zc�Y�٩}�/_���r*y{�0�:�L�a��+�b�a�y#Il�<G���Ȟ6z�imM{�2a���`ɯ�N	�&5��TWe�=ཽ�L%�ŝ�\"����Wp�|�]���}n?&{�-`�+��!h$�1��T^�*�/�*���(ǨU��W8cZ�S\0e\\�����jQ!��0�;�)�L��Jep�sςǗ�
�MDP��i_
�

(���`��� �C\\��SQ,#�+A�5P
R����^^
�Mn�+�x*��my��	
B�Oj<4�sPD�k#:�&dd��E��8\\�:��!�Dn\"�Bd�AI��
c9Q\0Â�)��\"چE\0KF<U^+������s*-kJ�	Lp*\0E(x\"�c\\	�jsJB���E>(�4U4�S�JB��,�NՂ(-@U�P�\0ߺGamhEJ
~�a-�ǆ���[�|���6���*�����-C�*��(G
��]�\'��G�v?3�y�����谖���^5�t˟��Wnv���J�MxS
/�­�2�I�����O%�=����!\0������k\"�]�#��!��j��s^����Zc��\0E�#W��H_W�+���&���YH3�5R1�(
��E� g؂1ZЕY�Kt�7�:�|�v�FT�1U\0f5���`<B�a �S�VHk������N8�KVB��DhC%h `T�
	�4�J)u�eT��k 1P�vg.Hd�A��Gz)���NC%�Xh��U�L&:bqU�PW%�aڪR�h�J
V��N��P��UB�:�4E���D��`�3�c�ǚ�W9����sU)0ዐ!Î*�ijZ*Ө��5�U�YMs�-)\0��%P�ҹQ\0`
F�8�JO1�T.����j)�v�q�!]Z�*�7a���!�!T1�j\0dRPi*�*�q5�GjĄ@��⺼�T�*Fh�渜F
)C0$���\0�+Ên8S�L>�\0\"�PBҕF�K�@���	���
�L�	*i�S^
f���\\y�4�F�0���a��+9\\$�HKtb\0�%YRĆ�JS$1\0pL+\"��k���F�p�4W��%ϒ�Gne������6�������c��\0��T�SMy ��&�1�X$a\'ª�+}c7��Ҧ��v�{�sn�4�%��?I	x����2�����
�ͯ��yۚ��)���V�]}���<���T�jm=�3w����?
��6��eosi#t�$N�x+WYc��P�m�S�|�^�絲W�X��\\E��<����Ԋ���q�֠`rP7ϕ2T $��KN\"�R�MFH���v\0cN�0J�;��k��E?F�p
d��K{;��\\�X})���S(���A�Ps@��b~�S&���P�4�d����	a��^��EH�9� P�T�e1�pxi��+���9����jx2c��)�%�{�({�M8�G�S�@8�N���U�d2P�q�
`��P֧�4���������L
ړT�4�*5�{� s(Be0a?A�i�r��QC� \'� #�U�dP)p
�@9��T\\�Zb�O �^�S<�6�\'B����:��@�FM8�*+̔E0�%��y�ש�H��b���u�����0���p{;C<������y�4<��6��PH�����E�7�[R*G �K	�\0�?KOaQp���PW
�CZ���9´B�S����S�GPPLƸ�jZ\0����e���U��>�
������� \0���0Zi�A���C㘃G`�Y��w�PB�Rq�\\��K���+��������\0VBA�^�����T,�
�75Qk�Z6Y��
�
yS���G�<-=�\'�<a��Б�T�\\�L�y�f.��{o
�p<8��J\\<f��\0���S�arP��9�S)��4\0qH���M0�$8e�&Mn�j�R�?MFx� y
x�d�
}(ǆ��4��j��hi��(d6J�4�E&8�BUJ���
�Q��E|P�I���@>lB!q.�F
\0�˦�A�����`�S��`9ڈ�y*R���{�b]TL��]�˂��s�«��<W�p��A��nd *H$;�X#rӒ&+����t�Dm�1YR��<U\0.��
)C���?Q���F�Z sY���ɸ\"���ҼF�j9#�7��D�M�@�\0(8��E�Z��
Sh�[܊h$��^%@i �ױ�1�kCO*,Î�TT���*F���#Ĩd���j\\H.�rI���4���䧓SC����}+-�I��v\"�I<4=ڈcp<Q	+`��v.<�dqI(��ଌZB�CPڐ���%� ;h�K�K�B����p@汣\0kT���ZFaE�c��9��	v�X�8�!䶀���R��t�`�M�cڢ�2qU0zF�
b�e�(1�8���!/L�\0\'�&.�Eɐ��Xh��?��o�DG#ݹ���$.1����%3/�s9�\\n�s����ߙ�^F��L~Z���N��,��	�0�%׀u0\0ĵ:��
+�:V�����ޙ,�V�3M	�K3o�^?�?�an����lp�����3�.��Z�J�ٌ_rդj�s�	���Y�N��-���{�R�ɠd�L~C���0��ӱ�3��-�L���Z��
�[4��?i���:�,���-�K5��q��!�w��\0�Z��st��go<8	&{\\i
x���s�?w�9��jP�0(���2`�OO�T����\\S��Q�0��H)�A�`��\"�\"��Ny���Y�$сyTL��\0
�x�����Ej�&�MZi�T!
�8�؊5��*ji�\"I\"��R���v��#4	���\0p�փ<9 �墔ˊ��4���ǒ�7\'�*�]P�0�O�Y��S�.x�(��^3�c����S]3��rL%���c��19&ˣ�k�&COw����V�b��R3*�JU�Q�ؚ��\0�S�!��2E\'��ȯ\"��\\MA*�A~�(L���)���Z��V�8��iB�l5�4N���p8����������J�Z�y?}�\'�G�{�
�i�H��&�f���ܡwß͂68�e� 9��Le����Fz^���]/3;���nh�>S���\\Zg��:G�-w}N��+��W��L�.a��\'{��G�9Tg�I?�������Gf�P��XKˏ�(����c��4�������E5b���X�]�ڳ:����>מ>u�z�r_E��q�9�$����e��.��5FZ��w������xW�Dɯ����U�\0�L�����p
eppp8�f�C�׿&惢�ٌ{]3� ��0d�w�M�-v�\0�+#���B�2��G�os��c�W���s[�ֶ�Ii|R?r�{�K��G;�@�7��ؙ�\"wn���w��o	�偮�Q����&���ݭ����t>P��d����5lz��fgN�w7\"Y�׈\"����҃T��OvP�[#����2��Ai��^Iԙ�I=���t����Kc��k�Aݨ�3}SЧ}�eb���}�\"9%2��\'i:kؙ���w��谱��<j�ܴѤ㥁��L�B���p��_�&2A�-��\"=���^�\\���N�>}mps��p<r�Y��|}����ݯ�e��\'�5�7V��׵I���(wH0�odҺ�_^�\0�k[J������GJg����a-�b�p��f��Mo=q��� j�۴��]�[}I��xݠ
d�R+j0#�,FuN!Viᦜ9IN�\0w)����
�D�E\\i\\�C��\"�T5���p<�L�B���5C�nD�!)\\�XWP�b�Xap�!��ȕP��̅�k�*1`���hU)��(dfq4��4�*�����8�:LI5\'�R�G�P\0�3Z�k����M��9��(�[@k�Z��0�5�^+��Lv+Ej�k���Ƙ\0��#pE:�u@�Ւ)�h��QA-�H���\0��A�Ŧ� \0�\0�C�T��i�>(�)5�O,���5\"����է�bP��P\\�C����7�p8&�Om8���u�é\\Y��T�E(N|�S�[�� ��<SĤf̹䲒0\\������\0!ƣ�VJ0�(���Fx�)�\0Pa��_�E8H�)�.H�djy��Q�⨐��\0\\!�����NMn*ɖ-�����~�ۓ��\\��߅r�������t�k�}ؙA�r�F/4�W��Roh�	��}>��5r��Y���\\^4��P�qY�?Dv[����6�K�Ժx�S�J�>��=Z��_Y�sn�
IV���2v��%���I�G4���\0)rK+�Mߪ�	ܢ�{!��KcH�5��qS�S��D�X���M}8�9��*�I�Ll]��.��uz_f�
�uɮ�L3A�Z�zV����υ�ӛ�2S�f�-�������V�6MF��O�J�]�3S�=4�dš����9jK-�{�nش	�&�O`9��J��p7�\"���c
�	���B;�0�}�[r�d,��j§��T7:�)��haOj�L4�d�N�I�J,���*���S!�ԝ_aR�8\'wh�#*V�(XYG��@�5��^*)[�b�B\0jpǒ
�ƨ��;!��\\貔���6�
a�L�����ђ�^�s�a��Hű��APh{R��cZ�̠qi�J��$.
�f�o���1ܿԉ��n`hw��&7mّzPY26�PW�%:��U��Y��X�\\dlN���SSH��)r���K��SH߈��3�E��4�\0u\\������Ys,���9�h
F����c�Il����@��l�R��~�;�0Դ�ڮ�v�s2��S��˽17،گ&i��VE�+�u�ERB�W�7��#l��(�L�ߖ��JasQK�J�r�p�h��v��f��n����|L0�1��)�
続��˷��|��e�f�ir���v������Da�F�34�B�x�w�������c��2�<,nYR9��\"�D�x�rX4���]&�J�����E%H�D�4\"�d�:Q�I�جf�{­���p�L�0q4�8*��� �^H��5�8�\0I\0�Y
S<�2c���Ĵ���3B�CN<J&
�VJ�\\**;P�PI(�P�\"�EF���f�\055B5���#�T�@]h�W�B�gÀQI������j�JP@�\'$P�\'.���P(m*(�< �ِ\\�K]?z�dz��Zq�Nk�9࢜8b�wo(��N5ȩ��V7�ýL�P�0�sEI�ˀ�E$��#�:sP��������ԃ���ty�\\�\"��47�s��H����x)��8�c(�IE*�P-Hͨ��iqƼUg(�
�D�V�)��flohio�}슑j-\0SS��扄���:�jT�H�l�#Miڳ�����`8&��f8�\'<Ց�Qk�
�U:���/�͒>w5���I��A����+��ܣ�g`��R?�!��i[�u�ni����6�1�J.��\\�m(�A���nqW+�/�f��>A�m�:,��Q�#��[�_g�s�]{a����2G\\K��������{�Od%��SAeAkA8�b]VoW=\\7Iﭣڙ���B��S�q�NZEx��b3�������E�]ǋ#-\0��
\'T��O�KԶ��{ �˧C(xSˊ�),�O][o\0�Kq
p�T��K|�A��q!���!�\'��1O\'E�aon��+㷍���my\0��o�+n��6�=����#.#��5S���}[��g��I��̑�Q�jZӻ;^�9+L�Y��,��m�ѰmE1/\'�����{�{��U�~�X�xi<�b�F땣Tr*)�S���r䀫Nm��P,r�ĲҦ��<sS&
Ӎ)��LT�Tiv����9�nQ=����kj�6�ό=�=�ұ�l5��fݲoV�]1�2���k�\'���V<g���������𛉜�,��֕��Ť���Lfս��s�.ޡ��@ؿ��@��[�)�7���8�
8@�&�[])�����l߈k���&a}{\0$�1?o�����gs#�?�xc��u
�$���l�s�d�C�5-��5�� �!��s���䈦�:���ˉHx5�x&ʚ���ݢ+k�O�`�ퟫާ�-��v�����}�D2��o�R\0u(8�:{�[���t����CksTt��\\�C��K&S\\�3�X]�#m��$�����
����@H� �*sE� �c�PmMA��#8���U\0��i*!A�U�8�.�\\2A���|���)��|ʩ
	�ˊk�N�+�ǒ�\\�������,�s�E)�\\!\0�QK\\jEy\"�]@s��ͦ��D!\'\0�h@͹qE,e��S̎q�x�ہ�.j7��y�����s�0e��h�Q2s\'��&%t��`�pG��0�F>g9�k�`��S��
*�7�Յ)،�����(j���iLς!��\\��Ԝ�Qrs�ZK_��sP��À��PV�~��\'�K]�R�J�AQ�jF>�&WB>R�Кv���y����,���t��5�;�Iޛ��ٮm��_����a���#���Vn�s�ߣ�4h4t��$���t�_g
*\'(sQQ_�E�9q�@�y
Qi`dt�[f0i�eq�:5�Im���m��|���P�9�:$���i���,�v�b���#����Ō��9��LR��o|Ĳr�V
��y<���b��sp�������C蹮h\0����]Es\"Yjn���]�w�7K(e��11�5�����
t�͙T�k�5�i���M#���w��t\\WL{^�r�zWF�2>n_�z\'Sd�ٴ������S�:Hv��\0qtf}*L>���:��]�m#���F[7�<�w�L�*��r�������$R���na�MN@Ӛ����l�Rn1Mc�>�+��hh K�%�*+��~��s�u,;�Ý2��d�|�m�^�9��������<W;���WC��A�e�piÎ ��$�<{�&��!2��\0ZH�A犅0�G����8���1� \0h��D��c�@PJ�$�S�a�ԧ.(�p�В@�@��у��U0�P	�\\N ҙ @H
�j��1�S�jPsD�����f�2\00*�(4��Q\\�w.+��&�JP}���q�*��5�ڠP0���A!\0y�v�B�\0j	8��\"�g�0D8���
(mx��h��T��D��;h��15<�=�k�d潠������R�N�����i��*ari���a-\0�I4U2a������������-(�	���_P��)*��|s�\'U��FNd�H�8��Q8�ƨ�Ĝ�C\'T
�C$i5f�/Υ])�Z5\0bU�������n��Yh�b�W��V�=��,�6K�S�
\'F��%;A�6[��ْ�y���[{�b{�_c ��>n㶵��YIHG��3H��H&g�]Gr��nO�n$&N�f�k �me}5h��ye�t:�v��F>;p����8�u���	й�\0�홃��u��W5yf�v�ї^)�,.�i�+�ꜗ��GUtr�W�ʍ�q������(���@���R4Z�3�cP43S˫��ځ�=�$��B�-�nZ�st,⑥��k�CL�[�JmMfj�o�����nۺV��D�O;p
�*\\�J�ʼUIJ�-k�8�(#!��I���g�+�\0�#��������3\'DR�c�T2VSZr��r��A^�(�8�Mt�(��E%8��䢆<��eT<<-��9��(ڜ\0� hŤV�SikZ�*�  @�q��`�%��ii�)��⢂��iT	��*���˒ �]�p�(�j)i�BA���f���
rE�ZEh�C�{
a��߱��\0����\"J����W	��X�[��s
f{�袃h��^H��x�߅#KG\'j����t��w];���&l\"3%d ��aL�ķ�Lu������3�}>�4L�f�\'�>����{��淣c=�ՊK���l����bh�f������3���8k-d��J��\\в��q�[	��?�\0再$]��P�h
f��8
S5P���8y�\'#A�E<6�9�5�$�(�U����B���T2$�c�8��� �0��*���TU��j
6�����G\'N�CU��}(?1�ۂf{5��г`��n�5���mgaՙIag�z;���,��3޷�g��#����t��c����hɦ{\\���4T��ؓ������ۋ��������Ig�u���� ��#�t�+6���F��1}�]#�A���x�����|��@+;���
��.��[�X�����R��E[ �0��):t��ˆ\'�13֒9n$y?�{������U��.�p��1����/��Ĵ��{��
��?�2m�ٍh����+#�LA������&z�,��w��#`�Y��wk�I��NٽXY�6�0�6����h��]�S)����7�8m�w]r��ӯޥ?|oK�$��H�6��:VG�6�ݍ��������;U��c텔m5|�U�we
d��;��*�m�0k�㪃\"G5|�	�;���0\0�{��C?u��IV�>\'l�ZX=\0�� �U�w��d�Kk�Gis�612h\\�r��ŵ	i��[y7���6�K�y��������%[pαQ�z2�%���� h4����e2�\'~�g3�˫h�
\0�U��3��hKu�s@��3�UJ���y-����(O2�P&�iMXP�Z�h\0̢������\0�&�@�9�G��$b��dT�qf��$p�DSA¼\\��w�T�<����ܾ�R`kL
�7N%P
ӂ!5yq*)��UL�7P�L�-+��R1ǒ�
mG*h���Q�����\0;�8q��k���Yk&9�f��FD����K�cl�smm	��3�f����ܞ�wH اdlt[�܌�[#��Q���x�-c�m��E����d��:����=��q�L���nX�G�m�`.�#c���X�Cʡ\\Fz�m��B�=�V�,�I��\0I�m��b{[�wm>���UKZ�M��\'<^�?H����=�lL�dV�]����:i����$\\�vm�{;����g7��ݬi��=�df��y�{� 2��9���ׇ��\0��Hv[��d��,�[,����f�#�l�����{#�k3�H�9?\"�\\��g��6�K�q��kx����$���\0�K#[$����mH�O0�*���Ai��7����6�f%���RE��:oh�
�&�D�9����3e].����Fgؘ\\�U��fom��ĆV�6��x�2LD�ç�����e~�z\\\"��^K}1��w\'Bg
������[odk�]<2�Z1L/Q&����闲�\\��ahj�!2�m�N�_�FO3}7;�x�C�(vبM�ȳi�P/�9�ܒB�I��^>�\\��Y�\0�F?��)?M�\\C[��.!�h��$�Q.�����l��
����q�����hɣh�d���ƴW\'�8�,�_1�T�� ?�\0�*d����ͥ�����|^�<RՐ�|����>��i�L����H�i�z����h���i��Qkseb��/4�mWO�$۠�ZL_�.\"\'��g��s�c��m�q�����]�,�h���ڷ��W�n�>Գ���yٮ��hr�\\�lw�J��*�- ���4ng�0�@��V���N�	�*�5�����8:�Σ�C%a�&��d�4f@�U)���{�*�hpƞ�w��8��&9��U�`#P�.Hd���e�*��NT�P5�
�5R�
Ħ
\"0�PT��^45��a�����g�0�o�-���Ŧ0�-�	˵b�鬨��c`e��]�d,�`T踫�c�GHܰ�O�F锛�o�N��+Jx����K%�O��N��sr�F|Dm�/�8D�S�����_�ni\'�D�\\H�t,���Xl�_Zk�
�9-�$�������Iib��C�>Cɤ`-c�s���F��k��p�9�֞d\0��ɏȦ�no�I����L��f[�if��W-{�H����g_�f$�l�4G[=�~t��֎5h�-$����!>��K���k�5��*����n�踥6�qۮz�CV��-D�Uv�1dl��d�=Üd\0S1d<O��K>[��@��ѯ���L�c�\";,M�r�	��U���W��~J]��HƆ>�6ԾJ���)�3	? �l�K[���Q�2����<(�v��:���c��RR��C�2��6���-�8��֍���x���Y����oc,���6g<���*e�u�V͵B�Û�13��:�A�%���5�Y{�n��؊����2`Iq�����\"����▒n���c,�p�`&{����ђ�Ol�oc])��#�inj��8bT��iӻ�����\"��͉5�?g��K:97����Ŝ�1��yq.aŇ�ҙ���d�dQ5�O;��#��8i�jJ�6�,���u�M�R���0CydZ@��(������Ya��N-�ϛ�Grho�a��n|��X]k.�k����d��۫-n#��ь�\'	8}�+�&L.:��\"}���������&����+jH�eňt���O���\0�3�L�	%լ�X�f@�U{����T�!c�a���7:QW��ݪ��2+�Xc.d^����$\0����S%�u�H�^�6f!���2H~uU�D��t�9c�2a{y��{�A�C���F�i��]�C�s�12��v���N�镭
��O�8��t�\0j��RF\'%P�F�������p:EW�:��<�P.�F$v F��FH�0�QN׍;QӤ;�E�)^8rT���KjP��1<Qa��
�)éAˊ(c��\"��S����C
�5=�FϝJ�4�2�h�o���c�GK[#�Oc\\B�.�����0�4��Q�ۀLE����_4�����l�s�p�<O!Ӻ^B�	��1�H�&�\'�v\\l�}ŦͼHf�6�9�Hs�=�ޮU5��}N�GD��@�	<��LW�+v]����Ic%�KD��
;�.��[m����7�������0�B�h���L�D�� {�����c�����êA_͕��\0�|R��
�)��@L���Es=��q����U���Ɍ3��2��g���m��n[S-�W0�_���G�
�f^�����u(�=JP��%�Y��e�6����G
��>�g��������r�釩m`k��)��S1q�$��O�͊�Xdw�+���������;�
.k�5ӈ<�)�9�pƜ�UByj̨C��TS�n��
V���5�k^�R�4\0*Ƈ�@⢚t��R�Ɯp
�m]�<������� W@+�P66���B�M91��y���ެ�gm�6K����.\\o�8�	��g������kv��⿖���s�7���ʵ�����Z�;���v����d8\\\\��F�H����0��Y� dS2h�5Lچ4�uL	��Z��w�Ғhƴ����f�,��2Yk��<,e�)+�.3<U��%�*�]��9m�-i��`��p�L5��lױ��>�:di>��)�[�;��%�CXô��5����c쯭�nc,�4�A8��n	�S�6}�>i��7$$ALT���sn�r�n�CCA-�I��i�E�͍��I�3Y�[���T���ۚ�u��P���VD)�ppn=�a�(�C�\\��2)��&9�44��)v�@w\\:��p��SS��$3	=��~��SG4/}@��)eI��Ş�wr6	d���sW�Dv��n���ٯu��<�3�%$�lt�l[��mc��FE$��ၯ5qS�,:��~�ݮ�
�f��[o�L%�g_ٹ�!�3UƜ	$����<d/%�=�>�h�\\�k\\��G+�b�H\\y����uh���e*��D>mE�>�RI�D�\0� �K)n_^�of�Yn�Sy�gn�k��]�c?��u5@d��ί\"���ICv�V0����?ķ{\\�U-�:W1[Y����l?���A8�4��C���M���È����O�;\0�����c&;��+k�Ik�����S���6hu�M�M۵i�M2{����6.`m���˜�p�G^�O�:\'�h��.�h�K���yjn:%����i�Y�\\[�5���+ސ������������{=!��1�Vc,���;�o;���!{��8�&���N*L/�pǵZ�G:���O�L�p����e,�U�������ƦF=�֎5viЙI�M�5��k���H��ǽ^���m���;q�u�n���h����0�Q.�c,�f�r���;[�?
)Վ���!�S �4S<�08��}(��ª�kLiDU{�R��_Z��9�(0\'3� 4�ЃR0�
 ���E�Ps���Q�V�1���)QL2C%m+�9(�T�h+�%¹Ӏ@��H��+p�
6�n�W�ՍtWR�44�P�EB�kȳ���O�kb�����������=�~�����q_�{��N\08�ť�m7[[��`tS�\0s�B7�Y�
��z�[�nn�q��=��<�SV2���Fu�W���!�Zsɚ��|rQKQ�r&�Q��8��G�\'nuDv�G�V0\\Cq4�bNH��_I�Kh��8���Vޣ���\\���=	u��[E�`��\0�d}O �R�7�G�\\�d2���K%�5����0f�-�c1���Ǳ��U��N|Q=UR���6{y��!�Mr8�
?�S�;+���\0VgL裎�-H&I<yBt\\R=�C�[sF�M2=���\'C���z�v[��>�]���^�/�#�i,��򹡄�(}G���2\0)��G#�״68��ď�s��8�B\\S���7h��7�mZ���:��h�ܺ~H��i:�Y�`w�+��*��r��P������ˌ�o�p�fڣqcmLᆂb�3_n�
�%��v��ep2��-
���i2	K�C�����1#[�^�8d����Ɍu�\"�Zf���Z��8J�b�e�ma�6�۱�W�ѹ\0�h��y&R�7Ύ��Ko��T\'I/���\\;�(a�ݬ0��o[�O��h���m0IV���呆�ݏ�:ё�Uǩ�$�8����1�(#n\\�W�<a\"�淄Gh�n���u
�ʝ�K��
��
�a���s^փ,��ť򲜝�Qn�Še�A9K�K��V2K��t{�4KMY\\�w�53q��.��G6Y���uC�C\"��}�T>����|��\\�Mgu
,�&��nd������k��0\0\'S�=�qKnǽޡL�y;5�N���s�0���\'��%Iqu�]I�<�K�C\\��r

&*yE��������inƶ�@`�!1�<�r��e�I �*��9�h�i\"�ōÆ�q^��rR�,֣�������\\*�V�\0�D(mZ�+B�p�h#$���v����F��f�ke:���qԥY����K�l�i2�Iu������N�o\"m�u�����ph��ap\'*�S�
�8�0g�o�\'%�0�\0�#Cr\'߮��D�U<��k��c*Q��>�--i�Orae���:{w���!�>�8�+�G��j`��vm�����Z	�W��И<�$���{(]x}&��k�t����)a-�t��{��g�$�<�d����Ra3�7����
ݟbN����߈��{	lQ�L\0TQ��G�-I��
7k�ɐ[�
K%�d�Zt��{q�z�W/�Hd�����`�����E�J��>6�����J�)-^���t�7Ҥ3�L�LK%�%�[�޹����dL�A=]O`�:7}ѾV\\�G�	kZ94�f���;�����%�`����rd�C�^�������5\\�{�+�w
xԛBC��۫M�V�ݶWn0:�;�IK�Y��
��
��o��~�e��ٺ�����w��z��2�N�Yv׵��f��W���s�i��Y����P������U��4�f��#��,����\\H��
��,&Nm���un�P��yO#�p��G�����#a�K.	k�\0�1REZt�����K�M�M��hp��t�R��>������8�c�t����50�Q3mq��X�&;@��n9Q��`�GX����]2y����B��\0y�%���o���9�Y�4���᧖��L%�#�k�3b�h��u&����:[mr\'��
�9SDS*�L1\"���\"�#@(p�Mk�����r���p�7���uTWğ�E-\\@���TR�Q��t��8��isq�ǘ��N92x4Ú\0ڃ��.J*q�T���\"�Qđ�{�:��^�8 i>l�%.�AT\0H�#��\'Os#��x�粼9��VL��GT����gwm�3纉�����D2�Q�\0P�A�y��\\<��g��c�������^؃���-Kߣ1ė;��k�p�p�/\'��uN����\\�,Ems}R�l^#�R`Ɨa�@h�p��J�oc��2:n�[����?A`����N�T��LC�w[�q%X˂����;[^)��Q7q�Z(۩F��3L���\'ZR��t��T���0�ۯ��.f|�h��q�\0��sU�Fl����\0�!e(ӗxSɯh�_�-�,��M=5�MY���L�0������sjD@�Ԡ:�W)5�=��61��C#cLL4#�<a�ܙ��(�gQ�I(�_�24�L��u����!a��[���Z�R3w�8�-��8�>0�S��q%\\�1�y%��go�D�f���n`,��g��	jI���n��[�5�M��*2�rRܬ�Bǽ>�V��8�a�0����s*���C��4���\0��_��s�q-���#k�\'%�5��oR��x=�Ս�>��8毑u��J\'�A�K�R�J.����ٷn{��od��lR���dLi��N4�\\�,��Ǩn��Mc!�sA{�\0#M1�M��9��6Gz�Z�%�i��\0lm
INSERT INTO login_credentials VALUES("2019-00101","Julian Blackthorn","1234","Student","����\0JFIF\0\0\0\0\0\0��\06Photoshop 3.0\08BIM\0\0\0\0\0g\0BdKJgcx66zHipoDmggAt\0��\0C\0��\0C��\0��\"\0��\0\0\0\0\0\0\0\0\0\0\0\0\0	
��\0\0\0\0\0\0\0\0\0\0\0��\0\0\0\0�`\0\0\0\0\0\0\0\0\0\0\0+��|�����g��~���<���a���]���2�m�\00\0\0\0�Z^�����3������2���t�/V��{D�=}�s@����Q������z�ش�xxr���e�J�$���)�s�d���1�y��ߦ]]��ɾ�?�[S�$�Q7���D�`\00\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0?��Ex\'{��?a���g���]��������3`o�\00\0\0La��4�s�=�U�����s(�b)��kg����Ì4����L6EÚ�����7�fj�H,nb��F�/\'^pŮ�o�d���j[:Ӽ>;o_��yM)�u����U�I�
y��\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0�?�8�+o�\"�\"�O�A5������\'펇��Q3�P�\0��/�o3�O�^�EM��/Lk�`����	6�Y��4�c�`%|�z$������Ki\\�&�������z𨓖J8��\\����l�]��ų�>�|[��\0����B߽�\0S;u<�lP0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0����L�.����?NAtX�Ƚaӝ��=���v@7�u\0x`o��IX�.�����`��I�l�3�\\\"��Y��]*�JnK&����z:i��Ɉ�<�����H����#��I��6���?��&S3g�(ύ�Q!nf+������/?C�f|���A��sΣ�U���ng�(\0�\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0���4$W���PO4��x&��Ofq?lt��
o
f�El*�������c�a�1L��X��Y��H�j6��{_��&��Ko%��\0_���V���\'L�Ҁ\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0P�����l�#�ՓB�9}ܟ:��t�M�
����5~��e���9�p�v�-i��o��)�&���Ub&A��9�~�V��f��i�݁�g�$U�{/;^��0t�%s����m�F�*�l`�c\0���F�U�|����O�
(������\0Q������_��@>\\r��0x����[T���O՚�^ڏl/�]���[�V�\\:�-��b�jm}{�1)��ZQ��<Ldr/٬`��#\"�M�c!+w��\'֕]�[�
�a�El�X\"�`��s�C,\0\0\0\0\0\0\0\0\0\0\0>\'��GWp_��<�[�]Ź���+��-�٭U�8]	󻨹k��C:|��4�9�h�O3͞\\�y���=����������x��:e���fMf�ۺ�q���\\�`�!��Enf��dk9&���\0�*m�O�_��o���cW7F�^j[��=z��K5��s�e����W�w
4U?|j�(��Kdkޛ�l�s��^��/�O�{��6.v�I�5�{�/�q��5�f����Z�f��gYf�xd`\0\0\0\0\0\0\0\0\0\0y��|sܜ=�~����t��.��|��;|���\\�3;��ҵ�:I��|���g�ܬ�v(�sj�����U�O�W�[��V�V���Ṵ�я�����L@s�����G���[f�3B;/�>#*��!!,0+�^l�{�3��6����h�׺NA�	(�B�ͳ$�7*��/�+n����-�,��=��LH¼�o�Hd�Td�7�F\0\0\0\0\0\0\0\0\0\0`/�8��~�?��O,qz1�j,��0t��-�(�u�ǆb�� l�\"v��6����N=R�&�ӿ�E�!o60�F�8?��Y�9�%�u��4t�w6��t��w1f�b��Ҥ��F��שg0�����~]��r�s����mzf���OS�װ���`����ye�\0t������}9ʛ�ǎ���Y�>a�	Z�6�Y;���d`\0\0\0\0\0\0\0\0\0\0��b�WΏ��\049_љ�r�T�`�����:[����\0�����y3��^�)*�<��i�f��:KY+�l�� H]�Y��P9x���<$��/�
d\"��Cő~�L3}��	���
���F����U�\"7[�=�
>���.���1��)�z�a���~�����\'=X�|4�&�ǌ�`<�xa���J.Va(מDa4�Y�������\0\0\0\0\0\0\0\0\0\0\0�9?���\'��
�Ta��-�6/=!�:Z�Q�r��E�U%R��N��#m���s�i���Tl��ۍy+�4��g\'��,> W�@�;�ĳUD֐M1jG��
��LP״�ZFp���%{{�pd��K,��`��g#?����?h�ѳ<�d�S���8\'\0\0\0\0\0\0\0\0\0\0\0\0&�a�_?~�|���\0HA\'&?Y��`�^�p�y����>�u֓�o�W�����B����А����ne=���y�<�+5�\0Z�GEpߠ�$���|�lܞ�	+C���XN6o�H����O����n�S!�-����*�
��ZQ��P�ag��f��\"�\\�f�t,���ذ�#\"���F�mJ�\0W t<\0\0\0\0\0\0\0\0\0\0\0\0���������W�<0�VͰg�4����Nh�+@�Q\\+�������<�0$«�zM]
|��\'��-�i�L�r�I@�
�`6ap�\\����Ӵ�X$�Ԩ�7\0�E���!��=7o8�l�\'������P�)��vazt�[lx�w�\\n׶u}����R��Ot�i׷x�EJ��ʪ��6�+�3Ѝ1D�9`;h���,���ً����e��0:��\0\0\0\0\0\0\0P
]Ì2z�B����w�{d���\\6�L�w�-Wj֔��)j�tf!%~Ϝ�ygG0C��x�l���Yj�z�V�R�s
٦�<���ɬf��8<r�`,�����\0\0\0\0\0\0\0�r�~͇���\\\'�LmJ�[�����`�ixᑿ�{/ZY�0#p���UeD?�#]%���{ě`�;�l��>l[�}��B����r�Z��QU
.�[�ZJ�ۣ�D�<��7+e�w���7��侐�����nnRU���4�M�l�Eg[��.�j�uJ�y��5^��T˅J��و}�*�$UD�
g��üXA�G���?g���Y��~v\0\0\0\0\0\0&�>��\0����VC��?����;63�m��-{^�u��U��
���s�����U[�C�{$\"�Rm/D���Ț&�r����Ĭ�����v�]�Z\\�&��i�9`�Q�Ř,\"��
�R^&���z�k�w�To����Y��ߘf2g8x��++�E<@�f�D��qL�S������w��[n��uY��x�[��F�p�Н���<�^�ڜ�y�pJѬ���_�I-R�g+��y�=�#mQCkջmJ��k��Jμ�+Vx
��`G-��s�ng�����f̻����oC�� �$�L�AD�f<9�c�&��\03LW�$ÿ`�[毡�F\0�o<�@d�$�cǌO�f������C�O��f�䝷y6�+Q6
�7�Q6�C�]V#^��8Ln�\'�e�ą��S�jP]�ҔQ���`�&�l�(�� f��������Gm��� fW�7r
�h ��1������<�*>���򆕪ǘ������\0���X�k�����v��̏O���5�n=2>��<d�ee?+)�0��H��d2��̜���Y��������=����� ��a4�(�I\0� i����t�XA*���mE�M���W�\0�#���n� ��O�/������gRu���ǯk���1 ��ǼY0�9&��Le~T�$���p��<�9��<����2B�oދ�zϨ�6N�xL��IO�{$�z�_M��ڳ#<�\0�>�1��)����?��#+���r�������>w���/g�;�sa��T&y@c#~D�����$7�y[��(����d���hy+D�g*<������WR��7N��հ���P��\0����S�a�0w�3�6�?��jX�N/V��N�u
�� m�P��̕�&��z����x3t�A���?��I��0�����nK5����`�Ns��D�_4�\'���i�i��rh}�j�����20�6!ŷ���$ǌ=*;\'�c[B�@x!�	[�ei�JX��p�/��}�	D��\0��Qg��
q�;G����?���
���
,6X�O�ڋ)+6Y�*
������\0���Ε�p�G\\���\0�������2|�=�����>���ۭ�x�NR�j93ɼ�y�oI�^W������f$Y�q|��K��G&0�~�#��0�L%�H��DR1�&����Ѷ�A�\"WB�C���JL\\���$@�����������+��}U����O31��>��X�ʘ��}Y*OVDN��̞�B=�rI�^9�;8�#�y�@ǰ�0L��c�&0
1���\'f���R3c��R$���lLPzF��(���$�pN!}�;����̽+7��ӢGUa��>���0�$;32Ix�D�ǐI�I�x���x�e�hȓ���2G\0<�\0M��[��q���d�7�`FN\0��Qf�
x�3,\"��!Y�
 �d2�)��G�?��鹱��=����]Q���rOp������=��睘�u�>���?0F^�K&K$�|_-�������I���q�,`Tx�3��{
�W�o�(�>0@�I
h�32ԐQ���0�C�x��*�j��]Ca��=g|�@�<�QZ�`Ҥ���z	��E֡߯�9\"��&�<��Oc3L���,�dl��e��<s3�<rm���B
�G^�[V��\"�
{)�v$�M
D<�FI���6\0��-���b,!�8,	��^��|k@X��d�$�z��\'�)�,��E�hͭ7,�0}����+f=�z�3����2���\"�ς$ul0����\0�0���߅8�����Z��&��ϕ�<�T�V\'�23&bٖI�b*[,�GL�{-N=��\0\\!b�XQ���bQ
��B!=�Q!O��S�oG��{���K\0%�ʥ\\��HZ4�\\]?1�9Zf����\0��u�d�m�ͧ�g0��fJ�i���l@~#ųSf̣�U�o`�$���g􆳞�D0z���_�NW����#���d�޲G���+8�@�Q��B��\"�H���ѩ���T�h�2��\"H<<�G�
{(�0�b���$�F��
�;�����\"�{86\0�U�g���S�?����l�xd}y�]3%��T�ߪM�3~�\'�Y,���9f4{�pl�=��!O#�?�ƚ0���b�B#��Q
�� �hmO�r̃a�>��,��`�@����mi��5�Bl<��l���48s�լ����� Tp	p;\"�a��*N��ϊ?�{ǩ��\\�<bF`\0��
�����fV.�?�������~\0�MF(���T�!��D\"��i�M
��Ԃ��]+��A9�	�I�VaHb�%��7�##x��-D�\\!���a]NQ��Acw��&��3���k���3P���%�_,�<3%z~��#��38���fS������>�4��M��b�b�H�B!��Gc6�M�)��	��-=�2B,�>a��r$�@S�y_,<0�����\0�s+��G�|�s�	{�wJ>�.��.����M?�$��a�K)��|����`��G�L_�:��f���2��KΒ�X��/��R!R�J�\"��g�nY��#<vɁ6jh�Z(�
���\\6�!����\"v��#H�V�!��0Y���Y1� ������5b�?J�|l}-4A$#%�c�k�`P�\"��c⾬�N��?0�21u�f�����ٚhy�$}2c#\\������>�2�|B�C�,�Zd��k �H�B#�S����Dd���=LS=�1��VL~�9�A��ID&�L� ��52fO���$yp�*�c�~���\0џ��4&^���q�Ѻ�OJl�L}�:���U<
G�al�?�U��Ȁ{�����?�G��_O�>�v�]�
�4�Y��맦���Sl\0�#�
BL����.i���
g̙F!�3����f4�a�(I�y�Ɠ`߱�����W��\\bd\"�!����
3�f��=��`E�L�3)NŨG��fǽU,�`��?M��?�������<\\���*�R���^(�{��i�ׇ�>{�HG���%�>#{�c?��)C&���6��+�~�y0��\0$s�0�A	�Hxxޙ��
0cќ0O�cD[�d	�h2H%�L~`,�z�����*�F)�K|v5fm^G�{�\'�}X̕&c���&���A�3�_r�s�%��?�c�
v#�
|����?R�+5�7Pf�1��~��Z΅#]6���I�6h,\'O�g�A�c\0@*D)�LY�Ƨc*���7�H��c;ي6-��\'�^���La(�����|l�_���	����Χ��*`:����%�M�3~�$�7�,���}���3\')������4�o0p2�a���B#��f�d�r���#��]u���=�jI�X׳�����P=���<��10P`_2x�4-H)�Rb�����Fv�	��x~1������U��(x����l�\"�o���#��\\��
fc�\0�o����w܌zo��*6¾#�y|&r3��i0�#����D,�`ƃ����1G4l�>��,ȧ�@�����6��38�lL��bR��5�P��O���~K*7�����J$�6oB}*gˍ���LLC�:�?K��=���L?��g����r��^�y~缛�{��L�=2���3V���͊���w�j>/Y�
R��jT�R\0�<����O*r����3�@�Y�N��a�\'�l�a��7��_�ϕ�$̇J�����x,?��a���(\'�)�gï��|/���=�oI{��3�7+��&
W��Lx�3�X���XA��� -0P��E==�T�H�d��R�g������1�?����3�p\'�ܓ�4������O���\0���|�L�^C��R<��|�@r�3���0oxy`�pZ�\0�q�W�aX���
�*���Dw	�w�=<�=��<��yN�8���ٮ
|<�Ę£-C���@�.�)��NN.��f64�XA��Q����\"��aɰ���u�~|ǚE8M��؂2_W�@Q����<!��2�hPQ�O���Q�
`hhi�<���T��#��*E�f�.Lo���F������2����FI�`O�<Κ����i���?��/邊b>~.�|�ٜA̐����0l%���I03�\\,����ǎ����zt9,L�S�Eo�%Be�$BD�-��Oz{�zyS?��O	�P�=s��
�{<\06��ڌ�	�C�4���2l�l�f@��}Bn��!l�y�������5 <���I�z�qY�3g�B�g;A��G;$��qI0C@��[H	��Q��E剓���H�D$FddE��D�A��h����	ٯ���c �Hxb��O0�lf��)<cLqe8rh�&���vo�T<�21�M��Xʵ��v���>K��Á��(`d\0H^}��t����p�H�	��
(�\'�Hv,\\���z������#��{I�S5�w�HA8Æy(y��<��O�ǽ���͇��3����\0]��}T�W����ƌ�.����`g�迃��nP\\���ۙ���{��	�L�02:A��z�|�B,����Ą������
A�A�0*G��hy��\0b�F�&5 ��h�L�S�gF�|�1�ǩ=�@�`�HA�Ȣ��yV�}3_��d�x�����aHyg��&r�� ,��.��ՏJ̡�y�~���{e�$D5�bMk+6���UHRr 5 g�eX�]�Ìx`�;<���&�c������u&M#���}|�LzT�D���HT�H�WT�y��Z%f�Lײl�Ir1A�y{}�凘M�,�[�A|�9$�b�?ap䊘�����2ɫd��9�&N�8^X���ɷ��/��\'XҲY<,}�@�S�%@�v<���\0ǘ�Sd���Hb�O�H�&1G�J6lV�O6�T�L�|����q\'
G���T���d�3Vɹ.�Q�X�=����(_F3�e�<�m��o�V�a�R(��Y/�&����\0�f`�g\0��<��
�M#7!��\0�$1I�T��Sf��|�$�͋�Ȁ<F��;�d�<��S�c>zfl�^�P�r��\0�&7#(\"x�*7���a���#�z���P�Hi0�7��rwb���\0�:�E�� 9E��cS
za�нP�Gk6$ �d���H�y��z��$�b~PO�d�)�%O=�`v`����Y\'����T��,�2d5�\0�B���\0\"xy�<�
\'ߌi�$I1��A�Ï���uA�j������\'��X5�[&wîH̩�f�����39�nǞ�~~N������O�����b�ؿS9!��T1
BVl��8A��5(��<ƌ�w�1��HCV|�R��$�+���jC�*5hxrgoܤ	�����T�]D�%8\"|������#%d����{<�g���,d�٩
~P}�y�I�#��5�<����L\"V�}[?��������2M����3<��b�A��Xo�k1�c�pm���|�9h�K����������@{��LP���V�7�b���]ﴇ�ߵd�K3&��d�y{l��i����QV�
?#�%O�����>j#���c�B������zON�m`��jІH|l�#_��{$�

%�#f�!��ǒ�(&�p�����ƈ ���/���b��W����>������.T1���?�H�Nq���O�`�v/�h�!�d�c�c��`�R�2;�X�
�j���QG�H��C&ns�)|{�<[��C����{|���<���x�X���I�e}Qe��<��\04�߳G�Bⰲa�<�� YU�99c1���^�\'`�x�<Q�
���	�4�pf�Y�=�U�D��O=�S�eL��1��D&g��_� yy�Q�A3� W��DQ<��Q�2��~���=�Z�������T>�����w�z?C5�o\"�$2�4̸�ϳ?���*��ºz^Y	�$��$@���D��J
�*i)eOC\'&�xRO$xa��2J��B���~�ؠ�b���<\'\0��D~/����b2rfV�P>�S�q��o�c�ՙ4�B�w�Fmƌ����O�����FQ��WN�O�D쩘�\\�A�!6P��y+zޭ9|²r��9��i��8[��,����q?��Q�I=�( �������\0s����:���Ǔ3S2�����O�+�6�r���~��$�c������@Ja;�d�fd�ś%�B�\0V,�y�;Dv��+�s�<���,g��@#�<�B�dfd^�?���\0f.NQ��C1DBA��,�P�6&G��I�\0�Q�<��ڼ�>X�
� ?��u&Ocg�H�dg�-|ǫf�W�L�d猗����S!����Q��例��$��I��(��(�H�@�a ��(���.�Խ���Õ)���2C���I^�r3�#9�2eL�reX�#\"LÅ��N�/���
��\"��`3{\'E��<���<Q�c��(�ax�������k�n���U�4��-0��<d�lȐz�`��ٌy2j3L�)�k9<�r�a�񽙄��&2�^K2c%M{J�pl)��=��;N!}�`x:n_��򆏄�qX}��\"R)ʜ���	�Y�lxB�fO�Us�<���3��(���}U��Y���~K铒H�����&����b��y�bk}>Ci��Tf�2N�]&m�����ʄ�����E;����\'�ͦg��/�����H��ا���ڛ�HS3���Q��
ƙ<R=��|����������\0��K�G�Y�r�<�ŧ�f�{&��q_g7�O��3�@��FK1�ˑ����~�\0|/��Yb�h�A3|v.x�)$�xx���4��Y�?O��cc�F�P@v(�(��*e �qjp�|L.HEb��O\'���{IV�}�P7��u�Y��9%�%LE<�!�=L)�lǬ���4�\"{���Q���OI�o��2A�O�����/Pё�V=��H=T��ւe�Y��Ü=��0�_cؔ�<�JxR2��ْ(H��a�\'��	������߹�< h��&y�\0\'Y��t���+�Df
g�yO>�*Fq?�2�rB�����Q��i�ڛ����\0��K2B��\0t��)���=�f�x6� ���,*�z@���zO�3Af.N�����\'�U�T��!R\"��<䬑bj�a
E �?�\'��{�x}lOL+���O�=L�k�|��2-���[�f�?#7�ġآ@[�y�͉������C��̡p���a�I
32�ZDфG((�ScL��-?1�8�L\"9�
�j�(���z�J��)��
yO�؊��)�`GǄǯ�}I�8������y�4wY(�L}��cz��C5��>D��	@����\'��\0�~,�������4��Px{��B�$q�l#�Z|��9)b��S`� G�P�(Ok�+�Oz�D^��^����%��<���|�l<��y��\0,�W�<|�Lx��S
�\0Ǭj��.�����If�YD! ��<�
2&<�M���P��Q%�_#�>�E��D��5���?��xc��g��=���$d W�li=\'�N0��5�rQ!%���R�e4��2�͙��CSL���9�M����b>�>K���U��Q�{g�Ox`랥~��M!*g�L����v! ��@�
����̫��%<�v�
��l��
|d	����GO�a���C� ��%?� R1�T�RO<����$\"x���x!G�璭���Q�?��xh�d�^hHm�	Id��H�$/�J��_3fC,L(��xT�G�g�9yO)��1��,L9@�x�Ij9��|=��ٵ\"�\\�l:|�q���Ș�Ǆb�{�=�fs8*E#��6���?<?�SʴJ�I���`��|v<����%���l�\'�������0F�Sͳ&�$�%y\'��B�J\'��&<�_����¼�L���O`)��1�x,x�i_��J���	�G5&L$Lx �Q�$|I�<�g�F��S�<*�����%y�
�ǂ `���l0���g�8�҆f=��$5��bV���Yd�/<��L���}�f�cOg&4Y�O<v=���9@rOj�;�\0_Ru���$_͢U����S�J	�¤}�C3\'�/}��&>_c����%@�D��7��	�L �v�<|r\0z�B�`�����gb���b�PJ!�-Q�0�< 7U�ޞ}��ŭ�O�f�Lv���s�͒PS2��/���
gbe*D�y+�:��.|�W��v�D�V�����2C�O&i� (�U*@\"��ů�����āfv�X��@��LX�� �ɀL-)����2&O�G�u��ؼmK�`�z�^�R��0��e�!���2�\0O��;1�!�O v=��y+��-OP�N������Jr��$��h���6v��!��<Y0��2T���J�G��B�U�xP���C���%�a�[P��#�U�\'�@X�� �z�k��S��8]ZX`�!{��J2s!~LyLճY*�rH�Pr�#�!��U2I��>�������v��$�W�^���F��k2IfG
%�E��OcPc\0����O����3����S���<!�\"�+��>a�*�=��S
%���B����lz�#\'éo��ɞ@3��C�%���|䉟�2�ܞl���W�G��?i+X�f.��I��jg�O(�)􌐅�R~S(HH�V�mW�CK�����=�w������\0��؎�*T���(����!�Ajc�؃�ExA�^@���9���L@��	D��O���
\"�q_S�W����\'$�O���iQ���xR\"BV���;!584��ފw����֘W�B�@���A`���4C�2B�v�b��Q�(� �>��$V���A���Ǐ�#��
����{��nCɐ1�O}�V��)�xE�V��Z����W��QG�?�/��
@��>E�x��,���>��K}��L4A�O�=H��O�B�x���{�$s�3���\'��4̽�	�hyR2Ԃ�����ț���2�H��b���|��{凵*iE< H<Q�(
�*IU�v�3�2g�G�ޭ{�=N9%�+�1�M>��\'s�8{(�pO\'�{���
�DX�!J���E�EZ�{R
������=�R!���B=�SLș�uvf�&��x�n�ʒ~<�b��A��N8�pM�J��-�߲N^�JqD�!j�?���ñ���P=�����0��;x,)���v�Wů�W���UH�QN�Q�\"�wy�4����fu6N���a�������#�v(�J��\'\"@�e�|0��A�W/
vp��</����x���C�h��l\"Q(ƀ�z�	�բ�|_f ~⊥H�QDpB��B\"��a5�W\'\\��4h ������k�Z�i�d|��Sʴ��z�)�}�*2���E���Uا�!�Yʯ��(�	�eXT�x=�EZ�J�h��T�EZ=��S�msR�ʓD�`�!�>�kŅ�%e&OV��yD�(=\'�\'$����T��;�xG�6����-��ڠQ��B�@�@�(�����IG��B�P4X{=���\0D\0\0\0\0\0\0�� !3\"#014A�$2CQaq��5@BD��R�Tbdst����\0?�4g��}��y��n�v+��FYf�������p���\\��ٷ(�K��g��-��Z<�+�>�٣aQ{G�che�rX���&�#��|�e��\0�Q�vƐq��[:�\0�Uu[0�^9���O\\�d���s�c,�%�u9�XΩX؉����W<���_�Cli��F�Q�ܒ��2z����0�Z�����rl��d���Jޭ�r���§����zA��yQ:�����(f���,�gqs�D40�1ɳ�����s�C��L0�G�
����-B��%YC�hzp���Q�\"Q���\'�Z�[���4�V&��\'&.L�+���m�%�7n}��#����,�2\'Zp���ot�q#��ޚ�,gy��9�CE��ج���P1�5�+Fy�n�w�~�S��Y��wt�����y�3��%���O��erV�4B�hM�P�3�̃���9O�zl��=)`Za�<���ìў���e� �?ae�u�s�B�2#	 y�o�w�R��\\j��=U
��v�~��l��{�a�\'�\\���(ߺ����h]IX��i?$�o�auDGm�w�Qq<1�9
#!�v\"�T.�&~�#f�=��E���:ڋA����(���\0�^F�~�]o����a�����E��u�Hǈ�[ga�lTQ6����,gVż�-��x^\"�B�̗�h}P�꿆�r�F�W�
ƽZ��hƇ՚<�4zW�Ic:��z��G���&�����MI�E�L�lM�O_�=��(�������F�>\'�ލ�T�0��&\'ҿ��g�M�M&�x�D�<����/�;��[����;D��{c���$mh���cq�{��ju�\0�a6�;�QEJ6-�^ϣ�>\'(��ؑk���,Bˬ��Ա6ٱ+��,gP�$�ŏ`Dy�l�
�����X܈j?�e�v-�\\�����1��Q��B�/b�z���l��\"k�X�dGW�IRqk�?������3��CD��q�o-eg~�+��\"�[ι\\���lH�|�s��5�,�.l���۩�wkX�h(ָ�h�h�J�OV�@��Ql�΢�:��y�bGk���^בq����y�E�XΩ.vǦ���HX��1�k�^-�u���#��F�
+X�=\"#��2�b�l
��@�b��B%�_��[?*���}���d^=K8͑��C[Ys�bዜ�.3����<�о�Ej��+HV|(�M$(��n�P�?a跗�h\\<B���a%����:ahGD=�X�#(.��h���2��{��(�\'DF ��gm�O�6�C�c#L��X��>X��k!��J��dY�/�g��As�b��^�q�ģ<��#��� ����~��L��\"q�����Kc��#|G���dO��V��C<Cv��CxIx�b��ȴ��;��������qp��[���h�\0�u��i��)\"O<<�=�-�YW,���Wl�X��=�V�o�w���[��?r0��ȶG�\"Ydg�,��M#���7�f*�j��hEl/]$G��{��u޾��w
�����o�f�e�Cg�3��Ǉ�\"h�6~��?��\0:\0\0\0\0\0\0\0� 0�3!\"#4A��1CQq2@a��B��D���\0?о�(�d��Vgqx�������q����a�gEeHY#�S�W���ur�ˎ���m�(�H$�8EY�?�O���Y��;Y��4�8E$�l@�a��P�}@�6����6s\"��ߑ�|K��fK����?���~:N��x�.��XO�.�����<\"�opz���Y��FK\0_�F�	A�����8ä���VX������J�`���	Av� ~�1��)��PF<\'�Px�a��q8�o\0��E�e�pw�r�]�xj��=�ܯ�/���n��\0H^�do�0r��x�e���`�`���X8/lE��t���0�N\'KEO�_�ln����/��j	H����q��t�X6X+P<K�ȨEmkC�o�!`�~o��2�ȼ���F\'
��v;�xE�\0�:C�xDu���#3?�S*xL\'��t\0B���JT��v?_�?��3�0���,>I�=���Rj��,�����I4v�>T����SZ=8�����OL�d;?x���?KQ�0��U�NS�N��q�������Z�C~$�b)U��9\0/����l\0\"!�aJ��EDm�,�y�v�ڎ�)
t��I	u�xܢW-%�
�\\����R*�X|xC��}U�.�������T����}n��[C���1�(�d�63�\0�<_KT��i*9�h��W�H����F;��\0�F���>qյ4��<P�RW)I\\��!�´��\0j�b����\0���?�UR�L4��`���{	�eºc������Í1�Dtp�4��O�\'�N�us����ek�5>Ϙ�����?��ɅzSɲ�/��rbQ�SI八
�ˣ�X�ת:ZR!�?S�\0�9ʩ�	ʣ�Bю�wS)u�X�r�Z���W6�z�����\\⭊y2�(���Yڼ5�L#���C���T�J��i�Ui{�?�O�\0�1��>����G,O�Z�lUq�1���?)U�V����ঈ�)\'.���Y�.d��dÔW�i5�[Ĵ}I���?�D�,!�(�\\�-ढ़���x��᝶ .���TE�DV 1X|��:N�u�
��!��z��|������u�	5��f��.�.�üq����O��\"�y���D%�k�<v���ɤ��MV�Z�xI0�Sȫ\\��
�2�ZAe�֒�l�o
�W6R��C�����!%��<D�+pTZ�%Tv�*U��E.�T�bT�v�\0pt�?����\0Ӟ�,���F>�J���T�fk���V�c����Ď�F�z��*]{[�Bͩ�/R~dɲ��������(�eV�f��\'�[+�B�L��y�f��Ƚ
ql&�;5S�*�t��&!}���{SӢcV��jJ�Ҥ<���%9zx�/�[J�y*���G���]n��[�\0Q�\0����Ε/�Zs�\0�c*TyF���(���\'�/�ZD��@)�����d��ټS�(�(�e!|���\"MG�C��b�t�V�\"Cxè���fI8��z�i)���D*����U�r/,��+<5�?W[)iic����X�H3�V\'�*T���\"��Z����ԉ<vIK\'$ɸb����RbG׺I�2d�BB��W)n��2���p/M+s�ЫvIH^B�|kG�y�r�ej�?	-��>��Ï��\0�[�x!����8���$%ʜ�Ѣ�5q\0g��Q�o4´\"[�5�TS \\��?�RZoJ1�.<�/�C�Sɓ��L~��9q
��V��^�-��MXJP-�@D�ɫ,�I4|�LS�0�Y�uĩW\0�\0�.��P�J8P��/�dOhҳ�����>2�P���GX��(\'�O�Qܜ�Jh�aQ�M�@YS�\'ɼ��<��R�er���V��6Uiԗ�5>�1um
u�L=Y�0��N��m��-lU1a��˨�u��AZ��U�b\'�m���H�G�\0q�S֩iUN;Ű�6�g���tE9qe�dɭ�0������^E��;�R����2��6�j��St��.¹��ie�)+|�+������lv�\"��S�սU!�P	��F%�@�ti�;���#�RDEy�.\"L�J;�)�I˙2a�GO�K��xS�ăɹ��q,�\\ȵ\"����;�59ݶ������_vo���������m������z}v��~(�TNE�;
<H˯&�9:t�.d< 	��3Xv�ٚt���\'��>O�\"�-��-����u��bN2�Wo/1��h�g����bF6�҂���3]-��)b+�����=�+1x� �;\"���r�$d;�b�Rt�&.���i��G��o�\\��>M���ܟ9v��{�1/�tj0�QN57Ez�2t����,]�uYa}��#Z�Sv�#@<uN���/��wi
\"ޒ.D�\";i�u9p��GQM�t��T���1&���I�K��bL]{JI���
�Q�����Ky9]�^O�q]eU΁��R���7�޺F�l�XZ�q*�8\'\"�ux������r��˅&O�3NE�d��?�Q�iw��rNC���ٕ��D�S(�� ��!�q\'���
ֻ&�Ě1/)�!{C~����<+�i�U���Î�,_��������5����0�ndb�7:��I��(�]�i��
�LW]a�oF�ģ��>[
��О@UEF�*��S��n��qՐ���C�l�ӎ�o���o��y?��|&��F��eN�4�#5�.�t�9n�qX�/(؎��oNL<7�s\'ޤ|D���y�b�ҽb��v�z�v,$*U���`����3��@U�Z��ʳ�wD@u<�n��t�YK{\'V��%��XZ��&��BR�L��-�|���ܤ)�m���O�4c׼a<��u1n��[�J�2�-JC�$|$�PS븑\0�9p�2�u�AP�V��M��\"*�/�D{!-�V��~�D�	�)��.3Q\"E�UڬI�+����Gh�pL\\���I�����Y�u���Q�l��;:S��s&�\"�J�#�I�H���I�S�in\'���8�bm�V_6a��(�9r�sܸTi�ꕀ�z�W|�{��L���b1M�-�?��-�7N90�
�TW7\"�z�l��M�٫H�ɶE51RޖN���:L���\0����U*#�j��V����M8��

{Ʌ5M�JYG\'.e���#.����Z�Wm�	mڷ;��wVҙI?�/Ra�m#H�jx��V�j>V�)
����Q8�n	X(�$;�Q9
�E�ɗ�+��ŃŇ�(�j���GE�Ӧ\"�5T��ę:���O�l��*=JB�%����״0Z{�Ó
���GL�H`�Kw)p�%��zbeV�\0v�X|.�K�~Վ*E�	厪_�]�*���$*�g]Y:���^6���F�LB��<6&�E�y?�;��Z����*F��
�j���4���F$��m@TߝJ;%zV^)���yV0xqX��]VX1-݅HxF���$���&�@<���)�y0�i��X���O%㵓Ku0�1��%�-�wW��\0V���(�q���k�� �J�6� �T��\\\\%|�aiK���B�kj�n�:�9o
��$�7rx�&.!T��R�JQ���ڶ\'�jb��zׄTI��I��?�]VA�t3�F[���Un��2�Q�L;�R.%u�%�4�8�/�I��w�@;Қ�P�u✓��8%W�g�骣D-��\0X�AR�V��� t4���֬\\?��h�\0��\07,GHTbB0	���ok�t�ӊ��e-�Q�Q-�ȅ:j5DG}h�ۇ�V�/���П���?�Y�B���T��U��y���V��&-��SœI9n������b��x�숪�8�&�y �^��P
O�)䘶ER�	��?���i�l�^_�Ǌ������g���X�ٚ.�UM݄�ʛڜ���j�W+�K`d[
��v�Jf�DҶj;	ׂ�O�H���ɳ�L4@��\0R��*�[sn~�Q�P�SJ��\"j�� �l\0S �Sψ�M���\'�N��l�!}�&���.lܓn,9h1!�\0*��g���!)@�zģ屜԰��W-mQ
�T	�\'!����&\"Q�@����6�S��c�Eeo�Q\\ù��y\'��|���;U��U��	��Of�Gl5<vPzS�zb���;(��Kyi*::ŴV�N[���r��!��yhœaHȨR)�b�D�իa�>�j�Ww�����U�(\"�䤘y�f�Ă��!�\0e��}:���7X15By��<�C��Y*E�WN�g8L(\'��r�^6�\"GĢ[�*(Gz
�:wG|Ӣ���^f�PdJֈ��T@FE	�Ň�;��+|���%���L\"�)�I]��&��)�v�D����
c�>uӏ)�$��I�2h��m��k8豢�]Rی��LEt���F!*[��ro�����^1�b\"����b�&��Q�MEkG�F�+�i�io�5kDw��TR�`]to?��m�r�}��N��ɇ&�\'L�8��\\9Aaq�q����Mǵý�~S�XC�t|�,f*�v����i4K\\%��*[ɤі���ȷ(��Q�B�?���!�W��*���#����=ݹ]��ݿ�\",�2mV�$�)��K�b
�2x���F�b-�(��nZS�t�K5���\0Ib�
�!\"�]\'���T���t���<iRA��CJW؃H�֢2.@�U1S����5,A��C���M�syK��FC�~�raN$����T&��43�xQ�t�yN��ŃŇ�j����� �V�J�����m��{<�}�ܼIHH�x��Z[永�a-(��[�|�ܞ �݁���s�,��w�S/JbQ�V�L=qL+��.��c���\0q��rM��hҽ~\"���q8��1/RtФ��j=�r�~Zn�*��D�]�U��Y�G�S{�MO�i8��\'.�Q�\0�\\�wPŶSV��)N�)Tx��
d|���ъ�����-Jo!!�r�Y\\�u��%��!���L-^�uܺ�V\'�����rj�b�9yH��nf,?W8��J�l�4Յ��K�k#�b�8�QD<Y��#���%W�Mx��\'����Q�V�GqG�xk��<�F)ƍԥ	�LY�V�������f�\"�J:�B���
�g��1O���y\'�̮X�b��OB�5j��@��5$�N%�u9qeKE�Ҽ>b��)��GV=z��^�^+�O|e��fT���\0Q0�b#e�7.��z�J�T�єs��g�>c��ʇ�����dvю��k�kSq�t��te�\0?����Q�!�@\\)�n��p������M��D{��n^)׌W�Z:wU%���;�S0��mw�O�Gʜ��X�\\S��-�@y���ln,Un5J�Yip��\0���q0�g�>Rr�����st���
l(�q�q��5��k��M\\�EmEDJJ��$�x
�jGY�:�]y�G7\"�a�C�F?~R%o��͡�=J����X�-lG��{���:ǥX�8�GR�Ȉ�
NO�(�(��+ƨ��L�Q�~�7�)W��+�x�l��(��[d^��\"��G�1�ƝDsmwN+�I��ܲd��Gʁm`ser
��CR��N��Z��m�N#�bna�ӊd��AS�Q�^T��Q���b0uĸ��I	���s���1x+����J�r(ѠC�j5*���^�kd�mw�����Ʌ4���QL:�ɑs�\\˛�tun,����ղW�<-F��� ��ڰT�
g�*|��U!��3F/u)Xf�Iiy21�GL����F$�ڭ[r�E�Q�uV�ջ�Q���V��+���Դ���W�j�����O�=�u��S�L����Ք�{�\'%�R-���q`��-�XZ�6i��j� #�!
C�UH��\"����\"퓊i(�Bj%�)����5S�U�:�J���
8�.?���!4�/e��KR9�����ڥ��
a�]�S�oq�<Uqz�*{���*��F16���B��V+
6�]����mJ���
������\\���(����ٱ/R$Tw����koR��JY�g$�R�hI�O��05���o!/|.��EZ�F���\'ݽ5AR�9u젩�mZW��:�
�*]\\�ȕ7! �0A������Tz�����[i1KU��8��;�I��ˇ�4����G��a������Qڤ&gG�SMD�����O&!#Uh�F)��*U�-�t�U[bhl4��dE8��2$�imy	+v�1�ND�K\'�=����v������ѧoj�⁣V����֦�)��TI�*�3X|P�����\0ۯ�G�d��ұ�J$���
t�ʨ�#�[��i��-\'Uѽ?r��ɈwT���Q�������\"�F��ON�����q������(}��㢳�y��T�heV���!!W+S�.�bE-����l������l4�O�H�=ڢ��4ޛӏr��AZ��Tfa��2^B�ח�����t�:����̝>�{�NQQ�[�KM�9U/s�yQ=L)��Sܣ
a\'�Eh�]�j\0��+��p��\"�e��ǉ?�\'�}**>C�t�g��
W(��t�Z�5�QgQ$�֣�\'��G�Hh�ƕU��K����X��ZN��Ĺ�wo��E%����1y9#���q�����#�b�Uj��$�N�(�l�!�_nl)��Tyf���\"ܤ;C��쒷k��=�bi<�n��#����G�ɿE�]_ڋ��$>\"\'��\\�6l)�����G�7	
q�$t�ho-��Zjm�(���i8�@���0����]�rL<��y���n�4_��m�~��OR�ʭR��q,��FnT�e5N��A�!�-��Iԛk+��]��4^]���y�v��Iw�h�ʖt\0�K�]˼�������-������Oœ�Q��:��D�J��~��&A�OP��8�����X�J�Q��ĩQU�TyU��\"�}X���&.e�N(�?��v���R%s)Sx�E5L�۟��^=�\"Q��*�1\'�>eDx�Qȋ`>��jx�9-Ij�q��Iu��|�;��ip���Rշ&ɽ��:��N�)p�V�\'Տ\"�SѦ�8B����:�
$�+u]?s�2nU$��e�\'�$�ۅ1S����j��jh�����8��gL_��h�Q��q�G)jN��n�bԊ���W)e%nVܸrn.����8��RE��9R��r���;�Sf�#�
����:��-�n|C��%�BI�bI�Tz�<{�RO�o��V�J����\0p���g�9n��8��˻}F�B��˕��I[��J$�$��^9��GN��OP�b�v��K���U.��a���\'��`��*<z����YKRZ��o�^�\'*w:����­8�׽�m�RgRA����qZ>��ᕾS�hhı���~��NF�\"��#��1�ժ=~BJC�K����W
���!Q+T�յU�e!M)&�$�9b��B�#�^�tuu=j�DW�-����I5Aڕ������:����������u]��t׎�udV��V�U���h�s�X���6Q��5nCW�D�˴o�M��2�<��Z�J�!%*uKУX5�mRoh��8�ڴt�}	�P*�Q{TxoOD�
�w�:6��]�es�H����ӕGh�[�\'�wdҴ�
�cE��~�c%�vc�O!�ؽ>~�t�\'���S��{7�~��{��Ͻ����Ϩd�]�������^/����zs-�n��Z�Wew�q�-���ng̈́ei<GM8^!��D�kT?&A|x���;rkk�ז7�0h
���)���O6&v=�٧*���{�in�\0�_[����
��,�\0s������ޔx�{���\0���\'NU������Nn�����Ыᴘ�5�d�H]��_����\0�v}��EX�|�[��&w�I���cQmf7G��o����\0�珙i����C�js}q�n���5������`�����\'�3�}����zm�ع��༮���=�ڏb]�e��=<�������<�<�\0���6�������\0��{�Ϻ�O��}���p�����+�~�ݟ��!�\0g\'��i�O�=�{���x뾾������V���Vv�:�=�����V��_~������k1�~�m�~������6��G~�M;�r���&N�벙z~���o�ΰS����y��io}���(p���q����_/��\0��ѐ��nU���[i���wz��6���I�O�<�w��T���e���̷	�X����\0�6��d����q�9�����B�ukI���F?�F�8럜��[�u���V�.�=޾�^��\0��{3^a�_������M�(lG�\0�\0�[��`�o�}��Ɠw=i��%��{�>__s��g��<���s�g�5��v?�4�K��o������|�{Fn��\0p�������ɢNa)�1����Vם�{�f�\0߱�|�k ���=��:�=Ztt�\0���5�6��t�0�zN�J�W����LݷWci������R�t��j/�25Kϝ�Sc7��49������\0r�z�z�{Y�ӈ|�O�7<ޜ�$�-�a�\'b���\0O���\0��\0�{YE���yt�~�z����?a���g��şS��\0��\0WΛ�i��l��({Y�͞��÷�I�����t�y���<8ߵ�Ft�u��Vwko�����\0KuX3�)]���ӳ[�-���{w���K�r�#��U����%���q���������Vz.���[9(�-I/c������3.��]�.�<~�7�\0}�}�t?\"����/6�������|�i�$�f,qt�.��i������6�\0�ޫ�������g͍��̏�i��V��\0�:bf(a����g������:p���P]��k_3|nIw�~����f��/���S����\0�f]<��;��|?P3mw�\0��皾6o��e���yGכ��~y��<�6�ֿ�y�����;�֜~��S��٫�r?���r��m�y��V�n�+*�r���bY�3Aȇ�\0��}H��<|}�\0��;�k��O_J�*��H�S�n�9��l�J��坜�7x7zr�k��n�\0��|?��\0�	�va����x1�\\�q�=w�Wo�˂L�p���\0��e��g��-x�\0����=�+��������^w~v�o��K����5�}xo�\0�Ͼ�����\\��W�]ӑS�1�Ξ:���/\'����\0U��\0�Ų���v�-��p���>�i��%�`\\�FG{�\0G����_�������)3f��l._�\0�p|��(f&b˖lo=�I��\\����!�s����\\y���?���������7 >��4�=bOG�����l�nk��4�y����_;O��̏��rs>	~Z���{���W���:\\�{��ӿw�>���[�7�\0�>o���uo�H���ó��*׶���������ׁgy5#
�2�k�N�=�����aO+
R;8w:f�_?��Phlq5���muc�������nm�\\�|���V�`l��o���q�K�\0&ֺ��+����7)w9�	�4�\0�\0���fq����lܪ⿿;Z�viw�o͢��l�ڶ�������������������	<p��ȿi���~�^�YPs��×E��]O[{/�?�a�s�3���v�\0�����t1���g����\0��Ak����\0:�Vw��ӻ�\0w�\0����m�׮s;�\0��?��2����_�i˝ʲ��4��\"3?w��vӬ�������[Қ�7��\0��\0�7��q��6ʜ����=r������\0������e�`���?��\0�d�~Ş��>����g��g��F��Loo�p�߬>cvN�����\0<7�N�͜S�{���^��\0z��_~�7�/�\0�������w�nu��L���
�·�&͢��s޾��Z������s�ݻ�~��&yj��\0�7����\0��|s��]�\0����\0��\0��\0�\0\'�v��;�����m������\0�����\0��|m�������}6�|w����C����L\\4�{��?�����K�xC���9���וx�9�����r��p�/N{pO�\07�N���rK�_	��Ç���~��n�_�/�{z׎!�\0���\\�����W�r����T����i6�\'�eDYN�b�����:ʯ�\0���{���\0i�d���vxk�ϋ��swN�z��O��:���y��r��þ�����u��h,#{ɪu�{��7�\0n�\0���J�yͿ��\0�[�_��D����8K&��c�X�t}������\0:9�7�u��\0�{=t�����׫�|�Hg���7w��&~ƍ�\0�#�\0������\0��\0��\0�8���\0pM���4�Cg�\0￯���\0��\0����ӝ.H���n)��������
\0 S\0\0\0�\0\0\0\0\0\0\0\0\00C�\0\0 \0 @\0@\0\0C2@\0\0\0\0\09\0\0\0�@\0D�\0\0\0\0\0\0 \0\0\0\0\0\0\0\0
�\0\0 `B\0\0H��E@@ @\0\0\0\0\0\0\0\0�\0\0�pI\0\0�(@@ �\"D\0\0\0\0\0�\0\0\0\0\0\0\0P\08H\0\0@�H\0\0$A�\0!@\0\0\0\0\0\0\0\0!\0\0E�\0H \0\0\0\0\0D�D\0\0\0\0\0\0\0�$\0D\0\0�\0@�\0\0\0\0\0\0\0\0\00\0\0 \0`�A\0\0`B\0DP
\0\0\0\0\0\0\0\0HC\0� �\0\0\0��$���\0*�\0\0\0\0\0\0\0\0 \0� \0#�\0Hr\00�c\0A C@\0�\0\0\0\0\0\0\0@A\0�\0A@\0 @�\0\0`0A\0�D\0\0\0\0\0\0\0Y�\0\0��\0\0QB�@���\0\0\0\0\0\0\0\0�C`�L\0@\0���@\0\0�2��\0\0 @\0\0\0\0\0\0\0\0I\"p� \0�\0(E�E\0 A\0\0\0\0\0\0\05�0b8�� �\0\0\0\0C\0\0\00�Q���\0\0\0\0\0\0\0��E\0��\0 �\04D @��  $#\0\0\0\0\0\0,��\0\0\0\0�\0\0�\0PA\0�P�@\0\0\0\0\0\0\0 @!Ð\0\0\0\0@ \0���\0\0\0\0\0\0\0\0 Q�\0�@\0\0\0�\0\0\0\0b\0�*@\0\0\0\0\0\0\0* \0\0@�@C\0\0� @�\0�\0r��\0\0\0\0\0\0\0\0\0�\0\0��AC�\0\0�H0�\0��\0\0\0\0\0\0  \0\0\0@<D�A\0��� $\0\0\0\0\0\0\0\0�\0\0\0@\0!\0�\0\0\0@\0(U�@\0\0\0\0\0\00\0�@\0\0	@$$��\0�\01�0�\0\0\0\0\0\0B\0\0\"\0\" \0F\0\"�\0 �� @\0\0\0\0\0 \0\0\0 d  �\0\0�\0�\0  \'Z\0@J\0\0\0\0(�@
H@h#�\0A\0��\0@\0\0�\0���\0��\0$\00�8Pb.V�@\0@\0�\0����
US�c�  ��Md��$�M���{�[�19EBZjy7 ��-�\"�d��Й�PB蛟�UǬ��.��F�±�Z���
�E��Xb�xS8\0鐢j�.i��.����&�ݸm6�`6�����W�OI��XOG���\"��7�d����oF)�|�\0���MW��$\"��+T$υ��0d�	�vqU���9y��CK�׳)#Ic��+�D�͒�&^.M�
���0�B�P!\0��1��1��qqQ��Č�-eHɗ�6r	\0�b���V\0@�
)I}�T2y��6
�·l�8���y(��C�r�5���ptM��B0���Uu��{᠟R�w��c��(�w����/j^���I�ӿ+��&��d�3�jݐ>��2��аsw����\0c9tw�\0���	�Ӛ%��2�(�m8%\"a��(ϵ;�1tHr�*Q\"���=0�v��!=0Sy߷
�����+(�
-v�Toh*��4{d�$��@�j=YD�2�f�V!FH�_H!�\0R��� Dd��V��c�\\9k�$\0f���qg*
��n;v�t����g��|~ڦ���md�1� U�L�y�\0���\0�.\0lE���,�\0�1��I�����	G�����+p����Y#\'�y&�ŭ�3�H2<�P@9�\0@(l��)�ߵ��H��8a��0����4�c�!��\"�j�}B�Z�z�J�-5H�.�[�8@�!�!�\0��O��������q��\0,�_QD$b�e��jx6ɨ�[T2
hvف���\0@(Z����䫲ݐdu�EHL3�V%��|��2�J�6�6�����Wd�^;����gs���h���;mXV��Aڀl�0gQ#����q0�m�*��@�U$:�����p-�_�Ćm�4v��#
(-��\0�����\0���n��Γ��ncs��NU������N���
 ��	{�7]�	~��\"��:��ƒ�w	W\\����<��ݿ\"OU,A�\0�\" ר�?I9�Pă#�UitY	g
o�wс��l��IZ��;��\'X�m�5y�r��䣆�6\"f\0D��#p;�2�?����m���=9g�q�a��J�8]z�@*�,���@(/�v+�f���eu�
Z�gH��9�ݬa�d
:��PY1�qh9������XIbMG)����$N�t�<Ě�Q��K$�p ������_�\"C���Lc=�a�#����9���e�B���\0yR)\\}\'�1\0���~���a����R��D��h�
�q
�qb0���,qS=l� ]jj&D���MO%+*�� �`|�����M����1�<A�+��#�O�#o��}��L�<.Q:�1�b �i͙�������.�26?Q��\'&*�Ht�����oi=\0�P�-�$�8,���c�hQx��7���ғΓ����D=m�1�q1^����P���,
D�9Vz���
;	?��wZ�zlR��O�*��Vs<�P�$HZ��g0G1�F\'�q
�q	k���i\0JQ��\"NV\"�HaWW�G��fx�7��\0�h�;m��\04I%0�.��s}`�;���l����Q��BM�v�5R��\0z��*[J��?,�\0)*F�+ƞgJ���!H��a*I 
�\'����aAUrG�^�eF��2T��m�m)�1{�΄g��y�QJH��ʐe�-��l�ɨ�
M}���Uȅ]��)�1�S�J\00��#+��a����uVDe#\\�U\'U�mc�;��E�!��+%-u�\0��2�k����U[�<n�z�$��\'��p<��\\E�:�

#��:�E�8(2�%�Fo���$�p#��1�qe�@��\0�����PE�.w�1���o��|�f��ͥDD����Ǩ�l�ĵ?!������$h�_\0P����2K%
�qn;v�Τx-�0P����H2YT+��t��#I~�\0J�J�d�1�P5�*�i�\0�$ \"�Β�@\0\0\0\0\0\0�A�
�>��Y>����oIW,v-T|���t�d2i\'¦i�o�6��E����u�^�Pm�O����Qx��7�^:�B��E�AȊ����ͧ$���?��(�Œ��@\0�\0 	s�W�g�JD�����*�P��Q2d>+[ܪV���f�)���[���EV�a�ƍ1B����#cH8� �5��Q�!�JR���X���N�OL�7��p��!6��a;3��C����s\0HB��e�PB�(HR��	
)�;��Rr�4�}�),^�Dx�R�\0<RH~��k+��M0�u���\\�jjb�TBx���\0̮��yi�m���\0n5ז��	O�Cu���_�b��^���G�ɶ6M��EP��9��c����x[�i���Kq�\"C�$(o���n��U�NA�t7Bf�\\�|%&x��W������O�t�2����&3ă#�:�0�cF������-�Ч|��f��v/�~\05]
e��\\��Z��w\'�VֵE\0��UE�5�k iu�Q�����E	����O�- �x�!͙ZrS�+���{4���*�n���T^RE�>$^���0+�v�zc�!X�-�3��7?pjV��\\���H���a�3i	@<%�|ŠH�@Ăd.�� E)\0*Е��#/���Т�W�9xJ�uI�IcF�ev�Z����e� 0i,�
(oWQ����t�2X��8�Q��\"F�\"ioL���(�M}�	o����h�q�pHB�G�d���2�1v��yu���ow�^6?�D��
���tOI��XeU�;��8��1ř|���B�b��a\0�\0@�W%��$���U�ւ�ʠcT�`p`:��d�-��
�X�����e�f�QA�^�c1��OT�{<�)7��D�N*��/��7ߐ�R��f3j���k|�C\0tA!�Q���c�/36��H��yH	�
�6a�0�ôG�
8����HT�6�\0�����g�a ��fx�dFp�R����b�G��3Y���
��Ǳ�\0w]����eY�����g��z���QCD�D6l��U������Pm	��3����&=�	�V��=��5B�yŰX���t�>��̮��$x���8�D�����D	�=
SWj�1��Z�bPF��dA��\0�������s�Q�.W�T�*�wS����{?��&��b�=�7��
o;��{}D��E\0	�w({|M��@����R��Y!�\\?��\0)\0\0\0\0\0\0\01\0!AQaq����� 0���@��\0?�<O��x%���*(��S�A��	Yܿ���BP�aܓ��*�9�e��0��ɲ9��r��&�&F��!sQ�hj�Se�v�7G���Y,����`�����=�\0$�d��(\"̢�y�3������&6;�,�xXV;���sͭ2�eP#�*�zS<�\0�d������|	\0I(\0\'i�Q$PH&h@�8�����#\"�
n�g��n�ߦU�E0T��0��g���N�5�WH��c��B�|���o��3AX��4�?i��\0�5�#��z���
�y�If�VW4.�����pm�6��Q��H�jF( ��{���(�
Vc|J�(�RIFT��;Cɱ�!�8=�>vJ٘�����|���}�\\���3Alalc4�KP��Y�Vn�cG�;�� L}�!�G����y*�S
,�A�L��M��\'з��!EUo/�C���z,�ӎc������ɱ0b����K��6��L�x�0�\0 �s	Ld	jMYA�a�!��������=�Q��ڠB���<WB���������j^��	�Oa8��%�Ɠ�%EG��ZP-o���HvN>�v����5��j=CC����絽��!�!�>DȤ�4���j�$��LI3Q|͵���u�9xr��{���<��&J���x�Z�\0���?���Wb������ �
l���h�8�\'L#s��L��#%��?\"
��q�?��uXAQ
��JM>gH!Y��%���B��FKX�,!��#xR.Q��� ���7��\0�o���c0��4
�iF�\"��DUWV)�9�\0Q&%p�m���us)�!�!�;CɉZQu66��w��F�Q\"�y�|앰%E�%h�qS�������	B�E���F��\0��0�9�9ŕ���u�;Oe>��
����?�!�!ž�\0�a �Vq\"
�H�.�gs9d*�EBO�<]}NM��P�3��0�Q���h9T_K�֟c�=-Qk�)Z횤4K.�|E6t��\0�I��	��\"��H_���X�Ȇ+��7�(���b�����X��]Uy�-;Aȴͯ��}[M�b��\\�X�(�_���,ت֦b�,b�\0˜��^l��O]��k�6�f��|Z�.�>� �B���:�@H�Y;�\0�H���y�@�t�:�[�	�){�o�ZUX/��d��o8�IF�/${�Z��v�a��[�za�hv������LI3�MZ�%D>e	Д�{c\'�&Ne��5�_dy�J���J�e�\'L!8w�6�>K��.\\E��\0
 ����b3ׄuI����mQ�=1�x�#ʹk��a�s��\0N�:s[Lh��2 \'2��&^�zΠ�%<��*I�_#k�2B�S��$S�(��n__ �CC���c�f��aȞ> �L�&��\0��(L�Q�%�&g6��ײ�9��W�r_�5<2�����-d��S���1_�\0\"fWI�c�T�<_��*5�Ƀ#�Q���w�=��Ð����\0*\0\0\0\0\0\0\0!1AQaq���������@ 0P��\0\0?�\0z�)��}���\0^+�A�� �	q��!E{~õ�\0�I	�P���І��dF�#2\'�#�&��1�\"r?����0p�EҌ��P-4�H�C�s��M�w���!P��)*�	�B\0HG\"��q8���o�%1�9m0���A(
M�^4���	�����iZ�;OX8H�rFԪ�c�3Α&I�$�`�NZJ@���a��Cַli�5~�!/����:#��*��_\0�Y�YMà�._����T0�d6
�Q�GF�G�AD�7����g��\0;�8��<�0��2�TSk�C����s�����T�A�mQP%�F$�O��8���D:�0xOA�a�ck)\\pp��ߦtAڪŦ��;^M���G��&vh7-�}���r���v?��\\�4�GGa�a�ٗ14ݞ]x;gE�F�j�կA�n���*f̟���j1o6d�)�L(N�,8�^�;������h��r$V�VA�)�T
��L�r:g��/FЄ��\'or�cc�\'߯�O�G�Wr���\0��4Ξ�3���R��x�}
��5k��{��
�z>4�\0��F��EPr-��X��޳1�z���za�e�%o��y�A�b���0G�\"P�WW<^�B��40�+�P�<o�0{͖�U؆_���i{YR7�j;���
H���٬DO1�6@�E��Cf�j�Yx�y��#&����r&
�%�L,���
:,�G�s�7!p.�kM�ݾ��jM���Q�5���[h��#�Nw3f�A��lYs�
7�~�*��Y��q���J>O�U�EX&zrg��PK=�C@f�cGoC��v.�\0�6p
����e���x\'yB_�P@e_LaI���+�\0��u��@�gF������^!�������Cw�F��v�U��7B<*ҫ�JZU� �pw��#,Va����G*���4E�h@��2�>8�!c���Ͱ���� ps� �{0�I���vC�҄Cs�M���?߇��ݩ\"8�Ӏ���\"��_�SҚ���Y|j?�Vn��+a0D.�>MF�dac-���$�6=��sɣ&�~t�P������^.)D~׬�~�b2vQ��f�
xo}� �Ɔ3�\\aH�����P�D�d{S�8{�[Tj��/l�Lő��w�6?
���J-r�t��J�[+����B/��0}=��)��\\��nb��
�,�5�R�)���h��1��39q[J1���-���ѿ�V���@|�Ib
�D�G��x#���cb�?�
�3�AW����1���}��v�&��*���J�a�)j�5��t�}7\"�04\"Ŗ�E��6;�\\���z:��!Z�A�nwH(2*n]v�Xa���P#c��v8Oƾ!���pi�ӝ?�żF�l�!F��hwɋȉ3�PhY�!<�5�|���J��l�I��|Ǝއ�E7?�pIu)�y��g��Џ_ñv����9��<w.�{��0�B���5���jIOF�T�c�
@��l�2*t��/�Ag�pj�k��q���h�JmJ:�,&����m�>�&_�����ס\0������lDoҀ�m<pQ()�\'t
�E[��IՖ��p���[O�o�uh��^�{H��B8/�DJE����sT���-���	V�u�|
��/��9L}xK�����8cjA�8�,>>��.˫�׌�p;�lf�{	�k�4v�10�=Ɋ\\��F�\"m&0`�O�=!��(�&4\"A6�\\�Ƃ8�&C��<w.��@�nh^hd?�=|4��������G�`SD�����P(��
&0n%Oy;A�Q�ݯ��C�yP�K���bA|YD3��A�[]�ǰ~�w�q�Gz%f��ȩ�C�nՏ(ѝ��~bI�t��,�x��@��Ǽ�=�^6��pV;Ȩ�\\v+02ʥcą��V��IK �, N3�G���:>!A��V��<\\[��`l(1�^wi$����K����I��q����\0Z�۵��?�kf������7m.�!�|\",}��C��0�6�I�1�蠸zP�N\0�*Z&k�lcD
�Ss�0<��ddcj�q��/X��Q۵�0�3y�$k�7pB��&�-����$wn�\"��VP�ppx9�Pݱ���6j�v��\0ת��S3+���`���w��c���Z`�]y����*�DI��ԑ��6���(�(_É��,�͓K�$����_�Wb�\0_�	1��@�*KL.D:yˠ�\\��\"��3�2�~���S��)�haK@���������o$��uP�!%k���H\\
L�f�Gh��E�����dzJ-�I6�!��k]�}ywrt�w�;�(�Gp��*u8+}p&\\��i�B�׾�	��z�9�i���2\\71��/B��b3��!{���\0M1ФL���A�����`��/I�a_AEʺ�F
�Z���91��{;���@䢻 �P�Av_�Qg��z���\0d鞅Ն_�F\"��y$7��?*�x��B`�\\G��a�C�r���X���vy!;1�7��e�>ף�HY�eǡNo��_��,�������.�9����a5_y!5�p�Mo1���:8�1�?��f���y1�]ӭ����I�{C��`8~�C\\l��V̜��G�!_�Vhu.�rmN��<F�ބ+b<�5�
;v����k�v�q�4�
�f��x�_�^C͍&FC�
��>(Ͽ��.QuS*�Ú\")=���1��!H͎��K�y�����O{�9$���\0/B�&5�
�w.�g��㈏0=K�Bµ6嬈�$߇\'�B��N4�H��ܖ3TR��9��d�f�װ��u�e�:V�Vr�U�?�b=-��!�̯Fk�4v�?�\\�z��n��D�>T>׳��V>�J;�J2����O�M��o����x�}!Z��!pB����5%cۈl!r�G��#8|%��r��(2�����r|����^���q���q�ʣ�k������B���

?I/�	&I7M�J36��!��G�x�G��,~���64Q�tF>o��{!�Y�e~�t`�}54X��XCs4z�4k�4v�0�na�t��(���i�~�y����*���i�~�y64�5�
;v���L������\\a-��p�W�����̔nU�w�0��H݅�8���q3wՒ��(�6�E�}u���;`�<�\"P��2ư��cbA��Z�b�+���!M�c83mǱ˿��ҹ�3���y�F�;h,��I�F�m�5|=�*�,��S#�;���+�j�!��f2��8�\\w�CI=��`�ܺ���4�qj.�кǈjF�)�P�
;v���L����7n���ݗS@k��^1m�?xC���D��XJ��W��B�E���«���Ć�`��s���%��A�(zM{0�`�O���ca�B�&�T�P��dO\"aⵣ㛼<i\"�LR���jHd�׆�~j]����G��\'%�L�3x�K��a͌!���𐆎O��t;�J��R1ّ�چ໚�@���a�ڏb*�R��V��\0�Z����SJ0J�3x!Z�����r�pz]Q����(�YF����\0aM?�R�
Mbi���
�\0U�͢/rx�1��I���ăP/>��h���ޡ����OƈЯ<X�>z��C���ܺ���Q۵�!����~5�
;v��x�_�^@�|ݮ0f�aGn������F��&G�2V.�d[Ґ��\0��,�6:��Y���%^�R#1����`q~��3�{B쁚���\\añv��[�A�xբ8oY�1�0a�ѱ��6��
,R���h�A��Ũ�2���A��4ɐ�!>��Ë�F;b�_��	�[�������5�3_0��k�8v.�\0�,]��l(��S}}7
�f��7�ҁ���L����i�~�y4�
�f���r���U�5�0<��dd0<��ddd<w.�,�۟v���\"p0�t3||9�
� �Ӓz�Վ=z~!�Wbv΋Z�*\'ݬ/����)i���U�J�����NB�7��+ǐ�C,�V�^�v�
�)�%p�F-t��k���ڵ����f��3�Z����;�@��?~�ñw�qc�`�\"�Rx7ٴk���A-d�y�H��G(�y\'��>$��JU��a:\'�%\'��-B���A��M�
;c�k�n, �/��Py;�ny;�� -�4
2���չڢ��}���
��6:D���Y�t �M�\"����)5��C������T�W4�8�r^�Tl\\6̆R���Sq؏��B����PP��rkO=����R�����d���7.�v�8���/���ǘ���}b9��0�\'��5VԄ~�Ey�V�<��Q�rKR0C����\0J����4�+9������4T�ύ���k��C��rʤ
���\0/�wCc�\'ߠ�垐�՜l�E��aր��s���\0ۉ�,}����s\'�Fb�N�P�?
�$���}
����z���<@gF,ɰ�>V��h<b�O��o@�]hQ��2WhE���-��m*�\'���:y��<W>�,oH�����M�PF���-��S?�s�J�k�Z�,Yw�n��,Z�\0ғRN@ċ�n�Z�pߛ��g�y!���8Z��A,+��T�����!�h`�������q�
K��+��sz0�2�H��G�ư*�,#��%��#O������
D�+>�
Y}^҄�a�#�TdMJ[+���1�����E�p�]��_�D�3�oQ���]ª��p��p˔A��EXzh�Ų�Y�pƓjE�\'P�o�3Ƞ��}:: �Q��ʑ-����F�S�@��ܮ4��4�t��ШȌ���so��1�\\>��(��v��@ߍ*��@�/���E��
(&_&���`���#]��
��[TD�=�L�5�
;v���r�E�5��;�B��-B�nf�FBF��Wr��Z:D�9s<\'�d���A�j��6�Y�����ؼˬ{O���.� iɷg�ڱ�m?7�ŨV�ȩ4�{J�}1\0�t��L��f-�*	��1��t��EGc�~��nJ�s�E\'�(l6h��׵p�M��?ǵK7������D:y��v.�m869	��P�\\W�&)~�\"�[`q}��<yL�T텃��p!O5s�	��tw@��O�f(�I��0p���\"\\�ǆ�w�d$�S4F�4SӒ#��G��X�v:�8���s��e��L�L1
8�ie��]P�T���E�yR�%�ÁbQ/�1�_�ů���
4&x*��a���*
�\0N�Tn���M��������h�O#͉ffa/��Q�W�4�
�v��x�_�\\Cs��
�?;!!�]�/	��\\WW  ��g!
��c�
;���3(�7�@t^�&���2��s��ӛ-� �]�5A&C�vp@P�|�uh6��I�L����j���+
�v���e����@��^�<a��T)+,�;Ta��r����N]�VI5�h^�ٺ�f\"�FY�1n<��,z������j�Mq�-�,�K���H(F&����s��4�@�ǆ�lluǑ�!���Fݿ��ltL��5CK�y��}��������#�S��(2q�[��p�]�t���W�fp�
�J�/r��a9��R5�5f[���
B�M�Q
�٩���[&�N�?Y4`T�[�{!��G�+�N�\0�9��c�E	3�8���3�^xI�.��tdL`��+4�^��
]o�Ȋƻ�<\0N�Q��ָ���������~7����u#ބᛱ!´*����v�y���aY�8m��c�S��m�:͟
IAE?i%n��4Y,��*�wc�(1!gE�<��`��Kv�+@�x^G�WVxP���~�2���Q2u���c�����<x�p��|E��}� �ݢ/����l����QX�Ú�E��A���$|��-��`�Q�є�4Pӯ_a�����A
�-�Պۿ�$�k\\��Q��n^y{�;�^� do[�Ʊ�!Qugr֏���kma�0f$r�<n���f��cG�oG@EH]����\0I�k���8�0s�� �͂S��ClkW�6jg�8w>�\0�k�v�q�\063W+!#AB4�=��g���8�G������謣aB�;���BSc�͗7f��Q���1�
ǎn%{c��8��סY�i�EE)/�Fɥ���
����#�!Ȉ\\��t-
���9
	.��4�H�2�=��J�O�`b��;�w�
3t����)�!E��\"u7H��(��.�AC����?U���7ZtCr��=��K��\"��W��BQ������΍�E\0�2*`���V���W�BEs!##x#IZ,hBa�ή���㉒�%2=��Y���)���\'#��`���H���������ւ���уˡ�N��kԂV��.([�b�n��v��Q:��Ȕ\\�.2驭�C��6zf+�{1�r���B)���od�VP�����Xbhwd����E��!B�\'\\��
n��Te%a�s�/7X�bnc_����4]�\\f��63W+c2Q���t\\�nB�\0�zC�i<fܱ5ᄼ7�ʣr��XȅZ~�#.M��E�y��{\"xq�����{!�b,\'w#��^�b������p��p���Ȩ@Cy�
�<2�fQ�h�\"���A�T����9g�*���9���<�����v��y�2�* ��J�>���Tx�\0�nM�>�Q�{2Do73�:0�ˎy��Ecu�71����.�]��A���n+���>#��m��v��?>���`0WJ#��l�uU�z1DZ!��4�?o������-\"�SF�ag�Z>@�|ݮ0�z�
pl��Hz�\"o6\'����PA2쾤$
���\0���;����)ށ��s�|<v;YҐ��q�f�{�K6���2��eׂ�`l��d��q���l\\z���3c����)�̷,�!>y�
L�/4�U��$��绫�q#e��c��
��d��������g!�E��S�Ǡ���\0g޻�(>jl)V�����@CC똰1��UG�`y�,��lcOUW]����ö�zPX	�t���(��������3M�
����XD�w/�J����b���@�D��M���Ξط<����6�wC�����D�xpp�}��7��U�8Uw�#�����.!���a�ØN%&\'��[��!T���S0f�cGoC�\0&ŭH�[��x�_�^CI4~SD�j�4g+� ����ȴO���U�o~6$_P�R�C9�]�6<?���T���A�gJ�|��ͽ��*�-��^F�h6)7!ᦩ?�!��(x<
��F�˒ƲL��T%����?DkP���S\\�r��<d����2�\'�]���U�5�0<��dd;a��ѯ�<hbP0��/A���n ؍�WM�O�K��f:��yA�;L/�ֻ�V����v�h{C�������Qu��fLX�\0��!Ɗa�FwkF
����A!��\'j4�&��_��{�IwP�f��4�<�����L06h�z�`���8NFx�$��&��/Ь8�W��?}���L�n����t�튭���@U�cN!���/�h&��B g�hq�[∵�51Q��*�y3�I�3Ù	_@bۧ↭(�Q�RÒx���\'�,�KQ�8�]:��a��?g�X1�ZN�yR��0�\0�������W��>����t���9,Ϋx�_�^B<��.�<w.��d<��t9���z���`����g~�R��B]�dK�J��L�u�;Ci�P�N�L>��c�a�Q��*[��;Gvj��P���\0�$�vx�U_�s.�7�N���u՚<
���S���{t�N�da�tJ�^ǡ����V̀������M�c94.�v
q�7�6\0+=M�Q�\"@��1��uq����f�7�ٙrx�!�^Y��������|Ǝކ��h��cA���s��%��!<4l�Ō��>h��^_\"݂�b��`͠�g&�\"
��ÍY/�ˡ�C�r�<��A��
p���TB���X�دf�\\�J�\0ޏ�-�0����ي1O��oA��\'��z�\\㠏_�ù��6U�{J���
a[_��@��q����ś�a�$?nʝqР�X��1B��s�ف��3v<p:�[a�>�j�����«�5��9��cc5r�4�_���na�«�3�J4��zp�]�l�_T=�vA�K�����Q�5�63W##\"PF��v+�$Mk
%�E]��n���po.o8��<��64�t�+Y�{\'�o����c�4��������T���l�Ǜ�����@�BB���!�* ����C�\"C4℄,�O�m��L��G�?�cb:�fY+��l��[v�R��8J����7K�N,��a(3���:DO�BZ�f*�H��uZ3WC�$n�
��p�]���鍠0�7�J�%.M�C�~ܼ���_���ܺ��G����-$���Q8��b�Ď���y�H�O�y��l�`��Ьa���@^MxK���<�u�ϙ\0Bf����H�2͇\'C
�FDς
^�ˡ�C��F\\�eG*F�b��}�\"��zs��[nN���E*`��3T���/��s��G.5�JŜ<���n��q<4���ߡj���P�
h�{��&�)^�X%p�rE����[��o�����A����L8����8Ș�O\" �O!ñv��N�rU��&��%��1�떓�l^�\'gF��֡8apa�3eԔlc1�Q����F�j�0��Q����1�
��=�vA��L[�5�ؓ�dO�Q�_����e�Y����l�2*���2��\'��+�rn��\"8^4
G柖�@;G<1�Jԧ-fQ�5C
��0�6=Ϟ�,/X���ƠZ��1{SᎭ^<\\w����Z\\[�6(�Ϥ����ǫ��B�c.nǅ0.==�a�ư������CJ1��QC˗b=|5>�8Ș�O!�t;�@�|ݮ0�ncc��p^b�\0�6J��dRač�یӤD��E��lz���h�0ՏA��=�5c�L�n�@�٣ʬLq����x�]<݇v�Sn��h5Ё���<to��َ߁�C�: aX٧_��fFs!��;��A�������[���0��9��	%��u�)\'������\0��������ĳ31�G�L�`���B�OP���o0�IwH�\'m �ڻ�5B��Ss�`��\\�T~��
\0�C��Xn�Xu�h��.$�p��x.xJ?9�����$8�����ö�zPvN>�N�@�d_���B7^{+�q#e��rW�#O��k�8v.�h��5XH��U�5�Ժ!��^����0�C��\"�Xp5
@�b���h/�K��0�7l=G,!�놛�L���V=�V;<��P�ܺ:y�����U�\".��o�C1��r����y�<��+`�8���q�/�V�S$�؟�6j�i!a&:,]����N��HV\\�lӁK	�]��E�\".?���D�A��s72�C
2��K�
dL�����7Z�
(�� ��]�CU�Z�W0�\\�81�Z���4I8����X^��nu�U��3G#�V�O�CO�H%�2OA祋O:pM�`y�,�����LP�I�=1D�юTƥ������
{�\'��@�G�1�����J?c\'<`��V��Q pI���w��A5y>���+F�-HÅc���ˣ_#s4z24�h!�2d}�\0X�0����װ`��6�8;��K�2�	
���0�%�j�	�%���<J
����^�dz�#\"{��H���c�Ŧ���&Z=D*��9%�#O��k�lf�FFD��|ٯ1��Y�1�D߫�qWW
P��0{
Ĭ-�5�8R���ۈ�uSnL�]�pr�0�0��K)��ۮ��#���9OD��U�a*Ǖ� �i�-F�A��o�9az����(U�>p�D�_��y>�Ɇ�z�?�v�\0\\�� o��f�1�C�B�Ό�DQ#n6�{�p�A��#8/�fC�]�N�����o\"�1lb��ҊI�Ú�D�[q�ڒ��FO��V���/���a#�s5s�H�(R��Lɠ�~��X`�<F�ڤ��h��`�|ٯ?⬎��H˿l���n�ؖ�5
\'.�Z�vj�a%�i�~�&&�q�?���,\"U�ϡ±����;�Y
�
V�5��2�>gT|0���8�6��3/�{��Z0���
�Ӟ�M�E!R{�Ѐ����#*7;�y
;�Q�s���l������4t��9��;����阬�b�ņ���&�Rx�}0�FK�����ˇZtA±���h��a�\'~�\"��66Y!�B/��#oڢ�+�G��O%���[Ŗ_廄mw�FHkъ9XI d�\"J
��TA�S�D5�-2�\0T�4���$�Iw�����i�5~� �-(c0�t]��cΓg�v�+�G4��t���´��ǈ\0$Fz�D���U\"0�P�7៓]��T����z���,�?G��`��m���^�O	��E��m5^���`�i�}�\0��neOރ\"GR�6a�R��0�͢�/%��;�\'����V�
�m
� �˓�G�Jm���1�V�TA�%���C����1Q��
�f^=���P&�S���F�g�;
������b�Z�����PS�Zb�Xx���C��O��9��<�MO���d�i��\"��}�?��?�Zv_�.��2avv���\\�G?xˡ��e��*�/t���M�M����_H�nkMl��ܺ,]� s*�
���Q�X��h�d��z�LĚ�A����=�B�9����툚���R0�����G�xW�d掼c̝�\0	�Mx]r\"��g��ƛ3�(����@J����z�<�5��c\0�\0\\��;���m79���U��~ }�;]���9S�5�> �}Y��Z%�cs��eU��� �O����[�Е�6��ѝ�T�ύ\'����l^�F�
%���O �Y.�:�f�F�f�������>ף����h�����<�\0��
�K�c��~/�x�}��(���k�4v�1�!#(0��
J&��l(ߏSW�(,Ϡ�EV�E�AS�:���OJ��C@͍��W
e��O��Zx����G@�+��N賋���cB��-ƪN��ٳN&Sk�`�4ܝ�QEqMў��`j�Z�L\\Pa��#3�R9��U������<F�ڥ�#O��k��n{���{k��
�{^F��j%�7h<0t�i�D��V�\'�#O���x�]�\"�E6?⫹t�;�B<�\0��	��l|4À�]�\0&	~n��������\'�ޅ�`�c;ي�;�S�e���2.а�9�ZtC���&ٞ���
��#O��k�2Whe���槴�MZ>�9���� �)��cv��c@�qȐötZ������ż}Ϡ�ػ
��]�`y�,��lf�FFD��<Փ�o����^b�|h�Q�i.)#������H4�������݆7,�����]�2�)�Ug�F+��P��ؓE�|b�`x�]�.��s�8v.��s�8�����<F�ڥ���8v.ǀ�喙u��^��˯��7ǋ�qr��������0���P����V���_B�#��f67��h)�ߴ
�v��z�
����*����|ة\0ƻ�c:�Ͷ4�fOZT(�ٶ�$_jy���������Q۵�$e�BM&���X����b�<W>��b�=��bU�tʦt���c(7�(x�}H��Bd�m�P�åAx�_�^_�x
C�a�PL\'�Hc��J�.2_�n�]4ٞ]h����2��-*5n��3��7�����$\0@ċ��� KLh���g�:�\"��^p�5fz+G������%�qOJc�8���L&[����\0�
X�p���̾�7xcF��;گ�i����p�~�p*���lb�fS
�s�FQD��ջ>�NlBVJ���}�葼\"���F�!W�����y~�FǮnq0f���[+sW}��FHѳ\"��t�Qd1�M��]�MXes�Y�=G�_E���ضjA�OpR�en����I�??L<:.78�\\mo��:y������G����+Qȍ\\y�E�
l��bra�u��@��ЇO?�2v%Ӗ��r�y\\[�t����N��`p�]�����,au��94��ք���m[��Ha��h(+Y���0nD�~��&�ذ�m9����8�鸍GT��j49�,ea#=Yu1�(�M:���$ֲ�y�f�Ԟ0���r| f�aGlט�K�%�`|_�t �]���x�S(��|h$1��x
L�ƽ���������J��D��-exB��pҟO{�!�N��P�n�t���˱�Ǜ}��h]���˰���p�]�\01a\"4��e��b�
��Չ�d?uH$k?���O�BAg���o���t��T�`BOI�&�a2~	���(T����(�!f^�p`i��H�B!��=bɈ\\�ꚏ�8H������)���󽍚�L�aU؇D��u���U����طN[��`í)-��A�h�qC�_���Mz�d���<��$f �ڐWo�՗�~�����y �I1��\" ���l$
�4�}\"�!�T����9�y������c4{�H�(#O���
�������װ����\0�u�=�vCc5r�48��\"�3�Z��\0鬺�+��
�k�%0��ǹME��ZR�>�욍�|���h�����-�;%i�A
��1j�x#�_A�zM��1/*�6���������Ј~�\0:؛��W�Ub��d\"�[�b%_���*9Řp�*�L����Z�y35d����
��H����cu�_������V��H8�~�63W+!#@��AU؅�}i�~�q��Б��
RL�/b�ͭ
~M�\0����KWcf��N;d�b<j+sZeF�1~6Fl�����<�l���V=�u������F9C;B�
��/��uÔ�/e9�sv��+�4c~�l�_T@?E<1Ae�jkه�h����c(7�/��Q��S�nGI�������FY�/��Z礨�OQ���P�0�?���K�H0���~�	Ƿ�ȩ_���р��3���=��p�!��sU �z�-i1�fo�(��\"<������-0�-JCs5s�H�(�}��70���Y=�2�a�B��f^#͉ffb�7~2,���Q�W�d�z�=�핵w�j�Q˙k�0�F����+A��Pw;�7���~73��d���;A�8bt�g$�#�\0��L�(��9I��aO+s7�T����\"�6�):��Sn\"w��Ol��nw���v΋Z�3��J���T~F�fz����#(p<����E�X�����b����s�V�C˳�M��ͭv(ud�+`̻�{
b�IC�{1����Vq?#
e���D�[�]pr~#����IH�\0���H�,�t��c*�8N Θa�� ڧ�O
�����������uJ�c4{�H�(C{K/O��^�*����ڪ�F�Q!8m��\"����*���4�p��2�5���5�;z��|ݮ1�ϢO#c��+����D8��=]\\0qX�Z���l0�dC%{6���Ԫ��P���������R㰣�m�A���y������Ȕ[��F�!W��E61�^Su���6bC�g�=|Wr�\0�5��
t�M��.�\'��1���d� ����	^��h��������ؖ^9� �2*��i�~�q+.�F���~�cA����^`�������xP��Nu�4�
�v����쮪m�=�_����^bf]55��G����ĳ31��ĳ30fj����%1�\"-i뙇�+x��p#�G?��s�����Y	[�<�&��N9�h��,Dm����
�~/j�gk>p ��7���9-�7
1(�x`qs�`y�,��?��ؘײ&߃co��1�pV���|ٯ1��Ƭ72���/����?�aČ�ۏ7� ��T��Q۵�Í[/�%��bƙ�PO}q����0.��\0+�2�L��q�e��ñv0gj�4��j� af)yQ9eYT��U�-8��F�HT�}���Qw�縧�L^��y�~�<y`ATo,`:��e��L�@��y��U�r��5�;z��e�נ�����2z�Da��W�h�M����*St����·b���L�(�S2��$�[)�?C�C\\��a������X�^D�f�}�=���P�ػ��e�����fj�}�xF�gk�j0�@Cm����ހ�|ٯ?⫹c����nG��.��Ƣ�|5�6T	?[ɦ-��3_0��k�\"��O!����aČ�ۇ���fAMO5]�<�1�v������Ȕ\\�m�]�Pe�՘D$G���\"�x��������[%�_%�]��jf9czE����}�F;%i�C
�*�	V�/��T��be�G<���sN�3�r���0�]S��N1/��`���S�n��X��Z����>=-�a`[�9�N�I�֗�jT;�5�:?��\0���P�ػh}��͉ff��A��(���B�**��CtO��)�c��>4��\'��A��ĳ30f�aGlטUv!G�Q����:^��b��~8~
#��DՑ��0G� ���0OSGǾX3eЙq�M����Go�\\«�Wri�5~�!�E�}�a����
\"�P��-���؎]�H��p�/�6CЬ��u	1��؊�l�.�CB����oɊ����A0*.�/`ܧ3��w�]�^A\"�e�T2Whe���6�,5���&�kƢ�Es
%�c|�A�;��7�
bH?Ό�|3>�<�WrIKX\\��r�>׳�<W>��Q�*�8N?�WbaČ���\00�\\=��t��8�\"���=|\\�,}�x�]�����\\����ϳ�@o�A�g�F&
�4�=\"�\0�Ty�6Й�AZ22��<	��FcRQQ#�A��w�F������\0lfъ��Y���*�pd8��D��M�xO����]E�&�n;�c�n:�c�c[3�׈U9%�X
��E�~DxE�lR2�?����~����a�a\'��h��u\'�Q��|�cdA���|ƎڦL�=�O��s����C
��Z�e@`��k�v�q�Wr�����Ѓ�b���8�M;i�5~� ­vju@J�y�8�|��]�9+�r5�g\'C�ʬ���*�H��\\\\���y���`y����Dߵ|S���*(0�n��cV�����i�nN~jWhp�=q��x2�\"+$��l� ����e��XH�$*���:�=�+���!7C��v0�\0o�o�]�C&�W��q�����2��+�A��\0��$�E�#Bb;�vw�±��\0&k�v�y��8F��\'5
V�m;rM�l7<��o�eѯ��W�����ܺ
Ui�}Eޣ=_.5`�t�\0z�{�4(���G�h�Y�
��Q��J�\"a;�VE�^R����b4��2�_Enc�ծ�&�TC���z��ҝbQ~�����+�Uv/�wl���]f�G;xK�f�aGn���҄AU܅��(�](���C��d��;mPH%����D9s}���|8�B#:G���ݒAb��p�]�t�L�=�A��=�$k�a��~	F��쮪7#T��L\\E$��W0��G����I?���+�!���N�U0���d��f�aGlטx�!oE�}mZ��n�C�r���ػ�\0���z��n�|a:W��;b���M��.��ötZ�{Z�FJK%>Q��suK�.& d#�
ߟ�h�CB���B��&ga(c5��6w.�g-GW�^�6`�ܺ�0.��5�;z�\"�4��X�SM��׀E60��A±��Uv/��\\a�añw�sR迆&Y��\'�G����B<�\0tF.��#�\"���|ٯ1#�+|���O�G��zD4;k���;(T�rR2n���Uv ��A��76�m�C��&zn#`[��I�<w.�����a��Ԍ*�aX҉��Q�D:�*V- ���x`y����<w.��ˠ�ػ�4�I6:k��\0πa��_���O�C��kQ���L6�@�Z>}A�>��IjF+�_ʇ��4��d�t���$��,a�Ϣ0M��d�c(7�(R�h���a<n���D6,���H ��SY}�kd؂<�5�
;v�Åc��u�k��6>\"}���q�s5s�jנzɽQx�p�}�\0�@ᛱ#�0<w.�x�_�^B�~6~-��EE������_�t��sc���*��d��b��F[YD�W�-���W���2_n��*����[��F�#W�R����z��6�=�$��64�5�
;v���e�W.�=ǣ�(̍ȾLy�vܮ\\� ��c��C��D;ǎ��p�]�ZvA�����\0h0<��dd+މC�k،�z__�Ss7!���Є�;Oc��Y���x�]� ��\\�����g��0)(#X0�IjG�3_0��k���ػli22ϡ��4ɐ�8���Ё���x�\0���3_0��k�<Yp�]���aU܁����\\`�|ݮ?��po4O��s�<w.��� {��%��\0�����U����:k7�I=Tb&_V����D\\�Ap*��O!ñw�#O���ScVܮ��*����4ىxM��tz,^����3��/L&ɏ��٫Q�+Wd\'Ê�c�`p�ڱ�(J�xw\0��u�5±�;b��D�C�c�\\l����������T��yb�a��Ԍa��ԏ��X�����7�҂g�S�:�5dYj��ػ
;v��\0�˯�)��64�3�J���4�
�v��
!`��|
R�gaE=���գS���5D�4�ȑ�`d%qU����ػ����_�F��֠�d�߈05��8e��T���w�����V�����^a�rc�hC�8�.�j�,no�����8̱��+�@�ܺ�`y����aҠ�d��\0�&2d��Ёx�_�^_�>�\0�����ػ�\0�5�;z�9%��9%��=|�eN��nR�\0�Ն����\'�	c\"Ѧ���;c5r�4*�ֺ���la��F��Z��
��:%K�AU؆�\0;�C
��������l�M|�Fɥ���t;aU܅��i�5~�!<w.��b�`lg�DKζ�A��
��7\"����	�-�����|6ō!���ˡ��~\'���\\���F��\0I�k�s�F�#W�B;�M�E���=�A�K�����C��E�#O��k�`y�����LyK/����\0����a#\\��(��Kj���QI=�s�-\'��5�Y����<?�bD0��)��Wr����T8���|Ǝކ;�B�>�x���*�����M�����T���Z���X��ç���r�_��F�!W�אx�]Sc�����=|3�J���������k��LMk_���\'�w�LX\"��,����OFݿ�<�K���\"�3_0��k�C���ˣ_ �<B�ݮ!scv΋Z�t�\\�[�x#O��k�a�L��l��̀H��%i�\0;a��{Y6#͍&F_�Wr-���$�؁�|��]��2.;�5Y\'\"/\'�����<B�ٯ/�b��f�cGoC~Q��vA��1�����~)�t=�|�a_C&���_�x�_�H<W>�:y��f�FFD��5�;z{C��ǐ�F�!W��p�]�\0\\;�5�
;v�������g���j�d$i��02�8���","","","false","","","","Not Verifi","Active","1","","0");
INSERT INTO login_credentials VALUES("2021-00001","Lisandra Arachnid","1234","Student","�PNG

\0\0\0
G<��Wr�i���=���˥��bƬ�_WE�}5�K����s��!��!���J�&q����S��F`zf\0����X`4���\'.%)!�KARJ*��J)RR���$���	��V\"��̣�-�@�rƒ����������[k�֐���1�^j�-�`%�/峾Q/T�����9�	1����r�G�`�����5-��(��S�J�\\�z>����bAZJj����hP�j�Ѡ��S���R��$!$�B
!dtg��Y�[�s�����otХU1��km>\"��1�MkѪCզ5�:�%i7�N�1���z`��Ѹ1����
!\"�L�>VY� Y_��7X���5O��>Xm�
zB�Zm�h�iӚ
:6�~��!�7!F�͍-HN\03�rj���p`.���br,ΌX��~\\��}j�~Dn�����f7�ɛ�F�\\�R�P�x��Z��1�n
C�rP�/
rEP`c/���\'a�{2�!�77�l��!�Q0�
n�@_�S�����_���(=@\\�3�y����ہ�))�O�[2if�v��	%��%�\\Tx�NDGl�������\0�r��5@_7�_\0ۥ�y�X��|N=�ϳ)�Ia���\\���lJ1B|;Fo�D?kN\0��与B�8c��}|!��� ��;�f��K)%�+=��� 6۠�[.f
��ۗ������Fb};Fo��DSja��b����q~�=�)� �2�}_xB���$�H\\�0a�8R�tD��z6�x
�mt�,�9�5%�O ��KFD��ї���Ek�4��\\V=W(Z�ȓ�&�f���J��)yۂ�ޫ#x}��A� �����|���A	)�5�d�T��K�
%e�ZU����[Ԇ���hGl�V�x5$,U�,5�
��k����ld6r-��%� ��Io����#6Q��:����vM�EٌZ�����{7�����yw��|�M��ǎ���ά�w㏮�hܔ�~h�1ǘ9
�_*e�x1�@���Ar}Q�v�WA��R5�R5�R=�P;͒cI�[�U��b�e�*�*�.
�yGD�Z��d�(�!H��3���M~%�8:��l�i���{�֔�XA��zg�B���\\P��0�Ȋ�68�}�}Y���WSjj9���<���2����gt��F��&�����Y������{c�Ϣ�M$&v
����s20nz<����=��Fy�h��Z�WT��Q�|st\0;L3�@Mz�%�d�׀�r�X2��F]��!�
⵶��ȣ����#1;P�E�;]p�Wq�TѺ�����si�]���h��B���h��i��r�t��[�F�@�,F^��n+��_��N!IWr@�¾P(��2��\'s���ax2pSJ��rZ�8B|�/F��E��6���^(�ڞ�\\ѰK\"���z�xR�R��q�}�w��P1g-m~D��Ly����сpdPt���AE볒�e�����5�b��OG�Q��0Ad�)Y~���-�k�5g�e{�nC�W[��.���?/
��Kr��i�ǫ,�1�<KD:d�WA�˹�
L�I�w)9jG\\R�e�n�Hփ���&�5�d���0��B��j�Y��Oov\\��[:ˮv�e��C*�Z��g��QqLq���p����E��	~L�R[�QU��L��7�}xF�Á��J�<���Q������v���PDD7���~cO������

���hK��ҽJ�%OFXS��S���8�ye%����P�������T�%���]S7�8b�$�n�~�!��G]�\\��79��n���!a��TQ�,F�k�
6>&Yq�Ba��1��{+�x�\"�����0P��3ƐR~���=)�Ϯ������#�ԗ�Z_-:b�
���Bd���k��Cc#ˬ�PR;#d�BͲ��cd5��K2��0�\0M��s\"��VQv��Lm�����\\�6�,ظX����?:W!�U�.�Q�▷���ZK��%,�8-F����&j\\�6QoI�Cz��r���e��kn�~
|)$Viy�7>K�n?ր�iU�f
����L��9��Nψ�U�M���Zr���a��5�Ӝ��owD��.\'�UG���E�V�%����!�d	zĖ��>nm�*A�lK�<�ڻ%~�Avmϻ���ɢvp9lD�%-�_a��n��$�\0�\0)\"���K6}��X
\'c�Y�J���&�K\"ik��*��I��Gv�Z�VĈ�74J[�Ɵ���X��a��}U5$�T�Ơض7�PP�i�if}PS쁖\'%|ףe�tbܸ#�]>��q�f�	?e���1��V�.�u���lm�\"\\�HҽZR?��0ϰ��>��}`��(�=k
BA�
�+,�������V��IGh��r�1r�mSt�c�����Z�t�q�p�N��󝐠;��\"_(X~�b]�]F�荨E׿���[҃X������XM��,N�
��8b�Sn$З�K��4��d7
�>���c\\��8w����e�IL�����#�^|������?-d�A�}ʅ��ǵ�ѽ����]5?!����}�\'�,�������M��iƹ�%\"}����/���dLW��ڏ�qO
vù����a�-�a
�;�#�r�ɵ����J/g��>m+J.���d7
�b�7yT��%,��ԣi��n�a�k������R�v��f\'��=5/_���F�J�ZA�R� 5�ҳN,��N6ҽZ��c�K�m�,e=���jGY��گ��
:^rqę\'��V��u�3C��M��9>����3֒�rde�71��߶�Vl���B,��\"����d\\oĥu(ݢ:.�g{���&ϟ�Ն&�0]�e�0��#A�p:f�+,f((B�4�k���=�L?NS��E��22���u�[;�X=�qX�>u�U;�eMڀ�.�� GCń(���-��`�M�NF3X�Z����O�Xq��+i�l���lZ\"�\\�,�0箱_aI����r�Ș#�1{f�	s�ĥ���v���fu�r����K�-��f������t����S�+n?5%\"Sߡ���!�����3P3հ�Y!~�����}r-���L���\"{# �P��[���������ɔ����*�Ñ��d˩����?/s��d���ԙj�+gaE�r��	��.^�Wz�ֹ��M�(�b��Fv��(�hge,�A1��!
�	鈨����i�*�Iк�	p7�ʙҕ��e�Q�v6���ʮր��\'�Vܬh�g�|��?P.��+`����I&����?#�R��U�q��τ$j-�����Q,p�4�a=��s���\0�}���{�3^��5Ñ��p�6������V�ZD/���|ܝ��;�m�/=6<\"Yy�r���8J��pIk\\��v��jX��$��/<`B�.�ƣj�e��$\\�ۦ�M��rJ����a�I�0K.�Ȭw�Q��9�g�-��{^����-o#�V%_���j!���Z�Ay�Om�pW��Nȇ�=�����2�)@W@�KB�k=��6|Ge���[r{�$��
g���.��ǘ�
�Vw�,��4ζ9�tt�w����c0�-u�U���Jjk�V	�P�X��ץ�$���a���dpqA���9t�M(��j��4s�[���Mv�^�w��I\']�����WzN�3k���\'�꫍��/[[������Bc~����/&-<@�|�n�3%�/�7��nX�8Q�n��c�3�9A�r����C1n����[\\\\�����NWMQ.	����lzLR9Ѱӻ��ӑ���-Ȭs��S��e�u�ݢ��<���b�a�B��=
�p�TBHRJR!$UJ�����TJI�T$� %d���!��<װt�}?=�������|TfPc�0�dW�gBW
!\\ͨ�r�;U���ĥ�=��Ǘ
���_���pBD�=0�C!�zK�Y�i��5���������H�?\"m-]�ЮC6���A�� �#鲚�V��۰���BB�m 4[u��@�T�y>
˼υ��\\H��	_o?-6��d(�����\0��Ь5k������E����Ys��������*㨔�J�Ȥ�L�O\"�@�<dRaCqU\'���1=E���\"1��0�[�E��]ѹ�w�a�H�S�\\�H�j�4�cL�ǘ����4y�B!��h���a`�B+t:׷v��r�J���t-�ыi�D�	������cx�W>�}�4�W�� �
�����=�;N�Yv�\"Q�K���:�������?{<t�r���T������=�����!���P~��%bzoe�S�Nz��0�m�X���
^��Y�{H�q�I��~MU�D�}D�O�r��ba�ߔ@x
�(��N��M�v��c��R$�4��р�I�������ָ��b�͆�L�Y@w:r��rЕ��h��S�q��L���<R:�5e����O(���h���C���^���(d�i�/H�}o�\\���JI������\0�<z��#?�I4�~]b��i�����\0/	�Zx�o�;N���l�F+F�����=�������Oh���(��I�Jx
\'=��
�<W(�t6˪b�\\i���ߐ\"�T�ߐ«O\"*㈘DH��Z7)�$F��G�I�\'1=�/��{����m]����a���Lz$v�#1���٢�Z�O�(.*K�-�
k���J֛�2�m�3GB�wI��=�n��r;�Fתך�R��Ѐ���N����Ki?}16����Q�\'� �>&�Q�n����GG~	htG�pC��N�k� �ȾN*�R�L1;\'%%�(�ۮ�/���?.�7�câhJ�@/��\\t�U�i���]�X���?(���
h�;�R�rV�(=ُ��+l�>E�t$��ԱBgT۩\\\0�o�s�Y��}1��sVݮ�ჱ-�v�H�fM�M-<z��
�����_��&�Wa9��\0�\\;�uH���O�ZA�zK��`�V�u����`08f�`/lm6��s*&嗋Ɯϛ���*��-pm\\�]N�o�����D��y�
��������,\0~Sջ6�O�E&<l���RP���ۉ%�1��:h[�����|�C���\'ư�^�� �R�	�dLy��}	MJ�$)Q,����<<���h���@��٬a��\"c-,�%͂_N㬳&��?m�Wl��_�D��=�H�l@�c���a���X~6p�$��M��4��\"��FV���O���]SY;�i)\'�!�G4ֺ��;[:_�5��^��-I��q�U볒��
|�
2��Ɠ㴿$��.��1��������B�0��;�I�oF���
��ClR5������,]��ķ���k)l�\0p`E%�TT2����J|���ba������<�]�g��2�e)�櫗�����	��ǳ>�9��x�ky�in跟v��Z�2�4@Ơ�Y�u\'�	zr\0QI��a/l٤���<_����7�	OZ	�Gk�N�o�J���!�<	�tq��-���H�8W���O=_0p�OY�
±��[��Y�c�u�\\��`���7*�Đ���*.%Ky�����|⊪�ƒ�e\"�m;����I_�6k�h[�������Q|��]|��5aD&%�SJ��x��.N;�ey���[���<Ճ�{Aȅ^ȇ?�a��\"J�o�Z�R���Z��r9
�B9�g���<^~�e��k/�E7�\"-y��u����45�\\v�4�u\\=:k��
���Z�a��c��������R>Rh����~���	��vN݀p��	#	L:�1�MU:���t�5�]���	@jF=��ƣ�NVb���P�+�䗵���&����GF�61cvBK��`�-[t�FV]��X����k��W��K�?w
���?b)��Ձ�I�����QUUU��I)	Ðɓ\'s�u�Q]]͏~�#���J��x9�\'��P(�r�J�b��eK�|]����1��>��9?�D�Xg핎�A�ƒHJdZ��p�um\\��<�hP�vsq>Q�tz�b)�>����2�;rd�\'�L3XˌD��W�2#\'g�����4�S�1tn@�ν�W�.���>�M��K�[ܽ�Ǚ!�)�hh^p�;��k�ov�EFm�u�o3d7���o�	𴁔<Sț�Z6IOk�����;�L�纟��9�g~2�R}��[;��)ܗ�W�!���_��{�IK�[��f�e����Pn|�:�A���6��e�Zu��s�_{��\0�>E�^��Ձ6.�8���`�����s��|,ǿ���q1ȹ��5�,�l��x<���ϟ�����#k��)̘�&��������2��A��	&�d�������?�%�\\2�%������{we�=���T����2�)�eO����f
z�����*�YYM\\����b̂�نC/qu�ֺ��w~�g�bI�f��5�B����]?��*��٣�znv�@^��6g��7D����X��p����@��\\��������mh�\'ف]��]^�ZA\0�jr�:�K|�����!�F!�.�j�a�>St_���(�]�����.�A�	����?/r���-|�$�Թ���)���O�\\ؼ��a@��c�}��iu؂Ɔ�|�y�Pq�m��~�26^��G�r��4W��l�w7>����V)2-��K���ZCK�B!��ܟ�f������.�h\'n�j3�&�iP�.�} �D)U��})%�x��}����˖\\�PJ��Bb����r�-�P]�x�	��O�Hg�&U�Ed���%V��l[@P�uT-���~p>�~z4��i��3l��s/���@&�7��[����j�Ʌ�c+�~�,*��pCW\'?k�Ȋb�*)5L�ZK�K���c�-!]+������5���ҭ��p���}�1�sW�>����͐Y��[)(*�����5)�l[�9��P��WV{{$�:�������kU����f!<%�d���b�)�����d��&�5.n�i���c�ۅ��~0���\\3e)��DCm�@�agK�sq6����W���_)%/�i�ȭݝ��Կg6�&���5a�)��d�C*A���
�	�wU�`!��j�3�xS�
�i��5=]�5��\\�x2�[?��x	��0j7SNr��\\0�#Kw}!�]���\\�������W���w�E׺ �d�r�Fz��AE�r1t�X�Gj��h�7�1���LԃC���\0P���ɡ�8��*�=�T3xF�/ܰ7����hAR1�͓�u�&��L{��!4�a@��$w��oS�s[`��K�
��a����FZ�
��*-�\\0�H7���s<��e�/�������!��ղ_y���*�dyP��-�.�7UPy��QiL>r��v��L��ޔ��M�s��GVç>9��]K�Rv��~n���0��+Z[~�������H)�৓9��c�@�G����I[R���&N:���38�M�4�G}����a��nɄ��{�1gn�|Vo�X�}�_�q��|���x��?u,?��D��=�!R�A�#%��Jz>`��~��
����t;D7��	�bҕ,�0vC�������P��ʥ��{|%dϳB򭮦�K�^��B�r���Xv���SJ�­%�,���y�y���I�;0��IUvd�S����Rh��������e��\0*j����8�6���M#���O��ێ料����im��h*vn\"��x�x���Jn�Ș�&X�I�⍘��T��}\'�ⓟ\\?7��ᬺ��{8�K/s��]����>�9�#��X��B�}AsK�n�=��ME�z}�����Z~�\\���̜����w!ș-�e�L�G�K���g�a�NI.��NrD-AgH��2J1�dZ�/X����v����W!�pz�u����Z�er�̢5�,^�����\\U�n�Ƞ�y	�g���PH�*��gz��I�ZX��0G���N�����^���b�.F��ɳq����)	��H6�ϡ�/
��ܔ�����HK�a;�>d�v�])>�E�c�?��
z��XfNO���O�ߟ��uq���H�z����RF6��+��yS��]�z�R�<c
�n�]�TK�Ζ���p-�
Q$\"�r�j�|�0�@��(R3�R��R���0�v��K�[����XC��w��_�-w4)�Ы��q�i��~�26^�$=�娅i���Y<p�|N��X�k=2-���~�dD_���.��Zv��1��Λʭ��eάTov+n�-�Z��/���wu��s��˧�������K�Rj�\'?��;�SO�S#%\\���X����΢�u��֞�?=o*�ܺR�!G-�˧/��aY{��o��2�6���m�\\u�\\�g���h���h��3��ǳ��\\�4黕������B��U�ErR
ĉ5�\")������!I���aG��I��%�c�r�\'���_oh\"�^խ�L��=%d������U��6hY*Y}�d���\\+�+�KQ��f��]sй�������F��!$�RL#c��7�|.OrB5G��zՕ�u��s
BC�����6`��sǽ��O~l�_	�����vT�X��Oe��˸��=���>�9�
�~u�z�8k����d>��1H%�t���<�%Y����<�M���؃�3\'E!k��w,���ʤW\"��\'�t�R*++9묳8��s˄\'��ZK*)���Y���\\�F*Q�}�₃}�\'�ΰ���L�����[%j�-�/�m��=��q|�[IU(2�6�HJ��ZH&$\"�h�P�׶q�ky�,�H�>���5�h\0Q�8�tsz3���積H)�pM��+���J����z�g������h~B��Iz� u�y����Y��e��g%c�1���+n�����@��Q�V�]���n���J�!Y�����J^���c���	յ�ۘCB:�{�����X,���oT��K�mv&|�$���5c��TNpJ��I��#�XU$1�܀|�{;~i����|�}���މ�ȮMk.hkfM�@�cI�3޽ݵ�H
_�y��y2�6���?���$����\\M��ַ�XJV]��s�Uw�,<���ϟ�λW��1�n��В������\'^��L�ߚ@�9@HA,!����ȥ��R��/	�sg��$�r�T�%K���/Fݑ�1c���|�cMd��~�9�-�J�SOd�������o�K�g�����.��^Ź�e֌��jZ�����ێ�%^��ح���.��z����5q�VO�nMx�+0���!�̃k�yt-�PM=GWT�5����$����^�Nq��c�S�f5�ຫTM��yV���jTܲ�6�#�x���Gk^��ǭ���+os����B^�ײI�֞�h��(�\'\01�k�&�������B���l�Hk�h��R�{���ҿ��ő�m�K>��d������פ�X
��/�x�\"���b�l��
��-�]�֜߶�u�\"U{�\'�ϸh������]O6S|f#\0���ӟ�;�VG�Zd��A!
�8��\0��l=g|e9Z[���>��1xQ�`�Y}ۉ4��47�]�8�&�y�y���!\\�F����s��gxyy�_/����{���)|�K��i�$:0T4����V����O�s_G��\"�7<{��ۋW)�O��/-�s����7&��t֞�.n+�/J	��
�e��=�����m�#k����=��O�F�{��G��
�ے�
������$׿?�z���P*�)t��S4�}? ^cy�\"����{��JjJZ>`����6���[[x1��r�1����(Px���s-����:1_0��#_�.>[$\"�3��,��|�Dx��Rܺ1OP_��ɘr_�~�XԲI1p)�����	eՕ����/Y9���XZ�BW�sUZQU%���ê�(��x���[��XD��j6ܵ�����^����L������/���֦W
e�EH�鴢�S�q�$fԓ�?����Ck�Y�%%��5�g2�PMo��k��6I�R��.��:����.�OZVޮx�l���
�5�:��cx�ߊ�,�0�c�~��J�����i��Z��{<����,�6m`MPli�y-��t�_k�⍞Z&]���)?�O��̊\'dv+���F��t������z��t�%�]K�D�e�o��=%d�풵���W��k�6J�������Mj�	�)Y^]��&�Llɪ2��Б@l�R�ߖN~8U)՞�D.UO�2�����a�N������-=�=ڹ�U�U�hm��.q��װ�PmO�w�V�
��ʣ��jw\\��Qļτ�����	���G��y�_j�=�$���=�)9\'����s��&��N
+x�����\0��}ra��C*��8?�z��~��}���t�,���0���M���*�H<�FpjsO_�1�pCӞ�q�V�<�ξ�H�߻;������jROv5��P�܋���,Օ5�שּ���m^ť�J���$\'4�c@l1$��DL&���~�����G��n���*\\<o챆���d7
���S���f%7�B���WZ�ߠ\\��j��|;�Ͱ��̀����������(/7�K\"�SU�_(�k�(~��y��7��\0�a����#ӕz���k��j����‟f���6�껥�8��k�E���9��},M{j�ߴ��_��uk��:;�צ�8bj�q�k)$Z�y���y�]hm�m�G0���uH<��������\"<ϋ��j*���)�v]���pF]c�<��h7,j����.�X}�b�n&���m6P�a;�3��{�%G��\"��9Y��W��X�VH��㹿�Q��:�-�/5�O�ɔY��|0��f�`)����F�t�ir�9����yް���vo�g��1�(��C
�l�{�ǭ��ѵ�etK�#�%+o�x\\.H����}U��\'����vx#,<�s�:�:����(�M�]	րJ8���O�~Y@�l�QWy��>�\\�\\cʊ���~�A&u�-�s]��Ε�gzKqe	����MA@�!S�\'W�*�A�-67(x衇������}�J����R�<${{@A��1���Zc��u��0�j7�RJ�y�|��_.���B`|%�&�}�2����x�gf,A�n�
����c����t�M��jU΀��Wo�o�r��å�mic[E
l>$1w�3Oϣ��m{+�lMZJ�m����\'CY{�D��7��eȬ<v���W*�����vx�����H��C��q�4�Y^�X��Mx�A���ãL��+����4l;�Ap�)1v?#d�C��C3fo��/_�h]*(t
¬��Ͱ���qT��^���P@Y�C�(��ƮN�iR�N�vcC,C)ŷǎg�T�ys�ZM��n��V(�	ԃ<`�����R��|�O�r3{�+_|1�sӦMۆ=�5P���ϟ���,����^�	���im�h�u
{�ka���
jTz�\\�W��%W�pOO7��lgN<�\'��	A��m�m���<����m���br,�g���آ��D^)!k	����cµ��CH�׵��l��s�,��c�
�����(�CjF���^[�+���a��t�a�eq.KG�F>W�H��1��F}`-<���1��5$�$�na�	\\���S,N�R��+�rR������=��^)������_\"��r�R`�!�Y�k��>��:��z���Y�ͬ��EH��{<y��.l&H~�!��1�H����}�P��h�p4��!�a��\"<	�Q�tӦL��%S��}9X�\'�U�n��E�\\��g��jQn-$��y���IXv	!X�_G�2N��ݯ���;�$?�WF�˶����b�s�7rj};��gt�|�:��b�=l�23\'&E�KLn萳�������]�������T֐�HK����
y��fx<�#�57�tqV�(Fy���\0o0�~DPJ���W�IhL$ܘaY{�{�9��z���ξ�OE�x�uJ�ѻ�� ���|!���J�r�0�Eʓ0�\"\"����{�tx�%�;Y
�p`*���\00���s\0����wV\\�֒���k-���-� ׿t��1���& �1�m>^\\�cv<�W���;�Y���y#�d�TI��l��5)x���[kT��c��>��U[7ww�Gq�����,�Rb���k��O[6r����H!�-�\"�������	!�<oП7���
��H�뺻TA�	�˾IcxV�-h��Z�c�x��8Y!A���t�C:n�\\F	�׉�Jz��t���8Y�p3d_g�/$P����|����w��@�_Jn��Mk>^[OL�}H�q)y\"��#�\"q�h�#!Yc�R���9.kk�Sk<!X���a�D��7�X>WnH�I�j&0�F��Ě:�L�(XKv;f��Bk��������˗s饗��-!Zk�R\\}��\\}��(��q:7�֕��w�yTUU��W�5̙3�^x���N|����=��#�\\�������ѣ9��^���F���I�5���^���NvO$IK���x5(���%k.p��wz�f�۝6^c)fO_ai{F��͞���cr^\"�#�̱�0�

�͂d�e�c5͏�xvP� �M��#�LM�+5;���$�ք\'\0���U���:Bhl�����o���~0�xM���V�X�6�^�k�ߝ�=�[���~�{&o-���RJ��َ\'/�i#��o`j,N�֮ف�<Sp�U4������ttpuWG��J�{�i�^������q\\U
����RgM�aX�ʕ��G?�?�я^�3}� ��x�뻹;��>�4;���
�a�1�S�}_l.\0�����r)`i�%˰�)��P�\"l��*H��D`,��tn{LU�fZu
�N�5� �����\"�[d��]���?���ƹ�[>/_�Xq��Zו|�a� 3�3����r�T������-6�.x--<	�y�|�p��ɔ�I!��0���D����<b���Y!�ɷ	���#Qg_��Y*7vu\"|Ez���f�;\"J7p�1,LWP%%��������[6��z�VQ��;+�֐T��v��B�G Js���,���:�#%d9+�p6��<o��fa���d��ٶ\\�WRV�7�z��s��s��\'s�W�������	��Z[^vƌ����������n���L�<��3fӦMc�ԩ�O�-�v�$��@��?���,���T!Ϯ�[�S��B(Fs��&[&2�톦�
Gz�%S|���KZ�i�!F~��º ॢs�LԪ���<X�|w~A`��b���	�*�^YEJJ�e����5�\"�Z�׎6�2����y���a7Dx5�Kz\\p���7�;w.�B�5k֔e+%W�P(��|��wޙU�V�k�&L���ѣ	Ð+V�h�\"Z[[�0a�rx`�D��� �>����y�
���dv<���&,��a��2�0��wh&,�TMvLճN`CA�2�|�G�\\�p/�4���e���Ni�g��f�|Y����Kʍ�}9%�B���!�vrk_+������g���<9����X�e��>~v���s�k����`��)�{xSW\'�\"Fj�&l`vx�+A�ưS<�Y�M\\Һ�5A�\'7uwB�I%�X�h,��NEM���o@E��J#wO�8���i1���rh����i��縭��^.8������V�P����.�Kzg�}6�T�o}�[H)��W�M8�\\����������?�x&L���w�l�E������/��3�<����kHM�
)�EM|f�Sy�-���{%R��+�z\'��#B&�iܵ�s㣒Uw(���b�τ�|JȨ��I���+٢W^DQ+n�L{� ^��m�*�������ɔy����)�B�7��*/^����J�L[�LY%�=ʝ��pC�cծM��S��,�\\\\�qWK��UP��\'�\\T�˰.��7Ys���D(��M��WG3#� �6��8����Q��r�]������Z	g�ic��szc��od��ǘrӀR+�}Si��8�/442+���L�_�� ����!J)�0���&�_~y9�6�>��}<�۪+��ֆ֚ ��mR��r]t_��8�s8�����ڡ�x%h�H(*v�-�][�M�g�8�gE��A��}�.x��|�����,��O���e�(����&��E�|�����Hz����qס���[;/��	))��c;�)_3�V\0��U���O��P�\"7�F�1K��}��Pp��by����]䆓ct��:��2?�D��]FssW\'2哘Q�)�q\"�W��ަ���
��w�bUN�X;�2z/נp�q�]?����0�M���c�Td��42�2HA��5���R�@.��0�b�(De̱�t�n$B���F��@��1��n߅c����5|�C���Y<OrTE�5�C+*1Pv����c(Z��D�wTU3\'�x�Ns�H��(W^y%Ƙ~1��)eY�,��s�aڴi�r�)��go(�E�<һ6psO�AZ������q�;b,>ߧ�E�ս��0#X~��\\=�2��T���Atv�T@��b�`��r��U����)4mB��U��ka�I@?��>h=}�x�J!� ~\'���L8İ��/�ӖX�ů\0/�\\V�[d�#�E�
����<�uiȪ�ˮ��>�2E^
T7Q}��O��I�ĜFޜ�]_H�k����)���a�6��\\�ʿ�ie�t�w�k���7��ye�wVi��u�ʯE9ٶ�Dz��G��b�z�tvv�{%PJ�-Ư~��|�s��?����ww�DFˋM��_���s<]ȳ[|�X^�:*��uΚ��krW,/]���1Mz��ݲT����Y��ʉ�y���x����򵒗�U��C��Y���K)
F
��u�F�wڣ�N�gp��;X���/ٽ����k�)��\'�t����)��r3��>JɌWBT%+���梋.⪫��=�yώg�Y\'5�����qO6ô���*P���}�ܭ�|��b�s��W�xݺ�G�B?�(p5�s�	#�Pyk��ޫ�kBx8X	�����w�e���?�{fNߞM�=!��^AE�+T���D���#RA:�;B(I	���&�O?gf����=s���TH��>����)��5Wy]�+�=�G>�\"��X�_
:^ly����L:�g�~�֧�!`�%Od3�@��Q{T�����,��*�e����\'��:*B����ۈ�b�E~��s�%�p�����~�����	i�m����~��p�g�y^�\0<Etv#ٗ�x>���T
�������� mE�7T,v�F��+	�\'������η��r9�Q	�	5�h��/RM�:,	[�����T��g#��]ؙ��y�\0���X��U,+`�F)����?�K.�\\.s�y�U�\\��Y��xO<�DZZZhii6|�m&��8kT���:��gI�HTȝ:�Z�j��[�\"u&2�(����ݚ2TrV$�
f��������Ap�4\'BRH1�e����@K�qq;-Ma�f��Q)x�X$��٣ bUw��B3£��%[����X�]F+�����p{��F�nsD��B��.�xv�R������|�+����8x��i���-��B*e���WG����Z��\\SSøq�x�駁�
~4\0�� ����л:��3����Ά
o�	!��b�Z���:h���M5(Edz=��ʒ|�w��b�\'�Z�k��M��(U6����hM�dͨ�5c��i��IM2SC+�s��t�.Y���N�������X��S��f7�\0�d�_{OtbR�jR�B�\'Ab4�27[�*I�\'��&�<��Ź,$�)��&U�BGާkr�/��R���ޯ�^M,&��/�9nyK�ǘU���=PF��V�����7�I�\"�F�Ŗ�6�HC�@�J��g�r9V�Z�SO=E{{;��n�G$��T*1e��O�^����[��
�c����	=,�,4��F�9��IIQ��ܾ�а�\0O�\0XB��Nd�����MN°��� R�)g@���XspD��Ά��
*x�X@��
gR-<\'XZ(�M)l1����)o�8�ed��,�
�^7���$[^��
���:4�p�Cr�e3�qX[*�-��� SkW�
�C�l������N�6b\0�(����o�,��G�2ɖ%����A~��/
�y1O��@��%F:�|����{��T)#�f�\0χT�`�#%뗻�j�pKK��Yy�9V`[�[��3wm
7o@�y�b����灛�6
�V
ڗ��۳J��$(��}�\"��Y�ƭ\0`�n�]ֻe�Ӛ���n��\"�Dz���� �;��q|����^����s)F7���>_�B���X�5��Sxx���e�U��V�3c�$�R\\��\\q�8�S�#
��َTeÐ������.3gάȰ��޻U�������*mh�Tkc���t��Uk�6�Fn���s��ŮA�i�d0@j:^5b�F#��%�1)�hrԥM�j;�W��\0O�&\0��8����\0�l��1+�Yu��K�v�O�,E�BM�<#
P?K1�T�A~��w���e��%]�%�
2��&M����������ry��L�%�ra�Ȏ��<20
V����gh���\0F�\0ǂ�(*�D��1��������@Qd��y\0�[�n@G�[a!QyÆ
k{X^*qD<�c��\\Z1M��7g$��+�_o�ц�7S1j��q��i���Z!��h��v�) )��`GX]*͙
.\\ȼy�X�h�|�D\"�.�mI&���o���q�T�=���m@nC�D�J�@կ
���8-����_���u�`�1��~Zf�f�mb���HyAf=��Dj4�nQ�5�4��&w3z��L�u_�-<�I��b����B�T��H �������7�~���CL}�W�ۃ�C	x�J�	��XG�N��݀x�ՠ�Ay_�_c���Yub?���c�q�G�^�_��\'����ū�aυD�����4�ƈ�6�m�욷
���oOJ�}8��(8?�M7�ϝ%�����&ɏ�ɱt���kN:>B:�,2r:B���֬Y��y�x��GY�n���{�\0OJ��y8�����7=����P6�0��G$Ze���(i�0�w�l�oZ�D�I�<]3j/ͨ}��g[4Ԕ	G�k��m�X=�L�E�+�B�0�{FP�� �َ8%�f!�m����1��Ѷ��\'�0]x����n��
{�̝w�8��1��
�X)�믗��G\\NH7P_k�W��=bH��LtX��R��27PY�zu�3&������>\'���3��^��__\0��\0M��;+�z{z5���$Q�
�򯧘4�\"ӥ��ojI�?�:g�*
��\0�W�X�����mz+��CBT~¡ܾ�3m�4|�A�M���v�d�ݔ�u=lp�O��

���&��f��e͇>��ǝ�㏋P��]���O]��X�ʺ\"�w�ԗm�jN�$�0V��7�l!��Vsg�Y(d�G�w�]��sb��?����S�sft@�e�6�;��HD`���;p)���8��w(�5�#�l���r0n�x�mmmh��lS�A�+l�����\\������/�̴i������\0��n6 ��+�ޝ�v�J0�=>M{)�]��e�:�
:��6�!RN��v�W�T#Q!E�e��yシ�kI;xa�vZRJR�5�@
��5~<Mc��\\�lNEr��w�C�h��e��O>��D5�A5ko�\\\06n�Xy�����ps��΍r��Q2]��:�i�G,\'׫+7�=�<I2sN��j(d5�5͂�_��W],KP.�aÆ
��?.�`��?����&���t���,�֭c���g���,_��b�H,���E(1������>�H$1c* ���˄	�馛8��I��\\t�E���\'@+3�L&#te�t�clg@�Wkf�n�P�靵\"F��	(d�\0��E�;\\X��7$ ?F�T�h4�w�Pt������<����$\"Du�A���͜s�����5d�R� �j�Ȳ� n6�ht����rAk�D	�0,s6(hEG��Qd�A�A��ֶxxS��.�����)v�h
j���S\"\\��02�
�y�q*Zy����\\|cc#w�q�z׻�f�|�+_�e���n��A���p�b�6���=sU+EG�\0��V�U@r��IA�V��$�!9^o2�~r�&1�4�2�yN�B���q���lD<˚���v��~��z`L�eU<�!�MHZ�,�����ш�9R��5@r�\"5N�����X��7ij�h�
J�}�R X��K����<yC���b���iή�\']�,�J��Y3f\0}�Q�45	��㧿���b�����*��WK�U�t��tk�s��~\'�
��~0��Yӧ���{�5�aΨX�l\'�x�N^H=�Rr���WF0^s�5\\p�444T4��R���q�wp�Yg�H$��g>��q��`ȭ�\\w�[D%c�hM�H-��5�q�\'>�
�Ś4�:M��Tg�3��he\"�bD�5�-1�544_kj������w�v��+�����V}Ja�ٕ��5;�L;XflYl�;��I�Fj��@��x���&����˘�G��.��6{F�ש��\'���m�;%k׹��r��6�{5G�p��,*cۢ�\'��I�0|Ц��HB�F��R�nJ���	��D�%�;�f�h����e����3����`ժU�m�1͢y�Ĳ��H�w�����\"���Cr��(�2߇�Q������K\\��n���	��f���:AO/�_��lG\0�a�bW�֚��ڋ/}�K���x�Gmm�\00A����;３O~���k̝;w��Um�ޜUkr�]��?8Z�N��K�f�����R��g~������
\"	�~�eK����sl.� N1m��x�`�lɫ�`S�F:::3fS�Ne�ҥ����8�Ļ�,�r�̳�>�QG�=���)��Ruن#h^�D\"�c!�@+�LF����<JZC{�|��?qp��FA��0-�(�Ma1��qPB����kEzOo�m�A����_��{���uR�B*8j���~#߆�WQiN��� }��VX+\0��T��JJ���()�y��8��S���M2cB�l��?iR��2
ß)�^>��4�����;����=�����h��63�!J��/ۿ�n*���X�����3f��dhm�T�ނ�l�,��f�l.�@�_�.���� �i�FH�[��S
�5�g�p��_
X���eIj������ϳ�6��r�Y��1c�0s�L��>6m�Ĕ)Sv����?d�ر\\~��|�Cb��L�8qX���\\g\"b�Bo���I��꒰`�_-q	Sm��Ԅe�U�~��;�[�B$��ˤ���a�+�H�A\\�Mk��xy(u��R��2no��p���\\8ż�hX��U+����q�����N\0eF�J�X���Y��ǋ$��f��o7��x��sͣ�d}3�nj悆&M&R��ç�Ca[����e�����s���\'�)2�\"��~�JU�ށ��3�bڤI��qZZZ��4�����Ӭ��ܼ�˟O0j���z���?+���ǐ����Q.k|_s̑�}V�|�Q�1De;m���tED`Μ9h�+��]�����Y�`�^z)
9di�C�b��I
�f|��	�����Yn?.�^�I�)x�e�u�8|���d��RDP?��)�-�ˊR�7�
ٶ�ѻӤ���I%�]��|���RК:iqZ��+5iO�H͋Ƙ��T.��ڃ�z
�sW]��Yu����p�Dc8x��J(�v��pk�0�\"� �lV�������|��	�|]�M��LF��������7
3�#�`\0o�lW��H$���͎�]��)ו��it�6>nѵ\\����N�����I���+�*��[��B�0� ż����Os�_��s~��WNb�$�ZSB#i���煴�M��Q44F�(�����f�DiA��+ǦR��sw���Y<������ܞ����`}�&���C���k�|����x���~��c��W�*��r	�L�|��	>���-���\"�����x%]i1�}p˦qŷs�\\�!� �|�+I|�o�
��$|�K�;�B֭[�ͷ�)�rh!P566�F)�J�
�IJi�ϋ��X��i��Z�g��H����b�4H��X�g��+���>�`�>6�n��imn�X\\���xK���6���<ƎKss3˗/��5
�߄0�8�]~�R���6~Y`\'t�shp��OH~�<i��(6=mμ�jJ�\0�t��(^���4�|�]o}쁉$�cq�fx\"���7շ_�d�[e#, �5m�ǔ3;v,===����S%7����?���\'ʜQ�XTp�Y1z7+	���lj5���m��\"��ͬC����v�wH2x�EU
�Q�u�K/���_o��_Kq��,<��L&ǚ5��0as��婧�b�ڵ�lag�)���O<��~�+�-[ƌ3���?�A���Ѓ�2e
���?�F��al�Q���CS�(;el�v�M�QU���G������sLHk+���f�)�|Hߢ�DBu��T��*��pA~�Te�裕QLiyT����*�ƽy`\'��삂F��O��AH�!�m�DmF��v�y@ܲxOc\'�7��}���4a~l�y3B��ϣ̘:!%6l�3�k[0i��=���/e��_��ý����~֮�h�P.
��W{��-���y�a�[y��o�����u�&�\"�j�d��錅!֔/}�1MM�j��;��?�|��-ɲ����nd���,@��&g��l���$�3��C������y}��_���R*k֮�y�_�v������?�1y�$ݡ�FM�8�r�����ݣ�>��~�;����\'���qhmme����ݛS	����/����:Y��0˜SKk��{xZ,Z	����
��ca>���]�����j�RAS������W�x�)�J���1}�tV�\\IK{;5uu(�G�a)
P��܎Zء��K/Q*��7o`B���N�0}���x|�Y��&ω\'D��{c�C���_�)�Vg���\\�~�ZHYY��㆛�\\��k�{�s��T�g\\|��6Z{tVP�h�⩡#�Ӏg��	���on*[T��u�I�#X�+�N��+�[���}�nG�����APV�!��G&l��W7UU�+x��{�m�4M�DM߭_2?�0�
�����oQ�|��3��Z{zz����:lf{,�nX��={6`D?
��xe�ejj$3g�s�~�z��\"�X��&�j�
z�O�eWZ��m�T�<x�&�m�>������*	|�L++gDe2��7W�^A�׀c9-(���^Q�o��VK�����vh������5e4�
ͤX\\��^���nذ�����LLhm�(�ռ��㕥a�M���xwg�50+%������޴H�Z�\"PH�Wj�,]�t��__\'���GH���V���^���hO�= )e��6@�$u_�=��iߨ����7�\'��9�h���\0(�+N������f��Esw�ː��#�N
��	P耗~��&�R��F�|�a����f�OzlzZr�=&�(�V�h��56�-�h=��֬޲��
2��=3�
�Bjpe\0������>¼]��5���IX��ٶ�+�鼙��l�L�q�gU���#%����{��3f�\0)�T*��=�x�ǙP��.	!I�W�*b�A%����������k���%�>.v��H� V\0st�[�6N.��VX�Ҿ�bb��`�!���F���?�,��C|���ZI�r��o)a\'��ߖ�7C�Zɓ߰Y}���mЁ9@M�9�ʻ�Q	����j�gw�u�q���FS-l9SJU\0QQ�5
��78�����/Ɍ3*�bCC���y��ǹ馛8�C�R�F7n\\e`����϶v�)XD���n�c�T�4������+��d+���j8%UCD�a�4px\"�3�\\����!���ײ�6Ŝ��<�
�0��i^z���c�wn��\0<�I���M�n}0������\'����^�HIk�@��g�M���u7F-\"B�^����~Z�IBǫ��5��զ�X�24���2�1 8�sLA��S#� ����׾�{���C�J�^�b#�
:���r^���A>a�P(�k�!�N�8N�R�t�I\\p�̚5�U�Vq�����c�
�1� �RNÒ�Meq�����y�3�OgѢE��>��Ŷ�v)z��t�X��RCi5�ש��B����5�vp	�
a���1���*͚i������!�I��$���ά����E�5N�����7��R�l��m{�N{xqJ�^H��^l�m
���?���9���x��QJ�������!�^|��\\q���>��e�M�F<��J!\04/�䣃�eA\"*6<}W��M
)�y���hl��1PV�}�qnK[f�0}@���.�m��S�^��X4�ڷ(Vb������2c��E�;��nS��
��
J1�=�a2EN��8�W�s<[��(�m��K)N��!;���[mB��x��m5/�+�����q_����J���銚I��)�d�z�	��9���<(v
����:Af��{V	:^�#zyB@��$�����)���zx�k��G��:���\0���7ɱ�o\\��q���	R�2E�X�&֠)vI�6
�V�<�&�d�~�q�-K$�+vt�������rlZ2%tч��ƚΛo!���k�o0�w��\'Wrya�5�;�q�gr�UW
���M����c�q>n^��w����)�jj��Y�|��}ұcF5�zj����à�|O\0���o,�m�n��y_QЊ����9
gh����&Ţ,I�{�XcSh���d���C^��[�677W} ��P*�8����;w._|1������U��`<<�qx�G����\0��^�~=����|�����m��5o��+�50� G�m����V1#�Ʋ���\0��c���ѥY�GoZ��yŢ���6� ny��Ə\'Y[��L���D�z�V\0qG�L	�+��Ɉ�lK\"�\0�\"f��@�>�SR��Ɩ(K�j�)A4e�>��q�܎�ӈ����4[�2e�t�ziQ��\"���a�8ak�1�)s��`��Υ��wJ�eZA����fi|ģf��g�����T:|�s<���{y�l�C�`Mk�Z����q�t[�`XO�\0��Ď;X��h�+1���h�c�M`�Y�y�xt�o��K�гZ��Z��.B���N\0���5�f;5�|�AC���ꫯV�ذ�_�����vy�Gzo�����G?�?��3gά�]����N��>R����w��@��HD0}����8v��~��p����/��]�5���C\'&Vu�Ґ\"���
�ל�I��ːh@j�+�%J[<���8ޗ���\\ؓFW���AUo�>bqj��Z�iZ����N3L�MP�$��94~	�k�K[^��X1M�j�_4�jtb	�Z�n�2��d��9�K<<	-�Rt����8Ó�]���0�@Ż�(�$����zy�^�n�H�m���wv��������R�%<��Ԏ	\0�ܑ\'{\\�6<T�u7�t���\'8���{:��C=��w�=��}=�!�DQ��5773�|~��_�w����f��8+V���k��������������}*)c�%�����<�f���&�0��&���t�k�9Bi������@��
=��#>��;5+Vy<����E>�>���o0cƴi,_��.�g�6TjC�
��E��>�kS�}�D�m����!���g~���RI�cТ��9�=�Z���U\0`r$2�B�M&L�{�^S3�8�S�pT��2�y�`�E�Ѱ3z׍܋o�n�{��N�Q�9�����\0���
xz��Z����z*�&�&��/o�=�(tH��Lm�Ք���B���x�`�KERJic4�1�j�i�hۦIoG��+��fCЃ>x\0�����w��_��לr�)D\"<��?�����\'(�J:0BBr*�b�����0ow�a�Q[[�C=D<硇�駟�O�3f�`������444\0}������)�&Y謦\\�d{Lk��BcB�<jh����XR(07ũ��Uf��֘bVo��2��D���>eE�v}�
����7�ǂ�U����4�eH��I���]�����h-�o;|�R�������jL~*3*ހR�O}>�ig��Գ.�A<.pː���gy6�xD\"�L�2�bNXm.�����) *51��k�
�y,]��nذ�ҋ���<��˕?�q�Y>����-q�ۣ���o�h�R��Ȯu�C�t�=�u��6C=��p]x~�\'k�?�q�a���s����Wf����(tp:RSƌÄ����}2J��kӉB�u�~��7��Xp�%�1�]y�p,�=��u�ߋ��e�� �[LCyc�Y��N��E�`|��b$F�q?+sԕ.�3��k&k��s��.V�\'���ܪJ����d���=����a��t��^ZT�M�+m���XP��rT	b
����Y�ŕW^ɢE����H\"� 
����ƍ�:u*�F����`B4���cp���<�@#���������iz{�x�~{;�χG��b�v����A�^crh��2�<)
�5A��y��㴚:2��xJ3P�����|�5KRV�}���8�&�EaJ)�@��أ\"<�����\\��w�I�a����4uuuu�W%72�)r1��sdeTL�F��CO�Mq����RF�5\'Kt�G)
���4���^�줔<��c����|�s�����N#�����~�1cư��{��p�AU��I)����eY��������e��Z�u+�����jy�y1T���}�5σD�T�o��T�C���?��pd\"ET��v��k����S���^+���7^W���b������f��?��\"��\\�������M�6�D6�K(]�M�D
(�U���l�!��*R�1c�x{�XB��S.K^�P
jj���&%�OJR4�>M1��� 
о`�S����}�Qb�w>f0ɂd�]Du�ܭO��R�������O~����s��Gs�M7�D*��m�x��ĉ��;���y饗���>6\0̄\\t�E�b1~��W�����f�%��ms��uA5���d��4߇�F��6�w���e��P*��sDc��ǝ�4�@6�xx�X����?{�)*կ�Z�|���^>��%R�F$\0���tZ�J��[|@��imm��\'!�R.W��T3KB���MP47K�K^�x�1�Cq8��������=��Td�B���t��4�K\'\"�$M�4]ő&o���U��%G���jGp�̦Q�L1z��s�|��俔y�%���e�;|\"��r�	UU���>@�\"�~�@\"����L�b�))�
!��#�&Z�����t�v>�����.���?3e��;＊��y\'�|2��z+555������><��#t�AH)��=z4g�}6�뢵�s�aڴi\\q�#�]چs,�𥲀���^���˖y��%X���I5In�W�#O���������ր���i�
�H��u�H5R�t�
C�a�4���yN8���_p�e�{�z��f�}�\0!�p���4�nf�[&��V�j� gT�i��DJ�ܡ9�>\"6���[Ӷ�球l�91�½l>~a��zI.�@
�̔ti{����f�(nK|ŬX��2�\\+R��rJ�?a�u6鵂����y��O.��w�c�2�4�h���c�\'�s~:X^��-��Ƅ����7���+�B��ِm�]
xIx	ȭ*��3mȝ�$�^3�r�a
ӕ�9(��(�4�9P�E�1H�Z�\\.�z�Tk��V�:K��J��Ӝ��E~u��{��0����������O������B��7wꩧr�m�QSS�	\'��<��3̻����?;�0�<�L����s�������<�0�b�ѝ+�6l0U�\0_ï�#�3�cׇ�>�9�����\'�~�n�G]Ur��5���sIJI)��$���tw�{���W!��q���[��?���]�=��_��@�F��[ۆ޴f�ơ��4j�ǎ��(U����`rF]����O$��|Y
)�<XM Z�Ig�i�̖�����!�Ӕ֚p��x��oZc�M�7�<t���gD����a�i4�R�}�ω�sy׿����+~�P��T�l��#����>��q��k����E/����r���R�X+CN̬��$�jF����7������zMƘ+o	�
%��F�#�\0��5n��Tj&kF-T�<f����u�b~\"�c]Y��9�	5������ �H0y��T��J{������2n�8����<�B)C*��K�К|�K/�t�Ԗ�R���Κ5k7ncƌ�Bܰ^�v�G)���Q��y��}6�s/�l��1�?���SO����y�<`��%����:ڹ�������>7���D.��o_i�{v�	Sm~��fH�pi�\\N�/����?���IS�����>��K
|�x�e1c�t^z�%6����V:	��.���������$���%״��w�)�-�N����\"�?X&��Y��@*%P͔I�l�����a�����6�΋D)��G��������,V�a���v���/�	u�5��<�}���
=<�u���C�s�ǟ�׿��c�=��������0J)+�ީ��ʚ5k*a�Xkk+�|�<���z���f6S�v��P��7[���<�~3K:c������Z��eӳES?J���x��2BH�~.UhQ>?�l���-d�Ʊ��,���&�/��S����&�9������s�%^x����L��\'hۢ(�F��WF�*̑�Ԕ-��Mg��!��6S�o���e�n��-���}�1���ӣ���N���e<Ə�|�}1\\W#4L�(���|�� �~�;��z>��jh��a���o�U�����	�u���5v��A+n��%����3������Y%
���Z�,�8��ZZ��Xx�O�I1� Eǫ�Q>	�|ߨ-l|\\2f��X8��.ɱ��+j&��g`d�Z_��>+i}ZҵBT%2J��s\"Q�I��5ݤ��[IȶmWګB�/��/|����x�
���s�a�
��(J�!!O�l�Ec��t�w��~~-�	&���������k�e�x�b.��!c-�¶�J�*���he�XX�ݚ��ֺBI	�X�WI	϶Mx;k�̓w��scd:t�o3�]=�3ޓ�r����3f̨LT�6Zk�=�\\��{.J����Ν;�����X������,[�D���y��j�������X�l_�����	&0a�x
Z�zj�Lq����0M�-v>�5�fXt��^�\0
킖�,:�
�-�,���3#�te������fa�ba4F�e��Z\'�}��-ļ��p�QGQSSß��\'�~�i^|���\\5�m�r�̼y���\0s��!��Ti������b�}��LA�\"�S3��\'?�\'W�`IA6�욌.�9̰v����S��?���ŋ���?��/��SO=�]w�E*�\0��dr@����nN>�d/^��ŋ������}�;�)p�����a��L�َL�搃���\\����8�YOHM3k����c�Y\0^���F|&O4=�;P�<,&����%2��vJM�2�]�)�0Ŋc��
{w�v1�e�kԍ��6Qi�Q7�h���J��	�b���w!�*�e^)��w�X����4 �����(�u��a�̤Iz>���}�a�]�Tm\'�B����vxq���������ziqlM
e�=�g�D�[�9Op}����M5-f#y�o��Ŋ
�tpP�����M��v�f�9�z�u���o6}��/^����,������S^�c�����?C����j�SJq�Ygq衇Vt��{���f��Hb��P�8\\_�T�\0���{x]\0H�~te�~���L&hj2�p�XDJIM�Q%	U�W�\\Ɇ
���v(�&�~z\'7�ӥ�YT8o�-X��g�r�F�ֶ�\"\"0q�D,�fs�Lv��ZK@W�g�|�������p�t��h���$��jk�.���s��PlI�`��WD��T�J{&<���l���?�лFP7Mq�/\\�qc���ׇ\\�����\\&6JcE5��m�f���i \"$��%���0�4^�r�1��=�X��X<���TJZ���r|��O�f�mp� ,S�qRe�w\'Fk�kj&(R��<�X��
m�σQ8	�Ɨ]v?����a�����7�x�h4Z����J:�*�&�~��E����E��r���,�w.��_�D���<����jjj�D\"�ŊGZ(����~���d̘��X�R����0�������\0~�A�>��|�khm���W����U�#��+Wr�I\'���ĔI�hkkc��3É��
zl�9$�CO���oI����+ʅ�ɚYg�L8Z��(Z!M�v�L��D�
޸�b�m��:��Y ��ji� �g.���Ɲ=o�i�����[*���b!uX25l1�̦��yL;�\'R�1�H-Dj7g�s����:��z#*�m1���������|���O�	^���s?�M�^��c�u����g�Y2/��8��-��B��������g̘1��e�7o�:�1�xn��6>��SSS�/�K��u�ü�[����6��ژ>}z�B�~���Ǩ�j��]�%��g���`��}�3���?��
:O}�f�-��C1�����~�c�{|�?`��F�MOI�� >l@6�㦘���j�0Uݭo��E��dk�n���5�@�,�S�ő�_i�?��bA�����j߄���(�G(to��mu���F�FYA�&��$�Z�
lhaE�����aӦM�|��\\���y晬\\��Y�f
����J&�^_�3�5��Scx���+���R�|�%K����bٲ�lܸ�؉��
���~�P�5����;ގ�\\�ߵ���r�9�P�z�\"M��׋��]/�U�����XP6z1��@ ��O/���Z��ǚ٧�A���9���.3{�z��[��̘�F-I׽����ڗ�^��Q�V[&�S�fC�����k�Z���ۋ���I����d
�L�{ަL贲��-�Op)s3d<d
��ۼ��e,����������>�C\"��J�iG����<��c���_�zm���c�=�y���>���8��>}:�����ߍ��w��y����_�˿V�5?o�������q<��x֬���?]�1!����./������xNzu�W/���WT
�����3�U��?6��/7�9��HO�&����\'����G�������/_R�\'>�e�D��y�Ғ!DmN�:=���_���3$a�q1��� $�*ri���M2n�,k|��Z�$�Z��4\'�7�o&Ky��Y�7���_������\"7�r��#ι�ʬ�i� *�Da���v�l�Vg�,���?/�p˻|�ݨ�>���1��9���N�t6c�$�d��RQ\0��K|/۩�n���hX�c�����Xh>\"�UAeS���z�x�g#r�D��>�ӱ@�k���ץ7�wI��o�9��+�P��I#9	��e� ˫�k}?��������	c\'N��O�W�����8��ZKKKQ��/~�O~��<cS�N%�ϳ`�:蠚k��	`�}��}V�����zN<3èIh��r��2�V�@�1��,�ï�8�����U,���,��A�u�53wS\\��,Ղ%�:R�ħ���ǅ�ꣻ��{F�ל�ᜳ}0����i˶4K>�Ł��Az�i�����j�w�C�0��� 	�#HS�xpX���o��j]ISqm�&M��1�e�}k�E�<*;(/���8�����
��˵@瓒����9�C>3�é?�Xv�����iԍM����ׅG-9����*&f�獚���t<���M��rR�P�@g�Ky���t���
�G?U ���kл�r�k3���9�q���\'������`�W/-𫟕��*���*�\'��c��eI�s_�bE-��&i:��R��$l�h��xy�ȯ_�Ħ�$�JW�F*�i��>*6D���|�/����l��
�o�@��� \'�T��ͳ׭��g�ow��$3����y�]ql�Q�*R�d��c8��!3�0�x�Rω\0��7v�8�����ӑ�q�����Xq�o=��ƀG��
����I�?j��Nѥ�㺓S�+�mL�j�q.n�Vޡ��A����<͹
9�s1~�(nnzx�9�Z)J�y�B�Z���l�R���Y.-$��Vcn�\0��U,�:���B��F`[^������G��G�<I������b�8ݜ�c�oP���IW/��u��2XKd���P7�R�r33�����(okn������go��mZ�2��7- ��+hoo�w��W_}5�r��r�f߯���}�هG}���>�V��z�j�(�
��H���*�S��_���A��2�T� y8��{q��Q�
����0���c4�H�@%�{VWbN�o���z
f�AE��g�j�O�Tz�Q])MT��*��$nR����>p�����~$f��������qn�s7���h�7�]B0�XclF�W݅�A�;��,�6@ѓ��8��C�=����&��U\0���o�Uȴ/&ʑ\\�m�[�P��h2͖�:����,�BQX��X�jpՒ!!���߫��}�=\"�GX%P��ò9�lj�
g�����2������矚�6��Ofj�Nsw$=����i���q���D���8��˝z3;���M�ܠ^�S�ȼ��m-\"�S�o%�U}L
.hl�:���t7��\'kN�E���wg���b�ʂ�ߵ�U�\05!�j���bi���k}K%��#�i��F�u�f�7=:H�z6딦d�!��}��pWE�[�%��cw)v&�Ab����>��m���c��Fm.џƌrS��IMT~���K�0�_���}����|�l��M�A��j��ꎽ4b�s*�|8f�ۂQ/������&��U�Y�ob���c��v+U��ք\0�R|��_&�\"���/�\\]�����;w.����m��Hk�2�{�GM�nSsh�&*)G���R�\"�7
��-�h?��My�r��S��󟫼忲��X�h�����+ʬ]�7����n˹���%����\'�XP�X�z-�mp����A��\'�{�]�6�z�hʏ^,f��l��e����q3��X�/$$���T����()y{S
�CG��s��U\'��0Ղ��u3�HPnϩ�X����ǅ�����?�62����*DAk�W��MP�!Ɋ;��,���ד�uQ����9>_O�nƼRL,��A�\0f�Is�b&b0�`�\\�c?�Xy�/�i�`7%�J7L;�p�W#Z���;!���M�e-��û�[�R���{V�:.���F/t������1����g�R�/}���:���Oܦ�N	/�C;4C��s��;��\0��4�	}8���3o~�
�Z���Ʀf���߄+k
����Bl:��T�7Lw����x<�3E�cn�[�mH�.A�����j��|L�ކ�U�{��g�W�oY=W��FEаy�K�p�y��7Ѯc�[ы�g�`c3�<�c�1��oc��لaXK8���A�j�*�0u�hH_E�F����A������K6��ꫯ&�������ŋ��0���
��	�
.jnc����
�zG6f��&v��wʧ�+�pF쬿\\t<.�墀����ᘉ�N�2������į�5�(���[ @�>���łB<��1zt\'Yw��$�����j\\|s����u��[yր�s��=�U�lވ�N���h9��!�O2T{��3��n�Y���i���]���~�um�%�[��7]�;|�e_���q�Jd]@0�
���Z9<7z�BzP�r��(��f�u��~j�]	�~Z�m�R7w���*|w����i��,��Ǔ��(w��l:���)�����d���Q�#v�u;��b$, ��B �7��X�^�9)7y��:�	�H;��<
/7�llY�l�Xt��}���d����=튈�7��b�#�Α�.��%�o�Uk�������;u\'�
�N:��U�o>��^��u��j����}0�X�1��L>JS���;��̫M8���n�N�y��p�;V�K�,F����M����Y�wC����M@�K��Z
�+m�;ى�l�]e�)@K!n\0^��q�ޙ�U�u(��@:�.�9��1������>��nI�4�6!�yu��35��Eq�{�����^�~���K#�d(w:�\\p�W����;���R�+�:���{�{Eܽ>���(lJX�e\0!ج��&_�1���識�~�����-m�ڽ�Z��8�;���8d��������jK�阃>�e`ͽ��O@�RA�y�`��\\\\���#�~���#���k�F\"���~�c�]Vˍ��!���vb�\"ŮBx0
��X�Z�p�f�D�%@	���Fa-�\\�N�V~��u&j�\\��46ò���� ����C-m1��Y�.Iq�Gc���c�c��5a��T�Ʃ���V�Q�/\";V	�~�gտ$�V6�(���0�-]�g��F�nHa�z)�i�_���[yR~!6�R^�v�PB|M[���Z����
�����(����<}�ǝ��JS*�д�+H�����\\�x�2�r� Ӕ�����T7�n:K���ݥ\"Wuu`���C�#;��I�k�8���D)IF
�&+-�\'%R<�<�q�^c-�ZB+([I�*B���ZN�I�+aQb0����^ F��\"�#sm�bl�ꔠ^�d� �(�k��ĚBFRՆڰ	Y���B����/}���*tl�ʘ�\'�c��)|���]QW�{�[a3d��\\Ӊߌ�����+�sSGЊ��{;�0�k~\"�KFx��>O^��FJ�����UzI��&֓ŭ��86_�X/�,�`��̐{��ċ�!���_�ǚ��qɄɶA)o\"��*@4�iɏ������
��DZ;qʄ\0sٜ�L�?��ʣ�bh��=VtU5�ƣ\'�X<	�p.�,_l�Y9*0��{�I��[�=h����D�C\0����T���l���%� �emV�5�˂�eC%�d<�\'-��|�)����;��u��Z,�Mma���߸���n��o���-hk�d�W�5y��Cf��P����z�ܤ{�y�ٿ�����5V	��*��R��W|��gv�����6W��bw���t��E(uV��M�H��Z��(��P�?SW�?�:~�	!��(w3�$8�w!SO�,��ǭ�\'X�߯�,k���Y������\\���-���P\\/�[\"��I��(��4��H��]T���x�E��u\0�E�1�CI���ՒRS����HC�e�eSV`�)��=�h�-��&]�.��ރ��/kV�����vD���\'�b��v�VW)�Frs�$s��3X���@Ē�a}$�E��$�ѵ��Y�Ya���}�ԌebV1#� �Ւ�ʒy��RdA	Rq�e��DY5�
��M̌�P\'%������J
�{m�y�v=A��Zc��g�}p.�J�#=��.����
��z_��+ҟ临����J4��G4I�d�՘��U��V¹��|t�k��φ�͓]�`�ݺʹ���+.����9$<w�⮋�<��;�O�d۠}�஋:
2-lv��P$W��Z{Y�z�>�z�0��xC�+�l���)~��������FA:[��L:ܰ�
����c.���l�[&y�R�gop�C���%*�{Y��,b�)N�%*�fi���ؕ�<����졲��S4P/$���t��Z�#�\"��/��,�R�&Rˣm�t#����F\"g��w�p�Z�:�sU�-u�`F�r@�`��@Xˆ�.Z�WB[�;��\\�B��겶f�Um�#��߇{b胮H�d� ��[��V�ȄPd��&��-��\"8�I��<�kx����)%��Mn<�z]Fރ�u?�<������u�w�`�g�X��=�o$s���}������
���L^y����ó9��a�S$�^p�4���YS�np^�H�s{����D�ح�^��w�
ʅo�&�iW�L<��]2c�o7?n��=]��ovn��3֞��/Z�<ŮJx�H�H!n��W�O�}p6�J���J���^^��*��-a�
<)h�m��Eƴ�Z�x�f_@ѧ�T�U�t��|*V�S�R�#$��i
�N���Ϗ�$2B�-�+����\\s�gb*]�}K�}�c�m�L��i���z�s
k���A��:A����\'$�	�@�q����ǣ��ɴlZf*�od��R��;��k.bқ>��,m�B��bJ:�P��B��j�	�P
)�S2��I�&�H�
��6H�Zl���ua�6^?Y�e�룄�bR��H���^\'���}ANZB�Q�FbCU���02h26fr�#\'-YOҧO�{5����bz^�_��YC�\'𭦧a�Gw�J!�X\\��5��$���(��<�k魚畄H�
�T��TIi��f$�/�P�	��Y���8Yz�E��jL���q$\\9L ٷ���Fw���UJ£�X���n�k~�����z.jj�U)J֎�zb\"���Kb�~�FN�38e���	��_���Y#�,c9Y��1�՚�Xp��h���nظ��s���2ۢ|x�G\\�
��Y���;$	 ��\'�Q}���	KcVqx�Ǒ-�	����\"�u�,�J�u��J95\\9�2�#ޒ��B[G�hC���$8�Y\"=��z
�:;�b1�W��-�L�&g`fڔ����<Q����Ԋ������x����w4�px.GɌ���A�:��1�},&,@�s�.��0O�CwM�����13����)�ſW��x�kkb�����z	�]0�#1G}&F��#��վ�ulk��6�5�����\'�{8�
��E\\�/��h��~!�1�&ۉ�\'7Ry��n�e`���:Ww�ҕ�iN�n4HvJ�.3
�Amn�,�9�W��h��>��x�.�Fǈ��$��JE���IȞ�Nx�!�\0�~j:>;J@1�|t7���v7y��MqZJ�i�AU;2�k�9q��n˪�2�w�,(�:C�)�ҵ�=��;��Y��}�Z%�r�>�XU��U˚
#��R��p�l*p��K���1䔤1���[�|&�-/�Ә�YW
Y�[aEQ����M��!�σ1��~K�O�Æ������f&y�w=A�D�y7T�Opdw㛃���\"*����ن��/���LU��=�A�[��1��8������]O�-Ι�@NH���=�T�|)��+v1�^��k�T���2��q����m�$�ESkl��cv�FvC_{��\"�PL�
��^Pj��n	C]ܧÐ��t�\"������O\":*%��;L���ͧ��y�\'�Ǝ��xR�\0Q��a�4��q��`����8�Ab���ޘ��5ݱO�Siw�pw3%����6AY�՚��쑗�]\'h��%��{��� �&J\\tKl,�|�G(c]Md�W����X�,�-ѥ=:*�!DV֒L�x&)��F̊�0�|����s�[yM]J��$�����8�p�/B��<�{En��Ԟ�Ģ��ݖ��֪�?�r����nm��A�%S5��M!�3�q�__�ۭ����^�.���
�ABz��E�~������ZZ��-��R%���C�ؓR7�Fɝ�o�U���sʏ\"2M���3��I`�y��Ҕ~�Z�����^\0�Sߊ<���6	
}Դ��3�U��梩�:ϖK��
k$���ªM(��dI��{3���7�ӄ�4�iW�4ʹ�,<�5�g�k�\09)y�R1��� 
��6��k?�8�N��<�Y77u5���Oz�CY�j��-�9�^0.�q����s#��m2SԖ�X���Y*:\"B!� ;�pX
(ƀ��쓷���ݱ��W4Kʰp�%����9��G5W����+��� !@Y\'ࠒ�+�����%�@&~��^���&^�$���6����\'7���#M�Г�6����j�����{i_k\\��*P�����6\'��oԜ���âk����j�6�[�0@������=�Jupl�`teS���\0h=�+\"������O4�}_n��)!���:�I߉�>��t�ᴟE4̰lxDpӅaA�j���M7T^H��pS��ͽ]To����?�����V� ]�r�z��+�55�P�����+Z�_���ǹ5��}C�:�)�1D�R�A�s�?&ؚk�����m���6,.ª����a�{�	2����:O��u���:_<o�
%I��N����y�fO��3�b���[K�
B$U+�ĚH\'5I����\\=�z��+	��\0������&�
J�lq��FH,3?���J����O�Wz�O��N�1\"`��i\'h&i]�ފ[%K��́tZٰ��nr٬7��y�残}tE ���h���|��=�_*y��o���5�0��K�� �B�pL�5��g�O�)ŦTUR�w�}.�����ߜ�]e��BzP�u�:�_�0������-�.xH����,�\"�<���b����� L�J�QDl��U�	&���L@��4+��1��H!��#��QЂ�XR
c:\"AO��yS/)�M�#�9ek!IIs-���I���W�?��
��*VV�� �
n�(�{�X/���I�J�����&
�����@���������M+�6􆚞X���@�J���>��~\\!+S�3���Z�`qAS�Az����û5��5U�,�����j��ڈy
�)2�l�����EmQ>�_��{B��:�>�����j�;�>m�b�lDOlY0 x��1Ny%��b	kP�K>��Ш,�\'�gJ�����_�p-��+��5���|-J=?�n$Ҵ��32�՚�傧�ѳXж�eʱ��ۚ���u
��	���ن�ɖ�Hn~{@8 P�(߻��V��}���IW�RBܯ�=�ZǶ��*��`}�U���:��)~Ks�V%1��0�C�rAi�p��[$;��W�5���\"7�.hb�U$^�U����1�S.qko��¤=8�әx��x�e/��(�++%Š\0$앶���r�2>�쑇�s�	y��%�}]�K�$����m\"���͊1��i�Fa�Ɋ���SII���	{���C����\"�v��[voer �i9c��X\\�;�#�Gʹ��%^�ȣI-�$�i����5�Kp����_B�
$pt}#g�70���C�$�!H�ϲ��S2�$��,���N����.T��V�sQt,��ew��Uߌ�p���x�����	��<V̷:�e�ڕYk�-�v�z�M�LxiCzB�3���w���O���F��9셉������#�I�{�O���q��Pus{�fn�ĭ=]\0d������&�a	VH��m���k?}<m�׉�G�G�(�hV�F��]1�J��W��
g]2��
X���ϡ	K�b���l��V+�/�\"c��%���:�ABz��ܬ��>=~����8J3�V�a��\\��i�Բ��TӶ+���|�AF6�1U*������Ts
ޱ�E�{$6[aª{�Vto�^p9Q$���#�%��$c�-�h)���:锓�������x��fX��.��bd٧^�7����[���
)i���u��Z�8��se��Y��KI�ϸ�#V<M|�
Ew)bE(YY�	#�T�SbXY��Pc�Ȓ	$����e\\ΣAZ��i�VЫ�Z25c���V��)VY{��<�єÈ�@�fwh
��%��N�s�?|����+�o&˱
=�༿Tw���)\'��3���iIDF�lК\'��
%�BCE[�T��h�=&f
fE��Rj�A8~&LٝLS*�uߟ�!�Z�Ѯ�\"=>!�B!�T2sH���fE��dc����t�;��ae#�ꦾװR��NG�Gx��Kj����_�Y��s�c=]�k/�,`��F�����w$g��*k.�ءC�^,�V�~j��0�i����eAa���_)����0�d��H���RQ���Si첌��
��%Nv��$<\\�&	�������}��pӠ��X�J)�b��h��m�2�I����F�-&Z7BJ~W[�%���Y�<Q`Y�D��5� &�ě�/r�ވI�#�&CC��%�5�2�F��`-�bqR�a42��Z6��2�#:Yf5��9�1TKP�������U��[�]�:����-_�>�{�S<�z)����
ȶ��a���Ƀe9��Y\'[T/y�H��ȵA�~��K�WйPRnO��e���	�Y�ڇ�B7��%Sk�9�\\	I�&�������[�yQ��7��w��\" .����Zn�}�PIV?L}�a�Gb��O�I��<֡��/~:t̊(dY���r�
��+U�HWX3�Z�#��Ă�\\\"���l�۳ӱݹӵz;���CZL���+�c� �TϣQ8���Z�Ē����]jáN�<���Q��\\K��Ġw��Ă�~�,,�\\	���9BZ���Y�)�=\\.�ww(m�*^���L�^ބ���1���ݭm�����_(�u���i�/Yw�t�u�3B�XR���`�A�����O�P��^~>�4�m�\0��\0+��kk�uqĆ�J{X�#\0*#�LJ�G��z����!<�%<ω����ZW���LX�J�E�{�	�9�U)�dsL2L&(�f)�	\'X��KC��#�`b7�f�q��~���w<���բ31DW�9�@��g�����FԮ�vERMê[�KM��GJ��b�*{fO�2\";p����R��ڷ{B�@��Ț�}��<_��de{#��j�m9��UVݡX���[7�_��b43^m8����芠�.С����`d�XuD�Y��L2��@]=��
�~c�֚.���1�QD_QКJ���@7n׌6�4u�%nw)�l��d��)����i�|Z=�&�h��)�A6qsӛ�����wh�����S.�KtŲ��i�2<�-���)�t`�M�o���:͞�hf�i�]*��}o�ݤ6�V��)�	��uw���U�,�^�����W.]X��?�6��&&F�V�&��<���S_e8���e7K��U�>_��h8��1�\\#��ō���x;p��F�Pl-ѐl��-��R2YJD�^\'�OI.bi��n����
gY�����<�+6}_k1�RAnۓ�6�p�bT\0�,�NA��r��3O�<���g$�0�~v��giZ�q�72cYu�\"��)co��e�T�Q������x��)f7�!������V���ng��p�x��r�;2������II�����+18�1�]�Ys��a�e܁�j��ˤb#��g)����ADֺ�nB<C�9RR�q-`�s)��e���<��\"����7+K��i�E��k���iL0�XC~�˔���!X?OnUiȎ=z�z!��@_|mo�\'`�g����`�����
a�Jz����3Պ�F���6/�N��Y�}�}˜0#�m�J����4C��J��v����c-��EJ:C�ҡ�!g*�	�p?��5�p(��Q~^�B`a�১�n�\'���/�r� N���:咮\'%j;)c?�CG�d����_���I!�	�)^�d�,�}$#k�7��W���z���U� w.�ĵ�a��8W1�<��t���p��6��{)@l�Ϯ�j�Ə	岸a�9KiɈ��΅�M��	0�9�U�]�_��<)č
�a�B$�{�5bt�JoXC���Y7<�*^�]�q3(�F��u�뻋�\'����!^�x%8>3�sU\0�Q2����u[�_�\'���uX^�ұPPX���[dZᬾ���\'[�>�Î�P��e�r��Fl�9*D�uHd`w��4�����E��zg�]X)+_���־5��K��bk�J%<p�.����)�\\�ӭ~��{I��Xр ,��s6!]�ô
�kc�)�r���6�,=Q��6�vk!$�8�[�߬	���E5�z��������)��Z�����Ik&�����ݐ	s,՞��Vָڼ���.��7?Z`{�)b!���_����ֶ��B�?y��ٽP�� Ҁm��G������=���>��,�]�R���a�9���Tz��Z����P��W=����&��X�5�ɴ��Ŷ�̵�I3B@����S��y��o�d�[��m����L+,�����.|��H���Uk��z��=ł\'`�o
a/㲓-a�������Dh�72B��5���T�lE��|��.��͚���?<��ab�����F���<7Hy�E�����,ʺ����9m������h���h�u�tyTt֓
\\�u�l/�3��֘#�/�͇���|�r���x��Y�L�ݮ䜺�
��]bYXR�?�Y����Lv0Fx�!5�L��k\"c���N{u}�~cS��!^�p�^7&�_���,[m�
�����	s�I���4qYpۻ}�ߦ^ �Ar�-��L<�0nC�n�����%W4�B�l\\+�4�{y��C>��Em���`p.ld������8Ч�ՁR���q����u�a��6��()?sI ����%~u}��:�*v-���˩WDL<��]�O��J��>ٴâ\0+nS�?*�|Bп\\R��@�o�ڼ����}��-����~��%��/��}L��0���Ȍ��!�O�T{w}�g��A�;�R���oG���ї��{��O�gܸ�$�����~����Yp��a�4��0��	���ϸ�ڂ��`��~1��83Mа��u�e�����1�M��Q�m���֚佒�ca����|z˭�1�ѱ%��dIX5���K��� ��@�RY�+܅��b��#
,�
��Χ�A�Cg�Uz ��~4��	ATr���

i���NE����;̵����Ϣ�$��45g���L�m����AJ�G��]_��_.y��(���w$G���V����i��*�:m훳R�WWo�aW��iw�����%�
7w�Ɇ�ri��Yn�f\'��0Ͳ�A�?�j�S+kC�ƪ��}�̲��-�3
V�-QYG2��:��j���
V�ӳ���L�F�5��YK�X���[$K�.i��q��=��;7�˺���38ŕ@�(�_�X/�KB	��&�q	٥)��hh���mRWV��M&�9Z
q�ł�R�zq_���ɂ�\\Eg:���t��,��G�S�e�����ܣ�)��Un���P?�M�*n����s�K&x9K�RIT�إ�P�w����l��H����G��a�ˤ#���/5��ʑ��_z�yˉ�9�]���,�~1�e/�C_�t��,�Ho�?��#�gV{��o��Ö�\\�a�}+�-e�z)i�#���v���.o@�E�^���H�2���\"�o�a��Z�.7־.#��zt��gݝ�]v]�z)�_��u���
��>:6�J�
��`�����u��Zf[��:��y�v���;�t݃�i�\'���P�ֻd�ҿ+�ߢȶ�k~r�7\"��|s�
�\"<�\'E��ҹ@���+�y����_�B�t���ٱA\\�ۣ��<�Xuaս�KN�c��z�������(uFŚGo��U_�� )u&���M���Yv�~�c`���ѐ��
P\'%E��
wkO0�X�-�0O��[�q�U�R�-��M��\'J;(c;��.��a��)��$��>X,����5Q�XF��W���0�A��1�{�#��4�.Cxk/�z�O+Z_�������Zߠ_]� �<OV�!-��;�:W�ES&���q���V
k��ַLp�%*���l�tyDT�5�ȍ\\��Cc�醆i�y�T�;F��yY���F�yI�;y�HZТ�������T#:!����JEsK�_-�V�2�򻓍��
�+��ƈ�b��vҺ=	P��{��rJ�W6�����w�=���7�W�Ջ&�d5)\\��^l&Cf�%?�Rjw3q7�JK�z��.#{�%-���A��Q�Q�Ʈq��DE��[��n�\0��l��Z��?)z�X_\\�~KL�,����k��	���|FJt9!�X��R6��W��etzR�0k̏�t�p/s_�#�oǢ��������Jya�֟�C_��w8>_o^UW�8ϓ�V��vD\")ߴ��a���	I�Kl��������p�i
���9-1���%m��
&j@Y*������j�O�a�!!�)G����|B��&�Uuli�VT|_�n�T�sga�ۚM:#�Ǳy�\\�rC�򤼢���{`U��1�ۉ#�ÈO\0�Rg�Z�8����ՙ#sy;������5�t�N��[��Y㲭6��S��
�\\�hR��2pJ0�s�:lwѥ$\'p]���1�T���RA-��);��\'<�2�Kd�a��^�ޮ��$}�aߢX7?t�z����qd.��de��2��j��ei��6����mw\"a==��䌵�=�ͼrI<P.�U�f���~3}�s�\0cD��bW�c��6E4�Ky^d�;��5�����#ry=��e ���$:v�{9`(�y@FJ��v��,�V�W.�g�JΚ{FJymޘ����E�E��0�\'vm��Z����V�Zk���B�g��\\����ɾ/3B���R3b�\0�
�\'a|��f�q��q�7�0ȹ\';����4)E�$$H�R�A*��&��6�����Ҕ��p?�����ΨXC�QI���F���r���>c�7��1T�A�a�VOK)���X��z�~��!(o�����^f#�W6�`������U0%Tj��vr�������@�c��H���j�ݲ3#8�$�kp.�+�Uh����듟�>�Y��j_�m����������h)��+\0c�7��H��Py�Q]�􉇂��h�E{^����Z;QC����Z��b���3�`n
�\"����K�Ȣ��H!z��Aw5C��P�#��v��*�?f���1Fxc�

   
��_,((~%-=�9>�2�<� �V
��}ُe㺻�o~ⱇ�4''{�����qfv�%�������~vƣ��d��DGE��GsA�߬I��w�~@�����,⇐�y[��s�ѳO����Wn���Q���a�=ѳ�K�����hinn�tmݾϜy�SY�9�Kv����7��|B�	xܓ���~�����$�ߖ`��i��i�;���7�d�;��v�;�|"�[Z�[�^���'���M�p��w|�joͿ(�Խ�7�fK��vO~����γgN}43+�Q)��X\�f@7�9�k����?���&'&���Z	,Gi�F��j����>�_��z��bb���Q��ݝm'�|��?\\\L:p��j�r$����B�*��>����?�aEcÅ�i����r�p��������8�-�����QZ?�u���C{��S�++Q�]
�W8���ne�?��c�799�U[[���N~ў舨!����{j��/8��ݵ����f����y9V��������x�e���F���F���(����ŧ���V9&zޡ�o9BD6`^�;���>5::R���7�|�_$�����&��!m���յ:�-tv�߭��i�v�����6������[�CGRJKLl�XVv���Go���>��?V	����w�W �b`J�P��^�?T�kWˡ�ǿ���v��Dd9��8K`j�u:++�{td���q�]Z+���z��|�zY��C�������I/.��TP\�l��f���g3�~JՀ-����`_��K>��R��#Ǿ�_XrJ�~A�� ~�ݞ8������x��5:\���sY�UA<u>j
�Q9DD������������
�_ݽ���
�n��q���h�S/qa����G[b�_��@D4`^�;�J�埛���<�����K[���	����O����@�V~08w�����T���z�=�}}{T��jqIٳ��o+���9�Ě�$c��`�1;3���l����R`�0ﴻ�Jc��j���v���6{Deۯ�lѦ�qq�A���Τk~�!�j�x���l�?ooin��kl�����TIY哪��9_�v�^Q��'�l��
[��e�5c:���ѕ��2��HS��L�5<����lZ&�r���z���x��CG~�����߲b-���ں��.���g����<���5lJ��I�C�ݕ
������	m7�Mi��EOm�z��CG���#ɹ-V�kٓo~n����D�v{����'��*5����ho�Ǟ���[��;񖄈_��GC�	�T�n��W{���H{��W������
�رak���|i���žڊ�w�H3�s;V�G ����[ZZ����<>44T���u%ə�K�DP����K���O�P��ťŘ¢��Uqb�$��觇�G`�Bހ)�>zb|�|�5VW\\���mՐ����� �
&;7��U��Qc6&6nA�Io蘛q�Cڀ)�>cjr:W��Ngj����f���}�`E��cU�<<8P���uK_o�Mcc��|�����&��U^ʗ��:���yY{*���dOt�$$X�����_�dܼ*w����jo��@���o���?^�-��\�
YL��MLL�+ܧ���쇋�G�����Ԥ��hflK��sL���p��ouvvt&��>z����?���G�_�
�׃��͚=l+��z�l�s�ܙO���jn�Z���6���<���L��P�����������?q�ֿMMK�SkU��^/�`*Ø�#��]>p��ꝥ�|3�J�*P�����R5��ёᲕ�;���z��l�KK��mM��K��Tg�X�5a�/4r��;���|���e� ��Kv_w��@)6�mbj��o���Mc+̊)T���/�����+�����LgW��y����/+H޳چ���Mc>���܂�sMW.����3?�?0�700�n��擒����ᇇ�nvNn�j�k=u27�4�T����{A=�g�v���^^Y�]Y^�U�$"�)������x�xyy%֙��e��;�kz�+VB�8����Tg5ZqK��5T΁������L��w�[��K���jF4�

[�̘��f6\�p����ͬ�]XX�h�3b�B%��?NNN�O�$(�)~.&Z�ʕ�WS��tu�ݡ��۟z��������}�~SØ^�'mz%����Ԯ���]�t�W���s***?t��_)��!˰�X�����F#�^�l��KS�/_�h�~Y#b��Y�f�{p���s�>��������i��mjG�r4��p�Ѝ�״�r��/~�ܼ/m���lhh`�j�U���������耂�}%%�/M�'����Z���5����9���y�kl�F���Y������^3Wg�L�D�Wͷ���Yc�����{QN�/+�F���+��Y;[=�ٯ1
Y�3�����ږ榻t^M������y�&$ئ�7d3Y���Y5㜢E�5�T��A�g�0ZK��4SUS���5�J�V��ZU�IcK3,2A�JK������/]���3�~]�p\����(7�7�g����ۚ?x����PB�ʁ�����v��
��?��~n��yAo���qf���-��Ԟ��y����)���9������;�R���4��R�n�������
Z�i����Ng��W
�(e�KU{���
�#��	~�uU��Ѣ�i5۷ʢ�
$)`���g���oz^��Z����s	K�o���v���e
��}Zq���4�����_�*C{�u�^�yM)6��)��u�zZ�fOO��86.v��"���*��S�5oY}���>� 0kjۧ��� O�?���g���CG�\���oA��kMc�����Ɔ�����U1�����m�����?�
����,B~�!>�Y6�Y�Be��zJ_���2:J��W2ɤk9%
ڬ�~ӷ���ڀE+W[)�h�$��uh��5�v����(W��
��1�q�;g��jH���{��*�䈋��V�m�u�
���P�YU�\pL��Tv������v�2��Z�p;��P��Y?ɗ�M���%�O�l�gO���
�;5޵��ɤQh��x솓�ҋ?�|GG����
��p��90	�j�.=v��9��\�x������߲Z_[��������z�EG���-toy�N����7C �
.g��I�2��#n����a�����'��T���Џ�=4e��U|q��l��b�Ihe�k�̢)��]fB��SaV�$([e����k���UՉߪX���	u�M���(mRe��
�v�����ր���lե,�e���N�Dq=r��l�#��h�^���*VH6��Ђ��
�'��t�j�����e��?S�]?��� ��
�@0�h�.�5��y��@��B��a��F�J�_R �j��2S�;g6YQ�]�@���I�OUkO���6� A��+~U��
�@к��q�hY̲�|�7��1�����*��3��i�8�i|���x�4����{��neT��>�������V��Ԟ��Q�A�}]�-�a<-������9h�h�^�&�ZOl�-ߪ8�ez�]���D�����\�0�i��S�����{��T�<�z_��iM�u��g�6��ޖ�p�1+J�xZjAk�L���U�'NY�v��ym˷*Fh���8dv�֦/�>Y�a���K���S���ܼ����3��X�)G����6���Ņń���Ϩ�N��l	өq�
��mf�����q�^M����i���NgS_�A�T~���ε|>����5`&��˯׶�7;8o�%E�Q����������k��~��D�d�n�#����	﬷�rw�#�v�Ay_���C�xn%�~9#3��������ܭ��
_���0<�$�{rr���xmZZz�v�r��2��TQQ�#Z���be���w�]��p�b��l�V��\P\gI�&�@�'n��g�KQ�/ɐ6<i'���'v�oӤ�utl�&��
��T���N��<�
Q~��tv��~�77[��C��0
�S�K3:�Չ�k{5b`?qʹ��3U�JI*hxV�R�8��|GJ����)��=�9�����c���KIMo��]�%��z{�>��_i;
m]l�0u�W���w^5�-!��)0	��#C7��af����E��Kb��Ti��z��yy�/�����Z���y!++��f%�V���,��a�gk=D�0s`���)�i��r��,��^T$��Ԝ���k찆'CNg�U�N��i1qlt�v�\+#3����U�5�t�<h6Q)�O��t�a�ok9Jp0%hƫ3CH�´a+����S�㵞iw���h��0<f�-�N�z�Z�=��p��Bk9�r��23��MN�׏�ߩԎ���׆^ �
.�ݦ��MuK�?}��}}��Y\\����1�������o�#�ё��Z��+;;�Yk������.*����f$߯$�
�Ϸ}նޕ�Sr����Y��1��J{?k
����ܣ��E�c���|�L�/��S��x
�)�M�Z���XXoJJj��f��Xnӌ$�����}�m��c������N���Ύ��T�+yp����e���?����M�� ?���8��z�+�$$Jyw6Z�C�P���<��asc�#����3�s%�zAm�L|�"ݧhY�ӽ&�z'����ԉ]���wi3���G�%`g�0��Wםzܵ���Q�3�U�=*ۭ���s�4�٫zne������t9��ڀ)ΰ����2��{�raag�$��c��ܣ�����1�/�������Ѿ9_��Ug�ۆM��`Z�S.{��C5�S�]c�..-��s���	�3��xÌ2��&����vZ _�Θ�YO�����;�����'�~c���mz��ё#Ŗx�h|\|Pz�f�y�b4d���7e�W}R�0dAo�4�<���si�3���7���`&������ѱ��]����f\}�p^��"���,�jJ�(Y+��bbゲӹ&���u066����k6�@�6��M~�BЀ�ϥ�e\�/_`v�[���1E�t%NS�{�z����>d�6��Û�����˝JNIi{s���b(I;�`���h�O��6ť��z1����7`�v^H��jR գ�����;&�O��2��:>���ɻv�=���vf���^���ɜϗ��I�ɽI��`]
v'&&�i&�T��Z��m��-,���G���ߪ*
�O���`&�-^���K�PrZ�|_0?C�����lVUU��J.js��fURf�9���R��������j������c6I�n׹�G;ai��l�aQ���&��:�7J�.P���	�5b$'G���l�fw�hX5�:J���V[�m�`�fm�iwuww�'�5����ݞH��Mz����j���y�/966f.&6fC��|f�y�X�����׳Ŭ�ݤK�?!��Ò`��B�G����c#wi���(T�a�{*;:Z?��j���*�Nɻf��
~�gg�RT\�]-��R����v~Z%wvE�*h�i[��֖��
j��H���p��lE|�b_+�5�͕u]k���̮�֏wv���~������������,��G$�
���F딻e�	SI�zgmz�6�6_�������Ұ�}���4EQ��n�oJf6����][w�Ϯ�Z�[ukc��_���f�����2��bUS?�.J�p�\��*��n��2//�٪�{��LIk��
��X���ZT
���g�(����K���dE��x�������Q�&%F{6����zU����t��ZT��m�B��u�Mo�޸�2�]c#�/������A�����̺PVV�͔�􆄄Wk<]7����2��W8�5>�����C��'�K=YSW�%-�~,ёDU��`F�k�{Op�'�:�[?���w����5;�Ԃ�kB�?#3��4l�J+~�@zMD&h"�f^�"�3� z��uw�~����>- �S\c�������o+��Y��{��1�K��6�pd*�v�����ݽ=���StNn�����_կ�iӽ�n%g�f�2OTZD�-�f�7Ku�)�ԮdgJ�)�d�C�&Џnd
DT��<�kl�����c�ҾS��v��SݭG�C��~1{��yԐ���dIU_��33KBL5MM$�f}��d�POO�{��:633�����ZY������$;���$K�Dd>�:+���L��fֲj�H��
INSERT INTO login_credentials VALUES("2021-00002","Samuel L. Jackson","1234","Student","","","","false","Hired","","","Not Verifi","Active","1","","0");
INSERT INTO login_credentials VALUES("2021-00003","Rachel K. Green","1234","Student","","","","false","Hired","","","Not Verifi","Active","1","","0");
INSERT INTO login_credentials VALUES("2021-00004","Chanandler M. Bong","1234","Student","","","","false","","","","Not Verifi","Active","1","","0");
INSERT INTO login_credentials VALUES("1","Severus Snape","1234","Faculty","","","","","","","Faculty","Verified","Active","1","�PNG

   
��_,((~%-=�9>�2�<� �V
��}ُe㺻�o~ⱇ�4''{�����qfv�%�������~vƣ��d��DGE��GsA�߬I��w�~@�����,⇐�y[��s�ѳO����Wn���Q���a�=ѳ�K�����hinn�tmݾϜy�SY�9�Kv����7��|B�	xܓ���~�����$�ߖ`��i��i�;���7�d�;��v�;�|"�[Z�[�^���'���M�p��w|�joͿ(�Խ�7�fK��vO~����γgN}43+�Q)��X\�f@7�9�k����?���&'&���Z	,Gi�F��j����>�_��z��bb���Q��ݝm'�|��?\\\L:p��j�r$����B�*��>����?�aEcÅ�i����r�p��������8�-�����QZ?�u���C{��S�++Q�]
�W8���ne�?��c�799�U[[���N~ў舨!����{j��/8��ݵ����f����y9V��������x�e���F���F���(����ŧ���V9&zޡ�o9BD6`^�;���>5::R���7�|�_$�����&��!m���յ:�-tv�߭��i�v�����6������[�CGRJKLl�XVv���Go���>��?V	����w�W �b`J�P��^�?T�kWˡ�ǿ���v��Dd9��8K`j�u:++�{td���q�]Z+���z��|�zY��C�������I/.��TP\�l��f���g3�~JՀ-����`_��K>��R��#Ǿ�_XrJ�~A�� ~�ݞ8������x��5:\���sY�UA<u>j
�Q9DD������������
�_ݽ���
�n��q���h�S/qa����G[b�_��@D4`^�;�J�埛���<�����K[���	����O����@�V~08w�����T���z�=�}}{T��jqIٳ��o+���9�Ě�$c��`�1;3���l����R`�0ﴻ�Jc��j���v���6{Deۯ�lѦ�qq�A���Τk~�!�j�x���l�?ooin��kl�����TIY哪��9_�v�^Q��'�l��
[��e�5c:���ѕ��2��HS��L�5<����lZ&�r���z���x��CG~�����߲b-���ں��.���g����<���5lJ��I�C�ݕ
������	m7�Mi��EOm�z��CG���#ɹ-V�kٓo~n����D�v{����'��*5����ho�Ǟ���[��;񖄈_��GC�	�T�n��W{���H{��W������
�رak���|i���žڊ�w�H3�s;V�G ����[ZZ����<>44T���u%ə�K�DP����K���O�P��ťŘ¢��Uqb�$��觇�G`�Bހ)�>zb|�|�5VW\\���mՐ����� �
&;7��U��Qc6&6nA�Io蘛q�Cڀ)�>cjr:W��Ngj����f���}�`E��cU�<<8P���uK_o�Mcc��|�����&��U^ʗ��:���yY{*���dOt�$$X�����_�dܼ*w����jo��@���o���?^�-��\�
YL��MLL�+ܧ���쇋�G�����Ԥ��hflK��sL���p��ouvvt&��>z����?���G�_�
�׃��͚=l+��z�l�s�ܙO���jn�Z���6���<���L��P�����������?q�ֿMMK�SkU��^/�`*Ø�#��]>p��ꝥ�|3�J�*P�����R5��ёᲕ�;���z��l�KK��mM��K��Tg�X�5a�/4r��;���|���e� ��Kv_w��@)6�mbj��o���Mc+̊)T���/�����+�����LgW��y����/+H޳چ���Mc>���܂�sMW.����3?�?0�700�n��擒����ᇇ�nvNn�j�k=u27�4�T����{A=�g�v���^^Y�]Y^�U�$"�)������x�xyy%֙��e��;�kz�+VB�8����Tg5ZqK��5T΁������L��w�[��K���jF4�

[�̘��f6\�p����ͬ�]XX�h�3b�B%��?NNN�O�$(�)~.&Z�ʕ�WS��tu�ݡ��۟z��������}�~SØ^�'mz%����Ԯ���]�t�W���s***?t��_)��!˰�X�����F#�^�l��KS�/_�h�~Y#b��Y�f�{p���s�>��������i��mjG�r4��p�Ѝ�״�r��/~�ܼ/m���lhh`�j�U���������耂�}%%�/M�'����Z���5����9���y�kl�F���Y������^3Wg�L�D�Wͷ���Yc�����{QN�/+�F���+��Y;[=�ٯ1
Y�3�����ږ榻t^M������y�&$ئ�7d3Y���Y5㜢E�5�T��A�g�0ZK��4SUS���5�J�V��ZU�IcK3,2A�JK������/]���3�~]�p\����(7�7�g����ۚ?x����PB�ʁ�����v��
��?��~n��yAo���qf���-��Ԟ��y����)���9������;�R���4��R�n�������
Z�i����Ng��W
�(e�KU{���
�#��	~�uU��Ѣ�i5۷ʢ�
$)`���g���oz^��Z����s	K�o���v���e
��}Zq���4�����_�*C{�u�^�yM)6��)��u�zZ�fOO��86.v��"���*��S�5oY}���>� 0kjۧ��� O�?���g���CG�\���oA��kMc�����Ɔ�����U1�����m�����?�
����,B~�!>�Y6�Y�Be��zJ_���2:J��W2ɤk9%
ڬ�~ӷ���ڀE+W[)�h�$��uh��5�v����(W��
��1�q�;g��jH���{��*�䈋��V�m�u�
���P�YU�\pL��Tv������v�2��Z�p;��P��Y?ɗ�M���%�O�l�gO���
�;5޵��ɤQh��x솓�ҋ?�|GG����
��p��90	�j�.=v��9��\�x������߲Z_[��������z�EG���-toy�N����7C �
.g��I�2��#n����a�����'��T���Џ�=4e��U|q��l��b�Ihe�k�̢)��]fB��SaV�$([e����k���UՉߪX���	u�M���(mRe��
�v�����ր���lե,�e���N�Dq=r��l�#��h�^���*VH6��Ђ��
�'��t�j�����e��?S�]?��� ��
�@0�h�.�5��y��@��B��a��F�J�_R �j��2S�;g6YQ�]�@���I�OUkO���6� A��+~U��
�@к��q�hY̲�|�7��1�����*��3��i�8�i|���x�4����{��neT��>�������V��Ԟ��Q�A�}]�-�a<-������9h�h�^�&�ZOl�-ߪ8�ez�]���D�����\�0�i��S�����{��T�<�z_��iM�u��g�6��ޖ�p�1+J�xZjAk�L���U�'NY�v��ym˷*Fh���8dv�֦/�>Y�a���K���S���ܼ����3��X�)G����6���Ņń���Ϩ�N��l	өq�
��mf�����q�^M����i���NgS_�A�T~���ε|>����5`&��˯׶�7;8o�%E�Q����������k��~��D�d�n�#����	﬷�rw�#�v�Ay_���C�xn%�~9#3��������ܭ��
_���0<�$�{rr���xmZZz�v�r��2��TQQ�#Z���be���w�]��p�b��l�V��\P\gI�&�@�'n��g�KQ�/ɐ6<i'���'v�oӤ�utl�&��
��T���N��<�
Q~��tv��~�77[��C��0
�S�K3:�Չ�k{5b`?qʹ��3U�JI*hxV�R�8��|GJ����)��=�9�����c���KIMo��]�%��z{�>��_i;
m]l�0u�W���w^5�-!��)0	��#C7��af����E��Kb��Ti��z��yy�/�����Z���y!++��f%�V���,��a�gk=D�0s`���)�i��r��,��^T$��Ԝ���k찆'CNg�U�N��i1qlt�v�\+#3����U�5�t�<h6Q)�O��t�a�ok9Jp0%hƫ3CH�´a+����S�㵞iw���h��0<f�-�N�z�Z�=��p��Bk9�r��23��MN�׏�ߩԎ���׆^ �
.�ݦ��MuK�?}��}}��Y\\����1�������o�#�ё��Z��+;;�Yk������.*����f$߯$�
�Ϸ}նޕ�Sr����Y��1��J{?k
����ܣ��E�c���|�L�/��S��x
�)�M�Z���XXoJJj��f��Xnӌ$�����}�m��c������N���Ύ��T�+yp����e���?����M�� ?���8��z�+�$$Jyw6Z�C�P���<��asc�#����3�s%�zAm�L|�"ݧhY�ӽ&�z'����ԉ]���wi3���G�%`g�0��Wםzܵ���Q�3�U�=*ۭ���s�4�٫zne������t9��ڀ)ΰ����2��{�raag�$��c��ܣ�����1�/�������Ѿ9_��Ug�ۆM��`Z�S.{��C5�S�]c�..-��s���	�3��xÌ2��&����vZ _�Θ�YO�����;�����'�~c���mz��ё#Ŗx�h|\|Pz�f�y�b4d���7e�W}R�0dAo�4�<���si�3���7���`&������ѱ��]����f\}�p^��"���,�jJ�(Y+��bbゲӹ&���u066����k6�@�6��M~�BЀ�ϥ�e\�/_`v�[���1E�t%NS�{�z����>d�6��Û�����˝JNIi{s���b(I;�`���h�O��6ť��z1����7`�v^H��jR գ�����;&�O��2��:>���ɻv�=���vf���^���ɜϗ��I�ɽI��`]
v'&&�i&�T��Z��m��-,���G���ߪ*
�O���`&�-^���K�PrZ�|_0?C�����lVUU��J.js��fURf�9���R��������j������c6I�n׹�G;ai��l�aQ���&��:�7J�.P���	�5b$'G���l�fw�hX5�:J���V[�m�`�fm�iwuww�'�5����ݞH��Mz����j���y�/966f.&6fC��|f�y�X�����׳Ŭ�ݤK�?!��Ò`��B�G����c#wi���(T�a�{*;:Z?��j���*�Nɻf��
~�gg�RT\�]-��R����v~Z%wvE�*h�i[��֖��
j��H���p��lE|�b_+�5�͕u]k���̮�֏wv���~������������,��G$�
���F딻e�	SI�zgmz�6�6_�������Ұ�}���4EQ��n�oJf6����][w�Ϯ�Z�[ukc��_���f�����2��bUS?�.J�p�\��*��n��2//�٪�{��LIk��
��X���ZT
���g�(����K���dE��x�������Q�&%F{6����zU����t��ZT��m�B��u�Mo�޸�2�]c#�/������A�����̺PVV�͔�􆄄Wk<]7����2��W8�5>�����C��'�K=YSW�%-�~,ёDU��`F�k�{Op�'�:�[?���w����5;�Ԃ�kB�?#3��4l�J+~�@zMD&h"�f^�"�3� z��uw�~����>- �S\c�������o+��Y��{��1�K��6�pd*�v�����ݽ=���StNn�����_կ�iӽ�n%g�f�2OTZD�-�f�7Ku�)�ԮdgJ�)�d�C�&Џnd
DT��<�kl�����c�ҾS��v��SݭG�C��~1{��yԐ���dIU_��33KBL5MM$�f}��d�POO�{��:633�����ZY������$;���$K�Dd>�:+���L��fֲj�H��
INSERT INTO login_credentials VALUES("2","Julianne Mitchell","1234","Faculty","","","","","","","Department Head","Verified","Active","1","�PNG

   
��_,((~%-=�9>�2�<� �V
��}ُe㺻�o~ⱇ�4''{�����qfv�%�������~vƣ��d��DGE��GsA�߬I��w�~@�����,⇐�y[��s�ѳO����Wn���Q���a�=ѳ�K�����hinn�tmݾϜy�SY�9�Kv����7��|B�	xܓ���~�����$�ߖ`��i��i�;���7�d�;��v�;�|"�[Z�[�^���'���M�p��w|�joͿ(�Խ�7�fK��vO~����γgN}43+�Q)��X\�f@7�9�k����?���&'&���Z	,Gi�F��j����>�_��z��bb���Q��ݝm'�|��?\\\L:p��j�r$����B�*��>����?�aEcÅ�i����r�p��������8�-�����QZ?�u���C{��S�++Q�]
�W8���ne�?��c�799�U[[���N~ў舨!����{j��/8��ݵ����f����y9V��������x�e���F���F���(����ŧ���V9&zޡ�o9BD6`^�;���>5::R���7�|�_$�����&��!m���յ:�-tv�߭��i�v�����6������[�CGRJKLl�XVv���Go���>��?V	����w�W �b`J�P��^�?T�kWˡ�ǿ���v��Dd9��8K`j�u:++�{td���q�]Z+���z��|�zY��C�������I/.��TP\�l��f���g3�~JՀ-����`_��K>��R��#Ǿ�_XrJ�~A�� ~�ݞ8������x��5:\���sY�UA<u>j
�Q9DD������������
�_ݽ���
�n��q���h�S/qa����G[b�_��@D4`^�;�J�埛���<�����K[���	����O����@�V~08w�����T���z�=�}}{T��jqIٳ��o+���9�Ě�$c��`�1;3���l����R`�0ﴻ�Jc��j���v���6{Deۯ�lѦ�qq�A���Τk~�!�j�x���l�?ooin��kl�����TIY哪��9_�v�^Q��'�l��
[��e�5c:���ѕ��2��HS��L�5<����lZ&�r���z���x��CG~�����߲b-���ں��.���g����<���5lJ��I�C�ݕ
������	m7�Mi��EOm�z��CG���#ɹ-V�kٓo~n����D�v{����'��*5����ho�Ǟ���[��;񖄈_��GC�	�T�n��W{���H{��W������
�رak���|i���žڊ�w�H3�s;V�G ����[ZZ����<>44T���u%ə�K�DP����K���O�P��ťŘ¢��Uqb�$��觇�G`�Bހ)�>zb|�|�5VW\\���mՐ����� �
&;7��U��Qc6&6nA�Io蘛q�Cڀ)�>cjr:W��Ngj����f���}�`E��cU�<<8P���uK_o�Mcc��|�����&��U^ʗ��:���yY{*���dOt�$$X�����_�dܼ*w����jo��@���o���?^�-��\�
YL��MLL�+ܧ���쇋�G�����Ԥ��hflK��sL���p��ouvvt&��>z����?���G�_�
�׃��͚=l+��z�l�s�ܙO���jn�Z���6���<���L��P�����������?q�ֿMMK�SkU��^/�`*Ø�#��]>p��ꝥ�|3�J�*P�����R5��ёᲕ�;���z��l�KK��mM��K��Tg�X�5a�/4r��;���|���e� ��Kv_w��@)6�mbj��o���Mc+̊)T���/�����+�����LgW��y����/+H޳چ���Mc>���܂�sMW.����3?�?0�700�n��擒����ᇇ�nvNn�j�k=u27�4�T����{A=�g�v���^^Y�]Y^�U�$"�)������x�xyy%֙��e��;�kz�+VB�8����Tg5ZqK��5T΁������L��w�[��K���jF4�

[�̘��f6\�p����ͬ�]XX�h�3b�B%��?NNN�O�$(�)~.&Z�ʕ�WS��tu�ݡ��۟z��������}�~SØ^�'mz%����Ԯ���]�t�W���s***?t��_)��!˰�X�����F#�^�l��KS�/_�h�~Y#b��Y�f�{p���s�>��������i��mjG�r4��p�Ѝ�״�r��/~�ܼ/m���lhh`�j�U���������耂�}%%�/M�'����Z���5����9���y�kl�F���Y������^3Wg�L�D�Wͷ���Yc�����{QN�/+�F���+��Y;[=�ٯ1
Y�3�����ږ榻t^M������y�&$ئ�7d3Y���Y5㜢E�5�T��A�g�0ZK��4SUS���5�J�V��ZU�IcK3,2A�JK������/]���3�~]�p\����(7�7�g����ۚ?x����PB�ʁ�����v��
��?��~n��yAo���qf���-��Ԟ��y����)���9������;�R���4��R�n�������
Z�i����Ng��W
�(e�KU{���
�#��	~�uU��Ѣ�i5۷ʢ�
$)`���g���oz^��Z����s	K�o���v���e
��}Zq���4�����_�*C{�u�^�yM)6��)��u�zZ�fOO��86.v��"���*��S�5oY}���>� 0kjۧ��� O�?���g���CG�\���oA��kMc�����Ɔ�����U1�����m�����?�
����,B~�!>�Y6�Y�Be��zJ_���2:J��W2ɤk9%
ڬ�~ӷ���ڀE+W[)�h�$��uh��5�v����(W��
��1�q�;g��jH���{��*�䈋��V�m�u�
���P�YU�\pL��Tv������v�2��Z�p;��P��Y?ɗ�M���%�O�l�gO���
�;5޵��ɤQh��x솓�ҋ?�|GG����
��p��90	�j�.=v��9��\�x������߲Z_[��������z�EG���-toy�N����7C �
.g��I�2��#n����a�����'��T���Џ�=4e��U|q��l��b�Ihe�k�̢)��]fB��SaV�$([e����k���UՉߪX���	u�M���(mRe��
�v�����ր���lե,�e���N�Dq=r��l�#��h�^���*VH6��Ђ��
�'��t�j�����e��?S�]?��� ��
�@0�h�.�5��y��@��B��a��F�J�_R �j��2S�;g6YQ�]�@���I�OUkO���6� A��+~U��
�@к��q�hY̲�|�7��1�����*��3��i�8�i|���x�4����{��neT��>�������V��Ԟ��Q�A�}]�-�a<-������9h�h�^�&�ZOl�-ߪ8�ez�]���D�����\�0�i��S�����{��T�<�z_��iM�u��g�6��ޖ�p�1+J�xZjAk�L���U�'NY�v��ym˷*Fh���8dv�֦/�>Y�a���K���S���ܼ����3��X�)G����6���Ņń���Ϩ�N��l	өq�
��mf�����q�^M����i���NgS_�A�T~���ε|>����5`&��˯׶�7;8o�%E�Q����������k��~��D�d�n�#����	﬷�rw�#�v�Ay_���C�xn%�~9#3��������ܭ��
_���0<�$�{rr���xmZZz�v�r��2��TQQ�#Z���be���w�]��p�b��l�V��\P\gI�&�@�'n��g�KQ�/ɐ6<i'���'v�oӤ�utl�&��
��T���N��<�
Q~��tv��~�77[��C��0
�S�K3:�Չ�k{5b`?qʹ��3U�JI*hxV�R�8��|GJ����)��=�9�����c���KIMo��]�%��z{�>��_i;
m]l�0u�W���w^5�-!��)0	��#C7��af����E��Kb��Ti��z��yy�/�����Z���y!++��f%�V���,��a�gk=D�0s`���)�i��r��,��^T$��Ԝ���k찆'CNg�U�N��i1qlt�v�\+#3����U�5�t�<h6Q)�O��t�a�ok9Jp0%hƫ3CH�´a+����S�㵞iw���h��0<f�-�N�z�Z�=��p��Bk9�r��23��MN�׏�ߩԎ���׆^ �
.�ݦ��MuK�?}��}}��Y\\����1�������o�#�ё��Z��+;;�Yk������.*����f$߯$�
�Ϸ}նޕ�Sr����Y��1��J{?k
����ܣ��E�c���|�L�/��S��x
�)�M�Z���XXoJJj��f��Xnӌ$�����}�m��c������N���Ύ��T�+yp����e���?����M�� ?���8��z�+�$$Jyw6Z�C�P���<��asc�#����3�s%�zAm�L|�"ݧhY�ӽ&�z'����ԉ]���wi3���G�%`g�0��Wםzܵ���Q�3�U�=*ۭ���s�4�٫zne������t9��ڀ)ΰ����2��{�raag�$��c��ܣ�����1�/�������Ѿ9_��Ug�ۆM��`Z�S.{��C5�S�]c�..-��s���	�3��xÌ2��&����vZ _�Θ�YO�����;�����'�~c���mz��ё#Ŗx�h|\|Pz�f�y�b4d���7e�W}R�0dAo�4�<���si�3���7���`&������ѱ��]����f\}�p^��"���,�jJ�(Y+��bbゲӹ&���u066����k6�@�6��M~�BЀ�ϥ�e\�/_`v�[���1E�t%NS�{�z����>d�6��Û�����˝JNIi{s���b(I;�`���h�O��6ť��z1����7`�v^H��jR գ�����;&�O��2��:>���ɻv�=���vf���^���ɜϗ��I�ɽI��`]
v'&&�i&�T��Z��m��-,���G���ߪ*
�O���`&�-^���K�PrZ�|_0?C�����lVUU��J.js��fURf�9���R��������j������c6I�n׹�G;ai��l�aQ���&��:�7J�.P���	�5b$'G���l�fw�hX5�:J���V[�m�`�fm�iwuww�'�5����ݞH��Mz����j���y�/966f.&6fC��|f�y�X�����׳Ŭ�ݤK�?!��Ò`��B�G����c#wi���(T�a�{*;:Z?��j���*�Nɻf��
~�gg�RT\�]-��R����v~Z%wvE�*h�i[��֖��
j��H���p��lE|�b_+�5�͕u]k���̮�֏wv���~������������,��G$�
���F딻e�	SI�zgmz�6�6_�������Ұ�}���4EQ��n�oJf6����][w�Ϯ�Z�[ukc��_���f�����2��bUS?�.J�p�\��*��n��2//�٪�{��LIk��
��X���ZT
���g�(����K���dE��x�������Q�&%F{6����zU����t��ZT��m�B��u�Mo�޸�2�]c#�/������A�����̺PVV�͔�􆄄Wk<]7����2��W8�5>�����C��'�K=YSW�%-�~,ёDU��`F�k�{Op�'�:�[?���w����5;�Ԃ�kB�?#3��4l�J+~�@zMD&h"�f^�"�3� z��uw�~����>- �S\c�������o+��Y��{��1�K��6�pd*�v�����ݽ=���StNn�����_կ�iӽ�n%g�f�2OTZD�-�f�7Ku�)�ԮdgJ�)�d�C�&Џnd
DT��<�kl�����c�ҾS��v��SݭG�C��~1{��yԐ���dIU_��33KBL5MM$�f}��d�POO�{��:633�����ZY������$;���$K�Dd>�:+���L��fֲj�H��
INSERT INTO login_credentials VALUES("10001","Elizabeth L. Poppins","1234","Staff","","","","","","Guidance","Staff","Verified","Active","1","�PNG

   
��_,((~%-=�9>�2�<� �V
��}ُe㺻�o~ⱇ�4''{�����qfv�%�������~vƣ��d��DGE��GsA�߬I��w�~@�����,⇐�y[��s�ѳO����Wn���Q���a�=ѳ�K�����hinn�tmݾϜy�SY�9�Kv����7��|B�	xܓ���~�����$�ߖ`��i��i�;���7�d�;��v�;�|"�[Z�[�^���'���M�p��w|�joͿ(�Խ�7�fK��vO~����γgN}43+�Q)��X\�f@7�9�k����?���&'&���Z	,Gi�F��j����>�_��z��bb���Q��ݝm'�|��?\\\L:p��j�r$����B�*��>����?�aEcÅ�i����r�p��������8�-�����QZ?�u���C{��S�++Q�]
�W8���ne�?��c�799�U[[���N~ў舨!����{j��/8��ݵ����f����y9V��������x�e���F���F���(����ŧ���V9&zޡ�o9BD6`^�;���>5::R���7�|�_$�����&��!m���յ:�-tv�߭��i�v�����6������[�CGRJKLl�XVv���Go���>��?V	����w�W �b`J�P��^�?T�kWˡ�ǿ���v��Dd9��8K`j�u:++�{td���q�]Z+���z��|�zY��C�������I/.��TP\�l��f���g3�~JՀ-����`_��K>��R��#Ǿ�_XrJ�~A�� ~�ݞ8������x��5:\���sY�UA<u>j
�Q9DD������������
�_ݽ���
�n��q���h�S/qa����G[b�_��@D4`^�;�J�埛���<�����K[���	����O����@�V~08w�����T���z�=�}}{T��jqIٳ��o+���9�Ě�$c��`�1;3���l����R`�0ﴻ�Jc��j���v���6{Deۯ�lѦ�qq�A���Τk~�!�j�x���l�?ooin��kl�����TIY哪��9_�v�^Q��'�l��
[��e�5c:���ѕ��2��HS��L�5<����lZ&�r���z���x��CG~�����߲b-���ں��.���g����<���5lJ��I�C�ݕ
������	m7�Mi��EOm�z��CG���#ɹ-V�kٓo~n����D�v{����'��*5����ho�Ǟ���[��;񖄈_��GC�	�T�n��W{���H{��W������
�رak���|i���žڊ�w�H3�s;V�G ����[ZZ����<>44T���u%ə�K�DP����K���O�P��ťŘ¢��Uqb�$��觇�G`�Bހ)�>zb|�|�5VW\\���mՐ����� �
&;7��U��Qc6&6nA�Io蘛q�Cڀ)�>cjr:W��Ngj����f���}�`E��cU�<<8P���uK_o�Mcc��|�����&��U^ʗ��:���yY{*���dOt�$$X�����_�dܼ*w����jo��@���o���?^�-��\�
YL��MLL�+ܧ���쇋�G�����Ԥ��hflK��sL���p��ouvvt&��>z����?���G�_�
�׃��͚=l+��z�l�s�ܙO���jn�Z���6���<���L��P�����������?q�ֿMMK�SkU��^/�`*Ø�#��]>p��ꝥ�|3�J�*P�����R5��ёᲕ�;���z��l�KK��mM��K��Tg�X�5a�/4r��;���|���e� ��Kv_w��@)6�mbj��o���Mc+̊)T���/�����+�����LgW��y����/+H޳چ���Mc>���܂�sMW.����3?�?0�700�n��擒����ᇇ�nvNn�j�k=u27�4�T����{A=�g�v���^^Y�]Y^�U�$"�)������x�xyy%֙��e��;�kz�+VB�8����Tg5ZqK��5T΁������L��w�[��K���jF4�

[�̘��f6\�p����ͬ�]XX�h�3b�B%��?NNN�O�$(�)~.&Z�ʕ�WS��tu�ݡ��۟z��������}�~SØ^�'mz%����Ԯ���]�t�W���s***?t��_)��!˰�X�����F#�^�l��KS�/_�h�~Y#b��Y�f�{p���s�>��������i��mjG�r4��p�Ѝ�״�r��/~�ܼ/m���lhh`�j�U���������耂�}%%�/M�'����Z���5����9���y�kl�F���Y������^3Wg�L�D�Wͷ���Yc�����{QN�/+�F���+��Y;[=�ٯ1
Y�3�����ږ榻t^M������y�&$ئ�7d3Y���Y5㜢E�5�T��A�g�0ZK��4SUS���5�J�V��ZU�IcK3,2A�JK������/]���3�~]�p\����(7�7�g����ۚ?x����PB�ʁ�����v��
��?��~n��yAo���qf���-��Ԟ��y����)���9������;�R���4��R�n�������
Z�i����Ng��W
�(e�KU{���
�#��	~�uU��Ѣ�i5۷ʢ�
$)`���g���oz^��Z����s	K�o���v���e
��}Zq���4�����_�*C{�u�^�yM)6��)��u�zZ�fOO��86.v��"���*��S�5oY}���>� 0kjۧ��� O�?���g���CG�\���oA��kMc�����Ɔ�����U1�����m�����?�
����,B~�!>�Y6�Y�Be��zJ_���2:J��W2ɤk9%
ڬ�~ӷ���ڀE+W[)�h�$��uh��5�v����(W��
��1�q�;g��jH���{��*�䈋��V�m�u�
���P�YU�\pL��Tv������v�2��Z�p;��P��Y?ɗ�M���%�O�l�gO���
�;5޵��ɤQh��x솓�ҋ?�|GG����
��p��90	�j�.=v��9��\�x������߲Z_[��������z�EG���-toy�N����7C �
.g��I�2��#n����a�����'��T���Џ�=4e��U|q��l��b�Ihe�k�̢)��]fB��SaV�$([e����k���UՉߪX���	u�M���(mRe��
�v�����ր���lե,�e���N�Dq=r��l�#��h�^���*VH6��Ђ��
�'��t�j�����e��?S�]?��� ��
�@0�h�.�5��y��@��B��a��F�J�_R �j��2S�;g6YQ�]�@���I�OUkO���6� A��+~U��
�@к��q�hY̲�|�7��1�����*��3��i�8�i|���x�4����{��neT��>�������V��Ԟ��Q�A�}]�-�a<-������9h�h�^�&�ZOl�-ߪ8�ez�]���D�����\�0�i��S�����{��T�<�z_��iM�u��g�6��ޖ�p�1+J�xZjAk�L���U�'NY�v��ym˷*Fh���8dv�֦/�>Y�a���K���S���ܼ����3��X�)G����6���Ņń���Ϩ�N��l	өq�
��mf�����q�^M����i���NgS_�A�T~���ε|>����5`&��˯׶�7;8o�%E�Q����������k��~��D�d�n�#����	﬷�rw�#�v�Ay_���C�xn%�~9#3��������ܭ��
_���0<�$�{rr���xmZZz�v�r��2��TQQ�#Z���be���w�]��p�b��l�V��\P\gI�&�@�'n��g�KQ�/ɐ6<i'���'v�oӤ�utl�&��
��T���N��<�
Q~��tv��~�77[��C��0
�S�K3:�Չ�k{5b`?qʹ��3U�JI*hxV�R�8��|GJ����)��=�9�����c���KIMo��]�%��z{�>��_i;
m]l�0u�W���w^5�-!��)0	��#C7��af����E��Kb��Ti��z��yy�/�����Z���y!++��f%�V���,��a�gk=D�0s`���)�i��r��,��^T$��Ԝ���k찆'CNg�U�N��i1qlt�v�\+#3����U�5�t�<h6Q)�O��t�a�ok9Jp0%hƫ3CH�´a+����S�㵞iw���h��0<f�-�N�z�Z�=��p��Bk9�r��23��MN�׏�ߩԎ���׆^ �
.�ݦ��MuK�?}��}}��Y\\����1�������o�#�ё��Z��+;;�Yk������.*����f$߯$�
�Ϸ}նޕ�Sr����Y��1��J{?k
����ܣ��E�c���|�L�/��S��x
�)�M�Z���XXoJJj��f��Xnӌ$�����}�m��c������N���Ύ��T�+yp����e���?����M�� ?���8��z�+�$$Jyw6Z�C�P���<��asc�#����3�s%�zAm�L|�"ݧhY�ӽ&�z'����ԉ]���wi3���G�%`g�0��Wםzܵ���Q�3�U�=*ۭ���s�4�٫zne������t9��ڀ)ΰ����2��{�raag�$��c��ܣ�����1�/�������Ѿ9_��Ug�ۆM��`Z�S.{��C5�S�]c�..-��s���	�3��xÌ2��&����vZ _�Θ�YO�����;�����'�~c���mz��ё#Ŗx�h|\|Pz�f�y�b4d���7e�W}R�0dAo�4�<���si�3���7���`&������ѱ��]����f\}�p^��"���,�jJ�(Y+��bbゲӹ&���u066����k6�@�6��M~�BЀ�ϥ�e\�/_`v�[���1E�t%NS�{�z����>d�6��Û�����˝JNIi{s���b(I;�`���h�O��6ť��z1����7`�v^H��jR գ�����;&�O��2��:>���ɻv�=���vf���^���ɜϗ��I�ɽI��`]
v'&&�i&�T��Z��m��-,���G���ߪ*
�O���`&�-^���K�PrZ�|_0?C�����lVUU��J.js��fURf�9���R��������j������c6I�n׹�G;ai��l�aQ���&��:�7J�.P���	�5b$'G���l�fw�hX5�:J���V[�m�`�fm�iwuww�'�5����ݞH��Mz����j���y�/966f.&6fC��|f�y�X�����׳Ŭ�ݤK�?!��Ò`��B�G����c#wi���(T�a�{*;:Z?��j���*�Nɻf��
~�gg�RT\�]-��R����v~Z%wvE�*h�i[��֖��
j��H���p��lE|�b_+�5�͕u]k���̮�֏wv���~������������,��G$�
���F딻e�	SI�zgmz�6�6_�������Ұ�}���4EQ��n�oJf6����][w�Ϯ�Z�[ukc��_���f�����2��bUS?�.J�p�\��*��n��2//�٪�{��LIk��
��X���ZT
���g�(����K���dE��x�������Q�&%F{6����zU����t��ZT��m�B��u�Mo�޸�2�]c#�/������A�����̺PVV�͔�􆄄Wk<]7����2��W8�5>�����C��'�K=YSW�%-�~,ёDU��`F�k�{Op�'�:�[?���w����5;�Ԃ�kB�?#3��4l�J+~�@zMD&h"�f^�"�3� z��uw�~����>- �S\c�������o+��Y��{��1�K��6�pd*�v�����ݽ=���StNn�����_կ�iӽ�n%g�f�2OTZD�-�f�7Ku�)�ԮdgJ�)�d�C�&Џnd
DT��<�kl�����c�ҾS��v��SݭG�C��~1{��yԐ���dIU_��33KBL5MM$�f}��d�POO�{��:633�����ZY������$;���$K�Dd>�:+���L��fֲj�H��
INSERT INTO login_credentials VALUES("1000000001","Mare M. Barrow","1234","Staff","","","","","","OSAS","Staff","Verified","Active","1","�PNG

   
��_,((~%-=�9>�2�<� �V
��}ُe㺻�o~ⱇ�4''{�����qfv�%�������~vƣ��d��DGE��GsA�߬I��w�~@�����,⇐�y[��s�ѳO����Wn���Q���a�=ѳ�K�����hinn�tmݾϜy�SY�9�Kv����7��|B�	xܓ���~�����$�ߖ`��i��i�;���7�d�;��v�;�|"�[Z�[�^���'���M�p��w|�joͿ(�Խ�7�fK��vO~����γgN}43+�Q)��X\�f@7�9�k����?���&'&���Z	,Gi�F��j����>�_��z��bb���Q��ݝm'�|��?\\\L:p��j�r$����B�*��>����?�aEcÅ�i����r�p��������8�-�����QZ?�u���C{��S�++Q�]
�W8���ne�?��c�799�U[[���N~ў舨!����{j��/8��ݵ����f����y9V��������x�e���F���F���(����ŧ���V9&zޡ�o9BD6`^�;���>5::R���7�|�_$�����&��!m���յ:�-tv�߭��i�v�����6������[�CGRJKLl�XVv���Go���>��?V	����w�W �b`J�P��^�?T�kWˡ�ǿ���v��Dd9��8K`j�u:++�{td���q�]Z+���z��|�zY��C�������I/.��TP\�l��f���g3�~JՀ-����`_��K>��R��#Ǿ�_XrJ�~A�� ~�ݞ8������x��5:\���sY�UA<u>j
�Q9DD������������
�_ݽ���
�n��q���h�S/qa����G[b�_��@D4`^�;�J�埛���<�����K[���	����O����@�V~08w�����T���z�=�}}{T��jqIٳ��o+���9�Ě�$c��`�1;3���l����R`�0ﴻ�Jc��j���v���6{Deۯ�lѦ�qq�A���Τk~�!�j�x���l�?ooin��kl�����TIY哪��9_�v�^Q��'�l��
[��e�5c:���ѕ��2��HS��L�5<����lZ&�r���z���x��CG~�����߲b-���ں��.���g����<���5lJ��I�C�ݕ
������	m7�Mi��EOm�z��CG���#ɹ-V�kٓo~n����D�v{����'��*5����ho�Ǟ���[��;񖄈_��GC�	�T�n��W{���H{��W������
�رak���|i���žڊ�w�H3�s;V�G ����[ZZ����<>44T���u%ə�K�DP����K���O�P��ťŘ¢��Uqb�$��觇�G`�Bހ)�>zb|�|�5VW\\���mՐ����� �
&;7��U��Qc6&6nA�Io蘛q�Cڀ)�>cjr:W��Ngj����f���}�`E��cU�<<8P���uK_o�Mcc��|�����&��U^ʗ��:���yY{*���dOt�$$X�����_�dܼ*w����jo��@���o���?^�-��\�
YL��MLL�+ܧ���쇋�G�����Ԥ��hflK��sL���p��ouvvt&��>z����?���G�_�
�׃��͚=l+��z�l�s�ܙO���jn�Z���6���<���L��P�����������?q�ֿMMK�SkU��^/�`*Ø�#��]>p��ꝥ�|3�J�*P�����R5��ёᲕ�;���z��l�KK��mM��K��Tg�X�5a�/4r��;���|���e� ��Kv_w��@)6�mbj��o���Mc+̊)T���/�����+�����LgW��y����/+H޳چ���Mc>���܂�sMW.����3?�?0�700�n��擒����ᇇ�nvNn�j�k=u27�4�T����{A=�g�v���^^Y�]Y^�U�$"�)������x�xyy%֙��e��;�kz�+VB�8����Tg5ZqK��5T΁������L��w�[��K���jF4�

[�̘��f6\�p����ͬ�]XX�h�3b�B%��?NNN�O�$(�)~.&Z�ʕ�WS��tu�ݡ��۟z��������}�~SØ^�'mz%����Ԯ���]�t�W���s***?t��_)��!˰�X�����F#�^�l��KS�/_�h�~Y#b��Y�f�{p���s�>��������i��mjG�r4��p�Ѝ�״�r��/~�ܼ/m���lhh`�j�U���������耂�}%%�/M�'����Z���5����9���y�kl�F���Y������^3Wg�L�D�Wͷ���Yc�����{QN�/+�F���+��Y;[=�ٯ1
Y�3�����ږ榻t^M������y�&$ئ�7d3Y���Y5㜢E�5�T��A�g�0ZK��4SUS���5�J�V��ZU�IcK3,2A�JK������/]���3�~]�p\����(7�7�g����ۚ?x����PB�ʁ�����v��
��?��~n��yAo���qf���-��Ԟ��y����)���9������;�R���4��R�n�������
Z�i����Ng��W
�(e�KU{���
�#��	~�uU��Ѣ�i5۷ʢ�
$)`���g���oz^��Z����s	K�o���v���e
��}Zq���4�����_�*C{�u�^�yM)6��)��u�zZ�fOO��86.v��"���*��S�5oY}���>� 0kjۧ��� O�?���g���CG�\���oA��kMc�����Ɔ�����U1�����m�����?�
����,B~�!>�Y6�Y�Be��zJ_���2:J��W2ɤk9%
ڬ�~ӷ���ڀE+W[)�h�$��uh��5�v����(W��
��1�q�;g��jH���{��*�䈋��V�m�u�
���P�YU�\pL��Tv������v�2��Z�p;��P��Y?ɗ�M���%�O�l�gO���
�;5޵��ɤQh��x솓�ҋ?�|GG����
��p��90	�j�.=v��9��\�x������߲Z_[��������z�EG���-toy�N����7C �
.g��I�2��#n����a�����'��T���Џ�=4e��U|q��l��b�Ihe�k�̢)��]fB��SaV�$([e����k���UՉߪX���	u�M���(mRe��
�v�����ր���lե,�e���N�Dq=r��l�#��h�^���*VH6��Ђ��
�'��t�j�����e��?S�]?��� ��
�@0�h�.�5��y��@��B��a��F�J�_R �j��2S�;g6YQ�]�@���I�OUkO���6� A��+~U��
�@к��q�hY̲�|�7��1�����*��3��i�8�i|���x�4����{��neT��>�������V��Ԟ��Q�A�}]�-�a<-������9h�h�^�&�ZOl�-ߪ8�ez�]���D�����\�0�i��S�����{��T�<�z_��iM�u��g�6��ޖ�p�1+J�xZjAk�L���U�'NY�v��ym˷*Fh���8dv�֦/�>Y�a���K���S���ܼ����3��X�)G����6���Ņń���Ϩ�N��l	өq�
��mf�����q�^M����i���NgS_�A�T~���ε|>����5`&��˯׶�7;8o�%E�Q����������k��~��D�d�n�#����	﬷�rw�#�v�Ay_���C�xn%�~9#3��������ܭ��
_���0<�$�{rr���xmZZz�v�r��2��TQQ�#Z���be���w�]��p�b��l�V��\P\gI�&�@�'n��g�KQ�/ɐ6<i'���'v�oӤ�utl�&��
��T���N��<�
Q~��tv��~�77[��C��0
�S�K3:�Չ�k{5b`?qʹ��3U�JI*hxV�R�8��|GJ����)��=�9�����c���KIMo��]�%��z{�>��_i;
m]l�0u�W���w^5�-!��)0	��#C7��af����E��Kb��Ti��z��yy�/�����Z���y!++��f%�V���,��a�gk=D�0s`���)�i��r��,��^T$��Ԝ���k찆'CNg�U�N��i1qlt�v�\+#3����U�5�t�<h6Q)�O��t�a�ok9Jp0%hƫ3CH�´a+����S�㵞iw���h��0<f�-�N�z�Z�=��p��Bk9�r��23��MN�׏�ߩԎ���׆^ �
.�ݦ��MuK�?}��}}��Y\\����1�������o�#�ё��Z��+;;�Yk������.*����f$߯$�
�Ϸ}նޕ�Sr����Y��1��J{?k
����ܣ��E�c���|�L�/��S��x
�)�M�Z���XXoJJj��f��Xnӌ$�����}�m��c������N���Ύ��T�+yp����e���?����M�� ?���8��z�+�$$Jyw6Z�C�P���<��asc�#����3�s%�zAm�L|�"ݧhY�ӽ&�z'����ԉ]���wi3���G�%`g�0��Wםzܵ���Q�3�U�=*ۭ���s�4�٫zne������t9��ڀ)ΰ����2��{�raag�$��c��ܣ�����1�/�������Ѿ9_��Ug�ۆM��`Z�S.{��C5�S�]c�..-��s���	�3��xÌ2��&����vZ _�Θ�YO�����;�����'�~c���mz��ё#Ŗx�h|\|Pz�f�y�b4d���7e�W}R�0dAo�4�<���si�3���7���`&������ѱ��]����f\}�p^��"���,�jJ�(Y+��bbゲӹ&���u066����k6�@�6��M~�BЀ�ϥ�e\�/_`v�[���1E�t%NS�{�z����>d�6��Û�����˝JNIi{s���b(I;�`���h�O��6ť��z1����7`�v^H��jR գ�����;&�O��2��:>���ɻv�=���vf���^���ɜϗ��I�ɽI��`]
v'&&�i&�T��Z��m��-,���G���ߪ*
�O���`&�-^���K�PrZ�|_0?C�����lVUU��J.js��fURf�9���R��������j������c6I�n׹�G;ai��l�aQ���&��:�7J�.P���	�5b$'G���l�fw�hX5�:J���V[�m�`�fm�iwuww�'�5����ݞH��Mz����j���y�/966f.&6fC��|f�y�X�����׳Ŭ�ݤK�?!��Ò`��B�G����c#wi���(T�a�{*;:Z?��j���*�Nɻf��
~�gg�RT\�]-��R����v~Z%wvE�*h�i[��֖��
j��H���p��lE|�b_+�5�͕u]k���̮�֏wv���~������������,��G$�
���F딻e�	SI�zgmz�6�6_�������Ұ�}���4EQ��n�oJf6����][w�Ϯ�Z�[ukc��_���f�����2��bUS?�.J�p�\��*��n��2//�٪�{��LIk��
��X���ZT
���g�(����K���dE��x�������Q�&%F{6����zU����t��ZT��m�B��u�Mo�޸�2�]c#�/������A�����̺PVV�͔�􆄄Wk<]7����2��W8�5>�����C��'�K=YSW�%-�~,ёDU��`F�k�{Op�'�:�[?���w����5;�Ԃ�kB�?#3��4l�J+~�@zMD&h"�f^�"�3� z��uw�~����>- �S\c�������o+��Y��{��1�K��6�pd*�v�����ݽ=���StNn�����_կ�iӽ�n%g�f�2OTZD�-�f�7Ku�)�ԮdgJ�)�d�C�&Џnd
DT��<�kl�����c�ҾS��v��SݭG�C��~1{��yԐ���dIU_��33KBL5MM$�f}��d�POO�{��:633�����ZY������$;���$K�Dd>�:+���L��fֲj�H��
INSERT INTO login_credentials VALUES("1000000002","Tamara J. Webber","1234","Staff","","","","","","Clinic","Staff","Verified","Active","1","�PNG

   
��_,((~%-=�9>�2�<� �V
��}ُe㺻�o~ⱇ�4''{�����qfv�%�������~vƣ��d��DGE��GsA�߬I��w�~@�����,⇐�y[��s�ѳO����Wn���Q���a�=ѳ�K�����hinn�tmݾϜy�SY�9�Kv����7��|B�	xܓ���~�����$�ߖ`��i��i�;���7�d�;��v�;�|"�[Z�[�^���'���M�p��w|�joͿ(�Խ�7�fK��vO~����γgN}43+�Q)��X\�f@7�9�k����?���&'&���Z	,Gi�F��j����>�_��z��bb���Q��ݝm'�|��?\\\L:p��j�r$����B�*��>����?�aEcÅ�i����r�p��������8�-�����QZ?�u���C{��S�++Q�]
�W8���ne�?��c�799�U[[���N~ў舨!����{j��/8��ݵ����f����y9V��������x�e���F���F���(����ŧ���V9&zޡ�o9BD6`^�;���>5::R���7�|�_$�����&��!m���յ:�-tv�߭��i�v�����6������[�CGRJKLl�XVv���Go���>��?V	����w�W �b`J�P��^�?T�kWˡ�ǿ���v��Dd9��8K`j�u:++�{td���q�]Z+���z��|�zY��C�������I/.��TP\�l��f���g3�~JՀ-����`_��K>��R��#Ǿ�_XrJ�~A�� ~�ݞ8������x��5:\���sY�UA<u>j
�Q9DD������������
�_ݽ���
�n��q���h�S/qa����G[b�_��@D4`^�;�J�埛���<�����K[���	����O����@�V~08w�����T���z�=�}}{T��jqIٳ��o+���9�Ě�$c��`�1;3���l����R`�0ﴻ�Jc��j���v���6{Deۯ�lѦ�qq�A���Τk~�!�j�x���l�?ooin��kl�����TIY哪��9_�v�^Q��'�l��
[��e�5c:���ѕ��2��HS��L�5<����lZ&�r���z���x��CG~�����߲b-���ں��.���g����<���5lJ��I�C�ݕ
������	m7�Mi��EOm�z��CG���#ɹ-V�kٓo~n����D�v{����'��*5����ho�Ǟ���[��;񖄈_��GC�	�T�n��W{���H{��W������
�رak���|i���žڊ�w�H3�s;V�G ����[ZZ����<>44T���u%ə�K�DP����K���O�P��ťŘ¢��Uqb�$��觇�G`�Bހ)�>zb|�|�5VW\\���mՐ����� �
&;7��U��Qc6&6nA�Io蘛q�Cڀ)�>cjr:W��Ngj����f���}�`E��cU�<<8P���uK_o�Mcc��|�����&��U^ʗ��:���yY{*���dOt�$$X�����_�dܼ*w����jo��@���o���?^�-��\�
YL��MLL�+ܧ���쇋�G�����Ԥ��hflK��sL���p��ouvvt&��>z����?���G�_�
�׃��͚=l+��z�l�s�ܙO���jn�Z���6���<���L��P�����������?q�ֿMMK�SkU��^/�`*Ø�#��]>p��ꝥ�|3�J�*P�����R5��ёᲕ�;���z��l�KK��mM��K��Tg�X�5a�/4r��;���|���e� ��Kv_w��@)6�mbj��o���Mc+̊)T���/�����+�����LgW��y����/+H޳چ���Mc>���܂�sMW.����3?�?0�700�n��擒����ᇇ�nvNn�j�k=u27�4�T����{A=�g�v���^^Y�]Y^�U�$"�)������x�xyy%֙��e��;�kz�+VB�8����Tg5ZqK��5T΁������L��w�[��K���jF4�

[�̘��f6\�p����ͬ�]XX�h�3b�B%��?NNN�O�$(�)~.&Z�ʕ�WS��tu�ݡ��۟z��������}�~SØ^�'mz%����Ԯ���]�t�W���s***?t��_)��!˰�X�����F#�^�l��KS�/_�h�~Y#b��Y�f�{p���s�>��������i��mjG�r4��p�Ѝ�״�r��/~�ܼ/m���lhh`�j�U���������耂�}%%�/M�'����Z���5����9���y�kl�F���Y������^3Wg�L�D�Wͷ���Yc�����{QN�/+�F���+��Y;[=�ٯ1
Y�3�����ږ榻t^M������y�&$ئ�7d3Y���Y5㜢E�5�T��A�g�0ZK��4SUS���5�J�V��ZU�IcK3,2A�JK������/]���3�~]�p\����(7�7�g����ۚ?x����PB�ʁ�����v��
��?��~n��yAo���qf���-��Ԟ��y����)���9������;�R���4��R�n�������
Z�i����Ng��W
�(e�KU{���
�#��	~�uU��Ѣ�i5۷ʢ�
$)`���g���oz^��Z����s	K�o���v���e
��}Zq���4�����_�*C{�u�^�yM)6��)��u�zZ�fOO��86.v��"���*��S�5oY}���>� 0kjۧ��� O�?���g���CG�\���oA��kMc�����Ɔ�����U1�����m�����?�
����,B~�!>�Y6�Y�Be��zJ_���2:J��W2ɤk9%
ڬ�~ӷ���ڀE+W[)�h�$��uh��5�v����(W��
��1�q�;g��jH���{��*�䈋��V�m�u�
���P�YU�\pL��Tv������v�2��Z�p;��P��Y?ɗ�M���%�O�l�gO���
�;5޵��ɤQh��x솓�ҋ?�|GG����
��p��90	�j�.=v��9��\�x������߲Z_[��������z�EG���-toy�N����7C �
.g��I�2��#n����a�����'��T���Џ�=4e��U|q��l��b�Ihe�k�̢)��]fB��SaV�$([e����k���UՉߪX���	u�M���(mRe��
�v�����ր���lե,�e���N�Dq=r��l�#��h�^���*VH6��Ђ��
�'��t�j�����e��?S�]?��� ��
�@0�h�.�5��y��@��B��a��F�J�_R �j��2S�;g6YQ�]�@���I�OUkO���6� A��+~U��
�@к��q�hY̲�|�7��1�����*��3��i�8�i|���x�4����{��neT��>�������V��Ԟ��Q�A�}]�-�a<-������9h�h�^�&�ZOl�-ߪ8�ez�]���D�����\�0�i��S�����{��T�<�z_��iM�u��g�6��ޖ�p�1+J�xZjAk�L���U�'NY�v��ym˷*Fh���8dv�֦/�>Y�a���K���S���ܼ����3��X�)G����6���Ņń���Ϩ�N��l	өq�
��mf�����q�^M����i���NgS_�A�T~���ε|>����5`&��˯׶�7;8o�%E�Q����������k��~��D�d�n�#����	﬷�rw�#�v�Ay_���C�xn%�~9#3��������ܭ��
_���0<�$�{rr���xmZZz�v�r��2��TQQ�#Z���be���w�]��p�b��l�V��\P\gI�&�@�'n��g�KQ�/ɐ6<i'���'v�oӤ�utl�&��
��T���N��<�
Q~��tv��~�77[��C��0
�S�K3:�Չ�k{5b`?qʹ��3U�JI*hxV�R�8��|GJ����)��=�9�����c���KIMo��]�%��z{�>��_i;
m]l�0u�W���w^5�-!��)0	��#C7��af����E��Kb��Ti��z��yy�/�����Z���y!++��f%�V���,��a�gk=D�0s`���)�i��r��,��^T$��Ԝ���k찆'CNg�U�N��i1qlt�v�\+#3����U�5�t�<h6Q)�O��t�a�ok9Jp0%hƫ3CH�´a+����S�㵞iw���h��0<f�-�N�z�Z�=��p��Bk9�r��23��MN�׏�ߩԎ���׆^ �
.�ݦ��MuK�?}��}}��Y\\����1�������o�#�ё��Z��+;;�Yk������.*����f$߯$�
�Ϸ}նޕ�Sr����Y��1��J{?k
����ܣ��E�c���|�L�/��S��x
�)�M�Z���XXoJJj��f��Xnӌ$�����}�m��c������N���Ύ��T�+yp����e���?����M�� ?���8��z�+�$$Jyw6Z�C�P���<��asc�#����3�s%�zAm�L|�"ݧhY�ӽ&�z'����ԉ]���wi3���G�%`g�0��Wםzܵ���Q�3�U�=*ۭ���s�4�٫zne������t9��ڀ)ΰ����2��{�raag�$��c��ܣ�����1�/�������Ѿ9_��Ug�ۆM��`Z�S.{��C5�S�]c�..-��s���	�3��xÌ2��&����vZ _�Θ�YO�����;�����'�~c���mz��ё#Ŗx�h|\|Pz�f�y�b4d���7e�W}R�0dAo�4�<���si�3���7���`&������ѱ��]����f\}�p^��"���,�jJ�(Y+��bbゲӹ&���u066����k6�@�6��M~�BЀ�ϥ�e\�/_`v�[���1E�t%NS�{�z����>d�6��Û�����˝JNIi{s���b(I;�`���h�O��6ť��z1����7`�v^H��jR գ�����;&�O��2��:>���ɻv�=���vf���^���ɜϗ��I�ɽI��`]
v'&&�i&�T��Z��m��-,���G���ߪ*
�O���`&�-^���K�PrZ�|_0?C�����lVUU��J.js��fURf�9���R��������j������c6I�n׹�G;ai��l�aQ���&��:�7J�.P���	�5b$'G���l�fw�hX5�:J���V[�m�`�fm�iwuww�'�5����ݞH��Mz����j���y�/966f.&6fC��|f�y�X�����׳Ŭ�ݤK�?!��Ò`��B�G����c#wi���(T�a�{*;:Z?��j���*�Nɻf��
~�gg�RT\�]-��R����v~Z%wvE�*h�i[��֖��
j��H���p��lE|�b_+�5�͕u]k���̮�֏wv���~������������,��G$�
���F딻e�	SI�zgmz�6�6_�������Ұ�}���4EQ��n�oJf6����][w�Ϯ�Z�[ukc��_���f�����2��bUS?�.J�p�\��*��n��2//�٪�{��LIk��
��X���ZT
���g�(����K���dE��x�������Q�&%F{6����zU����t��ZT��m�B��u�Mo�޸�2�]c#�/������A�����̺PVV�͔�􆄄Wk<]7����2��W8�5>�����C��'�K=YSW�%-�~,ёDU��`F�k�{Op�'�:�[?���w����5;�Ԃ�kB�?#3��4l�J+~�@zMD&h"�f^�"�3� z��uw�~����>- �S\c�������o+��Y��{��1�K��6�pd*�v�����ݽ=���StNn�����_կ�iӽ�n%g�f�2OTZD�-�f�7Ku�)�ԮdgJ�)�d�C�&Џnd
DT��<�kl�����c�ҾS��v��SݭG�C��~1{��yԐ���dIU_��33KBL5MM$�f}��d�POO�{��:633�����ZY������$;���$K�Dd>�:+���L��fֲj�H��
INSERT INTO login_credentials VALUES("superadmin","","12324","SUPERADMIN","","","","","","","","","","1","","0");



CREATE TABLE `mode_of_communication` (
  `mode_id` int(11) NOT NULL AUTO_INCREMENT,
  `communication_mode` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`mode_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO mode_of_communication VALUES("1","Messenger");
INSERT INTO mode_of_communication VALUES("2","Cellphone");
INSERT INTO mode_of_communication VALUES("3","Google Meet");
INSERT INTO mode_of_communication VALUES("4","Zoom");
INSERT INTO mode_of_communication VALUES("5","Face to Face");



CREATE TABLE `notif` (
  `notif_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(10) DEFAULT NULL,
  `message_body` varchar(200) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `link` varchar(1000) NOT NULL DEFAULT '#',
  `message_status` varchar(100) NOT NULL DEFAULT 'Delivered',
  `office_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`notif_id`),
  KEY `fk_notif_office_id_idx` (`office_id`),
  CONSTRAINT `fk_notif_office_id` FOREIGN KEY (`office_id`) REFERENCES `office` (`office_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=338 DEFAULT CHARSET=utf8mb4;

INSERT INTO notif VALUES("249","","Elementary Education Department's Head has submitted a requisition form.","2021-09-15 21:41:35","../users/Osas/Labor-Requisition.php","Seen","1");
INSERT INTO notif VALUES("250","1","OSAS has Approved your requisition form.","2021-09-15 21:43:49","../users/Faculty/Labor-Requisition.php","Seen","");
INSERT INTO notif VALUES("251","1","Osas has posted your student labor requisition form #00000000028","2021-09-15 21:44:03","../users/Faculty/Labor-Requisition.php","Seen","");
INSERT INTO notif VALUES("252","1","A student has responded to your student labor request.","2021-09-15 21:45:50","../users/Faculty/Labor-Applicants.php","Seen","");
INSERT INTO notif VALUES("253","","A student has responded to a job posting.","2021-09-15 21:45:50","../users/Osas/Labor-Application.php","Seen","1");
INSERT INTO notif VALUES("255","","A recommendation letter has been attached to application #0000000018","2021-09-15 21:47:28","../users/Osas/Labor-Application.php","Seen","1");
INSERT INTO notif VALUES("257","","A recommendation letter has been attached to application #0000000018","2021-09-15 21:48:32","../users/Osas/Labor-Application.php","Seen","1");
INSERT INTO notif VALUES("260","","A recommendation letter has been attached to application #0000000018","2021-09-15 21:49:31","../users/Osas/Labor-Application.php","Seen","1");
INSERT INTO notif VALUES("261","1","Congratulations! You have a new addition to your staff. Aelin Galathynius has been officially hired!","2021-09-15 21:49:31","../users/Faculty/Labor-Applicants.php","Seen","");
INSERT INTO notif VALUES("262","","Aelin Galathynius has signed his/her student labor application contract!","2021-09-15 21:49:31","../users/Osas/Labor-Application.php","Seen","1");
INSERT INTO notif VALUES("263","1","Osas has posted your student labor requisition form #00000000028","2021-09-15 21:49:31","../users/Faculty/Labor-Requisition.php","Seen","");
INSERT INTO notif VALUES("264","","IT Department's Head has submitted a requisition form.","2021-09-17 22:26:27","../users/Osas/Labor-Requisition.php","Seen","1");
INSERT INTO notif VALUES("265","2","OSAS has Approved your requisition form.","2021-09-17 22:27:40","../users/Faculty/Labor-Requisition.php","Delivered","");
INSERT INTO notif VALUES("266","2","Osas has posted your student labor requisition form #00000000029","2021-09-17 22:27:53","../users/Faculty/Labor-Requisition.php","Delivered","");
INSERT INTO notif VALUES("267","2","A student has responded to your student labor request.","2021-10-24 23:21:07","../users/Faculty/Labor-Applicants.php","Seen","");
INSERT INTO notif VALUES("268","","A student has responded to a job posting.","2021-10-24 23:21:07","../users/Osas/Labor-Application.php","Seen","1");
INSERT INTO notif VALUES("270","","A recommendation letter has been attached to application #0000000019","2021-10-24 23:24:00","../users/Osas/Labor-Application.php","Seen","1");
INSERT INTO notif VALUES("272","","A recommendation letter has been attached to application #0000000019","2021-10-24 23:28:46","../users/Osas/Labor-Application.php","Seen","1");
INSERT INTO notif VALUES("275","","A recommendation letter has been attached to application #0000000019","2021-10-24 23:29:42","../users/Osas/Labor-Application.php","Seen","1");
INSERT INTO notif VALUES("276","2","Congratulations! You have a new addition to your staff. Lisandra Arachnid has been officially hired!","2021-10-24 23:29:42","../users/Faculty/Labor-Applicants.php","Delivered","");
INSERT INTO notif VALUES("277","","Lisandra Arachnid has signed his/her student labor application contract!","2021-10-24 23:29:42","../users/Osas/Labor-Application.php","Seen","1");
INSERT INTO notif VALUES("278","2","Osas has posted your student labor requisition form #00000000029","2021-10-24 23:29:42","../users/Faculty/Labor-Requisition.php","Delivered","");
INSERT INTO notif VALUES("285","","Aelin Galathynius has submitted an accomplishment report for the month of September","2021-10-25 23:11:36","../users/Osas/Labor-Accomplishment.php","Seen","1");
INSERT INTO notif VALUES("286","1","Aelin Galathynius has submitted an accomplishment report for the month of September","2021-10-25 23:11:36","../users/Faculty/Faculty-Accomplishment.php","Seen","");
INSERT INTO notif VALUES("287","","Elementary Education Department's Head has submitted a requisition form.","2021-10-27 19:40:53","../users/Osas/Labor-Requisition.php","Seen","1");
INSERT INTO notif VALUES("288","1","OSAS has Approved your requisition form.","2021-10-27 19:43:14","../users/Faculty/Labor-Requisition.php","Seen","");
INSERT INTO notif VALUES("289","1","Osas has posted your student labor requisition form #00000000030","2021-10-27 19:43:41","../users/Faculty/Labor-Requisition.php","Seen","");
INSERT INTO notif VALUES("290","1","A student has responded to your student labor request.","2021-10-27 19:47:46","../users/Faculty/Labor-Applicants.php","Seen","");
INSERT INTO notif VALUES("291","","A student has responded to a job posting.","2021-10-27 19:47:46","../users/Osas/Labor-Application.php","Delivered","1");
INSERT INTO notif VALUES("292","1","A student has responded to your student labor request.","2021-10-27 19:50:32","../users/Faculty/Labor-Applicants.php","Delivered","");
INSERT INTO notif VALUES("293","","A student has responded to a job posting.","2021-10-27 19:50:32","../users/Osas/Labor-Application.php","Delivered","1");
INSERT INTO notif VALUES("295","","A recommendation letter has been attached to application #0000000020","2021-10-27 19:53:18","../users/Osas/Labor-Application.php","Seen","1");
INSERT INTO notif VALUES("297","","A recommendation letter has been attached to application #0000000020","2021-10-27 19:55:10","../users/Osas/Labor-Application.php","Seen","1");
INSERT INTO notif VALUES("300","","A recommendation letter has been attached to application #0000000020","2021-10-27 19:56:51","../users/Osas/Labor-Application.php","Delivered","1");
INSERT INTO notif VALUES("301","1","Congratulations! You have a new addition to your staff. Samuel L. Jackson has been officially hired!","2021-10-27 19:56:51","../users/Faculty/Labor-Applicants.php","Delivered","");
INSERT INTO notif VALUES("302","","Samuel L. Jackson has signed his/her student labor application contract!","2021-10-27 19:56:51","../users/Osas/Labor-Application.php","Delivered","1");
INSERT INTO notif VALUES("303","1","A student has responded to your student labor request.","2021-10-27 20:11:26","../users/Faculty/Labor-Applicants.php","Seen","");
INSERT INTO notif VALUES("304","","A student has responded to a job posting.","2021-10-27 20:11:26","../users/Osas/Labor-Application.php","Delivered","1");
INSERT INTO notif VALUES("306","","A recommendation letter has been attached to application #0000000021","2021-10-27 20:12:00","../users/Osas/Labor-Application.php","Seen","1");
INSERT INTO notif VALUES("308","","A recommendation letter has been attached to application #0000000021","2021-10-27 20:12:53","../users/Osas/Labor-Application.php","Delivered","1");
INSERT INTO notif VALUES("311","","A recommendation letter has been attached to application #0000000021","2021-10-27 20:13:50","../users/Osas/Labor-Application.php","Delivered","1");
INSERT INTO notif VALUES("312","1","Congratulations! You have a new addition to your staff. Rachel K. Green has been officially hired!","2021-10-27 20:13:50","../users/Faculty/Labor-Applicants.php","Seen","");
INSERT INTO notif VALUES("313","","Rachel K. Green has signed his/her student labor application contract!","2021-10-27 20:13:50","../users/Osas/Labor-Application.php","Seen","1");
INSERT INTO notif VALUES("314","2021-00004","Your student labor application has not been approved.","2021-10-27 20:13:50","../users/Student/index.php","Seen","");
INSERT INTO notif VALUES("315","1","Osas has posted your student labor requisition form #00000000030","2021-10-27 20:13:50","../users/Faculty/Labor-Requisition.php","Delivered","");
INSERT INTO notif VALUES("316","","Samuel L. Jackson has submitted an accomplishment report for the month of October","2021-10-27 20:18:08","../users/Osas/Labor-Accomplishment.php","Seen","1");
INSERT INTO notif VALUES("317","","Aelin Galathynius has submitted an accomplishment report for the month of October","2021-10-28 07:02:33","../users/Osas/Labor-Accomplishment.php","Seen","1");
INSERT INTO notif VALUES("318","1","Aelin Galathynius has submitted an accomplishment report for the month of October","2021-10-28 07:02:33","../users/Faculty/Faculty-Accomplishment.php","Seen","");
INSERT INTO notif VALUES("319","","Aelin Galathynius has submitted an accomplishment report for the month of August","2021-10-29 16:56:22","../users/Osas/Labor-Accomplishment.php","Delivered","1");
INSERT INTO notif VALUES("320","1","Aelin Galathynius has submitted an accomplishment report for the month of August","2021-10-29 16:56:22","../users/Faculty/Faculty-Accomplishment.php","Seen","");
INSERT INTO notif VALUES("321","","A Unit Head has submitted his/her ratings for an applicant for the month of August 2021","2021-10-29 17:27:26","../users/Osas/Labor-Accomplishment.php","Seen","1");
INSERT INTO notif VALUES("322","","IT Department's Head has submitted a requisition form.","2021-10-31 17:21:50","../users/Osas/Labor-Requisition.php","Seen","1");
INSERT INTO notif VALUES("323","2","OSAS has Approved your requisition form.","2021-10-31 17:22:26","../users/Faculty/Labor-Requisition.php","Seen","");
INSERT INTO notif VALUES("324","2","Osas has posted your student labor requisition form #00000000031","2021-10-31 19:31:25","../users/Faculty/Labor-Requisition.php","Delivered","");
INSERT INTO notif VALUES("325","2","Osas has posted your student labor requisition form #00000000031","2021-10-31 19:41:49","../users/Faculty/Labor-Requisition.php","Delivered","");
INSERT INTO notif VALUES("326","","Elementary Education Department's Head has submitted a requisition form.","2021-10-31 20:19:02","../users/Osas/Labor-Requisition.php","Seen","1");
INSERT INTO notif VALUES("327","1","OSAS has Approved your requisition form.","2021-10-31 20:19:27","../users/Faculty/Labor-Requisition.php","Delivered","");
INSERT INTO notif VALUES("328","1","Osas has posted your student labor requisition form #00000000032","2021-10-31 20:20:12","../users/Faculty/Labor-Requisition.php","Delivered","");
INSERT INTO notif VALUES("329","1","A student has responded to your student labor request.","2021-10-31 20:21:57","../users/Faculty/Labor-Applicants.php","Seen","");
INSERT INTO notif VALUES("330","","A student has responded to a job posting.","2021-10-31 20:21:57","../users/Osas/Labor-Application.php","Seen","1");
INSERT INTO notif VALUES("331","2019-00101","Congratulations! Your application has been approved by the Unit Head!","2021-10-31 21:04:06","../users/Student/index.php","Delivered","");
INSERT INTO notif VALUES("332","","A recommendation letter has been attached to application #0000000023","2021-10-31 21:04:06","../users/Osas/Labor-Application.php","Delivered","1");
INSERT INTO notif VALUES("333","2019-00101","Congratulations! Your application has been approved by the Unit Head!","2021-10-31 21:04:39","../users/Student/index.php","Delivered","");
INSERT INTO notif VALUES("334","","A recommendation letter has been attached to application #0000000023","2021-10-31 21:04:39","../users/Osas/Labor-Application.php","Seen","1");
INSERT INTO notif VALUES("335","","Lisandra Arachnid has submitted an accomplishment report for the month of October","2021-11-02 11:36:04","../users/Osas/Labor-Accomplishment.php","Delivered","1");
INSERT INTO notif VALUES("336","2","Lisandra Arachnid has submitted an accomplishment report for the month of October","2021-11-02 11:36:05","../users/Faculty/Faculty-Accomplishment.php","Delivered","");
INSERT INTO notif VALUES("337","1","A student requests for a new password.","2021-11-03 15:32:22","ForgotPassword_Requests.php","Seen","");



CREATE TABLE `office` (
  `office_id` int(11) NOT NULL AUTO_INCREMENT,
  `office_name` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`office_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

INSERT INTO office VALUES("1","OSAS","Active");
INSERT INTO office VALUES("2","Scholarship","Active");
INSERT INTO office VALUES("3","Clinic","Active");
INSERT INTO office VALUES("4","Guidance","Active");
INSERT INTO office VALUES("5","Registrar","Active");
INSERT INTO office VALUES("6","NSTP Office","Active");



CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `office_dept_heads` AS select `o`.`office_id` AS `id`,`o`.`office_name` AS `name`,'Office' AS `office_type`,`s`.`staff_id` AS `staff_id`,`s`.`fullname` AS `fullname`,`s`.`access_level` AS `access_level`,`o`.`status` AS `status` from (`office` `o` left join `staffdetails` `s` on(`s`.`office_id` = `o`.`office_id` and `s`.`access_level` = 1 and `s`.`account_status` = 'Active')) union select `d`.`dept_id` AS `id`,`d`.`dept_name` AS `name`,'Department' AS `office_type`,`s`.`staff_id` AS `staff_id`,`s`.`fullname` AS `fullname`,`s`.`access_level` AS `access_level`,`d`.`status` AS `status` from (`department` `d` left join `staffdetails` `s` on(`s`.`dept_id` = `d`.`dept_id` and `s`.`access_level` = 1 and `s`.`account_status` = 'Active'));

INSERT INTO office_dept_heads VALUES("4","Guidance","Office","10001","Elizabeth L. Poppins","1","Active");
INSERT INTO office_dept_heads VALUES("1","OSAS","Office","1000000001","Mare M. Barrow","1","Active");
INSERT INTO office_dept_heads VALUES("3","Clinic","Office","1000000002","Tamara J. Webber","1","Active");
INSERT INTO office_dept_heads VALUES("2","Scholarship","Office","","","","Active");
INSERT INTO office_dept_heads VALUES("5","Registrar","Office","","","","Active");
INSERT INTO office_dept_heads VALUES("6","NSTP Office","Office","","","","Active");
INSERT INTO office_dept_heads VALUES("5","Elementary Education Department","Department","1","Severus Snape","1","Active");
INSERT INTO office_dept_heads VALUES("1","IT Department","Department","2","Julianne Mitchell","1","Active");
INSERT INTO office_dept_heads VALUES("2","Ag-Eng Department","Department","","","","Active");
INSERT INTO office_dept_heads VALUES("3","Special Needs Dept","Department","","","","Active");
INSERT INTO office_dept_heads VALUES("4","English Department","Department","","","","Active");
INSERT INTO office_dept_heads VALUES("9","Engineers","Department","","","","Active");



CREATE TABLE `org_applications` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Org_Name` varchar(50) NOT NULL,
  `Org_President_Governor` varchar(25) NOT NULL,
  `Org_Adviser` varchar(25) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `App_letter` varchar(250) NOT NULL,
  `MVS` varchar(250) NOT NULL,
  `Aff_Lead` varchar(250) NOT NULL,
  `Resolution` varchar(250) NOT NULL,
  `Letter_Permission` varchar(250) NOT NULL,
  `Letter_content` varchar(250) NOT NULL,
  `Lists` varchar(250) NOT NULL,
  `ConsLaw` varchar(250) NOT NULL,
  `Logo` varchar(250) NOT NULL,
  `Letter_intent` varchar(250) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `org_applications_files` (
  `Num` int(11) NOT NULL AUTO_INCREMENT,
  `org_name` varchar(50) NOT NULL,
  `file` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  PRIMARY KEY (`Num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `org_filess` (
  `ID` int(16) NOT NULL,
  `Org` varchar(50) NOT NULL,
  `Org_pres_gov` varchar(25) NOT NULL,
  `Org_adviser` varchar(25) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `WFP` varchar(50) NOT NULL,
  `PPMP` varchar(50) NOT NULL,
  `AccomRep` varchar(50) NOT NULL,
  `ActionPlan` varchar(50) NOT NULL,
  `AFS` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `organization_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `org_id` int(11) NOT NULL,
  `student_id` varchar(10) NOT NULL,
  `position` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`id`),
  KEY `org_id` (`org_id`),
  KEY `student_id` (`student_id`),
  CONSTRAINT `Organization_Member_ibfk_1` FOREIGN KEY (`org_id`) REFERENCES `school_organization` (`org_id`),
  CONSTRAINT `Organization_Member_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`Student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `participants` (
  `participant_id` int(11) NOT NULL AUTO_INCREMENT,
  `grp_guidance_id` int(11) DEFAULT NULL,
  `Student_id` varchar(10) NOT NULL,
  `attendance` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`participant_id`),
  KEY `fk_gg_guidance_id` (`grp_guidance_id`),
  KEY `fk_gg_stud_id` (`Student_id`),
  CONSTRAINT `fk_gg_guidance_id` FOREIGN KEY (`grp_guidance_id`) REFERENCES `group_guidance` (`grp_guidance_id`) ON DELETE NO ACTION,
  CONSTRAINT `fk_gg_stud_id` FOREIGN KEY (`Student_id`) REFERENCES `student` (`Student_id`) ON DELETE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `patient_health_record_medical` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `date_filled_out_by_nurse` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `patient_list` AS select `i`.`patient_id` AS `patient_id`,`s`.`first_name` AS `first_name`,`s`.`last_name` AS `last_name`,`s`.`middle_name` AS `middle_name`,`SF_GET_FULL_ADDRESS`(`s`.`house_block_lot_num`,`s`.`street`,`s`.`prk_vill_sub`,`s`.`brgy`,`s`.`city`,`s`.`province`) AS `address`,`SF_GET_AGE`(`s`.`birth_date`) AS `age`,`s`.`email_add` AS `email_add`,`s`.`phone_number` AS `phone_number`,`SF_GET_DATA_FROM_COURSE_BY_ID`('title',`s`.`course_id`) AS `course_department`,'Student' AS `type`,`s`.`sex` AS `sex`,`i`.`admitted` AS `admitted`,`i`.`admitted_illness` AS `admitted_illness`,`i`.`admitted_illness_start` AS `admitted_illness_start`,`i`.`operation` AS `operation`,`i`.`operation_kind` AS `operation_kind`,`i`.`operation_when` AS `operation_when`,`i`.`infectious_disease` AS `infectious_disease`,`i`.`headaches` AS `headaches`,`f`.`mens_age_start` AS `mens_age_start`,`f`.`mens_regular` AS `mens_regular`,`f`.`mens_irregular` AS `mens_irregular`,`f`.`dysmenorrhea` AS `dysmenorrhea`,`f`.`pms` AS `pms` from ((`clinic_patient_info` `i` join `student` `s` on(`s`.`Student_id` = `i`.`patient_id`)) left join `clinic_patient_info_female` `f` on(`f`.`patient_id` = `i`.`patient_id`)) union select `i`.`patient_id` AS `patient_id`,`st`.`first_name` AS `first_name`,`st`.`last_name` AS `last_name`,`st`.`middle_name` AS `middle_name`,`st`.`address` AS `address`,`SF_GET_AGE`(`st`.`birthdate`) AS `age`,`st`.`email_add` AS `email_add`,`st`.`phone_num` AS `phone_number`,if(`SF_GET_DATA_FROM_DEPARTMENT_BY_ID`('dept_name',`st`.`dept_id`) is null,`SF_GET_OFFICE_NAME`(`st`.`office_id`),`SF_GET_DATA_FROM_DEPARTMENT_BY_ID`('dept_name',`st`.`dept_id`)) AS `course_department`,`st`.`type` AS `type`,`st`.`sex` AS `sex`,`i`.`admitted` AS `admitted`,`i`.`admitted_illness` AS `admitted_illness`,`i`.`admitted_illness_start` AS `admitted_illness_start`,`i`.`operation` AS `operation`,`i`.`operation_kind` AS `operation_kind`,`i`.`operation_when` AS `operation_when`,`i`.`infectious_disease` AS `infectious_disease`,`i`.`headaches` AS `headaches`,`f`.`mens_age_start` AS `mens_age_start`,`f`.`mens_regular` AS `mens_regular`,`f`.`mens_irregular` AS `mens_irregular`,`f`.`dysmenorrhea` AS `dysmenorrhea`,`f`.`pms` AS `pms` from ((`clinic_patient_info` `i` join `staff` `st` on(`st`.`staff_id` = `i`.`patient_id`)) left join `clinic_patient_info_female` `f` on(`f`.`patient_id` = `i`.`patient_id`));




CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `promotional_report` AS select `el`.`id` AS `id`,`el`.`Student_id` AS `student_id`,`el`.`semester` AS `semester`,`el`.`schoolyear` AS `schoolyear`,`s`.`last_name` AS `last_name`,`s`.`first_name` AS `first_name`,`s`.`middle_name` AS `middle_name`,`s`.`suffix` AS `suffix`,`s`.`sex` AS `sex`,date_format(`s`.`birth_date`,'%m/%d/%Y') AS `birthdate`,`SF_GET_COURSE_NAME`(`s`.`course_id`) AS `course`,`el`.`student_yearlevel` AS `student_yearlevel`,`el`.`subject_code1` AS `subject_code1`,`SF_GET_DATA_FROM_SUBJECT_BY_ID`('subject_description',`el`.`subject_code1`) AS `sub_desc1`,`el`.`units1` AS `units1`,`el`.`grade1` AS `grade1`,`el`.`subject_code2` AS `subject_code2`,`SF_GET_DATA_FROM_SUBJECT_BY_ID`('subject_description',`el`.`subject_code2`) AS `sub_desc2`,`el`.`units2` AS `units2`,`el`.`grade2` AS `grade2`,`el`.`subject_code3` AS `subject_code3`,`SF_GET_DATA_FROM_SUBJECT_BY_ID`('subject_description',`el`.`subject_code3`) AS `sub_desc3`,`el`.`units3` AS `units3`,`el`.`grade3` AS `grade3`,`el`.`subject_code4` AS `subject_code4`,`SF_GET_DATA_FROM_SUBJECT_BY_ID`('subject_description',`el`.`subject_code4`) AS `sub_desc4`,`el`.`units4` AS `units4`,`el`.`grade4` AS `grade4`,`el`.`subject_code5` AS `subject_code5`,`SF_GET_DATA_FROM_SUBJECT_BY_ID`('subject_description',`el`.`subject_code5`) AS `sub_desc5`,`el`.`units5` AS `units5`,`el`.`grade5` AS `grade5`,`el`.`subject_code6` AS `subject_code6`,`SF_GET_DATA_FROM_SUBJECT_BY_ID`('subject_description',`el`.`subject_code6`) AS `sub_desc6`,`el`.`units6` AS `units6`,`el`.`grade6` AS `grade6`,`el`.`subject_code7` AS `subject_code7`,`SF_GET_DATA_FROM_SUBJECT_BY_ID`('subject_description',`el`.`subject_code7`) AS `sub_desc7`,`el`.`units7` AS `units7`,`el`.`grade7` AS `grade7`,`el`.`subject_code8` AS `subject_code8`,`SF_GET_DATA_FROM_SUBJECT_BY_ID`('subject_description',`el`.`subject_code8`) AS `sub_desc8`,`el`.`units8` AS `units8`,`el`.`grade8` AS `grade8`,`el`.`subject_code9` AS `subject_code9`,`SF_GET_DATA_FROM_SUBJECT_BY_ID`('subject_description',`el`.`subject_code9`) AS `sub_desc9`,`el`.`units9` AS `units9`,`el`.`grade9` AS `grade9`,if(`el`.`units1` is null,0,`el`.`units1`) + if(`el`.`units2` is null,0,`el`.`units2`) + if(`el`.`units3` is null,0,`el`.`units3`) + if(`el`.`units4` is null,0,`el`.`units4`) + if(`el`.`units5` is null,0,`el`.`units5`) + if(`el`.`units6` is null,0,`el`.`units6`) + if(`el`.`units7` is null,0,`el`.`units7`) + if(`el`.`units8` is null,0,`el`.`units8`) + if(`el`.`units9` is null,0,`el`.`units9`) AS `totalunits`,'' AS `gwa`,if(`s`.`type` = 'Graduate','Yes','No') AS `graduate_question` from (`enrollment_list` `el` join `student` `s` on(`s`.`Student_id` = `el`.`Student_id`));




CREATE TABLE `referral_form` (
  `referral_id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) DEFAULT NULL,
  `Student_id` varchar(10) NOT NULL,
  `status_id` int(11) DEFAULT NULL,
  `academics` varchar(100) DEFAULT NULL,
  `personal_social` varchar(100) DEFAULT NULL,
  `career` varchar(100) DEFAULT NULL,
  `date_filed` date DEFAULT NULL,
  `notes` varchar(50) DEFAULT NULL,
  `refdate_completed` date DEFAULT NULL,
  PRIMARY KEY (`referral_id`),
  KEY `fk_staff_id_ref` (`staff_id`),
  KEY `fk_ref_studid` (`Student_id`),
  KEY `fk_ref_stat` (`status_id`),
  CONSTRAINT `fk_ref_stat` FOREIGN KEY (`status_id`) REFERENCES `_status` (`status_id`) ON DELETE NO ACTION,
  CONSTRAINT `fk_ref_studid` FOREIGN KEY (`Student_id`) REFERENCES `student` (`Student_id`) ON DELETE NO ACTION,
  CONSTRAINT `fk_staff_id_ref` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`) ON DELETE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `remarks_apply` (
  `remarks_apply_id` int(11) NOT NULL AUTO_INCREMENT,
  `org_name` varchar(50) NOT NULL,
  `file` varchar(25) NOT NULL,
  `message` varchar(100) NOT NULL,
  `image` varchar(225) NOT NULL,
  PRIMARY KEY (`remarks_apply_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `request_list` AS select `clinic_certificate_requests`.`request_id` AS `request_id`,`patient_list`.`patient_id` AS `patient_id`,concat(`patient_list`.`first_name`,' ',`patient_list`.`last_name`) AS `fullname`,`patient_list`.`course_department` AS `course_department`,`patient_list`.`address` AS `address`,`patient_list`.`phone_number` AS `phone_number`,`patient_list`.`email_add` AS `email_add`,`patient_list`.`type` AS `type`,`clinic_certificate_requests`.`date_requested` AS `date_requested`,`clinic_certificate_requests`.`purpose` AS `purpose`,`clinic_certificate_requests`.`request_type` AS `request_type`,`clinic_certificate_requests`.`required_document` AS `required_document`,`clinic_certificate_requests`.`document_passed` AS `document_passed`,`clinic_certificate_requests`.`certificate_location` AS `certificate_location`,`clinic_certificate_requests`.`date_released` AS `date_released`,`clinic_certificate_requests`.`status` AS `status`,`clinic_certificate_requests`.`CBC` AS `CBC`,`clinic_certificate_requests`.`PLATELET` AS `PLATELET`,`clinic_certificate_requests`.`HEMOTOCRIT` AS `HEMOTOCRIT`,`clinic_certificate_requests`.`HEMOGLOBIN` AS `HEMOGLOBIN`,`clinic_certificate_requests`.`Urinalysis` AS `Urinalysis`,`clinic_certificate_requests`.`Fecalysis` AS `Fecalysis`,`clinic_certificate_requests`.`FBS` AS `FBS`,`clinic_certificate_requests`.`sua` AS `sua`,`clinic_certificate_requests`.`Creatinine` AS `Creatinine`,`clinic_certificate_requests`.`Lipid` AS `Lipid`,`clinic_certificate_requests`.`SGOT` AS `SGOT`,`clinic_certificate_requests`.`SGPT` AS `SGPT`,`clinic_certificate_requests`.`others` AS `others`,`clinic_certificate_requests`.`other_text` AS `other_text`,`clinic_certificate_requests`.`cbc_loc` AS `cbc_loc`,`clinic_certificate_requests`.`platelet_loc` AS `platelet_loc`,`clinic_certificate_requests`.`hema_loc` AS `hema_loc`,`clinic_certificate_requests`.`hemo_loc` AS `hemo_loc`,`clinic_certificate_requests`.`urine_loc` AS `urine_loc`,`clinic_certificate_requests`.`fecal_loc` AS `fecal_loc`,`clinic_certificate_requests`.`fbs_loc` AS `fbs_loc`,`clinic_certificate_requests`.`sua_loc` AS `sua_loc`,`clinic_certificate_requests`.`creat_loc` AS `creat_loc`,`clinic_certificate_requests`.`lipid_loc` AS `lipid_loc`,`clinic_certificate_requests`.`sgot_loc` AS `sgot_loc`,`clinic_certificate_requests`.`sgpt_loc` AS `sgpt_loc`,`clinic_certificate_requests`.`others_loc` AS `others_loc` from (`patient_list` join `clinic_certificate_requests` on(`clinic_certificate_requests`.`user_id` = `patient_list`.`patient_id`));




CREATE TABLE `requisition_form` (
  `id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
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
  `date_posted` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_requisition_form_staff1_idx` (`requested_by`),
  KEY `fk_requisition_form_staff2_idx` (`assessed_by`),
  CONSTRAINT `fk_requisition_form_staff1` FOREIGN KEY (`requested_by`) REFERENCES `staff` (`staff_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_requisition_form_staff2` FOREIGN KEY (`assessed_by`) REFERENCES `staff` (`staff_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;

INSERT INTO requisition_form VALUES("00000000028","1","1","3","Education Student","","","Writing","","1","0","0","","Completed","2021-09-15","1000000001","2021-09-15","2021-09-15");
INSERT INTO requisition_form VALUES("00000000029","2","1","2","Usepian","","","Editing skills","","1","0","0","","Completed","2021-09-17","1000000001","2021-09-17","2021-09-17");
INSERT INTO requisition_form VALUES("00000000030","1","2","3","Data Encoder","","","Excellent Organizational Skill","","1","0","0","","Completed","2021-10-27","1000000001","2021-10-27","2021-10-27");
INSERT INTO requisition_form VALUES("00000000031","2","1","3","Quali 1","Quali 2","","SS 1","","1","0","0","","Approved","2021-10-31","1000000001","2021-10-31","2021-10-31");
INSERT INTO requisition_form VALUES("00000000032","1","1","2","Data Encoder","hawd musayaw","","Fast typer","","1","0","0","","Approved","2021-10-31","1000000001","2021-10-31","2021-10-31");



CREATE TABLE `response` (
  `response_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `notification_status` int(1) DEFAULT NULL,
  PRIMARY KEY (`response_id`),
  KEY `fk_response_complaint1_idx` (`Complaint_ID`),
  CONSTRAINT `fk_response_complaint1` FOREIGN KEY (`Complaint_ID`) REFERENCES `complaint` (`Complaint_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `scholarship_general_info` AS select `g`.`id` AS `grantee_id`,`g`.`student_id` AS `student_id`,`s`.`last_name` AS `last_name`,`s`.`first_name` AS `first_name`,`s`.`middle_name` AS `middle_name`,`s`.`suffix` AS `suffix`,`s`.`fullname` AS `fullname`,`s`.`course_id` AS `course_id`,`s`.`year_level` AS `year_level`,`s`.`coursetitle` AS `coursetitle`,`s`.`coursename` AS `coursename`,`s`.`major` AS `major`,`SF_GET_DATA_FROM_COURSE_BY_ID`('college_id',`s`.`course_id`) AS `college_id`,`SF_GET_DATA_FROM_COLLEGE_BY_ID`('title',`SF_GET_DATA_FROM_COURSE_BY_ID`('college_id',`s`.`course_id`)) AS `college_name`,`s`.`phone_number` AS `phone_number`,`s`.`email_add` AS `email_add`,`s`.`living_with` AS `living_with`,`s`.`others_specify` AS `others_specify`,`s`.`guardian_contact` AS `guardian_contact`,`s`.`city_address` AS `city_address`,`s`.`parent_name` AS `parent_name`,`s`.`parent_occupation` AS `parent_occupation`,`s`.`parents_address` AS `parents_address`,`s`.`parents_contact` AS `parents_contact`,`s`.`spouse_name` AS `spouse_name`,`s`.`spouse_occupation` AS `spouse_occupation`,`s`.`prev_gwa` AS `prev_gwa`,`s`.`prev_total_units` AS `prev_total_units`,`sp`.`program_id` AS `program_id`,`sp`.`program_name` AS `program_name`,`sp`.`program_provider` AS `program_provider`,`SF_GET_SCHOLARSHIP_STATUS`(`sp`.`program_status`) AS `program_status`,`SF_GET_TYPE_OF_SCHOLARSHIP`(`sp`.`type`) AS `program_type`,`SF_GET_SEM_YEAR_ID`(`g`.`semester`,`g`.`year`) AS `sem_year_id`,`g`.`semester_year` AS `semester_year`,`g`.`semester` AS `semester`,`g`.`year` AS `year`,`sp`.`amount` AS `amount`,`g`.`student_status` AS `student_status`,`SF_GET_STUDENT_STATUS`(`g`.`student_status`) AS `status_name`,`g`.`record_status` AS `record_status`,if(`g`.`status_billing` is null,'-',`g`.`status_billing`) AS `billing_status`,`g`.`billing_set_date` AS `billing_set_date`,if(`g`.`status_payroll` is null,'-',`g`.`status_payroll`) AS `payroll_status`,`g`.`payroll_set_date` AS `payroll_set_date`,if(`g`.`status_liquidation` is null,'-',`g`.`status_liquidation`) AS `liquidation_status`,`g`.`liquidation_set_date` AS `liquidation_set_date`,if(`g`.`status_allowance` is null,'-',`g`.`status_allowance`) AS `allowance_status`,`g`.`allowance_set_date` AS `allowance_set_date` from ((`grantee_history` `g` join `studentdetails` `s` on(`s`.`student_id` = `g`.`student_id`)) join `scholarship_program` `sp` on(`sp`.`program_id` = `g`.`program_id`));




CREATE TABLE `scholarship_masterlist_documents` (
  `date` date NOT NULL,
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `number` varchar(256) NOT NULL,
  `prev_revision_date` date NOT NULL,
  `prev_revision_number` varchar(256) NOT NULL,
  `latest_revision_date` date NOT NULL,
  `latest_revision_number` varchar(256) NOT NULL,
  `file_location` varchar(200) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `scholarship_masterlist_external_reference` (
  `date` date NOT NULL,
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `external_reference_title` varchar(128) NOT NULL,
  `revision_number` varchar(128) NOT NULL,
  `mode_of_filing` varchar(64) NOT NULL,
  `custodian` varchar(128) NOT NULL,
  `location` varchar(128) NOT NULL,
  `retention_active` date NOT NULL,
  `retention_archive` int(11) NOT NULL,
  `file_location` varchar(200) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `scholarship_masterlist_record` (
  `date` date NOT NULL,
  `record_no` int(11) NOT NULL AUTO_INCREMENT,
  `records_title` varchar(128) NOT NULL,
  `type_of_records` varchar(64) NOT NULL,
  `mode_of_filing` varchar(64) NOT NULL,
  `custodian` varchar(128) NOT NULL,
  `location` varchar(128) NOT NULL,
  `retention_active` date NOT NULL,
  `retention_archive` date NOT NULL,
  `disposition_year` date NOT NULL,
  `disposition_method` varchar(64) NOT NULL,
  `file_location` varchar(200) NOT NULL,
  PRIMARY KEY (`record_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `scholarship_masterlist_transmittal` (
  `date` date NOT NULL,
  `no` int(11) NOT NULL AUTO_INCREMENT,
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
  `file_location` varchar(200) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `scholarship_program` (
  `program_id` int(11) NOT NULL AUTO_INCREMENT,
  `program_provider` varchar(50) NOT NULL,
  `program_name` varchar(50) NOT NULL,
  `program_status` int(1) NOT NULL,
  `type` int(1) NOT NULL,
  `amount` varchar(20) NOT NULL,
  PRIMARY KEY (`program_id`),
  KEY `fk_scholarship_program_scholarship_status1_idx` (`program_status`),
  KEY `fk_scholarship_program_scholarship_type1_idx` (`type`),
  CONSTRAINT `fk_scholarship_program_scholarship_status1` FOREIGN KEY (`program_status`) REFERENCES `scholarship_status` (`status_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_scholarship_program_scholarship_type1` FOREIGN KEY (`type`) REFERENCES `scholarship_type` (`type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

INSERT INTO scholarship_program VALUES("1","CHED","Agriculture Competitiveness Enchancement Fund","1","2","35000");
INSERT INTO scholarship_program VALUES("2","CHED","TDP Congressional","1","2","7500");
INSERT INTO scholarship_program VALUES("3","CHED","TDP Davao de Oro","1","2","7500");
INSERT INTO scholarship_program VALUES("4","CHED","TDP Davao del Norte","1","2","7500");
INSERT INTO scholarship_program VALUES("5","CHED","TDP PL/Senate Grant","1","2","7500");
INSERT INTO scholarship_program VALUES("6","CHED","TES - Tertiary Education Subsidy Listahanan 2.0","1","2","20000");
INSERT INTO scholarship_program VALUES("7","CHED","TES - Tertiary Education Subsidy ESGP-PAG","1","2","20000");
INSERT INTO scholarship_program VALUES("8","CHED","TES - Tertiary Education Subsidy 4PS-SWDI","1","2","20000");
INSERT INTO scholarship_program VALUES("9","DOST","Department of Science and Technology","1","2","35000");
INSERT INTO scholarship_program VALUES("10","University","College Scholars","1","1","4000");
INSERT INTO scholarship_program VALUES("11","University","University Scholar","1","1","4500");
INSERT INTO scholarship_program VALUES("12","CHED","TDP Davao de Oro","1","1","123");



CREATE TABLE `scholarship_status` (
  `status_id` int(1) NOT NULL,
  `status_name` varchar(20) NOT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO scholarship_status VALUES("1","Active");
INSERT INTO scholarship_status VALUES("2","Inactive");



CREATE TABLE `scholarship_type` (
  `type_id` int(1) NOT NULL,
  `type_name` varchar(20) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO scholarship_type VALUES("1","Internal");
INSERT INTO scholarship_type VALUES("2","External");



CREATE TABLE `school_organization` (
  `org_id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) DEFAULT NULL,
  `adviser` varchar(255) DEFAULT NULL,
  `governor_id` varchar(11) DEFAULT NULL,
  `org_name` varchar(25) NOT NULL,
  `org_desc` varchar(150) DEFAULT NULL,
  `org_status` varchar(25) NOT NULL DEFAULT 'Recognized',
  `fund_type` varchar(45) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`org_id`),
  KEY `staff_id` (`staff_id`),
  CONSTRAINT `School_organization_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `schoolyear` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `schoolyear` varchar(10) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO schoolyear VALUES("1","2020-2021","active");



CREATE TABLE `section` (
  `id` int(11) NOT NULL,
  `section_name` varchar(45) NOT NULL,
  `course_id` int(11) NOT NULL,
  `yearlevel` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_course_section1_idx` (`course_id`),
  CONSTRAINT `fk_course_section1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `semester` (
  `semester_id` int(11) NOT NULL AUTO_INCREMENT,
  `semester_name` varchar(15) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`semester_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO semester VALUES("1","1st Semester","Inactive");
INSERT INTO semester VALUES("2","2nd Semester","Inactive");
INSERT INTO semester VALUES("3","Off Semester","Active");



CREATE TABLE `semester_load` (
  `load_id` int(11) NOT NULL AUTO_INCREMENT,
  `course` varchar(10) NOT NULL,
  `college` varchar(10) NOT NULL,
  `year` varchar(10) NOT NULL,
  `semester` varchar(10) NOT NULL,
  PRIMARY KEY (`load_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `seminar_evaluation` (
  `seminar_eval_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `comments` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`seminar_eval_id`),
  KEY `fk_studsem_eval_id` (`Student_id`),
  KEY `fk_appointment_id` (`appointment_id`),
  CONSTRAINT `fk_appointment_id` FOREIGN KEY (`appointment_id`) REFERENCES `guidance_appointments` (`appointment_id`),
  CONSTRAINT `fk_studsem_eval_id` FOREIGN KEY (`Student_id`) REFERENCES `student` (`Student_id`) ON DELETE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `sl_acceptance_details` (
  `applicant_id` int(10) unsigned zerofill NOT NULL,
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
  `chancellor` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`applicant_id`),
  KEY `fk_sl_acceptance_details_sl_applicant1_idx` (`applicant_id`),
  CONSTRAINT `fk_sl_acceptance_details_sl_applicant1` FOREIGN KEY (`applicant_id`) REFERENCES `sl_applicant` (`applicant_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO sl_acceptance_details VALUES("0000000018","Data Encoder","","","","Vacant Time only","","Elementary Education Department","2021-02-02","2021-03-02","2021-09-15","","","");
INSERT INTO sl_acceptance_details VALUES("0000000019","Data Encoder","","","","Vacant Time only","","IT Department","2021-10-25","2022-10-24","2021-10-24","","","CESAR S. LIMBAGA, SR., PHD");
INSERT INTO sl_acceptance_details VALUES("0000000020","Data Encoder","","","","Vacant Time only","","Elementary Education Department","2021-10-27","2021-12-27","2021-10-27","","","");
INSERT INTO sl_acceptance_details VALUES("0000000021","Data Encoder","","","","Vacant Time only","","Elementary Education Department","2021-10-27","2021-12-27","2021-10-27","","GERMA V. DURAN","CESAR S. LIMBAGA, SR., PHD");



CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sl_accomplishment_report` AS select `sl`.`applicant_id` AS `applicant_id`,`t`.`student_id` AS `student_id`,`sl`.`applicant_name` AS `applicant_name`,concat(`sl`.`course`,' ',`sl`.`year_level`) AS `course_year`,`sl`.`labor_class` AS `labor_class`,`sl`.`labor_type` AS `labor_type`,`sl`.`e_signature` AS `student_signature`,`sl`.`office_name` AS `unit_assigned`,`t`.`month` AS `month`,`t`.`year` AS `year`,(select group_concat(`accomplishment_task`.`task` separator '#') from `accomplishment_task` group by `accomplishment_task`.`applicant_id`,`accomplishment_task`.`month`,`accomplishment_task`.`year` having `accomplishment_task`.`applicant_id` = `sl`.`applicant_id` and `accomplishment_task`.`year` = `t`.`year` and `accomplishment_task`.`month` = `t`.`month`) AS `tasklist`,`sl`.`requested_by` AS `requested_by`,`sl`.`staff_requested_by` AS `staff_requested_by`,if(`SF_GET_ACCOMPLISHMENT_RATING_STATUS`(`t`.`applicant_id`,`t`.`month`,`t`.`year`) > 0,`sl`.`head_signature`,NULL) AS `head_signature`,`SF_GET_ACCOMPLISHMENT_RATING_STATUS`(`t`.`applicant_id`,`t`.`month`,`t`.`year`) AS `rating_status`,if(`rep`.`total_hours` is null,(select time_format(sec_to_time(sum(time_to_sec(`sl_dtr`.`diff`))),'%h') from `sl_dtr` where `sl_dtr`.`applicant_id` = `sl`.`applicant_id` and date_format(`sl_dtr`.`time_in`,'%M') = `t`.`month` and date_format(`sl_dtr`.`time_in`,'%Y') = `t`.`year`),`rep`.`total_hours`) AS `total_hours`,`r`.`duty_regularly` AS `duty_regularly`,`r`.`instruction_difficulty` AS `instruction_difficulty`,`r`.`time_utilize` AS `time_utilize`,`r`.`routine_work` AS `routine_work`,`r`.`initiative_creativity` AS `initiative_creativity`,`r`.`accurate_efficient` AS `accurate_efficient`,`r`.`good_interpersonal` AS `good_interpersonal`,`r`.`willing_learn` AS `willing_learn`,`r`.`good_working` AS `good_working`,`rep`.`salary` AS `salary`,`rep`.`salary_status` AS `salary_status`,`sl`.`semester_year` AS `sem_year` from ((((`accomplishment_task` `t` join `sl_application_form_details` `sl` on(`sl`.`applicant_id` = `t`.`applicant_id`)) left join `accomplishment_rating` `r` on(`r`.`applicant_id` = `t`.`applicant_id` and `r`.`month` = `t`.`month` and `r`.`year` = `t`.`year`)) left join `sl_dtr_report` `rep` on(`rep`.`applicant_id` = `t`.`applicant_id` and `rep`.`month` = `t`.`month` and `rep`.`year` = `t`.`year`)) left join `sl_dtr` `dtr` on(`dtr`.`applicant_id` = `t`.`applicant_id` and date_format(`dtr`.`time_in`,'%M') = `t`.`month` and date_format(`dtr`.`time_in`,'%Y') = `t`.`year`)) group by `t`.`applicant_id`,`t`.`month`,`t`.`year`;

INSERT INTO sl_accomplishment_report VALUES("0000000018","2018-00001","Aelin Galathynius","BEED 4th Year","Day","Paid Labor (SL)","�PNG

   
��_,((~%-=�9>�2�<� �V
��}ُe㺻�o~ⱇ�4''{�����qfv�%�������~vƣ��d��DGE��GsA�߬I��w�~@�����,⇐�y[��s�ѳO����Wn���Q���a�=ѳ�K�����hinn�tmݾϜy�SY�9�Kv����7��|B�	xܓ���~�����$�ߖ`��i��i�;���7�d�;��v�;�|"�[Z�[�^���'���M�p��w|�joͿ(�Խ�7�fK��vO~����γgN}43+�Q)��X\�f@7�9�k����?���&'&���Z	,Gi�F��j����>�_��z��bb���Q��ݝm'�|��?\\\L:p��j�r$����B�*��>����?�aEcÅ�i����r�p��������8�-�����QZ?�u���C{��S�++Q�]
�W8���ne�?��c�799�U[[���N~ў舨!����{j��/8��ݵ����f����y9V��������x�e���F���F���(����ŧ���V9&zޡ�o9BD6`^�;���>5::R���7�|�_$�����&��!m���յ:�-tv�߭��i�v�����6������[�CGRJKLl�XVv���Go���>��?V	����w�W �b`J�P��^�?T�kWˡ�ǿ���v��Dd9��8K`j�u:++�{td���q�]Z+���z��|�zY��C�������I/.��TP\�l��f���g3�~JՀ-����`_��K>��R��#Ǿ�_XrJ�~A�� ~�ݞ8������x��5:\���sY�UA<u>j
�Q9DD������������
�_ݽ���
�n��q���h�S/qa����G[b�_��@D4`^�;�J�埛���<�����K[���	����O����@�V~08w�����T���z�=�}}{T��jqIٳ��o+���9�Ě�$c��`�1;3���l����R`�0ﴻ�Jc��j���v���6{Deۯ�lѦ�qq�A���Τk~�!�j�x���l�?ooin��kl�����TIY哪��9_�v�^Q��'�l��
[��e�5c:���ѕ��2��HS��L�5<����lZ&�r���z���x��CG~�����߲b-���ں��.���g����<���5lJ��I�C�ݕ
������	m7�Mi��EOm�z��CG���#ɹ-V�kٓo~n����D�v{����'��*5����ho�Ǟ���[��;񖄈_��GC�	�T�n��W{���H{��W������
�رak���|i���žڊ�w�H3�s;V�G ����[ZZ����<>44T���u%ə�K�DP����K���O�P��ťŘ¢��Uqb�$��觇�G`�Bހ)�>zb|�|�5VW\\���mՐ����� �
&;7��U��Qc6&6nA�Io蘛q�Cڀ)�>cjr:W��Ngj����f���}�`E��cU�<<8P���uK_o�Mcc��|�����&��U^ʗ��:���yY{*���dOt�$$X�����_�dܼ*w����jo��@���o���?^�-��\�
YL��MLL�+ܧ���쇋�G�����Ԥ��hflK��sL���p��ouvvt&��>z����?���G�_�
�׃��͚=l+��z�l�s�ܙO���jn�Z���6���<���L��P�����������?q�ֿMMK�SkU��^/�`*Ø�#��]>p��ꝥ�|3�J�*P�����R5��ёᲕ�;���z��l�KK��mM��K��Tg�X�5a�/4r��;���|���e� ��Kv_w��@)6�mbj��o���Mc+̊)T���/�����+�����LgW��y����/+H޳چ���Mc>���܂�sMW.����3?�?0�700�n��擒����ᇇ�nvNn�j�k=u27�4�T����{A=�g�v���^^Y�]Y^�U�$"�)������x�xyy%֙��e��;�kz�+VB�8����Tg5ZqK��5T΁������L��w�[��K���jF4�

[�̘��f6\�p����ͬ�]XX�h�3b�B%��?NNN�O�$(�)~.&Z�ʕ�WS��tu�ݡ��۟z��������}�~SØ^�'mz%����Ԯ���]�t�W���s***?t��_)��!˰�X�����F#�^�l��KS�/_�h�~Y#b��Y�f�{p���s�>��������i��mjG�r4��p�Ѝ�״�r��/~�ܼ/m���lhh`�j�U���������耂�}%%�/M�'����Z���5����9���y�kl�F���Y������^3Wg�L�D�Wͷ���Yc�����{QN�/+�F���+��Y;[=�ٯ1
Y�3�����ږ榻t^M������y�&$ئ�7d3Y���Y5㜢E�5�T��A�g�0ZK��4SUS���5�J�V��ZU�IcK3,2A�JK������/]���3�~]�p\����(7�7�g����ۚ?x����PB�ʁ�����v��
��?��~n��yAo���qf���-��Ԟ��y����)���9������;�R���4��R�n�������
Z�i����Ng��W
�(e�KU{���
�#��	~�uU��Ѣ�i5۷ʢ�
$)`���g���oz^��Z����s	K�o���v���e
��}Zq���4�����_�*C{�u�^�yM)6��)��u�zZ�fOO��86.v��"���*��S�5oY}���>� 0kjۧ��� O�?���g���CG�\���oA��kMc�����Ɔ�����U1�����m�����?�
����,B~�!>�Y6�Y�Be��zJ_���2:J��W2ɤk9%
ڬ�~ӷ���ڀE+W[)�h�$��uh��5�v����(W��
��1�q�;g��jH���{��*�䈋��V�m�u�
���P�YU�\pL��Tv������v�2��Z�p;��P��Y?ɗ�M���%�O�l�gO���
�;5޵��ɤQh��x솓�ҋ?�|GG����
��p��90	�j�.=v��9��\�x������߲Z_[��������z�EG���-toy�N����7C �
.g��I�2��#n����a�����'��T���Џ�=4e��U|q��l��b�Ihe�k�̢)��]fB��SaV�$([e����k���UՉߪX���	u�M���(mRe��
�v�����ր���lե,�e���N�Dq=r��l�#��h�^���*VH6��Ђ��
�'��t�j�����e��?S�]?��� ��
�@0�h�.�5��y��@��B��a��F�J�_R �j��2S�;g6YQ�]�@���I�OUkO���6� A��+~U��
�@к��q�hY̲�|�7��1�����*��3��i�8�i|���x�4����{��neT��>�������V��Ԟ��Q�A�}]�-�a<-������9h�h�^�&�ZOl�-ߪ8�ez�]���D�����\�0�i��S�����{��T�<�z_��iM�u��g�6��ޖ�p�1+J�xZjAk�L���U�'NY�v��ym˷*Fh���8dv�֦/�>Y�a���K���S���ܼ����3��X�)G����6���Ņń���Ϩ�N��l	өq�
��mf�����q�^M����i���NgS_�A�T~���ε|>����5`&��˯׶�7;8o�%E�Q����������k��~��D�d�n�#����	﬷�rw�#�v�Ay_���C�xn%�~9#3��������ܭ��
_���0<�$�{rr���xmZZz�v�r��2��TQQ�#Z���be���w�]��p�b��l�V��\P\gI�&�@�'n��g�KQ�/ɐ6<i'���'v�oӤ�utl�&��
��T���N��<�
Q~��tv��~�77[��C��0
�S�K3:�Չ�k{5b`?qʹ��3U�JI*hxV�R�8��|GJ����)��=�9�����c���KIMo��]�%��z{�>��_i;
m]l�0u�W���w^5�-!��)0	��#C7��af����E��Kb��Ti��z��yy�/�����Z���y!++��f%�V���,��a�gk=D�0s`���)�i��r��,��^T$��Ԝ���k찆'CNg�U�N��i1qlt�v�\+#3����U�5�t�<h6Q)�O��t�a�ok9Jp0%hƫ3CH�´a+����S�㵞iw���h��0<f�-�N�z�Z�=��p��Bk9�r��23��MN�׏�ߩԎ���׆^ �
.�ݦ��MuK�?}��}}��Y\\����1�������o�#�ё��Z��+;;�Yk������.*����f$߯$�
�Ϸ}նޕ�Sr����Y��1��J{?k
����ܣ��E�c���|�L�/��S��x
�)�M�Z���XXoJJj��f��Xnӌ$�����}�m��c������N���Ύ��T�+yp����e���?����M�� ?���8��z�+�$$Jyw6Z�C�P���<��asc�#����3�s%�zAm�L|�"ݧhY�ӽ&�z'����ԉ]���wi3���G�%`g�0��Wםzܵ���Q�3�U�=*ۭ���s�4�٫zne������t9��ڀ)ΰ����2��{�raag�$��c��ܣ�����1�/�������Ѿ9_��Ug�ۆM��`Z�S.{��C5�S�]c�..-��s���	�3��xÌ2��&����vZ _�Θ�YO�����;�����'�~c���mz��ё#Ŗx�h|\|Pz�f�y�b4d���7e�W}R�0dAo�4�<���si�3���7���`&������ѱ��]����f\}�p^��"���,�jJ�(Y+��bbゲӹ&���u066����k6�@�6��M~�BЀ�ϥ�e\�/_`v�[���1E�t%NS�{�z����>d�6��Û�����˝JNIi{s���b(I;�`���h�O��6ť��z1����7`�v^H��jR գ�����;&�O��2��:>���ɻv�=���vf���^���ɜϗ��I�ɽI��`]
v'&&�i&�T��Z��m��-,���G���ߪ*
�O���`&�-^���K�PrZ�|_0?C�����lVUU��J.js��fURf�9���R��������j������c6I�n׹�G;ai��l�aQ���&��:�7J�.P���	�5b$'G���l�fw�hX5�:J���V[�m�`�fm�iwuww�'�5����ݞH��Mz����j���y�/966f.&6fC��|f�y�X�����׳Ŭ�ݤK�?!��Ò`��B�G����c#wi���(T�a�{*;:Z?��j���*�Nɻf��
~�gg�RT\�]-��R����v~Z%wvE�*h�i[��֖��
j��H���p��lE|�b_+�5�͕u]k���̮�֏wv���~������������,��G$�
���F딻e�	SI�zgmz�6�6_�������Ұ�}���4EQ��n�oJf6����][w�Ϯ�Z�[ukc��_���f�����2��bUS?�.J�p�\��*��n��2//�٪�{��LIk��
��X���ZT
���g�(����K���dE��x�������Q�&%F{6����zU����t��ZT��m�B��u�Mo�޸�2�]c#�/������A�����̺PVV�͔�􆄄Wk<]7����2��W8�5>�����C��'�K=YSW�%-�~,ёDU��`F�k�{Op�'�:�[?���w����5;�Ԃ�kB�?#3��4l�J+~�@zMD&h"�f^�"�3� z��uw�~����>- �S\c�������o+��Y��{��1�K��6�pd*�v�����ݽ=���StNn�����_կ�iӽ�n%g�f�2OTZD�-�f�7Ku�)�ԮdgJ�)�d�C�&Џnd
DT��<�kl�����c�ҾS��v��SݭG�C��~1{��yԐ���dIU_��33KBL5MM$�f}��d�POO�{��:633�����ZY������$;���$K�Dd>�:+���L��fֲj�H��

   
��_,((~%-=�9>�2�<� �V
��}ُe㺻�o~ⱇ�4''{�����qfv�%�������~vƣ��d��DGE��GsA�߬I��w�~@�����,⇐�y[��s�ѳO����Wn���Q���a�=ѳ�K�����hinn�tmݾϜy�SY�9�Kv����7��|B�	xܓ���~�����$�ߖ`��i��i�;���7�d�;��v�;�|"�[Z�[�^���'���M�p��w|�joͿ(�Խ�7�fK��vO~����γgN}43+�Q)��X\�f@7�9�k����?���&'&���Z	,Gi�F��j����>�_��z��bb���Q��ݝm'�|��?\\\L:p��j�r$����B�*��>����?�aEcÅ�i����r�p��������8�-�����QZ?�u���C{��S�++Q�]
�W8���ne�?��c�799�U[[���N~ў舨!����{j��/8��ݵ����f����y9V��������x�e���F���F���(����ŧ���V9&zޡ�o9BD6`^�;���>5::R���7�|�_$�����&��!m���յ:�-tv�߭��i�v�����6������[�CGRJKLl�XVv���Go���>��?V	����w�W �b`J�P��^�?T�kWˡ�ǿ���v��Dd9��8K`j�u:++�{td���q�]Z+���z��|�zY��C�������I/.��TP\�l��f���g3�~JՀ-����`_��K>��R��#Ǿ�_XrJ�~A�� ~�ݞ8������x��5:\���sY�UA<u>j
�Q9DD������������
�_ݽ���
�n��q���h�S/qa����G[b�_��@D4`^�;�J�埛���<�����K[���	����O����@�V~08w�����T���z�=�}}{T��jqIٳ��o+���9�Ě�$c��`�1;3���l����R`�0ﴻ�Jc��j���v���6{Deۯ�lѦ�qq�A���Τk~�!�j�x���l�?ooin��kl�����TIY哪��9_�v�^Q��'�l��
[��e�5c:���ѕ��2��HS��L�5<����lZ&�r���z���x��CG~�����߲b-���ں��.���g����<���5lJ��I�C�ݕ
������	m7�Mi��EOm�z��CG���#ɹ-V�kٓo~n����D�v{����'��*5����ho�Ǟ���[��;񖄈_��GC�	�T�n��W{���H{��W������
�رak���|i���žڊ�w�H3�s;V�G ����[ZZ����<>44T���u%ə�K�DP����K���O�P��ťŘ¢��Uqb�$��觇�G`�Bހ)�>zb|�|�5VW\\���mՐ����� �
&;7��U��Qc6&6nA�Io蘛q�Cڀ)�>cjr:W��Ngj����f���}�`E��cU�<<8P���uK_o�Mcc��|�����&��U^ʗ��:���yY{*���dOt�$$X�����_�dܼ*w����jo��@���o���?^�-��\�
YL��MLL�+ܧ���쇋�G�����Ԥ��hflK��sL���p��ouvvt&��>z����?���G�_�
�׃��͚=l+��z�l�s�ܙO���jn�Z���6���<���L��P�����������?q�ֿMMK�SkU��^/�`*Ø�#��]>p��ꝥ�|3�J�*P�����R5��ёᲕ�;���z��l�KK��mM��K��Tg�X�5a�/4r��;���|���e� ��Kv_w��@)6�mbj��o���Mc+̊)T���/�����+�����LgW��y����/+H޳چ���Mc>���܂�sMW.����3?�?0�700�n��擒����ᇇ�nvNn�j�k=u27�4�T����{A=�g�v���^^Y�]Y^�U�$"�)������x�xyy%֙��e��;�kz�+VB�8����Tg5ZqK��5T΁������L��w�[��K���jF4�

[�̘��f6\�p����ͬ�]XX�h�3b�B%��?NNN�O�$(�)~.&Z�ʕ�WS��tu�ݡ��۟z��������}�~SØ^�'mz%����Ԯ���]�t�W���s***?t��_)��!˰�X�����F#�^�l��KS�/_�h�~Y#b��Y�f�{p���s�>��������i��mjG�r4��p�Ѝ�״�r��/~�ܼ/m���lhh`�j�U���������耂�}%%�/M�'����Z���5����9���y�kl�F���Y������^3Wg�L�D�Wͷ���Yc�����{QN�/+�F���+��Y;[=�ٯ1
Y�3�����ږ榻t^M������y�&$ئ�7d3Y���Y5㜢E�5�T��A�g�0ZK��4SUS���5�J�V��ZU�IcK3,2A�JK������/]���3�~]�p\����(7�7�g����ۚ?x����PB�ʁ�����v��
��?��~n��yAo���qf���-��Ԟ��y����)���9������;�R���4��R�n�������
Z�i����Ng��W
�(e�KU{���
�#��	~�uU��Ѣ�i5۷ʢ�
$)`���g���oz^��Z����s	K�o���v���e
��}Zq���4�����_�*C{�u�^�yM)6��)��u�zZ�fOO��86.v��"���*��S�5oY}���>� 0kjۧ��� O�?���g���CG�\���oA��kMc�����Ɔ�����U1�����m�����?�
����,B~�!>�Y6�Y�Be��zJ_���2:J��W2ɤk9%
ڬ�~ӷ���ڀE+W[)�h�$��uh��5�v����(W��
��1�q�;g��jH���{��*�䈋��V�m�u�
���P�YU�\pL��Tv������v�2��Z�p;��P��Y?ɗ�M���%�O�l�gO���
�;5޵��ɤQh��x솓�ҋ?�|GG����
��p��90	�j�.=v��9��\�x������߲Z_[��������z�EG���-toy�N����7C �
.g��I�2��#n����a�����'��T���Џ�=4e��U|q��l��b�Ihe�k�̢)��]fB��SaV�$([e����k���UՉߪX���	u�M���(mRe��
�v�����ր���lե,�e���N�Dq=r��l�#��h�^���*VH6��Ђ��
�'��t�j�����e��?S�]?��� ��
�@0�h�.�5��y��@��B��a��F�J�_R �j��2S�;g6YQ�]�@���I�OUkO���6� A��+~U��
�@к��q�hY̲�|�7��1�����*��3��i�8�i|���x�4����{��neT��>�������V��Ԟ��Q�A�}]�-�a<-������9h�h�^�&�ZOl�-ߪ8�ez�]���D�����\�0�i��S�����{��T�<�z_��iM�u��g�6��ޖ�p�1+J�xZjAk�L���U�'NY�v��ym˷*Fh���8dv�֦/�>Y�a���K���S���ܼ����3��X�)G����6���Ņń���Ϩ�N��l	өq�
��mf�����q�^M����i���NgS_�A�T~���ε|>����5`&��˯׶�7;8o�%E�Q����������k��~��D�d�n�#����	﬷�rw�#�v�Ay_���C�xn%�~9#3��������ܭ��
_���0<�$�{rr���xmZZz�v�r��2��TQQ�#Z���be���w�]��p�b��l�V��\P\gI�&�@�'n��g�KQ�/ɐ6<i'���'v�oӤ�utl�&��
��T���N��<�
Q~��tv��~�77[��C��0
�S�K3:�Չ�k{5b`?qʹ��3U�JI*hxV�R�8��|GJ����)��=�9�����c���KIMo��]�%��z{�>��_i;
m]l�0u�W���w^5�-!��)0	��#C7��af����E��Kb��Ti��z��yy�/�����Z���y!++��f%�V���,��a�gk=D�0s`���)�i��r��,��^T$��Ԝ���k찆'CNg�U�N��i1qlt�v�\+#3����U�5�t�<h6Q)�O��t�a�ok9Jp0%hƫ3CH�´a+����S�㵞iw���h��0<f�-�N�z�Z�=��p��Bk9�r��23��MN�׏�ߩԎ���׆^ �
.�ݦ��MuK�?}��}}��Y\\����1�������o�#�ё��Z��+;;�Yk������.*����f$߯$�
�Ϸ}նޕ�Sr����Y��1��J{?k
����ܣ��E�c���|�L�/��S��x
�)�M�Z���XXoJJj��f��Xnӌ$�����}�m��c������N���Ύ��T�+yp����e���?����M�� ?���8��z�+�$$Jyw6Z�C�P���<��asc�#����3�s%�zAm�L|�"ݧhY�ӽ&�z'����ԉ]���wi3���G�%`g�0��Wםzܵ���Q�3�U�=*ۭ���s�4�٫zne������t9��ڀ)ΰ����2��{�raag�$��c��ܣ�����1�/�������Ѿ9_��Ug�ۆM��`Z�S.{��C5�S�]c�..-��s���	�3��xÌ2��&����vZ _�Θ�YO�����;�����'�~c���mz��ё#Ŗx�h|\|Pz�f�y�b4d���7e�W}R�0dAo�4�<���si�3���7���`&������ѱ��]����f\}�p^��"���,�jJ�(Y+��bbゲӹ&���u066����k6�@�6��M~�BЀ�ϥ�e\�/_`v�[���1E�t%NS�{�z����>d�6��Û�����˝JNIi{s���b(I;�`���h�O��6ť��z1����7`�v^H��jR գ�����;&�O��2��:>���ɻv�=���vf���^���ɜϗ��I�ɽI��`]
v'&&�i&�T��Z��m��-,���G���ߪ*
�O���`&�-^���K�PrZ�|_0?C�����lVUU��J.js��fURf�9���R��������j������c6I�n׹�G;ai��l�aQ���&��:�7J�.P���	�5b$'G���l�fw�hX5�:J���V[�m�`�fm�iwuww�'�5����ݞH��Mz����j���y�/966f.&6fC��|f�y�X�����׳Ŭ�ݤK�?!��Ò`��B�G����c#wi���(T�a�{*;:Z?��j���*�Nɻf��
~�gg�RT\�]-��R����v~Z%wvE�*h�i[��֖��
j��H���p��lE|�b_+�5�͕u]k���̮�֏wv���~������������,��G$�
���F딻e�	SI�zgmz�6�6_�������Ұ�}���4EQ��n�oJf6����][w�Ϯ�Z�[ukc��_���f�����2��bUS?�.J�p�\��*��n��2//�٪�{��LIk��
��X���ZT
���g�(����K���dE��x�������Q�&%F{6����zU����t��ZT��m�B��u�Mo�޸�2�]c#�/������A�����̺PVV�͔�􆄄Wk<]7����2��W8�5>�����C��'�K=YSW�%-�~,ёDU��`F�k�{Op�'�:�[?���w����5;�Ԃ�kB�?#3��4l�J+~�@zMD&h"�f^�"�3� z��uw�~����>- �S\c�������o+��Y��{��1�K��6�pd*�v�����ݽ=���StNn�����_կ�iӽ�n%g�f�2OTZD�-�f�7Ku�)�ԮdgJ�)�d�C�&Џnd
DT��<�kl�����c�ҾS��v��SݭG�C��~1{��yԐ���dIU_��33KBL5MM$�f}��d�POO�{��:633�����ZY������$;���$K�Dd>�:+���L��fֲj�H��
INSERT INTO sl_accomplishment_report VALUES("0000000018","2018-00001","Aelin Galathynius","BEED 4th Year","Day","Paid Labor (SL)","�PNG

   
��_,((~%-=�9>�2�<� �V
��}ُe㺻�o~ⱇ�4''{�����qfv�%�������~vƣ��d��DGE��GsA�߬I��w�~@�����,⇐�y[��s�ѳO����Wn���Q���a�=ѳ�K�����hinn�tmݾϜy�SY�9�Kv����7��|B�	xܓ���~�����$�ߖ`��i��i�;���7�d�;��v�;�|"�[Z�[�^���'���M�p��w|�joͿ(�Խ�7�fK��vO~����γgN}43+�Q)��X\�f@7�9�k����?���&'&���Z	,Gi�F��j����>�_��z��bb���Q��ݝm'�|��?\\\L:p��j�r$����B�*��>����?�aEcÅ�i����r�p��������8�-�����QZ?�u���C{��S�++Q�]
�W8���ne�?��c�799�U[[���N~ў舨!����{j��/8��ݵ����f����y9V��������x�e���F���F���(����ŧ���V9&zޡ�o9BD6`^�;���>5::R���7�|�_$�����&��!m���յ:�-tv�߭��i�v�����6������[�CGRJKLl�XVv���Go���>��?V	����w�W �b`J�P��^�?T�kWˡ�ǿ���v��Dd9��8K`j�u:++�{td���q�]Z+���z��|�zY��C�������I/.��TP\�l��f���g3�~JՀ-����`_��K>��R��#Ǿ�_XrJ�~A�� ~�ݞ8������x��5:\���sY�UA<u>j
�Q9DD������������
�_ݽ���
�n��q���h�S/qa����G[b�_��@D4`^�;�J�埛���<�����K[���	����O����@�V~08w�����T���z�=�}}{T��jqIٳ��o+���9�Ě�$c��`�1;3���l����R`�0ﴻ�Jc��j���v���6{Deۯ�lѦ�qq�A���Τk~�!�j�x���l�?ooin��kl�����TIY哪��9_�v�^Q��'�l��
[��e�5c:���ѕ��2��HS��L�5<����lZ&�r���z���x��CG~�����߲b-���ں��.���g����<���5lJ��I�C�ݕ
������	m7�Mi��EOm�z��CG���#ɹ-V�kٓo~n����D�v{����'��*5����ho�Ǟ���[��;񖄈_��GC�	�T�n��W{���H{��W������
�رak���|i���žڊ�w�H3�s;V�G ����[ZZ����<>44T���u%ə�K�DP����K���O�P��ťŘ¢��Uqb�$��觇�G`�Bހ)�>zb|�|�5VW\\���mՐ����� �
&;7��U��Qc6&6nA�Io蘛q�Cڀ)�>cjr:W��Ngj����f���}�`E��cU�<<8P���uK_o�Mcc��|�����&��U^ʗ��:���yY{*���dOt�$$X�����_�dܼ*w����jo��@���o���?^�-��\�
YL��MLL�+ܧ���쇋�G�����Ԥ��hflK��sL���p��ouvvt&��>z����?���G�_�
�׃��͚=l+��z�l�s�ܙO���jn�Z���6���<���L��P�����������?q�ֿMMK�SkU��^/�`*Ø�#��]>p��ꝥ�|3�J�*P�����R5��ёᲕ�;���z��l�KK��mM��K��Tg�X�5a�/4r��;���|���e� ��Kv_w��@)6�mbj��o���Mc+̊)T���/�����+�����LgW��y����/+H޳چ���Mc>���܂�sMW.����3?�?0�700�n��擒����ᇇ�nvNn�j�k=u27�4�T����{A=�g�v���^^Y�]Y^�U�$"�)������x�xyy%֙��e��;�kz�+VB�8����Tg5ZqK��5T΁������L��w�[��K���jF4�

[�̘��f6\�p����ͬ�]XX�h�3b�B%��?NNN�O�$(�)~.&Z�ʕ�WS��tu�ݡ��۟z��������}�~SØ^�'mz%����Ԯ���]�t�W���s***?t��_)��!˰�X�����F#�^�l��KS�/_�h�~Y#b��Y�f�{p���s�>��������i��mjG�r4��p�Ѝ�״�r��/~�ܼ/m���lhh`�j�U���������耂�}%%�/M�'����Z���5����9���y�kl�F���Y������^3Wg�L�D�Wͷ���Yc�����{QN�/+�F���+��Y;[=�ٯ1
Y�3�����ږ榻t^M������y�&$ئ�7d3Y���Y5㜢E�5�T��A�g�0ZK��4SUS���5�J�V��ZU�IcK3,2A�JK������/]���3�~]�p\����(7�7�g����ۚ?x����PB�ʁ�����v��
��?��~n��yAo���qf���-��Ԟ��y����)���9������;�R���4��R�n�������
Z�i����Ng��W
�(e�KU{���
�#��	~�uU��Ѣ�i5۷ʢ�
$)`���g���oz^��Z����s	K�o���v���e
��}Zq���4�����_�*C{�u�^�yM)6��)��u�zZ�fOO��86.v��"���*��S�5oY}���>� 0kjۧ��� O�?���g���CG�\���oA��kMc�����Ɔ�����U1�����m�����?�
����,B~�!>�Y6�Y�Be��zJ_���2:J��W2ɤk9%
ڬ�~ӷ���ڀE+W[)�h�$��uh��5�v����(W��
��1�q�;g��jH���{��*�䈋��V�m�u�
���P�YU�\pL��Tv������v�2��Z�p;��P��Y?ɗ�M���%�O�l�gO���
�;5޵��ɤQh��x솓�ҋ?�|GG����
��p��90	�j�.=v��9��\�x������߲Z_[��������z�EG���-toy�N����7C �
.g��I�2��#n����a�����'��T���Џ�=4e��U|q��l��b�Ihe�k�̢)��]fB��SaV�$([e����k���UՉߪX���	u�M���(mRe��
�v�����ր���lե,�e���N�Dq=r��l�#��h�^���*VH6��Ђ��
�'��t�j�����e��?S�]?��� ��
�@0�h�.�5��y��@��B��a��F�J�_R �j��2S�;g6YQ�]�@���I�OUkO���6� A��+~U��
�@к��q�hY̲�|�7��1�����*��3��i�8�i|���x�4����{��neT��>�������V��Ԟ��Q�A�}]�-�a<-������9h�h�^�&�ZOl�-ߪ8�ez�]���D�����\�0�i��S�����{��T�<�z_��iM�u��g�6��ޖ�p�1+J�xZjAk�L���U�'NY�v��ym˷*Fh���8dv�֦/�>Y�a���K���S���ܼ����3��X�)G����6���Ņń���Ϩ�N��l	өq�
��mf�����q�^M����i���NgS_�A�T~���ε|>����5`&��˯׶�7;8o�%E�Q����������k��~��D�d�n�#����	﬷�rw�#�v�Ay_���C�xn%�~9#3��������ܭ��
_���0<�$�{rr���xmZZz�v�r��2��TQQ�#Z���be���w�]��p�b��l�V��\P\gI�&�@�'n��g�KQ�/ɐ6<i'���'v�oӤ�utl�&��
��T���N��<�
Q~��tv��~�77[��C��0
�S�K3:�Չ�k{5b`?qʹ��3U�JI*hxV�R�8��|GJ����)��=�9�����c���KIMo��]�%��z{�>��_i;
m]l�0u�W���w^5�-!��)0	��#C7��af����E��Kb��Ti��z��yy�/�����Z���y!++��f%�V���,��a�gk=D�0s`���)�i��r��,��^T$��Ԝ���k찆'CNg�U�N��i1qlt�v�\+#3����U�5�t�<h6Q)�O��t�a�ok9Jp0%hƫ3CH�´a+����S�㵞iw���h��0<f�-�N�z�Z�=��p��Bk9�r��23��MN�׏�ߩԎ���׆^ �
.�ݦ��MuK�?}��}}��Y\\����1�������o�#�ё��Z��+;;�Yk������.*����f$߯$�
�Ϸ}նޕ�Sr����Y��1��J{?k
����ܣ��E�c���|�L�/��S��x
�)�M�Z���XXoJJj��f��Xnӌ$�����}�m��c������N���Ύ��T�+yp����e���?����M�� ?���8��z�+�$$Jyw6Z�C�P���<��asc�#����3�s%�zAm�L|�"ݧhY�ӽ&�z'����ԉ]���wi3���G�%`g�0��Wםzܵ���Q�3�U�=*ۭ���s�4�٫zne������t9��ڀ)ΰ����2��{�raag�$��c��ܣ�����1�/�������Ѿ9_��Ug�ۆM��`Z�S.{��C5�S�]c�..-��s���	�3��xÌ2��&����vZ _�Θ�YO�����;�����'�~c���mz��ё#Ŗx�h|\|Pz�f�y�b4d���7e�W}R�0dAo�4�<���si�3���7���`&������ѱ��]����f\}�p^��"���,�jJ�(Y+��bbゲӹ&���u066����k6�@�6��M~�BЀ�ϥ�e\�/_`v�[���1E�t%NS�{�z����>d�6��Û�����˝JNIi{s���b(I;�`���h�O��6ť��z1����7`�v^H��jR գ�����;&�O��2��:>���ɻv�=���vf���^���ɜϗ��I�ɽI��`]
v'&&�i&�T��Z��m��-,���G���ߪ*
�O���`&�-^���K�PrZ�|_0?C�����lVUU��J.js��fURf�9���R��������j������c6I�n׹�G;ai��l�aQ���&��:�7J�.P���	�5b$'G���l�fw�hX5�:J���V[�m�`�fm�iwuww�'�5����ݞH��Mz����j���y�/966f.&6fC��|f�y�X�����׳Ŭ�ݤK�?!��Ò`��B�G����c#wi���(T�a�{*;:Z?��j���*�Nɻf��
~�gg�RT\�]-��R����v~Z%wvE�*h�i[��֖��
j��H���p��lE|�b_+�5�͕u]k���̮�֏wv���~������������,��G$�
���F딻e�	SI�zgmz�6�6_�������Ұ�}���4EQ��n�oJf6����][w�Ϯ�Z�[ukc��_���f�����2��bUS?�.J�p�\��*��n��2//�٪�{��LIk��
��X���ZT
���g�(����K���dE��x�������Q�&%F{6����zU����t��ZT��m�B��u�Mo�޸�2�]c#�/������A�����̺PVV�͔�􆄄Wk<]7����2��W8�5>�����C��'�K=YSW�%-�~,ёDU��`F�k�{Op�'�:�[?���w����5;�Ԃ�kB�?#3��4l�J+~�@zMD&h"�f^�"�3� z��uw�~����>- �S\c�������o+��Y��{��1�K��6�pd*�v�����ݽ=���StNn�����_կ�iӽ�n%g�f�2OTZD�-�f�7Ku�)�ԮdgJ�)�d�C�&Џnd
DT��<�kl�����c�ҾS��v��SݭG�C��~1{��yԐ���dIU_��33KBL5MM$�f}��d�POO�{��:633�����ZY������$;���$K�Dd>�:+���L��fֲj�H��

   
��_,((~%-=�9>�2�<� �V
��}ُe㺻�o~ⱇ�4''{�����qfv�%�������~vƣ��d��DGE��GsA�߬I��w�~@�����,⇐�y[��s�ѳO����Wn���Q���a�=ѳ�K�����hinn�tmݾϜy�SY�9�Kv����7��|B�	xܓ���~�����$�ߖ`��i��i�;���7�d�;��v�;�|"�[Z�[�^���'���M�p��w|�joͿ(�Խ�7�fK��vO~����γgN}43+�Q)��X\�f@7�9�k����?���&'&���Z	,Gi�F��j����>�_��z��bb���Q��ݝm'�|��?\\\L:p��j�r$����B�*��>����?�aEcÅ�i����r�p��������8�-�����QZ?�u���C{��S�++Q�]
�W8���ne�?��c�799�U[[���N~ў舨!����{j��/8��ݵ����f����y9V��������x�e���F���F���(����ŧ���V9&zޡ�o9BD6`^�;���>5::R���7�|�_$�����&��!m���յ:�-tv�߭��i�v�����6������[�CGRJKLl�XVv���Go���>��?V	����w�W �b`J�P��^�?T�kWˡ�ǿ���v��Dd9��8K`j�u:++�{td���q�]Z+���z��|�zY��C�������I/.��TP\�l��f���g3�~JՀ-����`_��K>��R��#Ǿ�_XrJ�~A�� ~�ݞ8������x��5:\���sY�UA<u>j
�Q9DD������������
�_ݽ���
�n��q���h�S/qa����G[b�_��@D4`^�;�J�埛���<�����K[���	����O����@�V~08w�����T���z�=�}}{T��jqIٳ��o+���9�Ě�$c��`�1;3���l����R`�0ﴻ�Jc��j���v���6{Deۯ�lѦ�qq�A���Τk~�!�j�x���l�?ooin��kl�����TIY哪��9_�v�^Q��'�l��
[��e�5c:���ѕ��2��HS��L�5<����lZ&�r���z���x��CG~�����߲b-���ں��.���g����<���5lJ��I�C�ݕ
������	m7�Mi��EOm�z��CG���#ɹ-V�kٓo~n����D�v{����'��*5����ho�Ǟ���[��;񖄈_��GC�	�T�n��W{���H{��W������
�رak���|i���žڊ�w�H3�s;V�G ����[ZZ����<>44T���u%ə�K�DP����K���O�P��ťŘ¢��Uqb�$��觇�G`�Bހ)�>zb|�|�5VW\\���mՐ����� �
&;7��U��Qc6&6nA�Io蘛q�Cڀ)�>cjr:W��Ngj����f���}�`E��cU�<<8P���uK_o�Mcc��|�����&��U^ʗ��:���yY{*���dOt�$$X�����_�dܼ*w����jo��@���o���?^�-��\�
YL��MLL�+ܧ���쇋�G�����Ԥ��hflK��sL���p��ouvvt&��>z����?���G�_�
�׃��͚=l+��z�l�s�ܙO���jn�Z���6���<���L��P�����������?q�ֿMMK�SkU��^/�`*Ø�#��]>p��ꝥ�|3�J�*P�����R5��ёᲕ�;���z��l�KK��mM��K��Tg�X�5a�/4r��;���|���e� ��Kv_w��@)6�mbj��o���Mc+̊)T���/�����+�����LgW��y����/+H޳چ���Mc>���܂�sMW.����3?�?0�700�n��擒����ᇇ�nvNn�j�k=u27�4�T����{A=�g�v���^^Y�]Y^�U�$"�)������x�xyy%֙��e��;�kz�+VB�8����Tg5ZqK��5T΁������L��w�[��K���jF4�

[�̘��f6\�p����ͬ�]XX�h�3b�B%��?NNN�O�$(�)~.&Z�ʕ�WS��tu�ݡ��۟z��������}�~SØ^�'mz%����Ԯ���]�t�W���s***?t��_)��!˰�X�����F#�^�l��KS�/_�h�~Y#b��Y�f�{p���s�>��������i��mjG�r4��p�Ѝ�״�r��/~�ܼ/m���lhh`�j�U���������耂�}%%�/M�'����Z���5����9���y�kl�F���Y������^3Wg�L�D�Wͷ���Yc�����{QN�/+�F���+��Y;[=�ٯ1
Y�3�����ږ榻t^M������y�&$ئ�7d3Y���Y5㜢E�5�T��A�g�0ZK��4SUS���5�J�V��ZU�IcK3,2A�JK������/]���3�~]�p\����(7�7�g����ۚ?x����PB�ʁ�����v��
��?��~n��yAo���qf���-��Ԟ��y����)���9������;�R���4��R�n�������
Z�i����Ng��W
�(e�KU{���
�#��	~�uU��Ѣ�i5۷ʢ�
$)`���g���oz^��Z����s	K�o���v���e
��}Zq���4�����_�*C{�u�^�yM)6��)��u�zZ�fOO��86.v��"���*��S�5oY}���>� 0kjۧ��� O�?���g���CG�\���oA��kMc�����Ɔ�����U1�����m�����?�
����,B~�!>�Y6�Y�Be��zJ_���2:J��W2ɤk9%
ڬ�~ӷ���ڀE+W[)�h�$��uh��5�v����(W��
��1�q�;g��jH���{��*�䈋��V�m�u�
���P�YU�\pL��Tv������v�2��Z�p;��P��Y?ɗ�M���%�O�l�gO���
�;5޵��ɤQh��x솓�ҋ?�|GG����
��p��90	�j�.=v��9��\�x������߲Z_[��������z�EG���-toy�N����7C �
.g��I�2��#n����a�����'��T���Џ�=4e��U|q��l��b�Ihe�k�̢)��]fB��SaV�$([e����k���UՉߪX���	u�M���(mRe��
�v�����ր���lե,�e���N�Dq=r��l�#��h�^���*VH6��Ђ��
�'��t�j�����e��?S�]?��� ��
�@0�h�.�5��y��@��B��a��F�J�_R �j��2S�;g6YQ�]�@���I�OUkO���6� A��+~U��
�@к��q�hY̲�|�7��1�����*��3��i�8�i|���x�4����{��neT��>�������V��Ԟ��Q�A�}]�-�a<-������9h�h�^�&�ZOl�-ߪ8�ez�]���D�����\�0�i��S�����{��T�<�z_��iM�u��g�6��ޖ�p�1+J�xZjAk�L���U�'NY�v��ym˷*Fh���8dv�֦/�>Y�a���K���S���ܼ����3��X�)G����6���Ņń���Ϩ�N��l	өq�
��mf�����q�^M����i���NgS_�A�T~���ε|>����5`&��˯׶�7;8o�%E�Q����������k��~��D�d�n�#����	﬷�rw�#�v�Ay_���C�xn%�~9#3��������ܭ��
_���0<�$�{rr���xmZZz�v�r��2��TQQ�#Z���be���w�]��p�b��l�V��\P\gI�&�@�'n��g�KQ�/ɐ6<i'���'v�oӤ�utl�&��
��T���N��<�
Q~��tv��~�77[��C��0
�S�K3:�Չ�k{5b`?qʹ��3U�JI*hxV�R�8��|GJ����)��=�9�����c���KIMo��]�%��z{�>��_i;
m]l�0u�W���w^5�-!��)0	��#C7��af����E��Kb��Ti��z��yy�/�����Z���y!++��f%�V���,��a�gk=D�0s`���)�i��r��,��^T$��Ԝ���k찆'CNg�U�N��i1qlt�v�\+#3����U�5�t�<h6Q)�O��t�a�ok9Jp0%hƫ3CH�´a+����S�㵞iw���h��0<f�-�N�z�Z�=��p��Bk9�r��23��MN�׏�ߩԎ���׆^ �
.�ݦ��MuK�?}��}}��Y\\����1�������o�#�ё��Z��+;;�Yk������.*����f$߯$�
�Ϸ}նޕ�Sr����Y��1��J{?k
����ܣ��E�c���|�L�/��S��x
�)�M�Z���XXoJJj��f��Xnӌ$�����}�m��c������N���Ύ��T�+yp����e���?����M�� ?���8��z�+�$$Jyw6Z�C�P���<��asc�#����3�s%�zAm�L|�"ݧhY�ӽ&�z'����ԉ]���wi3���G�%`g�0��Wםzܵ���Q�3�U�=*ۭ���s�4�٫zne������t9��ڀ)ΰ����2��{�raag�$��c��ܣ�����1�/�������Ѿ9_��Ug�ۆM��`Z�S.{��C5�S�]c�..-��s���	�3��xÌ2��&����vZ _�Θ�YO�����;�����'�~c���mz��ё#Ŗx�h|\|Pz�f�y�b4d���7e�W}R�0dAo�4�<���si�3���7���`&������ѱ��]����f\}�p^��"���,�jJ�(Y+��bbゲӹ&���u066����k6�@�6��M~�BЀ�ϥ�e\�/_`v�[���1E�t%NS�{�z����>d�6��Û�����˝JNIi{s���b(I;�`���h�O��6ť��z1����7`�v^H��jR գ�����;&�O��2��:>���ɻv�=���vf���^���ɜϗ��I�ɽI��`]
v'&&�i&�T��Z��m��-,���G���ߪ*
�O���`&�-^���K�PrZ�|_0?C�����lVUU��J.js��fURf�9���R��������j������c6I�n׹�G;ai��l�aQ���&��:�7J�.P���	�5b$'G���l�fw�hX5�:J���V[�m�`�fm�iwuww�'�5����ݞH��Mz����j���y�/966f.&6fC��|f�y�X�����׳Ŭ�ݤK�?!��Ò`��B�G����c#wi���(T�a�{*;:Z?��j���*�Nɻf��
~�gg�RT\�]-��R����v~Z%wvE�*h�i[��֖��
j��H���p��lE|�b_+�5�͕u]k���̮�֏wv���~������������,��G$�
���F딻e�	SI�zgmz�6�6_�������Ұ�}���4EQ��n�oJf6����][w�Ϯ�Z�[ukc��_���f�����2��bUS?�.J�p�\��*��n��2//�٪�{��LIk��
��X���ZT
���g�(����K���dE��x�������Q�&%F{6����zU����t��ZT��m�B��u�Mo�޸�2�]c#�/������A�����̺PVV�͔�􆄄Wk<]7����2��W8�5>�����C��'�K=YSW�%-�~,ёDU��`F�k�{Op�'�:�[?���w����5;�Ԃ�kB�?#3��4l�J+~�@zMD&h"�f^�"�3� z��uw�~����>- �S\c�������o+��Y��{��1�K��6�pd*�v�����ݽ=���StNn�����_կ�iӽ�n%g�f�2OTZD�-�f�7Ku�)�ԮdgJ�)�d�C�&Џnd
DT��<�kl�����c�ҾS��v��SݭG�C��~1{��yԐ���dIU_��33KBL5MM$�f}��d�POO�{��:633�����ZY������$;���$K�Dd>�:+���L��fֲj�H��
INSERT INTO sl_accomplishment_report VALUES("0000000018","2018-00001","Aelin Galathynius","BEED 4th Year","Day","Paid Labor (SL)","�PNG

   
��_,((~%-=�9>�2�<� �V
��}ُe㺻�o~ⱇ�4''{�����qfv�%�������~vƣ��d��DGE��GsA�߬I��w�~@�����,⇐�y[��s�ѳO����Wn���Q���a�=ѳ�K�����hinn�tmݾϜy�SY�9�Kv����7��|B�	xܓ���~�����$�ߖ`��i��i�;���7�d�;��v�;�|"�[Z�[�^���'���M�p��w|�joͿ(�Խ�7�fK��vO~����γgN}43+�Q)��X\�f@7�9�k����?���&'&���Z	,Gi�F��j����>�_��z��bb���Q��ݝm'�|��?\\\L:p��j�r$����B�*��>����?�aEcÅ�i����r�p��������8�-�����QZ?�u���C{��S�++Q�]
�W8���ne�?��c�799�U[[���N~ў舨!����{j��/8��ݵ����f����y9V��������x�e���F���F���(����ŧ���V9&zޡ�o9BD6`^�;���>5::R���7�|�_$�����&��!m���յ:�-tv�߭��i�v�����6������[�CGRJKLl�XVv���Go���>��?V	����w�W �b`J�P��^�?T�kWˡ�ǿ���v��Dd9��8K`j�u:++�{td���q�]Z+���z��|�zY��C�������I/.��TP\�l��f���g3�~JՀ-����`_��K>��R��#Ǿ�_XrJ�~A�� ~�ݞ8������x��5:\���sY�UA<u>j
�Q9DD������������
�_ݽ���
�n��q���h�S/qa����G[b�_��@D4`^�;�J�埛���<�����K[���	����O����@�V~08w�����T���z�=�}}{T��jqIٳ��o+���9�Ě�$c��`�1;3���l����R`�0ﴻ�Jc��j���v���6{Deۯ�lѦ�qq�A���Τk~�!�j�x���l�?ooin��kl�����TIY哪��9_�v�^Q��'�l��
[��e�5c:���ѕ��2��HS��L�5<����lZ&�r���z���x��CG~�����߲b-���ں��.���g����<���5lJ��I�C�ݕ
������	m7�Mi��EOm�z��CG���#ɹ-V�kٓo~n����D�v{����'��*5����ho�Ǟ���[��;񖄈_��GC�	�T�n��W{���H{��W������
�رak���|i���žڊ�w�H3�s;V�G ����[ZZ����<>44T���u%ə�K�DP����K���O�P��ťŘ¢��Uqb�$��觇�G`�Bހ)�>zb|�|�5VW\\���mՐ����� �
&;7��U��Qc6&6nA�Io蘛q�Cڀ)�>cjr:W��Ngj����f���}�`E��cU�<<8P���uK_o�Mcc��|�����&��U^ʗ��:���yY{*���dOt�$$X�����_�dܼ*w����jo��@���o���?^�-��\�
YL��MLL�+ܧ���쇋�G�����Ԥ��hflK��sL���p��ouvvt&��>z����?���G�_�
�׃��͚=l+��z�l�s�ܙO���jn�Z���6���<���L��P�����������?q�ֿMMK�SkU��^/�`*Ø�#��]>p��ꝥ�|3�J�*P�����R5��ёᲕ�;���z��l�KK��mM��K��Tg�X�5a�/4r��;���|���e� ��Kv_w��@)6�mbj��o���Mc+̊)T���/�����+�����LgW��y����/+H޳چ���Mc>���܂�sMW.����3?�?0�700�n��擒����ᇇ�nvNn�j�k=u27�4�T����{A=�g�v���^^Y�]Y^�U�$"�)������x�xyy%֙��e��;�kz�+VB�8����Tg5ZqK��5T΁������L��w�[��K���jF4�

[�̘��f6\�p����ͬ�]XX�h�3b�B%��?NNN�O�$(�)~.&Z�ʕ�WS��tu�ݡ��۟z��������}�~SØ^�'mz%����Ԯ���]�t�W���s***?t��_)��!˰�X�����F#�^�l��KS�/_�h�~Y#b��Y�f�{p���s�>��������i��mjG�r4��p�Ѝ�״�r��/~�ܼ/m���lhh`�j�U���������耂�}%%�/M�'����Z���5����9���y�kl�F���Y������^3Wg�L�D�Wͷ���Yc�����{QN�/+�F���+��Y;[=�ٯ1
Y�3�����ږ榻t^M������y�&$ئ�7d3Y���Y5㜢E�5�T��A�g�0ZK��4SUS���5�J�V��ZU�IcK3,2A�JK������/]���3�~]�p\����(7�7�g����ۚ?x����PB�ʁ�����v��
��?��~n��yAo���qf���-��Ԟ��y����)���9������;�R���4��R�n�������
Z�i����Ng��W
�(e�KU{���
�#��	~�uU��Ѣ�i5۷ʢ�
$)`���g���oz^��Z����s	K�o���v���e
��}Zq���4�����_�*C{�u�^�yM)6��)��u�zZ�fOO��86.v��"���*��S�5oY}���>� 0kjۧ��� O�?���g���CG�\���oA��kMc�����Ɔ�����U1�����m�����?�
����,B~�!>�Y6�Y�Be��zJ_���2:J��W2ɤk9%
ڬ�~ӷ���ڀE+W[)�h�$��uh��5�v����(W��
��1�q�;g��jH���{��*�䈋��V�m�u�
���P�YU�\pL��Tv������v�2��Z�p;��P��Y?ɗ�M���%�O�l�gO���
�;5޵��ɤQh��x솓�ҋ?�|GG����
��p��90	�j�.=v��9��\�x������߲Z_[��������z�EG���-toy�N����7C �
.g��I�2��#n����a�����'��T���Џ�=4e��U|q��l��b�Ihe�k�̢)��]fB��SaV�$([e����k���UՉߪX���	u�M���(mRe��
�v�����ր���lե,�e���N�Dq=r��l�#��h�^���*VH6��Ђ��
�'��t�j�����e��?S�]?��� ��
�@0�h�.�5��y��@��B��a��F�J�_R �j��2S�;g6YQ�]�@���I�OUkO���6� A��+~U��
�@к��q�hY̲�|�7��1�����*��3��i�8�i|���x�4����{��neT��>�������V��Ԟ��Q�A�}]�-�a<-������9h�h�^�&�ZOl�-ߪ8�ez�]���D�����\�0�i��S�����{��T�<�z_��iM�u��g�6��ޖ�p�1+J�xZjAk�L���U�'NY�v��ym˷*Fh���8dv�֦/�>Y�a���K���S���ܼ����3��X�)G����6���Ņń���Ϩ�N��l	өq�
��mf�����q�^M����i���NgS_�A�T~���ε|>����5`&��˯׶�7;8o�%E�Q����������k��~��D�d�n�#����	﬷�rw�#�v�Ay_���C�xn%�~9#3��������ܭ��
_���0<�$�{rr���xmZZz�v�r��2��TQQ�#Z���be���w�]��p�b��l�V��\P\gI�&�@�'n��g�KQ�/ɐ6<i'���'v�oӤ�utl�&��
��T���N��<�
Q~��tv��~�77[��C��0
�S�K3:�Չ�k{5b`?qʹ��3U�JI*hxV�R�8��|GJ����)��=�9�����c���KIMo��]�%��z{�>��_i;
m]l�0u�W���w^5�-!��)0	��#C7��af����E��Kb��Ti��z��yy�/�����Z���y!++��f%�V���,��a�gk=D�0s`���)�i��r��,��^T$��Ԝ���k찆'CNg�U�N��i1qlt�v�\+#3����U�5�t�<h6Q)�O��t�a�ok9Jp0%hƫ3CH�´a+����S�㵞iw���h��0<f�-�N�z�Z�=��p��Bk9�r��23��MN�׏�ߩԎ���׆^ �
.�ݦ��MuK�?}��}}��Y\\����1�������o�#�ё��Z��+;;�Yk������.*����f$߯$�
�Ϸ}նޕ�Sr����Y��1��J{?k
����ܣ��E�c���|�L�/��S��x
�)�M�Z���XXoJJj��f��Xnӌ$�����}�m��c������N���Ύ��T�+yp����e���?����M�� ?���8��z�+�$$Jyw6Z�C�P���<��asc�#����3�s%�zAm�L|�"ݧhY�ӽ&�z'����ԉ]���wi3���G�%`g�0��Wםzܵ���Q�3�U�=*ۭ���s�4�٫zne������t9��ڀ)ΰ����2��{�raag�$��c��ܣ�����1�/�������Ѿ9_��Ug�ۆM��`Z�S.{��C5�S�]c�..-��s���	�3��xÌ2��&����vZ _�Θ�YO�����;�����'�~c���mz��ё#Ŗx�h|\|Pz�f�y�b4d���7e�W}R�0dAo�4�<���si�3���7���`&������ѱ��]����f\}�p^��"���,�jJ�(Y+��bbゲӹ&���u066����k6�@�6��M~�BЀ�ϥ�e\�/_`v�[���1E�t%NS�{�z����>d�6��Û�����˝JNIi{s���b(I;�`���h�O��6ť��z1����7`�v^H��jR գ�����;&�O��2��:>���ɻv�=���vf���^���ɜϗ��I�ɽI��`]
v'&&�i&�T��Z��m��-,���G���ߪ*
�O���`&�-^���K�PrZ�|_0?C�����lVUU��J.js��fURf�9���R��������j������c6I�n׹�G;ai��l�aQ���&��:�7J�.P���	�5b$'G���l�fw�hX5�:J���V[�m�`�fm�iwuww�'�5����ݞH��Mz����j���y�/966f.&6fC��|f�y�X�����׳Ŭ�ݤK�?!��Ò`��B�G����c#wi���(T�a�{*;:Z?��j���*�Nɻf��
~�gg�RT\�]-��R����v~Z%wvE�*h�i[��֖��
j��H���p��lE|�b_+�5�͕u]k���̮�֏wv���~������������,��G$�
���F딻e�	SI�zgmz�6�6_�������Ұ�}���4EQ��n�oJf6����][w�Ϯ�Z�[ukc��_���f�����2��bUS?�.J�p�\��*��n��2//�٪�{��LIk��
��X���ZT
���g�(����K���dE��x�������Q�&%F{6����zU����t��ZT��m�B��u�Mo�޸�2�]c#�/������A�����̺PVV�͔�􆄄Wk<]7����2��W8�5>�����C��'�K=YSW�%-�~,ёDU��`F�k�{Op�'�:�[?���w����5;�Ԃ�kB�?#3��4l�J+~�@zMD&h"�f^�"�3� z��uw�~����>- �S\c�������o+��Y��{��1�K��6�pd*�v�����ݽ=���StNn�����_կ�iӽ�n%g�f�2OTZD�-�f�7Ku�)�ԮdgJ�)�d�C�&Џnd
DT��<�kl�����c�ҾS��v��SݭG�C��~1{��yԐ���dIU_��33KBL5MM$�f}��d�POO�{��:633�����ZY������$;���$K�Dd>�:+���L��fֲj�H��

   
��_,((~%-=�9>�2�<� �V
��}ُe㺻�o~ⱇ�4''{�����qfv�%�������~vƣ��d��DGE��GsA�߬I��w�~@�����,⇐�y[��s�ѳO����Wn���Q���a�=ѳ�K�����hinn�tmݾϜy�SY�9�Kv����7��|B�	xܓ���~�����$�ߖ`��i��i�;���7�d�;��v�;�|"�[Z�[�^���'���M�p��w|�joͿ(�Խ�7�fK��vO~����γgN}43+�Q)��X\�f@7�9�k����?���&'&���Z	,Gi�F��j����>�_��z��bb���Q��ݝm'�|��?\\\L:p��j�r$����B�*��>����?�aEcÅ�i����r�p��������8�-�����QZ?�u���C{��S�++Q�]
�W8���ne�?��c�799�U[[���N~ў舨!����{j��/8��ݵ����f����y9V��������x�e���F���F���(����ŧ���V9&zޡ�o9BD6`^�;���>5::R���7�|�_$�����&��!m���յ:�-tv�߭��i�v�����6������[�CGRJKLl�XVv���Go���>��?V	����w�W �b`J�P��^�?T�kWˡ�ǿ���v��Dd9��8K`j�u:++�{td���q�]Z+���z��|�zY��C�������I/.��TP\�l��f���g3�~JՀ-����`_��K>��R��#Ǿ�_XrJ�~A�� ~�ݞ8������x��5:\���sY�UA<u>j
�Q9DD������������
�_ݽ���
�n��q���h�S/qa����G[b�_��@D4`^�;�J�埛���<�����K[���	����O����@�V~08w�����T���z�=�}}{T��jqIٳ��o+���9�Ě�$c��`�1;3���l����R`�0ﴻ�Jc��j���v���6{Deۯ�lѦ�qq�A���Τk~�!�j�x���l�?ooin��kl�����TIY哪��9_�v�^Q��'�l��
[��e�5c:���ѕ��2��HS��L�5<����lZ&�r���z���x��CG~�����߲b-���ں��.���g����<���5lJ��I�C�ݕ
������	m7�Mi��EOm�z��CG���#ɹ-V�kٓo~n����D�v{����'��*5����ho�Ǟ���[��;񖄈_��GC�	�T�n��W{���H{��W������
�رak���|i���žڊ�w�H3�s;V�G ����[ZZ����<>44T���u%ə�K�DP����K���O�P��ťŘ¢��Uqb�$��觇�G`�Bހ)�>zb|�|�5VW\\���mՐ����� �
&;7��U��Qc6&6nA�Io蘛q�Cڀ)�>cjr:W��Ngj����f���}�`E��cU�<<8P���uK_o�Mcc��|�����&��U^ʗ��:���yY{*���dOt�$$X�����_�dܼ*w����jo��@���o���?^�-��\�
YL��MLL�+ܧ���쇋�G�����Ԥ��hflK��sL���p��ouvvt&��>z����?���G�_�
�׃��͚=l+��z�l�s�ܙO���jn�Z���6���<���L��P�����������?q�ֿMMK�SkU��^/�`*Ø�#��]>p��ꝥ�|3�J�*P�����R5��ёᲕ�;���z��l�KK��mM��K��Tg�X�5a�/4r��;���|���e� ��Kv_w��@)6�mbj��o���Mc+̊)T���/�����+�����LgW��y����/+H޳چ���Mc>���܂�sMW.����3?�?0�700�n��擒����ᇇ�nvNn�j�k=u27�4�T����{A=�g�v���^^Y�]Y^�U�$"�)������x�xyy%֙��e��;�kz�+VB�8����Tg5ZqK��5T΁������L��w�[��K���jF4�

[�̘��f6\�p����ͬ�]XX�h�3b�B%��?NNN�O�$(�)~.&Z�ʕ�WS��tu�ݡ��۟z��������}�~SØ^�'mz%����Ԯ���]�t�W���s***?t��_)��!˰�X�����F#�^�l��KS�/_�h�~Y#b��Y�f�{p���s�>��������i��mjG�r4��p�Ѝ�״�r��/~�ܼ/m���lhh`�j�U���������耂�}%%�/M�'����Z���5����9���y�kl�F���Y������^3Wg�L�D�Wͷ���Yc�����{QN�/+�F���+��Y;[=�ٯ1
Y�3�����ږ榻t^M������y�&$ئ�7d3Y���Y5㜢E�5�T��A�g�0ZK��4SUS���5�J�V��ZU�IcK3,2A�JK������/]���3�~]�p\����(7�7�g����ۚ?x����PB�ʁ�����v��
��?��~n��yAo���qf���-��Ԟ��y����)���9������;�R���4��R�n�������
Z�i����Ng��W
�(e�KU{���
�#��	~�uU��Ѣ�i5۷ʢ�
$)`���g���oz^��Z����s	K�o���v���e
��}Zq���4�����_�*C{�u�^�yM)6��)��u�zZ�fOO��86.v��"���*��S�5oY}���>� 0kjۧ��� O�?���g���CG�\���oA��kMc�����Ɔ�����U1�����m�����?�
����,B~�!>�Y6�Y�Be��zJ_���2:J��W2ɤk9%
ڬ�~ӷ���ڀE+W[)�h�$��uh��5�v����(W��
��1�q�;g��jH���{��*�䈋��V�m�u�
���P�YU�\pL��Tv������v�2��Z�p;��P��Y?ɗ�M���%�O�l�gO���
�;5޵��ɤQh��x솓�ҋ?�|GG����
��p��90	�j�.=v��9��\�x������߲Z_[��������z�EG���-toy�N����7C �
.g��I�2��#n����a�����'��T���Џ�=4e��U|q��l��b�Ihe�k�̢)��]fB��SaV�$([e����k���UՉߪX���	u�M���(mRe��
�v�����ր���lե,�e���N�Dq=r��l�#��h�^���*VH6��Ђ��
�'��t�j�����e��?S�]?��� ��
�@0�h�.�5��y��@��B��a��F�J�_R �j��2S�;g6YQ�]�@���I�OUkO���6� A��+~U��
�@к��q�hY̲�|�7��1�����*��3��i�8�i|���x�4����{��neT��>�������V��Ԟ��Q�A�}]�-�a<-������9h�h�^�&�ZOl�-ߪ8�ez�]���D�����\�0�i��S�����{��T�<�z_��iM�u��g�6��ޖ�p�1+J�xZjAk�L���U�'NY�v��ym˷*Fh���8dv�֦/�>Y�a���K���S���ܼ����3��X�)G����6���Ņń���Ϩ�N��l	өq�
��mf�����q�^M����i���NgS_�A�T~���ε|>����5`&��˯׶�7;8o�%E�Q����������k��~��D�d�n�#����	﬷�rw�#�v�Ay_���C�xn%�~9#3��������ܭ��
_���0<�$�{rr���xmZZz�v�r��2��TQQ�#Z���be���w�]��p�b��l�V��\P\gI�&�@�'n��g�KQ�/ɐ6<i'���'v�oӤ�utl�&��
��T���N��<�
Q~��tv��~�77[��C��0
�S�K3:�Չ�k{5b`?qʹ��3U�JI*hxV�R�8��|GJ����)��=�9�����c���KIMo��]�%��z{�>��_i;
m]l�0u�W���w^5�-!��)0	��#C7��af����E��Kb��Ti��z��yy�/�����Z���y!++��f%�V���,��a�gk=D�0s`���)�i��r��,��^T$��Ԝ���k찆'CNg�U�N��i1qlt�v�\+#3����U�5�t�<h6Q)�O��t�a�ok9Jp0%hƫ3CH�´a+����S�㵞iw���h��0<f�-�N�z�Z�=��p��Bk9�r��23��MN�׏�ߩԎ���׆^ �
.�ݦ��MuK�?}��}}��Y\\����1�������o�#�ё��Z��+;;�Yk������.*����f$߯$�
�Ϸ}նޕ�Sr����Y��1��J{?k
����ܣ��E�c���|�L�/��S��x
�)�M�Z���XXoJJj��f��Xnӌ$�����}�m��c������N���Ύ��T�+yp����e���?����M�� ?���8��z�+�$$Jyw6Z�C�P���<��asc�#����3�s%�zAm�L|�"ݧhY�ӽ&�z'����ԉ]���wi3���G�%`g�0��Wםzܵ���Q�3�U�=*ۭ���s�4�٫zne������t9��ڀ)ΰ����2��{�raag�$��c��ܣ�����1�/�������Ѿ9_��Ug�ۆM��`Z�S.{��C5�S�]c�..-��s���	�3��xÌ2��&����vZ _�Θ�YO�����;�����'�~c���mz��ё#Ŗx�h|\|Pz�f�y�b4d���7e�W}R�0dAo�4�<���si�3���7���`&������ѱ��]����f\}�p^��"���,�jJ�(Y+��bbゲӹ&���u066����k6�@�6��M~�BЀ�ϥ�e\�/_`v�[���1E�t%NS�{�z����>d�6��Û�����˝JNIi{s���b(I;�`���h�O��6ť��z1����7`�v^H��jR գ�����;&�O��2��:>���ɻv�=���vf���^���ɜϗ��I�ɽI��`]
v'&&�i&�T��Z��m��-,���G���ߪ*
�O���`&�-^���K�PrZ�|_0?C�����lVUU��J.js��fURf�9���R��������j������c6I�n׹�G;ai��l�aQ���&��:�7J�.P���	�5b$'G���l�fw�hX5�:J���V[�m�`�fm�iwuww�'�5����ݞH��Mz����j���y�/966f.&6fC��|f�y�X�����׳Ŭ�ݤK�?!��Ò`��B�G����c#wi���(T�a�{*;:Z?��j���*�Nɻf��
~�gg�RT\�]-��R����v~Z%wvE�*h�i[��֖��
j��H���p��lE|�b_+�5�͕u]k���̮�֏wv���~������������,��G$�
���F딻e�	SI�zgmz�6�6_�������Ұ�}���4EQ��n�oJf6����][w�Ϯ�Z�[ukc��_���f�����2��bUS?�.J�p�\��*��n��2//�٪�{��LIk��
��X���ZT
���g�(����K���dE��x�������Q�&%F{6����zU����t��ZT��m�B��u�Mo�޸�2�]c#�/������A�����̺PVV�͔�􆄄Wk<]7����2��W8�5>�����C��'�K=YSW�%-�~,ёDU��`F�k�{Op�'�:�[?���w����5;�Ԃ�kB�?#3��4l�J+~�@zMD&h"�f^�"�3� z��uw�~����>- �S\c�������o+��Y��{��1�K��6�pd*�v�����ݽ=���StNn�����_կ�iӽ�n%g�f�2OTZD�-�f�7Ku�)�ԮdgJ�)�d�C�&Џnd
DT��<�kl�����c�ҾS��v��SݭG�C��~1{��yԐ���dIU_��33KBL5MM$�f}��d�POO�{��:633�����ZY������$;���$K�Dd>�:+���L��fֲj�H��
INSERT INTO sl_accomplishment_report VALUES("0000000019","2021-00001","Lisandra Arachnid","BEED 1st Year","Day","Unpaid Labor (SL)","�PNG

   
��_,((~%-=�9>�2�<� �V
��}ُe㺻�o~ⱇ�4''{�����qfv�%�������~vƣ��d��DGE��GsA�߬I��w�~@�����,⇐�y[��s�ѳO����Wn���Q���a�=ѳ�K�����hinn�tmݾϜy�SY�9�Kv����7��|B�	xܓ���~�����$�ߖ`��i��i�;���7�d�;��v�;�|"�[Z�[�^���'���M�p��w|�joͿ(�Խ�7�fK��vO~����γgN}43+�Q)��X\�f@7�9�k����?���&'&���Z	,Gi�F��j����>�_��z��bb���Q��ݝm'�|��?\\\L:p��j�r$����B�*��>����?�aEcÅ�i����r�p��������8�-�����QZ?�u���C{��S�++Q�]
�W8���ne�?��c�799�U[[���N~ў舨!����{j��/8��ݵ����f����y9V��������x�e���F���F���(����ŧ���V9&zޡ�o9BD6`^�;���>5::R���7�|�_$�����&��!m���յ:�-tv�߭��i�v�����6������[�CGRJKLl�XVv���Go���>��?V	����w�W �b`J�P��^�?T�kWˡ�ǿ���v��Dd9��8K`j�u:++�{td���q�]Z+���z��|�zY��C�������I/.��TP\�l��f���g3�~JՀ-����`_��K>��R��#Ǿ�_XrJ�~A�� ~�ݞ8������x��5:\���sY�UA<u>j
�Q9DD������������
�_ݽ���
�n��q���h�S/qa����G[b�_��@D4`^�;�J�埛���<�����K[���	����O����@�V~08w�����T���z�=�}}{T��jqIٳ��o+���9�Ě�$c��`�1;3���l����R`�0ﴻ�Jc��j���v���6{Deۯ�lѦ�qq�A���Τk~�!�j�x���l�?ooin��kl�����TIY哪��9_�v�^Q��'�l��
[��e�5c:���ѕ��2��HS��L�5<����lZ&�r���z���x��CG~�����߲b-���ں��.���g����<���5lJ��I�C�ݕ
������	m7�Mi��EOm�z��CG���#ɹ-V�kٓo~n����D�v{����'��*5����ho�Ǟ���[��;񖄈_��GC�	�T�n��W{���H{��W������
�رak���|i���žڊ�w�H3�s;V�G ����[ZZ����<>44T���u%ə�K�DP����K���O�P��ťŘ¢��Uqb�$��觇�G`�Bހ)�>zb|�|�5VW\\���mՐ����� �
&;7��U��Qc6&6nA�Io蘛q�Cڀ)�>cjr:W��Ngj����f���}�`E��cU�<<8P���uK_o�Mcc��|�����&��U^ʗ��:���yY{*���dOt�$$X�����_�dܼ*w����jo��@���o���?^�-��\�
YL��MLL�+ܧ���쇋�G�����Ԥ��hflK��sL���p��ouvvt&��>z����?���G�_�
�׃��͚=l+��z�l�s�ܙO���jn�Z���6���<���L��P�����������?q�ֿMMK�SkU��^/�`*Ø�#��]>p��ꝥ�|3�J�*P�����R5��ёᲕ�;���z��l�KK��mM��K��Tg�X�5a�/4r��;���|���e� ��Kv_w��@)6�mbj��o���Mc+̊)T���/�����+�����LgW��y����/+H޳چ���Mc>���܂�sMW.����3?�?0�700�n��擒����ᇇ�nvNn�j�k=u27�4�T����{A=�g�v���^^Y�]Y^�U�$"�)������x�xyy%֙��e��;�kz�+VB�8����Tg5ZqK��5T΁������L��w�[��K���jF4�

[�̘��f6\�p����ͬ�]XX�h�3b�B%��?NNN�O�$(�)~.&Z�ʕ�WS��tu�ݡ��۟z��������}�~SØ^�'mz%����Ԯ���]�t�W���s***?t��_)��!˰�X�����F#�^�l��KS�/_�h�~Y#b��Y�f�{p���s�>��������i��mjG�r4��p�Ѝ�״�r��/~�ܼ/m���lhh`�j�U���������耂�}%%�/M�'����Z���5����9���y�kl�F���Y������^3Wg�L�D�Wͷ���Yc�����{QN�/+�F���+��Y;[=�ٯ1
Y�3�����ږ榻t^M������y�&$ئ�7d3Y���Y5㜢E�5�T��A�g�0ZK��4SUS���5�J�V��ZU�IcK3,2A�JK������/]���3�~]�p\����(7�7�g����ۚ?x����PB�ʁ�����v��
��?��~n��yAo���qf���-��Ԟ��y����)���9������;�R���4��R�n�������
Z�i����Ng��W
�(e�KU{���
�#��	~�uU��Ѣ�i5۷ʢ�
$)`���g���oz^��Z����s	K�o���v���e
��}Zq���4�����_�*C{�u�^�yM)6��)��u�zZ�fOO��86.v��"���*��S�5oY}���>� 0kjۧ��� O�?���g���CG�\���oA��kMc�����Ɔ�����U1�����m�����?�
����,B~�!>�Y6�Y�Be��zJ_���2:J��W2ɤk9%
ڬ�~ӷ���ڀE+W[)�h�$��uh��5�v����(W��
��1�q�;g��jH���{��*�䈋��V�m�u�
���P�YU�\pL��Tv������v�2��Z�p;��P��Y?ɗ�M���%�O�l�gO���
�;5޵��ɤQh��x솓�ҋ?�|GG����
��p��90	�j�.=v��9��\�x������߲Z_[��������z�EG���-toy�N����7C �
.g��I�2��#n����a�����'��T���Џ�=4e��U|q��l��b�Ihe�k�̢)��]fB��SaV�$([e����k���UՉߪX���	u�M���(mRe��
�v�����ր���lե,�e���N�Dq=r��l�#��h�^���*VH6��Ђ��
�'��t�j�����e��?S�]?��� ��
�@0�h�.�5��y��@��B��a��F�J�_R �j��2S�;g6YQ�]�@���I�OUkO���6� A��+~U��
�@к��q�hY̲�|�7��1�����*��3��i�8�i|���x�4����{��neT��>�������V��Ԟ��Q�A�}]�-�a<-������9h�h�^�&�ZOl�-ߪ8�ez�]���D�����\�0�i��S�����{��T�<�z_��iM�u��g�6��ޖ�p�1+J�xZjAk�L���U�'NY�v��ym˷*Fh���8dv�֦/�>Y�a���K���S���ܼ����3��X�)G����6���Ņń���Ϩ�N��l	өq�
��mf�����q�^M����i���NgS_�A�T~���ε|>����5`&��˯׶�7;8o�%E�Q����������k��~��D�d�n�#����	﬷�rw�#�v�Ay_���C�xn%�~9#3��������ܭ��
_���0<�$�{rr���xmZZz�v�r��2��TQQ�#Z���be���w�]��p�b��l�V��\P\gI�&�@�'n��g�KQ�/ɐ6<i'���'v�oӤ�utl�&��
��T���N��<�
Q~��tv��~�77[��C��0
�S�K3:�Չ�k{5b`?qʹ��3U�JI*hxV�R�8��|GJ����)��=�9�����c���KIMo��]�%��z{�>��_i;
m]l�0u�W���w^5�-!��)0	��#C7��af����E��Kb��Ti��z��yy�/�����Z���y!++��f%�V���,��a�gk=D�0s`���)�i��r��,��^T$��Ԝ���k찆'CNg�U�N��i1qlt�v�\+#3����U�5�t�<h6Q)�O��t�a�ok9Jp0%hƫ3CH�´a+����S�㵞iw���h��0<f�-�N�z�Z�=��p��Bk9�r��23��MN�׏�ߩԎ���׆^ �
.�ݦ��MuK�?}��}}��Y\\����1�������o�#�ё��Z��+;;�Yk������.*����f$߯$�
�Ϸ}նޕ�Sr����Y��1��J{?k
����ܣ��E�c���|�L�/��S��x
�)�M�Z���XXoJJj��f��Xnӌ$�����}�m��c������N���Ύ��T�+yp����e���?����M�� ?���8��z�+�$$Jyw6Z�C�P���<��asc�#����3�s%�zAm�L|�"ݧhY�ӽ&�z'����ԉ]���wi3���G�%`g�0��Wםzܵ���Q�3�U�=*ۭ���s�4�٫zne������t9��ڀ)ΰ����2��{�raag�$��c��ܣ�����1�/�������Ѿ9_��Ug�ۆM��`Z�S.{��C5�S�]c�..-��s���	�3��xÌ2��&����vZ _�Θ�YO�����;�����'�~c���mz��ё#Ŗx�h|\|Pz�f�y�b4d���7e�W}R�0dAo�4�<���si�3���7���`&������ѱ��]����f\}�p^��"���,�jJ�(Y+��bbゲӹ&���u066����k6�@�6��M~�BЀ�ϥ�e\�/_`v�[���1E�t%NS�{�z����>d�6��Û�����˝JNIi{s���b(I;�`���h�O��6ť��z1����7`�v^H��jR գ�����;&�O��2��:>���ɻv�=���vf���^���ɜϗ��I�ɽI��`]
v'&&�i&�T��Z��m��-,���G���ߪ*
�O���`&�-^���K�PrZ�|_0?C�����lVUU��J.js��fURf�9���R��������j������c6I�n׹�G;ai��l�aQ���&��:�7J�.P���	�5b$'G���l�fw�hX5�:J���V[�m�`�fm�iwuww�'�5����ݞH��Mz����j���y�/966f.&6fC��|f�y�X�����׳Ŭ�ݤK�?!��Ò`��B�G����c#wi���(T�a�{*;:Z?��j���*�Nɻf��
~�gg�RT\�]-��R����v~Z%wvE�*h�i[��֖��
j��H���p��lE|�b_+�5�͕u]k���̮�֏wv���~������������,��G$�
���F딻e�	SI�zgmz�6�6_�������Ұ�}���4EQ��n�oJf6����][w�Ϯ�Z�[ukc��_���f�����2��bUS?�.J�p�\��*��n��2//�٪�{��LIk��
��X���ZT
���g�(����K���dE��x�������Q�&%F{6����zU����t��ZT��m�B��u�Mo�޸�2�]c#�/������A�����̺PVV�͔�􆄄Wk<]7����2��W8�5>�����C��'�K=YSW�%-�~,ёDU��`F�k�{Op�'�:�[?���w����5;�Ԃ�kB�?#3��4l�J+~�@zMD&h"�f^�"�3� z��uw�~����>- �S\c�������o+��Y��{��1�K��6�pd*�v�����ݽ=���StNn�����_կ�iӽ�n%g�f�2OTZD�-�f�7Ku�)�ԮdgJ�)�d�C�&Џnd
DT��<�kl�����c�ҾS��v��SݭG�C��~1{��yԐ���dIU_��33KBL5MM$�f}��d�POO�{��:633�����ZY������$;���$K�Dd>�:+���L��fֲj�H��
INSERT INTO sl_accomplishment_report VALUES("0000000020","2021-00002","Samuel L. Jackson","BTVTE 1st Year","Day","Paid Labor (SL)","","Elementary Education Department","October","2021","fwefsdfsdfsdfsdf#sdfsdf","1","Severus Snape","�PNG

   
��_,((~%-=�9>�2�<� �V
��}ُe㺻�o~ⱇ�4''{�����qfv�%�������~vƣ��d��DGE��GsA�߬I��w�~@�����,⇐�y[��s�ѳO����Wn���Q���a�=ѳ�K�����hinn�tmݾϜy�SY�9�Kv����7��|B�	xܓ���~�����$�ߖ`��i��i�;���7�d�;��v�;�|"�[Z�[�^���'���M�p��w|�joͿ(�Խ�7�fK��vO~����γgN}43+�Q)��X\�f@7�9�k����?���&'&���Z	,Gi�F��j����>�_��z��bb���Q��ݝm'�|��?\\\L:p��j�r$����B�*��>����?�aEcÅ�i����r�p��������8�-�����QZ?�u���C{��S�++Q�]
�W8���ne�?��c�799�U[[���N~ў舨!����{j��/8��ݵ����f����y9V��������x�e���F���F���(����ŧ���V9&zޡ�o9BD6`^�;���>5::R���7�|�_$�����&��!m���յ:�-tv�߭��i�v�����6������[�CGRJKLl�XVv���Go���>��?V	����w�W �b`J�P��^�?T�kWˡ�ǿ���v��Dd9��8K`j�u:++�{td���q�]Z+���z��|�zY��C�������I/.��TP\�l��f���g3�~JՀ-����`_��K>��R��#Ǿ�_XrJ�~A�� ~�ݞ8������x��5:\���sY�UA<u>j
�Q9DD������������
�_ݽ���
�n��q���h�S/qa����G[b�_��@D4`^�;�J�埛���<�����K[���	����O����@�V~08w�����T���z�=�}}{T��jqIٳ��o+���9�Ě�$c��`�1;3���l����R`�0ﴻ�Jc��j���v���6{Deۯ�lѦ�qq�A���Τk~�!�j�x���l�?ooin��kl�����TIY哪��9_�v�^Q��'�l��
[��e�5c:���ѕ��2��HS��L�5<����lZ&�r���z���x��CG~�����߲b-���ں��.���g����<���5lJ��I�C�ݕ
������	m7�Mi��EOm�z��CG���#ɹ-V�kٓo~n����D�v{����'��*5����ho�Ǟ���[��;񖄈_��GC�	�T�n��W{���H{��W������
�رak���|i���žڊ�w�H3�s;V�G ����[ZZ����<>44T���u%ə�K�DP����K���O�P��ťŘ¢��Uqb�$��觇�G`�Bހ)�>zb|�|�5VW\\���mՐ����� �
&;7��U��Qc6&6nA�Io蘛q�Cڀ)�>cjr:W��Ngj����f���}�`E��cU�<<8P���uK_o�Mcc��|�����&��U^ʗ��:���yY{*���dOt�$$X�����_�dܼ*w����jo��@���o���?^�-��\�
YL��MLL�+ܧ���쇋�G�����Ԥ��hflK��sL���p��ouvvt&��>z����?���G�_�
�׃��͚=l+��z�l�s�ܙO���jn�Z���6���<���L��P�����������?q�ֿMMK�SkU��^/�`*Ø�#��]>p��ꝥ�|3�J�*P�����R5��ёᲕ�;���z��l�KK��mM��K��Tg�X�5a�/4r��;���|���e� ��Kv_w��@)6�mbj��o���Mc+̊)T���/�����+�����LgW��y����/+H޳چ���Mc>���܂�sMW.����3?�?0�700�n��擒����ᇇ�nvNn�j�k=u27�4�T����{A=�g�v���^^Y�]Y^�U�$"�)������x�xyy%֙��e��;�kz�+VB�8����Tg5ZqK��5T΁������L��w�[��K���jF4�

[�̘��f6\�p����ͬ�]XX�h�3b�B%��?NNN�O�$(�)~.&Z�ʕ�WS��tu�ݡ��۟z��������}�~SØ^�'mz%����Ԯ���]�t�W���s***?t��_)��!˰�X�����F#�^�l��KS�/_�h�~Y#b��Y�f�{p���s�>��������i��mjG�r4��p�Ѝ�״�r��/~�ܼ/m���lhh`�j�U���������耂�}%%�/M�'����Z���5����9���y�kl�F���Y������^3Wg�L�D�Wͷ���Yc�����{QN�/+�F���+��Y;[=�ٯ1
Y�3�����ږ榻t^M������y�&$ئ�7d3Y���Y5㜢E�5�T��A�g�0ZK��4SUS���5�J�V��ZU�IcK3,2A�JK������/]���3�~]�p\����(7�7�g����ۚ?x����PB�ʁ�����v��
��?��~n��yAo���qf���-��Ԟ��y����)���9������;�R���4��R�n�������
Z�i����Ng��W
�(e�KU{���
�#��	~�uU��Ѣ�i5۷ʢ�
$)`���g���oz^��Z����s	K�o���v���e
��}Zq���4�����_�*C{�u�^�yM)6��)��u�zZ�fOO��86.v��"���*��S�5oY}���>� 0kjۧ��� O�?���g���CG�\���oA��kMc�����Ɔ�����U1�����m�����?�
����,B~�!>�Y6�Y�Be��zJ_���2:J��W2ɤk9%
ڬ�~ӷ���ڀE+W[)�h�$��uh��5�v����(W��
��1�q�;g��jH���{��*�䈋��V�m�u�
���P�YU�\pL��Tv������v�2��Z�p;��P��Y?ɗ�M���%�O�l�gO���
�;5޵��ɤQh��x솓�ҋ?�|GG����
��p��90	�j�.=v��9��\�x������߲Z_[��������z�EG���-toy�N����7C �
.g��I�2��#n����a�����'��T���Џ�=4e��U|q��l��b�Ihe�k�̢)��]fB��SaV�$([e����k���UՉߪX���	u�M���(mRe��
�v�����ր���lե,�e���N�Dq=r��l�#��h�^���*VH6��Ђ��
�'��t�j�����e��?S�]?��� ��
�@0�h�.�5��y��@��B��a��F�J�_R �j��2S�;g6YQ�]�@���I�OUkO���6� A��+~U��
�@к��q�hY̲�|�7��1�����*��3��i�8�i|���x�4����{��neT��>�������V��Ԟ��Q�A�}]�-�a<-������9h�h�^�&�ZOl�-ߪ8�ez�]���D�����\�0�i��S�����{��T�<�z_��iM�u��g�6��ޖ�p�1+J�xZjAk�L���U�'NY�v��ym˷*Fh���8dv�֦/�>Y�a���K���S���ܼ����3��X�)G����6���Ņń���Ϩ�N��l	өq�
��mf�����q�^M����i���NgS_�A�T~���ε|>����5`&��˯׶�7;8o�%E�Q����������k��~��D�d�n�#����	﬷�rw�#�v�Ay_���C�xn%�~9#3��������ܭ��
_���0<�$�{rr���xmZZz�v�r��2��TQQ�#Z���be���w�]��p�b��l�V��\P\gI�&�@�'n��g�KQ�/ɐ6<i'���'v�oӤ�utl�&��
��T���N��<�
Q~��tv��~�77[��C��0
�S�K3:�Չ�k{5b`?qʹ��3U�JI*hxV�R�8��|GJ����)��=�9�����c���KIMo��]�%��z{�>��_i;
m]l�0u�W���w^5�-!��)0	��#C7��af����E��Kb��Ti��z��yy�/�����Z���y!++��f%�V���,��a�gk=D�0s`���)�i��r��,��^T$��Ԝ���k찆'CNg�U�N��i1qlt�v�\+#3����U�5�t�<h6Q)�O��t�a�ok9Jp0%hƫ3CH�´a+����S�㵞iw���h��0<f�-�N�z�Z�=��p��Bk9�r��23��MN�׏�ߩԎ���׆^ �
.�ݦ��MuK�?}��}}��Y\\����1�������o�#�ё��Z��+;;�Yk������.*����f$߯$�
�Ϸ}նޕ�Sr����Y��1��J{?k
����ܣ��E�c���|�L�/��S��x
�)�M�Z���XXoJJj��f��Xnӌ$�����}�m��c������N���Ύ��T�+yp����e���?����M�� ?���8��z�+�$$Jyw6Z�C�P���<��asc�#����3�s%�zAm�L|�"ݧhY�ӽ&�z'����ԉ]���wi3���G�%`g�0��Wםzܵ���Q�3�U�=*ۭ���s�4�٫zne������t9��ڀ)ΰ����2��{�raag�$��c��ܣ�����1�/�������Ѿ9_��Ug�ۆM��`Z�S.{��C5�S�]c�..-��s���	�3��xÌ2��&����vZ _�Θ�YO�����;�����'�~c���mz��ё#Ŗx�h|\|Pz�f�y�b4d���7e�W}R�0dAo�4�<���si�3���7���`&������ѱ��]����f\}�p^��"���,�jJ�(Y+��bbゲӹ&���u066����k6�@�6��M~�BЀ�ϥ�e\�/_`v�[���1E�t%NS�{�z����>d�6��Û�����˝JNIi{s���b(I;�`���h�O��6ť��z1����7`�v^H��jR գ�����;&�O��2��:>���ɻv�=���vf���^���ɜϗ��I�ɽI��`]
v'&&�i&�T��Z��m��-,���G���ߪ*
�O���`&�-^���K�PrZ�|_0?C�����lVUU��J.js��fURf�9���R��������j������c6I�n׹�G;ai��l�aQ���&��:�7J�.P���	�5b$'G���l�fw�hX5�:J���V[�m�`�fm�iwuww�'�5����ݞH��Mz����j���y�/966f.&6fC��|f�y�X�����׳Ŭ�ݤK�?!��Ò`��B�G����c#wi���(T�a�{*;:Z?��j���*�Nɻf��
~�gg�RT\�]-��R����v~Z%wvE�*h�i[��֖��
j��H���p��lE|�b_+�5�͕u]k���̮�֏wv���~������������,��G$�
���F딻e�	SI�zgmz�6�6_�������Ұ�}���4EQ��n�oJf6����][w�Ϯ�Z�[ukc��_���f�����2��bUS?�.J�p�\��*��n��2//�٪�{��LIk��
��X���ZT
���g�(����K���dE��x�������Q�&%F{6����zU����t��ZT��m�B��u�Mo�޸�2�]c#�/������A�����̺PVV�͔�􆄄Wk<]7����2��W8�5>�����C��'�K=YSW�%-�~,ёDU��`F�k�{Op�'�:�[?���w����5;�Ԃ�kB�?#3��4l�J+~�@zMD&h"�f^�"�3� z��uw�~����>- �S\c�������o+��Y��{��1�K��6�pd*�v�����ݽ=���StNn�����_կ�iӽ�n%g�f�2OTZD�-�f�7Ku�)�ԮdgJ�)�d�C�&Џnd
DT��<�kl�����c�ҾS��v��SݭG�C��~1{��yԐ���dIU_��33KBL5MM$�f}��d�POO�{��:633�����ZY������$;���$K�Dd>�:+���L��fֲj�H��



CREATE TABLE `sl_applicant` (
  `applicant_id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `student_id` varchar(10) NOT NULL,
  `labor_type` varchar(20) NOT NULL,
  `labor_class` varchar(10) NOT NULL,
  `labor_status` varchar(10) NOT NULL,
  `semester_year` varchar(25) NOT NULL,
  `available_from` time DEFAULT NULL,
  `available_to` time DEFAULT NULL,
  `assigned_to` int(10) unsigned NOT NULL,
  `grades_location` varchar(150) NOT NULL,
  `cor_location` varchar(150) NOT NULL,
  `unit_head_letter_location` varchar(150) NOT NULL,
  `osas_head_letter_location` varchar(150) NOT NULL,
  `date_submitted` date NOT NULL,
  `status` varchar(45) NOT NULL DEFAULT 'Pending for Unit Head Approval',
  `recommendation_location` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`applicant_id`),
  KEY `fk_student_labor_student1_idx` (`student_id`),
  KEY `fk_student_labot_requisition_form1_idx` (`assigned_to`),
  CONSTRAINT `fk_student_labor_student1` FOREIGN KEY (`student_id`) REFERENCES `student` (`Student_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_student_labot_requisition_form1` FOREIGN KEY (`assigned_to`) REFERENCES `requisition_form` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

INSERT INTO sl_applicant VALUES("0000000018","2018-00001","Paid Labor (SL)","Day","New","1st Semester 2021-2022","00:00:00","00:00:00","28","osas-student-labor-files/student-application-grades-certification/aaa_1631713550.pdf","osas-student-labor-files/student-application-current-cor/aaa_1631713550.pdf","osas-student-labor-files/student-application-unit-head-letter-of-intent/aaa_1631713550.pdf","osas-student-labor-files/student-application-osas-head-letter-of-intent/aaa_1631713550.pdf","2021-09-15","Hired","osas-student-labor-files/student-application-recommendation-letter/aaa_1631713648.pdf");
INSERT INTO sl_applicant VALUES("0000000019","2021-00001","Unpaid Labor (SL)","Day","New","1st Semester 2021-2022","00:00:00","00:00:00","29","osas-student-labor-files/student-application-grades-certification/aaa_1635088867.pdf","osas-student-labor-files/student-application-current-cor/aaa_1635088867.pdf","osas-student-labor-files/student-application-unit-head-letter-of-intent/aaa_1635088867.pdf","osas-student-labor-files/student-application-osas-head-letter-of-intent/aaa_1635088867.pdf","2021-10-24","Hired","osas-student-labor-files/student-application-recommendation-letter/aaa_1635089040.pdf");
INSERT INTO sl_applicant VALUES("0000000020","2021-00002","Paid Labor (SL)","Day","New","1st Semester 2021-2022","00:00:00","00:00:00","30","osas-student-labor-files/student-application-grades-certification/aaa_1635335266.pdf","osas-student-labor-files/student-application-current-cor/aaa_1635335266.pdf","osas-student-labor-files/student-application-unit-head-letter-of-intent/aaa_1635335266.pdf","osas-student-labor-files/student-application-osas-head-letter-of-intent/aaa_1635335266.pdf","2021-10-27","Hired","osas-student-labor-files/student-application-recommendation-letter/aaa_1635335598.pdf");
INSERT INTO sl_applicant VALUES("0000000021","2021-00003","Paid Labor (SL)","Day","New","1st Semester 2021-2022","00:00:00","00:00:00","30","osas-student-labor-files/student-application-grades-certification/aaa_1635335432.pdf","osas-student-labor-files/student-application-current-cor/aaa_1635335432.pdf","osas-student-labor-files/student-application-unit-head-letter-of-intent/aaa_1635335432.pdf","osas-student-labor-files/student-application-osas-head-letter-of-intent/aaa_1635335432.pdf","2021-10-27","Hired","osas-student-labor-files/student-application-recommendation-letter/aaa_1635336720.pdf");
INSERT INTO sl_applicant VALUES("0000000022","2021-00004","Paid Labor (SL)","Day","New","1st Semester 2021-2022","00:00:00","00:00:00","30","osas-student-labor-files/student-application-grades-certification/aaa_1635336686.pdf","osas-student-labor-files/student-application-current-cor/aaa_1635336686.pdf","osas-student-labor-files/student-application-unit-head-letter-of-intent/aaa_1635336686.pdf","osas-student-labor-files/student-application-osas-head-letter-of-intent/aaa_1635336686.pdf","2021-10-27","Not Approved","");
INSERT INTO sl_applicant VALUES("0000000023","2019-00101","Paid Labor (SL)","Day","New","1st Semester 2021-2022","00:00:00","00:00:00","32","osas-student-labor-files/student-application-grades-certification/aaa_1635682917.pdf","osas-student-labor-files/student-application-current-cor/aaa_1635682917.pdf","osas-student-labor-files/student-application-unit-head-letter-of-intent/aaa_1635682917.pdf","osas-student-labor-files/student-application-osas-head-letter-of-intent/aaa_1635682917.pdf","2021-10-31","Approved by Unit Head","osas-student-labor-files/student-application-recommendation-letter/aaa_1635685479.pdf");



CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sl_application_form_details` AS select `req`.`requisition_id` AS `requisition_id`,`sl`.`applicant_id` AS `applicant_id`,`sl`.`student_id` AS `student_id`,`st`.`fullname` AS `applicant_name`,`st`.`college` AS `college`,`st`.`section` AS `section`,`st`.`coursetitle` AS `course`,`st`.`year_level` AS `year_level`,`st`.`full_address` AS `full_address`,`st`.`phone_number` AS `phone_number`,date_format(`st`.`birth_date`,'%m/%d%/%Y') AS `applicant_bday`,`st`.`email_add` AS `email_add`,`st`.`birth_place` AS `birth_place`,`sl`.`labor_type` AS `labor_type`,`sl`.`labor_class` AS `labor_class`,`sl`.`labor_status` AS `labor_status`,`sl`.`semester_year` AS `semester_year`,`st`.`e_signature` AS `e_signature`,concat(time_format(`sl`.`available_from`,'%h:%i %p'),' - ',time_format(`sl`.`available_to`,'%h:%i %p')) AS `time_available`,date_format(`sl`.`date_submitted`,'%M %d, %Y') AS `application_submission`,`req`.`requested_by` AS `requested_by`,`req`.`fullname` AS `staff_requested_by`,`req`.`head_signature` AS `head_signature`,`req`.`office_id` AS `office_id`,`req`.`office_name` AS `office_name`,`req`.`office_type` AS `office_type`,`req`.`no_of_sl` AS `no_of_sl`,`req`.`length_of_service` AS `length_of_service`,`req`.`qualification1` AS `qualification1`,`req`.`qualification2` AS `qualification2`,`req`.`qualification3` AS `qualification3`,`req`.`skill1` AS `skill1`,`req`.`skill2` AS `skill2`,`req`.`additional_workload_reason` AS `additional_workload_reason`,`req`.`reduction_in_workload_reason` AS `reduction_in_workload_reason`,`req`.`reached_saturation_reason` AS `reached_saturation_reason`,`req`.`other_reason` AS `other_reason`,`req`.`requisition_status` AS `requisition_status`,date_format(`req`.`date_submitted`,'%M %d, %Y') AS `requisition_date_submitted`,`req`.`assessed_by` AS `assessed_by`,`req`.`assessed_name` AS `assessed_name`,`req`.`assessor_signature` AS `assessor_signature`,`a`.`duty1` AS `duty1`,`a`.`duty2` AS `duty2`,`a`.`duty3` AS `duty3`,`a`.`duty4` AS `duty4`,`a`.`schedule1` AS `schedule1`,`a`.`schedule2` AS `schedule2`,`a`.`starting_date` AS `starting_date`,`a`.`expiration_date` AS `expiration_date`,`a`.`dean_unit_assigned` AS `dean_unit_assigned`,`a`.`budget_officer` AS `budget_officer`,`a`.`chancellor` AS `chancellor`,`a`.`date_signed` AS `date_signed`,`sl`.`grades_location` AS `grades_location`,`sl`.`cor_location` AS `cor_location`,`sl`.`unit_head_letter_location` AS `unit_head_letter_location`,`sl`.`osas_head_letter_location` AS `osas_head_letter_location`,`sl`.`recommendation_location` AS `recommendation_location`,`sl`.`status` AS `status`,if(`sl`.`recommendation_location` is not null,1,0) AS `recommendation_status`,if(`a`.`applicant_id` is not null,1,0) AS `acceptance_contract_status`,if(`a`.`date_signed` is not null,1,0) AS `student_sign_status` from (((`sl_applicant` `sl` left join `sl_reqform_general_info` `req` on(`req`.`requisition_id` = `sl`.`assigned_to`)) left join `studentdetails` `st` on(`st`.`student_id` = `sl`.`student_id`)) left join `sl_acceptance_details` `a` on(`a`.`applicant_id` = `sl`.`applicant_id`));

INSERT INTO sl_application_form_details VALUES("00000000028","0000000018","2018-00001","Aelin Galathynius","CTET","1st Year","BEED","4th Year","Blk. A A St. Prk. A, Brgy. A, A City, A Province","09111111111","11/11/1999","hannajanebw11@gmail.com","Tagum","Paid Labor (SL)","Day","New","1st Semester 2021-2022","�PNG

   
��_,((~%-=�9>�2�<� �V
��}ُe㺻�o~ⱇ�4''{�����qfv�%�������~vƣ��d��DGE��GsA�߬I��w�~@�����,⇐�y[��s�ѳO����Wn���Q���a�=ѳ�K�����hinn�tmݾϜy�SY�9�Kv����7��|B�	xܓ���~�����$�ߖ`��i��i�;���7�d�;��v�;�|"�[Z�[�^���'���M�p��w|�joͿ(�Խ�7�fK��vO~����γgN}43+�Q)��X\�f@7�9�k����?���&'&���Z	,Gi�F��j����>�_��z��bb���Q��ݝm'�|��?\\\L:p��j�r$����B�*��>����?�aEcÅ�i����r�p��������8�-�����QZ?�u���C{��S�++Q�]
�W8���ne�?��c�799�U[[���N~ў舨!����{j��/8��ݵ����f����y9V��������x�e���F���F���(����ŧ���V9&zޡ�o9BD6`^�;���>5::R���7�|�_$�����&��!m���յ:�-tv�߭��i�v�����6������[�CGRJKLl�XVv���Go���>��?V	����w�W �b`J�P��^�?T�kWˡ�ǿ���v��Dd9��8K`j�u:++�{td���q�]Z+���z��|�zY��C�������I/.��TP\�l��f���g3�~JՀ-����`_��K>��R��#Ǿ�_XrJ�~A�� ~�ݞ8������x��5:\���sY�UA<u>j
�Q9DD������������
�_ݽ���
�n��q���h�S/qa����G[b�_��@D4`^�;�J�埛���<�����K[���	����O����@�V~08w�����T���z�=�}}{T��jqIٳ��o+���9�Ě�$c��`�1;3���l����R`�0ﴻ�Jc��j���v���6{Deۯ�lѦ�qq�A���Τk~�!�j�x���l�?ooin��kl�����TIY哪��9_�v�^Q��'�l��
[��e�5c:���ѕ��2��HS��L�5<����lZ&�r���z���x��CG~�����߲b-���ں��.���g����<���5lJ��I�C�ݕ
������	m7�Mi��EOm�z��CG���#ɹ-V�kٓo~n����D�v{����'��*5����ho�Ǟ���[��;񖄈_��GC�	�T�n��W{���H{��W������
�رak���|i���žڊ�w�H3�s;V�G ����[ZZ����<>44T���u%ə�K�DP����K���O�P��ťŘ¢��Uqb�$��觇�G`�Bހ)�>zb|�|�5VW\\���mՐ����� �
&;7��U��Qc6&6nA�Io蘛q�Cڀ)�>cjr:W��Ngj����f���}�`E��cU�<<8P���uK_o�Mcc��|�����&��U^ʗ��:���yY{*���dOt�$$X�����_�dܼ*w����jo��@���o���?^�-��\�
YL��MLL�+ܧ���쇋�G�����Ԥ��hflK��sL���p��ouvvt&��>z����?���G�_�
�׃��͚=l+��z�l�s�ܙO���jn�Z���6���<���L��P�����������?q�ֿMMK�SkU��^/�`*Ø�#��]>p��ꝥ�|3�J�*P�����R5��ёᲕ�;���z��l�KK��mM��K��Tg�X�5a�/4r��;���|���e� ��Kv_w��@)6�mbj��o���Mc+̊)T���/�����+�����LgW��y����/+H޳چ���Mc>���܂�sMW.����3?�?0�700�n��擒����ᇇ�nvNn�j�k=u27�4�T����{A=�g�v���^^Y�]Y^�U�$"�)������x�xyy%֙��e��;�kz�+VB�8����Tg5ZqK��5T΁������L��w�[��K���jF4�

[�̘��f6\�p����ͬ�]XX�h�3b�B%��?NNN�O�$(�)~.&Z�ʕ�WS��tu�ݡ��۟z��������}�~SØ^�'mz%����Ԯ���]�t�W���s***?t��_)��!˰�X�����F#�^�l��KS�/_�h�~Y#b��Y�f�{p���s�>��������i��mjG�r4��p�Ѝ�״�r��/~�ܼ/m���lhh`�j�U���������耂�}%%�/M�'����Z���5����9���y�kl�F���Y������^3Wg�L�D�Wͷ���Yc�����{QN�/+�F���+��Y;[=�ٯ1
Y�3�����ږ榻t^M������y�&$ئ�7d3Y���Y5㜢E�5�T��A�g�0ZK��4SUS���5�J�V��ZU�IcK3,2A�JK������/]���3�~]�p\����(7�7�g����ۚ?x����PB�ʁ�����v��
��?��~n��yAo���qf���-��Ԟ��y����)���9������;�R���4��R�n�������
Z�i����Ng��W
�(e�KU{���
�#��	~�uU��Ѣ�i5۷ʢ�
$)`���g���oz^��Z����s	K�o���v���e
��}Zq���4�����_�*C{�u�^�yM)6��)��u�zZ�fOO��86.v��"���*��S�5oY}���>� 0kjۧ��� O�?���g���CG�\���oA��kMc�����Ɔ�����U1�����m�����?�
����,B~�!>�Y6�Y�Be��zJ_���2:J��W2ɤk9%
ڬ�~ӷ���ڀE+W[)�h�$��uh��5�v����(W��
��1�q�;g��jH���{��*�䈋��V�m�u�
���P�YU�\pL��Tv������v�2��Z�p;��P��Y?ɗ�M���%�O�l�gO���
�;5޵��ɤQh��x솓�ҋ?�|GG����
��p��90	�j�.=v��9��\�x������߲Z_[��������z�EG���-toy�N����7C �
.g��I�2��#n����a�����'��T���Џ�=4e��U|q��l��b�Ihe�k�̢)��]fB��SaV�$([e����k���UՉߪX���	u�M���(mRe��
�v�����ր���lե,�e���N�Dq=r��l�#��h�^���*VH6��Ђ��
�'��t�j�����e��?S�]?��� ��
�@0�h�.�5��y��@��B��a��F�J�_R �j��2S�;g6YQ�]�@���I�OUkO���6� A��+~U��
�@к��q�hY̲�|�7��1�����*��3��i�8�i|���x�4����{��neT��>�������V��Ԟ��Q�A�}]�-�a<-������9h�h�^�&�ZOl�-ߪ8�ez�]���D�����\�0�i��S�����{��T�<�z_��iM�u��g�6��ޖ�p�1+J�xZjAk�L���U�'NY�v��ym˷*Fh���8dv�֦/�>Y�a���K���S���ܼ����3��X�)G����6���Ņń���Ϩ�N��l	өq�
��mf�����q�^M����i���NgS_�A�T~���ε|>����5`&��˯׶�7;8o�%E�Q����������k��~��D�d�n�#����	﬷�rw�#�v�Ay_���C�xn%�~9#3��������ܭ��
_���0<�$�{rr���xmZZz�v�r��2��TQQ�#Z���be���w�]��p�b��l�V��\P\gI�&�@�'n��g�KQ�/ɐ6<i'���'v�oӤ�utl�&��
��T���N��<�
Q~��tv��~�77[��C��0
�S�K3:�Չ�k{5b`?qʹ��3U�JI*hxV�R�8��|GJ����)��=�9�����c���KIMo��]�%��z{�>��_i;
m]l�0u�W���w^5�-!��)0	��#C7��af����E��Kb��Ti��z��yy�/�����Z���y!++��f%�V���,��a�gk=D�0s`���)�i��r��,��^T$��Ԝ���k찆'CNg�U�N��i1qlt�v�\+#3����U�5�t�<h6Q)�O��t�a�ok9Jp0%hƫ3CH�´a+����S�㵞iw���h��0<f�-�N�z�Z�=��p��Bk9�r��23��MN�׏�ߩԎ���׆^ �
.�ݦ��MuK�?}��}}��Y\\����1�������o�#�ё��Z��+;;�Yk������.*����f$߯$�
�Ϸ}նޕ�Sr����Y��1��J{?k
����ܣ��E�c���|�L�/��S��x
�)�M�Z���XXoJJj��f��Xnӌ$�����}�m��c������N���Ύ��T�+yp����e���?����M�� ?���8��z�+�$$Jyw6Z�C�P���<��asc�#����3�s%�zAm�L|�"ݧhY�ӽ&�z'����ԉ]���wi3���G�%`g�0��Wםzܵ���Q�3�U�=*ۭ���s�4�٫zne������t9��ڀ)ΰ����2��{�raag�$��c��ܣ�����1�/�������Ѿ9_��Ug�ۆM��`Z�S.{��C5�S�]c�..-��s���	�3��xÌ2��&����vZ _�Θ�YO�����;�����'�~c���mz��ё#Ŗx�h|\|Pz�f�y�b4d���7e�W}R�0dAo�4�<���si�3���7���`&������ѱ��]����f\}�p^��"���,�jJ�(Y+��bbゲӹ&���u066����k6�@�6��M~�BЀ�ϥ�e\�/_`v�[���1E�t%NS�{�z����>d�6��Û�����˝JNIi{s���b(I;�`���h�O��6ť��z1����7`�v^H��jR գ�����;&�O��2��:>���ɻv�=���vf���^���ɜϗ��I�ɽI��`]
v'&&�i&�T��Z��m��-,���G���ߪ*
�O���`&�-^���K�PrZ�|_0?C�����lVUU��J.js��fURf�9���R��������j������c6I�n׹�G;ai��l�aQ���&��:�7J�.P���	�5b$'G���l�fw�hX5�:J���V[�m�`�fm�iwuww�'�5����ݞH��Mz����j���y�/966f.&6fC��|f�y�X�����׳Ŭ�ݤK�?!��Ò`��B�G����c#wi���(T�a�{*;:Z?��j���*�Nɻf��
~�gg�RT\�]-��R����v~Z%wvE�*h�i[��֖��
j��H���p��lE|�b_+�5�͕u]k���̮�֏wv���~������������,��G$�
���F딻e�	SI�zgmz�6�6_�������Ұ�}���4EQ��n�oJf6����][w�Ϯ�Z�[ukc��_���f�����2��bUS?�.J�p�\��*��n��2//�٪�{��LIk��
��X���ZT
���g�(����K���dE��x�������Q�&%F{6����zU����t��ZT��m�B��u�Mo�޸�2�]c#�/������A�����̺PVV�͔�􆄄Wk<]7����2��W8�5>�����C��'�K=YSW�%-�~,ёDU��`F�k�{Op�'�:�[?���w����5;�Ԃ�kB�?#3��4l�J+~�@zMD&h"�f^�"�3� z��uw�~����>- �S\c�������o+��Y��{��1�K��6�pd*�v�����ݽ=���StNn�����_կ�iӽ�n%g�f�2OTZD�-�f�7Ku�)�ԮdgJ�)�d�C�&Џnd
DT��<�kl�����c�ҾS��v��SݭG�C��~1{��yԐ���dIU_��33KBL5MM$�f}��d�POO�{��:633�����ZY������$;���$K�Dd>�:+���L��fֲj�H��

   
��_,((~%-=�9>�2�<� �V
��}ُe㺻�o~ⱇ�4''{�����qfv�%�������~vƣ��d��DGE��GsA�߬I��w�~@�����,⇐�y[��s�ѳO����Wn���Q���a�=ѳ�K�����hinn�tmݾϜy�SY�9�Kv����7��|B�	xܓ���~�����$�ߖ`��i��i�;���7�d�;��v�;�|"�[Z�[�^���'���M�p��w|�joͿ(�Խ�7�fK��vO~����γgN}43+�Q)��X\�f@7�9�k����?���&'&���Z	,Gi�F��j����>�_��z��bb���Q��ݝm'�|��?\\\L:p��j�r$����B�*��>����?�aEcÅ�i����r�p��������8�-�����QZ?�u���C{��S�++Q�]
�W8���ne�?��c�799�U[[���N~ў舨!����{j��/8��ݵ����f����y9V��������x�e���F���F���(����ŧ���V9&zޡ�o9BD6`^�;���>5::R���7�|�_$�����&��!m���յ:�-tv�߭��i�v�����6������[�CGRJKLl�XVv���Go���>��?V	����w�W �b`J�P��^�?T�kWˡ�ǿ���v��Dd9��8K`j�u:++�{td���q�]Z+���z��|�zY��C�������I/.��TP\�l��f���g3�~JՀ-����`_��K>��R��#Ǿ�_XrJ�~A�� ~�ݞ8������x��5:\���sY�UA<u>j
�Q9DD������������
�_ݽ���
�n��q���h�S/qa����G[b�_��@D4`^�;�J�埛���<�����K[���	����O����@�V~08w�����T���z�=�}}{T��jqIٳ��o+���9�Ě�$c��`�1;3���l����R`�0ﴻ�Jc��j���v���6{Deۯ�lѦ�qq�A���Τk~�!�j�x���l�?ooin��kl�����TIY哪��9_�v�^Q��'�l��
[��e�5c:���ѕ��2��HS��L�5<����lZ&�r���z���x��CG~�����߲b-���ں��.���g����<���5lJ��I�C�ݕ
������	m7�Mi��EOm�z��CG���#ɹ-V�kٓo~n����D�v{����'��*5����ho�Ǟ���[��;񖄈_��GC�	�T�n��W{���H{��W������
�رak���|i���žڊ�w�H3�s;V�G ����[ZZ����<>44T���u%ə�K�DP����K���O�P��ťŘ¢��Uqb�$��觇�G`�Bހ)�>zb|�|�5VW\\���mՐ����� �
&;7��U��Qc6&6nA�Io蘛q�Cڀ)�>cjr:W��Ngj����f���}�`E��cU�<<8P���uK_o�Mcc��|�����&��U^ʗ��:���yY{*���dOt�$$X�����_�dܼ*w����jo��@���o���?^�-��\�
YL��MLL�+ܧ���쇋�G�����Ԥ��hflK��sL���p��ouvvt&��>z����?���G�_�
�׃��͚=l+��z�l�s�ܙO���jn�Z���6���<���L��P�����������?q�ֿMMK�SkU��^/�`*Ø�#��]>p��ꝥ�|3�J�*P�����R5��ёᲕ�;���z��l�KK��mM��K��Tg�X�5a�/4r��;���|���e� ��Kv_w��@)6�mbj��o���Mc+̊)T���/�����+�����LgW��y����/+H޳چ���Mc>���܂�sMW.����3?�?0�700�n��擒����ᇇ�nvNn�j�k=u27�4�T����{A=�g�v���^^Y�]Y^�U�$"�)������x�xyy%֙��e��;�kz�+VB�8����Tg5ZqK��5T΁������L��w�[��K���jF4�

[�̘��f6\�p����ͬ�]XX�h�3b�B%��?NNN�O�$(�)~.&Z�ʕ�WS��tu�ݡ��۟z��������}�~SØ^�'mz%����Ԯ���]�t�W���s***?t��_)��!˰�X�����F#�^�l��KS�/_�h�~Y#b��Y�f�{p���s�>��������i��mjG�r4��p�Ѝ�״�r��/~�ܼ/m���lhh`�j�U���������耂�}%%�/M�'����Z���5����9���y�kl�F���Y������^3Wg�L�D�Wͷ���Yc�����{QN�/+�F���+��Y;[=�ٯ1
Y�3�����ږ榻t^M������y�&$ئ�7d3Y���Y5㜢E�5�T��A�g�0ZK��4SUS���5�J�V��ZU�IcK3,2A�JK������/]���3�~]�p\����(7�7�g����ۚ?x����PB�ʁ�����v��
��?��~n��yAo���qf���-��Ԟ��y����)���9������;�R���4��R�n�������
Z�i����Ng��W
�(e�KU{���
�#��	~�uU��Ѣ�i5۷ʢ�
$)`���g���oz^��Z����s	K�o���v���e
��}Zq���4�����_�*C{�u�^�yM)6��)��u�zZ�fOO��86.v��"���*��S�5oY}���>� 0kjۧ��� O�?���g���CG�\���oA��kMc�����Ɔ�����U1�����m�����?�
����,B~�!>�Y6�Y�Be��zJ_���2:J��W2ɤk9%
ڬ�~ӷ���ڀE+W[)�h�$��uh��5�v����(W��
��1�q�;g��jH���{��*�䈋��V�m�u�
���P�YU�\pL��Tv������v�2��Z�p;��P��Y?ɗ�M���%�O�l�gO���
�;5޵��ɤQh��x솓�ҋ?�|GG����
��p��90	�j�.=v��9��\�x������߲Z_[��������z�EG���-toy�N����7C �
.g��I�2��#n����a�����'��T���Џ�=4e��U|q��l��b�Ihe�k�̢)��]fB��SaV�$([e����k���UՉߪX���	u�M���(mRe��
�v�����ր���lե,�e���N�Dq=r��l�#��h�^���*VH6��Ђ��
�'��t�j�����e��?S�]?��� ��
�@0�h�.�5��y��@��B��a��F�J�_R �j��2S�;g6YQ�]�@���I�OUkO���6� A��+~U��
�@к��q�hY̲�|�7��1�����*��3��i�8�i|���x�4����{��neT��>�������V��Ԟ��Q�A�}]�-�a<-������9h�h�^�&�ZOl�-ߪ8�ez�]���D�����\�0�i��S�����{��T�<�z_��iM�u��g�6��ޖ�p�1+J�xZjAk�L���U�'NY�v��ym˷*Fh���8dv�֦/�>Y�a���K���S���ܼ����3��X�)G����6���Ņń���Ϩ�N��l	өq�
��mf�����q�^M����i���NgS_�A�T~���ε|>����5`&��˯׶�7;8o�%E�Q����������k��~��D�d�n�#����	﬷�rw�#�v�Ay_���C�xn%�~9#3��������ܭ��
_���0<�$�{rr���xmZZz�v�r��2��TQQ�#Z���be���w�]��p�b��l�V��\P\gI�&�@�'n��g�KQ�/ɐ6<i'���'v�oӤ�utl�&��
��T���N��<�
Q~��tv��~�77[��C��0
�S�K3:�Չ�k{5b`?qʹ��3U�JI*hxV�R�8��|GJ����)��=�9�����c���KIMo��]�%��z{�>��_i;
m]l�0u�W���w^5�-!��)0	��#C7��af����E��Kb��Ti��z��yy�/�����Z���y!++��f%�V���,��a�gk=D�0s`���)�i��r��,��^T$��Ԝ���k찆'CNg�U�N��i1qlt�v�\+#3����U�5�t�<h6Q)�O��t�a�ok9Jp0%hƫ3CH�´a+����S�㵞iw���h��0<f�-�N�z�Z�=��p��Bk9�r��23��MN�׏�ߩԎ���׆^ �
.�ݦ��MuK�?}��}}��Y\\����1�������o�#�ё��Z��+;;�Yk������.*����f$߯$�
�Ϸ}նޕ�Sr����Y��1��J{?k
����ܣ��E�c���|�L�/��S��x
�)�M�Z���XXoJJj��f��Xnӌ$�����}�m��c������N���Ύ��T�+yp����e���?����M�� ?���8��z�+�$$Jyw6Z�C�P���<��asc�#����3�s%�zAm�L|�"ݧhY�ӽ&�z'����ԉ]���wi3���G�%`g�0��Wםzܵ���Q�3�U�=*ۭ���s�4�٫zne������t9��ڀ)ΰ����2��{�raag�$��c��ܣ�����1�/�������Ѿ9_��Ug�ۆM��`Z�S.{��C5�S�]c�..-��s���	�3��xÌ2��&����vZ _�Θ�YO�����;�����'�~c���mz��ё#Ŗx�h|\|Pz�f�y�b4d���7e�W}R�0dAo�4�<���si�3���7���`&������ѱ��]����f\}�p^��"���,�jJ�(Y+��bbゲӹ&���u066����k6�@�6��M~�BЀ�ϥ�e\�/_`v�[���1E�t%NS�{�z����>d�6��Û�����˝JNIi{s���b(I;�`���h�O��6ť��z1����7`�v^H��jR գ�����;&�O��2��:>���ɻv�=���vf���^���ɜϗ��I�ɽI��`]
v'&&�i&�T��Z��m��-,���G���ߪ*
�O���`&�-^���K�PrZ�|_0?C�����lVUU��J.js��fURf�9���R��������j������c6I�n׹�G;ai��l�aQ���&��:�7J�.P���	�5b$'G���l�fw�hX5�:J���V[�m�`�fm�iwuww�'�5����ݞH��Mz����j���y�/966f.&6fC��|f�y�X�����׳Ŭ�ݤK�?!��Ò`��B�G����c#wi���(T�a�{*;:Z?��j���*�Nɻf��
~�gg�RT\�]-��R����v~Z%wvE�*h�i[��֖��
j��H���p��lE|�b_+�5�͕u]k���̮�֏wv���~������������,��G$�
���F딻e�	SI�zgmz�6�6_�������Ұ�}���4EQ��n�oJf6����][w�Ϯ�Z�[ukc��_���f�����2��bUS?�.J�p�\��*��n��2//�٪�{��LIk��
��X���ZT
���g�(����K���dE��x�������Q�&%F{6����zU����t��ZT��m�B��u�Mo�޸�2�]c#�/������A�����̺PVV�͔�􆄄Wk<]7����2��W8�5>�����C��'�K=YSW�%-�~,ёDU��`F�k�{Op�'�:�[?���w����5;�Ԃ�kB�?#3��4l�J+~�@zMD&h"�f^�"�3� z��uw�~����>- �S\c�������o+��Y��{��1�K��6�pd*�v�����ݽ=���StNn�����_կ�iӽ�n%g�f�2OTZD�-�f�7Ku�)�ԮdgJ�)�d�C�&Џnd
DT��<�kl�����c�ҾS��v��SݭG�C��~1{��yԐ���dIU_��33KBL5MM$�f}��d�POO�{��:633�����ZY������$;���$K�Dd>�:+���L��fֲj�H��

   
��_,((~%-=�9>�2�<� �V
��}ُe㺻�o~ⱇ�4''{�����qfv�%�������~vƣ��d��DGE��GsA�߬I��w�~@�����,⇐�y[��s�ѳO����Wn���Q���a�=ѳ�K�����hinn�tmݾϜy�SY�9�Kv����7��|B�	xܓ���~�����$�ߖ`��i��i�;���7�d�;��v�;�|"�[Z�[�^���'���M�p��w|�joͿ(�Խ�7�fK��vO~����γgN}43+�Q)��X\�f@7�9�k����?���&'&���Z	,Gi�F��j����>�_��z��bb���Q��ݝm'�|��?\\\L:p��j�r$����B�*��>����?�aEcÅ�i����r�p��������8�-�����QZ?�u���C{��S�++Q�]
�W8���ne�?��c�799�U[[���N~ў舨!����{j��/8��ݵ����f����y9V��������x�e���F���F���(����ŧ���V9&zޡ�o9BD6`^�;���>5::R���7�|�_$�����&��!m���յ:�-tv�߭��i�v�����6������[�CGRJKLl�XVv���Go���>��?V	����w�W �b`J�P��^�?T�kWˡ�ǿ���v��Dd9��8K`j�u:++�{td���q�]Z+���z��|�zY��C�������I/.��TP\�l��f���g3�~JՀ-����`_��K>��R��#Ǿ�_XrJ�~A�� ~�ݞ8������x��5:\���sY�UA<u>j
�Q9DD������������
�_ݽ���
�n��q���h�S/qa����G[b�_��@D4`^�;�J�埛���<�����K[���	����O����@�V~08w�����T���z�=�}}{T��jqIٳ��o+���9�Ě�$c��`�1;3���l����R`�0ﴻ�Jc��j���v���6{Deۯ�lѦ�qq�A���Τk~�!�j�x���l�?ooin��kl�����TIY哪��9_�v�^Q��'�l��
[��e�5c:���ѕ��2��HS��L�5<����lZ&�r���z���x��CG~�����߲b-���ں��.���g����<���5lJ��I�C�ݕ
������	m7�Mi��EOm�z��CG���#ɹ-V�kٓo~n����D�v{����'��*5����ho�Ǟ���[��;񖄈_��GC�	�T�n��W{���H{��W������
�رak���|i���žڊ�w�H3�s;V�G ����[ZZ����<>44T���u%ə�K�DP����K���O�P��ťŘ¢��Uqb�$��觇�G`�Bހ)�>zb|�|�5VW\\���mՐ����� �
&;7��U��Qc6&6nA�Io蘛q�Cڀ)�>cjr:W��Ngj����f���}�`E��cU�<<8P���uK_o�Mcc��|�����&��U^ʗ��:���yY{*���dOt�$$X�����_�dܼ*w����jo��@���o���?^�-��\�
YL��MLL�+ܧ���쇋�G�����Ԥ��hflK��sL���p��ouvvt&��>z����?���G�_�
�׃��͚=l+��z�l�s�ܙO���jn�Z���6���<���L��P�����������?q�ֿMMK�SkU��^/�`*Ø�#��]>p��ꝥ�|3�J�*P�����R5��ёᲕ�;���z��l�KK��mM��K��Tg�X�5a�/4r��;���|���e� ��Kv_w��@)6�mbj��o���Mc+̊)T���/�����+�����LgW��y����/+H޳چ���Mc>���܂�sMW.����3?�?0�700�n��擒����ᇇ�nvNn�j�k=u27�4�T����{A=�g�v���^^Y�]Y^�U�$"�)������x�xyy%֙��e��;�kz�+VB�8����Tg5ZqK��5T΁������L��w�[��K���jF4�

[�̘��f6\�p����ͬ�]XX�h�3b�B%��?NNN�O�$(�)~.&Z�ʕ�WS��tu�ݡ��۟z��������}�~SØ^�'mz%����Ԯ���]�t�W���s***?t��_)��!˰�X�����F#�^�l��KS�/_�h�~Y#b��Y�f�{p���s�>��������i��mjG�r4��p�Ѝ�״�r��/~�ܼ/m���lhh`�j�U���������耂�}%%�/M�'����Z���5����9���y�kl�F���Y������^3Wg�L�D�Wͷ���Yc�����{QN�/+�F���+��Y;[=�ٯ1
Y�3�����ږ榻t^M������y�&$ئ�7d3Y���Y5㜢E�5�T��A�g�0ZK��4SUS���5�J�V��ZU�IcK3,2A�JK������/]���3�~]�p\����(7�7�g����ۚ?x����PB�ʁ�����v��
��?��~n��yAo���qf���-��Ԟ��y����)���9������;�R���4��R�n�������
Z�i����Ng��W
�(e�KU{���
�#��	~�uU��Ѣ�i5۷ʢ�
$)`���g���oz^��Z����s	K�o���v���e
��}Zq���4�����_�*C{�u�^�yM)6��)��u�zZ�fOO��86.v��"���*��S�5oY}���>� 0kjۧ��� O�?���g���CG�\���oA��kMc�����Ɔ�����U1�����m�����?�
����,B~�!>�Y6�Y�Be��zJ_���2:J��W2ɤk9%
ڬ�~ӷ���ڀE+W[)�h�$��uh��5�v����(W��
��1�q�;g��jH���{��*�䈋��V�m�u�
���P�YU�\pL��Tv������v�2��Z�p;��P��Y?ɗ�M���%�O�l�gO���
�;5޵��ɤQh��x솓�ҋ?�|GG����
��p��90	�j�.=v��9��\�x������߲Z_[��������z�EG���-toy�N����7C �
.g��I�2��#n����a�����'��T���Џ�=4e��U|q��l��b�Ihe�k�̢)��]fB��SaV�$([e����k���UՉߪX���	u�M���(mRe��
�v�����ր���lե,�e���N�Dq=r��l�#��h�^���*VH6��Ђ��
�'��t�j�����e��?S�]?��� ��
�@0�h�.�5��y��@��B��a��F�J�_R �j��2S�;g6YQ�]�@���I�OUkO���6� A��+~U��
�@к��q�hY̲�|�7��1�����*��3��i�8�i|���x�4����{��neT��>�������V��Ԟ��Q�A�}]�-�a<-������9h�h�^�&�ZOl�-ߪ8�ez�]���D�����\�0�i��S�����{��T�<�z_��iM�u��g�6��ޖ�p�1+J�xZjAk�L���U�'NY�v��ym˷*Fh���8dv�֦/�>Y�a���K���S���ܼ����3��X�)G����6���Ņń���Ϩ�N��l	өq�
��mf�����q�^M����i���NgS_�A�T~���ε|>����5`&��˯׶�7;8o�%E�Q����������k��~��D�d�n�#����	﬷�rw�#�v�Ay_���C�xn%�~9#3��������ܭ��
_���0<�$�{rr���xmZZz�v�r��2��TQQ�#Z���be���w�]��p�b��l�V��\P\gI�&�@�'n��g�KQ�/ɐ6<i'���'v�oӤ�utl�&��
��T���N��<�
Q~��tv��~�77[��C��0
�S�K3:�Չ�k{5b`?qʹ��3U�JI*hxV�R�8��|GJ����)��=�9�����c���KIMo��]�%��z{�>��_i;
m]l�0u�W���w^5�-!��)0	��#C7��af����E��Kb��Ti��z��yy�/�����Z���y!++��f%�V���,��a�gk=D�0s`���)�i��r��,��^T$��Ԝ���k찆'CNg�U�N��i1qlt�v�\+#3����U�5�t�<h6Q)�O��t�a�ok9Jp0%hƫ3CH�´a+����S�㵞iw���h��0<f�-�N�z�Z�=��p��Bk9�r��23��MN�׏�ߩԎ���׆^ �
.�ݦ��MuK�?}��}}��Y\\����1�������o�#�ё��Z��+;;�Yk������.*����f$߯$�
�Ϸ}նޕ�Sr����Y��1��J{?k
����ܣ��E�c���|�L�/��S��x
�)�M�Z���XXoJJj��f��Xnӌ$�����}�m��c������N���Ύ��T�+yp����e���?����M�� ?���8��z�+�$$Jyw6Z�C�P���<��asc�#����3�s%�zAm�L|�"ݧhY�ӽ&�z'����ԉ]���wi3���G�%`g�0��Wםzܵ���Q�3�U�=*ۭ���s�4�٫zne������t9��ڀ)ΰ����2��{�raag�$��c��ܣ�����1�/�������Ѿ9_��Ug�ۆM��`Z�S.{��C5�S�]c�..-��s���	�3��xÌ2��&����vZ _�Θ�YO�����;�����'�~c���mz��ё#Ŗx�h|\|Pz�f�y�b4d���7e�W}R�0dAo�4�<���si�3���7���`&������ѱ��]����f\}�p^��"���,�jJ�(Y+��bbゲӹ&���u066����k6�@�6��M~�BЀ�ϥ�e\�/_`v�[���1E�t%NS�{�z����>d�6��Û�����˝JNIi{s���b(I;�`���h�O��6ť��z1����7`�v^H��jR գ�����;&�O��2��:>���ɻv�=���vf���^���ɜϗ��I�ɽI��`]
v'&&�i&�T��Z��m��-,���G���ߪ*
�O���`&�-^���K�PrZ�|_0?C�����lVUU��J.js��fURf�9���R��������j������c6I�n׹�G;ai��l�aQ���&��:�7J�.P���	�5b$'G���l�fw�hX5�:J���V[�m�`�fm�iwuww�'�5����ݞH��Mz����j���y�/966f.&6fC��|f�y�X�����׳Ŭ�ݤK�?!��Ò`��B�G����c#wi���(T�a�{*;:Z?��j���*�Nɻf��
~�gg�RT\�]-��R����v~Z%wvE�*h�i[��֖��
j��H���p��lE|�b_+�5�͕u]k���̮�֏wv���~������������,��G$�
���F딻e�	SI�zgmz�6�6_�������Ұ�}���4EQ��n�oJf6����][w�Ϯ�Z�[ukc��_���f�����2��bUS?�.J�p�\��*��n��2//�٪�{��LIk��
��X���ZT
���g�(����K���dE��x�������Q�&%F{6����zU����t��ZT��m�B��u�Mo�޸�2�]c#�/������A�����̺PVV�͔�􆄄Wk<]7����2��W8�5>�����C��'�K=YSW�%-�~,ёDU��`F�k�{Op�'�:�[?���w����5;�Ԃ�kB�?#3��4l�J+~�@zMD&h"�f^�"�3� z��uw�~����>- �S\c�������o+��Y��{��1�K��6�pd*�v�����ݽ=���StNn�����_կ�iӽ�n%g�f�2OTZD�-�f�7Ku�)�ԮdgJ�)�d�C�&Џnd
DT��<�kl�����c�ҾS��v��SݭG�C��~1{��yԐ���dIU_��33KBL5MM$�f}��d�POO�{��:633�����ZY������$;���$K�Dd>�:+���L��fֲj�H��
INSERT INTO sl_application_form_details VALUES("00000000029","0000000019","2021-00001","Lisandra Arachnid","CTET","1st Year","BEED","1st Year","Blk. B B St. Prk. B, Brgy. B, B City, B Province","09111111111","11/11/1999","hannajanebw11@gmail.com","Tagum","Unpaid Labor (SL)","Day","New","1st Semester 2021-2022","�PNG

   
��_,((~%-=�9>�2�<� �V
��}ُe㺻�o~ⱇ�4''{�����qfv�%�������~vƣ��d��DGE��GsA�߬I��w�~@�����,⇐�y[��s�ѳO����Wn���Q���a�=ѳ�K�����hinn�tmݾϜy�SY�9�Kv����7��|B�	xܓ���~�����$�ߖ`��i��i�;���7�d�;��v�;�|"�[Z�[�^���'���M�p��w|�joͿ(�Խ�7�fK��vO~����γgN}43+�Q)��X\�f@7�9�k����?���&'&���Z	,Gi�F��j����>�_��z��bb���Q��ݝm'�|��?\\\L:p��j�r$����B�*��>����?�aEcÅ�i����r�p��������8�-�����QZ?�u���C{��S�++Q�]
�W8���ne�?��c�799�U[[���N~ў舨!����{j��/8��ݵ����f����y9V��������x�e���F���F���(����ŧ���V9&zޡ�o9BD6`^�;���>5::R���7�|�_$�����&��!m���յ:�-tv�߭��i�v�����6������[�CGRJKLl�XVv���Go���>��?V	����w�W �b`J�P��^�?T�kWˡ�ǿ���v��Dd9��8K`j�u:++�{td���q�]Z+���z��|�zY��C�������I/.��TP\�l��f���g3�~JՀ-����`_��K>��R��#Ǿ�_XrJ�~A�� ~�ݞ8������x��5:\���sY�UA<u>j
�Q9DD������������
�_ݽ���
�n��q���h�S/qa����G[b�_��@D4`^�;�J�埛���<�����K[���	����O����@�V~08w�����T���z�=�}}{T��jqIٳ��o+���9�Ě�$c��`�1;3���l����R`�0ﴻ�Jc��j���v���6{Deۯ�lѦ�qq�A���Τk~�!�j�x���l�?ooin��kl�����TIY哪��9_�v�^Q��'�l��
[��e�5c:���ѕ��2��HS��L�5<����lZ&�r���z���x��CG~�����߲b-���ں��.���g����<���5lJ��I�C�ݕ
������	m7�Mi��EOm�z��CG���#ɹ-V�kٓo~n����D�v{����'��*5����ho�Ǟ���[��;񖄈_��GC�	�T�n��W{���H{��W������
�رak���|i���žڊ�w�H3�s;V�G ����[ZZ����<>44T���u%ə�K�DP����K���O�P��ťŘ¢��Uqb�$��觇�G`�Bހ)�>zb|�|�5VW\\���mՐ����� �
&;7��U��Qc6&6nA�Io蘛q�Cڀ)�>cjr:W��Ngj����f���}�`E��cU�<<8P���uK_o�Mcc��|�����&��U^ʗ��:���yY{*���dOt�$$X�����_�dܼ*w����jo��@���o���?^�-��\�
YL��MLL�+ܧ���쇋�G�����Ԥ��hflK��sL���p��ouvvt&��>z����?���G�_�
�׃��͚=l+��z�l�s�ܙO���jn�Z���6���<���L��P�����������?q�ֿMMK�SkU��^/�`*Ø�#��]>p��ꝥ�|3�J�*P�����R5��ёᲕ�;���z��l�KK��mM��K��Tg�X�5a�/4r��;���|���e� ��Kv_w��@)6�mbj��o���Mc+̊)T���/�����+�����LgW��y����/+H޳چ���Mc>���܂�sMW.����3?�?0�700�n��擒����ᇇ�nvNn�j�k=u27�4�T����{A=�g�v���^^Y�]Y^�U�$"�)������x�xyy%֙��e��;�kz�+VB�8����Tg5ZqK��5T΁������L��w�[��K���jF4�

[�̘��f6\�p����ͬ�]XX�h�3b�B%��?NNN�O�$(�)~.&Z�ʕ�WS��tu�ݡ��۟z��������}�~SØ^�'mz%����Ԯ���]�t�W���s***?t��_)��!˰�X�����F#�^�l��KS�/_�h�~Y#b��Y�f�{p���s�>��������i��mjG�r4��p�Ѝ�״�r��/~�ܼ/m���lhh`�j�U���������耂�}%%�/M�'����Z���5����9���y�kl�F���Y������^3Wg�L�D�Wͷ���Yc�����{QN�/+�F���+��Y;[=�ٯ1
Y�3�����ږ榻t^M������y�&$ئ�7d3Y���Y5㜢E�5�T��A�g�0ZK��4SUS���5�J�V��ZU�IcK3,2A�JK������/]���3�~]�p\����(7�7�g����ۚ?x����PB�ʁ�����v��
��?��~n��yAo���qf���-��Ԟ��y����)���9������;�R���4��R�n�������
Z�i����Ng��W
�(e�KU{���
�#��	~�uU��Ѣ�i5۷ʢ�
$)`���g���oz^��Z����s	K�o���v���e
��}Zq���4�����_�*C{�u�^�yM)6��)��u�zZ�fOO��86.v��"���*��S�5oY}���>� 0kjۧ��� O�?���g���CG�\���oA��kMc�����Ɔ�����U1�����m�����?�
����,B~�!>�Y6�Y�Be��zJ_���2:J��W2ɤk9%
ڬ�~ӷ���ڀE+W[)�h�$��uh��5�v����(W��
��1�q�;g��jH���{��*�䈋��V�m�u�
���P�YU�\pL��Tv������v�2��Z�p;��P��Y?ɗ�M���%�O�l�gO���
�;5޵��ɤQh��x솓�ҋ?�|GG����
��p��90	�j�.=v��9��\�x������߲Z_[��������z�EG���-toy�N����7C �
.g��I�2��#n����a�����'��T���Џ�=4e��U|q��l��b�Ihe�k�̢)��]fB��SaV�$([e����k���UՉߪX���	u�M���(mRe��
�v�����ր���lե,�e���N�Dq=r��l�#��h�^���*VH6��Ђ��
�'��t�j�����e��?S�]?��� ��
�@0�h�.�5��y��@��B��a��F�J�_R �j��2S�;g6YQ�]�@���I�OUkO���6� A��+~U��
�@к��q�hY̲�|�7��1�����*��3��i�8�i|���x�4����{��neT��>�������V��Ԟ��Q�A�}]�-�a<-������9h�h�^�&�ZOl�-ߪ8�ez�]���D�����\�0�i��S�����{��T�<�z_��iM�u��g�6��ޖ�p�1+J�xZjAk�L���U�'NY�v��ym˷*Fh���8dv�֦/�>Y�a���K���S���ܼ����3��X�)G����6���Ņń���Ϩ�N��l	өq�
��mf�����q�^M����i���NgS_�A�T~���ε|>����5`&��˯׶�7;8o�%E�Q����������k��~��D�d�n�#����	﬷�rw�#�v�Ay_���C�xn%�~9#3��������ܭ��
_���0<�$�{rr���xmZZz�v�r��2��TQQ�#Z���be���w�]��p�b��l�V��\P\gI�&�@�'n��g�KQ�/ɐ6<i'���'v�oӤ�utl�&��
��T���N��<�
Q~��tv��~�77[��C��0
�S�K3:�Չ�k{5b`?qʹ��3U�JI*hxV�R�8��|GJ����)��=�9�����c���KIMo��]�%��z{�>��_i;
m]l�0u�W���w^5�-!��)0	��#C7��af����E��Kb��Ti��z��yy�/�����Z���y!++��f%�V���,��a�gk=D�0s`���)�i��r��,��^T$��Ԝ���k찆'CNg�U�N��i1qlt�v�\+#3����U�5�t�<h6Q)�O��t�a�ok9Jp0%hƫ3CH�´a+����S�㵞iw���h��0<f�-�N�z�Z�=��p��Bk9�r��23��MN�׏�ߩԎ���׆^ �
.�ݦ��MuK�?}��}}��Y\\����1�������o�#�ё��Z��+;;�Yk������.*����f$߯$�
�Ϸ}նޕ�Sr����Y��1��J{?k
����ܣ��E�c���|�L�/��S��x
�)�M�Z���XXoJJj��f��Xnӌ$�����}�m��c������N���Ύ��T�+yp����e���?����M�� ?���8��z�+�$$Jyw6Z�C�P���<��asc�#����3�s%�zAm�L|�"ݧhY�ӽ&�z'����ԉ]���wi3���G�%`g�0��Wםzܵ���Q�3�U�=*ۭ���s�4�٫zne������t9��ڀ)ΰ����2��{�raag�$��c��ܣ�����1�/�������Ѿ9_��Ug�ۆM��`Z�S.{��C5�S�]c�..-��s���	�3��xÌ2��&����vZ _�Θ�YO�����;�����'�~c���mz��ё#Ŗx�h|\|Pz�f�y�b4d���7e�W}R�0dAo�4�<���si�3���7���`&������ѱ��]����f\}�p^��"���,�jJ�(Y+��bbゲӹ&���u066����k6�@�6��M~�BЀ�ϥ�e\�/_`v�[���1E�t%NS�{�z����>d�6��Û�����˝JNIi{s���b(I;�`���h�O��6ť��z1����7`�v^H��jR գ�����;&�O��2��:>���ɻv�=���vf���^���ɜϗ��I�ɽI��`]
v'&&�i&�T��Z��m��-,���G���ߪ*
�O���`&�-^���K�PrZ�|_0?C�����lVUU��J.js��fURf�9���R��������j������c6I�n׹�G;ai��l�aQ���&��:�7J�.P���	�5b$'G���l�fw�hX5�:J���V[�m�`�fm�iwuww�'�5����ݞH��Mz����j���y�/966f.&6fC��|f�y�X�����׳Ŭ�ݤK�?!��Ò`��B�G����c#wi���(T�a�{*;:Z?��j���*�Nɻf��
~�gg�RT\�]-��R����v~Z%wvE�*h�i[��֖��
j��H���p��lE|�b_+�5�͕u]k���̮�֏wv���~������������,��G$�
���F딻e�	SI�zgmz�6�6_�������Ұ�}���4EQ��n�oJf6����][w�Ϯ�Z�[ukc��_���f�����2��bUS?�.J�p�\��*��n��2//�٪�{��LIk��
��X���ZT
���g�(����K���dE��x�������Q�&%F{6����zU����t��ZT��m�B��u�Mo�޸�2�]c#�/������A�����̺PVV�͔�􆄄Wk<]7����2��W8�5>�����C��'�K=YSW�%-�~,ёDU��`F�k�{Op�'�:�[?���w����5;�Ԃ�kB�?#3��4l�J+~�@zMD&h"�f^�"�3� z��uw�~����>- �S\c�������o+��Y��{��1�K��6�pd*�v�����ݽ=���StNn�����_կ�iӽ�n%g�f�2OTZD�-�f�7Ku�)�ԮdgJ�)�d�C�&Џnd
DT��<�kl�����c�ҾS��v��SݭG�C��~1{��yԐ���dIU_��33KBL5MM$�f}��d�POO�{��:633�����ZY������$;���$K�Dd>�:+���L��fֲj�H��

   
��_,((~%-=�9>�2�<� �V
��}ُe㺻�o~ⱇ�4''{�����qfv�%�������~vƣ��d��DGE��GsA�߬I��w�~@�����,⇐�y[��s�ѳO����Wn���Q���a�=ѳ�K�����hinn�tmݾϜy�SY�9�Kv����7��|B�	xܓ���~�����$�ߖ`��i��i�;���7�d�;��v�;�|"�[Z�[�^���'���M�p��w|�joͿ(�Խ�7�fK��vO~����γgN}43+�Q)��X\�f@7�9�k����?���&'&���Z	,Gi�F��j����>�_��z��bb���Q��ݝm'�|��?\\\L:p��j�r$����B�*��>����?�aEcÅ�i����r�p��������8�-�����QZ?�u���C{��S�++Q�]
�W8���ne�?��c�799�U[[���N~ў舨!����{j��/8��ݵ����f����y9V��������x�e���F���F���(����ŧ���V9&zޡ�o9BD6`^�;���>5::R���7�|�_$�����&��!m���յ:�-tv�߭��i�v�����6������[�CGRJKLl�XVv���Go���>��?V	����w�W �b`J�P��^�?T�kWˡ�ǿ���v��Dd9��8K`j�u:++�{td���q�]Z+���z��|�zY��C�������I/.��TP\�l��f���g3�~JՀ-����`_��K>��R��#Ǿ�_XrJ�~A�� ~�ݞ8������x��5:\���sY�UA<u>j
�Q9DD������������
�_ݽ���
�n��q���h�S/qa����G[b�_��@D4`^�;�J�埛���<�����K[���	����O����@�V~08w�����T���z�=�}}{T��jqIٳ��o+���9�Ě�$c��`�1;3���l����R`�0ﴻ�Jc��j���v���6{Deۯ�lѦ�qq�A���Τk~�!�j�x���l�?ooin��kl�����TIY哪��9_�v�^Q��'�l��
[��e�5c:���ѕ��2��HS��L�5<����lZ&�r���z���x��CG~�����߲b-���ں��.���g����<���5lJ��I�C�ݕ
������	m7�Mi��EOm�z��CG���#ɹ-V�kٓo~n����D�v{����'��*5����ho�Ǟ���[��;񖄈_��GC�	�T�n��W{���H{��W������
�رak���|i���žڊ�w�H3�s;V�G ����[ZZ����<>44T���u%ə�K�DP����K���O�P��ťŘ¢��Uqb�$��觇�G`�Bހ)�>zb|�|�5VW\\���mՐ����� �
&;7��U��Qc6&6nA�Io蘛q�Cڀ)�>cjr:W��Ngj����f���}�`E��cU�<<8P���uK_o�Mcc��|�����&��U^ʗ��:���yY{*���dOt�$$X�����_�dܼ*w����jo��@���o���?^�-��\�
YL��MLL�+ܧ���쇋�G�����Ԥ��hflK��sL���p��ouvvt&��>z����?���G�_�
�׃��͚=l+��z�l�s�ܙO���jn�Z���6���<���L��P�����������?q�ֿMMK�SkU��^/�`*Ø�#��]>p��ꝥ�|3�J�*P�����R5��ёᲕ�;���z��l�KK��mM��K��Tg�X�5a�/4r��;���|���e� ��Kv_w��@)6�mbj��o���Mc+̊)T���/�����+�����LgW��y����/+H޳چ���Mc>���܂�sMW.����3?�?0�700�n��擒����ᇇ�nvNn�j�k=u27�4�T����{A=�g�v���^^Y�]Y^�U�$"�)������x�xyy%֙��e��;�kz�+VB�8����Tg5ZqK��5T΁������L��w�[��K���jF4�

[�̘��f6\�p����ͬ�]XX�h�3b�B%��?NNN�O�$(�)~.&Z�ʕ�WS��tu�ݡ��۟z��������}�~SØ^�'mz%����Ԯ���]�t�W���s***?t��_)��!˰�X�����F#�^�l��KS�/_�h�~Y#b��Y�f�{p���s�>��������i��mjG�r4��p�Ѝ�״�r��/~�ܼ/m���lhh`�j�U���������耂�}%%�/M�'����Z���5����9���y�kl�F���Y������^3Wg�L�D�Wͷ���Yc�����{QN�/+�F���+��Y;[=�ٯ1
Y�3�����ږ榻t^M������y�&$ئ�7d3Y���Y5㜢E�5�T��A�g�0ZK��4SUS���5�J�V��ZU�IcK3,2A�JK������/]���3�~]�p\����(7�7�g����ۚ?x����PB�ʁ�����v��
��?��~n��yAo���qf���-��Ԟ��y����)���9������;�R���4��R�n�������
Z�i����Ng��W
�(e�KU{���
�#��	~�uU��Ѣ�i5۷ʢ�
$)`���g���oz^��Z����s	K�o���v���e
��}Zq���4�����_�*C{�u�^�yM)6��)��u�zZ�fOO��86.v��"���*��S�5oY}���>� 0kjۧ��� O�?���g���CG�\���oA��kMc�����Ɔ�����U1�����m�����?�
����,B~�!>�Y6�Y�Be��zJ_���2:J��W2ɤk9%
ڬ�~ӷ���ڀE+W[)�h�$��uh��5�v����(W��
��1�q�;g��jH���{��*�䈋��V�m�u�
���P�YU�\pL��Tv������v�2��Z�p;��P��Y?ɗ�M���%�O�l�gO���
�;5޵��ɤQh��x솓�ҋ?�|GG����
��p��90	�j�.=v��9��\�x������߲Z_[��������z�EG���-toy�N����7C �
.g��I�2��#n����a�����'��T���Џ�=4e��U|q��l��b�Ihe�k�̢)��]fB��SaV�$([e����k���UՉߪX���	u�M���(mRe��
�v�����ր���lե,�e���N�Dq=r��l�#��h�^���*VH6��Ђ��
�'��t�j�����e��?S�]?��� ��
�@0�h�.�5��y��@��B��a��F�J�_R �j��2S�;g6YQ�]�@���I�OUkO���6� A��+~U��
�@к��q�hY̲�|�7��1�����*��3��i�8�i|���x�4����{��neT��>�������V��Ԟ��Q�A�}]�-�a<-������9h�h�^�&�ZOl�-ߪ8�ez�]���D�����\�0�i��S�����{��T�<�z_��iM�u��g�6��ޖ�p�1+J�xZjAk�L���U�'NY�v��ym˷*Fh���8dv�֦/�>Y�a���K���S���ܼ����3��X�)G����6���Ņń���Ϩ�N��l	өq�
��mf�����q�^M����i���NgS_�A�T~���ε|>����5`&��˯׶�7;8o�%E�Q����������k��~��D�d�n�#����	﬷�rw�#�v�Ay_���C�xn%�~9#3��������ܭ��
_���0<�$�{rr���xmZZz�v�r��2��TQQ�#Z���be���w�]��p�b��l�V��\P\gI�&�@�'n��g�KQ�/ɐ6<i'���'v�oӤ�utl�&��
��T���N��<�
Q~��tv��~�77[��C��0
�S�K3:�Չ�k{5b`?qʹ��3U�JI*hxV�R�8��|GJ����)��=�9�����c���KIMo��]�%��z{�>��_i;
m]l�0u�W���w^5�-!��)0	��#C7��af����E��Kb��Ti��z��yy�/�����Z���y!++��f%�V���,��a�gk=D�0s`���)�i��r��,��^T$��Ԝ���k찆'CNg�U�N��i1qlt�v�\+#3����U�5�t�<h6Q)�O��t�a�ok9Jp0%hƫ3CH�´a+����S�㵞iw���h��0<f�-�N�z�Z�=��p��Bk9�r��23��MN�׏�ߩԎ���׆^ �
.�ݦ��MuK�?}��}}��Y\\����1�������o�#�ё��Z��+;;�Yk������.*����f$߯$�
�Ϸ}նޕ�Sr����Y��1��J{?k
����ܣ��E�c���|�L�/��S��x
�)�M�Z���XXoJJj��f��Xnӌ$�����}�m��c������N���Ύ��T�+yp����e���?����M�� ?���8��z�+�$$Jyw6Z�C�P���<��asc�#����3�s%�zAm�L|�"ݧhY�ӽ&�z'����ԉ]���wi3���G�%`g�0��Wםzܵ���Q�3�U�=*ۭ���s�4�٫zne������t9��ڀ)ΰ����2��{�raag�$��c��ܣ�����1�/�������Ѿ9_��Ug�ۆM��`Z�S.{��C5�S�]c�..-��s���	�3��xÌ2��&����vZ _�Θ�YO�����;�����'�~c���mz��ё#Ŗx�h|\|Pz�f�y�b4d���7e�W}R�0dAo�4�<���si�3���7���`&������ѱ��]����f\}�p^��"���,�jJ�(Y+��bbゲӹ&���u066����k6�@�6��M~�BЀ�ϥ�e\�/_`v�[���1E�t%NS�{�z����>d�6��Û�����˝JNIi{s���b(I;�`���h�O��6ť��z1����7`�v^H��jR գ�����;&�O��2��:>���ɻv�=���vf���^���ɜϗ��I�ɽI��`]
v'&&�i&�T��Z��m��-,���G���ߪ*
�O���`&�-^���K�PrZ�|_0?C�����lVUU��J.js��fURf�9���R��������j������c6I�n׹�G;ai��l�aQ���&��:�7J�.P���	�5b$'G���l�fw�hX5�:J���V[�m�`�fm�iwuww�'�5����ݞH��Mz����j���y�/966f.&6fC��|f�y�X�����׳Ŭ�ݤK�?!��Ò`��B�G����c#wi���(T�a�{*;:Z?��j���*�Nɻf��
~�gg�RT\�]-��R����v~Z%wvE�*h�i[��֖��
j��H���p��lE|�b_+�5�͕u]k���̮�֏wv���~������������,��G$�
���F딻e�	SI�zgmz�6�6_�������Ұ�}���4EQ��n�oJf6����][w�Ϯ�Z�[ukc��_���f�����2��bUS?�.J�p�\��*��n��2//�٪�{��LIk��
��X���ZT
���g�(����K���dE��x�������Q�&%F{6����zU����t��ZT��m�B��u�Mo�޸�2�]c#�/������A�����̺PVV�͔�􆄄Wk<]7����2��W8�5>�����C��'�K=YSW�%-�~,ёDU��`F�k�{Op�'�:�[?���w����5;�Ԃ�kB�?#3��4l�J+~�@zMD&h"�f^�"�3� z��uw�~����>- �S\c�������o+��Y��{��1�K��6�pd*�v�����ݽ=���StNn�����_կ�iӽ�n%g�f�2OTZD�-�f�7Ku�)�ԮdgJ�)�d�C�&Џnd
DT��<�kl�����c�ҾS��v��SݭG�C��~1{��yԐ���dIU_��33KBL5MM$�f}��d�POO�{��:633�����ZY������$;���$K�Dd>�:+���L��fֲj�H��

   
��_,((~%-=�9>�2�<� �V
��}ُe㺻�o~ⱇ�4''{�����qfv�%�������~vƣ��d��DGE��GsA�߬I��w�~@�����,⇐�y[��s�ѳO����Wn���Q���a�=ѳ�K�����hinn�tmݾϜy�SY�9�Kv����7��|B�	xܓ���~�����$�ߖ`��i��i�;���7�d�;��v�;�|"�[Z�[�^���'���M�p��w|�joͿ(�Խ�7�fK��vO~����γgN}43+�Q)��X\�f@7�9�k����?���&'&���Z	,Gi�F��j����>�_��z��bb���Q��ݝm'�|��?\\\L:p��j�r$����B�*��>����?�aEcÅ�i����r�p��������8�-�����QZ?�u���C{��S�++Q�]
�W8���ne�?��c�799�U[[���N~ў舨!����{j��/8��ݵ����f����y9V��������x�e���F���F���(����ŧ���V9&zޡ�o9BD6`^�;���>5::R���7�|�_$�����&��!m���յ:�-tv�߭��i�v�����6������[�CGRJKLl�XVv���Go���>��?V	����w�W �b`J�P��^�?T�kWˡ�ǿ���v��Dd9��8K`j�u:++�{td���q�]Z+���z��|�zY��C�������I/.��TP\�l��f���g3�~JՀ-����`_��K>��R��#Ǿ�_XrJ�~A�� ~�ݞ8������x��5:\���sY�UA<u>j
�Q9DD������������
�_ݽ���
�n��q���h�S/qa����G[b�_��@D4`^�;�J�埛���<�����K[���	����O����@�V~08w�����T���z�=�}}{T��jqIٳ��o+���9�Ě�$c��`�1;3���l����R`�0ﴻ�Jc��j���v���6{Deۯ�lѦ�qq�A���Τk~�!�j�x���l�?ooin��kl�����TIY哪��9_�v�^Q��'�l��
[��e�5c:���ѕ��2��HS��L�5<����lZ&�r���z���x��CG~�����߲b-���ں��.���g����<���5lJ��I�C�ݕ
������	m7�Mi��EOm�z��CG���#ɹ-V�kٓo~n����D�v{����'��*5����ho�Ǟ���[��;񖄈_��GC�	�T�n��W{���H{��W������
�رak���|i���žڊ�w�H3�s;V�G ����[ZZ����<>44T���u%ə�K�DP����K���O�P��ťŘ¢��Uqb�$��觇�G`�Bހ)�>zb|�|�5VW\\���mՐ����� �
&;7��U��Qc6&6nA�Io蘛q�Cڀ)�>cjr:W��Ngj����f���}�`E��cU�<<8P���uK_o�Mcc��|�����&��U^ʗ��:���yY{*���dOt�$$X�����_�dܼ*w����jo��@���o���?^�-��\�
YL��MLL�+ܧ���쇋�G�����Ԥ��hflK��sL���p��ouvvt&��>z����?���G�_�
�׃��͚=l+��z�l�s�ܙO���jn�Z���6���<���L��P�����������?q�ֿMMK�SkU��^/�`*Ø�#��]>p��ꝥ�|3�J�*P�����R5��ёᲕ�;���z��l�KK��mM��K��Tg�X�5a�/4r��;���|���e� ��Kv_w��@)6�mbj��o���Mc+̊)T���/�����+�����LgW��y����/+H޳چ���Mc>���܂�sMW.����3?�?0�700�n��擒����ᇇ�nvNn�j�k=u27�4�T����{A=�g�v���^^Y�]Y^�U�$"�)������x�xyy%֙��e��;�kz�+VB�8����Tg5ZqK��5T΁������L��w�[��K���jF4�

[�̘��f6\�p����ͬ�]XX�h�3b�B%��?NNN�O�$(�)~.&Z�ʕ�WS��tu�ݡ��۟z��������}�~SØ^�'mz%����Ԯ���]�t�W���s***?t��_)��!˰�X�����F#�^�l��KS�/_�h�~Y#b��Y�f�{p���s�>��������i��mjG�r4��p�Ѝ�״�r��/~�ܼ/m���lhh`�j�U���������耂�}%%�/M�'����Z���5����9���y�kl�F���Y������^3Wg�L�D�Wͷ���Yc�����{QN�/+�F���+��Y;[=�ٯ1
Y�3�����ږ榻t^M������y�&$ئ�7d3Y���Y5㜢E�5�T��A�g�0ZK��4SUS���5�J�V��ZU�IcK3,2A�JK������/]���3�~]�p\����(7�7�g����ۚ?x����PB�ʁ�����v��
��?��~n��yAo���qf���-��Ԟ��y����)���9������;�R���4��R�n�������
Z�i����Ng��W
�(e�KU{���
�#��	~�uU��Ѣ�i5۷ʢ�
$)`���g���oz^��Z����s	K�o���v���e
��}Zq���4�����_�*C{�u�^�yM)6��)��u�zZ�fOO��86.v��"���*��S�5oY}���>� 0kjۧ��� O�?���g���CG�\���oA��kMc�����Ɔ�����U1�����m�����?�
����,B~�!>�Y6�Y�Be��zJ_���2:J��W2ɤk9%
ڬ�~ӷ���ڀE+W[)�h�$��uh��5�v����(W��
��1�q�;g��jH���{��*�䈋��V�m�u�
���P�YU�\pL��Tv������v�2��Z�p;��P��Y?ɗ�M���%�O�l�gO���
�;5޵��ɤQh��x솓�ҋ?�|GG����
��p��90	�j�.=v��9��\�x������߲Z_[��������z�EG���-toy�N����7C �
.g��I�2��#n����a�����'��T���Џ�=4e��U|q��l��b�Ihe�k�̢)��]fB��SaV�$([e����k���UՉߪX���	u�M���(mRe��
�v�����ր���lե,�e���N�Dq=r��l�#��h�^���*VH6��Ђ��
�'��t�j�����e��?S�]?��� ��
�@0�h�.�5��y��@��B��a��F�J�_R �j��2S�;g6YQ�]�@���I�OUkO���6� A��+~U��
�@к��q�hY̲�|�7��1�����*��3��i�8�i|���x�4����{��neT��>�������V��Ԟ��Q�A�}]�-�a<-������9h�h�^�&�ZOl�-ߪ8�ez�]���D�����\�0�i��S�����{��T�<�z_��iM�u��g�6��ޖ�p�1+J�xZjAk�L���U�'NY�v��ym˷*Fh���8dv�֦/�>Y�a���K���S���ܼ����3��X�)G����6���Ņń���Ϩ�N��l	өq�
��mf�����q�^M����i���NgS_�A�T~���ε|>����5`&��˯׶�7;8o�%E�Q����������k��~��D�d�n�#����	﬷�rw�#�v�Ay_���C�xn%�~9#3��������ܭ��
_���0<�$�{rr���xmZZz�v�r��2��TQQ�#Z���be���w�]��p�b��l�V��\P\gI�&�@�'n��g�KQ�/ɐ6<i'���'v�oӤ�utl�&��
��T���N��<�
Q~��tv��~�77[��C��0
�S�K3:�Չ�k{5b`?qʹ��3U�JI*hxV�R�8��|GJ����)��=�9�����c���KIMo��]�%��z{�>��_i;
m]l�0u�W���w^5�-!��)0	��#C7��af����E��Kb��Ti��z��yy�/�����Z���y!++��f%�V���,��a�gk=D�0s`���)�i��r��,��^T$��Ԝ���k찆'CNg�U�N��i1qlt�v�\+#3����U�5�t�<h6Q)�O��t�a�ok9Jp0%hƫ3CH�´a+����S�㵞iw���h��0<f�-�N�z�Z�=��p��Bk9�r��23��MN�׏�ߩԎ���׆^ �
.�ݦ��MuK�?}��}}��Y\\����1�������o�#�ё��Z��+;;�Yk������.*����f$߯$�
�Ϸ}նޕ�Sr����Y��1��J{?k
����ܣ��E�c���|�L�/��S��x
�)�M�Z���XXoJJj��f��Xnӌ$�����}�m��c������N���Ύ��T�+yp����e���?����M�� ?���8��z�+�$$Jyw6Z�C�P���<��asc�#����3�s%�zAm�L|�"ݧhY�ӽ&�z'����ԉ]���wi3���G�%`g�0��Wםzܵ���Q�3�U�=*ۭ���s�4�٫zne������t9��ڀ)ΰ����2��{�raag�$��c��ܣ�����1�/�������Ѿ9_��Ug�ۆM��`Z�S.{��C5�S�]c�..-��s���	�3��xÌ2��&����vZ _�Θ�YO�����;�����'�~c���mz��ё#Ŗx�h|\|Pz�f�y�b4d���7e�W}R�0dAo�4�<���si�3���7���`&������ѱ��]����f\}�p^��"���,�jJ�(Y+��bbゲӹ&���u066����k6�@�6��M~�BЀ�ϥ�e\�/_`v�[���1E�t%NS�{�z����>d�6��Û�����˝JNIi{s���b(I;�`���h�O��6ť��z1����7`�v^H��jR գ�����;&�O��2��:>���ɻv�=���vf���^���ɜϗ��I�ɽI��`]
v'&&�i&�T��Z��m��-,���G���ߪ*
�O���`&�-^���K�PrZ�|_0?C�����lVUU��J.js��fURf�9���R��������j������c6I�n׹�G;ai��l�aQ���&��:�7J�.P���	�5b$'G���l�fw�hX5�:J���V[�m�`�fm�iwuww�'�5����ݞH��Mz����j���y�/966f.&6fC��|f�y�X�����׳Ŭ�ݤK�?!��Ò`��B�G����c#wi���(T�a�{*;:Z?��j���*�Nɻf��
~�gg�RT\�]-��R����v~Z%wvE�*h�i[��֖��
j��H���p��lE|�b_+�5�͕u]k���̮�֏wv���~������������,��G$�
���F딻e�	SI�zgmz�6�6_�������Ұ�}���4EQ��n�oJf6����][w�Ϯ�Z�[ukc��_���f�����2��bUS?�.J�p�\��*��n��2//�٪�{��LIk��
��X���ZT
���g�(����K���dE��x�������Q�&%F{6����zU����t��ZT��m�B��u�Mo�޸�2�]c#�/������A�����̺PVV�͔�􆄄Wk<]7����2��W8�5>�����C��'�K=YSW�%-�~,ёDU��`F�k�{Op�'�:�[?���w����5;�Ԃ�kB�?#3��4l�J+~�@zMD&h"�f^�"�3� z��uw�~����>- �S\c�������o+��Y��{��1�K��6�pd*�v�����ݽ=���StNn�����_կ�iӽ�n%g�f�2OTZD�-�f�7Ku�)�ԮdgJ�)�d�C�&Џnd
DT��<�kl�����c�ҾS��v��SݭG�C��~1{��yԐ���dIU_��33KBL5MM$�f}��d�POO�{��:633�����ZY������$;���$K�Dd>�:+���L��fֲj�H��
INSERT INTO sl_application_form_details VALUES("00000000030","0000000020","2021-00002","Samuel L. Jackson","CTET","","BTVTE","1st Year","Lot B B Street Prk. B, Brgy. B, B City, B Province","09652112512","01/01/1999","samuel@gmail.com","Tagum City","Paid Labor (SL)","Day","New","1st Semester 2021-2022","","12:00 AM - 12:00 AM","October 27, 2021","1","Severus Snape","�PNG

   
��_,((~%-=�9>�2�<� �V
��}ُe㺻�o~ⱇ�4''{�����qfv�%�������~vƣ��d��DGE��GsA�߬I��w�~@�����,⇐�y[��s�ѳO����Wn���Q���a�=ѳ�K�����hinn�tmݾϜy�SY�9�Kv����7��|B�	xܓ���~�����$�ߖ`��i��i�;���7�d�;��v�;�|"�[Z�[�^���'���M�p��w|�joͿ(�Խ�7�fK��vO~����γgN}43+�Q)��X\�f@7�9�k����?���&'&���Z	,Gi�F��j����>�_��z��bb���Q��ݝm'�|��?\\\L:p��j�r$����B�*��>����?�aEcÅ�i����r�p��������8�-�����QZ?�u���C{��S�++Q�]
�W8���ne�?��c�799�U[[���N~ў舨!����{j��/8��ݵ����f����y9V��������x�e���F���F���(����ŧ���V9&zޡ�o9BD6`^�;���>5::R���7�|�_$�����&��!m���յ:�-tv�߭��i�v�����6������[�CGRJKLl�XVv���Go���>��?V	����w�W �b`J�P��^�?T�kWˡ�ǿ���v��Dd9��8K`j�u:++�{td���q�]Z+���z��|�zY��C�������I/.��TP\�l��f���g3�~JՀ-����`_��K>��R��#Ǿ�_XrJ�~A�� ~�ݞ8������x��5:\���sY�UA<u>j
�Q9DD������������
�_ݽ���
�n��q���h�S/qa����G[b�_��@D4`^�;�J�埛���<�����K[���	����O����@�V~08w�����T���z�=�}}{T��jqIٳ��o+���9�Ě�$c��`�1;3���l����R`�0ﴻ�Jc��j���v���6{Deۯ�lѦ�qq�A���Τk~�!�j�x���l�?ooin��kl�����TIY哪��9_�v�^Q��'�l��
[��e�5c:���ѕ��2��HS��L�5<����lZ&�r���z���x��CG~�����߲b-���ں��.���g����<���5lJ��I�C�ݕ
������	m7�Mi��EOm�z��CG���#ɹ-V�kٓo~n����D�v{����'��*5����ho�Ǟ���[��;񖄈_��GC�	�T�n��W{���H{��W������
�رak���|i���žڊ�w�H3�s;V�G ����[ZZ����<>44T���u%ə�K�DP����K���O�P��ťŘ¢��Uqb�$��觇�G`�Bހ)�>zb|�|�5VW\\���mՐ����� �
&;7��U��Qc6&6nA�Io蘛q�Cڀ)�>cjr:W��Ngj����f���}�`E��cU�<<8P���uK_o�Mcc��|�����&��U^ʗ��:���yY{*���dOt�$$X�����_�dܼ*w����jo��@���o���?^�-��\�
YL��MLL�+ܧ���쇋�G�����Ԥ��hflK��sL���p��ouvvt&��>z����?���G�_�
�׃��͚=l+��z�l�s�ܙO���jn�Z���6���<���L��P�����������?q�ֿMMK�SkU��^/�`*Ø�#��]>p��ꝥ�|3�J�*P�����R5��ёᲕ�;���z��l�KK��mM��K��Tg�X�5a�/4r��;���|���e� ��Kv_w��@)6�mbj��o���Mc+̊)T���/�����+�����LgW��y����/+H޳چ���Mc>���܂�sMW.����3?�?0�700�n��擒����ᇇ�nvNn�j�k=u27�4�T����{A=�g�v���^^Y�]Y^�U�$"�)������x�xyy%֙��e��;�kz�+VB�8����Tg5ZqK��5T΁������L��w�[��K���jF4�

[�̘��f6\�p����ͬ�]XX�h�3b�B%��?NNN�O�$(�)~.&Z�ʕ�WS��tu�ݡ��۟z��������}�~SØ^�'mz%����Ԯ���]�t�W���s***?t��_)��!˰�X�����F#�^�l��KS�/_�h�~Y#b��Y�f�{p���s�>��������i��mjG�r4��p�Ѝ�״�r��/~�ܼ/m���lhh`�j�U���������耂�}%%�/M�'����Z���5����9���y�kl�F���Y������^3Wg�L�D�Wͷ���Yc�����{QN�/+�F���+��Y;[=�ٯ1
Y�3�����ږ榻t^M������y�&$ئ�7d3Y���Y5㜢E�5�T��A�g�0ZK��4SUS���5�J�V��ZU�IcK3,2A�JK������/]���3�~]�p\����(7�7�g����ۚ?x����PB�ʁ�����v��
��?��~n��yAo���qf���-��Ԟ��y����)���9������;�R���4��R�n�������
Z�i����Ng��W
�(e�KU{���
�#��	~�uU��Ѣ�i5۷ʢ�
$)`���g���oz^��Z����s	K�o���v���e
��}Zq���4�����_�*C{�u�^�yM)6��)��u�zZ�fOO��86.v��"���*��S�5oY}���>� 0kjۧ��� O�?���g���CG�\���oA��kMc�����Ɔ�����U1�����m�����?�
����,B~�!>�Y6�Y�Be��zJ_���2:J��W2ɤk9%
ڬ�~ӷ���ڀE+W[)�h�$��uh��5�v����(W��
��1�q�;g��jH���{��*�䈋��V�m�u�
���P�YU�\pL��Tv������v�2��Z�p;��P��Y?ɗ�M���%�O�l�gO���
�;5޵��ɤQh��x솓�ҋ?�|GG����
��p��90	�j�.=v��9��\�x������߲Z_[��������z�EG���-toy�N����7C �
.g��I�2��#n����a�����'��T���Џ�=4e��U|q��l��b�Ihe�k�̢)��]fB��SaV�$([e����k���UՉߪX���	u�M���(mRe��
�v�����ր���lե,�e���N�Dq=r��l�#��h�^���*VH6��Ђ��
�'��t�j�����e��?S�]?��� ��
�@0�h�.�5��y��@��B��a��F�J�_R �j��2S�;g6YQ�]�@���I�OUkO���6� A��+~U��
�@к��q�hY̲�|�7��1�����*��3��i�8�i|���x�4����{��neT��>�������V��Ԟ��Q�A�}]�-�a<-������9h�h�^�&�ZOl�-ߪ8�ez�]���D�����\�0�i��S�����{��T�<�z_��iM�u��g�6��ޖ�p�1+J�xZjAk�L���U�'NY�v��ym˷*Fh���8dv�֦/�>Y�a���K���S���ܼ����3��X�)G����6���Ņń���Ϩ�N��l	өq�
��mf�����q�^M����i���NgS_�A�T~���ε|>����5`&��˯׶�7;8o�%E�Q����������k��~��D�d�n�#����	﬷�rw�#�v�Ay_���C�xn%�~9#3��������ܭ��
_���0<�$�{rr���xmZZz�v�r��2��TQQ�#Z���be���w�]��p�b��l�V��\P\gI�&�@�'n��g�KQ�/ɐ6<i'���'v�oӤ�utl�&��
��T���N��<�
Q~��tv��~�77[��C��0
�S�K3:�Չ�k{5b`?qʹ��3U�JI*hxV�R�8��|GJ����)��=�9�����c���KIMo��]�%��z{�>��_i;
m]l�0u�W���w^5�-!��)0	��#C7��af����E��Kb��Ti��z��yy�/�����Z���y!++��f%�V���,��a�gk=D�0s`���)�i��r��,��^T$��Ԝ���k찆'CNg�U�N��i1qlt�v�\+#3����U�5�t�<h6Q)�O��t�a�ok9Jp0%hƫ3CH�´a+����S�㵞iw���h��0<f�-�N�z�Z�=��p��Bk9�r��23��MN�׏�ߩԎ���׆^ �
.�ݦ��MuK�?}��}}��Y\\����1�������o�#�ё��Z��+;;�Yk������.*����f$߯$�
�Ϸ}նޕ�Sr����Y��1��J{?k
����ܣ��E�c���|�L�/��S��x
�)�M�Z���XXoJJj��f��Xnӌ$�����}�m��c������N���Ύ��T�+yp����e���?����M�� ?���8��z�+�$$Jyw6Z�C�P���<��asc�#����3�s%�zAm�L|�"ݧhY�ӽ&�z'����ԉ]���wi3���G�%`g�0��Wםzܵ���Q�3�U�=*ۭ���s�4�٫zne������t9��ڀ)ΰ����2��{�raag�$��c��ܣ�����1�/�������Ѿ9_��Ug�ۆM��`Z�S.{��C5�S�]c�..-��s���	�3��xÌ2��&����vZ _�Θ�YO�����;�����'�~c���mz��ё#Ŗx�h|\|Pz�f�y�b4d���7e�W}R�0dAo�4�<���si�3���7���`&������ѱ��]����f\}�p^��"���,�jJ�(Y+��bbゲӹ&���u066����k6�@�6��M~�BЀ�ϥ�e\�/_`v�[���1E�t%NS�{�z����>d�6��Û�����˝JNIi{s���b(I;�`���h�O��6ť��z1����7`�v^H��jR գ�����;&�O��2��:>���ɻv�=���vf���^���ɜϗ��I�ɽI��`]
v'&&�i&�T��Z��m��-,���G���ߪ*
�O���`&�-^���K�PrZ�|_0?C�����lVUU��J.js��fURf�9���R��������j������c6I�n׹�G;ai��l�aQ���&��:�7J�.P���	�5b$'G���l�fw�hX5�:J���V[�m�`�fm�iwuww�'�5����ݞH��Mz����j���y�/966f.&6fC��|f�y�X�����׳Ŭ�ݤK�?!��Ò`��B�G����c#wi���(T�a�{*;:Z?��j���*�Nɻf��
~�gg�RT\�]-��R����v~Z%wvE�*h�i[��֖��
j��H���p��lE|�b_+�5�͕u]k���̮�֏wv���~������������,��G$�
���F딻e�	SI�zgmz�6�6_�������Ұ�}���4EQ��n�oJf6����][w�Ϯ�Z�[ukc��_���f�����2��bUS?�.J�p�\��*��n��2//�٪�{��LIk��
��X���ZT
���g�(����K���dE��x�������Q�&%F{6����zU����t��ZT��m�B��u�Mo�޸�2�]c#�/������A�����̺PVV�͔�􆄄Wk<]7����2��W8�5>�����C��'�K=YSW�%-�~,ёDU��`F�k�{Op�'�:�[?���w����5;�Ԃ�kB�?#3��4l�J+~�@zMD&h"�f^�"�3� z��uw�~����>- �S\c�������o+��Y��{��1�K��6�pd*�v�����ݽ=���StNn�����_կ�iӽ�n%g�f�2OTZD�-�f�7Ku�)�ԮdgJ�)�d�C�&Џnd
DT��<�kl�����c�ҾS��v��SݭG�C��~1{��yԐ���dIU_��33KBL5MM$�f}��d�POO�{��:633�����ZY������$;���$K�Dd>�:+���L��fֲj�H��

   
��_,((~%-=�9>�2�<� �V
��}ُe㺻�o~ⱇ�4''{�����qfv�%�������~vƣ��d��DGE��GsA�߬I��w�~@�����,⇐�y[��s�ѳO����Wn���Q���a�=ѳ�K�����hinn�tmݾϜy�SY�9�Kv����7��|B�	xܓ���~�����$�ߖ`��i��i�;���7�d�;��v�;�|"�[Z�[�^���'���M�p��w|�joͿ(�Խ�7�fK��vO~����γgN}43+�Q)��X\�f@7�9�k����?���&'&���Z	,Gi�F��j����>�_��z��bb���Q��ݝm'�|��?\\\L:p��j�r$����B�*��>����?�aEcÅ�i����r�p��������8�-�����QZ?�u���C{��S�++Q�]
�W8���ne�?��c�799�U[[���N~ў舨!����{j��/8��ݵ����f����y9V��������x�e���F���F���(����ŧ���V9&zޡ�o9BD6`^�;���>5::R���7�|�_$�����&��!m���յ:�-tv�߭��i�v�����6������[�CGRJKLl�XVv���Go���>��?V	����w�W �b`J�P��^�?T�kWˡ�ǿ���v��Dd9��8K`j�u:++�{td���q�]Z+���z��|�zY��C�������I/.��TP\�l��f���g3�~JՀ-����`_��K>��R��#Ǿ�_XrJ�~A�� ~�ݞ8������x��5:\���sY�UA<u>j
�Q9DD������������
�_ݽ���
�n��q���h�S/qa����G[b�_��@D4`^�;�J�埛���<�����K[���	����O����@�V~08w�����T���z�=�}}{T��jqIٳ��o+���9�Ě�$c��`�1;3���l����R`�0ﴻ�Jc��j���v���6{Deۯ�lѦ�qq�A���Τk~�!�j�x���l�?ooin��kl�����TIY哪��9_�v�^Q��'�l��
[��e�5c:���ѕ��2��HS��L�5<����lZ&�r���z���x��CG~�����߲b-���ں��.���g����<���5lJ��I�C�ݕ
������	m7�Mi��EOm�z��CG���#ɹ-V�kٓo~n����D�v{����'��*5����ho�Ǟ���[��;񖄈_��GC�	�T�n��W{���H{��W������
�رak���|i���žڊ�w�H3�s;V�G ����[ZZ����<>44T���u%ə�K�DP����K���O�P��ťŘ¢��Uqb�$��觇�G`�Bހ)�>zb|�|�5VW\\���mՐ����� �
&;7��U��Qc6&6nA�Io蘛q�Cڀ)�>cjr:W��Ngj����f���}�`E��cU�<<8P���uK_o�Mcc��|�����&��U^ʗ��:���yY{*���dOt�$$X�����_�dܼ*w����jo��@���o���?^�-��\�
YL��MLL�+ܧ���쇋�G�����Ԥ��hflK��sL���p��ouvvt&��>z����?���G�_�
�׃��͚=l+��z�l�s�ܙO���jn�Z���6���<���L��P�����������?q�ֿMMK�SkU��^/�`*Ø�#��]>p��ꝥ�|3�J�*P�����R5��ёᲕ�;���z��l�KK��mM��K��Tg�X�5a�/4r��;���|���e� ��Kv_w��@)6�mbj��o���Mc+̊)T���/�����+�����LgW��y����/+H޳چ���Mc>���܂�sMW.����3?�?0�700�n��擒����ᇇ�nvNn�j�k=u27�4�T����{A=�g�v���^^Y�]Y^�U�$"�)������x�xyy%֙��e��;�kz�+VB�8����Tg5ZqK��5T΁������L��w�[��K���jF4�

[�̘��f6\�p����ͬ�]XX�h�3b�B%��?NNN�O�$(�)~.&Z�ʕ�WS��tu�ݡ��۟z��������}�~SØ^�'mz%����Ԯ���]�t�W���s***?t��_)��!˰�X�����F#�^�l��KS�/_�h�~Y#b��Y�f�{p���s�>��������i��mjG�r4��p�Ѝ�״�r��/~�ܼ/m���lhh`�j�U���������耂�}%%�/M�'����Z���5����9���y�kl�F���Y������^3Wg�L�D�Wͷ���Yc�����{QN�/+�F���+��Y;[=�ٯ1
Y�3�����ږ榻t^M������y�&$ئ�7d3Y���Y5㜢E�5�T��A�g�0ZK��4SUS���5�J�V��ZU�IcK3,2A�JK������/]���3�~]�p\����(7�7�g����ۚ?x����PB�ʁ�����v��
��?��~n��yAo���qf���-��Ԟ��y����)���9������;�R���4��R�n�������
Z�i����Ng��W
�(e�KU{���
�#��	~�uU��Ѣ�i5۷ʢ�
$)`���g���oz^��Z����s	K�o���v���e
��}Zq���4�����_�*C{�u�^�yM)6��)��u�zZ�fOO��86.v��"���*��S�5oY}���>� 0kjۧ��� O�?���g���CG�\���oA��kMc�����Ɔ�����U1�����m�����?�
����,B~�!>�Y6�Y�Be��zJ_���2:J��W2ɤk9%
ڬ�~ӷ���ڀE+W[)�h�$��uh��5�v����(W��
��1�q�;g��jH���{��*�䈋��V�m�u�
���P�YU�\pL��Tv������v�2��Z�p;��P��Y?ɗ�M���%�O�l�gO���
�;5޵��ɤQh��x솓�ҋ?�|GG����
��p��90	�j�.=v��9��\�x������߲Z_[��������z�EG���-toy�N����7C �
.g��I�2��#n����a�����'��T���Џ�=4e��U|q��l��b�Ihe�k�̢)��]fB��SaV�$([e����k���UՉߪX���	u�M���(mRe��
�v�����ր���lե,�e���N�Dq=r��l�#��h�^���*VH6��Ђ��
�'��t�j�����e��?S�]?��� ��
�@0�h�.�5��y��@��B��a��F�J�_R �j��2S�;g6YQ�]�@���I�OUkO���6� A��+~U��
�@к��q�hY̲�|�7��1�����*��3��i�8�i|���x�4����{��neT��>�������V��Ԟ��Q�A�}]�-�a<-������9h�h�^�&�ZOl�-ߪ8�ez�]���D�����\�0�i��S�����{��T�<�z_��iM�u��g�6��ޖ�p�1+J�xZjAk�L���U�'NY�v��ym˷*Fh���8dv�֦/�>Y�a���K���S���ܼ����3��X�)G����6���Ņń���Ϩ�N��l	өq�
��mf�����q�^M����i���NgS_�A�T~���ε|>����5`&��˯׶�7;8o�%E�Q����������k��~��D�d�n�#����	﬷�rw�#�v�Ay_���C�xn%�~9#3��������ܭ��
_���0<�$�{rr���xmZZz�v�r��2��TQQ�#Z���be���w�]��p�b��l�V��\P\gI�&�@�'n��g�KQ�/ɐ6<i'���'v�oӤ�utl�&��
��T���N��<�
Q~��tv��~�77[��C��0
�S�K3:�Չ�k{5b`?qʹ��3U�JI*hxV�R�8��|GJ����)��=�9�����c���KIMo��]�%��z{�>��_i;
m]l�0u�W���w^5�-!��)0	��#C7��af����E��Kb��Ti��z��yy�/�����Z���y!++��f%�V���,��a�gk=D�0s`���)�i��r��,��^T$��Ԝ���k찆'CNg�U�N��i1qlt�v�\+#3����U�5�t�<h6Q)�O��t�a�ok9Jp0%hƫ3CH�´a+����S�㵞iw���h��0<f�-�N�z�Z�=��p��Bk9�r��23��MN�׏�ߩԎ���׆^ �
.�ݦ��MuK�?}��}}��Y\\����1�������o�#�ё��Z��+;;�Yk������.*����f$߯$�
�Ϸ}նޕ�Sr����Y��1��J{?k
����ܣ��E�c���|�L�/��S��x
�)�M�Z���XXoJJj��f��Xnӌ$�����}�m��c������N���Ύ��T�+yp����e���?����M�� ?���8��z�+�$$Jyw6Z�C�P���<��asc�#����3�s%�zAm�L|�"ݧhY�ӽ&�z'����ԉ]���wi3���G�%`g�0��Wםzܵ���Q�3�U�=*ۭ���s�4�٫zne������t9��ڀ)ΰ����2��{�raag�$��c��ܣ�����1�/�������Ѿ9_��Ug�ۆM��`Z�S.{��C5�S�]c�..-��s���	�3��xÌ2��&����vZ _�Θ�YO�����;�����'�~c���mz��ё#Ŗx�h|\|Pz�f�y�b4d���7e�W}R�0dAo�4�<���si�3���7���`&������ѱ��]����f\}�p^��"���,�jJ�(Y+��bbゲӹ&���u066����k6�@�6��M~�BЀ�ϥ�e\�/_`v�[���1E�t%NS�{�z����>d�6��Û�����˝JNIi{s���b(I;�`���h�O��6ť��z1����7`�v^H��jR գ�����;&�O��2��:>���ɻv�=���vf���^���ɜϗ��I�ɽI��`]
v'&&�i&�T��Z��m��-,���G���ߪ*
�O���`&�-^���K�PrZ�|_0?C�����lVUU��J.js��fURf�9���R��������j������c6I�n׹�G;ai��l�aQ���&��:�7J�.P���	�5b$'G���l�fw�hX5�:J���V[�m�`�fm�iwuww�'�5����ݞH��Mz����j���y�/966f.&6fC��|f�y�X�����׳Ŭ�ݤK�?!��Ò`��B�G����c#wi���(T�a�{*;:Z?��j���*�Nɻf��
~�gg�RT\�]-��R����v~Z%wvE�*h�i[��֖��
j��H���p��lE|�b_+�5�͕u]k���̮�֏wv���~������������,��G$�
���F딻e�	SI�zgmz�6�6_�������Ұ�}���4EQ��n�oJf6����][w�Ϯ�Z�[ukc��_���f�����2��bUS?�.J�p�\��*��n��2//�٪�{��LIk��
��X���ZT
���g�(����K���dE��x�������Q�&%F{6����zU����t��ZT��m�B��u�Mo�޸�2�]c#�/������A�����̺PVV�͔�􆄄Wk<]7����2��W8�5>�����C��'�K=YSW�%-�~,ёDU��`F�k�{Op�'�:�[?���w����5;�Ԃ�kB�?#3��4l�J+~�@zMD&h"�f^�"�3� z��uw�~����>- �S\c�������o+��Y��{��1�K��6�pd*�v�����ݽ=���StNn�����_կ�iӽ�n%g�f�2OTZD�-�f�7Ku�)�ԮdgJ�)�d�C�&Џnd
DT��<�kl�����c�ҾS��v��SݭG�C��~1{��yԐ���dIU_��33KBL5MM$�f}��d�POO�{��:633�����ZY������$;���$K�Dd>�:+���L��fֲj�H��
INSERT INTO sl_application_form_details VALUES("00000000030","0000000021","2021-00003","Rachel K. Green","CTET","","BSNED","1st Year",", , New York City, Davao del Norte","09655214112","02/03/1998","rachel@gmail.com","New York City","Paid Labor (SL)","Day","New","1st Semester 2021-2022","","12:00 AM - 12:00 AM","October 27, 2021","1","Severus Snape","�PNG

   
��_,((~%-=�9>�2�<� �V
��}ُe㺻�o~ⱇ�4''{�����qfv�%�������~vƣ��d��DGE��GsA�߬I��w�~@�����,⇐�y[��s�ѳO����Wn���Q���a�=ѳ�K�����hinn�tmݾϜy�SY�9�Kv����7��|B�	xܓ���~�����$�ߖ`��i��i�;���7�d�;��v�;�|"�[Z�[�^���'���M�p��w|�joͿ(�Խ�7�fK��vO~����γgN}43+�Q)��X\�f@7�9�k����?���&'&���Z	,Gi�F��j����>�_��z��bb���Q��ݝm'�|��?\\\L:p��j�r$����B�*��>����?�aEcÅ�i����r�p��������8�-�����QZ?�u���C{��S�++Q�]
�W8���ne�?��c�799�U[[���N~ў舨!����{j��/8��ݵ����f����y9V��������x�e���F���F���(����ŧ���V9&zޡ�o9BD6`^�;���>5::R���7�|�_$�����&��!m���յ:�-tv�߭��i�v�����6������[�CGRJKLl�XVv���Go���>��?V	����w�W �b`J�P��^�?T�kWˡ�ǿ���v��Dd9��8K`j�u:++�{td���q�]Z+���z��|�zY��C�������I/.��TP\�l��f���g3�~JՀ-����`_��K>��R��#Ǿ�_XrJ�~A�� ~�ݞ8������x��5:\���sY�UA<u>j
�Q9DD������������
�_ݽ���
�n��q���h�S/qa����G[b�_��@D4`^�;�J�埛���<�����K[���	����O����@�V~08w�����T���z�=�}}{T��jqIٳ��o+���9�Ě�$c��`�1;3���l����R`�0ﴻ�Jc��j���v���6{Deۯ�lѦ�qq�A���Τk~�!�j�x���l�?ooin��kl�����TIY哪��9_�v�^Q��'�l��
[��e�5c:���ѕ��2��HS��L�5<����lZ&�r���z���x��CG~�����߲b-���ں��.���g����<���5lJ��I�C�ݕ
������	m7�Mi��EOm�z��CG���#ɹ-V�kٓo~n����D�v{����'��*5����ho�Ǟ���[��;񖄈_��GC�	�T�n��W{���H{��W������
�رak���|i���žڊ�w�H3�s;V�G ����[ZZ����<>44T���u%ə�K�DP����K���O�P��ťŘ¢��Uqb�$��觇�G`�Bހ)�>zb|�|�5VW\\���mՐ����� �
&;7��U��Qc6&6nA�Io蘛q�Cڀ)�>cjr:W��Ngj����f���}�`E��cU�<<8P���uK_o�Mcc��|�����&��U^ʗ��:���yY{*���dOt�$$X�����_�dܼ*w����jo��@���o���?^�-��\�
YL��MLL�+ܧ���쇋�G�����Ԥ��hflK��sL���p��ouvvt&��>z����?���G�_�
�׃��͚=l+��z�l�s�ܙO���jn�Z���6���<���L��P�����������?q�ֿMMK�SkU��^/�`*Ø�#��]>p��ꝥ�|3�J�*P�����R5��ёᲕ�;���z��l�KK��mM��K��Tg�X�5a�/4r��;���|���e� ��Kv_w��@)6�mbj��o���Mc+̊)T���/�����+�����LgW��y����/+H޳چ���Mc>���܂�sMW.����3?�?0�700�n��擒����ᇇ�nvNn�j�k=u27�4�T����{A=�g�v���^^Y�]Y^�U�$"�)������x�xyy%֙��e��;�kz�+VB�8����Tg5ZqK��5T΁������L��w�[��K���jF4�

[�̘��f6\�p����ͬ�]XX�h�3b�B%��?NNN�O�$(�)~.&Z�ʕ�WS��tu�ݡ��۟z��������}�~SØ^�'mz%����Ԯ���]�t�W���s***?t��_)��!˰�X�����F#�^�l��KS�/_�h�~Y#b��Y�f�{p���s�>��������i��mjG�r4��p�Ѝ�״�r��/~�ܼ/m���lhh`�j�U���������耂�}%%�/M�'����Z���5����9���y�kl�F���Y������^3Wg�L�D�Wͷ���Yc�����{QN�/+�F���+��Y;[=�ٯ1
Y�3�����ږ榻t^M������y�&$ئ�7d3Y���Y5㜢E�5�T��A�g�0ZK��4SUS���5�J�V��ZU�IcK3,2A�JK������/]���3�~]�p\����(7�7�g����ۚ?x����PB�ʁ�����v��
��?��~n��yAo���qf���-��Ԟ��y����)���9������;�R���4��R�n�������
Z�i����Ng��W
�(e�KU{���
�#��	~�uU��Ѣ�i5۷ʢ�
$)`���g���oz^��Z����s	K�o���v���e
��}Zq���4�����_�*C{�u�^�yM)6��)��u�zZ�fOO��86.v��"���*��S�5oY}���>� 0kjۧ��� O�?���g���CG�\���oA��kMc�����Ɔ�����U1�����m�����?�
����,B~�!>�Y6�Y�Be��zJ_���2:J��W2ɤk9%
ڬ�~ӷ���ڀE+W[)�h�$��uh��5�v����(W��
��1�q�;g��jH���{��*�䈋��V�m�u�
���P�YU�\pL��Tv������v�2��Z�p;��P��Y?ɗ�M���%�O�l�gO���
�;5޵��ɤQh��x솓�ҋ?�|GG����
��p��90	�j�.=v��9��\�x������߲Z_[��������z�EG���-toy�N����7C �
.g��I�2��#n����a�����'��T���Џ�=4e��U|q��l��b�Ihe�k�̢)��]fB��SaV�$([e����k���UՉߪX���	u�M���(mRe��
�v�����ր���lե,�e���N�Dq=r��l�#��h�^���*VH6��Ђ��
�'��t�j�����e��?S�]?��� ��
�@0�h�.�5��y��@��B��a��F�J�_R �j��2S�;g6YQ�]�@���I�OUkO���6� A��+~U��
�@к��q�hY̲�|�7��1�����*��3��i�8�i|���x�4����{��neT��>�������V��Ԟ��Q�A�}]�-�a<-������9h�h�^�&�ZOl�-ߪ8�ez�]���D�����\�0�i��S�����{��T�<�z_��iM�u��g�6��ޖ�p�1+J�xZjAk�L���U�'NY�v��ym˷*Fh���8dv�֦/�>Y�a���K���S���ܼ����3��X�)G����6���Ņń���Ϩ�N��l	өq�
��mf�����q�^M����i���NgS_�A�T~���ε|>����5`&��˯׶�7;8o�%E�Q����������k��~��D�d�n�#����	﬷�rw�#�v�Ay_���C�xn%�~9#3��������ܭ��
_���0<�$�{rr���xmZZz�v�r��2��TQQ�#Z���be���w�]��p�b��l�V��\P\gI�&�@�'n��g�KQ�/ɐ6<i'���'v�oӤ�utl�&��
��T���N��<�
Q~��tv��~�77[��C��0
�S�K3:�Չ�k{5b`?qʹ��3U�JI*hxV�R�8��|GJ����)��=�9�����c���KIMo��]�%��z{�>��_i;
m]l�0u�W���w^5�-!��)0	��#C7��af����E��Kb��Ti��z��yy�/�����Z���y!++��f%�V���,��a�gk=D�0s`���)�i��r��,��^T$��Ԝ���k찆'CNg�U�N��i1qlt�v�\+#3����U�5�t�<h6Q)�O��t�a�ok9Jp0%hƫ3CH�´a+����S�㵞iw���h��0<f�-�N�z�Z�=��p��Bk9�r��23��MN�׏�ߩԎ���׆^ �
.�ݦ��MuK�?}��}}��Y\\����1�������o�#�ё��Z��+;;�Yk������.*����f$߯$�
�Ϸ}նޕ�Sr����Y��1��J{?k
����ܣ��E�c���|�L�/��S��x
�)�M�Z���XXoJJj��f��Xnӌ$�����}�m��c������N���Ύ��T�+yp����e���?����M�� ?���8��z�+�$$Jyw6Z�C�P���<��asc�#����3�s%�zAm�L|�"ݧhY�ӽ&�z'����ԉ]���wi3���G�%`g�0��Wםzܵ���Q�3�U�=*ۭ���s�4�٫zne������t9��ڀ)ΰ����2��{�raag�$��c��ܣ�����1�/�������Ѿ9_��Ug�ۆM��`Z�S.{��C5�S�]c�..-��s���	�3��xÌ2��&����vZ _�Θ�YO�����;�����'�~c���mz��ё#Ŗx�h|\|Pz�f�y�b4d���7e�W}R�0dAo�4�<���si�3���7���`&������ѱ��]����f\}�p^��"���,�jJ�(Y+��bbゲӹ&���u066����k6�@�6��M~�BЀ�ϥ�e\�/_`v�[���1E�t%NS�{�z����>d�6��Û�����˝JNIi{s���b(I;�`���h�O��6ť��z1����7`�v^H��jR գ�����;&�O��2��:>���ɻv�=���vf���^���ɜϗ��I�ɽI��`]
v'&&�i&�T��Z��m��-,���G���ߪ*
�O���`&�-^���K�PrZ�|_0?C�����lVUU��J.js��fURf�9���R��������j������c6I�n׹�G;ai��l�aQ���&��:�7J�.P���	�5b$'G���l�fw�hX5�:J���V[�m�`�fm�iwuww�'�5����ݞH��Mz����j���y�/966f.&6fC��|f�y�X�����׳Ŭ�ݤK�?!��Ò`��B�G����c#wi���(T�a�{*;:Z?��j���*�Nɻf��
~�gg�RT\�]-��R����v~Z%wvE�*h�i[��֖��
j��H���p��lE|�b_+�5�͕u]k���̮�֏wv���~������������,��G$�
���F딻e�	SI�zgmz�6�6_�������Ұ�}���4EQ��n�oJf6����][w�Ϯ�Z�[ukc��_���f�����2��bUS?�.J�p�\��*��n��2//�٪�{��LIk��
��X���ZT
���g�(����K���dE��x�������Q�&%F{6����zU����t��ZT��m�B��u�Mo�޸�2�]c#�/������A�����̺PVV�͔�􆄄Wk<]7����2��W8�5>�����C��'�K=YSW�%-�~,ёDU��`F�k�{Op�'�:�[?���w����5;�Ԃ�kB�?#3��4l�J+~�@zMD&h"�f^�"�3� z��uw�~����>- �S\c�������o+��Y��{��1�K��6�pd*�v�����ݽ=���StNn�����_կ�iӽ�n%g�f�2OTZD�-�f�7Ku�)�ԮdgJ�)�d�C�&Џnd
DT��<�kl�����c�ҾS��v��SݭG�C��~1{��yԐ���dIU_��33KBL5MM$�f}��d�POO�{��:633�����ZY������$;���$K�Dd>�:+���L��fֲj�H��

   
��_,((~%-=�9>�2�<� �V
��}ُe㺻�o~ⱇ�4''{�����qfv�%�������~vƣ��d��DGE��GsA�߬I��w�~@�����,⇐�y[��s�ѳO����Wn���Q���a�=ѳ�K�����hinn�tmݾϜy�SY�9�Kv����7��|B�	xܓ���~�����$�ߖ`��i��i�;���7�d�;��v�;�|"�[Z�[�^���'���M�p��w|�joͿ(�Խ�7�fK��vO~����γgN}43+�Q)��X\�f@7�9�k����?���&'&���Z	,Gi�F��j����>�_��z��bb���Q��ݝm'�|��?\\\L:p��j�r$����B�*��>����?�aEcÅ�i����r�p��������8�-�����QZ?�u���C{��S�++Q�]
�W8���ne�?��c�799�U[[���N~ў舨!����{j��/8��ݵ����f����y9V��������x�e���F���F���(����ŧ���V9&zޡ�o9BD6`^�;���>5::R���7�|�_$�����&��!m���յ:�-tv�߭��i�v�����6������[�CGRJKLl�XVv���Go���>��?V	����w�W �b`J�P��^�?T�kWˡ�ǿ���v��Dd9��8K`j�u:++�{td���q�]Z+���z��|�zY��C�������I/.��TP\�l��f���g3�~JՀ-����`_��K>��R��#Ǿ�_XrJ�~A�� ~�ݞ8������x��5:\���sY�UA<u>j
�Q9DD������������
�_ݽ���
�n��q���h�S/qa����G[b�_��@D4`^�;�J�埛���<�����K[���	����O����@�V~08w�����T���z�=�}}{T��jqIٳ��o+���9�Ě�$c��`�1;3���l����R`�0ﴻ�Jc��j���v���6{Deۯ�lѦ�qq�A���Τk~�!�j�x���l�?ooin��kl�����TIY哪��9_�v�^Q��'�l��
[��e�5c:���ѕ��2��HS��L�5<����lZ&�r���z���x��CG~�����߲b-���ں��.���g����<���5lJ��I�C�ݕ
������	m7�Mi��EOm�z��CG���#ɹ-V�kٓo~n����D�v{����'��*5����ho�Ǟ���[��;񖄈_��GC�	�T�n��W{���H{��W������
�رak���|i���žڊ�w�H3�s;V�G ����[ZZ����<>44T���u%ə�K�DP����K���O�P��ťŘ¢��Uqb�$��觇�G`�Bހ)�>zb|�|�5VW\\���mՐ����� �
&;7��U��Qc6&6nA�Io蘛q�Cڀ)�>cjr:W��Ngj����f���}�`E��cU�<<8P���uK_o�Mcc��|�����&��U^ʗ��:���yY{*���dOt�$$X�����_�dܼ*w����jo��@���o���?^�-��\�
YL��MLL�+ܧ���쇋�G�����Ԥ��hflK��sL���p��ouvvt&��>z����?���G�_�
�׃��͚=l+��z�l�s�ܙO���jn�Z���6���<���L��P�����������?q�ֿMMK�SkU��^/�`*Ø�#��]>p��ꝥ�|3�J�*P�����R5��ёᲕ�;���z��l�KK��mM��K��Tg�X�5a�/4r��;���|���e� ��Kv_w��@)6�mbj��o���Mc+̊)T���/�����+�����LgW��y����/+H޳چ���Mc>���܂�sMW.����3?�?0�700�n��擒����ᇇ�nvNn�j�k=u27�4�T����{A=�g�v���^^Y�]Y^�U�$"�)������x�xyy%֙��e��;�kz�+VB�8����Tg5ZqK��5T΁������L��w�[��K���jF4�

[�̘��f6\�p����ͬ�]XX�h�3b�B%��?NNN�O�$(�)~.&Z�ʕ�WS��tu�ݡ��۟z��������}�~SØ^�'mz%����Ԯ���]�t�W���s***?t��_)��!˰�X�����F#�^�l��KS�/_�h�~Y#b��Y�f�{p���s�>��������i��mjG�r4��p�Ѝ�״�r��/~�ܼ/m���lhh`�j�U���������耂�}%%�/M�'����Z���5����9���y�kl�F���Y������^3Wg�L�D�Wͷ���Yc�����{QN�/+�F���+��Y;[=�ٯ1
Y�3�����ږ榻t^M������y�&$ئ�7d3Y���Y5㜢E�5�T��A�g�0ZK��4SUS���5�J�V��ZU�IcK3,2A�JK������/]���3�~]�p\����(7�7�g����ۚ?x����PB�ʁ�����v��
��?��~n��yAo���qf���-��Ԟ��y����)���9������;�R���4��R�n�������
Z�i����Ng��W
�(e�KU{���
�#��	~�uU��Ѣ�i5۷ʢ�
$)`���g���oz^��Z����s	K�o���v���e
��}Zq���4�����_�*C{�u�^�yM)6��)��u�zZ�fOO��86.v��"���*��S�5oY}���>� 0kjۧ��� O�?���g���CG�\���oA��kMc�����Ɔ�����U1�����m�����?�
����,B~�!>�Y6�Y�Be��zJ_���2:J��W2ɤk9%
ڬ�~ӷ���ڀE+W[)�h�$��uh��5�v����(W��
��1�q�;g��jH���{��*�䈋��V�m�u�
���P�YU�\pL��Tv������v�2��Z�p;��P��Y?ɗ�M���%�O�l�gO���
�;5޵��ɤQh��x솓�ҋ?�|GG����
��p��90	�j�.=v��9��\�x������߲Z_[��������z�EG���-toy�N����7C �
.g��I�2��#n����a�����'��T���Џ�=4e��U|q��l��b�Ihe�k�̢)��]fB��SaV�$([e����k���UՉߪX���	u�M���(mRe��
�v�����ր���lե,�e���N�Dq=r��l�#��h�^���*VH6��Ђ��
�'��t�j�����e��?S�]?��� ��
�@0�h�.�5��y��@��B��a��F�J�_R �j��2S�;g6YQ�]�@���I�OUkO���6� A��+~U��
�@к��q�hY̲�|�7��1�����*��3��i�8�i|���x�4����{��neT��>�������V��Ԟ��Q�A�}]�-�a<-������9h�h�^�&�ZOl�-ߪ8�ez�]���D�����\�0�i��S�����{��T�<�z_��iM�u��g�6��ޖ�p�1+J�xZjAk�L���U�'NY�v��ym˷*Fh���8dv�֦/�>Y�a���K���S���ܼ����3��X�)G����6���Ņń���Ϩ�N��l	өq�
��mf�����q�^M����i���NgS_�A�T~���ε|>����5`&��˯׶�7;8o�%E�Q����������k��~��D�d�n�#����	﬷�rw�#�v�Ay_���C�xn%�~9#3��������ܭ��
_���0<�$�{rr���xmZZz�v�r��2��TQQ�#Z���be���w�]��p�b��l�V��\P\gI�&�@�'n��g�KQ�/ɐ6<i'���'v�oӤ�utl�&��
��T���N��<�
Q~��tv��~�77[��C��0
�S�K3:�Չ�k{5b`?qʹ��3U�JI*hxV�R�8��|GJ����)��=�9�����c���KIMo��]�%��z{�>��_i;
m]l�0u�W���w^5�-!��)0	��#C7��af����E��Kb��Ti��z��yy�/�����Z���y!++��f%�V���,��a�gk=D�0s`���)�i��r��,��^T$��Ԝ���k찆'CNg�U�N��i1qlt�v�\+#3����U�5�t�<h6Q)�O��t�a�ok9Jp0%hƫ3CH�´a+����S�㵞iw���h��0<f�-�N�z�Z�=��p��Bk9�r��23��MN�׏�ߩԎ���׆^ �
.�ݦ��MuK�?}��}}��Y\\����1�������o�#�ё��Z��+;;�Yk������.*����f$߯$�
�Ϸ}նޕ�Sr����Y��1��J{?k
����ܣ��E�c���|�L�/��S��x
�)�M�Z���XXoJJj��f��Xnӌ$�����}�m��c������N���Ύ��T�+yp����e���?����M�� ?���8��z�+�$$Jyw6Z�C�P���<��asc�#����3�s%�zAm�L|�"ݧhY�ӽ&�z'����ԉ]���wi3���G�%`g�0��Wםzܵ���Q�3�U�=*ۭ���s�4�٫zne������t9��ڀ)ΰ����2��{�raag�$��c��ܣ�����1�/�������Ѿ9_��Ug�ۆM��`Z�S.{��C5�S�]c�..-��s���	�3��xÌ2��&����vZ _�Θ�YO�����;�����'�~c���mz��ё#Ŗx�h|\|Pz�f�y�b4d���7e�W}R�0dAo�4�<���si�3���7���`&������ѱ��]����f\}�p^��"���,�jJ�(Y+��bbゲӹ&���u066����k6�@�6��M~�BЀ�ϥ�e\�/_`v�[���1E�t%NS�{�z����>d�6��Û�����˝JNIi{s���b(I;�`���h�O��6ť��z1����7`�v^H��jR գ�����;&�O��2��:>���ɻv�=���vf���^���ɜϗ��I�ɽI��`]
v'&&�i&�T��Z��m��-,���G���ߪ*
�O���`&�-^���K�PrZ�|_0?C�����lVUU��J.js��fURf�9���R��������j������c6I�n׹�G;ai��l�aQ���&��:�7J�.P���	�5b$'G���l�fw�hX5�:J���V[�m�`�fm�iwuww�'�5����ݞH��Mz����j���y�/966f.&6fC��|f�y�X�����׳Ŭ�ݤK�?!��Ò`��B�G����c#wi���(T�a�{*;:Z?��j���*�Nɻf��

   