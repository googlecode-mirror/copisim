**/!\ Suite au passage à l'amphithéâtre de garnison dématérialisé, le logiciel [Céline](http://choixmed.sante.gouv.fr/) du [CNG](http://www.cng.sante.fr/) remplis désormais le cahier des charges fixé pour COPIsim. Le développement de ce logiciel en doublon n'a plus de signification. Puisque [GESSEH](http://code.google.com/p/gesseh) gère également les promos étudiantes, COPIsim ne sera plus qu'un module de ce logiciel. Un rétro-portage sera fait ultérieurement pour laisser une version fonctionnelle ici. /!\**

**COPIsim** signifie : **simulateur de Choix Officieux des Postes d'Inernes**.

C'est un projet développé initialement pour l'[ANEMF](http://www.anemf.org) (voir l'historique de COPIsim pour en savoir plus) que je mets à disposition de tous à l'occasion de sa réécriture.

Ce projet, depuis la version 3, est donc sous **[licence MIT](http://www.opensource.org/licenses/mit-license.php)** et est écrit avec le framework **[Symfony](http://www.symfony-project.org/)**, _PHP_ et _mySQL_.

COPIsim permet aux étudiants d'**enregistrer** et de **classer** leurs voeux de **poste**. La simulation leur indique alors quel poste ils obtiendraient en l'état de la participation.

Il possède une **messagerie interne** pour leur permettre de communiquer plus facilement entre eux et propose des **pages descriptives** des filières, régions et postes proposés.

C'est enfin également un **outil statistique** concernant la population étudiante et leurs choix.

Cette application web s'adresse de prime abord à l'[ANEMF](http://www.anemf.org) dans le cadre de ses **simulations officieuses** pré-[ChoixMed](http://choixmed.sante.gouv.fr/) (anciennement Céline), mais pourrait également convenir aux **associations d'internes** pour leurs simulations avant les choix définitifs auprès des [ARS](http://www.ars.sante.fr).

Si vous pensez à une autre utilisation pratique de COPIsim, n'hésitez pas à contacter les développeurs du projet.

Une autre orientation envisagée sera de servir de brique de base à la génération des choix de stage de _[GESSEH](http://code.google.com/p/gesseh)_.