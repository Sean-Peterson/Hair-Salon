<?php
    date_default_timezone_set('America/Los_Angeles');

    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Stylist.php";
    require_once __DIR__."/../src/Client.php";


    $app = new Silex\Application();

    $app['debug'] = true;


    $server = 'mysql:host=localhost:3306;dbname=hair_salon';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

    $app->get("/", function() use ($app) {
        return $app['twig']->render('index.html.twig', array('stylists' => Stylist::getAll()));
    });

    $app->post("/", function() use ($app) {
        $new_stylist = new Stylist($_POST['new_stylist']);
        $new_stylist->save();
        return $app['twig']->render('index.html.twig', array('stylists' => Stylist::getAll()));
    });

    $app->get("/stylist/{id}", function($id) use ($app) {
        $stylist = Stylist::findStylist($id);
        $clients = Client::findClientByProperty("stylist_id", $id);
        return $app['twig']->render('stylist.html.twig', array('stylist' => $stylist, 'clients'=> $clients));
    });

    $app->get("/stylist/{id}/edit", function($id) use ($app) {
        $stylist = Stylist::findStylist($id);
        $clients = Client::findClientByProperty("stylist_id", $id);
        return $app['twig']->render('stylist.html.twig', array('stylist' => $stylist, 'clients'=> $clients));
    });

    $app->post("/stylist/{id}/add", function($id) use ($app) {
        $new_client = new Client($_POST['name'],$_POST['stylist_id']);
        $new_client->save();
        $stylist = Stylist::findStylist($id);
        $clients = Client::findClientByProperty("stylist_id", $id);
        return $app['twig']->render('stylist.html.twig', array('stylist' => $stylist, 'clients'=> $clients));
    });

    $app->patch("/stylist/{id}/patch", function($id) use ($app) {
        $stylist = Stylist::findStylist($id);
        $clients = Client::findClientByProperty("stylist_id", $id);
        $stylist->updateStylist("stylist_name", $_POST['new_name']);
        return $app['twig']->render('stylist.html.twig', array('stylist' => $stylist, 'clients'=> $clients));
    });

    $app->delete("/{id}/remove", function($id) use ($app) {
        $stylist = Stylist::findStylist($id);
        $stylist->deleteStylist();
        return $app['twig']->render('index.html.twig', array('stylists' => Stylist::getAll()));
    });

    $app->get("/client/{id}", function($id) use ($app) {
        $client = Client::findClient($id);
        $stylist = Stylist::findStylist($client->getStylistId());
        return $app['twig']->render('client.html.twig', array('client'=> $client, 'stylist'=>$stylist));
    });

    $app->patch("/client/{id}/patch", function($id) use ($app) {
        $client = Client::findClient($id);
        $stylist = Stylist::findStylist($client->getStylistId());
        $client->updateClient("client_name", $_POST['new_name']);
        return $app['twig']->render('client.html.twig', array('client'=> $client, 'stylist'=>$stylist));
    });

    $app->delete("/client/{client_id}/{stylist_id}/remove", function($client_id, $stylist_id) use ($app) {
        $client = Client::findClient($client_id);
        $stylist = Stylist::findStylist($client->getStylistId());
        $client->deleteClient();
        $clients = Client::findClientByProperty("stylist_id", $stylist_id);
        return $app['twig']->render('stylist.html.twig', array('clients'=> $clients, 'stylist'=>$stylist));
    });

    return $app;
?>
