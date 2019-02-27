#include <stdio.h>

_Bool isPrime(int n);

int main() {
	int n;
	scanf("%d", &n);
	printf(isPrime(n) ? "Numero Primo\n" : "Numero non primo\n");
}

_Bool isPrime(int n) {
	
	if (n == 0) return 0;
	
	for (int i=n-1; i>1; i--) {
		if (n%i == 0) return 0;
	}
	return 1;
} 
