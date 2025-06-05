// 🐹 Go - Agente Peruano Concurrent Edition
// ¡La simplicidad y concurrencia de Go al servicio del Perú! 🚀

package main

import (
	"bufio"
	"fmt"
	"math"
	"math/rand"
	"os"
	"strconv"
	"strings"
	"sync"
	"time"
)

// 🏗️ Estructura principal del Agente Peruano
type AgentePeruano struct {
	Nombre           string
	Version          string
	ID               string
	EmojiPeru        string
	FechaCreacion    time.Time
	Saludos          []string
	Configuracion    map[string]string
	DatosCuriosos    []DatoCurioso
	Mutex            sync.RWMutex
	HistorialOps     []OperacionCalculadora
	ContadorVisitas  int64
}

// 📊 Estructura para datos curiosos
type DatoCurioso struct {
	ID          int
	Titulo      string
	Descripcion string
	Categoria   string
	Emoji       string
}

// 🧮 Estructura para operaciones de calculadora
type OperacionCalculadora struct {
	Operacion string
	Resultado float64
	Timestamp time.Time
	EsValida  bool
}

// 🏗️ Constructor del Agente Peruano
func NuevoAgentePeruano() *AgentePeruano {
	rand.Seed(time.Now().UnixNano())
	
	id := fmt.Sprintf("GO-AGENTE-%d-%d", time.Now().Unix(), rand.Intn(9000)+1000)
	
	agente := &AgentePeruano{
		Nombre:        "🤖 Agente Peruano Go Edition",
		Version:       "2.0.0",
		ID:            id,
		EmojiPeru:     "🇵🇪",
		FechaCreacion: time.Now(),
		Saludos: []string{
			"¡Hola causa! 👋",
			"¿Qué tal pata? 😄",
			"¡Buenas mi pana! 🤝",
			"¡Oe hermano! 💪",
			"¡Qué hay de nuevo viejo! 🎉",
			"¡Saludos desde el Perú! 🇵🇪",
		},
		Configuracion: map[string]string{
			"idioma":       "es-PE",
			"zona_horaria": "America/Lima",
			"moneda":       "PEN",
			"pais":         "Perú",
			"lenguaje":     "Go",
			"concurrencia": "Activada",
		},
		HistorialOps:    make([]OperacionCalculadora, 0),
		ContadorVisitas: 0,
	}
	
	agente.inicializarDatosCuriosos()
	
	fmt.Printf("🐹 Inicializando %s v%s\n", agente.Nombre, agente.Version)
	fmt.Printf("🆔 ID del Agente: %s\n", agente.ID)
	fmt.Printf("📅 Creado: %s\n", agente.FechaCreacion.Format("02/01/2006 15:04:05"))
	fmt.Printf("⚡ Go: Simple, rápido y concurrente\n")
	
	return agente
}

// 📚 Inicializa los datos curiosos del Perú
func (a *AgentePeruano) inicializarDatosCuriosos() {
	a.DatosCuriosos = []DatoCurioso{
		{1, "Machu Picchu", "Está a 2,430 metros sobre el nivel del mar", "geografia", "🏔️"},
		{2, "Ceviche", "Es patrimonio cultural inmaterial del Perú", "gastronomia", "🍽️"},
		{3, "Llamas", "Perú tiene el 70% de las llamas del mundo", "fauna", "🦙"},
		{4, "Costa Peruana", "Tiene 3,080 km de longitud", "geografia", "🌊"},
		{5, "Imperio Inca", "Cusco fue la capital del Tahuantinsuyo", "historia", "🏛️"},
		{6, "Amazonía", "Cubre el 60% del territorio peruano", "geografia", "🌿"},
		{7, "Marinera", "Baile nacional desde 1986", "cultura", "🎵"},
		{8, "Go Language", "Creado por Google en 2009, ¡más joven que muchas ruinas!", "tecnologia", "🐹"},
	}
}

