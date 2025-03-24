<?php session_start();
require 'bridge.php';
$classes = $query->selectColumn("class", "class");

$gterm = $query->term();
$gsession = $query->sSession("session", "sessionstatus");

$sessions = $query->selectColsOrder(["id", "session", "term", "results_status"], "termstatus", "session", "DESC");

if (isset($_POST['submit']) && !empty($_POST['session']) && !empty($_POST['term']) && !empty($_POST['class'])) {
    $error = [];
    if ($_POST['class'] == "all") {

        foreach ($classes as $class) {
            $cls = $class['class'];
            if ($query->lookUp(
                "id",
                "termstatus",
                ["class" => $cls, "session" => $_POST['session'], "term" => $_POST['term']]
            ) < 1) {
                $query->dbInsert(
                    "termstatus",
                    ["class" => $cls, "session" => $_POST['session'], "term" => $_POST['term'], "results_status" => "approved"]
                );
            }
        }
        header("Refresh:0");
    } else {

        if ($query->lookUp(
            "id",
            "termstatus",
            ["class" => $_POST['class'], "session" => $_POST['session'], "term" => $_POST['term']]
        ) > 0) {

            $error['session'] = "Selected Class Results has already been approved.";
        }

        if (empty($error)) {
            if ($query->dbInsert(
                "termstatus",
                ["class" => $_POST['class'], "session" => $_POST['session'], "term" => $_POST['term'], "results_status" => "approved"]
            ));
            header("Refresh:0");
        }
    }
}

if (isset($_POST['checksub']) && !empty($_POST['checkgs']) && !empty($_POST['checkterm'])) {
    $approvedClasses = $query->selectAndOrder(
        ["id", "class"],
        "termstatus",
        ["session" => $_POST['checkgs'], "term" => $_POST['checkterm'], "results_status" => "approved"],
        "class",
        "ASC"
    );
}

require 'view/admin/termstatus.view.php';
