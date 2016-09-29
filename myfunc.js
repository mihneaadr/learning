function changecol(index){
	var x = document.getElementById(index);
	if (x.style.color == 'black') {
		x.style.color = 'red';
		binar[index] = 1;
	} else {
		x.style.color = 'black';
		binar[index] = 0;
	}
}
	//alert(typeof(x.style.color));
/*function changecol(unde){
				var x = document.getElementById(unde);
				x.style.color = 'red';
			}*/
//<script language = 'JavaScript' src = 'localhost/mihnea/myfunc.js'></script>
	//alert("test test");
	//return;