// 🚀 Ejecuta la aplicación principal
func (a *AgentePeruano) Ejecutar() {
	a.mostrarBienvenida()
	
	// 🔄 Iniciar goroutine para contador de visitas
	go a.contadorVisitasBackground()
	
	scanner := bufio.NewScanner(os.Stdin)
	
	for {
		a.mostrarMenu()
		fmt.Print("👉 Elige una opción: ")
		
		if !scanner.Scan() {
			break
		}
		
		opcion := strings.TrimSpace(scanner.Text())
		
		switch opcion {
		case "1":
			a.saludar(scanner)
		case "2":
			a.mostrarInformacion()
		case "3":
			a.mostrarConfiguracion()
		case "4":
			a.ejecutarCalculadora(scanner)
		case "5":
			a.mostrarDatoCurioso()
		case "6":
			a.mostrarHistorialOperaciones()
		case "7":
			a.ejecutarBenchmarkConcurrente()
		case "8":
			a.jugarAdivinanzaConcurrente(scanner)
		case "9":
			a.mostrarEstadisticasGo()
		case "0":
			a.despedirse()
			return
		default:
			fmt.Println("❌ Opción no válida. Intenta de nuevo.")
		}
		
		fmt.Println("\n⏸️ Presiona Enter para continuar...")
		scanner.Scan()
	}
}

// 🎨 Muestra la bienvenida
func (a *AgentePeruano) mostrarBienvenida() {
	fmt.Println("\n" + strings.Repeat("=", 60))
	fmt.Println("🐹 ¡BIENVENIDO AL AGENTE PERUANO GO EDITION! 🐹")
	fmt.Println(strings.Repeat("=", 60))
	fmt.Println("⚡ Simple, rápido y concurrente")
	fmt.Println("🔄 Goroutines trabajando en paralelo")
	fmt.Println("🇵🇪 Desarrollado con orgullo peruano")
	fmt.Println("🚀 Compilado a binario nativo")
	fmt.Println(strings.Repeat("=", 60) + "\n")
}

// 📋 Muestra el menú principal
func (a *AgentePeruano) mostrarMenu() {
	a.Mutex.Lock()
	a.ContadorVisitas++
	visitas := a.ContadorVisitas
	a.Mutex.Unlock()
	
	fmt.Printf("\n🎯 ¿Qué quieres hacer? (Visita #%d)\n", visitas)
	fmt.Println("1. 👋 Saludar")
	fmt.Println("2. ℹ️  Mostrar información")
	fmt.Println("3. ⚙️  Ver configuración")
	fmt.Println("4. 🧮 Calculadora concurrente")
	fmt.Println("5. 🎲 Dato curioso del Perú")
	fmt.Println("6. 📊 Historial de operaciones")
	fmt.Println("7. ⚡ Benchmark concurrente")
	fmt.Println("8. 🎮 Adivinanza con goroutines")
	fmt.Println("9. 🐹 Estadísticas Go")
	fmt.Println("0. 🚪 Salir")
}

// 👋 Saluda al usuario
func (a *AgentePeruano) saludar(scanner *bufio.Scanner) {
	saludo := a.Saludos[rand.Intn(len(a.Saludos))]
	
	fmt.Printf("\n%s\n", saludo)
	fmt.Println("🐹 Soy tu agente peruano más concurrente!")
	
	fmt.Print("📝 ¿Cómo te llamas? ")
	if scanner.Scan() {
		nombre := strings.TrimSpace(scanner.Text())
		if nombre != "" {
			fmt.Printf("🎉 ¡Mucho gusto, %s! Compilado con cariño para ti.\n", nombre)
		}
	}
}

// ℹ️ Muestra información del sistema
func (a *AgentePeruano) mostrarInformacion() {
	fmt.Println("\n📊 INFORMACIÓN DEL SISTEMA GO")
	fmt.Println(strings.Repeat("─", 40))
	fmt.Printf("🏷️  Nombre: %s\n", a.Nombre)
	fmt.Printf("🔢 Versión: %s\n", a.Version)
	fmt.Printf("🆔 ID: %s\n", a.ID)
	fmt.Printf("📅 Creado: %s\n", a.FechaCreacion.Format("02/01/2006 15:04:05"))
	fmt.Printf("🐹 Go Version: %s\n", "1.21+")
	fmt.Printf("🔄 Goroutines: Activas\n")
	fmt.Printf("⚡ Compilado: Binario nativo\n")
	fmt.Printf("🚀 Performance: Ultra rápido\n")
	fmt.Printf("📊 Visitas: %d\n", a.ContadorVisitas)
}

