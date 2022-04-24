-- Create Messages Table 
CREATE TABLE Messages (
    id INT PRIMARY KEY AUTO_INCREMENT ,
    email VARCHAR(48) NOT NULL , 
    body TEXT NOT NULL 
) ; 

-- Insert Message To Messages Table 
INSERT INTO Messages(email , body) VALUES ("email@email.com" , "The Message Body") ; 


-- Create Students Table 

CREATE TABLE Students (
    studentId INT PRIMARY KEY , 
    fName VARCHAR(24) NOT NULL, 
    sName VARCHAR(24) NOT NULL, 
    lName VARCHAR(24) NOT NULL,
    phoneNumber VARCHAR(10) 
) ; 


-- Insert Student To Students Table 
INSERT INTO Students VALUES("Id" , "First Name" , "Second Name" , "Last Name" , "Phone Number") ;



-- Create Users Table 

CREATE TABLE Users(
    email VARCHAR(48) PRIMARY KEY , 
    password VARCHAR(32)
) ; 
