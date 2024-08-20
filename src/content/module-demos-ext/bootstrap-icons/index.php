<?
    $preprocess = function (TargetPreprocessContext $c) {
        $c->activate_template('template-generic');
        $c->activate_module('nav-build');


        $c->activate_module('bootstrap', [
            'import_standalone_css' => true,
        ]);
        $c->activate_module('bootstrap-icons');
    };
?>

<? $process = function (Target $target) { ?>

<div class="container">
    <h1>Icons can be inserted like this: <span class="bi bi-alarm"></span></h1>
</div>

<? }; ?>