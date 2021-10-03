<?php

namespace Drupal\dce_demo\Commands;

use Consolidation\OutputFormatters\StructuredData\RowsOfFields;
use Drush\Commands\DrushCommands;
use Consolidation\AnnotatedCommand\CommandData;

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
    $this->logger()->success(dt('Long running process.....'));
  }

  /**
   * Disable purging at start of process.
   *
   * @hook pre-command dcedt
   */
  public function preCommand(CommandData $commandData) {
    // Make sure to inject service via dependency injection here instead.
    \Drupal::service('purge_control.purge_control')->autoDisablePurge();
  }

  /**
   * Enabled purging at the end of process.
   *
   * @hook post-command dcedt
   */
  public function postCommand($result, CommandData $commandData) {
    \Drupal::service('purge_control.purge_control')->autoEnablePurge();
  }

}
