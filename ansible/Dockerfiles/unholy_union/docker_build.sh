# Define el puerto base en el host
BASE_PORT=9000

# Número de contenedores (alumnos)
NUM_ALUMNOS=3

# Ejecuta contenedores con diferentes FLAGS y puertos
for i in $(seq 1 $NUM_ALUMNOS); do
    # Generar un identificador único y convertirlo a MD5
    UNIQUE_ID=$(echo "alumno_$i_$(date +%s%N)" | md5sum | awk '{print $1}')

    # Crear el FLAG en el formato ZHB{<MD5>}
    FLAG="ZHB{$UNIQUE_ID}"

    # Calcular el puerto único para cada alumno
    PORT=$((BASE_PORT + i))
    # Guardamos las flags generadas asociadas a cada puerto
    echo "$PORT $FLAG" >> unholy_union.txt

    # Ejecutar el contenedor con la FLAG y el puerto
    docker run -d -p $PORT:3000 --name very_easy_sqli_$i -e FLAG_CONTENT="$FLAG" very-easy-sqli

    # Informar del contenedor creado
    echo "Contenedor para alumno $i ejecutándose en el puerto $PORT con FLAG: $FLAG"
done
