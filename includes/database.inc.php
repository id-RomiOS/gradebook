<?php

function db_connect() {
  $settings = parse_ini_file('settings/settings.ini', TRUE);
  mysql_connect($settings['db_host'], $settings['db_user'], $settings['db_pass']) or die('ERROR_CONNECT_TO_MYSQL');
  mysql_select_db($settings['db_name']) or die('ERROR_SELECT_DB');
  return TRUE;
}

function db_select_array($db_table, $db_field, $db_condition) {
  $sql = "SELECT $db_field FROM $db_table WHERE $db_condition";
  $result = mysql_query($sql) or die('ERROR_SELECT_DATA_FROM_DB');
  $num_rows = mysql_num_rows($result);
  $value[0] = $num_rows;
  for ($i=1; $i<=$num_rows; $i++) {
    $value[$i] = mysql_fetch_assoc($result);
  }
  return $value;
}

function db_select_row($db_table, $db_field, $db_condition) {
  $sql = "SELECT $db_field FROM $db_table WHERE $db_condition";
  $result = mysql_query($sql) or die('ERROR_SELECT_DATA_FROM_DB');
  $value = mysql_fetch_assoc($result);
  return $value;
}

function db_select_field($db_table, $db_field, $db_condition) {
  $sql = "SELECT $db_field FROM $db_table WHERE $db_condition";
  $result = mysql_query($sql) or die('ERROR_SELECT_DATA_FROM_DB');
  $value = mysql_fetch_array($result);
  return $value[0];
}

function db_insert($db_table, $db_field, $db_values) {
  $sql = "INSERT INTO $db_table ($db_field) VALUES ($db_values)";
  $result = mysql_query($sql) or die('ERROR_INSERT_DATA_INTO_DB');
  return $result;
}

function db_update($db_table, $db_new_values, $db_condition) {
  $sql = "UPDATE $db_table SET $db_new_values WHERE $db_condition";
  $result = mysql_query($sql) or die('ERROR_UPDATE_DATA_INTO_DB');
  return $result;
}

function db_delete($db_table, $db_condition) {
  $sql = "DELETE FROM $db_table WHERE $db_condition";
  $result = mysql_query($sql) or die('ERROR_DELETE_DATA_FROM_DB');
  return $result;
}

?>