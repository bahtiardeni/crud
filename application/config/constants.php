<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code


/*ENVIRONMENT*/
defined("ENVIRONMENT_PRODUCTION")                   OR define("ENVIRONMENT_PRODUCTION", "production");
defined("ENVIRONMENT_TESTING")                      OR define("ENVIRONMENT_TESTING", "testing");
defined("ENVIRONMENT_DEVELOPMENT")                  OR define("ENVIRONMENT_DEVELOPMENT", "development");

// DATABASE
defined("DATABASE_DEFAULT")                         OR define("DATABASE_DEFAULT", "default");
defined("DATABASE_ERECOM")                          OR define("DATABASE_ERECOM", "erecom");
defined("DATABASE_RECRUITMENT")                     OR define("DATABASE_RECRUITMENT", "recrruitment");

// Roles
defined("ROLE_ADMINISTRATOR")                       OR define("ROLE_ADMINISTRATOR", "ADMINISTRATOR");
defined("ROLE_ADMIN")                               OR define("ROLE_ADMIN", "ADMIN");
defined("ROLE_USER")                                OR define("ROLE_USER", "USER");
defined("ROLE_Z")                                   OR define("ROLE_Z", "ROLE_Z");

// Ajax Result
defined("RESULT_ERROR")                             OR define("RESULT_ERROR", "error");
defined("RESULT_SUCCESS")                           OR define("RESULT_SUCCESS", "success");
defined("RESULT_HOLD")                              OR define("RESULT_HOLD", "hold");
defined("RESULT_ABORT")                             OR define("RESULT_ABORT", "abort");

// SQL Query Condition
defined('SQL_CONDITION_FIELD')                      OR define('SQL_CONDITION_FIELD', "field");
defined('SQL_CONDITION_OPERATOR')                   OR define('SQL_CONDITION_OPERATOR', "op");
defined('SQL_CONDITION_VALUE')                      OR define('SQL_CONDITION_VALUE', "val");
defined('SQL_CONDITION_QUERY')                      OR define('SQL_CONDITION_QUERY', "query");
defined('SQL_CONDITION_OR_QUERY')                   OR define('SQL_CONDITION_OR_QUERY', "or_query");

defined('SQL_WHERE_EQUAL')                          OR define('SQL_WHERE_EQUAL', "EQUAL");
defined('SQL_WHERE_NULL')                           OR define('SQL_WHERE_NULL', "NULL");
defined('SQL_WHERE_NOT_NULL')                       OR define('SQL_WHERE_NOT_NULL', "NOTNULL");
defined('SQL_WHERE_GREATER_THAN')                   OR define('SQL_WHERE_GREATER_THAN', "GREATER_THAN");
defined('SQL_WHERE_LESS_THAN')                      OR define('SQL_WHERE_LESS_THAN', "LESS_THAN");
defined('SQL_WHERE_GREATER_EQUAL')                  OR define('SQL_WHERE_GREATER_EQUAL', "GREATER_EQUAL");
defined('SQL_WHERE_LESS_EQUAL')                     OR define('SQL_WHERE_LESS_EQUAL', "LESS_EQUAL");
defined('SQL_WHERE_NOT_EQUAL')                      OR define('SQL_WHERE_NOT_EQUAL', "NOT_EQUAL");

defined('SQL_WHERE_LIKE')                           OR define('SQL_WHERE_LIKE', "LIKE");
defined('SQL_WHERE_LIKE_BEFORE')                    OR define('SQL_WHERE_LIKE_BEFORE', "LIKE_BEFORE");
defined('SQL_WHERE_LIKE_AFTER')                     OR define('SQL_WHERE_LIKE_AFTER', "LIKE_AFTER");
defined('SQL_WHERE_NOT_LIKE')                       OR define('SQL_WHERE_NOT_LIKE', "NOT_LIKE");
defined('SQL_WHERE_BETWEEN')                        OR define('SQL_WHERE_BETWEEN', "BETWEEN");
defined('SQL_WHERE_IN')                             OR define('SQL_WHERE_IN', "IN");
defined('SQL_WHERE_NOT_IN')                         OR define('SQL_WHERE_NOT_IN', "NOT_IN");

