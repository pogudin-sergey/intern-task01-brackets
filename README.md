# Утилита "Скобки" [![Build Status](https://travis-ci.com/pogudin-sergey/intern-task01-brackets.svg?token=szyRNoWvtxanu4zqA8en&branch=master)](https://travis-ci.com/pogudin-sergey/intern-task01-brackets)

[![Total Downloads](https://img.shields.io/packagist/dt/pogudin-sergey/intern-task01-brackets.svg)](https://packagist.org/packages/pogudin-sergey/intern-task01-brackets)
[![Latest Stable Version](https://img.shields.io/packagist/v/pogudin-sergey/intern-task01-brackets.svg)](https://packagist.org/packages/pogudin-sergey/intern-task01-brackets)

## Описание утилиты
Утилита командной строки проверяющая корректность расстановки скобок.

## Входные данные

Строка в которой содержатся открывающие и закрывающие скобки в арифметическом выражении - `(` и `)` соответственно. Проверяет, совпадает ли количество открывающихся и закрывающихся скобок и 
последовательность расставления скобок, например:

`5 * (4 - 2)` - всё ок

`5 * (4 - 2(` - ошбика

## Общие требования
- поддержка PHP версии 7.1 или выше
- файл run.php подразумевает запуск из консоли
- строка для проверки передается аргументом при вызове скрипта из консоли

# Примеры использования

## Вариант 1 
```bash
php -f ./script/run.php  '5 * (4 - 2)'
php -f ./script/run.php  '5 * (4 - 2('
```

## Вариант 2
```bash
chmod +x run.php

./script/run.php '5 * (4 - 2)'
./script/run.php '5 * (4 - 2('
```
