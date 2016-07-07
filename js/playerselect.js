//variables

var playercounter = 2;

function inputadd () {
	playercounter += 1;
	document.getElementById('pselect'+playercounter).type = "text";
	document.getElementById('pselect'+playercounter).placeholder = playercounter+". Játékos";
	document.getElementById('start'+playercounter).style.display = "";
	if (playercounter == 10) {
		document.getElementById('p_addbutton').style.display = "none";
	}
}