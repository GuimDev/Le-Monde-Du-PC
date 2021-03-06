<?php
// totp system (U2F) to secure the login 
class Totp {
  	const keyRegeneration = 30;	
	const otpLength = 6;
	private static $lut = array(
		"A" => 0,	"B" => 1,
		"C" => 2,	"D" => 3,
		"E" => 4,	"F" => 5,
		"G" => 6,	"H" => 7,
		"I" => 8,	"J" => 9,
		"K" => 10,	"L" => 11,
		"M" => 12,	"N" => 13,
		"O" => 14,	"P" => 15,
		"Q" => 16,	"R" => 17,
		"S" => 18,	"T" => 19,
		"U" => 20,	"V" => 21,
		"W" => 22,	"X" => 23,
		"Y" => 24,	"Z" => 25,
		"2" => 26,	"3" => 27,
		"4" => 28,	"5" => 29,
		"6" => 30,	"7" => 31
	);

	public static function generate_secret_key($length = 16){
		$b32 = '234567ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$s = '';
		for ($i = 0; $i < $length; $i++){
			$s .= $b32[rand(0,31)];
		}
		return $s;
	}

	public static function get_timestamp(){
		return floor(microtime(true)/self::keyRegeneration);
	}

	public static function base32_decode($b32){
		$b32 = strtoupper($b32);
		if(!preg_match('/^[ABCDEFGHIJKLMNOPQRSTUVWXYZ234567]+$/', $b32, $match)){
			throw new Exception('Invalid characters in the base32 string.');
		}
		$l = strlen($b32);
		$n = 0;
		$j = 0;
		$binary = '';
		for ($i = 0; $i < $l; $i++) {
			$n = $n << 5; 				
			$n = $n + self::$lut[$b32[$i]]; 	
			$j = $j + 5;				
			if ($j >= 8) {
				$j = $j - 8;
				$binary .= chr(($n & (0xFF << $j)) >> $j);
			}
		}
		return $binary;
	}

	public static function oath_hotp($key, $counter){
	    if(strlen($key) < 8){
			throw new Exception('Secret key is too short. Must be at least 16 base 32 characters');
	    }
	    $bin_counter = pack('N*', 0) . pack('N*', $counter);		// Counter must be 64-bit int
	    $hash 	 = hash_hmac ('sha1', $bin_counter, $key, true);
	    return str_pad(self::oath_truncate($hash), self::otpLength, '0', STR_PAD_LEFT);
	}

	public static function verify_key($b32seed, $key){
		if(self::oath_hotp(self::base32_decode($b32seed), self::get_timestamp()) == $key){
			return true;
		}
		return false;
	}

	public static function oath_truncate($hash){
	    $offset = ord($hash[19]) & 0xf;
	    return (
	        ((ord($hash[$offset+0]) & 0x7f) << 24 ) |
	        ((ord($hash[$offset+1]) & 0xff) << 16 ) |
	        ((ord($hash[$offset+2]) & 0xff) << 8 ) |
	        (ord($hash[$offset+3]) & 0xff)
	    ) % pow(10, self::otpLength);
	}
}

// encryption system (aes-256-cbc) to encrypt/decrypt 
class Aes_256 {
    public function __construct($password){
        $this->key = $password;
    } 

    public function encrypt($data){
        $salt = openssl_random_pseudo_bytes(16);
        $salted = '';
        $dx = '';
        while(strlen($salted) < 48){
            $dx = hash('sha256', $dx.$this->key.$salt, true);
            $salted .= $dx;
        }
        $key = substr($salted, 0, 32);
        $iv  = substr($salted, 32,16);
        $encrypted_data = openssl_encrypt($data, 'AES-256-CBC', $key, true, $iv);
        return base64_encode($salt . $encrypted_data);
    }

    public function decrypt($encrypted_data){
        $data = base64_decode($encrypted_data);
        $salt = substr($data, 0, 16);
        $ct = substr($data, 16);
        $rounds = strlen($this->key);
        $data00 = $this->key.$salt;
        $hash = array();
        $hash[0] = hash('sha256', $data00, true);
        $result = $hash[0];
        for($i = 1; $i < $rounds; $i++){
            $hash[$i] = hash('sha256', $hash[$i - 1].$data00, true);
            $result .= $hash[$i];
        }
        $key = substr($result, 0, 32);
        $iv  = substr($result, 32,16);
        return openssl_decrypt($ct, 'AES-256-CBC', $key, true, $iv);
    }
}
?>