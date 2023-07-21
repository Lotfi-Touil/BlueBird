$(document).ready(function() {
    $('#comment-reply-list').DataTable(
        {
            pageLength : 10,
            lengthMenu : [10, 20, 30, 40,50],
            language: {
                "lengthMenu": "Afficher _MENU_ réponses de commentaire",
                "zeroRecords": "Aucun élément trouvé",
                "info": "Visualisation de _START_ réponses de commentaire à _END_ sur _TOTAL_ réponses de commentaire",
                "infoEmpty": "Aucun élément disponible",
                "infoFiltered": "(filtré parmi _MAX_ réponses de commentaire au total)",
                "search" : "Rechercher",
                "searchPlaceholder" : "Taper au moins 2 caractères",
                "paginate" : {
                    "previous" : "Précedent",
                    "next" : "Suivant",
                }
            }
        }
    );
});