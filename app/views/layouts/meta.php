<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title><?= (!empty($title)) ? $title . ' — ' . getenv('APP_NAME') : getenv('APP_NAME') . ' — ' . getenv('APP_TITLE'); ?></title>
<meta name="robots" content="index, follow">
<link href="<?= current_url(); ?>" rel="canonical">
<link href="<?= base_url('public/assets/favicon.png'); ?>" rel="shortcut icon" type="image/png">

<meta name="title" content="<?= (!empty($title)) ? $title . ' — ' . getenv('APP_NAME') : getenv('APP_NAME') . ' — ' . getenv('APP_TITLE'); ?>">
<meta name="description" content="<?= (!empty($meta['description'])) ? $meta['description'] : getenv('APP_DESCRIPTION'); ?>">
<meta name="keywords" content="<?= (!empty($meta['keywords'])) ? $meta['keywords'] : getenv('APP_KEYWORDS'); ?>">

<meta property="og:type" content="website">
<meta property="og:url" content="<?= current_url(); ?>">
<meta property="og:title" content="<?= (!empty($title)) ? $title . ' — ' . getenv('APP_NAME') : getenv('APP_NAME') . ' — ' . getenv('APP_TITLE'); ?>">
<meta property="og:description" content="<?= (!empty($meta['description'])) ? $meta['description'] : getenv('APP_DESCRIPTION'); ?>">
<meta property="og:image" content="<?= (!empty($meta['thumb'])) ? base_url('assets/images/meta-thumb/' . $meta['thumb']) : base_url('assets/images/meta-thumb/main.jpg'); ?>">
<meta property="og:site_name" content="<?= getenv('APP_NAME'); ?>">

<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="<?= current_url(); ?>">
<meta property="twitter:title" content="<?= (!empty($title)) ? $title . ' — ' . getenv('APP_NAME') : getenv('APP_NAME') . ' — ' . getenv('APP_TITLE'); ?>">
<meta property="twitter:description" content="<?= (!empty($meta['description'])) ? $meta['description'] : getenv('APP_DESCRIPTION'); ?>">
<meta property="twitter:image" content="<?= (!empty($meta['thumb'])) ? base_url('assets/images/meta-thumb/' . $meta['thumb']) : base_url('assets/images/meta-thumb/main.jpg'); ?>">
<meta name="twitter:image:alt" content="<?= (!empty($title)) ? $title : getenv('APP_TITLE'); ?>">

<meta name="google-site-verification" content="<?= getenv('ANALYTIC_GOOGLE'); ?>" />

<meta name="theme-color" content="#9e6d5b" />
<meta name="msapplication-navbutton-color" content="#9e6d5b" />
<meta name="apple-mobile-web-app-status-bar-style" content="#9e6d5b" />

<link rel='manifest' href='<?= base_url(); ?>manifest.json'>
<link rel="apple-touch-icon" href="img/icon/180x180.png">