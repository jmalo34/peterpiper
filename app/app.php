<?php
  require_once __DIR__."/../vendor/autoload.php";
  require_once __DIR__."/../src/Task.php";

  $app = new Silex\Application();

  $app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views'
  ));

  session_start();
  if (empty($_SESSION['list_of_entries'])) {
    $_SESSION['list_of_entries'] = array();
  }

  $app->get("/", function()  use ($app) {

    return $app['twig']->render('entries.html.twig', array('tasks' => Task::getAll()));
  });

  $app->post("/tasks", function() use ($app) {
    $entry = new Task($_POST['description']);
    $entry->save();
    return $app['twig']->render('create_entry.html.twig', array('newentry' => $task));

 });


    $app->post("/delete_entries", function() use ($app) {
    Task::deleteAll();
    return $app['twig']->render('delete_tasks.html.twig');
    });

  return $app;
 ?>
