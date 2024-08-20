<?
    $preprocess = function (TargetPreprocessContext $c) {
        $c->activate_template('template-interbook');
        $c->activate_module('nav-build');

        $c->activate_module('title');    
        $c->run_macro('title', 'set', 'source');
        
        $c->activate_module('source', [
            // 'language' => 'java',
            'line_numbers' => false
        ]);
    };
?>

<? $process = function (Target $target) { ?>

<? html_h(2, 'Inline im Text'); ?>
<p>
    Hier kommt etwas inline <code>SELECT * FROM lalala</code> und hier wieder normaler Text. Hier noch etwas HTML: <? source_inline('<strong>stark</strong>', language: 'html'); ?>
</p>

<? html_h(2, 'source_scope'); ?>
<p>
    Change now the language to java.
</p>
<? source_scope_start(language: 'java'); ?>
<p>
    Hier etwas Java: <code>public static void meineMethode</code> und das war's auch schon.
</p>
<? source_scope_end(); ?>

<p>
    Change now the language to css.
</p>
<? source_scope_start(language: 'css'); ?>
<p>
    Hier etwas CSS: <code>p {color:red;}</code> und das wars.
</p>
<? source_scope_end(); ?>


<? html_h(2, 'source_start und source_end'); ?>

Java:
<? source_start(language: 'java'); ?>
SELECT * FROM boote
WHERE laenge > 100
<? source_end(); ?>

HTML
<? source_start(language: 'html', line_numbers: true); ?>
<h1>Ein Titel</h1>
<p>Ein Absatz</p>
<? source_end(); ?>

<? html_h(2, 'source_file'); ?>

HelloWorld.java
<? source_file(__DIR__ . '/res/HelloWorld.java', language: 'java', line_numbers: true); ?>

index.html
<? source_file(__DIR__ . '/res/index.html', language: 'html', line_numbers: true); ?>


<? html_h(2, 'source_file_block'); ?>

Akzeptor.java
<? source_file_block(__DIR__ . '/res/Akzeptor.java', 'static boolean testWortFuerL3(String wort)', '}', language: 'java'); ?>
index.html
<? source_file_block(__DIR__ . '/res/index.html', '<p>', '</p>', skip: 2, language: 'html'); ?>

<head>

<? }; ?>