    <!-- jQuery resize-toggle stuff -->
    <script type="text/javascript" src="http://jqueryui.com/ui/jquery.effects.core.js"></script>

    <script type="text/javascript">
    <!--
    
	/* Thanks to Dustin Diaz for the awesome code for this function:
	  http://www.dustindiaz.com/getelementsbyclass
	  
	  Get an array of elements by their class name
	*/
	function getElementsByClass(searchClass,node,tag) {
	    var classElements = new Array();
	    if ( node == null )
		    node = document;
	    if ( tag == null )
		    tag = '*';
	    var els = node.getElementsByTagName(tag);
	    var elsLen = els.length;
	    var pattern = new RegExp("(^|\\s)"+searchClass+"(\\s|$)");
	    for (i = 0, j = 0; i < elsLen; i++) {
		    if ( pattern.test(els[i].className) ) {
			    classElements[j] = els[i];
			    j++;
		    }
	    }
	    return classElements;
	}
	
	var TimeToFade = 250.0;
	
	/* fade() and animateFade() from
	http://www.switchonthecode.com/tutorials/javascript-tutorial-simple-fade-animation */
	
	/*
	 FadeState:
	    2: opaque
	    1: fading in
	    -1: fading out
	    -2: transparent
	*/
	function fade(eid) {
	    var element = document.getElementById(eid);
	    if(element == null) {
		return;
	    }
	   
	    if(element.FadeState == null) {
		if(element.style.opacity == null
		    || element.style.opacity == '') {
		    element.FadeState = -2;
		} else if(element.style.opacity == '1') {
		    element.FadeState = 2;
		} else {
		    element.FadeState = 2;
		}
	    }
	   
	  if(element.FadeState == 1 || element.FadeState == -1)
	  {
	    element.FadeState = element.FadeState == 1 ? -1 : 1;
	    element.FadeTimeLeft = TimeToFade - element.FadeTimeLeft;
	  }
	  else
	  {
	    element.FadeState = element.FadeState == 2 ? -1 : 1;
	    element.FadeTimeLeft = TimeToFade;
	    setTimeout("animateFade(" + new Date().getTime() + ",'" + eid + "')", 33);
	  }  
	}
	
	function animateFade(lastTick, eid) {  
	  var curTick = new Date().getTime();
	  var elapsedTicks = curTick - lastTick;
	 
	  var element = document.getElementById(eid);
	 
	  if(element.FadeTimeLeft <= elapsedTicks)
	  {
	    element.style.opacity = element.FadeState == 1 ? '1' : '0';
	    element.style.filter = 'alpha(opacity = '
		+ (element.FadeState == 1 ? '100' : '0') + ')';
	    element.FadeState = element.FadeState == 1 ? 2 : -2;
	    return;
	  }
	 
	  element.FadeTimeLeft -= elapsedTicks;
	  var newOpVal = element.FadeTimeLeft/TimeToFade;
	  if(element.FadeState == 1)
	    newOpVal = 1 - newOpVal;
	    
	  element.style.opacity = newOpVal;
	  element.style.filter = 'alpha(opacity = ' + (newOpVal*100) + ')';
	 
	  setTimeout("animateFade(" + curTick + ",'" + eid + "')", 33);
	}
    
	// helper function
	function fadeCollapseBtn() {
	    fade("collapseBtn");
	}
    
	// resize toggle on collapseBtn click
	jQuery(function() {
	    jQuery("#collapseBtn").click(function() {
		var collapsibles = getElementsByClass("collapsible");
		for(i=0; i<collapsibles.length; i++) {
		    var id = "#" + collapsibles[i].id;
		    jQuery(id).toggleClass("topCollapsed", 500);
		}
		return false;
	    })
	});
    
	// Fade the collapse button in and out
	jQuery(function() {
	    var rollover = document.getElementById("collapseRollover");
	    rollover.addEventListener("mouseover", fadeCollapseBtn, false);
	    rollover.addEventListener("mouseout", fadeCollapseBtn, false);
	});
    // -->
    </script>

<!-- Google Analytics -->
<script type="text/javascript">
// <!--

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-25197874-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

// -->
</script>
    
    <!--[if lt IE 9]>
    <script>
      var e = ("abbr,article,aside,audio,canvas,datalist,details," +
	"figure,footer,header,hgroup,mark,menu,meter,nav,output," +
	"progress,section,time,video").split(',');
      for (var i = 0; i < e.length; i++) {
	document.createElement(e[i]);
      }
    </script>
    <![endif]-->