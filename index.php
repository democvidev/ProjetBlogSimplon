<?php
ob_start();

require 'home.php';
$content = ob_get_clean();

require 'base.php';