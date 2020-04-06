<?php
include 'config.php';
    $id = $_GET["id"];
    $delqury="DELETE FROM shootrec WHERE ID = '$id'";
    $delRec = $db->query($delqury);
?>
<script type='text/javascript'>
    self.close();
</script>