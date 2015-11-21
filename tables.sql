CREATE TABLE Book_Information
(Seller_ID int,
Class_code char(20),
Book_name char(50),
ISBN char(9),
Condition char(10) CHECK Condition = 'New' OR Condition = 'Like New' OR Condition = 'Good' OR Condition = 'Acceptable',
Location char(5) CHECK Location = 'North' OR Location = 'South',
Price numeric NOT NULL,
Negotiate char CHECK Negotiate = 'Y' or Negotiate = 'N');

CREATE TABLE Seller_Information
(Seller_ID int UNIQUE,
Name char(100),
Rating numeric CHECK Rating > 0 AND Rating < 6,
Contact_Info char(50));

input_name = '%' + input + '%';

#Find all sales with the inputted book name
SELECT *
FROM Book_Information
WHERE Book_name LIKE input_name
ORDER BY Price;

#Find all sales with the inputted ISBN
SELECT *
FROM Book_Information
WHERE ISBN LIKE input_name
ORDER BY Price;

#Find all sales with the class code
SELECT *
FROM Book_Information
WHERE Class_code LIKE input_name
ORDER BY Price;