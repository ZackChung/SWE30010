USE Pharmacy;

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