<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Feiras de Adoção de Animais</title>
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
</head>
<body>

    <nav class="menu">
        <a href="./paginainicial.html"><img src="./imagens/Logo.png" alt="Logo"></a>
        <button><a href="./ajudar.html">Voltar</a></button>
    </nav>

    <div class="titulo">
        <h1>Feiras de Adoção de Animais</h1>
        <h2>Visite feiras de Adoção e encontre um animal cheio de amor esperando por você!</h2>
        <p>A sua visita pode ser o começo de uma linda história!</p>
    </div>

    <div class="feira-lista">
    <div class="feira">
        <h3>Adotados e Amados - São Paulo</h3>
        <p><strong>Data:</strong> Feiras fixas aos sábados!</p>
        <p><strong>Local:</strong> Praça Benedito Calixto, Pinheiros, São Paulo</p>
        <!--<div class="imgm"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT6-nYHsrEUgJCCOnISco4kJiCWZ0t2-NBm3g&s"></div>-->
        <div id="qrcode1"></div> <!-- QR Code será gerado aqui -->
        <button onclick="generateQRCode('https:www.google.com/maps/place/Pra%C3%A7a+Benedito+Calixto+-+Pinheiros,+S%C3%A3o+Paulo+', 'qrcode1')">Gerar QR Code</button>
        
    </div>

    <!-- Outra Feira -->
    <div class="feira">
        <h3>Focinhos de Luz - Rio de Janeiro</h3>
        <p><strong>Data:</strong> 22/02/2025</p>
        <p><strong>Local:</strong> Avenida Embaixador Abelardo Bueno, 2660, Rio de Janeiro</p>
        <div id="qrcode2"></div> <!-- QR Code será gerado aqui -->
        <button onclick="generateQRCode('https:www.google.com/maps?q=Avenida+Embaixador+Abelardo+Bueno,+2660,+Rio+de+Janeiro', 'qrcode2')">Gerar QR Code</button>
       <!--<div class="imgm"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT44iZoTrn2eyhX1DcgIFMc4RhFL0404Os6Nw&s" ></div>-->
    </div>
</div>

<script>
    // Função para gerar QR Code sem duplicação
function generateQRCode(url, elementId) {
    // Verificar se já existe um QR Code gerado no elemento
    const element = document.getElementById(elementId);
    
    // Limpar o conteúdo anterior, caso exista
    element.innerHTML = "";

    // Gerar o novo QR Code
    new QRCode(element, {
        text: url,
        padding: 30,
        width: 128,
        height: 128,
        colorDark: "#000000",
        colorLight: "#ffffff",
        correctLevel: QRCode.CorrectLevel.H
    });
}

</script>

<div class="banner2">
        <h1>Desenvolvido por <span id="font">LDGL</span></h1>
        <div class="redes">
            <a href="https://pt-br.facebook.com/"><i class='bx bxl-facebook'></i></a>
            <a href="https://www.instagram.com/"><i class='bx bxl-instagram'></i></a>
            <a href="https://web.whatsapp.com/"><i class='bx bxl-whatsapp'></i></a>
        </div>
    </div>

</body>
</html>

<style>
@charset "UTF-8";
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Roboto+Flex:opsz,wght@8..144,100..1000&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100..900&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Zen+Kaku+Gothic+New&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Yantramanav:wght@100;300;400;500;700;900&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/*-------Cores-------*/
:root {
    --blue: #14C5EC;
    --light-blue: #BBEEF9;
    --dark-blue: #095f72;
    --white: #EDFBFE;
}

body {
    margin: 0px;
    padding: 0px;
    box-sizing: border-box;
    color: #1e1e1e;
    height: 100vh;
    width: 100%;
    background-color: var(--white);          
}

/*-------Menu-------*/
.menu {
    width: 100%;
    height: 14vh;
    display: flex;
    align-items: center;
    justify-content: space-between;
    background-color: var(--blue);
    font-family: "Roboto Flex";
    padding: 20px;
}

.menu button {
    width: 200px;
    height: 40px;
    border: none;
    outline: none;
    border-radius: 50px;
    background-color: var(--dark-blue);
    color: var(--white);
    font-size: 15px;
    cursor: pointer;
}

/*-------Menu Hamburguer (Mobile)-------*/
.menu .botao {
    width: 40px;
    height: 40px;
    border-radius: 10px;
    background-color: var(--dark-blue);
    display: none;
}

