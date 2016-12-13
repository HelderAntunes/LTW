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
    review_id INTEGER REFERENCES reviews,
    username VARCHAR REFERENCES users
);

CREATE TABLE images (
    id INTEGER PRIMARY KEY,
    title VARCHAR NOT NULL,
    restaurant_id INTEGER REFERENCES restaurants
);
