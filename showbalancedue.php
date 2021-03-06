<?php

require_once 'showbalancedue.civix.php';

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function showbalancedue_civicrm_config(&$config) {
  _showbalancedue_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function showbalancedue_civicrm_xmlMenu(&$files) {
  _showbalancedue_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function showbalancedue_civicrm_install() {
  _showbalancedue_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function showbalancedue_civicrm_uninstall() {
  _showbalancedue_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function showbalancedue_civicrm_enable() {
  _showbalancedue_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function showbalancedue_civicrm_disable() {
  _showbalancedue_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function showbalancedue_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _showbalancedue_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function showbalancedue_civicrm_managed(&$entities) {
  _showbalancedue_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function showbalancedue_civicrm_caseTypes(&$caseTypes) {
  _showbalancedue_civix_civicrm_caseTypes($caseTypes);
}

function showbalancedue_civicrm_searchColumns($contextName, &$columnHeaders, &$rows, $form) {
  if ($contextName == 'contribution') {
    foreach ($columnHeaders as $index => $column) {
      if (!empty($column['field_name']) && $column['field_name'] == 'total_amount') {
        $weight = $column['weight'] + 4;
        $columnHeaders[] = array(
          'name' => ts('Balance Due'),
          'field_name' => 'balance_due',
          'weight' => $weight,
        );

        foreach ($rows as $key => $row) {
          $balanceDue = CRM_Contribute_BAO_Contribution::getContributionBalance($row['contribution_id'], $row['total_amount']);
          $rows[$key]['balance_due'] = sprintf("<b>%s</b>", CRM_Utils_Money::format($balanceDue));
        }
        break;
      }
    }
  }
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function showbalancedue_civicrm_angularModules(&$angularModules) {
  _showbalancedue_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function showbalancedue_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _showbalancedue_civix_civicrm_alterSettingsFolders($metaDataFolders);
}
