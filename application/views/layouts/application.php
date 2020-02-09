<?= @$yield_header ?>


<body id="page-top">

<?= @$yield_topbar ?>

<div id="wrapper">

<?= @$yield_sidebar ?>


<div class="wrapper">
  <?= $yield ?>      
</div>

<?= @$yield_logout ?>
<?= @$yield_login ?>

<?= @$yield_footer ?>