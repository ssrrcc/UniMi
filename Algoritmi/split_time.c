#include <stdio.h>

void split_time(long int tot_sec, int *h, int *m, int *s) {
	*h = tot_sec / 3600;
	tot_sec %= 3600;
	*m = tot_sec / 60;
	*s = tot_sec % 60;
}

int main() {
	long int sec = 6754;
	int h=0, m=0, s=0;
	split_time(sec, &h, &m, &s);
	printf("h = %d, m = %d, s = %d\n", h , m , s);
	return 0;
}
