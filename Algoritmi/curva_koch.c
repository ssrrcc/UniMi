#include "libpsgraph.h"
#include <stdio.h>

void curva(int i, float x) {
	if (i==0) {
		draw(x);
	}
	else {
		curva(i-1, x/3);
		turn(300);
		curva(i-1, x/3);
		turn(120);
		curva(i-1, x/3);
		turn(300);
		curva(i-1, x/3);
	}
}

void fiocco(int i, float x) {
	curva(i, x);
	turn(120);
	curva(i, x);
	turn(120);
	curva(i, x);
}
	

int main() {
	int i;
	float x;
	scanf("%d", &i);
	scanf("%f", &x);
	start("out.ps");
	fiocco(i, x);
	end();
	return 0;
}
		
