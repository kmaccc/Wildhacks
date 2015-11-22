CREATE TABLE Book_Information
(Seller_ID int,
Class_code char(20),
Book_name char(50),
ISBN char(13),
State char(10) CHECK (State = 'New' OR (State = 'Like New' OR (State = 'Good' OR State = 'Acceptable'))),
Location char(5) CHECK (Location = 'North' OR Location = 'South'),
Price numeric NOT NULL,
Negotiate char CHECK (Negotiate = 'Y' or Negotiate = 'N'));

CREATE TABLE Seller_Information
(Seller_ID int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Name char(100),
Rating numeric CHECK (Rating > 0 AND Rating < 6),
Contact_Info char(50));

INSERT INTO Seller_Information
VALUES ('Kaitlyn MacIntyre', 3, 'kmac2017@u.northwestern.edu');

INSERT INTO Seller_Information
VALUES ('Josh Zaugg', 4, 'joshuazaugg2018@u.northwestern.edu');

INSERT INTO Seller_Information
VALUES ('Alan Cheng', 5, 'alancheng2018@u.northwestern.edu');

INSERT INTO Book_Information
VALUES (1, 'EECS336', 'Algorithm Design', 9780321295354, 'Good', 'South', 30.00, 'Y');

INSERT INTO Book_Information
VALUES (2, 'MATH230', 'Essential Calculus: Early Transcendentals', 9781133112280, 'Poor', 'South', 10.00, 'N');

INSERT INTO Book_Information
VALUES (3, 'MATH230', 'Essential Calculus: Early Transcendentals', 9781133112280, 'Like New', 'North', 20.00, 'Y');

INSERT INTO Book_Information
VALUES (1, 'EECS213', "Computer Systems: A Programmer's Perspective", 9780136108047, 'Like New', 'South', 50.00, 'N');


#Find all sales with the inputted book name
SELECT *
FROM Book_Information
WHERE Book_name LIKE '%Algorithm%'
ORDER BY Price;

#Find all sales with the inputted ISBN
SELECT *
FROM Book_Information
WHERE ISBN LIKE '%978%'
ORDER BY Price;

#Find all sales with the class code
SELECT *
FROM Book_Information
WHERE Class_code LIKE '%MATH230%'
ORDER BY Price;