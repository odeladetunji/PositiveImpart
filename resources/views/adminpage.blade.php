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
	   	    
	   	     <div class="theBody">
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
          	    		<form method="post" style="display: none;" class="landLords1" name="addACourse" encType="multipart/form-data" action="{{URL::to('/addACourse')}}" >
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
		                   <input type="text" name="author" placeholder="teachers names"><br>
		                   <input type="file" name="picture" placeholder="select picture"><br>
		                   <textarea name="" id="textArea" cols="30" rows="10" placeholder="write a detail descripton of the content of the course you are creating, write a summary of the course. this content will be displayed went users click on the course"></textarea><br>
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
        <script>
        	// dont forget to use babal script!
        	window.onload = () => {
        		function loadContent(){
	        	 	 const theToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
		        	 const xhttp = new XMLHttpRequest();
		        	       xhttp.open('GET', '/LoadCourses', true);
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

        	 function addACourse(param){
        	 		 const theToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
		        	 const xhttp = new XMLHttpRequest();
		        	       xhttp.open('POST', '/addACourse', true);
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
		                   xhttp.send(param);

        	 }
	        	 
             function gotoHomePage(){
             	 window.location = '/landingpage';
             }
             
             theForm.onsubmit = () => {
             	   event.preventDefault();
             	   var theForm = document.getElementsByClassName('landLords1')[0];
             	   var formData = new FormData(theForm);
                   addACourse(formData);
             }

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