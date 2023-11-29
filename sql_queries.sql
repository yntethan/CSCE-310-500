--ADMIN FUNCTIONALITIES

--user authentication and roles
DELIMITER //
CREATE PROCEDURE InsertUser(
    IN uin_value INT,
    IN first_name_value VARCHAR(255),
    IN m_initial_value CHAR(1),
    IN last_name_value VARCHAR(255),
    IN username_value VARCHAR(255),
    IN passwords_value VARCHAR(255),
    IN email_value VARCHAR(255),
    IN discord_name_value VARCHAR(255)
)
BEGIN
    INSERT INTO Users (UIN, First_Name, M_Initial, Last_Name, Username, Passwords, User_Type, Email, Discord_Name)
    VALUES (uin_value, first_name_value, m_initial_value, last_name_value, username_value, passwords_value, 'Admin', email_value, discord_name_value);
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE UpdateUserType(
    IN target_uin INT,
    IN updated_role VARCHAR(255)
)
BEGIN
    UPDATE Users
    SET User_Type = updated_role
    WHERE UIN = target_uin;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE SelectUserType()
BEGIN
    SELECT UIN, User_Type FROM Users;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE DeactivateUser(
    IN target_uin INT
)
BEGIN
    UPDATE Users
    SET User_Type = 'Inactive'
    WHERE UIN = target_uin;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE DeleteUser(
    IN target_uin INT
)
BEGIN
    DELETE FROM Users
    WHERE UIN = target_uin;
END //
DELIMITER ;

--program management information

DELIMITER //
CREATE PROCEDURE InsertProgram(
    IN program_num_value INT,
    IN name_value VARCHAR(255),
    IN description_value VARCHAR(255)
)
BEGIN
    INSERT INTO Programs (Program_Num, Name, Description)
    VALUES (program_num_value, name_value, description_value);
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE UpdateProgramDescription(
    IN target_program_num INT,
    IN updated_description VARCHAR(255)
)
BEGIN
    UPDATE Programs
    SET Description = updated_description
    WHERE Program_Num = target_program_num;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE SelectPrograms()
BEGIN
    SELECT * FROM Programs;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE DeactivateProgram(
    IN target_program_num INT
)
BEGIN
    UPDATE Programs
    SET Description = 'Inactive'
    WHERE Program_Num = target_program_num;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE DeleteProgram(
    IN target_program_num INT
)
BEGIN
    DELETE FROM Programs
    WHERE Program_Num = target_program_num;
END //
DELIMITER ;


--program progress tracking
--class enrollments, certification enrollments

DELIMITER //

CREATE PROCEDURE InsertProgramProgress(
    IN user_uin INT,
    IN program_num INT,
    IN class_id INT,
    IN cert_id INT,
    IN status VARCHAR(255),
    IN training_status VARCHAR(255),
    IN semester VARCHAR(255),
    IN year YEAR
)
BEGIN
    INSERT INTO Class_Enrollment (UIN, Class_ID, Status, Semester, Year)
    VALUES (user_uin, class_id, status, semester, year);

    INSERT INTO Cert_Enrollment (UIN, Cert_ID, Status, Training_Status, Program_Num, Semester, YEAR)
    VALUES (user_uin, cert_id, status, training_status, program_num, semester, year);
END //


CREATE PROCEDURE UpdateProgramProgress(
    IN user_uin INT,
    IN program_num INT,
    IN cert_id INT,
    IN new_status VARCHAR(255),
    IN new_training_status VARCHAR(255)
)
BEGIN
    UPDATE Class_Enrollment
    SET Status = new_status
    WHERE UIN = user_uin AND Program_Num = program_num;

    UPDATE Cert_Enrollment
    SET Status = new_status, Training_Status = new_training_status
    WHERE UIN = user_uin AND Program_Num = program_num AND Cert_ID = cert_id;
END //


