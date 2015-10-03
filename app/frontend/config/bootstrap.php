<?php

$listener = new \omnilight\events\Listener(
    new \omnilight\events\PatternEventsProvider(),
    new \omnilight\events\PrefixMethodFinder()
);