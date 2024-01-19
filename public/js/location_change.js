    /**
     * Récupérer les éléments HTML correspondants
     */

    const nbre_jour = document.getElementById("nbre_jour");
    const prix_Tot = document.getElementById("prix_Tot");
    const prixJ = document.getElementById("prixjour");
    const startDate = document.getElementById("startDate");
    const endDate = document.getElementById("endDate");

    // Définir la valeur de l'entrée date de début

    startDate.value = new Date().toISOString().split("T")[0]; 
    if(nbre_jour.value == 0)
    {
        endDate.value = new Date().toISOString().split("T")[0]; 
    }
      
    // const date_deb = document.getElementsByName("date_deb")[0];
    // const date_fin = document.getElementsByName("date_fin")[0];

    /**
     * Ajouter un écouteur d'événement pour le changement de nombre de jours
     */

    nbre_jour.addEventListener("change", () => {

    /**
     * Calculer le prix total en fonction du nombre de jours et du prix par jour
     */

    const prix_par_jour = parseFloat(prixJ.value);
    const nombre_jours = parseInt(nbre_jour.value);
    const prix_total = prix_par_jour * nombre_jours;

    /**
     * Mettre à jour la valeur du champ de prix total 
    */ 

    prix_Tot.value = prix_total.toFixed(2);

    /**
     * Créer un objet Date pour représenter la date actuelle
     */
    var date_actuelle = new Date();

    /**
     *  Ajouter le nombre de jours à la date actuelle
     */

    date_actuelle.setDate(date_actuelle.getDate() + nombre_jours);

    // Formater la date au format ISO pour l'entrée date
        var startDateString = date_actuelle.toISOString().split("T")[0];  
  

    // Définir la valeur de l'entrée date de fin
        endDate.value = startDateString;

    });

    

    /**
     * Ajouter un écouteur d'événement pour les changements de date
     */

    // date_deb.addEventListener("change", () => {

    /**
     * Calculer la date minimale de la date d'expiration (date de début + 1 jour)
    */ 

    // const date_debut = new Date(date_deb.value);
    // const date_min = new Date(date_debut.getTime() + 86400000); // 86400000 = 1 jour en millisecondes

    // /**
    //  * Formater la date minimale au format ISO pour l'attribut min de la date d'expiration
    // */

    // const formatted_date = date_min.toISOString().split("T")[0];

    // /**
    //  * Mettre à jour la valeur minimum de la date d'expiration
    // */

    // date_fin.min = formatted_date;

    // });

    // date_fin.addEventListener("change", () => {

    // const date_f = new Date(date_fin.value);
    // const date_max = new Date(date_f.getTime() - 86400000);
    // const formatted_date = date_max.toISOString().split("T")[0];
    // date_deb.max = formatted_date;

    // });

    // /**
    //  * Soustraire les deux dates en millisecondes
    // */
    //     var diff = date_fin.min.getTime() - date_deb.max.getTime();
    //     alert(diff);

    // /**
    //  * Convertir la différence en jours
    // */
    //     var days = diff / (1000 * 60 * 60 * 24);

    