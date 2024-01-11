<?php

require_once 'app.php';

(new Fixture)
    ->clear('ecole')
    ->clear('eleve_sport')
    ->clear('eleve')
    ->clear('sport');

(new EcoleFixtures)->generate(3);
(new SportFixtures)->generate(10);
(new EleveFixtures)->generate(10);

include 'templates/includes/header.html.php';
include 'templates/pages/index.html.php';
include 'templates/includes/footer.html.php';