# Start from base debian image
FROM debian:bullseye

# Let us set some env variable
ENV PHP_VER=7.4
ENV WP_VER=5.8.4

# Update and install required modules
RUN  apt update && \
     apt install nginx php${PHP_VER}-fpm php${PHP_VER}-mysql wget libsodium-dev -y


# Getting ca certificates for our download domains
RUN openssl s_client -connect downloads.wordpress.org:443 -showcerts < /dev/null 2>/dev/null | openssl x509 -outform PEM > /usr/lib/ssl/certs/downloads.wordpress.org.crt
RUN update-ca-certificates


# Enable openssl extension
RUN sed -ie 's/^;extension=openssl/extension=openssl/' /etc/php/${PHP_VER}/fpm/php.ini

# Copy nginx config to use php-fpm as fast CGI Server
COPY nginx-php/opentxt.conf  /etc/nginx/sites-available/default

# Download and install  Wordpress
RUN  wget --no-check-certificate https://wordpress.org/wordpress-${WP_VER}.tar.gz && \
     tar -xvf wordpress-${WP_VER}.tar.gz -C /var/www/

# Make a soft link of /uploads into /var/www/wordpress/wp-contents/uploads

RUN mkdir /uploads 
RUN ln -s  /uploads  /var/www/wordpress/wp-content/uploads
# Remove the source upload folder and make the above symlink dangling. The source will be mounted at container initilization
RUN rm -rf /uploads

# Warning: This is only for demo and not for any actual development
# The below file has a security vulnerability of having clear text mysql password 
# and should not to be on a git repo
# Todo: work for an alternative during pre-prod and prod 
# Maybe sed inline replacement during image building? Password comes as a build argument?
COPY nginx-php/wp-config.php /var/www/wordpress/

#Intall wp-cli
RUN wget  --no-check-certificate https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar && \
    chmod +x wp-cli.phar && \
    mv wp-cli.phar /usr/local/bin/wp

#Let us add some themes
#This should ideally come from a host volume mounted
COPY plugins/ /var/www/wordpress/wp-content/plugins

#Run daemon at the start
COPY nginx-php/start-daemon.sh /
RUN  chmod +x /start-daemon.sh
CMD  ["/start-daemon.sh"]