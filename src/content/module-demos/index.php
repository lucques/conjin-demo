<?
    $preprocess = function (TargetPreprocessContext $c) {
        $c->activate_template('template-interbook');
        $c->activate_module('nav-build');

        $c->activate_module('title');
        $c->run_macro('title', 'set', 'Modules');

        $c->add_subpage('db');
        $c->add_subpage('doc-extensions');
        $c->add_subpage('exercise');
        $c->add_subpage('footnotes');
        $c->add_subpage('html');
        $c->add_subpage('math-arith');
        $c->add_subpage('math-logic');
        $c->add_subpage('mathjax-extensions');
        $c->add_subpage('nav');
        $c->add_subpage('print-mode');
        $c->add_subpage('print-mode-mathjax');
        $c->add_subpage('print-sol-mode');
        $c->add_subpage('references');
        $c->add_subpage('sol-mode');
        $c->add_subpage('sol-mode-restricted');
        $c->add_subpage('source');
        $c->add_subpage('sql-js-inline');
        $c->add_subpage('sync-heights-widths');
        $c->add_subpage('timetable-calendar');
        $c->add_subpage('timetable-classlog');
        $c->add_subpage('timetable-syllabus');
        $c->add_subpage('variants');
    };
?>

<? $process = function (Target $target) { ?>

<p>
    Demos fo various modules
</p>

<? }; ?>