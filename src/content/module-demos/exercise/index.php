<?
    $preprocess = function (TargetPreprocessContext $c) {
        $c->activate_template('template-interbook');
        $c->activate_module('nav-build');

        $c->activate_module('exercise');
    };
?>

<? $process = function (Target $target) { ?>

<? ex_start('Der Leuchtturm'); ?>
<p>
    <strong>Bestimme</strong> die Höhe des Leuchtturms.
</p>
<? ex_item('Some info on the way'); ?>
<p>
    Here it is.
</p>
<? ex_hint(); ?>
<p>
    Ein wichtiger Tipp hier!
</p>
<? ex_sol(); ?>
<p>
    Die Lösung!
</p>

<? ex_end(); ?>


<? }; ?>