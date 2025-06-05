// 🌐 JavaScript - Agente Peruano Web App
// ¡El poder de JavaScript al servicio del Perú! 🇵🇪

class AgentePeruano {
    constructor() {
        this.nombre = "🤖 Agente Peruano";
        this.version = "2.0.0";
        this.emoji = "🇵🇪";
        this.saludos = [
            "¡Hola causa! 👋",
            "¿Qué tal pata? 😄",
            "¡Buenas mi pana! 🤝",
            "¡Oe hermano! 💪"
        ];
        this.init();
    }

    init() {
        console.log(`${this.emoji} Iniciando ${this.nombre} v${this.version}`);
        this.crearInterfaz();
        this.configurarEventos();
    }

    crearInterfaz() {
        const app = document.createElement('div');
        app.className = 'agente-container';
        app.innerHTML = `
            <header class="header">
                <h1>${this.emoji} ${this.nombre}</h1>
                <p>🚀 La mejor aplicación web del Perú</p>
            </header>
            
            <main class="main-content">
                <div class="card">
                    <h2>🎯 Funcionalidades</h2>
                    <ul>
                        <li>📊 Dashboard interactivo</li>
                        <li>🔧 Herramientas útiles</li>
                        <li>🎨 Interfaz moderna</li>
                        <li>📱 Responsive design</li>
                    </ul>
                </div>
                
                <div class="card">
                    <h2>🌟 Acciones</h2>
                    <button id="saludar" class="btn-primary">👋 Saludar</button>
                    <button id="info" class="btn-secondary">ℹ️ Info</button>
                    <button id="random" class="btn-success">🎲 Sorpresa</button>
                </div>
                
                <div id="output" class="output"></div>
            </main>
            
            <footer class="footer">
                <p>💖 Hecho con amor desde Perú 🇵🇪</p>
            </footer>
        `;
        
        document.body.appendChild(app);
        this.aplicarEstilos();
    }

    configurarEventos() {
        document.getElementById('saludar').addEventListener('click', () => {
            this.saludar();
        });
        
        document.getElementById('info').addEventListener('click', () => {
            this.mostrarInfo();
        });
        
        document.getElementById('random').addEventListener('click', () => {
            this.sorpresa();
        });
    }

    saludar() {
        const saludo = this.saludos[Math.floor(Math.random() * this.saludos.length)];
        this.mostrarOutput(`${saludo} Soy tu agente peruano favorito! 🤖`);
    }

    mostrarInfo() {
        const info = `
            <h3>📋 Información del Sistema</h3>
            <p><strong>Nombre:</strong> ${this.nombre}</p>
            <p><strong>Versión:</strong> ${this.version}</p>
            <p><strong>Navegador:</strong> ${navigator.userAgent.split(' ')[0]}</p>
            <p><strong>Fecha:</strong> ${new Date().toLocaleDateString('es-PE')}</p>
            <p><strong>Hora:</strong> ${new Date().toLocaleTimeString('es-PE')}</p>
        `;
        this.mostrarOutput(info);
    }

    sorpresa() {
        const sorpresas = [
            "🎉 ¡Felicidades! Eres increíble",
            "🌟 Dato curioso: Machu Picchu tiene 2,430 metros de altura",
            "🍽️ ¿Sabías que el ceviche es patrimonio cultural del Perú?",
            "🎵 La marinera es nuestro baile nacional",
            "🏔️ Perú tiene 3 regiones: costa, sierra y selva",
            "🦙 Las llamas son originarias de los Andes peruanos"
        ];
        
        const sorpresa = sorpresas[Math.floor(Math.random() * sorpresas.length)];
        this.mostrarOutput(sorpresa);
    }

    mostrarOutput(contenido) {
        const output = document.getElementById('output');
        output.innerHTML = `
            <div class="message">
                ${contenido}
            </div>
        `;
        output.scrollIntoView({ behavior: 'smooth' });
    }

    aplicarEstilos() {
        const styles = `
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
                }
                
                .agente-container {
                    max-width: 1200px;
                    margin: 0 auto;
                    padding: 20px;
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
                
                .card ul {
                    list-style: none;
                    padding-left: 0;
                }
                
                .card li {
                    padding: 8px 0;
                    border-bottom: 1px solid #eee;
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
                
                .btn-secondary {
                    background: #95a5a6;
                    color: white;
                }
                
                .btn-success {
                    background: #2ecc71;
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
                }
                
                .message {
                    padding: 15px;
                    background: #f8f9fa;
                    border-left: 4px solid #3498db;
                    border-radius: 5px;
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
                    .agente-container {
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
        `;
        
        document.head.insertAdjacentHTML('beforeend', styles);
    }
}

// 🚀 Inicializar la aplicación cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', () => {
    new AgentePeruano();
});

// 🎯 Exportar para uso en módulos
if (typeof module !== 'undefined' && module.exports) {
    module.exports = AgentePeruano;
}