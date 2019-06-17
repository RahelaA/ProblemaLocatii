# ProblemaLocatii

## Installation

- git clone https://github.com/RahelaA/ProblemaLocatii.git in your server's root directory
- cd into project directory and run composer update to install phpunit
- use ./vendor/bin/phpunit to trigger a test run
- to see an example of the solved problem go to http://localhost/ProblemaLocatii/problema.php

## Usage
- You can create a new list of boarding cards using the App class as follows
```php
$app = new App();
$app->addBoardingCard(new BoardingCard('Madrid', 'Barcelona', 'seat 45B', 'train 78A', ''));
$app->addBoardingCard(new BoardingCard('Stockholm', 'New York JFK', 'Gate 45B, seat 3A', 'flight SK455 ', 'Baggage will we automatically transferred from your last leg.'));
$app->addBoardingCard(new BoardingCard('Gerona Airport', 'Stockholm', 'Gate 22, seat 7B', 'flight SK22', 'Baggage drop at ticket counter 344.'));
$app->addBoardingCard(new BoardingCard('Barcelona', 'Gerona Airport', '', 'airport bus', ''));
```

- To get the sorted boarding cards array call the ```$app->sortBoardingCards()``` method

```php
$sortedBoardingCards = $app->sortBoardingCards();
```

- To output the formatted string for each boarding card use the following code
```php
foreach ($sortedBoardingCards as $boardingCard) {
    echo nl2br($boardingCard->getStringOutput(). "\n");
}
 echo "You have arrived at your final destination.";
```

    
    
        