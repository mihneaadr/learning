function deseneaza(canvas, tip, puncte, culoareBorder, grosimeBorder, culoareContinut) {
	if (document.getElementById(canvas).getContext('2d')) {
		cnt = document.getElementById(canvas).getContext('2d');
	} else {
		alert('Nu a fost gasit un canvas valabil!');
		return;
	}
	
	var type = tip;
	var pct  = puncte.split('/');
	//var cb   = culoareBorder;
	//var gb   = grosimeBorder;
	//var cc   = culoareContinut;
	
    cnt.save();

	if (culoareBorder !== undefined) {
		cnt.strokeStyle = culoareBorder;
	} else {
		cnt.strokeStyle = '#000000';
	}

	if (grosimeBorder !== undefined) {
		cnt.lineWidth = grosimeBorder;
	} else {
		cnt.lineWidth = 2;
	}
	
	if (culoareContinut !== undefined) {
		cnt.fillStyle = culoareContinut;
	}



	cnt.beginPath();
	if (type == 'arc') {
		for (var i = 0; i < pct.length; i++) {
			cnt.arc(pct[i].split('-')[0], pct[i].split('-')[1], pct[i].split('-')[2], pct[i].split('-')[3], pct[i].split('-')[4])


			//INCOMPLET!!!!!!
		};
	} else {
		

		cnt.moveTo(pct[0].split('-')[0], pct[0].split('-')[1]);
		for (var i = 1; i < pct.length; i++) {
			cnt.lineTo(pct[i].split('-')[0], pct[i].split('-')[1]);
		}
		if (type = 'poligon') {
			cnt.closePath();
		}
		cnt.stroke();
        if (culoareContinut !== undefined) {
            cnt.fill();
	}
    cnt.restore();
}








function camera(canvas, pereti, geamuri) {
    var cnt = canvas.getContext('2d');
    cnt.save();
    deseneaza(canvas, poligon, pereti);
    cnt.globalCompositeOperation = 'source-over'
    deseneaza(canvas, linii, geamuri, '#0000ff');
    cnt.restore();
}






function optiuni(canvas, nrCam, coord, stareOc, stareRez, stareCur, deAzi, panaAzi){
    //camera(canvas, coord.pereti, coord.geamuri);
    var cnt = canvas.getContext('2d');
    if (stareRez == 1) {
        if (stareOc == 1) {var cul = 'blue';}
        else {var cul = 'lightblue';}
        
        cnt.save();
        cnt.fillStyle = 'white';
        cnt.globalCompositeOperation = 'destination-in';
        if (deAzi) {
            cnt.fillRect(0, 0, 200, 300);
        } else if (panaAzi) {
            cnt.fillRect(100, 0, 200, 300);
        }
        cnt.restore();
        
        cnt.save();
        cnt.globalCompositeOperation = 'destination-atop';
        cnt.fillStyle = cul;
        cnt.fillRect(0, 0, 300, 300);
        cnt.restore();
    }
        
        cnt.save();
        cnt.globalCompositeOperation = 'destination-in';
        deseneaza(canvas, poligon, coord.pereti, #ffffff, 1, #ffffff);
        cnt.restore();
        camera(canvas, coord.pereti, coord.geamuri);

        switch (stareCur) {
            case 0: var stil = 'italic 20pt Courier';
            case 1: var stil = '20pt Courier';
            case 2: var stil = '20pt Courier';
        }

        cnt.font = stil;
        if (stareCur == 2) {
            cnt.fillText(nrCam, 50, 50); 
        } else {
            cnt.srokeText(nrCam, 50, 50);
        }


}