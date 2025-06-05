// ☕ Java - Agente Peruano Enterprise Edition
// ¡El poder de Java para aplicaciones robustas! 🚀

import java.util.*;
import java.time.LocalDateTime;
import java.time.format.DateTimeFormatter;
import java.util.concurrent.ThreadLocalRandom;

/**
 * 🇵🇪 Agente Peruano - Clase principal
 * Una aplicación Java moderna y robusta
 * 
 * @author El Pingón
 * @version 2.0.0
 * @since 2024
 */
public class AgentePeruano {
    
    // 🎯 Constantes de la aplicación
    private static final String NOMBRE = "🤖 Agente Peruano Java Edition";
    private static final String VERSION = "2.0.0";
    private static final String EMOJI_PERU = "🇵🇪";
    
    // 📊 Propiedades del agente
    private String id;
    private LocalDateTime fechaCreacion;
    private List<String> saludos;
    private Map<String, String> configuracion;
    private Scanner scanner;
    
    /**
     * 🏗️ Constructor del Agente Peruano
     */
    public AgentePeruano() {
        this.id = generarId();
        this.fechaCreacion = LocalDateTime.now();
        this.scanner = new Scanner(System.in);
        this.configuracion = new HashMap<>();
        
        inicializarSaludos();
        configurarSistema();
        
        System.out.println(EMOJI_PERU + " Inicializando " + NOMBRE + " v" + VERSION);
        System.out.println("🆔 ID del Agente: " + this.id);
        System.out.println("⏰ Creado: " + fechaCreacion.format(DateTimeFormatter.ofPattern("dd/MM/yyyy HH:mm:ss")));
    }
    
    /**
     * 🎲 Genera un ID único para el agente
     */
    private String generarId() {
        return "AGENTE-" + System.currentTimeMillis() + "-" + ThreadLocalRandom.current().nextInt(1000, 9999);
    }
    
    /**
     * 👋 Inicializa los saludos peruanos
     */
    private void inicializarSaludos() {
        this.saludos = Arrays.asList(
            "¡Hola causa! 👋",
            "¿Qué tal pata? 😄",
            "¡Buenas mi pana! 🤝",
            "¡Oe hermano! 💪",
            "¡Qué hay de nuevo viejo! 🎉",
            "¡Saludos desde el Perú! 🇵🇪"
        );
    }
    
    /**
     * ⚙️ Configura el sistema
     */
    private void configurarSistema() {
        configuracion.put("idioma", "es-PE");
        configuracion.put("zona_horaria", "America/Lima");
        configuracion.put("moneda", "PEN");
        configuracion.put("pais", "Perú");
        configuracion.put("tema", "moderno");
    }
    
    /**
     * 🚀 Método principal de ejecución
     */
    public void ejecutar() {
        mostrarBienvenida();
        
        boolean continuar = true;
        while (continuar) {
            mostrarMenu();
            int opcion = leerOpcion();
            
            switch (opcion) {
                case 1:
                    saludar();
                    break;
                case 2:
                    mostrarInformacion();
                    break;
                case 3:
                    mostrarConfiguracion();
                    break;
                case 4:
                    ejecutarCalculadora();
                    break;
                case 5:
                    mostrarDatosCuriosos();
                    break;
                case 6:
                    jugarAdivinanza();
                    break;
                case 0:
                    continuar = false;
                    despedirse();
                    break;
                default:
                    System.out.println("❌ Opción no válida. Intenta de nuevo.");
            }
            
            if (continuar) {
                System.out.println("\n⏸️ Presiona Enter para continuar...");
                scanner.nextLine();
            }
        }
    }
    
    /**
     * 🎨 Muestra la bienvenida
     */
    private void mostrarBienvenida() {
        System.out.println("\n" + "=".repeat(60));
        System.out.println("🎉 ¡BIENVENIDO AL AGENTE PERUANO! 🎉");
        System.out.println("=".repeat(60));
        System.out.println("🌟 La aplicación Java más chévere del Perú");
        System.out.println("💻 Desarrollado con amor y tecnología");
        System.out.println("🇵🇪 Orgullosamente peruano");
        System.out.println("=".repeat(60) + "\n");
    }
    
