<?php
require __DIR__ . '/etc.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><?= config('APP_NAME') ?></title>
    <meta name="theme-color" content="rgb(255,2,245)">
    <meta name="twitter:title" content="<?= config('APP_NAME') ?>">
    <meta name="twitter:image" content="assets/img/image.jpg">
    <meta property="og:type" content="website">
    <meta name="description" content="Scan data lagu yang Anda inginkan dari file audio bahkan video.">
    <meta property="og:image" content="assets/img/image.jpg">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:description" content="Scan data lagu yang Anda inginkan dari file audio bahkan video.">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.1.3/dist/quartz/bootstrap.min.css">
    <link rel="manifest" href="manifest.json">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md">
        <div class="container-fluid"><a class="navbar-brand" href="https://dbapi.org"
                target="_blank"><?= config('APP_NAME') ?></a>
        </div>
    </nav>
    <div
        class="container d-flex d-md-flex justify-content-center align-items-center justify-content-md-center align-items-md-center">
        <div class="card">
            <div class="card-body">
                <p class="text-center card-text"><?= config('APP_NAME') ?> adalah website yang menyediakan fitur untuk
                    mendeteksi
                    data lagu dari file audio / video yang diupload. Silahkan upload file yang ingin anda scan.</p>

                <?php if (isset($_FILES['file'])) : ?>
                <div class="alert alert-primary text-dark alert-dismissible" role="alert"><button type="button"
                        class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <div class="card">
                        <div class="card-body text-dark"><span
                                class="text-black-50"><?= $data = request($_FILES['file']); ?>
                        </div>
                    </div>
                </div>
                <div>
                    <?php endif; ?>

                    <form class="text-center" method="post" enctype="multipart/form-data" action=""><input
                            class="form-control" type="file" required="" accept="audio/*,video/*" name="file"><button
                            class="btn btn-primary mt-2" type="submit">Scan</button></form>
                </div>
                <p class="text-center card-text mt-3 text-muted fst-italic mb-2">Website ini menggunakan layanan API
                    Song
                    Detector dari <a href="https://dbapi.org" target="_blank">DB API</a>.</p>
            </div>
        </div>
    </div>
    <footer class="footer-basic footer mt-5" style="background: rgba(255,255,255,0.35);">
        <div class="social"><a href="https://instagram.com/IhsanDevs" target="_blank"><i
                    class="icon ion-social-instagram"></i></a><a href="https://github.com/IhsanDevs" target="_blank"><i
                    class="icon ion-social-github"></i></a><a href="https://twitter.com/IhsanDevs" target="_blank"><i
                    class="icon ion-social-twitter"></i></a><a href="https://facebook.com/IhsanDeveloper"><i
                    class="icon ion-social-facebook"></i></a></div>
        <p class="copyright" style="color: rgb(45,45,45);"><?= config('APP_NAME') ?> © <?= date('Y') ?></p>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>