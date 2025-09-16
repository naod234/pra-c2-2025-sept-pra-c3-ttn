# PHP 8.3 Deprecated Warnings Fix

## Probleem
Je krijgt veel deprecated warnings omdat PHP 8.3 strenger is geworden met type declarations, terwijl Laravel 10 en zijn dependencies nog niet volledig zijn bijgewerkt voor PHP 8.3.

## Oplossingen Geïmplementeerd

### 1. Error Reporting Aangepast
De volgende bestanden zijn aangepast om deprecated warnings te onderdrukken:

- `public/index.php` - Voor web requests
- `artisan` - Voor console commands

### 2. Alternatieve PHP Configuratie
Een `php_fix_deprecated.ini` bestand is gemaakt voor als je meer controle wilt.

## Gebruik

### Normale Gebruik
De applicatie werkt nu zonder deprecated warnings te tonen.

### Met Custom PHP Config (Optioneel)
```bash
# Voor artisan commando's
php -c php_fix_deprecated.ini artisan serve

# Voor andere PHP commando's
php -c php_fix_deprecated.ini artisan migrate
```

### Development Server
```bash
php artisan serve
```

## Aanbevelingen voor de Toekomst

1. **Update Dependencies**: Wacht op Laravel 11 of nieuwere versies die volledig PHP 8.3 compatibel zijn
2. **PHP Downgrade**: Overweeg PHP 8.2 te gebruiken voor betere stabiliteit
3. **Composer Update**: Run regelmatig `composer update` voor nieuwere package versies

## Wat is Veranderd?

De deprecated warnings zijn onderdrukt, maar de applicatie functionaliteit blijft hetzelfde. Dit is een tijdelijke oplossing totdat Laravel en zijn dependencies volledig PHP 8.3 compatibel zijn.
