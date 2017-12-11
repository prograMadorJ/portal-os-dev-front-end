<?php

namespace App\Helpers;

class UtilsHelper {

	public static function data_passada($date) {
		// Hora atual
		$now = date('Y-m-d H:i:s');

		// converte para timestamp e subtrai
		$diff = strtotime($now) - strtotime($date);

		// Tranformando em anos
		$diff = $diff / (60*60*24*30*12);
		//verificando anos
		if ($diff < 1) {
			// transformando em anos
			$diff = $diff * 12;
			// verificando meses
			if ($diff < 1) {
				// Transformando em meses
				$diff = $diff * 30;
				// Verificando dias
				if ($diff < 1) {
					// Tranformando em horas
					$diff = $diff * 24;
					// Verificando minutos
					if ($diff < 1) {
						// Tranformando em minutos
						$diff = $diff * 60;
						// Verificando segundos
						if ($diff < 1) {
							// Tranformando em segundos
							$diff = $diff * 60;
							if ($diff > 1) {
								return (int)floor($diff) . ' segundos atrás';
							}
						} else {
							if ((int)floor($diff) == 1)
								return '1 minuto atrás';
							else
								return (int)floor($diff) . ' minutos atrás';
						}
					} else {
						if ((int)floor($diff) == 1)
							return '1 hora atrás';
						else
							return (int)floor($diff) . ' horas atrás';
					}
				} else {
					if ((int)floor($diff) == 1)
						return '1 dias atrás';
					else
						return (int)floor($diff) . ' dias atrás';
				}
			} else {
				if ((int)floor($diff) == 1)
					return '1 més atrás';
				else
					return (int) floor($diff) . ' meses atrás';
			}
		} else {
			if ((int)floor($diff) == 1) {
				return '1 ano atrás';
			} else {
				return (int) floor($diff) . ' anos atrás';
			}
		}
	}

	public static function data_completa($date) {
		return  date('d/m/Y H\hi', strtotime($date));
	}

	public static function data($date) {
		return date('d/m/Y', strtotime($date));
	}

	public static function hora($date) {
		return date('H\hi', strtotime($date));
	}

	public static function isMobile() {
		$android = strpos($_SERVER['HTTP_USER_AGENT'], 'Android');
		$ipad = strpos($_SERVER['HTTP_USER_AGENT'], 'iPad');
		$iphone = strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone');
		$ipod = strpos($_SERVER['HTTP_USER_AGENT'], 'iPod');
		$berry = strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry');

		if ($android || $ipad || $iphone || $ipod || $berry) {
			return true;
		} else {
			return false;
		}
	}

}

?>
