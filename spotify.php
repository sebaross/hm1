<?php 
    
        $client_id="2e213ccfe19c4620a3fd42958296fee5";
        $client_secret="1da4af57f6f44ef18eec009c70a812a7"; 

        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://accounts.spotify.com/api/token' );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($ch, CURLOPT_POST, 1);

        curl_setopt($ch, CURLOPT_POSTFIELDS, 'grant_type=client_credentials'); 
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Basic '.base64_encode($client_id.':'.$client_secret))); 
        $token=json_decode(curl_exec($ch), true);
        curl_close($ch);    
        
        $query = urlencode($_GET["q"]);
        $url = 'https://api.spotify.com/v1/search?type=album&q=' .$query;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.$token['access_token'])); 
        $res =(curl_exec($ch));
        
        curl_close($ch);

        echo $res;
    
?>