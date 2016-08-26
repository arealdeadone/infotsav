function vts_showHint(event,id){
	d=document;
	if (!event)event=window.event; 
	var targetElement = d.getElementById("hint_"+id);
	with (targetElement.style)
	{
		position = "absolute";
		//left=((d.all?event.x+d.body.scrollLeft:event.pageX)-60)+"px";
		//top=((d.all?event.y+d.body.scrollTop:event.pageY)+8)+"px";
		display="block";
	}
}
 
function vts_closeHint(id){
	var targetElement = document.getElementById("hin"+id);
	targetElement.style.display = "none";
}