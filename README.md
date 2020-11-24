# ricardokovalski/calculator-interest-sdk
  
[![Latest Stable Version](https://poser.pugx.org/ricardokovalski/calculator-installment/v/stable)](https://packagist.org/packages/ricardokovalski/calculator-interest-sdk)
[![Author](http://img.shields.io/badge/author-@ricardokovalski-blue.svg?style=flat-square)](https://github.com/ricardokovalski)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](https://github.com/ricardokovalski/calculator-interest-sdk/blob/master/LICENSE)
  
## Instalação
  
```
composer require ricardokovalski/calculator-interest-sdk
```
  
## Uso básico

### Juros Simples

```php
use Moguzz\Interest\Types\Simple;

$interestRates = (new Simple(0.98))
    ->setTotalCapital(227.49);

$interestRates->getInterestRates(); // 0.0098
$interestRates->getValueCalculated(); // 229.719402

$interestRates->setInterestRates(1.30);

$interestRates->getInterestRates(); // 0.013
$interestRates->getValueCalculated(); // 230.44737
```
  
### Juros Compostos
  
```php
use Moguzz\Interest\Types\Compound;
  
$interestRates = (new Compound(3.69))
    ->setTotalCapital(750.98)
    ->setNumberInstallment(1);
  
$interestRates->getInterestRates(); // 0.0369
$interestRates->getNumberInstallment(); // 1
$interestRates->getValueCalculated(); // 750.98

$interestRates->setNumberInstallment(2);

$interestRates->getInterestRates(); // 0.0369
$interestRates->getNumberInstallment(); // 2
$interestRates->getValueCalculated(); // 778.691162

$interestRates->setInterestRates(1.99);

$interestRates->getInterestRates(); // 0.0199
$interestRates->getNumberInstallment(); // 2
$interestRates->getValueCalculated(); // 765.924502
```

### Juros de Financiamento

```php
use Moguzz\Interest\Types\Financial;

$interestRates = (new Financial(2.99))
    ->setTotalCapital(400.00)
    ->setNumberInstallment(1);

$interestRates->getInterestRates(); // 0.0299
$interestRates->getNumberInstallment(); // 1
$interestRates->getValueCalculated(); // 400

$interestRates->setNumberInstallment(2);

$interestRates->getInterestRates(); // 0.0299
$interestRates->getNumberInstallment(); // 2
$interestRates->getValueCalculated(); // 104.50702103552

$interestRates->setInterestRates(1.99);

$interestRates->getInterestRates(); // 0.0199
$interestRates->getNumberInstallment(); // 2
$interestRates->getValueCalculated(); // 104.50702103552
```
