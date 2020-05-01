const intro = document.querySelector(".intro");
const video = intro.querySelector("video");
const text = intro.querySelector("h1");
//END SECTION
const section = document.querySelector("section");
const end = section.querySelector("h1");

//SCROLLMAGIC
const controller = new ScrollMagic.Controller();

//Scenes
let scene = new ScrollMagic.Scene({
  duration: 9500,
  triggerElement: intro,
  triggerHook: 0
})
  .setPin(intro)
  .addTo(controller);

//Text Animation
const textAnim = TweenMax.fromTo(text, 3, { opacity: 1 }, { opacity: 0 });

let scene2 = new ScrollMagic.Scene({
  duration: 1200,
  triggerElement: intro,
  triggerHook: 0
})
  .setTween(textAnim)
  .addTo(controller);

//Video Animation
let accelamount = 0.3;
let scrollpos = 0;
let delay = 0;

scene.on("update", e => {
  scrollpos = e.scrollPos / 1000;
});

setInterval(() => {
  delay += (scrollpos - delay) * accelamount;
  console.log(scrollpos, delay);

  video.currentTime = delay;
}, 33.3);


/*
$('#form').submit(function () {
 afficher();
 return false;
});
*/
//,  , 
function afficher(){
	var locations = [];
	locations.push({lat: 41.902782, lng: 12.496366});
	locations.push({lat: 33.8933182, lng: 33.8933182});
	locations.push({lat: 30.427755, lng: -9.598107});
	locations.push({lat: 42.57, lng: -8.66556});
	locations.push({lat: 43.3713493, lng: -8.3959999});
	locations.push({lat: 40.4165001, lng: -3.7025599});
	locations.push({lat: 48.8534088, lng: 2.3487999});
	locations.push({lat: 44.836151, lng: -0.580816});

	//var locations = [, ,  , ,
	//];
	var arrayLength = locations.length;
	for (var i = 0; i < arrayLength; i++) 
		var marker = new google.maps.Marker({ position: locations[i], map: map, title: 'Test'});
	
	
}

