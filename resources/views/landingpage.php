<!DOCTYPE html>
<html>
<head>
	    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Positive Impart</title>
        <base href="http://127.0.0.1:8000/">

        <link href="/CSS/landingpage.css" rel="stylesheet" type="text/css">
        <!-- JQuery -->
        <script src="/js/jquery-3.2.1.min(first).js" type='text/JavaScript'></script>
        <!-- Styles -->
        <style>
              
        </style>
</head>
<body>
        <script>
        	 const theToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        	 const xhttp = new XMLHttpRequest();
        	       xhttp.open('GET', '/landingpage', true);
        	       xhttp.onreadystatechange = () => {
        	       	    if (this.readystate == 4 && this.status == 200) {
        	       	    	const data = JSON.parse(this.responseText);
        	       	    	      console.log(data);
        	       	    	      // use data here!
        	       	    }
                        // use data here!
        	       }

        	       xhttp.setRequestHeader('X-CSRF-TOKEN', theToken);
                   xhttp.setRequestHeader("X-Requested-With", 'XMLHttpRequest');
                   xhttp.setRequestHeader("processData", 'false');
                   xhttp.setRequestHeader('cache', 'false');
                   xhttp.setRequestHeader("Content-Type", "application/json");
                   xhttp.send();
        </script>
</body>
</html>