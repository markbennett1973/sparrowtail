<?php defined('C5_EXECUTE') or die("Access Denied."); ?>

</div>

<?php View::element('footer_required'); ?>

<script type="application/javascript">
    $(function() {
        $('.selector select').change(function() {
            window.location.href = $(this).val();
        })
    });
</script>

</body>
</html>
