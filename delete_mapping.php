<?php
    define('AJAX_SCRIPT', true);
    require_once '../../config.php';
    require_once($CFG->dirroot . '/report/saas_export/lib.php');

    $uid = required_param('uid', PARAM_INT);
    $id = required_param('id', PARAM_INT);
    $action = optional_param('action', 'delete_one', PARAM_TEXT);
        
    $saas = new saas();
    
    switch ($action) {
        case 'delete_one':
            $DB->delete_records('saas_course_mapping', array('courseid'=>$id, 'oferta_disciplina_id'=>$uid));
            break;
        case 'delete_many_offers':
            $DB->delete_records('saas_course_mapping', array('courseid'=>$id));
            break;
        case 'delete_many_courses':
            $DB->delete_records('saas_course_mapping', array('oferta_disciplina_id'=>$uid));
            break;
    }
?>