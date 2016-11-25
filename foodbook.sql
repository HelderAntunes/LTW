DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS restaurants;
DROP TABLE IF EXISTS reviews;
DROP TABLE IF EXISTS replies;

CREATE TABLE users (
    username VARCHAR PRIMARY KEY,
    password VARCHAR,
    email VARCHAR,
    birthdate DATE,
    user_type VARCHAR
);


CREATE TABLE restaurants (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name VARCHAR,
    description VARCHAR,
    local VARCHAR,
    owner_username VARCHAR REFERENCES users
);

CREATE TABLE reviews (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    score INTEGER,
    comment VARCHAR,
    date_review DATE,
    restaurant_id INTEGER REFERENCES restaurants,
    reviewer_username VARCHAR REFERENCES users
);

CREATE TABLE replies (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    message VARCHAR,
    date_reply DATE,
    review_id INTEGER REFERENCES reviews
);

/* SHA1 function online generator -> http://www.sha1-online.com */
INSERT INTO users VALUES ('bolacha', '4d3f90019cd763878ac59bc563f04cfae0be9b68', NULL, NULL, NULL); /* password = 'bolacha' */
