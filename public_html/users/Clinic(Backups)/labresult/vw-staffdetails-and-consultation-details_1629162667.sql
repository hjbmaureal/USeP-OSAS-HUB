DROP VIEW IF EXISTS staffdetails;
CREATE VIEW `staffdetails` AS
    SELECT 
        `s`.`staff_id` AS `staff_id`,
        `s`.`title` AS `title`,
        `s`.`last_name` AS `last_name`,
        `s`.`first_name` AS `first_name`,
        `s`.`middle_name` AS `middle_name`,
        `s`.`suffix` AS `suffix`,
        `s`.`extension` AS `extension`,
        FULLNAME(`s`.`first_name`,
                `s`.`middle_name`,
                `s`.`last_name`,
                `s`.`title`,
                `s`.`suffix`,
                `s`.`extension`,
                'firstname_first') AS `fullname`,
        `s`.`sex` AS `sex`,
        `s`.`civil_status` AS `civil_status`,
        `s`.`birthdate` AS `birthdate`,
        SF_GET_AGE(`s`.`birthdate`) AS `age`,
        `s`.`email_add` AS `email_add`,
        `s`.`phone_num` AS `phone_num`,
        `s`.`employment_status` AS `employment_status`,
        `s`.`account_status` AS `account_status`,
        `s`.`access_level` AS `access_level`,
        `s`.`e_signature` AS `e_signature`,
        `s`.`pic` AS `pic`,
        `s`.`date_submitted` AS `date_submitted`,
        `s`.`date_verified` AS `date_verified`,
        IF(ISNULL(`s`.`date_verified`),
            'Not Verified',
            'Verified') AS `verified_status`,
        `s`.`password` AS `password`,
        `s`.`office_id` AS `office_id`,
        `o`.`office_name` AS `office_name`,
        `s`.`dept_id` AS `dept_id`,
        `d`.`dept_name` AS `dept_name`,
        `s`.`type` AS `type`,
        `s`.`position` AS `position`,
        `s`.`patinfo_status` AS `patinfo_status`,
        `s`.`license_number` AS `license_number`
    FROM
        ((`staff` `s`
        LEFT JOIN `office` `o` ON ((`o`.`office_id` = `s`.`office_id`)))
        LEFT JOIN `department` `d` ON ((`d`.`dept_id` = `s`.`dept_id`)));
        
DROP VIEW IF EXISTS consultation_details;
CREATE VIEW `consultation_details` AS
    SELECT 
        `c`.`id` AS `consultation_id`,
        `c`.`patient_id` AS `patient_id`,
        FULLNAME(`pt`.`first_name`,
                `pt`.`middle_name`,
                `pt`.`last_name`,
                '',
                '',
                '',
                'firstname_first') AS `name`,
        `pt`.`email_add` AS `email_add`,
        `pt`.`phone_number` AS `phone_number`,
        `pt`.`course_department` AS `course_department`,
        `pt`.`type` AS `user_type`,
        `c`.`consultation_type` AS `consultation_type`,
        `c`.`communication_mode` AS `communication_mode`,
        `c`.`problems` AS `problems`,
        `c`.`date_filed` AS `date_filed`,
        `c`.`status` AS `consultation_status`,
        `c`.`date_received_by_nurse` AS `date_received_by_nurse`,
        `c`.`appointment_date` AS `appointment_date`,
        `c`.`appointment_timefrom` AS `appointment_timefrom`,
        `c`.`appointment_timeto` AS `appointment_timeto`,
        `c`.`appointment_meetinglink` AS `appointment_meetinglink`,
        `c`.`diagnosis` AS `diagnosis`,
        `c`.`treatment` AS `treatment`,
        `c`.`prescription_details` AS `prescription_details`,
        `c`.`prescription_date_issued` AS `prescription_date_issued`,
        `c`.`remarks` AS `remarks`,
        `s`.`staff_id` AS `physician_staff_id`,
        `s`.`fullname` AS `physician_fullname`,
        `s`.`license_number` AS `license_number`
    FROM
        ((`consultation` `c`
        JOIN `patient_list` `pt` ON ((`pt`.`patient_id` = `c`.`patient_id`)))
        JOIN `staffdetails` `s` ON ((`s`.`staff_id` = `c`.`staff_id`)));