<?php

$commands = [
    'cache:clear',
    'doctrine:database:drop --force',
    'doctrine:database:create',
    'doctrine:schema:create',
//    'doctrine:migrations:migrate -n',
    'doctrine:cache:clear-metadata',
    'doctrine:fixtures:load --no-interaction -n',
];

foreach ($commands as $command) {
    passthru('php "bin/console" '.$command.' --env=test');
}