// ⚙️ Muestra la configuración
func (a *AgentePeruano) mostrarConfiguracion() {
	fmt.Println("\n⚙️ CONFIGURACIÓN DEL AGENTE GO")
	fmt.Println(strings.Repeat("─", 40))
	
	for clave, valor := range a.Configuracion {
		emoji := a.obtenerEmojiConfiguracion(clave)
		fmt.Printf("%s %s: %s\n", emoji, strings.ToUpper(clave), valor)
	}
}

// 🎨 Obtiene emoji para configuración
func (a *AgentePeruano) obtenerEmojiConfiguracion(clave string) string {
	emojis := map[string]string{
		"idioma":       "🌐",
		"zona_horaria": "🕐",
		"moneda":       "💰",
		"pais":         "🇵🇪",
		"lenguaje":     "🐹",
		"concurrencia": "🔄",
	}
	
	if emoji, existe := emojis[clave]; existe {
		return emoji
	}
	return "⚙️"
}

// 🧮 Calculadora concurrente
func (a *AgentePeruano) ejecutarCalculadora(scanner *bufio.Scanner) {
	fmt.Println("\n🧮 CALCULADORA GO CONCURRENTE")
	fmt.Println(strings.Repeat("─", 35))
	
	fmt.Print("➕ Primer número: ")
	if !scanner.Scan() {
		return
	}
	num1, err1 := strconv.ParseFloat(strings.TrimSpace(scanner.Text()), 64)
	
	fmt.Print("🔢 Operación (+, -, *, /, ^, sqrt): ")
	if !scanner.Scan() {
		return
	}
	operacion := strings.TrimSpace(scanner.Text())
	
	var resultado float64
	var esValida bool = true
	var operacionCompleta string
	
	if operacion == "sqrt" {
		if num1 >= 0 {
			resultado = math.Sqrt(num1)
			operacionCompleta = fmt.Sprintf("√%.2f", num1)
		} else {
			fmt.Println("❌ Error: No se puede calcular raíz cuadrada de número negativo")
			return
		}
	} else {
		fmt.Print("➕ Segundo número: ")
		if !scanner.Scan() {
			return
		}
		num2, err2 := strconv.ParseFloat(strings.TrimSpace(scanner.Text()), 64)
		
		if err1 != nil || err2 != nil {
			fmt.Println("❌ Error: Números no válidos")
			return
		}
		
		// 🔄 Usar goroutine para cálculo
		resultadoChan := make(chan float64)
		errorChan := make(chan string)
		
		go func() {
			switch operacion {
			case "+":
				resultadoChan <- num1 + num2
			case "-":
				resultadoChan <- num1 - num2
			case "*":
				resultadoChan <- num1 * num2
			case "/":
				if num2 != 0 {
					resultadoChan <- num1 / num2
				} else {
					errorChan <- "División por cero"
				}
			case "^":
				resultadoChan <- math.Pow(num1, num2)
			default:
				errorChan <- "Operación no válida"
			}
		}()
		
		select {
		case resultado = <-resultadoChan:
			operacionCompleta = fmt.Sprintf("%.2f %s %.2f", num1, operacion, num2)
		case err := <-errorChan:
			fmt.Printf("❌ Error: %s\n", err)
			esValida = false
			return
		case <-time.After(1 * time.Second):
			fmt.Println("⏰ Timeout en cálculo")
			return
		}
	}
	
	if err1 == nil && esValida {
		fmt.Printf("🎯 %s = %.4f\n", operacionCompleta, resultado)
		fmt.Println("🐹 Calculado con goroutines de Go")
		
		// 📊 Guardar en historial de forma thread-safe
		a.Mutex.Lock()
		a.HistorialOps = append(a.HistorialOps, OperacionCalculadora{
			Operacion: operacionCompleta,
			Resultado: resultado,
			Timestamp: time.Now(),
			EsValida:  true,
		})
		a.Mutex.Unlock()
	}
}

