<!DOCTYPE html>
<html>
<head>
	<title>Teste</title>
	<meta charset="utf-8" />
	<script type="application/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script type="text/javascript">
	
		$(document).ready(ready);
		
		function ready() {
			if (window.matchMedia) {
		
				var mediaQuery = window.matchMedia('(max-width: 700px)');
				mediaQuery.addListener(resize);
				resize(mediaQuery);
			}		
		}
		
		function resize(mediaQuery) {
		
			if (mediaQuery.matches) {
			
				console.log('Mobile');
			}
			else {
			
				console.log('Desktop');
			}
		}
	</script>
</head>
<body>
	<h1>Teste</h1>
</body>
</html>