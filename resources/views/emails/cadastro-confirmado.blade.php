<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmação de Cadastro</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        .container {
            background-color: #ffffff;
            margin: auto;
            max-width: 600px;
            padding: 20px;
        }
        .header {
            text-align: center;
            background-color: #ffcc00;
            padding: 20px 0;
        }
        .header img {
            max-width: 200px;
        }
        h2 {
            margin-bottom: 0;
            color: #004080;
            font-weight: 700;
        }
        p {
            color: #004080;
            line-height: 1.5;
        }

        .bold {
            font-weight: 800;
        }

        .zap {
            color: #17b609;
        }

        a {
            
            font-weight: 800;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <img src="Logo-new.png" alt="[Nome do Sistema]">
        <h2>Confirmação de Pagamento</h2>
    </div>
    <div class="content">
        <p>Prezado {{$user->name}},</p>
        <p>É com grande satisfação que informamos que seu cadastro foi efetuado com sucesso em nosso sistema, utilize suas credenciais de acesso para entrar no sistema:</p>
        <ul>
            <li><strong>Usuário:</strong> {{$user->email}} </li>
            <li><strong>Senha:</strong> {{$password}} </li>
        </ul>
        <p>Caso tenha alguma dúvida ou problema com seu cadastro, não hesite em nos contatar através do <a class="zap" href="https://wa.me/554484233200?text=Ajuda do Ecommerce">Whastapp</a> ou pelo nosso canal de suporte disponível no próprio sistema.</p>
        <p>Agradecemos por se juntar a nós e esperamos que aproveite ao máximo sua experiência na Profissionaliza Shop.</p>
        <p>Atenciosamente,</p>
        <br>
        <p class="bold">Fábio Camargo</p>
        <p>Development Coordinator<br>Plataforma de Estudos: <a href="https://ead.profissionalizaead.com.br"> https://ead.profissionalizaead.com.br</a><br>E-commerce: <a href="https://shop.profissionalizaead.com.br"> https://shop.profissionalizaead.com.br</a></p>
    </div>
</div>

</body>
</html>
