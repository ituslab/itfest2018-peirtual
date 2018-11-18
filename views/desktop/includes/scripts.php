<script type="text/javascript">var host = '<?= baseurl() ?>'</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="<?= baseurl() ?>/assets/js/main.js" charset="utf-8"></script>
<?php use Package\App\Session; if (Session::get('flashmsg')) Session::unset('flashmsg');  ?>
