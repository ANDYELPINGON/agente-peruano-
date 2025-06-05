<?php
// 🐘 PHP - Agente Peruano Web Edition
// ¡El poder de PHP para aplicaciones web dinámicas! 🚀

declare(strict_types=1);

/**
 * 🇵🇪 Clase AgentePeruano - PHP Edition
 * Una aplicación web moderna y dinámica
 * 
 * @author El Pingón
 * @version 2.0.0
 * @since 2024
 */
class AgentePeruano {
    
    // 🎯 Propiedades de la clase
    private string $nombre;
    private string $version;
    private string $id;
    private string $emojiPeru;
    private DateTime $fechaCreacion;
    private array $configuracion;
    private array $saludos;
    private array $datosCuriosos;
    private array $historialOperaciones;
    private int $contadorVisitas;
    
    /**
     * 🏗️ Constructor del Agente Peruano
     */
    public function __construct() {
        $this->nombre = '🤖 Agente Peruano PHP Edition';
        $this->version = '2.0.0';
        $this->emojiPeru = '🇵🇪';
        $this->id = $this->generarId();
        $this->fechaCreacion = new DateTime();
        $this->contadorVisitas = 0;
        $this->historialOperaciones = [];
        
        $this->inicializarConfiguracion();
        $this->inicializarSaludos();
        $this->inicializarDatosCuriosos();
        
        $this->log("Inicializando {$this->nombre} v{$this->version}");
        $this->log("🆔 ID del Agente: {$this->id}");
        $this->log("📅 Creado: " . $this->fechaCreacion->format('d/m/Y H:i:s'));
    }
    
    /**
     * 🎲 Genera un ID único para el agente
     */
    private function generarId(): string {
        return 'PHP-AGENTE-' . time() . '-' . rand(1000, 9999);
    }
    
    /**
     * ⚙️ Inicializa la configuración
     */
    private function inicializarConfiguracion(): void {
        $this->configuracion = [
            'idioma' => 'es-PE',
            'zona_horaria' => 'America/Lima',
            'moneda' => 'PEN',
            'pais' => 'Perú',
            'lenguaje' => 'PHP',
            'servidor' => $_SERVER['SERVER_SOFTWARE'] ?? 'Desconocido',
            'php_version' => PHP_VERSION
        ];
    }
    
    /**
     * 👋 Inicializa los saludos peruanos
     */
    private function inicializarSaludos(): void {
        $this->saludos = [
            'casual' => [
                '¡Hola causa! 👋',
                '¿Qué tal pata? 😄',
                '¡Oe hermano! 💪',
                '¡Hola pe! 🙋‍♂️'
            ],
            'formal' => [
                '¡Buenos días! 🌅',
                '¡Buenas tardes! ☀️',
                '¡Buenas noches! 🌙',
                'Es un placer saludarle 🤝'
            ],
            'web' => [
                '¡Bienvenido a la web! 🌐',
                '¡Conectado desde Perú! 🇵🇪',
                '¡PHP en acción! 🐘',
                '¡Servidor activo! 🚀'
            ]
        ];
    }
    
    /**
     * 📚 Inicializa los datos curiosos del Perú
     */
    private function inicializarDatosCuriosos(): void {
        $this->datosCuriosos = [
            [
                'id' => 1,
                'titulo' => 'Machu Picchu',
                'descripcion' => 'Está ubicado a 2,430 metros sobre el nivel del mar',
                'categoria' => 'geografia',
                'emoji' => '🏔️',
                'popularidad' => 10
            ],
            [
                'id' => 2,
                'titulo' => 'Ceviche Peruano',
                'descripcion' => 'Es patrimonio cultural inmaterial del Perú desde 2004',
                'categoria' => 'gastronomia',
                'emoji' => '🍽️',
                'popularidad' => 9
            ],
            [
                'id' => 3,
                'titulo' => 'Llamas y Alpacas',
                'descripcion' => 'Perú tiene el 70% de la población mundial de llamas',
                'categoria' => 'fauna',
                'emoji' => '🦙',
                'popularidad' => 8
            ],
            [
                'id' => 4,
                'titulo' => 'Costa Peruana',
                'descripcion' => 'Tiene 3,080 kilómetros de longitud en el Océano Pacífico',
                'categoria' => 'geografia',
                'emoji' => '🌊',
                'popularidad' => 7
            ],
            [
                'id' => 5,
                'titulo' => 'Imperio Inca',
                'descripcion' => 'Cusco fue la capital del Tahuantinsuyo',
                'categoria' => 'historia',
                'emoji' => '🏛️',
                'popularidad' => 10
            ],
            [
                'id' => 6,
                'titulo' => 'Amazonía Peruana',
                'descripcion' => 'Cubre el 60% del territorio nacional',
                'categoria' => 'geografia',
                'emoji' => '🌿',
                'popularidad' => 9
            ],
            [
                'id' => 7,
                'titulo' => 'PHP Language',
                'descripcion' => 'Creado en 1995, potencia el 78% de la web mundial',
                'categoria' => 'tecnologia',
                'emoji' => '🐘',
                'popularidad' => 8
            ]
        ];
    }
    
