


CREATE TABLE Orders (
    oid INT NOT NULL AUTO_INCREMENT,   
    orderPlaceDate DATETIME,  /* the time that order placed */
    orderNote VARCHAR (255), 
    PRIMARY KEY (oid)
);



CREATE TABLE Menu (
    mid INT NOT NULL AUTO_INCREMENT,
    foodName VARCHAR (20),
    foodDescription VARCHAR (255),
    foodImage VARCHAR (255),
    foodPrice DECIMAL (10, 2),
    isDelete INT, /* used for lazy delete, 1 means deleted */
    PRIMARY KEY (mid) 
);



CREATE TABLE OrderDetails ( 
    odid INT NOT NULL AUTO_INCREMENT, 
    mid INT NOT NULL, 
    oid INT NOT NULL, 
    FOREIGN KEY (mid) REFERENCES Menu (mid), 
    FOREIGN KEY (oid) REFERENCES Orders (oid), 
    quantity INT, 
    itemTotal DECIMAL (10, 2),
    PRIMARY KEY (odid) 
);





