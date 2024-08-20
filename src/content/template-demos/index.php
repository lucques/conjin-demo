<?
    $preprocess = function (TargetPreprocessContext $c) {
        $c->activate_template('template-interbook');

        $c->activate_module('title');
        $c->run_macro('title', 'set', 'Templates');

        $c->activate_module('nav-build');

        $c->add_subpage('template-generic');
        $c->add_subpage('template-bootstrapped');
        $c->add_subpage('template-navigable');
        $c->add_subpage('template-interbook');
        $c->add_subpage('2024-08-18.template-exam');
    };
?>

<? $process = function (Target $target) { ?>

<p>
    Demos of various templates
</p>

<? }; ?>