<!DOCTYPE html>
<html lang="en">
<head>
<title>Burger Code</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../jquery/maman.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span> Burger Code <span class="glyphicon glyphicon-cutlery"></span></h1>
<div class="container admin">
    <div class="row">
        <h1><strong>Liste des items </strong><a href="" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-plus"></span>Ajouter</a></h1>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Prix</th>
                    <th>Catégories</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

            <?php
            require 'database.php';
            $db = Database::connect();
            $statement = $db->query('SELECT items.id, items.name, items.description, items.price, categories.names AS category FROM items LEFT JOIN categories ON items.category = categories.id ORDER BY items.id DESC');
            while($item = $statement->fetch())
            {
                echo '<tr>';
                echo '<td>' . $item['name'] . '</td>';
                echo '<td>' . $item['description'] . '</td>';
                echo '<td>' . $item['price'] . '</td>';
                echo '<td>' . $item['category'] . '</td>';
                echo '<td width=300>';
                    echo '<a class="btn btn-default" href="view.php?id=' . $item['id'] . '"><span class="glyphicon glyphicon-eye-open"></span>Voir</a>';
                    echo '<a class="btn btn-primary" href="update.php?id=' . $item['id'] . '"><span class="glyphicon glyphicon-pencil"></span>Modifier</a>';
                    echo '<a class="btn btn-danger" href="delete.php?id=' . $item['id'] . '"><span class="glyphicon glyphicon-remove"></span>Supprimer</a>';
                echo '</td>';
                echo '</tr>';
            }
            
            
            
            
            
            
            ?>

            </tbody>
        </table>
    </div>

</div>
</body>
</html>