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

INSERT INTO user VALUES('lol','3dd28c5a23f780659d83dd99981e2dcb82bd4c4bdc8d97a7da50ae84c7a7229a6dc0ae8ae4748640a4cc07ccc2d55dbdc023a99b3ef72bc6ce49e30b84253dae');
INSERT INTO user VALUES('henk', 'c1b13157df74145d5213c8f4b38d2962b6c4083613c79204ec793e786b21c95885e839a6c0181735692fcb9902066dd486ce4956d97b883e4eb18ed60ba66301');

insert into high_score values(3, 'lol', 1, '1980-01-01 00:00:00');
insert into high_score values(2, 'lol', 2, '1988-01-01 00:00:00');
insert into high_score values(1, 'lol', 3, '2012-01-01 00:00:00');
insert into high_score values(3, 'lol', 4, '2012-01-01 00:00:09');

insert into high_score values(0, 'henk', 1, '1981-01-01 00:00:00');
insert into high_score values(2, 'henk', 2, '1987-01-01 00:00:00');
insert into high_score values(0, 'henk', 3, '2012-01-01 07:00:00');
insert into high_score values(3, 'henk', 4, '2011-01-01 00:00:09');
insert into high_score values(3, 'henk', 5, '2011-01-01 00:00:09');
insert into high_score values(1, 'henk', 6, '2011-01-01 00:00:09');
