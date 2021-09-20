var accordions = document.getElementsByClassName('accordion');

for (var i = 0; i < accordions.length; i++) {
	accordions[i].onclick = function () {
		var content = this.nextElementSibling;

		if (content.style.maxHeight) {
			content.style.maxHeight = null;
		} else {
			content.style.maxHeight = content.scrollHeight + "px";
		}
	}
}