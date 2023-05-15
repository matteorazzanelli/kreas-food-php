[![Issues][issues-shield]][issues-url]
[![LinkedIn][linkedin-shield]][linkedin-url]

<!-- PROJECT LOGO -->
<br />
<div align="center">
  <h3 align="center">PHP e MySQL - Food</h3>
  <img src="app.png" alt="Screenshot">
  <p align="center">Project created for <strong>Start2Impact</strong> course: <em>Vue.js - Advanced</em></p>
</div>

### Built With

* [HTML 5](https://developer.mozilla.org/en-US/docs/Glossary/HTML)
* [CSS 3](https://developer.mozilla.org/en-US/docs/Web/CSS)
* [PHP](https://www.php.net/manual/en/getting-started.php) (follow also the [Laracats](https://laracasts.com/series/php-for-beginners) series)
* [MySQL](https://dev.mysql.com/doc/mysql-getting-started/en/) (or get the following italian only [guide](https://www.html.it/guide/guida-mysql/))
* or alternatively follow [this](https://www.html.it/pag/52749/impostare-un-ambiente-php-su-linux/) guide (italian only) 

<!-- TABLE OF CONTENTS -->
<details open="open">
  <summary>Table of Contents</summary>
  <ol>
    <li><a href="#getting-started">Getting Started</a></li>
    <li><a href="#usage">Usage</a></li>
    <li><a href="#contact">Contact</a></li>
  </ol>
</details>

<!-- GETTING STARTED -->
## Getting Started

1. Clone the repo

```sh
git clone git@github.com:matteorazzanelli/kreas-food-php.git
```

2. Project setup: if you have both *mysql* and *lampp* environment installed, this may cause conflict; to resolve this just type 
```
service mysql stop
```
```
sudo /opt/lampp/lampp restart
```

3. Choose if you want to display frontend or not by writing TRUE or FALSE in *example.env* file
```
FRONTEND=<true_or_false>
```

4. Go to work directory
```
cd kreas-food-php
```

5. Run local php server
```
php -S localhost:8000
```

6. Go to http://localhost:8000

<!-- USAGE -->
## Usage

- The home page shows the total CO2 saved in total
- If you want to filter the CO2 saved by product name, country, or time range, just type at least one of them in the fields below the section *Filter by*
  - N.B. the time range must be present both or none of them
- *Manage Products* allows you to add, delete or modify some product
- *Manage Orders* allows you to add, delete or modify some orders
- In each page the following sentences is present
```
Response code : <STATUS_CODE>, <MESSAGE>
```
where <STATUS_CODE> shows the response code of the previous request, while <MESSAGE> shows a more informative response for the user.
- 
<!-- CONTACT -->
## Link & Contact

Matteo Razzanelli - matteo.razzanelli89@gmail.it

Start2impact personal page - https://talent.start2impact.it/profile/matteo-razzanelli

Project Repository: [PHP & MySQL App](https://github.com/matteorazzanelli/kreas-food-php)

<!-- MARKDOWN LINKS & IMAGES -->
[issues-shield]: https://img.shields.io/github/issues/matteorazzanelli/kreas-food-php/repo.svg?style=for-the-badge
[issues-url]: https://github.com/matteorazzanelli/kreas-food-php/issues
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url]: https://www.linkedin.com/in/matteo-razzanelli/