# Number

***Disclaimer:** This component is intended as an example and is not meant to be used in production. It is provided as a learning tool and should be used at your own risk.*



Number is a library for working with numbers in PHP. It provides a `Number` class that represents a decimal number and a `NumberCalculator` class that performs arithmetic operations on two numbers. Additionally, it has a `NumberFactory` class that creates a `Number` instance from a string value and a `NumberFormatter` class that formats a `Number` instance as a string with thousands separator and optional sign.



## Installation

Install the library via Composer:

```bash
composer require mezinn/number
```



## Usage

### Creating a `Number` instance

To create a `Number` instance, use the `NumberFactory` class as follows:

```php
use mezinn\number\NumberFactory;

$numberFactory = new NumberFactory();
$number = $numberFactory->create('123.45');
```



### Performing arithmetic operations

To perform arithmetic operations on two `Number` instances, use the `NumberCalculator` class as follows:

```php
use mezinn\number\Number;
use mezinn\number\NumberCalculator;
use mezinn\number\NumberFactory;

$numberFactory = new NumberFactory();
$numberCalculator = new NumberCalculator($numberFactory);

$a = $numberFactory->create('123.45');
$b = $numberFactory->create('67.89');
$c = $numberFactory->create('2');

$result = $numberCalculator->add($a, $b);
// $result is a Number instance representing the value 191.34

$result = $numberCalculator->subtract($a, $b);
// $result is a Number instance representing the value 55.56

$result = $numberCalculator->multiply($a, $b);
// $result is a Number instance representing the value 8381.02

$result = $numberCalculator->divide($a, $b);
// $result is a Number instance representing the value 1.81

$result = $numberCalculator->pow($a, $c);
// $result is a Number instance representing the value 15239.90

$result = $numberCalculator->sqrt($a);
// $result is a Number instance representing the value 11.11

```



### Formatting a `Number` instance

To format a `Number` instance as a string with thousands separator and optional sign, use the `NumberFormatter` class as follows:

```php
use mezinn\number\Number;
use mezinn\number\NumberFactory;
use mezinn\number\NumberFormatter;

$numberFactory = new NumberFactory();
$numberFormatter = new NumberFormatter();

$number = $numberFactory->create('-1234567.89');
$formatted = $numberFormatter->format($number, ',', true);
// $formatted is '-1,234,567.89'

```



## License

Number is released under the MIT License.