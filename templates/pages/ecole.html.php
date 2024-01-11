<h2 class="mt-4 mb-4 primary-color">Nos écoles<i class="fa-solid fa-school-flag ms-3"></i></h2>

<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
    <?php
    $ecoles = (new Ecole)->getAll();
    $oEleve = new Eleve();
    $oSport = new Sport();

    foreach ($ecoles as $ecole):
        $eleves = $oEleve->getElevesWithSportsByEcoleId($ecole['id']);
        $countEleves = $oEleve->countElevesbyEcoleId($ecole['id']);
        $countElevesWithSports = $oEleve->countElevesBySportId($ecole['id']);
        $countSports = $oSport->countSportsByEcoleId($ecole['id']);
        $sportsWithEleves = $oSport->getSportsByEcoleIdWithEleves($ecole['id']);
    ?>
        <div class="col mb-4">
            <div class="card card-primary-color">
                <div class="card-body">
                    <h4 class="card-title text-center mb-4"><i class="fa-solid fa-school me-2"></i><?= $ecole['nom'] ?></h4>
                    <hr class="my-4 primary-color">
                    <?php if (empty($eleves)) : ?>
                        <div class="d-flex align-items-center">
                            <?= Helper::getAvatarByInitials("?", "?"); ?>
                            <div class="ms-3">
                                <h5>Y'a personne</h5>
                            </div>
                        </div>
                    <?php else : ?>
                        <?php foreach ($eleves as $eleve) : ?>
                            <div class="mb-3 d-flex align-items-center">
                                <?= Helper::getAvatarByInitials($eleve['eleve_prenom'], $eleve['eleve_nom']); ?>
                                <div class="ms-3">
                                    <h5 class="mb-1"><?= $eleve['eleve_prenom'] . ' ' . $eleve['eleve_nom']; ?></h5>
                                    <p class="mb-1">
                                        <?= empty($eleve['sports'])
                                            ? "Aucun sport"
                                            : implode(', ', explode(',', $eleve['sports']));
                                        ?>
                                    </p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>

                    <hr class="my-4 primary-color">
                    <p class="mb-1">
                        <?=
                        "$countEleves élève" . ($countEleves > 1 ? "s" : "") .
                        " inscrit" . ($countEleves > 1 ? "s" : "");
                        ?>
                    </p>
                    <p class="mb-1">
                        <?=
                        "$countSports Activité" . ($countSports > 1 ? "s" : "") .
                        " pratiquée" . ($countSports > 1 ? "s" : "");
                        ?>
                    </p>
                    <p class="mb-1">
                        <?=
                        "$countElevesWithSports élève" . ($countElevesWithSports > 1 ? "s" : "") .
                        " pratique" . ($countElevesWithSports > 1 ? "nt" : "") .
                        " au moins une activité";
                        ?>
                    </p>
                    <?php if ($countSports === 0) : ?>
                        <hr class="my-4"> Aucun sport pratiqué
                    <?php else : ?>
                        <hr class="my-4 primary-color">
                        <h5 class="mb-3">Détails par sport :</h5>
                        <?php foreach ($sportsWithEleves as $sportWithEleves): ?>
                            <p class="mb-1">
                                <?=
                                $sportWithEleves['sport_nom'] .
                                ": " . count(explode(',', $sportWithEleves['eleves'])) .
                                " élève" . (count(explode(',', $sportWithEleves['eleves'])) > 1 ? "s" : "") .
                                " pratique" . (count(explode(',', $sportWithEleves['eleves'])) > 1 ? "nt" : "") .
                                " ce sport";

                                ?>
                            </p>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
