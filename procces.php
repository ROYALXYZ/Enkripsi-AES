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
<link rel="icon" href="https://www.pngmart.com/files/16/Vector-Key-PNG-Photos.png" type="">   <!-- Ini adalah tag yang menghubungkan ikon halaman (favicon) yang ditampilkan di tab browser.-->
    <title>AES Encryption/Decryption Result</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url(https://wallpapercave.com/wp/wp2763891.gif);
            background-size: cover;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column; /* Menyusun elemen secara vertikal */
            align-items: center;
            min-height: 100vh;
        }
        
        .container {
            background-image: url;
            border-radius: 10px;
            box-shadow: 0 0 65px rgb(0, 0, 0);
            padding: 20px;
            width: 500px;
            max-width: 1000%;
            margin-top: 7cm;
            
        }
        
        h2 {
            color: black    ;
            margin-bottom: 20px;
            color:white;
            margin-left:5.5cm;
            text-shadow: 4px 2px 7px rgb(0, 0, 0);
            
        }
        
        p {
            margin-bottom: 20px;
            font-size: 16px;
            line-height: 1.5;
            color:#08d2e5;
            overflow-wrap: break-word; /* Tambahkan ini untuk memastikan teks tidak keluar */
        }
        
        a {
            color: slategray;
            text-decoration: none;
            transition: color 0.3s ease-in-out;
            margin-left:10cm;
        }
        
        input[type="submit"] {
            background-color: #08d2e5;
            color: #fff;
            border: #085f67;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
            width: 18%;
            padding: 7px;
            border-radius: 15px;
            margin-top:5px;
            margin-left:20px;
            
        }
        
            input[type="submit"]:hover {
                background-color: #0d6c75;
                color:silver;
        
            } 
           
            p:hover{
                color:white;
            }
         
            img{
            width: 30px;
            height: 30px;
            position:absolute;
            bottom:0;
            top: 962px;
            margin-right: 161px;
            margin-top: px;
        }
            
        footer{
            position:absolute;
            bottom:0;
            width:50%;
            height:15px; 
            color: whitesmoke;
            text-align: center;
            font-size: xx-small;
            font-stretch: expanded;
            font-style: italic;
        }

    
    a:hover{
            color: #08d2e5;
    }

    </style>
</head>
<body>
    <div class="container">
        <h2>Result</h2>
        <footer>Rangga Pasha Cucu Wibisono</footer>
        <img src="naga rgb.gif" alt="">
        <p><?php echo isset($result) ? $result : "SALAHHH"; ?></p>
        <p><a href="index.html"></p>
        <input type="submit" value="Kembali"> 
    </div>
   
</body>
</html>