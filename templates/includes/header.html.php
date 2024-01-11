<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Php Avancé 1</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous"
    >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="/style/style.css">
    <link rel="icon" href="/images/icon/icon.jpg" type="image/x-icon">
    <link rel="shortcut icon" href="/images/icon/icon.jpg" type="image/x-icon">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary mb-5" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img src="images/logo/logo_esecad.png"
                     alt="Logo Esecad"
                     width="150"
                     height="50"
                     style="filter: invert(1)"
                >
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <?php include 'templates/includes/nav.html.php'; ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">