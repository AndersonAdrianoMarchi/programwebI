<?php
// Exercício 10 — Renderizar array como árvore recursiva

$pastas = array(
    "bsn" => array(
        "3a Fase" => array(
            "desenvWeb",
            "bancoDados 1",
            "engSoft 1",
        ),
        "4a Fase" => array(
            "Intro Web",
            "bancoDados 2",
            "engSoft 2",
        ),
    ),
);

function renderTree($node) {
    if (is_array($node)) {
        $html = "<ul>";
        foreach ($node as $key => $val) {
            // associative key or numeric index
            if (is_string($key)) {
                $html .= "<li>" . htmlspecialchars($key) . renderTree($val) . "</li>";
            } else {
                // numeric key — leaf value
                if (is_array($val)) {
                    $html .= "<li>" . renderTree($val) . "</li>";
                } else {
                    $html .= "<li>" . htmlspecialchars($val) . "</li>";
                }
            }
        }
        $html .= "</ul>";
        return $html;
    }
    return "<li>" . htmlspecialchars($node) . "</li>";
}

$isAjax = !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
$out = renderTree($pastas);

if ($isAjax) {
    echo $out;
    return;
}

// Fallback full page
echo "<!DOCTYPE html>\n<html lang=\"pt-BR\">\n<head><meta charset=\"utf-8\"><title>Árvore</title></head>\n<body style=\"font-family:Arial,Helvetica,sans-serif;margin:18px\">\n";
echo "<h2>Árvore</h2>\n";
echo $out;
echo "</body>\n</html>\n";

?>