    /**
     * 🚀 Ejecuta la aplicación web
     */
    public function ejecutar(): void {
        $this->contadorVisitas++;
        
        // 🌐 Detectar si es una petición AJAX
        $esAjax = !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && 
                  strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
        
        if ($esAjax) {
            $this->manejarPeticionAjax();
        } else {
            $this->mostrarInterfazWeb();
        }
    }
    
    /**
     * 🌐 Muestra la interfaz web principal
     */
    private function mostrarInterfazWeb(): void {
        ?>
        <!DOCTYPE html>
        <html lang="es-PE">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?= htmlspecialchars($this->nombre) ?></title>
            <style>
                * {
                    margin: 0;
                    padding: 0;
                    box-sizing: border-box;
                }
                
                body {
                    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                    min-height: 100vh;
                    color: #333;
                    padding: 20px;
                }
                
                .container {
                    max-width: 1200px;
                    margin: 0 auto;
                }
                
                .header {
                    text-align: center;
                    background: rgba(255, 255, 255, 0.95);
                    padding: 30px;
                    border-radius: 15px;
                    margin-bottom: 30px;
                    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
                }
                
                .header h1 {
                    font-size: 2.5em;
                    margin-bottom: 10px;
                    color: #2c3e50;
                }
                
                .stats {
                    display: grid;
                    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                    gap: 20px;
                    margin-bottom: 30px;
                }
                
                .stat-card {
                    background: rgba(255, 255, 255, 0.95);
                    padding: 20px;
                    border-radius: 10px;
                    text-align: center;
                    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
                }
                
                .main-content {
                    display: grid;
                    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                    gap: 20px;
                    margin-bottom: 30px;
                }
                
                .card {
                    background: rgba(255, 255, 255, 0.95);
                    padding: 25px;
                    border-radius: 15px;
                    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
                    transition: transform 0.3s ease;
                }
                
                .card:hover {
                    transform: translateY(-5px);
                }
                
                .card h2 {
                    margin-bottom: 15px;
                    color: #2c3e50;
                }
                
                button {
                    padding: 12px 24px;
                    margin: 8px;
                    border: none;
                    border-radius: 8px;
                    font-size: 16px;
                    cursor: pointer;
                    transition: all 0.3s ease;
                    font-weight: bold;
                }
                
                .btn-primary {
                    background: #3498db;
                    color: white;
                }
                
                .btn-success {
                    background: #2ecc71;
                    color: white;
                }
                
                .btn-warning {
                    background: #f39c12;
                    color: white;
                }
                
                .btn-info {
                    background: #17a2b8;
                    color: white;
                }
                
                button:hover {
                    transform: translateY(-2px);
                    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
                }
                
                .output {
                    background: rgba(255, 255, 255, 0.95);
                    padding: 20px;
                    border-radius: 15px;
                    margin-top: 20px;
                    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
                    min-height: 100px;
                }
                
                .loading {
                    text-align: center;
                    padding: 20px;
                }
                
                .spinner {
                    border: 4px solid #f3f3f3;
                    border-top: 4px solid #3498db;
                    border-radius: 50%;
                    width: 40px;
                    height: 40px;
                    animation: spin 1s linear infinite;
                    margin: 0 auto;
                }
                
                @keyframes spin {
                    0% { transform: rotate(0deg); }
                    100% { transform: rotate(360deg); }
                }
                
                .footer {
                    text-align: center;
                    background: rgba(255, 255, 255, 0.95);
                    padding: 20px;
                    border-radius: 15px;
                    margin-top: 30px;
                    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
                }
                
                @media (max-width: 768px) {
                    .container {
                        padding: 10px;
                    }
                    
                    .header h1 {
                        font-size: 2em;
                    }
                    
                    .main-content {
                        grid-template-columns: 1fr;
                    }
                }
            </style>
        </head>
        <body>
            <div class="container">
                <header class="header">
                    <h1><?= $this->emojiPeru ?> <?= htmlspecialchars($this->nombre) ?></h1>
                    <p>🐘 La potencia de PHP al servicio del Perú</p>
                    <p>📅 Creado: <?= $this->fechaCreacion->format('d/m/Y H:i:s') ?></p>
                </header>
                
                <div class="stats">
                    <div class="stat-card">
                        <h3>👥 Visitas</h3>
                        <p style="font-size: 2em; color: #3498db;"><?= $this->contadorVisitas ?></p>
                    </div>
                    <div class="stat-card">
                        <h3>🐘 PHP Version</h3>
                        <p style="font-size: 1.5em; color: #2ecc71;"><?= PHP_VERSION ?></p>
                    </div>
                    <div class="stat-card">
                        <h3>🌐 Servidor</h3>
                        <p style="font-size: 1.2em; color: #f39c12;"><?= htmlspecialchars($_SERVER['SERVER_SOFTWARE'] ?? 'Desconocido') ?></p>
                    </div>
                    <div class="stat-card">
                        <h3>🆔 ID Agente</h3>
                        <p style="font-size: 1em; color: #9b59b6;"><?= htmlspecialchars($this->id) ?></p>
                    </div>
                </div>
                
                <main class="main-content">
                    <div class="card">
                        <h2>👋 Saludos Peruanos</h2>
                        <p>Diferentes estilos de saludo para cada ocasión</p>
                        <button class="btn-primary" onclick="ejecutarAccion('saludar', 'casual')">😄 Casual</button>
                        <button class="btn-success" onclick="ejecutarAccion('saludar', 'formal')">🎩 Formal</button>
                        <button class="btn-info" onclick="ejecutarAccion('saludar', 'web')">🌐 Web</button>
                    </div>
                    
                    <div class="card">
                        <h2>🧮 Calculadora PHP</h2>
                        <p>Operaciones matemáticas dinámicas</p>
                        <input type="number" id="num1" placeholder="Primer número" style="margin: 5px; padding: 8px; border-radius: 5px; border: 1px solid #ddd;">
                        <select id="operacion" style="margin: 5px; padding: 8px; border-radius: 5px; border: 1px solid #ddd;">
                            <option value="+">➕ Suma</option>
                            <option value="-">➖ Resta</option>
                            <option value="*">✖️ Multiplicación</option>
                            <option value="/">➗ División</option>
                            <option value="**">🔢 Potencia</option>
                            <option value="sqrt">√ Raíz Cuadrada</option>
                        </select>
                        <input type="number" id="num2" placeholder="Segundo número" style="margin: 5px; padding: 8px; border-radius: 5px; border: 1px solid #ddd;">
                        <br>
                        <button class="btn-warning" onclick="calcular()">🧮 Calcular</button>
                    </div>
                    
                    <div class="card">
                        <h2>🎲 Datos Curiosos</h2>
                        <p>Descubre información fascinante del Perú</p>
                        <button class="btn-primary" onclick="ejecutarAccion('dato_curioso', 'aleatorio')">🎲 Aleatorio</button>
                        <button class="btn-success" onclick="ejecutarAccion('dato_curioso', 'geografia')">🏔️ Geografía</button>
                        <button class="btn-info" onclick="ejecutarAccion('dato_curioso', 'cultura')">🎭 Cultura</button>
                        <button class="btn-warning" onclick="ejecutarAccion('dato_curioso', 'tecnologia')">💻 Tecnología</button>
                    </div>
                    
                    <div class="card">
                        <h2>📊 Información del Sistema</h2>
                        <p>Detalles técnicos del servidor</p>
                        <button class="btn-primary" onclick="ejecutarAccion('info_sistema')">ℹ️ Ver Info</button>
                        <button class="btn-success" onclick="ejecutarAccion('configuracion')">⚙️ Configuración</button>
                        <button class="btn-info" onclick="ejecutarAccion('estadisticas_php')">🐘 Stats PHP</button>
                    </div>
                </main>
                
                <div id="output" class="output">
                    <h3>📺 Salida del Sistema</h3>
                    <p>Aquí aparecerán los resultados de tus acciones...</p>
                </div>
                
                <footer class="footer">
                    <p>💖 Desarrollado con PHP y amor desde Perú <?= $this->emojiPeru ?></p>
                    <p>🐘 Potenciado por PHP <?= PHP_VERSION ?></p>
                </footer>
            </div>
            
            <script>
                function ejecutarAccion(accion, parametro = '') {
                    mostrarCargando();
                    
                    const formData = new FormData();
                    formData.append('accion', accion);
                    if (parametro) {
                        formData.append('parametro', parametro);
                    }
                    
                    fetch('<?= $_SERVER['PHP_SELF'] ?>', {
                        method: 'POST',
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        mostrarResultado(data);
                    })
                    .catch(error => {
                        mostrarError('Error: ' + error.message);
                    });
                }
                
                function calcular() {
                    const num1 = document.getElementById('num1').value;
                    const operacion = document.getElementById('operacion').value;
                    const num2 = document.getElementById('num2').value;
                    
                    if (!num1 || (operacion !== 'sqrt' && !num2)) {
                        mostrarError('❌ Por favor, completa todos los campos necesarios');
                        return;
                    }
                    
                    mostrarCargando();
                    
                    const formData = new FormData();
                    formData.append('accion', 'calcular');
                    formData.append('num1', num1);
                    formData.append('operacion', operacion);
                    formData.append('num2', num2);
                    
                    fetch('<?= $_SERVER['PHP_SELF'] ?>', {
                        method: 'POST',
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        mostrarResultado(data);
                    })
                    .catch(error => {
                        mostrarError('Error: ' + error.message);
                    });
                }
                
                function mostrarCargando() {
                    document.getElementById('output').innerHTML = `
                        <div class="loading">
                            <div class="spinner"></div>
                            <p>🐘 PHP procesando...</p>
                        </div>
                    `;
                }
                
                function mostrarResultado(data) {
                    document.getElementById('output').innerHTML = `
                        <h3>✅ Resultado</h3>
                        <div style="background: #f8f9fa; padding: 15px; border-radius: 8px; border-left: 4px solid #28a745;">
                            ${data.mensaje}
                        </div>
                        <small style="color: #666;">⏰ ${new Date().toLocaleString('es-PE')}</small>
                    `;
                }
                
                function mostrarError(mensaje) {
                    document.getElementById('output').innerHTML = `
                        <h3>❌ Error</h3>
                        <div style="background: #f8d7da; padding: 15px; border-radius: 8px; border-left: 4px solid #dc3545;">
                            ${mensaje}
                        </div>
                    `;
                }
                
                // 🚀 Cargar dato curioso inicial
                window.onload = function() {
                    ejecutarAccion('dato_curioso', 'aleatorio');
                };
            </script>
        </body>
        </html>
        <?php
    }
    
