#!/usr/bin/env php
<?php

function ask(string $question, string $default = ''): string
{
    $answer = readline("{$question} ({$default}): ");
    return $answer !== '' ? $answer : $default;
}

function confirm(string $question, bool $default = false): bool
{
    $defaultText = $default ? 'Y/n' : 'y/N';
    $answer = strtolower(readline("{$question} ({$defaultText}): "));
    if ($answer === '') {
        return $default;
    }
    return in_array($answer, ['y', 'yes']);
}

function replace_in_file(string $file, array $replacements): void
{
    $contents = file_get_contents($file);
    $contents = str_replace(array_keys($replacements), array_values($replacements), $contents);
    file_put_contents($file, $contents);
}

function recursively_copy(string $source, string $destination): void
{
    foreach (scandir($source) as $item) {
        if ($item === '.' || $item === '..') continue;
        $src = "{$source}/{$item}";
        $dest = "{$destination}/{$item}";
        if (is_dir($src)) {
            if (!file_exists($dest)) mkdir($dest, 0777, true);
            recursively_copy($src, $dest);
        } else {
            copy($src, $dest);
        }
    }
}

function title_case(string $value): string
{
    return str_replace(' ', '', ucwords(str_replace(['-', '_'], ' ', $value)));
}

function snake_case(string $value): string
{
    return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $value));
}

// --- Step 1: Ask for details ---
$authorName = ask('Author name', 'Mahmoud Mosaad');
$authorEmail = ask('Author email', 'mahmoud@example.com');
$vendorName = ask('Vendor name (e.g. MahmoudMosaad)', 'MahmoudMosaad');
$packageName = ask('Package name (e.g. powerkit)', 'powerkit');
$packageDescription = ask('Package description', 'A Laravel package providing shared utilities and core features.');
$namespace = title_case($vendorName) . '\\' . title_case($packageName);

// --- Step 2: Define replacements ---
$replacements = [
    ':author_name' => $authorName,
    ':author_email' => $authorEmail,
    ':vendor_name' => $vendorName,
    ':package_name' => $packageName,
    ':namespace' => $namespace,
    'Skeleton' => title_case($packageName),
    'skeleton' => $packageName,
];

// --- Step 3: Replace placeholders ---
$files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(__DIR__));
foreach ($files as $file) {
    if ($file->isDir()) continue;
    if (in_array($file->getExtension(), ['php', 'json', 'md', 'yaml', 'yml'])) {
        replace_in_file($file->getPathname(), $replacements);
    }
}

// --- Step 4: Rename config, service provider, etc. ---
@rename(__DIR__ . '/config/skeleton.php', __DIR__ . "/config/{$packageName}.php");
@rename(__DIR__ . '/src/SkeletonServiceProvider.php', __DIR__ . "/src/" . title_case($packageName) . "ServiceProvider.php");

// --- Step 5: Summary ---
echo "\n✅ Package configured successfully!\n";
echo "Namespace: {$namespace}\n";
echo "Vendor: {$vendorName}\n";
echo "Package: {$packageName}\n";
echo "\nYou can now remove this file safely (configure.php).\n";

if (confirm('Delete configure.php now?', true)) {
    unlink(__FILE__);
    echo "🗑️ configure.php deleted.\n";
}
