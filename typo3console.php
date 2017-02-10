<?php

namespace Deployer;

set('bin/typo3cms', function() {
    $executablePath = '{{release_path}}/vendor/bin/typo3cms';

    if (file_exists($executablePath) && is_executable($executablePath)) {
        return $executablePath;
    } else {
        throw new \RuntimeException('Could not find typo3cms executable. Specify manually with set("bin/typo3cms", [path]);');
    }
});

task('cache:flush', function() {
    $typo3Cms = get('bin/typo3cms');
    $options = get('cache:flush:options');

    $command = $typo3Cms;

    foreach ($options as $option) {
        $command .= " --$option";
    }

    run($command);
})->desc('Direct wrapper for cache:flush. Supply options with set("cache:flush:options", array([option [, ...]])")');

task('cache:flushgroups', function() {
    $typo3Cms = get('bin/typo3cms');
    $options = get('cache:flushgroups:options');

    $command = $typo3Cms;

    foreach ($options as $option) {
        $command .= " --$option";
    }

    run($command);
})->desc('Direct wrapper for cache:flushgroups. Supply options with cache:flushgroups:options');
