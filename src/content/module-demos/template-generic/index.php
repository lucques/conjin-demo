<?
    $preprocess = function (TargetPreprocessContext $c) {
        $c->activate_template('template-generic');

        $c->activate_module('nav-build');
        $c->activate_module('title');

        $c->activate_module('title');    
        $c->run_macro('title', 'set', 'template-generic');
    };
?>

<? $process = function (Target $target) { ?>

<? load_def_from_script_and_call(__DIR__ . '/../../lorem_ipsum.php', 'basic'); ?>

<? }; ?>