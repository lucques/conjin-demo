<?
    $preprocess = function (TargetPreprocessContext $c) {
        $c->activate_template('template-interbook');
        $c->activate_module('nav-build');

        $c->activate_module('title');
        $c->run_macro('title', 'set', 'db');

        // Deactivated for now
        // $c->activate_module('db');
    };
?>

<? $process = function (Target $target) { ?>

<p>
    How to use a db. Live result from DB:
</p>
<p>
    (currently deactivated)
</p>

<?
    //print_sql_result('eisdiele', 'SELECT * FROM sorte');
?>

<? }; ?>