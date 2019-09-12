<?php
/*-------------------------------------------------------+
| Project 60 - SEPA direct debit                         |
| Copyright (C) 2013-2018 TTTP                           |
| Author: X+                                             |
+--------------------------------------------------------+
| This program is released as free software under the    |
| Affero GPL license. You can redistribute it and/or     |
| modify it under the terms of this license which you    |
| can read by viewing the included agpl.txt or online    |
| at www.gnu.org/licenses/agpl.html. Removal of this     |
| copyright header is strictly prohibited without        |
| written permission from the original author(s).        |
+--------------------------------------------------------*/

/**
 * Generated from xml/schema/CRM/Sepa/SEPAContributionGroup.xml
 * DO NOT EDIT.  Generated by GenCode.php
 */
require_once 'CRM/Core/DAO.php';
require_once 'CRM/Utils/Type.php';
require_once 'CRM/Core/DAO/Country.php';
class CRM_Sepa_DAO_SEPACreditor extends CRM_Core_DAO
{
  /**
   * static instance to hold the table name
   *
   * @var string
   * @static
   */
  static $_tableName = 'civicrm_sdd_creditor';
  /**
   * static instance to hold the field values
   *
   * @var array
   * @static
   */
  static $_fields = null;
  /**
   * static instance to hold the keys used in $_fields for each field.
   *
   * @var array
   * @static
   */
  static $_fieldKeys = null;
  /**
   * static instance to hold the FK relationships
   *
   * @var string
   * @static
   */
  static $_links = null;
  /**
   * static instance to hold the values that can
   * be imported
   *
   * @var array
   * @static
   */
  static $_import = null;
  /**
   * static instance to hold the values that can
   * be exported
   *
   * @var array
   * @static
   */
  static $_export = null;
  /**
   * static value to see if we should log any modifications to
   * this table in the civicrm_log table
   *
   * @var boolean
   * @static
   */
  static $_log = true;
  /**
   * ID
   *
   * @var int unsigned
   */
  public $id;
  /**
   * FK to Contact ID that owns that account
   *
   * @var int unsigned
   */
  public $creditor_id;
  /**
   * Provided by the bank. ISO country code+check digit+ZZZ+country specific identifier
   *
   * @var string
   */
  public $identifier;
  /**
   * by default creditor_id.display_name snapshot at creation
   *
   * @var string
   */
  public $name;
  /**
   * by default creditor_id.address (billing) at creation
   *
   * @var string
   */
  public $address;
  /**
   * Which Country does this address belong to.
   *
   * @var int unsigned
   */
  public $country_id;
  /**
   * Iban of the creditor
   *
   * @var string
   */
  public $iban;
  /**
   * BIC of the creditor
   *
   * @var string
   */
  public $bic;
  /**
   * prefix for mandate identifiers
   *
   * @var string
   */
  public $mandate_prefix;
  /**
   * currency used by this creditor
   *
   * @var string
   */
  public $currency;
  /**
   * Payment processor link (to be deprecated)
   *
   * @var int unsigned
   */
  public $payment_processor_id;
  /**
   * Default value
   *
   * @var string
   */
  public $category;
  /**
   * Place this creditor's transaction groups in an XML file tagged with this value.
   *
   * @var string
   */
  public $tag;
  /**
   * If true, new Mandates for this Creditor are set to active directly upon creation; otherwise, they have to be activated explicitly later on.
   *
   * @var boolean
   */
  public $mandate_active;
  /**
   * Variant of the pain.008 format to use when generating SEPA XML files for this creditor. FK to SEPA File Formats in civicrm_option_value.
   *
   * @var int unsigned
   */
  public $sepa_file_format_id;
  /**
   * type of the creditor, values are SEPA (default) and PSP
   *
   * @var string
   */
  public $creditor_type;
  /**
   * class constructor
   *
   * @access public
   * @return civicrm_sdd_creditor
   */
  function __construct()
  {
    $this->__table = 'civicrm_sdd_creditor';
    parent::__construct();
  }
  /**
   * return foreign keys and entity references
   *
   * @static
   * @access public
   * @return array of CRM_Core_EntityReference
   */
  static function getReferenceColumns()
  {
    if (!self::$_links) {
      self::$_links = array(
        new CRM_Core_EntityReference(self::getTableName() , 'creditor_id', 'civicrm_contact', 'id') ,
        new CRM_Core_EntityReference(self::getTableName() , 'country_id', 'civicrm_country', 'id') ,
        new CRM_Core_EntityReference(self::getTableName() , 'payment_processor_id', 'civicrm_payment_processor', 'id') ,
      );
    }
    return self::$_links;
  }
  /**
   * returns all the column names of this table
   *
   * @access public
   * @return array
   */
  static function &fields()
  {
    if (!(self::$_fields)) {
      self::$_fields = array(
        'id' => array(
          'name' => 'id',
          'type' => CRM_Utils_Type::T_INT,
          'required' => true,
        ) ,
        'creditor_id' => array(
          'name' => 'creditor_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Creditor Contact ID', array('domain' => 'org.project60.sepa')) ,
          'FKClassName' => 'CRM_Contact_DAO_Contact',
        ) ,
        'identifier' => array(
          'name' => 'identifier',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('SEPA Creditor identifier', array('domain' => 'org.project60.sepa')) ,
          'maxlength' => 35,
          'size' => CRM_Utils_Type::BIG,
        ) ,
        'name' => array(
          'name' => 'name',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('name of the creditor', array('domain' => 'org.project60.sepa')) ,
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
        ) ,
        'address' => array(
          'name' => 'address',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Address of the creditor', array('domain' => 'org.project60.sepa')) ,
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
        ) ,
        'country_id' => array(
          'name' => 'country_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Country', array('domain' => 'org.project60.sepa')) ,
          'FKClassName' => 'CRM_Core_DAO_Country',
        ) ,
        'iban' => array(
          'name' => 'iban',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Iban', array('domain' => 'org.project60.sepa')) ,
          'required' => false,
          'maxlength' => 42,
          'size' => CRM_Utils_Type::BIG,
        ) ,
        'bic' => array(
          'name' => 'bic',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Bic', array('domain' => 'org.project60.sepa')) ,
          'maxlength' => 11,
          'size' => CRM_Utils_Type::TWELVE,
        ) ,
        'currency' => array(
          'name' => 'currency',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Currency used by this creditor', array('domain' => 'org.project60.sepa')) ,
          'maxlength' => 3,
          'size' => CRM_Utils_Type::FOUR,
        ) ,
        'mandate_prefix' => array(
          'name' => 'mandate_prefix',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Mandate numbering prefix', array('domain' => 'org.project60.sepa')) ,
          'maxlength' => 4,
          'size' => CRM_Utils_Type::FOUR,
        ) ,
        'payment_processor_id' => array(
          'name' => 'payment_processor_id',
          'type' => CRM_Utils_Type::T_INT,
          'FKClassName' => 'CRM_Financial_DAO_PaymentProcessor',
        ) ,
        'category' => array(
          'name' => 'category',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Category purpose of the collection', array('domain' => 'org.project60.sepa')) ,
          'maxlength' => 4,
          'size' => CRM_Utils_Type::FOUR,
        ) ,
        'tag' => array(
          'name' => 'tag',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Tag', array('domain' => 'org.project60.sepa')) ,
          'maxlength' => 64,
          'size' => CRM_Utils_Type::BIG,
        ) ,
        'mandate_active' => array(
          'name' => 'mandate_active',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Immediately activate new Mandates', array('domain' => 'org.project60.sepa')) ,
        ) ,
        'sepa_file_format_id' => array(
          'name' => 'sepa_file_format_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('SEPA File Format', array('domain' => 'org.project60.sepa')) ,
          'pseudoconstant' => array(
            'optionGroupName' => 'sepa_file_format',
          )
        ) ,
        'creditor_type' => array(
          'name' => 'creditor_type',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Creditor Type: SEPA (default) or PSP', array('domain' => 'org.project60.sepa')) ,
          'maxlength' => 4,
          'size' => CRM_Utils_Type::EIGHT,
        ) ,
        'uses_bic' => array(
            'name' => 'uses_bic',
            'type' => CRM_Utils_Type::T_BOOLEAN,
            'title' => ts('Does this creditor use BICs?', array('domain' => 'org.project60.sepa')) ,
        ) ,
      );
    }
    return self::$_fields;
  }
  /**
   * Returns an array containing, for each field, the arary key used for that
   * field in self::$_fields.
   *
   * @access public
   * @return array
   */
  static function &fieldKeys()
  {
    if (!(self::$_fieldKeys)) {
      self::$_fieldKeys = array(
          'id'                   => 'id',
          'creditor_id'          => 'creditor_id',
          'identifier'           => 'identifier',
          'name'                 => 'name',
          'address'              => 'address',
          'country_id'           => 'country_id',
          'iban'                 => 'iban',
          'bic'                  => 'bic',
          'currency'             => 'currency',
          'mandate_prefix'       => 'mandate_prefix',
          'payment_processor_id' => 'payment_processor_id',
          'category'             => 'category',
          'tag'                  => 'tag',
          'mandate_active'       => 'mandate_active',
          'sepa_file_format_id'  => 'sepa_file_format_id',
          'creditor_type'        => 'creditor_type',
          'uses_bic'             => 'uses_bic',
      );
    }
    return self::$_fieldKeys;
  }
  /**
   * returns the names of this table
   *
   * @access public
   * @static
   * @return string
   */
  static function getTableName()
  {
    return self::$_tableName;
  }
  /**
   * returns if this table needs to be logged
   *
   * @access public
   * @return boolean
   */
  function getLog()
  {
    return self::$_log;
  }
  /**
   * returns the list of fields that can be imported
   *
   * @access public
   * return array
   * @static
   */
  static function &import($prefix = false)
  {
    if (!(self::$_import)) {
      self::$_import = array();
      $fields = self::fields();
      foreach($fields as $name => $field) {
        if (CRM_Utils_Array::value('import', $field)) {
          if ($prefix) {
            self::$_import['sdd_creditor'] = & $fields[$name];
          } else {
            self::$_import[$name] = & $fields[$name];
          }
        }
      }
      self::$_import = array_merge(self::$_import, CRM_Core_DAO_Country::import(true));
    }
    return self::$_import;
  }
  /**
   * returns the list of fields that can be exported
   *
   * @access public
   * return array
   * @static
   */
  static function &export($prefix = false)
  {
    if (!(self::$_export)) {
      self::$_export = array();
      $fields = self::fields();
      foreach($fields as $name => $field) {
        if (CRM_Utils_Array::value('export', $field)) {
          if ($prefix) {
            self::$_export['sdd_creditor'] = & $fields[$name];
          } else {
            self::$_export[$name] = & $fields[$name];
          }
        }
      }
      self::$_export = array_merge(self::$_export, CRM_Core_DAO_Country::export(true));
    }
    return self::$_export;
  }
}
