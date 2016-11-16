DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS restaurants;
DROP TABLE IF EXISTS reviews;
DROP TABLE IF EXISTS replies;

CREATE TABLE users (
    email VARCHAR PRIMARY KEY,
    username VARCHAR,
    password VARCHAR,
    birthdate DATE,
    isOwner INTEGER /* 1 if he is owner, 0 if he is reviewer */
    /* how to save images ? */
);


CREATE TABLE restaurants (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name VARCHAR,
    description VARCHAR,
    local VARCHAR,
    owner_email VARCHAR REFERENCES users
    /* how to save images ? */
);

CREATE TABLE reviews (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    score INTEGER,
    comment VARCHAR,
    date_review DATE,
    restaurant_id INTEGER REFERENCES restaurants,
    reviewer_email INTEGER REFERENCES users
);

CREATE TABLE replies (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    message VARCHAR,
    date_reply DATE,
    review_id INTEGER REFERENCES reviews
);

/* TODO: add inserts for default owner and reviewer (test purpose) */
