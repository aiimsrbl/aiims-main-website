<?php

defined('SUPER_ADMIN_ROLE_ID') or define('SUPER_ADMIN_ROLE_ID',1);
defined('SUPER_ADMIN_ID') or define('SUPER_ADMIN_ID',1);
defined('SUCCESS') or define('SUCCESS',200);
defined('BAD_REQUEST') or define('BAD_REQUEST',400);
defined('ADD_REC_MSG') or define('ADD_REC_MSG','Record has been created successfully');
defined('DEL_REC_MSG') or define('DEL_REC_MSG','Record has been deleted successfully');
defined('UPDATE_REC_MSG') or define('UPDATE_REC_MSG','Record has been updated successfully');
defined('INVALID_ERR_MSG') or define('INVALID_ERR_MSG','Please fill correct data');
defined('SERVER_ERROR_MSG') or define('SERVER_ERROR_MSG','Unexpected error occurred while trying to process your request. Please report to admin');

defined('DATA_NOT_FOUND') or define('DATA_NOT_FOUND','Data Not Found');
defined('RECORD_PER_PAGE') or define('RECORD_PER_PAGE',10);
defined('MAX_FILE_SIZE') or define('MAX_FILE_SIZE',50); // MB
defined('MAX_IMAGE_SIZE') or define('MAX_IMAGE_SIZE',10); // MB

// tender will move to archived after [N] days of end date
defined('TENDER_EXPIRY_DAYS') or define('TENDER_EXPIRY_DAYS',5);
defined('FROM_EMAIL') or define('FROM_EMAIL','aiimsrblprogrammer@gmail.com');

?>