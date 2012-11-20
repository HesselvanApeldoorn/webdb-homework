INSERT INTO question(q_number, q_text) VALUES (1,"How does a duck know what direction south is?");
INSERT INTO question(q_number, q_text) VALUES (2,"How does he tell his wife from all the other ducks?");
INSERT INTO question(q_number, q_text) VALUES (3,"How come all my body parts so nicely fit together?");

INSERT INTO choice(c_number, quest_number, c_text, correct) VALUES (1, 1, "He doesn't", 0);
INSERT INTO choice(c_number, quest_number, c_text, correct) VALUES (2, 1, "Magnetic field", 1);
INSERT INTO choice(c_number, quest_number, c_text, correct) VALUES (3, 1, "Sonar", 0);
INSERT INTO choice(c_number, quest_number, c_text, correct) VALUES (4, 1, "GPS", 0);

INSERT INTO choice(c_number, quest_number, c_text, correct) VALUES (1, 2, "He doesn't", 0);
INSERT INTO choice(c_number, quest_number, c_text, correct) VALUES (2, 2, "Feathers", 0);
INSERT INTO choice(c_number, quest_number, c_text, correct) VALUES (3, 2, "Wedding ring", 1);
INSERT INTO choice(c_number, quest_number, c_text, correct) VALUES (4, 2, "GPS", 0);

INSERT INTO choice(c_number, quest_number, c_text, correct) VALUES (1, 3, "Glue", 0);
INSERT INTO choice(c_number, quest_number, c_text, correct) VALUES (2, 3, "Pressure", 0);
INSERT INTO choice(c_number, quest_number, c_text, correct) VALUES (3, 3, "I don't know", 1);
INSERT INTO choice(c_number, quest_number, c_text, correct) VALUES (4, 3, "Incorrect answer here <==", 0);
