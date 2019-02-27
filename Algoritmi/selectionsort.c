#include <stdio.h>

void selectionsort(int a[], int n) {
	if (n > 1) {
		int max = 0;
		int index;
		for (int i=0; i<n; i++) {
			if (a[i] > max) {
				max = a[i];
				index = i;
			}
		}
		int ultimo = a[n-1];
		a[n-1] = max;
		a[index] = ultimo;
		selectionsort(a, n-1);
	}
}

int main() {
	int a[] = {5, 3, 5, 78, 45, 2, 0, 6, 7, 9};
	selectionsort(a, 10);
	for (int i=0; i<10; i++) {
		printf("%d ", a[i]);
	}
	printf("\n");
	return 0;
}
