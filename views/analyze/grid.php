<?php
require 'blocks/Analyze/Grid.php';
$gridClass = new \blocks\Analyze\Grid();
$grid = $gridClass->getGridData();
?>
<?php if($grid !== false){ ?>
<table class="table">
    <thead>
    <tr>
        <th>Character</th>
        <th>No of Occurrence</th>
        <th>Character Info</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($grid as $item) { ?>
    <tr>
        <td><?php echo $item['column1'];?></td>
        <td><?php echo $item['column2'];?></td>
        <td><?php echo $item['column3'];?></td>
    </tr>
    <?php } ?>
    </tbody>
</table>
<?php } ?>