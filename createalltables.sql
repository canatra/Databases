CREATE TABLE product(pid int NOT NULL AUTO_INCREMENT, upc, productname, expdate_DATE, unit_cost DOUBLE, quantity int, min_threshold int, unit_price double, cid int, PRIMARY KEY(pid));

CREATE TABLE makers(mid int NOT NULL AUTO_INCREMENT, manufacturer varchar(64), Address varchar(64), Phone char(16), Website  varchar(64), PRIMARY KEY(makerid));

CREATE TABLE makes ( pid int NOT NULL AUTO_INCREMENT, mid   int, PRIMARY KEY(pid, mid));

CREATE TABLE Category( cid int NOT NULL AUTO_INCREMENT, catname varchar(64), Aisle int, description varchar(300), PRIMARY KEY( cid));

CREATE TABLE Customer(Cardnum int NOT NULL AUTO_INCREMENT, customername varchar(64), email varchar(64), address varchar(128), Primary Key (Cardnum));

CREATE TABLE Buy (tid int, pid int, quantitySold int, date DATE, storeID int, card_num int , PRIMARY KEY( tid));


CREATE TABLE  Store (storeid INT NOT NULL AUTO_INCREMENT, email varchar(64), name varchar(64), location varchar(128), phone char(16), PRIMARY KEY storeid);

CREATE TABLE Employee( emplid int NOT NULL AUTO_INCREMENT, employeename varchar(64), storeid int, job_type varchar(25), hoursperweek int, wages double, phone char(16), email varchar(64), SSN char(11), totalhours INT, PRIMARY KEY(emplid));

CREATE TABLE Carries (pid int, storeid int, PRIMARY KEY(pid, storeid));

