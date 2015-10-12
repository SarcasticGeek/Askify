<?php
return array(	
	"base_url"   => "http://localhost:8000/authViaGoogle/auth",
	"providers"  => array (
		
		"Google"    => array (
			"enabled"    => true,
			"keys"       => array ( "id" => "696498728575-h89vc2fq6n4ju5erm0c24h8hfemaq3be.apps.googleusercontent.com"
				, "secret" => "bT730ys3k5VZiPC_M4-_iZtx" ),
			"scope"           => "https://www.googleapis.com/auth/userinfo.profile ". // optional
                           				    "https://www.googleapis.com/auth/userinfo.email"    // optional
			),
	),
);
