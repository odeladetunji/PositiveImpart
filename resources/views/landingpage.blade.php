<!DOCTYPE html>
<html>
<head>
	    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Positive Impart</title>
        <base href="http://127.0.0.1:8000/">

        <link rel="stylesheet" href="{{ asset('/CSS/landingpage.css') }}">
        <link rel="stylesheet" href="{{ asset('/bootstrap/css/bootstrap.min.css')}}">
        <script src="{{ asset('/js/jquery-3.2.1.min(first).js') }}" type="text/javascript"></script>
</head>
<body>
	   
	   	     <div class="topHeader">
	   	     	<ul>
	   	     		<li onclick="showSignUp()">signup</li>
	   	     		<li onclick="showLogin()">login</li>
	   	     		<li>Financial Support</li>
	   	     		<li>Certificate Courses</li>
	   	     		<li>Activities</li>
	   	     		<li>About Us</li>
	   	     	</ul>
	   	     </div>
	   	     <div class="row theHead" style="background-image: url('storage/images/temidireproject.png');">
	   	     	  <div class="col-sm-12 headCover">
	   	     	  	<h3>PIF</h3>
	   	     	  	<h1>Positive Impart Foundation</h1>
	   	     	    <p>...empowering your career!</p>
	   	     	  </div>
	   	     </div>
	   	     <div class="theBody">
	   	     	 <div class="certifications">
	   	     	 	<p id="mark"></p>
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
        <script type="text/javascript">
        	// dont forget to use babal script!
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
             function showSignUp(){
             	 window.location = '/signuppage';
             }

             function showLogin(){
             	 window.location = '/loginpage';
             }

        </script>
</body>
</html>