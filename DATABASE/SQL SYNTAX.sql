CREATE DATABASE	Pharmacy;

USE Pharmacy;

CREATE TABLE Product(
  Product_Code INT(20) NOT NULL,
  Product_Name VARCHAR(100) NOT NULL,
  Stock INT(255) NOT NULL,
  Sales_Price FLOAT(2) NOT NULL,
  Bought_Price FLOAT(2) NOT NULL,
  PRIMARY KEY (Product_Code)
);

CREATE TABLE Sales(
  Sales_Code INT(20) NOT NULL,
  Product_Code INT(20) NOT NULL,
  Sales_Quantity INT(100) NOT NULL,
  Date_Of_Purchase DATE NOT NULL,
  PRIMARY KEY (Sales_Code),
  FOREIGN KEY (Product_Code) REFERENCES Product(Product_Code)
);


