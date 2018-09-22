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
	   <div>
	   	     <div class="topHeader">
	   	     	<ul>
	   	     		<li onclick="showSignUp()">signup</li>
	   	     		<li onclick="showLogin()">login</li>
	   	     		<li>About Us</li>
	   	     		<li>Enterprenuership</li>
	   	     		<li>Certifications</li>
	   	     		<li>Economic Empowerment</li>
	   	     		<li>Mission Vision</li>
	   	     		<li>Activities</li>
	   	     	</ul>
	   	     </div>
	   	     <div class="theHead"></div>
	   	     <div class="theBody">
	   	     	 <div class="certifications">
	   	     	 	
	   	     	 </div>
	   	     	 
	   	     	 <div class="aboutUs">
	   	     	 	
	   	     	 </div>

	   	     	 <div class="ourpartners">
	   	     	 	
	   	     	 </div>

	   	     	 <div class="activities">
	   	     	 	
	   	     	 </div>

	   	     </div>
	   	     <div class="theFooter">
	   	     	<ul>
	   	     		<li>About Us</li>
	   	     		<li>Our Contacts</li>
	   	     	</ul>
	   	     	<p>Terms and Policies</p>
	   	     </div>
	   </div>
        <script>
        	// dont forget to use babal script!
        	window.onload = () => {
        		function loadContent(){
	        	 	 const theToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
		        	 const xhttp = new XMLHttpRequest();
		        	       xhttp.open('GET', '/landingpage', true);
		        	       xhttp.onreadystatechange = () => {
		        	       	    if (this.readystate == 4 && this.status == 200) {
		        	       	    	const data = JSON.parse(this.responseText);
		        	       	    	      console.log(data);
		        	       	    	      // use data here!
		        	       	    }
		        	       }

		        	       xhttp.setRequestHeader('X-CSRF-TOKEN', theToken);
		                   xhttp.setRequestHeader("X-Requested-With", 'XMLHttpRequest');
		                   xhttp.setRequestHeader("processData", 'false');
		                   xhttp.setRequestHeader('cache', 'false');
		                   xhttp.setRequestHeader("Content-Type", "application/json");
		                   xhttp.send();

        	    }

        	    loadContent();
        	}
	        	 
             function showSignUp(){
             	 window.location = '/signuppage';
             }

             function showLogin(){
             	 window.location = '/loginpage';
             }

        </script>
</body>
</html>