<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $text = $_POST["text"];
    $key = $_POST["password"];
    $action = $_POST["action"];
    
    if ($action == "encrypt") {
        $iv = random_bytes(16);
        $encrypted = openssl_encrypt($text, 'aes-256-cbc', $key, 0, $iv);
        $result = base64_encode($iv) . "|" . $encrypted;
    } elseif ($action == "decrypt") {
        list($iv, $encrypted) = explode("|", $text, 2);
        $decrypted = openssl_decrypt($encrypted, 'aes-256-cbc', $key, 0, base64_decode($iv));
        $result = $decrypted;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="https://www.pngmart.com/files/16/Vector-Key-PNG-Photos.png" type="">   
    <title>AES Encryption/Decryption Result</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('gifsokkeren.gif');
            background-size: cover;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column; 
            align-items: center;
            min-height: 100vh;
        }
        
        .container {
            border-radius: 10px;
            box-shadow: 0 0 65px rgb(0, 0, 0);
            padding: 20px;
            width: 500px;
            max-width: 1000%;
            margin-top: 7cm;         
        }
        
        h2 {
            color: white;
            margin-bottom: 20px;
            text-shadow: 4px 2px 7px rgb(0, 0, 0);
        }
        
        p.result {
            margin-bottom: 20px;
            font-size: 16px;
            line-height: 1.5;
            color: #08d2e5;
            overflow-wrap: break-word; 
            border: 1px solid #08d2e5; /* Opsional: menambahkan border untuk visualisasi */
            padding: 10px; /* Opsional: menambahkan padding untuk memperbaiki tampilan */
            border-radius: 5px; /* Opsional: memberikan sudut yang melengkung */
            background: rgba(255, 255, 255, 0.1); /* Opsional: menambahkan latar belakang transparan */
        }

        a {
            color: slategray;
            text-decoration: none;
            transition: color 0.3s ease-in-out;
            margin-left: 10cm;
        }
        
        input[type="submit"], button {
            background-color: #08d2e5;
            color: #fff;
            border: #085f67;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
            width: 18%;
            padding: 7px;
            border-radius: 15px;
            margin-top: 5px;
            margin-left: 20px;
        }
        
        input[type="submit"]:hover, button:hover {
            background-color: #0d6c75;
            color: silver;
        } 
        
        footer {
            position:absolute;
            bottom:0;
            width:30%;
            height:15px; 
            color: whitesmoke;
            text-align: center;
            font-size: xx-small;
            font-stretch: expanded;
            font-style: italic;
        }
    
        a:hover {
            color: #08d2e5;
        }

        textarea {
            display: block;
            width: 90%;
            margin-bottom: 15px;
            padding: 10px;
            border: 2px solid #ffffff;
            border-radius: 5px;
            font-size: 15px;
            background-color: rgba(255, 255, 255, 0.1);
            resize: none; /* Menghapus opsi resize agar pengguna tidak dapat mengubah ukuran */
            color: #fff;
            text-shadow: 1px 1px #0d6c75;
}

    </style>
    <script>
        function copyToClipboard() {
            const resultText = document.getElementById("result-text");
            const tempInput = document.createElement("input");
            tempInput.value = resultText.textContent; // Ambil konten teks dari elemen p
            document.body.appendChild(tempInput);
            tempInput.select();
            document.execCommand("copy");
            document.body.removeChild(tempInput); // Hapus elemen input sementara
            alert("Hasil enkripsi telah disalin ke clipboard!");
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>Hasil = <small>Kuncimu adalah <?php echo htmlspecialchars($key); ?></small> </h2>
        
        
        
        <textarea id="result-text" class="result" rows="4" cols="50"><?php echo isset($result) ? $result : "SALAHHH"; ?></textarea>
        <button onclick="copyToClipboard()">Copy</button>
        
        
        <p><a href="index.html"><input type="submit" value="Kembali"></a></p>
        
    </div>
    <footer>Rangga Pasha Cucu Wibisono </footer>
</body>
</html>
