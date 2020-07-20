//создание entity
php bin/console make:entity

//Создайте новую миграцию
php bin/console make:migration
php bin/console doctrine:migrations:migrate
//пропустить миграцию
php bin/console doctrine:migrations:version 20191203192917 --add

//создадим новый контроллер
php bin/console make:controller ProductController
//сгенерировать весь CRUD из сущности Doctrine
php bin/console make:crud Product

php bin/console cache:clear
php bin/console cache:clear --no-warmup --env=prod
php bin/console assets:install

//установка react и babel
yarn add @babel/preset-react --dev
yarn add react-router-dom
yarn add --dev react react-dom prop-types axios
yarn add @babel/plugin-proposal-class-properties @babel/plugin-transform-runtime

//установка redux
yarn add redux
yarn add react-redux
//Redux-devtools: опционально, дает некоторые полезные инструменты для разработки.
npm install --save-dev redux-devtools

//material ui
yarn add material-ui