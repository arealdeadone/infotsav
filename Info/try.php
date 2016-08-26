<!DOCTYPE html>
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link href="events.css" rel="stylesheet">
 <link href="css/styles.css" rel="stylesheet">
 <link href="css/bootstrap.min.css" rel="stylesheet">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.js"></script>
 <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
 <script>
    function myFunction(a){
	
    
	function alertContents(httpRequest){
	//console.log(httpRequest.responseText);
    if (httpRequest.readyState == 4){
        // everything is good, the response is received
        if ((httpRequest.status == 200) || (httpRequest.status == 0)){
            var obj = JSON.parse(httpRequest.responseText);
    
  //upper box title and links  
    var ttl = obj.EVENT[a].TITLE;
    var out = "<h2 class='modal-title' style='color: #1bba9c;'><b>";
    var tmp = ttl+"</b></h2>";
    out = out + tmp;
    if(a==0) document.getElementById("myLargeModalLabel").innerHTML = out;/*takshil_change*/
    if(a==1) document.getElementById("myLargeModalLabel1").innerHTML = out;
    if(a==2) document.getElementById("myLargeModalLabel2").innerHTML = out;
    if(a==3) document.getElementById("myLargeModalLabel3").innerHTML = out;
    if(a==4) document.getElementById("myLargeModalLabel4").innerHTML = out;
    if(a==5) document.getElementById("myLargeModalLabel5").innerHTML = out;
    if(a==6) document.getElementById("myLargeModalLabel6").innerHTML = out;
    if(a==7) document.getElementById("myLargeModalLabel7").innerHTML = out;

  
        }else{
            alert('There was a problem with the request. ' + httpRequest.status + httpRequest.responseText);
        }
    }
};
function send_with_ajax( the_url ){
    var httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = function() { alertContents(httpRequest); };  
    httpRequest.open("GET", the_url, true);
    httpRequest.send();
};

send_with_ajax( "ajax.php" );
</script>
 

</head>


<body> 
<div class="content_white container">               
        <?php
            $xml = file_get_contents('events.xml');
             $EVENTLIST = new SimpleXMLElement($xml);
             echo $EVENTLIST->EVENT[1]->TITLE;?>        

                
                <h3>Technical events</h3>
                <p >Infotsav, a National level Techno-Management fest born with the motto of promoting technology & inspiring business, entrepreneurship skills among the young 
guns has crossed the rallying point and got launched, with all doors open for the entries to come in and take their position in the various heats.With the event getting started on ***. ’15 shall proceed on up till ******. ’15. So, it’s time to gear up with what all you have in your bag, to be a part of the most crowd-pulling event of Central India. It brings you an opportunity to interact with such personalities who are at the helm of changing our world today. Previous speakers who have graced the lecture series include the likes of John C. Mather (The 2006 Physics Nobel Laureate), Lyn Evans (Project Leader, Large Hadron Collider, CERN), Pranav Mistry (The Inventor of 6th Sense Technology), Stephen P. Morse (Chief Architect, Intel 8086 Microprocessor), Richard Stallman (Founder, Free Software Movement), Walter Bender (Ex-Director, MIT Media Labs), etc. Having gained immense popularity over the past few years, it is widely recognized as the biggest and the best lecture series in the entire nation and we are sure that we'll be successful in outdoing ourselves yet again. So come, listen and get inspired!</p>
                
                
            </div>
            
 <!--start of first event-->           
<div class="content-section-b">
             
             <div class="container">

                
                
                
                <div class="row">
                 
                 
                 
                 
                 
                     <div class="col-lg-5 right_box ">
                     
                     
                     
                     
                     
                          <div class="clearfix"></div>
                      
                           <h2 class="animated bounceInLeft" ><?php
            $xml = file_get_contents('events.xml');
             $EVENTLIST = new SimpleXMLElement($xml);
             echo $EVENTLIST->EVENT[0]->TITLE;?></h2>
                           <p  class="animated bounceInLeft"><?php  echo $EVENTLIST->EVENT[0]->DESCRIPTION; ?></p>
                    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div id='myLargeModalLabel' class="modal-header"  ></div>
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

  

  <!-- Wrapper for slides -->
 
 <div class="carousel-inner">
    <div class="item active">
    
     <div class="container">
    <?php  echo $EVENTLIST->EVENT[0]->RULES; ?>
     </div>
    </div>
    
    <div class="item">
      <div class="container">
     
      <?php  echo $EVENTLIST->EVENT[0]->DESCRIPTION; ?>
     </div>
    </div>
     <div class="item">
     <div class="container">
     
     <?php  echo $EVENTLIST->EVENT[0]->TIMELINE; ?>
     </div>
    </div>
    <div class="item">
     <div class="container">
     
    <?php  echo $EVENTLIST->EVENT[0]->CONTACTS; ?>
     </div>
    </div>
  </div>
  
  
  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
