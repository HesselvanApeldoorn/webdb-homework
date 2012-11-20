create table question(q_number INT PRIMARY KEY, q_text VARCHAR(255) NOT NULL);
create table choice(c_number INT, quest_number INT, c_text VARCHAR(255) NOT NULL, correct BOOLEAN NOT NULL, PRIMARY KEY(c_number, quest_number), FOREIGN KEY(quest_number) REFERENCES question(q_number));
