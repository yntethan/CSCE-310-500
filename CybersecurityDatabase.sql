-- Users Table
CREATE TABLE Users (
    UIN INT PRIMARY KEY,
    First_Name VARCHAR(255),
    M_Initial CHAR(1),
    Last_Name VARCHAR(255),
    Username VARCHAR(255),
    Passwords VARCHAR(255),
    User_Type VARCHAR(255),
    Email VARCHAR(255),
    Discord_Name VARCHAR(255)
);

-- College Student Table
CREATE TABLE College_Student (
    UIN INT PRIMARY KEY,
    Gender VARCHAR(255),
    Hispanic_Latino BOOLEAN,
    Race VARCHAR(255),
    US_Citizen BOOLEAN,
    First_Generation BOOLEAN,
    DoB DATE,
    GPA FLOAT,
    Major VARCHAR(255),
    Minor1 VARCHAR(255),
    Minor2 VARCHAR(255),
    Expected_Graduation SMALLINT,
    School VARCHAR(255),
    Classification VARCHAR(255),
    Phone INT,
    Student_Type VARCHAR(255),
    FOREIGN KEY (UIN) REFERENCES Users(UIN)
);

-- Classes Table
CREATE TABLE Classes (
    Class_ID INT PRIMARY KEY,
    Name VARCHAR(255),
    Description VARCHAR(255),
    Type VARCHAR(255)
);

-- Class_Enrollment Table
CREATE TABLE Class_Enrollment (
    CE_NUM INT PRIMARY KEY,
    UIN INT,
    Class_ID INT,
    Status VARCHAR(255),
    Semester VARCHAR(255),
    Year YEAR,
    FOREIGN KEY (UIN) REFERENCES Users(UIN),
    FOREIGN KEY (Class_ID) REFERENCES Classes(Class_ID)
);

-- Internship Table
CREATE TABLE Internship (
    Intern_ID INT PRIMARY KEY,
    Name VARCHAR(255),
    Description VARCHAR(255),
    Is_Gov BOOLEAN
);

-- Intern_App Table
CREATE TABLE Intern_App (
    IA_Num INT PRIMARY KEY,
    UIN INT,
    Intern_ID INT,
    Status VARCHAR(255),
    Year YEAR,
    FOREIGN KEY (UIN) REFERENCES Users(UIN),
    FOREIGN KEY (Intern_ID) REFERENCES Internship(Intern_ID)
);

-- Programs Table
CREATE TABLE Programs (
    Program_Num INT PRIMARY KEY,
    Name VARCHAR(255),
    Description VARCHAR(255)
);

-- Certification Table
CREATE TABLE Certification (
    Cert_ID INT PRIMARY KEY,
    Level VARCHAR(255),
    Name VARCHAR(255),
    Description VARCHAR(255)
);

-- Cert_Enrollment Table
CREATE TABLE Cert_Enrollment (
    CertE_Num INT PRIMARY KEY,
    UIN INT,
    Cert_ID INT,
    Status VARCHAR(255),
    Training_Status VARCHAR(255),
    Program_Num INT,
    Semester VARCHAR(255),
    YEAR YEAR,
    FOREIGN KEY (UIN) REFERENCES Users(UIN),
    FOREIGN KEY (Cert_ID) REFERENCES Certification(Cert_ID),
    FOREIGN KEY (Program_Num) REFERENCES Programs(Program_Num)
);

-- Track Table
CREATE TABLE Track (
    Program_Num INT,
    Student_Num INT,
    Tracking_Num INT,
    PRIMARY KEY (Program_Num, Student_Num, Tracking_Num),
    FOREIGN KEY (Program_Num) REFERENCES Programs(Program_Num),
    FOREIGN KEY (Student_Num) REFERENCES Users(UIN)
);

-- Applications Table
CREATE TABLE Applications (
    App_Num INT PRIMARY KEY,
    Program_Num INT,
    UIN INT,
    Uncom_Cert VARCHAR(255),
    Com_Cert VARCHAR(255),
    Purpose_Statement LONGTEXT,
    FOREIGN KEY (Program_Num) REFERENCES Programs(Program_Num),
    FOREIGN KEY (UIN) REFERENCES Users(UIN)
);

-- Document Table
CREATE TABLE Document (
    Doc_Num INT PRIMARY KEY,
    App_Num INT,
    Link VARCHAR(255),
    Doc_Type VARCHAR(255),
    FOREIGN KEY (App_Num) REFERENCES Applications(App_Num)
);

-- Event Table
CREATE TABLE Event (
    Event_ID INT PRIMARY KEY,
    UIN INT,
    Program_Num INT,
    Start_Date DATE,
    Start_Time TIME,
    Location VARCHAR(255),
    End_Date DATE,
    End_Time TIME,
    Event_Type VARCHAR(255),
    FOREIGN KEY (UIN) REFERENCES Users(UIN),
    FOREIGN KEY (Program_Num) REFERENCES Programs(Program_Num)
);

-- Event_Tracking Table
CREATE TABLE Event_Tracking (
    ET_Num INT PRIMARY KEY,
    Event_ID INT,
    UIN INT,
    FOREIGN KEY (Event_ID) REFERENCES Event(Event_ID),
    FOREIGN KEY (UIN) REFERENCES Users(UIN)
);
