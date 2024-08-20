<?
    $preprocess = function (TargetPreprocessContext $c) {
        $c->activate_template('template-generic');
        $c->activate_module('nav-build');

        $c->activate_module('title');
        $c->run_macro('title', 'set', 'fullcalendar (with bootstrap)');
        
        $c->activate_module('bootstrap', [
            'import_standalone_css' => true,
        ]);
        $c->activate_module('fullcalendar');
    };
?>

<? $process = function (Target $target) { ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('the-calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        themeSystem: 'bootstrap5',
    });
    calendar.render();
});      
</script>

<div style="width:800px; margin: auto; margin-top:30px;">
    <div id="the-calendar"></div>
</div>

<? }; ?>