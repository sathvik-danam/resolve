<?php

define('APP_START', microtime(true));

(defined('APP_START') && !is_float(APP_START)) and $errors['APP_START'] = APP_START;
