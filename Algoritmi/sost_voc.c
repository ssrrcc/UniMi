#include <stdio.h>

char sost(char c, char s);

int main() {
	char s = getchar();
	getchar();
	char c;
	do {
		c = getchar();
		printf("%c", sost(c, s));
	} while (c != '.');
}

char sost(char c, char s) {
	if (c=='a' || c=='e' || c=='i' || c=='o' || c=='u') {
		return s;
	}
	else return c;
}
