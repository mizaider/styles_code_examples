#!/bin/bash



##############################################################################
#                                                                            #
#  Всё сделано с использованием нейронной сети, костылей и такой-то матери.  #
#  Скрипт писал искусственный интеллект.                                     #
#  Автор ответственности не несёт.                                           #
#  Используй на свой страх и риск.                                           #
#                                                                            #
##############################################################################



# Красим
L_RED='\033[1;31m' # светло-красный цвет
L_GREEN='\033[1;32m' # светло-зелёный цвет
YELLOW='\033[1;33m' # жёлтый цвет
WHITE='\033[1;37m' # белый цвет
D_GREY='\033[1;30m' # тёмно-серый цвет
NC='\033[0m' # нет цвета


TAB=$'\t' # символ табуляции



# Функция проверки корректного выполнения команды
check_command_exec_status () {
  if [ $1 -eq 0 ]
    then
      echo -e "${L_GREEN}ok${NC}"
      echo
      sleep 1
  else
    echo -e "${L_RED}error${NC}"
    echo
    exit
  fi
}



# Функция создания кофига сайта в Apache
create_apache_site_conf () {
cat > /etc/apache2/sites-available/$1.conf << EOF
<VirtualHost *:80>
${TAB}ServerName www.$1
${TAB}ServerAlias $1

${TAB}ServerAdmin webmaster@localhost
${TAB}DocumentRoot /home/root/www/public_html/$1

${TAB}ErrorLog ${APACHE_LOG_DIR}/error.log
${TAB}CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>

<IfModule mod_ssl.c>
${TAB}<VirtualHost *:443>
${TAB}${TAB}ServerAdmin webmaster@localhost
${TAB}${TAB}ServerName www.$1
${TAB}${TAB}ServerAlias $1
${TAB}${TAB}DocumentRoot /home/root/www/public_html/$1
${TAB}${TAB}ErrorLog ${APACHE_LOG_DIR}/error.log
${TAB}${TAB}CustomLog ${APACHE_LOG_DIR}/access.log combined
${TAB}${TAB}SSLEngine on
${TAB}${TAB}SSLCertificateFile /etc/ssl/certs/ssl-cert-snakeoil.pem
${TAB}${TAB}SSLCertificateKeyFile /etc/ssl/private/ssl-cert-snakeoil.key
${TAB}${TAB}<FilesMatch "\.(cgi|shtml|phtml|php)$">
${TAB}${TAB}${TAB}SSLOptions +StdEnvVars
${TAB}${TAB}</FilesMatch>
${TAB}${TAB}<Directory /usr/lib/cgi-bin>
${TAB}${TAB}${TAB}SSLOptions +StdEnvVars
${TAB}${TAB}</Directory>
${TAB}${TAB}BrowserMatch "MSIE [2-6]" \\
${TAB}${TAB}${TAB}nokeepalive ssl-unclean-shutdown \\
${TAB}${TAB}${TAB}downgrade-1.0 force-response-1.0
${TAB}${TAB}BrowserMatch "MSIE [17-9]" ssl-unclean-shutdown
${TAB}</VirtualHost>
</IfModule>

# vim: syntax=apache ts=4 sw=4 sts=4 sr noet
EOF
}



echo
echo
read -p 'Введи название проекта [ напр.: kek ]: ' project_name

while [ -z "$project_name" ]
  do
    read -p 'Ты ничего не ввёл! Выходим? [введи y/n] ' yn
      case "$yn" in
        n)
          read -p 'Введи название проекта [ напр.: kek ]: ' project_name
          ;;
        y)
          echo
          echo 'Всего плохого!'
          exit
          ;;
        *)
          continue
          ;;
      esac
done



read -p 'Введи имя домена [ напр.: mydomain.ru ]: ' domain_name

while [ -z "$domain_name" ]
  do
    read -p 'Лолирую с тебя! Ты ничего не ввёл! Выходим? [введи y/n] ' yn
      case "$yn" in
        n)
          read -p 'Введи имя домена [напр. mydomain.ru]: ' domain_name
          ;;
        y)
          echo
          echo 'Всего плохого!'
          exit
          ;;
        *)
          continue
          ;;
      esac
done



read -p 'Введи букву диска, где будут располагаться твои проекты [ напр.: d ]: ' disk_name

while [ -z "$disk_name" ]
  do
    read -p 'Ты ничего не ввёл! Выходим, Виталька? [ введи y/n ] ' yn
      case "$yn" in
        n)
          read -p 'Введи букву диска, где будут располагаться проекты [ напр.: d ]: ' disk_name
          ;;
        y)
          echo
          echo 'Всего плохого!'
          exit
          ;;
        *)
          continue
          ;;
      esac
