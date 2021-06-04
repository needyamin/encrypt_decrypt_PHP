
<?php
function encrypt_decrypt($action, $string) {
$output = false;

$encrypt_method = "AES-256-CBC";
$secret_key = '@#@!#@#$@#$@%^##$@#$#'; #### Replace this with your key
$secret_iv = '*@00$#@$@#%##$%@#$#FDFWS#'; ### Replace this with your key

// hash
$key = hash('md5', $secret_key);

// iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
$iv = substr(hash('sha256', $secret_iv), 0, 16);

if( $action == 'encrypt' ) {
    $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
    $output = base64_encode($output);
}
else if( $action == 'decrypt' ){
    $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
}

return $output;
}


/* ###### How to USE this encrypt and decrypt funcation ######
$encryptedString = encrypt_decrypt('encrypt', 'admin');
$decrypte = encrypt_decrypt('decrypt', $encryptedString);

*/

 ;?>



<center style='margin-top:2%;'> 
	
<form method="GET"> 
<input type="text" name="encode">  <input type="submit" name="submit" value="encode">
</form>


<br>

<?php 
$catch = $_GET['encode']; #catch input text

#if click encode button
if(isset($_GET['submit'])){
echo "<b>Encode:</b> <br> " . $catch = encrypt_decrypt('encrypt', $catch); #store data in #catch variable and encrypt
echo"<br>";
echo "<br> <b>What You Type:</b> <br>". $catch = encrypt_decrypt('decrypt', $catch); #Print data form #catch and decrypt
};?>


</center>


