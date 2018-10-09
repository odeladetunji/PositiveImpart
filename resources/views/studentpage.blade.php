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
        <link rel="stylesheet" href="/CSS/studentpage.css" type="text/css">
        <!-- JQuery -->
        <script src="/js/jquery-3.2.1.min(first).js" type='text/JavaScript'></script>
        <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
        <script src="/bootstrap/js/bootstrap.min.js" type="text/JavaScript"></script>
        <!-- Styles -->
        <style>
              
        </style>
</head>
<body>
	   	     <div class="topHeader">
	   	     	<ul>
	   	     		<li onclick="gotoHomePage()">home</li>
	   	     		<li onclick="gotoSignUpPage()">signup</li>
	   	     	</ul>
	   	     </div>
	   	     
	   	     	<div class="row landing">
		           <div class="col-sm-3 nav">
		           	    <ul>
		           	    	<li>welcome</li>
		           	    	<li>Course!</li>
		           	    </ul>
		           </div>
		           <div class="col-sm-9 content">
		           	   <div class="theHeading">
		           	   	   <h3>Available Courses!!</h3><br>
		           	   </div>
		           	   <div class="availableCourses" style="display: flex;">
		           	   	     
		           	   	     <p id="mark"></p>
		           	   </div>
		           	   <div class="desHeading">
		           	   	  <h3>Course Description</h3>
		           	   </div>
		           	   <div class="courseDescription">
		           	   	     <div class="desCInner">
		           	   	     	<p id="distn"></p>
		           	   	     	<button id="enrolBtn">start course!</button>
		           	   	     </div>
		           	   </div>
		           	   <div class="payments">
		           	   	 <h3>Payment</h3>
		           	   	      <input type="text" placeholder="Surname"><br>
		           	   	      <input type="text" placeholder="FirstName"><br>
		           	   	      <input type="text" placeholder="Email"><br>
		           	   	      <input type="text" placeholder="Phone Number"><br>
		           	   </div>
		           	   <div class="Lectures">
		           	   	  <h3>Lectures</h3>
		        	      <div class="CourseXplanation">
		        		
		        	      </div>
		        	      <p><span>prev</span><span>next</span></p>
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
	   	     <P style="display: none;">{{$identity}}</P>
	   </div>
        <script>
        	var courseContainer = [];
        	window.onload = () => {
        		 function outputContent(param){
        		 	   //use data here!!!!
        		 }

        		 function loadContent(){
	        	 	 const theToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content'); ///
		        	 const xhttp = new XMLHttpRequest();
		        	       xhttp.open('GET', '/LoadCourses', true);
		        	       xhttp.onreadystatechange = function() {
		        	       	    if (this.readyState == 4 && this.status == 200) {
		        	       	    	const data = JSON.parse(this.responseText).data;
		        	       	    	      console.log(data);
		        	       	    	      // use data here!
		        	       	    	      if (data == false) {
                                             console.log('its false (zero)');
		        	       	    	      }
            
                                          var container = {};
                                          var finalObject = '';
                                          var count = 0;
                                          var objArray = [];
                                          
                                          function useParam(param){
                                                  	  	                                                 	  	    	 
											 var div = '<div class="bkImage" style="background-image: url(/storage/images/' + param.advertpicture + ')"></div>';
                          	  	                                                  	                                                 
											 var li =  '<ul>' +
											              '<li>' + param.title + '</li>' +
											              '<li class="author" >Authors</li>' +
											              '<li>' + param.author + '</li>'+ 
											              '<li class="pricing">' + param.price + '</li>' +
											           '</ul>';

											 var outerContainer = '<div class="cont' + " " + param.coursecode + '"' + ' onclick="showDescriptn(this)">' + div + li + '</div>';
                                              //objArray.push(outerContainer);
											      finalObject = finalObject + outerContainer;

                                              	  	   
                                          }

		        	       	    	      function useData(param){
                                              for (var i = 0; i < param.length; i++) {
                                              	 useParam(param[i]);
                                              }
		        	       	    	      }

		        	       	    	    
                                           var parentContainer = [];
	                                       var child = {};
	                                       var counter = 0;
	                                       var code;
	                                       var ashKey = 'ABC|@|';

		        	       	    	      function loopRawData(){
		        	       	    	      	  
		        	       	    	      	   for (var i = 0; i < data.length; i++) {

                                                          if (data[i].picture == null) {
                                                          	child.advertpicture = data[i].advertpicture;
                                                          }

                                                          child[ashKey.concat(data[i].picture)] = data[i].picture;
                                                          
                                                          if (data[i + 1] != undefined) {
                                                          	  
                                                              if (data[i].coursecode != data[i + 1].coursecode) {
                                                                  child.author = data[i - 1].author;
                                                     	          child.title = data[i - 1].title;
                                                                  child.coursecode = data[i - 1].coursecode;
                                                                  child.description = data[i - 1].description;
                                                                  child.price = data[i - 1].price;
                                                                  child.duration = data[i - 1].duration;
                                                                  child[ashKey.concat(data[i - 1].picture)] = data[i - 1].picture;
                                                              	  //child = {}
                                                              	  console.log('pp');
                                                              	 // break;
                                                              	  parentContainer.push(child);
                                                              	  courseContainer.push(child);
                                                              	  console.log(parentContainer)
                                                              	  child = {}
                                                              }
                                                          }
                                                          
                                                          if (data[i + 1] == undefined) {
                                                          	 child.author = data[i - 1].author;
                                                     	          child.title = data[i - 1].title;
                                                                  child.coursecode = data[i - 1].coursecode;
                                                                  child.description = data[i - 1].description;
                                                                  child.price = data[i - 1].price;
                                                                  child.duration = data[i - 1].duration;
                                                                  child[ashKey.concat(data[i - 1].picture)] = data[i - 1].picture;
                                                              	  //child = {}
                                                           	 parentContainer.push(child);
                                                           	 courseContainer.push(child);

                                                          }
                                                             
                                                    
		        	       	    	      	         if (data.length - 1 == i) {
		        	       	    	      	         	console.log('man');
		        	       	    	      	         	useData(parentContainer);
		        	       	    	      	         	setTimeout(function(){
		        	       	    	      	         		    console.log('llll');
		        	       	    	      	         	    	var marker = document.getElementById('mark');
		        	       	    	      	         			$(finalObject).insertBefore('#mark');
		        	       	    	      	         			//console.log(finalObject);
		        	       	    	      	         	}, 50);
		        	       	    	      	         }
		        	       	    	           }
		        	       	    	      }
		        	       	    	      loopRawData();
		        	       	    }
		        	       }

		        	       xhttp.setRequestHeader('X-CSRF-TOKEN', theToken);
		                   xhttp.setRequestHeader("X-Requested-With", 'XMLHttpRequest');
		                   xhttp.setRequestHeader("processData", 'false');
		                   xhttp.setRequestHeader('cache', 'false');
		                   xhttp.setRequestHeader("ContentType", "false");
		                   xhttp.send();

        	     }

        	     loadContent();

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

        	 function useTheContent(param){
                   document.getElementById('distn').innerHTML = param.description;
        	 }

        	 function showDescriptn(param){
                 var param1 = param.className.split(' ')[1];
                 var param2 = param.className.split(' ')[2];                 
                 var code = param1 + ' ' + param2;
                 
                 for (var i = 0; i < courseContainer.length; i++) {
                 	
                 	   if(courseContainer[i].coursecode == code){
                            useTheContent(courseContainer[i]);
                            console.log(courseContainer[i].coursecode);
                 	   }
                 }
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