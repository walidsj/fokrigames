<script src="<?= base_url(); ?>/upup.min.js"></script>
<script>
   UpUp.start({
      'content-url': '/public/offline.html', // show this when the user is offline
      'assets': [ // define additional assets needed while offline:
         '<?= base_url(); ?>public/assets/splash/images/logo.png', // such as images,
         '<?= base_url(); ?>public/assets/splash/css/style.css', // custom stylesheets,
      ]
   });
</script>
<noscript>Browser tidak support javascript.</noscript>
</body>

</html>