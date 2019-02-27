#include<stdio.h>
int main() {
	
	int voti[5][5];
	
	for (int c=0; c<5; c++) {
		for (int r=0; r<5; r++) {
			scanf("%d", &voti[c][r]);
		}
	}
	
	float media_stud1=0.0;
	for (int i=0; i<5; i++) {
		media_stud1 += voti[i][0];
	}
	media_stud1 = media_stud1/5.0;
	printf("%f", media_stud1);
}
