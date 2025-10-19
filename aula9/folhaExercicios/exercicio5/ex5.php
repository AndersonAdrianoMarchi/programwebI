<?php
// Exercício 5 — Área do triângulo retângulo

$base_raw = isset($_POST['base']) ? $_POST['base'] : '4';
$altura_raw = isset($_POST['altura']) ? $_POST['altura'] : '3';

$base = floatval($base_raw);
$altura = floatval($altura_raw);
$area = ($base * $altura) / 2;

$baseEsc = htmlspecialchars($base_raw, ENT_QUOTES, 'UTF-8');
$alturaEsc = htmlspecialchars($altura_raw, ENT_QUOTES, 'UTF-8');

$isAjax = !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';

$fragment = "<p>A área do triângulo retângulo de base {$baseEsc} e altura {$alturaEsc} metros é <strong>{$area}</strong> metros quadrados.</p>";

if ($isAjax) {
	echo $fragment;
	return;
}

// Fallback: render full page
echo "<!DOCTYPE html>\n";
echo "<html lang=\"pt-BR\">\n";
echo "<head><meta charset=\"UTF-8\"><title>Resultado - Exercício 5</title></head>\n";
echo "<body style=\"font-family:Arial,Helvetica,sans-serif;margin:18px\">\n";
echo "<h2>Resultado</h2>\n";
echo $fragment . "\n";
echo "<p><a href=\"ex5.html\">Voltar</a></p>\n";
echo "</body>\n</html>\n";

?>
