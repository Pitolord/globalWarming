#include <stdio.h>
#include <string.h>
#include <stdlib.h>

int main(){
	FILE *fp;
	char *command;
	int nbVilles = 0;
	int i = 0;
	char c;
	char **villes;

	//---- Importation du fichier texte listesVilles.txt ----//
	fp = fopen("listeVilles.txt", "r");
	while((c=fgetc(fp)) != EOF)
	{	
		if(c=='\n')
			nbVilles++;			
	}
	fclose(fp);
	villes = malloc (nbVilles * sizeof (*villes));
	for( i = 0; i< nbVilles; i++ ){
  		villes[i] = (char*)malloc( 50 * sizeof(*villes[i]) );
 	}
	fp = fopen("listeVilles.txt", "r");
	i = 0;
	for(i=0;i < nbVilles; i++)
		fscanf(fp, "%s\n", villes[i]);
	fclose(fp);
	printf("%d\n", nbVilles);

	//---- Récupération des données de l'API ----//
	i = 0;
	command = malloc(50 * sizeof(char));
	strcpy(command, "./getTemp ");
	strcat(command, villes[i]);
	strcat(command, " > file.txt");
	printf("%s\n", command);
	//system(*command);

	//---- Liberation de la mémoire ----//
	for( i = 0; i < nbVilles; i++ ){
  		free( villes[i] );
  		villes[i] = NULL;
 	}
 	free(villes);
	return 0;
}