done



if [ ! -d /mnt/$disk_name/projects-back-end/$domain_name/ ]
  then
    echo
    echo 'Создаём папку в Windows'
    mkdir -p /mnt/$disk_name/projects-back-end/$domain_name/ &> /dev/null
      check_command_exec_status $?
fi



if [ ! -e /home/$USER/www/public_html/$domain_name ] && [ -d /mnt/$disk_name/projects-back-end/$domain_name/ ]
  then
    echo 'Создаём линк в Linux на папку в Windows'
    ln -s /mnt/$disk_name/projects-back-end/$domain_name /home/$USER/www/public_html/$domain_name &> /dev/null
      check_command_exec_status $?
elif [ ! -d /mnt/$disk_name/projects-back-end/$domain_name/ ]
  then
    echo -e "${L_RED}Такой папки в Windows не существует. Что-то пошло не так!${NC} \n${YELLOW}[${NC}${WHITE}/mnt/$disk_name/projects-back-end/$domain_name/${NC}${YELLOW}]${NC}"
    exit
fi



if [ ! -e /etc/apache2/sites-available/$domain_name.conf ]
  then
    echo 'Создаём конфиг сайта в Apache'
    touch /etc/apache2/sites-available/$domain_name.conf &> /dev/null
      check_command_exec_status $?
    echo 'Пишем в конфиг сайта в Apache'
    create_apache_site_conf $domain_name
      check_command_exec_status $?
fi



if [ ! -e /etc/apache2/sites-enabled/$domain_name.conf ] && [ -e /etc/apache2/sites-available/$domain_name.conf ]
  then
    echo 'Активируем сайт'
    ln -s ../sites-available/$domain_name.conf /etc/apache2/sites-enabled/$domain_name.conf &> /dev/null
      check_command_exec_status $?
elif [ ! -e /etc/apache2/sites-available/$domain_name.conf ]
  then
    echo -e "${L_RED}Такого конфига сайта в Apache не существует. Что-то пошло не так!${NC} \n${YELLOW}[${NC}${WHITE}/etc/apache2/sites-available/$domain_name.conf${NC}${YELLOW}]${NC}"
    exit
fi



if [ ! -d ~/tools/ ]
  then
    no_tools=0
    echo -e "Создаём папку ${YELLOW}~/tools/${NC}"
    mkdir -p ~/tools/ &> /dev/null
      check_command_exec_status $?
else
  no_tools=1
fi



if [ ! -e ~/tools/$project_name ] && [ -e /home/$USER/www/public_html/$domain_name ]
  then
    echo -e "Создаём линк ${YELLOW}~/tools/$project_name${NC} на ссылку-папку в Linux $domain_name"
    ln -s /home/$USER/www/public_html/$domain_name ~/tools/$project_name &> /dev/null
      check_command_exec_status $?
elif [ ! -e /home/$USER/www/public_html/$domain_name ]
  then
    echo -e "${L_RED}Такой ссылки-папки в Linux не существует. Что-то пошло не так!${NC} \n${YELLOW}[${NC}${WHITE}/home/$USER/www/public_html/$domain_name${NC}${YELLOW}]${NC}"
    exit
fi



echo
echo
echo -e "${L_GREEN}Good news everyone!${NC}"

echo
echo
echo -e "Твой проект называется: ${YELLOW}$project_name${NC}"
echo -e "Твой домен: ${YELLOW}$domain_name${NC}"
echo -e "Путь до папки твоего сайта в Windows: ${YELLOW}/mnt/$disk_name/projects-back-end/$domain_name/${NC}"
echo -e "Путь до папки твоего сайта в Linux: ${YELLOW}/home/$USER/www/public_html/$domain_name${NC}"

if [ $no_tools -eq 0 ]
  then
    echo -e "Также я заботливо создал папку ${YELLOW}~/tools/${NC} для коротких линков на твои сайты, и не только, и уже положил туда линк на твой новый сайт ${YELLOW}$domain_name${NC}"
else
  echo -e "Также я заботливо положил в папку ${YELLOW}~/tools/${NC} линк на твой новый сайт ${YELLOW}$domain_name${NC}"
fi

echo
echo -e "${WHITE}Если у тебя был запущен Apache, то его нужно перезапустить командой${NC} ${YELLOW}service apache2 restart${NC}"
echo -e "${WHITE}Не забудь это сделать! Не будь Виталькой! (:${NC}"

echo
echo
echo -e "${L_GREEN}Всего плохого!${NC}"

echo
echo
echo -e "${D_GREY}Скрипт работал: $SECONDS s${NC}"