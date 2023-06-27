<?php

require 'includes/functions.php';
require 'config/config.php';
require 'Generators/ModelGenerator.php';

use App\Generators\ModelGenerator;

if (isset($argv[1])) {
    $tableName = $argv[1];
    $generator = new ModelGenerator($tableName);
    $generator->generateModel();
} else {
    echo "Veuillez spécifier le nom de la table.\n";
}