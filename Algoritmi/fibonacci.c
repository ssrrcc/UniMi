#include <stdio.h>

int fib(int n);

int main() {
	int n;
	scanf("%d", &n);
	printf("%d\n", fib(n));
}

int fib(int n) {
	
	if (n == 1) return 1;
	if (n == 2) return 1;
	
	return fib(n-1) + fib(n-2);
}
	
