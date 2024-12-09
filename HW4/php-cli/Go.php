// docker run --rm -v ${pwd}/HW4/php-cli/:/cli php:8.2-cli php /cli/Go.php

<?php

//Пункты 1 - 5



abstract class Book {
    protected $title;
    protected $author;
    protected $readCount = 0;

    public function __construct($title, $author) {
        $this->title = $title;
        $this->author = $author;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function incrementReadCount() {
        $this->readCount++;
    }

    public function getReadCount() {
        return $this->readCount;
    }

    abstract public function getAccess();
}

class DigitalBook extends Book {
    private $downloadLink;

    public function __construct($title, $author, $downloadLink) {
        parent::__construct($title, $author);
        $this->downloadLink = $downloadLink;
    }

    public function getAccess() {
        return "Ссылка на скачивание: " . $this->downloadLink;
    }
}

class PhysicalBook extends Book {
    private $libraryAddress;

    public function __construct($title, $author, $libraryAddress) {
        parent::__construct($title, $author);
        $this->libraryAddress = $libraryAddress;
    }

    public function getAccess() {
        return "Адрес библиотеки: " . $this->libraryAddress;
    }
}

// Демонстрация работы классов
$digitalBook = new DigitalBook("Программирование для начинающих", "Иван Иванов", "http://example.com/download");
$physicalBook = new PhysicalBook("Мысли материальны", "Петр Петров", "г. Москва, ул. Ленина, 1");

$books = [$digitalBook, $physicalBook];

foreach ($books as $book) {
    echo "Название: " . $book->getTitle() . PHP_EOL;
    echo "Автор: " . $book->getAuthor() . PHP_EOL;
    echo "Доступ: " . $book->getAccess() . PHP_EOL;
    echo "Количество прочтений: " . $book->getReadCount() . PHP_EOL;
    $book->incrementReadCount(); // Увеличиваем количество прочтений
    echo "После увеличения: " . $book->getReadCount() . PHP_EOL;
    echo str_repeat("-", 30) . PHP_EOL; // Разделитель
}




//Пункт 6

class A {
   public function foo() {
       static $x = 0;
       echo ++$x;
   }
}

// $a1 = new A();
// $a2 = new A();
// $a1->foo(); // 1
// $a2->foo(); // 2
// $a1->foo(); // 3
// $a2->foo(); // 4

//Статическая переменная $x принадлежит методу foo() и сохраняет своё значение между вызовами, но на каждый экземпляр класса она будет одна и та же.

class B extends A {
}

$a1 = new A();
$b1 = new B();
$a1->foo(); // 1
$b1->foo(); // 2
$a1->foo(); // 3
$b1->foo(); // 4
