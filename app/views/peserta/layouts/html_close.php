<script src="<?= base_url(); ?>pwabuilder-sw.js"></script>
<script type="module">
   import 'https://cdn.jsdelivr.net/npm/@pwabuilder/pwaupdate';

const el = document.createElement('pwa-update');
document.body.appendChild(el);
</script>
<noscript>Browser tidak support javascript.</noscript>
</body>

</html>