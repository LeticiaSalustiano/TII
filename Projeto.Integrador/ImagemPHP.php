<?php
 if ((isset ($_POST['hashKey'])) && (isset($_FILES['arquivoAsubir'])) && (isset ($_POST['nomeArquivo'])))
    {
		$hashKey = $_POST['hashKey'];	
		$secretKey="SenhaSecreta";	
		
		$fileName = $_POST['nomeArquivo'];		
		
		$real_hash = hash('sha256',($_POST['nomeArquivo'] . $secretKey));		
		
        $fileToUpload = $_FILES['arquivoAsubir'];
        $target_dir = "uploads/";
		
        $target_file = $target_dir . $fileName;
        
		// Checa validade do hash enviado
		if ($real_hash !== $hashKey) exit ("ERRO_HASH");		
		
        // Checa se o arquivo enviado de fato eh uma imagem
        {
          $check = getimagesize($_FILES['arquivoAsubir']['tmp_name']) or exit ("ERRO_GRAVANDO_ARQUIVO(1)");
          if($check == false) exit ("ERRO_ARQUIVO_NAO_EH_IMAGEM");
        }
        
		// Checa se ja ha arquivo com o nome na pasta
        if (file_exists($target_file)) exit ("ERRO_IMAGEM_JA_EXISTENTE");

        // Se estiver tudo OK ele tenta mover o arquivo para o destino.
        {
          if (move_uploaded_file($_FILES['arquivoAsubir']['tmp_name'], $target_file)) {
            echo $_POST['nomeArquivo'];
          } else exit("ERRO_GRAVANDO_ARQUIVO(2)");
        }
    }
else exit ("ERRO_DESCONHECIDO");
?>