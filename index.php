<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MySql</title>
</head>
<body>
    <?php
        define ('DB_SERVERNAME', 'localhost:8889');
        define ('DB_USERNAME', 'root');
        define ('DB_PASSWORD', 'root');
        define ('DB_NAME', 'db-university');

        $conn = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

        if($conn && $conn-> connect_error){
            echo ('impossibile accedere');
            die()
        }

        echo ('connection OK');

        $sql = 'SELECT `name`, `surname`, `phone`  FROM `teachers` ORDER BY `name`, `surname`';

        $teachers_result = $conn->query($sql);

        if($teachers_result && $teachers_result->num_rows > 0){
           
            while ( $teacher = $teachers_result->fetch_assoc()){
                ?>
                    <div>
                        <div><?=$teacher['name'] ?></div>
                        <div><?=$teacher['surname'] ?></div>
                        <div><?=$teacher['phone'] ?></div>
                    </div>
                <?php
            }

        }elseif($teachers_result){
            ?>
                <div>Non ci sono professori disponibili nel database</div>

            <?php
        }else{
            echo('error');
            die();
        };


    ?>
    
</body>
</html>