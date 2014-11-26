 
var ok_obj=document.getElementById("view_pic").getElementsByTagName("LI")
var ok=Math.ceil(ok_obj.length/3)-1
  var ele=document.getElementById("description");
  var w=ele.clientWidth;
  var n=20,t=50;
  var timers=new Array(n);
  var k=0;doSlide(0);
function doSlide(s){
  if (k>=ok &&s>0|| k<=0 &&s < 0)MenuClick()
 else{
  k+=s;
    var x=ele.scrollLeft;
    var d=k*w-x;
    for(var i=0;i<n;i++)(
    	function(){
    		if(timers[i]) clearTimeout(timers[i]);
    		var j=i;
//    		alert(x)
    		timers[i]=setTimeout(function(){ele.scrollLeft=x+Math.round(d*Math.sin(Math.PI*(j+1)/(2*n)));},(i+1)*t);
    	}
    )();
}} 
var intDelay=30; //设置菜单显示速度，越大越慢
var intInterval=5; 
function MenuClick(){
LayerMenu.filters.alpha.opacity=0; 
LayerMenu.style.display=""; 
GradientShow();
} 
function GradientShow() 
{ 
LayerMenu.filters.alpha.opacity+=intInterval; 
if (LayerMenu.filters.alpha.opacity<100) setTimeout("GradientShow()",intDelay); 
else setTimeout("GradientClose()",1500)
} 
function GradientClose() 
{ 
LayerMenu.filters.alpha.opacity-=intInterval; 
if (LayerMenu.filters.alpha.opacity>0) { 
setTimeout("GradientClose()",intDelay); 
} 
else { 
LayerMenu.style.display="none";
} 
}
GradientClose()  