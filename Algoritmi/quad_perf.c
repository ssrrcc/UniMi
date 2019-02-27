#include<stdio.h>
#define VALORI 30

int main() {
	int conta = 0;
	int quad = 1;
	while (conta<=VALORI) {
		quad = conta*conta;
		printf("%d\n", quad);
		conta++;
	}
}
