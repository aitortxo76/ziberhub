# Use our official Node.js image as a base saves much trouble
FROM echothrust/base-bookworm:node-22

# Copy src to /app
COPY src /app
COPY *.yml *.sql *.sh /tmp/
COPY config/supervisord.conf /etc/supervisord.conf

RUN set -ex \
    && apt-get update \
    && apt-get install --no-install-recommends -y mariadb-server mariadb-client  \
    && service mariadb start \
    && cd /app \
    && npm i express request mysql2 \
    && apt-get install --no-install-recommends -y ansible \
    && ansible-playbook -i 'localhost,' /tmp/autoregister.yml \
    && service mariadb stop \
    && rm -rf /usr/src/* /var/lib/apt/lists/* /tmp/* /usr/share/locale/* /usr/share/man/* /usr/share/doc/*
