This is a basic web application to learn how ModSecurity works, providing both
ModSecurity protected and ModSecurity disabled versions of a simple page with
various vulnerabilities.  This application also exposes a browsable directory
showing all the ModSecurity rules and configurations and a page that allows you
to search through the Apache error logs to see ModSecurity block rules.

# Install steps for Ubuntu 14.04

    sudo -s
    cd /var/www/html
    rm index.html
    git clone https://github.com/meeas/dojo-modsec.git ./
    apt-get install apache2 libapache2-modsecurity mysql-server php5 php5-mysql
    mysql -u root -p < modsec.sql
    ln -s modsec.apache.conf /etc/apache2/sites-available/modsec.conf
    a2dissite 000-default
    a2ensite modsec
    chmod a+x /var/log/apache2
    chmod a+r /var/log/apache2/*
    editor /etc/logrotate.d/apache2
        ### change "create 640 root adm" to "create 644 root adm"

Note, this will not currently work on Ubuntu 16.04 because our PHP code is
not compatible with PHP7, which removed the traditional method of accessing
databases.  Pull requests to make this work on both PHP5 and PHP7 would be very
welcome!
