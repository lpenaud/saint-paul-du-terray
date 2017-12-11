<?php
require('model.php');

function displaySejours() {
    global $bdd;
    $sejours = $bdd->query('select * from sejour order by sejno');
    $html = '<h2>Liste des séjours prévus</h2>';
    $html .= '<fieldset>';
    foreach ($sejours as $sejour) {
        $html .= '<sejour>';
        $html .= '<h2><p>' . $sejour['SEJINTITULE'] . '</p></h2>';
        $html .= $sejour['SEJMONTANTMBI'] . '€<br />';
        $html .= 'A partir du ' . $sejour['SEJDTEDEB'];
        $html .= $sejour['SEJDUREE'] . ' nuits';
        $html .= '</sejour>';        
    }
    $html .= '</fieldset>';
    return $html;
}