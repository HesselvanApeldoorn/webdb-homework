create table question(q_number INT PRIMARY KEY, q_text VARCHAR(255) NOT NULL);
create table choice(c_number INT, quest_number INT, c_text VARCHAR(255) NOT NULL, correct BOOLEAN NOT NULL, PRIMARY KEY(c_number, quest_number), FOREIGN KEY(quest_number) REFERENCES question(q_number));
create table user(user_name VARCHAR(255) PRIMARY KEY, password VARCHAR(255) NOT NULL);
create table high_score(score INT NOT NULL, user_name VARCHAR(255), attempt INT, date_score DATETIME NOT NULL, PRIMARY KEY(user_name,attempt), FOREIGN KEY(user_name) REFERENCES user(user_name));

