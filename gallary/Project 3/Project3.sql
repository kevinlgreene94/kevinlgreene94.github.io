/*********************************************************************
* Date		Programmer		Description								 *
*																	 *
* 3/4/2022	KGreene			Initial creation of disk database		 *
*																	 *							
* 3/10/2022 KGreene			Additional notation	added				 *
*																	 *
* 3/11/2022 KGreene			Added data to disk_type,				 *
*	disk_genre, disk_status, borrower, disk_table, and				 *
*	disk_has_borrower												 *
*																	 *
* 3/18/22 KGreene			Showed all borrowed disks				 *
*							Showed all disks in database			 *
*							Showed disks without borrowers			 *
*							Showed disks on outstanding loan		 *
*							Showed disks borrowed more than once	 *
*							Created view for borrowers who never	 *
*							borrowed a disk							 *
*							Showed borrowers with more than one disk *
*																	 *
* 3/28/2022 KGreene			Created procedures for CH15 Lab			 *
*																	 *
*																	 *
**********************************************************************/

use master;
go
DROP DATABASE IF EXISTS disk_inventorykg; --destroy database to prevent duplication or error
go
CREATE DATABASE disk_inventorykg; -- Create database
go
--Add server user
IF SUSER_ID('diskUserkg') IS NULL
	CREATE LOGIN diskUserkg
	WITH PASSWORD = 'Pa$$w0rd',
	DEFAULT_DATABASE = disk_inventorykg;
USE disk_inventorykg;
go
--Add DB user
CREATE USER diskUserkg;
ALTER ROLE db_datareader
	ADD MEMBER diskUserkg;
go
--Create Lookup Tables
CREATE TABLE disk_type (
	disk_type_id	INT	NOT NULL	PRIMARY KEY IDENTITY,
	descrip			VARCHAR(20) NOT NULL
	--type = CD, DVD, Vinyl, 8track, cassette
);
CREATE TABLE disk_status (
	status_id	INT NOT NULL	PRIMARY KEY IDENTITY,
	descrip		VARCHAR(20) NOT NULL
	--status = AVAILABLE, ONLOAD, DAMAGED, BROKEN 
);
CREATE TABLE disk_genre (
	genre_id	INT NOT NULL	PRIMARY KEY IDENTITY,
	descrip		VARCHAR(20) NOT NULL
	--genre = ROCK, METAL, RAP, COUNTRY, FOLK
 );
 CREATE TABLE borrower (
	borrower_id		INT NOT NULL	PRIMARY KEY IDENTITY,
	fname		NVARCHAR(60) NOT NULL,
	lname		NVARCHAR(60) NOT NULL,
	phone_num	VARCHAR(15) NOT NULL
 );
 CREATE TABLE disk_table (
	disk_id			INT NOT NULL	PRIMARY KEY IDENTITY,
	disk_name		NVARCHAR(100) NOT NULL,
	release_date	DATE NOT NULL,
	disk_type_id	INT NOT NULL	REFERENCES disk_type(disk_type_id),
	genre_id		INT NOT NULL	REFERENCES disk_genre(genre_id),
	status_id		INT NOT NULL	REFERENCES disk_status(status_id)
 );
 CREATE TABLE disk_has_borrower (
	disk_has_borrower_id		INT NOT NULL	PRIMARY KEY IDENTITY,
	disk_id						INT NOT NULL	REFERENCES disk_table(disk_id),
	borrower_id					INT NOT NULL	REFERENCES borrower(borrower_id),
	borrow_date					DATETIME2 NOT NULL,
	return_date					DATETIME2 NULL
 );

/*******************************
	NEW CODE 03/11/2022
********************************/

 --Insert new disk types
 INSERT dbo.disk_type
		(descrip)
VALUES
	('CD'),
	('Vinyl'),
	('8Track'),
	('Cassete'),
	('DVD');
GO
--SELECT * FROM dbo.disk_type

--Insert disk genres
INSERT dbo.disk_genre(descrip)
VALUES
	('Rock'),
	('Rap'),
	('Country'),
	('Pop'),
	('Bluegrass');
GO
--SELECT * FROM dbo.disk_genre

--Insert disk status
INSERT dbo.disk_status(descrip)
VALUES
	('New'),
	('Used'),
	('Rental/Available'),
	('Rental/Unavailable'),
	('Damaged');
GO
--SELECT * FROM dbo.disk_status;

--Create Inventory
INSERT dbo.disk_table
	(disk_name, release_date, disk_type_id, genre_id, status_id)