.menu a {
    color: var(--white);
    padding: 10px 17px;
    text-decoration: none;
    font-size: 17px;
}

/*-------Logo-------*/
.menu img {
    width: 76px;
    height: 70px;
    margin-left: 30px;
}

.titulo {
    width: 90%;
    height: 30vh;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    font-family: "Roboto Flex";
    color: 0 4px 8px rgba(22, 22, 22, 0.568);
    margin: 50px;
}

.titulo h1 {
    color: var(--blue);
    font-size: 50px;
}

.titulo h2 {
    font-size: 30px;
}

.titulo p {
    font-size: 20px;
    color: gray;
}

/* Estilo das feiras */
.feira-lista {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 20px;
}

.feira {
    margin-bottom: 30px;
    padding: 15px;
    border: 1px solid var(--light-blue);
    border-radius: 10px;
    width: 80%;
    background-color: var(--light-blue);
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

.feira h3 {
    color: var(--black);
    font-family: arial;
    font-size: 30px;
    margin-bottom: 10px;
}

.feira p {
    padding: 4px;
    font-family: sans-serif;
    font-size: 20px;
    color: var(--dark-blue);
}

#qrcode1 {
    margin-top: 20px;
}

#qrcode2 {
    margin-top: 20px;
}

button {
    margin-top: 20px;
    padding: 10px 20px;
    background-color: var(--blue);
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: var(--dark-blue);
}

/*-------Banner2-------*/
.banner2{
    width: 100%;
    height: 10vh;
    display: flex;
    align-items: center;
    justify-content: space-between;
    background-color: var(--blue);
    color: var(--white);
    margin-top: 150px;
    font-family: "Zen Kaku Gothic New";
    font-weight: 400;
    gap: 10px;
    padding: 0 20px;
}

/*-------Fonte-------*/
#font{
    font-family: 'quantum';
}

/*---Redes---*/
.redes{
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 5px;
}

.redes a{
    text-decoration: none;
    color: var(--white);
}

.redes i{
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: var(--dark-blue);
    border-radius: 50%;
    font-size: 1.7rem;
    cursor: pointer;
    transition-duration: 0.5s;
}

.redes i:hover{
    color: var(--blue);
}

/* Responsividade para telas menores */
@media (max-width: 1024px) {
    .menu {
        padding: 15px;
    }

    .menu a {
        font-size: 16px;
    }

    .titulo h1 {
        font-size: 35px;
    }

    .titulo h2 {
        font-size: 24px;
    }

    .titulo p {
        font-size: 18px;
    }

    .feira {
        width: 90%;
    }

    .feira h3 {
        font-size: 28px;
    }

    .feira p {
        font-size: 18px;
    }

    .banner2 {
        height: 15vh;
        padding: 0 30px;
    }

    .redes i {
        width: 45px;
        height: 45px;
        font-size: 1.5rem;
    }
}

@media (max-width: 768px) {
    .menu {
        flex-direction: column;
        align-items: flex-start;
        height: auto;
        padding: 15px 20px;
    }

    .menu a {
        font-size: 16px;
        padding: 8px 12px;
    }

    .menu button {
        width: 100%;
        font-size: 14px;
        margin-top: 10px;
    }

    .feira-lista {
        padding: 15px;
    }

    .feira {
        width: 100%;
        padding: 12px;
    }

    .titulo {
        width: 90%;
        height: auto;
        margin: 30px;
        text-align: center;
    }

    .titulo h1 {
        font-size: 36px;
    }

    .titulo h2 {
        font-size: 24px;
    }

    .titulo p {
        font-size: 18px;
    }

    .redes i {
        width: 40px;
        height: 40px;
        font-size: 1.3rem;
    }

    .banner2 {
        height: 12vh;
        padding: 0 15px;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }
}

@media (max-width: 480px) {
    .menu {
        padding: 10px;
    }

    .menu a {
        font-size: 14px;
    }

    .feira-lista {
        padding: 10px;
    }

    .feira {
        width: 100%;
        margin-bottom: 20px;
    }

    .titulo h1 {
        font-size: 28px;
    }

    .titulo h2 {
        font-size: 20px;
    }

    .titulo p {
        font-size: 16px;
    }

    .banner2 {
        height: 15vh;
        padding: 0 10px;
    }

    .redes i {
        width: 35px;
        height: 35px;
        font-size: 1.2rem;
    }
}

</style>
