// 🔷 TypeScript - Agente Peruano Type-Safe Edition
// ¡El poder de TypeScript para aplicaciones robustas y tipadas! 🚀

interface ConfiguracionAgente {
    idioma: string;
    zonaHoraria: string;
    moneda: string;
    pais: string;
    tema: 'claro' | 'oscuro' | 'peruano';
    version: string;
}

interface DatoCurioso {
    id: number;
    titulo: string;
    descripcion: string;
    categoria: 'geografia' | 'cultura' | 'historia' | 'gastronomia';
    emoji: string;
}

interface ResultadoCalculadora {
    operacion: string;
    resultado: number;
    esValido: boolean;
    mensaje?: string;
}

type TipoSaludo = 'formal' | 'informal' | 'amigable' | 'entusiasta';

/**
 * 🇵🇪 Clase principal del Agente Peruano TypeScript Edition
 * Una implementación type-safe y moderna
 */
class AgentePeruano {
    private readonly nombre: string = '🤖 Agente Peruano TypeScript Edition';
    private readonly version: string = '2.0.0';
    private readonly emojiPeru: string = '🇵🇪';
    private readonly id: string;
    private readonly fechaCreacion: Date;
    
    private configuracion: ConfiguracionAgente;
    private saludos: Map<TipoSaludo, string[]>;
    private datosCuriosos: DatoCurioso[];
    private historialOperaciones: ResultadoCalculadora[] = [];

    constructor() {
        this.id = this.generarId();
        this.fechaCreacion = new Date();
        
        this.configuracion = {
            idioma: 'es-PE',
            zonaHoraria: 'America/Lima',
            moneda: 'PEN',
            pais: 'Perú',
            tema: 'peruano',
            version: this.version
        };
        
        this.inicializarSaludos();
        this.inicializarDatosCuriosos();
        
        console.log(`${this.emojiPeru} Inicializando ${this.nombre} v${this.version}`);
        console.log(`🆔 ID del Agente: ${this.id}`);
        console.log(`📅 Creado: ${this.fechaCreacion.toLocaleString('es-PE')}`);
        console.log(`🔷 TypeScript: Type-safe y moderno`);
    }

    /**
     * 🎲 Genera un ID único para el agente
     */
    private generarId(): string {
        const timestamp = Date.now();
        const random = Math.floor(Math.random() * 9000) + 1000;
        return `TS-AGENTE-${timestamp}-${random}`;
    }

    /**
     * 👋 Inicializa los diferentes tipos de saludos
     */
    private inicializarSaludos(): void {
        this.saludos = new Map([
            ['formal', [
                '¡Buenos días! 🌅',
                '¡Buenas tardes! ☀️',
                '¡Buenas noches! 🌙',
                'Es un placer saludarle 🤝'
            ]],
            ['informal', [
                '¡Hola causa! 👋',
                '¿Qué tal pata? 😄',
                '¡Oe hermano! 💪',
                '¡Hola pe! 🙋‍♂️'
            ]],
            ['amigable', [
                '¡Buenas mi pana! 🤝',
                '¿Cómo estás? 😊',
                '¡Qué gusto verte! 🎉',
                '¡Hola amigo! 👨‍💻'
            ]],
            ['entusiasta', [
                '¡Qué hay de nuevo viejo! 🎉',
                '¡Saludos desde el Perú! 🇵🇪',
                '¡Arriba Perú! 🚀',
                '¡Vamos con todo! 💪'
            ]]
        ]);
    }

    /**
     * 📚 Inicializa los datos curiosos del Perú
     */
    private inicializarDatosCuriosos(): void {
        this.datosCuriosos = [
            {
                id: 1,
                titulo: 'Machu Picchu',
                descripcion: 'Está ubicado a 2,430 metros sobre el nivel del mar',
                categoria: 'geografia',
                emoji: '🏔️'
            },
            {
                id: 2,
                titulo: 'Ceviche Peruano',
                descripcion: 'Es patrimonio cultural inmaterial del Perú desde 2004',
                categoria: 'gastronomia',
                emoji: '🍽️'
            },
            {
                id: 3,
                titulo: 'Llamas y Alpacas',
                descripcion: 'Perú tiene el 70% de la población mundial de llamas',
                categoria: 'geografia',
                emoji: '🦙'
            },
            {
                id: 4,
                titulo: 'Costa Peruana',
                descripcion: 'Tiene 3,080 kilómetros de longitud en el Océano Pacífico',
                categoria: 'geografia',
                emoji: '🌊'
            },
            {
                id: 5,
                titulo: 'Imperio Inca',
                descripcion: 'Cusco fue la capital del Tahuantinsuyo',
                categoria: 'historia',
                emoji: '🏛️'
            },
            {
                id: 6,
                titulo: 'Amazonía Peruana',
                descripcion: 'Cubre el 60% del territorio nacional',
                categoria: 'geografia',
                emoji: '🌿'
            },
            {
                id: 7,
                titulo: 'La Marinera',
                descripcion: 'Es el baile nacional del Perú desde 1986',
                categoria: 'cultura',
                emoji: '🎵'
            },
            {
                id: 8,
                titulo: 'TypeScript',
                descripcion: 'Fue creado por Microsoft en 2012, ¡más joven que muchas ruinas peruanas!',
                categoria: 'cultura',
                emoji: '🔷'
            }
        ];
    }

