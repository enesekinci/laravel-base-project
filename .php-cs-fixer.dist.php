<?php

declare(strict_types=1);

use PhpCsFixer\Config;
use PhpCsFixer\Finder;
use PhpCsFixer\Runner\Parallel\ParallelConfigFactory;

$finder = (new Finder())
    ->in([
        __DIR__ . '/app',
        __DIR__ . '/bootstrap',
        __DIR__ . '/config',
        __DIR__ . '/database',
        __DIR__ . '/routes',
        __DIR__ . '/tests',
    ])
    ->exclude([
        'storage',
        'vendor',
        'node_modules',
        'bootstrap/cache',
    ]);

return (new Config())
    ->setParallelConfig(ParallelConfigFactory::detect()) // @TODO 4.0 no need to call this manually
    ->setRiskyAllowed(true)
    ->setRules([
        '@auto'          => true,
        '@auto:risky'    => true,
        '@Symfony'       => true,
        '@Symfony:risky' => true,

        // 🔒 strict types
        'declare_strict_types' => true,
        'strict_param'         => true,

        // Laravel için mantıklı, temiz yazım kuralları
        'array_syntax'         => ['syntax' => 'short'],
        'binary_operator_spaces' => ['default' => 'align_single_space_minimal'],
        'not_operator_with_successor_space' => true,
    ])
    ->setFinder($finder);

