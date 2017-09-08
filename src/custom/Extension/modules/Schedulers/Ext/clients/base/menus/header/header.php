<?php

/** Add custom menu to allow users to run scheduler job instantly **/
$viewdefs['Schedulers']['base']['menu']['header'][] = array(
    'route'=>'#bwc/index.php?module=Schedulers&action=InstantRunJob',
    'label' =>'LBL_INSTANT_RUN_JOB',
    'acl_action'=>'admin',
    'acl_module'=>'',
    'icon' => 'fa-rocket',
);
