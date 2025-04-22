CREATE DATABASE instacart;

CREATE TABLE quality_reports (
    id INT AUTO_INCREMENT PRIMARY KEY,
    item VARCHAR(255) NOT NULL,
    report TEXT NOT NULL,
    date DATETIME DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO quality_reports (item, report) 
VALUES ('Apple', 'The quality of the apples is excellent.'),
       ('Banana', 'The bananas have some bruising.');
