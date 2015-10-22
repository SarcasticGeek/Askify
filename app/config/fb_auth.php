<?php
return array(
    "base_url" =>"http://askify-app.herokuapp.com/public/facebookauth/auth",
    "providers" => array(
        "Facebook" =>array(
            "enabled" => TRUE,
            "keys" =>array("id"=>"486959811466128","secret"=>"007e6b358aa637e8d48861f2f45b9395"),
            "scope"=>"public_profile,email"
            )
        )
    );