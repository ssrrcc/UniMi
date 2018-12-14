--su inserimento di una tupla di location, verificare che d_role sia B o D e che la persona
--non abbia già una tupla con il medesimo d_role

SELECT * FROM location WHERE d_role <>'B' AND d_role <>'D';


--reperire le persone che hanno più di una tupla di nascita/morte

SELECT * FROM location AS l1
JOIN location AS l2
ON l1.person = l2.person
AND l1.d_role = l2.d_role
AND l1.country <> l2.country;

--cancellazione dei duplicati

DELETE FROM location
WHERE country = 'ITA' AND person = '0000138';

SELECT person, d_role FROM location GROUP BY person, d_role HAVING COUNT(*)>1;

--su inserimento di una tupla di location, verificare che:
--d_role sia B o D
--la persona non abbia già una tupla con il medesimo d_role

ALTER TABLE location ADD CONSTRAINT rolecheck CHECK (d_role IN ('B', 'D'));

CREATE OR REPLACE FUNCTION d_role_check() RETURNS TRIGGER AS $$
BEGIN

	PERFORM * FROM location WHERE person = NEW.person AND d_role = NEW.d_role;
	
	IF FOUND THEN
		RAISE INFO 'Inserimento annullato: esiste già una tupla con person = % e d_role = %',
		NEW.person, NEW.d_role;
		RETURN NULL;
	ELSE RETURN NEW;
	END IF;
	
END;
$$ language 'plpgsql';

CREATE TRIGGER check_person_location
BEFORE INSERT ON location
FOR EACH ROW EXECUTE PROCEDURE d_role_check();

--deve dare errore (solleva eccezione)
INSERT INTO location(person, country, d_role, city, region) VALUES ('0000138', 'ITA', 'B', 'Firenze', 'Toscana');
