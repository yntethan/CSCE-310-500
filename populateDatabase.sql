-- Populate Tables
-- Users Table
INSERT INTO Users VALUES
(1, 'John', 'D', 'Doe', 'john.doe', 'password123', 'Student', 'john.doe@tamu.edu', 'john.doe#1234'),
(2, 'Jane', 'M', 'Smith', 'jane.smith', 'pass456', 'Student', 'jane.smith@tamu.edu', 'jane.smith#5678'),
(3, 'Bob', 'L', 'Johnson', 'bob.johnson', 'qwerty', 'Admin', 'bob.johnson@tamu.edu', 'bob.johnson#9101'),
(4, 'Alice', 'A', 'Williams', 'alice.williams', 'abc123', 'Student', 'alice.williams@tamu.edu', 'alice.williams#1122');

-- College Student Table
INSERT INTO College_Student VALUES
(1, 'Male', FALSE, 'Caucasian', TRUE, TRUE, '1998-05-15', 3.7, 'Computer Science', 'Mathematics', 'Physics', 2023, 'School of Engineering', 'Junior', 1234567890, 'Full-Time'),
(2, 'Female', FALSE, 'African American', TRUE, FALSE, '1999-02-28', 3.5, 'Business Administration', 'Marketing', NULL, 2024, 'School of Business', 'Sophomore', 9876543210, 'Part-Time'),
(3, 'Male', TRUE, 'Hispanic', TRUE, FALSE, '1997-11-10', 3.9, 'Chemistry', 'Biology', NULL, 2022, 'College of Science', 'Senior', 5556667777, 'Full-Time'),
(4, 'Female', FALSE, 'Asian', TRUE, TRUE, '2000-07-03', 3.8, 'Psychology', 'Sociology', NULL, 2025, 'College of Arts and Letters', 'Freshman', 1112223333, 'Full-Time');

-- Classes Table
INSERT INTO Classes VALUES
(101, 'CSCE 310', 'Database Systems', 'Computer Science'),
(102, 'CSCE 313', 'Introduction to Computer Systems', 'Computer Science'),
(103, 'CSCE 221', 'Data Structures and Algorithms', 'Computer Science'),
(104, 'CSCE 201', 'Fundamentals of Cybersecurity', 'Computer Science');

-- Class_Enrollment Table
INSERT INTO Class_Enrollment VALUES
(1, 1, 101, 'Enrolled', 'Fall', 2023),
(2, 2, 102, 'Enrolled', 'Spring', 2024),
(3, 3, 103, 'Enrolled', 'Fall', 2022),
(4, 4, 104, 'Enrolled', 'Fall', 2025);

-- Internship Table
INSERT INTO Internship VALUES
(1, 'Facebook', 'Software development internship.', FALSE),
(2, 'Google', 'Cybersecurity internship.', FALSE),
(3, 'DoD', 'Cybersecurity internship.', TRUE),
(4, 'National Labs', 'Research Internship', TRUE);

-- Intern_App Table
INSERT INTO Intern_App VALUES
(1, 1, 1, 'Pending', 2023),
(2, 2, 2, 'Approved', 2024),
(3, 3, 3, 'Rejected', 2022),
(4, 4, 4, 'Pending', 2025);

-- Programs Table
INSERT INTO Programs VALUES
(1, 'VICEROY', 'Virtual Institutes for Cyber and Electromagnetic Spectrum Research and Employ'),
(2, 'CLDP', 'Cyber Leader Development Program'),
(3, 'SFS', 'CyberCorps: Scholarship for Service'),
(4, 'CySP', 'DoD Cybersecurity Scholarship Program ');

-- Certification Table
INSERT INTO Certification VALUES
(1, 'Beginner', 'Programming Fundamentals', 'Basic programming skills certification.'),
(2, 'Intermediate', 'CompTIA Security+', 'IT Secuity Training.'),
(3, 'Advanced', 'EC Council of Certified Ethical Hackers', 'Computer Security Qualification.'),
(4, 'Beginner', 'Cybersecurity Basics', 'Fundamental concepts of cybersecurity.');

-- Cert_Enrollment Table
INSERT INTO Cert_Enrollment VALUES
(1, 1, 1, 'Enrolled', 'In Progress', 1, 'Spring', 2023),
(2, 2, 2, 'Completed', 'Completed', 2, 'Fall', 2024),
(3, 3, 3, 'Enrolled', 'Not Started', 3, 'Summer', 2022),
(4, 4, 4, 'Enrolled', 'In Progress', 4, 'Fall', 2025);

-- Track Table
INSERT INTO Track VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4);

-- Applications Table
INSERT INTO Applications VALUES
(1, 1, 1, 'Programming Fundamentals Certification', NULL, 'I am passionate about programming and want to enhance my skills.'),
(2, 2, 2, 'CompTIA Security+', 'EC Council of Certified Ethical Hackers', 'I aspire to work in the field of IT and cybersecurity.'),
(3, 3, 3, 'EC Council of Certified Ethical Hackers', NULL, 'I am interested in exploring the security vulnerabilities of computers.'),
(4, 4, 4, 'Cybersecurity Basics Certification', NULL, 'I want to explore foundational concepts in cybersecurity.');

-- Document Table
INSERT INTO Document VALUES
(1, 1, 'https://docs.google.com/programming_fundamentals_certificate', 'PDF'),
(2, 2, 'https://docs.google.com/comp_tia_certificate', 'PDF'),
(3, 3, 'https://docs.google.com/ethical_hackers_certificate', 'PDF'),
(4, 4, 'https://docs.google.com/cyphersecurity_basics_certificate', 'PDF');

-- Event Table
INSERT INTO Event VALUES
(1, 1, 1, '2023-04-15', '09:00:00', 'Peterson Building', '2023-04-15', '12:00:00', 'Workshop'),
(2, 2, 2, '2024-02-10', '14:00:00', 'Zachry Building', '2024-02-10', '16:00:00', 'Networking Event'),
(3, 3, 3, '2022-11-20', '10:30:00', 'Bright Building', '2022-11-20', '12:30:00', 'Seminar'),
(4, 4, 4, '2025-09-05', '10:30:00','Kyle Field', '2024-09-05', '4:00:00', 'Career Fair');

-- Event_Tracking Table
INSERT INTO Event_Tracking VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4);