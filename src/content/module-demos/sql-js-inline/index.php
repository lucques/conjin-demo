<?
    $preprocess = function (TargetPreprocessContext $c) {
        $c->activate_template('template-interbook');
        $c->activate_module('nav-build');

        $c->activate_module('sql-js-inline');

        $c->activate_module('source', [
            'language'     => 'sql',
            'line_numbers' => false,
        ]);
    };
?>

<? $process = function(Target $target) { ?>

<? css_start(); ?>
    #content main {
        min-width:1000px;
    }
<? css_end(); ?>

<? $db_id_eisdiele = sql_js_inline_init_db_var(__DIR__ . '/res/eisdiele.sql'); ?>

<p>
    Betrachte die folgende Eisdielen-Datenbank, welche eine Tabelle mit Eisbehältern und eine Tabelle mit Eissorten enthält.
</p>
<div class="d-flex gap-3">
    <? sql_js_inline_exec_and_print($db_id_eisdiele, 'SELECT * FROM behaelter', title: '<strong><em>behaelter</em></strong>'); ?>
    <? sql_js_inline_exec_and_print($db_id_eisdiele, 'SELECT * FROM sorte', title: '<strong><em>sorte</em></strong>'); ?>
</div>

<p>
    Indem mehrere Tabellen in der <code>FROM</code>-Klausel notiert werden, werden diese zeilenweise kombiniert: Es wird das sogenannte <dfn>kartesische Produkt</dfn> gebildet.
</p>

<?
    $sql = 'SELECT * FROM behaelter, sorte';
?>
<div class="clearfix">
    <div class="float-end">
        <? sql_js_inline_exec_and_print($db_id_eisdiele, $sql); ?>
    </div>
    <? source_start(); echo $sql; source_end(); ?>
</div>


<p>
    Manchmal erhalten durch Bildungs des kartesischen Produkts zwei Spalten denselben Namen. Wir können sie unterscheiden (Fachbegriff: „disambiguieren“), indem wir mit <code>ursprungstabelle.spalte</code> angeben, aus welcher Tabelle die Spalte stammt. Die folgende Abfrage liefert bspw. alle Kombinationen aus Behältern und Sorten, die in einer Waffel serviert werden.
</p>
<? ob_start(); ?>
SELECT behaelter.name,
       sorte.name
FROM   behaelter, sorte
WHERE  behaelter.name LIKE '%waffel'
<? $sql = ob_get_clean(); ?>
<div class="clearfix">
    <div class="float-end">
        <? sql_js_inline_exec_and_print($db_id_eisdiele, $sql); ?>
    </div>
    <? source_start(); echo $sql; source_end(); ?>
</div>
<p>
    Beachte, dass wir dann auch die Spalten noch umbennen können. Die gleiche Anfrage, aber mit umbenannten Spalten, lautet wie folgt.
</p>
<? ob_start(); ?>
SELECT behaelter.name AS verpackung,
       sorte.name     AS kugel
FROM   behaelter, sorte
WHERE  verpackung LIKE '%waffel'
<? $sql = ob_get_clean(); ?>
<div class="clearfix">
    <div class="float-end">
        <? sql_js_inline_exec_and_print($db_id_eisdiele, $sql); ?>
    </div>
    <? source_start(); echo $sql; source_end(); ?>
</div>


<? }; ?>