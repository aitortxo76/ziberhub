FROM node:20-slim

# Install necessary dependencies
RUN apt-get update && \
    apt-get install -y --no-install-recommends supervisor chromium && \
    rm -rf /var/lib/apt/lists/* /var/cache/apt/* /tmp/* /var/tmp/*

# Set environment variable for Puppeteer to use the system-installed Chromium
ENV PUPPETEER_SKIP_DOWNLOAD=true \
    PUPPETEER_EXECUTABLE_PATH=/usr/bin/chromium

# Install Node.js dependencies
WORKDIR /app
COPY challenge .
RUN npm install --omit=dev


COPY flag.txt /app

COPY config/supervisord.conf /etc/supervisord.conf

# Expose port
EXPOSE 1500

# Start supervisor

# ENTRYPOINT ["/bin/sh", "-c", "/usr/bin/supervisord -c /etc/supervisord.conf"]
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]
