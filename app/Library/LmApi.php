<?php

namespace App\Library;

/**
 * @todo Classe para conexão com a API do LM
 */
class LmApi {

	public $url_base;
	public $url_create;
	public $method;
	public $debug;
	public $basic_auth;
	public $email_admin;

	public function __construct() {
		$this->url_base = env('LM_URL');
		$this->url_create = env('LM_URL').'/api/v1/lead/create';
		$this->method = 'POST';
		$this->debug = false;
		$this->basic_auth = 'Authorization: Basic '.env('LM_SECRET');
		$this->email_admin = "jean.mfdias@direitodeouvir.com.br";
	}
	/**
	 * Faz a chamada do LM
	 */
	public function call($data = array()) {
		$ch = curl_init($this->url_create);

		$headers = [
			$this->basic_auth,
			'Content-Type: application/json',
			'Accept: application/json'
		];
		if ($this->method == 'POST') {
			$data_string = json_encode($data);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
			$headers[] = 'Content-Length: ' . strlen($data_string);
			if ($this->debug) {
				echo 'Dados Form:';
				var_dump($data_string);
				echo 'Headers:';
				var_dump($headers);
			}
		}
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers );
		curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);

		$result = curl_exec($ch);
		if (!$result) {
	    	// echo 'ERRO:';
	     	// trigger_error(curl_error($ch));
	        error_log(curl_error($ch), 1, $this->email_admin);
	    }

	    if ($this->debug) {
			$info = curl_getinfo($ch);
			foreach ($info as $key => $value) {
				echo $key.': '.$value.' | '.PHP_EOL;
			}
	    }
		curl_close($ch);

		return json_decode($result, true);
	}

	/**
	 * Faz o tratamento das variáveis
	 */
	public function treat() {
		$data = array();

		$data['name'] = isset($_POST['nome']) ? utf8_encode($_POST['nome']) : null;
		$data['phone'] = isset($_POST['telefone']) ? $_POST['telefone'] : null;
		if(is_null($data['phone'])){
			$data['phone'] = isset($_POST['fone']) ? $_POST['fone'] : null;
		}
		$data['mobile'] = isset($_POST['cel']) ? $_POST['cel'] : null;
		$data['zipcode'] = isset($_POST['cep']) ? $_POST['cep'] :	null;
		$data['city'] = isset($_POST['cidade']) ? utf8_encode($_POST['cidade']) : null;
		$data['state'] = isset($_POST['estado']) ? $_POST['estado'] : null;
		$data['email'] = isset($_POST['email']) ? $_POST['email'] : '';
		$data['focus_id'] = isset($_POST['foco'])	? $_POST['foco'] : 1; // Foco 1 = Aparelho Auditivo | 2 = Fonoaudiólogo | 3 - Franqueado
		$data['lead_status'] = isset($_POST['is_spam']) ? 7 : 1;
		if ($data['email'] == '') {
			unset($data['email']);
		}

		if (isset($_COOKIE['utm_source'])) {
			$data['source_id'] = $_COOKIE['utm_source'];
		} else {
			if (isset($_COOKIE["origURL"])) {
				/**
				* @todo Verificar se existe a fonte no LM, se não existir cadastrar, e pegar o ID
				* E jogar no cookie $_COOKIE['utm_source']
				*/
				# Busca se existe o source
				$name = str_replace('https://', '', str_replace('http://', '', $_COOKIE["origURL"]) );
				if( strpos($name, '/') ){
					$name = substr($name, 0, strpos($name, '/') );
				}
				$this->url_create = $this->url_base.'/api/v1/source/find/'.urlencode($name);
				$this->method = 'GET';
				$retorno = $this->call(null);
				if (!$retorno['success']) {
					# Não existe, logo tem q criar
					$data_source = ['name'=>$name];
					$this->method = 'POST';
					$this->url_create = $this->url_base.'/api/v1/source/create';
					$retorno = $this->call($data_source);

					if ($retorno['success']) {
						$source_id = $retorno['id'];
					} else {
						error_log('Não foi possível cadastrar o source '.$name.' na API.',1, $this->email_admin);
						$source_id = 1;
					}
				} else {
					# Já existe o Source
					$source_id = $retorno['id'];
				}

				setcookie(
					"utm_source",
					$source_id,
					time()+((3600*24)*4), // 3600 = 1hora * 24 (um dia) * 4 (dias)
					"/",
					".direitodeouvir.com.br"
				);

				# Volta a url_create para a padrão
				$this->method = 'POST';
				$this->url_create = $this->url_base.'/api/v1/lead/create';

				$data['source_id'] = $source_id;
				# Remove o cookie de origem
				setcookie("origURL", "", time() - 3600,"/", ".direitodeouvir.com.br");
			} else {
				$data['source_id'] = 20;
			}
		}

		if (isset($_COOKIE['utm_campaign'])) {
			$data['campaign'] = $_COOKIE['utm_campaign'];
		} elseif (isset($_POST['campanha']) && $_POST['campanha']) {
			$data['campaign'] = $_POST['campanha'];
		}

		if (isset($_COOKIE['utm_medium'])) {
			$data['medium_id'] = $_COOKIE['utm_medium'];
		}

		if (isset($_COOKIE['utm_term'])) {
			$data['terms'] = $_COOKIE['utm_term'];
		}

		if (isset($_COOKIE['utm_content'])) {
			$data['campaign_content_id'] = $_COOKIE['utm_content'];
		}
		// DDO Indicador
		if (isset($_COOKIE["indicador_campanha"])) {
			$data['indicador_campanha'] = $_COOKIE['indicador_campanha'];
		}

		return $data;
	}

}
