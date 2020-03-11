

This application will retrieve all the meteorological data for a given list of cities. Those cities will be described in the file places.txt
The results will be left on the directory out. Each time the program is executed it will create a file called data which has associated the current date.
The format of the output is csv using the character ',' to separate the each item.

This software uses the library PyOWM which can be installed by means of the following command:

pip install pyowm



Once you have succeeded in retrieving all data, you can program the cron of hte raspberry for executing the python script onces per "day". In that case
you will have one file per execution.

You will get more information about the cron by following the links below:

https://www.dexterindustries.com/howto/auto-run-python-programs-on-the-raspberry-pi/

