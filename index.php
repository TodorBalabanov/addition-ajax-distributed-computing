<!DOCTYPE html>

<!-- ---------------------------------------------------------------------------------------- -->
<!-- Distributed Computing with AJAX                                                          -->
<!-- by Todor Balabanov & Delyan Keremdchiev                                                  -->
<!-- New Bulgarian University, Sofia 2007-2013                                                -->
<!-- ---------------------------------------------------------------------------------------- -->

<html>
	<head>
		<title>Distributed Computing with AJAX by Todor Balabanov & Delyan Keremdchiev</title>
		
		<script language="JavaScript" type="text/javascript">
			var UNSOLVED = 0;
			var SOLVED = 1;
			var INPROGRESS = 2;

			function getXmlHttpRequestObject() {
				if (window.XMLHttpRequest) {
					return new XMLHttpRequest();
				} else if(window.ActiveXObject) {
					return new ActiveXObject("Microsoft.XMLHTTP");
				} else {
					alert("Your browser doesn't support the XmlHttpRequest object!");
				}
			}

			var request = getXmlHttpRequestObject();		
			var taskId = 0;
			var a = 0;
			var b = 0;
			var c = 0;

			function doCalculation() {
				if (request.readyState == 4 || request.readyState == 0) {
					request.open("GET", 'provider.php?task_id='+taskId+'&result='+c, true);
					request.onreadystatechange = calculate; 
					request.send();
				}			
			}

			function calculate() {
				if (request.readyState == 4) {
					var task = request.responseText;
					var operands = task.split( " " );
					taskId = parseInt( operands[0] );
					a = parseInt( operands[1] );
					b = parseInt( operands[2] );
					c = a + b;
					
					document.getElementById('task_id').innerHTML = taskId;
					document.getElementById('span_a').innerHTML = a;
					document.getElementById('span_b').innerHTML = b;
					document.getElementById('span_c').innerHTML = c;
				}
			}
			
			setInterval("doCalculation()", 1000);
		</script>
	</head>
	
	<body bgcolor="white" text="black" link="black" vlink="black" alink="black">
		<h1>Distributed Computing with AJAX</h1>
		<h2>by Todor Balabanov & Delyan Keremdchiev</h2>

		Task ID:&nbsp;<span id="task_id"></span>&nbsp;&nbsp;&nbsp;->&nbsp;&nbsp;&nbsp;
		<span id="span_a"></span>+<span id="span_b"></span>=<span id="span_c"></span>

		<p><p><p>

		<hr>
		<a href="mailto:todor.balabanov gmail com">Todor Balabanov</a> & <a href="mailto:d.keremedchiev is-bg.net">Delyan Keremedchiev</a>&nbsp;&nbsp;&copy 2007-2013<br>
		New Bulgarian University, Sofia 2007-2013
	</body>
</html>