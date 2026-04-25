<!DOCTYPE html>
<html>
<head>
    <title>Test - Rayito Store</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: #f0f0f0;
        }
        .test {
            background: white;
            padding: 20px;
            margin: 10px 0;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .success { border-left: 4px solid green; }
        .error { border-left: 4px solid red; }
        h1 { color: #333; }
        a { color: #007bff; }
    </style>
</head>
<body>
    <h1>Test de Servidor - Rayito Store</h1>
    
    <div class="test success">
        <h3>✓ PHP funciona correctamente</h3>
        <p>Versión de PHP: <strong><?php echo phpversion(); ?></strong></p>
    </div>
    
    <div class="test success">
        <h3>✓ Links de Prueba</h3>
        <ul>
            <li><a href="/productos">Ver Juegos</a></li>
            <li><a href="/productos/the-witcher-3">The Witcher 3</a></li>
            <li><a href="/foro">Foro</a></li>
            <li><a href="/info/contacto">Contacto</a></li>
        </ul>
    </div>
    
    <div class="test">
        <h3>Información del Servidor</h3>
        <p>Document Root: <strong><?php echo $_SERVER['DOCUMENT_ROOT']; ?></strong></p>
        <p>Request URI: <strong><?php echo $_SERVER['REQUEST_URI']; ?></strong></p>
        <p>Server Software: <strong><?php echo $_SERVER['SERVER_SOFTWARE']; ?></strong></p>
    </div>
    
    <div class="test">
        <h3>Si los links no funcionan:</h3>
        <ol>
            <li>Abre Laragon</li>
            <li>Haz clic derecho > Apache > Restart</li>
            <li>Espera a que se reinicie completamente</li>
            <li>Recarga esta página</li>
        </ol>
    </div>
</body>
</html>
