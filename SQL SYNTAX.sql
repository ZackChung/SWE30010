CREATE DATABASE	Pharmacy;

USE Pharmacy;

CREATE TABLE Product(
  Product_Code INT(20) NOT NULL AUTO_INCREMENT,
  Product_Name VARCHAR(100) NOT NULL,
  Stock INT(255) NOT NULL,
  Sales_Price FLOAT(2) NOT NULL,
  Bought_Price FLOAT(2) NOT NULL,
  PRIMARY KEY (Product_Code)
);

CREATE TABLE Sales(
  Sales_Code INT(20) NOT NULL AUTO_INCREMENT,
  Product_Code INT(20) NOT NULL,
  Sales_Quantity INT(100) NOT NULL,
  Date_Of_Purchase DATE NOT NULL,
  PRIMARY KEY (Sales_Code),
  FOREIGN KEY (Product_Code) REFERENCES Product(Product_Code)
);

INSERT INTO Product (Product_Name,Stock,Sales_Price,Bought_Price)
VALUES 				("Pain Relief 20 Capsules",50,6.09,3.00),
					("Cough & Cold Relief 200ml",50,12.75,4.50),
					("Fat Burner 10 tablets",20,79.99,20.00),
					("General Vitamins 150 tablets",45,24.99,5.60);
INSERT INTO Sales (Product_Code,Sales_Quantity,Date_Of_Purchase)
VALUES				(4,1,"2020-10-10"),
					(4,2,"2020-10-10"),
					(1,1,"2020-10-10"),
					(2,1,"2020-10-10"),
					(2,1,"2020-10-10"),
					(3,3,"2020-10-10"),
					(4,1,"2020-10-10"),
					(1,1,"2020-10-10");