defined('SQL_WHERE_OR_EQUAL')                       OR define('SQL_WHERE_OR_EQUAL', "=");
defined('SQL_WHERE_OR_GREATER_THAN')                OR define('SQL_WHERE_OR_GREATER_THAN', ">");
defined('SQL_WHERE_OR_LESS_THAN')                   OR define('SQL_WHERE_OR_LESS_THAN', ">");
defined('SQL_WHERE_OR_GREATER_EQUAL')               OR define('SQL_WHERE_OR_GREATER_EQUAL', ">=");
defined('SQL_WHERE_OR_LESS_EQUAL')                  OR define('SQL_WHERE_OR_LESS_EQUAL', "<=");
defined('SQL_WHERE_OR_NOT_EQUAL')                   OR define('SQL_WHERE_OR_NOT_EQUAL', "<>");

defined('SQL_WHERE_OR_LIKE')                        OR define('SQL_WHERE_OR_LIKE', "LIKE");
defined('SQL_WHERE_OR_BETWEEN')                     OR define('SQL_WHERE_OR_BETWEEN', "OR_BETWEEN");
defined('SQL_WHERE_OR_IN')                          OR define('SQL_WHERE_OR_IN', "IN");
defined('SQL_WHERE_OR_NOT_IN')                      OR define('SQL_WHERE_OR_NOT_IN', "NOT_IN");

defined('SQL_SEPARATOR_DB')                         OR define('SQL_SEPARATOR_DB', ",");
defined('SQL_SEPARATOR_CONCAT')                     OR define('SQL_SEPARATOR_CONCAT', "<br>");

defined("DATA_LEVEL_GLOBAL")                        OR define("DATA_LEVEL_GLOBAL", "GLOBAL");
defined("DATA_LEVEL_CLIENT")                        OR define("DATA_LEVEL_CLIENT", "CLIENT");

defined("SOURCE_TYPE_FIELD")                        OR define("SOURCE_TYPE_FIELD", "FIELD");
defined("SOURCE_TYPE_METADATA")                     OR define("SOURCE_TYPE_METADATA", "METADATA");

defined("DATATABLE_POST")                           OR define("DATATABLE_POST", "POST");
defined("DATATABLE_GET")                            OR define("DATATABLE_GET", "GET");

defined("DATATABLE_TYPE_TABLE")                     OR define("DATATABLE_TYPE_TABLE", "DATATABLE");
defined("DATATABLE_TYPE_TREE")                      OR define("DATATABLE_TYPE_TREE", "TREETABLE");

defined("DATA_TYPE_ACTION")                         OR define("DATA_TYPE_ACTION", "xxxxxx");
defined("DATA_TYPE_ID")                             OR define("DATA_TYPE_ID", "ID");
defined("DATA_TYPE_AUTO_INCREMENT")                 OR define("DATA_TYPE_AUTO_INCREMENT", "Autoincrement");
defined("DATA_TYPE_TEXTBOX")                        OR define("DATA_TYPE_TEXTBOX", "Text");
defined("DATA_TYPE_TEXTBOX_EMAIL")                  OR define("DATA_TYPE_TEXTBOX_EMAIL", "Email");
defined("DATA_TYPE_CODE_GENERATOR")                 OR define("DATA_TYPE_CODE_GENERATOR", "Code Generator");
defined("DATA_TYPE_TEXTBOX_PASSWORD")               OR define("DATA_TYPE_TEXTBOX_PASSWORD", "Password");
defined("DATA_TYPE_ENCRYPTION")                     OR define("DATA_TYPE_ENCRYPTION", "Encryption");
defined("DATA_TYPE_NUMBER")                         OR define("DATA_TYPE_NUMBER", "Number");
defined("DATA_TYPE_NUMBER_ENCRYPTION")              OR define("DATA_TYPE_NUMBER_ENCRYPTION", "Number Encryption");
defined("DATA_TYPE_DECIMAL")                        OR define("DATA_TYPE_DECIMAL", "Decimal");
defined("DATA_TYPE_TEXTAREA")                       OR define("DATA_TYPE_TEXTAREA", "Textarea");
defined("DATA_TYPE_HTML")                           OR define("DATA_TYPE_HTML", "HTML");

