#include <stdio.h>
#include <ctype.h>


char *maiuscolo (char *string) {

	for (int i=0; i<100; i++) {
		*(string+i) = toupper(*(string+i));
	}
	return string;
}

int main() {
	char str[] = "ciao";
	char *c;
	c = maiuscolo(str);
	for (int i=0; i<5; i++) {
		printf("%c", str[i]);
	}
	printf("\n%c\n", *c);
	return 0;
}
