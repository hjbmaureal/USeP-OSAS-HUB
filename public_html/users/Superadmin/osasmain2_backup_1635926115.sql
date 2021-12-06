

CREATE TABLE `accomplishment_rating` (
  `rate_id` int(11) NOT NULL,
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
  KEY `fk_accomplishment_rating_sl_applicant1_idx` (`applicant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO accomplishment_rating VALUES("1","0000000010","Excellent","Satisfactory","Excellent","Satisfactory","Satisfactory","Satisfactory","Satisfactory","Satisfactory","Satisfactory","February","2021");
INSERT INTO accomplishment_rating VALUES("2","0000000010","Excellent","Satisfactory","","","","","","","","January","2021");



CREATE TABLE `accomplishment_task` (
  `task_id` int(11) NOT NULL,
  `applicant_id` int(10) unsigned zerofill NOT NULL,
  `student_id` varchar(10) NOT NULL,
  `task` varchar(255) DEFAULT NULL,
  `month` varchar(50) DEFAULT NULL,
  `year` varchar(45) NOT NULL,
  `date_posted` date NOT NULL,
  PRIMARY KEY (`task_id`),
  UNIQUE KEY `unique_index` (`applicant_id`,`task`,`month`,`date_posted`),
  KEY `fk_accomplishment_task_sl_applicant1_idx` (`applicant_id`),
  KEY `fk_accomplistment_task_student1` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO accomplishment_task VALUES("2","0000000010","2018-00001","Data Encoding ","February","2021","2021-08-19");
INSERT INTO accomplishment_task VALUES("3","0000000010","2018-00001","Data Entry","February","2021","2021-08-19");
INSERT INTO accomplishment_task VALUES("4","0000000010","2018-00001","Data Encodin","January","2021","2021-08-19");
INSERT INTO accomplishment_task VALUES("5","0000000010","2018-00001","Data entry","January","2021","2021-08-19");
INSERT INTO accomplishment_task VALUES("20","0000000010","2018-00001","asd","September","2021","2021-08-19");
INSERT INTO accomplishment_task VALUES("21","0000000010","2018-00001","sad","September","2021","2021-08-19");



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
  `User_Id` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `User_type` varchar(50) NOT NULL,
  `IP_address` varchar(50) NOT NULL,
  `Date_Time` datetime NOT NULL,
  `Activity` varchar(50) NOT NULL,
  PRIMARY KEY (`User_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




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
  `date_verified` date DEFAULT NULL,
  `account_status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`registration_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_alumni_course1_idx` (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO alumni VALUES("1","123","5","Ginny","Weasley","K1","Jr","edwinpams1@gmail.com","09632524125","2020-2021","1234","","","2021-07-28","","Active");



CREATE TABLE `announcements` (
  `announcement_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `_date` date NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`announcement_id`),
  KEY `fk_announcements_staff1_idx` (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO announcements VALUES("3","10001","2021-08-17","Upcoming Group Guidance","Please be informed that there will be an upcoming Group Guidance by Section this school year. Thank you!");
INSERT INTO announcements VALUES("5","1000000001","2021-08-12","Upcoming Student Announcement","Lorem Ipsum Spectrum Patronum");



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
  `relational_stress` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`chk_q6_id`),
  KEY `fk_intake_id` (`intake_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO chk_intake_q6 VALUES("9","8","","","","","","","","","","","","","","");
INSERT INTO chk_intake_q6 VALUES("15","14","","","","","","","","","","","","","","");
INSERT INTO chk_intake_q6 VALUES("16","15","","","","","","","","","","","","","","");
INSERT INTO chk_intake_q6 VALUES("17","16","","","","","","","","","","","","","","");



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
  `others_loc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`request_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO clinic_certificate_requests VALUES("1","2018-00161","2021-08-18","Field Trip","Medical Certificate","","","","","pending","1","1","0","0","0","0","0","0","0","0","0","0","0","","","","","","","","","","","","","","");
INSERT INTO clinic_certificate_requests VALUES("2","2018-00161","2021-08-18","Field Trip","Medical Certificate","","","","","pending","","","","","","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO clinic_certificate_requests VALUES("3","2018-00161","2021-08-18","Field Trip","Medical Records Certification","","Letter of Request/NANCY-MIRAFUENTES-1608731021_1629297565.pdf","","","pending","","","","","","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO clinic_certificate_requests VALUES("4","2018-00002","2021-08-19","Field Trip","Medical Certificate","","","","","pending","1","0","0","0","0","0","0","0","0","0","0","0","0","","","","","","","","","","","","","","");



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
  PRIMARY KEY (`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO clinic_patient_info VALUES("1","No","","","No","","","Chickenpox","Yes","I hereby s","0");
INSERT INTO clinic_patient_info VALUES("2018-00002","No","","","No","","","Chickenpox","Yes","I hereby s","0");
INSERT INTO clinic_patient_info VALUES("2018-00005","Yes","Asthma","January 2015","Yes","Wisdom teeth removal","March 2019","Tetanus","Yes","I hereby s","0");
INSERT INTO clinic_patient_info VALUES("2018-00159","Yes","Asthma","January 2017","Yes","Appendectomy","March 2014","Pulmonary Tuberculosis","Yes","I hereby s","0");
INSERT INTO clinic_patient_info VALUES("2018-00161","No","","","No","","","German Measles","No","I hereby s","0");
INSERT INTO clinic_patient_info VALUES("2018-00234","Yes","Asthma","January 2015","Yes","Appendectomy","March 2019","Chickenpox","Yes","I hereby s","0");



CREATE TABLE `clinic_patient_info_female` (
  `patient_id` varchar(11) NOT NULL,
  `mens_age_start` varchar(45) DEFAULT NULL,
  `mens_regular` varchar(45) DEFAULT NULL,
  `mens_irregular` varchar(45) DEFAULT NULL,
  `dysmenorrhea` varchar(20) DEFAULT NULL,
  `pms` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`patient_id`),
  KEY `fk_clinic_patient_info_female_clinic_patient_info1_idx` (`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO clinic_patient_info_female VALUES("2018-00002","12","Yes","","Yes","None");



CREATE TABLE `college` (
  `college_id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`college_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO college VALUES("1","CTET","College of Teacher Education and Technology","Active");
INSERT INTO college VALUES("2","CARS","College of Architecture and Related Sciences","Enabled");
INSERT INTO college VALUES("3","College of Arch and ","CARD","Active");
INSERT INTO college VALUES("4","CE","College of Engineering Tagum Mabini","Enabled");



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
  `Status` varchar(50) NOT NULL,
  PRIMARY KEY (`Complaint_ID`),
  KEY `complaint_idfk_1` (`Student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO complaint VALUES("1","2018-00001","2021-07-01","2021-07-01","09:00:00","fsd","fsdf","fsd","fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd fsd ","fsd","fsd","fsd","Done");
INSERT INTO complaint VALUES("2","2018-00001","2021-07-19","2021-08-16","11:34:00","Lorem Ipsum","Lorem Ipsum","Student","Lorem Ipsum","Lorem Ipsum","Lorem Ipsum","Lorem Ipsum","Done");
INSERT INTO complaint VALUES("3","2018-00001","2021-07-19","2021-08-12","11:12:00","Lorem Ipsum","Lorem Ipsum","Student","Lorem Ipsum","Lorem Ipsum","Lorem Ipsum","Lorem Ipsum","Pending");
INSERT INTO complaint VALUES("4","2018-00001","2021-07-19","2021-08-24","16:13:00","Lorem Ipsum","kilo lamo","Student","Lorem Ipsum","Lorem Ipsum","Lorem Ipsum","Lorem Ipsum","Done");
INSERT INTO complaint VALUES("5","2018-00001","2021-07-19","2021-08-11","10:45:00","Usep","Lorem Ipsum","Student","Lorem Ipsum","Lorem Ipsum","Lorem Ipsum","Lorem Ipsum","Done");
INSERT INTO complaint VALUES("7","2018-00001","2021-08-15","2021-08-15","08:10:00","Lorem Ipsum","Lorem Ipsum","Lorem Ipsum","Lorem Ipsum","Lorem Ipsum","Lorem Ipsum","Lorem Ipsum","Lorem Ipsum");
INSERT INTO complaint VALUES("8","2018-00001","2021-08-15","2021-08-15","22:47:00","Lorem Ipsum","Lorem Ipsum","Student","Lorem Ipsum","Lorem Ipsum","Lorem Ipsum","Lorem Ipsum","Pending");
INSERT INTO complaint VALUES("9","2018-00001","2021-08-15","2021-08-28","23:39:00","Lorem Ipsum","Lorem Ipsum","Student","Lorem Ipsum","Lorem Ipsum","Lorem Ipsum","Lorem Ipsum","Pending");
INSERT INTO complaint VALUES("10","2018-00001","2021-08-15","2021-08-25","23:40:00","Lorem Ipsum","Lorem Ipsum","Student","Lorem Ipsum","Lorem Ipsum","Lorem Ipsum","Lorem Ipsum","Pending");
INSERT INTO complaint VALUES("11","2018-00001","2021-08-17","2021-08-17","17:42:00","tagum city","Lorem Ipsum","Student","Lorem Ipsum","Lorem Ipsum","Lorem Ipsum","Lorem Ipsum","Pending");
INSERT INTO complaint VALUES("12","2018-00006","2021-08-18","2021-08-19","06:09:00","Lorem Ipsum","Lorem Ipsum","Student","Lorem Ipsum","Lorem Ipsum","Lorem Ipsum","Lorem Ipsum","Pending");
INSERT INTO complaint VALUES("13","2018-00001","2021-08-19","2021-08-04","02:58:00","Usep","Siaya","Student","Details","Lorem Ipsum","Lorem Ipsum","Lorem Ipsum","Pending");
INSERT INTO complaint VALUES("14","2018-00001","2021-08-19","2021-08-17","08:58:00","USEP","Harry Potter","Student","Lorem Ipsum","Lorem Ipsum","Lorem Ipsum","Lorem Ipsum","In Process");
INSERT INTO complaint VALUES("15","2018-00001","2021-08-19","2021-08-27","01:30:00","USEP","Harry Potter","Student","Lorem Ipsum","Lorem Ipsum","Lorem Ipsum","Lorem Ipsum","Pending");
INSERT INTO complaint VALUES("16","2018-00001","2021-08-19","0001-01-01","00:00:00","1234","12345","Staff","Lorem Ipsum","Lorem Ipsum","Lorem Ipsum","Lorem Ipsum","Pending");
INSERT INTO complaint VALUES("17","2018-00001","2021-08-19","2021-10-25","10:00:00","USEP","Ed Pak","Student","Lorem Ipsum","Lorem Ipsum","Lorem Ipsum","Lorem Ipsum","Done");



CREATE TABLE `consultation` (
  `id` int(11) unsigned zerofill NOT NULL,
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
  `school_year` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_consultation_clinic_patient_info1_idx` (`patient_id`),
  KEY `fk_consultation_type_idx` (`consultation_type`),
  KEY `fk_staff` (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO consultation VALUES("00000000020","2018-00161","2","1000000002","Messenger","","https://www.youtube.com/watch?v=CKZvWhCqx1s","2021-08-18","Lorem Ipsum","Lorem Ipsum","Lorem Ipsum","Completed","Lorem Ipsum","Lorem Ipsum","2021-08-18","2021-08-19","01:57","01:57","N/A","Lorem Ipsum","2021-08-18","Off Semester","2020-2021");
INSERT INTO consultation VALUES("00000000021","2018-00161","2","1000000002","Messenger","","https://www.youtube.com/watch?v=CKZvWhCqx1s","2021-08-18","","","","Ongoing","","","2021-08-18","2021-08-19","05:18","05:18","N/A","","","Off Semester","2020-2021");
INSERT INTO consultation VALUES("00000000022","2018-00161","2","1000000002","Messenger","","https://www.youtube.com/watch?v=CKZvWhCqx1shttps://www.youtube.com/watch?v=CKZvWhCqx1s","2021-08-18","","","","Pending","","","","","","","","","","Off Semester","2020-2021");
INSERT INTO consultation VALUES("00000000023","2018-00161","2","1000000002","Messenger","","Lorem Ipsum","2021-08-18","","","","Pending","","","","","","","","","","Off Semester","2020-2021");
INSERT INTO consultation VALUES("00000000024","2018-00234","3","1000000002","Google Meet","","Sakit akong likod","2021-08-18","","","","Pending","","","","","","","","","","Off Semester","2020-2021");
INSERT INTO consultation VALUES("00000000025","2018-00159","3","1000000002","Google Meet","","Sakit akong likod!!!!","2021-08-18","","","consultation_id","Completed","consultation_id","consultation_id","2021-08-18","2021-08-19","08:30","09:00","https://meet.google.com/hxm-sbdi-nqj","consultation_id","2021-08-18","Off Semester","2020-2021");
INSERT INTO consultation VALUES("00000000027","1","3","1000000002","Messenger","","Heloooooooo","2021-08-19","","","Diagnosis diri","Completed","Treatment DIri","Remaarks diri","2021-08-19","2021-08-19","09:56","09:56","N/A","Prescription diri","2021-08-19","Off Semester","2020-2021");



CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `consultation_details` AS select `c`.`id` AS `consultation_id`,`c`.`patient_id` AS `patient_id`,`FULLNAME`(`pt`.`first_name`,`pt`.`middle_name`,`pt`.`last_name`,'','','','firstname_first') AS `name`,`pt`.`email_add` AS `email_add`,`pt`.`age` AS `age`,`pt`.`sex` AS `sex`,`pt`.`address` AS `address`,`pt`.`phone_number` AS `phone_number`,`pt`.`course_department` AS `course_department`,`pt`.`type` AS `user_type`,`c`.`consultation_type` AS `consultation_type`,`c`.`communication_mode` AS `communication_mode`,`c`.`patient_type` AS `patient_type`,`c`.`problems` AS `problems`,`c`.`date_filed` AS `date_filed`,`c`.`tooth` AS `tooth`,`c`.`surface` AS `surface`,`c`.`status` AS `consultation_status`,`c`.`date_received_by_nurse` AS `date_received_by_nurse`,`c`.`appointment_date` AS `appointment_date`,`c`.`appointment_timefrom` AS `appointment_timefrom`,`c`.`appointment_timeto` AS `appointment_timeto`,`c`.`appointment_meetinglink` AS `appointment_meetinglink`,`c`.`diagnosis` AS `diagnosis`,`c`.`treatment` AS `treatment`,`c`.`prescription_details` AS `prescription_details`,`c`.`prescription_date_issued` AS `prescription_date_issued`,`c`.`remarks` AS `remarks`,`s`.`staff_id` AS `physician_staff_id`,`s`.`fullname` AS `physician_fullname`,`s`.`license_number` AS `license_number` from ((`consultation` `c` join `patient_list` `pt` on(`pt`.`patient_id` = `c`.`patient_id`)) join `staffdetails` `s` on(`s`.`staff_id` = `c`.`staff_id`));

INSERT INTO consultation_details VALUES("00000000027","1","Severus Snape","snape@gmail.com","32","Male","N/A","09412554125","Elementary Education Department","Faculty","3","Messenger","","Heloooooooo","2021-08-19","","","Completed","2021-08-19","2021-08-19","09:56","09:56","N/A","Diagnosis diri","Treatment DIri","Prescription diri","2021-08-19","Remaarks diri","1000000002","Tamara J. Webber","");



CREATE TABLE `consultation_type` (
  `type_id` int(10) NOT NULL,
  `consultation_type` varchar(100) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(10) NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO consultation_type VALUES("2","Dental Consultation","2021-07-19 10:30:59","Active");
INSERT INTO consultation_type VALUES("3","Medical Consultation","2021-07-19 10:31:06","Active");



CREATE TABLE `counselling_evaluation` (
  `counsel_eval_id` int(11) NOT NULL,
  `Student_id` varchar(10) NOT NULL,
  `eval_date` date DEFAULT NULL,
  `eval_code` varchar(100) DEFAULT NULL,
  `radio_q1` varchar(100) DEFAULT NULL,
  `radio_q2` varchar(100) DEFAULT NULL,
  `radio_q3` varchar(100) DEFAULT NULL,
  `comments` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`counsel_eval_id`),
  KEY `fk_studeval_id` (`Student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO counselling_evaluation VALUES("1","2021-00005","2021-08-18","1","Satisfactory","Fair","Very Satisfactory","I love it, i would like to have more counselling session.");
INSERT INTO counselling_evaluation VALUES("2","2021-00005","2021-08-18","2","Fair","Very Satisfactory","Satisfactory","It was a nice experience.");
INSERT INTO counselling_evaluation VALUES("3","2021-00005","2021-08-19","3","Poor","Excellent","Poor","i really like, will do more sessions.");
INSERT INTO counselling_evaluation VALUES("4","2021-00005","2021-08-18","4","Excellent","Poor","Excellent","Very Good.");
INSERT INTO counselling_evaluation VALUES("5","2018-00001","2021-08-18","143","Excellent","Excellent","Excellent","birinice");



CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `college_id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `name` varchar(150) NOT NULL,
  `major` varchar(150) DEFAULT NULL,
  `student_type` varchar(45) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`course_id`),
  KEY `fk_course_college1_idx` (`college_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `dept_id` int(11) NOT NULL,
  `college_id` int(11) DEFAULT NULL,
  `dept_head` int(11) DEFAULT NULL,
  `dept_name` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`dept_id`),
  KEY `fk_department_college1_idx` (`college_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO department VALUES("1","1","0","IT Department","Active");
INSERT INTO department VALUES("2","2","0","Ag-Eng Department","Active");
INSERT INTO department VALUES("3","1","","Special Needs Dept","Active");
INSERT INTO department VALUES("4","1","","English Department","Active");
INSERT INTO department VALUES("5","1","","Elementary Education Department","Active");
INSERT INTO department VALUES("7","1","0","Siya","Active");
INSERT INTO department VALUES("8","1","123123","Likopo lo","Active");
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
  KEY `Student_id` (`Student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO emergency_contact VALUES("2018-00001","fsdf","fsdf","A Mother","","fsdf","fasd","fsdf","fsdf1","fsdf","fds","fsdf","fsd","","0","0");
INSERT INTO emergency_contact VALUES("2018-00002","","","","","","","","","","","","","","","");
INSERT INTO emergency_contact VALUES("2018-00003","","","","","","","","","","","","","","","");
INSERT INTO emergency_contact VALUES("2018-00005","Others","NULL","Lorem Ipsum","Lorem Ipsum","Lorem Ipsum","NULL","NULL","NULL","NULL","NULL","Lorem Ipsum","Lorem Ipsum","NULL","","");
INSERT INTO emergency_contact VALUES("2018-00006","Relatives","NULL","","Lorem Ipsum","Lorem Ipsum","NULL","NULL","NULL","NULL","NULL","Lorem Ipsum","Lorem Ipsum","NULL","","");
INSERT INTO emergency_contact VALUES("2018-00010","Parents","NULL","NULL","NULL","NULL","NULL","Joan M. Prollo","PLGU -DdO","Tagum City","09063180040","","","NULL","","");
INSERT INTO emergency_contact VALUES("2018-00155","Parents","NULL","NULL","NULL","NULL","NULL","Dexter Bonza","Driver","Tagum City","09198550875","Jizza Bonza","N/A","NULL","","");
INSERT INTO emergency_contact VALUES("2018-00159","","","","","","","","","","","","","","","");
INSERT INTO emergency_contact VALUES("2018-00161","","","","","","","","","","","","","","","");
INSERT INTO emergency_contact VALUES("2018-00234","","","","","","","","","","","","","","","");
INSERT INTO emergency_contact VALUES("2018-11111","Friends","NULL","","adfadf","asdf","NULL","NULL","NULL","NULL","NULL","","","NULL","","");
INSERT INTO emergency_contact VALUES("2018-99999","Parents","NULL","NULL","NULL","NULL","NULL","er","er","sfdsfds","0205303124","","","NULL","","");
INSERT INTO emergency_contact VALUES("2021-00001","nkn","lknl","","","kn","casd","jbj","knl","knl","knknl","k","lkn","","0","0");
INSERT INTO emergency_contact VALUES("2021-00002","nkn","lknl","","","kn","casd","jbj","knl","knl","knknl","k","lkn","","0","0");
INSERT INTO emergency_contact VALUES("2021-00003","nkn","lknl","asdf","sdf","kn","casd","jbj","knl","knl","knknl","k","lkn","","0","0");
INSERT INTO emergency_contact VALUES("2021-00004","nkn","lknl","Father ni Reed","","kn","casd","jbj","knl","knl","knknl","k","lkn","","0","0");
INSERT INTO emergency_contact VALUES("2021-00005","fsd","fsdf","adf","fasd","fsdf","C City","fasdf","fasdf","fsdf","fsdf","fsdf","fsdf","09125412521","0","0");



CREATE TABLE `enrollment_list` (
  `id` int(11) NOT NULL,
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
  KEY `fk_enrollment_list_student1_idx` (`Student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO enrollment_list VALUES("1","2021-00001","","0","1","","","","","","","","","","","","","","","","","","","","","","","","","","","","");



CREATE TABLE `forgot_pass_requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(10) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4;

INSERT INTO forgot_pass_requests VALUES("18","2018-00001","Done");
INSERT INTO forgot_pass_requests VALUES("19","2018-00002","Done");
INSERT INTO forgot_pass_requests VALUES("21","2021-00001","Done");
INSERT INTO forgot_pass_requests VALUES("22","2021-00001","Done");
INSERT INTO forgot_pass_requests VALUES("23","2021-00001","Done");
INSERT INTO forgot_pass_requests VALUES("24","2021-00001","Done");
INSERT INTO forgot_pass_requests VALUES("25","2018-00001","Done");
INSERT INTO forgot_pass_requests VALUES("26","2021-00001","Done");
INSERT INTO forgot_pass_requests VALUES("27","2021-00001","Done");
INSERT INTO forgot_pass_requests VALUES("28","2021-00001","Done");
INSERT INTO forgot_pass_requests VALUES("29","2021-00001","Done");
INSERT INTO forgot_pass_requests VALUES("30","2018-00001","Done");
INSERT INTO forgot_pass_requests VALUES("31","2018-00002","Done");
INSERT INTO forgot_pass_requests VALUES("32","2018-00002","Done");
INSERT INTO forgot_pass_requests VALUES("33","2018-00002","Done");
INSERT INTO forgot_pass_requests VALUES("34","2018-00002","Done");
INSERT INTO forgot_pass_requests VALUES("35","2018-00002","Done");
INSERT INTO forgot_pass_requests VALUES("40","2018-00001","Request Delivered");
INSERT INTO forgot_pass_requests VALUES("41","2018-00002","Request Delivered");



CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `gmc_request` AS select `gm`.`request_id` AS `request_id`,`a`.`id` AS `userid`,`a`.`course_id` AS `course_id`,`a`.`first_name` AS `first_name`,`a`.`last_name` AS `last_name`,`a`.`middle_name` AS `middle_name`,`a`.`suffix` AS `suffix`,`a`.`email_add` AS `email_add`,`a`.`contact` AS `contact`,`a`.`last_sy_attended` AS `last_sy_attended`,date_format(`gm`.`date_requested`,'%M %d, %Y') AS `date_requested`,`gm`.`or_no` AS `or_no`,`gm`.`purpose` AS `purpose`,`gm`.`or_pic` AS `or_pic` from (`alumni` `a` join `good_moral_requests` `gm` on(`gm`.`requested_by` = `a`.`id`)) union select `gm`.`request_id` AS `request_id`,`s`.`Student_id` AS `userid`,`s`.`course_id` AS `course_id`,`s`.`first_name` AS `first_name`,`s`.`last_name` AS `last_name`,`s`.`middle_name` AS `middle_name`,`s`.`suffix` AS `suffix`,`s`.`email_add` AS `email_add`,`s`.`phone_number` AS `contact`,`gm`.`last_sy_attended` AS `last_sy_attended`,date_format(`gm`.`date_requested`,'%M %d, %Y') AS `date_requested`,`gm`.`or_no` AS `or_no`,`gm`.`purpose` AS `purpose`,`gm`.`or_pic` AS `or_pic` from (`student` `s` join `good_moral_requests` `gm` on(`gm`.`requested_by` = `s`.`Student_id`));




CREATE TABLE `good_moral_requests` (
  `request_id` int(10) unsigned zerofill NOT NULL,
  `last_sy_attended` varchar(10) DEFAULT NULL,
  `requested_by` varchar(11) NOT NULL,
  `date_requested` date NOT NULL,
  `or_no` varchar(45) NOT NULL,
  `purpose` varchar(150) NOT NULL,
  `or_pic` blob NOT NULL,
  PRIMARY KEY (`request_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO good_moral_requests VALUES("0000000001","2021-2022","2021-00001","2021-07-28","12345672","sdfasdf","fsdf");



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
  KEY `fk_program_id_idx` (`program_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO grantee_history VALUES("1","2021-00001","5","1","0","1st Semester 2021-2022","1st Semester","2021-2022","RELEASED","2021-08-18","NOT DONE","","NOT DONE","","NOT DONE","");
INSERT INTO grantee_history VALUES("2","2018-00010","5","0","0","1st Semester 2021-2022","1st Semester","2021-2022","NOT RELEASED","","NOT DONE","","NOT DONE","","NOT DONE","");



CREATE TABLE `group_guidance` (
  `grp_guidance_id` int(11) NOT NULL,
  `appointment_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `year_level` varchar(20) DEFAULT NULL,
  `section` varchar(20) DEFAULT NULL,
  `topic` varchar(100) DEFAULT NULL,
  `meet_link` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`grp_guidance_id`),
  KEY `fk_apt_gg` (`appointment_id`),
  KEY `fk_cid_gg` (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO group_guidance VALUES("19","62","7","3rd Year","all","Road to Success","meet.google.com/wgs-ebsf-kdy");
INSERT INTO group_guidance VALUES("21","69","1","all","all","Knowing Priorities and ways to prioritize them","meet.google.com/fbo-ebsf-bzk ");
INSERT INTO group_guidance VALUES("22","72","7","3rd Year","all","Understanding the Self","meet.google.com/fbo-ebsf-bzk ");
INSERT INTO group_guidance VALUES("23","76","7","3rd Year","3IT1","Understanding the Self","meet.google.com/fbo-ebsf-bzk ");
INSERT INTO group_guidance VALUES("24","78","7","3rd Year","3IT1","Group Guidance","meet.google.com/fbo-ebsf-bzk ");



CREATE TABLE `guidance_appointments` (
  `appointment_id` int(11) NOT NULL,
  `status_id` int(11) DEFAULT NULL,
  `mode_id` int(11) DEFAULT NULL,
  `date_filed` date DEFAULT NULL,
  `appointment_date` date DEFAULT NULL,
  `appointment_time` time DEFAULT NULL,
  `date_completed` date DEFAULT NULL,
  PRIMARY KEY (`appointment_id`),
  KEY `fk_status_id` (`status_id`),
  KEY `fk_mode_id` (`mode_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO guidance_appointments VALUES("56","2","2","2021-08-15","0000-00-00","00:00:00","");
INSERT INTO guidance_appointments VALUES("57","1","4","2021-08-15","2021-08-24","14:00:00","2021-08-19");
INSERT INTO guidance_appointments VALUES("58","1","3","2021-08-15","2021-08-17","08:52:00","2021-08-19");
INSERT INTO guidance_appointments VALUES("59","1","3","2021-08-15","2021-08-20","10:20:00","2021-08-19");
INSERT INTO guidance_appointments VALUES("60","1","3","2021-08-16","2021-08-16","22:45:00","2021-08-17");
INSERT INTO guidance_appointments VALUES("62","1","3","2021-08-17","2021-08-30","09:00:00","2021-08-17");
INSERT INTO guidance_appointments VALUES("69","3","3","2021-08-18","2021-08-27","13:00:00","");
INSERT INTO guidance_appointments VALUES("70","3","4","2021-08-19","2021-08-23","10:00:00","");
INSERT INTO guidance_appointments VALUES("71","3","1","","2021-08-30","13:00:00","");
INSERT INTO guidance_appointments VALUES("72","3","3","2021-08-19","2021-09-02","13:00:00","");
INSERT INTO guidance_appointments VALUES("73","2","3","2021-08-19","1970-01-01","10:30:00","");
INSERT INTO guidance_appointments VALUES("74","1","3","2021-08-19","2021-08-25","12:00:00","0001-02-08");
INSERT INTO guidance_appointments VALUES("75","1","1","2021-08-19","2021-01-08","16:30:00","2021-08-19");
INSERT INTO guidance_appointments VALUES("76","1","3","2021-08-19","2021-08-30","14:00:00","2021-08-19");
INSERT INTO guidance_appointments VALUES("77","3","1","","2021-08-30","14:00:00","");
INSERT INTO guidance_appointments VALUES("78","1","3","2021-08-19","2021-08-23","11:10:00","2021-08-19");
INSERT INTO guidance_appointments VALUES("79","2","2","2021-08-19","1970-01-01","22:30:00","");



CREATE TABLE `indv_counselling` (
  `counselling_id` int(11) NOT NULL,
  `appointment_id` int(11) DEFAULT NULL,
  `intake_id` int(11) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `eval_status` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`counselling_id`),
  KEY `fk_counsel_apt_id` (`appointment_id`),
  KEY `fk_counsel_intake_id` (`intake_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO indv_counselling VALUES("3","57","6","The child needs more counselling sessions.","1");
INSERT INTO indv_counselling VALUES("4","58","6","The student completed the counselling session successfully","1");
INSERT INTO indv_counselling VALUES("5","59","6","Update Test","1");
INSERT INTO indv_counselling VALUES("13","74","14","hey","");
INSERT INTO indv_counselling VALUES("14","75","15","The counselling session went well","");
INSERT INTO indv_counselling VALUES("15","77","6","","");
INSERT INTO indv_counselling VALUES("16","79","16","","");



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
  `date_completed` date DEFAULT NULL,
  `date_verify` date DEFAULT NULL,
  PRIMARY KEY (`intake_id`),
  KEY `fk_stud_id` (`Student_id`),
  KEY `fk_int_status_id` (`status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO intake_form VALUES("6","2018-00001","","Call-in","2021-08-15","","","","","","","","Purok Matinabangon, Tagum City ","Rizal Elementary","6","2012","Letran","6","2018","USEP","4","2022","","0","0","None","None","Family Problems","To seek for advices","No","No","No","","None","","2021-08-17");
INSERT INTO intake_form VALUES("14","2018-00161","","Walk-in","2021-08-19","","","","","","","","Purok Matinabangon, Tagum City ","Rizal Elementary","6","2012","Letran","6","2018","USEP","4","2022","","0","0","None","None","Family Problems","To seek for advices","No","No","No","","None","","2021-08-19");
INSERT INTO intake_form VALUES("15","2018-00002","","Walk-in","2021-08-19","","","","","","","","Purok Matinabangon, Tagum City ","Rizal Elementary","6","2012","Letran","6","2018","USEP","4","2022","","0","0","None","None","Family Problems","To seek for advices","No","No","No","","None","","2021-08-19");
INSERT INTO intake_form VALUES("16","2018-00003","","Referred","2021-08-19","","","","","","","","Purok Matinabangon, Tagum City ","Rizal Elementary","6","2012","Letran","6","2018","USEP","4","2022","","0","0","None","None","Family Problems","To seek for advices","No","No","No","","None","","");



CREATE TABLE `job_hiring_announcement` (
  `requisition_id` int(10) unsigned NOT NULL,
  `title` varchar(45) NOT NULL,
  `office` varchar(150) NOT NULL,
  `content` varchar(255) NOT NULL,
  `date_posted` varchar(45) NOT NULL,
  `posted_by` int(11) NOT NULL,
  PRIMARY KEY (`requisition_id`),
  KEY `fk_job_hiring_announcement_requisition_form1_idx` (`requisition_id`),
  KEY `fk_staff_id_idx` (`posted_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO job_hiring_announcement VALUES("27","Job Hiring","Elementary Education Department","Open for Job Hiring","2021-08-19","1000000001");



CREATE TABLE `list_of_semester` (
  `semester_id` int(11) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `year` varchar(20) NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`semester_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO list_of_semester VALUES("1","1st Semester","2021-2022","Active");



CREATE TABLE `list_of_subjects` (
  `subject_id` int(5) NOT NULL,
  `subject_code` varchar(20) NOT NULL,
  `subject_description` varchar(50) NOT NULL,
  `subject_unit` int(10) NOT NULL,
  `course` int(11) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `year` varchar(10) NOT NULL,
  PRIMARY KEY (`subject_id`),
  KEY `fk_list_of_subjects_course1_idx` (`course`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

INSERT INTO login_credentials VALUES("2018-00001","Jane L. Doe","123456789","Student","���� JFIF      �� lExif  II*     1    2         i�    :       Picasa    �    0220�    �   �    ,      �� C 



�� �   } !1AQa"q2���#B��R��$3br�	
%&'()*456789:CDEFGHIJSTUVWXYZcdefghijstuvwxyz���������������������������������������������������������������������������        	
�� �  w !1AQaq"2�B����	#3R�br�
$4�%�&'()*56789:CDEFGHIJSTUVWXYZcdefghijstuvwxyz��������������������������������������������������������������������������   ? ��ks�pv���9?�׽~�Z[� f�!�,;p+���ϻ�frq���+�?��b���A��\)�_��_�TQQQ뿢=\&���_����jX[~0xȫ����\
�3Zm�-v8r��˚�gdnd�^�j�6��zԖv΄�}�\Tses���U}�vh�
S�9���D�t�Y��r�����pcзJϸ���pOjjrqZ#>g+�5ah  �i�Z��+�O5��&̰�5�����.fX�P����jJ^����X�,0BIM��Y�*�8P+*�Ɩ���z�j�^.������ � Z�M{�dB���:�M���?W�)ld���uK��C2I� ��U���a@�j����.���f���-��tGk��|��m,��5�O
��l���v����7	�΂�P�<G�I�� ;x��Kķk�x��G�26���u�>�u�a��1�ۃ��1]�������F�D��@�z|ej؋Y�[�]7g|4)�z�ߡ�����Y�#('`>���v�D�0	��Oٵ����(J�����8�S�H�}>aeH��$\ܣܚ�J����z�Gc����Y#���X�Y�dS�)��t��q�3�ӵy�:����GVj.�4�Px̘� � �� �\m^}OO�vw����?�r"Ai�޺d��G�1U����AF���jnp�&�I-4�媝�~���\T�,�3���K9��1�l���v@ ���N��������!6��ú�}�Tn��5a!��`�#�a�V͟ÿj1�N��3�R�W*�����Ns�	��K���0vG^�1�ס��-�ζ7l�?w'�����	�hz�� K�w���b�Z]Ia{�1Y�*%օ��agi#�s
0�I����k���Y�5x�ͦ}��im��I=����Ҿ��gm���Fzc�+�<5�SĈ������=d�˒5,be?�_7����p�� �祃����܈iP��p����UV�v� ��
0ʞ?Z�H���%��j���lH��+�� d����-$�S=�_�>�PK	j|�I�)ޮ&WoN����0��W}�8�y�x? �V��a�K��b��|!�,,�C*�x(��ԕDQ�C?fO�q�i�{��Ŕ
J3��^����&����II$|�J|?U�䷉n��nYF�ʾ=�"1HA�����z}�����9V�
0���=����ǀ�<�+�,�:���S�c׵p�9:
R�lʫ�s���������
���W�N�+��=.|���ճљ7s�R���n��3�}�T��9�#���# v�'��l�hc���1�C!)���X�G�.�k���o`pOcY�@`Ny9�8(�ݢ�)�{^�m�)#5D[&�c�֌������
t�B�UZ�o����N�����*�~�4�q��'�x���0F3�
�� ?�}>��2����
�R99'5��t?:i{3k�y˿��� ����gm�r�d�z��_��m��;�^k�HcU^����k�ī�S}����=�vt�H��@B�`m�jK�b(�r�OZ���T�3�<W��_yS�Qr�2�vV�����dp~��
�l��e��
��T�Q|���ǧ^+wO�V1�K
�v��h)ޘ`y�~k+����y-���#up'澀��ƍa1�))#vTu�c�}F+�
\�o�=h���[�?j�'�ym~.�b�ݠ�8IY�QЃ�J��S�U����<s�5��www�J鴌��?�ԃ�F>Sֽ��L�|:�vbQo���2yc��y��+MMn�䰚)�� Y.���O_�t):��ڻt�y��S�~h�vJ5+�h������|�x����*������?ӵi}���$�
��XW՞>��G�0]�p�xǰ�x��`��֞�W��g�,1�0}6��W
�5��&��W�Z�Cl3
���{�;�����rOC�(��G�=��'�)~
��gP�rx�H���Yt��(��2:� _z���_Ii�\�ot$a��	^H?�{.��[�{LK5ڶ�n!GP8�s\O�o\�����E<�;X�
��ls� �z��J�5�%U�\��<�~�<8֓^���"hg,[�_\��渉�i���_�~����1i��O�VјwQ����|G�ľY$��堏r��W�R���ҹ��n��e���EKqӚl!w�y9���Ȕ�ݍ�``�<�z��^q��֝��R^����[��o��~*�˚Qx��Q����w��t�*��3��0Qzܱ���}+?V�<�h�zb�IA��Wa�{��'O�R¨K�E���3�UY>X ~t�d�Ǐʅ]��=���A7�V�5��R�-,rn=�W�y�]����N8�:�
��-�>��QI]#�NOV}Wn�;y�YGȼgұ���[�
�%���y�lӞ�T13��x�8��
���G�|i�[=Z��[Ol����؞������Nd����f���S���㹅�2����ȡ�O�v����bcs�8�5jUF�y�_9Qj�և����4�f_��$�5�I��jφ�9�x�P��J�{���GrOa_G��VӠI�\Is�6��	�L�5�:s��h��GU^kS�/�_U�e��i6^Lz�_�}؞�_A�3ᯊ�i{���bY,P�{�'���C�.��@�661Y[�T*'�޵^��+M@����]۠��I�s�,�p��}�^��@�|��H�)��e�Fs��?�|9�m�K��n� ڼT�q'�.f���,�f򦵔��	������Z>�+�޽�1����x��W���U�S��i8{IKA����g�Kgc�	-���������O��YA�od �\����Q�V��?����_��J���3��cҷ�NNA�&����Z>�n���|�;���H����u;e(�r�0�M%�8X�D�"���*�F���J!O��O��jH��zP.Q@�u[s�O[1��ً��/V��O63�ȸ��N~��
2��;TZzMn���v��ιj�iWV�*3t��~M��g����)ଃi�gj�B���~�|M�����I���Z�8��pI���ύ5��:�����}ɐ|�Q��R�0��H��u��fy.�Fs�L�����Fj�V�$���22�\W�Q��稫��A=a� qD�q���:y�lTc�B�㩭h�k}��T���Уs���:�������o��� v�#�'�y��G��.pz��8�h`��ۈe�q����Uv�s��Zb� �;�����g���\�v���d FT0� k�����l����>��Pg��.����w��z�9|�4�8*;杧a�þ7��}=꿈X gBJ�N�Mr-gs�w����꒢�I����N�V���(X��EG������n}q� ֪���' �����}�Y+б��b��Gi�#\Yc��������
p���]NUrw(���8��si��Uy�����k"��`7����z� �Y�Qyz����Y��Ƹcu�w��r�mz|�Ȯ>P���Qk2��e'h}s�z��� T���y {t�5�D�� %@6=�?�y��v>�k��<�V}��bXzZl#u���)�sK�yo(RG,:R[3ycp8��\�V�G��E��^G��+���>�m���g�����_��
�b�|>�� ��o���B���I8��%�Y�,GnH��<�_kih?��l`ߕET�U���i#���F�VI��rO�<WC��*��2`�����+��^+T��]��a�˛��'��9`c"���&:��G���p����n���j֫n0�z㸫��8$���
��&��sY��QĜd�|x�Q�>T`�4���$���qTt˃9�r~f`?*��ӚGd#h��I�������Fz��P8�ML�b ��,m�[��ޓ<S�$��F�U#9���U�o��2x'����(#�����<���_������.K���W���$�U�֢M�so1��� *�t����Ϲ�\��bs�ƪ�77$TR�P�5�9�rƞ�:=���ms�i=�S\�jv/'��{�ȶ��;�DNLHq�"���N��,�O\��;�$nS��~>��k[����3�T��]�6�ǡ�� ���y��\�p���2^�g�U�uahZN\�į�T��FA'8<�SD�6�A8�֩�)����*+���՛��h���ű��.98��Iy���H���1�w7v?�5s��t�����]�O<j{����梟���{9ş�?�K[[Z[F��Gӭz-ԋo�ȫ�~8����x{M��r#A���j������7���J�3�9�9����R�0�瑂�Wg;��;:eY��8�����M3ZFO���t�T��O1�2���ⵤ� wc���Κ̄���	q�O����' gp�Fp{�j��rx�Csޝ�\��c�@L���9>���H�
�H�w���$����V���N��?�+x��mJ�(�;ۣiԀ����NҮ7B	<KN��z�w'��CmU��S��	lT�#g�C��Ϫ���]��w+t�*��!�9�@�� )�>�ۙx*z}+�Q�ϳ�������?�Z������1}jX�mc��q����μMT#w�}��#�v?�Zu��Inei%8�ϯ��Е�?:�a�������}�( a}++U&-:x��Z�mN P�8���Z�ܟ�������=Y��<����6�k����������Oܗ2y�#|Ĝ Z�<&Yt�Q��r�	��{���=�~hU��Ã�W]d�<ʿ͋;���=��#88��8�U����E$#����u��;#����;���V5܆[Ie�B�G�5�)��#��:9,�il\��F���+��Wi���H;}Nk�զ)m)��x��b9�<�$��ӚuM
ց��,��Fq�Y�����n�~ձ�2 �]�a#B9�� U���$iCV����S�GnG���R2Ͱzf�uy#�yc��u*��)�sD�zJ��Oĝ�=�}V�ԍ��3��&$��^� �`�Hh��G��U85��*��^��V�L��M����S�A�G����SM(��Taܧ���"��a-l��;�(��<�ե��9������9��%+nà�1�=���+{i)�6��1�<�grI<`�*����zz�Iw.����9G�>�u-B̚�-$�N �~��˪,�ZX\�.A=T����:ǉ�-_̔9���7�
=Iɫ\y:|��E���n7�B� ��-CR7Α��%袮2�W��e�V��� ��]i�m�?y̛�A�?�|ld29�z�����MǄ�d\�Ry��k��f=qQ��aSI߹V�v���F/�i�aZ7��� <q�̈-9�+���E����1�������ʹͳ��+  �����Zѷb�8� Ȫ�/u\���j�lY*��y �4ٛlg8O_� UC��X~5��N;׊��~�9'J�[�U�H�����ΰ[%�%q�k���XU��H�N�d��参<?/��[�iP��u:�nN��X� _��	ѣ���X�_4�J	~J�^�/�q�M�.�o\!0J9t�5�t[��n
מ5b����(ʜ�ft�#���
����E��d��Z�w:i���i�����5����Y���s]4Y[������e�h����ɯ*��&��A^z��[�$/pmܼ�㚚4�f�Wk�<�>ܣis��@���I%���0�E��x��'R
Mj+8��=^i��'�S��i�h�"�n#����p����H��?
�{�S���k4x��G���J����W����|�O�iL�uC��;c��2���`?�Ȭb����=YB��K붲##�^;
ڹu6���Mb!�^�-S1��.�p	�?�j�81�+1�� JԵ}��z֘�t'&V��}\�
��# ~5��~��l�R���[�%���,27��Ԝ�[�w����;W��s���9��}@������ܬ85����mغPN�L�M���j��ж�X���$����38�jh�a��C��|�}N��&��� ���e�c����]JC-̎;�5���Q�&���]���R[�=�_�k�	rX����h�B��n�Ֆ�6/�����ǥf#|���R��Lj�4N� �=�mn06�"����@��w!���ZՏ:�ǁ��gcr;��sNy|�0k=e ��jq(h�:��p���·4\["i
�I��� `]d?���;���`D��]�,O־	�`p��^��/|d�k�*�E���Ճ?��8 �sN��4�8��*M����r�Z��~؝^H��Q�W+�\�u���DT� �2x��o�cy=��,%^t�%� �����df�y"�+�J�q�X�7�<ꖥ.Tq���e�Z`�����W�鷫sg &pz��y�:���zv�5��b\�znW��������I
��a��ƕ7k[�笞��:��� UY=>nՓ�ȀZ;�k��F=N�`#�~u�#���T֥�
��y��$0��oC(E�\���#�^������k{�Is��9�]�n��es�h�(=Ol�|��g��H0�r�� ��R����U��Lg8a�����T�gve4���u�#g��Yr� /S���j�� �+!p�A��PG~�NU�ΉId�`��{t������B���П½��˳9�Dچʗ^�s��p~�R���f��63R��7��[�7��9 �ҹ�kP��|�y&��ި��Δ�}�5��	E��.ݱ��QQ]x�U�ۚ������p
�U�'�'hA۱�ܕͯ(����0db�>�oYܬ�|�{՛���
i�0NaC��X���w��>�I8B*�
MhR��s���v��e⿇v���{�8'�G\O���x���,�|˵��>
�m�y�l�co �z���3_~�� ��"�O���og���򫎄�g�}�������Př,�!R���}�<W�<Dp)���.���|����r�gA,�S��O���K{V,��\q�޽�E�dh�.H2��R� |zW9�xUl��Y5
�Q5n��+��ڿ�K�'�`v�?ָ(�l�P����֫yp��.ei]���$7%Wk���6C�N7|ےj)��r�PF\��rY��]�h�؊��qm�T.A4D؄ئ�J�固H�~��� A�b7�9�Ӑ���m=m�B���NI{&� �5kTa'�=
9
�9��k����|A�G�]6���̟��z~J3_Z˵�&�����,�!\���䓻Ѩ?��ח���������b�0�Q{�}?������N�z�	�ӽkh���NU_�OB;��9a��l��\gq�ֺ]P��	,3��Px��ի��xM��z䘊�p��f.� ����^��g�
b�T)9 ���V��1l&h��a�8�Ep:�®�a�V���M�7V��Ί��Z
j�L�+�>���sEE$�ZGE ��'�y���J���3��2G��I�%����� �5�~
X�P��I|�$o^q��_��~5�Ҽmݖ�f��I��$fu�^��A������q�i���� �;G�`���S�OP�i��f��T��яOj��]fЭ��4d��b��>�c����t�iI'�0H�n���b�h�GW$3ӭr�%��b�In1�P@aW�(���-��!�&T�͜���\�ԗ3<:�� �n-��� `F{�{Vr��X�+��O��6i��� )a�k����ܬ���ҺW���6���3�\��n��)HUU,{^n#D�3�������z�ͯ�c��yw$��׷\@
����
���K�O��#��^C���I�KEe�c�2O��f��'��]z�]�����VS���$��"�z8�4���Àއ5��cR������T�uݞ��?֡�u�t;/.C�y�p��8μ{S嶖>�1��z����(�o&o-@h��^+���\��qe�?:�+�Mu�_�9
�&�5�!�z�oIُ��ȧ�֙��Qw�v�'�|A������\Z��ʿ��k��4�5fe	8���ᯊ�3�O������,NK<jG���è5�|9sb�&�o��k�� �>.�|�&��jWe�� �Kw*H�#�ƽ������ؖb��XP0eQ��~�������\��k����}�v����W�;O����-�/(z���kN�\]����H��������Ϯi��=��QL��,���	5¨����>ӭ��6�r�aq�O���J�^a *	<}k������KoY2��+�#a�bjkO���P�j�t�� vd'��\������3��p�
�g85�^Φ�c��K�p���4'�����F�,
�:!�-�Q�Z X�Q�P*��c�e�9��o�:t,ŧ�Q�y5�\|m�t��v��;7�°��4k{Fǫ������A�#T� ��׉��!��t9�l���Ѣ��9��u�=++Ɵ�����g-ơ8���`��`��j�����T���ɠ[��; ���r@�z�Cڧ9��*RQ�՞��/A�xkg�!i�ǒ���^(�]���@�Z��d���xw�|{g�V��!�
#'��ӎ�C�����@"<�9�_)&&�nG�^�ݺ�l4"�I][�=�ǿ,��b��ȒD�������Z���.'$�����S��5wf���c�����R+�0��Rw�>W0ƬM�MZ(\�=�)�q@8��^ǂ�p'
��T8�[
�E�#���:���m�&�3�]�ϱ������V��i�(e�A�ƛ�ҳ(�H��]��iz�g�^�Š��sK�b���KC�"�Q�AqW��-�L��n�T����s�O*V_�j�x�Zq����7/�5�OQdC-I��\�5�����1�f��^�j@i@q^Э$��NC)���F#H��Rn�V�F��#��˻rY�M,hwp֙�J�x�WB"�{�Ј�~��<��#Hź�f���	3���gd7g͌��� g�R���T�2@>����k	��Ӂ�A�j�rQ�O>�^�	(����","","","false","Hired","","","Verified","Inactive","1","�PNG
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
INSERT INTO login_credentials VALUES("2018-00002","Dina L. Pineza","123","Student","student_id/dina_1626678903.jpg","","","false","","","","Verified","Active","1","","1");
INSERT INTO login_credentials VALUES("2018-00002","Dina L. Pineza","123","Student","","","","false","","","","Verified","Active","1","","1");
INSERT INTO login_credentials VALUES("2018-00001","Jane L. Doe","123456789","Student","student_id/dina_1626678903.jpg","","","false","Hired","","","Verified","Inactive","1","","0");
INSERT INTO login_credentials VALUES("2018-00155","Jizter Dave M. Bonza","$2y$10$7Azs54xi/ILpQN0FBK3vluDoXKPu3wrg66P7Hlm/ss78T0CUn1zrm","Student","%PDF-1.5
%����
1 0 obj
<</Type/Catalog/Pages 2 0 R/Lang(en-PH) /StructTreeRoot 69 0 R/MarkInfo<</Marked true>>>>
endobj
2 0 obj
<</Type/Pages/Count 1/Kids[ 3 0 R] >>
endobj
3 0 obj
<</Type/Page/Parent 2 0 R/Resources<</Font<</F1 5 0 R/F2 9 0 R/F3 11 0 R/F4 13 0 R/F5 15 0 R/F6 20 0 R/F7 22 0 R/F8 53 0 R/F9 58 0 R>>/ExtGState<</GS7 7 0 R/GS8 8 0 R>>/XObject<</Image27 27 0 R/Image29 29 0 R/Image31 31 0 R/Image33 33 0 R/Image35 35 0 R/Image37 37 0 R/Image39 39 0 R/Image41 41 0 R/Image43 43 0 R/Image45 45 0 R/Image47 47 0 R/Image49 49 0 R/Image51 51 0 R/Image60 60 0 R/Image62 62 0 R/Image64 64 0 R/Image66 66 0 R>>/ProcSet[/PDF/Text/ImageB/ImageC/ImageI] >>/MediaBox[ 0 0 595.32 841.92] /Contents 4 0 R/Group<</Type/Group/S/Transparency/CS/DeviceRGB>>/Tabs/S/StructParents 0>>
endobj
4 0 obj
<</Filter/FlateDecode/Length 3812>>
stream
x��\\�o7�n��?JE��Mnp�4�\"n�ؽ�!���~dɕ��_3�]k�%��j��d_���Ǚ�؛���ャC&����;<`���.�O^2�la�V,����ο�a�ݝwg�;o~�LJ.;������L+��\\!�dg��؇SϮ�����Bu�aw�����~��y/�ew��?>`����Ǚb2<aKϥa�in�E�T\\�:����=3*�7c3Z�����Xj����t��ׯ��M��X�3vr��7S�wsww3�ӣY	o�_��\0�5F���$��IR����Jq͜1ܛ{(4�<x<�F$INL��˱���\0Hϧ��j\\�J�aG�����per�g���������#�<Y�u�g�4O����j|�����Wx���kh_��R^����n�F��B�+)���`d��{����Z7�&n��\"pvw�
��~���=my�z[K���[#W� s��@�״耖�d�
���ϣwXk�Es���\"+�i��W���X8Aci�1me,7q_�zp�0
��TW����T���R�ݒ�\0Lq��%Q�ô��mN�m�nXF0q����hj喅�t���\"�@g7�-���H�#x���ٻE6k����b���fv��(+� $^��������#
��ނ�KR���p�.�ނ���NF��[،^{��7U�r!�ؔU�
��0�U�j�h��Nq��K�
,�b��$�	\'���2�(|��营u<V��&L��/n���a�|�-%޼���1��YX��S^I.��Ë�����۫��IZ�G���:�i쾽�S���3|t:�p���@����*	^��V
�*A{
#)�|����v	E��+�pg���3��������S�F_7��N��O׃��&���͆�	�
endstream
endobj
5 0 obj
<</Type/Font/Subtype/TrueType/Name/F1/BaseFont/ABCDEE+Calibri/Encoding/WinAnsiEncoding/FontDescriptor 6 0 R/FirstChar 32/LastChar 116/Widths 189 0 R>>
endobj
6 0 obj
<</Type/FontDescriptor/FontName/ABCDEE+Calibri/Flags 32/ItalicAngle 0/Ascent 750/Descent -250/CapHeight 750/AvgWidth 521/MaxWidth 1743/FontWeight 400/XHeight 250/StemV 52/FontBBox[ -503 -250 1240 750] /FontFile2 190 0 R>>
endobj
7 0 obj
<</Type/ExtGState/BM/Normal/ca 1>>
endobj
8 0 obj
<</Type/ExtGState/BM/Normal/CA 1>>
endobj
9 0 obj
<</Type/Font/Subtype/TrueType/Name/F2/BaseFont/ArialMT/Encoding/WinAnsiEncoding/FontDescriptor 10 0 R/FirstChar 32/LastChar 122/Widths 191 0 R>>
endobj
10 0 obj
<</Type/FontDescriptor/FontName/ArialMT/Flags 32/ItalicAngle 0/Ascent 905/Descent -210/CapHeight 728/AvgWidth 441/MaxWidth 2665/FontWeight 400/XHeight 250/Leading 33/StemV 44/FontBBox[ -665 -210 2000 728] >>
endobj
11 0 obj
<</Type/Font/Subtype/TrueType/Name/F3/BaseFont/Arial-ItalicMT/Encoding/WinAnsiEncoding/FontDescriptor 12 0 R/FirstChar 32/LastChar 121/Widths 192 0 R>>
endobj
12 0 obj
<</Type/FontDescriptor/FontName/Arial-ItalicMT/Flags 32/ItalicAngle -12/Ascent 905/Descent -208/CapHeight 728/AvgWidth 441/MaxWidth 1876/FontWeight 400/XHeight 250/Leading 33/StemV 44/FontBBox[ -517 -208 1359 728] >>
endobj
13 0 obj
<</Type/Font/Subtype/TrueType/Name/F4/BaseFont/Arial-BoldMT/Encoding/WinAnsiEncoding/FontDescriptor 14 0 R/FirstChar 32/LastChar 89/Widths 196 0 R>>
endobj
14 0 obj
<</Type/FontDescriptor/FontName/Arial-BoldMT/Flags 32/ItalicAngle 0/Ascent 905/Descent -210/CapHeight 728/AvgWidth 479/MaxWidth 2628/FontWeight 700/XHeight 250/Leading 33/StemV 47/FontBBox[ -628 -210 2000 728] >>
endobj
15 0 obj
<</Type/Font/Subtype/Type0/BaseFont/ABCDEE+MicrosoftSansSerif/Encoding/Identity-H/DescendantFonts 16 0 R/ToUnicode 197 0 R>>
endobj
16 0 obj
[ 17 0 R] 
endobj
17 0 obj
<</BaseFont/ABCDEE+MicrosoftSansSerif/Subtype/CIDFontType2/Type/Font/CIDToGIDMap/Identity/DW 1000/CIDSystemInfo 18 0 R/FontDescriptor 19 0 R/W 199 0 R>>
endobj
18 0 obj
<</Ordering(Identity) /Registry(Adobe) /Supplement 0>>
endobj
19 0 obj
<</Type/FontDescriptor/FontName/ABCDEE+MicrosoftSansSerif/Flags 32/ItalicAngle 0/Ascent 922/Descent -210/CapHeight 728/AvgWidth 440/MaxWidth 2053/FontWeight 400/XHeight 250/StemV 44/FontBBox[ -580 -210 1473 728] /FontFile2 198 0 R>>
endobj
20 0 obj
<</Type/Font/Subtype/TrueType/Name/F6/BaseFont/ABCDEE+MicrosoftSansSerif/Encoding/WinAnsiEncoding/FontDescriptor 21 0 R/FirstChar 32/LastChar 32/Widths 200 0 R>>
endobj
21 0 obj
<</Type/FontDescriptor/FontName/ABCDEE+MicrosoftSansSerif/Flags 32/ItalicAngle 0/Ascent 922/Descent -210/CapHeight 728/AvgWidth 440/MaxWidth 2053/FontWeight 400/XHeight 250/StemV 44/FontBBox[ -580 -210 1473 728] /FontFile2 198 0 R>>
endobj
22 0 obj
<</Type/Font/Subtype/Type0/BaseFont/Arial-BoldMT/Encoding/Identity-H/DescendantFonts 23 0 R/ToUnicode 193 0 R>>
endobj
23 0 obj
[ 24 0 R] 
endobj
24 0 obj
<</BaseFont/Arial-BoldMT/Subtype/CIDFontType2/Type/Font/CIDToGIDMap/Identity/DW 1000/CIDSystemInfo 25 0 R/FontDescriptor 26 0 R/W 195 0 R>>
endobj
25 0 obj
<</Ordering(Identity) /Registry(Adobe) /Supplement 0>>
endobj
26 0 obj
<</Type/FontDescriptor/FontName/Arial-BoldMT/Flags 32/ItalicAngle 0/Ascent 905/Descent -210/CapHeight 728/AvgWidth 479/MaxWidth 2628/FontWeight 700/XHeight 250/Leading 33/StemV 47/FontBBox[ -628 -210 2000 728] /FontFile2 194 0 R>>
endobj
27 0 obj
<</Type/XObject/Subtype/Image/Width 242/Height 242/ColorSpace/DeviceRGB/BitsPerComponent 8/Interpolate false/SMask 28 0 R/Filter/FlateDecode/Length 41997>>
stream
x��]xTU�~g�	$�CO  ��Xuq)�b��l���vQA@@D���b�Ŋ���i3���{Of2	���;3�rg2�ts�����{��{�{��~�\0]��u����\\��@
�
sٞr���#4a�HKH���\'��SB�Ո��|m�԰궷*`�9�,�&�eȻ�Mc=�~��C��Zg��������,��m\0C���%Ĝ��X�k��(hv�D���R��Cu(�Z(�I=�.I�\\�͕��[�/T~D��x�r�?p�P�h|���
єM���\\���f��O\0���-u�4ϴX�:�*���K��p}-t�h���#��5�]�;�.X�	���Q_�B���cQ���H(V
q�ˑحc�>�~�q]:���?;7
j˥�v�3\"	rM��Z@wC��J
n����/G�IBi���G�1���{\09S�=���g\\����U���H���;lZ�8h�����	u=,�\'���\'��3n\"#$���/Y��D�j����,Y����W�5��(^c7I�A��S]N������Ƴ�b��B�u7���u��H�ƃ8�x	��Dy�����|��[��h<F��0z��+���3_d���g	��\0$#)i��7�[����P�of��r�\'%T7�d��S<
}tEt���=�����n�E���Q0cy u2��ͅ�o9g␐#t���d�\"Y�J���T��x({�W���LY����Ц������j5+��йEӭ������\"�ì/+~T�]��h���5;�oD��m��,��xd�A��x�C���O�/[��jT좃nn��4����Q��\"|E�BVt\'��\\��G��:�<�E������w�.M�	`�P�4~m�(7��o
��\\���ۉb�K��AM���s2��W\\�j���-֨N�D�Ǆ�k-���)�&]��f�V ��>���Hpu�o���vG���?:���P�$�+��D�d�B�](y��x���{�4^��
D{�t˞j@�1�I%tȘ�N�8���[� �{7�������>!��m�F�������3\\\\Z�/6�!�v�Sz��]R%��
�������
�Șb}����\\E�����;I�ο�����@_�]f���\\�	��7�:��1Yܘ���9����R��ː3ʠߥM����Cڌ��������8��4[M��M[��u_A�O>��t�xKeˍ��V�+�n�Ȑv�B�G����s��0RrF&��2MF��CH�DW�Q�a�\"hC��!Aa��	KUo��R[SS�w-bS�+Դ���� �t�7i����>K��OQ����@��H��W���`�6ƻ���Fb Ek���A�j�������i=R�t+�IQr�x�\"qMS~�I���Z2�h�
;�(�Q�:����j`���D��X��1��t�F�#�/�Q�O��ZkLޙ�\'THcOr����.�$}
��A��$��YB�ڍ�|M����bd~�)���0���+12nDc
��93܌`�9�PhiKOpB����H���\'���&�\"EF�FG�3�R���ۦː��F$Y����+���\"�-0�~�a�h4�$���r
D���P&ya5����99�g�M�Be���6�y	�Ewp�^$u#�]�6�}�S^���髢%��C�%bm�\\O���J!�m�]���d�J��U��7�ǿ��ֱ�P�PlTB#���-$-����d�P��y}.�nu�|)%	>�ly��wi:(Q���ZH8�W�P�DG���g�䲿E���̻��5���\'�F�R�Z��*�ӑ�#寓3�\\(�*�����VQ�y�d�w�8.Er}gc��l.�uN�xoq
���lu(�D�\'��@�)�yw�	%z��!�.�&;N
Q�_�Gt8�w\0��
��3�M�.uG	6�dzQ�v\'��ty� o{�}���e.o6�~�_!�1��Rla͗����8��)`tg���i^̥�2���h<J�t=aOm�\\�N��TͺX���M���+�Q��^���Z�eJ�qG�@d
d+ŸƐ�͕��1���͇����R�PL�^��H�����LNR���LR@��(�J�@�(D��@R_�Jj�r�-�� qd�=��f\'YZ,����\\�n ׉ꦄ�;/H�i���K|1�V0Ѓ���a?>@�so(=��BZ\0#�x9{\0X���7���.U�_�9j�	�u�i�<I2((�G��O�N��X�*��CH�:�;��4ųQ��؎���~��f�z��C:�hD������(i�ǰ�S85G�
,���O��~x����\'�����z�!�4�$�r��/.r	�H(���3#��b��k�e����r<�.��4���T��Mf:Ă�Ia)H��g\\��;I��<�.C���\03F��G^����q�8�͝��Д<�gQ�1����\"6z���SB2՜1��L�]���@��ȧ(kcf��gW�
�9wtW���uN�:��b�4��P�&�0�k���{HjKJ$�O
�U��Lcp�Ќ�EC�oi�r�}�W�z
��;��E��H���D�mdǓ�b�Lp�6T�����;ב�/�5߫.�.d�ʅ9@�x��{�7Aޟ�@�ٸH(zm&�-�){�TUk/��B�U2�x���=,I}=�d�s�Ɯ9�juHII�ڵ��E��1���QY���_��3��	�lt�~�m/3Q��R9��Qc��\0[ND�H�v���ȲdP7\\�1
㎼%lwґ��ͯ�<X&�׼�/g�8���\0�u�є�TML���
j�~��!7JK3J���1��<OAt�J-)}\"�v�yJ[�^�dz�C�a��Z623��맸�j�%�}rr�[Z�Roh��Sݤ����ѯ_�0c5jTqq���O=��P�CCC����ッEEQ�K�����u���Ia�������T����>��rhne�}�}l�9ܷ�0%_4�Q~�- I��Q��X�o�>�f1�Q����İ�~�r���❹�=H�)�x�q�B�_Hn;��$?��6���Z��#�9��rj��~e
h��߅fj�H��c�a��h����v��[{�B�̙h����$���M���W_}�m�޽���oll���j���O?�>߳g�/� ��ի����.�=��f��=}[�(%���c��Q;��̑�\'�/�WA�y�߿=N���U�����ۄy�a#�(x�*�4P�8/����B�\"� �ߑv��t�������>����W���;Iq^��^c�\'�gQ9D]<h�Q���
o�8��&�$;�V���+�q���o�Dw�6��զщ��F��UoA�{�8���%��mW3������cB!dK�i��9g1�z@E	ת�����Ợd� ^EV9�|�̚�x2��
mi��%�������]T{z\"+���ϥ�D<��q���&�v7&`�T�k�g�rSqr½��������rs!�c��ؿ.D��E{O�O�(Y�\'��2ԀR��*L<�
%����0*w��:�1��E�]4E�� =P��t%-m���\\��(~*���B����7�e=c��%Y?6p���\0��ם;��b#Y�\'�+)���ݮ��m�V��rr�����
�8�vQ-�wx�[�M����o��m�4ϴ��3g�;�I������>���#����Xho�c�Y�z�T(=)f`���)�&����i\'��am2�
=��d�̙޽{+W��s���J�WUE�T���s�0�^��CK��d���.Un�$OAͷ���=-F*�կS�d�&�en�
��C�C�o\"��{,fjA<:���j
�s��^�)S<4�>�a�\"�gi��󽃂[����Q�8��׎Q}�Mnii�[��*#d�����~
SN�➙��E�#$���:��<������J�>L��ۙ�/r\0E\\�9e�B�\"�n���6C��\"�bs5�&�7�1����,a@�
�h5�<C�u�:T�A�ӕ�M�g�p��0)9�lg���΂k_Ds���n�O	i�������o����<��C���m//���V�ɓ=�q��T��(v�H,]L�Y�������~w��=y���UƮJk5rs#V,���*��L��ĖH�r��(�(2�+�Б�uY|�3��F�1$�T�:]�m�TwȐ_�o�bDR?�v9*w�����ݺ����IT�N[���G��ȼ�v�Q�[(#w��(���/����՜�}(���%��h�/��4.��|��s��;��G:��!yy�=F�����EE�&>+�[�;q�GNN��?�-�����j//<���PB���M����--�$�����{��رnb9x0��ձ:`�ۂr�\'��J�ܹ^�}ز7�-��ol-;kn���+8�ݱP3��?D̤d%�=�,��P���oQR^+q����X�����߹E�S�{R�?EkH!.gZ
�B�^*�O�)*P�5%m��3ANRF��KR4����㥸O�Xif�X��;�BL��y�ThII$�
�����{者���}G�tq�b(��ȯ�vZ���؎�1�J�r2j5�`2�S�{]!�z�B���\\��<M��������ߧ��X���t��YP@%}�-[	�(�A������~��d-)���Dj��Q\"SYD��y��-{z����۹��v��m��&NpS(1�rW����֭=\'Mr��ؼ��1�>�� �^A\"z�L�-[z��a��;�-��xx��ΝN݌8l�T�N��|cKώ���;�w��fM71��>=؃s��w��f�-�=OTB�����锿�f%b��e�l���9�?c�Ϙ}s[B�J:~�� �r������ڵ�l�XPB*��>��X�:�H����d$�{T�ţ�Y=�.��SY��g��XM}�9�k�^������������>ι���y�\\���=���G�>��BE�P���mm�@��[�N��ӟ�\"U��1�R�@�<ڃ�d�����k/0����I���)������)�ք�~���K�#�z�ry���\"�Za_Nʾ�{_���8o��\"���
��[�㍖�)g�b�F��SkF�<$
糸.��k�M�T��j�h��J�ٯ_���o����y�/=z����C���r�l5G���ȾѤ�f�!�Wm�}n`o�.�dS1���y�)(��QI�n��.��sn�Z�[v	��ƓH�h�I
�Tv�G�s��է����;_�Ϊ�x^�|�:\"�ۀ
�IF;q��t���/!W����<V;�����u.A��q��
�A��-v�:�6K�N�=�\'b��g+�@����%�1�׀�(�b �����W�Z���*\0>�|���{h�ը�����|��Z��˒������193UA�;���D��6��ZI�kCH\'�q���PV��	�j�q��΄����/�LU戴�ԁ�G��IY>	�+��$���h�e5F������	�W.�:ŴT��P�d��Ȍ�p����������}��eff\"����𰴴��V�Z�g|]����lD��͛�j��
\\��^I�Z�Ʈ0p*��7 m���T,���|iU=v$�C��Sje����)��`�B|3�e�#���D��}C�<Us|�!Ne����\\mT�e��;y�G�����-XJ�h�U8/0c�,��\0��-\"8�ܹ��Ejq����C�ZX(������d���Z��͎?�����d���wQ-�#7�皗��[��3�)�Z�#�2aa�YD�����VU��C�TV
n:�d��4�g�\\�C�kJ��CH�����C�{I\"jV%Q�]#��H�FPV\0���0A��I%4]!��9T����t8�zK�p�>����<�G�.����r���Q5�jWȮŐ�;Ԩ޺u+�jqB)^���� �~�^D�Z������6��;Z�8H	�� ��&C��+��� E�>@o�O�D�Y��?FDB�j�{^ �~2�sJ� ��2��H�����[�^-^�B�z�2�n�\'ng\'�����ө������Z2Y�
\\k��
�k�}�\'��M��~��a�f͌A�Td/%%�СC����|uQ-�u-5\'�C��\"�r�J���r!�)�R)̸��9�]ٔ_[���!s7GB�I��r�����D�\0���qDo�C�(���-�
��CI$D���t��pq*��O7�P�4�d���gk?}JJ��!�ھ*o����C�jS�������vqq�#Ii�q�Ϳx�bLL��&D�;�k{ʟ�*�&�4��f�+�$�4���@�HJ�Le�%�}��������7L��$�D�
�hq �gV|*���!��!�xA�W8�J�է;X����pGCa\0䞅wH�	� �#�y�߇ ��4ȻE��c:Sn��yMJn��1������-�W{�5�jgg�푍A��R��ŋ����f�P\\Ȱz������g�Z�CI�Oh4��B�)���+ơ����q�� �(�!�	I��ߖZ���p�R�W~u ��L�.��M]�!����䠠-֩��텠��@�M��FH�;w�Q�F�@,yT
P��d1�C������Q��ơ�����V��N�w���O=4��=�sJnơ�Z�g$��h9�#�L��Z7o޴����A�H�[�h!��ƣ�_^�>|��X_͠z!���#�\0\'�=����4>6b5G=�i�� ]������b+�	�0�_nTWv>�D��-g�WQ��������v��yyy	�:oo�.]����*��9a��\"Ӣzu�q��J�;Im���I�J^���P�o� ��ͫ�9N�x���xUØ%�J�:�3�V[����A���Nխ5Q=���j�h�N��;v�v�:��y��m�`�+�j{��A�oZT�䂺Z����T�B���u����w�7�̣����Pm=R+-M��k+]��{��I�5T3*�*Bu({�kg��?��	8�&��SѼǜ�F�;-G��m��˗�����
ûPR���5��#�������x� �8��}��
��O>2dȱc�N�O��3gζm�L����Ւ�����OHy�q(b�w��k���j�ِ�B����� �gI�:�+(�.r��������̜��b�j�q�����Ӯz\"�`���U!]T��>����D�sD.�?s��޽{BZ]��p��8�ۘacc��~��z
!ig�<Q��V�hQ�aBs�*E?�:����f�_�Y\\���F��T��Bu���=�Q�����\\��ɩyӦ�\'�f͚�l��hѢE+�7�_���
]�r���o0�uݓ@Fu�w��-))Y�d�c
�5��u��\'�$-�&��X��a/�:�֧��\\��;~���� �BB�nP�:(Th�(kI��}�Z%�u6�&�a�!r�6*�5�os!�	xu��ޣ�$��ok�q�缾�P�D�MT��C���fH��=<<���ޫ�E���b�ܹ�~�����k�+V�0\0�G�z晼6n��E8�%.�-��aWԁ \'�h)�C�B����9_s�~sBi�RH��m{�o\"9�Ճ�OI�8�2�]�����<�V�rI�Z(o�i�k\0��<=��-m�������#Ӄ�|�����8М޿�S�N�\0��@[:f��&Lعsg͢�{��iii/��\\A\'W�`p���� y2�%� ae������A�V�| @B��]甛s��ލ� ~*<Y�+�I�G�1Ԗ�3⌦ �F�R�����]����%�\"BUZ�c��G��DF�a���-�K@6�EKII9w�\\������莁�m���[����G;L��{/E��}{Wq���Q=k֬o��F*ɿ
��ѣ����ɫ��*\\ۓ~G�b��t0a/C�`H�N����l*�&~[J���sT��0��E�@}�j4�sqb�������~ H\'��*�+M�j��meЪ5|�9,Z�\'C�.Ц
�{�ꕛ��nݺ���K)xT
�2��gϞ^^^&��ҋꍔ4椯T����5�������K�	l�̈��;\"S�u`-C�+[u4�G�([��1�60O
E�]�Gs�I�q�v��˩�����FQWV��ep��~��v(ktk���ĚT7�/E��ݻW������t� ��4!`�>rr��pp�?���O�u����a�=��nn ��v��������iٲ����Qݮ]����
���P���e��3Tt
�x���Y^^^pppÆ���f
����spE6ĨFD�C�6rVSG8�\\	ǎm@M�K���b�Nփ�ǋ�X���t����������_�\'�޽��
@E��#��>\"Nb\0�yy�^�2���bF9�NNNgϞE�jcc�k׮J�� aaa��
���L5�|=�K�C���^���
���(+>��_%�H ��\\g�C��ϕՋ��kmzP���O{�.�K0��,���S}
���2�Vď��4kV9\\�ݿ_�C.]�D5Z�M��K�E���PLA{Z�<x� �W����g�E�aT�c��ubb�������F/�M����8R\'�Ʈ�9�a9qcPMɱ���%�� �_i*�}�$�r���>� �wyS6�[c��SM�� ��9R���������{���w�娦���T���Ñ#��������;[[{{{��֫WO��b��|��}���0�B��{ ����C�1��5�r�l���H$>��޽{뮛f �vz��tr�g͋C�B�}����� \"\"\"EB|���݁��ʞ�/V��T��
^�L���\\�S
�q��G�b�+5Q���Z}����f��	n��:5oƶ��kr������O�V�BBBB���h�׮��n���ѣ�\"honnʷĨF&��ʌ&�d�R8p�^_�vmaa!rc]
)�L��!�Gx�3sd��쳐4JR��͊PM����f���(9F�kP�2Ғ4|�!�!dfl?�ԩ�_�Ŋ�#������m
����&�K4/�c�g���	<���օk�4��<D`�͚�Ç�0�An�0A;�; @~�6mZVV���_۶mu�Gr��8Wr�
��Z�?��յK�.K�.�
����	m.�,[l\"bP�N����3��d��aT+�G̻B�X��]˩E��r�	��O�֛��S�~ia\09����t����t�5�+�
���^ 2S]��vx`Y`*�E�@����L�B앪�>��@8q�6C�{{äIʷ5n�;wh9�֖\"�#F�HII���kڴ)rx]|���#9�#��Z�j%H�F�\0W�����_(YN�/�\0�ּ��-���T�����ʙwr�!�
3�Z��<��!qhm5��VP�H�M�M�{Uԇ��t0�!���~o���I���5���Qg��M��`}|���%�p3#G����˜o�q�F|v#�E�:t(	_~Z��˗���Cd�Y\0�2Rp���區��p���T|�j�@�n�:,,E�F�����Çǌ���#G���Ri�������Qݓ��qM�ŨP���k�O��j�r�J��U��Pn�Ti��QM1�v�B��C���3%�?J��8S�W���0Q�H#P}�DC�7�8}�c���CN��)��ݻ���?D|N�B<��Ipq��-	�B��@�A�hc����M��p�
�A�,+++��#��7o��Fʁ�
hTa��H��J�:�kok$R�����m�ջ�Q�wJ�C7�4�q��o�V\'B����*���iPݸ�2;��
EZ-SΜ��sG���v��
a�U��. �v��=d��LsL?��7l��$���2��r>�`a6�2��sH�P]�F#QČ\"�	J��+�1͓/��.I��	�mȂ� �)�x��<u���jjT��Tj�H>~�8�h��gff��XY��%cE��T��Q�.
[�F#{�Fj��y;B�����޽CCC�#0�,+-5YAyue:���\"_Bu��i�T�A֎�
y���bej�/��lJE

jޤɷ�|���)8���y��TIzD���2�6Bܠ�H�W�
�z}�L;iJH���\0»C��Һ�V�@L�k�Ȱ$Q�4ׯ����9s�|����al�\\]a�TZ(���#��B3�D�
4J��ijT���ꯣ��\01���;ԙ�>|y׋�O�2���2|�@�SƵ\0�$��+m�ĸBQ(�.>�B$ډ7P{k�]M�R%T#�˸}ll,��Bl_�v�S�NHt�`#��9uJ�� �zO���V����(x\"���@�[�������߿���#g�?F�J�訙BB�_*���&*~�\'���l(�O���K y&$L��A�&�u�b�@Il�jBl-�F��铩To����#{����,��@�2m��\0ά o���Ҩ2������ 11�_U�vjj�a)�;v������+��T6K�\"��� ZyIM%.��oXlD�R��=��uz:���?Oi{���G}��t��1�ڵ�������z!U���)b\\E���� Ӄ������Px��KbIº���)�Vƕ_<�~⩟��y��
Q-���,���S��BI���h����\"o^m̥��Q���F-\0U5�A5�.ݫW�._��MgL�:��������f\'$$�&g�������\\�t	�Q�t��D<z���77e2�z�Q�X*�Q_��\\��5��4��9�r܃:Q�A�xv�<=۵m���.��P���2>`�,-t)̨�KH=ia� �U��I����5b���i���d	����-��
~���QÎ@\'� �?[H��d#Js	�G(y�2@��أ��\"P���߰aC�ͭ��훝���P?�F���S`#b�$-xwL�6
_Ɍ°�%
�6`AV���
.�\\)�r��v�U�)d}2ze�̔���\'�1�����_�z��6a=

3I`�u��A�w3��őt%}���`��F�X�a
����?�0G�����6a$%��z��Q-4�N��W_�v���Cܺ���%�!9�z�*~J�P bѤky��|�iӦ�ڵ��B���B�D��pB<H�+�~
�SA�G⪢͜�y��7\'	�)S`���+�d��������
�Z�������ӧ�>��YD�������ŋ����#%h��^jۖj���WfnX�Bv��m�Yy��v�C��kgGu1M�(�{=z�@^���߱c�i��5P]n^%SO9�	7�޺
���X�}5P�KLd%���� @-���G�i�zӦM���O}�3g��/2�rRk$�hҷmۆ�o޼Y*D�ѯ�k$�
E���/
���#�!�8���o�o�F�1\\����-\0)���ͦ�%n�X��c�,�{C�d���͐2�ހ�:�m���#�A��
\0]�v���ע���Ȯ?~,4�X�f���MZZ�kٲe�)ww=�w##�ń��h��3E�
��#Uǀ�Y]�.�L��T�ɍ7�4s)TWv�0)��F�/?!mA�I]�>%��i�:j���Cpc���E$�*�ւc�\":A�e��W$PI���.��l4T\07J&��T�Ʊo�>�!���x�>}Z�h�y������������<����߉\'��F~���\"���%50�^^ �k��
e	��.��(�)����#I����)!7�APN�0a��\\~UgY�FPm*��U�I��ag�GLO��#<_�ӌ�-�R����]�����!��.�(NhLTߍ�E���	�.�]DG_6�zk1Q�D��X�Zz�{�E��Ϧ�B�b� �ATl(��&UT�{W:��������	\"�\"XxtH�=�\'������&��{w7���ɂ�=�x���gٝ��;��~Ϲ�\\s�5������xZZ�N��hG�?nܸ��8�uT��wH�\"�,rsBփ����h�3�f\0L��4A����@U�}{R<�L�\01b��p�Mlv�����8;w\"�_�#���9��\"W��j�ʙ�0�Qst�\\
0��j#���6��a�2��	�4�\"7~�`0dffz�{!�Q�O�>?:q�DY���o=���h��ȫ�v+eɇ}Qmf�A�=�<����AQ=z����;|��j2{6�L\\&���樱S�ܵm@�Nw�W��#EOχ���	d���eV��X�+�N�ZoT;��j+sǵS�����>ʐ�Y	��6H��c�o{��0\"_)�g��ۀ���x��4[�cd������פ�ռ�-Z�Q��5T$\'N�(OL��:u
��}T�n���>�8|�p�l�:b����Z^bb�%��G5|\\������.� I�ڊ��ϝ:u*�yT]����9�������{���\0�SɁP�ݦG���_5�%�G�oi��U2Ó�O�aVKN틇X�@�vP.\\�&
��5�WϽ�|P�H��M�[@�k4������<�\\FE�<��MB@uzz����U��PQ�ZD�}�5��Ƈ�o߾������?��=�\"#�!<�+<l_:T� �w���~�L׮��I~��\"J	r���
C%��oA��x�3���+��5Ld�!�����K)F�1�9HF��	ś!s �K���d�4�����:�O�n}�|�v�S^&S<��c������jSg�a;A����ͼ�tO�@ߤ��g�����EY��hJNNFF�l߾�����ȋ��`bb\"�|c����ϟW
���h^{�{)�p,���}�Xz�z9U��T�/ll�wB�\',X$�P�\"�vi���jW8���T?�F\"��4K�$Br���(�rS�r![�ڗk��h�u6�k�@�F`nN^.�VC5>���L�߭�UAU�ٻw�\'\0�\"J��߿|�r����E�?w�\\�Պ���+6kg��o���V��-�挴�{���Мs�9^�G��M�hc�gO�/΋�������k��q
b����:v��O�|q5�����K|���H9�(v>�%�����\\[�6un�\\�s�Rq��n��:pA�C`l~i�n�;�x���c��� �ӌ�LJ���%k
\"M�cRƿ�D^���i�=zW
��������G}��v9���/���E&O�̽�v�؁�G|<���� ���n�/_��mYY*��Xf3�����C� ��P�=1������H�e<WÌ�Y��Y��T��邙�\'��L�D�]��׿�\0믵a�N4ϰu��!	��(�s)@�t3d߮�\0|�ϵ6�(�@��h�G�z��ŋy,\0wX��?����ɓ�Z�JLL��ŕ?�D}ؔ�A.vÆ����k=���̙3�{U]��ܱD�j�J3f���Y�h�N�N�:!���4~Hۂ��b�2:��{��߈�j�ԩ�{SV.mV�Cy�%��d��7��;S�w�.�L���C�m���OY��rrسl�j�>�ԷPp�_=q�w�����8h\0�:7t����)[BGȾ��Q�˪�(��d���٩�&OB�/��#3����1��5M�j|(�N��Pː�r�J�����H{�����=r�}���������Q��qA��п��͛��gT9�q<����}(W�
T�B������O�kᬉ��������Ą���k+05�fIT���꒒�B(�cY�j�(֏��*u�q�1��i��6x���WQ��m��T�UcTm�r�hR\0U�QP������	.ԪM�P�*��2?���m�t��@d��P��O�T�6���W���á�
!U�%vD;8_�01���HH�K)�� �Q�?~���W��A��tE���5k��[o�C��e�
�:���l���1��iW�J�=!�t
իxr.��+qz�ZЖ��>�,���曌�P<�h�v�ғr��*?e�x��V�,�z*\\�<�����|�
��v�1�
U��A��b�CI��-�Ge��.�
\0��Aj[@	�V�R�!�V�ŲB@�B�=��R�i�p��.--m��L�bBBƏϏ��lV�UA��#�H�Q��׫V�
�E}�ʡH�G�$m5ǭ[)%�<�74��k���ز�2LK����**<*.�s��:l�F>!�&!o��+��8�x�Kd�aAA߸I�n��^��ę
���i��9�sS(ZU_��K�1�D���Y��[�ՙ�����������	Q�HK��>`���}�\"��s�̑�Mdn�˯��%	�	�)�k���8D�X�Q���&��xd��+&�6��l(��\0ApMނ���,qIxx8O�7m+��5ʰGǿ������0����0�l����մ�֒)�F5�ɟ8���]����<�ĚB=�S wT�m��SE�^��%���N	��!P�O\"��9�_�����`���4�����&03+�Q
���=^�ױ�y枖Ԙ�e�EK(�i��B�1S/�
���Q�șI&5ճ�k��mC�R�������[ȸQ�ƨc�`9(o*_��?�\"L�|�y�{a!����ۥ�����$�*�r��C��z�\\�����p���M$�w�q��n 1��B r���)�%�Сx��b\"{��%��:\"��i��.r�Q��+�{��_��Bi,r؎��sv�Jq^x���^��;�.9hРa�2��?1����
m����ڈ��=�;J�}	�^��֢(S�>?�Z~]��y\0�,�
��m�@�C��PȺ�/i?�_�ڀ�(�E)q�W~�������L�zS!������й�a�Q�=��5泧Ȭ�
5�@Zw��V
����P�
J�C�Ȼ�o��AT(�,$L�:țI�i\0�?�J���։p��Zr;��!��A�V_Y��A�\"J�.Wqb��@E\"�,�GV0B�\\�c�IӁ�^9�FV����2�bU���M�����\"�(++��;d��F����7n�8`@$�w�m����y�V�����B��<���x��rp�L�v����t�c�V������=g��
�ж�����I���E� 94�����$v��W~���i}�����C��PȺɤGH�?��QR���d�Q YI՘��&�]}��			(��4Q�ꪫp���Ƣ��ѣG�ߩu��)..�ꫯ�ٳ\'N=|�KLL\\��;�F%��*����1���[^ኜ;�d��C�t�*�$�Z��g�K�G/�����/z��Ϯ����_\0��u�T��j|��>QT����;�n�	�*�M�>[����*���޲�O�E��o�|&5m�$�o�����͛��G�>��:]p�o�F�>��Uꙍ:
E
��� ���Go�n�R�¨���e��kv�x}Ҧ\0i}4�o�pE�t�F�Ź�VR��e3mG�s>��Pc��W`詶���;��d�@�f�M��|�ݨG�F=��~���w<	#�h�A�g[�
n���\\�.�,XDŚ�,�Wꍔ�i�v]2�4�X��\"�J =�!\'���)T���_]�7M�X��Z����8�
����{�]� �5[%���IH�S̯eb���g�#�m�,	2�Y~z���/���8��g+`�
|F\0��O��l�@�H��f�_P�Z*�բ�=o��)���^\0�]����V!Fo�zk��FG7��{��#�:��n�zG_��U+t0�#�B�A���v<	�:��������Q謷���{�Q�fz�+:����B=#���4���1G2��{�A3C-S�.�绲��O�_�£X������GA�^ź�p*�������.lS�Ê�C����!��J�*���rm�ۂ.��g)�՟C�
��xX�cp�l�a�I���,�xf�+N�o�oJM�5<n�.}����g0F���C�d�\\�҄پ�ʷ�Cu���1G�+���p�ɝI^�Qay&͢/؎�X�}L})�5\"{�+`
��3�\'�B��P�J6B�ȝ��!?��;@�od̶��J����;��>�Vf!�$�\0B�^��;�7�@=�I�Ju�Kwܜ협+>�/�*G狳����s���B0��Zz�M\0--(�far��X�xO��H�81G�&�ъ
mM�8�b�oN��4.�i�{�\'k�� ����_\\�n�� I��y �\'M�z?�%P0c ���J��n!,;MR`�$Q����x�Q�R2T�3�f�I�G\"��?R2ድ��79P��2�_�v��������}ד�]XO���,@�γ�do�l��	��F�qy��X�\\f�n�u43�#�/E)t��3�K�7ʝ�8��
]LB�Nm�����m
R�.<��&��9;��g�\\ko�T6C�%s���Tz�\\Z^�ľ��]W�|�D�*�$���v�P&�:?�t>b�JBγ� ����.���T��W�L��p]h����`݃�\0,�V���:��?C�T)�:�+%��X=æ��5\\��?k�3��d{�}H���L���vg���R�w�#*��e�y|3��ؖ%��5�0���sz��9��gmǘ#V9�/!��w�OcT}Ό�P�V#{�;�����`.��RV�?*m\"�d)�����)I���s(p/����,�&�D��4��υ��~ׅ䡠����\\�ۂuB3��2��Zk���cM����J|��]�ڃ5��[k�T9�9GK�����G�LG�L�;0�q{��m5#�4ڃ��Ӆ�����ڟ��VI�1]����Z!T+�Ey�
�f�d{�T����ak�+eRT*ͅ�d{���Z{��g�_���*���@�l�b�1��_�{���-��v��~Y�|�B�s��8��sc����W5�Yk��֮,�n���B�Y[�Ӷ�Z[+�Ms��-
�eb����}I�:��Yj>��)ޛ���<�p�	e�xm��������5G]z��<�_ų����W�Tu A�N��F	��[
B�!�\"/ؠ�c�(�ܫ�fP[JT��5�F?�Ç�xWЖ���i��J��I��:7�8Q	���b�7׳%�,�l-v1g��K4��7�96�K	�\\�tѕH��O��\"is�s]���Lz�Do��IwIc��%�JRW��%�mَ�{x���I�9�1�@|�/�V�:�,��;��8�X��Jp���R��E���mF�\'3x���u�)���8y�H��@�k���C�٣���pO��x)
]�>K�w�U��\"�Q[��o^=t5P�8�/��IT���d��f�\"��w�M���4s��;��
��y��bB�?�o}�S����Yκs��(8�w�2���C�>u,�Iߒ�>��)J�_j���pr��!��|�o��]�̼��i�z�m˫�=��P���HV�Q*J�XcR���75��f�xa��P�\0�>w���l{s��J���E�pЪ+tDZ�G��i��j��48�k$�]@<Ym��3���
��V+%V:�vn�t�V�|���?_�|���Y��@��j�J\'���c��!9�&��IhedVJW��������o�J��,��I��PhY�ŅMpXDDe�}dSA������]g࢈ޫ��upƋ�(�U�+����i��M�6MۤK����|�;�OҤ�ڦ
���0ꄺ�L���[�\'3l���I�>����p4\0���f��w\'T#@34�@5����=���q�=S`{���yk���B����x4�߄���/v�zUXhq�t�i�a�
:�9�S�6;��빉7O2p�st\\��K���R,��S��R5\\��cv�%yd����u*��5�O؄���8������r��faK�x���%�0�S��@-w���S�/(fW�s��2�,,,���3M�4#όܙ~������K%l���D��2���Ŷf^�޼�Ø}�O	�r�
�
=��y�DIژp��9��ݢ8/*�CU���H�
���s;L��r�ژ��t���~Q!ϴ�[˅���?���s�$7����v4ps�ܢ\"~�I�W,�/n6��Թ�kh��h��p=kwM+�k��.U�t�%%O{�;�i�v���aĔTE�$��E�\\m?�
뻔ץiDp$���12s�x]D��1�^!����L9�
z��.\0ȿ4�:����|�����Y��$��\"1FsJ �45�k�0��8B�c��hh�<��9TA�����ȂAQ�k�r���\"�����a��`�8X�W��/x�0��
��q���T����a/��f��P)/��I�g}�\\piN�64��9��$�
����D�	ر�E����E��Rݺ���s0vNvY�䮖�k\"di��AJ&���lJ��-��ddC��0l2\\�n[�^�՛a�K�������-���oú7���^�5�����
��$�j������Q-�a�Y�j��0�vF��!\'��x�+�49���h���r����6A�R�t~�����4ԙC@�m˼ا�1�73޸�;
�����0�=��mY
�᜻�����6 X���W��f�����a�i2z�%�]$��T�p�v&I~D���)�z홈U��@#<7��NBçP8 :UD:��@?l�b�Om7�wpge��D6uZˈ^sf��8_��������t
.�~	��T���ĮPC=�O�KM�^A�b�^��8�P,D�:����S\"��c��������_\'(\0�\0���d��*:7�F�m�1=�T���~�N@�#`^	�+Aד��F�B0��4��A�b���ڌ�#���G�S�x5[>�>H�\'�,�#`&�)���g��Q��������A���xK�-�G�p��7��?A�*�=���~�	�N�:�U	*(�ct��z�v[:mIA�����]Џ�e`�
���0
��r�]��͎�S�R��Ӫ\'^�t��\"�F��,�͢+��yo�P��$�����fY�bֶů�a:45B�3��F��
���ev˪aM_�%���t3�p��7�B���
�t��:ۭ�d:s~���ɭ�(��|��^��C�y��\\/3�<�$@\"��IF�_�Z����;t���#9\0��}S+
LJ���\0�\'�#�)�)x���%�͔E�ݍS�DC���xW��4x���>A���	:#���O�
j�άε4�eIue4����]�E��G\0���s������
�Ņ�:�MSc��D̓h��:\0NP���
endstream
endobj
28 0 obj
<</Type/XObject/Subtype/Image/Width 242/Height 242/ColorSpace/DeviceGray/Matte[ 0 0 0] /BitsPerComponent 8/Interpolate false/Filter/FlateDecode/Length 2491>>
stream
x��{PT����+��ՄcmQBcl���BAMBg����4�Q;AHk\'�b;M3f&����4
,�w�˺��޽�s���s������{�y��9MB��ع�W���C�0�tx	_��h[I�[�휝����ߖ�l۴�AtR���;t��ԍa^W�^9~������#�!z碑�=6QW/l��
��+´��s �֍���*�B�!,!��E�����Ԥo���N�.�W��2V���#Bdƞ�F�����J-��>q���a��n;��\0�?����N�
��5���k\"(�l��u�VM�V������85�и��h~F-S錟c�/B��9�l
��-�?�.%/��?C[�0r$����C~��]O�7d\'�N�8�p19�����EH8�����D��B�	S���p>|7K[ˋ�}Mٷ5�fy�
�߆V��@�*�n��.l�Լ˩<b�X���NC�W��H��!�\0Gi	�N����6*ޡ�F���U
���ܬ��e�?Գ��;*W8�:�J�.K84_CK-�8\'o�1�	:�z>��c|:.�7e���r3$�����i\\��<�:*&��%�{\0��u�$�\'���
���V�T$�[ y:Q��`��ǒ�I�7��d��í-~�AG\"M���KL�[N����A\"�S�������I��[N|\'�s����gR�+�44��%�
^�K����kC�Zj\'�{�
���0~�S�4)�@h1㋊��Ah���j��j��:U�=j4���xl�ь�i���3i�>���3i�>���3i�>���cM1�񵧌fܐ�P
��3�y/�奔�VG�F(�:MJ�����z�p�;����&Nc�
�h�\\ʐ^��3��x{�J���ʌ,�͝���괰3/d8u#]J�!!�-����28�q�OӜ����Ov�W�NK���ж�3���p��^�f�+�+���^	��M��D?��/��{����&�9���V�
endstream
endobj
29 0 obj
<</Type/XObject/Subtype/Image/Width 10/Height 40/ColorSpace/DeviceRGB/BitsPerComponent 8/Interpolate false/SMask 30 0 R/Filter/FlateDecode/Length 18>>
stream
x�c`�`���\0�\0
endstream
endobj
30 0 obj
<</Type/XObject/Subtype/Image/Width 10/Height 40/ColorSpace/DeviceGray/Matte[ 0 0 0] /BitsPerComponent 8/Interpolate false/Filter/FlateDecode/Length 14>>
stream
x�c`�	\0\0�\0
endstream
endobj
31 0 obj
<</Type/XObject/Subtype/Image/Width 201/Height 40/ColorSpace/DeviceRGB/BitsPerComponent 8/Interpolate false/SMask 32 0 R/Filter/FlateDecode/Length 46>>
stream
x���1\0\0\0 �Om�\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0x^8\0
endstream
endobj
32 0 obj
<</Type/XObject/Subtype/Image/Width 201/Height 40/ColorSpace/DeviceGray/Matte[ 0 0 0] /BitsPerComponent 8/Interpolate false/Filter/FlateDecode/Length 31>>
stream
x����\0\0\0\0à�S_�\0U\0\0\0\0\0\0\0�h\0
endstream
endobj
33 0 obj
<</Type/XObject/Subtype/Image/Width 10/Height 40/ColorSpace/DeviceRGB/BitsPerComponent 8/Interpolate false/SMask 34 0 R/Filter/FlateDecode/Length 18>>
stream
x�c`�`���\0�\0
endstream
endobj
34 0 obj
<</Type/XObject/Subtype/Image/Width 10/Height 40/ColorSpace/DeviceGray/Matte[ 0 0 0] /BitsPerComponent 8/Interpolate false/Filter/FlateDecode/Length 14>>
stream
x�c`�	\0\0�\0
endstream
endobj
35 0 obj
<</Type/XObject/Subtype/Image/Width 100/Height 40/ColorSpace/DeviceRGB/BitsPerComponent 8/Interpolate false/SMask 36 0 R/Filter/FlateDecode/Length 34>>
stream
x���1\0\0\0 �Om�\0\0\0\0\0\0\0\0\0\0\0�o.�\0
endstream
endobj
36 0 obj
<</Type/XObject/Subtype/Image/Width 100/Height 40/ColorSpace/DeviceGray/Matte[ 0 0 0] /BitsPerComponent 8/Interpolate false/Filter/FlateDecode/Length 27>>
stream
x���1\0\0\0 �Om�\0\0\0���\0
endstream
endobj
37 0 obj
<</Type/XObject/Subtype/Image/Width 373/Height 37/ColorSpace/DeviceRGB/BitsPerComponent 8/Interpolate false/SMask 38 0 R/Filter/FlateDecode/Length 63>>
stream
x���1\0\0\0 �Om�\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0n��\0
endstream
endobj
38 0 obj
<</Type/XObject/Subtype/Image/Width 373/Height 37/ColorSpace/DeviceGray/Matte[ 0 0 0] /BitsPerComponent 8/Interpolate false/Filter/FlateDecode/Length 36>>
stream
x���1\0\0\0 �Om�\0\0\0\0\0\0\0\0\0\0\0\0\0�5�\0
endstream
endobj
39 0 obj
<</Type/XObject/Subtype/Image/Width 9/Height 37/ColorSpace/DeviceRGB/BitsPerComponent 8/Interpolate false/SMask 40 0 R/Filter/FlateDecode/Length 17>>
stream
x�c`�`s\0\0�\0
endstream
endobj
40 0 obj
<</Type/XObject/Subtype/Image/Width 9/Height 37/ColorSpace/DeviceGray/Matte[ 0 0 0] /BitsPerComponent 8/Interpolate false/Filter/FlateDecode/Length 13>>
stream
x�c`T\0M\0
endstream
endobj
41 0 obj
<</Type/XObject/Subtype/Image/Width 9/Height 37/ColorSpace/DeviceRGB/BitsPerComponent 8/Interpolate false/SMask 42 0 R/Filter/FlateDecode/Length 17>>
stream
x�c`�`s\0\0�\0
endstream
endobj
42 0 obj
<</Type/XObject/Subtype/Image/Width 9/Height 37/ColorSpace/DeviceGray/Matte[ 0 0 0] /BitsPerComponent 8/Interpolate false/Filter/FlateDecode/Length 13>>
stream
x�c`T\0M\0
endstream
endobj
43 0 obj
<</Type/XObject/Subtype/Image/Width 343/Height 37/ColorSpace/DeviceRGB/BitsPerComponent 8/Interpolate false/SMask 44 0 R/Filter/FlateDecode/Length 60>>
stream
x���1\0\0\0 �Om
endstream
endobj
44 0 obj
<</Type/XObject/Subtype/Image/Width 343/Height 37/ColorSpace/DeviceGray/Matte[ 0 0 0] /BitsPerComponent 8/Interpolate false/Filter/FlateDecode/Length 35>>
stream
x���1\0\0\0 �Om�\0\0\0\0\0\0\0\0\0\0\0\08
endstream
endobj
45 0 obj
<</Type/XObject/Subtype/Image/Width 9/Height 37/ColorSpace/DeviceRGB/BitsPerComponent 8/Interpolate false/SMask 46 0 R/Filter/FlateDecode/Length 17>>
stream
x�c`�`s\0\0�\0
endstream
endobj
46 0 obj
<</Type/XObject/Subtype/Image/Width 9/Height 37/ColorSpace/DeviceGray/Matte[ 0 0 0] /BitsPerComponent 8/Interpolate false/Filter/FlateDecode/Length 13>>
stream
x�c`T\0M\0
endstream
endobj
47 0 obj
<</Type/XObject/Subtype/Image/Width 84/Height 37/ColorSpace/DeviceRGB/BitsPerComponent 8/Interpolate false/SMask 48 0 R/Filter/FlateDecode/Length 32>>
stream
x����\0\0\0\0à�S�U\0\0\0\0\0\0\0\0|$l\0
endstream
endobj
48 0 obj
<</Type/XObject/Subtype/Image/Width 84/Height 37/ColorSpace/DeviceGray/Matte[ 0 0 0] /BitsPerComponent 8/Interpolate false/Filter/FlateDecode/Length 25>>
stream
x���1\0\0\0 �O�i	�\0\0\0n$\0
endstream
endobj
49 0 obj
<</Type/XObject/Subtype/Image/Width 313/Height 37/ColorSpace/DeviceRGB/BitsPerComponent 8/Interpolate false/SMask 50 0 R/Filter/FlateDecode/Length 57>>
stream
x���
endstream
endobj
50 0 obj
<</Type/XObject/Subtype/Image/Width 313/Height 37/ColorSpace/DeviceGray/Matte[ 0 0 0] /BitsPerComponent 8/Interpolate false/Filter/FlateDecode/Length 33>>
stream
x���\0\0\0� ��nH@\0\0\0\0\0\0\0\0\0\0-=\0
endstream
endobj
51 0 obj
<</Type/XObject/Subtype/Image/Width 9/Height 37/ColorSpace/DeviceRGB/BitsPerComponent 8/Interpolate false/SMask 52 0 R/Filter/FlateDecode/Length 17>>
stream
x�c`�`s\0\0�\0
endstream
endobj
52 0 obj
<</Type/XObject/Subtype/Image/Width 9/Height 37/ColorSpace/DeviceGray/Matte[ 0 0 0] /BitsPerComponent 8/Interpolate false/Filter/FlateDecode/Length 13>>
stream
x�c`T\0M\0
endstream
endobj
53 0 obj
<</Type/Font/Subtype/Type0/BaseFont/ABCDEE+SegoeUISymbol/Encoding/Identity-H/DescendantFonts 54 0 R/ToUnicode 201 0 R>>
endobj
54 0 obj
[ 55 0 R] 
endobj
55 0 obj
<</BaseFont/ABCDEE+SegoeUISymbol/Subtype/CIDFontType2/Type/Font/CIDToGIDMap/Identity/DW 1000/CIDSystemInfo 56 0 R/FontDescriptor 57 0 R/W 203 0 R>>
endobj
56 0 obj
<</Ordering(Identity) /Registry(Adobe) /Supplement 0>>
endobj
57 0 obj
<</Type/FontDescriptor/FontName/ABCDEE+SegoeUISymbol/Flags 32/ItalicAngle 0/Ascent 1079/Descent -210/CapHeight 728/AvgWidth 705/MaxWidth 2475/FontWeight 400/XHeight 250/StemV 70/FontBBox[ -513 -210 1961 728] /FontFile2 202 0 R>>
endobj
58 0 obj
<</Type/Font/Subtype/TrueType/Name/F9/BaseFont/ABCDEE+Calibri-Bold/Encoding/WinAnsiEncoding/FontDescriptor 59 0 R/FirstChar 32/LastChar 32/Widths 204 0 R>>
endobj
59 0 obj
<</Type/FontDescriptor/FontName/ABCDEE+Calibri-Bold/Flags 32/ItalicAngle 0/Ascent 750/Descent -250/CapHeight 750/AvgWidth 536/MaxWidth 1781/FontWeight 700/XHeight 250/StemV 53/FontBBox[ -519 -250 1263 750] /FontFile2 205 0 R>>
endobj
60 0 obj
<</Type/XObject/Subtype/Image/Width 249/Height 68/ColorSpace/DeviceRGB/BitsPerComponent 8/Interpolate false/SMask 61 0 R/Filter/FlateDecode/Length 3728>>
stream
x����r�`�^g�r�dy���v�+v�%)*1e�I
�L��Lnc><W�6�G�H���fC��P���ge,���Y1J,O!�v���
��C���Bu�OP��`�x�bG��wr�IgHUN��,@�����
�q,7c�&T�ߐ��:��Imx�h|ɿ%ͥe��\\�p�|�p3�tO����u��ށ#s��U8��b�B#1��_�pw�}Q �ƣ���TT�tPyIٸ��5e���
��o}���6���p%�6�ωX����#�O\'2�鉉�����X���@��%��Fϑe\0YB֞�P=����qB�l>Z�g8��e��)���ySTzyW$��RY�ܳ��x�:��r����4D��8l��k�V�Ԍ����C]6��SMl���.5�YDJf�!��͍�tg����i%Ls.�@^c�yΏ����ۈ��m�6�;5�99��HVMw곶��6�g���_��ϗ�����sL\"u@VĹi��1�d�\\��H��8p&��m��n*��.�!�f�Y}ʰldf�Ӥ��O�@��a�����w��CkW4����`o2�@�Cѥv���g4��ՠ��bH�,��<�&�w���J���U.�Y�zL�V�4O$�ؘ�)�eQ�Z�\0W�X�V!�lc��1\\%���r�T�0�h\0>�]�b0S�y|����ծ��ꖧ�ܼO3T	�OUn3S�g0�
��V	���O��x��܍��TUZ�4j�ޤ��`M�\"T���m�DCq��(ђ�\"�M�\\{��k���i%�Xh~ۘy�M)�E���ߊ��l�� �Y@|cC8��2�L��볿�X/��Tz\"~��Ʌ�Yf�2L^��:̸`WG:g͔���L`Ըm1~���n��C��Z����d=�Z\'L��$���+;̪�7qɘ���f���|4��u �����رu*:����Tu����1CMڜl�\"ux�%�/��v�Y9��|�r�`MgL�Sw�l�U�Pzb����n4��	fR��vll=��z�U^�ːْ0��:P-�b�V��\0gp�u�u*�_���zQ�Jll8���Na���oa�F1j|cZA��Wy������y�μ���t�^�4�m��7���o��̌�u�W^S��m#S&	�(��c��7��Ұ�N����n\0��#n�E)M�h�J���׹4�th�<��L|5�-���X�S��vֈ{C�~gyۣ��*˴[�S6J<<�1�7m�X=)+$V#t� /r�1~^I�K����J��mt4�6A���P8��77���i獡�������e��?����\"*i.yߺ��,Z��`u�B(&ܖζ�{V	9t+Qĝ�2��k��h�^��^.�@h��;0�7�u�#Cy��ϖu/�ĝ��v���J�[.jlߺ�0T$`���ͳ�tZs�۠�����$
�!M�����.��g>jbw�2���?˭>[;�Ča�(�k�e�-g������?���X��}K	��?9_.mY�P�`��S�\\g������Y�M|��}���[���_<)����d�N���a�e��#[l �!}��^{�t�XGwr��;���i���kI��LP���bڞ�xx�B���[B.�W�J��V�NV����kIuq�^7Ӧ(y=��%�����d\0��B���c��F���E�c�c�7F���1Y�(�0�j�����d-pwh\'W�y�r��S>�~�Y@�����U������<4���6D
Z��F[��Z���E�ꬢ��ϻa�w~(�9�\0��\\!_�+�Z	��u��C���w������K�g9[&a��O��y`�6�4�[�^%������<\'��t���zK)��U�<x>p갪����^<�hb薁SG��]d�P��o��_�kx������B-��s���D�5�*�d���P�>xN�������(}������sB�9�n��eT*��+V�۽���<
K�%�����
endstream
endobj
61 0 obj
<</Type/XObject/Subtype/Image/Width 249/Height 68/ColorSpace/DeviceGray/Matte[ 0 0 0] /BitsPerComponent 8/Interpolate false/Filter/FlateDecode/Length 3849>>
stream
x��Zy<�����0� �g�!*�r������\"�t ��F�S׶��ձE�r��e�]B�!\"J$af~3C�m�qD���>����~��A ~�~�~�����X\"��mNF\0�W����wÎ�`y�h�32\0����e
+�1�Ӿ���:���6E�wUٗ����$YLNWChH/.\0d����B����m.Y@�9 э�?��s@�{hv�jK2�:���s�<�7o��+�ގ���3�x�NcGGe���op1�I��~{�ivK��`C�pg|�_u�lN��=�w:Xݭ��P�#�t��u��9\'�!��������i�K_�<�э`y�~^�� �h벦�W8�7k�ڙ�[��8�Κ�����-��y\\q�<	AHAfx}�#q�\'H�:m9q�W���O;��\\ۢ/�g�\0ʡ����7�M��}D蚰���� /琂w/��f(���G��C�7�4CoQ�nFf�i݁���)�IYj�B������?�),*L`l\'L��9���q�c=����Mk	TRPȞ���-�7�E8M�ͩ�O�5�r�#�\"�U�y�w���(!i��596C
�4��^M<�hiim��B�-��A�K%|k8N�g���+V,�m(�]��\\��&d�j��lYm���N�ٷ�\\���\\ږ��2�Y��߭���r�������A�fq�F�ލ�u����W�BgO�<��&���;�w�3m�q�[��vWzL/W�V?�5�c0��*��^Z�,\0����m���F�^\0����,/0=�2����uۘچ�����q�����O���lg�w��+����f���wY~�v_�(�&�@+Ow�IOQ�-�YcM^�xwY\0�.��\0�M�:ϥ���=ijij����\"Ccl\"+�M�Kվ4�R]yd���!��0���.s�\"�&�M��),n��=��l�F�M8����Ww.FnYj,!H�O=,/:<]�lQ��9�	KjO�6�����^VE\0*��ܪ��n�,}x�-��q8���|WDu����xa#=��R؜��FBPg!�]V��I�.Wu,�r��x�dm�koY\\s�+�m~����\\˾�� �dH:����Y�Ā����[ޱ6`�)
@�#2�ʩ%3]fjSxV	+�G���z܎g�$����0:Y\\��zE�3/��t��Vvr�%sx�n\0�a�Q�A�7����;��R+�� ��-J��@\0����Q[ߴd[���2˲Y��z�G`|X���xG%��IA�\\u��o��yF�\"�.Hy�����O�p�`uT����%�\0R�6��A�Rٖ�]�?!Z�jѱ?��i�<0�kU�#;w�\0�m/(>���Ֆ�|7a�/����yU��D0^�U��[��í�\0�i�z8�Ix���NNk�6�J|�SN���6{����ބ59������S@Y�����M����%���7�\"���]��������p��}J\0o�XUqx�a�ݺ0Y>-cѥ\'Չ�=��\\�Uf��s-MӤw�dn?���N35�}�*u$�L�B3��e�ŀI|G@�5����s:�yI�vh��g���Av)�ѕ1r�RT�KS�u�E�s*�����ga�T<@6<R��7}�t{�b9���u��{�G�z4#-�0���D��B8�+�*.��7@�k~e�\0)2��zVc��/�pJ�`�����,PMO��[���7և&f�r�7��i.	w�\\i�B��ӓ��2;9g>-�q��:u.��Sc]\0H,�=0Њ�S��&=S����1Dx��Ĕ!v�M\"���-���T)qř���7e��HLa�s��y��fu�>?�,&A�qp�#Ʌ4����r��)�\0!���I�S��؂����Q0 �r�d�&N�\'=u�D~O�~��F�����yՆ��]LZ��()���*+��;[��0@\\]�&I���������w��H���=�T��j�gu�L\\5E��c +&�B���0�Y�_���&������ʒ��S���L�o��97��M5�F!��\'���9I���-��\\mkN�@��\'\\9�PH�ދ�����[�!o�攚�m:G��.M�3�FS;7�5U<M�9�&$d�d^tÓ-��$vդ(�I���t=g�
$��L����1�����Y^��ڍ�|�-�i��F\0��g��E,�;����k��@��W#;�59E�_<p�
���C�4�܆�Nne��lk,�Yk�`�GW���r��.���
���i}}�\0[�-��U@sә󩜃6��<-��<%-?���S�{��6�������|��t>���T���.�zvv�T���Vtr�����3�^�\"Y�p��̯����uv_2#͹�{�ZQB3��ޯ׵�!���+):�=�2��Кn>�xU�{\\��F
0�wH�v���ΊJ��K�iiK�Q��GQ���������UzgB�:&o�6	��)��N�uCOle���#��(�`�{4ER�=����0&�A��+���ݧ��?r�����ԟ�y����ʳ�?�����e��@��!c��a�������E5�
��u���xg�tϚCjG���\\I�{�6�Ӫ\\dɁ5�F\0\0V	�^S7z�Ş����$USC]Wg��Z���,+}[���!f����B/�p�q��g(�o��@KO1_�_u/f�x�ܜ>U�iƤR	ôe�|��>�V\'~���g\\e���X�_~�m�˃�7!8++1*t���h6^2x4�<��C��:�����/�Mb����ܰB�����Gru��f7���I}4,$q�7M �j��C��TU=Z��Ѵ���ݧ!@!�U٩+�Gr��Vq?T����Ð�,�I�T7�,C7�1�8]�?
�[p����J�I����q�������-:��8
endstream
endobj
62 0 obj
<</Type/XObject/Subtype/Image/Width 170/Height 96/ColorSpace/DeviceRGB/BitsPerComponent 8/Interpolate false/SMask 63 0 R/Filter/FlateDecode/Length 1712>>
stream
x��kS�L��r�\"J�/(@��(^���?����>��6Ë	$Y��������f�H(��(��(��(��(��(��(��(��(��������͝����5��(�����L&����^�T��L�\0KH�R|�\00��(fh�Z�ZʹJ8���:����NNN\"�G��l6;�������J�3�;���ٙ�\0���޾��;??��~�H��3X�u����e�R�q��MoZ��F�Z~�0u����S����lV��p�I��F[[[�v�Gd�c9���!fj������Ň��H����摯	�=�(�P�����MK���k>�����LF��E���n?<<
Ӳ(qS*�(ȩ�uZ��A>_^^���Lˢ�M.��FtdA��%����������Q���A�_��	%�%jV\\�9,a��@�X�+�q2�����B�)�)�g�\'ĳ)�����Ly_+�
]U��o��o�D�;)��9�N˫�J�����5{_�ǈN.��}�e?��Otr�qppH�z���t��Ǐ?��RS��l>��/�N�V�f�!�@�XZ�V[�V�����o߾͹N���s�y���c��.ނ:��͑�d��+^6���*kN�����p��
4��xF^|���h6��_WbZ�����O���wTD777OOO�L���9�{�A��O����r��|���A��?�C�Dcr:�h�����Y��%����
Ѧ�^p|�*}�2��#J��$\"�|��ATק�G�j�\\\"d�_X���D��46R`��r��Q7�0�:<���3����H�����ᘷ��Iﺔ� ���Z�������i��<�E��N�]�f�|�
kd2�H}�����
֖y�y�ZC�����\\.���q����.�J�X�M������z���ܸ��?���q��68���^�3(�
(����hd�
endstream
endobj
63 0 obj
<</Type/XObject/Subtype/Image/Width 170/Height 96/ColorSpace/DeviceGray/Matte[ 0 0 0] /BitsPerComponent 8/Interpolate false/Filter/FlateDecode/Length 1804>>
stream
x���SSW��Y��%!�,
3�[�c4<.~��g�h����HS̤=K�3_4㧸e��y��^����G<���x���
�6h�4d��}}	J�F�@Q��,����F�z���t:�B(�=�`�h�r�N�P�:
$G.����ќ��C�̆NPCF3�~��<�z �,�:v3�6��e��u��-�	y\"�62�Z���Ԭ��&���R:���<��Z\'�k�W����݅��AG\'ʣ�ZKu�E0�ɺ]s�������S���RHEB*��6O�������m�ie�`�F��?05
�w�X�L�)e{��{�ЪB��)M���?>	
��Uj�檰\\�`	��H��2u�� �$o5l%cخ4��
R���%#�X���{�Ά��\'�4��4;�S���7�u	�^����~��2��S�;�)��
�sbI}���8ɟ���=�\0J$��qppppppp��ir��
endstream
endobj
64 0 obj
<</Type/XObject/Subtype/Image/Width 172/Height 177/ColorSpace/DeviceRGB/BitsPerComponent 8/Interpolate false/SMask 65 0 R/Filter/FlateDecode/Length 5440>>
stream
x���S[W���VIOۓ���!��	c�	�[�x��K��q�n�Y:ݕ�\'��ɤ�:]5U�L��S3�|߻�,@I$���+�\"K���=���Y,AAAAAAAAAAAAAAD}x}�VW�h
��(��Q���x��$
�X��u����<9��@A��@��Q8q�D��R�@ ��@4��ɬ?=5

�j��xn�ZM�J�]4`�mL$mԇ��=]]��w������S�$U�N���w~a�����@P6\'y^��V������
~�qa�k����j;8@wVWQ�
���b8��1}&ս1&�( �B0
��T��_{�V�D#9,a����vv~m�L��
��h�n�-�R8>��t6�<z�7�P��`�
o[p���o9.�N��Y�~dX_�p��beP�3���t�:<V(40:6�O
u
��0�ߧ,e2�������u�v�����}Ę�.]�R�
� ��ey������	ڠ�7��zܟ�|�޽�t����|�o�4}���D<1�(���Y����{-,\\(MM��a�Зg�>R���#�� �^y���p��{0t+�k׮^���^Y[[[<??P,�����a�̙����\'O��Gu7�Y\0�����Ri��29:��§v���>�O��c:r�~NLLd3��l�}���Ԕ���ţ�\\n�ji7z�==�p\'�`Ȟ��ffO�mҟB4�l���_(����)�nϤ�p�/�
8�u��;h?�4��P�������=����ꊮp�׽�t=�N�J@�8%�?V�dw)�P��Zr��UQ�Hd��f*���|a\0Y��ܬ��F���v2w��!���Ά�>�ե��ܽ�wo&5��״���1~���z���DLO�n���>#F]�7٧��:n>�kv��Q��5PV~�\"��Aͷ%�9}X��*u�i��$�o�ɢ�	��h��X�Ur]��ܕ���H$v����y�ui�k�ʈF�
0���\"
��{�4Kq�L&ӗ�C��g/?���DsD���6e�
���	Dbz��ݗ��b�)L��E���5�V�

�z
�[8`��u�Ʒ�����q⓵�%�����/���:ې��
�>ߧV�m���<�!�S����-�@E�3���T��}4`1!Ϝ>�(��g#���4���gM�FGG}eg�T��|�d�P��4`�g��P8ЕK3�_�gM�ξ\0P����n��d6ކSlZ0d��f/���v�7�=���Y��pF��s|O��?߿��}^/402P���R�|q���t�__�5v=�!$��p�X�T$bl����owkL��P#\"���	�_�`����c����ȡp8��pd7W�L�z�N{j�bD�G�S��U�:Ht%Y�+�
�w�r�d\"��f�����$����j�
��q}(�wϟ����>�b���[�\\.�� ���������
�\\�b}��1�
�Q��\0K<c����-,�K8�y��
ةPU�����@-�|�W=j@��X�>���X���L��Q���\\]z�8g��U6o���pA~��i�^\0���D���	=yd��k2���b�z��E��r���V,��y���X�U]\'&�f��\"���6�
{{�u/��� ��_�����Xl�8�{*����KgҬW8rb���q����q��~�=-��\'�L%~��׻wV��I#������כ�v�NMX�#�v����7��~|���c�á�@�K��>����33}�}Vۆ�Of����\\7�Is�\\,c���#\'Sh�~�������,EUՉR	~��C�W��W)�a
����h�����=i��)�����K�p���=�O$�Ӡ��������p�~�Ku�J�,#*
�V��{�2�l��=3��P�Ν9�0���tqrrj�&F��e{���C��e�T�*{����@�g����d8h��Va���6�ۙŦ�.7�ʌ���l����1G�tض���l��=7MK�&4����7PB��vLI�_�
�P�r������e�=|��	
�Y,40���T/���U�|�e6�mb���
�@����^Ib��{��s�w�����Ej�G����ɓ��W�g�\'�S�ճA��ae����
endstream
endobj
65 0 obj
<</Type/XObject/Subtype/Image/Width 172/Height 177/ColorSpace/DeviceGray/Matte[ 0 0 0] /BitsPerComponent 8/Interpolate false/Filter/FlateDecode/Length 1885>>
stream
x��1v�*��z��uO�E����޽1=�,��``lp�s�7��x��B8��b�X,��b�X,��b�����竗^Բ=���ϋ�^�ش���;��]zU�֯Kw�Z���v�걛;�F�3fU�,�;a
��H��>�so�����Y���^d�ANl變�X��Y��W}��e#ur�սt׏iڼ+�sVSʼ�U���=��>��y���NIXCgpU����C2���_,V�mX������w[�A:`�/�pb�ZxW˚4=h�~�m�����º��P²yjW5��*�����.�E%�ww���.��{�\"��Ǭv~}��?�2���5��O�U�:���J��O���+�X����
���y��]lW���`m����GS��*�H �r[?��b��I��X���c�@�b%ɾ�4�&5�kl�/ΰ.a�\"A),a�>��MTcui�*�����j�\'V�|URM4馬!&�nd�X�O?��_�?`Y1&t�{��BM�\\ҩ�ʜ5��u4maݲ����`;\'�aG��#��p����4)�Zɦ��E_���	|(?�x�&6��0l$w��W���r0�
���[
��}&t\\�I��#XY_V;�ƺ$�f��8M.K7e��ΚC�	c_��
\\�c�]�^X�lF�
��VV�uV���aWw�%.����O�`aˬ��B��Xl���Z�}�J,�-�����$�
+\'L9Z�����E>�|��:?J�j��rU��]�a�72�+��kZe�(��&Վ�$q��+�����s�N�]
��O=�
C�+r2`,{`�u뙥\0L*����`Xww��fӘ���&%��d��\0nT��I��n�M�6��N��9�HM:��x7��F�?҅ݑf��=���
endstream
endobj
66 0 obj
<</Type/XObject/Subtype/Image/Width 47/Height 69/ColorSpace/DeviceRGB/BitsPerComponent 8/Interpolate false/SMask 67 0 R/Filter/FlateDecode/Length 571>>
stream
x��Yۖ� �����R��IA�y�<�t�$c�\\pC�a�;�f��d���Y|�,˺������8G�a$�FD�F���e��D>�d�*w?�b��3I��o��.=�| �l�:���GG��zm�\\���{C�	�þ���Uƹ�YA�
�$�<�Î<J<BN�aY�^��6�B��r����
\\��!�LL� ��MOf�
9ۙI0����%�׆������hx��D��0�
endstream
endobj
67 0 obj
<</Type/XObject/Subtype/Image/Width 47/Height 69/ColorSpace/DeviceGray/Matte[ 0 0 0] /BitsPerComponent 8/Interpolate false/Filter/FlateDecode/Length 1183>>
stream
x�c`�>`������_�����T�l�_E�r����IPn���	ʻ�_�\"^5���Y�W���6	n�����x��K��\"�p�#��HP�u���J�<\"�.��,(s~�Ŭj/6FEI�d���
15�eĩ��V�\0���G*���s��χ�q(�z|B����=t�����fy��-������?��]OOLi=��
n٬��_o�ވ­����`/�tӴ�R����R�*;Ռ%oڲW}xty�.У��:�p+ִ׺����O)0���YE�������0�Y}���EN<;8\0��ȱ���[ݼy����2.�ː�vb*gvГ�ʆ�����/DA������(GrǭG�~]��}1�
���^�S���~o�wxE���WO�_4Pc���`d���!8��~��ڲ��U�6�b(��g�|9�&�����?=:�ڃ����#����x�����V�*r��Ib(w����.m$�������-��Վ���݇���Ͱ9�ߖ�����G[l*��
eU�Û� �m�1A���V�� �p�����!Ĩf`�o���lRn�\0�ޝ�
endstream
endobj
68 0 obj
<</Author(Janine Fabe) /Creator(��\0M\0i\0c\0r\0o\0s\0o\0f\0t\0�\0 \0W\0o\0r\0d\0 \02\00\01\06) /CreationDate(D:20211015182731+08\'00\') /ModDate(D:20211015182731+08\'00\') /Producer(��\0M\0i\0c\0r\0o\0s\0o\0f\0t\0�\0 \0W\0o\0r\0d\0 \02\00\01\06) >>
endobj
75 0 obj
<</Type/ObjStm/N 119/First 1021/Filter/FlateDecode/Length 1812>>
stream
x��Y�n�8}/���.��5�(
d{�K/(��P샚�iP�.{����5��]����Ik8�s9�Pd0�R�+G*EUT!*r���4��Zitc���%��Q:j:�������<Z�V�+�j�:�j�_4��k�՘S�FiRxD��a��Q�N�!�-&�a��\\:,�4l�P�*E��*
��°�y�#��F�oT;�x�+��@\'��p�Ew5�:��m��T[�1�$
J;�ND�=O���\0$ �c�́ ́D(H�v����4k�B��2�DA]���\'�3�!(��cYd4r����9\"�>\0�\09�D@��rmx�W�����p�Y�<�c8���d\\��[)�̰�$
�&3 ���d�r2�9��A(�S:1E��q�b�Wy\0:zj�b�2�`�f��N0���p0}���I9��x\0�|y�\\ʗ��<�^��<��9�pB \\`�����_�%Sa��3N���1X�+6#X�9�x��\0���&���X`>���[�V���X��HXv������:�+��u���	<ȑ�E�#4خ���!с�8B�C�ϰ2D~�x�W�tq�x�xw�]�m7����e{�x�^U����U��ɓ�U^\\^�6mNϔ�sQQ��k���V?|���V�,蜜ow��]�m���Y%cMn��(6k]r	���,���<Ӈ��,Hu����s{�ݑn���_�����ry#��8��1dQl1���c�G7?��V�K�:7�X�]w�Hº#a=���|Zڻ},gnֻ��/��Fp$�l��E����Y������[�������u�������nF\0����x��9>�a-d�����m7�Y�O�^?R��W�	`���X�>�r�[�b\"�$\"�K��MeW�&���$��dy�/���BHfV;c���I��̌��*����4���X��F�c�s�\\67�׍��]o.Zu�H=k��z��}��d�8���G7_*t��Z��T�\0���G2�g7:�a�B�	���zA�|���[����=���/��B#,4�Xh�л��Gӧ��dw=#�&_L��F�h���\06�_���8�_-o����M�R��W��f{yլ$$�}���ِ/�LR+$��Hj�4��葬
�}�h�|��erZ!��GN{?9��gm.��q�*�]�+���	Y)�~:f����J� �U����Jv��sX8倱|�x���	:XGhGY�s:;%�C�C�C��m�r�
�e*�|�[1�IUP�ʬ0�%z��e�\',K=9����F=N(����g���)�A�����=�l6۬Z����:!vMR����خ�d݁<߀���՝�;+MW�]k�uҊ�;�J��]+r����������������[\'�e\'㝌w^Z�	�(��x���ǋ�^��y����^� xA�$W|G۵�\'�#�I�H�GQ�䮎��IbI2KQ��.���E��
�,z�i���z�8]/���Wՙ�lkWI�:\'�]|3����e{��w��Z����
endstream
endobj
189 0 obj
[ 226 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 533 0 0 0 0 0 0 0 0 0 0 0 0 517 0 0 0 487 0 0 0 0 0 0 0 0 0 0 0 0 479 0 423 0 498 0 0 525 230 239 0 0 0 525 527 525 0 349 391 335] 
endobj
190 0 obj
<</Filter/FlateDecode/Length 185526/Length1 553840>>
stream
x��]	xTE�����$�Iw�Y;Iw�I$v�\"i�YBҐ�-!�\";�E@���+:.3���WtpW�P\\��qE�qA����+DG��=���I���:u�nU�[uO��a�1��*(-�루Zf�=�Xʶ�e�I�ތW�b�P^8���oo�l
�>?cj�Ȃ¢���{��65����Ɨ�S�lf�+j��褑������23�Ǣ�9}n|�z;c�c\\��f^�B����������Y�ĵs�����o���_8kޚwԁ�-�͘%kV��,�yp��ho�ո�~C��+��Ɗ��k�]���F�h��rw��oC9�aޒG�\'leL���s���κ�e��b\"�T_�z�]�@��I�W,�i��D�Sh�W����s6/c|�y(�;�z^�M����x���^�.X����6`|M\"~ᢺ�1��$2�� .�)km�����>>#j�7,�Ą=����+^>���Ma����F�vv���ᛏ>�9�3��N��Ux�����V0-�,�md,z\0���V�e�K���������Tb�E�Aa&�D�Eѩ��ֳ}K;Kll��ż��?Gc0ޤd�ou�}��)��\"�����~��
X�oo�������T_�.��/�C��������x�~K�gټS�uu��N,�Zӭ8ޞ��}��&�2��o0�[t���_�]����B�>~���I�0���MK�5��O��*�����d�������u�X�	펰i��zT����������x�h�Tv�g����z?��=�=�%})Ϝد�f%�j���D�rs��ߥ?��*FCq�7�}�/���2e++�x+P��F)mldG�\'��װj>����|��Bċ܇�oQ��F�#_�jx���{�\"d!Y�Ȕ�y�O�U���c���ڟ]�{�!d!Y�B��M���o?g���쩛�.�Zy���ʓ��?5���,d!Y�B���,d!����s�4��f��̐�,d!Y�B���,d!Y�B����O��{�B���,d!Y�B���,d!Y�B���,d!Y�B���,d!Y�B���,d!Y�B���,d!Y��g����{!��lj���$u%(� ӱwP�f.(3��ua�l,���X5�cs�B��m潕�)�R��x]a���ϵk
ѮN�5���g�N�ۿ�^|��;fd��צ���o���F�u����wO�0��軰֝�<�������ʓx*����l�������%�:f��jQߞ��PV�oKa?o��u��2�[�>�O��lr�T����8i�ZI�k�F�1����1���S^���f��
���� S��g{

�Yt6fb��_�n����a���g\'z��C��&��b�2�^j��a����-�rA���D��TRNe��0oNV�_�5�dM�O�4ɚ��U��U�U��e
Oy]��K���{��[���
s;)Z���M�ršV�����CQa��Ҋ⎎�*�&�p�`�P\'􃂚�?JT��i�(���M�3CrǤO��:�e��cLt��E�us�t�	���v�q*b-�F����d������n4���	.?��*��y*<x������Zk�wL�gLIe�v��OI�	%�ϥ���Q-J>���,���Zy�V�(�:��XV{ĸ��k[��.eGׄ>��
���
�f��-��#����|��\"w��j���*j�nko�����6/,�j�}��)�m���uh��X��q��v4�ǔ�@W
���畴x�y���;����++(\\ɯQђ���.�\04�\"��)
.Q=MD���;vzk�ju�C+״q��L��YM�B>+](C���QM��j�2Z��|M��6��*j�g��-E%Y�
�s?b�8k5sw��ω���7��y;��&#�)|M>�\\�u�ף�����WY�jf�_�D�ax
��}R��ߪ���
qz�8<���~����gFl0��=u#��\'�y�7�O>�����m��� Ǝ)gN{M]��������;T��������,����7R�
����j1�+m���5ؗ�C����CX�Dim�~C�<k�M����_�%.Z>�BۯV?��7dP��q����hO���^O�((cc���q���U�\"�y�U5U.zFJ���e� O�|]F��pG���i���pXOt�o�#z�3G�n����k���\0\\����2:-e�VU�b,�ވ���GE7%ml�g�N1h�\'#�����j�ݨ}<�\\��$��`��k37c�q$����Y��d8;��O<̱�U4���O��m:�k����&˩�z�,�9���V\0�N{�\\��U�ݢ��Ҙk�<ڃ7��.�DG��q�j+D�<A;�~2�w
�i��f�Y����f���
7�c[���S\'6MS��|&vtXT�\\�,RԚ���䟟uB��:��7MpUU�����r�ہ�v�#O�T�W��τJ-U�n�8C�R���b�������V_�Q�6����i�k����>ۮX�fy��D
]/2�:�m������Q��^��[[K,���⣦Y$�Ӫ�����fנf�����e�L�«J��\\ڭ�v��E(�
tD�a�\"���ͼ��i����{A��^1����	2D�OB���W�sQ)&�\'V��sJ��X^/�*�h��+e��ۣ�/M�Q3x�wHpu�m�{h�k��~����S�,�9�\'��6�U�d>�
��R�H�,�C�$)�H�\"^�8)b��K#E�6)�RDI)�E
�R�K&�I
�)�R�P�P��R����R��?HqD��R|/�!)���[)���k)�%�WR|)�A)���s)H��J�O)>��c)>��C)�!�R�]����/�{R�+�;R�-�ߤxK�7�xC�ץ�\'�kR�*�^)^��e)^��E)^�b��K��J�OK�OJ��K�[��J��J�K�G�xX���xP���_��R�I�C����.�6)Z�H�\"�_�{��G����*�)��/R�Y�;��C�ۥ�M�?Iq��H�Y����I���A�른N�k��F����J�+��B�˥�L�K��D����H�MR\\(�R4Kq��I�Q�
��D/�H!/�!��D�=K��<M�9�$z��q��D��Ǩ�(�.�G��a���� �D��$j��T��h;�6��@\\(��j!��Kt��D[�����y��B����N����v�ۈ�Dt+�-D��n��n�^n$���\'���Z�k���T���J�+��r��2�K�����.\"�Dt!E^@�f���#�H�![
������	4\"]N�%�#�����F��[h���M<��r����[9h@�V	�Ou���l٠>�;`�����Cԓ���+deQg݉�Qg�D]�2��6�JiD����\\ԋ�(�ڥ%9����i���u:(>`��#�%��ES5��3�(��Bd���\'g���Hd�H=E�ȩ)D��yۣf:�E�8�F�:�>���|���\0_��/�+�}��A��s�\0�����(|||9������߁����~xx忁���\0^��u��v�~����k�p����%��\"�������e��Y�g���~�2���e��	K��q�,�n��+�{x����#���C�3��90/v�o^��	�;�؎�m�k�/\0�\0~�ވ��{\"�t��ʹ5b�sK��]�_�?ww\0�G�p��p+���1�y3�M�77@_���C_ע�k��
�����.E���s^>�yQ�,��۝���\\��;�Us��x��_���-M���վ5[V�\"V�Վ�cV��z��V{�
[����w�.r����Y�Eg��nY��_?�7��;�װe��>��W���W�;�W�[囑;�7}�4���Jߔ-����r�d�O�-�����JsK|������l���[��F��o��[�+��Y�5ٕ�Z�\0�%c$��G�rx�9:t��w�r��QI�$�[T\"���$�M�8Q�Jx!A�&t�.��!���/�u1��n=�X�5��Ɗ�ō-+�8���wm��8OFQT,��u�*�_��
�2��\"��xxxxxx
xxx�
�����
\\\\\\l..\0�����`=��ı�9�?�������c�s���ϱ�9�?�������c�s���ϱ�9�?_��88�\0�3���88�\0�3���88�\0�3���88�\0�3���88�\0�3���88�\0�3���88�\0�3���88�\0�3�c�s���ϱ�9�>�����{�c�s�}��ϱ�9���}���������ŝ3a	3�3ƌ71v���-�6�-fM���6���#�-6�����mfw��0?{�=����d�o��J�<fVw0�a��p��cw\0m��N��Q�ѹ�{ڭퟟ�������cm�h���(/��/~��0^�(�ee#t���K�M��=v�IkP�*�6�McU��e
�ݝ���.�Ť��C=�d	��v�$�LGn��L�-9&�N-�+���.���Lv��������K�½a�.�#2�۔!^+�HO������RݠoF�K[� ����w�mР�AIַI�w�-�]5o�@���Hl��8�v u��6���1` ��{]�ѣ��7��5��N����Ǽu�1i�)�H��g��	]S=	�&u�r/�54.)R��a>
�J 	�.���o��ݱ�x9k�ı�R�_u�E
jt&�@�xҢ�ܑq����Ȳ��\0MC���Z�����,���Y�^�������g��,9}\'�AkWEM\'Y��n�؈��m�C#$N9���Cs������������g>d��+���$_�6/ނTkCx^�
���Tq�2�,V�\"�H��]������j�\"b#��_�r�dw�9m��sm�Y;��eG֥��֓D�r�%[*[����m�x��Ƀ2�$��4���P@��#mRBz�(���f-���M��xlEH��󿂌�V��Mx�
K���T岈3� �u�1MQ��X	��j�X�:����v9�f5�R�t����XǦ��e܍CYg2��ר�1g����\\��Y8
+�x�?S���a\'_����o����3�\'߇\\:n���MNG
��΍�D��ڲ����{#n��Kx�g�I#�hZ̺�d����+F�$�Oq]m�(v�W�Ս��ɪIfm�����H&�E%ta��|gVA�߶��e��C�<ː$�ۚd����P�W�];��/QX��]����*V��G�
N���g������`/ܧ��v��)��Z�\'S@�t9�^�C�3Ļe�F���\0��@+r~`�V��h�F:�BuZϐʲI�>
|�l{�@�Q(��g(~ ��Fj��En�iٶC�Ezlb�X-�1)n+�%�1��k5V�`}����-U ,4l3�~���:^��vmi�ܸay iqL�
�y46*�#�FYz�Wh�\"X��,�\\S3U�]N�W�vtiߞ��ν_��%��ر�?�)9h�;�Wn+l���ȗ>�3��]sU׮�A�[[�
i�*�9C>�a�탫ӛ����5q|����ѦR��>ھ�u�G����ʒȡ���vAk�
\\g��NF�MO�%�{��c�8����:�Jf��Cd�P�P_���x���^;\\T`H7dGx������T)?% �76&�q�x�ʽ�<t�%/ٷK����ӷz[I0���[/�^����ળO����H�㇈���9{L���$�N�`��s\"YT�G�y�,V8E$rQf�ƾO�=8PA���5��L_���b%6�JMP߱��JbZi�ťE�V+J	L+Dٶ�U����]K�
�7A��0�D@<�����Fh�E�
�B4*Mbw�Y��Jx5(�}�1!��%�������4�I��L:�~F��ѱuhK�)$�m��0����ܯ[7.
	�R��[�6����������8�Od�#�z�aٹ��?!�ׄoM
<{��対gC�����?��i`�C�K�[>�*�Ms~e��	���:�4;���{�>>PNw���w*)��p�3n���t��_��~h����C�\'���~�cpw#��(�˘��P��q�G�5�24s@Y�	�1p@���*q �7���h���Fq�9k��s%mr��aJ.�4�UR�R*��ٞil
�duɳ����9/5�H�X��r��D�ω��	B\'��N4k��FZb��Q�2�Ρ�\"���Gr����o
W	����,4��_t9����u�Y!��?��I-ֶ.I��9[�nN�T�oV��>��I-��Q�m2��kl�b�\0�XG��c�?�o8�$�jqƢ�V#�V�$zr�h��K������P�5nf)�b��h�O\'�qs�<�bY9J�W!�X����U���4�B�;W�7n�o�f��[x��n�[���+���ˁDMf�������B�����]`7��S����m��h���;��v�zc�Vz��`�`�;uCo�����o�^5�it�(�M���?�>�������S��Hg�$�Z��Qຈ����!
�dy<?�#
R,�>�zшy>�̗�o]��$fI��7���=���=��-�8�n%�BT�Ɓz\"_�E�W}��.,���[��Z�x�g2�_k�X�.�P*�u�E�h�*Exp�RW�����.��\"��zy�jݼ8�P�*��]K煙�cr�	r�����܁�g��,���Hʲ\")k��,W�H�rVmr*Xqk���,b#Vb��Hp��h��If�MOUaYk٪��Z+l3+3��?[��Ǩ�旣�C���)k�x�}X��M5��5�n\\&%�b�u�\0����XX�Vq0s�ff��?0i2B|
��*��u�����y��M�G1-��<�;���F�6!	�H��J�GR���C8I�zO��(\'�[slp�٠{���3�i��N-c����j��\"A�6LN�\\���0g��8�!k����Nb
z;G0Co�m�mۮ��K�7���\0Q6�\\�b�����Pg%[E_K��lΩp�F�4��E&dI�h`��ɉhyb7�εZ�H֖�;��ኙ��4�t�-K�	v�Ӣ���+�X����#x/1s��H.r[a�nE;��uĜc*U?�.#��)y�Y�\0�=z�g�2�I(�?�)ɚ[ѧA0�\"Nk�n}����4���L��\"S)��Xl��^�^j��GQdh��/r�	/�}�cUX9e>Z)>�V��(X?�<V�M����6�0��Z]�!���X��S���$t����Xk�`�76X]�\\��G��I�Rkе�w�����\"�\\CC)D���4�L8ni(%R����3���B�e4yl���͜�g�FCQ��W6�2`T�O>C|��W�p�OP�b�{��`��g�����[x���h��W���UX�~�,��(r�����x����ڶ�?!^�ic�FAQ
5˪c%�����Ѱ,�\"�A������Ȟ��B#j�A�1Դߺi�u�J�A��QP �����O��4Ow�y��î�b�Z&r���(�Wl��	mą,�G��	.��*WO�b�F�+]���<`��\"���{]����Xʎ�X��dr�����b��W�yr�P��
`_\"�ݦ��>�s���RG#
G�M>CL�Q���%iP$���5�8�bE�
�����>ބ:v�HX4�j��<bd*TZ��kKy9Ű��k
\';������4��G�a�Pڛ��@)A���6�^�Y�Z#��} ��[��rc�]��8��8F�k�O�f	w\"���z��\"ȁ��� �\"��F�ƻ+��]�q�x��f�Y�:;��g~��1�w�1�@�n,5T��X�l��C�-	��Yd�0X�9���#
����oZ�D��p�
�N��i��%�`H��ؠ���o \"6��v-}&7�\\n���9=�1���K=���5���;�*�����g�%�S*��m%��g�,fI�KkK�ӏ�g兹��m�G2��o{?n{����/��`C�%![���L�Y�7���\'I�g�!^d6@�a������|/�~/�-�1�2>G����H*2�0y����a���.+Js����:�=���m*�-����*�ښ\0�m��1
N������S���v�ƞD�rjf�x�ވ{�\"�v9|�L��	���\0�,?Y�쏣�e\'ڤ�@��e U�T��A]j�8y!(�!�3`dU*K��XU*k��YTD#��E����x5�@��}�;j�hlQ�;fW��1��;�m�C�
)�A;_�5�8���1X`� ��׎d7f_�Rά3�Oΐ���O*%�!-n�)Ɂ7���糔V*m�OVQ����dU)+��҄$-Yy[���Z���w{j�N�YL�q%�&JW5,�y]�0vdI����iT�cy{��V����t���*
�-�յ����\0�����N�;B���y�NE�H,o3#��c����9����0�6r*����?�$��=E!L+h����_p�a¹?�Z�C�`8Ae��)�������$�\0�!��Do�O���Np{�^����a���I���j����\0��ş<�۲x�R�<L=���3�՗�����%C�|�@��zqt������D�\"-�Ἅ�~�.@��T����^����MP&�s�G��;{~Z�6LV�u]�]���܍^�!G!1g��N��1�d(�Q�d���\"��UϞ�a��w���`�����]�q�N��Y�A����~�̰o
(���g�����%�����6\\�Ī��@گ�|)���si��:�$���Ӊa�yp�O/���s��.!PFe�����yiP�?�5r_澬].����@��\0���|����<[�m���%0�>��X�fa�������ۗ���B������ι������67�Z�����z~�\0�׃�5��_�_����x%p�E�3��__�X�X�X��C 3�Cxu```�?=��X�X�X�X�X�X�X�X�X�X�X�X���d`�����j�&�Ӏ��\0Ɓ��3�U9�<L�����1�2L=3�\0ӛpz��/a��`��0.0km�)?3S���zf`�m�0݇ӛ�;p��8�{��$��\"x��`zL=����Z|}N�%߁�C3���%_�)?��0u����������W`z��K�ݰ�`��`��ԁ�xfހ�M3�Ӈf~��$\0}��H_�0�t��I�����\'��2���,�u�Y�����W�sXΫ��=\"���f�k�J�o�<��V�P�������!����<XkFΓ���,�)`�}L��ue��>/�u�Y�f���W�%-�U���*���U��5@��#�9`��弖��Mr^°Z;g`v�y	�R^³���,��2����g)/�Y�Kx������g)/�Y�ku6_Q�Kx�[�9�Y�s��:p5��{��m`/����q�^��v����|`^�\\���g[�q+,��㰤T`n������}|T՝����L&���cB��+F^�!�X�7	�$N�g��df�Lf�y�\"F�iD�H#˺H-u]jY�b�4��RJ��R�RJ)��R�Rj]����3��ˣȶ���&���߽�s~��;�s�\\ Q�����+��Bϝ�o5z�-Q��tBۈe��|2��
j	�S��n�
�o�{�I
�3_*��9����h|��\'t��}��3�U)Ơ��_9����?��p�����i#F��ǌz[�܈Wl���U�
��
�K]μ�jWs�ա��]^[�ߥ��;}��������
�9�2���r���oS��^�ϱ���y��3H����A��O�/����=n�ݣp� ��J�8\\
5��p)a��PBm.ev�M�u;\\ޠk�t�W{���t9��8]AG�����+dw{�y�v��9�:�J�:=voz	�[�{��өt�CmJ0�򸔀����`��\\����\0��@0O�	)-.{(p���p�@�#����W��״I{�r��Ko��\0ɠ+���A���=_���U��~�#���J��,�&�t�Z�fw+v��\\�B�ؽĕ�p7��v��Sq�aH��4|^r���AQ��]	�����] �CK�Kv�����h��0W ��j
����l�y!� 5�,��=nH�,OY�C�:�0�P�&+�Mအ
`|:�܎�(�:@�����!�G��y!S&�\'�i%=\\�Z6� �a܃����2�\0�0��4��7h�9AKI�������ٝ���Y� ��>z��
8]�M*����������逸q�����!Z��m`r���j2u��l��>�p����.o^�{���r��y�@�d�M�/�2���\0���E�j��0���?�a^��hh`.y��a��e��RU(����q����Ć�8s��\0=:E`\"���4�+Qh�����yiP�X�#yv�^P���������y%���z��@d&�U�*��R�x\"Z��j���rXg���t���F��<��!O�n�W��T�\'�0��rw�.�?�p�B��a:y��&��p28t���YE���lJ6ix�ш�6_�u|�� ��1.�����,v9B��cH~�\'^1Kq(cK]Q���S�s7��,S��`]�]��k�r4@�C�Ln���z��Ri����+�V*5�J��~nMEe�2����ʼ[u����:���J)�[�<PSW��T�o�V66*�V�fvCmM%ܫ�+��SQS7S)�vu�����L�Nm�
UȻ��l��ͮ��W[ZVS[c[��T���h�U�i��Pj�Քϩ-�*
�*�-����T��.�Y���+�q��UW�-�W
���j����u6+����6�t^Mce�Rj�i����C�4�Т;�vu��jE5\" B�9��#�TT��B_��q�p^����^|���z-�{-`��o����j��ޭ��^�z=p������zE�~E�έ��^�zM��k���w
:�@���	:V��@G?����:�������3���j±(2�tL��c6�X\0:�@Gt<:�[@�бt|t�t�t�z�}ƨu�?�ґ\0:&���@G谂��@�tt��ՠc�x
��!�qYo�2�N0��������]z���{/vw/����o���`�u�n����FI!��l��xs��nAY/�� 	�	lL5����\'bt$FWr�>�L~H�$	F}��\0&UЛE�X��n���[�~z���g
zYQ7��c�A���a�)�Y���()���))2��Э��9�F�+�M�w��i�;��,�Od��:;�P�Q�Q����|w�>�>��-?ڷo�Чt�
ŭ -kiQ���X@����Ԫ�Y�k����B!��X���^M!1$�L\"�Az\0���dy��&�!?�=ԯ���w�(�+w�f�&�����W�f�m��0��|(t/���������߆_�!�W������g�7��*�;�1�nR[�9��sϐ�H?�O�������,$��[�Rؤ?��_<K6�Wȿ���Î@\'��>�ʛ�E��Ep_A�#_#g�E�����Q!%��2z��ң �񀷓B؋<D�!��<O��|��$��#� ��\'����ߝM�Cýp\\��G�Z���N���!���I��I���\"�Sa�y,�H��e�1���Jv�o�\\<@��S���B����\\A��;HK���ە����7�[�]����=O>d��P3�9����$�L&�d��$��K��K5
K`�e#`���+�(��*�=���X��j�X`�x�e����}�C�E���,��,��,�|Xa9Xi��*�t�ߟ�b\0�\'�8%%pjJ:`A��{Sr\0S&ޗ�X�Rx�t�Ҕ2���j��:��`e�B����������{R<t�
N�/`��_i!�I��k`�Mab9bb%�?���X��\'F!A��}��h�)L�)̾뮋�7��?�2��%���\0���s^ w
.r���ɟ	%2
�v�M_��@6^E2��qT ���\"�!w����:�d�@�&k�3d-y���+�~�y#H[>K�Ö}^$_%����3���K7�Q����@ꯋ	7�D��݅؂؊؆�F\\��у؎�E�!�F C�aĥ���;��������\"v#>���q��\'W!>�؋��jħ� >��,�s�k�G\\u����z�7 ���U�YlN������x�Al�b��V���C�	�D�DI���Aj��R��V�ސ�C�	�Τ+ҵ��V���^ս�ҽ�;���7�S����*�\\}��u�ۆ�㆏�Ƙc�brc����,���,7�+��b�b�bW�^2ɦ1�<�S��!�״�4`:f�0N��WWg�sƅ�z�6���w4�L�E�ќn�����ś�����?�9�@�Y�$7�[�7��q���Ą��@���W�JLM,N�%z&~��qRE�-əJ�I�Kڑ�\'�`rF�5�;yW����g�/Z��t�v��ڔE)KSV��e�1jҨ�Q�Q�G
e�d�em�ڙ5�u$�T��l]vJvNvAvE�-ۙ�����ޚ�3{0�H����ctcR���ف救��,�?��/j�Q��sQ���l�_���R�9��������tH���U�߭�����j>w��_�x��f�����4Y�\'F�_���y^����d�������||���9c`�Ż3x>ge�d��_M�|
�m�n�T��j/+Bj�:_���������j��.
;�U�X+5}���C��A�>���&3k�|��0��fԟ��{�>,r:��7
�\"Gmd����1����g�q��8Ͻ��:?Pp�^1~�O?����S^�~�j5�������ȝq��Wh9�W�_���C��|�w4�3�i�f����$5~��k�}����K=K/����WY��\0�\"+	������)^⧞˼�\\^�)ۡ�7f����AAh㔝vq�ln
R��BA�Ai?�l�:�K9e���9e5^0��.䔭�BL���
�1�n!1��lb
�}Z�d
g�s�ʥr9�Si?b�H?ɀ�
R<`*��?�WFD���b�\'&���U�اϭ�~�8���r���ߚ膿\'��V����o�Iv�E��A�{�~r�� ��f+`��p�|�Hb\"X�k�C�@G��C��D�(��|p�|�H`נ�s�C�I�{���!��K��4�+���\0�P�6̦6���N=�i@��C�P�A�z��;G��/�ݡ�#�O����\'��J`��!d�na�0���E�	�#��^�\'��j�a!D�V��s��+d��{��d�pA�@�,�Y�3���� DY/�E3yQL��1UL%_3�L�Q�C���$N\'�Mb��@^Cb��;�2 v�]�]�q�+��=dP|R|�|G��Ȑ���\"���U�7�_��d�T �KR�TA.K5R� J/K/�.�{E��z�0E�һ���V}�P�w��½��>(����p��C�!�l��75����LO�	�%s��R�4޼Y�F�3~����G�׈�Ȣl������R�|�|��(�)�)%����R�<Q�(Y�令�n�ni�<Y�,�����Hir�\\ �˅r�4Z.����X.�2���t)K�!ϐ���D#��e�mr�\\!)r�\\-�.?$?$����S�Cn�[��Mn����vi��}�x�a�ai����D�C�&ɝr�t������+?&?&�-?!?!�ɽr�4Y^-����g�g�{����)�:y�4U���y��^�W� o�o��ʊ\"kW�����ݯ����\"9:�ÈHa�E@@DDYD��$ \"\" �H�$\"9�( 9���4�����?{���|t��߭�{o��n ^�P#�~5J���*E�@)5F���j�e�85ʪ	j�S��$(�&��PAMUS�����A%���ԧ�Sx@}�>��j��

F�+��0^s�a�
}H����>_�c���\'�	�F��\'au�c��+Ƃ�1v�
2CN�
��T�	�`,��,���0f�\\dV�:�{���K�0#�k�2�Ō�F�Q�H4���Fk�}�+�U���]\"��#/>���I�9�a�H/���˄�G^A���!�y��K�/ar�5��#�#&�v�	;G� �@�y����[���v�;G�F�%2�09�6���L��F�%�mrd ��#C���\"�B}������
u����z?�56��A�k|�kB�kb�kR���PהP��P�G��i���C]CP�s��5�tM&]���f��>
��u�
�1^�Ԧ�EiU����:��\"�?A+�?8�9#�p�;_�,�
�(F�-h�tU�+�5=�Ud�Y����\"tmVFT��#���l\'�o*�˨
j�J/_�(i�l�`����W�p�>xXW������֢�l��*j�;��2���h7�+�nuW��Bw3٭h�v����݉v�{<�Fe
�U��}U��*��_)�2�����!&+1و�
�ڢx�/�Gե�eEY��23pt�3#Q��(�Ĉ<�l�J^G4M���i�\\��bv�ϲ���Sxۓ�x�2�ig�3���k�Y,�3���������sʹ�Za=~�=��w놕v*�u�36��f���v6Gp\'���n6�r/��s?��cz���q=�Rql��/�Bg�J~�b�<�a���cm��j���4��f;�/��`,\\v+u;��2���t8/��=�A$0>�oX\'�]e���ˑ�ӄ�������l�ͼ�a����G�n�e��uF9�]�,g����oG�ٽ����v�|xsT����ؿ�M/���̃���/
��=��硏��pp�>c��������x��~��r�lAo�c�4ǎU�Zd9��9D!QB�EQgyC�T��DG���.z�~b �+2н�D1�2�z�$���$��6��`1B���1G��%b�X+��6�G\'�q	X�udM��Ϸm<i�yA�$^��	/Eؔ�&l��6�e	��[��O�
�-yE�V�ak^��-�B؞� |�?�[3K��,3+�l3[���h�a{Z��(�|[��>�U[^�c���+�;+��c؎�e�lȏ6�@��Q�_mS��5EۜC�8/��/��	~ږ<m+~?��<!�C�?��)� ���!���h;�jh����v�5ю���k�ifd�fB;�V/ۂ	T�g�4�ηM������-�^�m����
|2*�j�6�S	����i���Ǆ-�t�\'�\'����-�����L�����?9D��B8߾�0վ�𪝋��W��v�\0ѻ{+���h�������(��(��)�(�)ʓ(���3Rt2Qt2St�Pt�Rt�Qtb):�):9�����Mp\'z��`<Em`6Ȅ��3<�M�]e9û�r��4+��hf�Q�F�
��Le)�l�sɹ�\\q�:ל�.s��7w���;��s�q��ﺳ����sw���;ϝ了[�m�w�����p�G�c�	��{ړ��E<�s=ϋz���^��W�+��zż�^	�>/޻�+��J{e��^9��W���U����ރ�SQ�Tu�ʨ.���ʮr�;1�yhŅ�*��W5�ڷ���w����=X��W�v�ӊ��o5b���e�>���;���l��:o�g��u�%X\'`w9;��,o�Z�����Ηv?�
���+|Mw���=Lu���G��צ:_��|\"���T��Q��Ou���G��7t�a���X�[PU�AU��ʄU��9�%���}#�o�#�P4E3Bq�@q�Nq�M���xR^��ף~�����1��TIu�m�y����,����>w�sgJuQ#�[�W��>g�OW1o�`�hd��!�\\S�����&κ8ۆ��x���YY��9|�<
�J�s5��\\o�2�B&t�_�!Z�%�{�|�s�΢s뼺��O���uI]J������~PW�骺���k�Z��n���Q��G�\'
#�n�,�^?���~�}N?�|�E���~Q��2��%�Y��{�l���ò뾺ˡ����_�=���0�%�{uPmM��Z����.˧�����N�MXA��UT�X1�\0�`�uǟ�}Z�û��,^o���x-p��7�7XO����7�oF�����6x�,φ�����gN>��s�|v�gE>��sF�9���|�%���7�,�M�? ϧ���#���m�&�q�X��i?:��S���\\�bX��`�o���/=�e���ZM����W������EX��?�2�f�Ǩ�7��^���{k���!���Sn�����+���W�]���(�����x��c�6r�6~-��,*=�+3��x~?������/�	�[��3{:Z�����C���_��WC������z��,xK�����M��|J�{�˧����,�����軂����w���9�}�������^���d¬��O��gџ$�wI�yG\"X��y��ٜ[+
Ka5��8\0\'�\\3,C���F��o�7���FS����H6z}���0#Ř`L3f��Rc��f�0\'�s�5�2����i�1��fy��Y�l`65[��d����h3S0:���ėS|�Q|�S|R|a|��b�wJP�)Iy�,��w*Q�I���坪�wjP�y��N-�a��Ɣw��4���܈��8�b��Q1�(k$ VD�x}nT7j
D�EJbN�h	�Ńz�9<w��-�Vd�!�b����<��K̽��KL1q��������%&1���GL~b����� �\01�)HLAb
S��B�&�01��)BLb�S����%�1ň)FLqb�S��Ĕ �1�s1�OL<1���O����OLIbJS��RĔ\"�1��)MLib�S��2Ĕ%�,1e�)GL9b�S���Ĕ\'�1��@LEb*S��J�T\"�1	�$�@��<@��T&�21��y���y��*�T!�
1�1S����T%�1Ո�FLub�S���� �15��ILMbjS��Z�$�HL\"1u��KL]b�S����$�DL1��iDL#bӘ���4!�	1M�iFL3b�Ӝ���4\'�1-�iA��<A�Ĵ$�%1-�iEL+bZ�$1O�$1m�iCLb�Ӗ��Ĵ#�1�iOL{b��41O�41�����wpRY�u�,,Iv*tX�$�$����\"��d	J�JR�C��,\"�9��fI*�\"�3\'����f�Y�,����Ϣ����/Tx���j ݀t�Hw =��\0�H/ ����H }���H_ ����H �������<d\0�@\0d�A@d0�!@�\0�Q �y�P C���ǀ<d�a@�y��@2�p Á<�) Oy��@�2� #��2�H ���2
�h ���2� c��2�X 「2�3@����@�d\"��@&�d�I@&�d2�)@�\0�d*��@��d�i@��d:�@f\0�d&��@fI�$	�, ���2�l ���2� s��2�@^\0��y@��d>��@�Y\0d�@^�\"��,��B ��,��b ��,�� K�,��R ˀ,��r ˁ,��
 +����J ����
�j ����� k����Z 뀬��z 끬�� �l��F ��l�	�f ��l�� �4��,T��R��7�kR-�C��15�V&K�=������DNLdٜ�R��oc�����h&��~���;���j]Qt�n.����s��ɡ6Ԟ:SO��=��ѓ4q��4�f�\\Z@Ki%��|��Ihžhۄv	��7�1�㍲/ڝ=Ѿ	�b/tp��&��?^к�\'�x�����;�f�c8Y���\\�l���x2�>5�<5�:�\'��y��|D��w�أ�/�w��r2�SP���4ԧ�>���\'�>��sQ��r�q�Bԗ�\\�r��(W�\\�+W����kQn�@B#���Ą���&���=���hb/6K���\"��|\'�_�o�M=E���|���M$��iJ�{3��<���y�xꞰ0B�Lh�����%��mTJ�����	���ʅ�U��R:����u��]ʹ���d=��ī��
�^f�dJ<�%G3b���3�K{C���:�C�-\\��Km�1��&9��b~���7Yq�?�1���Og�剴�R淉Q=���8��­Tb-mxX�.���,�����]~Ky�\'��[�,	�J��6��O�\\_5�q%�ͩ��BO�sZK��ZT��a5\\)uV{��U�^���� +�J)��ZL�1����2e~H�8��1��Lo�����v�}�����m׌��h5O�0�&.��
n
 j6�*�5���{�Y��]����5K�k�����\\�����e�k����8�5RA��ox��֞�>y �@hP��T�U����f�:�� ��� �U��P�C�Qk�*�������B�CO�~�j�Z�o2�Xzs��W�iH);eb+�Nd���PCjO�l�iEHxD\"Qd�x�_�]eNض�~��7Ќ��5�}
�f���5�^��$�W�R�G4�2?�mpo\\�H+\\�-��zh���%�u)Ş�hy�D����|-��+pW�s �6vq:�
}:M����M���_Ey`�W���
y�	�K�Ndd>3��Ƕ��l�j��vj\"e9Dn
��\"9��=QL�\"_�7RNQ^T���&Q��*��A�!jR�Q�
���*\"겍\\�?꟠*���8����+L��{V����7�ç���I��������Б��v7J*O�
k�L\"���c�3Y��%��q5ї|ҥ�ES��h�؆9)�8��6\'�xL���#[w�6��	���o@}3�[L����Ѧ��aV^WY�6$���*j�+�j�+�j̫��Ԓ׽�4�W�����um݄�����u��O�ݱ�DZ��v�z�{�z���H����s�si��3[�@c|��a���Ps��`��[���C������{��/���v��_�z��2?׋�����ю��GY�u#w&F��Fh\"$о�?*�Ĉ�����=�>�|Eڍ��͌&��e6�e�����,G�M�
e�Ue5J���F�l��$Ŗgr��O���lH9���N׫Wԫ�K�R�R���Rc�QQ��Sq�pvPyx~���(�ߔ@��)E�vN:��F��sM��������c��f[3Ɩ��v��[��jl��Z5��
�*�F[gl���l\'�f�X�6H���3�����^0��ޯ��#}H������+���V���?�_���7}L�ԧ����w28�L�uN��r��8����tr9��|�
{e��V1��W�*�U�n�JyU�[�2^5�6�F�v��U޻�kbULL��Ѻ+1s�4��G���i,9i�\'2�S��2�)�ឲ�)d�\'�pO��|�=�4�Sn�=�5��
���v�hl��
`ǡ�ļ�w�l��ο��{���.�]��g͙�R���ԫ�f����*̖@Q]�B�j�[�%���-�ӗ^�
y��n��T�H?OԲ1�V�a��O���<�y��ι~�9�����Xb���:�P���L�F�8�l��ő�6v�g`�q�Z�LD��\'�F��� �\\_+`Q�ar�3�T4ME�i��{��\0\\)�d�������9�9��N���V�^�S��)�Trnr*;�8M�������
*���7v�;I����Ru��߄n���]����������\'�12���Hd}�ד�An�卲%���fʎ������-�ǘc^]��ͧ���SQ=Gϡb�O��L�Z�$V�
W�W��49\0�b�N��b���v^���b��2脝�����ع�G^�a����?��訆���k�Nu
�+�w�;H���i*��T�o�7��~w�;UJ帨c3�{Y�a
��}J�Ѧ_�;�n��%�rn�����fq�s��	n��r��\0r�9��n7��Ͻ����q�u�
��9E���C,ɀu��g}f$j}�2֗F��w,O���e�[?�Z?�d�[��Z�Y���,��I#]�˷�MF�v:�m;�����`dlgd)��3����-�c�q�>�V���ռf7���߲[/�ne�`�
���!��HqX����\0���d!��%eIʀ�nF�w�Z��]�Qe]_קZ��nLw�Gu��*��xO�2�:Oܷv�
�x�m���&��Icmp��
��ky��\\]���\'eϣ�)c���9����T�6<\'m��f6���D� ���?�/2\'�GݣQ�ĜЕ@���ں�
��Õ4{�܊��JG�+jSr���E((
ʀ�ꠠS�
u\0]@AWP��h��%���~��Pe��7��hn&47�%{T��3�Nb	֜K���^��-4�5�.=˚�GXs��sWD�������׆EL�>(����Do�^���A���3���:EO�_���B�W�ކ�\\��得R���	���9H�;���B[�\"�W~������MD3��h2�y�[#�ȝc�� ŝs�gΘn}%y<��	�œ3����	�1��)��dR�]8��E�W\\$�}�Y�)b�y8�6W�&��m4������἖�N@�� �K����j�sOtO~+�C�w��(J\'EYq�h!Z���Wc�a{�1[x
�FYw��p\"�iJ��2_�K�J��.��䓙m��΅\\��xW��m���D*�6�eGJ~�Ò��j�R�L��Ku������$(5ߡ��t�L�|L{NĮ��z���6��(��\\Nm>Mj3w�����yr��rb|DG��i5���a�X/��\0K���M��R�U�ڶhmM�ϵN��ڶhm�n�]�U��E�5\'D��\'2=Ύ<=�������KL���m71��}�v{_�]Ӌ�ߟ�~����ψyj��b�����&>��$*��f�R��Kc/������P��/&��b�X�F���>l�B�VG�z2M�2�5x\0�����@}~P_t2#I��d7�S>-Ǧ���4�OF��J�Q��!��<��T��y�
>M3�T�L�W�»|19.�}�s�[`��9�kx?��9�S��+�e[�1�Y�E�/������<�C��ri�-����WiE��W_��S9z�D���a]VURqw�e�����\\TU��h�4S�^�4����
�jl���&�{k�ޯ���$��0���\0�A0����!K,��͋��U�v�.qL�HT[���>f?�[�n��h�I9��%�Q\\�|���|Kg�G~�2�2!F��ǈ�,c�Q���@,�8�7%�)��M�KzNA<�{Wb��#~�����,�HZj[
s�l��Y
�t�%���a�Z��in���H�.y���yK(e����jgv����
i)��l����(Q%�T;�Yƪ/Ca�)lǳ��5���Q�פ�e��l���m���nΕ�4�nR��{��nRD��b�{<ͤPs��O����kD�8{�*���V�6e��h~��������I����6�]d��O�\'x�)G�-0MN�x�$��fY&�QF�N��L�<F��)y���l*]�J��U5VM(A�QmH��I5@
Z�o]g)�E��ZN+�U�*ɳRQ�4���
\\V��3fj�sYݺ�˻�:\\ֱr��j�es�
�eເ���A}�GQߏ�1��C�8���;��~���D� �Q����L��zf�?F�B������g��C�s�ӣ����gD�O���(�A�	��qק�c��嗦��2_c��S�6b��N�y7�Y��5wY�o,y�犙���俍3�_�/D`W��	��7�1�Es
&s��K+��kk��[����G�\'�g����3��H�xugf����׈�\"�1�\"\"*��H��PH$$@B�#DH��*R�
��O��YZ�i r��A�ar�!�A�aB�x�\"p�,�@�� �� ����!8�C�	�cA,��\"��q���s=D��!8ײ9iE�C�	悱X򴇊�����������\"mv%�F�j�ŵ-��+�X�&֦a���;fX��g�
HF��!��b��<K�����>r��X/Q
H�t�TOJ��J�K��NRi�4T���\0>g��i?�L�b�v6]�[gc8�f���W��ܖ-�0a\';K�I&?�[M~ż��=��+Ҏ�qŚ�q��m��v�����ĬlvAN]�ta˅�G������fW,u��]E��U�\"��~��~�/��ݫ�q5L��0�bpȯ���H:�
鸫����H�聤��.z ���H:���聤�H�`�K��A^�Q��\"��@)2P��\"C�\"�{�Qic��@)2P��\"C�bz2��W�a�\'3��a�mr�k�0�;L�d2�w&B|�L�w&���ޙ�;{gb�L��p�t�#���p���#J������d�n���H��Bmfa�l�A�q�Fh&����w�lq�w�lq�w�l�����F\"���}$r��s�{r�Ah&������sD�9\"��{�ȝ�1���F,�k;e�E�&��Q,T�x�W�x�pw�x�����hѓ�5�b�J,
H)�����5���\'��o7�-�W\'�{�y(\'W��G��%�9Q�ґ`Ǜ����3َ\\�Z�qK9l{�6j���/��B���j{�C
�Cd2M\',\\���25F��%�r�iX\\�p#N-��W��)+Q
Sd
k�вSXo���E���D������RV1��o֊�~�@A�X����ѐ)��3({;V��L1���z�|�(J����*�T\'NM�\\b3RľėT��~R�\"�MfWŚj�:J��Q��|u�Z��I���c#�;#��{\"ő{#��kD��]+��D�W���<�Ƚ��|��rpA�B�9��������z��Y�ׄGǑ����41S�+�n�0W�+�\\\0VT}�ӲꜟI|v{���p�1g���]�c?>�n�3N�{g���!��}z&)�le���B�V?�B��:>�4�W��3M��Iu|��<����)�Ҝ�Z�]d����g��㗑5�y�2y_�W~�.�K��%��c�á�^(��Ȟ���2�6�6�N�(���Y٠vVoU���Z��I�_�&���
f���p8�c.!rX33�5�`���Z��qƣ���|�R�L��FV�8�
�7gg�o󡃡���s�9��As��$��c6<Xج�e���K���}�T���o�e���� � �G����(1�OH3:��W�A��k�;��+�倬�Q��\\?��w���Po�w�w�7_���Q�*���J��@IU)W*M�����k�k����ʍJ�ve����P��e���(�\"�X���(ӕJ��R��EyXyD����UU(��*�+O(K�e�
e��FyFyNY��W^V6(�(�*�)�7�M���fe��M٩|�|�T+_��+
4\\h�6�5З�]���/S�&`S�*�x5���
�e����;�\'�>����G/`��b��L9m)Z:�%i
x)�\0�L�����+�+��`�)x��l^�\0�[�ׁ׃7����`�-��l�v\0o;���.`W�;�������������0�\0����0	怹�h0�ǂ���8p<8��N����p*8���K�2p�\0h�����l�pHAt@����B�1��\"�qp1��|\\
>.��+���*p5�||\\>>>�\0�_�d�ʋ�G����
l
6\0/S��`#�r����ͅ{���Ķ�`Ƅ�@F[S�wş�+{Wjw�������T��=�\'u�_g5���T1N�1�����1�Ng�1vR�TF#u���$��$�Oɗϧ52�KHht���5SG8����+�w�wc
��������>rA�v�N��H��e����2V��F1�	�U��Y>
�_1Z��|�\\g��܂w�^��J��m����vV7��I��9���`��]ؽ¾�fl=�h>L�I!����&��*��l$��>r���$M�#�JͥvRi��)�K�ؓ�l�T�%�E�B;K�1=�P���#�&����	�m�9!7��n\\x[\\�������θ������q�}q���ǅ?���,.�y\\����q�q�q�Cq��q���_ǅ���qub��.���1���yy2��?��aY����d;���Nv&� Gع�I
;����[�3Z9J;[���
���ۄ}�$��v�����-��kR�@���\'�G�~,�\'���Sa?�sa��Ka{P�C��+a��H���`�㊝V�C�u�U�����d?k-�I2k/!)�ZL�tk3�������v3J*d-g�4���y�\"i��^zU�$m��J��C�w�,\'���\"_!7���-��
�s
�;�Bm�v�6^���ͮ���[�.ZW���������$��X�W���Ů�}��Z?\\�o�j�⼌�k�u�6]���R�L��G�!�a�\"��7�js�yڣ�|m�V�-����-���%ړ�R�\"[��i�j�^��k/i/k�6h�^������S{
�����s�@��5�=H�b�lP*=(�aO�IK���`��Az�=!l�vJ�g���{��PCV�{N�-ד�\'�frK���A�,���Uy�(�����ty���l���E�Ry����^~E��{��
��7�D�XL��s@<�!0���	F������������`=�20l6/��M���f�5`�%xx#���v��.`W����{���>`_��\0�����Q�[�;�����q��(%P@�e<���iڂ�-hڂ�-hڂ�-hڂ�-hڂ�-hڂ�-hڂ�-hڂ�-hڂ�-hڂ�-hڂ�-hڂ�-hڂ�-hڂ�-hڂ�-hڂ�-hڂ�-hڂ�-hڂ�-hڂ�-hڂ�-hڂ�-hڂ�-hڂ�-hڂ�-hڂ�-hڂ�-hڂ�-hڂ�-hڂ�-hڂ�-hڂ�-hڂ�-hڂ�-hڂ�-hڂ�-hڂ�-h�:���j�B����4��)4M�i
MSh�B����4��)4M�i
MSh�B����4��)4M�i
MSh�B����4��)4M�i
MSh�B����4��)4M�i
MSh�B����4��)4M�i
MSh�B����4��)4M�i
MSh�B����4��)4M�i
MSh�B����4��)4M�i
MSh�B���g5}ZM;дM;дM;дM;дM;дM;дM;дM;дM;дM;дM;дM;дM;дM;дM;дM;дM;дM;дM;дM;дM;дM;дM;дM;дM;дM;дM;дM;дM;дM;дM;дM;дM;дM;дM;дM;дM;дM;g5}ZM�дM�дM�дM�дM�дM�дM�дM�дM�дM�дM�дM�дM�дM�дM�дM�дM�дM�дM�дM�дM�дM�дM�дM�дM�дM�дM�дM�дM�дM�дM�дM�дM�дM�дM�дM�дM�дM�tM����<g>B��zAX�	&�~�P`�P5���y`-�|�B�6X�L/���
MSh�B����4��)4M�i
MSh�B����4��)4M�i
MSh�B����4��)4M�i
MSh�B����4��)4M�i
MSh�B����4��)4M�i
MSh�B����4��)4M�i
MSh�B����4��)4M�i
MSh�B����4��)4M�i
MSh�B������?�;iچ�mhچ�mhچ�mhچ�mhچ�mhچ�mhچ�mhچ�mhچ�mhچ�mhچ�mhچ�mhچ�mhچ�mhچ�mhچ�mhچ�mhچ�mhچ�mhچ�mhچ�mhچ�mhچ�mhچ�mhچ�mhچ�mhچ�mhچ�mhچ�mhچ�mhچ�mhچ�mhچ�mhچ�mhچ�mhچ�mhچ�mhڮz���E�gg72�U���J$�4!��\"������W�}�z�|/y��
YH!)d!�,���R�^c�H
iD���8:�Τ�G�@i��g�Җ�-�eK%ܛ0c9��-��1�����>�g��3���k4�o��f�JY;���GtE\"��Q�kg|$o�����~�|���-���2h���������������`8��Xy\"-G���f��`�8����E<K�U��vV&�Y�Y�YkgT�AE��n*C�Xn��Hl/�LX�v�K�e���D;+C;+;�kn�o����s{���1���j��P�B����:�J{8̯�rh7ja7W0�xp4X�`�����b)t�\'�e`1�4��;w�`:8
g�*���ٱ
����P��~��~p��߳��OE�v�n�W�g>>�s��蝷���E�J�p1ۯ�1R,e���lp��\'c�t����7׼����:�����?}Ԍ̋<Y��,�<�kd���q��O������`i%����rX̚;��ʸG��;��C�;��S�K#K���jT�����B�j�	`.� �ʟ�ǃ��p8H�	DR/D��A,�@�����}Yf���𥨎3Ym�o�jC��i5diq�×���a�n_�X�=��}<���x<5������������������:��x��W�H	\"A$H\"A�+��+\"v!�+Y�u�͊� DD$�� D��ͺ��x�[�{q_��\\��7xHN}?x\"ߜ�	���x${�u}�P<�������_��ҥ?4�pY6�k��o��˿�8TQ]��S���ʧ?W�</|~8�MoUI��/�_����~;��?���(����$E�^bR��`��#�1�{�=�^`/�1�#�0���l
��y|_���
B�T�
F�P�ERQ�hP4+���nE��_1�x�Q�R�VL*fs�7�e�[�;�{�Ş����R�hR�*:]�E�b@1�V�*��iŬbA��XU�+6ۊ]Ł�Hq�8S\\(�7�{�DY��PV)	�RI+�C�SF�Ie��A٬lSv*����~��rD�J�Z9��Q�)�(��o����{ʏ�O���/ʯ�o�[僪XU��Dj�C�a�r\\9��V�*�K�U�rS���U(��\'�3��Jy��WIT��
U��P)U��Q9T>UD�TըTͪ6U��[ի�W
�5Æa˰c�7�
~~	~
B�P:Tj���C�B�COBOC�B/B/Cc!.4�C���Jh-��
��C����i�<t�݅�6��
I���Sh
K�)*eL�R�T(Ŧ���TS�5Ց�J���R���pj45��HM�fS���jj=���N��RG���Y�\"u��Iݧ%��tE�*M��i:ͤi_:�N�k�
�#�Sa{D.l�h�o�hUa{D)l��o�#��G/l�����*/l�h��$�(l����=�����j
�#J���{TP5�G���cj-l�h���6���c;�,l��w�ޝR��]��U���`a{Do���wOVX	E3����G���=�u���/l���
�#�X����G���=�(l�hsa{D�X�і���ޛ�\'���=�_�Ѷ����Ca{,����N���Xx�ځ����hga{�o�#�������G�/���/l��Ca{����=Ha{$�
�#!)l��w��(.l�����QlPlPlPlPlPlPlPlPlPlPlPlPlPlPlPlPlPlPlPlPlPlPlPlPlPlPlPlPlPlPlPlPlPlPlPlPlPlPlPlPlPlPlPlPlPlPlPlPlPlPlPlPlPlPlPlPlPlPlPlPlPlPlPlPlPlPlPlPl��G��]�x�@�k �5��w
و�^��cMB6a�X������#�\"d�\'!�Dϖ(!~%��	������	eD������	�	�OB�Dϙ�$��L�L�B���߈
���Bb�8$)�$!�JH����!͐H+�
գV�Bi�As�B�-G��Z�mF��N��G�����4:�~S_A��-t=@��3��A��G�����y�+g�ߐ���5)0
�� (�	�E�RA��ZP\'h�ڑ<��������߲yp�����*�^`PZ�r��A��JP+h4���A�`H0*�L�����`K�+8����������
a��N�(l������pL8)������
K���*a��A�,lv
{���!�pB8-�.
W���-��@x,<^
o���G��
��?��$���f�
q��N�(n���Ľ��xL<)�ϋ�ī�
�Vj�:�>iX�#-�Kˤ��i��Iڊ�In$��Gɳ�Mʑ�I3��R\\JHI�Qj�z�AiL�/-��J+���:i��E�.��J���1�tF:/]��J7���=��Dz.���J?I?K_d��+K���m��2�L+3˜2�,,ˑȊee�JY��^�$k�uȺe}�Aوl\\6���2e�2\\F�H�Qf�ydAYL�/+���*dղ:Y��E�.���dò1٤lF6/[���6d۲=١�Dv.����>�>�^����@	1� ���p>\"L�D1QFT5D=�D�D7�G#�81E��2�Fl;�>�Gx� #�\"��� ��:��h!ډ.�� ��1b��!�%b�� ��=�8!Ή+��D|&^䈜+O������r�\\+7˝r�<,ϑȋ�e�Jy��^�$o�wȻ�}�A��|\\>%��/ȗ�k�M��|_~$?�_ȯ�w���\'�����-�vy��W> ���\'�3�y��|U�!ߖ���\'�s���V�I�Y��@\\E����\\!V(Z�Y�T�aE��@Q�(ST*j��&E��Cѭ�S*F�)ŬbA��XSl*v��#ũ�Bq��S<(���$%O���RbJ)��P+���żbI���Pl+���Ź�Jq�����xQ\"J�2]�W�J�R��*�J�ҧ+s��be��RY��W6)[��ne�rP9�WN)g��e�rS���W)O��k��A��|U%�x�U�
SIU*�^eUQ*ZŨr�<�rC���S*O���+����E�����w]CUb�B�U�UN�OV�
TŪ2U��FU�jR��:Tݪ>ՠjD5��RͪT˪5զjG��:R��.Tת;Ճ�I��NR���,5���Uj�ڪ�Դ�Q��%�ru��VݠnF�TW�[�\'�gՋQs��j�U��
�VmV;�>uX��.P��ԕ�u��Iݪ�Pw��ԃ���zJ=�^P/��ԛ����H}��P_����\'�+�D��2��H)�\"����H�d�\\��,!��*��l ��6���!��!r��@��t�O���T�Z�L:I&s���,#+���l\"[����#�r��\"g�r�\\#7�r�<\"O��#�\'�U���i24YL#ը4z�UCih
u%�r]��Vנkֵ�:u=�~ݐnT7�����u+�uݖnWw�;֝�.u7�{ݣ�Y��������l=����t��ݸnJ7�[�-��t��ݾ�Hw���]��t�\'ݫ>I��g���^�W��z����zF��/ԗ���U�Z}��Yߦ������C�Q��~Z?�_ԯ���[�]���X���������g���cH3d�
�b�|S���Ta�6ՙM-�vS���4`6�!y&�)Ôe�LR�ʤ7YM��61�\\S���Tn�2՚Lͦ6S����o2��&LӦ9ӢiŴn�2�LǦ3ӥ��toz4=���s�9Ӝm�̈́�4�v��4����\"s���\\m�37�[���.s�y�<l3O�g���%�yü�䙭f�L�s���\\b.7W�k�
��av8>Gؑ�(p;���G=�g?�_�o���G�����q�92��A8H��awxAG̑�(r�:*Վ:G������r�:Î1Ǥc�1�Xr�:6ێ=ǡ��q�r�:>9>;^����Lw�S�T8�N����9��g���Y�t�8�M�Vg�����t� yN�3͙��v�N�I:�N���:c�|g���Y�v�9�-�vg���9�v�9\'�3�y�sչ��v�9�\'�s���������B\\\\W���B]b�¥u�]N��v�
\\Ů2W���U�jr��:\\ݮ>נk�5�rͺ\\ˮ5�&��2��.�+芹�]E�RW���U�jt���]]�^׀k�5�t͸�]K�U׆k۵�:t���]W�[�\'�g��P\\*��S(%���2SN�G����*�ʨJ������V�����Aj����Yj�Z�֨Mj�ڧ��Sꂺ��<������:��j�ک.�����1j����%j�ڠ��=�:�Ω+��D}�^܈��Nw�ݨ[�V��n�������w���]�t׸��M�Vw�����t����S�Y��{ٽ��t���G�S����}�~p?�_=I�\'Ó�乻ܽ���{�=�qϻ�ܫ�
�́�@g�\'�
�&Ӂ��b`%��
�ǁ��e������@}�)��t�����x`*0X,�����~�(p�\\����k0)�f��XPT�Ak�
�A&�,�˃U��`C�9�����C���Dp:8\\�׃[���A�8x�����[�Je\"y��`w�/8	�������rp-��	�������u�.�|
���B�PF(+���!UH���bB���PI�<T�
�B�0)�)�)%)�)U)�)
\01��E@1P�e@(*�J�
h\0�&�hZ�6��\0:�. t=@/��i`\0�60�;�\\`0������3��{�b��K�\0,�!��u`9����?V�X�/�j8w&���4�?��@0M@�(t\0��_BPh
M@�	(4�&����BPh
M@�	(4�&����BPh
M@�	(4�&��T�u@=��BPh
M@�	(4�&����BPh
M@�	(4�&��:�BP�\0�� �c@�	
=A�\'(�����z�BOP�	
=A�\'(�����z�BOP�	
=A�\'(���$�
8
�J��.:�Π3�,:�Ρsi7�G��t!]D�%��.���r������j������z��n���f�K�Эt�NwНt�M�нt�OЃ�����z��:�m%UTSC-u��@#����+�=I_���iz�����yz�^��h�F�A	l$���F	l$���F	l$���F	l$���F	l$���F	l$���F	l$���FlIl$���F⺍���=`#��$6��Hb#��$6��Hb#��$6��Hb#��$6��Hb#��$6��Hb#��$6��Hb#��$6��Hb#��$6��Hb#��$6��Hb#��$6��Hb#��$6��Hb#��$6��Hb#��$6��Hb#��$6��Hb#��$6��Hb#��$6��Hb#��$6��Hb#��$6��Hb#��$6��Hb#��$6��Hb#�������FIl$���FIl$���FIl$���FIl$���FIl$���FIl$���FIl$���FIl$���FIl$���FIl$���FIl$���FIl$���FIl$���FIl$���FIl$���FIl$���FIl$���FIl$���FIl$���FIl$���F{|
�J��.:�Π3�,:�Ρsi7�G��t!]D�%��.���r������j������z��n���f�K�Эt�NwНt�M�нt�OЃ�����z��*��VTSC-u��@#����+�=I_���iz�����yz�^��h�F�AIl$���FIl$���FIl$���FIl$���FIl$���FIl$���FIl$���FlCl$���F򺍮��=`#��6R�Ha#��6R�Ha#��6R�Ha#��6R�Ha#��6R�Ha#��6R�Ha#��6R�Ha#��6R�Ha#��6R�Ha#��6R�Ha#��6R�Ha#��6R�Ha#��6R�Ha#��6R�Ha#��6R�Ha#��6R�Ha#��6R�Ha#��6R�Ha#��6R�Ha#��6R�Ha#���+����F
)l����F
)l����F
)l����F
)l����F
)l����F
)l����F
)l����F
)l����F
)l����F
)l����F
)l����F
)l����F
)l����F
)l����F
)l����F
)l����F
)l����F
)l����F
)l����F
)l����F{|
�J��.:�Π3�,:�Ρsi7�G��t!]D�%��.���r������j������z��n���f�K�Эt�NwНt�M�нt�OЃ�����z��*���YSC-u��@#����+�=I_���iz�����yz�^��h�F
�A)l����F
)l����F
)l����F
)l����F
)l����F
)l����F
)l����Fl=l����F꺍���=`#��46��Hc#��46��Hc#��46��Hc#��46��Hc#��46��Hc#��46��Hc#��46��Hc#��46��Hc#��46��Hc#��46��Hc#��46��Hc#��46��Hc#��46��Hc#��46��Hc#��46��Hc#��46��Hc#��46��Hc#��46��Hc#��46��Hc#��46��Hc#���k����Fil����Fil����Fil����Fil����Fil����Fil����Fil����Fil����Fil����Fil����Fil����Fil����Fil����Fil����Fil����Fil����Fil����Fil����Fil����Fil����F{|
�J��.:�Π3�,:�Ρsi7�G��t!]D�%��.���r������j������z��n���f�K�Эt�NwНt�M�нt�OЃ�����z��*���lmC-u��@#����+�=I_���iz�����yz�^��h�F�Ail����Fil����Fil����Fil����Fil����Fil����Fil����Fl7l����F�j��G����w��W�Ί��~YIW��ܿ����ֶW��:����F���of��9[��2o������-�7潼�>�v?=�^=�2�}�0���GS������`G�
*���lsK�4�H��q�
=AO�W�)z���g�9z�^��%Z����fЎ�����
TRE55t`�;�i������z�����S�4=C��s�<�@/�K�j#��젍,6���b#��,6���b#��,6���b#��,6���b#��,6���b#��,6���b#��,6���b#�6���b#{�F�m����F9l䰑�F9l䰑�F9l䰑�F9l䰑�F9l䰑�F9l䰑�F9l䰑�F9l䰑�F9l䰑�F9l䰑�F9l䰑�F9l䰑�F9l䰑�F9l䰑�F9l䰑�F9l䰑�F9l䰑�F9l䰑�F9l䰑�F9l䰑�FՕ�
TRE55�ҁ��i������z�����S�4=C��s�<�@/�K�j#��ܠ�6r��a#��6r��a#��6r��a#��6r��a#��6r��a#��6r��a#��6r��a#�6r��a#w�F�m����Fyl䱑�Fyl䱑�Fyl䱑�Fyl䱑�Fyl䱑�Fyl䱑�Fyl䱑�Fyl䱑�Fyl䱑�Fyl䱑�Fyl䱑�Fyl䱑�Fyl䱑�Fyl䱑�Fyl䱑�Fyl䱑�Fyl䱑�Fyl䱑�Fyl䱑�Fyl䱑�F�5���c#��<6���c#��<6���c#��<6���c#��<6���c#��<6���c#��<6���c#��<6���c#��<6���c#��<6���c#��<6���c#��<6���c#��<6���c#��<6���c#��<6���c#��<6���c#��<6���c#��<6���c#��<6���c#��<6���c#��<6���c��=>�N��h�NgЙt�M�й��Σ����.����C��et9]AW�Ut5]C��ut=�@7�Mt3��[�V��n�;�N���{�^����Az�����=J��
TRE55�RG�B������z�����S�4=C��s�<�@/�K�j#�����<6���c#��<6���c#��<6���c#��<6���c#��<6���c#��<6���c#��<6���c#�6���c#�F�m��Q�Fl�Q�Fl�Q�Fl�Q�Fl�Q�Fl�Q�Fl�Q�Fl�Q�Fl�Q�Fl�Q�Fl�Q�Fl�Q�Fl�Q�Fl�Q�Fl�Q�Fl�Q�Fl�Q�Fl�Q�Fl�Q�Fl�Q�Fl�Q�F��9�(`���6
�(`���6
�(`���6
�(`���6
�(`���6
�(`���6
�(`���6
�(`���6
�(`���6
�(`���6
�(`���6
�(`���6
�(`���6
�(`���6
�(`���6
�(`���6
�(`���6
�(`���6
�(`���6
�(`���6
�(`��=>�N��h�NgЙt�M�й��Σ����.����C��et9]AW�Ut5]C��ut=�@7�Mt3��[�V��n�;�N���{�^����Az�����=J��
TRE55�RG=������z�����S�4=C��s�<�@/�K�j��� �6
�(`���6
�(`���6
�(`���6
�(`���6
�(`���6
�(`���6
�(`#�6
�(`�p�F�m��Q�FEl�Q�FEl�Q�FEl�Q�FEl�Q�FEl�Q�FEl�Q�FEl�Q�FEl�Q�FEl�Q�FEl�Q�FEl�Q�FEl�Q�FEl�Q�FEl�Q�FEl�Q�FEl�Q�FEl�Q�FEl�Q�FEl�Q�FEl�Q�F�u9�(b���\"6��(b���\"6��(b���\"6��(b���\"6��(b���\"6��(b���\"6��(b���\"6��(b���\"6��(b���\"6��(b���\"6��(b���\"6��(b���\"6��(b���\"6��(b���\"6��(b���\"6��(b���\"6��(b���\"6��(b���\"6��(b���\"6��(b���\"6��(b��=>�N��h�NgЙt�M�й��Σ����.����C��et9]AW�Ut5]C��ut=�@7�Mt3��[�V��n�;�N���{�^����Az�����=J��
TRE55�RG=
?�j
�(�2Ϳ*�K�]��4_+�&�o�N�;�BVS,�$c��C�|C�6�u��4/�HsC�47���RlKs���bg�Gߟ��������|{�4�)�I�N��;�|W�4�-���p�p�����h�h���|:+�<Y�TVS3�Ԕ���ϛ\\��4?Q�tVSz��b�\'�����47�ݥEi^\\Z�����i�Pz-��*}+�߾1m�$�f�o6=+�1lFV3l������j���4{�_����欐ߒ�m��:\'+��F��5������pk����g�M����/5|)�_n�J��kx.������O�
mo����謜v}r�ǲ��#�G�\\jM���o���Ԛ�����J�t�0kM������\"�zը������N��iOGX�����w���i�궦��Q�
�i��켣z������Q�O?��ȹV=f
�p��8N�8B86Z8*:8Fs$�c�橴O�{mR�˥�S�QJ�?}����N�_�����pp_ܘ��G�}1:O��ߚ�U)�-�-��<�f>&OGW~g���|l>6�����{�������>�?��p�p�G�>��m�<�x������?���<{��򯥾���:9Okd>%��:#��:+��:\'��:?O�6_��w�/����W���W����јo�7�n�Ӛ�oͷ�nϷ���w�����������������ӹ�W�J��e��u���J��ܧ�<���x~<�D~\"�T~*�L~&�\\~.�B~!�R~)�r~9���7S_��9�;�v�w�菉����W�_�^ɯ�~7�n����~?�~����0�a���?��z5�����ǩ?����yZ��?O����S���#�z��z����ؐ>�
��_���+���
���N�~�t.�����O�^K}��z���]�n�GJ?H�����{K?N������Ko����?�cӑww::�I��}�feg㲏f˾���M�^�^�&g�Ȧ$SN˺��ٌlf6+���I����W��_�?~˿{�?��
�\\Z��v�k�W��ն�3��tV}<�D�h�X�����S�٧�\'��ٟd�ɞ�>�=�V��gX������=��o}&=~cZj8󇦳�ƴ��a��/��<�`
��?S){*�j�����t�f���i�~����1{6�b�����W�粉ٟ���e_�=�ґ]�$�}�N�ߠS�T:�v��t�Ig����gEwv��/š�s׸����bW���[�+�/�R�e͐�暇�\'��Cf�^/�Q���/�4���[1l��c�N��a���a?�m�]�D����׾Q7����ֺ���{����u������>������\'�R?�^ԟ���\'��>dx��[�����_6������_M~~3�6�v�gFlqlĥ��h�jx����޴�&�8�qw���v��{�k��4���iM��MW��n��DsW���3�o4_k�m�h�2�e|�Ė����ޖ�����-WZ����r�����uL���[�Z{Z{[�Z�[/�^i���f뵶ڶ��1m��ƷMl�j�i�m�k�o��v��jۛm�ʵ��Иd��IH]�ro�P�r�J�j��������	k\\�����]�=���}�����+�W��l��Q���1�c\\����]=�}��;�t\\�x��ZgmgG��q��;\'vvu�t�v�u�w^��y����k#kGv�3r���#\'���3�wd�����G^yu�#��\\{s��cn�?97�*��aW/��s��\"	!��lB��E1@d\"2!.q>0\"d@DDdщ�:�`DFAYF�(K\0�M�
�g�����q[w�41G,K�J�X+>�VQ$����(�]��8%AIQZ*�Jg���K�Qr���Xe�2M��,T�*+�7���G�Fe�R��S+\'�2弪���&�)jK5U��vS�_�*O�or�=��tO^�+t��T9Q�T<�SUogU��\'=ix�U͵��<��1�9Q���{=Y��O՞��P�\'c�y�����5)=�Vkz�S��y�zU��^�P��=Y�;�j[�\"O�����ẅ����g=Y�O�{�WM��6�����5�#O6�+�qO&���r]���6�vh,����zM{)���6���V����oz��ͼH�6�N��bpԹU[&F�[���>ͧ/�ʁj�w*գ__/Zo�q�IT�Ih\'}��o�v�W�I-�ҋ��
�e2{��%�_��9�+&z�����R���or��-��-eQ��]����23_��ƈ�`��pa��2;�RJ;c��%����Wj��I/�hʤ�yjʛW�M�$����j��P�7g����ݤ�*�Z)����L�r���a��{����͖��?MR����- W���0Xi��\\�V�ZdK9Wʏ�<�I#Q�^R��Rz��lu�5s�o��9B�(��������#�)�K)��/�mR��r���I)�W�\'e)GJ�XʭRz�M���̨2�k���-mh�/�w��B5�~W�\"-�ݦ�X9��s<Y��v�f
��Q����J�k�\\���WQ���_���Y���W�Gpf5E�dװ��]�{�e꣡��C�?C�Csԍ�j���={N�F(�u�����W����t��R����U�_\\��2�������-�W�V�E�Zu�d�p�Ե�2���`݂K�XݳK���UQ�Pԯ�\\�U��5�_#�ɥ�2�fJ7���ԛ�0:aF�c���HIL���Jt��I�p���eU���-k��.��_�5LqKۋ��ݰs�̆�nhx>Ɉ��IvU�=�NR�,�.�ȯ$
C)t�j����,Q]$lm��^t �:��JݧZ�sX(�=\'T�n�9�E5�s^lt�+��*�^�O.�VF�d�FM叢&-Siy�6��X(�sH贵i[��6m��x��:�#
[�9;�c0�I����t�3a<	��)��]��]D���
�������\0�w*����8W(:k�K#�,m�HԦ�$�	�����ԗ�K�S4�wA�=�5�7�J`|+�j8;�;;?
;p��p��iD���N43�#G:;��a<v��\0����6F`�-��X��9��l.�-`�hff�p���G!�\062����\"�$��o O�)8?�Y8��9p�Y4��SL�h����:�>�������w��w�&xۭx�T��?�6o�oK��J���6Й�����A7�7�2B���yU;���
M;�� �q��0�����N�PѺ��=�wg�����=z�c�E���}�xE,��f�ӌR�Q�e�Q�ҚQZ3JF��Y�g�����(ma����<�%�1�ǌ�1c4U�90Nk��8��ӟqnQr������y��2��x����y3{�ў�:e�����q�v\\�ؚ�ڜQs��vg�Fl�h�蹋�כUf�j2���H�,ϋ\'�bL�0f��0��9��S!��V���W�v�N�E���[���;��A8�l���:%�g�y���A������<�.0�9�PܨxH��
[��I�Ƚ�$��]�N��A\"۸�=�
w���}\'��CK��S�k1�<�L�L&O&�\'�ɓ���d�d2y2�<�L�L�ړ+Sȕ)��\"�lg��3{�3�̆9�a�l�3&���̖rfK9����R�,�-z�7S9�8��qNpN�ӆ�&�)��G�G�G�ɝ���drg2�3�ܙL�L&w&�;�ɝ���drg2�3��X�Y,�,�r�8{a�\\g��3WJ�K&�%�ߒ�o��d�J)�-�ܖ�Y)%�%��E��_����������j��j����|>��KɁ��d�_2�/9���Yl}���\\g:;Ѓx~�x�gv�;�
�s����NnRE�m���^	��Ҫ��9י�6��;黋����K���A�\"��-y���nZ�2ý_E|�5w������m�#=I�F��H_0R��7�=q���\\�ꢡ2F�����?����5�B�W�2����ލ���ڇ�����hL���-���>����1\"���8�~7���8�Уw�F��N���2�`|�q�6Խ}�!b�Y<3�gf��,���3�xf���Y<3��g=G�3���ܞ!z���g��!z���g��!z��ل��ӳ	=�w{����i�Ӧ�MO��6=mz���e�T�3���#���ܵ����*��}�/��0@���������O������G�46�{t@)M��J3h-�%\\��5���-��T��C�7Bt��p��@:�
]�+t��p�=�Ȁ��zC&�	K�X
��EX/�
xV�+�*���uX
�֘���1�#��s$&	zL�:
�Q���u��`�(�P���u,��p�*5�\\qP�@]�WC}�� AcH�k�	\\M��n͡�����6p=��v�
7@{�\0�FH�N�n���H�[�t�n�n�ۡ��zAoȄ;��sX���?�,�=�Ap7<�T&�dȇ)0��i0f�L�|o(�s�Ӱ\0����,,��`	1�X
��EX/�
xV�+�*��U�:��7�M�\0�V!�*o�;�.��Bb�\'�>���/�6�f���?�d9�����;���;�w�D<����t\"�N�Ӊx:O\'��D<����t\"�^�7�[�ކw�]X�����?��>��z�
��\0��F�R��6�J؁�\"����ԅzp��f�qNqN�x^��b��<9�=p��r�X��
u��`�s6���[�ac
���u=�#q*���t�YG��7�k�I�>�F�/􃻝s�0�y?��Q��]��]k<<�&�dȧ���6�ߍڋ���yX/�k��
.F�7x�Za��朋�����圈��1AdM�_%l7���b��\\
����P�p��=�7��,g?��}�.�9[��a�s<8����́�\0�r�y0���,�ga<��yX/�R�+,�a9�+�eX��[8ǅ�L��A|����3����2�����s@�ͷ�=�:��u�����@#���`$���0f:a�fma�fma�fma�fma�fma�fma�fma�fma�fma�fma�fma�fma�fma�fma������zAoȄ;��u��0{����ڪ���lr��!k_źW��8j<O:�ؠ0����W��U�}k_��Y{!k/d텬���\'8�G�1�ӝ�Uȼ
�W!�*d^�̫�y2�Bq+;���2�C�@.�;���Ae��;fR�L���eڠa�K��iMv	�;��7�F���*cv�̮��3�bfW��ٙ\\v&���egrٙ\\v&���egrٙ\\v&���egrٙ\\v&���egrٙ\\v&���egrٙ\\v&���egrٙ\\v&���egrٙ\\v&c�b,P���@1(��X����]�B6V�f/6c�l�c��C4`���>S�{�S�{�9V���a�:X���W�٫���f�j3{�kdb�L���52�F&����X#kdc�l���5��F6����X#kdc�l���5��F6����X#kdc�l���5��F6����X#kdc�l���5��F&����X#kdb�L���52�F�0�2Vl��Y�8V\\�Nb�����h��������|��:�&�̄;E.��.*(���U�,���^\\VW�=��Jhkikv,w�R��ւ���Eh(R)I;I��Є�C��d����4��9��A�9�s�9����o~3���������J�ʹ�M���Q>����ٿ���ٿ����`�;�����谎�谎�谎�谎�2+�����htV��j�Ř���V���po+�y��-V3�����B!�
Nť���c&��Y��+p%���
s1W�\\�����,��ppq+�-}l��\'���E_�]-گ�|����XZcK���Mѱ�����r��zbw�.܍�	�=�����qL�ԡS1
�O�3�,f�Oq���q);.�嘉�af�
\\�9�:��\\��ո�b>�����0<M9���������b�0\"NƢ��*/Ty`�j���S�q*��P�J�S�a*:LE���0�B�*��ԯR�J�*��ԯR�J�*��ԯR�J�*��ԯR�J�*��ԯR�J�*��ԯR�J�*�ǩ?N�q�S�������.W��*�\\E���r]���Ut�
u�ԭR�J�*u�ԭR�J�*u�ԭR�J�*u�ԭR�J�*u�ԭR�J�*u�ԭR�*�ݵ\\\\L�E�M�a���nj��Ҹ��M\"�ߕ[h�K���B�Ào�����/����/�Û���M�0�NxAtʀN�):���jï������������������������������������������������������������������������������������z����z����z����z��W�eHQ�eHQ�eHQ�eHQ�eHQ�eHQ�eHQ�eH�����������������������������������������������������������������������������ۣY<���<���gyq��xn/ϕx��s%�+���7�^����[�w;O/ky���y���yp����&^���n^,�b���X��\"/y1ϋy^��b����</�y1ϋy^��b����</�y1ϋy^��b����</�y1�K%^*�R��J�T�/�x��K%^*�R��J�T�/�x��KE^*�R����T�\"/y��Kݼ��Kݼ��Kݼ��Kݼ��Kݼ��Kݼ��Kݼ��Kݼ��Kݼ��Kݼ��Kݼ��K��y��K��l�//���0/�@�j��a�Sw������0u+ԭP�B�
u+ԭP�B�
u+ԭP�B�
u+ԭP�B�
u+ԭP�B�
u+ԭP�B�
u+���0u��3L�a�Sg�:���T�7T�7dQ?O�ne�m��X���a�~���}���$����x7N����5��r���`�����h=F�1Z��z��c�����h=F�1Z��z��c���X�5Z�Ӻߊ�V\\�YP�YP����@��)�M��/��h��~���~���~���~���~���~���~���~���~���~���~���~��`��E
)X�`��E
)X�
<T�x��C*�P��
<T�x��C*�P��
=~h���_����U�<틴�i\\�q��Ei\\�q��Ei\\�q��Ei\\�q��Ei\\�q��Ei\\�q��Ei\\����\"�l,����\"�l,����\"�l,����\"�l,&k�0��z�76�X��P�˿�3\"�։L�����S��ݯ3�ڙʶ�l��m�ɴceZ\"�譊2_7^���o�C\"{��U�9�;����)\\���ۦ�!�=$��D����C���͐�}C�oH�
���熝�yPR�;�3t�:f�v���r���=�/u��x�=V��G�=~��~�
fO�)8H�A
f)��`����`\'��7H�2�ʔ�X�be��)U�T�R�����F(5B�J�Pj�R#��T�!�r��T�ReJ�)5�{,,�m?�T�<H��T��f��������BlԤ} |R��:��u�;�T��ho�N��]O�V��������?n�:|�П���cx8~q��6����~�&=�K<�«��:��ļ\'��;�v�}r�|��	;��x���[�|yy\"G��w��6�|�7�X[�ڒȇ��o>^���}�q�8�7^����������Y�?v�V�Un��)��O|s��z[D�K��UTeL��a���#:���=\"�5��xMT��E�~QUQ����H���=<�����Z���G�YO�����<�l}[�8]��O�*�?��#�?�z���C�}F�ɾ5j�W���Zܛ�SK6����ݝ�6u���P�[��v�ogt��.w�R9�;-��=}�oSb����K�@��Cy5J��X6�sǴHj�EOǄ���y�8���5���7�^~>g������\'����Vs����(uG�^/�G)(�^/S:Pb9%�Sb����8�ǩ=N� �z�_/�ǩ>N�Ŕ����Z�h�פ6;��l���Ϻ_s��ᚆ(��aJX�P�z����V����r��7�����
|+ú()\"GD�n���������&�T��)�ߔ�o��7������
�h?�[uj԰5�F
���?I�
��٘ʒ�2�.rP�,%�Dɲ�2���Ƿq[4=u;��宿�{��~�+���|���
sR?�#XnN�0\\��-I=����	ֆd�:��L.3ܬ�-I�g�fj#w��{�uOy�	M�����oq�fｄ��ׂ�hu�6l�v�w�6�>�A���d��]�)�{�.�D�^({/H�zO��`�u��T?¯R�0%SE���>aXA��jؔ:�q�߄�K�9Uai��kw
�-mXZe���[��
ئ���m*`�
�F�=�^��צҵ�hYU,���T��*֢���`Yl�
�C�ڡZ�T���S�r�S��Ԣ:��N;T����;T�ZT��j�U������Ke��-<�Eu٥��RAv�]�E��Х2t�]<��S�<ժ*�R�x���Ze~Om��m2�MƷ��6�&��d|�lo��9ٞ��9��\"�s���[ey�,��]��˞��t\\��?ވΕe�}�2j��Z!���祲�\0����4��eK�_{�u����u2�*�|��/�ʀ*,�UQ�B���+�b�(���(_!�W���ZG�u��\0��Ѫ�V���\0�zE���铦O�>����h>@�4���Y\'z��w��=��4����1lr�����1��+z��;˳l�e,bU�:P`Y�Z�n�յX]�������oE��h���h�j�[�~����i���^v :ٓʞ�Ó���~�����6�i����ieOk��VO+{Z+-Fh1�eZ�xrٓ���<-F<���eO�{z��[=��?��#�R/��WX��\'�zb�Z���۩���?���u�=��*�;L�_�3�\\�O�|�3qV����qʡo�8+������f�\"��ٙ�D�)f�:���g`er�]�is�N]������x�\'��߈{����v?�o\"��S��d��Y�U:��qwѱ���E�k��5<o
���J�l��J��Yma�Ӳ\"��]l���]��b�0�u��:~�rdy���[ު����a%۟f�.^n��\'R}\'�wN�QVE��z��;�xЊk��R{\'�wZ�Ry\'�wRy\'�wRy\'�wRx�\'
=�;��*_e�l�����q;��TkQ��=�M�Se�-��,k��-�ٲ�$Y`�vvlgǫlx�
�O�3�,f�Oq���������ט7�W��Iτ�Oz�a3��aӤ-x�x)l��P�s���Z�o�+`��� �;��rTX1Ŕ=Ŕ=Ŕ=�8���Rt� �ug�#�2<P7_�U���t�[Z�Zæ:;��3¦�?�{�����9����aE��pI���~�B��װ|V?�/`��F�W�Sc�uj�1u0)N5)N���H���p�#q���¦���+^_���G�k�ϧ�C�4��v�����Qakt4T��XL�q��g�}�C|���E�k�
�p �W\'֫�Չ�������u�\0
؋\"�N&��C��X&����� ���mC�ZP/���z�\\����������E�|	����W8��q=n�7p3n�|��Q=��iTO#����?W9�w|t��C=�� �6ȵ
?�j�k�(Ï���:��O�3l@��c���M�}��S�0,��y�&�9|����,6;\\�W�+�l��)\\kn�\\�+�׆����o���ۢc��M��v�Q\"�����E��{�;���m ǽ�Q�����<��z܀X�E��F,�Ca�z1G��3y[t���Ƞ�D;��Nt�U�S�/�՚ES���~�3g��(��,R_�/s�����Cl���q�s���x6>MWS��}��+�\"�c���H�X�~�W?��Տ�ub�n!�R���������xNƻq6.
kd�B��P�-��^5�b������ѻd���{���װbN��#s�9kdΚ��hZ}	�\\?�s�\'�׏E�O=&�O=�q��	xN�I�֩�:�Z�Z��Sp*N��x��^��2,v~#���i�B{��pM�X�L,��Iț��Iț��Iț������7q��=���~���.����}��<�U���E��F,m��M~�;)���;)��֙�Τu&�3i�I�LZg�:�֙�Τ5&�1i�IkLZc��֘���F�6
(r����zs( �rC0	�\0a��0��uM\'&$�V��������xU����{f`�9���?��sJX|5i8_ft�vFW�Ÿ��6�k���2��.�Fw��t���W�;�*9�ߓ�L祰
��`/D�g���Q��Fw>��u;j�7���F-����r.ϑ_�\"�r�5n���˅<��5��9��F�#P�D�Q�B��2�&�L���J�O��Yr5r��X�`�N�� �wHy\'��eH=��ɕ�ROF�밎~�O!�[���i`5����:�+yw�.!)>�����Kx��D��X�㩚��+璃U�Oh�P���R�����?�*�C��h5V�~�J-=�T�e�r\'Z��y�q;�<�|�(��@\0b�j<�b�ּ�.���O��E�%`0xxG��4�W�70`
�?\0�@��q@
�c31�б�бy(�%�0#��G\"y�hd��gKD2�1N��3�6}�,��M�ʴ#y�?���e#���)f�1H׋g���>�S���3@_��\0Sx�9������\0��|��|��||
|||�i�,`60�|
�L�j:�y<�n�i�ټ�>�8��G�N�`߇�݀������7�����t �7�����q���c^�����1p�z\0�\0��\0��\0�{\0�=���|`�^�#��\0�
�\0�A���`�9�y������K�`(�2�
0x�\0F���ׁ7�1�X`�&��3c��UL\0�Wdb��	��%��y��z���x��\0�#�
�9�s*��T�ϩ���������������������������������������������������������������������������������p�A�%�
��\"�A�\"�y8[N)ha<��G[�_}�����5��ּ��@��8���6�&��Y�zPgGq�=5\'�R�X�l�� �\0! 5v���#l�.@�i���3��f/J1{}�����g��@?�?0\0���)��S೧�GO����<�w
|���)��/B�nsQSZ�C��H��f�
y�k�Dޅܝ��+�����o���
]�j���B��E�������#�G.��\\\0�\0�o���Y�7�P�Y�)J���s�V�:�guz�m�`�/�}�.�C�j��ȵ�Q��r�
6�Vkg�#9`�k�`d��X-��ڌ�B���9=r�����|z$R�D�4C�45�#��%#MC��#]�k�t͐�9���́ϕ\"���YH5`����m��b�
�a�U��-4��B�]��=�q/���s���m�En�ٰ<&��;�$��T� �ӱ�g3��<�y���C�ۥ��a�����DgP2���gs�����2SDx<�O������,F(˻�Ż���*�߽��s���*���������D�&Ԑ��r�
��ó5kVP/�(aŵ������*垩��\\�8�۟+P���Z��У���9�����u-�+���ǻޠ�<g��\0�3KH��w\\��$�2�{�-9v:x\"���{xl��S�V���������jwE?A��b�W�6��vj��/.
��Iq��;��D\'�#����)��Iψ�b=
Bo�&�BSC��	
S3����9*ܻ>��Zc4f<���tz<MC̻�(z�>�*5�di}��Os1뾆V�V�UK��� ��G@��ª�@�ºJ�ṯ�\\Cʤ}����iD(��a|��:FM)���5���H�5���@#{P��	�t�^�A/�(Al����,�R-�.�)Qd@_�j}���5Q�kM��IZ_k��?�;!�ب&tW!�����=��z\\z|5����͡�]�:�\\�t=�t�&s;��f&Yf����c�R}�y�v�Y@
��1gb0g:QCu��L�TՅ���1���YT]�\"��a��C����yR=IB�R�QK�%?���L�\\�U�P�~ �^H�=s�%����ޗ�+�:B�@�H5�F�QH3Z�A�X5��S���Iw~���j\"rMR�?UME9��4����#�#5y?V�f���3��Y�s���>���@��j1��N-E�+4S�Q�I�N����j3%�-*}�Me���j5R�U6zr�
S��rP�^�2�\\�<���!u�y*�VGP�Qu%�|�\\�
��:������ /+v���Q=�M��`6�l�=�{�	�`��&؃M�\0����{	�S�t9��S����~@`ź�B̲����z
7�S��2$]���`���ls�Q����N!g����L\'W��,Jtv:;����كp�	#}���4{��Hs�9�p�s���C�!��s#�Q�(��;t\"Sb�u�k����2���,���T+��f(
\"�
Q]�Z
(�Y/I�^��R]��y��
��ju5I�q��g��n@�e7����얨ګ��q�M�[�-�ߪ: ��q�f��n�nI`���{ս�ߧ�C�����?���e:[3]�c�^�bz��,�q�zF=��}U_�/d�AG9�9�<�.�ٚ�f����!׫j8b\\ֳ5�9뽦^C��}��$�zR�����I���Q� <YM�MQS���A�y0�J̓6xp6�Q�Ax��{��lp_*�.��Ԭ��Y/�Y��f�D�z�5�%i�s�u\0�\\�K�ܗ��/��p���؆m���U���3����~@`\0��M����`ļx����D���$4��;{�5��>g?�i~���f�C��s���S\"��.�Tɐ�j`E1�G�4�ăA�v�F�V�Ҹ�����w4D	.w�i���Q]sG��m�9)4	����\"�4�F�f
Qխ�.y�3w�xZ]�~d�E���2o.}W�tme?�)7�4����n��.��C�BK�4��������0�R�l�:��۹{�ӊ�xU�r�o֡m��8Cy�[���w���OW�
��.�Z��W\0{=��u����h�YyIKI��ę^C�?�b�ܓ��w�����K��;�J?u$��k�g��xڒz�fj�>����.\\J����2�������X�)���%cU7�RHG�ϛK]�ŋJ��Ӱ�e�R��ָZ��-�On���װ��L�w�2ְ�(Uf�`��tI�9
�:�E������s��+������6|¥l����,c�c6�f�*k;��V��^p|��x��T������Jf��c1�_���\0��@�_�E4���g�y\'FjV����c~�-��}?�K7�9�b���Vp��G�\'���bJ���?��^���_��+/�·Y���
}��n�Я�Z�і��}Gě?�5#w���|r��=<��H���)��bﶠ�p�*H{�)��o1�����^�j4�<�\'�?����\0u�f�~\'Z��j$�Ǖ��k�UFg�E!���#QT�b.Qv���Eo�\\��:]��j�w�~���|c���J>��o0�)_ݢR�_�[IO��U�����S��i�t+��?0\\/k�\'x�]�rש��os�\'��������2�:��g��S�G��\"�&�)���;���c�zXdsGG�����[�X麪`s��ctT!�˃?{g����I����6~����	}6�����F-���l?Ηpc�h+~���B]Q�1����8)���o8���ӹ��P���k����������U��� �F�9}�:�z�E�J����%�	�U��7�;��̅}5�����f[/�v����O�:Z���6_�7�,��C��F�XגS���5���w+�q���ەe��~:��u�{;V��pǢ�w�O�����{���^S���i)�Bl�S�\\y�鐤�:<��u{���O�(�WK,���L9}�����3q� �����h#��hN���E����N��/�����{oU�D�2N�4�$y��z�NQ����)z8����֦�dU�^��
���L�v��]��{r��tm�k�C���f���\'r�jp�Ky�<G�����}���?x��LKw��/KŶ�1dUW�2�+Un]�
$����:ʫ]]�u�������k��g������`��5x���~kO�	~�\':ʩ&r�v��k�N�?�^�a�1q�pz����y�TN_��p�;/�Ag�3ܬ�tF�u�ל��z��3ٙ�L1�v�9��s�����VΗ�������w�W:�8ߛW9?9+����j�&g��޼�Iu6��:[�t�chPh�yWhp��shH�U��Ш�h��7BċCo��4{ƈ�|$Ɖ�1{���ěO�ԉ�g��ɋ�3V�j�9���֋��W�bɠ��H��:lR\"�nV���o����Xm:,�^J���%�+���s���*���k�5�J�� Pُ�����~���\"�)�DD�Pr)ED�S�H#��\"EDJSD��\\DR.�\"�\"EM#r���H�bz��ہ2�q��?�5�\\��o����W�Q.*f
f����`&(�	
fb����A0�Ă����X^0fja!e�2�@NȀ�0�9�� \'�9�	(O)O����V��|s@QX�B��K�%��9�9�K��ȃ��|@T��-�[,��VVc����Uk�yY��NY�|���^۔m�AZȀ�X� -(H
҂���T��J�u�:��W����\"���|$��(�=T��а�����*
KV�,RQYQ�X����V������c��A�����C*��x��B�Њa�����,Xa�0 6VqS�	W�fd�v��vx&`;(�
�����`;(�
�����`;(�
�c���X	l�8��W9���\'*�@<�r<�\'+�D<�r\"\"��oTnaR��+w �!�a�s�^�aR�T���2��

�~J�3���I̢~Z�4�NV\'�&�3�g�]��Na6���g�V���+���t�J}
sf�30�����R�s���٘�u��U�����<fY~	������E�\"�W��̨>�.aV�9u)f~M�f.S��;v�/ �R]�����K�����s֪/�9�S�a�W�����~�7�W�.�ܨn��W�W�[ݤnb^A��r�������Vu��C������:����	ݩ���]�.\\���W��a>�g�^d~���.���z�9�Waί��̥�����G�#��1��ȜPObO�0�?������������9��yO�E���>K����Ϋ�[�23���2c�ת�1[�׫�.��;Y���j�W�+�W���oV���������f����O���i6D�4�OC��P�4\"x��@v-��m���t���������/��!2Ed<�ȸ��x��P\"�aD�

�(�A��V���@��%
����Z����ߏ��%
�t�ahuD��C���?I��,=/�`Ei��
7@���ққ�+��ۉȝD�n�m�m�`q�tR:��o��V�Zd�~+�\"_z*:���O� �2��\0������!��t��o��\"]G,�y��;�E��&�_�����M��J�E�#�V�ʈE�#u?rh��U�Ԃ�C��1��q�֠5\"/�?�����Z�?D����>�m\0��YN �8�Ͱ��~ D~ �����%m	�?\"\'�9���� \'0�<@�-��od�D�
/3��8[Ol=��z4�u=��b���È����=�+�J0�7�7A����D�y���E^s��y��7�#+��f�r�X�@�\\�[�vp��dQ��������*A�)���A�{��g`e�r�X��������|��)�dQr�(�@���O���D�#��SD����䇈���=��
>.�q�_�א|�!>�?��y?U�q�ȸ\02�X0q1��U�d#��[���$2~�8xq������}Z��
~��U_җ���(VK��d�%VK]�j���L]�*���X�\"&S1Yߡ���E/1�z��R�G���`�\"�N]���X#u����L]�d�\"VK]���E����UR�Z�\"�H]�d�\"VK]�������E������El0uk�.b2u��.b��u���X-uk�.b2����&S��j�VK��d��~_�0����R�0����R�0�����?������?���(�L��>A���R��ǨX;�k��a2�{������a�����X#���a�,��� 2Rq+nx����?�(%�RB�G�ȀoI)1%�\"��RRJ*<L��Sr�Gx��J��0t��(v�|s�*cYRyN���+pO*O��3-�g����LU�bU��p8�p83q/�pj�/*s�����X���{P���%d��<�W!|N����:7����U�*��9���+/)��sR�p
ʫʫȼ������Jn�I��v��������9o*;�?��Rz��C����<���yF*7��Yx����!^��<U�y\'�3�<O��N��N��N��\'�3����i%�� 9���p��
~&MUd�x�*�0U�0�A�{�\"�RE��a��q�Ex�	�!ɱL�����*?Ǌ�3+gBgU΂ή�
���9��6QoR3u4QoR3�tQO�\0�&�U�T�\"/���WFFt�P�����F\\��k�E�=�k�Qm����8袎�6�8訞Y=�Yɉ9�Ğ#\'��C�7����	��$�\'�������X��W�z}�zĢs��:��sa�:z�s��:���T����%�a�k��0����&�4�52��#Iø$K�U�쫬J���j�i(��%��&��`�#y��+}�
����d�u�=/ϝK�i�b�e+��ݴz�~k˯մc3ƶ����w����8��s���B��t���e�k71�0�ue���ǻ��C0ˏb�X\'����F\0#���(~�(>3s+����G��~�g��f�1��y�=���G|��S�����@��{���1��G���������B�%�?����+1�t����eb��\"��0�n�d�
�a�
����������O�O1t٧�g����ۗ���+2��k�HEf�}��۾۾�~���X��O���{�엡\"�f�i�����1��h](�a��h̑���юv�x�$�T��X;�1ϱбıܱ���X���O�ű��e�p�t�8�9:�8�;N����9.B�8�;n9�����t�A�:�N����&�Y�[�m�1���d�4�L��|�X�ȹ���\\�\\�\\������������=Dz���4T\\=�<��
�A*��.��.�U�jp�]R�?�W
�w���r���sM��US\\�]�\\s]\\�]�\\+\\��k]��]۠ݮ�н���a�c���3�^��e�5�M�;B��׭�.�k�C��n�����;�θ�ȴ�G����ݓ�S�3ܳ����K��=B�+�]�u��-�혿�����G����e=�>�>�>�>���>�E����[P���������<C=F���!
%]eneC-ж�P��s,4!������ZZ��
�3��B�;B�B[C;��f��ep�����^Ĩ�C���J�9t�x.t:tw/�Λ�.��Bo�n��Y��6���&]�>�\05��n㮰ϸ#	������`�x�c�����mۢ��tӝ��\\�������������2a�7�7����û�{��E�@�p�(�>Y��po�����ˤ��]�7I�D��b���D��D#P4�:�\"��8CZ�_�ցw<M�.�Ud|dRdjd|9&���g:YYG�GVF��Yw�n4w��F�D�Cw
��)kd_�`�T#G\"�#��;#g#}P䑹�R�V��5r]��Gn���5��V�EA�Ѻ�Ш�	.�ڢ�h�iO4�6�\\���;y#����S�hGtBt��vtN(Tf�Ό���y;:���h�kot�8�k�룛�[��;���{�����G�\'����磗�W˵�\\��j�F�v��8����/W�XC�s�|�H,˻G�F�F���ƕ�u-6�\0�2�)�Qw����ج��؂��ز���ձ��Q�b<cb�cb�\\�X�{^l�{jlo�@,U>��}��.;;)X\"v�i���.�3=v;_��,�݉��L�+����x��!�F��%�r]�����X</�[�]\\�DhG�=>>�#^]|R|j|F�Һ��g��a���%ޛ�̍/��t��w�s*�.�1�%�=�3��???.޷�)��l�/~1~%~=~˼Q��x�\0�@�mz�j.%tB˙D%i�x���Ƅ-�q�M�	ײD�hd�oK�$�ʱ�_(V�,H�U71&ё�P���ū�{�3��r,3�$滏\'%��(���ĪĚ2E��>�D��/�޳>�)��?�#��|���&�$�\'�O���ĉ�i��Ĺ�}�G�R�j��OܸOo�s*Ʉ&�(�I5Y��\'x�!iN:pR�O���d�{!�O���J����J��Y��<9�tJ��INO��6$�&x�&\'�yo&W$W;mɵ�
��
�
[���\'���������g���.�)�/*-�pn-�.�+�/\\*\\-�(��^�M,���\"/�����bC�\\t}�H1U�GG��V���ŉ��V�R�^�U�[\\P\\\\\\V\\Q\\]\\[�P�\\�V�.�.�-(.+�,�)�//�o��<\\�)
�JB�����&ae�f���<w&?�G���>n�����>��>�s���ϹW��!�4Y0�`|Aq��i3
�j����E�
V�P��`C�Q[
��.�Wp��HAy����s	+�\'j%��h�~�Q\"7Ѳ��kW\'�&:u\\�H&�&z�\'�4$�%&�L+����Q���	׬HLJLI<{����W�\'f&�%J��O,i�-�<�:�.�1�5�#�\'�?q(q���ġ�[\'��N�I�Oڹ�d 7\'Y\'JƓ9����ɼd�d~�0�=٫��䭭V
M�7������}����q��$\'J��|JnQ�S͊��ޒ�M�E�C4|s3�������q���ɅrO.�٘\\an�$>4�H��X_�\'K�Onn<�c2������
��pV�������rp�ന�j�\\�и�7�R�Q�Nں�E�}
��)��Bp1�\\�~E�u�eZ��~��{���R��Zـ
�X����P���e����|m���P���f�����x�;�����C����_ȿ�̿x�/�l���~��R�������̙��9��~h
��ikm-Fr1���,Ff���b��j�w�{W3]�4C<��t�3��L<��ta-��.��r���~��F�z%mE�J�\\�`�������!X���q����_�_g�����K��zV�RV�x�+�y�W��䫬߮��c�����cH�
:F�:
���>V������>ذ*�A����*������l�V�
����rm�vm�v�[-�H��_�4W�������yf��1��&���8�������?�>$#h1�v�P�����=���=�fs���X�m��X�ϣ�NJ�O���Xr�^�����{\"�\"�꽔�ZF=!�:����>].����xy匝�*��B��ī�b��g�<e�l�qqoB>��;
�����)�
��kg��~�w��㘫��˯�X��^��Wew���U�r�v���Ɋ{h�	N���B����	_}(Tg_3�1���9����Ĩ.��o��#�ѿ�K�����R���qn2��C̫�p��4�����
/$N+���U�F��n1�߬�h���O��h`0k�c�#�9�<l0��z�\'Y���2���������M�j�+���H���]�E��5�_i�9�z297]\'S8n;�M��3���9G�f�WJ�V�:V�����,����]����g��©X���Q�^ju��R|�N�9����:;�3��4CE��(�s~�+k3`	�b��n�{��[E���u�����Ӹ��EOsy�#��\"2v1g�#���r�-�����\0_g�
�J�+���P}�����d���l�^q_�#���3��h�A%w�:y�M�e�4�9S.9�c�F���^5[i�1Nr�����z/��
�a8[]��������4�[��M�k5��Pp�\'���Ch�,4�6�+�{�����/^�{@��w�4���>����V���p;gv�a�&��[̝\'�Z!w�w�{�ʙZ3$m��ůc��\\(�S�4��{�V̊�̊ʊ�j
�
uC����z�+w�Z�Yb~wf��s�
V�Ū-x����I�XK9�NB��+2�܈��2�8�|*g��������<�,+�슚S	��\'߃SF�k�5��{��S�/+��7��GV�?�&dȖ��p�������;�],��9+���y�v��w2�X��7�%��̱�X�|�k���ø������I4H�H/�EO�)��< ��^#u=�nV�6������*��H����Y��NCd>D���Arocu�&�6!ӊy�	�k�=����{���d��m���~3v��lٌmW2\"��<Ns6�9��;T��sc��=vΖYa��7��q�����|�9�:��Lso����eO��|�o�����h[�ީ�B����y�B�Nz7���L�N��p>Mq�ϥ/s����u�����<ץ�ڟ�V�Uy�x?�#��\"~:���	�����Н�^�3��3ܬ5��Wn
UK������ZbrS����˟��ϰ�98=�Y�̃���$�=hv+�u�z9XS<�dg�7=C��g��O��C��a�����|���{�SY��Pf��U�:(Q]���������o�jh��yv�~9=�m����\0�����w�kn�Ap���������@��ޟ���Y}&���H�n�8�w�lvd�~/#��x^I���v6��N��e�=κ�߉MS\'�?�9Ui��i_G���������/�e�����{���N{��w��ˣ�򫢎����Z�۠�k�NS������8	��Z��*�*�SeT5nl
+�����Df�7�\'�=�2yZIݣ&�2����M� oq��!�7`z?�B�[�qn�t������S�dPs�\'4V5����X����Q+[{���ܺ��`u��B�F�&�g�ϭ~�\0�Nk���5�z�m=j=��^b=�o/�^Ҿ_e�n�Y�6X[����{���O�O���)��/�B���\\�%�*M�T�Օ*]�G}�_zL������{Gj��]
u�9�Ѧ%��BUCS���q��B�9OK/�S�.����i_��x4���N�.s䛬�B�\\���?�����p�^?����Z±v��	��7���	=9�\\Kݖ�ܢ7v�K�q�a�\"���ˠ��R6�K���h����\"ɴS扗�j�`u\0KjYa˶-��e[���:S,��?������&}�e���e�.uy*ś��t]f�2_xnF�������QDfr����s��/J_vI�����tْ���;}_���(\"s$�<�t�������2��D3�g4���h�Ed�ft�Hft��K��~��ECu�1
<6cBƤ�)�f�̘�Q���\"��<cuƺ��[����ؓ�?�P�ь�3�v0��*K߂�o
���O����`��QD.?X������?8�Z�ep�������U&�
N
ǯ�O������{�q8��T©�sD�s�`y�,��X8^-�^-��{����v^8^2±]��k0�S��
�i�>m0O��)���va0�2�0���� ��\0?|���X�k0���I����`���O��z�@C�7Dr2������`�+�al;���ь�hhHO\'Qw�p��N�o0O��	�@���4��h���؀�]�����;���!�CȌCf��2���%X1���E�=��g�3���|�o�?\0�\0����>>��.�w����/A	�\\^^^
��gr���p�#�#�f��h�N��x�S<�)�_�!?��X�K,�%����)�2W=���=��3�:�Y�6�f3j�H��8��;}��w�������_��=Խ̺vY�N��ߏ���Y�>�5
T�ԧ�����N5D
����:�˒�/`��/��2��D|U|
u�/K��H�KLHT$�$�%�1�+�J�N�h��X�XB���j��e�&�&6�4*)��j�q��I��$�$�\'&�$h&N���#�b�Lb�Z9�mŞ�w�ec��v2����i�]�xm�8�*ٖ$w\"ޚ�t*�1�!Y�$���#�N�����tt�ư���	�Q�[E�$�29492�#9&Ie\'\'&\'\'��ӓ3�_�$簾\'�\'%�&W&k���ϓ�H��R�{�[�ڞ�/���&�$�&]��I1���GYO	�J�H�N�M���Nfb�Sn|R*Χ�s�R:U��C�����Z�ҩ֩v$�����^���T�c�#�.�ndg.�z���8���+N
� ݟ�(���&�;�O���sM���O�;��MО�G�x-ջCP�6)(K��ǻE��H�NP)\'R}�Z,	�Ƌ��`��&͘��԰԰`B�ctI�glNtCPL	����ԋl�;М��U�cs�y��d�`	����v���0�ˑ�cG�j��d�FE������خ`s�-��n�����I*8�
��ʃ�ĵ<��gǆ瑩Y��XyjX^4/�K���kKu�J�k�֗�u�+��ݟ�#�!�7��q�y�(�	�L��خT����GcHG��k��Ҽ�yc�V��M̛��W�7=ofޜ��y����490oe^
��9��S�\\����Bᚸ����Z�p7�k(�Aقv���B��Pbk�e)ڲ)\'�^���F�qy�c�^)b�/F�W\"���>�A�$�\"o�;@A�X ���ě��y�a���>\'��9j��=Ū���VH����2��UB=\'��!�v�L��Hs����à/�s�Z�2
�qѢv�?ᐺg���U>��E�#�DWYV~s�:�a��$A.��y��͚	��2�W3�\\�p<�eֱ{�\0@������)�s�U��y��	����}�mA�#b���=	�mH���}�����ъߠG��}h�����fL�ymy��yԐ�g�����7�a9���M�G�@l7��М���HL��u�V���@OC�	�ċ�Ƌ���I�k�a�ga8�(�y�|)�QV1R�E��H���Ǿ-����[w�����2��ʱ.��yʮ��h��#-�Q�!�I��箃��p���̯0�b,�.
�󬦴\\��)c�û(<}}
i&�mG=���a,�-�vm��)}0ڸ\06|(�1;��WG�
�텖�|�{��{�FOe���ٟ-�=����������qz���(�����n3=J�m�\'�DPy�j`��YM������j\"�!Xo`���v��n�}7�N6j	�\\hFm����4K6����	Z6m��о�4����
�50���&�p�э�8*�S��60��<s_H��`9��F`-��&�f�c���{��F�`8�>�8��F���F�bX�4ȷ	�f|4��M���Њ�m#5Ё���Е�G�΁l�~�>�`(�Ȝ�ra���7&Ln���Lo8�L�9��}�U�s5XJ���!X�ll\0[rlw����Jc���:���K׷Y��׬��2ڛS��שΞ�ڀ��5c�猬�����\\��%8ApZl�/�g��m�� #���հ�q-s@A����^�����>�&h\'�-�(r(�a/�\'CA7��}�\"F����\'��<���6�ș��W@�
&�z5�}T7�d�)#scA���Ԝ�\'�-�])s�6��&���F�Ἴ�X�3��αY8�
hMQ�IlQ�V3.�� km�;�;g�d�n!���W����*k_�c+c�������2�
h]Sp@�]@�.8fl�t�ҍ�Z���OC;�X�l���Y�W+�����N���}�F��èɻ��&���Z�\\�
����P8]�T8S�Ri�V�Hc
3\"�\"��1jQ�ܵ�C�o�hMSDk��v9��J�E��)�5MQ7C76���4E}�?��\"Z��ڦh�e]�{0s��FI���B�\'��q`��B�O{�W�R��)>A�&>h�w_3�e�2�)?2��1�1�3a��/���/��%^����.���-���,��?,�2^W�+��*�Q%(�E%{z�sJ|��\"~R�!%�Q�e���
�f��I���Ǔ�:����ĳI|��7��1��h�J���_�x*��v��_��H/$�������x�o�x�?�x����
/!���^�	o � ��#^?�;��#~=��#\"^<��1�;���#�7�\'�6��;��O
ě@�ă@|��\0��S@|�w\0��G���\0�����=�f����\0}�]���_v��~ٽo��cǾ�՗]�*�V��\'�lu�u��O��?Y�m]���\\+�i��=�WQ;a\'U��v3���\"���Ǖ�[۟T�v;�f�����QEN_��1��{P��
:��������`B���|09xX�LSw���K���jH�f�UMv�S3���<�ﯷf/Ӽڒ�
�)��	f�#XH��`9�jk	6l&�F��`�~��G��2O]�~��ϛ���l�{Q���픹S�4A1A+����t���.�l���=z�>�@)�J0�`���L$�,|�*��3	��\'XD��`%A���˹g�o$�b�KM�-9��	v�%x�����w��w�����geq������C&�w�/#��O���r��F���w��×��&(2�Mt���ߚ��zٙ�T:S��,g.`���Y�r�8�M�Vg�����p;ǜ�N�sι�\\p��I7�m�t۸��������u��`����	ƹ�
w�;���V;����<w!`���]��u7���m�Nw���=H�����S���{ѳ��xi��k��:x�^W������
�#�Ό��E�����L��&��H�,�{	�Ko�3@���M��w��\\�\0��K�qo!|Դ�Ď@��{ԟA��E��9�D8�X�\\/�r��	J·!�C������!MҌ#\\�p	¥n7��#\\�wFl)bou?���j�
Z���>�A��Π��``pW0(�R08
	��3�o[����\"�[x���$A���Z�h�g�7aNWb�e��Yۢ�E39������Mz����=��+L�)s��]M�=L�1uRժs�e|�R����K���{�՝��<�����}k�+�_C���	��Xo�K�����N��}x9�W!,�9�K޵��5���WD�wƩXΥa�@>*���p�K�|�Q�.w��&�G(�ǀ[#8t��)���ϥg>�?F�\0µ��m��o���!��f+ތ��
�Mtm�k�u���qN����9����z��7��,����vN�����zz=9߽
IK��)��+Q�_c�96�P�)���s�vF8�8���`�U=V��	�>=Q߯\'�J�����U�Q=M?�g�o�j���\'=K[��������yz�~J?��g�R��^�_�5�E�F�����:��ޠ�_כ�z�~So�o�mz�j�ǆ{ýz|�/ܧ�<)\\�����������G���b��Ӂg���u�[�s�f�<��g^�<x��e�u����&�7���[���
���+Kj�wՎ.[���*��ΐpt8Z5���_C����x\"�����W?\\
�(ˁ_\0�~x=��ׁ���XݪǄ���Rݗ�K�Xn��GᏨ��U+Պ����amXK���>P&�oZ��
�A�lZɔ�L[9\\�(SM��R
�+m��v
�kH<�G �\0��S�,�ϲ� �f�u���:YG!��z!Q��ϑoD���i�~^?OmY�Wg�u��B�1��~����z���S�{r�B�r�A��=��#F��/%u���E�D8ϋ�$ ��B��s�-�
��lQv�o�0���
�\'��oۚ��A��ux��?~��O %��J
�fAC�`�e�� *A�ǹ�B��F�NP~n!���
�tk�s����<�Kz�^s�%A
��J�2�;A/
��L0�`�7Λ�UL��ӈR��&����%�r��Z� _����L�
UR�S#3fIE�F���e�UkD����M���V�gdGd7�>N999Fp���+#��s��������+�%�mmm�������=挨29��.�S��{m���8jBt
�ŜU��@y�K�����	������8�i�7
��=�/H����g	�~k3��&���ձ��%��*�9P���-Fx#�\"���˷�A�p��&(R��)e�S���
,���c��a�+��BK	��D���QHm���
�Z���hB�GL�~�4a��(��X��k?=��s���}$�9[�츟v�{+�����סS�M�nf�*S��7X��C���R��7�T��֞ZO��it��w�G�޾�@���Zu�G���CW�C_�Ώޠ:����t��`ĜPf�������T����9���^�~�����9���d��I&I&�d7nw��M%	��$IfM&3I~e2d&�ʚɿ$�$333����*�$��|����{}�
��;~�y<_��y���{�_��}���m
powc��w�%
pW$c=y����%���K�˽p�������w��{��G�8�p�#��f�Q�}���(��<���R2؞:w<2��Ѹ������ ����~`:w�1�s��{�.;y{e�:���1L9�J�f�BԪ
�h0�.��x����Ǆ�Yn8h �&~u�m��*�wz��)�EU�WeH9uI�j��ou����]k�=����ia�@8�g\'R�I�ӣ՝�Q�?����t�����������a��S��N�;����}w�	�e���8n�Ɋ�yw9�r��7�;��5�ݘ���Iq�d�/����8�u���3�[�AM�q�ހ������jO@����k�FJ)V�<K�/������W
�3֨!�<A1˽ٲ�I��Z�z;K�����@3��b>#NPcڠ��*>��P���`���W���E
V
�3Jh��hx��[�ی!��q����g�c�\\^�p�w�/�3��>y?��9/�\'�)e�nޥt��9X�HZ���J�I�������Uy�����������VG�L�k�[7����j�u�u�z�z����,t�TϹ/�/���*�
��%�iS)?���Ⲽ���!����6�2I���K�Yu})�]]�����6�]�]G��\"�\"�r*�W;\\����Ÿ��K��18+3+w7����١�$�I��>2NtU��@Qĩ.��M
����T
��6�`��Q����:�:�N�����@o�o�پ���t��)�*K_�n���u鞠�K�}:=Y�g�ϫ����wUq���Ga����h{
~�9��1��D����3�g৙���~	�b��UH����Q��\"j������´��h������S��n�\0�\'�z\"��*NMLM�d�I�\'�
�^H�\0��>����A�A���a�ɤ���R��,
�0��߀� �H/�q\'t�������ۘ���w1����y�%�3y+f����ј듓�$�b���\\��\'�?�9� ���OO���3�4��S���Ԯ�����Ř���eЦФ�]wanm��������k<�(c�\0/؋����ѷO���yzYzU�]���зo�7ף7��6���q���v::�o�a�wq����
�Ν�������u��p,����:��T�6��P��g[�o��d��W�i-]�ZК��Q�2o<�n��n��M~�9AM�j9]%͐Y�g��SA3a�����ʛ6KT�<ϼ@%̯�u������b���5/1/U5�o�����f���y���y��N]h^kvP_3K���Ef��S]�t��n�$���`�����rG�ZG5P��ʣU���������;V��>�Z~kE��vu�-��5�Y�TW ݕ�j��g��)�au�v�YM{�\\uZw�Y��/���e>����ހ�����)�0��s�y�9XE�^2���U&J:���+8��i�5�-�9�������׭�����O�\':{������O�O�:\'�j�����-r�݈s�n�5ݤk�i�q�q�u�w/pk�uܯ��>&��H�ѿT�G�t��4��������8����9���)ʹ�����
�5�m�rGwZ����Mj�{�$�^��V)���z���f���G�]O��˪������>؇F߼���?�ڲ�L9O�xeW,*cd���<w�1��&��v-�/m���Ƕ�Ө��k����c�q�\'�7����_�˚w�t\")���t��Io��[����]�����sJHЉ�DD����4��5��.Q�~G0%4��Ù�s����)XK��G�B\\-P�Z�	�@H�9�Nmu��5h����P#�����=}O��F-��q�t��7)���ہ]�{4��\'��e�ɏ�?�?t$��??\\,Tm�\'S��;^UO�13��9��j
��;x
����^\0�/V�~5���6[��û���[�C�\"J�H(�+���HM�� �v���_?�(�|�Hk����o��F�#]#�^@)�H~0��\"#ɏ���;����p��ZdVd.�����_Y	�5���M��
�v\0�����a�z��nH!�z�%�Mђh�h]�
�����;F�GC>���������e�J�k [l���
�\0�������z�������PW�D�ͪ��DK�
u��������&[�o�lG�(�����*HV�[��^��&�K��|dr�Ia\\rbr20
�hJ�nI�V�.��w�ѸY3�%�6����@G�M�s�ݞ�ۙ�G�����>��O=~��%���I�Ou�;�w����0Sx��� qS3�٩G��K��Z,�V���Z�ڐ�l��|�F��G�`*k�\"+n���s�A�*����j4Z����	:\0e@�;�o�L��p��Z#�Q��c�	�S�T`�5Ӛ�Ek��x�Za�����hm���>\0�[��l%���tMہ�����
��n_�ø�c}��D*����h-b�����=�u��a�-��@;�n9��v�^v_����0{$0�gO�;�\\bO3�DJ�Y�\\����2{���z{����A�=�{��a��:PhoJG��=.]�t6]+]7�\0h4�yAK�
���N[㴅-Um�j�U�,�Xu��K?��ЯN�]���m	?��s������F\0��ۈ���J�������xc�9�X���\"d�%�
`�����lq���B�?\0�#�CѺ�r�!7욮��owk¾�-�։����n#�id��4��-����w[G�������4�<�S��.���bѱ����Й2?d������vM�s+\"s�^(C_gl����O�_γ��X��>��o�;��)Mkz�����E�����e�>$�3f�v�o�/�,&�����1ө��b������P�S�%H�įo\\�4�����i�(�=-|�~��H+Ƥo����D�w\"OI� %AJ��\'ۆ�T�l	���[�mY�Bs��<JX�`�aB�M�W����#&��ڒ9@��(�Lړ��\"?O����^`�O�\"�!}]�{%c(9�����\'�B�`:�ge@�?ȏg��Rw�#���l�wْ?`��僭I��6< ��%]I���0S�F~\'��Gɭl�f�����Jz �(��2�ٛi7=jLZ�����M�1��
k�9�Bv%s)I�F(�:������0���������O�(�(GKj
�p��w��!��e�Q=��B�u!�����a�����R2�� ߘa��2�0��X���1��Na:r��[��(a�A�?{22~&�*4\'�薠��[B�};� �NҚe�A=��ɑ�Lc�5Y�ׄ\\�z9������!���0�|�Ԧd
�W�ox 0�
�F〉�ɐMfU��
�K�/�p�����8Yt=+��F�/ɿ��gҊW���d�������x��͌K���*P�G��z#�����\0u����AG��
�=ZJ���b<
�=Z\"y���@Ƽ��jPN /�.�!�	T(
aVpM�Oq��������`Y�2�5�=�#�l
��
T��9�@�!�	���\"�Zoc�;�:���Y�w[��8~a<͝]�IxyyŇ�������4>)�\\��,����DĚ�:ǯ�u0l;\\(���?\'���#��Xt���w,=N���Y�;�]�dk($k(Γ����$������\'͋�w~�je�Uk��F�G���]������`ߵ+<��%�+���tF���?�$�<�f<�8b]\0^E��\"=�5T���>�x�l�`-�!�\"b-�!ˍ�ma-�k%zx��W����m��d�������B�Zr�sҒ�WWN�q����ɢYt��&��蟼K����u����+lݔ���)O�
��U���¥��``����t��Y:�R�	���!�ׅ���ο%�m�}���l۹OL��]M��m��E�j���ݙ�������Q�G�g;��W�����w�������s}\\M�/�s�q/㓜�S�t��/8og�^�`�*\"vz��y��j-���A�|���S�G
Rݬ*����YUT7s�p>�7��V�F�xF��l� k�������K\'Y)
%��j`�?���Rϟ�Ok!��;��;i���3��8����
�����/r���Y{��Ͱ���a�aK�*��G8-�e׸��{�>�V�A��[+�W�v8
}��@qZ�;ߑ_��z�_Hs�8��j�D�Ms�Nh��$&N6��}�~������3����������ߘ��\\�Z�����q��I/b&�|��(�b5�XߢS�v�z5����N%ߩ��9ו�;�O��f��E�g���Q���5$��]6s�o�m��3>@5��Ix�I�ej��a��85|z�����Zι��:}��O������SH%���,\"���>\'��P�3I�?Uo�ͺ|ΓzR��4��	?��6z/繅��5�s��?���:�r���,��z贿�a�^���g\'��54�sڿ����3E=&�9�j����8�Q�0��6���(�3��Z�J�]�n+����?�\"��R��R�E5\'	ۏ��n�s�_��\"7�=��J:��1}�g�ϧN���1��Ee��F��J|�_�G<�gh��Ɲ(�\'yt�>>�\\@��~ɹE3���_f��9�Qj�8�{q�w2�;�F��<���VIЈ�_\">jHz��i�M�Q�M�����n*W|���ԝ4֦�F��3l�4�&_ <������$$�X&)08S?�^m����E��L�9z��	4��_s�҈�i�M�HO�Vӯ��|���l�(��c4�D�8������7_�;���c
��@�UK���$Q?�1ޛX��q���,rFb(T[!B��vL��Ҹ/�Nm�׃?�/�������C�������~K8�&`�7N黦�7w���U�����f���)�/����Ӂc��?�>p)����c�?UPM�	>|(�>��`Y�K���!��n�G�����{_~1���;��/�/���g�����/��\\|Y���>�:����_��z|�[�������ȫШ(�g��#rT��늷�*��(��l�BPh��g_/��
��ez��Q.h�p�-�p����f��0L%�r/��A5�zT���j���:@]�����E�g�_��_�u��G�<�|������r���p�v�}1��v�T���yX�7I�e^`� {�������e��� �d�Z�]�ZN��VN2�q��s��g�2���ot1�/n>���9�WY�(��Ϝ\0�s����6�wO���ϭ��΁�ws>ws���Cv
H��U���<)�vr\"<���es�����o�y�á�\"64Xk�EjիP������+�=�Mt�.э��qqJ��bD��1qS�-��_��B�$��er��_f�l�+����Pn�%�\\V�Y+�e�l�{d��]�[�G�q9 O�srH^���9.\'�RQ*F�Q�����? {\"�];d�S��\"[=����K1���>pvBr\01��
.7�s�q�D1�-����|����_`�)��[؜c���l�3���O�R��J�9��Y
k,jE��R��W��A^��j�1���o���	��м�/C�!:��Wz�G���w����{�K��Yo���������<���1[�#��+��۫ݩ>�fة�$���O�/����?�/������
��4��o(�Z.�Jg�G{�^g�V���B�FPh��7D�Q�����\"��Y�Do_��W�͡+I��=(qKio��[A����΁�]��;�U&�iw%v�
R�E���u|��a:��R�b=Ү��:s�H�-�]x��Ț0�X?��V_faO#�5�4R��O�.�����]�SS�5����)Z��ȧ�/�`+ǧ����&E�N��l$d�F�L��,��X��r7�\\������Z}�ku��w�>9\\�.���<���Wn�E�T\"�n)����?�e}�����m*�v-\'�g��x/��i����h���>��eh@��*��4��{O����6�7��iz
5�IO���BK1�W\' ��C�Su��b���*6JU
Bx2.a^��d���P\"|���G�9���H�ƙ�Vq��� �r�M�=����m�Qxg2���;Z9�򹰯����U����U�7J�tF��O���X�F���*������2�)��Y��ߠ��#(�U�u��j�W��Iw�8������\'M�ғ �\'X�K{�D:��E:�d�:�Oj���n�#~.�W��J����:E⼏��qƤ�;b��o� �G���o��#��r�z�
n̺�!;H.Z���]��H(�=��AX)Xg�Ak��#��u�*�\\Ӫ�:n�z�+�r!�guZi�k� �)霼���J����k� �vk���:kq���T�f�uVT�)�Bk�9�:�$��AH
��Xױ���ȴ@�c�M����@���L���\"+t?!�A2�\\��)�Z\0ZL�u��X�f�YfAQ�\\�m��V��W�>;�_�a�4a&�2�09��K�C�+z�2�]ɠi��fX�ßO�� 9��c��.Eޔ�C�M�3�Hc�1��:���iI댵b�4��^g�����xק�J��:�`C�vhi��M;�l��4�
�!�R]��u�$�A�!��cf9��ca���c���������+��֢���sg#���m��.F����ez�&�2i��Va⺢ZI��S1�돠H��a9�:�FxOҺ�*�;A�5#9H��9yTU��B�C��U��\'��*P
�%�H�\'C_
Zɵ�1���i���r�*]���h�E����wA����F_����-T
�!��7���?&��z�V[ꧼF>�i����3�!�j�5����p���~���j�~�������Kk1���Hu7��ԫ��ԇ&�{��zRMR�ԋܢ.>+?�[�Hu@+�IJ��o�������W����&�~/��zNr=K���\\�-N�H�m>�ά�7��m��B�� �Pk)���X�^�V�B�F���Bh1Ό�g�g����Z4a��/�ń�/��Y$k�<(�E%T\"v���=�G�R���u���}��{1�=tFC���z�q�>�ϳf��-�4i__ЇI��O��pg� ��#�G����.����e�Fyi���G.�!P7�������؝U2D�H�Яٝ�at%$�ƃ
k*ݫ��>�rF�z�Jw���t7(��nTXS�}����
*�r�,^Q�e]�n�WT��_}�3�L&����v�_j��xU��W����(���s�|��E����?������h��á+��Osd�SA��_śI��X^�-glC��p�n�y���(�%B^�0�:���ћ+gl���5r����t����ժrfF�$��4��|eO�|����s5�H9W���j\'{�����>�����[�Д\"�ZN���F��Iq�dd?��rMf�)g�d��r6#{��-r6�0�?�٘l]����~Qi$��t���W�$��np��1.�|��J̝֕�E��e���B9��5,S>�t�Ⱦ3��`����)U���ҟR៊�����]�<[�T�~��g��������|9��u�=�/CNC�0*�mdxFH�cદ䄩��C��|si!��\\�\'��Me� ��:��M�G���.��^M�EU�:z]�����7�/\"[o����zk�
�5�{��B��>���p\'u��f���}�F�9\"�&�N�O��>�Z�Xe�`�ӂ��a͠�����t5��>�E�f���8_˨HoǮ�d)��R&TJ���yS��ٺѺ�к�Ѻ#��(�4>_�6b�Ů%JU��a]%�����;\"�n
\\���.0004060.0>0!0�k�4��]��ӌ>�5�ro^��ˏX���)�f���0���e0����:\'�%e�[�g�����Rvټ��~z��Qε٫��.W�{
���R��fKY
���\\�������NkbK�V��(w=j�o���l�:��g�ω�q�H �U��Z��V�~S�p��
��/��1ӛ>�<�Eȍ�d_n���s���41bn*�g9�-1�����W-��T��ME��o$�&׺���1ō�ʘ�p�8E�ى��<#��KY&�~4o�-�ni�}�8�6I6#���B�0���sJ␡p�9����Xu��t0�F�uY�Q\\���uW�k��-SXjΪ(��\\.Fp���:Nb)�g�pkZ�k����	ޝu�7F�����>�kG�IR��ER׍����w���V�:�t���r�����Gꞗ}��OW�L�-��s�W���[U�^���R�Uh�=!m��v�i��s��b�+��榱5[=p]��v�Wi��A)?,=��(��%��2�g�X���B��uV�,:��(���\"Vy�]:RW��n9
��K�i�a�ǟ��ѯ���ϊ�A{)��rl9Vg��\"���Z��/j^�����
�	E����#�wP�X�B�8�TY��Rd�B��W�<F��G[y�s���<��Up!�0����ܒ���Th=eߨ�ӈ�$f�+���gTeѵ;�p�Yo���>���ў\"�\"�5?(/�%Ǳb�ڴ���s)hd���җ
��p�
�wNT<�7��Җ�*��J��������qp�
z�1L��
�i+_�~��\"Ξ*\'8N{;�㬷׻iG���1�a��c!��֑���
��\\1m\"���H�0�Es*�\\����I��N��r�Q{*�\\u���D\'���u���aUb./����e�sK^���WR�\'��{/�I�dp��tz���s���L.Oy���|\\���L~.��d��wG��ಎ������v�v
���a�{�8<�����\\��������!��%�)q�]����H(Jp����*1,�8� �Cb���dO�ef,���nص�k��/�%������+�����C9����B\'W�f��}��������j9XM\0��rQ����{��\'%�K��.u$J
�ap�.��kQ�n��@I���w�r$�\'��-N%,���Ü����X�2 u�>����[a<�q�r�Hkm-0(����=�Z��%8\"n$�$��R�ֻZc_9���t��Tl��m6�����]u��٘H� i�
=����h����V�o^ב�F`�����s7#��;�2�*�zpr�(��ȿXޘ8��CO0�����vpg����~Wm�y����3}�_<G�g���P�w����q/y���!*-f�?SE�G��c�I2�Sb�b�x����b�����]��*q\\�����
�\'����).�B���xZ<M�b��*�	�����\\˹��RM�B��Z�9��+�J�#��S]�J��z�����b5] �*�J�ŋ�Ej ֈ5�P�k�B�x������X�\"^�&b�XGMū�Uj&֋�t�� 6P�xM��)�.^��b��H-�&��Z��b3�[�j-����F�!ޠ�b��F�ě�M�Xl۩�xK�E���:��b\'u��.�,�&v�%�m�6u�w��xW�Ki�=����x���=���r��?��A��Ňt��H|�h�/���8@=�ǌ�+�������K�`��%W1J�e��G���Y��>@�%@�5@L_ �Z �S�s��U��O�ǈ��рГ����tF��P`�,0TN�\'�c�H$U\0�*=�����O�O���*@��@�)�2V$z��M\0����@L+��bƊDLu ��X&�1V$nj7���:@I]��P��\\\0��J�\0%
�р���%&�̀����T��	�p!��o��݌��D`\"�h\0L�&R��V@C�!hh��o#>�2
��c��/ŗ�¯�W�B��@@G���Q�-��sr��rt	�/�kcM,�v���꽂���ۓ�zo��@r�oR٤��;�;���pR�#�c��w�w<����D�7{o���[����{��v�y���M~��=d{���G�ޙ�YT��g�|��]�]N
�Kj�%+Q���O�
.��-��-ju�RKh�w��F�u�z�ci�ާ>��u��c%����:���K���t�U�V��YGE�����jj)Z#-Uk�u�Ҵ�Z��W�
3SROs�<�?�\\��Pއ��@�
�0ܥ���(�᏶P/��[��\"��jIuZD���gc�|����5�
�B�:�2D�~X�I�J�����K@��zR���@�{
���.wp�F�حy�y�{/9\'�b�G�|I;!]�L��Q�S+#�q�M�T�.�>�!e._!�|ea��Re����m�ߥ��d(�����ʷ��iUU˨�T�8�*Ԛj���#/����m�yE�/��8!�B<����K���I^��j���CaB|�i�}���!�]��{4����8�9�̈́4d�fB&�@3!Y����,�LHI�t���M�fBn�@3!=Y����,�LHRh&�)4R��	��̈́�e�fBβ@3!mY����,�LH^h&�/T��H7�\\&�-4Җ���fa��o6k�Vk�Y	��k�����-��l�l��2�m�JX�>�e}��e����H}��]���B��#�PC*�j�1�
�֯za�FU�\'�cU:ֵ�۱�ǚ��>�������#(��JУ�댘�u���v�[g4�\\�q��ځ�uFU\'@��Rd�(S�\"�,a]
��2ɺ���s���z+e;h��1��İ�������c�Έ�o��i�4O����R0�vv:V�ِ����I7w�3FwX*��)����
���ZS�3���$D���-��}�5�v��Ƽ�0iݥ�]�ˮ[��a;ı靾O��	��9p;��B1����֒������.BЇ8c����������L�f�8O�P{��=�9�x+O�Q�}��9���y��s�A��dB���YW���GƓyd<MZٹcc�0�Y���x��O�& ��G��w+{�u�)ܷh����{���<?u�]WT����M�9��p
���	P������e��/����_������G���$�6�v.�}.����?��9�F�-TF��B~�Z���c(	�^�>
�e<e,�dc����/�I5^1֑f�k��-���O����}�8E���fi�d&��Tټ޼���C�!��S�)d�����i>`>@>s����/�/P5s����&s�7�0�`���E�̯ͯ��y����O�O>�̡Ҿ����J�}�PM`&�7�[,�7�7�L���/߿�����J�+�+0m�oϴ������L�1]�_��%�KL���0��g0
�{ H(Є�A��GX4A(7�@�h5A��1$�c���m��O��}a�O���`�@H�)�62�%C��R
�B��A{�!�	�^�q|WJ����CS��[G\'^�m���
��\0����p�?�+?	\0����p$�E�K��8�z�j4�!\"z�����x�Z��L\"Ҧ��FEe��ݧ�;������K�z��F/�z�����>�{�{������x\"b�/�����~?C��̋�K&b��Z?|N��S����J	��Y�_�����������h���(�V��A�x�]
��W�zp%	=0�e��v:���J�d��,�������KCu.�7)ð�l�fu��5���Q 
`��3,<��3(3b\"~ <i7���0��L|G���C�e���#����;b�����!�6DK�@z
�#�1��X
�	����|���|�d¿��c!ӆ�<����������1xN�ZA�y�B(
�e\"�IR\'��Dy���|�%^����R	�,RN@��6�j�-85�\'9!;-��s⎟o88�_ˑ�_�����D���+����l�� �������ό^�A<�:\0C��-	�]���L�D�p���!�DR��
$�q�
?�$F�3M�6�:$��a���T�A����\'^�L�`1�������F�\"�E^y��I�n���I�\\f�ɭ�`�s06�c��d�I�D��Gϕ����R1� b�W0���\"T8�Pb��9:i�
�lD\0@8��Fp�Gv���X%���J<pD+-�_\'tp�!-Ң�cƧi|G���36j�N�^��s:Um��1���g��9׮��������=�I�
�|qZ�����q���h�=�GSR1˪~�=k�S&r}�h@���Y<��n������R4,��r�v�Q���KY�rԔ�ZӺ&��g�yo��ٖn=�R����f�bx^ɇ�|�,�����+rkMӹ�f*�~�z�ݵʶ\'��
�����3���q��$�>���i��mաnu��L�4-�
��\"�$\\�y��D(�K6:�Z���7�,T6�/W���F.�ٗU������IV
xSz�����-�Nي�lJ��W�x�KQ��M�O<;��z��Z�9���T�ڻ�%gR�s�M��*|�(���}��9���ڰ�ʏU��2�ǽ�O�����t�j���.�Y.�����k��[dyo�Y�M��s���\\��{�g��uA�_��N(V3�����W�5��
��-��l�7������*���ɥL�z��tYM�7L����pq���������m�`�H=�-�}���mv�9yY��ҾI��p���Ũ>�.�|�xG�7byzLTp�G������W�f4���0eae�����-���z���j��&ӏ�I��{���F�}�МE=�}�u\"�)�;Q!nk��+�%Cid2����V(�*zS�޴��������s�����π ��p\\�c:���dikb�rg1��&�W��3��{z�on���q+|�O.<}vy�lY�c7�r�n�=�X&5����6��1������O���q��)���*$�kʭ����C\\�g��X��/,�2/�ڔ�2��]�0�2g:e����[=�)�el�S٨d��x4�r�5oY��;!�_�9��iUMJ^�tʪ�*z\'W����I��tS0��}�������;Q3�|�>0�D����6\'��!aŵb�m��d�ϗ�٦g�
��L��{�&� 8`Q��9*����?�^4�N1�Q��3�	�fۼ���.{���x�Ï�f���wlV��[N��f5`�0h�22�c����xr� �3��1f8� ��ʙ��`��O���\\��/�O6�����7�g�#��!K�x�Gn^\\���z�О�~���%]���[m1������;ğH 1Gχul�l���zzq3�Zo�����C�#�
�x&[o\\�`l \\���c�Q�>�?2\\:2Mso�.�P�,MF�ҠY���[�
��ZV�,�q�rN/���?ھ�|b��(��Q��I�d_R�=��=%.s��I�L����&��z׳|O���.�({���n�uB��)j��6�i�n<�S�r2̖Z��nu4)g_ؑ���b��ї�h�r�g8n�/�h�.��ikym�+����8��e^e��_H��T���8��|Lf�\'����sD}�ѳz16gƦ.�l
��S@��
W?V��-h�u�㴽t��1�|��������[]�;�����Z�׺��9r�&�E�����񅻮[��H�7;�lW��ª��6\'h�%�����ξ�<�|���}Y�ZAH��.�[y��jK��K�xv^��8?S���Ǻ�G�]���g��ݙ����#N������)�໘A��4����������Ҟ���B��ֶ�lYs���1c���n\\�g-֑�1�!a��qM���z}�;y�)�\'�uWU�T}ga�EZ[�d���j�s��1d���=G������ҺpcҺ�\"�y\'T�t����|��o��M<..{��{����%��N�O�ܑ��g]zj�T9����we�.�m���%����]S=g�	�Ͳf��F
��Em�$u2����v$DT�Gn�k�K0����9(�%0X�3��6D��i�eII�Y�
e���,p�NX���jN-o�*��❓�o�����y�ǩ�����1��OI�&Mx��z�pJX�l\'}����5�o�+����<���wg��\'O�m㦎�7s����wHMnX�hs��ʣ�I�����7f+�U>���ޮ��j�?���+�F���>}}Y��c�I�	�+��+ǎ7���@$v���.k����ܷ�]�T\'Jy�����p ?�d�c?2NI�=�n��S�g������\"+�,k�6�-�d���	��)1�u�]��;��ؗR�j���3G�]��8B9ns�.����|��_W�P.��_�Wz��M�5�}���ZP�i|a^g�>��#%+���ܝ����վR�gOzD��\'�m�G�Md#ߥu���Lyڲ4L�����ptfM�����ٟz6��D����݃�Qfm��_��e���v���se2�F��#��i�S�V�]p)3v��%v�FEӯ�\\�H�4��
��o:w�%O��)�͝m���.��m��`c�i���i���5�����䗈8jb;�PGK@G������:�-\"M�;D��U��5�+��Ӻ��%��^It���x=�޳�s����c[����^v���-kn뽼Խ8��5�j�U߫N����D*St}�T8:�M֍
���;��S��vMWc�����n���]���5y2���I��υ+�ǴY.C��2X?i������.���o��OOX�\'�E�X\\SR���z-�>l~o���N�s/�d��m�LUG���l�<��}Y#&�$A����9�#�i&�0t�H�|yc���a�L���x�6���9�M\"
endstream
endobj
191 0 obj
[ 278 0 0 0 0 0 0 0 0 0 0 0 278 0 278 278 556 556 556 0 0 0 0 0 0 0 278 0 0 0 0 0 0 667 667 722 722 667 0 778 722 278 500 0 556 833 722 778 667 0 722 667 611 722 0 0 0 0 0 0 0 0 0 0 0 556 556 500 556 556 278 556 556 222 0 0 222 833 556 556 556 556 333 500 278 556 500 722 0 500 500] 
endobj
192 0 obj
[ 278 0 0 0 0 0 0 0 333 333 0 0 0 333 0 0 0 0 0 0 0 0 0 0 0 0 278 0 0 0 0 0 0 667 667 722 0 667 0 778 0 278 0 0 556 833 722 0 667 0 0 667 611 0 0 0 0 0 0 0 0 0 0 0 0 556 556 500 556 556 278 556 556 222 0 0 222 833 556 556 556 0 333 500 278 556 0 0 0 500] 
endobj
193 0 obj
<</Filter/FlateDecode/Length 226>>
stream
x�]��j�0��~
�Cq\\ء�c�C��l��JfXl�8��}e7t0�
endstream
endobj
194 0 obj
<</Filter/FlateDecode/Length 74280/Length1 349328>>
stream
x��	`��ǿ3�wv��97�̲9HBH��{sqE!��?Q�	�B�R	�-�VŠo��F�h��l������Ղ�*j�iնV��V�����ކ��ksY�\'��y�������ۙ�;��\0�����~��o�Oa��{ �9�5�͙�_@|(���-�����!?R�@ɜ�*���΅!�]��=��f����D�Ki���5����u�������$�}w {��������9������%��7.1��o$����Қ]x��6��/?�Mӟ~���\0s󩭧��=׽���g�yZ˚V�a��=B�s�v���\'\'�q��U+�<���/nV�C�rߪ�-+޻��{\0���UT�.�Z�ֳV��v����j�|`f��+�9��Y�y�
�����M�9
>E�i(�����S�,�Xa%��F���a\'u�A�ՉX�s��$us���4q�	����D�IH$MF���gH��4�kR��C:RI3�F��tR�2I�PI�@�?������l�Hs�E��u,�I�C��\\}?
0V��\"�t<
H�0�������H�QLZ�	��H���(!-�D�r��N�$ҩ�a�H���t���$��0�ԏ����J�$��Z�Y�5��F��sQ���<T�����!��l���9�0�t!�֡�t�^,�q�����
�3�����g�Tҳq���b鷰��|S�3��t�6�A���8��<������Jz�Ez!׋p鷱F�A�:��q��6�<ҋq>�%���R��Ņ���\"�O��!���؈u�Wb=i;6�n�ŤWq���^����.#݌�I��z������Hz�Io$�n�&қq�܂�I��kHo�z6��\0גގ��7�C�w�z��@z\'n\"�7�v���#�B%����[p+齤��}���:~��i�~����A� ��x��Nҭ��4��vr
~A��$}�\"}����_��ϑ�������7����I��H�����׷�\"�;x���x��/\\��W���]�!�^՟�{x�t/^\'}�\'�_�A� �\0o�~H�>B/���G���o�~�u?�&��!�&�?�E�>�_I��wI?��H��{�H	{IŘiL�����1��/���c�߿4��������?�c��|L�����1��/���1}���1}���1}���1}���1�}1��hL�?�����?�1����|L��c��|LS��#�w���ϋ1�k���1}?���1}?���1}��Gݘ���Ř.�t�F\\��d��(�s5_���D�&�mf�FX|�f�gm����Z>䡛�3q��b���@ ]��ø�q,��b�������n�̠�1�`��L�)�q
�(a�X��L����s33����f��J�17��0���:��LT��h� AF׫���9��X��Vc�܌147c�n�,���lm�R 	G�
q&�#5�!�@���j?����j�9m�C_��n���f+��o����h��`H83c��L��lĹ�����VG���-Ɗ��%l
�!>�7r���F�0.Zę8|���h� AF׫���9����qǘ`�/0
�3�
���u�/˛�w:2�s���e��FW�C�����\'jaE�G*Dqqa^)ⳑ7���Ņc�i`w�$o���Ց36��n����y�������h� AF�u�0.sG��	�������T�������!^��4
�s��� ��\'�@p�P{S9=���<�$L�\\2~*�1~�䩘Jk�K��C&�8�g$GN��&��ᑽ�b��&�!b��)�!�@��u�5���gRYْ�L�/�`��p|~�$e!wjQ	J��s�x\\ +�o��������#M���e+�<�L�@�����e@�!����%�c���M#�5tӉ�����~K�C� ��a��\0����g�2CCE�Ʈ�K&L�g,
��e(�8�`bP�(A�X�]��Ԍ���#�Be��H����+�bn匲���C&��7u����M#g?�.���þ�;�!�@��hpX�e���SQU��ʇ��>��ʦ�OG�8ϙ:3��M��Z�+��Ez�VV��e�̝[5c��1�~�,���U@�!��3�#gz��$�t��&�!�X�l�C� Ӣ�ae�9�#��y����ł��\\v�?}��
d���Y���Y>q��=�$�%�����?Bk�$m���}O�FK2��Q�9���X�&��9�0�5�V�}g�s���<fS�y8�\"��oE�[�y�߼w���3�/�A�L�7�dݿ�.�a>♅�ܱy�W���	%(�4��|ʀ��9NJh#@��Q{v��\'4�g͜1}��)�e�J\'�L(._8� ?olnNv�o�WS33��RS<�I�	�qn�3�a��Y-f�Ѡ����f7k���!�7wn![��PAKXAs@���mZ37�Z������,����K�W��qZ�O<_�Ӻ�5���վ&-�>_>�/o��Z�z�A���R�V�}����j�\\g���W��V8��Z���@���SJ�)�9�fj����
���k)�jA@ɮiY�[�XS���6�HU�}��U��U����*`��h���`��9����n�5�W�V�,m(-M�
�
;���O������C���*u�2�
-�EuwAV�R��TW�M�!�S��[�$���[�\\��|��_�p)7�����r<z(ɴ�k��Z�d^,��am�-��E��(�M�&j��T��~J�~SW|���A���],.
�|��(}LF��r��w��F6wj�6y����)�g��[������-���je���%_C�2���7��A���P�S�,_4�*��}b�%ci_j&m�K u��~��fɗa!%�����zJ(]L/��)]D�۔��K�(��t�&���J����=Zɣ�<Zɣ�{����Rb���L����=�ɣ�<�ɣ�{�x�ɣ�{ԑGyԑG��#�:�#�:�QGu�Q�=���\'?y����<���\'?�𓇟<�ܣ�<�ɣ�<��G1y�G1ys�b�(&�b�Fyh�C#�<4�и�Fyh��E.�p���{���E.�pq??k)1�^��%�^������K����=zɣ�<z��:��ϐ�nr�M.���nr�M.��e7w�M.��ew߮��!S�YGi=�
yxFJ,W�(�}ۤF��Q�W�W���{t`�{��u(ە�--��ԝ�?$�
5Xac����ٗX�uK���m�-)�Q���x���n_Mq_ɛ������xu�Z�����Q�-�b��l*�K՝,L4I����u��y��AuNv7q�z��Ws�)�Nv|Q�nY�NvPj}���n��O(���|����̕�if�y�9ӜaN��Y\\�X��b�X,&��\"[`I��{�l�/��b������]2S65��=$����+�rm}�T�Y��eZ`��[��ݜ�W)�jQ�P(/��6�e�s�I���tM��t����-��46m�)ᲫӶA�R.���	��sgyf��tO�]A������Ō�M�����3�%lA�h�
�v_e�A�UVV�*�ƪb�dd_�g�4o�v龾*�}�8xh��j����\'6���D>gk�ڃ������x��pK��H[$֮]���ڂ5@m ��60yEb6SS��MT6�`���N���[��
Bjcͱ������Fw]f���a�٭B[WjF�ُ�+�zJt\'�,���y]c���K[WѤPN��,�zK���2reyv(��ias����e��e&*}t�[�Ki�h����5-�5����X{w�3x�l����`�ďח�t���5}[]�7�v������m��D������9�ʵ�)���Z��m-�;�4J�#��{�n�a���>����fu,��F#zF(�ăxE+i�>C2>�R�	�G��t	�_�F��o�MRݻ%�̓dS�����s�w1��.�1��~��~�O)�?�+f��	X�w�wФ�
�@��-��Ђ�����z܀�J��?�Vp	mo:*P�?��|\\e�l�c�	��ɤ/�Wӕ��������A�ƃS��c�/N�e�EJQ~NK7�G8 �哕*���<,�Y8�����:���E�_�7�c,Ŵ�J����{v}��N�6<K���z\'�5�t`�~��݅?&٤�ғ��5_\\�ߩ?;�3���jg.œ�%>�G�z}=梞Z~Fʐ4)����r��N^����[:��]�;�3�;�8��ыw�)M�/-���>���
y�r���A2�����t��p�sx�$#m�X���)�-�,�.��y����p�ំ/�9z�S_�B�ީ8b=ۻхG�����/��ri�t��z���U#/�[��.�!e�r��a���p��y�k�ˍ��-��o9p�����?��@}\'�����tD/�^q�����W����m�t��
Ҹc썌6���y$�;�I%��
�H��@v��g�$�(A��l�`K��rD�\"\"�4B�vr?���u+a�`3�8�Xڰt0t�)��F\\H�5�9�v���
����Hx\0�d�����L�-��^�)�\\]ΖqLn���NrW�����[����h��hNK�`�ש�\0:A�euɢ���|i���K�X\'�uu�;:�l���mqT�����?��D����w ���׋�5��D
��B6rSʿb�ܚ|a���k_
�`����cS�mn\0�J\\L4t^�D��E��3E�g;��J�D\"�y�kȩ������H$�#8U_eE5W���7����/�ql{bF����c�����,�K�\'�8�$|;~`�M����Ҹl|����f���6�����+�����&+_���5�f��Zu���]�v���È�]yU
D�13샲%θ�ݭ!��b!r�4��1��m�g��nYlkP���o3�՛1%�q����|.�p	l�vVV��#U�H$	�O2O[�6��ff��7�2�.���Κ�S��n��y�=#�q����s˰�l�ծ*�k�o��}a���l�@�\0��E�+�(�	�l��� J�2��&��gA�(�d�� `5[̦ۨ��5��pd��#S�u
|�V�\"T!\"~��4>4>3>{M��/��}��vB~
�Sn ]ik�t@:C�����j�L��>�Hi�-���I��+�%�+��D�4��i�VV\'kDO�١ˡ�8�y��,
F��h���k�L=sZ����=����M&�T�{f�K�����+�]�31X��`���, &�Q����f�-4����]c��gfm<��Zc�q�8b���g�����ÇO��w.8P�۸�x�xĘps������o���p��r�|��+�e�=��<�{�/,UW��h�u�
$�`!�F�?�S\"�#g��ᱺ����H$;%Þ+ĮT�JI�P/�V����pO��~SH
��{��aͶƬ�ʤ[�c��=�$��/t�I�Y�D��5��O��6*\\����Ƽ��{ȯ�Dk||�m����퇷<g<k���m�WV��������O��k\'%�nkQ�\'OX��ߋg�Yx��l�zy��z���0�t%A1�>�\'+�f��_���E!��~W�c�c�8�2׺W~ܾ\'��������%�Rmh�%Uvz��G��W;9ٗ��*�������
Km�OY�[��7�4�g[g�f����*^��.s{��
3쑕g���G��:��a�9�9�:gu���O�B�Rh���
O�[�����Ӄ�*���B9��n?��n�?L�F���3�>��ᯝ)J��)C�������F��/jaqsхDљT�Rt(���*䑞��q���쀻6��ဋ��Z��Ȕ��;�ۭp�V�������u�=���[�m�ʩ9������d���WK�<�/\"��V���8����L�b��P�w�߼��������_���؃��qҽb��!eŽ�m�F�_��3�nX6:>$�U�g��g�f�?^�5�R�S�+�y�џ��`f?!c�WwĜwj��er����r��E̓<�I���V1�KtE5C�UWv��Qdi%[GR��������V��0Y�
��j\'P�0�݇�-��w�l
W-��ZgO� Aڀ>�܁X�^R;�M�\"�`�%��ɸ��7&?\'s���Kd@�3�]0����is��E/q5
�J�k�o|Zc�Nq���,/�j�\"�i�����C��d���`�-A�D�p/�_`�E0{���@��Y8K
���T􄞿�ǲ��g�xZ�h�m_���!(���m%�֑VHj�^ ��%���dU�A(���*�n��Z�z�u�ŹT�����
������@&��\0:Usb\0A��JK�\0�Bm��5�����ǲWe&MܯT�Lbs�+\0�߂�1�a����\'��gL�1o@��^�����my���̕�a��D�\"Beo���YS��rC��F�u�N�XGgt��i��qD�*�?�(��v�N[��L��Ld�j��F.�\0�US�pg��{���O�������\0)��G�?�#�K���{^�y���}��z�y��f�I�dnHЁ�P�DQ�A�h�&��h���@���~��[G�7e��;{�-X�_<mF���Vi�΁�K(C˭+��-��3�1���e�������_������.ߘ�D��o<l97M�
NZ>wҤ�����^XZə��>z�����o2�/++S����鬅]�M�{�Ǽ�l��[��t��$�	���F{zwO���~/���������qޏ�u<z\"���gͥ����\\�g�T��3���dk�Av���ݵ�gc�
�b�{��1�������=���WV�x�g�|���*9��Šx��a�<��T</���vn���:eT���-��c�?�9=բE��Ϻ!E�6����\"Y(	����E�J<�)������N�*�oU�Dge��rU�YQ��G++�����\"��;
=3�A(�n���y�<\"ii��i$
DP4#�ղ��`��ј�R6{�7#+���rJ�4X���\0T���t��fbBJ����[�Ѣ���1��zC>sζ�Xu��Ǘ���O���O��mo-8�m��p�S�,������&r 8%�jТI}��w����-<��1�v���o�6h½�-��m�Dq�\\O`5i𖉪�̈�35��٪j�4{�N�N��G۬�������鴢���Lq��P�]^s��T/����%
��Q=�I�k8�`F�(�e%��CS{���ä�(�\0HS?�T;+�[ڈ��D�������!�k���Y�f�n��>��pc˦�,�?mP�q�hȌ�1�����USUO���Iפ�%US׎f�
�\'I.�ѐ��,�a��!�.7�ag�7TU��C���Rr�K��誺t����q�*�3Ny�n}�\'���X���t�;|�Y>��r������p(�X@l�b\";KM�������sJ���:�n9�D4J%�n财z�kL4�ʊ�8�3��sn-�5plȜ���_��a3m5��I�_K2�>��~6�F�{�h;�������t�$�8v�o��ت�]�^I���pA��#W\"ؖ��7��\\C+�^]L�6+g��2\0B�
��3:��ꨉ���I�\'O����w�K��Ǯ^�*@��Q��
0�\"�=xt����
�ZPP�b���GӐ:GaX�V>
�Ψ����<��#=��3e`U!����h��<H�n�1t󧏎����aK��,�t�#��GͿ>4|���~lG��Ȝ�ȩ����#��y�r���cWMHll,��i�Y)i�6�&EA]&�T�L��3���iRl�t\'ָ�+�2O+����p�U��|	�f/ּ���kl	)�Ee6*Zp�y}���΄�+<�\\6g_�yY��$$�����1��o1vRK�(-�	\\K�w�C����̒��镃�_\"1���FL��u�h�h\\�#\'ҫ<����;c�^�)v���F��Z��|��L~<3���G���^R�� ��
xm��\"F�	x����)pDHEI_��Mn\\���&9n�vGDsƜ��r;�
n�!�UV{\"d����?�FF͝�Js���h
�a�֝E�4���
މU|�b���h�@�r�ʽ���8�?}��jo�^�+op�	
�^��.2���+��YXˊe�Y4+���2fV射�7��V�F>ӰRٖ�
�P[�2�5	���ޗ�GU]���f�L2yo&��<��d�@��7�$$����d&d`2�o2!B��V�Zj)E��O�Z��R�O�ԯUD\\����?w��j��Ժd��.of�d1		IȜ��{�}w9��sν�͛7)��3/�,�N��Ve��2%3\'S�̜�:Q�ω�g��%��7bQ3�f�3\'O�a�w���>�x�� ����\\N&\"���L�)��dj�l�Mխ�O<*��t�S�sU!E)�V�e�M�D@��
�g��b��b˒̩i+�6.�礤�2[�����PX;U�}��ʴ���.۹6#nLf��1�\'g��PE�V��N*x�o������8*1q�yTZbb�DaZ�4q�4����lZ��5fTb��d�BIK�JLR�B���ct��@�??����|D6TY�Λܝ��]���;�ɓF�J�?�I�<9i����`[�:~|�bϺ<g���W�u�<^�6n����,3r3�5?�{M��Oߐ��qu�}������k͆�(�}�x�N�d�e^�(�E?��~�Oܐ_�&L��9�0~bj�~Y�,keA�٠�
b�2X�}<)��_������쳉���{����w���
l=�%o@���(]����)��o�x>��a$�\'`<�+dc���7��j6-�M�\\���/��h�<,߈�l�σUXw>�bL��ӜE��E��\"�/�U�ߊ<V���c��8����rG)���A��/�.���]����Q�G#�\"�c�h�\09�g����8.�����7�i�^��x/�E�\'���Oq\\q��s<
��r<�����@;;�N��BQ��q)FL��_���/9u#��0.���Q�����zHNuS<�Swq\\�R��x�[��GY���S�p\\cS�x,��Ǚ����p&�3�3�ɟ�L������9���p&�Kr�)�#c�(�8�=cō��d8��K2���	oWq��h��L~�+c����q�ʹ��8N�a�Gf�8�0��$��s��6�$�O�x��zP2NQ<����\'��Q<����r�[�O�Բ��8���O�sz7�ɜ��K��\'�)>�̩���8����I�c��q���G�L��n��v�\'�!D���B�eW|H�����!����OA�ِ��ofA
XNK���7��k�e7�w���3���`��g��1ӫf��Yd`�;�)6����l\0�\" !���9���ӜV�
�*,WM�/�cf�V�1�u6�\"��9����#��W���0GU@ePB�	�o�U�9i9^��+D%�,�#���+�2#�-�TpTl�����\"^�����Ҙ�b
��x�S����w`��k�yJ����*>2����Y�p�8*-��h�s����b����R�u6��>����j�*�:�#�����6����ݢx�������\\�qٕ���z���5���m!}�e�����DyM�-*�B����ޤT64 J�b��9�J����㲵X�*���wڔje�2k��فn����f����q�����V�ɶMiő��LI���(�^���(vgK3�٢��v���ī�Xā��Eivx��>6W���S��/��*�@z���J=�N��co��Y�-X�B����qd!��a�Nw���NTK���vmS�;g��)�-t�-�l\"O���ȍLT�R=��B*��N���h\"��ub�vO���ٵҳ1Q���p<�ƭ�fTV����it���Ero��Ʉ`�(�Fg�yΒ$�Z
���fQV�֔T��Q�����f�RY�T�UV�VZ��5U֢�j�Ҫ��W��a^iŲ�U��˕�X����R�Dl��R!�J��Ic�E�e%H,--+�YkQ�Kk*H���h�RU`�)]�����T��VUVa���lEiE�{)*/����^1O)�EB�.)(+�]�B�e�Uk���Kj��ʲ�\"�\\Z��,-+b]᠖���[���E�V%�b��8w�K�h�W��jJ++�0�UV�X���(�5���K��,J������Z��qb�J�֫(b�Q+��\"�^U]䥰��۪&�Ck?9����&z� \'��+>h$<ü��m�\'�МbZ����^�k�1��b�Mف��*r?>r?>r?~��ǳ�T#���=y6{�����������<ro^{o^�N��|��|����?�����Kv���l�{,<�j�.�������՞{��t����b~�ZZ#4���[��Y{���/�Y�3m�{
���P�#����ֲ�99:����x\0q�x=�ֈ�M �7�?��O܇������#�c���?@�C�S���K\0A7J7
t�Ѻbė�V\"^���kt׀�ۡ��/�R׎�_�<�A��ާ�!ު߆�v�vĿ��>����n�n���!�{�f��5tQ�F�!>/j!⋢A�.��~�ˢ����F�&z�ѫ_��ї!�>ڇxkt+�[���2�:�wF��o@�Ƙ{@��7�^�����G �������~�lx��3|���X�%vml�b�4Ƃ`�3J�3����0�\">�x��B�a�o�x�\'��\"���$����\"������c�?1�C�_�!��%o���3�?�����O�,�)�O�����V2� %H)���I����6 ~���ʏˏ�(?a�)�4D�$S:�L�LK0�k��!�o��7���?Lg��?Mb�G��1�3j�Yoփ�e��mގ9�0s�2�ܙhƹ3�I����	8�	�0?�	{ȷX��0�j�6�|�Q�V�p��Ѱƀ6�3�(6C=�
���7&�L�F�vJ�q�yO��s��qZz,z�%x��S�<_��u5�[`��A8��qxN�k���k���-z�r�l��S>�-�i;K]�yz��M|暼<=�R7�w���ϳ��GṊ�\\?�y~������1��W��9:�I�O���>/l�oÍp샻�8�����^���=�>D\\1F�1	W�ٸn,VV�\"���-��5�e?O�|\\�}\\����ֽ,��Sn)[�����tYۧ,��Kl׎m\\r۹Ķ�r�������U��U܂����|WW��9�^S���X��{��X�-O��j㷎h5�{��t<�̬N���:�қx�7��қ�����\\7s۽�K���<���;xz��=��}έ���z��1��)������Bܣ��z<��x.�]ܪv�c����������������}�n��w7tf��9׻����Kg���^W��p��p��p��s�\"�o����B��(�
S�0GX$
e��Y���x��=�M��ُ�����9�{��p��
���_�(wA����Nh^�������\\����?�c��G��5���%��.���Z������*��5���s����O�f��e�_����+�=��{�d�9<����qo3O�b�O���S�I�q<�	K��� ��ܾ����� ��!��=��S����!>�_r���K��0������G�zs�K�{#O_d��p�H\"Oy{�r�~����,=��?��f��Uh���τѯ�џ��}p.����ǿ����KGK<�K���bm�\']�_�SnQ�ٞ��=�S\\2O��)�OqI=�g�Ĥ�l��u��:�k�8���ӉZ��^�Yk���{�{�g�:���,<*eρ�~�=��B�}NF�h9�N�ǅ�J�FO�g�і0:+��	������0�8�.�+��0z]�1�n��hw�����;��k����]a��0z}G}W}w}O} ��?�~ �>F?F?F
��я�ѿ	��k����a��ǙZ�EYK�頖>5NK��--��=Z��Z������K��kz-���Z�M���k(?�]N�
��a�3���k�_
�Cov}d>�
�%�ϔ�����H�]��[�?��{.� ��:�\'���4��齭�=��|�m��V{�r�G���3\'���C\\J�z�s`���~��n��\\�d����
9a���;�@�.}loF�{=�{8���
��9崺�9�TMӜ�:�`pd}]��?�{HtO���x?��TKr�{��a��#�cװ�^6���gT������e�sK�[��sK;�hw+A��͠\\�d�Q�Ň��\0�u�<{��\0�W�@��s��>�����c�!������ky  (�ɶ;��׎��LE?�ݙ��spw0�辯~�Ӆ��e�?-��[�
՝�{Ñ.\'�3!��y{��\0���ǡqįw�JA*t�p��Z�},ܧs;!��������NK
[��I
�b��V����;��>��?�����߅����V����e��dwk�����l.��ER����F�~<������{�?1�B��z�904~�n8��������H��/O\\h�۹X}��k����\0�����k8˩X���t}�}Α�O���6�
h� t�	}oH�ޯ�ֺx ��f��5���P�?�x_����Ͻ|5��6C�����}�u�|_�{��
���i���sT@�4�9�\"�гgI��������,�Q���ON��i0�{���
�E����B��GxDxA��pJxUx]xS���pV8\'�K���� F�1�A��D�/J�I#�S�4Q\'�S�tq��!f����R1O�\'.�����1_,�\"�X,W�+�2�\\�+�*�Z�k���q�x��^�\\� ^!nm�]t�
j]&�C�ˆ�}�!50&���Z��`���\\��Gl��p
s^^Ŝׅ�1~Sx�
ū
Bj�YPPc��D���$���d�s�s��0��� �9�Q�
`	�P!|
��X�vWeh{���o
mq=|��r��Mn�j��+�ms#�B��A-ڨV��:`
N����m�؂v���wC��^p�����}����/���@��{����>hE���������#���yCz���xK�+�[�@�[�L��i�Z�G�a��hC_W���C���0�v�	��$\'a�y|�H
\\��d|��x�}�%��~%
y܊^l%�BOV�-TʕW�UػU�b��
,i�\'Y�ְ�}���V���M�i�UoEҾj}�����C:X�:X��H�_𿬿{I������d�+`-+`��7��5��:V�:V�gX��X��a�[˪�V�uF�HB�H�ֳ�ձ�=���9־��}�c��g��<�^�q�q/�o�q�q�m�1*�V�೬�������gtpt���}���I��
�٘nL��t�Y��;Q��x8i��wC�eM�<kb=k�s����5����2>���d���,���e��Y����ŗX%�e����*��h�����]���^�,��r?�Ǒ���B�,�%�}��=$r�o�O����ޭ=$�B{Dĵ�ڣ�M�c��]y��-���) D���^%&��81�|���N����(5{�>QT��x4���Ee�����PC�KPH)\\�[y
�+�w껱�kgԣ\\��4Сdt�G���O�g�һ��CY�5�&�80�^C2F��	�8c8�^�Z6#m�cL�`R`�1%����,݃n̹}=��q���;B���JpB�Q��Xg4��&c�kZq݆�}��C�Q�q��8et��K�����F?��0M�`�݌��2PB�Y�����ͩ���Yf�6皕f���p{���K���@�Y���/b<��:`=��`\\07��-�R���zs��}؃���w�N��:�R�^av�gP��=�f/�ӼL�ϛW}�
����P~���_D.5��W�����#�
�թP�7M�M�c�m�u�m��P�^j�u��p��n�?��F�[��M���CG	f.��P:��ՏB��bF�0p�#��.���X�*!t)t%t]?�
L�Qd0�Ó�S�U�ްJ�6s�*���AќpYx6��	�G	X�!��\\��p%cq��@�][������\0at�^e��k���:�n������Ɔ�a���	��\"�Yog�@��]zix�^�o���m��F�b#Z=��
w�]��o��&��o�&���׳g+{>�e��K���WT~Je�P�����a[\0�Kͣ�blJ�
�\0[��/c����|
%���}5s�>�K��:���j��P�ׁC���b?*���u����sꓡR�T�v�m�ol[5��ws��5iC�{��C��F=�N:HmV����ߞ��������ʇ>���C����������7(r^��5����:������ٝ���Q��j�9t�<Y��_ýG5��?�����Ŷ�s��r���ػ+�
�o�*�R��\"Mi���]4�C�h}4�k����7���=I�Uwq�L���|�i\\~�W1GEr�3Y���}��4���\\���8i��S$��6��7qɯ3��/����]���C�g�y�d�öU�W�S�v)�M�]��Y!�S=�,jɧ96^���f��m��cؗ��ˬGa����A��[�7=�����y���_��G�8f�ݮ��%5P����XE/S�@��-��չ7�x,�stp�Sk\'�V,#�>��x��wa��SW��o)�i����@F7�Q�e�r7iKk����>*?����*/�|��Noy��+�B�j�ϞS��Rn�R.�p{p7x-Ű��
�Kc
O��2�X���a}Ж�����
;�����N�κD5O��؛���a1����O��g�U�گ�ο�gP�[;��Rdb�>�3�i����\\h��o�\\�4��(�(wrN�bϛ��C�<ţ<�3�E撕����<��<������\'�UG��q�o�t���Vΰ׆ʸ���6^�8�l^��R9��ʜr�j5B�������/rm��[�
�K*����~*�bu0�k�U�/y���\'R���T�^g�R,�h�2�-e��~�[(8�3�n�����a������}I/�+�y#�H�&��ݑȧ9#-Z��*��ce���������M��7�`�4��0�fN6��9�|�����Zqq�dm1�w�����F�o}�|��]����&io�Z����t�#��ao~�Y4�V���y��Q����6���q�������>�w���P[�}^������~�!��_q3j&D���yE����_�^mE�a����o;�;�q|{qnf��߱\'@{|��Y\0��C��^�%�f�z�fg�y�:G,��1ט�ؕ��?�$�\\�N�;*�
�Q�3*t����*tF�Ψ���uܞ;A��6����BWT�]Td]���_Զ1|_�cw�BCԣc���e�>�y?/��̽swܧg.���N�-fc��@�� m�l�!�0g����������п�)Qʕ�e�R�4(�J�Ҫ�U:�J���~9�S}�����g�_̗K�
�++��M���M�M�M���f��|��R�_�@\"��|T�d_���D����	�l�n~j���/�+�iy%N�{e7�t̓�Q�0�#�ȋ�$�W��S�{��=�Kv�eˍ��
��m�2���|B��i`k}R<|�4|�2&�r�:����Ԣ)r�\\	m��LΖ�d�������\\V�*7�T�(�}�/@���~�UΣe�ܪ�&��R_�Q�����N����&_Ji��	��qr+��T;��ɯ4������o[�lj��eA뿫�7@�Q�>ڱL �Kk�5�p/]�2ʍ!�{}���w��T�D�V\\r.��A��(�\\2�%���;x�?���C%�S�5T���n��KN�w�JwY�S��m$�U;�m:��y���9�Y_zp��m�L+{����6�_�d��	�����Z���[��U~��®U��>�vrk[y�M�/�o<B��P?��^�����	�T�i�S�Oؿ��p��t�9k&�^�nj���6�Ɍ� �p�����D�=6fE0V�?��;��8�rf>���K���Qd���������<{��A�,�C������\0ٹL{�V�=���B�~X���O{�2��\09���򾕷\'oo޷���w+�<l���+�������w������/������g�Yd�W�_��_��j^4e^6m�!����І�BC�B_m=j�jBFWļ���-m}��^B��^b�>bҘ���C�CКx����
�����\"�T�����V�#�6��*�˝ȗ{e;r�A��vd��4����c�y�O^�q�3?ٜ���Yc��ߖ��3����8�\'rP&�
��Vd�k.^U���Ȯ;ß���ë$��v2[�c��9��B.I������kC�`�74�Kv�-gKkq��<J��O����4�V�ΰ?S�&�KB�/�/bKX�])����D\"����7e/�^%
�k���}ٟ�~N�d7fo���m�u1\'��yż���+ba�3�#�A=�GŇ����B�?�U3��X,���p�C� ޏ^���.�a��a?�=����?O������W����)��3�TƋg���&�O٪�T|WyU�(~�.W?
}hU�^���(>������^V��ԛ~����V��6j����#��J�%�%e�v\\{Y����,M�pVNVDy1+��RZ�ޔ�eW�gr�?�9MR��rN���|-g���|;�|K�+9��{r^͹)��S�#����ˑ��3�LY�g�EdC�/�.�M�U��5�]��q=._ѓ�]�[���?����=��̏�W�
!���U��]��.�5 \0`�e{@
(��`Z��2�@0���P�\"`)����^��`����ȇ���=�<agTv7�7�v����m�v�\'�a��<3�^a��{TN��3���2�?�k��Λ��� �����s�d��W1Rgy�Zh-��Y+�j��Zg5X����m�X�V���:`��(<M�q��m���uɺ��n��z�V�uv�u�ZM��zZ���i���-��O��SQ�J{<e�l{�]��U�Yb/�W�5v����`o���[�f{��o�B
�z�xg\"x�3�)uʝ
g���Y�,uV8��o\'�Y�Ž�킏�7��;�Fg�����춖9{�v���9����u�9��S;���睋��;l�m{�=7��[a��c�p,��O��Z��S`��g�=�Yԟ�9V����g�ó�^^f�+m���׆���`]o
79;����;�-ֲpk�
�XK�����E�!���np�Zm������hst3�;��0^���I{�{����ю�a�[�6��rJ�������Ѯ��ho��]�jO����GoD�hCoLX��9/Ӝy�@̊y��pC,#�-s�c��3V�*��+���MC��Jm7V�����U�E�Ipk]l^l��ߩG��ŖZ�����nel����bkc�c�����k�b[c�m5�3�=C����X{�u%v��6Z�4:�cns�dl��2v:�����]���Ʈ�n�nE&�e<�;dwz��@����Ntv<f�w(>.>�-����X���S��^,>��X��όV�g��������W��b�x:v�;�_�,�%�sD�x��[�E������ȿ�Ȍ㛈{-�X�u4�͞o�������]����k�~#~ȩ���6ďC���nY<�<X?�������W������heBM�&�	7�H$��x���NLNL�&f$��s��*{b�}8�<�*Q��W\'����I[��vyNbCb��&��|w�*��DsbGĲ��]^��ǹ�ؓ��iL�;���Ӊ���]^S�L�\'~%��O\\N\\�V�@<��\0ՙH
��VI
��걳�ې\\C37�v�U�-���Fʘ(c�������ɭN�ݕ�j�]a��6��ɝ�[i��ܲ{��Æ�?�k��ɽ�a�1ٞ<��\'�$�Q��>y,y2y�;�9Ҙ<��ϓu���:�Ϻ��d����:K�*3�M�GJ�ל��u[qx��J�&2cemHIw��#��2�:��5�u
i5T�]���Ҏ������Bj�S��َ:{\"ۡP�RSR�S3���&o����f�u�h3��Xμ�̩Nkej>ͦ���b���T|VjYje��Y�JU�����S�Z|j@�%+�
�A>��fXnu��v#h�a�`�܍-�g�l9,wKfQ����V}�6���jZ�c�V�D�m�fH�B�7��iu�כt-PCc��e�;��P���集���:���;N��=�{*�l�V�r/g�h3\'�>�KT˦)jGC��hv4�h�Ѽցs��g��z�4��hF:�]�U�o�)+��ݣ������C�#��oX�5\":!:9:5:=:S]#Ggg�F��ft>_EFE�D�ӵ���U׶�6�U]��*5�2�&�ZW����Mњ��������,;z:gF�\\�b�.�����3b�X$�*��q��N����X7�j��q��9փ-��eK�5�,��V����cC�96L���܉��5�K���J�f�$6�� �b�����zlblJ��RG��b3b�9�y����R����V��[�{+ckcb�սu�����gl_�}ꞃ򛺫���c�bGc\'U����ܯ�R7U���η��]�]i/bSڛ���ڷh�վ]4�}!MO��W_��
u�t.rOAg1�>�
�Z1�y�/�6Z����Vd��s�}h{[�q�9��y�se>���E��@sj�}�gl�A�qY�7�г
��\0g\0d΃�R�$h/<��cl��6DbF�3<\\ƴ��c����@�t�l���.C���]D[��(��o����[�7Ç5����35̡x��࿻5�o	~
�ͻ:���4�bt���j-�̖l[�m�o2֪0�l�_�]������|�b��
��\0�
��ܢ���>E�������|H��o�A{?���\'���P������+,�������g1�
���l�	�z-Ϊ����)�j����;��1Z:�yO�L�c�0q��qU���0��*���,�t�<��4;�+?����h����a�V8�c�����ɞ���.����p�wXd�\'�/����W�<9�8O2G�J����Yo�0_��|q\\����A��9N+��Bp
X�����~���%u=�<Za�Ӕ��>��U���7��^\\���>���Oq���Q�K��o�+_���@?ڈ�6�%�^���ç�j�4K�r��������LkC��(J���oq����:��O`�
�ɱba�w��wڼK1[�Ǜ�h�;�\"�n�>�]�m��5m���6Y���$ޡ�m�6���|WB�\"���ƈl�GQ:^L%b�(���/qG߲�=}�x7_cK܅�\0;5��k����Z�	#��`w\\�b�;�ԕ����Ίjŭw���VV���.�
����:�쇳�s-��V�b\0O�-�������2i��7�T�C��o���;�b ��}E���n�
��A:�g�a�K^��jo�,FZ���>���U��n������@<`��z�1V_��x��g�c���\"���5V|�g�c��n�U��aqL�\"��eQOatJ�2$.�L�M���[��/Q�P9B��c�9YN���L9[Ε��\"��笔k�z�I��mr��#�##���q\\����X?.:G�
E�޳��s��K;ﴋh�ː��؀~��D;�ɀ��ϲh/�������6�\'���{K=�h�үa��f�������%�=Z�ݣ��{�v�~�}ڗ�
�Cz(xe�vS�n���馮���]�Ly�m��d�ʝ^j�7M��M][�4\'���N�cӅU)��x�����1}%$��pR�k���x���?��-Gu�L�KM]�P �\"�j��*�j�_i�P�/��$���/����;��9)�u�t��ߡ�N��K���:T���yi�����mGb���Qn��Ƅ���B����dg�&�JܼдP���p�)TZZZ��+޿N���C��md�u���-��Ў�n����e�����N��Z\'
g��pv87��w��

_ׅ\"�_$����GZEr�ƂC\"�\"�\"=\"}��f R�?O;����#�\"#S�����O�<2����z^&Y����m�̋D\"\"U(�4�\"�_�U���
�)��	�3�L��
d��l5ʢ��5hzЋh1-6\"�@�x9\"��
�A?	_!f�m��è����T/����t9hԨ�F�Y�E�S
z3�j_�Iħ?H��\0_�?�\0����������6�������z&螠�a���oQv0�h���P#ql��x��\0;�7T���y�ǰ�g�k��O���ʖ��Q�¶�@�_@�������?��C�?��m�o�q�
$�2ǹ\\,��{i? 4�O��1S��\"���::���t�����:�Y�%w���>�=Q��ISI���D,+��^l5b��)�P����ǉ\\��((�(m }8\"�d��d7�C��_�r�&G�b9���r�,�3d9�9ri�C��<�%����\'sh�_�w>�����F6�7�h�c��lĝX���i������g����P���7?E�ׁ;��c�K��5���Mf��ֿ��$g�{���=j��;po�%��V���ۡ��$�\"E�l5���,ك�A���7iO$���D�/��[ŗDwѓ��vћ�r��P1L��{�Hq�-�.f�Yb6�ӿ\'�^
���D<MSD)�Q.�yD-U��a�XK�Al[�v���}Dm��IMط*��?���oV�����0�m�9\\	~.�S�5�%�y�xW ��3�Xމz��\0?�-A�~x0���1�|�ʃWx�-y��4f��\'�A�����YbN3��Yfվ�\\l.3����:s���,�4w�����a�:f�2�R��Yoβ4˶BV&�����\\�yf��ou�z�ˬ�� �j��FX���TO�5�ja��HC��&�uL��[3�����s̶暵�|�,b]D/����DW\0*����k=�P�Z����T������bٽ�M�5�B�}���ډ��q�H�ek�u\0�,�uܬ�ls�uZ��$C��O�Yf�αv�Ug��Ө$�ư�j�
�\"G�ncgͱ�r��U��=e(�M�����x7�|pf8��e����Z��6L�_1�5�U=��j���`s���6~��tX2��eL�M�W�u���?O�V��
l)������߶&
������h��,An)Z]��N���g���E��(p\'����W*?C�Z7�g.��)�!?�i�����$�W��O��g���Z1ϑam���U~p��\0��x88%�繿4���#��\"y�;��5���y�Z���\0z{�Ѣr�\'�G̟�ZZ w2�B�?��j�!lt���k9_�A�᝭?�
z�Χ�~J.40EWBCE�z��q=c�t<�$���� 4M�{�v!Tv���Y��[+�BUߢS��,�6q{����˜����
�&XG��`A-����	#8��ͻ����~ѹ�[͜{���S㵹98�&���<%�\\;>o��?i��_�_ͥ�����93m�ݚIs�Ų;���&��ߡ�X�LP� �)H���:��	���1�s�	�2	��N�;��¹	�`�n����-���\\�\\;߸c��q����%�g�:ýS����O�Yw�o+�R�|��Y��g�5D��=*=�?!ƞь���}k���al�|E�e��`+=���\0|e��%��y�z�/�~x/8��wh>���z�
��O�������L�K� ����{�v����Vd���t/�܉ZF��:=���~%0�e�%����\0�ǰ
�0��l#�������,dJAß:$uXb��?@+^��9�z	�%��У,�$_��Ъ-���g��R�r�B�_�oF�-���C�o���DW@�>\'�M�h��y{�=Rv�],n�g�墕���]��~�~F��߷ ��
�_Zw�{hS�����N�������������&�U�Ba�G�g��ϴ����PG�a�����?���M���	b���?�Q�V�,ڋ-tt;��	;�o\'��-N��G�����?��\'�1��e:�Yԉ�D�:
�U:��@~ኸS���$m���_��]2(��H�eX|Yf�1T��-�W�
�	Њʠ�5��C�����ڏ�׿Ϳ]��u�:�<K[���_��v�v�;�DG���v��;�M�bP�|��tv	���Z�o����y#�*z�V�-��+�U�Z��fm��]ۥ��iG����<q/iW(pL=��г�vz��^�������@�H�������Iz�>M/�g�q�J}��X_�W��u�F}�^���w�������1��~V��_��95���F��k��Fw����d�#���X��1��lL5�3���lcn\\Oj��禮}Nj�7K��q}ͤ_�o�Jc���ؤm7j�m�N�_.�Y�~J�O�_��?������ճ�8`�v�~2���s�E��h��\'�i����<�<�<=<}���BC����{�y&z�xJ=3<�9�y��*�R�
Ϫf���e
8�У�E��y�sгA_�)�|�R�OCv��H��+��d��躎i�x6�z\"A�y�F<��I^�w���0$vǋ���2%j��-]���F��\"�Z=˩�����\'7���������\0OZh�����g_�_���j�}���:�Ͻ��&>�u¨)����t�su>�����w����c��7�S���/�/;:2V��Mt��<���Ҕ�8��)�躥�3|!]���������s{��S���_\\ o���z�L~��8&se�����Ϫ���Mn�s���Ok��TDD�XbDD��!��֊�b�-�1Dd�1�S��!��ek�cLs�C�*c�\"2DD�����<)��V��>���?77�IN��ܓ�����ʢ���r�����~Rx�J�bh
�B�?�CI�)q]<^}���Gq��8Q���K�W�02*�������Зt_kX��=�a��麠���#�[Wk�9�a8�̥��CC�φ�#��]���e������TuY������υq^����p.�9��s�C�+�V�_q���L�~�bV�g�,Yĭ��3����z�J����F鿧2�4J/lX��T�(}��y6��ĵ���?�w	�Zq(֊E��rː�|�e�m��3㌔BQ࠘=�3����L� �o��3Q��i��rP��
�/AӵB�ʠ�������O���םzk)�H��O)��P��R���������I[����?K���oq+�@�`�a�N4��mc2<�}�w2��o����2���\\{���^Lf�����^e��ב�ho�߶wػ�}dڇ%����d�d�l#��lٙL7�S��~r�}P��r�!GS�R2��$9UN���<2�\"�$�rY)W�Y-�RH�\\/��l!�6�S��e�<�p�u��DYJi:-�t9�Iw2�Z�mbY�N�\'����r��S�>�]�\\��w:Ed�:�N	�x���{��v�r��w�9K�
g����:�
��b�!�}���VS�#?Y��d\\��?�oaO����3�mq�g�y�,�[H�����R2i�����ׅ��Ih��Z�����5�q��\0��k��ZW���� �Ġ�Q���Xc\0�V�����j�(h;��\\�%���B��!&���\0B_)	�����2����D�!ݤ5�ki%�v������4���5o!at�Cw�@�-�Y%��u�B\"B!��%+ ea��C*���bР�����UHv�g��gd!^�6G--&�E:���zO�l�G�,���ѓ�5�f�[H7	HwX�od�~�8HA\0�4��%��#N�hm��g� wd��ė�F3m����*)��yZ׬�\'Ѳj�ޢV��Vn�
�5��uڐѲjZbJK�ِ���umB�&����a�m%�V��^��Zb
4o�B�����8(D��1�%�grW�@:�8J�Zw/$����u��V���z|#D��iٿ\'��T�vX�LK*S�R��^�W(��U`��s�#�����i/UZ`jA.�CvQ�\0(���Ѻ{�iﰞ`-9f�2�Ě����m!��JP��a�����%¡�S�6:}���Q���
�㔐8����B�GK���}���+��m�5�����Z�B�0��\"<k�d�q�c�n��r#��kpJ\\�d����ER:�]�S�}�9����S��U$��wڵS[�����m����E�P����y���i�z|�}6�����$�li\"l����q��<Nw9��꯬�r(��هO�_���T����iƵ�
�C��Z�l�>��Ǥ��)��6Pw��^�
�(b0T�_Em����i�0u~n�WK��E�w[G����^�H�U��&���Z_i\\%kO���T��z�<����q���}_el%ˢ\'��6��o���̯0�j\\R���D��H N�s���m}���,�u��J�J��\';q)t�7Ui�+}�O�;*	y�Ҝ��IS�cv����*�
����L��:��7�|;����qe���9�lΘ�\'�w&賧�,rrQ�E�\'k͙c�0�2q7�>���8�L0�I��7\'Aqޗ�,���4�>�O���N��3��,/�����>�l��}�V��e8��q���\' �)g�8,p��p#����g7�IY}:֜��g���������\"�2���e]o�,�`@��ԧB�P��P1gX�9Zs�R����)j���?	��6�j�����-\0��	J��9|.�q�x�x�!h��G|�I$���J�^{���3��P\'�Չ��(oc��[��N�-}f~!��r�F
5���y�bD��9�8Yv�Z���v����]���f�wN�3�J��S��L��Y/H�y��	�)܇��X��\"7|i��Ki�-�7}�_F�`&�ȭD5���bZ�
�\'<��ʎ឴c0:AGH
�l���k��#���bC�ښ�[�&�`�m�H�k�1!j��J0������>렁�9���<�g�6�=��y7ޓ��~|\0/��>�����|�ʧ��Y|_��8Kx9ũ�+�j����U&�-|�Io�����\\�\"(Z�t�)ڊ,zrD��.z�>��(��P�U,��j��ŢD��o��uc*&���	1C�OiuH-8j�b�Ũn\\Po��4�W�P��4vb������U�� 6��b��%���O5�m\'�!;�ni�����Nv�G-!��±��Z3�gp�������H�!o!���n\\+��z��O���j�q�)����K��1�n������ޟ�p����3��\"���
�ؠ!�,ڢ��r�s�����w��4*����VA��`׹	�
�W�����[�}�9���dmY��,��j�1�\\�\"u��ǆFq��c4皲
�N�>�\\X!Q/)������c�.��^�n�+�u��׸�:�W^�gXeZ�����Ӯo@��Z;:�\\10o��������
J�zM�#�u���6�P���T���n��f|Z��H�Q*�Bԣb�U���s�J7L�
��rj�WE���ܘ4t�s�/=ޝ z�=������һ�������<�[�7�E�E{��b�o]�g��+����t���B�c�$��ޣ���y1�
�gg\0�i�7\0q���A�^eZ����N�/�a-��M
��H�=�sU:*�H����<�;E�_����8�\0Ⱦ�{X��Q�pÅ��ľ��/���i����.��\0ӽPK��I���!�T%������-�;�zlG���AE@�W��pM�z
�9��N�]XFQK��>2I�
��!�C���a���f�+��~V]|��R+c����k���7��
�־wf�����+��ݞO���c�X2��I46�b��ʨ#������h�0�ޟO}�=������>)`w�]x��.���
W����ٝl+1o]֌]�Zӈq5�LcxoV��a��~di�v%�z��6�����1��U1�.��m�ey�V�O��}��8�m6�}7�S�8�5v)������o�a������D�{\"O���
ز��sZ��\0�	�`��DNo��������>0l�3�p<��c�f_��\\\0�p	`9`%�J�Հk��q�\0�\0n�	��`Gg?`5�}�-#�}A�T����*9���`O�<@����_c-��u@��Ƣ�Spk�T�)���w5�ci���ƺkiԺ�F��4\\O��
)&�g��025��:��\'�_�௎����ߨ���7�<~�\"�_�L�W$�ЯG�����x�����ƜK�Z�{#���V�%_���.Sr��?NP���sw{���v�v�;���R�G��؅���㬥�=���\"w���e��q�+�/O��]�����:%�M�ˮ	�	��:���m��,�]�,�Y�0��@B��L����I�2_�����jo�X]��V+�*��Z��1�xk�5͚e=E��b��Zn����&�mk���:H_�&z#q��q��ڪ��T����8�ы��x�G�R>�O���l֒�#x	�\')!|._����pv�U��W�|����8�i\"S����a��h!Z�6ĥ��ޓ8�|Q �b1F�ǉ��b�xF,�D�xY��YK���\"q���F�El��~Q-jl�کv���β;���^v_;�����(�r&�����v�o�|��]�[I������}/�.����*���3N�j�S�?�~��*�r�a��[����.��%��O�������g�/�������b��[O�
����}`���
��F���Q�
_ʿ����o�������P�e�-˷v[
/��x�R��:/ק�r]���Wx�I/7Y��4^n3���x����
�l\\s� ��o�q�	����ո��Io{$�E�{;��;���E�{7�ގHz��f�&
�k\\s��u
�g\\s�E����ߑ|wE�}?���H�D����?�|�G��8��p���	�ƌ�����m)m��3�G�tq[�d���c%g ��]��8�������|���2u��`�Nv��i�	H[����)����������pߥ���\"nAH����o=�>nv�tE�O�΁fE�Y���)N�z���o�!��Vy�OT
�3*Q��=�	~LQ�`\"I�{n~����8!�Bq���!���.�f�&�\\�[ �$�	�{��J��2g�s��E=���YUZO��Kj�$���oIe�ɋ��n��P��z�7���Rw��E�)��ҰqgP7H���r*�5�w����e�f�N1��(~�b+�V�&�𗷜8�ЈƿOS����H�~,�VN�s1�����#Z�x��@�ag1EL���t�$����+\\D|�/�/����+�k�[���xM����f���xW����+>\"���l������&�K����>��̗e�$������A9V>,�-\'��r��*����t9CΔ��l9WΓO��r�|F.���%r�����7r������������(��&�E�S�#ߓ��^�_����#���xN�s�s���dh���N����i�d9�l��s���tunpntnr���ν����+��x�	$����@z�U��@�@�@�@V���5���=_��5�?0 P(
�n���
�*��w���[�-�ʽ���Jo�����[��6��C��
�	�
��B^/�k�u�r��^����y�Wޯ��z�x�^���?T���R�2:eLʸ�	)�R�΢�A���O����Qx����ơ�VD��.�4Y=֏?24X/�#�S4����*ѱNj����xS����Pۇ�CCm��Mm+d{����|M�Y�!�$���-Cmȏ���S��<�X�t�j����~P�Š�Dm����r�]�=�}����࿃��,�E��y�y���ޕ���5�u���o�W�Uz+�������Ш���
�(4\'徔�SLy(呔�<�_j;5jc�,�;�}�9e����i%�xjW;I�Țo���!�P�G2���Nk�Q�&(���6�VO��Pz�=n�Gi��h��4N����j�WX�B�q2�R����Ȕ�;-�1S�Η2ҵjwW��ȴ�P%/�B|�8qF��w�9�i��3�i�v��O�g���o�.d<x����Ʒ���a|{�~�>�o��o��o��mK��3	1������~W��\'
z�U��*�U��gk���I�
�Ρ ���WD4&�EK��%j�&M��%�EC��K{�ޕ(�bCDc�Ac�-�{�OcI����{�y��w�;;3�Lٝ���#&=?\"�0�h����,A��I��5Բ�mY��5bS���5e7��:к�T5Q� �*/�7�X�^Ձ�W}��L*���G��b�8+���w�;������IC}��0i�?��L<-%K�t����[��r��D�U���q�8*�B]�z�B8ӓX��x��4��¯fCn��<������z^���QO����O�L���u�u�tv�V��l[���g���k����g�P�����8�1����זq�X�ٷ4;�w�AO6��Ѫ���ϟ�?Mr��Q�j����sF���!@���|%�F�=��Qϼt~WQoc�{��\\@���v�ަ`(�j:u���{_��??�5�M�C�r#O����G
��
��^rR�����[p�ȋO�	��^�I^�rk湗��ĩ��澜�לu�׾���䰎��=����S�5�}+3��Ϗm�!����<j��K�[��3R\"��4�]P����J_���H���q�7���Ȥ��I���C�#�c��z����&UaP�m��vPC���~Y��{��H
�\"���L�,��c
�3KV��`V̚�d6�+�>be�-�ce�#����h5>?�I�������;H5d۠S�+#���(%Q��Q�*���e���$+)�$e�2E����LS�+��e���,U�)+��J����R�*�%�fe��LY��T)����e��NY�lT6)�-�V�ge�r���|e�2O9�U�);�,e��C٭�Q�+9�I�rF9��W
�K�o��rK��<`�	�1%�mR*{�}J6۬�Rr�C�a%O�W�(�(Ǖ�)�rA����\\V�*��;�]��Py�<e��Jy�<Q~g�mTx�g�B��DIe(?��]5(�C
�x��$rE7(7B�c�!c��\\u��X��$Ydx�=�i��l�<��-�!(Uς���\\\"�A��<$���T�UQ
��N�3�,:�Σ�\"��.���J�����&�N���Iw�,����4���C4��B�ѓ�4=Kϫ5
Y�\"��v\'/�lɋ{5�N#���K�l�a���,�\\�Z�M��~f�l��̶�}��/�����6�����Ȇ�al8����D6�%�d6��d��D6��fc�86KQ\'H��~�y`���x�o�w�3�	.�+��ZVW�(?(��o���w�\0�{e�2H�W�Yl&���9l[�&�)l*�Ė�5,�-`���-c+�*6��Ħ��l���4���e�/���������ؔ�|p�y�Yo��^���0�N6�|5x-��Y�j�ռ��$3�^Jo���G�F�e��J�}4���G+߼��,���֏
�C�W�C��
}D��KL?1
�i��#���,1�a����Tq�>��!��y��y~��x&���5��ٿ�p�6>�_\0�����{=���x�c��t�ϸ����e_Ji����^�c�2��Y_x������~tc��W	-��0�)���>��W���R8���m]x���\'y��]�(^;����3S�p4�_��wo���}��
�||`�?����Ұ��ܻ/ֻR5��>S㟅�y
�3o�����b4���Ҏ�$���\'�ȧ��Y�b���#�
�p��H�4R6���4���_;~���!x	�_���:M�+�	k�ta��-�	\'���5��TT�L�ˊ����.�=D/���+�Qboq����4q��.���<�xQ���8LG�Yr��I���^򕂥(��4@J��$i�4WJ��H��)[ʓNJ�k�=马��l#��eg�]�\'{�^r{�W�����\09AN��d�,��}C_ᄾ��DkL�6�7�bzxcz���>$Ӧ?��w�6 mn��(�>[Wj y�m,5�Z���|�N`;�
��JPi��R���J��T٨l��Q٫�VTUUAk[�̟,[GUO�l#���lKU[UG��U]T`�T����Uo�q�~��`������JTM\0;N���v�j�j>ع�Ū`��֨6�ݠڢ�6S�[�6[uHu��I�y�gU�k`��n����z��#E�Z��<-Ԗj>B�Z]F�GU�UWT�Q�U��j>��U]G�G#~�n���n�n������Nj?u0� u�:l�:N�l_�\0�����D�#���)`��S�3�����]�^���W�7���tu&�<�Rg��\\��{\\}��^T_�Q�7��p��#
v�&U3�l�B�2�i�U�
$+��D��J$���B�
�j$���F��$k��E��Z$됬C��z$둬G��$�lD��F$��lB�	�f$��lF��$I�mH�!ن$I&�L$ۑlG��$;��@��N$;�d!�B��d�]Hv!ٍd7��H�!هd�l$�H���G��~$9Hr�� 9��\0�Hr��\"�Er�A$�Br�!$��FrI�<$yH��#�Gr�$G����$� 9��(��H�!9����H�#9���HN 9��$��HN!9����HN#9���3H� 9��,��H�!9����H�#9���H. ���\"��H~E�+��C	�!jo�hFr.�@=��>H�`�f$W�jo�hFr.��V�NH:!錤3��H� 邤���|��k$�H|��\"銤+��H���!�C���?�\0$H�\"	D�$I� $ݐtC�
�
�~)X�`)��%[
�f)X���/��eW
�W)XF�`���eQ
�?)��`ɓ��M
�0)X��@9/
?��6�0
K��!l�nk<�x�y��y��y���γ��<=��y�z�/��ߟ����s>���-����@�s�{M�lz.��<����\">�e�y-��<������z}��`�σE����[c���T������Y���g<*�#�(���P+l
5B����P쳰��Z�-|G�5�A!���nk��ɝ�� u�i�TX)kLףz�6ǋ�f���O��l�LsL�{g��-��8�|�q���0���1�}�!�C�@����!F�Nzkh��&~�!�\'B(`�|X��G�x��j4��e�]l7����},��g9�\0�e�!v��7��
	Ε�
��:�b\\U	�?��(�\\T�ގH�,��s���؃UZoO4�	\"���Sb\"�_~��2åq;�����\'���>���F��*iN��e�^<-� \"�K��o�Y$ū�Jx����;�i{>s�۶7���p��ɕtї#�o� ~vf�7��u���4�d����4Ӭ<���Θ�峇.�4�`����[�6���>F�C��i�Y>;�y��b6�Wgh��0X�U���ތ�St|�6�h�{Ѽ������K��ޒ��cG��g|��𕩊��:y[ۂ�h9��k������vG�@�D�B���p�J��:@���^����l��\'�sܾ��!�t����I\\!T��|U>�*C�����P�c��1T��|U~�h�?���+�:�N3�n�C��qz׽�C���	%��BY��PU0��W�O�K�:	~B�!�
}��a8�Ó����i���a��|��p^�,��	Op�+&Z�eD{�Qt]�:b=���\\l-���b�%Ɖ�pͫ��81E�&����5�&\\�*[<$��|Q�\"��O%I��,%�Vr��HΒ�q|�x�#�p)�8A*%J��R�yJ&��F�:u�x�Ԟ�������\"SPSQg��D��:u�\\�y��Q�.D]��u	j�R�e��QW��D]��u
�B�0�L��
�gbzo�����;4���r����\'���ݺ;ٷ�j�u���w��b�� �9G��8v���3��.�o7N�����p_�j!5�n0��J]t�J��D��L�*�j**����R�
CKeW��NRY	��]�����E���aQ!q�Q.�ơ�Jݶ[PdtT�KY�-\'V%����g�EtlLt�\\lQ�P�/Z�~�OXd���q��1���hh([Jqq7|b��R�V�O:��:f
��Y�0y*b\"B�t��:�4p]ʲ�R�������g����\0}��y��že�q+�Jς�]��W�G��(�k�}����ҥ��˩������n�!�̖�<�d�p�γT̎��;��~��kӎ��>?8uox�s;�;?�왲k����~k�ծr}��V����.����������s»\\n�,Q���`���5���X^����2�y�V(�-7{��Z�fZ�R-
:ֲ[����ɏ��2-֍Ⱦ|O��������1��.������nv�d��|ܿA���\"�_)>�ѩZ���S����+?[5�$�R���v��.��>�L���!VM�-}�m�m�JC����d��2/
���B���&�
���5xG�m�b��b�����Rט�����}n`��m�O�mI���ܵ�=\\a�6������D��A�������7nkV�6��Q�;h�x�m V[UUn�ٚ���D�����{}����<9h����d͂�3��>$�XQ�P��~�z��mVn����H�`����PZ�A���
T5���*ZD�}�!�z�W�uТ5Q�
w�
�ۡ���ڲg1C��<��[�[�ᦊ)�o���}&RԾ%�<]�		�6��\0���9]G�`J�:
��h\"��/C1\0~��_�#@����4�����&Xk�펅�3;�k�\0����\\	c)Hx�n�6Y�dϣ���|})�I{���\\Z̣:���}�-\"}|��,��V�lb�	�������0W\'�Nv�XU����o�����ʰk?�Ć�GZ*�hL��?�:�Щ�	�R��|����H�X@?�r��s���	��8tyq�-��KGB!FyB�q�h��t��򨪽���5�1hHd�C�ɾ��Ԩ���gc��u*��\'�EC�vc)�Kw�6?���|QŎ��,K�:ߝKR�hj�
��E�ƹGX=�*tw�|�ӅG�I���������zh�.gI؃gJ0�]����>?W�V�C��v�E�g��u����j�c�t�FW���Et�x)?�$d��Z
M�cj%��;2�@\"M(��Y�s�;l^G%M�`��K���e+oʱ#

r�������f����H1�I��tx��	�K>a`���2�f&F���)���-K�,�~7%��ng$rs\'7a�0L7aN��a�?l?��_;xY�H
�D�~�Hpv 2
��}w`6����f���a����K�-��+�8�}``�4Rv\'������@Π����7�
bIl�v�e�i�eAº�<Y�]Xs^ U���o�}����E���9�l \"���j�yʓ��ˊ�!�4ٖ=��<�\\�Yb�|b`[=�E��B��{P��8вw��͉��^Ǭ��\"b�*��>!>wi!_�SbЮ\'���e�Y��ki�̛�4��t��;���(s�i�s��кt��5	���T]���x��Gz��#���©��>�RZz�F?�
,&��y��^�����Yչj���Fs��������[��jR��7��N�݈o�^��=Evֺ�/��<��֒il\"kS�`��Da�q!�`q֢��y�o3�?.�m�I\'@rsH�m�X;���!��8F �!�wki���e�Ꮙ�������1;u��i-V�������y�)c��O�5��ov���J]><����FO��0�������9�UE�)FI��BT�z��T��g?c��ͅ�VՆ�!�,͋�USŲa-v�2<��<d�Uq���5��z���>�_z.T*�����y=�-�����I�Wb��b|����2ϩsH
endstream
endobj
195 0 obj
[ 0[ 750]  3[ 278]  17[ 278]  36[ 722]  38[ 722 722 667 611 778]  44[ 278 556]  47[ 611 833 722 778]  52[ 778 722 667 611 722 667]  60[ 667]  401[ 604] ] 
endobj
196 0 obj
[ 278 0 0 0 0 0 0 0 0 0 0 0 0 0 278 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 722 0 722 722 667 611 778 0 278 556 0 611 833 722 778 0 778 722 667 611 722 667 0 0 667] 
endobj
197 0 obj
<</Filter/FlateDecode/Length 226>>
stream
x�]�Mj�0��>�����dJw!0�0�Eh�8���(�\"���)T`���\'��/ݵ#�@�q�=&=9�%�l�<���mڻr��D��%���TӀ~qI����J��C�4����K߯1~㌔�RmG�l⋙t���ݧ�(̟�c���׿alp�Dc�
endstream
endobj
198 0 obj
<</Filter/FlateDecode/Length 56470/Length1 295804>>
stream
x��|S��ǟsN.�7-m)�)�PImzAl�IJ��Jik[�E��Mڤ�MLRk�1��_w�m��nNn��ׁ�M�2Q�m��ߩ�阺
�Kj��V��&�|
0��KL���J�����\0�wVWծ�l��� ,�|a�m?_��o��YQW[V��x;@A��RUk�{�k�~ �Z//Y\\���\0ew\0(�7w����I� ^z�[����ݯ����b\0�[Z���\'͂���7���N�\0�h�{�^����r���j�@u���q��@�\0��O�Y͖�_k܂��c��6��	�@�4[��i}�O��2��>hw4�o�׷~b�\'?�a�ƙ�ˈ9�~��;�����W@�>��Ns�������]�_�����f@ڷ��w���D��gA�و�X_�^+��ue���@ˊ��ټ����
Q/�9��Q����<��5�b�����&0��r]Pˠ��.�\"�P���VB��0TA9j5\\�z,B��
�ZX���.�J�ˡ
u)T��C��4p]��Wp]KPW�~W�RԕP����
������;�����>
�w�/OBAq�	�Gz�@&D�;���h@A�X$�A�AD��`�_=G����7��w�f7x� � �����1A�	��
P���1��CD�o�c���$AAg�0{;�� \"̉c�g�C�}����
�b�&>�;����y�5�A1	�Gz�@&$�)A�T��C���������@���	� �8?�Gz�@&$��w�7����4�� � �8���#���^8AD�3N�b�F��G��Cot� � �f� � \"LHJP�J��;�����;���6� � ��H�=��;� �0!9Q*�H�1$z�Ay�9��&AAĹ��1A�����1��\'��C� � �Q �A�AD�0>I=�wI��~
r����AA�0{;�{N�&�AM��}�G�\0� � �\"� ��oD����r����׎�L:�Ќ�AA�E4�m�م�1A�	�S#!\"b$�R�ք�FP�y�i>OAAq.9�/}�����$#�s䉑9��X�8|p�ߵ��\'�����6� � ��H�=��;� �0!]��1��珴���w��<AAĹ$�A��o�A�9i�5��?J>89�f?�|N�y
� � �sI�=��;� �0a�.b�cF����Ǉ���S�g`�h@A�X$�A��o�A�9��c!6&V��sL>8�3
��R��l+�P\\ⅤmP���Y����<o��Р�J���+$�
�B�b48�|�k�ɭ7Y�t&�{��8؏��^L�{�ޚ��|trk�EG늭Qf���htF�s9�	���!���l!\"�*�Ygbg�׸���$�7��۵yh`��k��%xU�^5�W�{�f/l��e���ܧ��F}�Eg1/��Jf�qH&[�wҢ�e����h�٨�pac$�lr/�Y�FT]	ېp����f�Ш+������wi��x5y�ޅ�l��i�^S�]f���d���Ʀ3šNE�{M:�
$XƲ��ƒ��t�/��/f�љK��V�4B0��d��ʱ��,���äL���\\��*�A�\\Ճ����N��ذ�84�Qeh>�,Օ6��������^s�om�N��z�-Z��45�|���&��ts�W�h��@�9WZ�F�T���[�|]:ڔ���>]4�L���+�W�6xcp��ʥ��l�`�	[�X��z���|�r�uQ��j�
�2L��@�q&��.�b!��l�l�3Bz�k/���eh�n�A����bvc���������:�E�g��C�qo�.Q.4p�[Bq���.Q+1W���y��zt�������x��y5z���~�v^��I�튍t�n�e�����[�>�s�!I��y��A�]Z_��eSop�y������^h��.��[����˹�?u��^��\'l�	/�f6�.�ߡ�{�ƺ��� 7.h�6
ُMJ+�)J2�#�Z<o�s�^<�pX���2Ӧ���i�5J�*A��$�O\"c
��SY�r�l�Ӊ�Z<o�S�v��<:�0�P�&�a�8�8؊�N<����z�w�<�CeT�^<��_�ۮ|)�H���Cr( >P*K�夲�<m�ku��}X���5�����Y��(}k�-�c�s3��Sl�踿H���@Y���]�@�U\'�U�q>���Uq���W�Ҝ����Հ-������1,s������l/Y�x,6����=:�p�o��~L��I��V�`uT����P5ڦ��V����f>-њB������\'��i���O�;���9oߐZ���i��_	������R����s;��
�;�}��ޮ��~���g�B�]
�]��·�E�B.�n.ړ��#�@�t^��}�����/��8�b����������8ƃB\'$m����I!	�N6\'ɘ\"9��
�Z��_+��֎K-tj�j��|����-���Z����_�\'�5�<�\"od�����
^vE}�0�Eo���I�E�nj�O�Z�c���
\\��m��Mޙ&�7��X���{���7�m(��ú�[П�f�=~����aNT=s��5��=4+�â�e��<aוnO���r�o�7;K�ҺyS��6�7+��[�z��f�\"：E���+�u�ك����-�(�`�+��(2����8a�}�R����r/^��}\"������KyY����D�\"a�I�7Bh}ݾ>���\0��(�r�|�b�\\�߃�^��3��_��g���z+l��r���c��߁;`���w�R|\0�_�h�^<l�\'��O�{�;0�CP#�A9\\��z�Ÿ���[�,�8\\�Y�	X��>)
�ЂM�&�V�%�V,�-����Q�mq��/�H\\%���ҡBy@q�����
��L`�����������+���T��C��`�����9麋�$���/�߻wƚ{�J����F�+�N�.�����GE��Y!)��R���ޚe���c��XC��b�aš?�Xq��]QX��#`��+���.t��=������	�se��\0P���!cH�O�Q�����e��ّ}�>�]����hq}�푢hSB��^q�B[%AX(-��%IL�eTrTF�$n��\'�(	��z+J��`�e�R���*W>�|]�6(�T�0E�1\\|P|\\|V|]�p�NQT�Q��G!D(R���\"�#$A���\0��|�#����\\���7�̧6�A��^%v�	K��#�R�
��)`�W��@����������??�+V$��N[�r�ʫV*�
\'+p�K�%:!A��.�*U߉+=qe�$�,��Kg��cs�e#Y�; ���������o����P|_��#>�x����O-��JAX*�B�q��yW�ؔd��!5��;��w��Z��Z�Ѱ M9�i�j�x��BM����u��M��5-b�����Z	�\0{\0��:{�wB�7h͟(7g���T!a�n�*9)%?�b�n�x�&1?o|B~�N�_���[o�����o�����G��|R����w?��G�<&�,m-e3lv�v�� .5��9\"ƈ��u�*R�A�`�P����X#T�x��TVqF����‹8^~3�\\!�qj����h��=s�-�O=����l�\'��/w<���6��,��|���O������\'�IᗑQ�s$A2���7�b��37�q�!܆˲�BJe�r���
���c��
E%��!
ϲ�˙��������Pr�w�����w�#܍��YiסO�.��]w����@�jtd�ޜ�3+��%I�����u���U7�c����n�8�:蠃:蠃:蠃:�c,�:��t�At�At���q�Ð-f�m����$���\"����[�I�e�bH%��
���[
C/u�:�.��UTg������8\\�{S����.j�4�Tv;�\\�V���mvY�N��%{lVyqy�\\ao�v��se��*[;����\"��Ce����;Y�x��lowg�@���-�Z]�V�Y���k�ٵJv��+H��rt9Yp���i�[OSN��������r�z/���Hǒ�T�9�]Ng��nqtz��G��a�|�(,{r��j�X�d�����˒͝��cl3&���얝VW�����z�����`��+�ha5d��J��a�j�d�l`�,�\'X��S�ٛmC,��J���]���;:�{�L��!�K8����w��)�qٛ��
����h��f�46k�3�GqQt�����l�&��/�:4������f&�:Kn2��VG��,
�)��к*�U(��T�
[l�).Coт��,������Y����E5u��K*�j��%5�U�&����,�,��ZL�M�u�X+�ɦ��#זUT𪊖��5ܾ�ꆚ�eurYUE�	�в�&Uب⊢��YrI�⢅&��
K����--3� ���וWU�fWU�ՠ7[YS7�uiy�)K.�)�eRZS�ų��U��Wi�ºZL��KjM�����*��Z�yh�l������Ѓ�&�b�
m�����Z��,�.�H�Iۤ���x���A�<ȁ\\(��C3�s���+C1/��Ռ!vtuB6�a��xuaX+�0��}V�Z�z5�S�B?�����1]�iŒ��%C��Z���mGW+�G�Ӂiz��$X���>���]�[�Ĵ2��z����i/E�
r�����
M*I24Q4P�������JBe&�א&$�B��)e!�_{��9�{���>���:���ϳ�g����Y{�W|����&T���y��m�C�z�J�l匤�ܯ���M�cW���K.��*3�n��k
�i�jT
O�O��EHM*�P�۝�d��6_��֚�P�
R�������AZ!s�W�pa�/H�hcfIZ�Df$��3Ƭ�%��+�|�/���5J]}J�Bf}VBl�v�Y푩F�[we��;��ue�*��CL46�|�?����]Q=KT;���������N��܏sF]����@�3k�u@��}�Z�,��{F�h>l�%Ǘ��\'�
�,��5j���k�l�$�B�Ec�Ň�O���յ�6����X����Q���y�?�����
����«���,�ѮZ��7q�c}����F�tN!��瘽):n��5�S�\'�J=�d��Y]���a��>���GO�XgUG�����}&]�#�6ln��ݩ��
��a�s������leǈ�G�,9Ǽ���}����j�b�\'�\'F�5M{�pﾏS�Ω�����5�f�h6�ۨ~v�`Q��w���sY�:�o����y�	�@\'��q<?�`s���I�`g���ݤ����F�X?ej���\"���RV������m7�#\"��2;$�/:H�zatpDdHt,e�IKҜ\"2�BR\'U3�!)�w��w�}gnh�㇎����{z��م��t�_������ۛ�n:�&�z���㹥����m6��%��y�~;׼JF�<+����+CtWn��:Gͨ�����M/]v��xT��n�{c��6��o{C�s����GAʍ�&��)�����я�6��+?M%�_Z�q�Հ��m���dOz���o��&���K�����8��%��5N���3�erL���&�I����:g*�=wՈ�-���x���s��bu����ێa״\'zv~cW�k���CpF��
]�M��y��K�|�+����H!�.�	}0��<��L�6\'n �&(��\'�륟�|�b��S�ǖ���sv����3I{X9wBΞ�NQޭ2�&A��Ɠ����X�������H�#e�i��)�I�N�!X�\'gbj�L���<�Z�������Ë^����D/�&P<t����Ln��K�?5�⢥�����
���$_i=M���:��
�<6uUpxľ��cٜ�����1�γ��ǝ??]�L-���}���5�U1��?�B=`hF����>*�f�?��\'�����Ϧ�d��Y̹�)\\��T��W��������֗�
�,\"��������-��ow ]G��z�9�_-�~K|���\'�;X�\0cٰl\0��eyAz
��SYS��a���i��0e+�!�pHG�\" =�	�(6<�q6l�,���ސVd+BZ��iN!�8�8�����\\�/;`�>�3!;K�
�kdk }U�����\0��MY(�l=�
,���`$�~\\J.��WP�V�i�#�w6��#T����
5#��
N
�
�
�
i
�
�
gj)4+�C�&4�:	}���xa�0[�/<+�>6�{	z�.��+虨U�����<��2\\i=f�u�@�0S�6���b<�7�-��U2ғ�E�\0i���I>�D��*$��:I>�$���,1~#�
�l^o?��\"��̔|�H�J8/T�e���͋��^�:f���rt�K�%%�2��G���Gu]w���͌4�\"�o���=��F>Z�b���PYƘ�˲�Be�(D�X�
�
�`��,\"k�,U�,J����
U�e�>
�V�|��Y>,Q\0U�,����|ߓ�����cw?�~����9��sϽ��sν�b�K���v�n��y}�g��nғ�$����[\0?�x�d[dϢ��}�
�I�y=�b��Ѣ�
Ѩ�NQ��qY�� �#����~�3ۥ�3u?�
�G|G�*ku�ܚ��&�G��[�@t��m,��%�&�P�i_ =�([����yn��Y(��J����&^A���P�C0ǝ؂}DE�G�����J�6�/���rPiU���������
�m�ҝ}X�U�tJň�b�Nl۔��<m���}O}��,���4����D=>{�
�|�<
���s�\\�:�<�xbF�@�.]J`2�s�x��A�2-�뺂���J�䛳$Ƀ��Ѳ_���A���۩=�:�rxB�C��0/�V��(%!�&���E�%��$�K#�7d��W��.����\0g�����y��;�KNP�7F^)���+���9k���W���sX�!��^H�t��xğ�:�ܒ���M�m�f���ߕ1w�61�u�Z���\\�L7����?섬�<g���6D�v1c5�&���`�?��=��F?��Ëg��?F�+�~�x�����;�VAڤ�]���,��p[Q�ۊ�p[Q�ۊ��V%{P�2	7��\\Ɠ4K�Tn<e��W3i%��
��c�}��B�(/2h��N/ń_i���\'�5ʊ�A&�\'���Nd�yr�yo?,r�.�L;D&�\'4J+��Q���pǂ���[��a�^���(����#��%��B��Y�*�v����%��!�0N{{R�e1G�1�iK���F�Z�&6�{�f�M<&���aq\\��A�tAb�O�$
����N���6=����k��j�Z�V�5�6u����F����j=L���1�K�QO���:���c�e��zC��N�����9r.�� �vG��+)jmw,�D�q;V:J�����(78*����Q����Np=�[�h L�c�c�㠣����pwt;z}��Yǰc�q�1N�5Ǆ��cZ4��h���BZuZ+Җ��0����:�Lۨmֶh���N۩�֚��Z�vH;B4G�NG�vB;����h��vA��]Ѯk7�I���)9��9N��sF�IgF-�z1�˜+�%�5��j���Y��;��5j�s�s��¹�����H}����y���<�<�����٣ũ>���t�6�Я೰u�9�����r�\'ig\\����u�\\W̕r-r-q��T��9V�J�.�Z�W�k��ڵյ�$�qջH_�=�}Dy�W��[	nsu��:Nu��W�����Y��]�T_t��k�	�/��P}�5��p�u�-�
��V������ȽԽܽ�Q�^�^�.sot5�7���k��:�N��9��M�[�n\"� �{���}�}�}���>�>�v�O�ϸϹ����G������������t�s?�H�,O�{ңy|G<IOƳس̳�S�Y�Y�)�Tz�<5�m��]�F�^�O�簧�s�������{=C�Ϙ����g�s�3�������^�7@p̛\"x�w	��ޕ�R�ZW�w��»I�l��ޭo�֫]�o�c���ՠ�x�yR�9��Vi���Q���w�y����>���w���%��ދ�i�8��{�;��x�\'8�o�c���S��
����}E����U�վu�2gҷQ-�m�m����\\

Մ��v�v�C{r耶��j	�����B=��ЩP�wZ�
,ދ�J�Z��
B��xA���`ilC�����U���������l,�\\���V�YPW���ݡ�&�\\����@As�!��E�Yp��w��4��Wp��\\��P��7Yp��{����|�ƺ^p�`��^����ZKg�s�Z��IG��t&�����ijzE�$�F��^�.\'�2]��IoK�H�J7j��{��-������tW�\'}*ݟL���n�G�����X�r�j�F�vz*}�k-��p�g
�B[��O����������@a�0�zQ������k7Vn*�.�Z������pO�>��\\x������[a[o���Xa�;n�p��-N�9��gU�R{�>zV�O���g�S�Å����N�)�[8�2���Q3�>�P&��Τ3E��<nf9��5�U�i����v>;��X��j��?�P�
�Z�����3�~:ά�;ap�f���f�x�d6������}�ܐg6g���3��:��q;���\"�S=�ٝi���4�w��?s(s$s4ә9�9��9���*�����̙�9]#��4��:l�WP�p,s!s)s%s=s33���y��Z�t֧sQ|A~�g^��+|�.fp��~/���ɇ����ks��~����&n�Q�t�P�z����Sm:�=�Uý<ҿQ0�C��
�〟\"9�3F�A����`#�g0�3��c\\��ʧ���Q].�R	��~U���Y~�EjnP�n��)m�f�$�^��|�.�2���-P�fFp?!����o���R^fy��/�6�#L/�10o2̔b�1�&��E�`�C��g�Y�,%��z�c�z���\0�y�\0>`X1�\"�{<�6��>�H��d-f׊��w΂�k�����w�����7��#,QR-�̵���f�����f��Ē9�&�V�p���)�ƈ3��`��M�%��oΟ�
�jdc�$��}�xCy5F�1�_�\'����ͬM�0;uJ�%k��naK3O���*�����2H�������F��W�<����k)��[���g0�?����ʋ���w���5p�*z��]9�q�e�d��w�QYN����&�A�,ȣ+L��	4��h���&,�5X
�p�W/�%_�-�����߇�\"�׼Z�����w�w�Ӱ�8��s�{��)��>O���u1�%�r,v3��6Y�:���`��4�5F�f�a9�7�w���}�X��Y֩+�ane�yڭ��M�7y��w���,?�U��e�v�����y��nX�0�gA�^�@�������R��O��;�?�����黛WX�oy3}�`�~�-��Қ?�^�\\�5�&F�1�j�)��[��fXf\0v>a~{������M�$����+����߉�V��:�W1�W�UzU�1����%F/f�SƘ��j�=�����#��
�dDd�$�%�y�}&���c;?�_�B��s]�o��
�y�-�r�l�M�z\0^��\'���:��$ьL���1}�i��oc埆
�͓��|h��e�
s#����ţ�t2S���X^���9�;Y��P��K>VI��;��ߤo +�
R�k���B����
4$���,�`��G��Ɖ��-��ɂ3=K>��µ��W	�I�|����,�@S�!�R��V�u�e=:Û]ǌ������>�a^XQ���X_������6�8�+֊�c���f������]f�ȇ�~q�Y�!��k`�`������2�����P��|~?�
��.x����]�6c���E^4��Z�_5��[�n�&���\"�>��O_��a�Ŵ=x���z����>�������*�}~�s�sν7���yL�HSĔ\"M)b2�Ɣ\"�i
�AJ)bӀ1\"M��bD���H)\"eJi�\"fh��E�O��RDDD�<J�3���[��Mnn.-�̼�g>���^g���^��>��}�q�iN��?T>�^^��xjd�2�<��2.��Q�6?��� l��2Զ�㭁���������0�xF@��k�����g&��=31n��Ӥ����#��6�u2�f�X��
�\"�l[�2����-���Q..Co/����\\˕��ec=4܇1y*����Ř�	��:+�\"̭l�u|u�N�s�9����zw
KP��P�r�=�Ah����ކL�R��!;�2ж��y�b�t��~��Uߋ�<��Ѭ͹������<��(�@�����F�*�c~�}�>�ف��@C/�jF���T�c�������-�(�Sx�#̒��/�@[x҄�������#ZrF�
���&���9����g�;p׃ٰ�-�*Ēe�+
)6�o�琼�Իe(�G�a�U�Q�y_3ݡ/���fm<�D�4cVj��/�a[�v�dɠ�MD��9�ۭ8{5��d�3�-\0{>#����Ž�y�U�E��U|��\"�����VMM�z�x�O�����>�e{<Q�ө.��	4��Zh�
�{�5�_�R��`M>�O��c����G;��6���N������V��N�j��&ྠB�eZ>���:���/�\0�1I��U����I�Z�ϫas�}r�ci-�%�z��&a�\\�U��r�C���q4�O�<_6���n�I�L#�>i�}_��A^r�n��>��qN�s9�0��C�9x0)n�_&�\'(O��	��L��Vt�G���\'��sJ�rEyG�R��t+��PTC5U�j�!5��Տ�W?�機TG����̅���t��x�Mt)���\"Q!*�J=�Q7�|�̨����Io�Q}M�Ab-�m�5�N���i�G1�5
��vi<:}_k��
�B�)��u�{��h~�h���ڸ��`�K����A���e��FY�DX�=�$k
�ӭV)�Y�9�5?I�[���A]WZ+�5�	�-�v�z���:`Ճ>b5Y-V��F�(��.��.X��ϲ�B�&Y]����^[���mG�l{��g��?�.L���v�=s�Y[��{��Ԯ�W�k�u�dRum�7�[��n{�}�n�L��<`�r�>i���!݋T6�o��	�a_�o�}�����G�p^\\pr�\\g�3�O�D�ș�8��r�ڙ�,t�p��2g��v����hmw6;ۜ��J����\"^5�j�o�8��C����Ԓ_#�����Z�?j7;ǜ\\k�S� [N9g���%��I��O�u��dz�MQ{
	� d�o����5�
EB#F����PAh����M�\"N�Ng(�
\'7����Z�9�1�9�-��i�Ff��E��G����4�w�G,tJH_K�p�h��\'H�)�{ƾ9Oi^�\\�t�Ou�
2D���SXeFę��e7g�p�3Fe�gdLȘ�s�ɘ�1=cFFi��*��E�2ceFuFM�����-�1�L�fƮ���+y�M����\0��4/g�g�h�h�h�h㰌�2.g\\��r�q3�3z�j��뀨=hC\"^4�H��	li�}>�GGF�c�U�q������]?Z�-�΅� �x�v׏.�VEWE��ut��.�!�)�5�#�����GF�vu&��>x~ʋ6:�����dV�\\�� �s)���F�ǉ�����Ӏs���x�lK���,�gi��6�}���fJ77z1����8��hG��s��ᆵ>���#R��ւ���r�e:)~��vJ}Z���0�5��n:F���.1=����
���s��8�;��i���H売
�W\0��^	͏��A���NX�X��X�J ���(u���m�xR|6D�ɇ�V��ی��\"�=�fb5A�<8��1����4�#�����أ��1�ԋ��>��=(7ȿ��8�X�
V2�)h�\\Иӵ3��F�}��T���:��|
�eI�����ȱ�eШY]�4�T��H�R�d��L)襠�U���\'��G�4ԋ���~�G@��2Шw��v���m����#�f����}4V�r��\\샶��/��8_�r8�X��`��`��\0�A*w�ފ�,���
�b��PE`ț�\'�*1^|S|KL��-^\'7Q�B��{�ir�U�����v�-Q�_E�N��*����>qP4�F�,���㜸Ht����
m�QAs�J�ڨ1��*���bl7v��8`���8b4-��k3��͸`\\�����6zM��ݦmF�l�#��Ek�1D�3)d�9ը4�͙�N�YF�Yk+ip�\\�W:��Z\\��Z�F����/e]D/0��b����2����õ�#mu�*��g\\ +�i�F�֛��5���M��.@7�ln���j�����>��K����n@=�!i7�F����ʶpjf�y�<�zRa�	`��P,�-T�]8g^4��Q��l��F�n�}H6xu�.9m��rq�J�rK�g*���*�����b������޸7Ǜ�=`a��3�;�;>���\\�;�kY���;�[�E��aTx˩�^���.�.�.3˨%Q�yW�����R�Z��d�6l��WQ�(sJ�-{�N��~�!�c��M=��{�Kwf�QG�Z�=�=�=e쥶�\0�J��y�{iX��S�P)>Z��
���{�k�����M�hn���/�=����^���?P.m�d�D_��O�J��e�:�?�7�tM%�eJ��o�oa�Q	YU�-�ݾپ�F�o小4��{v�/g�*��J�޷�W��1��֓�q�	f��η�,�m��o��0�}������r+������5��=뻀��e�;s
x<���9��i�%��5;z����*�c�zE)��TB�qI��̣<фsȅ���R��N��G��\\�|�+�X8���Ǿ�8p/v�bϷ�\"c�]Ő���AW�:�A~�w�pO��G`s�<�=�zi���K�<���:�37�t�\\ù�>��g>�rA�$J�	�
�8����K:e���^pN1&ͤ_-�)���ߌ���n�����p�p��艁���%P�O��(ɹ����߁�l���ޅZ��ָR$NX�	mk�Ò.f���2�LJ�y!�?@�d�Z��
��Y�IĚ̴9�e36o06�uE�9U�7�(#v��7I����8�q��^��
\"�<i3p\\�(٧`O8�cm-��I���>���;�Ǹ�
y^�Vwx:��~>��θ�HK`3��������92h�!ed��V��Gh��#�����/c���(������[�-ࣜu|�@/D�o����vʠ��X��-����)O��t���-�O��P�,��YeݑgA�����1�b���r�ʩh�O�c?%�m$ƙ��l	��(b!,��\"9��j��=�{_*����������{#�}������J�S���t���=��\"Iː|+Hq�z\\ٞ�x.me�<���A�k�I�׏$�%`�.u�Fc���R���i���)՞�,n
 ��2M���OH��G�s��7��$@z��ۅ�F���c0�|�a�[�a�)�L�O������IIe��ן>4Nrڸ��\'�.\\F���S���J	f�ؙ���|���0?%M�����mvvR[L����Z��O��jSVR=pz�	T��+	VT��\'�#�B�=�_��������	o
T�r�~]�����_D�@�AS��������ui��&��[\\���M����ߪ�a��kw������C[����J7�f�����_��{3K����}��.ܢ��}����>���?S�O�<S��/���D�5(�$�u%��&�
�#!��|X�W�3t��!_N6��g�4��z▂3�z,�.�
�
~�xZi��?V,�!�؇�f�Ǎ�\"j\\5�(bƟ�?��1�M���t�
������,��Ǻ.��W	��S��Ã�xe�M΃���H��\'>7�_D�)�~�%�^�%�Z�Ԧ���~�y�a�y��YA�0��:|�bl&X�\\��T�+=J�*TC
��߳P~���������_F[��m1��ѿB�K����v@xp#�9�V���gr.��s�WC�<\\��C�U�y1������tR����ʗ�ߠ���.�%��lu�J��8f���N
�;��\'-��xKd�.\0�c\\3���7(O#}�]�����E^`v`��ԋ�
[!\"�--�4�_z�-9)_Nx�ˑk�%�q���Ai^G�[�^���%����N
X��~4�t�?���w=Or�>�G��A�S��?�+�~�A��.#���w�����V]��Y��i��X�ʔ�(N@���d���������~m�	�WMDO�X
�zg�9����=&��ƃ���D�����H6��0|:@��Nё,񷐘�>� ����q�P;�OC��Ɣ��-]n��ܗ�ڡ2�i�*��p��(Q��f��KM2_���9UfF�SeHcs���46�$!��2_L[�qԆJ��YiKz$$�-�!��]�H+U�\"��V����i��R��!�9���k�Ci�<�jS\\]�i�.�p�K�Nc�p�9i��P��~YCs�X���6)�H�K�Kc�p��Kc�p��i��$��5�,�UB|9m�.� m�.�hږ1\\naڶ��J�r�����r����p�����p��ik?k@Rq徒�f��-I[��徚�v��U��Ow�WJ�v�?�ؗNni�����4���[6̾�ɦ�b\"sTG��Q�1u��Uu���_��_�_�_�����Ih��Z��O<��YF=o��d���P~܌�݇y�������O7�;�{�h�3��M~Jx��.�@�+B�7GS��D�,�ϫ_B�_�_����S��/�_�u�*L�L}��V�k��)��ޓޓb
�b|������s��f ~��(�$�k%��%�f���Fu��Mݩ�Q������Q��zB=��Qϫ�(���I���j2��\"Z�6B�Q	_�w��	�$m�6]���j����\"�B�&_��Ԫ�m�V�mѶ�wi{�Z��S;BWM�F�Ek�ڴ����vU�Һ�^]ս��G�l}����Ǹ���B}�>U/�g�e�}n�?`_�/`����O�?��&����n^^����J-�a�r�呰#ao\"��������W���}�lmŽ:?kJ\\7�Z�ތ�A
��F��Զ��M-��.��S1i����~�kK�{�r�b�^�P�������Di?�����c�~�m\'X�rP)Ğ�5 �\'����v˞Ajh��-�oŴ:�y=`h�`���)XF�s��C9�8�Ų��������b���*�Dۍ���Q��S�3��f�Ym�h���Ӥ��o�t�)���V;t�mf=2Xg������
~�UyT�1�^Vw�����KP^�M���|Ux7Z�%�[�ͥ��q��3&R���\'�yX&��fϦ�r��&�Uڌ�=�d�Z-�T�gh��S�i��)n���p�C˧߉yi�TO!��Vȡ5ZNy����Vm9��r��o�S��-������)?Q���R����-����b3�?I��wD���K]���j|ˤ��s�Z����c}����z=����[G�޿+�&�������~�4�2�5�*�னE��lF���a*,6T8ʬ��,�H�L�������>�G���RmN/mXI����r�ʢ�RZ\\_�}�q=��zD��
��Z�

_w__o_����7�7ȗ�+��{V�F���&������x�|3=�}TϾr�b�B����V���Y�[��(��^�m%���o��
EK�y\0���:=�,�u>��`������Sp�PK@�@�)	�SK!���h��:�NY�=�08O�e�,�`�\\���b@-I�%jVíe� �`]
�%�!à���	����괩���-T�CH}V�������9Z^�A\\���
SW�Y2]�h?�|��t�W�)h3Z.E�B\\�ɵ �%� ���gȦ���[	)2���B��:\"�]�� .���>���p��`�����̴^Nt�����l��b���S��>h��ާ��!�@#*�5�Ю�ӆ�*����\'\"R\"횱iίqP���_*
z_e����^��X������m�����\0���Q�u�s��	d\'��ƻ�ݍgY�x��Azdx�U����p.sʲ�ʅ4T���	���r 
����_�qv��2��_��$r����\"�?�օ����0N�
e�\0�IYK��O`���>�7�E5�s>4��>-�Q���o&J�bo��	��&��7�|p$��JC\\�ծ�_�T�{�Q��g�z`� c򙾥KI�Xըu}���OD��-�
� }ӢnST��\0�vu�j���6EQ��.w���*|�Nu4�f\\m/2��8[}_A�*��׺l�]��W��+�������SQ87\\����C���\'����/��57<स�kO��r5�
r���80�jCv;x]8�^�����O�U�>���q\'�
Ta�������8�^����⶙�1�}_O��l��
2kȬ7~ʭ�ɼd����R�A�N�Y30Z�f��r�c����lS�E�y���u�f�e ���$�M��\\�8V�ې��
�p��T�����g�_s�Yj�Hkr��Zⴟ���N���;�%�����.b�m�<����4��fK�ڿ�����U��:���
��;��pK�z��]T�Pw�`�~gc�_���q�q�G�rB/O�Vuo�,ǃ4<�\'�<�ܷ5:���g\'F��=����ŷ�6�O���{l_
W����|�����.����{�~����	��_$�D�\"���\"��,�Kd�1��y�P��1nh���d�TC���[6Ӛ8��bF��\\Տ��ŔA�b�t���<r/��2�R��w�^\'6���e�M�0>���Żb�t�&F:�ȼ�]Z�Ǫ���J}C��/������ںPA��ZK���Z��y���6K���[,?D���zPM�?��q�=�_\0�
h��Zgt
�U�8>���5
�
��R����\0!��|�§|�=\0�]pw�{>B��j������>ǐ�p���G�����+���/F	���-��5��s
��)WD(��zG(Tߘ�RO�9���[k\\����IE�<���\\�M��p�X����%����6QI�Z��Sk�8\0��h8�pf��f�D�ⶨMd�`Z%�k|\\��U�Md��M��5����[���5�i��ZG���\\W���j%��i+�_�u�Ύ�r�������.�íD�S�rʢ��(��EM6��TӚЭJՊ\\},���h���G��Ȫ�\0܊����0��T=���(x����H-��JG�I�8�,��z@edm�����Z�N������޾����o�X�r�5�]�z�9V#�,�����!�W{L�ױ������u˕p�+ǺV௫^up�C��Rn�+�V��n�[�Z�j����
�Y�����76h?�D
�p�ݜj�>��\'+tjOF{��h1{ur\0���i�m�\\�0�?jy��h�?�|�E�͚+����ͫ���\"y��GsE�g[���%���\'��uu�g
�\'(��{O��u?G��OL9+P�
���Wį��[}��V��6����L�.=����kL��4z�d����\'P{������X�������ۆ䤱ɷ��^]]����a	�\\��.�ڝ]I����t�xi���.�^�v)����5��/��(����*�ݫ��/�	�gX2��uf_e_cW���Z�M�\0Q�|�W/�YPI�]��@nT}T�s�uJ\"��4u�|�4�d�͉җE�[��{��IS���s\0�.���{�X��\0n�
���0�2v҄�y:`7��}\0s\0捛0y4/,8p����3\0g�\\0��&�ŀ�\0W�\\Gɏ�\0��|�Ф��ď�PPp@?`½w�� S\0�\0�\0v+�s�T��00p`e �\0K\0�\0���\0խ��,K�JjA~���w��Tj�i��:SkI�6؅�SWj�Ԫ�Q;�Nm2�ڗ�
��K���ƽ?�z�����ʸ>������c�o��?g{����>��1ޓ�K�&�u+d#�86�Mc��<��Fٕ4�>O#�Vk_��v/���:9۴}�Mn\\����ح�Un�dlC����6�2״��M��P����6���dcO3�I�^f����b��^[냎����D�\'�߰zѩ��<x��M���ym5mi�i�y^c���gƄ[
X	��n7��Фy��7�0��h��M�6_�ņR�k�=�����΍%����d�knT��\\s�z/���Ɖ�l�}��5WP�[b㏨���;��߉{?�>rH��������F��{ώ{���F��{�~A�����R5����Sz��n��
�(ޭ���ʠ�{o�?���b�&ZS���l��Zd-�VW�<�U[q��m�}�u���bVZ;�7�=�>�-����J �+����W��x/�c�D�������b։�$�l2��g�������땴\"��w���]����㐼�d�&��L�y��8���N��e�,�[�E�(�b��\"�+�D�P,+��^� ^��]��X.V�ub����7��OG�1Q%�2A&�T�.����̑�d�,�c���yLP]%�a��;H��!p�	��;!p!���Tء�E�;�\'�bzkO�;�N\\�} v(��](t��W�-D���N\\
�} v(�5��(t(p�u���a\'.��>�	;�v�@����o�a������w����n��`��`w������:�W���������z�W�u��+��u��k���&�W.���5��u��k��k��k�j��3x�j��7x�f�*\0^��

7͸���7=��Ñ�fD�{$���Hz�FқI�)r�ܻ��ʍk]�i�^$��Ƶ.�X$�ّ|��;\'���|�F�}2��H��D�]���|���/�Iޏ_/����U?gǭ�h%=e��s�Rs���بh(����̪82%����6Nrubz�G���X�m�$s&�K�%�b����8sՉ�/%��M�$���|�6��Y��Z�|�cr����~Y�5�\0�-EuKc�\'�{��)a���-���/�@�\"�xq&��8�zܶr;���\\������\0�:�+�?�0���L�C�Ñ�t\'���p
����VqU�JM<�r3��*|Aq�O���(幨ծ�Z�ur���V!��R�v�F_hN�e�libcDO���������%����p{���y������Ŗ�7n4hH��JC�>�>��Inr*�5Ы���]���/=\\���}�r��:?�yM�99\'�$�[����D�j��>Ϋ�6��[���g�u�Fq���GS�G�Xt��	b��.�=����P�}(�S��xJ�P@ܦ_e��#o���rq��-�ȹr�,�����\"�-�T~W��?�?�?���r���\\�RV�_�����]�N����|S�%� �(�$ߓ�����\'�N�ayD�K����\'ٓ�P�iO�_�_�e�����[�w�����;���?�����������?�?�?�����¹��rz8�8����C�[�ۜ۝q�xg�s�3�y�)w�q8�o:�v�9�:+��v���}Z�KBׄ�
�B�x*x�Ƭ0P��8+lO˭�U�����J�6+�s�\'�����
�4+�_����o��}������o׬P��Y��bgi̬p�kV�1���Y�Y�B*s|��U��+�C���v�5���o�*Td��N\\�(W��IS%r��Z�t_����+����!�#%Q�L�%˻ѻ�	����=��;��o���O���N�b�v��M���%���,3�A�v���^�z����U���������M�W�����}0��F9zYG{����T%�F�2�����hبa;S����VAe���Ak�9l�{��l)[�RBX�/�{�]eW����=�6��V�R)�4�P
l
F�5:A� .�7(ґ|�Fச���A
uw�����gT8
y��U\'����	��;dsh�?�%�	r뀕G�xY�\'�I`�{:x:��<��$v�=ڞ�����ϲ���_�,�C��^�(�Nv�3ՙ�8�����
�Ԋ�ܯ;%>�Ρ6���,VE�\0hI���Q��1������t��~�\"y��2��U2<�U���i�35ћ
ai:N��?�� �d��V�-�c�_������\\� �6H����Uq�����J����֍jW��!W1��RV`j�o�k�!y&�~�څ�a���pV3�\\\'��2����S����~lk�4(h`��\'����\\2��I�ߓM��0ĸ���DC�~�����DsO�fm$�4�%dr�>�-�m��ɟc����_������8����?��j��Z���&�Kt�I�\'v�R\"i�J۩;n
���U�	F4	��\'�N%#4�
wk�^���/��77~$�&u�������ݕ�Ti��鷗DK���C_�R�8m�lZ3b1�c������>��W�V���2�[�,��O��hql��G�pM$���e���V�I��d���s��
8-�W���1B�#�A1�Q덣��)�Z˪X�~T��P�{���jj�lt����f�}� ��>cU��l+d%YJں�������;ت�<��{��t�L�a:�aX�!��ư�qK)�A�[k�j�����\"TD��� ��\">LA�*�X�Tb\\C�1�5�5�c1� !.����WZf\0��]��������������k�eg���4;�.�Ks��^b/�k���:{�����ީ�f��^QfezԢҫ������E��-:ɴ�U��,:Yr��X��40���f�f�Y��������*� �b)���Xwj���p��P�n_}=lm	w���R�N�)�������n����=�^ѽa�h�YO�̔��UTz�҃�^����E�
�E�ͺd���Aу�!�Ca�h���Uxج�v�y��w�<Q����\"��Trf�e6>{�u=�J�8�]
�:�Z���3��gRш��f�jkӭ����k$_��F��f��n���#�Q��}�>a��O��R5P��45J�Qc�8��i�@�9/-�fբ�.;N>�tR��KF�8�N�S��8˝:��1�G�c�q�s�9��JG�@����(=F���tV�x]�k�r]��ݬ[t�n�G�Q}L�\'�I}J�w�q�)n�;��uǹY�4��-v��*��]�ֹf����)%PJ�SJ�y0�<�!���Rz�JN���ң��X\"�q�z�r�-�6}��X}��/�*ӹ�@<_��b]�+�+$V���%z��2�J����z��:���q�E��o׭z�x�>�;�J
�/���@�H�??���_�)������>/~N_p��H:�\0�����P7M<�ᦋ�roqo�U��.�;��n�x�ssŧ��n�x��l�x�[�J�ѝ�.t�ܒ�^�_!�]/��]�nor���fw��*��ms��w�G�;���ď�����w�����=)����{Z��{ν �����r<ϋz�o�{C�S�To��po�\'�ao�w�7V�v�No��8/Ӌ�g{Ӽ|�<��+��z�f�ʽ��B�j��[&��[�Չ�zk�u�^���5{�ŷz;�6�=r�o�:������z��}������R�������7�)OJ����,Ƿ|�7#P#���`�A~��*>��K?���o����)~�?�����i�S�<�P���闊����|�J�گ_�/�W�/�k���k�F�I|���o���K
�?|�?�-��#��p���p3k��i̊��c�o	oc.���.f����sC�����(��?,��JS����[7�qS�
�r�H$��\0�\0�\0ɄdB2!!!!Y�,Hddd$�
 ��t�t�tH!�Ry\0�\0�H�R����	�	�	���)�C�!B�<)��@J �!�!�!��RH)�!�C�� e�2H�a�Ð�!�rH9ddd�R��̅̅̅TB*!��y�y�y�������G �@�TA� U����E�E�E�ŐŐŐH
�
y�(d!d!d!�1�c�� ���^4��P���9!�x����h<BF�A4nz��f�j7+G��=�4�4�4��� g g g g!g!g!� � F�Z�V�6k,3�2�,��Y�yn��&[{	�뷫�.�ɘ��Y���3��43NȌ�0��M/�ܿ1c!���k�W��� �W�߶�X�	e�UnͿdi���j�6Z�r��jc-eyf�{��I�W%�ƈ�Ri3�WK�U!��,���b�Y�޳��y�z6��3~�J�y ucNw��}����E)=��d�߬�`v	na�%�;�!cԊ1����y�CM#�s�c�s�_�/F-�f�Q�Ũ�b��9�]1�uT�z)F]���Q��P�Ĩmb�01j����W\\�z*W��p��+ǲ�Yj wm��g>�z{0Z��rȥ�p/-��K�ʘ�$����u�l����b�d׮��u�u��p+U,�8B=�I�L�c��}�g�%Mͳ��ӗ��u�ZJ����6�!��|^,%��Œ˺��`�O�Y�W�FKy7䪟�%q����ٝ��)�x~��+$]\\I!�S�|���L�A�v�Y����S��MM^���|>]�ۧ]��
z��s{\\��r��d�������毗����&ߟ�L�i�g���+��w�R{���ʍ�䘲މMo�+>���nr�Cc3z+F��ڟW.�$4����]a�^cC��H?��Z�:�cE�DG&WԴ��\'�^$v
��֠+5פO��睗=��xg2$���e�$��F����EEs�
�GX�H��5|�����$>�bTB�@�U�j T
�b�̩t���X�4:MN���8{���A�\0����9�|�|�|�r����uDߨ�:M�ԣ������]��\'���^���ro<z��N@3щ=rx��NFc�9�r�<�>4�-@����h:���B���t6Z�>���������V�����#h�\0]�.Fk���%��R�It��]��B�Fk�g�:t5�}]�>�֣
�=����AϢ�D�V̿���URQ�P�������G��jnez�݋�*�S\'̞W%Z5{Nzj���ʿT�*NO��;2gW%ޗ��k�����b�	
endstream
endobj
199 0 obj
[ 0[ 293]  3[ 266]  319[ 604] ] 
endobj
200 0 obj
[ 266] 
endobj
201 0 obj
<</Filter/FlateDecode/Length 227>>
stream
x�]�Mj�0��>�����d��(S
Y�=�c+�����,r��n�B6��}�Y��=v��7���\'Ǹ��-�\'UW�M{Wn;������$�;�j��\".�78<�0��ү�=Mp�����k��8#%�Tۂ�Q=��bf]�c�D�i;
����\"©��o.�XdC���j�y�j�����0�/�⾜/�>������3��weWf�SvP����b���
o.
endstream
endobj
202 0 obj
<</Filter/FlateDecode/Length 21234/Length1 241160>>
stream
x��|T����9��%�&�M�I`I��r_dC\"�`$!E�`M�F�DTo��z�~����Z�Z�\0�`��X덪�Z[�*^Z�(UkU0�{gvhb��{��<g��yg��9I8ِ �l�VM�<mr���Io�H��u���I���~u5ך=y����7���o%���\\9k����-#�����pFUeE�e�0��\'��_N-�9�2I������1�2X0���iv�מ5qj���+v]��-���5Os�Bڇr�����xO�v��m��O�o�����a&i{���z^]K3�������ޅ�Ͽh��\'IO�M�hm/�d�9� Zsi��56ԅ��wn#k���F6d������8?�q��Kj~�v��Ht޹4,^H?�1��y��s/\\T_7�ڢ�Iw�?�?YPwI��	|.�y4,�{;p��x�ws�̅u^}�r7����.m^ԲĜA���Kd���
����%ے=������m��N$�+-��ix��FN
R_�E	W+�n�(�M�[�[
�KO��?O�kiv��d�����id~�+F����^/�(yp�eW��l�C��!���r�dX�ѝ�<��z�M����n�[�8V}�R�Wi�=�S\0\0\0\0\0\0\0\0\0\0\0\0\0\0U,t���\0\0\0\0\0\0\0\0\0\0����e�b�����Xv�Mǰ���Z;q�Wk��|նǃc<�o}�v\'��\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0����>b 	��k�9L�=�\0\0�D�v�\0\0���Q��W)wl�\0\0\0\0\0\0\0\0\0\0\0\0\0\0脐AB��n���J�D�D�I��� ��%%S
k
���)���Nr��(��Gi����4��Xݔm~A�J��k6�e�C��ϩ/�z(�������r�ǚG�Y�4��\'������~�:���!�4����a�C(`����p�a4�5@A�N��\'�H�T�T�O\'��H�Z@�Yi��Td~D���u4�eC%�EJ��T��4�Ʊ�B��%4��K���q4����YC��x��:�&��Q�D:�����t�I4�u2��ZAS�=tMc=���N��g��OSi&�T�:�f�N��Xg�7��h&U�VR
��>K�����|���ݬ���Xw��/��S�z��E�+��o�/�[��\'z����.����+�O���ֿ���*�M{���k�w���c�qzC��	�_���OYߢ�X�f�
	����jrǶ{\0\0\0\0\0\0\0\0\0\0\0\0\0\0�8���ыwݛ��*r/�\0\0p\"q�O\0���\0\0\0\0\0\0\0\0\0\0\0\0\0��R��?֞�H�����#��\0\0��r�O\0���^��S5�H�c�=\0\0\0\0\0\0\0\0\0\0\0\0\0\0@gJ\"id�Ż?)ݛ���Ӌ�\0\0\0�H���\0\0��ы��a�:��;��\0\0\0\0\0\0\0\0\0\0\0\0\0\0�q�&�wl=o�ڽ�����?\0\0�_�a>�
��nȮ�m�\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0��H\'��>&��2���)d�2+%S�JaZ<8�4ٞL��y��hxկz�Ci5E�����(k�_^�ap���ñ8���X�E48=��C3�U3��9��)��V1yRل��q���2��h��Q\'���8ix`��!�
|�je��x�{�,Y/9м���*{J�Yӝ�s�˟�-��W��pd{�񳢈�(v��˪u�Ki]�|�*�dTC9\'|�lu����#�@�RV��SR�u���&�NE@���>�R�{\'e8#�$\"2���^�n�zVX<�������<�� ���ظ�����D���r�Ϩ[Z�N=p��K_���5�y?��������U{��ûu�Jx˽��bG���m�����n(o{첬�-k���v]k=_�x�_����Ww$4�G�ŧU���:6KE��.��:M�k��Y����ٝR�%ש_�@�qqс�_U��w�Ox:g+)>-^L<^�irR��S��b�����>��s�|�h4��/����Wή��$�^_U�YZY턚�\\V��KRVMZ�Qf�2CS��Y����m!�U��P��o�l��MP}��9�6�mF�R����\'�6�q[����vQO�O��xbD<1<�p�F<��\"��J�J;��W��ҿ+ݫ4Zs��w�����J_R�K�N��(}J�J�P���ǔ>�t���F=kS�I�Z�k��*�A�j�W+�B�J�+��U:]i������=|�ﳆ��BU	�ů������X.�<�s��}��=�/^Ʋ����E,,��\\����}�,�p��7���&���OC�5��ӒyiY�r�����Byb9(��..�<~|�6��2n\\q�],�\\<V.�|��DEE,QTKMl�Ζ��nv�)Ò-C�HÒ�YYQ��$�hْ�(KoIK�SR�w?d����[��ػ%��eƻ��2d#��-��ť㓍O��F�c���~����-I��҇�Υ�񴁣f�����y�ЖSˢ�ʭ�-Ã�cV?y<5�9(P����@��#�Coy�\\��W��5����_���aŕ3���׵�7��\\�Mh�B=Z�����}�,���d�o�@��Y}�_�7��z�H�I��sr�C/�l���xh��.���,\\k�}dd�|�.�!�\'���37��\'
Q��]����߳��zS<�#;�k9��vЕt:ͦ��-/����ͱ��|�g��Q^B��R��xe��J5G�����l����#v����tWǁ?m�ӓ4����4�t�k%]��ӥ
���P��ߖ@+t;��`൴b*-�Y=���(�m��X,�;Ƌ�e����_eXs��?侴�X�.��N�g���dqF2a�LX8#S�}�%!ٚ�JK�
!D6\'��].����R���n~���d��NY�r�s����H�?��fW0x��*/.������;2O��iYl	��Ι3��w�<�o�	�4؟�v�]�\"3�p�Qh]��#;�#sfG�;Ӱ���^�j
��C���?[�ВhР�502y��X0���w�9�Ŕ}/����5e����ӝ�޾��eW��1^%Z��yAV_��Z��l�����sC�9�ѫ�k��(�xM>3ұ���ߴȊΒ��\'���O=/8l��ុa�G{_Wy�f�eM��Oa���z�Ճ����~`� ��c.��}�u�4o]���ԭ���h�?�e{�E*e��v}y��p�eu��*t���2�\'��YZymǭ�e1ȰX��+i��I��=,\\�\'*2��U�c���9Kf�������Yu��Y:���|?��b��l��U�����&���B�f���O�g��
�6���2����3����0	c�_D����UD�?0�[|��Q�K9���������b�?g��%��	I,	2�¸1�Č���7H&Lh[ڎe��_p4ͬU~a@����$�/�H���s8]<�����<�GZe�NX���e��Uʙ1�G+t;�i��W-_�b�)��	�]=�k��g>�����\'�E���8}ن��%g]r\'�l�6��=��\\7B����@9���*����mˌ4�=����a���R��z�kO(vL�=^:��]��/�Ԉ[_ן���0��\\��<7��p��Z��fM(ݲz�F}�w9�.�����dq\\�L�T��q�����s�MI�۵�%\'GC����c���}IQi����!*h�jQ�,�g��c�;��Gs��0_%\0��h��M^�}LMϖ%�m_�]��:��Z��w�t�����8>���7ӎd�<o���>(%{�8dg���	S�~��u���4�ڨ8sm�mйі/w40��<�wǗH��O���^~�\\�`����>�rLx�O����2*r]E�l���{����5yA\\Z���^���Gկw8��a�3:�����Q�ϋ�2�6��]���<P����-#˙���_W�}3z��X��󦠣�g�V�=
/�Q�����Ku\\��0b[2���L��2��RU���Kh� �ɴ���$��U�i�S��sV��T3�:�q�z�c���Gt|�?��S8?��|�3oݧ��K\"��r���;�����`k�����\\�/�EEt�����՟3��=�*��xQ�V~�O��N���n`��e�>U�.	�����[�<��B����ӾsV����
[�t����L�?6�Lذ�������
5\'�/sz�;_*����\\:Q7�z�����&\\�[�CѸ������3��.�<Q�1��������-���
�>�E��ĩ��|��~��Jc�e$�S��}µ//�u}ڎiy��j�>)�+}Sn6�AQ��~��8|��T�X��z�]���Y��<�,Ҳ�k����o���N��}ܼ�A��{��_:��a�d�����O����97�v�v5��Mσ5�[
����,*.81=4!�tRr������m��F��s��˃�#��c�t&����}���{M��ۈE�ɫ(��.5�t-9R�.Wn
��r |#_pE�Ѣg۫c&g���t�W<��p|���;�ߔ�{���YL1�ά�4�xǸ�fTɎq��\'W�Int�6r�r�=\"��:�w�g�M��p�����(|}c�wH^�z�Mq��o?�A�+
�ݔVdi�}�ՖVrI�m}��uk32�?�-���e�Nֻ5�c�/n{��&}�n�\"���+u:�RU�:��j��_��~����ݔ��E/��9�>k�vy���V�K\'��A_�No<R�_:v�O7���M�S���b���=r0..��;I,�u�<�WC����������?�Fʲ����+pͅ���0O�G����V	��Ǎ<s�ڦ{��Y-�y��I�}�wn.Ԧ�~�Eh>��-3�2��R߿�:��g��ә훞09218aR��b3/�Yg�LLjO��7�ȀÞ5hzi�w���ު���N�u�0������k�{�uf�O�֞����hx�<�7iKP���_��_�I�Υ����W��p���)�T��7Mj<v6���m3��1�8��as�F����V|5SPi��^s���y����9ɷ�s��{�k�f+Z�h�׌����֚eJ�
z���:��\"uީ2�g��CqZ{7���������ў�]h�����\\�B%~��u�gU�������-5�Ot�C3�b�lJݽQ�C2��?ޑ�<��0*e�5��6����O�=uI��y!�i���oN�~F6�����--�����#��6>��O��+a�Ys�B,���-��WFs>��~����D?���@%�e��m�v\'G7���m�^h�,�,��6s��t�}ݖ<�ϝ����(ĳ�j�d�9������t_V�1��0��[��wi1��EY��6]I�r{zv�FO�:ބQ\'����ޫ�W

ѓ�M�F��$l��3�Fx26]OL$\"{�|\"cO#2�\\b.QD,\'V1�u����N�$���q�	��U�U\0�nQ���L����+{V��d_�	��2}\",�dם8��ՁIC~�h0e���1ɑpe���#&aL�&���n:��#��Rb%QFl$�;��L�	�!�~�hf�y�
q�h#�D\'����������$W��qib)׆I��\\7�\'ח����2��n,7���q3�k.w.�������o����)����{�{�{�{�{�{�����}�}���#�1�y`Fj�e\"�J�+����_Օ�0Ɠ<�g<�7���~��/���Y����2L��؜��W,~�e����2U�ތ�CY�_�a�������d�kMb�1�\'�w�f�a����w��9+ײR^f�|f�?[2���Y�*k�(`5K�g@�Ӳ��e[䚲�XYɮ��L�8H���`e�l���y�L�|b�V�I�k��I�}Vs��x�0�\'���I�&�VUV�����yw=,Vb�Yl
�Pİ\'��P�Au�j@M���ԅzP@C�����@Shih-�%�����B;h���p\0� ���3�@�
�B7����p�p$��7�p4�B?8���0\0�	0N������/�]YoB`(��0F�I0
F��`<����`2L�Sa*L��0N����	g�,�
�V�*�	n�[�V�
�@*�+��&s�.��mAA�#p����P�-�}c】�_�L��`*�D\0Z0E���`%X)�l�3�3�0a�0mU�����`$�#y`)O�/R�Tޤ�|�q����Ɛ��-K\'=�9���Rr#��� �zO�������g8��hLY���T�%�C�>�&Y��\'z�=���D��\'?�ӟ��\'z�=g���e�+f�G��*@���2X�A�Qe��y��Y3���\\���x�<�*��\0��K{K5��R-��TG�+Փ�K�KnHnJnInK�H�J�IZ%m�������K�+�k��[I�������x�x��B�U�M�]҅\0� q�\0�!y��DB$B$��RF*H�4�6�A��\0�>�#Sd�l��h\0�� 䈜�3,y(y$y,y\"y*iG=��Ez�/��9�@��
�\";d��K�����Pi�4\\!��N�FI��1�Xi�4^:Y� ��0BH��P��4�!�7rE.��4U����P����di�t�8Q�$N����S�i�tq�x�x�x�8S<S�%��g�sų�y�9�|q�x�x�x��P�@�P\\$^$.����W�W�׈׊����u�Z�j��5��̛rd�\"�dq��\"�@(\0Hh�@Ȭ���
�������K����@O����G�〔?��\0z��O��Y@�?�������.����3ϐ�X�/�/k~�2��_�_v�v~;��w�;@?�%�\"fm9@�=��������L5N�\"�Xvֺ
��`�`�`4pc祻 J�	2�`�`�`/!o-o<���.`�p�p<�&�/Íi`�p�p:���,0^�\'\\\0���KA�p�p#�\"�E ��K��k\03���
�m@h#�DUhڊ���^s�Atգ��j@��(:����$jB��:�Π��:�.���jA��t]C��
��k�Z\\���:�o�x#��Uxތ��xގ�q
M�i4�f�L�E�iͥ�i}@�i-�E��>�%�-��i-���VQ:��5�Aki��
�\"�]�)�ɞI���4�,�����ë8�W��ർ����ț<�=��]�����#=3<ӹ(��\\�Kr).�e�,���\\�+r%��U�*W��\\�kr-��u�.���܀r#n�M�)7���*��׸%���܆��������=w��܉;s��ݸ;���܋{s�˩��.f�K�%�Rvi��]�.g��+��Jve��]ծfW�k�5�Zvm��]׮g׷�
j����ʡ*��\"j�J��*����*j�ꨁj����.j�z���j 5PK�5Pc�@MP5E
�����m�j��6��^�m�j���H+nkV+ݷ
}V;��°ca��)�zx��y��oG䌨�#bvľ��#ݑ�#�DN��y-*:�tT���Qۢ.g�P���P���D�2���x�zs˖�Ȗ_���/Y�e��W �W�W�e@�W�?= ��}&��D���>��3�!�B��Y\0��C�,
Y�8d	�,	Y
�4dȲY�<dȊ���2dȪ�� �;d
��!�C�
��5Ȗ�
�5dȶ��;��oB��l��!;Bv�����Cv����\'d/��
r4�ȱ9r<�ȉ�i9	r2�ȩ��r:�ș�� g;�ȹ��C΃��!�C.�\\�r�C~��#ȥ�;�2��+ WB�r�t�Րk 3 �:�:��� 7Bnr�͐[ �Bn���; wB��
y�7�L���\0�!�#�ǐO�wȧ�@�	��C>���9�?���+�t@&��L�2)2�!� �!# #!��h
�k�o �u�� ��<y�C��
�����������*����J��������)U ���.}R�g���h��r�{�$�8��V�~��$�еwJBÎ�R_|-�SJQ/>��?%�5
endstream
endobj
203 0 obj
[ 0[ 646]  1590[ 749] ] 
endobj
204 0 obj
[ 226] 
endobj
205 0 obj
<</Filter/FlateDecode/Length 176290/Length1 533488>>
stream
x��	`T����{o�=!�$��Lf�OVB�!	�����@\"��,l��R��K]�V�j���dD
��Gsq�n��Օ�X��h?���V-Y|҉\',����.�?o�ٳf�̘^=���bj�o���&M,-)�P4>Ǔ���v�8�1a6��h���J�9ȪtV5�~w�_�vVWg���
�8�-�W��+���P�ϒ�*�T0c!)	{��1���k+�U�[�**p�~�a�sj�!;�
Ռtop&���l�V���7-��0�ҏ�^�M���-}Ί
�[m��[�o������l�؀�hca�W��qv�#���\0
�X��PA�����v@A���B�~wB=��57�]�W׼��h�7��\\&�ٓ��z_��������O�K�f�z��ƴ5f+׺tbo��n�A��g�$���vIE����:��f8�܂��kj5�Xש����$���]�I���F�eCÈO4��F��C�beK�(�T-;(�vl?yyb�c�Y�\\�䢍�a$���s�:g��މg�;�����Z�ߚΚy��ݖOI�Q%�/����:T���ʴ��U*O��#��1��C�b��Y���
����<;��~\'w޼~/wނEu;l\0�y�u��6����`]��+YyfeFVY��4:��}�`�T��R�i�ɦ�8h��f�x����lLp�bZ1�x�V��l{N�o�k�gD�V��眓��;\'�s���78[��Fg9��1{�5̮Ń�Eqv\'�58��Uv�������ں�}���$<j\'�.���3��W�f`�iL�<Ϳ�����:�W��T��64 6����zylQ%�a�;5���J�7a����_��&�k�������R�vS�f����;�g��\\=���b�\"NVOAҚ��&\'V55�m4-��Nw��N��U�I
S��!�E�A%�@3j�~T��-d@18�,��BF�ؑ�oFݎ*w�љZ�C�ċUS��IP,L�P�,A#\' ��㑅����LB���L�=�+اp�ai\"�R�<�E�\\�\\�UB*T�@��TlC�ԳQ/Gݏ��]O�qF���Z��\"�(b{���
D�C\\H-7. �\"��\"��\"ND��8	qN b���gS�Y��Ljr�w�����i��ԇQw�>d\\�����Q��ޅz\'��[QoG�
���Ah\'�\"�$� �L�D��1�Jń	�\"�xB!�����s�G�%��6��`!��)��`$z���
���ͽ=����G������{z���noxo�ĪM����X�C/ge�^������׽�˧�*��\'~�Ž���]�ܮ�.[�ݕ�V�Z���u�vy��S�;|�[;|s:::6v���P�zc���6�������z��U��`C����c\'?|�{��
���6�r_���e�f_��f_�g�����[�9ɷx�I�=�|\'l]�������=�>��Z��<����|s<�}��>�S㛹��7�S훾��7�����U
E��D��Lܔx0QelH�L�;�L8� t���7�9k�Ƹ��+~��눽8���m�j��L����ΰMa|n�7�ٰ7�T�%��^l����*̱.�~b
�~����� �S�=� �À�;f�b����_6�����װ���ax���94�/�!x>���0>�Z.�����i����R���4
����!����E�̟��R���뇷
�yMn���|�-�%��6�jߗF؏}߄���x8A̱ݻRڡ��}d��v�f)�l?�a��Э#{s\'��N�OVb�k�ݸ��cC�;vԞ�w��۰X��}r,��w����Hߧ����Q�D�V�����yT��J���Q���
-��}�X�ט��o���w04�44�f�q����9���X%UqjN�w���s�ę9g����HM��jLǨ�K�pn��e4��qv�7�D��%qɣ�bGjD�qr)�K���zƎ�u`��Qmӹ\\n

�\'����d/�
�&L
�y!\"d�̳2\'����r(�_�4qA���tE;��t�#��*�5��Eiqj�N#�u�Ԣr�o͌�
V�u�r��W<{���p�;�{�#�W���j�:~��s��ԏ�\'�P�=+2;5f�����9����B<��0Hߜe��	��Vu+�q�=
}�sa���o�r�-2l��NP���T+���w=��(�i0��%�:`
zS%��w?�M-��P�p�R�S3���\\�������%�[�¬�i�p���[�>��w\';�Q)1��;c��Fg2�!x��N�J��B���C��/�BRdR�y�G�w6�����5�G�[�5�����?w
�R��/�b�FZ�$%�����Z�o�|JR�w�,�ѩCIJR����$%�]�JR����$%)IIJR����$%)IIJR����$%)IIJR����$%)IIJ��Ko+II��I�ό��]�?�������{����\'��{�x��R�Z[���S�\0����Q��
bT��y5�_���%絰Zm��:�P_*�� j���~��\\FX��WΛ Cg��f�FW$�-0�ȿ���EM��h�+�<��[C��
���\\���©��\\��l9Oq�<ř�g�S�)Oq�<ř�g�S�)Oq�<ř�g�S�)o�Ĉ��<��6!r!��ߒ�M�Ѝ�z�6s]�)}6��
ڡ�#��(���:j]���	=i��o����*��:��ف�fX(��Щ/����8�}�H�>�=����d>�ٗ#O������Y�i�N3��vl�\"����6(���-<=i�4��K��E�&��ɳL�+�L�RlY�U�;=���`~�t��K����:�6���Ш4�J���2�[��h�c��n�wJk�(���]����g�i�L��n�Z��&�>gO~�֮S>���N)���A����F��n�n�6i���Rɏ�.�ݱ�����Y���!��	蛢Y�i���D�\'͛52���ͺF�S��<+fk䕶IO�J院\'���g}��&
n�ߝ��ރuϚ�m��Ħ��:uW���̃�.l�U[]�mq�����/�s�ڇ�E�q�x���9��c�ң�«^��4�1��&�c�e�c�jЀ\'N52��8�J��q�
5akG�{����A犗����n�__h���5�s�	?�u��)ڧ��+Ծ�~_x�u\\�G]�q�z�tu���й��B�[N�@�����5����\0������Rܿ{j�C�`7�8�;��	�㊈�����eP��l!�uBi�hiǲG��R���Ny\"��]y=��Z_<��!JĚ���
��]j[U�5v�l4hv(�X�ͅ�K�<��J�E�����E���#�d��|hQ)j��1 +����E��֖�Ep_��[�Ԝ.|U���w�>R�W
��^�b��5���Y-W�	w�p�(�\'��J�^����m)j�^�=���(QUbP\0�Gÿ�]��#ն��J��n��R����ȕ���F>jU�W�]��K;���u��B��E�+�FH�^����S��<�%j}J߆��sT��3G�R:�=}~\\���bL�vUv�|��an>+gfܘ%�v�|A_mH�����#��y��\\�G���ԅ���t]���bWu��$��]ު�~�\\��k��w�\\��O(O�J�7��q�M�;<�:������WG��rq�3��SU�ʞ�rj}9�]�q�8<��l|P��5j\\���&G�%7x����sɣK��Rw��t�*].�U_�r:]N٣^���`M��W��:�����	��;<��[��!���@���
+��F��A��+)-��`��J�ʔ2���\\�\"�^U�?�4�.W��W�WB�PlYIY�j)]XV�n\\�ǂ\"W疖bU�c��vl_~y�{���*�����.�B�r�Jժ����ܒ�6� wt��B|�J���hݸ�B�����U%�e���eUvPmॽ���q%��69�^R���^�+�\'ʱx��P-E	���0Q�1���m)(�-��*��Í�c�|4p壁�+
��(X������;�$~r�� m�w.�U��X(�ЪK���A�ٗjߣڷ]�}l,��T��8�^2\\���
� ���W�5B�Lz�җ�\"7�E6\\����l��t��QJ��.�����6,r��(��0��`;l��E!\\/��Ҿa�)`k�[�b\\���6�٦��`��
__}g��{�^�6GPsTg){�#
�2�((P��E�,۵EZ�H�����GSO��9�9�Q\\{����W-�Zb�h���׭�>~��W?�u��HM���n�����b�r�F��{Gx��W���x����A��X�un�Qm�s�^��?=��#]���`���w�mr�#��a��33�j&x��w��4����S���k�{�ZBR��(��ѥ`+SYV ��c��v�|ߑIR� rl�����r��B^#�?�O���M	5�u<��Tr=ɶ6:w���d%y	J�O>$�RJ#����A��,Ux�k!+��d+y��K�D�J%��q�a��9f��݋�ɓd���(9Ia���D�� u���\"�l+�V�y��A�@��|F
�X�$d5��E�jj�����2�*�z�V�n�!�q���~�*d5ҏ������\"�\"W\"�!7!�\"w w!�\"8��z�a�Q�q�I�i�7�s
�
�*w��^�l��;�7!?RhID#g �Ƃ6��ې;=ކz�n�>�A��1�	���3ȳ_�\'� #�d<2	)#�#ӑC����.�;�Y��BNDN�J1�H2�������\\�\\�\\�ӊ\\�\\�܀܌܂܎lG���ޘ��C�������\"O!�Fv(�2
ɑ	�d��쏴!35��B��ˑۑ\'�=R�6d�9	�A�0�zLC�F�C.B.E�@����=�!7 7#� �#ۑ{����5���ǐ\'�_+�%H32!̸1��r299Y�,C�Eމ�f�z�!��l�<dr)��ن܌�
�)v\'r7r� ���S�i�Y�qҌ��KFBf#G!\'\"�\"��Fd3rrrph�R��f�N�స��Yq\'�O^��*�\'���LB�A�6����a�d�Y��
6��\'\"�\"g \"W�`LƯGnD>�܊܁܅܋<�<�<�<�<�<��fFư!��C��0�x�5�eM�bM�Z�����t`�u�К
��*G{TY�G�N}��®�XH���TY1J��B�yF�w��kUګ�ܤ��aB�PeU�*�HB��ʱ!U�������>~�No���t��0ʟ�D{�.�~H��u�O-��wm����th�]���D���Nc�<T;�F�ẽ��2X��OS�#�H;�K��q��ڻDoyFyL���T�	�r�*}b��D��Z�s�o�TH��V!E=wR���E�D/��QO@�7pD�`?m��y�\'��K��Z��6ئʐAȹBQe�$!E>k\"��B�EH���T9-GH���!Eƛ~R�3��3v��un���{�yN�ws��$�Q62��RJ����$��f1���V�L1�gR�Ū�-f�}\"��\'�f���E�ݯ�6��9w�N_�ӗ��-Z4:�>���?�����R�6< �ӼX!��F�;���\'�?_���2}|��ߦg�;��0�B�ye�
���҃�N���E���>\"L��-:I\"%��d�5�R�����\'��,^����A�\'m��Ǵ�Z�K�}�=ջ\"�,/�W?�S��j!g)���,��L�I_2�d�l�GF;�H�����\\�;��yb�*WP�\"[���𔘟O	��>���J��V�=��!?����o��]%�~�C�����k��<�ʟ�<�f���kE�ֶa�]��s�����&��Y���ם_�/�r���ť-QȪ���6уmb���������u�yp�X�7yI$S^Ň�9�ٜ,����E����湱�|~�6��o��{�� �5/��Z�8����(zgK�*_J�jğR~�E�ė�����o��m{����<�����������д�e��^y|[�6�n[��Ϳ7c_��ژյw������b-�~X���P��W�Nn\'r�*_[H\"
�ިӗ��o��������1�5���[�����q��ֽ�P��uH��}1���yX�qx�*?؄3���pD��#\"�q�*?��O�/����ȱ���K��__���E&8.z�c1KN��pB��\'\"��3,�����X��K��A\"���nԞ�;��3�C����]SI�� s�B��?������:U���s^!�n�;��N����!!ս?�Bд�JY��B*y�\\)�z6�Lr��j~��!��55��+��iD���ܠ��$2�{��ȍ�<I#�eTͬ�Q�d�@�ʄ\\*����i����+�z2������׷�\"�a١��FPd�7����P��jQ��Ir���<q��x��UB.R=��\\�ia�ӣH��c5+�]������a��w|�N����ӳ����Ӈ����h�L�Y���������Zz���5\'�s�VO4�t�I���:}��>�VO#�\\B��a;7hO�,��2��9������_��@yWm<���=o��:�>���iu�T[�\\��G��a��?���e:}����7��Z��e��5h˻n�Nߥ��u�����x
l�n�uֺk݇W����/U)�G��!�@(Q�jڃ̢ɰݙM�d.�H\'���֓�G}d!����Ct!]H���d1��~A�Я����[�-Y���yL��\"�2�\"Y��R�G�K�R\"yBJ�R�
���4PHZ���<%���Mj���vi�4��\"�+�$;���\\�S�/�\'�IK���]z\\z��.���#�X㤃
�w���P�=Ş��2<C
bt�t�1h�a�c���dl�Y�w#�[̕f��y~4��,��Bi��ǖ�үc�1S�/cfŴHg�ģX��_�z�k�5,�_˯eq�:~���@f����Y����z��|0K�7�Y/>�aI|�z�,�Œy6�f)<��T>�gi|���<�Ǯ���ɼ������N֗;��]�ky-���x����z֟���]���w���7����7�A|:�ή��,f�����
���g������g��1�);��$��oH6�52d�
�~!�Z\'�zV��K�W���W¯
�N
�>~�M�uJ�������K��W¯��_~}#���׷¯��?�_�D�}�����q��T��,��������9�u�:�����d �/=
������������z�~A6�M0��B��/�6��N�&ߐo�w�{���@v�]d7�C��}d?9@�C�09B��c�89AN�S�49CΒs�<� ިB.���e�3���J�����Nn���Mr��&w��QV�ű����j���O���YmV�Յ<�>d
��Uv�]g7�o�&��n�;�P�Id$
�)\\Ҥ ��\'U�|���@j(���AF��_�P�T��y�|i!d&K�e�v�k��[�F��vH?H;�]�ni�&�����tH:,��E�������Ny��[�#������A��|X>\"������I��|Z>#�������E�G����|Y�Y�E�U�\"_������o�M��|[���//�K��<���Ѽ,/���
�\"��x,�W�Ux�ʫ����k�7y<���������o���i������m���ޖ��������;��xgޅw�Owރ��xoއ����~�ޟ����@�1��!�>������|���G���h>����x�\'��|�̧�|����|����|_̓���/���
�����������|��o��f��o�_�m�+��Ϳ������|�����n������~~���a~����q~����i~�����y~�_�?�K�\'~�_���
RE�TI�%��x�6�#Փ�}�Hm��� D�>�4LF�I��Q�8��1�F��mNa�9��挔,-!g��?/�Q�3ML���Q,Ţyq.)�zD=IO�<�\0���J?��cӧ�kXZ}�~���٥F8����;S9�� Q�F�~>%A86+̢Yy�����D�D(�������W\"�5b5�L=��j��O>I�3�	�H��@� 
D�!kA�����>b��������3�q��[���E���b�(�ͩ#^I�,D^��*DNQ��끜�7�(ބl\"��M܀V[Zj}�.S�\"ksL4-�czM�t�`3�Lk��>3�Lg�7_03�/�͗�L��ff�3������ffh$��������#E�Y����4n���]d�dl6�`|����b�c�q�8�k�!�o/�aĽ����u��a�y�!��RF�a\0F��V����x�(+�G���9mN�Ӗ�%)@ߢm�k�ڕD��t����8R�.�_�F�=�@z�N���z�>d\0{�}H>f��d(��
�:w�Z�k�jhWA��2Z���S���s�y�}��H_�\'�g�)��~F?���/����b$IGR���ϧ���Y��=�B��\"�Pr�v��)%F�����L���2d;D��g�]8�6/�r\"X�P�p�\"����QD�ک@�De8b�#<R�h��x?�eu��iJ��\"&d��KS��a�ړ����0b���1$=�Q�If}���D�H�GRL�I�F�B�����;�t�;�������x�����;@�B
!ˡ.��P�\'�J��Sd�����Y��Y��G�\"�O�s����z��*�yB(�	��K� ���I��A.B���� N�A��.
���<��=*<Y
���&����ǞM�i�����}rm6��~u�����A~�����#�>V�t�����
�N�\\�Winԫ�4�oi�ۚ��+4�=l������FDk�2+�	2��c�d=
�ʘd�dC�d#Z\0dc��&4dS�:�f��X�CK�|��ٚ��-�--��\0�=�9�V9�Ƃ�8�Ay�A.Q��o#J
W�S�JS@��T��4򶦁��e���V�΀�����D]��B]��F]��A݀�E݈�Cݘ�Gݐ.@݄.Dݔ.B�L{Ah�\'��`ы�WiQ��^B}K˄���2�;Zf���WP�	�����	����I�����)�ߩ��D��4�rzy���w��;!蝴�P����I��I/���`o#�튧���d��A0X3�p�7��d��2�li�6C��|([`]��	�q��,ea�Ú�ӂ)�J�hݰ� c���d����B�G�:�Iߤ�h
��8��U1�W�8_�|
dUi5��%^����G��`��*�_s��H��S�Bj5�Y���>�K��?��-�n�(�ZNke��Y��kV���i�
YE��V�UƊ��Z��V��kU�j[��G��28w�e>�X��s߾a߰T�R��#m�끭�3uI�̄�n&0K	R��X������V+�Z��6D�ޱځ��Z�4VG���nV7l��z���՗��~V?���o
\\�!�]D�z���a)�@+z�kB<y��ք���X♜{3
d)�4��d��� �����Y�*��Udy�I&�@V��ìh;ZP�O�b�UY݊o�Y۪��)fՅ6Še
WF=�tA$�&yjh$M��tM���F����Iz�^�����,�e`YX8�`�X4�e5��,R�!���X��TOj&�-u�zJ��!�H)AJ��H��ji��]�)�NJ�+�mY��r��A�\"��r19Z��k���f��r\'���_\"���Dy��,��7����A��|Q�\"�VTŭ�(�,J��S��X��ROi���tRz*��!�H%��Y�)�7;�7�7�7�ۀ��~�\0�;����~��;%��)��NY�w�a�S��J���B
t�I����rO����\0���A�0�C�ScA��\'ȉ���3�y��ȋ�堗��6��\\�,o�M�N�
�0x�<��%�
�_�
}[��H��v@{�P%��J&%+�,JN%�<PE@RJ(Ѡ��

�PP#Քxе�^��n��P��Zi�t�I�@\\PzCm���T�*#AWF+@\'(S����9�\"����j�+�ϕ͠7*۔�@��T��ޫVN�>��U.������\0}M���DR���nЦ�UaT�����L�3�YԜ���y���Bj	���(��rj�Z
z�:\\
 )��\0�א���5$H\"�D y��H^G�$I$��H
\")���BH
!)��0��H� )����H�\")���bH�!)��8��HJ )����HJ\")���RHJ!)��4��H��D!�BRI$e�D#�F��,��H�\")���rH�#)��<�
H* ���\"��H*\"�A�$I,�X$�H��!�CRIU$U�TGRIu$�H��#���6��H� �����H�\"���>��H�#i���H!i����H#i��	�&H� i��)��H�#i��9�HZ i��%��HZ\"i���VHZ#i��5�6H� i��$� yI[$m��E�I;$퐼��]$�\"鈤#��H:!鄤������=$��tF�I$]�tA�
��������F�iM���}I2��y��d�B��,��$���>
��X����j
��V+1��h[�v�޳��(���K�?-q�\"�����S��;���\0B�=��s�����ſ�D�¤�eI��(�OA���F�:�ܣ�/`�<�X������x�>�O����d���r�$��Q�B9�����\\�r!�E(�L�-����(��\\�r����a�h���Z�IY�(�^x����3іaOh���*��Z|�o��9��M5-f��!)����r���;�_��ejk�	�2	k�w�׿i
I��j��?�3�W�e
����[��]!q�ʆ?>J!�Q���8E��~��a�{�#e�21�n�<��S�)s�Ɂ�KJ\\c���Gg2GK���]/���Z����b_����_W��S��Sl̈}hJ��}H��2xD\\?�Z��;I}�ߟ��S:��+���xԔ7t�o� ܲ4ʲ({ޗ��	�9�L�y��*�c�6�f��z.������b�Ah��]�����{��k��L���G[��k�5ޚ1*�Z
Y���F\\]\"��>�~>9/DMk�5Ú	9���}�l���W%���3>P�r����������������l}N~��9�)g�\'Z�����Lz���􌔳�S.g�g���r9<#�l�D���������3W�z�#~�;�̯��s^�?أB�\"U� Y+���*1�D�3�\"���s��Y�3X�ob����j��7�Xc
����h�lCk�?+a�i��2ZUG����@�Z������!D�Y�Q�PYS�_���ڟ�9����7�[�s=����_���?�sn�U�[���s���~q�M
m�0T����i���w*!�	m*�5�i�i�s� �%�E����;:˜%�]D$��t��t�s�w�8˂�|��7PR�����Ā,3��X�T&5H3�
ߓ
;�{N�E|Q`G�/9P�\"�I]�zDڿ��,���~o-��گ穏�ʃ�,�G����m�zY�hq����/�����w�/�o�o���yy�T=lF��c\'?�ORF!��G�Oܕz��Գ̳ܳ³ҳʳڳƳֳ��g�g���F�&�f��Vϗ�����|��}����B��xTQ\"��ձDN��=�z:x:z:y��t�����l�����C(�G����=�<�a����\\�p_n__^��W���/���p��8k�U�x�Lrf;�;�	��!�;޶�v���w������y;{�z�y�{WxWzWyW{�x�z�y?���n�~������������һ͖l�Vl��fٺmئ���v۲=�׶m��l�bg�_������v;����s�y�v>��m������
vE;Ʈd��oؕ�*v�]ծfW�k؝�.vW�����a��{ٽ�>v_{�=���=���mO�����{������ho�7�[����}�>o_�/�?ڗ���s$GvGuJ;QN\'�)�s�;��N�Sɉu�p*;U�8��Sͩ��p❶N;�������t��������Lr&;S��N�3�Ir�;3 �-�8��Y�s6����Ng������u�9���A�s�9�u�9ǝ����t��_��bp����3��9���,��g
��� �KĈ0�EG�&��^0��l�+n�a�x@<��b<�m�)�Z�C�9�����\\^o���#k�:����n��������2����ݷݷ�w���`ls�Rv?[�r�r�����d�U�A�{�=�e�����c���=;�~`?����� �e��a�;�c�8nq�3�@>�g��|ʇ�,>�O�S�T>�O�3�R~?_�s�|�o�O�-�i������}�c���?����Q~� ,QS��EQW�W���J�@\\%��E#q�h,�M�u���,�D?�.��\"C����V1N�+�yb�X �Eb��O�k�:�^�Ee1Y\\��%e)\'�%�\\
)�-��+����g�gݭ���6W�JR�ո�Z��j��r��FT�ͨ�[Q-��ZN�ZN�ZH�<�jy��X���T�ө�fQ�ͦ��Cuw��k~z�M�1�8�MfS�T6�Mg3�L6��fsؽl.���l![�����!��>b���l?��}�>c��/ؗ��+�5��}˾���fޛ��}y
O�i�O���D~\'�������\"���Ǘ�5|-_���
H`W�P�]�A֘]����p�?���V,	.gm#Wws�#��=�����<�T�l8�s�f�t1�3i��8����5�`�!�P�Qj���q3Q�!l=�\\e�H�����y+<^h�T�9�;��0�l��35.&��N��-�Z�\'�656L��࣓||���ܳ��	���j3����&
?I�-~Z�!�L�A�6�KἊ5�si8�o�8�o��8>
o~�j��=��k,�x����48̇�q�A���i�uUq��js.-:eK��2�P�yz=z��a�-�ģ�,5-�\\.�Y�~�a�������h���?D�XɈ�S?�B�}ܙ#�O���*V��U	UҒX+񖣸�-W���UV]��Y�
�[UUݺT�T������gUWW�VM�P]m�V�յV]�T]o]����[W����U�P��uC�x����#8�B���h�!���\"Zz(���Zz��҃����WK	Zz(���
Zz�TK�i顊�.��Cu-=4��c���t3cE�z$�c�٬4+�٥��Ϯb
E�(�u����R�!����\"F=F��ép��!4F�ͅ���)ቿ�(�)��#�*��c��cf�Z,Y8j�����B6j�>���p��^���+�E^���(�~x��$q��������v7�cK��.�KepdJ�xސ��_�o��;|�K�g�$��QN$��hǡ���y�
z���±S�\"�!r��+�N�;�4Z�4fjN�;g/B�}D�U�@5Y
�
�hϤY|0�2
4+8XVi^J �(%qVh�cm{�56ϙ���}�g����)ן�i�u�4[��h�|��G�&�;��\'�\'Z�;�.�.�\0~���W��-����2W��i�/-�v);���8��)۵�viZ���V{
�!�	m�J�O#����Fٕv7��Vs�\'Dy���3��ᯊx�����#��#��#��d���{��W���gf�V?*D�Йl��!�1�c�^�!�$�N#xM�k�^�F���YH��+4yb�<��=�6��b.�Ϝ�\\���,T�4�&�{F�W �+������wݓxo�����>=_�,)��)ʾ�>��o����Ώ���dx�d���d��l��%y�|Q>.޾N��&�O��F��/D�l�yʲ5_����V��QԂ��}��C��rvハ�噧hW�ſnW_�_�p��6��O	]U�� u�y����3⹚h�\'��s⹺��\"�9���ԮV�9��d��9���v���e���=�\'{P�=X���dC�\"�.ِ��k\\��7�����e��+Q7k�l�1�#n=9���!�;�$�o
��(�x��|
=�\\#7>	����h�-�q��HVPӇ
Q�K�BӇ�T�^j4=#JӇM�~�B�
u�>���6��o52(�p���]�ʦb��c��e{`h�%|\0\0A>�OĹe2��xa_�|)_��f
���K�uYS=�}��H۫W�ݯ^�����7)�=�ߢ�
?K�^�To����V������H����/��mt�\'��<���o��?��>H�Υ�.
��>L��(��ߧ�
��Q
��q
��n1
C���Ka���(��~
)�	�C���1��±:�%Z�J���D�\"���Q��)�����5����޺�N��L}�x����R�£�R���h��N�b����fDf�˴�C�=�Q���I퉴BKc�o�[+��Fs����vy(�f��j����Ej�Z�P��գj�ڠ�<8:�+�?r����Sk]m;c��=�-��(u��n�%\'��7GqQ8m-�<��<�K��u]��=yZ�D�t}��:��%�	��-j94��$����s�=�u�u#mi��>\0��v4�y���#\\V��z�j��N�ӓ�{��L���!����߻��{���1X�=l�7�Ö��� �0yؖ!��-G����r����_z9����JF+A(�ClA��V}�~P?����EU�\\���A7ƍu���\"}cR$���3^������G3�9ֲ�Ƹc�d/�sC_��;7\'�;9�g��8K$�Kx9ϓS�c�8�;G���\"=SqNG����{�o�V��ǅ�U��nh7���������Nvw���l�l����}�4���f>3�z�_���g��.���������xk��\\�g�����#��N���J���e��I8y��X�7�w�D9Q]��Q���p<��]�9�̛�S8Fɧ�A�N�Sw��i;��s�[�S͹�i��g���}�g�s����q�;+��8+��U΃�C���#Σ�jg���Y�w68�9�ǝ\'�MΓ�f�)�?/��S���-���7��U�1z��3��ל\\�Quy�u�W��F������)�?�YQQ\'E�������9�\"���3��4�ۜ^E}3��|��h<1�,6�b��v��h�ˏ@�(-j��=�\"��q��W��=
Mpn	��(�Mq$��ף14��34�1�&�;�q���!�v�c�餬L����Vl��=�{:�{O�|���CRL���N?����|�UZ1���9�=%����<�Oql��=�^�y7��G�����u�������
�Z��x
�	�|�1p$��`�`b�r�F�^�A�q�Y��`�`�`�`r�_0#848*8.xgpZpnpqpEpUpu�������7���{���_��<��ϡP�x��T(!T1T5T\'�0�$�<�2�&�)�-��45���
M&�It8�ED\'եw5�w5�w5�w5�w5�#t�խD���F<tSw��݄��)���f�w�ZN�.�w#���kJ��Nwƛ;��W��5��տ�U�݃R�0�{Н���:��n~-�����I�Sm :��8��Du��I��D�Kt!��D��Jt#�y�=M��E%��zQ	���^TB/
- :��X�ˈ.\':��T��̋d�E2��>T�}���Ph2�L�É.\":����>������c꺏��>T�>�/�ݗ��K��D3�z1�HT�������������ݗ�Ƒ(,���+�ma�Gs7��M��=��ы��
!�R��I!�bH
��)���Q8�H
��)�@RI54�����\'�FTs�j�H%.R��T�\"��H%.R
�$:��X��.&:��T��38h�i�YTB��E%dQ	YTB�Ct,�eD��Bt*Q]B��AYeS]gS]gSh2�L�É.\":����lS�٦��M]g���68h$�=��I��D3�z1�HT�=��=��=��=��=���xR�I!ēj��tw��AY�18(\'��rʉࠜ�18(����r�18(4Znp��Znp��Z�A�
=��=�ɻy���*��җ��,�x�ř�R���ݐAx��ywZ��b���$�\'mT�J�N��jCTcLy;�t��y�g�a[��Σ��
����\\�X.�h����O��]���Z@*����\\��U��x�wG��r�^��r�,w����1g�������t����ZG^oܝ�c�=4��[@j�����_��B��>3�B����B��>3�/��!����yf(��e.����Tf�i~VY���r��א�@s��}�l���X�vh����\0�|�����ב�L�M m��	x�,K��-�_SJ���W��)�Wb{\'�q	x_+� V����᨞PO����&�PZ�i�\"2W�ڗ�u~��I}#!�lB�[\"rY9�dE�ܯƎA��E]w���������Em�|�H�!�3�@��l�M��c\"4D^�	�VyS�o�����YP���`�����~��3��N�x�#�%=���(�So#���ԭѧ���/�I��h	�Q�~��k�94���;�� |�i#1J�G�%!�����PȆ90CwC*��b����8��\']C<�E�G�(�/ȥ�g���U�Y{DS��U����p��
\'4s��ql)������c�y�Z�jC^H��߳�9
��DіkˑqU�=.:�<S�}�s��b��W����.%����gq۟�����ЁN^ٟ�$�-{r����E�[}�%�dm㟻�6
]K��7�z���I7�M�m��n�[�v���Ѓ�Kz�~E�&<�}�0(7@��;�%�U�B?�v׋y���I�r�pG�x�����׵y?��;9���|�X���S�\\���:q��Q��X�D,a�g�no{���}���!�pwo�x���l)
;��§�!��s���b!ۋ�Y�h\'v��=X) ��#ı�q�8U�)��m^��\\\\)�׋O��; ���
���Cn���.$}������D�mtn1�3gc�	x>�l��E��`s�X^�/[�����K��2�
\0����;�!�Ppx8�	�ǀ��c�{�������Ap\"8	�>N�������L�
��̀��9�<�Qp>h�&h�6��\0|\\.����O�O�π���R�9p�<�|\\����W���W�5��Z�5Nv�<�W�����߷��|�}��N�~�}�������s�A��C�/}�OM;��}U?M�F�]�uҮ�ʴ�Z�z�v�A�l���Nu����Ʒ˷۷Ƿ���o��c�~�&�[��}��6���m�����vj�v����Ӵ��Z�v�v�v��Nk�u����}��}�����_��S5@��J�����E߇`
n���;8���`)x%xx5�lv�����_���/�����
<
~���G���1�=�X�^px8|�ʩ��E��`s�X^�e�=���A����
���BO�����p|w�>7�h��mz2�\0{g�x*/��i���T#�vK{�����DzJzZzF�����J�Iˤ����
�E�%�ei��JZ-�\"��^��JI������k�\'ҧ�g�d��\"+��W�Q��X\'����>�>�x�iO�����Q�|��7���1�����/
ͅ6BG���_\"�&���<V+��4�M�F�K0�>��ۺu��n5�����k��r����wd��5�a�xM������Y�{��?�ߟ5�I���Y�e���<k�`��Yㇲƿ�?�5~$k�6k����Y�_g���8�em��m�s���y��8��˓�yۇ�H5ۋk�z����\'�:�/�����6�l��ls^!���
�X�Y ,�	+�u�fa��W8 �
ߊ��ft��s��Rl#�;�Y\"�z���}P6�2���W�ͼ�S�N�U6(�(�I�z�/��p�L\'>�ąN|�>���t�7N�މ\'�-�v\"u�yN�zڞ�G}���:�B\'�q��Nl���x��9���t�P\'sb��:��������N|Ή�8q��e��r�N\\����։����K�{��2%}\'���NH?�DdQΑ]r����S�d��A*���*(K<��Kۭ�aƤ�������ߜkp��V��N�m
�9*�东��rJNˍ�&����T(_ !�S���N�ȭyf\'m������d��j�������������W�_�A3hI��>�x�(V)�;�n��:��+\"�Ai��[i��;i���4EzX�*�^�&=\"M�fH3�*i�������A.v?�d_��@�$��*H+�dL�ť�*y�9J>r�z���SȠ*+��*��+!%�\\�1%��OUzC���^��-�#m���yY���`(؎�3_�֐�қ�[�.�۵�=�X�^e�r�r�2^��<�T**��*���J3�P�@)R.T�+-�b�\"��r��J�Di�\\��(�)m���&m��.m���^�r2�vWnRz(=�^��Jo�z�U雝���T�v��i<��j�o�d�诤)�O5Ww�;I;�{�{�^c��t�n�n!�hZ����z�r��V�B)U�T�R�V�)��5JG�Z��r�R�tV�(�+]��)����)���T���4�e�2C��T)��� �� e�R�ܡQ�T�\"�]���l��.�h�6�?F�-��
����0
��8�\0S`l^6[���E��`+��R��l��W�ׂ���`�+x��	��{�7���[�>�`_���8\0�58���߀߂߁����:Ps@��x��39���8���8���8���8���8���8���8���8���8���8���8���8���8���8���8���8���8���8���8���8���8���8���8���8���8���8���8���8���8���8���8���8���8���8���8���8���8�9���6��
��m���R�J����^����.��`W��x#��	��{�7��AdCֱm�s@la[X��@la[X?�vֱ�u?ȷ�Y����
�
�
�
�
�
��jh�c��c�k��,��L}D�`�+����xg���|\'�@�/gUN9�B9�B9�b��p�a8kfgs�_�L�tޟ��*\'(gU���UN9�r�Y�Y�i9�>��[ef��3�+��t!��.�Z���b�g����_�qZ���V��
6�i�m��K3	#������!(���L¼�e�$N��o>�
�l[��mζU8�V��g�*����
M��\'N����B����x�(�1Ѓ]�~����^�t�ί�u�J��Q�i��kԻ�W���`8|�N�����t�y�_��E��n��1���G������\'���O�\\��Ǯ���*\'���>������y5}\0!>Ȯ�xN�Bv�v�����l�k6YL�����.E	��R!ɕ��\"�E�^>�&����8���w�8�Rc��	��L�
d�6�,~-��`���t{�Aߓ�JH-��XV�,�;��`W���Zܔ3(�kNn���y���Ι��$M�^��\'{��]��;�ʴ�����x���o;>l
4vТZZ+Ԋ��Z[���I����h�A�Pm�6V����3�9�|m��X�֖k+���zm��Yۮ�h���a�N;��z�N� �MԦhӵ�6O��E���2�%m��������U۩��>�iG�ou���:;�Q=���zk���N�w�{�}�� }�>B�O�\'�S���}��@_�W�����Z}��Q߬o�k�}���^����
���JIg�i}����FCS[ߪ���������!���!5
}��Nߤo�w�{��=IO�3�3z�~I����Uz�ޤ��O�}@�\'����Tc�75�H��d61&�ę⦌���n�2���L�AӐi�4j3��DӔI2͚�L�EӒiŴf�0m�vL��}ӡ��tjF�U�Z��t�t�t�����4i�6͘���M/M�M˦UӺiӴm�d�3��L\'�ss���\\on4�f��lf̬�3��s����e�1��̃�!�y�<f7��)�d�5ϙ̋�%�yͼa�2�w���C��ԂX�,�ԂY(K��jqY�H�y���<o~i~m^6���͛�m�\'���|d>1�[*-5�zK���,fca-�%n�XZ,�.K���2`�Y�-��1˸E�LY$ˬeβ`Y�,YV,k�
T�
�G���y�2X�6ɠ!h2A6���L�%��B�o���__�gAU�:XlA]�ڃ�`0
��C���P}�1D�!s�	�!.eB-��PW�\'�
M��C3�g�������rh5��m�>��B���I蜫�j�z��#9g���8.�e�����z�>n�䆸an���9���$n��C�9��q4g�<\\��r)���ur��+�U�:w������q�G�$7��pϸy�%��[�V�un���>q{�wĝp���pM�>�&Æ�9̄�0��3�p{�+����C���hx,<�Sa)<�/��K��Zx#��4�S�K�pg�r�J�j�z�f�v�N�^�A�Qx2<�	?χ_�_��ë���fx;�)�>�O��|%_���<�x3��,��q>÷��|����� ?���?΋�/����/�K�
��o�[������1A�f�:��������G�$?�����y�%��_�W�u~���?�{�ğ���HM�>�!#��9�D��G2��H{�+��D#C���hd,2#S)2��,D#K���Zd#�ى�F�#����i�VEk�h�RѦ�i�LF�#3�g�������rd5�ٌlG>E�\"���I�<Z���G�d�5G�(��h&�m�vE{�}с�`t(:��Eǣbt**Eg�sх�bt)�]�nD��;���~�0z=�!��Xm�a1*���\\1��	�\\�5ց4G������ft;�)�=�EO���XM�>�#c��9�����2��X{�+��
�@	M�Up	~�!\'�
B��+�ׄ�-aD�+�
�c��Tx.�^	o���;�=�,ą��\"�]B��\'�0,�
c¸ 
S�$�
s�(,	+�!l	;®�/
��iIV%k�hKRɦ�5�J��|RH播Ɏdw�7ٟ������I�M�O>LN$\'�$�&�\'_$_%�$�&�%�\'?$?&?\'�$�&�%ϐ��@r09�N�&ǒ�I19����ɹ�Br1��\\I�%7�[ɝ�nr?y�<N���TU�6����jJYS��?ŧ�T.՚�Hu�zS��k��[���������D�q�I�i�y�E�U�M�m�]�}�C�c�s�K�k�[�,�JW���
Ֆ�GTW�Q}y{DW�Ѧ��X~�
J�������~̠������~�B�o?v����X~GJ��)�����X^Uh
XR�$��3�e��`\'��a�伄5�ٌ��ق������ي�^��cmr�a� �?`�r�c��X�����#�)g\'�\'9��u�م�Y�?�%�����B~�D5!?a�!?a��������0�!?a���Q�	�9������TN���6�ҠҠҠҠҠҠҠҠҠҠҠҠҠҠҠҠҠҠҠҠҠҠҠҠҠҠҠҠҠҠҠҠҠҠҠҠҠҠҠҠҠҠҠҠҠҠҠҠҠҠҠҠҠҠҠҠҠҠҠҠҠҠҠҠҠҠҠҠ�࿏҄���\'l������������W	䏘��#6�Ma�X	��\'���+�߰�����\'�(D�������#��u����ﰏ��p�I�F����z�\'���/���I\\��qބ可���_�������`��;�+p�=����eI�\\�����q����\'�����)v&�|�^�W���i�@+�
����Z��W�BE������������Zō�[#w+�W<���x\\��i���*�T��xW��C�Ǌ�_*�V|�8S�Tժ:U��P�T�ʮ򨂪�*���jSu�.�������n�n�����&UӪ�3ռ��jY��Z�%?�Uh
���ZJ�TEQTҬy���Lkf4�4󚗚ךeͪf]����|��i4G��9UI�P�T#ER�L1KqT��P-T;�E�P}�\05H
W�K�r�]N��%�D��vպ�]��fW������v��\\î1פk�5�w-��]7\\�\\w\\�\\\\�\\O\\�\\/\\�\\o\\��
�a�Q�1�	��mu��Aw̝vܧ�g�����ܗ��\\�k۵��u���]�2��]�t��Un����������Zw�����nq��;���^��{�=�tϸg���E��������������������������G�9�9�9�9��{��\'�yҞ������璧�s�s����x�=S\\�G��Tzt�*�����=�G�H�jO�����i��x�<��nO�g�3��Lzf<��yϢg�s�s�s�s����������������Ϋ������V���Ƽio�{�{�{�{�{�{�������zG���)/�^�^�^��xozos5^�W��^�[����{���o�������x��c�I�w�;�]�.{oxoy�x�yxy�x�y_x_y�x���þ��c�>���s����/�+�N�������.�.��}�}W|}�A߈o�7壾��k���M�m�]�}�C�c�S�s�K����k����|��n_�o�7��M�f|��yߢo�w�w�w�w����������������ί�������V�����i��������������G���)?�_�_�_���o�o�����������_�_����*p$����\\��?��O�g���y����������������������.�
���е���J�f�v�n�~�a�q�i�y�e�u�m���G��0>6��ao8N���S�3�pC�)|1��w�{����hx��	+�G���\'���5�ñp:\\��
��/������xx*L�W�����+����������������.���h#|�d��G��p$�FNE�D�\"
B��#�C¨0!L�0\',Kª�&�¦�%l;�.W#���KB�pY�\"�	�0.L	T�*\\�+�M�pW�/<O���K��6�EU�#Qm�������7�&����h]�!��m�vD��=���Pt4:���ѹ�Bt)�]��G7��ѭ�vt\'�݋�Gbe1M�\"V��D���ё�xt*J�W�עף+ћ��ѻ��ч��ѧ��ї��ѷ1.���ic|�d��Ǽ�p,��N����b
7�w��O���G�.^z���G�A�ң=\\��h�/=�?/^z��K��/���_/=Zm�ң�,^z��*^z��.^z�|�ң=^��hu�K��������G�7�K���x���m�ң5/=Zc�ң5/=ZW�ңu/=ZO�ң�/=Z_�ң
�®�*�\"�8�8��S4(���E��GѯR�*&�
Y1�XP,)Vk�uņbS���V�(v{�}Ł�L�QV(+�:e�Ҭt*�JA)*%e��VY�lT6+[�m�Ne��W9�V�)\'�3�Y�rQ����������|�|�|�|�|�|�|�|�R������N��*�ʭ
�b����:�:�:�:�����jW]V]Q��U#�qՔ��������VT7U�UwU�UU�UOU�U/U�Uo՜Z�>�֪y�I�QmW{�auB�U�R�Qש�M��Vu��Kݣ�W�G��i���S/��ԫ�5��zC���Ro�wԻ�=���@S��h*4���Jc�85~��5��ZS���4j�5-�6M��[ӫ�k�4��ͬf^��Y���������<�<�<�<ӼмҼѼ�@����~p������S���\\��7���*�,����9��\'�/�\"��C���p��Ojxs��������Z�H�ՠ���#蟣�_�GѿD��_����c�Q=������@�=��
Q؈�F6����(lDa#
Q؈�F6����(lDa#
Q؈�F6����(lDa#
Q؈�F6����(lDa#
Q؈�F6����(lDa#
Q؈�F6����(lDa#
Q؈�F6����(lDa#
Q؈�F6����(lDa#
Q؈�F6����(lDa#
Q؈�F6������9��F6����(lDa#
Q؈�F6����(lDa#
Q؈�F6����(lDa#
Q؈�F6����(lDa#
Q؈�F6����(lDa#
Q؈�F6����(lDa#
Q؈�F6����(lDa#
Q؈�F6����(lDa#
Q؈�F6����(lDa#
Q؈�F6����(lDa#
Q؈�F6�x�E[�ϡ��ϣ���6�h;�%��2ډ~��~�B��v�_G���@{�o����>��h?�t\0�D����C���#��Q���#t�1:���D�N�?C�я�����џ���/Ы�/�9�W�<�k��t�-������]B��.�DWТ�(lD?���(lDa#
Q؈�F6����(lDa#
Q؈�F6����(lDa#
Q؈�F6����(lDa#|����(lDK6*��O�F6b���l�`#1؈�F6b���l�`#1؈�F6b���l�`#1؈�F6b���l�`#1؈�F6b���l�`#1؈�F6b���l�`#1؈�F6b���l�`#1؈�F6b���l�`#1؈�F6b���l�`#1؈�F6b���l�`#1؈�F6*���1؈�F6b���l�`#1؈�F6b���l�`#1؈�F6b���l�`#1؈�F6b���l�`#1؈�F6b���l�`#1؈�F6b���l�`#1؈�F6b���l�`#1؈�F6b���l�`#1؈�F6b���l�`#1؈�F6b���l�`#1���mA?�^B?���_@��/������h\'��2�U��ڍ~��~�A�����B��o���w��Ct�.:�~F����?@G��c��q����t�):���F?BgP�R��oXF�΢�@���D��_����k�o����\"�;�:�{t	����]A�6b���F6b���l�`#1؈�F6b���l�`#1؈�F6b���l�`#1؈�F6b�����F6b�+٨d�?ɰ�ɰ�ɰ�ɰ�ɰ�ɰ�ɰ�ɰ�ɰ�ɰ�ɰ�ɰ�ɰ�ɰ�ɰ�ɰ�ɰ�ɰ�ɰ�ɰ�ɰ�ɰ�ɰ�ɰ�ɰ�ɰ�ɰ�ɰ�ɰ�ɰ�ɰ�ɰ�ɰ�ɰ�ɰ�ɰ�ɰ�ɰ�ɰ�ɰ�ɰQ��?��ɰ�ɰ�ɰ�ɰ�ɰ�ɰ�ɰ�ɰ�ɰ��ػ�()�;��OUQ
;*쨰�
;*쨰�
;*쨰�
;*쨰�
;*쨰�
;*쨰�
;*쨰�
;*쨰�
;*쨰�
;*쨰�
;*쨰�
;*쨰�
;*쨰�
;*쨰�
;*쨰�
;*쨰�
;*쨰�
;*쨰�
;*쨰�
;*쨰��O\'Љt�L�Щt��N�7��F:��Dgћ�lz�Co�s�mt�O���Bz]D�mt1]B�K��t��.����>z?}����v�]E���������#t}��T��=��PK�t#�D7����8�J����t;}�v�t\'-�QaG�X~>����O�g�w�s�E���
;*쨰�
;*쨰�
;*쨰�
;*쨰�
;*쨰#�vT�QaGu�߫��W�Fil����Fil����Fil����Fil����Fil����Fil����Fil����Fil����Fil����Fil����Fil����Fil����Fil����Fil����Fil����Fil����Fil����Fil����Fil����Fil����F���:�Hc#��46��Hc#��46��Hc#��46��Hc#��46��Hc#��46��Hc#��46��Hc#��46��Hc#��46��Hc#��46��Hc#��46��Hc#��46��Hc#��46��Hc#��46��Hc#��46��Hc#��46��Hc#��46��Hc#��46��Hc#��46��Hc#��46��Hc#��46��Hc�l����D:�N�S�T:�^O���z#�Io����t6��Ρ�ҹ�6:�Χ��t!��.�w�6��.�wѥ�n���C��{�
z��>@W�i;}�����t
��D.�8��������wE�xvqLX�-N�I��zF�氞]\\�w���sa���O����
�]I?�KI�{�|�|!r�Eﰷz�k���5�B��5��%5�����a���K�����������5W��U5W���5w����ea}Om1�SA�����v�p���
gX�aL8f�
�>8�Q(�Z:5��B-��(��S����+���a�B��[��[��Q�6ol~\"|}[s8w6��O7�e�ZJ-%�kini	W��}�,���̋�G��?q�|R>fr_p�9N�8Bj868*Z8p$�c�pNا�66��ⵡ�����k&�g��,��U��E���?�Ix�d`�JɠdP��$<f2$	GWrT��dh24tX2,��$\\����B�O�=191�����S��&�J�zFrF跓o�~7	�^��G��$ׄ^��kd2>:%�:-�:=�:3	�6���g��Nf��K�.H�.J�ј,N�ޕ�kr�,Y�<Yz_r_���&��MJ
}8y8tM�&t]�����G�GCe\"Cu��Ml�OM6%�BKݚl
����Ǫ��.U��^�$�{�z�uM�OXזjú���M�RX7����!�C��k��a}h�а~�V:�48<摥��zhih��7J����a}L�ذ>�4\"��/��\'�N�J\'��)�*�=\\�֧���3K��Jg��wJ#���������ea}y��tא��+��YY��WQj�+�V�K忊W,���SK��5x�TvY��)h�X��U,�W�\"W�b��g��w���s�^pEKOѭ���Jto�n���pͩ�ח����G��cf�+�3c�4��[fL�㯻~�xe���&�7\'\\7v�xoʘ��rբUtyƨ���wYq�E��_�uɨ����Q���b�8N�`� *E�82�{��bH\\W���z\\W�~�(�z��|�D�ȟy�E��!�:3�<n�n�-�&�ƭ�g�!��U��_|���}�����V*���;���ǟU\'�U�8L4��9^x�8����.���i���AߌϹQ.��[*D�$��[�����Xq�5�o���I��/П�W�n�&}g�u3��~Yn~(=�N�����5�}���ҽ�7��r�hOZ3ǔɅF:�^K�
���pV�ײ?�k_�\'	W��pe�
ג��
:�|��x����T�+ďĕ⪰U�[jU�m��Ϙ=���1Z�@\\*.����U����\\8��K������8:�N��$:�N�S�4z=�|V���~��~�:%^������������3���{��
���I�s��M+�X|��ˊqK+>�~T���*�V>W�J�ە��=�<�炞;{�������ƪAU#�FV��W5�����j_uMu�ꓪϭ��zRuZ�����=��zU�j�5���.�5�WG�}��� �w��zW�>����z?]sB��5Sj�����gI��vN�{u��έ��n^���u[Ɬ{���k�G�_^?�>��U����ax��q
!�Q�f�Gξ
�<g�۵�����������kw�I�j�3�P\'���8��g<F��k��?�~F���_>?���o��3sm�������u�����Yna�����]Έ��yT�<��Nz+o��o{�~ۯ�������G�})�]�Ӡ����8���\'�������_���>\"�#V�>[�W����s3��HwwWO�d��!�C�A �\"E.Y�3&��, r��2�0��\"��\"FT`��ET`	
d9��J�p\"�����;Ñ���[ϛ��;���&D��>ɵ#�HHκI������}�F2k��ȵ�M�D�pݕ�k�&}\"+ %�WJ���D�vʫ��
g�r��ܨ^�S��9��ܻsE��_�V����wU��V�k%�_Q~<\\Q2��<�����~�\'U���^���vQ�7�[V���!��b��Κ�w�I{�]��m]QΩ]�+&K�)���B��-Q��>}�&�g�?��D���_���Q��(yA����s��(�u�<,J�%���V��+Qrr��9J%�z��˒���OW�?�R��4JD�Ӣ��Q����kEy�v�z�dW�����W���?O�3Y�Q��VQ~~D��F�yQ��(y]���>s]�����	Qrz��4J.�8��
c�0�w�w��Xm�q��������X#n1>2>~c��VT6��D�S�SQ����\\�__�j�c�H06�Euc��C���>Y��	�w�>�H��>]����bD���s��|^�W��>C������ݾ[|���ʾʢ�����h��&R}�}�Ec�&�&�ķŷE�����*��m�m����}/��v�v��}��̷˷K<����#�|!_H4��������|}E�a�a��Gߏ����W$Z�����־b_�h�;�;)��N�N�G|%���W�+������8Ut���4�1����\\q.�9��]�b�bEW�nq��*��q�8��W%���/z�%�%���ĸD�h\\R\\�Ȉ�#��wgܝ�w\\ݸ�\'�zB�WI����\"O��Wn�iu�
���A�A���P�C�p�p�c����Z�(�(u�+˕�~���~�~��Z�~���ڪu�uTK\\�]�հ�7w����6�\\G�{��M�l�:��R�N�y��������i������(����t�h�����dk>�8�8��x�T���yQK���������,��xz�iu=�=˵&�<�j����ڃ�O<�֞/=_j�|��Jk��ڳU���޳K����٣���<��>��k�<G<g�A�_<�jc<�<�k�<x%m�W�*�$��մ���W����U���xo�6כ�M��y���k�u�u�%މމ�R�d�T�5���r�<�Kڻޗ��U�����߽K�K����y��>��}G[���j��V���m��{��}���K�NI�7�;D\'s��%U�!F�\'��.�f���~��D�2OH2?�~��n�-�2ˤMf��n��&��p(%S1���R=�ѳ�a�K2��T��M��A_�=_	�α��I	������o���̕�\\Ɍ~�����G�$ƛ_�	���X5�Ǥ�⸔*N�_����0�m��rW��$�Y�L��lɐ�|�L�%=\0���1O���1h�d�XȆ 5x��Yz��ȁ�jR.L�i0f�L���l�LJ�*\'K�r��R5Y�JM�n�z@O*u��HU���H��D�#��i��������sR����Y]o�.�����^�>��p\0~��pH����?��?I����3p�ܬ9�{��\\K��{��0�kO�Hx�1iY�o4|��m�����>��RS=E�����jz\0�S0�0	&>���<xޔ��U\\�@)��sp.>t�A�<#U����1~���vKY�.��Q�U�̪�ƪ��j���ց�6��֛�֟�֕�֎�Y/-E:k�Qs%��f3��W�Q��q�%�ͯ�)�`�:;A�b)���\'�]7���{1����{��3�2�^���{�,.f��YF2K��E��}hy��z0�<f��_ٖ~b��3Ǘ��%s$���ϙ\'�y�2O���<m��.�J���`�z��|A4{�9�,�l�E�y�6���S��ӑ�n��g����v�^Fb�u2_c���3�����PZ,=g�H�0��t�3a<�a�yY�����vB�v�n�{a?2��ÿ�G8Ep�,���q8o�~1�Ha�\0ep~5�J���/�e���@�,�%���X,z�gE_�L��0��]f����^�>��p\0~��pN���Sp~�8��3��sp~�0������Jf��¼�����:�G��\\{Ao���~�f��Y�`\0��S\\G���B6��s��u2L�~:}׹\\��K�/��a!���o�|9�yܯ����1҉�N�tb��`��b�#��?��(b��2���\'l)�3�^�~f��}�C���N/��Edb���1��M�O�.IBz�,�Z�H�!�F��*�/vJ��½Ⱦk���2C��+3���2C��+3���2C�>�J��J��J��J��J��J��**aŔ�b�X1e��2>o;����+;�o0�<.��Y5!VM�UbՄX5!VM�UbՄX5!VM�UbՄ�d�,#�eD1DCD�����Z�h��2\"\"*!�����e�~�_���j	^-��ex�����^,Ë!�!{�n�t|ٔ��Q{_��.R-�/������=��ۿ3��Gj������A��S\'��I?u�O��S\'��I?u�O��S\'�|R}je�2�={�={�={�={�={�={�={�={�={�zj�gٳ���B�l!{�x�mӥd���i	����D�ꉁ0B��5��~j����v���~j����v���~j����v���~�b!{���X�^<�޻��;̞;̞+����q~ꛟ�槮��+��6?�-��RH}��������������/��/P����/d�f�_`�R��??��O����걑��)�E�w/jW�y�����3��?x��5�*vqϮ{�cV�������_4s���-d��tP�ngl}��`\\[I��
zN�g=�M�a�)�Z9+����w��Z#-�i6o�d�df��L���%�i�����gp�
\'�jVeg�)�:֛sW���g����h��f�h��f�h��f�h��f�h��f�>>�\'�~\\�K#�~F��g���~F��g���~F���ȇ��ȇ�#
���>�
�d��x�ʵ14!����z�d8)�)@h��b�n��b�\0�A%����Y�@U��j�\0�!�Ӊ�N�t���Ԇ��v��3λ��>��}C2g#�S�R2q��	���}������:r�	:�\'�]�i^r�G���{�qC`(��:9W:��>7&�$������d�R�B���k1�
K��{���JXų0�.0��y)F2O�Ȓ+�I�Ƈ1.�q<�E2��1T���<��j晘H�~#i���Yj&���>�}u�y.ϟ��b���I���.:Y���\\�o��w���f���3O(qmg�Q�bnV:@\'����s�(�DQ��07�z�t�g�L���lx^�90��|x	�˰^�E�^�%�^���
��=��=��=ߕm�w�Y�S��蕏^�蕏^�蕏^�蕏^���D �d�[1�B�K��s��s�y\0M�ФH���\"��o3�#�f�G~G���u��u�Ю�Ю�Ю��d�,\"�Ed��L��\"2YD&��d�,\"�Ed��L��\"2YD&��d�,\"�Ed��L��\"2YD&��d�,\"�Ed��L���Ex��\"<P���@(\"2YR+��b�/��N������X�I����뛑�Ѝ#u�A��6�|/���j\'��I�v�L���72�F&����x#�7x#�7x#�7x#�7x#�7x#�7x#�7x#�7x#�7x#�7x#�7x#�7x#�7x#�7x#�7x#od�L���72�F&����x# 鬅sX\\�s�xW��\'���T
Ӏ��&7�ɍnr����&7�ɍnr����&7�ɋn򢛼�&/�ɋn򢛼�&/�ƀ��<��헥{�=^�/d��77~sۻ\'�,d��wٻ���Bt�{���F�0���=��at�{���F�0���=��at�{���F�0���=��at�{���F�0���=��at�rV�yo�����,ˢ�R*���8�/�2�QF4��{��
bU��XĪ V�*�UA�
bU��XĪ V�*�UA�
bU��XĪ V�*�UA�
bU��XĪ V�*�>ΰ�qS�؅k#�k�+VHn����|l�Ǯ��T�7`O>��cO>��cO��)��,V�X����/[�c��oJ�Y&���(ե�E%�gA��Ne��Lg4gye��S�|����:$­�5�&Ԃ�0���8��0��xF0
����4��g\0��c����g�f���+̟�儲�,U^A���h����O��2�]�$�S W�U�fnP��o�yH���%Xdnž����{�����=�ۙ�l2�e�UDiQ�\\�
^�m�VQ�զX/�
	6M\\1�2,��f������,;��ow��E�=�#�z�GO������������}����;d��	�,��!�V��d0mh�>�b_�	�aL�8�`�C���0�aLØ�1
>�O`�u����5|�q��s�M����-|�;�����b\\�K��(%r�Pq�����5�4;�,NvG�s�΅�\"�Wǩ�8UGT�\\O4�����S�a�:LU���0U�ש_�~��u�ש_�~��u�ש_�~��u�ש_�~��u�ש_�~��u�ש_�~��u�����k��I|
����N���g�l|
V(X�`��
V(X�`���l(Ɇ�l(Ɇ�l(Ɇ�l(Ɇ�l(Ɇ�l(Ɇ�l(Ɇ�l(Ɇ��E69T�P�CE9T�P�CE9T�P�CE9T�P�CE9T�P�CE9T�P���k��-��^�^��8fI�Wh�?SQ��,������[c�+�X�Ɗ5V��b�k�Xceb#f�B\\�f�k��q/����3_Wo�>����W9bv�Ќ=[�P�^��
ϵ}�C����F�6���2���r����w��n�����[q�碧�N�XF�v���xj�W<�{�ܣ5�u{�%�������0���m�C��Pn?\0�x���9���y�گ��7�������X�z��[x�U7P�@�UG�MT-QuU������Y�f��JV(Y�d����S1�bL��Pp7Pp7P�D��P��G
n�`��
(X��
n�`��
n�^�z5��ԋ)W�XL��b1�bJŔ�Q�B�
�*��P�B�
�*��P�B�
\'�Ԥ���S��ì�x;�����8�|u�?�����n>�n>!��}���ʹ\"�_m�V4���0�Q���<�<̡�J̑wEj��.j�j���x�V��������t��=��Ŋ0������a#~����{܂�aV{�n���ъ#�>
�W90G����}Gn����
Ku��f$n���T�=��Ug��B���{d�ټ\':�1�+�/Ҿ�S�o�M�[{l��u��hݍ����z]�j�{��g�5�%�3E�����Yܟ��GW�S�>�x�PC���:�7�G^W�h��+��P��pu���Vl�=�%��\'/{>��s��XE�uw\"�|#�b5�G�.��%�;�Q��y��]X���1��$Ш[)�6��txLD�HNlf���~ �
���5Uo���F�[���U�6�bU����
Ul�
�V{I{I�zI�ڨ:mT�6�NU���
�i������QUڨ*�P�V�FU����z�t�,=*K��9ԭ���.�*H�jѣZ4*C��У2�pj��qj��Я�pj����Nu��52~��_#����52~��_!�W����}�l�(�W��������dy�,��=���>�l2n��\'��轲�.��\"��˨�2�|^$kv�u1_�u�l)��ץ<]�ӥ2�.�XċE2�1)/�uQ>_����y�H��EycR�/�����ZJ���y7��ҪJ����M��H�M���YL������ݢy7��h1}��޺�/rw[�bk\\~(bwY�c^���]�n������W�������hUϫ%+{�ʞww������ywWswϻ��;���~w����M����M���w7ϻ������J#�}ɨ��Ƙ)�w��9�Į��j�n5�j���q�Wkt�Z���-F\\yĕ7��FW�H�Wq�W���]���G\\}�=��p���h�/�r�E��U�
>��F�?)�K���ќ���%k�[c��\\͙�&Ģi�ѡ;(�A�Q_�r��9�wP����R�Ik_k�y.�8�����T��笠f�?w�
�(P�@�5
�(P��
*�P�B!:�:��X��rS�c��x���?�/��S��\'=_��l������%g����u䬣l
s[o�\"x�[�����P�˨�Y���0w|\"�OB?i�_Ǜ_�������цv�,���z�x=}���@xf�����g{���®�3��&�����\'���$�qށ��N���\'�)��O�38g��|�i�����}D�^ͰG��q.ƥ�Q���h~T4?*�M]r��qdEj��&��͸�BƤ�����G��ȸ
۱N���N���P�/���B1~��W��+����F�D�����|�8�-�g������%uBԁmaGptG�rt%GWrt%GWrte�J�&����������������q�!��c\'y�>&>$>�3���Ò�9���o���}3�y�/�k�m�%��q���L}�;�&_�&%{Ы��E�\'��U��^�&::Yl�U��ɗ=E�Ԍ���L\\��p1.������W6���l�b�z1���w�D��>G��Qk6\'��@��=n(�O}Y��,T_f�{-:<���J��1�����x<N��QSf�����a���P�X�~,T?�Տ{Տ{�b)})�����������]�O��2m�L[ ���w���7�{�6����o� ��4�׀�`+Ĝ�Y*s�ʜ�2ge��M�U�_�s�\'��4�N��������z���7~�>35,�XW����̕�7y��7y��7y��s07�z37�܊�X��p;����w�.�
v��v\"�pxBe_��/Wٗ���U���,U}��>KU����2����y3}�L�7����y3}�L�7����y3}�L�7����y3}�L�7����y3}�L�7����y3}�L�7����y3}�L�7����y3}�L�7����y3}�L�7����y3}�L�o9=:��|��ŏBN\'��D9�(��t��N�Ӊr:QN\'��D9�(��t��N�Ӊr:QN\'��D9�(��t��N�Ӊr:QN\'��Kt�K���Xe/��^b���*{�{�{�{�{���_F���ËQF��b��bل��N�M���f�u�i�ٴf7�B�$�az��]-���_w������M��%��w���ʨ=��N��岺\\F�+�r�䆰U�[��o��;�/{(��eu��.��岺\\V���rY].��eu��.���&�I�d�.��K&�I�d�.��K&�I�d�.��K&�R��n���N܅�qO��sN�9��wu�wu�wu�]4��ftь.��E3�hF��]4��ftь936g���؜�3csflΌ͙�936g���؜�3�ԮPI�b7^���k�-��<Kg��3�Йs:�<����_��/o���������
v	���]BA�2n{��
v
�|�N>c�{�t�):z֮�0n��!��-H eu��E���`GQ��(��Y�?kgQ��(�s�[0�{o��(��v���A6}�����h�]G��0ń���(�y�<
v;���G��0��0��0��0#����Ѵ:��f`f��4q��ӄj?�7I�L���Q&�XtH�q<��O<>�;t�2ri^���Ӎ�����3q�L9G�^��^��^x���*H�~x��pG�)Qƞ�þ �/��b��ؾ�hJYn_�Ħ�y��y��*�_ė�,����\\��T�y8�·��X��C��!�w��bNƄ�����!���}�/Ʀ���Dl?�O���)h�)(c
�l_��f��2���Elo�[����ElB�gB�gB�gB�׺ݹ�\"��V�����	S�rS�r��,��<��r��,�R�^?o�������������y{���~�^?o�������������y{���~�^?o��7u�L]9SW�ԕ3u�L]9SW�ԕ3u�L]9SW�ԕ3u�L]9SW�ԕ3u�L]��\'����1�d|ٹ���4�����5�_�t���CɄ�3��Lh��W��\\�?�؇ª�{��B~Bb��M��	���	D��߄��}a�����e���C%s	.�&��y�\\eM|Y_�ė5�eM|Y_�ė5�eM|Y_�ė5�eM|Y_�ė5�eM|Y_�ė5�eM|Y_�ė5�eM|Y_�ė5�eM|���_��M|Ds��Z�����ctq�?E�������iѴ�ǣ�&�GL~.|>95���ɕaZrk�1NJno������K�K�l�5F��Fs����a{�L�����iOw�S��ԽIv��]�Wɸʇ\\e��ܔ�ix>�3����=v�mɧ�}u����s�ג�i^�3�~��g\\}���D�9Gt�\';��:���K��^����m�˽u9�+zg���9�G�襎��>��\'���Y���/�n����T���8M\'�nH��������af������.��I��c�Sɟ�+��`�+u؏f��{ќ.�u�׬h@��fo���ݓf�,NZU�/
f�k���~��q
��&µ�^��I�����4����1���8�\\�~�7�����u���z�֓��������x?�O���X��½��{�yϻ�K�_@/��s�_�Y	C�1�Ա�CO�>�b_�	��Z��x3�I�������p��y���\'[�z�����3��z�{<�������u__E��������7	$d¾��fTw���u\\�Eѧ��(� �0\"�(��(� ��q�qQvEp	�,*L�K	K ����	a	���߿��T׭>u�t���Ω�w��
a�a~w=���qPO�{�=���xc��1��/�^��A��hЫ��@c@cA�@�A���\0M\0M�	��9�\'����MM��#7ȬHGЍ�߃p���@7�n=#�D�������
z
W���Tp��3�>8
��E�Cіد��{c��U����!oP�5|%Sy�v5Y��1|b�\"��E���#!�-B���\\��rY������cڼ�%C��=��+��*��jX�x�k)rF�F�vs -gQ�9�X\0�>$�`����Gܾy��#zd�O�k�\0S�rsL�\"Ԍ@�b�V�O-)�.��A[@�1���PcH��0���ͮ�ߋ���d����r��Wr,,}F,��QC}mVɏuk��us��r�F2`#d[% I��jt����B��8�4�f|�	���b��a_�BЬ��6-p���������:،���z&܉�<�HD�p�����^��C��_u�,m��F���E��f/ a%��u�k��zO+_.��䣮Y6��()���<c>	y
��!�σߴ�C`�`+(_fS*�M��\0=�����dA�,p\'j�\\���8�\"�uW̋(ݎ�yvh���=@���z��r���\"�_�̆�l�I�Q/�i�[�܎3=;S�Z��e:�N�~>��_6J:ARГЭ�Kj�BwGǢMuv�� A?���χ~>����=��ȝ��\0���g@�@�A 9��ÌQ��w��\\��^��^�v9v�vy��>�5���ܴ6���pͶ�l��%��K�r����&��P;���7c_���nj���{��t=��c ��\\#e3v`3��V[�E�z�!zO�R�T��3C릮?7{��k���e[B�B,�m5-Y
�{�lFiJ����BH�Q��,*F�ÐtD�X�<h�e��9�l������(Yi��n�y8���5H�	��u]�`Q��t�Υh�Q��
L�Tx1Z=,��J�,B�ňF}h\\`�+�����$��$�[��Tı1)��R)%Jg�v�v!j�v��=��M5P�t�1���`�/98�������B��S*��@Z��,��?�,On����%5k��@��<�s���gy�7��9>�W��]���RWfz���\"�N�}��y�u�i�ş�u ���+>���������3E�Dr�$HM�����:�P�6��V�:8V���F8�ǚ(�Ҫ5q�.��TX�����JO�>�kY�(��|=�jn_�!��St�����n���A/G�(I�P:�gd�C?�����8^T�
��>��#��s�L��G[�[M�\\s�V��|��ڜ�w�|Cى���or�:CX׆��tں�Aӹ���
�NS;4[#�GG��n��B��>���3������u��U���N���?�[�Ӷ�-v]�A`��JJ?u�^�]��S,�}��\'���S�f�h8]��c�S�nu��[u�C�v��HUS��]��ơ���؜��\\~%���v�YU�z@���Mȿ�KVc���赢���-9�@*]GV#H������Qt��m5�T�6�@i��L��[!.��`�C�uBy}t��T.���\'�.7�����<�f�u��h}��]a��%�#�Z�Y�\"���\' ��~]*�����F]�o4��i�zF�> �f�,jJsh>e�B|~K�i-��{�B)�0�N�+<�\'�-�ԓuf��7��u�����Q��ֳ�ԟ��6�\0��ri0�ƶ�sl;����]l7
�����F�E֓�>��������R�/�T������-��ܭ�V���y8���F�n��O5����w�;�������n��u�\"��-�T��-�~�\0x��p��=L�ĕ��a�Su�\\H-�Bj{����E�x\\ϣ����(I�jP�B4�DKCZӫ�t�%zu���Pϫ�|��z
�L�e�Ʋdq��	%
�Lq���m�vp*K�(�(�
늱}��i7�
݄F�H�n��h25�	�q��L�&p�pm����1��x[�
f��`p|U��򚝫Mv��~�q��,��:Z�r
�ͫuֲ��=��rd��M������V�u��w7�)Nq�־�-hR��8�\\�m>��˝\'�w�z���������7�\"�����ܱ���k-Nr=冓��s�Y�%��r�������5�*��e������U�T�.D�I��#�n�HAУ۔&�*�ZC��s�Nz��l7\\ɣ��C_��U���pm?�����l�+��l�l锲O��\\1�9S~.?R8�|lesu�F�_Ƶ�(�UB��j�2�����QwEf����b�T��1�2�>e��Pw5P�
�\'����\\���/����V��V���G��7��r��* WY�ղ��L�4����P
g0[.��W�vZE��h�	�W��/?k��W�������jW�
/~��z�s��5���Z����=�\'���nG�����ԉ��8Y�؈9+�$������>?]�\"e��`���G��y��c,O��������W���J�}���)�\\�s�O9ɷW�Y��Â{�E�[�B��̌�)<f~�+�D~\\���/�����\\5>�
zV|��2�k��I�9����9�F��׃#�;��$�q�s�R+W�Ig�珈�������Z�M�gȴ_��g��[��@�Z9͚�)��*���7�σ�@?o����E�l��
!U<��e|�H~��A�;�%o�#H�_��fc��:�:��+��������G+!�W]<��Y��n���k���r~��6>�)��n�β�o���b�O�r�4���\0��γ���rn���ly�|�YT~����l���9Q�W�����4U�[�ג�V��3¥c+\\�(�>r�D�
-T���?�k�g�����Q��aK�J%��_�Z���,�=�SE��]�_c�����3�<\\ɫ������Vڗ�S�R�Ja��yS�hY>_�?���z�y^�)��Y��)�/N8�,x� ��{���������T�.Di{�tK��S��У��ۗ��;��^Ύ=�QI=���� �sz�{vp��:N��o���擿�x�Zߗ?s%�Ļ/nUZi�U�zz�j��]�����J����
B�e;��~���Z>(�Fn�\"�7Y�/��gob�ե��^�[��<m?���G1
���9���<]�O��N*}�|~9�%{�+��?��� c�|�5[�T�W��}��1|���}`/�w�m��ɗ�
����j����l-4]ӣCf�Y���f\"I���f�YϬo�fC��!�&f3�1[�F����[�3ۚ패���܈7�4�4��ך���Nfg#��b�c�P�^)VOk��f�`�4ZZ���F\'�[k�q���Fw۵]�;�N0��T�!{������l��s�\\�{����go����/�nc����c��b�y������Qc,����$^�\'o��nL��xk�}��c���Θ�o����|���?ǟ7���EC�|$c�>��|�l>�Od�O�S�����x�����\'|.K��X=��/a��2��5��z֒��`m�F������_�%��Y{A���B�eEcцumE�S����v��X�;��u\"N��s�x��It�@\'�Ie�:���l�Sϩ���4v�!NS����ҹ�
TI�(c�6�a[j�m���F�@���8�8�]k,1��%Ɨ��t��
���h�X�Д�z����)���1��>�.��D��d>��6]ħ���,	�<���g���!�����������p��	���P�)�
�)���Z��kA
�)�JQ^�*�)�JS^��Z�R�P��Z��yx-8
�)��P^����\0�t���<F���W���A]x0(��g�g!g�3���`�Û�&�f�?�I��Q�(ԂOCç��q���L@�]�]��w��t��rP���	{���Kٹ�Uu_y�}����$��~���7	%�XB�1�ZK��ԡ�PJ�!�Rjc�!�Rc�u(c(��!֗Z�_�c�嵌c(u|����c�W	��6R&�M|�第�����g��:>Y�6�u(�:��\\��G2��ˣ��P<@������cn~n>���8�-�-���O�>A�@��\\�%�%TInin)��\\)���r�*z���k�5#���3�oo\0���ς�Q��* �	\"��h��G��>(\'h�	���U<�^E�*��D?Q^%����~�~>�>OI�Z��R�/�/P����͔���9J�na�P*����)>���\"��l=���%h���m��~�F������n�6�6A�f���ȶP2�d_�x�qPf���-vUʾ�vRJ�v\'��6�mh��~f�a_�H/�#�z�Y��{��g�B�~�MX�>v��;\0��@�Av��?�1�������۔�=���D�Q�|�(3�c��T�=���av��#��p���O����({�=
GΎ��b�)�>{\"�`P�@P��_��(-���ih�k��c?`?��gٳ0�y�C�\\d/���#a���e���)hs��W8z��
�|�N������a�k�5JOT&%���*��v^���N�(�ʒ��<ث�޼^J��Z�ky=oe��~���Q�%JY��
��h�D��D)T�TQ��4��h�(��S���\\�BY�Q���<Ԕ�PS>�BS~
5e!j�\'PS��,^Q�@�U�z Ī¥�/������������U�X��ŪB�z�ŪeX� ��cՃ
�z�V=�Īk@�ř��Cu��-����q��q�5IT�3���8Q�!^=���~}	��k�¼в>в=TT�����*�\'Z�Z�M**v���~��{�J���~	G�~}�k�k
�k����~�r}��\0�+\\!P�������8�e�*�H�.��2`]	�ۧQ���ѻ�(��~�Z�W���B���)e��A�jP��P���п�JT���D_�����Z�������� ��`�*8F�:�!�\'�O@RG�� ��_�9�IU-���Im=��^\0�T��Ӌ�CJ�u\"�|��T���|!��f�kF����� ��f*f*f*�*~)_
q��m|
][�Z6�*6Ul��(W��f͠Z]�x/��3~hI4k�*�MsP��]����S�AQ�>��5h1j�b�������E�D}f��~�}Y��2��g�SiT�^� (�0*˵�,#�af�J���єϠ��0c��\"�ҋ��Д���}P�kQY�QYF�fN��f~
5峨)�� � �E�B�6\'�\0�F��I�$`LRo��z+B���b��WԎ��z+B��\"̩Ω��I�!V]a��JV]�Ǫ+�Xue
�UW�+����
�UW�Xu%�����+B���bՕ5+����
�UW*����WT]b�1V]a����T���\"Ī+,V]b��������XuE�UW�Xu����cՕr��R�UW�ª+�Xue
�,\"�YE6���q�ȹ���\"��C�Q�{E~QHr��(\"��8IQX&zX.z
F�=
��gE?
��NVؑ`�	f �1�^U�JMVU��4]U���Z�T	�d|�4,�\0s	�&���K|�m\0�K�f���&�k��[�V���A�~��&D�žj��	:�,�\'� O��W![0a�``���{hO���G߄<�\0y�[0�t�\'�0C�`�`c�����d��؟@������eG(fN�ܘ!x C�9D���(+{�=-�g߇8���	�l�;GOC�������A{��
�� )�
�� )�
���؏ُ��\"��}ȂúHjȠİ:�k�ɰFRi�(O>����JIf��f̓�=qR5I��x��!���X;I�W�WGI%3VP�b%=VPR��8J�(i����(��� �!�2�W()dDp?�}7ﻔ2�^��,ȍ�O�?o�ߟ��r`���\0��c�b=�R��d�zLz�Ǥ媵A��R���@ѐ\'���E���w��y�y(�!ͣZH3T.$�,��ΧWSy�t����ZM�i
�V��I�D�,|��
%�%��J!QJ������Z�J�9�w��%�K~I픜��R?��I�B�CS��,��Ͷ�\\ȸj 3�@m���<�U��z�꣺ ���
�w�7A�������7(�w������/ޏ���>.|����	yC�:��I��x�\"���m�= �a�2&K�2�i��0����<SGK�z��V�6�Aۘ�1}t����1�m�0]A~!����7�����5�\\St3s��J��af��S��o%E�������AI-�= ~���A7=A���&GC�Z�G��r�9/��gs��y�OT� ?��#��I�H�����Ks����/\'or���S|oΕ�� �����ޱG�5�����<�<�S���`�`w��-R�T��ɓ��3��I���`j0#��K���U�U�m�V�@��&4JڊFK;�v����l\0�\0�a�#`G���\0;���܊��4�e��`��n�������>ep{�0��e`�˟�L�Ɠi���;�c������Ҳ�R�|ɪ��l��z�ƥ��؞����\0����ŵ��v�l� ������N��<�%�)�i��K�o-�m��[�xrL�|.�`\0++S����`nn��A���gv����=���K��+���\0V�l���}��\'ok_��	ֽ�l��\'-߷���ܹ��
<Vzx��,�B�$���R:Sz�t��N��E�@*��K��R�z�7J�@r�+
�%�H\"Z�V��j�Z�v����O�Ym�v=9/�
�6�vm��]ۉ�^�{�{���������Q�1�	�)�Y� �;��������j�h�iu�Gԉ���\"�=�5�v��N�3��:/2��\'ue:�ꬮR5���m\\�f]�Aפk�u�v\"{��>�^���\0���n8�;
L#�_�����7�H\'���Fd�\'�6�`�~p��8�?�^�!��~L\\RF^I?��_�����/��h�H_c� 
h71�yk*0�M�&9R$�v���4�MQS�$�rS��ƴɴ�T��65��Mm��. �ww��o$gd:�Z��L#�Ә�8����p�4
�z�[�m�m�m�
әuV8�;78k�[��¹͹��R�H������v�r
ܹ��y�����u�N8O8OI/:�:/�X礌q^q�8o,���;����\\$;I��K����w���|��H����ʃ��+	zT���U��4�k#r3�N!p5�g]M�V`!Q����W�k/�T]���
���(�wMp��uyy�|�]��W9���n*n���\\��nJq��(�ݬ��]�4��nP�n�۩����(hK�.�4��]宱v�7�k�[���Fw��ͽ\"]��+��w����#�1�q�Iä������{�=���[�����y$�Tǧ���S�Qz������=A�I�{��
�z�O�g�g�g�������t
�7�s�y�}�c|���W���d�|f2��i��
����?ͩ�^B���7b������y�_ɽ�-��~���wsoy��gM~�=���������m���=�o!�����wû�����&�q�>�~�!��?�5����������Ű��Sȳd�\"������?c��7����
����SW���8�(
H�1`x�@2P�T66˦u�l�mZ����@O�/�708888LN�.��W�7s���� ��2A6X,ʃڠ9�Դ��h0,V)nk���[�� Xl�0��`[pG���6������j�`p�������8�d�L�|�Rp*8����\\�!QH*���!}�r��\\������L��)B�PEh=��6�j�[C��s�]ڮ
����C���Pw�78�����Ŗ�C�Bá�б�	.�R�N)�CgC@Kt�&U��+�U;�{C]�
ڹ�9{);��&���u��goq�$����P�����]���:z�(YW��\"��*�S���Jȷc�������Y׹����R����&ap�b���{�Ou��7���U��N�[�n��G�o@߂�S��
�/��,������#����|�����qƇ����(|	x{�MF�������_A��Qǹ^D�㜟�~��_�q�H���p#�?��ȵ�`��q�>��(����WB�������	�tb9/�A<�v�9#_�8�wg	�,_�]��Nn�Uᚱ����6���+\\�m�1�U\\�\\?�~
_�x��8~���#�N�݂0ҏ#c��x\0�Q@��=�m�����^g�e��{%8���{�?���\"+YLb�8��`����:���}�\"�!Cث��e���n�Q<�Ț�Ƈ
!o5��o	�\'�x�ڐU�MqXo���]�ո�:�:o��p��ZE�@-b�罁t�)���xFn2���(���£����`_Jx
��ӸREV˻NV��y���>_�+��>��?���{�G�N��6���C�!=����󃸒A��]�	�;�; �����Hp�~~w`�|��
C\\�� ��8�q�Ȍ�$�S*D#��9/1o���!���8B���5�����B.�gQ���E!>���w��q���.�w���2w����>��G��7�o!�58���,�N�?��cD�D0Aߌ�}1�b��C�9�_Ǿ�w��-���p.)��;0\"�H��<��#����a��E�U��+~k��W��nmGs�6�0!����[܍��86d�Ϩ�|1�b��C�9�ɌO�y��;
5^�*�[�}�����9�(��,D���g���|������_��5o3�y��׌��Z$!�J���vVV򕆬Z$I>�P+d��V>>�VV�B�J�$�hV�d\'+$I��{���L��Q�>��3�{���{����5	��(�e
��w@�1j�
Ը�c�q�?�SZ͠�>�M����:Z��֯����{H��G��E@�y�w�bR�����>u�C_�)�\\�\'|D�Z�NZ�9�;��&�ҵ��Q����>j\\�;\0͇2\")Fd(�C�x�ZC�u�ZC�2o\0��~x�ƿhu�j�k��Њw��7��nct��>V�Of�x{G���Z-񳮵�=Hf㿱C�Z�Ο	T������<���H����^��W�E��\'ت����������O��E�}2}/���{}o@ߋdEk|:����P��S��������n{�C�\"���]�F��5e�ƙ!�Rov�k��z
����ρ�CB$��Y���ʹ���]=jֳQ�]h��=LS:
Tg<
:L@�����3�N�t�YL���.����w���3˭����im���i�B�IM���q�:��*�@��\0��9�s�;��
���l��f���b�3��E���B<�\'�B���!S�җ-����Z�i�}�}T&�WSJO6�V�o���t��P�o=
��їG���M2v�_�5^�ƥ_OԸ��1���C$4��basSї0�.�vUأ���,8-�G���b,�8�e�:�	�nG��^��AV��Rj|��[��@M��;��S�Kk�:n��s�3�71���70�����P_zm_+Ь�<9����1u��J�GA�
%��YkX.���������9w*uwQ�Kd�h�I-���
����#��E���@���E��U���L�����nں��~@��r������P��<}��^�U�5U�{��ӧ�R�u���Ͽ�ӫ@���涡�-��޵��OCi��7i�m������!�{~�	�y�ZM����	P^�N�r�u�W!-ˋ�8�=���#γQN���AB�p�geg�s��H@Y,����1�H�&ֻ gC�mF�>Y��\0ٿ����	Oƫ���r�
OFG�q}x�8G��Ӯ{�Bk�v�ݹ#��g�����.�=�w��p��i�J�}+=ʰik�}@t��ɸ#a���lγ0O�h�W\\)#����/t���@�\'�sK����\\
]��>�Gv�����{5l��M��>\'8^�M�ĥ#��t	}�G?�
n��_�*���R����/1���\0/���V��&�d_��N�2ؿ��2w
�5_$d��|���I\'$�а9�{�Eэ�S�i��qT������Vb�[�w4��r�|53��~_S~�<�k�b�6��
��_��� ��nHG��L�f��>����|
����b-�z�R��D�LZt��∴����{Q���hmG�8)5OAY�	��B�:	�����M&���w{���D++[p缇�\'},�GnP7BԺ��@�cpց�u��ڴ��/
��
bԖ�X���\'���s��VP-gt���\0C�w|!�a\0�?y6�9}�.����&�
8�
Cy����l}B��Mb6��dy/��d��]�h�g7�Z�̺�����D�k�O��h1����m}?�f�;�y>����>J�ۣ�����ޕZ]��ōt׊�AN������/����Q�%O4֧����n=�Q�I+�Biź	h�Z��Q��PbȄw\'O�&��ɫ�b~��W��jW��֓�ܽ��	~����ᇋп0�Y�n�SD���m�����D�z$�ؤ5OpA_
�Ͻ��&o������ف��W������f\"a:s#���[��oeo%��6fO/\0�/P�`r�=�����~����\'��$Ҹ@\\є��b9	��HS/3L�p���P~N�ypy8��!1�n`C�����|�pD�Z���!*;aߧ)-�wOǴ;���D���6^�Ý�j���0���\0����3�w@�	e��JÉ@�g>����c�s��f�M\"ͽG��
��w:���m��\'�*Fr�@㸜aU݊�vG��X�;�L��hs�@;��s6r�����u$�	�e(��b�NL�X�Ĵm��$b������ߣ�\0b�^�`M���۹�a�@��)��?�����g��D�{�w��^��T�#��1G�fU���E/��OF�B�}ՋX��R�������r�#o[)�&zV?�)���v���q�j|�w��>7��s�~s��=��Q�����O�y��QKv�yH�ϊ(g�5�S��BV����GlNL���墧S@i�P��z�X��
�6���X�vfr��̖-~h�Ӕ=Շ�x���n%(м���z����gҮ���V�%��+�֒�/��P���zv`��½����M�ӥ֯�V�\'>p��k��wj���B�)y��䉪�ޖ7R�Z�e&<��=�u�\'+w})�/��1��<��+�@ݻ��ń�{��-����B_�N�7�?>ͼ�uv��<%��B�kx8��9/�����*$����	�Z�tw֫��H��kH���7�Zo�=!�/\'��Y|Z_�j��o�i&2?��M��3;��@߉�wSZ�һ�X]��$��Ʋ��G<\0�8�4V��|��^˓�W�y>�g��.�NO�B�D�Ρ�����ʕ�W�z�鼙~4JN���T�?K��n(P��g��h6��/X��r��Z�����+���[t�B�e��P�@��=�N?_���a}wѧz��YM��H-��h��Y�c�����糯��j݂�P��QK�a|�7C�P_��ꂙ�>|��s��-s����^�2k�c���e�6���˷c��廰��,˱\\+$_w��Z
�i�@=�M�Ѹ�k8ְ�lMM���W����B����hot0n3~e�a�6����ƃ�C��Q㿴������\"�y=/��׌��6�L���Ƈƿ�\'�/�3�7F�K��Q��P��j�,%����+T]�@u��Τ���T?�_
�O�N�m�c�K�G�W�ol`lHlxl��/���	B�����*{IlflNl~lQlilElMlClsl[��X�]�9�/v0v8v\\�s�T�l܈��P<\"�X|��\"�����Gn�i�e�u�]�S�k�g�w�_|P�8>\">:>N�M�-ņ�Y��S��d����\'m���x����b�Aٲ�����F�w����c�����=%��^�7Ʒķ�w������+�~=v2��#����s	3�K�Q�%Rz_�β_o�$���D�/�^,{p�^Ig=�ۥ{l��ً%�?V��h�}Br�)�ro��WV�#+��tN4���셲���0�*2L2�V��/\'�$�˼LtNtO%���ONK<Ȝ��#1&1>Q�x�������X�X�X.�6�*�N��ڔؚؑ؝؛8��H��*��}i�P��������5�8���%��|�k��u��/�k�o&���d �%:Vև_��d,���2� �$�<Y�l���\"z�t�=���}���C>(�Wr��ǫ�Ӫ�u��^�+}������|�����#���]��OV���+}d5(��]&6H��ퟜ��$c����)�L�I�O.J.M�H����������/z�	o�,��C�Ƀ���ڧ%�\'O	OeL�<�2Rn*$�*�J��K�J�������e��Z�Z�ڥ:���z�N�N�K
Τ�S7%%�f(7żRp�J�R�M�y�\"Jy8��(�G��i�����o<e$�#��8j�ܭ���M:x8�]�
(����ᔎ�2��َ�G�?�1�y8�lE��h��i(���F��H�i���W��P2�
����)L�`Zi\0��Ñ������[��O�����
η����Ч�3
6�`Qע���<s��*���Z#��~��CǶ&����s��!?����\"�Yd��hvb4;A���g���^^N�&�m����?�~x�����[�o=�0<���o�\0o��)ȟ݆nS�m�
oc{���g��\'�7O>@��gv<����$3v�Z��V��� p���������0���;��A&6q���m��	|r� ��=���s�����Â����>֝���?�ݟ��P��n��@NFw���7���r�e�cD�\"�u$�N�(���B�C�R��u����&�14?�#����8�\0�\0tV�孈��^�^\\�������ρ3�;����B�*䬂��i�{�ð�0F�}�d߱�r^�y��<�z!����2e�Q�x�<݄n�VmA�����_A�_�9Iim��B�ZH)+�fe������	��Yx��Mo�gW��{^�v�a�mfcCV��J�
�Sp������w�a�n�wB�I[��UJ[��a4�MC�i�D/.ы5�1�D_�}}�̏��p־����}�a;������������2X��j]��%��V�K]���|x惿���^�«X�c�.�v�2����/��S��A�?X��ڞU��K�K�z_�}�;�wF�n��?\0~���Q�>p�M��*x�\'���gL�\\�=�~�σ�
~+��8�*Ο��>|6rM��4���%�#�uDpu\\pu<��g0�i&3�~�v_g�ك��oB�Jd��=�e��Э1�5������9=���\"|��E��|���%���53���gV;�j��w��]�m��O���������9t��f\\�Q���Edk#��bxV��J7��&~�:� t�
���y	�/!g1r���l/�>~�d�8�z�/��,�P��iy󳄺%��u��ݏM~�M~F]���7�X�+��V�g��R����+:�W��G�3��Aܕ�������_?���>n�\0~8��E�侀�/`�blX��5�6v�����Y�6s�f������z�������|�=�D�mY�e#�^|E_,�/k��Ǉ؞!޳�x�Ӝ��8O��y���\"����2Ng�M��%��oju1n7�]��ֽ���G�������qѻ[��O����eW��U��}��.{O����z�������I{�=�^c�l�no�۟�_٧�oҽ<d�m����*�[��|u��
���T�ۮp�#���9��tv
��@9�[���3z=�e�� `\'�Gک�ޫ2��=���]e΃�x��(��Q�Qe|��V��{g�8[�����A�I�?��dBY�ѿ{��2�p�۵ؚ���0�w��j�\'�[m�����ͭ�\"�BW9�7�44>�}�fH8#��A���!U(�c�;P+�;V
�*�P@�k�:���9�-�R��?�\'�,D��p�t4xx��
�u�ކ���B}B�C��j��84,�`hs\\����j=����м��В�rߑ�*߉�:V�^y�M��険;�#�;�7t �:�+󛁎�y���3��sB�vf 3K��3�B���Xf~������:5	2�3���X	_�Pf��U��i��1��]f]25�Wf�́�C2��wg���c3\'dN�3�fΤƜ����tZ�?��PWd��ܠ[ݜ�-�]��2�H�e3g�s��oZ�̳�yaC�i�
!N���;��a�#rGe��;���9�x���2�I�޹����Π�ٹ�r��.�:��$wE���u��r7�n��m�;��ݹ{r���=�{4�Dxn����r��ƍo�sOcb��imڙ��1ӕ���e��f��h�iF��L��}��8cr�e��9���f�)�7���ƦQ���³�w|g�2[�=�{́�Q�\'֮Qos�wݙ���v7��eM�޷m�5�ޕ5\"�5��&<�t��S��ȞӤ�l����d��e-iR�U٤$gr���;���6Yl��}�c��j�n��.���̫V\0�����	�Xֽ�O\";z?����p/O\'8�i
�J�i�� j#|S�=:֢��W��\'>�\\�{{����C�*�e=�N��G�*iiO?ȵ��7�)
h��Z������j�{�0#d|�Z���V�k
&�>��6�Z���24�
fW���yi�BKx����`�����4�
h�lKD����U�G�$𚲀����m3�
N��b�Q��)��4��<��?�-�#��?Fss���b���_���XW����1Z�zY�+2g��h�5@��\0��b�c�mz�cc4G�h��5`���6�h
z7�٠�0�^H�!��E�&���p�]���7!�h�p�k�izkZ�W�4�٠;���k�!K�����`
|�q�._h~\"�C8�\'��ޠǲ��_��I�#�>��t()σ�.(�N�i�XhN�����9���,��\"d7�rH�Pf�.�chiG�/CJ{P��ڿ�U�e=�$��\'��p4�Ȇ���7��%@�ù��
?�|����Ѷ�J�inG���B��Ac�����:Z��tU�z�%Ј�G-�2�B� �����]B�h����	�wϛ�s6V�4�T�3��
T��(?sY�O�o��}�r����hC-���C�/E7�������N�!��<R/�w�IZ�X~Xgp���v�N����?%����:W[;�n��a�$�S��C}[c˯QV!]i/�%�/�y�c��iobo��є�+���������+�j]><�3���d�d�;�Y^�|�|�>�8�;�q�y�Xv��.�܏h��q(]dw!We�%)W+��x�\\���.������q�*ɬ����ʅU�6$�\'��t������$Ӱ.�JW�6��ȫ�DWzYl��U/o&ެ-<�I˜��>#,WW�
�0�_����f�U|j�w	�j-ӎ��zy�4��e��K��2�R���Y������U��	�v�����7%�n�{�=*BO	�*�<h�U��
�?d\"^��J����#�w#�B��J*�1��CO8��3�jbf�T=�P-��C-��3J��!�9�Nr͏̏�۹�Z�͓�I*g��G5>e�\"N��T���i�]@�iB�YD�lS��i�ZG�K��ZR�\'��H!��D�%	f�F�o0��W�F��U�*q��l�\\���(�f��8��*��e����Ά�A�9�u#�:�\"Yi�ѓ�X��e2�̽�K�	$��Ðx$2��d
a�� ��iA�aH�@�Y�x�@�!z��I峬5d��nr	Y� �0d�E�^@!��
���Ro������N�������\'ܽ�{�Y?��K�m=:[�rt�Z��uW��o��ҽt_=@���H=Z���]���z嘯�z�V����&�5%�L9f�3y���v��{:)_��ޫ}} )G}X�\'��d�$���@�|�� r���YJ�rZm��A�Խȟ�zg�=���AI0&���~	yS��`��&%w{O�������`q��+
V��&�ip��9%j.hx�;C���--\'U8y8!M@���#��#���8�A�TZ_q�`�l����<0NII�c8!\'����B���E+�G�_�r�n�\"��8#A���q(\'��Q��5���(x�\'�ˁR���*�I@�����\0�DN�p& ~��^�zuMf|!��C�w�.�(�졄
ĞF��q��Z
����QNm�o@�O�q��Z	���������S�\\ݏ�S��/��\0o�@�.�&B��������+�CVΏ��g����U�Yw\"��|7,<�tq��ΝO#-uq΍���#QtUݎ؛�ܪ\'.��B���r�
����H$팂�W�	Y��N%h��Z!v}�<�WS��[ȭx��.�:Sd�]Z��1���o3�Q�n��Z��f��l-y���ۇ�ݕֵ�pu�P��S�Nv�M��q�����j����IR�+=�񊴖u���L�^7��˸|M˯BM�/���z��~襁�l�5�U��m�
�s%�Y9� �}�ᒮ��n*P-p�$�s%]IO-�*=�������S��|؞Z~�zjy-�F]KXT��Asg�4�RJ_a獇�nbW:��q���X�da��k��8�X�D��)���8ͱƹ���L�t�c���b^���MT_�ik�Ѵ3��
�[�^������K󃴡�zj]K���0[1�:�j�Cu�]�yi<4��*U�R���Z�kM�h�:�^k.���QgI^<z��7
U�U����Y��U���j������I��l9���}uy�Y���<>ʚ�\\6��I6��M6��f��4\'4�a	AC���K~o�R��
;|�ޛ�.�c����9�.#�g=��;���ƕ}\\����bץ�2J�~G4�!�+A^-��N���4�4��Ag\\��Ʈ\'_��@3}칒����{{�F�]U�f���iԜ��u�y-��MM�_��H	~hqJ�)�1Etb;�w#;ah4q	�W�ނ��Aw�p_v+bZ�.�JĂ���b�z�1Y��E?���89��B�;��8r����~rp�z���$~lG��q*�s)�މPʻ�Kޠ{��׫~�؅��U��b��\'��`s\\�4��0�ӳ���A�V�O%wF�e��:�E�����q�LD�W!�W���;�h��Q oQ�\'Fc�k�����4�3,s�ִ��/��JSt��]7��{�/��_���䞧������ϧ:������?����et�>��q�5��%c�_�ղ#��:���;�?m���Y�VQx�N�a�L�F�����+��؇̟�]����rW����AP�[{Y��K]ݏ���q��]	7�4u���J�\'�Q&��#�d�Ӆj�0�c�t����IR2כ��-��P3Tu0Ť3���:Cs
S�����f���
��c�j�͗�!��~�Z�Z�\\G��u\")���r�Ȗ��6������4�۰%�bo譑��Ժ`�z�A��Kk
���Y�8rZ-�E��f𻐨��j���S�pl+|�vO>Q9
������~������T:�y����������w�ҹVP�+i�ꐿZ��������h�).�}��u��U�B\\�K���+�p�����(��G��2+��nLP����iG�MjS<\0I�H}-U��z��3�5�M74�ꖺ!�=UZ���=Sv
*W���U�R�?jt�9�r:2��,ѸvLp�K�+帊V�k<��pm�x����vַ�g\\���B����X�P\'_ͧ��_]�6r���u.B_��Ú��s���p�\'�׃t5+�q��^s�]9�s��92c���xj���s�0W��w>D;���\\�7,����S��f�����^S���V%��
�q�W�?E��Kg��NY�AƍR�F��+��7<�Ȅ�U-ă�UZů��7��)�!56b68�e��G���b#˼�f�������̢�Q���F�
��n��I�n�p0�Ͻv���1�����qŞ,W��q]�,���D�b\\I1�rr����r��2gԱ���Gm�/v^l��vփW0E}��+�N�aigIa��R��O�>.�m��\\J,浆���J?s�r�,�ی#疔� �\\�l� 4��T���.���C���C�C���Q�E�\"y��x�
X\0E�����)-@[��骫=Þ���5�q��H�[�6�cn6�4�TQ��y
�?@�04X��ޫ�C�b��U�Y�|�`Ka�+-�?���t��H�N��Az���DP��,��*b1*`��T�q��?W��ƣ�3�����Y�s�9�o;U���qH5���.0/\0��l*�2o1����9
�\'lT��<�G77/�n����\'�\'�WU�a��lc6r=e<�xIa��/��5����$��K���Q��\"�GE�>
�+�\\�\\^<��s����΍�{8=��������|��\"�7�o�/un_�!�7�E��Noȿ�||���w�8�N9�}�~����;�\0H:A��|�A�m�;�ӝ!��w8�_t^D����A_q^]笃�U�5�7�7@�t�����[<k8o9�@�;o��|�|��|��|����������X@0I0I0I0��/F0M0I0I0I0I﯈�_��\"Η1�z�|�gW���h��!=������z��������{{0��罇4{��E����U�;�����](��m|9�w����??�x�U���h��vF�}Rʥ��0ʛW!����q\'l�8�~����ƛ廌w0����q^n2o�H�l�Ԝ��^e>e��h_���OB�s�1<�\\�\'�A���9g:�i~#O1�묽�~��b�]��2XSXR���0����m���Q�5��J�3�o��͸Ǘ��>	�W�ՙ��w`k_ƽ}ws3��Vܽ��wo��p�����½�
���ʫ���ˆr=r;s[���n��J�n���q���������|5�l�s;?�2�-�=7+7.�g�������Z�>2�W���\0�������
��j��n_�o��� a��|�Ψ\'��_������o��sz��J8K������6�,#_^��V�6����\0�:��d#獁��Ky*H�픦����/�[k���y���wc�X��j`�E�7�����ZSUۺ�ψ���}�����%�n��|���^�^�TzMz�j�]�u����JK�>�{�����H�|�yN�L�T���T4�*�J�_L��
ӫQJ���^N��\\k�k���+ȵ.�N�����j�^�^�b�Wӯ\"׆��+������_�]	+��kk~�w�~��*���V	�#��_^�o��R�%��lH-c�2^W��k��0�ԯk������u����c�}!�.4B�<Mu�Gv�1X]��n\'����~[UzǊM�4�]$�S�k\0��R�Z�wp~
z��9��2=4�����奾Ob�F��;������|�<W�����d`j���ug@�*��v-�_h���<�6>S�3�x�H/>K;,;K�g��+_i-��J�9��LR��w|5�ߐ�L:����^`[?�vhR����t&����o\"��;6L\"��JP�Ci�Kh.&4ߌV�;������qռSi�p,BZ�v�QU��M�-�h��:�����}O���-��~�oy+�����ybG\0X��� <Z��9��2-q��8�\'թ4���钱z�<}Ε�>��:
�F\0�ɏ�|bb������(��B�>g#~vb^b!�%��_�X��5���F`�=8��oL�I�s.8�\"?��%�%��\" 8�0�M�-ȷ�!�u�#ϻ\0݁��2��\'$r���
 �	���������W�_�|��s�����R��H�Bk��M�V`Gp.x��)��i����:y�$O�M�HI�\0#\\�7N5C\\
�W����#�1�x`R>L*�{��\0�.2�\"\\��0��M�V`�w��\0G�
� ?��d�&��)�Cg�Ɵ�f�g�\'��Xb-�Ҩ������!��p
��W�k��{­��]`���>���}�Q�	��ub�
J^`9�S���\\J�O*�Tv�e�����AVhۑ�9�U�I3M��iJ�����L�1R�_;�G)BI�Al�?�����֔�I�#�Ճ��2��)��]@�	��HBڀy������ޅ�7r��N���v����c��C�
�Q���l�5�4d��_b	��򡔴�v�f)��th\"<��l����ǄF��G8�.�=V//��r��}��#���~��I�MIo��!�.�?I���fw1�e�Lg�
���/y� cǈ��>H�<���R�A-�C~���!�����<*}��(�
K��t��)b-�3�d-=%6|���L��+��(��%\'��J���y8����Ɉ���Jk쁕�k��o�$7��\"J�&��i���6�C�`	챑=��IW�ne�K�wb�5��1�AFSHÞ�F�O�82\'=ڋ�(�c�R^�����	]�/��g؋�U��X�ڿ��I��_h��\"�ZH	z8+=�Eԧ+H�%]L*=�$��s�դ�J	���[��Iz;�l��_�v�?.|d��h���)y�4O�O�ہ��A}*��<-T��U��H�*~~��l��/2+i?���٤��s�_А|	S~L�w��U#��sjbR�_P�J�N#5�q��^BFQ�oD��^$}���_)9*T�x�0[��\']@��������r�S�rSҕ�0�(�
���֋^H
�C�a�_K\0ߞ�w��}�g!�7HQ��2����(�]3��OB���~cS�5�U,p�(�p7Ρ҆f0�?F*�\"�QPN��:J8GG��/�e,�5K���t����3�ӒT���0�:��$|��
��������{c�����6,Sf�4��2F�t�6�w����\'x-\'�+�Q��Z�`+a�!����*���֓���z���y���HB�)?A�(�_N�KkI�h�]��P4?I�X�=���o�1+��#�8�N��^x>�\'�39�z&�y�9��{iU�Bs���(�&|Dʔ��MK����\"�6��QI?2?��x;�ś]�K[1�z^GjP���K\'�^�I)G;H[t���`�F�&��$ߍ�A�&�Ş�I�����_��K����bi#�x-�0W�H)�p,D#�L�g�|-K��E��17�^\\k�Y����x��D�D��@G�����3������Ӕ���d9�#��o)���\"����P�͙�k�?,�bF~��\0: �B��]=�]\"���S�BR�e�^�h%�ǔ�&���c9�����*|�~i
V�\\��A�IԷi�!Γ:d�(C�L�1��I\\:�|52�_1�������{��:�|��9�+MC���)\"\"�)�)\"\"\"\"O��)ƈH#7\"�lD���HS�F�E�,��,bZY�H#�\"�,\"K)y\"F.E�F�)҈,
Ç�j��2�-C<�/�	�i3�)�v9_�׉#�E��:���P���?$�oXtHy�0�u�=.�##���c�8���)8�
��!�\"���c��_f��/���/ɯ�#�U�sf�7�������)��E�M�_f�������c�^PK�A��o�?:
�jP��E�Zв�؛�oh���
�K�+Ak��\'���\'v%�$�HNK�%N%�����J�ɜd<��#i`rHrXrdrtr\\rbrJrjrzrF�\"9\'Y�\\�\\�\\��:���dCr}rSrsr[rG�ߜܛlA���#�����������dWʤb��T2U��*L
�k�g�h]�֡f�yj��S�`X��j)�zj{�����b}x��P��w]yF�C�#)�	��y��G��g�
�z[���+ݑ�\";R���#��G�Z��赨q�~�i�8=-��E���h����ӢqzZ4N���t���S2J�No���~�(�����bf
F�<�Rxw��(������f)��,�ۉyEo2K�Mfn]	K�~�R �S�N�/|�b)�^���^���H�4���O�Y
/���t<I�>���I�V\"�G�	W�-܃�r�@eT��}6�߆�d�x^����8F��οY
=O��%z�^���mz�>��t�Q��I��f�)2��d3��0���,4K�
�`6�-f��c��#�͜1��e�l�M��v�m\'�b;�βs���.���:�h��]v�=h�ٓ�����.��n�+t#�X7�Mu�n��r�ZW�ָ
�_�/�������~���?��[�S�9�b��>A2
v���Z�{������n�U[pJ�����%�ǃ��T Ȃ��y9�.J��3���y�.Cμ\\�b&h�9H�rL���#�J�6sz)�F���e�>��ƭ�ƭe��2b#�1��r�Z2�>��X?��X<��r�4�K\".r
Yĝ�y:���#)
�[�p���\'Ǜ&��Q��\\s��XM���l��q[\'qk�l]���Yu���3y�銄\\.�Zj^� ��������ϝ��$��K-�� �ytD9d�
�7��@����%5o�2�K�,�f��Ǿ �e��c�\'�W��o?�7��N�oe}�=ɖC;��ȶ�����ﱝt-�x�tu�\'veW���+m��9����Gw�u\'CҎ��z8����z{�j`���>�kS�~��
�*�,u�N�P�����A�����8��=�������[xu�k�~rz��gأ��ݳ�}����� {4�i�٣{�����ج�i�s�=��G�<�ZUE�K+�T}���\'؋U%{�gX��}5@~�e���%.wd_f_F��#��{��\'��Jy�����L\"���}�	٧��/S.����g������R���H��}�A�o�8���2i,(�J�9M��V��?OM_�o;.>_�s��+ϋ��?�7�~�9a.��i������煉��/>3� _|�nb�|���\'�JL�{����?&^Ht&��4I�t� ���ǒ3��H�O~)�H��M��\',_�ޛ��}�-��Sw�ޘ��z����3���_XRU��M�O}>��Ԣԃ�63����z����[iE-�nUZ��c�M����Cw�ˆ�r\"�Gt-/
hj���Ќk(��L�*�|d�����z��DTӫ�5�փ6�6G|^khG�c�5���1/��L�[\":ё��NkT?S�����QZ���)��i���BE�V�tw��ߺ�|�Q�<�t˻x�/��m2\'n��m�3F�
����З0_������*�L_\'�t�8�%��\"��\\k�p��6��
O��R��4V�z���%���\0=T8#����+�<����,��+Ꮥ4g	�f���\'a��u+底�DbM��m��aFd�Y.��^���%�VH��~��� y��s�������x�\'y���w���ՄZ�&�bp���b�3,�/�ba[^(�3_H�/C
�B8C����K��}*\\ͱ�;���8�Jrw��	��VI���I�:�mߓokO��a_w�����W	�K����o1���U�JNJ%�~	��p�t�������1��_��������%y2�Oӿ� ,#����#!��B�a���Ǔ����x�xa��t^:�N�Si�y�+��ّ93� cm8�r��{������DjfꓩY����xszH��ta�-Q�x��E9㎌!�x</���9����?��D|f���Y����O�g�s���~���������?����H�4}ozz�������i�M��W�p�����R��ٜ_��U��������?T�j<F\'~�3�x��Cz�*L�I�D
�ڮ���h�D�	�3»A�\"�t(�GA�#|tƞ|t)�w��΅|�\'乼0��~�����P7��X7�MT�J���*�ϻz]7?
�tp�3�rK�r�+�tym�zr�z��Y���;U
z�(����j�P/	�����H��zU�sR�`F����q���<}���c���� x�\\��\\���(ֆ�d�!�3�)N}�X�C�
�Y�i�����n���׍�M�*
��+g&]��o -h�,�3����㮌G��S�h[Q����@}x����6Ն[��ձ`�����a�L�
:!贤�$$�3\\��up����9�n�	�6�$>���{#
]-h���@�[�5;�{���H�pӣ��W�Tv��\'��I�)�w��G�{x
S���Z�s�V�*��=L5�o��w�&1��K�h\'@��hӮ�
�N�2��&�N��!��[eo^��KV��x-��6^ø_���p�`v��D��eT�;�Pv�GȎ�փW�\\�5R�?$�飮� ��o�K��lK�zj(��n����S�׼d��5�%3Y�}��\'�f���׍�M��Հ�j�
Q� �.`�5�
A:H
\\��F{�@I��A����\0���
��;�E# �o�d�ffPf�iїCg�3H_F�M���>ig�fQ� ��O��bKt�i$
$��T�Uo��z��\'
$q�AW��6�W��D�C��*��:�P/45�CI�.ճ�y=�������I攞��ArH_���Q=~!��A2Z�y�+ɢ<H���9���5�4����3W1$�ڗqF]���js�a֝�=W�je����3����{��UV�޳H�s�͏�#��%2�X�H��I��o�H��d�R��u�X����\0�ݜ�دP�>���0�ܽ���/eG��~O����7&�U2E�����32I���ӹ��E��]�ͽ��!W�̭]�K����h��sL�K�{��y)�t�ƺ�]b�B�sfdc2G��e�_�
W\0*
�{��@r��w�\"�<���p��	�N��
jG��E��⎃N
bj����w�P��1s�ζ��
�nw��FU8{4IP��iZ��0{��^�0A-v���v�Hg�	�j��FH6p�h�m#����X�dl��O��c� �d�����4etv
�&zD��\'!�^��GB#�����]~Σ.�O��I_юإ��Ш����u��u�Kk+�����:~���.����z��.�\'+�1�g�sዹ=��QB�����:
�4�VL�J�(����Hrg�O$�f��z{���P��?���XAE��n��d�-뛷A�c���s��rxh�4y�d.?��<I3s�A��z��Z�UerUVV��6YG���V��9�K6�jE�՜��Xs6�㝃�)��p���W:(�\"�Ub\\Gs����E�ߒ���+����:-�P�]�l�߇v�\'�.LU){
Su+j	�aյRm��ՄSfZ��Z-��ɳN�N�z��V65�N��Rc��՞�ʯ��(��cu��џ��\0j��-�ν�-��=�~��4	�:���p-�_�u�N�����8w�p�r��a��u2���%�|��Q���
k�3����\\�v����jm���ن��Qg�-������r��2��ع�a,Q#��d�{��P%�2���%o$%7�WS�3Y[U��]6�Z~k���2��R�~k���5�zКb=jM�Ψ�a׵�����F;��������k�s2�:N]����i�4q�:����1N3�ON���rnrnvnu&9���G�G�ם%�Λ�[�^��GN����ii9#�1�%�-r^�G�W��H��%�K#~��ZԈ�E+G�D�F�Eӣ5�5�������������]~�X�?�L?��|�<^�6)���?­Qưe䔹�J�`k0��(ki(OGy�k���n�i���
Jg��R�zؚ��}�D����2c���S��f7�?�jk�u�u�%W
+f0��0g$[1�����c���t�)��EiÄ��k�b�
�n-w��qp���]�Bn)�u(6�]�D\\�g�Q��3.�ܗ��!�\"����֗�5�v.֭[WI�j�t�!Eҽ��U��Y@c�\\\\LJ��V��#��I���bh��l)��h���jhn`i��!-��`�M溳��9��̩˜�p�<��Y�X��&ɱ��ZVI�O\\���F�ܭ̹���b��\0K<%��f�%�q��|:�W<U��V��ɲ܄嘥8؋�u!9.�>%aS������XZ,�Ӹ/5�[����\'�{;y��v��5�&������l#,KmǚIj��Ij�A�y�bZ����MR3m�f�ʚ)�H�!����^PH�h��q��Fd��<�.�뙌Zݺ
���
�zy��6c:7I�(V�L�������<E.=(�`��^��$e�,����E�d/�>ԭLyM����
ә,�.�R\"��J���b{}a�����箜�1�Zg����N��h��1C��R�.\\��+ߜ���4�fr�C�Q���j~���s��ܯH�[���v�d�lǞI]�g�=D
�V��u�*ZC�i}N[i���~.[�ӥq��~8����:\\p_z�0���:�\'��͐q-Ne�����SV>?M��<���7�����3�������Q�����NDI<��$O�6ϔ�Q�ecE�,��~K��Q�e��\"��;�j��)�-fL(�{�+A˘����{K�OiU���I6R%ˣd���jl5�c��R���*͎��,��F�#�x�Y��X�r(
\'�W	%�mfarm��%GVgR��L�/_�IR�J��¥�+I\"��\'Y�|[�;���|)+(3�ȷ4X$�$h�f)�6��lh��c�&��l\'˙h�K�.u���A8wR���&�����g��jr������8/D�S������]��[ŭN����g�?��\\ۍ�9��֥nn}��t����{�ۂ.t�u����	n+��=�ͦ��m�S�2��=]��v��n\'�3
�A��v����`)����V�=)�� ��!�-!��AO�v��
	�	��x$�RH�\0H�@H� H�H�0H�H�HH�m��;!�����xZ�PpO�{z����g��M���~�����{E���&�������pE� �N�A��ޥ�?=Z��8E�Y���	�}�C�.m�M�{�6_{U{S[���ڻ��r9^���j�>�U����[�|?������߬�ӛ0l������&�g�g�]�oy��\\}/s��1

��Ǵcޯ�+�;9~AL���׿Wb���_����,�b_
T�P��\0���^d��K��P\\�֐����(Z�ˈ�	w�c��z�,����/��8�5O�ok�<3��K���[D��_��&�8Ez��9	��)%~9���Su��)K��т�S�0�[�QT}����)�;�O�I�8�[����%ȳ��6�����yz܉�?G���L�R����[kKJZ
��2%5�������u
z
�ߚ����Iɟ�Ҷ-%�
��6%�
�؞�K�%���|*�cGJNα3UE{��)�*��T��c�t�
�V�c�5��ZUF}��>�E\'щ�/kUC�}�Η�K�Β�h�-n7�-�ן)G�ٍz��J����-S�7K�t �������Z�M��`N�o�%Ӭ(#�Y
;_߳�\\��>�W�^{�i���Z��º��\\u��8����ч�����p8����_����2�O��	Bи��JE�A��-9sf1�]����/��\'���F�g��8��y�bx|O1�`9��Rb^{�iX�e��ߔ:��M;��
�8q���w@�4Ц�)����d���:<�� ����
�������\\ʒ�f1і��3��
����W�4@H�.+)�Í��B7;�{��Qc���^g���]�,m9�7��3!�J7b�	�f@��,&��|
�[\0���/�z��;_��#��T��2$��ut�\\��rX$H��lHϑ}��788���-EO��}m
��L2-��gþ��::�,��б��C�B��څڇ��
��+*��CB��#����fs��{\\T5O�z����2@1��U׊�	I3�^���ib\'xz�l��}�[�(g�b�;��e�:�}������=������̉
E�E�1|<�8�E��>I���F�e�4�����j�_F��������]�.\'�tW���r��]����������n.�q7���p7��9ͧ�T�����B�w�lu���ns�Q]��j�u��R%��ם<��׃�^O�\'U�zy���zSM��חj{��~��{���7�̹�zC9�po8�+�+8�(o��ƻ���{x�����.�A3���D*{�l-*��,1eI�T�MJ�J�����hJ��*i{����E���{G��W����������9s����s��,��k�-WRWB��F�a
4H2Gڝ��.
Hi����.��������I��_�Oc��	ۃ\\�Gdz�Rc�fe>��
��	�`7���A|@�}���\'�KZN
�Fb@�U��
c�L��r�Vr?DAw�����Bx����?�_�A�`P!�`qaCA9��.����G��;xK�����5ŵ\0�&N�]R!!J7������/����Qz)��\0����S(�2Hm�)��¢����TS�T\"$H��A�\0U\0�S���\0U�*��\"T�D%Sɐ0U�* � Q*�J+=�* �TYH�*OU�D�JT%h�=�����J������˝�/T�r���vg\'����%�d|r�0$���(�&�%�#�m����k%�=|=8<�eT�a�7�Sa��06g<6gU�J�x��㱙㱙����㱙�`3�a3�Q\'Q\'A��1-0C&��w�X���b��$�w��������sv�ʐ��G����b����a�b�8��qrF��k��h��o��`1?1,�,�:�/��t�Y�ub
g����7�헊E���~(OBjve?1���,�c?��?>���3����X����EX�-{ʼ�ht/��
V�a������D8��D�R�荍d�/��K�`�b��j�2n,�빨���!`gh�E��!���	\'����~���6g�d��!pzLzBzKzG�A�@d_r9��=���;����|��D�K�O~L~Bn#�Y�4��\\J�3��8q�����J��7(��a��0$%�%�K$�sF18_4J�!�Cq��\'��c&#h�?x�Or�8f��������� �������`�C-B��C��ƀ���H8���xLg����c�0���|T3���Jl$�W*�c�# 7E�
�F4��\0��>��(m�1:�tM���� �1h�s��H��L��w[��l#n�&BIa��?�����5B�P��,t��4�:�N��/`\"���ca������I
S�:��_X�-�]�\"v��@#��΍�� Ռ|��ҍ���\\��\\����{=���������q�5\\�_1o��=o�?8��Lx�O��,z�o#�sѸ�5X�\\��V��9&��(,.)X�Ф
k���4x&l.U���]6��\0^
s\"��[#�c���������2���`e\"V>��S�]G�ױ\\�v�n� D�Q��A��@��:�c�n��E,�w����b%���6-X>��=XކY3t����xڜ\'Wg ��J��
��1CM؏/�x�� 4�O��\"=1�$��
���G�	%��� �@{�l�t*�N�t��j��	HA+�x��{��r��B�f�-`X	V�L^�O[�-
�%�:�x�{�d)\"@�
	�eș�����y0@yD��ɔOx�� MG�GP����,Df�0m
2ѧ����-U�*W�KF&��xA2���ށ��L�Te�MB�}��L����N�7��i���5g#���I�\"gFRc���\'lU���9!<�\0\\\0Ǆa(3�J�ݭ�E�/��ʢf�7f���\\�0y��U��V�u�U��u�w?�W����J�ߢ�.�X��p����7y�N�;k]��E|Ŭz�ǅh�.si���r5���\"L�M��\"9|8g���];��7���fu�Z����g�,ym)u���흸Gb����k���5��bmVfn���:ټW��E�B��~8���OQ��5.
K����@ZB���un���t�d�#?��2��:�s�Z�W�}��w�
�9���U(�Te{	)��:����Eޣ��A�S����f��UŅ$$C�nյ����o)O�ʷQ�K����3 �͍�_5E��}8�`x���	ϴ���w�h*T��4�w�����e؝+���b<�gy�-Tcis�W��B��}5�=��۴GDv���
eA�kW�v��i�BB�1+��1�b ������&���`&Ѓ�:#`��e;y��V�+�` B���0�&��3u�3q0�#!�`�e�E��y�w������s���D�.ǚ\0❪��֡��n�
�$���p�U�ݒ��@�r�T�B���f�h�ޛ
5IJ�ⶴ�H��J\'i���m+��g�_�,նwY�S,��F��T��Ӧhe�T�|�z�T��V���bѫ���ϫV_Ds��,�����TՐ�U\':ΛM���W�$i�==/�R�ʕ~ٚ.���7���.�X�3�n�k�v��)�,C��t��K���̊��J&�2ˍ��
��PZ^�UY�k?���piC��i���d�UL��f�n��@�#�M|.p��	ts������.f��>�ºa�T��r�w�0U��FE&��?*�@�9vS��t	��n�o���Gn�J�HX\0#
5�>�����z:�T`��4�����n�-��������N��@-��O�3�)���2WI������g r�_��q�-n�2q�����P����;yE����$����(m�|��OJchu{�tG��9����>���oXZ�P4��;ph�.���������k���svj�k.۱	�Գ����)��|���Fr�)� ��f;�,�9��U&�Nk��7\'w`C�x1~fֆ.�H�Gڞo#$��w��CѼ�J�)�P&r-�~o����r<pe���C}{K�
�N�b�e9����(�H>\"2jq�|p��1w����!���#�<�#>AF!�α�q;��m�b�1�g���=�DR{\"�{a�����\\<��Q�%r�d��	_𞗬��s���P�I��x�������QS�9\'.�`��#�\\��G���<L8T�s?x-���r1�tʣ�\'�G<�5�.�b�p
��	�yܑ�v�6�=��uq��Ĝ������%��#L�h�I���
��h�\\��c@\\�/1�t�(���Q�O\'ptDo*�iL��4���\'&�����@玾�&*�u�9�S�V����g͞��r����<����*�d�^!5�1���ST3�,F�}+Q8�{��w�������_�زױD@���^���h�»�k�%�/}W��;(��ۏ���,5=���J��O]Pϴ�9���>6�>�y(�KD���]�O����8*�jr���lrą�����Dem]Ts������Z���e��������o]�\"�n���m;�k��YP}ʈE�U�7,.)�i��13V�w�K��ޤʩ�����9NU�P��,>~[�ۛ��[S6��$Ϙ�FQ��^E�`R��9Sn��<!��_���!�쉪U�[B�%�䭍���+�����}G�i��y���Гs�pL���K�O��l�>5G䥢�9�i����ʰ��a�J-�3��/K��~[���t{K�kV�У\"�֊���]M]��V��ɪ�����>���V�����}�/F����
�TM�H��oW�d�ib�M��<m����H��%����l�_�0��sߧ�3�^����)a����������\\B� �#�@��J�2�f�կ��)s�x�4��h;LΈ�>�ȿJ�]1QY�qn�#T�l�l�x�z��h-P��C���F�cnn)��s@쑹\\nn������g qY���qiH\\
�<�$-<�1�x;,��c�w�W8�Y@�GX�Wh��?#�9J\0�����!��<���=U���(P�\0�>a)����:�����K�%�u��᧰W0u����S�4F	���q��0��=h=�����-
�<𺨠����gÎ5[�흛�v�4JZK�̘�š�h8�����
�ZGeU�
Zv�!�,m��$!L�1#q��i�5���O/G��P�3\"��x���0�O5A�8�+�(~�H�Ӗ^��h6ا�����fkS\\���\"DsA���bU![L���/o|�:�AN@�P��pP�r�c����NQ�!~a��Qr��f�$���W#<��䉲Ķ_-�\\s�౫�:��:��Bj�g����K)^6ڞr���%�Gs�[T��in��P2Cꈸ�m��O�Ύ-����
6���
�O�W�%ym��������=�N��#4t�ܲ7Ι���sA���C��߮u����j,-�4�x�-1�f����p�?�w9���\"��ˉ��1�f�m)�N�e����Nf$+/
3f(h�Jg�.��Q�wg�Ǻc�/��E�9�\\ݟ�}\"�^���$�����\'�e��s�+�a�T��D���И8q\0����� >��6.�\\�P�ER��C�|C��`�����4�o��$��Yn�����ʫ�f]`�Ѐ�ّ	��F�+%��u���h��E�<6�X�pcM����5�:��.�ն#���~�M!=��^uaj�j�
endstream
endobj
206 0 obj
<</Type/XRef/Size 206/W[ 1 4 2] /Root 1 0 R/Info 68 0 R/ID[<A364F78991C92145B0AE2AC18064D6A1><A364F78991C92145B0AE2AC18064D6A1>] /Filter/FlateDecode/Length 504>>
stream
x�5��o�Q���v����S�؁ZCi]�EgtR����P5TUl�D�t�.$be!�bE�?�`�U����!MDr�����8���<9�yN�c�=\"˞S��r�؀H���\"}J8��?�sT��w��8������w���7�@=��1���P�Ãb�xqK�l��ĨH�5qc��
}H	�O��J�a���`Ș�X�2
endstream
endobj
xref
0 207
0000000069 65535 f
0000000017 00000 n
0000000125 00000 n
0000000181 00000 n
0000000797 00000 n
0000004684 00000 n
0000004853 00000 n
0000005093 00000 n
0000005146 00000 n
0000005199 00000 n
0000005362 00000 n
0000005589 00000 n
0000005760 00000 n
0000005996 00000 n
0000006164 00000 n
0000006396 00000 n
0000006540 00000 n
0000006570 00000 n
0000006742 00000 n
0000006816 00000 n
0000007068 00000 n
0000007249 00000 n
0000007501 00000 n
0000007632 00000 n
0000007662 00000 n
0000007821 00000 n
0000007895 00000 n
0000008145 00000 n
0000050338 00000 n
0000053027 00000 n
0000053236 00000 n
0000053444 00000 n
0000053682 00000 n
0000053908 00000 n
0000054117 00000 n
0000054325 00000 n
0000054551 00000 n
0000054773 00000 n
0000055028 00000 n
0000055259 00000 n
0000055466 00000 n
0000055672 00000 n
0000055879 00000 n
0000056085 00000 n
0000056337 00000 n
0000056567 00000 n
0000056774 00000 n
0000056980 00000 n
0000057203 00000 n
0000057422 00000 n
0000057671 00000 n
0000057899 00000 n
0000058106 00000 n
0000058312 00000 n
0000058451 00000 n
0000058481 00000 n
0000058648 00000 n
0000058722 00000 n
0000058970 00000 n
0000059145 00000 n
0000059391 00000 n
0000063313 00000 n
0000067359 00000 n
0000069265 00000 n
0000071266 00000 n
0000076901 00000 n
0000078984 00000 n
0000079747 00000 n
0000081126 00000 n
0000000070 65535 f
0000000071 65535 f
0000000072 65535 f
0000000073 65535 f
0000000074 65535 f
0000000075 65535 f
0000000076 65535 f
0000000077 65535 f
0000000078 65535 f
0000000079 65535 f
0000000080 65535 f
0000000081 65535 f
0000000082 65535 f
0000000083 65535 f
0000000084 65535 f
0000000085 65535 f
0000000086 65535 f
0000000087 65535 f
0000000088 65535 f
0000000089 65535 f
0000000090 65535 f
0000000091 65535 f
0000000092 65535 f
0000000093 65535 f
0000000094 65535 f
0000000095 65535 f
0000000096 65535 f
0000000097 65535 f
0000000098 65535 f
0000000099 65535 f
0000000100 65535 f
0000000101 65535 f
0000000102 65535 f
0000000103 65535 f
0000000104 65535 f
0000000105 65535 f
0000000106 65535 f
0000000107 65535 f
0000000108 65535 f
0000000109 65535 f
0000000110 65535 f
0000000111 65535 f
0000000112 65535 f
0000000113 65535 f
0000000114 65535 f
0000000115 65535 f
0000000116 65535 f
0000000117 65535 f
0000000118 65535 f
0000000119 65535 f
0000000120 65535 f
0000000121 65535 f
0000000122 65535 f
0000000123 65535 f
0000000124 65535 f
0000000125 65535 f
0000000126 65535 f
0000000127 65535 f
0000000128 65535 f
0000000129 65535 f
0000000130 65535 f
0000000131 65535 f
0000000132 65535 f
0000000133 65535 f
0000000134 65535 f
0000000135 65535 f
0000000136 65535 f
0000000137 65535 f
0000000138 65535 f
0000000139 65535 f
0000000140 65535 f
0000000141 65535 f
0000000142 65535 f
0000000143 65535 f
0000000144 65535 f
0000000145 65535 f
0000000146 65535 f
0000000147 65535 f
0000000148 65535 f
0000000149 65535 f
0000000150 65535 f
0000000151 65535 f
0000000152 65535 f
0000000153 65535 f
0000000154 65535 f
0000000155 65535 f
0000000156 65535 f
0000000157 65535 f
0000000158 65535 f
0000000159 65535 f
0000000160 65535 f
0000000161 65535 f
0000000162 65535 f
0000000163 65535 f
0000000164 65535 f
0000000165 65535 f
0000000166 65535 f
0000000167 65535 f
0000000168 65535 f
0000000169 65535 f
0000000170 65535 f
0000000171 65535 f
0000000172 65535 f
0000000173 65535 f
0000000174 65535 f
0000000175 65535 f
0000000176 65535 f
0000000177 65535 f
0000000178 65535 f
0000000179 65535 f
0000000180 65535 f
0000000181 65535 f
0000000182 65535 f
0000000183 65535 f
0000000184 65535 f
0000000185 65535 f
0000000186 65535 f
0000000187 65535 f
0000000188 65535 f
0000000000 65535 f
0000083268 00000 n
0000083494 00000 n
0000269114 00000 n
0000269418 00000 n
0000269694 00000 n
0000269996 00000 n
0000344369 00000 n
0000344544 00000 n
0000344726 00000 n
0000345028 00000 n
0000401591 00000 n
0000401644 00000 n
0000401672 00000 n
0000401975 00000 n
0000423302 00000 n
0000423347 00000 n
0000423375 00000 n
0000599759 00000 n
trailer
<</Size 207/Root 1 0 R/Info 68 0 R/ID[<A364F78991C92145B0AE2AC18064D6A1><A364F78991C92145B0AE2AC18064D6A1>] >>
startxref
600466
%%EOF
xref
0 0
trailer
<</Size 207/Root 1 0 R/Info 68 0 R/ID[<A364F78991C92145B0AE2AC18064D6A1><A364F78991C92145B0AE2AC18064D6A1>] /Prev 600466/XRefStm 599759>>
startxref
604766
%%EOF","","","false","","","","Not Verifi","Active","1","","0");
INSERT INTO login_credentials VALUES("1","Severus Snape","1234","Faculty","GIF89a����    	*6)6'$:&.&9"-)0+2FM&I*W2L3Z)G+V4I7X,e6g:u:g7s$S)3N%8Y&:e)9l
DxCiJrGw/GW(Fh(Oe'Jw)Ty6Ku5Ui7Vx5IhC/<L9HF9oQKRKUjEYxPgvcP\mViplr:�	H�K�M�T�X�X�b�g�g�'W�,S�&[�7Y�$[�)d�9d�7g�5m�%i�.p�*s�6k�9t�8y�(f�^�l�s�'z�,s�'{�6}�J[�Fe�Gi�Gu�Up�Fx�Mv�E|�k\�ls�C~�7��;��,��,��5��5��8��<��;��;��5��6��7��:��;��;��=��:��I��U��V��q��f��l��C��B��C��I��B��E��J��D��E��K��K��J��M��T��S��X��S��T��S��Y��K��S��Q��Z��W��Y��e��n��c��b��f��q��d��s��h��z��q��{��z���8;�is� #�__�v��v��|�����������������������������ϝ�֪�ȹ�Ľ����ܓ�ۄ���������������������Ƿ�֯��̐�Ŧ����륣ϑ�ږ�ý�خ�ݱ��������������������������������������ǹ����������������������������������������������������������������������������z���!�d   !�Copyright(c) Blingee.com ,    �� � �	H����*\Ȱ�Ç#J�H��ŋ3j�ȱ�Ǐ C�I��ɓ(S�\ɲ�˗0cʜI��͛8s��ɳ�ϟ@�
J��ѣH�*]ʴ�ӧP�J�J��իX�j�ʵ�ׯ`ÊK��ٳhӪ]˶�۷p�ʝK��ݻx���˷�߿�L���È+^̸��ǐ#K�L���˘3k�̹��ϠC�M���ӨS�^ͺ��װc˞M���۸s��ͻ�����N����ȓ+_μ���УK�N����سkߎ�_?�����(��x��SNq�����˟O��m}��Էo�>~��O��g�c~�~ ���`����ށEކv�ga~�
�G�^����Z޽�Jl���l��w�r'���������r�:�t�Z㍋����|��+o
&���8ؐ5���=��e�kY�_�%����Xi����1}��A4�� )��9�� �r=���>�z�/���[]���=��cF�C*\p 
4`�,��Ϭ}.�*��R���nfd:���Gr3Mj<��
��:� i�l��Vt�Q��4����������� wۇ:�� 
c �^	����f8���s1�ed���"#!h�z�Sa�dQ"�zPM����Ӥ#��)@h�Ć~A
��� �=�A�Xb��#FJ*�B�dL{:�=��\�Dz�}�ӫ�x����ql�3Uό����͢�"0�B��Po�A
N���`�X��
� �ю�,�|B�AJ��ꕈ?�
O���FY��B�PyP*�%y֪�뇱�Y�@�f@GYWԢ��:e��>�� ��GhhCŰW0��z0��
X� � n7��E�K�+��X�'	5�Mc����骴��$\�F[�` x�<�Q��	��E.0��V���&P�@*��D#4��1��8@
`�q,[!�w5tV9�@>+�8F"mw\[}���y���o���'��G.p(��*D���3 �@v�$��1$��@f��U?�各)k�s�B&�0�z�͉tg}�#Q*#�ԣ3���v�"�/��[�ю�ƃƵ���~�@�3�x�p�"*� sbc`�&PK�!����ݍ��R1��3W�{ԃ��:؁�t���&52�qZ����P;��NW�a�����u����8��'D(N�V�
��Ԙ7F�t,?�!�(�"��JT�К�CZ��, 7�2
+����+ڰ�;}�v���E�`�0���L��m�� 7þa�Y�b�]�p1=;bѢ�;8G�4�'=(ق�ґ��z�	�^��� lB�ۦ%�HDb�h���X`p��Wg i�H#�G�cv�YĂ�@��� ��@&ȺV���@^��
4P�
`��k�@
^��0���z�3�-6�����+�F���R�5��M�%(�	U��@�7�!ۉ�|!!sJ0B��y#�=0�X�����A��P;tX�c�������+0�	Z��ދaF
�0kF!\�Nf�a���r�M�'��o �'�����x0�	��sD���yG�P?`}��"��6N�61�6�wk#- 0�tH���	x��w��|H��@����_�^���/�a��#*Y.���*�G��$�P�5m��~q`�`��~���p���w���yC�+6/�h�*=�}�oN�]�/Puf�ue7�L�H`|x	����	��s��	�
�ȇވ�t��~ 00v����p=�D��k.r��H=n$rL ������hvp���`��8�p6wVh����-@v0`���68 �l�0��w&�- -�`(Ќ|0��h	�𒙐�	� 
��	4����	�p�8��ܘ��0��;g�e�0 7�@w#�AA�� �@��P@���Xu0q0������b���me銊	�`���g&`G1`v8v`q�����F�W�w	�`	�H�� �� �1)�5�������	4	Ҹ��`	~�~��{k��0tc�";"IA�V�A�Ip�T����Z9�� y i��������y��`�Ж�f�|`CDn�{F�W+�'��xؓ8��������������I��p�� 
� ��(��W�+������OO�3�T�M0�YtPr [I����8�OXby��x �q��+(_�0�h*��Fp(`S�� ��p	���ٹ������-*��)�0i�4Y���	����鞠� ��6M6��a5
�_�v ��p_�y�^	��S M�uL�	
������}
��y�h	fA��l�b5AD� q��ZZ\ vp�^ٯ�8����	��i���x�9@��H��G�/9�%���`�j	2笋� �{j��@�Vh�|�s&�y%:�	��	����
�� ���	�	e�sd�����n��ZJ�n���b0\@�Yl��s���:�Zٕ]iY�\�s`��x����c ���yji����j������@����P�V	���V��xK��:���	�j�1��8Z�5j�����@�c��"�X7FJ���%�`�b ~����گW��Xk�Z��`��v �@U %�>����y�(	����y�m�P��[��G��ּܶm��λ��wy���*��6ʸը��0�Fz�f��� ��/Sg�M0g@�Q��u�j�ەPl��ۏ_9�z@A�F�@����	��.y�n[�λ�

�P�� 
�G] n؈�0�Uׅ8� & z�PZ��������Q
�̕q�\�x̰K�����`q늉`	�yeY'����� �������G��Ǆ��x�����׊�+sv��8�3<��y�5��7�h_�fg�eX'��$�mEEA,��D| �d h�� �� �����K��{��<���\�d�>0P�A����!�ĉ�'����b�q�����Ohzx��Z�:�u�ƊPyՋy���4��2L��p��p��f�sfk�ew�E��00S�VR2��|�r�L�����L�VK��;�_Y���L
��G����p	���Ï�	t�K`�~�n|�w�LVs#�O��,�3�0F@��g\���~[pm��S+�T+���^�0S�@���op�׼�R�p\��|m�[ꏥH�|����(�j�T(��p�8�	;i�<]���	��`��B�H�a(�vl�����գF�2v �׶��k����Uk�Q:ֵٕ���v�+z 	Ɖ̩��x�,������������v<������ͽ��	�����+0�ٟ���$�p��j̐�$���!� ��cN��(�\�ʅ ֺ����N����T�%�z`�N�,�y����������k����{�2��&Ί� ����59�䚇��}��/0 �E��R�0��5 2�; �p��k!�Fɒ�`F@p �y��[��[���X,�q ���뺅0U�= -���@	������	���e�x������Q<��؅��h		�g����5�	7L��@��h+� �uap���Y�P��
9���� � 3P;�w���V%KN>�p8��U�.�t��w��ħ��d��+��Z�g<�z0|��8�`)�a
��
9 �� � 5 �L��HХ?��"МHK��y�}m����*�����ˎp?܀ ���u �����H�}����`��l��a��˕���~giy����	�L��職�	0P1 7.)���"x5�� � 
5�  0�Pz���k�#vs�S&PU w��y��t�ā�����[y��\ g��,ߎ� I�1��.Ų\�T�����R:�~���~��~�{�,��0K�������p���)��m��@��
����������;�2 �3�PV������-� �o�K��{��������q����_<J,źy0����V���o�~��x~�b.�d����.��>�ll��� 1)ӥK�@��)ԧM���H�ݾ|�,���>�=~R�H�%M�D��$�~�2�ۧO�9��s�6w=�m[fkՌ�U�>�;�<ٔ]�&�L���:���	���u�5[G�Z�q�:��*� ŉC�Ν;d����6�Z9u�><8���h�n\�q�l�ع<G�f���M�P"Ғ&�&x)S���?}����
��ݾ�R�n޽}��_>}��o�6�?�o��<�2Y�r<��\^?~��d��)�~���
QV@\�Ё�6����U+�q[*���� 2����R?�kK3�;����#��L�����B��zl���#D��HK$�HN�D �@�ē�^�db�&���
82�Y��%}�e�^��x�o�'m��F�eZ�A�r��}������gvp��'�H�
��μ��s�L/l�A8��lDD��W�:�����D�,�;!��`��BE�0/�#,�1�CqUK,Y-!?�/FX��X����a_�9f�X�H�sv�i��y�Yg���V�n����h��Ɩdp`Yֱ�%~��$���N�{rYa����
�!H9IdB���<����xؑ&��u� ����G:x�*��ăJTz��T��l�w׈FQ�4��!N֮�����X�Х2 "p`C�$�l�lH"�2���k���׆�/}�`����e,w0�7<��3v���0�/��bL^�7��2��K�@3E0�r��D#|���VyA�0A�A�"��`&5)�u����, 0�V�Ä�<���otÕ�k!�q
t��LWۡH���d�a+���0�7�aT�é8�!� C~*�a_j���>���
�V
�3�q�sX�f��)7��3����G��3���$�O����� ���]"
�'���a���-���>#MiΘ�rY�l<S�S챊Q�J�S�hgj���2��6\�4l1m��a�6R�������Ј���>u��Z*$6k	=8B��&�98oQz����I�����O�x���Q��py$�G0�Tc�>� HB̗
��'>ш$p�	���#�p�l��h�=��s�[
=��˅7,�
4��n�~��C���8���B:��eQ%gq��Fb[�`ɍ������97��¡��q�%����64��ً�!� ��h�P�	[��q��� 0 ;�E/[�{�����a��u��u�PNhI�oȔÐ�ݤ���JO�Ղ�,r�O�����p�a�tOQ�Q�$�7p��Uh[�� ������>�a�	ۙJ��� �ű�]�$����ܰ��,�᫇�W�{D#8A�t@	�D(�	?xA��2� �������>��tK8�I�G+Z~���vwxlM�ԠҠ�$��@.a�����~ȇz����%0��!9м$��k*���38�fʟ�#<`�7����<�����C0����`+؛�@��B(��!��9=R"��Eq�����F� � $Є	�MHЀx�����H���-�#�/숸S��Ѕ��U�0iH������尖��?�����i�g
�@�t ����ȍ}@69=.�6h5��&@p��!Cg2�9���@b#�2�Cp���7�"��-x�3�X.8  D�=j�,�6(ұlk:E���Y���F��2 ��Є?p(��e��p����>O+���k��y3�"�Y%Yp*�6�7<ܑ�J��j��j��h�\z��Yȇo!*��7A����s��4H�k:ͫ�,��z�*@D����L��
#��'t/SI7��80�6�!�"Ȃ������&�g���p�X���2�X#�i#=AЃ%�$P�I��O�'� 
���*��8�1�l���q�C��8H"���"6x�@x���*�""2���) �@�.�9��;��2vь_+Ɣ�
��A04 �G���M�� 
�jJ�n�GЃ)X#0 �M(�4H4@Rl��K"�96����遢E��� �6��P�F�ᄄF����
��T��dJ��,T�z������S1{����U�	x��,Knp�6E8�����v|�j�KM�	��r )1��_:X� >h�3 �;��5��M�NC.�����q�0���w2�'�&* \[�(p�H@H51X��	�UZ� � 7A=0���P��7H"a�=���~!�J~I�@�&Hp�Ax5
� �Fh$,e� ,l� �ӫ�?S�U�Y��� �wEO�����9��{Oq��s-����x TP_�-��$��#����>��T���&)�* A�5B���(��6��P���@��S��*�@�4H�u� Z]�� 
���T�0��$�!�=�I"�0h
8 
��ۇy���\DdD��͞� 01��!���ٿ�/���9�4��(��G�T#�)0
�#�
E���6��@�G�&2�`����%�
(�%��)]"ݶ�atR&E(��D�ZSP=@��U��k�^87&�f)��g�gS��>Q��D[��$J�(:�럾�� ��6�8�m]Χ�>6�*��f��f��˓�{HYȁ@���n�	Wr8k�4L������Jˆgpp�@1��!�
ݓ�'�� �18����;��K�!�"�H.8�����8�Ѐ0� �n��b�,��RS(�)��a@�+P�F(���3y�y���k����o<�m��nu_��t����p�+�}��r@�`�hh�np�jY�+Y8l����L<
:q�!�R�X�H�AH520�

��t:$<le��nX�iH�؁�Wxs8�����$� �A�� /H�1p8B2XT.���A#8"�9�8 �!�'{���(쥧���gbp~~msr�v+��q��&kP�8Qw�So�@Ⱥ���[<�w�%����`���G��/忿��0��B)�U��m��[Am۲YÖ
Ɛ9ӨP!.\�p�SGN;v�:�j�*֬R�ԉ�'���
^���V��_������ׯ_x��ݛWo޸t��6
�`���
u�7n�đZ��:s���!F�M�Ĉ�]ĸ�5��ۗO��}�j����7��/n�8���u��W�_?}�^���۶n�]�V��E��g�8���m˔� A����ݫ���K��g��׿62���0�@�c��` I�A�SUQUfZYx�v���q B�&Lp�)��K/v�5�`w�؋}��"]z�"b�9"��0��"�!��ѡq<Xr����"�0�TVy	��@�
�ԧ�n��Ɯri��&�m�9�}����2:�b�6��E�hcQCQ$Ead�CY��5�(�CI!4���b��o��Ï>,�vO;����L�Ac�`!�H8!�Q]X�T�`�Y^��FS����$.�-)�2
�|�Bc_5��w��/����/��XJ(�\b�a�r�1��t�$�% D9啧�Ѕ�	@ =��t&�o
<0����L��g-9�J4�N8�n�
3�P�
�S\�(L`�/�A���%������0���(����p���y���N͆r@P@A���B����%�$@���0g���|9景�pL�����@#q4�|#7�tǨ��7��]�M�"c3�5�D����i0����J��v���1�ߧ���@���AWA H�ȑMa�a���S�֡�S���p���}��8�b�1��˲⿴Fq�k�Bn�/�2S���pC��6��\\�6 �҄�p���ؠ1h@l��Q.7��c(C���%�x�v
���M
pЇY�#��K�~�c
!!�L`7�1�R
d��ny1�ٚ�?��t���'�Ї=�a~��'ba�kPl>��d*�8B�AZ�>��!�A,gyٰ�RK�\S�*^�Bgr�Yt��
��#���7�ә����Bƃ#F��G�H�!`i8C� 8��0=�a
b`BT�Px�@F=dV�c� !��T��Ȯ�G�������AS��Ӭr����t���w���}0�_J!-��FҒJ]:����-�oq��d�Xl
^�?�EoY�)JA
O
TH�  ш=��Ip�3Pe��-��M.R�� 	G0��y����@�\eV	_Tr�6��
L�	���6`�Hqg.���od@ݲ���
\�
0@��� �� �3AI`a��k㦗�<u9��C$3�A���G�N��7X������6��(��jl�]���F�����5����@�0`��n�� h���M�.�\Ȧؕ[;�x+/���~c.��k7A�O
�p�ť������IC,��T���� 0 �� �B � `�EK��b�B& E�O#�AL@��ۛ�!PmPj���̀.$�<u���`��^nLtȄ<���4D7�W|�C�q��t��5J�Ɏ3]Ӡ X�N��C4�
T@�T�� 
�@����
(  �@
������!����e�8�A>MTdHB�K�!�hME�[$��_ Fi��	P/\b
̛B ��,��+� @ @K�� 8�*� ��-ȏ�C(�%@� �d[���@O��uP��,�CTN�x�I.1s�-� *�\��C4��v8�7L5�B\�L��UYNDT�7T�4ЎG؜
@L>`
�-�rvB��!�E�x ?V@,^�uVW��
��`��G鍧��	s܆>�>�B
�F�ݲ��-�qR)��<�ĦhJz�� 8����^�� 4��x����$��~Ȃ����k�ٿ&�A�"Z�,�"���:��^��3ze8t�7tC}*D˵��eZZ.J�zL5h�Uj3�e+���� �!t�"x*��*�B�"��$�%$�'��&`��B�\R ����Tp��Pб9���� ־�^ą��_`�����k��J��2)L�m:�ܚ�^� �@�܂��((� � @����n�����,�W�5��
a}����y�Q���>jC�n}G�V�3(+5��
?��@ܾ/o�d(2��|r*�)`B�� ܪ��
D�����
�F�-�"��n ��4���BV1#�fΠ"��aqc�t5�Q��L�3�p�~��( �! B!(�#TB-W�"�c%H��z!$�2$<�H
p@� (��"��Tg5�����N�S�Ep@���t��M��M]��%f�:`K�/������.� @i'�$L�$p��
t���0�"�
Yȫ�@� #������K$�"+�s,t؃,<�:��v��Wj�"*�d��^��XȂ�31Q5D�4�
�l�)�N�,#�#��,S
\�w�*�CS1tC3.���#�44�,h��:�g�7�e�g�]��7.J�8*G��*����*�	|�@X([�%�����c%�p$��h(���A%�S��e�ϹH�hF B��@��O�l�7�EW�/�)q��A@�n�}��� �['Z)�򦔢+�e��y�5&�XB_�h��+�L�b'��������	F;#�h���'�0������9S4$�8�v���
�
� -�C:��+<)K�s��5�'x��Eb�>��2��+�E���4���~$Lx��#�=�i
��V����h�uE�I-T�
�@AxB)�N�`�����_Cb(�ې���9�e+� ����k<g=�y�g�N&g0� PHF(P���� -��(��t�CȡB4���QL3b�A�whåm���g,���M�)��3�����
��l����6�CB��,#�l"@B"8�k	t@	LA#�*���Cf��S�@���'��_7b�ٴ+���-���w'�w�� �s��-Y@p�u�- ��Bkr����IdP��wփ�%��/���>�)�y��\�G#v�UH'zz��x`C5���5���X�� �@�A�����0$����,$�<kl@H�A#�(}fqf�/
�|o7��d(����D���@����uJ��=��?tk�=��>46c�[v5V@`�f�`A��e#8[���V�6m�3�Ϊ�*��Ñ)g���c�N�;y� *�2�#H� 1�)��%I0#Ar4I�
=1*�����)��z�����"�DB1E��J9KD�&ĳx���k�����Ž���F������e��L	2P�Ђ
*�8�l�&�zJ�gۨ���+��R6��Y�lq�8��ᆹ暋������!��n��ܬFOlȣ�"gZi%=0�b�3 a�:P��>�!�C���E���P#6�`���B>�*������*�Ў����C.�j�F�eD�2Q_xᥗ>2�����^�1/��QF؋E>�Ea��.���	0a�{��Ǵ|L+M�w�W�+A3��fS��ʄG9p���n��.��,�N���na勉������@uP��#eC��X��B)�A1�R�X6ĐGi�2|�Ph���$�V��9��
*�萣)[1�<�eX�>��RJ�^�x�.^� j싀�3�Y�`q?|��� �"
)���3ڙ�����g�y	/��ù|��W�$.92�ۦ9o��)8���K�����\�>˳���% A
2�X�Q�V*�A!���U�OE�dH��2P��xr�U�Xt�9��V�pu֦��jSJI�׸�º�a��Y��/��zQ���0�L��ǹCI$�*�� �.r��|��]�:�����+�XFr 
x�'�
����C���	� }�R?��H*���dd����U� Р<���3�kߠ�s
�g\� ��x����t�qaz$�*�A
>�2,�p@�-�2�4eQX�e$�򕯈�WV���Pԋ[�P�_@ �1q�� ������K(:
OPA
F��
�`�C*r��t��C�%D�3��,ԁIx����7���bg%4����Z�"�p�Qw�Y���(�
+q �Ow�C�	1fC18�����	��
�(9LO�v !7"W�9�i52��X\{�Ͻ8��̋ ���y��0_s�|U
R`-��B�@
�l���@�& �@��� ��
����y�{_�Yĸ-t��qɀ�f�e��k� S���/7��-��R�1��������R�h����.���M��L6�؆7.��� L���HE�Y�|g:�1-j�d���2��c�mN*�� =��� �ϴ�=�!�FXBJ� ���Q����8`�i�0�B���%˿�Z�z��U�p}c��R��̷.H��_��{
C�	�� ,�

�ͫ���XaV�ݺa��X��e�tE��ژ�[6���Y�c3�yF^ ��ث(�0)�� ��������f���d~��3 Sq@J&��ß��6B��D�%.�i�!
�. x��(25����̮~��]�p���el�L�2�rҤ&�[���t4��j<��`�O
�v��@�� �	X��rg?��7����	>M=h����/�4|7,=0n�`&%�渃ľ�`���A ��Ԟ!�΃$�#��V�
�(� 
2D
���~�-���,�%�� �Hݩ��Et12 V�	o�Gz�GHA
��,`��L��q���4���t t`������$4K��;���Jh/�CN��O��#�R�	���Ni�����M�`�
-aD���:�����Qsr4�'��  f����*�8��	f�:<�!!B!�`�#�0��ㄲC�\�ޑh@
��)q�@�Q<p)��:��c�b��c�N�F�$���2���
�@���H� $p��@j	o� َF;Ó�fez��y֖�+�rv�i��{PqU��p���L���L��N��)�s�n5v�s�W�@�M�z�4�ad@v`��q'o;fw�Bɳ��Or�bV�kY����kA ��Z`	��	��_�æD�a=��RN�B�Hc��%$V�w���T�+�"���"!nun��p�e�V6�V�eӎ
eVȦ 
`$�``�He�0�TNi � ��b�� i�����V�2��LWֈw}�m�ɴ�!
�@	� ��V��l��*$�4ٟqxQpX*�Ǻ�J
� ، <�`�p�M����y�k#�H�t �f ���.HL������!~�O�
��
b^M�l���ک��n F 
ِ7�>�:���V�Y��	��tln�1<q<y� ;�.;��c�R-��r
���� 8@T b�O���%{�V�oC���adA5e Z᦭񙣹 
U���*��]'�"u���Z�ə���Ơ�����D@,`�%�#����&
�@x���	ހ��RBXe���Q޺;� )>o
��NP�[�@�[� � 	{�� ��nCu��8�'��g�4 )4��f�2tl!��?(�8!Bk��:sTIi�w?��I�ĝ?o@$�����
��	��:�R 
h�h�;��M!ox�`)��:������@�@
� c���h�dn,*jG�� �-�,]�mq
� ح�ʅ`��@�����r�ruOl�мګ�]��|���r`�!��_a�#���)(]Ak�#� =�$F������ˠ��p�b�.�x�h��9P ��9A������ԍ�V��XE�r�T�Z
��R�����
j�ey�bF'REU����;c���zF�ץ��\�����}���H�� �-5p���%��ׅۙha�}�PW8&��l7�[DmSĮC"�Al�pA�;��]	�ݜE`���
��Y�~�| ��껾����	�`
yf,��>Y����~�K����Y�?T"����
F|��&� L/���)���1��W��2N���?]�K�h��ӳz��0��@w:͜h��L�B��T!@ X]@�A�РY�AƠ�%H$�wP�D�A<ITM���%���0y����g�@u`	eCڀ"Q{u� 
� ��݂�`�0x1�Q��/�@
�P�}�cR���Ɔ�/r������#�`�2f��N9��V�
Y�Q���A
���f����$
	CLB�,�8`�%�+'%8�а>h��1�^ ��$�(/Nڇ0����Z��f�t�4����W8i��֤�5��Nj.9��:�A8΂�@F2/��k�8!��E B��d%��E�0�+WZPLR2Lk��pX�tm����O���� �/v9Ra��&=)1>��`/�[S����t���_�nZ8����Շ~
?��R��8��l��`�
�����O*?� /��.8+��B������7e8�F/��Kj�ȏ�r�6AmqK>���>h@~Ш!�`< �wް���B��W
�9�jf�������vE)|�g=��σ%)/����n��W�.�%~�����{v�"����^P������"���Sc�ԨV�!
A�C�AV%��ٝf���\��誉\�z���.I�][;���à���gK|☊��&-*�T3��o;���Ԙ�0��`#�!jfF�n{[V��Մ�!nn����7��Va�VI@B��)麇��2��6�m��(ꍊ���K�K�k�BҶi\��>FE���2`��k��&��G8B��^�������\�8�y�qn՘���)�Z�����|}]�.��g[J~ϣx��Enu�a|�１/����:,l �	h�	k��&<a�GL
� �"�jۛ���v�C�kn���\�qX���`�w���+��"�54 }���_���=G~�E�@��b-Z�����m�A
�Å�X����p� hT���>n�q�.Ȇ���5*I�>�;�  /�c�Q5�4�0I.�Ib\h�G��9�u`u�s�(�9g��5[��;Q�|��	� WK�	�7R*���!y$�>4�}谂mH�lh�	��P1�0�c�SP�0I���0f7���|J؈�Xs�s�Ȉȗ�v�`x�;$d	V�P��@��`.^���|���D��l8��E�Y����E� ��f p1pI�_@�0	@�[��V�\z��sN���h����G��h���&V�t	6&C �0�7R��g�0l��������09�?��W~��Z�0v��7�Ip�H+�I��;�s<�.�x�L�q ��8�����s9�`x`�U �5_�@� �W-	 8�����g�`�V􊲸??�@�_	��`*p^��I@OD�B]�a�\��{6WsY�rP�uPr���)Xi��IxOx[X��*��S�z �/^b8lv9E8��a��q���Ek���	_�� ��
)�:����ID�-�	fDH�w �������r��)���8�is	�s��B(@���gP�
�g���@EP)hLz�ɟ��_�p�``�6 >��)d�ْ5d�e� �Hw`�t@���s�l��rࡡ��Y9��{ʗf0TCْF�|����p��a�d�� ��k�([d~�)�`4*��>�p�� !`>��M �d�	S	�\C8��@z��s�s��X9���|�J(����Р��	|� 1J�4��3)h8`�V�j�c��LC*��S0�S���8�3�^��M���Y{B�a�nH��ץ�ə���N��t��������Jxq`�pa�T	iyr�5
+��"h2鎽��7�=� o!�u�����h9�����;�������Q���<�vf�v�]jt���Ym��6�*[ t��ڝs�Z驁�w7���U	| ��t�s����	0�&P,
����zї����z��)�R �_0�A1Mk�w[�%�x`��Ǚ������6j�[��������ꩫ�s��;��a�TCd���W4z���v0&�/�^A����_+!B�p�}`^�L@�_�ڠ�`�{�{�ʙ:���.7�6X�Y�<K�����j����;WfGV��'  Mkg�`��)����fb��0�m�W�^���0�S�)� �IɶA���Fw0�����v�ڙ�
�Y��Qj�X�����(|u�w;'�F��p	|�C �fg$��2Z���iK���5c�Ȱ���]+Y�K��Q~�:���L��]�n��]Ҡ̈e.�����I�Ԩ�s�Y`�V�Q jP�
��ؼ�(i긊PtS]*���]�P
�(�ruL0�6	��c��y@�?�[�;̬�����
IlaoZ6�O���J�����K��Y%D��J`Q��W\�1{�Kȸ���5�N` ��b���	XX��j��y�	J[,���C�˼S�>�E�P
H��b��]�f�pe��{�Ģ	����匷sp[�\���J@4[|�������ɕa|� ��U��E'-0�+p(&��	CP�@@h�s�aȨ�g�7�;)�r_���GFl�6�3Y,�bLS�3W\j�%jž�����x��=��a�Q�E��:���ܙ�Gi�`ɵ=�N�z{�W(�k�0@�C@i�X�\����-p�BF@5?�ֈ���fp p����DC5Ds���wP��I�2m��K�\p�AJ`4,�<A=�<k���9��X|���0V=HJѵ~ E(f	K�?@Q�;�a-����Pi��m=���h����a���Дϙ<�����JX)m�_ٝ�m���܅p\�d \2H��q��홓]�m�s_�م���0�5|�P$�p�X�D�Y�qpy֝�_�0`,U���ָ
�E� }�1�-D���M�L�c����\Tآ b{�	�`.��[���5�P�	��(��`�Ӻ`���Z��6� 0���	����U�E�� �8{�s=N�b:�<�u �	���V�-0W�]Q�Y��홑������wj-���	4l``�,�>pD�y�"I���5M`}��� ��t�d�@`��	D��	lN��	|J���I|�y�L1�:�� 
�`
n	�>�sUՎ������/���]	?'t�{p�i.�4�Q[��9�Z�����0�:Yi��~�����u���7�z�ßT[�Ų�y�y�:G�L��[���J��W�`
���v�z��?�R�j ��
�P
i�엮	��Ppr�kСwŦ�n��;�xIU~%S ��[��[���s��	WSn��+���Yh� :|8�����l��f���%ݪ��Y�	q��3ǎ�9�L8�5m�Ic�ҧ_��X��(K�>I�ЃJ�"X�dɲ�
e*�_�:~�iɆQP�d�E��:�g��I���D�1�YiQ�E��6��C� Q�d��F࡛UUR4��%>+^�JƮݽ�f��3+�,\}��G� Ю��zlAt�A#L�����'�*���"I$Dp*Ď;ʹ:X��l*���$��RL��J��Ozԣ~x�+RbI��ؐi&:jR�&����:I$��F$��G�⇒�@ü8ΛꐪYD�I$�D*x�3���X�����aGO�̪�.��I�.��PBFu�QH�L2��y%��d�E	��;iR���I5'O����ɴ8�p�Qj��`n􈔏@r����
,�X	*6fRV��rN4�뉑LB��Gq(�4i�4��	��ԫ�MI�`b�
Z`A0�>zag�vr�Ō0�ȥ���	p�@�B4R�Vxa	#s�.tp��N �d�!׎�[����V9���P��6�0�VS�)W]?"��=�(�	��$ɗ�lV���p.)?�NEQ�E���@�衄%��Ð25F�J���L�J0� �0�`��/b!�lx%�@�K�Zr9��{�ʧ��e�p�W�B���P�16y��B�ăb��TM\��Uˤ�F�K��^|�q�O<٣�
R����(I�$S&DYt M�V4�9����:j�=b'��	Cb:h��"�U�GH�Kp29щ,��&`���� ^X�� �����žR�t����jU��q��}���
��$��R,��z01�AL��d`����$��*`\������n��� ��^eU�&7B|��X"ր0�A�0#�چ6l��*Y�Z52)2ei��%J����#ī(>�	'|�
U�`���Ȑ��T��R��@��*>TD��3�FL�jzp� ���PK�x�D#� =Db��8P��,hA` 
Z �Gk�_��&��
�K1A^Q��ǣ&5b�2��� /���"O$+y�4
%؀����0C;�8������\�[�c� 7h�V�5�ʰU-Z�<�:�P"4
F0V�a��:��'��!� �E��K^b2���DL�Mr�I"�[z$��4A�σDg�̕�� 
E�� ���,V�'����L� 	b�C#���
B��u<܎��>�0���+�`Xm+�Q�M�H������(���.#s��y�:_��F���0n%@�� ���B(�t��p�S���k��A<$�\�3� ��Id)K�P����F��'X��$���& a	���.��	@(�T@X�>� � �X0P�n ���{�����˪��~�u0�P'�=�HPzR�ш!�q��ދ���Kґ�8(���^(b��O�' ������$h�)X�A��� 
��u؁Ȁ$��x���i��X�:�	�bI\���80�`��P���|� 0�0��L$���#*�L',��� ����)��$2ЃjF's���`�EC�,v��c�	8=�E�'��Hx� H�H�B))qd3q��&hJˢ��I0�
� �i����QK
Ϻ��?�` �=+�D ��@��8`��+�H��'��H�`@L^ �D?Ǆ�`4؃=�1�7=�3���A�7���qC�ɤL xE)H�A!T;���*BA(���I��d�/p�͐���oӃᤂA�L*p�G.(�A8�}D�3�:(�'N x4�N���N+}���={��h�M@)E�%GȽ|��eA��C��P��$O�?؃��	0p����F�>�QH��Cl�&�F@0E
 CH]���
IZ�y�Dp�,���"=8�6����I�љ��%��*�QG8:�!F�(�6(�(��)p�ں�v�R�ԏ+]�F�Sk~�X� 0ҔH8�E`��(��!5�E�A���TG���^�S<��X `��Au@���C�bt�
k>@�mD�/���8�	�7 `�j��U��`|�(?��J���8(l�k
6�=@�@pE晷3�!
� c�Trl�$`�� �(p�'V�
�d ������]�C>ڇ@��>h 
`j� ���$@� h0�d�� ��s�?�H��h'DY{�vx�P �_8��
Ѐ���y�a>�� ��'�vX#`5?`��.s� �p���T�!�6�G�6#>��0P�IO��M�I �b�`��,No�Kp>�1��b�!·C1�m=�I��j�+r�
�����6��C�GH��b�0�B�% 
�ΰ��p�Qw� #P��l�QY8@9:��<�
Ep(�n_7�pN��K�x4�X)��� ��x
v&/��� F#Cy���X�@�Cpǋ�����μ�Vs?��0D��\����M�
w"'�ZT2�������		��xu����:�|��Xj"�H)	�w�%�e�;@�(�:|S?#@>0K�*�Y�S
A�		�cgN9uz���{Np;�	!/t(B��$A^IQ��"L���<y��d�1@6��iӧM���($
pQpD#�pQ��($($U�IR�pX��prI$�<b!�	���U(��Ega 7���,TP} ��W=����gDz����ۮ�N
/?���Yh��SO>����-x � �("I"0-"QD�9Gu��mұf��H�����YG	%�=T!��ۡ�HzPe�F��gy�DGy�� p�1f"���BM�**�0F�1n"z����ډ'�|���IE{ȇ�!��	d��,0$�D0 l��_�PA��ӎ���[�=���f|e���C��`F���e�I�>��������/;�x�����r��HDm�Qfs��omb��ql�f\�rZ�v�#T�C
o���2�Av����;6�wā�x�0� �V�{H�Q����bAc^����e�$O��,0x�&��% �DP�j�`��r�3�oA�8�>�Hs�j�G�I���'�+Mpb|X� �C���s� �I��sÀ��2�1t�&�C��1�{�c<�ai�9��0��T�e#�}�s��Gh����%̗�na

lp�<��L�c"�p�;sg��9ΜT��w�J!��'r���;'n���@acp�
���`
��ğ*�C,�6�a��P2@�#p��@"��Iu�x$#2�1��9�SЄ%���$�� �֠7p�
(����J��_�*�^�#��H�.u����p)��_d8̫b�0V�07�B{�+z�>�4��#��\.`@ T�Y��!δ �̎v��X���&;�!b��]�Rv2w�!۹�!���2�FVu(�NP8aM��

��`	��� !	"�e�0�Z[�3���ئ���!�
IAq��j�	p�&4�K`b�R8���4��nY�> ��epA,���[*U�����j._V�H��jV��.��K��@&�lh^�|K+=�+�dx�>�����6�Le�'9�0��Fqb��C��Dō���)�
�a
T��0|�����@Ч���#A$Q��h���'�"��`52EC�*�M��8�p�K[� �?��%xÛV��z)�����C�+��j
o��� �������?OҚ+2��;	��	�>s_��E��ҥZ'�Ԃ���$��p�WcN�xc
C�72o��bm� Ǳu�`�P�:��'�4J�4'0��l�
S������	`��3�����HG��^��ᅫRh�8��~I�e�R_G�w_z��~��\z<�|~Ǟ��v�A@BɵP��b��M�;1�^�µ~,�j-�M��D$�����S�N�J����z��$A[_�n�0m2��#0��m�%��V%�%mv��T�
��A����,��i�:Tx��i^�T	3݋fx�f�^
F����	�U���4�����<�Y����C2��[��<���ǪߚD���-��=��	�
�&t�$H�@$�
��t��P�8�4�[L�
2��n v�:����^�8S/E�_��
�b�b�eP�
`"A�Q���:�Rp@���Yx�%� �� �� $�4�Cm�"X�"�'쁊�@qi�ǋq@������ R��-�,��P�
��-�:���0�b�]�x%�T�P,�$cd}��fL	��b/��/V��;L�Q
#:��`�������^q@�=���T�F`Q��V�`�`���  @A���@A<A�@�@\Q�Dp�ޱ!�@�U���mIAFP����!4!P�B��#|��D�YOA��X�D���`��M@� L��@�2�&2�9�$KN^0�0V�<��by��L�M�d�tF��"�D�4�WL�`��(N�9����
�cPA�=��<Ad� �X 
���_&������e���$Q����,���$,�%XB��\ܰ ������&��Fj@��$�`@�@��j�1��9�(:�h���0���e�I�T�Вg
VghF�Z�1�
�:�0��9�Ï��k"�� <e\'����v
V $�Vne���^Ma��i��e��N��p4�Ą�@|X�iA!��@E.^$^�$�l@Ό�`�����A�A��!�$<BK��Y� ���D����(�h0���^��Ak"Î�Cl��:'��&��f*��W�:�Wq�HTIZ�Ş�i��QJ^��9(%.����uݺ�Z�t�𥜄�Z���
9�\������x��|T����!|
�jq�*�M��R4���j� ,�&-��Ξð�ϦK"+L\4��±�WA+�Q�I�NS�e��i�	��(����k&C,܀ A�J�xGO�pA��^=zj��Ha�ĩƁ��8�Ϲ		���]� ā%¨ZM����a���Z�
B���XB$L� 5��LA#D�ܵ�\��D��
���h\@$�( 4 ��.o���C9���뱾d���4y���_���f��.�2��ORZP)副s:�֖�J�2�B�����nC�-��ﵭۺ��9�=�c����؁��+�b��̎�M��!�]E���� D��M$���1���� h�[yT��A���	.�@A4� j�yTb� � 񁊝��2��fh^@@�p4 (� @
��1/�"o��6�䡃(�b
�!�H�q=��$�'y���YX�HK+_����H(�a.�8h��HOBQ�Q+7
���H`��@�6@0 �7@_s��B�B4x�`�q���Z�U/1�\_O�y�פ��/V���q�j�
vG�.��.�.�B-0x,�	� ���H6hx�4�dv��T9U�p�Sg��̑6V������A�n����|į9�'�� P��|��X��P��t�R�6���B8�GC.As�'�"�#�r�,��Zu\5�w��w�7 ���CC9���w���l�&_S-���Y�,�w�K`�"
88�dÁ7q-�y.�B� �[c+�.�@\��e+4��� �� k�� 2jp�����hX�|��Ԙ�DLg%�E� 耈�<[\�A�~F�"�#��Vf �v%X�#� ��U���y�@@� ؀x@0@
���3�ù9ȹ�K1Zk�8-���V��������̠��W�����58��{>C���a3��K:-d3��B.Ă$�i�^4`\jA���|�&4���2��������m�ʺME�D6��A ���jR :J����x�6x�5
d�W���d�&\��b�#C��D�TG�� {�4��L�c�`�H���.�������É��=m�i����YR�����
�cD��+ZfYo�r�3� F(p+�'l�B7���.
jϽ�����>��:�¡:��'�))�}r�'�uݕכR�i'�~���V3Z��
 :<�t!����V�Ye�C�B�`��{L�'�[���,�'��lD�PR��*�8�m�����3f�CZu3�7�ljE�0�*@A
��S�0��|�2Z@�
!9��_EPC�� �,��@Zb��3��n����n�\���0} 	�B����!��@�� � ����T
�4�d�#U�P���p#���'?���S�"ir�~��$>�����.�>ʚ�:T��lEZ��Ld����o}���d�# �O�W�VQVȥH�.-�E��-E��(�`�H �p��.��Np ��:Ё�`	P�� ��|�A��8ǩ)4��@ϰ���M��#p�	�؇l�o&*�
��?��8��;)�#(�@@��� �A��!㥛��)iq�T/�cҘ���x��Q����P�+~ ��>�5�~�k�+���&!P�mR_E69��(�=��8Rz7��Rv3�X`��T�8k"��P�r)�
�5�r� �% �yR�)�@�&���D��\d��*D�	A�����j�+���N�	LPFp�h`� 
|��4��-,X��%@�
Ap�"h�H����r˷jY+Z$��8�%R�>���sի�ْ(k�U����H�	+B5�%ȶ�F��
G8���
(�B�Ǟ*��lF,+H��O~�G������WX��ha�@VH)�L�jC�cf=�W�mmmk��^0o0K-r�>�6
b`�xݾ8�App��`�6�	<`�}�F�n��ܵ�Td�ܝ�� � 8,�&�l��fC��W�+���A
�^� a�D�,i�IT����h![�� \@n��L-X�������D�< �D�� ��DZj��)+r+��0I��j���"D�#"@�M�؇���}��To�N�V���F�al��P����H?F��bP�Ɓ=�i��p�BE��F�E�cE��4�TX�nDD"�EO��\ F��ƈ
m��p��o��m
,�o ��ǎ��0�&�'I�́i@��1�x��V2���^�3+��3Cp353W~�$F���CBD�XJӒv���m|��BHji,��0����2Z�0��=<�i�n�S|�1�����@�2TD��9iq|:e���B�D�!k���1��>���FANGC/�(�Fm�2?�?�3ӓ~��=��(93�fo��K˴��J�5��.�YFʠ<��j������,�"���dk��Lp6����+FtA���u���BTE�mV�&k�E�1*t���Fs4�x�G�Q�42���&�aVD(��=�sAFզtX2j4��<[���8�V���'� �A"D�*B]�t1EdE�!����Y KV���F�Ys!��;�gY�Qw<�s��K��UB�25(�I=]�3M��B��(�T��J-IKy�T<lP��&Vb;�U_]KZ�YV1CjZwTGC��z4R�S�Fn<-ij���3%q�`n�.3]?�W8U��'��u���#��[so���|�"|�;	6�h�^/P�Qm�"�CaqGC� �1E�"�AI�4o-^��]�c�F��?v3�F��]�&�dSV�T�����3i��a�efӖۖ"~�^�"R��"n�aUa�F5R��>x�h�2�2C:j�1*�biK-�N�ii��G����p�c��=9X�V�R/~���N�)/q^�U�3pS���Vu[�hQ�"v*�Y�2�aq{�T7VbE7�=[��s_/W.ssWMl����jH�dOo4��t�*iCZ�u�W�T+�����[gw}�w԰�ekw)Nw'v���'Wcё�W0�x��V8uA��yS
 ԡ�ӿ�Y_�Ub�g`�a�~��v`��^v�� �� ��؏����<H�=u��ӧ/��|�gq�Ə C�I��ɓ(S�\ɲ�˗0a�	���3!��ɓf��v�L�o�)d� :��5jĪQ @�r|�&� @ 
Ԙ�o �]; 0��V̻x���˷�߿&y8��lβ_������~��T���� j�x���f^��@֬�;���I�\�v˞M���۶�	��-����˗�������L���W �˓^��4eУ@'��
> P���;����c�f���˟O�v�W5t�뷛'����T�h ���*=���N�	��g3ͣ�d� :�s�,�"�Գ>50@j����,��>`f�@�yE`
�����
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
INSERT INTO login_credentials VALUES("2","Ashley Flowers","1234","Faculty","","","","","","","Faculty","Verified","Active","1","","0");
INSERT INTO login_credentials VALUES("235","Ramel E. Montera","1234","Staff","","","","","","Scholarship","Staff","Verified","Active","1","","0");
INSERT INTO login_credentials VALUES("10001","Elizabeth L. Poppins","password","Staff","","","","","","Guidance","Staff","Verified","Active","1","","0");
INSERT INTO login_credentials VALUES("100002","Jet Cariaga","1234","Staff","","","","","","Clinic","Nurse","Verified","Active","1","","0");
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
INSERT INTO login_credentials VALUES("1000000002","Tamara J. Webber","1234","Staff","","","","","","Clinic","Nurse","Verified","Active","1","�PNG
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
  `mode_id` int(11) NOT NULL,
  `communication_mode` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`mode_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  KEY `fk_notif_office_id_idx` (`office_id`)
) ENGINE=InnoDB AUTO_INCREMENT=252 DEFAULT CHARSET=utf8mb4;

INSERT INTO notif VALUES("1","1","  requests for new password.","2021-10-18 19:12:37","ForgotPassword_Requests.php","Seen","");
INSERT INTO notif VALUES("97","1000000002"," added a new complaint","2021-08-18 21:58:54","Admin-NewConsultation.php","Delivered","3");
INSERT INTO notif VALUES("98","1000000002"," added a new complaint","2021-08-18 21:59:59","Admin-NewConsultation.php","Delivered","3");
INSERT INTO notif VALUES("99","1000000002"," added a new complaint","2021-08-18 22:00:27","Admin-NewConsultation.php","Delivered","3");
INSERT INTO notif VALUES("100","1000000002","Allayssa George  Dela Cruz Request for a Medical Certificate","2021-08-18 22:15:12","admin-request.php","Delivered","3");
INSERT INTO notif VALUES("101","1000000002","Allayssa George  Dela Cruz Request for a Medical Certificate","2021-08-18 22:16:00","admin-request.php","Delivered","3");
INSERT INTO notif VALUES("102","1000000002","Allayssa George  Dela Cruz Request for a Medical Records Certification","2021-08-18 22:37:47","Admin-MedicalRecordCert.php","Delivered","3");
INSERT INTO notif VALUES("103","1000000002","Allayssa George  Dela Cruz Submitted a letter of request","2021-08-18 22:39:25","Admin-MedicalRecordCert.php","Delivered","3");
INSERT INTO notif VALUES("104","1000000002","Darlen Rose  MuÃ±ez added a new complaint","2021-08-19 01:06:29","Admin-NewConsultation.php","Delivered","3");
INSERT INTO notif VALUES("105","","The admin has set your counselling schedule.","2021-08-19 02:02:45","Guidance_Student_Counselling.php","Delivered","");
INSERT INTO notif VALUES("106","2018-00161","Admin ","2021-08-19 02:05:27","Prescription.php","Delivered","3");
INSERT INTO notif VALUES("107","","Elementary Education Department's Head has submitted a requisition form.","2021-08-19 02:15:32","../Users/Osas/Labor-Requisition.php","Seen","1");
INSERT INTO notif VALUES("108","2018-00161","Admin Added a requirements for the Medical Certificate","2021-08-19 02:15:57","requestmedcert.php","Delivered","");
INSERT INTO notif VALUES("109","2018-00161","Admin Added a requirements for the Medical Certificate","2021-08-19 02:16:30","requestmedcert.php","Delivered","");
INSERT INTO notif VALUES("110","2018-00161","Admin Added a requirements for the Medical Certificate","2021-08-19 02:16:30","requestmedcert.php","Delivered","");
INSERT INTO notif VALUES("111","2018-00161","Admin Added a requirements for the Medical Certificate","2021-08-19 02:16:39","requestmedcert.php","Delivered","");
INSERT INTO notif VALUES("112","2018-00161","Admin Added a requirements for the Medical Certificate","2021-08-19 02:18:00","requestmedcert.php","Delivered","");
INSERT INTO notif VALUES("113","2018-00161","Admin Added a requirements for the Medical Certificate","2021-08-19 02:18:36","requestmedcert.php","Delivered","");
INSERT INTO notif VALUES("114","2018-00161","Admin Added a requirements for the Medical Certificate","2021-08-19 02:19:27","requestmedcert.php","Delivered","");
INSERT INTO notif VALUES("115","1000000002","Jibb  Dawang added a new complaint","2021-08-19 02:29:13","Admin-NewConsultation.php","Delivered","3");
INSERT INTO notif VALUES("116","1","OSAS has Approved your requisition form.","2021-10-18 20:07:29","../Faculty/Labor-Requisition.php","Seen","");
INSERT INTO notif VALUES("117","1","Osas has posted your student labor requisition form #00000000023","2021-10-18 20:07:39","../Faculty/Labor-Requisition.php","Seen","");
INSERT INTO notif VALUES("118","1","A student has responded to your student labor request.","2021-08-19 03:07:18","../users/Faculty/Labor-Applicants.php","Seen","");
INSERT INTO notif VALUES("119","","A student has responded to a job posting.","2021-08-19 03:07:18","../users/Osas/Labor-Application.php","Seen","1");
INSERT INTO notif VALUES("121","","A recommendation letter has been attached to application #0000000010","2021-08-19 03:16:34","../users/Osas/Labor-Application.php","Seen","1");
INSERT INTO notif VALUES("123","","A recommendation letter has been attached to application #0000000010","2021-08-19 03:19:57","../users/Osas/Labor-Application.php","Delivered","1");
INSERT INTO notif VALUES("126","","A recommendation letter has been attached to application #0000000010","2021-08-19 03:23:28","../users/Osas/Labor-Application.php","Delivered","1");
INSERT INTO notif VALUES("127","1","Congratulations! You have a new addition to your staff. Jane Doe has been officially hired!","2021-08-19 03:23:28","../users/Faculty/Labor-Applicants.php","Delivered","");
INSERT INTO notif VALUES("128","","Jane Doe has signed his/her student labor application contract!","2021-08-19 03:23:28","../users/Osas/Labor-Application.php","Delivered","1");
INSERT INTO notif VALUES("129","1","Osas has posted your student labor requisition form #00000000023","2021-08-19 03:23:28","../users/Faculty/Labor-Requisition.php","Delivered","");
INSERT INTO notif VALUES("130","0000000002","Admin sent you a prescription","2021-08-19 05:54:17","Prescription.php","Delivered","3");
INSERT INTO notif VALUES("131","","Elementary Education Department's Head has submitted a requisition form.","2021-08-19 08:13:40","../users/Osas/Labor-Requisition.php","Seen","1");
INSERT INTO notif VALUES("132","1","OSAS has Approved your requisition form.","2021-08-19 08:40:45","../users/Faculty/Labor-Requisition.php","Delivered","");
INSERT INTO notif VALUES("133","1","Osas has posted your student labor requisition form #00000000024","2021-08-19 08:42:04","../users/Faculty/Labor-Requisition.php","Seen","");
INSERT INTO notif VALUES("134","","The guidance sets a new appointment schedule with you.","2021-08-19 09:07:59","Guidance_Student_Counselling.php","Delivered","");
INSERT INTO notif VALUES("135","","The admin has set your counselling schedule.","2021-08-19 09:32:26","Guidance_Student_Counselling.php","Delivered","");
INSERT INTO notif VALUES("136","1000000002"," added a new complaint","2021-08-19 09:43:25","Admin-NewConsultation.php","Delivered","3");
INSERT INTO notif VALUES("137","1000000002","Severus Snape added a new complaint","2021-08-19 09:44:01","Admin-NewConsultation.php","Delivered","3");
INSERT INTO notif VALUES("138","1000000002"," added a new complaint","2021-08-19 09:46:15","Admin-NewConsultation.php","Delivered","3");
INSERT INTO notif VALUES("139","1000000002","Jet Cariaga added a new complaint","2021-08-19 09:46:51","Admin-NewConsultation.php","Delivered","3");
INSERT INTO notif VALUES("140","1000000002","Jet Cariaga added a new complaint","2021-08-19 09:49:57","Admin-NewConsultation.php","Delivered","3");
INSERT INTO notif VALUES("141","1000000002","Dina Lirazan Pineza Request for a Medical Certificate","2021-08-19 09:56:25","admin-request.php","Delivered","3");
INSERT INTO notif VALUES("142","2018-00002","Admin Added a requirements for the Medical Certificate","2021-08-19 09:57:10","requestmedcert.php","Delivered","");
INSERT INTO notif VALUES("143","1","A student has responded to your student labor request.","2021-08-19 09:59:17","../users/Faculty/Labor-Applicants.php","Delivered","");
INSERT INTO notif VALUES("144","","A student has responded to a job posting.","2021-08-19 09:59:17","../users/Osas/Labor-Application.php","Delivered","1");
INSERT INTO notif VALUES("145","1","A student has responded to your student labor request.","2021-08-19 09:59:20","../users/Faculty/Labor-Applicants.php","Delivered","");
INSERT INTO notif VALUES("146","","A student has responded to a job posting.","2021-08-19 09:59:20","../users/Osas/Labor-Application.php","Delivered","1");
INSERT INTO notif VALUES("147","1","A student has responded to your student labor request.","2021-08-19 09:59:23","../users/Faculty/Labor-Applicants.php","Delivered","");
INSERT INTO notif VALUES("148","","A student has responded to a job posting.","2021-08-19 09:59:23","../users/Osas/Labor-Application.php","Delivered","1");
INSERT INTO notif VALUES("149","1","A student has responded to your student labor request.","2021-08-19 09:59:23","../users/Faculty/Labor-Applicants.php","Delivered","");
INSERT INTO notif VALUES("150","","A student has responded to a job posting.","2021-08-19 09:59:23","../users/Osas/Labor-Application.php","Delivered","1");
INSERT INTO notif VALUES("151","1","A student has responded to your student labor request.","2021-08-19 09:59:24","../users/Faculty/Labor-Applicants.php","Seen","");
INSERT INTO notif VALUES("152","","A student has responded to a job posting.","2021-08-19 09:59:24","../users/Osas/Labor-Application.php","Delivered","1");
INSERT INTO notif VALUES("154","","A recommendation letter has been attached to application #0000000011","2021-08-19 10:01:38","../users/Osas/Labor-Application.php","Seen","1");
INSERT INTO notif VALUES("155","0000000002","Admin sent you a prescription","2021-08-19 10:01:41","Prescription.php","Delivered","3");
INSERT INTO notif VALUES("157","","A recommendation letter has been attached to application #0000000011","2021-08-19 10:03:49","../users/Osas/Labor-Application.php","Delivered","1");
INSERT INTO notif VALUES("159","","A new intake form was submitted.","2021-08-19 10:13:32","Guidance_NewForms.php","Delivered","");
INSERT INTO notif VALUES("160","","A new intake form was submitted.","2021-08-19 10:13:34","Guidance_NewForms.php","Delivered","");
INSERT INTO notif VALUES("161","","A new counselling has been submitted.","2021-08-19 10:14:03","Guidance_Counselling.php","Delivered","");
INSERT INTO notif VALUES("163","","A recommendation letter has been attached to application #0000000011","2021-08-19 10:15:03","../users/Osas/Labor-Application.php","Delivered","1");
INSERT INTO notif VALUES("164","1","Congratulations! You have a new addition to your staff. Jan Andrianne M. Prollo has been officially hired!","2021-08-19 10:15:03","../users/Faculty/Labor-Applicants.php","Delivered","");
INSERT INTO notif VALUES("165","","Jan Andrianne M. Prollo has signed his/her student labor application contract!","2021-08-19 10:15:03","../users/Osas/Labor-Application.php","Delivered","1");
INSERT INTO notif VALUES("166","2018-00006","Your student labor application has not been approved.","2021-08-19 10:15:03","../users/Student/index.php","Seen","");
INSERT INTO notif VALUES("167","2018-00006","Your student labor application has not been approved.","2021-08-19 10:15:03","../users/Student/index.php","Delivered","");
INSERT INTO notif VALUES("168","2018-00006","Your student labor application has not been approved.","2021-08-19 10:15:03","../users/Student/index.php","Delivered","");
INSERT INTO notif VALUES("169","2018-00006","Your student labor application has not been approved.","2021-08-19 10:15:03","../users/Student/index.php","Delivered","");
INSERT INTO notif VALUES("170","1","Osas has posted your student labor requisition form #00000000024","2021-08-19 10:15:03","../users/Faculty/Labor-Requisition.php","Delivered","");
INSERT INTO notif VALUES("171","2018-00001","You have a Complaint","2021-08-19 10:55:03","../users/Students/Discipline-Response.php","Delivered","");
INSERT INTO notif VALUES("172","2018-00001","You have a Complaint","2021-08-19 10:56:19","../users/Students/Discipline-Response.php","Delivered","");
INSERT INTO notif VALUES("173","$dependant","You have a Complaint","2021-08-19 10:56:50","../users/Students/Discipline-Response.php","Delivered","");
INSERT INTO notif VALUES("174","","You have a Complaint","2021-08-19 10:58:10","../users/Students/Discipline-Response.php","Delivered","");
INSERT INTO notif VALUES("175","2018-00001","You have a Complaint","2021-08-19 11:00:16","../users/Students/Discipline-Response.php","Seen","");
INSERT INTO notif VALUES("176","","Elementary Education Department's Head has submitted a requisition form.","2021-08-19 11:03:07","../users/Osas/Labor-Requisition.php","Seen","1");
INSERT INTO notif VALUES("177","1","OSAS has Approved your requisition form.","2021-08-19 11:04:29","../users/Faculty/Labor-Requisition.php","Delivered","");
INSERT INTO notif VALUES("178","1","Osas has posted your student labor requisition form #00000000026","2021-08-19 11:04:50","../users/Faculty/Labor-Requisition.php","Delivered","");
INSERT INTO notif VALUES("179","1","A student has responded to your student labor request.","2021-08-19 11:06:20","../users/Faculty/Labor-Applicants.php","Seen","");
INSERT INTO notif VALUES("180","","A student has responded to a job posting.","2021-08-19 11:06:20","../users/Osas/Labor-Application.php","Delivered","1");
INSERT INTO notif VALUES("181","2018-00002","Admin Added a requirements for the Medical Certificate","2021-08-19 11:06:42","requestmedcert.php","Delivered","");
INSERT INTO notif VALUES("183","","A recommendation letter has been attached to application #0000000016","2021-08-19 11:07:56","../users/Osas/Labor-Application.php","Seen","1");
INSERT INTO notif VALUES("185","","A recommendation letter has been attached to application #0000000016","2021-08-19 11:10:23","../users/Osas/Labor-Application.php","Delivered","1");
INSERT INTO notif VALUES("187","1000000002","Dina Lirazan Pineza Request for a Medical Certificate","2021-08-19 11:17:02","admin-request.php","Delivered","3");
INSERT INTO notif VALUES("188","2021-00001","You have a Complaint","2021-08-19 11:26:51","../users/Student/Discipline-Response.php","Delivered","");
INSERT INTO notif VALUES("189","2018-00001","You have a Complaint","2021-08-19 11:27:53","../users/Student/Discipline-Response.php","Seen","");
INSERT INTO notif VALUES("190","","The admin has set your counselling schedule.","2021-08-19 11:56:51","Guidance_Student_Counselling.php","Delivered","");
INSERT INTO notif VALUES("192","","A recommendation letter has been attached to application #0000000016","2021-08-19 12:40:23","../users/Osas/Labor-Application.php","Delivered","1");
INSERT INTO notif VALUES("193","1","Congratulations! You have a new addition to your staff. Jan Andrianne M. Prollo has been officially hired!","2021-08-19 12:40:23","../users/Faculty/Labor-Applicants.php","Delivered","");
INSERT INTO notif VALUES("194","","Jan Andrianne M. Prollo has signed his/her student labor application contract!","2021-08-19 12:40:23","../users/Osas/Labor-Application.php","Delivered","1");
INSERT INTO notif VALUES("195","1","Osas has posted your student labor requisition form #00000000026","2021-08-19 12:40:23","../users/Faculty/Labor-Requisition.php","Delivered","");
INSERT INTO notif VALUES("197","","A recommendation letter has been attached to application #0000000016","2021-08-19 12:41:16","../users/Osas/Labor-Application.php","Delivered","1");
INSERT INTO notif VALUES("198","1","Congratulations! You have a new addition to your staff. Jan Andrianne M. Prollo has been officially hired!","2021-08-19 12:41:16","../users/Faculty/Labor-Applicants.php","Delivered","");
INSERT INTO notif VALUES("199","","Jan Andrianne M. Prollo has signed his/her student labor application contract!","2021-08-19 12:41:16","../users/Osas/Labor-Application.php","Delivered","1");
INSERT INTO notif VALUES("200","1","Osas has posted your student labor requisition form #00000000026","2021-08-19 12:41:16","../users/Faculty/Labor-Requisition.php","Delivered","");
INSERT INTO notif VALUES("201","","A new counselling has been submitted.","2021-08-19 12:42:36","Guidance_Counselling.php","Delivered","");
INSERT INTO notif VALUES("202","2018-00002","A new announcement was posted.","2021-08-19 12:48:51","Guidance_Student.php","Delivered","");
INSERT INTO notif VALUES("203","2018-00003","A new announcement was posted.","2021-08-19 12:48:51","Guidance_Student.php","Delivered","");
INSERT INTO notif VALUES("204","2018-00159","A new announcement was posted.","2021-08-19 12:48:51","Guidance_Student.php","Delivered","");
INSERT INTO notif VALUES("205","2018-00161","A new announcement was posted.","2021-08-19 12:48:51","Guidance_Student.php","Delivered","");
INSERT INTO notif VALUES("206","2018-00234","A new announcement was posted.","2021-08-19 12:48:51","Guidance_Student.php","Delivered","");
INSERT INTO notif VALUES("207","","A new intake form was submitted.","2021-08-19 12:57:39","Guidance_NewForms.php","Delivered","");
INSERT INTO notif VALUES("208","","A new counselling has been submitted.","2021-08-19 12:58:03","Guidance_Counselling.php","Delivered","");
INSERT INTO notif VALUES("209","","A new intake form was submitted.","2021-08-19 13:17:46","Guidance_NewForms.php","Delivered","");
INSERT INTO notif VALUES("210","","A new counselling has been submitted.","2021-08-19 13:18:44","Guidance_Counselling.php","Delivered","");
INSERT INTO notif VALUES("211","","The admin has set your counselling schedule.","2021-08-19 13:34:25","Guidance_Student_Counselling.php","Delivered","");
INSERT INTO notif VALUES("212","2018-00002","A new announcement was posted.","2021-08-19 13:41:40","Guidance_Student.php","Delivered","");
INSERT INTO notif VALUES("213","2018-00003","A new announcement was posted.","2021-08-19 13:41:40","Guidance_Student.php","Delivered","");
INSERT INTO notif VALUES("214","2018-00159","A new announcement was posted.","2021-08-19 13:41:40","Guidance_Student.php","Delivered","");
INSERT INTO notif VALUES("215","2018-00161","A new announcement was posted.","2021-08-19 13:41:40","Guidance_Student.php","Delivered","");
INSERT INTO notif VALUES("216","2018-00234","A new announcement was posted.","2021-08-19 13:41:40","Guidance_Student.php","Delivered","");
INSERT INTO notif VALUES("217","","The admin has set your counselling schedule.","2021-08-19 14:40:35","Guidance_Student_Counselling.php","Delivered","");
INSERT INTO notif VALUES("218","","The guidance sets a new appointment schedule with you.","2021-08-19 15:00:00","Guidance_Student_Counselling.php","Delivered","");
INSERT INTO notif VALUES("219","2018-00002","A new announcement was posted.","2021-08-19 15:02:04","Guidance_Student.php","Delivered","");
INSERT INTO notif VALUES("220","2018-00003","A new announcement was posted.","2021-08-19 15:02:04","Guidance_Student.php","Delivered","");
INSERT INTO notif VALUES("221","2018-00159","A new announcement was posted.","2021-08-19 15:02:04","Guidance_Student.php","Delivered","");
INSERT INTO notif VALUES("222","2018-00161","A new announcement was posted.","2021-08-19 15:02:04","Guidance_Student.php","Delivered","");
INSERT INTO notif VALUES("223","2018-00234","A new announcement was posted.","2021-08-19 15:02:04","Guidance_Student.php","Delivered","");
INSERT INTO notif VALUES("224","2021-00001","You have a Complaint","2021-08-19 15:21:59","../users/Student/Discipline-Response.php","Delivered","");
INSERT INTO notif VALUES("225","","A new intake form was submitted.","2021-08-19 15:23:52","Guidance_NewForms.php","Delivered","");
INSERT INTO notif VALUES("226","","A new counselling has been submitted.","2021-08-19 15:24:39","Guidance_Counselling.php","Delivered","");
INSERT INTO notif VALUES("227","2021-00001","You have a Complaint","2021-08-19 15:27:19","../users/Student/Discipline-Response.php","Delivered","");
INSERT INTO notif VALUES("228","2018-00001","You have a Complaint","2021-08-19 15:35:09","../users/Student/Discipline-Response.php","Delivered","");
INSERT INTO notif VALUES("229","2021-00001","You have a Complaint","2021-08-19 15:37:04","../users/Student/Discipline-Response.php","Delivered","");
INSERT INTO notif VALUES("230","2021-00001","You have a Complaint","2021-08-19 15:45:17","../users/Student/Discipline-Response.php","Delivered","");
INSERT INTO notif VALUES("231","2021-00001","You have a Complaint","2021-08-19 15:49:50","../users/Student/Discipline-Response.php","Delivered","");
INSERT INTO notif VALUES("232","2021-00001","You have a Complaint","2021-08-19 15:51:15","../users/Student/Discipline-Response.php","Delivered","");
INSERT INTO notif VALUES("233","","Elementary Education Department's Head has submitted a requisition form.","2021-08-19 15:55:22","../users/Osas/Labor-Requisition.php","Seen","1");
INSERT INTO notif VALUES("234","1","OSAS has Approved your requisition form.","2021-08-19 15:55:50","../users/Faculty/Labor-Requisition.php","Seen","");
INSERT INTO notif VALUES("235","1","Osas has posted your student labor requisition form #00000000027","2021-08-19 15:56:00","../users/Faculty/Labor-Requisition.php","Seen","");
INSERT INTO notif VALUES("236","2021-00001","You have a Complaint","2021-08-19 15:56:02","../users/Student/Discipline-Response.php","Delivered","");
INSERT INTO notif VALUES("237","2021-00001","You have a Complaint","2021-08-19 15:56:59","../users/Student/Discipline-Response.php","Delivered","");
INSERT INTO notif VALUES("238","2021-00001","You have a Complaint","2021-08-19 15:58:00","../users/Student/Discipline-Response.php","Delivered","");
INSERT INTO notif VALUES("239","1","A student has responded to your student labor request.","2021-08-19 15:59:48","../users/Faculty/Labor-Applicants.php","Seen","");
INSERT INTO notif VALUES("240","","A student has responded to a job posting.","2021-08-19 15:59:48","../users/Osas/Labor-Application.php","Delivered","1");
INSERT INTO notif VALUES("241","2021-00001","You have a Complaint","2021-08-19 16:00:03","../users/Student/Discipline-Response.php","Delivered","");
INSERT INTO notif VALUES("242","2021-00001","You have a Complaint","2021-08-19 16:00:39","../users/Student/Discipline-Response.php","Delivered","");
INSERT INTO notif VALUES("243","2018-00005","Congratulations! Your application has been approved by the Unit Head!","2021-08-19 16:02:20","../users/Student/index.php","Delivered","");
INSERT INTO notif VALUES("244","","A recommendation letter has been attached to application #0000000017","2021-08-19 16:02:20","../users/Osas/Labor-Application.php","Seen","1");
INSERT INTO notif VALUES("245","2018-00005","Congratulations! Your application has been approved by the Unit Head!","2021-08-19 16:04:29","../users/Student/index.php","Delivered","");
INSERT INTO notif VALUES("246","","A recommendation letter has been attached to application #0000000017","2021-08-19 16:04:29","../users/Osas/Labor-Application.php","Delivered","1");
INSERT INTO notif VALUES("247","2018-00005","Congratulations! Your application form has been approved! Click the button below to sign the contract!","2021-08-19 16:04:29","../users/Student/Home-Labor.php?applicationid=0000000017","Seen","");
INSERT INTO notif VALUES("248","2018-00001","You have a Complaint","2021-08-19 16:26:32","../users/Student/Discipline-Response.php","Seen","");
INSERT INTO notif VALUES("249","1","A student requests for a new password.","2021-10-18 19:45:45","ForgotPassword_Requests.php","Seen","");
INSERT INTO notif VALUES("250","1","A student requests for a new password.","2021-10-18 19:59:05","ForgotPassword_Requests.php","Seen","");
INSERT INTO notif VALUES("251","1","Student Accounts has new pre-registered student.","2021-10-22 19:52:50","PreStudent.php","Delivered","");



CREATE TABLE `office` (
  `office_id` int(11) NOT NULL,
  `office_name` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`office_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO office VALUES("1","OSAS","Active");
INSERT INTO office VALUES("2","Scholarship","Active");
INSERT INTO office VALUES("3","Clinic","Active");
INSERT INTO office VALUES("4","Guidance","Active");
INSERT INTO office VALUES("5","Registrar","Active");
INSERT INTO office VALUES("6","NSTP Office","Active");



CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `office_dept_heads` AS select `o`.`office_id` AS `id`,`o`.`office_name` AS `name`,'Office' AS `office_type`,`s`.`staff_id` AS `staff_id`,`s`.`fullname` AS `fullname`,`s`.`access_level` AS `access_level`,`o`.`status` AS `status` from (`office` `o` left join `staffdetails` `s` on(`s`.`office_id` = `o`.`office_id` and `s`.`access_level` = 1 and `s`.`account_status` = 'Active')) union select `d`.`dept_id` AS `id`,`d`.`dept_name` AS `name`,'Department' AS `office_type`,`s`.`staff_id` AS `staff_id`,`s`.`fullname` AS `fullname`,`s`.`access_level` AS `access_level`,`d`.`status` AS `status` from (`department` `d` left join `staffdetails` `s` on(`s`.`dept_id` = `d`.`dept_id` and `s`.`access_level` = 1 and `s`.`account_status` = 'Active'));

INSERT INTO office_dept_heads VALUES("2","Scholarship","Office","235","Ramel E. Montera","1","Active");
INSERT INTO office_dept_heads VALUES("4","Guidance","Office","10001","Elizabeth L. Poppins","1","Active");
INSERT INTO office_dept_heads VALUES("3","Clinic","Office","100002","Jet Cariaga","1","Active");
INSERT INTO office_dept_heads VALUES("1","OSAS","Office","1000000001","Mare M. Barrow","1","Active");
INSERT INTO office_dept_heads VALUES("3","Clinic","Office","1000000002","Tamara J. Webber","1","Active");
INSERT INTO office_dept_heads VALUES("5","Registrar","Office","","","","Active");
INSERT INTO office_dept_heads VALUES("6","NSTP Office","Office","","","","Active");
INSERT INTO office_dept_heads VALUES("5","Elementary Education Department","Department","1","Severus Snape","1","Active");
INSERT INTO office_dept_heads VALUES("1","IT Department","Department","","","","Active");
INSERT INTO office_dept_heads VALUES("2","Ag-Eng Department","Department","","","","Active");
INSERT INTO office_dept_heads VALUES("3","Special Needs Dept","Department","","","","Active");
INSERT INTO office_dept_heads VALUES("4","English Department","Department","","","","Active");
INSERT INTO office_dept_heads VALUES("7","Siya","Department","","","","Active");
INSERT INTO office_dept_heads VALUES("8","Likopo lo","Department","","","","Active");
INSERT INTO office_dept_heads VALUES("9","Engineers","Department","","","","Active");



CREATE TABLE `org_applications` (
  `ID` int(11) NOT NULL,
  `Org_Name` varchar(50) NOT NULL,
  `Org_President_Governor` varchar(25) NOT NULL,
  `Org_Adviser` varchar(25) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `App_letter` varchar(250) CHARACTER SET latin1 NOT NULL,
  `MVS` varchar(250) CHARACTER SET latin1 NOT NULL,
  `Aff_Lead` varchar(250) CHARACTER SET latin1 NOT NULL,
  `Resolution` varchar(250) CHARACTER SET latin1 NOT NULL,
  `Letter_Permission` varchar(250) CHARACTER SET latin1 NOT NULL,
  `Letter_content` varchar(250) CHARACTER SET latin1 NOT NULL,
  `Lists` varchar(250) CHARACTER SET latin1 NOT NULL,
  `ConsLaw` varchar(250) CHARACTER SET latin1 NOT NULL,
  `Logo` varchar(250) CHARACTER SET latin1 NOT NULL,
  `Letter_intent` varchar(250) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO org_applications VALUES("43","AIMS","2018-00003 Prollo, Jan An","Henry Mirafuentes","Govt. Funded Organization","osas-student-orgs-files/org-application-files/Transaction-form-for-Enrollment-Hijara-Charelyn_App_Letter1629359420.docx","osas-student-orgs-files/org-application-files/Pre-Registration-Form-Hijara-Charelyn_MVS1629359420.docx","osas-student-orgs-files/org-application-files/MAIN-MONTHLY_AFF_LEAD1629359420.docx","osas-student-orgs-files/org-application-files/Pre-Registration-Form-Hijara-Charelyn_RESOLUTION1629359421.docx","osas-student-orgs-files/org-application-files/MAIN-WEEKLY_LETTER_PERMISSION1629359421.docx","osas-student-orgs-files/org-application-files/Transaction-form-for-Enrollment-Hijara-Charelyn_LETTER_CONTENT1629359421.docx","osas-student-orgs-files/org-application-files/Transaction-form-for-Enrollment-Hijara-Charelyn_LISTS1629359422.docx","osas-student-orgs-files/org-application-files/Transaction-form-for-Enrollment-Hijara-Charelyn_CONSLAW1629359422.docx","osas-student-orgs-files/org-application-files/Transaction-form-for-Enrollment-Hijara-Charelyn_LOGO1629359423.docx","osas-student-orgs-files/org-application-files/Transaction-form-for-Enrollment-Hijara-Charelyn_LETTER_INTENT1629359423.docx");



CREATE TABLE `org_applications_files` (
  `Num` int(11) NOT NULL,
  `org_name` varchar(50) NOT NULL,
  `file` varchar(50) CHARACTER SET latin1 NOT NULL,
  `location` varchar(50) NOT NULL,
  PRIMARY KEY (`Num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




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




CREATE TABLE `organization_member` (
  `id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL,
  `student_id` varchar(10) NOT NULL,
  `position` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`id`),
  KEY `org_id` (`org_id`),
  KEY `student_id` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `participants` (
  `participant_id` int(11) NOT NULL,
  `grp_guidance_id` int(11) DEFAULT NULL,
  `Student_id` varchar(10) NOT NULL,
  `attendance` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`participant_id`),
  KEY `fk_gg_guidance_id` (`grp_guidance_id`),
  KEY `fk_gg_stud_id` (`Student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO participants VALUES("74","19","2018-00001","PRESENT");
INSERT INTO participants VALUES("75","19","2018-00003","PRESENT");
INSERT INTO participants VALUES("76","19","2018-00161","ABSENT");
INSERT INTO participants VALUES("77","19","2018-00234","ABSENT");
INSERT INTO participants VALUES("81","21","2018-11111","");
INSERT INTO participants VALUES("82","22","2018-00001","");
INSERT INTO participants VALUES("83","22","2018-00002","");
INSERT INTO participants VALUES("84","22","2018-00003","");
INSERT INTO participants VALUES("85","22","2018-00006","");
INSERT INTO participants VALUES("86","22","2018-00010","");
INSERT INTO participants VALUES("87","22","2018-00161","");
INSERT INTO participants VALUES("88","22","2018-00234","");
INSERT INTO participants VALUES("89","23","2018-00002","PRESENT");
INSERT INTO participants VALUES("90","23","2018-00003","PRESENT");
INSERT INTO participants VALUES("91","23","2018-00161","PRESENT");
INSERT INTO participants VALUES("92","23","2018-00234","ABSENT");
INSERT INTO participants VALUES("93","24","2018-00002","PRESENT");
INSERT INTO participants VALUES("94","24","2018-00003","PRESENT");
INSERT INTO participants VALUES("95","24","2018-00161","PRESENT");
INSERT INTO participants VALUES("96","24","2018-00234","ABSENT");



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
  `date_filled_out_by_nurse` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `patient_list` AS select `i`.`patient_id` AS `patient_id`,`s`.`first_name` AS `first_name`,`s`.`last_name` AS `last_name`,`s`.`middle_name` AS `middle_name`,`SF_GET_FULL_ADDRESS`(`s`.`house_block_lot_num`,`s`.`street`,`s`.`prk_vill_sub`,`s`.`brgy`,`s`.`city`,`s`.`province`) AS `address`,`SF_GET_AGE`(`s`.`birth_date`) AS `age`,`s`.`email_add` AS `email_add`,`s`.`phone_number` AS `phone_number`,`SF_GET_DATA_FROM_COURSE_BY_ID`('title',`s`.`course_id`) AS `course_department`,'Student' AS `type`,`s`.`sex` AS `sex`,`i`.`admitted` AS `admitted`,`i`.`admitted_illness` AS `admitted_illness`,`i`.`admitted_illness_start` AS `admitted_illness_start`,`i`.`operation` AS `operation`,`i`.`operation_kind` AS `operation_kind`,`i`.`operation_when` AS `operation_when`,`i`.`infectious_disease` AS `infectious_disease`,`i`.`headaches` AS `headaches`,`f`.`mens_age_start` AS `mens_age_start`,`f`.`mens_regular` AS `mens_regular`,`f`.`mens_irregular` AS `mens_irregular`,`f`.`dysmenorrhea` AS `dysmenorrhea`,`f`.`pms` AS `pms` from ((`clinic_patient_info` `i` join `student` `s` on(`s`.`Student_id` = `i`.`patient_id`)) left join `clinic_patient_info_female` `f` on(`f`.`patient_id` = `i`.`patient_id`)) union select `i`.`patient_id` AS `patient_id`,`st`.`first_name` AS `first_name`,`st`.`last_name` AS `last_name`,`st`.`middle_name` AS `middle_name`,`st`.`address` AS `address`,`SF_GET_AGE`(`st`.`birthdate`) AS `age`,`st`.`email_add` AS `email_add`,`st`.`phone_num` AS `phone_number`,if(`SF_GET_DATA_FROM_DEPARTMENT_BY_ID`('dept_name',`st`.`dept_id`) is null,`SF_GET_OFFICE_NAME`(`st`.`office_id`),`SF_GET_DATA_FROM_DEPARTMENT_BY_ID`('dept_name',`st`.`dept_id`)) AS `course_department`,`st`.`type` AS `type`,`st`.`sex` AS `sex`,`i`.`admitted` AS `admitted`,`i`.`admitted_illness` AS `admitted_illness`,`i`.`admitted_illness_start` AS `admitted_illness_start`,`i`.`operation` AS `operation`,`i`.`operation_kind` AS `operation_kind`,`i`.`operation_when` AS `operation_when`,`i`.`infectious_disease` AS `infectious_disease`,`i`.`headaches` AS `headaches`,`f`.`mens_age_start` AS `mens_age_start`,`f`.`mens_regular` AS `mens_regular`,`f`.`mens_irregular` AS `mens_irregular`,`f`.`dysmenorrhea` AS `dysmenorrhea`,`f`.`pms` AS `pms` from ((`clinic_patient_info` `i` join `staff` `st` on(`st`.`staff_id` = `i`.`patient_id`)) left join `clinic_patient_info_female` `f` on(`f`.`patient_id` = `i`.`patient_id`));

INSERT INTO patient_list VALUES("2018-00002","Dina","Pineza","Lirazan","Something St. Prk. Something, Brgy. Something, Something City, City Province","22","jdmbonza@usep.edu.ph","09123456789","BSIT","Student","Female","No","","","No","","","Chickenpox","Yes","12","Yes","","Yes","None");
INSERT INTO patient_list VALUES("1","Severus","Snape","","N/A","32","snape@gmail.com","09412554125","Elementary Education Department","Faculty","Male","No","","","No","","","Chickenpox","Yes","","","","","");



CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `promotional_report` AS select `el`.`id` AS `id`,`el`.`Student_id` AS `student_id`,`el`.`semester` AS `semester`,`el`.`schoolyear` AS `schoolyear`,`s`.`last_name` AS `last_name`,`s`.`first_name` AS `first_name`,`s`.`middle_name` AS `middle_name`,`s`.`suffix` AS `suffix`,`s`.`sex` AS `sex`,date_format(`s`.`birth_date`,'%m/%d/%Y') AS `birthdate`,`SF_GET_COURSE_NAME`(`s`.`course_id`) AS `course`,`el`.`student_yearlevel` AS `student_yearlevel`,`el`.`subject_code1` AS `subject_code1`,`SF_GET_DATA_FROM_SUBJECT_BY_ID`('subject_description',`el`.`subject_code1`) AS `sub_desc1`,`el`.`units1` AS `units1`,`el`.`grade1` AS `grade1`,`el`.`subject_code2` AS `subject_code2`,`SF_GET_DATA_FROM_SUBJECT_BY_ID`('subject_description',`el`.`subject_code2`) AS `sub_desc2`,`el`.`units2` AS `units2`,`el`.`grade2` AS `grade2`,`el`.`subject_code3` AS `subject_code3`,`SF_GET_DATA_FROM_SUBJECT_BY_ID`('subject_description',`el`.`subject_code3`) AS `sub_desc3`,`el`.`units3` AS `units3`,`el`.`grade3` AS `grade3`,`el`.`subject_code4` AS `subject_code4`,`SF_GET_DATA_FROM_SUBJECT_BY_ID`('subject_description',`el`.`subject_code4`) AS `sub_desc4`,`el`.`units4` AS `units4`,`el`.`grade4` AS `grade4`,`el`.`subject_code5` AS `subject_code5`,`SF_GET_DATA_FROM_SUBJECT_BY_ID`('subject_description',`el`.`subject_code5`) AS `sub_desc5`,`el`.`units5` AS `units5`,`el`.`grade5` AS `grade5`,`el`.`subject_code6` AS `subject_code6`,`SF_GET_DATA_FROM_SUBJECT_BY_ID`('subject_description',`el`.`subject_code6`) AS `sub_desc6`,`el`.`units6` AS `units6`,`el`.`grade6` AS `grade6`,`el`.`subject_code7` AS `subject_code7`,`SF_GET_DATA_FROM_SUBJECT_BY_ID`('subject_description',`el`.`subject_code7`) AS `sub_desc7`,`el`.`units7` AS `units7`,`el`.`grade7` AS `grade7`,`el`.`subject_code8` AS `subject_code8`,`SF_GET_DATA_FROM_SUBJECT_BY_ID`('subject_description',`el`.`subject_code8`) AS `sub_desc8`,`el`.`units8` AS `units8`,`el`.`grade8` AS `grade8`,`el`.`subject_code9` AS `subject_code9`,`SF_GET_DATA_FROM_SUBJECT_BY_ID`('subject_description',`el`.`subject_code9`) AS `sub_desc9`,`el`.`units9` AS `units9`,`el`.`grade9` AS `grade9`,if(`el`.`units1` is null,0,`el`.`units1`) + if(`el`.`units2` is null,0,`el`.`units2`) + if(`el`.`units3` is null,0,`el`.`units3`) + if(`el`.`units4` is null,0,`el`.`units4`) + if(`el`.`units5` is null,0,`el`.`units5`) + if(`el`.`units6` is null,0,`el`.`units6`) + if(`el`.`units7` is null,0,`el`.`units7`) + if(`el`.`units8` is null,0,`el`.`units8`) + if(`el`.`units9` is null,0,`el`.`units9`) AS `totalunits`,'' AS `gwa`,if(`s`.`type` = 'Graduate','Yes','No') AS `graduate_question` from (`enrollment_list` `el` join `student` `s` on(`s`.`Student_id` = `el`.`Student_id`));




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
  `refdate_completed` date DEFAULT NULL,
  PRIMARY KEY (`referral_id`),
  KEY `fk_staff_id_ref` (`staff_id`),
  KEY `fk_ref_studid` (`Student_id`),
  KEY `fk_ref_stat` (`status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO referral_form VALUES("13","2","2018-00001","1","Attendance (tardiness/absences),Study Habits/Attitude/Skills,Grades (tardiness/absences)","Attitude/Behavior","Decision Making","2021-08-18","I already advices the child to take another sessio","2021-08-18");
INSERT INTO referral_form VALUES("14","2","2018-00002","1","","","","2021-08-16","Thank you for your referral.","2021-08-19");
INSERT INTO referral_form VALUES("15","1","2018-00003","3","Attendance (tardiness/absences),Study Habits/Attitude/Skills,Grades (tardiness/absences)","Emotional,Attitude/Behavior","Planning,Attitude/Outlook","2021-08-17","","");
INSERT INTO referral_form VALUES("16","2","2018-00001","1","Attendance (tardiness/absences)","Home/Family","Planning","2021-08-19","okay.","2021-08-19");
INSERT INTO referral_form VALUES("17","2","2018-00001","2","","","","2021-08-19","","");
INSERT INTO referral_form VALUES("18","2","2018-00003","2","Attendance (tardiness/absences)","Financial","Planning","2021-08-19","","");



CREATE TABLE `remarks_apply` (
  `remarks_apply_id` int(11) NOT NULL,
  `org_name` varchar(50) NOT NULL,
  `file` varchar(25) CHARACTER SET latin1 NOT NULL,
  `message` varchar(100) NOT NULL,
  `image` varchar(225) NOT NULL,
  PRIMARY KEY (`remarks_apply_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `request_list` AS select `clinic_certificate_requests`.`request_id` AS `request_id`,`patient_list`.`patient_id` AS `patient_id`,concat(`patient_list`.`first_name`,' ',`patient_list`.`last_name`) AS `fullname`,`patient_list`.`course_department` AS `course_department`,`patient_list`.`address` AS `address`,`patient_list`.`phone_number` AS `phone_number`,`patient_list`.`email_add` AS `email_add`,`patient_list`.`type` AS `type`,`clinic_certificate_requests`.`date_requested` AS `date_requested`,`clinic_certificate_requests`.`purpose` AS `purpose`,`clinic_certificate_requests`.`request_type` AS `request_type`,`clinic_certificate_requests`.`required_document` AS `required_document`,`clinic_certificate_requests`.`document_passed` AS `document_passed`,`clinic_certificate_requests`.`certificate_location` AS `certificate_location`,`clinic_certificate_requests`.`date_released` AS `date_released`,`clinic_certificate_requests`.`status` AS `status`,`clinic_certificate_requests`.`CBC` AS `CBC`,`clinic_certificate_requests`.`PLATELET` AS `PLATELET`,`clinic_certificate_requests`.`HEMOTOCRIT` AS `HEMOTOCRIT`,`clinic_certificate_requests`.`HEMOGLOBIN` AS `HEMOGLOBIN`,`clinic_certificate_requests`.`Urinalysis` AS `Urinalysis`,`clinic_certificate_requests`.`Fecalysis` AS `Fecalysis`,`clinic_certificate_requests`.`FBS` AS `FBS`,`clinic_certificate_requests`.`sua` AS `sua`,`clinic_certificate_requests`.`Creatinine` AS `Creatinine`,`clinic_certificate_requests`.`Lipid` AS `Lipid`,`clinic_certificate_requests`.`SGOT` AS `SGOT`,`clinic_certificate_requests`.`SGPT` AS `SGPT`,`clinic_certificate_requests`.`others` AS `others`,`clinic_certificate_requests`.`other_text` AS `other_text`,`clinic_certificate_requests`.`cbc_loc` AS `cbc_loc`,`clinic_certificate_requests`.`platelet_loc` AS `platelet_loc`,`clinic_certificate_requests`.`hema_loc` AS `hema_loc`,`clinic_certificate_requests`.`hemo_loc` AS `hemo_loc`,`clinic_certificate_requests`.`urine_loc` AS `urine_loc`,`clinic_certificate_requests`.`fecal_loc` AS `fecal_loc`,`clinic_certificate_requests`.`fbs_loc` AS `fbs_loc`,`clinic_certificate_requests`.`sua_loc` AS `sua_loc`,`clinic_certificate_requests`.`creat_loc` AS `creat_loc`,`clinic_certificate_requests`.`lipid_loc` AS `lipid_loc`,`clinic_certificate_requests`.`sgot_loc` AS `sgot_loc`,`clinic_certificate_requests`.`sgpt_loc` AS `sgpt_loc`,`clinic_certificate_requests`.`others_loc` AS `others_loc` from (`patient_list` join `clinic_certificate_requests` on(`clinic_certificate_requests`.`user_id` = `patient_list`.`patient_id`));

INSERT INTO request_list VALUES("4","2018-00002","Dina Pineza","BSIT","Something St. Prk. Something, Brgy. Something, Something City, City Province","09123456789","jdmbonza@usep.edu.ph","Student","2021-08-19","Field Trip","Medical Certificate","","","","","pending","1","0","0","0","0","0","0","0","0","0","0","0","0","","","","","","","","","","","","","","");



CREATE TABLE `requisition_form` (
  `id` int(11) unsigned zerofill NOT NULL,
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
  KEY `fk_requisition_form_staff2_idx` (`assessed_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO requisition_form VALUES("00000000023","1","1","3","Data Encoder","","","Fast typing","","1","0","0","","Completed","2021-08-18","1000000001","2021-08-18","2021-08-18");
INSERT INTO requisition_form VALUES("00000000024","1","1","1","Data Encoder","","","Computer Skills","","1","0","0","","Completed","2021-08-19","1000000001","2021-08-19","2021-08-19");
INSERT INTO requisition_form VALUES("00000000025","2","2","5","Hardworking","","","Computer Skills","","1","1","0","","Pending","2021-08-19","","","");
INSERT INTO requisition_form VALUES("00000000026","1","1","5","Hardworking","","","Data Entry","","1","1","0","","Completed","2021-08-19","1000000001","2021-08-19","2021-08-19");
INSERT INTO requisition_form VALUES("00000000027","1","1","5","Hardworking","","","Computer Skills","","1","1","0","","Approved","2021-08-19","1000000001","2021-08-19","2021-08-19");



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
  `notification_status` int(1) DEFAULT NULL,
  PRIMARY KEY (`response_id`),
  KEY `fk_response_complaint1_idx` (`Complaint_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO response VALUES("7","1","Done","2018-00001","2021-08-03 10:48:20","Discipline-Response.php","Lorem Ipsum","2021-08-04","15:13:00","","Google Meet","https:/google.meet.com/","17545322","98352326","","1");
INSERT INTO response VALUES("21","2","Done","2018-00002","2021-08-03 10:48:20","","","2021-08-04","16:00:00","","","Refer to Dean","","","Dean","0");
INSERT INTO response VALUES("29","4","Done","2018-00001","2021-08-04 10:16:05","Discipline-Response.php","","","","","","","","","OSAS","1");
INSERT INTO response VALUES("30","5","Done","2018-00001","2021-08-04 12:45:25","Discipline-Response.php","Lorem Ipsum","2021-08-19","00:42:00","","Google Meet","11321324","","","OSAS","1");
INSERT INTO response VALUES("32","14","In Process","2018-00001","2021-08-19 11:26:51","Discipline-Response.php","Lorem Ipsum","","","","N/A","N/A","N/A","N/A","OSAS","0");
INSERT INTO response VALUES("33","3","Pending","2021-00001","2021-08-19 15:21:59","Discipline-Response.php","","","","","N/A","N/A","N/A","N/A","OSAS","0");
INSERT INTO response VALUES("34","8","Pending","2021-00001","2021-08-19 16:00:39","Discipline-Response.php","","","","","N/A","N/A","N/A","N/A","OSAS","0");
INSERT INTO response VALUES("35","17","Done","2018-00001","2021-08-19 16:26:32","Discipline-Response.php","Lorem Ipsum","0001-01-01","17:29:00","","Google Meet","aaaaaaa","","","OSAS","0");



CREATE TABLE `scholarship_card` (
  `student_Id` varchar(20) NOT NULL,
  `card` blob NOT NULL,
  `type` varchar(20) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `year` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `scholarship_general_info` AS select `g`.`id` AS `grantee_id`,`g`.`student_id` AS `student_id`,`s`.`last_name` AS `last_name`,`s`.`first_name` AS `first_name`,`s`.`middle_name` AS `middle_name`,`s`.`suffix` AS `suffix`,`s`.`fullname` AS `fullname`,`s`.`course_id` AS `course_id`,`s`.`year_level` AS `year_level`,`s`.`coursetitle` AS `coursetitle`,`s`.`coursename` AS `coursename`,`s`.`major` AS `major`,`SF_GET_DATA_FROM_COURSE_BY_ID`('college_id',`s`.`course_id`) AS `college_id`,`SF_GET_DATA_FROM_COLLEGE_BY_ID`('title',`SF_GET_DATA_FROM_COURSE_BY_ID`('college_id',`s`.`course_id`)) AS `college_name`,`s`.`phone_number` AS `phone_number`,`s`.`email_add` AS `email_add`,`s`.`living_with` AS `living_with`,`s`.`others_specify` AS `others_specify`,`s`.`guardian_contact` AS `guardian_contact`,`s`.`city_address` AS `city_address`,`s`.`parent_name` AS `parent_name`,`s`.`parent_occupation` AS `parent_occupation`,`s`.`parents_address` AS `parents_address`,`s`.`parents_contact` AS `parents_contact`,`s`.`spouse_name` AS `spouse_name`,`s`.`spouse_occupation` AS `spouse_occupation`,`s`.`prev_gwa` AS `prev_gwa`,`s`.`prev_total_units` AS `prev_total_units`,`sp`.`program_id` AS `program_id`,`sp`.`program_name` AS `program_name`,`sp`.`program_provider` AS `program_provider`,`SF_GET_SCHOLARSHIP_STATUS`(`sp`.`program_status`) AS `program_status`,`SF_GET_TYPE_OF_SCHOLARSHIP`(`sp`.`type`) AS `program_type`,`SF_GET_SEM_YEAR_ID`(`g`.`semester`,`g`.`year`) AS `sem_year_id`,`g`.`semester_year` AS `semester_year`,`g`.`semester` AS `semester`,`g`.`year` AS `year`,`sp`.`amount` AS `amount`,`g`.`student_status` AS `student_status`,`SF_GET_STUDENT_STATUS`(`g`.`student_status`) AS `status_name`,`g`.`record_status` AS `record_status`,if(`g`.`status_billing` is null,'-',`g`.`status_billing`) AS `billing_status`,`g`.`billing_set_date` AS `billing_set_date`,if(`g`.`status_payroll` is null,'-',`g`.`status_payroll`) AS `payroll_status`,`g`.`payroll_set_date` AS `payroll_set_date`,if(`g`.`status_liquidation` is null,'-',`g`.`status_liquidation`) AS `liquidation_status`,`g`.`liquidation_set_date` AS `liquidation_set_date`,if(`g`.`status_allowance` is null,'-',`g`.`status_allowance`) AS `allowance_status`,`g`.`allowance_set_date` AS `allowance_set_date` from ((`grantee_history` `g` join `studentdetails` `s` on(`s`.`student_id` = `g`.`student_id`)) join `scholarship_program` `sp` on(`sp`.`program_id` = `g`.`program_id`));




CREATE TABLE `scholarship_masterlist_documents` (
  `date` date NOT NULL,
  `no` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `number` varchar(256) NOT NULL,
  `prev_revision_date` date NOT NULL,
  `prev_revision_number` varchar(256) NOT NULL,
  `latest_revision_date` date NOT NULL,
  `latest_revision_number` varchar(256) NOT NULL,
  `file_location` varchar(200) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO scholarship_masterlist_documents VALUES("2021-08-18","1","Sample","123123","2021-08-18","123","2021-08-18","123","../scholarship-files/masterlist-documents/DTR Guillen-2021-08-18.doc");



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
  `file_location` varchar(200) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO scholarship_masterlist_external_reference VALUES("2021-08-18","1","0","123","123","123","123","0000-00-00","2021","../scholarship-files/masterlist-external-reference/Scholarship Report 1st Semester S.Y. 2019-2020-2021-08-18.xls");



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
  `file_location` varchar(200) NOT NULL,
  PRIMARY KEY (`record_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO scholarship_masterlist_record VALUES("2021-08-17","1","Sample","1","Parcel","Vern","North","2021-08-19","2021-08-18","2021-08-18","Passed","../scholarship-files/masterlist-records/BillingStatus-2021-08-17.xls");



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
  `file_location` varchar(200) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `scholarship_program` (
  `program_id` int(11) NOT NULL,
  `program_provider` varchar(50) NOT NULL,
  `program_name` varchar(50) NOT NULL,
  `program_status` int(1) NOT NULL,
  `type` int(1) NOT NULL,
  `amount` varchar(20) NOT NULL,
  PRIMARY KEY (`program_id`),
  KEY `fk_scholarship_program_scholarship_status1_idx` (`program_status`),
  KEY `fk_scholarship_program_scholarship_type1_idx` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `org_id` int(11) NOT NULL,
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
  KEY `staff_id` (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `schoolyear` (
  `id` int(11) NOT NULL,
  `schoolyear` varchar(10) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO schoolyear VALUES("1","2020-2021","active");



CREATE TABLE `section` (
  `id` int(11) NOT NULL,
  `section_name` varchar(45) NOT NULL,
  `course_id` int(11) NOT NULL,
  `yearlevel` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_course_section1_idx` (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `semester` (
  `semester_id` int(11) NOT NULL,
  `semester_name` varchar(15) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`semester_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO semester VALUES("1","1st Semester","Inactive");
INSERT INTO semester VALUES("2","2nd Semester","Inactive");
INSERT INTO semester VALUES("3","Off Semester","Active");



CREATE TABLE `semester_load` (
  `load_id` int(11) NOT NULL,
  `course` varchar(10) NOT NULL,
  `college` varchar(10) NOT NULL,
  `year` varchar(10) NOT NULL,
  `semester` varchar(10) NOT NULL,
  PRIMARY KEY (`load_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




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
  `comments` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`seminar_eval_id`),
  KEY `fk_studsem_eval_id` (`Student_id`),
  KEY `fk_appointment_id` (`appointment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO seminar_evaluation VALUES("4","2018-00001","62","Road to Success","Google Meet","2021-08-30","5","4","3","2","1","2","3","all parts","all parts","all parts","Lloyds Lugatiman","n/a","4","5","4","3","2","1","gg");
INSERT INTO seminar_evaluation VALUES("5","2018-00003","62","Road to Success","Google Meet","2021-08-30","4","3","4","3","4","2","5","None","None","None","Maam Chavez","Mental Health","5","3","1","4","2","3","Comment");



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
  KEY `fk_sl_acceptance_details_sl_applicant1_idx` (`applicant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO sl_acceptance_details VALUES("0000000010","Data Encoder","","","","Vacant Time only","","Elementary Education Department","2021-08-19","2021-10-19","2021-08-18","","GERMA V. DURAN","CESAR S. LIMBAGA, SR., PHD");
INSERT INTO sl_acceptance_details VALUES("0000000011","Cleaning","Eating","Sleeping","Coding","Vacant Time","Vacant Time","Elementary Education Department","2021-08-19","2021-08-25","2021-08-19","","","");
INSERT INTO sl_acceptance_details VALUES("0000000016","Encoding","Data Entry","Data Entry","Encoding","Vacant Time","Vacant Time","Elementary Education Department","2021-08-19","2021-12-19","2021-08-19","","","");
INSERT INTO sl_acceptance_details VALUES("0000000017","Data Entry","Data Encoder","Data Entry","Data Encoder","Vacant Time","Vacant Time","Elementary Education Department","2021-08-19","2021-12-19","","","","");



CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sl_accomplishment_report` AS select `sl`.`applicant_id` AS `applicant_id`,`t`.`student_id` AS `student_id`,`sl`.`applicant_name` AS `applicant_name`,concat(`sl`.`course`,' ',`sl`.`year_level`) AS `course_year`,`sl`.`labor_class` AS `labor_class`,`sl`.`labor_type` AS `labor_type`,`sl`.`e_signature` AS `student_signature`,`sl`.`office_name` AS `unit_assigned`,group_concat(`t`.`task` separator '#') AS `tasklist`,`sl`.`requested_by` AS `requested_by`,`sl`.`staff_requested_by` AS `staff_requested_by`,if(`SF_GET_ACCOMPLISHMENT_RATING_STATUS`(`t`.`applicant_id`,`t`.`month`,`t`.`year`) > 0,`sl`.`head_signature`,NULL) AS `head_signature`,`SF_GET_ACCOMPLISHMENT_RATING_STATUS`(`t`.`applicant_id`,`t`.`month`,`t`.`year`) AS `rating_status`,`r`.`month` AS `month`,`r`.`year` AS `year`,0 AS `total_hours`,`r`.`duty_regularly` AS `duty_regularly`,`r`.`instruction_difficulty` AS `instruction_difficulty`,`r`.`time_utilize` AS `time_utilize`,`r`.`routine_work` AS `routine_work`,`r`.`initiative_creativity` AS `initiative_creativity`,`r`.`accurate_efficient` AS `accurate_efficient`,`r`.`good_interpersonal` AS `good_interpersonal`,`r`.`willing_learn` AS `willing_learn`,`r`.`good_working` AS `good_working` from ((`accomplishment_task` `t` join `sl_application_form_details` `sl` on(`sl`.`applicant_id` = `t`.`applicant_id`)) left join `accomplishment_rating` `r` on(`r`.`applicant_id` = `t`.`applicant_id`)) group by `t`.`applicant_id`,`t`.`month`,`t`.`year`;

INSERT INTO sl_accomplishment_report VALUES("0000000010","2018-00001","Jane L. Doe","BSIT 3rd Year","Day","Paid Labor (SL)","�PNG
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
INSERT INTO sl_accomplishment_report VALUES("0000000010","2018-00001","Jane L. Doe","BSIT 3rd Year","Day","Paid Labor (SL)","�PNG
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
INSERT INTO sl_accomplishment_report VALUES("0000000010","2018-00001","Jane L. Doe","BSIT 3rd Year","Day","Paid Labor (SL)","�PNG
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
  `applicant_id` int(10) unsigned zerofill NOT NULL,
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
  KEY `fk_student_labot_requisition_form1_idx` (`assigned_to`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO sl_applicant VALUES("0000000010","2018-00001","Paid Labor (SL)","Day","New","1st Semester 2021-2022","00:00:00","00:00:00","23","osas-student-labor-files/student-application-grades-certification/aaa_1629313638.pdf","osas-student-labor-files/student-application-current-cor/aaa_1629313638.pdf","osas-student-labor-files/student-application-unit-head-letter-of-intent/aaa_1629313638.pdf","osas-student-labor-files/student-application-osas-head-letter-of-intent/aaa_1629313638.pdf","2021-08-18","Hired","osas-student-labor-files/student-application-recommendation-letter/aaa_1629314194.pdf");
INSERT INTO sl_applicant VALUES("0000000011","2018-00006","Paid Labor (SL)","Day","New","1st Semester 2021-2022","09:58:00","22:59:00","24","osas-student-labor-files/student-application-grades-certification/NANCY-MIRAFUENTES-1608731021_1629338357.pdf","osas-student-labor-files/student-application-current-cor/NANCY-MIRAFUENTES-1608731021_1629338357.pdf","osas-student-labor-files/student-application-unit-head-letter-of-intent/NANCY-MIRAFUENTES-1608731021_1629338357.pdf","osas-student-labor-files/student-application-osas-head-letter-of-intent/NANCY-MIRAFUENTES-1608731021_1629338357.pdf","2021-08-19","Hired","osas-student-labor-files/student-application-recommendation-letter/NANCY-MIRAFUENTES-1608731021_1629338498.pdf");
INSERT INTO sl_applicant VALUES("0000000016","2018-00010","Paid Labor (SL)","Day","New","1st Semester 2021-2022","08:00:00","12:00:00","26","osas-student-labor-files/student-application-grades-certification/NewConsultation_1629342380.pdf","osas-student-labor-files/student-application-current-cor/NewConsultation_1629342380.pdf","osas-student-labor-files/student-application-unit-head-letter-of-intent/NewConsultation_1629342380.pdf","osas-student-labor-files/student-application-osas-head-letter-of-intent/NewConsultation_1629342380.pdf","2021-08-19","Hired","osas-student-labor-files/student-application-recommendation-letter/NewConsultation_1629342476.pdf");
INSERT INTO sl_applicant VALUES("0000000017","2018-00005","Paid Labor (SL)","Day","New","1st Semester 2021-2022","12:00:00","17:00:00","27","osas-student-labor-files/student-application-grades-certification/NewConsultation_1629359988.pdf","osas-student-labor-files/student-application-current-cor/NewConsultation_1629359988.pdf","osas-student-labor-files/student-application-unit-head-letter-of-intent/NewConsultation_1629359988.pdf","osas-student-labor-files/student-application-osas-head-letter-of-intent/NewConsultation_1629359988.pdf","2021-08-19","Approved by OSAS","osas-student-labor-files/student-application-recommendation-letter/NewConsultation_1629360140.pdf");



CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sl_application_form_details` AS select `req`.`requisition_id` AS `requisition_id`,`sl`.`applicant_id` AS `applicant_id`,`sl`.`student_id` AS `student_id`,`st`.`fullname` AS `applicant_name`,`st`.`college` AS `college`,`st`.`section` AS `section`,`st`.`coursetitle` AS `course`,`st`.`year_level` AS `year_level`,`st`.`full_address` AS `full_address`,`st`.`phone_number` AS `phone_number`,date_format(`st`.`birth_date`,'%m/%d%/%Y') AS `applicant_bday`,`st`.`email_add` AS `email_add`,`st`.`birth_place` AS `birth_place`,`sl`.`labor_type` AS `labor_type`,`sl`.`labor_class` AS `labor_class`,`sl`.`labor_status` AS `labor_status`,`sl`.`semester_year` AS `semester_year`,`st`.`e_signature` AS `e_signature`,concat(time_format(`sl`.`available_from`,'%h:%i %p'),' - ',time_format(`sl`.`available_to`,'%h:%i %p')) AS `time_available`,`req`.`requested_by` AS `requested_by`,`req`.`fullname` AS `staff_requested_by`,`req`.`head_signature` AS `head_signature`,`req`.`office_name` AS `office_name`,`req`.`office_type` AS `office_type`,`req`.`no_of_sl` AS `no_of_sl`,`req`.`length_of_service` AS `length_of_service`,`req`.`qualification1` AS `qualification1`,`req`.`qualification2` AS `qualification2`,`req`.`qualification3` AS `qualification3`,`req`.`skill1` AS `skill1`,`req`.`skill2` AS `skill2`,`req`.`additional_workload_reason` AS `additional_workload_reason`,`req`.`reduction_in_workload_reason` AS `reduction_in_workload_reason`,`req`.`reached_saturation_reason` AS `reached_saturation_reason`,`req`.`other_reason` AS `other_reason`,`req`.`requisition_status` AS `requisition_status`,date_format(`req`.`date_submitted`,'%M %d, %Y') AS `requisition_date_submitted`,`req`.`assessed_by` AS `assessed_by`,`req`.`assessed_name` AS `assessed_name`,`req`.`assessor_signature` AS `assessor_signature`,`a`.`duty1` AS `duty1`,`a`.`duty2` AS `duty2`,`a`.`duty3` AS `duty3`,`a`.`duty4` AS `duty4`,`a`.`schedule1` AS `schedule1`,`a`.`schedule2` AS `schedule2`,`a`.`starting_date` AS `starting_date`,`a`.`expiration_date` AS `expiration_date`,`a`.`dean_unit_assigned` AS `dean_unit_assigned`,`a`.`budget_officer` AS `budget_officer`,`a`.`chancellor` AS `chancellor`,`a`.`date_signed` AS `date_signed`,`sl`.`grades_location` AS `grades_location`,`sl`.`cor_location` AS `cor_location`,`sl`.`unit_head_letter_location` AS `unit_head_letter_location`,`sl`.`osas_head_letter_location` AS `osas_head_letter_location`,`sl`.`recommendation_location` AS `recommendation_location`,`sl`.`status` AS `status`,if(`sl`.`recommendation_location` is not null,1,0) AS `recommendation_status`,if(`a`.`applicant_id` is not null,1,0) AS `acceptance_contract_status`,if(`a`.`date_signed` is not null,1,0) AS `student_sign_status` from (((`sl_applicant` `sl` left join `sl_reqform_general_info` `req` on(`req`.`requisition_id` = `sl`.`assigned_to`)) left join `studentdetails` `st` on(`st`.`student_id` = `sl`.`student_id`)) left join `sl_acceptance_details` `a` on(`a`.`applicant_id` = `sl`.`applicant_id`));

INSERT INTO sl_application_form_details VALUES("00000000023","0000000010","2018-00001","Jane L. Doe","CTET","3BSNED1","BSIT","3rd Year","Blk. A A St. Prk. A, Brgy. A, A City, A Province","09612112121","01/01/1990","jdmbonza@usep.edu.ph","A City","Paid Labor (SL)","Day","New","1st Semester 2021-2022","�PNG
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
INSERT INTO sl_application_form_details VALUES("00000000023","0000000010","2018-00001","Jane L. Doe","CTET","3BSNED1","BSIT","3rd Year","Blk. A A St. Prk. A, Brgy. A, A City, A Province","09612112121","01/01/1990","jdmbonza@usep.edu.ph","A City","Paid Labor (SL)","Day","New","1st Semester 2021-2022","","12:00 AM - 12:00 AM","1","Severus Snape","�PNG
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
INSERT INTO sl_application_form_details VALUES("00000000024","0000000011","2018-00006","","","","","","","","","","","Paid Labor (SL)","Day","New","1st Semester 2021-2022","","09:58 AM - 10:59 PM","1","Severus Snape","�PNG
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
INSERT INTO sl_application_form_details VALUES("00000000026","0000000016","2018-00010","","","","","","","","","","","Paid Labor (SL)","Day","New","1st Semester 2021-2022","","08:00 AM - 12:00 PM","1","Severus Snape","�PNG
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