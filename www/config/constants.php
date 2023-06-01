<?php

define('PARTIALS_PATH', 'Views/Partials/');
define('PARTIALS_EXT', '.partial.php');

define('HTTP_BAD_REQUEST', 400);
define('HTTP_UNAUTHORIZED', 401);
define('HTTP_FORBIDDEN', 403);
define('HTTP_NOT_FOUND', 404);
define('HTTP_METHOD_NOT_ALLOWED', 405);
define('HTTP_INTERNAL_SERVER_ERROR', 500);

include('sql_config.php');