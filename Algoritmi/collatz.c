#include <stdio.h>

int next_collatz(int n);

int main() {
	int n;
	int conta = 1;
	scanf("%d", &n);
	while (n>1) {
		n = next_collatz(n);
		printf("%d ", n);
		conta++;
	}
	printf("\n");
	printf("Lunghezza: %d\n", conta);
}

int next_collatz(int n) {
	if (n%2 == 0) return n/2;
	else return (n*3)+1;
}
