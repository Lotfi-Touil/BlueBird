$(document).ready(function() {
    $('#user-list').DataTable(
        {
            pageLength : 10,
            lengthMenu : [10, 20, 30, 40,50],
            language: {
                "lengthMenu": "Afficher _MENU_ utilisateurs",
                "zeroRecords": "Aucun élément trouvé",
                "info": "Visualisation de _START_ utilisateurs à _END_ sur _TOTAL_ utilisateurs",
                "infoEmpty": "Aucun élément disponible",
                "infoFiltered": "(filtré parmi _MAX_ utilisateurs au total)",
                "search" : "Rechercher",
                "searchPlaceholder" : "Taper au moins 2 caractères",
                "paginate" : {
                    "previous" : "Précedent",
                    "next" : "Suivant",
                }
            }
        }
    );

    $('#message-list').DataTable(
        {
            pageLength : 10,
            lengthMenu : [10, 20, 30, 40,50],
            language: {
                "lengthMenu": "Afficher _MENU_ messages",
                "zeroRecords": "Aucun élément trouvé",
                "info": "Visualisation de _START_ messages à _END_ sur _TOTAL_ messages",
                "infoEmpty": "Aucun élément disponible",
                "infoFiltered": "(filtré parmi _MAX_ messages au total)",
                "search" : "Rechercher",
                "searchPlaceholder" : "Taper au moins 2 caractères",
                "paginate" : {
                    "previous" : "Précedent",
                    "next" : "Suivant",
                }
            }
        }
    );

    $('#post-list').DataTable(
        {
            pageLength : 10,
            lengthMenu : [10, 20, 30, 40,50],
            language: {
                "lengthMenu": "Afficher _MENU_ articles",
                "zeroRecords": "Aucun élément trouvé",
                "info": "Visualisation de _START_ articles à _END_ sur _TOTAL_ articles",
                "infoEmpty": "Aucun élément disponible",
                "infoFiltered": "(filtré parmi _MAX_ articles au total)",
                "search" : "Rechercher",
                "searchPlaceholder" : "Taper au moins 2 caractères",
                "paginate" : {
                    "previous" : "Précedent",
                    "next" : "Suivant",
                }
            }
        }
    );

    $('#productor-list').DataTable(
        {
            pageLength : 10,
            lengthMenu : [10, 20, 30, 40,50],
            language: {
                "lengthMenu": "Afficher _MENU_ articles",
                "zeroRecords": "Aucun élément trouvé",
                "info": "Visualisation de _START_ articles à _END_ sur _TOTAL_ articles",
                "infoEmpty": "Aucun élément disponible",
                "infoFiltered": "(filtré parmi _MAX_ articles au total)",
                "search" : "Rechercher",
                "searchPlaceholder" : "Taper au moins 2 caractères",
                "paginate" : {
                    "previous" : "Précedent",
                    "next" : "Suivant",
                }
            }
        }
    );


    const dataTablesFilter = document.querySelector('.dataTables_filter');
    const dataTableLength = document.querySelector(".dataTables_length");

    if (dataTablesFilter) {
        dataTablesFilter.classList.add("d-flex", "justify-content-lg-end", "pl-3", "pr-lg-3", "pl-lg-0");
    }

    if (dataTableLength) {
        dataTableLength.classList.add("d-flex", "pl-3");
    }
});