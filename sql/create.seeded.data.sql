--
--
--

-- band data
TRUNCATE `band`;
INSERT INTO `band`(name, start_date, website, still_active) VALUES ("Guns 'N Roses", "1985", "http://www.gunsnroses.com/", 1);
INSERT INTO `band`(name, start_date, website, still_active) VALUES ("Led Zeppelin", "1968", "http://www.ledzeppelin.com/", 0);
INSERT INTO `band`(name, start_date, website, still_active) VALUES ("Aerosmith", "1970", "http://www.aerosmith.com/", 1);
INSERT INTO `band`(name, start_date, website, still_active) VALUES ("Queen", "1970", "http://www.queenonline.com/", 1);



-- album data
TRUNCATE `album`;
INSERT INTO `album`(band_id, name, recorded_date, release_date, numberoftracks, label, producer, genre) VALUES ((SELECT id FROM `band` WHERE name = "Guns 'N Roses"), "Appetite For Destruction", "1987", "1987-07-21", 12, "Geffen", "Mike Clink", "hard rock");

INSERT INTO `album`(band_id, name, recorded_date, release_date, numberoftracks, label, producer, genre) VALUES ((SELECT id FROM `band` WHERE name = "Led Zeppelin"), "Led Zeppelin IV", "1971", "1971-11-08", 8, "Atlantic", "Jimmy Page", "hard rock");

INSERT INTO `album`(band_id, name, recorded_date, release_date, numberoftracks, label, producer, genre) VALUES ((SELECT id FROM `band` WHERE name = "Aerosmith"), "Toys In The Attic", "1975", "1975-04-08", 9, "Columbia", "Jack Douglas", "hard rock");

INSERT INTO `album`(band_id, name, recorded_date, release_date, numberoftracks, label, producer, genre) VALUES ((SELECT id FROM `band` WHERE name = "Queen"), "A Night at the Opera", "1975", "1975-11-21", 12, "EMI-Elektra", "Roy Thomas Baker", "hard rock");