defined("DATA_TYPE_DATE")                           OR define("DATA_TYPE_DATE", "Date");
defined("DATA_TYPE_TIME")                           OR define("DATA_TYPE_TIME", "Time");
defined("DATA_TYPE_DATETIME")                       OR define("DATA_TYPE_DATETIME", "DateTime");
defined("DATA_TYPE_SYSDATE")                        OR define("DATA_TYPE_SYSDATE", "Sysdate");

defined("DATA_TYPE_SELECT_LIST_KEY")                OR define("DATA_TYPE_SELECT_LIST_KEY", "Select List Key");
defined("DATA_TYPE_SELECT_LIST_VALUE")              OR define("DATA_TYPE_SELECT_LIST_VALUE", "Select List Value");
defined("DATA_TYPE_SELECT_MASTER")                  OR define("DATA_TYPE_SELECT_MASTER", "Select Master");
defined("DATA_TYPE_SELECT_MASTER_TREE")             OR define("DATA_TYPE_SELECT_MASTER_TREE", "Select Master Tree");
defined("DATA_TYPE_SELECT_MASTER_TREE_CHECKBOX")    OR define("DATA_TYPE_SELECT_MASTER_TREE_CHECKBOX", "Select Master Tree Checkbox");
defined("DATA_TYPE_SELECT_TAGS")                    OR define("DATA_TYPE_SELECT_TAGS", "Select Tags");
defined("DATA_TYPE_SELECT_TAGS_SINGLE")             OR define("DATA_TYPE_SELECT_TAGS_SINGLE", "Select Tags Single");

defined("DATA_TYPE_MULTISELECT")                    OR define("DATA_TYPE_MULTISELECT", "Multi Select");
defined("DATA_TYPE_MULTISELECT_MASTER")             OR define("DATA_TYPE_MULTISELECT_MASTER", "Multi Select Master");

defined("DATA_TYPE_ICON")                           OR define("DATA_TYPE_ICON", "List Icon");

// input Radio
defined("DATA_TYPE_RADIO_KEY")                      OR define("DATA_TYPE_RADIO_KEY", "Radio Key");
defined("DATA_TYPE_RADIO_VALUE")                    OR define("DATA_TYPE_RADIO_VALUE", "Radio Value");
defined("DATA_TYPE_RADIO_MASTER")                   OR define("DATA_TYPE_RADIO_MASTER", "Radio Master");
defined("DATA_TYPE_RADIO_KEY_HORIZONTAL")           OR define("DATA_TYPE_RADIO_KEY_HORIZONTAL", "Radio Key Horizontal");
defined("DATA_TYPE_RADIO_VALUE_HORIZONTAL")         OR define("DATA_TYPE_RADIO_VALUE_HORIZONTAL", "Radio Value Horizontal");

// input Checkbox
defined("DATA_TYPE_CHECKBOX")                       OR define("DATA_TYPE_CHECKBOX", "Checkbox");
defined("DATA_TYPE_CHECKBOX_KEY")                   OR define("DATA_TYPE_CHECKBOX_KEY", "Checkbox Key");
defined("DATA_TYPE_CHECKBOX_MASTER")                OR define("DATA_TYPE_CHECKBOX_MASTER", "Checkbox Master");

