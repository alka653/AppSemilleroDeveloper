var primatyCombo = document.getElementsByName('seleccionado1').value
alert(primatyCombo)
xhttp = new XMLHttpRequest()
xhttp.open('POST', '/post/'+ postId + '/likes')
xhttp.send()
xhttp.onreadystatechange = function (){
	if (this.readyState == XMLHttpRequest.DONE) {
		var response = JSON.parse(this.responseText)
		var request = response.data
		primatyCombo.html = request.data
	}
}