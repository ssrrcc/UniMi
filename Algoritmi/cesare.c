#include<stdio.h>

int main() {
	
	char c;
	int k;
	scanf("%d", &k);
	
	do {
		scanf("%c", &c);
		if (c>64 && c<91) {
			if ((c+k)>90) {
				c = 65 + (90-c);
			}
			else {
				c+=k;
			}
		}
		else {
			if (c>96 && c<123) {
				if ((c+k)>122) {
					c = 97 + (122-c);
				}
				else {
					c+=k;
				}
			}
		}
		printf("%c", c);
	} while(c!='.');
}
