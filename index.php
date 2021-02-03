<?php

$db_host = 'sql313.epizy.com';
$db_user = 'epiz_27658280';
$db_pass = 'Rgl4CCmtXRM8';
$db_database = 'epiz_27658280_doner';
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_database);
if (!$conn) {

    die("failed to connect!" . mysqli_error($conn));
}

//write query fro all doners
$sql = 'SELECT Title, Namee, Addresss, Tell, Souce  FROM doners';
$result = mysqli_query($conn, $sql);
$doners = mysqli_fetch_all($result, MYSQLI_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doners</title>

</head>

<body>

    <?php include('Templates/header.php') ?>

    <div class="container bg-light text-center">
        <h1>Orders!</h1>
        <div class="row">
            <?php foreach ($doners as $doner) { ?>
                <div class="col sm-6 md-3">

                    <div class="card text-start">
                        <div class="card-body">
                            <h5 class="card-title"> Doner </h5>
                            <br>
                            <h4 class="card-subtitle mb-2 md-2 text-muted"><?php echo htmlspecialchars($doner['Namee']); ?> </h4>
                            <h5 class="card-subtitle mb-2 md-2 text-muted"><?php echo htmlspecialchars($doner['Addresss']); ?> </h5>
                            <h6 class="card-subtitle mb-2 md-2 text-muted"><?php echo htmlspecialchars($doner['Tell']); ?> </h6>

                            <ul class="d-flex justify-content-center flex-column px-0">

                                <li><?php echo htmlspecialchars($doner['Title']); ?></li>
                                <ul class="d-flex justify-content-center flex-column px-0">

                                    <li><?php echo htmlspecialchars($doner['Souce']); ?></li>

                                </ul>

                            </ul>

                        </div>
                    </div>

                </div>
            <?php  } ?>
            <?php if (count($doners) >= 1) : ?>
                <h5 class="mt-2"> There are <?php echo count($doners); ?> order/s.</h5>
            <?php else : ?>
                <h5 class="mt-2">There are no doners.</h5>
            <?php endif; ?>

        </div>
    </div>

    <?php include('Templates/footer.php') ?>

</body>

</html>