// 🎲 Muestra un dato curioso
func (a *AgentePeruano) mostrarDatoCurioso() {
	dato := a.DatosCuriosos[rand.Intn(len(a.DatosCuriosos))]
	
	fmt.Println("\n🎲 DATO CURIOSO DEL PERÚ")
	fmt.Println(strings.Repeat("─", 35))
	fmt.Printf("%s %s\n", dato.Emoji, dato.Titulo)
	fmt.Printf("📝 %s\n", dato.Descripcion)
	fmt.Printf("🏷️ Categoría: %s\n", strings.ToUpper(dato.Categoria))
	fmt.Printf("🆔 ID: %d\n", dato.ID)
}

// 📊 Muestra historial de operaciones
func (a *AgentePeruano) mostrarHistorialOperaciones() {
	a.Mutex.RLock()
	defer a.Mutex.RUnlock()
	
	fmt.Println("\n📊 HISTORIAL DE OPERACIONES")
	fmt.Println(strings.Repeat("─", 35))
	
	if len(a.HistorialOps) == 0 {
		fmt.Println("📭 No hay operaciones en el historial")
		return
	}
	
	for i, op := range a.HistorialOps {
		estado := "✅"
		if !op.EsValida {
			estado = "❌"
		}
		fmt.Printf("%d. %s %s = %.4f (%s)\n", 
			i+1, estado, op.Operacion, op.Resultado, 
			op.Timestamp.Format("15:04:05"))
	}
	
	fmt.Printf("\n📈 Total de operaciones: %d\n", len(a.HistorialOps))
}

// ⚡ Benchmark concurrente
func (a *AgentePeruano) ejecutarBenchmarkConcurrente() {
	fmt.Println("\n⚡ BENCHMARK CONCURRENTE GO")
	fmt.Println(strings.Repeat("─", 35))
	
	numGoroutines := 10
	operacionesPorGoroutine := 100000
	
	fmt.Printf("🔄 Ejecutando %d goroutines\n", numGoroutines)
	fmt.Printf("🧮 %d operaciones por goroutine\n", operacionesPorGoroutine)
	
	start := time.Now()
	
	var wg sync.WaitGroup
	resultados := make(chan int64, numGoroutines)
	
	for i := 0; i < numGoroutines; i++ {
		wg.Add(1)
		go func(id int) {
			defer wg.Done()
			
			var suma int64
			for j := 0; j < operacionesPorGoroutine; j++ {
				suma += int64(j * j)
			}
			
			resultados <- suma
			fmt.Printf("🔄 Goroutine %d completada\n", id+1)
		}(i)
	}
	
	// 🔄 Cerrar canal cuando todas las goroutines terminen
	go func() {
		wg.Wait()
		close(resultados)
	}()
	
	// 📊 Recopilar resultados
	var sumaTotal int64
	for resultado := range resultados {
		sumaTotal += resultado
	}
	
	duration := time.Since(start)
	totalOperaciones := numGoroutines * operacionesPorGoroutine
	
	fmt.Printf("\n🎯 Resultados del Benchmark:\n")
	fmt.Printf("⏱️  Tiempo: %v\n", duration)
	fmt.Printf("🔢 Operaciones totales: %d\n", totalOperaciones)
	fmt.Printf("🚀 Ops/segundo: %.0f\n", float64(totalOperaciones)/duration.Seconds())
	fmt.Printf("📊 Suma total: %d\n", sumaTotal)
	fmt.Printf("🐹 ¡Go es increíblemente rápido con concurrencia!\n")
}

