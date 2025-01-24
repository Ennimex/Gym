<?php
// Verifica si la sesión no está iniciada antes de llamarla
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Comprueba que el usuario sea un administrador
if (!isset($_SESSION['Usuario']) || $_SESSION['Rol'] !== 'administrador') {
    header("Location: /proyecto/index?clase=controladorlogin&metodo=login");
    exit();
}

$usuario = $_SESSION['Usuario'];

// Simulación de productos para ejemplo (puedes conectarlo con la base de datos)
$productos = [
    [
        'nombre' => 'Máquina de Remo',
        'cantidad' => 10,
        'precio' => '$15,000 MXN',
        'descripcion' => 'Máquina de remo profesional para ejercicios de cardio.',
        'categoria' => 'Maquinaria',
        'imagen' => 'remo.jpg',
    ],
    [
        'nombre' => 'Bicicleta Estática',
        'cantidad' => 8,
        'precio' => '$12,000 MXN',
        'descripcion' => 'Bicicleta estática ideal para entrenamiento cardiovascular.',
        'categoria' => 'Maquinaria',
        'imagen' => 'bicicleta estatica.jpg',
    ],
    [
        'nombre' => 'Caminadora Eléctrica',
        'cantidad' => 5,
        'precio' => '$18,500 MXN',
        'descripcion' => 'Caminadora con múltiples niveles de velocidad e inclinación.',
        'categoria' => 'Maquinaria',
        'imagen' => 'Caminadora Eléctrica.jpg',
    ],
    [
        'nombre' => 'Set de Mancuernas',
        'cantidad' => 20,
        'precio' => '$2,500 MXN',
        'descripcion' => 'Mancuernas ajustables para entrenamiento de fuerza.',
        'categoria' => 'Accesorios',
        'imagen' => 'set mancuerna.jpg',
    ],
    [
        'nombre' => 'Liga de Resistencia',
        'cantidad' => 100,
        'precio' => '$150 MXN',
        'descripcion' => 'Ligera, portátil y perfecta para ejercicios de estiramiento.',
        'categoria' => 'Accesorios',
        'imagen' => 'LIGASPORTADA.jpeg',
    ],
    [
        'nombre' => 'Tapete de Yoga',
        'cantidad' => 25,
        'precio' => '$500 MXN',
        'descripcion' => 'Tapete antideslizante para ejercicios y yoga.',
        'categoria' => 'Accesorios',
        'imagen' => 'Tapete de Yoga.jpg',
    ],
    [
        'nombre' => 'Camiseta Deportiva',
        'cantidad' => 50,
        'precio' => '$300 MXN',
        'descripcion' => 'Camiseta transpirable para entrenamiento.',
        'categoria' => 'Ropa',
        'imagen' => 'Camiseta Deportiva.jpg',
    ],
    [
        'nombre' => 'Pantalones Deportivos',
        'cantidad' => 40,
        'precio' => '$600 MXN',
        'descripcion' => 'Pantalones ligeros y cómodos para entrenamiento.',
        'categoria' => 'Ropa',
        'imagen' => 'Pantalones Deportivos.jpg',
    ],
    [
        'nombre' => 'Sudadera Deportiva',
        'cantidad' => 30,
        'precio' => '$800 MXN',
        'descripcion' => 'Sudadera con capucha ideal para exteriores.',
        'categoria' => 'Ropa',
        'imagen' => 'Sudadera Deportiva.jpg',
    ],
    [
        'nombre' => 'Guantes de Entrenamiento',
        'cantidad' => 15,
        'precio' => '$350 MXN',
        'descripcion' => 'Guantes acolchados para levantar pesas.',
        'categoria' => 'Accesorios',
        'imagen' => 'Guantes de Entrenamiento.jpg',
    ],
    [
        'nombre' => 'Balón Medicinal',
        'cantidad' => 10,
        'precio' => '$2,000 MXN',
        'descripcion' => 'Balón de entrenamiento funcional con agarre antideslizante.',
        'categoria' => 'Accesorios',
        'imagen' => 'Balón Medicinal.jpg',
    ],
    [
        'nombre' => 'Banco de Pesas',
        'cantidad' => 5,
        'precio' => '$6,500 MXN',
        'descripcion' => 'Banco ajustable para entrenamiento de fuerza.',
        'categoria' => 'Maquinaria',
        'imagen' => 'banco pesas.jpg',
    ],
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/proyecto/css/menuAdmi.css">
    <title>Panel Administrador</title>
</head>
<body>
<main>
    <!-- Productos en tarjetas -->
    <section class="product-cards">
        <h2>Productos</h2>
        <div class="product-grid">
            <?php foreach ($productos as $producto): ?>
                <div class="product-card">
                    <img src="img/imgMenuAdmi/<?php echo $producto['imagen']; ?>" alt="Imagen de <?php echo $producto['nombre']; ?>" class="product-image">
                    <h3><?php echo $producto['nombre']; ?></h3>
                    <p><strong>Cantidad:</strong> <?php echo $producto['cantidad']; ?></p>
                    <p><strong>Precio:</strong> <?php echo $producto['precio']; ?></p>
                    <p><strong>Descripción:</strong> <?php echo $producto['descripcion']; ?></p>
                    <p><strong>Categoría:</strong> <?php echo $producto['categoria']; ?></p>
                    <p><button class="edit-button">Editar</button></p>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</main>
</body>
</html>
