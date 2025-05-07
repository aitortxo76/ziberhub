if [ -z "${DYNAMIC_FLAG}" ]; then
  echo "DYNAMIC_FLAG environment variable not set using default"
  touch /tmp/autorun00.sh.notrun
else
  echo "Using DYNAMIC_FLAG = ${DYNAMIC_FLAG}"
  sed -e "s#ETSCTF_FLAG_PLACEHOLDER#${DYNAMIC_FLAG}#" -i /etc/mysql_init.sql
  touch /tmp/autorun00.sh.run
fi