    /**
     * 📋 Muestra el menú principal
     */
    private void mostrarMenu() {
        System.out.println("\n🎯 ¿Qué quieres hacer?");
        System.out.println("1. 👋 Saludar");
        System.out.println("2. ℹ️  Mostrar información");
        System.out.println("3. ⚙️  Ver configuración");
        System.out.println("4. 🧮 Calculadora");
        System.out.println("5. 🎲 Datos curiosos del Perú");
        System.out.println("6. 🎮 Juego de adivinanza");
        System.out.println("0. 🚪 Salir");
        System.out.print("\n👉 Elige una opción: ");
    }
    
    /**
     * 📖 Lee la opción del usuario
     */
    private int leerOpcion() {
        try {
            return Integer.parseInt(scanner.nextLine());
        } catch (NumberFormatException e) {
            return -1;
        }
    }
    
    /**
     * 👋 Saluda al usuario
     */
    private void saludar() {
        String saludo = saludos.get(ThreadLocalRandom.current().nextInt(saludos.size()));
        System.out.println("\n" + saludo);
        System.out.println("🤖 Soy tu agente peruano favorito, listo para ayudarte!");
        
        System.out.print("📝 ¿Cómo te llamas? ");
        String nombre = scanner.nextLine();
        
        if (!nombre.trim().isEmpty()) {
            System.out.println("🎉 ¡Mucho gusto, " + nombre + "! Es un placer conocerte.");
        }
    }
    
    /**
     * ℹ️ Muestra información del sistema
     */
    private void mostrarInformacion() {
        System.out.println("\n📊 INFORMACIÓN DEL SISTEMA");
        System.out.println("─".repeat(40));
        System.out.println("🏷️  Nombre: " + NOMBRE);
        System.out.println("🔢 Versión: " + VERSION);
        System.out.println("🆔 ID: " + this.id);
        System.out.println("📅 Creado: " + fechaCreacion.format(DateTimeFormatter.ofPattern("dd/MM/yyyy HH:mm:ss")));
        System.out.println("☕ Java Version: " + System.getProperty("java.version"));
        System.out.println("💻 OS: " + System.getProperty("os.name"));
        System.out.println("👤 Usuario: " + System.getProperty("user.name"));
        System.out.println("🏠 Directorio: " + System.getProperty("user.dir"));
    }
    
    /**
     * ⚙️ Muestra la configuración
     */
    private void mostrarConfiguracion() {
        System.out.println("\n⚙️ CONFIGURACIÓN DEL AGENTE");
        System.out.println("─".repeat(40));
        
        configuracion.forEach((clave, valor) -> {
            String emoji = obtenerEmojiConfiguracion(clave);
            System.out.println(emoji + " " + clave.replace("_", " ").toUpperCase() + ": " + valor);
        });
    }
    
    /**
     * 🎨 Obtiene emoji para configuración
     */
    private String obtenerEmojiConfiguracion(String clave) {
        Map<String, String> emojis = Map.of(
            "idioma", "🌐",
            "zona_horaria", "🕐",
            "moneda", "💰",
            "pais", "🇵🇪",
            "tema", "🎨"
        );
        return emojis.getOrDefault(clave, "⚙️");
    }
    
