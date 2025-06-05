# 💎 Ruby - Agente Peruano Elegant Edition
# ¡La elegancia y expresividad de Ruby al servicio del Perú! 🚀

require 'time'
require 'json'
require 'thread'

# 🇵🇪 Clase principal del Agente Peruano Ruby Edition
class AgentePeruano
  attr_reader :nombre, :version, :id, :emoji_peru, :fecha_creacion
  attr_accessor :configuracion, :historial_operaciones, :contador_visitas

  # 🏗️ Constructor elegante del Agente Peruano
  def initialize
    @nombre = '🤖 Agente Peruano Ruby Edition'
    @version = '2.0.0'
    @emoji_peru = '🇵🇪'
    @id = generar_id
    @fecha_creacion = Time.now
    @mutex = Mutex.new
    @contador_visitas = 0
    @historial_operaciones = []
    
    @configuracion = {
      idioma: 'es-PE',
      zona_horaria: 'America/Lima',
      moneda: 'PEN',
      pais: 'Perú',
      lenguaje: 'Ruby',
      elegancia: 'Máxima'
    }
    
    inicializar_saludos
    inicializar_datos_curiosos
    
    puts "#{@emoji_peru} Inicializando #{@nombre} v#{@version}"
    puts "🆔 ID del Agente: #{@id}"
    puts "📅 Creado: #{@fecha_creacion.strftime('%d/%m/%Y %H:%M:%S')}"
    puts "💎 Ruby: Elegante, expresivo y poderoso"
  end

  # 🎲 Genera un ID único para el agente
  private def generar_id
    timestamp = Time.now.to_i
    random = rand(1000..9999)
    "RUBY-AGENTE-#{timestamp}-#{random}"
  end

  # 👋 Inicializa los saludos peruanos con estilo Ruby
  private def inicializar_saludos
    @saludos = {
      casual: [
        '¡Hola causa! 👋',
        '¿Qué tal pata? 😄',
        '¡Oe hermano! 💪',
        '¡Hola pe! 🙋‍♂️'
      ],
      formal: [
        '¡Buenos días! 🌅',
        '¡Buenas tardes! ☀️',
        '¡Buenas noches! 🌙',
        'Es un placer saludarle 🤝'
      ],
      entusiasta: [
        '¡Buenas mi pana! 🤝',
        '¡Qué hay de nuevo viejo! 🎉',
        '¡Saludos desde el Perú! 🇵🇪',
        '¡Arriba Perú! 🚀'
      ]
    }
  end

  # 📚 Inicializa datos curiosos con hashes elegantes
  private def inicializar_datos_curiosos
    @datos_curiosos = [
      {
        id: 1,
        titulo: 'Machu Picchu',
        descripcion: 'Está ubicado a 2,430 metros sobre el nivel del mar',
        categoria: :geografia,
        emoji: '🏔️',
        año_descubrimiento: 1911
      },
      {
        id: 2,
        titulo: 'Ceviche Peruano',
        descripcion: 'Es patrimonio cultural inmaterial del Perú desde 2004',
        categoria: :gastronomia,
        emoji: '🍽️',
        año_descubrimiento: 'Ancestral'
      },
      {
        id: 3,
        titulo: 'Llamas y Alpacas',
        descripcion: 'Perú tiene el 70% de la población mundial de llamas',
        categoria: :fauna,
        emoji: '🦙',
        año_descubrimiento: 'Prehistórico'
      },
      {
        id: 4,
        titulo: 'Costa Peruana',
        descripcion: 'Tiene 3,080 kilómetros de longitud en el Océano Pacífico',
        categoria: :geografia,
        emoji: '🌊',
        año_descubrimiento: 'Siempre'
      },
      {
        id: 5,
        titulo: 'Imperio Inca',
        descripcion: 'Cusco fue la capital del Tahuantinsuyo',
        categoria: :historia,
        emoji: '🏛️',
        año_descubrimiento: 1200
      },
      {
        id: 6,
        titulo: 'Amazonía Peruana',
        descripcion: 'Cubre el 60% del territorio nacional',
        categoria: :geografia,
        emoji: '🌿',
        año_descubrimiento: 'Milenario'
      },
      {
        id: 7,
        titulo: 'La Marinera',
        descripcion: 'Es el baile nacional del Perú desde 1986',
        categoria: :cultura,
        emoji: '🎵',
        año_descubrimiento: 1879
      },
      {
        id: 8,
        titulo: 'Ruby Language',
        descripcion: 'Creado por Yukihiro Matsumoto en 1995, ¡más elegante que el oro inca!',
        categoria: :tecnologia,
        emoji: '💎',
        año_descubrimiento: 1995
      }
    ]
  end

  # 🚀 Ejecuta la aplicación principal con elegancia
  def ejecutar
    mostrar_bienvenida
    
    # 🔄 Hilo para estadísticas en background
    hilo_estadisticas = Thread.new { estadisticas_background }
    
    loop do
      mostrar_menu
      opcion = leer_opcion
      
      case opcion
      when 1
        saludar
      when 2
        mostrar_informacion
      when 3
        mostrar_configuracion
      when 4
        ejecutar_calculadora_elegante
      when 5
        mostrar_dato_curioso
      when 6
        mostrar_historial_operaciones
      when 7
        ejecutar_procesamiento_paralelo
      when 8
        jugar_trivia_interactiva
      when 9
        mostrar_estadisticas_ruby
      when 10
        generar_reporte_json
      when 0
        despedirse
        hilo_estadisticas.kill
        break
      else
        puts '❌ Opción no válida. Intenta de nuevo.'
      end
      
      puts "\n⏸️ Presiona Enter para continuar..."
      gets
    end
  end

  # 🎨 Muestra la bienvenida con estilo Ruby
  private def mostrar_bienvenida
    puts "\n#{'=' * 65}"
    puts '💎 ¡BIENVENIDO AL AGENTE PERUANO RUBY EDITION! 💎'
    puts '=' * 65
    puts '✨ Elegante, expresivo y 100% peruano'
    puts '🔮 Programación orientada a objetos pura'
    puts '🇵🇪 Desarrollado con amor y elegancia'
    puts '💎 Todo es un objeto en Ruby'
    puts "#{'=' * 65}\n"
  end

  # 📋 Muestra el menú principal
  private def mostrar_menu
    @mutex.synchronize { @contador_visitas += 1 }
    
    puts "\n🎯 ¿Qué quieres hacer? (Visita ##{@contador_visitas})"
    puts '1. 👋 Saludar (con estilo Ruby)'
    puts '2. ℹ️  Mostrar información del sistema'
    puts '3. ⚙️  Ver configuración'
    puts '4. 🧮 Calculadora elegante'
    puts '5. 🎲 Dato curioso del Perú'
    puts '6. 📊 Historial de operaciones'
    puts '7. ⚡ Procesamiento paralelo'
    puts '8. 🎮 Trivia interactiva'
    puts '9. 💎 Estadísticas Ruby'
    puts '10. 📄 Generar reporte JSON'
    puts '0. 🚪 Salir'
    print "\n👉 Elige una opción: "
  end

  # 📖 Lee la opción del usuario
  private def leer_opcion
    gets.chomp.to_i
  rescue
    -1
  end

  # 👋 Saluda al usuario con diferentes estilos
  private def saludar
    puts "\n🎭 ESTILOS DE SALUDO RUBY:"
    puts '1. 😄 Casual'
    puts '2. 🎩 Formal'
    puts '3. 🎉 Entusiasta'
    
    print '👉 Elige un estilo (1-3): '
    estilo_num = gets.chomp.to_i
    
    estilo = case estilo_num
             when 1 then :casual
             when 2 then :formal
             when 3 then :entusiasta
             else :casual
             end
    
    saludo = @saludos[estilo].sample
    
    puts "\n#{saludo}"
    puts "💎 Saludo estilo: #{estilo.to_s.upcase}"
    puts '🤖 Soy tu agente peruano más elegante!'
    
    print '📝 ¿Cómo te llamas? '
    nombre = gets.chomp.strip
    
    unless nombre.empty?
      puts "🎉 ¡Mucho gusto, #{nombre.capitalize}! Programado con elegancia para ti."
    end
  end

  # ℹ️ Muestra información del sistema
  private def mostrar_informacion
    puts "\n📊 INFORMACIÓN DEL SISTEMA RUBY"
    puts '─' * 45
    puts "🏷️  Nombre: #{@nombre}"
    puts "🔢 Versión: #{@version}"
    puts "🆔 ID: #{@id}"
    puts "📅 Creado: #{@fecha_creacion.strftime('%d/%m/%Y %H:%M:%S')}"
    puts "💎 Ruby Version: #{RUBY_VERSION}"
    puts "🏗️  Plataforma: #{RUBY_PLATFORM}"
    puts "✨ Elegancia: Máxima"
    puts "🔮 Todo es objeto: Sí"
    puts "📊 Visitas totales: #{@contador_visitas}"
  end

  # ⚙️ Muestra la configuración con elegancia
  private def mostrar_configuracion
    puts "\n⚙️ CONFIGURACIÓN DEL AGENTE RUBY"
    puts '─' * 45
    
    @configuracion.each do |clave, valor|
      emoji = obtener_emoji_configuracion(clave)
      puts "#{emoji} #{clave.to_s.upcase}: #{valor}"
    end
  end

  # 🎨 Obtiene emoji para configuración
  private def obtener_emoji_configuracion(clave)
    emojis = {
      idioma: '🌐',
      zona_horaria: '🕐',
      moneda: '💰',
      pais: '🇵🇪',
      lenguaje: '💎',
      elegancia: '✨'
    }
    
    emojis[clave] || '⚙️'
  end

  # 🧮 Calculadora elegante con métodos Ruby
  private def ejecutar_calculadora_elegante
    puts "\n🧮 CALCULADORA RUBY ELEGANTE"
    puts '─' * 35
    
    begin
      print '➕ Primer número: '
      num1 = Float(gets.chomp)
      
      print '🔢 Operación (+, -, *, /, **, sqrt, abs): '
      operacion = gets.chomp.strip
      
      resultado = case operacion
                  when 'sqrt'
                    calcular_raiz_cuadrada(num1)
                  when 'abs'
                    num1.abs
                  else
                    print '➕ Segundo número: '
                    num2 = Float(gets.chomp)
                    calcular_operacion(num1, operacion, num2)
                  end
      
      if resultado
        operacion_str = operacion == 'sqrt' ? "√#{num1}" : 
                       operacion == 'abs' ? "|#{num1}|" : 
                       "#{num1} #{operacion} #{gets.chomp.strip rescue 'N/A'}"
        
        puts "🎯 #{operacion_str} = #{resultado.round(4)}"
        puts '💎 Calculado con la elegancia de Ruby'
        
        # 📊 Guardar en historial thread-safe
        @mutex.synchronize do
          @historial_operaciones << {
            operacion: operacion_str,
            resultado: resultado,
            timestamp: Time.now,
            valida: true
          }
        end
      end
      
    rescue ArgumentError
      puts '❌ Error: Ingresa números válidos'
    rescue => e
      puts "❌ Error inesperado: #{e.message}"
    end
  end

  # 🧮 Calcula operaciones básicas
  private def calcular_operacion(num1, operacion, num2)
    case operacion
    when '+'
      num1 + num2
    when '-'
      num1 - num2
    when '*'
      num1 * num2
    when '/'
      if num2.zero?
        puts '❌ Error: División por cero'
        return nil
      end
      num1 / num2
    when '**'
      num1 ** num2
    else
      puts '❌ Operación no válida'
      nil
    end
  end

  # √ Calcula raíz cuadrada
  private def calcular_raiz_cuadrada(num)
    if num < 0
      puts '❌ Error: No se puede calcular raíz cuadrada de número negativo'
      return nil
    end
    
    Math.sqrt(num)
  end

  # 🎲 Muestra un dato curioso con filtros elegantes
  private def mostrar_dato_curioso
    puts "\n🎲 DATO CURIOSO DEL PERÚ"
    puts '─' * 35
    
    puts '🏷️ Filtrar por categoría:'
    categorias = @datos_curiosos.map { |d| d[:categoria] }.uniq
    categorias.each_with_index { |cat, i| puts "#{i + 1}. #{cat.to_s.capitalize}" }
    puts "#{categorias.length + 1}. Aleatorio"
    
    print '👉 Elige una categoría: '
    opcion = gets.chomp.to_i
    
    datos_filtrados = if opcion > 0 && opcion <= categorias.length
                       categoria_elegida = categorias[opcion - 1]
                       @datos_curiosos.select { |d| d[:categoria] == categoria_elegida }
                     else
                       @datos_curiosos
                     end
    
    dato = datos_filtrados.sample
    
    puts "\n#{dato[:emoji]} #{dato[:titulo]}"
    puts "📝 #{dato[:descripcion]}"
    puts "🏷️ Categoría: #{dato[:categoria].to_s.upcase}"
    puts "📅 Año: #{dato[:año_descubrimiento]}"
    puts "🆔 ID: #{dato[:id]}"
  end

  # 📊 Muestra historial de operaciones
  private def mostrar_historial_operaciones
    puts "\n📊 HISTORIAL DE OPERACIONES RUBY"
    puts '─' * 40
    
    if @historial_operaciones.empty?
      puts '📭 No hay operaciones en el historial'
      return
    end
    
    @historial_operaciones.each_with_index do |op, index|
      estado = op[:valida] ? '✅' : '❌'
      tiempo = op[:timestamp].strftime('%H:%M:%S')
      puts "#{index + 1}. #{estado} #{op[:operacion]} = #{op[:resultado].round(4)} (#{tiempo})"
    end
    
    operaciones_validas = @historial_operaciones.count { |op| op[:valida] }
    puts "\n📈 Total de operaciones: #{@historial_operaciones.length}"
    puts "✅ Operaciones válidas: #{operaciones_validas}"
    puts "❌ Operaciones con error: #{@historial_operaciones.length - operaciones_validas}"
  end

  # ⚡ Procesamiento paralelo con hilos Ruby
  private def ejecutar_procesamiento_paralelo
    puts "\n⚡ PROCESAMIENTO PARALELO RUBY"
    puts '─' * 40
    
    num_hilos = 5
    operaciones_por_hilo = 50000
    
    puts "🔄 Ejecutando #{num_hilos} hilos"
    puts "🧮 #{operaciones_por_hilo} operaciones por hilo"
    
    inicio = Time.now
    
    hilos = []
    resultados = Queue.new
    
    num_hilos.times do |i|
      hilos << Thread.new(i) do |id|
        suma = 0
        operaciones_por_hilo.times { |j| suma += j * j }
        
        resultados << { hilo_id: id + 1, suma: suma }
        puts "🔄 Hilo #{id + 1} completado"
      end
    end
    
    # 🔄 Esperar a que todos los hilos terminen
    hilos.each(&:join)
    
    # 📊 Recopilar resultados
    suma_total = 0
    while !resultados.empty?
      resultado = resultados.pop
      suma_total += resultado[:suma]
    end
    
    duracion = Time.now - inicio
    total_operaciones = num_hilos * operaciones_por_hilo
    
    puts "\n🎯 Resultados del Procesamiento Paralelo:"
    puts "⏱️  Tiempo: #{duracion.round(4)} segundos"
    puts "🔢 Operaciones totales: #{total_operaciones}"
    puts "🚀 Ops/segundo: #{(total_operaciones / duracion).round(0)}"
    puts "📊 Suma total: #{suma_total}"
    puts "💎 ¡Ruby maneja hilos con elegancia!"
  end

  # 🎮 Trivia interactiva
  private def jugar_trivia_interactiva
    puts "\n🎮 TRIVIA PERUANA RUBY"
    puts '─' * 30
    
    dato = @datos_curiosos.sample
    
    puts "❓ Pregunta sobre: #{dato[:titulo]}"
    puts "🤔 ¿En qué año fue descubierto/establecido?"
    puts "💡 Pista: Categoría #{dato[:categoria]}"
    
    print '👉 Tu respuesta: '
    respuesta = gets.chomp.strip
    
    if respuesta.downcase == dato[:año_descubrimiento].to_s.downcase
      puts "🎉 ¡CORRECTO! #{dato[:emoji]}"
    else
      puts "❌ Incorrecto. La respuesta era: #{dato[:año_descubrimiento]}"
    end
    
    puts "📚 Dato completo: #{dato[:descripcion]}"
  end

  # 💎 Muestra estadísticas de Ruby
  private def mostrar_estadisticas_ruby
    puts "\n💎 ESTADÍSTICAS RUBY"
    puts '─' * 30
    puts '📅 Creado: 1995 por Yukihiro Matsumoto'
    puts '🎯 Lenguaje interpretado'
    puts '🔮 Todo es un objeto'
    puts '✨ Sintaxis elegante y expresiva'
    puts '🌐 Usado por: GitHub, Shopify, Airbnb'
    puts '💎 Gemas (gems): 170,000+'
    puts '🚀 Ruby on Rails: Framework web popular'
    puts '🎨 Filosofía: Felicidad del programador'
    puts '🇵🇪 ¡Y ahora también brillando en Perú!'
  end

  # 📄 Genera reporte en JSON
  private def generar_reporte_json
    puts "\n📄 GENERANDO REPORTE JSON"
    puts '─' * 35
    
    reporte = {
      agente: {
        nombre: @nombre,
        version: @version,
        id: @id,
        fecha_creacion: @fecha_creacion.iso8601,
        lenguaje: 'Ruby'
      },
      estadisticas: {
        visitas_totales: @contador_visitas,
        operaciones_realizadas: @historial_operaciones.length,
        datos_curiosos_disponibles: @datos_curiosos.length
      },
      configuracion: @configuracion,
      ultimo_acceso: Time.now.iso8601
    }
    
    json_elegante = JSON.pretty_generate(reporte)
    
    puts "📊 Reporte generado:"
    puts json_elegante
    puts "\n💎 JSON generado con elegancia Ruby"
  end

  # 🔄 Estadísticas en background
  private def estadisticas_background
    loop do
      sleep(15)
      if @contador_visitas > 0 && @contador_visitas % 10 == 0
        puts "\n🎉 ¡Has usado el agente #{@contador_visitas} veces! ¡Ruby rocks!"
      end
    end
  end

  # 👋 Se despide del usuario con elegancia
  private def despedirse
    puts "\n💎 ¡Gracias por usar el Agente Peruano Ruby Edition!"
    puts '✨ Programado con elegancia y expresividad'
    puts '🇵🇪 ¡Que viva el Perú y que viva Ruby!'
    puts '🔮 Todo es un objeto, incluso tu satisfacción'
    puts '🚀 ¡Hasta la próxima, causa elegante!'
  end
end

# 🚀 Ejecutar la aplicación si es el archivo principal
if __FILE__ == $0
  puts '💎 Iniciando Agente Peruano Ruby Edition...'
  
  begin
    agente = AgentePeruano.new
    agente.ejecutar
  rescue Interrupt
    puts "\n\n👋 ¡Adiós! Aplicación terminada elegantemente."
  rescue => e
    puts "❌ Error inesperado: #{e.message}"
    puts "🔍 Backtrace: #{e.backtrace.first(3).join(', ')}"
  ensure
    puts '✅ Aplicación Ruby finalizada con elegancia'
  end
end