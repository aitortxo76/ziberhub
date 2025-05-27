#!/bin/bash

set -e

# 1. Obtener el hostname corto (sin dominio)
INVENTORY_HOSTNAME=$(hostname -s)

# 2. Extraer el DYNAMIC_FLAG del fichero de flags
DYNAMIC_FLAG=$(grep "^$INVENTORY_HOSTNAME " /tmp/dynamic_flags.txt | awk '{print $2}')

# 3. Verificación básica
if [[ -z "$DYNAMIC_FLAG" ]]; then
  echo "[ERROR] No se encontró DYNAMIC_FLAG para $INVENTORY_HOSTNAME en /tmp/dynamic_flags.txt"
  exit 1
fi

echo "[INFO] Hostname              : $INVENTORY_HOSTNAME"
echo "[INFO] DYNAMIC_FLAG          : $DYNAMIC_FLAG"

# 4. Ejecutar autoregistro con Ansible (localmente)
ansible-playbook -i localhost, /tmp/autoregister.yml \
  --connection=local \
  -e DYNAMIC_FLAG="$DYNAMIC_FLAG"

# 5. Ejecutar supervisord
exec /usr/bin/supervisord -c /etc/supervisord.conf

