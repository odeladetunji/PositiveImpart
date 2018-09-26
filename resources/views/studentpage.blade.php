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
        <link href="/CSS/login.css" rel="stylesheet" type="text/css">
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
	   	     		<li onclick="gotoHomePage()">home</li>
	   	     		<li onclick="gotoSignUpPage()">signup</li>
	   	     	</ul>
	   	     </div>

	   	     <div class="theBody">
	   	     	<div class="row landing">
		           <div class="col-sm-3 nav">
		           	    
		           </div>
		           <div class="col-sm-9 content">
		           	   <div class="availableCourses">
		           	   	
		           	   </div>
		           	   <div class="courseDescription">
		           	   	
		           	   </div>
		           	   <div class="payments">
		           	   	
		           	   </div>
		           </div>
		        </div>
		        <div class="row Lectures">
		        	<div class="col-sm-3 Listcourses">
		        		
		        	</div>
		        	<div class="col-sm-9 CourseXplanation">
		        		
		        	</div>
		        </div>
	   	     </div>
	   	     <div class="theFooter">
	   	     	<ul>
	   	     		<li>About Us</li>
	   	     		<li>Our Contacts</li>
	   	     	</ul>
	   	     	<p>Terms and Policies</p>
	   	     </div>
	   	     <P>{{$identity}}</P>
	   </div>
        <script>
        	window.onload = () => {
        		 function outputContent(param){
        		 	   //use data here!!!!
        		 }

        		 () => {
        		 	       const theToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
		        	       const xhttp = new XMLHttpRequest();
		        	       xhttp.open('GET', '/LoadCourses', true);
		        	       xhttp.onreadystatechange = () => {
		        	       	    if (this.readystate == 4 && this.status == 200) {
		        	       	    	const data = JSON.parse(this.responseText);
		        	       	    	      console.log(data);
		        	       	    	      outputContent(data);
		        	       	    }
		        	       }

		        	       xhttp.setRequestHeader('X-CSRF-TOKEN', theToken);
		                   xhttp.setRequestHeader("X-Requested-With", 'XMLHttpRequest');
		                   xhttp.setRequestHeader("processData", 'false');
		                   xhttp.setRequestHeader('cache', 'false');
		                   xhttp.setRequestHeader("Content-Type", "application/json");
		                   xhttp.send();
        		 }

        		 () => {
        		 	 	   const theToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
		        	       const xhttp = new XMLHttpRequest();
		        	       xhttp.open('POST', '/getRegisteredCourses', true);
		        	       xhttp.onreadystatechange = () => {
		        	       	    if (this.readystate == 4 && this.status == 200) {
		        	       	    	const data = JSON.parse(this.responseText);
		        	       	    	      console.log(data);
		        	       	    }
		        	       }

		        	       xhttp.setRequestHeader('X-CSRF-TOKEN', theToken);
		                   xhttp.setRequestHeader("X-Requested-With", 'XMLHttpRequest');
		                   xhttp.setRequestHeader("processData", 'false');
		                   xhttp.setRequestHeader('cache', 'false');
		                   xhttp.setRequestHeader("Content-Type", "application/json");
		                   xhttp.send(JSON.stringify(theData));
        		 }

        	}
        	// dont forget to use babal script!
        	   function authenticateUser(){
	        	 	 const theToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
	        	 	    var password = document.getElementById('password').value;
                        var username = document.getElementById('username').value;
                        document.getElementById('password1').value = password;
                        document.getElementById('username1').value = username;
                        var theData = { "username": username, "password": password, "token": theToken }
		        	    const xhttp = new XMLHttpRequest();
		        	       xhttp.open('POST', '/login', true);
		        	       xhttp.onreadystatechange = () => {
		        	       	    if (this.readystate == 4 && this.status == 200) {
		        	       	    	const data = JSON.parse(this.responseText);
		        	       	    	      console.log(data);
		        	       	    	      if (data == false) {
		        	       	    	      	 $('#warningMessage').show();
		        	       	    	      	 setTimeout((param) => {
		        	       	    	      	 	$('#warningMessage').hide();
		        	       	    	      	 }, 5000);
		        	       	    	      }

		        	       	    	      if (data == true) {
		        	       	    	      	 $('landLords1').submit();
		        	       	    	      }
		        	       	    	      // use data here!
		        	       	    }
		        	       }

		        	       xhttp.setRequestHeader('X-CSRF-TOKEN', theToken);
		                   xhttp.setRequestHeader("X-Requested-With", 'XMLHttpRequest');
		                   xhttp.setRequestHeader("processData", 'false');
		                   xhttp.setRequestHeader('cache', 'false');
		                   xhttp.setRequestHeader("Content-Type", "application/json");
		                   xhttp.send(JSON.stringify(theData));

        	    }

	         function showCourseContent(param){
                  
	         } 

             function gotoHomePage(){
             	 window.location = '/landingpage';
             }

             function gotoSignUpPage(){
             	 window.location = '/signuppage';
             }

        </script>
</body>
</html>