#include <stdio.h>
#include <string.h>
#include <stdlib.h>

int nbCharInFile(const char *fichier);
char *getInfo(char *data, char *dataType);

int main(){
	FILE *fp;
	char *command;
	int nbVilles = 0;
	int i = 0;
	char c;
	char **villes;
	char *data;
	int length = 0;
	char **dataType;
	int nbDataType = 0;
	int j = 0;
	
	//---- Importation du fichier texte listesVilles.txt ----//
	nbVilles = nbCharInFile("data/listeVilles.txt");
	villes = malloc(nbVilles * sizeof (*villes));
	for( i = 0; i< nbVilles; i++ ){
  		villes[i] = malloc( 50 * sizeof(*villes[i]) );
 	}
	fp = fopen("data/listeVilles.txt", "r");
	for(i = 0; i < nbVilles; i++)
		fscanf(fp, "%s\n", villes[i]);
	fclose(fp);

	//---- Importation dataType ----//
	nbDataType = nbCharInFile("data/dataType.txt");
	dataType = malloc(nbDataType * sizeof (*dataType));
	for( i = 0; i< nbDataType; i++ ){
  		dataType[i] = malloc( 15 * sizeof(*dataType[i]));
 	}
	fp = fopen("data/dataType.txt", "r");
	for(i = 0; i < nbDataType; i++)
		fscanf(fp, "%s\n", dataType[i]);
	fclose(fp);

	//---- Récupération des données de l'API ----//
	for(j=0;j<nbVilles;j++)
	{
		command = malloc(150 * sizeof(char));
		strcpy(command, "curl \"https://api.openweathermap.org/data/2.5/weather?q=");		
		strcat(command, villes[j]);
		strcat(command, "&units=metric&APPID=b7c635aa6d4f700b3ffd7a54f01b4958\" -o data/file.txt");
		system(command);
		free(command); //liberation de command

		//---- Importation des données de la ville ----//
		length = 600; // A REMPLACER PAR nbCharInFile
		data = malloc(length * sizeof(char));
		fp = fopen("data/file.txt", "r");
		i = 0;
		while(feof(fp) == 0)
		{
			fscanf(fp, "%c", &c);
			data[i] = c;
			i++;
		}
		fclose(fp);
		
		//---- Exportation des données ----//
		fp = fopen("data/allTemp.txt", "a");
		fprintf(fp,"%s;", villes[j]);
		for(i = 0; i < (nbDataType-1) ; i++)
			fprintf(fp, "%s;", getInfo(data, dataType[i]));
		fprintf(fp, "%s\n", getInfo(data, dataType[i]));
		fclose(fp);

		free(data);
	}

	//---- Liberation de la mémoire listes villes ----//
	for( i = 0; i < nbVilles; i++ ){
  		free( villes[i] );
  		villes[i] = NULL;
 	}
 	free(villes);
	return 0;
}

//---- FUNCTION ----//
int nbCharInFile(const char *fichier)
{
	FILE *fp;
	int nb;
	char c;
	fp = fopen(fichier, "r");
	while((c=fgetc(fp)) != EOF)
	{	
		if(c=='\n')
			nb++;			
	}
	fclose(fp);
	return nb;
}

char *getInfo(char *data, char *dataType){
    int i = strlen(dataType) + 2;
    int j = 0;
    char *info;
    info = malloc(10 * sizeof(char));
    data = strstr(data, dataType);
    if(data == NULL)
        return "NULL";
    if(data[i] == '\"')
        i++;
    while(data[i] != '}' && data[i] != '\"' && data[i] != ',')
    {
        info[j] = data[i];
        i++;
        j++;
    }
	info[j] = '\0';
    
    return info;
}