<!DOCTYPE html>
<html>
<?php

    include 'public/header.php';
    
    echoHeader('Teste');
?>

<body>
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
		
        function setPage() {
		
            
        }
    </script>
</body>
</html>