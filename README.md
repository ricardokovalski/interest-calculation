<h1 align="center">ricardokovalski/interest-calculation</h1>

<p align="center">
    <strong>Uma biblioteca PHP com as regras para cálculo de juros.</strong>
</p>

<p align="center">
    <a href="https://github.com/ricardokovalski/interest-calculation"><img src="http://img.shields.io/badge/source-ricardokovalski/interest--calculation-blue.svg" alt="Source Code"></a>
    <a href="https://php.net"><img src="https://img.shields.io/badge/php-%3E=5.6-777bb3.svg" alt="PHP Programming Language"></a>
    <a href="https://github.com/ricardokovalski/interest-calculation/releases"><img src="https://img.shields.io/github/release/ricardokovalski/interest-calculation.svg" alt="Source Code"></a>
    <a href="https://packagist.org/packages/ricardokovalski/interest-calculation"><img src="https://poser.pugx.org/ricardokovalski/interest-calculation/v/stable" alt="Source Code"></a>
    <a href="https://github.com/ricardokovalski"><img src="http://img.shields.io/badge/author-@ricardokovalski-blue.svg" alt="Author"></a>
    <a href="https://github.com/ricardokovalski/interest-calculation/blob/main/LICENSE"><img src="https://img.shields.io/badge/license-MIT-brightgreen.svg" alt="Read License"></a>
</p>

## Sobre

ricardokovalski/interest-calculation é uma biblioteca PHP que contém as regras para cálculo de juros Simples, Compostos e Financiamento.
  
## Instalação

Instale este pacote como uma dependência usando [Composer](https://getcomposer.org).

```bash
composer require ricardokovalski/interest-calculation
```
  
## Uso básico

### Juros de Financiamento

```php
use RicardoKovalski\InterestCalculation\Types\Financial;

$interest = new Financial(0.98);

// Adiciona um valor ao TotalCapital
$interest->appendTotalCapital(227.49);

// Adiciona um valor ao InterestValue
$interest->appendInterestValue(1.55);

// Reseta o valor de TotalCapital para 0.00
$interest->resetTotalCapital();

// Reseta o valor de TotalCapital para 200.00
$interest->resetTotalCapital(200.00);

// Reseta o valor de InterestValue para 0.00
$interest->resetInterestValue();

// Reseta o valor de InterestValue para 2.75
$interest->resetInterestValue(2.75);

// Obter o valor de TotalCapital
$interest->getTotalCapital();

// Obter o valor de InterestValue
$interest->getInterestValue();

// Obter o valor de InterestRates
$interest->getInterestRates();

// Verifica se o valor de InterestValue está zerado
$interest->interestValueIsZeroed();

// Obter valor do juros da 2ª parcela
$interest->getValueCalculatedByInstallment(2);

// Obter valor do juros reverso da 12ª parcela
$interest->getReverseInterestByNumberInstallments(12);
```

### Outros tipos de Juros

Para juros compostos, utilize a classe Compound.

```php
use RicardoKovalski\InterestCalculation\Types\Compound;
  
$interest = new Compound(3.69);
```

Para juros simples, utilize a classe Simple.

```php
use RicardoKovalski\InterestCalculation\Types\Simple;

$interest = new Simple(2.99);
```

## Copyright and License

The ricardokovalski/interest-calculation library is copyright © [Ricardo Kovalski](https://github.com/ricardokovalski)
and licensed for use under the terms of the
MIT License (MIT). Please see [LICENSE](LICENSE) for more information.
