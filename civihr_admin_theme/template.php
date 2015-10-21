<?php

/**
 * @file
 * template.php
 */


/**
 *  Changes the structure of the report actions form
 *
 *  Hides the select dropdown and submit form, replaced with a Bootstrap's dropdown component
 */
function civihr_admin_theme_views_bulk_operations_form_alter(&$form, &$form_state, $vbo) {
    if ($form_state['step'] == 'views_form_views_form') {;
        $form['select']['#attributes'] = array('class' => array('hide'));
        $form['select']['#title'] = NULL;
        $form['foo']['#markup'] = _report_actions_dropdown_html($form['select']['operation']['#options']);
    }
}

/**
 * Creates the markup of the dropdown component, based on the <select>'s <options>
 *
 * @param array $options
 *   The list of <options>
 * @return string
 *   The dropdown html
 */
function _report_actions_dropdown_html($options) {
    return '
        <div class="dropdown">
            <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Select Action
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">' .
                array_reduce($options, function ($html, $label) {
                    return $html . "<li><a href=\"#\">$label</a></li>";
                }, '')
            . '</ul>
        </div>
    ';
}
