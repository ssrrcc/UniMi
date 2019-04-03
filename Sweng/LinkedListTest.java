package it.unimi.di.sweng.lab03;

import static org.assertj.core.api.Assertions.*;

import org.junit.Before;
import org.junit.Ignore;
import org.junit.Rule;
import org.junit.Test;
import org.junit.rules.Timeout;

public class LinkedListTest {

	@Rule
    public Timeout globalTimeout = Timeout.seconds(2);

	private IntegerList list;
	
	@Test
	public void testCostruttoreVuoto() {
		list = new IntegerList();
		assertThat(list.toString()).isEqualToIgnoringCase("[]");
	}
	@Test
	public void testAddLast() {
		list = new IntegerList();
		list.addLast(1);
		assertThat(list.toString()).isEqualToIgnoringCase("[1]");
		list.addLast(3);
		assertThat(list.toString()).isEqualToIgnoringCase("[1 3]");
	}

	@Test
	public void testString() {
		/*Esempio (1), la costruzione di una lista con parametro "" inizializza una lista vuota.
		  Esempio (2), se una lista viene inizializzata con parametro "1", il metodo toString restituisce: "[1]".
		  Esempio (3), se una lista viene inizializzata con parametro "1 2 3", il metodo toString restituisce: "[1 2 3]".
		  */

		list = new IntegerList("");
		assertThat(list.toString()).isEqualToIgnoringCase("[]");

		list = new IntegerList("1");
		assertThat(list.toString()).isEqualToIgnoringCase("[1]");

		list = new IntegerList("1 2 3");
		assertThat(list.toString()).isEqualToIgnoringCase("[1 2 3]");
	}
	@Test
	public void testException(){
		//Esempio, la costruzione di una lista con parametro "1 2 aaa" solleva l'eccezione (vedi NOTE IMPLEMENTATIVE in fondo)

		assertThatThrownBy(() -> {
			list = new IntegerList("1 2 aaa");
		})
				.isInstanceOf(IllegalArgumentException.class)
				.hasMessageContaining("Not supported input format.");
	}
	
}
