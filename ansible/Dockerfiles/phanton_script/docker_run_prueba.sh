# Define el puerto base en el host
BASE_PORT=7000

# Número de contenedores (alumnos)
NUM_ALUMNOS=5

# Ejecuta contenedores con diferentes FLAGS y puertos
for i in $(seq 1 $NUM_ALUMNOS); do
    # Generar un identificador único y convertirlo a MD5
    UNIQUE_ID=$(echo "alumno_$i_$(date +%s%N)" | md5sum | awk '{print $1}')
    
    # Crear el FLAG en el formato ZHB{<MD5>}
    FLAG="ZHB{$UNIQUE_ID}"
    
    # Calcular el puerto único para cada alumno
    PORT=$((BASE_PORT + i))
    echo "$PORT $FLAG" >> phanton_script.txt	
    
    # Ejecutar el contenedor con la FLAG y el puerto
    docker run -d -p $PORT:1500 --name web_saga_scrolls_$i -e FLAG_CONTENT="$FLAG" web_saga_scrolls
    
    # Informar del contenedor creado
    echo "Contenedor para alumno $i ejecutándose en el puerto $PORT con FLAG: $FLAG"
done
