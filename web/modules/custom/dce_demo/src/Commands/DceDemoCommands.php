<?php

namespace Drupal\dce_demo\Commands;

use Consolidation\OutputFormatters\StructuredData\RowsOfFields;
use Drush\Commands\DrushCommands;

/**
 * A Drush commandfile.
 *
 * In addition to this file, you need a drush.services.yml
 * in root of your module, and a composer.json file that provides the name
 * of the services file to use.
 *
 * See these files for an example of injecting Drupal services:
 *   - http://cgit.drupalcode.org/devel/tree/src/Commands/DevelCommands.php
 *   - http://cgit.drupalcode.org/devel/tree/drush.services.yml
 */
class DceDemoCommands extends DrushCommands {

  /**
   * This is a test command.
   *
   * @param $arg1
   *   Argument description.
   * @param array $options
   *   An associative array of options whose values come from cli, aliases, config, etc.
   * @option option-name
   *   Description
   * @usage dce_demo:test foo
   *   Usage description
   *
   * @command dce_demo:test
   * @aliases dcedt
   */
  public function commandName($arg1, $options = ['option-name' => 'default']) {
    $this->logger()->success(dt('Achievement unlocked.'));
  }
}
