USE conexa;

CREATE TABLE login (
	ID INT UNSIGNED NOT NULL AUTO_INCREMENT,
	UserEmail VARCHAR(255),
    UserPassword VARCHAR(255),
    Primary Key (ID),
    UNIQUE (UserEmail)
);
/*Login*/
SELECT * FROM login;
TRUNCATE TABLE login;



#	TODO: Tenho que adicionar um campo de detalhes
#		  ou seja um campo de texto longo.
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
/*Operations*/
SELECT * FROM task;
TRUNCATE TABLE task;


CREATE TABLE appointment(
    Appointment_ID VARCHAR(45) NOT NULL,
    Title VARCHAR(45),
    Appointment_Description VARCHAR(100),
    Start_date VARCHAR(45),
    Due_date VARCHAR(45),
    UNIQUE (Appointment_ID)
);

CREATE TABLE cash_register(
	Cash_Register_ID VARCHAR (45) NOT NULL,
    Cash_Register_Name VARCHAR(45),
    Cash_Register_Description VARCHAR(100),
    Cash_Register_Value INT, 
    Registration_Entry VARCHAR(45),
    UNIQUE (Cash_Register_ID)
);




/*Operations*/
SELECT * FROM appointment;
TRUNCATE TABLE appointment;



