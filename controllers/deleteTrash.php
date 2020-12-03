<?php


if (isset($_GET['idTrash']) && !empty($_GET['idTrash'])) {
    include_once '../modals/Ftrash.php';

    Ftrash::deleteTrash($_GET['idTrash']);
    header('Location: ../listTrash.php');

} else {
    header('Location: ../listTrash.php');
}