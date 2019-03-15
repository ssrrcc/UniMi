package it.unimi.di.sweng.lab01;

import static org.assertj.core.api.Assertions.*;

import org.junit.Before;
import org.junit.Test;

public class RomanNumeralsTest {

	private RomanNumerals romanNumerals;

	@Before
	public void setUp(){
		romanNumerals = new RomanNumerals();
	}


	@Test
	public void oneTwoThree() {
		assertThat(romanNumerals.arabicToRoman(1)).isEqualTo("I");
		assertThat(romanNumerals.arabicToRoman(2)).isEqualTo("II");
		assertThat(romanNumerals.arabicToRoman(3)).isEqualTo("III");
	}

	@Test
	public void five() {
		assertThat(romanNumerals.arabicToRoman(5)).isEqualTo("V");
	}


	@Test
	public void tenFifty() {
		assertThat(romanNumerals.arabicToRoman(10)).isEqualTo("X");
		assertThat(romanNumerals.arabicToRoman(50)).isEqualTo("L");
	}

	@Test
	public void fourNineFourtynine() {
		assertThat(romanNumerals.arabicToRoman(4)).isEqualTo("IV");
		assertThat(romanNumerals.arabicToRoman(9)).isEqualTo("IX");
	}


	@Test
	public void sixSevenEight() {
		assertThat(romanNumerals.arabicToRoman(6)).isEqualTo("VI");
		assertThat(romanNumerals.arabicToRoman(7)).isEqualTo("VII");
		assertThat(romanNumerals.arabicToRoman(8)).isEqualTo("VIII");
	}


	@Test
	public void twelveFourteen() {
		assertThat(romanNumerals.arabicToRoman(12)).isEqualTo("XII");
		assertThat(romanNumerals.arabicToRoman(14)).isEqualTo("XIV");
	}


	@Test
	public void twentySixEightythree() {
		assertThat(romanNumerals.arabicToRoman(26)).isEqualTo("XXVI");
		assertThat(romanNumerals.arabicToRoman(83)).isEqualTo("LXXXIII");
	}


	@Test
	public void fourtyFourtythreeFourtyFive() {
		assertThat(romanNumerals.arabicToRoman(40)).isEqualTo("XL");
		assertThat(romanNumerals.arabicToRoman(43)).isEqualTo("XLIII");
		assertThat(romanNumerals.arabicToRoman(45)).isEqualTo("XLV");
		assertThat(romanNumerals.arabicToRoman(49)).isEqualTo("XLIX");
	}


	@Test
	public void oneHundredFivehundredOnethousand() {
		assertThat(romanNumerals.arabicToRoman(100)).isEqualTo("C");
		assertThat(romanNumerals.arabicToRoman(500)).isEqualTo("D");
		assertThat(romanNumerals.arabicToRoman(1000)).isEqualTo("M");
	}


	@Test
	public void mixSix() {
		assertThat(romanNumerals.arabicToRoman(96)).isEqualTo("XCVI");
		assertThat(romanNumerals.arabicToRoman(496)).isEqualTo("CDXCVI");
		assertThat(romanNumerals.arabicToRoman(996)).isEqualTo("CMXCVI");
		assertThat(romanNumerals.arabicToRoman(2996)).isEqualTo("MMCMXCVI");
	}

	@Test(expected=IllegalArgumentException.class)
	public void illegalArgumentTest(){
		romanNumerals.arabicToRoman(0);
	}

	@Test(expected=IllegalArgumentException.class)
	public void illegalArgumentTest2(){
		romanNumerals.arabicToRoman(-33);
	}
		

	@Test
	public void mixArabicToRoman() {
		assertThat(romanNumerals.arabicToRoman(1223)).isEqualTo("MCCXXIII");
		assertThat(romanNumerals.arabicToRoman(1999)).isEqualTo("MCMXCIX");
		assertThat(romanNumerals.arabicToRoman(2781)).isEqualTo("MMDCCLXXXI");
		assertThat(romanNumerals.arabicToRoman(321)).isEqualTo("CCCXXI");
		assertThat(romanNumerals.arabicToRoman(3266)).isEqualTo("MMMCCLXVI");
		assertThat(romanNumerals.arabicToRoman(1211)).isEqualTo("MCCXI");
		assertThat(romanNumerals.arabicToRoman(1207)).isEqualTo("MCCVII");
	}