defined("DATA_TYPE_CUSTOM_CHECKBOX_MASTER")         OR define("DATA_TYPE_CUSTOM_CHECKBOX_MASTER", "Custom Checkbox Master");
defined("DATA_TYPE_CUSTOM_CHECKBOX_KEY")            OR define("DATA_TYPE_CUSTOM_CHECKBOX_KEY", "Custom Checkbox Key");
defined("DATA_TYPE_CUSTOM_CHECKBOX_VALUE")          OR define("DATA_TYPE_CUSTOM_CHECKBOX_VALUE", "Custom Checkbox Value");
defined("DATA_TYPE_CUSTOM_RADIO_MASTER")            OR define("DATA_TYPE_CUSTOM_RADIO_MASTER", "Custom Radio Master");
defined("DATA_TYPE_CUSTOM_RADIO_KEY")               OR define("DATA_TYPE_CUSTOM_RADIO_KEY", "Custom Radio Key");
defined("DATA_TYPE_CUSTOM_RADIO_VALUE")             OR define("DATA_TYPE_CUSTOM_RADIO_VALUE", "Custom Radio Value");

defined("DATA_TYPE_FILE")                           OR define("DATA_TYPE_FILE", "File");
defined("DATA_TYPE_FILE_ARCHIVE")                   OR define("DATA_TYPE_FILE_ARCHIVE", "File Archive");
defined("DATA_TYPE_FILE_IMAGE")                     OR define("DATA_TYPE_FILE_IMAGE", "File Image");
defined("DATA_TYPE_FILE_DOC")                       OR define("DATA_TYPE_FILE_DOC", "File Document");
defined("DATA_TYPE_FILE_VIDEO")                     OR define("DATA_TYPE_FILE_VIDEO", "File Video");
defined("DATA_TYPE_FILE_AUDIO")                     OR define("DATA_TYPE_FILE_AUDIO", "File Audio");

defined("DATA_TYPE_FILE_3D")                        OR define("DATA_TYPE_FILE_3D", "3D");
defined("DATA_TYPE_FILE_MULTIPLE")                  OR define("DATA_TYPE_FILE_MULTIPLE", "File Multiple");
defined("DATA_TYPE_FILE_ARCHIVE_MULTIPLE")          OR define("DATA_TYPE_FILE_ARCHIVE_MULTIPLE", "File Archive Multiple");
defined("DATA_TYPE_FILE_IMAGE_MULTIPLE")            OR define("DATA_TYPE_FILE_IMAGE_MULTIPLE", "File Image Multiple");
defined("DATA_TYPE_FILE_DOC_MULTIPLE")              OR define("DATA_TYPE_FILE_DOC_MULTIPLE", "File Document Multiple");
defined("DATA_TYPE_FILE_VIDEO_MULTIPLE")            OR define("DATA_TYPE_FILE_VIDEO_MULTIPLE", "File Video Multiple");
defined("DATA_TYPE_FILE_AUDIO_MULTIPLE")            OR define("DATA_TYPE_FILE_AUDIO_MULTIPLE", "File Audio Multiple");

defined("DATA_TYPE_FILE_LINK")                      OR define("DATA_TYPE_FILE_LINK", "File Link");

defined("DATA_TYPE_QUERY")                          OR define("DATA_TYPE_QUERY", "Query");

defined("DATA_MULTI_SEPARATOR")                     OR define("DATA_MULTI_SEPARATOR", ",");

// Form Validation
defined("VALIDATION_REQUIRED")                      OR define("VALIDATION_REQUIRED", "required");
defined("VALIDATION_UNIQUE")                        OR define("VALIDATION_UNIQUE", "unique");
defined("VALIDATION_IN_RANGE")                      OR define("VALIDATION_IN_RANGE", "in_range");

