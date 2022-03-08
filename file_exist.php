<?php
$path = $_REQUEST['path'];
http_response_code(file_exists($path) ? 200 : 404);