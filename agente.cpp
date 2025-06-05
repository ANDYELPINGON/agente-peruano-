// 🎯 C++ - Agente Peruano High Performance Edition
// ¡El poder y velocidad de C++ al servicio del Perú! 🚀

#include <iostream>
#include <string>
#include <vector>
#include <map>
#include <random>
#include <chrono>
#include <thread>
#include <mutex>
#include <iomanip>
#include <sstream>
#include <cmath>
#include <algorithm>
#include <memory>

// 🏗️ Estructura para datos curiosos
struct DatoCurioso {
    int id;
    std::string titulo;
    std::string descripcion;
    std::string categoria;
    std::string emoji;
    double popularidad;
    
    DatoCurioso(int i, const std::string& t, const std::string& d, 
                const std::string& c, const std::string& e, double p)
        : id(i), titulo(t), descripcion(d), categoria(c), emoji(e), popularidad(p) {}
};

// 🧮 Estructura para operaciones de calculadora
struct OperacionCalculadora {
    std::string operacion;
    double resultado;
    std::chrono::system_clock::time_point timestamp;
    bool esValida;
    
    OperacionCalculadora(const std::string& op, double res, bool valida)
        : operacion(op), resultado(res), esValida(valida) {
        timestamp = std::chrono::system_clock::now();
    }
};

// 🇵🇪 Clase principal del Agente Peruano C++ Edition
class AgentePeruano {
private:
    std::string nombre;
    std::string version;
    std::string id;
    std::string emojiPeru;
    std::chrono::system_clock::time_point fechaCreacion;
    std::map<std::string, std::string> configuracion;
    std::vector<std::string> saludos;
    std::vector<std::unique_ptr<DatoCurioso>> datosCuriosos;
    std::vector<OperacionCalculadora> historialOperaciones;
    std::mutex mutexHistorial;
    std::mutex mutexContador;
    int contadorVisitas;
    std::mt19937 generadorRandom;

public:
    // 🏗️ Constructor del Agente Peruano
    AgentePeruano() : 
        nombre("🤖 Agente Peruano C++ Edition"),
        version("2.0.0"),
        emojiPeru("🇵🇪"),
        fechaCreacion(std::chrono::system_clock::now()),
        contadorVisitas(0),
        generadorRandom(std::chrono::steady_clock::now().time_since_epoch().count()) {
        
        generarId();
        inicializarConfiguracion();
        inicializarSaludos();
        inicializarDatosCuriosos();
        
        std::cout << emojiPeru << " Inicializando " << nombre << " v" << version << std::endl;
        std::cout << "🆔 ID del Agente: " << id << std::endl;
        std::cout << "📅 Creado: " << obtenerFechaFormateada() << std::endl;
        std::cout << "⚡ C++: Máximo rendimiento y control" << std::endl;
    }

private:
    // 🎲 Genera un ID único para el agente
    void generarId() {
        auto timestamp = std::chrono::duration_cast<std::chrono::seconds>(
            fechaCreacion.time_since_epoch()).count();
        std::uniform_int_distribution<int> dist(1000, 9999);
        int random = dist(generadorRandom);
        
        std::stringstream ss;
        ss << "CPP-AGENTE-" << timestamp << "-" << random;
        id = ss.str();
    }
    
    // ⚙️ Inicializa la configuración
    void inicializarConfiguracion() {
        configuracion["idioma"] = "es-PE";
        configuracion["zona_horaria"] = "America/Lima";
        configuracion["moneda"] = "PEN";
        configuracion["pais"] = "Perú";
        configuracion["lenguaje"] = "C++";
        configuracion["compilador"] = "GCC/Clang";
        configuracion["standard"] = "C++17";
        configuracion["optimizacion"] = "O3";
    }
    
    // 👋 Inicializa los saludos peruanos
    void inicializarSaludos() {
        saludos = {
            "¡Hola causa! 👋",
            "¿Qué tal pata? 😄",
            "¡Buenas mi pana! 🤝",
            "¡Oe hermano! 💪",
            "¡Qué hay de nuevo viejo! 🎉",
            "¡Saludos desde el Perú! 🇵🇪",
            "¡C++ en acción! ⚡",
            "¡Máximo rendimiento! 🚀"
        };
    }
    
