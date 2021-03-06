<?php


function get_previous_errors(){
    static $previous_errors;

    if ($previous_errors){
        return $previous_errors;
    }

    $previous_errors = $_SESSION["previous_errors"] ?? null;
    $_SESSION["previous_errors"] = [];
    return $previous_errors;
}

function get_previous_error($key){
    return get_previous_errors()[$key] ?? null;
}





function validate($rules){

    foreach ($rules as $key => $validations) {
        $value = $_POST[$key] ?? null;
        foreach ($validations as $validation) {

            if (is_callable($validation)){
                $error = $validation($value);
            } else {
                $validation_function = "validate_{$validation}";
                $error = $validation_function($value);

            }

            if ($error) {
                $_SESSION["previous_errors"] = $_SESSION["previous_errors"] ?? null;
                $_SESSION['previous_errors'][$key] = $error;
                break;
            }
        }
    }

    if (!empty($_SESSION["previous_errors"] )) {
        save_inputs();
        redirect_self();
    }
}

function validate_required($value){
    if (empty($value)) {
        return 'le champ est requis';
    }
}