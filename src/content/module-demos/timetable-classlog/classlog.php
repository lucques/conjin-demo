<?
    $classlog = function() {
        classlog_start();
        classlog_long('2023-09-04', 'Erste Unterrichtsstunde');
?>
<? classlog_img('unterricht.png'); ?>
<ul>
    <li>Einstiegstest-7.pdf</li>
    <li>Einstiegstest-7-loesung.pdf</li>
    <li>Besprechung</li>
    <li><? classlog_a_file('unterricht.png'); ?></li>
</ul>
<?
        classlog_long('2023-09-11', 'Wiederholung Größen, Einheiten und Brüche');
?>
<ul>
    <li>
        Brüche: Erweitern, Kürzen, Gleichnamig machen, Addieren, Subtrahieren, Multiplizieren
    </li>
</ul>
<?
        classlog_long('2023-09-12', 'Brüche dividieren');
?>
<? classlog_daily_exercise(); ?>
<ul>
    <li>
        Terme aufstellen
    </li>
    <li>
        Brüche: Dividieren und Wiederholung
    </li>
</ul>
<?
        classlog_short('2023-10-17', 'Nur ein Test eines short-logs');

        return classlog_end_get();
    }
?>