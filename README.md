# Planner V1.0

## Handleiding

Welkom bij deze handleiding voor het gebruik van Planner!
Volg onderstaande stappen om gebruik te maken van deze software.

## Benodigdheden

  - Windows/Mac omgeving
  - Ingestelde [Homestead](https://laravel.com/docs/5.5/homestead) of [Valet (alleen voor Mac)](https://laravel.com/docs/5.5/valet) omgeving
  - Basiskennis PHP, HTML, CSS en Linux commands
  - Kennis over backend PHP frameworks en frontend Javascript frameworks is een pré

## Installatie

Pull het project van Git

```sh
$ git pull https://github.com/larsjanssen6/planner.git
```

Installeer de npm dependencies

```sh
$ cd planner
$ npm install
```

Installeer de composer packages
```sh
$ composer install
```

Zet de bijbehorende database op
```sh
$ php artisan migrate
```

Seed de database
```sh
$ php artisan db:seed --class=ModelSeeder
```

### Opstarten

De planner software is nu succesvol opgezet. Om de website in je favourite browser te kunnen tonen moet de lokale server opgestart worden.

#### Homestead
Om de software met Homestead aan te bieden dien je de vagrant omgeving op te starten.

```sh
$ cd ../vagrant
$ vagrant up
```

#### Valet
Om de software met Valet aan te bieden aan je browser voer je het volgende commando uit in terminal.

```sh
$ cd ..
$ valet link planner
```

Valet wordt vervolgens automatisch gestart bij het opstarten van MacOS.

### Bekijk het project
Bezoek vervolgens de website in je browser via planner.dev

---

## Ontwikkelaars
- [Lars Janssen](https://github.com/larsjanssen6)
- [Sander van Hooff](https://github.com/sandervanhooff1997)
