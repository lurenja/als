//初始化下拉框
function initSelect(){
	var myDate = new Date();
	var year = myDate.getFullYear();
	var frag = document.createDocumentFragment();
	var opt;
	for(var i=1970, size=year;i<=size;i++){
		opt = document.createElement('option');
		opt.value = i;
		opt.innerText = i;
		opt.textContent = i; //Firefox
		frag.appendChild(opt);
	}
	document.getElementById('pub_year').appendChild(frag);
	frag = document.createDocumentFragment();
	for(var i=1; i<10;i++){
		opt = document.createElement('option');
		opt.value = '0'+i;
		opt.innerText = '0'+i;
		opt.textContent = '0'+i; //Firefox
		frag.appendChild(opt);
	}
	for(var i=10; i<13;i++){
		opt = document.createElement('option');
		opt.value = i;
		opt.innerText = i;
		opt.textContent = i; //Firefox
		frag.appendChild(opt);
	}
	document.getElementById('pub_month').appendChild(frag);
}

function back() {
	window.history.go(-1);
}