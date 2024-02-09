<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alcateia Milionária</title>
    <link rel="stylesheet" href="static/css/style.css">
    <link rel="icon" href="assets/icon/logo.ico" type="image/x-icon">
</head>

<body>
    <div class="main">
        <?php
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
            include("config.php");

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $action = $_POST['action'];

                switch ($action) {
                    case 'create':
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $wpp = $_POST['wpp'];
                        $salary = $_POST['salary'];
                        $regdate = date("Y-m-d H:i:s");

                        $checkEmailQuery = "SELECT * FROM users WHERE email = '$email'";
                        $checkEmailResult = $conn->query($checkEmailQuery);

                        $checkWppQuery = "SELECT * FROM users WHERE wpp = '$wpp'";
                        $checkWppResult = $conn->query($checkWppQuery);

                        if ($checkEmailResult->num_rows > 0) {
                            echo "<script>alert('Este e-mail já está cadastrado. Por favor, use outro e-mail.');</script>";
                        } elseif ($checkWppResult->num_rows > 0) {
                            echo "<script>alert('Este número de WhatsApp já está cadastrado. Por favor, use outro número.');</script>";
                        } else {
                            $sql = "INSERT INTO users (name, email, wpp, salary, reg_date) VALUES ('$name', '$email', '$wpp', '$salary', '$regdate')";
                            $res = $conn->query($sql);

                            if ($res) {
                                echo "<script>alert('Cadastrado com sucesso!');</script>";
                            } else {
                                echo "<script>alert('Erro ao cadastrar.');</script>";
                            }
                        }
                        break;
                }
            }
        ?>
        <div class="right">
            <form action="" class="card" name="Formfill" method="POST" onsubmit="return validarFormulario()">
                <input type="hidden" name="action" value="create">
                <h1>Sobre Você</h1>
                <div class="textfield">
                    <label for="nome">Nome Completo</label>
                    <input type="text" name="name" placeholder="Nome Completo" autocomplete="name" required>
                </div>
                <div class="textfield">
                    <label for="email">E-Mail</label>
                    <input type="email" name="email" placeholder="Email" autocomplete="email" required>
                </div>
                <div class="textfield">
                    <label for="wpp">Whatsapp</label>
                    <input type="tel" name="wpp" placeholder="Whatsapp" autocomplete="tel" required>
                </div>
                <div class="textfield">
                    <label for="wpp">Qual seu salário dos sonhos?</label>
                    <input type="number" name="salary" placeholder="Valor" autocomplete="off" required>
                </div>
                <input type="submit" class="btn" value="Enviar">
            </form>
        </div>
    </div>

    <script src="static/js/script.js"></script>
</body>

</html>