<?php
// Exercício 3 — Área do quadrado

// Recebe lado via POST (ou usa 3 como padrão)
$lado_raw = isset($_POST['lado']) ? $_POST['lado'] : '3';

// Converte para número (float) e calcula
$lado = floatval($lado_raw);
$area_quadrado = $lado * $lado;

// Sanitiza para exibir
$ladoEsc = htmlspecialchars($lado_raw, ENT_QUOTES, 'UTF-8');

// Se for uma requisição AJAX (fetch), retornamos apenas o fragmento HTML do resultado
$isAjax = !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
if ($isAjax) {
	echo "<p>A área do quadrado de lado {$ladoEsc} metros é <strong>{$area_quadrado}</strong> metros quadrados.</p>";
	return;
}

// Senão, renderiza a página completa
echo "<!DOCTYPE html>\n";
echo "<html lang=\"pt-BR\">\n";
echo "<head><meta charset=\"UTF-8\"><title>Resultado - Exercício 3</title></head>\n";
echo "<body style=\"font-family:Arial,Helvetica,sans-serif;margin:18px\">\n";
echo "<h2>Resultado</h2>\n";
echo "<p>A área do quadrado de lado {$ladoEsc} metros é <strong>{$area_quadrado}</strong> metros quadrados.</p>\n";
echo "<p><a href=\"ex3.html\">Voltar</a></p>\n";
echo "</body>\n</html>\n";
?>