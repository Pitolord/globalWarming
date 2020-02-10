#include <stdio.h>
#include <string.h>
#include <stdlib.h>

int main(){
	FILE *fp;
	char **villes;
	char *command;
	int nbVilles = 0;
	int i = 0;
	char c;
	fp = fopen("listeVilles.txt", "r");
	while((c=fgetc(fp)) != EOF)
	{	
		if(c=='\n')
			nbVilles++;
	}
	/*
	while(fscanf(fp, "%s\n", villes[nb]) != -1)
	{

	}
	*/	
	fclose(fp);
	printf("%d\n", nbVilles);
	return 0;
}
