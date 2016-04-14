# OC-Form

OC-Form est un projet commun entre 3 développeurs de la formation d'intégrateur web proposée par OpenClassrooms. Nous souhaitons, grâce à ce projet, créer un outil open source qui facilitera le développement de formulaire.Nous intégrons en plus de ceci une validation de formulaire avec un Recaptcha (Licence Unique).

## Sommaire

* [Introduction](#introduction)
* [Ce qui est inclus](#ce-qui-est-inclus)
* [Bugs et Demandes de Fonctionnalité](#bugs-et-demandes-de-fonctionnalite)
* [Documentation](#documentation)
* [Contribuer](#contribuer)
* [Copyright et license](#copyright-et-license)
 
## Introduction

OpenClassrooms est un site de cours en ligne. Chaque visiteur peut à la fois être un lecteur ou un rédacteur. Les cours peuvent être réalisés aussi bien par des membres, par l'équipe du site, ou éventuellement par des professeurs d'universités ou de grandes écoles partenaires. Initialement orientée autour de la programmation informatique, la plate-forme couvre depuis 2013 des thématiques plus larges tels que le marketing, l'entrepreneuriat et les sciences.
Il propose ainsi des parcours qui regroupent plusieurs cours pour amener l'étudiant à un métier tel que Intégratuer Web, Développeur Front-En et Développeur Back-End. Pour ce projet, nous sommes 3 élèves du parcours Intégrateur Web.

Ce parcours nous forment à un métier à fort potentiel d'embauche. Nous avons décidé de créer un outil open source pour formulaire. Notre but sera de créer plusieurs thèmes pour que le design des formulaires web se fasse plus rapidement.

## Ce qui est inclus

Vous pouvez voir  ci-dessous l'arborescence du projet OC-Form : 
```

OC-Form/
├── css/
|   ├──_notes/
|   |   └── dwsync.xml
│   └── bootstrap.css 
├── js/
|   ├──_notes/
|   |   └── dwsync.xml
│   ├── bootstrap.js
|   └── jquery-1.11.3.min.js
├── fonts/
|   ├── glyphicons-halflings-regular.eot
|   ├── glyphicons-halflings-regular.svg
|   ├── glyphicons-halflings-regular.ttf
|   ├── glyphicons-halflings-regular.woff
|   └── glyphicons-halflings-regular.woff2
├── contact-oc-form.php
├── post_contact.php
├── recaptcha.php
└── README.md

```
## Bugs et Demande de Fonctionnalités

Vous avez vu un bug ou vous désirez un nouvelle fonctionnalité? Rendez-vous dans les [issues de OC-Form](https://github.com/opcr/OC-Form/issues).

## Documentation

Une documentation est tenu pour expliquer chaque fonctionnalité développée. Nous ne demandons pas d'écrire un livre pour chaqu'une de ces class mais juste de décrire son fonctionnement et ce qu'elle apporte aux développeurs.

## Contribuer

Pour contribuer au projet, veuillez suivre les instructions suivantes :

1. Fork du projet
```
git clone https://github.com/opcr/OC-Form.git --recursive
cd OC-Form
```
2. Ajouter une branche distante
```
git remote add origin https://github.com/opcr/OC-Form.git
```
3. Pull OC-Form repo
```
git pull origin master
```
4. Créer votre propre branche de travail
```
git checkout -b username/option/name_branch

[option] :  feat --> intégrer un groupe de fonctionnalité à OC-Form
            bug  --> bug dans le projet
            test --> tester une fonctionnalité

exemple : git checkout -b Lmzd/feat/red_theme
```
5. Push votre travail
```
git push origin username/option/name_branch
```
6. Pull request votre branche

Veuillez mettre un titre claire et compréhensible avec une description de votre travail et l'importance de vos fonctionnalités à vos yeux.


## Copyright et license

Code and documentation copyright 2016 ocpr. Code released under [the MIT license](https://github.com/opcr/OC-Form/blob/master/LICENSE). 

