<?php 
   defined("BASE_PATH")? null : define("BASE_PATH",DIRECTORY_SEPARATOR);
   defined("INDEX_ROOT")? null : define("INDEX_ROOT",getcwd());
   defined("CURRENT_FOLDER")? null : define("CURRENT_FOLDER",basename(__DIR__));
   defined("SITE_ROOT")? null : define("SITE_ROOT",CURRENT_FOLDER."\Assets");
   defined("ADMIN_ROOT")? null : define("ADMIN_ROOT",CURRENT_FOLDER."\Views\Admin");
   defined("PROJECT_NAME")?null : define("PROJECT_NAME","LearnHub");