defined("BUTTON_TABLE_ADD")                         OR define("BUTTON_TABLE_ADD", "ADD");
defined("BUTTON_TABLE_CLEAR")                       OR define("BUTTON_TABLE_CLEAR", "CLEAR");
defined("BUTTON_TABLE_DELETE")                      OR define("BUTTON_TABLE_DELETE", "DELETE");
defined("BUTTON_TABLE_EXPORT")                      OR define("BUTTON_TABLE_EXPORT", "EXPORT");
defined("BUTTON_TABLE_IMPORT")                      OR define("BUTTON_TABLE_IMPORT", "IMPORT");
defined("BUTTON_TABLE_REFRESH")                     OR define("BUTTON_TABLE_REFRESH", "REFRESH");

defined("BUTTON_ACTION_VIEW_LINK")                  OR define("BUTTON_ACTION_VIEW_LINK", "ACTION_VIEW_LINK");
defined("BUTTON_ACTION_VIEW_POPUP")                 OR define("BUTTON_ACTION_VIEW_POPUP", "ACTION_VIEW_POPUP");
defined("BUTTON_ACTION_EDIT")                       OR define("BUTTON_ACTION_EDIT", "ACTION_EDIT");
defined("BUTTON_ACTION_DELETE")                     OR define("BUTTON_ACTION_DELETE", "ACTION_DELETE");

// File View
defined("FILE_VIEW_TABLE")                          OR define("FILE_VIEW_TABLE", 1);
defined("FILE_VIEW_FORM")                           OR define("FILE_VIEW_FORM", 2);
defined("FILE_VIEW_LIST")                           OR define("FILE_VIEW_LIST", 3);
defined("FILE_VIEW_DETAIL")                         OR define("FILE_VIEW_DETAIL", 4);
defined("FILE_VIEW_LIST_READONLY")                  OR define("FILE_VIEW_LIST_READONLY", 5);
defined("FILE_VIEW_HEADER")                         OR define("FILE_VIEW_HEADER", 6);

defined("IMAGE_DEFAULT")                            OR define("IMAGE_DEFAULT", "default.jpg");

defined("SEPARATOR_DECIMAL")                        OR define("SEPARATOR_DECIMAL", ",");
defined("SEPARATOR_THOUSANDS")                      OR define("SEPARATOR_THOUSANDS", ".");
defined("DECIMAL_LENGTH")                           OR define("DECIMAL_LENGTH", 2);
defined("PERMISSION_VIEW")                          OR define("PERMISSION_VIEW", "VIEW");
defined("PERMISSION_CREATE")                        OR define("PERMISSION_CREATE", "CREATE");
defined("PERMISSION_UPDATE")                        OR define("PERMISSION_UPDATE", "UPDATE");
defined("PERMISSION_DELETE")                        OR define("PERMISSION_DELETE", "DELETE");

defined("WORKFLOW_STATUS_DRAFT")                    OR define("WORKFLOW_STATUS_DRAFT", "DRAFT");
defined("WORKFLOW_STATUS_SUBMIT")                   OR define("WORKFLOW_STATUS_SUBMIT", "SUBMIT");
defined("WORKFLOW_STATUS_REVISION")                 OR define("WORKFLOW_STATUS_REVISION", "REVISION");
defined("WORKFLOW_STATUS_APPROVE")                  OR define("WORKFLOW_STATUS_APPROVE", "APPROVE");
defined("WORKFLOW_STATUS_REJECT")                   OR define("WORKFLOW_STATUS_REJECT", "REJECT");
defined("WORKFLOW_STATUS_APPROVED")                 OR define("WORKFLOW_STATUS_APPROVED", "APPROVED");

defined("CALENDAR_TYPE_DAILY")                      OR define("CALENDAR_TYPE_DAILY", "daily");
defined("CALENDAR_TYPE_WEEKLY")                     OR define("CALENDAR_TYPE_WEEKLY", "weekly");
defined("CALENDAR_TYPE_MONTHLY")                    OR define("CALENDAR_TYPE_MONTHLY", "absoluteMonthly");
defined("CALENDAR_TYPE_YEARLY")                     OR define("CALENDAR_TYPE_YEARLY", "absoluteYearly");

