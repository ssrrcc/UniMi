#include<stdio.h>

int main() {
	int arr[100];
	int *p;
	
	for (p = &arr[0]; *p!=0;) {
		p++;
		scanf("%d", p);
	}
	
	p--;
	for (p; p>&arr[0]; p--) {
		printf("%d ", *p);
	}
	printf("\n");
	return 0;
}
