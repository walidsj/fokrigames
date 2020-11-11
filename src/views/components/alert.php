<?php if ($this->session->flashdata('alert')) : ?>
   <script>
      alert('<?= $this->session->flashdata('alert'); ?>');
   </script>
<?php endif; ?>