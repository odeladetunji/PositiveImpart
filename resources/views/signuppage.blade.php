'<!DOCTYPE html>
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
	   	     		<li onclick="gotoLoginPage()">login</li>
	   	     	</ul>
	   	     </div>

	   	     <div class="theBody">
					  <p id="warningMessage">Ooops!! User Already Exit</p>
		              <form class="landLords">
		              	   <p id="lg">Sign-up</p>
		                   <input type="text" required id="username" placeholder="Enter username"><br>
		                   <input type="password" required id="password" placeholder="Enter password"><br>
		                   <button>submit</button>
		              </form>
		              <form method="post" class="landLords1" style="display: none;" name="registerForm" encType="multipart/form-data" action="{{URL::to('/gotoStudentPage')}}" >
		                   {{ csrf_field() }}
		                   <label for=""></label><br>
		                   <input type="text" required id="username1" name="username"><br>
		                   <input type="password" required id="password1" name="password"><br>
		                   <button>submit</button>
		               </form>
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
        	   var theForm = document.getElementsByClassName('landLords')[0];
        	   theForm.onsubmit = function(){
        	   	     event.preventDefault();
	        	 	 var theToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
	        	 	 var username = document.getElementById('username').value;
	        	 	 var password = document.getElementById('password').value;
	        	 	 document.getElementById('username1').value = username;
	        	 	 document.getElementById('password1').value = password;
	        	 	 var data = {'username': username, 'password': password}
		        	 var xhttp = new XMLHttpRequest();
		        	       xhttp.open('POST', '/SignUpStudent', true);
		        	       xhttp.onreadystatechange = function(){
		        	       	    if (this.readyState == 4 && this.status == 200) {
		        	       	    	var data = JSON.parse(this.responseText);
		        	       	    	      console.log(data);
		        	       	    	      if (data.message == false) {
		        	       	    	      		var wan = document.getElementById('warningMessage');
		        	       	    	      		    wan.style.display = 'block';
		        	       	    	      		setTimeout(function(){
		        	       	    	      			wan.style.display = 'none';
		        	       	    	      		}, 5000);
		        	       	    	      }

		        	       	    	      if (data.message == true) {
		        	       	    	      		document.getElementsByClassName('landLords1')[0].submit();
		        	       	    	      }

		        	       	    }
		        	       }

		        	       xhttp.setRequestHeader('X-CSRF-TOKEN', theToken);
		                   xhttp.setRequestHeader("X-Requested-With", 'XMLHttpRequest');
		                   xhttp.setRequestHeader("processData", 'false');
		                   xhttp.setRequestHeader('cache', 'false');
		                   xhttp.setRequestHeader("Content-Type", "application/json");
		                   xhttp.send(JSON.stringify(data));
        	    }


        	 
	        	 
             function gotoHomePage(){
             	 window.location = '/landingpage';
             }

             function gotoLoginPage(){
             	 window.location = '/loginpage';
             }

        </script>
</body>
</html>