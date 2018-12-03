var im = window.document.getElementsByClassName('img');
var t = window.document.getElementById('title');
var d = window.document.getElementById('disp');

for(var i=0;i < im.length; i++){
im[i].onmouseover = function(){
	t.innerHTML = this.title;
	d.src = this.src;
}
}



t.innerHTML = im[0].title;
d.src = im[0].src;