#include <stdio.h>
int main() {
	int a, b;
	printf("inserisci il primo numero: ");
	scanf("%d", &a);
	printf("inserisci il secondo numero: ");
	scanf("%d", &b);
	printf("il maggiore è ");
	a > b ? printf("%d", a) : printf("%d" , b);
}
