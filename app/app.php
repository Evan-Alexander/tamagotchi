<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Tamagotchi.php";

    session_start();

    if(empty($_SESSION["list_of_properties"])) {
        $_SESSION["list_of_properties"] = array();
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider() , array("twig.path"                                 => __DIR__."/../views"));

    $app->get("/",function() use ($app) {

        return $app["twig"]->render("tama.html.twig" , array("name"=>Tamagotchi::getAll()));
    });

    $app->post("/name" , function() use ($app) {
        $tama_g = new Tamagotchi($_POST["name"]);
        $tama_g->save();
            return $app["twig"]->render("name_and_play.html.twig" , array("newTama"=>$tama_g));
    });

    $app->post("/delete_properties" , function() use ($app) {
        Tamagotchi::deleteAll();
        return $app["twig"]->render("tamagotchi_dead.html.twig");
    });

    return $app;
?>
