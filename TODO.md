0 Les évidences :
    0.1 : Protection attaques XSS et injection sql.
    0.2 : Vérification des url entrées ( pas possible d'avoir accès a l'espace admin si on est pas admin et même si on tape l'url a la main)
    0.3 : En cas de non connection uniquement la lecture des posts est possible.
    0.4 : Respecter les conventions de nommage (voir le lien notion créer pour le projet)
    0.5 : Pas de Merge sans validation du groupe ( ou du moins sans avertir le groupe)
    0.6 : Prendre du plaisir !!
    0.7 : Faire plus que ce qu'on sait faire !
    0.8 : Si bloquer demander de l'aide ne perdons pas de temps bêtement on est un groupe!!

1. Administrateur :
   1.1 Gestion de Post :
        [x] 1.1.1 Voir tout les posts.
        [x] 1.1.2 Ajout de posts.
        [x] 1.1.3 Modification des posts présent.
        [x] 1.1.4 Suppression des posts présent.
   1.2 Gestion de Commentaire :
        [x] 1.2.1 Voir tout les commentaires.
        [x] 1.2.2 Ajout de commentaires.
        [x] 1.2.3 Modification des commentaires.
        [x] 1.2.4 Suppression des commentaires.
   1.3 Gestion de Réponse :
        [x] 1.3.1 Voir toutes les réponses.
        [x] 1.3.2 Ajouter une réponse.
        [x] 1.3.3 Modifier une réponse.
        [x] 1.3.4 Supprimer une réponse.
   1.4 Gestion des utilisateurs sur une page spécial admin:
        [x] 1.4.1 Voir tout les utilisateurs
        [x] 1.4.2 Modifier un utilisateurs (role admin ou non)
        [x] 1.4.3 Supprimer un autre utilisateur mais pas sois même
        [x] 1.4.4 Créer un utilisateur admin ou non admin

2. Pour les utilisateurs:
    2.1 Gestion de Post :
        [x] 2.1.1 Voir tout les posts (connecter ou non).
        [x] 2.1.2 Ajouter un post (uniquement connecter).
        [x] 2.1.3 Modifier uniquement ses posts.
        [x] 2.1.4 Supprimer uniquement ses posts.
    2.2 Gestion de Commentaire :
        [x] 2.2.1 Voir tout les commentaires (connecter ou non).
        [x] 2.2.2 Ajouter un commentaire (uniquement connecter).
        [x] 2.2.3 Modifier uniquement ses commentaires.
        [x] 2.2.4 Supprimer uniquement ses commentaires.
    2.3 Gestion de Réponse:
         [x] 2.2.1 Voir tout les réponses (connecter ou non).
         [x] 2.2.2 Ajouter un réponses (uniquement connecter).
         [x] 2.2.3 Modifier uniquement ses réponses.
         [x] 2.2.4 Supprimer uniquement ses réponses.

3.Étape plus avancé :
    []3.1 API REST
    []3.2 Pagination pour les posts
    []3.3 Pagination pour les commentaires
    []3.4 Pagination pour les réponses
    []3.5 Vérification des champs si ils sont bien respecté (exemple : un nom ne contient pas de chiffre ou caractère tel que @ sauf pour la fille d'Elon Musk)
    []3.6 Héritage du CRUD