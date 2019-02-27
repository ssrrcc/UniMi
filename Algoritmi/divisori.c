#include<stdio.h>

int main() {
	int n;
	scanf("%d", &n);
	int conta = n;
	while (conta>0) {
		if (n%conta==0) {
			printf("%d\n", conta);
		}
		conta--;
	}
}