	@Test
	public void mixRomanToArabic() {
		assertThat(romanNumerals.romanToArabic("I")).isEqualTo(1);
		assertThat(romanNumerals.romanToArabic("II")).isEqualTo(2);
		assertThat(romanNumerals.romanToArabic("III")).isEqualTo(3);
		assertThat(romanNumerals.romanToArabic("IV")).isEqualTo(4);
		assertThat(romanNumerals.romanToArabic("V")).isEqualTo(5);
		assertThat(romanNumerals.romanToArabic("VI")).isEqualTo(6);
		assertThat(romanNumerals.romanToArabic("VII")).isEqualTo(7);
		assertThat(romanNumerals.romanToArabic("VIII")).isEqualTo(8);
		assertThat(romanNumerals.romanToArabic("IX")).isEqualTo(9);
		assertThat(romanNumerals.romanToArabic("X")).isEqualTo(10);
		assertThat(romanNumerals.romanToArabic("XI")).isEqualTo(11);
		assertThat(romanNumerals.romanToArabic("XII")).isEqualTo(12);
		assertThat(romanNumerals.romanToArabic("XIII")).isEqualTo(13);
		assertThat(romanNumerals.romanToArabic("XIV")).isEqualTo(14);
		assertThat(romanNumerals.romanToArabic("XV")).isEqualTo(15);
		
		assertThat(romanNumerals.romanToArabic("XL")).isEqualTo(40);
		assertThat(romanNumerals.romanToArabic("L")).isEqualTo(50);
		assertThat(romanNumerals.romanToArabic("XC")).isEqualTo(90);
		assertThat(romanNumerals.romanToArabic("C")).isEqualTo(100);
		assertThat(romanNumerals.romanToArabic("CD")).isEqualTo(400);
		assertThat(romanNumerals.romanToArabic("D")).isEqualTo(500);
		assertThat(romanNumerals.romanToArabic("CM")).isEqualTo(900);
		assertThat(romanNumerals.romanToArabic("M")).isEqualTo(1000);
		
		assertThat(romanNumerals.romanToArabic("MCCXXIII")).isEqualTo(1223);
		assertThat(romanNumerals.romanToArabic("MCMXCIX")).isEqualTo(1999);
		assertThat(romanNumerals.romanToArabic("MMDCCLXXXI")).isEqualTo(2781);
		assertThat(romanNumerals.romanToArabic("CCCXXI")).isEqualTo(321);
		assertThat(romanNumerals.romanToArabic("MCCXI")).isEqualTo(1211);
		assertThat(romanNumerals.romanToArabic("MCCVII")).isEqualTo(1207);	
	}
		

	@Test
	public void illegalArgumentTest3(){
		try{
			romanNumerals.romanToArabic("VL");
			failBecauseExceptionWasNotThrown(IllegalArgumentException.class);
		}catch(IllegalArgumentException e){
			assertThat(e).hasMessage("Invalid Roman numeral");
		}
		try{
			romanNumerals.romanToArabic("IIII");
			failBecauseExceptionWasNotThrown(IllegalArgumentException.class);
		}catch(IllegalArgumentException e){
			assertThat(e).hasMessage("Invalid Roman numeral");
		}
		try{
			romanNumerals.romanToArabic("XXXXV");
			failBecauseExceptionWasNotThrown(IllegalArgumentException.class);
		}catch(IllegalArgumentException e){
			assertThat(e).hasMessage("Invalid Roman numeral");
		}
		try{
			romanNumerals.romanToArabic("MMMM");
			failBecauseExceptionWasNotThrown(IllegalArgumentException.class);
		}catch(IllegalArgumentException e){
			assertThat(e).hasMessage("Invalid Roman numeral");
		}
	}
	
/**/
	
}