    /**
     * 🚀 Ejecuta la aplicación principal
     */
    public async ejecutar(): Promise<void> {
        this.mostrarBienvenida();
        
        let continuar = true;
        while (continuar) {
            this.mostrarMenu();
            const opcion = await this.leerOpcion();
            
            switch (opcion) {
                case 1:
                    await this.saludar();
                    break;
                case 2:
                    this.mostrarInformacion();
                    break;
                case 3:
                    this.mostrarConfiguracion();
                    break;
                case 4:
                    await this.ejecutarCalculadora();
                    break;
                case 5:
                    this.mostrarDatoCurioso();
                    break;
                case 6:
                    this.mostrarHistorialOperaciones();
                    break;
                case 7:
                    await this.jugarTrivia();
                    break;
                case 8:
                    this.mostrarEstadisticasTypeScript();
                    break;
                case 0:
                    continuar = false;
                    this.despedirse();
                    break;
                default:
                    console.log('❌ Opción no válida. Intenta de nuevo.');
            }
            
            if (continuar) {
                console.log('\n⏸️ Presiona Enter para continuar...');
                await this.esperarEnter();
            }
        }
    }

    /**
     * 🎨 Muestra la bienvenida
     */
    private mostrarBienvenida(): void {
        console.log('\n' + '='.repeat(65));
        console.log('🔷 ¡BIENVENIDO AL AGENTE PERUANO TYPESCRIPT EDITION! 🔷');
        console.log('='.repeat(65));
        console.log('⚡ Type-safe, moderno y 100% peruano');
        console.log('🛡️ Protegido por el sistema de tipos de TypeScript');
        console.log('🇵🇪 Desarrollado con orgullo nacional');
        console.log('🚀 Compilado a JavaScript de alta performance');
        console.log('='.repeat(65) + '\n');
    }

    /**
     * 📋 Muestra el menú principal
     */
    private mostrarMenu(): void {
        console.log('\n🎯 ¿Qué quieres hacer?');
        console.log('1. 👋 Saludar (con tipos de saludo)');
        console.log('2. ℹ️  Mostrar información del sistema');
        console.log('3. ⚙️  Ver configuración');
        console.log('4. 🧮 Calculadora type-safe');
        console.log('5. 🎲 Dato curioso del Perú');
        console.log('6. 📊 Historial de operaciones');
        console.log('7. 🎮 Trivia peruana');
        console.log('8. 🔷 Estadísticas TypeScript');
        console.log('0. 🚪 Salir');
        console.log('\n👉 Elige una opción: ');
    }

    /**
     * 📖 Lee la opción del usuario de forma asíncrona
     */
    private async leerOpcion(): Promise<number> {
        // Simulación de entrada asíncrona
        return new Promise((resolve) => {
            // En un entorno real, usarías readline o similar
            const opcion = Math.floor(Math.random() * 9); // Simulación
            setTimeout(() => resolve(opcion), 100);
        });
    }

    /**
     * ⏸️ Espera que el usuario presione Enter
     */
    private async esperarEnter(): Promise<void> {
        return new Promise((resolve) => {
            setTimeout(resolve, 1000); // Simulación
        });
    }

    /**
     * 👋 Saluda al usuario con diferentes tipos
     */
    private async saludar(): Promise<void> {
        console.log('\n🎭 TIPOS DE SALUDO DISPONIBLES:');
        console.log('1. 🎩 Formal');
        console.log('2. 😄 Informal');
        console.log('3. 🤝 Amigable');
        console.log('4. 🎉 Entusiasta');
        
        const tipoSaludo = await this.seleccionarTipoSaludo();
        const saludosDisponibles = this.saludos.get(tipoSaludo) || ['¡Hola! 👋'];
        const saludo = saludosDisponibles[Math.floor(Math.random() * saludosDisponibles.length)];
        
        console.log(`\n${saludo}`);
        console.log(`🔷 Saludo tipo: ${tipoSaludo.toUpperCase()}`);
        console.log('🤖 Soy tu agente peruano type-safe, listo para ayudarte!');
    }

