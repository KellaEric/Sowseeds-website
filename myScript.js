var tabButtons=document.querySelectorAll(".tabHolder .buttonHolder button");
var tabPanels=document.querySelectorAll(".tabHolder .tabPanel");

function showPanel(panelIndex, colorCode){
	tabButtons.forEach(function(node){
		node.style.backgroundColor="";
		node.style.color="";
	});
	tabButtons[panelIndex].style.backgroundColor=colorCode;
	tabButtons[panelIndex].style.color="white";
	tabPanels.forEach(function(node){
		node.style.display="none";
		node.style.color="";
	});
	tabPanels[panelIndex].style.display="block";
	tabPanels[panelIndex].style.backgroundColor=colorCode;
}
