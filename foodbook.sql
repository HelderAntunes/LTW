DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS restaurants;
DROP TABLE IF EXISTS reviews;
DROP TABLE IF EXISTS replies;
DROP TABLE IF EXISTS images;
DROP TABLE IF EXISTS owners_restaurants;

CREATE TABLE users (
    username VARCHAR PRIMARY KEY,
    password VARCHAR,
    email VARCHAR,
    birthdate DATE
);

CREATE TABLE restaurants (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name VARCHAR,
    description VARCHAR,
    local VARCHAR
);

CREATE TABLE owners_restaurants (
    owner_username VARCHAR REFERENCES users,
    restaurant_id INTEGER REFERENCES restaurants
);

CREATE TABLE reviews (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    score INTEGER,
    comment VARCHAR,
    restaurant_id INTEGER REFERENCES restaurants,
    reviewer_username VARCHAR REFERENCES users
);

CREATE TABLE replies (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    message VARCHAR,
    review_id INTEGER REFERENCES reviews
);

CREATE TABLE images (
  id INTEGER PRIMARY KEY,
  title VARCHAR NOT NULL,
  restaurant_id INTEGER REFERENCES restaurants
);

/* SHA1 function online generator -> http://www.sha1-online.com */
INSERT INTO users VALUES ('bolacha', '4d3f90019cd763878ac59bc563f04cfae0be9b68', "bolacha@hotmail.com", "1990-09-02"); /* password = 'bolacha' */
INSERT INTO users VALUES ('biscoito', '4d3f90019cd763878ac59bc563f04cfae0be9b68', "biscoito@hotmail.com", "1990-09-06"); /* password = 'bolacha' */

INSERT INTO restaurants VALUES (NULL, 'Restaurante do bolacha', 'Bons almoços e jantares a preços elevados.', 'FEUP-bar das minas');
INSERT INTO restaurants VALUES (NULL, 'Restaurante do bolacha2', 'Má comida, mas bom preço.', 'FEUP-cantina');
