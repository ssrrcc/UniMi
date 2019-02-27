#include <stdio.h>

void scambia(int *p, int *q) {
	int n;
	n = *p;
	*p = *q;
	*q = n;
}

int main() {
	int a=3, b=4;
	printf("%d %d\n", a, b);
	scambia(&a, &b);
	printf("%d %d\n", a, b);
}
