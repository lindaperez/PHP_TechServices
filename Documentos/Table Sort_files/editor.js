var DaddyEditor = new function() {
	

	var iObject = function() {
		this.i;
		return this;
	}
	
	var myObject = new iObject();
	myObject.i = 0;
	var myObject2 = new iObject();
	myObject2.i = 0;
	var store_text = new Array();

	//store_text[0] store initial textarea value
	store_text[0] = "";

	this.countclik = function(tag) {
		myObject.i++;
		var y = myObject.i;
		var x = tag.value;
		store_text[y] = x;
	}
	
	this.undo = function(tag) {
		if ((myObject2.i) < (myObject.i)) {
			myObject2.i++;
		}
		var z = store_text.length;
		z = z - myObject2.i;
		if (store_text[z]) {
			tag.value = store_text[z];
		} else {
			tag.value = store_text[0];
		}
	}
	
	this.redo = function(tag) {
		if ((myObject2.i) > 1) {
			myObject2.i--;
		}
		var z = store_text.length;
		z = z - myObject2.i;
		if (store_text[z]) {
			tag.value = store_text[z];
		} else {
			tag.value = store_text[0];
		}
	}

	var old = '';
	update_iframe = function(new_value) {
		var d = dynamicframe.document;
		old = new_value;
		d.open();
		d.write(old);
		d.close();
		if($.browser.msie) {
			d.location.reload(true);
		}
	}
	
	var instant = function() {
		var textarea = document.f.ta;
		if (old != textarea.value) {
			var new_value = textarea.value;
			update_iframe(new_value);
		}
		window.setTimeout(instant, 2000);
	}
	
	this.update_iframe = function() {
		update_iframe();
	}
	
	this.instant = function() {
		instant();
	}
};
