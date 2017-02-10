<?php

namespace Deployer;

set('bin/typo3cms', function() {
    // TODO check if the executable exists
    $releasePath = get('release_path');

    $executablePath = "$releasePath/vendor/bin/typo3cms";

    return $executablePath;
});

task('cache:flush', function() {
    $typo3Cms = get('bin/typo3cms');
    $options = get('cache:flush:options');

    $command = $typo3Cms . ' cache:flush';

    foreach ($options as $option) {
        $command .= " --$option";
    }

    writeln(run($command));
})->desc('Direct wrapper for cache:flush. Supply options with set("cache:flush:options", array([option [, ...]])")');

task('cache:flushgroups', function() {
    $typo3Cms = get('bin/typo3cms');
    $options = get('cache:flushgroups:options');

    $command = $typo3Cms;

    foreach ($options as $option) {
        $command .= " --$option";
    }

    writeln(run($command));
})->desc('Direct wrapper for cache:flushgroups. Supply options with cache:flushgroups:options');
