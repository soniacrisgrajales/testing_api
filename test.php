<?php
	define('URL', 'http://181.48.5.178:9000/datasnap/rest');
?>
<?php
//require_once 'config.php';
/**
 *
 *
 */
class api {
	/**
	*
	* Objeto generado por curl
	* 
	* @var curl
	*/
	private $curl;
	/**
	*
	* Código de la aplicación
	* 
	* @var string
	*/
	private $iapp;
	/**
	*
	* Url base usada para conectarse a la api
	*
	* @var string
	*/
	private $baseUrl;
	/**
	*
	* Código único para la sesión del usuario
	* @var string
	*
	*/
	private $keyAgente;
	/**
	*
	* Constructor 
	*
	* Inicializa el objeto curl que será usado en todas las llamadas al API y 
	* algunas de las variables e inicia sesión en el Agente
	*
	*/
	public function __construct(){
		$this->curl = curl_init();
		$this->baseUrl = URL;
	}
	
	function testConnection(){
	    $url = $this->baseUrl . '/TBasicoGeneral/Test';
	    echo 'URL ' . $url;
	    curl_setopt_array($this->curl, array(
	        CURLOPT_RETURNTRANSFER => 0,
	        CURLOPT_URL => $url,
	        CURLOPT_FAILONERROR => true
	    ));
	    curl_exec($this->curl);
	    if(curl_errno($this->curl)){
	        echo curl_error($this->curl);
	    }
	}

	function __destructor(){
		curl_close($this->curl);
	}
}
?>
<?php
	$api = new api();
	$api->testConnection();
?>

<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>
	</body>
</html>