// 🎮 Juego de adivinanza con goroutines
func (a *AgentePeruano) jugarAdivinanzaConcurrente(scanner *bufio.Scanner) {
	fmt.Println("\n🎮 ADIVINANZA CONCURRENTE GO")
	fmt.Println(strings.Repeat("─", 35))
	
	numeroSecreto := rand.Intn(100) + 1
	maxIntentos := 7
	
	fmt.Printf("🎯 Adivina el número entre 1 y 100 (máximo %d intentos)\n", maxIntentos)
	
	// 🔄 Canal para comunicación entre goroutines
	intentoChan := make(chan int)
	resultadoChan := make(chan string)
	
	// 🎮 Goroutine para procesar intentos
	go func() {
		for intento := range intentoChan {
			if intento == numeroSecreto {
				resultadoChan <- "¡GANASTE!"
				return
			} else if intento < numeroSecreto {
				resultadoChan <- "📈 El número es mayor"
			} else {
				resultadoChan <- "📉 El número es menor"
			}
		}
	}()
	
	for i := 0; i < maxIntentos; i++ {
		fmt.Printf("🤔 Intento %d/%d: ", i+1, maxIntentos)
		
		if !scanner.Scan() {
			break
		}
		
		numero, err := strconv.Atoi(strings.TrimSpace(scanner.Text()))
		if err != nil {
			fmt.Println("❌ Ingresa un número válido")
			continue
		}
		
		intentoChan <- numero
		
		select {
		case resultado := <-resultadoChan:
			if resultado == "¡GANASTE!" {
				fmt.Printf("🎉 %s Adivinaste en %d intentos\n", resultado, i+1)
				close(intentoChan)
				return
			}
			fmt.Println(resultado)
		case <-time.After(100 * time.Millisecond):
			fmt.Println("⏰ Procesando...")
		}
	}
	
	close(intentoChan)
	fmt.Printf("😔 Se acabaron los intentos. El número era: %d\n", numeroSecreto)
}

// 🐹 Muestra estadísticas de Go
func (a *AgentePeruano) mostrarEstadisticasGo() {
	fmt.Println("\n🐹 ESTADÍSTICAS GO")
	fmt.Println(strings.Repeat("─", 25))
	fmt.Println("📅 Creado: 2009 por Google")
	fmt.Println("🎯 Lenguaje compilado")
	fmt.Println("🔄 Concurrencia nativa")
	fmt.Println("⚡ Garbage collector eficiente")
	fmt.Println("🚀 Compilación ultra rápida")
	fmt.Println("🌐 Usado por: Google, Uber, Docker")
	fmt.Println("📦 Módulos nativos desde Go 1.11")
	fmt.Println("🐹 Mascota: Gopher")
	fmt.Println("🇵🇪 ¡Y ahora también en Perú!")
}

// 🔄 Contador de visitas en background
func (a *AgentePeruano) contadorVisitasBackground() {
	ticker := time.NewTicker(10 * time.Second)
	defer ticker.Stop()
	
	for range ticker.C {
		a.Mutex.RLock()
		visitas := a.ContadorVisitas
		a.Mutex.RUnlock()
		
		if visitas > 0 && visitas%5 == 0 {
			fmt.Printf("\n🎉 ¡Has usado el agente %d veces! ¡Gracias!\n", visitas)
		}
	}
}

// 👋 Se despide del usuario
func (a *AgentePeruano) despedirse() {
	fmt.Println("\n🐹 ¡Gracias por usar el Agente Peruano Go Edition!")
	fmt.Println("🔄 Todas las goroutines finalizadas correctamente")
	fmt.Println("🇵🇪 ¡Que viva el Perú y que viva Go!")
	fmt.Println("⚡ Simple, rápido y concurrente")
	fmt.Println("🚀 ¡Hasta la próxima, causa!")
}

// 🚀 Función principal
func main() {
	fmt.Println("🐹 Iniciando Agente Peruano Go Edition...")
	
	agente := NuevoAgentePeruano()
	agente.Ejecutar()
	
	fmt.Println("✅ Aplicación finalizada - Memoria liberada automáticamente")
}