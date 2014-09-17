	$j=jQuery.noConflict(); // in order not to get a conflict rename to $something(document).rea ... etc.

	$j(document).ready(function() {
		
		var town = "Aarhus"; 
		var url = "http://api.openweathermap.org/data/2.5/weather?q=" + town;
		var iconPath = "http://openweathermap.org/img/w/";
		var png = ".png"; // ends the iconPath
		var data = "";
		var pink = "";
		var b = "<br>";		
		
		$j.ajax({
  			dataType: "jsonp",
  			url: url,
  			data: pink,
  			complete: function(){
  				console.log('json loaded. Here is the object: ');
  			},
  			
  			success: function(pink){
  			
				console.log(pink);		
  			  			
				// now we get the data and append it to #weather:
				
				$j("#weather").append(

						"<img src='"
						+ iconPath
						+ pink.weather[0].icon
						+ png 
						+ "' alt='weather symbol' /> <br clear='all'> "
					
						+ pink.name + " ("  + pink.sys.country + ") </strong>" + b						

						+ " Weather: " + pink.weather[0].description + b
						+ " Temperature: " + Math.round( ( pink.main.temp / 17.222) ) + "&deg;"  + b
						+ " Air pressure: " + pink.main.pressure + b
						+ " Humidity: " +  pink.main.humidity + "%"
				);
  			} // ends ajax
		}); // ends document ready
	}) // end ready()