function switchTo(page) {
	var stable = document.getElementById("s_table");
	var ptable = document.getElementById("p_table");
	var scode = document.getElementById("scode");
	var pcode = document.getElementById("pcode");

	switch(page) {
		case "product":
			pcode.style.display = "inline-block";
			scode.style.display = "none";
			ptable.style.display = "block";
			stable.style.display = "none";
			break;
		case "sales":
		default:
			pcode.style.display = "none";
			scode.style.display = "inline-block";
			ptable.style.display = "none";
			stable.style.display = "block";
			break;
	}
}

window.onload = function() {
	if(location.hash == "#sales") {
		switchTo("sales");
	} else if(location.hash == "#product"){
		switchTo("product");
	} else {
		switchTo("sales");
	}

	document.getElementById("sales").onclick = function() {
		switchTo("sales");
	}
	document.getElementById("product").onclick = function() {
		switchTo("product");
	}
}