defined("DATE_MIN_MICROSOFT")                       OR define("DATE_MIN_MICROSOFT", "0001-01-01");
defined("DATE_MAX_MICROSOFT")                       OR define("DATE_MAX_MICROSOFT", "9999-12-31");

defined("WORKER_GET_USER_CALENDAR")                 OR define("WORKER_GET_USER_CALENDAR", "USER_CALENDAR");
defined("WORKER_GET_USER_PHOTO")                    OR define("WORKER_GET_USER_PHOTO", "USER_PHOTO");
defined("WORKER_NOTIFICATION_EMAIL")                OR define("WORKER_NOTIFICATION_EMAIL", "NOTIFICATION_EMAIL");
defined("WORKER_NOTIFICATION_WHATSAPPS")            OR define("WORKER_NOTIFICATION_WHATSAPPS", "NOTIFICATION_WHATSAPPS");
defined("WORKER_CLEAN_ASSET_STORAGE")               OR define("WORKER_CLEAN_ASSET_STORAGE", "CLEAN_STORAGE");
defined("WORKER_GENERATE_MAIN_ACCOUNT_FAMILY")      OR define("WORKER_GENERATE_MAIN_ACCOUNT_FAMILY", "MAIN_ACCOUNT_FAMILY");
defined("WORKER_GENERATE_ASSETS_PDF_QRCODE")        OR define("WORKER_GENERATE_ASSETS_PDF_QRCODE", "PDF_ASSETS_QRCODE");


defined("IMPORT_TYPE_CONSOLIDATION")                OR define("IMPORT_TYPE_CONSOLIDATION", "Consolidation");
defined("IMPORT_TYPE_ASSET_QUADRAN")                OR define("IMPORT_TYPE_ASSET_QUADRAN", "Asset Quadran");

defined("DEVICE_MOBILE")                            OR define("DEVICE_MOBILE", "MOBILE");
defined("DEVICE_WEB")                               OR define("DEVICE_WEB", "WEB");


defined("CODE_BARCODE")                             OR define("CODE_BARCODE", "BARCODE");
defined("CODE_QRCODE")                              OR define("CODE_QRCODE", "QRCODE");

defined("JOB_STATUS_QUEUE")                         OR define("JOB_STATUS_QUEUE", 0);
defined("JOB_STATUS_PROCESS")                       OR define("JOB_STATUS_PROCESS", 1);
defined("JOB_STATUS_SUCCESS")                       OR define("JOB_STATUS_SUCCESS", 2);
defined("JOB_STATUS_ERROR")                         OR define("JOB_STATUS_ERROR", 9);

defined("INTEGRATION_TYPE_LOCAL_DB")                OR define("INTEGRATION_TYPE_LOCAL_DB", "LOCAL");
defined("INTEGRATION_TYPE_LOCAL_GENERATOR")         OR define("INTEGRATION_TYPE_LOCAL_GENERATOR", "GENERATOR");
defined("INTEGRATION_TYPE_MICROSOFT365")            OR define("INTEGRATION_TYPE_MICROSOFT365", "365");
defined("INTEGRATION_TYPE_REMOTE_DATABASE")         OR define("INTEGRATION_TYPE_REMOTE_DATABASE", "DATABASE");
defined("INTEGRATION_TYPE_API")                     OR define("INTEGRATION_TYPE_API", "API");

defined("SCHEDULE_EVERY_MINUTE")                    OR define("SCHEDULE_EVERY_MINUTE", "MINUTE");
defined("SCHEDULE_EVERY_HOUR")                      OR define("SCHEDULE_EVERY_HOUR", "HOUR");
defined("SCHEDULE_EVERY_DAY")                       OR define("SCHEDULE_EVERY_DAY", "DAY");
defined("SCHEDULE_EVERY_MONTH")                     OR define("SCHEDULE_EVERY_MONTH", "MONTH");
defined("SCHEDULE_EVERY_YEAR")                      OR define("SCHEDULE_EVERY_YEAR", "YEAR");