#include <stdio.h>

int potenza(int b, int e);

int main() {
	int b, e;
	scanf("%d", &b);
	scanf("%d", &e);
	int p = potenza(b, e);
	printf("%d", p);
	return 0;
}

int potenza(int b, int e) {
	
	int p=1;
	for (int i=0; i<e; i++) {
		p*=b;
	}
	return p;
}
