<?php

if(isset($_GET['cep']) && !empty($_GET['cep'])) {
    $CEP = $_GET['cep'];

    $cep = preg_replace("/[^0-9]/", "", $CEP);
    $url = file_get_contents("https://viacep.com.br/ws/$cep/json/");

    $obj = json_decode($url, true);
} else {
    $obj['localidade'] = '';
    $obj['uf'] = '';
    $obj['logradouro'] = '-';
    $obj['bairro'] = '-';
    $obj['ddd'] = '-';
}

?>

<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

<body class="bg-gradient-to-r from-green-400 to-blue-400">
    <center>
        <div>
            <form class="m-3 p-6">
                <input class="rounded-l-lg p-2 border-t mr-0 border-b border-l text-gray-800 border-gray-200 bg-white"
                       name="cep" placeholder="CEP"/>
                <button class="px-2 rounded-r-lg bg-green-500  text-white font-bold p-2 uppercase border-green-600
                border-t border-b border-r">Procurar</button>
            </form>
        </div>

        <div class="bg-white max-w-xs rounded overflow-hidden shadow-lg my-2">
            <img class="w-full" src="img/logobrasil.png" alt="Sunset in the mountains">
            <div class="px-6 py-4">
                <?php if(isset($obj)): ?>
                    <div class="font-bold text-xl mb-2"><?php echo $obj['localidade']."-".$obj['uf'] ?></div>
                <?php endif; ?>
                <p class="text-grey-darker text-base">
                    <?php if(isset($obj)): ?>
                        <strong>Logradouro:</strong> <?php echo $obj['logradouro']."<br>" ?>
                        <strong>Bairro:</strong> <?php echo $obj['bairro']."<br>" ?>
                        <strong>DDD:</strong> <?php echo $obj['ddd'] ?>
                    <?php endif; ?>
                </p>
            </div>
            <div class="px-6 py-4">
                <a class="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker
                mr-2"><img src="img/logogithub.png" width="40px">FerreiraWalter</a>
            </div>
        </div>
    </center>
</body>
