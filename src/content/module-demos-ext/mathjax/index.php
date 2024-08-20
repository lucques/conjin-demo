<?
    $preprocess = function (TargetPreprocessContext $c) {
        $c->activate_template('template-generic');
        $c->activate_module('nav-build');
        
        $c->activate_module('mathjax');
    };
?>

<? $process = function (Target $target) { ?>

$$
x + 3 = \frac{5}{3}
$$

<? }; ?>