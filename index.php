<?php
	session_start();

	if($_SESSION['Active'] == false){ 
	header("location:login.php");
	  exit;
	}
  
	function my_simple_crypt( $string, $action = 'e' ) {
		$secret_key = 'secret_key_rahasia';
		$secret_iv = 'secret_iv_2022';
	 
		$output = false;
		$encrypt_method = "AES-256-CBC";
		$key = hash( 'sha256', $secret_key );
		$iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
	 
		if( $action == 'e' ) {
			$output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
		}
		else if( $action == 'd' ){
			$output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
		}
	 
		return $output;
	}  
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
    <title>Logged in</title>
  </head>
  <body>
    <div class="container">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation" class="active"><a href="#">Home</a></li>
            <li role="presentation"><a href="logout.php">Keluar</a></li>
          </ul>
        </nav>
        <h3 class="text-muted">PHP Login</h3>
      </div>
	  
	  <?php
		$teksawal = "testingabc";
		$encrypted = my_simple_crypt( $teksawal, 'e' );
		$decrypted = my_simple_crypt( 'QWZBNG5WcHJISW9odEtTdXgrV3E1UT09', 'd' );	  
	  ?>

      <div class="jumbotron">
        <h3>Simple Encrypt/ Decrypt String</h3>
			<?php	
			echo "<b>Teks awal:</b> ".$teksawal;
			echo "<br><br>";
			echo "<b>Encrypt:</b> ".$encrypted;
			echo "<br><br>";
			echo "<b>Decrypt:</b> ".$decrypted;
			?>		
      </div>

    </div>

    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
