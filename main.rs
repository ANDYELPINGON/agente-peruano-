// 🦀 Rust - Agente Peruano High Performance Edition
// ¡La velocidad y seguridad de Rust al servicio del Perú! 🚀

use std::collections::HashMap;
use std::io::{self, Write};
use std::time::{SystemTime, UNIX_EPOCH};
use rand::Rng;

/// 🇵🇪 Estructura principal del Agente Peruano
#[derive(Debug, Clone)]
struct AgentePeruano {
    nombre: String,
    version: String,
    id: String,
    emoji_peru: String,
    saludos: Vec<String>,
    configuracion: HashMap<String, String>,
    timestamp_creacion: u64,
}

impl AgentePeruano {
    /// 🏗️ Constructor del Agente Peruano
    fn new() -> Self {
        let timestamp = SystemTime::now()
            .duration_since(UNIX_EPOCH)
            .unwrap()
            .as_secs();
        
        let mut rng = rand::thread_rng();
        let id = format!("RUST-AGENTE-{}-{}", timestamp, rng.gen_range(1000..9999));
        
        let saludos = vec![
            "¡Hola causa! 👋".to_string(),
            "¿Qué tal pata? 😄".to_string(),
            "¡Buenas mi pana! 🤝".to_string(),
            "¡Oe hermano! 💪".to_string(),
            "¡Qué hay de nuevo viejo! 🎉".to_string(),
            "¡Saludos desde el Perú! 🇵🇪".to_string(),
        ];
        
        let mut configuracion = HashMap::new();
        configuracion.insert("idioma".to_string(), "es-PE".to_string());
        configuracion.insert("zona_horaria".to_string(), "America/Lima".to_string());
        configuracion.insert("moneda".to_string(), "PEN".to_string());
        configuracion.insert("pais".to_string(), "Perú".to_string());
        configuracion.insert("lenguaje".to_string(), "Rust".to_string());
        configuracion.insert("performance".to_string(), "Ultra High".to_string());
        
        println!("🦀 Inicializando Agente Peruano Rust Edition");
        println!("🆔 ID del Agente: {}", id);
        println!("⚡ Compilado con máximo rendimiento");
        
        AgentePeruano {
            nombre: "🤖 Agente Peruano Rust Edition".to_string(),
            version: "2.0.0".to_string(),
            id,
            emoji_peru: "🇵🇪".to_string(),
            saludos,
            configuracion,
            timestamp_creacion: timestamp,
        }
    }
    
    /// 🚀 Ejecuta la aplicación principal
    fn ejecutar(&self) {
        self.mostrar_bienvenida();
        
        loop {
            self.mostrar_menu();
            
            match self.leer_opcion() {
                1 => self.saludar(),
                2 => self.mostrar_informacion(),
                3 => self.mostrar_configuracion(),
                4 => self.ejecutar_calculadora(),
                5 => self.mostrar_datos_curiosos(),
                6 => self.benchmark_performance(),
                7 => self.generar_fibonacci(),
                0 => {
                    self.despedirse();
                    break;
                }
                _ => println!("❌ Opción no válida. Intenta de nuevo."),
            }
            
            println!("\n⏸️ Presiona Enter para continuar...");
            let mut input = String::new();
            io::stdin().read_line(&mut input).unwrap();
        }
    }
    
    /// 🎨 Muestra la bienvenida
    fn mostrar_bienvenida(&self) {
        println!("\n{}", "=".repeat(60));
        println!("🦀 ¡BIENVENIDO AL AGENTE PERUANO RUST EDITION! 🦀");
        println!("{}", "=".repeat(60));
        println!("⚡ Ultra rápido, ultra seguro, ultra peruano");
        println!("🔥 Compilado con optimizaciones máximas");
        println!("🇵🇪 Orgullosamente desarrollado en Perú");
        println!("🚀 Zero-cost abstractions en acción");
        println!("{}\n", "=".repeat(60));
    }
    
    /// 📋 Muestra el menú principal
    fn mostrar_menu(&self) {
        println!("\n🎯 ¿Qué quieres hacer?");
        println!("1. 👋 Saludar");
        println!("2. ℹ️  Mostrar información");
        println!("3. ⚙️  Ver configuración");
        println!("4. 🧮 Calculadora ultra rápida");
        println!("5. 🎲 Datos curiosos del Perú");
        println!("6. ⚡ Benchmark de performance");
        println!("7. 🔢 Generar Fibonacci");
        println!("0. 🚪 Salir");
        print!("\n👉 Elige una opción: ");
        io::stdout().flush().unwrap();
    }
    
