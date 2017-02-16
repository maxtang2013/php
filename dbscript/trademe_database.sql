
DROP TABLE user;
CREATE TABLE user (id INT UNIQUE NOT NULL AUTO_INCREMENT, firstName VARCHAR(20),lastName VARCHAR(20) NOT NULL, type INT NOT NULL, rating INT, PRIMARY KEY(id));


INSERT INTO user (firstName, lastName, type, rating) VALUES ('Max', 'Tang', 1, 100),('','Wen',1,320),('Echo','Shen',1,100), ('Joe', 'Wong', 2, 100), ('Teddy', 'Lee', 2, 100);


DROP TABLE contracts;
CREATE TABLE contracts (id INT UNIQUE NOT NULL AUTO_INCREMENT, employer INT NOT NULL, employee INT NOT NULL, projectId INT, startTime DATE, endTime DATE, status VARCHAR(10), ratingForEmployee INT, ratingForEmployer INT, commentsForEmployee VARCHAR(1000), commentsForEmployer VARCHAR(1000), PRIMARY KEY (id), FOREIGN KEY(employee) REFERENCES user(id), FOREIGN KEY(employer) REFERENCES user(id));


INSERT INTO contracts (employer, employee, projectId, startTime, endTime, status, ratingForEmployee, ratingForEmployer, commentsForEmployee, commentsForEmployer) VALUES (4, 1, 21, "2016-08-13", "2016-12-13", "Ended", 8, 8, "A capable programmer", "A good boss");

# find a list of employees who ever got a rating greater then 6.
SELECT user.firstName, contracts.projectId, contracts.ratingForEmployee FROM contracts LEFT JOIN user ON contracts.employee=user.id where contracts.ratingForEmployee > 6;

