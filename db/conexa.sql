USE conexa;


CREATE TABLE login (
	ID INT UNSIGNED NOT NULL AUTO_INCREMENT,
	UserEmail VARCHAR(255),
    UserPassword VARCHAR(255),
    Primary Key (ID),
    UNIQUE (UserEmail)
);

CREATE TABLE task(
	Task_ID VARCHAR(45) NOT NULL,
    Task_Assigned_Employee_ID INT,
    Task_Owner_ID INT,
    Task_Subject VARCHAR(45),
    Task_Start_Date VARCHAR(45),
    Task_Due_Date VARCHAR(45),
    Task_Status VARCHAR(45),
    Task_Priority INT,
    Task_Completion VARCHAR(45),
    Task_Parent_ID INT,
    UNIQUE (Task_ID)
);

CREATE TABLE appointment(
    Appointment_ID INT,
    Title VARCHAR(45),
    Appointment_Description VARCHAR(100),
    Start_date VARCHAR(45),
    Due_date VARCHAR(45),
    UNIQUE (Appointment_ID)
);