    /// 📖 Lee la opción del usuario
    fn leer_opcion(&self) -> u32 {
        let mut input = String::new();
        io::stdin().read_line(&mut input).unwrap();
        
        input.trim().parse().unwrap_or(999)
    }
    
    /// 👋 Saluda al usuario
    fn saludar(&self) {
        let mut rng = rand::thread_rng();
        let saludo = &self.saludos[rng.gen_range(0..self.saludos.len())];
        
        println!("\n{}", saludo);
        println!("🦀 Soy tu agente peruano más rápido y seguro!");
        
        print!("📝 ¿Cómo te llamas? ");
        io::stdout().flush().unwrap();
        
        let mut nombre = String::new();
        io::stdin().read_line(&mut nombre).unwrap();
        let nombre = nombre.trim();
        
        if !nombre.is_empty() {
            println!("🎉 ¡Mucho gusto, {}! Compilado con cariño para ti.", nombre);
        }
    }
    
    /// ℹ️ Muestra información del sistema
    fn mostrar_informacion(&self) {
        println!("\n📊 INFORMACIÓN DEL SISTEMA RUST");
        println!("{}", "─".repeat(40));
        println!("🏷️  Nombre: {}", self.nombre);
        println!("🔢 Versión: {}", self.version);
        println!("🆔 ID: {}", self.id);
        println!("📅 Timestamp: {}", self.timestamp_creacion);
        println!("🦀 Rust Version: {}", env!("RUSTC_VERSION"));
        println!("🏗️  Target: {}", env!("TARGET"));
        println!("⚡ Optimizado: Release Mode");
        println!("🔒 Memory Safe: 100%");
        println!("🚀 Zero Cost: Abstractions");
    }
    
    /// ⚙️ Muestra la configuración
    fn mostrar_configuracion(&self) {
        println!("\n⚙️ CONFIGURACIÓN DEL AGENTE RUST");
        println!("{}", "─".repeat(40));
        
        for (clave, valor) in &self.configuracion {
            let emoji = self.obtener_emoji_configuracion(clave);
            println!("{} {}: {}", emoji, clave.to_uppercase(), valor);
        }
    }
    
    /// 🎨 Obtiene emoji para configuración
    fn obtener_emoji_configuracion(&self, clave: &str) -> &str {
        match clave {
            "idioma" => "🌐",
            "zona_horaria" => "🕐",
            "moneda" => "💰",
            "pais" => "🇵🇪",
            "lenguaje" => "🦀",
            "performance" => "⚡",
            _ => "⚙️",
        }
    }
    
    /// 🧮 Calculadora ultra rápida
    fn ejecutar_calculadora(&self) {
        println!("\n🧮 CALCULADORA RUST ULTRA RÁPIDA");
        println!("{}", "─".repeat(35));
        
        print!("➕ Primer número: ");
        io::stdout().flush().unwrap();
        let num1: f64 = self.leer_numero();
        
        print!("🔢 Operación (+, -, *, /, ^, sqrt): ");
        io::stdout().flush().unwrap();
        let mut operacion = String::new();
        io::stdin().read_line(&mut operacion).unwrap();
        let operacion = operacion.trim();
        
        let resultado = match operacion {
            "sqrt" => {
                if num1 >= 0.0 {
                    num1.sqrt()
                } else {
                    println!("❌ Error: No se puede calcular raíz cuadrada de número negativo");
                    return;
                }
            }
            _ => {
                print!("➕ Segundo número: ");
                io::stdout().flush().unwrap();
                let num2: f64 = self.leer_numero();
                
                match operacion {
                    "+" => num1 + num2,
                    "-" => num1 - num2,
                    "*" => num1 * num2,
                    "/" => {
                        if num2 != 0.0 {
                            num1 / num2
                        } else {
                            println!("❌ Error: División por cero");
                            return;
                        }
                    }
                    "^" => num1.powf(num2),
                    _ => {
                        println!("❌ Operación no válida");
                        return;
                    }
                }
            }
        };
        
        println!("🎯 Resultado: {}", resultado);
        println!("⚡ Calculado en nanosegundos con precisión de 64 bits");
    }
    