    /**
     * 🎭 Selecciona el tipo de saludo
     */
    private async seleccionarTipoSaludo(): Promise<TipoSaludo> {
        const tipos: TipoSaludo[] = ['formal', 'informal', 'amigable', 'entusiasta'];
        const indice = Math.floor(Math.random() * tipos.length);
        return tipos[indice];
    }

    /**
     * ℹ️ Muestra información del sistema
     */
    private mostrarInformacion(): void {
        console.log('\n📊 INFORMACIÓN DEL SISTEMA TYPESCRIPT');
        console.log('─'.repeat(45));
        console.log(`🏷️  Nombre: ${this.nombre}`);
        console.log(`🔢 Versión: ${this.version}`);
        console.log(`🆔 ID: ${this.id}`);
        console.log(`📅 Creado: ${this.fechaCreacion.toLocaleString('es-PE')}`);
        console.log(`🔷 TypeScript: Compilado a JavaScript`);
        console.log(`🛡️ Type Safety: Activado`);
        console.log(`⚡ Performance: Optimizado`);
        console.log(`🎯 Target: ES2020`);
        console.log(`📦 Módulos: ES6`);
    }

    /**
     * ⚙️ Muestra la configuración
     */
    private mostrarConfiguracion(): void {
        console.log('\n⚙️ CONFIGURACIÓN DEL AGENTE TYPESCRIPT');
        console.log('─'.repeat(45));
        
        Object.entries(this.configuracion).forEach(([clave, valor]) => {
            const emoji = this.obtenerEmojiConfiguracion(clave);
            console.log(`${emoji} ${clave.toUpperCase()}: ${valor}`);
        });
    }

    /**
     * 🎨 Obtiene emoji para configuración
     */
    private obtenerEmojiConfiguracion(clave: string): string {
        const emojis: Record<string, string> = {
            idioma: '🌐',
            zonaHoraria: '🕐',
            moneda: '💰',
            pais: '🇵🇪',
            tema: '🎨',
            version: '🔢'
        };
        return emojis[clave] || '⚙️';
    }

    /**
     * 🧮 Calculadora type-safe
     */
    private async ejecutarCalculadora(): Promise<void> {
        console.log('\n🧮 CALCULADORA TYPESCRIPT TYPE-SAFE');
        console.log('─'.repeat(40));
        
        try {
            const num1 = await this.leerNumero('➕ Primer número: ');
            const operacion = await this.leerOperacion();
            
            let resultado: ResultadoCalculadora;
            
            if (operacion === 'sqrt') {
                resultado = this.calcularRaizCuadrada(num1);
            } else {
                const num2 = await this.leerNumero('➕ Segundo número: ');
                resultado = this.calcular(num1, operacion, num2);
            }
            
            this.mostrarResultado(resultado);
            this.historialOperaciones.push(resultado);
            
        } catch (error) {
            console.log(`❌ Error: ${error}`);
        }
    }

    /**
     * 📖 Lee un número del usuario
     */
    private async leerNumero(prompt: string): Promise<number> {
        console.log(prompt);
        // Simulación - en un entorno real usarías readline
        return Math.random() * 100;
    }

    /**
     * 🔢 Lee la operación del usuario
     */
    private async leerOperacion(): Promise<string> {
        const operaciones = ['+', '-', '*', '/', '^', 'sqrt'];
        return operaciones[Math.floor(Math.random() * operaciones.length)];
    }

    /**
     * 🧮 Realiza cálculos type-safe
     */
    private calcular(num1: number, operacion: string, num2: number): ResultadoCalculadora {
        let resultado: number;
        let esValido = true;
        let mensaje: string | undefined;

        switch (operacion) {
            case '+':
                resultado = num1 + num2;
                break;
            case '-':
                resultado = num1 - num2;
                break;
            case '*':
                resultado = num1 * num2;
                break;
            case '/':
                if (num2 === 0) {
                    esValido = false;
                    mensaje = 'No se puede dividir por cero';
                    resultado = 0;
                } else {
                    resultado = num1 / num2;
                }
                break;
            case '^':
                resultado = Math.pow(num1, num2);
                break;
            default:
                esValido = false;
                mensaje = 'Operación no válida';
                resultado = 0;
        }

        return {
            operacion: `${num1} ${operacion} ${num2}`,
            resultado,
            esValido,
            mensaje
        };
    }

    /**
     * √ Calcula raíz cuadrada
     */
    private calcularRaizCuadrada(num: number): ResultadoCalculadora {
        if (num < 0) {
            return {
                operacion: `√${num}`,
                resultado: 0,
                esValido: false,
                mensaje: 'No se puede calcular raíz cuadrada de número negativo'
            };
        }

        return {
            operacion: `√${num}`,
            resultado: Math.sqrt(num),
            esValido: true
        };
    }

