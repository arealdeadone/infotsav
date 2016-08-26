<?php
if(isset($_POST['livemethodname']))
{
	if($_POST['livemethodname']=='Payment')
	{
		$secret_key="78qmiolzshp83uue5cpm0s25d7m3sw1u4b728ge4k6m7e5msfm"; 
		$api_key="3b7r1cymq9dlmfzcj6pjwtlywd6gvw9n0509csolnz55cd7z0r";   
		$api_url="http://thecollegefever.com/tcfwebapi/api/thecollegefever_api.php"; 
		$pageURL = 'http';
		$pageURL.= "://";
		if ($_SERVER["SERVER_PORT"] != "80") {
		  $pageURL.= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
		} else {
		  $pageURL.= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		} 
		
		$data = array(                         
			"secret_key"=>$secret_key,
			"api_key"=>$api_key,
			"client_id"=>"fvzKF7", 
			"task"=>"make_payment",                      
	        "user_name"=>"Kushagra Varshney",                          
	        // User name                       
		    "user_uid"=>"TCF81",                           
		    // User Unique ID Number                      
		    "user_email"=>"kushagravarshney94@gmail.com",                         
		    // User Email Address (to get Ticket)
		    "user_contact_number"=>"9479874663",                
		    // User Contact Number
		    "user_gender"=>"male",                        
		    // User Gender              
		    "user_college_name"=>"Test College",                  
		    // User Collge Name              
		    "user_pursuing_year"=>"Test Year",                 
		    // User Pursuing Year
		    "user_address"=>"Test Address",                       
		    // User Address
		    "user_event_registered"=>"Test Event1,Test Event 2",              
		    // User registered event(Example :General Fees,Accomodation)
		    "user_event_charge"=>"1,2",                  
		    // Per Event charge (Example : 1,2)             
		    "user_event_total_amount"=>"3",            
		    // Total Charge (Example: 3)
		    "user_acomdation_status"=>"Pending",             
		    // User Accomdation Status
		    "user_arrival_date"=>"2015-09-21",                  
		    // User Arrival Date              
		    "user_departure_date"=>"2015-09-21",                
		    // User Departure Date
		    "event_logo"=>"http://thecollegefever.com/tcfwebapi/images/logo.png",                         
		    // Event Logo        
		    "event_admin_email"=>"admin.test@test.com",                  
		    // Event admin email (to get user notification Ticket)        
		    "event_name"=>"Infotsav 2015",                         
		    // Event Name
		    "event_college_name"=>"Test College Name",                 
		    // Event College Name
		    "event_address"=>"Test College Address",                      
		    // Event Address    
                   "event_date"=>"2015-09-21",                      
		    // Set Event Date
                   "orgnaniser_details"=>"Orgnaniser details",                      
		    // Orgnaniser Details
                    "home_page_url"=>"",
		    //Set Go back to Home Page URL
		    "url_origin"=>$pageURL
	    );
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL => $api_url,
			CURLOPT_USERAGENT => 'Curl Request for making payment',
			CURLOPT_POST => 1,
			CURLOPT_POSTFIELDS =>$data
		));
		$response = curl_exec($curl);
		echo $response;
	}	
}
?>
