
-- Log in table
CREATE TABLE user_login (
    id SERIAL PRIMARY KEY,
    userName VARCHAR(255) NOT NULL,
    userPassword VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL
    
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

-- girl names
INSERT INTO girl_names (girl_name, def, origin) VALUES ('Abbey', 'Nunnery', 'English');
INSERT INTO girl_names (girl_name, def, origin) VALUES ('Amelia', 'Work', 'Latin');
INSERT INTO girl_names (girl_name, def, origin) VALUES ('Violet', 'Purple', 'English');
INSERT INTO girl_names (girl_name, def, origin) VALUES ('Aria', 'Solo Melody', 'Italian');
INSERT INTO girl_names (girl_name, def, origin) VALUES ('Vivienne', 'Alive', 'French');
INSERT INTO girl_names (girl_name, def, origin) VALUES ('Genevieve', 'Woman of the Family', 'French');
INSERT INTO girl_names (girl_name, def, origin) VALUES ('Freya', 'Goddess of Love', 'Scandinavian');
INSERT INTO girl_names (girl_name, def, origin) VALUES ('Sophia', 'Wisdom', 'Greek');
INSERT INTO girl_names (girl_name, def, origin) VALUES ('Lorelei', 'Alluring Enchantress', 'German');
INSERT INTO girl_names (girl_name, def, origin) VALUES ('Ophelia', 'Helper', 'Greek');

-- boy names
INSERT INTO boy_names (boy_name, def, origin) VALUES ('Finn', 'Fair', 'Irish');
INSERT INTO boy_names (boy_name, def, origin) VALUES ('Emmett', 'Entire', 'English');
INSERT INTO boy_names (boy_name, def, origin) VALUES ('Archer', 'Bowman', 'English');
INSERT INTO boy_names (boy_name, def, origin) VALUES ('Wyatt', 'Son of Guy', 'English');
INSERT INTO boy_names (boy_name, def, origin) VALUES ('Harrison', 'Son of Harry', 'English');
INSERT INTO boy_names (boy_name, def, origin) VALUES ('Rowan', 'From the Rowan Tree', 'English');
INSERT INTO boy_names (boy_name, def, origin) VALUES ('Maxwell', 'From the Spring of Maccus', 'Irish');
INSERT INTO boy_names (boy_name, def, origin) VALUES ('Grayson', 'Son of the Grey-Haired One', 'English');
INSERT INTO boy_names (boy_name, def, origin) VALUES ('Landon', 'From the Long Hill', 'English');
INSERT INTO boy_names (boy_name, def, origin) VALUES ('Miles', 'Soldier', 'Latin');
INSERT INTO boy_names (boy_name, def, origin) VALUES ('Theo', 'Divine Gift', 'Greek');