    /**
     * 📊 Muestra el resultado de la calculadora
     */
    private mostrarResultado(resultado: ResultadoCalculadora): void {
        if (resultado.esValido) {
            console.log(`🎯 ${resultado.operacion} = ${resultado.resultado.toFixed(4)}`);
            console.log('🔷 Calculado con precisión TypeScript');
        } else {
            console.log(`❌ Error: ${resultado.mensaje}`);
        }
    }

    /**
     * 🎲 Muestra un dato curioso aleatorio
     */
    private mostrarDatoCurioso(): void {
        const dato = this.datosCuriosos[Math.floor(Math.random() * this.datosCuriosos.length)];
        
        console.log('\n🎲 DATO CURIOSO DEL PERÚ');
        console.log('─'.repeat(35));
        console.log(`${dato.emoji} ${dato.titulo}`);
        console.log(`📝 ${dato.descripcion}`);
        console.log(`🏷️ Categoría: ${dato.categoria.toUpperCase()}`);
        console.log(`🆔 ID: ${dato.id}`);
    }

    /**
     * 📊 Muestra el historial de operaciones
     */
    private mostrarHistorialOperaciones(): void {
        console.log('\n📊 HISTORIAL DE OPERACIONES');
        console.log('─'.repeat(35));
        
        if (this.historialOperaciones.length === 0) {
            console.log('📭 No hay operaciones en el historial');
            return;
        }

        this.historialOperaciones.forEach((op, index) => {
            const estado = op.esValido ? '✅' : '❌';
            console.log(`${index + 1}. ${estado} ${op.operacion} = ${op.resultado}`);
        });

        const operacionesValidas = this.historialOperaciones.filter(op => op.esValido).length;
        console.log(`\n📈 Total de operaciones: ${this.historialOperaciones.length}`);
        console.log(`✅ Operaciones válidas: ${operacionesValidas}`);
        console.log(`❌ Operaciones con error: ${this.historialOperaciones.length - operacionesValidas}`);
    }

    /**
     * 🎮 Juego de trivia peruana
     */
    private async jugarTrivia(): Promise<void> {
        console.log('\n🎮 TRIVIA PERUANA TYPESCRIPT');
        console.log('─'.repeat(35));
        
        const pregunta = this.datosCuriosos[Math.floor(Math.random() * this.datosCuriosos.length)];
        
        console.log(`❓ ¿Cuál es el dato curioso sobre: ${pregunta.titulo}?`);
        console.log('🤔 Piensa un momento...');
        
        await new Promise(resolve => setTimeout(resolve, 2000));
        
        console.log(`💡 Respuesta: ${pregunta.descripcion}`);
        console.log(`${pregunta.emoji} ¡Interesante, ¿verdad?`);
    }

    /**
     * 🔷 Muestra estadísticas de TypeScript
     */
    private mostrarEstadisticasTypeScript(): void {
        console.log('\n🔷 ESTADÍSTICAS TYPESCRIPT');
        console.log('─'.repeat(35));
        console.log('📅 Creado: 2012 por Microsoft');
        console.log('🎯 Superset de JavaScript');
        console.log('🛡️ Sistema de tipos estático');
        console.log('⚡ Compilado a JavaScript');
        console.log('📦 NPM packages: 1M+ con tipos');
        console.log('🌟 GitHub stars: 90K+');
        console.log('🏢 Usado por: Microsoft, Google, Airbnb');
        console.log('🔷 Versión actual: 5.x');
        console.log('🇵🇪 ¡Y ahora también en Perú!');
    }

    /**
     * 👋 Se despide del usuario
     */
    private despedirse(): void {
        console.log('\n🔷 ¡Gracias por usar el Agente Peruano TypeScript Edition!');
        console.log('🛡️ Type-safe hasta el final');
        console.log('🇵🇪 ¡Que viva el Perú y que viva TypeScript!');
        console.log('⚡ Compilado con amor y tipos seguros');
        console.log('🚀 ¡Hasta la próxima, causa!');
    }
}

// 🚀 Función principal para ejecutar el agente
async function main(): Promise<void> {
    try {
        console.log('🔷 Iniciando Agente Peruano TypeScript Edition...');
        
        const agente = new AgentePeruano();
        await agente.ejecutar();
        
        console.log('✅ Aplicación finalizada correctamente');
    } catch (error) {
        console.error('❌ Error inesperado:', error);
    }
}

// 🎯 Exportar para uso en módulos
export { AgentePeruano, type ConfiguracionAgente, type DatoCurioso, type ResultadoCalculadora };

// 🚀 Ejecutar si es el módulo principal
if (require.main === module) {
    main();
}