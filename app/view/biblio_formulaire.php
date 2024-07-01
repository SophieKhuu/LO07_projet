<?php

// biliotheque fonctions formulaire avec bootstrap
// --------------------------------------------------
// form_begin
// --------------------------------------------------

function form_begin($class, $method, $action) {
    echo ("\n<!-- ============================================== -->\n");
    echo ("<!-- form_begin : $class $method $action) -->\n");
    printf("<form class='%s' method='%s' action='%s'>\n", $class, $method, $action);
}

// --------------------------------------------------
// form_input_text
// --------------------------------------------------

function form_input_text($label, $name, $size, $value, $required='') {
    echo ("\n<!-- form_input_text : $label $name $size $value -->\n");
    echo ("<div class='form-group col-6'>");
    echo (" <label for='$label' class=' fw-bold'>$label</label>");
    echo (" <input type='text' class='form-control' name='$name' size='$size' value='$value' $required>");
    echo ("</div>");
}

// --------------------------------------------------
// form_input_password
// --------------------------------------------------

function form_input_password($label, $name, $size, $value) {
    echo ("\n<!-- form_input_password : $label $name $size $value -->\n");
    echo ("<div class='form-group col-6'>");
    echo (" <label for='$label' class=' fw-bold'>$label</label>");
    echo (" <input type='password' class='form-control' name='$name' size='$size' value='$value' >");
    echo ("</div>");
}

// --------------------------------------------------
// form_input_hidden
// --------------------------------------------------


function form_input_hidden($name, $value) {
    echo ("\n<!-- form_input_text :  $name  $value -->\n");
    echo (" <input type='hidden' class='form-control' name='$name' value='$value' >");
}
// --------------------------------------------------
// form_check
// --------------------------------------------------

function form_check($label, $name, $value){
         echo ("\n<!-- form_check :  $name  $value $label -->\n");
         echo('<div class="form-check">');
         echo("<input class='form-check-input' type='checkbox' value='$value' id='$label' name='$name'>");
         echo("<label class='form-check-label' for='$label'>$label</label></div>");                        
}

// =========================
// form_select
// =========================

// Parametre $label    : permet un affichage (balise label)
// Parametre $name     : attribut pour identifier le composant du formulaire
// Parametre $multiple : si cet attribut n'est pas vide alors sélection multiple possible
// Parametre $size     : attribut size de la balise select
// Parametre $liste    : un liste d'options. Vous utiliserez un foreach pour générer les balises option

function form_select($label, $name, $multiple, $size, $liste) {
                echo ("\n<!-- form_select : $label, $name, $multiple, $size,");
                print_r($liste);
                echo(" -->\n");
                echo (" <label class='fw-bold'>$label</label>");
                echo '<div>'; 
                if ($multiple != ""){
                echo("<select class='form-select' name='$name"."[]' size='$size' multiple='multiple' >");
                }
                else {
                echo("<select class='form-select' name='$name' size='$size' >");
                }
                        foreach($liste as $val){
                        echo("<option value='$val'>$val</option>");
                        }
                echo'</select>';
                echo '</div>';
}

// =========================

function form_input_reset($value) {
    echo ("\n<!-- form_input_reset : $value -->\n");
    echo ("<button type='reset' class='btn btn-danger' value='$value'>Reset</button>");
}

// =========================

function form_input_submit($value) {
    echo ("<br>");
    echo ("\n<!-- form_input_submit : $value -->\n");
    echo ("<button type='submit' class='btn btn-primary' value='$value'>Submit</button>");
}

// =========================


function form_end() {
    echo ("<!-- form_end -->\n");
    echo("</form>");
    echo ("<br>");
    echo ("\n<!-- ============================================== -->\n");
}

// =========================

?>