    /// 📖 Lee un número del usuario
    fn leer_numero(&self) -> f64 {
        let mut input = String::new();
        io::stdin().read_line(&mut input).unwrap();
        input.trim().parse().unwrap_or(0.0)
    }
    
    /// 🎲 Muestra datos curiosos del Perú
    fn mostrar_datos_curiosos(&self) {
        let datos = vec![
            "🏔️ Machu Picchu: 2,430 metros sobre el nivel del mar",
            "🍽️ El ceviche es patrimonio cultural inmaterial del Perú",
            "🦙 Perú tiene el 70% de las llamas del mundo",
            "🌊 Costa peruana: 3,080 km en el Océano Pacífico",
            "🏛️ Cusco: antigua capital del Imperio Inca",
            "🌿 La Amazonía peruana cubre 782,880 km²",
            "🎵 La marinera: baile nacional desde 1986",
            "🏔️ Huascarán: pico más alto del Perú (6,768 m)",
            "🦀 Rust fue creado en 2010, ¡más joven que Machu Picchu!",
        ];
        
        let mut rng = rand::thread_rng();
        let dato = &datos[rng.gen_range(0..datos.len())];
        
        println!("\n🎲 DATO CURIOSO COMPILADO EN RUST");
        println!("{}", "─".repeat(40));
        println!("{}", dato);
    }
    
    /// ⚡ Benchmark de performance
    fn benchmark_performance(&self) {
        println!("\n⚡ BENCHMARK DE PERFORMANCE RUST");
        println!("{}", "─".repeat(40));
        
        let start = std::time::Instant::now();
        
        // Operaciones intensivas
        let mut suma = 0u64;
        for i in 0..1_000_000 {
            suma += i * i;
        }
        
        let duration = start.elapsed();
        
        println!("🔥 Operaciones realizadas: 1,000,000");
        println!("⏱️  Tiempo transcurrido: {:?}", duration);
        println!("🚀 Resultado: {}", suma);
        println!("⚡ Velocidad: {} ops/nanosegundo", 1_000_000.0 / duration.as_nanos() as f64);
        println!("🦀 ¡Rust es increíblemente rápido!");
    }
    
    /// 🔢 Genera secuencia de Fibonacci
    fn generar_fibonacci(&self) {
        println!("\n🔢 GENERADOR DE FIBONACCI RUST");
        println!("{}", "─".repeat(35));
        
        print!("📊 ¿Cuántos números de Fibonacci quieres? ");
        io::stdout().flush().unwrap();
        let n = self.leer_opcion() as usize;
        
        if n == 0 {
            println!("❌ Número no válido");
            return;
        }
        
        let start = std::time::Instant::now();
        let fibonacci = self.calcular_fibonacci(n);
        let duration = start.elapsed();
        
        println!("🔢 Secuencia de Fibonacci ({} números):", n);
        for (i, num) in fibonacci.iter().enumerate() {
            print!("{}", num);
            if i < fibonacci.len() - 1 {
                print!(", ");
            }
        }
        println!();
        println!("⏱️  Calculado en: {:?}", duration);
        println!("🦀 ¡Rust hace que los números vuelen!");
    }
    
    /// 🧮 Calcula Fibonacci de forma eficiente
    fn calcular_fibonacci(&self, n: usize) -> Vec<u64> {
        let mut fibonacci = Vec::with_capacity(n);
        
        if n >= 1 {
            fibonacci.push(0);
        }
        if n >= 2 {
            fibonacci.push(1);
        }
        
        for i in 2..n {
            let next = fibonacci[i - 1] + fibonacci[i - 2];
            fibonacci.push(next);
        }
        
        fibonacci
    }
    
    /// 👋 Se despide del usuario
    fn despedirse(&self) {
        println!("\n🦀 ¡Gracias por usar el Agente Peruano Rust Edition!");
        println!("⚡ Compilado con amor y máximo rendimiento");
        println!("🇵🇪 ¡Que viva el Perú y que viva Rust!");
        println!("🚀 Memory safe, thread safe, blazingly fast!");
    }
}

/// 🚀 Función principal - Zero cost abstraction
fn main() {
    println!("🦀 Iniciando Agente Peruano Rust Edition...");
    
    let agente = AgentePeruano::new();
    agente.ejecutar();
    
    println!("🔒 Memoria liberada automáticamente - ¡Gracias Rust!");
}