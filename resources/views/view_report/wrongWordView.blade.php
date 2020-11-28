<?php foreach ($query as $value) { ?>
<li>
    <div class="md-list-content">
        <span class="md-list-heading"><span style="color:red">Typed Word: <?php echo $value->typedWord; ?></span>&nbsp;&nbsp;&nbsp;<span style="color:green">Original Word: <?php echo $value->databaseWord; ?></span></span>
    </div>
</li>

<?php } ?>