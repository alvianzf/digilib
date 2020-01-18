<?= @$yield_header ?>


<body id="page-top">

<?= @$yield_topbar ?>

<div id="wrapper">

<?= @$yield_sidebar ?>


<div id="content-wrapper">

  <div class="container-fluid">

<?= $yield ?>

<?= @$yield_sticky_footer ?>
</div>

</div>
<!-- /#wrapper -->

<?= @$yield_logout ?>

<?= @$yield_footer ?>