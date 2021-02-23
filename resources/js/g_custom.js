
console.log('It is Working..');


document.querySelector('#g_dropDown').addEventListener('click', function() {

	var g_formLogout = document.querySelector('#g_formLogout');

	if(g_formLogout != undefined && g_formLogout != null){
		if(g_formLogout.getAttribute('visibility') == 'hidden') {
			g_formLogout.setAttribute('visibility', 'shown');
			document.querySelector('#g_formLogout').parentElement.parentElement.style.display = 'block';
		} else {
			g_formLogout.setAttribute('visibility', 'hidden');
			document.querySelector('#g_formLogout').parentElement.parentElement.style.display = 'none';
		}
	}

});