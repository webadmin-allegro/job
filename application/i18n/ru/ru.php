<?php defined('SYSPATH') or die('No direct script access.');
return array(
    // Переводы для валидации
    ':field must not be empty'  => 'Поле "<span>:field</span>" не должно быть пустым.',
    ':field not email address'  => 'Поле "<span>:field</span>" содержит не корректный e-mail адрес.',
    ':field captcha not valid' => 'В поле "<span>:field</span>" введён не верный код.',
    ':filed is not allowed file type' => 'Файл в поле "<span>:field</span>" должен иметь расширения <span>:param2</span>.',
    ':field does not match the required format'         => 'Поле "<span>:field</span>" не выбрано',
    ':field must not exceed :param2 characters long' => 'Поле "<span>:field</span>" имеет длину больше чем <span>:param2</span> символа.',
    ':field must be at least :param2 characters long' => 'Поле "<span>:field</span>" имеет длину меньше чем <span>:param2</span> символа.',
    'username already exists'	=>	'такое имя пользователя еже есть',
    'email already exists'	=>	'Извините такой email еже есть',
    'models/user.email.unique'	=>	'Извините такой email еже есть',
    'contact.csrf.Security::check' => 'ой ой ой',
    'desc must be at least 150 characters long' => 'Описание должно быть не менше 150 символов',

    // Переводы для полей форм
    'name' => 'Ваше имя',
    'email' => 'Ваш эл. адрес',
    'sex' => 'Укажите Ваш пол',
    'type_error' => 'Тип проблемы',
    'descr' => 'Описание проблемы',
    'captcha' => 'Введите код',
    'img' => 'Картинка с ошибкой'
);