VALUES 
	('Dark Side Of The Moon', '1973-03-01', 2, 1, 2),
	('The Wall', '1979-11-30', 4, 1, 4),
	('Are You Experienced', '1967-08-23', 3, 1, 5),
	('Band of Gypsys', '1970-04-25', 5, 1, 1),
	('The Blueprint', '2001-09-11', 1, 2, 3),
	('Enter The Wu-Tang', '1993-11-09', 4, 2, 2),
	('Ready To Die', '1994-09-13', 4, 2, 4),
	('The Slim Shady LP', '1999-02-23', 1, 2, 3),
	('The Grand Tour', '1974-08-07', 3, 3, 2),
	('Always and Forever', '1987-05-04', 4, 3, 5),
	('At Folsom Prison', '1968-05-06', 2, 3, 4),
	('Waylon and Willie', '1978-01-30', 4, 3, 2),
	('Positions', '2020-10-30', 1, 4, 4),
	('Love In 4D', '2021-06-10', 1, 4, 1),
	('thank u, next', '2018-11-03', 5, 4, 2),
	('Sweetener', '2018-08-17', 1, 4, 3),
	('Foggy Mountain Jamboree', '1957-01-27', 3, 5, 5),
	('Country Pickin and Singin', '1957-02-27', 4, 5, 2),
	('Knee Deep In Bluegrass ', '1958-06-01', 2, 5, 2),
	('Country Songs, Old and New', '1959-04-09', 3, 5, 2);
GO

--SELECT * FROM dbo.disk_table

--Create Borrowers
INSERT dbo.borrower
	(fname, lname, phone_num)
VALUES 
	('John', 'Dutton', '212-222-2334'),
	('Michael', 'Scott','123-654-3456'),
	('Dwight', 'Schrute', '212-654-2235'),
	('Jim', 'Halpert', '212-364-6534'),
	('Pam', 'Beasley','245-526-2342'),
	('Kevin', 'Malone','643-543-2642'),
	('Kelley', 'Kapour','272-262-2232'),
	('Stanley', 'Hudson', '516-262-2662'),
	('Toby', 'Flenderson','212-435-3442'),
	('Jan', 'Levinson', '252-322-2542'),
	('Creed', 'Bratton', '453-234-5342'),
	('Meredith', 'Palmer', '322-542-1465'),
	('Eddard', 'Stark', '245-562-2647'),
	('Catlyn', 'Tully', '258-752-1545'),
	('Theon', 'Greyjoy', '342-335-2342'),
	('Robert', 'Baratheon', '212-623-7642'),
	('Tyrion', 'Lannister','632-242-2364'),
	('Gendry', 'Stone','645-876-6343'),
	('Ramsay', 'Snow', '546-257-2845'),
	('Aegon', 'Targaryen','594-844-2433'),
	('Tormund', 'Giantsbane','532-384-2435');
GO
--SELECT * FROM borrower
--Delete Borrower

DELETE borrower
WHERE phone_num = '532-384-2435'
GO

--Insert Disk has borrower data
-- disk id 2 unrelated and borrower id 5 unrelated
INSERT dbo.disk_has_borrower
	(disk_id, borrower_id, borrow_date, return_date)
VALUES
	(1, 1, '2021-04-02', '2021-04-08'),
	(1, 1, '2022-02-18', NULL),
	(3, 8, '2022-01-12', '2022-01-20'),
	(11, 6, '2021-03-12', '2021-03-20'),
	(3, 14, '2021-03-12', '2021-05-20'),
	(12, 18, '2021-04-02', '2021-06-18'),
	(19, 16, '2022-02-18', NULL),
	(20, 14, '2022-01-12', NULL),
	(12, 6, '2018-01-12', '2019-01-20'),
	(5, 9, '2021-06-12', '2021-11-20'),
	(6, 10, '2021-03-12', '2021-04-18'),
	(17, 7, '2022-03-10', NULL),
	(13, 2, '2022-03-09', NULL),
	(16, 15, '2021-08-22', '2021-09-20'),
	(4, 6, '2021-11-12', '2021-12-20'),
	(16, 3, '2021-09-02', '2021-12-08'),
	(5, 4, '2022-02-18', NULL),
	(7, 9, '2022-01-12', '2022-01-20'),
	(5, 16, '2022-01-12', '2022-01-20'),
	(3, 17, '2022-01-12', '2022-01-20');
GO

SELECT * FROM disk_has_borrower
WHERE return_date IS NULL;

/*******************************
	NEW CODE 03/18/2022
********************************/
--Show all disks in database with release date, disk type, disk genre, disk status

