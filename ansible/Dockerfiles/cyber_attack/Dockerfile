FROM php:7.4-apache

# Install necessary extensions and tools
RUN apt-get update && apt-get install -y \
    supervisor \
    unzip \
    ansible


# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Enable Apache modules
RUN a2enmod rewrite cgi proxy proxy_fcgi proxy_http

# Set working directory
WORKDIR /var/www/html

# Copy source files
COPY src/ /var/www/html/

# Copy Supervisor configuration
COPY supervisor/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Copy Apache configuration
COPY apache/apache2.conf /etc/apache2/conf-available/servername.conf
RUN a2enconf servername

# Move CGI script to the correct location
RUN mv /var/www/html/cgi-bin/ /usr/lib/ && chmod -R +x /usr/lib/cgi-bin/

# Copy ziberhub
COPY ziberhub/flag.txt /flag.txt
COPY ziberhub/autoregister.yml /tmp/autoregister.yml
COPY ziberhub/variables.yml /tmp/variables.yml
COPY ziberhub/dynamic_flags.txt /tmp/dynamic_flags.txt
COPY ziberhub/entrypoint.sh /entrypoint.sh


RUN chmod +x /entrypoint.sh

# Expose port 80 for Apache
# EXPOSE 80

# Command to run entry script
CMD ["/entrypoint.sh"]