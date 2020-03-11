
filepath = 'places.txt'
#print("Line {}: {}".format(cnt, line.strip()))
import pyowm
import time
import datetime

owm = pyowm.OWM('b7c635aa6d4f700b3ffd7a54f01b4958')  # You MUST provide a valid API key
ofile = 'out/data-' + str(datetime.datetime.now())

f = open(ofile,"w")

with open(filepath) as fp:
    city = fp.readline().rstrip()
    while city:
        obs = owm.weather_at_place(city)
        o = city + ','
        o += str(obs.get_weather().get_temperature(unit='celsius')["temp_max"]) + ','
        o += str(obs.get_weather().get_temperature(unit='celsius')["temp_min"]) + ',' 
        o += str(obs.get_weather().get_temperature(unit='celsius')["temp"]) + ','
        o += str(obs.get_reception_time(timeformat='iso')) +',' 
        o += str(obs.get_location().get_lon())+ ','
        o += str(obs.get_location().get_lat())+ ','
        o += str(obs.get_weather().get_humidity())+ ','
        o += str(obs.get_weather().get_sunrise_time('iso'))+ ','
        o += str(obs.get_weather().get_sunset_time('iso'))+ ','
        o += str(obs.get_weather().get_pressure()['press'])+ ','
        o += str(obs.get_weather().get_detailed_status())+ ','
        o += str(obs.get_weather().get_reference_time(timeformat='iso'))
        o += '\n'
        f.write(o)

        city = fp.readline().rstrip()
        time.sleep(10)
    
f.close()