    /**
     * 🔄 Maneja peticiones AJAX
     */
    private function manejarPeticionAjax(): void {
        header('Content-Type: application/json');
        
        $accion = $_POST['accion'] ?? '';
        $parametro = $_POST['parametro'] ?? '';
        
        try {
            switch ($accion) {
                case 'saludar':
                    $resultado = $this->saludar($parametro);
                    break;
                case 'dato_curioso':
                    $resultado = $this->obtenerDatoCurioso($parametro);
                    break;
                case 'calcular':
                    $resultado = $this->calcular();
                    break;
                case 'info_sistema':
                    $resultado = $this->obtenerInfoSistema();
                    break;
                case 'configuracion':
                    $resultado = $this->obtenerConfiguracion();
                    break;
                case 'estadisticas_php':
                    $resultado = $this->obtenerEstadisticasPHP();
                    break;
                default:
                    $resultado = '❌ Acción no reconocida';
            }
            
            echo json_encode(['mensaje' => $resultado]);
            
        } catch (Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    }
    
    /**
     * 👋 Genera un saludo personalizado
     */
    private function saludar(string $tipo = 'casual'): string {
        $tiposValidos = ['casual', 'formal', 'web'];
        $tipoSaludo = in_array($tipo, $tiposValidos) ? $tipo : 'casual';
        
        $saludos = $this->saludos[$tipoSaludo];
        $saludo = $saludos[array_rand($saludos)];
        
        $info = [
            '🎭 Tipo de saludo: ' . strtoupper($tipoSaludo),
            '🤖 Mensaje: ' . $saludo,
            '🐘 Generado con PHP dinámicamente',
            '🌐 IP del cliente: ' . ($_SERVER['REMOTE_ADDR'] ?? 'Desconocida'),
            '⏰ Hora del servidor: ' . date('H:i:s')
        ];
        
        return implode('<br>', $info);
    }
    
    /**
     * 🎲 Obtiene un dato curioso
     */
    private function obtenerDatoCurioso(string $categoria = 'aleatorio'): string {
        if ($categoria === 'aleatorio') {
            $dato = $this->datosCuriosos[array_rand($this->datosCuriosos)];
        } else {
            $datosFiltrados = array_filter($this->datosCuriosos, function($d) use ($categoria) {
                return $d['categoria'] === $categoria;
            });
            
            if (empty($datosFiltrados)) {
                $dato = $this->datosCuriosos[array_rand($this->datosCuriosos)];
            } else {
                $dato = $datosFiltrados[array_rand($datosFiltrados)];
            }
        }
        
        return sprintf(
            '<h4>%s %s</h4><p><strong>📝 Descripción:</strong> %s</p><p><strong>🏷️ Categoría:</strong> %s</p><p><strong>⭐ Popularidad:</strong> %d/10</p><p><strong>🆔 ID:</strong> %d</p>',
            $dato['emoji'],
            $dato['titulo'],
            $dato['descripcion'],
            ucfirst($dato['categoria']),
            $dato['popularidad'],
            $dato['id']
        );
    }
    
    /**
     * 🧮 Realiza cálculos matemáticos
     */
    private function calcular(): string {
        $num1 = floatval($_POST['num1'] ?? 0);
        $operacion = $_POST['operacion'] ?? '+';
        $num2 = floatval($_POST['num2'] ?? 0);
        
        try {
            switch ($operacion) {
                case '+':
                    $resultado = $num1 + $num2;
                    $operacionStr = "{$num1} + {$num2}";
                    break;
                case '-':
                    $resultado = $num1 - $num2;
                    $operacionStr = "{$num1} - {$num2}";
                    break;
                case '*':
                    $resultado = $num1 * $num2;
                    $operacionStr = "{$num1} × {$num2}";
                    break;
                case '/':
                    if ($num2 == 0) {
                        throw new Exception('No se puede dividir por cero');
                    }
                    $resultado = $num1 / $num2;
                    $operacionStr = "{$num1} ÷ {$num2}";
                    break;
                case '**':
                    $resultado = pow($num1, $num2);
                    $operacionStr = "{$num1}^{$num2}";
                    break;
                case 'sqrt':
                    if ($num1 < 0) {
                        throw new Exception('No se puede calcular raíz cuadrada de número negativo');
                    }
                    $resultado = sqrt($num1);
                    $operacionStr = "√{$num1}";
                    break;
                default:
                    throw new Exception('Operación no válida');
            }
            
            // 📊 Guardar en historial
            $this->historialOperaciones[] = [
                'operacion' => $operacionStr,
                'resultado' => $resultado,
                'timestamp' => new DateTime(),
                'ip' => $_SERVER['REMOTE_ADDR'] ?? 'Desconocida'
            ];
            
            return sprintf(
                '<h4>🧮 Resultado de la Calculadora PHP</h4><p><strong>🎯 %s = %.4f</strong></p><p>🐘 Calculado con PHP %s</p><p>📊 Operaciones realizadas: %d</p>',
                $operacionStr,
                $resultado,
                PHP_VERSION,
                count($this->historialOperaciones)
            );
            
        } catch (Exception $e) {
            return '❌ Error: ' . $e->getMessage();
        }
    }
    
    /**
     * ℹ️ Obtiene información del sistema
     */
    private function obtenerInfoSistema(): string {
        $info = [
            '🏷️ <strong>Nombre:</strong> ' . $this->nombre,
            '🔢 <strong>Versión:</strong> ' . $this->version,
            '🆔 <strong>ID:</strong> ' . $this->id,
            '📅 <strong>Creado:</strong> ' . $this->fechaCreacion->format('d/m/Y H:i:s'),
            '🐘 <strong>PHP Version:</strong> ' . PHP_VERSION,
            '🌐 <strong>Servidor:</strong> ' . ($_SERVER['SERVER_SOFTWARE'] ?? 'Desconocido'),
            '💻 <strong>OS:</strong> ' . PHP_OS,
            '🔧 <strong>SAPI:</strong> ' . PHP_SAPI,
            '📊 <strong>Memoria usada:</strong> ' . $this->formatearBytes(memory_get_usage(true)),
            '⏰ <strong>Tiempo de ejecución:</strong> ' . round(microtime(true) - $_SERVER['REQUEST_TIME_FLOAT'], 4) . 's'
        ];
        
        return implode('<br>', $info);
    }
    
    /**
     * ⚙️ Obtiene la configuración
     */
    private function obtenerConfiguracion(): string {
        $emojis = [
            'idioma' => '🌐',
            'zona_horaria' => '🕐',
            'moneda' => '💰',
            'pais' => '🇵🇪',
            'lenguaje' => '🐘',
            'servidor' => '🖥️',
            'php_version' => '🔢'
        ];
        
        $config = [];
        foreach ($this->configuracion as $clave => $valor) {
            $emoji = $emojis[$clave] ?? '⚙️';
            $config[] = "{$emoji} <strong>" . strtoupper($clave) . ":</strong> {$valor}";
        }
        
        return implode('<br>', $config);
    }
    
    /**
     * 🐘 Obtiene estadísticas de PHP
     */
    private function obtenerEstadisticasPHP(): string {
        $stats = [
            '📅 <strong>Creado:</strong> 1995 por Rasmus Lerdorf',
            '🌐 <strong>Uso web:</strong> 78% de sitios web',
            '🔢 <strong>Versión actual:</strong> ' . PHP_VERSION,
            '⚡ <strong>Performance:</strong> Optimizado para web',
            '🏢 <strong>Usado por:</strong> Facebook, Wikipedia, WordPress',
            '📦 <strong>Extensiones:</strong> ' . count(get_loaded_extensions()) . ' cargadas',
            '💾 <strong>Límite memoria:</strong> ' . ini_get('memory_limit'),
            '⏱️ <strong>Tiempo máximo:</strong> ' . ini_get('max_execution_time') . 's',
            '📁 <strong>Upload máximo:</strong> ' . ini_get('upload_max_filesize'),
            '🇵🇪 <strong>¡Y ahora también en Perú!</strong>'
        ];
        
        return implode('<br>', $stats);
    }
    
    /**
     * 📊 Formatea bytes a formato legible
     */
    private function formatearBytes(int $bytes): string {
        $units = ['B', 'KB', 'MB', 'GB'];
        $factor = floor((strlen($bytes) - 1) / 3);
        return sprintf("%.2f %s", $bytes / pow(1024, $factor), $units[$factor]);
    }
    
    /**
     * 📝 Función de logging
     */
    private function log(string $mensaje): void {
        error_log("[AgentePeruano] {$mensaje}");
    }
    
    /**
     * 👋 Destructor elegante
     */
    public function __destruct() {
        $this->log("Agente Peruano PHP finalizado. Visitas: {$this->contadorVisitas}");
    }
}

// 🚀 Inicializar y ejecutar la aplicación
try {
    $agente = new AgentePeruano();
    $agente->ejecutar();
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Error del servidor: ' . $e->getMessage()]);
} catch (Error $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Error fatal: ' . $e->getMessage()]);
}
?>