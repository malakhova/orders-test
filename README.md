Установка
------------
В файл vagrant/config/vagrant-local.example.yml добавить свой GitHub access токен

Перейти в директорию проектаи исполнить:
~~~
vagrant up
~~~
После установки зайти в машину и применить миграции
~~~
vagrant shh
cd /app
php yii migrate
~~~

проект доступен по ссылке - orders.test
