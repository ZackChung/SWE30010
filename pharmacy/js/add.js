function switchTo(page) {
	var stable = document.getElementById("s_table");
	var ptable = document.getElementById("p_table");

	switch(page) {
		case "product":
			ptable.style.display = "block";
			stable.style.display = "none";
			break;
		case "sales":
		default:
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