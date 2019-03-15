package it.unimi.di.sweng.lab01;

public class RomanNumerals {

    public String arabicToRoman(int arabNumber) {
        if(arabNumber <= 0 || arabNumber >= 4000) throw new IllegalArgumentException();
        StringBuilder romanNumber = new StringBuilder();

        String roman[] = {"M", "CM", "D", "CD", "C", "XC", "L", "XL", "X", "IX", "V", "IV", "I"};
        int arab[] = {1000, 900, 500, 400, 100, 90, 50, 40, 10, 9, 5, 4, 1};

        for (int i = 0; i < arab.length; i++) {
            while (arabNumber >= arab[i]) {
                convert(arabNumber, romanNumber, arab[i], roman[i]);
                arabNumber -= arab[i];
            }
        }

        return romanNumber.toString();
    }

    public String convert (int arabNumber, StringBuilder romanNumber, int arabCompared, String romanChar){
        romanNumber.append(romanChar);
        return romanNumber.toString();
    }

    public int romanToArabic(String romanNumber) {
        for (int i = 1; i < 4000; i++) {
            if (romanNumber.equals(arabicToRoman(i))) {
                return i;
            }
        }
        throw new IllegalArgumentException("Invalid Roman numeral");
    }
}
