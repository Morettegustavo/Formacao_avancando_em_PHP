<?php

return [

    "target_php_version" => null,

    'directory_list' => [
        'src',
        'vendor/symfony/console',
        'vendor/guzzlehttp/guzzle',
        'vendor/psr/http-message'
    ],

    "exclude_analysis_directory_list" => [
        'vendor/'
    ],

    'plugins' => [
        'AlwaysReturnPlugin',
        'DollarDollarPlugin',
        'DuplicateArrayKeyPlugin',
        'DuplicateExpressionPlugin',
        'PregRegexCheckerPlugin',
        'PrintfCheckerPlugin',
        'SleepCheckerPlugin',
        'UnreachableCodePlugin',
        'UseReturnValuePlugin',
        'EmptyStatementListPlugin',
        'LoopVariableReusePlugin',
    ],
];