SELECT 'Disk Name'=disk_name, release_date AS 'Release Date' , disk_type.descrip AS 'Disk Type', disk_genre.descrip AS 'Disk Genre', disk_status.descrip AS 'Disk Status'
FROM disk_table
JOIN disk_type
ON disk_table.disk_type_id = disk_type.disk_type_id
JOIN disk_genre 
ON disk_table.genre_id = disk_genre.genre_id
JOIN disk_status
ON disk_table.status_id = disk_status.status_id
ORDER BY disk_name;
GO

--Show all borrowed disks
SELECT lname, fname, disk_name, borrow_date, return_date
FROM disk_has_borrower
JOIN Borrower
	ON disk_has_borrower.borrower_id = borrower.borrower_id
JOIN disk_table
	ON disk_has_borrower.disk_id = disk_table.disk_id
ORDER BY lname;
GO

--Show disks that have been borrowed more than once
SELECT disk_name, count(*)
FROM disk_has_borrower
JOIN disk_table
ON disk_has_borrower.disk_id = disk_table.disk_id
GROUP BY disk_name
HAVING COUNT(*) > 1
ORDER BY disk_name;
GO

--Show disks outstanding or on-loan
SELECT disk_name, borrow_date, return_date, lname, fname
FROM disk_has_borrower
JOIN borrower ON disk_has_borrower.borrower_id = borrower.borrower_id
JOIN disk_table ON disk_has_borrower.disk_id = disk_table.disk_id
WHERE return_date IS NULL
ORDER BY disk_name;
GO

--Create view for borrowers who have not borrowed a disk.
DROP VIEW IF EXISTS View_Borrower_No_Loans;
GO
CREATE VIEW View_Borrower_No_Loans
AS
SELECT borrower_id, lname, fname
FROM borrower 
WHERE borrower_id NOT IN (
SELECT DISTINCT borrower_id
FROM disk_has_borrower)

GO
SELECT lname, fname
FROM View_Borrower_No_Loans
ORDER BY lname, fname;
GO

--Show borrowers with more than 1 borrow
SELECT lname, fname, count(disk_id) AS times_borrowed
FROM disk_has_borrower
JOIN borrower ON disk_has_borrower.borrower_id = borrower.borrower_id
GROUP BY lname, fname
HAVING count(*) > 1
ORDER BY lname, fname 
GO

--WK5 Day 1 Lab - CH15

USE disk_inventorykg;
GO

DROP PROC IF EXISTS sp_ins_disk_has_borrower;
GO

CREATE PROC sp_ins_disk_has_borrower
	@borrower_id int, @disk_id int, @borrow_date datetime2, @return_date datetime2 = NULL
AS
BEGIN TRY
	INSERT disk_has_borrower
		(disk_id, borrower_id, borrow_date, return_date)
	VALUES
		(@borrower_id, @disk_id, @borrow_date, @return_date);
END TRY
BEGIN CATCH
	PRINT 'An error occured.';
	PRINT 'Message: ' + CONVERT(VARCHAR(200), ERROR_MESSAGE());
END CATCH
GO
GRANT EXEC ON sp_ins_disk_has_borrower TO diskUserkg;
GO

sp_ins_disk_has_borrower 2, 3, '3-27-2022', '3-28-2022'; -- 1 row affected
GO
sp_ins_disk_has_borrower 4, 6, '3-27-2022'; -- 1 row affected
GO
sp_ins_disk_has_borrower 44, 5, '3-27-2022'; -- 0 rows affected
GO

DROP PROC IF EXISTS sp_upd_disk_has_borrower;
GO

CREATE PROC sp_upd_disk_has_borrower
	@disk_has_borrower_id int, @borrower_id int, @disk_id int, @borrow_date datetime2, @return_date datetime2 = NULL
AS
BEGIN TRY
	UPDATE disk_has_borrower
		SET borrower_id = @borrower_id,
			disk_id = @disk_id,
			borrow_date = @borrow_date,
			return_date = @return_date
		WHERE disk_has_borrower_id = @disk_has_borrower_id;
END TRY
BEGIN CATCH
	PRINT 'An error occurred.';
	PRINT 'Message: ' + CONVERT(varchar, ERROR_MESSAGE());
END CATCH
GO
sp_upd_disk_has_borrower 22, 2, 3, '3-01-2022', '3-28-2022';
GO
sp_upd_disk_has_borrower 22, 2, 3, '3-01-2022';
GO
sp_upd_disk_has_borrower 44, 2, 3, '3-01-2022';
GO