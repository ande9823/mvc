<?php
    /**
     * This is an example of a generic table
     * which will print the content of the viewbag
     * without knowing what content to expect
     */
?>
<?php 
/*
$json_test = json_encode($viewbag['images'], JSON_PRETTY_PRINT);
echo $json_test;
//echo json_decode($json_test);
*/
?>

<h1>Feed of images</h1>
<table>
    <thead>
        <tr>
        <?php foreach($viewbag['images'][0] as $header => $value) : ?>
        
            <th><?=$header?></th>
        
        <?php endforeach; ?>
        </tr>
    </thead>
    
    <?php foreach ($viewbag['images'] as $result) : ?>
    
        <tr>
            <?php foreach ($result as $index => $value) : 
            if($index == "image") : 
            $value = base64_decode($value);
            ?>
                <td><?=$value?></td>
            <?php else : ?>
                <td><?=$value?></td>
            <?php endif;
            endforeach; ?>
        </tr>
    
    <?php endforeach; ?>
</table>