
window.onload = function()
{
	SC.initialize
	({
		client_id: 'e2a6681bccff23130855618e14c481af'
	});

	var menuLinks = document.getElementsByClassName('genre');
	console.log('count of elements='+menuLinks.length);

	for (var i = 0; i < menuLinks.length; i++)
	{
  		menuLinks[i].addEventListener('click', function()
  		{
		/*    this.parentElement.getElementsByClassName('content')[0].classList.toggle('hidden');*/
			var temp=this.parentElement.getElementsByClassName('genre')[0].firstChild;
    		console.log('inner');
			playSomeSound(temp);
			console.log(temp);
		})
  	}
}


function playSomeSound(genre)
{
	console.log(genre);

	SC.get('/tracks', {
	  genres: genre, bpm: { from: 120 }
	}).then(function(tracks) {

		  	var random=Math.floor(Math.random()*49);
		  	console.log(random);
		  	console.log(tracks[random].uri);
		  	  	  SC.oEmbed(tracks[random].uri, {
    element: document.getElementById('putTheWidgetHere')});

	  console.log(tracks);
	});
}
