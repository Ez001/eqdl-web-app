<?php
   #   Author of the script
   #   Name: Ezra Adamu
   #   Email: ezra00100@gmail.com
   #   Date created: 29/06/2022
   #   Date modified: 29/03/2023
	
	trait Encryption 
  {
      // Encryption Function
      function encPword( $data )
      {
        return password_hash( $data , PASSWORD_DEFAULT );
      }

      // Decryption Function
      function decPword( $p, $hashed )
      {
        return password_verify( $p, $hashed );
      }

      // encrypt password with md5
      function encryptMd5( $pword ) 
      {
        return md5( $pword );
      }
      
      // encrypt data with hash_hmac
      function encryptHashHmac( $algo = 'sha512', $data = 'ABCD', $key = '-i8/*D' ) 
      {
        return hash_hmac( $algo, $data, $key );
      }
      
  }
?>