CREATE TABLE IF NOT EXISTS employee (
                                    id SERIAL PRIMARY KEY,
                                    name varchar NOT NULL,
                                    username varchar NOT NULL,
                                    password varchar NOT NULL
);

CREATE TABLE IF NOT EXISTS cars (
                                    id SERIAL PRIMARY KEY,
                                    manufacture varchar NOT NULL,
                                    model varchar NOT NULL,
                                    year_of_manufacture int NOT NULL,
                                    price float NOT NULL,
                                    administrator INTEGER REFERENCES employee (id)
);


INSERT INTO employee VALUES (1, 'Gabor', 'gabor', 'gabor');
INSERT INTO employee VALUES (2, 'Alex', 'alex', 'alex');
INSERT INTO employee VALUES (3, 'Judit', 'judit', 'judit');
INSERT INTO cars VALUES (1, 'Mercedes', 'E300', '2010', 6500, 1);
INSERT INTO cars VALUES (2, 'Suzuki', 'Swift', '2011', 2800, 1);
INSERT INTO cars VALUES (3, 'BMW', 'M5', '2017', 8000, 2);
INSERT INTO cars VALUES (4, 'Audi', 'A6', '2015', 7200, 2);
INSERT INTO cars VALUES (5, 'Toyota', 'Yaris', '2014', 3300, 3);
INSERT INTO cars VALUES (6, 'Toyota', 'Corolla', '2009', 3000, 3);
INSERT INTO cars VALUES (7, 'Suzuki', 'Vitara', '2018', 3200, 1);
INSERT INTO cars VALUES (8, 'Audi', 'A3', '2011', 3100, 2);
