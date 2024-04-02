<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmação de Pagametno</title>
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
            background-color: #1eb600;
            padding: 20px 0;
        }
        .header img {
            max-width: 200px;
        }
        h2 {
            margin-bottom: 0;
            color: #ffffff;
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
        <img src="Logo.svg" alt="[Nome do Sistema]">
        <h2>Confirmação de Pagamento</h2>
    </div>
    <div class="content">
        <p>Prezado {{$user->name}},</p>
        <p>Seu pagamento foi confirmado com sucesso! Agradecemos por sua compra.</p>
        <p>Detalhes do Pagamento:</p>
        <ul>
            <li><strong>Valor Pago:</strong> R$ {{$order->installmentValue}}</li>
            <li><strong>Data do Pagamento:</strong> {{date('d-m-Y', strtotime($order->dueDate))}}</li>
            <li><strong>Referência de Pagamento:</strong> {{$order->payment_id}}</li>
        </ul>
        <p>Seu pedido será processado e seu conteúdo liberado em breve. Você receberá atualizações sobre o status do seu pedido por e-mail.</p>
        <p>Em caso de dúvidas ou preocupações, não hesite em nos contatar via <a class="zap" href="https://wa.me/554484233200?text=Ajuda do Ecommerce">Whastapp</a>. Estamos aqui para ajudar!</p>
        <br>
        <p>Atenciosamente,</p>
        <p class="bold">Fábio Camargo</p>
        <p>Development Coordinator<br>Plataforma de Estudos: <a href="https://ead.profissionalizaead.com.br"> https://ead.profissionalizaead.com.br</a><br>E-commerce: <a href="https://shop.profissionalizaead.com.br"> https://shop.profissionalizaead.com.br</a></p>
    </div>
</div>

</body>
</html>
