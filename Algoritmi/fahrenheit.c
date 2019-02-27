#include <stdio.h>
int main() {
	printf("Inserisci la temperatura in Celsius: ");
	float c, f;
	scanf("%f", &c);
	f = (c*9)/5+32;
	printf("%.1f\n", f);
}
