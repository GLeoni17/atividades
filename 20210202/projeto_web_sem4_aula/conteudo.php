<?php
	function exibir($titulo, $conteudos) {
		$html = "<!DOCTYPE html>\n";
		$html .= "<html lang='pt-BR'>\n";
		$html .= "\t<head>\n";
		$html .= "\t\t<meta charset='UTF-8' />\n";
		$html .= "\t\t<title>".$titulo."</title>\n";
		$html .= "\t\t<script src='js/jquery-3.5.1.min.js'></script>\n";
		$html .= "\t\t<script src='js/verifica_deletar_cookies.js'></script>\n";
		$html .= "\t</head>\n";
		$html .= "\t<body>\n";
		foreach($conteudos as $conteudo) {
			$html .= "\t\t".$conteudo."\n";
		}
		$html .= "\t\t<div id='div_cookies'></div>\t\t";
		$html .= "\t\t<button type='button' id='apaga_cookies'>Apagar Cookies</button>\t\t";
		$html .= "\t</body>\n";
		$html .= "</html>";
		echo $html;
	}
?>