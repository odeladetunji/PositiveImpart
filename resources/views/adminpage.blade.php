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
        <link href="/CSS/admin.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
        <script src="/bootstrap/js/bootstrap.min.js" type="text/JavaScript"></script>
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
	   	     		<li onclick="gotoHomePage()">Home</li>
	   	     	</ul>
	   	     </div>
	   	    
	   	     <div class="container-fluid theBody">
                  <div class="row">
                  	    <div class="col-sm-3">
                  	    	 <div class="noOfVisit">
                  	    	 	 <p id="noOfVisit1">No of Visitors</p>
                  	    	 	 <p id="noOfVisit2">5,000</p>
                  	    	 </div>
                  	    </div>
                  	    <div class="col-sm-3">
                  	    	 <div class="noOfUsers">
                  	    	 	 <p id="noOfStudents">No of Students</p>
                  	    	 	 <p id="noOfStudents1">10,000</p>
                  	    	 </div>
                  	    </div>
                  	    <div class="col-sm-3">
                  	    	<button id="editButton">Edit Courses</button>
                  	    </div>

                  	    <div class="col-sm-3">
                  	    	<button id="addACourseButton" onclick="showForm()">Add a course</button>
                  	    </div>
                  </div>
                  <div class="theFormCourse">
          	    		<form method="post" style="display: none;" encType="multipart/form-data" class="landLords1" name="addACourse" action="{{URL::to('/addACourse')}}">
		                   {{ csrf_field() }}
		                   <input type="text" placeholder="Course Title" name="title"><br>
		                   <select name="duration" id="duration">
		                   	   <option value="1 weeks">1 week</option>
		                   	   <option value="2 weeks">2 weeks</option>
		                   	   <option value="3 weeks">3 weeks</option>
		                   	   <option value="4 weeks">4 weeks</option>
		                   	   <option value="5 weeks">5 weeks</option>
		                   	   <option value="6 weeks">6 weeks</option>
		                   	   <option value="7 weeks">7 weeks</option>
		                   	   <option value="3 months">3 months</option>
		                   	   <option value="4 months">6 months</option>
		                   	   <option value="5 months">5 months</option>
		                   	   <option value="6 months">6 months</option>
		                   	   <option value="7 months">7 months</option>
		                   	   <option value="8 months">8 months</option>
		                   	   <option value="9 months">9 months</option>
		                   	   <option value="10 months">10 months</option>
		                   	   <option value="11 month">11 months</option>
		                   	   <option value="1 year">1 year</option>
		                   </select><br>
		                   <input type="text" placeholder="price" name="price"><br>
		                   <input type="text" placeholder="Course Code e.g(ECN 504)" name="coursecode"><br>
		                   <input type="text" name="author" placeholder="Authors names"><br>
		                   <input type="file" name="picture" placeholder="select picture"><br>
		                   <textarea name="desscription" id="textArea" cols="30" rows="10" placeholder="write a detail descripton of the content of the course you are creating, write a summary of the course. this content will be displayed went users click on the course"></textarea><br>
		                   <button>submit</button><br>
                        </form> 
	   	           </div>
	   	           <div class="editContentOfCourses">
	   	           	    
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
	   <!-- Load Babel -->
       <script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>
       <!-- Your custom script here -->
       <script type="text/babel"></script>
        <script type="text/JavaScript">
        	// dont forget to use babal script!
        	window.onload = () => {
        		function loadContent(){
	        	 	 const theToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
		        	 const xhttp = new XMLHttpRequest();
		        	       xhttp.open('GET', '/LoadCourses', true);
		        	       xhttp.onreadystatechange = function() {
		        	       	    if (this.readyState == 4 && this.status == 200) {
		        	       	    	const data = JSON.parse(this.responseText).data;
		        	       	    	      console.log(data);
		        	       	    	      // use data here!
		        	       	    	      if (data == false) {
                                             console.log('its zero');
		        	       	    	      }
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
        	}

             const courseForm = document.getElementsByClassName('landLords1')[0];
        	 function addACourse(param){
        	 	     //event.preventDefault();
        	 	     console.log(param);
        	 		 const theToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        	 		 //const theForm = document.getElementsByClassName('landLords1')[0];
        	 		 var formData = new FormData(param);
		        	 var xhttp = new XMLHttpRequest();
		        	       xhttp.open('POST', '/addACourse', true);
		        	       xhttp.onreadystatechange = function() {
		        	       	    if (this.readyState == 4 && this.status == 200) {
		        	       	    	const data = JSON.parse(this.responseText).data;
		        	       	    	      console.log(data);
		        	       	    	      // use data here!
		        	       	    }
		        	       }
                           
                           /*   NOTE
                           If contentType is not set to false! formData object
                           will not be loaded properly on the payload of the 
                           header and this will cause a lot of trouble!
                           Below server header setup is very inportant!*/
		        	       xhttp.setRequestHeader('X-CSRF-TOKEN', theToken);
		                   xhttp.setRequestHeader("X-Requested-With", 'XMLHttpRequest');
		                   xhttp.setRequestHeader("processData", 'false');
		                   xhttp.setRequestHeader('cache', 'false');
		                   //contentType should always be set to false for formData!
		                   //just follow the header set up
		                   //PLease try and document the code on git hub and avoid it
		                   // again.
		                   xhttp.setRequestHeader("ContentType", "false");
		                   xhttp.send(formData);

        	 }
	         
             function gotoHomePage(){
             	 window.location = '/landingpage';
             }
    
             const theForm = document.getElementsByClassName('landLords1')[0];
             theForm.addEventListener('submit', function(event){
             		event.preventDefault();
             		addACourse(this);
             		return;
             }, false);

             function showForm(){
             	  const elem = document.getElementsByClassName('landLords1')[0];
             	  const value = elem.style.display;
             	  if (value == 'none') {
             	  	 elem.style.display = 'block';
             	  }
                  if (value == 'block') {
                  	 elem.style.display = 'none';
                  }

                  if (value == '') {
                  	 elem.style.display = 'block';
                  }
             }

             function showCoursesAvailable(){
                 
             }
        
        </script>
</body>
</html>