    // 📚 Inicializa los datos curiosos del Perú
    void inicializarDatosCuriosos() {
        datosCuriosos.push_back(std::make_unique<DatoCurioso>(
            1, "Machu Picchu", 
            "Está ubicado a 2,430 metros sobre el nivel del mar",
            "geografia", "🏔️", 10.0));
            
        datosCuriosos.push_back(std::make_unique<DatoCurioso>(
            2, "Ceviche Peruano",
            "Es patrimonio cultural inmaterial del Perú desde 2004",
            "gastronomia", "🍽️", 9.5));
            
        datosCuriosos.push_back(std::make_unique<DatoCurioso>(
            3, "Llamas y Alpacas",
            "Perú tiene el 70% de la población mundial de llamas",
            "fauna", "🦙", 8.5));
            
        datosCuriosos.push_back(std::make_unique<DatoCurioso>(
            4, "Costa Peruana",
            "Tiene 3,080 kilómetros de longitud en el Océano Pacífico",
            "geografia", "🌊", 8.0));
            
        datosCuriosos.push_back(std::make_unique<DatoCurioso>(
            5, "Imperio Inca",
            "Cusco fue la capital del Tahuantinsuyo",
            "historia", "🏛️", 10.0));
            
        datosCuriosos.push_back(std::make_unique<DatoCurioso>(
            6, "Amazonía Peruana",
            "Cubre el 60% del territorio nacional",
            "geografia", "🌿", 9.0));
            
        datosCuriosos.push_back(std::make_unique<DatoCurioso>(
            7, "C++ Language",
            "Creado por Bjarne Stroustrup en 1985, ¡más duradero que las piedras incas!",
            "tecnologia", "⚡", 9.5));
    }
    
    // 📅 Obtiene la fecha formateada
    std::string obtenerFechaFormateada() const {
        auto tiempo = std::chrono::system_clock::to_time_t(fechaCreacion);
        std::stringstream ss;
        ss << std::put_time(std::localtime(&tiempo), "%d/%m/%Y %H:%M:%S");
        return ss.str();
    }

public:
    // 🚀 Ejecuta la aplicación principal
    void ejecutar() {
        mostrarBienvenida();
        
        // 🔄 Hilo para estadísticas en background
        std::thread hiloEstadisticas(&AgentePeruano::estadisticasBackground, this);
        hiloEstadisticas.detach();
        
        int opcion;
        do {
            mostrarMenu();
            std::cout << "👉 Elige una opción: ";
            std::cin >> opcion;
            std::cin.ignore(); // Limpiar buffer
            
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
                    ejecutarCalculadoraAvanzada();
                    break;
                case 5:
                    mostrarDatoCurioso();
                    break;
                case 6:
                    mostrarHistorialOperaciones();
                    break;
                case 7:
                    ejecutarBenchmarkRendimiento();
                    break;
                case 8:
                    jugarAdivinanzaMultihilo();
                    break;
                case 9:
                    mostrarEstadisticasCpp();
                    break;
                case 10:
                    analizarRendimientoMemoria();
                    break;
                case 0:
                    despedirse();
                    break;
                default:
                    std::cout << "❌ Opción no válida. Intenta de nuevo." << std::endl;
            }
            
            if (opcion != 0) {
                std::cout << "\n⏸️ Presiona Enter para continuar...";
                std::cin.get();
            }
            
        } while (opcion != 0);
    }

