CREATE TABLE `recomendeme`.`recomendation` (
  `recomendationID` INT NOT NULL AUTO_INCREMENT,
  `CustomerID` VARCHAR(45) NULL,
  `recomendation` VARCHAR(45) NULL,
  `scoreComponentsID` INT NULL,
  `score` INT(10) NULL,
  PRIMARY KEY (`recomendationID`));

  CREATE TABLE `recomendeme`.`scoreComponents` (
  `scoreComponentsID` INT NOT NULL AUTO_INCREMENT,
  `category` VARCHAR(99) NULL,
  `quantity` INT(5) NULL,
  PRIMARY KEY (`scoreComponentsID`));

CREATE TABLE `recomendeme`.`alsobought` (
  `alsoboughtID` INT NOT NULL AUTO_INCREMENT,
  `ProductID` VARCHAR(45) NULL,
  `recommendation` VARCHAR(99) NULL,
  `customersWhoAlsoBuyed` VARCHAR(45) NULL,
  PRIMARY KEY (`alsoboughtID`));

  CREATE TABLE `recomendeme`.`similarity` (
  `similarityID` INT NOT NULL AUTO_INCREMENT,
  `CustomerID` VARCHAR(45) NULL,
  `productName` VARCHAR(99) NULL,
  `Score` VARCHAR(45) NULL,
  PRIMARY KEY (`similarityID`));

   insert into recomendeme.recomendation (CustomerID, recomendation, scoreComponentsID, score)
  values
("QUEDE", "Chef Antons Cajun Seasoning",1,5),
("QUEDE", "Louisiana Hot Spiced Okra",1,5),
("QUEDE", "Genen Shouyu",1,5),
("QUEDE", "Chef Antons Gumbo Mix",1,5),
("QUEDE", "Aniseed Syrup",1,5),
("QUEDE", "Northwoods Cranberry Sauce",1,5),
("QUEDE", "Sirop dérable",1,5),
("QUEDE", "NuNuCa Nuß-Nougat-Creme",2,3),
("QUEDE", "Schoggi Schokolade",2,3),
("QUEDE", "Sir Rodneys Marmalade",2,3);

---

 insert into recomendeme.scoreComponents (category, quantity)
  values
("Condiments",5),
("Confections",3);

 ---

  insert into recomendeme.alsobought (ProductID, recommendation, customersWhoAlsoBuyed)
  values
("Raclette Courdavault","20"),
("Camembert Pierrot","19"),
("Jack's New England Clam Chowder","18"),
("Gorgonzola Telino","17"),
("Chai","17"),
("Scottish Longbreads","17"),
("Tourtière","16"),
("Pâté chinois","16"),
("Tarte au sucre","15"),
("Steeleye Stout","15"),
("Boston Crab Meat","15"),
("Flotemysost","15"),
("Rössle Sauerkraut","15"),
("Gnocchi di nonna Alice","14"),
("Lakkalikööri","14"),
("Teatime Chocolate Biscuits","14"),
("Pavlova","14"),
("Alice Mutton","14"),
("Chang","14"),
("Manjimup Dried Apples","14"),
("Rhönbräu Klosterbier","14"),
("Ikura","14"),
("Filo Mix","14"),
("Konbu","13"),
("Ipoh Coffee","13");

 ---

 insert into recomendeme.similarity (CustomerID, productName, Score)
  values
("QUEDE", "Sir Rodneys Marmalade","1.9726381751876665"),
("QUEDE", "Louisiana Hot Spiced Okra","1.919730115416895"),
("QUEDE", "Chocolade","1.535784092333516"),
("QUEDE", "Chef Antons Gumbo Mix","1.5214795367813438"),
("QUEDE", "Mozzarella di Giovanni","1.3425260988556393"),
("QUEDE", "Gustafs Knäckebröd","1.2370961583568525"),
("QUEDE", "Alice Mutton","1.2102973460342987"),
("QUEDE", "Aniseed Syrup","1.204746129020908"),
("QUEDE", "Rössle Sauerkraut","0.8341346729021357"),
("QUEDE", "Tunnbröd","0.7854939336864548"),
("QUEDE", "Côte de Blaye","0.7424850565878052"),
("QUEDE", "Schoggi Schokolade","0.6961805265805537"),
("QUEDE", "Outback Lager","0.6586408990309005"),
("QUEDE", "Gnocchi di nonna Alice","0.5692349795732121"),
("QUEDE", "Spegesild","0.5228823819388431"),
("QUEDE", "Sirop dérable","0.5128451469417615"),
("QUEDE", "Uncle Bobs Organic Dried Pears","0.5011105552619636"),
("QUEDE", "Geitost","0.39568061476317684"),
("QUEDE", "Rogede sild","0.30198526594418795"),
("QUEDE", "Wimmers gute Semmelknödel","0.2660235048731333"),
("QUEDE", "Guaraná Fantástica","0.2605763641303466"),
("QUEDE", "Tarte au sucre","0.2235309181258307"),
("QUEDE", "Pâté chinois","0.1238721382127081"),
("QUEDE", "Boston Crab Meat","0.1192573666477772"),
("QUEDE", "Northwoods Cranberry Sauce","0.10542994049878675");