    /**
     * 🧮 Calculadora simple
     */
    private void ejecutarCalculadora() {
        System.out.println("\n🧮 CALCULADORA PERUANA");
        System.out.println("─".repeat(30));
        
        try {
            System.out.print("➕ Primer número: ");
            double num1 = Double.parseDouble(scanner.nextLine());
            
            System.out.print("🔢 Operación (+, -, *, /): ");
            String operacion = scanner.nextLine();
            
            System.out.print("➕ Segundo número: ");
            double num2 = Double.parseDouble(scanner.nextLine());
            
            double resultado = calcular(num1, operacion, num2);
            System.out.println("🎯 Resultado: " + num1 + " " + operacion + " " + num2 + " = " + resultado);
            
        } catch (NumberFormatException e) {
            System.out.println("❌ Error: Ingresa números válidos");
        } catch (ArithmeticException e) {
            System.out.println("❌ Error: " + e.getMessage());
        }
    }
    
    /**
     * 🔢 Realiza cálculos
     */
    private double calcular(double num1, String operacion, double num2) throws ArithmeticException {
        switch (operacion) {
            case "+":
                return num1 + num2;
            case "-":
                return num1 - num2;
            case "*":
                return num1 * num2;
            case "/":
                if (num2 == 0) throw new ArithmeticException("No se puede dividir por cero");
                return num1 / num2;
            default:
                throw new ArithmeticException("Operación no válida");
        }
    }
    
    /**
     * 🎲 Muestra datos curiosos del Perú
     */
    private void mostrarDatosCuriosos() {
        List<String> datos = Arrays.asList(
            "🏔️ Machu Picchu está a 2,430 metros sobre el nivel del mar",
            "🍽️ El ceviche es patrimonio cultural inmaterial del Perú",
            "🦙 Perú tiene la mayor población de llamas y alpacas del mundo",
            "🌊 Perú tiene 3,080 km de costa en el Océano Pacífico",
            "🏛️ Cusco fue la capital del Imperio Inca",
            "🌿 La selva peruana cubre el 60% del territorio nacional",
            "🎵 La marinera es el baile nacional del Perú",
            "🏔️ Perú tiene 3 regiones naturales: costa, sierra y selva"
        );
        
        String dato = datos.get(ThreadLocalRandom.current().nextInt(datos.size()));
        System.out.println("\n🎲 DATO CURIOSO DEL PERÚ");
        System.out.println("─".repeat(40));
        System.out.println(dato);
    }
    
    /**
     * 🎮 Juego de adivinanza
     */
    private void jugarAdivinanza() {
        System.out.println("\n🎮 JUEGO DE ADIVINANZA");
        System.out.println("─".repeat(30));
        System.out.println("🎯 Adivina el número entre 1 y 100");
        
        int numeroSecreto = ThreadLocalRandom.current().nextInt(1, 101);
        int intentos = 0;
        int maxIntentos = 7;
        
        while (intentos < maxIntentos) {
            System.out.print("🤔 Tu número (intento " + (intentos + 1) + "/" + maxIntentos + "): ");
            
            try {
                int numero = Integer.parseInt(scanner.nextLine());
                intentos++;
                
                if (numero == numeroSecreto) {
                    System.out.println("🎉 ¡FELICIDADES! Adivinaste en " + intentos + " intentos");
                    return;
                } else if (numero < numeroSecreto) {
                    System.out.println("📈 El número es mayor");
                } else {
                    System.out.println("📉 El número es menor");
                }
                
            } catch (NumberFormatException e) {
                System.out.println("❌ Ingresa un número válido");
            }
        }
        
        System.out.println("😔 Se acabaron los intentos. El número era: " + numeroSecreto);
    }
    
    /**
     * 👋 Se despide del usuario
     */
    private void despedirse() {
        System.out.println("\n🎉 ¡Gracias por usar el Agente Peruano!");
        System.out.println("👋 ¡Hasta la vista, causa!");
        System.out.println("🇵🇪 ¡Que viva el Perú!");
        scanner.close();
    }
    
    /**
     * 🚀 Método main - Punto de entrada
     */
    public static void main(String[] args) {
        try {
            AgentePeruano agente = new AgentePeruano();
            agente.ejecutar();
        } catch (Exception e) {
            System.err.println("❌ Error inesperado: " + e.getMessage());
            e.printStackTrace();
        }
    }
}