<h2 class="mt-4 mb-4 primary-color">Nos élèves<i class="fa-solid fa-user-graduate ms-3"></i></h2>

<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
    <?php
    $oEleve = new Eleve();
    $eleves = $oEleve->getElevesWithAllInformations();

    foreach ($eleves as $eleve): ?>
        <div class="col mb-2">
            <div class="card card-primary-color">
                <div class="card-body">
                    <div class="d-flex">
                        <?= Helper::getAvatarByInitials($eleve['prenom'], $eleve['nom']) ?>
                        <div class="d-block ms-3">
                            <h5 class="card-title"><?= $eleve['nom'] . ' ' . $eleve['prenom'] ?></h5>
                            <h6 class="card-subtitle text-muted">
                                <i class="fa-solid fa-school me-2"></i>
                                <?= $eleve['nom_ecole'] ?>
                            </h6>
                        </div>
                    </div>
                    <hr class="my-4 primary-color">
                    <p class="card-text">
                        <?=
                        empty($eleve['sports'])
                            ? "Aucun sport"
                            : implode('<br> ', explode(',', $eleve['sports']));
                        ?>
                    </p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>