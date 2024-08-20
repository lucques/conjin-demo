<?
    $preprocess = function (TargetPreprocessContext $c) {
        $c->activate_template('template-bootstrapped');
        
        $c->activate_module('nav-build');
    };
?>

<? $process = function (Target $target) { ?>

<? css_start(); ?>
.bordered {
    border: 1px solid black;
}
<? css_end(); ?>


<div class="container bordered">

<? load_def_from_script_and_call(__DIR__ . '/../../lorem_ipsum.php', 'basic'); ?>
<? load_def_from_script_and_call(__DIR__ . '/../../lorem_ipsum.php', 'acc'); ?>

</div>


<? }; ?>