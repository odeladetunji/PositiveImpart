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
	   	    
	   	     <div class="container">
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
                  	    <p id="notice" style="display: none;">bla bla bla ...</p>
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
		                   <p class="nott">Select picture for advert below</p>
		                   <input type="file" name="advertpicture" required><br>
		                   <p class="nott">Select Slides for Course Content below<br><span style="color: maroon; background-color: transparent;">PLEASE ENSURE TO SELECT ALL THE SLIDES AT ONCE</span></p>
		                   <input type="file" name="pictures[]" placeholder="select picture" multiple><br>
		                   <textarea name="description" class="textArea" cols="30" rows="10" placeholder="write a summary of this course you are creating, this summary will be displayed when users click on the course (write a smart summary and not the entire thing!!)"></textarea><br>
		                   <button>submit</button><br>
                        </form> 
	   	           </div>
	   	     </div>
	   	     <div class="editContentOfCourses" style="display: flex;">
	   	           	   <p id="mark"></p>
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
        	window.onload = () => {
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
                                                  	  	                                                 	  	    	 
											 var div = '<div class="bkImage" style="background-image: url(/storage/images/' + param.advertpicture + ')" class="coarse"></div>';
                          	  	                                                  	                                                 
											 var li =  '<ul>' +
											              '<li>' + param.title + '</li>' +
											              '<li class="author">Authors</li>' +
											              '<li>' + param.author + '</li>'+ 
											              '<li class="pricing">' + param.price + '</li>' +
											           '</ul>';

											 var outerContainer = '<div class="cont">' + div + li + '</div>';
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
		        	       	        //const data = JSON.parse(this.responseText).message;
		        	       	    	var thisElemement = document.getElementById('notice');
		        	       	    	    thisElemement.style.display = 'block';
		        	       	    	      console.log(data);
		        	       	    	      setTimeout(function(){
		        	       	    	      	 thisElemement.style.display = 'none';
		        	       	    	      }, 5000);
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
		                   xhttp.setRequestHeader("ContentType", "application/x-www-form-urlencoded");
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