CREATE PROCEDURE SelectProgramProgress(
    IN user_uin INT,
    IN program_num INT
)
BEGIN
    SELECT * FROM Class_Enrollment
    WHERE UIN = user_uin AND Program_Num = program_num;

    SELECT * FROM Cert_Enrollment
    WHERE UIN = user_uin AND Program_Num = program_num;
END //


CREATE PROCEDURE DeleteProgramProgress(
    IN user_uin INT,
    IN program_num INT
)
BEGIN
    DELETE FROM Class_Enrollment
    WHERE UIN = user_uin AND Program_Num = program_num;

    DELETE FROM Cert_Enrollment
    WHERE UIN = user_uin AND Program_Num = program_num;
END //

DELIMITER ;

--event management

DELIMITER //
CREATE PROCEDURE InsertEvent(
    IN program_num_value INT,
    IN start_date_value DATE,
    IN end_date_value DATE,
    IN location_value VARCHAR(255),
    IN end_time_value TIME,
    IN event_type_value VARCHAR(255)
)
BEGIN
    INSERT INTO Event (Program_Num, Start_Date, End_Date, Location, End_Time, Event_Type)
    VALUES (program_num_value, start_date_value, end_date_value, location_value, end_time_value, event_type_value);
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE UpdateEvent(
    IN target_event_id INT,
    IN updated_program_num INT,
    IN updated_start_date DATE,
    IN updated_end_date DATE,
    IN updated_location VARCHAR(255),
    IN updated_end_time TIME,
    IN updated_event_type VARCHAR(255)
)
BEGIN
    UPDATE Event
    SET Program_Num = updated_program_num,
        Start_Date = updated_start_date,
        End_Date = updated_end_date,
        Location = updated_location,
        End_Time = updated_end_time,
        Event_Type = updated_event_type
    WHERE Event_ID = target_event_id;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE SelectEvents()
BEGIN
    SELECT * FROM Event;
END //
DELIMITER ;


--STUDENT FUNCTIONALITIES

--user authentication and roles

DELIMITER //
CREATE PROCEDURE InsertStudent(
    IN uin_value INT,
    IN first_name_value VARCHAR(255),
    IN m_initial_value CHAR(1),
    IN last_name_value VARCHAR(255),
    IN username_value VARCHAR(255),
    IN passwords_value VARCHAR(255),
    IN email_value VARCHAR(255),
    IN discord_name_value VARCHAR(255)
)
BEGIN
    INSERT INTO Users (UIN, First_Name, M_Initial, Last_Name, Username, Passwords, User_Type, Email, Discord_Name)
    VALUES (uin_value, first_name_value, m_initial_value, last_name_value, username_value, passwords_value, 'Student', email_value, discord_name_value);
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE UpdateUserDetails(
    IN target_uin INT,
    IN updated_first_name VARCHAR(255),
    IN updated_m_initial CHAR(1),
    IN updated_last_name VARCHAR(255),
    IN updated_username VARCHAR(255),
    IN updated_passwords VARCHAR(255),
    IN updated_email VARCHAR(255),
    IN updated_discord_name VARCHAR(255)
)
BEGIN
    UPDATE Users
    SET First_Name = updated_first_name,
        M_Initial = updated_m_initial,
        Last_Name = updated_last_name,
        Username = updated_username,
        Passwords = updated_passwords,
        Email = updated_email,
        Discord_Name = updated_discord_name
    WHERE UIN = target_uin;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE SelectUser(
    IN target_uin INT
)
BEGIN
    SELECT * FROM Users
    WHERE UIN = target_uin;
END //
DELIMITER ;

--application information management

