<?php

require_once 'profile/userData.php';
require_once 'core/Request.php';
require_once 'core/Response.php';
require_once 'core/Router.php';
require_once 'core/BaseController.php';
require_once 'core/Application.php';
require_once 'repositories/ArticleRepository.php';
require_once 'repositories/AdminRootProfile.php';
require_once 'controllers/IndexController.php';
require_once 'controllers/HelloWorldController.php';
require_once 'controllers/AdminController.php';

include_once 'config/routes.php';
include_once 'config/database.php';

(new Application($database, $routes))->run();
