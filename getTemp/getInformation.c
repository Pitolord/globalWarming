#include <curl/curl.h>
#include <string.h>
#include <stdio.h>
#include <stdlib.h>

int main(int argc, char *argv[]){
	CURL *curl = curl_easy_init();
	if(curl) {
		char url[500] = "http://api.openweathermap.org/data/2.5/weather?q=";
		strcat(url, argv[1]);
		printf("%s\n", argv[1]);
		strcat(url,"&units=metric&APPID=b7c635aa6d4f700b3ffd7a54f01b4958"); 
		CURLcode res;
		curl_easy_setopt(curl, CURLOPT_URL, url);
  		res = curl_easy_perform(curl);
	}	
	return 0;
}



