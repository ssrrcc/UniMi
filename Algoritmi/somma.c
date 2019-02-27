#include<stdio.h>

int main() {
	int conta = 0;
	int n;
	do {
		scanf("%d", &n);
		conta += n;
	} while (n!=0);
	printf("%d", conta);
	return 0;
}
