	<meta charset="utf-8">

	<title>SWFTLR : Your networking wingman</title>

	{literal}
	<script>
	{/literal}
	var BASEURL = "{#BASEURL#}";
	{literal}
	Object.size = function(obj) {
		    var size = 0, key;
		    for (key in obj) {
		        if (obj.hasOwnProperty(key)) size++;
		    }
		    return size;
		};
	</script>
	{/literal}
	<script src="{#BASEURL#}/js/jquery/jquery-1.7.1.min.js"></script>
	<script src="{#BASEURL#}/js/underscore.js"></script>
	<script src="{#BASEURL#}/js/backbone.js"></script>
	<script src="{#BASEURL#}/js/models/events.js"></script>
	<script src="{#BASEURL#}/js/views/events.js"></script>
	<script src="{#BASEURL#}/js/models/rsvps.js"></script>
	<script src="{#BASEURL#}/js/views/rsvps.js"></script>








