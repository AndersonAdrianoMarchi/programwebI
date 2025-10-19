<?php
// Exercício 4 — Área do retângulo

// Recebe lados via POST ou usa padrões
$a_raw = isset($_POST['a']) ? $_POST['a'] : '3';
$b_raw = isset($_POST['b']) ? $_POST['b'] : '2';

$a = floatval($a_raw);
$b = floatval($b_raw);
$area = $a * $b;

$aEsc = htmlspecialchars($a_raw, ENT_QUOTES, 'UTF-8');
$bEsc = htmlspecialchars($b_raw, ENT_QUOTES, 'UTF-8');

$isAjax = !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';

// Prepara o fragmento de resultado (usa h1 se area>10, senão h3)
if ($area > 10) {
	$fragment = "<h1>A área do retângulo de lados {$aEsc} e {$bEsc} metros é {$area} metros quadrados.</h1>";
} else {
	$fragment = "<h3>A área do retângulo de lados {$aEsc} e {$bEsc} metros é {$area} metros quadrados.</h3>";
}

if ($isAjax) {
	echo $fragment;
	return;
}

// Fallback: renderiza página completa
echo "<!DOCTYPE html>\n";
echo "<html lang=\"pt-BR\">\n";
echo "<head><meta charset=\"UTF-8\"><title>Resultado - Exercício 4</title></head>\n";
echo "<body style=\"font-family:Arial,Helvetica,sans-serif;margin:18px\">\n";
echo "<h2>Resultado</h2>\n";
echo $fragment . "\n";
echo "<p><a href=\"ex4.html\">Voltar</a></p>\n";
echo "</body>\n</html>\n";

?>
