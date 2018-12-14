--function che inserisca tupla di rating dato titolo film e dati necessari
--input: titolo, source, date, scale, votes, score
--output: 0 se inserimento ha successo,
--		  1 se errore chiave primaria duplicata,
--		  2 se violazione chiave esterna (film non esiste),
--		  3 se vincoli not-null non sono rispettati

CREATE OR REPLACE FUNCTION insert_movie_rating 
(mv_title varchar(200), r_source varchar(200), r_check_date date,
r_scale numeric, r_votes integer, r_score numeric) RETURNS char AS $$

DECLARE

	return_value char;
	mv_id movie.id%TYPE;

BEGIN

return_value := '2';

	FOR mv_id IN SELECT id FROM imdb.movie WHERE lower(trim(official_title)) = lower(trim(mv_title))
	LOOP
		INSERT INTO rating(check_date, source, movie, scale, votes, score) VALUES (r_check_date, r_source, mv_id, r_scale, r_votes, r_score);
		return_value := '0';
	END LOOP;

	RETURN return_value;
	
	EXCEPTION
		WHEN unique_violation THEN
			RAISE INFO 'Errore. Inserimento chiave dupicata film%', mv_id;
			RETURN '1';
		WHEN not_null_violation THEN
			IF r_check_date IS NULL THEN
				RAISE INFO 'Errore. Violazione vincolo NOT NULL su check_date';
			END IF;
			IF r_source IS NULL THEN
				RAISE INFO 'Errore. Violazione vincolo NOT NULL su source';
			END IF;
			RETURN '3';
END;
$$ language 'plpgsql';

SELECT * FROM rating WHERE source = 'unimi';
