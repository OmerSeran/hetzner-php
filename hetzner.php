class Hetzner {
	
	private $token;
	
	private function curl($url, $code){
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		if($code){
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $code);			
		}
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Authorization: Bearer '.$this->token.''
		));		

		$output = curl_exec($ch);
		return $output;		

	}
	
	private function curlPost($url, $post_data){
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, 1);
		if($post_data != 0){
		
		$post_data = json_encode($post_data);		
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
		}
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Authorization: Bearer '.$this->token.''
		));		

		$output = curl_exec($ch);
		return $output;

	}

	private function curlGet($url){
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Authorization: Bearer '.$this->token.''
		));		

		$output = curl_exec($ch);
		return $output;

	}
	
	
	
	public function __construct($config){
		
		$this->token = $config["token"];
		
		
	}
	
	public function getServers(){
		
		$servers = $this->curlGet("https://api.hetzner.cloud/v1/servers");
		
		$servers = json_decode($servers, true);
		
		return $servers;
		
		
	}
	
	public function getServer($id){
		
		$server = $this->curlGet("https://api.hetzner.cloud/v1/servers/".$id."");
	
		$server = json_decode($server, true);
		
		return $server;
	
	}
	
	public function createServer($array){
		
		$createServer = $this->curlPost("https://api.hetzner.cloud/v1/servers", $array);
	
		$createServer = json_decode($createServer, true);
		
		return $createServer;
		
	}
	
	public function deleteServer($id){
		
		$deleteServer = $this->curl("https://api.hetzner.cloud/v1/servers/".$id."", "DELETE");
		
		$deleteServer = json_decode($deleteServer, true);
		
		return $deleteServer;		
	
	}
	
	public function startServer($id){
		
		$startServer = $this->curlPost("https://api.hetzner.cloud/v1/servers/".$id."/actions/poweron", 0);
		
		$startServer = json_decode($startServer, true);
		
		return $startServer;
	}

	public function rebootServer($id){
		
		$rebootServer = $this->curlPost("https://api.hetzner.cloud/v1/servers/".$id."/actions/reboot", 0);
		
		$startServer = json_decode($rebootServer, true);
		
		return $rebootServer;
		
	}

	public function restartServer($id){
		
		$restartServer = $this->curlPost("https://api.hetzner.cloud/v1/servers/".$id."/actions/reset", 0);
		
		$restartServer = json_decode($restartServer, true);
		
		return $restartServer;
		
	}

	public function shutdownServer($id){
		
		$shutdownServer = $this->curlPost("https://api.hetzner.cloud/v1/servers/".$id."/actions/shutdown", 0);
		
		$shutdownServer = json_decode($shutdownServer, true);
		
		return $shutdownServer;
		
	}
	
	public function stopServer($id){
		
		$stopServer = $this->curlPost("https://api.hetzner.cloud/v1/servers/".$id."/actions/poweroff", 0);
		
		$stopServer = json_decode($stopServer, true);
		
		return $stopServer;
		
		
	}
	
	public function resetRootPassword($id){
		
		$resetRootPassword = $this->curlPost("https://api.hetzner.cloud/v1/servers/".$id."/actions/reset_password", 0);
		
		$resetRootPassword = json_decode($resetRootPassword, true);
		
		return $resetRootPassword;
		
		
	}	

	public function rebuildServer($id, $image){
		
		$rebuild = $this->curlPost("https://api.hetzner.cloud/v1/servers/".$id."/actions/rebuild", array(
			"image" => $image
		));
		
		$rebuild = json_decode($rebuild, true);
		
		return $rebuild;
		
		
	}	
	
	
}
