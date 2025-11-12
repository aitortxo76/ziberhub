# Production image
FROM node:20

# Install system packages
RUN apt-get update && apt-get install -y \
    supervisor \
    nginx \
    redis \
    ansible \
    && rm -rf /var/lib/apt/lists/*

# Set up application directory
RUN mkdir -p /app
WORKDIR /app

# Copy server dependencies and install them
COPY ./challenge/server/package.json ./server/package.json
WORKDIR /app/server
RUN yarn

# Return to root and install challenge dependencies
WORKDIR /app
COPY ./challenge/package.json ./package.json
RUN yarn

# Copy the entire challenge folder
COPY ./challenge/ .

# Setup configs
COPY config/supervisord.conf /etc/supervisord.conf
COPY config/nginx.conf /etc/nginx/nginx.conf

# Add readflag binary or any other necessary file
COPY flag.txt /flag.txt


# Command to run the application
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]