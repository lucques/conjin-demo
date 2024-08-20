<?
    $preprocess = function (TargetPreprocessContext $c) {
        $c->activate_template('template-interbook');
        $c->activate_module('nav-build');

        $c->activate_module('title');
        $c->run_macro('title', 'set', 'sync-dims (with mathjax)');

        $c->activate_module('sync-dims');
        $c->activate_module('mathjax-extensions');

    };
?>

<? $process = function (Target $target) { ?>

<p>
    Sync the <strong>heights</strong> of the <strong>1st</strong> and <strong>3rd</strong> <code>p</code> inside of the accordions.
</p>
<div class="d-grid" style="grid-template-columns: 1fr 1fr 1fr;">
    <? acc_single_item_start('Links'); ?>
    <p data-sync-height-id="the-p">
        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
    </p>
    <? acc_single_item_end(); ?>
    <? acc_single_item_start('Midde'); ?>
    <p data-sync-height-id="the-p2">
        Hallohallo
    </p>
    <? acc_single_item_end(); ?>
    <? acc_single_item_start('Rechts'); ?>
    <p data-sync-height-id="the-p">
        Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
    </p>
    <? acc_single_item_end(); ?>
</div>

<p>
    Sync the <strong>widths</strong> of the <strong>1st</strong> and <strong>3rd</strong> <code>p</code> inside of the accordions.
</p>
<div class="d-flex column-gap-5">
    <p data-sync-width-id="the-p">
        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
    </p>
    <p data-sync-width-id="the-p2">
        Hallohallo
    </p>
    <p data-sync-width-id="the-p">
        Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
</div>


<? html_h(2, 'Mathjax: Reloading'); ?>
<p>
    Just an example of how things could be made to work.
</p>
<div class="row p">
    <div class="col-6">
            <p data-sync-height-id="motivation-4">
                Dann übersetzen wir den Satz in eine <dfn>Gleichung mit Unbekannter</dfn>.
            </p>
            <div data-sync-height-id="motivation-5">
                $$
                    \frac{1}{4} \cdot x = 15~<?= mathjax_unic('€') ?>
                $$
            </div>
            <p data-sync-height-id="motivation-6">
                Blabla
            </p>
    </div>


    <script>
        function aufdecken() {

            const code = String.raw`\begin{tightarray}{lrll}
                        I.  ~~& x + y &~=~ 34 \qquad \text{(1. Satz)}\\
                        I.  ~~& x + y &~=~ 34 \qquad \text{(1. Satz)}\\
                        I.  ~~& x + y &~=~ 34 \qquad \text{(1. Satz)}\\
                        I.  ~~& x + y &~=~ 34 \qquad \text{(1. Satz)}\\
                    \end{tightarray}`;

            document.getElementById('anfangs-unsichtbar').innerHTML = code;
            MathJax.typeset();
            syncHeights();
        }
    </script>

    <div class="col-6">

            <p data-sync-height-id="motivation-4">
                Dann übersetzen wir Satz für Satz in Gleichungen, zusammen genommen <dfn>Gleichungsssystem</dfn> genannt.
                <button type="button" onclick="aufdecken();">Mathjax Aufdecken</button>
            </p>
            <div data-sync-height-id="motivation-5">
                <div id="anfangs-unsichtbar">
                    
                </div>
            </div>
            <p data-sync-height-id="motivation-6">
                Blabla
            </p>
    </div>
</div>

<? }; ?>