<?php
//Backwards Compatibility FUnction
function hunger_logo() {
    if ( function_exists( 'the_custom_logo' ) ) {
        the_custom_logo();
    }
}

function hunger_has_logo() {
    if (function_exists( 'has_custom_logo')) {
        if ( has_custom_logo() ) {
            return true;
        }
    } else {
        return false;
    }
}
