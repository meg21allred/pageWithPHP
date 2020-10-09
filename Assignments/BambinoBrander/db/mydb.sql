
-- Log in table
CREATE TABLE user_login (
    id SERIAL PRIMARY KEY,
    userName VARCHAR(255) NOT NULL,
    userPassword VARCHAR(255) NOT NULL
    
);

-- Table for girl names
CREATE TABLE girl_names (
    id SERIAL PRIMARY KEY,
    girl_name VARCHAR(255) NOT NULL UNIQUE,
    def VARCHAR(255),
    origin VARCHAR(255)
);

-- Table for boy names
CREATE TABLE boy_names (
    id SERIAL PRIMARY KEY,
    boy_name VARCHAR(255) NOT NULL UNIQUE,
    def VARCHAR(255),
    origin VARCHAR(255)
);

-- Table of list of names picked by users
CREATE TABLE pickedNames (
    id SERIAL PRIMARY KEY,
    picked_girl_name VARCHAR(255),
    picked_boy_name VARCHAR(255),
    login_id INT,
    FOREIGN KEY (picked_girl_name) REFERENCES girl_names(girl_name),
    FOREIGN KEY (picked_boy_name) REFERENCES boy_names(boy_name),
    FOREIGN KEY (login_id) REFERENCES user_login(id)
);