DELIMITER //
CREATE PROCEDURE InsertApplication(
    IN uin_value INT,
    IN program_num_value INT,
    IN uncom_cert_value VARCHAR(255),
    IN com_cert_value VARCHAR(255),
    IN purpose_statement_value LONGTEXT
)
BEGIN
    INSERT INTO Applications (UIN, Program_Num, Uncom_Cert, Com_Cert, Purpose_Statement)
    VALUES (uin_value, program_num_value, uncom_cert_value, com_cert_value, purpose_statement_value);
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE UpdateApplicationDetails(
    IN target_app_num INT,
    IN updated_uin INT,
    IN updated_program_num INT,
    IN updated_uncom_cert VARCHAR(255),
    IN updated_com_cert VARCHAR(255),
    IN updated_purpose_statement LONGTEXT
)
BEGIN
    UPDATE Applications
    SET UIN = updated_uin,
        Program_Num = updated_program_num,
        Uncom_Cert = updated_uncom_cert,
        Com_Cert = updated_com_cert,
        Purpose_Statement = updated_purpose_statement
    WHERE App_Num = target_app_num;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE SelectApplication(
    IN target_uin INT
)
BEGIN
    SELECT * FROM Applications
    WHERE UIN = target_uin;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE DeleteApplication(
    IN target_app_num INT
)
BEGIN
    DELETE FROM Applications
    WHERE App_Num = target_app_num;
END //
DELIMITER ;


--program progress tracking
--class enrollments, certification enrollments

DELIMITER //

CREATE PROCEDURE InsertProgressRecord(
    IN user_uin INT,
    IN program_num INT,
    IN class_id INT,
    IN cert_id INT,
    IN status VARCHAR(255),
    IN training_status VARCHAR(255),
    IN semester VARCHAR(255),
    IN year YEAR
)
BEGIN
    INSERT INTO Class_Enrollment (UIN, Class_ID, Status, Semester, Year)
    VALUES (user_uin, class_id, status, semester, year);

    INSERT INTO Cert_Enrollment (UIN, Cert_ID, Status, Training_Status, Program_Num, Semester, YEAR)
    VALUES (user_uin, cert_id, status, training_status, program_num, semester, year);
END //


CREATE PROCEDURE UpdateProgressRecord(
    IN user_uin INT,
    IN program_num INT,
    IN cert_id INT,
    IN new_status VARCHAR(255),
    IN new_training_status VARCHAR(255)
)
BEGIN
    UPDATE Class_Enrollment
    SET Status = new_status
    WHERE UIN = user_uin AND Class_ID = program_num;

    UPDATE Cert_Enrollment
    SET Status = new_status, Training_Status = new_training_status
    WHERE UIN = user_uin AND Program_Num = program_num AND Cert_ID = cert_id;
END //


CREATE PROCEDURE SelectOwnProgress(
    IN user_uin INT
)
BEGIN
    SELECT * FROM Class_Enrollment
    WHERE UIN = user_uin;

    SELECT * FROM Cert_Enrollment
    WHERE UIN = user_uin;
END //


CREATE PROCEDURE DeleteProgressRecord(
    IN user_uin INT
)
BEGIN
    DELETE FROM Class_Enrollment
    WHERE UIN = user_uin;

    DELETE FROM Cert_Enrollment
    WHERE UIN = user_uin;
END //

DELIMITER ;



--document upload and management

DELIMITER //
CREATE PROCEDURE InsertDocument(
    IN app_num_value INT,
    IN link_value VARCHAR(255),
    IN doc_type_value VARCHAR(255)
)
BEGIN
    INSERT INTO Document (App_Num, Link, Doc_Type)
    VALUES (app_num_value, link_value, doc_type_value);
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE UpdateDocumentDetails(
    IN target_doc_num INT,
    IN updated_app_num INT,
    IN updated_link VARCHAR(255),
    IN updated_doc_type VARCHAR(255)
)
BEGIN
    UPDATE Document
    SET App_Num = updated_app_num,
        Link = updated_link,
        Doc_Type = updated_doc_type
    WHERE Doc_Num = target_doc_num;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE SelectDocument(
    IN target_app_num INT
)
BEGIN
    SELECT * FROM Document
    WHERE App_Num = target_app_num;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE DeleteDocument(
    IN target_doc_num INT
)
BEGIN
    DELETE FROM Document
    WHERE Doc_Num = target_doc_num;
END //
DELIMITER ;
