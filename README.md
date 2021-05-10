# ricardokovalski/interest-calculation


  
## Instalação
  
```
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
