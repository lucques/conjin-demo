<?
    $preprocess = function (TargetPreprocessContext $c) {
        $c->activate_template('template-navigable');
    };
?>

<? $process = function (Target $target) { ?>

<? load_def_from_script_and_call(__DIR__ . '/../../lorem_ipsum.php', 'basic'); ?>

<? }; ?>