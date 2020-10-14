function enterEditMode(ele) {
	ele.style.display = "none";
	
	var eform = document.getElementById("edit_form");
	var sbutton = "<input value='Save' type='submit' id='submit' name='submit' />";
	var cbutton = "<input value='Cancel' type='button' id='cancel' name='cancel' />";
	
	eform.innerHTML += sbutton + cbutton;
	
	document.getElementById("cancel").onclick = function() {
		if (document.getElementById("s_table").style.display != "none") {
			location.href = location.pathname + "#sales";
		} else if (document.getElementById("p_table").style.display != "none") {
			location.href = location.pathname + "#products";
		}
		
		location.reload();
	}
}

function addEditButtons(table) {
	var table = document.getElementById(table);
	var trs = table.getElementsByTagName("tr");
	var ebutton = '<button type="button" class="edit" name="edit" ><img src="images/pencil2.png" /></input>';
	
	for (var i=0;i<trs.length;i++) {
		if (trs[i].lastElementChild.nodeName.toLowerCase() == "td") {
			trs[i].lastElementChild.innerHTML = ebutton;
		}
	}
}

function tabTo(page) {
	var prods = document.getElementById("p_table");
	var sales = document.getElementById("s_table");
	
	switch (page) {
		case "sales":
			prods.style.display = "none";
			sales.style.display = "block";
			
			addEditButtons("s_table");
			break;
		case "products":
		default:
			sales.style.display = "none";
			prods.style.display = "block";
			
			addEditButtons("p_table");
			break;
	}
}

window.onload = function() {
	function lockInputs(boolflag, ele) {
		var inputs = document.getElementsByTagName("input");
		
		if (typeof(ele) != 'undefined') {
			inputs = ele.parentElement.parentElement.getElementsByTagName("input");
		}
		
		for (var i=0;i<inputs.length;i++) {
			inputs[i].disabled = boolflag;
		}
	}
	
	function primeEditButton() {
		var ebuttons = document.getElementsByClassName("edit");
		
		for (var i=0;i<ebuttons.length;i++) {
				ebuttons[i].onclick = function() { 
				lockInputs(false, this);
				enterEditMode(this);
			}
		}
	}
	
	lockInputs(true);
	
	if (location.hash == "#products") {
		tabTo("products");
	} else if (location.hash == "#sales") {
		tabTo("sales");
	} else {
		tabTo("products");
	}
	
	primeEditButton();
	
	document.getElementById("sales").onclick = function () {
		tabTo("sales");
		primeEditButton();
	}
	document.getElementById("products").onclick = function () {
		tabTo("products");
		primeEditButton();
	}
};