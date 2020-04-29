
puts "city, max_temp, min_temp, temp, reception time(iso),  longitude, latitude, humitidy, surise time (iso), sunset time (iso), pressure, detailed status, reference time (iso)\n"



for i in ARGV 
  File.readlines(i).each do |f|
      puts f
  end   
end
