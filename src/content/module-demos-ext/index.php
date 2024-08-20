<?
    $preprocess = function (TargetPreprocessContext $c) {
        $c->activate_template('template-interbook');
        $c->activate_module('nav-build');

        $c->activate_module('title');
        $c->run_macro('title', 'set', 'Modules (external)');

        $c->add_subpage('bootstrap');
        $c->add_subpage('bootstrap-icons');
        $c->add_subpage('fullcalendar');
        $c->add_subpage('fullcalendar-bootstrap');
        $c->add_subpage('mathjax');
        $c->add_subpage('sql-js');
    };
?>

<? $process = function (Target $target) { ?>

<p>
    Demos fo various modules
</p>

<? }; ?>