private:
    // 🎨 Muestra la bienvenida
    void mostrarBienvenida() {
        std::cout << "\n" << std::string(65, '=') << std::endl;
        std::cout << "⚡ ¡BIENVENIDO AL AGENTE PERUANO C++ EDITION! ⚡" << std::endl;
        std::cout << std::string(65, '=') << std::endl;
        std::cout << "🚀 Máximo rendimiento y control total" << std::endl;
        std::cout << "⚡ Compilado a código máquina nativo" << std::endl;
        std::cout << "🇵🇪 Desarrollado con precisión peruana" << std::endl;
        std::cout << "🎯 Zero overhead, máxima eficiencia" << std::endl;
        std::cout << std::string(65, '=') << "\n" << std::endl;
    }
    
    // 📋 Muestra el menú principal
    void mostrarMenu() {
        {
            std::lock_guard<std::mutex> lock(mutexContador);
            contadorVisitas++;
        }
        
        std::cout << "\n🎯 ¿Qué quieres hacer? (Visita #" << contadorVisitas << ")" << std::endl;
        std::cout << "1. 👋 Saludar" << std::endl;
        std::cout << "2. ℹ️  Mostrar información" << std::endl;
        std::cout << "3. ⚙️  Ver configuración" << std::endl;
        std::cout << "4. 🧮 Calculadora avanzada" << std::endl;
        std::cout << "5. 🎲 Dato curioso del Perú" << std::endl;
        std::cout << "6. 📊 Historial de operaciones" << std::endl;
        std::cout << "7. ⚡ Benchmark de rendimiento" << std::endl;
        std::cout << "8. 🎮 Adivinanza multihilo" << std::endl;
        std::cout << "9. 🎯 Estadísticas C++" << std::endl;
        std::cout << "10. 💾 Análisis de memoria" << std::endl;
        std::cout << "0. 🚪 Salir" << std::endl;
    }
    
    // 👋 Saluda al usuario
    void saludar() {
        std::uniform_int_distribution<size_t> dist(0, saludos.size() - 1);
        std::string saludo = saludos[dist(generadorRandom)];
        
        std::cout << "\n" << saludo << std::endl;
        std::cout << "⚡ Soy tu agente peruano más rápido y eficiente!" << std::endl;
        
        std::cout << "📝 ¿Cómo te llamas? ";
        std::string nombre;
        std::getline(std::cin, nombre);
        
        if (!nombre.empty()) {
            std::cout << "🎉 ¡Mucho gusto, " << nombre << "! Compilado con máximo rendimiento para ti." << std::endl;
        }
    }
    
    // ℹ️ Muestra información del sistema
    void mostrarInformacion() {
        std::cout << "\n📊 INFORMACIÓN DEL SISTEMA C++" << std::endl;
        std::cout << std::string(45, '─') << std::endl;
        std::cout << "🏷️  Nombre: " << nombre << std::endl;
        std::cout << "🔢 Versión: " << version << std::endl;
        std::cout << "🆔 ID: " << id << std::endl;
        std::cout << "📅 Creado: " << obtenerFechaFormateada() << std::endl;
        std::cout << "⚡ C++ Standard: " << __cplusplus << std::endl;
        std::cout << "🏗️  Compilador: " << 
#ifdef __GNUC__
            "GCC " << __GNUC__ << "." << __GNUC_MINOR__
#elif defined(_MSC_VER)
            "MSVC " << _MSC_VER
#else
            "Desconocido"
#endif
            << std::endl;
        std::cout << "🚀 Optimización: Máxima" << std::endl;
        std::cout << "💾 Gestión memoria: Manual" << std::endl;
        std::cout << "📊 Visitas totales: " << contadorVisitas << std::endl;
    }
    
    // ⚙️ Muestra la configuración
    void mostrarConfiguracion() {
        std::cout << "\n⚙️ CONFIGURACIÓN DEL AGENTE C++" << std::endl;
        std::cout << std::string(45, '─') << std::endl;
        
        std::map<std::string, std::string> emojis = {
            {"idioma", "🌐"}, {"zona_horaria", "🕐"}, {"moneda", "💰"},
            {"pais", "🇵🇪"}, {"lenguaje", "⚡"}, {"compilador", "🏗️"},
            {"standard", "📋"}, {"optimizacion", "🚀"}
        };
        
        for (const auto& [clave, valor] : configuracion) {
            std::string emoji = emojis.count(clave) ? emojis[clave] : "⚙️";
            std::cout << emoji << " " << clave << ": " << valor << std::endl;
        }
    }
    
    // 🧮 Calculadora avanzada con alta precisión
    void ejecutarCalculadoraAvanzada() {
        std::cout << "\n🧮 CALCULADORA C++ AVANZADA" << std::endl;
        std::cout << std::string(35, '─') << std::endl;
        
        try {
            double num1, num2 = 0;
            std::string operacion;
            
            std::cout << "➕ Primer número: ";
            std::cin >> num1;
            
            std::cout << "🔢 Operación (+, -, *, /, ^, sqrt, sin, cos, tan, log): ";
            std::cin >> operacion;
            
            double resultado;
            std::string operacionStr;
            bool necesitaSegundoNumero = (operacion != "sqrt" && operacion != "sin" && 
                                        operacion != "cos" && operacion != "tan" && 
                                        operacion != "log");
            
            if (necesitaSegundoNumero) {
                std::cout << "➕ Segundo número: ";
                std::cin >> num2;
            }
            
            // ⏱️ Medir tiempo de cálculo
            auto inicio = std::chrono::high_resolution_clock::now();
            
            if (operacion == "+") {
                resultado = num1 + num2;
                operacionStr = std::to_string(num1) + " + " + std::to_string(num2);
            } else if (operacion == "-") {
                resultado = num1 - num2;
                operacionStr = std::to_string(num1) + " - " + std::to_string(num2);
            } else if (operacion == "*") {
                resultado = num1 * num2;
                operacionStr = std::to_string(num1) + " × " + std::to_string(num2);
            } else if (operacion == "/") {
                if (num2 == 0) {
                    throw std::runtime_error("División por cero");
                }
                resultado = num1 / num2;
                operacionStr = std::to_string(num1) + " ÷ " + std::to_string(num2);
            } else if (operacion == "^") {
                resultado = std::pow(num1, num2);
                operacionStr = std::to_string(num1) + "^" + std::to_string(num2);
            } else if (operacion == "sqrt") {
                if (num1 < 0) {
                    throw std::runtime_error("Raíz cuadrada de número negativo");
                }
                resultado = std::sqrt(num1);
                operacionStr = "√" + std::to_string(num1);
            } else if (operacion == "sin") {
                resultado = std::sin(num1);
                operacionStr = "sin(" + std::to_string(num1) + ")";
            } else if (operacion == "cos") {
                resultado = std::cos(num1);
                operacionStr = "cos(" + std::to_string(num1) + ")";
            } else if (operacion == "tan") {
                resultado = std::tan(num1);
                operacionStr = "tan(" + std::to_string(num1) + ")";
            } else if (operacion == "log") {
                if (num1 <= 0) {
                    throw std::runtime_error("Logaritmo de número no positivo");
                }
                resultado = std::log(num1);
                operacionStr = "ln(" + std::to_string(num1) + ")";
            } else {
                throw std::runtime_error("Operación no válida");
            }
            
            auto fin = std::chrono::high_resolution_clock::now();
            auto duracion = std::chrono::duration_cast<std::chrono::nanoseconds>(fin - inicio);
            
            std::cout << std::fixed << std::setprecision(8);
            std::cout << "🎯 " << operacionStr << " = " << resultado << std::endl;
            std::cout << "⚡ Calculado en " << duracion.count() << " nanosegundos" << std::endl;
            std::cout << "🎯 Precisión C++: 64 bits IEEE 754" << std::endl;
            
            // 📊 Guardar en historial thread-safe
            {
                std::lock_guard<std::mutex> lock(mutexHistorial);
                historialOperaciones.emplace_back(operacionStr, resultado, true);
            }
            
        } catch (const std::exception& e) {
            std::cout << "❌ Error: " << e.what() << std::endl;
        }
    }
    
    // 🎲 Muestra un dato curioso
    void mostrarDatoCurioso() {
        std::uniform_int_distribution<size_t> dist(0, datosCuriosos.size() - 1);
        const auto& dato = datosCuriosos[dist(generadorRandom)];
        
        std::cout << "\n🎲 DATO CURIOSO DEL PERÚ" << std::endl;
        std::cout << std::string(35, '─') << std::endl;
        std::cout << dato->emoji << " " << dato->titulo << std::endl;
        std::cout << "📝 " << dato->descripcion << std::endl;
        std::cout << "🏷️ Categoría: " << dato->categoria << std::endl;
        std::cout << "⭐ Popularidad: " << std::fixed << std::setprecision(1) 
                  << dato->popularidad << "/10" << std::endl;
        std::cout << "🆔 ID: " << dato->id << std::endl;
    }
    
    // 📊 Muestra historial de operaciones
    void mostrarHistorialOperaciones() {
        std::lock_guard<std::mutex> lock(mutexHistorial);
        
        std::cout << "\n📊 HISTORIAL DE OPERACIONES C++" << std::endl;
        std::cout << std::string(40, '─') << std::endl;
        
        if (historialOperaciones.empty()) {
            std::cout << "📭 No hay operaciones en el historial" << std::endl;
            return;
        }
        
        for (size_t i = 0; i < historialOperaciones.size(); ++i) {
            const auto& op = historialOperaciones[i];
            std::string estado = op.esValida ? "✅" : "❌";
            
            auto tiempo = std::chrono::system_clock::to_time_t(op.timestamp);
            std::cout << i + 1 << ". " << estado << " " << op.operacion 
                      << " = " << std::fixed << std::setprecision(4) << op.resultado
                      << " (" << std::put_time(std::localtime(&tiempo), "%H:%M:%S") << ")" << std::endl;
        }
        
        size_t operacionesValidas = std::count_if(historialOperaciones.begin(), 
                                                 historialOperaciones.end(),
                                                 [](const auto& op) { return op.esValida; });
        
        std::cout << "\n📈 Total de operaciones: " << historialOperaciones.size() << std::endl;
        std::cout << "✅ Operaciones válidas: " << operacionesValidas << std::endl;
        std::cout << "❌ Operaciones con error: " << historialOperaciones.size() - operacionesValidas << std::endl;
    }
    
    // ⚡ Benchmark de rendimiento
    void ejecutarBenchmarkRendimiento() {
        std::cout << "\n⚡ BENCHMARK DE RENDIMIENTO C++" << std::endl;
        std::cout << std::string(40, '─') << std::endl;
        
        const int numHilos = std::thread::hardware_concurrency();
        const int operacionesPorHilo = 1000000;
        
        std::cout << "🔄 Ejecutando " << numHilos << " hilos" << std::endl;
        std::cout << "🧮 " << operacionesPorHilo << " operaciones por hilo" << std::endl;
        
        auto inicio = std::chrono::high_resolution_clock::now();
        
        std::vector<std::thread> hilos;
        std::vector<long long> resultados(numHilos);
        
        for (int i = 0; i < numHilos; ++i) {
            hilos.emplace_back([&resultados, i, operacionesPorHilo]() {
                long long suma = 0;
                for (int j = 0; j < operacionesPorHilo; ++j) {
                    suma += static_cast<long long>(j) * j;
                }
                resultados[i] = suma;
                std::cout << "🔄 Hilo " << i + 1 << " completado" << std::endl;
            });
        }
        
        // 🔄 Esperar a que todos los hilos terminen
        for (auto& hilo : hilos) {
            hilo.join();
        }
        
        auto fin = std::chrono::high_resolution_clock::now();
        auto duracion = std::chrono::duration_cast<std::chrono::microseconds>(fin - inicio);
        
        long long sumaTotal = 0;
        for (long long resultado : resultados) {
            sumaTotal += resultado;
        }
        
        int totalOperaciones = numHilos * operacionesPorHilo;
        
        std::cout << "\n🎯 Resultados del Benchmark:" << std::endl;
        std::cout << "⏱️  Tiempo: " << duracion.count() << " microsegundos" << std::endl;
        std::cout << "🔢 Operaciones totales: " << totalOperaciones << std::endl;
        std::cout << "🚀 Ops/segundo: " << std::fixed << std::setprecision(0) 
                  << (static_cast<double>(totalOperaciones) / duracion.count() * 1000000) << std::endl;
        std::cout << "📊 Suma total: " << sumaTotal << std::endl;
        std::cout << "⚡ ¡C++ es increíblemente rápido!" << std::endl;
    }
    
    // 🎮 Juego de adivinanza multihilo
    void jugarAdivinanzaMultihilo() {
        std::cout << "\n🎮 ADIVINANZA MULTIHILO C++" << std::endl;
        std::cout << std::string(35, '─') << std::endl;
        
        std::uniform_int_distribution<int> dist(1, 100);
        int numeroSecreto = dist(generadorRandom);
        int maxIntentos = 7;
        
        std::cout << "🎯 Adivina el número entre 1 y 100 (máximo " << maxIntentos << " intentos)" << std::endl;
        
        for (int i = 0; i < maxIntentos; ++i) {
            std::cout << "🤔 Intento " << i + 1 << "/" << maxIntentos << ": ";
            int numero;
            std::cin >> numero;
            
            if (numero == numeroSecreto) {
                std::cout << "🎉 ¡GANASTE! Adivinaste en " << i + 1 << " intentos" << std::endl;
                return;
            } else if (numero < numeroSecreto) {
                std::cout << "📈 El número es mayor" << std::endl;
            } else {
                std::cout << "📉 El número es menor" << std::endl;
            }
        }
        
        std::cout << "😔 Se acabaron los intentos. El número era: " << numeroSecreto << std::endl;
    }
    
    // 🎯 Muestra estadísticas de C++
    void mostrarEstadisticasCpp() {
        std::cout << "\n🎯 ESTADÍSTICAS C++" << std::endl;
        std::cout << std::string(30, '─') << std::endl;
        std::cout << "📅 Creado: 1985 por Bjarne Stroustrup" << std::endl;
        std::cout << "🎯 Lenguaje compilado" << std::endl;
        std::cout << "⚡ Rendimiento máximo" << std::endl;
        std::cout << "💾 Control total de memoria" << std::endl;
        std::cout << "🔄 Multihilo nativo" << std::endl;
        std::cout << "🌐 Usado por: Google, Microsoft, Adobe" << std::endl;
        std::cout << "🚀 Sistemas críticos y videojuegos" << std::endl;
        std::cout << "📋 Standard actual: C++20/23" << std::endl;
        std::cout << "🇵🇪 ¡Y ahora también en Perú!" << std::endl;
    }
    
    // 💾 Análisis de rendimiento y memoria
    void analizarRendimientoMemoria() {
        std::cout << "\n💾 ANÁLISIS DE MEMORIA C++" << std::endl;
        std::cout << std::string(35, '─') << std::endl;
        
        // 📊 Información de memoria
        std::cout << "🏗️  Tamaño del objeto AgentePeruano: " << sizeof(*this) << " bytes" << std::endl;
        std::cout << "📊 Datos curiosos en memoria: " << datosCuriosos.size() * sizeof(DatoCurioso) << " bytes" << std::endl;
        std::cout << "🧮 Historial operaciones: " << historialOperaciones.size() * sizeof(OperacionCalculadora) << " bytes" << std::endl;
        
        // ⚡ Test de velocidad de acceso
        auto inicio = std::chrono::high_resolution_clock::now();
        
        // Acceso secuencial a datos
        for (const auto& dato : datosCuriosos) {
            volatile auto temp = dato->popularidad; // Evitar optimización
            (void)temp; // Suprimir warning
        }
        
        auto fin = std::chrono::high_resolution_clock::now();
        auto duracion = std::chrono::duration_cast<std::chrono::nanoseconds>(fin - inicio);
        
        std::cout << "⚡ Acceso secuencial a datos: " << duracion.count() << " ns" << std::endl;
        std::cout << "🚀 Velocidad de acceso: " << std::fixed << std::setprecision(2) 
                  << (static_cast<double>(datosCuriosos.size()) / duracion.count() * 1000000000) 
                  << " accesos/segundo" << std::endl;
        std::cout << "💪 ¡C++ domina la gestión de memoria!" << std::endl;
    }
    
    // 🔄 Estadísticas en background
    void estadisticasBackground() {
        while (true) {
            std::this_thread::sleep_for(std::chrono::seconds(20));
            
            int visitas;
            {
                std::lock_guard<std::mutex> lock(mutexContador);
                visitas = contadorVisitas;
            }
            
            if (visitas > 0 && visitas % 15 == 0) {
                std::cout << "\n🎉 ¡Has usado el agente " << visitas << " veces! ¡C++ rocks!" << std::endl;
            }
        }
    }
    
    // 👋 Se despide del usuario
    void despedirse() {
        std::cout << "\n⚡ ¡Gracias por usar el Agente Peruano C++ Edition!" << std::endl;
        std::cout << "🚀 Máximo rendimiento hasta el final" << std::endl;
        std::cout << "🇵🇪 ¡Que viva el Perú y que viva C++!" << std::endl;
        std::cout << "💾 Memoria liberada automáticamente" << std::endl;
        std::cout << "⚡ ¡Hasta la próxima, causa!" << std::endl;
    }
};

// 🚀 Función principal
int main() {
    try {
        std::cout << "⚡ Iniciando Agente Peruano C++ Edition..." << std::endl;
        
        AgentePeruano agente;
        agente.ejecutar();
        
        std::cout << "✅ Aplicación finalizada correctamente" << std::endl;
        
    } catch (const std::exception& e) {
        std::cerr << "❌ Error inesperado: " << e.what() << std::endl;
        return 1;
    }
    
    return 0;
}