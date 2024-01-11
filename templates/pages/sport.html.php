<h2 class="mt-4 mb-4 primary-color">Nos sports<i class="fa-solid fa-dumbbell ms-3"></i></h2>

<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
    <?php
    $oSports = new Sport();
    $sports = $oSports->getSportsWithEleves();

    foreach ($sports as $sport): ?>
        <div class="col mb-2">
            <div class="card card-primary-color">
                <div class="card-body">
                    <h5 class="card-title"><?= $sport['sport_nom'] ?></h5>
                    <h6 class="card-subtitle text-muted"><?= $sport['nombre_eleves'] ?> élève<?= $sport['nombre_eleves'] > 1 ? 's' : '' ;?></h6>
                    <hr class="my-4 primary-color">
                    <p class="card-text">
                        <?php
                        if (empty($sport['eleves'])) {
                            echo "Aucun élève";
                        } else {
                            $eleves = explode(',', $sport['eleves']);
                            foreach ($eleves as $eleve) {
                                list($prenom, $nom) = explode(' ', $eleve);
                                echo '
                                <div class="d-flex mb-2">
                                    ' . Helper::getAvatarByInitials($prenom, $nom) . '
                                    <div class="d-block ms-3">
                                        <h5 class="card-title mt-2">' . $prenom . ' ' . $nom . '</h5>
                                    </div>
                                </div>
                            ';
                            }
                        }
                        ?>
                    </p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>