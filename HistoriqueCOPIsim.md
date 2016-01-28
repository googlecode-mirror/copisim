# Au tout début était Coline #

Avec la mise en place des Épreuves Classantes Nationales (ECN) au cours de la réforme du 3ème cycle des études de médecine, le gouvernement met en place un système de pré-choix officiels appelé Céline. Cette procédure de pré-choix commence fin aout pour finir au moment des choix effectifs à l'amphithéâtre de garnison.

Quelques années plus tard, en 2003 ou 2004, un informaticien dont le frère passe ces fameux ECN décide de mettre en place un logiciel de simulation. Le but est de pallier le vide séparant les résultats des ECN (mi-juillet) et la procédure de pré-choix et de diminuer le stress et l'incertitude des futurs internes.

Il appelle tout naturellement son logiciel Coline : comme Céline mais avec un "o" pour officieux.

Il continuera à faire fonctionner la simulation chaque année, en partenariat avec l'ANEMF, jusqu'en 2007.

# 2007, l'ANEMF se procure son propre logiciel #

En 2007, il semble que ce premier auteur devienne peu joignable, rechigne à poursuivre la simulation et met l'association nationale des étudiants en médecine de France dans une position difficile. En effet, Coline est rapidement entré dans les moeurs et les futurs internes l'attendent avec impatience.

Aussi lors de son élection au poste de Vice-Président en charge du développement des outils informatiques de communication, aux Journées d'été de l'ANEMF fin juin 2006, Pierre-François Angrand décide de recréer de toute pièce le logiciel dans les 15 jours qui lui reste avant la levée des résultats.

C'est une version, certes baclée mais fonctionnelle, qui voit le jour dans les délais impartis grace à une bonne dose d'Extreme Programming. Le logiciel se nomme toujours Coline et est considéré par l'auteur comme étant la version 1.0 (la version précédente étant la 0.**).**

Il est alors écrit en programmation impérative sous PHP 4. Et sera partiellement réécrit l'année suivante.

# Quand Coline devient COPIsim #

Pourquoi changer de nom ? Parce que la proximité des noms entre Céline et Coline est une source majeure de confusion chez les futurs internes. Ceux-ci ont en effet beaucoup de mal à distinguer la solution officieuse de la solution officielle.

Aussi, en 2008, le logiciel devient COPIsim au cours de la session de choix. Le changement de nom passera assez inaperçu, cette année-là, et les utilisateurs continueront d'appeler le logiciel "Coline".

Le logiciel connait quelques améliorations mineures sur la gestion de la simulation ou la procédure d'identification utilisateur.

# COPIsim se met à l'objet #

En 2009, l'auteur décide de réécrire presqu'intégralement COPIsim en POO. Il s'agira toujours d'un logiciel créé _from scratch_ mais utilisant à présent PHP 5 et sa POO.

Cette version sera désignée comme la version 2.

# COPIsim sous Symfony #

Parce qu'il est grand temps d'arrêter de réinventer la roue et que profiter de l'expertise d'autres, notamment sur le plan de la sécurité, ne peut qu'améliorer le logiciel, l'auteur décide de réécrire complêtement le logiciel pour utiliser le framework Symfony et l'ORM Doctrine. Et ce, juste avant la parution des résultats : l'utilisation d'un framework alourdit le logiciel mais simplifie / raccourcit grandement son développement.