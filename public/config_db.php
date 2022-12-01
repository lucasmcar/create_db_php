<?php

    require_once '../vendor/autoload.php';
    session_start();

    $con = new PDO("mysql:host=localhost;dbname=computadores", "root", "Lucas1990");

    use app\util\DotEnvReader;
    use app\comunication\Comunication;


    $envData = parse_ini_file('../app.ini');

    $path = "https://api.telegram.org/bot".$envData['BOT_API_KEY'];

    $update = json_decode(file_get_contents("php://input"), true);

    $chatId = $update["message"]["chat"]["id"];
    $message = $update["message"]["text"];


    if (strpos($message, "/connection") === 0) {
        file_get_contents($path."/sendmessage?chat_id=".$chatId."&text=Escolhi: Mysql");
    }

    print_r($update);

    print_r(ltrim($envData['BOT_API_KEY']));
    

    $comunication = new Comunication($envData['BOT_API_KEY']);


    

    $comunication->clientCommunication($envData['BOT_API_KEY'], "Escolhi Mysql");

?>
<html>
    <head>

    </head>
    <body>
        <form>
            <select>
                <option selected value=" "></option>
                <?php foreach (PDO::getAvailableDrivers() as $key => $value) { ?>
                        <?php if(count(PDO::getAvailableDrivers())) { ?>
                        <option value="<?php echo $value; ?>">
                            <?php echo $value; ?>
                        </option>
                        <?php } ?>
                <?php } ?>
            </select>
            <input type="text" name="db_name" placeholder="Nome do banco">
            <input type="text" name="db_username" placeholder="Usuario do banco">
            <input type="text" name="db_password" placeholder="Senha do banco">
            <button type="button">Verificar conexao</button>
            <span id="resposta"></span>
            <button type="submit">Criar banco de dados</button>
        </form>
        <scrip src="js/ajax.js"></scrip>
    </body>
</html>
