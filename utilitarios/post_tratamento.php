<?
if($variavel == 1) {
    if ($erro) { ?>
        <script>
            Swal.fire({
                title: "Ops!",
                text: "<?= $erro[0] ?>",
                type: "error"
            });
        </script>
    <? } else { ?>
        <script>
            Swal.fire({
                title: "<?= $swal_titulo ?>",
                text: "<?= $swal_msg ?>",
                type: "success"
             });
        </script>
    <?
    }
}
?>