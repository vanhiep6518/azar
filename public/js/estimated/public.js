(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-79704806-1', 'auto');
  ga('send', 'pageview');
  
$(document).ready(function(){

	var menu = false;

	$(".m-box").click(function(){
		if(!menu){
			$(".m-mark").hide();
			$(".m-box i").attr('class', 'glyphicon glyphicon-menu-hamburger m-icon');
			menu = true;
		}else{
			$(".m-mark").show();
			$(".m-box i").attr('class', 'glyphicon glyphicon-remove m-icon');
			menu = false;
		}
	});

	$(".m-mark").click(function(){
		$(this).hide();
		$(".m-box i").attr('class', 'glyphicon glyphicon-menu-hamburger m-icon');
		menu = true;
	});
})

