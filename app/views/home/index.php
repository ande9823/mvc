<h1>Home Controller Index Method</h1>

<?php
    /**
     * Anything included in the $viewbag, passed from the controller
     * is available here.
     */
?>

<h3>The button will use an ajax call to chage the following p-tag when clicked.</h3>
<p id="ajaxContent">This text will change</p>
<button id="ajaxBtn">Get random Number</button>

<br/><br/><br/>
<p>First parameter accessed directly: <?=$viewbag['passed'][0] ?? '' ?> </p>
<p>Passed parameters looped:
    <?php foreach ($viewbag['passed'] as $param) : ?>
        <?=$param ?? '' ?> 
    <?php endforeach;
    /**
     * Notice that a maximum of 2 parameters are printed out,
     * because the home/index method only works with 2 parameters.
     * All remaining parameters are ignored.
     */
    ?>
</p>

<pre>
    <?php 
    print_r($viewbag);
    ?>
</pre>

<img src="/public/assets/fish.jpg" alt="it's a fish"/>