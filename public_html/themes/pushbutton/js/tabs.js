// written by Tanny O'Haley, 28 Jul 2006
// http://tanny.ica.com
// Dependencies:
//	events.js

/*global addEvent */

var tabs = {
	name: "tabs",
	obj: document,
	init: function(){
		if(!(/\btabs\b/.test(document.body.className))) {
			document.body.className += " tabs";
		}
		
		// Get all div elements and look for elements with a class of "tabs"
		var els=this.getElementsByClassName("tabs", "div", this.obj);
		for(var i=0; i < els.length; i++){
			this.processTab(els[i]);
		}
	},
	processTab: function(el){
		// Get the tabBody.
		var elBody = el.nextSibling;
		while(!(/\btabBody\b/.test(elBody.className))) {
			elBody = elBody.nextSibling;
		}

		var els = el.getElementsByTagName("a");

		for(var i=0; i < els.length; i++){
			var elParent = els[i].parentNode;

			// Set the tab parent for speed.
			elParent.tabDiv = el;

			// Set the parent node for speed.
			elParent.tabBody = elBody;

			// Set the tabNo for speed.
			elParent.tabNo = i;

			// Add the click  events.
			addEvent(els[i], "click", this.showTab);
			addEvent(elParent, "click", this.showTab);
			
			// For IE add a hover function for the LI element.
			if(window.attachEvent){
				addEvent(elParent, "mouseover", function() { this.className+=" sfhover"; });
				addEvent(elParent, "mouseout", function() { this.className=this.className.replace(new RegExp(" sfhover\\b"), ""); });
			}
		}
	},
	showTab: function(e){
		var elSrc;
		
		// Stop the click event here.
		if(!e) {
			e = window.event;
		}
		e.cancelBubble = true;
		if(e.stopPropagation) {
			e.stopPropagation();
		}
		e.preventDefault();

		// Get the source element.
		if (e.target) {
			elSrc = e.target;
		} else if (e.srcElement) {
			elSrc = e.srcElement;
		}

		// Make sure that we are pointing at the li element.
		if(elSrc.tagName === "A") {
			elSrc.blur();
			elSrc = elSrc.parentNode;
		}

		// Get the tabs.
		var els = elSrc.tabDiv.getElementsByTagName("li");
		for(var i=0; i < els.length; i++){
			if(elSrc === els[i]){
				if(!/\bselected\b/.test(els[i].className)) {
					els[i].className += " selected";
				}
			} else {
				els[i].className=els[i].className.replace(new RegExp("\\bselected\\b"), "").replace("  ", " ");
			}
		}

		// Get the children of the body and set the selected tab.
		var iTabs = 0;
		els = elSrc.tabBody.childNodes;
		for(i=0; i < els.length; i++){
			if((/\btabItem\b/.test(els[i].className) && els[i].tagName === "DIV")){
				if(iTabs === elSrc.tabNo){
					if(!/\bselected\b/.test(els[i].className)) {
						els[i].className += " selected";
					}
				}else{
					els[i].className=els[i].className.replace(new RegExp(" selected\\b"), "");
				}
				iTabs++;
			}
		}

		return false;
	},
	getElementsByClassName: function (strClassName, strTagName, oElm){
		if(!oElm) {
			oElm = document;
		}
		if(!strTagName) {
			strTagName = "*";
		}
	
		var arrElements = (strTagName === "*" && oElm.all)? oElm.all : oElm.getElementsByTagName(strTagName);
		var arrReturnElements = [];
		strClassName = strClassName.replace(/\-/g, "\\-");
		var oRegExp = new RegExp("(^|\\s)" + strClassName + "(\\s|$)");
		var oElement;
		for(var i=0; i<arrElements.length; i++){
			oElement = arrElements[i];		
			if(oRegExp.test(oElement.className)){
				arrReturnElements.push(oElement);
			}	
		}
		return (arrReturnElements);
	}
};

addEvent(window, "DOMContentLoaded", function() {tabs.init();});
