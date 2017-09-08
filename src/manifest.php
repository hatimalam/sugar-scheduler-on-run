<?php
/*
 * Your installation or use of this SugarCRM file is subject to the applicable
 * terms available at
 * http://support.sugarcrm.com/Resources/Master_Subscription_Agreements/.
 * If you do not agree to all of the applicable terms or do not have the
 * authority to bind the entity as an authorized representative, then do not
 * install or use this SugarCRM file.
 *
 * Copyright (C) SugarCRM Inc. All rights reserved.
 */


$manifest = array (
  'acceptable_sugar_versions' =>
  array (
    0 => '7.*',
  ),
  'acceptable_sugar_flavors' =>
  array (
    0 => 'PRO',
    1 => 'ENT',
    2 => 'ULT',
  ),
  'readme' => "This plugin helps developers quickly test and run sugar scheduled jobs by simply accessing the Instant Run Job view and selecting the job. It doesn't wait for system scheduler to run the job and it doesn't require system scheduler to be set up.
Initially written by: Hatim Alam
Email: hatimalam@gmail.com",
  'key' => 'hats',
  'author' => 'Hatim Alam',
  'description' => 'This package includes functionality to quickly run and test sugar scheduled jobs.',
  'icon' => '',
  'is_uninstallable' => true,
  'name' => 'Instant Run Scheduler',
  'published_date' => '2017-09-08 18:45:00',
  'type' => 'module',
  'version' => '1.0',
  'remove_tables' => 'prompt',
);


$installdefs = array (
  'id' => 'Instant Run Scheduler',
  'copy' =>
  array (
    0 =>
    array (
      'from' => '<basepath>/custom',
      'to' => 'custom',
    ),
  ),
);
