<?
    $preprocess = function (TargetPreprocessContext $c) {
        $c->activate_template('template-interbook');
        $c->activate_module('nav-build');

        $c->activate_module('mathjax-extensions');
    };
?>

<? $process = function (Target $target) { ?>


<p>
    Just a demo:
</p>
\begin{tightarray}[1cm]{lcr}
  row1col1 & row1col2 & row1col3 \\
  row2col1 & row2col2 & row2col3
\end{tightarray}
<p>
    Another demo:
</p>
\begin{tightarray}{ll}
&~~~~~~~~~ 3+ 2 \cdot 42 + 2^{5}\\
&~=~ 3\\
&
  \begin{alignedat}[t]{3}
    &~=~(3\,+\,&(2 \cdot 42)) &+ (2^{5})\\
    &~=~(3\,+\,&84~~~~)           &+ ~32\\
    &~=~&87~~~~~~~~~          &+~32\\
    &~=~&119&             
  \end{alignedat}\\
\end{tightarray}


<? }; ?>